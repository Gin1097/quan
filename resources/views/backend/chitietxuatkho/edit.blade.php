@extends('backend.layout.master')

@section('title')
Chỉnh sửa chi tiết phiếu xuất kho
@endsection

@section('feature-title')
Chỉnh sửa chi tiết phiếu xuất kho    
@endsection

@section('feature-description')
Chỉnh sửa chi tiết phiếu xuất kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.ctxk.update', ['id' => $chitietxuatkho->sp_ma, 'id1' => $chitietxuatkho->xk_ma ]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $chitietxuatkho->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="xk_ma">Mã phiếu xuất</label>
        <select name="xk_ma" class="form-control">
            @foreach($danhsachxuatkho as $xuatkho)
                @if(old('xk_ma', $chitietxuatkho->xk_ma) == $xuatkho->xk_ma)
                <option value="{{ $xuatkho->xk_ma }}" selected>{{ $xuatkho->xk_ma }}</option>
                @else
                <option value="{{ $xuatkho->xk_ma }}">{{ $xuatkho->xk_ma }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ctxk_soluong">Số lượng</label>
        <input type="text" class="form-control" id="ctxk_soluong" name="ctxk_soluong" placeholder="Nhập số lượng xuất kho" value="{{  $chitietxuatkho->ctxk_soluong }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection