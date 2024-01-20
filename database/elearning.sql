-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 07:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `class`, `company`) VALUES
(1, 'Biology', 'Class 1st', 'School Management System'),
(2, 'Physics', 'Class 2nd', 'School Management System'),
(3, 'Physics', 'Class 1st', 'School Management System'),
(4, 'Math', 'Class 3rd', 'School Management System'),
(5, 'jgjh', 'Class 1st', 'School Management System');

-- --------------------------------------------------------

--
-- Table structure for table `gurukkal_master`
--

CREATE TABLE `gurukkal_master` (
  `sno` int(11) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `per` int(11) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gurukkal_master`
--

INSERT INTO `gurukkal_master` (`sno`, `gname`, `per`, `company`) VALUES
(3, 'Ganesha Iyer', 5, 'Lord Shiva Temple'),
(4, 'Venkatesh Iyer', 5, 'Lord Shiva Temple');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `sno` int(11) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL,
  `iname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` text NOT NULL,
  `photo` text NOT NULL,
  `thumb` text NOT NULL,
  `author` text NOT NULL,
  `publisher` text NOT NULL,
  `place` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `totalpages` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`sno`, `category`, `type`, `iname`, `price`, `photo`, `thumb`, `author`, `publisher`, `place`, `year`, `totalpages`, `language`, `company`) VALUES
(8, 'Class 10th', 'video', 'Grade 10 : Social Studies', 'Government of Nepal has initiated Virtual Learning through NCED, Sanothimi Bhaktapur.All the videos are based on the curriculum and textbooks of grade 10.', 'https://youtu.be/HIOi9-OdM9c', 'uploads/09102021175226Grade10Social_rsGu5Tu.png', '1', 'National Center For Educational Development', 'Nepali', '2021', '1', 'English', 'School Management System'),
(9, 'Class 10th', 'video', 'Class 10 Optional Mathematics', 'à¤—à¤£à¤¿à¤¤,  Optional Mathematics,  Optional Maths,  SEE,  Maths,  à¤•à¤•à¥à¤·à¤¾ à¥§à¥¦,  Grade 10,  à¤à¤šà¥à¤›à¤¿à¤• à¤—à¤£à¤¿à¤¤', 'https://youtu.be/beyGCfKEEvc', 'uploads/09102021175936OptMaths.png', '1', 'Department Of Information Technology', 'Nepal', 'Jun 27, 2018', '1', 'à¤¨à¥‡à¤ªà¤¾à¤²à¥€', 'School Management System'),
(10, 'Class 10th', 'video', 'Grade 10 Science (Kids Of Kathmandu)', 'Science,  Secondary Education Examination (SEE),  Tutorial videos,  à¤µà¤¿à¤œà¥à¤žà¤¾à¤¨,  SEE,  à¤•à¤•à¥à¤·à¤¾ à¥§à¥¦,  Grade 10,  SEE-Science', 'https://youtu.be/Dq4eEKzz4uc', 'uploads/09102021180108Screenshot-2018-5-25_Pustakalaya_homepage.png', '1', 'Science', 'Nepal', '2021', '1', 'à¤¨à¥‡à¤ªà¤¾à¤²à¥€', 'School Management System'),
(11, 'Class 1st', 'video', 'Grade 10 Math (Kids Of Kathmandu)', 'Mathematics,  à¤—à¤£à¤¿à¤¤,  Secondary Education Examination (SEE),  Tutorial videos,  SEE,  Maths,  à¤•à¤•à¥à¤·à¤¾ à¥§à¥¦,  Grade 10,  SEE-Maths', 'https://youtu.be/p6ETEZYALxM', 'uploads/09102021180409Screenshot-2018-5-23_Pustakalaya_homepage.png', '1', 'Science', 'Nepal', '2021', '1', 'à¤¨à¥‡à¤ªà¤¾à¤²à¥€', 'School Management System'),
(13, 'Class 1st', 'video', 'Grade 10 : Social Studies', 'Nothing', 'https://youtu.be/9mXvu8o1m_M', 'uploads/19102021123456WhatsAppImage2021-10-12at06.27.44.jpeg', '1', 'Himanshu', 'Birgunj', '2021', '1', 'English', 'School Management System'),
(14, 'Class 1st', 'ebook', 'Web Design', 'sdf', 'uploads/21102021111830Document(1)(1).pdf', 'uploads/21102021111831bachelorcopy.JPG', 'sdf', 'sdf', 'sdsdf', '1555', '55', 'English', 'School Management System');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `sno` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`sno`, `category`, `company`) VALUES
(4, 'Class 1st', 'School Management System'),
(5, 'Class 2nd', 'School Management System'),
(6, 'Class 3rd', 'School Management System'),
(7, 'Class 10th', 'School Management System'),
(8, 'Class 5th', 'School Management System'),
(9, 'Class 12th', 'School Management System'),
(10, 'other', 'School Management System');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `sno` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `price` text NOT NULL,
  `video` text NOT NULL,
  `company` varchar(100) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`sno`, `category`, `iname`, `price`, `video`, `company`, `photo`) VALUES
(2, 'Class 1st', 'Class 1st Biology', 'Rolls-Royce Motor Cars Limited is a British luxury automobile maker. A wholly owned subsidiary of German group BMW, it was established in 1998 after BMW was licensed the rights to the Rolls-Royce brand name and logo from Rolls-Royce plc and acquired the rights to the Spirit of Ecstasy and Rolls-Royce grill shape trademarks from Volkswagen AG. Rolls-Royce Motor Cars Limited operates from purpose-built administrative and production facilities opened in 2003 across from the historic Goodwood Circuit in Goodwood, West Sussex, England, United Kingdom. Rolls-Royce Motors Cars Limited is the exclusive manufacturer of Rolls-Royce branded motor cars since 2003.', 'https://youtu.be/BVvnSzMqI3M', 'School Management System', 'uploads/04102021121551Screenshot-2018-5-25_Pustakalaya_homepage.png'),
(3, 'Class 1st', 'Demo Title', '2022 Hyundai Tucson - PRODUCTION in USA. the new Hyundai Plant production and assembly car Factory. Hyundai Motor Manufacturing Alabama Celebrates Launch of All-New 2022 Tucson. #Hyundai #Tucson #Production', 'https://youtu.be/Qsnv9-BYeYI', 'School Management System', 'uploads/04102021121629Grade10Social_rsGu5Tu.png'),
(4, 'Class 2nd', 'Demoo', 'This Video is about the Modification of Endeavour. Just see how much people are spending on their favourite cars even when ford already left India.', 'https://youtu.be/vqQvYuxML8I', 'School Management System', 'uploads/04102021121713Grade10Social_rsGu5Tu.png'),
(5, 'Class 1st', 'Demoo', 'This Video is about the Modification of Endeavour. Just see how much people are spending on their favourite cars even when ford already left India.', 'https://youtu.be/HIOi9-OdM9c', 'School Management System', 'uploads/04102021112851Grade10Social_rsGu5Tu.png'),
(6, 'Class 1st', 'Optional Mathematics', 'Secondary', 'https://youtu.be/beyGCfKEEvc', 'School Management System', 'uploads/04102021113222Screenshot-2018-5-25_Pustakalaya_homepage.png');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sno` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `dat` date NOT NULL,
  `iname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quan` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `total` double NOT NULL,
  `pby` varchar(10) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `per` int(11) NOT NULL DEFAULT 0,
  `user` varchar(15) NOT NULL,
  `last` varchar(25) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sno`, `billno`, `dat`, `iname`, `quan`, `price`, `amount`, `total`, `pby`, `remarks`, `gname`, `per`, `user`, `last`, `company`) VALUES
(1, 1, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 6, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:41:11 PM', 'Lord Shiva Temple'),
(2, 1, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 6, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:41:11 PM', 'Lord Shiva Temple'),
(3, 2, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 21, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:56:08 PM', 'Lord Shiva Temple'),
(4, 2, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 21, 'Cash', '.', 'Ganesha Iyer', 5, '', '27-09-2021 03:56:08 PM', 'Lord Shiva Temple'),
(5, 2, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 21, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:56:08 PM', 'Lord Shiva Temple'),
(6, 2, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 21, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:56:08 PM', 'Lord Shiva Temple'),
(7, 3, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 17, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:57:09 PM', 'Lord Shiva Temple'),
(8, 3, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 17, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:57:09 PM', 'Lord Shiva Temple'),
(9, 4, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 2, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 03:57:21 PM', 'Lord Shiva Temple'),
(10, 5, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 172, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:09 PM', 'Lord Shiva Temple'),
(11, 5, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 172, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:09 PM', 'Lord Shiva Temple'),
(12, 6, '2021-09-27', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:27 PM', 'Lord Shiva Temple'),
(13, 6, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:27 PM', 'Lord Shiva Temple'),
(14, 6, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:27 PM', 'Lord Shiva Temple'),
(15, 6, '2021-09-27', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:27 PM', 'Lord Shiva Temple'),
(16, 6, '2021-09-27', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:27 PM', 'Lord Shiva Temple'),
(17, 6, '2021-09-27', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:27 PM', 'Lord Shiva Temple'),
(18, 7, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:36 PM', 'Lord Shiva Temple'),
(19, 7, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:36 PM', 'Lord Shiva Temple'),
(20, 7, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:36 PM', 'Lord Shiva Temple'),
(21, 7, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:36 PM', 'Lord Shiva Temple'),
(22, 7, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:36 PM', 'Lord Shiva Temple'),
(23, 8, '2021-09-27', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 321, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:46 PM', 'Lord Shiva Temple'),
(24, 8, '2021-09-27', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 321, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:46 PM', 'Lord Shiva Temple'),
(25, 8, '2021-09-27', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 321, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:46 PM', 'Lord Shiva Temple'),
(26, 8, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 321, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:46 PM', 'Lord Shiva Temple'),
(27, 8, '2021-09-27', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 321, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:01:46 PM', 'Lord Shiva Temple'),
(28, 9, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:02:31 PM', 'Lord Shiva Temple'),
(29, 9, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:02:31 PM', 'Lord Shiva Temple'),
(30, 9, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:02:31 PM', 'Lord Shiva Temple'),
(31, 9, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:02:31 PM', 'Lord Shiva Temple'),
(32, 9, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:02:31 PM', 'Lord Shiva Temple'),
(33, 10, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:03:16 PM', 'Lord Shiva Temple'),
(34, 10, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:03:16 PM', 'Lord Shiva Temple'),
(35, 10, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:03:16 PM', 'Lord Shiva Temple'),
(36, 10, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:03:16 PM', 'Lord Shiva Temple'),
(37, 11, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 6, 4, 24, 24, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:03:54 PM', 'Lord Shiva Temple'),
(38, 12, '2021-09-27', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:08 PM', 'Lord Shiva Temple'),
(39, 12, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:08 PM', 'Lord Shiva Temple'),
(40, 12, '2021-09-27', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:08 PM', 'Lord Shiva Temple'),
(41, 12, '2021-09-27', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:08 PM', 'Lord Shiva Temple'),
(42, 12, '2021-09-27', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:08 PM', 'Lord Shiva Temple'),
(43, 12, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:08 PM', 'Lord Shiva Temple'),
(44, 13, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 646, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:25 PM', 'Lord Shiva Temple'),
(45, 13, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 646, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:25 PM', 'Lord Shiva Temple'),
(46, 13, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 646, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:25 PM', 'Lord Shiva Temple'),
(47, 13, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 646, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:25 PM', 'Lord Shiva Temple'),
(48, 13, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 4, 151, 604, 646, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:04:25 PM', 'Lord Shiva Temple'),
(49, 14, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:10 PM', 'Lord Shiva Temple'),
(50, 14, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:10 PM', 'Lord Shiva Temple'),
(51, 14, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:10 PM', 'Lord Shiva Temple'),
(52, 14, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:10 PM', 'Lord Shiva Temple'),
(53, 14, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:10 PM', 'Lord Shiva Temple'),
(54, 15, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:45 PM', 'Lord Shiva Temple'),
(55, 15, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:45 PM', 'Lord Shiva Temple'),
(56, 15, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:45 PM', 'Lord Shiva Temple'),
(57, 15, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:45 PM', 'Lord Shiva Temple'),
(58, 15, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:07:45 PM', 'Lord Shiva Temple'),
(59, 16, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:09:50 PM', 'Lord Shiva Temple'),
(60, 16, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:09:50 PM', 'Lord Shiva Temple'),
(61, 16, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:09:50 PM', 'Lord Shiva Temple'),
(62, 17, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 40, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:12:33 PM', 'Lord Shiva Temple'),
(63, 17, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 40, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:12:33 PM', 'Lord Shiva Temple'),
(64, 17, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 40, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:12:33 PM', 'Lord Shiva Temple'),
(65, 17, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 40, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:12:33 PM', 'Lord Shiva Temple'),
(66, 18, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(67, 18, '2021-09-27', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(68, 18, '2021-09-27', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(69, 18, '2021-09-27', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(70, 18, '2021-09-27', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(71, 18, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(72, 18, '2021-09-27', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(73, 18, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 228, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:37 PM', 'Lord Shiva Temple'),
(74, 19, '2021-09-27', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:46 PM', 'Lord Shiva Temple'),
(75, 19, '2021-09-27', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:46 PM', 'Lord Shiva Temple'),
(76, 19, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:46 PM', 'Lord Shiva Temple'),
(77, 19, '2021-09-27', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:46 PM', 'Lord Shiva Temple'),
(78, 19, '2021-09-27', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:46 PM', 'Lord Shiva Temple'),
(79, 19, '2021-09-27', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:46 PM', 'Lord Shiva Temple'),
(80, 20, '2021-09-27', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 4, 'Cash', '', 'Ganesha Iyer', 5, '', '27-09-2021 04:15:55 PM', 'Lord Shiva Temple'),
(81, 21, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:04:56 AM', 'Lord Shiva Temple'),
(82, 21, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:04:56 AM', 'Lord Shiva Temple'),
(83, 21, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:04:56 AM', 'Lord Shiva Temple'),
(84, 22, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:41 AM', 'Lord Shiva Temple'),
(85, 22, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:41 AM', 'Lord Shiva Temple'),
(86, 22, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:41 AM', 'Lord Shiva Temple'),
(87, 22, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:41 AM', 'Lord Shiva Temple'),
(88, 22, '2021-09-28', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:41 AM', 'Lord Shiva Temple'),
(89, 23, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 21, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:58 AM', 'Lord Shiva Temple'),
(90, 23, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 21, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:58 AM', 'Lord Shiva Temple'),
(91, 23, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 21, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:18:58 AM', 'Lord Shiva Temple'),
(92, 24, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:27:51 AM', 'Lord Shiva Temple'),
(93, 24, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:27:51 AM', 'Lord Shiva Temple'),
(94, 24, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:27:51 AM', 'Lord Shiva Temple'),
(95, 24, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:27:51 AM', 'Lord Shiva Temple'),
(96, 24, '2021-09-28', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 10:27:51 AM', 'Lord Shiva Temple'),
(97, 25, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 11:12:59 AM', ''),
(98, 25, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 11:12:59 AM', ''),
(99, 25, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 11:12:59 AM', ''),
(100, 25, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 11:12:59 AM', ''),
(101, 25, '2021-09-28', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 11:12:59 AM', ''),
(102, 26, '2021-09-28', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 152, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 03:53:43 PM', 'Lord Shiva Temple'),
(103, 26, '2021-09-28', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 152, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 03:53:43 PM', 'Lord Shiva Temple'),
(104, 27, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 2, 4, 8, 33, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:36:19 PM', 'Lord Shiva Temple'),
(105, 27, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 2, 2, 4, 33, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:36:19 PM', 'Lord Shiva Temple'),
(106, 27, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 33, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:36:19 PM', 'Lord Shiva Temple'),
(107, 28, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 29, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:36:53 PM', 'Lord Shiva Temple'),
(108, 28, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 29, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:36:53 PM', 'Lord Shiva Temple'),
(109, 28, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 29, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:36:53 PM', 'Lord Shiva Temple'),
(110, 28, '2021-09-28', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 29, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:36:53 PM', 'Lord Shiva Temple'),
(111, 29, '2021-09-28', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 171, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:44:21 PM', 'Lord Shiva Temple'),
(112, 29, '2021-09-28', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 171, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:44:21 PM', 'Lord Shiva Temple'),
(113, 29, '2021-09-28', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 171, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:44:21 PM', 'Lord Shiva Temple'),
(114, 29, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 171, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:44:21 PM', 'Lord Shiva Temple'),
(115, 29, '2021-09-28', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 171, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:44:21 PM', 'Lord Shiva Temple'),
(116, 30, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 176, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:12 PM', 'Lord Shiva Temple'),
(117, 30, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 176, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:12 PM', 'Lord Shiva Temple'),
(118, 30, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 176, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:12 PM', 'Lord Shiva Temple'),
(119, 31, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:26 PM', 'Lord Shiva Temple'),
(120, 31, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:26 PM', 'Lord Shiva Temple'),
(121, 31, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:26 PM', 'Lord Shiva Temple'),
(122, 31, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:26 PM', 'Lord Shiva Temple'),
(123, 32, '2021-09-28', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 152, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:38 PM', 'Lord Shiva Temple'),
(124, 32, '2021-09-28', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 152, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:38 PM', 'Lord Shiva Temple'),
(125, 32, '2021-09-28', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 152, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:45:38 PM', 'Lord Shiva Temple'),
(126, 33, '2021-09-28', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:50:25 PM', 'Lord Shiva Temple'),
(127, 33, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:50:25 PM', 'Lord Shiva Temple'),
(128, 33, '2021-09-28', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 06:50:25 PM', 'Lord Shiva Temple'),
(129, 34, '2021-09-28', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 51, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 07:26:12 PM', 'Lord Shiva Temple'),
(130, 34, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 51, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 07:26:12 PM', 'Lord Shiva Temple'),
(131, 34, '2021-09-28', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 51, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 07:26:12 PM', 'Lord Shiva Temple'),
(132, 34, '2021-09-28', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 51, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 07:26:12 PM', 'Lord Shiva Temple'),
(133, 35, '2021-09-28', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 154, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 07:26:22 PM', 'Lord Shiva Temple'),
(134, 35, '2021-09-28', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 154, 'Cash', '', 'Ganesha Iyer', 5, '', '28-09-2021 07:26:22 PM', 'Lord Shiva Temple'),
(135, 36, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 166, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:51:35 AM', 'Lord Shiva Temple'),
(136, 36, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 166, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:51:35 AM', 'Lord Shiva Temple'),
(137, 36, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 166, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:51:35 AM', 'Lord Shiva Temple'),
(138, 37, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 6, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:51:52 AM', 'Lord Shiva Temple'),
(139, 37, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 6, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:51:52 AM', 'Lord Shiva Temple'),
(140, 38, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 36, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:04 AM', 'Lord Shiva Temple'),
(141, 38, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 36, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:04 AM', 'Lord Shiva Temple'),
(142, 39, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 78, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:37 AM', 'Lord Shiva Temple'),
(143, 39, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 78, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:37 AM', 'Lord Shiva Temple'),
(144, 39, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 78, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:37 AM', 'Lord Shiva Temple'),
(145, 39, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 78, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:37 AM', 'Lord Shiva Temple'),
(146, 39, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 78, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:37 AM', 'Lord Shiva Temple'),
(147, 39, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 78, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:52:37 AM', 'Lord Shiva Temple'),
(148, 40, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 6, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:56:37 AM', 'Lord Shiva Temple'),
(149, 40, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 6, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:56:37 AM', 'Lord Shiva Temple'),
(150, 41, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:56:52 AM', 'Lord Shiva Temple'),
(151, 41, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:56:52 AM', 'Lord Shiva Temple'),
(152, 41, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:56:52 AM', 'Lord Shiva Temple'),
(153, 41, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:56:52 AM', 'Lord Shiva Temple'),
(154, 42, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:57:38 AM', 'Lord Shiva Temple'),
(155, 42, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:57:38 AM', 'Lord Shiva Temple'),
(156, 42, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:57:38 AM', 'Lord Shiva Temple'),
(157, 42, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:57:38 AM', 'Lord Shiva Temple'),
(158, 43, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 36, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:57:52 AM', 'Lord Shiva Temple'),
(159, 43, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 36, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:57:52 AM', 'Lord Shiva Temple'),
(160, 44, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(161, 44, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(162, 44, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(163, 44, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(164, 44, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(165, 44, '2021-09-29', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(166, 44, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(167, 44, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(168, 44, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 348, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 10:59:29 AM', 'Lord Shiva Temple'),
(169, 45, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(170, 45, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(171, 45, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(172, 45, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(173, 45, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(174, 45, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(175, 45, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(176, 45, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:01:09 AM', 'Lord Shiva Temple'),
(177, 46, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 36, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:24 AM', 'Lord Shiva Temple'),
(178, 46, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 36, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:24 AM', 'Lord Shiva Temple'),
(179, 46, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 36, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:24 AM', 'Lord Shiva Temple'),
(180, 47, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(181, 47, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(182, 47, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(183, 47, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(184, 47, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(185, 47, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(186, 47, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(187, 47, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(188, 47, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 234, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:02:57 AM', 'Lord Shiva Temple'),
(189, 48, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 200, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:04:28 AM', 'Lord Shiva Temple'),
(190, 48, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 200, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:04:28 AM', 'Lord Shiva Temple'),
(191, 48, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 200, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:04:28 AM', 'Lord Shiva Temple'),
(192, 48, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 200, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:04:28 AM', 'Lord Shiva Temple'),
(193, 48, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 200, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:04:28 AM', 'Lord Shiva Temple'),
(194, 48, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 200, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:04:28 AM', 'Lord Shiva Temple'),
(195, 49, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 189, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:05:48 AM', 'Lord Shiva Temple'),
(196, 49, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 189, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:05:48 AM', 'Lord Shiva Temple'),
(197, 49, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 189, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:05:48 AM', 'Lord Shiva Temple'),
(198, 49, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 189, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:05:48 AM', 'Lord Shiva Temple'),
(199, 50, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(200, 50, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(201, 50, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(202, 50, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(203, 50, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(204, 50, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(205, 50, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(206, 50, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 230, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:23 AM', 'Lord Shiva Temple'),
(207, 51, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:46 AM', 'Lord Shiva Temple'),
(208, 51, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:46 AM', 'Lord Shiva Temple'),
(209, 51, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:46 AM', 'Lord Shiva Temple'),
(210, 51, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:46 AM', 'Lord Shiva Temple'),
(211, 51, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:46 AM', 'Lord Shiva Temple'),
(212, 52, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 192, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:55 AM', 'Lord Shiva Temple'),
(213, 52, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 192, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:55 AM', 'Lord Shiva Temple'),
(214, 52, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 192, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:55 AM', 'Lord Shiva Temple'),
(215, 52, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 192, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:55 AM', 'Lord Shiva Temple'),
(216, 52, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 192, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:06:55 AM', 'Lord Shiva Temple'),
(217, 53, '2021-09-29', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 152, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:07:04 AM', 'Lord Shiva Temple'),
(218, 53, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 152, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:07:04 AM', 'Lord Shiva Temple'),
(219, 54, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:07:19 AM', 'Lord Shiva Temple'),
(220, 54, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:07:19 AM', 'Lord Shiva Temple'),
(221, 54, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:07:19 AM', 'Lord Shiva Temple'),
(222, 54, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:07:19 AM', 'Lord Shiva Temple'),
(223, 54, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:07:19 AM', 'Lord Shiva Temple'),
(224, 55, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 38, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:08:00 AM', 'Lord Shiva Temple'),
(225, 55, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 38, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:08:00 AM', 'Lord Shiva Temple'),
(226, 55, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 38, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:08:00 AM', 'Lord Shiva Temple'),
(227, 56, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:39:20 AM', 'Lord Shiva Temple'),
(228, 56, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:39:20 AM', 'Lord Shiva Temple'),
(229, 56, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:39:20 AM', 'Lord Shiva Temple'),
(230, 56, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:39:20 AM', 'Lord Shiva Temple'),
(231, 57, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 187, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:39:31 AM', 'Lord Shiva Temple'),
(232, 57, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 187, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:39:31 AM', 'Lord Shiva Temple'),
(233, 57, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 187, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 11:39:31 AM', 'Lord Shiva Temple'),
(234, 58, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 57, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:12:55 PM', 'Lord Shiva Temple'),
(235, 58, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 57, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:12:55 PM', 'Lord Shiva Temple'),
(236, 58, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 57, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:12:55 PM', 'Lord Shiva Temple'),
(237, 58, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 57, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:12:55 PM', 'Lord Shiva Temple'),
(238, 58, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 57, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:12:55 PM', 'Lord Shiva Temple'),
(239, 58, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 57, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:12:55 PM', 'Lord Shiva Temple'),
(240, 59, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:14:23 PM', 'Lord Shiva Temple'),
(241, 59, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:14:23 PM', 'Lord Shiva Temple'),
(242, 59, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:14:23 PM', 'Lord Shiva Temple'),
(243, 59, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:14:23 PM', 'Lord Shiva Temple'),
(244, 59, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:14:23 PM', 'Lord Shiva Temple'),
(245, 59, '2021-09-29', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 342, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:14:23 PM', 'Lord Shiva Temple'),
(246, 60, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 15, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:14:31 PM', 'Lord Shiva Temple'),
(247, 61, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:23:05 PM', 'Lord Shiva Temple'),
(248, 61, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:23:05 PM', 'Lord Shiva Temple'),
(249, 61, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:23:05 PM', 'Lord Shiva Temple'),
(250, 61, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:23:05 PM', 'Lord Shiva Temple'),
(251, 62, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:23:37 PM', 'Lord Shiva Temple'),
(252, 62, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:23:37 PM', 'Lord Shiva Temple'),
(253, 62, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:23:37 PM', 'Lord Shiva Temple'),
(254, 63, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(255, 63, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(256, 63, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(257, 63, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(258, 63, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 0, 0, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(259, 63, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(260, 63, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(261, 63, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 229, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:32:13 PM', 'Lord Shiva Temple'),
(262, 64, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 2, 15, 30, 249, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:34:42 PM', 'Lord Shiva Temple'),
(263, 64, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 2, 21, 42, 249, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:34:42 PM', 'Lord Shiva Temple'),
(264, 64, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 3, 2, 6, 249, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:34:42 PM', 'Lord Shiva Temple'),
(265, 64, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 249, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:34:42 PM', 'Lord Shiva Temple'),
(266, 64, '2021-09-29', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 249, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:34:42 PM', 'Lord Shiva Temple'),
(267, 64, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 249, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:34:42 PM', 'Lord Shiva Temple'),
(268, 64, '2021-09-29', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 249, 'Cash', '', 'Ganesha Iyer', 5, '', '29-09-2021 12:34:42 PM', 'Lord Shiva Temple'),
(269, 65, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 10, 10, 31, 'Cash', '', 'Venkatesh Iyer', 1, '', '29-09-2021 02:11:00 PM', 'Lord Shiva Temple'),
(270, 65, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 31, 'Cash', '', 'Venkatesh Iyer', 1, '', '29-09-2021 02:11:00 PM', 'Lord Shiva Temple'),
(271, 66, '2021-09-29', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 5, 5, 5, 'Cash', '', 'Venkatesh Iyer', 1, 'admin', '29-09-2021 02:15:01 PM', 'Lord Shiva Temple'),
(272, 67, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 4, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '29-09-2021 02:20:58 PM', 'Lord Shiva Temple'),
(273, 68, '2021-09-29', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 3, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '29-09-2021 02:25:16 PM', 'Lord Shiva Temple'),
(274, 69, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 2, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '29-09-2021 04:17:52 PM', 'Lord Shiva Temple'),
(275, 70, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '29-09-2021 04:18:19 PM', 'Lord Shiva Temple'),
(276, 70, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '29-09-2021 04:18:19 PM', 'Lord Shiva Temple'),
(277, 70, '2021-09-29', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '29-09-2021 04:18:19 PM', 'Lord Shiva Temple'),
(278, 70, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '29-09-2021 04:18:19 PM', 'Lord Shiva Temple'),
(279, 71, '2021-09-29', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', 'Venkatesh Iyer', 5, 'admin', '29-09-2021 04:20:38 PM', 'Lord Shiva Temple'),
(280, 71, '2021-09-29', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', 'Venkatesh Iyer', 5, 'admin', '29-09-2021 04:20:38 PM', 'Lord Shiva Temple'),
(281, 71, '2021-09-29', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', 'Venkatesh Iyer', 5, 'admin', '29-09-2021 04:20:38 PM', 'Lord Shiva Temple'),
(282, 72, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 46, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 07:50:18 AM', 'Lord Shiva Temple'),
(283, 72, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 46, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 07:50:18 AM', 'Lord Shiva Temple'),
(284, 72, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 46, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 07:50:18 AM', 'Lord Shiva Temple');
INSERT INTO `sales` (`sno`, `billno`, `dat`, `iname`, `quan`, `price`, `amount`, `total`, `pby`, `remarks`, `gname`, `per`, `user`, `last`, `company`) VALUES
(285, 72, '2021-09-30', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 46, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 07:50:18 AM', 'Lord Shiva Temple'),
(286, 73, '2021-09-30', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 342, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 08:05:11 AM', 'Lord Shiva Temple'),
(287, 73, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 342, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 08:05:11 AM', 'Lord Shiva Temple'),
(288, 73, '2021-09-30', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 342, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 08:05:11 AM', 'Lord Shiva Temple'),
(289, 73, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 342, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 08:05:11 AM', 'Lord Shiva Temple'),
(290, 73, '2021-09-30', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 342, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 08:05:11 AM', 'Lord Shiva Temple'),
(291, 73, '2021-09-30', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 342, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 08:05:11 AM', 'Lord Shiva Temple'),
(292, 74, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 187, 'Cash', '', '', 0, 'admin', '30-09-2021 08:28:17 AM', 'Lord Shiva Temple'),
(293, 74, '2021-09-30', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 187, 'Cash', '', '', 0, 'admin', '30-09-2021 08:28:17 AM', 'Lord Shiva Temple'),
(294, 74, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 187, 'Cash', '', '', 0, 'admin', '30-09-2021 08:28:17 AM', 'Lord Shiva Temple'),
(295, 75, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', '', 0, 'admin', '30-09-2021 08:52:22 AM', 'Lord Shiva Temple'),
(296, 75, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', '', 0, 'admin', '30-09-2021 08:52:22 AM', 'Lord Shiva Temple'),
(297, 75, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', '', 0, 'admin', '30-09-2021 08:52:22 AM', 'Lord Shiva Temple'),
(298, 75, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', '', 0, 'admin', '30-09-2021 08:52:22 AM', 'Lord Shiva Temple'),
(299, 76, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:57:46 AM', 'Lord Shiva Temple'),
(300, 76, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:57:46 AM', 'Lord Shiva Temple'),
(301, 76, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:57:46 AM', 'Lord Shiva Temple'),
(302, 76, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:57:46 AM', 'Lord Shiva Temple'),
(303, 76, '2021-09-30', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:57:46 AM', 'Lord Shiva Temple'),
(304, 77, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:58:13 AM', 'Lord Shiva Temple'),
(305, 77, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:58:13 AM', 'Lord Shiva Temple'),
(306, 77, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:58:13 AM', 'Lord Shiva Temple'),
(307, 77, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:58:13 AM', 'Lord Shiva Temple'),
(308, 77, '2021-09-30', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 67, 'Cash', '', '', 0, 'admin', '30-09-2021 08:58:13 AM', 'Lord Shiva Temple'),
(309, 78, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 72, 'Cash', '', '', 0, 'admin', '30-09-2021 09:00:13 AM', 'Lord Shiva Temple'),
(310, 78, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 72, 'Cash', '', '', 0, 'admin', '30-09-2021 09:00:13 AM', 'Lord Shiva Temple'),
(311, 78, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 72, 'Cash', '', '', 0, 'admin', '30-09-2021 09:00:13 AM', 'Lord Shiva Temple'),
(312, 78, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 72, 'Cash', '', '', 0, 'admin', '30-09-2021 09:00:13 AM', 'Lord Shiva Temple'),
(313, 78, '2021-09-30', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 30, 30, 72, 'Cash', '', '', 0, 'admin', '30-09-2021 09:00:13 AM', 'Lord Shiva Temple'),
(314, 79, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 2, 2, 4, 69, 'Cash', '', '', 0, 'admin', '30-09-2021 09:05:46 AM', 'Lord Shiva Temple'),
(315, 79, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 69, 'Cash', '', '', 0, 'admin', '30-09-2021 09:05:46 AM', 'Lord Shiva Temple'),
(316, 79, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 69, 'Cash', '', '', 0, 'admin', '30-09-2021 09:05:46 AM', 'Lord Shiva Temple'),
(317, 79, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 69, 'Cash', '', '', 0, 'admin', '30-09-2021 09:05:46 AM', 'Lord Shiva Temple'),
(318, 79, '2021-09-30', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 69, 'Cash', '', '', 0, 'admin', '30-09-2021 09:05:46 AM', 'Lord Shiva Temple'),
(319, 80, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 09:06:47 AM', 'Lord Shiva Temple'),
(320, 80, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 09:06:47 AM', 'Lord Shiva Temple'),
(321, 80, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 09:06:47 AM', 'Lord Shiva Temple'),
(322, 80, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 09:06:47 AM', 'Lord Shiva Temple'),
(323, 80, '2021-09-30', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '30-09-2021 09:06:47 AM', 'Lord Shiva Temple'),
(324, 81, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:06 AM', 'Lord Shiva Temple'),
(325, 81, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:06 AM', 'Lord Shiva Temple'),
(326, 81, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:06 AM', 'Lord Shiva Temple'),
(327, 82, '2021-09-30', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 62, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:16 AM', 'Lord Shiva Temple'),
(328, 82, '2021-09-30', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 62, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:16 AM', 'Lord Shiva Temple'),
(329, 82, '2021-09-30', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 62, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:16 AM', 'Lord Shiva Temple'),
(330, 82, '2021-09-30', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 62, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:16 AM', 'Lord Shiva Temple'),
(331, 82, '2021-09-30', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 20, 20, 62, 'Cash', '', '', 0, 'admin', '30-09-2021 09:09:16 AM', 'Lord Shiva Temple'),
(332, 83, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:09:31 AM', 'Lord Shiva Temple'),
(333, 83, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:09:31 AM', 'Lord Shiva Temple'),
(334, 83, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:09:31 AM', 'Lord Shiva Temple'),
(335, 83, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:09:31 AM', 'Lord Shiva Temple'),
(336, 83, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:09:31 AM', 'Lord Shiva Temple'),
(337, 84, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 36, 'Cash', '', '', 0, 'admin', '01-10-2021 08:09:43 AM', 'Lord Shiva Temple'),
(338, 84, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 36, 'Cash', '', '', 0, 'admin', '01-10-2021 08:09:43 AM', 'Lord Shiva Temple'),
(339, 85, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 2, 'Cash', '', '', 0, 'admin', '01-10-2021 08:09:50 AM', 'Lord Shiva Temple'),
(340, 86, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:12:02 AM', 'Lord Shiva Temple'),
(341, 86, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:12:02 AM', 'Lord Shiva Temple'),
(342, 86, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:12:02 AM', 'Lord Shiva Temple'),
(343, 86, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:12:02 AM', 'Lord Shiva Temple'),
(344, 86, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 08:12:02 AM', 'Lord Shiva Temple'),
(345, 87, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 10:59:07 AM', 'Lord Shiva Temple'),
(346, 87, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 10:59:07 AM', 'Lord Shiva Temple'),
(347, 87, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 10:59:07 AM', 'Lord Shiva Temple'),
(348, 87, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 10:59:07 AM', 'Lord Shiva Temple'),
(349, 87, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 67, 'Cash', '', 'Ganesha Iyer', 5, 'admin', '01-10-2021 10:59:07 AM', 'Lord Shiva Temple'),
(350, 88, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 27, 'Cash', '', '', 0, 'admin', '01-10-2021 10:59:23 AM', 'Lord Shiva Temple'),
(351, 88, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 27, 'Cash', '', '', 0, 'admin', '01-10-2021 10:59:23 AM', 'Lord Shiva Temple'),
(352, 88, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 27, 'Cash', '', '', 0, 'admin', '01-10-2021 10:59:23 AM', 'Lord Shiva Temple'),
(353, 89, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 46, 'Cash', '', '', 0, 'admin', '01-10-2021 11:06:50 AM', 'Lord Shiva Temple'),
(354, 89, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 46, 'Cash', '', '', 0, 'admin', '01-10-2021 11:06:50 AM', 'Lord Shiva Temple'),
(355, 89, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 46, 'Cash', '', '', 0, 'admin', '01-10-2021 11:06:50 AM', 'Lord Shiva Temple'),
(356, 89, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 46, 'Cash', '', '', 0, 'admin', '01-10-2021 11:06:50 AM', 'Lord Shiva Temple'),
(357, 90, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 67, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:15 AM', 'Lord Shiva Temple'),
(358, 90, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 67, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:15 AM', 'Lord Shiva Temple'),
(359, 90, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 67, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:15 AM', 'Lord Shiva Temple'),
(360, 90, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 67, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:15 AM', 'Lord Shiva Temple'),
(361, 90, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 67, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:15 AM', 'Lord Shiva Temple'),
(362, 91, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:25 AM', 'Lord Shiva Temple'),
(363, 91, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:25 AM', 'Lord Shiva Temple'),
(364, 91, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:25 AM', 'Lord Shiva Temple'),
(365, 91, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:25 AM', 'Lord Shiva Temple'),
(366, 91, '2021-10-01', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:25 AM', 'Lord Shiva Temple'),
(367, 92, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:43 AM', 'Lord Shiva Temple'),
(368, 92, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:43 AM', 'Lord Shiva Temple'),
(369, 92, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:43 AM', 'Lord Shiva Temple'),
(370, 92, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:43 AM', 'Lord Shiva Temple'),
(371, 92, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 150, 150, 192, 'Cash', '', '', 0, 'admin', '01-10-2021 11:34:43 AM', 'Lord Shiva Temple'),
(372, 93, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(373, 93, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(374, 93, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(375, 93, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(376, 93, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(377, 93, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(378, 93, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(379, 93, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(380, 93, '2021-10-01', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(381, 93, '2021-10-01', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 388, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:22 AM', 'Lord Shiva Temple'),
(382, 94, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(383, 94, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(384, 94, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(385, 94, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(386, 94, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 50, 50, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(387, 94, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(388, 94, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(389, 94, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(390, 94, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(391, 94, '2021-10-01', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(392, 94, '2021-10-01', 'à®‰à®ªà®¯à®®à¯ /UBAYAM', 1, 150, 150, 434, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:44 AM', 'Lord Shiva Temple'),
(393, 95, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(394, 95, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(395, 95, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(396, 95, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(397, 95, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(398, 95, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(399, 95, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(400, 95, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(401, 95, '2021-10-01', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 234, 'Cash', '', '', 0, 'admin', '01-10-2021 11:43:59 AM', 'Lord Shiva Temple'),
(402, 96, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(403, 96, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(404, 96, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(405, 96, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(406, 96, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 25, 25, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(407, 96, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(408, 96, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(409, 96, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(410, 96, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(411, 96, '2021-10-01', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 259, 'Cash', '', '', 0, 'admin', '01-10-2021 11:46:18 AM', 'Lord Shiva Temple'),
(412, 97, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:17 AM', 'Lord Shiva Temple'),
(413, 97, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:17 AM', 'Lord Shiva Temple'),
(414, 97, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:17 AM', 'Lord Shiva Temple'),
(415, 97, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:17 AM', 'Lord Shiva Temple'),
(416, 98, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 92, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:38 AM', 'Lord Shiva Temple'),
(417, 98, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 92, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:38 AM', 'Lord Shiva Temple'),
(418, 98, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 92, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:38 AM', 'Lord Shiva Temple'),
(419, 98, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 92, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:38 AM', 'Lord Shiva Temple'),
(420, 98, '2021-10-01', '5 à®µà®•à¯ˆ à®…à®ªà®¿à®·à¯‡à®•à®®à¯ / 5 ABISHEGAM', 1, 50, 50, 92, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:38 AM', 'Lord Shiva Temple'),
(421, 99, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 5, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:51 AM', 'Lord Shiva Temple'),
(422, 99, '2021-10-01', 'à®¨à¯†à®¯à¯ à®µà®¿à®³à®•à¯à®•à¯ /NEI VILAKKU', 1, 2, 2, 5, 'Cash', '', '', 0, 'admin', '01-10-2021 11:49:51 AM', 'Lord Shiva Temple'),
(423, 100, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®Ÿà®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /MOTORBIKE ARCHANAI', 1, 15, 15, 42, 'Cash', '', '', 0, 'admin', '01-10-2021 11:50:09 AM', 'Lord Shiva Temple'),
(424, 100, '2021-10-01', 'à®•à®¾à®°à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /CAR ARCHANAI', 1, 21, 21, 42, 'Cash', '', '', 0, 'admin', '01-10-2021 11:50:09 AM', 'Lord Shiva Temple'),
(425, 100, '2021-10-01', 'à®ªà®´ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /PALA ARCHANAI', 1, 2, 2, 42, 'Cash', '', '', 0, 'admin', '01-10-2021 11:50:09 AM', 'Lord Shiva Temple'),
(426, 100, '2021-10-01', 'à®¤à¯‡à®™à¯à®•à®¾à®¯à¯ à®…à®°à¯à®šà¯à®šà®©à¯ˆ /COCONUT ARCHANAI', 1, 4, 4, 42, 'Cash', '', '', 0, 'admin', '01-10-2021 11:50:09 AM', 'Lord Shiva Temple'),
(427, 101, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:59:09 AM', 'Lord Shiva Temple'),
(428, 101, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:59:09 AM', 'Lord Shiva Temple'),
(429, 101, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:59:09 AM', 'Lord Shiva Temple'),
(430, 101, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 11:59:09 AM', 'Lord Shiva Temple'),
(431, 102, '2021-10-01', 'à®Žà®³à¯à®³à¯ à®µà®¿à®³à®•à¯à®•à¯ /YEL VILAKKU', 1, 3, 3, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 12:01:04 PM', 'Lord Shiva Temple'),
(432, 102, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®¤à¯€à®ªà®®à¯ /MOTCHA THEEBAM', 1, 151, 151, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 12:01:04 PM', 'Lord Shiva Temple'),
(433, 102, '2021-10-01', 'à®¤à®°à¯à®ªà®£à®®à¯ /THARPANAM', 1, 15, 15, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 12:01:04 PM', 'Lord Shiva Temple'),
(434, 102, '2021-10-01', 'à®®à¯‹à®Ÿà¯à®š à®µà®¿à®³à®•à¯à®•à¯ /MOTCHA ARCHANAI', 1, 21, 21, 190, 'Cash', '', '', 0, 'admin', '01-10-2021 12:01:04 PM', 'Lord Shiva Temple');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `sno` int(11) NOT NULL,
  `company` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `add1` text NOT NULL,
  `add2` text NOT NULL,
  `add3` text NOT NULL,
  `add4` text NOT NULL,
  `add5` text NOT NULL,
  `bill_format` varchar(100) NOT NULL,
  `copies` int(11) NOT NULL DEFAULT 0,
  `bill_head` varchar(50) NOT NULL,
  `curency` varchar(10) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `web_logo` text NOT NULL,
  `app_logo` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`sno`, `company`, `cname`, `add1`, `add2`, `add3`, `add4`, `add5`, `bill_format`, `copies`, `bill_head`, `curency`, `msg`, `web_logo`, `app_logo`, `img`) VALUES
(0, 'Lord Shiva Temple', '.', '', '', '', '', '', 'Bill Format 2', 0, 'RECEIPT', 'RM', 'OHM NAMASIVAYA!', 'uploads/27092021212244shiva.jpg', 'uploads/27092021212403codeigniter.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `sno` int(11) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `ino` varchar(10) NOT NULL,
  `quan` int(11) NOT NULL DEFAULT 0,
  `remarks` varchar(100) NOT NULL DEFAULT '0',
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_entry`
--

CREATE TABLE `stock_entry` (
  `sno` int(11) NOT NULL,
  `dat` date NOT NULL,
  `iname` varchar(100) NOT NULL,
  `ino` varchar(10) NOT NULL,
  `quan` int(11) NOT NULL DEFAULT 0,
  `remarks` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sno` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `midle` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `photo` varchar(250) DEFAULT '0',
  `age` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sno`, `firstname`, `midle`, `lastname`, `class`, `photo`, `age`, `username`, `password`, `company`) VALUES
(1, 'lalit', 'adellu', 'sharlawar', 'Class 1st', 'uploads/03102021115132pp.jpg', '15', 'sharlawar77@gmail.com', '123', 'School Management System'),
(2, 'Manju', '-', 'Gowda', 'Class 3rd', 'uploads/03102021125007mgwhat.jpeg', '14', 'manju@gmaail.com', '1234', 'School Management System'),
(3, 'lalit', 'Bharat', 'sharllwar', 'Class 1st', 'uploads/10102021053818back1.jpg', '12', 'ss@gmail.com', '123', '-'),
(4, 'lalit', 'Bharat', 'sharllwar', 'Class 1st', 'uploads/10102021054023back1.jpg', '12', 'ss@gmail.com', '123', '-'),
(7, 'Himanshu', '-', 'Barnawal', 'Class 1st', 'uploads/21102021055126EEpscZiXoAYljZV.jpg', '26', 'adsbeemedia@gmail.com', '123', '-'),
(8, 'Manju', '-', 'Gowda', 'Class 3rd', NULL, '26', 'manju@gmaail.com', '1234', '-'),
(10, 'Amit', '-', 'Kumar', '', 'uploads/27102021063824201023360_2178186998988220_8484064156823426417_n.jpg', '24', 'amit.adsbeemedia@gmail.com', 'amit', '-'),
(11, 'Himanshu', 'Kumar', 'Barnawal', 'Class 3rd', 'uploads/2710202112152340017350_1156733524482614_6192920735741116416_n.jpg', '0', 'myeditsnepal@gmail.com', '123', 'School Management System');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `utype` varchar(15) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cid` varchar(11) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `utype`, `user`, `pass`, `cid`, `company`) VALUES
(1, 'Administrator', 'admin', 'admin', '500641', 'School Management System'),
(2, 'Administrator', 'Manjunath', '123', '500641', 'School Management System');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `sno` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `dat` date NOT NULL,
  `part` varchar(100) NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `pby` varchar(10) NOT NULL,
  `entry` varchar(10) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `last` varchar(25) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`sno`, `billno`, `dat`, `part`, `amount`, `pby`, `entry`, `remarks`, `user`, `last`, `company`) VALUES
(1, 0, '2021-09-27', 'Donation', 5000, 'Cash', 'Credit', '.', 'admin', '27-09-2021 09:29:21 PM', 'Lord Shiva Temple'),
(2, 2, '2021-09-27', 'EB Bill', 200, 'Cash', 'Debit', '.', 'admin', '27-09-2021 09:30:12 PM', 'Lord Shiva Temple'),
(3, 3, '0000-00-00', 'Maintenance', 150, 'Cash', 'Debit', '.', 'admin', '27-09-2021 09:30:29 PM', 'Lord Shiva Temple'),
(4, 4, '2021-09-27', 'Festival Income', 3000, 'Cash', 'Credit', '.', 'admin', '27-09-2021 09:30:48 PM', 'Lord Shiva Temple');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_daybook`
--

CREATE TABLE `voucher_daybook` (
  `sno` int(11) NOT NULL,
  `billno` int(11) NOT NULL,
  `dat` date NOT NULL,
  `part` varchar(100) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `page` varchar(15) NOT NULL,
  `company` varchar(100) NOT NULL,
  `pby` varchar(10) NOT NULL DEFAULT 'Cash'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_daybook`
--

INSERT INTO `voucher_daybook` (`sno`, `billno`, `dat`, `part`, `debit`, `credit`, `page`, `company`, `pby`) VALUES
(1, 1, '2021-09-27', 'Sales', 0, 6, 'sales', 'Lord Shiva Temple', 'Cash'),
(2, 2, '2021-09-27', 'Sales', 0, 21, 'sales', 'Lord Shiva Temple', 'Cash'),
(3, 3, '2021-09-27', 'Sales', 0, 17, 'sales', 'Lord Shiva Temple', 'Cash'),
(4, 4, '2021-09-27', 'Sales', 0, 2, 'sales', 'Lord Shiva Temple', 'Cash'),
(5, 0, '2021-09-27', 'Donation', 0, 5000, 'voucher', 'Lord Shiva Temple', 'Cash'),
(6, 2, '2021-09-27', 'EB Bill', 200, 0, 'voucher', 'Lord Shiva Temple', 'Cash'),
(7, 3, '2021-09-27', 'Maintenance', 150, 0, 'voucher', 'Lord Shiva Temple', 'Cash'),
(8, 4, '2021-09-27', 'Festival Income', 0, 3000, 'voucher', 'Lord Shiva Temple', 'Cash'),
(9, 5, '2021-09-27', 'Sales', 0, 172, 'sales', 'Lord Shiva Temple', 'Cash'),
(10, 6, '2021-09-27', 'Sales', 0, 342, 'sales', 'Lord Shiva Temple', 'Cash'),
(11, 7, '2021-09-27', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(12, 8, '2021-09-27', 'Sales', 0, 321, 'sales', 'Lord Shiva Temple', 'Cash'),
(13, 9, '2021-09-27', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(14, 10, '2021-09-27', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(15, 11, '2021-09-27', 'Sales', 0, 24, 'sales', 'Lord Shiva Temple', 'Cash'),
(16, 12, '2021-09-27', 'Sales', 0, 342, 'sales', 'Lord Shiva Temple', 'Cash'),
(17, 13, '2021-09-27', 'Sales', 0, 646, 'sales', 'Lord Shiva Temple', 'Cash'),
(18, 14, '2021-09-27', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(19, 15, '2021-09-27', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(20, 16, '2021-09-27', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(21, 17, '2021-09-27', 'Sales', 0, 40, 'sales', 'Lord Shiva Temple', 'Cash'),
(22, 18, '2021-09-27', 'Sales', 0, 228, 'sales', 'Lord Shiva Temple', 'Cash'),
(23, 19, '2021-09-27', 'Sales', 0, 342, 'sales', 'Lord Shiva Temple', 'Cash'),
(24, 20, '2021-09-27', 'Sales', 0, 4, 'sales', 'Lord Shiva Temple', 'Cash'),
(25, 21, '2021-09-28', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(26, 22, '2021-09-28', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(27, 23, '2021-09-28', 'Sales', 0, 21, 'sales', 'Lord Shiva Temple', 'Cash'),
(28, 24, '2021-09-28', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(29, 25, '2021-09-28', 'Sales', 0, 42, 'sales', '', 'Cash'),
(30, 26, '2021-09-28', 'Sales', 0, 152, 'sales', 'Lord Shiva Temple', 'Cash'),
(31, 27, '2021-09-28', 'Sales', 0, 33, 'sales', 'Lord Shiva Temple', 'Cash'),
(32, 28, '2021-09-28', 'Sales', 0, 29, 'sales', 'Lord Shiva Temple', 'Cash'),
(33, 29, '2021-09-28', 'Sales', 0, 171, 'sales', 'Lord Shiva Temple', 'Cash'),
(34, 30, '2021-09-28', 'Sales', 0, 176, 'sales', 'Lord Shiva Temple', 'Cash'),
(35, 31, '2021-09-28', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(36, 32, '2021-09-28', 'Sales', 0, 152, 'sales', 'Lord Shiva Temple', 'Cash'),
(37, 33, '2021-09-28', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(38, 34, '2021-09-28', 'Sales', 0, 51, 'sales', 'Lord Shiva Temple', 'Cash'),
(39, 35, '2021-09-28', 'Sales', 0, 154, 'sales', 'Lord Shiva Temple', 'Cash'),
(40, 36, '2021-09-29', 'Sales', 0, 166, 'sales', 'Lord Shiva Temple', 'Cash'),
(41, 37, '2021-09-29', 'Sales', 0, 6, 'sales', 'Lord Shiva Temple', 'Cash'),
(42, 38, '2021-09-29', 'Sales', 0, 36, 'sales', 'Lord Shiva Temple', 'Cash'),
(43, 39, '2021-09-29', 'Sales', 0, 78, 'sales', 'Lord Shiva Temple', 'Cash'),
(44, 40, '2021-09-29', 'Sales', 0, 6, 'sales', 'Lord Shiva Temple', 'Cash'),
(45, 41, '2021-09-29', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(46, 42, '2021-09-29', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(47, 43, '2021-09-29', 'Sales', 0, 36, 'sales', 'Lord Shiva Temple', 'Cash'),
(48, 44, '2021-09-29', 'Sales', 0, 348, 'sales', 'Lord Shiva Temple', 'Cash'),
(49, 45, '2021-09-29', 'Sales', 0, 229, 'sales', 'Lord Shiva Temple', 'Cash'),
(50, 46, '2021-09-29', 'Sales', 0, 36, 'sales', 'Lord Shiva Temple', 'Cash'),
(51, 47, '2021-09-29', 'Sales', 0, 234, 'sales', 'Lord Shiva Temple', 'Cash'),
(52, 48, '2021-09-29', 'Sales', 0, 200, 'sales', 'Lord Shiva Temple', 'Cash'),
(53, 49, '2021-09-29', 'Sales', 0, 189, 'sales', 'Lord Shiva Temple', 'Cash'),
(54, 50, '2021-09-29', 'Sales', 0, 230, 'sales', 'Lord Shiva Temple', 'Cash'),
(55, 51, '2021-09-29', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(56, 52, '2021-09-29', 'Sales', 0, 192, 'sales', 'Lord Shiva Temple', 'Cash'),
(57, 53, '2021-09-29', 'Sales', 0, 152, 'sales', 'Lord Shiva Temple', 'Cash'),
(58, 54, '2021-09-29', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(59, 55, '2021-09-29', 'Sales', 0, 38, 'sales', 'Lord Shiva Temple', 'Cash'),
(60, 56, '2021-09-29', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(61, 57, '2021-09-29', 'Sales', 0, 187, 'sales', 'Lord Shiva Temple', 'Cash'),
(62, 58, '2021-09-29', 'Sales', 0, 57, 'sales', 'Lord Shiva Temple', 'Cash'),
(63, 59, '2021-09-29', 'Sales', 0, 342, 'sales', 'Lord Shiva Temple', 'Cash'),
(64, 60, '2021-09-29', 'Sales', 0, 15, 'sales', 'Lord Shiva Temple', 'Cash'),
(65, 61, '2021-09-29', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(66, 62, '2021-09-29', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(67, 63, '2021-09-29', 'Sales', 0, 229, 'sales', 'Lord Shiva Temple', 'Cash'),
(68, 64, '2021-09-29', 'Sales', 0, 249, 'sales', 'Lord Shiva Temple', 'Cash'),
(69, 65, '2021-09-29', 'Sales', 0, 33, 'sales', 'Lord Shiva Temple', 'Cash'),
(70, 65, '2021-09-29', 'Sales', 0, 31, 'sales', 'Lord Shiva Temple', 'Cash'),
(71, 66, '2021-09-29', 'Sales', 0, 10, 'sales', 'Lord Shiva Temple', 'Cash'),
(72, 66, '2021-09-29', 'Sales', 0, 5, 'sales', 'Lord Shiva Temple', 'Cash'),
(73, 67, '2021-09-29', 'Sales', 0, 4, 'sales', 'Lord Shiva Temple', 'Cash'),
(74, 68, '2021-09-29', 'Sales', 0, 3, 'sales', 'Lord Shiva Temple', 'Cash'),
(75, 69, '2021-09-29', 'Sales', 0, 2, 'sales', 'Lord Shiva Temple', 'Cash'),
(76, 70, '2021-09-29', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(77, 71, '2021-09-29', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(78, 72, '2021-09-30', 'Sales', 0, 46, 'sales', 'Lord Shiva Temple', 'Cash'),
(79, 73, '2021-09-30', 'Sales', 0, 342, 'sales', 'Lord Shiva Temple', 'Cash'),
(80, 74, '2021-09-30', 'Sales', 0, 187, 'sales', 'Lord Shiva Temple', 'Cash'),
(81, 75, '2021-09-30', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(82, 76, '2021-09-30', 'Sales', 0, 67, 'sales', 'Lord Shiva Temple', 'Cash'),
(83, 77, '2021-09-30', 'Sales', 0, 67, 'sales', 'Lord Shiva Temple', 'Cash'),
(84, 78, '2021-09-30', 'Sales', 0, 72, 'sales', 'Lord Shiva Temple', 'Cash'),
(85, 79, '2021-09-30', 'Sales', 0, 69, 'sales', 'Lord Shiva Temple', 'Cash'),
(86, 80, '2021-09-30', 'Sales', 0, 67, 'sales', 'Lord Shiva Temple', 'Cash'),
(87, 81, '2021-09-30', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(88, 82, '2021-09-30', 'Sales', 0, 62, 'sales', 'Lord Shiva Temple', 'Cash'),
(89, 83, '2021-10-01', 'Sales', 0, 67, 'sales', 'Lord Shiva Temple', 'Cash'),
(90, 84, '2021-10-01', 'Sales', 0, 36, 'sales', 'Lord Shiva Temple', 'Cash'),
(91, 85, '2021-10-01', 'Sales', 0, 2, 'sales', 'Lord Shiva Temple', 'Cash'),
(92, 86, '2021-10-01', 'Sales', 0, 67, 'sales', 'Lord Shiva Temple', 'Cash'),
(93, 87, '2021-10-01', 'Sales', 0, 67, 'sales', 'Lord Shiva Temple', 'Cash'),
(94, 88, '2021-10-01', 'Sales', 0, 27, 'sales', 'Lord Shiva Temple', 'Cash'),
(95, 89, '2021-10-01', 'Sales', 0, 46, 'sales', 'Lord Shiva Temple', 'Cash'),
(96, 90, '2021-10-01', 'Sales', 0, 67, 'sales', 'Lord Shiva Temple', 'Cash'),
(97, 91, '2021-10-01', 'Sales', 0, 192, 'sales', 'Lord Shiva Temple', 'Cash'),
(98, 92, '2021-10-01', 'Sales', 0, 192, 'sales', 'Lord Shiva Temple', 'Cash'),
(99, 93, '2021-10-01', 'Sales', 0, 388, 'sales', 'Lord Shiva Temple', 'Cash'),
(100, 94, '2021-10-01', 'Sales', 0, 434, 'sales', 'Lord Shiva Temple', 'Cash'),
(101, 95, '2021-10-01', 'Sales', 0, 234, 'sales', 'Lord Shiva Temple', 'Cash'),
(102, 96, '2021-10-01', 'Sales', 0, 259, 'sales', 'Lord Shiva Temple', 'Cash'),
(103, 97, '2021-10-01', 'Sales', 0, 190, 'sales', 'Lord Shiva Temple', 'Cash'),
(104, 98, '2021-10-01', 'Sales', 0, 92, 'sales', 'Lord Shiva Temple', 'Cash'),
(105, 99, '2021-10-01', 'Sales', 0, 5, 'sales', 'Lord Shiva Temple', 'Cash'),
(106, 100, '2021-10-01', 'Sales', 0, 42, 'sales', 'Lord Shiva Temple', 'Cash'),
(107, 101, '2021-10-01', 'Sales', 0, 190, 'sales', 'Lord Shiva Temple', 'Cash'),
(108, 102, '2021-10-01', 'Sales', 0, 190, 'sales', 'Lord Shiva Temple', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_group`
--

CREATE TABLE `voucher_group` (
  `sno` int(11) NOT NULL,
  `part` varchar(100) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_group`
--

INSERT INTO `voucher_group` (`sno`, `part`, `company`) VALUES
(1, 'Donation', 'Lord Shiva Temple'),
(2, 'EB Bill', 'Lord Shiva Temple'),
(3, 'Maintenance', 'Lord Shiva Temple'),
(4, 'Festival Income', 'Lord Shiva Temple');

-- --------------------------------------------------------

--
-- Table structure for table `zapp_setting`
--

CREATE TABLE `zapp_setting` (
  `web_name` varchar(100) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `copyright_details` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zapp_setting`
--

INSERT INTO `zapp_setting` (`web_name`, `app_name`, `copyright_details`, `status`) VALUES
('e Learning', 'e Learning', 'Growsoft Technology', '.');

-- --------------------------------------------------------

--
-- Table structure for table `zcompany`
--

CREATE TABLE `zcompany` (
  `sno` int(11) NOT NULL,
  `dat` date NOT NULL,
  `cid` varchar(15) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL,
  `cperson` varchar(100) NOT NULL,
  `add1` text NOT NULL,
  `add2` text NOT NULL,
  `add3` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_approval` varchar(10) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `monthly` double NOT NULL DEFAULT 0,
  `license_status` varchar(10) NOT NULL,
  `rdate` date NOT NULL,
  `edate` date NOT NULL,
  `ldays` int(11) NOT NULL DEFAULT 0,
  `pby` varchar(25) NOT NULL,
  `txn_no` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL DEFAULT '',
  `user` varchar(50) NOT NULL,
  `last` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zcompany`
--

INSERT INTO `zcompany` (`sno`, `dat`, `cid`, `company`, `cperson`, `add1`, `add2`, `add3`, `city`, `state`, `country`, `mobile`, `phone`, `email`, `account_approval`, `plan`, `amount`, `monthly`, `license_status`, `rdate`, `edate`, `ldays`, `pby`, `txn_no`, `remarks`, `user`, `last`) VALUES
(2, '2021-09-27', '500641', 'School eLearing System', '.', '.', '.', '.', '.', '.', 'Malaysia', '.', '.', 'temple@gmail.com', 'no', 'Basic', 0, 0, 'no', '2021-09-27', '2021-09-27', 0, 'Cash', '.', '.', '.', '.');

-- --------------------------------------------------------

--
-- Table structure for table `zcompany_ids`
--

CREATE TABLE `zcompany_ids` (
  `cid` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zcompany_payments`
--

CREATE TABLE `zcompany_payments` (
  `sno` int(11) NOT NULL,
  `dat` date NOT NULL,
  `company` varchar(100) NOT NULL DEFAULT '0',
  `part` varchar(50) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT 0,
  `pby` varchar(15) NOT NULL DEFAULT '0',
  `txn_no` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zcompany_users`
--

CREATE TABLE `zcompany_users` (
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zcompany_users`
--

INSERT INTO `zcompany_users` (`user`, `pass`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gurukkal_master`
--
ALTER TABLE `gurukkal_master`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`company`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `stock_entry`
--
ALTER TABLE `stock_entry`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `voucher_daybook`
--
ALTER TABLE `voucher_daybook`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `voucher_group`
--
ALTER TABLE `voucher_group`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `zapp_setting`
--
ALTER TABLE `zapp_setting`
  ADD PRIMARY KEY (`web_name`),
  ADD UNIQUE KEY `app_name` (`app_name`);

--
-- Indexes for table `zcompany`
--
ALTER TABLE `zcompany`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `company` (`company`),
  ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `zcompany_ids`
--
ALTER TABLE `zcompany_ids`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `zcompany_payments`
--
ALTER TABLE `zcompany_payments`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `zcompany_users`
--
ALTER TABLE `zcompany_users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gurukkal_master`
--
ALTER TABLE `gurukkal_master`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_entry`
--
ALTER TABLE `stock_entry`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voucher_daybook`
--
ALTER TABLE `voucher_daybook`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `voucher_group`
--
ALTER TABLE `voucher_group`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zcompany`
--
ALTER TABLE `zcompany`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zcompany_payments`
--
ALTER TABLE `zcompany_payments`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
