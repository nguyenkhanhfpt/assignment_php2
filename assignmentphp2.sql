-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 05, 2020 lúc 03:18 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignmentphp2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `maBinhLuan` int(11) NOT NULL,
  `maNguoiDungBinhLuan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `noiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `maSanPham` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ngayBinhLuan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`maBinhLuan`, `maNguoiDungBinhLuan`, `noiDung`, `maSanPham`, `ngayBinhLuan`) VALUES
(1, 'khanh', 'haha', 'iphone-11-64gb', '2020-02-28 14:20:11'),
(3, 'khanh', 'haha', 'iphone-11-pro-64gb', '2020-02-28 19:51:25'),
(4, 'khanh', 'còn hàng không ạ', 'samsung-galaxy-a70', '2020-03-01 13:38:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `maChiTietDonHang` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `maSanPham` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `soLuongMua` int(11) NOT NULL,
  `soTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maChiTietDonHang`, `maHoaDon`, `maSanPham`, `soLuongMua`, `soTien`) VALUES
(91, 781102331, 'iphone-11-pro-64gb', 1, 29400000),
(92, 781102331, 'oppo-a5-2020-3gb-64gb', 1, 3790500),
(93, 53826671, 'iphone-xs-64gb', 1, 20900000),
(94, 836713102, 'oppo-a5-2020-3gb-64gb', 1, 3790500),
(98, 676562583, 'samsung-galaxy-a70', 1, 8825500),
(99, 935284217, 'oppo-a5-2020-3gb-64gb', 4, 15162000),
(100, 638103964, 'iphone-7-plus-32gb', 11, 114846000),
(101, 54738822, 'iphone-8-plus-64gb', 1, 15990000),
(108, 842331804, 'oppo-a9-2020', 1, 5990000),
(109, 331716900, 'iphone-8-plus-64gb', 1, 15990000),
(110, 331716900, 'iphone-11-64gb', 1, 19950000),
(111, 331716900, 'huawei-y9-prime-(2019)', 1, 4390000),
(112, 331716900, 'iphone-11-pro-64gb', 2, 58800000),
(118, 873536823, 'iphone-xs-64gb', 1, 20900000),
(119, 873536823, 'samsung-galaxy-note-10', 1, 20990000),
(120, 154124079, 'samsung-galaxy-s10e', 1, 10990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maNguoiDung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngayMua` date NOT NULL DEFAULT current_timestamp(),
  `thoiGianMua` datetime NOT NULL DEFAULT current_timestamp(),
  `trangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`maHoaDon`, `maNguoiDung`, `ngayMua`, `thoiGianMua`, `trangThai`) VALUES
