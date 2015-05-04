-- phpMyAdmin SQL Dump
-- version 4.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 04, 2015 at 05:37 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `desireStream`
--
CREATE DATABASE IF NOT EXISTS `desireStream` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `desireStream`;

-- --------------------------------------------------------

--
-- Table structure for table `nonProfits`
--

DROP TABLE IF EXISTS `nonProfits`;
CREATE TABLE IF NOT EXISTS `nonProfits` (
  `guid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `website` varchar(128) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `lastWin` datetime DEFAULT NULL,
  `active` int(10) NOT NULL DEFAULT '0' COMMENT '0=not active,\n1=active',
  `background` varchar(20) DEFAULT NULL,
  `textColor` varchar(20) DEFAULT NULL,
  `pic` varchar(150) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nonProfits`
--

INSERT INTO `nonProfits` (`guid`, `name`, `website`, `createDate`, `lastWin`, `active`, `background`, `textColor`, `pic`, `description`) VALUES
(1, 'Edmarc Children''s Hospice', 'http://edmarc.org/', NULL, NULL, 1, '#FF9900', '#000', 'http://edmarc.org/wp-content/themes/edmarc/images/edmarc-logo.jpg', 'Edmarc Hospice for Children sees a community in which no child or family is denied pediatric hospice services and a society that wholeheartedly accepts and supports pediatric care.'),
(3, 'DonateLife', 'http://www.donatelife.net', NULL, NULL, 1, '#337711', '#000', 'http://www.donatelife.net/wp-content/themes/donatelife-responsive/img/DLA-Logo-CMYK-white.png', 'Currently more than 123,000 men, women and children are awaiting organ transplants to save their lives. Thousands more are in need of tissue and cornea transplants to restore their mobility and sight. Register to be an organ, eye and tissue donor today and provide hope to those who wait.'),
(5, 'Children''s Hospital of the Kings Daughter', 'http://www.chkd.org/', NULL, NULL, 1, '#331188', '#eee', 'http://www.chkd.org/images/logo.png', 'Thank you for thinking of Children''s Hospital of The King''s Daughters. Your support through a one-time or recurring donation allows us to provide the best quality health care for children throughout our community.'),
(7, 'VBSPCA', 'http://vbspca.com', NULL, NULL, 0, '#6600ff', '#eee', 'http://vbspca.com/sites/default/files/vbspca_logo.png', 'Support the VBSPCA and save lives. There are many different ways to give and contribute to the animals.'),
(8, 'bob''s wallet', 'bob.com', '2015-05-04 00:00:00', NULL, 0, '#ffffff', '#000000', NULL, 'junk');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `ip` varchar(20) DEFAULT NULL,
  `nonprof` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`ip`, `nonprof`) VALUES
('::1', 1),
('::1', 3),
('::1', 3),
('::1', 3),
('::1', 3),
('::1', 3),
('::1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nonProfits`
--
ALTER TABLE `nonProfits`
  ADD PRIMARY KEY (`guid`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD KEY `nonProf_to_Table` (`nonprof`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nonProfits`
--
ALTER TABLE `nonProfits`
  MODIFY `guid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `nonProf_to_Table` FOREIGN KEY (`nonprof`) REFERENCES `nonProfits` (`guid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
