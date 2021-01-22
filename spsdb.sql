-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 21, 2021 at 11:41 PM
-- Server version: 5.7.28
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attach_id` varchar(100) DEFAULT NULL,
  `orders` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `file` blob,
  `tmp_name` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `INFO_STAMP` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `attach_id`, `orders`, `title`, `desc`, `file`, `tmp_name`, `category`, `INFO_STAMP`) VALUES
(1, '100820180', NULL, 'Department Order No. 01, Series of 2018', NULL, 0x515745525459, 'QWERTY', 'QWERTY', '2018-10-03'),
(2, '1008201802', NULL, 'Department Order No. 02, Series of 2018', NULL, 0x313131313131313131, '1111', '11111', '2018-10-04'),
(3, '1008201803', 'MEMORANDUM ORDERS AND CIRCULARS', NULL, NULL, 0x7975697469, 'uiiyu', 'yuu', NULL),
(4, '1008201804', 'MEMORANDUM ORDERS AND CIRCULARS', NULL, NULL, 0x73737373, 'sssss', 'ANIMAL HEALTH', NULL),
(5, '1008201805', 'LAWS DEPARTMENT ORDERS AND CIRCULARS', NULL, NULL, 0x737373, 'ssss', 'FOOD SAFETY', NULL),
(6, '1009201806', 'LAWS DEPARTMENT ORDERS AND CIRCULARS', NULL, NULL, 0x6161, NULL, NULL, NULL),
(7, '1017201807', 'LAWS DEPARTMENT ORDERS AND CIRCULARS', 'SFSDA', 'sdfasdf', NULL, NULL, 'FOOD SAFETY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(10) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `banner_img` longtext,
  `info_stamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country_tab`
--

DROP TABLE IF EXISTS `country_tab`;
CREATE TABLE IF NOT EXISTS `country_tab` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(4) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `em_country_code` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_tab`
--

