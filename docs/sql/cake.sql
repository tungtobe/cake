-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2014 at 12:01 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_time`
--

CREATE TABLE IF NOT EXISTS `cake_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cake_time`
--

INSERT INTO `cake_time` (`id`, `time`) VALUES
(1, '2014-08-06 16:51:01'),
(2, '2014-08-06 16:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`) VALUES
(1, 'The title', 'This is the post body.', '2014-08-04 10:15:10', NULL, NULL),
(2, 'A title once again', 'And the post body follows ', '2014-08-04 10:15:10', '2014-08-04 10:58:51', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2014-08-04 10:15:10', NULL, NULL),
(6, 'post 1', 'post 1 body v\r\n', '2014-08-04 10:59:47', '2014-08-04 11:01:02', 2),
(7, 'Post2', 'post2 body\r\n', '2014-08-05 04:05:19', '2014-08-05 04:05:19', 1),
(76, 'Post2 duplicate', NULL, '2014-08-06 10:27:01', '2014-08-06 10:27:01', NULL),
(77, 'Post2 duplicate duplicate', NULL, '2014-08-06 10:28:04', '2014-08-06 10:28:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'tungtobe', '$2a$10$xPiJyUVw6M2SyBXOstlKiuJ4ksCXPhweikNrabc5tcFqGHoynaD6K', 'admin', '2014-08-04 10:24:45', '2014-08-04 10:24:45'),
(2, 'tungtobe1', '$2a$10$P0V702UIL1TqM7LEqQR7xe.H3impMFJv1yesuVxXMsZ9yoc84uPLy', 'author', '2014-08-04 10:35:56', '2014-08-04 10:35:56'),
(3, 'tungtobe2', '$2a$10$M7xX8VcYdZPSHaPZpGBDm.wHMCZDCcV2l/EvoK56TVlMnLBW0ovVy', 'author', '2014-08-04 11:00:34', '2014-08-04 11:00:34'),
(4, 'cake', '$2a$10$iVPefhpgeF2DQ6dkp9NuBOZECuv6PVeumSyUbnkTjwNn5ItFNXvkO', 'admin', '2014-08-06 10:38:04', '2014-08-06 10:38:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
