-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 06:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csrf`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `ua` varchar(45) NOT NULL,
  `ref` varchar(145) NOT NULL,
  `host` varchar(45) NOT NULL,
  `lang` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `name`, `email`, `password`, `ua`, `ref`, `host`, `lang`) VALUES
(0, 'admin', 'admin@getmantra.com', 'admin', 'Brick_Browser', 'http://192.168.1.3/sql-steps/content-13/index.php', '127.0.0.1', 'en'),
(1, 'tom', 'tom@getmantra.com', 'tom', 'Block_Browser', '', '8.8.8.8', 'en'),
(2, 'ron', 'ron@getmantra.com', 'ron', 'Rain_Browser', '', '192.168.1.1', 'en'),
(3, 'harry', 'harry@getmantra.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Mantra', '', '127.0.0.1', 'en');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
