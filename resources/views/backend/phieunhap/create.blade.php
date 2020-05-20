@extends('backend.layout.master')

@section('title')
Thêm mới phiếu nhập
@endsection

@section('feature-title')
Thêm mới phiếu nhập
@endsection

@section('feature-description')
Thêm mới phiếu nhập. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.phieunhap.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="pn_nguoiGiao">Người giao</label>
        <input type="text" class="form-control" id="pn_nguoiGiao" name="pn_nguoiGiao" placeholder="Nhập tên người giao" value="{{ old('pn_nguoiGiao') }}">
    </div>
    <div class="form-group">
        <label for="pn_soHoaDon">Số Hóa đơn</label>
        <input type="text" class="form-control" id="pn_soHoaDon" name="pn_soHoaDon" placeholder="Nhập số hóa đơn" value="{{ old('pn_soHoaDon') }}">
    </div>
    <div class="form-group">
        <label for="pn_ngayXuatHoaDon">Ngày Xuất hóa đơn</label>
        <input type="text" class="form-control" id="pn_ngayXuatHoaDon" name="pn_ngayXuatHoaDon" placeholder="Ngày xuất hóa đơn" value="{{ old('pn_ngayXuatHoaDon') }}">
    </div>
    <div class="form-group">
        <label for="pn_ghiChu">Ghi chú</label>
        <input type="text" class="form-control" id="pn_ghiChu" name="pn_ghiChu" placeholder="Ghi chú" value="{{ old('pn_ghiChu') }}">
    </div>
    <div class="form-group">
        <label for="nv_nguoiLapPhieu">Người lập phiếu</label>
        <select name="nv_nguoiLapPhieu" class="form-control">
            @foreach($danhsachnhanvien as $lapphieu)
                @if(old('nv_nguoiLapPhieu') == $lapphieu->nv_ma)
                <option value="{{ $lapphieu->nv_ma }}" selected>{{ $lapphieu->nv_hoTen }}</option>
                @else
                <option value="{{ $lapphieu->nv_ma }}">{{ $lapphieu->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="pn_ngayLapPhieu">Ngày lập phiếu</label>
        <input type="text" class="form-control" id="pn_ngayLapPhieu" name="pn_ngayLapPhieu" placeholder="Ngày lập phiếu" value="{{ old('pn_ngayLapPhieu') }}">
    </div>
    <div class="form-group">
        <label for="nv_keToan">Nhân viên kế toán</label>
        <select name="nv_keToan" class="form-control">
            @foreach($danhsachnhanvien as $ketoan)
                @if(old('nv_keToan') == $ketoan->nv_ma)
                <option value="{{ $ketoan->nv_ma }}" selected>{{ $ketoan->nv_hoTen }}</option>
                @else
                <option value="{{ $ketoan->nv_ma }}">{{ $ketoan->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_thuKho">Nhân viên thủ kho</label>
        <select name="nv_thuKho" class="form-control">
            @foreach($danhsachnhanvien as $thukho)
                @if(old('nv_thuKho') == $thukho->nv_ma)
                <option value="{{ $thukho->nv_ma }}" selected>{{ $thukho->nv_hoTen }}</option>
                @else
                <option value="{{ $thukho->nv_ma }}">{{ $thukho->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ncc_ma">Nhà cung cấp</label>
        <select name="ncc_ma" class="form-control">
            @foreach($danhsachnhacungcap as $nhacungcap)
                @if(old('ncc_ma') == $nhacungcap->ncc_ma)
                <option value="{{ $nhacungcap->ncc_ma }}" selected>{{ $nhacungcap->ncc_ten }}</option>
                @else
                <option value="{{ $nhacungcap->ncc_ma }}">{{ $nhacungcap->ncc_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <label for="pn_trangThai">Trạng thái</label>
    <select name="pn_trangThai" class="form-control">
        <option value="1" {{ old('pn_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('pn_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <hr  />
    <div class="form-group">
        <label for="sp_ma">Sản phẩm</label>
        <select name="sp_ma" id="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $str)
                @if(old('sp_ma') == $str->sp_ma)
                <option value="{{ $str->sp_ma }}" selected>{{ $str->sp_ten }}</option>
                @else
                <option value="{{ $str->sp_ma }}">{{ $str->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_giaGoc">Giá gốc</label>
        <select name="sp_giaGoc" id="sp_giaGoc" class="form-control">
            @foreach($danhsachsanpham as $str)
                @if(old('sp_giaGoc') == $str->sp_giaGoc)
                <option value="{{ $str->sp_giaGoc }}" selected>{{ $str->sp_giaGoc }}</option>
                @else
                <option value="{{ $str->sp_giaGoc }}">{{ $str->sp_giaGoc }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="kho_ma">Kho</label>
        <select name="kho_ma" id="kho_ma" class="form-control">
            @foreach($danhsachsanpham as $str)
                @if(old('kho_ma') == $str->kho_ma)
                <option value="{{ $str->kho_ma }}" selected>{{ $str->kho_ma }}</option>
                @else
                <option value="{{ $str->kho_ma }}">{{ $str->kho_ma }}</option>
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
        <input type="text" class="form-control" id="ctn_soLuong" name="ctn_soLuong" placeholder="Nhập số lượng" value="{{ old('ctn_soLuong') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#sp_ma").change(function(){
            var idSanpham = $(this).val();
            $.get("/admin/giaban/"+idSanpham,function(data){
                $("#sp_giaGoc").html(data);
            });
            $.get("/admin/phieunhapkho/"+idSanpham, function(data){
                $("#kho_ma").html(data);
            });
        });
        $("#frmLoai").validate({
            rules: {
                pn_nguoiGiao: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                pn_soHoaDon: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                pn_ngayXuatHoaDon: {
                    required: true,
                },
                pn_ghiChu: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                nv_nguoiLapPhieu: {
                    required: true,
                },
                pn_ngayLapPhieu: {
                    required: true,
                },
                nv_keToan: {
                    required: true,
                },
                nv_thuKho: {
                    required: true,
                },
                ncc_ma: {
                    required: true,
                },
                pn_trangThai: {
                    required: true,
                },
                sp_ma: {
                    required: true,
                },
                sp_giaBan: {
                    required: true,
                },
                kho_ma: {
                    required: true,
                },
                m_ma: {
                    required: true,
                },
                ctn_soLuong: {
                    required: true,
                    maxlength: 50
                }
            },
            messages: {
                pn_nguoiGiao: {
                    required: "Vui lòng nhập tên người giao",
                    minlength: "Tên người giao phải có ít nhất 3 ký tự",
                    maxlength: "Tên người giao không được vượt quá 50 ký tự"
                },
                pn_soHoaDon: {
                    required: "Vui lòng nhập Số hóa đơn",
                    minlength: "Số hóa đơn phải có ít nhất 3 ký tự",
                    maxlength: "Số hóa đơn không được vượt quá 100 ký tự"
                },
                pn_ngayXuatHoaDon: {
                    required: "Vui lòng nhập ngày xuất hóa đơn"
                },
                pn_ghiChu: {
                    required: "Vui lòng nhập ghi chú",
                    minlength: "Ghi chí phải có ít nhất 3 ký tự",
                    maxlength: "Ghi chú không được vượt quá 100 ký tự"
                },
                nv_nguoiLapPhieu: {
                    required: "Vui lòng chọn nhâp viên lập phiếu"
                },
                pn_ngayLapPhieu: {
                    required: "Vui lòng chọn ngày lập phiếu"
                },
                nv_keToan: {
                    required: "Vui lòng chọn nhân viên kế toán"
                },
                nv_thuKho: {
                    required: "Vui lòng chọn nv thủ kho"
                },
                ncc_ma: {
                    required: "Vui lòng chọn nhà cung cấp"
                },
                pn_trangThai: {
                    required: "Vui lòng chọn trạn thái"
                },
                sp_ma: {
                    required: "Vui lòng chọn sản phẩm",
                },
                sp_giaBan: {
                    required: "Vui lòng chọn giá bán",
                },
                kho_ma: {
                    required: "Vui lòng chọn kho",
                },
                m_ma: {
                    required: "Vui lòng chọn màu",
                },
                ctn_soLuong: {
                    required: "Vui lòng nhập số lượng",
                    maxlength: "Số lượng không được vượt quá 50 ký tự"
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