<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MauSanpham;
use App\Sanpham;
use App\Mau;
use DB;
use Session;
use Validator;
use App\Http\Requests\MauSanPhamCreateRequest;

class MauSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachmausanpham = MauSanpham::paginate(5);

        return view('backend.mausanpham.index')
                ->with('danhsachmausanpham', $danhsachmausanpham);
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
        $ds_mau = Mau::all();
        return view('backend.mausanpham.create')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `danhsachloai`
            ->with('danhsachmau', $ds_mau)
            ->with('danhsachsanpham', $ds_sanpham);
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
        $msp = new MauSanpham();
        $msp->sp_ma = $request->sp_ma;
        $msp->m_ma = $request->m_ma;
        $msp->msp_soluong = $request->msp_soluong;
        
        $msp->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.msp.index');
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
        $msp = MauSanpham::where("sp_ma", $id)
        ->where("m_ma", $id1)->first();
        $ds_sanpham = Sanpham::all();
        $ds_mau = Mau::all();

        return view('backend.mausanpham.edit')
            ->with('msp', $msp)
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
    public function update(Request $request, $id, $id1)
    {
        //
        DB::table('mau_sanpham')->where('sp_ma', $id)
        ->where('m_ma', $id1)
        ->update([
            'sp_ma'=>$request->sp_ma,
            'm_ma'=>$request->m_ma,
            'msp_soluong'=>$request->msp_soluong
        ]);

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.msp.index');
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
        DB::table('mau_sanpham')->where('sp_ma', $id)
        ->where('m_ma', $id1)
        ->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.msp.index');
    }
}
