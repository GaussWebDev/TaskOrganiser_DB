-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2013 at 02:22 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taskorganiser`
--

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `ID_domain` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_user_fk` int(11) DEFAULT NULL,
  `domain` text NOT NULL,
  `date_time_start` datetime NOT NULL,
  `date_time_expires` datetime DEFAULT NULL,
  `cost` decimal(10,0) DEFAULT NULL,
  `expired` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `ID_file` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_project_fk` int(11) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `date_time_upload` datetime NOT NULL,
  `ID_user_fk` int(11) NOT NULL,
  PRIMARY KEY (`ID_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `ID_post` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_thread_fk` int(11) NOT NULL,
  `ID_user_fk` int(11) NOT NULL,
  `text` text NOT NULL,
  `date_time_post` datetime NOT NULL,
  PRIMARY KEY (`ID_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `ID_project` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `date_time_start` datetime NOT NULL,
  PRIMARY KEY (`ID_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID_project`, `title`, `finished`, `date_time_start`) VALUES
(1, 'testprojekt1', 0, '2013-12-24 00:00:00'),
(2, 'testprojekt2', 0, '2013-11-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_assignees`
--

CREATE TABLE IF NOT EXISTS `project_assignees` (
  `ID_project_fk` int(11) NOT NULL,
  `ID_user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_assignees`
--

INSERT INTO `project_assignees` (`ID_project_fk`, `ID_user_fk`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `ID_role` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`ID_role`),
  UNIQUE KEY `permission` (`permission`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_role`, `role`, `permission`) VALUES
(1, 'Administrator', 100),
(2, 'Developer', 50),
(3, 'Client', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `ID_task` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_user_fk` int(11) NOT NULL,
  `ID_project_fk` int(11) NOT NULL,
  `duration` time DEFAULT NULL,
  `date_start` date NOT NULL,
  `comment` text,
  `billable` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_task`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`ID_task`, `ID_user_fk`, `ID_project_fk`, `duration`, `date_start`, `comment`, `billable`) VALUES
(1, 2, 1, '04:00:00', '2013-12-24', 'test task 1', 0),
(2, 2, 1, '06:00:00', '2013-12-17', 'test task 2', 1),
(3, 2, 2, '02:00:00', '2013-12-12', 'test task 3', 1),
(5, 2, 1, '00:01:00', '2011-08-10', 'update test 1', 0),
(6, 2, 1, '00:00:08', '2013-10-10', 'asdasdasdasdsadasdasdasdasdasdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE IF NOT EXISTS `threads` (
  `ID_thread` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `date_time_start` datetime NOT NULL,
  `ID_user_fk` int(11) NOT NULL,
  `ID_project_fk` int(11) NOT NULL,
  PRIMARY KEY (`ID_thread`),
  UNIQUE KEY `ID_thread_2` (`ID_thread`),
  KEY `ID_thread` (`ID_thread`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `ID_todo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_user_fk` int(11) NOT NULL,
  `comment` text,
  PRIMARY KEY (`ID_todo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text,
  `lastname` text,
  `address` text,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `ID_role_fk` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_user`, `username`, `password`, `firstname`, `lastname`, `address`, `mobile`, `email`, `ID_role_fk`, `active`) VALUES
(1, 'admin', '$2y$11$adminadminadminadminaOxMpwoIi7VP157XWVBS2ZBQGlY8pvPMm', 'pero', 'peric', 'Osijek, pericpericova 15', '+385989359497', 'peroperic@gmail.com', 1, 1),
(2, 'markovic', '$2y$11$markovicmarkovicmarkoufkFpGQXvHKjBueUv0MDrh3cVv74zLku', 'marko', 'markovic', 'asdasdasd', '3456436346', 'markovic@markovic.com', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
