@extends('backend.layout.master')

@section('title')
Thêm mới khuyến mãi
@endsection

@section('feature-title')
Thêm mới khuyến mãi
@endsection

@section('feature-description')
Thêm mới khuyến mãi. Vui lòng nhập thông tin và bấm Lưu.
@endsection
@section('custom-css')
<!-- Các style dành cho thư viện Daterangepicker -->
<link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.khuyenmai.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="km_ten">Tên khuyến mãi</label>
        <input type="text" class="form-control" id="km_ten" name="km_ten" placeholder="Nhập tên khuyến mãi" value="{{ old('km_ten') }}">
    </div>
    <div class="form-group">
        <label for="km_noiDung">Nội dung</label>
        <input type="text" class="form-control" id="km_noiDung" name="km_noiDung" placeholder="Nhập nội dung khuyến mãi" value="{{ old('km_noiDung') }}">
    </div> 
    <div class="form-group" >
        <label for="km_batDauDatepicker">Ngày sinh</label>
                <input id="km_batDauDatepicker" type="text" class="form-control">
    </div>
    <div class="form-group{{ $errors->has('km_batDau') ? ' has-error' : '' }}" style="display: none;">
        <label for="km_batDau" class="col-md-4 control-label">Ngày sinh</label>
            <div class="col-md-6">
                <input id="km_batDau" type="text" class="form-control" name="km_batDau" value="{{ old('km_batDau') }}" required autofocus>
                    @if ($errors->has('km_batDau'))
                        <span class="help-block">
                            <strong>{{ $errors->first('km_batDau') }}</strong>
                        </span>
                    @endif
            </div>
    </div>
    <div class="form-group">
        <label for="km_giaTri">Giá trị khuyến mãi</label>
        <input type="number" class="form-control" id="km_giaTri" name="km_giaTri" placeholder="Nhập giá trị khuyến mãi" value="{{ old('km_giaTri') }}">
    </div>
    <div class="form-group">
        <label for="nv_nguoiLap">Người lập</label>
        <select name="nv_nguoiLap" class="form-control">
            @foreach($danhsachnhanvien as $nhanvienlap)
                @if(old('nv_nguoiLap') == $nhanvienlap->nv_ma)
                <option value="{{ $nhanvienlap->nv_ma }}" selected>{{ $nhanvienlap->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvienlap->nv_ma }}">{{ $nhanvienlap->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_kyNhay">Nhân viên ký nháy</label>
        <select name="nv_kyNhay" class="form-control">
            @foreach($danhsachnhanvien as $nhanvienkynhay)
                @if(old('nv_kyNhay') == $nhanvienkynhay->nv_ma)
                <option value="{{ $nhanvienkynhay->nv_ma }}" selected>{{ $nhanvienkynhay->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvienkynhay->nv_ma }}">{{ $nhanvienkynhay->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_kyDuyet">Nhân viên ký duyệt</label>
        <select name="nv_kyDuyet" class="form-control">
            @foreach($danhsachnhanvien as $nhanvienkyduyet)
                @if(old('nv_kyDuyet') == $nhanvienkyduyet->nv_ma)
                <option value="{{ $nhanvienkyduyet->nv_ma }}" selected>{{ $nhanvienkyduyet->nv_hoTen }}</option>
                @else
                <option value="{{ $nhanvienkyduyet->nv_ma }}">{{ $nhanvienkyduyet->nv_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <select name="km_trangThai" class="form-control">
        <option value="1" {{ old('km_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
        <option value="2" {{ old('km_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script type="text/javascript" src="{{ asset('vendor/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.min.js') }}"></script>
<script>
    $(document).ready(function() {
        debugger;
        $('#km_batDauDatepicker').daterangepicker({
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
            $('#km_batDau').val(start.format('YYYY-MM-DD HH:mm:ss'));
        });
        // callback function
    });
</script>
@endsection