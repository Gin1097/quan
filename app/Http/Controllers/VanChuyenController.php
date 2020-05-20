<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vanchuyen;
use Session;
use Validator;
use App\Http\Requests\VanChuyenCreateRequest;

class VanChuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $danhsachvanchuyen = Vanchuyen::all();

        return view('backend.vanchuyen.index')
                ->with('danhsachvanchuyen', $danhsachvanchuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.vanchuyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VanChuyenCreateRequest $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'vc_ten' => 'required|min:3|max:50|unique:vanchuyen',
            'vc_chiPhi' => 'required|max:10',
            "vc_dienGiai" => 'required|min:3|max:50'
        ]);

        // // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // // Chuyển hướng về view "Thêm mới" với,
        // // - Thông báo lỗi vi phạm các quy luật.
        // // - Dữ liệu cũ (người dùng đã nhập).
        if ($validator->fails()) {
            return redirect(route('backend.vanchuyen.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $vc = new Vanchuyen();
        $vc->vc_ten = $request->input('vc_ten');
        $vc->vc_chiPhi = $request->input('vc_chiPhi');
        $vc->vc_dienGiai = $request->input('vc_dienGiai');
        $vc->vc_trangThai = 2;
        $vc->save();

        Session::flash('alert-success', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('backend.vanchuyen.index');
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
        $vanchuyen = Vanchuyen::find($id);
        return view('backend.vanchuyen.edit')
                ->with('vanchuyen', $vanchuyen);
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
        $vanchuyen = Vanchuyen::find($id);
        $vanchuyen->vc_ten = $request->input('vc_ten');
        $vanchuyen->vc_chiPhi = $request->input('vc_chiPhi');
        $vanchuyen->vc_dienGiai = $request->input('vc_dienGiai');
        $vanchuyen->save();

        Session::flash('alert-warning', 'Cập nhật thành công ^^~!!!');
        return redirect()->route('backend.vanchuyen.index');
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
        $vanchuyen = Vanchuyen::find($id);
        $vanchuyen->delete();

        Session::flash('alert-danger', 'Xóa thành công ^^~!!!');
        return redirect()->route('backend.vanchuyen.index');
    }
}
