@extends('backend.layout.master')

@section('title')
Thêm mới hóa đơn sỉ
@endsection

@section('feature-title')
Thêm mới hóa đơn sỉ
@endsection

@section('feature-description')
Thêm mới hóa đơn sỉ. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.hoadonsi.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="hds_nguoiMuaHang">Người mua hàng</label>
        <input type="text" class="form-control" id="hds_nguoiMuaHang" name="hds_nguoiMuaHang" placeholder="Nhập tên mua hàng" value="{{ old('hds_nguoiMuaHang') }}">
    </div>
    <div class="form-group">
        <label for="hds_tenDonVi">Tên đơn vị</label>
        <input type="text" class="form-control" id="hds_tenDonVi" name="hds_tenDonVi" placeholder="Nhập tên đơn vị" value="{{ old('hds_tenDonVi') }}">
    </div>
    <div class="form-group">
        <label for="hds_diaChi">Địa chỉ đơn vị</label>
        <input type="text" class="form-control" id="hds_diaChi" name="hds_diaChi" placeholder="Nhập địa chỉ" value="{{ old('hds_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="hds_maSoThue">Mã số thuế đơn vị</label>
        <input type="text" class="form-control" id="hds_maSoThue" name="hds_maSoThue" placeholder="Nhập mã số thuế" value="{{ old('hds_maSoThue') }}">
    </div>
    <div class="form-group">
        <label for="hds_soTaiKhoan">Số tài khoản (có thể bỏ trống)</label>
        <input type="text" class="form-control" id="hds_soTaiKhoan" name="hds_soTaiKhoan" placeholder="Nhập số tài khoản" value="{{ old('hds_soTaiKhoan') }}">
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
        <label for="hds_ngayXuatHoaDon">Ngày xuất hóa đơn</label>
        <input type="text" class="form-control" id="hds_ngayXuatHoaDon" name="hds_ngayXuatHoaDon" placeholder="Nhập ngày xuất hóa đơn" value="{{ old('hds_ngayXuatHoaDon') }}">
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
    <div class="form-group">
        <label for="tt_ma">Thanh toán</label>
        <select name="tt_ma" class="form-control">
            @foreach($danhsachthanhtoan as $thanhtoan)
                @if(old('tt_ma') == $thanhtoan->tt_ma)
                <option value="{{ $thanhtoan->tt_ma }}" selected>{{ $thanhtoan->tt_ten }}</option>
                @else
                <option value="{{ $thanhtoan->tt_ma }}">{{ $thanhtoan->tt_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <select name="hds_trangThai" class="form-control">
        <option value="1" {{ old('hds_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('hds_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
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
                hds_nguoiMuaHang: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                hds_tenDonVi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                hds_diaChi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                hds_maSoThue: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                nv_lapHoaDon: {
                    required: true,
                },
                hds_ngayXuatHoaDon: {
                    required: true,
                },
                hds_trangThai: {
                    required: true,
                },
                tt_ma: {
                    required: true,
                },
                dh_ma: {
                    required: true,
                }
            },
            messages: {
                hds_nguoiMuaHang: {
                    required: "Vui lòng nhập tên người mua hàng",
                    minlength: "Tên người mua hàng phải có ít nhất 3 ký tự",
                    maxlength: "Tên người mua hàng không được vượt quá 50 ký tự"
                },
                hds_tenDonVi: {
                    required: "Vui lòng nhập tên đơn vị",
                    minlength: "Tên đơn vị phải có ít nhất 3 ký tự",
                    maxlength: "Tên đơn vị không được vượt quá 50 ký tự"
                },
                hds_diaChi: {
                    required: "Vui lòng nhập địa chỉ đơn vị",
                    minlength: "Địa chỉ đơn vị phải có ít nhất 3 ký tự",
                    maxlength: "Địa chỉ đơn vị không được vượt quá 50 ký tự"
                },
                hds_maSoThue: {
                    required: "Vui lòng nhập mã số thuế",
                    minlength: "Mã số thuế phải có ít nhất 3 ký tự",
                    maxlength: "Mã số thuế không được vượt quá 50 ký tự"
                },
                nv_lapHoaDon: {
                    required: "Vui long chọn nhân viên lập hóa đơn",
                },
                hds_ngayXuatHoaDon: {
                    required: "Vui lòng nhập ngày xuất hóa đơn",
                },
                hds_trangThai: {
                    required: "Vui lòng chọn trạng thái",
                },
                tt_ma: {
                    required: "Vui long chọn thanh toán",
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