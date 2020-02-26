-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 08:57 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `malarschooldata`
--

-- --------------------------------------------------------

--
-- Table structure for table `mess_supervisor`
--

CREATE TABLE IF NOT EXISTS `mess_supervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(200) NOT NULL,
  `catagory` varchar(200) NOT NULL,
  `subcatagory` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `debit_amount` int(11) NOT NULL,
  `trans` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `school` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `mess_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
