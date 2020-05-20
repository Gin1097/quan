@extends('backend.layout.master')

@section('title')
Danh sách chi tiết nhập
@endsection

@section('feature-title')
Danh sách chi tiết nhập
@endsection

@section('feature-description')
Danh sách chi tiết nhập có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã phiếu</th>
            <th>Sản phẩm</th>
            <th>Màu</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachchitietnhap as $chitietnhap)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $chitietnhap->pn_ma }}</td>
            <td>{{ $chitietnhap->sanpham->sp_ten }}</td>
            <td>{{ $chitietnhap->mau->m_ten }}</td>
            <td>{{ $chitietnhap->ctn_soLuong }}</td>
            <td>{{ $chitietnhap->ctn_donGia }}</td>
            <td>
                <a href="{{ route('backend.chitietnhap.edit', ['id' => $chitietnhap->pn_ma, 'id1' => $chitietnhap->sp_ma, 'id2' => $chitietnhap->m_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.chitietnhap.destroy', ['id' => $chitietnhap->pn_ma, 'id1' => $chitietnhap->sp_ma, 'id2' => $chitietnhap->m_ma]) }}">
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
{{ $danhsachchitietnhap->links() }}
@endsection
