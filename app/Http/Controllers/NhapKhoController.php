<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nhapkho;
use App\Nhanvien;
use App\Nhacungcap;
use Session;
use Validator;
use App\Http\Requests\KhuyenMaiCreateRequest;

class NhapKhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_nhapkho = Nhapkho::paginate(5);
        return view('backend.nhapkho.index')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        ->with('danhsachnhapkho', $ds_nhapkho);
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
        $ds_nhacungcap = Nhacungcap::all();
        return view('backend.nhapkho.create')
            ->with('danhsachnhanvien', $ds_nhanvien)
            ->with('danhsachnhacungcap', $ds_nhacungcap);
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
        $nk = new Nhapkho();
        $nk->nk_ngaylap = $request->nk_ngaylap;
        $nk->nk_lydo = $request->nk_lydo;
        $nk->nk_tongtien = $request->nk_tongtien;
        $nk->nv_ma = $request->nv_ma;
        $nk->ncc_ma = $request->ncc_ma;
        $nk->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.nhapkho.index');
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
    }
}
