<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hoadonsi;
use App\Nhanvien;
use App\Donhang;
use App\Thanhtoan;
use App\Chitietdonhang;
use App\Sanpham;
use DB;
use Session;
use Validator;
use App\Http\Requests\MauCreateRequest;

class HoaDonSiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_hoadonsi = Hoadonsi::paginate(5);

        return view('backend.hoadonsi.index')
                ->with('danhsachhoadonsi', $ds_hoadonsi);
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
        $ds_donhang = Donhang::all();
        $ds_thanhtoan = Thanhtoan::all();
        return view('backend.hoadonsi.create')
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachdonhang', $ds_donhang)
            ->with('danhsachthanhtoan', $ds_thanhtoan);
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
        $hds = new Hoadonsi();
        $hds->hds_nguoiMuaHang = $request->hds_nguoiMuaHang;
        $hds->hds_tenDonvi = $request->hds_tenDonVi;
        $hds->hds_diaChi = $request->hds_diaChi;
        $hds->hds_maSoThue = $request->hds_maSoThue;
        $hds->hds_soTaiKhoan = $request->hds_soTaiKhoan;
        $hds->nv_lapHoaDon = $request->nv_lapHoaDon;
        $hds->hds_ngayXuatHoaDon = $request->hds_ngayXuatHoaDon;
        $hds->nv_thuTruong = 1 ;
        $hds->dh_ma = $request->dh_ma;
        $hds->tt_ma = $request->tt_ma;
        $hds->hds_trangThai = $request->hds_trangThai;
        $hds->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.hoadonsi.index');
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
        $hds = Hoadonsi::where("hds_ma", $id)->first();
        $ds_nhanvien = Nhanvien::all();
        $ds_dh = Donhang::all();
        $ds_tt = Thanhtoan::all();

        return view('backend.hoadonsi.edit')
            ->with('hds', $hds)
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachdonhang', $ds_dh)
            ->with('danhsachthanhtoan', $ds_tt);
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
        $hds = Hoadonsi::find($id);
        $hds->hds_nguoiMuaHang = $request->input('hds_nguoiMuaHang');
        $hds->hds_tenDonVi = $request->input('hds_tenDonVi');
        $hds->hds_diaChi = $request->input('hds_diaChi');
        $hds->hds_maSoThue = $request->input('hds_maSoThue');
        $hds->hds_soTaiKhoan = $request->input('hds_soTaiKhoan');
        $hds->nv_lapHoaDon = $request->input('nv_lapHoaDon');
        $hds->hds_ngayXuatHoaDon = $request->input('hds_ngayXuatHoaDon');
        $hds->nv_thuTruong = $request->input('nv_thuTruong');
        $hds->tt_ma = $request->input('tt_ma');
        $hds->dh_ma = $request->input('dh_ma');
        $hds->hds_trangThai = $request->input('hds_trangThai');
        $hds->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.hoadonsi.index');
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
        $hoadonsi = Hoadonsi::find($id);
        $hoadonsi->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.hoadonsi.index');
    }

    public function print($id) {
        $hds = Hoadonsi::where("hds_ma", $id)->first();
        $ctdh = Chitietdonhang::all();
        return view('backend.hoadonsi.print')
            ->with('hds', $hds)
            ->with('ctdh', $ctdh);
    }
}
