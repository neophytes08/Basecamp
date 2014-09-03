-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2014 at 12:32 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `basecamp`
--
CREATE DATABASE IF NOT EXISTS `basecamp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `basecamp`;

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE IF NOT EXISTS `tblcomment` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_ID` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `todo_id` int(10) NOT NULL,
  `dateposted` datetime NOT NULL,
  `comment` longtext NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_ID` (`user_ID`),
  KEY `project_id` (`project_id`),
  KEY `todo_id` (`todo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`comment_id`, `user_ID`, `project_id`, `todo_id`, `dateposted`, `comment`) VALUES
(1, 1, 1, 1, '2014-08-29 00:00:00', 'ikaw sa UI, imung nang trabaho :3'),
(2, 3, 1, 1, '2014-08-29 00:00:00', 'da ulawan alfred bei xD'),
(4, 4, 1, 1, '2014-08-29 00:00:00', 'botngig flowers2 fred para chuy xD HAHAHAHA!'),
(5, 1, 1, 1, '2014-08-29 00:00:00', 'para daghan kiki bels nimu fred xD HAHHAAHHAA'),
(8, 1, 1, 1, '2014-08-29 00:00:00', 'huehue xD'),
(12, 2, 1, 1, '2014-08-29 00:00:00', 'pansit rana, sayon rana nga trabaho :3\r\nor ako nallang maghimu tanan, pagpuyo nalng mo, paghulat nalang kung mahuman nako ni, 5 days rani cya..'),
(13, 3, 1, 1, '2014-08-31 00:00:00', 'pyason :p'),
(24, 1, 1, 1, '2014-08-31 11:33:28', 'yow!');

-- --------------------------------------------------------

--
-- Table structure for table `tbldiscussion`
--

CREATE TABLE IF NOT EXISTS `tbldiscussion` (
  `discuss_id` int(10) NOT NULL AUTO_INCREMENT,
  `discuss_subject` varchar(50) NOT NULL,
  `discuss_content` longtext NOT NULL,
  `discuss_option` enum('invite_people','loopin_someone') DEFAULT NULL,
  `discuss_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_ID` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  PRIMARY KEY (`discuss_id`),
  KEY `user_ID` (`user_ID`,`project_id`),
  KEY `projecyt_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblfiles`
--

CREATE TABLE IF NOT EXISTS `tblfiles` (
  `file_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  `datetime` date NOT NULL,
  PRIMARY KEY (`file_id`),
  KEY `project_id` (`project_id`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblproject_folder`
--

CREATE TABLE IF NOT EXISTS `tblproject_folder` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `datetime` date NOT NULL,
  `user_ID` int(10) NOT NULL,
  `owner` char(10) DEFAULT NULL,
  PRIMARY KEY (`project_id`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblproject_folder`
--

INSERT INTO `tblproject_folder` (`project_id`, `project_name`, `description`, `datetime`, `user_ID`, `owner`) VALUES
(1, 'Elective Project', 'MUST Social Network Project', '2014-08-29', 1, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

CREATE TABLE IF NOT EXISTS `tblteam` (
  `team_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_ID` int(10) NOT NULL,
  `project_id` int(19) NOT NULL,
  PRIMARY KEY (`team_id`),
  KEY `user_ID` (`user_ID`,`project_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`team_id`, `user_ID`, `project_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 3, 1),
(7, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbltodo`
--

CREATE TABLE IF NOT EXISTS `tbltodo` (
  `todo_id` int(10) NOT NULL AUTO_INCREMENT,
  `info` longtext NOT NULL,
  `datetime` datetime NOT NULL,
  `status` enum('Done','Undone') NOT NULL,
  `user_ID` int(10) DEFAULT NULL,
  `project_id` int(10) NOT NULL,
  PRIMARY KEY (`todo_id`),
  KEY `user_ID` (`user_ID`,`project_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbltodo`
--

INSERT INTO `tbltodo` (`todo_id`, `info`, `datetime`, `status`, `user_ID`, `project_id`) VALUES
(1, 'You will be assign as Front End Developer.', '2014-08-30 03:01:34', 'Undone', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `user_ID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `emailadd` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `mname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `datejoin` datetime DEFAULT NULL,
  `dateupdated` date DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_ID`, `username`, `password`, `emailadd`, `fname`, `mname`, `lname`, `profile_pic`, `datejoin`, `dateupdated`) VALUES
(1, 'neophytes', 'a425352a84b14c7acb601495bd156322', 'allan.alzula@gmail.com', 'allan cheam', 'vallente', 'alzula', 'mem21.jpg', '2014-08-29 04:39:11', '2014-08-29'),
(2, 'malfred', '202cb962ac59075b964b07152d234b70', 'malfred@gmail.com', 'alfred', 'rubia', 'melendres', 'memgay1.jpg', '2014-08-29 04:48:45', '2014-08-29'),
(3, 'jean123', '202cb962ac59075b964b07152d234b70', 'jean@gmail.com', 'jean', 'yeah', 'parreno', 'memcat1.jpg', '2014-08-29 04:49:09', '2014-08-29'),
(4, 'jhai123', '202cb962ac59075b964b07152d234b70', 'jhai@gmail.com', 'alaiza jean', 'yeah', 'maandig', 'mem31.jpg', '2014-08-29 04:49:53', '2014-08-29');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `tblcomment_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tblusers` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcomment_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tblproject_folder` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblcomment_ibfk_3` FOREIGN KEY (`todo_id`) REFERENCES `tbltodo` (`todo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldiscussion`
--
ALTER TABLE `tbldiscussion`
  ADD CONSTRAINT `tbldiscussion_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tblusers` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbldiscussion_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tblproject_folder` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfiles`
--
ALTER TABLE `tblfiles`
  ADD CONSTRAINT `tblfiles_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `tblproject_folder` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblfiles_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `tblusers` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblproject_folder`
--
ALTER TABLE `tblproject_folder`
  ADD CONSTRAINT `tblproject_folder_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tblusers` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblteam`
--
ALTER TABLE `tblteam`
  ADD CONSTRAINT `tblteam_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tblusers` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblteam_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tblproject_folder` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbltodo`
--
ALTER TABLE `tbltodo`
  ADD CONSTRAINT `tbltodo_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tblusers` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltodo_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `tblproject_folder` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
