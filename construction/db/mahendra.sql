-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 01:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahendra`
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

--
-- Dumping data for table `addbank`
--

INSERT INTO `addbank` (`id`, `bankname`, `accno`, `branch`, `ifsc`, `holder`) VALUES
(2, 'SBI', '25894536241', 'Namakkal', 'SBIN0008', 'Siva');

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
(3, 'Dealer');

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
(1, 'Kgs'),
(3, 'Bags'),
(4, 'Nos');

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

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `cashier_name`, `position`, `username`, `password`) VALUES
(1, 'Cashier', 'cashier', 'cashier', '12345'),
(2, 'murali', 'Customer', 'murali', 'murali'),
(3, 'Raja', 'User', 'raja', 'raja');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_id` int(11) NOT NULL,
  `catagory_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_id`, `catagory_name`) VALUES
(2, 'Dealer');

-- --------------------------------------------------------

--
-- Table structure for table `catagory3`
--

CREATE TABLE `catagory3` (
  `cat_id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory3`
--

INSERT INTO `catagory3` (`cat_id`, `catagory_name`) VALUES
(3, 'School Receipts'),
(4, 'Transport Receipts'),
(5, 'Hostel Receipts'),
(6, 'Store Receipts'),
(7, 'Kidz School Receipts'),
(8, 'CBSE School Receipts'),
(9, 'Other Receipts'),
(11, 'Book Fee Receipt'),
(12, 'Uniform Fee Receipt'),
(13, 'Chess Class Fee Receipt'),
(17, 'Garden Income'),
(20, 'Girls Hostel Store Receipt'),
(21, 'Neet Class Fee '),
(22, 'Mess Sale of Ghee'),
(23, 'Mess sale of Waste Food'),
(24, 'Loan from Others'),
(25, 'P F Recovery'),
(26, 'Phone Basic Card Sales'),
(31, 'TATA AIG Insurance Claim Received'),
(33, 'Cash Withdrawal'),
(34, 'Opening Balance'),
(35, 'Closing Balance'),
(36, 'Mess Supervisor A/C');

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
  `bank` varchar(550) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `first_name`, `middle_name`, `last_name`, `groupname`, `gstno`, `bank`) VALUES
