@extends('backend.layout.master')

@section('title')
Thêm mới thanh toán
@endsection

@section('feature-title')
Thêm mới thanh toán
@endsection

@section('feature-description')
Thêm mới thanh toán. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.thanhtoan.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="tt_ten">Tên thanh toán</label>
        <input type="text" class="form-control" id="tt_ten" name="tt_ten" placeholder="Nhập tên thanh toán" value="{{ old('tt_ten') }}">
    </div>
    <div class="form-group">
        <label for="tt_dienGiai">Chi tiết</label>
        <input type="text" class="form-control" id="tt_dienGiai" name="tt_dienGiai" placeholder="Nhập chi tiết thanh toán" value="{{ old('tt_dienGiai') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                tt_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                tt_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                }
            },
            messages: {
                tt_ten: {
                    required: "Vui lòng nhập tên thanh toán",
                    minlength: "Tên thanh toán phải có ít nhất 3 ký tự",
                    maxlength: "Tên thanh toán không được vượt quá 50 ký tự"
                },
                tt_dienGiai: {
                    required: "Vui lòng nhập chi tiết thanh toán",
                    minlength: "Chi tiết thanh toán phải có ít nhất 3 ký tự",
                    maxlength: "Chi tiết thanh toán không được vượt quá 100 ký tự"
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