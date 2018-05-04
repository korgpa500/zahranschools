-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 08:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zahranschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_learn`
--

CREATE TABLE `active_learn` (
  `id` int(11) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `active_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active_title` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `active_learn`
--

INSERT INTO `active_learn` (`id`, `kind_id`, `active_file`, `active_title`) VALUES
(16, 1, 'active_learn/أستمارة طالب.docx', 'المناقشات الحرة'),
(17, 1, 'active_learn/dlil_teacher_2prep_music.pdf', 'منهج'),
(18, 1, 'active_learn/444.JPG', 'youssry6');

-- --------------------------------------------------------

--
-- Table structure for table `active_learn_kind`
--

CREATE TABLE `active_learn_kind` (
  `id` int(11) NOT NULL,
  `kind_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `active_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `active_learn_kind`
--

INSERT INTO `active_learn_kind` (`id`, `kind_name`, `active_type_id`) VALUES
(1, 'Teaching bags', 1),
(2, 'Worksheets', 1),
(3, 'Learning strategies', 1),
(4, 'Experiences and Events', 1),
(5, 'Posts and opinions', 1),
(6, 'Use active learning', 2),
(7, 'Active learning activities', 2),
(8, 'Active Learning Exhibitions', 2),
(9, 'The importance of active learning', 3),
(10, 'Ideas and projects in activating active learning', 3),
(11, 'Suggestions and innovations', 3);

-- --------------------------------------------------------

--
-- Table structure for table `active_learn_type`
--

CREATE TABLE `active_learn_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `active_learn_type`
--

INSERT INTO `active_learn_type` (`id`, `type`) VALUES
(1, 'Teacher'),
(2, 'Student'),
(3, 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

CREATE TABLE `activites` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `activityid` int(2) NOT NULL,
  `sectionid` int(2) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `decription` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activitydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE `activity_type` (
  `activityid` int(2) NOT NULL,
  `activityname` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_type`
--

INSERT INTO `activity_type` (`activityid`, `activityname`) VALUES
(3, 'Art'),
(6, 'Math'),
(1, 'Music'),
(7, 'Scince'),
(5, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `msgname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `msgemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `msgmessage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sectionid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_active`
--

CREATE TABLE `message_active` (
  `id` int(11) NOT NULL,
  `msgname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `msgemail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `msgmessage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `typeid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_active`
--

INSERT INTO `message_active` (`id`, `msgname`, `msgemail`, `msgmessage`, `typeid`) VALUES
(5, 'Youssry', 'yelwrdany@yahoo.com', 'lkjhlkjhoiuhoiuh\r\nlhjgkhjg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `section_type`
--

CREATE TABLE `section_type` (
  `sectionid` int(2) NOT NULL,
  `sectionname` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section_type`
--

INSERT INTO `section_type` (`sectionid`, `sectionname`) VALUES
(1, 'KG'),
(2, 'Jounier'),
(3, 'Middle boys'),
(4, 'Secondary Boys'),
(5, 'Group'),
(6, 'Middle Girls'),
(7, 'Secondary Girls');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeid` int(2) NOT NULL,
  `typename` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeid`, `typename`) VALUES
(1, 'Admin'),
(2, 'Active Learning'),
(3, 'Entery'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `typeid` int(2) NOT NULL COMMENT '1=admin , 2=normal ,3=enter ,4=student',
  `sectionid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `typeid`, `sectionid`) VALUES
(1, 'Youssry', 'Elwrdany', 'yousryelwrdany@gmail.com', '01005697914', '963258741as', 1, 5),
(14, 'Yasmin', 'Kamara', 'kamarayasmin@yahoo.com', '01061034267', 'yasminkg', 3, 1),
(15, 'Sabreen', 'Rashed', 'sabreen2561973@yahoo.com', '01286580466', '2561973', 3, 2),
(17, 'Marwa', 'Alsayid', 'm@yahoo.com', '0123456', '0123456', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_learn`
--
ALTER TABLE `active_learn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kind_id` (`kind_id`);

--
-- Indexes for table `active_learn_kind`
--
ALTER TABLE `active_learn_kind`
  ADD PRIMARY KEY (`id`),
  ADD KEY `active_type_id` (`active_type_id`);

--
-- Indexes for table `active_learn_type`
--
ALTER TABLE `active_learn_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actitvityid` (`activityid`),
  ADD KEY `sectionid2` (`sectionid`),
  ADD KEY `actitvityid_2` (`activityid`),
  ADD KEY `sectionid` (`sectionid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `activity_type`
--
ALTER TABLE `activity_type`
  ADD PRIMARY KEY (`activityid`),
  ADD UNIQUE KEY `actitvityname` (`activityname`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectionid` (`sectionid`);

--
-- Indexes for table `message_active`
--
ALTER TABLE `message_active`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectionid` (`typeid`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `typeid_2` (`typeid`);

--
-- Indexes for table `section_type`
--
ALTER TABLE `section_type`
  ADD PRIMARY KEY (`sectionid`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `sectionid` (`sectionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_learn`
--
ALTER TABLE `active_learn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `active_learn_kind`
--
ALTER TABLE `active_learn_kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `active_learn_type`
--
ALTER TABLE `active_learn_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `activity_type`
--
ALTER TABLE `activity_type`
  MODIFY `activityid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_active`
--
ALTER TABLE `message_active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `section_type`
--
ALTER TABLE `section_type`
  MODIFY `sectionid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `active_learn`
--
ALTER TABLE `active_learn`
  ADD CONSTRAINT `active_learn_ibfk_1` FOREIGN KEY (`kind_id`) REFERENCES `active_learn_kind` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `active_learn_kind`
--
ALTER TABLE `active_learn_kind`
  ADD CONSTRAINT `active_learn_kind_ibfk_1` FOREIGN KEY (`active_type_id`) REFERENCES `active_learn_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activites`
--
ALTER TABLE `activites`
  ADD CONSTRAINT `activites_ibfk_1` FOREIGN KEY (`activityid`) REFERENCES `activity_type` (`activityid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activites_ibfk_2` FOREIGN KEY (`sectionid`) REFERENCES `section_type` (`sectionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activites_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sectionid`) REFERENCES `section_type` (`sectionid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `types` (`typeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`sectionid`) REFERENCES `section_type` (`sectionid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
