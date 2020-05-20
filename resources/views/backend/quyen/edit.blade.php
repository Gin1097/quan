@extends('backend.layout.master')

@section('title')
Chỉnh sửa quyền
@endsection

@section('feature-title')
Chỉnh sửa quyền    
@endsection

@section('feature-description')
Chỉnh sửa quyền. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.quyen.update', ['id' => $quyen->q_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="q_ten">Tên quyền</label>
        <input type="text" class="form-control" id="q_ten" name="q_ten" placeholder="Nhập tên quyền" value="{{  $quyen->q_ten }}">
    </div>
    <div class="form-group">
        <label for="q_dienGiai">Chi tiết</label>
        <input type="text" class="form-control" id="q_dienGiai" name="q_dienGiai" placeholder="Nhập chi tiết quyền" value="{{  $quyen->q_dienGiai }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection