@extends('backend.layout.master')

@section('title')
Thêm mới sản phẩm kho
@endsection

@section('feature-title')
Thêm mới sản phẩm kho
@endsection

@section('feature-description')
Thêm mới sản phẩm kho. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('content')
<form id="frmLoai" name="frmLoai" method="post" action="{{ route('backend.spk.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="kho_ma">Kho</label>
        <select name="kho_ma" class="form-control">
            @foreach($danhsachkho as $kho)
                @if(old('kho_ma') == $kho->kho_ma)
                <option value="{{ $kho->kho_ma }}" selected>{{ $kho->kho_ten }}</option>
                @else
                <option value="{{ $kho->kho_ma }}">{{ $kho->kho_ten }}</option>
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
        <label for="msp_soluong">Số lượng</label>
        <input type="number" class="form-control" id="msp_soluong" name="msp_soluong" placeholder="Nhập số lượng" value="{{ old('msp_soluong') }}">
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $("#frmLoai").validate({
            rules: {
                sp_ma: {
                    required: true,
                },
                m_ma: {
                    required: true, 
                },
                msp_soluong: {
                    required: true,
                    minlength: 3,
                    maxlength: 10
                }
            },
            messages: {
                q_ten: {
                    required: "Vui lòng nhập tên sản phẩm"
                },
                q_dienGiai: {
                    required: "Vui lòng nhập màu"
                },
                msp_soluong: {
                    required: "Vui lòng nhập số lượng ",
                    minlength: "Số lượng phải có ít nhất 3 ký tự",
                    maxlength: "Số lượng phải có ít nhất 10 ký tự"
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