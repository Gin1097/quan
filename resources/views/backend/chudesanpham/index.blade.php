@extends('backend.layout.master')

@section('title')
Danh sách chủ đề sản phẩm
@endsection

@section('feature-title')
Danh sách chủ đề sản phẩm   
@endsection

@section('feature-description')
Danh sách các chủ đề sản phẩm có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.cdsp.create') }}" class="btn btn-primary">Thêm mới chủ đề sản phẩm</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Chủ đề</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachchudesanpham as $cdsp)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $cdsp->sanpham->sp_ten }}</td>
            <td>{{ $cdsp->chude->cd_ten }}</td>
            <td>
                <a href="{{ route('backend.cdsp.edit', ['id' => $cdsp->sp_ma, 'id1' => $cdsp->cd_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.cdsp.destroy', ['id' => $cdsp->sp_ma, 'id1' => $cdsp->cd_ma]) }}">
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
{{ $danhsachchudesanpham->links() }}
@endsection
