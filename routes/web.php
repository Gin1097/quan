<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route Hiển thị màn hình hello 
Route::get('/hello', 'ExampleController@hello')->name('example.hello');

Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/danhsachloai', function() {
//     // Truy van database, table Loai
//     // hien thi
//     return 'Hello, day la chuc nang danh sach loai';
// });
Route::get('/danhsachloai', 'LoaiController@hienthimanhinhdanhsach');
Route::get('/danhsachloai/taomoi', 'LoaiController@taomoi');

// Route::get('/danhsachloai/taomoi', function() {
//     return 'Hello, day la chuc nang them moi danh sach loai';
// });


// Các route dành riêng cho backend
Route::group(['middleware' => 'auth'], function()
{
    // Dashboard
    Route::get('/admin', 'BackendController@dashboard')->name('backend.dashboard');

    // Chủ đề
    Route::get('/admin/chude', 'ChuDeController@index')->name('backend.chude.index');
    Route::get('/admin/chude/create', 'ChuDeController@create')->name('backend.chude.create');
    Route::post('/admin/chude/store', 'ChuDeController@store')->name('backend.chude.store');
    Route::get('/admin/chude/edit/{id}', 'ChuDeController@edit')->name('backend.chude.edit');
    Route::put('/admin/chude/update/{id}', 'ChuDeController@update')->name('backend.chude.update');
    Route::delete('/admin/chude/delete/{id}', 'ChuDeController@destroy')->name('backend.chude.destroy');

    // Loại
    Route::get('/admin/loai', 'LoaiController@index')->name('backend.loai.index');
    Route::get('/admin/loai/create', 'LoaiController@create')->name('backend.loai.create');
    Route::post('/admin/loai/store', 'LoaiController@store')->name('backend.loai.store');
    Route::get('/admin/loai/edit/{id}', 'LoaiController@edit')->name('backend.loai.edit');
    Route::put('/admin/loai/update/{id}', 'LoaiController@update')->name('backend.loai.update');
    Route::delete('/admin/loai/delete/{id}', 'LoaiController@destroy')->name('backend.loai.destroy');

    // Vận chuyển
    Route::get('/admin/vanchuyen', 'VanChuyenController@index')->name('backend.vanchuyen.index');
    Route::get('/admin/vanchuyen/create', 'VanChuyenController@create')->name('backend.vanchuyen.create');
    Route::post('/admin/vanchuyen/store', 'VanChuyenController@store')->name('backend.vanchuyen.store');
    Route::get('/admin/vanchuyen/edit/{id}', 'VanChuyenController@edit')->name('backend.vanchuyen.edit');
    Route::put('/admin/vanchuyen/update/{id}', 'VanChuyenController@update')->name('backend.vanchuyen.update');
    Route::delete('/admin/vanchuyen/delete/{id}', 'VanChuyenController@destroy')->name('backend.vanchuyen.destroy');

    //Thanh toán
    Route::get('/admin/thanhtoan', 'ThanhToanController@index')->name('backend.thanhtoan.index');
    Route::get('/admin/thanhtoan/create', 'ThanhToanController@create')->name('backend.thanhtoan.create');
    Route::post('/admin/thanhtoan/store', 'ThanhToanController@store')->name('backend.thanhtoan.store');
    Route::get('/admin/thanhtoan/edit/{id}', 'ThanhToanController@edit')->name('backend.thanhtoan.edit');
    Route::put('/admin/thanhtoan/update/{id}', 'ThanhToanController@update')->name('backend.thanhtoan.update');
    Route::delete('/admin/thanhtoan/delete/{id}', 'ThanhToanController@destroy')->name('backend.thanhtoan.destroy');

    //Quyền
    Route::get('/admin/quyen', 'QuyenController@index')->name('backend.quyen.index');
    Route::get('/admin/quyen/create', 'QuyenController@create')->name('backend.quyen.create');
    Route::post('/admin/quyen/store', 'QuyenController@store')->name('backend.quyen.store');
    Route::get('/admin/quyen/edit/{id}', 'QuyenController@edit')->name('backend.quyen.edit');
    Route::put('/admin/quyen/update/{id}', 'QuyenController@update')->name('backend.quyen.update');
    Route::delete('/admin/quyen/delete/{id}', 'QuyenController@destroy')->name('backend.quyen.destroy');

    // Khách hàng
    Route::get('/admin/khachhang', 'KhachHangController@index')->name('backend.khachhang.index');
    // Route::get('/admin/khachhang/create', 'KhachHangController@create')->name('backend.khachhang.create');
    // Route::post('/admin/khachhang/store', 'KhachHangController@store')->name('backend.khachhang.store');
    // Route::get('/admin/khachhang/edit/{id}', 'KhachHangController@edit')->name('backend.khachhang.edit');
    // Route::put('/admin/khachhang/update/{id}', 'KhachHangController@update')->name('backend.khachhang.update');
    Route::delete('/admin/khachhang/delete/{id}', 'KhachHangController@destroy')->name('backend.khachhang.destroy');
    
    // Xuất xứ
    Route::get('/admin/xuatxu', 'XuatXuController@index')->name('backend.xuatxu.index');
    Route::get('/admin/xuatxu/create', 'XuatXuController@create')->name('backend.xuatxu.create');
    Route::post('/admin/xuatxu/store', 'XuatXuController@store')->name('backend.xuatxu.store');
    Route::get('/admin/xuatxu/edit/{id}', 'XuatXuController@edit')->name('backend.xuatxu.edit');
    Route::put('/admin/xuatxu/update/{id}', 'XuatXuController@update')->name('backend.xuatxu.update');
    Route::delete('/admin/xuatxu/delete/{id}', 'XuatXuController@destroy')->name('backend.xuatxu.destroy');

    // Nhà cung cấp
    Route::get('/admin/nhacungcap', 'NhaCungCapController@index')->name('backend.nhacungcap.index');
    Route::get('/admin/nhacungcap/create', 'NhaCungCapController@create')->name('backend.nhacungcap.create');
    Route::post('/admin/nhacungcap/store', 'NhaCungCapController@store')->name('backend.nhacungcap.store');
    Route::get('/admin/nhacungcap/edit/{id}', 'NhaCungCapController@edit')->name('backend.nhacungcap.edit');
    Route::put('/admin/nhacungcap/update/{id}', 'NhaCungCapController@update')->name('backend.nhacungcap.update');
    Route::delete('/admin/nhacungcap/delete/{id}', 'NhaCungCapController@destroy')->name('backend.nhacungcap.destroy');

    // Màu
    Route::get('/admin/mau', 'MauController@index')->name('backend.mau.index');
    Route::get('/admin/mau/create', 'MauController@create')->name('backend.mau.create');
    Route::post('/admin/mau/store', 'MauController@store')->name('backend.mau.store');
    Route::get('/admin/mau/edit/{id}', 'MauController@edit')->name('backend.mau.edit');
    Route::put('/admin/mau/update/{id}', 'MauController@update')->name('backend.mau.update');
    Route::delete('/admin/mau/delete/{id}', 'MauController@destroy')->name('backend.mau.destroy');

    //Phiếu nhập
    Route::get('/admin/phieunhap', 'PhieuNhapController@index')->name('backend.phieunhap.index');

    Route::get('/admin/phieunhap/create', 'PhieuNhapController@create')->name('backend.phieunhap.create');
    Route::post('/admin/phieunhap/store', 'PhieuNhapController@store')->name('backend.phieunhap.store');
    Route::get('/admin/phieunhap/edit/{id}', 'PhieuNhapController@edit')->name('backend.phieunhap.edit');
    Route::put('/admin/phieunhap/update/{id}', 'PhieuNhapController@update')->name('backend.phieunhap.update');
    Route::delete('/admin/phieunhap/delete/{id}', 'PhieuNhapController@destroy')->name('backend.phieunhap.destroy');
        //Ajax
        Route::get('/admin/phieunhapkho/{idSanpham}', 'AjaxController@getphieuNhapKho');
        Route::get('/admin/giaban/{idSanpham}', 'AjaxController@getSanpham');

    //Chi tiết nhập
    Route::get('/admin/chitietnhap', 'ChiTietNhapController@index')->name('backend.chitietnhap.index');
    Route::get('/admin/chitietnhap/create', 'ChiTietNhapController@create')->name('backend.chitietnhap.create');
    Route::post('/admin/chitietnhap/store', 'ChiTietNhapController@store')->name('backend.chitietnhap.store');
    Route::get('/admin/chitietnhap/edit/{id}/{id1}/{id2}', 'ChiTietNhapController@edit')->name('backend.chitietnhap.edit');
    Route::put('/admin/chitietnhap/update/{id}/{id1}/{id2}', 'ChiTietNhapController@update')->name('backend.chitietnhap.update');
    Route::delete('/admin/chitietnhap/delete/{id}/{id1}/{id2}', 'ChiTietNhapController@destroy')->name('backend.chitietnhap.destroy');

    //Hóa đơn sỉ
    Route::get('/admin/hoadonsi', 'HoaDonSiController@index')->name('backend.hoadonsi.index');
    Route::get('/admin/hoadonsi/create', 'HoaDonSiController@create')->name('backend.hoadonsi.create');
    Route::post('/admin/hoadonsi/store', 'HoaDonSiController@store')->name('backend.hoadonsi.store');
    Route::get('/admin/hoadonsi/edit/{id}', 'HoaDonSiController@edit')->name('backend.hoadonsi.edit');
    Route::put('/admin/hoadonsi/update/{id}', 'HoaDonSiController@update')->name('backend.hoadonsi.update');
    Route::delete('/admin/hoadonsi/delete/{id}', 'HoaDonSiController@destroy')->name('backend.hoadonsi.destroy');
    Route::get('/admin/hoadonsi/print/{id}', 'HoaDonSiController@print')->name('backend.hoadonsi.print');


    //Hóa đơn lẻ
    Route::get('/admin/hoadonle', 'HoaDonLeController@index')->name('backend.hoadonle.index');
    Route::get('/admin/hoadonle/create', 'HoaDonLeController@create')->name('backend.hoadonle.create');
    Route::post('/admin/hoadonle/store', 'HoaDonLeController@store')->name('backend.hoadonle.store');
    Route::get('/admin/hoadonle/edit/{id}', 'HoaDonLeController@edit')->name('backend.hoadonle.edit');
    Route::put('/admin/hoadonle/update/{id}', 'HoaDonLeController@update')->name('backend.hoadonle.update');
    Route::delete('/admin/hoadonle/delete/{id}', 'HoaDonLeController@destroy')->name('backend.hoadonle.destroy');    
    Route::get('/admin/hoadonle/print/{id}', 'HoaDonLeController@print')->name('backend.hoadonle.print');

    //Màu sản phẩm
    Route::get('/admin/msp', 'MauSanPhamController@index')->name('backend.msp.index');
    Route::get('/admin/msp/create', 'MauSanPhamController@create')->name('backend.msp.create');
    Route::post('/admin/msp/store', 'MauSanPhamController@store')->name('backend.msp.store');
    Route::get('/admin/msp/edit/{id}/{id1}', 'MauSanPhamController@edit')->name('backend.msp.edit');
    Route::put('/admin/msp/update/{id}/{id1}', 'MauSanPhamController@update')->name('backend.msp.update');
    Route::delete('/admin/msp/delete/{id}/{id1}', 'MauSanPhamController@destroy')->name('backend.msp.destroy');

    //Đơn hàng
    Route::get('/admin/donhang', 'DonHangController@index')->name('backend.donhang.index');
    Route::get('/admin/donhang/create', 'DonHangController@create')->name('backend.donhang.create');
    Route::post('/admin/donhang/store', 'DonHangController@store')->name('backend.donhang.store');
    Route::get('/admin/donhang/edit/{id}', 'DonHangController@edit')->name('backend.donhang.edit');
    Route::put('/admin/donhang/update/{id}', 'DonHangController@update')->name('backend.donhang.update');
    Route::delete('/admin/donhang/delete/{id}', 'DonHangController@destroy')->name('backend.donhang.destroy');

    //Chi tiết đơn hàng
    Route::get('/admin/chitietdonhang', 'ChiTietDonHangController@index')->name('backend.chitietdonhang.index');
    Route::get('/admin/chitietdonhang/create', 'ChiTietDonHangController@create')->name('backend.chitietdonhang.create');
    Route::post('/admin/chitietdonhang/store', 'ChiTietDonHangController@store')->name('backend.chitietdonhang.store');
    Route::get('/admin/chitietdonhang/edit/{id}/{id1}/{id2}', 'ChiTietDonHangController@edit')->name('backend.chitietdonhang.edit');
    Route::put('/admin/chitietdonhang/update/{id}/{id1}/{id2}', 'ChiTietDonHangController@update')->name('backend.chitietdonhang.update');
    Route::delete('/admin/chitietdonhang/delete/{id}/{id1}/{id2}', 'ChiTietDonHangController@destroy')->name('backend.chitietdonhang.destroy');
    
    //Góp ý
    Route::get('/admin/gopy', 'GopYController@index')->name('backend.gopy.index');
    // Route::get('/admin/gopy/create', 'GopYController@create')->name('backend.gopy.create');
    // Route::post('/admin/gopy/store', 'GopYController@store')->name('backend.gopy.store');
    Route::get('/admin/gopy/edit/{id}', 'GopYController@edit')->name('backend.gopy.edit');
    Route::put('/admin/gopy/update/{id}', 'GopYController@update')->name('backend.gopy.update');
    Route::delete('/admin/gopy/delete/{id}', 'GopYController@destroy')->name('backend.gopy.destroy');

    //Khuyến mãi
    Route::get('/admin/khuyenmai', 'KhuyenMaiController@index')->name('backend.khuyenmai.index');
    Route::get('/admin/khuyenmai/create', 'KhuyenMaiController@create')->name('backend.khuyenmai.create');
    Route::post('/admin/khuyenmai/store', 'KhuyenMaiController@store')->name('backend.khuyenmai.store');
    Route::get('/admin/khuyenmai/edit/{id}', 'KhuyenMaiController@edit')->name('backend.khuyenmai.edit');
    Route::put('/admin/khuyenmai/update/{id}', 'KhuyenMaiController@update')->name('backend.khuyenmai.update');
    Route::delete('/admin/khuyenmai/delete/{id}', 'KhuyenMaiController@destroy')->name('backend.khuyenmai.destroy');
    
    //Khuyến mãi sản phẩm
    Route::get('/admin/kmsp', 'KhuyenMaiSanPhamController@index')->name('backend.kmsp.index');
    Route::get('/admin/kmsp/create', 'KhuyenMaiSanPhamController@create')->name('backend.kmsp.create');
    Route::post('/admin/kmsp/store', 'KhuyenMaiSanPhamController@store')->name('backend.kmsp.store');
    Route::get('/admin/kmsp/edit/{id}/{id1}/{id2}', 'KhuyenMaiSanPhamController@edit')->name('backend.kmsp.edit');
    Route::put('/admin/kmsp/update/{id}/{id1}/{id2}', 'KhuyenMaiSanPhamController@update')->name('backend.kmsp.update');
    Route::delete('/admin/kmsp/delete/{id}/{id1}/{id2}', 'KhuyenMaiSanPhamController@destroy')->name('backend.kmsp.destroy');

    //Chủ đề sản phẩm
    Route::get('/admin/cdsp', 'ChuDeSanPhamController@index')->name('backend.cdsp.index');
    Route::get('/admin/cdsp/create', 'ChuDeSanPhamController@create')->name('backend.cdsp.create');
    Route::post('/admin/cdsp/store', 'ChuDeSanPhamController@store')->name('backend.cdsp.store');
    Route::get('/admin/cdsp/edit/{id}/{id1}', 'ChuDeSanPhamController@edit')->name('backend.cdsp.edit');
    Route::put('/admin/cdsp/update/{id}/{id1}', 'ChuDeSanPhamController@update')->name('backend.cdsp.update');
    Route::delete('/admin/cdsp/delete/{id}/{id1}', 'ChuDeSanPhamController@destroy')->name('backend.cdsp.destroy');

    // Sản phẩm
    Route::get('/admin/sanpham', 'SanPhamController@index')->name('backend.sanpham.index');
    Route::get('/admin/sanpham/create', 'SanPhamController@create')->name('backend.sanpham.create');
    Route::post('/admin/sanpham/store', 'SanPhamController@store')->name('backend.sanpham.store');
    Route::get('/admin/sanpham/edit/{id}', 'SanPhamController@edit')->name('backend.sanpham.edit'); 
    Route::put('/admin/sanpham/update/{id}', 'SanPhamController@update')->name('backend.sanpham.update');
    Route::delete('/admin/sanpham/delete/{id}', 'SanPhamController@destroy')->name('backend.sanpham.destroy');
    Route::get('/admin/sanpham/print', 'SanPhamController@print')->name('backend.sanpham.print');
    Route::get('/admin/sanpham/pdf', 'SanPhamController@pdf')->name('backend.sanpham.pdf');

    // Nhân viên
    Route::get('/admin/nhanvien', 'NhanVienController@index')->name('backend.nhanvien.index');
    Route::get('/admin/nhanvien/create', 'NhanVienController@create')->name('backend.nhanvien.create');
    Route::post('/admin/nhanvien/store', 'NhanVienController@store')->name('backend.nhanvien.store');
    Route::get('/admin/nhanvien/edit/{id}', 'NhanVienController@edit')->name('backend.nhanvien.edit'); 
    Route::put('/admin/nhanvien/update/{id}', 'NhanVienController@update')->name('backend.nhanvien.update');
    Route::delete('/admin/nhanvien/delete/{id}', 'NhanVienController@destroy')->name('backend.nhanvien.destroy');

    // Tạo route Báo cáo Đơn hàng 
    Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang'); 
    Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');

    //Kho
    Route::get('/admin/kho', 'KhoController@index')->name('backend.kho.index');
    Route::get('/admin/kho/create', 'KhoController@create')->name('backend.kho.create');
    Route::post('/admin/kho/store', 'KhoController@store')->name('backend.kho.store');
    Route::get('/admin/kho/edit/{id}', 'KhoController@edit')->name('backend.kho.edit');
    Route::put('/admin/kho/update/{id}', 'KhoController@update')->name('backend.kho.update');
    Route::delete('/admin/kho/delete/{id}', 'KhoController@destroy')->name('backend.kho.destroy');

    //Nhập kho
    Route::get('/admin/nhapkho', 'NhapKhoController@index')->name('backend.nhapkho.index');
    Route::get('/admin/nhapkho/create', 'NhapKhoController@create')->name('backend.nhapkho.create');
    Route::post('/admin/nhapkho/store', 'NhapKhoController@store')->name('backend.nhapkho.store');
    Route::get('/admin/nhapkho/edit/{id}', 'NhapKhoController@edit')->name('backend.nhapkho.edit');
    Route::put('/admin/nhapkho/update/{id}', 'NhapKhoController@update')->name('backend.nhapkho.update');
    Route::delete('/admin/nhapkho/delete/{id}', 'NhapKhoController@destroy')->name('backend.nhapkho.destroy');

    //Đơn vị tính
    Route::get('/admin/donvitinh', 'DonViTinhController@index')->name('backend.donvitinh.index');
    Route::get('/admin/donvitinh/create', 'DonViTinhController@create')->name('backend.donvitinh.create');
    Route::post('/admin/donvitinh/store', 'DonViTinhController@store')->name('backend.donvitinh.store');
    Route::get('/admin/donvitinh/edit/{id}', 'DonViTinhController@edit')->name('backend.donvitinh.edit');
    Route::put('/admin/donvitinh/update/{id}', 'DonViTinhController@update')->name('backend.donvitinh.update');
    Route::delete('/admin/donvitinh/delete/{id}', 'DonViTinhController@destroy')->name('backend.donvitinh.destroy');

    //Sản phẩm kho
    Route::get('/admin/spk', 'SanPhamKhoController@index')->name('backend.spk.index');
    Route::get('/admin/spk/create', 'SanPhamKhoController@create')->name('backend.spk.create');
    Route::post('/admin/spk/store', 'SanPhamKhoController@store')->name('backend.spk.store');
    Route::get('/admin/spk/edit/{id}/{id1}', 'SanPhamKhoController@edit')->name('backend.spk.edit');
    Route::put('/admin/spk/update/{id}/{id1}', 'SanPhamKhoController@update')->name('backend.spk.update');
    Route::delete('/admin/spk/delete/{id}/{id1}', 'SanPhamKhoController@destroy')->name('backend.spk.destroy');
    
    // Xuất kho
    Route::get('/admin/xuatkho', 'XuatKhoController@index')->name('backend.xuatkho.index');
    Route::get('/admin/xuatkho/create', 'XuatKhoController@create')->name('backend.xuatkho.create');
    Route::post('/admin/xuatkho/store', 'XuatKhoController@store')->name('backend.xuatkho.store');
    Route::get('/admin/xuatkho/edit/{id}', 'XuatKhoController@edit')->name('backend.xuatkho.edit');
    Route::put('/admin/xuatkho/update/{id}', 'XuatKhoController@update')->name('backend.xuatkho.update');
    Route::delete('/admin/xuatkho/delete/{id}', 'XuatKhoController@destroy')->name('backend.xuatkho.destroy');
        //Ajax
        Route::get('/admin/donvitinh/{idSanpham}', 'AjaxController@getDonvitinh');
        Route::get('/admin/kho/{idSanpham}', 'AjaxController@getKho');
        Route::get('/admin/sanpham/{idSanpham}', 'AjaxController@getgiaBan');
        Route::get('/admin/sanphamkho/{idSanpham}', 'AjaxController@getSanphamkho');
        Route::get('/admin/sanphamkho1/{idSanpham}', 'AjaxController@getSanphamkho1');

    //Chi tiết xuất kho
    Route::get('/admin/ctxk', 'ChiTietXuatKhoController@index')->name('backend.ctxk.index');
    Route::get('/admin/ctxk/create', 'ChiTietXuatKhoController@create')->name('backend.ctxk.create');
    Route::post('/admin/ctxk/store', 'ChiTietXuatKhoController@store')->name('backend.ctxk.store');
    Route::get('/admin/ctxk/edit/{id}/{id1}', 'ChiTietXuatKhoController@edit')->name('backend.ctxk.edit');
    Route::put('/admin/ctxk/update/{id}/{id1}', 'ChiTietXuatKhoController@update')->name('backend.ctxk.update');
    Route::delete('/admin/ctxk/delete/{id}/{id1}', 'ChiTietXuatKhoController@destroy')->name('backend.ctxk.destroy');

    //Chuyển kho
    Route::get('/admin/chuyenkho', 'ChuyenKhoController@index')->name('backend.chuyenkho.index');
    Route::get('/admin/chuyenkho/create', 'ChuyenKhoController@create')->name('backend.chuyenkho.create');
    Route::post('/admin/chuyenkho/store', 'ChuyenKhoController@store')->name('backend.chuyenkho.store');
    Route::get('/admin/chuyenkho/edit/{id}', 'ChuyenKhoController@edit')->name('backend.chuyenkho.edit');
    Route::put('/admin/chuyenkho/update/{id}', 'ChuyenKhoController@update')->name('backend.chuyenkho.update');
    Route::delete('/admin/chuyenkho/delete/{id}', 'ChuyenKhoController@destroy')->name('backend.chuyenkho.destroy');

        //Ajax
            Route::get('/admin/kho/{idSanpham}', 'AjaxController@getKho');
            Route::get('/admin/sanpham/{idSanpham}', 'AjaxController@getSanpham');
            Route::get('/admin/sanphamkho/{idSanpham}', 'AjaxController@getSanphamkho');
            Route::get('/admin/sanphamkho1/{idSanpham}', 'AjaxController@getSanphamkho1');
            Route::get('/admin/sanphamkho2/{idSanpham}', 'AjaxController@getSanphamkho2');
    
    //Chi tiết chuyển kho
    Route::get('/admin/ctck', 'ChiTietChuyenKhoController@index')->name('backend.ctck.index');
    Route::get('/admin/ctck/create', 'ChiTietChuyenKhoController@create')->name('backend.ctck.create');
    Route::post('/admin/ctck/store', 'ChiTietChuyenKhoController@store')->name('backend.ctck.store');
    Route::get('/admin/ctck/edit/{id}/{id1}', 'ChiTietChuyenKhoController@edit')->name('backend.ctck.edit');
    Route::put('/admin/ctck/update/{id}/{id1}', 'ChiTietChuyenKhoController@update')->name('backend.ctck.update');
    Route::delete('/admin/ctck/delete/{id}/{id1}', 'ChiTietChuyenKhoController@destroy')->name('backend.ctck.destroy');
});



Route::get('/home', 'HomeController@index');

// Gọi hàm đăng ký các route dành cho Quản lý Xác thực tài khoản (Đăng nhập, Đăng xuất, Đăng ký)
// các route trong file `vendor\laravel\framework\src\Illuminate\Routing\Router.php`, hàm auth()
// Auth::routes();

// Xác thực Routes...
Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');
// Đăng ký Routes...
Route::get('/admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/admin/register', 'Auth\RegisterController@register');
// Quên mật khẩu Routes...
Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset');

Route::post('/admin/activate/{nv_ma}', 'BackendController@activate')->name('activate');

// Các route dành riêng cho frontend
// Namespace PHP
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');





Route::get('/gioi-thieu', 'Frontend\FrontendController@about')->name('frontend.about');






Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.contact');

Route::post('/lien-he/goi-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');



Route::get('/san-pham', 'Frontend\FrontendController@product')->name('frontend.product');
Route::get('/san-pham/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');

Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');

Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'Frontend\FrontendController@orderFinish')->name('frontend.orderFinish');