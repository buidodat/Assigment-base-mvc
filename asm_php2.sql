-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 31, 2024 lúc 02:22 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm_php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ma_dm` int(11) NOT NULL,
  `ten_dm` varchar(30) NOT NULL,
  `slogan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ma_dm`, `ten_dm`, `slogan`) VALUES
(1, 'Hoa Trang Trí', 'Trang trí siêu đẹp'),
(2, 'Hoa Tình Yêu', 'Tặng bạn đời nhân ngày đặc biệt'),
(3, 'Hoa Khai Trương', 'Phát lộc phát tài'),
(4, 'Hoa Lễ Tang', 'Chia buồn cùng gia đình ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ma_dh` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL,
  `ten_nguoi_nhan` varchar(50) NOT NULL,
  `email_nguoi_nhan` varchar(50) NOT NULL,
  `sdt_nguoi_nhan` varchar(13) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `da_thanh_toan` int(11) NOT NULL DEFAULT 0,
  `ngay_dat_hang` date NOT NULL DEFAULT current_timestamp(),
  `ghi_chu` text DEFAULT NULL,
  `ma_pttt` int(11) NOT NULL,
  `ma_van_chuyen` int(11) NOT NULL,
  `ma_trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `ma_dhct` int(11) NOT NULL,
  `ma_dh` int(11) NOT NULL,
  `ma_spct` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvivanchuyen`
--

