@extends('backend.layout.master')

@section('title')
Chỉnh sửa màu
@endsection

@section('feature-title')
Chỉnh sửa màu    
@endsection

@section('feature-description')
Chỉnh sửa màu. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.mau.update', ['id' => $mau->m_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="m_ten">Tên màu</label>
        <input type="text" class="form-control" id="m_ten" name="m_ten" placeholder="Nhập tên xuất xứ" value="{{  $mau->m_ten }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection