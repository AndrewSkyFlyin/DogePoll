-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 02:43 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `pollform`
--

use poll;
CREATE TABLE `pollform` (
  `pollid` mediumint(9) NOT NULL,
  `pollq` varchar(255) NOT NULL,
  `ch_one` varchar(100) NOT NULL,
  `ch_two` varchar(100) NOT NULL,
  `ch_three` varchar(100) NOT NULL,
  `ch_one_count` smallint(6) NOT NULL DEFAULT '0',
  `ch_two_count` smallint(6) NOT NULL DEFAULT '0',
  `ch_three_count` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pollform`
--

INSERT INTO `pollform` (`pollid`, `pollq`, `ch_one`, `ch_two`, `ch_three`, `ch_one_count`, `ch_two_count`, `ch_three_count`) VALUES
(1, 'What is the meaning of life?', '42', 'Anime Waifus', 'Video Games', 0, 2, 0),
(2, 'What should I have for dinner?', 'Sushi', 'Pizza', 'Hatsune Miku', 1, 1, 5),
(3, 'Who is the best for your laifu?', 'Ayase', 'Haruka', 'Innoimant', 1, 3, 2),
(4, 'There is a train approaching a track with five people tied to a track.  If you pull the switch it will switch lanes, but the switch lane has 1 person tied to it.  What do you do?', 'Pull the switch.', 'Do nothing.', 'Tell someone else to decide.', 0, 0, 0),
(5, 'What is the best Chinese webnovel?', 'æˆ‘æ¬²å°å¤©', 'ç›˜é¾™', 'ä¸‰ç•Œç‹¬å°Š', 1, 0, 0),
(6, 'What do you want to eat?', 'Burgers', 'Pizza', 'Icecream', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pollform`
--
ALTER TABLE `pollform`
  ADD PRIMARY KEY (`pollid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pollform`
--
ALTER TABLE `pollform`
  MODIFY `pollid` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
