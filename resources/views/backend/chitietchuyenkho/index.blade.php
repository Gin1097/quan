@extends('backend.layout.master')

@section('title')
Danh sách chi tiết phiếu chuyển kho
@endsection

@section('feature-title')
Danh sách chi tiết phiếu chuyển kho   
@endsection

@section('feature-description')
Danh sách các chi tiết phiếu chuyển kho có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã phiếu</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th> 
            <th>Thành tiền</th> 
            <th>Kho cũ</th> 
            <th>Kho mới</th> 
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachchitietchuyenkho as $ctck)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $ctck->ck_ma }}</td>
            <td>{{ $ctck->sanpham->sp_ten }}</td>
            <td>{{ $ctck->ctck_soLuong }}</td> 
            <td>{{ $ctck->ctck_thanhtien }}</td>           
            <td>{{ $ctck->khocu->kho_ten }}</td>
            <td>{{ $ctck->khomoi->kho_ten }}</td>
            <td>
                <a href="{{ route('backend.ctck.edit', ['id' => $ctck->ck_ma, 'id1' => $ctck->sp_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.ctck.destroy', ['id' => $ctck->ck_ma, 'id1' => $ctck->sp_ma]) }}">
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
{{ $danhsachchitietchuyenkho->links() }}
@endsection
