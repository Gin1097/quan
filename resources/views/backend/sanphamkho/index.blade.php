@extends('backend.layout.master')

@section('title')
Danh sách sản phẩm kho
@endsection

@section('feature-title')
Danh sách sản phẩm kho   
@endsection

@section('feature-description')
Danh sách các sản phẩm kho có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<div class="form-controll">
<a href="{{ route('backend.spk.create') }}" class="btn btn-primary">Thêm mới sản phẩm kho</a>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Kho</th>
            <th>Số lượng nhập</th> 
            <th>Số lượng xuất</th> 
            <th>Số lượng tồn</th> 
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachsanphamkho as $spk)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $spk->sanpham->sp_ten }}</td>
            <td>{{ $spk->kho->kho_ten }}</td>
            <td>{{ $spk->sl_nhap }}</td>            
            <td>{{ $spk->sl_xuat }}</td>            
            <td>{{ $spk->sl_ton }}</td>            
            <td>
                <a href="{{ route('backend.spk.edit', ['id' => $spk->kho_ma, 'id1' => $spk->sp_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.spk.destroy', ['id' => $spk->kho_ma, 'id1' => $spk->sp_ma]) }}">
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
{{ $danhsachsanphamkho->links() }}
@endsection
