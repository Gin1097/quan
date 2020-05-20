@extends('backend.layout.master')

@section('title')
Chỉnh sửa hóa đơn lẻ
@endsection

@section('feature-title')
Chỉnh sửa hóa đơn lẻ    
@endsection

@section('feature-description')
Chỉnh sửa hóa đơn lẻ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.hoadonle.update', ['id' => $hdl->hdl_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="hdl_nguoiMuaHang">Người mua hàng</label>
        <input type="text" class="form-control" id="hdl_nguoiMuaHang" name="hdl_nguoiMuaHang" placeholder="Nhập tên người mua hàng" value="{{  $hdl->hdl_nguoiMuaHang }}">
    </div>
    <div class="form-group">
        <label for="hdl_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="hdl_dienThoai" name="hdl_dienThoai" placeholder="Nhập số điện thoại" value="{{  $hdl->hdl_dienThoai }}">
    </div>
    <div class="form-group">
        <label for="hdl_diaChi">Địa chỉ đơn vị</label>
        <input type="text" class="form-control" id="hdl_diaChi" name="hdl_diaChi" placeholder="Nhập địa chỉ" value="{{  $hdl->hdl_diaChi }}">
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
        <label for="hdl_ngayXuatHoaDon">Ngày xuất hóa đơn</label>
        <input type="text" class="form-control" id="hdl_ngayXuatHoaDon" name="hdl_ngayXuatHoaDon" placeholder="Nhập thời gian xuất hóa đơn" value="{{  $hdl->hdl_ngayXuatHoaDon }}">
    </div>
    <div class="form-group">
        <label for="dh_ma">Đơn hàng</label>
        <select name="dh_ma" class="form-control">
            @foreach($danhsachdonhang as $donhang)
                @if(old('dh_ma', $hdl->dh_ma) == $donhang->dh_ma)
                <option value="{{ $donhang->dh_ma }}" selected>{{ $donhang->dh_ma }}</option>
                @else
                <option value="{{ $donhang->dh_ma }}">{{ $donhang->dh_ma }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection