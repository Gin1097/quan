@extends('backend.layout.master')

@section('title')
Thêm mới vận chuyển
@endsection

@section('feature-title')
Thêm mới vận chuyển
@endsection

@section('feature-description')
Thêm mới vận chuyển. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.khachhang.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="kh_taiKhoan">Tài khoản</label>
        <input type="text" class="form-control" id="kh_taiKhoan" name="kh_taiKhoan" placeholder="Nhập tài khoản" value="{{ old('kh_taiKhoan') }}">
    </div>
    <div class="form-group">
        <label for="kh_matKhau">Password</label>
        <input type="password" class="form-control" id="kh_matKhau" name="kh_matKhau" placeholder="Nhập mật khẩu" value="{{ old('kh_matKhau') }}">
    </div>
    <div class="form-group">
        <label for="kh_hoTen">Họ tên</label>
        <input type="text" class="form-control" id="kh_hoTen" name="kh_hoTen" placeholder="Nhập họ tên" value="{{ old('kh_hoTen') }}">
    </div>
    <div class="form-group">
        <select name="kh_gioiTinh" class="form-control">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
            <option value="2">Khác</option>
        </select>
    </div>
    <div class="form-group">
        <label for="kh_email">Email</label>
        <input type="email" class="form-control" id="kh_email" name="kh_email" placeholder="Nhập tên vận chuyển" value="{{ old('kh_email') }}">
    </div>
    <div class="form-group">
        <label for="kh_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="kh_ngaySinh" name="kh_ngaySinh" placeholder="Nhập ngày sinh" value="{{ old('kh_ngaySinh') }}">
    </div>
    <div class="form-group">
        <label for="kh_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" placeholder="Nhập địa chỉ" value="{{ old('kh_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="vc_dienThoai">SDT</label>
        <input type="number" class="form-control" id="kh_dienThoai" name="kh_dienThoai" placeholder="Nhập chi phí vận chuyển" value="{{ old('kh_dienThoai') }}">
    </div>
    <div class="form-group">
        <label for="kh_trangThai">Trạng thái</label>
        <select name="kh_trangThai" class="form-control">
            <option value="1" {{ old('kh_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
            <option value="2" {{ old('kh_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
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
                kh_taiKhoan: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_matKhau: {
                    required: true,
                    minlength: 6,
                    maxlength: 10
                },
                kh_hoTen: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kh_email: {
                    required: true,
                    minlength: 8,
                    maxlength: 100
                },
                kh_ngaySinh: {
                    required: true,
                    minlength: 8,
                    maxlength: 10
                },
                kh_diaChi: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                },
                kh_dienThoai: {
                    required: true,
                    minlength: 10,
                    maxlength: 11
                }
            },
            messages: {
                kh_taiKhoan: {
                    required: "Vui lòng nhập tên tài khoản",
                    minlength: "Tên tài khoản phải có ít nhất 3 ký tự",
                    maxlength: "Tên tài khoản không được vượt quá 50 ký tự"
                },
                kh_matKhau: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải có ít nhất 6 ký tự",
                    maxlength: "Mật khẩu không được vượt quá 10 ký tự"
                },
                kh_hoTen: {
                    required: "Vui lòng nhập họ tên",
                    minlength: "Họ tên phải có ít nhất 3 ký tự",
                    maxlength: "Họ tên không được vượt quá 50 ký tự"
                },
                kh_email: {
                    required: "Vui lòng nhập email",
                    minlength: "Email phải có ít nhất 8 ký tự",
                    maxlength: "Email không được vượt quá 100 ký tự"
                },
                kh_ngaySinh: {
                    required: "Vui lòng nhập ngày sinh",
                    minlength: "Ngày sinh phải có ít nhất 8 ký tự",
                    maxlength: "Ngày sinh không được vượt quá 10 ký tự"
                },
                kh_diaChi: {
                    required: "Vui lòng nhập Địa chỉ",
                    minlength: "Địa chỉ phải có ít nhất 10 ký tự",
                    maxlength: "Địa chỉ không được vượt quá 100 ký tự"
                },
                kh_dienThoai: {
                    required: "Vui lòng nhập sdt",
                    minlength: "SDT có độ dài từ 10-11 ký tự",
                    maxlength: "SDT có độ dài từ 10-11 ký tự"
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