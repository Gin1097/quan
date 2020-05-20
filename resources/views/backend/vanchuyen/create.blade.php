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
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.vanchuyen.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vc_ten">Tên vận chuyển</label>
        <input type="text" class="form-control" id="vc_ten" name="vc_ten" placeholder="Nhập tên vận chuyển" value="{{ old('vc_ten') }}">
    </div>
    <div class="form-group">
        <label for="vc_chiPhi">Chi phí</label>
        <input type="text" class="form-control" id="vc_chiPhi" name="vc_chiPhi" placeholder="Nhập chi phí vận chuyển" value="{{ old('vc_chiPhi') }}">
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Chi tiết</label>
        <input type="text" class="form-control" id="vc_dienGiai" name="vc_dienGiai" placeholder="Nhập chi tiết vận chuyển" value="{{ old('vc_dienGiai') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                vc_ten: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                vc_chiPhi: {
                    required: true,
                    maxlength: 10
                },
                vc_dienGiai: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                }
            },
            messages: {
                vc_ten: {
                    required: "Vui lòng nhập tên vận chuyển",
                    minlength: "Tên vận chuyển phải có ít nhất 3 ký tự",
                    maxlength: "Tên vận chuyển không được vượt quá 50 ký tự"
                },
                vc_chiPhi: {
                    required: "Vui lòng nhập chi phí",
                    maxlength: "Chi phí không được vượt quá 10 ký tự"
                },
                vc_dienGiai: {
                    required: "Vui lòng nhập chi tiết vận chuyển",
                    minlength: "Chi tiết vận chuyển phải có ít nhất 3 ký tự",
                    maxlength: "Chi tiết vận chuyển không được vượt quá 50 ký tự"
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