-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2024 at 01:29 PM
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
-- Database: `dashlite_temp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulk_sms_api`
--

CREATE TABLE `bulk_sms_api` (
  `sms_api_id` int(200) NOT NULL,
  `sms_api_provider` varchar(200) NOT NULL,
  `sms_sender_id` varchar(200) NOT NULL,
  `sms_api_client_id` varchar(200) NOT NULL,
  `sms_api_client_key` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bulk_sms_api`
--

INSERT INTO `bulk_sms_api` (`sms_api_id`, `sms_api_provider`, `sms_sender_id`, `sms_api_client_id`, `sms_api_client_key`) VALUES
(1, 'DMA', 'MAKUENI_GOV', 'makuenigovt', '13sIXeyKNtqJwimj6vnL2z8OQWU04g9dPT7DkGVfobc5HYpF');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(200) NOT NULL,
  `log_user_id` int(200) NOT NULL,
  `log_user_type` varchar(200) NOT NULL,
  `log_date` varchar(200) NOT NULL,
  `log_ip_address` varchar(200) NOT NULL,
  `log_device` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_user_id`, `log_user_type`, `log_date`, `log_ip_address`, `log_device`) VALUES
(1, 6, 'System Administrator', '2024-10-15 10:12:01', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(2, 6, 'System Administrator', '2024-10-15 10:37:36', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(3, 6, 'System Administrator', '2024-10-15 12:03:52', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(4, 6, 'System Administrator', '2024-10-17 09:39:11', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(5, 6, 'System Administrator', '2024-10-17 19:52:39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(6, 75, 'Executive', '2024-10-17 20:02:09', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(7, 6, 'System Administrator', '2024-10-17 20:03:07', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(8, 76, 'ECDE Officer', '2024-10-17 20:27:09', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(9, 6, 'System Administrator', '2024-10-17 20:39:42', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(10, 6, 'System Administrator', '2024-10-17 21:56:41', '216.128.0.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(11, 80, 'System Administrator', '2024-10-17 22:07:31', '91.102.180.60', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/129.0.6668.69 Mobile/15E148 Safari/604.1'),
(12, 87, 'ECDE Officer', '2024-10-17 22:13:45', '41.90.5.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(13, 87, 'ECDE Officer', '2024-10-17 22:25:04', '41.90.5.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0'),
(14, 87, 'ECDE Officer', '2024-10-17 22:26:29', '41.90.5.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(15, 6, 'System Administrator', '2024-10-18 06:54:07', '216.128.0.22', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(16, 84, 'System Administrator', '2024-10-18 08:42:05', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(17, 85, 'System Administrator', '2024-10-18 08:50:31', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(18, 87, 'ECDE Officer', '2024-10-18 10:16:59', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(19, 6, 'System Administrator', '2024-10-18 22:07:35', '216.128.0.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(20, 6, 'System Administrator', '2024-10-19 23:21:40', '216.128.0.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(21, 6, 'System Administrator', '2024-10-21 17:34:56', '216.128.0.42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(22, 87, 'ECDE Officer', '2024-10-22 08:58:17', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(23, 83, 'System Administrator', '2024-10-22 09:00:25', '41.90.4.222', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(24, 80, 'System Administrator', '2024-10-22 09:14:29', '216.128.0.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(25, 88, 'Executive', '2024-10-22 09:20:39', '216.128.0.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(26, 88, 'Executive', '2024-10-22 09:21:35', '216.128.0.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(27, 88, 'Executive', '2024-10-22 09:23:42', '105.161.10.160', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0.1 Safari/605.1.15'),
(28, 88, 'Executive', '2024-10-22 09:25:21', '105.161.10.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(29, 88, 'Executive', '2024-10-22 09:41:54', '105.161.10.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(30, 6, 'System Administrator', '2024-10-22 09:54:40', '216.128.0.42', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(31, 80, 'System Administrator', '2024-10-22 10:01:43', '216.128.0.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(32, 83, 'System Administrator', '2024-10-22 10:03:25', '41.90.5.237', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Mobile Safari/537.36'),
(33, 81, 'System Administrator', '2024-10-22 11:50:10', '197.248.93.73', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:131.0) Gecko/20100101 Firefox/131.0'),
(34, 87, 'ECDE Officer', '2024-10-22 11:50:40', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(35, 87, 'ECDE Officer', '2024-10-22 11:52:36', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(36, 6, 'Executive', '2024-10-22 17:15:48', '197.248.93.73', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(37, 6, 'System Administrator', '2024-10-22 17:20:41', '197.248.93.73', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(38, 85, 'System Administrator', '2024-10-23 08:25:40', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(39, 87, 'ECDE Officer', '2024-10-23 08:27:10', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(40, 88, 'Executive', '2024-10-23 08:54:39', '105.161.38.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'),
(41, 80, 'System Administrator', '2024-10-23 09:17:00', '197.248.93.73', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/130.0.6723.37 Mobile/15E148 Safari/604.1'),
(42, 80, 'System Administrator', '2024-10-23 12:20:43', '197.248.93.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36'),
(43, 6, 'System Administrator', '2024-10-23 12:24:14', '216.128.0.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(44, 6, 'System Administrator', '2024-10-23 12:35:32', '216.128.0.123', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:131.0) Gecko/20100101 Firefox/131.0'),
(45, 6, 'System Administrator', '2024-11-11 15:21:07', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:123.0) Gecko/20100101 Firefox/123.0'),
(46, 90, 'System Administrator', '2024-11-11 15:23:53', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:123.0) Gecko/20100101 Firefox/123.0');

-- --------------------------------------------------------

--
-- Table structure for table `mailer_settings`
--

CREATE TABLE `mailer_settings` (
  `id` int(20) NOT NULL,
  `mailer_host` varchar(200) DEFAULT NULL,
  `mailer_port` varchar(200) DEFAULT NULL,
  `mailer_protocol` varchar(200) DEFAULT NULL,
  `mailer_username` varchar(200) DEFAULT NULL,
  `mailer_mail_from_name` varchar(200) DEFAULT NULL,
  `mailer_mail_from_email` varchar(200) DEFAULT NULL,
  `mailer_password` varchar(200) DEFAULT NULL,
  `mailer_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mailer_settings`
--

INSERT INTO `mailer_settings` (`id`, `mailer_host`, `mailer_port`, `mailer_protocol`, `mailer_username`, `mailer_mail_from_name`, `mailer_mail_from_email`, `mailer_password`, `mailer_status`) VALUES
(2, 'rbx109.truehost.cloud', '587', 'tls', 'mailer@devlan.co.ke', 'Government of Makueni County', 'mailer@devlan.co.ke', '20Devlan@22', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `postfix_mailer_configs`
--

CREATE TABLE `postfix_mailer_configs` (
  `postfix_mailer_id` int(200) NOT NULL,
  `postfix_mailer_from_name` varchar(200) NOT NULL,
  `postfix_mailer_from_email` varchar(200) NOT NULL,
  `postfix_mailer_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postfix_mailer_configs`
--

INSERT INTO `postfix_mailer_configs` (`postfix_mailer_id`, `postfix_mailer_from_name`, `postfix_mailer_from_email`, `postfix_mailer_status`) VALUES
(1, 'Government of Makueni County - ECDE MIS', 'info@makueni.go.ke', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sub_county`
--

CREATE TABLE `sub_county` (
  `sub_county_id` int(200) NOT NULL,
  `sub_county_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_county`
--

INSERT INTO `sub_county` (`sub_county_id`, `sub_county_name`) VALUES
(1, 'Makueni'),
(2, 'Mbooni'),
(3, 'Kilome'),
(4, 'Kaiti'),
(5, 'Kibwezi West'),
(6, 'Kibwezi East');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_names` varchar(200) NOT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_phone` varchar(200) NOT NULL,
  `user_access_level` varchar(200) NOT NULL,
  `user_password_reset_token` varchar(200) DEFAULT NULL,
  `user_change_password` int(200) NOT NULL DEFAULT 1,
  `user_account_status` int(5) NOT NULL DEFAULT 0,
  `user_ecde_center_id` int(200) NOT NULL DEFAULT 0,
  `user_employment_category` varchar(200) DEFAULT NULL,
  `user_gender` varchar(200) DEFAULT NULL,
  `user_personal_number` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_names`, `user_email`, `user_password`, `user_phone`, `user_access_level`, `user_password_reset_token`, `user_change_password`, `user_account_status`, `user_ecde_center_id`, `user_employment_category`, `user_gender`, `user_personal_number`) VALUES
(6, 'Martin Mbithi', 'martin.mbithi@makueni.go.ke', '71fbbea0206b21ef688d33f0160602628dab9c7d', '0740847563', 'System Administrator', NULL, 0, 0, 0, '', NULL, NULL),
(80, 'Bosco Mulwa', 'bosco.mulwa@makueni.go.ke', 'adb419e5b033768b6708b7779697e553de4e5941', '0719557519', 'System Administrator', NULL, 0, 0, 0, NULL, NULL, NULL),
(81, 'Alexander Musembi', 'alexander.musembi@makueni.go.ke', 'd6a57260573c7700b68bb5ddb233cebe18a11129', '0716659776', 'System Administrator', NULL, 0, 0, 0, NULL, NULL, NULL),
(82, 'Faith Mumo Kimeu', 'faith.mumo@makueni.go.ke', '71fbbea0206b21ef688d33f0160602628dab9c7d', '0704975742', 'System Administrator', NULL, 1, 0, 0, NULL, NULL, NULL),
(83, 'Winnie Patrick', 'winfred.wausi@makueni.go.ke', 'e8ebccc887d0f51d4e2e9c9a7355ce256e0b03ef', '0720051373', 'System Administrator', NULL, 0, 0, 0, NULL, NULL, NULL),
(84, 'Benjamin Kiendi', 'benjamin.kiendi@makueni.go.ke', 'c77c418a3dd72411e102523495d97ba9a1c42776', '0741168946', 'System Administrator', NULL, 0, 0, 0, NULL, NULL, NULL),
(85, 'Charline Nduva', 'charline.nduva@makueni.go.ke', '75672aa0102d5adf0b4e7437fd75138ed74f038a', '0707409149', 'System Administrator', NULL, 0, 0, 0, NULL, NULL, NULL),
(86, 'Stephen Ndunda', 'stephen.ndunda@makueni.go.ke', '71fbbea0206b21ef688d33f0160602628dab9c7d', '0799119338', 'System Administrator', NULL, 1, 0, 0, NULL, NULL, NULL),
(87, 'Mohammed Kimanthi', 'mohanned.kimanthi@makueni.go.ke', 'c77c418a3dd72411e102523495d97ba9a1c42776', '0798866461', 'ECDE Officer', NULL, 0, 0, 0, NULL, NULL, NULL),
(88, 'Elizabeth N. Muli', 'elizabeth.muli@makueni.go.ke', '2efef88f4330548f1b4b536793d73d1224f0a464', '0722441843', 'Executive', NULL, 0, 0, 0, NULL, NULL, NULL),
(89, 'Sarah Kioko', 'sarah.kioko@makueni.go.ke', '71fbbea0206b21ef688d33f0160602628dab9c7d', '0722597398', 'Executive', NULL, 1, 0, 0, NULL, NULL, NULL),
(90, 'mumo stevn', 'mumostevn@gmail.com', '71fbbea0206b21ef688d33f0160602628dab9c7d', '0704947373', 'System Administrator', NULL, 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` int(200) NOT NULL,
  `ward_sub_couty_id` int(200) NOT NULL,
  `ward_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `ward_sub_couty_id`, `ward_name`) VALUES
(2, 1, 'Wote/Nziu'),
(3, 1, 'Nzaui/Kilili/Kalamba'),
(4, 1, 'Mbitini'),
(5, 1, 'Kikumini/Muvau'),
(6, 1, 'Kathonzweni'),
(7, 1, 'Mavindini'),
(8, 1, 'Kitise/Kithuki'),
(9, 2, 'Mbooni'),
(10, 2, 'Kithungo/Kitundu'),
(11, 2, 'Tulimani'),
(12, 2, 'Kisau/Kiteta'),
(13, 2, 'Kako/Waia'),
(14, 2, 'Kalawa'),
(15, 3, 'Kiima Kiu/Kalanzoni'),
(16, 3, 'Mukaa'),
(17, 3, 'Kasikeu'),
(18, 4, 'Kee'),
(19, 4, 'Kilungu'),
(20, 4, 'Ilima'),
(21, 4, 'Ukia'),
(22, 5, 'Makindu'),
(23, 5, 'Kikumbulyu North'),
(24, 5, 'Kikumbulyu South'),
(25, 5, 'Nguumo'),
(26, 5, 'Emali/Mulala'),
(27, 6, 'Masongaleni'),
(28, 6, 'Mtito Andei'),
(29, 6, 'Thange'),
(30, 6, 'Ivingoni/Nzambani'),
(31, 5, 'Nguu/Masumba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulk_sms_api`
--
ALTER TABLE `bulk_sms_api`
  ADD PRIMARY KEY (`sms_api_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `LogUserIDetails` (`log_user_id`);

--
-- Indexes for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postfix_mailer_configs`
--
ALTER TABLE `postfix_mailer_configs`
  ADD PRIMARY KEY (`postfix_mailer_id`);

--
-- Indexes for table `sub_county`
--
ALTER TABLE `sub_county`
  ADD PRIMARY KEY (`sub_county_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`),
  ADD KEY `Ward_sub_county` (`ward_sub_couty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `postfix_mailer_configs`
--
ALTER TABLE `postfix_mailer_configs`
  MODIFY `postfix_mailer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_county`
--
ALTER TABLE `sub_county`
  MODIFY `sub_county_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `ward_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
