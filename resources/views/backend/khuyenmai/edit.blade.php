@extends('backend.layout.master')

@section('title')
Chỉnh sửa khuyến mãi
@endsection

@section('feature-title')
Chỉnh sửa khuyến mãi    
@endsection

@section('feature-description')
Chỉnh sửa khuyến mãi. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.khuyenmai.update', ['id' => $km->km_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="km_ten">Tên khuyến mãi</label>
        <input type="text" class="form-control" id="km_ten" name="km_ten" placeholder="Nhập thời tên khuyến mãi" value="{{  $km->km_ten }}">
    </div>
    <div class="form-group">
        <label for="km_noiDung">Nội dung khuyến mãi</label>
        <input type="text" class="form-control" id="km_noiDung" name="km_noiDung" placeholder="Nhập nội dung khuyến mãi" value="{{  $km->km_noiDung }}">
    </div>
    <div class="form-group">
        <label for="km_batDau">Thời gian bắt đầu</label>
        <input type="text" class="form-control" id="km_batDau" name="km_batDau" placeholder="Nhập thời gian khuyến mãi" value="{{  $km->km_batDau }}">
    </div>
    <div class="form-group">
        <label for="km_ketThuc">Thời gian kết thúc</label>
        <input type="text" class="form-control" id="km_ketThuc" name="km_ketThuc" placeholder="Nhập nội dung khuyến mãi" value="{{  $km->km_ketThuc }}">
    </div>
    <div class="form-group">
        <label for="km_giaTri">Giá trị</label>
        <input type="text" class="form-control" id="km_giaTri" name="km_giaTri" placeholder="Nhập nội dung khuyến mãi" value="{{  $km->km_giaTri }}">
    </div>
    <div class="form-group">
        <label for="nv_nguoiLap">Người lập</label>
        <select name="nv_nguoiLap" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_nguoiLap', $km->nv_nguoiLap) == $nhanvien->nv_ma)
                <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="km_ngayLap">Ngày lập</label>
        <input type="text" class="form-control" id="km_ngayLap" name="km_ngayLap" placeholder="Nhập thời gian khuyến mãi" value="{{  $km->km_ngayLap }}">
    </div>
    <div class="form-group">
        <label for="nv_kyNhay">Nhân viên ký nháy</label>
        <select name="nv_kyNhay" class="form-control">
            @foreach($danhsachnhanvien as $nhanvienkynhay)
                @if(old('nv_kyNhay', $km->nv_kyNhay) == $nhanvienkynhay->nv_ma)
                <option value="{{ $nhanvienkynhay->nv_ma }}" selected>{{ $nhanvienkynhay->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvienkynhay->nv_ma }}">{{ $nhanvienkynhay->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_kyDuyet">Nhân viên ký duyệt</label>
        <select name="nv_kyDuyet" class="form-control">
            @foreach($danhsachnhanvien as $nhanvienkyduyet)
                @if(old('nv_kyDuyet', $km->nv_kyDuyet) == $nhanvienkyduyet->nv_ma)
                <option value="{{ $nhanvienkyduyet->nv_ma }}" selected>{{ $nhanvienkyduyet->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvienkyduyet->nv_ma }}">{{ $nhanvienkyduyet->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <select name="km_trangThai" class="form-control">
        <option value="2" {{ old('km_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
        <option value="1" {{ old('km_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
    </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection