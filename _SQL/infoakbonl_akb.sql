-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2026 at 12:56 AM
-- Server version: 10.6.19-MariaDB-cll-lve
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoakbonl_akb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hashed_password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `hashed_password`) VALUES
(1, 'Developer', 'Developer', 'admin@mail.com', '$2y$10$rmjToDr.t5xIirZ4Vkls2eLwCn9M.164MlElK07KyRFjj5Bx6Q6PK');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `min` decimal(32,2) DEFAULT NULL,
  `max` decimal(32,2) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `min`, `max`, `status`) VALUES
(2, 'JPMorgan Chase & Co.', 0.00, 0.00, 0),
(3, 'Bank of America Corporation', 0.00, 0.00, 0),
(4, 'Industrial and Commercial Bank of China', 0.00, 0.00, 0),
(5, 'China Construction Bank Corporation', 0.00, 0.00, 0),
(6, 'Agricultural Bank of China Limited', 0.00, 0.00, 0),
(7, 'Mitsubishi UFJ Financial Group ', 0.00, 0.00, 0),
(8, 'HSBC Holdings plc', 0.00, 0.00, 0),
(9, 'Wells Fargo & Company', 0.00, 0.00, 0),
(10, 'Bank of China Limited', 0.00, 0.00, 0),
(11, 'Citigroup Inc.', 0.00, 0.00, 0),
(12, 'Banco Santander S.A.', 0.00, 0.00, 0),
(13, 'Goldman Sachs Group, Inc.', 0.00, 0.00, 0),
(14, 'Morgan Stanley', 0.00, 0.00, 0),
(15, 'Royal Bank of Canada ', 0.00, 0.00, 0),
(16, 'Toronto-Dominion Bank', 0.00, 0.00, 0),
(17, 'UBS Group AG', 0.00, 0.00, 0),
(18, 'Banco Bradesco S.A.', 0.00, 0.00, 0),
(19, 'Itaú Unibanco Holding S.A.', 0.00, 0.00, 0),
(20, 'Commonwealth Bank of Australia ', 0.00, 0.00, 0),
(21, 'Westpac Banking Corporation', 0.00, 0.00, 0),
(22, 'BNP Paribas', 0.00, 0.00, 0),
(23, 'Credit Agricole Group', 0.00, 0.00, 0),
(24, 'Sumitomo Mitsui Financial Group', 0.00, 0.00, 0),
(25, 'Mizuho Financial Group, Inc.', 0.00, 0.00, 0),
(26, 'National Australia Bank Limited', 0.00, 0.00, 0),
(27, 'Bank of Communications Co., Ltd.', 0.00, 0.00, 0),
(28, 'Barclays plc', 0.00, 0.00, 0),
(29, 'Banco do Brasil S.A.', 0.00, 0.00, 0),
(30, 'Société Générale ', 0.00, 0.00, 0),
(31, 'China Merchants Bank Co., Ltd.', 0.00, 0.00, 0),
(32, 'Royal Bank of Scotland Group plc', 0.00, 0.00, 0),
(33, 'Sberbank of Russia', 0.00, 0.00, 0),
(34, 'ING Group N.V.', 0.00, 0.00, 0),
(35, 'Nordea Bank Abp', 0.00, 0.00, 0),
(36, 'Lloyds Banking Group plc ', 0.00, 0.00, 0),
(37, 'Deutsche Bank AG', 0.00, 0.00, 0),
(38, 'Bank of Nova Scotia', 0.00, 0.00, 0),
(39, 'UniCredit S.p.A.', 0.00, 0.00, 0),
(40, 'Intesa Sanpaolo S.p.A.', 0.00, 0.00, 0),
(41, 'Banco Bilbao Vizcaya Argentaria, S.A. ', 0.00, 0.00, 0),
(42, 'China Citic Bank Corporation Limited ', 0.00, 0.00, 0),
(43, 'Bank of Montreal', 0.00, 0.00, 0),
(44, 'Australia and New Zealand Banking Group Limited', 0.00, 0.00, 0),
(45, 'Shanghai Pudong Development Bank Co., Ltd.', 0.00, 0.00, 0),
(46, 'KBC Group NV', 0.00, 0.00, 0),
(47, 'BBVA (Banco Bilbao Vizcaya Argentaria) ', 0.00, 0.00, 0),
(48, 'Standard Chartered PLC ', 0.00, 0.00, 0),
(49, 'Crédit Mutuel', 0.00, 0.00, 0),
(50, 'China Everbright Bank Co., Ltd.', 0.00, 0.00, 0),
(51, 'Industrial Bank Co., Ltd.', 0.00, 0.00, 0),
(52, 'The Bank of New York Mellon Corporation', 0.00, 0.00, 0),
(53, 'Capital One Financial Corporation', 0.00, 0.00, 0),
(54, 'PNC Financial Services Group, Inc.', 0.00, 0.00, 0),
(55, 'US Bancorp', 0.00, 0.00, 0),
(56, 'Canadian Imperial Bank of Commerce ', 0.00, 0.00, 0),
(57, 'Banco Safra S.A.', 0.00, 0.00, 0),
(58, 'Banco Inter S.A.', 0.00, 0.00, 0),
(59, 'Banco Original S.A.', 0.00, 0.00, 0),
(60, 'China Zheshang Bank Co., Ltd.', 0.00, 0.00, 0),
(61, 'China Minsheng Banking Corp., Ltd. ', 0.00, 0.00, 0),
(62, 'China Guangfa Bank Co., Ltd. (CGB)', 0.00, 0.00, 0),
(63, 'China Bohai Bank Co., Ltd. ', 0.00, 0.00, 0),
(64, 'China Zhongyuan Bank Co., Ltd.', 0.00, 0.00, 0),
(65, 'Banco Votorantim S.A.', 0.00, 0.00, 0),
(66, 'Bradesco BAC Florida Bank', 0.00, 0.00, 0),
(67, 'Mercantil Bank Holding Corporation ', 0.00, 0.00, 0),
(68, 'Banco do Estado do Rio Grande do Sul S.A.', 0.00, 0.00, 0),
(69, 'Banco do Nordeste do Brasil S.A. (BNB)', 0.00, 0.00, 0),
(70, 'Banpará', 0.00, 0.00, 0),
(71, 'Banese', 0.00, 0.00, 0),
(72, 'Bank of America Merrill Lynch International Limited', 0.00, 0.00, 0),
(73, 'Bank of Ayudhya Public Company Limited (Krungsri)', 0.00, 0.00, 0),
(74, 'Bangkok Bank Public Company Limited', 0.00, 0.00, 0),
(75, 'CIMB Group Holdings Berhad', 0.00, 0.00, 0),
(76, 'DBS Bank Ltd.', 0.00, 0.00, 0),
(77, 'ICICI Bank Limited', 0.00, 0.00, 0),
(78, 'Maybank (Malayan Banking Berhad)', 0.00, 0.00, 0),
(79, 'Public Bank Berhad', 0.00, 0.00, 0),
(80, 'Siam Commercial Bank Public Company Limited', 0.00, 0.00, 0),
(81, 'Hong Leong Bank Berhad', 0.00, 0.00, 0),
(82, 'United Overseas Bank Limited', 0.00, 0.00, 0),
(83, 'Bank Mandiri (Persero) Tbk.', 0.00, 0.00, 0),
(84, 'Bank Rakyat Indonesia (BRI)', 0.00, 0.00, 0),
(85, 'Bank Central Asia (BCA)', 0.00, 0.00, 0),
(86, 'PT Bank CIMB Niaga Tbk', 0.00, 0.00, 0),
(87, 'PT Bank Negara Indonesia (Persero) Tbk', 0.00, 0.00, 0),
(88, 'PT Bank Danamon Indonesia Tbk.', 0.00, 0.00, 0),
(89, 'PT Bank Tabungan Negara (Persero) Tbk.', 0.00, 0.00, 0),
(90, 'PT Bank Mandiri (Persero) Tbk. ', 0.00, 0.00, 0),
(91, 'Bank of Tokyo-Mitsubishi UFJ, Ltd.', 0.00, 0.00, 0),
(92, 'Mizuho Bank, Ltd', 0.00, 0.00, 0),
(93, 'Sumitomo Mitsui Banking Corporation', 0.00, 0.00, 0),
(94, 'Resona Holdings, Inc', 0.00, 0.00, 0),
(95, 'The Chiba Bank, Ltd.', 0.00, 0.00, 0),
(96, 'Bank of Fukuoka, Ltd.', 0.00, 0.00, 0),
(97, 'The Aichi Bank, Ltd.', 0.00, 0.00, 0),
(98, 'The Daishi Bank, Ltd.', 0.00, 0.00, 0),
(99, 'The Hachijuni Bank, Ltd.', 0.00, 0.00, 0),
(100, 'The Joyo Bank, Ltd.', 0.00, 0.00, 0),
(101, 'Rabobank', 0.00, 0.00, 0),
(102, 'ING', 0.00, 0.00, 0),
(103, 'ABN AMRO', 0.00, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `bank_address` varchar(100) DEFAULT NULL,
  `site_currecncy` varchar(10) DEFAULT NULL,
  `swift_key` decimal(9,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `phone`, `email_address`, `bank_address`, `site_currecncy`, `swift_key`) VALUES
(1, 'Chase Loading', '+44 005 000 890', 'support@glitnir.online', 'United Kingdom', '$', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `reciever_bank_name` varchar(100) DEFAULT NULL,
  `reciever_name` varchar(100) DEFAULT NULL,
  `reciever_account_number` varchar(100) DEFAULT NULL,
  `routing_number` varchar(100) DEFAULT NULL,
  `sender_account_number` varchar(100) DEFAULT NULL,
  `amount` decimal(32,2) DEFAULT NULL,
  `Transfer_description` text DEFAULT NULL,
  `otp_code` varchar(200) DEFAULT NULL,
  `transfer_date` varchar(200) DEFAULT NULL,
  `transfer_status` varchar(30) DEFAULT 'Failed',
  `ref_numb` varchar(100) DEFAULT NULL,
  `account_balance` decimal(15,2) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT 0.00,
  `debit` decimal(15,2) DEFAULT 0.00,
  `otp_confirmed` varchar(10) DEFAULT '0',
  `reciver_email` varchar(100) DEFAULT NULL,
  `transfer_type` varchar(100) DEFAULT NULL,
  `alert_sent` varchar(100) DEFAULT NULL,
  `active` varchar(100) DEFAULT '1',
  `otp_2` varchar(30) DEFAULT NULL,
  `recip_name` varchar(200) DEFAULT NULL,
  `recip_nick` varchar(200) DEFAULT NULL,
  `recip_add` varchar(200) DEFAULT NULL,
  `recip_city` varchar(200) DEFAULT NULL,
  `recip_state` varchar(200) DEFAULT NULL,
  `recip_zip` varchar(200) DEFAULT NULL,
  `recip_country` varchar(200) DEFAULT NULL,
  `cot_code` varchar(200) DEFAULT NULL,
  `cot_confirmed` int(11) DEFAULT 0,
  `tax_code` varchar(200) DEFAULT NULL,
  `tax_confirmed` int(11) DEFAULT 0,
  `transaction_type` varchar(200) DEFAULT NULL,
  `rec_bank_address` varchar(200) DEFAULT NULL,
  `rec_bank_state` varchar(200) DEFAULT NULL,
  `rec_bank_country` varchar(200) DEFAULT NULL,
  `swift_code` varchar(200) DEFAULT NULL,
  `currency` varchar(200) DEFAULT NULL,
  `bvt` varchar(200) DEFAULT '',
  `bvt_confirmed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `reciever_bank_name`, `reciever_name`, `reciever_account_number`, `routing_number`, `sender_account_number`, `amount`, `Transfer_description`, `otp_code`, `transfer_date`, `transfer_status`, `ref_numb`, `account_balance`, `credit`, `debit`, `otp_confirmed`, `reciver_email`, `transfer_type`, `alert_sent`, `active`, `otp_2`, `recip_name`, `recip_nick`, `recip_add`, `recip_city`, `recip_state`, `recip_zip`, `recip_country`, `cot_code`, `cot_confirmed`, `tax_code`, `tax_confirmed`, `transaction_type`, `rec_bank_address`, `rec_bank_state`, `rec_bank_country`, `swift_code`, `currency`, `bvt`, `bvt_confirmed`) VALUES
(2, 'Bitcoin', 'berry', '2345678976', '', '6671895044', 32217.00, 'SUB ', '7015', '9/11/2025 9:23 AM', 'Success', '92913603733', 0.00, 0.00, 0.00, '1', 'support@akb-rk.com', 'Debit', '1', '1', '7690', '', '', '', '', '', '', '', '7933', 1, '3844', 1, 'Bitcoin', '', '', '', '', 'EUR', '7182', 1),
(3, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '6671895044', 5000.00, '', '6869', '7/08/2025 2:12 PM', 'Success', '40774601789', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '4607', '', '', '', '', '', '', '', '7933', 0, '3844', 0, 'Bitcoin', '', '', '', '', 'EUR', '7182', 0),
(4, 'Akbank', 'Pinar Anapa', '0006790611', 'TR280004600550001000177767', '6671895044', 450000.00, 'property ', '4891', '9/09/2025 5:45 PM', 'Success', '55765860256', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Credit', '1', '1', '4405', '', '', '', '', '', '', '', '4899', 0, '7252', 0, 'Overseas fund transfer', 'Turkey ', 'Akbank of Turkey', 'Turkey', '', 'USD', '7116', 0),
(5, 'Bitcoin', 'bc1qep9ppnmhjcp5dn8949k37vqepgeqtrpnc6e49q', '', '', '6671895044', 67500.00, 'work ', '7223', 'October 29, 2025 12:00 PM', 'Success', '67753277536', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '9599', '', '', '', '', '', '', '', '2791', 0, '9850', 0, 'Bitcoin', '', '', '', '', 'USD', '2453', 0),
(6, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '6671895044', 79800.00, 'PAY', '8986', '25 NOV 2025 6:21 AM', 'Success', '81361412083', 0.00, 0.00, 0.00, '1', 'support@akb-rk.com', 'Debit', '1', '1', '2079', '', '', '', '', '', '', '', '4899', 1, '7252', 1, 'Bitcoin', '', '', '', '', 'USD', '7116', 1),
(7, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '4871875090', 2500000.00, 'Balance Transfer', '6187', 'December 23, 2025, 12:32 pm', 'Failed', '56990628301', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '3962', '', '', '', '', '', '', '', '3631', 0, '2930', 0, 'Bitcoin', '', '', '', '', 'USD', '9931', 0),
(9, 'VakifBank', 'YUNUS DOGDU', '0177767', 'TR280004600550001000177767', '4871875090', 2500000.00, 'Fund Transfer.', '3361', 'December 23, 2025, 12:47 pm', 'Failed', '85674770195', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '6638', '', '', '', '', '', '', '', '3631', 0, '2930', 0, 'Interbank fund transfer', 'EMEK ADNAN MENDERES MAH.MUDANYA YOLU 9.KM ADAN MENDERES MAH. NO:2EMEK', 'VakifBank of Turkiye', 'Turkey', '', 'USD', '9931', 0),
(12, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '4616', '8 SEP 2025', 'Success', '76837489092', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '6162', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(13, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '4449', '18 NOV 2025', 'Success', '42097337527', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '2358', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(14, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '4789', '11 OCT 2025', 'Success', '87935868588', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '7812', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(15, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '7133', '25 SEP 2025', 'Success', '70560349155', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '3721', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(16, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '5536', '17 SEP 2025', 'Success', '36351206459', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '9480', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(17, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '4489', '15 OCT 2025', 'Success', '98437536540', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '4171', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(18, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '7829', '30 OCT 2025', 'Success', '68071337095', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '4385', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(19, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 10000.00, 'property ', '6936', '15 December 2025', 'Success', '35074442604', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '7595', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(20, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '2894340340', 12000.00, 'FOR FAMILY USE', '1290', '2 December 2025', 'Success', '46658498561', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '5291', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(21, 'Bitcoin', 'bc1qep9ppnmhjcp5dn8949k37vqepgeqtrpnc6e49q', '', '', '2894340340', 32800.00, 'PAY', '5588', '4 NOV 2025', 'Success', '59506224217', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '4437', '', '', '', '', '', '', '', '1845', 0, '5424', 0, 'Bitcoin', '', '', '', '', 'USD', '9003', 0),
(22, 'VakifBank', 'YUNUS DOGDU', '0177767', 'TR280004600550001000177767', '4871875090', 2500000.00, 'Family Support', '7208', 'December 27, 2025, 3:53 am', 'Failed', '53902116246', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '8697', '', '', '', '', '', '', '', '3631', 0, '2930', 0, 'Interbank fund transfer', 'EMEK ADNAN MENDERES MAH.MUDANYA YOLU 9.KM ADAN MENDERES MAH. NO:2EMEK', 'VakifBank of Turkiye', 'Turkey', '', 'USD', '9931', 0),
(23, 'Bitcoin', '17YqYc2bR3KJvEfwoYfXbTUrJiJ9WhvP7Y', '', '', '1692733072', 1000000.00, 'PAY', '2717', 'December 28, 2025, 8:03 pm', 'Failed', '89698312198', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '7761', '', '', '', '', '', '', '', '2019', 0, '1954', 0, 'Bitcoin', '', '', '', '', 'USD', '5058', 0),
(24, 'Akbank', 'Akbank', '', '', '1651416581', 215.00, 'Account Opening ', '5830', '27 December 2025', 'Success', '88935781163', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Credit', '1', '1', '4160', '', '', '', '', '', '', '', '2019', 0, '1954', 0, 'Bitcoin', '', '', '', '', 'USD', '5058', 0),
(25, 'Akbank', 'AKBank', '', '', '4871875090', 215.00, 'Account Opening', '4382', '19 December 2025', 'Success', '53359456452', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Credit', '1', '1', '3131', '', '', '', '', '', '', '', '2019', 0, '1954', 0, 'Overseas fund transfer', 'Turkey ', 'Akbank of Turkey', 'Afghanistan', '', 'USD', '5058', 0),
(26, 'Opay', 'Ddfygfg jhggf', '85447756875', 'Tr65447886543333', '1692733072', 4.00, 'For family ', '8240', 'December 30, 2025, 1:32 pm', 'Failed', '36797819830', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '3154', '', '', '', '', '', '', '', '2019', 0, '1954', 0, 'Overseas fund transfer', 'Gdhjhh hhh', 'Gffgj', 'Argentina', '', 'USD', '5058', 0),
(27, 'Gtyhh hhgff', 'Vbvcbbj', '558588948', 'Yr5543448865', '1692733072', 4805275.00, 'For family ', '8386', 'December 30, 2025, 1:35 pm', 'Failed', '12851932273', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '7914', '', '', '', '', '', '', '', '2019', 0, '1954', 0, 'Overseas fund transfer', 'Ggnj', 'Tdddg', 'Armenia', '', 'USD', '5058', 0),
(28, 'vaKIFBank', 'YuNus DoGDu', '0177767', 'iBAN NUMBER:TR28000460055000100017', '1651416581', 4805275.00, 'Family support', '3723', 'December 30, 2025, 2:11 pm', 'Failed', '67003698261', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Debit', '1', '1', '8113', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'EMEk  ADNAN MENDERES MAH MUDANA YOLU 9.KM ADNAN MENDERES MAH. NO:2EMEK', 'VakIFBank of Turkiye', 'Turkey', '', 'USD', '4964', 0),
(29, 'AKBank', 'AKBank', '', '898744121', '4871875090', 9610550.00, 'Inheritance Claim', '2502', 'Dec 19, 2025', 'Success', '68299608466', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Credit', '1', '1', '9441', '', '', '', '', '', '', '', '4899', 0, '7252', 0, 'Overseas fund transfer', 'Turkey', 'AKBank', 'Turkey', '', 'USD', '7116', 0),
(30, 'Tron', 'AKBank', '', '', '9664526435', 515.00, 'OFFSHORE DOLLAR ACCOUNT OPENING', '2955', 'Thu, Jan 29 6:34 AM', 'Success', '46222789891', 0.00, 0.00, 0.00, '0', 'support@akb-rk.com', 'Credit', '1', '1', '7165', '', '', '', '', '', '', '', '4899', 0, '7252', 0, 'USDT', '', '', '', '', 'USD', '7116', 0),
(31, 'CAIXA ECONÃ”MICA FEDERAL ', 'FÃBIO JUNIOR BORGES DA SILVA ', '0007821119610', 'TR280004600550001000177767', '9664526435', 485275.00, 'APOIO FAMÃLIAR ', '3901', 'March 9, 2026, 11:15 pm', 'Failed', '30492045457', 0.00, 0.00, 0.00, '1', 'support@infoakb.online', 'Debit', '1', '1', '2582', '', '', '', '', '', '', '', '9976', 1, '7910', 1, 'Overseas fund transfer', 'BARRA DO CORDA ', 'MARANHÃƒO ', 'Brazil', '', 'USD', '7868', 0),
(32, 'AKBank', 'Henry lucky ', '67878697857', 'TR280004600550001000177767', '8026756191', 1500000.00, 'Family', '9494', '10 March 2026', 'Success', '98427715683', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '3981', '', '', '', '', '', '', '', '4899', 0, '7252', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Turkey', '', 'USD', '7116', 0),
(33, 'sfvsdgfsd', 'tytyty fggrfgf', '576876877', 'fgdfhkgjhjfhjk,jh', '8026756191', 56675.00, 'FAMUIL', '7875', 'March 10, 2026, 1:32 pm', 'Failed', '58369131301', 0.00, 0.00, 0.00, '1', 'support@infoakb.online', 'Debit', '1', '1', '2344', '', '', '', '', '', '', '', '2511', 0, '9562', 0, 'Overseas fund transfer', 'cvcfvdfzdf', 'aSAsDSDADSDSDs', 'Turkey', '', 'USD', '9207', 0),
(35, 'AKBANK', '( credit) to JADLA MESQUITA ARAÃšJO', '5947903184', 'TR280004600550001000177767', '2952148337', 100000.00, 'Paid', '9369', 'March 25, 2026 09:12 am', 'Success', '73405634471', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Credit', '1', '1', '1216', '', '', '', '', '', '', '', '4899', 0, '7252', 0, 'Interbank fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'ISTANBUL, Turkiye', 'Turkey', '', 'USD', '7116', 0),
(36, 'AKBank', 'Antonia Collier', '4269745689', '4269745689', '8022295074', 30000.00, 'Paid ', '6368', '23 feb 2026 5:17pm', 'Success', '73211196704', 0.00, 0.00, 0.00, '1', 'support@infoakb.online', 'Debit', '1', '1', '6915', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'Lagos ', 'Lagos ', 'Nigeria', '', 'USD', '5195', 0),
(37, 'AKBank', 'Renato Haas', '8441597716', '8441597716', '8022295074', 10000.00, 'Paid ', '2202', '3 dec 2025 9:45am', 'Success', '56879508762', 0.00, 0.00, 0.00, '1', 'support@infoakb.online', 'Debit', '1', '1', '6591', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'Lagos, Nigeria ', 'Lagos ', 'Nigeria', '', 'USD', '5195', 0),
(38, 'AKBank', 'Esmeralda Vaughn', '8804993846', '8804993846', '8022295074', 300.00, 'Paid', '2512', '16 feb 2026 2:30pm', 'Success', '19438180566', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '7425', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'Lagos, Nigeria ', 'Lagos', 'Nigeria', '', 'USD', '5195', 0),
(39, 'AKBank', 'Clifton Campos', '9927962027', '9927962027', '8022295074', 700.00, 'Paid', '2898', '24 dec 2025 11:54am', 'Success', '83114246619', 0.00, 0.00, 0.00, '1', 'support@infoakb.online', 'Debit', '1', '1', '8598', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'Lagos Nigeria ', 'Lagos ', 'Nigeria', '', 'USD', '5195', 0),
(40, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '2508', 'April 1, 2026, 3:16 pm', 'Failed', '90616727409', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '5178', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(41, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '8881', 'April 1, 2026, 3:16 pm', 'Failed', '21185026979', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '8491', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(42, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '5937', 'April 1, 2026, 3:16 pm', 'Failed', '68657938694', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '6081', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(43, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '9748', 'April 1, 2026, 3:16 pm', 'Failed', '33298579682', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '5708', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(44, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '9684', 'April 1, 2026, 3:16 pm', 'Failed', '93493608381', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '2505', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(45, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '9042', 'April 1, 2026, 3:16 pm', 'Failed', '23005196478', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '7706', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(46, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '4604', 'April 1, 2026, 3:16 pm', 'Failed', '10918121201', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '3968', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(47, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10.00, 'Family support', '8915', 'April 1, 2026, 3:16 pm', 'Failed', '88875483264', 0.00, 0.00, 0.00, '1', 'support@infoakb.online', 'Debit', '1', '1', '2274', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(48, 'Laxmi sunlise Bank Limted', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10000.00, 'Family support', '8659', 'April 1, 2026, 3:35 pm', 'Failed', '56456950235', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '9289', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(49, 'Laxmi sunlise Bank Limited', 'Sarita tamang', '00954001227', '1651416581', '1651416581', 10000.00, 'Support families', '8012', 'April 1, 2026, 3:54 pm', 'Failed', '40788266711', 0.00, 0.00, 0.00, '1', 'support@infoakb.online', 'Debit', '1', '1', '5749', '', '', '', '', '', '', '', '2263', 0, '5472', 0, 'Overseas fund transfer', 'Nepal', 'Nepal', 'Turkey', '', 'USD', '4964', 0),
(51, 'AKBank', 'Henry lucky ', '7622517543', 'TR280004600550001000177767', '8022295074', 500.00, 'Paid', '2644', '18 jan 2026 3:12pm', 'Success', '60681833306', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '4596', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(52, 'AKBANK', 'Bobby Oneill', '5947903184', 'TR280004600550001000177767', '8022295074', 17000.00, 'Paid', '4098', '8 jan 026 2:33 pm', 'Success', '65972923290', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '8076', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'Kingdom Life Baptist Church (Pavilion of Full Life)', 'Rivers', 'Nigeria', '', 'USD', '5195', 0),
(53, 'AKBank', 'Olin Joseph', '1408362130', 'TR280004600550001000177767', '8022295074', 22000.00, 'Paid', '6743', '2 may 2026 3:09am', 'Success', '67203420412', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '4243', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(54, 'AKBank', 'Tasha Travis', '0329338452', 'TR280004600550001000177767', '8022295074', 12000.00, 'Paid', '4394', '14 April 2026 8:22am', 'Success', '38352699653', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '6933', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(55, 'AKBank', 'Robert Irwin', '0926081790', 'TR280004600550001000177767', '8022295074', 45000.00, 'Paid', '6116', '30 April 2026 4:23pm', 'Success', '68558814564', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '9543', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(56, 'AKBank', 'Deanne Sanchez', '5009538297', 'TR280004600550001000177767', '8022295074', 1000000.00, 'Paid', '9881', '10 April 2026 7:20pm', 'Success', '37897153515', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '8665', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(57, 'AKBank', 'Buster Bond', '0401676319', 'TR280004600550001000177767', '8022295074', 80000.00, 'Paid', '8997', '27 march 2026 9:40pm', 'Success', '47837321135', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '8936', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(58, 'AKBank', 'Sasha Miles', '1125921556', 'TR280004600550001000177767', '8022295074', 19000.00, 'Paid', '7326', '24 march 2026 10:23am', 'Success', '38862909597', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '3002', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(59, 'AKBank', 'Nathanial Morris', '2821197504', 'TR280004600550001000177767', '8022295074', 125000.00, 'Paid', '6709', '12 march 2026 12:39pm', 'Success', '77152392010', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '6928', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(60, 'AKBank', 'Nathanial Morris', '2821197504', 'TR280004600550001000177767', '8022295074', 125000.00, 'Paid', '6301', '09 May 2026', 'Success', '10128426854', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '1583', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(61, 'City bank', 'Douglas Carison', '8085921482', '091409571', '8022295074', 500.00, 'bank transfer', '2331', 'May 20, 2026, 4:11 am', 'Failed', '21726449689', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '2667', '', '', '', '', '', '', '', '2385', 0, '9343', 0, 'Overseas fund transfer', '388 Greenwich Street', 'New York, NY 10013', 'United States', '', 'USD', '9834', 0),
(62, 'City bank', 'Douglas Carlson ', '8085921482', '091409571', '8022295074', 500.00, 'Wire transfer', '4352', 'May 20, 2026, 4:39 am', 'Failed', '90230496113', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '6466', '', '', '', '', '', '', '', '2385', 0, '9343', 0, 'Overseas fund transfer', '388 Greenwich Street', 'New York, NY 10013', 'United States', '', 'USD', '9834', 0),
(63, 'AKBank', 'Dawn Thornton', '67878697857', 'TR280004600550001000177767', '4198030717', 17000.00, 'Paid', '1418', '04/05/2026 3:56 pm ', 'Success', '66401497657', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '5442', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(64, 'AKBank', 'Rosalyn Krueger', '8804993846', 'TR280004600550001000177767', '4198030717', 500.00, 'Paid', '1813', '04/06/2026', 'Success', '59742305285', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '8652', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(65, 'AKBank', 'Rosalyn Krueger', '8804993846', 'TR280004600550001000177767', '4198030717', 700.00, 'Paid', '4464', '04/08/2026 2:41 PM', 'Success', '23736577425', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '4014', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(66, 'AKBank', 'Joanne Kidd', '1123126855', 'TR280004600550001000177767', '4198030717', 1000.00, 'Paid', '5902', '04/10/2026 08:40 pm ', 'Success', '17999539540', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '7507', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(67, 'AKBank', 'Hannah Hughes', '7808479735', 'TR280004600550001000177767', '4198030717', 300.00, 'Paid', '4666', '04/13/2026 05:31 am', 'Success', '54216753459', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '5474', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(68, 'AKBank', 'Hollis Meadows', '4667406523', 'TR280004600550001000177767', '4198030717', 30000.00, 'Paid', '7486', '04/14/2026 06:04 pm', 'Success', '33834373085', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '8873', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Bahamas', '', 'USD', '5195', 0),
(69, 'AKBank', 'Ola Rowland', '3704890854', 'TR280004600550001000177767', '4198030717', 22000.00, 'Paid', '1946', '04/19/2026 09:20 pm ', 'Success', '46881435427', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '6329', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(70, 'AKBank', 'Young Livingston', '2885147638', 'TR280004600550001000177767', '4198030717', 12000.00, 'Paid', '9485', '04/24/2026', 'Success', '23823129115', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '7000', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(71, 'AKBank', 'Dewitt Estes', '8425231545', 'TR280004600550001000177767', '4198030717', 45000.00, 'Paid', '4061', '04/29/2026 6:24 pm', 'Success', '53967298289', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '6638', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(72, 'AKBank', 'Laura Kline', '6490198375', 'TR280004600550001000177767', '4198030717', 100000.00, 'Paid', '9295', '04/30/2026 11:30 pm', 'Success', '35944769951', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '7514', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(73, 'AKBank', 'Jodie Fisher', '9869764221', 'TR280004600550001000177767', '4198030717', 80000.00, 'Paid', '6671', '05/05/2026', 'Success', '44115825565', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '6141', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(74, 'AKBank', 'Lorna Singh', '6892711502', 'TR280004600550001000177767', '4198030717', 19000.00, 'Paid', '4994', '05/08/2026 6:30 pm', 'Success', '47864416067', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '7531', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(75, 'AKBank', 'Alphonse Schmitt', '2217876994', 'TR280004600550001000177767', '4198030717', 50000.00, 'Paid', '4589', '05/18/2026 08:56 pm', 'Success', '50489604491', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '7376', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(76, 'AKBank', 'Rusty Burch', '2803780464', 'TR280004600550001000177767', '4198030717', 200.00, 'Paid', '7870', '06/29/2026 9:40 pm', 'Success', '52756369759', 0.00, 0.00, 0.00, '0', '', 'Debit', '1', '1', '1096', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(77, 'AKBank', 'PayPal ', '5947903184', 'TR280004600550001000177767', '2781416249', 75000.00, 'Paid', '8143', '06/16/2026 5:48 PM', 'Success', '74469385798', 0.00, 0.00, 0.00, '0', '', 'Credit', '1', '1', '6939', '', '', '', '', '', '', '', '5252', 0, '2833', 0, 'Overseas fund transfer', 'AKBANK T.A.S., SABANCI CENTER, LEVENT 4, ISTANBUL, Turkiye', 'Istanbul', 'Afghanistan', '', 'USD', '5195', 0),
(78, 'Banco do Brasil', 'Adriele Maria da Silva Ferreira', '35017945773', 'BR8100000000035010000945773C1', '2781416249', 5000.00, 'Para minha filha ', '7627', 'June 19, 2026, 4:29 am', 'Failed', '30849752921', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '8563', '', '', '', '', '', '', '', '6128', 0, '5081', 0, 'Overseas fund transfer', 'Rua Josefa Taveira 274 Mangabeira ', 'NÃ£o ', 'Brazil', '', 'BRL', '6282', 0),
(79, 'Banco do Brasil', 'Adriele Maria da Silva Ferreira', '35017945773', 'BR8100000000035010000945773C1', '2781416249', 5000.00, 'Para minha filha ', '9536', 'June 19, 2026, 4:35 am', 'Failed', '40393850143', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '7905', '', '', '', '', '', '', '', '6128', 0, '5081', 0, 'Overseas fund transfer', 'Rua Josefa Taveira 274 Mangabeira ', 'NÃ£o ', 'Brazil', '', 'BRL', '6282', 0),
(80, 'Rrfrfrr', 'Teeee', '66666666', 'Trtttt34555555', '2702780189', 100.00, 'Good', '2850', 'June 19, 2026, 8:26 pm', 'Failed', '53109044046', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '2820', '', '', '', '', '', '', '', '1335', 0, '6923', 0, 'Overseas fund transfer', 'Trtt', 'Tttt', 'Qatar', '', 'USD', '5040', 0),
(81, 'Rrfrfrr', 'Teeee', '66666666', 'Trtttt34555555', '2702780189', 100.00, 'Good', '3690', 'June 19, 2026, 8:28 pm', 'Failed', '32636297494', 0.00, 0.00, 0.00, '0', 'support@infoakb.online', 'Debit', '1', '1', '3054', '', '', '', '', '', '', '', '1335', 0, '6923', 0, 'Overseas fund transfer', 'Trtt', 'Tttt', 'Qatar', '', 'USD', '5040', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_name`) VALUES
(1, 'Screenshot_2025-11-25_202315.jpg'),
(2, 'Screenshot_2025-12-08_141826.jpg'),
(3, '407373287_122104524866131084_8236025779004562948_n_(1).jpg'),
(4, 'Image_2025-12-18_at_02.51.10_20db4f7b.jpg'),
(5, 'Screenshot_2025-12-19_073448.jpg'),
(6, 'WhatsApp_Image_2025-12-24_at_19.48.28_92a12ec2.jpg'),
(7, 'Screenshot_2025-12-27_091942.jpg'),
(8, 'Screenshot_2026-03-06_170051.jpg'),
(9, 'Screenshot_2026-03-06_170051.jpg'),
(10, 'Screenshot_2026-03-06_170051_1.jpg'),
(11, '462000957_122096737772564562_6140027023222756971_n.jpg'),
(12, '462294749_122097912080563169_3792572947110365168_n.jpg'),
(13, '462294749_122097912080563169_3792572947110365168_n_1.jpg'),
(14, '17743266416001423915638232918958.jpg'),
(15, 'WhatsApp_Image_2026-05-18_at_4.08.59_PM.jpeg'),
(16, 'WhatsApp_Image_2026-05-18_at_4.08.59_PM_1.jpeg'),
(17, 'WhatsApp_Image_2026-05-18_at_4.08.59_PM_2.jpeg'),
(18, 'Image_2026-06-15_at_5.31.20_PM.jpeg'),
(19, 'WhatsApp_Image_2026-06-17_at_8.02.52_AM.jpeg'),
(20, 'WhatsApp_Image_2026-06-19_at_8.36.28_PM.jpeg'),
(21, 'WhatsApp_Image_2026-06-19_at_8.36.28_PM_1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(100) DEFAULT NULL,
  `account_pin` varchar(100) DEFAULT NULL,
  `sort_code` varchar(100) DEFAULT NULL,
  `route_number` varchar(100) DEFAULT NULL,
  `date_joined` varchar(100) DEFAULT NULL,
  `account_balance` decimal(64,2) DEFAULT NULL,
  `hashed_password` varchar(200) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `account_status` varchar(100) DEFAULT NULL,
  `account_type` varchar(100) DEFAULT NULL,
  `otp` varchar(100) DEFAULT NULL,
  `account_active_status` varchar(100) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `officer_rank` varchar(200) DEFAULT NULL,
  `kids` varchar(200) DEFAULT NULL,
  `marital_status` varchar(200) DEFAULT NULL,
  `grade` varchar(200) DEFAULT NULL,
  `division` varchar(200) DEFAULT NULL,
  `descriptions` varchar(200) DEFAULT NULL,
  `height` varchar(200) DEFAULT NULL,
  `first_trans` int(11) DEFAULT 0,
  `transfer_status` varchar(200) DEFAULT '0',
  `transfer_status_message` text DEFAULT NULL,
  `currency` varchar(200) DEFAULT 'USD',
  `code_status` int(11) DEFAULT 0,
  `fee_amount` decimal(10,0) DEFAULT 0,
  `drivers_licence` varchar(200) DEFAULT 'no-images.png',
  `int_pass` varchar(200) DEFAULT 'no-images.png',
  `drivers_licence_back` varchar(200) DEFAULT NULL,
  `national_id` varchar(200) DEFAULT NULL,
  `national_id_back` varchar(200) DEFAULT NULL,
  `kyc_verified` int(11) DEFAULT 0,
  `kyc_verified_sent` int(11) DEFAULT 0,
  `card_front` varchar(200) DEFAULT '',
  `card_back` varchar(200) DEFAULT '',
  `cot` int(11) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `bvt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `account_number`, `phone`, `city`, `zipcode`, `account_pin`, `sort_code`, `route_number`, `date_joined`, `account_balance`, `hashed_password`, `country`, `account_status`, `account_type`, `otp`, `account_active_status`, `image_link`, `officer_rank`, `kids`, `marital_status`, `grade`, `division`, `descriptions`, `height`, `first_trans`, `transfer_status`, `transfer_status_message`, `currency`, `code_status`, `fee_amount`, `drivers_licence`, `int_pass`, `drivers_licence_back`, `national_id`, `national_id_back`, `kyc_verified`, `kyc_verified_sent`, `card_front`, `card_back`, `cot`, `tax_id`, `bvt`) VALUES
(2, 'JosÃ© Carlos Dos Santos', 'pinaranapa739@gmail.com', '2952148337', '047 988420213', 'Rio de Janeiro - RJ, 22270-010, Brazil', '89.010.650', '1234', '', '', '2025-12-05 21:13 pm', 9610550.00, '$2y$10$o8in2hrAwFH6XtXDbWnWUOWlvw1E4yBB3brBaJ0iWaQ.Z..tjCGly', 'Brazil', 'Active', 'Checking Account', '', 'Active', 'Screenshot_2025-11-25_202315.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 50, 'no-images.png', 'no-images.png', '', '', '', 1, 0, 'download.jpeg', 'download.jpeg', 4899, 7252, 7116),
(5, 'Robinson Martinez', 'amrobinsonmartinez@gmail.com', '6671895044', '+16625449542', 'Los Angeles', '90005', '9542', '178234', '082901570', '2025-12-18 00:34 am', 550000.00, '$2y$10$pirss6fM5QvMUgS0UnsO0.u1csMQGp0UxNA9fSXzqUtQ/0m0F/di6', 'US state', 'Active', 'Transit and Confidential', '', 'Active', 'Image_2025-12-18_at_02.51.10_20db4f7b.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 15, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 2791, 9850, 2453),
(6, 'Surendra Kumar Singh', 'singhsurendra036@gmail.com', '4871875090', '9860174248', 'Arnama Rural Muncipality,Ward No.-1,Brahampuri,Siraha,Nepal', '56500', '4248', '', '', '2025-12-19 05:08 am', 9610760.00, '$2y$10$tm0T6FwDTaMfJw.BXLianOYTxRGMk7JAQF0nw/wQeoiFfdJxZWVi6', 'Nepal', 'Active', 'Checking Account', '', 'Active', 'Screenshot_2025-12-19_073448.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 30, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 3631, 2930, 9931),
(8, 'Rachel Pedersen', 'Pedersenrachel20@gmail.com', '2894340340', '+1 (769) 261-9358', '1333 Index Avenue NE, Redmond, WA', '', '9358', '', '', '2025-12-24 16:56 pm', 90000.00, '$2y$10$OU9n3yaOdIz1uopNtmDqhuIUFfsrOGbwlW2vCY9M4C2hUh01IjVRm', 'USA', 'Active', 'Checking Account', '', 'Complex', 'WhatsApp_Image_2025-12-24_at_19.48.28_92a12ec2.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 0, 'no-images.png', 'no-images.png', '', '', '', 0, 0, '', '', 1845, 5424, 9003),
(9, 'Atef Ahmed Mahmoud Attallah', 'nazianazi029@gmail.com', '1651416581', '009779702681224', 'Sundar Tole Marg PurbaLalitpur 44600, Nepal', '44600', '1224', '', '', '2025-12-27 06:41 am', 9610760.00, '$2y$10$Qmljprkc4FT0PVidxjP2se10bDTuIfoBwAStuguWUI7EDsqBH.RWO', 'Nepal', 'Active', 'Checking Account', '', 'Active', 'Screenshot_2025-12-27_091942.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 0, 'no-images.png', 'no-images.png', '', '', '', 1, 0, 'AK BANK LIMITED.png', 'AK BANK LIMITED.png', 2263, 5472, 4964),
(13, 'FÃBIO JUNIOR BORGES DA SILVA', 'fj951495@gmail.com', '9664526435', '+55 9991491703', 'Angelim neighborhood, Rua Travessa 3, IrmÃ£o Zaqueu Supermarket, Sandra\'s house', '', '1703', '', '', '2026-03-06 14:46 pm', 9611065.00, '$2y$10$Uh0cqQ7TD8O.BAQnQ4YOR.95mS/INLpRAwXqjgqDOzIc6KDCuUIHC', 'Brazil', 'Active', 'Checking Account', '', 'Active', 'Screenshot_2026-03-06_170051_1.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 9976, 7910, 7868),
(22, 'JADLA MESQUITA ARAÃšJO', 'javasconcelosvamvam1608@gmail.com', '5947903184', '+5585991655164', 'Street 3, MÃ£e Rainha subdivision, number 323, Vila Machado neighborhood.', '', '5164', '', '', '2026-03-24 06:50 am', 100000.00, '$2y$10$JOMIsbykVqNMFoMc7NapBOM3xauw2Mmk6G06eMxOzyeDbWvFO5xe2', 'Brazil', 'Active', 'Savings Account', '', 'Active', '17743266416001423915638232918958.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 1, 0, 'IMG20260325004714.jpg', 'IMG-20260323-WA0078.jpeg', 2121, 9610, 3180),
(23, 'emmanuel chidera', 'emmanuelchidera1111@gmail.com', '2226412259', '0801758013', 'Omoku', '510103', '1234', '', '', '2026-04-01 12:47 pm', 2050000.00, '$2y$10$O2nm2C2nJzaasVPw6m/o1OKQZ38AGegAr3HuPUIsciU2Yuil/UUh.', 'Nigeria', 'Active', 'Checking Account', '', 'Active', '', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 5252, 2833, 5195),
(24, 'Ø­Ù…ÙˆØ¯ Ø§Ø­Ù…Ø¯ Ø§Ø¨ÙˆØ·Ø§Ù„Ø¨ Ù‚ÙŠØ³ÙŠ ', 'hmwod999@gmail.com', '1725943057', '0550446117', 'Ø¬Ø¯Ø©', '22345', '0000', '102', '0000', '2026-04-10 22:52 pm', 0.00, '$2y$10$FIDLiaKX7tgLb16jGhnLf.YiJB97VqwIEHkdnnX7k7R7bnaWqPxc6', 'Ø§Ù„Ù…Ù…Ù„ÙƒØ© Ø§Ù„Ø¹Ø±Ø¨ÙŠØ© Ø§Ù„Ø³Ø¹ÙˆØ¯ÙŠØ©', 'Active', 'Checking Account', '', 'Complex', '1000294935.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, '0', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 0, 0, '', '', 2936, 4848, 9633),
(25, 'Grayson Ryan', 'graysonryanh@gmail.com', '8022295074', '+1 (334) 587-6970', 'Brooklyn New York', '11201', '6970', '', '', '2026-05-18 15:17 pm', 2726458.00, '$2y$10$bKe2jJvT9/VIN6ft0oWiJuW4BQ6tj8NxazLc6T8HJ10F9Mm15VplG', 'United States', 'Active', 'Checking Account', '', 'Active', 'WhatsApp_Image_2026-05-18_at_4.08.59_PM_1.jpeg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 2385, 9343, 9834),
(26, 'Mateo Cody ', 'codymateo1@gmail.com', '4198030717', '+44Â 7529Â 560866', 'Oklahoma', '73001', '0866', '', '', '2026-06-09 15:06 pm', 3798800.00, '$2y$10$i66J1Kj4aCt7ltXxL2MewOazvZOhUSrDmYQplFuYVI.qBCzxCOz4C', 'United Kingdom', 'Active', 'Checking Account', '', 'Active', 'WhatsApp_Image_2026-05-18_at_4.08.59_PM_2.jpeg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 20, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 6299, 4433, 4704),
(27, 'Adriana Maria Da Silva Maria', 'drianinhasilva941@gmail.com', '2781416249', '+55(83)991903129', '', '58220', '3129', '', '', '2026-06-15 20:07 pm', 75000.00, '$2y$10$/h4YBsepRsQpxW.zjUloneI3nAI.2ux8Km.LNi3yuCjduZs.ycEWm', 'Brazil', 'Active', 'Checking Account', '', 'Active', 'Image_2026-06-15_at_5.31.20_PM.jpeg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'BRL', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 6128, 5081, 6282),
(41, 'Todd Hudson', 'toddhuddsonn@gmail.com', '8937949125', '+1 (323) 555-0144', 'Los Angeles ', '    10001', '0144', '    20-45-67', '    021050021', '2026-06-16 22:36 pm', 1400000.00, '$2y$10$iPhaBCcfaHIiyeYGW7wGu.QiA4xkqay3R/4vB4K/Casa.mqcK4XpS', 'United States ', 'Active', 'Checking Account', '', 'Active', 'IMG_0265.jpeg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 1570, 8876, 1255),
(45, 'Ellery Saint ', 'ellerysaint@gmail.com', '2702780189', '1(312)933-4938', 'Staten Island, New York', '10301', '4938', '', '', '2026-06-19 20:06 pm', 270000.00, '$2y$10$9qbj5qiFYw366lQtTEAuqOWBYreNbkqhEax5uyJrrflWJ3Ffye/7W', 'USA', 'Active', 'Checking Account', '', 'Active', 'WhatsApp_Image_2026-06-19_at_8.36.28_PM_1.jpeg', '', NULL, '', '', NULL, NULL, NULL, 0, 'Enable', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 1, 0, '', '', 1335, 6923, 5040),
(46, 'Justin Lee Perkins', 'elitetreecareco@gmail.com', '2636284440', '9702187207', 'Windsor', '80550', '1234', '', '', '2026-06-26 16:21 pm', 0.00, '$2y$10$uugD6g.SDGlJXKimS88Dp.UfnioTMgKJYfF16uVji7K8gdv0KPJhW', 'United States', 'Active', 'Checking Account', '', 'Complex', 'FB_IMG_1782483292742.jpg', '', NULL, '', '', NULL, NULL, NULL, 0, '0', '', 'USD', 0, 10, 'no-images.png', 'no-images.png', '', '', '', 0, 0, '', '', 2943, 1395, 1777);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_transfer_account_bal` (`account_balance`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_account_number` (`account_number`),
  ADD UNIQUE KEY `uq_email` (`email`),
  ADD UNIQUE KEY `uq_phone_number` (`phone`),
  ADD UNIQUE KEY `cot` (`cot`),
  ADD UNIQUE KEY `bvt` (`bvt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
