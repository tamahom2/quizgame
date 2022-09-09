-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 06:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `qcm`
--

CREATE TABLE `qcm` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `fk_theme_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qcm`
--

INSERT INTO `qcm` (`id`, `label`, `fk_theme_id`, `fk_user_id`) VALUES
(35, 'Physique 1', 3, 8),
(36, 'Maths 1', 1, 8),
(37, 'Histoire 1', 17, 8);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `corps` varchar(255) DEFAULT NULL,
  `fk_qcm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `corps`, `fk_qcm_id`) VALUES
(88, 'Comment s’appelle la table de laboratoire sur laquelle le chimiste fait ses expériences ?', 35),
(89, 'Quel grand physicien, prix Nobel, découvrit la radioactivité ?', 35),
(90, 'A quelle température, l’eau se change-t-elle en gaz ?', 35),
(91, 'Comment s’appelle l’unité d’énergie ?', 35),
(92, 'Déterminer la dérivée de la fonction f qui à x associe f(x)= exp(-2x+1) :', 36),
(93, 'Déterminer les solutions de l\'équation x²+6x+13=0 dans C:', 36),
(94, 'Déterminer une primitive de la fonction qui à t associe exp(2t)', 36),
(95, '2×(2pow(n)) = (ici : pow=puissance)', 36),
(96, 'La Perse s’appelle aujourd’hui:', 37),
(97, 'La guerre civile espagnole a débuté en:', 37),
(98, 'La guerre du Rif s’est déroulée dans les années 1920:', 37),
(99, 'L’Espagne fait partie de la Communauté européenne depuis:', 37);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `correct` tinyint(1) DEFAULT NULL,
  `fk_question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`id`, `label`, `correct`, `fk_question_id`) VALUES
(220, 'Le comptoir', 0, 88),
(221, 'L\'établi', 0, 88),
(222, 'La paillasse', 1, 88),
(223, 'Émulsion', 0, 88),
(224, 'Henri Becquerel', 1, 89),
(225, 'John Dalton', 0, 89),
(226, 'Frédéric Joliot-Curie', 0, 89),
(227, 'Albert Einstein', 0, 89),
(228, '90°C', 0, 90),
(229, '100°C', 1, 90),
(230, '1000°C', 0, 90),
(231, '500°C', 0, 90),
(232, 'Watt', 0, 91),
(233, 'Calorie', 0, 91),
(234, 'Dalton', 0, 91),
(235, 'Joule', 1, 91),
(236, '-2 exp(-2x+1)', 1, 92),
(237, 'exp(-2)', 0, 92),
(238, 'exp(-2x+1)', 0, 92),
(239, '0', 0, 92),
(240, 'Pas de solution', 0, 93),
(241, '{2+3i,2−3i}', 0, 93),
(242, '{−3+2i,−3−2i}', 1, 93),
(243, '{3+2i,3−2i}', 0, 93),
(244, 'exp(3t) +1', 0, 94),
(245, '2 exp(2t)', 0, 94),
(246, 'exp(2t) −5', 0, 94),
(247, 'exp(2t)/2 + 6', 1, 94),
(248, '2pow(n+1)', 1, 95),
(249, '2', 0, 95),
(250, '0', 0, 95),
(251, '2pow(n)', 0, 95),
(252, 'Irak', 0, 96),
(253, 'Iran', 1, 96),
(254, 'Éthiopie', 0, 96),
(255, 'Syrie', 0, 96),
(256, '1929', 0, 97),
(257, '1939', 0, 97),
(258, '1936', 1, 97),
(259, '1926', 0, 97),
(260, 'Au Maroc', 1, 98),
(261, 'En Algérie', 0, 98),
(262, 'En Tunisie', 0, 98),
(263, 'En Egypte', 0, 98),
(264, '1973', 0, 99),
(265, '1987', 0, 99),
(266, '1990', 0, 99),
(267, '1986', 1, 99);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score` int(11) DEFAULT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_qcm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `label`) VALUES
(1, 'Mathématique'),
(2, 'Langues'),
(3, 'Physique'),
(4, 'Informatique'),
(5, 'Culture générale'),
(17, 'Histoire-Géo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`) VALUES
(8, 'admin', 'admin@admin.admin', '0', '$2y$10$KwYMmSgUrz3dZ.NxIUEdc.QL5XxpPOrFUlUzH8rXb2rZus2TJbwyK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_them_qcm_id` (`fk_theme_id`),
  ADD KEY `fk_user_qcm_id` (`fk_user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_qcm_question_id` (`fk_qcm_id`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_reponse_id` (`fk_question_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`fk_user_id`,`fk_qcm_id`),
  ADD KEY `fk_qcm_score` (`fk_qcm_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qcm`
--
ALTER TABLE `qcm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `qcm`
--
ALTER TABLE `qcm`
  ADD CONSTRAINT `fk_them_qcm_id` FOREIGN KEY (`fk_theme_id`) REFERENCES `theme` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_qcm_id` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_qcm_question_id` FOREIGN KEY (`fk_qcm_id`) REFERENCES `qcm` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_question_reponse_id` FOREIGN KEY (`fk_question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `fk_qcm_score` FOREIGN KEY (`fk_qcm_id`) REFERENCES `qcm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_score` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
