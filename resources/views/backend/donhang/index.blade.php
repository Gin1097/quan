@extends('backend.layout.master')

@section('title')
Danh sách đơn hàng
@endsection

@section('feature-title')
Danh sách đơn hàng
@endsection

@section('feature-description')
Danh sách các loại đơn hàng có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Người nhận</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachdonhang as $donhang)
        <tr>
            <td>{{ $donhang->dh_ma }}</td>
            <td>{{ $donhang->khachhangdonhang->kh_hoTen }}</td>
            <td>{{ $donhang->dh_nguoiNhan }}</td>
            <td>{{ $donhang->dh_diaChi }}</td>
            <td>{{ $donhang->dh_dienThoai }}</td>
            <td>
                <a href="{{ route('backend.donhang.edit', ['id' => $donhang->dh_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.donhang.destroy', ['id' => $donhang->dh_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $danhsachdonhang->links() }}
@endsection
