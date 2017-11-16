-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 06:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dist_block_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_faults`
--

CREATE TABLE `customer_faults` (
  `id` int(11) NOT NULL,
  `fault_id` varchar(12) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resolution` varchar(150) DEFAULT NULL,
  `status` varchar(40) DEFAULT 'Pending Assessment',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_faults`
--

INSERT INTO `customer_faults` (`id`, `fault_id`, `description`, `assigned_to`, `user_id`, `resolution`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fault-RPpcDM', 'Fault Description', 1, 1, 'Distribution Point needs to be replaced', 'Resolution Updated', '2017-11-16 03:59:34', '2017-11-16 01:59:34'),
(2, 'Fault-8NsWi8', 'Test Fault', NULL, 3, NULL, 'Pending Assessment', '2017-11-16 04:42:30', '2017-11-16 04:42:30'),
(3, 'Fault-4dttUU', 'iuvyhyytytg', NULL, 1, NULL, 'Pending Assessment', '2017-11-16 14:34:40', '2017-11-16 14:34:40'),
(4, 'Fault-TRJJ5W', 'hjvhjhjvj', NULL, 3, NULL, 'Pending Assessment', '2017-11-16 14:45:42', '2017-11-16 14:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `dist_points`
--

CREATE TABLE `dist_points` (
  `id` int(11) NOT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `code` varchar(13) DEFAULT NULL,
  `availableSlots` int(11) DEFAULT '10',
  `maxSlots` int(11) DEFAULT '10',
  `description` varchar(100) DEFAULT NULL,
  `dpPairNo` varchar(15) DEFAULT NULL,
  `dpNo` varchar(15) DEFAULT NULL,
  `distributionSide` varchar(15) DEFAULT NULL,
  `exchangeSide` varchar(15) DEFAULT NULL,
  `cabinetNo` varchar(15) DEFAULT NULL,
  `mdfPair` varchar(15) DEFAULT NULL,
  `mdfBar` varchar(15) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dist_points`
--

