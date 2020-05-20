@extends('backend.layout.master')

@section('title')
Chỉnh sửa xuất xứ
@endsection

@section('feature-title')
Chỉnh sửa xuất xứ    
@endsection

@section('feature-description')
Chỉnh sửa xuất xứ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.xuatxu.update', ['id' => $xuatxu->xx_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="xx_ten">Tên xuất xứ</label>
        <input type="text" class="form-control" id="xx_ten" name="xx_ten" placeholder="Nhập tên xuất xứ" value="{{  $xuatxu->xx_ten }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection