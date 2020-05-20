@extends('backend.layout.master')

@section('title')
Chỉnh sửa phiếu xuất kho
@endsection

@section('feature-title')
Chỉnh sửa phiếu xuất kho    
@endsection

@section('feature-description')
Chỉnh sửa phiếu xuất kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.xuatkho.update', ['id' => $xuatkho->xk_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="xk_ngaylap">Ngày lập phiếu</label>
        <input type="text" class="form-control" id="xk_ngaylap" name="xk_ngaylap" placeholder="Nhập ngày lập phiếu" value="{{  $xuatkho->xk_ngaylap }}">
    </div>
    <div class="form-group">
        <label for="xk_diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="xk_diachi" name="xk_diachi" placeholder="Nhập địa chỉ xuất kho" value="{{  $xuatkho->xk_diachi }}">
    </div>
    <div class="form-group">
        <label for="xk_lydo">Lý do</label>
        <input type="text" class="form-control" id="xk_lydo" name="xk_lydo" placeholder="Nhập lý do xuất kho" value="{{  $xuatkho->xk_lydo }}">
    </div>
    <div class="form-group">
        <label for="xk_tongtien">Tổng tiền</label>
        <input type="text" class="form-control" id="xk_tongtien" name="xk_tongtien" placeholder="Nhập tổng tiền xuất kho" value="{{  $xuatkho->xk_tongtien }}">
    </div>
    <div class="form-group">
        <label for="nv_ma">Người lập phiếu</label>
        <select name="nv_ma" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_ma', $xuatkho->nv_ma) == $nhanvien->nv_ma)
                <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection