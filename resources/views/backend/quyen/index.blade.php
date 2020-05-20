@extends('backend.layout.master')

@section('title')
Danh sách quyền
@endsection

@section('feature-title')
Danh sách quyền
@endsection

@section('feature-description')
Danh sách các loại quyền có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.thanhtoan.create') }}" class="btn btn-primary">Thêm mới quyền</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã quyền</th>
            <th>Tên quyền</th>
            <th>Chi tiết</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachquyen as $quyen)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $quyen->q_ma }}</td>
            <td>{{ $quyen->q_ten }}</td>
            <td>{{ $quyen->q_dienGiai }}</td>
            <td>
                <a href="{{ route('backend.quyen.edit', ['id' => $quyen->q_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.quyen.destroy', ['id' => $quyen->q_ma]) }}">
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
