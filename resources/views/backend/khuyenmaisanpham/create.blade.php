@extends('backend.layout.master')

@section('title')
Thêm mới khuyến mãi sản phẩm
@endsection

@section('feature-title')
Thêm mới khuyến mãi sản phẩm
@endsection

@section('feature-description')
Thêm mới khuyến mãi sản phẩm. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.kmsp.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="km_ma">Tên khuyến mãi</label>
        <select name="km_ma" class="form-control">
            @foreach($danhsachkhuyenmai as $khuyenmai)
                @if(old('km_ma') == $khuyenmai->km_ma)
                <option value="{{ $khuyenmai->km_ma }}" selected>{{ $khuyenmai->km_ten }}</option>
                @else
                <option value="{{ $khuyenmai->km_ma }}">{{ $khuyenmai->km_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
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
        <label for="m_ma">Màu</label>
        <select name="m_ma" class="form-control">
            @foreach($danhsachmau as $mau)
                @if(old('m_ma') == $mau->m_ma)
                <option value="{{ $mau->m_ma }}" selected>{{ $mau->m_ten }}</option>
                @else
                <option value="{{ $mau->m_ma }}">{{ $mau->m_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="kmsp_giaTri">Giá trị</label>
        <input type="number" class="form-control" id="kmsp_giaTri" name="kmsp_giaTri" placeholder="Nhập giá trị khuyến mãi sản phẩm" value="{{ old('kmsp_giaTri') }}">
    </div>
    <div class="form-group">
        <label for="kmsp_trangThai">Trạng thái</label>
        <select name="kmsp_trangThai" class="form-control">
            <option value="1" {{ old('kmsp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
            <option value="2" {{ old('kmsp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
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
                km_ma: {
                    required: true,
                },
                sp_ma: {
                    required: true,
                },
                m_ma: {
                    required: true,
                },
                kmsp_giaTri: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                kmsp_trangThai: {
                    required: true,
                }
            },
            messages: {
                km_ma: {
                    required: "Vui lòng chọn tên khuyến mãi"
                },
                sp_ma: {
                    required: "Vui lòng chọn sản phẩm"
                },
                m_ma: {
                    required: "Vui lòng chọn màu"
                },
                kmsp_giaTri: {
                    required: "Vui lòng nhập giá trị khuyến mãi ",
                    minlength: "Giá trị khuyến mãi phải có ít nhất 3 ký tự",
                    maxlength: "Giá trị khuyến mãi không được vượt quá 50 ký tự"
                },
                kmsp_trangThai: {
                    required: "Vui lòng chọn trạng thái",
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