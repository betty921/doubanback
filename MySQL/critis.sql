-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-03 00:50:20
-- 服务器版本： 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dypj`
--

-- --------------------------------------------------------

--
-- 表的结构 `critis`
--

DROP TABLE IF EXISTS `critis`;
CREATE TABLE IF NOT EXISTS `critis` (
  `cID` int(11) NOT NULL AUTO_INCREMENT,
  `useID` int(11) NOT NULL,
  `mvID` int(11) NOT NULL,
  `ctime` date NOT NULL,
  `userlabel` char(200) DEFAULT NULL,
  `rating` char(50) NOT NULL,
  `fen` float DEFAULT NULL,
  `content` char(200) DEFAULT NULL,
  `hzs` int(11) DEFAULT NULL,
  `yhh` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cID`),
  KEY `useID` (`useID`),
  KEY `mvID` (`mvID`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `critis`
--

INSERT INTO `critis` (`cID`, `useID`, `mvID`, `ctime`, `userlabel`, `rating`, `fen`, `content`, `hzs`, `yhh`) VALUES
(10, 3, 5, '2018-04-17', '', '2', NULL, '', 0, NULL),
(11, 2, 5, '2018-04-24', '', '3', NULL, 'å•¦å•¦å•¦å•¦', 1, '1x'),
(12, 7, 5, '2018-04-21', '', '1', NULL, 'zrhdbd', 0, ''),
(14, 8, 5, '2018-04-24', 'æ ¡å›­ æ–‡è‰º', '3', NULL, 'é¹…é¹…é¹…é¥¿é¥¿', 0, ''),
(15, 1, 6, '2018-04-21', 'æ—¥æœ¬åŠ¨ç”» æ—¥æœ¬', '4', NULL, 'å¥½çœ‹', 0, ''),
(16, 1, 7, '2018-04-20', '', '3', NULL, '', 0, NULL),
(17, 1, 8, '2018-04-30', '', '4', NULL, 'å‹æƒ…', 1, '1x'),
(18, 1, 10, '2018-04-20', '', '4', NULL, '', 0, NULL),
(19, 1, 11, '2018-04-20', '', '3', NULL, '', 0, NULL),
(20, 1, 12, '2018-04-20', '', '2', NULL, '', 0, NULL),
(21, 1, 13, '2018-04-20', '', '4', NULL, '', 0, NULL),
(22, 1, 14, '2018-04-20', '', '2', NULL, '', 0, NULL),
(23, 1, 9, '2018-04-20', '', '3', NULL, '', 0, NULL),
(24, 3, 9, '2018-04-20', '', '2', NULL, '', 0, NULL),
(25, 3, 8, '2018-04-20', '', '3', NULL, '', 0, NULL),
(26, 3, 7, '2018-04-20', '', '4', NULL, '', 0, NULL),
(27, 3, 10, '2018-04-20', '', '4', NULL, '', 0, NULL),
(28, 3, 12, '2018-04-20', '', '3', NULL, '', 0, NULL),
(29, 3, 14, '2018-04-20', '', '4', NULL, '', 0, NULL),
(30, 3, 11, '2018-04-20', '', '3', NULL, '', 0, NULL),
(31, 3, 13, '2018-04-20', '', '3', NULL, '', 0, NULL),
(32, 3, 6, '2018-04-20', '', '4', NULL, '', 0, NULL),
(35, 6, 9, '2018-04-22', ' æ—¥æœ¬åŠ¨ç”»', '3', NULL, 'é’Ÿè£è¾‰å¤§ç¬¨è›‹', 0, ''),
(36, 6, 10, '2018-04-20', '', '3', NULL, '', 0, NULL),
(37, 6, 11, '2018-04-20', '', '4', NULL, '', 0, NULL),
(38, 6, 12, '2018-05-01', '', '4', NULL, 'é˜³å…‰', 0, NULL),
(39, 6, 13, '2018-04-20', '', '4', NULL, '', 0, NULL),
(40, 6, 14, '2018-04-20', '', '1', NULL, '', 0, NULL),
(41, 7, 6, '2018-04-20', '', '3', NULL, '', 0, NULL),
(42, 7, 7, '2018-04-20', '', '2', NULL, '', 0, NULL),
(43, 7, 8, '2018-04-20', '', '3', NULL, '', 0, NULL),
(44, 7, 9, '2018-04-20', '', '3', NULL, '', 0, NULL),
(45, 7, 10, '2018-04-20', '', '2', NULL, '', 0, NULL),
(46, 7, 11, '2018-04-20', '', '2', NULL, '', 0, NULL),
(47, 7, 12, '2018-04-20', '', '4', NULL, '', 0, NULL),
(48, 7, 13, '2018-04-30', '', '2', NULL, 'æ®‹å¿', 0, NULL),
(49, 7, 14, '2018-04-20', '', '1', NULL, '', 0, NULL),
(50, 8, 6, '2018-04-20', '', '2', NULL, '', 0, NULL),
(51, 8, 7, '2018-04-20', '', '4', NULL, '', 0, NULL),
(52, 8, 8, '2018-04-20', '', '4', NULL, '', 0, NULL),
(53, 8, 9, '2018-04-20', '', '1', NULL, '', 0, NULL),
(54, 8, 10, '2018-04-20', '', '3', NULL, '', 0, NULL),
(55, 8, 11, '2018-04-20', '', '0', NULL, '', 0, NULL),
(56, 8, 12, '2018-04-20', '', '4', NULL, '', 0, NULL),
(57, 8, 13, '2018-04-20', '', '3', NULL, '', 0, NULL),
(58, 8, 14, '2018-04-20', '', '0', NULL, '', 0, NULL),
(59, 2, 6, '2018-04-20', '', '0', NULL, '', 0, NULL),
(60, 2, 7, '2018-04-20', '', '3', NULL, '', 0, NULL),
(61, 2, 8, '2018-04-20', '', '4', NULL, '', 0, NULL),
(62, 2, 9, '2018-04-20', '', '4', NULL, '', 0, NULL),
(63, 2, 10, '2018-04-20', '', '4', NULL, '', 0, NULL),
(64, 2, 11, '2018-04-20', '', '4', NULL, '', 0, NULL),
(65, 2, 12, '2018-04-20', '', '4', NULL, '', 0, NULL),
(66, 2, 13, '2018-04-20', '', '4', NULL, '', 0, NULL),
(67, 2, 14, '2018-04-20', '', '4', NULL, '', 0, NULL),
(72, 6, 5, '2018-04-22', '', '4', NULL, 'å¥½çœ‹å—', 1, '1x'),
(73, 1, 5, '2018-04-21', '', '0', NULL, 'ä¸å¥½çœ‹', 0, ''),
(80, 6, 7, '2018-04-23', '', '3', NULL, '', 0, NULL),
(82, 6, 8, '2018-04-23', ' åŠ¨ç”»', '4', NULL, 'å“ˆå“ˆ', 2, '7x1x'),
(84, 4, 5, '2018-04-25', '', '3', NULL, 'ç»æµŽç»æµŽå†›', 0, NULL),
(85, 4, 8, '2018-04-26', '', '3', NULL, '', 0, NULL);

--
-- 限制导出的表
--

--
-- 限制表 `critis`
--
ALTER TABLE `critis`
  ADD CONSTRAINT `critis_ibfk_1` FOREIGN KEY (`mvID`) REFERENCES `movies` (`mvID`),
  ADD CONSTRAINT `critis_ibfk_2` FOREIGN KEY (`useID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
