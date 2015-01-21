-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2014 at 08:07 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scg_assetmgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acc_username` varchar(150) NOT NULL,
  `acc_password` varchar(32) NOT NULL,
  `acc_last_name` varchar(30) NOT NULL,
  `acc_first_name` varchar(60) NOT NULL,
  `acc_type` enum('admin','dev','user') NOT NULL DEFAULT 'admin',
  `acc_failed_login` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `acc_status` enum('active','locked','deleted') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`acc_id`),
  UNIQUE KEY `username` (`acc_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_username`, `acc_password`, `acc_last_name`, `acc_first_name`, `acc_type`, `acc_failed_login`, `acc_status`) VALUES
(1, 'developer@zeaple.com', 'c35c3883065eb7aac03d0c9423f26ecb', 'Developer', 'Zeaple', 'dev', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE IF NOT EXISTS `hardware` (
  `har_id` int(11) NOT NULL,
  `har_asset_number` int(11) NOT NULL,
  `har_asset_type` varchar(30) NOT NULL,
  `har_erf_number` int(11) NOT NULL,
  `har_model` varchar(30) NOT NULL,
  `har_serial_number` varchar(30) NOT NULL,
  `har_hostname` varchar(30) NOT NULL,
  `har_status` varchar(30) NOT NULL,
  `har_vendor` varchar(30) NOT NULL,
  `har_date_purchase` date NOT NULL,
  `har_po_number` int(11) NOT NULL,
  `har_cost` double NOT NULL,
  `har_book_value` double NOT NULL,
  `har_predetermined_value` double NOT NULL,
  `har_asset_value` double NOT NULL,
  `har_date_added` date NOT NULL,
  `har_specs` text NOT NULL,
  PRIMARY KEY (`har_id`),
  UNIQUE KEY `har_id` (`har_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `pag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pag_title` varchar(140) NOT NULL,
  `pct_id` int(10) unsigned DEFAULT '0',
  `pag_slug` varchar(80) DEFAULT NULL,
  `pag_content` text NOT NULL,
  `pag_date_created` datetime NOT NULL,
  `pag_date_published` datetime DEFAULT NULL,
  `pag_type` enum('editable','static') NOT NULL DEFAULT 'editable',
  `pag_status` enum('published','draft') NOT NULL DEFAULT 'published',
  PRIMARY KEY (`pag_id`),
  UNIQUE KEY `slug` (`pag_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE IF NOT EXISTS `page_category` (
  `pct_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pct_name` varchar(50) NOT NULL,
  PRIMARY KEY (`pct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `per_id` int(10) NOT NULL AUTO_INCREMENT,
  `per_last_name` varchar(30) NOT NULL,
  `per_first_name` varchar(30) NOT NULL,
  `per_middle_name` varchar(30) NOT NULL,
  `per_position` varchar(30) NOT NULL,
  `per_department` varchar(30) NOT NULL,
  `per_office` varchar(30) NOT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`per_id`, `per_last_name`, `per_first_name`, `per_middle_name`, `per_position`, `per_department`, `per_office`) VALUES
(1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `photo_album`
--

CREATE TABLE IF NOT EXISTS `photo_album` (
  `alb_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alb_name` varchar(50) NOT NULL,
  `alb_description` text NOT NULL,
  `alb_slug` varchar(80) NOT NULL,
  PRIMARY KEY (`alb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `rem_id` int(11) NOT NULL,
  `rem_datetime` datetime NOT NULL,
  `rem_status` varchar(30) NOT NULL,
  `rem_comment` text NOT NULL,
  `rem_har` int(11) NOT NULL,
  `rem_per` int(11) NOT NULL,
  PRIMARY KEY (`rem_id`),
  KEY `har_id` (`rem_har`),
  KEY `har_id_2` (`rem_har`),
  KEY `rem_per` (`rem_per`),
  KEY `rem_per_2` (`rem_per`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ddeb1e4b5f103497dad84a42aaa2625c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36', 1416033418, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `sof_id` int(11) NOT NULL,
  `sof_asset_number` int(11) NOT NULL,
  `sof_erf_number` int(11) NOT NULL,
  `sof_manufacturer` int(11) NOT NULL,
  `sof_product` varchar(30) NOT NULL,
  `sof_license_key` varchar(30) NOT NULL,
  `sof_hostname` varchar(30) NOT NULL,
  `sof_vendor` varchar(30) NOT NULL,
  `sof_date_purchase` date NOT NULL,
  `sof_po_number` int(11) NOT NULL,
  `sof_cost` double NOT NULL,
  `sof_book_value` double NOT NULL,
  `soft_predetermined_value` double NOT NULL,
  `sof_asset_value` double NOT NULL,
  `sof_date_added` date NOT NULL,
  `sof_specs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `remarks_ibfk_1` FOREIGN KEY (`rem_har`) REFERENCES `hardware` (`har_id`),
  ADD CONSTRAINT `remarks_ibfk_2` FOREIGN KEY (`rem_per`) REFERENCES `personnel` (`per_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
