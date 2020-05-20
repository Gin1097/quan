@extends('backend.layout.master')

@section('title')
Chỉnh sửa kho
@endsection

@section('feature-title')
Chỉnh sửa kho    
@endsection

@section('feature-description')
Chỉnh sửa kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.kho.update', ['id' => $kho->kho_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="kho_ten">Tên kho</label>
        <input type="text" class="form-control" id="kho_ten" name="kho_ten" placeholder="Nhập tên kho" value="{{  $kho->kho_ten }}">
    </div>
    <div class="form-group">
        <label for="kho_diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="kho_diachi" name="kho_diachi" placeholder="Nhập địa chỉ kho" value="{{  $kho->kho_diachi }}">
    </div>
    <div class="form-group">
        <label for="kho_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="kho_dienGiai" name="kho_dienGiai" placeholder="Nhập diển giải" value="{{  $kho->kho_dienGiai }}">
    </div>
    <div class="form-group">
        <label for="kho_sdt">Điện thoại</label>
        <input type="text" class="form-control" id="kho_sdt" name="kho_sdt" placeholder="Nhập số điện thoại" value="{{  $kho->kho_sdt }}">
    </div>
    <div class="form-group">
        <label for="kho_quanly">Quản lý</label>
        <input type="text" class="form-control" id="kho_quanly" name="kho_quanly" placeholder="Nhập tên người quản lý" value="{{  $kho->kho_quanly }}">
    </div>
    <div class="form-group">
    <select name="kho_trangThai" class="form-control">
        <option value="2" {{ old('kho_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
        <option value="1" {{ old('kho_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
    </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection