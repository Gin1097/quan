@extends('backend.layout.master')

@section('title')
Thêm mới nhập kho
@endsection

@section('feature-title')
Thêm mới nhập kho
@endsection

@section('feature-description')
Thêm mới nhập kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection
@section('custom-css')
<!-- Các style dành cho thư viện Daterangepicker -->
<link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.nhapkho.store') }}">
    {{ csrf_field() }}
    <div class="form-group" >
        <label for="nk_ngaylapDatepicker">Ngày lập</label>
                <input id="nk_ngaylapDatepicker" type="text" class="form-control">
    </div>
    <div class="form-group{{ $errors->has('nk_ngaylap') ? ' has-error' : '' }}" style="display: none;">
        <label for="nk_ngaylap" class="col-md-4 control-label">Ngày lập</label>
            <div class="col-md-6">
                <input id="nk_ngaylap" type="text" class="form-control" name="nk_ngaylap" value="{{ old('nk_ngaylap') }}" required autofocus>
                    @if ($errors->has('nk_ngaylap'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nk_ngaylap') }}</strong>
                        </span>
                    @endif
            </div>
    </div>
    <div class="form-group">
        <label for="nk_lydo">Lý do</label>
        <input type="text" class="form-control" id="nk_lydo" name="nk_lydo" placeholder="Nhập tên đơn vị" value="{{ old('nk_lydo') }}">
    </div>
    <div class="form-group">
        <label for="nk_tongtien">Tổng tiền</label>
        <input type="text" class="form-control" id="nk_tongtien" name="nk_tongtien" placeholder="Nhập địa chỉ" value="{{ old('nk_tongtien') }}">
    </div>
    <div class="form-group">
        <label for="nv_ma">Nhân viên lập</label>
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
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script type="text/javascript" src="{{ asset('vendor/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.min.js') }}"></script>
<script>
    $(document).ready(function () {
        debugger;
        $('#nk_ngaylapDatepicker').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Đồng ý",
                "cancelLabel": "Hủy",
                "fromLabel": "Từ",
                "toLabel": "Đến",
                "customRangeLabel": "Tùy chọn",
                "weekLabel": "T",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                "firstDay": 1
            },
        }, function(start, end, label) {
            // Gán giá trị cho Ngày để gởi dữ liệu về Backend
            $('#nk_ngaylap').val(start.format('YYYY-MM-DD HH:mm:ss'));
        });
        $("#frmLoai").validate({
            rules: {
                nk_ngaylap: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                nk_lydo: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                nk_tongtien: {
                    required: true,
                    minlength: 3,
                    maxlength: 50
                },
                nv_ma: {
                    required: true,
                },
                ncc_ma: {
                    required: true,
                },
            },
            messages: {
                nk_ngaylap: {
                    required: "Vui lòng chọn ngày lập",
                },
                nk_lydo: {
                    required: "Vui lòng nhập lý do",
                    minlength: "Lý do phải có ít nhất 3 ký tự",
                    maxlength: "Lý do không được vượt quá 50 ký tự"
                },
                nk_tongtien: {
                    required: "Vui lòng nhập tổng tiền",
                    minlength: "Tổng tiền phải có ít nhất 3 ký tự",
                    maxlength: "Tổng tiền không được vượt quá 50 ký tự"
                },
                nv_ma: {
                    required: "Vui lòng chọn nhân viên",
                },
                ncc_ma: {
                    required: "Vui long chọn nhà cung cấp",
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