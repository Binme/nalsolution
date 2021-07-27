-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 27, 2021 lúc 01:19 AM
-- Phiên bản máy phục vụ: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.3.28-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nal`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work`
--

CREATE TABLE `work` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `WorkName` varchar(255) NOT NULL,
  `StartingDate` date NOT NULL,
  `EndingDate` date NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `work`
--

INSERT INTO `work` (`id`, `WorkName`, `StartingDate`, `EndingDate`, `Status`) VALUES
(15, 'HelloBeDep2', '2021-07-05', '2021-07-12', 'Doing'),
(18, 'asdasdas', '2021-07-30', '2021-07-31', 'Planning'),
(19, 'Hello', '2021-07-06', '2021-07-20', 'Doing'),
(20, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(21, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(22, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(23, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(24, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(25, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(26, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(27, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing'),
(29, 'HelloBeDep', '2021-07-05', '2021-07-12', 'Doing');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `work`
--
ALTER TABLE `work`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
