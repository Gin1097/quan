@extends('backend.layout.master')

@section('title')
Thêm mới chủ đề sản phẩm
@endsection

@section('feature-title')
Thêm mới chủ đề sản phẩm
@endsection

@section('feature-description')
Thêm mới chủ đề sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.cdsp.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma') == $sanpham->sp_ma)
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
                @if(old('cd_ma') == $chude->cd_ma)
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

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                sp_ma: {
                    required: true,
                },
                cd_ma: {
                    required: true, 
                }
            },
            messages: {
                sp_ma: {
                    required: "Vui lòng chọn sản phẩm"
                },
                cd_ma: {
                    required: "Vui lòng chọn chủ đề"
                },                
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Thêm class `invalid-feedback` cho field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
                // Thêm icon "Kiểm tra không Hợp lệ"
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertAfter(element);
                }
            },
            success: function (label, element) {
                // Thêm icon "Kiểm tra Hợp lệ"
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                        .insertAfter($(element));
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
@endsection