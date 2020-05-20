@extends('backend.layout.master')

@section('title')
Danh sách thanh toán
@endsection

@section('feature-title')
Danh sách thanh toán
@endsection

@section('feature-description')
Danh sách các loại thanh toán có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.thanhtoan.create') }}" class="btn btn-primary">Thêm mới Thanh toán</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã thanh toán</th>
            <th>Tên thanh toán</th>
            <th>Chi tiết</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachthanhtoan as $thanhtoan)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $thanhtoan->tt_ma }}</td>
            <td>{{ $thanhtoan->tt_ten }}</td>
            <td>{{ $thanhtoan->tt_dienGiai }}</td>
            <td>
                <a href="{{ route('backend.thanhtoan.edit', ['id' => $thanhtoan->tt_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.thanhtoan.destroy', ['id' => $thanhtoan->tt_ma]) }}">
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
@endsection
