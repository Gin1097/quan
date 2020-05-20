@extends('backend.layout.master')

@section('title')
Danh sách chi tiết phiếu xuất kho
@endsection

@section('feature-title')
Danh sách chi tiết phiếu xuất kho   
@endsection

@section('feature-description')
Danh sách các chi tiết phiếu xuất kho có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Mã phiếu xuất</th>
            <th>Số lượng</th> 
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachchitietxuatkho as $ctxk)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $ctxk->sanpham->sp_ten }}</td>
            <td>{{ $ctxk->xk_ma }}</td>
            <td>{{ $ctxk->ctxk_soluong }}</td>            
            <td>
                <a href="{{ route('backend.ctxk.edit', ['id' => $ctxk->sp_ma, 'id1' => $ctxk->xk_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.ctxk.destroy', ['id' => $ctxk->sp_ma, 'id1' => $ctxk->xk_ma]) }}">
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
{{ $danhsachchitietxuatkho->links() }}
@endsection
