-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 10:48 PM
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
  `Screenshot` varchar(255) NOT NULL,
  `Bug_Title` varchar(255) NOT NULL,
  `Bug_Description` varchar(255) NOT NULL,
  `Bug_Status` varchar(25) NOT NULL,
  `Bug_Reported` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bug`
--

INSERT INTO `bug` (`BugID`, `UserID`, `Screenshot`, `Bug_Title`, `Bug_Description`, `Bug_Status`, `Bug_Reported`) VALUES
(11, 1, 'vuejs.png', 'dfghdfgh', 'dfghdfgh', 'New Reported', '2023-06-17 16:22:13'),
(12, 1, 'vuejs.png', 'fghjfghj', 'fghjfghj', 'Fixing', '2023-06-17 16:22:22'),
(13, 1, 'vuejs.png', 'ftghjfghj', 'fghjfghj', 'Resolved', '2023-06-17 16:22:27'),
(14, 1, 'vuejs.png', 'jjj', 'jjj', 'New Reported', '2023-06-17 16:23:05'),
(15, 1, 'programmer-1653351.png', 'fghdrfgh', 'dfghdfgh', 'New Reported', '2023-06-17 19:20:13');

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
(52, 24, 15, 'hekk', '2023-06-07 19:00:16', '2023-06-07 19:00:16'),
(53, 24, 15, '', '2023-06-07 19:00:16', '2023-06-07 19:00:16'),
(54, 26, 2, 'hhhhh', '2023-06-07 22:52:41', '2023-06-07 22:52:41'),
(55, 25, 2, 'ggggg', '2023-06-07 23:55:05', '2023-06-07 23:55:05'),
(56, 27, 3, 'sdnbfrb', '2023-06-16 13:57:54', '2023-06-16 13:57:54'),
(58, 29, 21, 'sdfsdf', '2023-06-17 14:51:30', '2023-06-17 14:51:30'),
(59, 29, 2, 'asdasd', '2023-06-17 14:51:52', '2023-06-17 14:51:52');

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
  `Reported_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `screenshot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_report`
--

INSERT INTO `comment_report` (`ReportID`, `CommentID`, `UserID`, `ReportDescription`, `ReportStatus`, `Reported_On`, `screenshot`) VALUES
(1, 52, 3, 'Testtttting@!', 3, '2023-06-17 01:42:31', 'e4rd.png'),
(2, 53, 3, 'william good morning!!!', 1, '2023-06-17 01:43:03', 'DIVERSITY (1).png');

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
  `ComplaintEditedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ComplaintPhoto` text NOT NULL,
  `ComplaintResponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`ComplaintID`, `UserID`, `FeedbackID`, `ComplaintType`, `ComplaintDescription`, `ComplaintStatus`, `ComplaintCreatedDate`, `ComplaintEditedDate`, `ComplaintPhoto`, `ComplaintResponse`) VALUES
(2, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffff', 'On Hold', '2023-06-07 21:46:13', '2023-06-16 17:40:11', '', 'njksjnknjksjkns'),
(4, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffffff', 'On Hold', '2023-06-07 22:08:21', '2023-06-16 17:37:04', '', 'jvjkvjkbjkbjkb\r\n'),
(5, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffffff', 'On Hold', '2023-06-07 22:08:59', '2023-06-16 15:58:10', '', ''),
(6, 15, 6, 'Unsatisfied Expert’s Feedback', 'fffffffff', 'In Investigation', '2023-06-07 22:09:06', '2023-06-16 17:42:48', '', 'csancajjk'),
(8, 15, 6, 'Wrongly Assigned Research Area', 'cfgfgfgf', 'In Investigation', '2023-06-07 22:12:43', '2023-06-16 17:37:32', '', 'wflnkfnwkflk'),
(10, 15, 6, 'Unsatisfied Expert’s Feedback', 'wfafweagvde', 'In Investigation', '2023-06-09 04:44:11', '2023-06-09 04:44:11', '', ''),
(11, 15, 6, 'Unsatisfied Expert’s Feedback', 'fwefegeh', 'In Investigation', '2023-06-09 04:46:38', '2023-06-16 17:39:53', '', 'canncasmncm,s'),
(12, 15, 6, 'Wrongly Assigned Research Area', 'casvevew', 'Resolved', '2023-06-09 04:47:10', '2023-06-16 17:14:12', '', ''),
(30, 15, 6, 'Wrongly Assigned Research Area', 'ggaws', 'In Investigation', '2023-06-15 04:41:27', '2023-06-16 17:41:04', '', 'svdsvddv'),
(32, 15, 6, 'Unsatisfied Expert’s Feedback', 'jhvjvjvjuvuj', 'Resolved', '2023-06-15 04:42:20', '2023-06-16 15:58:16', '', ''),
(47, 15, 6, 'Unsatisfied Expert’s Feedback', 'useless feedback', 'In Investigation', '2023-06-15 14:40:08', '2023-06-15 14:40:08', '648b22c8756834.03069958.png', ''),
(48, 3, 14, 'Unsatisfied Expert’s Feedback', 'I am talking C# not PHP', 'Resolved', '2023-06-15 17:55:49', '2023-06-15 17:56:20', '648b50a52fd8f0.25632760.png', ''),
(49, 15, 6, 'Unsatisfied Expert’s Feedback', 'bxsdgsegb', 'In Investigation', '2023-06-16 10:56:31', '2023-06-16 10:56:31', '648c3fdfbd7f81.99516811.png', ''),
(50, 15, 15, 'Wrongly Assigned Research Area', 'bxdbsded', 'In Investigation', '2023-06-16 14:09:39', '2023-06-16 17:39:20', '648c6d23b338c2.52624559.png', 'salknsanl'),
(51, 15, 6, 'Unsatisfied Expert’s Feedback', 'cavwfwegg4w', 'In Investigation', '2023-06-16 17:58:00', '2023-06-16 17:58:00', '648ca2a8cefb89.47672239.png', '');

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
(3, 25, 'EXB023', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 0, '', '2023-06-07 17:40:05'),
(4, 25, 'EXB023', 'sdsd', 0, '', '2023-06-07 17:42:36'),
(5, 25, 'EXB023', 'ddd', 0, '', '2023-06-07 17:42:47'),
(6, 26, 'EXB023', 'asdfasdf', 0, '', '2023-06-07 17:50:09'),
(7, 26, 'EXB023', 'ffffffffffffff', 0, '', '2023-06-07 17:50:14'),
(8, 26, 'EXB023', 'close?', 0, '', '2023-06-07 18:00:52'),
(9, 26, 'EXB023', 'hello\r\n', 0, '', '2023-06-07 18:33:56'),
(10, 26, 'EXB023', 'ffffff', 0, '', '2023-06-07 19:27:25'),
(11, 26, 'EXB023', 'hhhhhhhh', 0, '', '2023-06-07 22:52:35'),
(12, 25, 'EXB023', 'ggggg', 0, '', '2023-06-07 23:55:01'),
(13, 27, 'EXB023', 'cafcwkifwf\r\n', 0, '', '2023-06-09 05:21:37'),
(14, 28, 'EXP222', 'ya.  You are right. But Laravel and PHP are more better than  C# and ASP.NET', 0, '', '2023-06-15 17:54:09'),
(15, 23, 'EXB023', 'zbdsghbw', 0, '', '2023-06-16 14:08:43'),
(16, 29, 'EXB023', 'http://localhost/FK-EduSearch/comments.php?post_id=29', 0, '', '2023-06-17 14:51:56'),
(17, 24, 'EXP222', 'dfhdfgh', 0, '', '2023-06-17 15:05:49');

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
(42, 3, 28, '2023-06-16 13:58:57');

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
(24, 2, 'Revised', 'asdfasdf', 'asdfasdf', 'Annoucement', 'EXP222', '2023-06-07 17:03:06', '2023-06-17 15:05:49'),
(25, 15, 'Revised', 'aaa', 'aaa', 'Sharing', 'EXB023', '2023-06-07 17:22:14', '2023-06-07 17:39:51'),
(26, 15, 'Revised', 'fff', 'fff', 'Annoucement', 'EXB023', '2023-06-07 17:43:14', '2023-06-07 17:50:09'),
(27, 15, 'Revised', 'adSFEGW', 'FWFWFW', 'Sharing', 'EXB023', '2023-06-09 05:20:29', '2023-06-09 05:21:37'),
(28, 3, 'Revised', 'C# is the trend', 'ASP.NET is one of the popular languages for the programming language C#. C# is one of the famous server-side language to develop the back-end.', 'Sharing', 'EXP222', '2023-06-15 17:53:04', '2023-06-15 17:54:09'),
(29, 1, 'Revised', 'sfda', 'sadf', 'Sharing', 'EXB023', '2023-06-17 14:37:26', '2023-06-17 14:51:56'),
(30, 2, 'Accepted', 'asfd', 'sfd', 'Annoucement', 'EXP222', '2023-06-17 14:54:58', '2023-06-17 15:03:57'),
(31, 21, 'Completed', 'fghj', 'fgjh', 'Annoucement', '', '2023-06-17 15:04:01', '2023-06-17 15:09:19'),
(32, 21, 'Completed', 'fghjfghj', 'ghjfghjfghj', 'Annoucement', '', '2023-06-17 15:06:00', '2023-06-17 15:08:19'),
(33, 21, 'Completed', 'sdfgsdfg', 'dfgsdfg', 'Annoucement', '', '2023-06-17 15:09:24', '2023-06-17 15:09:29'),
(34, 21, 'Completed', 'asdf', 'asdf', 'Annoucement', '', '2023-06-17 16:00:11', '2023-06-17 16:06:17');

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
(1, 23, 15, 'EXB023', 3, 'test');

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
(1, 'admin', '$2y$10$KNL1l8BZGYGbtA63C.ikpuevRBo3OIsZQ3ITuZ2LkACh8B5mxptSy', 'admin@gmail.com', '', '', 'STA001', '0', '', 0, '', '', '', 1, 0, 0, '2023-06-04 21:32:22', '2023-06-17 14:30:48'),
(2, 'expert', '$2y$10$oqnJGRxriBE8NJli9yice.P4..48apl7fH2EmuC0rxljahoD3mey6', 'expert@gmail.com', '', '', '', '0', 'EXB023', 1, '', '', '', 0, 0, 0, '2023-06-04 21:32:22', '2023-06-04 21:32:53'),
(3, 'lecturer', '$2y$10$u3lUUWPNcQD3a5rz3IhkfeNg1asAuRe766JDH4bJGtlWj524jUyEq', 'lecturer@gmail.com', '', '', 'STH750', '0', '', 2, '', '', '', 1, 0, 0, '2023-06-04 21:32:22', '2023-06-16 10:31:22'),
(15, 'student', '$2y$10$JD3I5mBarXmeIu9RdTM.R.Xw8vNYJUPKtS97M2raOeHlTXTsamizW', 'student@gmail.com', '', '', '', 'cb22039', '', 3, '', '', '', 0, 0, 0, '2023-06-04 22:41:48', '2023-06-06 23:21:46'),
(21, 'expert2', '$2y$10$6r5EDLfDCMatheREHyo6EuOkp61YBo9e4vaqCsNJqlP7AdkekaaWi', 'expert2@gmail.com', '', '', '', '', 'EXP222', 1, '', '', '', 0, 0, 0, '2023-06-07 03:18:48', '2023-06-07 03:18:48');

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
  MODIFY `BugID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `comment_report`
--
ALTER TABLE `comment_report`
  MODIFY `ReportID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ComplaintID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `LikeID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `RatingID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`ExpertID`) REFERENCES `user` (`ExpertID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