INSERT INTO `country_tab` (`ID`, `country_code`, `country_name`, `em_country_code`) VALUES
(2, 'AF', 'Afghanistan', NULL),
(3, 'AX', 'Aland Islands', NULL),
(4, 'AL', 'Albania', NULL),
(5, 'DZ', 'Algeria', NULL),
(6, 'AS', 'American Samoa', NULL),
(7, 'AD', 'Andorra', NULL),
(8, 'AO', 'Angola', NULL),
(9, 'AI', 'Anguilla', NULL),
(10, 'AQ', 'Antarctica', NULL),
(11, 'AG', 'Antigua and Barbuda', NULL),
(12, 'AR', 'Argentina', NULL),
(13, 'AM', 'Armenia', NULL),
(14, 'AW', 'Aruba', NULL),
(15, 'AU', 'Australia', NULL),
(16, 'AT', 'Austria', NULL),
(17, 'AZ', 'Azerbaijan', NULL),
(18, 'BS', 'Bahamas', NULL),
(19, 'BH', 'Bahrain', NULL),
(20, 'BD', 'Bangladesh', NULL),
(21, 'BB', 'Barbados', NULL),
(22, 'BY', 'Belarus', NULL),
(23, 'BE', 'Belgium', NULL),
(24, 'BZ', 'Belize', NULL),
(25, 'BJ', 'Benin', NULL),
(26, 'BM', 'Bermuda', NULL),
(27, 'BT', 'Bhutan', NULL),
(28, 'BO', 'Bolivia, Plurinational State of', NULL),
(29, 'BQ', 'Bonaire, Sint Eustatius and Saba', NULL),
(30, 'BA', 'Bosnia and Herzegovina', NULL),
(31, 'BW', 'Botswana', NULL),
(32, 'BR', 'Brazil', NULL),
(33, 'IO', 'British Indian Ocean Territory', NULL),
(34, 'BN', 'Brunei Darussalam', NULL),
(35, 'BG', 'Bulgaria', NULL),
(36, 'BF', 'Burkina Faso', NULL),
(37, 'BI', 'Burundi', NULL),
(38, 'KH', 'Cambodia', NULL),
(39, 'CM', 'Cameroon', NULL),
(40, 'CA', 'Canada', NULL),
(41, 'CV', 'Cape Verde', NULL),
(42, 'KY', 'Cayman Islands', NULL),
(43, 'CF', 'Central African Republic', NULL),
(44, 'TD', 'Chad', NULL),
(45, 'CL', 'Chile', NULL),
(46, 'CN', 'China', NULL),
(47, 'CX', 'Christmas Island', NULL),
(48, 'CC', 'Cocos (Keeling) Islands', NULL),
(49, 'CO', 'Colombia', NULL),
(50, 'KM', 'Comoros', NULL),
(51, 'CG', 'Congo', NULL),
(52, 'CD', 'Congo, The Democratic Republic of the', NULL),
(53, 'CK', 'Cook Islands', NULL),
(54, 'CR', 'Costa Rica', NULL),
(55, 'CI', 'C?te d\'Ivoire', NULL),
(56, 'HR', 'Croatia', NULL),
(57, 'CU', 'Cuba', NULL),
(58, 'CW', 'Cura?ao', NULL),
(59, 'CY', 'Cyprus', NULL),
(60, 'CZ', 'Czech Republic', NULL),
(61, 'DK', 'Denmark', NULL),
(62, 'DJ', 'Djibouti', NULL),
(63, 'DM', 'Dominica', NULL),
(64, 'DO', 'Dominican Republic', NULL),
(65, 'EC', 'Ecuador', NULL),
(66, 'EG', 'Egypt', NULL),
(67, 'SV', 'El Salvador', NULL),
(68, 'GQ', 'Equatorial Guinea', NULL),
(69, 'ER', 'Eritrea', NULL),
(70, 'EE', 'Estonia', NULL),
(71, 'SZ', 'Eswatini', NULL),
(72, 'ET', 'Ethiopia', NULL),
(73, 'FK', 'Falkland Islands (Malvinas)', NULL),
(74, 'FO', 'Faroe Islands', NULL),
(75, 'FJ', 'Fiji', NULL),
(76, 'FI', 'Finland', NULL),
(77, 'FR', 'France', NULL),
(78, 'GF', 'French Guiana', NULL),
(79, 'PF', 'French Polynesia', NULL),
(80, 'TF', 'French Southern Territories', NULL),
(81, 'GA', 'Gabon', NULL),
(82, 'GM', 'Gambia', NULL),
(83, 'GE', 'Georgia', NULL),
(84, 'DE', 'Germany', NULL),
(85, 'GH', 'Ghana', NULL),
(86, 'GI', 'Gibraltar', NULL),
(87, 'GR', 'Greece', NULL),
(88, 'GL', 'Greenland', NULL),
(89, 'GD', 'Grenada', NULL),
(90, 'GP', 'Guadeloupe', NULL),
(91, 'GU', 'Guam', NULL),
(92, 'GT', 'Guatemala', NULL),
(93, 'GG', 'Guernsey', NULL),
(94, 'GN', 'Guinea', NULL),
(95, 'GW', 'Guinea-Bissau', NULL),
(96, 'GY', 'Guyana', NULL),
(97, 'HT', 'Haiti', NULL),
(98, 'HM', 'Heard Island and McDonald Islands', NULL),
(99, 'VA', 'Holy See (Vatican City State)', NULL),
(100, 'HN', 'Honduras', NULL),
(101, 'HK', 'Hong Kong', NULL),
(102, 'HU', 'Hungary', NULL),
(103, 'IS', 'Iceland', NULL),
(104, 'IN', 'India', NULL),
(105, 'ID', 'Indonesia', NULL),
(106, 'XZ', 'Installations in International Waters', NULL),
(107, 'IR', 'Iran, Islamic Republic of', NULL),
(108, 'IQ', 'Iraq', NULL),
(109, 'IE', 'Ireland', NULL),
(110, 'IM', 'Isle of Man', NULL),
(111, 'IL', 'Israel', NULL),
(112, 'IT', 'Italy', NULL),
(113, 'JM', 'Jamaica', NULL),
(114, 'JP', 'Japan', NULL),
(115, 'JE', 'Jersey', NULL),
(116, 'JO', 'Jordan', NULL),
(117, 'KZ', 'Kazakhstan', NULL),
(118, 'KE', 'Kenya', NULL),
(119, 'KI', 'Kiribati', NULL),
(120, 'KP', 'Korea, Democratic People\'s Republic of', NULL),
(121, 'KR', 'Korea, Republic of', NULL),
(122, 'KW', 'Kuwait', NULL),
(123, 'KG', 'Kyrgyzstan', NULL),
(124, 'LA', 'Lao People\'s Democratic Republic', NULL),
(125, 'LV', 'Latvia', NULL),
(126, 'LB', 'Lebanon', NULL),
(127, 'LS', 'Lesotho', NULL),
(128, 'LR', 'Liberia', NULL),
(129, 'LY', 'Libya', NULL),
(130, 'LI', 'Liechtenstein', NULL),
(131, 'LT', 'Lithuania', NULL),
(132, 'LU', 'Luxembourg', NULL),
(133, 'MO', 'Macao', NULL),
(134, 'MK', 'Macedonia, The former Yugoslav Republic of', NULL),
(135, 'MG', 'Madagascar', NULL),
(136, 'MW', 'Malawi', NULL),
(137, 'MY', 'Malaysia', NULL),
(138, 'MV', 'Maldives', NULL),
(139, 'ML', 'Mali', NULL),
(140, 'MT', 'Malta', NULL),
(141, 'MH', 'Marshall Islands', NULL),
(142, 'MQ', 'Martinique', NULL),
(143, 'MR', 'Mauritania', NULL),
(144, 'MU', 'Mauritius', NULL),
(145, 'YT', 'Mayotte', NULL),
(146, 'MX', 'Mexico', NULL),
(147, 'FM', 'Micronesia, Federated States of', NULL),
(148, 'MD', 'Moldova, Republic of', NULL),
(149, 'MC', 'Monaco', NULL),
(150, 'MN', 'Mongolia', NULL),
(151, 'ME', 'Montenegro', NULL),
(152, 'MS', 'Montserrat', NULL),
(153, 'MA', 'Morocco', NULL),
(154, 'MZ', 'Mozambique', NULL),
(155, 'MM', 'Myanmar', NULL),
(156, 'NA', 'Namibia', NULL),
(157, 'NR', 'Nauru', NULL),
(158, 'NP', 'Nepal', NULL),
(159, 'NL', 'Netherlands', NULL),
(160, 'NC', 'New Caledonia', NULL),
(161, 'NZ', 'New Zealand', NULL),
(162, 'NI', 'Nicaragua', NULL),
(163, 'NE', 'Niger', NULL),
(164, 'NG', 'Nigeria', NULL),
(165, 'NU', 'Niue', NULL),
(166, 'NF', 'Norfolk Island', NULL),
(167, 'MP', 'Northern Mariana Islands', NULL),
(168, 'NO', 'Norway', NULL),
(169, 'OM', 'Oman', NULL),
(170, 'PK', 'Pakistan', NULL),
(171, 'PW', 'Palau', NULL),
(172, 'PS', 'Palestine, State of', NULL),
(173, 'PA', 'Panama', NULL),
(174, 'PG', 'Papua New Guinea', NULL),
(175, 'PY', 'Paraguay', NULL),
(176, 'PE', 'Peru', NULL),
(177, 'PH', 'Philippines', NULL),
(178, 'PN', 'Pitcairn', NULL),
(179, 'PL', 'Poland', NULL),
(180, 'PT', 'Portugal', NULL),
(181, 'PR', 'Puerto Rico', NULL),
(182, 'QA', 'Qatar', NULL),
(183, 'RE', 'R?union', NULL),
(184, 'RO', 'Romania', NULL),
(185, 'RU', 'Russian Federation', NULL),
(186, 'RW', 'Rwanda', NULL),
(187, 'BL', 'Saint Barth?lemy', NULL),
(188, 'SH', 'Saint Helena, Ascension and Tristan Da Cunha', NULL),
(189, 'KN', 'Saint Kitts and Nevis', NULL),
(190, 'LC', 'Saint Lucia', NULL),
(191, 'MF', 'Saint Martin (French Part)', NULL),
(192, 'PM', 'Saint Pierre and Miquelon', NULL),
(193, 'VC', 'Saint Vincent and the Grenadines', NULL),
(194, 'WS', 'Samoa', NULL),
(195, 'SM', 'San Marino', NULL),
(196, 'ST', 'Sao Tome and Principe', NULL),
(197, 'SA', 'Saudi Arabia', NULL),
(198, 'SN', 'Senegal', NULL),
(199, 'RS', 'Serbia', NULL),
(200, 'SC', 'Seychelles', NULL),
(201, 'SL', 'Sierra Leone', NULL),
(202, 'SG', 'Singapore', NULL),
(203, 'SX', 'Sint Maarten (Dutch Part)', NULL),
(204, 'SK', 'Slovakia', NULL),
(205, 'SI', 'Slovenia', NULL),
(206, 'SB', 'Solomon Islands', NULL),
(207, 'SO', 'Somalia', NULL),
(208, 'ZA', 'South Africa', NULL),
(209, 'GS', 'South Georgia and the South Sandwich Islands', NULL),
(210, 'SS', 'South Sudan', NULL),
(211, 'ES', 'Spain', NULL),
(212, 'LK', 'Sri Lanka', NULL),
(213, 'SD', 'Sudan', NULL),
(214, 'SR', 'Suriname', NULL),
(215, 'SJ', 'Svalbard and Jan Mayen', NULL),
(216, 'SE', 'Sweden', NULL),
(217, 'CH', 'Switzerland', NULL),
(218, 'SY', 'Syrian Arab Republic', NULL),
(219, 'TW', 'Taiwan, Province of China', NULL),
(220, 'TJ', 'Tajikistan', NULL),
(221, 'TZ', 'Tanzania, United Republic of', NULL),
(222, 'TH', 'Thailand', NULL),
(223, 'TL', 'Timor-Leste', NULL),
(224, 'TG', 'Togo', NULL),
(225, 'TK', 'Tokelau', NULL),
(226, 'TO', 'Tonga', NULL),
(227, 'TT', 'Trinidad and Tobago', NULL),
(228, 'TN', 'Tunisia', NULL),
(229, 'TR', 'Turkey', NULL),
(230, 'TM', 'Turkmenistan', NULL),
(231, 'TC', 'Turks and Caicos Islands', NULL),
(232, 'TV', 'Tuvalu', NULL),
(233, 'UG', 'Uganda', NULL),
(234, 'UA', 'Ukraine', NULL),
(235, 'AE', 'United Arab Emirates', NULL),
(236, 'GB', 'United Kingdom', NULL),
(237, 'US', 'United States', NULL),
(238, 'UM', 'United States Minor Outlying Islands', NULL),
(239, 'UY', 'Uruguay', NULL),
(240, 'UZ', 'Uzbekistan', NULL),
(241, 'VU', 'Vanuatu', NULL),
(242, 'VE', 'Venezuela', NULL),
(243, 'VN', 'Viet Nam', NULL),
(244, 'VG', 'Virgin Islands, British', NULL),
(245, 'VI', 'Virgin Islands, U.S.', NULL),
(246, 'WF', 'Wallis and Futuna', NULL),
(247, 'EH', 'Western Sahara', NULL),
(248, 'YE', 'Yemen', NULL),
(249, 'ZM', 'Zambia', NULL),
(250, 'ZW', 'Zimbabwe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_notif_tab`
--

DROP TABLE IF EXISTS `emergency_notif_tab`;
CREATE TABLE IF NOT EXISTS `emergency_notif_tab` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(100) DEFAULT NULL,
  `notif_code` varchar(100) DEFAULT NULL,
  `em_tag_code` varchar(100) DEFAULT NULL,
  `em_doc_type` varchar(255) DEFAULT NULL,
  `em_doc_no` varchar(100) DEFAULT NULL,
  `em_doc_year` year(4) DEFAULT NULL,
  `em_measure_title` longtext,
  `em_country_code` varchar(50) DEFAULT NULL,
  `em_date_measure` date DEFAULT NULL,
  `em_wto_date` date DEFAULT NULL,
  `em_notif_doc_link` varchar(255) DEFAULT NULL,
  `em_notif_known` varchar(255) DEFAULT NULL,
  `em_new_notif_code` varchar(255) DEFAULT NULL,
  `em_new_notif_date` varchar(50) DEFAULT NULL,
  `em_new_title` varchar(255) DEFAULT NULL,
  `em_new_doc_no` varchar(100) DEFAULT NULL,
  `em_new_year` varchar(100) DEFAULT NULL,
  `em_new_upt_title` varchar(255) DEFAULT NULL,
  `em_new_date_notif` date DEFAULT NULL,
  `em_new_doc_link` varchar(255) DEFAULT NULL,
  `UPT_USER` varchar(255) DEFAULT NULL,
  `UPT_OFFICE` varchar(255) DEFAULT NULL,
  `UPT_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  `UPT_DATETIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `INFO_STAT` varchar(50) DEFAULT NULL,
  `INFO_STAT_REMARKS` varchar(255) DEFAULT NULL,
  `INFO_USER` varchar(100) DEFAULT NULL,
  `INFO_OFFICE` varchar(100) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(50) DEFAULT NULL,
  `INFO_DATETIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_notif_tab`
--

INSERT INTO `emergency_notif_tab` (`ID`, `SPSID`, `notif_code`, `em_tag_code`, `em_doc_type`, `em_doc_no`, `em_doc_year`, `em_measure_title`, `em_country_code`, `em_date_measure`, `em_wto_date`, `em_notif_doc_link`, `em_notif_known`, `em_new_notif_code`, `em_new_notif_date`, `em_new_title`, `em_new_doc_no`, `em_new_year`, `em_new_upt_title`, `em_new_date_notif`, `em_new_doc_link`, `UPT_USER`, `UPT_OFFICE`, `UPT_ACCESSLEVEL`, `UPT_DATETIME`, `INFO_STAT`, `INFO_STAT_REMARKS`, `INFO_USER`, `INFO_OFFICE`, `INFO_ACCESSLEVEL`, `INFO_DATETIME`) VALUES
(1, '10011820212', 'G/PSPS/N/PHL/424', '03', '01', '2', 2017, '2SAMPLE', NULL, '2021-01-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-18 08:48:07', NULL, NULL, '13-0001-001', NULL, NULL, '2021-01-18 08:48:07'),
(2, '10011820213', 'G/PSPS/N/PHL/770', '03', '03', '3', 2018, '3SAMPLE', NULL, '2021-01-05', NULL, NULL, 'Withdrawn', '456', '2021-01-30', '09', '45', '2019', 'sample456', NULL, NULL, NULL, NULL, NULL, '2021-01-18 08:50:08', NULL, NULL, '13-0001-001', NULL, NULL, '2021-01-18 08:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `time_stamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `main` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`ID`, `code`, `main`) VALUES
(1, '00000', 'DA-OSEC'),
(2, '10000', 'Bureaus'),
(3, '20000', 'Attached Agencies'),
(4, '30000', 'Regional Field Office');

-- --------------------------------------------------------

--
-- Table structure for table `ref_doc`
--

DROP TABLE IF EXISTS `ref_doc`;
CREATE TABLE IF NOT EXISTS `ref_doc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `doc_code` varchar(5) DEFAULT NULL,
  `doc_desc` varchar(255) DEFAULT NULL,
  `doc_office` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_doc`
--

INSERT INTO `ref_doc` (`ID`, `doc_code`, `doc_desc`, `doc_office`) VALUES
(1, '01', 'DA Administrative Order', 'DA'),
(2, '02', 'DA Department Circular', 'DA'),
(3, '03', 'DA Memorandum Circular', 'DA'),
(4, '04', 'DA Memorandum Order', 'DA'),
(5, '05', 'DA BAI Memorandum Order', 'BAI'),
(6, '06', 'DA BAI Memorandum Circular', 'BAI'),
(7, '07', 'DA BPI Memorandum Order', 'BPI'),
(8, '08', 'DA BPI Memorandum Circular', 'BPI'),
(9, '09', 'DA BFAR Memorandum Order', 'BFAR'),
(10, '10', 'DA BFAR Memorandum Circular', 'BFAR'),
(11, '11', 'Draft Philippine National Standard Code of GAHP for Hatchery', 'ALL'),
(12, '12', 'Philippine National Standard Code for Maximum Residue Limits of Pesticide on Selected Crops', 'ALL'),
(13, '13', 'Philippine National Standard Code of Hygienic Practice for Processing and Handling of Corn Grits', 'ALL'),
(14, '14', 'Philippine National Standard (PNS) for Corn (Maize) Grits - Grading and Classification (Working draft)', 'ALL'),
(15, '15', 'Philippine National Standard - Code of Practice for the Prevention and Reduction of Mycotoxin Contamination in Cereals', 'ALL'),
(16, '16', 'Philippine National Standard - Grains - Grading and classification - Paddy milled rice Mycotoxin Contamination in Cereals', 'ALL'),
(17, '17', 'PNS/BAFS Maximum Residue Limits (MRLs): Apple, Citrus fruits, Grapes, Longan, Lychee, Oranges, Pears (Final Draft).', 'ALL'),
(18, '18', 'Guidelines on the Registration of Food Products, Including Raw Materials and Food Ingredients, Containing Aluminum Lake Colors, and as such as Food Additives for Further Processing', 'ALL'),
(19, '19', 'Standard of Quality for the Processing Packaging and Labelling of Salabat or Instant Ginger Drink', 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `ref_tags`
--

DROP TABLE IF EXISTS `ref_tags`;
CREATE TABLE IF NOT EXISTS `ref_tags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tag_code` varchar(10) DEFAULT NULL,
  `tag_desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_tags`
--

INSERT INTO `ref_tags` (`ID`, `tag_code`, `tag_desc`) VALUES
(1, '01', 'Animal Health'),
(2, '02', 'Plant Health'),
(3, '03', 'Food Safety'),
(4, '04', 'Food Safety, Animal Health'),
(5, '05', 'Food Safety, Plant Health');

-- --------------------------------------------------------

--
-- Table structure for table `regular_notif_tab`
--

DROP TABLE IF EXISTS `regular_notif_tab`;
CREATE TABLE IF NOT EXISTS `regular_notif_tab` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(255) DEFAULT NULL,
  `notif_code` varchar(255) DEFAULT NULL,
  `reg_tag_code` varchar(100) DEFAULT NULL,
  `reg_doc_code` varchar(100) DEFAULT NULL,
  `reg_doc_no` varchar(100) DEFAULT NULL,
  `reg_doc_year` varchar(255) DEFAULT NULL,
  `reg_measure_title` text,
  `reg_country_code` varchar(10) DEFAULT NULL,
  `reg_date_measure` date DEFAULT NULL,
  `reg_draft_wto_date` date DEFAULT NULL,
  `reg_adopted_wto_date` date DEFAULT NULL,
  `reg_notif_doc_link` varchar(255) DEFAULT NULL,
  `reg_notif_known` varchar(50) DEFAULT NULL,
  `reg_new_notif_code` varchar(50) DEFAULT NULL,
  `reg_new_notif_date` varchar(50) DEFAULT NULL,
  `reg_new_notif_doc_link` varchar(255) DEFAULT NULL,
  `INFO_upt_USER` varchar(255) DEFAULT NULL,
  `INFO_STAT` varchar(50) DEFAULT NULL,
  `INFO_STAT_REMARKS` varchar(255) DEFAULT NULL,
  `INFO_USER` varchar(100) DEFAULT NULL,
  `INFO_OFFICE` varchar(100) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  `INFO_DATETIME` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regular_notif_tab`
--

INSERT INTO `regular_notif_tab` (`ID`, `SPSID`, `notif_code`, `reg_tag_code`, `reg_doc_code`, `reg_doc_no`, `reg_doc_year`, `reg_measure_title`, `reg_country_code`, `reg_date_measure`, `reg_draft_wto_date`, `reg_adopted_wto_date`, `reg_notif_doc_link`, `reg_notif_known`, `reg_new_notif_code`, `reg_new_notif_date`, `reg_new_notif_doc_link`, `INFO_upt_USER`, `INFO_STAT`, `INFO_STAT_REMARKS`, `INFO_USER`, `INFO_OFFICE`, `INFO_ACCESSLEVEL`, `INFO_DATETIME`) VALUES
(1, '10011820212', 'G/PSPS/N/PHL/01363', '02', '01', '1', '2017', '1SAMPLE', NULL, '2021-01-19', '2021-01-20', '2021-01-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13-0001-001', '', 'ADMINISTRATOR', '2021-01-18 08:39:10'),
(2, '10011920213', 'G/PSPS/N/PHL/01178', '03', '02', '11', '2019', '11SAMPLE01192021', NULL, '2021-01-05', '2021-01-06', '2021-01-07', NULL, 'Still not known', '1234', '2021-01-08', NULL, NULL, NULL, NULL, '13-0001-001', '', 'ADMINISTRATOR', '2021-01-19 00:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `suboffice`
--

DROP TABLE IF EXISTS `suboffice`;
CREATE TABLE IF NOT EXISTS `suboffice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sub` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `main` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suboffice`
--

INSERT INTO `suboffice` (`ID`, `sub`, `code`, `main`) VALUES
(1, 'ATI', '10100', 'Bureaus'),
(2, 'BSWM', '10200', 'Bureaus'),
(3, 'BAFS', '10300', 'Bureaus'),
(4, 'BAI', '10400', 'Bureaus'),
(5, 'BAR', '10500', 'Bureaus'),
(6, 'BFAR', '10600', 'Bureaus'),
(7, 'BPI', '10700', 'Bureaus'),
(8, 'PhilMech', '20100', 'Attached Agencies'),
(15, 'Internal Audit Service', '00001', 'DA-OSEC'),
(16, 'Planning and Monitoring Service', '00002', 'DA-OSEC'),
(17, 'Policy Research Service', '00003', 'DA-OSEC'),
(18, 'Project Development Service', '00004', 'DA-OSEC'),
(19, 'Agribusiness & Marketing Assistance Service', '00005', 'DA-OSEC'),
(20, 'Field Operations Service', '00006', 'DA-OSEC'),
(21, 'Administrative Service', '00007', 'DA-OSEC'),
(22, 'Financial & Management Service', '00008', 'DA-OSEC'),
(23, 'Legal Service', '00009', 'DA-OSEC'),
(24, 'Information & Communication Technology Service', '00010', 'DA-OSEC'),
(50, 'BAS', '10800', 'Bureaus'),
(51, 'NAFC', '20200', 'Attached Agencies'),
(52, 'LDC', '20201', 'Attached Agencies'),
(53, 'PCC', '20202', 'Attached Agencies'),
(54, 'ACPC', '20203', 'Attached Agencies'),
(55, 'CODA', '20204', 'Attached Agencies'),
(56, 'NMIS', '20205', 'Attached Agencies'),
(57, 'FPA', '20206', 'Attached Agencies'),
(58, 'FIDA', '20207', 'Attached Agencies'),
(59, 'REGIONAL OFFICE NO. 1', '30100', 'Regional Field Office'),
(60, 'REGIONAL OFFICE NO. 2', '30101', 'Regional Field Office'),
(61, 'REGIONAL OFFICE NO. 3', '30102', 'Regional Field Office'),
(62, 'REGIONAL OFFICE NO. 4A', '30103', 'Regional Field Office'),
(63, 'REGIONAL OFFICE NO. 4B', '30104', 'Regional Field Office'),
(64, 'REGIONAL OFFICE NO. 5', '30105', 'Regional Field Office'),
(65, 'REGIONAL OFFICE NO. 6', '30106', 'Regional Field Office'),
(66, 'REGIONAL OFFICE NO. 7', '30107', 'Regional Field Office'),
(67, 'REGIONAL OFFICE NO. 8', '30108', 'Regional Field Office'),
(68, 'REGIONAL OFFICE NO. 9', '30109', 'Regional Field Office'),
(69, 'REGIONAL OFFICE NO. 10', '30110', 'Regional Field Office'),
(70, 'REGIONAL OFFICE NO. 11', '30111', 'Regional Field Office'),
(71, 'REGIONAL OFFICE NO. 12', '30112', 'Regional Field Office'),
(72, 'REGIONAL OFFICE NO. 13', '30113', 'Regional Field Office'),
(73, 'CAR', '30114', 'Regional Field Office'),
(74, 'ARMM', '30115', 'Regional Field Office');

-- --------------------------------------------------------

--
-- Table structure for table `tblspspdf`
--

DROP TABLE IF EXISTS `tblspspdf`;
CREATE TABLE IF NOT EXISTS `tblspspdf` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ATTACH_ID` varchar(100) DEFAULT NULL,
  `LAW` varchar(200) DEFAULT NULL,
  `TITLE` varchar(200) DEFAULT NULL,
  `DESCRIPTION` longtext,
  `PDF_UPLOADER` varchar(100) DEFAULT NULL,
  `CATEGORY` varchar(50) DEFAULT NULL,
  `DATE_UPLOAD` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `INFO_USER` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblspspdf`
--

INSERT INTO `tblspspdf` (`ID`, `ATTACH_ID`, `LAW`, `TITLE`, `DESCRIPTION`, `PDF_UPLOADER`, `CATEGORY`, `DATE_UPLOAD`, `INFO_USER`, `INFO_ACCESSLEVEL`) VALUES
(1, '1018201801', 'Memorandum Orders', 'MEMORANDUM ORDER NO. 8 SERIES OF 2018', 'MEMOO 8', 'PDF/MEMORANDUM ORDER NO. 8 SERIES OF 2018.PDF', 'Food Safety', '2018-10-18 05:36:31', NULL, NULL),
(2, '1018201802', 'Memorandum Orders', 'MEMORANDUM ORDER NO. 23 SERIES OF 2018', 'MEMO 23', 'PDF/MEMORANDUM ORDER NO. 23 SERIES OF 2018.PDF', 'Plant Health', '2018-10-18 05:37:31', NULL, NULL),
(3, '1018201803', 'Laws', 'www', 'www', 'PDF/www.PDF', 'Animal Health', '2018-10-18 06:50:30', NULL, NULL),
(4, '1018201803', 'Laws', 'www', 'www', 'PDF/www.PDF', 'Animal Health', '2018-10-18 06:59:56', NULL, NULL),
(5, '1018201805', 'Memorandum Orders', 'MEMORANDUM ORDER NO. 26 SERIES OF 2018', 'MEMO 26', 'PDF/MEMORANDUM ORDER NO. 26 SERIES OF 2018.PDF', 'Food Safety', '2018-10-18 07:11:53', NULL, NULL),
(6, '1022201806', 'Memorandum Orders', 'MEMORANDUM ORDER NO. 30 SERIES OF 2018', 'memorandummmmmmmmmmmmmmmmmmmmm', 'PDF/MEMORANDUM ORDER NO. 30 SERIES OF 2018.PDF', 'Plant Health', '2018-10-22 02:31:24', NULL, NULL),
(7, '1022201806', 'Memorandum Orders', 'MEMORANDUM ORDER NO. 30 SERIES OF 2018', 'memorandummmmmmmmmmmmmmmmmmmmm', 'PDF/MEMORANDUM ORDER NO. 30 SERIES OF 2018.PDF', 'Plant Health', '2018-10-22 02:36:12', NULL, NULL),
(8, '1022201806', 'Memorandum Orders', 'MEMORANDUM ORDER NO. 30 SERIES OF 2018', 'memorandummmmmmmmmmmmmmmmmmmmm', 'PDF/MEMORANDUM ORDER NO. 30 SERIES OF 2018.PDF', 'Plant Health', '2018-10-22 02:37:01', NULL, NULL),
(9, '1022201806', 'Memorandum Orders', 'MEMORANDUM ORDER NO. 30 SERIES OF 2018', 'memorandummmmmmmmmmmmmmmmmmmmm', 'PDF/MEMORANDUM ORDER NO. 30 SERIES OF 2018.PDF', 'Plant Health', '2018-10-22 02:37:23', NULL, NULL),
(10, '10222018010', 'Memorandum Orders', 'sadasda', 'adadsa', 'PDF/sadasda.PDF', 'General Coverage', '2018-10-22 08:04:54', NULL, NULL),
(11, '10042019011', 'DEPARTMENT ORDER', '453535345', '34535355', 'PDF/453535345.PDF', 'FOOD SAFETY', '2019-10-04 01:44:38', NULL, NULL),
(12, '1117202001', 'DEPARTMENT CIRCULAR', 'DGDF', 'GFDGDF', 'PDF/DGDF.PDF', 'PLANT HEALTH', '2020-11-17 05:19:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_em_country_code`
--

DROP TABLE IF EXISTS `tbl_em_country_code`;
CREATE TABLE IF NOT EXISTS `tbl_em_country_code` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(255) DEFAULT NULL,
  `em_country_name` varchar(255) DEFAULT NULL,
  `em_country_code` int(10) DEFAULT NULL,
  `INFO_USER` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_em_country_code`
--

INSERT INTO `tbl_em_country_code` (`ID`, `SPSID`, `em_country_name`, `em_country_code`, `INFO_USER`, `INFO_ACCESSLEVEL`) VALUES
(1, '10011820212', 'Ecuador', NULL, NULL, NULL),
(2, '10011820212', 'Korea, Democratic People', NULL, NULL, NULL),
(3, '10011820213', 'Falkland Islands (Malvinas)', NULL, NULL, NULL),
(4, '10011820213', 'Mayotte', NULL, NULL, NULL),
(5, '10011820213', 'Saint Barth?lemy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_em_upload`
--

DROP TABLE IF EXISTS `tbl_em_upload`;
CREATE TABLE IF NOT EXISTS `tbl_em_upload` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(100) DEFAULT NULL,
  `reg_notif_doc_link` varchar(100) DEFAULT NULL,
  `INFO_USER` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  `upload_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_em_upload`
--

INSERT INTO `tbl_em_upload` (`ID`, `SPSID`, `reg_notif_doc_link`, `INFO_USER`, `INFO_ACCESSLEVEL`, `upload_datetime`) VALUES
(1, '10011820212', '', NULL, NULL, '2021-01-18 08:48:07'),
(2, '10011820212', '', NULL, NULL, '2021-01-18 08:48:07'),
(3, '10011820212', '', NULL, NULL, '2021-01-18 08:48:07'),
(4, '10011820213', 'Memo Order No. 62 s. 2020.pdf', NULL, NULL, '2021-01-18 08:50:08'),
(5, '10011820213', 'Memo Order No. 63 s. 2020.pdf', NULL, NULL, '2021-01-18 08:50:08'),
(6, '10011820213', 'Memo Order No. 63 s. 2020.pdf', NULL, NULL, '2021-01-18 08:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regular_upload`
--

DROP TABLE IF EXISTS `tbl_regular_upload`;
CREATE TABLE IF NOT EXISTS `tbl_regular_upload` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(255) DEFAULT NULL,
  `reg_notif_doc_link` varchar(255) DEFAULT NULL,
  `INFO_USER` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  `upload_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_regular_upload`
--

INSERT INTO `tbl_regular_upload` (`ID`, `SPSID`, `reg_notif_doc_link`, `INFO_USER`, `INFO_ACCESSLEVEL`, `upload_datetime`) VALUES
(1, '10011820212', 'M.O. No. 59 S. of 2020 (2).pdf', NULL, NULL, '2021-01-18 08:39:10'),
(2, '10011820212', 'M.O. No. 60 S. of 2020 (1).pdf', NULL, NULL, '2021-01-18 08:39:10'),
(3, '10011820212', 'Memo Order No. 62 s. 2020.pdf', NULL, NULL, '2021-01-18 08:39:10'),
(4, '10011920213', 'MO No. 74 s. 2020.pdf', NULL, NULL, '2021-01-19 00:56:21'),
(5, '10011920213', 'MO No. 75 s. 2020.pdf', NULL, NULL, '2021-01-19 00:56:21'),
(6, '10011920213', 'MO No. 76 s. 2020.pdf', NULL, NULL, '2021-01-19 00:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg_country_code`
--

DROP TABLE IF EXISTS `tbl_reg_country_code`;
CREATE TABLE IF NOT EXISTS `tbl_reg_country_code` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(255) DEFAULT NULL,
  `reg_country_code` varchar(100) DEFAULT NULL,
  `INFO_USER` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reg_country_code`
--

INSERT INTO `tbl_reg_country_code` (`ID`, `SPSID`, `reg_country_code`, `INFO_USER`, `INFO_ACCESSLEVEL`) VALUES
(1, '10011820212', 'Afghanistan', NULL, ''),
(2, '10011820212', 'Jamaica', NULL, ''),
(3, '10011920213', 'Wallis and Futuna', NULL, NULL),
(4, '10011920213', 'Qatar', NULL, NULL),
(5, '10011920213', 'Trinidad and Tobago', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` varchar(100) NOT NULL,
  `INFO_PREFIX` varchar(255) DEFAULT NULL,
  `INFO_SUFFIX` varchar(255) DEFAULT NULL,
  `INFO_LNAME` varchar(255) DEFAULT NULL,
  `INFO_FNAME` varchar(255) DEFAULT NULL,
  `INFO_MNAME` varchar(255) DEFAULT NULL,
  `INFO_DOB` varchar(255) DEFAULT NULL,
  `INFO_POSITION` varchar(255) DEFAULT NULL,
  `INFO_USERNAME` varchar(255) DEFAULT NULL,
  `INFO_PASSWORD` varchar(255) DEFAULT NULL,
  `INFO_EMAILADD` varchar(255) DEFAULT NULL,
  `INFO_OFFICE` varchar(255) DEFAULT NULL,
  `INFO_AGENCY` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  `INFO_STATUS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `USERID`, `INFO_PREFIX`, `INFO_SUFFIX`, `INFO_LNAME`, `INFO_FNAME`, `INFO_MNAME`, `INFO_DOB`, `INFO_POSITION`, `INFO_USERNAME`, `INFO_PASSWORD`, `INFO_EMAILADD`, `INFO_OFFICE`, `INFO_AGENCY`, `INFO_ACCESSLEVEL`, `INFO_STATUS`) VALUES
(1, '13-0001-001', 'MS', 'N/A', 'RESCO', 'CHARMAINE', 'M', '12/21/1991', 'Information Systems Analyst II', 'menmen', 'menmen', 'rescocharmaine21@gmail.com', 'Department of Agriculture', 'ICTS', 'ADMINISTRATOR', 'ACTIVE'),
(2, 'USER010720212', 'MR', NULL, 'DELA CRUZ', 'JUAN', 'D', '1991-06-12', NULL, 'jdelacruz', 'jdelacruz', 'jdelacruz@gmail.com', 'Department of Agriculture', 'Bureau of Animal Industry', 'ENCODER', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usersid` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `mname` varchar(20) DEFAULT NULL,
  `prename` varchar(4) DEFAULT NULL,
  `suffname` varchar(4) DEFAULT NULL,
  `main` varchar(50) DEFAULT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `accesslvl` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `usersid`, `username`, `password`, `lname`, `fname`, `mname`, `prename`, `suffname`, `main`, `sub`, `accesslvl`, `dob`, `email`) VALUES
(1, '10001-001-01', 'menmen', '123', 'Resco', 'Charmaine', 'mailed', 'MS', 'n/a', '00000', '00010', 'ADMINISTRATOR', '1991-12-21', 'rescocharmaine21@yahoo.com'),
(2, '10001-001-02', 'charmaine', '12345', 'RESCO', 'MENMEN', 'M', 'MS', 'N/A', '10000', '10600', 'ENCODER', '1991-12-21', 'rescocharmaine21@yahoo.com'),
(3, '10001-001-03', 'markharris', '12345', 'JAMILAN', 'MARK HARRIS', 'M', 'MS', 'N/A', '00000', '00010', 'ENCODER', '2018-11-01', 'jamilanmarkharris@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `update_em_uploads`
--

DROP TABLE IF EXISTS `update_em_uploads`;
CREATE TABLE IF NOT EXISTS `update_em_uploads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(255) DEFAULT NULL,
  `upt_em_doc_link` varchar(255) DEFAULT NULL,
  `INFO_USER` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  `upload_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_em_uploads`
--

INSERT INTO `update_em_uploads` (`ID`, `SPSID`, `upt_em_doc_link`, `INFO_USER`, `INFO_ACCESSLEVEL`, `upload_datetime`) VALUES
(1, '10011820213', 'MO No. 65 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-20 02:31:14'),
(2, '10011820213', 'MO No. 66 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-20 02:31:14'),
(3, '10011820213', 'MO no. 67 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-20 02:31:14'),
(4, '10011820213', 'MO No. 69 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-20 02:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `update_regular_uploads`
--

DROP TABLE IF EXISTS `update_regular_uploads`;
CREATE TABLE IF NOT EXISTS `update_regular_uploads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SPSID` varchar(255) DEFAULT NULL,
  `upt_reg_doc_link` varchar(255) DEFAULT NULL,
  `INFO_USER` varchar(255) DEFAULT NULL,
  `INFO_ACCESSLEVEL` varchar(255) DEFAULT NULL,
  `upload_datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_regular_uploads`
--

INSERT INTO `update_regular_uploads` (`ID`, `SPSID`, `upt_reg_doc_link`, `INFO_USER`, `INFO_ACCESSLEVEL`, `upload_datetime`) VALUES
(1, '10011920213', 'MO No. 66 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:39:21'),
(2, '10011920213', 'MO no. 67 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:39:21'),
(3, '10011920213', 'MO No. 69 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:39:21'),
(4, '10011920213', 'M.O. No. 59 S. of 2020 (2).pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:54:11'),
(5, '10011920213', 'M.O. No. 60 S. of 2020 (1).pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:54:11'),
(6, '10011920213', 'Memo Order No. 62 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:54:11'),
(7, '10011920213', '', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:55:05'),
(8, '10011920213', 'MO No. 64 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-19 06:55:05'),
(9, '10011920213', 'MO No. 70 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-20 02:10:06'),
(10, '10011920213', 'MO No. 71 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-20 02:10:06'),
(11, '10011920213', 'MO No. 74 s. 2020.pdf', '13-0001-001', 'ADMINISTRATOR', '2021-01-20 02:10:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
