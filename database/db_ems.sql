-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 08:13 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_answer_choice`
--

CREATE TABLE `evaluation_answer_choice` (
  `id` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_answer_choice`
--

INSERT INTO `evaluation_answer_choice` (`id`, `answer`, `description`) VALUES
(1, 0, 'No opinion'),
(2, 1, 'Strongly Disagree'),
(3, 2, 'Disagree'),
(4, 3, 'Agree'),
(5, 4, 'Strongly Agree');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_questionaire`
--

CREATE TABLE `evaluation_questionaire` (
  `id` int(11) NOT NULL,
  `question_type_ID` int(11) NOT NULL,
  `question` text NOT NULL,
  `eval_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_questionaire`
--

INSERT INTO `evaluation_questionaire` (`id`, `question_type_ID`, `question`, `eval_type_id`) VALUES
(2, 2, 'The level of the Activity was appropriate.', 2),
(3, 3, 'The speaker had a good understanding of the topic.', 2),
(4, 4, 'The activity was worth my time.', 2),
(6, 1, 'The activity met my expectations.', 2),
(7, 2, 'The format was enjoyable.', 2),
(8, 3, 'The speaker was well prepared and organized.', 2),
(9, 4, 'I accomplished the objectives of this activity.', 2),
(11, 1, 'The Content was helpful.', 2),
(12, 2, 'The length of the activity was appropriate.', 2),
(13, 3, 'The speaker had good knowledge of the topic.', 2),
(14, 3, 'The speaker\'s explanations were clear.', 2),
(15, 4, 'I will be able to use what I learned in this activity.', 2),
(16, 4, 'I recommend that the activity be repeated next year.', 2),
(17, 1, 'Rigorous planning was evident.', 1),
(18, 1, 'Dissemination of pertinent information was done ahead of time.', 1),
(19, 1, 'Student was given enough time to prepare for the activity.', 1),
(20, 1, 'Task were noticeably distributed appropriately among organizers, officers and other concerned personnel.', 1),
(21, 1, 'Fluidity and smoothness of activity was commendable.', 1),
(22, 1, 'Proper information was relayed from organizers to students.', 1),
(23, 1, 'Technical glitches have not occured', 1),
(24, 3, 'Approximately 100% of college students were present in the activity.', 1),
(25, 3, 'Utmost participation of college students was achieved.', 1),
(26, 3, 'Faculty was in attendance.', 1),
(27, 3, 'Concerned administrators were present.', 1),
(28, 3, 'Support from concerned administrator, faculty and officers was apparent.', 1),
(29, 4, 'The goals of the activity have been met.', 1),
(30, 4, 'The activity provided sufficient opportunity for interactive participation.  ', 1),
(31, 4, 'The activity was better compared to similar activities experience.', 1),
(32, 4, 'The activity has captures students interest and has provoked their enthusiasm.', 1),
(33, 4, 'The activity is something to look forward to.', 1),
(34, 4, 'The activity has provided me an opportunity to mingle with others students and consequently boost my social aspect. ', 1),
(35, 4, 'The activity started and finished on time.', 1),
(36, 4, 'The activity was relevant for me as a student.', 1),
(37, 4, 'I was generally satisfied with all aspects of the activity.', 1),
(38, 4, 'My expectations were met.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_type`
--

CREATE TABLE `evaluation_type` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_type`
--

INSERT INTO `evaluation_type` (`id`, `type`) VALUES
(1, 'DSA'),
(2, 'Guidance Councilor');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `Date` varchar(250) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `type` varchar(200) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `title`, `description`, `Date`, `start_time`, `end_time`, `venue`, `type`, `Timestamp`, `reservation_id`) VALUES
(42, 'Ethical Hacking Seminars', 'Teaching the Good Ethics innovation', '2019-11-21', '08:00:00', '10:00:00', 'Mo.Ignacian Gymnasium', 'BSIT Only', '2019-10-27 11:18:10', 22),
(43, 'Web Development Seminar', 'Web Development Seminar ', '2019-11-20', '08:00:00', '11:00:00', 'Mo.Ignacian Gymnasium', 'BSIT Only', '2019-10-28 09:08:30', 26);

-- --------------------------------------------------------

--
-- Table structure for table `event_absent`
--

CREATE TABLE `event_absent` (
  `absent_id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_absent`
--

INSERT INTO `event_absent` (`absent_id`, `stud_id`, `event_id`) VALUES
(1, 'C15-0129', 43),
(2, 'C16-0020', 43),
(3, 'C15-0276', 43),
(4, 'C15-0300', 43),
(5, 'C15-0238', 43),
(6, 'C16-0009', 43),
(7, 'C15-0276', 43),
(8, 'C15-0300', 43),
(9, 'C15-0238', 43),
(10, 'C16-0009', 43);

-- --------------------------------------------------------

--
-- Table structure for table `event_attendance`
--

CREATE TABLE `event_attendance` (
  `eatt_id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_attendance`
--

INSERT INTO `event_attendance` (`eatt_id`, `stud_id`, `password`, `event_id`, `status`, `Timestamp`) VALUES
(1, 'C15-0341', 'abao', 43, 'Present', '2019-10-28 09:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `ID_Number` varchar(52) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Contact_no` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `ID_Number`, `firstname`, `middlename`, `lastname`, `Address`, `Contact_no`, `Type`) VALUES
(9, 'CKC-0231', 'Lea Jean', 'Q', 'Bacus', 'Gingoog City', '0905325251', 'Faculty'),
(10, 'CKC-0234', 'Jeric', 'E', 'Madelo', 'Gingoog City', '0902545488', 'Program Dean');

