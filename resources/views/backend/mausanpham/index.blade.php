@extends('backend.layout.master')

@section('title')
Danh sách màu sản phẩm
@endsection

@section('feature-title')
Danh sách màu sản phẩm   
@endsection

@section('feature-description')
Danh sách các màu sản phẩm có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('backend.msp.create') }}" class="btn btn-primary">Thêm mới màu sản phẩm</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Màu</th>
            <th>Số lượng màu sản phẩm</th> 
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachmausanpham as $msp)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $msp->mausanpham->sp_ten }}</td>
            <td>{{ $msp->mau->m_ten }}</td>
            <td>{{ $msp->msp_soluong }}</td>            
            <td>
                <a href="{{ route('backend.msp.edit', ['id' => $msp->sp_ma, 'id1' => $msp->m_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('backend.msp.destroy', ['id' => $msp->sp_ma, 'id1' => $msp->m_ma]) }}">
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
{{ $danhsachmausanpham->links() }}
@endsection
