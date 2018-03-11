-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 10:24 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scif`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announce` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announce`) VALUES
('.Announcements will appear here.');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `sno` int(5) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `located` text NOT NULL,
  `capacity` int(6) NOT NULL,
  `incharge` text NOT NULL,
  `facilities` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`sno`, `name`, `located`, `capacity`, `incharge`, `facilities`, `image`) VALUES
(1, 'Main Hall', 'Dr. T. P. Ganesan Auditorium', 3500, 'secy.registrar@srmuniv.ac.in', 'Podium, Mike, Sound System, Projector, Guest Room, Food Serving Area', 'hall1.jpg'),
(2, 'Mini Hall - 1', 'Dr. T. P. Ganesan Auditorium', 350, 'secy.registrar@srmuniv.ac.in', 'Podium, Mike, Sound System, Projector, Guest Room, Food Serving Area', 'hall1.jpg'),
(3, 'Mini Hall - 2', 'Dr. T. P. Ganesan Auditorium', 200, 'secy.registrar@srmuniv.ac.in', 'Podium, Mike, Sound System, Projector, Guest Room, Food Serving Area', 'hall1.jpg'),
(4, 'Conference Hall-Big', 'University Building - 15th floor', 100, 'secy.registrar@srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(5, 'Conference Hall-Small', 'University Building - 15th floor', 30, 'secy.registrar@srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(6, 'Conference Hall', 'Tech Park 1st floor', 80, 'secy.registrar@srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(7, 'CSE-Conference Hall', 'Tech Park-8th floor', 120, 'hod.cse@ktr.srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(8, 'ECE-Conference Hall', 'Tech Park-12th floor', 120, 'hod.ece@ktr.srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(9, 'Bio Tech-Conference Hall', 'Bio Engg Block-6th floor', 250, 'hod.biotech@ktr.srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(10, 'MBA-Conference Hall', 'MBA Block', 350, 'dean.mgmt@ktr.srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(11, 'New Seminal Hall-EEE', 'ES Block-2nd Floor', 650, 'hod.eee@ktr.srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(12, 'Mech Seminar Hall', 'Mech C- Block, 3rd Floor', 200, 'hod.mech@ktr.srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg'),
(13, 'Hall of Performing Arts', 'CRC Block', 200, 'hod.civil@ktr.srmuniv.ac.in', 'Podium, Mike, Sound System, Projector', 'hall1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_id` int(11) NOT NULL,
  `date_of_order` date NOT NULL,
  `hall_id` int(5) NOT NULL,
  `reason` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `cancel_reason` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `institute` varchar(255) CHARACTER SET utf8 NOT NULL,
  `iid` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `club` text NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phno` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `hash` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `active` int(2) DEFAULT '0',
  `ustatus` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `institute`, `iid`, `address`, `email`, `club`, `pwd`, `phno`, `type`, `hash`, `active`, `ustatus`) VALUES
(1, 'Super', 'User', 'SRM', '1', 'SRM IST', 'admin@shbf.com', '', '$2y$10$ksm46l56m0yd5/9vukozquEipu5rYMcrVC3wrpUiBAqd6ei9vPjq6', '', 'superuser', NULL, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
