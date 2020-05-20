@extends('backend.layout.master')

@section('title')
Thêm mới nhà cung cấp
@endsection

@section('feature-title')
Thêm mới nhà cung cấp
@endsection

@section('feature-description')
Thêm mới nhà cung cấp. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.nhacungcap.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="ncc_ten">Tên nhà cung cấp</label>
        <input type="text" class="form-control" id="ncc_ten" name="ncc_ten" placeholder="Nhập tên nhà cung cấp" value="{{ old('ncc_ten') }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiDien">Tên đại diện</label>
        <input type="text" class="form-control" id="ncc_daiDien" name="ncc_daiDien" placeholder="Nhập tên đại diện" value="{{ old('ncc_daiDien') }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiChi">Địa chỉ</label>
        <input type="text" class="form-control" id="ncc_diaChi" name="ncc_diaChi" placeholder="Nhập địa chỉ" value="{{ old('ncc_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">Điện thoại</label>
        <input type="number" class="form-control" id="ncc_dienThoai" name="ncc_dienThoai" placeholder="Nhập tên đại diện" value="{{ old('ncc_dienThoai') }}">
    </div>
    <div class="form-group">
        <label for="ncc_email">Email</label>
        <input type="email" class="form-control" id="ncc_email" name="ncc_email" placeholder="Nhập tên đại diện" value="{{ old('ncc_email') }}">
    </div>
    <div class="form-group">
        <label for="xx_ma">Xuất xứ</label>
        <select name="xx_ma" class="form-control">
            @foreach($danhsachxuatxu as $xuatxu)
                @if(old('xx_ma') == $xuatxu->xx_ma)
                <option value="{{ $xuatxu->xx_ma }}" selected>{{ $xuatxu->xx_ten }}</option>
                @else
                <option value="{{ $xuatxu->xx_ma }}">{{ $xuatxu->xx_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ncc_trangThai">Trạng thái</label>
        <select name="ncc_trangThai" class="form-control">
            <option value="1" {{ old('ncc_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
            <option value="2" {{ old('ncc_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
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
                ncc_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                ncc_daiDien: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                ncc_diaChi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                ncc_dienThoai: {
                    required: true,
                    minlength: 10,
                    maxlength: 11
                },
                ncc_email: {
                    required: true,
                    minlength: 8,
                    maxlength: 100
                }
            },
            messages: {
                ncc_ten: {
                    required: "Vui lòng nhập tên nhà cung cấp",
                    minlength: "Tên nhà cung cấp phải có ít nhất 3 ký tự",
                    maxlength: "Tên nhà cung cấp không được vượt quá 50 ký tự"
                },
                ncc_daiDien: {
                    required: "Vui lòng nhập chi tiết nhà cung cấp",
                    minlength: "Chi tiết nhà cung cấp phải có ít nhất 3 ký tự",
                    maxlength: "Chi tiết nhà cung cấp không được vượt quá 50 ký tự"
                },
                ncc_diaChi: {
                    required: "Vui lòng nhập chi tiết nhà cung cấp",
                    minlength: "Chi tiết nhà cung cấp phải có ít nhất 3 ký tự",
                    maxlength: "Chi tiết nhà cung cấp không được vượt quá 50 ký tự"
                },
                ncc_dienThoai: {
                    required: "Vui lòng nhập chi tiết nhà cung cấp",
                    minlength: "Chi tiết nhà cung cấp phải có ít nhất 10 ký tự",
                    maxlength: "Chi tiết nhà cung cấp không được vượt quá 11 ký tự"
                },
                ncc_email: {
                    required: "Vui lòng nhập chi tiết nhà cung cấp",
                    minlength: "Chi tiết nhà cung cấp phải có ít nhất 8 ký tự",
                    maxlength: "Chi tiết nhà cung cấp không được vượt quá 100 ký tự"
                }
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