<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KhuyenmaiSanpham;
use App\Khuyenmai;
use App\Sanpham;
use App\Mau;
use DB;
use Session;
use Validator;
use App\Http\Requests\KhuyenMaiSanPhamCreateRequest;

class KhuyenMaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_khuyenmaisanpham = KhuyenmaiSanpham::paginate(5);
        return view('backend.khuyenmaisanpham.index')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        ->with('danhsachkhuyenmaisanpham', $ds_khuyenmaisanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ds_khuyenmai = Khuyenmai::all();
        $ds_sanpham = Sanpham::all();
        $ds_mau = Mau::all();
        return view('backend.khuyenmaisanpham.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
            ->with('danhsachkhuyenmai', $ds_khuyenmai)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachmau', $ds_mau);
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
        $kmsp = new KhuyenmaiSanpham();
        $kmsp->km_ma = $request->km_ma;
        $kmsp->sp_ma = $request->sp_ma;
        $kmsp->m_ma = $request->m_ma;
        $kmsp->kmsp_giaTri = $request->kmsp_giaTri;
        $kmsp->kmsp_trangThai = $request->kmsp_trangThai;

        $kmsp->save();
        Session::flash('alert-success', 'Thêm mới thanh cong ^^~!!!');
        return redirect()->route('backend.kmsp.index');
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
        $kmsp = KhuyenmaiSanpham::where("km_ma", $id)
        ->where("sp_ma", $id1)
        ->where("m_ma", $id2)->first();
        $ds_khuyenmai = Khuyenmai::all();
        $ds_sanpham = Sanpham::all();
        $ds_mau = Mau::all();

        return view('backend.khuyenmaisanpham.edit')
            ->with('kmsp', $kmsp)
            ->with('danhsachkhuyenmai', $ds_khuyenmai)
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
        DB::table('khuyenmai_sanpham')->where('km_ma', $id)
        ->where('sp_ma', $id1)
        ->where('m_ma', $id2)
        ->update([
            'km_ma'=>$request->km_ma,
            'sp_ma'=>$request->sp_ma,
            'm_ma'=>$request->m_ma,
            'kmsp_giaTri'=>$request->kmsp_giaTri,
            'kmsp_trangThai'=>$request->kmsp_trangThai
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.kmsp.index');
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
        DB::table('khuyenmai_sanpham')->where('km_ma', $id)
        ->where('sp_ma', $id1)
        ->where('m_ma', $id2)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.kmsp.index');
    }
}
