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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `townships_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `confirm_user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `recordstatus` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `logo`, `phone`, `address`, `type_id`, `townships_id`, `user_id`, `confirm_user_id`, `status`, `recordstatus`, `created_at`, `updated_at`) VALUES
(1, '', 'customer@gmail.com', '$2y$10$ovaXUV4UztE869fhe/.kLOTJpGvZmI9UXLcZuWBFy.UbwpvC09alK', 'day1.jpg', '', '', 3, 4, 2, NULL, 0, 1, '2019-09-24 22:00:16', '2019-10-01 21:13:12'),
(2, 'Tempora esse deserunt error sit.', 'customer2@gmail.com', '$2y$10$JotoER14b1lSUZlHXpiK4u1SnvZ5xIPwWETjh7Idxm1QPoP9/CMBC', 'day1.jpg', '09-20102010', 'Inventore ea eos vel aliquam voluptatem nihil.', 2, 6, 1, NULL, 0, 1, '2019-09-24 22:00:17', '2019-09-24 22:00:17'),
(3, 'Provident ex dolorem quos.', 'customer3@gmail.com', '$2y$10$UZ8UOS0XK80sPCeAC0Rv3.LhWFgW.OjrGjSSlrBUNOYMeKExLr4y6', 'day1.jpg', '09-20102010', 'Harum possimus aut ratione totam similique.', 3, 8, 1, NULL, 0, 1, '2019-09-24 22:00:17', '2019-09-24 22:00:17'),
(4, 'Occaecati quia illum velit unde reprehenderit eos.', 'customer4@gmail.com', '$2y$10$vg3BAn9p1qvH48j15/Zs6e41JU7a0fz6znKsqMjs8EVQUo.GF93P6', 'day1.jpg', '09-20102010', 'Corporis cupiditate omnis sed voluptas vel iusto eligendi.', 2, 7, 2, NULL, 0, 1, '2019-09-24 22:00:17', '2019-09-24 22:00:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
