@extends('backend.layout.master')

@section('title')
Danh sách phiếu chuyển kho
@endsection

@section('feature-title')
Danh sách phiếu chuyển kho   
@endsection

@section('feature-description')
Danh sách các phiếu chuyển kho có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.chuyenkho.create') }}" class="btn btn-primary">Thêm mới phiếu chuyển kho</a>
<a href="{{ route('backend.ctck.index') }}" class="btn btn-success">Chi tiết phiếu chuyển</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã phiếu</th>
            <th>Lý do</th>
            <th>Ngày lập</th> 
            <th>Nhân viên</th> 
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachchuyenkho as $chuyenkho)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $chuyenkho->ck_ma }}</td>
            <td>{{ $chuyenkho->ck_lydo }}</td>
            <td>{{ $chuyenkho->ck_ngay }}</td>            
            <td>{{ $chuyenkho->nhanvien->nv_hoTen }}</td>  
            <td>
                <a href="{{ route('backend.chuyenkho.edit', ['id' => $chuyenkho->ck_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.chuyenkho.destroy', ['id' => $chuyenkho->ck_ma]) }}">
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
{{ $danhsachchuyenkho->links() }}
@endsection
