-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2022 lúc 11:54 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbquanlyao1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(10) NOT NULL,
  `id_categories` int(10) NOT NULL,
  `blog_name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_user` int(10) NOT NULL,
  `id_product_detail` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(10) NOT NULL,
  `id_parent` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_categories`, `id_parent`, `category_name`, `status`) VALUES
(1, 1, 'Áo nam', 1),
(2, 2, 'Áo Nữ', 1),
(3, 1, 'Áo nam tay ngắn', 1),
(4, 1, 'Áo nam tay dài', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_product_detail` int(10) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id_order` int(50) NOT NULL,
  `id_user` int(10) NOT NULL,
  `price_total` double NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(10) NOT NULL,
  `id_product_detail` int(10) NOT NULL,
  `price_sale` double NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(10) NOT NULL,
  `id_categories` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id_product_detail` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `price` double NOT NULL,
  `remaining` int(10) NOT NULL,
  `voucher_code` varchar(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slider` int(10) NOT NULL,
  `slider_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `avatar` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `email`, `password`, `address`, `phone`, `avatar`, `gender`, `role`, `status`) VALUES
(1, 'hieu1', 'hieu1@gmail.com', '123', 'ho chi minh', '12354222', '', '', '0', 1),
(2, 'hieu2', 'hieu2@gmail.com', '$2y$10$CfDkfOMNPcHpeyVbnmo3TOUjfIh.5XGXh4s4ebwVYeKCbQmsdHsqe', 'Ho Chi Minh', '0378209266', 'UNDONE', '', '0', 1),
(3, 'hieu3', 'hieu3@gmail.com', '$2y$10$rvGFvTGYlxaR/rz9s08dmuLteGlitoD4WadUaYcTwSRgcJEwRHcYm', 'Ho Chi Minh', '0378209266', 'UNDONE', '', '0', 1),
(4, 'hieu4', 'hieu4@gmail.com', '$2y$10$k1wXF/12HsgUp3g8J9G9gutjMLJdOs7YeIFntIk.gNG2/tm3si3te', 'Ho Chi Minh', '0378209266', 'UNDONE', '', '0', 1),
(5, 'hieu5', 'hieu5@gmail.com', '$2y$10$hm19rM2KovxUQBNbSAH/LeEJ41tGhjZLs40tAaj1U/yU3Lv/.C6De', 'Ho Chi Minh', '0378209266', 'UNDONE', '', 'user', 1),
(8, '123', '123@123', '$2y$10$1gUeDoW224d7LvLthuiaT.soevnJqZ35jfRkt4x7PKjtzasrWqLjO', '1', '1', 'UNDONE', 'male', 'user', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id_voucher` int(10) NOT NULL,
  `vocher_code` varchar(50) NOT NULL,
  `condition_price` double NOT NULL,
  `price_sale` double NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `blog_categories_fk` (`id_categories`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `cart_user_fk` (`id_user`),
  ADD KEY `cart_product_detail_fk` (`id_product_detail`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`),
  ADD KEY `category_category_fk` (`id_parent`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `comment_user_fk` (`id_user`),
  ADD KEY `comment_product_detail_fk` (`id_product_detail`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `order_user_fk` (`id_user`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_detail_order_fk` (`id_order`),
  ADD KEY `order_detail_product_detail_fk` (`id_product_detail`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `product_categories_fk` (`id_categories`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id_product_detail`),
  ADD KEY `product_detail_product_fk` (`id_product`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slider`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id_product_detail` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slider` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id_voucher` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blog_categories_fk` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_detail_fk` FOREIGN KEY (`id_product_detail`) REFERENCES `product_details` (`id_product_detail`),
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `category_category_fk` FOREIGN KEY (`id_parent`) REFERENCES `categories` (`id_categories`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_product_detail_fk` FOREIGN KEY (`id_product_detail`) REFERENCES `product_details` (`id_product_detail`),
  ADD CONSTRAINT `comment_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_detail_order_fk` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_detail_product_detail_fk` FOREIGN KEY (`id_product_detail`) REFERENCES `product_details` (`id_product_detail`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_categories_fk` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`);

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_detail_product_fk` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
