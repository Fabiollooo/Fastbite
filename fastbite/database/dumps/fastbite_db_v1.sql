-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2026 at 02:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastbite_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  `categoryDescription` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`categoryId`, `categoryName`, `categoryDescription`) VALUES
(1, 'Burgers', 'Beef burgers, classic hamburgers'),
(2, 'Chicken', 'Fried Chicken, chicken sandwiches'),
(3, 'Fries & Sides', 'Fries, onion rings, sides'),
(4, 'Drinks', 'Sodas, juices, shakes'),
(5, 'Desserts', 'Ice creams, cookies'),
(6, 'Salads', 'Healthy options'),
(7, 'Breakfast', 'Breakfast items if you serve them');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `categoryId` int(11) NOT NULL,
  `available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`itemId`, `itemName`, `price`, `description`, `categoryId`, `available`) VALUES
(1, 'Classic Cheeseburger', 5.99, 'Beef patty with cheese and vegetables', 1, 1),
(2, 'Double Deluxe Burger', 8.99, 'Double beef patties with bacon and cheese', 1, 1),
(3, 'Mushroom Swiss Burger', 6.99, 'Beef patty with mushrooms and Swiss cheese', 1, 1),
(4, 'Bacon Burger', 7.49, 'Juicy burger topped with crispy bacon', 1, 1),
(5, 'Crispy Fried Chicken', 7.99, '3-piece fried chicken combo', 2, 1),
(6, 'Chicken Sandwich', 6.49, 'Tender chicken breast with sauce', 2, 1),
(7, 'Spicy Chicken Burger', 6.99, 'Spicy breaded chicken patty', 2, 1),
(8, 'Classic Fries', 2.99, 'Golden crispy fries', 3, 1),
(9, 'Curly Fries', 3.49, 'Seasoned curly fries', 3, 1),
(10, 'Onion Rings', 3.99, 'Crispy onion rings', 3, 1),
(11, 'Mac & Cheese', 4.99, 'Creamy mac and cheese', 3, 1),
(12, 'Soft Drink Small', 2.49, 'Small fountain drink', 4, 1),
(13, 'Soft Drink Large', 3.49, 'Large fountain drink', 4, 1),
(14, 'Iced Tea', 2.99, 'Fresh iced tea', 4, 1),
(15, 'Milkshake', 4.99, 'Creamy milkshake (vanilla, chocolate, strawberry)', 4, 1),
(16, 'Coffee', 2.49, 'Hot coffee', 4, 1),
(17, 'Ice Cream Cone', 2.99, 'Single scoop ice cream cone', 5, 1),
(18, 'Brownie', 3.99, 'Warm chocolate brownie', 5, 1),
(19, 'Apple Pie', 2.99, 'Baked apple pie', 5, 1),
(20, 'Garden Salad', 5.99, 'Fresh mixed greens with dressing', 6, 1),
(21, 'Caesar Salad', 6.99, 'Crisp romaine with Caesar dressing', 6, 1),
(22, 'Chicken Salad', 7.99, 'Garden salad with grilled chicken', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `cashierId` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `totalPrice` decimal(10,2) DEFAULT NULL,
  `orderCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderFinished` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `priceAtTime` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `userType` int(11) NOT NULL,
  `userDescription` varchar(20) DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`userType`, `userDescription`) VALUES
(1, 'Customer'),
(2, 'Cashier'),
(3, 'Cook'),
(4, 'Manager'),
(99, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `userType` int(11) NOT NULL DEFAULT 99
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `password`, `email`, `userType`) VALUES
(7, 'Kacper', 'Zak', '123', 'KacperZak@gmail.com', 1),
(8, 'Barry', 'Allen', '456', 'BarryAllen@gmail.com', 2),
(9, 'John', 'Homelander', '789', 'JohnHomelander@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `cashierId` (`cashierId`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`orderItemId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`userType`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `userType` (`userType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `userType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `menu_categories` (`categoryId`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cashierId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `menu_items` (`itemId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `roles` (`userType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
