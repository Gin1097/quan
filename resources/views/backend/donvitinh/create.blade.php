@extends('backend.layout.master')

@section('title')
Thêm mới đơn vị tính
@endsection

@section('feature-title')
Thêm mới đơn vị tính
@endsection

@section('feature-description')
Thêm mới đơn vị tính. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.donvitinh.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="dvt_ten">Tên đơn vị tính</label>
        <input type="text" class="form-control" id="dvt_ten" name="dvt_ten" placeholder="Nhập tên đơn vị tính" value="{{ old('dvt_ten') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                dvt_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                }
            },
            messages: {
                dvt_ten: {
                    required: "Vui lòng nhập tên đơn vị tính",
                    minlength: "Tên đơn vị tính phải có ít nhất 3 ký tự",
                    maxlength: "Tên đơn vị tính không được vượt quá 50 ký tự"
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