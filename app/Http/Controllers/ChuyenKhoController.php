<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chuyenkho;
use App\Sanpham;
use App\Nhanvien;
use App\Kho;
use App\Sanphamkho;
use App\ChitietChuyenkho;
use DB;
use Session;
use Validator;
use App\Http\Requests\ChuyenKhoCreateRequest;

class ChuyenKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachchuyenkho = Chuyenkho::paginate(5);

        return view('backend.chuyenkho.index')
                ->with('danhsachchuyenkho', $danhsachchuyenkho);
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
        $ds_spk = Sanphamkho::all();
        $ds_kho = Kho::all();
        return view('backend.chuyenkho.create')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
        ->with('danhsachsanpham', $ds_sp)
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
        $ck = new Chuyenkho();
        $ck->ck_ngay = date('Y-m-d');
        $ck->ck_lydo = $request->ck_lydo;
        $ck->nv_ma = $request->nv_ma;
        $ck->save();

        $ctck = new ChitietChuyenkho();
        $sl = $request->ck_soluong;
        $dg = $request->sp_giaGoc;
        $ctck->ck_ma = $ck->ck_ma;
        $ctck->sp_ma = $request->sp_ma;
        $ctck->ctck_soluong = $request->ck_soluong;
        $ctck->ctck_thanhtien = $sl*$dg;
        $ctck->khocu_ma = $request->khocu_ma;
        $ctck->khomoi_ma = $request->kho_ma;
        $ctck->save();

        $spk = new Sanphamkho();
        $spk->kho_ma = $request->kho_ma;
        $spk->sp_ma = $request->sp_ma;
        $spk->sl_nhap = $request->sl_nhap;
        $spk->sl_xuat = $request->sl_xuat;
        $spk->sl_ton = $request->sl_ton - $request->ck_soluong;
        $spk->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.chuyenkho.index');
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
        $ck = Chuyenkho::where("ck_ma", $id)->first();
        $ds_nhanvien = Nhanvien::all();

        return view('backend.chuyenkho.edit')
            ->with('chuyenkho', $ck)
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
        $ck = Chuyenkho::find($id);
        $ck->ck_ngay = $request->input('ck_ngay');
        $ck->ck_lydo = $request->input('ck_lydo');
        $ck->nv_ma = $request->input('nv_ma');
        $ck->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.chuyenkho.index');
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
        $ck = Chuyenkho::find($id);
        $ck->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.chuyenkho.index');
    }
}
