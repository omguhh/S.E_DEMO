-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2015 at 10:14 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(35) NOT NULL,
  `admin_phone` int(11) NOT NULL,
  `admin_email` varchar(35) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_name` (`admin_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`) VALUES
(1, 'nombre', 5042069, 'blazeit@swagm8.com');

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE IF NOT EXISTS `calender` (
  `calender_id` int(11) NOT NULL,
  `meeting_title` varchar(25) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `rc_id` int(11) NOT NULL,
  `fa_id` int(11) NOT NULL,
  PRIMARY KEY (`calender_id`),
  UNIQUE KEY `rc_id` (`rc_id`),
  UNIQUE KEY `fa_id` (`fa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`calender_id`, `meeting_title`, `meeting_date`, `meeting_time`, `rc_id`, `fa_id`) VALUES
(100, 'stocks and stuff', '2015-01-12', '00:12:30', 123, 111);

-- --------------------------------------------------------

--
-- Table structure for table `financial_advisor`
--

CREATE TABLE IF NOT EXISTS `financial_advisor` (
  `fa_id` int(11) NOT NULL,
  `fa_name` varchar(45) NOT NULL,
  `fa_email` varchar(45) NOT NULL,
  `fa_address` varchar(65) NOT NULL,
  `fa_phone` int(11) NOT NULL,
  `fa_rating` int(11) NOT NULL,
  `years_experience` int(11) NOT NULL,
  `certificate` varchar(65) NOT NULL,
  PRIMARY KEY (`fa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_advisor`
--

INSERT INTO `financial_advisor` (`fa_id`, `fa_name`, `fa_email`, `fa_address`, `fa_phone`, `fa_rating`, `years_experience`, `certificate`) VALUES
(111, 'Johnny Depp', 'financial_pirate@gmail.com', 'Home 4 street, 2nd floor ', 567890, 5, 12, 'Dubai');

-- --------------------------------------------------------

--
-- Table structure for table `registered_client`
--

CREATE TABLE IF NOT EXISTS `registered_client` (
  `rc_id` int(11) NOT NULL,
  `rc_name` varchar(45) NOT NULL,
  `rc_email` varchar(45) NOT NULL,
  `rc_address` varchar(65) NOT NULL,
  `rc_phone` int(11) NOT NULL,
  `fa_id` int(11) NOT NULL,
  `cash_balance` int(11) NOT NULL,
  PRIMARY KEY (`rc_id`),
  UNIQUE KEY `fa_id` (`fa_id`),
  UNIQUE KEY `wallet_id` (`cash_balance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_client`
--

INSERT INTO `registered_client` (`rc_id`, `rc_name`, `rc_email`, `rc_address`, `rc_phone`, `fa_id`, `cash_balance`) VALUES
(123, 'client1', 'client1@yahoo.com', 'clients address', 5968120, 111, 420420);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `stock_id` int(11) NOT NULL,
  `stock_name` varchar(15) NOT NULL,
  `stock_category` tinyint(1) NOT NULL COMMENT '0-watchlist, 1-own',
  `stock_price` int(11) NOT NULL,
  `no_of_stocks` int(11) NOT NULL,
  `fa_id` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`),
  UNIQUE KEY `fa_id` (`fa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `stock_name`, `stock_category`, `stock_price`, `no_of_stocks`, `fa_id`) VALUES
(1, 'msft', 1, 45, 3, 111);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calender`
--
ALTER TABLE `calender`
  ADD CONSTRAINT `calender_ibfk_1` FOREIGN KEY (`rc_id`) REFERENCES `registered_client` (`rc_id`),
  ADD CONSTRAINT `calender_ibfk_2` FOREIGN KEY (`fa_id`) REFERENCES `financial_advisor` (`fa_id`);

--
-- Constraints for table `registered_client`
--
ALTER TABLE `registered_client`
  ADD CONSTRAINT `registered_client_ibfk_1` FOREIGN KEY (`fa_id`) REFERENCES `financial_advisor` (`fa_id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`fa_id`) REFERENCES `financial_advisor` (`fa_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
