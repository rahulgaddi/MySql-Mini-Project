-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 11:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `a_id` int(9) NOT NULL,
  `aname` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`a_id`, `aname`, `password`, `email`, `address`, `phno`) VALUES
(111, 'Acko', '111', 'xyz@gmail.com', 'Banglore', '9999999999'),
(222, 'Automotors', '222', 'zzz@gmail.com', 'Hyderabad', '8888888888'),
(333, 'policybazar', '333', 'yyy@gmail.com', 'Banglore', '7777777777');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `ino` int(9) NOT NULL,
  `iname` varchar(20) DEFAULT NULL,
  `amount` int(30) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `a_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`ino`, `iname`, `amount`, `duration`, `a_id`) VALUES
(1, 'car', 85000, 3, 111),
(2, 'bike', 50000, 3, 222),
(3, 'scooty', 25000, 1, 333),
(4, 'auto', 45000, 3, 222),
(5, 'truck', 80000, 1, 111);

--
-- Triggers `insurance`
--
DELIMITER $$
CREATE TRIGGER `deleteLog` BEFORE DELETE ON `insurance` FOR EACH ROW INSERT INTO logs VALUES(null, OLD.iname, OLD.ino, 'DELETED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleted_insurance` AFTER DELETE ON `insurance` FOR EACH ROW INSERT INTO old_insurance
SET ino=OLD.ino,
iname=OLD.iname,
amount=OLD.amount,
a_id=OLD.a_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `insurance` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.iname, NEW.ino, 'INSERTED', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `ino` int(9) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `iname`, `ino`, `action`, `cdate`) VALUES
(1, 'auto', 1, 'INSERTED', '2022-01-22 12:55:14'),
(2, 'auto', 2, 'INSERTED', '2022-01-22 13:02:35'),
(3, 'auto', 3, 'DELETED', '2022-01-22 13:13:44'),
(4, 'bike', 6, 'INSERTED', '2022-02-05 11:34:45'),
(5, 'bike', 6, 'DELETED', '2022-02-05 11:35:52'),
(23, 'truck', 5, 'INSERTED', '2022-02-09 10:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `old_insurance`
--

CREATE TABLE `old_insurance` (
  `ino` int(9) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `a_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `old_insurance`
--

INSERT INTO `old_insurance` (`ino`, `iname`, `amount`, `a_id`) VALUES
(2, 'bike', 40000, 222),
(1, 'car', 10000, 111),
(4, 'bus', 150000, 111),
(4, 'bus', 180000, 222),
(4, 'auto', 50000, 111),
(6, 'bike', 5000, 111),
(8, 'bike', 1000, 111),
(7, 'bike', 5000, 111),
(6, 'bike', 5000, 111),
(6, 'tain', 1000, 222);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `u_id` int(10) DEFAULT NULL,
  `p_no` int(10) NOT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `p_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `a_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`u_id`, `p_no`, `amount`, `p_date`, `a_id`) VALUES
(2, 2, '5000', '0000-00-00 00:00:00', 111),
(2, 3, '5000', '0000-00-00 00:00:00', 111),
(2, 4, '1000', '0000-00-00 00:00:00', 111),
(2, 5, '50000', '0000-00-00 00:00:00', 222),
(2, 6, '50000', '0000-00-00 00:00:00', 222),
(2, 7, '50000', '0000-00-00 00:00:00', 222),
(2, 8, '50000', '0000-00-00 00:00:00', 222),
(2, 9, '5000', '0000-00-00 00:00:00', 111),
(2, 10, '50000', '0000-00-00 00:00:00', 111),
(2, 11, '3653 ', '0000-00-00 00:00:00', 222),
(2, 12, '8000', '0000-00-00 00:00:00', 111),
(2, 13, '50000', '0000-00-00 00:00:00', 111),
(2, 14, '5000', '0000-00-00 00:00:00', 111),
(2, 15, '45000', '0000-00-00 00:00:00', 111),
(2, 16, '75000', '0000-00-00 00:00:00', 222),
(2, 17, '50000', '0000-00-00 00:00:00', 111),
(2, 18, '50000', '0000-00-00 00:00:00', 111),
(2, 19, '50000', '0000-00-00 00:00:00', 222),
(2, 20, '45000', '0000-00-00 00:00:00', 111),
(2, 21, '70000', '0000-00-00 00:00:00', 222),
(3, 22, '4656', '0000-00-00 00:00:00', 111);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(9) NOT NULL,
  `reg_no` int(9) DEFAULT NULL,
  `reg_date` varchar(20) DEFAULT NULL,
  `reg_status` varchar(20) DEFAULT NULL,
  `ino` int(9) DEFAULT NULL,
  `u_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `reg_no`, `reg_date`, `reg_status`, `ino`, `u_id`) VALUES
(0, 6561, '10th  February - 202', 'Rejected', 4, 1),
(25, 6551, '22nd  January - 2022', 'Accepted', 1, 2),
(26, 6552, '5th  February - 2022', 'Accepted', 2, 1),
(31, 6553, '8th  February - 2022', 'Rejected', 1, 2),
(35, 6557, '8th  February - 2022', 'Accepted', 1, 2),
(38, 6560, '9th  February - 2022', 'noaction', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `aadhar` varchar(12) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `password`, `aadhar`, `address`, `email`, `phno`) VALUES
(1, 'priya', 'priya', '555555555555', 'udupi', 'priya@gmail.com', '9638527412'),
(2, 'rahul', 'rahul', '147852369845', 'bangalore', 'rahul@gmail.com', '9513578964'),
(3, 'mearu', 'mearu', '123456789012', 'dsdnsdjksdjskdhjsknddjidjs', 'mearu@gmail.com', '7894561237');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `veh_id` int(20) NOT NULL,
  `veh_no` varchar(20) NOT NULL,
  `veh_type` varchar(20) NOT NULL,
  `veh_desc` varchar(20) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`veh_id`, `veh_no`, `veh_type`, `veh_desc`, `u_id`) VALUES
(19, 'ka4567123', '4 wheeler', '456123', 1),
(20, 'ka456123', '2 wheeler', 'ka4567231', 1),
(22, 'ka456789', '2 wheeler', 'ka456789', 2),
(23, 'ka123456', '3 wheeler', 'ka456789', 2),
(24, 'ka456789', '3 wheeler', 'ka20210034045', 1),
(25, 'k159876', '', 'ka456123', 1),
(26, 'ka78456', '', 'ka789654', 2),
(27, 'ka456789', '', 'ka123456', 1),
(28, 'ka37ed5315', '', 'ka455851658', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`ino`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_no`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`),
  ADD KEY `userid` (`u_id`),
  ADD KEY `ino` (`ino`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`veh_id`),
  ADD KEY `uid` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `ino` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `veh_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `ino` FOREIGN KEY (`ino`) REFERENCES `insurance` (`ino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `uid` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
