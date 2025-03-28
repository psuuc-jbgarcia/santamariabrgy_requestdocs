-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 04:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websys2mtr`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `admiid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `passwords` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`admiid`, `username`, `passwords`, `name`) VALUES
(1, 'admin', 'admin123', 'Jeric');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(11) NOT NULL,
  `new_requests` tinyint(4) DEFAULT 0,
  `last_checked` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `tracking_code` varchar(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `income` varchar(1212) NOT NULL,
  `pick_up_date` date DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `recipent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `tracking_code`, `full_name`, `occupation`, `income`, `pick_up_date`, `purpose`, `type`, `status`, `date`, `username`, `email`, `recipent`) VALUES
(45, '168146', 'DSF SDF SDF', '1', '1', '2024-04-13', 'asasa', 'Indigency Certificate', 'Released', '2024-04-13 20:07:45', 'try123asasas', 'admingarcia@gmail.comasasasas', 'Myself'),
(46, '749772', 'DSF SDF SDF', 'sdf', '12', '2024-04-19', 'sds', 'Indigency Certificate', 'Released', '2024-04-13 20:08:14', 'try123asasas', 'admingarcia@gmail.comasasasas', 'Jerico'),
(47, '829162', 'Jerico B Garcia', '12', '12', '2024-05-01', 'as', 'Indigency Certificate', 'Pending', '2024-04-13 20:44:08', 'try123', 'gjeric54321@gmail.com', 'Myself'),
(48, '550365', 'Jerico B Garcia', '1', '12', '2024-04-11', '12', 'Indigency Certificate', 'Pending', '2024-04-15 09:42:54', 'try123', 'gjeric54321@gmail.com', 'Myself'),
(49, '635440', 'Jerico B Garcia', 'DFG', '1212', '2024-04-19', 'DFG', 'Indigency Certificate', 'Pending', '2024-04-15 21:11:47', 'try123', 'gjeric54321@gmail.com', 'Myself');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `cid` int(11) NOT NULL,
  `tracking_code` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `pickup_date` varchar(100) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `recipent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`cid`, `tracking_code`, `fullname`, `pickup_date`, `purpose`, `type`, `status`, `username`, `date`, `email`, `recipent`) VALUES
(186, '240471', 'ASD ASD ASD', '2024-03-16', '12', 'Barangay Clearance', 'Released', 'try123', '2024-03-31 10:20:45', 'gjeric54321@gmail.com', ''),
(187, '220689', 'Jerico b Garcia', '2024-04-26', 'BASTA', 'Barangay Clearance', 'Released', 'present123', '2024-04-01 20:23:46', 'garciajerico217@gmail.com', ''),
(188, '661975', 'ASD ASD ASD', '2024-04-18', 'asdasdas', 'Barangay Clearance', 'Released', 'try123', '2024-04-01 20:45:34', 'gjeric54321@gmail.com', ''),
(189, '213622', 'Jerico B Garcia', '2024-04-26', 'For my enrollment', 'Barangay Clearance', 'Released', 'try123', '2024-04-02 09:52:59', 'gjeric54321@gmail.com', ''),
(191, '950262', 'Jerico Bgfh Garcia', '2024-04-12', 'vbvb', 'Barangay Clearance', 'Released', 'try123', '2024-04-08 21:34:07', 'gjeric54321@gmail.com', 'mother'),
(192, '340893', 'Jerico Bgfh Garcia', '2024-04-28', 'asas', 'Barangay Clearance', 'Released', 'try123', '2024-04-08 21:40:11', 'gjeric54321@gmail.com', 'son'),
(193, '214578', 'Jerico B Garcia', '2024-03-18', 'vc', 'Barangay Clearance', 'Released', 'try123', '2024-04-10 18:10:16', 'gjeric54321@gmail.com', 'Myself'),
(194, '694893', 'Jerico B Garcia', '2024-04-20', 'asdasd', 'Barangay Clearance', 'Released', 'try123', '2024-04-11 20:44:52', 'gjeric54321@gmail.com', 'Myself'),
(195, '938217', 'Jerico B Garcia', '2024-05-01', 'asdasd', 'Barangay Clearance', 'Pending', 'try123', '2024-04-12 18:34:41', 'gjeric54321@gmail.com', 'asdasd'),
(198, '188371', 'Jerico B Garcia', '2024-04-16', 'hjhjh', 'Barangay Clearance', 'Released', 'try123', '2024-04-12 18:39:08', 'gjeric54321@gmail.com', ''),
(199, '619748', 'Jerico B Garcia', '2024-04-18', 'kjkj', 'Barangay Clearance', 'Released', 'try123', '2024-04-12 18:39:48', 'gjeric54321@gmail.com', 'grace'),
(200, '741805', 'Jerico B Garcia', '2024-04-12', 'l,kl,m', 'Barangay Clearance', 'Released', 'try123', '2024-04-12 18:42:37', 'gjeric54321@gmail.com', 'm,m,'),
(201, '693392', 'Jerico B Garcia', '2024-05-02', 'ddsfsdfsdf', 'Barangay Clearance', 'Released', 'try123', '2024-04-12 18:52:34', 'gjeric54321@gmail.com', 'Myself'),
(202, '890724', 'DSF SDF SDF', '2024-04-24', 'ASASAS', 'Barangay Clearance', 'Released', 'try123asasas', '2024-04-13 19:52:56', 'admingarcia@gmail.comasasasas', 'grace'),
(203, '432056', 'DSF SDF SDF', '2024-05-01', 'DF', 'Barangay Clearance', 'Released', 'try123asasas', '2024-04-13 19:54:59', 'admingarcia@gmail.comasasasas', 'Myself'),
(204, '798978', 'Jerico B Garcia', '2024-04-12', 'ASD', 'Barangay Clearance', 'Pending', 'try123', '2024-04-15 16:23:38', 'gjeric54321@gmail.com', 'ASDAD');

