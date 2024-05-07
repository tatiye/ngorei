-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2024 at 05:35 PM
-- Server version: 5.7.42-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exsampel`
--

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--
ALTER TABLE `demo`ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `demo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(11) DEFAULT NULL,
  `title` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `klasf` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `bulan` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `tahun` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(200) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `pubDate` varchar(100) DEFAULT NULL,
  `appid` varchar(11) DEFAULT NULL,
  `row` enum('1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `userid`, `title`, `klasf`, `bulan`, `tahun`, `date`, `time`, `thumbnail`, `description`, `pubDate`, `appid`, `row`) VALUES
(19274, '1', 'Noname19274', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19275, '1', 'Noname19275', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19276, '1', 'Noname19276', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19277, '1', 'Noname19277', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19278, '1', 'Noname19278', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19279, '1', 'Noname19279', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19280, '1', 'Noname19280', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19281, '1', 'Noname19281', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19282, '1', 'Noname19282', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1'),
(19283, '1', 'Noname19283', 'R3', '0', '2024', '2024/01/10', NULL, 'images/img/02.jpg', NULL, '2024/01/10', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19681;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
