@extends('backend.layout.master')

@section('title')
Chỉnh sửa đơn vị tính
@endsection

@section('feature-title')
Chỉnh sửa đơn vị tính    
@endsection

@section('feature-description')
Chỉnh sửa đơn vị tính. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.donvitinh.update', ['id' => $dvt->dvt_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="dvt_ten">Tên đơn vị tính</label>
        <input type="text" class="form-control" id="dvt_ten" name="dvt_ten" placeholder="Nhập tên đơn vị tính" value="{{  $dvt->dvt_ten }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection