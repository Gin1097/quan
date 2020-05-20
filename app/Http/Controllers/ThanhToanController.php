<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thanhtoan;
use Session;
use Validator;
use App\Http\Requests\ThanhToanCreateRequest;

class ThanhToanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachthanhtoan = Thanhtoan::all();

        return view('backend.thanhtoan.index')
                ->with('danhsachthanhtoan', $danhsachthanhtoan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.thanhtoan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThanhToanCreateRequest $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'tt_ten' => 'required|min:3|max:50|unique:thanhtoan',
            'tt_dienGiai' => 'required|min:3|max:100'
        ]);

        // // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // // Chuyển hướng về view "Thêm mới" với,
        // // - Thông báo lỗi vi phạm các quy luật.
        // // - Dữ liệu cũ (người dùng đã nhập).
        if ($validator->fails()) {
            return redirect(route('backend.thanhtoan.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $tt = new Thanhtoan();
        $tt->tt_ten = $request->input('tt_ten');
        $tt->tt_dienGiai = $request->input('tt_dienGiai');
        $tt->tt_trangThai = 2;
        $tt->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.thanhtoan.index');
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
        $thanhtoan = Thanhtoan::find($id);
        return view('backend.thanhtoan.edit')
                ->with('thanhtoan', $thanhtoan);
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
        $thanhtoan = Thanhtoan::find($id);
        $thanhtoan->tt_ten = $request->input('tt_ten');
        $thanhtoan->tt_dienGiai = $request->input('tt_dienGiai');
        $thanhtoan->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.thanhtoan.index');
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
        $thanhtoan = Thanhtoan::find($id);
        $thanhtoan->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.thanhtoan.index');
    }
}
