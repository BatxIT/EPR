-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 02:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sts_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `battery_purchase`
--

CREATE TABLE `battery_purchase` (
  `id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gst` varchar(10) NOT NULL,
  `pickup_date` date NOT NULL,
  `invoice_no` varchar(10) NOT NULL,
  `invoice_file` varchar(200) NOT NULL,
  `purchase_no` varchar(20) NOT NULL,
  `purchase_file` varchar(200) NOT NULL,
  `pickup_form_no` varchar(10) NOT NULL,
  `pickup_file` varchar(200) NOT NULL,
  `form10_no` varchar(10) NOT NULL,
  `form10_file` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` bigint(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `type_industry` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `code`, `name`, `business_name`, `type_industry`, `contact`, `status`, `delete_flag`, `created_at`, `updated_at`) VALUES
(1, '20230124-0001', 'John Smith', '', '', '09123564789', 1, 1, '2023-01-24 10:10:01', '2023-05-02 16:18:33'),
(2, '20230124-0002', 'Mark Cooper', '', '', '0956421389', 1, 1, '2023-01-24 10:13:34', '2023-05-02 16:18:38'),
(3, '20230124-0003', 'Samantha Lou', '', '', '09231546789', 1, 1, '2023-01-24 10:13:53', '2023-05-02 16:18:45'),
(4, '20230502-0001', 'Aditya', '', '', '09889098992', 1, 0, '2023-05-02 16:03:49', NULL),
(5, '20230502-0002', 'Prashant', '', '', '9889098991', 1, 0, '2023-05-02 16:46:42', NULL),
(6, '20230509-0001', 'Ratan', '', '', '9319328011', 1, 0, '2023-05-09 17:39:02', NULL),
(7, '20230509-0002', 'ab', '', '', 'ab', 2, 0, '2023-05-09 17:46:14', '2023-05-09 18:16:16'),
(8, '20230509-0003', 'ab', '', '', '9319328011', 1, 0, '2023-05-09 17:59:09', NULL),
(9, '20230509-0004', 'o', '', '', 'o', 2, 0, '2023-05-09 18:10:33', NULL),
(10, '20230509-0005', '', '', '', '', 2, 0, '2023-05-09 18:17:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `epr`
--

CREATE TABLE `epr` (
  `id` int(11) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `target` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `est_target` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `epr`
--

INSERT INTO `epr` (`id`, `qty`, `date`, `target`, `year`, `category`, `est_target`) VALUES
(1, 'Yes', '2023-05-03 05:50:00', 'abc', '2023-24', '', 'Active'),
(2, 'Yes', '2023-05-03 05:50:10', 'acv', '2022-23', '', 'Active'),
(3, 'Yes', '2023-05-03 05:50:18', 'acv', '2021-22', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `epr_set`
--

CREATE TABLE `epr_set` (
  `id` int(20) NOT NULL,
  `current_yr` varchar(10) NOT NULL,
  `finance_yr` varchar(10) NOT NULL,
  `percent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `epr_set`
--

INSERT INTO `epr_set` (`id`, `current_yr`, `finance_yr`, `percent`) VALUES
(1, 'John', 'Doe', 'john@examp'),
(2, 'John', 'Doe', 'john@examp'),
(3, '2022-23', '2023-24', '50'),
(4, '2022-23', '2023-24', '50'),
(5, '2022-23', '2023-24', '50'),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, '', '', ''),
(16, '', '', ''),
(17, '', '', ''),
(18, '', '', ''),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, '', '', ''),
(23, '', '', ''),
(24, '', '', ''),
(25, '', '', ''),
(26, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` bigint(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `cell_lot` text NOT NULL,
  `weight` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `refurbished` varchar(20) NOT NULL,
  `recycle` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `code`, `cell_lot`, `weight`, `category`, `refurbished`, `recycle`, `status`, `delete_flag`, `created_at`, `updated_at`) VALUES
(16, '03HCB00L0000BJBCP0321818', 'TACO-001', '17', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-03 17:43:20', NULL),
(17, '03HCB00L0000BJB7P0449377', 'TACO-002', '12', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-03 17:47:27', '2023-05-03 17:47:39'),
(18, '03HCB00L0000CJBCN0121227', 'TACO-003', '12', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-03 17:53:33', '2023-05-04 11:45:11'),
(19, '03HCB00L0000BJBCM0348077', 'TACO-004', '21', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:45:40', NULL),
(20, '03HCB00L0000BJBC10449813', 'TACO-005', '12', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:46:04', NULL),
(21, '03HCB00L0000CJB880116683', 'TACO-006', '12', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:46:24', NULL),
(22, '03HCB00L0000BJBBB0404116', 'TACO-007', '56', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:46:42', NULL),
(23, '03HCB00L0000BJBBN0206351', 'TACO-008', '23', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:47:00', NULL),
(24, '03HCB00L0000BJBC20460862', 'TACO-009', '12', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:47:21', NULL),
(25, '03HCB00L0000CJB7M0370530', 'TACO-010', '23', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:48:09', NULL),
(26, '03HCB00L0000BJBCP0435328', 'TACO-011', '45', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:48:31', NULL),
(27, '03HCB00L0000CJBCN0247141', 'TACO-012', '32', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:48:53', NULL),
(28, '03HCB00L0000BJC140390478', 'TACO-013', '34', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:49:14', NULL),
(29, '03HCB00L0000BJB9M0326455', 'TACO-014', '76', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:49:33', NULL),
(30, '03HCB00L0000BJB740405828', 'TACO-015', '32', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:49:52', NULL),
(31, '03HCB00L0000BJB6J0805751', 'TACO-016', '21', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:50:10', NULL),
(32, '03HCB00L0000BJBBW0360149', 'TACO-017', '32', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:50:31', NULL),
(33, '03HCB00L0000BJB7P0321194', 'TACO-018', '21', 'Â LFP Cylindrical Ce', 'Yes', 'Yes', 1, 0, '2023-05-04 11:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(30) NOT NULL,
  `invoice_code` varchar(100) NOT NULL,
  `client_id` bigint(30) DEFAULT NULL,
  `notes` text NOT NULL,
  `total` float(12,2) NOT NULL DEFAULT 0.00,
  `tendered` float(12,2) NOT NULL DEFAULT 0.00,
  `is_guest` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(30) DEFAULT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_code`, `client_id`, `notes`, `total`, `tendered`, `is_guest`, `user_id`, `delete_flag`, `created_at`, `updated_at`) VALUES
