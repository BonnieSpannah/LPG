-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2016 at 03:42 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_lpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `box` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='list of various energy companies - HQs';

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `phone`, `box`, `code`, `location`, `status`, `date_created`) VALUES
(1, 'Vivo Energy', 'admin@vivoenergy.co.ke', '254727205190', 9500, 100, 'Nairobi', 1, '2016-11-03 15:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `company_cylinders`
--

CREATE TABLE `company_cylinders` (
  `id` int(11) NOT NULL,
  `cylinder_serial` varchar(50) NOT NULL,
  `cylinder_barcode` varchar(50) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='a table of all cylinders in the HQ warehouse';

-- --------------------------------------------------------

--
-- Table structure for table `company_depots`
--

CREATE TABLE `company_depots` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `box` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `region` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='list of all depots for various companies';

--
-- Dumping data for table `company_depots`
--

INSERT INTO `company_depots` (`id`, `company_id`, `name`, `email`, `phone`, `box`, `code`, `region`, `status`, `date_created`) VALUES
(1, 1, 'Nairobi', 'nairobi@vivo.co.ke', '254708220566', 958, 100, 'Nairobi', 1, '2016-11-20 13:49:50'),
(2, 1, 'Mombasa', 'mombasa@vivo.co.ke', '254734253685', 8456, 2100, 'Mombasa', 1, '2016-11-20 13:51:34'),
(3, 1, 'Eldoret', 'eldoret@vivo.co.ke', '254734285685', 785, 3150, 'Eldoret', 1, '2016-11-20 13:52:23'),
(4, 1, 'Kisumu', 'kisumu@vivo.co.ke', '254726253685', 452, 4200, 'Kisumu', 1, '2016-11-20 13:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `depot_loads`
--

CREATE TABLE `depot_loads` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `cylinder_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `depot_resellers`
--

CREATE TABLE `depot_resellers` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `box` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `region` varchar(50) NOT NULL,
  `signature` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='list of all resellers for various depots';

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `load_id` int(11) NOT NULL,
  `reseller_id` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `refill` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `load_deliveries`
--

CREATE TABLE `load_deliveries` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `reseller_id` int(11) NOT NULL,
  `load_id` int(11) NOT NULL,
  `cylinder_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1-Refill; 2-New',
  `signature_status` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `price_lookup`
--

CREATE TABLE `price_lookup` (
  `id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `refill` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck_loads`
--

CREATE TABLE `truck_loads` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `load_id` int(11) NOT NULL,
  `truck_plates` varchar(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_id` int(10) NOT NULL,
  `driver_phone` varchar(20) NOT NULL,
  `driver_email` varchar(50) NOT NULL,
  `driver_code` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='list of all loads for various depots in various trucks';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `company_id`, `user_type`, `depot_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `password`, `status`, `date_created`) VALUES
(1, 1, 1, 0, 'Ernsten', NULL, 'Kirwa', 'hq@vivo.co.ke', '254708220566', '$2a$08$h/Y90Goa9I2RkrJkOCw01e9W7/t7nx7a.sDp4JiQTn1ITHM8q7ZPO', 1, '2016-11-03 15:42:20'),
(2, 1, 2, 1, 'Boniface', 'Munyua', 'Ndege', 'boniface@vivo.co.ke', '254708220566', '$2a$08$h/Y90Goa9I2RkrJkOCw01e9W7/t7nx7a.sDp4JiQTn1ITHM8q7ZPO', 1, '2016-11-20 13:56:20'),
(3, 1, 1, 2, 'Francis', NULL, 'Mbate', 'francis@vivo.co.ke', '254714253678', '$2a$08$h/Y90Goa9I2RkrJkOCw01e9W7/t7nx7a.sDp4JiQTn1ITHM8q7ZPO', 1, '2016-11-20 13:56:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_cylinders`
--
ALTER TABLE `company_cylinders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_depots`
--
ALTER TABLE `company_depots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depot_loads`
--
ALTER TABLE `depot_loads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depot_resellers`
--
ALTER TABLE `depot_resellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `load_deliveries`
--
ALTER TABLE `load_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_lookup`
--
ALTER TABLE `price_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `truck_loads`
--
ALTER TABLE `truck_loads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_cylinders`
--
ALTER TABLE `company_cylinders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_depots`
--
ALTER TABLE `company_depots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `depot_loads`
--
ALTER TABLE `depot_loads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `load_deliveries`
--
ALTER TABLE `load_deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `price_lookup`
--
ALTER TABLE `price_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `truck_loads`
--
ALTER TABLE `truck_loads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
