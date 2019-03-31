-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-03-31 07:08:30
-- 服务器版本： 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `high_six`
--

-- --------------------------------------------------------

--
-- 表的结构 `HOSPITAL_INFO`
--

CREATE TABLE `HOSPITAL_INFO` (
  `Hos_ID` int(11) NOT NULL,
  `Hos_name` varchar(100) NOT NULL,
  `Abstract` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `RATING`
--

CREATE TABLE `RATING` (
  `Rating_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Hos_ID` int(11) NOT NULL,
  `Effectiveness` int(11) NOT NULL,
  `Friendliness` int(11) NOT NULL,
  `Cost_benefit` int(11) NOT NULL,
  `Convenience` int(11) NOT NULL,
  `HBS` int(11) NOT NULL,
  `Comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `USERS_INFO`
--

CREATE TABLE `USERS_INFO` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `DOB` varchar(55) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `First_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `USERS_INFO`
--

INSERT INTO `USERS_INFO` (`User_ID`, `Username`, `Password`, `Gender`, `Mail`, `DOB`, `Last_name`, `First_name`) VALUES
(1000, 'qinjiabo1990', '$2y$10$iAgTHMAMPfvxP20R6p3bx.MKnXc6tqqnxMJTPVRk.PX3n1yvdyMpy', 'male', 'qinjiabo1990@gmail.com', '123456', 'Qin', 'Jiabo'),
(1001, 'fa', '$2y$10$pXFVyRhoLAugYq7SPNMMgO9zmaUYivkmCILcygM4obpkIwf1d4ahW', 'male', 'qinjiabo1990@gmail.com', '1111', 'ff', 'ff'),
(1002, 'www', '$2y$10$a661ZJfeoGgV8pb7KLWXgeuQnpM7BHHfkCnfWfQi2zAKckDuWeQfW', 'male', 'qinjiabo1990@gmail.com', '111111', 'qqq', 'qqq'),
(1003, 'wwww', '$2y$10$gqpmKYmlb6.F0t8kKWpa3OTC4YY/XeqifsAjx/0oA0B7TQmy5c.Bu', 'female', 'qinjiabo1990@sina.com', '1232131312', 'www', 'qqq'),
(1004, 'fdfd', '$2y$10$THHW0l9hl2gLY0jcXCKnMu7j7H4kuslmg0YTYVxuw7tfKqjCx.oa2', 'male', 'qinjiabo1990@gmail.com', '334', 'fg', 'fg'),
(1006, 'fdfddddd', '$2y$10$zRAHaCpOTC2tsVyujOfU6uXKbau5irG8JfLQBXMi.KKL54XwBRtZq', 'male', 'qinjiabo1990@gmail.com', '334', 'fg', 'fg'),
(1007, 'test', '$2y$10$L7/7rstChUm.jlb776q2lO3pimikp9z3iXEbbAjjy3uOJn2EfHsAa', 'male', 'qqweq@sdsd.com', '111111', 'qqq', 'qqq'),
(1008, 'test1', '$2y$10$fqdWYt2FgSWMEZD4uoox4eAkl.vd6blmd9lHZg0.3co2faBk6cL7a', 'female', 'qinjiabo1990@gmail.com', '1121990', 'aksdj', 'sjedu'),
(1009, 'ewe', '$2y$10$qtpp3BDgjotHJklfktBng.IBCDjosvuFsuGKQsYB6MaB62pPmrqRa', 'male', 'qinjiabo1990@gmail.com', '18', 'ewe', 'wewe'),
(1010, 'qwesdsds', '$2y$10$F7/rCjPmoPH4SIa4fFwkReMlyb.H0jY4ibxmRBAq5GHJLksrtF5Km', 'female', 'qinjiabo1990@gmail.com', '19-30', 'sd', 'cx');

-- --------------------------------------------------------

--
-- 表的结构 `USERS_REWARD`
--

CREATE TABLE `USERS_REWARD` (
  `User_ID` int(11) NOT NULL,
  `Reward` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `USERS_REWARD`
--

INSERT INTO `USERS_REWARD` (`User_ID`, `Reward`) VALUES
(1000, 0),
(1001, 0),
(1002, 0),
(1003, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `HOSPITAL_INFO`
--
ALTER TABLE `HOSPITAL_INFO`
  ADD PRIMARY KEY (`Hos_ID`);

--
-- Indexes for table `RATING`
--
ALTER TABLE `RATING`
  ADD PRIMARY KEY (`Rating_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Hos_ID` (`Hos_ID`);

--
-- Indexes for table `USERS_INFO`
--
ALTER TABLE `USERS_INFO`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `USERS_REWARD`
--
ALTER TABLE `USERS_REWARD`
  ADD PRIMARY KEY (`User_ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `HOSPITAL_INFO`
--
ALTER TABLE `HOSPITAL_INFO`
  MODIFY `Hos_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `USERS_INFO`
--
ALTER TABLE `USERS_INFO`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- 使用表AUTO_INCREMENT `USERS_REWARD`
--
ALTER TABLE `USERS_REWARD`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- 限制导出的表
--

--
-- 限制表 `RATING`
--
ALTER TABLE `RATING`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `USERS_INFO` (`User_ID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`Hos_ID`) REFERENCES `HOSPITAL_INFO` (`Hos_ID`);

--
-- 限制表 `USERS_REWARD`
--
ALTER TABLE `USERS_REWARD`
  ADD CONSTRAINT `users_reward_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `USERS_INFO` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
