-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2018 at 08:14 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `l_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `id` varchar(20) NOT NULL,
  `m_in_time` time DEFAULT NULL,
  `m_out_time` time DEFAULT NULL,
  `a_in_time` time DEFAULT NULL,
  `a_out_time` time DEFAULT NULL,
  `m_flag` int(2) DEFAULT NULL,
  `a_flag` int(2) DEFAULT NULL,
  `mo_flag` int(2) DEFAULT NULL,
  `ao_flag` int(2) DEFAULT NULL,
  PRIMARY KEY (`l_id`),
  KEY `fk_foreign` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`l_id`, `username`, `date`, `id`, `m_in_time`, `m_out_time`, `a_in_time`, `a_out_time`, `m_flag`, `a_flag`, `mo_flag`, `ao_flag`) VALUES
(13, 'muni', '2018-02-03', 'EMP859527', '09:55:00', '12:59:00', '14:01:00', '20:34:00', 1, 1, 1, 1),
(14, 'pradeep', '2018-02-03', 'EMP441741', '09:55:00', '12:59:00', '14:01:00', '20:34:00', 1, 1, 1, 1),
(15, 'sai', '2018-02-03', 'EMP525329', '09:55:00', '12:59:00', '14:11:00', '20:34:00', 1, 1, 1, 1),
(16, 'muni', '2018-02-02', 'EMP859527', '08:45:00', '13:00:00', '14:00:00', '21:35:00', 1, 1, 1, 1),
(17, 'muni', '2018-02-01', 'EMP859527', '10:00:00', '12:45:00', '14:15:00', '19:56:00', 1, 1, 1, 1),
(18, 'pradeep', '2018-02-02', 'EMP441741', '08:45:00', '13:05:00', '14:30:00', '20:34:00', 1, 1, 1, 1),
(19, 'muni', '2018-01-31', 'EMP859527', '10:00:00', '12:45:00', '14:33:00', '20:30:00', 1, 1, 1, 1),
(20, 'muni', '2018-01-30', 'EMP859527', '09:30:00', '12:55:00', '13:05:00', '16:30:00', 1, 1, 1, 1),
(21, 'muni', '2018-01-29', 'EMP859527', '10:10:00', '13:11:00', '14:15:00', '19:20:00', 1, 1, 1, 1),
(22, 'sai', '2018-02-02', 'EMP525329', '10:12:00', '13:30:00', '14:30:00', '19:30:00', 1, 1, 1, 1),
(23, 'hr', '2018-02-03', 'EMP766693', '10:00:00', '13:00:00', '14:00:00', '19:00:00', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(15) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `username`, `password`) VALUES
('EMP441741', 'Pradeep Rallapalli', 'pradeep@gmail.com', 'pradeep', 'pradeep'),
('EMP525329', 'Sai', 'sai@gmail.com', 'sai', 'saisai'),
('EMP527435', 'Admin', 'admin@lws.com', 'admin', 'admin'),
('EMP766693', 'HR', 'hr@lws.com', 'hr', 'hr'),
('EMP859527', 'Muneendra', 'muni@gmail.com', 'muni', 'muni');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_foreign` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
