@extends('backend.layout.master')

@section('title')
Danh sách chi tiết đơn hàng
@endsection

@section('feature-title')
Danh sách chi tiết đơn hàng   
@endsection

@section('feature-description')
Danh sách các chi tiết đơn hàng có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Đơn hàng</th>
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
        @foreach($danhsachchitietdonhang as $ctdh)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $ctdh->dh_ma }}</td>
            <td>{{ $ctdh->donhangsanpham->sp_ten }}</td>
            <td>{{ $ctdh->mau->m_ten }}</td>
            <td>{{ $ctdh->ctdh_soLuong }}</td>
            <td>{{ $ctdh->ctdh_donGia }}</td>            
            <td>
                <a href="{{ route('backend.chitietdonhang.edit', ['id' => $ctdh->dh_ma, 'id1' => $ctdh->sp_ma, 'id2' => $ctdh->m_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.chitietdonhang.destroy', ['id' => $ctdh->dh_ma, 'id1' => $ctdh->sp_ma, 'id2' => $ctdh->m_ma]) }}">
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
{{ $danhsachchitietdonhang->links() }}
@endsection
