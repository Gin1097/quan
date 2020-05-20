<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chitietchuyenkho;
use App\Sanpham;
use App\Chuyenkho;
use App\Kho;
use DB;
use Session;
use Validator;
use App\Http\Requests\ChiTietChuyenKhoCreateRequest;

class ChiTietChuyenKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_chitietchuyenkho = Chitietchuyenkho::paginate(5); //SELECT * FROM cusc_chude
        return view('backend.chitietchuyenkho.index')
            ->with('danhsachchitietchuyenkho', $ds_chitietchuyenkho);
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
        $ctck = Chitietchuyenkho::where("ck_ma", $id)
        ->where("sp_ma", $id1)->first();
        $ds_sanpham = Sanpham::all();
        $ds_ck = Chuyenkho::all();
        $ds_kho = Kho::all();

        return view('backend.chitietchuyenkho.edit')
            ->with('chitietchuyenkho', $ctck)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachkho', $ds_kho)
            ->with('danhsachchuyenkho', $ds_ck);
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
        DB::table('chitiet_chuyenkho')->where('ck_ma', $id)
        ->where('sp_ma', $id1)
        ->update([
            'ck_ma'=>$request->ck_ma,
            'sp_ma'=>$request->sp_ma,
            'ctck_soLuong'=>$request->ctck_soLuong,
            'ctck_thanhtien'=>$request->ctck_thanhtien,
            'khocu_ma'=>$request->khocu_ma,
            'khomoi_ma'=>$request->khomoi_ma,
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.ctck.index');
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
        DB::table('chitiet_chuyenkho')->where('ck_ma', $id)
        ->where('sp_ma', $id1)
        ->delete();
        DB::table('chuyenkho')->where('ck_ma', $id)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.ctck.index');
    }
}
