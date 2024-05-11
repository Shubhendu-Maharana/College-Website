-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 08:29 AM
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
-- Database: `college_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`username`, `password`) VALUES
('shubhendu', 'shubhendu3');

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`name`, `age`, `expertise`, `join_date`) VALUES
('Durga Prasad Mohapatra', 35, 'M Tech in Cloud Computing', '2000-01-01'),
('Swetalina Panda', 24, 'B Tech', '2024-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `student_credentials`
--

CREATE TABLE `student_credentials` (
  `roll_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_credentials`
--

INSERT INTO `student_credentials` (`roll_no`, `password`) VALUES
('RM104222', 'monalisa'),
('RM106822', 'monalisa');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `roll_no` varchar(255) NOT NULL,
  `payable` decimal(10,2) NOT NULL DEFAULT 0.00,
  `others` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid` decimal(10,0) DEFAULT 0,
  `dues` decimal(10,0) GENERATED ALWAYS AS (`payable` + `others` - `paid`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`roll_no`, `payable`, `others`, `paid`) VALUES
('RM103333', 80000.00, 0.00, 78550),
('RM104222', 75000.00, 0.00, 45000),
('RM106822', 75000.00, 8000.00, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `roll_no` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `admission_date` date DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`roll_no`, `name`, `age`, `course`, `semester`, `contact_no`, `address`, `admission_date`, `picture`) VALUES
('RM103333', 'Shubhlisa Maharana', 19, 'MCA', 3, '1234567890', 'BBSR', '2022-05-19', '../server/student_images/RM103333.jpg'),
('RM104222', 'Monalisa Jena', 18, 'BCA', 3, '7846941199', 'Gunasagar, Patapur, Ganjam', '2004-08-22', '../server/student_images/RM104222.jpg'),
('RM106822', 'Shubhendu Maharana', 20, 'BCA', 3, '6370688929', 'Jayapur, Aska, Ganjam', '2003-05-09', '../server/student_images/RM106822.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `roll_no` varchar(255) NOT NULL,
  `exam_name` varchar(255) DEFAULT NULL,
  `mark` decimal(5,0) NOT NULL DEFAULT 0,
  `full_marks` decimal(5,0) NOT NULL DEFAULT 0,
  `exam_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`roll_no`, `exam_name`, `mark`, `full_marks`, `exam_date`) VALUES
('RM106822', '2nd Year 1st Internal', 110, 130, '2023-11-16'),
('RM106822', '2nd Year 2nd Internal', 115, 130, '2024-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE `student_payments` (
  `roll_no` varchar(255) NOT NULL,
  `payment_amt` decimal(10,0) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_payments`
--

INSERT INTO `student_payments` (`roll_no`, `payment_amt`, `payment_date`, `remark`) VALUES
('RM106822', 50000, '2024-02-20', 'PhonePe'),
('RM104222', 5000, '2024-02-19', 'Paytm'),
('RM104222', 40000, '2024-02-20', 'Cash'),
('RM103333', 78550, '2024-02-20', 'Cash'),
('RM106822', 30000, '2024-02-23', 'Paytm');

--
-- Triggers `student_payments`
--
DELIMITER $$
CREATE TRIGGER `paid` AFTER UPDATE ON `student_payments` FOR EACH ROW BEGIN
    UPDATE student_fees t
    SET t.paid = (
        SELECT SUM(payment_amt)
        FROM student_payments a
        WHERE a.roll_no = t.roll_no
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_paid_column` AFTER UPDATE ON `student_payments` FOR EACH ROW BEGIN
    UPDATE student_fees t
    SET t.paid = (
        SELECT SUM(payment_amt)
        FROM student_payments a
        WHERE a.roll_no = t.roll_no
    );
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `student_credentials`
--
ALTER TABLE `student_credentials`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`roll_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
