-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 12:00 PM
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
  `CommentCreated` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `CommentUpdated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `ComplaintID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `FeedbackID` bigint(255) NOT NULL,
  `ComplaintType` varchar(25) NOT NULL,
  `ComplaintDescription` varchar(255) NOT NULL,
  `ComplaintStatus` tinyint(1) NOT NULL,
  `ComplaintCreatedDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `ComplaintEditedDate` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` bigint(255) NOT NULL,
  `PostID` bigint(255) NOT NULL,
  `ExpertFeedback` varchar(255) NOT NULL,
  `UserRating` tinyint(1) NOT NULL,
  `UserFeedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `PostID` bigint(255) NOT NULL,
  `UserID` bigint(255) NOT NULL,
  `PostStatus` tinyint(1) NOT NULL,
  `PostTitle` varchar(25) NOT NULL,
  `PostContent` varchar(255) NOT NULL,
  `PostCategory` varchar(25) NOT NULL,
  `PostCreated` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `PostUpdated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` bigint(255) NOT NULL,
  `CommentID` bigint(255) NOT NULL,
  `RatingStar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserPassword`, `UserEmail`, `UserSocialMedia`, `UserResearchArea`, `StaffID`, `StudentID`, `ExpertID`, `UserRole`, `ResearchTopic`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$KNL1l8BZGYGbtA63C.ikpuevRBo3OIsZQ3ITuZ2LkACh8B5mxptSy', 'admin@gmail.com', '', '', 'STA001', '0', '', 0, '', '2023-04-21 04:33:09.909294', '2023-05-14 01:51:35.645232'),
(2, 'expert', '$2y$10$oqnJGRxriBE8NJli9yice.P4..48apl7fH2EmuC0rxljahoD3mey6', 'expert@gmail.com', '', '', '', '0', 'EXB023', 1, '', '2023-04-21 04:40:21.719293', '2023-05-20 13:09:09.951685'),
(3, 'lecturer', '$2y$10$u3lUUWPNcQD3a5rz3IhkfeNg1asAuRe766JDH4bJGtlWj524jUyEq', 'lecturer@gmail.com', '', '', 'STH750', '0', '', 2, '', '2023-04-21 04:48:28.248413', '2023-05-14 01:51:35.650834'),
(4, 'student', '$2y$10$DhERISDlz/5dIwsWnn/bNO3TrHu3ET9uALXWwjaLRzaI2mlITvtLW', 'student@gmail.com', '', '', '0', 'CB22039', '', 3, '', '2023-04-21 04:49:40.980236', '2023-05-14 01:51:35.653402');

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
  ADD KEY `PostID` (`PostID`,`UserID`);

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
  ADD UNIQUE KEY `PostID` (`FeedbackID`),
  ADD KEY `FeedbackID` (`PostID`),
  ADD KEY `PostID_2` (`PostID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`LikeID`),
  ADD UNIQUE KEY `LikeID` (`LikeID`),
  ADD KEY `UserID` (`UserID`,`PostID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD UNIQUE KEY `PostID` (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD UNIQUE KEY `RatingID` (`RatingID`),
  ADD KEY `CommentID` (`CommentID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`),
  ADD UNIQUE KEY `StaffID` (`StaffID`,`StudentID`,`ExpertID`);

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
  MODIFY `CommentID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `ComplaintID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `LikeID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`FeedbackID`) REFERENCES `feedback` (`FeedbackID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`CommentID`) REFERENCES `comment` (`CommentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
