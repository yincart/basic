-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 23 日 01:54
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yincart`
--

-- --------------------------------------------------------

--
-- 表的结构 `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `theme` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(45) DEFAULT NULL,
  `author` varchar(45) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `update_url` varchar(100) DEFAULT NULL,
  `desc` text,
  `config` longtext,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `themes`
--

INSERT INTO `themes` (`theme`, `name`, `author`, `site`, `update_url`, `desc`, `config`, `create_time`, `update_time`) VALUES
('default', '默认', 'Yincart', 'http://yincart.com', 'http://yincart.com/themes', 'Now using!', '', 1371681498, 1387519365),
('leather', 'leather', 'Haiqiang', 'http://yincart.com', 'http://yincart.com/themes', '', 'aaa', 1387438488, 1387519365),
('ultimo', 'Ultimo', '', 'http://ultimo.infortis-themes.com', '', '', '', 1371681800, 1387518077);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