(1, '2023012400001', NULL, '', 355.19, 500.00, 1, 1, 1, '2023-01-24 13:46:15', '2023-05-02 16:19:30'),
(2, '2023012400002', NULL, '', 275.87, 300.00, 1, 1, 1, '2023-01-24 13:47:56', '2023-05-02 16:19:26'),
(3, '2023012400003', 2, '', 986.25, 1000.00, 0, 1, 1, '2023-01-24 13:49:07', '2023-05-02 16:19:22'),
(4, '1001', 4, '', 100.00, 10000.00, 0, 1, 0, '2023-05-02 16:05:18', NULL),
(5, '1002', 4, '', 1500.00, 10000.00, 0, 1, 0, '2023-05-02 16:48:30', NULL),
(6, '1003', 5, '', 7500.00, 100000.00, 0, 1, 0, '2023-05-02 17:30:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` bigint(30) NOT NULL,
  `sales_id` bigint(30) NOT NULL,
  `product_id` bigint(30) NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Batx Energies'),
(6, 'short_name', 'Batx Energies'),
(11, 'logo', 'uploads/logo.png?v=1674522890'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1674522844'),
(17, 'phone', '456-987-1231'),
(18, 'mobile', '09123456987 / 094563212222 '),
(19, 'email', 'info@batx.in'),
(20, 'address', 'Here St, Down There City, Anywhere Here, 2306 -updated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(30) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `password` text NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `ind_type` varchar(50) NOT NULL,
  `ac_type` varchar(50) NOT NULL,
  `asperson` varchar(20) NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='2';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `email`, `mobile`, `password`, `business_name`, `address`, `gst`, `ind_type`, `ac_type`, `asperson`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', '', 'Admin', 'admin', '', 0, '0192023a7bbd73250516f069df18b500', '', '', '', '', '', '', 'uploads/avatars/1.png?v=1649834664', NULL, 1, '2021-01-20 14:02:37', '2022-05-16 14:17:49'),
(14, 'Amar', '', 'Teja', 'amar', 'abcde@gmail.com', 2147483647, '25d55ad283aa400af464c76d713c07ad', 'AMC Pvt Ltd', 'abcde', 'abcde', 'OEM', 'Regular', 'abcde', NULL, NULL, 2, '2023-05-05 17:50:11', '2023-05-09 16:35:59'),
(15, 'ABC', '', 'ABC', 'ABC', 'ABC@gmail.com', 2147483647, '25d55ad283aa400af464c76d713c07ad', 'ABC', 'Delhi', 'ABC', 'OEM', 'Regular', 'ABC', NULL, NULL, 2, '2023-05-09 17:34:41', '2023-05-09 17:34:41'),
(16, 'as', '', 'as', 'as', 'as@gmail.com', 2147483647, '25d55ad283aa400af464c76d713c07ad', '', '', '', '', 'Manager', '', NULL, NULL, 2, '2023-05-09 17:58:21', '2023-05-09 17:58:21'),
(17, 'Ankit', '', 'Kumar', 'Ankit', 'Ankit@gmail.com', 2147483647, '25d55ad283aa400af464c76d713c07ad', '', '', '', '', 'Manager', '', NULL, NULL, 2, '2023-05-10 15:14:29', '2023-05-10 15:14:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `battery_purchase`
--
ALTER TABLE `battery_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epr`
--
ALTER TABLE `epr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epr_set`
--
ALTER TABLE `epr_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_client_id_fk` (`client_id`),
  ADD KEY `sales_user_id_fk` (`user_id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_item_sale_id_fk` (`sales_id`),
  ADD KEY `sales_item_product_id_fk` (`product_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `battery_purchase`
--
ALTER TABLE `battery_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `epr`
--
ALTER TABLE `epr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `epr_set`
--
ALTER TABLE `epr_set`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_client_id_fk` FOREIGN KEY (`client_id`) REFERENCES `client_list` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `sales_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD CONSTRAINT `sales_item_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sales_item_sale_id_fk` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
