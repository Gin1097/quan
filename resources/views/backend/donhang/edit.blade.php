@extends('backend.layout.master')

@section('title')
Sửa đơn hàng
@endsection

@section('feature-title')
Sửa đơn hàng    
@endsection

@section('feature-description')
Sửa đơn hàng. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.donhang.update', ['id' => $dh->dh_ma]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="kh_ma">Tên khách hàng</label>
        <select name="kh_ma" class="form-control">
            @foreach($danhsachkhachhang as $khachhang)
                @if(old('kh_ma', $dh->kh_ma) == $khachhang->kh_ma)
                <option value="{{ $khachhang->kh_ma }}" selected>{{ $khachhang->kh_hoTen }}</option>
                @else
                <option value="{{ $khachhang->kh_ma }}">{{ $khachhang->kh_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="dh_nguoiNhan">Tên người nhận</label>
        <input type="text" class="form-control" id="dh_nguoiNhan" name="dh_nguoiNhan" value="{{ old('dh_nguoiNhan', $dh->dh_nguoiNhan) }}">
    </div>
    <div class="form-group">
        <label for="dh_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="dh_diaChi" name="dh_diaChi" value="{{ old('dh_diaChi', $dh->dh_diaChi) }}">
    </div>
    <div class="form-group">
        <label for="dh_dienThoai">Điện thoại</label>
        <input type="number" class="form-control" id="dh_dienThoai" name="dh_dienThoai" value="{{ old('dh_dienThoai', $dh->dh_dienThoai) }}">
    </div>
    <div class="form-group">
        <label for="dh_nguoiGui">Người gửi</label>
        <input type="text" class="form-control" id="dh_nguoiGui" name="dh_nguoiGui" value="{{ old('dh_nguoiGui', $dh->dh_nguoiGui) }}">
    </div>
    <div class="form-group">
        <label for="dh_loiChuc">Lời chúc</label>
        <input type="text" class="form-control" id="dh_loiChuc" name="dh_loiChuc" value="{{ old('dh_loiChuc', $dh->dh_loiChuc) }}">
    </div>
    <div class="form-group">
        <label for="dh_loiChuc">Đã thanh toán đơn hàng</label>
        <input type="text" class="form-control" id="dh_loiChuc" name="dh_loiChuc" value="{{ old('dh_loiChuc', $dh->dh_loiChuc) }}">
    </div>
    <div class="form-group">
        <label for="nv_xuLy">Nhân viên xử lý</label>
        <select name="nv_xuLy" class="form-control">
            @foreach($danhsachnhanvien as $nhanvienxuly)
                @if(old('nv_xuLy', $dh->nv_xuLy) == $nhanvienxuly->nv_ma)
                <option value="{{ $nhanvienxuly->nv_ma }}" selected>{{ $nhanvienxuly->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvienxuly->nv_ma }}">{{ $nhanvienxuly->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        <label for="dh_ngayXuLy">Ngày xử lý đơn hàng</label>
        <input type="text" class="form-control" id="dh_ngayXuLy" name="dh_ngayXuLy" value="{{ old('dh_ngayXuLy', $dh->dh_ngayXuLy) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nv_giaoHang">Nhân viên giao hàng</label>
        <select name="nv_giaoHang" class="form-control">
            @foreach($danhsachnhanvien as $nhanviengiaohang)
                @if(old('nv_giaoHang', $dh->nv_giaoHang) == $nhanviengiaohang->nv_ma)
                <option value="{{ $nhanviengiaohang->nv_ma }}" selected>{{ $nhanviengiaohang->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanviengiaohang->nv_ma }}">{{ $nhanviengiaohang->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        <label for="dh_ngayLapPhieuGiao">Ngày lập phiếu giao</label>
        <input type="text" class="form-control" id="dh_ngayLapPhieuGiao" name="dh_ngayLapPhieuGiao" value="{{ old('dh_ngayLapPhieuGiao', $dh->dh_ngayLapPhieuGiao) }}" data-mask-datetime>
    </div>
    <div class="form-group" >
        <label for="dh_daThanhToan">Đã thanh toán</label>
        <input type="text" class="form-control" id="dh_daThanhToan" name="dh_daThanhToan" value="{{ old('dh_daThanhToan', $dh->dh_daThanhToan) }}" data-mask-datetime>
    </div>
    <div class="form-group" >
        <label for="dh_ngayGiaoHang">Ngày giao hàng</label>
        <input type="text" class="form-control" id="dh_ngayGiaoHang" name="dh_ngayGiaoHang" value="{{ old('dh_ngayGiaoHang', $dh->dh_ngayGiaoHang) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="vc_ma">Vận chuyển</label>
        <select name="vc_ma" class="form-control">
            @foreach($danhsachvanchuyen as $vanchuyen)
                @if(old('vc_ma', $dh->vc_ma) == $vanchuyen->vc_ma)
                <option value="{{ $vanchuyen->vc_ma }}" selected>{{ $vanchuyen->vc_ten }}</option>
                @else
                <option value="{{ $vanchuyen->vc_ma }}">{{ $vanchuyen->vc_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tt_ma">Thanh toán</label>
        <select name="tt_ma" class="form-control">
            @foreach($danhsachthanhtoan as $thanhtoan)
                @if(old('tt_ma', $dh->tt_ma) == $thanhtoan->tt_ma)
                <option value="{{ $thanhtoan->tt_ma }}" selected>{{ $thanhtoan->tt_ma }}</option>
                @else
                <option value="{{ $thanhtoan->tt_ma }}">{{ $thanhtoan->tt_ma }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group" >
        <label for="dh_thoiGianDatHang">Thời gian đặt hàng</label>
        <input type="text" class="form-control" id="dh_thoiGianDatHang" name="dh_thoiGianDatHang" value="{{ old('dh_thoiGianDatHang', $dh->dh_thoiGianDatHang) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="dh_thoiGianNhanHang">Thời gian nhận hàng</label>
        <input type="text" class="form-control" id="dh_thoiGianNhanHang" name="dh_thoiGianNhanHang" value="{{ old('dh_thoiGianNhanHang', $dh->dh_thoiGianNhanHang) }}" data-mask-datetime>
    </div>
    <select name="dh_trangThai" class="form-control">
        <option value="2" {{ old('dh_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
        <option value="1" {{ old('dh_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
    </select>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection
@section('custom-scripts')

@endsection