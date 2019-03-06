-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 03:24 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manit_forum_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email_ID` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email_ID`, `Password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `Branch_ID` varchar(10) NOT NULL,
  `Branch_Name` varchar(50) NOT NULL,
  `Dept_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`Branch_ID`, `Branch_Name`, `Dept_ID`) VALUES
('BCS115', 'B.Tech (Comptuer Science)', 'CS104'),
('BEC118', 'B.Tech (Electronics & Communication Engineering)', 'EC106'),
('BEE109', 'B.Tech (Electrical Engineering)', 'EL105'),
('BME124', 'B.Tech (Mechanical Engineering)', 'ME107'),
('BMM108', 'B.Tech (Materials and Metallurgical Engineering)', 'MT108'),
('MAC113', 'M.Tech (Advance Computing)', 'CS104'),
('MBA107', 'MBA', 'MS115'),
('MBI101', 'M.Tech (Bio-Informatics)', 'MA101'),
('MBT106', 'M.Tech (Bio Technology)', 'BS110'),
('MCA103', 'MCA', 'MA101'),
('MCB102', 'M.Tech (Computational Systems Biology)', 'MA101'),
('MCN112', 'M.Tech (Computer Networking)', 'CS104'),
('MDC116', 'M.Tech (Digital Communication)', 'EC106'),
('MED111', 'M.Tech (Electical Drives)', 'EL105'),
('MEM121', 'M.Tech (Engineering Materials)', 'ME107'),
('MGT105', 'M.Tech (Green Technology)', 'EG109'),
('MID119', 'M.Tech (Industrial Design)', 'ME107'),
('MIS114', 'M.Tech (Inormation Security)', 'CS104'),
('MME120', 'M.Tech (Maintainance Engineering)', 'ME107'),
('MPS110', 'M.Tech.(Power Systems)', 'EL105'),
('MRE104', 'M.Tech (Renewable Energy)', 'EG109'),
('MSV122', 'M.Tech (Stress and Vibration Analysis)', 'ME107'),
('MTE123', 'M.Tech (Thermal Engineering)', 'ME107'),
('MVL117', 'M.Tech (VLSI)', 'EC106');

-- --------------------------------------------------------

--
-- Table structure for table `buy_sell_item`
--

CREATE TABLE `buy_sell_item` (
  `Item_ID` int(10) NOT NULL,
  `Item_Title` varchar(100) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buy_sell_item_comment`
--

CREATE TABLE `buy_sell_item_comment` (
  `Comment_ID` int(10) NOT NULL,
  `Item_ID` int(10) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_ID` varchar(10) NOT NULL,
  `Dept_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_ID`, `Dept_Name`) VALUES
('AR111', 'Architecture & Planning'),
('BS110', 'Biological Science & Engineering'),
('CE102', 'Civil Engineering'),
('CH103', 'Chemical Engineering'),
('CH113', 'Chemistry'),
('CS104', 'Computer Science & Engineering'),
('EC106', 'Electronics & Communication Engineering'),
('EG109', 'Energy'),
('EL105', 'Electrical Engineering'),
('HM114', 'Humanities'),
('MA101', 'Mathematics & Computer Applications'),
('ME107', 'Mechanical Engineering'),
('MS115', 'Management Studies'),
('MT108', 'Material Science & Metallurgical Engineering'),
('PH112', 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Faculty_ID` varchar(10) NOT NULL,
  `Faculty_Name` varchar(50) NOT NULL,
  `Dept_ID` varchar(10) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `Mobile_No` int(10) NOT NULL,
  `Email_ID` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Faculty_ID`, `Faculty_Name`, `Dept_ID`, `Designation`, `Mobile_No`, `Email_ID`, `Password`, `Address`) VALUES
('F101', 'Sanjay Sharma', 'MA101', 'Professor', 1234569548, 'sanjay@gmail.com', '12345', ''),
('F102', 'Sujoy Das', 'MA101', 'Associate Professor', 1234569548, 'sujoy@gmail.com', '12345', ''),
('F103', 'Amit Bhagat', 'MA101', 'Assistant Professor', 1234569548, 'amit@gmail.com', '12345', ''),
('F104', 'ABCD', 'CS104', 'Professor', 1234567890, 'abcd@gmail.com', '12345', ''),
('F200', 'Rahul', 'CS104', 'Professor', 2147483647, 'rahul@gmail.com', 'asdfghjkl', '');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `Link_ID` int(10) NOT NULL,
  `Link_Path` varchar(1000) NOT NULL,
  `Link_Title` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`Link_ID`, `Link_Path`, `Link_Title`, `Date`) VALUES
(1, 'http://www.manit.ac.in/', 'Manit Homepage', '2018-04-02'),
(2, 'http://www.manit.ac.in/holiday', 'Manit Holidays', '2018-04-02'),
(3, 'http://www.manit.ac.in/admission-section', 'Admission Section', '2018-04-02'),
(4, 'http://www.manit.ac.in/content/%E0%A4%90-%E0%A4%B8%E0%A5%87-%E0%A4%90%E0%A4%A8%E0%A4%95', 'Manit Cultural Club ', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `lost_found`
--

CREATE TABLE `lost_found` (
  `Lost_Found_ID` bigint(10) NOT NULL,
  `Lost_Found_Title` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost_found`
--

INSERT INTO `lost_found` (`Lost_Found_ID`, `Lost_Found_Title`, `Description`, `Email`, `Type`, `Status`, `Date`) VALUES
(1, 'Watch', 'I am Hari Shankar Bhatt , student of MCA. I have lost my watch near SBI ATM, \r\nDetails of Watch -\r\n1. Silver Color.\r\n2. Brand - Titan.\r\n\r\nthe watch looked new.\r\n\r\nWhoever finds it, please contact me. \r\n\r\nThanks. ', 'hari@gmail.com', 'lost', 1, '2018-04-03 10:12:40'),
(2, 'Wallet', 'I have found a black leather wallet near Susangat. \r\n\r\nIf you are the owner of the wallet, please contact me, with accurate details of its content.', 'hari@gmail.com', 'found', 0, '2018-04-03 10:17:23'),
(3, 'Umbrella', 'I have lost my black Umbrella, I had left it the lab in the morning on 2nd April and wasn''t able to locate it then.\r\n\r\nPlease if anyone finds it, contact me.', 'shivani@gmail.com', 'lost', 0, '2018-04-03 11:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `lost_found_comment`
--

CREATE TABLE `lost_found_comment` (
  `Comment_ID` bigint(10) NOT NULL,
  `Lost_Found_ID` bigint(10) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost_found_comment`
--

INSERT INTO `lost_found_comment` (`Comment_ID`, `Lost_Found_ID`, `Comment`, `Email`, `Date`) VALUES
(1, 2, 'Does it have a red green stripe running on the back ?', 'satish@gmail.com', '2018-04-03 10:23:27'),
(2, 1, 'Yeah, I have found the watch, and have it with me.  Please contact me. ', 'satish@gmail.com', '2018-04-03 11:38:31'),
(3, 1, 'Thank you bhai. You are a life saver. ', 'hari@gmail.com', '2018-04-03 11:38:48'),
(4, 3, 'I think I have found that it was in last seat of the lab. Please contact me. ', 'charu@gmail.com', '2018-04-03 11:52:47'),
(5, 3, 'Thank you soooooo much. :-) :-)', 'shivani@gmail.com', '2018-04-03 11:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `Notice_ID` int(10) NOT NULL,
  `Notice_Path` varchar(1000) NOT NULL,
  `Notice_Title` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`Notice_ID`, `Notice_Path`, `Notice_Title`, `Date`) VALUES
(11, 'uploads/Anti ragging Help line 2017-18 (1).pdf', 'MANIT Anti Ragging Help Line No.', '2018-04-02'),
(12, 'uploads/HOSTEL_ALLOTMENT.pdf', 'Application for Hostel Allotment ', '2018-04-02'),
(13, 'uploads/Mess_Charge.pdf', 'Mess Charges for 1st year B.Tech/B.Arch Students', '2018-04-02'),
(14, 'uploads/N.jpg', 'New Notice', '2018-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `placed`
--

CREATE TABLE `placed` (
  `Placed_ID` int(8) NOT NULL,
  `Branch_ID` varchar(10) NOT NULL,
  `Student_Name` varchar(40) NOT NULL,
  `Company_Name` varchar(50) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placed`
--

INSERT INTO `placed` (`Placed_ID`, `Branch_ID`, `Student_Name`, `Company_Name`, `Year`) VALUES
(65, 'BCS115', ' Aditya Singhal', ' INFOSYS Limited', 2016),
(66, 'BCS115', ' Arzoo Jain', ' INFOSYS Limited', 2016),
(67, 'BCS115', ' Deeksha Sidana', ' INFOSYS Limited', 2016),
(68, 'BCS115', ' Gurkirpal Singh Brar', ' Wipro', 2016),
(69, 'BEC118', ' Jatin Chandna', ' Wipro', 2016),
(70, 'BEC118', ' Labhpreet Singh', ' Wipro', 2016),
(71, 'BEC118', ' Surbhi Anand', ' IBM', 2016),
(72, 'BEE109', ' Hikil Attri', ' Havels', 2016),
(73, 'BEE109', ' Jaskaran Singh', ' Havels', 2016),
(74, 'BEE109', ' Abhinav Chaudhary', ' Syska', 2016),
(75, 'BME124', ' Akhil Goyal', ' Honda', 2016),
(76, 'BME124', ' Amuldeep Singh Sootdhar', ' Honda', 2016),
(77, 'BME124', ' Gagan Kullar', ' Honda', 2016),
(78, 'BME124', ' Gaurav Budhiraja', ' Maruti', 2016),
(79, 'MCN112', ' Gautam Taneja', ' Satish Soft', 2016),
(80, 'MCN112', ' Jagpal Singh', ' Satish Soft', 2016),
(81, 'MCN112', ' Lakshay Bindra', ' Satish Soft', 2016),
(82, 'MDC116', ' Lovepreet Singh', ' Hari Robotics', 2016),
(83, 'MDC116', ' Nikhil Goyal', ' Hari Robotics', 2016),
(84, 'MDC116', ' Prabhdeep Singh Gujral', ' Hari Robotics', 2016),
(85, 'MED111', ' Rahul Preet Singh', ' Havels', 2016),
(86, 'MED111', ' Rinkle Kumar', ' Havels', 2016),
(87, 'MED111', ' Rishabh Koul', ' Havels', 2016),
(88, 'MEM121', ' Rohit Goyal', ' Maruti', 2016),
(89, 'MEM121', ' Sahil Malhotra', ' Maruti', 2016),
(90, 'MEM121', ' Shubham Khera', ' Honda', 2016),
(91, 'MCA103', ' Satish Kumar Singh', ' Amazon', 2016),
(92, 'MCA103', ' Alok Batham', ' Amazon', 2016),
(93, 'MCA103', ' Hari Shankar Bhatt', ' Adobe', 2016),
(94, 'MBA107', ' Abhishek Bhattacharya', ' HDFC', 2016),
(95, 'MBA107', ' Malvin Jose', ' HDFC', 2016),
(97, 'BCS115', ' Gurjap Singh', ' INFOSYS Limited', 2017),
(98, 'BCS115', ' Harmeet Singh', ' INFOSYS Limited', 2017),
(99, 'BCS115', ' Jaideep Singh Malhotra', ' INFOSYS Limited', 2017),
(100, 'BCS115', ' Karandeep Singh Makkar', ' Wipro', 2017),
(101, 'BEC118', ' Lucky Rampal', ' Wipro', 2017),
(102, 'BEC118', ' Parth Gaur', ' Wipro', 2017),
(103, 'BEC118', ' Shanu', ' IBM', 2017),
(104, 'BEE109', ' Shivam Gupta', ' Havels', 2017),
(105, 'BEE109', ' Damandeep Singh', ' Havels', 2017),
(106, 'BEE109', ' Abhinay Kumar', ' Syska', 2017),
(107, 'BME124', ' Aryan', ' Honda', 2017),
(108, 'BME124', ' Harleen Kaur', ' Honda', 2017),
(109, 'BME124', ' Harmanpreet Singh Saini', ' Honda', 2017),
(110, 'BME124', ' Rachit Kohli', ' Maruti', 2017),
(111, 'MCN112', ' Satbir Singh', ' Satish Soft', 2017),
(112, 'MCN112', ' Tanshikha Mudhar', ' Satish Soft', 2017),
(113, 'MCN112', ' Gaurav Singla', ' Satish Soft', 2017),
(114, 'MDC116', ' Pushkar Kumar', ' Hari Robotics', 2017),
(115, 'MDC116', ' Avneet Kaur', ' Hari Robotics', 2017),
(116, 'MDC116', ' Bhavna Kaur', ' Hari Robotics', 2017),
(117, 'MED111', ' Dixita Sharma', ' Havels', 2017),
(118, 'MED111', ' Jaskaran Singh', ' Havels', 2017),
(119, 'MED111', ' Kartik Bansal', ' Havels', 2017),
(120, 'MEM121', ' Vineet Bajaj', ' Maruti', 2017),
(121, 'MEM121', ' Raghav Goel', ' Maruti', 2017),
(122, 'MEM121', ' Amarjeet Singh Kapoor', ' Honda', 2017),
(123, 'MCA103', ' Anandita Jain', ' Amazon', 2017),
(124, 'MCA103', ' Anchal Puri', ' Amazon', 2017),
(126, 'MBA107', ' Bhavika Sehgal', ' HDFC', 2017),
(127, 'MBA107', ' Chiranjeev Singh', ' HDFC', 2017),
(128, 'MBA107', ' Deepak Bansal', ' Dena Bank', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `placement_review`
--

CREATE TABLE `placement_review` (
  `Placement_Review_ID` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Review_Title` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement_review`
--

INSERT INTO `placement_review` (`Placement_Review_ID`, `Email`, `Review_Title`, `Description`, `Date`) VALUES
(2, 'satish@gmail.com', 'Amazon Interview Experience [SDE-I]', 'Round 1:Written Round had 3 questions:-<br>\r\n1- Sum of two linked lists https://www.geeksforgeeks.org/sum-of-two-linked-lists/<br>\r\n<br>\r\nRound 2: DS algo <br>\r\n1-Find pair with given sum in bst<br>\r\n2-Transpose of the matrix<br>\r\n<br>\r\nRound 3: problem solving<br>\r\n1-Find top view of binary tree (Iterative approach)<br>\r\n2nd question was on matrix donâ€™t remember exactly<br>\r\n<br>\r\nRound 4: HR round<br>\r\nQuestion on Amazon leadership principle. Why leaving current company. Question on tasks handled. Behavior based questions around amazon leadership principle<br>\r\n<br>\r\nRound 5 : Designing round<br>\r\n1- Design a chess game. Form a structure of gamePlan.<br><br>', '2018-04-03 10:34:13'),
(3, 'hari@gmail.com', 'Adobe interview experience', 'I was interviewed at Adobe office, Noida for Senior Software Developer role in March 2018.<br>\r\n<br>\r\nRound 1:<br>\r\nDiscussion on current work and projects mentioned in the resume<br>\r\nGiven an array of n-2 elements. The range of elements is n and 2 elements are missing. Find them and write a code for the same<br>\r\n<br>\r\nRound 2:<br>\r\nWhat are process and thread. Difference between the two.<br>\r\nPage faults<br>\r\nScheduling algorithms and their drawback<br>\r\nHashmap and its implementation. What is collision and what are collision resolution techniques.<br>\r\nGarbage collection.. discussion on how can u implement gc<br>\r\nDesign a data structure for fm radio with following two methods:-<br>\r\n<br>\r\nPlay method that takes bandwidth and song name<br>\r\nMost popular song method tells the song played most number of times<br>\r\nOnly approach was discussed no code<br>\r\n<br>\r\n <br>\r\n<br>\r\nRound 3.<br>\r\nCurrent work and tools in which I was involved<br>\r\nMost complex bug<br>\r\nChallenges faced in work', '2018-04-03 10:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `placement_review_comment`
--

CREATE TABLE `placement_review_comment` (
  `Comment_ID` int(10) NOT NULL,
  `Placement_Review_ID` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement_review_comment`
--

INSERT INTO `placement_review_comment` (`Comment_ID`, `Placement_Review_ID`, `Email`, `Comment`, `Date`) VALUES
(1, 2, 'hari@gmail.com', 'Thanks for the review Satish.', '2018-04-03 10:43:27'),
(2, 3, 'satish@gmail.com', 'Thanks for the review Hari, Adobe is a good company.. :)', '2018-04-03 10:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `profileimages`
--

CREATE TABLE `profileimages` (
  `Email` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileimages`
--

INSERT INTO `profileimages` (`Email`, `image`) VALUES
('abhishekrajput676@gmail.com', 'sign.jpg'),
('hari@gmail.com', 'pic1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` varchar(10) NOT NULL,
  `Student_Name` varchar(30) NOT NULL,
  `Branch_ID` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Mobile_No` bigint(10) NOT NULL,
  `Email_ID` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Student_Name`, `Branch_ID`, `DOB`, `Mobile_No`, `Email_ID`, `Password`, `Semester`) VALUES
('162120002', 'Khusbu Yadav', 'MCA103', '1995-04-01', 1234567890, 'khusbu@gmail.com', '12345', 4),
('162120008', 'Charu Kale', 'MCA103', '1995-04-01', 123456789, 'charu@gmail.com', '12345', 4),
('16212001', 'Shivani Jain', 'MCA103', '1995-11-01', 1234656789, 'shivani@gmail.com', '12345', 4),
('162120023', 'Satish Kumar Singh', 'MCA103', '1994-03-27', 1234569548, 'satish@gmail.com', '12345', 4),
('162120085', 'Alok Batham', 'MCA103', '1996-04-04', 2147483647, 'alok@gmail.com', '12345', 4),
('17212003', 'Abhishek Rajput', 'MCA103', '1996-08-06', 7770974841, 'Abhishekrajput676@gmail.com', '12345', 3);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `Thread_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Thread_Title` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`Thread_ID`, `Email`, `Thread_Title`, `Description`, `Date`) VALUES
(7, 'satish@gmail.com', 'Welcome to Manit Forum', 'Hello, enjoy your stay here. :)', '2018-04-02 15:09:07'),
(9, 'hari@gmail.com', 'Friends, what are you views of this year''s Maffick?', 'I loved this year''s Maffick, couldn''t be much better. Give your 2 cents guys !!', '2018-04-02 16:23:29'),
(10, 'shivani@gmail.com', 'Isn''t this too hot to be March?', 'This year is too hot isn''t friends ?', '2018-04-02 16:28:01'),
(11, 'charu@gmail.com', 'Friends, what would be your suggestions to improve Manit Campus ?', 'I personally think, that better roads be the given priority. ', '2018-04-02 16:32:12'),
(12, 'satish@gmail.com', 'So, Guys, how is your preparation going for ''futsal'' tournament?', 'I am really ecstatic for the tournament. I am playing football daily for 2 hours.  ', '2018-04-02 16:38:46'),
(15, 'khusbu@gmail.com', 'Guys are you going home in summer vacation or staying her and preparing for the placement ?', 'I am going home, I don''t like it here in summer. Its too hot to handle. ', '2018-04-03 11:13:06'),
(16, 'hari@gmail.com', 'New Thread', 'I''m trying to create a new thread.', '2018-10-01 16:41:33'),
(17, 'abhishekrajput676@gmail.com', 'Something new', 'YYYYYYY', '2018-10-01 17:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `thread_comments`
--

CREATE TABLE `thread_comments` (
  `Comment_ID` int(11) NOT NULL,
  `Thread_ID` int(8) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comment` varchar(300) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread_comments`
--

INSERT INTO `thread_comments` (`Comment_ID`, `Thread_ID`, `Email`, `Comment`, `Date`) VALUES
(8, 7, 'satish.singh5683@gmail.com', 'I am loving this site. ', '2018-04-02 15:09:27'),
(9, 7, 'hari@gmail.com', 'This is really a lovely site.', '2018-04-02 15:09:56'),
(10, 7, 'hari@gmail.com', 'hello', '2018-04-02 15:25:25'),
(11, 9, '', 'It was lovely.', '2018-04-02 20:46:43'),
(12, 9, '', 'It was lovely.', '2018-04-02 20:47:36'),
(13, 12, 'hari@gmail.com', 'we are working very hard. :)', '2018-04-02 23:58:38'),
(14, 12, 'satish@gmail.com', 'let''s hope things work our way :)', '2018-04-02 23:59:17'),
(15, 12, 'satish@gmail.com', 'nice', '2018-04-03 00:06:33'),
(24, 10, 'satish@gmail.com', 'Yeah, I too think so', '2018-04-03 03:29:06'),
(26, 15, 'charu@gmail.com', 'Yeah, I too am going home. Can''t stay here.', '2018-04-03 11:13:49'),
(27, 15, 'hari@gmail.com', 'I am not going home.', '2018-10-01 16:04:41'),
(28, 15, 'hari@gmail.com', '                    ok bro  ', '2018-10-01 16:38:01'),
(29, 15, 'hari@gmail.com', '                    ok bro  ', '2018-10-01 16:38:09'),
(30, 16, 'hari@gmail.com', 'ok.. so i have succesfully created a new thread.\r\nNow this is my first comment.', '2018-10-01 16:42:43'),
(31, 17, 'abhishekrajput676@gmail.com', 'jfmnrjnier genr ge gl\r\n', '2018-10-01 17:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_event`
--

CREATE TABLE `upcoming_event` (
  `Event_ID` int(10) NOT NULL,
  `Event_Title` varchar(500) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcoming_event`
--

INSERT INTO `upcoming_event` (`Event_ID`, `Event_Title`, `Date`) VALUES
(1, 'Short Term Training Program On Information Security & Digital Forensics (ISDF 2018) (under ISEA-II) (16-20 April 2018)', '2018-04-02'),
(3, 'Time Table for Extra Class Schedule', '2018-04-02'),
(4, 'Walk-in-Interview for Selection of Medical Officer and Security Officer (Both on Contract Basis)', '2018-04-02'),
(5, 'Provisional list of Eligible and Ineligible (Not-Eligible) Candidates for the Post of Associate Professor (AGP-9500)', '2018-04-02'),
(6, 'Recruitment for Guest Faculty and Lab Engineer - on contract basis under SMDP-C2SD at MANIT', '2018-04-02'),
(7, 'Recruitment for Guest Faculty and Lab Engineer - on contract basis under SMDP-C2SD at MANIT', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `yearly_eligible_students`
--

CREATE TABLE `yearly_eligible_students` (
  `Branch_ID` varchar(10) NOT NULL,
  `Year` int(4) NOT NULL,
  `Total_Students` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearly_eligible_students`
--

INSERT INTO `yearly_eligible_students` (`Branch_ID`, `Year`, `Total_Students`) VALUES
('BCS115', 2016, 10),
('BCS115', 2017, 11),
('BEC118', 2016, 8),
('BEC118', 2017, 9),
('BEE109', 2016, 7),
('BEE109', 2017, 10),
('BME124', 2016, 9),
('BME124', 2017, 10),
('MBA107', 2016, 9),
('MBA107', 2017, 9),
('MCA103', 2016, 8),
('MCA103', 2017, 9),
('MCN112', 2016, 6),
('MCN112', 2017, 8),
('MDC116', 2016, 8),
('MDC116', 2017, 8),
('MED111', 2016, 9),
('MED111', 2017, 8),
('MEM121', 2016, 10),
('MEM121', 2017, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email_ID`),
  ADD KEY `Email_ID` (`Email_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`Branch_ID`),
  ADD KEY `Dept_ID` (`Dept_ID`);

--
-- Indexes for table `buy_sell_item`
--
ALTER TABLE `buy_sell_item`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `buy_sell_item_comment`
--
ALTER TABLE `buy_sell_item_comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Faculty_ID`),
  ADD KEY `Dept_ID` (`Dept_ID`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`Link_ID`);

--
-- Indexes for table `lost_found`
--
ALTER TABLE `lost_found`
  ADD PRIMARY KEY (`Lost_Found_ID`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Lost_Found_ID` (`Lost_Found_ID`);

--
-- Indexes for table `lost_found_comment`
--
ALTER TABLE `lost_found_comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Lost_Found_ID` (`Lost_Found_ID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`Notice_ID`);

--
-- Indexes for table `placed`
--
ALTER TABLE `placed`
  ADD PRIMARY KEY (`Placed_ID`);

--
-- Indexes for table `placement_review`
--
ALTER TABLE `placement_review`
  ADD PRIMARY KEY (`Placement_Review_ID`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Placement_Review_ID` (`Placement_Review_ID`);

--
-- Indexes for table `placement_review_comment`
--
ALTER TABLE `placement_review_comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Placement_Review_ID` (`Placement_Review_ID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `profileimages`
--
ALTER TABLE `profileimages`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `Email_ID` (`Email_ID`),
  ADD KEY `Branch_ID` (`Branch_ID`),
  ADD KEY `Email_ID_2` (`Email_ID`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`Thread_ID`);

--
-- Indexes for table `thread_comments`
--
ALTER TABLE `thread_comments`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexes for table `yearly_eligible_students`
--
ALTER TABLE `yearly_eligible_students`
  ADD PRIMARY KEY (`Branch_ID`,`Year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy_sell_item`
--
ALTER TABLE `buy_sell_item`
  MODIFY `Item_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buy_sell_item_comment`
--
ALTER TABLE `buy_sell_item_comment`
  MODIFY `Comment_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `Link_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `Lost_Found_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lost_found_comment`
--
ALTER TABLE `lost_found_comment`
  MODIFY `Comment_ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `Notice_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `placed`
--
ALTER TABLE `placed`
  MODIFY `Placed_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `placement_review`
--
ALTER TABLE `placement_review`
  MODIFY `Placement_Review_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `placement_review_comment`
--
ALTER TABLE `placement_review_comment`
  MODIFY `Comment_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `Thread_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `thread_comments`
--
ALTER TABLE `thread_comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `upcoming_event`
--
ALTER TABLE `upcoming_event`
  MODIFY `Event_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`Dept_ID`) REFERENCES `department` (`Dept_ID`);

--
-- Constraints for table `buy_sell_item`
--
ALTER TABLE `buy_sell_item`
  ADD CONSTRAINT `buysOrsells` FOREIGN KEY (`Email`) REFERENCES `student` (`Email_ID`);

--
-- Constraints for table `buy_sell_item_comment`
--
ALTER TABLE `buy_sell_item_comment`
  ADD CONSTRAINT `Comments` FOREIGN KEY (`Email`) REFERENCES `student` (`Email_ID`),
  ADD CONSTRAINT `Has` FOREIGN KEY (`Item_ID`) REFERENCES `buy_sell_item` (`Item_ID`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `works in` FOREIGN KEY (`Dept_ID`) REFERENCES `department` (`Dept_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`Branch_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
