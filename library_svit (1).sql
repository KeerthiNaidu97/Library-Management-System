-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 04:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library_XYZ`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE IF NOT EXISTS `credentials` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `usn` varchar(15) NOT NULL,
  `semester` int(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`sid`, `email`, `password`, `name`, `usn`, `semester`, `branch`, `type`, `mobile`) VALUES
(1, 'AnanthNikhila@gmail.com', 'XYZ123', 'Nikhila', '1VA13CS032', 8, 'CSE', '', '8105964864'),
(2, 'pooja@gmail.com', 'XYZ123', 'Pooja', '1VA13CS022', 5, 'CSE', '', ''),
(4, 'poojareddy@gmail.com', 'XYZ123', 'Pooja reddy', '1VA13CS025', 6, 'CSE', '', '8553149795'),
(5, 'Shwetha@gmail.com', 'XYZ123', 'Shwetha', '1VA13CS028', 8, 'CSE', '', '9980005027'),
(6, 'lib@gmail.com', 'XYZ123', 'Harish', '', 0, '', 'librarian', ''),
(8, 'admin@gmail.com', 'XYZ123', 'ADMIN', '', 0, '', 'admin', ''),
(9, 'faculty@gmail.com', 'XYZ12321', 'Mohan K G', '', 0, '', 'faculty', '');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `path` varchar(2000) NOT NULL,
  `material` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `path`, `material`, `description`) VALUES
(12, '../materials/wamp.pdf', 'wamp.pdf', 'By default, the reload() method reloads the page from the cache, but you can force it to reload the page from the server by setting the forceGet parameter to true: location.reload(true).'),
(13, '../materials/icrtaet1711.pdf', 'icrtaet1711.pdf', 'someeh'),
(14, '../materials/API-Docs (1).pdf', 'API-Docs (1).pdf', ' the cache, but you can force it to reload the page from the server by setting the forceGet parameter to true');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(20) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `semester` int(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `mat_path` varchar(2000) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`mid`, `subject_code`, `subject`, `description`, `semester`, `branch`, `mat_path`) VALUES
(1, '10CS0214', 'Software Arhcitecture', '“The software architecture of a program or computing system is the structure or structures of the system, which comprise software elements, the externally visible properties of those elements, and the relationships among them.', 8, 'CSE', '../materials/one.pdf'),
(2, '10CS412', 'Computer Networks', 'Computer NetworksComputer NetworksComputer Networks Computer Networks', 6, 'CSE', 'some/path');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE IF NOT EXISTS `notice_board` (
  `nid` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`nid`, `date`, `title`, `description`) VALUES
(1, '2017-05-03', 'Sai Vidya Institute of Technology (XYZ)\r\n', 'Sai Vidya Institute of Technology (XYZ) is a private college of engineering and technology in the northernmost part of the city of Bangalore, India'),
(2, '2017-05-09', 'the fact of observing or paying', ' attention to something.\r\n"their silence did not escape my notice" attention to something.\r\n"their silence did not escape my notice"');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `description`, `date`) VALUES
(3, 'Join the Stack Overflow Community', 'Stack Overflow is a community of 7.1 million programmers, just like you, helping each other. Join them; it only takes a minute:', '2017-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `requested_list`
--

CREATE TABLE IF NOT EXISTS `requested_list` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `book_id` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `approved_date` varchar(50) DEFAULT NULL,
  `returned` varchar(20) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `requested_list`
--

INSERT INTO `requested_list` (`rid`, `book_id`, `sid`, `date`, `status`, `approved_date`, `returned`) VALUES
(47, 1, 5, '2017-05-01', 'given', '2017-05-01', 'no'),
(48, 1, 1, '2017-05-18', 'given', '2017-05-18', 'no'),
(49, 2, 1, '2017-05-01', 'given', '2017-05-17', 'no'),
(54, 1, 4, '2017-05-17', 'given', '2017-05-17', 'no'),
(55, 2, 4, '2017-05-17', 'pending', '2017-05-17', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `request_book`
--

CREATE TABLE IF NOT EXISTS `request_book` (
  `book_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(1000) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_book`
--

INSERT INTO `request_book` (`book_id`, `title`, `author`, `stock`) VALUES
(1, 'Engineering Mathematics 2', 'KSC 2017 Edition', 4),
(2, 'Advanced Energy Efficient Building Envelope Systems', 'Moncef Krarti, Guest Editor, Publisher: ASME, Publish Date: 2017', 4),
(3, 'Nuclear Reactor Thermal-Hydraulics: Past, Present and Future', 'KSC 2017 Edition', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
