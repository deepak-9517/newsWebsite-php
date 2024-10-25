-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 01:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_post` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_post`) VALUES
(2, 'Cricket', 2),
(3, 'Jockes', 1),
(4, 'Polotical', 2),
(5, 'Movie', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(5) NOT NULL,
  `p_description` varchar(500) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_category` int(5) NOT NULL,
  `p_date` varchar(255) NOT NULL,
  `p_author` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_description`, `p_title`, `p_category`, `p_date`, `p_author`, `p_img`) VALUES
(1, 'The Indian Premier League is a men\'s Twenty20 cricket league that is annually held in India. The league is contested by ten city-based franchise teams. The BCCI founded the league in 2007. The competition is usually held in summer between March and May every year.', 'final match', 2, '23 Jan, 2024', '1', 'cricket.jpg'),
(2, 'A joke is a display of humour in which words are used within a specific and well-defined narrative structure to make people laugh and is usually not meant to be interpreted literally.', 'Today Jockes', 3, '23 Jan, 2024', '1', 'h.jpg'),
(3, 'India is a Socialist, Secular, Democratic Republic and the largest democracy in the World. The modern Indian nation state came into existence on 15th of August 1947. Since then free and fair elections have been held at regular intervals as per the principles enshrined in the Constitution, Electoral Laws and System.', 'Election', 4, '23 Jan, 2024', '1', 'gandhiji.png'),
(4, 'The ICC Men\'s T20 World Cup, is the Twenty20 International cricket tournament, organised by the International Cricket Council since 2007. The event has generally been held every two years.', 'T20 world cup', 2, '23 Jan, 2024', '1', 'yoga.jpg'),
(5, 'Salaar: Part 1 – Ceasefire (transl. Commander) is a 2023 Indian Telugu-language epic action film written and directed by Prashanth Neel and produced by Vijay Kiragandur. It stars Prabhas and Prithviraj Sukumaran, with a supporting cast that includes Shruti Haasan, Jagapathi Babu, Bobby Simha, Tinnu Anand, Easwari Rao, Sriya Reddy and Ramachandra Raju. Set in the fictional dystopian city-state of', 'Salar', 5, '23 Jan, 2024', '1', '1010057.jpg'),
(6, 'The film\'s initial story was pitched from Neel\'s debut film Ugramm (2014)[4] and is the maiden part of a two-part film. It was officially announced in December 2020 under the title Salaar, however, in July 2023, the official title was announced as Salaar:', 'KGF1', 5, '23 Jan, 2024', '2', 'b.jpg'),
(7, 'Elections have been the usual mechanism by which modern representative democracy has operated since the 17th century.[1] Elections may fill offices in the legislature, sometimes in the executive and judiciary, and for regional and local government. This process is also used in many other private and business organisations, from clubs to voluntary associations and corporations.', '2024 Election', 4, '23 Jan, 2024', '2', 'e.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(5) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_user` varchar(255) NOT NULL,
  `u_pwd` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_role` int(5) NOT NULL,
  `otp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_user`, `u_pwd`, `u_email`, `u_role`, `otp`) VALUES
(1, 'deepak', 'sahu', 'deepu', 'ee49d65319f42e5e594c24832d81961b', 'deepaksahu346431@gmail.com', 1, 1303),
(2, 'ayansh', 'sahu', 'prince', '2077e4a6bafa9b4e7b55e1fff16818af', 'princefav143@gmail.com', 0, 1444);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
