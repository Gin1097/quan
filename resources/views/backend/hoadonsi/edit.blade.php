@extends('backend.layout.master')

@section('title')
Chỉnh sửa hóa đơn sỉ
@endsection

@section('feature-title')
Chỉnh sửa hóa đơn sỉ    
@endsection

@section('feature-description')
Chỉnh sửa hóa đơn sỉ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.hoadonsi.update', ['id' => $hds->hds_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="hds_nguoiMuaHang">Người mua hàng</label>
        <input type="text" class="form-control" id="hds_nguoiMuaHang" name="hds_nguoiMuaHang" placeholder="Nhập tên người mua hàng" value="{{  $hds->hds_nguoiMuaHang }}">
    </div>
    <div class="form-group">
        <label for="hds_tenDonVi">Tên đơn vị</label>
        <input type="text" class="form-control" id="hds_tenDonVi" name="hds_tenDonVi" placeholder="Nhập nội dung khuyến mãi" value="{{  $hds->hds_tenDonVi }}">
    </div>
    <div class="form-group">
        <label for="hds_diaChi">Địa chỉ đơn vị</label>
        <input type="text" class="form-control" id="hds_diaChi" name="hds_diaChi" placeholder="Nhập địa chỉ" value="{{  $hds->hds_diaChi }}">
    </div>
    <div class="form-group">
        <label for="hds_maSoThue">Mã số thuế đơn vị</label>
        <input type="text" class="form-control" id="hds_maSoThue" name="hds_maSoThue" placeholder="Nhập mã số thuế đơn vị" value="{{  $hds->hds_maSoThue }}">
    </div>
    <div class="form-group">
        <label for="hds_soTaiKhoan">Số tài khoản</label>
        <input type="text" class="form-control" id="hds_soTaiKhoan" name="hds_soTaiKhoan" placeholder="Nhập số tài khoản" value="{{  $hds->hds_soTaiKhoan }}">
    </div>
    <div class="form-group">
        <label for="nv_lapHoaDon">Nhân viên lập hóa đơn</label>
        <select name="nv_lapHoaDon" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_lapHoaDon', $nhanvien->nv_lapHoaDon) == $nhanvien->nv_ma)
                <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="hds_ngayXuatHoaDon">Ngày xuất hóa đơn</label>
        <input type="text" class="form-control" id="hds_ngayXuatHoaDon" name="hds_ngayXuatHoaDon" placeholder="Nhập thời gian xuất hóa đơn" value="{{  $hds->hds_ngayXuatHoaDon }}">
    </div>
    <div class="form-group">
        <label for="nv_thuTruong">Nhân viên thủ trưởng</label>
        <select name="nv_thuTruong" class="form-control">
            @foreach($danhsachnhanvien as $nhanvienthutruong)
                @if(old('nv_thuTruong', $hds->nv_thuTruong) == $nhanvienthutruong->nv_ma)
                <option value="{{ $nhanvienthutruong->nv_ma }}" selected>{{ $nhanvienthutruong->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvienthutruong->nv_ma }}">{{ $nhanvienthutruong->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="dh_ma">Đơn hàng</label>
        <select name="dh_ma" class="form-control">
            @foreach($danhsachdonhang as $donhang)
                @if(old('dh_ma', $hds->dh_ma) == $donhang->dh_ma)
                <option value="{{ $donhang->dh_ma }}" selected>{{ $donhang->dh_ma }}</option>
                @else
                <option value="{{ $donhang->dh_ma }}">{{ $donhang->dh_ma }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tt_ma">Thanh toán</label>
        <select name="tt_ma" class="form-control">
            @foreach($danhsachthanhtoan as $thanhtoan)
                @if(old('tt_ma', $hds->tt_ma) == $thanhtoan->tt_ma)
                <option value="{{ $thanhtoan->tt_ma }}" selected>{{ $thanhtoan->tt_ten }}</option>
                @else
                <option value="{{ $thanhtoan->tt_ma }}">{{ $thanhtoan->tt_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <select name="hds_trangThai" class="form-control">
        <option value="2" {{ old('hds_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
        <option value="1" {{ old('hds_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
    </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection