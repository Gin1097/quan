<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donhang;
use App\Khachhang;
use App\Nhanvien;
use App\Vanchuyen;
use App\Thanhtoan;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachdonhang = Donhang::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.donhang.index')
            ->with('danhsachdonhang', $danhsachdonhang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $dh = Donhang::where("dh_ma", $id)->first();
        $ds_khachhang = Khachhang::all();
        $ds_nhanvien = Nhanvien::all();
        $ds_vanchuyen = Vanchuyen::all();
        $ds_thanhtoan = Thanhtoan::all();

        return view('backend.donhang.edit')
            ->with('dh', $dh)
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachvanchuyen', $ds_vanchuyen)
            ->with('danhsachthanhtoan', $ds_thanhtoan)
            ->with('danhsachkhachhang', $ds_khachhang);
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
        $donhang = Donhang::find($id);
        $donhang->kh_ma = $request->input('kh_ma');
        $donhang->dh_thoiGianDatHang = $request->input('dh_thoiGianDatHang');
        $donhang->dh_thoiGianNhanHang = $request->input('dh_thoiGianNhanHang');
        $donhang->dh_nguoiNhan = $request->input('dh_nguoiNhan');
        $donhang->dh_diaChi = $request->input('dh_diaChi');
        $donhang->dh_dienThoai = $request->input('dh_dienThoai');
        $donhang->dh_dienThoai = $request->input('dh_dienThoai');
        $donhang->dh_nguoiGui = $request->input('dh_nguoiGui');
        $donhang->dh_loiChuc = $request->input('dh_loiChuc');
        $donhang->dh_daThanhToan = $request->input('dh_daThanhToan');
        $donhang->nv_xuLy = $request->input('nv_xuLy');
        $donhang->dh_ngayXuLy = $request->input('dh_ngayXuly');
        $donhang->nv_giaoHang = $request->input('nv_giaoHang');
        $donhang->dh_ngayLapPhieuGiao = $request->input('dh_ngayLapPhieuGiao');
        $donhang->dh_ngayGiaoHang = $request->input('dh_ngayGiaoHang');
        $donhang->dh_trangThai = $request->input('dh_trangThai');
        $donhang->vc_ma = $request->input('vc_ma');
        $donhang->tt_ma = $request->input('tt_ma');
        $donhang->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.donhang.index');
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
        $donhang = Donhang::find($id);
        $donhang->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.donhang.index');
    }
}
