-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 11:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login2`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `criminal_charges` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `form1`
--

CREATE TABLE `form1` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `criminal_charges` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_document` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `yes_count` int(20) NOT NULL,
  `no_count` int(20) NOT NULL,
  `voted` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form1`
--

INSERT INTO `form1` (`id`, `name`, `email`, `phone_number`, `city`, `criminal_charges`, `image`, `pdf_document`, `status`, `yes_count`, `no_count`, `voted`) VALUES
(6, 'Aayush Kumbhar', 'aayush12@gmail.com', '8454025555', 'Mumbai', 'Had a Case regarding Half murder', 'man-pointing-forward-with-finger.jpg', 'be_computer-engineering_semester-6_2023_may_artificial-intelligencerev-2019-c-scheme (2).pdf', 0, 0, 0, 0),
(8, 'Pranav Shirsat', 'pranavshirsat06@gmail.com', '8454025555', 'Mumbai', 'Had a Case regarding robbery', 'young-handsome-caucasian-man-wearing-glasses-looking-camera-isolated-olive-green-background-with-copy-space.jpg', 'be_computer-engineering_semester-6_2022_december_artificial-intelligencerev-2019-c-scheme.pdf', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `servicer`
--

CREATE TABLE `servicer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `describer` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicer`
--

INSERT INTO `servicer` (`id`, `name`, `email`, `phone_number`, `city`, `describer`, `image`, `pdf_document`) VALUES
(1, 'Pranav', 'pranavshirsat06@gmail.com', '8454024869', 'Mumbai', 'Student', 'medium-shot-smiley-man-holding-crossed-arms.jpg', 'be_computer-engineering_semester-6_2023_may_artificial-intelligencerev-2019-c-scheme.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` bigint(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `documents` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'pranav', 'pra11@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'd07df85d1bff1c54b657504991a267a0', 0),
(2, 'ABC', 'ABC@11', '6512bd43d9caa6e02c990b0a82652dca', '020414bef8be75216726ef0a7752a215', 0),
(3, 'Sanket Nehe', 'Sanket21@gmail.com', 'e5dc8bcdf6c9ba59f3c2d3e9b437966b', '46789c83c44171063bd888f2178a4019', 0),
(4, 'Admin11', 'Admin11@gmail.com', '32c43f6234ea1cf0851bec3b4f907733', 'd0ba92f6d139e36aa2a5c77f9628ac71', 0),
(6, 'Aayush Kumbhar', 'aayush12@gmail.com', 'f0161b619c0c4717b83419471cacf885', '4f69c4b6c90fa9ec84d6c3da72f778d8', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form1`
--
ALTER TABLE `form1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicer`
--
ALTER TABLE `servicer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form1`
--
ALTER TABLE `form1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `servicer`
--
ALTER TABLE `servicer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
