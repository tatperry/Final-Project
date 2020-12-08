-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 12:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
(30, 'Tatiana', 'Perry', 'tatper', 'bobo1', 2);

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
(1, 'Blue Pearl', '150.00', 'Romantic', 'Couples get away, with a short walk to town. ', 'South Haven, Michigan', 'https://images.unsplash.com/photo-1505819244306-ef53954f9648?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=944&q=80'),
(2, 'Sparkling Upscale Condos', '145.00', 'Family Vacation', 'Stunning beachfront views, for the whole family to enjoy!', 'Orange Beach, Alabama', 'https://images.unsplash.com/photo-1544143086-828f66ac3945?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80'),
(3, 'King\'s Deer Lodge', '269.00', 'Friends Getaway ', 'This getaway is for friends and family to enjoy the great outdoors. ', 'McKinley Park, Denali National Park, Alaska.', 'https://images.unsplash.com/photo-1578222784726-7e10e19e00f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1900&q=80'),
(4, 'Ideal Mountain Home', '150.00', 'Family Vacation', 'Great outdoor hiking adventure for you and your family. ', 'Estes Park, Colorado', 'https://images.unsplash.com/photo-1587174898565-e030b2e2ce49?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1951&q=80'),
(5, 'Hill City\'s Finest', '353.00', 'Adventure', 'One on one interaction with real wildlife. ', 'Hill City, South Dakota', 'https://images.unsplash.com/photo-1501183638710-841dd1904471?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'),
(6, 'Peace on Heaven', '265.00', 'Romantic', 'This is a romantic vacation full of luxurious dining and activities for you and a loved one. ', 'Napili-Honokowai, Lahaina, Hawaii', 'https://images.unsplash.com/photo-1586982599726-11708daaceca?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1951&q=80'),
(7, 'Cottage on Ocean Bluff', '200.00', 'Friends Getaway ', 'A relaxing getaway in valleys, cliffs and mountains.  ', 'Trinidad, California', 'https://images.unsplash.com/photo-1510963836752-e036536bd797?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1191&q=80'),
(8, 'French Country Cottage', '299.00', 'Adventure ', 'Explore the history of an old town in a storybook setting.', 'Logan, Ohio', 'https://images.unsplash.com/photo-1580202313707-46a966af5c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1043&q=80'),
(9, 'I Would Rather Make Sandcastles', '90.00', 'Family Vacation', 'Come and bring the family for a stay of fun in the sand. ', 'Panama City Beach, Florida', 'https://images.unsplash.com/photo-1517541866997-ea18e32ea9e9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80'),
(10, 'Family Cottage', '108.00', 'Family Vacation', 'Bring back family time with this sweet little cottage, cozy up, and watch a movie. ', 'Michigan City, Indiana', 'https://images.unsplash.com/photo-1523390977854-b43755bea8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
