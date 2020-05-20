@extends('backend.layout.master')

@section('title')
Danh sách Nhân viên
@endsection

@section('feature-title')
Danh sách Nhân viên   
@endsection

@section('feature-description')
Danh sách các Nhân viên có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.nhanvien.create') }}" class="btn btn-primary">Thêm mới Nhân viên</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã nhân viên</th>
            <th>Tài khoản</th>
            <th>Họ tên nhân viên</th>
            <th>Quyền</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachnhanvien as $nv)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $nv->nv_ma }}</td>
            <td>{{ $nv->nv_taiKhoan }}</td>
            <td>{{ $nv->nv_hoTen }}</td>
            <td>{{ $nv->quyennhanvien->q_ten }}</td>
            <td>
                <a href="{{ route('backend.nhanvien.edit', ['id' => $nv->nv_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.nhanvien.destroy', ['id' => $nv->nv_ma]) }}">
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
{{ $danhsachnhanvien->links() }}
@endsection
