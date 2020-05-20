@extends('backend.layout.master')

@section('title')
Danh sách kho
@endsection

@section('feature-title')
Danh sách kho
@endsection

@section('feature-description')
Danh sách kho có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.kho.create') }}" class="btn btn-primary">Thêm mới kho </a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã kho</th>
            <th>Tên kho</th>
            <th>Địa chỉ</th>
            <th>SDT</th>
            <th>Quản lý</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachkho as $kho)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $kho->kho_ma }}</td>
            <td>{{ $kho->kho_ten }}</td>
            <td>{{ $kho->kho_diachi }}</td>
            <td>{{ $kho->kho_sdt }}</td>
            <td>{{ $kho->kho_quanly }}</td>
            <td>
                <a href="{{ route('backend.kho.edit', ['id' => $kho->kho_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.kho.destroy', ['id' => $kho->kho_ma]) }}">
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
{{ $danhsachkho->links() }}
@endsection