(3, 'Raja', 'Salem', '8963524120', '', 'Raja', '', '', NULL, '693582', ''),
(4, 'Madesh', 'Erode', '8963524121', '', 'Madesh', '', '', 'Dealer', '4567896', '');

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

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`ex_id`, `expense_id`, `catagory_name`, `date`, `description`, `amount`, `subcatagory`, `trans`, `bank`, `school`, `pending_id`, `credit_type`) VALUES
(4, 4, 'CBSE Expenses', '05-04-2018', 'Building License Fee', '488700', 'Building Approval Related work Expenses', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Public School', 0, ''),
(5, 5, 'School Expenses', '05-04-2018', 'For Went to  Gandhi school, Rasipuram vidya mandir school', '112', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(6, 6, 'Neet Class Expenses', '05-04-2018', 'For March 2018', '3600', 'Neet Class staff staying guest house rent paid', 'Cash', 'None', 'Other Expenses', 0, ''),
(7, 7, 'Advertisement expenses', '05-04-2018', 'With Velur TV for 2 days Live Telecash Nanjai Edayar mariamman kovil festival', '4000', 'Advertisement expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(8, 8, 'Other General Expenses', '05-04-2018', 'To Mrs.S.Kavitha', '1200', 'Salary Advance', 'Cash', 'None', 'Other Expenses', 0, ''),
(9, 9, 'Neet Class Expenses', '05-04-2018', 'Part Payment to Mr.K.Arun ( Smart Learning Centre)', '150000', 'Neet Summer Crash Course taken charges payment', 'Cash', 'None', 'Other Expenses', 0, ''),
(10, 10, 'Remittance', '05-04-2018', 'Cash Remittance', '100000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(11, 11, 'Other General Expenses', '05-04-2018', '2 Dues for 2017-18 to Mr.Ramesh', '20000', 'School Receipt', 'Cash', 'None', 'Other Expenses', 0, ''),
(12, 12, 'School Expenses', '05-04-2018', 'For went to Notice inside the newspapers at Vangal, Mohanur line - P E T Senthil Two wheeler petrol charges', '200', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(13, 13, 'Advertisement expenses', '05-04-2018', 'Notice inside the newspaper - Mohanur & Vangal Line', '1000', 'Advertisement expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(14, 14, 'Transport Expenses', '05-04-2018', 'For April 2018', '1000', 'Monthly Toll Ticket for Namakkal Route Van', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(15, 15, 'Kidz School Transport Expenses', '05-04-2018', 'For April 2018', '150', 'Monthly Toll Ticket for Maruthi Omni Van', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(16, 16, 'Transport Expenses', '05-04-2018', 'From 26.03.18 to 31.03.18 to Cleaner K.S.Mani', '96', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(17, 17, 'Transport Expenses', '05-04-2018', 'From 26.03.18 to 31.03.18 to Cleaner K.Kuppusamy', '50', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(18, 18, 'Transport Expenses', '05-04-2018', 'From 26.03.18 to 31.03.18 to Cleaner M.Muthusamy', '48', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(19, 19, 'Transport Expenses', '05-04-2018', 'From 26.03.18 to 31.03.18 to Cleaner K.Muthunaicker', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(20, 20, 'Transport Expenses', '05-04-2018', 'From 26.03.18 to 31.03.18 to Cleaner M.Periyasamy', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(21, 21, 'Transport Expenses', '05-04-2018', 'From 26.03.18 to 31.03.18 to Cleaner A.Kulandaisamy', '40', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(22, 22, 'School Expenses', '05-04-2018', 'For 01-04-18 Sunday holiday duty batta to Ayah A.Angammal', '80', 'Ayahs Leave duty salary paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(23, 23, 'Transport Expenses', '05-04-2018', 'For 01-04-18 Sunday holiday duty batta to Ayah G.Kalyani', '80', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(24, 24, 'Transport Expenses', '05-04-2018', 'For 01-04-18 Sunday holiday duty batta to Ayah R.Rajammal', '80', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(25, 25, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver C.Tamilarasan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(26, 26, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver C.Mani', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(27, 27, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver M.Nallusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(28, 28, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver P.Boopathi', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(29, 29, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver C.Kuppusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(30, 30, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver V.Kandaiah', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(31, 31, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver P.Tamilarasan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(32, 32, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver M.Sundaresan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(33, 33, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver O.P.Rajendran', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(34, 34, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver M.Nallannan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(35, 35, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver S.Palanisamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(36, 36, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver K.Palaniappan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(37, 37, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver V.K.Palaniappan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(38, 38, 'Transport Expenses', '05-04-2018', 'For 01.04.18 sunday holiday duty batta to Driver N.Velusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(39, 39, 'Transport Expenses', '05-04-2018', 'For 25.03.18 sunday holiday duty batta to Driver V.K.Palaniappan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(40, 40, 'School Expenses', '06-04-2018', '', '240', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(41, 41, 'School Expenses', '06-04-2018', 'Office cover for Salary', '220', 'Printing & Stationeries', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(42, 42, 'Transport Expenses', '07-04-2018', 'For 7 days to Ayah C.Devaki', '140', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(43, 43, 'Transport Expenses', '07-04-2018', 'For 2 days to Ayah S.Veeralakshmi', '14', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(44, 44, 'Transport Expenses', '07-04-2018', 'For one day to Ayah R.Mallika', '22', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(45, 45, 'Transport Expenses', '07-04-2018', 'For 2 days to Ayah G.Kalyani', '14', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(46, 46, 'Transport Expenses', '07-04-2018', 'For one day to Ayah R.Sagunthala', '19', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(47, 47, 'Transport Expenses', '07-04-2018', 'For one day to Ayah V.Banumathi', '8', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(48, 48, 'Transport Expenses', '07-04-2018', 'For 3 days to Ayah R.Sivagami', '25', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(49, 49, 'Transport Expenses', '07-04-2018', 'For 4 days to Ayah A.Angammal', '49', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(50, 50, 'Transport Expenses', '07-04-2018', 'For 6 days to Ayah Ayah V.Senthamarai', '66', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(51, 51, 'Transport Expenses', '07-04-2018', 'For 8 days to Ayah V.Maheswari', '91', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(52, 52, 'CBSE Expenses', '07-04-2018', 'Sammatti stone 1 Unit for Compound wall work', '1800', 'Building work expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(53, 53, 'School Expenses', '07-04-2018', 'To P E T Senthilkumar two wheeler petrol charges for 2 days hostel duty & went', '100', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(54, 54, 'CBSE Expenses', '07-04-2018', 'For snacks at the time of canvas to staff', '220', 'CBSE Other Expenses', 'Cash', 'None', 'Public School', 0, ''),
(55, 55, 'Advertisement expenses', '07-04-2018', 'Advance for Notice Printing - Ramana Printers Namakkal', '50000', 'Advertisement expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(56, 56, 'CBSE Expenses', '07-04-2018', 'Went to Salem DTCP office - 4 days car hire to Kumar', '11095', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(57, 57, 'CBSE Expenses', '07-04-2018', 'For went to salem DTCP office - Tea food expenses through R.Venkatachalam', '416', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(58, 58, 'Transport Expenses', '07-04-2018', 'For FC Charges , Green tax to TN 28 AB 3736 , TN 28 M 9950 & TN 28 AY 4858', '8700', 'Transport F C Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(59, 59, 'Advertisement expenses', '07-04-2018', 'Big Shopper bag Designing work charges to K.Sivakumar', '500', 'Advertisement expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(60, 60, 'Other General Expenses', '07-04-2018', 'KG Staff canvassing - Tea Snack expenses ', '400', 'Canvassing Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(61, 61, 'Kidz School Expenses', '07-04-2018', 'For March 2018', '30000', 'Kidz Building Rent Paid', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(62, 62, 'CBSE Expenses', '07-04-2018', 'For March 2018', '6000', 'CBSE Principal Residence house rent paid', 'Cash', 'None', 'Public School', 0, ''),
(63, 63, 'Other General Expenses', '07-04-2018', 'To R.Subbaiyan for Rs.10.00 - From 04.03.18 to 03.04.18', '12500', 'Interest to other loans', 'Cash', 'None', 'Other Expenses', 0, ''),
(64, 64, 'Other General Expenses', '07-04-2018', 'To Ponni Sundaram for Rs.10.00 - 06.03.18 to 05.04.18', '12500', 'Interest to other loans', 'Cash', 'None', 'Other Expenses', 0, ''),
(65, 65, 'School Expenses', '07-04-2018', 'For 01.04.18 sunday holiday duty batta to Ayah S.Ponni', '80', 'Ayahs Leave duty salary paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(66, 66, 'Remittance', '07-04-2018', 'Cash Remittance', '300000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(68, 68, 'School Salary Expenses', '07-04-2018', 'For March 2018', '125000', 'Salary to E C Members', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(69, 69, 'School Salary Expenses', '07-04-2018', 'For March 2018', '395787', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(70, 70, 'School Salary Expenses', '07-04-2018', 'For March 2018', '345578', 'Salary to Teaching Staff Hr.Sec.Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(71, 71, 'School Salary Expenses', '07-04-2018', 'For March 2018', '7733', 'Salary to Office Staff', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(72, 72, 'School Salary Expenses', '07-04-2018', 'For March 2018', '8100', 'Salary to Hostel Warden', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(73, 73, 'School Salary Expenses', '07-04-2018', 'For March 2018', '6500', 'Salary to Agri', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(74, 74, 'Transport Expenses', '07-04-2018', 'For March 2018', '138428', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(75, 75, 'Transport - Salary expenses', '07-04-2018', 'For March 2018', '24368', 'Salary to Cleaners', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(76, 76, 'School Salary Expenses', '07-04-2018', 'For March 2018', '45647', 'Salary to Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(77, 77, 'Kidz school Salary Expenses', '07-04-2018', 'For March 2018', '14200', 'Kidz school Teaching Staff Salary', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(78, 78, 'Kidz school Salary Expenses', '07-04-2018', '', '12700', 'Kidz School - Salary to Ayahs', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(79, 79, 'Kidz School Transport Expenses', '07-04-2018', 'For March 2018', '7000', 'Kidz school - Salary to Drivers', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(80, 80, 'School Salary Expenses', '07-04-2018', 'For March 2018', '72000', 'Salary to Tuition coaching class directors', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(81, 81, 'Hostel Salary Expenses', '07-04-2018', 'For March 2018', '4500', 'Salary to Hostel Night study watching director', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(82, 82, 'School Salary Expenses', '07-04-2018', 'For March 2018', '14876', 'Salary to Class Room Cleaning Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(83, 83, 'School Salary Expenses', '07-04-2018', 'For March 2018', '24500', 'Salary to Security', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(84, 84, 'School Salary Expenses', '07-04-2018', 'For March 2018 extra salary to V.Manikandan', '4000', 'Salary to Teaching Staff Hr.Sec.Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(85, 85, 'Hostel Salary Expenses', '07-04-2018', 'For March 2018', '3000', 'Salary to Hostel Warden', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(86, 86, 'School Salary Expenses', '07-04-2018', 'For March 2018 extra salary to R.Karthikeyan', '1000', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(87, 87, 'Hostel Salary Expenses', '07-04-2018', 'For March 2018', '86433', 'Salary to Mess Staff', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(88, 88, 'Transport - Salary expenses', '07-04-2018', 'For March 2018 to Driver M.Nallannan', '7280', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(89, 89, 'CBSE School Salary Expenses', '07-04-2018', 'For March 2018 to Principal', '20000', 'CBSE salary to Teaching Staff', 'Cash', 'None', 'Public School', 0, ''),
(90, 90, 'School Salary Expenses', '07-04-2018', 'For March 2018', '733600', 'Salary to Teaching Staff Hr.Sec.Block', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(91, 91, 'School Salary Expenses', '07-04-2018', 'For March 2018', '624097', 'Salary to Teaching Staff Matric Block', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(92, 92, 'School Salary Expenses', '07-04-2018', 'For March 2018', '101300', 'Salary to Office Staff', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(93, 93, 'School Salary Expenses', '07-04-2018', 'For March 2018', '19100', 'Salary to Store incharge', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(94, 94, 'Transport - Salary expenses', '07-04-2018', 'For March 2018', '48800', 'Salary to Drivers', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(95, 95, 'Transport - Salary expenses', '07-04-2018', 'For March 2018', '15820', 'Salary to Cleaners', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(96, 96, 'School Salary Expenses', '07-04-2018', 'For March 2018', '30506', 'Salary to Ayahs', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(97, 97, 'Hostel Salary Expenses', '07-04-2018', 'For March 2018', '21780', 'Salary to Mess Staff', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(98, 98, 'Kidz school Salary Expenses', '07-04-2018', 'For March 2018', '135295', 'Kidz school Teaching Staff Salary', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601584 (N P)', 'Malar Nursery & Primary School', 0, ''),
(99, 99, 'Kidz school Salary Expenses', '07-04-2018', 'For March 2018', '8100', 'Kidz school - Salary to Drivers', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601584 (N P)', 'Malar Nursery & Primary School', 0, ''),
(100, 100, 'Kidz school Salary Expenses', '07-04-2018', 'For March 2018', '6200', 'Kidz School - Salary to Ayahs', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601584 (N P)', 'Malar Nursery & Primary School', 0, ''),
(101, 101, 'CBSE School Salary Expenses', '07-04-2018', 'For March 2018', '193166', 'CBSE salary to Teaching Staff', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601596(Public)', 'Public School', 0, ''),
(102, 102, 'CBSE School Salary Expenses', '07-04-2018', 'For March 2018', '4200', 'CBSE Salary to Office Staff', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601596(Public)', 'Public School', 0, ''),
(103, 103, 'School Salary Expenses', '07-04-2018', 'For March 2018 to Night Watchman 12 days worked salary', '2600', 'Salary to Security', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(104, 104, 'CBSE School Salary Expenses', '07-04-2018', 'For March 2018 to Karate Master', '1250', 'CBSE salary to Teaching Staff', 'Cash', 'None', 'Public School', 0, ''),
(105, 105, 'Transport Expenses', '09-04-2018', 'Air Checkup, Crease work - Jeyam Truck Point bills', '5390', 'Transport Tyre Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(106, 106, 'Remittance', '09-04-2018', 'Cash Remittance', '200000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(107, 107, 'School Expenses', '09-04-2018', 'To M.Senthilraja for went to DEO office - bus fare', '28', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(108, 108, 'School Expenses', '09-04-2018', 'IX Std Exam Asia outline map sheets 100 Nos', '30', 'Examination Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(109, 109, 'Transport Expenses', '09-04-2018', 'TN 28 M 9950 FC Work charges to Angalamman Body Builders', '17500', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(110, 110, 'Transport Expenses', '09-04-2018', 'To Driver C.Tamilarasan for TN 28 AW 6550 breakdown at Kabilarmalai two wheeler petrol charges', '100', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(111, 111, 'Transport Expenses', '09-04-2018', 'Evening Hospital duty batta to Driver C.Tamilarasan', '1710', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(112, 112, 'Hostel Expenses', '09-04-2018', 'For One load batta to driver C.Tamilarasan', '60', 'Hostel Water Tanker extra duty batta', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(113, 113, 'Transport Expenses', '09-04-2018', 'Van Toll ticket remit at Namakkal ICICI Bank - two wheeler petrol charges to Driver C.Tamilarasan', '120', 'Transport - Other expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(114, 114, 'Transport Expenses', '09-04-2018', 'To Driver S.Mani for TN 28 AB 3736 FC Work at Namakkal workshop', '140', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(115, 115, 'Transport Expenses', '09-04-2018', 'To Driver S.Mani for went to spares purchase at Namakkal - two wheeler petrol', '100', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(116, 116, 'Transport Expenses', '09-04-2018', 'To Driver S.Mani for went to Mohanur workshop TN 28 M 9950 FC Work ', '207', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(117, 117, 'Transport Expenses', '09-04-2018', '4 vehicles lathe work bill', '1110', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(118, 118, 'CBSE Expenses', '09-04-2018', '5 drivers tiffen expenses at the time of canvassing', '250', 'Canvassing Expenses', 'Cash', 'None', 'Public School', 0, ''),
(119, 119, 'Transport Expenses', '09-04-2018', 'TN 28 AW 6550 Radiator changed work charges', '450', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(120, 120, 'Transport Expenses', '09-04-2018', 'For TN 28 P 7094 Kid hose welding work charges', '50', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(121, 121, 'Transport Expenses', '09-04-2018', 'To Driver S.Mani for TN 28 AY 4858 FC Work - two wheeler petrol charges', '170', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(122, 122, 'Transport Expenses', '09-04-2018', 'To TN 28 AY 9176 went to namakkal workshop toll ticket', '75', 'Temporary Toll Ticket charges', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(123, 123, 'Kidz School Transport Expenses', '09-04-2018', 'For TN 28 AY 9176 service bill to SKS Automobiles', '16600', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(124, 124, 'Transport Expenses', '09-04-2018', 'Private driver duty batta to driver P.Selvaraj ', '1500', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(125, 125, 'School Salary Expenses', '09-04-2018', 'For March 2018 to Secretary R.Kandasamy', '50000', 'Salary to E C Members', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(126, 126, 'School Salary Expenses', '09-04-2018', 'For March 2018', '65000', 'Salary to Scawengers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(127, 127, 'School Salary Expenses', '09-04-2018', 'For March 2018 to C.Gomatheeswari', '7400', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(128, 128, 'School Salary Expenses', '09-04-2018', 'For March 2018 to M.Mallika', '6500', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(129, 129, 'School Salary Expenses', '09-04-2018', 'For March 2018 to N.Venkatesan', '5850', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(130, 130, 'School Salary Expenses', '09-04-2018', 'For March 2018', '14000', 'Salary to Electrician', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(132, 132, 'Transport Expenses', '10-04-2018', 'Sports students went to namakkal - duty batta to Driver P.Boopathi', '75', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(133, 133, 'Transport Expenses', '10-04-2018', 'TN 28 AY 4858 spares purchase at namakkal bus fare to Driver V.Kandaiah', '24', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(134, 134, 'Transport Expenses', '10-04-2018', 'TN 28 AY 4858 FC Work at workshop - bus, food expenses to Driver V.Kandaiah', '239', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(135, 135, 'Transport Expenses', '10-04-2018', 'TN 28 M 9950 workshop work time bus fare to Driver D.Radhakrishnan', '26', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(136, 136, 'Transport Expenses', '10-04-2018', '01.04.18 Maruthi omni van duty batta to Driver N.Velusamy', '50', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(137, 137, 'Kidz School Expenses', '10-04-2018', 'Fire service NOC - Gift cover to Fire service office', '6000', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(138, 138, 'Transport - Salary expenses', '10-04-2018', 'II nd trip duty salary for March to Driver C.Tamilarasan', '1350', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(139, 139, 'Transport Expenses', '10-04-2018', 'For 04.03.18 sunday holiday duty batta to Driver K.Rajendran', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(140, 140, 'School Expenses', '10-04-2018', 'For 08.04.18 sunday holiday duty batta to ayah C.Rajalakshmi ', '87', 'Ayahs Leave duty salary paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(141, 141, 'School Expenses', '10-04-2018', 'For 08.04.18 sunday holiday duty batta to ayah P.Ranjitham', '87', 'Ayahs Leave duty salary paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(142, 142, 'School Expenses', '10-04-2018', 'For 01-04-18 Sunday holiday duty batta to Ayah S.Jayammal', '80', 'Ayahs Leave duty salary paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(143, 143, 'Other General Expenses', '10-04-2018', 'Hr.SEc.Block standing board (6 x 4) painting work charges to Sekar', '300', 'Painting work labour charges', 'Cash', 'None', 'Other Expenses', 0, ''),
(144, 144, 'CBSE Expenses', '10-04-2018', '23.03.18 salem DTCP office went - tea food expenses', '540', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(145, 145, 'CBSE Expenses', '10-04-2018', '23.03.18 went to Salem DTCP office - car hire', '3000', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(146, 146, 'School Expenses', '10-04-2018', 'Erode audit office went - bus, food expenses', '170', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(147, 147, 'School Expenses', '10-04-2018', 'New Account - account books, files & stationeries', '6700', 'Printing & Stationeries', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(148, 148, 'CBSE School Salary Expenses', '10-04-2018', 'For March 2018 to Music Master K.Ramesh', '4500', 'CBSE salary to Teaching Staff', 'Cash', 'None', 'Public School', 0, ''),
(149, 149, 'CBSE School Salary Expenses', '10-04-2018', 'For March 2018 to Chess master', '1250', 'CBSE salary to Teaching Staff', 'Cash', 'None', 'Public School', 0, ''),
(150, 150, 'Kidz school Salary Expenses', '10-04-2018', 'For March 2018 to Chess master', '5900', 'Kidz school Teaching Staff Salary', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(151, 151, 'Transport - Salary expenses', '10-04-2018', '5 days salary to Driver K.Rajendran', '1400', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(152, 152, 'Hostel Expenses', '10-04-2018', 'Advance for party payments', '30000', 'Mess Suprevisor Advance', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School', 0, ''),
(153, 153, 'Neet Class Expenses', '10-04-2018', 'Part Payment to Mr.K.Arun ( Smart Learning Centre)', '50000', 'Neet Summer Crash Course taken charges payment', 'Cash', 'None', 'Other Expenses', 0, ''),
(154, 154, 'Book Purchase & Expenses', '11-04-2018', 'XII std books from Govt', '155334', 'Book Purchases', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Other Expenses', 0, ''),
(155, 155, 'Transport Expenses', '11-04-2018', '30 & 31.03.18 Moni van duty batta & bus fare to Driver K.Thangavel', '481', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(156, 156, 'Transport Expenses', '11-04-2018', 'Evening Hospital duty batta to Driver M.Raja', '638', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(157, 157, 'Hostel Expenses', '11-04-2018', 'Girls hostel warden cell recharge', '200', 'Hostel warden cell phone recharge expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(158, 158, 'Advertisement expenses', '11-04-2018', 'Notice inside the newspaper ', '4213', 'Advertisement expenses', 'Cash', 'None', 'Public School', 0, ''),
(159, 159, 'Advertisement expenses', '11-04-2018', 'Notice inside the newspaper charges', '3904', 'Advertisement expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(160, 160, 'Kidz School Expenses', '11-04-2018', 'Building license renewal application fee', '1000', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(161, 161, 'Neet Class Expenses', '11-04-2018', 'XI Neet class biology study materials xerox taken', '280', 'Neet class books purchased', 'Cash', 'None', 'Other Expenses', 0, ''),
(162, 162, 'School Salary Expenses', '11-04-2018', 'For March 2018 to Scatting Master', '8000', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(163, 163, 'School Salary Expenses', '11-04-2018', 'For March 2018 to French Master', '16000', 'Salary to Part time teachers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(164, 164, 'Kidz School Expenses', '11-04-2018', 'For 220999', '240', 'Kidz Telephone bill paid', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(165, 165, 'CBSE Expenses', '11-04-2018', 'For 251999', '320', 'CBSE Telephone bill paid', 'Cash', 'None', 'Public School', 0, ''),
(173, 173, 'Transport Expenses', '02-04-2018', '33rd due to TN 88 Y 3404- Interest', '3279.50', 'Transport Vehicle Loan - Interest', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(174, 174, 'Vehicle Loan', '02-04-2018', '35th due to TN 88 Y 2466- Principal', '28836', 'Cholamandalam Finance A/c-1426335 - TN 88 Y 2466', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(175, 175, 'Transport Expenses', '02-04-2018', '35th due to TN 88 Y 2466- Interest', '2758', 'Transport Vehicle Loan - Interest', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(176, 176, 'Vehicle Loan', '02-04-2018', '35th due to TN 88 Y 2455- Principal', '28836', 'Cholamandalam Finance A/c-1428882 - TN 88 Y 2455', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(177, 177, 'Transport Expenses', '02-04-2018', '35th due to TN 88 Y 2455- Interest', '2758', 'Transport Vehicle Loan - Interest', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(178, 178, 'Vehicle Loan', '02-04-2018', '33rd due to TN 88 Y 3404', '28314.50', 'Cholamandalam Finance A/c-1456255 - TN 88 Y 3404', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(179, 179, 'Transport Expenses', '02-04-2018', '33rd due to TN 88 Y 3404- Interest', '3279.50', 'Transport Vehicle Loan - Interest', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(183, 183, 'School Expenses', '11-04-2018', 'For Ph.No: 94426 18299', '820', 'Cell phone bill paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(184, 184, 'School Expenses', '11-04-2018', 'For Ph.No: 251634', '1770', 'Telephone Bill Paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(185, 185, 'School Expenses', '11-04-2018', 'for Ph.No 251609', '235', 'Telephone Bill Paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(186, 186, 'School Expenses', '11-04-2018', 'For Ph.No: 250199', '295', 'Telephone Bill Paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(187, 187, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver C.Tamilarasan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(188, 188, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver C.Mani', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(189, 189, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver M.Nallusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(190, 190, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver P.Boopathi', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(191, 191, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver C.Kuppusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(192, 192, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver V.Kandaiah', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(193, 193, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver S.Mani', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(194, 194, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver M.Sundaresan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(195, 195, 'Transport Expenses', '11-04-2018', 'For 08.04.18 sunday holiday duty batta to Driver O.P.Rajendran', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(196, 196, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver M.Nallannan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(197, 197, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday holiday duty batta to Driver S.Palanisamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(198, 198, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver K.Palaniappan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(199, 199, 'Transport Expenses', '11-04-2018', 'For 08.04.18 Sunday duty batta to Driver N.Velusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(200, 200, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver O.P.Rajendran', '1050', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(201, 201, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver S.Ramasamy', '322', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(202, 202, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver P.Tamilarasan', '650', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(203, 203, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver C.Tamilarasan', '876', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(204, 204, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver S.Mani', '416', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(205, 205, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver R.Thangarasu', '322', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(206, 206, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver D.Radhakrishnan', '357', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(207, 207, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver K.Balasubramanian', '375', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(208, 208, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver S.Palanisamy', '1215', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(209, 209, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver A.Navabjohn', '336', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(210, 210, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver M.Nallusamy', '775', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(211, 211, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver K.Palaniappan', '308', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(212, 212, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver P.Perumal', '575', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(213, 213, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver C.Mani', '620', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(214, 214, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver M.Nallannan', '425', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(215, 215, 'Transport Expenses', '11-04-2018', 'Bus fare for March 2018 to Driver P.Boopathi', '775', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(216, 216, 'Transport Expenses', '11-04-2018', 'Bus fare from 02.04.18 to 07.04.18 to Cleaner K.S.Mani', '96', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(217, 217, 'Transport Expenses', '11-04-2018', 'Bus fare from 02.04.18 to 07.04.18 to Cleaner K.Kuppusamy', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(218, 218, 'Transport Expenses', '11-04-2018', 'Bus fare from 02.04.18 to 07.04.18 to Cleaner M.Muthusamy', '72', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(219, 219, 'Transport Expenses', '11-04-2018', 'Bus fare from 02.04.18 to 07.04.18 to Cleaner M.Periyasamy', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(220, 220, 'Transport Expenses', '11-04-2018', 'Bus fare from 02.04.18 to 07.04.18 to Cleaner K.Muthunaicker', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(221, 221, 'Transport Expenses', '11-04-2018', 'For March 2018 to Driver N.Palaniappan', '6900', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(222, 222, 'Transport Expenses', '11-04-2018', 'Extra duty batta to Driver N.Palaniappan For 15,17 & 19.02.18 Evening Omni duty batta', '150', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(223, 223, 'Other General Expenses', '12-04-2018', 'For March 2018', '77118', 'PF Recovery & Payment', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Other Expenses', 0, ''),
(224, 224, 'Other General Expenses', '12-04-2018', 'For March 2018', '64598', 'E P F Contribution', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Other Expenses', 0, ''),
(225, 225, 'School Expenses', '12-04-2018', 'For March 2018', '2918', 'Newspaper Subscription expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(226, 226, 'School Salary Expenses', '12-04-2018', 'For December 2017 to Ms.B.Foujiya', '3125', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(227, 227, 'Transport Expenses', '12-04-2018', 'Bus are for March to Driver P.Kandasamy', '900', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(228, 228, 'Other General Expenses', '12-04-2018', '2016-17 Republicday celeberation Photos printing bill to M.Ramalingam', '20000', 'Other Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(229, 229, 'Other General Expenses', '12-04-2018', 'For Class I to V Exhibition photos taken charges to M.Ramalingam', '3000', 'Other Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(230, 230, 'Remittance', '12-04-2018', 'Cash Remittance', '80000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(231, 231, 'Hostel Expenses', '12-04-2018', 'Advance for Mess Expenses', '10000', 'Mess Suprevisor Advance', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(232, 232, 'Remittance', '13-04-2018', 'Cash Remittance', '200000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(233, 233, 'School Expenses', '13-04-2018', 'For Weekly pooja expenses', '725', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(234, 234, 'CBSE Expenses', '13-04-2018', 'Sanitary Certificate Application Fee paid', '50', 'CBSE Other Expenses', 'Cash', 'None', 'Public School', 0, ''),
(235, 235, 'School Expenses', '13-04-2018', 'For books from Maria publication', '50', 'Book Bundle Parcel Hire', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(236, 236, 'Remittance', '16-04-2018', 'Cash Remittance', '80000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(237, 237, 'Hostel Expenses', '16-04-2018', 'For 3 Loads @ Rs.60 to Driver O.P.Rajendran', '180', 'Hostel Water Tanker extra duty batta', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(238, 238, 'Transport Expenses', '16-04-2018', 'Bus fare for March to Driver V.K.Palaniappan', '214', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(239, 239, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Ayah G.Kalyani', '35', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(240, 240, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Ayah R.Sivagami', '25', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(241, 241, 'Transport Expenses', '13-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Ayah S.Jayammal', '126', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(242, 242, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Ayah V.Senthamarai', '54', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(243, 243, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Cleaner M.Periyasamy', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(244, 244, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Ayah A.Angamal', '56', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(245, 245, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Cleaner K.Kuppusamy', '50', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(246, 246, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Cleaner K.S.Mani', '80', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(247, 247, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Cleaner A.Kulandaisamy', '72', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(248, 248, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Cleaner M.Muthusamy', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(249, 249, 'Transport Expenses', '16-04-2018', 'Bus fare from 09.04.18 to 14.04.18 to Cleaner K.Muthunaicker', '60', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(250, 250, 'School Salary Expenses', '16-04-2018', 'For March 2018 to M.Nithya', '7290', 'Salary to Teaching Staff Matric Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(251, 251, 'Transport Expenses', '17-04-2018', '', 'For 08.04.18 sunday holiday duty batta to Driver V.K.Palaniappan', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(252, 252, 'CBSE Expenses', '17-04-2018', 'Went to Chennai - 4 persons train ticket charges', '9560', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(253, 253, 'School Salary Expenses', '17-04-2018', 'For March 2018 to M.Santhanalakshmi', '13500', 'Salary to Teaching Staff Hr.Sec.Block', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(254, 254, 'School Expenses', '17-04-2018', 'For March 2018', '588', 'Internet Charges paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(255, 255, 'School Expenses', '17-04-2018', 'For 15.04.18 sunday holiday duty batta to Ayah R.Mallika', '94', 'Ayahs Leave duty salary paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(256, 256, 'School Expenses', '17-04-2018', 'For 15.04.18 sunday holiday duty batta to Ayah V.Banumathi', '88', 'Ayahs Leave duty salary paid', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(257, 257, 'School Expenses', '18-04-2018', 'or Courier to IMS office Salem', '50', 'Postage & Courier expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(258, 258, 'School Expenses', '18-04-2018', '', '200', 'Two wheeler petrol expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(259, 259, 'School Expenses', '18-04-2018', 'For Public Exam use Stationeries', '560', 'Examination Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(260, 260, 'School Expenses', '18-04-2018', 'For Duster 18 Nos', '576', 'Other Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(261, 261, 'Neet Class Expenses', '18-04-2018', '', '35', 'Neet Class Staff staying guest house E B Charges', 'Cash', 'None', 'Other Expenses', 0, ''),
(262, 262, 'Advertisement expenses', '18-04-2018', 'For R Plus TV Channel advertisement charges for one month', '5000', 'Advertisement expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(263, 263, 'Kidz School Expenses', '18-04-2018', 'Recognition Renewal Fee paid', '7500', 'Other Expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(264, 264, 'Hostel Expenses', '18-04-2018', 'For March 2018 - 198 Nos @ Rs.130', '25740', 'Dobby charges', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(265, 265, 'Hostel Expenses', '18-04-2018', 'For Boys hostel warden cell recharge', '100', 'Hostel warden cell phone recharge expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(266, 266, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver C.Tamilarasan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(267, 267, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver M.Nallusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(268, 268, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver P.Boopathi', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(269, 269, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver C.Kuppusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(270, 270, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver V.Kandaiah', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(271, 271, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver S.Mani', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(272, 272, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver M.Sundaresan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(273, 273, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver M.Nallannan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(274, 274, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver K.Palaniappan', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(275, 275, 'Transport Expenses', '18-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver N.Velusamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(276, 276, 'School Expenses', '18-04-2018', 'For Hr.Sec.Block T C Book binding charges', '1000', 'Printing & Stationeries', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(277, 277, 'Transport Expenses', '18-04-2018', 'Extra duty batta to Cleaner A.Kulandaisamy', '40', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, '');
INSERT INTO `expense` (`ex_id`, `expense_id`, `catagory_name`, `date`, `description`, `amount`, `subcatagory`, `trans`, `bank`, `school`, `pending_id`, `credit_type`) VALUES
(278, 278, 'School Expenses', '18-04-2018', 'School name board with Recognition Number ', '200', 'Printing & Stationeries', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(279, 279, 'Other General Expenses', '18-04-2018', 'XII book purchase from Govt - Depo manager comission, auto hire & toll ticket charges', '7335', 'Other Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(282, 282, 'Kidz School Expenses', '19-04-2018', 'Occupied certificate Application Fee paid', '50', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(283, 283, 'Kidz School Expenses', '19-04-2018', 'For Annualday celeberation - TV Live Telecash charges to Velur TV', '7000', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(284, 284, 'Building Expenses', '19-04-2018', 'ADvance to Painter Sekar', '24000', 'Building Painting work labour charges', 'Cash', 'None', 'Other Expenses', 0, ''),
(285, 285, 'School Expenses', '19-04-2018', 'Name board photo print taken charges', '20', 'Printing & Stationeries', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(286, 286, 'Transport Expenses', '19-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver C.Mani', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(287, 287, 'School Expenses', '19-04-2018', 'X, XI , XII th Public exam use Kada cloth 85 Mtrs', '4250', 'Examination Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(288, 288, 'Transport Expenses', '19-04-2018', 'For TN 28 P 0862 sticker pasting charges', '1000', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(289, 289, 'Transport Expenses', '19-04-2018', 'For TN 28 P 0862 FC Work at mohanur workshop - tea, food expenses', '399', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(290, 290, 'Other General Expenses', '19-04-2018', 'Matric teachers canvassing work went - drivers tiffen expenses to S.Mani for 3 days', '150', 'Canvassing Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(291, 291, 'Transport Expenses', '19-04-2018', 'For Distilled Water', '200', 'Transport - Other expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(292, 292, 'Transport Expenses', '19-04-2018', 'For TN 28 AY 4858 FC Work at mohanur workshop - duty batta to Cleaner M.periyasamy', '100', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(293, 293, 'Book Purchase & Expenses', '19-04-2018', 'For Hindi books purchase Rs.6960 + DD Commission Rs.30', '6990', 'Book Purchases', 'Cash', 'None', 'Other Expenses', 0, ''),
(294, 294, 'Transport Expenses', '19-04-2018', 'For TN 28 P 7094 diesel return tuve welding work expenses', '200', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(295, 295, 'Transport Expenses', '19-04-2018', 'For TN 28 AW 6550 accelerator repair work expenses - on the way breakdown time', '300', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(296, 296, 'Transport Expenses', '19-04-2018', 'For TN 28 AB 3736 break checkup work charges', '250', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(297, 297, 'Transport Expenses', '19-04-2018', 'For TN 28 P 0862 wheel crease work, cylinder  & pedal kid changed work expenses', '1100', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(298, 298, 'Remittance', '19-04-2018', 'Cash Remittance', '100000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(299, 299, 'Neet Class taken charges paid', '19-04-2018', 'Advance to K.Arun ( Smart Learning Centre)', '100000', 'Neet Summer Crash Course taken charges payment', 'Cash', 'None', 'Other Expenses', 0, ''),
(300, 300, 'Hostel Expenses', '19-04-2018', 'For Boiler Exaust fan, Girls hostel gate welding work charges to Kathirvel (Annamalai Engg works)', '1900', 'Mess Other Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(301, 301, 'Garden Expenses', '19-04-2018', 'For coconut picking charges for 12 trees @ Rs.10 to Cleaner A.Kulandaisamy', '120', 'Garden Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(302, 302, 'School Expenses', '19-04-2018', 'For S.No: c-272', '86675', 'E B Charges paid', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School', 0, ''),
(303, 303, 'Kidz School Expenses', '19-04-2018', 'For Sports day celeberation - stage decoration things', '155', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(304, 304, 'Kidz School Expenses', '19-04-2018', 'For Sports day celeberation -  Paper plate, paper cup', '126', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(305, 305, 'Kidz School Expenses', '19-04-2018', 'For Sports day celeberation -  Colour cello tape', '40', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(306, 306, 'Kidz School Expenses', '19-04-2018', 'For Sports day celeberation -  Ant repellent 1 No', '50', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(307, 307, 'Kidz School Expenses', '19-04-2018', 'For A 4 Paper 1 Pocket', '165', 'Printing & Stationeries', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(308, 308, 'Kidz School Expenses', '19-04-2018', 'For Sports day celeberation - DVD, Rewritable CD purchase', '106', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(309, 309, 'Kidz School Expenses', '19-04-2018', 'For AEEO Visit at our school - sweet, banana leaf & vada', '110', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(310, 310, 'Kidz School Expenses', '19-04-2018', 'For February 2018', '370', 'Newspaper Subscription expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(311, 311, 'Kidz School Expenses', '19-04-2018', 'For AEEO  Visit at our school - papers xerox taken charges', '26', 'Kidz Xerox expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(312, 312, 'Kidz School Expenses', '19-04-2018', 'For Broom stick 3 Nos @ Rs.50', '150', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(313, 313, 'Kidz School Expenses', '19-04-2018', 'For AEEO Visit - RTE Act papers xerox taken charges', '145', 'Kidz Xerox expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(314, 314, 'Kidz School Expenses', '19-04-2018', 'For Legal paper 25 Nos for RTE Act work', '15', 'Printing & Stationeries', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(315, 315, 'Kidz School Expenses', '19-04-2018', 'For UKG Song CD Writing charges', '20', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(316, 316, 'Kidz School Expenses', '19-04-2018', 'For Annualday students messge detail xerox taken charges', '18', 'Kidz Xerox expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(317, 317, 'Kidz School Expenses', '19-04-2018', 'For Students group photo work polythene cover', '187', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(318, 318, 'Kidz School Expenses', '19-04-2018', 'For March 2018 - tea dust, sugar & milk ', '1104', 'Kidz Tea expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(319, 319, 'Kidz School Expenses', '19-04-2018', 'For Annualday celeberation CD Recording charges', '100', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(320, 320, 'Kidz School Expenses', '19-04-2018', 'For Annualday celeberation CD Recording charges', '150', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(321, 321, 'Remittance', '20-04-2018', 'Cash Remittance', '130000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(322, 322, 'Remittance', '19-04-2018', 'Cash Remittance', '40000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(323, 323, 'School Expenses', '20-04-2018', 'For petrol on 07.04.18', '200', 'Two wheeler petrol expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(324, 324, 'School Expenses', '20-04-2018', 'For petrol on 03.04.18', '200', 'Two wheeler petrol expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(325, 325, 'School Expenses', '20-04-2018', 'For Paramathi Perumal kovil dinasari neivethya pooja provisions for April 2018', '1290', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(326, 326, 'CBSE Expenses', '20-04-2018', 'Building approval work - chennai DTCP office went expenses', '3818', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(327, 327, 'School Expenses', '20-04-2018', 'For Weekly pooja expenses', '750', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(328, 328, 'Transport Expenses', '29-01-2019', 'For TN 88 Z 0106 Premium with Future Generali India Insurance Co Ltd', '73189', 'Transport Insurance Premium paid', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, ''),
(329, 329, 'Transport Expenses', '21-04-2018', 'For purchase of spares - Jaihind Auto Agencies', '3950', 'Transport Repairs & Maintenance expenses', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School', 0, ''),
(330, 330, 'Hostel Expenses', '21-04-2018', 'Advance for party payments', '28583', 'Mess Suprevisor Advance', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School', 0, ''),
(331, 331, 'Hostel Expenses', '21-04-2018', 'Advance for Mess Expenses', '10000', 'Mess Suprevisor Advance', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(332, 332, 'Advertisement expenses', '21-04-2018', 'Advance for Notice Printing - Ramana Printers Namakkal', '40000', 'Advertisement expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(333, 333, 'Transport Expenses', '21-04-2018', 'Transport Incharge duty salary to Driver S.Mani ( From 08.01.18 to 31.03.18)', '13833', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(334, 334, 'Transport - Salary expenses', '21-04-2018', 'For April 2018 - 11 worked days salary to Driver K.Thangavel', '2566', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(335, 335, 'Transport - Salary expenses', '21-04-2018', 'Transport incharge duty salary to Driver C.Tamilarasan for March 2018', '4000', 'Salary to Drivers', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(336, 336, 'School Expenses', '21-04-2018', 'Extra books return surya publications - ABT parcel service hire', '928', 'Book Bundle Parcel hire', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(337, 337, 'CBSE Expenses', '21-04-2018', 'For Notice inside the newspapers ', '4181', 'Advertisement expenses', 'Cash', 'None', 'Public School', 0, ''),
(338, 338, 'Kidz School Expenses', '21-04-2018', 'For REnewal  work - building plan print taken charges', '480', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(339, 339, 'Garden Expenses', '21-04-2018', 'For 2017-18 Property Tax paid', '160', 'Garden Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(340, 340, 'Other General Expenses', '21-04-2018', 'Tea expenses at the time of Hindi books purchase at karur - Gunasekaran P D', '180', 'Refreshment expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(341, 341, 'Other General Expenses', '21-04-2018', 'For XII th Std School reopening day pooja expenses - Choclate 5 Pockets', '425', 'Other Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(342, 342, 'Kidz School Expenses', '21-04-2018', 'For Annualday celeberation Radhakrishnan Shawl', '240', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(343, 343, 'Transport Expenses', '21-04-2018', 'Bus fare from 09.04.18 to 21.04.18 to Ayah V.Maheswari', '105', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(344, 344, 'Transport Expenses', '21-04-2018', 'Bus fare from 09.04.18 to 21.04.18 to Ayah S.Jeyammal', '97', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(345, 345, 'Transport Expenses', '21-04-2018', 'For 15.04.18 sunday holiday duty batta to Driver S.Palanisamy', '220', 'Drivers - Leave duty Salary', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(346, 346, 'CBSE Expenses', '21-04-2018', 'Compount wall work - tractor hire to Navaladi Earth Movers', '1000', 'CBSE Other Expenses', 'Cash', 'None', 'Public School', 0, ''),
(347, 347, 'Transport Expenses', '21-04-2018', 'For TN 28 P 0862 & TN 28 AB 3690 FC Work bill payment to Angalamman Body Builders', '29500', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(348, 348, 'Transport Expenses', '22-04-2018', 'Ch.No: 876274', '93863', 'Transport Diesel expenses', 'Bank', 'Indian Bank Current A/c-550811591', 'Malar Matric Hr Sec School', 0, ''),
(349, 349, 'Transport Expenses', '22-04-2018', 'Ch.No: 876275', '210514', 'Transport Diesel expenses', 'Bank', 'Indian Bank Current A/c-550811591', 'Malar Matric Hr Sec School', 0, ''),
(350, 350, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation Cello tape roll for gift packing', '20', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(351, 351, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation Cello tape roll for gift packing', '20', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(352, 352, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation Invitation printing charges', '1550', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(353, 353, 'Kidz School Expenses', '23-04-2018', 'Bus luggage charges for ID Cards from Erode', '50', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(354, 354, 'Kidz School Expenses', '23-04-2018', 'For Hand wash PVC Pipe', '60', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(355, 355, 'Kidz School Expenses', '23-04-2018', 'Annualday celeberation Badge printing charges', '920', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(356, 356, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation Block board decoration materials', '196', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(357, 357, 'Kidz School Expenses', '23-04-2018', 'Cleaning powder', '40', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(358, 358, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation - Extra security salary', '600', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(359, 359, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation - Cheif Guest Sweet', '600', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(360, 360, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation Reception table fruits', '293', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(361, 361, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation - Car parking area cleaning JCB hire', '800', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(362, 362, 'Kidz School Expenses', '23-04-2018', 'For Annualday celeberation Dinner - Idly', '70', 'Kidz function expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(363, 363, 'Kidz School Expenses', '23-04-2018', 'For March 2018', '390', 'Newspaper Subscription expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(364, 364, 'Kidz School Expenses', '23-04-2018', 'For AEEO Office papers xerox taken charges', '19', 'Kidz Xerox expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(365, 365, 'Other General Expenses', '23-04-2018', 'Vessels cleaning soap', '44', 'Other Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(366, 366, 'Transport Expenses', '23-04-2018', 'For TN 28 AB 3690 hand break as per bill', '2650', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(367, 367, 'Transport Expenses', '23-04-2018', 'For TN 88 Z 0106 Radiator bed welding work charges', '100', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(368, 368, 'Transport Expenses', '23-04-2018', 'For TN 28 Z 1103 Stearing Oil', '280', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(369, 369, 'Transport Expenses', '23-04-2018', '', '', 'School Regular Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(370, 370, 'Transport Expenses', '23-04-2018', 'For TN 28 AY 4858 Spares as per Bill', '1650', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(371, 371, 'Transport Expenses', '23-04-2018', 'For vehicles spares as per bill', '720', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(372, 372, 'Transport Expenses', '23-04-2018', 'For TN 28 P 0862 Crease as per Bill', '3865', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(373, 373, 'Transport Expenses', '23-04-2018', 'For TN 28 AB 3736 Oil, Crease', '1800', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(374, 374, 'CBSE Expenses', '23-04-2018', 'For Recharge', '150', 'Cell phone bill paid', 'Cash', 'None', 'Public School', 0, ''),
(375, 375, 'Transport Expenses', '23-04-2018', 'For went to Route No 8 Saw duty petrol charges to Driver S.Mani', '90', 'Bus fare , Tea & Food expenses at the time of went to workshop', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(376, 376, 'Transport Expenses', '23-04-2018', 'Bus fare for 6 days to Ayah C.Devaki', '140', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(377, 377, 'Transport Expenses', '23-04-2018', 'Bus fare for 2 days to Ayah P.Maragatham', '21', 'Transport - Bus fare to Driver, Cleaner & Ayahs', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(378, 378, 'Remittance', '23-04-2018', 'Cash Remittance', '55000', 'Cash Remittance', 'Cash', '', 'Malar Nursery & Primary School', 0, ''),
(379, 379, 'School Expenses', '24-04-2018', 'For went to Chennai DTCP Office clerk Chandrasekaran house marriage function - Train ticket fare', '1350', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(380, 380, 'Other General Expenses', '24-04-2018', 'For EB Metre Fuse service work EB office staff  Cool drinks', '1050', 'Other Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(381, 381, 'Donation Expenses', '25-04-2018', 'Donation for Scout flags from CEO', '500', 'Donation Expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(382, 382, 'Building Expenses', '25-04-2018', 'ADvance to Painter Sekar', '5000', 'Building Painting work labour charges', 'Cash', 'None', 'Other Expenses', 0, ''),
(383, 383, 'CBSE Expenses', '26-04-2018', 'For Website Designing work charges to K.Sivakumar', '15000', 'CBSE Other Expenses', 'Cash', 'None', 'Public School', 0, ''),
(384, 384, 'Transport Expenses', '26-04-2018', 'For TN 28 AB 3736 Lining & crease work charges', '1400', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(385, 385, 'Transport Expenses', '26-04-2018', 'For TN 28 P 0862 Oil Service work charges', '300', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(386, 386, 'Transport Expenses', '26-04-2018', 'For TN 28 AD 1748 Machanic work charges', '850', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(387, 387, 'Transport Expenses', '26-04-2018', 'For TN 28 AY 4858 Oil Service work charges', '200', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(388, 388, 'School Expenses', '26-04-2018', 'For WEnt to CEO Office - bus fare to Senthilraja', '48', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(389, 389, 'Transport Expenses', '27-04-2018', 'Quarter tax for 01.04.18 to 30.06.18 all vehicles', '52425', 'Transport Tax Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(390, 390, 'Transport Expenses', '27-04-2018', 'For TN 28 P 0862 & TN 28 AB 3690 FC Charges', '6000', 'Transport F C Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(391, 391, 'Transport Expenses', '27-04-2018', '23 Vehicles F C Stickers pasting charges', '230', 'Transport Repairs & Maintenance expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(393, 393, 'School Expenses', '27-04-2018', 'For Weekly pooja expenses', '1155', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(394, 394, 'School Expenses', '27-04-2018', 'For WEnt to Erode Audit office - bus fare to M.Senthilraja', '90', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(395, 395, 'Hostel Expenses', '27-04-2018', 'Advance for party payments', '200000', 'Mess Suprevisor Advance', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School', 0, ''),
(396, 396, 'School Salary Expenses', '28-04-2018', 'For March 2018 to Joint Secretary', '25000', 'Salary to E C Members', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(397, 397, 'Other General Expenses', '28-04-2018', 'Advance to Tailor Ganesh', '25000', 'Students uniform stitching charges paid', 'Cash', 'None', 'Other Expenses', 0, ''),
(398, 398, 'CBSE Expenses', '28-04-2018', 'For Mason charges & bus fare to mason ', '3660', 'CBSE Compound wall construction work expenses', 'Cash', 'None', 'Public School', 0, ''),
(399, 399, 'School Expenses', '28-04-2018', 'For courier to PF office tapal', '100', 'Postage & Courier expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(401, 401, 'Other General Expenses', '28-04-2018', 'For Directors meeting evening snacks paper plate', '70', 'Refreshment expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(402, 402, 'School Expenses', '28-04-2018', 'For X , XI XII th exam pooja - karkandu 1.500 Kg', '180', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(403, 403, 'School Expenses', '28-04-2018', 'For X , XI XII th exam pooja - Vettrilai pakku', '44', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(404, 404, 'Kidz School Expenses', '28-04-2018', 'Recognition renewal - Photos print taken charges', '840', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(405, 405, 'CBSE Expenses', '28-04-2018', 'Building approval work - DTCP clerk house marriage gift cover & Gift cover ( 1000 + 5000)', '6000', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(406, 406, 'CBSE Expenses', '28-04-2018', 'For went to Chennai DTCP Office clerk Chandrasekaran house marriage function - tea food expenses', '316', 'Building Approval Related work Expenses', 'Cash', 'None', 'Public School', 0, ''),
(407, 407, 'Transport Expenses', '28-04-2018', 'Vehicles - Fire Extinguisher refill charges', '4500', 'Transport - Other expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(408, 408, 'CBSE Expenses', '28-04-2018', 'Staff canvassing went - tea, snacks expenses', '510', 'Canvassing Expenses', 'Cash', 'None', 'Public School', 0, ''),
(409, 409, 'Transport Expenses', '28-04-2018', 'Deposit with ICICI Bank account', '1500', 'Transport Toll Ticket Charges', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(410, 410, 'School Expenses', '29-04-2018', 'For X , XI XII th exam pooja - Maalai, Kadambam', '7200', 'Pooja Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(411, 411, 'Remittance', '30-04-2018', 'Cash Remittance', '1000000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(412, 412, 'Remittance', '30-04-2018', 'Cash Remittance', '230000', 'Cash Remittance', 'Cash', '', 'Malar Matric Hr Sec School', 0, ''),
(413, 413, 'Remittance', '30-04-2018', 'Cash Remittance', '100000', 'Cash Remittance', 'Cash', '', 'Malar Nursery & Primary School', 0, ''),
(414, 414, 'Other General Expenses', '30-04-2018', 'Principal, Incharge persons sarees 6 Nos @ Rs.400', '2400', 'Staff Uniform Purchase', 'Cash', 'None', 'Other Expenses', 0, ''),
(415, 415, 'Kidz School Expenses', '30-04-2018', 'Auto hire for transporting Flex from Main School', '200', 'Kidz other expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(416, 416, 'Kidz School Expenses', '30-04-2018', 'For Electrical repair work labour charges', '120', 'Maruthi Omni Van Maintenance Expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(417, 417, 'School Expenses', '30-04-2018', 'For Went to Erode Audit office - bus, food expenses to M.Senthilraja', '120', 'Travelling Expenses', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(418, 418, 'Gift Expenses', '30-04-2018', 'To S.Charles Son, Daughter Nallenna vizha gift - 4 Gm Gold Coin', '12100', 'Gift expenses', 'Cash', 'None', 'Other Expenses', 0, ''),
(419, 419, 'Other General Expenses', '30-04-2018', 'For March 2018 through R M Narayanan A/c', '248', 'T D S on Advertisement Paid', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Other Expenses', 0, ''),
(420, 420, 'Other General Expenses', '30-04-2018', 'For March 2018 through R M Narayanan A/c', '36579', 'T D S On Salary Paid', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Other Expenses', 0, ''),
(421, 421, 'Remittance', '30-04-2018', 'Cash Remittance', '10000', 'Cash Remittance', 'Cash', '', 'Public School', 0, ''),
(459, 459, 'Mess Suprevisor A/c', '01-04-2018', '', '840', 'Mess Barotta Master Batta', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(460, 460, 'Payable Expenses', '01-04-2018', 'Mess Banana Sumathi', '385', 'Mess Supervisor A/C', 'Credit', '', 'Malar Matric Hr Sec School', 35, ''),
(477, 461, 'Transport Expenses', '06-02-2019', 'travel exp', '100', 'Travelling Expenses', 'Cash', 'None', 'Malar Nursery & Primary School', 0, ''),
(478, 478, 'School Expenses', '06-02-2019', 'notebook', '1500', 'Note book cover purchase payment', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(482, 482, 'loan from others', '01-04-2018', 'loan return to subbaiyan', '300000', 'Loan from others -03 R.Subbaiyan', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(484, 484, 'Mess Expenses', '01-04-2018', 'Mess Supervisor Advance amount', '20000', 'Mess Supervisor Advance', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(486, 486, 'Mess Expenses', '01-04-2018', '', '5000', 'Mess Supervisor Advance', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(487, 487, 'Mess Supervisor A/C', '31-03-2018', 'Closing Balance', '2901', 'Mess Supervisor Advance', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(488, 488, 'Mess Supervisor A/C', '01-04-2018', '', '5000', 'Mess Supervisor Advance', 'Cash', 'None', 'Malar Matric Hr Sec School', 0, ''),
(489, 489, 'School Expenses', '12-06-2019', 'rent', '500', 'School Regular Expenses', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School', 0, '');

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

--
-- Dumping data for table `expensepending`
--

INSERT INTO `expensepending` (`id`, `pending_id`, `catagory_name`, `date`, `description`, `amount`, `subcatagory`, `status`, `trans`, `bank`, `school`, `paidamount`) VALUES
(1, 1, 'Payable Expense A/C', '31-03-2018', 'Sri Ramana Printers', '6000', 'Advertisement expenses', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(25, 25, 'Payable Expense A/C', '31-03-2018', 'Salem Handloom Stores ( Babu)', '13938', 'Salem Handloom Stores ( Babu)', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(26, 26, 'Payable Expense A/C', '31-03-2018', 'Scawengers Salary Deposit', '40000', 'Scawengers Salary Deposit', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(27, 27, 'Payable Expense A/C', '31-03-2018', 'TATA  AIG Insurance - L.Sowmiya IX', '117900', 'TATA AIG Insurance - L.Sowmiya IX', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(28, 28, 'Payable Expense A/C', '31-03-2018', 'TATA AIG Insurance - P.Rithika XI', '95900', 'TATA AIG Insurance - P.Rithika XI', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(29, 29, 'Payable Expense A/C', '31-03-2018', 'Golden Scientific Suppliers', '38260', 'Golden Scientific Suppliers', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(30, 30, 'Payable Expense A/C', '31-03-2018', 'Mercury Scientific Company', '8836', 'Mercury Scientific Company', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(31, 31, 'Payable Expense A/C', '31-03-2018', 'R T E Act Amount', '8400', 'R T E Act Amount', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(32, 32, 'Payable Expense A/C', '31-03-2018', 'The Brothers Educational Union', '2457', 'The Brothers Educational Union', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(33, 33, 'Payable Expense A/C', '31-03-2018', 'Veno Agencies', '28200', 'Veno Agencies', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(34, 34, 'Payable Expense A/C', '31-03-2018', 'Stores Navaladi Maligai', '2797', 'Stores Navaladi Maligai', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(39, 35, 'Payable Expense A/C', '01-04-2018', 'Mess Banana Sumathi', '385', 'Mess Supervisor A/C', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0'),
(40, 40, 'Transport Expenses', '05-02-2019', 'Amman Agencies', '5000', 'Transport Tax Expenses', 'Pending', 'Credit', '', 'Malar Matric Hr Sec School', '0');

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

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`in_id`, `income_id`, `catagory_name`, `date`, `description`, `amount`, `subcatagory`, `trans`, `bank`, `school`) VALUES
(1, 1, 'School Receipts', '31-03-2018', 'Closing Balance', '1618886', 'Closing Balance', 'Cash', '', 'Malar Matric Hr Sec School'),
(2, 2, 'School Receipts', '02-04-2018', '', '5000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(3, 3, 'School Receipts', '02-04-2018', '', '21000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(4, 4, 'Transport Receipts', '02-04-2018', '', '4300', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(5, 5, 'Transport Receipts', '02-04-2018', '', '1700', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(6, 6, 'Hostel Receipts', '02-04-2018', '', '19900', '2017-18 Hostel Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(7, 7, 'Hostel Receipts', '02-04-2018', '', '59300', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(8, 8, 'Kidz School Receipts', '02-04-2018', '', '13000', '2017 - 18 Tuition Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(9, 9, 'Neet Class Fee', '02-04-2018', '', '10000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(10, 10, 'Neet Class Fee', '03-04-2018', '', '29000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(11, 11, 'School Receipts', '04-04-2018', '', '14500', '2017-18 Tution Fee I Term', 'Cash', '', ''),
(12, 12, 'School Receipts', '04-04-2018', '', '61100', '2017-18 Tuition Fee II Term', 'Cash', '', ''),
(13, 13, 'Transport Receipts', '04-04-2018', '', '21450', '2017-18 Van Fee I Term', 'Cash', '', ''),
(14, 14, 'Transport Receipts', '04-04-2018', '', '9100', '2017-18 Van Fee II Term', 'Cash', '', ''),
(15, 15, 'Hostel Receipts', '04-04-2018', '', '10400', '2017-18 Hostel Fee II Term', 'Cash', '', ''),
(16, 16, 'Kidz School Receipts', '04-04-2018', '', '6000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Nursery & Primary School'),
(17, 17, 'Girls Hostel Store Receipt', '05-04-2018', '', '2192', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(18, 18, 'Girls Hostel Store Receipt', '05-04-2018', '', '308', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(19, 19, 'Hostel Receipts', '05-04-2018', '', '1140', 'Sale of Lunch Token', 'Cash', '', 'Malar Matric Hr Sec School'),
(20, 20, 'Neet Class Fee', '05-04-2018', '', '73000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(21, 21, 'School Receipts', '05-04-2018', '', '25500', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(22, 22, 'School Receipts', '05-04-2018', '', '43000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(23, 23, 'Transport Receipts', '05-04-2018', '', '14500', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(24, 24, 'Transport Receipts', '05-04-2018', '', '9100', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(25, 25, 'School Receipts', '05-04-2018', '', '300', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(26, 26, 'CBSE School Receipts', '05-04-2018', '', '8000', 'Admission Fee', 'Cash', '', 'Public School'),
(27, 27, 'Kidz School Receipts', '05-04-2018', '', '8000', '2017 - 18 Tuition Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(28, 28, 'Kidz School Receipts', '05-04-2018', '', '5000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(29, 29, 'School Receipts', '06-04-2018', '', '43000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(31, 31, 'Transport Receipts', '06-04-2018', '', '3400', '2018-19 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(32, 32, 'Transport Receipts', '06-04-2018', '', '5000', '2018-19 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(35, 35, 'Neet Class Fee', '06-04-2018', '', '112000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(36, 36, 'Hostel Receipts', '07-04-2018', '', '400', 'Sale of Ghee', 'Cash', '', 'Malar Matric Hr Sec School'),
(37, 37, 'Store Receipts', '07-04-2018', '', '489', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(38, 38, 'Store Receipts', '07-04-2018', '', '3011', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(39, 39, 'Hostel Receipts', '07-04-2018', '', '550', 'Sale of Lunch Token', 'Cash', '', 'Malar Matric Hr Sec School'),
(40, 40, 'Neet Class Fee', '07-04-2018', '', '30000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(41, 41, 'Other Receipts', '07-04-2018', 'From Agri R.Subramani', '2000', 'Salary Advance', 'Cash', '', 'Other Receipts'),
(42, 42, 'School Receipts', '07-04-2018', '', '18050', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(43, 43, 'School Receipts', '07-04-2018', '', '71100', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(44, 44, 'Transport Receipts', '07-04-2018', '', '16000', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(45, 45, 'Transport Receipts', '07-04-2018', '', '15100', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(46, 46, 'Hostel Receipts', '07-04-2018', '', '7500', '2017-18 Hostel Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(47, 47, 'Hostel Receipts', '07-04-2018', '', '4500', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(48, 48, 'School Receipts', '07-04-2018', '', '600', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(49, 49, 'School Receipts', '07-04-2018', '', '500', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(50, 50, 'Other Receipts', '07-04-2018', 'For March 2018', '68662', 'P F Recovery', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School'),
(51, 51, 'Other Receipts', '07-04-2018', 'For March 2018', '24075', 'T D S Recovery', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Other Receipts'),
(52, 52, 'Other Receipts', '07-04-2018', 'For March 2018', '4780', 'T D S Recovery', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601584 (N P)', 'Other Receipts'),
(53, 53, 'Other Receipts', '07-04-2018', 'For March 2018', '6982', 'P F Recovery', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601584 (N P)', 'Other Receipts'),
(54, 54, 'Other Receipts', '07-04-2018', 'For March 2018', '1375', 'P F Recovery', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933601596(Public)', 'Other Receipts'),
(55, 55, 'Store Receipts', '09-04-2018', '', '595', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(56, 56, 'Store Receipts', '09-04-2018', '', '1205', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(57, 57, 'Hostel Receipts', '09-04-2018', '', '480', 'Sale of Lunch Token', 'Cash', '', 'Malar Matric Hr Sec School'),
(58, 58, 'Kidz School Receipts', '09-04-2018', '', '5000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Nursery & Primary School'),
(59, 59, 'Kidz School Receipts', '09-04-2018', '', '1400', 'Kidz Lunch Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(60, 60, 'Kidz School Receipts', '09-04-2018', 'From 145 students @ Rs.100', '14500', 'Kidz Group Photo Money collection', 'Cash', '', 'Malar Nursery & Primary School'),
(61, 61, 'Neet Class Fee', '09-04-2018', '', '145900', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(62, 62, 'School Receipts', '09-04-2018', '', '3500', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(63, 63, 'School Receipts', '09-04-2018', '', '45500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(64, 64, 'Transport Receipts', '09-04-2018', '', '12300', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(65, 65, 'Transport Receipts', '09-04-2018', '', '7200', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(68, 68, 'Neet Class Fee', '10-04-2018', '', '48000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(69, 69, 'Hostel Receipts', '10-04-2018', 'For 3 Kg @ RS.200', '600', 'Sale of Ghee', 'Cash', '', 'Malar Matric Hr Sec School'),
(70, 70, 'Kidz School Receipts', '10-04-2018', '', '1000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(71, 71, 'Kidz School Receipts', '10-04-2018', 'From 15 students @ RS.100', '1500', 'Kidz Group Photo Money collection', 'Cash', '', 'Malar Nursery & Primary School'),
(72, 72, 'School Receipts', '10-04-2018', '', '7500', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(73, 73, 'School Receipts', '10-04-2018', '', '14500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(74, 74, 'Transport Receipts', '10-04-2018', '', '2000', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(75, 75, 'Hostel Receipts', '10-04-2018', '', '2000', '2017-18 Hostel Fee II Term', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School'),
(76, 76, 'Girls Hostel Store Receipt', '11-04-2018', '', '3050', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(77, 77, 'Girls Hostel Store Receipt', '11-04-2018', '', '2200', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(78, 78, 'Neet Class Fee', '11-04-2018', '', '35000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(79, 79, 'Transport Receipts', '11-04-2018', 'Omni Van Door repair through accident - from Driver N.Palaniappan', '2000', 'Penalty from Drivers', 'Cash', '', 'Malar Matric Hr Sec School'),
(80, 80, 'School Receipts', '11-04-2018', '', '31500', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(81, 81, 'School Receipts', '11-04-2018', '', '60000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(82, 82, 'Transport Receipts', '11-04-2018', '', '22500', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(83, 83, 'Transport Receipts', '11-04-2018', '', '15200', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(84, 84, 'Hostel Receipts', '11-04-2018', '', '6500', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(85, 85, 'Other Receipts', '12-04-2018', '', '8000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Malar Matric Hr Sec School'),
(86, 86, 'Other Receipts', '12-04-2018', 'From S.Kavitha', '1200', 'Salary Advance', 'Cash', '', 'Other Receipts'),
(87, 87, 'School Receipts', '12-04-2018', '', '21000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(88, 88, 'School Receipts', '12-04-2018', '', '77300', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(89, 89, 'Transport Receipts', '12-04-2018', '', '9500', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(90, 90, 'Transport Receipts', '12-04-2018', '', '20500', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Nursery & Primary School'),
(91, 91, 'Hostel Receipts', '12-04-2018', '', '57000', '2017-18 Hostel Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(92, 92, 'Hostel Receipts', '12-04-2018', '', '14000', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(93, 93, 'School Receipts', '12-04-2018', '', '900', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(94, 94, 'School Receipts', '12-04-2018', '', '500', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(95, 95, 'CBSE School Receipts', '12-04-2018', '', '6000', 'Admission Fee', 'Cash', '', 'Public School'),
(96, 96, 'School Receipts', '13-04-2018', '', '6000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(97, 97, 'School Receipts', '13-04-2018', '', '26000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(98, 98, 'Transport Receipts', '13-04-2018', '', '11700', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(99, 99, 'Transport Receipts', '13-04-2018', '', '9800', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(100, 100, 'Hostel Receipts', '13-04-2018', '', '27000', '2017-18 Hostel Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(101, 101, 'Hostel Receipts', '13-04-2018', '', '13000', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(102, 102, 'School Receipts', '13-04-2018', '', '300', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(103, 103, 'Kidz School Receipts', '13-04-2018', '', '15000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Nursery & Primary School'),
(104, 104, 'Kidz School Receipts', '13-04-2018', '', '2000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(105, 105, 'Kidz School Receipts', '13-04-2018', '', '100', 'Kidz Group Photo Money collection', 'Cash', '', 'Malar Nursery & Primary School'),
(106, 106, 'Neet Class Fee', '13-04-2018', 'For Hostel fee from Gabrial hoseadoss XII', '1200', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(107, 107, 'Store Receipts', '16-04-2018', '', '560', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(108, 108, 'Store Receipts', '16-04-2018', '', '3790', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(109, 109, 'Hostel Receipts', '16-04-2018', '', '1400', 'Sale of Lunch Token', 'Cash', '', 'Malar Matric Hr Sec School'),
(110, 110, 'Neet Class Fee', '16-04-2018', '', '6000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(111, 111, 'School Receipts', '16-04-2018', '', '12000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(112, 112, 'School Receipts', '16-04-2018', '', '52500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(113, 113, 'Transport Receipts', '16-04-2018', '', '5500', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(114, 114, 'Transport Receipts', '16-04-2018', '', '9400', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(115, 115, 'Neet Class Fee', '16-04-2018', '', '5000', '2017-18 Neet Class Fee', 'Cash', '', 'Other Expenses'),
(116, 116, 'Girls Hostel Store Receipt', '17-04-2018', '', '1876', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(117, 117, 'Store Receipts', '17-04-2018', '', '1174', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(118, 118, 'Neet Class Fee', '17-04-2018', '', '8000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(119, 119, 'School Receipts', '17-04-2018', '', '5000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(120, 120, 'Transport Receipts', '17-04-2018', '', '2500', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(121, 121, 'Transport Receipts', '17-04-2018', '', '3500', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(122, 122, 'Kidz School Receipts', '17-04-2018', '', '5000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(123, 123, 'Girls Hostel Store Receipt', '18-04-2018', '', '636', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(124, 124, 'Girls Hostel Store Receipt', '18-04-2018', '', '464', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(125, 125, 'Store Receipts', '18-04-2018', '', '160', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(126, 126, 'Store Receipts', '18-04-2018', '', '1540', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(127, 127, 'Hostel Receipts', '18-04-2018', '', '950', 'Sale of Lunch Token', 'Cash', '', 'Malar Matric Hr Sec School'),
(128, 128, 'School Receipts', '18-04-2018', '', '14500', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(129, 129, 'School Receipts', '18-04-2018', '', '500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(130, 130, 'Transport Receipts', '18-04-2018', '', '300', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(131, 131, 'Hostel Receipts', '18-04-2018', '', '1800', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(132, 132, 'School Receipts', '18-04-2018', '', '900', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(133, 133, 'School Receipts', '18-04-2018', '', '2900', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(134, 134, 'Store Receipts', '19-04-2018', '', '380', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(135, 135, 'Store Receipts', '19-04-2018', '', '1220', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(136, 136, 'Hostel Receipts', '19-04-2018', '', '320', 'Sale of Lunch Token', 'Cash', '', 'Malar Matric Hr Sec School'),
(137, 137, 'CBSE School Receipts', '19-04-2018', '', '10000', 'Admission Fee', 'Cash', '', 'Public School'),
(138, 138, 'School Receipts', '19-04-2018', '', '35000', '2016-17 Tuition Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(139, 139, 'Transport Receipts', '19-04-2018', '', '8000', '2016-17 Van Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(140, 140, 'School Receipts', '19-04-2018', '', '77800', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(141, 141, 'School Receipts', '19-04-2018', '', '87250', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(142, 142, 'Transport Receipts', '19-04-2018', '', '14800', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(143, 143, 'Transport Receipts', '19-04-2018', '', '7660', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(144, 144, 'Hostel Receipts', '19-04-2018', '', '44000', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(145, 145, 'Kidz School Receipts', '19-04-2018', '', '5500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Nursery & Primary School'),
(146, 146, 'Kidz School Receipts', '19-04-2018', '', '13000', '2018-19 Tuition Fee I Term', 'Cash', '', 'Malar Nursery & Primary School'),
(147, 147, 'Kidz School Receipts', '19-04-2018', '', '3000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(148, 148, 'Neet Class Fee', '29-01-2019', '', '8000', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(149, 149, 'Garden Income', '20-04-2018', 'Sale of Kothavarai 12 Kg @ RS.40', '480', 'Garden Income', 'Cash', '', 'Other Receipts'),
(150, 150, 'School Receipts', '20-04-2018', '', '1500', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(151, 151, 'School Receipts', '20-04-2018', '', '52000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(152, 152, 'Transport Receipts', '20-04-2018', '', '14720', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(153, 153, 'Transport Receipts', '20-04-2018', '', '6300', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(154, 154, 'Hostel Receipts', '20-04-2018', '', '58000', '2017-18 Hostel Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(155, 155, 'Hostel Receipts', '20-04-2018', '', '54500', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(156, 156, 'Neet Class Fee', '20-04-2018', '', '2500', 'Neet Summer Carash Course Fee Received', 'Cash', '', 'Other Receipts'),
(157, 157, 'Kidz School Receipts', '20-04-2018', '', '1000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(158, 158, 'School Receipts', '21-04-2018', '', '37200', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(159, 159, 'Transport Receipts', '21-04-2018', '', '7000', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(160, 160, 'Transport Receipts', '21-04-2018', '', '11000', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(162, 162, 'Kidz School Receipts', '21-04-2018', '', '1300', '2018-19 Tuition Fee I Term', 'Cash', '', 'Malar Nursery & Primary School'),
(163, 163, 'Kidz School Receipts', '21-04-2018', '', '6700', 'Kidz Book & Notebook Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(164, 164, 'Kidz School Receipts', '21-04-2018', '', '2000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(165, 165, 'School Receipts', '22-04-2018', '', '3000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(166, 166, 'School Receipts', '22-04-2018', '', '1300', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(167, 167, 'School Receipts', '22-04-2018', '', '1500', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(168, 168, 'Uniform Fee Receipt', '22-04-2018', '', '2440', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(169, 169, 'CBSE School Receipts', '22-04-2018', '', '7000', 'Book Fee', 'Cash', '', 'Public School'),
(170, 170, 'CBSE School Receipts', '22-04-2018', '', '20000', 'Facility fee', 'Cash', '', 'Public School'),
(171, 171, 'CBSE School Receipts', '22-04-2018', '', '28000', '2018-19 Tuition Fee I Term', 'Cash', '', 'Public School'),
(172, 172, 'School Receipts', '23-04-2018', '', '19450', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(173, 173, 'School Receipts', '23-04-2018', '', '16500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(174, 174, 'Transport Receipts', '23-04-2018', '', '11800', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(175, 175, 'Transport Receipts', '23-04-2018', '', '3000', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(176, 176, 'School Receipts', '23-04-2018', '', '300', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(177, 177, 'School Receipts', '23-04-2018', '', '200', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(178, 178, 'Hostel Receipts', '23-04-2018', '', '500', 'Hostel Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(179, 179, 'Uniform Fee Receipt', '23-04-2018', '', '7520', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(180, 180, 'Book Fee Receipt', '23-04-2018', 'For X std books 2 sets from Store', '1320', 'Book Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(181, 181, 'Kidz School Receipts', '23-04-2018', '', '3900', '2018-19 Tuition Fee I Term', 'Cash', '', 'Malar Nursery & Primary School'),
(182, 182, 'Kidz School Receipts', '23-04-2018', '', '2000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(183, 183, 'Kidz School Receipts', '23-04-2018', '', '2100', 'Kidz Book & Notebook Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(184, 184, 'Uniform Fee Receipt', '24-04-2018', '', '1380', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(185, 185, 'School Receipts', '24-04-2018', '', '300', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(186, 186, 'School Receipts', '24-04-2018', '', '24700', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(187, 187, 'Transport Receipts', '24-04-2018', '', '2800', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(188, 188, 'School Receipts', '25-04-2018', '', '4000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(189, 189, 'School Receipts', '23-04-2018', '', '21000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(190, 190, 'Transport Receipts', '25-04-2018', '', '12500', '2018-19 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(191, 191, 'Transport Receipts', '25-04-2018', '', '5300', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(192, 192, 'Hostel Receipts', '25-04-2018', '', '5000', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(193, 193, 'School Receipts', '24-04-2018', '', '10000', '2018-19 Tuition Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(194, 194, 'School Receipts', '25-04-2018', '', '2100', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(195, 195, 'School Receipts', '25-04-2018', '', '2200', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(196, 196, 'Uniform Fee Receipt', '25-04-2018', '', '10630', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(197, 197, 'Kidz School Receipts', '25-04-2018', '', '5000', '2018-19 Tuition Fee I Term', 'Cash', '', 'Malar Nursery & Primary School'),
(198, 198, 'Kidz School Receipts', '25-04-2018', '', '1000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(199, 199, 'School Receipts', '26-04-2018', '', '18500', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(200, 200, 'School Receipts', '26-04-2018', '', '27500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(201, 201, 'Transport Receipts', '26-04-2018', '', '12800', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(202, 202, 'Transport Receipts', '26-04-2018', '', '7800', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(203, 203, 'School Receipts', '26-04-2018', '', '600', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(204, 204, 'School Receipts', '26-04-2018', '', '200', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(205, 205, 'Hostel Receipts', '26-04-2018', '', '500', 'Hostel Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(206, 206, 'Hostel Receipts', '26-04-2018', '', '2000', 'Hostel Deposit', 'Cash', '', 'Malar Matric Hr Sec School'),
(207, 207, 'Uniform Fee Receipt', '26-04-2018', '', '4090', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(208, 208, 'CBSE School Receipts', '26-04-2018', '', '9100', 'Uniform Fee', 'Cash', '', 'Public School'),
(209, 209, 'Uniform Fee Receipt', '26-04-2018', 'Bit sales', '1022', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(210, 210, 'Girls Hostel Store Receipt', '26-04-2018', '', '2312', 'Sale of Store Stationeries', 'Cash', '', 'Malar Matric Hr Sec School'),
(211, 211, 'Girls Hostel Store Receipt', '26-04-2018', '', '538', 'Sale of Snacks', 'Cash', '', 'Malar Matric Hr Sec School'),
(212, 212, 'Hostel Receipts', '26-04-2018', '', '1450', 'Sale of Lunch Token', 'Cash', '', 'Malar Matric Hr Sec School'),
(213, 213, 'School Receipts', '27-04-2018', '', '5000', '2018-19 Tuition Fee I Term', 'Cash', '', ''),
(214, 214, 'School Receipts', '27-04-2018', '', '1800', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(215, 215, 'School Receipts', '27-04-2018', '', '4600', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(216, 216, 'School Receipts', '27-04-2018', '', '13000', '2017-18 Tution Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(217, 217, 'School Receipts', '27-04-2018', '', '4000', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(218, 218, 'Transport Receipts', '27-04-2018', '', '3100', '2017-18 Van Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(219, 219, 'Transport Receipts', '27-04-2018', '', '2500', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(220, 220, 'Uniform Fee Receipt', '27-04-2018', '', '9430', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(221, 221, 'CBSE School Receipts', '27-04-2018', '', '9000', 'Admission Fee', 'Cash', '', 'Public School'),
(222, 222, 'CBSE School Receipts', '27-04-2018', '', '12380', 'Uniform Fee', 'Cash', '', 'Public School'),
(224, 224, 'School Receipts', '28-04-2018', '', '7700', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(225, 225, 'Transport Receipts', '28-04-2018', '', '2800', '2017-18 Van Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(226, 226, 'School Receipts', '28-04-2018', '', '600', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(227, 227, 'School Receipts', '28-04-2018', '', '400', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(228, 228, 'Uniform Fee Receipt', '28-04-2018', '', '4590', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(229, 229, 'Kidz School Receipts', '28-04-2018', '', '1000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(230, 230, 'CBSE School Receipts', '28-04-2018', '', '10000', '2018-19 Tuition Fee I Term', 'Cash', '', 'Public School'),
(231, 231, 'CBSE School Receipts', '28-04-2018', '', '7110', 'Uniform Fee', 'Cash', '', 'Public School'),
(232, 232, 'School Receipts', '29-04-2018', '', '13000', '2018-19 Tuition Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(233, 233, 'School Receipts', '29-04-2018', '', '300', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(234, 234, 'School Receipts', '29-04-2018', '', '1700', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(235, 235, 'Uniform Fee Receipt', '29-04-2018', '', '4760', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(236, 236, 'School Receipts', '30-04-2018', '', '11525', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(237, 237, 'School Receipts', '30-04-2018', '', '600', 'Registration Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(238, 238, 'Uniform Fee Receipt', '30-04-2018', '', '4560', 'Uniform Fee', 'Cash', '', 'Other Receipts'),
(239, 239, 'Kidz School Receipts', '30-04-2018', '', '2000', 'Admission Fee', 'Cash', '', 'Malar Nursery & Primary School'),
(240, 240, 'CBSE School Receipts', '30-04-2018', '', '4500', 'Admission Fee', 'Cash', '', 'Public School'),
(241, 241, 'CBSE School Receipts', '30-04-2018', '', '1140', 'Uniform Fee', 'Cash', '', 'Public School'),
(242, 242, 'Loan from Others', '30-04-2018', 'Loan from N.Kangagaraj', '1000000', 'Loan from Others', 'Cash', '', 'Other Receipts'),
(243, 243, 'School Receipts', '06-04-2018', '', '37500', '2017-18 Tuition Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(244, 244, 'School Receipts', '06-04-2018', '', '18000', '2017-18 Tuition Fee II Term', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School'),
(245, 245, 'Hostel Receipts', '06-04-2018', '', '45000', '2017-18 Hostel Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(246, 246, 'Hostel Receipts', '06-04-2018', '', '19000', '2017-18 Hostel Fee I Term', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School'),
(247, 247, 'Hostel Receipts', '06-04-2018', '', '48000', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(248, 248, 'Hostel Receipts', '06-04-2018', '', '12000', '2017-18 Hostel Fee II Term', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School'),
(249, 249, 'School Receipts', '06-04-2018', '', '500', 'Admission Fee', 'Cash', '', 'Malar Matric Hr Sec School'),
(250, 250, 'Hostel Receipts', '09-04-2018', '', '1000', '2017-18 Hostel Fee I Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(251, 251, 'Hostel Receipts', '09-04-2018', '', '11600', '2017-18 Hostel Fee II Term', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School'),
(252, 252, 'Hostel Receipts', '09-04-2018', '', '5600', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(253, 253, 'Hostel Receipts', '09-04-2018', '', '13400', '2017-18 Hostel Fee II Term', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School'),
(254, 254, 'Hostel Receipts', '21-04-2018', '', '16500', '2017-18 Hostel Fee II Term', 'Cash', '', 'Malar Matric Hr Sec School'),
(255, 255, 'Hostel Receipts', '21-04-2018', '', '14000', '2017-18 Hostel Fee II Term', 'Bank', 'State Bank Of India Current A/c-30970042760', 'Malar Matric Hr Sec School'),
(256, 256, 'Mess Supervisor A/C', '31-03-2018', 'Balance Amount', '2901', 'Mess Supervisor Advance', 'Cash', '', 'Malar Matric Hr Sec School'),
(257, 257, 'Other Receipts', '12-06-2019', 'rent', '5000', '2018-19 Tuition Fee I Term', 'Bank', 'Lakshmi Vilas Bank Current A/c-7933511571', 'Malar Matric Hr Sec School');

-- --------------------------------------------------------

--
-- Table structure for table `incomesubcatagory`
--

CREATE TABLE `incomesubcatagory` (
  `id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomesubcatagory`
--

INSERT INTO `incomesubcatagory` (`id`, `catagory_name`) VALUES
(1, '2018-19 Tuition Fee I Term'),
(2, '2018-19 Tuition Fee II Term'),
(3, '2017 - 18 Tuition Fee'),
(4, '2017-18 Van Fee'),
(5, '2018-19 Van Fee I Term'),
(6, '2018-19 Van Fee II Term'),
(7, '2018-19 Hostel Fee I Term'),
(8, '2018-19 Hostel Fee II Term'),
(9, 'Sale of Snacks'),
(10, 'Sale of Store Stationeries'),
(11, 'Profit on Sale of Samosha'),
(13, 'Sale of Ghee'),
(14, 'Sale of Waste Food'),
(15, '2017-18 Hostel Fee'),
(16, 'Sale of Lunch Token'),
(18, 'Sale of Snacks Token'),
(19, 'Students The Hindu Newspaper Subscription'),
(20, 'Uniform Fee'),
(21, 'Interest on Bank Account'),
(22, 'Chess Class Fee'),
(24, 'Staff Uniform Advance recover'),
(25, 'Salary Advance '),
(26, 'TATA AIG Insurance Claim Received'),
(27, 'Book Fee'),
(28, 'Sale of Recharge Card'),
(29, 'Uniform sales'),
(30, 'Unified Council Exam Fee Received'),
(31, 'French Class Fee Received'),
(32, '2018-19 Neet Class Fee Received'),
(34, 'Hostel Admission Fee'),
(35, 'Hostel Deposit'),
(36, 'Extra Curricular Activity Fee'),
(39, 'Loan from Others'),
(40, 'Salary Return'),
(41, 'State Bank Of India Current A/c-30970042760'),
(42, 'Transport Insurance Premium Discount Received'),
(43, '2018-19 Facility Fee'),
(45, 'Book Sales'),
(46, '2018-19 Neet Class Fee'),
(47, 'T C Issue Fee'),
(49, 'Xth TC Issue Fee'),
(50, 'Lakshmi Vilas Bank Current A/c-7933511571'),
(51, 'P F Recovery'),
(52, 'Opening Balance'),
(53, 'Closing Balance'),
(54, 'X th std Exam Fee'),
(56, 'XII th std Exam Fee '),
(57, 'XI th std Exam Fee'),
(59, 'Neet class Books Fee Received'),
(60, 'National Talent Expo Exam fee received'),
(61, 'Facility fee'),
(62, 'Students Duplicate I D Card fee'),
(63, 'Admission Fee'),
(64, '2017-18 Neet Class Fee'),
(65, 'Dayscholar students Snacks, Dinner Token sales'),
(66, '2017-18 Tution Fee I Term'),
(67, '2017-18 Tuition Fee II Term'),
(68, '2017-18 Van Fee I Term'),
(69, '2017-18 Van Fee II Term'),
(70, '2017-18 Hostel Fee I Term'),
(71, '2017-18 Hostel Fee II Term'),
(72, 'Neet Summer Carash Course Fee Received'),
(73, 'Registration Fee'),
(74, 'T D S Recovery'),
(75, 'Kidz Lunch Fee'),
(76, 'Kidz Group Photo Money collection'),
(77, 'Penalty from Drivers'),
(78, '2016-17 Tuition Fee'),
(79, '2016-17 Van Fee'),
(80, 'Garden Income'),
(81, 'Kidz Book & Notebook Fee'),
(82, 'Mess Supervisor Advance');

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
-- Table structure for table `print`
--

CREATE TABLE `print` (
  `id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `print`
--

INSERT INTO `print` (`id`, `catagory_name`) VALUES
(3, 'School Expenses'),
(4, 'Transport Expenses'),
(5, 'Hostel Expenses'),
(6, 'Store Expenses'),
(7, 'Kidz School Expenses'),
(8, 'CBSE Expenses'),
(9, 'Building Expenses'),
(10, 'Civil Maintenance Expenses'),
(11, 'Asset Expenses'),
(12, 'Electrical Repair & Maintenance expenses'),
(13, 'Book Purchase & Expenses'),
(14, 'Note Book Purchase expenses'),
(15, 'Garden Expenses'),
(16, 'Neet Class Expenses'),
(17, 'Advertisement expenses'),
(18, 'Uniform expenses'),
(19, 'Function Expenses'),
(20, 'Donation Expenses'),
(21, 'Gift Expenses'),
(22, 'Pooja Expenses'),
(23, 'Exam Fee Expenses'),
(24, 'Incentive Expenses'),
(25, 'Coin Phone expenses'),
(26, 'Exam Expenses'),
(27, 'Other General Expenses'),
(28, 'Mess Expenses'),
(29, 'Function Expenses'),
(30, 'Girls Hostel Store Expenses'),
(31, 'Bank Remittance'),
(32, 'Kidz School Transport Expenses'),
(33, 'Salary Expenses'),
(34, 'School Salary Expenses'),
(35, 'Transport - Salary expenses'),
(36, 'Kidz school Salary Expenses'),
(37, 'CBSE School Salary Expenses'),
(38, 'Hostel Salary Expenses'),
(39, 'Store Salary Expenses'),
(41, 'Girls hostel store salary expenses'),
(42, 'xerox maintenance expenses'),
(43, 'NEET Foundation course expenses'),
(44, 'loan from others '),
(45, 'School Fee Return'),
(46, 'Hostel fee Return'),
(47, 'Van Fee Return'),
(48, 'Gift Expenses'),
(49, 'Neet Class taken charges paid'),
(50, 'TATA AIG Insurance Claim Refund'),
(51, 'TATA AIG Insurance Claim Refund'),
(52, 'Payable Expenses'),
(53, 'Bank Transactions'),
(54, 'Travelling Expenses'),
(55, 'Vehicle Loan'),
(56, 'Store Salary Expenses'),
(57, 'Remittance'),
(58, 'Vehicle Loan- Principal'),
(59, 'Vehicle Loan- Interest'),
(60, 'Girls Hostel Purchase - Consumables(Stationeries)'),
(61, 'Girls Hostel Store Purchase - Consumables'),
(62, 'Mess Supervisor A/C');

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
  `qty_left` int(10) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date_delivered` varchar(20) DEFAULT NULL,
  `expiration_date` varchar(20) DEFAULT NULL,
  `ttype` int(250) DEFAULT NULL,
  `cgst` varchar(250) DEFAULT NULL,
  `sgst` varchar(250) DEFAULT NULL,
  `igst` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `description_name`, `unit`, `cost`, `price`, `mrp`, `supplier`, `qty_left`, `category`, `date_delivered`, `expiration_date`, `ttype`, `cgst`, `sgst`, `igst`) VALUES
(3, 'P-80230632', 'Egg', '', 'Per Nos', '', '5', '', NULL, 96, 'Dealer', '', '', 0, '2', '2', '0');

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
  `igstamt` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseform`
--

INSERT INTO `purchaseform` (`id`, `invoice`, `date`, `student`, `product`, `price`, `qty`, `amount`, `cgst`, `tamount`, `discount`, `total_amount`, `sgst`, `igst`, `cgstamt`, `sgstamt`, `igstamt`) VALUES
(1, 'PR-49226232', '10-07-2019', 'Madesh', 'P-80230632', '5', '1', '5', '2', '5.3', '0', '5.3', '2', '2', '0.1', '0.1', '0.1'),
(2, 'PR-90022292', '05-08-2019', 'Madesh', 'P-80230632', '5', '1', '5', '2', '5.2', '0', '5.2', '2', '0', '0.1', '0.1', '0');

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

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date_order`, `suplier`, `date_deliver`, `p_name`, `qty`, `cost`, `remark`, `stinno`, `vatper`, `amount`, `vat`, `total_amount`, `pay_date`, `d_status`) VALUES
(1, 'PO-302340', '11-06-2019', 'Amman Agencies', '', 'P-0720232', '1', '475', '', '<br />\r\n<b>Notice</b>:  Undefined index: tinno in <b>C:\\xampp\\htdocs\\mahendra\\pages\\purchase.php</b> on line <b>81</b><br />\r\n', '5', '475', '25', '500', '', 'Pending'),
(2, 'PO-22323533', '13-06-2019', 'Amman Agencies', '2019-06-14', 'P-0720232', '1', '475', '', '<br />\r\n<b>Notice</b>:  Undefined index: tinno in <b>C:\\xampp\\htdocs\\mahendra\\pages\\purchase.php</b> on line <b>81</b><br />\r\n', '5', '475', '25', '500', '', 'Pending');

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

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `name`, `qty`, `cost`, `invoice`, `date`, `supplier`, `stinno`, `vatper`, `amount`, `vat`, `total_amount`, `month`, `year`, `d_status`) VALUES
(1, 'P-0720232', 1, '475', 'PO-302340', '11-06-2019', 'Amman Agencies', '<br />\r\n<b>Notice</b>:  Undefined index: tinno in <b>C:\\xampp\\htdocs\\mahendra\\pages\\purchase.php</b> on line <b>81</b><br />\r\n', '5', '475', '25', '500', 'June', '2019', 'Pending'),
(2, 'P-0720232', 1, '475', 'PO-22323533', '13-06-2019', 'Amman Agencies', '<br />\r\n<b>Notice</b>:  Undefined index: tinno in <b>C:\\xampp\\htdocs\\mahendra\\pages\\purchase.php</b> on line <b>81</b><br />\r\n', '5', '475', '25', '500', 'June', '2019', 'Pending');

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

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `voucherno`, `date`, `acchead`, `towards`, `amount`) VALUES
(1, 'CR19-0001', '25-07-2019', 'fghk', 'Namakkal', '2000');

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
  `igstamt` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesform`
--

INSERT INTO `salesform` (`id`, `invoice`, `date`, `student`, `product`, `price`, `qty`, `amount`, `cgst`, `tamount`, `discount`, `total_amount`, `sgst`, `igst`, `cgstamt`, `sgstamt`, `igstamt`) VALUES
(1, 'RS-9090300', '10-07-2019', 'Madesh', 'P-80230632', '5', '1', '5', '2', '5.2', '0', '5.2', '2', '0', '0.1', '0.1', '0'),
(2, 'RS-03330333', '10-07-2019', 'Madesh', 'P-80230632', '5', '1', '5', '3', '5.45', '0', '5.45', '3', '3', '0.15', '0.15', '0.15'),
(3, 'RS-23303233', '05-08-2019', 'Madesh', 'P-80230632', '5', NULL, '0', '2', '0', '0', '0', '2', '0', '0', '0', '0'),
(4, 'RS-23800203', '05-08-2019', 'Madesh', 'P-80230632', '5', '1', '5', '2', '5.2', '0', '5.2', '2', '0', '0.1', '0.1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `omonth` varchar(25) NOT NULL,
  `oyear` varchar(25) NOT NULL,
  `qtyleft` varchar(25) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `vat` varchar(20) NOT NULL,
  `total_amount` varchar(30) NOT NULL,
  `btype` varchar(250) NOT NULL,
  `vatper` varchar(250) NOT NULL,
  `tcharge` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcatagory`
--

CREATE TABLE `subcatagory` (
  `id` int(50) NOT NULL,
  `catagory_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcatagory`
--

INSERT INTO `subcatagory` (`id`, `catagory_name`) VALUES
(1, 'School Regular Expenses'),
(2, 'School Receipt'),
(3, 'Matric School Other Expenses'),
(4, 'Transport F C Expenses'),
(7, 'Sports Competition Expenses'),
(8, 'Mess Supervisor Advance'),
(9, 'Matric school Travelling expenses'),
(10, 'Transport - Bus fare to Driver, Cleaner & Ayahs'),
(11, 'Matric school Chess Class Fee received'),
(12, 'Transport - Vehicle Due Principal'),
(13, 'Transport Vehicle Loan - Interest '),
(14, 'Transport Vehicle Loan Due'),
(16, 'Two wheeler petrol expenses'),
(17, 'Function Expenses'),
(18, 'Note book cover purchase payment'),
(19, 'Travelling Expenses'),
(20, 'Building Approval Related work Expenses'),
(21, 'Newspaper Subscription expenses'),
(22, 'Recharge Card Purchase Payment'),
(23, 'Transport Repairs & Maintenance expenses'),
(24, 'Transport - Other expenses'),
(25, 'Matric School Advertisement'),
(27, 'Kidz School Transport - Repair & Maintenance'),
(28, 'Kidz Transport F C Expenses'),
(29, 'Kidz Transport Tax expenses'),
(30, 'Kidz Transport Tyre Expenses'),
(31, 'Kidz Transport - Bus fare & Food expenses'),
(32, 'Kidz - Phenoil, Soap Oil & Acid purchase payment'),
(33, 'Transport - Extra & Leave duty batta'),
(34, 'Internet Charges paid'),
(35, 'Salary to Teaching Staff Matric Block'),
(36, 'Salary to Teaching Staff Hr.Sec.Block'),
(37, 'Salary to E C Members'),
(38, 'Salary to Office Staff'),
(39, 'Salary to Electrician'),
(40, 'Salary to Agri'),
(41, 'Salary to Drivers'),
(42, 'Salary to Cleaners'),
(43, 'Salary to Ayahs'),
(44, 'Kidz school  Teaching Staff Salary'),
(45, 'Kidz school - Salary to Drivers'),
(46, 'Kidz School - Salary to Ayahs'),
(47, 'CBSE salary to Teaching Staff'),
(48, 'CBSE Salary to Office Staff'),
(49, 'Salary to Tuition coaching class directors'),
(50, 'Salary to Part time teachers'),
(51, 'Salary to Hostel Night study watching director'),
(52, 'Salary to Class Room Cleaning Ayahs'),
(53, 'Salary to Security'),
(54, 'Salary to Scawengers'),
(55, 'Salary to Mess Staff '),
(56, 'Salary to Transport Inchargers'),
(57, 'Salary to Hostel Warden'),
(59, 'Salary to Store Girls Hostel - Incharge'),
(60, 'CBSE salary to Drivers'),
(61, 'Examination Expenses'),
(62, 'Pooja Expenses'),
(65, 'Dobby charges'),
(66, 'Transport Tax Expenses'),
(67, 'Transport Tyre Expenses'),
(68, 'Ayahs Leave duty salary paid'),
(69, 'Drivers - Leave duty Salary'),
(70, 'Kidz Building Rent Paid'),
(71, 'CBSE Principal Residence house rent paid'),
(72, 'Neet Foundation course salary paid'),
(73, 'Neet Foundation course staff travelling expenses'),
(74, 'Transport - Temporary Toll Ticket'),
(76, 'Bus fare , Tea & Food expenses at the time of went to workshop'),
(77, 'Printing & Stationeries'),
(79, 'E B Charges paid'),
(80, 'Telephone Bill Paid'),
(81, 'Cell phone bill paid'),
(83, 'School Fee Return'),
(84, 'Hostel fee Return'),
(85, 'Maaruthi EECO Car Maintenance Expenses'),
(86, 'Maruthi Omni  Van Maintenance Expenses'),
(87, 'Maruthi Omni Van Petrol & Oil Expenses'),
(88, 'Maaruthi EECO Car Petrol & Oil Expenses'),
(89, 'Generator Diesel Expenses'),
(90, 'Generator Maintenance Expenses'),
(91, 'Kidz transport Diesel Expenses'),
(92, 'Kidz Generator Diesel Expenses'),
(94, 'Kidz Generator Maintenance Expenses'),
(95, 'Hostel Deposit Refund'),
(96, 'Gift expenses'),
(97, 'Kidz E B Charges paid'),
(98, 'Advertisement expenses'),
(99, 'Kidz Cell phone charges '),
(100, 'Kidz Newspaper subscription paid'),
(101, 'Kidz Xerox expenses'),
(102, 'Kidz Electrical maintenance expenses'),
(103, 'Kidz function expenses'),
(104, 'Kidz Tea expenses'),
(105, 'CBSE Telephone bill paid'),
(106, 'Kidz Telephone bill paid'),
(107, 'CBSE Printing & Stationeries'),
(108, 'Neet Class taken charges paid'),
(109, 'Students House dress purchase payment'),
(110, 'Postage & Courier expenses'),
(111, 'CBSE Building Painting labour charges'),
(112, 'CBSE Building Painting labour charges'),
(113, 'Indian Bank A/c 550 811 591'),
(114, 'Duplicator Machine Maintenance Expenses'),
(115, 'Phone Basic Card Purchase'),
(116, 'Neet Foundation course materials purchase payment'),
(117, '2017 - 18 Neet Class Fee received'),
(118, 'Neet class books purchased'),
(120, 'Girls hostel store snacks purchase payment'),
(121, 'Note books purchase payment'),
(122, 'Van Fee Return'),
(123, 'Transport Diesel expenses'),
(124, 'CBSE Travelling Expenses'),
(125, 'CBSE Other Expenses'),
(126, 'Computer Maintenance expenses'),
(127, 'Transport Insurance Premium paid'),
(128, 'P F Damage'),
(129, 'Interest to other loans'),
(130, 'Girls Hostel stationeries purchase payment'),
(131, 'CBSE Asset Purchase'),
(133, 'Students uniform stitching charges paid'),
(135, 'Salary Advance '),
(136, 'Electrical Maintenance expenses'),
(142, 'Civil Maintenance Expenses'),
(143, 'Cauvery Water Monthly charges paid'),
(144, 'Refreshment expenses'),
(145, 'Auto hire for transporting materials'),
(146, 'Garden Expenses'),
(147, 'Hostel warden cell phone recharge expenses'),
(148, 'Book Purchases'),
(149, 'Kidz other expenses'),
(150, 'Deepavali Bonus paid'),
(151, 'Students Belt purchase payment'),
(152, 'Blind Association donation paid'),
(154, 'PF Recovery & Payment'),
(156, 'R O Unit service & maintenance expenses'),
(157, 'TATA AIG Insurance Claim Refund'),
(158, 'Donation Expenses'),
(159, 'Ayutha pooja expenses'),
(160, 'Deepavali Bonus  to Drivers'),
(161, 'Deepavali Bonus to Cleaners'),
(162, 'Deepavali Bonus to Ayahs'),
(163, 'Deepavali Bonus to Class Room Cleaning Ayahs'),
(164, 'Deepavali Bonus to Mess Staff'),
(165, 'Deepavali Bonus to Kidz school Staff'),
(166, 'Deepavali Bonus to Security'),
(167, 'Deepavali Bonus to Agri'),
(168, 'Students The Hindu Newspaper Subscription Paid'),
(169, 'Lakshmi Vilas Bank Current A/c-7933511571'),
(170, 'State Bank Of India Current A/c-30970042760'),
(171, 'Indian Bank Principal A/c-6265762918'),
(172, 'Indian Bank Current A/c-550811591'),
(173, 'Indian Bank Principal A/c-6291395116'),
(174, 'Indian Bank Current A/c-846073793'),
(175, 'Lakshmi Vilas Bank Current A/c-7933601584'),
(176, 'State Bank Of India Reserve Fund A/c-37677133017'),
(177, 'State Bank Of India Current A/c-37452867781'),
(178, 'Lakshmi Vilas Bank Current A/c-7933601596'),
(179, 'State Bank Of India Current A/c-30970043821'),
(180, 'State Bank Of India Current A/c-550811614'),
(181, 'Lakshmi Vilas Bank Current A/c-7933511564'),
(182, 'LVB Vehicle Loan A/c-793.785.1469'),
(183, 'LVB Vehicle Loan A/c-793.745.531'),
(184, 'LVB Vehicle Loan A/c-793.785.1455'),
(185, 'LVB Vehicle Loan A/c-793.745.486'),
(186, 'Cholamandalam Finance A/c-1428882 - TN 88 Y 2455'),
(187, 'Cholamandalam Finance A/c-1426335 - TN 88 Y 2466'),
(188, 'Cholamandalam Finance A/c-1456255 - TN 88 Y 3404'),
(190, 'Cash Remittance'),
(191, 'Other Expenses'),
(192, 'Salary to Store incharge'),
(193, 'Canvassing Expenses'),
(194, 'Book Bundle Parcel hire'),
(195, 'Temporary Toll Ticket charges'),
(196, 'R T E Act Fund refund'),
(197, 'Bank Remittance'),
(198, 'T D S On Advertisement'),
(199, 'Store Snacks Purchase'),
(200, 'XI std Practical Guide Purchase'),
(201, 'Tri cycle puncture expenses'),
(202, 'National Talent Expo Exam Fee Paid'),
(203, 'Two wheeler Maintenance expenses'),
(204, 'Kidz Furniture Expenses'),
(205, 'First Aid Medicines for Hostel'),
(206, 'First Aid Medicines for Mess'),
(207, 'First Aid Medicines for School'),
(208, 'Store Snacks Purchase'),
(209, 'Loan from Others-02/N. Kanagaraj'),
(210, 'loan from others -agalya'),
(211, 'Neet Class staff staying guest house rent paid'),
(212, 'Neet Summer Crash Course taken charges payment '),
(213, 'Software Maintenance Expenses'),
(214, 'Monthly Toll Ticket for Namakkal Route Van'),
(215, 'Monthly Toll Ticket for Maruthi Omni Van'),
(216, 'Building work expenses'),
(217, 'Hostel Water Tanker extra duty batta'),
(218, 'Painting work labour charges'),
(219, 'Xerox taken expenses'),
(220, 'E P F Contribution'),
(221, 'Book Bundle Parcel Hire'),
(222, 'Neet Class Staff staying guest house E B Charges'),
(224, 'Girls Hostel Store Purchase - Consumables'),
(225, 'Building Painting work labour charges'),
(226, 'Mess Other Expenses'),
(227, 'Students Uniform Stitching charges'),
(228, 'CBSE Compound wall construction work expenses'),
(229, 'Transport Toll Ticket Charges'),
(230, 'Staff Uniform Purchase '),
(231, 'T D S on Advertisement Paid'),
(232, 'T D S On Salary Paid'),
(233, 'Mess Banana Sumathi'),
(234, 'Mess Coconut V R S'),
(235, 'Mess Dhanalakshmi Bakery'),
(236, 'Mess Jayam Appalam'),
(237, 'Mess K G Agency'),
(238, 'Mess Malar Idiappam'),
(239, 'Mess Mani Vegetable Shop'),
(240, 'Mess Milkman Ravi'),
(241, 'Mess Sri Navaladi Maligai'),
(242, 'Mess Sri Amman Broilers'),
(243, 'Salem Handloom Stores ( Babu)'),
(244, 'Scawengers Salary Deposit'),
(245, 'TATA  AIG Insurance - L.Sowmiya IX'),
(246, 'TATA AIG Insurance - P.Rithika XI'),
(247, 'Golden Scientific Suppliers'),
(248, 'Mercury Scientific Company'),
(249, 'R T E Act Amount'),
(250, 'The Brothers Educational Union'),
(251, 'Veno Agencies'),
(252, 'Stores Navaladi Maligai'),
(253, 'Mess Banana Purchase'),
(254, 'Mess Chicken Purchase'),
(255, 'Mess Milk Purchase'),
(256, 'Mess Vegetable Purchase'),
(257, 'Mess Barotta Master Batta'),
(258, 'Mess Supervisor A/C'),
(259, 'Banana Purchase'),
(260, 'Other Expense'),
(261, 'Maligai Expense'),
(262, 'Loan from others -03 R.Subbaiyan');

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
  `bank` varchar(550) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `address`, `gstno`, `panno`, `phone`, `bank`) VALUES
(3, 'Madhesh', 'Namakkal', '456789', '3456789', '9448691461', 'State bank of India\r\nAcc No: 23459876567');

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
  `qty_left` int(100) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `date_delivered` varchar(250) DEFAULT NULL,
  `expiration_date` varchar(250) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `ttype` varchar(250) DEFAULT NULL,
  `cgst` varchar(250) DEFAULT NULL,
  `sgst` varchar(250) DEFAULT NULL,
  `igst` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userproducts`
--

INSERT INTO `userproducts` (`product_id`, `product_code`, `product_name`, `description_name`, `unit`, `cost`, `price`, `mrp`, `supplier`, `qty_left`, `category`, `date_delivered`, `expiration_date`, `user`, `ttype`, `cgst`, `sgst`, `igst`) VALUES
(1, 'P-33433332', 'Egg', '', 'Per lot', '', '850', '', 'Madhesh', 100, 'Dealer', '', '', 'Raja', '', '', '', '');

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
(1, '0001', '25-07-2019', 'fghk', 'Namakkal', '20000');

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
-- Indexes for table `addunit`
--
ALTER TABLE `addunit`
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
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addgroup`
--
ALTER TABLE `addgroup`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `addunit`
--
ALTER TABLE `addunit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catagory3`
--
ALTER TABLE `catagory3`
  MODIFY `cat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daybook`
--
ALTER TABLE `daybook`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `ex_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT for table `expensepending`
--
ALTER TABLE `expensepending`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `in_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `incomesubcatagory`
--
ALTER TABLE `incomesubcatagory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `lose`
--
ALTER TABLE `lose`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `print`
--
ALTER TABLE `print`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchaseform`
--
ALTER TABLE `purchaseform`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcatagory`
--
ALTER TABLE `subcatagory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userproducts`
--
ALTER TABLE `userproducts`
  MODIFY `product_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