INSERT INTO `dist_points` (`id`, `street`, `city`, `code`, `availableSlots`, `maxSlots`, `description`, `dpPairNo`, `dpNo`, `distributionSide`, `exchangeSide`, `cabinetNo`, `mdfPair`, `mdfBar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'Lusaka', '2', 8, 10, 'Test Date', '12', '12', '123', '23', '32', NULL, '12', 1, '2017-11-16 03:10:46', '2017-11-16 01:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `dp_applications`
--

CREATE TABLE `dp_applications` (
  `id` int(11) NOT NULL,
  `service` varchar(25) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `resolution` varchar(150) DEFAULT NULL,
  `dist_block` int(10) DEFAULT NULL,
  `client_id` int(10) DEFAULT NULL,
  `assigned_to` int(10) DEFAULT NULL,
  `sketchMap` varchar(100) DEFAULT NULL,
  `assessment` varchar(100) DEFAULT NULL,
  `applicationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) DEFAULT 'Pending Assessment',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dp_applications`
--

INSERT INTO `dp_applications` (`id`, `service`, `description`, `resolution`, `dist_block`, `client_id`, `assigned_to`, `sketchMap`, `assessment`, `applicationDate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fixed Line', 'Test', NULL, 1, 1, 1, NULL, NULL, '2017-11-16 03:58:52', 'Application Assessed Pending C', '2017-11-13 18:23:00', '2017-11-16 01:58:52'),
(2, 'Fixed Line', 'Test', NULL, 1, 1, 2, NULL, NULL, '2017-11-16 03:10:46', 'DP Assigned to Application', '2017-11-13 18:23:37', '2017-11-16 01:10:46'),
(3, 'Fixed Line', 'Testing Army', NULL, NULL, 3, 2, NULL, NULL, '2017-11-16 16:37:46', 'Pending Assessment', '2017-11-16 04:42:55', '2017-11-16 14:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_11_13_034437_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(15, 'role-list', 'Display Role Listing', 'See only Listing Of Role', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(16, 'role-create', 'Create Role', 'Create New Role', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(17, 'role-edit', 'Edit Role', 'Edit Role', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(18, 'role-delete', 'Delete Role', 'Delete Role', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(19, 'users-list', 'Display User Listing', 'See only Listing Of Users', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(20, 'user-create', 'Create User', 'Create New User', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(21, 'user-edit', 'Edit User', 'Edit User', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(22, 'user-delete', 'Delete User', 'Delete User', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(23, 'dp-list', 'Display Dist. Block Listing', 'See only Listing Of Users', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(24, 'dp-create', 'Create Distribution Block', 'Create New Distribution Block', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(25, 'dp-edit', 'Edit Distribution Block', 'Edit Distribution Block', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(26, 'dp-delete', 'Delete Distribution Block', 'Delete Distribution Block', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(27, 'update-progress', 'Progress Report Update', 'Update Progress Report', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(28, 'view-reports', 'View System Reports', 'View System Support', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(29, 'assign-ticket', 'Assign Tickets', 'Assigning User Tickets', '2017-11-13 09:47:36', '2017-11-13 09:47:36'),
(30, 'general', 'General Functions', 'Allowed ROuted by all Users', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(28, 4),
(29, 1),
(30, 1),
(30, 2),
(30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator NOC', 'Adminstrator of the Application. Super User', NULL, NULL),
(2, 'technician', 'Technician (Technical Staff)', 'Technical Staff', NULL, NULL),
(3, 'customer-care', 'Customer Care', 'Help Desk in the System', NULL, NULL),
(4, 'customer', 'Customer', 'Zamtel Customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 4),
(4, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `province` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `streetName` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `houseNumber` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plotNumber` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `physicalAddress` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`, `province`, `city`, `streetName`, `houseNumber`, `plotNumber`, `postal`, `physicalAddress`) VALUES
(1, 'Mary Doe', 'user@user.com', '$2y$10$ZdH0fLxJhBo2HK5jdFqZuOkTI/7Hzf8N9zu0M.aq5Ca6MwPpr6.ku', NULL, 'tjvjJBiJjEnHBW3bB9X7UVDBGQ58qV3F8TDi9BX3TcLgtCPc6VC2UiXstmg4', '2017-11-16 16:35:11', '2017-11-16 14:35:11', 'Lusaka', 'Lusaka', 'Lusaka', NULL, NULL, NULL, NULL),
(2, 'Sarah Doe', 'tech@tech.com', '$2y$10$Abp.2oDwWr4Rp78nFb01oe6iZH6L7aCcIc0Cj/OzSu/3S/OjTUgT6', NULL, '2Jqr6yqTrtowSeGPCmC82ganEFO0DsNXuwG6xuRmovTUpJuANhev1VYbEwDM', '2017-11-16 16:41:43', '2017-11-16 14:41:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'John Doe', 'customer@customer.com', '$2y$10$c/rOGtr/KJKA/CwNxp03UuJVIbKSb61tjQJKI1Nd7VX.qK/zuBEde', NULL, 'GfpJRgq51yJk4Wak3RLabMawrzDe0zRbpP9dPGXNcN4mEgQLyu2HL0PQl7lk', '2017-11-16 06:43:23', '2017-11-16 04:43:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Dillan Doe', 'customercare@customercare.com', '$2y$10$VGapsx3KQGUacmYge7cKZ.Xga0x2RtEY1ueyStX5mTe0GT/in6hv6', NULL, 'vXwXeKy85YrnFhCVqJHFDVvp0xFwJA1MaLZnjsHLJUp9eXbt976s88Gq1rhT', '2017-11-16 16:38:11', '2017-11-16 14:38:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Customer 2', 'customer2@customer.com', '$2y$10$gFlRk5BGnDX1HRUCz2aRJOQM5LJvZZMl742VBLQhDqzLeIwv/Ki1S', NULL, NULL, '2017-11-16 11:56:04', '2017-11-16 09:46:11', 'Lusaka', 'Lusaka', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_faults`
--
ALTER TABLE `customer_faults`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dist_points`
--
ALTER TABLE `dist_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dp_applications`
--
ALTER TABLE `dp_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `customer_faults`
--
ALTER TABLE `customer_faults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dist_points`
--
ALTER TABLE `dist_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dp_applications`
--
ALTER TABLE `dp_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dist_points`
--
ALTER TABLE `dist_points`
  ADD CONSTRAINT `dist_points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
