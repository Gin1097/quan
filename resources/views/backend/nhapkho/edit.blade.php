@extends('backend.layout.master')

@section('title')
Chỉnh sửa nhập kho
@endsection

@section('feature-title')
Chỉnh sửa nhập kho    
@endsection

@section('feature-description')
Chỉnh sửa nhập kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.nhapkho.update', ['id' => $nk->nk_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="nk_ngaylap">Ngày lập</label>
        <input type="text" class="form-control" id="nk_ngaylap" name="nk_ngaylap" placeholder="Nhập ngày lập" value="{{  $nk->nk_ngaylap }}">
    </div>
    <div class="form-group">
        <label for="nk_lydo">Lý do</label>
        <input type="text" class="form-control" id="nk_lydo" name="nk_lydo" placeholder="Nhập lý do nhập kho" value="{{  $nk->nk_lydo }}">
    </div>
    <div class="form-group">
        <label for="nk_tongtien">Tổng tiền</label>
        <input type="text" class="form-control" id="nk_tongtien" name="nk_tongtien" placeholder="Nhập tổng tiền" value="{{  $hnk->nk_tongtien }}">
    </div>
    <div class="form-group">
        <label for="nv_ma">Nhân viên lập</label>
        <select name="nv_ma" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_ma', $nk->nv_ma) == $nhanvien->nv_ma)
                <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ncc_ma">Nhà cung cấp</label>
        <select name="ncc_ma" class="form-control">
            @foreach($danhsachnhacungcap as $nhacungcap)
                @if(old('ncc_ma', $nk->ncc_ma) == $nhacungcap->ncc_ma)
                <option value="{{ $nhacungcap->ncc_ma }}" selected>{{ $nhacungcap->tt_ten }}</option>
                @else
                <option value="{{ $nhacungcap->ncc_ma }}">{{ $nhacungcap->tt_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection