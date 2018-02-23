-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2018 at 03:52 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelstarter`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title1` varchar(255) NOT NULL,
  `sub_title2` varchar(255) NOT NULL,
  `syllabus` varchar(255) NOT NULL,
  `type` int(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `cost` double NOT NULL,
  `audience` varchar(255) NOT NULL,
  `duration` int(10) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `event_type` int(10) NOT NULL,
  `feauture_event` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `sub_title1`, `sub_title2`, `syllabus`, `type`, `description`, `start_date`, `end_date`, `cost`, `audience`, `duration`, `comment`, `teacher_id`, `event_type`, `feauture_event`, `status`, `created_at`, `updated_at`) VALUES
(2, 'title', 'sub_title1', 'sub_title2', 'syllabus', 1, 'description', '2018-02-13 12:25:15', '2018-02-20 14:30:15', 234.234, 'sdfsdf', 3, 'sdfsdfsdf', 4, 1, 0, 1, '2018-02-20 00:00:00', '2018-02-23 11:12:58'),
(3, 'tsdfsdfest', 'sdfsdf', 'fsdfsdf', 'sdfsdfsdf', 1, 'sdfsdfsdf', '2018-02-19 15:17:10', '2018-02-21 12:17:06', 545, 'sdfsdfsdfsdf', 333, 'sfsdfsdfsdf', 2, 2, 1, 1, '2018-02-22 08:19:12', '2018-02-22 08:19:12'),
(4, 'sdfsdf', 'dfsf@dfdsf.com', 'sdfsdf@sdfds.com', 'sdfdsfsdfsdfsdf', 0, 'sdfdsfsdfsdfsdfsdfdsfsdfsdfsdf', '2018-02-22 12:28:46', '2018-02-22 12:28:44', 44, 'sdfdsfsdfsdfsdf', 2, 'sdfdsfsdfsdfsdfsdfdsfsdfsdfsdf', 2, 2, 21, 1, '2018-02-22 08:30:24', '2018-02-22 08:30:24'),
(5, 'fffffffffffffff', 'ffffffffffffffff', 'ffffffffffffffffffffffffff', 'ffffffffffffffffffffffffff', 0, 'ffffffffffffffffffffffffff', '2018-02-11 12:31:52', '2018-01-29 12:31:51', 2, 'ffffffffffffffffffffffffff', 2, 'ffffffffffffffffffffffffff', 0, 1, 1, 0, '2018-02-22 08:32:12', '2018-02-23 12:12:15'),
(7, 'sdfdff', 'fffffffffffff', 'fffffffffff', 'ffffffffffff', 1, 'fffffffffffffffff', '2018-02-12 16:06:31', '2018-02-22 16:06:27', 333, 'fffffffffffffffff', 2, 'vvvvvvvvvvvvvv', 9, 2, 1, 0, '2018-02-22 12:06:51', '2018-02-22 14:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `event_submitions`
--

CREATE TABLE `event_submitions` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_submitions`
--

INSERT INTO `event_submitions` (`id`, `event_id`, `name`, `lastname`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 2, 'a', 'b', '234234234', '2018-02-22 00:00:00', '2018-02-22 00:00:00'),
(2, 2, 'c', 'd', '234234234', '2018-02-22 00:00:00', '2018-02-22 00:00:00'),
(3, 2, 'sdfsf', 'sdf', 'sdf', '2018-02-23 11:46:04', '2018-02-23 11:46:04'),
(4, 2, 'sdfsf', 'sdf', 'sdf', '2018-02-23 11:46:17', '2018-02-23 11:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'סדנה מעשית', '0000-00-00 00:00:00', '2018-02-23 11:11:24'),
(3, 'השתלמות מרצה סגל', '0000-00-00 00:00:00', '2018-02-23 11:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `object_type` varchar(100) NOT NULL,
  `object_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `type`, `object_type`, `object_id`, `name`) VALUES
(47, 'thumbnail', 'event', 4, 'tumbnail_4.jpg'),
(48, 'original', 'event', 4, 'original_4.jpg'),
(76, 'original', 'teacher', 8, 'original_8.jpg'),
(83, 'thumbnail', 'event', 7, 'tumbnail_7.jpg'),
(84, 'original', 'event', 7, 'original_7.jpg'),
(99, 'thumbnail', 'teacher', 4, 'tumbnail_4.jpg'),
(100, 'original', 'teacher', 4, 'original_4.jpg'),
(101, 'thumbnail', 'teacher', 9, 'tumbnail_9.jpg'),
(102, 'original', 'teacher', 9, 'original_9.jpg'),
(103, 'thumbnail', 'teacher', 10, 'tumbnail_10.jpg'),
(104, 'original', 'teacher', 10, 'original_10.jpg'),
(107, 'thumbnail', 'teacher', 11, 'tumbnail_11.jpg'),
(108, 'original', 'teacher', 11, 'original_11.jpg'),
(109, 'thumbnail', 'teacher', 12, 'tumbnail_12.jpg'),
(110, 'original', 'teacher', 12, 'original_12.jpg'),
(111, 'thumbnail', 'teacher', 13, 'tumbnail_13.jpg'),
(112, 'original', 'teacher', 13, 'original_13.jpg'),
(115, 'thumbnail', 'event', 5, 'tumbnail_5.jpg'),
(116, 'original', 'event', 5, 'original_5.jpg'),
(117, 'thumbnail', 'event', 2, 'tumbnail_2.jpg'),
(118, 'original', 'event', 2, 'original_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `position` varchar(255) CHARACTER SET utf8 NOT NULL,
  `guest` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `position`, `guest`, `created_at`, `updated_at`) VALUES
(4, 'מיכל שביט', 'מרצה סגל', 1, '2018-02-22 10:51:43', '2018-02-23 08:47:25'),
(9, 'מיכל שביט', 'מרצה סגל', 1, '2018-02-22 12:04:06', '2018-02-23 08:48:30'),
(10, 'מיכל שביט', 'מרצה סגל', 1, '2018-02-22 13:17:52', '2018-02-23 08:49:10'),
(11, 'מיכל שביט', 'מרצה סגל', 0, '2018-02-23 10:10:38', '2018-02-23 10:10:38'),
(12, 'מיכל שביט', 'מרצה סגל', 0, '2018-02-23 10:11:52', '2018-02-23 10:11:52'),
(13, 'מיכל שביט', 'מרצה סגל', 0, '2018-02-23 10:12:35', '2018-02-23 10:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$z6C57QbLyzPXsSQ62tVfDO1kAc4EkMEsd2tP1cY7VKN5bXgfOos/.', 'MdhgGnNYMlRxYmQU86qKjgJyP8Dz5px3S4iM8L3GLabCIuIgY5Z2Cg0VFkNZ', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_submitions`
--
ALTER TABLE `event_submitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `event_submitions`
--
ALTER TABLE `event_submitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
