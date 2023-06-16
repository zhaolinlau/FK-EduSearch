-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 11:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fk-edusearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `bug`
--

CREATE TABLE `bug` (
  `BugID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `Bug_Description` varchar(255) NOT NULL,
  `Bug_Status` tinyint(1) NOT NULL,
  `Bug_Reported` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` bigint(255) NOT NULL,
  `PostID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `CommentDetails` varchar(255) NOT NULL,
  `CommentCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `CommentUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `PostID`, `UserID`, `CommentDetails`, `CommentCreated`, `CommentUpdated`) VALUES
(44, 22, 2, 'hgjkfghjfghj', '2023-06-06 22:30:31', '2023-06-06 22:30:31'),
(45, 23, 15, 'ddddddddddddd', '2023-06-07 02:44:44', '2023-06-07 02:44:44'),
(46, 23, 15, 'fffffffffffffffffff', '2023-06-07 02:44:47', '2023-06-07 02:44:47'),
(47, 23, 2, 'fff', '2023-06-07 02:46:31', '2023-06-07 02:46:31'),
(48, 25, 2, 'fghjfghjf', '2023-06-07 17:27:56', '2023-06-07 17:27:56'),
(50, 26, 21, 'asdasd', '2023-06-07 17:59:09', '2023-06-07 17:59:09'),
(51, 26, 21, 'sdfsdf', '2023-06-07 18:00:15', '2023-06-07 18:00:15'),
(54, 27, 2, 'afsdfasdf', '2023-06-09 05:58:49', '2023-06-09 05:58:49'),
(55, 27, 15, 'sdfgsdfgsdfg', '2023-06-09 05:59:15', '2023-06-09 05:59:15'),
(56, 23, 1, 'asdasd', '2023-06-16 08:45:04', '2023-06-16 08:45:04'),
(57, 34, 2, 'dfghdfghdfgh', '2023-06-16 08:46:08', '2023-06-16 08:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `comment_report`
--

CREATE TABLE `comment_report` (
  `ReportID` bigint(255) NOT NULL,
  `CommentID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `ReportDescription` varchar(255) NOT NULL,
  `ReportStatus` int(1) NOT NULL,
  `Reported_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ComplaintID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `FeedbackID` bigint(255) NOT NULL,
  `ComplaintType` varchar(40) NOT NULL,
  `ComplaintDescription` varchar(255) NOT NULL,
  `ComplaintStatus` varchar(40) NOT NULL,
  `ComplaintCreatedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ComplaintEditedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`ComplaintID`, `UserID`, `FeedbackID`, `ComplaintType`, `ComplaintDescription`, `ComplaintStatus`, `ComplaintCreatedDate`, `ComplaintEditedDate`) VALUES
(1, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffff', 'In Investigation', '2023-06-07 21:45:20', '2023-06-07 21:45:20'),
(2, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffff', 'In Investigation', '2023-06-07 21:46:13', '2023-06-07 21:46:13'),
(4, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffffff', 'In Investigation', '2023-06-07 22:08:21', '2023-06-07 22:08:21'),
(5, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffffff', 'In Investigation', '2023-06-07 22:08:59', '2023-06-07 22:08:59'),
(6, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffffff', 'In Investigation', '2023-06-07 22:09:06', '2023-06-07 22:09:06'),
(7, 15, 6, 'Wrongly Assigned Research Area', 'vvvvv', 'In Investigation', '2023-06-07 22:10:31', '2023-06-07 22:10:31'),
(8, 15, 6, 'Wrongly Assigned Research Area', 'cfgfgfgf', 'In Investigation', '2023-06-07 22:12:43', '2023-06-07 22:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` bigint(255) NOT NULL,
  `PostID` bigint(255) NOT NULL,
  `ExpertID` varchar(10) NOT NULL,
  `ExpertFeedback` varchar(255) NOT NULL,
  `UserRating` tinyint(1) NOT NULL,
  `UserFeedback` varchar(255) NOT NULL,
  `FeedbackCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `PostID`, `ExpertID`, `ExpertFeedback`, `UserRating`, `UserFeedback`, `FeedbackCreated`) VALUES
(1, 25, 'EXB023', 'sadfasdf', 0, '', '2023-06-07 17:39:51'),
(2, 25, 'EXB023', 'ddddddddddd', 0, '', '2023-06-07 17:39:58'),
(3, 25, 'EXB023', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 5, '', '2023-03-07 17:40:05'),
(4, 25, 'EXB023', 'sdsd', 0, '', '2023-06-07 17:42:36'),
(5, 25, 'EXB023', 'ddd', 0, '', '2023-06-07 17:42:47'),
(6, 26, 'EXB023', 'asdfasdf', 0, '', '2023-06-07 17:50:09'),
(7, 26, 'EXB023', 'ffffffffffffff', 0, '', '2023-06-07 17:50:14'),
(8, 26, 'EXB023', 'close?', 0, '', '2023-06-07 18:00:52'),
(9, 26, 'EXB023', 'hello\r\n', 0, '', '2023-06-07 18:33:56'),
(10, 26, 'EXB023', 'ffffff', 0, '', '2023-06-07 19:27:25'),
(11, 27, 'EXB023', 'afasdfasdfasdf', 0, '', '2023-06-09 05:58:43'),
(12, 29, 'EXB023', 'Cloud computing refers to the delivery of computing resources, such as servers, storage, databases, software, and applications, over the internet. Instead of hosting and managing these resources locally, they are provided by a third-party provider and acc', 0, '', '2023-06-09 06:02:15'),
(13, 28, 'EXB023', ' A firewall is a security device or software that monitors and controls incoming and outgoing network traffic based on predetermined security rules. It acts as a barrier between a trusted internal network and an untrusted external network (such as the int', 0, '', '2023-06-09 06:02:27'),
(14, 32, 'EXB023', ' Cloud computing allows users to access and use resources and applications stored on remote servers over the internet, providing flexibility and scalability.\r\n\r\n\r\n\r\n\r\n', 0, '', '2023-06-09 08:19:42'),
(15, 31, 'EXB023', 'Install antivirus software, update your system regularly, be cautious with email attachments and links, enable a firewall, practice safe browsing, and back up your files.', 0, '', '2023-06-09 08:19:58'),
(16, 30, 'EXB023', 'HTTPS adds an extra layer of security by encrypting data, while HTTP does not.', 0, '', '2023-06-09 08:20:09'),
(17, 33, 'EXP111', 'yeah', 0, '', '2023-03-13 03:20:22'),
(18, 34, 'EXB023', 'rghdrfghdfgh', 0, '', '2023-06-16 08:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `LikeID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `PostID` bigint(255) NOT NULL,
  `Liked_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`LikeID`, `UserID`, `PostID`, `Liked_On`) VALUES
(41, 2, 34, '2023-06-16 08:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `PostStatus` varchar(9) NOT NULL,
  `PostTitle` varchar(25) NOT NULL,
  `PostContent` varchar(255) NOT NULL,
  `PostCategory` varchar(25) NOT NULL,
  `ExpertID` varchar(10) NOT NULL,
  `PostCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `PostUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `UserID`, `PostStatus`, `PostTitle`, `PostContent`, `PostCategory`, `ExpertID`, `PostCreated`, `PostUpdated`) VALUES
(22, 15, 'Revised', 'sdfgsdfg', 'sdefgsdfg', 'Others', 'EXB023', '2023-06-06 22:14:10', '2023-06-06 22:30:31'),
(23, 15, 'Revised', 'ggg', 'ggg', 'QNA', 'EXB023', '2023-06-07 02:41:03', '2023-06-07 02:46:31'),
(25, 15, 'Revised', 'aaa', 'aaa', 'Sharing', 'EXB023', '2023-06-07 17:22:14', '2023-06-07 17:39:51'),
(26, 15, 'Revised', 'fff', 'fff', 'Annoucement', 'EXB023', '2023-06-07 17:43:14', '2023-06-07 17:50:09'),
(27, 15, 'Completed', 'sdfgsdfg', 'sdfgsdfg', 'Annoucement', 'EXB023', '2023-06-09 05:58:17', '2023-06-09 05:59:22'),
(28, 15, 'Revised', 'What is a firewall?', 'What is a firewall?', 'QNA', 'EXB023', '2023-06-09 06:01:32', '2023-06-09 06:02:27'),
(29, 15, 'Revised', 'What is cloud computing?', 'What is cloud computing ?  What is  cloud computing?', 'QNA', 'EXB023', '2023-06-09 06:01:41', '2023-06-09 06:02:15'),
(30, 15, 'Revised', 'HTTP and HTTPS?', ' What is the difference between HTTP and HTTPS?', 'QNA', 'EXB023', '2023-06-09 08:18:14', '2023-06-09 08:20:09'),
(31, 15, 'Revised', 'malware and viruses?', 'Question: How can I protect my computer from malware and viruses?\r\n', 'QNA', 'EXB023', '2023-06-09 08:19:04', '2023-06-09 08:19:58'),
(32, 15, 'Revised', 'cloud computing', 'Question: What is cloud computing and how does it work?\r\n', 'QNA', 'EXB023', '2023-06-09 08:19:18', '2023-06-09 08:19:42'),
(33, 22, 'Revised', 'test for old', 'yes?', 'QNA', 'EXP111', '2023-03-13 03:20:01', '2023-03-13 03:20:22'),
(34, 1, 'Revised', 'asdfasdf', 'fds', 'Annoucement', 'EXB023', '2023-06-16 08:45:43', '2023-06-16 08:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `PublicationID` bigint(255) NOT NULL,
  `PublicationTitle` varchar(255) NOT NULL,
  `PublicationDate` varchar(255) NOT NULL,
  `UserID` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` bigint(255) NOT NULL,
  `PostID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `ExpertID` varchar(10) NOT NULL,
  `UserRating` tinyint(1) NOT NULL,
  `UserFeedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`RatingID`, `PostID`, `UserID`, `ExpertID`, `UserRating`, `UserFeedback`) VALUES
(1, 23, 15, 'EXB023', 3, 'test'),
(2, 27, 15, 'EXB023', 2, 'dsadfgsdfg'),
(3, 29, 15, 'EXB023', 4, 'NICE'),
(4, 28, 15, 'EXB023', 5, 'CONCISE ANSWER'),
(5, 30, 15, 'EXB023', 3, 'good'),
(6, 31, 15, 'EXB023', 5, 'nvrce'),
(7, 32, 15, 'EXB023', 4, 'xd'),
(8, 33, 22, 'EXP111', 4, 'amazing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` bigint(255) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserSocialMedia` varchar(100) NOT NULL,
  `UserResearchArea` varchar(100) NOT NULL,
  `StaffID` varchar(10) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `ExpertID` varchar(10) NOT NULL,
  `UserRole` tinyint(1) NOT NULL,
  `ResearchTopic` varchar(25) NOT NULL,
  `ExpertAreaOfExpertise` varchar(255) NOT NULL,
  `ExpertCV` varchar(255) NOT NULL,
  `ExpertAccountStatus` tinyint(4) NOT NULL,
  `ExpertRatings` float NOT NULL,
  `PublicationID` bigint(255) NOT NULL,
  `UserCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserPassword`, `UserEmail`, `UserSocialMedia`, `UserResearchArea`, `StaffID`, `StudentID`, `ExpertID`, `UserRole`, `ResearchTopic`, `ExpertAreaOfExpertise`, `ExpertCV`, `ExpertAccountStatus`, `ExpertRatings`, `PublicationID`, `UserCreated`, `UserUpdated`) VALUES
(1, 'admin', '$2y$10$KNL1l8BZGYGbtA63C.ikpuevRBo3OIsZQ3ITuZ2LkACh8B5mxptSy', 'admin@gmail.com', '', '', 'STA001', '0', '', 0, '', '', '', 1, 0, 0, '2023-06-04 21:32:22', '2023-06-13 03:36:22'),
(2, 'expert', '$2y$10$oqnJGRxriBE8NJli9yice.P4..48apl7fH2EmuC0rxljahoD3mey6', 'expert@gmail.com', '', '', '', '0', 'EXB023', 1, '', '', '', 0, 0, 0, '2023-06-04 21:32:22', '2023-06-04 21:32:53'),
(3, 'lecturer', '$2y$10$u3lUUWPNcQD3a5rz3IhkfeNg1asAuRe766JDH4bJGtlWj524jUyEq', 'lecturer@gmail.com', '', '', 'STH750', '0', '', 2, '', '', '', 1, 0, 0, '2023-06-04 21:32:22', '2023-06-13 03:50:03'),
(15, 'student', '$2y$10$JD3I5mBarXmeIu9RdTM.R.Xw8vNYJUPKtS97M2raOeHlTXTsamizW', 'student@gmail.com', '', '', '', 'cb22039', '', 3, '', '', '', 1, 0, 0, '2023-06-04 22:41:48', '2023-06-13 03:34:18'),
(21, 'expert2', '$2y$10$6r5EDLfDCMatheREHyo6EuOkp61YBo9e4vaqCsNJqlP7AdkekaaWi', 'expert2@gmail.com', '', '', '', '', 'EXP222', 1, '', '', '', 0, 0, 0, '2023-06-07 03:18:48', '2023-06-07 03:18:48'),
(22, 'oldstd', '$2y$10$Fgim9OSL.ZThNlDgSdwcMOjliW6b10k8CCtzBWHh6JwKg1nVe248.', 'oldstudent@gmail.com', '', '', '', 'CA16112', '', 3, '', '', '', 0, 0, 0, '2023-06-13 03:16:16', '2023-06-13 03:50:12'),
(23, 'oldexp', '$2y$10$Qd5K8QHJ4iStewf6oEubZOQ9CNq9lVmKMJvDBD443AykdEcsjA8hm', 'oldExpert@gmail.com', '', '', '', '', 'EXP111', 1, '', '', '', 1, 0, 0, '2023-06-13 03:16:28', '2023-06-13 03:50:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`BugID`),
  ADD UNIQUE KEY `BugID` (`BugID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD UNIQUE KEY `CommentID` (`CommentID`),
  ADD KEY `PostID` (`PostID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `comment_report`
--
ALTER TABLE `comment_report`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `CommentID` (`CommentID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`ComplaintID`),
  ADD UNIQUE KEY `ComplaintID` (`ComplaintID`),
  ADD KEY `UserID` (`UserID`,`FeedbackID`),
  ADD KEY `FeedbackID` (`FeedbackID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD UNIQUE KEY `FeedbackID` (`FeedbackID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `ExpertID` (`ExpertID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`LikeID`),
  ADD UNIQUE KEY `LikeID` (`LikeID`),
  ADD KEY `UserID` (`UserID`,`PostID`),
  ADD KEY `PostID` (`PostID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD UNIQUE KEY `PostID` (`PostID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ExpertID` (`ExpertID`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`PublicationID`),
  ADD UNIQUE KEY `PublicationID` (`PublicationID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD UNIQUE KEY `RatingID` (`RatingID`),
  ADD KEY `PostID` (`PostID`,`UserID`),
  ADD KEY `ExpertID` (`ExpertID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `StaffID` (`StaffID`,`StudentID`,`ExpertID`),
  ADD UNIQUE KEY `UserName` (`UserName`,`UserEmail`),
  ADD KEY `ExpertID` (`ExpertID`),
  ADD KEY `StaffID_2` (`StaffID`,`StudentID`,`ExpertID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bug`
--
ALTER TABLE `bug`
  MODIFY `BugID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `comment_report`
--
ALTER TABLE `comment_report`
  MODIFY `ReportID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ComplaintID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `LikeID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `PublicationID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bug`
--
ALTER TABLE `bug`
  ADD CONSTRAINT `bug_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_report`
--
ALTER TABLE `comment_report`
  ADD CONSTRAINT `comment_report_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_report_ibfk_2` FOREIGN KEY (`CommentID`) REFERENCES `comment` (`CommentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`FeedbackID`) REFERENCES `feedback` (`FeedbackID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`ExpertID`) REFERENCES `user` (`ExpertID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`ExpertID`) REFERENCES `user` (`ExpertID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
