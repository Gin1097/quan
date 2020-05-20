@extends('backend.layout.master')

@section('title')
Sửa đơn chi tiết đơn hàng
@endsection

@section('feature-title')
Sửa đơn chi tiết đơn hàng    
@endsection

@section('feature-description')
Sửa đơn chi tiết đơn hàng. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.chitietdonhang.update', ['id' => $ctdh->dh_ma, 'id1' => $ctdh->sp_ma, 'id2' => $ctdh->m_ma]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="dh_ma">Đơn hàng</label>
        <select name="dh_ma" class="form-control">
            @foreach($danhsachdonhang as $donhang)
                @if(old('dh_ma', $ctdh->dh_ma) == $donhang->dh_ma)
                <option value="{{ $donhang->dh_ma }}" selected>{{ $donhang->dh_nguoiGui }}</option>
                @else
                <option value="{{ $donhang->dh_ma }}">{{ $donhang->dh_nguoiGui }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $ctdh->sp_ma) == $sanpham->sp_ma)
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
                @if(old('m_ma', $ctdh->m_ma) == $mau->m_ma)
                <option value="{{ $mau->m_ma }}" selected>{{ $mau->m_ten }}</option>
                @else
                <option value="{{ $mau->m_ma }}">{{ $mau->m_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ctdh_soLuong">Số lượng</label>
        <input type="text" class="form-control" id="ctdh_soLuong" name="ctdh_soLuong" value="{{ old('ctdh_soLuong', $ctdh->ctdh_soLuong) }}">
    </div>
    <div class="form-group">
        <label for="ctdh_donGia">Đơn giá</label>
        <input type="number" class="form-control" id="ctdh_donGia" name="ctdh_donGia" value="{{ old('ctdh_donGia', $ctdh->ctdh_donGia) }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection