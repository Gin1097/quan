@extends('backend.layout.master')

@section('title')
Danh sách đơn vị tính
@endsection

@section('feature-title')
Danh sách đơn vị tính
@endsection

@section('feature-description')
Danh sách các loại đơn vị tính có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.donvitinh.create') }}" class="btn btn-primary">Thêm mới đơn vị tính</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn vị tính</th>
            <th>Tên đơn vị tính</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachdonvitinh as $donvitinh)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $donvitinh->dvt_ma }}</td>
            <td>{{ $donvitinh->dvt_ten }}</td>
            <td>
                <a href="{{ route('backend.donvitinh.edit', ['id' => $donvitinh->dvt_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.donvitinh.destroy', ['id' => $donvitinh->dvt_ma]) }}">
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
{{ $danhsachdonvitinh->links() }}
@endsection
