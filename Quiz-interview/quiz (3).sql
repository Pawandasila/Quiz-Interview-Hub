-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 07:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_test`
--

CREATE TABLE `main_test` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `start_date_time` datetime DEFAULT NULL,
  `end_date_time` datetime DEFAULT NULL,
  `test_type` varchar(50) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `num_of_questions` int(11) DEFAULT NULL,
  `sections` varchar(255) DEFAULT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `passing_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_test`
--

INSERT INTO `main_test` (`test_id`, `test_name`, `company_name`, `start_date_time`, `end_date_time`, `test_type`, `teacher_id`, `num_of_questions`, `sections`, `total_marks`, `passing_number`) VALUES
(1, 'English Test', 'Apple limited', '2024-01-10 16:32:54', '2024-01-19 16:32:54', 'Main', 1, 6, '3', 32, 8),
(13, 'sde ', 'infosis', '2024-02-17 12:24:00', '2024-02-20 12:24:00', 'Main', NULL, NULL, NULL, NULL, NULL),
(14, 'ff', 'a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'null', NULL, NULL, NULL, NULL, NULL),
(15, 's', 's', '2024-02-07 14:25:00', '2024-02-19 14:25:00', 'Mock', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pyq`
--

CREATE TABLE `pyq` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `uploaded_file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pyq`
--

INSERT INTO `pyq` (`id`, `teacherid`, `company_name`, `uploaded_file`, `link`, `date`, `time`) VALUES
(1, 1, 'Company A', 'file1.pdf', 'https://example.com/file1', '2024-02-13', '10:00:00'),
(2, 2, 'Company B', 'file2.pdf', 'https://example.com/file2', '2024-02-13', '11:30:00'),
(3, 3, 'Company C', 'file3.pdf', 'https://example.com/file3', '2024-02-13', '14:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `question_text` varchar(255) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `section_id`, `question_text`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES
(1, 1, 'What is the meaning of the word \"ephemeral\"?', 'Lasting for a short time', 'Permanent', 'Transparent', 'Fragile', 'Lasting for a short time'),
(2, 1, 'Choose the synonym for the word  \"ubiquitous.\"?', ' Scarce', ' Pervasive', 'Insignificant', ' Abundant', 'Pervasive'),
(3, 1, 'What is the capital of France?', 'a) London', 'b) Berlin', 'c) Paris', 'd) Rome', 'c) Paris'),
(4, 2, 'Question 1 Text', 'Option 1 for Q1', 'Option 2 for Q1', 'Option 3 for Q1', 'Option 4 for Q1', 'Correct Option for Q1'),
(5, 2, 'Question 2 Text', 'Option 1 for Q2', 'Option 2 for Q2', 'Option 3 for Q2', 'Option 4 for Q2', 'Correct Option for Q2'),
(6, 2, 'Question 3 Text', 'Option 1 for Q3', 'Option 2 for Q3', 'Option 3 for Q3', 'Option 4 for Q3', 'Correct Option for Q3');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `test_id`, `section_name`, `marks`) VALUES
(1, 1, 'Vocabulary', 2),
(2, 1, 'english', 50);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `student_id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `photo` blob DEFAULT NULL,
  `clg_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`student_id`, `fname`, `lname`, `email`, `password`, `phone_no`, `photo`, `clg_name`) VALUES
(1, 'pawan', 'dasila', 'pawandasila123@gmail.com', '$2y$10$/NS/5DtcnTVEulEZ63GfdObO47MCMEcF53kNYs9/iXm', '7819805935', NULL, 'college1'),
(2, 'umi', 'dasila', 'umi1212@gmail.com', '$2y$10$xwBGq0Q78nwaQifSrHx8UeauzObIKWuB.Cc14q.xWMh', '7017189412', NULL, 'college3'),
(3, 'author', 'habibi', 'habibi@gmail.com', '$2y$10$MwahsVOu9UxqS5TzKztFPOuoaMueMqLBK.ag2W/ZPzu', '123123123', NULL, 'college1'),
(4, 'aman', 'sir', 'amansir123@gmail.com', '$2y$10$6icWYSuqtKOcLzxaqUowa.uZHH3Ew0odjVXvuGmQdJO', '4545454545', NULL, 'college1'),
(5, 'aman', 'da', 'amanda123@gmail.com', '123456789', '123456789', NULL, 'college1'),
(6, 'pawan', 'dasila', 'pawandasila06@gmail.com', '$2y$10$kk.fyyGmtMHbck1okmgFZuQMOF.w3CTtZMJebwF/qR.w2rnx/JMVS', '17819805935', NULL, 'college1'),
(7, 'asas', 'asas', 'asas12@gmail.com', '$2y$10$9BqnbttwZK5Mu7GJakwJ0OnxRS58GE5TPK42W4zLTkivwAhq6Fzeu', '789654321', NULL, 'college1'),
(8, 'pawan', 'dasila', 'jki12@gmail.com', '$2y$10$fh5LYJ5yaAYOS01EfhH8xu3e.46T1E3UvlWuoedyYdrfks0VAg7QK', '17819805935', NULL, 'college1'),
(9, 'pawan', 'dasila', 'ggh12@gmail.com', '$2y$10$KCngxO.VTTaE2zcpV7dzxu3rrShF1Kxuxl0hPEJGXiZIs0tawgUe2', '17819805935', NULL, 'college1'),
(10, 'nescafe', 'coffee', 'nescafe12@nescafe.com', '$2y$10$CMPdPhX2BB0FxWqBRpM2kuKo3Aq57RTvw5CKTjT6lnNlDrnHQnfRi', '4545454545454', NULL, 'college1');

-- --------------------------------------------------------

--
-- Table structure for table `study_material`
--

CREATE TABLE `study_material` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `topic_name` varchar(255) DEFAULT NULL,
  `uploaded_file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `upload_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_material`
--

INSERT INTO `study_material` (`id`, `teacher_id`, `topic_name`, `uploaded_file`, `link`, `upload_datetime`) VALUES
(1, 1, 'Introduction to Algorithms', 'algorithm_notes.pdf', 'https://www.geeksforgeeks.org/fundamentals-of-algorithms/', '2024-02-13 10:00:00'),
(2, 2, 'Data Structures Overview', 'data_structures.pdf', 'https://www.geeksforgeeks.org/data-structures/', '2024-02-13 11:30:00'),
(3, 3, 'Web Development Basics', 'web_dev_basics.docx', 'https://www.geeksforgeeks.org/web-development/', '2024-02-13 14:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `TeacherId` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `ClgName` varchar(50) DEFAULT NULL,
  `Available` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`TeacherId`, `Fname`, `Lname`, `Email`, `Password`, `SubjectId`, `ClgName`, `Available`) VALUES
(1, 'teacher', 'college', 'teacher123@gmail.com', '$2y$10$4bLR0IwL98eNX9oHWoAVieeOJsT24YO8zgvR5nMTjzzPesTiqapPO', 2147483647, 'college3', 1),
(2, 'mohit', 'rawat', 'mohitrawat8642@gmail.com', 'mohit1234', 1, 'graphic era', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_test`
--
ALTER TABLE `main_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `pyq`
--
ALTER TABLE `pyq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`TeacherId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_test`
--
ALTER TABLE `main_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pyq`
--
ALTER TABLE `pyq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_login`
--
ALTER TABLE `teacher_login`
  MODIFY `TeacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
