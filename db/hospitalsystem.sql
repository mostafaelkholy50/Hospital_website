-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 08:10 PM
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
-- Database: `hospitalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `Email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$NVpJVtv.stw1wsLB4FlgYeB0v4/9n2xbZulw58UJVT2wYAfoFc2V2');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmentID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `InvoiceID` int(11) NOT NULL,
  `DoctorID` int(11) DEFAULT NULL,
  `AppointmentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` enum('Confirmed','Cancelled','Pending') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`AppointmentID`, `PatientID`, `InvoiceID`, `DoctorID`, `AppointmentDate`, `Status`) VALUES
(18, 6, 21, 3, '2024-12-18 14:04:46', 'Cancelled'),
(19, 6, 22, 2, '2024-12-18 19:03:01', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `AttendanceID` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `AttendanceDate` date NOT NULL,
  `Status` enum('Present','Absent','Late') DEFAULT 'Present',
  `Remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`AttendanceID`, `StaffID`, `AttendanceDate`, `Status`, `Remarks`) VALUES
(5, 9, '2024-12-15', 'Present', 'On time'),
(10, 9, '2024-12-15', 'Late', 'Arrived 15 minutes late');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(50) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DepartmentID`, `DepartmentName`, `Description`) VALUES
(1, 'Nursing', 'any thing'),
(2, 'dustman', 'any thing');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Specialization` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `WorkingHours` text DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `consultationFee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorID`, `FullName`, `Specialization`, `PhoneNumber`, `Email`, `WorkingHours`, `Salary`, `consultationFee`) VALUES
(2, 'Anthony Hester', 'Placeat provident ', '+1 (887) 331-81', 'pycojodo@mailinator.com', 'Similique ipsum qui ', 100000.00, ''),
(3, 'Eliana Willis', 'Blanditiis in qui ma', '+1 (901) 495-36', 'xixe@mailinator.com', 'Consectetur necessit', 0.00, ''),
(4, 'doctor', 'Exercitationem non p', '+1 (222) 138-43', 'doctor@mailinator.com', '12', 2000000.00, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_appointments_invoices`
-- (See below for the actual view)
--
CREATE TABLE `doctor_appointments_invoices` (
`AppointmentID` int(11)
,`DoctorName` varchar(100)
,`Specialization` varchar(50)
,`consultationFee` varchar(255)
,`PhoneNumber` varchar(15)
,`Email` varchar(100)
,`AppointmentDate` timestamp
,`AppointmentStatus` enum('Confirmed','Cancelled','Pending')
,`InvoiceID` int(11)
,`InvoiceDate` timestamp
,`TotalAmount` decimal(10,2)
,`InvoiceStatus` enum('Paid','Unpaid')
,`PatientID` int(11)
,`PatientName` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `InvoiceID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `InvoiceDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TotalAmount` decimal(10,2) NOT NULL,
  `Status` enum('Paid','Unpaid') DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`InvoiceID`, `PatientID`, `InvoiceDate`, `TotalAmount`, `Status`) VALUES
(21, 6, '2024-12-17 10:55:31', 0.00, 'Unpaid'),
(22, 6, '2024-12-17 10:55:41', 0.00, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecords`
--

CREATE TABLE `medicalrecords` (
  `RecordID` int(11) NOT NULL,
  `PatientID` int(11) DEFAULT NULL,
  `Diagnosis` text NOT NULL,
  `Treatment` text DEFAULT NULL,
  `AdmissionDate` text DEFAULT NULL,
  `DischargeDate` text DEFAULT NULL,
  `Notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `PatientID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `Address` text DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `MedicalHistory` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`PatientID`, `FullName`, `DateOfBirth`, `Gender`, `Address`, `PhoneNumber`, `Email`, `MedicalHistory`) VALUES
(4, 'Martena Lowery', '1982-07-18', 'Male', 'Sapiente est in id ', '+1 (356) 686-84', 'hacusidicu@mailinator.com', 'Dolorum iure volupta'),
(5, 'Hadley Dillon', '1976-05-27', 'Female', 'Ipsam est aut liber', '+1 (889) 774-46', 'syqevalyvo@mailinator.com', 'Laboriosam eu elige'),
(6, 'patient', '2018-04-10', 'Female', 'Voluptate quia aliqu', '+1 (458) 557-89', 'patient@mailinator.com', 'Nulla magnam ea eum ');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `JobTitle` varchar(50) NOT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `DepartmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `FullName`, `JobTitle`, `Salary`, `PhoneNumber`, `DepartmentID`) VALUES
(9, 'Ali Hassan', 'Nurse', 5000.00, '01112345678', 1),
(11, 'abo habeba', 'dustman', 2.50, '022222223', 2);

-- --------------------------------------------------------

--
-- Structure for view `doctor_appointments_invoices`
--
DROP TABLE IF EXISTS `doctor_appointments_invoices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_appointments_invoices`  AS SELECT `a`.`AppointmentID` AS `AppointmentID`, `d`.`FullName` AS `DoctorName`, `d`.`Specialization` AS `Specialization`, `d`.`consultationFee` AS `consultationFee`, `d`.`PhoneNumber` AS `PhoneNumber`, `d`.`Email` AS `Email`, `a`.`AppointmentDate` AS `AppointmentDate`, `a`.`Status` AS `AppointmentStatus`, `i`.`InvoiceID` AS `InvoiceID`, `i`.`InvoiceDate` AS `InvoiceDate`, `i`.`TotalAmount` AS `TotalAmount`, `i`.`Status` AS `InvoiceStatus`, `p`.`PatientID` AS `PatientID`, `p`.`FullName` AS `PatientName` FROM (((`doctors` `d` join `appointments` `a` on(`d`.`DoctorID` = `a`.`DoctorID`)) join `invoices` `i` on(`i`.`InvoiceID` = `a`.`InvoiceID`)) join `patients` `p` on(`a`.`PatientID` = `p`.`PatientID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DoctorID` (`DoctorID`),
  ADD KEY `InvoiceID` (`InvoiceID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`AttendanceID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepartmentID`),
  ADD UNIQUE KEY `DepartmentName` (`DepartmentName`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorID`),
  ADD KEY `consultation fee` (`consultationFee`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `AttendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`DoctorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`InvoiceID`) REFERENCES `invoices` (`InvoiceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD CONSTRAINT `medicalrecords_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `departments` (`DepartmentID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
