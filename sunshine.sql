-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 01:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunshine`
--

-- --------------------------------------------------------

--
-- Table structure for table `cusc_chitietdonhang`
--

CREATE TABLE `cusc_chitietdonhang` (
  `dh_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Đơn hàng # dh_ma # dh_ma # Mã đơn hàng',
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã sản phẩm',
  `m_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Màu sắc # m_ma # m_ten # Mã màu sản phẩm, 1-Phối màu (đỏ, vàng, ...)',
  `ctdh_soLuong` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Số lượng # Số lượng sản phẩm đặt mua',
  `ctdh_donGia` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Đơn giá # Giá bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chi tiết đơn hàng # Chi tiết đơn hàng: sản phẩm, màu, số lượng, đơn giá, đơn hàng';

--
-- Dumping data for table `cusc_chitietdonhang`
--

INSERT INTO `cusc_chitietdonhang` (`dh_ma`, `sp_ma`, `m_ma`, `ctdh_soLuong`, `ctdh_donGia`) VALUES
(1, 2, 12, 4, 3061000),
(1, 12, 18, 15, 5722000),
(3, 17, 18, 11, 2252000),
(3, 24, 8, 5, 3691000),
(5, 3, 16, 2, 107000),
(5, 21, 11, 3, 5077000),
(6, 5, 2, 6, 513000),
(6, 20, 6, 17, 6175000),
(6, 24, 12, 9, 6045000),
(8, 20, 9, 1, 5285000),
(9, 16, 4, 15, 1268000),
(11, 19, 13, 11, 714000),
(11, 30, 3, 8, 2866000),
(13, 5, 17, 1, 6333000),
(13, 20, 14, 6, 722000);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_chitietnhap`
--