-- --------------------------------------------------------

--
-- Table structure for table `post_event`
--

CREATE TABLE `post_event` (
  `post_id` int(11) NOT NULL,
  `event_ID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `Account_ID` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_event`
--

INSERT INTO `post_event` (`post_id`, `event_ID`, `message`, `Account_ID`, `timestamp`) VALUES
(3, 41, 'Good Day CKCians, TO tall IT students You are encouraged to join this event', 'CKC-0112', '2019-10-27 10:23:31'),
(4, 43, 'Hello there CKCians We are encourageto enjoy in this event.', 'CKC-0112', '2019-10-28 09:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `qus_type_ID` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`qus_type_ID`, `type`) VALUES
(1, 'Content'),
(2, 'Design'),
(3, 'Facilatator'),
(4, 'Activity_Result');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `room_id`, `member_id`, `description`, `start_time`, `end_time`, `start_date`, `end_date`, `status`, `timestamp`) VALUES
(26, 1, 9, 'Web development seminar', '08:00:00', '11:00:00', '2019-10-23', '2019-10-26', 'Approved', '2019-10-28 09:06:05'),
(27, 1, 10, 'Business week preperation', '08:00:00', '11:00:00', '2019-10-16', '2019-10-19', 'Approved', '2019-10-29 11:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_ID`, `name`) VALUES
(1, 'Mo.Ignacian Gymnasium'),
(2, 'Review Center'),
(3, 'AVR'),
(4, 'Computer Lab'),
(5, 'Nursing Lab');

-- --------------------------------------------------------

--
-- Table structure for table `studentevent_evaluation`
--

CREATE TABLE `studentevent_evaluation` (
  `id` int(11) NOT NULL,
  `stud_id` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `questionaire_id` int(11) NOT NULL,
  `Eval_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentevent_evaluation`
--

INSERT INTO `studentevent_evaluation` (`id`, `stud_id`, `event_id`, `answer_id`, `questionaire_id`, `Eval_type_id`) VALUES
(1, 'C15-0341', 43, 5, 6, 2),
(2, 'C15-0341', 43, 4, 11, 2),
(3, 'C15-0341', 43, 3, 2, 2),
(4, 'C15-0341', 43, 2, 7, 2),
(5, 'C15-0341', 43, 2, 12, 2),
(6, 'C15-0341', 43, 3, 3, 2),
(7, 'C15-0341', 43, 3, 8, 2),
(8, 'C15-0341', 43, 4, 13, 2),
(9, 'C15-0341', 43, 4, 14, 2),
(10, 'C15-0341', 43, 4, 4, 2),
(11, 'C15-0341', 43, 5, 9, 2),
(12, 'C15-0341', 43, 4, 15, 2),
(13, 'C15-0341', 43, 3, 16, 2),
(14, 'C15-0341', 43, 5, 17, 1),
(15, 'C15-0341', 43, 4, 18, 1),
(16, 'C15-0341', 43, 3, 19, 1),
(17, 'C15-0341', 43, 2, 20, 1),
(18, 'C15-0341', 43, 2, 21, 1),
(19, 'C15-0341', 43, 3, 22, 1),
(20, 'C15-0341', 43, 4, 23, 1),
(21, 'C15-0341', 43, 5, 24, 1),
(22, 'C15-0341', 43, 4, 25, 1),
(23, 'C15-0341', 43, 4, 26, 1),
(24, 'C15-0341', 43, 3, 27, 1),
(25, 'C15-0341', 43, 4, 28, 1),
(26, 'C15-0341', 43, 4, 29, 1),
(27, 'C15-0341', 43, 4, 30, 1),
(28, 'C15-0341', 43, 3, 31, 1),
(29, 'C15-0341', 43, 5, 32, 1),
(30, 'C15-0341', 43, 4, 33, 1),
(31, 'C15-0341', 43, 3, 34, 1),
(32, 'C15-0341', 43, 4, 35, 1),
(33, 'C15-0341', 43, 4, 36, 1),
(34, 'C15-0341', 43, 5, 37, 1),
(35, 'C15-0341', 43, 5, 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `user_type_id` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`user_type_id`, `user_level`, `Type`) VALUES
(1, 1, 'Administrator'),
(2, 2, 'Student Administrator'),
(3, 3, 'Student'),
(4, 4, 'Reservation incharge');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `Account_ID` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`Account_ID`, `Password`, `usertype`, `Created`) VALUES
('C15-0129', 'maps', 2, '2019-10-08 06:49:47'),
('C15-0341', 'abao', 3, '2019-10-08 07:17:40'),
('C16-0020', 'agnes', 3, '2019-10-08 13:42:32'),
('CKC-0112', 'aninion', 1, '2019-10-08 06:44:54'),
('CKC-0123', 'reservation', 4, '2019-10-25 01:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `userinfo_id` int(11) NOT NULL,
  `School_ID` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `Club_name` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`userinfo_id`, `School_ID`, `fname`, `mname`, `lname`, `gender`, `course`, `year_level`, `email`, `mobile`, `Club_name`, `image`) VALUES
(3, 'CKC-0112', 'Pericles', 'G', 'Aninion', 'Male', '', '', 'periclesAninion@gmail.com', '090211515415', '', 'avatar5.png'),
(215, 'C15-0129', 'Augustin', 'C', 'Maputol', 'Male', 'BSIT', '4', 'augustincabanamaputol@gmail.com', '09273127910', 'Sports Club', ''),
(216, 'C15-0341', 'Karl Louie', '', 'Abao', 'Male', 'BSIT', '4', 'karlo@gmail.com', '09551384124', 'Sports Club', 'IMG20180208155251.jpg'),
(218, 'C16-0020', 'Byl', 'D', 'Agnes', 'Male', 'BSIT', '4', 'bylags@gmail.com', '0925151156656', 'Society & Cultural Club', ''),
(233, 'C15-0276', 'John Dranreb', 'G', 'Balangue', 'Male', 'BSIT', '4', 'pandong@gmail.com', '90511454', 'Sports Club', 'IMG_8759 - Copy.JPG'),
(234, 'C15-0300', 'Roel Nathanriel', 'D', 'Balan', 'Male', 'BSIT', '4', 'nath@gmail.com', '9.05E+11', 'Sports Club', ''),
(235, 'C15-0238', 'Brix', 'T', 'Potutan', 'Male', 'BSIT', '4', 'brixshu@gmail.com', '9151545', 'Sports Club', ''),
(236, 'C16-0009', 'Devon', 'E', 'Remegoso', 'Male', 'BSIT', '4', 'devon@gmail.com', '905515151', 'Sports Club', 'IMG20180208160743.JPG'),
(237, 'C15-0276', 'John Dranreb', 'G', 'Balangue', 'Male', 'BSIT', '4', 'pandong@gmail.com', '90511454', 'Sports Club', 'IMG_8759 - Copy.JPG'),
(238, 'C15-0300', 'Roel Nathanriel', 'D', 'Balan', 'Male', 'BSIT', '4', 'nath@gmail.com', '9.05E+11', 'Sports Club', ''),
(239, 'C15-0238', 'Brix', 'T', 'Potutan', 'Male', 'BSIT', '4', 'brixshu@gmail.com', '9151545', 'Sports Club', ''),
(240, 'C16-0009', 'Devon', 'E', 'Remegoso', 'Male', 'BSIT', '4', 'devon@gmail.com', '905515151', 'Sports Club', 'IMG20180208160743.JPG'),
(241, 'CKC-0123', 'Bookingss', 'D', 'Reservation', 'Female', '', '', 'reservation@gmail.com', '090512115', '', 'avatar2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluation_answer_choice`
--
ALTER TABLE `evaluation_answer_choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_questionaire`
--
ALTER TABLE `evaluation_questionaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_type`
--
ALTER TABLE `evaluation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_absent`
--
ALTER TABLE `event_absent`
  ADD PRIMARY KEY (`absent_id`);

--
-- Indexes for table `event_attendance`
--
ALTER TABLE `event_attendance`
  ADD PRIMARY KEY (`eatt_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `post_event`
--
ALTER TABLE `post_event`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`qus_type_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_ID`);

--
-- Indexes for table `studentevent_evaluation`
--
ALTER TABLE `studentevent_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`userinfo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation_answer_choice`
--
ALTER TABLE `evaluation_answer_choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evaluation_questionaire`
--
ALTER TABLE `evaluation_questionaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `evaluation_type`
--
ALTER TABLE `evaluation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `event_absent`
--
ALTER TABLE `event_absent`
  MODIFY `absent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_attendance`
--
ALTER TABLE `event_attendance`
  MODIFY `eatt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post_event`
--
ALTER TABLE `post_event`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `qus_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentevent_evaluation`
--
ALTER TABLE `studentevent_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `userinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
