-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2019 at 10:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `type_id`, `customer_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '管理者', 'admin@gmail.com', 'admin', 1, 0, '$2y$10$L6l/hZIiFDYHHPQQU5gtT.JZ1982zC7O7yl.4x5R77hVEYCNLyVV.', 'GR95Sm0FbU4UtnV9cNSbu9aOgwWL8fYNpOCczoCLdBLfFbCyRCZ2DxrZzhSF', '2019-09-24 22:00:15', '2019-09-24 22:00:15'),
(2, '顧客', 'customer@gmail.com', 'user', 2, 1, '$2y$10$Fve76ABoQBAgt7Lr/aM6kOhzZ.mxGwBlt8V0637aNyh5aoUDPdjt.', 'yAzJKR1Doixt1ST24L863yeldgLeMLYSCCAm1PSPqzf1r7PdcZbgn5Oc0wRR', '2019-09-24 22:00:15', '2019-09-24 22:00:15'),
(4, 'Customer 5', 'customer5@gmail.com', '', 3, 2, '$2y$10$sgIkXFaHhW9J18Smg0AKf.8SjBEiJkS6P14AtN6Nnxg7BopwEtQui', 'grVnGxQpQIKEMcvDHmmLUwGG5qtTXTXqjBX2Pqb6atGpjL0fysaIVFeH4coh', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
