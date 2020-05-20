@extends('backend.layout.master')

@section('title')
Chỉnh sửa chi tiết phiếu nhập
@endsection

@section('feature-title')
Chỉnh sửa chi tiết phiếu nhập    
@endsection

@section('feature-description')
Chỉnh sửa chi tiết nhập. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.chitietnhap.update', ['id' => $chitietnhap->pn_ma, 'id1' => $chitietnhap->sp_ma, 'id2' => $chitietnhap->m_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="pn_ma">Mã phiếu</label>
        <select name="pn_ma" class="form-control">
            @foreach($danhsachphieunhap as $phieunhap)
                @if(old('pn_ma', $chitietnhap->pn_ma) == $phieunhap->pn_ma)
                <option value="{{ $phieunhap->pn_ma }}" selected>{{ $phieunhap->pn_ma }}</option>
                @else
                <option value="{{ $phieunhap->pn_ma }}">{{ $phieunhap->pn_ma }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $chitietnhap->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_giaGoc">Giá gốc</label>
        <select name="sp_giaGoc" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $chitietnhap->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_giaGoc }}" selected>{{ $sanpham->sp_giaGoc }}</option>
                @else
                <option value="{{ $sanpham->sp_giaGoc }}">{{ $sanpham->sp_giaGoc }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="m_ma">Màu</label>
        <select name="m_ma" class="form-control">
            @foreach($danhsachmau as $mau)
                @if(old('m_ma', $chitietnhap->m_ma) == $mau->m_ma)
                <option value="{{ $mau->m_ma }}" selected>{{ $mau->m_ten }}</option>
                @else
                <option value="{{ $mau->m_ma }}">{{ $mau->m_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ctn_soLuong">Số lượng</label>
        <input type="text" class="form-control" id="ctn_soLuong" name="ctn_soLuong" placeholder="Nhập số lượng " value="{{  $chitietnhap->ctn_soLuong }}">
    </div>
    
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection