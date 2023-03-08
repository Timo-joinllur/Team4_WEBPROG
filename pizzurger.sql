-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 08, 2023 at 05:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzurger`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` varchar(200) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `text`, `visible`) VALUES
(1, 4, 'Comment', 1),
(2, 4, 'comment 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `price1` int NOT NULL,
  `price_Discount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price1`, `price_Discount`) VALUES
(4, 'Sea Pizza', 12, 10),
(5, 'Cheeseburger', 8, 6),
(6, 'Pepperoni Pizza', 10, 8),
(7, 'Vegetables Pizza', 8, 7),
(8, 'Special Burger', 15, 12),
(9, 'Triple Burger', 18, 15);

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `img_name` varchar(60) NOT NULL,
  `img_link` varchar(60) NOT NULL,
  `text` varchar(200) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `name`, `img_name`, `img_link`, `text`, `visible`) VALUES
(1, 'one', 'burger1.jpg', 'images/burger1.jpg', 'Over the fire cooked burgers with perfectly balanced combinations of fresh ingredients', 1),
(2, 'pizza1', 'pizza1.jpg', 'images/pizza1.jpg', 'Pizzas cooked in medieval stove, always hot for our guests', 1),
(3, 'three', 'pizza2.jpg', 'images/pizza2.jpg', 'We know best combinations of flavors. There is no secret - it is an art of our chef.', 1),
(4, 'pizza3', 'pizza3.jpg', 'images/pizza3.jpg', 'Can you get anything better elsewhere?', 1),
(6, 'pizza3', 'pizza3.jpg', 'images/pizza3.jpg', 'Can you get anything better elsewhere?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `description` varchar(60) NOT NULL,
  `img_name` varchar(60) NOT NULL,
  `img_link` varchar(60) NOT NULL,
  `price1` int DEFAULT NULL,
  `price2` int DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time` datetime NOT NULL,
  `text` varchar(60) NOT NULL,
  `complete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `received`, `time`, `text`, `complete`) VALUES
(1, 4, '2023-03-06 08:29:29', '2023-03-12 10:29:00', '235626', 0),
(2, 4, '2023-03-07 08:57:03', '2023-03-02 14:59:00', 'gimme food', 0),
(3, 4, '2023-03-07 13:13:09', '2023-03-16 15:16:00', 'foooooood', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fname` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `purchases` int DEFAULT '0',
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `purchases`, `admin`) VALUES
(3, 'Mitch', 'Valenta', 0, NULL),
(4, 'da', 'da', 0, 1),
(5, 'ad', 'ad', 0, NULL),
(6, 'ha', 'ha', 0, NULL),
(7, 'daaa', 'dada', 0, NULL),
(8, 'd', 'd', 0, NULL),
(9, 'Hello', 'aLLo', 0, NULL),
(10, 'Gdsgdsg', 'adshadfh', 0, NULL),
(11, 'Jimo', 'Bimo', 0, NULL),
(12, 'daaagsgasg', 'asdhdfashas', 0, NULL),
(13, 'qwtwery', 'urtu', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
