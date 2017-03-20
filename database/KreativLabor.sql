-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2017 at 06:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KreativLabor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_ort`
--

CREATE TABLE `tab_ort` (
  `id` int(11) NOT NULL,
  `plz` int(5) DEFAULT NULL,
  `ort` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=swe7;

--
-- Dumping data for table `tab_ort`
--

INSERT INTO `tab_ort` (`id`, `plz`, `ort`) VALUES
(1, 59387, 'Aschehberg'),
(2, 48157, 'Muenster, Coerde');
(3, 48147, 'Muenster');

-- --------------------------------------------------------

--
-- Table structure for table `tab_person`
--

CREATE TABLE `tab_person` (
  `id` int(11) NOT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `nachname` varchar(255) DEFAULT NULL,
  `gdatum` date DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `plz` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=swe7;

--
-- Dumping data for table `tab_person`
--

INSERT INTO `tab_person` (`id`, `vorname`, `nachname`, `gdatum`, `adresse`, `plz`) VALUES
(1, 'Luca', 'Kiebel', '1999-03-03', 'Hermelinweg 5', 48157),
(2, 'Luca', 'Hartmann', '2000-03-08', 'Praelat-Degener-Strasse 28', 59387);
(3, 'Luca', 'Hülsmann', '2000-09-11', 'Niedersachsenring 52' 48147);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_ort`
--
ALTER TABLE `tab_ort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_person`
--
ALTER TABLE `tab_person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_ort`
--
ALTER TABLE `tab_ort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tab_person`
--
ALTER TABLE `tab_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