(53826671, 'khanh', '2020-02-24', '2020-02-24 07:18:19', 1),
(54738822, 'khanh', '2020-02-29', '2020-03-01 10:19:11', 1),
(154124079, 'khanh', '2020-03-05', '2020-03-05 20:59:29', 1),
(331716900, 'nguyenkhanh', '2020-03-05', '2020-03-05 19:46:06', 1),
(638103964, 'khanh1234', '2020-02-29', '2020-03-01 14:27:20', 1),
(676562583, 'khanh', '2020-03-29', '2020-03-01 16:14:20', 1),
(781102331, 'khanh', '2020-02-24', '2020-02-24 20:14:20', 1),
(836713102, 'khanh', '2020-02-06', '2020-02-06 15:18:20', 1),
(842331804, 'khanh', '2020-03-03', '2020-03-03 15:55:24', 1),
(873536823, 'nguyenkhanh', '2020-03-05', '2020-03-05 20:54:27', 1),
(935284217, 'khanh', '2020-03-29', '2020-03-01 11:14:20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `maNguoiDung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tenNguoiDung` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` text COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `anhNguoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`maNguoiDung`, `tenNguoiDung`, `email`, `soDienThoai`, `diaChi`, `matKhau`, `gioiTinh`, `anhNguoiDung`, `quyen`) VALUES
('khanh', 'Nguyen Khanh', 'khanh26122000@gmail.com', '0868003428', '54/82 Nguyễn Lương Bằng', '$2y$10$FfXUFSW.IfaC3/tuvuCZFu/JwyiIVqrS6ORCIKZusrOoqh1RQMftG', 'Nam', '79086051_1097399663959539_1492013755356151808_n.jpg', 1),
('khanh1234', 'Nguyễn Văn An', 'khanh26122000@gmail.com', '0868003428', '54/82 Nguyễn Lương Bằng', '$2y$10$GB4fjp21PHviFcfOIfh2VetF7lDUZax6FgyDOvez9183YyKikfsli', 'Nam', '80578807_514848325905982_6259964874583965696_n.jpg', 0),
('nguyenkhanh', 'Nguyen Khanh', 'khanhnpd02983@fpt.edu.vn', '0868003428', '54/82 Nguyễn Lương Bằng, Liên Chiểu, Đà Nẵng', '$2y$10$267LoAvc9AeznvuudOEqBetynTitxbhCjLgYYIhYmPmhWDHvk8YkW', 'Nam', 'user.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `maThuongHieu` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tenSanPham` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `giaSanPham` float NOT NULL,
  `giamGia` float NOT NULL,
  `soLuong` int(11) NOT NULL,
  `anhSanPham` text COLLATE utf8_unicode_ci NOT NULL,
  `soLuotXem` int(11) NOT NULL,
  `ngayNhap` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `maThuongHieu`, `tenSanPham`, `giaSanPham`, `giamGia`, `soLuong`, `anhSanPham`, `soLuotXem`, `ngayNhap`) VALUES
('huawei-y9-prime-(2019)', 'hua', 'Huawei Y9 Prime (2019)', 4390000, 0, 26, '637008531190266651_huawei-y9-prime-xanh-1.png', 4, '2020-03-01'),
('iphone-11-64gb', 'ip', 'iPhone 11 64GB', 21000000, 5, 45, 'ip11.png', 20, '2020-02-22'),
('iphone-11-pro-64gb', 'ip', 'iPhone 11 Pro 64GB', 30000000, 2, 28, '11-pro-xanh.png', 11, '2020-02-17'),
('iphone-7-plus-32gb', 'ip', 'iPhone 7 Plus 32GB', 10990000, 5, 30, 'ip7-plus-den-1.png', 32, '2020-03-01'),
('iphone-8-plus-64gb', 'ip', 'iPhone 8 Plus 64GB', 15990000, 0, 28, 'iphone8-plus-64-vang-1.png', 10, '2020-03-01'),
('iphone-x', 'ip', 'iPhone Xs', 19990000, 10, 40, 'ip_x.jpg', 14, '2020-03-01'),
('iphone-xs-64gb', 'ip', 'iPhone Xs 64GB', 20900000, 0, 29, 'iPhone-Xs-Max-gold.png', 11, '2020-02-22'),
('nokia-2.2-2gb-16gb', 'no', 'Nokia 2.2 2GB/16GB', 1700000, 0, 30, 'nokia-22-den-1.png', 4, '2020-02-22'),
('oppo-a31-4gb-128gb', 'op', 'Oppo A31 4GB-128GB', 4900000, 0, 0, '637184862253078498_oppo-a31-trang-1.png', 14, '2020-03-01'),
('oppo-a5-2020-3gb-64gb', 'op', 'Oppo A5 2020 3GB-64GB', 3990000, 5, 26, 'oppoa5.png', 7, '2020-02-20'),
('oppo-a9-2020', 'op', 'Oppo A9 2020', 5990000, 0, 48, '637185093476652805_oppo-a9-tim-1.png', 8, '2020-03-01'),
('samsung-galaxy-a70', 'sam', 'Samsung Galaxy A70', 9290000, 5, 39, '636907475981220637_samsung-galaxy-a70-den-1.png', 8, '2020-03-01'),
('samsung-galaxy-note-10', 'sam', 'Samsung Galaxy Note 10', 20990000, 0, 39, '637008563147812737_SS-note-10-den-1.png', 5, '2020-03-01'),
('samsung-galaxy-s10e', 'sam', 'Samsung Galaxy S10e', 10990000, 0, 29, 's10e.png', 2, '2020-02-22'),
('vivo-u10-4gb-64gb', 'vi', 'Vivo U10 4GB-64GB', 3790000, 0, 0, '637147814667049735_vivo-u10-den-1.png', 7, '2020-03-01'),
('vsmart-active-3-4gb-64gb', 'vin', 'Vsmart Active 3 4GB-64GB', 3500000, 5, 40, 'Vsmart-active-3-xanh-1.png', 3, '2020-03-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsosanpham`
--

CREATE TABLE `thongsosanpham` (
  `maThongSo` int(11) NOT NULL,
  `maSanPham` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `manHinh` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `camera` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ram` int(5) NOT NULL,
  `boNho` int(10) NOT NULL,
  `heDieuHanh` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `chip` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongsosanpham`
--

INSERT INTO `thongsosanpham` (`maThongSo`, `maSanPham`, `manHinh`, `camera`, `ram`, `boNho`, `heDieuHanh`, `chip`) VALUES
(1, 'iphone-11-pro-64gb', '5.8 inches', '12', 4, 64, 'iOS 13', 'Apple A13 Bionic'),
(9, 'oppo-a5-2020-3gb-64gb', '6.5 inches', '8', 3, 64, 'ColorOS 6.0.1, nền tảng Android 9.0', 'Qualcomm® SnapdragonTM 665, 8, 2.0 GHz'),
(10, 'samsung-galaxy-s10e', '5.8 inches', '10', 6, 128, 'Android 9.0 (Pie)', 'Exynos 9820 8 nhân 64-bit, 8, 2 nhân 2.7 GHz, 2 nhân 2.3 GHz và 4 nhân 1.9 GHz'),
(13, 'nokia-2.2-2gb-16gb', '5.7 inches, HD +, 720 x 1520 Pixels', '13', 2, 16, 'Android 9.0 (Pie)', 'Mediatek MT6761, Quad-Core 64-bit, 2.0 GHz'),
(14, 'iphone-11-64gb', '6.1 inches', '12', 4, 64, 'iOS 13', 'Apple A13 Bionic'),
(15, 'iphone-xs-64gb', '5.8 inches', '7', 4, 64, 'iOS 12', 'Apple A12 Bionic'),
(18, 'iphone-7-plus-32gb', 'Full HD, 1920 x 1080 pixels', '7', 3, 32, 'iOS 11', 'A10, 4 Nhân, 2.3 GHz'),
(19, 'iphone-8-plus-64gb', '5.5 inchs HD Retina', '12', 3, 64, 'iOS 11', 'Apple A11 Bionic'),
(20, 'iphone-x', '5.8 inchs(2436 x 1125 pixel) Super Retina HD', '7', 3, 64, 'iOS 11', 'Apple A11 Bionic'),
(22, 'samsung-galaxy-note-10', '6.3 inches, Full HD+, 1080 x 2280 Pixels', '12', 8, 256, 'Android 9.0 (Pie)', 'Exynos 9825 (7 nm), 8, 2.7 Ghz + 2.4 GHz + 1.9 GHX'),
(23, 'samsung-galaxy-a70', '6.7 inchs, Full HD+, 1080 x 2400 Pixels', '32', 6, 128, 'Android 9.0 (Pie)', 'Snapdragon 675 8 nhân 64-bit, 8, 2 nhân 2.0 Ghz & 6 nhân 1.7 Ghz'),
(24, 'oppo-a9-2020', '6.5 inchs, HD +, 720 x 1600 Pixels', '48', 8, 128, 'ColorOS 6.0.1, nền tảng Android 9.0', 'Qualcomm Snapdragon 665, 8, 8 nhân, tối đa 2.0GHz'),
(25, 'oppo-a31-4gb-128gb', '6.5 inchs, HD +, 720 x 1600 Pixels', '12', 4, 128, 'ColorOS 6.0.1, nền tảng Android 9.0', 'MediaTek MT6765V (hepoli P35), 8, 2.3 GHz'),
(26, 'huawei-y9-prime-(2019)', '6.5 inchs, Full HD, 2340 x 1080 Pixel', '12', 4, 128, 'Android™ 9.0 + EMUI 9.1', 'Hisilicon Kirin 710F, Octa-Core, 4xCortex A73 2.2GHz + 4xCortex A53 1.7GHz'),
(27, 'vivo-u10-4gb-64gb', '6.35 inchs, HD +, 1544 x 720 Pixels', '13', 4, 64, 'Android 9.0 (Pie)', 'Qualcomm Snapdragon 665AIE, 8, 4 nhân 2.0 GHz & 4 nhân 1.8 GHz'),
(28, 'vsmart-active-3-4gb-64gb', '6.39 inchs, Full HD+, 1080 x 2340 Pixels', '48', 4, 64, 'Android 9', 'MediaTek Helio P60 8 nhân, 8, 2.0Ghz');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `maThuongHieu` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `tenThuongHieu` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `anhThuongHieu` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`maThuongHieu`, `tenThuongHieu`, `anhThuongHieu`) VALUES
('hua', 'Huawei', 'logo-Huawei.png'),
('ip', 'Apple', 'logoApple.png'),
('no', 'Nokia', 'nokia.png'),
('op', 'Oppo', 'oppo.jpg'),
('sam', 'Samsung', 'samsung.png'),
('vi', 'Vivo', 'Vivo_logo_2019.svg'),
('vin', 'VsMart', 'logovsmart.png'),
('xi', 'Xiaomi', 'Xiaomi_logo.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`maBinhLuan`),
  ADD KEY `fk_nguoiDungBinhLuan` (`maNguoiDungBinhLuan`),
  ADD KEY `fk_sanPhamBinhLuan` (`maSanPham`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`maChiTietDonHang`),
  ADD KEY `fk_sanPhamMua` (`maSanPham`),
  ADD KEY `fk_hoaDon` (`maHoaDon`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `fk_nguoiMua` (`maNguoiDung`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`maNguoiDung`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `fk_thuongHieu` (`maThuongHieu`);

--
-- Chỉ mục cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  ADD PRIMARY KEY (`maThongSo`),
  ADD KEY `fk_chitietsanpham` (`maSanPham`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`maThuongHieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `maBinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `maChiTietDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  MODIFY `maThongSo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_nguoiDungBinhLuan` FOREIGN KEY (`maNguoiDungBinhLuan`) REFERENCES `nguoidung` (`maNguoiDung`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sanPhamBinhLuan` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_hoaDon` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sanPhamMua` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_nguoiMua` FOREIGN KEY (`maNguoiDung`) REFERENCES `nguoidung` (`maNguoiDung`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_thuongHieu` FOREIGN KEY (`maThuongHieu`) REFERENCES `thuonghieu` (`maThuongHieu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thongsosanpham`
--
ALTER TABLE `thongsosanpham`
  ADD CONSTRAINT `fk_chitietsanpham` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
