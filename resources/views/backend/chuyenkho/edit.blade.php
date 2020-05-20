@extends('backend.layout.master')

@section('title')
Chỉnh sửa phiếu chuyển kho
@endsection

@section('feature-title')
Chỉnh sửa phiếu chuyển kho    
@endsection

@section('feature-description')
Chỉnh sửa phiếu chuyển kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.chuyenkho.update', ['id' => $chuyenkho->ck_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="ck_ngay">Ngày lập phiếu</label>
        <input type="text" class="form-control" id="ck_ngay" name="ck_ngay" placeholder="Nhập ngày lập phiếu" value="{{  $chuyenkho->ck_ngay }}">
    </div>
    <div class="form-group">
        <label for="ck_lydo">Lý do</label>
        <input type="text" class="form-control" id="ck_lydo" name="ck_lydo" placeholder="Nhập lý do chuyển kho" value="{{  $chuyenkho->ck_lydo }}">
    </div>
    <div class="form-group">
        <label for="nv_ma">Người lập phiếu</label>
        <select name="nv_ma" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_ma', $chuyenkho->nv_ma) == $nhanvien->nv_ma)
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