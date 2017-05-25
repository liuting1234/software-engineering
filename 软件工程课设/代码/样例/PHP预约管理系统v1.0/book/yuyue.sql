-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 04 月 25 日 07:21
-- 服务器版本: 5.0.41
-- PHP 版本: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `aa`
--

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) character set utf8 NOT NULL,
  `typename` varchar(200) character set utf8 NOT NULL,
  KEY `id` (`id`),
  KEY `typeid` (`typename`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `title`, `typename`) VALUES
(96, '其他', 'website'),
(101, '外科', 'illness'),
(78, 'soso（搜搜）', 'source'),
(77, 'sogou（搜狗）', 'source'),
(79, '其他', 'source'),
(103, '计划生育', 'illness'),
(102, '未定', 'doctor'),
(75, 'baidu（百度）', 'source'),
(95, 'www.6503333.com', 'website'),
(76, 'google（谷歌）', 'source'),
(100, '不孕不育', 'illness'),
(99, '耳鼻喉科', 'illness'),
(98, '男科', 'illness'),
(97, '妇科', 'illness'),
(105, 'www.yysdwyy.com', 'website'),
(106, 'www.yy5yy.com', 'website'),
(107, 'QQ', 'source'),
(108, '内科', 'illness'),
(109, '肛肠科', 'illness'),
(110, '结石科', 'illness');

-- --------------------------------------------------------

--
-- 表的结构 `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `yyh` varchar(12) NOT NULL,
  `name` char(100) NOT NULL,
  `sex` mediumint(5) unsigned NOT NULL,
  `age` mediumint(5) default NULL,
  `contact` varchar(200) NOT NULL,
  `way` int(2) unsigned NOT NULL,
  `source` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `appdate` date default NULL,
  `doctor` varchar(200) default NULL,
  `memo` longtext NOT NULL,
  `arrive` date default NULL,
  `status` int(2) unsigned default '0',
  `consult` varchar(200) NOT NULL,
  `addtime` datetime NOT NULL,
  `address` longtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `appdate` (`appdate`),
  KEY `arrive` (`arrive`),
  KEY `name` (`name`),
  KEY `age` (`age`),
  KEY `consult` (`consult`),
  KEY `addtime` (`addtime`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=478 ;

--
-- 转存表中的数据 `patient`
--

INSERT INTO `patient` (`id`, `yyh`, `name`, `sex`, `age`, `contact`, `way`, `source`, `website`, `keyword`, `class`, `appdate`, `doctor`, `memo`, `arrive`, `status`, `consult`, `addtime`, `address`) VALUES
(1, 'W101', '张帅名', 1, 25, '15888888888', 2, 'baidu（百度）', 'www.6503333.com', '益阳市第5人民医院客服', '妇科', '2012-07-04', '', '盆腔炎 泌尿结石  非淋待查', '2012-07-04', 0, '王伟', '2012-07-01 12:50:45', '沅江');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `user` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `u_right` int(11) unsigned NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `user`, `passwd`, `name`, `u_right`) VALUES
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', '管理员', 100);