CREATE TABLE `cusc_chitietnhap` (
  `pn_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Phiếu nhập # pn_ma # pn_ma # Mã phiếu nhập',
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã sản phẩm',
  `m_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Màu sắc # m_ma # m_ten # Mã màu sản phẩm, 1-Phối màu (đỏ, vàng, ...)',
  `ctn_soLuong` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Số lượng # Số lượng sản phẩm nhập kho',
  `ctn_donGia` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Đơng giá nhập # Giá nhập kho của sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chi tiết nhập # Chi tiết phiếu nhập: sản phẩm, màu, số lượng, đơn giá, phiếu nhập';

--
-- Dumping data for table `cusc_chitietnhap`
--

INSERT INTO `cusc_chitietnhap` (`pn_ma`, `sp_ma`, `m_ma`, `ctn_soLuong`, `ctn_donGia`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 2),
(3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_chude`
--

CREATE TABLE `cusc_chude` (
  `cd_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã chủ đề',
  `cd_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chủ đề # Tên chủ đề',
  `cd_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo chủ đề',
  `cd_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật chủ đề gần nhất',
  `cd_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái chủ đề: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chủ đề # Chủ đề: cưới, sinh nhật, chúc mừng, chia buồn, ...';

--
-- Dumping data for table `cusc_chude`
--

INSERT INTO `cusc_chude` (`cd_ma`, `cd_ten`, `cd_taoMoi`, `cd_capNhat`, `cd_trangThai`) VALUES
(1, 'Máy photo giá rẻ', '2010-01-01 01:00:00', '2019-10-29 00:27:25', 2),
(2, 'Máy photo recoh', '2010-01-01 01:00:00', '2019-10-29 00:34:14', 2),
(4, 'Máy photo toshiba', '2010-01-01 01:00:00', '2019-10-29 00:34:21', 2),
(6, 'Máy photo công nghiệp', '2010-01-01 01:00:00', '2019-10-29 00:34:27', 2),
(8, 'Máy Photocoppy khổ lớn', '2010-01-01 01:00:00', '2019-10-29 00:29:57', 2),
(9, 'Máy in laser khổ lớn', '2010-01-01 01:00:00', '2019-10-29 00:30:09', 2),
(10, 'Máy in phun khổ lớn', '2010-01-01 01:00:00', '2019-10-29 00:30:29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_chude_sanpham`
--

CREATE TABLE `cusc_chude_sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã sản phẩm',
  `cd_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Chủ để # cd_ma # cd_ten # Mã chủ đề'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chủ đề sản phẩm # Sản phầm thuộc các chủ đề';

--
-- Dumping data for table `cusc_chude_sanpham`
--

INSERT INTO `cusc_chude_sanpham` (`sp_ma`, `cd_ma`) VALUES
(1, 2),
(2, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_doanhthu_sanpham`
--

CREATE TABLE `cusc_doanhthu_sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `sp_ma` bigint(20) UNSIGNED NOT NULL,
  `giatri` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cusc_donhang`
--

CREATE TABLE `cusc_donhang` (
  `dh_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng, 1-Không xuất hóa đơn',
  `kh_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Khách hàng # kh_ma # kh_hoTen # Mã khách hàng',
  `dh_thoiGianDatHang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đặt hàng # Thời điểm đặt hàng',
  `dh_thoiGianNhanHang` datetime NOT NULL COMMENT 'Thời điểm giao hàng # Thời điểm giao hàng theo yêu cầu của khách hàng',
  `dh_nguoiNhan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người nhận quà # Họ tên người nhận (tên hiển thị)',
  `dh_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ người nhận # Địa chỉ người nhận',
  `dh_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại người nhận # Điện thoại người nhận',
  `dh_nguoiGui` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người tặng quà # Người tặng (tên hiển thị)',
  `dh_loiChuc` text COLLATE utf8mb4_unicode_ci COMMENT 'Lời chúc # Lời chúc ghi trên thiệp',
  `dh_daThanhToan` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Đã thanh toán # Đã thanh toán tiền (trường hợp tặng quà)',
  `nv_xuLy` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Xử lý đơn hàng # nv_ma # nv_hoTen # Mã nhân viên (người xử lý đơn hàng), 1-chưa phân công',
  `dh_ngayXuLy` datetime DEFAULT NULL COMMENT 'Thời điểm xử lý # Thời điểm xử lý đơn hàng',
  `nv_giaoHang` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Giao hàng # nv_ma # nv_hoTen # Mã nhân viên (người lập phiếu giao hàng và giao hàng), 1-chưa phân công',
  `dh_ngayLapPhieuGiao` datetime DEFAULT NULL COMMENT 'Thời điểm lập phiếu giao # Thời điểm lập phiếu giao',
  `dh_ngayGiaoHang` datetime DEFAULT NULL COMMENT 'Thời điểm khách nhận được hàng # Thời điểm khách nhận được hàng',
  `dh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo đơn hàng',
  `dh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật đơn hàng gần nhất',
  `dh_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Trạng thái # Trạng thái đơn hàng: 1-nhận đơn, 2-xử lý đơn, 3-giao hàng, 4-hoàn tất, 5-đổi trả, 6-hủy',
  `vc_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Dịch vụ giao hàng # vc_ma # vc_ten # Mã dịch vụ giao hàng',
  `tt_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Đơn hàng # Đơn hàng';

--
-- Dumping data for table `cusc_donhang`
--

INSERT INTO `cusc_donhang` (`dh_ma`, `kh_ma`, `dh_thoiGianDatHang`, `dh_thoiGianNhanHang`, `dh_nguoiNhan`, `dh_diaChi`, `dh_dienThoai`, `dh_nguoiGui`, `dh_loiChuc`, `dh_daThanhToan`, `nv_xuLy`, `dh_ngayXuLy`, `nv_giaoHang`, `dh_ngayLapPhieuGiao`, `dh_ngayGiaoHang`, `dh_taoMoi`, `dh_capNhat`, `dh_trangThai`, `vc_ma`, `tt_ma`) VALUES
(1, 1, '2019-07-30 21:17:39', '2019-10-29 07:15:31', 'dh_nguoiNhan 1', 'dh_diaChi 1', 'dh_dienT 1', 'dh_nguoiGui 1', 'dh_loiC 1', 1, 9, '2019-10-29 07:15:31', 4, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1, 2, 2),
(2, 2, '2019-10-05 17:53:08', '2019-10-29 07:15:31', 'dh_nguoiNhan 2', 'dh_diaChi 2', 'dh_dienT 2', 'dh_nguoiGui 2', 'dh_loiC 2', 2, 7, '2019-10-29 07:15:31', 5, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 2, 5, 2),
(3, 3, '2019-08-02 06:02:05', '2019-10-29 07:15:31', 'dh_nguoiNhan 3', 'dh_diaChi 3', 'dh_dienT 3', 'dh_nguoiGui 3', 'dh_loiC 3', 3, 5, '2019-10-29 07:15:31', 8, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 3, 5, 1),
(4, 4, '2019-08-16 20:28:48', '2019-10-29 07:15:31', 'dh_nguoiNhan 4', 'dh_diaChi 4', 'dh_dienT 4', 'dh_nguoiGui 4', 'dh_loiC 4', 4, 9, '2019-10-29 07:15:31', 7, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 4, 3, 1),
(5, 5, '2019-08-03 04:11:06', '2019-10-29 07:15:31', 'dh_nguoiNhan 5', 'dh_diaChi 5', 'dh_dienT 5', 'dh_nguoiGui 5', 'dh_loiC 5', 5, 8, '2019-10-29 07:15:31', 6, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 5, 3, 2),
(6, 6, '2019-08-16 03:32:27', '2019-10-29 07:15:31', 'dh_nguoiNhan 6', 'dh_diaChi 6', 'dh_dienT 6', 'dh_nguoiGui 6', 'dh_loiC 6', 6, 7, '2019-10-29 07:15:31', 7, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 6, 2, 1),
(7, 7, '2019-08-11 18:07:03', '2019-10-29 07:15:31', 'dh_nguoiNhan 7', 'dh_diaChi 7', 'dh_dienT 7', 'dh_nguoiGui 7', 'dh_loiC 7', 7, 5, '2019-10-29 07:15:31', 9, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 7, 5, 1),
(8, 8, '2019-10-15 05:20:37', '2019-10-29 07:15:31', 'dh_nguoiNhan 8', 'dh_diaChi 8', 'dh_dienT 8', 'dh_nguoiGui 8', 'dh_loiC 8', 8, 2, '2019-10-29 07:15:31', 8, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 8, 2, 2),
(9, 9, '2019-09-17 10:09:27', '2019-10-29 07:15:31', 'dh_nguoiNhan 9', 'dh_diaChi 9', 'dh_dienT 9', 'dh_nguoiGui 9', 'dh_loiC 9', 9, 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 9, 2, 2),
(10, 10, '2019-09-20 20:49:25', '2019-10-29 07:15:31', 'dh_nguoiNhan 10', 'dh_diaChi 10', 'dh_dienT 10', 'dh_nguoiGui 10', 'dh_loiC 10', 10, 8, '2019-10-29 07:15:31', 6, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 10, 4, 2),
(11, 11, '2019-09-07 20:55:17', '2019-10-29 07:15:31', 'dh_nguoiNhan 11', 'dh_diaChi 11', 'dh_dienT 11', 'dh_nguoiGui 11', 'dh_loiC 11', 11, 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 11, 4, 1),
(12, 12, '2019-09-28 19:07:48', '2019-10-29 07:15:31', 'dh_nguoiNhan 12', 'dh_diaChi 12', 'dh_dienT 12', 'dh_nguoiGui 12', 'dh_loiC 12', 12, 7, '2019-10-29 07:15:31', 8, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 12, 2, 1),
(13, 13, '2019-09-01 05:05:35', '2019-10-29 07:15:31', 'dh_nguoiNhan 13', 'dh_diaChi 13', 'dh_dienT 13', 'dh_nguoiGui 13', 'dh_loiC 13', 13, 9, '2019-10-29 07:15:31', 8, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 13, 5, 1),
(14, 14, '2019-08-05 11:15:11', '2019-10-29 07:15:31', 'dh_nguoiNhan 14', 'dh_diaChi 14', 'dh_dienT 14', 'dh_nguoiGui 14', 'dh_loiC 14', 14, 8, '2019-10-29 07:15:31', 9, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 14, 4, 1),
(15, 15, '2019-09-12 22:52:38', '2019-10-29 07:15:31', 'dh_nguoiNhan 15', 'dh_diaChi 15', 'dh_dienT 15', 'dh_nguoiGui 15', 'dh_loiC 15', 15, 5, '2019-10-29 07:15:31', 4, '2019-10-29 07:15:31', '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 15, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_gopy`
--

CREATE TABLE `cusc_gopy` (
  `gy_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã góp ý',
  `gy_thoiGian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm góp ý # Thời điểm góp ý',
  `gy_noiDung` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Góp ý # Nội dung góp ý',
  `kh_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Khách hàng # kh_ma # kh_hoTen # Mã khách hàng',
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã sản phẩm',
  `gy_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '3' COMMENT 'Trạng thái # Trạng thái góp ý: 1-khóa, 2-hiển thị, 3-chờ duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Góp ý # Góp ý';

--
-- Dumping data for table `cusc_gopy`
--

INSERT INTO `cusc_gopy` (`gy_ma`, `gy_thoiGian`, `gy_noiDung`, `kh_ma`, `sp_ma`, `gy_trangThai`) VALUES
(1, '2019-10-29 07:15:31', 'gy_noiD 1', 1, 1, 1),
(2, '2019-10-29 07:15:31', 'gy_noiD 2', 2, 2, 2),
(3, '2019-10-29 07:15:31', 'gy_noiD 3', 3, 3, 3),
(4, '2019-10-29 07:15:31', 'gy_noiD 4', 4, 4, 4),
(5, '2019-10-29 07:15:31', 'gy_noiD 5', 5, 5, 5),
(6, '2019-10-29 07:15:31', 'gy_noiD 6', 6, 6, 6),
(8, '2019-10-29 07:15:31', 'gy_noiD 8', 8, 8, 8),
(9, '2019-10-29 07:15:31', 'gy_noiD 9', 9, 9, 9),
(10, '2019-10-29 07:15:31', 'gy_noiD 10', 10, 10, 10),
(12, '2019-10-29 07:15:31', 'gy_noiD 12', 12, 12, 12),
(14, '2019-10-29 07:15:31', 'gy_noiD 14', 14, 14, 14),
(16, '2019-10-29 07:15:31', 'gy_noiD 16', 16, 16, 16),
(17, '2019-10-29 07:15:31', 'gy_noiD 17', 17, 17, 17),
(18, '2019-10-29 07:15:31', 'gy_noiD 18', 18, 18, 18),
(19, '2019-10-29 07:15:31', 'gy_noiD 19', 19, 19, 19),
(20, '2019-10-29 07:15:31', 'gy_noiD 20', 20, 20, 20),
(21, '2019-10-29 07:15:31', 'gy_noiD 21', 21, 21, 21),
(22, '2019-10-29 07:15:31', 'gy_noiD 22', 22, 22, 22),
(24, '2019-10-29 07:15:31', 'gy_noiD 24', 24, 24, 24),
(30, '2019-10-29 07:15:31', 'gy_noiD 30', 30, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_hinhanh`
--

CREATE TABLE `cusc_hinhanh` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã sản phẩm',
  `ha_stt` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Số thứ tự # Số thứ tự hình ảnh của mỗi sản phẩm',
  `ha_ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên hình ảnh # Tên hình ảnh (không bao gồm đường dẫn)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Hình ảnh sản phẩm # Các hình ảnh chi tiết của sản phẩm';

-- --------------------------------------------------------

--
-- Table structure for table `cusc_hoadonle`
--

CREATE TABLE `cusc_hoadonle` (
  `hdl_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã hóa đơn bán lẻ',
  `hdl_nguoiMuaHang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người mua hàng # Họ tên người mua hàng',
  `hdl_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại # Điện thoại',
  `hdl_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ',
  `nv_lapHoaDon` smallint(5) UNSIGNED NOT NULL COMMENT 'Lập hóa đơn # nv_ma # nv_hoTen # Mã nhân viên (người lập hóa đơn)',
  `hdl_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm xuất # Thời điểm xuất hóa đơn',
  `dh_ma` bigint(20) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Đơn hàng # dh_ma # dh_ma # Mã đơn hàng, 1-Không xuất hóa đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Hóa đơn bán lẻ # Hóa đơn bán lẻ: sản phẩm, màu, số lượng, đơn giá, đơn hàng';

--
-- Dumping data for table `cusc_hoadonle`
--

INSERT INTO `cusc_hoadonle` (`hdl_ma`, `hdl_nguoiMuaHang`, `hdl_dienThoai`, `hdl_diaChi`, `nv_lapHoaDon`, `hdl_ngayXuatHoaDon`, `dh_ma`) VALUES
(1, 'hdl_nguoiMuaHang 1', 'hdl_dien 1', 'hdl_diaChi 1', 1, '2019-10-29 07:15:31', 1),
(2, 'hdl_nguoiMuaHang 2', 'hdl_dien 2', 'hdl_diaChi 2', 2, '2019-10-29 07:15:31', 2),
(3, 'hdl_nguoiMuaHang 3', 'hdl_dien 3', 'hdl_diaChi 3', 3, '2019-10-29 07:15:31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_hoadonsi`
--

CREATE TABLE `cusc_hoadonsi` (
  `hds_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã hóa đơn bán sỉ',
  `hds_nguoiMuaHang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người mua hàng # Họ tên người mua hàng',
  `hds_tenDonVi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Đơn vị # Tên đơn vị',
  `hds_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ đơn vị',
  `hds_maSoThue` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã số thuế # Mã số thuế đơn vị',
  `hds_soTaiKhoan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL' COMMENT 'Số tài khoản # Số tài khoản',
  `nv_lapHoaDon` smallint(5) UNSIGNED NOT NULL COMMENT 'Lập hóa đơn # nv_ma # nv_hoTen # Mã nhân viên (người lập hóa đơn)',
  `hds_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm xuất # Thời điểm xuất hóa đơn',
  `nv_thuTruong` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Thủ trưởng # nv_ma # nv_hoTen # Mã nhân viên (thủ trưởng), 1-chưa phân công',
  `hds_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo hóa đơn',
  `hds_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật hóa đơn gần nhất',
  `hds_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Trạng thái # Trạng thái hóa đơn: 1-lập hóa đơn, 2-xuất hóa đơn, 3-hủy',
  `dh_ma` bigint(20) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Đơn hàng # dh_ma # dh_ma # Mã đơn hàng, 1-Không xuất hóa đơn',
  `tt_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Hóa đơn bán sỉ # Hóa đơn bán sỉ: sản phẩm, màu, số lượng, đơn giá, đơn hàng';

--
-- Dumping data for table `cusc_hoadonsi`
--

INSERT INTO `cusc_hoadonsi` (`hds_ma`, `hds_nguoiMuaHang`, `hds_tenDonVi`, `hds_diaChi`, `hds_maSoThue`, `hds_soTaiKhoan`, `nv_lapHoaDon`, `hds_ngayXuatHoaDon`, `nv_thuTruong`, `hds_taoMoi`, `hds_capNhat`, `hds_trangThai`, `dh_ma`, `tt_ma`) VALUES
(1, 'hds_nguoiMuaHang 1', 'hds_tenDonVi 1', 'hds_diaChi 1', 'hds_maSoThu 1', 'hds_soTaiKhoan 1', 1, '2019-10-29 07:15:31', 1, '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1, 1, 1),
(2, 'hds_nguoiMuaHang 2', 'hds_tenDonVi 2', 'hds_diaChi 2', 'hds_maSoThu 2', 'hds_soTaiKhoan 2', 2, '2019-10-29 07:15:31', 2, '2019-10-29 00:15:31', '2019-10-29 00:15:31', 2, 2, 2),
(3, 'hds_nguoiMuaHang 3', 'hds_tenDonVi 3', 'hds_diaChi 3', 'hds_maSoThu 3', 'hds_soTaiKhoan 3', 3, '2019-10-29 07:15:31', 3, '2019-10-29 00:15:31', '2019-10-29 00:15:31', 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_khachhang`
--

CREATE TABLE `cusc_khachhang` (
  `kh_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã khách hàng',
  `kh_taiKhoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tài khoản # Tài khoản',
  `kh_matKhau` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu # Mật khẩu',
  `kh_hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên # Họ tên',
  `kh_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác',
  `kh_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email # Email',
  `kh_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày sinh # Ngày sinh',
  `kh_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL' COMMENT 'Địa chỉ # Địa chỉ',
  `kh_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL' COMMENT 'Điện thoại # Điện thoại',
  `kh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo khách hàng',
  `kh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật khách hàng gần nhất',
  `kh_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '3' COMMENT 'Trạng thái # Trạng thái khách hàng: 1-khóa, 2-khả dụng, 3-chưa kích hoạt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Khách hàng # Khách hàng';

--
-- Dumping data for table `cusc_khachhang`
--

INSERT INTO `cusc_khachhang` (`kh_ma`, `kh_taiKhoan`, `kh_matKhau`, `kh_hoTen`, `kh_gioiTinh`, `kh_email`, `kh_ngaySinh`, `kh_diaChi`, `kh_dienThoai`, `kh_taoMoi`, `kh_capNhat`, `kh_trangThai`) VALUES
(1, 'P_T.K-TUYET2001', '$2y$10$azOfIx.LOUq6RoluKzLkdOcf4N8VHYX3UY71bGnbiIpqslTkipMDy', 'Phạm Thị Kim Tuyết\n', 0, 'p.tk.tuyet.2001.02.28@gmail.com.vn', '2001-02-28 00:00:00', '60F/64 Trần Quang Diệu, P. An Thới, Q. Bình Thủy, TP. Cần Thơ', '01255701063', '2010-01-01 03:34:02', '2010-01-01 03:34:02', 2),
(2, 'ngoc_quyet\n_17_07_03', '$2y$10$f14NbhtR3gjg8wGRz1N76u5MqQPr5/B9hnKGd0dOEcEvkckTfHRRi', 'Trần Ngọc Quyết\n', 1, 'NGOCQUYET030717@yahoo.com.vn', '2003-07-17 00:00:00', '284 Nguyễn Thị Minh Khai, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ', '0926755775', '2010-01-06 03:34:02', '2010-01-06 03:34:02', 2),
(3, 'HUYNHBINH13011980', '$2y$10$yL37YPkm0pVkLV.mY8RtoOr7/WjOdpedmbPpJVXlHoAElwSqIM48a', 'Nguyễn Huỳnh Bình', 1, 'nh_binh1301@gmail.com.vn', '1980-01-13 00:00:00', '106/340 Bùi Hữu Nghĩa, P. Bình Thủy, Q. Bình Thủy, TP. Cần Thơ', '01657073777', '2010-01-15 03:34:02', '2010-01-15 03:34:02', 2),
(4, 'pham-nguyen-tho-tho88', '$2y$10$S4i3N6bg9S8xUt8qloszzuHkloEkUP/cUlskJtNOnEU2B9DFKgnMO', 'Phạm Nguyễn Thơ Thơ\n', 0, 'THOTHO.NGUYENPHAM.88@ymail.com', '1988-10-25 00:00:00', '136C/291 Xô Viết Nghệ Tĩnh, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '01288748457', '2010-01-15 14:35:35', '2010-01-15 14:35:35', 2),
(5, 'HUONG_LE-THI-QUYNH_20-05', '$2y$10$Atb0/s0pxPgMx7R7BRhYU.Dh4pAfwblsi9yGMe5XdHYnBQyjlokYa', 'Lê Thị Quỳnh Hương\n', 0, 'huong_quynh-thi-le-65_05_20@gmail.com.vn', '1965-05-20 00:00:00', '166/234 Trương Văn Diễn, P. Phước Thới, Q. Ô Môn, TP. Cần Thơ', '0922222503', '2010-01-15 14:35:35', '2010-01-15 14:35:35', 2),
(6, 'NHI-17112004', '$2y$10$346spv1AfKRa4Q87fqFNne9ofxd3PpVtm/Si4mJqeIt/UHWnXJzhO', 'Đàm Thị Ý Nhi\n', 0, 'NhiDamThiY17112004@ymail.com', '2004-11-17 00:00:00', '278 CMT8, P. An Thới , Q. Bình Thủy, TP. Cần Thơ', '01278708142', '2010-01-25 14:35:35', '2010-01-25 14:35:35', 2),
(7, 'VANTUONG\n-19.05.1995', '$2y$10$x617xnFFeWkBaRNZ8Z0xVOJHilzOkT7lFHsqOifADB/k2CFiK0eUK', 'Nguyễn Văn Tường\n', 1, 'Van_tuong\n_1995@yahoo.com.vn', '1995-05-19 00:00:00', '294 Tỉnh lộ 923, P. Trường Lạc, Q. Ô Môn, TP. Cần Thơ', '01692048941', '2010-02-13 14:35:35', '2010-02-13 14:35:35', 2),
(8, 'Hoa-hiep2005-05-26', '$2y$10$s/H2cxpOU7P3qfuREoU.suAy39LzqppnOQNWjFvON4QoQiBiXbWkO', 'Bùi Hòa Hiệp\n', 1, 'HIEP_BUI-HOA-2005-05-26@yahoo.com.vn', '2005-05-26 00:00:00', '74 Nguyễn Đệ, P. An Thới, Q. Bình Thủy, TP. Cần Thơ', '01249947221', '2010-02-18 14:35:35', '2010-02-18 14:35:35', 2),
(9, 'v-ntthao1998-10-25', '$2y$10$CQtzdbBFk7ZXqUYtDJ6rq.BqnLqS9auqa8LOqD2i3u5Q6jqyYviGe', 'Võ Nguyễn Thiên Thảo\n', 0, 'V-N.T_THAO-98.10.25@gmail.com', '1998-10-25 00:00:00', '80/56 30/4, P. An Phú, Q. Ninh Kiều, TP. Cần Thơ', '01208771869', '2010-02-23 14:35:35', '2010-02-23 14:35:35', 2),
(10, 'lam.tuyet.thitran.900410', '$2y$10$/dK3EKvY12gds3DTIycg.eZZ7SBf/EjZdeW7VyE6ks2rw9EwOTFa6', 'Trần Thị Tuyết Lâm\n', 0, 'TT.TLAM1004@yahoo.com.vn', '1990-04-10 00:00:00', '323 Huỳnh Phan Hộ, P. Bình Thủy , Q. Bình Thủy, TP. Cần Thơ', '01662814029', '2010-02-23 18:01:44', '2010-02-23 18:01:44', 2),
(11, 'danphambanh.the05.10.36', '$2y$10$xnb63LijGcjo6ZK9fi1Ak.2Movc5qpJ9YXXM/BKql0RD61DiCGy92', 'Phạm Bành Thế Dân\n', 1, 'DAN_THE.BANHPHAM_1936.10.05@outlook.com', '1936-10-05 00:00:00', '382 Ngô Quyền, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '0960898534', '2010-02-28 18:01:44', '2010-02-28 18:01:44', 2),
(12, 'ha88', '$2y$10$yX3TARTKiNfnyNhR3rJSv.9KJxYiWROTkyniDRtjEk9xsEcRrA1K6', 'Vũ Nguyễn Văn Hà\n', 1, 'HA-VAN-NGUYEN-VU-12-12@gmail.com.vn', '1988-12-12 00:00:00', '193 Hoàng Văn Thụ, P. An Hội, Q. Ninh Kiều, TP. Cần Thơ', '01260569210', '2010-02-28 18:20:51', '2010-02-28 18:20:51', 2),
(13, 'Nguyen_XuanTrung25_05_68', '$2y$10$YSwfKbOvquamWhY2mNCNBOkajuDqY3ys4ZcrOkWSc./2bZmgnfYQ.', 'Nguyễn Xuân Trung\n', 1, 'trung.25.05.68@ymail.com', '1968-05-25 00:00:00', '29/236 3/2, P. An Bình, Q. Ninh Kiều, TP. Cần Thơ', '01664969152', '2010-03-04 18:20:51', '2010-03-04 18:20:51', 2),
(14, 'BAONGUYEN-DUC76', '$2y$10$D.idgKYY2VHExPHeuSRZS.04q3TJXiJCeIOb..BB87QwSCu2p/f3W', 'Nguyễn Ðức Bảo\n', 1, 'nd.bao-07-07-76@gmail.com.vn', '1976-07-07 00:00:00', '9 Nguyễn Thái Học, P. Tân An, Q. Ninh Kiều, TP. Cần Thơ', '0885872026', '2010-03-04 19:20:29', '2010-03-04 19:20:29', 2),
(15, 'NGUYEN_TRIEU1999', '$2y$10$TEJUAUGbiNnXB5ACwK574eMZ/Q804v9Bz1wf6W1M.i258xkYZbymC', 'Nguyễn Triệu', 1, 'N-TRIEU_1502@hotmail.com', '1999-02-15 00:00:00', '187A/72 30/4, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ', '0981379252', '2010-03-06 19:20:29', '2010-03-06 19:20:29', 2),
(16, 'NGUYEN_THI-LY.12.10.99', '$2y$10$WVoAz4yW.UUSROdw2u6m9eY2ymlVFbx.pfuQbvpjNOVL9b8T2uh9.', 'Nguyễn Thị Lý\n', 0, 'LY.THI.NGUYEN_1999.10.12@outlook.com', '1999-10-12 00:00:00', '196A/140 Trần Kiết Tường, P. Thới Hòa, Q. Ô Môn, TP. Cần Thơ', '01676028888', '2010-03-06 19:20:29', '2010-03-06 19:20:29', 2),
(17, 'giang770101', '$2y$10$hJ6BhEPV.bZUOegg4KQhDOu4pO4WF6IPEN4tKYCSl09Kww7clxAf.', 'Võ Trường Giang\n', 1, 'giangvo_truong_1977.01.01@gmail.com', '1977-01-01 00:00:00', '309 Quang Trung, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ', '01268670164', '2010-03-21 19:20:29', '2010-03-21 19:20:29', 2),
(18, 'Dan.que\n.11_11', '$2y$10$MVPVAjuwM3xioMLTiL6rkO9e6agkoVotw2nQyCMw4.xSBqiIsAZnG', 'Phạm Ðan Quế\n', 1, 'Que-PhamDan.1993.11.11@hotmail.com', '1993-11-11 00:00:00', '255 QL91B, P. Phước Thới, Q. Ô Môn, TP. Cần Thơ', '0899379958', '2010-04-03 19:20:29', '2010-04-03 19:20:29', 2),
(19, 'NguyenPham-DuyCuong.1998-04-18', '$2y$10$S.VSpO8EBGif0MfP20V6sOEPe0IOPKx5nQgPSVi67RyDzshsYUAUG', 'Nguyễn Phạm Duy Cương\n', 1, 'N_P-D-CUONG180498@gmail.com', '1998-04-18 00:00:00', '375 QL91, P. Thới Hòa, Q. Ô Môn, TP. Cần Thơ', '0987105389', '2010-04-05 19:20:29', '2010-04-05 19:20:29', 2),
(20, 'TamPhan-Nguyen-Huu.89-03-14', '$2y$10$DA/uY8HOkMvO7X1szE0tPuSIE54kFW2kY.UHWbUS64eVRM.HOTP3m', 'Phan Nguyễn Hữu Tâm\n', 1, 'Huutam1403@ymail.com', '1989-03-14 00:00:00', '162 Trần Hưng Đạo, P. An Phú, Q. Ninh Kiều, TP. Cần Thơ', '01865279255', '2010-04-10 19:20:29', '2010-04-10 19:20:29', 2),
(21, 'Thuytram25112006', '$2y$10$wm23CX9lyC3ec2VGWc9yPOpUbTxWvJfAlNPyr6YtnuWclm71q12EO', 'Nguyễn Thị Thụy Trâm\n', 0, 'tramnguyenthithuy2511@yahoo.com', '2006-11-25 00:00:00', '18 Trần Quang Diệu, P. An Thới, Q. Bình Thủy, TP. Cần Thơ', '01221812736', '2010-04-10 19:20:29', '2010-04-10 19:20:29', 2),
(22, 'TamNguyenThiThanh20060303', '$2y$10$VPFM/NpoL1oKqJAPbKAb8unqMigyw/CeFec2qbVV9BTBNVpO9EJ.q', 'Nguyễn Thị Thanh Tâm\n', 0, 'tam03032006@hotmail.com', '2006-03-03 00:00:00', '13B/53 QL1, P. Thường Thạnh, Q. Cái Răng, TP. Cần Thơ', '01652635763', '2010-04-10 19:20:29', '2010-04-10 19:20:29', 2),
(23, 'HOANG-VUONG\n.28.11', '$2y$10$V6w3LgHXGkMrZ6HLK27Gwe4wvRM1sB4gsHvC5U21jzboCcirf93Re', 'Phạm Hoàng Vương\n', 1, 'PHVUONG28112006@outlook.com', '2006-11-28 00:00:00', '5/323 QL1, P. Thường Thạnh, Q. Cái Răng, TP. Cần Thơ', '01246951728', '2010-04-10 19:20:29', '2010-04-10 19:20:29', 2),
(24, 'SONBAONGO-3112', '$2y$10$tVboWY6m4sVVuQxuu.In5uFbHW04vkt4UlEee8QUM3IiSn46sCd96', 'Ngô Bảo Sơn\n', 1, 'NGO_BAOSON31_12_92@gmail.com.vn', '1992-12-31 00:00:00', '268 QL1, P. Ba Láng, Q. Cái Răng, TP. Cần Thơ', '01285483741', '2010-04-30 19:20:29', '2010-04-30 19:20:29', 2),
(25, 'Lac-01-02-1993', '$2y$10$k/Ay1PrSJGYzSJAfrF7.1uYVb5N6NOWH7lMKBmz8CFNHEsonzefvO', 'Huỳnh Phạm Văn Lạc\n', 1, 'Vanlac\n_930201@ymail.com', '1993-02-01 00:00:00', '388 Lê Hồng Phong, P. Bình Thủy, Q. Bình Thủy, TP. Cần Thơ', '01256648446', '2010-04-30 19:20:29', '2010-04-30 19:20:29', 2),
(26, 'Yenoanh05_05_1999', '$2y$10$zxsO5u8Jyy1g87mlH/mpqu0KGtAUZOvHvxONi7EMDLqkNJxBBD8ha', 'Trần Thị Yến Oanh\n', 0, 'tran-thi-yen-oanh.1999@gmail.com', '1999-05-05 00:00:00', '5/155 30/4, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ', '0895525969', '2010-04-30 21:46:32', '2010-04-30 21:46:32', 2),
(27, 'B-T-MHUONG46', '$2y$10$wyCU4YCzIuzTfnL7TyWA4uM1qLlKRSm2jfBCS.wu2EoWOydr5orBe', 'Bành Thị Mỹ Hường\n', 0, 'Myhuong46@yahoo.com.vn', '1946-07-29 00:00:00', '346 Võ Nguyên Giáp, P. Phú Thứ, Q. Cái Răng, TP. Cần Thơ', '0892588771', '2010-05-05 21:46:32', '2010-05-05 21:46:32', 2),
(28, 'LamNguyenThiMai1304', '$2y$10$ySTjf8k4JiG.hYsI0WIjlev908e.pudSI5uqHO2XARrYcArSpeg0a', 'Lâm Nguyễn Thị Mai\n', 0, 'maithi-nguyen_lam_2007.04.13@hotmail.com', '2007-04-13 00:00:00', '174/91 Lộ Vòng Cung, P. An Bình, Q. Ninh Kiều, TP. Cần Thơ', '0891307352', '2010-05-09 21:46:32', '2010-05-09 21:46:32', 3),
(29, 'NUONG_NGUYEN.THUY_15121988', '$2y$10$tUPiTuBFU.tCR7QnJ4f07.VdGCWXbfgn/uiKeK3Uhu20mviTnZxja', 'Nguyễn Thụy Nương\n', 0, 'Nuong.19881215@outlook.com', '1988-12-15 00:00:00', '91 CMT8, P. An Hòa, Q. Ninh Kiều, TP. Cần Thơ', '0882899031', '2010-05-23 21:46:32', '2010-05-23 21:46:32', 3),
(30, 'Tam-hanh23092006', '$2y$10$o.vaeODxn9ZgGolJuAuPJ.4a6KZjyeFckdSSI0T7nBmRRSjeSCbJ2', 'Phạm Thị Tâm Hạnh\n', 0, 'PT_THanh_23.09.06@hotmail.com', '2006-09-23 00:00:00', '63/56 Thái Thị Hạnh, P. Thới Long, Q. Ô Môn, TP. Cần Thơ', '01263805947', '2010-06-03 21:46:32', '2010-06-03 21:46:32', 3),
(31, 'dnpcuong', '$2y$10$WoA9hnU6xIWDrqAKDUGP/ezy8.ZhZaAjZacM/V0rGwVx/El03.oPK', 'Dương Nguyễn Phú Cường', 0, 'admin@nentang.vn', '1989-06-11 00:00:00', '130 Xô Viết Nghệ Tỉnh, Quận Ninh Kiều, TP Cần Thơ', '0915659223', '2010-06-03 21:46:32', '2010-06-03 21:46:32', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_khuyenmai`
--

CREATE TABLE `cusc_khuyenmai` (
  `km_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã chương trình khuyến mãi',
  `km_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chương trình # Tên chương trình khuyến mãi',
  `km_noiDung` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin chi tiết # Nội dung chi tiết chương trình khuyến mãi',
  `km_batDau` datetime NOT NULL COMMENT 'Thời điểm bắt đầu # Thời điểm bắt đầu khuyến mãi',
  `km_ketThuc` datetime DEFAULT NULL COMMENT 'Thời điểm kết thúc # Thời điểm kết thúc khuyến mãi',
  `km_giaTri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100;100' COMMENT 'Giá trị khuyến mãi # Giá trị khuyến mãi trên tổng hóa đơn (giảm tiền/giảm % tiền, giảm % vận chuyển), định dạng: tien;VanChuyen',
  `nv_nguoiLap` smallint(5) UNSIGNED NOT NULL COMMENT 'Lập kế hoạch # nv_ma # nv_hoTen # Mã nhân viên (người lập chương trình khuyến mãi)',
  `km_ngayLap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm lập # Thời điểm lập kế hoạch khuyến mãi',
  `nv_kyNhay` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Kế toán # nv_ma # nv_hoTen # Mã nhân viên (kế toán ký nháy), 1-chưa phân công',
  `km_ngayKyNhay` datetime DEFAULT NULL COMMENT 'Thời điểm ký nháy # Thời điểm ký nháy kế hoạch khuyến mãi',
  `nv_kyDuyet` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Duyệt kế hoạch # nv_ma # nv_hoTen # Mã nhân viên (thủ kho/giám đốc), 1-chưa phân công',
  `km_ngayDuyet` datetime DEFAULT NULL COMMENT 'Thời điểm duyệt # Ngày duyệt chương trình khuyến mãi',
  `km_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo chương trình khuyến mãi',
  `km_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật chương trình khuyến mãi gần nhất',
  `km_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái chương trình khuyến mãi: 1-ngưng khuyến mãi, 2-lập kế hoạch, 3-ký nháy, 4-duyệt kế hoạch'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chương trình khuyến mãi # Chương trình khuyến mãi';

--
-- Dumping data for table `cusc_khuyenmai`
--

INSERT INTO `cusc_khuyenmai` (`km_ma`, `km_ten`, `km_noiDung`, `km_batDau`, `km_ketThuc`, `km_giaTri`, `nv_nguoiLap`, `km_ngayLap`, `nv_kyNhay`, `km_ngayKyNhay`, `nv_kyDuyet`, `km_ngayDuyet`, `km_taoMoi`, `km_capNhat`, `km_trangThai`) VALUES
(1, 'km_ten 1', 'km_noiD 1', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 1', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(2, 'km_ten 2', 'km_noiD 2', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 2', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(3, 'km_ten 3', 'km_noiD 3', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 3', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(4, 'km_ten 4', 'km_noiD 4', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 4', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(5, 'km_ten 5', 'km_noiD 5', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 5', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(6, 'km_ten 6', 'km_noiD 6', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 6', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(7, 'km_ten 7', 'km_noiD 7', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 7', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(8, 'km_ten 8', 'km_noiD 8', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 8', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(9, 'km_ten 9', 'km_noiD 9', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 9', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(10, 'km_ten 10', 'km_noiD 10', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 10', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(11, 'km_ten 11', 'km_noiD 11', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 11', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(12, 'km_ten 12', 'km_noiD 12', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 12', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(13, 'km_ten 13', 'km_noiD 13', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 13', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(14, 'km_ten 14', 'km_noiD 14', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 14', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(15, 'km_ten 15', 'km_noiD 15', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 15', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(16, 'km_ten 16', 'km_noiD 16', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 16', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(17, 'km_ten 17', 'km_noiD 17', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 17', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(18, 'km_ten 18', 'km_noiD 18', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 18', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(19, 'km_ten 19', 'km_noiD 19', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 19', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(20, 'km_ten 20', 'km_noiD 20', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 20', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(21, 'km_ten 21', 'km_noiD 21', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 21', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(22, 'km_ten 22', 'km_noiD 22', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 22', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(23, 'km_ten 23', 'km_noiD 23', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 23', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(24, 'km_ten 24', 'km_noiD 24', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 24', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(25, 'km_ten 25', 'km_noiD 25', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 25', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(26, 'km_ten 26', 'km_noiD 26', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 26', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(27, 'km_ten 27', 'km_noiD 27', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 27', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(28, 'km_ten 28', 'km_noiD 28', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 28', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(29, 'km_ten 29', 'km_noiD 29', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 29', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1),
(30, 'km_ten 30', 'km_noiD 30', '2019-10-29 07:15:31', '2019-10-29 07:15:31', 'km_giaTri 30', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_khuyenmai_sanpham`
--

CREATE TABLE `cusc_khuyenmai_sanpham` (
  `km_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Chương trình # km_ma # km_ten # Mã chương trình khuyến mãi',
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã sản phẩm',
  `m_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Màu sắc # m_ma # m_ten # Mã màu sản phẩm, 1-Phối màu (đỏ, vàng, ...)',
  `kmsp_giaTri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100;0' COMMENT 'Giá trị khuyến mãi # Giá trị khuyến mãi (giảm tiền/giảm % tiền, số lượng), định dạng: tien;soLuong (soLuong = 0, không giới hạn số lượng)',
  `kmsp_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái khuyến mãi: 1-ngưng khuyến mãi, 2-có hiệu lực'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Thông tin khuyến mãi sản phẩm # Chi tiết về chương trình khuyến mãi';

--
-- Dumping data for table `cusc_khuyenmai_sanpham`
--

INSERT INTO `cusc_khuyenmai_sanpham` (`km_ma`, `sp_ma`, `m_ma`, `kmsp_giaTri`, `kmsp_trangThai`) VALUES
(1, 1, 1, 'kmsp_giaTri 1', 1),
(2, 2, 2, 'kmsp_giaTri 2', 2),
(3, 3, 3, 'kmsp_giaTri 3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_loai`
--

CREATE TABLE `cusc_loai` (
  `l_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã loại sản phẩm',
  `l_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên loại # Tên loại sản phẩm',
  `l_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm',
  `l_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật loại sản phẩm gần nhất',
  `l_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái loại sản phẩm: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Loại sản phẩm # Loại sản phẩm';

--
-- Dumping data for table `cusc_loai`
--

INSERT INTO `cusc_loai` (`l_ma`, `l_ten`, `l_taoMoi`, `l_capNhat`, `l_trangThai`) VALUES
(1, 'Máy Photocoppy ricoh màu', '2010-01-01 01:00:00', '2019-10-30 05:47:46', 2),
(2, 'Máy Photocoppy ricoh trắng đen', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(3, 'Máy Photocoppy Toshiba màu', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(4, 'Máy Photocoppy Toshiba trắng đen', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(5, 'Máy Photocoppy công nghiệp màu', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(6, 'Máy Photocoppy công nghiệp trắng đen', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_mau`
--

CREATE TABLE `cusc_mau` (
  `m_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã màu sản phẩm, 1-Phối màu (đỏ, vàng, ...)',
  `m_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên màu # Tên màu sản phẩm',
  `m_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo màu',
  `m_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật màu gần nhất',
  `m_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái màu sản phẩm: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Màu sắc # Màu sản phẩm';

--
-- Dumping data for table `cusc_mau`
--

INSERT INTO `cusc_mau` (`m_ma`, `m_ten`, `m_taoMoi`, `m_capNhat`, `m_trangThai`) VALUES
(1, 'Phối màu', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(2, 'Cam (Orange)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(3, 'Hồng (Pink)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(4, 'Ngọc bích (SeaGreen)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(5, 'Nâu (SaddleBrown)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(6, 'Trà (Teal)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(7, 'Trắng (White)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(8, 'Tím (Purple)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(9, 'Tím cà (Orchid)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(10, 'Tím sen (Magenta)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(11, 'Vàng (Yellow)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(12, 'Xanh da trời (SkyBlue)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(13, 'Xanh dương (Blue)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(14, 'Xanh lá (Green)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(15, 'Xanh lơ (Cyan)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(16, 'Xanh đọt chuối (Chartreuse)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(17, 'Đen (Black)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(18, 'Đỏ (Red)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(19, 'Đỏ sậm (Maroon)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(20, 'Đỏ thắm (Crimson)', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_mau_sanpham`
--

CREATE TABLE `cusc_mau_sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Màu sắc # m_ma # m_ten # Mã sản phẩm',
  `m_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã màu sản phẩm',
  `msp_soluong` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Số lượng # Số lượng sản phẩm tương ứng với màu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Số lượng sản phẩm theo màu # Số lượng sản phẩm tương ứng với các màu';

--
-- Dumping data for table `cusc_mau_sanpham`
--

INSERT INTO `cusc_mau_sanpham` (`sp_ma`, `m_ma`, `msp_soluong`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_nhacungcap`
--

CREATE TABLE `cusc_nhacungcap` (
  `ncc_ma` smallint(5) UNSIGNED NOT NULL COMMENT 'Mã nhà cung cấp, 1-Tự tạo',
  `ncc_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên nhà cung cấp # Tên nhà cung cấp',
  `ncc_daiDien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Đại diện # Người đại diện',
  `ncc_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ',
  `ncc_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại # Điện thoại',
  `ncc_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email # Email',
  `ncc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhà cung cấp',
  `ncc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhà cung cấp gần nhất',
  `ncc_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái nhà cung cấp: 1-khóa, 2-khả dụng',
  `xx_ma` smallint(5) UNSIGNED NOT NULL COMMENT 'Xuất xứ # xx_ma # xx_ten # Mã xuất xứ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nhà cung cấp # Nhà cung cấp hoa';

--
-- Dumping data for table `cusc_nhacungcap`
--

INSERT INTO `cusc_nhacungcap` (`ncc_ma`, `ncc_ten`, `ncc_daiDien`, `ncc_diaChi`, `ncc_dienThoai`, `ncc_email`, `ncc_taoMoi`, `ncc_capNhat`, `ncc_trangThai`, `xx_ma`) VALUES
(1, 'sunshine.com', 'Huỳnh Ngọc Ly\n', '1 Lý Tự Trọng, P. An Cư, Q. Ninh Kiều, TP. Cần Thơ', '0955667788', 'cham.soc.khach.hang@sunshine.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 1),
(2, 'Cty TNHH MTV Huyền\n Việt\n', 'Lê Thanh Việt\n', '24, Khóm Tân Mỹ, P. Tân Quy Đông, TP. Sa Đéc, Đồng Tháp', '01276245321', 'lethanh.viet.19700709@gmail.com.vn', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 2),
(3, 'Cty TNHH TMDV Hoa Cao Cấp Hải Thảo\n', 'Huỳnh Hải Thảo\n', '67, Khóm Sa Nhiên, P. Tân Quy Đông, TP. Sa Đéc, Đồng Tháp', '0882320529', 'huynhhaithao19780501@hotmail.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 2),
(4, 'Cty TNHH MTV Ngọc Huyền\n', 'Phan Ngọc Huyền\n', '111 huyện lộ 90B, Ấp Mỹ Hòa, X. Mỹ Phong, TP. Mỹ Tho, Tiền Giang', '01664810787', 'phan-ngochuyen_19991004@hotmail.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 3),
(5, 'DNTN Hoa Tươi Hảo\n', 'Nguyễn Thị Thanh Hảo\n', '109, X. Vị Thanh, H. Vị Thủy, Hậu Giang', '01692579789', 'nguyen.thi.thanhhao20021110@gmail.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 4),
(6, 'Cty TNHH TMDV Hoa Cao Cấp Xuân Ngọc\n', 'Lê Thị Xuân Ngọc\n', '95, Ấp 6, X. Vị Đông, H. Vị Thủy, Hậu Giang', '01249412549', 'lethixuanngoc19710722@outlook.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 4),
(7, 'Cty TNHH Hoa Tươi Phương Trà\n', 'Lê Nguyễn Phương Trà\n', '192, Ấp 8, X. Vĩnh Trung, H. Vị Thủy, Hậu Giang', '01664037595', 'lenguyenphuongtra@outlook.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 4),
(8, 'DNTN Hoa Tươi An Hạ\n', 'Tạ Thị An Hạ\n', '198 Ấp Lân Tây, X. Phú Sơn, H. Chợ Lách, Bến Tre', '0929542398', 'tathianha20090728@ymail.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 5),
(9, 'Cty TNHH TMDV Hoa Mỹ Khuyên\n', 'Nguyễn Mỹ Khuyên\n', '35 Ấp Phước Định, X. Bình Hòa Phước, H. Long Hồ, Vĩnh Long', '01682352015', 'nguyenmykhuyen19870502@hotmail.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 6),
(10, 'Cty TNHH TMDV Hoa Thy\n Nguyễn', 'Nguyễn Phương Thy\n', '140 Ấp Phước Định, X. Bình Hòa Phước, H. Long Hồ, Vĩnh Long', '01888800052', 'nguyen_phuongthy@yahoo.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 6),
(11, 'Cty TNHH MTV Hoa Tươi Cường\n Hoan\n', 'Nguyễn Ðình Cường\n', '168 Ấp Phước Định, X. Bình Hòa Phước, H. Long Hồ, Vĩnh Long', '0891242290', 'nguyendinhcuong@gmail.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 6),
(12, 'DNTN Hoa Cao Cấp Thạc Hoàng\n', 'Tô Thạc', '131 Thánh Mẫu, P. 7, TP. Đà Lạt, Lâm Đồng', '0987471690', 'to.thac_19990718@yahoo.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 7),
(13, 'Cty TNHH MTV Phạm Loan\n', 'Phạm Phượng Loan\n', '96 Mai Anh Đào, P. 8, TP. Đà Lạt, Lâm Đồng', '01264941170', 'pham.phuong_loan@ymail.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 7),
(14, 'Cty TNHH Hoa Cao Cấp Minh\n Hà\n', 'Đinh Hồng Minh\n', '123 Trương Văn Hoàn, P. 9, Tp. Đà Lạt, Lâm Đồng', '01684591884', 'dinh.hongminh.19990330@yahoo.com.vn', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 7),
(15, 'Cty TNHH MTV Văn Khiêm\n', 'Phan Nguyễn Văn Khiêm\n', '148 Phù Đổng Thiên Vương, P. 8, TP. Đà Lạt, Lâm Đồng', '0989596048', 'phan-nguyenvankhiem20190109@outlook.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 7),
(16, 'DNTN Hoa Cao Cấp Hảo\n Hương\n', 'Lê Thị Bích Hảo\n', '22 Nguyễn Đình Chiểu, P. 9, TP. Đà Lạt, Lâm Đồng', '0940333569', 'lethi_bich_hao_19980310@outlook.com', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_nhanvien`
--

CREATE TABLE `cusc_nhanvien` (
  `nv_ma` smallint(5) UNSIGNED NOT NULL COMMENT 'Mã nhân viên, 1-chưa phân công',
  `nv_taiKhoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tài khoản # Tài khoản',
  `nv_matKhau` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu # Mật khẩu',
  `nv_hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên # Họ tên',
  `nv_gioiTinh` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác',
  `nv_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email # Email',
  `nv_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày sinh # Ngày sinh',
  `nv_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ',
  `nv_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại # Điện thoại',
  `nv_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhân viên',
  `nv_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhân viên gần nhất',
  `nv_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái nhân viên: 1-khóa, 2-khả dụng',
  `q_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Quyền # Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng',
  `nv_ghinhodangnhap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nhân viên # Nhân viên';

--
-- Dumping data for table `cusc_nhanvien`
--

INSERT INTO `cusc_nhanvien` (`nv_ma`, `nv_taiKhoan`, `nv_matKhau`, `nv_hoTen`, `nv_gioiTinh`, `nv_email`, `nv_ngaySinh`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `q_ma`, `nv_ghinhodangnhap`) VALUES
(1, 'unknown', '$2y$10$onnM7KPOTObUYl0vCEbDRekoNl9/gz8a55Q4BuzAWJM9mvw04lFXu', 'Chưa phân công', 1, 'unknown@sunshine.com', '2010-01-01 08:00:00', 'unknown', '01234567890', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 6, 'aFBqWnVfJPHzj1QJAXnkfX526TlYRlihRsC8X0vlb2KtNr7W9Nn2ofZyAvvq'),
(2, 'hnly', '$2y$10$spd0zYphAqEAx0GHEUMOWOToBZc.DVVXxcsa6GYLGW6AI1SbE5C..', 'Huỳnh Ngọc Ly\n', 0, 'hnly@sunshine.com', '1952-01-25 00:00:00', '321 Ngô Gia Tự, P. An Hội, Q. Ninh Kiều, TP. Cần Thơ', '0913813015', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 1, NULL),
(3, 'nmcuong', '$2y$10$OIzeC21YWTXeMcmRMXAN1OQFOBPTwgg.YX9b0gEeWE99qyirXLU32', 'Nguyễn Mạnh Cường\n', 1, 'nmcuong@sunshine.com', '1980-08-23 00:00:00', '32 Đinh Công Chánh, P. Long Tuyền , Q. Bình Thủy, TP. Cần Thơ', '01276447256', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 2, NULL),
(4, 'lnntho', '$2y$10$wBjbLTAo5B/n8me20Gf1Yu16kzVHPgFZqc9rbw0n3gYEr0u8q5fI2', 'Lê Nguyễn Ngọc Thọ\n', 1, 'lnntho@sunshine.com', '1991-08-02 00:00:00', '147 QL1, P. Hưng Thạnh, Q. Cái Răng, TP. Cần Thơ', '0929202533', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 3, NULL),
(5, 'pntmy', '$2y$10$gPyU4XKFXVCJ8zhb16i0K.vTYG55bH3jt2PDeshTLTosvO9zSPjya', 'Phan Nguyễn Thị My\n', 0, 'pntmy@sunshine.com', '1995-02-02 00:00:00', '355 Châu Văn Liêm, P. Tân An, Q. Ninh Kiều, TP. Cần Thơ', '01237000271', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 4, NULL),
(6, 'tltkha', '$2y$10$KM.LqWBbT0LD5DyX5yhZoOwS/AQ9olOHPgwKis6iHxWZi3xaubjia', 'Trần Lê Thị Khải Hà\n', 0, 'tltkha@sunshine.com', '1993-06-05 00:00:00', '268 Tỉnh lộ 923, P. Phước Thới, Q. Ô Môn, TP. Cần Thơ', '01667923064', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 5, NULL),
(7, 'hntvhuong', '$2y$10$DsVq6I5OMmZNZMjA.A6IreKyVTOZp1fqywx3nXI/9QTxok94UNrRa', 'Hồ Nguyễn Thị Việt Hương\n', 0, 'hntvhuong@sunshine.com', '1979-04-05 00:00:00', '44 CMT8, P. Cái Khế, Q. Ninh Kiều, TP. Cần Thơ', '0981375755', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 5, NULL),
(8, 'ttaphuong', '$2y$10$BJ5W/E3EPYG968W4idzlveGPueigOdjlKAu57IDh8AV6/QiI4T7Qa', 'Trần Thị Anh Phương\n', 0, 'ttaphuong@sunshine.com', '1993-05-31 00:00:00', '136/45 Nguyễn Chí Thanh, P. Trà Nóc , Q. Bình Thủy, TP. Cần Thơ', '01674131340', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 6, NULL),
(9, 'pvtnnhi', '$2y$10$Qf3TXz3bEfyxjgEQAoaRy.T2qj7xZojizTqMoijCfsaikYWyA3CUS', 'Phan Vũ Thị Ngọc Nhi\n', 0, 'pvtnnhi@sunshine.com', '1984-01-24 00:00:00', '145/246 Võ Nguyên Giáp, P. Tân Phú, Q. Cái Răng, TP. Cần Thơ', '0905849962', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 6, NULL),
(100, 'admin', '$2y$10$T42ZAcrKrYy79SzejqmCJOe3VvmuFGS8mPdz7TJ9vV1AiZk3ukkb6', 'Quản trị hệ thống', 1, 'admin@nentang.vn', '2010-01-01 08:00:00', '130 Xô Viết Nghệ Tỉnh, Quận Ninh Kiều, TP Cần Thơ', '0915659223', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2, 2, 'Bj1SIOAPTTzgraTJXZjZab47kBAJFUdOF2xgWrvvGDD4mRgDZKC9mEYi8glu'),
(101, 'lmquan', '$2y$10$9drsQkp2cPYVLOsJRsUrVeU6251nMrf3bexmwO.Svvz2cyvtlG3UC', 'Le Minh Quan', 1, 'lmquan17005@gmail.com', '1997-10-10 00:00:00', 'Hau Giang', '1234567890', '2019-10-29 00:21:49', '2019-10-29 00:21:49', 1, 2, 'xrq6d0adjVr1LZQKi60Urm36Mq0rbxGQ1rkYqFkjKWwSUAd4cLyg2ALgO5lN');

-- --------------------------------------------------------

--
-- Table structure for table `cusc_phieunhap`
--

CREATE TABLE `cusc_phieunhap` (
  `pn_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã phiếu nhập',
  `pn_nguoiGiao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người giao hàng # Người giao hàng',
  `pn_soHoaDon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số hóa đơn # Số hóa đơn',
  `pn_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày xuất hóa đơn # Ngày xuất hóa đơn',
  `pn_ghiChu` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ghi chú # Ghi chú phiếu nhập',
  `nv_nguoiLapPhieu` smallint(5) UNSIGNED NOT NULL COMMENT 'Lập phiếu # Mã nhân viên (người lập phiếu nhập)',
  `pn_ngayLapPhieu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm lập phiếu # Thời điểm lập phiếu nhập kho',
  `nv_keToan` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Xác nhận # Mã nhân viên (kế toán trưởng), 1-chưa phân công',
  `pn_ngayXacNhan` datetime DEFAULT NULL COMMENT 'Thời điểm xác nhận # Thời điểm xác nhận thanh toán phiếu nhập kho',
  `nv_thuKho` smallint(5) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Thủ kho # Mã nhân viên (thủ kho/giám đốc), 1-chưa phân công',
  `pn_ngayNhapKho` datetime DEFAULT NULL COMMENT 'Ngày nhập kho # Ngày nhập kho',
  `pn_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo phiếu nhập',
  `pn_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật phiếu nhập gần nhất',
  `pn_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái phiếu nhập sản phẩm: 1-khóa, 2-lập phiếu, 3-thanh toán, 4-nhập kho',
  `ncc_ma` smallint(5) UNSIGNED NOT NULL COMMENT 'Nhà cung cấp # ncc_ma # ncc_ten # Mã nhà cung cấp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Phiếu nhập # Phiếu nhập';

--
-- Dumping data for table `cusc_phieunhap`
--

INSERT INTO `cusc_phieunhap` (`pn_ma`, `pn_nguoiGiao`, `pn_soHoaDon`, `pn_ngayXuatHoaDon`, `pn_ghiChu`, `nv_nguoiLapPhieu`, `pn_ngayLapPhieu`, `nv_keToan`, `pn_ngayXacNhan`, `nv_thuKho`, `pn_ngayNhapKho`, `pn_taoMoi`, `pn_capNhat`, `pn_trangThai`, `ncc_ma`) VALUES
(1, 'pn_nguoiGiao 1', 'pn_soHoaDon 1', '2019-10-29 07:15:31', 'pn_ghi 1', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', 1, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 1, 1),
(2, 'pn_nguoiGiao 2', 'pn_soHoaDon 2', '2019-10-29 07:15:31', 'pn_ghi 2', 2, '2019-10-29 07:15:31', 2, '2019-10-29 07:15:31', 2, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 2, 2),
(3, 'pn_nguoiGiao 3', 'pn_soHoaDon 3', '2019-10-29 07:15:31', 'pn_ghi 3', 3, '2019-10-29 07:15:31', 3, '2019-10-29 07:15:31', 3, '2019-10-29 07:15:31', '2019-10-29 00:15:31', '2019-10-29 00:15:31', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_quyen`
--

CREATE TABLE `cusc_quyen` (
  `q_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng',
  `q_ten` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên quyền # Tên quyền',
  `q_dienGiai` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Diễn giải # Diễn giải về quyền',
  `q_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo quyền',
  `q_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật quyền gần nhất',
  `q_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái quyền: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Quyền # Các quyền quản lý';

--
-- Dumping data for table `cusc_quyen`
--

INSERT INTO `cusc_quyen` (`q_ma`, `q_ten`, `q_dienGiai`, `q_taoMoi`, `q_capNhat`, `q_trangThai`) VALUES
(1, 'Giám đốc', 'Duyệt chương trình khuyến mãi, ký tên phiếu nhập, ký tên hóa đơn, ...', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(2, 'Quản trị', 'Quản lý người dùng, khách hàng, sản phẩm, ...', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(3, 'Quản lý kho', 'Quản lý sản phẩm, đối tác, nhập kho, ...', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(4, 'Kế toán', 'Xuất phiếu thu, ký tên hóa đơn, ...', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(5, 'Nhân viên kinh doanh', 'Lập kế hoạch khuyến mãi, lập hóa đơn, xử lý đơn hàng, ...', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(6, 'Nhân viên giao hàng', 'Lập phiếu giao hàng, giao sản phẩm, ...', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_sanpham`
--

CREATE TABLE `cusc_sanpham` (
  `sp_ma` bigint(20) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `sp_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên sản phẩm # Tên sản phẩm',
  `sp_giaGoc` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Giá gốc # Giá gốc của sản phẩm',
  `sp_giaBan` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Giá bán # Giá bán hiện tại của sản phẩm',
  `sp_hinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hình đại diện # Hình đại diện của sản phẩm',
  `sp_thongTin` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin # Thông tin về sản phẩm',
  `sp_danhGia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0;0;0;0;0' COMMENT 'Chất lượng # Chất lượng của sản phẩm (1-5 sao), định dạng: 1;2;3;4;5',
  `sp_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm',
  `sp_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất',
  `sp_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng',
  `l_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Loại sản phẩm # l_ma # l_ten # Mã loại sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Sản phẩm # Sản phẩm: hoa, giỏ hoa, vòng hoa, ...';

--
-- Dumping data for table `cusc_sanpham`
--

INSERT INTO `cusc_sanpham` (`sp_ma`, `sp_ten`, `sp_giaGoc`, `sp_giaBan`, `sp_hinh`, `sp_thongTin`, `sp_danhGia`, `sp_taoMoi`, `sp_capNhat`, `sp_trangThai`, `l_ma`) VALUES
(1, 'sp_ten 1', 1, 1, 'sp1.jpg', 'sp_thong 1', 'sp_danhGia 1', '2019-10-29 00:15:31', '2019-10-29 00:51:04', 1, 6),
(2, 'sp_ten 2', 2, 2, 'sp2.jpg', 'sp_thong 2', 'sp_danhGia 2', '2019-10-29 00:15:31', '2019-10-29 00:55:53', 2, 2),
(3, 'sp_ten 3', 3, 3, 'sp3.jpg', 'sp_thong 3', 'sp_danhGia 3', '2019-10-29 00:15:31', '2019-10-29 00:56:02', 1, 3),
(4, 'sp_ten 4', 4, 4, 'sp4.jpg', 'sp_thong 4', 'sp_danhGia 4', '2019-10-29 00:15:31', '2019-10-29 00:56:16', 1, 4),
(5, 'sp_ten 5', 5, 5, 'sp5.jpg', 'sp_thong 5', 'sp_danhGia 5', '2019-10-29 00:15:31', '2019-10-29 00:56:27', 1, 5),
(6, 'sp_ten 6', 6, 6, 'sp6.jpg', 'sp_thong 6', 'sp_danhGia 6', '2019-10-29 00:15:31', '2019-10-29 00:56:54', 1, 1),
(8, 'sp_ten 8', 8, 8, 'sp7.jpg', 'sp_thong 8', 'sp_danhGia 8', '2019-10-29 00:15:31', '2019-10-29 00:57:05', 1, 2),
(9, 'sp_ten 9', 9, 9, 'sp9.jpg', 'sp_thong 9', 'sp_danhGia 9', '2019-10-29 00:15:31', '2019-10-29 00:57:21', 1, 3),
(10, 'sp_ten 10', 10, 10, 'sp10.jpg', 'sp_thong 10', 'sp_danhGia 10', '2019-10-29 00:15:31', '2019-10-29 00:57:36', 1, 4),
(12, 'sp_ten 12', 12, 12, 'sp12.jpg', 'sp_thong 12', 'sp_danhGia 12', '2019-10-29 00:15:31', '2019-10-29 00:57:51', 1, 5),
(14, 'sp_ten 14', 14, 14, 'sp13.jpg', 'sp_thong 14', 'sp_danhGia 14', '2019-10-29 00:15:31', '2019-10-29 00:58:13', 1, 6),
(16, 'sp_ten 16', 16, 16, 'sp15.jpg', 'sp_thong 16', 'sp_danhGia 16', '2019-10-29 00:15:31', '2019-10-29 00:58:29', 1, 6),
(17, 'sp_ten 17', 17, 17, 'sp16.jpg', 'sp_thong 17', 'sp_danhGia 17', '2019-10-29 00:15:31', '2019-10-29 00:58:39', 1, 6),
(18, 'sp_ten 18', 18, 18, 'sp17.jpg', 'sp_thong 18', 'sp_danhGia 18', '2019-10-29 00:15:31', '2019-10-29 00:58:52', 1, 6),
(19, 'sp_ten 19', 19, 19, 'sp5.jpg', 'sp_thong 19', 'sp_danhGia 19', '2019-10-29 00:15:31', '2019-10-29 00:59:04', 1, 2),
(20, 'sp_ten 20', 20, 20, 'sp1.jpg', 'sp_thong 20', 'sp_danhGia 20', '2019-10-29 00:15:31', '2019-10-29 00:59:21', 1, 2),
(21, 'sp_ten 21', 21, 21, 'sp16.jpg', 'sp_thong 21', 'sp_danhGia 21', '2019-10-29 00:15:31', '2019-10-29 00:59:33', 1, 3),
(22, 'sp_ten 22', 22, 22, 'sp12.jpg', 'sp_thong 22', 'sp_danhGia 22', '2019-10-29 00:15:31', '2019-10-29 00:59:42', 1, 2),
(24, 'sp_ten 24', 24, 24, 'sp10.jpg', 'sp_thong 24', 'sp_danhGia 24', '2019-10-29 00:15:31', '2019-10-29 00:59:55', 1, 4),
(30, 'sp_ten 30', 30, 30, 'sp3.jpg', 'sp_thong 30', 'sp_danhGia 30', '2019-10-29 00:15:31', '2019-10-29 01:00:03', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_thanhtoan`
--

CREATE TABLE `cusc_thanhtoan` (
  `tt_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã phương thức thanh toán',
  `tt_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên phương thức # Tên phương thức thanh toán',
  `tt_dienGiai` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin # Thông tin về phương thức thanh toán',
  `tt_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo phương thức thanh toán',
  `tt_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật phương thức thanh toán gần nhất',
  `tt_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái phương thức thanh toán: 1-khóa, 2-hiển thị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Phương thức thanh toán # Phương thức thanh toán';

--
-- Dumping data for table `cusc_thanhtoan`
--

INSERT INTO `cusc_thanhtoan` (`tt_ma`, `tt_ten`, `tt_dienGiai`, `tt_taoMoi`, `tt_capNhat`, `tt_trangThai`) VALUES
(1, 'Tiền mặt', 'Quý khách thanh toán trực tiếp tại cửa hàng', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(2, 'Thanh toán khi nhận hàng', 'Nhân viên của chúng tôi sẽ liên lạc với Quý khách để nhận thông tin về địa chỉ và thời gian giao hàng. Nhân viên của chúng tôi sẽ đến giao hàng và nhận tiền sau khi Quý khách đã nhận và kiểm tra hàng.', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(3, 'Chuyển khoản', '<div style=\'text-align: justify\'>Quý khách có thể đến bất kì Phòng giao dịch ngân hàng, ATM hoặc sử dụng tính năng Internet Banking để chuyển tiền vào một trong các tài khoản sau:</div><div style=\'text-align: center\'><img src=\'public/template/images/info/atm.png\'/></div><div style=\'text-align: justify; text-style: italic; margin-left: 20px\'><b>Lưu ý:</b> Sau khi thanh toán, Quý khách cần thông báo lại cho chúng tôi thông tin chuyển khoản của Quý khách bao gồm: Tên người chuyển và số điện thoại hoặc nội dung chuyển khoản để chúng tôi kiểm tra thông tin.</div><div style=\'text-align: center\'>HOTLINE HỖ TRỢ THANH TOÁN: 0939.123.456</div>', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_vanchuyen`
--

CREATE TABLE `cusc_vanchuyen` (
  `vc_ma` tinyint(3) UNSIGNED NOT NULL COMMENT 'Mã dịch vụ giao hàng',
  `vc_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên dịch vụ # Tên dịch vụ giao hàng',
  `vc_chiPhi` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Phí giao hàng # Phí giao hàng',
  `vc_dienGiai` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin # Thông tin về dịch vụ giao hàng',
  `vc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo dịch vụ giao hàng',
  `vc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật dịch vụ giao hàng gần nhất',
  `vc_trangThai` tinyint(3) UNSIGNED NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái dịch vụ giao hàng: 1-khóa, 2-hiển thị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Dịch vụ giao hàng # Dịch vụ giao hàng';

--
-- Dumping data for table `cusc_vanchuyen`
--

INSERT INTO `cusc_vanchuyen` (`vc_ma`, `vc_ten`, `vc_chiPhi`, `vc_dienGiai`, `vc_taoMoi`, `vc_capNhat`, `vc_trangThai`) VALUES
(1, 'Miễn phí', 0, 'Nhận hàng trực tiếp tại cửa hàng.', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(2, 'Miễn phí (trong vòng 24h)', 0, 'Chỉ áp dụng tại nội ô Tp. Cần Thơ và đơn hàng được nhận trước ngày gửi ít nhất là 2 ngày.', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(3, 'Ưu tiên (trong vòng 8h)', 30000, 'Chỉ áp dụng tại nội ô Tp. Cần Thơ', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(4, 'Miễn phí (vận chuyển thường)', 0, 'Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện.', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(5, 'Miễn phí (vận chuyển nhanh)', 0, 'Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện.', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cusc_xuatxu`
--

CREATE TABLE `cusc_xuatxu` (
  `xx_ma` smallint(5) UNSIGNED NOT NULL COMMENT 'Mã xuất xứ',
  `xx_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Xuất xứ # Xuất xứ của sản phẩm',
  `xx_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo xuất xứ',
  `xx_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật xuất xứ gần nhất',
  `xx_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái xuất xứ: 1-khóa, 2-khả dụng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Xuất xứ # Xuất xứ của sản phẩm';

--
-- Dumping data for table `cusc_xuatxu`
--

INSERT INTO `cusc_xuatxu` (`xx_ma`, `xx_ten`, `xx_taoMoi`, `xx_capNhat`, `xx_trangThai`) VALUES
(1, 'Kết hợp', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(2, 'Tân Quy Đông, Sa Đéc', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(3, 'Mỹ Phong, Mỹ Tho', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(4, 'Vị Thanh, Hậu Giang', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(5, 'Cái Mơn, Bến Tre', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(6, 'Phước Định, Vĩnh Long', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2),
(7, 'Đà Lạt', '2010-01-01 01:00:00', '2010-01-01 01:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_17_043800_create_chude_table', 1),
(4, '2017_05_17_043801_create_khachhang_table', 1),
(5, '2017_05_17_043802_create_loai_table', 1),
(6, '2017_05_17_043803_create_mau_table', 1),
(7, '2017_05_17_043804_create_quyen_table', 1),
(8, '2017_05_17_043805_create_thanhtoan_table', 1),
(9, '2017_05_17_043806_create_vanchuyen_table', 1),
(10, '2017_05_17_043807_create_xuatxu_table', 1),
(11, '2017_05_17_043808_create_sanpham_table', 1),
(12, '2017_05_17_043809_create_hinhanh_table', 1),
(13, '2017_05_17_043810_create_nhanvien_table', 1),
(14, '2017_05_17_043811_create_nhacungcap_table', 1),
(15, '2017_05_17_043812_create_khuyenmai_table', 1),
(16, '2017_05_17_043813_create_gopy_table', 1),
(17, '2017_05_17_043814_create_mau_sanpham_table', 1),
(18, '2017_05_17_043815_create_chude_sanpham_table', 1),
(19, '2017_05_17_043816_create_donhang_table', 1),
(20, '2017_05_17_043817_create_phieunhap_table', 1),
(21, '2017_05_17_043818_create_khuyenmai_sanpham_table', 1),
(22, '2017_05_17_043819_create_hoadonsi_table', 1),
(23, '2017_05_17_043820_create_chitietnhap_table', 1),
(24, '2017_05_17_043821_create_chitietdonhang_table', 1),
(25, '2017_05_17_043822_create_hoadonle_table', 1),
(26, '2018_02_27_071349_create_doanhthu_sanpham_table', 1),
(27, '2019_07_05_161859_alter_add_column_v1_to_nhanvien_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cusc_chitietdonhang`
--
ALTER TABLE `cusc_chitietdonhang`
  ADD PRIMARY KEY (`dh_ma`,`sp_ma`,`m_ma`),
  ADD KEY `cusc_chitietdonhang_m_ma_foreign` (`m_ma`),
  ADD KEY `cusc_chitietdonhang_sp_ma_foreign` (`sp_ma`);

--
-- Indexes for table `cusc_chitietnhap`
--
ALTER TABLE `cusc_chitietnhap`
  ADD PRIMARY KEY (`pn_ma`,`sp_ma`,`m_ma`),
  ADD KEY `cusc_chitietnhap_m_ma_foreign` (`m_ma`),
  ADD KEY `cusc_chitietnhap_sp_ma_foreign` (`sp_ma`);

--
-- Indexes for table `cusc_chude`
--
ALTER TABLE `cusc_chude`
  ADD PRIMARY KEY (`cd_ma`),
  ADD UNIQUE KEY `cusc_chude_cd_ma_cd_ten_unique` (`cd_ma`,`cd_ten`);

--
-- Indexes for table `cusc_chude_sanpham`
--
ALTER TABLE `cusc_chude_sanpham`
  ADD PRIMARY KEY (`sp_ma`,`cd_ma`),
  ADD KEY `cusc_chude_sanpham_cd_ma_foreign` (`cd_ma`);

--
-- Indexes for table `cusc_doanhthu_sanpham`
--
ALTER TABLE `cusc_doanhthu_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cusc_doanhthu_sanpham_sp_ma_foreign` (`sp_ma`);

--
-- Indexes for table `cusc_donhang`
--
ALTER TABLE `cusc_donhang`
  ADD PRIMARY KEY (`dh_ma`),
  ADD KEY `cusc_donhang_kh_ma_foreign` (`kh_ma`),
  ADD KEY `cusc_donhang_nv_giaohang_foreign` (`nv_giaoHang`),
  ADD KEY `cusc_donhang_nv_xuly_foreign` (`nv_xuLy`),
  ADD KEY `cusc_donhang_tt_ma_foreign` (`tt_ma`),
  ADD KEY `cusc_donhang_vc_ma_foreign` (`vc_ma`);

--
-- Indexes for table `cusc_gopy`
--
ALTER TABLE `cusc_gopy`
  ADD PRIMARY KEY (`gy_ma`),
  ADD KEY `cusc_gopy_kh_ma_foreign` (`kh_ma`),
  ADD KEY `cusc_gopy_sp_ma_foreign` (`sp_ma`);

--
-- Indexes for table `cusc_hinhanh`
--
ALTER TABLE `cusc_hinhanh`
  ADD PRIMARY KEY (`sp_ma`,`ha_stt`);

--
-- Indexes for table `cusc_hoadonle`
--
ALTER TABLE `cusc_hoadonle`
  ADD PRIMARY KEY (`hdl_ma`),
  ADD KEY `cusc_hoadonle_dh_ma_foreign` (`dh_ma`),
  ADD KEY `cusc_hoadonle_nv_laphoadon_foreign` (`nv_lapHoaDon`);

--
-- Indexes for table `cusc_hoadonsi`
--
ALTER TABLE `cusc_hoadonsi`
  ADD PRIMARY KEY (`hds_ma`),
  ADD KEY `cusc_hoadonsi_dh_ma_foreign` (`dh_ma`),
  ADD KEY `cusc_hoadonsi_nv_laphoadon_foreign` (`nv_lapHoaDon`),
  ADD KEY `cusc_hoadonsi_nv_thutruong_foreign` (`nv_thuTruong`),
  ADD KEY `cusc_hoadonsi_tt_ma_foreign` (`tt_ma`);

--
-- Indexes for table `cusc_khachhang`
--
ALTER TABLE `cusc_khachhang`
  ADD PRIMARY KEY (`kh_ma`),
  ADD UNIQUE KEY `cusc_khachhang_kh_taikhoan_kh_email_kh_dienthoai_unique` (`kh_taiKhoan`,`kh_email`,`kh_dienThoai`);

--
-- Indexes for table `cusc_khuyenmai`
--
ALTER TABLE `cusc_khuyenmai`
  ADD PRIMARY KEY (`km_ma`),
  ADD UNIQUE KEY `cusc_khuyenmai_km_ten_unique` (`km_ten`),
  ADD KEY `cusc_khuyenmai_nv_kyduyet_foreign` (`nv_kyDuyet`),
  ADD KEY `cusc_khuyenmai_nv_kynhay_foreign` (`nv_kyNhay`),
  ADD KEY `cusc_khuyenmai_nv_nguoilap_foreign` (`nv_nguoiLap`);

--
-- Indexes for table `cusc_khuyenmai_sanpham`
--
ALTER TABLE `cusc_khuyenmai_sanpham`
  ADD PRIMARY KEY (`km_ma`,`sp_ma`,`m_ma`),
  ADD KEY `cusc_khuyenmai_sanpham_m_ma_foreign` (`m_ma`),
  ADD KEY `cusc_khuyenmai_sanpham_sp_ma_foreign` (`sp_ma`);

--
-- Indexes for table `cusc_loai`
--
ALTER TABLE `cusc_loai`
  ADD PRIMARY KEY (`l_ma`),
  ADD UNIQUE KEY `cusc_loai_l_ten_unique` (`l_ten`);

--
-- Indexes for table `cusc_mau`
--
ALTER TABLE `cusc_mau`
  ADD PRIMARY KEY (`m_ma`),
  ADD UNIQUE KEY `cusc_mau_m_ten_unique` (`m_ten`);

--
-- Indexes for table `cusc_mau_sanpham`
--
ALTER TABLE `cusc_mau_sanpham`
  ADD PRIMARY KEY (`sp_ma`,`m_ma`),
  ADD KEY `cusc_mau_sanpham_m_ma_foreign` (`m_ma`);

--
-- Indexes for table `cusc_nhacungcap`
--
ALTER TABLE `cusc_nhacungcap`
  ADD PRIMARY KEY (`ncc_ma`),
  ADD UNIQUE KEY `cusc_nhacungcap_ncc_ten_ncc_dienthoai_ncc_email_unique` (`ncc_ten`,`ncc_dienThoai`,`ncc_email`),
  ADD KEY `cusc_nhacungcap_xx_ma_foreign` (`xx_ma`);

--
-- Indexes for table `cusc_nhanvien`
--
ALTER TABLE `cusc_nhanvien`
  ADD PRIMARY KEY (`nv_ma`),
  ADD UNIQUE KEY `cusc_nhanvien_nv_taikhoan_nv_email_nv_dienthoai_unique` (`nv_taiKhoan`,`nv_email`,`nv_dienThoai`),
  ADD KEY `cusc_nhanvien_q_ma_foreign` (`q_ma`);

--
-- Indexes for table `cusc_phieunhap`
--
ALTER TABLE `cusc_phieunhap`
  ADD PRIMARY KEY (`pn_ma`),
  ADD UNIQUE KEY `cusc_phieunhap_pn_sohoadon_unique` (`pn_soHoaDon`),
  ADD KEY `cusc_phieunhap_ncc_ma_foreign` (`ncc_ma`),
  ADD KEY `cusc_phieunhap_nv_ketoan_foreign` (`nv_keToan`),
  ADD KEY `cusc_phieunhap_nv_nguoilapphieu_foreign` (`nv_nguoiLapPhieu`),
  ADD KEY `cusc_phieunhap_nv_thukho_foreign` (`nv_thuKho`);

--
-- Indexes for table `cusc_quyen`
--
ALTER TABLE `cusc_quyen`
  ADD PRIMARY KEY (`q_ma`),
  ADD UNIQUE KEY `cusc_quyen_q_ten_unique` (`q_ten`);

--
-- Indexes for table `cusc_sanpham`
--
ALTER TABLE `cusc_sanpham`
  ADD PRIMARY KEY (`sp_ma`),
  ADD UNIQUE KEY `cusc_sanpham_sp_ten_unique` (`sp_ten`),
  ADD KEY `cusc_sanpham_l_ma_foreign` (`l_ma`);

--
-- Indexes for table `cusc_thanhtoan`
--
ALTER TABLE `cusc_thanhtoan`
  ADD PRIMARY KEY (`tt_ma`),
  ADD UNIQUE KEY `cusc_thanhtoan_tt_ten_unique` (`tt_ten`);

--
-- Indexes for table `cusc_vanchuyen`
--
ALTER TABLE `cusc_vanchuyen`
  ADD PRIMARY KEY (`vc_ma`),
  ADD UNIQUE KEY `cusc_vanchuyen_vc_ten_unique` (`vc_ten`);

--
-- Indexes for table `cusc_xuatxu`
--
ALTER TABLE `cusc_xuatxu`
  ADD PRIMARY KEY (`xx_ma`),
  ADD UNIQUE KEY `cusc_xuatxu_xx_ten_unique` (`xx_ten`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cusc_chude`
--
ALTER TABLE `cusc_chude`
  MODIFY `cd_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã chủ đề', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cusc_doanhthu_sanpham`
--
ALTER TABLE `cusc_doanhthu_sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cusc_donhang`
--
ALTER TABLE `cusc_donhang`
  MODIFY `dh_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng, 1-Không xuất hóa đơn', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cusc_gopy`
--
ALTER TABLE `cusc_gopy`
  MODIFY `gy_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã góp ý', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cusc_hoadonle`
--
ALTER TABLE `cusc_hoadonle`
  MODIFY `hdl_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã hóa đơn bán lẻ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cusc_hoadonsi`
--
ALTER TABLE `cusc_hoadonsi`
  MODIFY `hds_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã hóa đơn bán sỉ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cusc_khachhang`
--
ALTER TABLE `cusc_khachhang`
  MODIFY `kh_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cusc_khuyenmai`
--
ALTER TABLE `cusc_khuyenmai`
  MODIFY `km_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã chương trình khuyến mãi', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cusc_loai`
--
ALTER TABLE `cusc_loai`
  MODIFY `l_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã loại sản phẩm', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cusc_mau`
--
ALTER TABLE `cusc_mau`
  MODIFY `m_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã màu sản phẩm, 1-Phối màu (đỏ, vàng, ...)', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cusc_nhacungcap`
--
ALTER TABLE `cusc_nhacungcap`
  MODIFY `ncc_ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã nhà cung cấp, 1-Tự tạo', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cusc_nhanvien`
--
ALTER TABLE `cusc_nhanvien`
  MODIFY `nv_ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã nhân viên, 1-chưa phân công', AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `cusc_phieunhap`
--
ALTER TABLE `cusc_phieunhap`
  MODIFY `pn_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã phiếu nhập', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cusc_quyen`
--
ALTER TABLE `cusc_quyen`
  MODIFY `q_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cusc_sanpham`
--
ALTER TABLE `cusc_sanpham`
  MODIFY `sp_ma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cusc_thanhtoan`
--
ALTER TABLE `cusc_thanhtoan`
  MODIFY `tt_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã phương thức thanh toán', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cusc_vanchuyen`
--
ALTER TABLE `cusc_vanchuyen`
  MODIFY `vc_ma` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã dịch vụ giao hàng', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cusc_xuatxu`
--
ALTER TABLE `cusc_xuatxu`
  MODIFY `xx_ma` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã xuất xứ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cusc_chitietdonhang`
--
ALTER TABLE `cusc_chitietdonhang`
  ADD CONSTRAINT `cusc_chitietdonhang_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `cusc_donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_chitietdonhang_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `cusc_mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_chitietdonhang_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_chitietnhap`
--
ALTER TABLE `cusc_chitietnhap`
  ADD CONSTRAINT `cusc_chitietnhap_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `cusc_mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_chitietnhap_pn_ma_foreign` FOREIGN KEY (`pn_ma`) REFERENCES `cusc_phieunhap` (`pn_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_chitietnhap_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_chude_sanpham`
--
ALTER TABLE `cusc_chude_sanpham`
  ADD CONSTRAINT `cusc_chude_sanpham_cd_ma_foreign` FOREIGN KEY (`cd_ma`) REFERENCES `cusc_chude` (`cd_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_chude_sanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_doanhthu_sanpham`
--
ALTER TABLE `cusc_doanhthu_sanpham`
  ADD CONSTRAINT `cusc_doanhthu_sanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_donhang`
--
ALTER TABLE `cusc_donhang`
  ADD CONSTRAINT `cusc_donhang_kh_ma_foreign` FOREIGN KEY (`kh_ma`) REFERENCES `cusc_khachhang` (`kh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_donhang_nv_giaohang_foreign` FOREIGN KEY (`nv_giaoHang`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_donhang_nv_xuly_foreign` FOREIGN KEY (`nv_xuLy`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_donhang_tt_ma_foreign` FOREIGN KEY (`tt_ma`) REFERENCES `cusc_thanhtoan` (`tt_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_donhang_vc_ma_foreign` FOREIGN KEY (`vc_ma`) REFERENCES `cusc_vanchuyen` (`vc_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_gopy`
--
ALTER TABLE `cusc_gopy`
  ADD CONSTRAINT `cusc_gopy_kh_ma_foreign` FOREIGN KEY (`kh_ma`) REFERENCES `cusc_khachhang` (`kh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_gopy_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_hinhanh`
--
ALTER TABLE `cusc_hinhanh`
  ADD CONSTRAINT `cusc_hinhanh_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_hoadonle`
--
ALTER TABLE `cusc_hoadonle`
  ADD CONSTRAINT `cusc_hoadonle_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `cusc_donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_hoadonle_nv_laphoadon_foreign` FOREIGN KEY (`nv_lapHoaDon`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_hoadonsi`
--
ALTER TABLE `cusc_hoadonsi`
  ADD CONSTRAINT `cusc_hoadonsi_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `cusc_donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_hoadonsi_nv_laphoadon_foreign` FOREIGN KEY (`nv_lapHoaDon`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_hoadonsi_nv_thutruong_foreign` FOREIGN KEY (`nv_thuTruong`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_hoadonsi_tt_ma_foreign` FOREIGN KEY (`tt_ma`) REFERENCES `cusc_thanhtoan` (`tt_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_khuyenmai`
--
ALTER TABLE `cusc_khuyenmai`
  ADD CONSTRAINT `cusc_khuyenmai_nv_kyduyet_foreign` FOREIGN KEY (`nv_kyDuyet`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_khuyenmai_nv_kynhay_foreign` FOREIGN KEY (`nv_kyNhay`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_khuyenmai_nv_nguoilap_foreign` FOREIGN KEY (`nv_nguoiLap`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_khuyenmai_sanpham`
--
ALTER TABLE `cusc_khuyenmai_sanpham`
  ADD CONSTRAINT `cusc_khuyenmai_sanpham_km_ma_foreign` FOREIGN KEY (`km_ma`) REFERENCES `cusc_khuyenmai` (`km_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_khuyenmai_sanpham_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `cusc_mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_khuyenmai_sanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_mau_sanpham`
--
ALTER TABLE `cusc_mau_sanpham`
  ADD CONSTRAINT `cusc_mau_sanpham_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `cusc_mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_mau_sanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `cusc_sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_nhacungcap`
--
ALTER TABLE `cusc_nhacungcap`
  ADD CONSTRAINT `cusc_nhacungcap_xx_ma_foreign` FOREIGN KEY (`xx_ma`) REFERENCES `cusc_xuatxu` (`xx_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_nhanvien`
--
ALTER TABLE `cusc_nhanvien`
  ADD CONSTRAINT `cusc_nhanvien_q_ma_foreign` FOREIGN KEY (`q_ma`) REFERENCES `cusc_quyen` (`q_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_phieunhap`
--
ALTER TABLE `cusc_phieunhap`
  ADD CONSTRAINT `cusc_phieunhap_ncc_ma_foreign` FOREIGN KEY (`ncc_ma`) REFERENCES `cusc_nhacungcap` (`ncc_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_phieunhap_nv_ketoan_foreign` FOREIGN KEY (`nv_keToan`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_phieunhap_nv_nguoilapphieu_foreign` FOREIGN KEY (`nv_nguoiLapPhieu`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cusc_phieunhap_nv_thukho_foreign` FOREIGN KEY (`nv_thuKho`) REFERENCES `cusc_nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cusc_sanpham`
--
ALTER TABLE `cusc_sanpham`
  ADD CONSTRAINT `cusc_sanpham_l_ma_foreign` FOREIGN KEY (`l_ma`) REFERENCES `cusc_loai` (`l_ma`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
