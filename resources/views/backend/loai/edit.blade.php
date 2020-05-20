@extends('backend.layout.master')

@section('title')
Thêm mới Loại
@endsection

@section('feature-title')
Thêm mới loại    
@endsection

@section('feature-description')
Thêm mới loại. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.loai.update', ['id' => $loai->l_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="cd_ten">Tên loại</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" aria-describedby="l_tenHelp" placeholder="Nhập tên loại" value="{{  $loai->l_ten }}">
        <small id="l_tenHelp" class="form-text text-muted">Nhập tên loại. Giới hạn trong 50 ký tự.</small>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection