<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Phieunhap;
use App\Nhanvien;
use App\Nhacungcap;
use App\Sanpham;
use App\Chitietnhap;
use App\Sanphamkho;
use App\Mau;
use Session;
use Storage;
use Barryvdh\DomPDF\Facade as PDF;

class PhieuNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_phieunhap = Phieunhap::paginate(5);
        return view('backend.phieunhap.index')
            ->with('danhsachphieunhap', $ds_phieunhap);
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
        $ds_ncc = Nhacungcap::all();
        $ds_sp = Sanpham::all();
        $ds_mau = Mau::all();
        return view('backend.phieunhap.create')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
        ->with('danhsachnhacungcap', $ds_ncc)
        ->with('danhsachsanpham', $ds_sp)
        ->with('danhsachmau', $ds_mau)
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
        $pn = new Phieunhap();
        $pn->pn_nguoiGiao = $request->pn_nguoiGiao;
        $pn->pn_soHoaDon = $request->pn_soHoaDon;
        $pn->pn_ngayXuatHoaDon = $request->pn_ngayXuatHoaDon;
        $pn->pn_ghiChu = $request->pn_ghiChu;
        $pn->nv_nguoiLapPhieu = $request->nv_nguoiLapPhieu;
        $pn->pn_ngayLapPhieu = $request->pn_ngayLapPhieu;
        $pn->nv_keToan = $request->nv_keToan;
        $pn->nv_thuKho = $request->nv_thuKho;
        $pn->ncc_ma = $request->ncc_ma;
        $pn->pn_trangThai = $request->pn_trangThai;
        $pn->save();
        
        $ctn = new Chitietnhap();
        $sl = $request->ctn_soLuong;
        $gia = $request->sp_giaGoc;
        $ctn->pn_ma = $pn->pn_ma;
        $ctn->sp_ma = $request->sp_ma;
        $ctn->m_ma = $request->m_ma;
        $ctn->ctn_soLuong = $request->ctn_soLuong;
        $ctn->ctn_donGia = $sl*$gia;
        $ctn->save();

        $spk = new Sanphamkho();
        $spk->kho_ma = $request->kho_ma;
        $spk->sp_ma = $request->sp_ma;
        $spk->sl_nhap = $request->ctn_soLuong;
        $spk->sl_ton = $request->ctn_soLuong;
        $spk->sl_xuat = 0;
        $spk->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.phieunhap.index');
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
        $pn = Phieunhap::where("pn_ma", $id)->first();
        $ds_nhanvien = Nhanvien::all();
        $ds_ncc = Nhacungcap::all();

        return view('backend.phieunhap.edit')
            ->with('phieunhap', $pn)
            ->with('danhsachnhacungcap', $ds_ncc)
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
        $pn = Phieunhap::find($id);
        $pn->pn_nguoiGiao = $request->input('pn_nguoiGiao');
        $pn->pn_soHoaDon = $request->input('pn_soHoaDon');
        $pn->pn_ngayXuatHoaDon = $request->input('pn_ngayXuatHoaDon');
        $pn->pn_ghiChu = $request->input('pn_ghiChu');
        $pn->nv_nguoiLapPhieu = $request->input('nv_nguoiLapPhieu');
        $pn->pn_ngayLapPhieu = $request->input('pn_ngayLapPhieu');
        $pn->nv_keToan = $request->input('nv_keToan');
        $pn->nv_thuKho = $request->input('nv_thuKho');
        $pn->pn_trangThai = $request->input('pn_trangThai');
        $pn->ncc_ma = $request->input('ncc_ma');

        $pn->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.phieunhap.index');
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
        $phieunhap = Phieunhap::find($id);
        $phieunhap->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.phieunhap.index');
    }
}
