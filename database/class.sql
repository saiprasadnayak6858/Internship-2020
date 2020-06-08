-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 03:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Registration_Number` int(255) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `06_08_2020` varchar(30) DEFAULT NULL,
  `06_09_2020` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Registration_Number`, `Full_Name`, `06_08_2020`, `06_09_2020`) VALUES
(1801106419, 'SAI PRASAD NAYAK', 'P', 'P'),
(1801106170, 'BISWAJIT PATRA', 'A', 'A'),
(1801106459, 'SATYAJEET MALLA', 'P', 'P'),
(1801106473, 'SHIBANI SHANKAR DASH', 'A', 'A'),
(1801106531, 'SOURAJEET MOHANTY', 'P', 'P'),
(1801106620, 'UDESH KUMAR BARIKI', 'A', 'A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
