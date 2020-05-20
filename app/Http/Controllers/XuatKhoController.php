<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Xuatkho;
use App\Sanpham;
use App\Nhanvien;
use App\Donvitinh;
use App\Kho;
use App\Sanphamkho;
use App\ChitietXuatkho;
use DB;
use Session;
use Validator;
use App\Http\Requests\XuatKhoCreateRequest;

class XuatKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachxuatkho = Xuatkho::paginate(5);

        return view('backend.xuatkho.index')
                ->with('danhsachxuatkho', $danhsachxuatkho);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ds_nhanvien = Nhanvien::all();
        $ds_sp = Sanpham::all();
        $ds_dvt = Donvitinh::all();
        $ds_spk = Sanphamkho::all();
        $ds_kho = Kho::all();
        return view('backend.xuatkho.create')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
        ->with('danhsachsanpham', $ds_sp)
        ->with('danhsachdonvitinh', $ds_dvt)
        ->with('danhsachsanphamkho', $ds_spk)
        ->with('danhsachkho', $ds_kho)
        ->with('danhsachnhanvien', $ds_nhanvien);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $xk = new Xuatkho();
        $gb = $request->sp_giaBan;
        $sl = $request->xk_soluong;
        $xk->xk_ngaylap = date('Y-m-d');
        $xk->xk_diachi = $request->xk_diachi;
        $xk->xk_lydo = $request->xk_lydo;
        $xk->xk_tongtien = $gb*$sl;
        $xk->nv_ma = $request->nv_ma;
        $xk->save();

        $ctxk = new ChitietXuatkho();
        $ctxk->sp_ma = $request->sp_ma;
        $ctxk->xk_ma = $xk->xk_ma;
        $ctxk->ctxk_soluong = $request->xk_soluong;
        $ctxk->save();

        $kho = $request->kho_ma;
        $sp = $request->sp_ma;
        DB::table('sanphamkho')->where('kho_ma', $kho)
        ->where('sp_ma', $sp)
        ->update([
            'kho_ma'=>$request->kho_ma,
            'sp_ma'=>$request->sp_ma,
            'sl_nhap'=>$request->sl_nhap,
            'sl_xuat'=>$request->xk_soluong,
            'sl_ton'=>$request->sl_ton - $request->xk_soluong
        ]);

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.xuatkho.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $xk = Xuatkho::where("xk_ma", $id)->first();
        $ds_nhanvien = Nhanvien::all();

        return view('backend.xuatkho.edit')
            ->with('xuatkho', $xk)
            ->with('danhsachnhanvien', $ds_nhanvien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $xk = Xuatkho::find($id);
        $xk->xk_ngaylap = $request->input('xk_ngaylap');
        $xk->xk_diachi = $request->input('xk_diachi');
        $xk->xk_lydo = $request->input('xk_lydo');
        $xk->xk_tongtien = $request->input('xk_tongtien');
        $xk->nv_ma = $request->input('nv_ma');
        $xk->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.xuatkho.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $xk = Xuatkho::find($id);
        $xk->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.xuatkho.index');
    }
}
