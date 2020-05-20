@extends('backend.layout.master')

@section('title')
Chỉnh sửa màu sản phẩm
@endsection

@section('feature-title')
Chỉnh sửa màu sản phẩm    
@endsection

@section('feature-description')
Chỉnh sửa màu sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.msp.update', ['id' => $msp->sp_ma, 'id2' => $msp->m_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $msp->sp_ma) == $sanpham->sp_ma)
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
                @if(old('m_ma', $msp->m_ma) == $mau->m_ma)
                <option value="{{ $mau->m_ma }}" selected>{{ $mau->m_ten }}</option>
                @else
                <option value="{{ $mau->m_ma }}">{{ $mau->m_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="msp_soluong">Số lượng</label>
        <input type="number" class="form-control" id="msp_soluong" name="msp_soluong" value="{{ old('msp_soluong', $msp->msp_soluong) }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection