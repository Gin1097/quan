@extends('backend.layout.master')

@section('title')
Sửa khách hàng
@endsection

@section('feature-title')
Sửa khách hàng   
@endsection

@section('feature-description')
Sửa khách hàng. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.khachhang.update', ['id' => $kh->kh_ma]) }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="kh_taiKhoan">Tài khoản</label>
        <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" value="{{ old('kh_taiKhoan', $kh->kh_taiKhoan) }}">
    </div>
    <div class="form-group">
        <label for="kh_hoTen">Họ tên</label>
        <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" value="{{ old('kh_hoTen', $kh->kh_hoTen) }}">
    </div>
    <div class="form-group">
        <label for="kh_gioiTinh">Giới tính</label>
        <select name="kh_gioiTinh" class="form-control">
                @if(old('kh_gioiTinh') == $kh->kh_gioiTinh)
                <option value="{{ $kh->kh_gioiTinh }}" selected>{{ $kh->kh_gioiTinh }}</option>
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
                <option value="2">Khác</option>
                @else
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
                <option value="2">Khác</option>
                @endif
        </select>
    </div>
    <div class="form-group">
        <label for="kh_email">Email</label>
        <input type="email" class="form-control" id="kh_email" name="kh_email" value="{{ old('kh_email', $kh->kh_email) }}">
    </div>
    <div class="form-group">
        <label for="kh_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="kh_ngaySinh" name="kh_ngaySinh" value="{{ old('kh_ngaySinh', $kh->kh_ngaySinh) }}">
    </div>
    <div class="form-group">
        <label for="kh_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" placeholder="Nhập địa chỉ" value="{{ old('kh_diaChi', $kh->kh_diaChi) }}">
    </div>
    <div class="form-group">
        <label for="kh_dienThoai">SDT</label>
        <input type="number" class="form-control" id="kh_dienThoai" name="kh_dienThoai" value="{{ old('kh_dienThoai', $kh->kh_dienThoai) }}">
    </div>
    <div class="form-group">
        <label for="kh_trangThai">Trạng thái</label>
        <select name="kh_trangThai" class="form-control">
            <option value="2" {{ old('kh_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
            <option value="1" {{ old('kh_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection