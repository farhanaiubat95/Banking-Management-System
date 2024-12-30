-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2024 at 09:28 PM
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
-- Database: `db_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_login`
--

CREATE TABLE `tb_customer_login` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) DEFAULT NULL,
  `acc_number` int(50) DEFAULT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `c_email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` int(15) DEFAULT NULL,
  `nid_no` int(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_customer_login`
--

INSERT INTO `tb_customer_login` (`c_id`, `c_name`, `acc_number`, `f_name`, `m_name`, `c_email`, `address`, `contact`, `nid_no`, `password`) VALUES
(1, 'Farhana Bente Islam', 1234, 'Fardin', 'Faria', 'farhana@iubat.edu', 'Sector 10,Uttara', 1245647567, 2147483647, '1234'),
(2, 'Arifa Tur Rahman', 2134, 'alif', 'abida', 'arifa@iubat.edu', 'Uttara', 2147483647, 2147483647, '2134'),
(3, 'Lina', 3124, 'Linkon', 'Linia', 'lina@iubat.edu', 'Dhaka', 2147483647, 213243657, '3124'),
(4, 'Piya', 4123, 'Piyan', 'Piyushi', 'piya@iubat.edu', 'Mohakhali', 1345657677, 1243546576, '4123'),
(5, 'Farhana ', 5123, 'Farhan', 'Faria', 'farhana@iubat.edu', 'Gazipur', 1590076800, 2147483647, '5123');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `t_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_type` enum('Deposit','Withdraw') DEFAULT NULL,
  `account_balance` decimal(10,2) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`t_id`, `c_id`, `amount`, `transaction_type`, `account_balance`, `transaction_date`) VALUES
(1, 1, 10000.00, 'Deposit', 10000.00, '2024-12-29 12:07:41'),
(2, 1, 5000.00, 'Withdraw', 5000.00, '2024-12-29 12:10:06'),
(3, 2, 20000.00, 'Deposit', 20000.00, '2024-12-29 14:43:20'),
(4, 1, 20000.00, 'Deposit', 25000.00, '2024-12-29 16:40:31'),
(5, 1, 5000.00, 'Withdraw', 20000.00, '2024-12-29 18:53:22'),
(6, 3, 50000.00, 'Deposit', 50000.00, '2024-12-29 19:31:38'),
(7, 4, 20000.00, 'Deposit', 20000.00, '2024-12-29 19:36:32'),
(8, 5, 30000.00, 'Deposit', 30000.00, '2024-12-29 19:39:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer_login`
--
ALTER TABLE `tb_customer_login`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customer_login`
--
ALTER TABLE `tb_customer_login`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `tb_customer_login` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
