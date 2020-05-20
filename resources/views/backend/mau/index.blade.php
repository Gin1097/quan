@extends('backend.layout.master')

@section('title')
Danh sách màu
@endsection

@section('feature-title')
Danh sách màu
@endsection

@section('feature-description')
Danh sách các loại màu có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.mau.create') }}" class="btn btn-primary">Thêm mới màu</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã màu</th>
            <th>Tên màu</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachmau as $mau)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $mau->m_ma }}</td>
            <td>{{ $mau->m_ten }}</td>
            <td>
                <a href="{{ route('backend.mau.edit', ['id' => $mau->m_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.mau.destroy', ['id' => $mau->m_ma]) }}">
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
