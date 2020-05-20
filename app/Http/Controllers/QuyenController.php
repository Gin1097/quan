<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quyen;
use Session;
use Validator;
use App\Http\Requests\QuyenCreateRequest;

class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachquyen = Quyen::all();

        return view('backend.quyen.index')
                ->with('danhsachquyen', $danhsachquyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.quyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuyenCreateRequest $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'q_ten' => 'required|min:3|max:50|unique:quyen',
            'q_dienGiai' => 'required|min:3|max:100'
        ]);

        // // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // // Chuyển hướng về view "Thêm mới" với,
        // // - Thông báo lỗi vi phạm các quy luật.
        // // - Dữ liệu cũ (người dùng đã nhập).
        if ($validator->fails()) {
            return redirect(route('backend.quyen.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $q = new Quyen();
        $q->q_ten = $request->input('q_ten');
        $q->q_dienGiai = $request->input('q_dienGiai');
        $q->q_trangThai = 2;
        $q->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.quyen.index');
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
        $quyen = Quyen::find($id);
        return view('backend.quyen.edit')
                ->with('quyen', $quyen);
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
        $quyen = Quyen::find($id);
        $quyen->q_ten = $request->input('q_ten');
        $quyen->q_dienGiai = $request->input('q_dienGiai');
        $quyen->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.quyen.index');
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
        $quyen = Quyen::find($id);
        $quyen->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.quyen.index');
    }
}
