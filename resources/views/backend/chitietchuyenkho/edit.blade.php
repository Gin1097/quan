@extends('backend.layout.master')

@section('title')
Chỉnh sửa chi tiết phiếu chuyển kho
@endsection

@section('feature-title')
Chỉnh sửa chi tiết phiếu chuyển kho    
@endsection

@section('feature-description')
Chỉnh sửa chi tiết phiếu chuyển kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.ctck.update', ['id' => $chitietchuyenkho->ck_ma, 'id1' => $chitietchuyenkho->sp_ma ]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $chitietchuyenkho->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ck_ma">Mã phiếu chuyển</label>
        <select name="ck_ma" class="form-control">
            @foreach($danhsachchuyenkho as $chuyenkho)
                @if(old('ck_ma', $chitietchuyenkho->ck_ma) == $chuyenkho->ck_ma)
                <option value="{{ $chuyenkho->ck_ma }}" selected>{{ $chuyenkho->ck_ma }}</option>
                @else
                <option value="{{ $chuyenkho->ck_ma }}">{{ $chuyenkho->ck_ma }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ctck_soLuong">Số lượng</label>
        <input type="text" class="form-control" id="ctck_soLuong" name="ctck_soLuong" placeholder="Nhập số lượng chuyển kho" value="{{  $chitietchuyenkho->ctck_soLuong }}">
    </div>
    <div class="form-group">
        <label for="ctck_thanhtien">Thành tiền</label>
        <input type="text" class="form-control" id="ctck_thanhtien" name="ctck_thanhtien" placeholder="Nhập đơn giá chuyển kho" value="{{  $chitietchuyenkho->ctck_thanhtien }}">
    </div>
    <div class="form-group">
        <label for="khocu_ma">Kho cũ</label>
        <select name="khocu_ma" class="form-control">
            @foreach($danhsachkho as $kho)
                @if(old('khocu_ma', $chitietchuyenkho->khocu_ma) == $kho->kho_ma)
                <option value="{{ $kho->kho_ma }}" selected>{{ $kho->kho_ten }}</option>
                @else
                <option value="{{ $kho->kho_ma }}">{{ $kho->kho_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="khomoi_ma">Kho mới</label>
        <select name="khomoi_ma" class="form-control">
            @foreach($danhsachkho as $kho)
                @if(old('khomoi_ma', $chitietchuyenkho->khomoi_ma) == $kho->kho_ma)
                <option value="{{ $kho->kho_ma }}" selected>{{ $kho->kho_ten }}</option>
                @else
                <option value="{{ $kho->kho_ma }}">{{ $kho->kho_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection