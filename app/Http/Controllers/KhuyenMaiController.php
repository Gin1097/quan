<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Khuyenmai;
use App\Nhanvien;
use Session;
use Validator;
use App\Http\Requests\KhuyenMaiCreateRequest;

class KhuyenMaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_khuyenmai = Khuyenmai::paginate(10);
        return view('backend.khuyenmai.index')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        ->with('danhsachkhuyenmai', $ds_khuyenmai);
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
        return view('backend.khuyenmai.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
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
        $km = new Khuyenmai();
        $km->km_ten = $request->km_ten;
        $km->km_noiDung = $request->km_noiDung;
        $km->km_batDau = $request->km_batDau;
        $km->km_giaTri = $request->km_giaTri;
        $km->nv_nguoiLap = $request->nv_nguoiLap;
        $km->nv_kyNhay = $request->nv_kyNhay;
        $km->nv_kyDuyet = $request->nv_kyDuyet;
        $km->km_trangThai = $request->km_trangThai;
        $km->save();

        Session::flash('alert-success', 'Thêm mới thanh cong ^^~!!!');
        return redirect()->route('backend.khuyenmai.index');
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
        $km = Khuyenmai::where("km_ma", $id)->first();
        $ds_nhanvien = Nhanvien::all();

        return view('backend.khuyenmai.edit')
            ->with('km', $km)
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
        $km = Khuyenmai::find($id);
        $km->km_ten = $request->input('km_ten');
        $km->km_noiDung = $request->input('km_noiDung');
        $km->km_batDau = $request->input('km_batDau');
        $km->km_ketThuc = $request->input('km_ketThuc');
        $km->km_giaTri = $request->input('km_giaTri');
        $km->nv_nguoiLap = $request->input('nv_nguoiLap');
        $km->km_ngayLap = $request->input('km_ngayLap');
        $km->nv_kyNhay = $request->input('nv_kyNhay');
        $km->km_ngayKyNhay = $request->input('km_ngayKyNhay');
        $km->nv_kyDuyet = $request->input('nv_kyDuyet');
        $km->km_ngayDuyet = $request->input('km_ngayDuyet');
        $km->km_trangThai = $request->input('km_trangThai');

        $km->save();
        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.khuyenmai.index');
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
        $khuyenmai = Khuyenmai::find($id);
        $khuyenmai->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.khuyenmai.index');
    }
}
