@extends('backend.layout.master')

@section('title')
Thêm mới kho
@endsection

@section('feature-title')
Thêm mới kho    
@endsection

@section('feature-description')
Thêm mới kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmChuDe" name="frmChuDe" method="post" action="{{ route('backend.kho.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="kho_ten">Tên kho</label>
        <input type="text" class="form-control" id="kho_ten" name="kho_ten" placeholder="Nhập tên kho" value="{{ old('kho_ten') }}">
    </div>
    <div class="form-group">
        <label for="kho_diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="kho_diachi" name="kho_diachi" placeholder="Nhập địa chỉ" value="{{ old('kho_diachi') }}">
    </div>
    <div class="form-group">
        <label for="kho_sdt">Điện thoại</label>
        <input type="number" class="form-control" id="kho_sdt" name="kho_sdt" placeholder="Nhập điện thoại" value="{{ old('kho_sdt') }}">
    </div>
    <div class="form-group">
        <label for="kho_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" id="kho_dienGiai" name="kho_dienGiai" placeholder="Nhập diễn giải" value="{{ old('kho_dienGiai') }}">
    </div>
    <div class="form-group">
        <label for="kho_quanly">Quản lý</label>
        <input type="text" class="form-control" id="kho_quanly" name="kho_quanly" placeholder="Nhập tên quản lý" value="{{ old('kho_quanly') }}">
    </div>
    <div class="form-group">
    <select name="kho_trangThai" class="form-control">
        <option value="1" {{ old('kho_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('kho_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmChuDe").validate({
            rules: {
                kho_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kho_diachi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kho_sdt: {
                    required: true,
                    minlength: 10,
                    maxlength: 11
                },
                kho_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kho_quanly: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kho_trangThai: {
                    required: true,
                }
            },
            messages: {
                kho_ten: {
                    required: "Vui lòng nhập tên kho",
                    minlength: "Tên kho phải có ít nhất 3 ký tự",
                    maxlength: "Tên kho không được vượt quá 50 ký tự"
                },
                kho_diachi: {
                    required: "Vui lòng nhập dịa chỉ kho",
                    minlength: "Địa chỉ kho phải có ít nhất 3 ký tự",
                    maxlength: "Địa chỉ kho không được vượt quá 50 ký tự"
                },
                kho_sdt: {
                    required: "Vui lòng nhập điện thoại",
                    minlength: "Điện thoại phải có ít nhất 10 ký tự",
                    maxlength: "Điện thoại không được vượt quá 11 ký tự"
                },
                kho_dienGiai: {
                    required: "Vui lòng nhập diễn giải",
                    minlength: "Diễn giải phải có ít nhất 3 ký tự",
                    maxlength: "Diễn giải không được vượt quá 50 ký tự"
                },
                kho_quanly: {
                    required: "Vui lòng nhập quản lý kho",
                    minlength: "Quản lý kho phải có ít nhất 3 ký tự",
                    maxlength: "Quản lý kho không được vượt quá 50 ký tự"
                },
                kho_trangThai: {
                    required: "Vui lòng chọn trạng thái",
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