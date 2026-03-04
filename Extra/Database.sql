-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2026 at 02:16 PM
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
-- Database: `financeapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(120) NOT NULL,
  `amount` float NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `description`, `amount`, `category`, `date`) VALUES
(1, 6, 'Groceries', 1324.22, 'Food', '2026-02-03'),
(2, 6, 'Piens', 2.35, 'Food', '2026-02-03'),
(3, 6, 'Piens', 2.35, 'Food', '2026-02-03'),
(4, 6, '123', 123, 'Food', '2026-02-03'),
(5, 6, 'asda', 2132, 'Food', '2026-02-03'),
(6, 6, '123', 123, 'Food', '2026-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(120) NOT NULL,
  `amount` float NOT NULL,
  `source` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `user_id`, `description`, `amount`, `source`, `date`) VALUES
(1, 6, 'sada', 123, 'Food', '2026-02-03'),
(2, 6, 'Wage', 1332.22, 'Food', '2026-02-03'),
(3, 6, 'Working Wage', 1325, 'Food', '2026-02-03'),
(4, 6, 'Working Wage', 1325, 'Food', '2026-02-03'),
(6, 6, 'Alga', 556.26, 'Current Workplace', '2026-02-03'),
(7, 6, '123', 123, 'Current Workplace', '2026-02-03'),
(8, 6, '123', 123, 'Current Workplace', '2026-02-03'),
(9, 6, '123', 123, 'Current Workplace', '2026-02-03'),
(10, 6, 'Wage', 12354, 'Current Workplace', '2026-02-03'),
(11, 6, '123123', 4444, 'Current Workplace', '2026-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(4, 'gg@gg.lv', '$2y$10$TEUgqcZMJv5FXIOgsM2nzO3KOrjxGaGi1cRjDGwgP/F1HAIHHmaEa'),
(6, 'test@test.lv', '$2y$10$MrarM/BhdkjYYsa0zi4yUOnROTSeBlefCbILLAxnoOJRgloOO.ap2'),
(13, 'test@test.coo', '$2y$10$5frFJ25DKll40rYlUTdDmea4Lm3N03xXGAkjYLW9DiiZRow7pJ2rG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_expenses` (`user_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_income` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `fk_user_expenses` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `fk_user_income` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
