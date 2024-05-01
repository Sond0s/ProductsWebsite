-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 4:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET AUTOCOMMIT = 0;
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skincare_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--


-- create products table 

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `brand_id` varchar(200) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ingredient_id` int(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `skintype_id` int(11)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- create brands table 
CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- create category table 
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- create ingredient table 
CREATE TABLE `ingredient` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- create skintypes table 
CREATE TABLE `skintype` (
  `skin_id` int(11) NOT NULL,
  `skin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- create users register table 
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- wishlist table
CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- Indexes for table `brand`
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);


-- Indexes for table `category`
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

-- Indexes for table `ingredient`
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_id`);


-- Indexes for table `skintype`
ALTER TABLE `skintype`
  ADD PRIMARY KEY (`skin_id`);


-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Starting AUTO_INCREMENT
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skintype`
--
ALTER TABLE `skintype`
  MODIFY `skin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
--
-- Dumping data for table `product`
--

-- INSERT INTO `product` (`product_id`, `brand_id`, `product_name`, `product_price`, `image`, `description`, `ingredient_id`, `category_id` , `skintype_id`) VALUES
-- (1, 1, 'Starville whitening cleanser', 152.00, './products/starville-whitening.jpeg', 'cleanser',1,1,1 );


----------------------------------------------------------


INSERT INTO `brand` (`brand_id`,`brand_name`) VALUES
(1, 'Starville'),
(2, 'Bobai');

-- --------------------------------------------------------
INSERT INTO `ingredient` (`ingredient_id`, `ingredient_name`) VALUES
(1, 'Tea tree oil');


INSERT INTO `categeory` (`category_id`,`category_name`) VALUES
(1, 'cleanser');


INSERT INTO `skintype` (`skin_id`,`skin_name`) VALUES
(1, 'oily');

--
-- Table structure for table `wishlist`
--


--
-- Indexes for dumped tables
--

--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
