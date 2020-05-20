<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nhacungcap;
use App\Xuatxu;
use Session;
use Validator;
use App\Http\Requests\NhaCungCapCreateRequest;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_nhacungcap = Nhacungcap::paginate(5);
        return view('backend.nhacungcap.index')
            ->with('danhsachnhacungcap', $ds_nhacungcap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ds_xuatxu = Xuatxu::all();
        return view('backend.nhacungcap.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
            ->with('danhsachxuatxu', $ds_xuatxu);
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
        $ncc = new Nhacungcap();
        $ncc->ncc_ten = $request->ncc_ten;
        $ncc->ncc_daiDien = $request->ncc_daiDien;
        $ncc->ncc_diaChi = $request->ncc_diaChi;
        $ncc->ncc_dienThoai = $request->ncc_dienThoai;
        $ncc->ncc_email = $request->ncc_email;
        $ncc->ncc_trangThai = $request->ncc_trangThai;
        $ncc->xx_ma = $request->xx_ma;
        
        $ncc->save();

        Session::flash('alert-success', 'Thêm mới thanh cong ^^~!!!');
        return redirect()->route('backend.nhacungcap.index');
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
        $ncc = Nhacungcap::where("ncc_ma", $id)->first();
        $ds_xuatxu = Xuatxu::all();

        return view('backend.nhacungcap.edit')
            ->with('ncc', $ncc)
            ->with('danhsachxuatxu', $ds_xuatxu);
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
        $ncc = Nhacungcap::find($id);
        $ncc->ncc_ten = $request->input('ncc_ten');
        $ncc->ncc_daiDien = $request->input('ncc_daiDien');
        $ncc->ncc_diaChi = $request->input('ncc_diaChi');
        $ncc->ncc_dienThoai = $request->input('ncc_dienThoai');
        $ncc->ncc_email = $request->input('ncc_email');
        $ncc->ncc_trangThai = $request->input('ncc_trangThai');
        $ncc->xx_ma = $request->input('xx_ma');   
        

        $ncc->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.nhacungcap.index');
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
        $nhacungcap = Nhacungcap::find($id);
        $nhacungcap->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.nhacungcap.index');
    }
}
