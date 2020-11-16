SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `customers` (
  `ID` int(100) NOT NULL,
  `Customer_Details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`ID`, `Customer_Details`, `contact`, `created`, `modified`) VALUES
(1, 'Admin', '5149091608', '2020-10-10 00:00:00', '2020-10-10 00:00:00');

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(6, 'steak.jpg', 'files/add/', '2020-10-18 19:57:56', '2020-10-18 19:57:56', 1),
(7, 'Frites.webp', 'files/add/', '2020-10-18 20:17:09', '2020-10-18 20:17:09', 1),
(8, 'poutine.jpg', 'files/add/', '2020-10-18 20:17:37', '2020-10-18 20:17:37', 1),
(9, 'pizza.jpeg', 'files/add/', '2020-10-18 20:18:22', '2020-10-18 20:18:22', 1),
(10, 'bouffet.jpg', 'files/add/', '2020-10-18 20:22:20', '2020-10-18 20:22:20', 1);

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `meals` (
  `ID` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meal_name_id` int(11) NOT NULL,
  `Customer_ID` int(100) DEFAULT NULL,
  `Staff_ID` int(100) DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Date_of_meal` datetime DEFAULT CURRENT_TIMESTAMP,
  `Cost_of_meal` int(100) NOT NULL,
  `Other_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `meals` (`ID`, `user_id`, `meal_name_id`, `Customer_ID`, `Staff_ID`, `slug`, `Date_of_meal`, `Cost_of_meal`, `Other_details`, `created`, `modified`) VALUES
(1, 3, 1, 1, 1, '', '2020-11-16 00:00:00', 15, 'Pizza', '2020-11-16 00:00:00', '2020-11-16 20:45:52');

CREATE TABLE `meals_files` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `meals_files` (`id`, `meal_id`, `file_id`) VALUES
(14, 1, 9);

CREATE TABLE `meals_tags` (
  `meal_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `meals_tags` (`meal_id`, `tag_id`) VALUES
(1, 2);

CREATE TABLE `meal_dishes` (
  `Meal_ID` int(100) NOT NULL,
  `Menu_item_ID` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `meal_name` (
  `ID` int(11) NOT NULL,
  `meal_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `meal_name` (`ID`, `meal_name`) VALUES
(1, 'Pizza'),
(2, 'Frites');

CREATE TABLE `menu` (
  `ID` int(100) NOT NULL,
  `Menu_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Available_date_from` datetime NOT NULL,
  `Available_date_to` datetime NOT NULL,
  `Other_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `menu_items` (
  `ID` int(100) NOT NULL,
  `Menu_ID` int(100) NOT NULL,
  `Menu_item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Other_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `ref_staff_role` (
  `ID` int(100) NOT NULL,
  `Staff_role_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `ref_staff_role` (`ID`, `Staff_role_description`, `created`, `modified`) VALUES
(1, 'serveur', '2020-10-10 00:00:00', '2020-10-10 00:00:00');

CREATE TABLE `staff` (
  `ID` int(100) NOT NULL,
  `Staff_role_code` int(100) NOT NULL,
  `First_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Other_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `staff` (`ID`, `Staff_role_code`, `First_name`, `Last_name`, `Other_details`, `created`, `modified`) VALUES
(1, 1, 'admin', 'admin', 'admin', '2020-10-10 00:00:00', '2020-10-10 00:00:00'),
(2, 1, 'Prabh', 'Josan', 'Etudiant', '2020-10-14 22:28:39', '2020-10-14 22:28:39'),
(3, 1, 'Prabh', 'Josan', 'Etudiant', '2020-10-14 22:29:09', '2020-10-14 22:29:09'),
(4, 1, 'allo', 'bye', 'yes', '2020-10-18 16:25:55', '2020-10-18 16:25:55'),
(5, 1, 'allo', 'bye', 'yes', '2020-10-18 16:26:17', '2020-10-18 16:26:17');

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tags` (`id`, `title`, `created`, `modified`) VALUES
(1, 'Viande', '2020-10-17 00:00:00', '2020-10-17 00:00:00'),
(2, 'Végétarien', '2020-10-17 18:57:08', '2020-10-17 18:57:08');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `email`, `password`, `uuid`, `confirmed`, `created`, `modified`) VALUES
(3, 'admin@admin.com', '$2y$10$guR1XZnYUZp8QFWTtrgsVukC0/mpGrPP8d/rAoMZIk4e/2w458xl2', 'a6f2ca00-aafe-48aa-8ca4-03051da5f0ba', 0, '2020-10-02 19:46:41', '2020-10-19 18:17:12'),
(5, 'cake@cms.com', '$2y$10$ywXZTBu2AoS9hp4ypXCubOsaovYQVx9eXBpqulyzR2xwjOE1XWUQi', 'd9c96552-3954-4735-8664-b85ec90fa4cc', 0, '2020-10-11 22:01:03', '2020-10-19 18:17:30'),
(6, 'cake@cake.com', '$2y$10$v8Wm2qUjN/uDCQB.XgrGk.qVFSUkU3kTr1Injo.U4v1BwR175gPZe', 'b3d4b767-da23-4e4f-b327-2ca958a472c6', 0, '2020-10-14 21:01:06', '2020-10-19 18:17:32'),
(12, 'prabhjosan16@gmail.com', '$2y$10$3rrzoNEUt.5Dfda0F6xpZeC1JyW1jtKprVKdiz5w15NwZiwu3qKye', 'ab80e36f-c293-4736-bb5f-9b1c4d5fceb0', 1, '2020-10-19 18:58:06', '2020-10-19 19:01:38');


ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

ALTER TABLE `meals`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Customer_Meals` (`Customer_ID`),
  ADD KEY `FK_Staff_Meals` (`Staff_ID`),
  ADD KEY `meals_ibfk_1` (`user_id`),
  ADD KEY `meal_name_id` (`meal_name_id`);

ALTER TABLE `meals_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `file_id` (`file_id`);

ALTER TABLE `meals_tags`
  ADD PRIMARY KEY (`meal_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

ALTER TABLE `meal_dishes`
  ADD KEY `FK_MenuItemID_MealDishes` (`Menu_item_ID`),
  ADD KEY `FK_Meals_MealDishes` (`Meal_ID`);

ALTER TABLE `meal_name`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_Menu` (`Menu_ID`);

ALTER TABLE `ref_staff_role`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_StaffRole_Satff` (`Staff_role_code`);

ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `customers`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `meals`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE `meals_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `meal_name`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `menu`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE `menu_items`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ref_staff_role`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `staff`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `meals`
  ADD CONSTRAINT `FK_Customer_Meals` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Staff_Meals` FOREIGN KEY (`Staff_ID`) REFERENCES `staff` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Meals_meal_name` FOREIGN KEY (`meal_name_id`) REFERENCES `meal_name` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `meals_tags`
  ADD CONSTRAINT `meals_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `meals_tags_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`ID`);

ALTER TABLE `meal_dishes`
  ADD CONSTRAINT `FK_Meals_MealDishes` FOREIGN KEY (`Meal_ID`) REFERENCES `meals` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_MenuItemID_MealDishes` FOREIGN KEY (`Menu_item_ID`) REFERENCES `menu_items` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `menu_items`
  ADD CONSTRAINT `FK_Menu` FOREIGN KEY (`Menu_ID`) REFERENCES `menu` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `staff`
  ADD CONSTRAINT `FK_StaffRole_Satff` FOREIGN KEY (`Staff_role_code`) REFERENCES `ref_staff_role` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
