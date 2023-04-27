-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 12:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tager_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `role` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `image`, `role`) VALUES
(1, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'client-163b8bc280fd7e.png', '0'),
(4, 'heba', '202cb962ac59075b964b07152d234b70', 'member-463925cec140b9.jpg', '0'),
(6, 'samy', 'd41d8cd98f00b204e9800998ecf8427e', 'member-1639670a47abbe.jpg', '1'),
(11, 'hassan', '202cb962ac59075b964b07152d234b70', 'client-663d30c1747728.png', '0'),
(12, 'salma', '202cb962ac59075b964b07152d234b70', '', '0'),
(13, 'tima', '202cb962ac59075b964b07152d234b70', '', '0'),
(14, 'mostfa', '202cb962ac59075b964b07152d234b70', '', '0'),
(15, 'rania', '202cb962ac59075b964b07152d234b70', '', '0'),
(16, 'merna', '202cb962ac59075b964b07152d234b70', '', '0'),
(17, 'pop', '202cb962ac59075b964b07152d234b70', '', '0'),
(18, 'samr', '202cb962ac59075b964b07152d234b70', '', '0'),
(19, 'menna', '202cb962ac59075b964b07152d234b70', '', '0'),
(20, 'sama', '202cb962ac59075b964b07152d234b70', '', '0'),
(21, 'marawan', '202cb962ac59075b964b07152d234b70', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `detalis` text NOT NULL,
  `images` text NOT NULL,
  `quote` text DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `category_blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `detalis`, `images`, `quote`, `author`, `date`, `category_blog_id`) VALUES
(10, 'blog1', ' Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'post-16449b2017b049.jpg,post-26449b201875f4.jpg,post-36449b201880cb.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'said ragab', '2023-04-27', 1),
(11, 'blog2', ' Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'post-16449b276ddbfd.jpg,post-26449b276de9b6.jpg,post-36449b276df7fe.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'heba elshamy', '2023-04-27', 2),
(12, 'blog3', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage', 'post-16449b2c2e2bf9.jpg,post-26449b2c2e7535.jpg,post-36449b2c2e8ce9.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'emy hawas', '2023-04-27', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `count`, `total_price`, `date`) VALUES
(95, 65, 22, 1, 220, '2023-03-21'),
(99, 68, 22, 1, 650, '2023-03-21'),
(110, 50, 23, 5, 1250, '2023-04-25'),
(111, 66, 23, 3, 600, '2023-04-25'),
(113, 58, 24, 4, 880, '2023-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_image` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_image`, `status`) VALUES
(12, 'clothings', 'banner-0463bcfdad8485a.jpg', '1'),
(13, 'accessories', 'banner-0763bcf54158c90.jpg', '1'),
(14, 'bags & shoes', 'banner-0863bcf58ad4c63.jpg', '1'),
(15, 'foods', 'company-8640fd16b49c2e.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category_blog`
--

CREATE TABLE `category_blog` (
  `id` int(11) NOT NULL,
  `cb_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_blog`
--

INSERT INTO `category_blog` (`id`, `cb_name`) VALUES
(1, 'fashion'),
(2, 'travel'),
(4, 'model');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `blog_id`, `user_id`, `created_at`) VALUES
(39, 'comment1', 12, 24, '2023-04-26 23:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `m_title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `m_date` date NOT NULL DEFAULT current_timestamp(),
  `m_read` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `username`, `email`, `m_title`, `message`, `m_date`, `m_read`) VALUES
(1, 'sarah', 'sarah@yahoo.com', 'message 1', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2023-02-25', '1'),
(3, 'mrah', 'mrah@yahoo.com', 'message 3', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2023-02-25', '0'),
(6, 'menna', 'menna@gmail.com', 'message 4', 'ddddddddddddddddddddddddddddddddddd', '2023-02-26', '0'),
(7, 'malak', 'malak@gmail.com', 'message 5', 'testttttttttttttttttttttt', '2023-02-26', '1'),
(25, 'admin', 'ali@gmail.com', 'message 2', 'llllllllllllllll', '2023-03-01', '0'),
(26, 'admin', 'lolo@yahoo', 'message 4', 'ggggggggggggg', '2023-03-01', '0'),
(27, 'admin', 'menna@yahoo.com', 'message 2', 'ddddddddddddd', '2023-03-01', '0'),
(28, '', '', '', '', '2023-03-01', '0'),
(29, 'adam', 'ali@gmail.com', 'message 5', 'lllllllllllllllll', '2023-03-01', '0'),
(30, 'menna', 'menna@yahoo.com', 'message 6', 'sssssssssssssss', '2023-03-01', '0'),
(31, 'heba', 'heba@gmail.com', 'test', 'test test test', '2023-04-24', '0'),
(32, 'admin', 'admin500@admin.com', 'message500', 'message500', '2023-04-25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_price` float NOT NULL,
  `p_discount` float NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `p_desc` text NOT NULL,
  `p_stock` tinyint(4) NOT NULL,
  `p_rate` tinyint(4) NOT NULL DEFAULT 0,
  `p_date` date NOT NULL DEFAULT current_timestamp(),
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_price`, `p_discount`, `p_image`, `p_desc`, `p_stock`, `p_rate`, `p_date`, `id_category`) VALUES
(50, 'white t-shirt', 300, 250, 'product-0163bcf88682898.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 9, 0, '2023-01-10', 12),
(51, 'trouser', 450, 350, 'product-0263bcf8c0df9fc.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 6, 0, '2023-01-10', 12),
(52, 'blue shirt', 500, 390, 'product-0363bcf8eae6e14.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 8, 0, '2023-01-10', 12),
(53, 'coat', 900, 750, 'product-0463bcf90e3628a.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 7, 0, '2023-01-10', 12),
(54, 'skirt', 200, 150, 'product-0563bcf931595cb.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 2, 0, '2023-01-10', 12),
(55, 'watch', 300, 230, 'product-0663bcf9535cc32.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 7, 0, '2023-01-10', 13),
(56, 'blazer', 500, 430, 'product-0763bcf97d30127.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 10, 0, '2023-01-10', 12),
(57, 'sabara t_shert', 400, 250, 'product-0863bcf9a1d89bc.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 1, 0, '2023-01-10', 12),
(58, 'shoes', 250, 220, 'product-0963bcf9c75fa39.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 6, 0, '2023-01-10', 14),
(59, 'black t-shirt', 200, 150, 'product-1063bcf9f711615.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 5, 0, '2023-01-10', 12),
(60, 'blue shirt', 660, 600, 'product-1163bcfa1c1807a.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 8, 0, '2023-01-10', 12),
(61, 'belt', 220, 200, 'product-1263bcfa4b5b8ba.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 6, 0, '2023-01-10', 13),
(62, 'blue trouser', 400, 330, 'product-1363bcfa7b9b6d8.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 15, 0, '2023-01-10', 12),
(63, 'ofshoulder t-shirt', 550, 500, 'product-1463bcfaacc4c1c.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 3, 0, '2023-01-10', 12),
(64, 'smart watch', 900, 850, 'product-1563bcfad547b0e.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 3, 0, '2023-01-10', 13),
(65, 'gray t-shirt', 250, 220, 'product-1663bcfb07535ce.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 7, 0, '2023-01-10', 12),
(66, 'hat', 300, 200, 'product-min-0163bcfb34587b9.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 4, 0, '2023-01-10', 13),
(67, 'black jacket', 770, 700, 'product-detail-0163bcfb5b7b693.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 3, 0, '2023-01-10', 12),
(68, 'white jacket', 800, 650, 'product-min-0263bcfb82067d0.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 10, 0, '2023-01-10', 12);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `product_id`, `user_id`, `rate`, `comment`, `created_at`) VALUES
(1, 67, 24, 4, 'e4ta8l', '2023-04-05 03:37:21'),
(2, 67, 24, 3, '7lw', '2023-04-05 03:37:46'),
(3, 67, 24, 2, 'test', '2023-04-05 04:01:30'),
(4, 67, 24, 1, 'ssssssssss', '2023-04-05 04:11:39'),
(5, 67, 24, 5, 'fulla', '2023-04-05 04:15:00'),
(6, 67, 24, 3, 'fffffffffffff', '2023-04-05 20:02:08'),
(7, 67, 24, 4, 'farida', '2023-04-05 20:04:16'),
(8, 67, 24, 5, 'fayroz', '2023-04-05 20:05:25'),
(9, 67, 24, 4, 'test test', '2023-04-05 20:11:26'),
(10, 67, 24, 2, 'test55555555555555', '2023-04-05 20:13:32'),
(11, 67, 24, 1, 'mar7baa', '2023-04-05 20:16:03'),
(12, 67, 24, 3, 'ahlaaaaaaa', '2023-04-05 20:32:27'),
(13, 67, 24, 5, '3la fekra ', '2023-04-05 20:33:01'),
(14, 67, 24, 0, 'njjjjjjjjjj', '2023-04-05 20:35:02'),
(15, 67, 24, 0, 'nnnnnnnnnnn', '2023-04-05 20:36:51'),
(16, 67, 24, 0, 'fffffffffffff', '2023-04-05 22:04:53'),
(17, 67, 24, 4, '4444444444444', '2023-04-05 22:05:21'),
(18, 67, 24, 3, 'test test test', '2023-04-05 22:13:14'),
(19, 67, 24, 2, 'saaaaaaaaaaaaaaaaaaaa', '2023-04-05 22:16:01'),
(20, 67, 24, 4, 'hhhhhhhhhhhhhhhhhhhhhhhy', '2023-04-05 22:18:48'),
(21, 67, 24, 5, 'Mo Isa3el', '2023-04-05 22:21:38'),
(22, 67, 24, 2, 'LLLLLLLLLLLLLLLLLLLLL', '2023-04-05 22:22:35'),
(23, 67, 24, 1, 'اشتغل يلا', '2023-04-05 22:51:11'),
(24, 67, 24, 5, 'انجز', '2023-04-05 22:52:23'),
(25, 67, 24, 2, 'qqqqqqqqqqq', '2023-04-05 23:04:35'),
(26, 67, 24, 2, 'uuuuuuuuuuuuuuu', '2023-04-05 23:06:29'),
(27, 67, 24, 5, 'kte4er', '2023-04-05 23:18:35'),
(28, 67, 24, 4, 'wwwwwwwwwww', '2023-04-05 23:32:57'),
(29, 67, 24, 3, 'asdfghj', '2023-04-05 23:37:33'),
(30, 67, 24, 4, 'ngooooom', '2023-04-05 23:53:23'),
(31, 67, 24, 5, 'fdddddddddddddddddddd', '2023-04-05 23:53:48'),
(32, 67, 24, 0, 'hhhhhhhhhhhhhhhhhhhhhhy', '2023-04-05 23:54:44'),
(33, 67, 24, 4, 'test4444444444444444444444444444444444444', '2023-04-06 00:00:31'),
(34, 67, 24, 0, '', '2023-04-06 00:11:04'),
(35, 67, 23, 0, '', '2023-04-06 00:14:20'),
(36, 67, 23, 0, '', '2023-04-06 00:15:24'),
(37, 70, 23, 3, 'nice', '2023-04-06 00:21:48'),
(38, 70, 23, 1, '', '2023-04-06 02:00:40'),
(39, 70, 23, 0, 'kkkkkkkkkk', '2023-04-06 02:00:53'),
(40, 70, 23, 0, 'kkkkkkkkkkkkk', '2023-04-06 02:07:23'),
(41, 70, 23, 0, 'jjjjjjjjjjjjj', '2023-04-06 02:08:00'),
(42, 70, 23, 0, 'aaaaaaaaaaaa', '2023-04-06 02:08:14'),
(43, 70, 23, 4, '', '2023-04-06 02:09:04'),
(44, 70, 23, 3, '', '2023-04-06 02:11:54'),
(45, 70, 23, 2, '', '2023-04-06 02:12:22'),
(46, 70, 23, 4, '', '2023-04-06 02:12:50'),
(47, 70, 23, 5, '', '2023-04-06 02:14:44'),
(48, 70, 23, 2, '', '2023-04-06 02:15:20'),
(49, 70, 23, 3, '', '2023-04-06 02:16:36'),
(50, 65, 23, 3, 'good', '2023-04-06 03:38:12'),
(51, 66, 23, 4, 'very good', '2023-04-06 03:41:51'),
(52, 64, 23, 5, '', '2023-04-06 03:43:20'),
(53, 68, 23, 0, 'not good', '2023-04-06 03:44:38'),
(54, 58, 23, 2, 'bbbbbbbbbbbbb', '2023-04-06 03:50:02'),
(55, 61, 23, 4, 'ddddddddddddddd', '2023-04-06 03:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `side_info`
--

CREATE TABLE `side_info` (
  `id` int(11) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `site_image` text NOT NULL,
  `site_address` varchar(50) NOT NULL,
  `site_location` text NOT NULL,
  `site_phone` varchar(30) NOT NULL,
  `site_email` varchar(50) NOT NULL,
  `site_facebook` varchar(50) NOT NULL,
  `site_twitter` varchar(50) NOT NULL,
  `site_pinterest` varchar(50) NOT NULL,
  `site_instagram` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `side_info`
--

INSERT INTO `side_info` (`id`, `site_name`, `site_image`, `site_address`, `site_location`, `site_phone`, `site_email`, `site_facebook`, `site_twitter`, `site_pinterest`, `site_instagram`) VALUES
(1, 'tager', 'logo63bcdd2c581a5.jpg', 'alex_campchezar', 'https://goo.gl/maps/WoXRaaHxayZusdoa9', '      +201097353216', 'tager@gmail.com', ' https://www.facebook.com', 'https://twitter.com', 'https://www.pinterest.com', 'https://www.instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `sc_name` varchar(50) NOT NULL,
  `sc_icon` varchar(20) NOT NULL,
  `sc_status` enum('0','1') NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `sc_name`, `sc_icon`, `sc_status`, `id_category`) VALUES
(20, 'women', 'tags', '1', 12),
(21, 'men', 'tag', '1', 12),
(22, 'kids', 'smile-o', '0', 12),
(23, 'women', 'sign-language', '1', 13),
(24, 'men', 'safari', '1', 13),
(25, 'kids', 'smile-o', '0', 13),
(26, 'women', 'shopping-bag', '0', 14),
(27, 'men', 'star', '0', 14),
(28, 'kids', 'smile-o', '1', 14),
(29, 'men', 'shopping-bag', '1', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`) VALUES
(17, 'fairoz', 'ibrahim', 'fairoz@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(22, 'malak ', 'ibrahim', 'malak@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(23, 'fairoz', 'ibrahim', 'fairoz@yahoo.com', '202cb962ac59075b964b07152d234b70', NULL),
(24, 'farida', 'ibrahim', 'farida@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(26, 'fairoz', 'mohamed', 'menna@yahoo.com', 'c20ad4d76fe97759aa27a0c99bff6710', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_blog_id` (`category_blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_blog`
--
ALTER TABLE `category_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_info`
--
ALTER TABLE `side_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_blog`
--
ALTER TABLE `category_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `side_info`
--
ALTER TABLE `side_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`category_blog_id`) REFERENCES `category_blog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
