-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 05:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `BKS` varchar(100) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Seats` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `SDT` varchar(100) NOT NULL,
  `unit` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `Model`, `BKS`, `Color`, `Seats`, `Name`, `SDT`, `unit`) VALUES
(1, 'Volvo', '84AH-482.424', 'Gray', 7, 'Ngô Thanh Phú', '0339684945', 3000000),
(2, 'Toyota', '44AV-124.899', 'Black', 4, 'Trần Văn Anh', '0115249652', 720000),
(3, 'Toyota', '12VB-334.453', 'Red', 7, 'Nguyễn Thị Cà Chua', '0225489561', 750000),
(4, 'Peugoet', '12AG-544.569', 'Red', 5, 'Trần Thị Táo', '011254796', 1000000),
(5, 'Audi', '55BU-125.598', 'Purpil', 4, 'Trần Thị Hồng Thắm', '0258974563', 990000),
(6, 'Mercedes Benz', '56OI-456.598', 'Gray', 7, 'Tôn Tằng Tôn Nữ Hà Thị Lệ Giang', '0365478523', 880000),
(7, 'Land Rover', '12TD-145.553', 'Blue', 5, 'Trần Tình Lệnh', '0256985632', 1100000),
(8, 'Volvo', '38VV-785.453', 'Blue', 4, 'Bạch Cổn Cổn', '0145859625', 1400000),
(9, 'Toyota', '15BU-455.567', 'Gray', 5, 'Bạch Phượng Cửu', '0145896325', 790000),
(10, 'Chevrolet', '78BU-456.567', 'Black', 5, 'Bạch Thiển Thiển', '0548936523', 1000000),
(11, 'Ford', '56BU-145.512', 'Orange', 7, 'Dạ Hoa Quân', '0125896532', 1500000),
(12, 'Hyundai', '56FG-445.724', 'Black', 5, 'Đông Hoa Quân', '0223569876', 2000000),
(13, 'Mitsubishi', '36EY-559.215', 'Blue', 4, 'Tôn Ngộ Tĩnh', '0125896352', 495000),
(14, 'Mazda', '34TY-345.223', 'Gray', 5, 'Nguyễn Văn Mít', '0289635142', 880000),
(15, 'Nissan', '14OY-158.567', 'Red', 5, 'Mai Văn Xoài', '0589632542', 350000),
(16, 'Nissan', '15OL-123.456', 'Blue', 4, 'Hà Văn Chuối', '0259863254', 450000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
