-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 07:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noobg`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admins`
--

CREATE TABLE `t_admins` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `pkey` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `insert_date` date DEFAULT NULL,
  `insert_time` time DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_buy_details`
--

CREATE TABLE `t_buy_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `buy_id` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `amount` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `refnum` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `insert_date` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `insert_time` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `discount` varchar(3) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_comment`
--

CREATE TABLE `t_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `text` text COLLATE utf8_persian_ci,
  `author` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `author_email` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `comment_agent` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `insert_date` date NOT NULL,
  `insert_time` time NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_news`
--

CREATE TABLE `t_news` (
  `post_id` int(11) NOT NULL,
  `text` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_posts`
--

CREATE TABLE `t_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `thumbnails_url` tinytext COLLATE utf8_persian_ci,
  `insert_by` int(11) DEFAULT NULL,
  `insert_date` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `insert_time` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_post_img`
--

CREATE TABLE `t_post_img` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `img_url` tinytext COLLATE utf8_persian_ci,
  `tag_name` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_post_tag`
--

CREATE TABLE `t_post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_post_video`
--

CREATE TABLE `t_post_video` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `video_url` tinytext COLLATE utf8_persian_ci,
  `tag_name` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_post_view`
--

CREATE TABLE `t_post_view` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_ip` varchar(25) COLLATE utf8_persian_ci NOT NULL,
  `insert_date` date NOT NULL,
  `insert_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `min_details` tinytext COLLATE utf8_persian_ci,
  `details` text COLLATE utf8_persian_ci,
  `insert_by` int(11) DEFAULT NULL,
  `insert_date` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `insert_time` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `price_range` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `pro_cat_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_product_img`
--

CREATE TABLE `t_product_img` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `img_url` tinytext COLLATE utf8_persian_ci,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_product_specs`
--

CREATE TABLE `t_product_specs` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `specs_name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `specs_value` tinytext COLLATE utf8_persian_ci,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_pro_category`
--

CREATE TABLE `t_pro_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_request_message`
--

CREATE TABLE `t_request_message` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8_persian_ci,
  `user_id` int(11) DEFAULT NULL,
  `insert_date` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `insert_time` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_slider`
--

CREATE TABLE `t_slider` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `insert_date` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_sub_product`
--

CREATE TABLE `t_sub_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `stock` int(6) DEFAULT NULL,
  `price` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `discount` varchar(15) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_tag`
--

CREATE TABLE `t_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL,
  `pkey` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `insert_date` date DEFAULT NULL,
  `insert_time` time NOT NULL,
  `last_activity` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_user_details`
--

CREATE TABLE `t_user_details` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `city` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `address` tinytext COLLATE utf8_persian_ci,
  `phone` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `postal_code` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `t_video`
--

CREATE TABLE `t_video` (
  `post_id` int(11) NOT NULL,
  `video_url` tinytext COLLATE utf8_persian_ci,
  `caption` tinytext COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admins`
--
ALTER TABLE `t_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `t_buy_details`
--
ALTER TABLE `t_buy_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_buy_details_t_users_1` (`user_id`) USING BTREE,
  ADD KEY `fk_t_buy_details_t_product_1` (`product_id`) USING BTREE;

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_comment_t_posts_1` (`post_id`) USING BTREE,
  ADD KEY `fk_t_comment_t_admins_1` (`admin_id`) USING BTREE,
  ADD KEY `fk_t_comment_t_users_1` (`author_id`) USING BTREE;

--
-- Indexes for table `t_news`
--
ALTER TABLE `t_news`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `t_posts`
--
ALTER TABLE `t_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_posts_t_category_1` (`cat_id`) USING BTREE,
  ADD KEY `fk_t_posts_t_admins_1` (`insert_by`) USING BTREE,
  ADD KEY `fk_t_posts_t_admins_2` (`update_by`) USING BTREE;

--
-- Indexes for table `t_post_img`
--
ALTER TABLE `t_post_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_post_img_t_posts_1` (`post_id`) USING BTREE;

--
-- Indexes for table `t_post_tag`
--
ALTER TABLE `t_post_tag`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_t_post_tag_t_tag_1` (`tag_id`) USING BTREE;

--
-- Indexes for table `t_post_video`
--
ALTER TABLE `t_post_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_post_video_t_posts_1` (`post_id`) USING BTREE;

--
-- Indexes for table `t_post_view`
--
ALTER TABLE `t_post_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_product_t_admins_1` (`insert_by`) USING BTREE,
  ADD KEY `fk_t_product_t_pro_category_1` (`pro_cat_id`) USING BTREE;

--
-- Indexes for table `t_product_img`
--
ALTER TABLE `t_product_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_product_img_t_product_1` (`product_id`) USING BTREE;

--
-- Indexes for table `t_product_specs`
--
ALTER TABLE `t_product_specs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_product_specs_t_product_1` (`product_id`) USING BTREE;

--
-- Indexes for table `t_pro_category`
--
ALTER TABLE `t_pro_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_request_message`
--
ALTER TABLE `t_request_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_request_message_t_users_1` (`user_id`) USING BTREE;

--
-- Indexes for table `t_slider`
--
ALTER TABLE `t_slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_slider_t_posts_1` (`post_id`);

--
-- Indexes for table `t_sub_product`
--
ALTER TABLE `t_sub_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_t_sub_product_t_product_1` (`product_id`) USING BTREE;

--
-- Indexes for table `t_tag`
--
ALTER TABLE `t_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_details`
--
ALTER TABLE `t_user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t_video`
--
ALTER TABLE `t_video`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admins`
--
ALTER TABLE `t_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_buy_details`
--
ALTER TABLE `t_buy_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_comment`
--
ALTER TABLE `t_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_posts`
--
ALTER TABLE `t_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_post_img`
--
ALTER TABLE `t_post_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_post_video`
--
ALTER TABLE `t_post_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_post_view`
--
ALTER TABLE `t_post_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_product_img`
--
ALTER TABLE `t_product_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_product_specs`
--
ALTER TABLE `t_product_specs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pro_category`
--
ALTER TABLE `t_pro_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_request_message`
--
ALTER TABLE `t_request_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_slider`
--
ALTER TABLE `t_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_sub_product`
--
ALTER TABLE `t_sub_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tag`
--
ALTER TABLE `t_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_buy_details`
--
ALTER TABLE `t_buy_details`
  ADD CONSTRAINT `fk_t_buy_details_t_product_1` FOREIGN KEY (`product_id`) REFERENCES `t_product` (`id`),
  ADD CONSTRAINT `fk_t_buy_details_t_users_1` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`id`);

