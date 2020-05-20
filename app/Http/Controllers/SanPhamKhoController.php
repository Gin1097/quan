<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sanphamkho;
use App\Sanpham;
use App\Kho;
use DB;
use Session;
use Validator;
use App\Http\Requests\MauSanPhamCreateRequest;

class SanPhamKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachsanphamkho = Sanphamkho::paginate(5);

        return view('backend.sanphamkho.index')
                ->with('danhsachsanphamkho', $danhsachsanphamkho);
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
    public function edit($id, $id1)
    {
        //
        $spk = Sanphamkho::where("kho_ma", $id)
        ->where("sp_ma", $id1)->first();
        $ds_sanpham = Sanpham::all();
        $ds_kho = Kho::all();

        return view('backend.sanphamkho.edit')
            ->with('spk', $spk)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachkho', $ds_kho);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id1)
    {
        //
        DB::table('sanphamkho')->where('kho_ma', $id)
        ->where('sp_ma', $id1)
        ->update([
            'sp_ma'=>$request->sp_ma,
            'kho_ma'=>$request->kho_ma,
            'sl_nhap'=>$request->sl_nhap,
            'sl_xuat'=>$request->sl_xuat,
            'sl_ton'=>$request->sl_ton
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.spk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id1)
    {
        //
        DB::table('sanphamkho')->where('kho_ma', $id)
        ->where('sp_ma', $id1)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.spk.index');
    }
}
