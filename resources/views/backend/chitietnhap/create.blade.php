@extends('backend.layout.master')

@section('title')
Thêm mới chi tiết nhập
@endsection

@section('feature-title')
Thêm mới chi tiết nhập
@endsection

@section('feature-description')
Thêm mới chi tiết nhập. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.chitietnhap.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="pn_ma">Mã phiếu</label>
        <select name="pn_ma" class="form-control">
            @foreach($danhsachphieunhap as $phieunhap)
                @if(old('pn_ma') == $phieunhap->pn_ma)
                <option value="{{ $phieunhap->pn_ma }}" selected>{{ $phieunhap->pn_ma }}</option>
                @else
                <option value="{{ $phieunhap->pn_ma }}">{{ $phieunhap->pn_ma }}</option>
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
        <label for="ctn_soLuong">Số lượng</label>
        <input type="number" class="form-control" id="ctn_soLuong" name="ctn_soLuong" placeholder="Nhập số lượng" value="{{ old('ctn_soLuong') }}">
    </div>
    <div class="form-group">
        <label for="ctn_donGia">Đơn giá</label>
        <input type="number" class="form-control" id="ctn_donGia" name="ctn_donGia" placeholder="Nhập đơn giá" value="{{ old('ctn_donGia') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                pn_ma: {
                    required: true,
                },
                sp_ma: {
                    required: true,
                },
                m_ma: {
                    required: true,
                },
                ctn_soLuong: {
                    required: true,
                    maxlength: 50
                },
                ctn_donGia: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                }
            },
            messages: {
                pn_ma: {
                    required: "Vui lòng chọn mã phiếu"
                },
                sp_ma: {
                    required: "Vui lòng chọn sản phẩm"
                },
                m_ma: {
                    required: "Vui lòng chọn màu"
                },
                ctn_soLuong: {
                    required: "Vui lòng nhập số lượng ",
                    maxlength: "Số lượng không được vượt quá 50 ký tự"
                },
                ctn_donGia: {
                    required: "Vui lòng nhập đơn giá",
                    minlength: "Đơn giá phải có ít nhất 3 ký tự",
                    maxlength: "Đơn giá không được vượt quá 50 ký tự"
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