@extends('backend.layout.master')

@section('title')
Danh sách khuyến mãi
@endsection

@section('feature-title')
Danh sách khuyến mãi
@endsection

@section('feature-description')
Danh sách các loại khuyến mãi có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.khuyenmai.create') }}" class="btn btn-primary">Thêm mới khuyến mãi </a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã khuyến mãi</th>
            <th>Tên</th>
            <th>Nội dung</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachkhuyenmai as $khuyenmai)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $khuyenmai->km_ma }}</td>
            <td>{{ $khuyenmai->km_ten }}</td>
            <td>{{ $khuyenmai->km_noiDung }}</td>
            <td>{{ $khuyenmai->km_batDau }}</td>
            <td>{{ $khuyenmai->km_ketThuc }}</td>
            <td>
                <a href="{{ route('backend.khuyenmai.edit', ['id' => $khuyenmai->km_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.khuyenmai.destroy', ['id' => $khuyenmai->km_ma]) }}">
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
{{ $danhsachkhuyenmai->links() }}
@endsection
