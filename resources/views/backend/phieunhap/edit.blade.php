@extends('backend.layout.master')

@section('title')
Chỉnh sửa phiếu nhập
@endsection

@section('feature-title')
Chỉnh sửa phiếu nhập    
@endsection

@section('feature-description')
Chỉnh sửa phiếu nhập. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.phieunhap.update', ['id' => $phieunhap->pn_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="pn_nguoiGiao">Người giao</label>
        <input type="text" class="form-control" id="pn_nguoiGiao" name="pn_nguoiGiao" placeholder="Nhập tên người giao" value="{{  $phieunhap->pn_nguoiGiao }}">
    </div>
    <div class="form-group">
        <label for="pn_soHoaDon">Số hóa đơn</label>
        <input type="text" class="form-control" id="pn_soHoaDon" name="pn_soHoaDon" placeholder="Nhập số hóa đơn" value="{{  $phieunhap->pn_soHoaDon }}">
    </div>
    <div class="form-group">
        <label for="pn_ngayXuatHoaDon">Ngày xuất hóa đơn</label>
        <input type="text" class="form-control" id="pn_ngayXuatHoaDon" name="pn_ngayXuatHoaDon" placeholder="Nhập ngày xuất hóa đơn" value="{{  $phieunhap->pn_ngayXuatHoaDon }}">
    </div>
    <div class="form-group">
        <label for="pn_ghiChu">Ghi chú</label>
        <input type="text" class="form-control" id="pn_ghiChu" name="pn_ghiChu" placeholder="Nhập ghi chú" value="{{  $phieunhap->pn_ghiChu }}">
    </div>
    <div class="form-group">
        <label for="nv_nguoiLapPhieu">Người lập phiếu</label>
        <select name="nv_nguoiLapPhieu" class="form-control">
            @foreach($danhsachnhanvien as $lapphieu)
                @if(old('nv_nguoiLapPhieu', $phieunhap->nv_nguoiLapPhieu) == $lapphieu->nv_ma)
                <option value="{{ $lapphieu->nv_ma }}" selected>{{ $lapphieu->nv_hoTen }}</option>
                @else
                <option value="{{ $lapphieu->nv_ma }}">{{ $lapphieu->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="pn_ngayLapPhieu">Ngày lập phiếu</label>
        <input type="text" class="form-control" id="pn_ngayLapPhieu" name="pn_ngayLapPhieu" placeholder="Nhập ngày lập phiếu" value="{{  $phieunhap->pn_ngayLapPhieu }}">
    </div>
    <div class="form-group">
        <label for="nv_keToan">Nhân viên kế toán</label>
        <select name="nv_keToan" class="form-control">
            @foreach($danhsachnhanvien as $ketoan)
                @if(old('nv_keToan', $phieunhap->nv_keToan) == $ketoan->nv_ma)
                <option value="{{ $ketoan->nv_ma }}" selected>{{ $ketoan->nv_hoTen }}</option>
                @else
                <option value="{{ $ketoan->nv_ma }}">{{ $ketoan->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_thuKho">Người lập phiếu</label>
        <select name="nv_thuKho" class="form-control">
            @foreach($danhsachnhanvien as $thukho)
                @if(old('nv_thuKho', $phieunhap->nv_thuKho) == $thukho->nv_ma)
                <option value="{{ $thukho->nv_ma }}" selected>{{ $thukho->nv_hoTen }}</option>
                @else
                <option value="{{ $thukho->nv_ma }}">{{ $thukho->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ncc_ma">Nhà cung cấp</label>
        <select name="ncc_ma" class="form-control">
            @foreach($danhsachnhacungcap as $nhacungcap)
                @if(old('ncc_ma', $phieunhap->ncc_ma) == $nhacungcap->ncc_ma)
                <option value="{{ $nhacungcap->ncc_ma }}" selected>{{ $nhacungcap->ncc_ten }}</option>
                @else
                <option value="{{ $nhacungcap->ncc_ma }}">{{ $nhacungcap->ncc_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <label for="pn_trangThai">Trạng thái</label>
        <select name="pn_trangThai" class="form-control">
            <option value="2" {{ old('pn_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
            <option value="1" {{ old('pn_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection