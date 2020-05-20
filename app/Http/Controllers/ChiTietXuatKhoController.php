<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chitietxuatkho;
use App\Sanpham;
use App\Xuatkho;
use DB;
use Session;
use Validator;
use App\Http\Requests\ChiTietXuatKhoCreateRequest;

class ChiTietXuatKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_chitietxuatkho = Chitietxuatkho::paginate(5); //SELECT * FROM cusc_chude
        $ds_sp = Sanpham::all();
        $ds_xk = Xuatkho::all();
        return view('backend.chitietxuatkho.index')
            ->with('danhsachsanpham', $ds_sp)
            ->with('danhsachxuatkho', $ds_xk)
            ->with('danhsachchitietxuatkho', $ds_chitietxuatkho);
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
        $ctxk = Chitietxuatkho::where("sp_ma", $id)
        ->where("xk_ma", $id1)->first();
        $ds_sanpham = Sanpham::all();
        $ds_xk = Xuatkho::all();

        return view('backend.chitietxuatkho.edit')
            ->with('chitietxuatkho', $ctxk)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachxuatkho', $ds_xk);
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
        DB::table('chitiet_xuatkho')->where('sp_ma', $id)
        ->where('xk_ma', $id1)
        ->update([
            'sp_ma'=>$request->sp_ma,
            'xk_ma'=>$request->xk_ma,
            'ctxk_soluong'=>$request->ctxk_soluong,
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.ctxk.index');
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
        DB::table('chitiet_xuatkho')->where('sp_ma', $id)
        ->where('xk_ma', $id1)
        ->delete();
        DB::table('xuatkho')->where('xk_ma', $id1)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.ctxk.index');
    }
}
