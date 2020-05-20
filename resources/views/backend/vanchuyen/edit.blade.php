@extends('backend.layout.master')

@section('title')
Chỉnh sửa vận chuyển
@endsection

@section('feature-title')
Chỉnh sửa vận chuyển    
@endsection

@section('feature-description')
Chỉnh sửa vận chuyển. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form method="post" action="{{ route('backend.vanchuyen.update', ['id' => $vanchuyen->vc_ma]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="vc_ten">Tên vận chuyển</label>
        <input type="text" class="form-control" id="vc_ten" name="vc_ten" placeholder="Nhập tên vận chuyển" value="{{  $vanchuyen->vc_ten }}">
    </div>
    <div class="form-group">
        <label for="vc_chiPhi">Chi phí</label>
        <input type="number" class="form-control" id="vc_chiPhi" name="vc_chiPhi" placeholder="Nhập chi phí vận chuyển" value="{{  $vanchuyen->vc_chiPhi }}">
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Chi tiết</label>
        <input type="text" class="form-control" id="vc_dienGiai" name="vc_dienGiai" placeholder="Nhập chi tiết vận chuyển" value="{{  $vanchuyen->vc_dienGiai }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection