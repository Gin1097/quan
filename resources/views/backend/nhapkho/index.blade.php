@extends('backend.layout.master')

@section('title')
Danh sách nhập kho
@endsection

@section('feature-title')
Danh sách nhập kho
@endsection

@section('feature-description')
Danh sách các loại nhập kho có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.nhapkho.create') }}" class="btn btn-primary">Thêm mới nhập kho </a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã nhập</th>
            <th>Ngày lập</th>
            <th>Lý do</th>
            <th>Tổng tiền</th>
            <th>Nhà cung cấp - nhân viên</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachnhapkho as $nk)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $nk->nk_ma }}</td>
            <td>{{ $nk->nk_ngaylap }}</td>
            <td>{{ $nk->nk_lydo }}</td>
            <td>{{ $nk->nk_tongtien }}</td>
            <td>{{ $nk->nhacungcap->ncc_ten }} - {{ $nk->nhanvien->nv_hoTen }}</td>
            <td>
                <a href="{{ route('backend.nhapkho.edit', ['id' => $nk->nk_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.nhapkho.destroy', ['id' => $nk->nk_ma]) }}">
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
{{ $danhsachnhapkho->links() }}
@endsection
