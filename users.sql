-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-12-17 13:38:32
-- 服务器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `users`
--

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE `booking` (
  `id1` int(11) NOT NULL COMMENT '收支编号',
  `aid` int(11) NOT NULL COMMENT '所属用户编号',
  `cid` int(11) NOT NULL COMMENT '所属分类编号',
  `type` int(11) NOT NULL COMMENT '1表示收入，-1表示支出',
  `amount` decimal(10,2) NOT NULL COMMENT '金额',
  `postdate` date NOT NULL COMMENT '发生日期',
  `remark` text NOT NULL COMMENT '备注信息'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `booking`
--

INSERT INTO `booking` (`id1`, `aid`, `cid`, `type`, `amount`, `postdate`, `remark`) VALUES
(6, 1, 4, 1, '65.00', '2021-12-08', '无'),
(8, 1, 5, -1, '70.00', '2021-12-08', '无'),
(10, 1, 1, -1, '65.00', '2021-12-08', '无'),
(11, 1, 4, 1, '100.00', '2021-12-08', '工资'),
(12, 1, 4, 1, '100.00', '2021-12-08', '纪念日'),
(13, 1, 5, -1, '520.00', '2021-12-08', '纪念日'),
(15, 1, 18, 1, '10000.00', '2021-12-09', '中大奖了'),
(18, 1, 5, 1, '100.00', '2021-12-09', '纪念日'),
(19, 1, 1, -1, '15.00', '2021-12-10', '三食堂'),
(20, 1, 5, 1, '30.00', '2021-12-10', '无'),
(21, 10, 1, -1, '10.00', '2021-12-10', '无'),
(22, 1, 1, -1, '15.00', '2021-12-11', '三食堂'),
(23, 1, 1, 1, '71.00', '2021-12-11', '无'),
(24, 1, 5, 1, '100.00', '2021-12-11', '壮壮发的红包'),
(25, 9, 1, -1, '100.00', '2021-12-13', '老马吃饭');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT '分类编号',
  `title` varchar(16) NOT NULL DEFAULT 'no null' COMMENT '分类名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, '吃饭'),
(2, '请客'),
(4, '转账'),
(5, '红包'),
(10, '工资'),
(16, '提成'),
(18, '项目结算'),
(19, '彩票');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL COMMENT '用户编号',
  `username` varchar(10) NOT NULL COMMENT '用户名',
  `password` char(20) NOT NULL COMMENT '密码',
  `name` varchar(16) NOT NULL COMMENT '真实姓名',
  `email` varchar(20) NOT NULL COMMENT '邮箱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--


--
-- 转储表的索引
--

--
-- 表的索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id1`);

--
-- 表的索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `id1` int(11) NOT NULL AUTO_INCREMENT COMMENT '收支编号', AUTO_INCREMENT=26;

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类编号', AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户编号', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
