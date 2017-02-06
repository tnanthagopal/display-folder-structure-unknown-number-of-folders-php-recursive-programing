-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2017 at 05:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `your_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_folder`
--

CREATE TABLE IF NOT EXISTS `tbl_folder` (
  `id` int(3) NOT NULL,
  `foler_name` varchar(30) NOT NULL,
  `parent_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='folder & sub folders';

--
-- Dumping data for table `tbl_folder`
--

INSERT INTO `tbl_folder` (`id`, `foler_name`, `parent_id`) VALUES
(1, 'Folder 1', 0),
(2, 'Folder 2', 0),
(3, 'Folder 3', 0),
(4, 'Folder 2 Sub 1', 2),
(5, 'Folder 1 Sub 1', 1),
(6, 'Folder 1 Sub 2', 1),
(7, 'Folder 1 Sub 1 Sub 1', 5),
(8, 'Folder 1 Sub 1 Sub 2', 5),
(9, 'Folder 1 Sub 1 Sub 2 Sub 1', 8),
(10, 'Folder 2 Sub 1 Sub 1', 4),
(11, 'Folder 2 Sub 1 Sub 1 Sub 1', 10),
(12, 'Folder 1 Sub 1 Sub 1 Sub 1', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
