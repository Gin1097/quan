@extends('backend.layout.master')

@section('title')
Thêm mới màu
@endsection

@section('feature-title')
Thêm mới màu
@endsection

@section('feature-description')
Thêm mới màu. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.mau.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="m_ten">Tên màu</label>
        <input type="text" class="form-control" id="m_ten" name="m_ten" placeholder="Nhập tên màu" value="{{ old('m_ten') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                m_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                }
            },
            messages: {
                m_ten: {
                    required: "Vui lòng nhập tên màu",
                    minlength: "Tên màu phải có ít nhất 3 ký tự",
                    maxlength: "Tên màu không được vượt quá 50 ký tự"
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