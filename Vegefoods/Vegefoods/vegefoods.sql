-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2022 lúc 02:11 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vegefoods`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `binhluan_noidung` text NOT NULL,
  `binhluan_thoigian` text NOT NULL,
  `binhluan_sanpham_id` int(11) NOT NULL,
  `binhluan_taikhoan_id` int(11) NOT NULL,
  `binhluan_taikhoan_ten` varchar(50) NOT NULL,
  `binhluan_taikhoan_id_rep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `loai_id` int(11) NOT NULL,
  `loai_ten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `sanpham_ten` varchar(200) CHARACTER SET utf8 NOT NULL,
  `sanpham_hinhanh` text CHARACTER SET utf8 NOT NULL,
  `sanpham_mieuta` text CHARACTER SET utf8 NOT NULL,
  `sanpham_gia` int(11) NOT NULL,
  `sanpham_giamgia` int(11) DEFAULT NULL,
  `sanpham_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `taikhoan_id` int(11) NOT NULL,
  `taikhoan_ho` varchar(30) NOT NULL,
  `taikhoan_ten` varchar(30) NOT NULL,
  `taikhoan_email` varchar(50) NOT NULL,
  `taikhoan_phone` varchar(11) NOT NULL,
  `taikhoan_matkhau` varchar(150) NOT NULL,
  `taikhoan_diachi` text NOT NULL,
  `taikhoan_chucvu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`taikhoan_id`, `taikhoan_ho`, `taikhoan_ten`, `taikhoan_email`, `taikhoan_phone`, `taikhoan_matkhau`, `taikhoan_diachi`, `taikhoan_chucvu`) VALUES
(0, 'truong', 'song', 'truongthiminhsong2003@gmail.com', '0777451186', '12345', 'Đà Nẵng', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `thongke_id` int(11) NOT NULL,
  `thongke_taikhoan_id` int(11) NOT NULL,
  `thongke_taikhoan_ten` varchar(30) NOT NULL,
  `thongke_taikhoan_diachi` text NOT NULL,
  `thongke_taikhoan_phone` varchar(10) NOT NULL,
  `thongke_sanpham_id` int(11) NOT NULL,
  `thongke_sanpham_ten` varchar(200) NOT NULL,
  `thongke_sanpham_gia` int(11) NOT NULL,
  `thongke_sanpham_soluong` int(11) NOT NULL,
  `thongke_sanpham_thanhtien` int(11) NOT NULL,
  `thongke_thoigian` text NOT NULL,
  `thongke_id_cart` text NOT NULL,
  `thongke_xuli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
