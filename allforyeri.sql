-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2016 at 05:56 PM
-- Server version: 5.5.46
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `allforyeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(20) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment_time` varchar(20) NOT NULL,
  `username` int(11) NOT NULL,
  `post_id` int(20) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `username` (`username`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `post_id` int(20) NOT NULL,
  `media_id` int(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  PRIMARY KEY (`post_id`,`media_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `admin`) VALUES
('elizur', 'f28d6fb009676705dbcc3a23b6aeaf2b', 0),
('yeri', '028e0b64de57a0e061b8573970448283', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `comments` (`post_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
