-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 03:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyhome`
--

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `ip` varchar(100) NOT NULL,
  `arr_in` mediumtext NOT NULL,
  `in_info` mediumtext NOT NULL,
  `arr_out` mediumtext NOT NULL,
  `out_info` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`ip`, `arr_in`, `in_info`, `arr_out`, `out_info`) VALUES
('127.0.0.1', '[0,1,0,....0,1]', 'turn on light', '[3,5,6,7,8,9,7,8]', '#lights_on'),
('127.0.0.2', '[0,1,0,....0,1]', 'turn on light', '[3,5,6,7,8,9,7,8]', '#lights_on'),
('127.0.0.1', '[7431916,9517555,.....,5029676,13517457]', 'cannot be traced', '[1596540,8839932,7854157,971857,3680670,6668033,8025765,15086962]', 'cannot be traced'),
('127.0.0.1', '[444859,12539771,.....,14288208,648570]', 'cannot be traced', '[9479030,3321160,429293,196949,7904429,9271653,2088506,12043582]', 'cannot be traced');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
