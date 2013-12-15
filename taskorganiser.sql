-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2013 at 02:52 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taskorganiser`
--
CREATE DATABASE IF NOT EXISTS `taskorganiser` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taskorganiser`;

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
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `ID_project` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `date_time_start` datetime NOT NULL,
  PRIMARY KEY (`ID_project`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_assignees`
--

CREATE TABLE IF NOT EXISTS `project_assignees` (
  `ID_project_fk` int(11) NOT NULL,
  `ID_user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `ID_role` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  PRIMARY KEY (`ID_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`ID_thread`)
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
  `adress` text,
  `mobile` int(11) NOT NULL,
  `email` text NOT NULL,
  `ID_role_fk` int(11) NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
