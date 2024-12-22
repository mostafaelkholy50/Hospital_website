-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 07:59 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'def.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$DmBIYxUA3cRW.pyaR344UOOlbrqxOjxbfogVw62rB0HADmfd0Upia', 'def.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `checkin_doctor`
-- (See below for the actual view)
--
CREATE TABLE `checkin_doctor` (
`doctor_id` int(11)
,`doctor_name` varchar(255)
,`checkin_date` datetime
,`checkout_date` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `checkin_nurse`
-- (See below for the actual view)
--
CREATE TABLE `checkin_nurse` (
`nurse_id` int(11)
,`nurse_name` varchar(255)
,`checkin_date` datetime
,`checkout_date` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'def.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`, `image`) VALUES
(5, 'mostafa', 'mostafaelkholy4321@gmail.com', '$2y$10$wMZexbebVUdRsr.d78vNn.zV7I8/J6pSADIeIrECqOM18HZDlKN7i', '1731700365304faa4d6ee5daa2459418c835f8dd5f.png');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_checkin`
--

CREATE TABLE `doctors_checkin` (
  `checkin_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `checkin_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_checkin`
--

INSERT INTO `doctors_checkin` (`checkin_id`, `doctor_id`, `checkin_date`) VALUES
(9, 5, '2024-11-16 16:39:42'),
(10, 5, '2024-11-16 16:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_checkout`
--

CREATE TABLE `doctors_checkout` (
  `checkout_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_checkout`
--

INSERT INTO `doctors_checkout` (`checkout_id`, `doctor_id`, `date`) VALUES
(1, 5, '2024-11-16 16:39:44'),
(2, 5, '2024-11-16 16:39:50'),
(3, 5, '2024-11-16 16:40:45'),
(4, 5, '2024-11-16 16:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'def.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'madeha', 'madeha@gmail.com', '$2y$10$bVcDHDVmi3rmpn4zwdtDk./PUoLG6RPBj3bvtXqsUfY3GMN.Aabj6', '173177669996781ded7baca2d23c7474cd0602cb77.png');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_checkin`
--

CREATE TABLE `nurse_checkin` (
  `checkin_id` int(11) NOT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `checkin_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse_checkin`
--

INSERT INTO `nurse_checkin` (`checkin_id`, `nurse_id`, `checkin_date`) VALUES
(1, 1, '2024-11-16 18:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_checkout`
--

CREATE TABLE `nurse_checkout` (
  `checkout_id` int(11) NOT NULL,
  `nurse_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse_checkout`
--

INSERT INTO `nurse_checkout` (`checkout_id`, `nurse_id`, `date`) VALUES
(1, 1, '2024-11-16 18:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'def.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `password`, `image`) VALUES
(2, 'Dale Beard', 'miduxuj@mailinator.com', '$2y$10$Bl9yCv00F7CK5.sumqosmemIZJhqoJg6iLbFEE46DiIoVBunkGbMW', 'def.jpg');

-- --------------------------------------------------------

--
-- Structure for view `checkin_doctor`
--
DROP TABLE IF EXISTS `checkin_doctor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `checkin_doctor`  AS SELECT `doctor`.`id` AS `doctor_id`, `doctor`.`name` AS `doctor_name`, `doctors_checkin`.`checkin_date` AS `checkin_date`, `doctors_checkout`.`date` AS `checkout_date` FROM ((`doctors_checkin` join `doctor` on(`doctors_checkin`.`doctor_id` = `doctor`.`id`)) join `doctors_checkout` on(`doctors_checkin`.`doctor_id` = `doctors_checkout`.`doctor_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `checkin_nurse`
--
DROP TABLE IF EXISTS `checkin_nurse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `checkin_nurse`  AS SELECT `nurse`.`id` AS `nurse_id`, `nurse`.`name` AS `nurse_name`, `nurse_checkin`.`checkin_date` AS `checkin_date`, `nurse_checkout`.`date` AS `checkout_date` FROM ((`nurse_checkin` join `nurse` on(`nurse_checkin`.`nurse_id` = `nurse`.`id`)) join `nurse_checkout` on(`nurse_checkin`.`nurse_id` = `nurse_checkout`.`nurse_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_checkin`
--
ALTER TABLE `doctors_checkin`
  ADD PRIMARY KEY (`checkin_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors_checkout`
--
ALTER TABLE `doctors_checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_checkin`
--
ALTER TABLE `nurse_checkin`
  ADD PRIMARY KEY (`checkin_id`),
  ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `nurse_checkout`
--
ALTER TABLE `nurse_checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors_checkin`
--
ALTER TABLE `doctors_checkin`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctors_checkout`
--
ALTER TABLE `doctors_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nurse_checkin`
--
ALTER TABLE `nurse_checkin`
  MODIFY `checkin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nurse_checkout`
--
ALTER TABLE `nurse_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors_checkin`
--
ALTER TABLE `doctors_checkin`
  ADD CONSTRAINT `doctors_checkin_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`);

--
-- Constraints for table `doctors_checkout`
--
ALTER TABLE `doctors_checkout`
  ADD CONSTRAINT `doctors_checkout_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`);

--
-- Constraints for table `nurse_checkin`
--
ALTER TABLE `nurse_checkin`
  ADD CONSTRAINT `nurse_checkin_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`id`);

--
-- Constraints for table `nurse_checkout`
--
ALTER TABLE `nurse_checkout`
  ADD CONSTRAINT `nurse_checkout_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
