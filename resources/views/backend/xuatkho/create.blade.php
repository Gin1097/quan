@extends('backend.layout.master')

@section('title')
Thêm mới phiếu xuất kho
@endsection

@section('feature-title')
Thêm mới phiếu xuất kho
@endsection

@section('feature-description')
Thêm mới phiếu xuất kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.xuatkho.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nv_ma">Nhân viên</label>
        <select name="nv_ma" class="form-control">
            @foreach($danhsachnhanvien as $nhanvien)
                @if(old('nv_ma') == $nhanvien->nv_ma)
                <option value="{{ $nhanvien->nv_ma }}" selected>{{ $nhanvien->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvien->nv_ma }}">{{ $nhanvien->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="xk_lydo">Lý do</label>
        <input type="text" class="form-control" id="xk_lydo" name="xk_lydo" placeholder="Nhập lý do" value="{{ old('xk_lydo') }}">
    </div>
    <div class="form-group">
        <label for="xk_diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="xk_diachi" name="xk_diachi" placeholder="Nhập địa chỉ" value="{{ old('xk_diachi') }}">
    </div>
    <div class="form-group">
        <label for="xk_ngaylap">Ngày lập phiếu</label>
        <input type="text" class="form-control" id="xk_ngaylap" name="xk_ngaylap" placeholder="Nhập ngày" value="{{ date('d-m-Y') }}">
    </div>
    <hr />
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
        <label for="sp_donvitinh">Đơn vị tính</label>
        <select name="sp_donvitinh" id="sp_donvitinh" class="form-control">
            @foreach($danhsachsanpham as $str)
                @if(old('dvt_ma') == $str->dvt_ma)
                <option value="{{ $str->dvt_ma }}" selected>{{ $str->dvt_ma }}</option>
                @else
                <option value="{{ $str->dvt_ma }}">{{ $str->dvt_ma }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sp_giaBan">Giá bán</label>
        <select name="sp_giaBan" id="sp_giaBan" class="form-control" >
            @foreach($danhsachsanpham as $str)
                @if(old('sp_giaBan') == $str->sp_giaBan)
                <option value="{{ $str->sp_giaBan }}" selected>{{ $str->sp_giaBan }}</option>
                @else
                <option value="{{ $str->sp_giaBan }}">{{ $str->sp_giaBan }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sl_ton">Số lượng còn lại trong kho</label>
        <select name="sl_ton" id="sl_ton" class="form-control">
            @foreach($danhsachsanphamkho as $str1)
                @if(old('kho_ma') == $str1->kho_ma)
                <option value="{{ $str1->sl_ton }}" selected>{{ $str->sl_ton }}</option>
                @else
                <option value="{{ $str1->sl_ton }}">{{ $str->sl_ton }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="sl_nhap">Số lượng nhập ban đầu</label>
        <select name="sl_nhap" id="sl_nhap" class="form-control" >
            @foreach($danhsachsanphamkho as $str1)
                @if(old('kho_ma') == $str1->kho_ma)
                <option value="{{ $str1->sl_nhap }}" selected>{{ $str->sl_nhap }}</option>
                @else
                <option value="{{ $str1->sl_nhap }}">{{ $str->sl_nhap }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="xk_soluong">Số lượng xuất</label>
        <input type="text" class="form-control" id="xk_soluong" name="xk_soluong" placeholder="Nhập số lượng" value="{{ old('xk_soluong') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#sp_ma").change(function(){
            var idSanpham = $(this).val();
            $.get("/admin/sanpham/"+idSanpham,function(data){
                $("#sp_giaBan").html(data);
            });
            $.get("/admin/kho/"+idSanpham, function(data){
                $("#kho_ma").html(data);
            });
            $.get("/admin/donvitinh/"+idSanpham, function(data){
                $("#sp_donvitinh").html(data);
            });
            $.get("/admin/sanphamkho/"+idSanpham, function(data){
                $("#sl_ton").html(data);
            });
            $.get("/admin/sanphamkho1/"+idSanpham, function(data){
                $("#sl_nhap").html(data);
            });
        });
        $("#frmLoai").validate({
            rules: {
                nv_ma: {
                    required: true,
                },
                xk_lydo: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                },
                xk_diachi: {
                    required: true,
                    minlength: 3,
                    maxlength: 50,
                },
                xk_ngaylap: {
                    required: true,
                },
                sp_ma: {
                    required: true,
                },
                kho_ma: {
                    required: true, 
                },
                sp_donvitinh: {
                    required: true,
                },
                sp_gianBan: {
                    required: true,
                },
                sl_ton: {
                    required: true,
                },
                sl_nhap: {
                    required: true,
                },
                xk_soluong: {
                    required: true,
                    maxlength: 10
                },
            },
            messages: {
                nv_ma: {
                    required: "Vui lòng chọn nhân viên",
                },
                xk_lydo: {
                    required: "Vui lòng nhập lý do xuất kho",
                    minlength: "Lý do phải có ít nhất 3 ký tự",
                    maxlength: "Lý do không được vượt quá 50 ký tự"
                },
                xk_diachi: {
                    required: "Vui lòng nhập địa chỉ xuất kho",
                    minlength: "Địa chỉ phải có ít nhất 3 ký tự",
                    maxlength: "Địa chỉ không được vượt quá 50 ký tự"
                },
                xk_ngaylap: {
                    required: "Vui lòng nhập ngày lập phiếu xuất kho",
                },
                sp_ma: {
                    required: "Vui lòng chọn sản phẩm",
                },
                kho_ma: {
                    required: "Kho không được để trống", 
                },
                sp_donvitinh: {
                    required: "Đơn vị tính không được để trống",
                },
                sp_gianBan: {
                    required: "Giá bán sản phẩm không được để trống",
                },
                sl_ton: {
                    required: "Số lượng còn lại trong kho không được để trống",
                },
                sl_nhap: {
                    required: "Số lượng lúc nhập vào của sản phẩm không được để trống",
                },
                xk_soluong: {
                    required: "Vui lòng nhập số lượng sản phẩm cần xuất kho",
                    maxlength: "Số lượng không được vượt quá 10 ký tự",
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