@extends('backend.layout.master')

@section('title')
Danh sách phiếu xuất kho
@endsection

@section('feature-title')
Danh sách phiếu xuất kho   
@endsection

@section('feature-description')
Danh sách các phiếu xuất kho có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.xuatkho.create') }}" class="btn btn-primary">Thêm mới phiếu xuất kho</a>
<a href="{{ route('backend.ctxk.index') }}" class="btn btn-success">Chi tiết phiếu xuất</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã phiếu</th>
            <th>Lý do</th>
            <th>Ngày lập</th> 
            <th>Địa chỉ</th> 
            <th>Nhân viên</th> 
            <th>Tổng tiền</th> 
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachxuatkho as $xuatkho)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $xuatkho->xk_ma }}</td>
            <td>{{ $xuatkho->xk_lydo }}</td>
            <td>{{ $xuatkho->xk_ngaylap }}</td>            
            <td>{{ $xuatkho->xk_diachi }}</td>            
            <td>{{ $xuatkho->nhanvien->nv_hoTen }}</td>  
            <td>{{ $xuatkho->xk_tongtien }}</td>          
            <td>
                <a href="{{ route('backend.xuatkho.edit', ['id' => $xuatkho->xk_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.xuatkho.destroy', ['id' => $xuatkho->xk_ma]) }}">
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
{{ $danhsachxuatkho->links() }}
@endsection
