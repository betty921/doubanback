-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-03 00:47:52
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
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` char(20) NOT NULL,
  `userPwd` char(20) NOT NULL,
  `email` char(20) NOT NULL,
  `Tel` char(20) NOT NULL,
  `QQ` char(20) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPwd`, `email`, `Tel`, `QQ`) VALUES
(1, 'å¶è¯­', 'xixi1996@', '1753513010@qq.com', '18779867248', '1753513010'),
(2, 'liuj', 'cici1996@', '1123564575@qq.com', '16578965678', '1873678867'),
(3, 'æ›¦æ›¦', 'xixi1996@', '1111111111@qq.com', '11111111111', '1111111111'),
(4, 'xixi', 'xixi1996@', '1111111111@qq.com', '12343323637', '2737889900'),
(5, 'xixi', 'xixi1996', '1111111111@qq.com', '1111111111', '1111111111'),
(6, 'aa', 'aiai1996', '', '12345678900', '1234567890'),
(7, 'cc', 'cici1996', '', '22222222222', ''),
(8, 'dd', 'xixi1996', '', '12222222222', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