--
-- Constraints for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `fk_t_comment_t_admins_1` FOREIGN KEY (`admin_id`) REFERENCES `t_admins` (`id`),
  ADD CONSTRAINT `fk_t_comment_t_posts_1` FOREIGN KEY (`post_id`) REFERENCES `t_posts` (`id`),
  ADD CONSTRAINT `fk_t_comment_t_users_1` FOREIGN KEY (`author_id`) REFERENCES `t_users` (`id`);

--
-- Constraints for table `t_news`
--
ALTER TABLE `t_news`
  ADD CONSTRAINT `fk_t_news_t_posts_1` FOREIGN KEY (`post_id`) REFERENCES `t_posts` (`id`);

--
-- Constraints for table `t_posts`
--
ALTER TABLE `t_posts`
  ADD CONSTRAINT `fk_t_posts_t_admins_1` FOREIGN KEY (`insert_by`) REFERENCES `t_admins` (`id`),
  ADD CONSTRAINT `fk_t_posts_t_admins_2` FOREIGN KEY (`update_by`) REFERENCES `t_admins` (`id`),
  ADD CONSTRAINT `fk_t_posts_t_category_1` FOREIGN KEY (`cat_id`) REFERENCES `t_category` (`id`);

--
-- Constraints for table `t_post_img`
--
ALTER TABLE `t_post_img`
  ADD CONSTRAINT `fk_t_post_img_t_posts_1` FOREIGN KEY (`post_id`) REFERENCES `t_posts` (`id`);

--
-- Constraints for table `t_post_tag`
--
ALTER TABLE `t_post_tag`
  ADD CONSTRAINT `fk_t_post_tag_t_posts_1` FOREIGN KEY (`post_id`) REFERENCES `t_posts` (`id`),
  ADD CONSTRAINT `fk_t_post_tag_t_tag_1` FOREIGN KEY (`tag_id`) REFERENCES `t_tag` (`id`);

--
-- Constraints for table `t_post_video`
--
ALTER TABLE `t_post_video`
  ADD CONSTRAINT `fk_t_post_video_t_posts_1` FOREIGN KEY (`post_id`) REFERENCES `t_posts` (`id`);

--
-- Constraints for table `t_product`
--
ALTER TABLE `t_product`
  ADD CONSTRAINT `fk_t_product_t_admins_1` FOREIGN KEY (`insert_by`) REFERENCES `t_admins` (`id`),
  ADD CONSTRAINT `fk_t_product_t_pro_category_1` FOREIGN KEY (`pro_cat_id`) REFERENCES `t_pro_category` (`id`);

--
-- Constraints for table `t_product_img`
--
ALTER TABLE `t_product_img`
  ADD CONSTRAINT `fk_t_product_img_t_product_1` FOREIGN KEY (`product_id`) REFERENCES `t_product` (`id`);

--
-- Constraints for table `t_product_specs`
--
ALTER TABLE `t_product_specs`
  ADD CONSTRAINT `fk_t_product_specs_t_product_1` FOREIGN KEY (`product_id`) REFERENCES `t_product` (`id`);

--
-- Constraints for table `t_request_message`
--
ALTER TABLE `t_request_message`
  ADD CONSTRAINT `fk_t_request_message_t_users_1` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`id`);

--
-- Constraints for table `t_slider`
--
ALTER TABLE `t_slider`
  ADD CONSTRAINT `fk_t_slider_t_posts_1` FOREIGN KEY (`post_id`) REFERENCES `t_posts` (`id`);

--
-- Constraints for table `t_sub_product`
--
ALTER TABLE `t_sub_product`
  ADD CONSTRAINT `fk_t_sub_product_t_product_1` FOREIGN KEY (`product_id`) REFERENCES `t_product` (`id`);

--
-- Constraints for table `t_user_details`
--
ALTER TABLE `t_user_details`
  ADD CONSTRAINT `fk_t_user_details_t_users_1` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`id`);

--
-- Constraints for table `t_video`
--
ALTER TABLE `t_video`
  ADD CONSTRAINT `fk_t_video_t_posts_1` FOREIGN KEY (`post_id`) REFERENCES `t_posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
