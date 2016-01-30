-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 30. led 2016, 12:02
-- Verze serveru: 5.6.17
-- Verze PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `creepers`
--
CREATE DATABASE IF NOT EXISTS `creepers` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `creepers`;

-- --------------------------------------------------------

--
-- Struktura tabulky `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `ratingID` int(11) NOT NULL AUTO_INCREMENT,
  `reviewerID` int(11) NOT NULL,
  `reviewTaleID` int(11) NOT NULL,
  `originality` int(11) DEFAULT NULL,
  `theme` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  PRIMARY KEY (`ratingID`,`reviewerID`,`reviewTaleID`),
  KEY `fk_ratings_users1_idx` (`reviewerID`),
  KEY `fk_ratings_tales1_idx` (`reviewTaleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=12 ;

--
-- Vypisuji data pro tabulku `ratings`
--

INSERT INTO `ratings` (`ratingID`, `reviewerID`, `reviewTaleID`, `originality`, `theme`, `quality`) VALUES
(9, 2, 11, 6, 8, 6),
(10, 2, 12, 6, 8, 10),
(11, 6, 13, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=3 ;

--
-- Vypisuji data pro tabulku `roles`
--

INSERT INTO `roles` (`roleID`, `title`) VALUES
(1, 'admin'),
(2, 'reviewer');

-- --------------------------------------------------------

--
-- Struktura tabulky `tales`
--

CREATE TABLE IF NOT EXISTS `tales` (
  `taleID` int(11) NOT NULL AUTO_INCREMENT,
  `authorID` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`taleID`,`authorID`),
  KEY `fk_tales_users1_idx` (`authorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=15 ;

--
-- Vypisuji data pro tabulku `tales`
--

INSERT INTO `tales` (`taleID`, `authorID`, `author`, `title`, `path`, `added`, `accepted`) VALUES
(11, 3, 'Francis', 'Jeff the Killer - Prameny (Běž spát)', './content/FrancisJeff the Killer.pdf', '2016-01-30 11:16:46', 1),
(12, 3, 'Francis', 'Unavený muž', './content/FrancisUnavený muž.pdf', '2016-01-30 11:21:15', 1),
(13, 3, 'Francis', 'Důležitý vzkaz', './content/FrancisDůležitý vzkaz.pdf', '2016-01-30 11:21:28', 0),
(14, 7, 'Francis', 'Maly ruzovy batuzek', './content/JanaMalý růžový batůžek.pdf', '2016-01-30 11:22:02', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `roleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`roleID`,`userID`),
  KEY `fk_userRole_users1_idx` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `userrole`
--

INSERT INTO `userrole` (`roleID`, `userID`) VALUES
(1, 1),
(2, 2),
(2, 5),
(2, 6);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=10 ;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `pass`, `added`) VALUES
(1, 'admin', 'admin@creepers.crp', '$2y$10$CpRRQQHqe0rwyOZZ61o.YuZjSmtpcKuuHWzApWKcUcKy6Uv62LmGG', '2016-01-19 13:33:44'),
(2, 'John', 'john@creepers.crp', '$2y$10$CpRRQQHqe0rwyOZZ61o.YuZjSmtpcKuuHWzApWKcUcKy6Uv62LmGG', '2016-01-19 13:36:48'),
(3, 'Francis', 'Francis@coco.cr', '$2y$10$CpRRQQHqe0rwyOZZ61o.YuZjSmtpcKuuHWzApWKcUcKy6Uv62LmGG', '2016-01-19 13:39:21'),
(5, 'James', 'James@creepers.cp', '$2y$10$zQUoaAUUXmWRr4F6YETqsOkCbMJZbOtbc6U12t./Cjui1cgbYH1mu', '2016-01-24 16:14:47'),
(6, 'Jane', 'Jane@creepers.cp', '$2y$10$z789aLM9ur8AKd59MnrVTeZWToyQWpzneLJdhhPl5SVM./D9vNaCC', '2016-01-24 16:15:08'),
(7, 'Jana', 'Jana@home.ho', '$2y$10$fzNPR3wo73sb0NbjszeUduU0O98OANvgZYTY39UvN9FlcXbcbRFha', '2016-01-24 18:03:03'),
(9, 'Pepa', 'pepa@pepa.cz', '$2y$10$Z2FNU/5igVvc/8RLnc14FeVTUJzfsL1BrX9esR64hkeVvKBufMIGm', '2016-01-24 22:09:21');

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_ratings_tales1` FOREIGN KEY (`reviewTaleID`) REFERENCES `tales` (`taleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ratings_users1` FOREIGN KEY (`reviewerID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `tales`
--
ALTER TABLE `tales`
  ADD CONSTRAINT `fk_tales_users1` FOREIGN KEY (`authorID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `fk_userRole_roles` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userRole_users1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
