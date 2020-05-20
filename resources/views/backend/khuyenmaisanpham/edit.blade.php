@extends('backend.layout.master')

@section('title')
Chỉnh sửa khuyến mãi sản phẩm
@endsection

@section('feature-title')
Chỉnh sửa khuyến mãi sản phẩm    
@endsection

@section('feature-description')
Chỉnh sửa khuyến mãi sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.kmsp.update', ['id' => $kmsp->km_ma, 'id1' => $kmsp->sp_ma, 'id2' => $kmsp->m_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="km_ma">Tên khuyến mãi</label>
        <select name="km_ma" class="form-control">
            @foreach($danhsachkhuyenmai as $khuyenmai)
                @if(old('km_ma', $kmsp->km_ma) == $khuyenmai->km_ma)
                <option value="{{ $khuyenmai->km_ma }}" selected>{{ $khuyenmai->km_ten }}</option>
                @else
                <option value="{{ $khuyenmai->km_ma }}">{{ $khuyenmai->km_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $kmsp->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="m_ma">Màu</label>
        <select name="m_ma" class="form-control">
            @foreach($danhsachmau as $mau)
                @if(old('m_ma', $kmsp->m_ma) == $mau->m_ma)
                <option value="{{ $mau->m_ma }}" selected>{{ $mau->m_ten }}</option>
                @else
                <option value="{{ $mau->m_ma }}">{{ $mau->m_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="kmsp_giaTri">Giá trị</label>
        <input type="text" class="form-control" id="kmsp_giaTri" name="kmsp_giaTri" placeholder="Nhập nội dung khuyến mãi" value="{{  $kmsp->kmsp_giaTri }}">
    </div>
    <div class="form-group">
    <select name="kmsp_trangThai" class="form-control">
        <option value="2" {{ old('kmsp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
        <option value="1" {{ old('kmsp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
    </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection