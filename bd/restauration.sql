SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE customers (
  id int(100) NOT NULL,
  Customer_Details varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  contact varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO customers (id, Customer_Details, contact, created, modified) VALUES
(1, 'Prabh', 'email', '2020-11-18 00:00:00', '2020-12-20 19:27:19'),
(2, 'Alain', 'email', '2020-11-18 00:00:00', '2020-12-18 20:54:00'),
(9, 'Daniel', 'Fax', '2020-12-18 20:32:57', '2020-12-18 20:32:57');

CREATE TABLE files (
  id int(11) NOT NULL,
  name varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  path varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL,
  status tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO files (id, `name`, path, created, modified, `status`) VALUES
(11, 'pizza.jpeg', 'files/add/', '2020-11-18 14:18:06', '2020-11-18 14:18:06', 1),
(12, 'Frites.webp', 'files/add/', '2020-11-18 14:18:13', '2020-11-18 14:18:13', 1),
(13, 'steak.jpg', 'files/add/', '2020-11-18 14:18:20', '2020-11-18 14:18:20', 1),
(14, 'poutine.jpg', 'files/add/', '2020-12-24 21:45:45', '2020-12-24 21:45:45', 1);

CREATE TABLE i18n (
  id int(11) NOT NULL,
  locale varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  model varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  foreign_key int(10) NOT NULL,
  field varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  content text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO i18n (id, locale, model, foreign_key, `field`, content) VALUES
(23, 'en_CA', 'Meals', 26, 'Other_details', 'Steak medium rare'),
(26, 'en_CA', 'Meals', 29, 'Other_details', 'Salad cesear'),
(27, 'fr_CA', 'Meals', 26, 'Other_details', 'un bon steak'),
(28, 'fr_CA', 'Meals', 29, 'Other_details', 'un bon steak'),
(29, 'en_CA', 'Meals', 30, 'Other_details', 'asdfghjkhu');

CREATE TABLE meals (
  id int(100) NOT NULL,
  user_id int(11) NOT NULL,
  meal_name_id int(11) NOT NULL,
  Customer_id int(100) DEFAULT NULL,
  Staff_id int(100) DEFAULT NULL,
  slug varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  Date_of_meal datetime DEFAULT CURRENT_TIMESTAMP,
  Cost_of_meal int(100) NOT NULL,
  Other_details varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO meals (id, user_id, meal_name_id, Customer_id, Staff_id, slug, Date_of_meal, Cost_of_meal, Other_details, created, modified) VALUES
(26, 3, 2, NULL, NULL, 'Steak-A5-wagu', '2020-11-18 14:19:30', 12, 'Steak', '2020-11-18 14:19:30', '2020-11-22 17:58:06'),
(29, 3, 1, NULL, NULL, 'Salad-cesear', '2020-11-22 17:24:41', 6, 'Steak', '2020-11-22 17:24:41', '2020-11-22 17:58:38'),
(30, 3, 2, NULL, NULL, 'asdfghjkhu', '2020-11-23 22:31:09', 6, NULL, '2020-11-23 22:31:09', '2020-11-23 22:31:09');

CREATE TABLE meals_files (
  id int(11) NOT NULL,
  meal_id int(11) NOT NULL,
  file_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO meals_files (id, meal_id, file_id) VALUES
(21, 26, 13),
(26, 29, 13),
(27, 30, 11);

CREATE TABLE meals_tags (
  meal_id int(11) NOT NULL,
  tag_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO meals_tags (meal_id, tag_id) VALUES
(26, 3),
(29, 4),
(30, 4);

CREATE TABLE meal_dishes (
  Meal_id int(100) NOT NULL,
  Menu_item_id int(100) NOT NULL,
  Quantity int(100) NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE meal_name (
  id int(11) NOT NULL,
  type_meal_id int(11) NOT NULL,
  name_type_id int(11) NOT NULL,
  name varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  no_type varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  name_meal varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO meal_name (id, type_meal_id, name_type_id, `name`, no_type, name_meal) VALUES
(1, 1, 1, 'Salad', 'VG001', 'Vegetarian'),
(2, 2, 2, 'Steak', 'ME001', 'Meat');

CREATE TABLE menu (
  id int(100) NOT NULL,
  Menu_name varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  Available_date_from datetime NOT NULL,
  Available_date_to datetime NOT NULL,
  Other_details varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE menu_items (
  id int(100) NOT NULL,
  Menu_id int(100) NOT NULL,
  Menu_item_name varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  Other_details varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE name_type (
  id int(11) NOT NULL,
  type_meal_id int(11) NOT NULL,
  no_type varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  name_meal varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO name_type (id, type_meal_id, no_type, name_meal) VALUES
(1, 1, 'VG001', 'Salade'),
(2, 2, 'ME001', 'Steak');

CREATE TABLE ref_staff_role (
  id int(100) NOT NULL,
  Staff_role_description varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE staff (
  id int(100) NOT NULL,
  Staff_role_code int(100) NOT NULL,
  First_name varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  Last_name varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  Other_details varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE tags (
  id int(11) NOT NULL,
  title varchar(191) DEFAULT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tags (id, title, created, modified) VALUES
(3, 'Meat', '2020-11-18 14:18:54', '2020-11-18 14:18:54'),
(4, 'Vegetarian', '2020-11-18 14:19:04', '2020-11-18 14:19:04');

CREATE TABLE type_meal (
  id int(11) NOT NULL,
  no_type varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  name_meal varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO type_meal (id, no_type, name_meal) VALUES
(1, 'VG001', 'Vegetarian'),
(2, 'MG001', 'Meat');

CREATE TABLE users (
  id int(11) NOT NULL,
  email varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  password varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  username varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  uuid varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  active tinyint(1) NOT NULL DEFAULT '0',
  confirmed tinyint(1) NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO users (id, email, `password`, username, `uuid`, active, confirmed, created, modified) VALUES
(3, 'admin@admin.com', '$2y$10$guR1XZnYUZp8QFWTtrgsVukC0/mpGrPP8d/rAoMZIk4e/2w458xl2', 'admin', 'a6f2ca00-aafe-48aa-8ca4-03051da5f0ba', 1, 1, '2020-10-02 19:46:41', '2020-11-22 17:58:56'),
(5, 'cake@cms.com', '$2y$10$ywXZTBu2AoS9hp4ypXCubOsaovYQVx9eXBpqulyzR2xwjOE1XWUQi', '', 'd9c96552-3954-4735-8664-b85ec90fa4cc', 0, 0, '2020-10-11 22:01:03', '2020-10-19 18:17:30'),
(6, 'cake@cake.com', '$2y$10$v8Wm2qUjN/uDCQB.XgrGk.qVFSUkU3kTr1Injo.U4v1BwR175gPZe', '', 'b3d4b767-da23-4e4f-b327-2ca958a472c6', 0, 0, '2020-10-14 21:01:06', '2020-10-19 18:17:32'),
(12, 'prabhjosan16@gmail.com', '$2y$10$3rrzoNEUt.5Dfda0F6xpZeC1JyW1jtKprVKdiz5w15NwZiwu3qKye', '', 'ab80e36f-c293-4736-bb5f-9b1c4d5fceb0', 0, 1, '2020-10-19 18:58:06', '2020-10-19 19:01:38');


ALTER TABLE customers
  ADD PRIMARY KEY (id);

ALTER TABLE files
  ADD PRIMARY KEY (id);

ALTER TABLE i18n
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY I18N_LOCALE_FIELD (locale,model,foreign_key,field),
  ADD KEY I18N_FIELD (model,foreign_key,field);

ALTER TABLE meals
  ADD PRIMARY KEY (id),
  ADD KEY FK_Customer_Meals (Customer_id),
  ADD KEY FK_Staff_Meals (Staff_id),
  ADD KEY meals_ibfk_1 (user_id),
  ADD KEY meal_name_id (meal_name_id);

ALTER TABLE meals_files
  ADD PRIMARY KEY (id),
  ADD KEY meal_id (meal_id),
  ADD KEY file_id (file_id);

ALTER TABLE meals_tags
  ADD PRIMARY KEY (meal_id,tag_id),
  ADD KEY tag_key (tag_id);

ALTER TABLE meal_dishes
  ADD KEY FK_MenuItemID_MealDishes (Menu_item_id),
  ADD KEY FK_Meals_MealDishes (Meal_id);

ALTER TABLE meal_name
  ADD PRIMARY KEY (id),
  ADD KEY name_type_fk (name_type_id),
  ADD KEY type_dish_fk (type_meal_id);

ALTER TABLE menu
  ADD PRIMARY KEY (id);

ALTER TABLE menu_items
  ADD PRIMARY KEY (id),
  ADD KEY FK_Menu (Menu_id);

ALTER TABLE name_type
  ADD PRIMARY KEY (id),
  ADD KEY type_dish_fk (type_meal_id);

ALTER TABLE ref_staff_role
  ADD PRIMARY KEY (id);

ALTER TABLE staff
  ADD PRIMARY KEY (id),
  ADD KEY FK_StaffRole_Satff (Staff_role_code);

ALTER TABLE tags
  ADD PRIMARY KEY (id);

ALTER TABLE type_meal
  ADD PRIMARY KEY (id);

ALTER TABLE users
  ADD PRIMARY KEY (id);


ALTER TABLE customers
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE files
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE i18n
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

ALTER TABLE meals
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE meals_files
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE meal_name
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE menu
  MODIFY id int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE menu_items
  MODIFY id int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE name_type
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE ref_staff_role
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE staff
  MODIFY id int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE tags
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE type_meal
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE meals
  ADD CONSTRAINT FK_Customer_Meals FOREIGN KEY (Customer_id) REFERENCES customers (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT FK_Staff_Meals FOREIGN KEY (Staff_id) REFERENCES staff (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT Meals_meal_name FOREIGN KEY (meal_name_id) REFERENCES meal_name (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT meals_ibfk_1 FOREIGN KEY (user_id) REFERENCES `users` (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE meals_tags
  ADD CONSTRAINT meals_tags_ibfk_1 FOREIGN KEY (tag_id) REFERENCES tags (id),
  ADD CONSTRAINT meals_tags_ibfk_2 FOREIGN KEY (meal_id) REFERENCES meals (id);

ALTER TABLE meal_dishes
  ADD CONSTRAINT FK_Meals_MealDishes FOREIGN KEY (Meal_id) REFERENCES meals (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT FK_MenuItemID_MealDishes FOREIGN KEY (Menu_item_id) REFERENCES menu_items (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE meal_name
  ADD CONSTRAINT name_type_fk FOREIGN KEY (name_type_id) REFERENCES name_type (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT type_dish_fk FOREIGN KEY (type_meal_id) REFERENCES type_meal (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE menu_items
  ADD CONSTRAINT FK_Menu FOREIGN KEY (Menu_id) REFERENCES menu (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE name_type
  ADD CONSTRAINT type_type_fk FOREIGN KEY (type_meal_id) REFERENCES type_meal (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE staff
  ADD CONSTRAINT FK_StaffRole_Satff FOREIGN KEY (Staff_role_code) REFERENCES ref_staff_role (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
