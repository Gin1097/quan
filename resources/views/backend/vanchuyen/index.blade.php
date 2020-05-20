@extends('backend.layout.master')

@section('title')
Danh sách Vận chuyển
@endsection

@section('feature-title')
Danh sách Vận chuyển
@endsection

@section('feature-description')
Danh sách các loại vận chuyển có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.vanchuyen.create') }}" class="btn btn-primary">Thêm mới Vận chuyển</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã vận chuyển</th>
            <th>Tên vận chuyển</th>
            <th>Chi phí</th>
            <th>Chi tiết</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachvanchuyen as $vanchuyen)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $vanchuyen->vc_ma }}</td>
            <td>{{ $vanchuyen->vc_ten }}</td>
            <td>{{ $vanchuyen->vc_chiPhi }}</td>
            <td>{{ $vanchuyen->vc_dienGiai }}</td>
            <td>
                <a href="{{ route('backend.vanchuyen.edit', ['id' => $vanchuyen->vc_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.vanchuyen.destroy', ['id' => $vanchuyen->vc_ma]) }}">
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
@endsection
