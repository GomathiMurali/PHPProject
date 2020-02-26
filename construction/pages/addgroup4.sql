-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 10:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bss_poultry_ppf`
--

-- --------------------------------------------------------

--
-- Table structure for table `addgroup4`
--

CREATE TABLE `addgroup4` (
  `id` int(12) NOT NULL,
  `sno` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `monor` varchar(400) DEFAULT NULL,
  `binder` varchar(400) DEFAULT NULL,
  `plumber` varchar(400) DEFAULT NULL,
  `painter` varchar(400) DEFAULT NULL,
  `others` varchar(400) DEFAULT NULL,
  `remarks` varchar(400) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addgroup4`
--

INSERT INTO `addgroup4` (`id`, `sno`, `date`, `monor`, `binder`, `plumber`, `painter`, `others`, `remarks`) VALUES
(45, '3', '2020-01-17', '1000', '2000', '3000', '2000', '1000', 'sqd'),
(44, '2', '2020-01-08', '1000', '2000', '3000', '1000', '1000', 'qwerwer'),
(38, '11', '2020-01-08', 'qwd', 'zxfc', 'dsf', 'sxdf', 'ggggg', 'Final amount'),
(40, '11', '2020-01-07', 'rfre', 'eee', 'gg', 'gfg', 'ggggg', 'gg'),
(42, '1', '2020-01-08', '1000', '5000', '2000', '2000', '1000', 'cxvxc'),
(43, '2', '2020-01-08', '2000', '3000', '3000', '2000', '2000', 'wefr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addgroup4`
--
ALTER TABLE `addgroup4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addgroup4`
--
ALTER TABLE `addgroup4`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