CREATE TABLE `donvivanchuyen` (
  `ma_van_chuyen` int(11) NOT NULL,
  `ten_van_chuyen` varchar(50) NOT NULL,
  `gia_van_chuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvivanchuyen`
--

INSERT INTO `donvivanchuyen` (`ma_van_chuyen`, `ten_van_chuyen`, `gia_van_chuyen`) VALUES
(1, 'Giao Hàng Nhanh', 30000),
(2, 'Giao Hàng Tiết Kiệm', 25000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ma_gh` int(11) NOT NULL,
  `ma_spct` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ma_tk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `ma_pttt` int(11) NOT NULL,
  `phuong_thuc_thanh_toan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`ma_pttt`, `phuong_thuc_thanh_toan`) VALUES
(1, 'Thanh Toán Khi Nhận Hàng (COD)'),
(2, 'Thanh Toán VNPAY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `mo_ta` text NOT NULL,
  `ma_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ma_sp`, `ten_sp`, `hinh`, `mo_ta`, `ma_dm`) VALUES
(1, 'Hoa đoàn viên', '1.jpg', 'Bình hoa Đoàn viên nổi bật với sắc vàng tươi tắn của nụ tầm xuân. Bình hoa thích hợp cho dịp năm mới, tết đến xuân về. ', 2),
(2, 'Hoa Điểm Tô', '2.jpg', 'Lily trắng trong một chiếc bình trang trọng như một lời hỏi thăm ân cần, kính mến trong khi đó những đóa hồng cam lại gợi lên sự phấn khởi, niềm vui mới lạ - một thông điệp với nhiều ý nghĩa thích hợp cho nhiều dịp khác nhau. Sự kết hợp khác lạ và duyên dáng này chắc chắn sẽ gây ấn tượng với một ai đó.', 2),
(3, 'Giọt Nắng Lấp Lánh', '3.jpg', 'Bình hoa là sự phối hợp màu vàng tươi của ánh nắng và màu trắng tinh khiết, như một vũ khúc tình ca đặc sắc, đem đến một không khí đầy tươi vui và ngập tràn yêu thương. Bình hoa thích hợp tặng trong dịp sinh nhật của những người quan trọng trong nhất, cũng có thể là một lời cảm ơn chân thành gửi đến đối tác.', 1),
(4, 'Tươi Sắc Màu', '4.jpg', 'Bình hoa dành cho những cô nàng yêu thích sự nhẹ nhàng. Bó hoa mang một vẻ đẹp tinh tế khó cưỡng, kết hợp một cách khéo léo giữa hoa hồng nhiều màu sẽ là món quà tuyệt vời để cùng mê đắm những điều nhẹ nhàng, thanh khiết. Còn chần chờ gì nữa mà không chọn thiết kế mà các nàng thích nhất đi nào.', 1),
(5, 'Ngày Hạnh Phúc', '5.jpg', 'Ngọt ngào, lãng mạn và dễ thương, bó hoa cầm tay được dựa trên cảm hứng từ những câu chuyện tình trẻ trung, đáng yêu và đầy nhiệt huyết. Tông màu pastel đáng yêu sẽ góp phần tô thêm màu sắc hạnh phúc vào đám cưới của bạn đấy.', 1),
(6, 'Món Quà Tình Yêu', '6.jpg', 'Nếu thuộc tuýp người thích đơn giản, lãng mạn, thì đây chính là món quà thích hợp nhất bạn có thể gửi tặng người ấy. Hộp hoa là sự kết hợp đầy lãng mạn của hoa hồng được xếp ngay ngắn và tô điểm thêm hoa baby trắng xung quanh, và đặc biệt hơn là một hộp bánh nhỏ được thiết kế ngay chính giữa  thay  lời yêu thì thầm nhỏ nhẹ nhưng đầy chân thành của bạn dành cho người ấy.', 1),
(7, 'New Energy', '7.jpg', 'Tượng trưng cho niềm vui, hạnh phúc và may mắn, hoa mao lương màu vàng cam là lựa chọn hoàn hảo để tặng người thân vào bất cứ dịp nào trong năm. Bó hoa là sự lựa chọn phù hợp để gửi tặng những cô nàng có cá tính mạnh mẽ. ', 1),
(8, 'Du Dương', '8.jpg', 'Bó hoa Du Dương được thiết kế từ 30 bông hồng Juliet kết hợp cùng với các loại hoa lá phụ trang trí. ', 1),
(9, 'Tinh Thuần', '9.jpg', 'Những sắc trắng từ những loài hoa khác nhau đan xen tạo nên một bình hoa trang trọng nhưng không hề nhàm chán nhờ sự kết hợp và sắp xếp chuyên nghiệp. Bình hoa là lựa chọn hoàn hảo dành tặng cho người yêu sắc trắng tinh khôi, thanh khiết.', 1),
(10, 'Hoa bỉ ngạn', 'Ảnh chụp màn hình 2023-09-05 202653.png', '', 1),
(11, 'Bỉ ngạn hồng ', 'Ảnh chụp màn hình 2023-09-07 002416.png', '', 1),
(12, 'Bỉ ngạn vàng , vĩnh viên ko gặp lại ', 'Ảnh chụp màn hình 2023-09-14 101513.png', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamchitiet`
--

CREATE TABLE `sanphamchitiet` (
  `ma_spct` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ma_vl` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `giam_gia` int(11) NOT NULL DEFAULT 0,
  `so_luong` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamchitiet`
--

INSERT INTO `sanphamchitiet` (`ma_spct`, `ma_sp`, `ma_vl`, `don_gia`, `giam_gia`, `so_luong`, `trang_thai`) VALUES
(1, 1, 2, 500000, 100000, 50, 1),
(2, 1, 3, 600000, 150000, 50, 1),
(3, 1, 3, 700000, 170000, 50, 1),
(4, 2, 1, 800000, 200000, 50, 1),
(5, 3, 3, 750000, 150000, 50, 1),
(6, 4, 1, 850000, 220000, 50, 1),
(7, 5, 3, 770000, 140000, 50, 1),
(8, 6, 1, 890000, 259000, 50, 1),
(9, 7, 1, 990000, 199000, 50, 1),
(10, 8, 1, 450000, 50000, 50, 1),
(11, 9, 3, 550000, 30000, 50, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ma_tk` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `sdt` varchar(13) NOT NULL,
  `mat_khau` varchar(26) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `cap_bac` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `ma_trang_thai` int(11) NOT NULL,
  `trang_thai_don_hang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vatlieu`
--

CREATE TABLE `vatlieu` (
  `ma_vl` int(11) NOT NULL,
  `vat_lieu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vatlieu`
--

INSERT INTO `vatlieu` (`ma_vl`, `vat_lieu`) VALUES
(1, 'Kim loại'),
(2, 'Sợi tổng hợp'),
(3, 'Nhựa Polyester'),
(4, 'Cao su');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `ma_pttt` (`ma_pttt`),
  ADD KEY `ma_tk` (`ma_tk`),
  ADD KEY `ma_trang_thai` (`ma_trang_thai`),
  ADD KEY `ma_van_chuyen` (`ma_van_chuyen`);

--
-- Chỉ mục cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`ma_dhct`),
  ADD KEY `ma_dh` (`ma_dh`),
  ADD KEY `ma_spct` (`ma_spct`);

--
-- Chỉ mục cho bảng `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  ADD PRIMARY KEY (`ma_van_chuyen`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ma_gh`),
  ADD KEY `ma_spct` (`ma_spct`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Chỉ mục cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`ma_pttt`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_dm` (`ma_dm`);

--
-- Chỉ mục cho bảng `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  ADD PRIMARY KEY (`ma_spct`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ma_tk`);

--
-- Chỉ mục cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`ma_trang_thai`);

--
-- Chỉ mục cho bảng `vatlieu`
--
ALTER TABLE `vatlieu`
  ADD PRIMARY KEY (`ma_vl`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ma_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ma_dh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `ma_dhct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donvivanchuyen`
--
ALTER TABLE `donvivanchuyen`
  MODIFY `ma_van_chuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ma_gh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `ma_pttt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  MODIFY `ma_spct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ma_tk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  MODIFY `ma_trang_thai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vatlieu`
--
ALTER TABLE `vatlieu`
  MODIFY `ma_vl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`ma_pttt`) REFERENCES `phuongthucthanhtoan` (`ma_pttt`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`ma_trang_thai`) REFERENCES `trangthaidonhang` (`ma_trang_thai`),
  ADD CONSTRAINT `donhang_ibfk_4` FOREIGN KEY (`ma_van_chuyen`) REFERENCES `donvivanchuyen` (`ma_van_chuyen`);

--
-- Các ràng buộc cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD CONSTRAINT `donhangchitiet_ibfk_1` FOREIGN KEY (`ma_dh`) REFERENCES `donhang` (`ma_dh`),
  ADD CONSTRAINT `donhangchitiet_ibfk_2` FOREIGN KEY (`ma_spct`) REFERENCES `sanphamchitiet` (`ma_spct`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`ma_spct`) REFERENCES `sanphamchitiet` (`ma_spct`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ma_dm`) REFERENCES `danhmuc` (`ma_dm`);

--
-- Các ràng buộc cho bảng `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  ADD CONSTRAINT `sanphamchitiet_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
