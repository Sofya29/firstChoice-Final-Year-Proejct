-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db625229836.db.1and1.com
-- Generation Time: Apr 24, 2017 at 09:00 PM
-- Server version: 5.5.54-0+deb7u2-log
-- PHP Version: 5.4.45-0+deb7u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db625229836`
--

-- --------------------------------------------------------

--
-- Table structure for table `Answer`
--

CREATE TABLE IF NOT EXISTS `Answer` (
  `AnswerID` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Answer` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `AssessmentID` int(10) NOT NULL,
  `Correct` tinyint(1) NOT NULL DEFAULT '0',
  `QuestionID` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `QuestionNumber` int(3) NOT NULL,
  `AnswerLetter` varchar(1) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`AnswerID`),
  KEY `QuestionID` (`AssessmentID`),
  KEY `QuestionID_2` (`QuestionID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Assessment`
--

CREATE TABLE IF NOT EXISTS `Assessment` (
  `AssessmentID` int(10) NOT NULL,
  `Title` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `ModuleID` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `PercentageWorth` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `Duration` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `LecturerID` varchar(7) COLLATE latin1_general_ci NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AssessmentID`),
  KEY `LecturerID` (`LecturerID`),
  KEY `ModuleID` (`ModuleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE IF NOT EXISTS `Course` (
  `CourseID` varchar(7) COLLATE latin1_general_ci NOT NULL,
  `CourseTitle` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`CourseID`, `CourseTitle`) VALUES
('G401', 'Computer Science'),
('G4N2', 'Computing with Business'),
('G565', 'Information Systems'),
('G601', 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `CourseModule`
--

CREATE TABLE IF NOT EXISTS `CourseModule` (
  `CourseModuleID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `CourseID` varchar(7) COLLATE latin1_general_ci NOT NULL,
  `ModuleID` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `Optional` tinyint(1) NOT NULL,
  `Level` int(1) NOT NULL DEFAULT '4',
  PRIMARY KEY (`CourseModuleID`),
  KEY `CourseID` (`CourseID`,`ModuleID`),
  KEY `CourseModuleID` (`CourseModuleID`),
  KEY `CourseID_2` (`CourseID`),
  KEY `ModuleID` (`ModuleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `CourseModule`
--

INSERT INTO `CourseModule` (`CourseModuleID`, `CourseID`, `ModuleID`, `Optional`, `Level`) VALUES
('G401CI4100', 'G401', 'CI4100', 0, 4),
('G401CI4200', 'G401', 'CI4200', 0, 4),
('G401CI4300', 'G401', 'CI4300', 0, 4),
('G401CI4400', 'G401', 'CI4400', 0, 4),
('G401CI5100', 'G401', 'CI5100', 0, 5),
('G401CI5310', 'G401', 'CI5310', 0, 5),
('G401CI5410', 'G401', 'CI5410', 0, 5),
('G401CI5420', 'G401', 'CI5420', 0, 5),
('G401CI6110', 'G401', 'CI6110', 0, 6),
('G401CI6120', 'G401', 'CI6120', 1, 6),
('G401CI6230', 'G401', 'CI6230', 1, 6),
('G401CI6240', 'G401', 'CI6240', 1, 6),
('G401CI6250', 'G401', 'CI6250', 1, 6),
('G401CI6300', 'G401', 'CI6300', 0, 6),
('G401CI6310', 'G401', 'CI6310', 1, 6),
('G401CI6410', 'G401', 'CI6410', 1, 6),
('G4N2BU4001', 'G4N2', 'BU4001', 0, 4),
('G4N2BU5001', 'G4N2', 'BU5001', 0, 5),
('G4N2CI4100', 'G4N2', 'CI4100', 0, 0),
('G4N2CI4200', 'G4N2', 'CI4200', 0, 0),
('G4N2CI4300', 'G4N2', 'CI4300', 0, 0),
('G4N2CI5100', 'G4N2', 'CI5100', 0, 5),
('G4N2CI5220', 'G4N2', 'CI5220', 0, 5),
('G4N2CI5310', 'G4N2', 'CI5310', 0, 5),
('G4N2CI6110', 'G4N2', 'CI6110', 0, 6),
('G4N2CI6300', 'G4N2', 'CI6300', 0, 6),
('G565CI4100', 'G565', 'CI4100', 0, 4),
('G565CI4200', 'G565', 'CI4200', 0, 4),
('G565CI4300', 'G565', 'CI4300', 0, 4),
('G565CI4400', 'G565', 'CI4400', 0, 4),
('G565CI5220', 'G565', 'CI5220', 0, 5),
('G565CI5310', 'G565', 'CI5310', 0, 5),
('G565CI5410', 'G565', 'CI5410', 0, 5),
('G565CI5420', 'G565', 'CI5420', 0, 5),
('G565CI6300', 'G565', 'CI6300', 0, 6),
('G565CI6310', 'G565', 'CI6310', 1, 6),
('G565CI6400', 'G565', 'CI6400', 0, 6),
('G565CI6410', 'G565', 'CI6410', 1, 6),
('G601CI4100', 'G601', 'CI4100', 0, 4),
('G601CI4200', 'G601', 'CI4200', 0, 4),
('G601CI4300', 'G601', 'CI4300', 0, 4),
('G601CI4400', 'G601', 'CI4400', 0, 4),
('G601CI5100', 'G601', 'CI5100', 0, 5),
('G601CI5220', 'G601', 'CI5220', 0, 5),
('G601CI5310', 'G601', 'CI5310', 0, 5),
('G601CI5410', 'G601', 'CI5410', 0, 5),
('G601CI6110', 'G601', 'CI6110', 0, 6),
('G601CI6120', 'G601', 'CI6120', 0, 6),
('G601CI6230', 'G601', 'CI6230', 1, 6),
('G601CI6300', 'G601', 'CI6300', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `Lecturer`
--

CREATE TABLE IF NOT EXISTS `Lecturer` (
  `UserID` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `Office` varchar(8) COLLATE latin1_general_ci NOT NULL,
  UNIQUE KEY `UserID_6` (`UserID`),
  KEY `UserID` (`UserID`),
  KEY `UserID_2` (`UserID`),
  KEY `UserID_3` (`UserID`),
  KEY `UserID_4` (`UserID`),
  KEY `UserID_5` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Lecturer`
--

INSERT INTO `Lecturer` (`UserID`, `Office`) VALUES
('KU01412', 'SB3008'),
('ku07855', 'SB3004'),
('KU14009', 'SB1012'),
('kU33185', 'SB1013'),
('KU43817', 'SB3016'),
('KU45678', 'SB3017'),
('KU46587', 'SB3034');

-- --------------------------------------------------------

--
-- Table structure for table `LecturerModule`
--

CREATE TABLE IF NOT EXISTS `LecturerModule` (
  `LecturerModuleID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `LecturerID` varchar(7) COLLATE latin1_general_ci NOT NULL,
  `ModuleID` varchar(6) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`LecturerModuleID`),
  KEY `FK_LecturerID` (`LecturerID`),
  KEY `ModuleID` (`ModuleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `LecturerModule`
--

INSERT INTO `LecturerModule` (`LecturerModuleID`, `LecturerID`, `ModuleID`) VALUES
('KU01412CI4400', 'KU01412', 'CI4400'),
('KU01412CI5410', 'KU01412', 'CI5410'),
('ku07855CI5100', 'ku07855', 'CI5100'),
('KU14009CI5410', 'KU14009', 'CI5410'),
('KU14009CI6110', 'KU14009', 'CI6110'),
('kU33185CI4200', 'kU33185', 'CI4200'),
('kU33185CI6300', 'kU33185', 'CI6300'),
('KU43817CI6120', 'KU43817', 'CI6120'),
('KU45678CI6230', 'KU45678', 'CI6230'),
('KU46587CI4100', 'KU46587', 'CI4100'),
('KU46587CI6230', 'KU46587', 'CI6230');

-- --------------------------------------------------------

--
-- Table structure for table `Module`
--

CREATE TABLE IF NOT EXISTS `Module` (
  `ModuleID` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `ModuleName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ModuleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Module`
--

INSERT INTO `Module` (`ModuleID`, `ModuleName`) VALUES
('BU4001', 'Business Management'),
('BU5001', 'Managing Resources'),
('CI4100', 'Programming I'),
('CI4200', 'IT Toolbox'),
('CI4300', 'Business Analysis and Solutions Design'),
('CI4400', 'System Environment'),
('CI5100', 'Programming II'),
('CI5220', 'Networking and Operating Systems'),
('CI5310', 'Database and UML Modelling'),
('CI5410', 'Projects and their Management'),
('CI5420', 'Electronic and Web-Based Business Processes'),
('CI6110', 'Programming III'),
('CI6120', 'Dependable Systems'),
('CI6230', 'Advanced Database and the Web'),
('CI6240', 'Internet Security'),
('CI6250', 'Internet Services and Protocols'),
('CI6300', 'Individual Project'),
('CI6310', 'User Experience'),
('CI6400', 'Information Strategy and Management'),
('CI6410', 'Digital Business');

-- --------------------------------------------------------

--
-- Table structure for table `Post`
--

CREATE TABLE IF NOT EXISTS `Post` (
  `PostID` int(100) NOT NULL,
  `Post` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `LecturerModuleID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`PostID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE IF NOT EXISTS `Question` (
  `QuestionID` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Question` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `AssessmentID` int(10) NOT NULL,
  `QuestionNumber` int(3) NOT NULL,
  PRIMARY KEY (`QuestionID`),
  KEY `AssessmentID` (`AssessmentID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `UserID` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `CourseID` varchar(7) COLLATE latin1_general_ci NOT NULL,
  `Level` int(1) NOT NULL,
  UNIQUE KEY `UserID_7` (`UserID`),
  KEY `UserID` (`UserID`),
  KEY `UserID_2` (`UserID`),
  KEY `UserID_3` (`UserID`),
  KEY `UserID_4` (`UserID`),
  KEY `UserID_5` (`UserID`),
  KEY `UserID_6` (`UserID`),
  KEY `CourseID` (`CourseID`),
  KEY `CourseID_2` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`UserID`, `CourseID`, `Level`) VALUES
('K1406302', 'G601', 6),
('K1406809', 'G601', 6);

-- --------------------------------------------------------

--
-- Table structure for table `StudentAssessment`
--

CREATE TABLE IF NOT EXISTS `StudentAssessment` (
  `StudentAssessmentID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `StudentID` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `AssessmentID` int(10) NOT NULL,
  `Percentage` float DEFAULT NULL,
  `Grade` varchar(1) COLLATE latin1_general_ci DEFAULT NULL,
  `PercentageWorth` float DEFAULT NULL,
  `Complete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StudentAssessmentID`),
  KEY `StudentID` (`StudentID`,`AssessmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `StudentCourseModule`
--

CREATE TABLE IF NOT EXISTS `StudentCourseModule` (
  `StudentCourseModuleID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `StudentID` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `CourseModuleID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`StudentCourseModuleID`),
  KEY `StudentID` (`StudentID`),
  KEY `CourseModuleID` (`CourseModuleID`),
  KEY `StudentID_2` (`StudentID`),
  KEY `CourseModuleID_2` (`CourseModuleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `StudentCourseModule`
--

INSERT INTO `StudentCourseModule` (`StudentCourseModuleID`, `StudentID`, `CourseModuleID`) VALUES
('K1406302G601CI4100', 'K1406302', 'G601CI4100'),
('K1406302G601CI4200', 'K1406302', 'G601CI4200'),
('K1406302G601CI4300', 'K1406302', 'G601CI4300'),
('K1406302G601CI4400', 'K1406302', 'G601CI4400'),
('K1406302G601CI5100', 'K1406302', 'G601CI5100'),
('K1406302G601CI5220', 'K1406302', 'G601CI5220'),
('K1406302G601CI5310', 'K1406302', 'G601CI5310'),
('K1406302G601CI5410', 'K1406302', 'G601CI5410'),
('K1406302G601CI6110', 'K1406302', 'G601CI6110'),
('K1406302G601CI6120', 'K1406302', 'G601CI6120'),
('K1406302G601CI6300', 'K1406302', 'G601CI6300'),
('K1406809G601CI4100', 'K1406809', 'G601CI4100'),
('K1406809G601CI4200', 'K1406809', 'G601CI4200'),
('K1406809G601CI4300', 'K1406809', 'G601CI4300'),
('K1406809G601CI4400', 'K1406809', 'G601CI4400'),
('K1406809G601CI5100', 'K1406809', 'G601CI5100'),
('K1406809G601CI5220', 'K1406809', 'G601CI5220'),
('K1406809G601CI5310', 'K1406809', 'G601CI5310'),
('K1406809G601CI5410', 'K1406809', 'G601CI5410'),
('K1406809G601CI6110', 'K1406809', 'G601CI6110'),
('K1406809G601CI6120', 'K1406809', 'G601CI6120'),
('K1406809G601CI6300', 'K1406809', 'G601CI6300');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserID` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `Firstname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Lastname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `UserType` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `Active` tinyint(1) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `Firstname`, `Lastname`, `Email`, `Password`, `UserType`, `Active`) VALUES
('K1406302', 'Sonya', 'Nadesan', 'K1406302@kingston.ac.uk', '8a1c58954ba4b319fb7b80ffda1e7426', 'Student', 1),
('K1406809', 'Sofya', 'Nadesan', 'K1406809@kingston.ac.uk', '1cf0789a243cbb81711c2bdb8f3be56e', 'Student', 1),
('KU01412', 'Graham', 'Alsop', 'Graham.Alsop@kingston.ac.uk', '7e511b57eb137a88d818a2225876211c', 'Lecturer', 1),
('ku07855', 'David', 'Livingstone', 'ku07855@kingston.ac.uk', '0d02ad8a47fcff976a3d0b4a84e2f678', 'Lecturer', 1),
('KU12345', 'Sue', 'Atkinson', 'S.Atkinson@kingston.ac.uk', '99afc4df3156cf7254bf12a8c357da2a', 'Admin', 1),
('KU14009', 'James', 'Orwell', 'James@kingston.ac.uk', 'f2bb1ec492cb1d8963498174d133b8cf', 'Lecturer', 1),
('kU33185', 'Jean-Christophe', 'Nebel', 'j.Nebel@kingston.ac.uk', 'a5b5e9ff7f0981fbc98b73f29f0544e2', 'Lecturer', 1),
('KU43817', 'Pushpa', 'Kumarapeli', 'P.Kumarapeli@kingston.ac.uk', 'ca0f7b4b5a6a8f8e36d902fcd8970e5c', 'Lecturer', 1),
('KU45678', 'Nalini', 'Edwards', 'n.edwards@kingston.ac.uk', '743a1c5edb041e3a6d615add6d6ee6e1', 'Lecturer', 1),
('KU46587', 'Paul', 'Neve', 'P.Neve@kingston.ac.uk', '072f684e153b48e80c68bf14f3098663', 'Lecturer', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Assessment`
--
ALTER TABLE `Assessment`
  ADD CONSTRAINT `Assessment_ibfk_1` FOREIGN KEY (`ModuleID`) REFERENCES `Module` (`ModuleID`),
  ADD CONSTRAINT `LecturerID` FOREIGN KEY (`LecturerID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `CourseModule`
--
ALTER TABLE `CourseModule`
  ADD CONSTRAINT `FK_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`),
  ADD CONSTRAINT `FK_ModuleID` FOREIGN KEY (`ModuleID`) REFERENCES `Module` (`ModuleID`);

--
-- Constraints for table `Lecturer`
--
ALTER TABLE `Lecturer`
  ADD CONSTRAINT `Lecturer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `LecturerModule`
--
ALTER TABLE `LecturerModule`
  ADD CONSTRAINT `FK_LecturerID` FOREIGN KEY (`LecturerID`) REFERENCES `User` (`UserID`),
  ADD CONSTRAINT `ModuleID` FOREIGN KEY (`ModuleID`) REFERENCES `Module` (`ModuleID`);

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `CourseID` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`),
  ADD CONSTRAINT `fk_UserID` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `StudentCourseModule`
--
ALTER TABLE `StudentCourseModule`
  ADD CONSTRAINT `fk_CourseModuleID` FOREIGN KEY (`CourseModuleID`) REFERENCES `CourseModule` (`CourseModuleID`),
  ADD CONSTRAINT `fk_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `User` (`UserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
