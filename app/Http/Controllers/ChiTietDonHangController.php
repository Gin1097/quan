<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chitietdonhang;
use App\Donhang;
use App\Sanpham;
use App\Mau;
use Session;
use Storage;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class ChiTietDonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_chitietdonhang = Chitietdonhang::paginate(5); //SELECT * FROM cusc_chude

        return view('backend.chitietdonhang.index')
            ->with('danhsachchitietdonhang', $ds_chitietdonhang);
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
    public function edit($id, $id1, $id2)
    {
        //
        $ctdh = Chitietdonhang::where("dh_ma", $id)
        ->where("sp_ma", $id1)
        ->where("m_ma", $id2)->first();
        $ds_donhang = Donhang::all();
        $ds_sanpham = Sanpham::all();
        $ds_mau = Mau::all();

        return view('backend.chitietdonhang.edit')
            ->with('ctdh', $ctdh)
            ->with('danhsachdonhang', $ds_donhang)
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
        DB::table('Chitietdonhang')->where('dh_ma', $id)
        ->where('sp_ma', $id1)
        ->where('m_ma', $id2)
        ->update([
            'dh_ma'=>$request->dh_ma,
            'sp_ma'=>$request->sp_ma,
            'm_ma'=>$request->m_ma,
            'ctdh_soLuong'=>$request->ctdh_soLuong,
            'ctdh_donGia'=>$request->ctdh_donGia
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.chitietdonhang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id1,$id2)
    {
        //
        DB::table('Chitietdonhang')->where('dh_ma', $id)
        ->where('sp_ma', $id1)
        ->where('m_ma', $id2)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.chitietdonhang.index');
    }
}
