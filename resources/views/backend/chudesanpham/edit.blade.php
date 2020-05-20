@extends('backend.layout.master')

@section('title')
Chỉnh sửa chủ đề sản phẩm
@endsection

@section('feature-title')
Chỉnh sửa chủ đề sản phẩm    
@endsection

@section('feature-description')
Chỉnh sửa chủ đề sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.cdsp.update', ['id' => $cdsp->sp_ma, 'id1' => $cdsp->cd_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma', $cdsp->sp_ma) == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option> 
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="cd_ma">Chủ đề</label>
        <select name="cd_ma" class="form-control">
            @foreach($danhsachchude as $chude)
                @if(old('cd_ma', $cdsp->cd_ma) == $chude->cd_ma)
                <option value="{{ $chude->cd_ma }}" selected>{{ $chude->cd_ten }}</option>
                @else
                <option value="{{ $chude->cd_ma }}">{{ $chude->cd_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection