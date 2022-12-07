-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 26, 2022 lúc 11:29 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lrv8`
--



CREATE DATABASE `QLBH` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use QLBH;
-- --------------------------------------------------------
CREATE TABLE `products` (
  `id` int(11) PRIMARY KEY NOT NULL ,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float(10,3) NOT NULL,
  `sale_price` float(10,3) DEFAULT 0.000,
  `category_id` int(11) NOT NULL,
  `user_id` int NOT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Áo Nam', 0, '2022-07-25 16:14:20', NULL),
(2, 'Áo Nữ', 1, '2022-07-25 16:14:20', NULL),
(18, 'Áo dài', 1, '2022-07-26 00:54:26', '2022-07-26 00:54:26'),
(19, 'Áo Ngắn', 0, '2022-07-26 00:54:37', '2022-07-26 00:54:37'),
(20, 'Quần Âu', 0, '2022-07-26 00:54:47', '2022-07-26 01:28:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float(10,3) NOT NULL,
  `sale_price` float(10,3) DEFAULT 0.000,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `sale_price`, `category_id`, `status`, `content`, `created_at`, `updated_at`) VALUES
(3, 'ao 1', 'aaaa', 12121.000, 121.000, 1, 0, '1312312', '2022-07-26 08:39:18', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE IF NOT EXISTS `users` (
  `id` INT PRIMARY KEY  AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  `remember_token` VARCHAR(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB;
INSERT INTO users(name,email,password) VALUES
('Admin','admin@gmail.com','$2y$10$XD3hzE5yDT3foNQRmLjeJ.EoWzgmhHOJhASHrASrkOBBlTfeL82By');

CREATE TABLE IF NOT EXISTS `customers` (
  `id` INT PRIMARY KEY  AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL ,
  `address`  VARCHAR(100) NOT NULL UNIQUE,
  `gender`  tinyint DEFAULT '1',
  `phone`    VARCHAR(50) NOT NULL UNIQUE,
  `remember_token` VARCHAR(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB;
INSERT INTO customers(name,email,password,address,phone) VALUES
('Trinh','customer@gmail.com','$2y$10$XD3hzE5yDT3foNQRmLjeJ.EoWzgmhHOJhASHrASrkOBBlTfeL82By','Hai Phong','0123456789');

