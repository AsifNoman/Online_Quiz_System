-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 08:07 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atp`
--
CREATE DATABASE IF NOT EXISTS `atp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `atp`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `id` int(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `mark` int(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `intTime` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`id`, `user_name`, `mark`, `date`, `time`, `test_name`, `intTime`) VALUES
(146, 'ruman', 6, '01/07/2017', '10:35:07pm', 'Php', 103507),
(148, 'ruman', 4, '02/07/2017', '02:42:55am', 'java', 24255),
(202, 'sun', 5, '02/07/2017', '01:57:42pm', 'java', 15742),
(247, 'noman', 5, '30/07/2017', '09:43:43pm', 'Php', 94343),
(251, 'noman', 5, '30/07/2017', '10:09:24pm', 'Php', 100924),
(252, 'noman', 3, '30/07/2017', '10:10:30pm', 'java', 101030),
(253, 'noman', 5, '30/07/2017', '11:29:45pm', 'Php', 112945),
(257, 'sun', 5, '30/07/2017', '11:52:05pm', 'Php', 115205),
(258, 'faisal', 2, '30/07/2017', '11:52:51pm', 'java', 115251),
(259, 'faisal', 6, '30/07/2017', '11:53:24pm', 'Php', 115324),
(260, 'noman', 5, '31/07/2017', '12:13:27am', 'Php', 121327),
(261, 'faisal', 3, '31/07/2017', '09:11:14pm', 'java', 91114),
(262, 'faisal', 4, '31/07/2017', '09:12:11pm', 'java', 91211);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `test_name`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(119, 'Php', 'Who is the father of PHP?', 'Rasmus Lerdorf', 'Willam Makepiece', 'Drek Kolkevi', 'List Barely', 'Rasmus Lerdorf'),
(120, 'Php', 'A PHP script should start with ___ and end with __', '< php >', '< ? php >', '< ? ? >', '< ?php ? >', '< ?php ? >'),
(121, 'Php', 'Which version of PHP introduced Try/catch Exception?', 'PHP 4', 'PHP 5', 'PHP 5.3', 'PHP 6', 'PHP 5'),
(122, 'Php', 'Which of the below symbols is a newline character?', '\\r', '\\n', '/n', '/r', '\\n'),
(123, 'Php', 'If $a = 12 what will be returned when ($a == 12) ? 5 : 1 is executed?', '12', '5', '1', 'Error', '5'),
(124, 'Php', 'Which of the below statements is equivalent to $add += $add ?', '$add = $add', '$add = $add +$add', '$add = $add + 1', '$add = $add + $add + 1', '$add = $add +$add'),
(125, 'Php', 'Which statement will output $x on the screen?', 'echo ?\\$x?;', 'echo ?/$x?;', 'echo ?$$x?;', 'echo ?$x;', 'echo ?\\$x?;'),
(173, 'java', 'What is the size of long variable?', '8 bit', '16 bit', '32 bit', '64 bit', '64 bit'),
(174, 'java', 'What is an Interface?', 'Interface is an concrete class.', 'Interface is an abstract class.', 'An interface is a collection of abstract methods.', 'None of the above.', 'Interface is an concrete class.'),
(175, 'java', 'In which case, a program is expected to recover?', 'If an error occurs.', 'If an exception occurs.', 'Both of the above.', 'None of the above.', 'If an exception occurs.'),
(176, 'java', 'What is correct syntax for main method of a java class?', 'public static int main(String[] args)', 'public int main(String[] args)', 'public static void main(String[] args)', 'None of the above.', 'public static void main(String[] args)'),
(177, 'java', 'Which of the following is true about String?', 'String is immutable.', 'String is a data type.', 'String is mutable.', 'None of the above', 'String is immutable.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `test_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `time` int(255) NOT NULL,
  `details` varchar(400) NOT NULL,
  `no_of_ques` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`test_name`, `category`, `time`, `details`, `no_of_ques`) VALUES
('java', 'Programming', 5, 'This test is about 5 multiple choice questions and should take less than 5 minute to complete.For each correct answer 1 mark will be added.', 5),
('Php', 'Web Development', 10, 'This test is about 10 multiple choice questions and should take less than 10 minutes to complete.For each correct answer 1 mark will be added.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email_id` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email_id`, `user_password`, `user_gender`, `user_type`) VALUES
(9, 'faisal', 'f@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', 'user'),
(16, 'ruman', 'r@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', 'user'),
(17, 'sun', 's@gmail.com', '912ec803b2ce49e4a541068d495ab570', 'Male', 'user'),
(19, 'noman', 'noman@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', 'user'),
(20, 'asif', 'a@gamil.com', '912ec803b2ce49e4a541068d495ab570', 'Male', 'admin'),
(21, 'saifuddin', 's@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Male', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_name` (`test_name`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`test_name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`,`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD CONSTRAINT `tbl_question_ibfk_1` FOREIGN KEY (`test_name`) REFERENCES `tbl_test` (`test_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
