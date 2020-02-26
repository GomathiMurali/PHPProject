-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 11:17 AM
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
-- Table structure for table `addbank`
--

CREATE TABLE `addbank` (
  `id` int(50) NOT NULL,
  `bankname` varchar(250) DEFAULT NULL,
  `accno` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `ifsc` varchar(250) DEFAULT NULL,
  `holder` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addgroup`
--

CREATE TABLE `addgroup` (
  `id` int(50) NOT NULL,
  `group_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addgroup`
--

INSERT INTO `addgroup` (`id`, `group_name`) VALUES
(3, 'sathish');

-- --------------------------------------------------------

--
-- Table structure for table `addgroup1`
--

CREATE TABLE `addgroup1` (
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
-- Dumping data for table `addgroup1`
--

INSERT INTO `addgroup1` (`id`, `sno`, `date`, `monor`, `binder`, `plumber`, `painter`, `others`, `remarks`) VALUES
(65, '1', '0000-00-00', 'aqd', 'sqd', 'sad', 'sqd', 'ggggg', 'Final amount'),
(67, '4', '0000-00-00', 'aqd', '2000', 'qsd', 'sxdf', 'wqd', 'sda');

-- --------------------------------------------------------

--
-- Table structure for table `addgroup2`
--

CREATE TABLE `addgroup2` (
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
-- Dumping data for table `addgroup2`
--

INSERT INTO `addgroup2` (`id`, `sno`, `date`, `monor`, `binder`, `plumber`, `painter`, `others`, `remarks`) VALUES
(43, '1', '2020-01-08', '2000', '3000', '3000', '2000', '2000', 'wefr'),
(51, '29', '0000-00-00', '1000', '2000', 'sqd', 'qwde', 'sd', 'fwd');

-- --------------------------------------------------------

--
-- Table structure for table `addgroup3`
--

CREATE TABLE `addgroup3` (
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
-- Dumping data for table `addgroup3`
--

INSERT INTO `addgroup3` (`id`, `sno`, `date`, `monor`, `binder`, `plumber`, `painter`, `others`, `remarks`) VALUES
(53, '3', '2020-10-02', '1000', 'sqd', 'bvcbv', 'sqd', 'ggggg', 'Final amount11'),
(55, '37', '2020-01-09', 'aqd', 'sqd', 'qsd', 'sqd', 'sd', 'fwd');

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
(49, '1', '0000-00-00', '1000', '2000', '3000', '1000', '1000', 'fwd'),
(48, '11', '0000-00-00', '1000', '2000', 'sad', 'sqd', 'wqd', 'Final amount'),
(46, '22', '2020-01-09', '1000', '2000', '3000', '2000', '1000', 'fwd');

-- --------------------------------------------------------

--
-- Table structure for table `addunit`
--

CREATE TABLE `addunit` (
  `id` int(50) NOT NULL,
  `uom` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addunit`
--

INSERT INTO `addunit` (`id`, `uom`) VALUES
(1, '<br /><font size=\'1\'><table class=\'xdebug-error\' dir=\'ltr\' border=\'1\' cellspacing=\'0\' cellpadding=\'1\'><tr><th align=\'left\' bgcolor=\'#f57900\' colspan=');

-- --------------------------------------------------------

--
-- Table structure for table `addunit_new`
--

CREATE TABLE `addunit_new` (
  `id` int(50) NOT NULL,
  `sno` varchar(250) DEFAULT NULL,
  `invoice` varchar(250) DEFAULT NULL,
  `master_type` varchar(250) DEFAULT NULL,
  `quantity` varchar(250) DEFAULT NULL,
  `rate` varchar(250) DEFAULT NULL,
  `medicine` varchar(250) DEFAULT NULL,
  `radi_rate` varchar(250) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `grand_total` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(50) NOT NULL,
  `sno` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `batch` varchar(250) DEFAULT NULL,
  `Total_birds` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `sno`, `date`, `batch`, `Total_birds`) VALUES
(1, '12', '12', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` int(10) NOT NULL,
  `cashier_name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_id` int(11) NOT NULL,
  `catagory_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagory3`
--

CREATE TABLE `catagory3` (
  `cat_id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagory_new`
--

CREATE TABLE `catagory_new` (
  `id` int(50) NOT NULL,
  `sno` varchar(250) DEFAULT NULL,
  `colName` int(10) DEFAULT NULL,
  `bill_num` varchar(250) DEFAULT NULL,
  `egg_type` varchar(250) DEFAULT NULL,
  `total_tray` varchar(250) DEFAULT NULL,
  `total_egg` varchar(250) DEFAULT NULL,
  `egg_rate` varchar(250) DEFAULT NULL,
  `avg_rate` varchar(250) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `grand_total` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory_new`
--

INSERT INTO `catagory_new` (`id`, `sno`, `colName`, `bill_num`, `egg_type`, `total_tray`, `total_egg`, `egg_rate`, `avg_rate`, `total`, `grand_total`) VALUES
(1, '1', NULL, '12234', '1222', '222', '222', '222', '333', '444', '1234'),
(2, 'as', NULL, 'sa', 'sas', 'sas', 'dsd', 'ffg', 'h', 'gjh', 'kj');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `membership_number` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `groupname` varchar(250) DEFAULT NULL,
  `gstno` varchar(250) DEFAULT NULL,
  `bank` varchar(550) DEFAULT NULL,
  `gsttype` varchar(250) DEFAULT NULL,
  `panno` varchar(250) DEFAULT NULL,
  `cname` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `emailcc` varchar(250) DEFAULT NULL,
  `accno` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `ifsc` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daybook`
--

CREATE TABLE `daybook` (
  `id` int(50) NOT NULL,
  `date` varchar(250) NOT NULL,
  `texpense` varchar(250) NOT NULL,
  `tincome` varchar(250) NOT NULL,
  `balancehand` varchar(250) NOT NULL,
  `balancebank` varchar(250) NOT NULL,
  `thand` varchar(250) NOT NULL,
  `tbank` varchar(250) NOT NULL,
  `totalamount` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `default_statement`
--

CREATE TABLE `default_statement` (
  `id` int(12) NOT NULL,
  `week` varchar(250) DEFAULT NULL,
  `days` varchar(250) DEFAULT NULL,
  `oneday` varchar(250) DEFAULT NULL,
  `total_feeds` varchar(250) DEFAULT NULL,
  `chicken_weight` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_statement`
--

INSERT INTO `default_statement` (`id`, `week`, `days`, `oneday`, `total_feeds`, `chicken_weight`) VALUES
(1, '1', '0-7', '11', '77', '65'),
(2, '2', '14-Aug', '16', '189', '110'),
(3, '3', '15-21', '18', '315', '165'),
(4, '4', '22-28', '25', '490', '230'),
(5, '5', '29-35', '35', '735', '310'),
(6, '6', '36-42', '40', '1015', '400'),
(7, '7', '43-49', '44', '1323', '490'),
(8, '8', '50-63', '48', '1659', '580'),
(9, '9', '57-63', '49', '2002', '670'),
(10, '10', '64-70', '50', '2352', '750'),
(11, '11', '71-77', '51', '2709', '830'),
(12, '12', '78-84', '54', '3089', '910'),
(13, '13', '85-91', '56', '3479', '980'),
(14, '14', '92-98', '58', '3885', '1040'),
(15, '15', '99-105', '60', '4305', '1090'),
(16, '16', '106-112', '62', '4739', '1140'),
(17, '17', '113-119', '63', '5180', '1180'),
(18, '18', '120-126', '66', '5642', '1220'),
(19, '19', '127-133', '80', '6202', '1280'),
(20, '20', '134-140', '85', '6797', '1330');

-- --------------------------------------------------------

--
-- Table structure for table `eggtype`
--

CREATE TABLE `eggtype` (
  `id` int(50) NOT NULL,
  `egg_type` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eggtype`
--

INSERT INTO `eggtype` (`id`, `egg_type`, `date`) VALUES
(1, 'Small', '12');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `ex_id` int(50) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `catagory_name` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `subcatagory` varchar(250) NOT NULL,
  `trans` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL,
  `pending_id` int(11) NOT NULL,
  `credit_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expensepending`
--

CREATE TABLE `expensepending` (
  `id` int(50) NOT NULL,
  `pending_id` int(11) NOT NULL,
  `catagory_name` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `subcatagory` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `trans` varchar(200) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `school` varchar(200) NOT NULL,
  `paidamount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expensepending_balance`
--

CREATE TABLE `expensepending_balance` (
  `id` int(11) NOT NULL,
  `pending_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense_file`
--

CREATE TABLE `expense_file` (
  `id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `bill` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fbook`
--

CREATE TABLE `fbook` (
  `id` int(250) NOT NULL,
  `gst` varchar(250) NOT NULL,
  `fromadd` varchar(250) NOT NULL,
  `toadd` varchar(250) NOT NULL,
  `sdate` varchar(250) NOT NULL,
  `material` varchar(250) NOT NULL,
  `loadtype` varchar(250) NOT NULL,
  `weight` varchar(250) NOT NULL,
  `length` varchar(250) NOT NULL,
  `width` varchar(250) NOT NULL,
  `depth` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `in_id` int(50) NOT NULL,
  `income_id` int(250) NOT NULL,
  `catagory_name` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `subcatagory` varchar(250) NOT NULL,
  `trans` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incomesubcatagory`
--

CREATE TABLE `incomesubcatagory` (
  `id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lose`
--

CREATE TABLE `lose` (
  `p_id` int(10) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `description_name` varchar(30) NOT NULL,
  `amount_lose` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `exdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masstype`
--

CREATE TABLE `masstype` (
  `id` int(50) NOT NULL,
  `mass_type` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masstype`
--

INSERT INTO `masstype` (`id`, `mass_type`, `date`) VALUES
(1, 'chickne', '12'),
(2, 'chickne', '12'),
(3, 'chickne', 'd'),
(7, 'chickne', '12'),
(8, 'chickne', '12'),
(9, 'chickne', '12');

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE `percentage` (
  `id` int(50) NOT NULL,
  `sno` varchar(250) DEFAULT NULL,
  `batch1` varchar(250) DEFAULT NULL,
  `total_birds` varchar(250) DEFAULT NULL,
  `total_morality` varchar(250) DEFAULT NULL,
  `percentage` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id`, `sno`, `batch1`, `total_birds`, `total_morality`, `percentage`) VALUES
(1, '1', '1', '1', '1', '1'),
(2, '1', '1', '1', '1', '1'),
(3, '1', '1', '1', '1', '12'),
(4, '1', '1', '1', '1', '12'),
(5, '6', '1', '34', '1', '12'),
(6, '7', '1', '34', '1', '12'),
(7, '80', '1', '1', '55', '12'),
(8, '12', '12', '12', '12', '');

-- --------------------------------------------------------

--
-- Table structure for table `print`
--

CREATE TABLE `print` (
  `id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `description_name` varchar(50) DEFAULT NULL,
  `unit` varchar(15) DEFAULT NULL,
  `cost` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `mrp` varchar(250) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `qty_left` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date_delivered` varchar(20) DEFAULT NULL,
  `expiration_date` varchar(20) DEFAULT NULL,
  `ttype` varchar(250) DEFAULT NULL,
  `cgst` varchar(250) DEFAULT NULL,
  `sgst` varchar(250) DEFAULT NULL,
  `igst` varchar(250) DEFAULT NULL,
  `hsncode` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseform`
--

CREATE TABLE `purchaseform` (
  `id` int(250) NOT NULL,
  `invoice` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `student` varchar(250) DEFAULT NULL,
  `product` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `cgst` varchar(250) DEFAULT NULL,
  `tamount` varchar(250) DEFAULT NULL,
  `discount` varchar(250) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `sgst` varchar(250) DEFAULT NULL,
  `igst` varchar(250) DEFAULT NULL,
  `cgstamt` varchar(250) DEFAULT NULL,
  `sgstamt` varchar(250) DEFAULT NULL,
  `igstamt` varchar(250) DEFAULT NULL,
  `month` varchar(250) DEFAULT NULL,
  `year` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `id` int(50) NOT NULL,
  `invoice` varchar(9) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `student` varchar(8) DEFAULT NULL,
  `product` varchar(10) DEFAULT NULL,
  `price` int(3) DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL,
  `cgst` varchar(10) DEFAULT NULL,
  `tamount` int(6) DEFAULT NULL,
  `discount` int(1) DEFAULT NULL,
  `total_amount` int(6) DEFAULT NULL,
  `sgst` varchar(10) DEFAULT NULL,
  `igst` varchar(10) DEFAULT NULL,
  `cgstamt` int(1) DEFAULT NULL,
  `sgstamt` int(1) DEFAULT NULL,
  `igstamt` int(1) DEFAULT NULL,
  `month` varchar(6) DEFAULT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(255) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date_order` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `date_deliver` varchar(100) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `cost` varchar(30) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `stinno` varchar(250) NOT NULL,
  `vatper` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `vat` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `pay_date` varchar(250) NOT NULL,
  `d_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `stinno` varchar(250) NOT NULL,
  `vatper` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `vat` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `month` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `d_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(250) NOT NULL,
  `voucherno` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `acchead` varchar(250) DEFAULT NULL,
  `towards` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `due_date` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL,
  `cash` varchar(250) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(250) NOT NULL,
  `p_amount` varchar(250) NOT NULL,
  `vat` varchar(30) NOT NULL,
  `vatper` varchar(250) NOT NULL,
  `btype` varchar(250) NOT NULL,
  `tcharge` varchar(250) NOT NULL,
  `tdiscount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesdemo`
--

CREATE TABLE `salesdemo` (
  `id` int(50) NOT NULL,
  `date` varchar(250) NOT NULL,
  `student` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `vatper` varchar(250) NOT NULL,
  `tamount` varchar(250) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `total_amount` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesform`
--

CREATE TABLE `salesform` (
  `id` int(250) NOT NULL,
  `invoice` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `student` varchar(250) DEFAULT NULL,
  `product` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `cgst` varchar(250) DEFAULT NULL,
  `tamount` varchar(250) DEFAULT NULL,
  `discount` varchar(250) DEFAULT NULL,
  `total_amount` varchar(250) DEFAULT NULL,
  `sgst` varchar(250) DEFAULT NULL,
  `igst` varchar(250) DEFAULT NULL,
  `cgstamt` varchar(250) DEFAULT NULL,
  `sgstamt` varchar(250) DEFAULT NULL,
  `igstamt` varchar(250) DEFAULT NULL,
  `month` varchar(250) DEFAULT NULL,
  `year` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `id` int(50) NOT NULL,
  `invoice` varchar(10) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `student` varchar(8) DEFAULT NULL,
  `product` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `qty` int(1) DEFAULT NULL,
  `amount` int(1) DEFAULT NULL,
  `cgst` varchar(10) DEFAULT NULL,
  `tamount` int(1) DEFAULT NULL,
  `discount` int(1) DEFAULT NULL,
  `total_amount` int(1) DEFAULT NULL,
  `sgst` varchar(10) DEFAULT NULL,
  `igst` varchar(10) DEFAULT NULL,
  `cgstamt` int(1) DEFAULT NULL,
  `sgstamt` int(1) DEFAULT NULL,
  `igstamt` int(1) DEFAULT NULL,
  `month` varchar(6) DEFAULT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`id`, `invoice`, `date`, `student`, `product`, `price`, `qty`, `amount`, `cgst`, `tamount`, `discount`, `total_amount`, `sgst`, `igst`, `cgstamt`, `sgstamt`, `igstamt`, `month`, `year`) VALUES
(1, 'IN-3328208', '14-08-2019', NULL, '', '850', 1, 850, NULL, 850, 0, 850, NULL, NULL, 0, 0, 0, 'August', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `subcatagory`
--

CREATE TABLE `subcatagory` (
  `id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `gstno` varchar(250) DEFAULT NULL,
  `panno` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `bank` varchar(550) DEFAULT NULL,
  `gsttype` varchar(250) DEFAULT NULL,
  `cname` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `emailcc` varchar(250) DEFAULT NULL,
  `accno` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `ifsc` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `userproducts`
--

CREATE TABLE `userproducts` (
  `product_id` int(150) NOT NULL,
  `product_code` varchar(250) DEFAULT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `description_name` varchar(250) DEFAULT NULL,
  `unit` varchar(250) DEFAULT NULL,
  `cost` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `mrp` varchar(250) DEFAULT NULL,
  `supplier` varchar(250) DEFAULT NULL,
  `qty_left` varchar(100) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `date_delivered` varchar(250) DEFAULT NULL,
  `expiration_date` varchar(250) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `ttype` varchar(250) DEFAULT NULL,
  `cgst` varchar(250) DEFAULT NULL,
  `sgst` varchar(250) DEFAULT NULL,
  `igst` varchar(250) DEFAULT NULL,
  `hsncode` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(250) NOT NULL,
  `voucherno` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `acchead` varchar(250) DEFAULT NULL,
  `towards` varchar(250) DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `voucherno`, `date`, `acchead`, `towards`, `amount`) VALUES
(1, 'CP19-0001', '23-11-2019', '', '', ''),
(2, 'd', 'd', 'd', 'd', 'd'),
(3, 'CP19-0003', '27-11-2019', '', '', ''),
(4, 'CP19-0004', '27-11-2019', '', '', ''),
(5, 'CP19-0005', '27-11-2019', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbank`
--
ALTER TABLE `addbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addgroup`
--
ALTER TABLE `addgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addgroup1`
--
ALTER TABLE `addgroup1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addgroup2`
--
ALTER TABLE `addgroup2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addgroup3`
--
ALTER TABLE `addgroup3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addgroup4`
--
ALTER TABLE `addgroup4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addunit`
--
ALTER TABLE `addunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addunit_new`
--
ALTER TABLE `addunit_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `catagory3`
--
ALTER TABLE `catagory3`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `catagory_new`
--
ALTER TABLE `catagory_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `daybook`
--
ALTER TABLE `daybook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_statement`
--
ALTER TABLE `default_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eggtype`
--
ALTER TABLE `eggtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `expensepending`
--
ALTER TABLE `expensepending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensepending_balance`
--
ALTER TABLE `expensepending_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_file`
--
ALTER TABLE `expense_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fbook`
--
ALTER TABLE `fbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `incomesubcatagory`
--
ALTER TABLE `incomesubcatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lose`
--
ALTER TABLE `lose`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `masstype`
--
ALTER TABLE `masstype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print`
--
ALTER TABLE `print`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchaseform`
--
ALTER TABLE `purchaseform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `salesdemo`
--
ALTER TABLE `salesdemo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesform`
--
ALTER TABLE `salesform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcatagory`
--
ALTER TABLE `subcatagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userproducts`
--
ALTER TABLE `userproducts`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbank`
--
ALTER TABLE `addbank`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addgroup`
--
ALTER TABLE `addgroup`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `addgroup1`
--
ALTER TABLE `addgroup1`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `addgroup2`
--
ALTER TABLE `addgroup2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `addgroup3`
--
ALTER TABLE `addgroup3`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `addgroup4`
--
ALTER TABLE `addgroup4`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `addunit`
--
ALTER TABLE `addunit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addunit_new`
--
ALTER TABLE `addunit_new`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagory3`
--
ALTER TABLE `catagory3`
  MODIFY `cat_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagory_new`
--
ALTER TABLE `catagory_new`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daybook`
--
ALTER TABLE `daybook`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `default_statement`
--
ALTER TABLE `default_statement`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `eggtype`
--
ALTER TABLE `eggtype`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `ex_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensepending`
--
ALTER TABLE `expensepending`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensepending_balance`
--
ALTER TABLE `expensepending_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_file`
--
ALTER TABLE `expense_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fbook`
--
ALTER TABLE `fbook`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `in_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomesubcatagory`
--
ALTER TABLE `incomesubcatagory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lose`
--
ALTER TABLE `lose`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masstype`
--
ALTER TABLE `masstype`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `print`
--
ALTER TABLE `print`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseform`
--
ALTER TABLE `purchaseform`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesdemo`
--
ALTER TABLE `salesdemo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesform`
--
ALTER TABLE `salesform`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcatagory`
--
ALTER TABLE `subcatagory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userproducts`
--
ALTER TABLE `userproducts`
  MODIFY `product_id` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
