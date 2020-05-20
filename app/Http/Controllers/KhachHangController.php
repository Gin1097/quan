<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Khachhang;
use Session;
use Validator;
use App\Http\Requests\KhachHangCreateRequest;
class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachkhachhang = Khachhang::all();

        return view('backend.khachhang.index')
                ->with('danhsachkhachhang', $danhsachkhachhang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //
        // $validator = Validator::make($request->all(), [
        //     'kh_taiKhoan' => 'required|min:3|max:50', //tên table
        //     'kh_matKhau' => 'required|min:6|max:10',
        //     'kh_hoTen' => 'required|min:3|max:10',
        //     'kh_email' => 'required|min:8|max:100',
        //     'kh_ngaySinh' => 'required|min:8|max:10',
        //     'kh_diaChi' => 'required|min:10|max:100',
        //     'kh_dienThoai' => 'required|min:10|max:11'
        // ]);

        // // // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // // // Chuyển hướng về view "Thêm mới" với,
        // // // - Thông báo lỗi vi phạm các quy luật.
        // // // - Dữ liệu cũ (người dùng đã nhập).
        // if ($validator->fails()) {
        //     return redirect(route('backend.khachhang.create'))
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        // $kh = new Khachhang();

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
        $kh = Khachhang::find($id);
        return view('backend.khachhang.edit')
                ->with('kh', $kh);
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
        $kh = Khachhang::find($id);
        $kh->kh_taiKhoan = $request->input('kh_taiKhoan');
        $kh->kh_matKhau = bcrypt('123456');
        $kh->kh_hoTen = $request->input('kh_hoTen');
        $kh->kh_gioiTinh = $request->input('kh_gioiTinh');
        $kh->kh_email = $request->input('kh_email');
        $kh->kh_ngaySinh = $request->input('kh_ngaySinh');
        $kh->kh_diaChi = $request->input('kh_diaChi');
        $kh->kh_dienThoai = $request->input('kh_dienThoai');
        $kh->kh_trangThai = $request->input('kh_trangThai');
        $kh->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.khachhang.index');
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
        $khachhang = Khachhang::find($id);
        $khachhang->delete();

        Session::flash('alert-warning', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.khachhang.index');
    }
}
