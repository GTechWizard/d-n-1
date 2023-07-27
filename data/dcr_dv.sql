-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 21, 2023 lúc 06:33 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dcr_dv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bl`
--

CREATE TABLE `bl` (
  `id_bl` int(10) NOT NULL,
  `id_pk_dv` int(10) NOT NULL,
  `id_pk_user` int(10) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_bl` varchar(50) NOT NULL,
  `danh_gia` int(1) NOT NULL COMMENT 'đánh giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dv`
--

CREATE TABLE `dv` (
  `id_dv` int(10) NOT NULL COMMENT 'id',
  `id_pk_loai` int(10) NOT NULL COMMENT 'mã loại dv',
  `name` varchar(255) NOT NULL COMMENT 'tên dv',
  `diem_den` varchar(255) NOT NULL COMMENT 'Điểm đến(địa điểm <= tin tức)',
  `bai_viet` longblob NOT NULL COMMENT 'bài viết',
  `luot_xem` int(10) NOT NULL DEFAULT 0,
  `img_dv` varchar(255) NOT NULL,
  `noi_bd` varchar(255) NOT NULL COMMENT 'nơi bắt đầu',
  `tong_ng` int(5) NOT NULL COMMENT 'tổng ng 1 tour'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dv`
--

INSERT INTO `dv` (`id_dv`, `id_pk_loai`, `name`, `diem_den`, `bai_viet`, `luot_xem`, `img_dv`, `noi_bd`, `tong_ng`) VALUES
(9, 3, 'vũng tàu', 'vũng tàu', 0x3c703e68656c6c6f3c2f703e, 0, '', 'hcm', 50),
(10, 3, 'chicago', 'chicago', 0x3c703e6e266f636972633b6e6e6f6e6f6e6f6e3c2f703e, 0, '', 'hcm', 100),
(11, 5, 'đà lạt những ngày mưa', 'đà lạt', 0xc3b46920767569207175c3a12078c3a1, 0, '../meo', 'hcm', 20),
(12, 3, 'củ chi', 'hải phòng', 0x3c703e7675692067682665636972633b3c2f703e, 0, '', 'điện biên nam định', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dv_user`
--

CREATE TABLE `dv_user` (
  `id_dv_user` int(10) NOT NULL,
  `id_pk_dv` int(10) NOT NULL,
  `id_pk_user` int(10) NOT NULL,
  `trang_thai` int(1) NOT NULL DEFAULT 0,
  `user_name` varchar(200) NOT NULL,
  `user_sdt` varchar(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `ngay_dkdv` varchar(50) NOT NULL COMMENT 'ngày đk dv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dv_user`
--

INSERT INTO `dv_user` (`id_dv_user`, `id_pk_dv`, `id_pk_user`, `trang_thai`, `user_name`, `user_sdt`, `user_email`, `ngay_dkdv`) VALUES
(8, 9, 1, 1, 'admin', '111', '111', '111/111/1111'),
(10, 9, 2, 0, 'kin', '222', '222', '222/222/2222'),
(14, 10, 2, 0, 'kin', '222', '222', '1212');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `luot_xem` int(255) NOT NULL DEFAULT 0,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_dv`
--

CREATE TABLE `like_dv` (
  `id_like_dv` int(10) NOT NULL COMMENT 'id dv được like',
  `id_pk_user` int(10) NOT NULL COMMENT 'ng ',
  `id_pk_dv` int(10) NOT NULL COMMENT 'dv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id_loai` int(10) NOT NULL COMMENT 'id ',
  `kieu_dv` varchar(255) NOT NULL COMMENT 'kiểu dv(trong, ngoài nước)',
  `img` varchar(255) NOT NULL COMMENT 'ảnh banner'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id_loai`, `kieu_dv`, `img`) VALUES
(3, 'ngoài nước', '../uploads/070929am14072023bread-6486963_1280.jpg'),
(4, 'trên', '1'),
(5, 'trong', '../uploads/081221am14072023ai-generated-7882967_1920.jpg'),
(6, 'sing', '../uploads/101715am14072023fantasy-6018549_1920.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `price_tour`
--

CREATE TABLE `price_tour` (
  `id_price` int(10) NOT NULL COMMENT 'id giá',
  `id_pk_dv` int(10) NOT NULL COMMENT 'mã tour',
  `day_end` varchar(200) NOT NULL COMMENT 'ngày kt',
  `day_start` varchar(200) NOT NULL COMMENT 'ngày bd',
  `price_young` int(30) NOT NULL,
  `price_old` int(30) NOT NULL COMMENT 'giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `price_tour`
--

INSERT INTO `price_tour` (`id_price`, `id_pk_dv`, `day_end`, `day_start`, `price_young`, `price_old`) VALUES
(5, 9, '12/12/2021', '10/12/2020', 1000000, 12000000),
(7, 10, '1/11/1111', '2/12/1000', 1000000, 32000000),
(9, 11, '12/12/2121', '11/11/2121', 120, 50),
(10, 12, '2023-07-06', ' 2023-07-14', 1, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sl_ng_dk_user`
--

CREATE TABLE `sl_ng_dk_user` (
  `id_sl` int(10) NOT NULL COMMENT 'Mã số lượng người trong tour du lịch của user',
  `id_pk_dv_user` int(10) NOT NULL,
  `id_pk_price_tour` int(10) NOT NULL,
  `so_luong_old` int(5) NOT NULL COMMENT 'số lượng',
  `so_luong_young` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sl_ng_dk_user`
--

INSERT INTO `sl_ng_dk_user` (`id_sl`, `id_pk_dv_user`, `id_pk_price_tour`, `so_luong_old`, `so_luong_young`) VALUES
(11, 8, 5, 3, 2),
(17, 14, 7, 3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tt`
--

CREATE TABLE `tt` (
  `id_tt` int(10) NOT NULL,
  `bai_viet` longblob NOT NULL COMMENT 'bài viết',
  `name` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL COMMENT 'mô tả ngắn',
  `dia_diem` varchar(255) NOT NULL COMMENT 'địa điểm(dv)',
  `tac_gia` varchar(255) NOT NULL COMMENT 'tên tác giả',
  `img_tt` varchar(255) NOT NULL,
  `ngay_d` varchar(50) NOT NULL COMMENT 'ngày đăng bài'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tt`
--

INSERT INTO `tt` (`id_tt`, `bai_viet`, `name`, `mo_ta`, `dia_diem`, `tac_gia`, `img_tt`, `ngay_d`) VALUES
(2, 0x3c703e76756920c491267567726176653b612063267567726176653b6e67206d266567726176653b6f20c491656e2061692063e1baad70206b68266f636972633b6e672076756920c4912661636972633b753c2f703e, 'sa mạc nơi những cái xác biết đi', 'vui hay không vui khi mèo ở bên bạn', 'ai cập', 'kien', '../uploads/050604am17072023fantasy-2543658_1920.jpg', '2023-07-29'),
(8, 0x3c703e6d266567726176653b6f2063c6b0e1bb9d69207675693c2f703e, 'mèo con', 'hay nak no no', 'heo 12 12', 'heo2', '', '2023-07-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL COMMENT 'id',
  `name` varchar(255) NOT NULL COMMENT 'tên',
  `pass` varchar(100) NOT NULL COMMENT 'mk',
  `sdt` varchar(10) NOT NULL COMMENT 'sđt',
  `dia_chi` varchar(255) NOT NULL COMMENT 'địa chỉ',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `img` varchar(255) NOT NULL COMMENT 'ảnh',
  `vai_tro` int(1) NOT NULL DEFAULT 0 COMMENT 'vai trò 1: quản trị viên. 0. khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name`, `pass`, `sdt`, `dia_chi`, `email`, `img`, `vai_tro`) VALUES
(1, 'admin', '111', '111', '111', '111@gmail.com', '111', 1),
(2, 'kin', '222', '222', '222', '222@gmail.com', '222', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bl`
--
ALTER TABLE `bl`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `bl_user` (`id_pk_user`),
  ADD KEY `bl_pk_dv` (`id_pk_dv`);

--
-- Chỉ mục cho bảng `dv`
--
ALTER TABLE `dv`
  ADD PRIMARY KEY (`id_dv`),
  ADD KEY `dv_loai` (`id_pk_loai`);

--
-- Chỉ mục cho bảng `dv_user`
--
ALTER TABLE `dv_user`
  ADD PRIMARY KEY (`id_dv_user`),
  ADD KEY `dv_user_pk_dv` (`id_pk_dv`),
  ADD KEY `dv_user_pk_user` (`id_pk_user`);

--
-- Chỉ mục cho bảng `like_dv`
--
ALTER TABLE `like_dv`
  ADD PRIMARY KEY (`id_like_dv`),
  ADD KEY `like_dv` (`id_pk_dv`),
  ADD KEY `like_user` (`id_pk_user`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `price_tour`
--
ALTER TABLE `price_tour`
  ADD PRIMARY KEY (`id_price`),
  ADD KEY `dv_gia` (`id_pk_dv`);

--
-- Chỉ mục cho bảng `sl_ng_dk_user`
--
ALTER TABLE `sl_ng_dk_user`
  ADD PRIMARY KEY (`id_sl`),
  ADD KEY `sl_dv_user` (`id_pk_dv_user`),
  ADD KEY `sl_price` (`id_pk_price_tour`);

--
-- Chỉ mục cho bảng `tt`
--
ALTER TABLE `tt`
  ADD PRIMARY KEY (`id_tt`),
  ADD KEY `tt_dv` (`id_pk_dv`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bl`
--
ALTER TABLE `bl`
  MODIFY `id_bl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dv`
--
ALTER TABLE `dv`
  MODIFY `id_dv` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `dv_user`
--
ALTER TABLE `dv_user`
  MODIFY `id_dv_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `like_dv`
--
ALTER TABLE `like_dv`
  MODIFY `id_like_dv` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id dv được like';

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id_loai` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id ', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `price_tour`
--
ALTER TABLE `price_tour`
  MODIFY `id_price` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id giá', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sl_ng_dk_user`
--
ALTER TABLE `sl_ng_dk_user`
  MODIFY `id_sl` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Mã số lượng người trong tour du lịch của user', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tt`
--
ALTER TABLE `tt`
  MODIFY `id_tt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bl`
--
ALTER TABLE `bl`
  ADD CONSTRAINT `bl_pk_dv` FOREIGN KEY (`id_pk_dv`) REFERENCES `dv` (`id_dv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bl_user` FOREIGN KEY (`id_pk_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dv`
--
ALTER TABLE `dv`
  ADD CONSTRAINT `dv_loai` FOREIGN KEY (`id_pk_loai`) REFERENCES `loai` (`id_loai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dv_user`
--
ALTER TABLE `dv_user`
  ADD CONSTRAINT `dv_user_pk_dv` FOREIGN KEY (`id_pk_dv`) REFERENCES `dv` (`id_dv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dv_user_pk_user` FOREIGN KEY (`id_pk_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `like_dv`
--
ALTER TABLE `like_dv`
  ADD CONSTRAINT `like_dv` FOREIGN KEY (`id_pk_dv`) REFERENCES `dv` (`id_dv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_user` FOREIGN KEY (`id_pk_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `price_tour`
--
ALTER TABLE `price_tour`
  ADD CONSTRAINT `dv_gia` FOREIGN KEY (`id_pk_dv`) REFERENCES `dv` (`id_dv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sl_ng_dk_user`
--
ALTER TABLE `sl_ng_dk_user`
  ADD CONSTRAINT `sl_dv_user` FOREIGN KEY (`id_pk_dv_user`) REFERENCES `dv_user` (`id_dv_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sl_price` FOREIGN KEY (`id_pk_price_tour`) REFERENCES `price_tour` (`id_price`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tt`
--
ALTER TABLE `tt`
  ADD CONSTRAINT `tt_dv` FOREIGN KEY (`id_pk_dv`) REFERENCES `dv` (`id_dv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
