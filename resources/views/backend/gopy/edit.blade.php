@extends('backend.layout.master')

@section('title')
Chỉnh sửa góp ý
@endsection

@section('feature-title')
Chỉnh sửa góp ý    
@endsection

@section('feature-description')
Chỉnh sửa góp ý. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.gopy.update', ['id' => $gopy->gy_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="gy_thoiGian">Thời gian</label>
        <input type="text" class="form-control" id="gy_thoiGian" name="gy_thoiGian" placeholder="Nhập thời gian góp ý" value="{{  $gopy->gy_thoiGian }}">
    </div>
    <div class="form-group">
        <label for="gy_noiDung">Nội dung</label>
        <input type="text" class="form-control" id="gy_noiDung" name="gy_noiDung" placeholder="Nhập nội dung góp ý" value="{{  $gopy->gy_noiDung }}">
    </div>
    <div class="form-group">
        <label for="kh_ma">Khách hàng</label>
        <select name="kh_ma" class="form-control">
            @foreach($danhsachkhachhang as $khachhang)
                @if(old('kh_ma', $gopy->kh_ma) == $khachhang->kh_ma)
                <option value="{{ $khachhang->kh_ma }}" selected>{{ $khachhang->kh_hoTen }}</option>
                @else
                <option value="{{ $khachhang->kh_ma }}">{{ $khachhang->kh_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $gopy->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection