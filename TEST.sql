-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2017 at 03:33 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TEST`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `col_name` varchar(20) NOT NULL,
  `col_age` varchar(20) NOT NULL,
  `col_city` varchar(20) NOT NULL,
  `col_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `col_name`, `col_age`, `col_city`, `col_phone`) VALUES
(1, 'rahul', '21', 'delhi', '9835098350'),
(2, 'raj', '24', 'ghaziabad', '9890909891'),
(3, 'vishwa', '26', 'delhi', '7898221122'),
(4, 'harsh', '22', 'patna', '9993551609'),
(5, 'surbhi', '22', 'jaipur', '7898001224'),
(6, 'shubham', '24', 'bhopal', '9906017825'),
(7, 'anupam', '22', 'gurgaon', '9031033982'),
(8, 'twinkle ', '22', 'patna', '9993552209'),
(9, 'yusuf', '23', 'pune', '8873403333'),
(10, 'mayank', '23', 'hyderabad', '9450423200'),
(11, 'sanu', '22', 'bhopal', '9922110044'),
(12, 'nishtha', '23', 'allahabad', '7857923468'),
(13, 'harsha', '23', 'bhopal', '9570566621'),
(14, 'avinash', '24', 'chennai', '7656903854'),
(15, 'loathe', '28', 'indore', '8797275766'),
(16, 'kajal', '25', 'gujarat', '7878787822'),
(17, 'gjg', '34', 'gdf', '3434343434'),
(18, 'kumar anupam', '23', 'patna', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
