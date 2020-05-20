@extends('backend.layout.master')

@section('title')
Danh sách góp ý
@endsection

@section('feature-title')
Danh sách góp ý
@endsection

@section('feature-description')
Danh sách các loại góp ý có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Thời gian</th>
            <th>Nội dung</th>
            <th>Khách hàng</th>
            <th>Sản phẩm</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachgopy as $gopy)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $gopy->gy_thoiGian }}</td>
            <td>{{ $gopy->gy_noiDung }}</td>
            <td>{{ $gopy->gopykhachhang->kh_hoTen }}</td>
            <td>{{ $gopy->gopysanpham->sp_ten }}</td>
            <td>
                <a href="{{ route('backend.gopy.edit', ['id' => $gopy->gy_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.gopy.destroy', ['id' => $gopy->gy_ma]) }}">
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
{{ $danhsachgopy->links() }}
@endsection
