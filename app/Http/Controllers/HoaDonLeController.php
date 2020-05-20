<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hoadonle;
use App\Nhanvien;
use App\Donhang;
use App\Chitietdonhang;
use Session;
use Validator;
use App\Http\Requests\MauCreateRequest;

class HoaDonLeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_hoadonle = Hoadonle::paginate(5);

        return view('backend.hoadonle.index')
                ->with('danhsachhoadonle', $ds_hoadonle);
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
        return view('backend.hoadonle.create')
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachdonhang', $ds_donhang);
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
        $hds = new Hoadonle();
        $hds->hdl_nguoiMuaHang = $request->hdl_nguoiMuaHang;
        $hds->hdl_dienThoai = $request->hdl_dienThoai;
        $hds->hdl_diaChi = $request->hdl_diaChi;
        $hds->nv_lapHoaDon = $request->nv_lapHoaDon;
        $hds->hdl_ngayXuatHoaDon = $request->hdl_ngayXuatHoaDon;
        $hds->dh_ma = $request->dh_ma;
        $hds->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.hoadonle.index');
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
        $hdl = Hoadonle::where("hdl_ma", $id)->first();
        $ds_nhanvien = Nhanvien::all();
        $ds_dh = Donhang::all();

        return view('backend.hoadonle.edit')
            ->with('hdl', $hdl)
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachdonhang', $ds_dh);
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
        $hds = Hoadonle::find($id);
        $hds->hdl_nguoiMuaHang = $request->input('hdl_nguoiMuaHang');
        $hds->hdl_dienThoai = $request->input('hdl_dienThoai');
        $hds->hdl_diaChi = $request->input('hdl_diaChi');
        $hds->nv_lapHoaDon = $request->input('nv_lapHoaDon');
        $hds->hdl_ngayXuatHoaDon = $request->input('hdl_ngayXuatHoaDon');
        $hds->dh_ma = $request->input('dh_ma');
        $hds->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.hoadonle.index');
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
        $hoadonle = Hoadonle::find($id);
        $hoadonle->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.hoadonle.index');
    }
    public function print($id) {
        $hdl = Hoadonle::where("hdl_ma", $id)->first();
        $ctdh = Chitietdonhang::all();
        return view('backend.hoadonle.print')
            ->with('hdl', $hdl)
            ->with('ctdh', $ctdh);
    }
}
