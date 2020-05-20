<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gopy;
use App\Khachhang;
use App\Sanpham;
use Session;
use Validator;
use App\Http\Requests\GopYCreateRequest;

class GopYController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_gopy = GopY::paginate(10);
        return view('backend.gopy.index')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        ->with('danhsachgopy', $ds_gopy);
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
    public function edit($id)
    {
        //
        $gopy = GopY::find($id);
        $ds_kh = Khachhang::all();
        $ds_sp = Sanpham::all();

        return view('backend.gopy.edit')
            ->with('danhsachkhachhang', $ds_kh)
            ->with('danhsachsanpham', $ds_sp)
            ->with('gopy', $gopy);
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
        $gopy = GopY::find($id);
        $gopy->gy_thoiGian = $request->input('gy_thoiGian');
        $gopy->gy_noiDung = $request->input('gy_noiDung');
        $gopy->kh_ma = $request->input('kh_ma');
        $gopy->sp_ma = $request->input('sp_ma');
        $gopy->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.gopy.index');
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
        $gopy = GopY::find($id);
        $gopy->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.gopy.index');
    }
}
