-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 08:58 AM
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
-- Table structure for table `messsubcatagory`
--

CREATE TABLE IF NOT EXISTS `messsubcatagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mess_subcatagory` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `messsubcatagory`
--

INSERT INTO `messsubcatagory` (`id`, `mess_subcatagory`) VALUES
(1, 'Amman Agencies'),
(2, 'Renugadevi Agency'),
(3, 'Sri Navaladi Maligai'),
(4, 'V S K Systemss'),
(5, 'Sri Ramana Printers'),
(6, 'Mess Ananthan Gas Agency'),
(7, 'Mess Banana Sumathi'),
(8, 'Mess Coconut V R S '),
(9, 'Mess Dhanalakshmi Bakery'),
(10, 'Mess Jayam Appalam'),
(11, 'Mess K G Agency'),
(12, 'Mess Malar Idiappam'),
(13, 'Mess Mani Vegetable Shop'),
(14, 'Mess Milkman Ravi'),
(15, 'Mess Sri Navaladi Maligai'),
(16, 'Mess Sri Amman Broilers'),
(17, 'Salem Handloom Stores ( Babu)'),
(18, 'Scawengers Salary Deposit'),
(19, 'TATA  AIG Insurance - L.Sowmiya IX'),
(20, 'TATA AIG Insurance - P.Rithika XI'),
(21, 'Golden Scientific Suppliers'),
(22, 'Mercury Scientific Company'),
(23, 'R T E Act Amount'),
(24, 'The Brothers Educational Union'),
(25, 'Veno Agencies'),
(26, 'Stores Navaladi Maligai');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
