@extends('backend.layout.master')

@section('title')
Danh sách khuyến mãi sản phẩm
@endsection

@section('feature-title')
Danh sách khuyến mãi sản phẩm
@endsection

@section('feature-description')
Danh sách khuyến mãi sản phẩm có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.kmsp.create') }}" class="btn btn-primary">Thêm mới khuyến mãi sản phẩm</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khuyến mãi</th>
            <th>Sản phẩm</th>
            <th>Màu</th>
            <th>Giá trị</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachkhuyenmaisanpham as $kmsp)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $kmsp->khuyenmai->km_ten }}</td>
            <td>{{ $kmsp->sanpham->sp_ten }}</td>
            <td>{{ $kmsp->mau->m_ten }}</td>
            <td>{{ $kmsp->kmsp_giaTri }}</td>
            <td>
                <a href="{{ route('backend.kmsp.edit', ['id' => $kmsp->km_ma, 'id1' => $kmsp->sp_ma, 'id2' => $kmsp->m_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.kmsp.destroy', ['id' => $kmsp->km_ma, 'id1' => $kmsp->sp_ma, 'id2' => $kmsp->m_ma]) }}">
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
{{ $danhsachkhuyenmaisanpham->links() }}
@endsection
