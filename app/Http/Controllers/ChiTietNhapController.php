<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chitietnhap;
use App\Sanpham;
use App\Mau;
use App\Phieunhap;
use DB;
use Session;
use Validator;
use App\Http\Requests\ChiTietNhapCreateRequest;

class ChiTietNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_chitietnhap = Chitietnhap::paginate(5);
        return view('backend.phieunhap.index1')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        ->with('danhsachchitietnhap', $ds_chitietnhap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $ds_phieunhap = Phieunhap::all();
        // $ds_sanpham = Sanpham::all();
        // $ds_mau = Mau::all();
        // return view('backend.chitietnhap.create')
        //     // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
        //     ->with('danhsachphieunhap', $ds_phieunhap)
        //     ->with('danhsachsanpham', $ds_sanpham)
        //     ->with('danhsachmau', $ds_mau);
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
        // $ctn = new Chitietnhap();
        // $ctn->pn_ma = $request->pn_ma;
        // $ctn->sp_ma = $request->sp_ma;
        // $ctn->m_ma = $request->m_ma;
        // $ctn->ctn_soLuong = $request->ctn_soLuong;
        // $ctn->ctn_donGia = $request->ctn_donGia;

        // $ctn->save();
        // Session::flash('alert-success', 'Thêm mới thanh cong ^^~!!!');
        // return redirect()->route('backend.chitietnhap.index');
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
    public function edit($id, $id1, $id2)
    {
        //
        $ctn = Chitietnhap::where("pn_ma", $id)
        ->where("sp_ma", $id1)
        ->where("m_ma", $id2)->first();
        $ds_phieunhap = Phieunhap::all();
        $ds_sanpham = Sanpham::all();
        $ds_mau = Mau::all();

        return view('backend.chitietnhap.edit')
            ->with('chitietnhap', $ctn)
            ->with('danhsachphieunhap', $ds_phieunhap)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachmau', $ds_mau);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id1, $id2)
    {
        //

        DB::table('chitietnhap')->where('pn_ma', $id)
        ->where('sp_ma', $id1)
        ->where('m_ma', $id2)
        ->update([
            'pn_ma'=>$request->pn_ma,
            'sp_ma'=>$request->sp_ma,
            'm_ma'=>$request->m_ma,
            'ctn_soLuong'=>$request->ctn_soLuong,
            'ctn_donGia'=>$request->sp_giaGoc*$request->ctn_soLuong
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.chitietnhap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id1, $id2)
    {
        //
        DB::table('chitietnhap')->where('pn_ma', $id)
        ->where('sp_ma', $id1)
        ->where('m_ma', $id2)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.chitietnhap.index');
    }
}
