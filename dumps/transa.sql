-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 06:17 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transa`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_target_self` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_06_154844_create_posts_table', 1),
(4, '2019_09_06_154844_create_menu_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_target_self` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_description`, `post_image`, `post_video`, `post_link`, `post_target_self`, `created_at`, `updated_at`) VALUES
(2, 'Kawai Unicorn', 'uniccorn gif', 'https://media.giphy.com/media/WZmgVLMt7mp44/giphy.gif', 'https://media.giphy.com/media/WZmgVLMt7mp44/giphy.mp4', '_blank', NULL, '2019-03-18 20:36:19', '2019-03-18 20:36:19'),
(3, 'Fluffy', 'This is a fluffy unicorn', 'https://media.giphy.com/media/L2uxhEUHK24Lu/giphy.gif', 'https://media.giphy.com/media/L2uxhEUHK24Lu/giphy.mp4', '_blank', NULL, '2019-03-18 20:37:31', '2019-03-18 20:37:31'),
(6, 'Meet Aiko', 'This is a sample post', 'https://media.giphy.com/media/l4Kig8t6rseA2mbCM/giphy.gif', 'https://media.giphy.com/media/l4Kig8t6rseA2mbCM/giphy.mp4', '_self', NULL, '2019-03-18 20:42:36', '2019-03-18 20:42:36'),
(7, 'BBC Earth', 'Panda', 'https://media.giphy.com/media/jKpVHextCiB8c/giphy.gif', 'https://media.giphy.com/media/jKpVHextCiB8c/giphy.mp4', '_blank', NULL, '2019-03-18 20:44:45', '2019-03-18 20:44:45'),
(8, 'Parror', 'Soccer parrot', 'https://media.giphy.com/media/1309kSBooRcdKU/giphy.gif', 'https://media.giphy.com/media/1309kSBooRcdKU/giphy.mp4', '_blank', NULL, '2019-03-18 20:45:46', '2019-03-18 20:45:46'),
(9, 'Parrot', 'Dancing', 'https://media.giphy.com/media/Mznuk8w4ySRpK/giphy.gif', 'https://media.giphy.com/media/Mznuk8w4ySRpK/giphy.mp4', '_blank', NULL, '2019-03-18 20:46:26', '2019-03-18 20:46:26'),
(10, 'Panda', 'Rolling... Rolling on the river', 'https://media.giphy.com/media/EatwJZRUIv41G/giphy.gif', 'https://media.giphy.com/media/EatwJZRUIv41G/giphy.mp4', '_blank', NULL, '2019-03-18 20:47:20', '2019-03-18 20:47:20'),
(11, 'San Diego Zoo', 'Lool Panda', 'https://media.giphy.com/media/39hoXKE2isn6nrwKos/giphy.gif', 'https://media.giphy.com/media/39hoXKE2isn6nrwKos/giphy.mp4', '_blank', NULL, '2019-03-18 21:05:22', '2019-03-18 21:05:22'),
(12, 'Scared', 'Baby Panda', 'https://media.giphy.com/media/l1KVcBV7rstepCYhi/giphy.gif', 'https://media.giphy.com/media/l1KVcBV7rstepCYhi/giphy.mp4', '_blank', NULL, '2019-03-18 21:06:19', '2019-03-18 21:06:19'),
(13, 'Just Watching', 'Keeo Going', 'https://media.giphy.com/media/mlvseq9yvZhba/giphy.gif', 'https://media.giphy.com/media/mlvseq9yvZhba/giphy.mp4', '_blank', NULL, '2019-03-18 21:07:15', '2019-03-18 21:07:15'),
(14, 'Baby', 'Watch your step', 'https://media.giphy.com/media/l0MYNB04rBb51QNtC/giphy.gif', 'https://media.giphy.com/media/l0MYNB04rBb51QNtC/giphy.mp4', '_blank', NULL, '2019-03-18 21:08:05', '2019-03-18 21:08:05'),
(15, 'Fight', 'Boxing Cat', 'https://media.giphy.com/media/8cErt0PCSgzOY375br/giphy.gif', 'https://media.giphy.com/media/8cErt0PCSgzOY375br/giphy.mp4', '_blank', NULL, '2019-03-18 21:09:03', '2019-03-18 21:09:03'),
(16, 'Boxing Cats', 'Don`t touch me', 'https://media.giphy.com/media/69yrZWuu7clVYvmtJi/giphy-downsized-large.gif', 'https://media.giphy.com/media/69yrZWuu7clVYvmtJi/giphy.mp4', '_blank', NULL, '2019-03-18 21:09:41', '2019-03-18 21:09:41'),
(18, 'Kawai Unicorn - copy', 'uniccorn gif', 'https://media.giphy.com/media/WZmgVLMt7mp44/giphy.gif', 'https://media.giphy.com/media/WZmgVLMt7mp44/giphy.mp4', '_blank', NULL, '2019-03-18 20:36:19', '2019-03-18 20:36:19'),
(19, 'Fluffy - copy', 'This is a fluffy unicorn', 'https://media.giphy.com/media/L2uxhEUHK24Lu/giphy.gif', 'https://media.giphy.com/media/L2uxhEUHK24Lu/giphy.mp4', '_blank', NULL, '2019-03-18 20:37:31', '2019-03-18 20:37:31'),
(20, 'Meet Aiko - copy', 'This is a sample post', 'https://media.giphy.com/media/l4Kig8t6rseA2mbCM/giphy.gif', 'https://media.giphy.com/media/l4Kig8t6rseA2mbCM/giphy.mp4', '_self', NULL, '2019-03-18 20:42:36', '2019-03-18 20:42:36'),
(21, 'BBC Earth - copy', 'Panda', 'https://media.giphy.com/media/jKpVHextCiB8c/giphy.gif', 'https://media.giphy.com/media/jKpVHextCiB8c/giphy.mp4', '_blank', NULL, '2019-03-18 20:44:45', '2019-03-18 20:44:45'),
(22, 'Parrot - copy', 'Soccer parrot', 'https://media.giphy.com/media/1309kSBooRcdKU/giphy.gif', 'https://media.giphy.com/media/1309kSBooRcdKU/giphy.mp4', '_blank', NULL, '2019-03-18 20:45:46', '2019-03-18 20:45:46'),
(23, 'Parrot - copy', 'Dancing', 'https://media.giphy.com/media/Mznuk8w4ySRpK/giphy.gif', 'https://media.giphy.com/media/Mznuk8w4ySRpK/giphy.mp4', '_blank', NULL, '2019-03-18 20:46:26', '2019-03-18 20:46:26'),
(24, 'Panda - copy', 'Rolling... Rolling on the river', 'https://media.giphy.com/media/EatwJZRUIv41G/giphy.gif', 'https://media.giphy.com/media/EatwJZRUIv41G/giphy.mp4', '_blank', NULL, '2019-03-18 20:47:20', '2019-03-18 20:47:20'),
(25, 'San Diego Zoo - copy', 'Lool Panda', 'https://media.giphy.com/media/39hoXKE2isn6nrwKos/giphy.gif', 'https://media.giphy.com/media/39hoXKE2isn6nrwKos/giphy.mp4', '_blank', NULL, '2019-03-18 21:05:22', '2019-03-18 21:05:22'),
(26, 'Scared - copy', 'Baby Panda', 'https://media.giphy.com/media/l1KVcBV7rstepCYhi/giphy.gif', 'https://media.giphy.com/media/l1KVcBV7rstepCYhi/giphy.mp4', '_blank', NULL, '2019-03-18 21:06:19', '2019-03-18 21:06:19'),
(27, 'Just Watching - copy', 'Keeo Going', 'https://media.giphy.com/media/mlvseq9yvZhba/giphy.gif', 'https://media.giphy.com/media/mlvseq9yvZhba/giphy.mp4', '_blank', NULL, '2019-03-18 21:07:15', '2019-03-18 21:07:15'),
(28, 'Baby - copy', 'Watch your step', 'https://media.giphy.com/media/l0MYNB04rBb51QNtC/giphy.gif', 'https://media.giphy.com/media/l0MYNB04rBb51QNtC/giphy.mp4', '_blank', NULL, '2019-03-18 21:08:05', '2019-03-18 21:08:05'),
(29, 'Fight - copy', 'Boxing Cat', 'https://media.giphy.com/media/8cErt0PCSgzOY375br/giphy.gif', 'https://media.giphy.com/media/8cErt0PCSgzOY375br/giphy.mp4', '_blank', NULL, '2019-03-18 21:09:03', '2019-03-18 21:09:03'),
(30, 'Boxing Cats - copy', 'Don`t touch me', 'https://media.giphy.com/media/69yrZWuu7clVYvmtJi/giphy-downsized-large.gif', 'https://media.giphy.com/media/69yrZWuu7clVYvmtJi/giphy.mp4', '_blank', NULL, '2019-03-18 21:09:41', '2019-03-18 21:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
