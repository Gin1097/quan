@extends('backend.layout.master')

@section('title')
Chỉnh sửa nhà cung cấp
@endsection

@section('feature-title')
Chỉnh sửa nhà cung cấp    
@endsection

@section('feature-description')
Chỉnh sửa nhà cung cấp. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.nhacungcap.update', ['id' => $ncc->ncc_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="xx_ma">Xuất xứ</label>
        <select name="xx_ma" class="form-control">
            @foreach($danhsachxuatxu as $xuatxu)
                @if(old('xx_ma', $ncc->xx_ma) == $xuatxu->xx_ma)
                <option value="{{ $xuatxu->xx_ma }}" selected>{{ $xuatxu->xx_ten }}</option>
                @else
                <option value="{{ $xuatxu->xx_ma }}">{{ $xuatxu->xx_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ncc_ten">Tên nhà cung cấp</label>
        <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" placeholder="Nhập tên nhà cung cấp" value="{{  $ncc->ncc_ten }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiDien">Đại diện</label>
        <input type="text" class="form-control" id="ncc_daiDien" name="ncc_daiDien" placeholder="Nhập đại diện nhà cung cấp" value="{{  $ncc->ncc_daiDien }}">
    </div>
    <div class="form-group">
        <label for="ncc_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" placeholder="Nhập địa chỉ nhà cung cấp" value="{{  $ncc->ncc_diaChi }}">
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">Điện thoại</label>
        <input type="number" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" placeholder="Nhập số điện thoại" value="{{  $ncc->ncc_dienThoai }}">
    </div>
    <div class="form-group">
        <label for="ncc_email">Email</label>
        <input type="email" class="form-control" id="ncc_email" name="ncc_email" placeholder="Nhập email nhà cung cấp" value="{{  $ncc->ncc_email }}">
    </div>
    <select name="ncc_trangThai" class="form-control">
        <option value="2" {{ old('ncc_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
        <option value="1" {{ old('ncc_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
    </select>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection