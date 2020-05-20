@extends('backend.layout.master')

@section('title')
Danh sách Loại
@endsection

@section('feature-title')
Danh sách loại   
@endsection

@section('feature-description')
Danh sách các loại có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.loai.create') }}" class="btn btn-primary">Thêm mới Loại</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachloai as $loai)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $loai->l_ma }}</td>
            <td>{{ $loai->l_ten }}</td>
            <td>
                <a href="{{ route('backend.loai.edit', ['id' => $loai->l_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.loai.destroy', ['id' => $loai->l_ma]) }}">
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
