-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 09:00 AM
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
-- Database: `cargo-booking-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `re-password` varchar(100) NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `contact`, `city`, `email`, `password`, `re-password`, `datatime`) VALUES
(1, 'Maruf Hasnat', 1752276521, 'Rajshahi', 'marufhasnat@gmail.com', '123457', '123457', '2022-04-09 07:45:49'),
(2, 'Ishaque Mahmud', 1346583921, 'Chattogram', 'ishaque@gmail.com', '123456', '123456', '2022-04-09 11:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `driver_id` int(50) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `volume` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_contact` varchar(50) NOT NULL,
  `sender_address` varchar(50) NOT NULL,
  `sender_city` varchar(50) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_email` varchar(50) NOT NULL,
  `receiver_contact` varchar(50) NOT NULL,
  `receiver_address` varchar(50) NOT NULL,
  `receiver_city` varchar(50) NOT NULL,
  `tracking_id` varchar(50) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `user_id`, `driver_id`, `weight`, `volume`, `quantity`, `date`, `sender_name`, `sender_email`, `sender_contact`, `sender_address`, `sender_city`, `receiver_name`, `receiver_email`, `receiver_contact`, `receiver_address`, `receiver_city`, `tracking_id`, `status`) VALUES
(1, 1, 1, '80', '60', '10', '2022-04-12', 'Maruf Hasnat', 'mrfhasnat@gmail.com', '01889104482', 'Uttara Dhaka', 'Dhaka', 'Shakil Ahmed', 'shakil@gmail.com', '01759871555', 'Sonadighi Mosjid Rajshahi', 'Rajshahi', '0748aacb01da4dd1aa30ee5083295b7f', 2),
(2, 1, 2, '80', '20', '10', '2022-04-12', 'Maruf Hasnat', 'mrfhasnat@gmail.com', '01889104482', 'Uttara Dhaka', 'Dhaka', 'Sajib Sarker', 'sajib@gmail.com', '01759275731', 'Rangpur Town', 'Rangpur', '6238324c644fc582a0a264c48bdc395a', 2),
(3, 3, 1, '80', '80', '80', '2022-04-12', 'Ishaque Mahmud', 'ishaque@gmail.com', '01834931223', 'Chattogram Sadar', 'Chattogram', 'Maruf Hasnat', 'mrfhasnat@gmail.com', '01752276521', 'Uttara Dhaka', 'Dhaka', '21050382a1a5af889c238f02593b9be8', 2),
(4, 3, 2, '50', '80', '40', '2022-04-12', 'Ishaque Mahmud', 'ishaque@gmail.com', '01834931211', 'Chattogram Sadar', 'Chattogram', 'Salman Ali', 'salman@gmail.com', '01759871555', 'Dhaka Mirpur', 'Dhaka', 'da5c98913834fd48ddb77b68e938a3b2', 2),
(5, 8, 1, '60', '20', '10', '2022-04-12', 'Md. Omaer', 'omaer@gmail.com', '01832375322', 'Uttara Dhaka', 'Dhaka', 'Maruf Hasnat', 'maruf@gmail.com', '01752276521', 'Sonadighi Mosjid Rajshahi', 'Rajshahi', 'd7c4f9a6cb59af169751018f4f3f4a4e', 2);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `re-password` varchar(100) NOT NULL,
  `status` int(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `fullname`, `contact`, `email`, `password`, `re-password`, `status`, `amount`, `datetime`) VALUES
(1, 'Kuddus Mia', 1238492101, 'kuddus@gmail.com', '123456', '123456', 0, 5000, '2022-04-10 09:39:05'),
(2, 'Rajib Ali', 1556839213, 'rajib@gmail.com', '123456', '123456', 0, 0, '2022-04-10 09:41:43'),
(3, 'Sarder Ali', 1927267431, 'sarder@gmail.com', '123456', '123456', 0, 0, '2022-04-10 09:42:54'),
(4, 'Manik Dey', 1927328134, 'manik@gmail.com', '123456', '123456', 0, 0, '2022-04-10 09:44:12'),
(5, 'Mahmud Ali', 1678210391, 'mahmud@gmail.com', '123456', '123456', 0, 0, '2022-04-10 09:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'Maruf Hasnat', 'maruf@gmail.com', 'Service is very good :)'),
(3, 'Shakil Ahmed', 'shakil@gmail.com', 'The service is satisfying :)'),
(4, 'MD. NAYEEM MIAH', 'nayeem@gmail.com', 'The service is awesome :)'),
(6, 'Nayeem Hyder', 'nayeem@gmail.com', 'The service is very good :)');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `post_code` smallint(4) NOT NULL,
  `city` varchar(50) NOT NULL,
  `division` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `post_code`, `city`, `division`) VALUES
(1, 1230, 'Uttara, Dhaka', 'Dhaka'),
(2, 6000, 'Rajshahi Town', 'Rajshahi'),
(3, 9000, 'Khulna Town', 'Khulna'),
(4, 8200, 'Barisal Town', 'Barisal'),
(5, 3100, 'Sylhet Town', 'Sylhet'),
(6, 4000, 'Chattogram Town', 'Chattogram'),
(7, 5402, 'Rangpur Town', 'Rangpur'),
(8, 2200, 'Mymensingh Town', 'Mymensingh');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `cargo_id` int(50) NOT NULL,
  `basic_price` varchar(20) NOT NULL,
  `weight_price` varchar(20) NOT NULL,
  `volume_price` varchar(20) NOT NULL,
  `total_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `user_id`, `cargo_id`, `basic_price`, `weight_price`, `volume_price`, `total_price`) VALUES
(1, 1, 1, '700', '931', '854', '2485'),
(2, 1, 2, '800', '1064', '888', '2752'),
(3, 3, 3, '1500', '1995', '1995', '5490'),
(4, 3, 4, '1500', '1995', '1995', '5490'),
(5, 8, 5, '700', '931', '777', '2408');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `tracking_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `user_id`, `tracking_id`, `status`, `location`, `date`) VALUES
(1, 1, '0748aacb01da4dd1aa30ee5083295b7f', 'delivered', 'Rajshahi', '2022-04-13'),
(2, 1, '6238324c644fc582a0a264c48bdc395a', 'delivered', 'Rangpur', '2022-04-13'),
(3, 3, '21050382a1a5af889c238f02593b9be8', 'delivered', 'Dhaka, Bangladesh', '2022-04-13'),
(4, 3, 'da5c98913834fd48ddb77b68e938a3b2', 'delivered', 'Dhaka, Bangladesh', '2022-04-13'),
(5, 8, 'd7c4f9a6cb59af169751018f4f3f4a4e', 'delivered', 'Rajshahi', '2022-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `re-password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `contact`, `city`, `email`, `password`, `re-password`, `datetime`) VALUES
(1, 'Maruf Hasnat', 1752276521, 'Rajshahi', 'mrfhasnat@gmail.com', '123457', '123457', '2022-03-19 13:42:10'),
(3, 'Ishaque Mahmud', 1834931211, 'Dhaka', 'ishaque@gmail.com', '123457', '123457', '2022-04-08 17:58:33'),
(4, 'Salaman Bahar', 1723467853, 'Mymensingh', 'salman@gmail.com', '123456', '123456', '2022-04-08 18:31:38'),
(7, 'Nayeem Hyder', 1783819498, 'Rajshahi', 'nayeem@gmail.com', '123456', '123456', '2022-04-11 14:25:37'),
(8, 'Md. Omaer ', 1832375322, 'Chattogram', 'omaer@gmail.com', '123456', '123456', '2022-04-12 16:19:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
