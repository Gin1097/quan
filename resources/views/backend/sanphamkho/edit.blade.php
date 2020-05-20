@extends('backend.layout.master')

@section('title')
Chỉnh sửa sản phẩm kho
@endsection

@section('feature-title')
Chỉnh sửa sản phẩm kho    
@endsection

@section('feature-description')
Chỉnh sửa sản phẩm kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.spk.update', ['id' => $spk->sp_ma, 'id2' => $spk->kho_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $spk->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option> 
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="kho_ma">Kho</label>
        <select name="kho_ma" class="form-control">
            @foreach($danhsachkho as $kho)
                @if(old('kho_ma', $spk->kho_ma) == $kho->kho_ma)
                <option value="{{ $kho->kho_ma }}" selected>{{ $kho->kho_ten }}</option>
                @else
                <option value="{{ $kho->kho_ma }}">{{ $kho->kho_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sl_nhap">Số lượng nhập</label>
        <input type="number" class="form-control" id="sl_nhap" name="sl_nhap" value="{{ old('sl_nhap', $spk->sl_nhap) }}">
    </div>
    <div class="form-group">
        <label for="sl_xuat">Số lượng xuất</label>
        <input type="number" class="form-control" id="sl_xuat" name="sl_xuat" value="{{ old('sl_xuat', $spk->sl_xuat) }}">
    </div>
    <div class="form-group">
        <label for="sl_ton">Số lượng tồn</label>
        <input type="number" class="form-control" id="sl_ton" name="sl_ton" value="{{ old('sl_ton', $spk->sl_ton) }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection