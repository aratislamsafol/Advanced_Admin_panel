-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 07:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorise`
--

CREATE TABLE `categorise` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorise`
--

INSERT INTO `categorise` (`category_id`, `category_name`) VALUES
(8, 'php Development');

-- --------------------------------------------------------

--
-- Table structure for table `protfolios`
--

CREATE TABLE `protfolios` (
  `port_id` int(11) NOT NULL,
  `port_title` varchar(100) NOT NULL,
  `port_des` longtext NOT NULL,
  `port_img` varchar(100) NOT NULL,
  `port_link` varchar(100) NOT NULL,
  `port_skills` varchar(200) NOT NULL,
  `port_category` int(11) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `protfolios`
--

INSERT INTO `protfolios` (`port_id`, `port_title`, `port_des`, `port_img`, `port_link`, `port_skills`, `port_category`, `created_by`, `created_at`) VALUES
(2, 'Tesla Website', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1fd62a755b759f516438dd2e0b2129b6.jpg', 'https://www.google.com', 'HTML5, CSS3, php, MySQLi, Bootstrap', 8, 'a', '2021-01-13 00:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(30) NOT NULL,
  `slider_title` varchar(100) NOT NULL,
  `slider_img` text NOT NULL,
  `slider_des` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_title`, `slider_img`, `slider_des`, `created_at`, `created_by`) VALUES
(35, 'What is Lorem Ipsum?', 'd.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-01-12 23:49:11', 'kabbojsr'),
(36, 'What is Lorem Ipsum?', 'b.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-01-12 23:49:28', 'kabbojsr'),
(37, 'What is Lorem Ipsum?', 'c.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-01-13 23:45:23', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_img` varchar(1000) NOT NULL,
  `user_full_name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpass` varchar(20) NOT NULL,
  `usercontact` int(15) NOT NULL,
  `useraddress` text NOT NULL,
  `userrole` varchar(15) NOT NULL,
  `login_token` varchar(64) NOT NULL,
  `created_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_img`, `user_full_name`, `username`, `useremail`, `userpass`, `usercontact`, `useraddress`, `userrole`, `login_token`, `created_at`) VALUES
(16, '', 'a', 'a', 'a@gmail.com', 'a', 1, 'a', 'admin', '0cc175b9c0f1b6a831c399e269772661', '00:04:24'),
(17, '', 'M H A Kabbo', 'kabbojsr', 'kabbojsrcoc6@gmail.com', '123', 1812092169, 'Jashore.', 'admin', '', '00:07:16'),
(18, '', 'khan kamrul islam', 'arat', 'khankamrulislammoni123@gmail.com', '123', 123, 'sdfgdsf', 'visitor', '89eb4e7db61b58abf749446f3776ba42', '12:14:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorise`
--
ALTER TABLE `categorise`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `protfolios`
--
ALTER TABLE `protfolios`
  ADD PRIMARY KEY (`port_id`),
  ADD KEY `PortCategory` (`port_category`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorise`
--
ALTER TABLE `categorise`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `protfolios`
--
ALTER TABLE `protfolios`
  MODIFY `port_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `protfolios`
--
ALTER TABLE `protfolios`
  ADD CONSTRAINT `PortCategory` FOREIGN KEY (`port_category`) REFERENCES `categorise` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
