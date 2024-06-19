-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4940
-- Generation Time: Jun 17, 2024 at 06:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vituralhwang`
--

-- --------------------------------------------------------

--
-- Table structure for table `arch`
--

CREATE TABLE `arch` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` varchar(25) NOT NULL,
  `isgruop` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `arch`
--

INSERT INTO `arch` (`id`, `model`, `isgruop`) VALUES
(1, 'My Hao', 0),
(2, 'nan', 0),
(3, 'Manax', 0),
(4, 'Maria Anh', 0),
(5, 'Bong Bong', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `origin` varchar(100) NOT NULL,
  `group` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `tom` varchar(5) NOT NULL,
  `page` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `thumb`, `origin`, `group`, `type`, `tom`, `page`) VALUES
(1, 'data/img/project/nostalgic2.png', 'data/video/project/nostalgic2.mp4', 1, 1, '', 'work'),
(2, 'data/img/project/nostalgic.png', 'data/video/project/nostalgic1.mp4', 1, 1, '', 'work'),
(3, 'data/img/project/unrelese2.png', 'data/video/project/unrelse2.mp4', 2, 1, '', 'work'),
(4, 'data/img/project/unrelese.png', 'data/video/project/unrelse.mp4', 2, 1, '', 'work'),
(5, 'data/img/project/savage1.png', 'data/video/project/savage.mp4', 3, 1, '', 'work'),
(6, 'data/img/project/savage2.png', 'data/video/project/savage2.mp4', 3, 1, '', 'work'),
(7, 'data/img/project/savage3.png', 'data/video/project/savage3.mp4', 3, 1, '', 'work'),
(8, 'data/img/project/savage4.png', 'data/video/project/savage4.mp4', 3, 1, '', 'work'),
(9, 'data/img/project/viet1.png', 'data/video/project/viet.mp4', 4, 1, '', 'work'),
(10, 'data/img/project/viet2.png', 'data/video/project/viet2.mp4', 4, 1, '', 'work'),
(11, 'data/img/project/danger.png', 'data/video/project/danger.mp4', 5, 1, '', 'work'),
(12, 'data/img/project/danger2.png', 'data/video/project/danger2.mp4', 5, 1, '', 'work'),
(13, 'data/img/project/danger3.png', 'data/video/project/danger3.mp4', 5, 1, '', 'work'),
(14, 'data/img/project/danger4.png', 'data/video/project/danger4.mp4', 5, 1, '', 'work'),
(15, 'data/img/project/kbgcx.png', 'data/video/project/KBGCX1.mp4', 6, 1, '', 'work'),
(16, 'data/img/project/kbgcx2.png', 'data/video/project/KBGCX2.mp4', 6, 1, '', 'work'),
(17, 'data/img/project/kbgcx3.png', 'data/video/project/KBGCX3.mp4', 6, 1, '', 'work'),
(18, 'data/img/project/kbgcx4.png', 'data/video/project/KBGCX4.mp4', 6, 1, '', 'work'),
(19, 'data/img/project/moodswing.png', 'data/video/project/moodswing.mp4', 7, 1, '', 'work'),
(20, 'data/img/project/moodswing2.png', 'data/video/project/moodswing2.mp4', 7, 1, '', 'work'),
(21, 'data/img/project/moodswing3.png', 'data/video/project/moodswing3.mp4', 7, 1, '', 'work'),
(22, 'data/img/project/moodswing4.png', 'data/video/project/moodswing4.mp4', 7, 1, '', 'work'),
(23, 'data/img/project/bb-1.png', 'data/video/project/bb-1.mp4', 8, 1, '', 'work'),
(24, 'data/img/project/bb-2.png', 'data/video/project/bb-2.mp4', 8, 1, '', 'work'),
(25, 'data/img/project/bb-3.png', 'data/video/project/bb-3.mp4', 8, 1, '', 'work'),
(26, 'data/img/project/bb-4.png', 'data/video/project/bb-4.mp4', 8, 1, '', 'work'),
(27, 'data/img/project/nmd1.png', 'data/video/project/nmd1.mp4', 9, 1, '', 'work'),
(28, 'data/img/project/nmd2.png', 'data/video/project/nmd2.mp4', 9, 1, '', 'work'),
(29, 'data/img/project/nmd3.png', 'data/video/project/nmd3.mp4', 9, 1, '', 'work'),
(30, 'data/img/project/nmd4.png', 'data/video/project/nmd4.mp4', 9, 1, '', 'work'),
(31, '', 'https://player.vimeo.com/video/744187892?h=454a5b3bdf', 10, 1, '', 'work'),
(32, '', 'https://player.vimeo.com/video/812154181?h=59724c57e4', 11, 1, '', 'work'),
(35, '', 'data/img/wa/D_1.jpg', 1, 1, 'img', 'arch'),
(36, '', 'data/img/wa/D_2.jpg', 1, 2, 'img', 'arch'),
(37, '', 'data/img/wa/D_3.jpg', 1, 2, 'img', 'arch'),
(38, '', 'https://player.vimeo.com/video/621475308?h=1a75f752aa', 2, 1, 'vid', 'arch'),
(39, '', 'https://player.vimeo.com/video/621475286?h=c5c3b825fd', 2, 2, 'vid', 'arch'),
(40, '', 'https://player.vimeo.com/video/621475257?h=699a9ab23b', 2, 2, 'vid', 'arch'),
(41, '', 'data/img/wa/B_1.jpg', 3, 1, 'img', 'arch'),
(42, '', 'https://player.vimeo.com/video/621440793?h=5535d25786', 3, 2, 'vid', 'arch'),
(43, '', 'https://player.vimeo.com/video/621475271?h=633aed99c9', 3, 2, 'vid', 'arch'),
(44, '', 'data/img/wa/A_1.jpg', 4, 1, 'img', 'arch'),
(45, '', 'data/img/wa/A_2.jpg', 4, 2, 'img', 'arch'),
(46, '', 'data/img/wa/A_3.jpg', 4, 2, 'img', 'arch'),
(47, '', 'data/img/wa/G_1.png', 5, 1, 'img', 'arch'),
(48, '', 'data/img/wa/G_2.png', 5, 2, 'img', 'arch'),
(49, '', 'https://player.vimeo.com/video/688985518?h=9f09dcb81e', 5, 2, 'vid', 'arch'),
(50, '', 'https://player.vimeo.com/video/762745806?h=e9f021cd5b', 0, 1, 'vid', 'arch'),
(51, '', 'data/img/wa/art/poster.jpg', 0, 1, 'img', 'arch'),
(52, '', 'data/img/wa/art/diamond.jpg', 0, 1, 'img', 'arch'),
(53, '', 'data/img/wa/art/cloud.jpg', 0, 1, 'img', 'arch'),
(54, '', 'data/img/wa/art/astro_font.jpg', 0, 1, 'img', 'arch'),
(55, '', 'data/img/wa/art/F_2.jpg', 0, 1, 'img', 'arch'),
(56, '', 'data/img/wa/art/F_3.jpg', 0, 1, 'img', 'arch'),
(57, '', 'data/img/wa/art/F_4.jpg', 0, 1, 'img', 'arch'),
(58, '', 'data/img/wa/art/abstract.jpg', 0, 1, 'img', 'arch'),
(59, '', 'data/img/wa/art/nitendo.png', 0, 1, 'img', 'arch'),
(60, '', 'data/img/wa/art/H_1.jpg', 0, 1, 'img', 'arch'),
(61, '', 'data/img/wa/art/650S.jpg', 0, 1, 'img', 'arch');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_20_093011_create_umodels_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `possition` varchar(25) NOT NULL,
  `date` varchar(10) NOT NULL,
  `isgruop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `name`, `possition`, `date`, `isgruop`) VALUES
(1, 'Nostalgic', 'Director - Producer', '9/2019', 0),
(2, 'Unreleased', 'Director - Producer', '9/2019', 0),
(3, 'Savage', 'Director - Producer', '10/2019', 0),
(4, 'Vietnamese', 'Director - Producer', '6/2020', 0),
(5, 'Danger', 'Director - Producer', '9/2020', 0),
(6, 'Khong Bao Gio Cach Xa - Redzy ft. LeeO - V.I.S.D', 'Director - Producer', '12/2020', 0),
(7, 'Mood Swings - ThC', 'Director - Producer', '5/2021', 0),
(8, 'Vay Da Du Xin Chua? - TFIVE Ft.Wtran', 'Director - Producer', '03/2022', 0),
(9, 'I Ain\'t Need Your Luv No More - Ngoimotdong', 'Director - Producer', '2023', 0),
(10, '3D Showreel', '', '', 1),
(11, 'Videography Showreel', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arch`
--
ALTER TABLE `arch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arch`
--
ALTER TABLE `arch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
