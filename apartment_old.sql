-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 11:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_fullname` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_fullname`, `admin_password`, `status`) VALUES
(1, 'admin', 'Admin', 'admin123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_checkin` date NOT NULL,
  `cus_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booking_img` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'รออนุมัติ',
  `booking_price` int(11) DEFAULT 1500
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`booking_id`, `booking_date`, `booking_checkin`, `cus_id`, `room_id`, `booking_img`, `status`, `booking_price`) VALUES
(1, '2022-02-19', '2022-02-25', 2, 4, 'paybook1 .png', 'อนุมัติ', 1500),
(3, '2022-02-19', '2022-02-18', 3, 2, 'paybook3 .png', 'อนุมัติ', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_fullname` varchar(2555) NOT NULL,
  `cus_tell` varchar(10) NOT NULL,
  `cus_birthday` date NOT NULL,
  `cus_no` varchar(13) NOT NULL,
  `cus_username` varchar(255) NOT NULL,
  `cus_password` varchar(255) NOT NULL,
  `cus_address` varchar(1000) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`cus_id`, `cus_fullname`, `cus_tell`, `cus_birthday`, `cus_no`, `cus_username`, `cus_password`, `cus_address`, `nationality`, `religion`) VALUES
(1, 'user1', '123456789', '2022-02-11', '1234512123136', 'user1', 'user1', 'qwert', 'q', 'q'),
(2, 'user2', '123123', '2022-02-08', '1235466678704', 'user2', 'user2', 'q', 'q', 'q'),
(3, 'adawdwa', '123555', '2022-02-11', '1748156846453', 'user11', 'user11', 'asdfg', 'q', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_fullname` varchar(255) NOT NULL,
  `employee_birthday` date NOT NULL,
  `employee_no` varchar(11) NOT NULL,
  `employee_position` varchar(255) NOT NULL,
  `employee_regian` varchar(255) NOT NULL,
  `employee_national` varchar(255) NOT NULL,
  `employee_tell` varchar(10) NOT NULL,
  `employee_stardate` date NOT NULL,
  `employee_address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`employee_id`, `employee_fullname`, `employee_birthday`, `employee_no`, `employee_position`, `employee_regian`, `employee_national`, `employee_tell`, `employee_stardate`, `employee_address`) VALUES
(1, 'wddw', '2022-02-14', 'dwdwdw', 'แม่บ้าน', 'ดด', 'ดดด', 'ด', '2022-02-17', 'ๅ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `invoice_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_curwaterbill` int(11) NOT NULL,
  `invoice_curelectricitybill` int(11) NOT NULL,
  `invoice_electricitybill` int(11) NOT NULL,
  `invoice_waterbill` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'ค้างชำระ',
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`invoice_id`, `room_id`, `invoice_date`, `invoice_curwaterbill`, `invoice_curelectricitybill`, `invoice_electricitybill`, `invoice_waterbill`, `cus_id`, `expenses`, `status`, `img`) VALUES
(1, 4, '2022-02-19', 21, 100, 1000, 210, 2, 5710, 'ชำระเรียบร้อย', 'invoice1 .png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notific_change`
--

CREATE TABLE `tb_notific_change` (
  `notific_change_id` int(11) NOT NULL,
  `notific_change_date` date NOT NULL,
  `room_id` int(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'รอดำเนินการ',
  `room_change_floor` varchar(10) NOT NULL,
  `room_change_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notific_chkout`
--

CREATE TABLE `tb_notific_chkout` (
  `notific_chkout_id` int(11) NOT NULL,
  `notific_chkout_date` int(11) NOT NULL,
  `notific_chkout_outdate` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'รอดำเนินการ',
  `room_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notific_fix`
--

CREATE TABLE `tb_notific_fix` (
  `notific_fix_id` int(11) NOT NULL,
  `notific_fix_date` date NOT NULL,
  `cus_id` int(11) NOT NULL,
  `notific_fix_detail` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'รอดำเนินการ',
  `room_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `room_id` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_floor` varchar(255) NOT NULL,
  `room_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`room_id`, `room_number`, `room_floor`, `room_status`) VALUES
(1, '101', '1', 'ห้องว่าง'),
(2, '102', '1', 'ห้องไม่ว่าง'),
(3, '103', '1', 'ห้องว่าง'),
(4, '104', '1', 'ห้องไม่ว่าง'),
(5, '105', '1', 'ห้องว่าง'),
(6, '201', '2', 'ห้องว่าง'),
(7, '202', '2', 'ห้องว่าง'),
(8, '203', '2', 'ห้องว่าง'),
(9, '204', '2', 'ห้องว่าง'),
(10, '205', '2', 'ห้องว่าง'),
(11, '301', '3', 'ห้องว่าง'),
(12, '302', '3', 'ห้องว่าง'),
(13, '303', '3', 'ห้องว่าง'),
(14, '304', '3', 'ห้องว่าง'),
(15, '305', '3', 'ห้องว่าง'),
(16, '401', '4', 'ห้องว่าง'),
(17, '402', '4', 'ห้องว่าง'),
(18, '403', '4', 'ห้องว่าง'),
(19, '404', '4', 'ห้องว่าง'),
(20, '405', '4', 'ห้องชำรุด'),
(21, '501', '5', 'ห้องว่าง'),
(22, '502', '5', 'ห้องชำรุด'),
(23, '503', '5', 'ห้องว่าง'),
(24, '504', '5', 'ห้องชำรุด'),
(25, '505', '5', 'ห้องว่าง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tb_notific_change`
--
ALTER TABLE `tb_notific_change`
  ADD PRIMARY KEY (`notific_change_id`);

--
-- Indexes for table `tb_notific_chkout`
--
ALTER TABLE `tb_notific_chkout`
  ADD PRIMARY KEY (`notific_chkout_id`);

--
-- Indexes for table `tb_notific_fix`
--
ALTER TABLE `tb_notific_fix`
  ADD PRIMARY KEY (`notific_fix_id`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_notific_change`
--
ALTER TABLE `tb_notific_change`
  MODIFY `notific_change_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_notific_chkout`
--
ALTER TABLE `tb_notific_chkout`
  MODIFY `notific_chkout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_notific_fix`
--
ALTER TABLE `tb_notific_fix`
  MODIFY `notific_fix_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
