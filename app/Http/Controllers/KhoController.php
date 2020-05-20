<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kho;
use Session;
use Validator;
use App\Http\Requests\KhoCreateRequest;

class KhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_kho = Kho::paginate(10);
        return view('backend.kho.index')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        ->with('danhsachkho', $ds_kho);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.kho.create');
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
        $kho = new Kho();
        $kho->kho_ten = $request->kho_ten;
        $kho->kho_diachi = $request->kho_diachi;
        $kho->kho_sdt = $request->kho_sdt;
        $kho->kho_quanly = $request->kho_quanly;
        $kho->kho_dienGiai = $request->kho_dienGiai;
        $kho->kho_trangThai = $request->kho_trangThai;
        $kho->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.kho.index');
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
        $kho = Kho::find($id);

        return view('backend.kho.edit')
            ->with('kho', $kho);
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
        $kho = Kho::find($id);
        $kho->kho_ten = $request->input('kho_ten');
        $kho->kho_diachi = $request->input('kho_diachi');
        $kho->kho_sdt = $request->input('kho_sdt');
        $kho->kho_quanly = $request->input('kho_quanly');
        $kho->kho_dienGiai = $request->input('kho_dienGiai');
        $kho->kho_trangThai = $request->input('kho_trangThai');
        $kho->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.kho.index');
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
        $kho = Kho::find($id);
        $kho->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.kho.index');
    }
}
