@extends('backend.layout.master')

@section('title')
Thêm mới hóa đơn lẻ
@endsection

@section('feature-title')
Thêm mới hóa đơn lẻ
@endsection

@section('feature-description')
Thêm mới hóa đơn lẻ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.hoadonle.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="hdl_nguoiMuaHang">Người mua hàng</label>
        <input type="text" class="form-control" id="hdl_nguoiMuaHang" name="hdl_nguoiMuaHang" placeholder="Nhập tên mua hàng" value="{{ old('hdl_nguoiMuaHang') }}">
    </div>
    <div class="form-group">
        <label for="hdl_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="hdl_dienThoai" name="hdl_dienThoai" placeholder="Nhập số điện thoại" value="{{ old('hdl_dienThoai') }}">
    </div>
    <div class="form-group">
        <label for="hdl_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="hdl_diaChi" name="hdl_diaChi" placeholder="Nhập địa chỉ" value="{{ old('hdl_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="nv_lapHoaDon">Nhân viên lập hóa đơn</label>
        <select name="nv_lapHoaDon" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_lapHoaDon') == $nhanvien->nv_ma)
                <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="hdl_ngayXuatHoaDon">Ngày xuất hóa đơn</label>
        <input type="text" class="form-control" id="hdl_ngayXuatHoaDon" name="hdl_ngayXuatHoaDon" placeholder="Nhập ngày xuất hóa đơn" value="{{ old('hdl_ngayXuatHoaDon') }}">
    </div>
    <div class="form-group">
        <label for="dh_ma">Đơn hàng</label>
        <select name="dh_ma" class="form-control">
            @foreach($danhsachdonhang as $donhang)
                @if(old('dh_ma') == $donhang->dh_ma)
                <option value="{{ $donhang->dh_ma }}" selected>{{ $donhang->dh_ma }}</option>
                @else
                <option value="{{ $donhang->dh_ma }}">{{ $donhang->dh_ma }}</option>
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
                hdl_nguoiMuaHang: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                hdl_dienThoai: {
                    required: true,
                    minlength: 10,
                    maxlength: 11
                },
                hdl_diaChi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                nv_lapHoaDon: {
                    required: true,
                },
                hdl_ngayXuatHoaDon: {
                    required: true,
                },
                dh_ma: {
                    required: true,
                }
            },
            messages: {
                hdl_nguoiMuaHang: {
                    required: "Vui lòng nhập tên người mua hàng",
                    minlength: "Tên người mua hàng phải có ít nhất 3 ký tự",
                    maxlength: "Tên người mua hàng không được vượt quá 50 ký tự"
                },
                hdl_dienThoai: {
                    required: "Vui lòng nhập số điện thoại",
                    minlength: "Số điện thoại phải có ít nhất 10 ký tự",
                    maxlength: "Số điện thoại không được vượt quá 11 ký tự"
                },
                hdl_diaChi: {
                    required: "Vui lòng nhập địa chỉ",
                    minlength: "Địa chỉ phải có ít nhất 3 ký tự",
                    maxlength: "Địa chỉ không được vượt quá 50 ký tự"
                },
                nv_lapHoaDon: {
                    required: "Vui long chọn nhân viên lập hóa đơn",
                },
                hdl_ngayXuatHoaDon: {
                    required: "Vui lòng nhập ngày xuất hóa đơn",
                },
                dh_ma: {
                    required: "Vui long chọn đơn hàng",
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