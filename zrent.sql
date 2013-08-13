



-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2012 at 04:40 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_type` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `firstname`, `lastname`, `password`, `city`, `status`, `user_type`, `create_date`, `update_date`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '', '123456', '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `disposition`
--

CREATE TABLE IF NOT EXISTS `disposition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `disposition`
--

INSERT INTO `disposition` (`id`, `text_en`) VALUES
(1, '1+kk'),
(2, '1+1'),
(3, '2+kk'),
(4, '2+1'),
(5, '3+kk'),
(6, '3+1'),
(21, 'Apartment house'),
(12, '4+1'),
(13, '4+kk'),
(14, '5+1'),
(15, '5+kk'),
(16, '6+1'),
(17, '6+kk'),
(26, '1+0');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_part` text,
  `city` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city_part`, `city`) VALUES
(1, 'Chodov', 'Prague');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `media`
--


-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `landlord_id` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `title`, `summary`, `landlord_id`, `location_id`, `created_on`, `status`) VALUES
(1, 'Great flat for PHP Development', 'This fabulous three bedroomed penthouse apartment is arranged over the sixth and seventh floors (with lift and concierge) of Orechovka, a smart residential development on the banks of the River Vltava.  The property offers chic and spacious accommodation ', '1', 1, '0000-00-00 00:00:00', 0),
(2, 'Great flat for J2EE Development', 'Benefiting from well proportioned living space and high-quality interiors throughout, this recently refurbished two bedroomed flat is attractively arranged over the ground and lower ground floors of a beautiful period block in the heart of historic Maryle', '1', 1, '0000-00-00 00:00:00', 0),
(3, 'Great flat for Java Web Development', 'A simply stunning two bedroomed third floor flat offering generous accommodation, with stylish and neutral décor, fantastic roof terrace and gorgeous wood floors.  The property comprises spacious reception room with lovely gas fireplace, amazing adjoining', '1', 1, '0000-00-00 00:00:00', 0),
(4, 'Nice Apartment', 'Nice Apartment', '1', 0, '0000-00-00 00:00:00', 0),
(5, 'New Apartment', 'This is demo apartment..', '2', 0, '2012-08-08 15:58:54', 1),
(6, 'a', 'Nice Apartment', '2', 0, '2012-08-08 16:11:26', 1),
(7, 'a', 'Nice Apartment', '2', 0, '2012-08-08 16:11:26', 1),
(8, 'a', 'Nice Apartment', '2', 0, '2012-08-08 16:11:26', 1),
(9, 'Nice Apartment 02', 'Nice Apartment 02', '1', 0, '2012-08-08 16:15:30', 1),
(10, 'Nice Apartment 02', 'Nice Apartment 02', '1', 0, '2012-08-08 16:15:30', 1),
(11, 'Nice Apartment', 'Nice Apartment', '2', 0, '2012-08-08 16:31:32', 0),
(12, 'Nice Apartment', 'Nice Apartment', '2', 0, '2012-08-08 16:31:32', 0),
(13, 'Nice Apartment', 'Nice Apartment', '2', 0, '2012-08-08 16:31:32', 0),
(14, 'A', 'aasasas', '2', 0, '2012-09-06 15:26:12', 1),
(15, 'A', 'aasasas', '1', 0, '2012-09-06 15:35:57', 1),
(16, 'Qatar Sports Club', 'aasasas', '2', 0, '2012-09-06 15:37:19', 1),
(17, 'A', 'aasasas', '1', 0, '2012-09-06 15:38:02', 1),
(18, 'Qatar Sports Club', 'aasasas', '1', 0, '2012-09-06 15:52:27', 1),
(19, 'New Property in New York', 'This is very nice villa in New York.', '1', 0, '2012-09-06 15:55:39', 1),
(20, 'Qatar Sports Club 2', 'This is very nice villa in New York.', '2', 0, '2012-09-06 17:40:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_build`
--

CREATE TABLE IF NOT EXISTS `property_build` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_en` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `property_build`
--

INSERT INTO `property_build` (`id`, `text_en`) VALUES
(1, 'brick'),
(2, 'concrete'),
(3, 'skeletal structure');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE IF NOT EXISTS `property_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`id`, `property_id`, `image_url`) VALUES
(1, 1, '20120521.jpg,20120521.jpg,20120522.jpg,20120523.jpg,20120524.jpg,20120525.jpg'),
(6, 2, '20120525.jpg,20120521.jpg,20120521.jpg,20120522.jpg,20120523.jpg,20120524.jpg'),
(7, 3, '20120523.jpg,20120522.jpg,20120521.jpg,20120524.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_type` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstname`, `lastname`, `password`, `city`, `status`, `user_type`, `create_date`, `update_date`) VALUES
(1, 'ads', 'ajay.deep@sparxtechnologies.com', 'A', 'D', '123456', 'New Delhi', 0, '', '2012-09-06 15:36:56', '2012-09-06 15:52:01'),
(2, 'steve', 'a1@a.com', 'Steve', 'Macheal', '123456', 'New York', 0, '', '2012-09-06 15:50:55', '2012-09-06 15:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `users_meta`
--

CREATE TABLE IF NOT EXISTS `users_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_meta`
--