-- --------------------------------------------------------

--
-- Table structure for table `document_logs`
--

CREATE TABLE `document_logs` (
  `id` int(11) NOT NULL,
  `tracking_code` varchar(50) DEFAULT NULL,
  `new_status` varchar(50) DEFAULT NULL,
  `request_type` varchar(50) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_logs`
--

INSERT INTO `document_logs` (`id`, `tracking_code`, `new_status`, `request_type`, `admin_name`, `timestamp`, `email`) VALUES
(72, '346564', 'Process', 'Residency Certificate', 'Jeric', '2024-04-13 05:59:00', 'gjeric54321@gmail.com'),
(73, '741805', 'Released', 'Barangay Clearance', 'Jeric', '2024-04-13 06:00:32', 'gjeric54321@gmail.com'),
(74, '741805', 'Released', 'Barangay Clearance', 'Jeric', '2024-04-13 06:00:32', 'gjeric54321@gmail.com'),
(75, '883923', 'Process', 'Business Permit', 'Jeric', '2024-04-13 06:01:10', 'gjeric54321@gmail.com'),
(76, '883923', 'Process', 'Business Permit', 'Jeric', '2024-04-13 06:01:10', 'gjeric54321@gmail.com'),
(77, '811186', 'Process', NULL, 'Jeric', '2024-04-13 06:01:24', 'gjeric54321@gmail.com'),
(78, '811186', 'Process', NULL, 'Jeric', '2024-04-13 06:01:24', 'gjeric54321@gmail.com'),
(79, '890724', 'Released', 'Barangay Clearance', 'Jeric', '2024-04-13 06:01:36', 'admingarcia@gmail.comasasasas'),
(80, '890724', 'Released', 'Barangay Clearance', 'Jeric', '2024-04-13 06:01:36', 'admingarcia@gmail.comasasasas'),
(81, '432056', 'Process', 'Barangay Clearance', 'Jeric', '2024-04-13 06:03:33', 'admingarcia@gmail.comasasasas'),
(82, '432056', 'Ready to Pick Up', 'Barangay Clearance', 'Jeric', '2024-04-13 06:03:48', 'admingarcia@gmail.comasasasas'),
(83, '432056', 'Released', 'Barangay Clearance', 'Jeric', '2024-04-13 06:04:02', 'admingarcia@gmail.comasasasas'),
(84, '432056', 'Pending', 'Barangay Clearance', 'Jeric', '2024-04-13 06:04:18', 'admingarcia@gmail.comasasasas'),
(85, '432056', 'Process', 'Barangay Clearance', 'Jeric', '2024-04-13 06:04:24', 'admingarcia@gmail.comasasasas'),
(86, '132228', 'Process', NULL, 'Jeric', '2024-04-13 06:05:07', 'admingarcia@gmail.comasasasas'),
(87, '132228', 'Process', NULL, 'Jeric', '2024-04-13 06:05:07', 'admingarcia@gmail.comasasasas'),
(88, '132228', 'Released', NULL, 'Jeric', '2024-04-13 06:05:11', 'admingarcia@gmail.comasasasas'),
(89, '132228', 'Released', NULL, 'Jeric', '2024-04-13 06:05:11', 'admingarcia@gmail.comasasasas'),
(90, '432056', 'Pending', 'Barangay Clearance', 'Jeric', '2024-04-13 06:05:15', 'admingarcia@gmail.comasasasas'),
(91, '432056', 'Pending', 'Barangay Clearance', 'Jeric', '2024-04-13 06:05:15', 'admingarcia@gmail.comasasasas'),
(92, '132228', 'Process', NULL, 'Jeric', '2024-04-13 06:05:20', 'admingarcia@gmail.comasasasas'),
(93, '132228', 'Process', NULL, 'Jeric', '2024-04-13 06:05:20', 'admingarcia@gmail.comasasasas'),
(94, '768840', 'Pending', 'Residency Certificate', 'Jeric', '2024-04-13 06:05:24', 'gjeric54321@gmail.com'),
(95, '768840', 'Pending', 'Residency Certificate', 'Jeric', '2024-04-13 06:05:24', 'gjeric54321@gmail.com'),
(96, '751896', 'Process', 'Business Permit', 'Jeric', '2024-04-13 06:05:32', 'gjeric54321@gmail.com'),
(97, '751896', 'Process', 'Business Permit', 'Jeric', '2024-04-13 06:05:32', 'gjeric54321@gmail.com'),
(98, '132228', 'Released', NULL, 'Jeric', '2024-04-13 06:05:35', 'admingarcia@gmail.comasasasas'),
(99, '132228', 'Released', NULL, 'Jeric', '2024-04-13 06:05:35', 'admingarcia@gmail.comasasasas'),
(100, '132228', 'Process', NULL, 'Jeric', '2024-04-13 06:05:46', 'admingarcia@gmail.comasasasas'),
(101, '132228', 'Process', NULL, 'Jeric', '2024-04-13 06:05:46', 'admingarcia@gmail.comasasasas'),
(102, '132228', 'Released', NULL, 'Jeric', '2024-04-13 06:06:20', 'admingarcia@gmail.comasasasas'),
(103, '132228', 'Released', NULL, 'Jeric', '2024-04-13 06:06:20', 'admingarcia@gmail.comasasasas'),
(104, '432056', 'Process', 'Barangay Clearance', 'Jeric', '2024-04-13 06:06:49', 'admingarcia@gmail.comasasasas'),
(105, '432056', 'Process', 'Barangay Clearance', 'Jeric', '2024-04-13 06:06:49', 'admingarcia@gmail.comasasasas'),
(106, '694801', 'Process', NULL, 'Jeric', '2024-04-13 06:06:51', 'admingarcia@gmail.comasasasas'),
(107, '694801', 'Process', NULL, 'Jeric', '2024-04-13 06:06:51', 'admingarcia@gmail.comasasasas'),
(108, '168146', 'Process', NULL, 'Jeric', '2024-04-13 06:08:35', 'admingarcia@gmail.comasasasas'),
(109, '749772', 'Process', NULL, 'Jeric', '2024-04-13 06:08:39', 'admingarcia@gmail.comasasasas'),
(110, '749772', 'Pending', NULL, 'Jeric', '2024-04-13 06:08:41', 'admingarcia@gmail.comasasasas'),
(111, '432056', 'Pending', 'Barangay Clearance', 'Jeric', '2024-04-13 06:08:44', 'admingarcia@gmail.comasasasas'),
(112, '768840', 'Process', 'Residency Certificate', 'Jeric', '2024-04-13 06:08:54', 'gjeric54321@gmail.com'),
(113, '950262', 'Process', 'Barangay Clearance', 'Jeric', '2024-04-13 06:09:01', 'gjeric54321@gmail.com'),
(114, '432056', 'Process', 'Barangay Clearance', 'Jeric', '2024-04-13 06:09:04', 'admingarcia@gmail.comasasasas'),
(115, '749772', 'Process', NULL, 'Jeric', '2024-04-13 06:09:40', 'admingarcia@gmail.comasasasas'),
(116, '749772', 'Released', NULL, 'Jeric', '2024-04-13 06:10:00', 'admingarcia@gmail.comasasasas'),
(117, '749772', 'Pending', NULL, 'Jeric', '2024-04-13 06:10:15', 'admingarcia@gmail.comasasasas'),
(118, '432056', 'Released', 'Barangay Clearance', 'Jeric', '2024-04-13 06:11:34', 'admingarcia@gmail.comasasasas'),
(119, '749772', 'Released', NULL, 'Jeric', '2024-04-13 06:11:38', 'admingarcia@gmail.comasasasas'),
(120, '168146', 'Released', NULL, 'Jeric', '2024-04-13 06:12:49', 'admingarcia@gmail.comasasasas'),
(121, '168146', 'Released', NULL, 'Jeric', '2024-04-13 06:12:49', 'admingarcia@gmail.comasasasas'),
(122, '749772', 'Pending', 'Indigency Certificates', 'Jeric', '2024-04-13 06:14:22', 'admingarcia@gmail.comasasasas'),
(123, '749772', 'Released', 'Indigency Certificates', 'Jeric', '2024-04-13 06:14:36', 'admingarcia@gmail.comasasasas'),
(124, '346564', 'Pending', 'Residency Certificate', 'Jeric', '2024-04-13 06:14:54', 'gjeric54321@gmail.com'),
(125, '346564', 'Process', 'Residency Certificate', 'Jeric', '2024-04-13 06:14:56', 'gjeric54321@gmail.com'),
(126, '346564', 'Released', 'Residency Certificate', 'Jeric', '2024-04-13 06:15:07', 'gjeric54321@gmail.com'),
(127, '950262', 'Released', 'Barangay Clearance', 'Jeric', '2024-04-13 06:15:38', 'gjeric54321@gmail.com'),
(128, '768840', 'Released', 'Residency Certificate', 'Jeric', '2024-04-14 07:49:26', 'gjeric54321@gmail.com'),
(129, '550365', 'Process', 'Indigency Certificates', 'Jeric', '2024-04-14 19:47:30', 'gjeric54321@gmail.com'),
(130, '550365', 'Pending', 'Indigency Certificates', 'Jeric', '2024-04-14 20:21:19', 'gjeric54321@gmail.com'),
(131, '269399', 'Process', 'Residency Certificate', 'Jeric', '2024-04-15 02:34:21', 'gjeric54321@gmail.com'),
(132, '269399', 'Released', 'Residency Certificate', 'Jeric', '2024-05-01 19:11:11', 'gjeric54321@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_email`, `message`, `created_at`, `is_read`) VALUES
(89, 'admingarcia@gmail.comasasasas', 'Your  document request with tracking code 168146 is now Released.', '2024-04-13 06:12:49', 1),
(90, 'admingarcia@gmail.comasasasas', 'Your Indigency Certificates document request with tracking code 749772 is now Pending.', '2024-04-13 06:14:22', 1),
(91, 'admingarcia@gmail.comasasasas', 'Your Indigency Certificates document request with tracking code 749772 is now Released.', '2024-04-13 06:14:36', 1),
(92, 'gjeric54321@gmail.com', 'Your Residency Certificate document request with tracking code 346564 is now Pending.', '2024-04-13 06:14:54', 1),
(93, 'gjeric54321@gmail.com', 'Your Residency Certificate document request with tracking code 346564 is now Process.', '2024-04-13 06:14:56', 1),
(94, 'gjeric54321@gmail.com', 'Your Residency Certificate document request with tracking code 346564 is now Released.', '2024-04-13 06:15:07', 1),
(95, 'gjeric54321@gmail.com', 'Your Barangay Clearance document request with tracking code 950262 is now Released.', '2024-04-13 06:15:38', 1),
(96, 'gjeric54321@gmail.com', 'Your Residency Certificate document request with tracking code 768840 is now Released.', '2024-04-14 07:49:26', 1),
(97, 'gjeric54321@gmail.com', 'Your Indigency Certificates document request with tracking code 550365 is now Process.', '2024-04-14 19:47:30', 1),
(98, 'gjeric54321@gmail.com', 'Your Indigency Certificates document request with tracking code 550365 is now Pending.', '2024-04-14 20:21:19', 1),
(99, 'gjeric54321@gmail.com', 'Your Residency Certificate document request with tracking code 269399 is now Process.', '2024-04-15 02:34:21', 1),
(100, 'gjeric54321@gmail.com', 'Your Residency Certificate document request with tracking code 269399 is now Released.', '2024-05-01 19:11:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `doctype` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `doctype`, `email`, `date_paid`) VALUES
(93, 1000, 'as', 'aas', '2024-04-24 10:19:25'),
(94, 1, 'brgyClearance', 'gjeric54321@gmail.com', '2024-03-31 10:24:19'),
(95, 100, 'brgyClearance', 'gjeric54321@gmail.com', '2024-04-01 20:32:20'),
(96, 100, 'brgyClearance', 'gjeric54321@gmail.com', '2024-04-01 20:32:42'),
(97, 100, 'brgyClearance', 'gjeric54321@gmail.com', '2024-04-01 20:51:13'),
(98, 100, 'businessPermit', 'gjeric54321@gmail.com', '2024-04-13 19:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

CREATE TABLE `permits` (
  `id` int(11) NOT NULL,
  `tracking_code` varchar(100) DEFAULT NULL,
  `business_owner_full_name` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_nature` text DEFAULT NULL,
  `date_applied` datetime DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `date` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `recipent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permits`
--

INSERT INTO `permits` (`id`, `tracking_code`, `business_owner_full_name`, `business_name`, `business_nature`, `date_applied`, `type`, `status`, `username`, `date`, `email`, `recipent`) VALUES
(20, '991390', 'ASD ASD ASD', 'asa', 'sasas', '2024-02-29 00:00:00', 'Business Permit', 'Released', 'try123', '2024-03-30 21:06:06', 'gjeric54321@gmail.com', ''),
(21, '530040', 'ASD ASD ASD', 'ASASA', 'ASASAS', '2024-04-18 00:00:00', 'Business Permit', 'Released', 'try123', '2024-04-01 20:31:13', 'gjeric54321@gmail.com', ''),
(22, '931351', 'Jerico B Garcia', 'MCDO', 'FOOD', '2024-04-25 00:00:00', 'Business Permit', 'Released', 'try123', '2024-04-02 09:53:11', 'gjeric54321@gmail.com', ''),
(26, '883923', 'Jerico Bgfh Garcia', 'AS', 'AS', '2024-05-09 00:00:00', 'Business Permit', 'Process', 'try123', '2024-04-08 22:17:49', 'gjeric54321@gmail.com', 'Myself'),
(27, '764996', 'Jerico B Garcia', 'rt', 'tr', '2024-04-10 00:00:00', 'Business Permit', 'Released', 'try123', '2024-04-10 17:53:54', 'gjeric54321@gmail.com', 'Mother'),
(28, '339823', 'Jerico B Garcia', 'xd', 'f', '2024-03-06 00:00:00', 'Business Permit', 'Released', 'try123', '2024-04-10 18:11:06', 'gjeric54321@gmail.com', 'Myself'),
(29, '194103', 'Jerico B Garcia', 'asdsad', 'asdasdsad', '2024-04-24 00:00:00', 'Business Permit', 'Released', 'try123', '2024-04-12 19:07:28', 'gjeric54321@gmail.com', 'Myself'),
(30, '751896', 'Jerico B Garcia', 'asd', 'asd', '2024-04-12 00:00:00', 'Business Permit', 'Process', 'try123', '2024-04-12 19:08:55', 'gjeric54321@gmail.com', 'jeje');

-- --------------------------------------------------------

--
-- Table structure for table `personalinformation`
--

CREATE TABLE `personalinformation` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `registered_voter` enum('YES','NO') DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `household_number` varchar(255) DEFAULT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personalinformation`
--

INSERT INTO `personalinformation` (`id`, `alias`, `place_of_birth`, `birthdate`, `age`, `religion`, `citizenship`, `civil_status`, `occupation`, `registered_voter`, `contact_number`, `household_number`, `username`) VALUES
(63, 'ASD', 'ASDS', '2024-03-14', 111, 'SD', 'ASD', 'ASD', 'asd', 'YES', 'ASD', 'ASDCC', 'try123'),
(65, 'JERICSD', 'PAYASSD', '2024-04-17', 18, 'catholic', 'Filipino', 'single', 'student', 'YES', '678678', 'payas', 'present123'),
(66, 'SDF', 'SDF', '2024-04-26', 0, 'SDF', 'SDF', 'SDF', 'DF', 'YES', 'SDF', 'SDF', 'adminASDASD'),
(67, 'ASD', 'asd', '2024-04-02', 0, 'asd', 'asd', 'asd', 'asd', 'YES', 'asd', 'asd', 'try123121212'),
(68, 'ASD', 'asd', '2024-04-02', 0, 'asd', 'asd', 'asd', 'asd', 'YES', 'asd', 'asd', 'try123121212'),
(69, 'asd', 'a', '2024-04-09', 0, 'asd', 'asd', 'asd', 'asd', 'YES', 'asd', 'asd', 'try123121212'),
(70, 'ASAS', 'ASAS', '2024-04-18', 1, 'AS', 'ASAS', 'AS', 'ASA', 'YES', 'AS', 'asas', 'try123asdasdas'),
(71, 'dxf', 'dsfsd', '2024-04-15', 0, 'sdf', 'sdf', 'sdf', 'sdf', 'YES', 'sdf', 'sdf', 'asdasdasd'),
(72, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(73, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(74, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(75, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(76, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(77, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(78, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(79, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(80, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(81, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(82, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(83, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(84, 'ASD', 'ASD', '2024-04-08', 0, 'ASD', 'ASD', 'ASD', 'ASD', 'YES', 'ASD', 'ASD', 'asdasd'),
(85, 'FGH', 'FGH', '2024-04-21', 0, 'FGH', 'FGH', 'FGH', 'FGH', 'YES', 'FGH', 'FGH', 'asdasd'),
(93, 'df', 'df', '2024-04-20', 0, 'df', 'df', 'df', 'df', 'NO', 'df', 'd', 'ASD');

-- --------------------------------------------------------

--
-- Table structure for table `residency`
--

CREATE TABLE `residency` (
  `id` int(11) NOT NULL,
  `tracking_code` varchar(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `pickup_date` varchar(100) NOT NULL,
  `purpose` text DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `recipent` varchar(100) NOT NULL,
  `date_requested` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residency`
--

INSERT INTO `residency` (`id`, `tracking_code`, `full_name`, `pickup_date`, `purpose`, `type`, `status`, `username`, `email`, `recipent`, `date_requested`) VALUES
(23, '491159', 'Jerico B Garcia', '2024-01-18', 'asdasd', 'Residency Certificate', 'Released', 'try123', 'gjeric54321@gmail.com', 'Myself', '2024-04-10 18:14:07'),
(24, '768840', 'Jerico B Garcia', '2024-04-24', 'asdasd', 'Residency Certificate', 'Released', 'try123', 'gjeric54321@gmail.com', 'Myself', '2024-04-12 19:11:06'),
(25, '346564', 'Jerico B Garcia', '2024-04-12', 'asdsad', 'Residency Certificate', 'Released', 'try123', 'gjeric54321@gmail.com', 'bby', '2024-04-12 19:11:19'),
(26, '269399', 'Jerico B Garcia', '2024-04-19', 'asd', 'Residency Certificate', 'Released', 'try123', 'gjeric54321@gmail.com', 'Myself', '2024-04-15 16:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `suggestion` text NOT NULL,
  `date_requested` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `name`, `email`, `suggestion`, `date_requested`) VALUES
(8, 'JERICO B GARCIA', 'garciajerico217@gmail.com', 'ASAS', '2024-03-27 21:15:55'),
(9, 'Jerico B Garcia', 'garciajerico217@gmail.com', 'pangit', '2024-03-29 14:06:33'),
(10, 'Jerico B Garcia', 'garciajerico217@gmail.com', 'WSDSDS', '2024-03-29 14:38:45'),
(11, 'Jerico B Garcia', 'garciajerico217@gmail.com', 'ssssssssssssssssssssssssssssssss', '2024-03-30 09:20:45'),
(12, 'ASD ASD ASD', 'gjeric54321@gmail.com', 'ASASA', '2024-03-30 21:28:31'),
(13, 'Jerico b Garcia', 'garciajerico217@gmail.com', 'AZJSDOIASDIASDASDIAOD', '2024-04-01 20:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `passwords`, `fname`, `mname`, `lname`, `gender`, `purok`, `barangay`, `profile_picture`) VALUES
(139, 'try123', 'gjeric54321@gmail.com', '$2y$10$XPv1gmguKpf/VU0Yqw7Ux.z0QMSODSHsv7xnTjRoChWwfH1aUkqCi', 'Jerico', 'B', 'Garcia', 'male', 'Purok 1', 'Alipangpang', '661a6f7f3514b.png'),
(190, 'user1', 'user1@example.com', '', 'John', 'Doe', 'Smith', '', '', 'Barangay 1', ''),
(201, 'present123', 'garciajerico217@gmail.com', '$2y$10$YzVcMuqroCQJGvcQaJOQH.8m4EcPXa2nRyUgdRfOyi44FVBpSuW72', 'JericoSD', 'bSD', 'GarciaSD', 'male', 'Purok 1', 'Alipangpang', '660aa80f0c826.png'),
(202, 'adminASDASD', 'jericgarcia07@yahoo.comASDASDA', '$2y$10$I4Q2VTDH/La9H9nfzfKQguGf.Cuzl7w4RodLgSfNjGORk52YnEGMW', 'ASDF', 'SDF', 'SDF', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png'),
(203, 'try123121212', 'admingarcia@gmail.comASAS', '$2y$10$1b0Bqa6hZUds0I7mjoZuEOV5sOUGHBrhF1WwLZ4W60O6rfzC84T7K', 'SDF', 'ASD', 'ASD', 'male', 'Purok 1', 'Alipangpang', 'snapshot_1712561468.jpg'),
(204, 'try123asd', 'admingarcia@gmail.comasdasd', '$2y$10$53VB/ZHdXcJPv2qXlb8sz.SWyb5S1nnwzqqPlAaAmo5tIbtKyzngW', 'DAS', 'DASD', 'ASD', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png'),
(205, 'jerico123sdfsdfsdf', 'admingarcia@gmail.comsdfsdfsdf', '$2y$10$Iwh5xM5qu0461XqRHBZVp.R2zHjqH/9ueIxIhpCtGfitvMnPnZBte', 'DSF', 'SDF', 'SDF', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png'),
(206, 'try123asdasdas', 'gjeric54321@gmail.comasdasdas', '$2y$10$FdZ89MKihEsgjRHDllT3T.KzdJKGBeuI1MeLi6iG/HqMTIcnN4z9m', 'ASD', 'ASD', 'ASD', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png'),
(207, 'asdasdasd', 'gjeric54321@gmail.comasdadasda', '$2y$10$RdK7qS0jFCZL6hDqDZvhVO6CRAvZtmNfajlnC1Z.x8mcboAKy2cGG', 'SAD', 'ASD', 'ASD', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png'),
(208, 'asdasd', 'asdasd@email.comasdasdasd', '$2y$10$szgMIoCp1LWhq.ovx8fiLOIbGa9zneeCih9dUlpt2KO4PyYzDXXEm', 'DAF', 'SDFSD', 'FSD', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png'),
(209, 'ASD', 'asdasd@email.comASDASD', '$2y$10$kaX.0z5NDNM6GVXtOU4Oi.lBsip.xYGskfCJV5Wge3utnQNle4/Yy', 'SDF', 'SDF', 'SDF', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png'),
(210, 'try123asasas', 'admingarcia@gmail.comasasasas', '$2y$10$IhALDBYubiBtDgKhowYDcO6nIVZg7STzc/RV0w/24qloN5u/vKfw6', 'DSF', 'SDF', 'SDF', 'male', 'Purok 1', 'Alipangpang', 'defaultpic.png');

-- --------------------------------------------------------

--
-- Table structure for table `walkinrequests`
--

CREATE TABLE `walkinrequests` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `visitorEmail` varchar(255) NOT NULL,
  `documentType` varchar(50) NOT NULL,
  `purpose` text DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `income` decimal(10,2) DEFAULT NULL,
  `businessName` varchar(255) DEFAULT NULL,
  `businessNature` varchar(255) DEFAULT NULL,
  `submissionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `brgy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkinrequests`
--

INSERT INTO `walkinrequests` (`id`, `firstName`, `middleName`, `lastName`, `contactNumber`, `visitorEmail`, `documentType`, `purpose`, `occupation`, `income`, `businessName`, `businessNature`, `submissionDate`, `brgy`) VALUES
(14, 'as', 'as', 'as', 'as', 'as', 'Barangay Clearance', 'asa', '', '0.00', '', '', '2024-04-15 08:53:45', 'as'),
(15, 'as', 'as', 'as', 'as', 'as', 'Business Permit', '', '', '0.00', 'as', 'as', '2024-04-15 08:54:33', 'as'),
(16, 'as', 'as', 'as', 'as', 'as', 'Barangay Clearance', 'asas', '', '0.00', '', '', '2024-04-15 08:54:57', 'Pyas'),
(17, 'asa', 'asa', 'asa', 'as', 'asas', 'Business Permit', '', '', '0.00', 'd', 'asd', '2024-04-15 09:00:27', 'dcfsdf'),
(18, 'asa', 'asa', 'asa', 'as', 'asas', 'Business Permit', '', '', '0.00', 'd', 'asd', '2024-04-15 09:00:32', 'dcfsdf'),
(20, 'zxc', 'zxc', 'zxc', 'zxc', 'zxc', 'Indigency Certificate', 'asd', 'asd', '121.00', '', '', '2024-04-15 09:22:44', 'asd'),
(21, 'Jerico', 'b', 'Garcia', '678678', 'fgfgh', 'Residency Certificate', 'sasasasa', '', '0.00', '', '', '2024-04-15 12:40:33', 'Pyas'),
(22, 'asd', 'asd', 'asd', 'asd', 'asd', 'Residency Certificate', 'asdasd', '', '0.00', '', '', '2024-04-15 12:45:47', 'asd'),
(23, 'asd', 'asd', 'asd', 'asd', 'asd@gmail,com', 'Residency Certificate', 'asdasd', '', '0.00', '', '', '2024-04-15 12:47:43', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`admiid`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `document_logs`
--
ALTER TABLE `document_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permits`
--
ALTER TABLE `permits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalinformation`
--
ALTER TABLE `personalinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residency`
--
ALTER TABLE `residency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walkinrequests`
--
ALTER TABLE `walkinrequests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminaccount`
--
ALTER TABLE `adminaccount`
  MODIFY `admiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `document_logs`
--
ALTER TABLE `document_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `permits`
--
ALTER TABLE `permits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personalinformation`
--
ALTER TABLE `personalinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `residency`
--
ALTER TABLE `residency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `walkinrequests`
--
ALTER TABLE `walkinrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
