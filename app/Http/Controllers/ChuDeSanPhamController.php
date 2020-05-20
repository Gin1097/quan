<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChudeSanpham;
use App\Sanpham;
use App\ChuDe;
use DB;
use Session;
use Validator;
use App\Http\Requests\ChudeSanphamCreateRequest;

class ChuDeSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ds_chudesanpham = ChudeSanpham::paginate(5);
        return view('backend.chudesanpham.index')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachsanpham`
        ->with('danhsachchudesanpham', $ds_chudesanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ds_sanpham = Sanpham::all();
        $ds_chude = ChuDe::all();
        return view('backend.chudesanpham.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachchude', $ds_chude);
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
        $cdsp = new ChudeSanpham();
        $cdsp->sp_ma = $request->sp_ma;
        $cdsp->cd_ma = $request->cd_ma;

        $cdsp->save();
        Session::flash('alert-success', 'Thêm mới thanh cong ^^~!!!');
        return redirect()->route('backend.cdsp.index');
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
        $cdsp = ChudeSanpham::where("sp_ma", $id)
        ->where("cd_ma", $id1)->first();
        $ds_chude = Chude::all();
        $ds_sanpham = Sanpham::all();

        return view('backend.chudesanpham.edit')
            ->with('cdsp', $cdsp)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachchude', $ds_chude);
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
        DB::table('chude_sanpham')->where('sp_ma', $id)
        ->where('cd_ma', $id1)
        ->update([
            'sp_ma'=>$request->sp_ma,
            'cd_ma'=>$request->cd_ma,
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.cdsp.index');
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
        DB::table('chude_sanpham')->where('sp_ma', $id)
        ->where('cd_ma', $id1)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.cdsp.index');
    }
}
