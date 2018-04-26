-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 03:27 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams_semifinal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_asset`
--

CREATE TABLE `ams_r_asset` (
  `A_ID` int(11) NOT NULL,
  `A_DESCRIPTION` varchar(250) NOT NULL,
  `A_DATE` date NOT NULL,
  `A_STATUS` varchar(25) NOT NULL DEFAULT 'Serviceable',
  `A_ACQUISITION_TYPE` varchar(25) NOT NULL,
  `A_AVAILABILITY` varchar(25) NOT NULL DEFAULT 'Available',
  `A_DISPOSAL_STATUS` int(11) NOT NULL DEFAULT '0',
  `AL_ID` int(11) DEFAULT NULL,
  `C_ID` int(11) DEFAULT NULL,
  `URS_ID` int(11) DEFAULT NULL,
  `PPMP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_asset`
--

INSERT INTO `ams_r_asset` (`A_ID`, `A_DESCRIPTION`, `A_DATE`, `A_STATUS`, `A_ACQUISITION_TYPE`, `A_AVAILABILITY`, `A_DISPOSAL_STATUS`, `AL_ID`, `C_ID`, `URS_ID`, `PPMP_ID`) VALUES
(1, 'Fujidenzo Aircon', '2018-03-01', 'Serviceable', 'Donation', 'Available', 0, 6, NULL, NULL, NULL),
(2, 'ASUS ROG Computer', '2018-03-02', 'Serviceable', 'Donation', 'Available', 0, 1, NULL, NULL, NULL),
(3, 'A4Tech Office Keyboard', '2018-03-03', 'Serviceable', 'Donation', 'Available', 0, 4, NULL, NULL, NULL),
(4, 'Acer Predator Gaming Laptop', '2018-03-04', 'Serviceable', 'Donation', 'Assigned', 0, 2, NULL, NULL, NULL),
(5, 'Hanabishi Stand Fan', '2018-03-05', 'Serviceable', 'Donation', 'Assigned', 0, 3, NULL, NULL, NULL),
(6, 'A4Tech Home Mouse', '2018-03-06', 'Serviceable', 'Donation', 'Assigned', 0, 5, NULL, NULL, NULL),
(7, 'LG LED TV', '2018-03-07', 'Serviceable', 'Donation', 'Assigned', 0, 7, NULL, NULL, NULL),
(8, 'Gambel 2MP CCTV', '2018-03-08', 'Serviceable', 'Donation', 'Assigned', 0, 8, NULL, NULL, NULL),
(9, 'Silvertee Home Speaker', '2018-03-09', 'Serviceable', 'Donation', 'Assigned', 0, 9, NULL, NULL, NULL),
(10, 'EPSON Projector', '2018-03-10', 'Serviceable', 'Donation', 'Assigned', 0, 10, NULL, NULL, NULL),
(11, 'Epson Printer', '2018-03-11', 'Serviceable', 'Donation', 'Assigned', 0, 11, NULL, NULL, NULL),
(12, 'Dell Laptop', '2018-03-15', 'Disposed', 'Donation', 'Available', 1, 2, NULL, NULL, NULL),
(13, 'Standard Wall Fan', '2018-03-14', 'Disposed', 'Donation', 'Available', 1, 3, NULL, NULL, NULL),
(14, 'Keymatt Mechanical Keyboard', '2018-03-13', 'For Disposal', 'Donation', 'Available', 0, 4, NULL, NULL, NULL),
(15, 'Logitech Gaming Mouse', '2018-03-12', 'For Disposal', 'Donation', 'Available', 0, 5, NULL, NULL, NULL),
(16, 'Iwata Aircool Aircon', '2018-03-16', 'For Disposal', 'Donation', 'Available', 0, 6, NULL, NULL, NULL),
(17, 'SONY Bravia TV', '2018-03-17', 'Transferred Out', 'Donation', 'Available', 0, 7, NULL, NULL, NULL),
(18, 'Cube Cory CCTV', '2018-03-18', 'For Repair', 'Donation', 'Available', 0, 8, NULL, NULL, NULL),
(19, 'Crown Home Speaker', '2018-03-19', 'For Repair', 'Donation', 'Available', 0, 9, NULL, NULL, NULL),
(20, 'APPO YG Projector', '2018-03-20', 'On Job Order', 'Donation', 'Available', 0, 10, NULL, NULL, NULL),
(21, 'Canon Pixma', '2018-03-21', 'On Job Order', 'Donation', 'Available', 0, 11, NULL, NULL, NULL),
(22, 'Lenovo Gaming Computer', '2018-03-01', 'Serviceable', 'Donation', 'Available', 0, 1, NULL, NULL, NULL),
(23, 'Lenovo Home Computer', '2018-03-02', 'Serviceable', 'Donation', 'Available', 0, 1, NULL, NULL, NULL),
(24, 'HP Elite Laptop', '2018-03-03', 'Serviceable', 'Donation', 'Available', 0, 2, NULL, NULL, NULL),
(25, 'Asahi Industrial Fan', '2018-03-04', 'Serviceable', 'Donation', 'Available', 0, 3, NULL, NULL, NULL),
(26, 'Gigaware Keypress gaming keyboard', '2018-03-05', 'Serviceable', 'Donation', 'Assigned', 0, 4, NULL, NULL, NULL),
(27, 'RedDragon Mirage Gaming Mouse', '2018-03-06', 'Serviceable', 'Donation', 'Assigned', 0, 5, NULL, NULL, NULL),
(28, 'QUBE 1.5HP Inverter Aircon', '2018-03-07', 'Serviceable', 'Donation', 'Assigned', 0, 6, NULL, NULL, NULL),
(29, 'Itechie 24\" Full HD LED TV', '2018-03-08', 'Serviceable', 'Donation', 'Assigned', 0, 7, NULL, NULL, NULL),
(30, 'iSAFE High Definition DOME and BULLET CCTV', '2018-03-10', 'Serviceable', 'Donation', 'Available', 0, 8, NULL, NULL, NULL),
(31, 'Konzert Karaoke Speaker System Speaker', '2018-03-12', 'Transferred Out', 'Donation', 'Available', 0, 9, NULL, NULL, NULL),
(32, 'Brand Panther Projector Home LED-86', '2018-03-13', 'Disposed', 'Donation', 'Available', 1, 10, NULL, NULL, NULL),
(33, 'Fuji Xerox P255 DW Brand New Mono Laser Printer', '2018-03-15', 'For Disposal', 'Donation', 'Available', 0, 11, NULL, NULL, NULL),
(34, 'Nighthawk Entry Level Gaming PC Package', '2018-03-16', 'For Disposal', 'Donation', 'Available', 0, 1, NULL, NULL, NULL),
(35, 'Acer Aspire ES1 331 P7AG Laptop', '2018-03-17', 'Transferred Out', 'Donation', 'Available', 0, 2, NULL, NULL, NULL),
(36, 'CPT Hanabishi Windmill18GF Ground Fan', '2018-03-18', 'Serviceable', 'Donation', 'Assigned', 0, 3, NULL, NULL, NULL),
(37, 'K611 Fighter Fantech RGB Backlit Full Keys Gaming Keyboard', '2018-03-01', 'Serviceable', 'Donation', 'Available', 0, 4, NULL, NULL, NULL),
(38, 'Optical Mouse Double Click Usb Interface OP620D', '2018-03-02', 'Serviceable', 'Donation', 'Available', 0, 5, NULL, NULL, NULL),
(39, 'Eureka EWA-0.6HP Window Type Air Conditioner', '2018-03-04', 'Serviceable', 'Donation', 'Assigned', 0, 6, NULL, NULL, NULL),
(40, 'Avision 32\" HD Ready LED TV Black', '2018-03-03', 'Serviceable', 'Donation', 'Available', 0, 7, NULL, NULL, NULL),
(41, '	\r\nWireless IP Camera CCTV WiFi Home Video Surveillance Camera', '2018-03-05', 'Serviceable', 'Donation', 'Assigned', 0, 8, NULL, NULL, NULL),
(42, 'Promac HAS-6530BT Home Audio System with Bluetooth', '2018-03-06', 'Serviceable', 'Donation', 'Available', 0, 9, NULL, NULL, NULL),
(43, 'Acer ES-13D 3600 Ansi Lumens Projector', '2018-03-07', 'Serviceable', 'Donation', 'Assigned', 0, 10, NULL, NULL, NULL),
(44, 'Xprinter 58mm Thermal Receipt Printer XP-58IIH', '2018-03-08', 'Serviceable', 'Donation', 'Assigned', 0, 11, NULL, NULL, NULL),
(45, 'Digital Age Fortress AMD A4 6300 Entry Level Computer Package', '2018-03-11', 'Serviceable', 'Donation', 'Assigned', 0, 1, NULL, NULL, NULL),
(46, 'Nextbook Flexx9 8.9\" Intel Atom Quad-Core 1GB Blue', '2018-03-12', 'Serviceable', 'Donation', 'Available', 0, 2, NULL, NULL, NULL),
(47, 'Imarflex Digital Eco Mist Fan', '2018-03-13', 'For Disposal', 'Donation', 'Available', 0, 3, NULL, NULL, NULL),
(48, 'ZYG 800 LED Colorful Backlight Gaming USB Keyboard Black', '2018-03-14', 'Disposed', 'Donation', 'Available', 1, 4, NULL, NULL, NULL),
(49, 'Logitech M170 Wireless USB mouse', '2018-03-15', 'For Disposal', 'Donation', 'Available', 0, 5, NULL, NULL, NULL),
(50, 'Daikin 1 0HP Cooling King Standard Split Type Air Conditioner White', '2018-03-16', 'For Disposal', 'Donation', 'Available', 0, 6, NULL, NULL, NULL),
(51, 'Ace 32 Slim LED TV Black LED', '2018-03-18', 'On Job Order', 'Donation', 'Available', 0, 7, NULL, NULL, NULL),
(52, 'Immix Home Office Buisiness Security 10 Megapixel Camera Kit Black', '2018-03-17', 'Transferred Out', 'Donation', 'Available', 0, 8, NULL, NULL, NULL),
(53, 'Kevler EON 8 8 250W Plastic Moulded Speaker', '2018-03-01', 'Transferred Out', 'Donation', 'Available', 0, 9, NULL, NULL, NULL),
(54, 'UC28 Mini Portable Projector Black With Free Assorted Color Bluetooth Speaker', '2018-03-02', 'Serviceable', 'Donation', 'Available', 0, 10, NULL, NULL, NULL),
(55, 'Samsung S8+', '2018-04-10', 'Serviceable', 'Donation', 'Assigned', 0, 12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_asset_category`
--

