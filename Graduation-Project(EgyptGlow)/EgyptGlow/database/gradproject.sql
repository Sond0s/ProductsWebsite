-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 4:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33
-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
-- Database: `skincare_project`

-- create products table 
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `brand_id` varchar(200) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ingredient_id` int(50) NOT NULL,
  `ingredients` int(50) NOT NULL,
  `category_name` int(11) NOT NULL,
  `skintype_name` int(11)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create brands table 
CREATE TABLE `brand` (
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create category table 
CREATE TABLE `category` (
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create ingredient table 
CREATE TABLE `ingredient` (
  `ingredient_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create skintypes table 
CREATE TABLE `skintype` (
  `skintype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create users register table 
CREATE TABLE `user` (
  `user_id` int(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create wishlist table
CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL;
  `wishlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create evening table
CREATE TABLE `evening_routine` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL;
  `evening_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- create morning table
CREATE TABLE `morning_routine` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL;
  `morning_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- End Creation

-- Indexes for table `brand`
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_name`);

-- Indexes for table `category`
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

-- Indexes for table `ingredient`
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_name`);

-- Indexes for table `skintype`
ALTER TABLE `skintype`
  ADD PRIMARY KEY (`skintype_name`);

-- Indexes for table `product`
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

-- Indexes for table `user`
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

-- Indexes for table `evening`
ALTER TABLE `evening_routine`
  ADD PRIMARY KEY (`evening_id`);

-- Indexes for table `morning`
ALTER TABLE `morning_routine`
  ADD PRIMARY KEY (`morning_id`);

-- Indexes for table `wishlist`
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

-- End indexing

-- AUTO_INCREMENT for table `product`
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `brand`
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `category`
ALTER TABLE `category`
  MODIFY `category_name` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `ingredient`
ALTER TABLE `ingredient`
  MODIFY `ingredient_name` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `skintype`
ALTER TABLE `skintype`
  MODIFY `skin_id` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `user`
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `wishlist`
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `morning_routine`
ALTER TABLE `morning_routine`
  MODIFY `morning_id` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `evening_routine`
ALTER TABLE `evening_routine`
  MODIFY `evening_id` int(11) NOT NULL AUTO_INCREMENT;

-----
----
-----
-- Start inserting products in PHPMyAdmin Localhost server

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
