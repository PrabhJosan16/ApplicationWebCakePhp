-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2020 at 09:43 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restauration`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(100) NOT NULL,
  `Customer_Details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contact` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Customer_Details`, `contact`, `created`, `modified`) VALUES
(1, 'Admin', '5149091608', '2020-10-10 00:00:00', '2020-10-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(3, 'egtwretgertretertreter.PNG', 'Home/index/', '2020-10-17 21:38:40', '2020-10-17 21:38:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(11, 'fr_CA', 'Meals', 1, 'Other_details', 'Ce si est un steak'),
(12, 'es_US', 'Meals', 1, 'Other_details', 'esto es un bistec es'),
(13, 'en_CA', 'Meals', 13, 'Other_details', 'asd'),
(14, 'en_CA', 'Meals', 14, 'Other_details', 'tets'),
(15, 'en_CA', 'Meals', 15, 'Other_details', 'une autrwe test');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `ID` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Customer_ID` int(100) DEFAULT NULL,
  `Staff_ID` int(100) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_of_meal` datetime DEFAULT CURRENT_TIMESTAMP,
  `Cost_of_meal` int(100) NOT NULL,
  `Other_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`ID`, `user_id`, `Customer_ID`, `Staff_ID`, `slug`, `Date_of_meal`, `Cost_of_meal`, `Other_details`, `created`, `modified`) VALUES
(1, 3, 1, 1, '', '2020-10-10 19:43:15', 15, 'this is a steak', '2020-10-10 00:00:00', '2020-10-17 18:51:53'),
(3, 3, 1, 1, '', '2020-10-11 20:25:53', 5, 'poutine', '2020-10-11 00:00:00', '2020-10-17 18:57:21'),
(4, 3, 1, 1, '', '2020-10-12 19:14:00', 15, 'Pizza', '2020-10-12 19:14:51', '2020-10-12 19:14:51'),
(7, 3, NULL, NULL, '', '2020-10-12 19:56:40', 75, 'Bouffet', '2020-10-12 19:56:40', '2020-10-12 19:56:40'),
(9, 3, NULL, NULL, '', '2020-10-13 14:19:02', 15, 'Pizza', '2020-10-13 14:19:02', '2020-10-13 14:19:02'),
(12, 3, NULL, NULL, 'sefgrthgftgdrs', '2020-10-16 15:11:03', 15, 'sefgrthgftgdrs', '2020-10-16 15:11:03', '2020-10-17 18:43:32'),
(13, 3, NULL, NULL, 'asd', '2020-10-17 19:02:37', 2, NULL, '2020-10-17 19:02:37', '2020-10-17 19:02:37'),
(14, 3, NULL, NULL, 'tets', '2020-10-17 19:02:47', 123, NULL, '2020-10-17 19:02:47', '2020-10-17 19:02:53'),
(15, 3, NULL, NULL, 'une-autrwe-test', '2020-10-17 19:03:40', 12, NULL, '2020-10-17 19:03:40', '2020-10-17 19:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `meals_tags`
--

CREATE TABLE `meals_tags` (
  `meal_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals_tags`
--

INSERT INTO `meals_tags` (`meal_id`, `tag_id`) VALUES
(1, 1),
(14, 1),
(15, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meal_dishes`
--

CREATE TABLE `meal_dishes` (
  `Meal_ID` int(100) NOT NULL,
  `Menu_item_ID` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(100) NOT NULL,
  `Menu_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Available_date_from` datetime NOT NULL,
  `Available_date_to` datetime NOT NULL,
  `Other_details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `ID` int(100) NOT NULL,
  `Menu_ID` int(100) NOT NULL,
  `Menu_item_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Other_details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_staff_role`
--

CREATE TABLE `ref_staff_role` (
  `ID` int(100) NOT NULL,
  `Staff_role_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_staff_role`
--

INSERT INTO `ref_staff_role` (`ID`, `Staff_role_description`, `created`, `modified`) VALUES
(1, 'serveur', '2020-10-10 00:00:00', '2020-10-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID` int(100) NOT NULL,
  `Staff_role_code` int(100) NOT NULL,
  `First_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Other_details` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `Staff_role_code`, `First_name`, `Last_name`, `Other_details`, `created`, `modified`) VALUES
(1, 1, 'admin', 'admin', 'admin', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(2, 1, 'Prabh', 'Josan', 'Etudiant', '2020-10-14 22:28:39', '2020-10-14 22:28:39'),
(3, 1, 'Prabh', 'Josan', 'Etudiant', '2020-10-14 22:29:09', '2020-10-14 22:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Viande', '2020-10-17 00:00:00', '2020-10-17 00:00:00'),
(2, 'Végétarien', '2020-10-17 18:57:08', '2020-10-17 18:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`) VALUES
(3, 'admin@admin.com', '$2y$10$guR1XZnYUZp8QFWTtrgsVukC0/mpGrPP8d/rAoMZIk4e/2w458xl2', '2020-10-02 19:46:41', '2020-10-11 21:46:38'),
(4, 'prabhjosan16@gmail.com', '$2y$10$ayiMvPJNfH9BFgUtle3AwOCPfwaw1QZ1ouP.SDPj7I66kjmdRAO8m', '2020-10-05 13:36:15', '2020-10-05 13:36:15'),
(5, 'cake@cms.com', '$2y$10$ywXZTBu2AoS9hp4ypXCubOsaovYQVx9eXBpqulyzR2xwjOE1XWUQi', '2020-10-11 22:01:03', '2020-10-11 22:01:03'),
(6, 'cake@cake.com', '$2y$10$v8Wm2qUjN/uDCQB.XgrGk.qVFSUkU3kTr1Injo.U4v1BwR175gPZe', '2020-10-14 21:01:06', '2020-10-14 21:01:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `articles_ibfk_1` (`user_id`),
  ADD KEY `FK_Customer_Meals` (`Customer_ID`),
  ADD KEY `FK_Staff_Meals` (`Staff_ID`);

--
-- Indexes for table `meals_tags`
--
ALTER TABLE `meals_tags`
  ADD PRIMARY KEY (`meal_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

--
-- Indexes for table `meal_dishes`
--
ALTER TABLE `meal_dishes`
  ADD KEY `FK_MenuItemID_MealDishes` (`Menu_item_ID`),
  ADD KEY `FK_Meals_MealDishes` (`Meal_ID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Menu` (`Menu_ID`);

--
-- Indexes for table `ref_staff_role`
--
ALTER TABLE `ref_staff_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_StaffRole_Satff` (`Staff_role_code`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_staff_role`
--
ALTER TABLE `ref_staff_role`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `FK_Customer_Meals` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Staff_Meals` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `meals_tags`
--
ALTER TABLE `meals_tags`
  ADD CONSTRAINT `meals_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `meals_tags_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`ID`);

--
-- Constraints for table `meal_dishes`
--
ALTER TABLE `meal_dishes`
  ADD CONSTRAINT `FK_Meals_MealDishes` FOREIGN KEY (`Meal_ID`) REFERENCES `meals` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_MenuItemID_MealDishes` FOREIGN KEY (`Menu_item_ID`) REFERENCES `menu_items` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `FK_Menu` FOREIGN KEY (`Menu_ID`) REFERENCES `menu` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FK_StaffRole_Satff` FOREIGN KEY (`Staff_role_code`) REFERENCES `ref_staff_role` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