CREATE TABLE `ams_r_asset_category` (
  `AC_ID` int(11) NOT NULL,
  `AC_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_asset_category`
--

INSERT INTO `ams_r_asset_category` (`AC_ID`, `AC_NAME`) VALUES
(1, 'Electronic Equipment'),
(2, 'Electronic Device'),
(3, 'Mobile Device'),
(4, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_asset_library`
--

CREATE TABLE `ams_r_asset_library` (
  `AL_ID` int(11) NOT NULL,
  `AL_NAME` varchar(150) NOT NULL,
  `UNT_ID` int(11) NOT NULL,
  `AC_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_asset_library`
--

INSERT INTO `ams_r_asset_library` (`AL_ID`, `AL_NAME`, `UNT_ID`, `AC_ID`) VALUES
(1, 'Computer', 1, 1),
(2, 'Laptop', 3, 1),
(3, 'Electric Fan', 3, 1),
(4, 'Keyboard', 3, 2),
(5, 'Computer Mouse', 3, 2),
(6, 'Aircon', 3, 1),
(7, 'Tv', 3, 1),
(8, 'CCTV', 3, 1),
(9, 'Speaker', 1, 1),
(10, 'Projector', 3, 1),
(11, 'Printer', 3, 1),
(12, 'Phone', 3, 3),
(13, 'Headset', 3, 2),
(14, 'System Unit', 3, 2),
(15, 'AVR', 3, 2),
(16, 'Webcam', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_asset_unit`
--

CREATE TABLE `ams_r_asset_unit` (
  `UNT_ID` int(11) NOT NULL,
  `UNT_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_asset_unit`
--

INSERT INTO `ams_r_asset_unit` (`UNT_ID`, `UNT_NAME`) VALUES
(1, 'Set'),
(3, 'Piece');

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_campus`
--

CREATE TABLE `ams_r_campus` (
  `C_ID` int(11) NOT NULL,
  `C_CODE` varchar(50) NOT NULL,
  `C_NAME` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_campus`
--

INSERT INTO `ams_r_campus` (`C_ID`, `C_CODE`, `C_NAME`) VALUES
(1, 'PUP QC', 'Polytechnic University of the Philippines Quezon City'),
(2, 'PUP MNL', 'Polytechnic University of the Philippines Sta. Mesa'),
(3, 'PUP SJ', 'Polytechnic University of the Philippines San Juan'),
(4, 'PUP TG', 'Polytechnic University of the Philippines Taguig'),
(5, 'PUP PRQ', 'Polytechnic University of the Philippines Paranaque'),
(6, 'PUP BTN', 'Polytechnic University of the Philippines Bataan');

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_disposal_location`
--

CREATE TABLE `ams_r_disposal_location` (
  `DL_ID` int(11) NOT NULL,
  `DL_CODE` varchar(30) NOT NULL,
  `DL_DESC` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_disposal_location`
--

INSERT INTO `ams_r_disposal_location` (`DL_ID`, `DL_CODE`, `DL_DESC`) VALUES
(1, 'PUPQC WAREHOUSE', 'Polytechnic University of the Philippines Quezon City - Warehouse'),
(2, 'PUPQC BARRACKS', 'Polytechnic University of the Philippines Quezon City - Barracks');

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_employee_profile`
--

CREATE TABLE `ams_r_employee_profile` (
  `EP_ID` int(11) NOT NULL,
  `EP_FNAME` varchar(50) NOT NULL,
  `EP_MNAME` varchar(35) DEFAULT NULL,
  `EP_LNAME` varchar(35) NOT NULL,
  `EP_GENDER` varchar(10) NOT NULL,
  `EP_MOBILE` char(11) DEFAULT NULL,
  `EP_EMAIL` varchar(75) NOT NULL,
  `EP_TYPE` varchar(50) NOT NULL,
  `EP_STATUS` varchar(10) NOT NULL DEFAULT 'Active',
  `EP_PICTURE` varchar(200) NOT NULL DEFAULT '	images/EmployePictures/default.png	',
  `O_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_employee_profile`
--

INSERT INTO `ams_r_employee_profile` (`EP_ID`, `EP_FNAME`, `EP_MNAME`, `EP_LNAME`, `EP_GENDER`, `EP_MOBILE`, `EP_EMAIL`, `EP_TYPE`, `EP_STATUS`, `EP_PICTURE`, `O_ID`) VALUES
(1, 'Shiela Mae', NULL, 'Velga', 'Female', NULL, 'shiela@gmail.com', 'Administrator', 'Active', 'images/EmployePictures/shiela.jpg', NULL),
(2, 'James Vincent', NULL, 'Nicolas', 'Male', NULL, 'ishallbejv@gmail.com', 'Departmental User', 'Active', 'images/EmployePictures/james.jpg', 1),
(3, 'Bryan', 'B.', 'Cortesiano', 'Male', NULL, 'cortesianobryanthegreat@gmail.com', 'Property Officer', 'Active', 'images/EmployePictures/bryanprofilepic.jpg', 2),
(4, 'Esperato', NULL, 'Illaida', 'Male', NULL, 'espe@gmail.com', 'Departmental User', 'Active', 'images/EmployePictures/espe.jpg', 3),
(5, 'Dan Joseph', NULL, 'Madrazo', 'Male', NULL, 'djmadrazo@gmail.com', 'Employee', 'Active', 'images/EmployePictures/danjo.jpg', 1),
(6, 'Firmo', 'A.', 'Esguerra', 'Male', NULL, 'firmoesguerra@gmail.com', 'Director', 'Active', 'images/EmployePictures/default.png	', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_office`
--

CREATE TABLE `ams_r_office` (
  `O_ID` int(11) NOT NULL,
  `O_CODE` varchar(50) NOT NULL,
  `O_NAME` varchar(120) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_office`
--

INSERT INTO `ams_r_office` (`O_ID`, `O_CODE`, `O_NAME`, `C_ID`) VALUES
(1, 'OSAS-QC', 'Office of the Student Affairs and Services', 1),
(2, 'AO-QC', 'Admin Office', 1),
(3, 'GO-QC', 'Guidance Office', 1),
(4, 'RO-QC', 'Registrar Office', 1),
(5, 'LO-QC', 'Library Office', 1),
(6, 'CO-QC', 'Cashier Office', 1),
(7, 'CLC-QC', 'Dental Clinic', 1),
(8, 'OSAS-MNL', 'Office of the Student Affairs and Services', 2),
(9, 'RO-TG', 'Registrar Office', 4),
(10, 'DO-QC', 'Director\'s Office', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_ppmp_period`
--

CREATE TABLE `ams_r_ppmp_period` (
  `PPMPP_ID` int(11) NOT NULL,
  `PPMPP_START_DATE` date NOT NULL,
  `PPMPP_END_DATE` date NOT NULL,
  `PPMPP_STATUS` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_user`
--

CREATE TABLE `ams_r_user` (
  `U_USERNAME` varchar(25) NOT NULL,
  `U_PASSWORD` varchar(150) NOT NULL,
  `U_ROLE_CODE` varchar(30) NOT NULL,
  `EP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_user`
--

INSERT INTO `ams_r_user` (`U_USERNAME`, `U_PASSWORD`, `U_ROLE_CODE`, `EP_ID`) VALUES
('admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Administrator', 1),
('du1', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Departmental User', 2),
('du2', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Departmental User', 4),
('po', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Property Officer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ams_r_users_log`
--

CREATE TABLE `ams_r_users_log` (
  `UL_LOGGED_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UL_LOGGED_TYPE` varchar(50) NOT NULL,
  `EP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_r_users_log`
--

INSERT INTO `ams_r_users_log` (`UL_LOGGED_DATE`, `UL_LOGGED_TYPE`, `EP_ID`) VALUES
('2018-04-06 00:52:59', 'logged in', 2),
('2018-04-06 00:55:27', 'logged in', 2),
('2018-04-06 01:16:49', 'logged out', 3),
('2018-04-06 01:16:56', 'logged in', 2),
('2018-04-06 01:23:11', 'logged out', 2),
('2018-04-06 01:23:15', 'logged in', 4),
('2018-04-06 01:23:17', 'logged out', 4),
('2018-04-06 01:23:20', 'logged in', 2),
('2018-04-06 01:30:28', 'logged in', 3),
('2018-04-06 01:32:13', 'logged out', 2),
('2018-04-06 01:32:17', 'logged in', 4),
('2018-04-06 01:32:51', 'logged out', 4),
('2018-04-06 01:32:54', 'logged in', 2),
('2018-04-06 01:34:44', 'logged out', 2),
('2018-04-06 01:34:54', 'logged in', 2),
('2018-04-06 01:39:09', 'logged out', 2),
('2018-04-06 01:39:18', 'logged in', 4),
('2018-04-06 01:40:24', 'logged out', 4),
('2018-04-06 01:40:28', 'logged in', 2),
('2018-04-06 01:41:32', 'logged out', 2),
('2018-04-06 01:41:35', 'logged in', 4),
('2018-04-06 01:48:13', 'logged out', 4),
('2018-04-06 01:48:20', 'logged in', 2),
('2018-04-06 01:48:23', 'logged out', 2),
('2018-04-06 01:50:39', 'logged in', 2),
('2018-04-06 01:50:44', 'logged out', 2),
('2018-04-06 01:50:48', 'logged in', 4),
('2018-04-06 01:51:04', 'logged out', 4),
('2018-04-06 01:51:07', 'logged in', 2),
('2018-04-06 01:51:10', 'logged out', 2),
('2018-04-06 01:51:14', 'logged in', 4),
('2018-04-06 01:51:29', 'logged out', 4),
('2018-04-06 01:51:33', 'logged in', 2),
('2018-04-06 01:54:49', 'logged out', 3),
('2018-04-06 01:54:52', 'logged in', 3),
('2018-04-06 01:56:12', 'logged out', 2),
('2018-04-06 01:56:15', 'logged in', 3),
('2018-04-06 01:59:41', 'logged out', 3),
('2018-04-06 01:59:45', 'logged in', 2),
('2018-04-06 02:00:54', 'logged out', 2),
('2018-04-06 02:00:58', 'logged in', 3),
('2018-04-06 02:03:19', 'logged out', 3),
('2018-04-06 02:03:23', 'logged in', 3),
('2018-04-06 02:03:30', 'logged out', 3),
('2018-04-06 02:03:35', 'logged in', 2),
('2018-04-06 02:03:39', 'logged out', 2),
('2018-04-06 02:04:06', 'logged in', 2),
('2018-04-06 02:04:25', 'logged out', 2),
('2018-04-06 02:06:42', 'logged in', 2),
('2018-04-06 02:06:51', 'logged out', 2),
('2018-04-06 02:06:55', 'logged in', 3),
('2018-04-06 02:09:08', 'logged in', 2),
('2018-04-06 02:09:12', 'logged out', 2),
('2018-04-06 02:09:16', 'logged in', 3),
('2018-04-06 02:10:01', 'logged in', 2),
('2018-04-06 02:25:17', 'logged out', 2),
('2018-04-06 02:25:25', 'logged in', 4),
('2018-04-06 02:26:53', 'logged out', 4),
('2018-04-06 02:26:57', 'logged in', 2),
('2018-04-06 02:29:43', 'logged out', 2),
('2018-04-06 02:29:47', 'logged in', 4),
('2018-04-06 02:32:07', 'logged out', 4),
('2018-04-06 02:32:11', 'logged in', 2),
('2018-04-06 02:40:17', 'logged out', 2),
('2018-04-06 02:40:21', 'logged in', 2),
('2018-04-06 02:43:18', 'logged out', 2),
('2018-04-06 02:43:21', 'logged in', 4),
('2018-04-06 02:43:25', 'logged out', 4),
('2018-04-06 02:43:31', 'logged in', 2),
('2018-04-07 10:13:27', 'logged in', 3),
('2018-04-07 10:13:43', 'logged in', 2),
('2018-04-07 10:21:13', 'logged out', 2),
('2018-04-07 10:21:17', 'logged in', 2),
('2018-04-07 10:21:19', 'logged out', 2),
('2018-04-07 10:21:24', 'logged in', 4),
('2018-04-07 10:21:30', 'logged out', 4),
('2018-04-07 10:21:38', 'logged in', 2),
('2018-04-07 10:51:02', 'logged out', 2),
('2018-04-07 10:51:05', 'logged in', 4),
('2018-04-07 10:51:07', 'logged out', 4),
('2018-04-07 10:51:10', 'logged in', 2),
('2018-04-07 10:55:39', 'logged out', 2),
('2018-04-07 10:55:42', 'logged in', 4),
('2018-04-07 11:05:27', 'logged out', 4),
('2018-04-07 11:05:33', 'logged in', 2),
('2018-04-07 11:08:00', 'logged out', 2),
('2018-04-07 11:08:09', 'logged in', 4),
('2018-04-07 11:08:22', 'logged out', 4),
('2018-04-07 11:08:25', 'logged in', 2),
('2018-04-07 11:10:03', 'logged out', 2),
('2018-04-07 11:10:08', 'logged in', 2),
('2018-04-07 11:10:20', 'logged out', 2),
('2018-04-07 11:10:24', 'logged in', 4),
('2018-04-07 11:17:50', 'logged out', 4),
('2018-04-07 11:18:00', 'logged in', 2),
('2018-04-07 11:22:12', 'logged out', 3),
('2018-04-07 11:22:16', 'logged in', 2),
('2018-04-07 11:23:17', 'logged out', 2),
('2018-04-07 11:23:21', 'logged in', 3),
('2018-04-07 11:24:39', 'logged out', 3),
('2018-04-07 11:24:43', 'logged in', 2),
('2018-04-07 11:25:30', 'logged out', 2),
('2018-04-07 11:25:35', 'logged in', 4),
('2018-04-07 11:26:24', 'logged out', 4),
('2018-04-07 11:26:30', 'logged in', 2),
('2018-04-07 11:26:50', 'logged out', 2),
('2018-04-07 11:26:54', 'logged in', 3),
('2018-04-07 11:27:31', 'logged out', 3),
('2018-04-07 11:27:36', 'logged in', 4),
('2018-04-07 11:27:47', 'logged out', 4),
('2018-04-07 11:27:51', 'logged in', 2),
('2018-04-07 11:28:19', 'logged out', 2),
('2018-04-07 11:28:22', 'logged in', 2),
('2018-04-07 11:28:25', 'logged out', 2),
('2018-04-07 11:28:28', 'logged in', 4),
('2018-04-07 11:29:51', 'logged out', 4),
('2018-04-07 11:29:55', 'logged in', 2),
('2018-04-07 11:30:58', 'logged out', 2),
('2018-04-07 11:31:02', 'logged in', 3),
('2018-04-07 11:31:06', 'logged out', 3),
('2018-04-07 11:31:15', 'logged in', 4),
('2018-04-07 11:33:25', 'logged out', 4),
('2018-04-07 11:33:28', 'logged in', 2),
('2018-04-07 11:42:09', 'logged out', 2),
('2018-04-07 11:42:14', 'logged in', 4),
('2018-04-07 11:46:44', 'logged out', 4),
('2018-04-07 11:46:47', 'logged in', 3),
('2018-04-07 11:48:05', 'logged out', 3),
('2018-04-07 11:48:12', 'logged in', 2),
('2018-04-07 11:48:41', 'logged out', 2),
('2018-04-07 11:48:45', 'logged in', 4),
('2018-04-07 11:49:31', 'logged out', 4),
('2018-04-07 11:49:34', 'logged in', 2),
('2018-04-07 11:52:38', 'logged in', 3),
('2018-04-07 11:58:25', 'logged out', 2),
('2018-04-07 11:58:29', 'logged in', 4),
('2018-04-07 11:58:44', 'logged out', 4),
('2018-04-07 11:58:47', 'logged in', 2),
('2018-04-07 11:58:52', 'logged out', 2),
('2018-04-07 11:59:06', 'logged in', 3),
('2018-04-07 11:59:19', 'logged out', 3),
('2018-04-07 11:59:22', 'logged in', 2),
('2018-04-07 12:05:52', 'logged out', 2),
('2018-04-07 12:06:24', 'logged in', 3),
('2018-04-07 12:55:44', 'logged out', 3),
('2018-04-07 12:55:50', 'logged in', 2),
('2018-04-07 12:56:07', 'logged out', 2),
('2018-04-07 12:56:10', 'logged in', 3),
('2018-04-07 12:57:21', 'logged out', 3),
('2018-04-07 12:57:24', 'logged in', 2),
('2018-04-07 13:00:24', 'logged out', 2),
('2018-04-07 13:00:27', 'logged in', 3),
('2018-04-07 13:00:48', 'logged out', 3),
('2018-04-07 13:03:42', 'logged in', 2),
('2018-04-08 11:58:21', 'logged in', 3),
('2018-04-08 14:18:38', 'logged in', 2),
('2018-04-08 17:57:15', 'logged in', 3),
('2018-04-09 19:58:10', 'logged in', 3),
('2018-04-09 22:40:13', 'logged in', 3),
('2018-04-10 09:28:31', 'logged in', 3),
('2018-04-19 01:40:59', 'logged in', 3),
('2018-04-20 22:55:52', 'logged in', 3),
('2018-04-22 08:36:39', 'logged in', 2),
('2018-04-22 08:37:21', 'logged out', 2),
('2018-04-22 08:37:26', 'logged in', 3),
('2018-04-26 11:43:01', 'logged in', 3),
('2018-04-26 13:19:28', 'logged in', 3),
('2018-04-26 13:58:02', 'logged in', 2),
('2018-04-26 13:58:28', 'logged out', 2),
('2018-04-26 13:58:31', 'logged in', 4),
('2018-04-26 15:01:38', 'logged in', 2),
('2018-04-26 15:04:04', 'logged in', 4),
('2018-04-26 15:04:14', 'logged out', 4),
('2018-04-26 15:04:19', 'logged in', 2),
('2018-04-26 15:04:38', 'logged out', 2),
('2018-04-26 15:04:47', 'logged in', 4),
('2018-04-26 15:13:18', 'logged out', 3),
('2018-04-26 16:01:43', 'logged in', 3),
('2018-04-26 16:06:58', 'logged in', 2),
('2018-04-26 16:45:59', 'logged in', 2),
('2018-04-26 18:53:50', 'logged out', 3),
('2018-04-26 18:53:54', 'logged in', 2),
('2018-04-26 18:54:19', 'logged out', 2),
('2018-04-26 18:55:03', 'logged in', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_dispose`
--

CREATE TABLE `ams_t_dispose` (
  `D_ID` int(11) NOT NULL,
  `D_DATE` date NOT NULL,
  `D_TYPE` varchar(15) NOT NULL,
  `D_REMARKS` varchar(250) NOT NULL,
  `D_DISPOSED_BY` varchar(120) NOT NULL,
  `DL_ID` int(11) DEFAULT NULL,
  `A_ID` int(11) NOT NULL,
  `PARS_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_dispose`
--

INSERT INTO `ams_t_dispose` (`D_ID`, `D_DATE`, `D_TYPE`, `D_REMARKS`, `D_DISPOSED_BY`, `DL_ID`, `A_ID`, `PARS_ID`) VALUES
(1, '2018-04-04', 'Keep', 'DSADA', 'Bryan B. Cortesiano', 2, 32, NULL),
(2, '2018-04-04', 'Keep', 'DSADA', 'Bryan B. Cortesiano', 2, 13, NULL),
(3, '2018-04-04', 'Keep', 'DSADA', 'Bryan B. Cortesiano', 2, 48, NULL),
(4, '2018-04-04', 'Keep', 'DSADA', 'Bryan B. Cortesiano', 2, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_job_order`
--

CREATE TABLE `ams_t_job_order` (
  `JO_ID` int(11) NOT NULL,
  `JO_NO` varchar(15) NOT NULL,
  `JO_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_job_order`
--

INSERT INTO `ams_t_job_order` (`JO_ID`, `JO_NO`, `JO_DATE`) VALUES
(1, 'JO-2018-0001', '2018-04-10'),
(2, 'JO-2018-0002', '2018-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_job_order_sub`
--

CREATE TABLE `ams_t_job_order_sub` (
  `JOS_ID` int(11) NOT NULL,
  `JOS_REPAIRED_DATE` date DEFAULT NULL,
  `JOS_READY_FOR_DISPOSE_DATE` date DEFAULT NULL,
  `JOS_STATUS` varchar(25) NOT NULL DEFAULT 'For Repair',
  `A_ID` int(11) NOT NULL,
  `JO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_job_order_sub`
--

INSERT INTO `ams_t_job_order_sub` (`JOS_ID`, `JOS_REPAIRED_DATE`, `JOS_READY_FOR_DISPOSE_DATE`, `JOS_STATUS`, `A_ID`, `JO_ID`) VALUES
(1, NULL, NULL, 'For Repair', 51, 1),
(2, NULL, NULL, 'For Repair', 21, 1),
(3, NULL, NULL, 'For Repair', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_par`
--

CREATE TABLE `ams_t_par` (
  `PAR_ID` int(11) NOT NULL,
  `PAR_NO` varchar(15) NOT NULL,
  `PAR_DATE` date NOT NULL,
  `PAR_ISSUED_BY` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_par`
--

INSERT INTO `ams_t_par` (`PAR_ID`, `PAR_NO`, `PAR_DATE`, `PAR_ISSUED_BY`) VALUES
(1, 'PAR-2018-0001', '2018-04-10', 'Bryan B. Cortesiano'),
(2, 'PAR-2018-0002', '2018-04-26', 'Bryan B. Cortesiano'),
(3, 'PAR-2018-0003', '2018-04-27', 'Bryan B. Cortesiano'),
(4, 'PAR-2018-0004', '2018-04-25', 'Bryan B. Cortesiano'),
(5, 'PAR-2018-0005', '2018-04-26', 'Bryan B. Cortesiano'),
(6, 'PAR-2018-0006', '2018-04-26', 'Bryan B. Cortesiano'),
(7, 'PAR-2018-0007', '2018-04-26', 'Bryan B. Cortesiano'),
(8, 'PAR-2018-0008', '2018-04-26', 'Bryan B. Cortesiano'),
(9, 'PAR-2018-0009', '2018-04-26', 'Bryan B. Cortesiano'),
(10, 'PAR-2018-0010', '2018-04-26', 'Bryan B. Cortesiano'),
(11, 'PAR-2018-0011', '2018-04-26', 'Bryan B. Cortesiano'),
(12, 'PAR-2018-0012', '2018-04-26', 'Bryan B. Cortesiano'),
(13, 'PAR-2018-0013', '2018-04-26', 'Bryan B. Cortesiano');

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_par_sub`
--

CREATE TABLE `ams_t_par_sub` (
  `PARS_ID` int(11) NOT NULL,
  `PARS_CANCEL` int(11) NOT NULL DEFAULT '0',
  `PARS_CANCEL_DATE` date DEFAULT NULL,
  `PARS_CANCEL_BY` varchar(120) DEFAULT NULL,
  `A_ID` int(11) NOT NULL,
  `PAR_ID` int(11) NOT NULL,
  `EP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_par_sub`
--

INSERT INTO `ams_t_par_sub` (`PARS_ID`, `PARS_CANCEL`, `PARS_CANCEL_DATE`, `PARS_CANCEL_BY`, `A_ID`, `PAR_ID`, `EP_ID`) VALUES
(1, 0, NULL, NULL, 36, 1, 4),
(2, 0, NULL, NULL, 55, 1, 4),
(3, 0, NULL, NULL, 11, 2, 2),
(4, 1, '2018-04-26', 'James Vincent Nicolas', 46, 2, 2),
(5, 0, NULL, NULL, 10, 3, 3),
(6, 0, NULL, NULL, 45, 3, 3),
(7, 0, NULL, NULL, 9, 4, 5),
(8, 1, '2018-04-26', 'James Vincent Nicolas', 30, 4, 5),
(9, 0, NULL, NULL, 7, 5, 6),
(10, 0, NULL, NULL, 43, 5, 6),
(11, 0, NULL, NULL, 8, 5, 6),
(12, 0, NULL, NULL, 44, 5, 6),
(13, 0, NULL, NULL, 29, 5, 6),
(14, 0, NULL, NULL, 28, 6, 2),
(15, 0, NULL, NULL, 6, 7, 4),
(16, 0, NULL, NULL, 27, 8, 3),
(17, 1, '2018-04-26', 'James Vincent Nicolas', 42, 9, 5),
(18, 0, NULL, NULL, 26, 10, 6),
(19, 0, NULL, NULL, 5, 11, 2),
(20, 0, NULL, NULL, 41, 12, 3),
(21, 0, NULL, NULL, 39, 13, 3),
(22, 0, NULL, NULL, 4, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_ppmp`
--

CREATE TABLE `ams_t_ppmp` (
  `PPMP_ID` int(11) NOT NULL,
  `PPMP_NO` varchar(15) NOT NULL,
  `PPMP_DATE` date NOT NULL,
  `EP_ID` int(11) NOT NULL,
  `PPMPP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_ppmp_sub`
--

CREATE TABLE `ams_t_ppmp_sub` (
  `PPMPS_ID` int(11) NOT NULL,
  `PPMPS_REQUEST_DATE` date NOT NULL,
  `PPMPS_STATUS` varchar(25) NOT NULL DEFAULT 'Pending',
  `PPMPS_APPROVED_DATE` date DEFAULT NULL,
  `PPMPS_REJECT_DATE` date DEFAULT NULL,
  `PPMPS_FOR_MONTH` varchar(25) NOT NULL,
  `PPMPS_QUANTITY` int(11) NOT NULL,
  `PPMPS_UNIT` varchar(25) NOT NULL,
  `AL_ID` int(11) NOT NULL,
  `PPMPP_ID` int(11) NOT NULL,
  `PPMP_ID` int(11) DEFAULT NULL,
  `EP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_release_of_asset`
--

CREATE TABLE `ams_t_release_of_asset` (
  `ROA_ID` int(11) NOT NULL,
  `ROA_REASON` varchar(350) NOT NULL,
  `ROA_DATE` date NOT NULL,
  `ROA_VIEW_BY_PO` int(11) NOT NULL DEFAULT '0',
  `ROA_RELEASED_BY` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_release_of_asset`
--

INSERT INTO `ams_t_release_of_asset` (`ROA_ID`, `ROA_REASON`, `ROA_DATE`, `ROA_VIEW_BY_PO`, `ROA_RELEASED_BY`) VALUES
(1, 'release\n', '2018-04-26', 0, 'James Vincent Nicolas');

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_release_of_asset_sub`
--

CREATE TABLE `ams_t_release_of_asset_sub` (
  `ROAS_ID` int(11) NOT NULL,
  `A_ID` int(11) NOT NULL,
  `ROA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_release_of_asset_sub`
--

INSERT INTO `ams_t_release_of_asset_sub` (`ROAS_ID`, `A_ID`, `ROA_ID`) VALUES
(1, 42, 1),
(2, 30, 1),
(3, 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_report_of_damage`
--

CREATE TABLE `ams_t_report_of_damage` (
  `ROD_ID` int(11) NOT NULL,
  `ROD_NO` varchar(15) NOT NULL,
  `ROD_REASON` varchar(350) NOT NULL,
  `ROD_DATE` date NOT NULL,
  `ROD_STATUS` varchar(25) NOT NULL DEFAULT 'Pending',
  `ROD_VIEW_BY_PO` int(11) NOT NULL DEFAULT '0',
  `ROD_VIEW_BY_USER` int(11) NOT NULL DEFAULT '0',
  `ROD_VIEW_CLICKED` int(11) NOT NULL DEFAULT '0',
  `ROD_VIEW_BY_USER_EVAL` int(11) NOT NULL DEFAULT '0',
  `ROD_REMARKS` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_report_of_damage`
--

INSERT INTO `ams_t_report_of_damage` (`ROD_ID`, `ROD_NO`, `ROD_REASON`, `ROD_DATE`, `ROD_STATUS`, `ROD_VIEW_BY_PO`, `ROD_VIEW_BY_USER`, `ROD_VIEW_CLICKED`, `ROD_VIEW_BY_USER_EVAL`, `ROD_REMARKS`) VALUES
(1, 'ROD-2018-0001', 'sira', '2018-04-26', 'Pending', 1, 0, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_report_of_damage_sub`
--

CREATE TABLE `ams_t_report_of_damage_sub` (
  `RODS_ID` int(11) NOT NULL,
  `RODS_CANCEL_DATE` date DEFAULT NULL,
  `RODS_DATE_INSPECT` date DEFAULT NULL,
  `RODS_STATUS` varchar(25) NOT NULL DEFAULT 'Pending',
  `RODS_EVALUATION` varchar(25) DEFAULT NULL,
  `RODS_SHOW` int(11) NOT NULL DEFAULT '0',
  `ROD_ID` int(11) NOT NULL,
  `A_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_report_of_damage_sub`
--

INSERT INTO `ams_t_report_of_damage_sub` (`RODS_ID`, `RODS_CANCEL_DATE`, `RODS_DATE_INSPECT`, `RODS_STATUS`, `RODS_EVALUATION`, `RODS_SHOW`, `ROD_ID`, `A_ID`) VALUES
(1, NULL, NULL, 'Pending', NULL, 0, 1, 28),
(2, NULL, NULL, 'Pending', NULL, 0, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_transfer_out_ptr`
--

CREATE TABLE `ams_t_transfer_out_ptr` (
  `PTR_ID` int(11) NOT NULL,
  `PTR_NO` varchar(15) NOT NULL,
  `PTR_DATE` date NOT NULL,
  `PTR_RECEIVED_BY` varchar(150) NOT NULL,
  `PTR_REMARKS` varchar(350) NOT NULL,
  `PTR_TRANSFERRED_BY` varchar(120) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_transfer_out_ptr`
--

INSERT INTO `ams_t_transfer_out_ptr` (`PTR_ID`, `PTR_NO`, `PTR_DATE`, `PTR_RECEIVED_BY`, `PTR_REMARKS`, `PTR_TRANSFERRED_BY`, `C_ID`) VALUES
(1, 'PTR-2018-0001', '2018-04-10', 'AASDSA', 'ASDASDAS', 'Bryan B. Cortesiano', 6),
(2, 'PTR-2018-0002', '2018-04-10', 'adsa', 'asdasd', 'Bryan B. Cortesiano', 2),
(3, 'PTR-2018-0003', '2018-04-17', 'sadsa', 'dasda', 'Bryan B. Cortesiano', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_transfer_out_ptr_sub`
--

CREATE TABLE `ams_t_transfer_out_ptr_sub` (
  `PTRS_ID` int(11) NOT NULL,
  `A_ID` int(11) NOT NULL,
  `PTR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_transfer_out_ptr_sub`
--

INSERT INTO `ams_t_transfer_out_ptr_sub` (`PTRS_ID`, `A_ID`, `PTR_ID`) VALUES
(1, 35, 1),
(2, 17, 1),
(3, 52, 1),
(4, 31, 2),
(5, 53, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_user_request`
--

CREATE TABLE `ams_t_user_request` (
  `UR_ID` int(11) NOT NULL,
  `UR_UNIT` varchar(25) NOT NULL,
  `UR_QUANTITY` int(11) NOT NULL,
  `UR_STATUS` varchar(25) NOT NULL DEFAULT 'Pending',
  `UR_APPROVED_DATE_BY_PO` date DEFAULT NULL,
  `UR_REJECT_DATE_BY_PO` date DEFAULT NULL,
  `URS_ID` int(11) NOT NULL,
  `AL_ID` int(11) NOT NULL,
  `EP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_user_request`
--

INSERT INTO `ams_t_user_request` (`UR_ID`, `UR_UNIT`, `UR_QUANTITY`, `UR_STATUS`, `UR_APPROVED_DATE_BY_PO`, `UR_REJECT_DATE_BY_PO`, `URS_ID`, `AL_ID`, `EP_ID`) VALUES
(1, 'Piece', 1, 'Approved', '2018-04-26', NULL, 1, 12, 5),
(2, 'Piece', 1, 'Approved', '2018-04-26', NULL, 2, 13, 4),
(3, 'Piece', 1, 'Approved', '2018-04-26', NULL, 3, 12, 5),
(4, 'Piece', 1, 'Approved', '2018-04-26', NULL, 4, 6, 4),
(5, 'Set', 1, 'Pending', NULL, NULL, 5, 12, 2),
(6, 'Set', 1, 'Pending', NULL, NULL, 6, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_user_request_approved_by_po`
--

CREATE TABLE `ams_t_user_request_approved_by_po` (
  `URABPO_ID` int(11) NOT NULL,
  `URABPO_STATUS` varchar(25) NOT NULL DEFAULT 'Pending',
  `URABPO_APPROVED_DATE_BY_MAIN` date DEFAULT NULL,
  `URABPO_REJECT_DATE_BY_MAIN` date DEFAULT NULL,
  `URA_QUANTITY` int(11) NOT NULL,
  `UR_ID` int(11) NOT NULL,
  `URS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_user_request_approved_by_po`
--

INSERT INTO `ams_t_user_request_approved_by_po` (`URABPO_ID`, `URABPO_STATUS`, `URABPO_APPROVED_DATE_BY_MAIN`, `URABPO_REJECT_DATE_BY_MAIN`, `URA_QUANTITY`, `UR_ID`, `URS_ID`) VALUES
(1, 'Pending', NULL, NULL, 1, 1, 1),
(2, 'Pending', NULL, NULL, 1, 2, 2),
(3, 'Pending', NULL, NULL, 1, 3, 3),
(4, 'Pending', NULL, NULL, 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_user_request_status_to_main`
--

CREATE TABLE `ams_t_user_request_status_to_main` (
  `URSTM_ID` int(11) NOT NULL,
  `URSTM_STATUS_TO_MAIN` varchar(25) NOT NULL DEFAULT 'Pending',
  `URSTM_APPROVED_DATE_BY_MAIN` date DEFAULT NULL,
  `URSTM_REJECT_DATE_BY_MAIN` date DEFAULT NULL,
  `URSTM_REMARKS` varchar(350) DEFAULT NULL,
  `URS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_user_request_status_to_main`
--

INSERT INTO `ams_t_user_request_status_to_main` (`URSTM_ID`, `URSTM_STATUS_TO_MAIN`, `URSTM_APPROVED_DATE_BY_MAIN`, `URSTM_REJECT_DATE_BY_MAIN`, `URSTM_REMARKS`, `URS_ID`) VALUES
(1, 'Pending', NULL, NULL, NULL, 1),
(2, 'Approved', '2018-04-26', NULL, 'asd', 2),
(3, 'Pending', NULL, NULL, NULL, 3),
(4, 'Pending', NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ams_t_user_request_summary`
--

CREATE TABLE `ams_t_user_request_summary` (
  `URS_ID` int(11) NOT NULL,
  `URS_NO` varchar(15) NOT NULL,
  `URS_REQUEST_DATE` date NOT NULL,
  `URS_PURPOSE` varchar(350) NOT NULL,
  `URS_STATUS_TO_PO` varchar(25) NOT NULL DEFAULT 'Pending',
  `URS_APPROVED_DATE` date DEFAULT NULL,
  `URS_REJECT_DATE` date DEFAULT NULL,
  `URS_REMARKS` varchar(350) DEFAULT NULL,
  `URS_URGENT_DATE` date NOT NULL,
  `URS_URGENT_TYPE` varchar(25) NOT NULL,
  `URS_VIEW_BY_USER` int(11) NOT NULL DEFAULT '0',
  `URS_VIEW_BY_PO` int(11) NOT NULL DEFAULT '0',
  `URS_VIEW_BY_USER_MAIN` int(11) NOT NULL DEFAULT '0',
  `URS_VIEW_CLICKED` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ams_t_user_request_summary`
--

INSERT INTO `ams_t_user_request_summary` (`URS_ID`, `URS_NO`, `URS_REQUEST_DATE`, `URS_PURPOSE`, `URS_STATUS_TO_PO`, `URS_APPROVED_DATE`, `URS_REJECT_DATE`, `URS_REMARKS`, `URS_URGENT_DATE`, `URS_URGENT_TYPE`, `URS_VIEW_BY_USER`, `URS_VIEW_BY_PO`, `URS_VIEW_BY_USER_MAIN`, `URS_VIEW_CLICKED`) VALUES
(1, 'REQ-2018-0001', '2018-04-26', 'Hehe', 'Approved', '2018-04-26', NULL, 'oks', '2018-05-11', 'Urgent (15 Days process)', 1, 1, 0, 1),
(2, 'REQ-2018-0002', '2018-04-26', 'asdasas', 'Approved', '2018-04-26', NULL, 'dasdasdas', '2018-05-06', 'Very Urgent (10 Days proc', 1, 1, 0, 0),
(3, 'REQ-2018-0003', '2018-04-26', 'op', 'Approved', '2018-04-26', NULL, '1231231', '2018-05-11', 'Urgent (15 Days process)', 1, 1, 0, 1),
(4, 'REQ-2018-0004', '2018-04-26', '1', 'Approved', '2018-04-26', NULL, '213', '2018-05-11', 'Urgent (15 Days process)', 1, 1, 0, 1),
(5, 'REQ-2018-0005', '2018-04-26', '4566456456456654', 'Pending', NULL, NULL, NULL, '2018-05-26', 'Not Urgent (30 Days proce', 0, 1, 0, 1),
(6, 'REQ-2018-0006', '2018-04-26', '3', 'Pending', NULL, NULL, NULL, '2018-05-11', 'Urgent (15 Days process)', 0, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ams_r_asset`
--
ALTER TABLE `ams_r_asset`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `URS_ID` (`URS_ID`),
  ADD KEY `PPMP_ID` (`PPMP_ID`),
  ADD KEY `AL_ID` (`AL_ID`);

--
-- Indexes for table `ams_r_asset_category`
--
ALTER TABLE `ams_r_asset_category`
  ADD PRIMARY KEY (`AC_ID`);

--
-- Indexes for table `ams_r_asset_library`
--
ALTER TABLE `ams_r_asset_library`
  ADD PRIMARY KEY (`AL_ID`),
  ADD KEY `al_ac` (`AC_ID`),
  ADD KEY `al_unt` (`UNT_ID`);

--
-- Indexes for table `ams_r_asset_unit`
--
ALTER TABLE `ams_r_asset_unit`
  ADD PRIMARY KEY (`UNT_ID`);

--
-- Indexes for table `ams_r_campus`
--
ALTER TABLE `ams_r_campus`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `ams_r_disposal_location`
--
ALTER TABLE `ams_r_disposal_location`
  ADD PRIMARY KEY (`DL_ID`);

--
-- Indexes for table `ams_r_employee_profile`
--
ALTER TABLE `ams_r_employee_profile`
  ADD PRIMARY KEY (`EP_ID`),
  ADD KEY `O_ID` (`O_ID`);

--
-- Indexes for table `ams_r_office`
--
ALTER TABLE `ams_r_office`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `ams_r_ppmp_period`
--
ALTER TABLE `ams_r_ppmp_period`
  ADD PRIMARY KEY (`PPMPP_ID`);

--
-- Indexes for table `ams_r_user`
--
ALTER TABLE `ams_r_user`
  ADD UNIQUE KEY `U_USERNAME` (`U_USERNAME`),
  ADD KEY `EP_ID` (`EP_ID`);

--
-- Indexes for table `ams_r_users_log`
--
ALTER TABLE `ams_r_users_log`
  ADD UNIQUE KEY `UL_LOGGED_DATE` (`UL_LOGGED_DATE`);

--
-- Indexes for table `ams_t_dispose`
--
ALTER TABLE `ams_t_dispose`
  ADD PRIMARY KEY (`D_ID`),
  ADD KEY `DL_ID` (`DL_ID`),
  ADD KEY `A_ID` (`A_ID`),
  ADD KEY `PARS_ID` (`PARS_ID`);

--
-- Indexes for table `ams_t_job_order`
--
ALTER TABLE `ams_t_job_order`
  ADD PRIMARY KEY (`JO_ID`);

--
-- Indexes for table `ams_t_job_order_sub`
--
ALTER TABLE `ams_t_job_order_sub`
  ADD PRIMARY KEY (`JOS_ID`),
  ADD KEY `JO_ID` (`JO_ID`),
  ADD KEY `A_ID` (`A_ID`);

--
-- Indexes for table `ams_t_par`
--
ALTER TABLE `ams_t_par`
  ADD PRIMARY KEY (`PAR_ID`),
  ADD UNIQUE KEY `PAR_NO` (`PAR_NO`);

--
-- Indexes for table `ams_t_par_sub`
--
ALTER TABLE `ams_t_par_sub`
  ADD PRIMARY KEY (`PARS_ID`),
  ADD KEY `A_ID` (`A_ID`),
  ADD KEY `PAR_ID` (`PAR_ID`),
  ADD KEY `EP_ID` (`EP_ID`);

--
-- Indexes for table `ams_t_ppmp`
--
ALTER TABLE `ams_t_ppmp`
  ADD PRIMARY KEY (`PPMP_ID`),
  ADD UNIQUE KEY `PPMP_NO` (`PPMP_NO`),
  ADD KEY `EP_ID` (`EP_ID`),
  ADD KEY `PPMPP_ID` (`PPMPP_ID`);

--
-- Indexes for table `ams_t_ppmp_sub`
--
ALTER TABLE `ams_t_ppmp_sub`
  ADD PRIMARY KEY (`PPMPS_ID`),
  ADD KEY `AL_ID` (`AL_ID`),
  ADD KEY `PPMPP_ID` (`PPMPP_ID`),
  ADD KEY `PPMP_ID` (`PPMP_ID`),
  ADD KEY `EP_ID` (`EP_ID`);

--
-- Indexes for table `ams_t_release_of_asset`
--
ALTER TABLE `ams_t_release_of_asset`
  ADD PRIMARY KEY (`ROA_ID`);

--
-- Indexes for table `ams_t_release_of_asset_sub`
--
ALTER TABLE `ams_t_release_of_asset_sub`
  ADD PRIMARY KEY (`ROAS_ID`),
  ADD KEY `A_ID` (`A_ID`),
  ADD KEY `ROA_ID` (`ROA_ID`);

--
-- Indexes for table `ams_t_report_of_damage`
--
ALTER TABLE `ams_t_report_of_damage`
  ADD PRIMARY KEY (`ROD_ID`),
  ADD UNIQUE KEY `ROD_NO` (`ROD_NO`);

--
-- Indexes for table `ams_t_report_of_damage_sub`
--
ALTER TABLE `ams_t_report_of_damage_sub`
  ADD PRIMARY KEY (`RODS_ID`),
  ADD KEY `ROD_ID` (`ROD_ID`),
  ADD KEY `A_ID` (`A_ID`);

--
-- Indexes for table `ams_t_transfer_out_ptr`
--
ALTER TABLE `ams_t_transfer_out_ptr`
  ADD PRIMARY KEY (`PTR_ID`),
  ADD UNIQUE KEY `PTR_NO` (`PTR_NO`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `ams_t_transfer_out_ptr_sub`
--
ALTER TABLE `ams_t_transfer_out_ptr_sub`
  ADD PRIMARY KEY (`PTRS_ID`),
  ADD KEY `A_ID` (`A_ID`),
  ADD KEY `PTR_ID` (`PTR_ID`);

--
-- Indexes for table `ams_t_user_request`
--
ALTER TABLE `ams_t_user_request`
  ADD PRIMARY KEY (`UR_ID`),
  ADD KEY `AL_ID` (`AL_ID`),
  ADD KEY `URS_ID` (`URS_ID`),
  ADD KEY `EP_ID` (`EP_ID`);

--
-- Indexes for table `ams_t_user_request_approved_by_po`
--
ALTER TABLE `ams_t_user_request_approved_by_po`
  ADD PRIMARY KEY (`URABPO_ID`),
  ADD KEY `UR_ID` (`UR_ID`),
  ADD KEY `URS_ID` (`URS_ID`);

--
-- Indexes for table `ams_t_user_request_status_to_main`
--
ALTER TABLE `ams_t_user_request_status_to_main`
  ADD PRIMARY KEY (`URSTM_ID`),
  ADD KEY `URS_ID` (`URS_ID`);

--
-- Indexes for table `ams_t_user_request_summary`
--
ALTER TABLE `ams_t_user_request_summary`
  ADD PRIMARY KEY (`URS_ID`),
  ADD UNIQUE KEY `URS_NO` (`URS_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ams_r_asset`
--
ALTER TABLE `ams_r_asset`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `ams_r_asset_category`
--
ALTER TABLE `ams_r_asset_category`
  MODIFY `AC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ams_r_asset_library`
--
ALTER TABLE `ams_r_asset_library`
  MODIFY `AL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ams_r_asset_unit`
--
ALTER TABLE `ams_r_asset_unit`
  MODIFY `UNT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ams_r_campus`
--
ALTER TABLE `ams_r_campus`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ams_r_disposal_location`
--
ALTER TABLE `ams_r_disposal_location`
  MODIFY `DL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ams_r_employee_profile`
--
ALTER TABLE `ams_r_employee_profile`
  MODIFY `EP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ams_r_office`
--
ALTER TABLE `ams_r_office`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ams_r_ppmp_period`
--
ALTER TABLE `ams_r_ppmp_period`
  MODIFY `PPMPP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ams_t_dispose`
--
ALTER TABLE `ams_t_dispose`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ams_t_job_order`
--
ALTER TABLE `ams_t_job_order`
  MODIFY `JO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ams_t_job_order_sub`
--
ALTER TABLE `ams_t_job_order_sub`
  MODIFY `JOS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ams_t_par`
--
ALTER TABLE `ams_t_par`
  MODIFY `PAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ams_t_par_sub`
--
ALTER TABLE `ams_t_par_sub`
  MODIFY `PARS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ams_t_ppmp`
--
ALTER TABLE `ams_t_ppmp`
  MODIFY `PPMP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ams_t_ppmp_sub`
--
ALTER TABLE `ams_t_ppmp_sub`
  MODIFY `PPMPS_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ams_t_release_of_asset`
--
ALTER TABLE `ams_t_release_of_asset`
  MODIFY `ROA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ams_t_release_of_asset_sub`
--
ALTER TABLE `ams_t_release_of_asset_sub`
  MODIFY `ROAS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ams_t_report_of_damage`
--
ALTER TABLE `ams_t_report_of_damage`
  MODIFY `ROD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ams_t_report_of_damage_sub`
--
ALTER TABLE `ams_t_report_of_damage_sub`
  MODIFY `RODS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ams_t_transfer_out_ptr`
--
ALTER TABLE `ams_t_transfer_out_ptr`
  MODIFY `PTR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ams_t_transfer_out_ptr_sub`
--
ALTER TABLE `ams_t_transfer_out_ptr_sub`
  MODIFY `PTRS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ams_t_user_request`
--
ALTER TABLE `ams_t_user_request`
  MODIFY `UR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ams_t_user_request_approved_by_po`
--
ALTER TABLE `ams_t_user_request_approved_by_po`
  MODIFY `URABPO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ams_t_user_request_status_to_main`
--
ALTER TABLE `ams_t_user_request_status_to_main`
  MODIFY `URSTM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ams_t_user_request_summary`
--
ALTER TABLE `ams_t_user_request_summary`
  MODIFY `URS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ams_r_asset`
--
ALTER TABLE `ams_r_asset`
  ADD CONSTRAINT `ams_r_asset_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `ams_r_campus` (`C_ID`),
  ADD CONSTRAINT `ams_r_asset_ibfk_2` FOREIGN KEY (`URS_ID`) REFERENCES `ams_t_user_request_summary` (`URS_ID`),
  ADD CONSTRAINT `ams_r_asset_ibfk_3` FOREIGN KEY (`PPMP_ID`) REFERENCES `ams_t_ppmp` (`PPMP_ID`),
  ADD CONSTRAINT `ams_r_asset_ibfk_4` FOREIGN KEY (`AL_ID`) REFERENCES `ams_r_asset_library` (`AL_ID`);

--
-- Constraints for table `ams_r_asset_library`
--
ALTER TABLE `ams_r_asset_library`
  ADD CONSTRAINT `al_ac` FOREIGN KEY (`AC_ID`) REFERENCES `ams_r_asset_category` (`AC_ID`),
  ADD CONSTRAINT `al_unt` FOREIGN KEY (`UNT_ID`) REFERENCES `ams_r_asset_unit` (`UNT_ID`);

--
-- Constraints for table `ams_r_employee_profile`
--
ALTER TABLE `ams_r_employee_profile`
  ADD CONSTRAINT `ams_r_employee_profile_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `ams_r_office` (`O_ID`);

--
-- Constraints for table `ams_r_office`
--
ALTER TABLE `ams_r_office`
  ADD CONSTRAINT `ams_r_office_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `ams_r_campus` (`C_ID`);

--
-- Constraints for table `ams_r_user`
--
ALTER TABLE `ams_r_user`
  ADD CONSTRAINT `ams_r_user_ibfk_1` FOREIGN KEY (`EP_ID`) REFERENCES `ams_r_employee_profile` (`EP_ID`);

--
-- Constraints for table `ams_t_dispose`
--
ALTER TABLE `ams_t_dispose`
  ADD CONSTRAINT `ams_t_dispose_ibfk_1` FOREIGN KEY (`DL_ID`) REFERENCES `ams_r_disposal_location` (`DL_ID`),
  ADD CONSTRAINT `ams_t_dispose_ibfk_2` FOREIGN KEY (`A_ID`) REFERENCES `ams_r_asset` (`A_ID`),
  ADD CONSTRAINT `ams_t_dispose_ibfk_3` FOREIGN KEY (`PARS_ID`) REFERENCES `ams_t_par_sub` (`PARS_ID`);

--
-- Constraints for table `ams_t_job_order_sub`
--
ALTER TABLE `ams_t_job_order_sub`
  ADD CONSTRAINT `ams_t_job_order_sub_ibfk_1` FOREIGN KEY (`JO_ID`) REFERENCES `ams_t_job_order` (`JO_ID`),
  ADD CONSTRAINT `ams_t_job_order_sub_ibfk_2` FOREIGN KEY (`A_ID`) REFERENCES `ams_r_asset` (`A_ID`);

--
-- Constraints for table `ams_t_par_sub`
--
ALTER TABLE `ams_t_par_sub`
  ADD CONSTRAINT `ams_t_par_sub_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `ams_r_asset` (`A_ID`),
  ADD CONSTRAINT `ams_t_par_sub_ibfk_2` FOREIGN KEY (`PAR_ID`) REFERENCES `ams_t_par` (`PAR_ID`),
  ADD CONSTRAINT `ams_t_par_sub_ibfk_3` FOREIGN KEY (`EP_ID`) REFERENCES `ams_r_employee_profile` (`EP_ID`);

--
-- Constraints for table `ams_t_ppmp`
--
ALTER TABLE `ams_t_ppmp`
  ADD CONSTRAINT `ams_t_ppmp_ibfk_1` FOREIGN KEY (`EP_ID`) REFERENCES `ams_r_employee_profile` (`EP_ID`),
  ADD CONSTRAINT `ams_t_ppmp_ibfk_2` FOREIGN KEY (`PPMPP_ID`) REFERENCES `ams_r_ppmp_period` (`PPMPP_ID`);

--
-- Constraints for table `ams_t_ppmp_sub`
--
ALTER TABLE `ams_t_ppmp_sub`
  ADD CONSTRAINT `ams_t_ppmp_sub_ibfk_1` FOREIGN KEY (`AL_ID`) REFERENCES `ams_r_asset_library` (`AL_ID`),
  ADD CONSTRAINT `ams_t_ppmp_sub_ibfk_2` FOREIGN KEY (`PPMPP_ID`) REFERENCES `ams_r_ppmp_period` (`PPMPP_ID`),
  ADD CONSTRAINT `ams_t_ppmp_sub_ibfk_3` FOREIGN KEY (`PPMP_ID`) REFERENCES `ams_t_ppmp` (`PPMP_ID`),
  ADD CONSTRAINT `ams_t_ppmp_sub_ibfk_4` FOREIGN KEY (`EP_ID`) REFERENCES `ams_r_employee_profile` (`EP_ID`);

--
-- Constraints for table `ams_t_release_of_asset_sub`
--
ALTER TABLE `ams_t_release_of_asset_sub`
  ADD CONSTRAINT `ams_t_release_of_asset_sub_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `ams_r_asset` (`A_ID`),
  ADD CONSTRAINT `ams_t_release_of_asset_sub_ibfk_2` FOREIGN KEY (`ROA_ID`) REFERENCES `ams_t_release_of_asset` (`ROA_ID`);

--
-- Constraints for table `ams_t_report_of_damage_sub`
--
ALTER TABLE `ams_t_report_of_damage_sub`
  ADD CONSTRAINT `ams_t_report_of_damage_sub_ibfk_1` FOREIGN KEY (`ROD_ID`) REFERENCES `ams_t_report_of_damage` (`ROD_ID`),
  ADD CONSTRAINT `ams_t_report_of_damage_sub_ibfk_2` FOREIGN KEY (`A_ID`) REFERENCES `ams_r_asset` (`A_ID`);

--
-- Constraints for table `ams_t_transfer_out_ptr`
--
ALTER TABLE `ams_t_transfer_out_ptr`
  ADD CONSTRAINT `ams_t_transfer_out_ptr_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `ams_r_campus` (`C_ID`);

--
-- Constraints for table `ams_t_transfer_out_ptr_sub`
--
ALTER TABLE `ams_t_transfer_out_ptr_sub`
  ADD CONSTRAINT `ams_t_transfer_out_ptr_sub_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `ams_r_asset` (`A_ID`),
  ADD CONSTRAINT `ams_t_transfer_out_ptr_sub_ibfk_2` FOREIGN KEY (`PTR_ID`) REFERENCES `ams_t_transfer_out_ptr` (`PTR_ID`);

--
-- Constraints for table `ams_t_user_request`
--
ALTER TABLE `ams_t_user_request`
  ADD CONSTRAINT `ams_t_user_request_ibfk_1` FOREIGN KEY (`AL_ID`) REFERENCES `ams_r_asset_library` (`AL_ID`),
  ADD CONSTRAINT `ams_t_user_request_ibfk_2` FOREIGN KEY (`URS_ID`) REFERENCES `ams_t_user_request_summary` (`URS_ID`),
  ADD CONSTRAINT `ams_t_user_request_ibfk_3` FOREIGN KEY (`EP_ID`) REFERENCES `ams_r_employee_profile` (`EP_ID`);

--
-- Constraints for table `ams_t_user_request_approved_by_po`
--
ALTER TABLE `ams_t_user_request_approved_by_po`
  ADD CONSTRAINT `ams_t_user_request_approved_by_po_ibfk_1` FOREIGN KEY (`UR_ID`) REFERENCES `ams_t_user_request` (`UR_ID`),
  ADD CONSTRAINT `ams_t_user_request_approved_by_po_ibfk_2` FOREIGN KEY (`URS_ID`) REFERENCES `ams_t_user_request_summary` (`URS_ID`);

--
-- Constraints for table `ams_t_user_request_status_to_main`
--
ALTER TABLE `ams_t_user_request_status_to_main`
  ADD CONSTRAINT `ams_t_user_request_status_to_main_ibfk_1` FOREIGN KEY (`URS_ID`) REFERENCES `ams_t_user_request_summary` (`URS_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
