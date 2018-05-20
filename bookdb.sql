-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2018 at 06:47 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booktbl`
--

CREATE TABLE IF NOT EXISTS `booktbl` (
  `bookid` int(20) NOT NULL DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `lib_sec` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booktbl`
--

INSERT INTO `booktbl` (`bookid`, `title`, `genre`, `author`, `lib_sec`, `status`) VALUES
(1, 'Fantastic Beasts and where to find them', 'Fantasy Fiction', 'J.K Rowling', 'Fiction', 'Available'),
(2, 'The Maze Runner', 'Adventure Fiction', 'James Dashner', 'Fiction', 'Available'),
(3, 'Charlotte''s Web', 'Children''s Literature', 'E.B. White', 'Children''s Section', 'Available'),
(4, 'The Lord of the Rings', 'Fantasy Fiction', 'J. R. R. Tolkien', 'Fiction', 'Available'),
(5, 'The Diary of a Young Girl', 'History', 'Anne Frank', 'Circulation', 'Available'),
(6, 'Hiroshima', 'History', 'John Hersey', 'Circulation', 'Borrowed'),
(7, 'The Hunger Games', 'Adventure Fiction', 'Suzanne Collins', 'Fiction', 'Available'),
(8, 'The Manila Bulletin', 'News & Periodicals', 'Manila Bulletin Publishing Corporation', 'Periodical ', 'Available'),
(9, 'Alice Adventures', 'Fantasy Fiction', 'Lewis Carroll', 'Fiction', 'Available'),
(10, 'Oxford English Dictionary', 'Reference', 'John Simpson', 'General Reference', 'Available'),
(11, 'The Adventures of Pinocchio', 'Children''s Literature', 'Carlo Collodi', 'Children''s Section', 'Available'),
(12, 'It', 'Horror', 'Stephen King', 'Fiction', 'Available'),
(13, 'Paper Towns', 'Fantasy Fiction', 'John Green', 'Fiction', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_tbl`
--

CREATE TABLE IF NOT EXISTS `borrow_tbl` (
  `borrow_id` int(10) NOT NULL,
  `bookid` mediumtext,
  `user_id` mediumtext NOT NULL,
  `date_borrowed` date DEFAULT NULL,
  `date_returned` date DEFAULT NULL,
  `approval` text,
  `status` text,
  PRIMARY KEY (`borrow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_tbl`
--

INSERT INTO `borrow_tbl` (`borrow_id`, `bookid`, `user_id`, `date_borrowed`, `date_returned`, `approval`, `status`) VALUES
(1, '1', '2018003', '2018-05-15', '2018-05-18', 'Yes', 'Available'),
(2, '2', '2018002', '2018-05-15', '2018-05-16', 'Yes', 'Available'),
(3, '6', '2018004', '2018-05-20', NULL, 'Yes', 'Borrowed'),
(4, '9', '2018005', '2018-05-20', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logintbl`
--

CREATE TABLE IF NOT EXISTS `logintbl` (
  `userid` int(50) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `position` mediumtext,
  `date_registered` date NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2018009 ;

--
-- Dumping data for table `logintbl`
--

INSERT INTO `logintbl` (`userid`, `password`, `position`, `date_registered`) VALUES
(2018001, '12345', 'Admin', '2018-05-12'),
(2018002, '12345', 'user', '2018-05-12'),
(2018003, '12345', 'user', '2018-05-13'),
(2018004, '12345', 'user', '2018-05-18'),
(2018005, 'ann12345', 'user', '2018-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE IF NOT EXISTS `usertbl` (
  `userid` mediumtext,
  `fname` mediumtext,
  `mname` mediumtext,
  `lname` mediumtext,
  `email` mediumtext,
  `contact` varchar(100) DEFAULT NULL,
  `age` mediumtext,
  `gender` mediumtext,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`userid`, `fname`, `mname`, `lname`, `email`, `contact`, `age`, `gender`, `address`) VALUES
('2018001', 'Rieanne', 'Lejano', 'Arnedo', 'rieanne_2297@yahoo.com', '09123456789', '20', 'Female', '3754 Estrella St. Bangkal Makati City'),
('2018002', 'Mary Rose', 'Lejano', 'Arnedo', 'maryrose0893@gmail.com', '09123456789', '25', 'Female', '3754 Estrella St. Bangkal Makati City'),
('2018003', 'Cristhoper', 'Anonuevo', 'Marquina', 'unlimited@gmail.com', '09214567438', '20', 'Male', 'Pulanglupa, Las Pinas'),
('2018004', 'Mary Hope', 'Maloon', 'Suson', 'maryhope@gmail.com', '09172345667', '20', 'Female', 'Villamor Air Base, Pasay City'),
('2018005', 'Ann Bernadeth', 'Mabini', 'Baculpo', 'ann_badeth@yahoo.com', '09362456793', '19', 'Female', 'Dagat-dagatan, Caloocan City');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
