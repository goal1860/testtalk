-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2013 at 11:17 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `testtalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `language` varchar(20) NOT NULL DEFAULT 'English',
  `desc` varchar(400) NOT NULL DEFAULT '',
  `categories` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(30) NOT NULL DEFAULT '',
  `new` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`id`, `name`, `language`, `desc`, `categories`, `image`, `new`) VALUES
(1, 'The Vale Girl', 'English', 'Fourteen-year-old Sarah Vale has gone missing in the small town of Banville.', 'Fiction', 'the-vale-girl.jpg', 0),
(2, 'The Swan Book', 'Spanish', 'The new novel by Alexis Wright, whose previous novel Carpentaria won the Miles Franklin Award and four other major prizes including the ABIA Literary Fiction Book of the Year Award. ', 'Film', 'the-swan-book.jpg', 0),
(3, 'Terra', 'Russian', 'No-one trusts humanity. No-one can quite understand why we''re intent on destroying the only place we have to live in the Universe.', 'Music', 'terra.jpg', 0),
(4, 'The Russian Tapestry', 'Russian', 'Marie Kulbas, the daughter of a wealthy merchant, is excited about her new life in the vibrant city of St Petersburg.', 'Fiction', 'the-russian-tapestry.jpg', 0),
(5, 'The Guts', 'English', 'Jimmy Rabbitte is back. The man who invented the Commitments back in the eighties is now forty-seven, with a loving wife, four kids ...and bowel cancer. ', 'Education', 'the-guts.jpg', 0);
