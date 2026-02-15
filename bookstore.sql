-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2026 at 09:46 PM
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
-- Database: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `author` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL CHECK (`price` >= 0),
  `stock` int(11) NOT NULL CHECK (`stock` >= 0),
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_book`, `title`, `image`, `author`, `price`, `stock`, `id_categoria`) VALUES
(1, 'The Grapes of Wrath', 'grapes_of_wrath.jpg', 'John Steinbeck', 19.99, 50, 1),
(2, 'A Separate Peace', 'separate_peace.jpg', 'John Knowles', 29.99, 30, 2),
(3, '1984', '1984.jpg', 'George Orwell', 14.99, 40, 1),
(4, 'To Kill a Mockingbird', 'to_kill_a_mockingbird.jpg', 'Harper Lee', 16.50, 35, 1),
(5, 'The Great Gatsby', 'the_great_gatsby.jpg', 'F. Scott Fitzgerald', 13.99, 30, 1),
(6, 'Harry Potter and the Sorcerer\'s Stone', 'harry_potter_1.jpg', 'J.K. Rowling', 19.99, 50, 1),
(7, 'The Lord of the Rings', 'lord_of_the_rings.jpg', 'J.R.R. Tolkien', 29.99, 20, 1),
(8, 'Clean Code', 'clean_code.jpg', 'Robert C. Martin', 39.99, 25, 2),
(9, 'The Pragmatic Programmer', 'pragmatic_programmer.jpg', 'Andrew Hunt', 42.00, 20, 2),
(10, 'Design Patterns', 'design_patterns.jpg', 'Erich Gamma', 49.99, 15, 2),
(11, 'You Don\'t Know JS', 'you_dont_know_js.jpg', 'Kyle Simpson', 34.50, 30, 2),
(12, 'Introduction to Algorithms', 'clrs.jpg', 'Thomas H. Cormen', 79.99, 10, 2),
(13, 'Sapiens: A Brief History of Humankind', 'sapiens.jpg', 'Yuval Noah Harari', 22.99, 28, 3),
(14, 'Guns, Germs, and Steel', 'guns_germs_steel.jpg', 'Jared Diamond', 21.50, 18, 3),
(15, 'The Silk Roads', 'the_silk_roads.jpg', 'Peter Frankopan', 24.00, 15, 3),
(16, 'Team of Rivals', 'team_of_rivals.jpg', 'Doris Kearns Goodwin', 26.99, 12, 3),
(17, 'The Second World War', 'the_second_world_war.jpg', 'Antony Beevor', 28.50, 14, 3),
(18, 'The Hobbit', 'the_hobbit.jpg', 'J.R.R. Tolkien', 18.99, 40, 4),
(19, 'A Game of Thrones', 'game_of_thrones.jpg', 'George R.R. Martin', 24.99, 35, 4),
(20, 'The Name of the Wind', 'name_of_the_wind.jpg', 'Patrick Rothfuss', 22.50, 30, 4),
(21, 'The Way of Kings', 'way_of_kings.jpg', 'Brandon Sanderson', 27.99, 25, 4),
(22, 'Mistborn: The Final Empire', 'mistborn.jpg', 'Brandon Sanderson', 19.99, 30, 4),
(23, 'The Lies of Locke Lamora', 'locke_lamora.jpg', 'Scott Lynch', 17.99, 28, 4),
(24, 'The Blade Itself', 'blade_itself.jpg', 'Joe Abercrombie', 18.50, 26, 4),
(25, 'The Chronicles of Narnia', 'narnia.jpg', 'C.S. Lewis', 29.99, 20, 4),
(26, 'American Gods', 'american_gods.jpg', 'Neil Gaiman', 21.99, 22, 4),
(27, 'The Priory of the Orange Tree', 'priory_orange_tree.jpg', 'Samantha Shannon', 25.99, 18, 4),
(28, 'The Wheel of Time', 'wheel_of_time.jpg', 'Robert Jordan', 23.99, 20, 4),
(29, 'Dune', 'dune.jpg', 'Frank Herbert', 19.99, 45, 5),
(30, 'Foundation', 'foundation.jpg', 'Isaac Asimov', 17.99, 38, 5),
(31, 'Brave New World', 'brave_new_world.jpg', 'Aldous Huxley', 15.99, 32, 5),
(32, 'Fahrenheit 451', 'fahrenheit_451.jpg', 'Ray Bradbury', 14.50, 34, 5),
(33, 'The Martian', 'the_martian.jpg', 'Andy Weir', 18.99, 29, 5),
(34, 'Neuromancer', 'neuromancer.jpg', 'William Gibson', 16.99, 27, 5),
(35, 'Snow Crash', 'snow_crash.jpg', 'Neal Stephenson', 18.75, 25, 5),
(36, 'Ender\'s Game', 'enders_game.jpg', 'Orson Scott Card', 17.50, 30, 5),
(37, 'The Left Hand of Darkness', 'left_hand_darkness.jpg', 'Ursula K. Le Guin', 16.99, 22, 5),
(38, 'The Hitchhiker\'s Guide to the Galaxy', 'hitchhikers_guide.jpg', 'Douglas Adams', 14.99, 40, 5),
(39, 'Ready Player One', 'ready_player_one.jpg', 'Ernest Cline', 19.50, 24, 5),
(40, 'Hyperion', 'hyperion.jpg', 'Dan Simmons', 20.99, 20, 5),
(41, 'Pride and Prejudice', 'pride_and_prejudice.jpg', 'Jane Austen', 12.99, 40, 1),
(42, 'Moby-Dick', 'moby_dick.jpg', 'Herman Melville', 15.99, 25, 1),
(43, 'The Catcher in the Rye', 'catcher_in_the_rye.jpg', 'J.D. Salinger', 14.50, 30, 1),
(44, 'The Alchemist', 'the_alchemist.jpg', 'Paulo Coelho', 13.99, 35, 1),
(45, 'The Picture of Dorian Gray', 'dorian_gray.jpg', 'Oscar Wilde', 11.99, 28, 1),
(46, 'Jane Eyre', 'jane_eyre.jpg', 'Charlotte Brontë', 12.50, 22, 1),
(47, 'Refactoring', 'refactoring.jpg', 'Martin Fowler', 44.99, 20, 2),
(48, 'Code Complete', 'code_complete.jpg', 'Steve McConnell', 41.99, 18, 2),
(49, 'The Clean Coder', 'clean_coder.jpg', 'Robert C. Martin', 29.99, 25, 2),
(50, 'Head First Design Patterns', 'head_first_design_patterns.jpg', 'Eric Freeman', 39.99, 20, 2),
(51, 'Cracking the Coding Interview', 'ctci.jpg', 'Gayle Laakmann McDowell', 34.99, 30, 2),
(52, 'Soft Skills', 'soft_skills.jpg', 'John Sonmez', 27.50, 22, 2),
(53, 'Eloquent JavaScript', 'eloquent_js.jpg', 'Marijn Haverbeke', 24.99, 28, 2),
(54, 'Artificial Intelligence: A Modern Approach', 'ai_modern_approach.jpg', 'Stuart Russell', 89.99, 10, 2),
(55, 'The Rise and Fall of the Third Reich', 'third_reich.jpg', 'William L. Shirer', 27.99, 20, 3),
(56, 'The Diary of a Young Girl', 'anne_frank.jpg', 'Anne Frank', 14.99, 35, 3),
(57, '1776', '1776.jpg', 'David McCullough', 18.99, 22, 3),
(58, 'The Wright Brothers', 'wright_brothers.jpg', 'David McCullough', 17.50, 18, 3),
(59, 'Postwar', 'postwar.jpg', 'Tony Judt', 29.99, 15, 3),
(60, 'The History of the Ancient World', 'ancient_world.jpg', 'Susan Wise Bauer', 24.99, 16, 3),
(61, 'SPQR: A History of Ancient Rome', 'spqr.jpg', 'Mary Beard', 19.99, 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categoria` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categoria`, `name`) VALUES
(4, 'Fantasy'),
(1, 'Fiction'),
(3, 'History'),
(5, 'Science Fiction'),
(2, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL CHECK (`total_price` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `created_at`, `total_price`) VALUES
(1, 2, '2026-02-10 11:55:50', 49.98),
(2, 3, '2026-02-01 11:57:51', 24.50),
(3, 1, '2026-02-15 13:36:24', 22.50),
(4, 1, '2026-02-15 13:37:10', 24.99),
(5, 1, '2026-02-15 14:20:33', 20.99);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id_order` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` > 0),
  `price` decimal(10,2) NOT NULL CHECK (`price` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id_order`, `id_book`, `quantity`, `price`) VALUES
(1, 1, 1, 19.99),
(2, 2, 1, 24.50),
(3, 20, 1, 22.50),
(4, 19, 1, 24.99),
(5, 40, 1, 20.99);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `id_role`) VALUES
(1, 'Alice Johnson', 'alice@example.com', '$2y$hashedpassword1', 1),
(2, 'Bob Smith', 'bob@example.com', '$2y$hashedpassword2', 2),
(3, 'Charlie Brown', 'charlie@example.com', '$2y$hashedpassword3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_order`,`id_book`),
  ADD KEY `id_book` (`id_book`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categories` (`id_categoria`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
