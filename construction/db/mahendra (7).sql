-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 08:06 AM
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
(1, 'Dealer');

-- --------------------------------------------------------

--
-- Table structure for table `addunit`
--

CREATE TABLE `addunit` (
  `id` int(50) NOT NULL,
  `uom` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addunit`
--
ALTER TABLE `addunit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
