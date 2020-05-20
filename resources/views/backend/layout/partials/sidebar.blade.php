<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.dashboard') === 0) ? 'active' : '' }}" href="{{ route('backend.dashboard') }}">
                    <span data-feather="home"></span>
                    Bảng tin <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- Menu Chủ đề - Start -->
            <li class="nav-item">
                <a href="#chudeSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.chude') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Chủ đề
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.chude') === 0) ? 'collapse show' : 'collapse' }}" id="chudeSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.chude.index') === 0) ? 'active' : '' }}" href="{{ route('backend.chude.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.chude.create') === 0) ? 'active' : '' }}" href="{{ route('backend.chude.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Chủ đề - End -->
            <!-- Menu Loại - Start -->
            <li class="nav-item">
                <a href="#loaiSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.loai') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Loại
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.loai') === 0) ? 'collapse show' : 'collapse' }}" id="loaiSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.loai.index') === 0) ? 'active' : '' }}" href="{{ route('backend.loai.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.loai.create') === 0) ? 'active' : '' }}" href="{{ route('backend.loai.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Loại - End -->
            <!-- Menu Loại - Start -->
            <li class="nav-item">
                <a href="#vanchuyenSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.vanchuyen') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Vận chuyển
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.vanchuyen') === 0) ? 'collapse show' : 'collapse' }}" id="vanchuyenSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.vanchuyen.index') === 0) ? 'active' : '' }}" href="{{ route('backend.vanchuyen.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.vanchuyen.create') === 0) ? 'active' : '' }}" href="{{ route('backend.vanchuyen.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Loại - End -->
            <!-- Menu thanh toán - Start -->
            <li class="nav-item">
                <a href="#thanhtoanSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.thanhtoan') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Thanh toán
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.thanhtoan') === 0) ? 'collapse show' : 'collapse' }}" id="thanhtoanSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.thanhtoan.index') === 0) ? 'active' : '' }}" href="{{ route('backend.thanhtoan.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.thanhtoan.create') === 0) ? 'active' : '' }}" href="{{ route('backend.thanhtoan.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu thanh toán - End -->
            <!-- Menu quyền - Start -->
            <li class="nav-item">
                <a href="#quyenSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.quyen') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Quyền
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.quyen') === 0) ? 'collapse show' : 'collapse' }}" id="quyenSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.quyen.index') === 0) ? 'active' : '' }}" href="{{ route('backend.quyen.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.quyen.create') === 0) ? 'active' : '' }}" href="{{ route('backend.quyen.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu quyền - End -->
            <!-- Menu Sản phẩm - Start -->
            <li class="nav-item">
                <a href="#sanphamSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.sanpham') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Sản phẩm
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.sanpham') === 0) ? 'collapse show' : 'collapse' }}" id="sanphamSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.sanpham.index') === 0) ? 'active' : '' }}" href="{{ route('backend.sanpham.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.sanpham.create') === 0) ? 'active' : '' }}" href="{{ route('backend.sanpham.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Sản phẩm - End -->
            <!-- Menu Nhân viên - Start -->
            <li class="nav-item">
                <a href="#nhanvienSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.nhanvien') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Nhân viên
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.nhanvien') === 0) ? 'collapse show' : 'collapse' }}" id="nhanvienSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhanvien.index') === 0) ? 'active' : '' }}" href="{{ route('backend.nhanvien.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhanvien.create') === 0) ? 'active' : '' }}" href="{{ route('backend.nhanvien.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Nhân viên - End -->
            <!-- Menu xuất xứ - Start -->
            <li class="nav-item">
                <a href="#xuatxuSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.xuatxu') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Xuất xứ
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.xuatxu') === 0) ? 'collapse show' : 'collapse' }}" id="xuatxuSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.xuatxu.index') === 0) ? 'active' : '' }}" href="{{ route('backend.xuatxu.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.xuatxu.create') === 0) ? 'active' : '' }}" href="{{ route('backend.xuatxu.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu xuất xứ - End -->
            <!-- Menu phiếu nhập - Start -->
            <li class="nav-item">
                <a href="#phieunhapSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.phieunhap') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Phiếu nhập
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.phieunhap') === 0) ? 'collapse show' : 'collapse' }}" id="phieunhapSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.phieunhap.index') === 0) ? 'active' : '' }}" href="{{ route('backend.phieunhap.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.phieunhap.create') === 0) ? 'active' : '' }}" href="{{ route('backend.phieunhap.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu phiếu nhập - End -->
            <!-- Menu chi tiết nhập - Start -->
            <!-- <li class="nav-item">
                <a href="#chitietnhapSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.chitietnhap') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Chi tiết nhập
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.chitietnhap') === 0) ? 'collapse show' : 'collapse' }}" id="chitietnhapSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.chitietnhap.index') === 0) ? 'active' : '' }}" href="{{ route('backend.chitietnhap.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.chitietnhap.create') === 0) ? 'active' : '' }}" href="{{ route('backend.chitietnhap.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- Menu chi tiết nhập - End -->
            <!-- Menu Khuyến mãi - Start -->
            <li class="nav-item">
                <a href="#khuyenmaiSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.khuyenmai') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Khuyến mãi
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.khuyenmai') === 0) ? 'collapse show' : 'collapse' }}" id="khuyenmaiSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.khuyenmai.index') === 0) ? 'active' : '' }}" href="{{ route('backend.khuyenmai.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.khuyenmai.create') === 0) ? 'active' : '' }}" href="{{ route('backend.khuyenmai.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Khuyến mãi  - End -->
            <!-- Menu Góp ý - Start -->
            <li class="nav-item">
                <a href="#gopySubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.gopy') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Góp ý
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.gopy') === 0) ? 'collapse show' : 'collapse' }}" id="gopySubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.gopy.index') === 0) ? 'active' : '' }}" href="{{ route('backend.gopy.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Góp ý - End -->
            <!-- Menu nhà cung cấp - Start -->
            <li class="nav-item">
                <a href="#nhacungcapSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.nhacungcap') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Nhà cung cấp
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.nhacungcap') === 0) ? 'collapse show' : 'collapse' }}" id="nhacungcapSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhacungcap.index') === 0) ? 'active' : '' }}" href="{{ route('backend.nhacungcap.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhacungcap.create') === 0) ? 'active' : '' }}" href="{{ route('backend.nhacungcap.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu nhà cung cấp - End -->
            <!-- Menu hóa đơn sỉ - Start -->
            <li class="nav-item">
                <a href="#hoadonsiSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.hoadonsi') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Hóa đơn sỉ
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.hoadonsi') === 0) ? 'collapse show' : 'collapse' }}" id="hoadonsiSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.hoadonsi.index') === 0) ? 'active' : '' }}" href="{{ route('backend.hoadonsi.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.hoadonsi.create') === 0) ? 'active' : '' }}" href="{{ route('backend.hoadonsi.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu hóa đơn sỉ - End -->
            <!-- Menu hóa đơn lẻ - Start -->
            <li class="nav-item">
                <a href="#hoadonleSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.hoadonle') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Hóa đơn lẻ
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.hoadonle') === 0) ? 'collapse show' : 'collapse' }}" id="hoadonleSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.hoadonle.index') === 0) ? 'active' : '' }}" href="{{ route('backend.hoadonle.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.hoadonle.create') === 0) ? 'active' : '' }}" href="{{ route('backend.hoadonle.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu hóa đơn lẻ - End -->
            <!-- Menu đơn hàng - Start -->
            <li class="nav-item">
                <a href="#donhangSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.donhang') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Đơn hàng
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.donhang') === 0) ? 'collapse show' : 'collapse' }}" id="donhangSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.donhang.index') === 0) ? 'active' : '' }}" href="{{ route('backend.donhang.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu đơn hàng - End -->
            <!-- Menu chi tiết đơn hàng - Start -->
            <li class="nav-item">
                <a href="#chitietdonhangSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.chitietdonhang') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Chi tiết đơn hàng
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.chitietdonhang') === 0) ? 'collapse show' : 'collapse' }}" id="chitietdonhangSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.chitietdonhang.index') === 0) ? 'active' : '' }}" href="{{ route('backend.chitietdonhang.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu chi tiết đơn hàng - End -->
            <!-- Menu Khuyến mãi sản phẩm - Start -->
            <li class="nav-item">
                <a href="#kmspSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.kmsp') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Khuyến mãi sản phẩm
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.kmsp') === 0) ? 'collapse show' : 'collapse' }}" id="kmspSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.kmsp.index') === 0) ? 'active' : '' }}" href="{{ route('backend.kmsp.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.kmsp.create') === 0) ? 'active' : '' }}" href="{{ route('backend.kmsp.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Khuyến mãi sản phẩm - End -->
            <!-- Menu màu - Start -->
            <li class="nav-item">
                <a href="#mauSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.mau') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Màu
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.mau') === 0) ? 'collapse show' : 'collapse' }}" id="mauSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.mau.index') === 0) ? 'active' : '' }}" href="{{ route('backend.mau.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.mau.create') === 0) ? 'active' : '' }}" href="{{ route('backend.mau.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu màu - End -->
            <!-- Menu màu sản phẩm - Start -->
            <li class="nav-item">
                <a href="#mspSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.msp') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Màu sản phẩm
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.msp') === 0) ? 'collapse show' : 'collapse' }}" id="mspSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.msp.index') === 0) ? 'active' : '' }}" href="{{ route('backend.msp.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.msp.create') === 0) ? 'active' : '' }}" href="{{ route('backend.msp.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu màu sản phẩm - End -->
            <!-- Menu chủ đề sản phẩm - Start -->
            <li class="nav-item">
                <a href="#cdspSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.cdsp') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Chủ đề sản phẩm
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.cdsp') === 0) ? 'collapse show' : 'collapse' }}" id="cdspSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.cdsp.index') === 0) ? 'active' : '' }}" href="{{ route('backend.cdsp.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.cdsp.create') === 0) ? 'active' : '' }}" href="{{ route('backend.cdsp.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu chủ đề sản phẩm - End -->
            <!-- Menu Khách hàng - Start-->
            <li class="nav-item">
                <a href="#khachhangSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.khachhang') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Khách hàng
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.khachhang') === 0) ? 'collapse show' : 'collapse' }}" id="khachhangSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.khachhang.index') === 0) ? 'active' : '' }}" href="{{ route('backend.khachhang.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Khách hàng - End -->
            <!-- Menu Báo cáo - Start -->
            <li class="nav-item">
                <a href="#baocaoSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.baocao') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Báo cáo - Thống kê
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.baocao') === 0) ? 'collapse show' : 'collapse' }}" id="baocaoSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.baocao.donhang') === 0) ? 'active' : '' }}" href="{{ route('backend.baocao.donhang') }}/">
                            <span data-feather="list"></span>
                            Đơn hàng
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Báo cáo - End -->

            <!-- Menu Kho - Start -->
            <li class="nav-item">
                <a href="#khoSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.kho') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Kho
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.kho') === 0) ? 'collapse show' : 'collapse' }}" id="khoSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.kho.index') === 0) ? 'active' : '' }}" href="{{ route('backend.kho.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.kho.create') === 0) ? 'active' : '' }}" href="{{ route('backend.kho.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu kho - End -->
            <!-- Menu nhập kho - Start -->
            <!-- <li class="nav-item">
                <a href="#nhapkhoSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.nhapkho') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Nhập kho
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.nhapkho') === 0) ? 'collapse show' : 'collapse' }}" id="nhapkhoSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhapkho.index') === 0) ? 'active' : '' }}" href="{{ route('backend.nhapkho.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.nhapkho.create') === 0) ? 'active' : '' }}" href="{{ route('backend.nhapkho.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- Menu nhập kho - End -->
            <!-- Menu đơn vị tính - Start -->
            <li class="nav-item">
                <a href="#donvitinhSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.donvitinh') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Đơn vị tính
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.donvitinh') === 0) ? 'collapse show' : 'collapse' }}" id="donvitinhSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.donvitinh.index') === 0) ? 'active' : '' }}" href="{{ route('backend.donvitinh.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.donvitinh.create') === 0) ? 'active' : '' }}" href="{{ route('backend.donvitinh.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu đơn vị tính - End -->
            <!-- Menu sản phẩm kho - Start -->
            <li class="nav-item">
                <a href="#spkSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.spk') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Sản phẩm kho
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.spk') === 0) ? 'collapse show' : 'collapse' }}" id="spkSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.spk.index') === 0) ? 'active' : '' }}" href="{{ route('backend.spk.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.spk.create') === 0) ? 'active' : '' }}" href="{{ route('backend.spk.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu sản phẩm kho - End -->
            <!-- Menu xuất kho - Start -->
            <li class="nav-item">
                <a href="#xuatkhoSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.xuatkho') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Xuất kho
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.xuatkho') === 0) ? 'collapse show' : 'collapse' }}" id="xuatkhoSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.xuatkho.index') === 0) ? 'active' : '' }}" href="{{ route('backend.xuatkho.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.xuatkho.create') === 0) ? 'active' : '' }}" href="{{ route('backend.xuatkho.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu xuất kho - End -->
            <!-- Menu chuyển kho - Start -->
            <li class="nav-item">
                <a href="#chuyenkhoSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'backend.chuyenkho') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Chuyển kho
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'backend.chuyenkho') === 0) ? 'collapse show' : 'collapse' }}" id="chuyenkhoSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.chuyenkho.index') === 0) ? 'active' : '' }}" href="{{ route('backend.chuyenkho.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'backend.chuyenkho.create') === 0) ? 'active' : '' }}" href="{{ route('backend.chuyenkho.create') }}">
                            <span data-feather="plus"></span>
                            Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Menu chuyển kho - End -->
        </ul>
    </div>
</nav>