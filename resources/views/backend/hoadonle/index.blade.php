@extends('backend.layout.master')

@section('title')
Danh sách hóa đơn lẻ
@endsection

@section('feature-title')
Danh sách hóa đơn lẻ
@endsection

@section('feature-description')
Danh sách hóa đơn lẻ có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.hoadonle.create') }}" class="btn btn-primary">Thêm mới hóa đơn lẻ</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã hóa đơn lẻ</th>
            <th>Tên người mua hàng</th>
            <th>Điện thoại</th>
            <th>Địa chỉ</th>
            <th>Nhân viên</th>
            <th>Ngày xuất HD</th>
            <th>Đơn hàng</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachhoadonle as $hoadonle)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $hoadonle->hdl_ma }}</td>
            <td>{{ $hoadonle->hdl_nguoiMuaHang }}</td>
            <td>{{ $hoadonle->hdl_dienThoai }}</td>
            <td>{{ $hoadonle->hdl_diaChi }}</td>
            <td>{{ $hoadonle->nhanvienhoadonle->nv_hoTen }}</td>
            <td>{{ $hoadonle->hdl_ngayXuatHoaDon }}</td>
            <td>{{ $hoadonle->dh_ma}}</td>
            <td>
                <a href="{{ route('backend.hoadonle.edit', ['id' => $hoadonle->hdl_ma]) }}" class="btn btn-success">Sửa</a>
                <a href="{{ route('backend.hoadonle.print', ['id' => $hoadonle->hdl_ma]) }}" class="btn btn-warning">In hd</a>
                <form class="d-inline" method="post" action="{{ route('backend.hoadonle.destroy', ['id' => $hoadonle->hdl_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        <?php
        $stt++;
        ?>
        @endforeach
    </tbody>
</table>
{{ $danhsachhoadonle->links() }}
@endsection
