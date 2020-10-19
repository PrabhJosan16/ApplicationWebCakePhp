-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2020 at 09:27 PM
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
(6, 'steak.jpg', 'files/add/', '2020-10-18 19:57:56', '2020-10-18 19:57:56', 1),
(7, 'Frites.webp', 'files/add/', '2020-10-18 20:17:09', '2020-10-18 20:17:09', 1),
(8, 'poutine.jpg', 'files/add/', '2020-10-18 20:17:37', '2020-10-18 20:17:37', 1),
(9, 'pizza.jpeg', 'files/add/', '2020-10-18 20:18:22', '2020-10-18 20:18:22', 1),
(10, 'bouffet.jpg', 'files/add/', '2020-10-18 20:22:20', '2020-10-18 20:22:20', 1);

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
(16, 'en_CA', 'Meals', 18, 'Other_details', 'Bouffet 5 étoiles'),
(17, 'en_CA', 'Meals', 22, 'Other_details', 'Grande Poutine'),
(18, 'fr_CA', 'Meals', 22, 'Other_details', 'Grande Poutine'),
(19, 'es_US', 'Meals', 22, 'Other_details', 'PATATAS BRAVAS');

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
(1, 3, 1, 1, '', '2020-10-10 19:43:15', 15, 'this is a steak', '2020-10-10 00:00:00', '2020-10-18 20:12:37'),
(3, 3, 1, 1, '', '2020-10-11 20:25:53', 5, 'poutine', '2020-10-11 00:00:00', '2020-10-18 20:18:58'),
(9, 3, NULL, NULL, '', '2020-10-13 14:19:02', 15, 'Pizza', '2020-10-13 14:19:02', '2020-10-18 20:18:41'),
(16, 3, NULL, NULL, 'Frites', '2020-10-18 16:23:09', 5, 'Frites', '2020-10-18 16:23:09', '2020-10-18 20:18:31'),
(18, 3, NULL, NULL, 'Bouffet-5-etoiles', '2020-10-18 20:22:45', 55, NULL, '2020-10-18 20:22:45', '2020-10-18 20:22:45'),
(22, 5, NULL, NULL, 'Grande-Poutine', '2020-10-19 21:24:54', 9, 'Large Poutine', '2020-10-19 21:24:54', '2020-10-19 21:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `meals_files`
--

CREATE TABLE `meals_files` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals_files`
--

INSERT INTO `meals_files` (`id`, `meal_id`, `file_id`) VALUES
(5, 1, 6),
(6, 16, 7),
(7, 9, 9),
(8, 3, 8),
(9, 18, 10),
(13, 22, 8);

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
(9, 1),
(18, 1),
(3, 2),
(16, 2),
(22, 2);

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
(3, 1, 'Prabh', 'Josan', 'Etudiant', '2020-10-14 22:29:09', '2020-10-14 22:29:09'),
(4, 1, 'allo', 'bye', 'yes', '2020-10-18 16:25:55', '2020-10-18 16:25:55'),
(5, 1, 'allo', 'bye', 'yes', '2020-10-18 16:26:17', '2020-10-18 16:26:17');

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
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `uuid`, `confirmed`, `created`, `modified`) VALUES
(3, 'admin@admin.com', '$2y$10$guR1XZnYUZp8QFWTtrgsVukC0/mpGrPP8d/rAoMZIk4e/2w458xl2', 'a6f2ca00-aafe-48aa-8ca4-03051da5f0ba', 0, '2020-10-02 19:46:41', '2020-10-19 18:17:12'),
(5, 'cake@cms.com', '$2y$10$ywXZTBu2AoS9hp4ypXCubOsaovYQVx9eXBpqulyzR2xwjOE1XWUQi', 'd9c96552-3954-4735-8664-b85ec90fa4cc', 0, '2020-10-11 22:01:03', '2020-10-19 18:17:30'),
(6, 'cake@cake.com', '$2y$10$v8Wm2qUjN/uDCQB.XgrGk.qVFSUkU3kTr1Injo.U4v1BwR175gPZe', 'b3d4b767-da23-4e4f-b327-2ca958a472c6', 0, '2020-10-14 21:01:06', '2020-10-19 18:17:32'),
(12, 'prabhjosan16@gmail.com', '$2y$10$3rrzoNEUt.5Dfda0F6xpZeC1JyW1jtKprVKdiz5w15NwZiwu3qKye', 'ab80e36f-c293-4736-bb5f-9b1c4d5fceb0', 1, '2020-10-19 18:58:06', '2020-10-19 19:01:38');

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
-- Indexes for table `meals_files`
--
ALTER TABLE `meals_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `file_id` (`file_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `meals_files`
--
ALTER TABLE `meals_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
