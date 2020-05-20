@extends('backend.layout.master')

@section('title')
Chỉnh sửa thanh toán
@endsection

@section('feature-title')
Chỉnh sửa thanh toán    
@endsection

@section('feature-description')
Chỉnh sửa thanh toán. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.thanhtoan.update', ['id' => $thanhtoan->tt_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="tt_ten">Tên thanh toán</label>
        <input type="text" class="form-control" id="tt_ten" name="tt_ten" placeholder="Nhập tên thanh toán" value="{{  $thanhtoan->tt_ten }}">
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Chi tiết</label>
        <input type="text" class="form-control" id="tt_dienGiai" name="tt_dienGiai" placeholder="Nhập chi tiết thanh toán" value="{{  $thanhtoan->tt_dienGiai }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection