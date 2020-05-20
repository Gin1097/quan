@extends('backend.layout.master')

@section('title')
Danh sách phiếu nhập
@endsection

@section('feature-title')
Danh sách phiếu nhập
@endsection

@section('feature-description')
Danh sách các phiếu nhập có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.phieunhap.create') }}" class="btn btn-primary">Thêm mới phiếu nhập</a>
<a href="{{ route('backend.chitietnhap.index') }}" class="btn btn-success">Xem chi tiết phiếu nhập</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã phiếu</th>
            <th>Người giao</th>
            <th>Số hóa đơn</th>
            <th>Ghi chú</th>
            <th>Nhà cung cấp</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachphieunhap as $phieunhap)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $phieunhap->pn_ma }}</td>
            <td>{{ $phieunhap->pn_nguoiGiao }}</td>
            <td>{{ $phieunhap->pn_soHoaDon }}</td>
            <td>{{ $phieunhap->pn_ghiChu }}</td>
            <td>{{ $phieunhap->phieunhapnhacungcap->ncc_ten }}</td>
            <td>
                <a href="{{ route('backend.phieunhap.edit', ['id' => $phieunhap->pn_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.phieunhap.destroy', ['id' => $phieunhap->pn_ma]) }}">
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
{{ $danhsachphieunhap->links() }}
@endsection
