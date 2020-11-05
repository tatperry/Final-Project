-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 09:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_db`
--
CREATE DATABASE IF NOT EXISTS `travel_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `travel_db`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `gender` char(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `address`, `phone`, `email`, `description`) VALUES
(1, 'John Smith ', 'male', '100 east second st, Greenwood IN', '3179627211', 'Jsmith@gmail.com', NULL),
(2, 'Jane Doe', 'Female', '1256 Bourden Lane,Fishers IN', '3175662311', 'Jdoe@yahoo.com', NULL),
(3, 'Jason Mcgee', 'Male', '3211 South Eagle St, Indianapolis IN', '3172646677', 'Jmcgee@gmail.com', NULL),
(4, 'Mickey Mouse ', 'Male', '3456 Fish Scoop Dr,  Greenfield IN', '3178147653', 'Mmouse@yahoo.com', NULL),
(5, 'Minnie Mouse ', 'Female', '7685 Greenhouse Dr, Indianapolis IN', '3175678977', 'Mmouse21@gmail.com', NULL),
(6, 'Simon Cowell', 'male', '5462 Hawkeye Dr, Indianapolis IN', '3174567834', 'Simoncowell@gmail.com', NULL),
(7, 'Jack McLaren', 'male', '3452 Globetrotter Lane, St. Pete Beach, FL', '3176543212', 'JackM2321@yahoo.com', NULL),
(8, 'Daisy Duck ', 'female', '7865 Windy Creek Lane, Indianapolis IN', '3173566788', 'Duckygal@gmail.com', NULL),
(9, 'Jessica Ferrell', 'female', '6756 Southlake Corner Dr, Fishers IN', '3167568897', 'Jessica1F@gmail.com', NULL),
(10, 'Rachel Barnack ', 'female', '4567 Rioorilla Dr, Greencastle IN', '3175667898', 'Rbarnack@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderinfo`
--

CREATE TABLE `orderinfo` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_address` varchar(120) NOT NULL,
  `vacation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderinfo`
--

INSERT INTO `orderinfo` (`order_id`, `date`, `customer_id`, `shipping_address`, `vacation_id`, `quantity`) VALUES
(1, '2020-06-21', 1, '100 east second st, Greenwood IN', 1, 0),
(2, '2020-06-14', 2, '1256 Bourden Lane , Fishers IN', 2, 0),
(3, '2020-06-16', 3, '3211 South Eagle St, Indianapolis IN', 3, 0),
(4, '2020-07-12', 4, '3456 Fish Scoop Dr, Greenfield IN', 4, 0),
(5, '2020-07-21', 5, '7685 Greenhouse Dr, Indianapolis IN', 5, 0),
(6, '2020-07-06', 6, '5462 Hawkeye Dr, Indianapolis IN', 6, 0),
(7, '2020-08-01', 7, '3452 Globetrotter Lane, St. Pete Beach FL', 7, 0),
(8, '2020-07-01', 8, '7865 Windy Creek Lane, Indianapolis IN', 8, 0),
(9, '2020-06-05', 9, '6756 Southlake Corner Dr, Fishers IN', 9, 0),
(10, '2020-06-10', 10, '4567 Rioorilla Dr, Greencastle IN', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `role`) VALUES
(1, 'Super', 'Admin', 'admin', 'password', 1),
(2, 'Kevin', 'Smith', 'guest', 'password', 2),
(29, 'jada', 'ruffin', 'test', 'password', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vacations`
--

CREATE TABLE `vacations` (
  `vacation_id` int(11) NOT NULL,
  `product` varchar(120) NOT NULL,
  `price_per_person` decimal(7,2) NOT NULL,
  `type` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `location` text NOT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacations`
--

INSERT INTO `vacations` (`vacation_id`, `product`, `price_per_person`, `type`, `description`, `location`, `image`) VALUES
(1, 'Oasis', '1299.99', 'Relaxation', 'Parent\'s getaway to a relaxing island.', 'Fiji', 'oasis.jpg'),
(2, 'Atlantis ', '1145.00', 'Family Vacation', 'Family vacation package to Atlantis Paradise island. ', 'The Bahamas', 'atlantis.jpg'),
(3, 'Sandals ', '798.99', 'Romantic', 'A romantic couple\'s getaway weekend. ', 'Jamaica ', 'sandles.jpg'),
(4, 'The Grand Canyon', '150.00', 'Adventure', 'Great outdoor hiking adventure for you and your family. ', 'Arizona', 'grandCanyon.jpg'),
(5, 'African Safari', '2.00', 'Adventure', 'One on one interaction with real wildlife. ', 'Namibia', 'Safari.jpg'),
(6, 'Palm Springs ', '1000.00', 'Romantic', 'This is a romantic vacation full of luxurious dining and activities for you and a loved one. ', 'California', 'palmSprings.jpg'),
(7, 'The Garden Island', '900.00', 'Relaxation', 'A relaxing getaway in valleys, cliffs and mountains.  ', 'Kauai Hawaii', 'gardenIsland.jpg'),
(8, 'Kayaking Down Galapagos Islands', '4995.00', 'Adventure ', 'All inclusive kayaking trip with other special activities included. ', 'Galapagos Islands', 'kayaking.jpg'),
(9, 'Cruise-Deluxe Edition ', '599.00', 'Family Vacation', 'Come and  join us on the widest cruise of a lifetime! All inclusive thirteen-night stay.  ', 'Caribbean Cruise Ship', 'cruiseShip.jpeg'),
(10, 'Disney World', '600.00', 'Family Vacation', 'Join the Disney family with Mickey and all of your favorite characters! ', 'Florida', 'disney.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vacation_id` (`vacation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`vacation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderinfo`
--
ALTER TABLE `orderinfo`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `vacation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderinfo`
--
ALTER TABLE `orderinfo`
  ADD CONSTRAINT `orderinfo_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `orderinfo_ibfk_2` FOREIGN KEY (`vacation_id`) REFERENCES `vacations` (`vacation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
