-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2020 at 02:18 PM
-- Server version: 8.0.19-0ubuntu0.19.10.3
-- PHP Version: 7.3.14-6+ubuntu19.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` bigint NOT NULL,
  `amount` int NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(1, 500, 'Siam', '123456', 'Banana', 'sam@mail.com', '127.0.0.1', 'There is something', 'Dhaka', '01749798295', '123456789', '2020-02-16', 1),
(2, 200, 'RK', '332211', 'apple', 'rk@mail.com', '122.22.11.3', 'sss', 'naogaon', '01749798295', 'erfdfhdgfz', '2020-02-01', 1),
(3, 200, 'RK', '332211', 'apple', 'rk@mail.com', '122.22.11.3', 'sss', 'naogaon', '01749798295', 'erfdfhdgfz', '2020-02-01', 1),
(4, 200, 'RK', '332211', 'apple', 'rk@mail.com', '122.22.11.3', 'sss', 'naogaon', '01749798295', 'erfdfhdgfz', '2020-02-01', 1),
(5, 200, 'RK', '332211', 'apple', 'rk@mail.com', '122.22.11.3', 'sss', 'naogaon', '01749798295', '0f6a97a713bd2815db47059938f49ef37dec2ad5800cfd93aa5fd5513ed2e5ba63eacd227fb4adf5474f3013e4586fb1409c38d02f476720830e4092b8270108', '2020-02-01', 1),
(6, 50000, 'Siam', 'dasfdas', 'sdfsf sdf sf sf', 'shahriyear@gmail.com', '122.22.11.99', 'dfsf', 'Joypurhat', '01749798295', '7627831ea0f12a231ea7ab83ee9eb3bf521ef2119b1962e6a4690394e821caf93b136a92b3328411a5ed6093160d4e953be4ba1399a029054b7dca3e2621435a', '2020-02-16', 345345),
(7, 50000, 'Siam 555', '12345678', 'sdfsf sdf sf sf', 'shahriyear@gmail.com', '122.22.11.99', 'sfsdfg', 'Joypurhat', '01749798295', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '2020-02-16', 345345345),
(8, 50000, 'Siam 88', 'dasfdas', 'sdfsf sdf sf sf', 'shahriyear@gmail.com', '122.22.11.99', '123123', 'Joypurhat', '01749798295', '7627831ea0f12a231ea7ab83ee9eb3bf521ef2119b1962e6a4690394e821caf93b136a92b3328411a5ed6093160d4e953be4ba1399a029054b7dca3e2621435a', '2020-02-16', 3),
(9, 50000, 'Siam 88', 'dasfdas', 'sdfsf sdf sf sf', 'shahriyear@gmail.com', '122.22.11.99', '123123', 'Joypurhat', '01749798295', '7627831ea0f12a231ea7ab83ee9eb3bf521ef2119b1962e6a4690394e821caf93b136a92b3328411a5ed6093160d4e953be4ba1399a029054b7dca3e2621435a', '2020-02-16', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
