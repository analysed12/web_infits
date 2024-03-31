-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 04:16 PM
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
-- Database: `u991535966_shared_infits`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitygoals`
--

CREATE TABLE `activitygoals` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `goal` float NOT NULL,
  `categories` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activitytracker`
--

CREATE TABLE `activitytracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(20) NOT NULL,
  `distance` decimal(10,0) DEFAULT NULL,
  `calories` decimal(10,0) DEFAULT NULL,
  `runtime` decimal(10,0) DEFAULT NULL,
  `goal` int(11) NOT NULL,
  `date` date NOT NULL,
  `categories` varchar(20) NOT NULL,
  `heart_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addclient`
--

CREATE TABLE `addclient` (
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(30) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `profile` text NOT NULL,
  `p_p` varchar(255) NOT NULL DEFAULT 'user-default.png',
  `name` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `age` varchar(3) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `about` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `client_code` varchar(150) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addclient`
--

INSERT INTO `addclient` (`dietitian_id`, `dietitianuserID`, `client_id`, `clientuserID`, `profile`, `p_p`, `name`, `gender`, `email`, `phone`, `age`, `height`, `weight`, `about`, `plan_id`, `status`, `client_code`, `location`, `last_seen`) VALUES
(1, 'infitsWebTeam', 4, 'testuser', '', '', 'test user 1', '', 'testuser@gmail.com', '9988552233', 'nul', 'null', 'null', 'testuser@gmail.com', 34, 0, '', 'null', '2023-06-14 16:52:45'),
(1, 'infitsWebTeam', 6, 'testuser2', '', '', 'test user 2', 'M', 'testuser2@gmail.com', '19576582', '24', '5\'7', '64', 'something', 36, 1, '', 'null', '2023-08-30 16:54:55'),
(1, 'infitsWebTeam', 11, '', '', '', 'Cherry', 'F', 'cherry000@gmail.com', '7444818460', '25', '6\'2', '85', 'god girl', 3, 1, '', 'Bombay', '2024-02-05 21:18:09'),
(1, 'infitsWebTeam', 33, 'Rajat_3030', '', 'user-default.png', 'Rajat_3035', 'F', '2111393@gmail.com', '7666832783', '25', '5\'9', '65', 'GOD', 36, 1, ' ', 'Pune', '2024-03-19 21:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `calorietracker`
--

CREATE TABLE `calorietracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `caloriesConsumed` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `meal` varchar(50) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `totalcaloriesBurn` int(11) DEFAULT NULL,
  `calorieConsumeGoal` int(11) NOT NULL,
  `calorieBurnGoal` int(11) NOT NULL,
  `carbsGoal` int(11) DEFAULT NULL,
  `fiberGoal` int(11) DEFAULT NULL,
  `proteinGoal` int(11) DEFAULT NULL,
  `fatGoal` int(11) DEFAULT NULL,
  `dateandtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calorietracker`
--

INSERT INTO `calorietracker` (`row_id`, `client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `caloriesConsumed`, `goal`, `meal`, `name`, `totalcaloriesBurn`, `calorieConsumeGoal`, `calorieBurnGoal`, `carbsGoal`, `fiberGoal`, `proteinGoal`, `fatGoal`, `dateandtime`) VALUES
(15, 4, 'testuser', 1, 'infitsWebTeam', 2210, 0, NULL, '', NULL, 2900, 3144, 156, 269, 267, 251, '2024-02-09 14:05:57'),
(16, 4, 'testuser', 1, 'infitsWebTeam', 2210, 0, NULL, '', NULL, 2900, 3144, 269, 156, 251, 267, '2024-02-10 00:10:31'),
(17, 4, 'testuser', 1, 'infitsWebTeam', 2210, 0, NULL, '', NULL, 2549, 2050, 187, 248, 207, 141, '2024-02-11 14:32:26'),
(18, 4, 'testuser', 1, 'infitsWebTeam', 2210, 0, NULL, '', NULL, 2050, 1486, 158, 154, 145, 118, '2024-02-15 10:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `calorie_burnt`
--

CREATE TABLE `calorie_burnt` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(30) NOT NULL,
  `activity_name` varchar(20) NOT NULL,
  `calorie_burnt` int(11) NOT NULL,
  `duration` time NOT NULL,
  `dateandtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calorie_burnt`
--

INSERT INTO `calorie_burnt` (`row_id`, `client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `activity_name`, `calorie_burnt`, `duration`, `dateandtime`) VALUES
(1, 4, 'testuser', 1, 'infitsWebTeam', 'running', 400, '03:12:12', '2024-02-08 17:20:26'),
(2, 4, 'testuser', 1, 'infitsWebTeam', 'running', 400, '04:58:03', '2024-02-08 18:28:03'),
(3, 4, 'testuser', 1, 'infitsWebTeam', 'running', 400, '04:58:03', '2024-02-08 18:28:03'),
(4, 4, 'testuser', 1, 'infitsWebTeam', 'walking', 400, '11:03:09', '2024-02-08 18:28:58'),
(5, 4, 'testuser', 1, 'infitsWebTeam', 'walking', 400, '11:03:09', '2024-02-08 18:28:58'),
(6, 4, 'testuser', 1, 'infitsWebTeam', 'cycling', 400, '04:58:03', '2024-02-08 18:31:32'),
(7, 4, 'testuser', 1, 'infitsWebTeam', 'cycling', 400, '04:58:03', '2024-02-08 18:31:32'),
(8, 4, 'testuser', 1, 'infitsWebTeam', 'running', 40, '00:02:00', '2024-02-09 08:32:31'),
(9, 4, 'testuser', 1, 'infitsWebTeam', 'running', 40, '00:02:00', '2024-02-09 08:32:31'),
(10, 4, 'testuser', 1, 'infitsWebTeam', 'cycling', 80, '00:05:43', '2024-02-09 08:35:42'),
(11, 4, 'testuser', 1, 'infitsWebTeam', 'cycling', 80, '00:05:43', '2024-02-09 08:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `calorie_consumed`
--

CREATE TABLE `calorie_consumed` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `meal` varchar(15) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `calorie` int(11) DEFAULT NULL,
  `protein` int(11) DEFAULT NULL,
  `fibre` int(11) DEFAULT NULL,
  `carb` int(11) DEFAULT NULL,
  `fat` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `dateandtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `from_id`, `to_id`, `message`, `opened`, `created_at`) VALUES
(1, 1, 4, 'heelo', 0, '2023-07-07 14:07:40'),
(2, 1, 4, 'hi', 0, '2023-07-07 14:07:47'),
(3, 1, 4, 'sumit here', 0, '2023-07-07 14:08:32'),
(4, 1, 4, 'Hi', 0, '2023-07-11 10:50:06'),
(5, 1, 4, 'Hi', 0, '2023-07-11 10:56:24'),
(6, 1, 4, 'h', 0, '2023-07-11 11:25:36'),
(7, 1, 4, 'hello', 0, '2023-07-11 12:52:19'),
(8, 1, 4, 'Hello sumit here', 0, '2023-07-21 08:54:29'),
(9, 1, 4, 'hi', 0, '2023-07-25 14:42:47'),
(10, 1, 4, 'hi', 0, '2023-07-27 07:28:20'),
(11, 1, 4, 'Hello', 0, '2023-11-25 21:03:00'),
(12, 1, 4, 'your name?', 0, '2024-01-16 20:44:25'),
(13, 4, 1, 'hi my name is This', 1, '2024-01-16 20:45:43'),
(14, 4, 1, 'chat is working', 1, '2024-01-16 20:47:25'),
(15, 4, 1, 'msg', 1, '2024-01-16 21:26:39'),
(16, 1, 4, 'hello divyansh', 0, '2024-01-25 08:54:51'),
(17, 1, 4, 'helloworld', 0, '2024-02-10 20:05:45'),
(18, 1, 4, 'contact', 0, '2024-02-28 17:45:53'),
(19, 1, 6, 'hi test 2', 0, '2024-03-28 20:14:45'),
(20, 1, 11, 'hi cherry', 0, '2024-03-31 19:45:24'),
(21, 1, 11, 'how are you', 0, '2024-03-31 19:45:32'),
(22, 1, 33, 'Hi GOD', 0, '2024-03-31 19:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `password` varchar(12) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `plan` varchar(30) DEFAULT NULL,
  `profilePhoto` text DEFAULT NULL,
  `p_p` varchar(255) DEFAULT 'user-default.png',
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(30) NOT NULL DEFAULT '-1',
  `gender` char(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `verification` varchar(1) DEFAULT '0',
  `verification_code` varchar(20) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `last_seen` datetime DEFAULT current_timestamp(),
  `referred_clientID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `clientuserID`, `password`, `name`, `location`, `email`, `mobile`, `plan`, `profilePhoto`, `p_p`, `dietitian_id`, `dietitianuserID`, `gender`, `age`, `verification`, `verification_code`, `height`, `weight`, `last_seen`, `referred_clientID`) VALUES
(2, 'annu', '123456789', 'annu', NULL, 'annu@gmail.com', '6397907711', NULL, NULL, 'user-default.png', -1, '-1', 'F', 25, '0', NULL, 65, 125, '2024-01-30 12:33:00', NULL),
(3, 'debarghyabasak', 'debarghya12', 'Debarghya Basak', NULL, 'debarghyayt@gmail.com', '8240787009', NULL, NULL, 'user-default.png', -1, '-1', 'M', 22, '0', NULL, 55, 172, '2024-01-29 09:16:39', NULL),
(4, 'testuser', '123', 'test user 1', NULL, 'testuser@gmail.com', '998855223355', '', NULL, 'user-default.png', 1, 'infitsWebTeam', NULL, NULL, '1', 'c5BH9DYATy', NULL, NULL, '2023-06-14 15:46:09', NULL),
(5, 'testuser2', '123', 'test user 2', NULL, NULL, NULL, NULL, NULL, 'user-default.png', 1, 'infitsWebTeam', NULL, NULL, '0', 'c5BH9DYATy', NULL, NULL, '2023-06-14 15:46:09', NULL),
(6, 'testuser3', '123', 'test user 3', NULL, NULL, NULL, NULL, NULL, 'user-default.png', 1, 'infitsWebTeam', NULL, NULL, '0', 'c5BH9DYATy', NULL, NULL, '2023-06-14 15:46:09', NULL),
(7, 'vaishali', '123456789', 'vaishali', NULL, 'vaishali@gmail.com', '6397907711', NULL, NULL, 'user-default.png', -1, '-1', 'F', 25, '0', NULL, 65, 125, '2024-01-30 12:02:22', NULL),
(11, '', '', '', NULL, '', '', '', NULL, 'user-default.png', 1, 'infitsWebTeam', '', 0, '1', NULL, 0, 0, '2024-01-30 12:01:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_forms_docs`
--

CREATE TABLE `client_forms_docs` (
  `rid` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(50) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `form_id` int(11) NOT NULL,
  `form_data` mediumtext NOT NULL,
  `docs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`docs`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_forms_docs`
--

INSERT INTO `client_forms_docs` (`rid`, `client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `form_id`, `form_data`, `docs`) VALUES
(1, 1, 'Client 1', 1, 'infitsWebTeam', 1, 'This is a dummy form', '[{\"docName\":\"stuff.pdf\",\"uploadedOn\":\"10:03:34\",\"fileSize\":\"234mb\",\"fileLink\":\"http://localhost/combined/updated_infits/updated_infits/uploads/document/stuff.pdf\"}]'),
(13, 2, 'Client 2', 1, 'infitsWebTeam', 2, 'Form data 2', '[{\"docName\":\"stuff.pdf\",\"uploadedOn\":\"10:03:34\",\"fileSize\":\"234mb\",\"fileLink\":\"http://localhost/combined/updated_infits/updated_infits/uploads/document/stuff.pdf\"}]'),
(14, 3, 'Client 3', 1, 'infitsWebTeam', 1, 'This is a dummy form', '[{\"docName\":\"stuff.pdf\",\"uploadedOn\":\"10:03:34\",\"fileSize\":\"234mb\",\"fileLink\":\"http://localhost/combined/updated_infits/updated_infits/uploads/document/stuff.pdf\"}]'),
(16, 6, 'Client 5', 1, 'infitsWebTeam', 1, 'This is a dummy form', '[{\"docName\":\"stuff.pdf\",\"uploadedOn\":\"10:03:34\",\"fileSize\":\"234mb\",\"fileLink\":\"http://localhost/combined/updated_infits/updated_infits/uploads/document/stuff.pdf\"}]'),
(27, 5, 'testuser1', 1, 'infitsWebTeam', 21, '', '[{\"docName\":\"stuff\",\"uploadedOn\":\"01:03:52\",\"fileSize\":\"234mb\",\"fileLink\":\"stuff.pdf\"}]'),
(29, 4, 'testuser', 1, 'infitsWebTeam', 24, '', NULL),
(30, 6, 'testuser2', 1, 'infitsWebTeam', 24, '', NULL),
(40, 4, 'testuser', 1, 'infitsWebTeam', 5, '', NULL),
(41, 6, 'testuser2', 1, 'infitsWebTeam', 3, '', NULL),
(42, 4, 'testuser', 1, 'infitsWebTeam', 4, '', NULL),
(43, 5, 'testuser1', 1, 'infitsWebTeam', 5, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `convo_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`conversation_id`, `user_1`, `user_2`, `convo_time`) VALUES
(1, 1, 4, '2023-07-07 14:07:40'),
(2, 1, 4, '2023-07-07 14:07:40'),
(3, 1, 4, '2023-07-07 14:07:40'),
(4, 1, 4, '2023-07-07 14:07:40'),
(5, 1, 6, '2024-03-28 20:14:45'),
(6, 1, 11, '2024-03-31 19:45:24'),
(7, 1, 33, '2024-03-31 19:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `create_event`
--

CREATE TABLE `create_event` (
  `eventID` int(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(255) DEFAULT NULL,
  `clientuserID` varchar(100) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `eventname` varchar(150) DEFAULT NULL,
  `meeting_type` varchar(100) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `place_of_meeting` varchar(150) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `attachment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_event`
--

INSERT INTO `create_event` (`eventID`, `dietitian_id`, `dietitianuserID`, `clientuserID`, `client_id`, `eventname`, `meeting_type`, `start_date`, `end_date`, `place_of_meeting`, `description`, `attachment`) VALUES
(25, 0, 'Infits Web Team', '4', 0, 'Rajat_video_call', 'Videocall', '2024-03-12 20:02:00', '2024-03-12 21:05:00', 'On Video Call', 'This is video call for 12-3', ' flutter icon.png'),
(26, 0, 'Infits Web Team', '4', 0, 'Meet with Dr. Rajat', 'In person', '2024-03-16 03:33:00', '2024-03-16 04:37:00', 'Viman nagar, Pune', 'Meet with Dr. Rajat at his pune office', ' flutter icon.png'),
(27, 0, 'Infits Web Team', '6', 0, 'Video conference with Dr. Rajdeep', 'Videocall', '2024-03-16 04:41:00', '2024-03-16 05:47:00', 'On Video Call', 'This is a video meet with dr. Rajdeep', ' flutter icon.png'),
(28, 0, 'Infits Web Team', '4', 0, 'Rajat cardiology clinic', 'In person', '2024-03-27 02:17:00', '2024-03-27 03:20:00', 'Viman nagar, Pune', 'nkjnjno', ' old_profile.jpeg'),
(29, 0, 'Infits Web Team', '6', 0, 'demo_video_call', 'Videocall', '2024-03-28 02:24:00', '2024-03-28 04:22:00', 'On Video Call', ' lkl', ' old_profile.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `create_meeting`
--

CREATE TABLE `create_meeting` (
  `dietitian_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_meeting`
--

INSERT INTO `create_meeting` (`dietitian_id`, `title`, `description`, `date`, `time`) VALUES
(1, 'Demo_today', 'for today', '2024-03-30', '22:44:00.000000'),
(1, 'demo_today_2', 'trial for today', '2024-03-30', '21:25:00.000000'),
(1, 'tomorrow_trial', 'for tomorrow', '2024-03-31', '05:18:00.000000'),
(1, 'today_3rd teial', 'time pass', '2024-03-30', '20:33:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `create_plan`
--

CREATE TABLE `create_plan` (
  `plan_id` int(11) NOT NULL,
  `dietitianuserID` varchar(30) NOT NULL,
  `profile` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `duration` varchar(25) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `features` varchar(255) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_plan`
--

INSERT INTO `create_plan` (`plan_id`, `dietitianuserID`, `profile`, `image`, `name`, `tags`, `duration`, `start_date`, `end_date`, `features`, `description`, `price`) VALUES
(3, 'infitsWebTeam', NULL, NULL, 'Semi-vigan', 'Keto Diet , Vegan Diet', NULL, '2024-03-19', '2024-03-23', '  find dora the explorar  ,   whay am i here this is a waste   ,   lalalal dcdcni dcedj rrgtjbnr fe   ,  hjbj fvef oij edjcn  ', 'Rayquaza is said to have lived for hundreds of millions of years. Legends remain of how it put to re', 20039),
(27, 'SumitKumar', NULL, '1732_full stack.png', 'plan 1', 'Keto Diet , Vegan Diet', NULL, '2023-08-02', '2023-09-01', '', 'description', 100),
(32, 'SumitKumar', NULL, '8557_desert.jpg', 'plan 1', 'Keto Diet', NULL, '2023-08-03', '2023-09-22', '1 ', 'description', 10024),
(34, 'infitsWebTeam', NULL, NULL, 'Paleo Diet', 'Keto Diet , Vegan Diet', NULL, '2024-03-14', '2024-05-17', 'feature 101 , feature 202 , see from my shadow lemborgini galado djcnijjdncijwdnciwjdnnc , feature 404 , feature 505', 'This Sofa set makes for a great addition to your home. The set has an extremely modern and contempor', 150),
(36, 'infitsWebTeam', NULL, '', 'Keto Diet', 'Keto Diet , Vegan Diet', NULL, '2023-10-10', '2023-11-10', 'follow this plan   ,   follow keto , follow wve , fsk', 'this is a good plan you all should follow this plan to lose fat and build muscle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cyclingtracker`
--

CREATE TABLE `cyclingtracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(20) DEFAULT NULL,
  `steps` int(11) NOT NULL,
  `distance` decimal(10,0) DEFAULT NULL,
  `calories` decimal(10,0) DEFAULT NULL,
  `runtime` float DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_test`
--

CREATE TABLE `data_test` (
  `sl` int(11) NOT NULL,
  `encrypted_text` text NOT NULL,
  `phrase_key` varchar(15) NOT NULL,
  `original_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `default_recipes`
--

CREATE TABLE `default_recipes` (
  `drecipe_id` int(11) NOT NULL,
  `drecipe_name` varchar(50) NOT NULL,
  `drecipe_ingredients` text NOT NULL,
  `drecipe_recipe` text NOT NULL,
  `drecipe_nutritional_information` text NOT NULL,
  `drecipe_img` text NOT NULL,
  `drecipe_category` varchar(30) NOT NULL,
  `drecipe_course` varchar(30) NOT NULL,
  `drecipe_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `default_recipes`
--

INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(1, 'Spiced Jerusalem Artichokes', '[\"500g Jerusalem artichokes\", \"2 tbsp vegetable oil\", \"1 heaped tsp cumin seeds\", \"large pinch of asafoetida\", \"1 green chilli, chopped\", \"?xa0tsp salt\", \"1 lemon\", \"1 tsp garam masala\", \"Handful of fresh coriander\"]', '{\"Wash and scrub the artichokes, then peel and chop them into 4cm cubes.\"},{ \"Heat oil in a wok or karahi, add cumin seeds and asafoetida powder.\"},{ \"Once the seeds crackle, add the chillies and salt and add the chopped artichokes.\"},{ \"Stir and coat them with the spices and leave them to cook on a gentle heat for about 5-10 minutes, stirring occasionally. Cook them to the texture you like ? I like mine with a crunch. Remove from the heat.\"},{ \"Squeeze in a little fresh lemon juice, sprinkle the garam masala and transfer to a bowl.\"},{\"Sprinkle with the fresh coriander to finish.\"}', '{\"Calories\": \"164\", \"Fat (g)\": \"7\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"26\", \"of which sugars (g)\": \"13\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"295\"}', '', 'Pancake', 'breakfast', '20min'),
(2, 'Crispy Hot Wings', '[\"3 tbsp plain flour\", \"1 tsp paprika\", \"2 1/2 tsp garlic salt\", \"1 tsp chilli powder, or to taste\", \"1 tsp black pepper\", \"1/2 tsp salt\", \"1 tbsp butter\", \"10 chicken wings, skin on\"]', '{\"Prep the wings by removing the tip and cutting at the joint. Leave the skin on.\"}, {\"Mix all the spices with the flour in a bowl and coat the wings really well.\"}, {\"Shake and set to one side.\"}, {\"Preheat oven to 200 °C.\"}, {\"Line a baking tray with foil and spread it with the butter.\"}, {\"Place the wings on top and cook for about 15 minutes. Turn them over and cook for another 10 minutes or until crisp and cooked through.\"}, {\"Heat your oil to 180°C.\"}, {\"Fry the chicken until it\"s crisp and cooked through - about 10 minutes.\"}', '{\"Calories\": \"151\", \"Fat (g)\": \"9.5\", \"of which saturates (g)\": \"2.5\", \"Carbohydrates (g)\": \"2.6\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"1.8\"}', '', 'Pancake', 'breakfast', '20min'),
(3, 'Pea and Ham Soup with Chilli and Cumin', '[\"1 ham knuckle, or cured ham hock\", \"1 celery stick, roughlt chopped\", \"1 onion, roughly chopped\", \"1 carrot, roughly chopped\", \"1 bay leaf\", \"250g dried green split peas\", \"2 celery sticks,\", \"1 onion,\", \"1 tbsp butter\", \"1 bay leaf\", \"2 tsp garlic, finely chopped\", \"1 green chilli, chopped\", \"¼ tsp black pepper, ground\", \"Handful frozen green peas\"]', '{\"Soak the ham hock in water overnight. Discard the water.\"}, {\"Put it into a deep pan and cover completely with fresh cold water. Bring to the boil then simmer gently. You may need to skim the surface of the liquid.\"}, {\"Add the celery stick, onion, carrot and bay leaf to the ham.\"}, {\"Cook this for 2 hours and 30 minutes. Top with more water as and when required.\"}, {\"Remove the ham from the water and leave it to cool. Strain the cooking liquid through a sieve and save 2L to use as the stock for the soup. I usually freeze the extra stock.\"}, {\"Chop the onion and celery so it\"s nice and fine (you can use a blender).\"}, {\"Heat a large pan and add the butter.\"}, {\"Add 1tsp of cumin seeds until fragrant and then add the celery and onion mixture.\"}, {\"Sweat for 4–5 minutes and add the garlic and chopped green chilli. Stir for a minute or two but do not let it colour.\"}, {\"Add the green split peas and stir through for another 2–3 minutes.\"}, {\"Pour in the strained ham stock and another bay leaf and a twist of black pepper.\"}, {\"Bring it to the boil, then leave to simmer for 2 hours and 30 minutes until the peas are fully cooked through. I also like to add a handful of frozen green peas halfway through.\"}, {\"Blitz with a hand blender to create a smooth soup.\"}, {\"Once the ham has cooled shred the meat and mix it into the soup. Save some to sprinkle on top when serving too.\"}', '{\"Calories\": \"155.00\", \"Fat (g)\": \"2.00\", \"of which saturates (g)\": \"0.00\", \"Carbohydrates (g)\": \"30.00\", \"of which sugars (g)\": \"10.00\", \"Fibre (g)\": \"9.00\", \"Protein (g)\": \"7.00\", \"Salt (mg)\": \"0.091\"}', '', 'Pancake', 'breakfast', '20min'),
(4, 'Fennel and Seafood Salad', '[\"200g raw prawns\", \"½ tsp chilli powder\", \"salt to taste\", \"200g raw squid\", \"½ tsp turmeric\", \"1 fillet of salmon, skinned and chopped into chunks\", \"½ tsp chaat masala\", \"salt\", \"1 bulb of fennel\", \"1 ripe nectarine, sliced\", \"handfulxa0fresh coriander, chopped\", \"20ml olive oil\", \"juice of one lime\", \"½ tsp paprika powder\", \"ginger, fine chopped\", \"half green chilli, fine chopped\", \"pinch dill, chopped\", \"1 clove garlic, crushed\", \"Salt to taste\"]', '{\"Sprinkle the chilli powder and salt on the prawns and griddle or fry in a pan until cooked through and set to one side.\"}, {\"Sprinkle the squidxa0with the turmeric and salt and fry until cooked through.\"}, {\"Coat the fish with the chaat masala and place on an oven tray and cook at 180C for 5 minutes.\"}, {\"Slice the fennel very finely and sprinklexa0with a little oil and griddle.\"}, {\"Mix all the ingredients for the dressing and leave to one side.\"}, {\"Place fennel into a bowl and sprinkle with coriander leaves, the cooked seafood and then pour over the marinade and toss together.\"}, {\"Slice the nectarine and place into the bowl and serve.\"}', '{\"Calories\": \"215.00\", \"Fat (g)\": \"11.00\", \"of which saturates (g)\": \"2.00\", \"Carbohydrates (g)\": \"5.00\", \"of which sugars (g)\": \"0.00\", \"Fibre (g)\": \"1.00\", \"Protein (g)\": \"26.00\", \"Salt (mg)\": \"0.505\"}', '', 'Pancake', 'breakfast', '20min'),
(5, 'Mutton Rara', '[\"3 tsp rapeseed oil\", \"7cm piece of cassia bark\", \"2 whole black cardamom\", \"4 green cardamoms\", \"5 whole black peppercorns\", \"4 cloves\", \"1 star anise\", \"2 bay leaves\", \"1 tsp cumin seeds\", \"2-3 onions finely chopped\", \"1 tbsp ginger, grated\", \"7 garlic cloves, minced\", \"8 dry whole red Kashmiri chillies\", \"4 tomatoes finely chopped\", \"1 tsp turmeric\", \"salt to taste\", \"250g minced mutton or lamb\", \"500g mutton or lamb chopped (800-900g if on the bone)\", \"1 tsp coriander seeds, crushed\", \"2 tbsp Greek yoghurt\", \"1 tsp garam masala\", \"handful of coriander leaves, chopped\"]', '{\"Pour oil into a heavy based pan and fry all the whole spices until fragrant.\"}, {\"Add the onion and garlic and cook for about 10 minutes until soft and browned.\"}, {\"Meanwhile soak the Kashmiri chillies in some boiling water to let them soften.\"}, {\"Stir in the tomatoes and ginger and leave to cook until they start to breakdown.\"}, {\"Add the turmeric, the crushed coriander seeds and the soaked chillies.\"}, {\"Addxa0the mince and stir it into the sauce until it browns.\"}, {\"Turn the heat up and add the pieces of mutton and give it all a good stir so the meat begins to heat through.\"}, {\"Reduce the heat, cover with a lid and let it simmer slowly for about 40-60 minutes.\"}, {\"When the meat is tender turn up the heat and fry it so the sauce reduces and thickens.\"}, {\"Reduce the heat and stir in the yoghurt one spoonful at a time and remove from the heat.\"}, {\"Stir in the garam masala and garnish with coriander. Serve hot with roti.\"}', '{\"Calories\": \"332\", \"Fat (g)\": \"19\", \"of which saturates (g)\": \"7\", \"Carbohydrates (g)\": \"23\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"10\", \"Protein (g)\": \"26\", \"Salt (mg)\": \"487\"}', '', 'Pancake', 'breakfast', '20min'),
(6, 'Black Lentil and Split Chickpea Dhal', '[\"100g split chickpeas (chana)\", \"100g urid beans, washed and checked for stones\", \"1L water\", \"1 tsp salt\", \"1 tbsp vegetable oil\", \"1 small onion\", \"1 clove garlic, chopped\", \"½ tin or 200g tomatoes\", \"1 tsp ginger, grated\", \"1 chilli, finely chopped\", \"1 tsp turmeric\", \"½xa0tsp salt\", \"1 tsp garam masala\", \"Handful of fresh coriander, chopped\"]', '{\"Put the lentils in the pressure cooker and add 1L of cold water.\"}, {\"Add 1 tsp of salt put the lid on the pan and bring to the boil. Let the pan come to temperature and whistle once, then reduce the heat and leave to simmer for 30 minutes. After this time remove from thexa0heat and leave the pan to cool - DO NOT REMOVE THE LID.\"}, {\"Meanwhile in a medium sized pan heat oil and add the onion and garlic, fry until lightly browned.\"}, {\"Reduce heat and add tomatoes, ginger, chilli, turmeric and ½xa0tsp of salt. Continue to cook so the tomatoes and onion have melted together to create a thick paste.\"}, {\"Once the pressure cooker has cooled and the pressure has been released open the lid. Check the lentils are cooked by squeezing them between your fingers. If they are soft they are ready.\"}, {\"Add the cooked dhal to the masala and stir, leave to cook for about 5 minutes.\"}, {\"Stir in the garam masala and throw in the coriander to serve.\"}', '{\"Calories\": \"66\", \"Fat (g)\": \"1.6\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"9.6\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"4.0\", \"Salt (mg)\": \"0.41\"}', '', 'Pancake', 'breakfast', '20min'),
(7, 'Aloo Bangun', '[\"2 aubergines, cut into 3cm lengths\", \"2 potatoes, peeled and cut into 3cm lengths\", \"2 tbsp mustard oil\", \"1 tsp mustard seeds\", \"1 tspxa0cumin seeds\", \"1 onion, finely sliced\", \"200g/½xa0tin tomatoes\", \"1 tbsp ginger, grated\", \"1 tspxa0salt\", \"1 tsp turmeric\", \"1 chilli, finely chopped\", \"1 tsp garam masala\", \"Handful fresh coriander,xa0chopped\"]', '{\"Heat the oil in a wok or karahi and add 1 tsb of mustard seeds. Once sizzling, add 1 tsp cumin seeds and fry until they become fragrant.\"}, {\"Then add 1 sliced onion and continue to cook until soft and lightly browned. .\"}, {\"Reduce the heat a little and add 200 g tomatoes, 1 tsp salt, 1 tsp turmeric, 1 finely chopped chilli and 1 tbsp grated ginger. .\"}, {\"Cook until the onions and tomatoes melt together to create a thick, aromatic masala paste (5-10 minutes). .\"}, {\"Add 2 cubed potatoes and stir to coat with the sauce. Reduce the heat cover the pan with the lid and leave to cook for 5 minutes. Add a little drop of water if required. .\"}, {\"Stir in the 2 cubed aubergines and coat them with the masala. .\"}, {\"Replace lid and leave to cook for 25-30 minutes stirring occasionally, until cooked through. .\"}, {\"Once soft and cooked through sprinkle the curry with garam masala and fresh coriander before serving.\"}', '{\"Calories\": \"46\", \"Fat (g)\": \"1.8\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"7.0\", \"of which sugars (g)\": \"2.2\", \"Fibre (g)\": \"1.4\", \"Protein (g)\": \"1.4\", \"Salt (mg)\": \"0.65\"}', '', 'Pancake', 'breakfast', '20min'),
(8, 'Kharee', '[\"250-300g whole Greek yoghurt\", \"100g gram flour\", \"4 cloves garlic\", \"5cm piece of ginger, roughly chopped\", \"1 green chilli\", \"1 tsp salt\", \"2 handfuls of fresh fenugreek or 2 tbsp dried fenugreek\", \"10 vegetable pakora (or chucks of boiled potatoes)\", \"2 tsp garam masala\", \"Handful of fresh coriander, chopped\", \"2 tsp oil\", \"2 dried chillies\", \"1 tsp cumin seeds\", \"1 tsp fenugreek seeds\", \"½xa0onion, sliced\"]', '{\"Mix the greek yoghurt and gram flour to make a thick paste and pour into a pan and begin to heat.\"}, {\"Blitz the garlic, ginger, chilli in a blender and add 2 large glasses of water.\"}, {\"Pour into the yoghurt mixture add the salt and stir. It should have the consistency of a very thin batter at this stage.\"}, {\"Heat the pan and continue to stir as this does have a tendency to stick to the bottom of the pan and burn.\"}, {\"The Khareexa0will begin to thicken. If it gets too thick just add a little more water.\"}, {\"Reduce the heat add the fenugreek (fresh/dried) and leave to cook for about 30 minutes. Continue to check and stir.\"}, {\"Add, pakora (or cooked potato chunks), garam masala, fresh coriander and stir.\"}, {\"Leave for 10 minutes for the pakora to soak up the sauce.\"}, {\"Heat oil in a small frying pan and toast the chilli for a second.\"}, {\"Add cumin and fenugreek seeds when sizzling add onion and fry until browned. Pour on to kharee, and top with the fried chilli and serve.\"}', '{\"Calories\": \"118\", \"Fat (g)\": \"4.8\", \"of which saturates (g)\": \"2.4\", \"Carbohydrates (g)\": \"14\", \"of which sugars (g)\": \"2.8\", \"Fibre (g)\": \"2.0\", \"Protein (g)\": \"6.7\", \"Salt (mg)\": \"1.1\"}', '', 'Pancake', 'breakfast', '20min'),
(9, 'Seafood Curry', '[\"2 tsp coriander seeds\", \"1 tsp cumin seeds\", \"4 dried red chillies\", \"5cm stick cassia bark\", \"6 black peppercorns\", \"3 cm fresh ginger\", \"3 garlic cloves\", \"½xa0tsp turmeric\", \"1 tbsp malt vinegar.\", \"500g of seafood (prawns, mussels, scallops, crab claws, squid, salmon)\", \"2 tsp vegetable oil\", \"10 fresh curry leaves\", \"1 small onion, finely chopped\", \"250ml coconut milk\", \"1 lemon, juice\", \"Salt and black pepper\", \"Handful of fresh coriander, chopped\"]', '{\"Place the coriander, cumin, chillies, cassia & peppercorns in a spice grinder and grind to a fine powder.\"}, {\"Place ginger, garlic, ground spices, vinegar and turmeric in a blender and create a smooth thick paste.\"}, {\"Ensure the seafood is washed and clean. Wash and debeard the mussels, ensure you throw out any that are gaping and do not close slowly when you sueeze them.\"}, {\"Heat the oil in a pan and add the curry leaves and onion. Let the onions sweat until they are translucent, about 3-4 minutes. Stir in the spice paste and fry for a few minutes.\"}, {\"Add all of the seafood except for the fish and cook for 2 minutes.\"}, {\"Stir in the coconut milk and heat through. Reduce the heat then add the fish and leave to simmer until it is cooked through about 5-6 minutes.\"}, {\"Squeeze in some lemon juice and adjust the seasoning to taste.\"}, {\"Sprinkle with fresh coriander to serve.\"}', '{\"Calories\": \"80\", \"Fat (g)\": \"3.8\", \"of which saturates (g)\": \"0.5\", \"Carbohydrates (g)\": \"3.8\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"8.2\", \"Salt (mg)\": \"0.65\"}', '', 'Pancake', 'breakfast', '20min'),
(10, 'Jeera Chaul', '[\"1 tbsp oil\", \"1 tsp cumin seeds\", \"1 small onion, finely sliced\", \"200g/1 mug Basmati rice\", \"50g frozen peas\", \"500ml/2 mugs full, cold water\"]', '{\"Wash the rice until the water runs clear. I do this by covering the rice with water and running my hand through it, pouring the starchy water away then refilling with cold water and repeating until the water runs clear. Strain in a sieve and leave.\"}, {\"In a wide based pan heat the oil and add the onions and fry until translucent.\"}, {\"Add the whole cumin seeds. When they sizzle and become fragrant stir in the frozen peas\"}, {\"Add the washed rice, stir to coat with the oil then pour in 500ml of water (twice the amount of water to rice).\"}, {\"Bring the water to a vigorous rolling boil, reduce the heat to the lowest setting and place the lid on the pan.\"}, {\"Leave to cook for 12 minutes do not remove the lid - be patient!\"}, {\"After 12 minutes remove from the heat and take the lid off. Leave to sit for a couple of minutes. All the water will all be absorbed and the rice will be light and fluffy.\"}, {\"Gently fork through the rice (never dive straight in) and serve.\"}', '{\"Calories\": \"220\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"40\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"59\"}', '', 'Pancake', 'breakfast', '20min'),
(11, 'Chicken Dopiaza', '[\"4 medium onions peeled, 2 chopped and 2 sliced\", \"8 chicken thighs, skinned & chopped\", \"3cm ginger, grated\", \"3 cloves of garlic, finely chopped\", \"1 tbsp of vegetable oil for cooking\", \"1 tbsp coriander seeds, crushed\", \"1 tbsp cumin seeds, crushed\", \"1 heaped tsp ground turmeric\", \"½xa0tbsp chilli powder\", \"4 tbsp plain yoghurt\", \"2 tomatoes, finely chopped\", \"1 tsp salt\", \"½xa0tbsp garam masala\", \"Handful of coriander, chopped\"]', '{\"Place the chopped onions, ginger and garlic into a blender and blend to a paste then set this aside.\"}, {\"In a pan heat the oil, put in the sliced onions and fry until they are slightly crispy and reddish-brown. Remove the onions and set aside.\"}, {\"Remove the pan from the heat and add the blended onion paste – be careful, this will splutter.\"}, {\"Place the pan back onto the heat and keep stirring the paste for 3 minutes until it has turned golden brown.\"}, {\"Add in the coriander, cumin, turmeric and chilli powder and stir.\"}, {\"Then gently start to stir in 1 tbsp of yoghurt until it\"s mixed well into the sauce. Do the same with remaining yoghurt, 1 tbsp at a time.\"}, {\"Add the chicken and stir for a minute until well coated with the yoghurt mixture.\"}, {\"Add the tomatoes and salt. Stir until mixed thoroughly and bring to a simmer.\"}, {\"Cover the pan, reduce the heat to low and cook for 20 minutes.\"}, {\"Sprinkle in the garam masala and the fried onions.\"}, {\"Mix and leave to cook, uncovered, for a few minutes until the sauce thickens.\"}, {\"Add fresh coriander to serve.\"}', '{\"Calories\": \"163\", \"Fat (g)\": \"2.4\", \"of which saturates (g)\": \"0.8\", \"Carbohydrates (g)\": \"26\", \"of which sugars (g)\": \"18\", \"Fibre (g)\": \"4.6\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"0.83\"}', '', 'Pancake', 'breakfast', '20min'),
(12, 'Aloo Muttar', '[\"1 tbsp oil for cooking\", \"1 onion, finely chopped\", \"3 garlic cloves, chopped\", \"3cm piece of ginger, grated\", \"250g tinned plum tomatoes\", \"1 green chilli, finely chopped\", \"1 tsp salt\", \"1 tsp fenugreek powder (methi)\", \"1 tsp turmeric\", \"1 tsp chilli powder\", \"1 or 2 potatoes, peeled and chopped into 3cm cubes\", \"200g frozen peas\", \"1 tsp garam masala\", \"Handful of fresh coriander, chopped\"]', '{\"Heat oil and add onion and after a few minutes stir in the garlic. Cook for about 10 minutes until the onions are soft and turning golden.\"}, {\"When the onions are cooked add the tomatoes (which you can whizz up before hand), grated ginger, salt, turmeric, fenugreek and chilli.\"}, {\"Stir together and cook the sauce until the tomatoes and onion melt together creating a thick masala paste.\"}, {\"Once it is thick and shiny add the pototes. Stir to coat them in the sauce then put the lid on the pan and reduce the heat. Leave to cook for 5-10 minutes before adding the frozen peas.\"}, {\"Leave to cook for another 10 minutes until the potatoes are soft. (Note: if your potatoes stick just add a splash of water. Don\"t stir too much as you dont want the potatoes to mash).\"}, {\"Pour in enough hot water to get the consistency you want. Sprinkle with garam masala and fresh coriander and serve with roti or rice.\"}', '{\"Calories\": \"62\", \"Fat (g)\": \"2.1\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"9.1\", \"of which sugars (g)\": \"2.4\", \"Fibre (g)\": \"2.0\", \"Protein (g)\": \"2.6\", \"Salt (mg)\": \"0.81\"}', '', 'Pancake', 'breakfast', '20min'),
(13, 'Falia di Sabjee', '[\"500g runner beans, sliced\", \"1 tbsp mustard oil\", \"1 tsp mustard seeds\", \"1 tsp cumin seeds\", \"1 tsp salt\", \"1 tsp turmeric\", \"1 tsp garam masala\", \"1 chilli, finely chopped\"]', '{\"Heat oil in a karahi, wok or pan and add mustard seeds. As they begin to pop add cumin seeds.\"}, {\"When sizzling and fragrant reduce the heat and gently add the beans to the pan and stir.\"}, {\"Turn the heat down and add turmeric, salt, and chilli - fry for a few minutes.\"}, {\"Add approximately 50ml of water cover and leave to cook for 5-10 minutes stirring occasionally.\"}, {\"If any liquid remains increase the heat and fry off.\"}, {\"Adjust seasoning if required. Sprinkle with garam masala and serve.\"}', '{\"Calories\": \"75\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"6\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"572\"}', '', 'Pancake', 'breakfast', '20min'),
(14, 'Dhokla', '[\"350g gram flour\", \"1 cup greek yoghurt\", \"1 green chilli\", \"3cm piece ginger, grated\", \"1 tsp salt\", \"1 tspxa0bicarbonate of soda\", \"1 tspxa0lemon juice\", \"½ tspxa0turmeric powder\", \"1 tbsp rapeseed oil\", \"1 tbsp rapeseed oil\", \"8 curry leaves\", \"1 tsp mustard seeds\", \"1 tsp sesame seeds\", \"2 green chillies, finely chopped\", \"coriander leaves, chopped\"]', '{\"In a bowl add gram flour, yoghurt and water.xa0Mix well to make a smooth thick batter then add salt, cover and set aside for approx. 4 hours.\"}, {\"Place ginger and green chilli into a blender with a splash of water to make a paste.\"}, {\"Add the paste, turmeric powder to the batter and mix well.\"}, {\"Heat the water in the pan so it is ready to steam.\"}, {\"Grease a baking tray so it\"s ready for the cake mixture.\"}, {\"In a small bowl mix the bicarbonate, oil and lemon juice then pour into the batter and mix well.\"}, {\"Pour this batter into the greased dish and place in the steamer put the lid on and steam for 10-12 minutes.\"}, {\"Remove from the heat and take the tray out of the steamer and leave to cool.\"}, {\"Once cooled cut into chunky cubes - each cube should be light and have small holes throughout.\"}, {\"To finish heat a little oil in a small pan, add mustard seeds and curry leaves once they pop add sesame seeds and the sliced chilli.\"}, {\"Remove and pour it over dhoklas, garnish with fresh chopped coriander and serve as a funky snack\"}', '{\"Calories\": \"211\", \"Fat (g)\": \"10\", \"of which saturates (g)\": \"3.7\", \"Carbohydrates (g)\": \"21\", \"of which sugars (g)\": \"3.3\", \"Fibre (g)\": \"4.0\", \"Protein (g)\": \"10\", \"Salt (mg)\": \"1.3\"}', '', 'Pancake', 'breakfast', '20min'),
(15, 'Prawn Poori', '[\"500g raw king prawns\", \"2 cloves of garlic\", \"3cm piece of ginger\", \"½ tsp turmeric\", \"1 fresh lime\", \"1 tsp cumin seeds\", \"1 onion, sliced\", \"2 cloves of garlic, sliced\", \"3 tbsp tomato puree\", \"3 green chillies, sliced lengthways\", \"1 tsp coriander seeds, crushed\", \"1 tsp Kashmiri chilli powder\", \"1 tomato, diced\", \"handful of fresh coriander, chopped\", \"squeeze of lime\"]', '{\"Put the ginger and garlic in a pestle and mortar and bash to make a paste. Empty into a bowl.\"}, {\"Add turmeric, salt and lime and stir in the prawns. Set to one side.\"}, {\"Heat oil and toast cumin seeds until they sizzle and become fragrant.\"}, {\"Add sliced onions and cook until they begin turning golden in colour. Stir in the sliced garlic and add a splash of water if needed. Cook for a further 2-3 minutes.\"}, {\"Add 2-3 tbsp of tomato puree and stir.\"}, {\"Add the sliced chilli, crushed coriander seeds and Kashmiri chilli powder then stir together. Add in a little water to loosen and cook for a few more minutes.\"}, {\"Once the masala is fragrant, add the prawns. Stir and cook for a minute, then add the chopped fresh tomato. Cook until the prawns turn pink (2-3 minutes).\"}, {\"Remove from the heat and check the seasoning. Finish with fresh coriander and a squeeze of lime and serve inside a large poori or on mini pooris to share or as canapés.\"}', '{\"Calories\": \"91\", \"Fat (g)\": \"3.2\", \"of which saturates (g)\": \"0.3\", \"Carbohydrates (g)\": \"0.2\", \"of which sugars (g)\": \"0.1\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"1.0\"}', '', 'Pancake', 'breakfast', '20min'),
(16, 'Mango Lassi', '[\"1 mango, peeled, stoned and chopped\", \"4 tbsp Greek yoghurt\", \"Splash of cold milk\", \"3 tsp of sugar (or to taste)\", \"1 handful of ice cubes\", \"Sprinkle of cardamom powder\"]', '{\"Put the yoghurt, milk, mango, sugar, ice into a blender and blitz until smooth.\"}, {\"Pour the mixture into a tumbler and sprinkle with some cardamom powder.\"}', '{\"Calories\": \"105\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"18\", \"of which sugars (g)\": \"17\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"12\"}', '', 'Pancake', 'breakfast', '20min'),
(17, 'Spiced Rice', '[\"1 tbsp ghee\", \"1 tsp cumin seeds\", \"1 stick of cassia bark\", \"3 cloves\", \"4 cardamom pods\", \"2 star anise\", \"1 small onion, finely sliced\", \"1 garlic clove, sliced\", \"4cm piece of ginger, julienne\", \"10/15 cashew nuts\", \"1 tbsp raisins, (optional)\", \"200g/1 mug Basmati rice\", \"500ml/2 mugs full, cold water\", \"1 tsp salt, (or to taste)\"]', '{\"Wash the rice until the water runs clear. I do this by covering the rice with water and running my hand through it, pouring the starchy water away then refilling with cold water and repeating until the water runs clear. Strain in a sieve and leave.\"}, {\"In a wide based pan heat the ghee and add the whole spices - cumin seeds,cassia, cloves, cardamom, star anise.\"}, {\"When they sizzle and become fragrant stir in the onions and saute.\"}, {\"After a minute or 2 add the garlic. Just as you get a little colour add the ginger, cashews and raisins.\"}, {\"Add the washed rice, stir to coat with the spices then pour in the 500ml of water (twice the amount of water to rice).\"}, {\"Add the salt and bring the water to a vigorous rolling boil, reduce the heat to the lowest setting and place the lid on the pan.\"}, {\"Leave to cook for 10 minutes do not remove the lid - be patient!\"}, {\"After 10 minutes remove from the heat and leave for a minute.\"}, {\"Then take the lid off and let the steam rise. All the water will have been absorbed and the rice will be light and fluffy.\"}, {\"Gently fork through the rice (never dive straight in) and serve.\"}', '{\"Calories\": \"220\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"40\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"59\"}', '', 'Pancake', 'breakfast', '20min'),
(18, 'Cockle Curry', '[\"1 tbsp coriander seeds\", \"2 tbsp cumin seeds\", \"1 tbsp vegetable oil\", \"2 onion, 1 quartered the other sliced\", \"6 large garlic cloves\", \"4 cm chunk of fresh root ginger, roughly chopped\", \"20g tamarind paste\", \"2 red chillies, chopped\", \"60g coconut cream (more for a more creamy sauce)\", \"½xa0tsp turmeric\", \"1.5kg fresh cockles, cleaned\", \"salt to taste\", \"large pinch of coriander,xa0chopped\", \"1 lemon\"]', '{\"Roast the coriander and cumin seeds until they become fragrant then remove from the heat and grind to a powder.\"}, {\"Blend the quartered onion, garlic, ginger and chillies to make a smooth paste.\"}, {\"Heat oil in a large pan and add the sliced onion and cook for a few minutes until it\"s translucent.\"}, {\"Stir in the onion paste and fry to cook off all the raw ingredients (about 3-4 minutes).\"}, {\"Sprinkle in the ground spices, tamarind paste, turmeric and coconut cream until it\"s all melted into a sauce. Cook for a few minutes until its aromatic.\"}, {\"Add the cleaned cockles over a high heat, add 2 -3 tbsps water. Put the lid on the pan and cook for 3-4 minutes, shaking the pan until all the cockles have opened. Remove from the heat and discard any that haven\"t opened.\"}, {\"Cockles are quite salty so taste them before adding any more seasoning. If you want a bit more of a sauce add a splash of hot water.\"}, {\"Squeeze over half a lemon and add the coriander to serve.\"}', '{\"Calories\": \"395\", \"Fat (g)\": \"10\", \"of which saturates (g)\": \"3\", \"Carbohydrates (g)\": \"23\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"52\", \"Salt (mg)\": \"82\"}', '', 'Pancake', 'breakfast', '20min'),
(19, 'Lamb Karahi Curry', '[\"600g leg of lamb or lamb neck fillet, trimmed and cubed\", \"5 whole garlic cloves, peeled\", \"1 tbsp ginger, grated\", \"1 tsp salt\", \"2 tbsp butter/ghee\", \"3 fresh tomatoes, finely chopped\", \"1 tsp turmeric\", \"2 chillies, chopped finely\", \"3 tspxa0coriander seeds, crushed\", \"3 tsp of cumin seeds, crushed\", \"1 tspxa0red chilli powder (optional)\", \"1 onion, finely sliced\", \"2 whole chillies, sliced lengthways\", \"1 tspxa0garam masala\", \"Handful coriander, chopped\"]', '{\"Place the diced lamb in a pan with garlic, ginger and salt and put the lid on the pan. Leave to cook on the lowest heat setting for 30-50 minutes until tender. Please don\"t worry, I promise it will not burn, it will just cook gently in its own juices until it is beautifully soft and has drawn in all the garlic and ginger flavours. Stir occasionally.\"}, {\"In a karahi/wok heat the butter, add tomatoes and turmeric then fry to create a thick masala paste.\"}, {\"Add the chopped chilli, crushed cumin and coriander seeds, red chilli powder and then fry for a few minutes.\"}, {\"Stir in the cooked lamb with all the juice from the meat into the karahi/wok and begin to stir-fry with the tomato masala. After a few minutes add the sliced onions and halved chillies.\"}, {\"Stir fry the meat until the saucexa0thickens and you are left with it clinging to the meat entwined with delicious chunky slices of onion.\"}, {\"Sprinkle in the garam masala and a handful of coriander to serve.\"}', '{\"Calories\": \"347\", \"Fat (g)\": \"23\", \"of which saturates (g)\": \"10\", \"Carbohydrates (g)\": \"18\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"26\", \"Salt (mg)\": \"626\"}', '', 'Pancake', 'breakfast', '20min'),
(20, 'Avocado Yoghurt', '[\"1 ripe avocado\", \"1 green chilli\", \"handful of fresh coriander (including stalks)\", \"big handful of baby spinach\", \"200ml greek yoghurt\", \"juice of half lemon\", \"1 tsp cumin seeds\", \"1 tsp salt\"]', '{\"Scoop out the avocado flesh and place it in a blender\"}, {\"Add all the remaining ingredients and blend until nice and smooth.\"}, {\"Check the seasoning and adjust if required.\"}', '{\"Calories\": \"132\", \"Fat (g)\": \"12\", \"of which saturates (g)\": \"4.6\", \"Carbohydrates (g)\": \"3.2\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"1.2\", \"Protein (g)\": \"3.8\", \"Salt (mg)\": \"1.6\"}', '', 'Pancake', 'breakfast', '20min'),
(21, 'Chicken Tikka', '[\"5-6 chicken thighs/4 breasts\", \"1 red pepper, cut into chunks\", \"1 green pepper, cut into chunks\", \"2 red onions, cut into chunks\", \"1 tsp salt\", \"3 cloves garlic, crushed\", \"2 tbsp ginger, grated\", \"1 tspxa0kashmiri chilli powder\", \"1 fresh chilli, finely chopped (2 for more heat)\", \"1 tspxa0of garam masala, heaped\", \"1 tspxa0of dried fenugreek leaf (kasoori methi)\", \"½ tspxa0of coriander seeds, crushed\", \"4 cardamoms, crushed\", \"250g Greek yoghurt (ideally hung yoghurt)\", \"Juice from 1 lemon\", \"Mustard oil (for brushing)\", \"Handful of fresh coriander, chopped\", \"6 skewers - metal or wooden\"]', '{\"Cut the chicken into large chunks.\"}, {\"Mix all the marinade spices in a dish and add the yoghurt, stir together.\"}, {\"Place the chicken and chopped vegetables in the marinade and using your hands rub the yoghurt all over them.\"}, {\"Refrigerate and leave to marinade for at least one hour.\"}, {\"Heat the oven to 200oC. If using wooden skewers soak them in cold water for about 20 minutes.\"}, {\"Skewer the meat and vegetables. Place the chicken skewers onto a baking tray and brush with oil and place on the middle shelf in the oven. Cook for 10-15 minutes.\"}, {\"Turn the skewers over and brush or drizzle with oil. Return to the top shelf of the oven for another 15 minutes.\"}, {\"Garnish with coriander and a good squeeze of lemon juice to serve.\"}', '{\"Calories\": \"82\", \"Fat (g)\": \"3.3\", \"of which saturates (g)\": \"1.7\", \"Carbohydrates (g)\": \"3.6\", \"of which sugars (g)\": \"2.7\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"9.8\", \"Salt (mg)\": \"0.64\"}', '', 'Pancake', 'breakfast', '20min'),
(22, 'Mustard Raita', '[\"300g Greek yogurt\", \"splash of milk\", \"salt to taste\", \"pepper to taste\", \"1 tbsp mustard oil or vegetable oil\", \"1 tsp mustard seeds\", \"1 tsp cumin seeds\", \"1 clove of garlic, finely chopped\", \"1 tsp grated ginger\", \"1 red chilli, finely chopped\"]', '{\"Put the yogurt in a bowl and pour it a little milk to loosen it and season with salt and pepper.\"}, {\"In a small frying-pan, heat the oil over a medium flame and add the mustard and cumin seeds. When they become fragrant, add the garlic and let it sizzle. Ensure it doesn\"t brown.\"}, {\"Pour all the contents of the pan into the yogurt and stir in the ginger and chilli.\"}', '{\"Calories\": \"123\", \"Fat (g)\": \"9\", \"of which saturates (g)\": \"3\", \"Carbohydrates (g)\": \"7\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"7\", \"Salt (mg)\": \"105\"}', '', 'Pancake', 'breakfast', '20min'),
(23, 'Luchi', '[\"300g plain flour\", \"2 tbsp vegetable oil\", \"½ tsp salt\", \"warm water for kneading (as required)\", \"vegetable oil for frying\"]', '{\"Add the flour, 2 tbsp vegetable oil, and ½ tsp salt to a large mixing bowl.\"}, {\"Mix all the ingredients using your fingertips until you get a crumbly mixture.\"}, {\"Pour in the warm water a little at a time and knead to make a firm dough. The consistency of the dough is important so make sure its fairly tight.\"}, {\"Cover it with a damp cloth and rest for 20 minutes.\"}, {\"Knead the dough again for 3-4 minutes until it is very smooth.\"}, {\"Heat the vegetable oil for frying in a medium-size deep karahi or deep pan over a high heat.\"}, {\"Divide the dough into small ping pong sized balls and press each one between your palms to make a circle.\"}, {\"Apply little oil and roll it out to a circle that’s about 20cm across.\"}, {\"When the oil is hot, reduce the heat to a medium temperature. Slip the luchi into the hot oil very gently press it down using a slotted spoon until it fluffs up.\"}, {\"Do not let it colour as it should remain white. Flip it over gently and remove from the oil.\"}, {\"Drain on some kitchen roll.\"}, {\"Fry the remaining dough in the same way.\"}', '{\"Calories\": \"308\", \"Fat (g)\": \"5\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"60\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"9\", \"Protein (g)\": \"11\", \"Salt (mg)\": \"192\"}', '', 'Pancake', 'breakfast', '20min'),
(24, 'Garlic Naan', '[\"1 tsp of dried active yeast\", \"1 tsp of sugar\", \"200g plain flour\", \"1 tsp of black onion seeds (you can also use handful of chopped coriander leaves)\", \"¼ tsp of salt\", \"½ tsp of baking powder\", \"1 tbsp vegetable oil\", \"2 tbsp of plain yoghurt\", \"2 tbsp of milk\", \"2 cloves garlic, thinly sliced\", \"1 tbsp ghee\"]', '{\"In a small bowl, mix the yeast and sugar with a tablespoon of warm water to activate. Leave for 5 minutes in a warm place until frothy.\"}, {\"Meanwhile, in a separate bowl mix the flour, onion seeds, salt and baking powder.\"}, {\"When the yeast is frothy add it to the flour with the oil, yoghurt and milk.\"}, {\"Knead the dough, with slightly wet hands, folding as you go until it is nice and soft.\"}, {\"Place the dough in a mixing bowl, cover it with cling film and leave it in a warm place to risexa0at least 1 hour (but longer if possible).\"}, {\"Divide the dough into four balls and place on a floured surface.\"}, {\"In a small pan heat some butter or ghee in a pan\"}, {\"Slice the garlic and stir into the pan. Cook the garlic gently to just soften, you don\"t want any colour of the garlic\"}, {\"Take a large ball of the dough and flatten a little place a spoon of the softened garlic (without too much of the butter) and put into the middle of the dough, fold the dough around so it is enclosed inside.\"}, {\"Pull up the dough to seal the filling inside then carefully roll into a tear shape about 0.5cm / ¼ inch thick.\"}, {\"Heat the tava or frying pan and turn on the grill to high to heat up. Place the naan onto the pan for about a minute or two to brown on one side.\"}, {\"Transfer to a baking tray (cooked side down) and cook under a hot grill for 2-5 minutes until all puffed up.\"}, {\"Smear with the garlic butter to serve.\"}', '{\"Calories\": \"354\", \"Fat (g)\": \"15\", \"of which saturates (g)\": \"7.1\", \"Carbohydrates (g)\": \"50\", \"of which sugars (g)\": \"3.4\", \"Fibre (g)\": \"2.0\", \"Protein (g)\": \"7.3\", \"Salt (mg)\": \"1.2\"}', '', 'Pancake', 'breakfast', '20min'),
(25, 'Chicken Pops', '[\"24 chicken wings\", \"oil to deep fry\", \"100g plain flour\", \"50g corn flour\", \"4 cloves of garlic\", \"4 cm fresh ginger\", \"1 tsp kashmiri chilli powder\", \"2 green chillies\", \"1 tsp salt\", \"1 tsp fennel seeds\", \"1 heaped tsp garam masala\", \"juice of 2 lemons\", \"a little water\"]', '{\"Prepare the chicken by cutting the wing at the joint and scraping all the meat down to the end so the bone is clean.\"}, {\"Blitz the ginger, garlic and chillies and empty into a bowl\"}, {\"Sieve the flour into the bowl and add the salt, fennel seeds, garam masala and lemon juice.\"}, {\"Whisk the mixture to get a lovely smooth batter. If it is too dry add a splash of water. You are looking for a lovely thick batter that will coat the chicken.\"}, {\"Add the chicken to the batter and leave it to marinade for about 20 minutes\"}, {\"Heat oil in a heavy based pan to about 180ºC\"}, {\"Deep fry the chicken for about 8 minutes until the pops are a wonderful golden brown colour.\"}, {\"Remove and drain on some kitchen roll. They should be lovely and crisp, make sure they are cooked through before serving.\"}', '{\"Calories\": \"185\", \"Fat (g)\": \"9.8\", \"of which saturates (g)\": \"2.7\", \"Carbohydrates (g)\": \"8.2\", \"of which sugars (g)\": \"2.2\", \"Fibre (g)\": \"0.2\", \"Protein (g)\": \"17\", \"Salt (mg)\": \"0.87\"}', '', 'Pancake', 'breakfast', '20min'),
(26, 'Healthy Chicken Korma', '[\"6-8 tbsp natural yoghurt\", \"1 tsp turmeric\", \"1 tsp cumin seeds, ground\", \"1 tsp cinnamon powder\", \"1 tsp coriander seeds, ground\", \"Pinch of saffron threads\", \"3cm fresh ginger, grated\", \"4 cloves garlic, crushed\", \"4 skinless free range chicken breast cubed\", \"1 tbsp rapeseed oil\", \"1 onion very finely chopped or grated\", \"2–3 tbsp ground almonds\", \"2 tbsp ground coconut\", \"1 tbsp flaked toasted almonds\", \"large pinch fresh coriander, chopped\"]', '{\"Grind your whole spices in a spice grinder.\"}, {\"Place the yoghurt into a bowl with the turmeric, cumin, cinnamon, coriander, saffron, ginger and garlic and mix well to combine the flavours.\"}, {\"Add the chicken pieces into the yoghurt mixture and coat all the chicken. Leave to marinade for as long as possible.\"}, {\"Heat some oil in a pan and cook the onion until it softens and just starts turning golden (you don\"t want them too brown). If the onions catch on the bottom of the pan, just add a splash of water to help them cook down.\"}, {\"Add the chicken and marinade to the pan and stir until the meat just starts to cook.\"}, {\"Reduce the heat and place the lid on the pan and leave to cook for 5 minutes.\"}, {\"Remove the lid and stir in the ground almonds and coconut. If it seems dry, add a little splash of hot water and allow the chicken to cook for a couple of minutes until the chicken is cooked through.xa0Remove the pan from the heat.\"}, {\"Toast some almond slivers in a dry pan until golden, remove and set to one side.\"}, {\"When ready to serve, add some fresh coriander and the toasted almonds.\"}', '{\"Calories\": \"266\", \"Fat (g)\": \"7\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"13\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"6\", \"Protein (g)\": \"31\", \"Salt (mg)\": \"11\"}', '', 'Pancake', 'breakfast', '20min'),
(27, 'Brown Lentil Dhal', '[\"200g brown lentils\", \"Approx. 1L of water\", \"2 tbsp butter/ghee/vegetable oil\", \"½xa0onion, chopped\", \"200g/½xa0tin of tomatoes\", \"1 tsp ginger, finely chopped\", \"1 tsp salt\", \"1 chilli, finely chopped\", \"1 tsp turmeric\", \"1 tsp garam masala\", \"Handful of coriander, chopped\"]', '{\"Place the lentils in the pressure cooker with about 700ml of cold water and one tsp salt.\"}, {\"Put the lid on the pan and secure it as instructed. Bring to the boil and allow the cooker to whistle three times.\"}, {\"Reduce heat and leave it to simmer for 10 minutes. Remove from the heat and leave to cool - DO NOT REMOVE THE LID.\"}, {\"In a frying pan heat the butter and add the onions and fry until lightly browned. Reduce the heat and add the tomatoes, ginger, chilli, turmeric and cook down so the tomatoes and onions melt, creating a thick masala paste. This will take about 10 minutes.\"}, {\"Ensure the steam has been released from the pressure cooker and open the lid.\"}, {\"Check the dhal is cooked by squeezing some lentils between your fingers. If they are still hard check the water level (add a little more if required) and re-place lid on the cooker and repeat as per step 2. Once the lentils are soft they are ready.\"}, {\"Add the masala paste to the cooked dhal and cook together for a few minutes.\"}, {\"Sprinkle in the garam masala and coriander to serve.\"}', '{\"Calories\": \"163\", \"Fat (g)\": \"4.1\", \"of which saturates (g)\": \"2.1\", \"Carbohydrates (g)\": \"22\", \"of which sugars (g)\": \"2.2\", \"Fibre (g)\": \"4.1\", \"Protein (g)\": \"11\", \"Salt (mg)\": \"1.4\"}', '', 'Pancake', 'breakfast', '20min'),
(28, 'Turnip Chana Dhal', '[\"4 small turnips\", \"125g Chana Dal\", \"1 small onion, sliced\", \"2 cloves of garlic, sliced\", \"3 ripe tomatoes\", \"1 or 2 green chillies\", \"4cm piece of ginger\", \"1 tbsp oil\", \"1 tsp cumin seeds\", \"4 cm piece cassia bark\", \"1 tsp mustard seeds\", \"1 tsp coriander seeds\", \"½ tsp red chilli powder\", \"½ turmeric powder\", \"1tsp or to taste salt\", \"handful fresh coriander, chopped\"]', '{\"Clean the chana dal and soak it in water for 3-4 hours before hand.\"}, {\"Peel, wash and cut turnips into small pieces.\"}, {\"Put the soaked dal and turnip pieces into a prerssure cooker, add 2 cups water, salt and then close the cooker and begin to heat.\"}, {\"After the first whistle reduce the heat and leave it to simmer about 4 minutes, then remove from the heat. Leave to cook and DO NOT open until the pressure has been releases.\"}, {\"Meanwhile roughly chop the tomatoes and chillies and ginger.\"}, {\"Place the cumin, mustard and coriander seeds in a frying pan and roast until they turn a shade darker and become frgrant. Crush the spices in a pestle and mortar or a spice grinder.\"}, {\"Then put the tomatoes, green chillies, ginger into a blender to make a fine paste.\"}, {\"Heat oil in a frying pan and add the cumin and cassia. Once fragrant add the sliced onions and garlic until they just start to brown.\"}, {\"Stir in the turmeric powder, salt and ground spices once this becomes fragrant stir in the tomato mixture and leave to cook until you have a thick masala sauce.\"}, {\"Open the cooker, and check the dhal is well cooked by squeezing the chana between your fingers. If they are cooked stir in the masala sauce into the dhal.\"}, {\"If you want to loosen it a little add enough hot water to get the consistency you want.\"}, {\"Add the chopped coriander and garnish with a little butter.\"}', '{\"Calories\": \"107\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"19\", \"of which sugars (g)\": \"9\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"4\", \"Salt (mg)\": \"527\"}', '', 'Pancake', 'breakfast', '20min'),
(29, 'Piri Piri Sauce', '[\"5-10 fresh red chillies, depending on how hot you want it\", \"2 dried smoked red chillies\", \"2 garlic cloves, roughly chopped\", \"1 tsp rock salt\", \"½ tsp oregano\", \"½ tbsp smoked paprika\", \"150ml olive oil\", \"100ml red wine vinegar\"]', '{\"Preheat the oven to 180°C and put all the chillies onto a roasting tray and roast them for 10 minutes.\"}, {\"Roughly chop the garlic and blanch in hot water for about 4 minutes.\"}, {\"Once roasted let the chillies cool and roughly chop them (use gloves and then wash your hands afterwards).\"}, {\"Place the chillies, blanched garlic, salt, oregano, paprika, olive oil and vinegar into a small saucepan, and bring to the boil then leave to simmer for about 2-3 minutes.\"}, {\"Once the mixture has cooled blend everything so it\"s the consistency of a fine pouring sauce. Store in a tight jar at room temperature. It will keep for about a month. Shake before using.\"}', '{\"Calories\": \"26\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"0\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"48\"}', '', 'Pancake', 'breakfast', '20min'),
(30, 'Dhum Aloo', '[\"20 new potatoes\", \"oil for deep-frying\", \"1xa0tsp Kashmiri chilli powder\", \"5 tbsp greek yoghurt\", \"5 green cardamom\", \"1 tsp ginger powder\", \"2 tbsp fennel seed, crushed\", \"1 tbsp mustard oil\", \"2 cloves, crushed\", \"¼xa0tsp asafoetida\", \"1 tsp salt\", \"1 tsp garam masala\", \"1 handful coriander, chopped\"]', '{\"Prick the potatoes all over with the help of a fork. Keep in salted water for fifteen minutes. Drain and wipe dry.\"}, {\"Heat oil in a karahi and deep-fry the potatoes on medium heat till golden brown. Drain on paper and set aside.\"}, {\"In a spice grinder grind 5 cardamoms and 1 tbsp fennel seed. Remove any husks if they do not grind to a powder.\"}, {\"Whisk this with the yogurt and the Kashmiri red chilli powder and ginger powder.\"}, {\"Heat the mustard oil in a pan. Add the crushed cloves and asafoetida. Add half a cup of water and salt to taste and bring the mixture to a boil.\"}, {\"Stir in the yogurt mixture and bring the mixture to a boil.\"}, {\"Add the fried potatoes and cook gently until the potatoes absorb the gravy and the oil surfaces (about 20 minutes).\"}, {\"Garnished with garam masala powder and fresh coriander\"}', '{\"Calories\": \"92\", \"Fat (g)\": \"3.5\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"14\", \"of which sugars (g)\": \"2.6\", \"Fibre (g)\": \"0.8\", \"Protein (g)\": \"2.7\", \"Salt (mg)\": \"1.3\"}', '', 'Pancake', 'breakfast', '20min'),
(31, 'Red Chilli Sauce', '[\"150g habanero chillies\", \"50g red birds eye chillies (or for a milder sauce jalapenos)\", \"1 large onion, sliced\", \"1 garlic bulb\", \"1 tsp salt (to taste)\", \"60ml vinegar\"]', '{\"Put kitchen gloves on and remove the stalks from the chillies.\"}, {\"Place on an oven tray with the whole bulb of garlic.xa0Heat the oven to 180°C andxa0roast for 15-20 minutes.\"}, {\"Peel the garlic cloves and place into a pan with the chillies.\"}, {\"Add the remaining ingredients to the pan and simmer for 30 minutes. Remove from the heat and leave to cool.\"}, {\"Pour into a liquidiser and blend to a fine puree. If you want the sauce to be a thick sauce then leave it as it is but for a thinner sauce sieve. Store in a sealed jar - this will keep for three weeks in the fridge.\"}', '{\"Calories\": \"29\", \"Fat (g)\": \"0.2\", \"of which saturates (g)\": \"0.0\", \"Carbohydrates (g)\": \"4.7\", \"of which sugars (g)\": \"3.8\", \"Fibre (g)\": \"0.4\", \"Protein (g)\": \"1.6\", \"Salt (mg)\": \"1.8\"}', '', 'Pancake', 'breakfast', '20min'),
(32, 'Coriander Fish', '[\"4-6 pieces of white fish, washed and dried\", \"1 tbsp turmeric powder\", \"1 tsp salt\", \"2 tbsp oil\", \"large handful of coriander with stalks, washed\", \"6 garlic cloves\", \"1 or 2 green chillis\", \"1 tbsp fenugreek seeds\", \"1 tbsp coriander seeds\", \"2 tomatoes, finely chopped\", \"1 tbsp garam masala\", \"1 lemon\"]', '{\"Sprinkle the fish with salt and turmeric powder and leave to marinade for 15 minutes.\"}, {\"In a blender grind the fresh coriander, garlic and green chillies to create a fragrant paste.\"}, {\"Heat oil and shallow fry the marinated fish pieces, drain on kitchen paper and set to one side.\"}, {\"While heating the oil in a pan, crush the fenugreek and coriander seeds in a pestle and mortar then add the powder to the pan for a few seconds until fragrant.\"}, {\"Mix the masala paste into the pan and fry for 2-3 minutes.\"}, {\"Add the chopped tomatoes and cook for 5-10 minutes until the tomatoes break down.\"}, {\"Stir in a cup water and bring the sauce to the boil, then reduce the heat and place the fried fish slices into the sauce. Coat the fish and cook for 5 minutes until the fish is cooked through.\"}, {\"Check the seasoning and sprinkle with garam masala and a good squeeze of lemon then serve hot with rice.\"}', '{\"Calories\": \"217\", \"Fat (g)\": \"9\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"17\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"20\", \"Salt (mg)\": \"696\"}', '', 'Pancake', 'breakfast', '20min');
INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(33, 'Chettinad Chicken', '[\"1 tbsp poppy seeds\", \"1 tsp coriander seeds\", \"1 tsp cumin seeds\", \"1 tsp fennel seeds\", \"3 dry red chillies\", \"3cm piece of cinnamon\", \"2 cardamom pods\", \"3 cloves\", \"50g grated coconut\", \"2 tsp ginger\", \"2 garlic cloves crushed\", \"2 tbsp oil\", \"10 curry leaves\", \"2 onions sliced finely\", \"1 star anise\", \"2 tomatoes\", \"½ tsp turmeric\", \"1 tsp chilli powder\", \"8 chicken thighs, skinned\", \"salt to taste\", \"2 limes\", \"handful of fresh coriander leaves, chopped\"]', '{\"Heat a heavy pan on a gentle heat and roast the poppy, coriander, cumin and fennel seeds, dry red chillies, cinnamon, cardamom, cloves and coconut for 3-4 minutes.\"}, {\"Remove from the heat and transfer to a bowl and leave to cool.\"}, {\"Once cooled, grind to a fine powder in a spice grinder.\"}, {\"Crush the garlic and ginger in a pestle and mortar and keep aside.\"}, {\"In a large pan, heat the oil and add the curry leaves. When they stop spluttering, add the sliced onions and fry till they are light brown then add the crushed garlic and ginger.\"}, {\"Add the ground spices and star anise and fry for a minute before adding a splash of water.\"}, {\"Meanwhile chop and add the tomatoes, turmeric, salt and stir in the chilli powder.\"}, {\"Add the chicken, cover and leave to simmer on the lowest setting until it is tender about 25 minutes.\"}, {\"Once the chicken is cooked through squeeze in the lime juice and remove from the heat.\"}, {\"Throw in the fresh coriander leaves and serve.\"}', '{\"Calories\": \"145\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"3.4\", \"Carbohydrates (g)\": \"3.1\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"1.1\", \"Protein (g)\": \"8.7\", \"Salt (mg)\": \"0.09\"}', '', 'Pancake', 'breakfast', '20min'),
(34, 'Coastal Squid Curry', '[\"1 tsp cumin seeds\", \"1 tsp coriander seeds\", \"1 tsp fenugreek seeds\", \"1 tsp black mustard seeds\", \"4 garlic cloves\", \"2 fresh red chillies\", \"50g fresh coconut, grated or finely chopped\", \"1 tsp ground turmeric\", \"3 tbsp vegetable oil\", \"1 tsp black mustard seeds\", \"1 onion, thinly sliced\", \"4 garlic cloves, finely sliced\", \"4cm fresh ginger, grated\", \"2 fresh red chillies, sliced\", \"1 tsp Kashmiri chilli powder\", \"1 tsp salt\", \"50ml tamarind paste or tamarind water\", \"1 tsp jaggery or soft brown sugar\", \"400g cleaned squid, cut into rings\", \"1 small tomato, chopped\", \"handful fresh coriander leaves, chopped\"]', '{\"Grind all the dry spices (cumin, coriander,xa0fenugreek andxa0mustard seeds) to a powder in a spice grinder or a pestle and mortar.\"}, {\"Into a mini food processor add the garlic, chillies,xa0coconut, about 50-60ml of water andxa0the ground spices. Blend to a paste.\"}, {\"Add the turmeric.\"}, {\"Heat the oil in a karahi over a medium heat and add the mustard seeds. Fry until they begin to pop, then stir in the onion and fry for five minutes.\"}, {\"Add the garlic, ginger and green chilli and fry for one minute.\"}, {\"Add the masala paste, chilli powder and salt. Cook for 3-4 minutes (add a splash of water if required).\"}, {\"Stir in thexa0tamarind liquid and jaggery. Stir it through.\"}, {\"Add the squid and chopped tomato then leave toxa0simmer for a couple of minutes. The squid will cook very quickly, so ensure it stays tender.\"}, {\"Remove from the heat, finish with some fresh greenxa0coriander and serve.\"}', '{\"Calories\": \"246\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"13\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"18\", \"Salt (mg)\": \"603\"}', '', 'Pancake', 'breakfast', '20min'),
(35, 'Sooke Moong Dhal', '[\"200g whole moong dhal / mung beans\", \"1 tbsp oil\", \"¼ tsp mustard seeds\", \"¼ tsp cumin seeds\", \"¼ tsp asafoetida\", \"¼ tsp turmeric\", \"1xa0tsp chilli powder\", \"1 tsp coriander seeds, crushed\", \"2 tsp lemon juice\", \"1 tsp salt\", \"Pinch of sugar (optional)\", \"Fresh coriander, chopped\"]', '{\"Soak the moong dhal for about 15 minutes.\"}, {\"Put the soaked moong dhal and 350ml water into your pressure cooker.\"}, {\"Place the lid on and cook at high pressure for 10 minutes then turn off and leave for the pressure to be released.\"}, {\"In a pan heat oil add mustard seeds, cumin and asafoetida until they sizzle.\"}, {\"Pour in the moong dhal and add the turmeric, chilli powder, coriander, lemon juice, sugar (if using) and salt.\"}, {\"Stir together and garnish with fresh coriander. Mix and serve hot.\"}', '{\"Calories\": \"78\", \"Fat (g)\": \"3.3\", \"of which saturates (g)\": \"1.9\", \"Carbohydrates (g)\": \"9.4\", \"of which sugars (g)\": \"2.3\", \"Fibre (g)\": \"1.3\", \"Protein (g)\": \"3.7\", \"Salt (mg)\": \"1.3\"}', '', 'Pancake', 'breakfast', '20min'),
(36, 'Lamb Burgers', '[\"400g minced lamb,\", \"1 medium onion, very finely diced\", \"1 tsp salt\", \"twist of black pepper\", \"½ tsp red chilli powder (optional)\", \"1 tsp cumin seeds, crushed\", \"2 tsp garam masala\", \"Handful mint, finely chopped\", \"sliced cheese\"]', '{\"Place the lamb mince in a large bowl and add all the other ingredients and mix together using your hands to ensure all the spices are evenly distributed.\"}, {\"Wash hands and rub them with a little oil. This helps to shape the patty and stops the mixture sticking to your hands.\"}, {\"Split the mixture into 4 portions and shape each one into a patty\"}, {\"Place the burger into a hot griddle, tava or frying pan and cook for 5-10 minutes then turn. Make sure it\"s cooked through and browned on the outside.\"}, {\"Place some sliced cheese on top of the burger and cover with a pan lid for a few seconds to steam. Remove and place on your toasted bun.\"}, {\"Serve with any burger accompaniments you like - for me it has to be garlic mushrooms, chilli sauce, salad and red onion rings.\"}', '{\"Calories\": \"161\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"4.8\", \"Carbohydrates (g)\": \"2.0\", \"of which sugars (g)\": \"1.1\", \"Fibre (g)\": \"0.3\", \"Protein (g)\": \"15\", \"Salt (mg)\": \"1.4\"}', '', 'Pancake', 'breakfast', '20min'),
(37, 'Makki Di Roti', '[\"250g corn meal\", \"125ml water\", \"½ tsp carom seeds\", \"1 tsp butter / oil for frying\", \"pinch salt\", \"corn flour for dusting\"]', '{\"Mix all the dry ingredients in a large bowl.\"}, {\"Add half of the water and knead to bring the flour together into a firm dough.\"}, {\"Heat up a tava or frying pan to a medium heat.\"}, {\"Break off medium sized pieces of the dough (golf ball size) and roll into a ball with your hands. Flatten this out and with some dusting corn flour start to roll out the dough into round circles with a rolling pin. This dough will stick so be careful and dust when needed then turn it over and roll again.\"}, {\"Once it\"s about the size of a side plate and 1cm thick, very gently lift it and place it on the heated pan for a minute or so until it starts to cook (keep an eye on the heat and adjust as required).\"}, {\"Turn the roti over to cook the other side and smear the top side with some butter. After a minute turn it over again and smear the second side as well. Once cooked it will be a wonderful yellow colour with mottled brown spots all over serve hot with some creamy saag or lentils.\"}', '{\"Calories\": \"359\", \"Fat (g)\": \"1.7\", \"of which saturates (g)\": \"0.7\", \"Carbohydrates (g)\": \"91\", \"of which sugars (g)\": \"0.0\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"0.6\", \"Salt (mg)\": \"0.15\"}', '', 'Pancake', 'breakfast', '20min'),
(38, 'Spicy Lemon Roasted Potatoes', '[\"1kg new potatoes, washed\", \"4 tbsp rapeseed oil\", \"¼xa0tsp asafoteda\", \"½xa0tsp turmeric\", \"1 tbsp coriander, seeds, crushed\", \"1 tsp cumin seeds, crushed\", \"½xa0tsp chilli powder\", \"1 tbsp fenugreek powder\", \"1 tsp salt\", \"1 tbsp mango powder\", \"1 lemon\"]', '{\"Wash the potatoes andxa0heat the oil in a pan.\"}, {\"Add the aseofetda and turmeric once it sizzlesxa0add the potatoes and coat in the oil.\"}, {\"Crush the cumin and coriander seeds and sprinkle into the pan. Add the chilli powder, fenugreek and salt.\"}, {\"Reduce heat and place the lid on the pan,xa0stir every 5-10 mins for about 50 minutes until the potaotes are crisp on the outside and soft inside.\"}, {\"Remove from the heat and dust with the armchoor and squeeze in the juice from one lemon before serving.\"}', '{\"Calories\": \"219\", \"Fat (g)\": \"10\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"30\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"4\", \"Salt (mg)\": \"387\"}', '', 'Pancake', 'breakfast', '20min'),
(39, 'Ghee', '[\"4 blocks of unsalted butter (gives approx. 500g ghee)\"]', '{\"Gently melt unsalted butter over low heat until the butter melts. Bring to a gentle boil and simmer for about 15-20 minutes.\"}, {\"Whilst cooking start to carefully skim off the top layer of white froth using a spoon. These are the whey proteins which need to be removed.\"}, {\"When the butter stops producing this white foam on the surface and the milkxa0sediment begins to stick to the bottom of the pan remove from the heat and leave to settle.\"}, {\"Once cooled, strain the mixture through a fine sieve or a cheesecloth-lined strainer. Try to keep the solids in the pan.\"}, {\"The liquid collected is the clarified butter (butterfat) that can be covered and stored for up to 12 months. There is no need to refrigerate ghee as there is no risk of it going rancid.\"}', '{\"Calories\": \"744\", \"Fat (g)\": \"82\", \"of which saturates (g)\": \"52\", \"Carbohydrates (g)\": \"0.6\", \"of which sugars (g)\": \"0.6\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"0.6\", \"Salt (mg)\": \"1.5\"}', '', 'Pancake', 'breakfast', '20min'),
(40, 'Creamy Mushroom Curry', '[\"400g button mushrooms, washed\", \"2 tbsp vegetable oil\", \"4cm piece fresh ginger, chopped\", \"1 large onion, peeled and diced\", \"3 cloves of garlic, finely chopped\", \"1 green chilli\", \"3 tbsp natural Greek yoghurt\", \"1 tsp tomato purée\", \"2 tsp coriander seeds, crushed\", \"½ turmeric\", \"¼ tsp salt\", \"½xa0tsp Kashmiri chilli powder (optional)\", \"Handful fresh coriander, chopped\"]', '{\"Heat 1 tbsp of the oil in a non-stick frying pan and heat over a high heat. Once hot, add 400g of mushrooms and fry them for about 3-4 minutes. By cooking them like this they will lose their rawness and will take on more flavour when they are added to the masala sauce. Empty them into a bowl and set to one side.\"}, {\"Either chop up the 4 cm ginger, large onion, 3 garlic cloves and green chilli very finely or blend them all in an electric grinder along with a splash of water until you have a smooth paste.\"}, {\"Put the remaining tbsp. of oil into the pan and heat. Once it\"s hot, add the chopped onion, ginger, chili and garlic. Stir and cook until it starts to just brown.\"}, {\"Reduce the heat and stir in 1 tbsp of the yoghurt until it melts into a sauce, then stir in a second spoonful, again leave it to melt into the sauce and do the same with the third spoonful yoghurt.\"}, {\"Now add 1 tsp tomato purée and fry for a minute or two.\"}, {\"Sprinkle in remaining spices; 2 tsp crushed coriander seeds, ½ tsp turmeric, ½ tsp salt and ½ tsp chilli powder. Stir and bring to a simmer.\"}, {\"Add the pre-cooked mushrooms and any juices, then stir to coat them with the sauce. If it feels dry add a splash of water.\"}, {\"Reduce the heat to a low setting and simmer for 5 minutes until the mushrooms are cooked through. If you want to create slightly more of a sauce then add about 100m water.\"}, {\"Sprinkle with some fresh coriander and serve on a thick slab of fresh toast or with some naan.\"}', '{\"Calories\": \"65\", \"Fat (g)\": \"5.4\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"2.5\", \"of which sugars (g)\": \"1.8\", \"Fibre (g)\": \"1.0\", \"Protein (g)\": \"2.3\", \"Salt (mg)\": \"0.32\"}', '', 'Pancake', 'breakfast', '20min'),
(41, 'Thari Walee Lamb', '[\"600g leg of lamb (washed, trimmed & cubed)\", \"2 tbsp of oil\", \"2 large onions, peeled and diced\", \"6 cloves of garlic, finely chopped\", \"2 tbsp ginger, grated\", \"400g plum tomatoes\", \"1 tsp of turmeric\", \"1 tsp of cumin\", \"1 tsp of salt\", \"Handful coriander stalks, chopped\", \"2 chillies, finely chopped\", \"1 tsp of dried fenugreek leaves\", \"1 tsp of garam masala\", \"Handful coriander leaves, chopped\"]', '{\"Heat the oil in a heavy based pan and add the onions, after a few minutes stir in the chopped garlic.\"}, {\"Cook on a gentle heat so the onions cook to a dark golden brown. This will take at least 20 minutes. If the onions catch on the pan add a splash of water and stir.\"}, {\"Reduce the heat and add the tomatoes, ginger, salt, cumin, turmeric, chilli, coriander stalks and fenugreek. Stir together and increase the heat so the onions and tomatoes melt with the spices creating a thick aromatic masala sauce. This will take about 5-10 minutes.\"}, {\"Add the lamb and stir-fry to seal the meat and coat with the masala sauce.\"}, {\"Reduce the heat to the lowest setting and move the pan to the smallest hob. Place the lid on the pan and allow the lamb to cook gently in it own juices. This will take between 40-60 minutes. Stir occasionally until tender.\"}, {\"If you want more of a gravy add some boiling water and leave to simmer for another few minutes.\"}, {\"Remove from the heat and add the garam masala, sprinkle with the fresh coriander and serve.\"}', '{\"Calories\": \"504\", \"Fat (g)\": \"39\", \"of which saturates (g)\": \"12\", \"Carbohydrates (g)\": \"28\", \"of which sugars (g)\": \"8\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"30\", \"Salt (mg)\": \"683\"}', '', 'Pancake', 'breakfast', '20min'),
(42, 'Hot Fiery Chicken Wings', '[\"600g chicken wings\", \"1 tsp vegetable oil\", \"1 tsp salt\", \"1 red chilli, finely chopped\", \"1 tsp hot chilli powder\", \"1 tsp chilli flakes\", \"1 tsp garam masala\", \"Juice from 1 lemon\", \"Handful fresh coriander, chopped\"]', '{\"Using some kitchen roll wipexa0the inside of a wok or karahi with a teaspoon of oil.\"}, {\"Place the wings into the pan and begin to cook on a high heat for 15 minutes.\"}, {\"Turn the wings and leave to cook for a further 15 minutes.\"}, {\"They may stick to the pan so just leave them and they will come away once cooked. The wings will start to become crisp.\"}, {\"Continue to cook for a further 15-20 minutes or so until they go a golden brown and crisp up.\"}, {\"Check they are cooked through then remove from the karahi and discard the fat.\"}, {\"Place into a large bowl and while they are still hot sprinkle with salt, chopped chilli, chilli powder, chilli flakes, garam masala, fresh coriander, and a good squeeze of lemon. Toss or stir to coat them all in the spices. Serve with a crisp salad and a cooling yoghurt dip.\"}', '{\"Calories\": \"151\", \"Fat (g)\": \"9.5\", \"of which saturates (g)\": \"2.5\", \"Carbohydrates (g)\": \"2.6\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"1.8\"}', '', 'Pancake', 'breakfast', '20min'),
(43, 'Aloo Gobi', '[\"1 small cauliflower\", \"2 potatoes, peeled cut into 4cm cubes\", \"2 tbsp mustard oil\", \"1 tsp mustard seeds\", \"1 tspxa0cumin seeds\", \"1 onion, finely chopped\", \"2 cloves garlic, finely chopped\", \"200g/½xa0tin tomatoes\", \"1 tbsp ginger, grated\", \"1 tspxa0salt\", \"1 tspxa0turmeric\", \"1 chilli, finely chopped\", \"1 tspxa0dried fenugreek\", \"1 tspxa0garam masala\", \"Handful chopped fresh coriander\"]', '{\"Prepare your cauliflower by cutting into florets, wash and drain. Ensure it\"s thoroughly dry before cooking.\"}, {\"Heat the oil in a karahi and add the mustard seeds. Once sizzling add the cumin seeds.\"}, {\"Add the onions and garlic then fry until soft and lightly browned.\"}, {\"Once browned reduce the heat a little and add the tomatoes, ginger, salt, turmeric, chilli and dried fenugreek leaves.\"}, {\"Continue to cook so the onions and tomatoes melt together to create a thick, aromatic masala paste.\"}, {\"Add the potatoes and stir to coat with the sauce.\"}, {\"Reduce the heat, cover the pan with the lid and leave to cook for 10 minutes, stirring occasionally.\"}, {\"Add the cauliflower and stir into the sauce to coat. Replace lid and leave to cook for a further 25-30 minutes until cooked.\"}, {\"Turn the vegetables occasionally but do not stir too vigorously as you don\"t want the cauliflower or potato to turn mushy. Once cooked sprinkle with garam masala and fresh coriander before serving.\"}', '{\"Calories\": \"293\", \"Fat (g)\": \"10\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"45\", \"of which sugars (g)\": \"13\", \"Fibre (g)\": \"8\", \"Protein (g)\": \"18\", \"Salt (mg)\": \"729\"}', '', 'Pancake', 'breakfast', '20min'),
(44, 'Gol Guppa', '[\"200g fine semolina\", \"4 tbsp plain flour, plus some for dusting\", \"Salt, pinch\", \"Black pepper, pinch\", \"130ml sparkling water\", \"Vegetable oil for frying\", \"125ml tamarind pulp\", \"2 tbsp roasted cumin seeds, crushed\", \"50g coriander leaves, (small handful)\", \"3 green chillies\", \"80g mint leaves, (large handful)\", \"1 tbsp black salt\", \"2 tbsp jaggary, crushed\", \"450ml water\", \"85g seedless tamarind\", \"80g seedless dates\", \"40g grated jaggery (or brown sugar)\", \"450ml water\", \"½ tsp coriander seeds, crushed\", \"½ tsp cumin seeds, crushed\", \"½ tsp dry ginger powder\", \"½ tsp red chilli powder\", \"1 tsp black salt, or rock salt\", \"1 tsp veg oil\", \"1x400g can of chickpeas (and, or 3 medium potatoes)\", \"1 small onion, finely diced\", \"2 tbsp chopped coriander leaves\", \"1 tsp roasted cumin powder\", \"1 tsp chaat masala powder\", \"¼ tsp red chilli powder (optional)\", \"1 tsp black salt\"]', '{\"To make the puris, place the semolina, flour, a pinch of salt and pepper into a bowl, and gradually add the sparkling water.\"}, {\"Stir continuously until the mixture comes together and forms a soft dough. Place into a bowl that has been dusted with flour and cover with a damp tea towel for about 30 minutes.\"}, {\"Place a large, deep pan or a wok on a gentle heat and pour in the vegetable oil and allow it to get really hot.\"}, {\"Separate the dough into 4 bits and roll it out so it\"s thin (about 1mm thick). Using a 5cm cutter cut out as many circles as you can. Or take small grape sized balls of the puri dough and roll into a ball with your hands. On a floured surface roll it out to make thin, flat circles, about 5-6cm across.\"}, {\"To test if it\"s hot enough, drop a tiny piece of dough into the pan – if it floats to the surface and starts to sizzle, it\"s ready.\"}, {\"Very gently slide in one circle of puri dough and fry for 2 to 3 minutes. Then using your spoon to push them under the oil, then carefully flip them over and continue cooking for 1-2 minutes, until it\"s golden and crisp. Transfer to a kitchen paper to drain, and repeat with the remaining dough.\"}, {\"Place all the green pani ingredients, into a liquidiser. Make sure the jaggery has dissolved a little then and blitz until smooth.\"}, {\"Line a sieve with muslin, place over a large bowl and sieve the mixture to get an intense, flavoured water.\"}, {\"In a pan, take the seedless tamarind, seedless dates and water. Cook for about 10 mins on a gentle heat.\"}, {\"Add the jaggery and stir. Once it has dissolved the mixture will thicken a little.\"}, {\"Stir in all the spices and salt then leave to simmer for a few more minutes. Remove from the heat and leave to cool.\"}, {\"Pour the chutney mixture into a blender and grind until the chutney is smooth. Add a little water if required then strain the chutney through a sieve.xa0This can be store in a jar and keep in the refrigerator for up to 3 weeks.\"}, {\"Boil the potatoes till they are cooked through. Peel and then chop them into small pieces.\"}, {\"Place 1 tbsp of oil into a pan and add the chickpeas sprinkle in cumin, chilli powder, salt and heat through. Using your spoon mash them a little and set to one side.\"}, {\"Finely chop the onion.\"}, {\"In a small bowl, mix the chickpeas (and potatoes if using), onions, coriander leaves. Mix well and keep aside.\"}, {\"Make a hole in the top of the puri with your finger.\"}, {\"Fill with a little spiced chickpea mixture, add a dollop of the date and tamarind chutney, fill with the green water and put the whole thing in your mouth and let you taste buds dance.\"}', '{\"Calories\": \"236\", \"Fat (g)\": \"1.5\", \"of which saturates (g)\": \"0.0\", \"Carbohydrates (g)\": \"53\", \"of which sugars (g)\": \"16\", \"Fibre (g)\": \"1.1\", \"Protein (g)\": \"6.8\", \"Salt (mg)\": \"3.6\"}', '', 'Pancake', 'breakfast', '20min'),
(45, 'Kachumber Salad', '[\"1 small red onion\", \"½xa0cucumber\", \"1 tomato\", \"Fresh coriander leaves\", \"1 lemon\", \"1 tsp salt\", \"½ tsp garam masala\"]', '{\"Cut the onions, cucumber, tomato into a very fine dice and place into a bowl.\"}, {\"Finely chop the coriander and place into the bowl.\"}, {\"Squeeze in the lemon and sprinkle in the salt and garam masala - stir and serve.\"}', '{\"Calories\": \"11\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"3\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"272\"}', '', 'Pancake', 'breakfast', '20min'),
(46, 'Nimbu ka Achaar (Lemon Pickle)', '[\"4 limes, washed and cut into 8 chunks (skin on - remove pips)\", \"2 tbsp salt\", \"1 tsp turmeric\", \"1 tbsp chilli powder (adjust to taste)\", \"3 tbsp mustard oil\", \"1 tsp brown mustard seeds\", \"1 tsp fenugreek seeds\", \"1 tsp kalonji seeds (nigella)\", \"½ tsp asafoetida\", \"3 dried red chillies (optional)\"]', '{\"Sterilise a glass jar and add the chopped limes, salt, chilli powder and turmeric.\"}, {\"Put the lid on the jar and shake.\"}, {\"Leave the jar on a window sill (preferably in the sun) for one month.xa0Ensure you give the jar a shake everyday.\"}, {\"After one month heat the mustard oil to smoking point then leave to cool.\"}, {\"Once cooled, reheat and add the mustard, fenugreek, kalonji seeds, asafoetida and dried chillies until they sizzle. Cool and pour the spiced oil into the jar with the limes.xa0Shake and leave for a few days before using.\"}, {\"After step 1 above squeeze the juice from the limes and set the juice to one side. Put the limes into a steamer for about 15 minutes until they are soft. Leave to cool.\"}, {\"Add the juice back into the limes and place in a jar and leave for 2 days. Ideally on a window sill inthe sun. Ensure you shake the jar every few hours.\"}, {\"Move to step 4 as above.\"}', '{\"Calories\": \"36\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"3\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"867\"}', '', 'Pancake', 'breakfast', '20min'),
(47, 'Achaari Bangun', '[\"1 tsp fennel seeds\", \"1 tsp mustard seeds\", \"1 tsp fenugreek seeds\", \"1 tsp nigella seeds (kalonji)\", \"½ tsp cumin seeds\", \"½ tsp chilli flakes\", \"1-2 Aubergines, washed and chopped into 5cm pieces\", \"1 tbsp mustard oil or Rapeseed oil\", \"½ tspxa0cumin seeds\", \"½ tsp asafoetida\", \"1 onion, sliced\", \"2 potatoes, peeled and diced 3cm pieces.\", \"2 cloves garlic, sliced\", \"2 tomatoes, diced\", \"1 tsp salt\", \"1 tsp ginger, grated\", \"2 chillies, sliced\", \"1 tsp turmeric\", \"1 tsp Kashmiri chilli powder\", \"1 tsp coriander seeds, ground\", \"1 tsp mango powder (amchoor)\", \"handful coriander leaves, chopped\"]', '{\"In a heavy bottom pan, dry roast all the spices on a medium low heat until fragrant and nutty. Shake the pan so they don\"t burn. Remove from the heat and put into a bowl so they don\"t continue to cook.\"}, {\"Allow the spices to cool completely then in a spice grinder blitz to a fine powder.\"}, {\"If using mustard oil heat to smoking then allow to cool before cooking. Add the oil to the pan to warm.\"}, {\"Add the cumin seeds and asafoetida once fragrant add the sliced onion and stir to cook until just starting to colour.\"}, {\"Stir in the sliced garlic for about 2 minutes before adding the chopped tomatoes.\"}, {\"Stir and cook until the tomatoes begin to break down. You may need to add a little water to help them cook.\"}, {\"Stir in the salt, ginger and chillies along with the achaari spice mix, turmeric, chilli powder, ground coriander seeds and mango powder. Mix and cook for another 2-3 minutes.\"}, {\"Stir in the diced potatoes and coat with the masala reduce the heat to the lowest setting andxa0 leave for a few minutes with the lid on the pan.\"}, {\"Add the aubergine, stir to coat, cover and cook until the veggies are soft and tender. You shouldn\"t need to add any water if its on a very low heat but if you want to help them cook more quickly you can add about 50ml\"s.\"}, {\"Stir occasionally after about 20 minutes the potatoes and aubergine should be soft.\"}, {\"Garnish with chopped coriander leaves, a few kalongi seeds and serve with lots of fresh roti\"s.\"}', '{\"Calories\": \"46\", \"Fat (g)\": \"1.8\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"7.0\", \"of which sugars (g)\": \"2.2\", \"Fibre (g)\": \"1.4\", \"Protein (g)\": \"1.4\", \"Salt (mg)\": \"0.65\"}', '', 'Pancake', 'breakfast', '20min'),
(48, 'Nariyal Chicken', '[\"500g chicken thighs, trimmed and cut into bite size chunks\", \"1 tbsp coconut oil\", \"1 tsp cumin seeds\", \"2 medium onions, blended in a food processor to a grated consistency\", \"200g/½xa0tin plum tomatoes\", \"1 tsp salt\", \"1 tsp turmeric\", \"½xa0tsp chilli powder (optional)\", \"2 to 3 green chillies, chopped\", \"200ml coconut cream\", \"1 tsp of garam masala\", \"Handful fresh coriander, chopped\"]', '{\"Heat the coconut oil in a pan until it melts and add cumin seeds. When sizzling and aromatic add the onions and fry until a golden colour.\"}, {\"Add the tomatoes, salt, turmeric, chilli powder and fresh chillies. Stir together and leave to cook so the tomatoes break down and you\"re left with a thick paste.\"}, {\"Pour in the coconut cream and cook gently for a few minutes so the flavours combine. Add the meat and stir to coat with the sauce.\"}, {\"Reduce the heat to the lowest setting and place the lid half on the pan and leave to cook for about 10 minutes until cooked.\"}, {\"Taste the sauce and adjust seasoning if required\"}, {\"Remove from heat and add garam masala and throw in the fresh coriander to serve.\"}', '{\"Calories\": \"133\", \"Fat (g)\": \"9.1\", \"of which saturates (g)\": \"6.0\", \"Carbohydrates (g)\": \"3.1\", \"of which sugars (g)\": \"2.6\", \"Fibre (g)\": \"0.4\", \"Protein (g)\": \"10\", \"Salt (mg)\": \"0.69\"}', '', 'Pancake', 'breakfast', '20min'),
(49, 'Cucumber Raita', '[\"½xa0cucumber (more if you want)\", \"200ml low-fat natural set yoghurt (I also like to use Greek yoghurt)\", \"1 tsp garam masala\", \"1 tsp Kashmiri chilli powder\"]', '{\"Carefully grate the cucumber, leaving the skin on.\"}, {\"Either using a cloth or just your hands, squeeze any excess liquid from the cucumber.\"}, {\"Once it is drained place in a small bowl.\"}, {\"Add the yoghurt and garam masala and stir the cucumber through.\"}, {\"Sprinkle the chilli on top to serve.\"}', '{\"Calories\": \"32\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"4\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"18\"}', '', 'Pancake', 'breakfast', '20min'),
(50, 'Punjabi Style Stuffed Karela', '[\"6 bitter gourds (karela)\", \"1 tsp cumin seeds, crushed\", \"1 large onion, finely chopped\", \"3 tbsp mustard oil\", \"4 cloves garlic, finely chopped\", \"3 cm piece ginger, finely chopped\", \"1 tsp salt\", \"2 chillies, chopped\", \"1 tsp turmeric\", \"1 tsp amchoor\", \"1 tsp coriander seeds,crushed\", \"1 tsp fennel seeds, crushed\", \"\"]', '{\"Prepare the karela by washing and drying them then using a peeler peel off the bumpy green skin and keep in a bowl.\"}, {\"Slice open the tummy of each karela without going all the way through and scrape out the inside including the seeds using a teaspoon into the same bowl. This will make the stuffing.\"}, {\"Heat mustard oil in a cast iron pan and add the cumin seeds, as these sizzle and become fragrant stir in the onions and fry until translucent\"}, {\"Add the ginger and garlic and then the stuffing. Fry until the onions are golden brown (5-10 minutes). This is very important as the seeds will crisp up.\"}, {\"Once browned stir in the amchoor, fennel, coriander, chilli, salt and turmeric. Fry for a few seconds and remove from the heat.\"}, {\"Once cooled use a spoon or your hands and stuff the skins with equal amounts of the mixture. Hands are better as you will also cover the outside with the juices and oils from the stuffing as well.\"}, {\"Press the stuffing into the skins. You can use a little cotton thread to wrap around each one to help hold their stuffing in.\"}, {\"To cook the Karela you can either fry them or bake them. So either place the karela back into the pan with a little oil and cook them evenly until they turn a golden brown colour all over. Or place onto an oven tray and cook in the oven for 30 minutes until soft and browned all over. These are delicious served with a red lentil dhal, plain yoghurt and roti. Once cooked the karela will keep refrigerated for up to a week.\"}', '{\"Calories\": \"114\", \"Fat (g)\": \"8\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"11\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"392\"}', '', 'Pancake', 'breakfast', '20min'),
(51, 'Spiced Fish Pie', '[\"2 tbsp oil\", \"1 tsp fennel seeds\", \"½ tsp mustard seeds\", \"1 onion, chopped\", \"2 garlicxa0cloves, finely chopped\", \"1 large handful of fresh spinach, chopped\", \"1 chilli, chopped\", \"400ml cream\", \"400g firm white fish\", \"200g salmon\", \"100g smoked fish\", \"300g prawns\", \"salt and pepper to taste\", \"2 or 3 large sweet potatoes, boiled\", \"1 tbsp ghee\", \"2 spring onions, chopped\", \"A pinch chilli flakes (more for extra heat)\", \"1 tsp garam masala\"]', '{\"Heat oven to 200°C.\"}, {\"Heat the oil and temper the fennel and mustard seeds until they crackle. Add the xa0chopped onion and cook for 5 minutes.\"}, {\"Stir in the garlic and cook through allowing the onions to soften and turn translucent.\"}, {\"Add the chopped spinach and chilli and once the spinach has wilted pour in the cream and stir. Season with the salt and pepper.\"}, {\"As the cream warms up place the fish and prawns into the pan and simmer gently for a few minutes until it\"s just cooked through.\"}, {\"Remove from heat and place in a casserole dish.\"}, {\"Mash the sweet potatoes and add the ghee, garam masala and spring onions and stir to combine.\"}, {\"Cover the fish with the potatoes and sprinkle it with chilli flakes.\"}, {\"Bake in the oven for 20-25 minutes, until the top is golden brown and the pie is bubbling.\"}', '{\"Calories\": \"127\", \"Fat (g)\": \"7.7\", \"of which saturates (g)\": \"3.4\", \"Carbohydrates (g)\": \"4.2\", \"of which sugars (g)\": \"2.6\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"11\", \"Salt (mg)\": \"0.26\"}', '', 'Salad', 'lunch', '20min'),
(52, 'South Indian Crab Curry', '[\"2 tbsp oil\", \"1 tsp fennel seeds\", \"1 tsp mustard seeds\", \"10 – 12 curry leaves\", \"1 tsp cumin seeds\", \"4 cm piece fresh ginger, finely sliced\", \"2 large cloves garlic, peeled and finely sliced\", \"1 medium white onion, peeled and finely sliced\", \"3 fresh red chillies, finely sliced\", \"2 tomatoes, chopped into small dices\", \"1 tsp turmeric\", \"1 tsp Kashmiri chilli powder\", \"250g brown crabmeat\", \"400ml coconut milk\", \"1 lemon\", \"400g white crabmeat,\", \"4/5 crab claws\", \"large handful fresh coriander, chopped\", \"sea salt to taste\"]', '{\"Heat 2 tbsp of oil in a large pan and add 1 tsp of each fennel seeds, mustard seeds and cumin seeds as well as 10-12 curry leaves.\"}, {\"Stir in 1 sliced onion, slices from 4 cm chunk of ginger, 2 large garlic cloves, and 3 fresh chopped chillies. Fry on a medium heat for 4 to 5 minutes until lightly golden, then add 2 chopped fresh tomatoes and sauté until they soften.\"}, {\"Add the 1 tsp turmeric and pour in 400 ml coconut milk with a little water and let it heat through.\"}, {\"Stir in 250g brown crabmeat and let it simmer away for 8 minutes until it’s nice and thick.\"}, {\"Then add 400g white crabmeat and 4-5 whole claws and cook for another 5 minutes.\"}, {\"Sqeeze in the juice of 1 lemon and taste.\"}, {\"Season carefully with salt\"}, {\"Sprinkle with the coriander leaves and serve with some plain rice.\"}', '{\"Calories\": \"415\", \"Fat (g)\": \"10\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"34\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"9\", \"Protein (g)\": \"45\", \"Salt (mg)\": \"1205\"}', '', 'Salad', 'lunch', '20min'),
(53, 'Amchoor Stuffed Bangun', '[\"1 tsp coriander seeds, crushed\", \"½ tsp cumin seeds crushed\", \"½ tsp turmeric\", \"½ tsp chilli powder\", \"1 tsp mango powder (amchoor)\", \"½xa0tsp salt\", \"1 tsp sugar\", \"8 baby aubergine\", \"3 tbsp mustard oil\"]', '{\"Mix all the spices & salt together in a bowl.\"}, {\"Slit the aubergines with a cross.\"}, {\"Heat oil in a heavy based pan with a lid.\"}, {\"Stuff the spice mix into the inside flesh of the auberines.\"}, {\"Rub the outside of the aubergines with any remaining spice mix.\"}, {\"Place them in the pan and cover the pan. Leave them to cook on a gentle heat.\"}, {\"Turn over using some tongs after about 10 minutes. Turn again after another 10 minutes. Cook them for about 25-30 mins until they are soft and tender.\"}', '{\"Calories\": \"104\", \"Fat (g)\": \"12\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"2\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"291\"}', '', 'Salad', 'lunch', '20min'),
(54, 'Rajasthani Muttar Kachori', '[\"400g plain flour\", \"5 tbsp oil / ghee\", \"pinch of salt\", \"1 tsp carom seeds\", \"120ml (approx.) water to make the dough\", \"300g frozen green peas\", \"2 chopped green chillies\", \"1 tsp grated ginger\", \"1 tbsp oil\", \"½xa0tsp kalongi seeds\", \"2 tsp fennel seeds\", \"2 bay leaves\", \"1 tsp chilli powder\", \"1 tsp garam masala\", \"handful fresh coriander\", \"salt to taste\", \"1 tbsp oil\", \"1 large onion, diced\", \"2 tbsp fennel seeds\", \"1 tsp salt\", \"1 chilli, finely chopped\", \"1 tsp amchoor\", \"oil for deep-frying\"]', '{\"Combine all the ingredients and knead into a semi-soft dough using enough water. Knead well for 4 to 5 minutes.\"}, {\"Cover the dough with a wet muslin cloth and keep aside for 15 minutes.\"}, {\"Divide the dough into 12 equal portions. Keep aside.\"}, {\"Combine the green peas, green chillies and ginger and blend in a mixer to a coarse mixture without using any water. Keep aside.\"}, {\"Heat the oil in a deep non-stick pan, add the nigella seeds, fennel seeds, bay leaves and green pea mixture and sauté on a slow flame for 6 to 7 minutes.\"}, {\"Add the chilli powder, garam masala, coriander and salt, mix well and cook on a medium flame for 1 more minute, while stirring occasionally.\"}, {\"Remove the bay leaves and discard. Divide the filling into 12 equal portions. Keep aside.\"}, {\"Heat the oil in a frying pan and add the fennel seeds until they become aromatic.\"}, {\"Add the onions and cook them until they start to brown. Stir in the chopped chilli, salt and amchoor powder.\"}, {\"Once the onions are golden brown transfer them to a plate and leave to cool.\"}, {\"Roll out a portion of the dough into a 6cm diameter circle.\"}, {\"Place one portion of the green pea filling or onion filling in the centre of the rolled dough circle. Surround the filling with the dough by slowly stretching it over the filling. Seal the the pastry closed.\"}, {\"Using your fingers press out the pastry until its about 9cm in diameter, be really careful to keep the filling inside.\"}, {\"Gently press the centre of the kachori with your thumb.\"}, {\"Heat the oil in a deep karahai and deep-fry the kachori on a high heat for a few minutes then reduce the heat and continue to cook for another 5 minutes until they are golden brown in colour and crisp in colour.\"}, {\"Serve immediately with a saunth imlee chutney.\"}', '{\"Calories\": \"232\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"0.8\", \"Carbohydrates (g)\": \"29\", \"of which sugars (g)\": \"1.9\", \"Fibre (g)\": \"3.8\", \"Protein (g)\": \"6.2\", \"Salt (mg)\": \"0.82\"}', '', 'Salad', 'lunch', '20min'),
(55, 'Saag Paneer', '[\"1 tbsp butter / 2 tbsp vegetable oil\", \"750g baby spinach, washed\", \"1-2 green chillies, roughly chopped\", \"1 tbsp vegetable oil\", \"1 tsp cumin seeds\", \"1 large onion, chopped\", \"1 tsp salt or to taste\", \"3 cloves garlic, sliced\", \"3 cm fresh ginger, sliced\", \"1 tomato, chopped\", \"1 tbsp dried fenugreek leaves\", \"1 tsp butter\", \"250g paneer, cut into cubes\", \"2 tbsp double cream (optional)\", \"1 lemon (optional)\", \"1 tbsp ghee (optional)\", \"1 tsp chilli flakes (optional)\", \"butter\"]', '{\"Heat the butter or oil in a pan and add the washed spinach. Sauté until the leaves just wilt.\"}, {\"Once cooled add one or two roughly chopped chillies to the pan and using a hand blender blitz the cooked spinach and chillies in to a smooth paste - set to one side.\"}, {\"In a second pan heat the oil and add cumin seeds until they are fragrant.\"}, {\"Add the chopped onions and fry gently over a low heat beforexa0adding the salt and garlic. Leave to cook for about 5 minutes until soft.\"}, {\"Stir in the tomatoes, ginger and the dried fenugreek leaves. Increase the heat and cook to a create a thick masala paste.\"}, {\"Once the tomatoes have broken down add the blended spinach to the pan with a splash of water if necessary, bring to a boil then reduce the heat and leave to simmer for a few minutes. (The mixture shouldn\"t be watery).\"}, {\"In a frying pan add the butter with a splash of water, once melted add the homemade paneer and stir. Leave the paneer to heat through (about 2-3 minutes).\"}, {\"Add the paneer and any butter to the spinach purée and stir gently to coat.\"}, {\"Stir in the garam masala.\"}, {\"Stir in some cream and cook for a minute until the spinach is smooth and creamy, or\"}, {\"Squeeze in the juice from one lemon, or\"}, {\"Just before serving, heat some ghee in a small pan. Remove from the heat and add some chilli flakes then immediately pour over the dish.\"}', '{\"Calories\": \"67\", \"Fat (g)\": \"5.8\", \"of which saturates (g)\": \"2.8\", \"Carbohydrates (g)\": \"1.8\", \"of which sugars (g)\": \"1.3\", \"Fibre (g)\": \"1.4\", \"Protein (g)\": \"1.9\", \"Salt (mg)\": \"0.80\"}', '', 'Salad', 'lunch', '20min'),
(56, 'Tamarind Rice', '[\"200g Tilda Basmati Rice, cooked\", \"25g tamarind hydrated in 100ml water or 1 tbsp tamarind paste mixed with 4xa0tbsp water\", \"2 tbsp coconut oil\", \"1 tsp mustard seeds\", \"½ tbsp urid dhal\", \"1 tbsp chana dhal\", \"½ tsp fenugreek seeds\", \"2 dried red chillies, broken\", \"5 curry leaves\", \"1 onion, chopped or ½ tsp asafoetida/asafetida\", \"1 tbsp peanuts\", \"½ tsp turmeric\", \"1 tsp salt or to taste\", \"Handful of fresh coriander\"]', '{\"Have your cooked rice ready and make up your tamarind water and set to one side.\"}, {\"Heat the oil in a pan and addxa0the mustard seeds as they begin to pop stir in the urid and chana dhal. The dhal will begin to toast.\"}, {\"When they change colour add the fenugreek seeds, dried red chillies then stir inxa0the curry leaves .\"}, {\"Add the onions (if using)xa0and cook until they are a lovely golden brown colour or addxa0thexa0asafoetida and stir.\"}, {\"Add the peanuts to toast for a few minutes and sprinkle in the turmeric.\"}, {\"Pour in the tamarind. If using tamarind water leave it to cook until it has thickened (about 5 minutes).\"}, {\"Add salt to taste and stir in the cooked rice to coat and heat through.\"}, {\"Remove from the heat and sprinkle in some fresh coriander to serve.\"}', '{\"Calories\": \"296\", \"Fat (g)\": \"6.8\", \"of which saturates (g)\": \"4.3\", \"Carbohydrates (g)\": \"53\", \"of which sugars (g)\": \"3.4\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"6.2\", \"Salt (mg)\": \"2.0\"}', '', 'Salad', 'lunch', '20min'),
(57, 'Tomato Base Restaurant Sauce', '[\"500g onions, peeled\", \"25g fresh root ginger\", \"900ml water\", \"25g garlic\", \"1 tbsp salt\", \"400g tin of tomatoes\", \"4 tbsp of vegetable oil\", \"1 tbsp tomato purée\", \"1 tbsp turmeric\", \"1 tsp mild chilli powder/paprika\"]', '{\"Roughly chop the onion, ginger and garlic.\"}, {\"In a blender blitz the onions, ginger and garlic with half the water until you have a smooth paste.\"}, {\"Place this blended paste and the remaining water into a large pan. Stir in the salt and bring to boil, ten reduce the heat and leave to simmer for about 45 minutes. Leave to cool.\"}, {\"Once cooled, pour into a blender and whizz until you are left with a completely smooth sauce.\"}, {\"Blend the tinned tomatoes until completely smooth.\"}, {\"Heat the oil in a clean pan and add the tomato purée, turmeric and chilli powder. Stir in the blended tomatoes and bring it all to the boil.\"}, {\"Reduce the heat and leave to simmer for 10 minutes. Stir in the onion mix and bring it all to a boil. After a few minutes reduce to a simmer.\"}, {\"Skim off any froth from the top and leave to cook for 25 minutes continuing skimming off any froth.\"}, {\"Leave to cool and store in the refrigerator for 5 days, or freeze\"}, {\"Heat and use as and when required.\"}', '{\"Calories\": \"40\", \"Fat (g)\": \"2.9\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"3.0\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"0.6\", \"Protein (g)\": \"0.7\", \"Salt (mg)\": \"1.0\"}', '', 'Salad', 'lunch', '20min'),
(58, 'Dal Bhat', '[\"2 tbsp ghee or oil\", \"1 onion, finely chopped\", \"2 garlic cloves, minced\", \"5cm piece of ginger, grated\", \"1 tsp coriander seeds, crushed\", \"1 green chilli (optional)\", \"½xa0tsp red chilli powder\", \"½xa0tsp turmeric\", \"200g red lentils, washed\", \"700ml water\", \"1xa0tsp salt\", \"Handful of coriander, chopped\"]', '{\"Heat the ghee or oil in a large frying pan and cook the onions until translucent but not brown.\"}, {\"Turn the heat to low and add in the garlic, ginger, chopped chilli (if using) crushed coriander seeds, red chilli powder and turmeric. Stir to combine for about 3 minutes or so.\"}, {\"Add the red lentils and mix with the onion mixture.\"}, {\"Pour thd water in and bring it to a boil, add the salt and reduce heat to a simmer for about 15 minutes or until the lentils are tender.\"}, {\"Remove from the heat and stir in the fresh coriander.\"}', '{\"Calories\": \"78\", \"Fat (g)\": \"3.3\", \"of which saturates (g)\": \"1.9\", \"Carbohydrates (g)\": \"9.4\", \"of which sugars (g)\": \"2.3\", \"Fibre (g)\": \"1.3\", \"Protein (g)\": \"3.7\", \"Salt (mg)\": \"1.3\"}', '', 'Salad', 'lunch', '20min'),
(59, 'Mint Chutney', '[\"Large bunch of fresh mint leaves\", \"1 onion cut into chunks\", \"1 tsp salt\", \"1 green chilli (add more for more heat)\", \"1 or 2 lemons\"]', '{\"Slice the lemon in half and slice off the rind, remove any pips andxa0chop the flesh into quarters.\"}, {\"Remove the leaves from the mint, discarding the stalks and remove the chilli stems too.\"}, {\"Place the mint, lemon, salt, chillies and onion into a blender and blitz until you get a fine blended chutney.\"}', '{\"Calories\": \"22\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"6\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"574\"}', '', 'Salad', 'lunch', '20min'),
(60, 'Chapli Kebabs', '[\"500g ground beef\", \"4 tbsp whole wheat flour\", \"1 medium onion, finely chopped\", \"1 tsp chilli powder\", \"1 tsp cumin seeds\", \"1 tsp garam masala\", \"1 tsp salt\", \"Handful fresh coriander, chopped\", \"2 green chillies, finely chopped\", \"1 tbsp coriander seeds, crushed\", \"1 tsp anardanaxa0(pomegranate seeds)\", \"2 medium tomatoes,chopped\", \"Oil for frying\"]', '{\"Place the minced beef into a bowl.\"}, {\"Crush the coriander, cumin and anardana seeds in a pestle and mortar or in a spice grinder and add to the bowl.\"}, {\"Sprinkle in the flour and add the chopped onions, chopped chillies, tomatoes, coriander, garam masala, salt and chilli powder.\"}, {\"Mix ingredient to combine all the flavours and form the mixture into flat patties about 1cm thick.\"}, {\"Heat the oil in a pan and shallow fry them for about a minute then turn them over. Once cooked through place on some kitchen roll and serve with fresh naan, a red onion salad and yoghurt.\"}', '{\"Calories\": \"92\", \"Fat (g)\": \"8.0\", \"of which saturates (g)\": \"0.7\", \"Carbohydrates (g)\": \"4.9\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"0.9\", \"Protein (g)\": \"2.3\", \"Salt (mg)\": \"1.6\"}', '', 'Salad', 'lunch', '20min'),
(61, 'Indian Summer Greens', '[\"1 tbsp butter\", \"1 tsp cumin seeds\", \"½ tsp mustard seeds\", \"4 green chillies, finely chopped\", \"4cm piece root ginger\", \"½ tsp turmeric\", \"500g summer greens, shredded\", \"100g peas / blanched broad beans\", \"1 lemon\", \"2 tbsp coconut, grated\", \"1 tsp garam masala\"]', '{\"Heat the butter in a large non-stick pan or wok, sizzle the cumin and mustard seeds until fragrant, then add the chilli, ginger and turmeric.\"}, {\"Fry until aromatic, then add the greens, a pinch of salt, a splash of water and the peas or broad beans.\"}, {\"Cook for 4-5 mins until the greens have wilted.\"}, {\"Add a squeeze of lemon juice, garam masala and the coconut, then toss everything together to serve.\"}', '{\"Calories\": \"114\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"18\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"66\"}', '', 'Salad', 'lunch', '20min'),
(62, 'Chicken Pathia', '[\"6 chicken thigh fillets, skinned, trimmed and cut into bite size pieces\", \"125ml malt vinegar\", \"2 tbsp jaggery, or brown sugar\", \"1 heaped tsp cumin seeds\", \"1-2 dried red chillies (use more if you like it hot)\", \"2 cloves garlic\", \"1 tsp rapeseed oil\", \"1 star anise\", \"1 large onion, finely diced\", \"1 tspxa0salt\", \"Handful coriander, chopped\"]', '{\"Soak the dried chillies in boiling water to soften for 10 minutes.\"}, {\"Dissolve jaggery or brown sugar in half the vinegar and set to one side.\"}, {\"Pound the cumin seeds and soaked chillies in a pestle and mortar, then add the garlic to create a spice paste. Stir in one tablespoon of vinegar. You can blitz in a blender is you have one.\"}, {\"In a pan heat the oil and add the star anise.xa0After a minute add the chopped onion and sauté until brown.\"}, {\"Add in the spice paste and cook for about 2-3 minutes.\"}, {\"Place the chicken pieces into the pan and stir fry in the paste for a few minutes.\"}, {\"Sprinkle in salt to taste and pour in the remaining vinegar. Cook for a further 2-3 minutes.\"}, {\"Add the jaggery and vinegar mixture and reduce the heat.xa0Half cover the pan and stir occasionally. Cook for 10 minutes until the sauce is thick and sticky. The chicken should be cooked through and deliciously tender. You can add a little water if you wish.\"}, {\"Sprinkle with fresh coriander to serve.\"}', '{\"Calories\": \"91\", \"Fat (g)\": \"2.4\", \"of which saturates (g)\": \"0.5\", \"Carbohydrates (g)\": \"5.1\", \"of which sugars (g)\": \"4.3\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"1.1\"}', '', 'Salad', 'lunch', '20min'),
(63, 'Lemon Rice', '[\"4 tbsp vegetable oil or 2tbsp coconut oil\", \"1 tsp mustard seeds\", \"7-10 curry leaves\", \"3 green chillies\", \"1 tsp salt\", \"½xa0tsp turmeric\", \"2 tbsp peanuts orxa0cashew nuts\", \"2 lemons\", \"200g Basmati rice\"]', '{\"Wash the rice until the water runs clear.\"}, {\"In a wide based pan add the washed rice, pour in 500ml of water (twice the amount of water to rice). Bring the water to a rolling boil, reduce the heat to the lowest setting and place the lid on the pan. Leave to cook for 12 minutes.\"}, {\"Remove from the heat, very gently fork through it and leave to cool.\"}, {\"In a separate pan heat the oil and add the mustard seeds. As they begin to splutter add the peanuts or cashews and fry to a golden brown colour. Add the turmeric powder, the curry leaves, green chillies and salt - fry for a minute.\"}, {\"Remove from the heat and stir into the rice.\"}, {\"Squeeze in the juice from the lemon and mix through carefully until all the rice is beautifully bright yellow.\"}', '{\"Calories\": \"230\", \"Fat (g)\": \"18\", \"of which saturates (g)\": \"3\", \"Carbohydrates (g)\": \"17\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"572\"}', '', 'Salad', 'lunch', '20min');
INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(64, 'Chicken Salad with Pink Grapefruit and Cumin Dress', '[\"4 chicken thighs,xa0trimmed\", \"5cm piece ginger\", \"3 cloves of garlic\", \"1 pink grapefruit, juice\", \"1 tbsp oil,\", \"1 tsp chilli powder\", \"1 tsp garam masala\", \"salt to taste\", \"1 tbsp olive oil,\", \"1 tsp roasted cumin seeds,\", \"1 tsp honey\", \"½ pink grapefruit\", \"large pinch coriander leaves, chopped\", \"large pinch of mint leaves, chopped\", \"Handful of baby spinach\", \"Handful of rocket\", \"Handful of watercress\", \"½ pink grapefruit\"]', '{\"Heat the oven to 180ºC.\"}, {\"Cut the chicken into chunks and set to one side.\"}, {\"Crush the ginger and garlic in a pestle and mortar and place in a bowl.\"}, {\"Squeeze in thexa0juice from the grapefruit and pour in the oil, chilli powder, garam masala and salt.\"}, {\"Mix the chicken to marinade for a few minutes then place onto a baking sheet and cook in the oven for 15-20 minutes until cooked through.\"}, {\"Meanwhile, mix the dressing ingredients with juice from half thexa0grapefruit in a jam jar and shake to mix.\"}, {\"With the other half of the grapefruit slice out the segments.\"}, {\"Once the chicken is cooked leave to cool.\"}, {\"Put the salad leaves into a bowlxa0and dress with the dressing then place the pieces of chicken onto the salad with the segments of grapefruit.\"}, {\"Sprinkle over the mint and coriander and serve.\"}', '{\"Calories\": \"222\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"69\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"111\"}', '', 'Salad', 'lunch', '20min'),
(65, 'Cabbage Thoran', '[\"3 tbsp coconut oil\", \"2 tsp black mustard seeds\", \"2 tbsp chopped, fresh curry leaves\", \"1 tsp cumin seeds\", \"2 dried Kashmiri chillies, each broken into smaller pieces\", \"5cm ginger piece, finely grated\", \"½ tsp turmeric\", \"1 tsp salt\", \"½ tsp ground black pepper\", \"250g cabbage, shredded\", \"2 fresh green chillies, sliced\", \"100g fresh coconut, grated\"]', '{\"Heat the oil in a large saucepan or karahi. When it is hot, add the mustard seeds followed by the curry leaves, cumin seeds and dried chillies.\"}, {\"Stir for about 30 seconds, then add the grated ginger, turmeric, salt and black pepper and fry for 30 seconds.\"}, {\"Stir in the cabbage and cook over a medium heat for 5-7 minutes. You may need to add a splash of water.\"}, {\"Once the cabbage is tender, stir in the green chillies and coconut. Heat through for a few minutes and serve.\"}, {\"Perfect with some fresh boiled rice.\"}', '{\"Calories\": \"151\", \"Fat (g)\": \"12\", \"of which saturates (g)\": \"10\", \"Carbohydrates (g)\": \"10\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"614\"}', '', 'Salad', 'lunch', '20min'),
(66, 'Jeera Pani', '[\"Handful of mint leaves\", \"2 litres soda water\", \"1 tsp toasted ground cumin\", \"½ tsp ground black pepper\", \"Juice of 2 limes\", \"Good pinch of sea salt\", \"1 heaped tbsp sugar\"]', '{\"Bash the mint leaves between your palms to release their flavourful aroma, then place in a jug with the soda water, cumin and black pepper.\"}, {\"In a dish or using a pestle and mortar, mix together the lime juice, salt and sugar until the sugar has dissolved.\"}, {\"Add the sugar mixture to the soda water, stir until well combined (or use a blender if preferred) and serve, with or without ice, in long glasses on hot days.\"}', '{\"Calories\": \"38\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"10\", \"of which sugars (g)\": \"8\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"23\"}', '', 'Salad', 'lunch', '20min'),
(67, 'Maacher Jhol', '[\"4 large fish steaks (Kingfish, Salmon, Halibut)\", \"1 tsp turmeric powder\", \"½ tsp salt\", \"3 tbsps mustard oil\", \"10 minature potatoes\", \"1 large bay leaf\", \"5 green cardamom pods, bruised\", \"1 tsp cumin seeds\", \"1 tsp mustard seeds\", \"1 large onion\", \"5 cm ginger, crushed\", \"3 garlic cloves, crushed\", \"1 fresh chilli, finely chopped\", \"2 tomatoes, finely chopped\", \"½xa0tsp turmeric powder\", \"1 tsp coriander seeds, crushed\", \"2 tbsps Greek yogurt\", \"2 green chillies, sliced lengthways\", \"handful of fresh, green coriander, finely chopped\"]', '{\"Wash the fish and pat dry with some kitchen paper. Place onto a dish and sprinkle with turmeric powder and salt. Rub this into the fish and set aside for 30 minutes.\"}, {\"In the meantime blitz the onion to get a paste.\"}, {\"When the fish has marinated, heat the mustard oil in a pan and fry the pieces of fish until each one is golden on both sides.xa0Be gentle with the fish while it cooks then set to one side.\"}, {\"Use the same oil or add more if required and fry the potatoes until they are golden. Drain on kitchen towel and set to one side.\"}, {\"If needed add a little more oil and heat on medium heat. Add thexa0bay leaf, cardamom pods and cumin seeds.\"}, {\"Once fragrant add the onion paste with the crushed ginger and garlic and fry for about 10 minutes.\"}, {\"Just as they turn golden in colour add the tomatoes, turmeric powder, crushed coriander seeds and chopped chillies.\"}, {\"Stir until fragrant then spoon in the yogurt and mix well.\"}, {\"Fry this for about 10 -15 minutes until it becomes shiny the add 1 or 2 cups of hot water.\"}, {\"Stir in the fried potatoes and bring the sauce to a boil. Reduce the heat and leave the potatoes simmering to cook through.\"}, {\"Once they are soft and cooked through add the fried pieces of fish and stir gently.\"}, {\"Cook for a few minutes then remove from the heat and sprinkle with the chopped coriander leaves and sliced chillies to garnish. Serve immediately with some plain rice\"}', '{\"Calories\": \"131\", \"Fat (g)\": \"8.5\", \"of which saturates (g)\": \"1.2\", \"Carbohydrates (g)\": \"6.1\", \"of which sugars (g)\": \"1.6\", \"Fibre (g)\": \"0.6\", \"Protein (g)\": \"8.3\", \"Salt (mg)\": \"0.35\"}', '', 'Salad', 'lunch', '20min'),
(68, 'Fennel and Tomato Shorba', '[\"2 tbsp oil\", \"1 tsp fennel seeds\", \"5 cloves of garlic, sliced\", \"2 green chillies\", \"1 tsp salt\", \"400g ripe tomatoes, roughly chopped\", \"fresh coriander, 1 handful\", \"approx 750ml water\", \"1 tsp fennel, roasted and roughly crushed for the garnish\"]', '{\"Heat oil and add the fennel seeds, when they sizzle add the garlic and cook until it starts to brown.\"}, {\"Throw in the whole green chillies and the salt.\"}, {\"Add the chopped tomatoes and increase the heat to start them cooking.\"}, {\"Pour over enough water to just cover the tomatoes and bring to a boil then add in the coriander.\"}, {\"Leave it to simmer for 15-20 minutes.\"}, {\"Blitz with a hand blender until smooth.\"}, {\"Return to the stove for 5 minutes then pour into serving bowls or cups.\"}, {\"Sprinkle with roasted fennel serve.\"}', '{\"Calories\": \"87\", \"Fat (g)\": \"7\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"6\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"577\"}', '', 'Salad', 'lunch', '20min'),
(69, 'Muttar Paneer', '[\"2 tbsp oil (for frying the paneer)\", \"1 tbsp oil for cooking\", \"1 onion, finely chopped\", \"3 garlic cloves, chopped\", \"3cm piece of ginger, grated\", \"250g tinned plum tomatoes\", \"1 green chilli, finely chopped\", \"1 tsp salt\", \"1 tsp fenugreek powder (methi)\", \"1 tsp turmeric\", \"1 tsp chilli powder\", \"200g peas\", \"150g paneer (cut into approx 5cm cubes)\", \"1 tsp garam masala\", \"Handful of fresh coriander (chopped)\"]', '{\"Heat oil in a pan and fry the paneer until golden brown. Remove and set on some kitchen roll.\"}, {\"Add onion and after a few minutes stir in the garlic. Cook for about 10 minutes until the onions are soft and turning golden.\"}, {\"When the onions are cooked add the tomatoes (which you can whizz up before hand), ginger, salt, turmeric, fenugreek and chilli.\"}, {\"Stir together and cook the sauce until the tomatoes and onion melt together creating a thick masala paste.\"}, {\"Once it is thick and shiny add the paneer and frozen peas.xa0Stir and cook for 5-10 minuets.\"}, {\"Pour in enough hot water to get the consistency of the sauce that you are looking for the sprinkle with garam masala and fresh coriander to serve.\"}', '{\"Calories\": \"46\", \"Fat (g)\": \"2.2\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"4.9\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"1.8\", \"Protein (g)\": \"2.2\", \"Salt (mg)\": \"0.89\"}', '', 'Salad', 'lunch', '20min'),
(70, 'Tandoori Prawn Skewers', '[\"12 large uncooked king prawns\", \"1 fresh chilli, finely\", \"½xa0tsp chilli powder\", \"3 garlic cloves\", \"3cm ginger\", \"1 tsp salt\", \"1 lemon, juice\", \"1½xa0mustard oil\", \"1 tsp chilli powder\", \"100g yoghurt\", \"1 tsp garam masala\", \"2 cardamoms, seeds crushed\", \"2 tsp dried fenugreek (kasoori methi)\", \"½ tsp salt\", \"handful of coriander, finely chopped\"]', '{\"Crush the ginger and garlic in a pestle and mortar to make a paste.\"}, {\"Place the prawns in a large bowl and sprinkle with the chilli powder, salt, lemon juice and the crushed ginger and garlic and set to one side.\"}, {\"Blend all the marinade ingredients together and coat the prawns, refrigerate for however long you can or just cook them.\"}, {\"Thread the marinated prawns onto skewers and cook on a griddle or on a barbecue for 5-6 minutes until they are pink and just cooked through.\"}, {\"Squeeze with lemon juice and some fresh coriander to serve.\"}', '{\"Calories\": \"97\", \"Fat (g)\": \"5.5\", \"of which saturates (g)\": \"1.6\", \"Carbohydrates (g)\": \"2.2\", \"of which sugars (g)\": \"1.3\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"10\", \"Salt (mg)\": \"1.6\"}', '', 'Salad', 'lunch', '20min'),
(71, 'Seekh Kebabs', '[\"500g lamb mince\", \"4 garlic cloves\", \"10cm piece of ginger, roughly chopped\", \"1 chilli, chopped\", \"1 tsp cumin seeds\", \"1 tsp garam masala\", \"1 tsp Kashmiri chilli powder\", \"1 tsp salt\", \"handful of coriander (including stems)\", \"1 tbsp oil\", \"wooden or metal skewers\"]', '{\"In a pestle and mortar roughly crush the cumin seeds, ginger, chilli and garlic then put into a blender.\"}, {\"Then add the mince, garam masala, Kashmiri chilli powder, salt and coriander. Blend to paste and leave to rest in the refridgerator (or freezer) for 15 mins.\"}, {\"If using wooden skewers, soak in cold water for at least 30 minutes.\"}, {\"Coat your hands in a little oil and take a small ball (size of a walnut) of the lamb mixture and squeeze around the skewer. Set to one side and repeat with the remaining mixture. Refridgerate for at least 30 mins before cooking\"}, {\"Cook in a frying pan or griddle for 10 minutes then turn to cook the other side until brown and a little crispy. These are also delicious on the barbecue.\"}, {\"Serve with a fresh mint chutney.\"}', '{\"Calories\": \"199\", \"Fat (g)\": \"5.6\", \"of which saturates (g)\": \"1.1\", \"Carbohydrates (g)\": \"0.2\", \"of which sugars (g)\": \"0.1\", \"Fibre (g)\": \"17\", \"Protein (g)\": \"0.75\"}', '', 'Salad', 'lunch', '20min'),
(72, 'Chicken Chaat', '[\"4 chicken thighs, skinned and trimmed\", \"3 cloves garlic\", \"1 tsp salt\", \"1 tbsp vegetable oil\", \"1 onion, finely diced\", \"2 green chillies, finely chopped\", \"2-4 tbsp tamarind water, or juice fromxa01 lemon\", \"1 tsp red chilli powder\", \"1 tsp mango powder (amchoor)\", \"Handful of fresh coriander, chopped\"]', '{\"Place chicken in a pan and cover with water, add the garlic cloves, salt and place on a gentle heat.\"}, {\"Cook for about 10 minutes and remove from the water and leave to cool. Retain the water as stock.\"}, {\"Heat the oil in a pan and add the onions, cook gently until browned.\"}, {\"Add the green chilli, salt to taste and pour in the tamarind water with a little of the stock water from the chicken.\"}, {\"Cook gently and let the sauce reduce. Add a little more stock and cook to thicken.xa0After about 5 minutes add both the chilli and mango powders.\"}, {\"Once the chicken has cooled, shred it using two forks and add to the sauce.\"}, {\"Stir to coat and leave to cook for a few minutes.\"}, {\"Remove from the heat and sprinkle in the garam masala and a handful of fresh coriander.\"}', '{\"Calories\": \"112\", \"Fat (g)\": \"3.6\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"7.8\", \"of which sugars (g)\": \"6.9\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"1.0\"}', '', 'Salad', 'lunch', '20min'),
(73, 'Pumpkin Curry Recipe', '[\"500g pumpkin peeled and chopped into cubes,\", \"1 tbsp vegetable oil,\", \"½xa0tsp fenugreek seeds,\", \"1 dried chilli (optional)\", \"1 tsp cumin seeds,\", \"1 tsp chilli powder,\", \"1 tsp turmeric,\", \"1 tsp coriander seeds, crushed\", \"1 green chilli, chopped\", \"1 tsp salt\", \"1 tsp sugar (optional)\", \"1 green chilli, sliced (optional)\", \"2 tsp amchoor or 1 tbsp tamarind water\", \"Handful of fresh coriander\"]', '{\"Heat oil on a gentle heat andxa0add the cumin and fenugreek seeds and 1 dried chilli until they splutter.\"}, {\"Reduce the heat and add chilli powder, turmeric, coriander and fry for five minutes.\"}, {\"Stir in the fresh green chillies, pumpkin, salt and sugar (optional).\"}, {\"Cover and cook for 20 minutes until soft, stirring occasionally.\"}, {\"If there is a lot of moisture in the dish, increase the heat and stir until the consistency is thick and lovely.\"}, {\"Remove from the heat and add the split chillies and amchoor or tamarind. If using a block of tamarind take a 5cm piece and rehydrate in approx. 100ml of boiling water. Sieve, discard the solids and use the water. Stir to absorb.\"}, {\"Garnish with a handful of coriander.\"}', '{\"Calories\": \"37\", \"Fat (g)\": \"3.3\", \"of which saturates (g)\": \"0.3\", \"Carbohydrates (g)\": \"2.0\", \"of which sugars (g)\": \"1.6\", \"Fibre (g)\": \"0.9\", \"Protein (g)\": \"1.1\", \"Salt (mg)\": \"1.2\"}', '', 'Salad', 'lunch', '20min'),
(74, 'Bloody Mary Indian style', '[\"25ml vodka\", \"1 tsp dry sherry\", \"4 dashes Worcestershire sauce\", \"200ml tomato juice\", \"squeeze of lemon juice\", \"½xa0tsp hot horseradish\", \"pinch of sea salt\", \"freshly ground black pepper\", \"¼xa0tspxa0celery salt\", \"lots of Tabasco sauce (personal taste)\", \"sprinkle of garam masala\", \"squeeze of lime juice\"]', '{\"In a shaker or glass combine the tomato juice with the vodka, sherry, and Worcestershire sauces and a good pinch of celery salt, salt and pepper, tobasco (to taste) and the horseradish.\"}, {\"Add a squeeze of lemon juice and stir well or shake. Taste and adjust seasoning if needed.\"}, {\"Fill two glasses with the ice, then pour over the bloody Mary.\"}, {\"Add a slice of lime and a sprinkling of fresh garam masala.\"}', '{\"Calories\": \"81\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"10\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"638\"}', '', 'Salad', 'lunch', '20min'),
(75, 'Fried Okra', '[\"200g okra\", \"1 tsp red chilli powder\", \"½ tsp turmeric powder\", \"1 tsp armchoor powder (optional)\", \"1 tsp garam masala powder\", \"3 tbsp gram flour\", \"½ tsp salt\", \"Oil for frying\", \"1 lime\", \"Large pinch of coriander leaves, chopped\", \"1 green chilli, finely sliced\"]', '{\"Rinse the okra and wipe them dry with a few sheets of kitchen roll.\"}, {\"Slice them in half, length ways.\"}, {\"Sprinkle the okra with all the ground spices (red chilli, turmeric, armchoor and garam masala powder) and salt. Stir to coat evenly.\"}, {\"Coat the okra with the gram flour and mix. Leave for 25-30 minutes.\"}, {\"Heat the oil in your karahi (wok) and fry the okra until golden and crisp. Remove and place on kitchen roll.\"}, {\"Garnish the okra with coriander leaves, sliced green chilli. For some extra tang add some squeezed lime juice.\"}', '{\"Calories\": \"57\", \"Fat (g)\": \"1.6\", \"of which saturates (g)\": \"0.3\", \"Carbohydrates (g)\": \"7.4\", \"of which sugars (g)\": \"2.3\", \"Fibre (g)\": \"3.8\", \"Protein (g)\": \"4.4\", \"Salt (mg)\": \"0.06\"}', '', 'Salad', 'lunch', '20min'),
(76, 'Jeera Raita', '[\"200ml natural set yoghurt\", \"A splash of milk\", \"1 tbsp cumin seeds\", \"½xa0cucumber, cubed\", \"1 large tomato, cubed\", \"½xa0red onion, very finely diced\", \"½xa0tsp salt\", \"1 tsp chilli powder\", \"1 tsp garam masala\", \"Coriander to garnish\"]', '{\"Heat a non-stick frying pan, add the cumin seeds and dry roast gently.\"}, {\"Stir until they turn a shade darker and release their musky aroma.\"}, {\"Remove and crush the seeds in a pestle and mortar.\"}, {\"Put the yoghurt in a large bowl and add enough milk to get a runny consistency.\"}, {\"Add the chopped tomatoes, cucumber, onion, salt and cumin.\"}, {\"Stir together. Sprinkle on the chilli powder and garam masala.\"}, {\"Garnish with coriander sprigs and refrigerate until required.\"}', '{\"Calories\": \"67\", \"Fat (g)\": \"2\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"10\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"313\"}', '', 'Salad', 'lunch', '20min'),
(77, 'Murgh Makhani', '[\"8 chicken thighs, skinned, trimmed and cut into cubes\", \"2 medium red onion, roughly chopped\", \"2-3 green chillies\", \"1 tsp ginger, grated\", \"4 cloves garlic, roughly chopped\", \"4cm stick cassia bark\", \"4 green cardamom pods\", \"3 cloves\", \"5 whole black peppercorns\", \"1 tsp salt\", \"7 ripe red tomatoes roughly chopped/400g tin plum tomatoes\", \"2 tbsp ghee or butter\", \"1 tbsp cumin\", \"2 tsp coriander seeds, crushed (coriander powder)\", \"½xa0tsp turmeric\", \"1 tsp kashmiri chilli powder\", \"1 cup hot water\", \"1 tbsp honey\", \"2 tsp dried fenugreek leaves (kasoori methi)\", \"100ml double cream\", \"1 tsp garam masala\", \"1 tbsp of butter\"]', '{\"Put onion, chillies,xa0ginger, garlic, cassia bark, green cardamom, cloves, black pepper and salt into a pan and cover with water (approx. 500ml). Bring to the boil.\"}, {\"Add the tomatoes and leave to simmer for 15-20 min on medium heat stirring occasionally.\"}, {\"After the sauce has reduced and the mixture has thickened remove the pan from the heat. Remove the cassia bark and let the mixture cool down.\"}, {\"With a stick blender, blend the mixture until it\"s thick and silky smooth.\"}, {\"In a second pan heat the ghee or butter, once hot add cumin seeds and as soon as you can smell the musky cumin aroma stir in the tomato sauce. Be very careful as this will spit. Fry the sauce until the oil separates out.\"}, {\"Stir in turmeric, Kashmiri chilli powder, crushed coriander seeds and cook for 2-3 minutes. Reduce the heat and add the chicken to the pan, stir to coated and leave to simmer for 15 minutes on a gentle heat.\"}, {\"Add a little hot water to loosen if required and then the honey. Cook for a further 5 minutes until the chicken is cooked through - the gravy should be a lovely bright red colour.\"}, {\"Remove from the heat and stir in the cream (or yoghurt), fenugreek and the garam masala.\"}, {\"Add some butter or cream on top before serving.\"}', '{\"Calories\": \"99\", \"Fat (g)\": \"6.4\", \"of which saturates (g)\": \"3.5\", \"Carbohydrates (g)\": \"2.6\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"0.6\", \"Protein (g)\": \"8.3\", \"Salt (mg)\": \"0.49\"}', '', 'Salad', 'lunch', '20min'),
(78, 'Bonda\'s', '[\"4 to 5 medium-sized potatoes\", \"1tsp mustard seeds\", \"1tsp urad dal (split and dehusked)\", \"1 medium sized onion, finely chopped\", \"2 cloves of garlic\", \"4cm ginger\", \"15 curry leaves, chopped\", \"2 tbsp coriander leaves, chopped\", \"1 or 2 green chillies, finely chopped (depending on how hot you like it)\", \"½ tsp turmeric powder\", \"½xa0tsp chilli powder\", \"squeeze of lemon juice\", \"salt to taste\", \"2 cups gram flour\", \"¼ cup rice flour\", \"200-250ml water\", \"¼ tsp turmeric powder\", \"½ tsp red chilli powder\", \"a pinch of baking soda\", \"½ tsp salt\"]', '{\"Wash the potatoes and boil in a pan with the skin on until cooked through\"}, {\"Once cooled peel and grate the potatoes into a bowl\"}, {\"Heat the mustard oil in a frying pan, when hot add the mustard seeds and when they startxa0to splutter, add the urad dal and cook until it turns golden brown in colour.\"}, {\"Add the chopped onion and sauté until it just starts to brown. Meanwhile put the ginger and garlic into a pestle and mortar and grind to a paste.\"}, {\"Add the crushed ginger and garlic to the onions along with the sliced curry leaves and green chillies.\"}, {\"Leave to cook for a minute then add the turmeric powder.\"}, {\"Remove from the heat and add pour into the potatoes along with the coriander leaves and chilli powder and mix it all through.\"}, {\"The mixture should be nice and dry then squeeze in a little lemon juice and salt. Mix and check the seasoning.\"}, {\"Make ping pong sized balls from this mixture and refrigerate for 10 minutes.\"}, {\"Make up the batter by mixing all the ingredients in a bowl. It should be nice and thick.\"}, {\"Start to heat oil in a small pan to deep fry the bonda\"s. Check it\"s hot enough by dropping in a little batter. If it sinks and sizzles back to the top immediately it is ready.\"}, {\"Dip each potato ball into the batter, coat it well with the batter and gentle place into the hot oil.\"}, {\"Fry the aloo bondas until they are golden brown and crispy. Remove and set on some kitchen roll to drain.\"}', '{\"Calories\": \"417\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"82\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"10\", \"Protein (g)\": \"20\", \"Salt (mg)\": \"280\"}', '', 'Salad', 'lunch', '20min'),
(79, 'Quick Keralan Pandi Curry', '[\"600g - 900g pork loin steak or fillets\", \"Sea salt to taste\", \"Freshly ground black pepper\", \"2 tbsp coconut oil\", \"1 tsp fennel seeds or 2 star anise\", \"2 dried red chillies\", \"2 onions, finely diced\", \"2 tsp cumin seeds\", \"1 tsp coriander seeds\", \"5 garlic cloves, minced\", \"2 fresh green chilli, chopped\", \"1 tbsp ginger, freshly grated\", \"400g tinned tomatoes\", \"1 tbsp tamarind paste\", \"1 tsp ground turmeric\", \"200g coconut cream\", \"100g green beans, trimmed\", \"Handful fresh coriander leaves, chopped\"]', '{\"Heat a wide pan and add the oil. Once hot, add the whole fennel seeds and red chillies.\"}, {\"Add the onions and sauté until they start to brown, then add the minced garlic.\"}, {\"Remove the fat from the pork and cut into strips. Season the pork with salt and lots of black pepper and ½ tsp of the turmeric.\"}, {\"Stir the tinned tomatoes, tamarind, green chilli, grated ginger into the pan with the onions and stir through.\"}, {\"Grind the coriander seeds and cumin seeds in a pestle and mortar.\"}, {\"Once the masala starts to simmer, add the remaining turmeric, ground cumin and coriander, and stir. Let it reduce and thicken.\"}, {\"Add the meat and stir to coat with the sauce. Reduce the heat and cook for 5-10 minutes.\"}, {\"Pour in the coconut cream and heat through, then add the trimmed beans and cook for a further 5 minutes until the beans are cooked.\"}, {\"When cooked through, check the seasoning and add the coriander leaves and serve with plain rice.\"}', '{\"Calories\": \"400\", \"Fat (g)\": \"25\", \"of which saturates (g)\": \"16\", \"Carbohydrates (g)\": \"12\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"34\", \"Salt (mg)\": \"774\"}', '', 'Salad', 'lunch', '20min'),
(80, 'Indo-Chinese Ribs', '[\"2 racks of pork ribs, trimmed\", \"1 tbsp rapeseed oil\", \"2 tbsp Chinese five-spice\", \"3 star anise\", \"3 red onions\", \"2 cloves of garlic\", \"3 cm piece of ginger, grated\", \"1 tsp coriander seeds, crushed\", \"3 tbsp water or apple juice\", \"3 tbsp soy sauce\", \"2 tbsp honey\", \"1 tbsp tomato ketchup\", \"1 tbsp vinegar\", \"2 spring onions\", \"2 fresh chillies\"]', '{\"Heat the oven to 160°C.\"}, {\"Using a knife scrape the underside of the ribs on one end and you will see there is a transparent membrane present. Pull this membrane (use a cloth for grip) from the back of the ribs to remove it.\"}, {\"Place the ribs in an oven tray and rub them with five-spice, salt and pepper, drizzle with the oil and cover the tray with foil.\"}, {\"Place these into the oven for 3 hours, or until just tender and cooked through.\"}, {\"For the glaze, peel and slice the onions and put them into a frying pan on a medium heat with a glug of oil and the star anise.\"}, {\"After a few minutes add the garlic. Cook for 15 minutes, stirring occasionallyxa0until the onion softens and starts to caramelise.\"}, {\"Stir in the remaining glaze ingredients and leave to cook down for about 5 minutes, then turn off the heat and leave to cool a little.\"}, {\"Remove the star anise and blitz the mixture in a blender until smooth. Add a little water water if required. Check seasonaing and adjust if required.\"}, {\"Slice the spring onions and chillies and set to one side.\"}, {\"After 3 hours remove the foil from the tray and turn the oven up to 200°C.\"}, {\"Brush the glaze over the ribs and return them to the oven for 8 to 10 minutes, repeat this every few minutes, to get a lovely sticky glaze.\"}, {\"Sprinkle with the chopped chillies and spring onions and serve the ribs with any leftover glaze for dipping.\"}', '{\"Calories\": \"144\", \"Fat (g)\": \"6\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"21\", \"of which sugars (g)\": \"14\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"7\", \"Salt (mg)\": \"755\"}', '', 'Salad', 'lunch', '20min'),
(81, 'Asparagus and Pea Soup with Parsnip Crisps', '[\"1 tbsp butter\", \"2 cloves garlic, finely chopped\", \"1 onion, chopped\", \"1 tbsp plain flour\", \"340g asparagus\", \"250g peas\", \"pinch cracked black pepper, or to taste\", \"Salt to taste\", \"1 parsnip\", \"oil for frying\", \"salt\"]', '{\"Heat butter in a pan and add the garlic. Cook to soften then stir in the chopped onion.\"}, {\"Stir and leave to cook for 2 or 3 minutes.\"}, {\"Stir in flour and roast for a minute or so to lose the rawness.\"}, {\"Add 500ml of water and stir ensuring there are no lumps.\"}, {\"Add the asparagus, peas, salt and pepper and bring to the boil\"}, {\"Leave the pan to simmer until asparagus has cooked (about 15-20 minutes).\"}, {\"Pour the soup into a blender and blitz until smooth.\"}, {\"Pour through a strainer and return to the heat for a few minutes, check thexa0seasoning then remove from the heat.\"}, {\"Heat some oil to deep fry the crisps in.\"}, {\"Peel the parsnip and using your peeler strip off thin slivers.\"}, {\"To check thexa0oil is hotxa0enough place in a sliverxa0of the parsnip into the oil. If it bubbles and crisps up its ready.\"}, {\"Continue with the remainingxa0slivers and place onto some kitchen roll to drain.\"}, {\"Sprinkle with a little salt and serve on top of the soup.\"}', '{\"Calories\": \"155.00\", \"Fat (g)\": \"2.00\", \"of which saturates (g)\": \"0.00\", \"Carbohydrates (g)\": \"30.00\", \"of which sugars (g)\": \"10.00\", \"Fibre (g)\": \"9.00\", \"Protein (g)\": \"7.00\", \"Salt (mg)\": \"0.091\"}', '', 'Salad', 'lunch', '20min'),
(82, 'Cardamom Banana Lassi', '[\"2 ripe bananas, peeled\", \"4 tbsp Greek yoghurt\", \"splash of cold milk\", \"1 handful of ice cubes\", \"Sprinkle of cardamom powder\", \"sugar to taste, if required\"]', '{\"Put the yoghurt, milk, bananas and ice into a blender and blitz until smooth.\"}, {\"Pour the mixture into a tumbler and sprinkle with some cardamom powder.\"}', '{\"Calories\": \"137\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"32\", \"of which sugars (g)\": \"19\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"8\"}', '', 'Salad', 'lunch', '20min'),
(83, 'Chicken Burrito', '[\"260g Roti flour\", \"½ tsp salt\", \"2 tsp oil\", \"50g big handful of spinach\", \"100ml warm milk\", \"1 tbsp rapeseed oil\", \"1 tsp cumin seeds\", \"1 onion, finely diced\", \"2 cloves garlic\", \"2 green chillies, finely chopped\", \"4-5 tbsp (55ml) tamarind concentrate, or juice from 1 lemon\", \"4 chicken thighs, skinned and trimmed\", \"3cm fresh ginger, shredded\", \"1 tsp salt\", \"1-2 tsp brown sugar\", \"1 tsp red chilli powder\", \"2 tsp mango powder (amchoor)\", \"Handful of fresh coriander, chopped\", \"1 green chilli, chopped (optional)\", \"4 tbsp cooked rice plain\", \"Greek yoghurt\", \"1/2 tsp kalonji seeds\", \"handful fresh spinach leaves\"]', '{\"Heat water in a pan and add spinach. Blanch for a minute then remove and rinse under cold water.\"}, {\"Place the cooked spinach into a blender and add the milk. Blitz to a puree and set to one side.\"}, {\"In a bowl, mix flour, salt and oil together. Pour in the spinach and puree a little at a time and knead to make a soft dough.\"}, {\"Cover the dough with a damp cloth and leave to rest for 20 minutes.\"}, {\"When ready to cook, heat your tava or frying pan to a medium heat.\"}, {\"Roll out the roti and place on the pan to cook. Once it changes colour a little, turn and cook the other side. Place in a tea towel to keep warm.\"}, {\"Heat the oil in a pan with cumin seeds until fragrant. Then, add the onions and cook gently until browned. Add chopped garlic and ginger, green chilli and salt to taste. Cook for about 2-3 minutes.\"}, {\"Add the chicken and pour in the tamarind water with a little more water to just cover the chicken. Cook for about 20 minutes then remove the chicken.\"}, {\"Add the sugar and bring to the boil so the sauce dissolves and the sauce thickens.\"}, {\"After about 5 minutes, stir in the chilli and mango powders.\"}, {\"Shred the chicken using two forks and add it back into the sauce.\"}, {\"Stir to coat and leave to cook for a few minutes so the sauce coats the chicken.\"}, {\"Remove from the heat and sprinkle with the fresh coriander and green chilli.\"}, {\"Mix the yoghurt with some cooked rice and add a sprinkling of kalonji seeds.\"}, {\"Spoon the chicken chaat into the roti.\"}, {\"Add a spoonful of the yoghurt rice.\"}, {\"Add some fresh spinach and roll up the burrito.\"}', '{\"Calories\": \"112\", \"Fat (g)\": \"3.6\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"7.8\", \"of which sugars (g)\": \"6.9\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"1.0\"}', '', 'Salad', 'lunch', '20min'),
(84, 'Punjabi Tomato Relish', '[\"1 fresh tomato, roughly chopped\", \"handful of coriander, roughly chopped\", \"3cm fresh ginger\", \"1 tsp salt\", \"½ tsp Kashmiri chilli powder, (optional)\", \"1 tbsp vegetable oil\", \"1 tsp kalonji seeds\", \"1 tsp fennel seeds\", \"1 tsp mustard seeds\", \"1 tsp cumin seeds\", \"1 tsp fenugreek leaves\"]', '{\"Place tomato, coriander, ginger into a blender and blitz to a pulp.\"}, {\"Heat the oil in a heavy pan and add all the spices until they sizzle & become fragrant. This should only take a minute.\"}, {\"Pour the pulp into the pan and heat through for a minute. Pour into a serving dish and leave to cool before serving. Store in a sealed jar and keep in the fridge for up to 2 weeks.\"}', '{\"Calories\": \"25\", \"Fat (g)\": \"2\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"2\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"291\"}', '', 'Salad', 'lunch', '20min'),
(85, 'Pitta Bread with Carom Seeds', '[\"250g brown flour\", \"1 tsp ajwain (carom seeds)\", \"1 tsp salt\", \"7g instant yeast\", \"2 tsp rapeseed oil\", \"160ml water\", \"Extra flour for dusting\"]', '{\"Tip the flour into the mixing bowl of your stand mixer with the dough hook attached and add the ajwain, salt to one side and the yeast to the other.\"}, {\"Add the oil and 120ml of the water and start to mix. Add the remaining water a little at a time until you have a soft, sticky dough (you may not need all the water).\"}, {\"With a little oil knead the dough for 5-10 minutes. The dough will become less sticky and start to feel smooth.\"}, {\"Lightly oil a bowl and place the dough in the bowl, cover and leave in a warm room until it doubles in size approx. 1-2 hours.\"}, {\"Heat the oven to 220ºC, and place a baking tray in the centre to heat up. You can also use a baking stone if you have one.\"}, {\"Dust your worktop with flour and knock back the dough and kneed for a few mintues until it\"s soft.\"}, {\"Divide it into 6 equal portions and then shape each one into a ball. Flatten with your fingertips and start to roll it out into an oval shape that\"s about 1cm thick.\"}, {\"Take the hot tray out of the oven, dust with flour and lay the pittas on it.\"}, {\"Bake for 5- 10 minutes until they puff up and just start to brown.\"}, {\"Immediatly, wrap them in a clean tea towel. This traps in the steam and keeps them lovely and soft, and leave to cool.\"}', '{\"Calories\": \"115\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"24\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"4\"}', '', 'Salad', 'lunch', '20min'),
(86, 'Coorg Pandi Curry', '[\"800g pork, cut into chunks\", \"1 tsp salt\", \"1 tsp peppercorns, crushed\", \"1 tsp turmeric\", \"4 medium onions, sliced\", \"8 cloves of garlic, crushed\", \"1 tbsp oil\", \"5cm piece ginger, sliced\", \"3 level tbsp coriander powder\", \"2 level tbsp chilli powder\", \"1 tsp cumin seeds\", \"½ tsp mustard seeds\", \"2 tbsp malt vinegar\"]', '{\"Mix the sliced onions and crushed garlic with the pork and sprinkle with 1 tsp salt, 1 tsp crushed peppercorns, turmeric and set aside.\"}, {\"Heat 1 tbsp oil and add the ginger, carefully fry it until brown. Remove and add to the pork.\"}, {\"You have to work quickly here so you don\"t burn the spices. On very gentle heat add 3 level tbsp of crushed coriander seeds and stir for about 30 seconds. Then add 2 level tbsp of chilli powder and stir until it turns a reddish brown.\"}, {\"Add the pork and stir to coat all the meat. Cover the pan with a lid and leave to simmer gently for about 10 minutes - stir occasionally.\"}, {\"Add 1 cup of warm water and cook the meat uncovered on a medium heat until it\"s done (about 30-50 minutes).\"}, {\"Meanwhile, heat a small pan and add the cumin seeds and mustard seeds and roast until they become aromatic (1-2 minutes). Remove and grind to a powder and set to one side.\"}, {\"Once the pork is soft and tender add 1-2 tbsp vinegar and leave to cook gently for a further 10 minutes.\"}, {\"Taste the dish and adjust seasoning with salt and vinegar if required.\"}, {\"Stir in the roasted cumin and mustard seeds the serve with some plain rice.\"}', '{\"Calories\": \"302\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"14\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"42\", \"Salt (mg)\": \"982\"}', '', 'Salad', 'lunch', '20min'),
(87, 'Raajma', '[\"200g redxa0kidney beans, soaked overnight\", \"1 small onion, finley diced\", \"4 cloves of garlic, finely chopped\", \"1L water\", \"200g tinned plum tomatoes (½ tin)\", \"2 tsp ginger, grated\", \"1 tsp salt\", \"1 chilli, roughly chopped\", \"1 tsp turmeric\", \"1 tsp garam masala\", \"handful of coriander, chopped\"]', '{\"Put the soaked red kidney beans and any liquid into the pressure cooker\"}, {\"Add more water to make up about 1L water and add the salt. Put the lid on and bring to the boil (when it whistles) reduce heat and simmer for 30 minutes.\"}, {\"Turn off and leave to cool – DO NOT REMOVE THE LID\"}, {\"In a frying pan heat oil and add the onion and garlic, fry until brown.\"}, {\"Reduce heat and stir in the tomatoes, ginger, chilli, turmeric and cook for about 5-10 minutes to create a thick shiny masala paste.\"}, {\"Ensure the steam has been released from the cooker and open the lid. Check the beans are cooked by squeezing them between your fingers. If they are soft they and squash easily they are ready. If not check the water level (add more if required) place the lid on the pressure cooker again and bring to boil, simmer and leave to cook for a further 10 minutes.\"}, {\"Once the red kidney beans are cooked add the masala paste and stir. Leave on a gentle heat for about 5 minutes.\"}, {\"Add garam masala and chopped coriander to serve.\"}', '{\"Calories\": \"123\", \"Fat (g)\": \"0.8\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"21\", \"of which sugars (g)\": \"2.9\", \"Fibre (g)\": \"6.7\", \"Protein (g)\": \"9.7\", \"Salt (mg)\": \"1.3\"}', '', 'Salad', 'lunch', '20min'),
(88, 'Ginger chutney', '[\"1 tbsp coconut oil\", \"100g root ginger\", \"1 heaped tsp urid dhal\", \"10 dried birds eye chillies (use less to reduce the heat)\", \"4 tbsp tamarind paste\", \"1 heaped tsp jaggery (or brown sugar)\", \"1 tsp mustard seeds\", \"1 tsp salt (or to taste)\", \"1 tsp cumin seeds\", \"10 curry leaves\"]', '{\"Wash the fresh ginger to remove any grit and slice into chunks.\"}, {\"Heat just under one tbsp of coconut oil and add the urid dhal along with the dried chillies. Saute for 30 seconds until the dhal roasts and changes to a red gold colour.\"}, {\"Add the ginger and cook for five to six minutes until it has softened a little.\"}, {\"Remove from the heat and stir in the tamarind.\"}, {\"Let the mixture cool for a few minutes and pour into a blender with the salt, jaggery, and grind to a paste. You may need to add a little water to loosen the mixture.\"}, {\"Add the remaining oil to a pan and heat before adding the mustard and cumin seeds. Once fragrant add the curry leaves.\"}, {\"Put the blended ginger paste back into the pan and cook for a minute or two.\"}, {\"Store in an air-tight container and keep refrigerated. This will keep for four to six weeks.\"}', '{\"Calories\": \"165\", \"Fat (g)\": \"10\", \"of which saturates (g)\": \"7.8\", \"Carbohydrates (g)\": \"19\", \"of which sugars (g)\": \"15\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"2.4\", \"Salt (mg)\": \"3.9\"}', '', 'Salad', 'lunch', '20min'),
(89, 'Spicy Lamb Chops', '[\"4 lamb chops\", \"1 tbsp coriander seeds\", \"1 tsp fennel seeds\", \"1 tsp cumin seeds\", \"5 dried Kashmiri chillies (or chilli powder mixed with paprika)\", \"4 cloves garlic, peeled and roughly chopped\", \"2 tbsp ginger, grated\", \"1 tsp salt\", \"1 tbsp rapeseed oil\", \"1 lemon\"]', '{\"In a pestle and mortar crush the coriander, cumin, fennel seeds and dried chillies.\"}, {\"Then add the garlic, ginger and salt then grind with the spices to create a thick paste.\"}, {\"Pour in the oil and lemon juice and mix together.\"}, {\"Smear the paste all over the chops and leave to marinate for at least 1 hour.\"}, {\"Ensure they are at room temperature and cook on a griddle or barbecue for 4-5 minutes on each side until cooked through.\"}', '{\"Calories\": \"417\", \"Fat (g)\": \"32\", \"of which saturates (g)\": \"10\", \"Carbohydrates (g)\": \"20\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"27\", \"Salt (mg)\": \"646\"}', '', 'Salad', 'lunch', '20min'),
(90, 'Mint and Coriander Chutney', '[\"30g fresh mint leaves\", \"30g fresh coriander leaves\", \"1 green chilli ( add more chillies if you want the chutney to be spicy)\", \"½ inch ginger, roughly chopped\", \"salt to taste\"]', '{\"In a blender grind all the ingredients to a smooth paste using little water.\"}, {\"Store in an airtight container in the refrigerator until required.\"}', '{\"Calories\": \"121\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"20\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"14\", \"Protein (g)\": \"11\", \"Salt (mg)\": \"280\"}', '', 'Salad', 'lunch', '20min'),
(91, 'Lamb with Shallots', '[\"20g unsalted butter\", \"200g mini shallots or pearl onions, peeled\", \"1 tbsp vegetable oil\", \"1 bay leaf\", \"10 cloves\", \"8 cardamom\", \"8 dried chillies\", \"4cm stick cassia bark\", \"2 onions finely sliced\", \"1 tsp turmeric\", \"1 tsp salt\", \"6 garlic cloves, sliced\", \"3 tbsp ginger, grated\", \"200g tinned tomatoes\", \"1kg diced leg of lamb or neck fillet\", \"2 tsp garam masala\", \"2 tsp coriander seeds, crushed\", \"½xa0tsp mace powder\", \"1 tsp cumin seeds crushed\", \"2 tsp black peppercorns, crushed\", \"Handful of coriander leaves, chopped\", \"2 tsp ginger, finely shredded\"]', '{\"Melt butter in pan and fry the small onions for a few minutes until golden brown. Remove and set to one side.\"}, {\"Add the oil to the pan and fry the bay, cloves, cardamom, chillies and cassia bark.\"}, {\"Add the sliced onions and cook until they become translucent\"}, {\"Stir in the turmeric, salt, ginger and garlic to soften then add the tomatoes. Stir and cook for 5 minutes until the tomatoes break down.\"}, {\"Add lamb and stir to coat with the masala, cook on a high heat for about 20 minutes to brown the meat.\"}, {\"Reduce the heat to lowest setting and cover with the lid and leave to simmer for 30-40 minutes.\"}, {\"Open the pan and stir in all the ground spices (garam masala, coriander, mace, cumin, black pepper)\"}, {\"Add the whole fried shallots back into the pan and stir. Leave them to soak up the flavours.\"}, {\"Check the seasoning and adjust if required. Sprinkle with coriander and shredded ginger to serve.\"}', '{\"Calories\": \"607\", \"Fat (g)\": \"35\", \"of which saturates (g)\": \"16\", \"Carbohydrates (g)\": \"32\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"11\", \"Protein (g)\": \"49\", \"Salt (mg)\": \"628\"}', '', 'Salad', 'lunch', '20min'),
(92, 'Parantha', '[\"500g atta\", \"water\", \"1 tsp spoon butter/ghee or vegetable oil\", \"½ tsp carom seeds (optional)\"]', '{\"Put the atta in a bowl and add a little water at a time.\"}, {\"Using your hand bring the flour and water together to make a dough.\"}, {\"Start to knead it together using your knuckles folding over as you. The dough should come together and come away from your hand and the bowl. If it is sticky add a little more flour and continue to knead. It needs to be soft but not too sloppy\"}, {\"Set to one side for half an hour as least before making the roti\"}, {\"On a plate put some dry atta for dusting\"}, {\"Heat up the tava to a low heat.\"}, {\"Flour hands and take an approx 6cm ball of dough – about the size of a large tangerine. Roll the dough in the palms of your hand to make a smooth round ball. Ensure there are no cracks in the dough.\"}, {\"Flatten on the surface using your fingers.\"}, {\"Flour again and using you rolling pin begin to roll out.\"}, {\"If it sticks just flour, turn over and roll again – try not to let it stick.\"}, {\"When it is about 12cm in diameter smear it with a teaspoon of butter and sprinkle on the carom seeds.\"}, {\"Fold the top down half way and the bottom up to the top.\"}, {\"Fold the right side into the middle and the left side in to the middle – you should end up with a little square.\"}, {\"Flour the square and roll out – Try and keep it in a square shape – pick up and flour and rotate to roll out the other side.\"}, {\"The tava should now be heated. When the parantha is about the size of a side plate about 18cm place it flat on the tava.\"}, {\"You will see the colour of the parantha darken after about 6 seconds as it cooks. Turn it over and smear the cooked side with butter/ghee or oil.\"}, {\"As little bubbles start to appear turn it over again (it will get smoky) and butter or oil the other side. It should puff up - continue to turn over until it is crisp and golden. Remove from the tava onto a plate.\"}, {\"It should be crisp yet soft to eat – great with plain yogurt and some spicy pickle.\"}', '{\"Calories\": \"330\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"68\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"8\", \"Salt (mg)\": \"0\"}', '', 'Salad', 'lunch', '20min'),
(93, 'Anda di Purjee (Bhurji)', '[\"2 tsp butter\", \"8 large free range eggs\", \"3 spring onions, sliced including green bits\", \"3 mushrooms, diced\", \"1 tomato, chopped\", \"2 tsp garam masala\", \"1 or 2 chillis chopped\", \"½xa0tsp chilli powder\", \"1 tsp salt\", \"Handful of fresh coriander, chopped\"]', '{\"Break the eggs into a bowl and whisk.\"}, {\"Heat butter in a frying pan.\"}, {\"Add the sliced onions and fry to soften.\"}, {\"Add the mushrooms and tomatoes (and other veg) and fry for a few minutes to cook through.\"}, {\"Add the garam masala, chopped chilli, chilli powder, salt and stir for a second then add eggs and stir to scramble.\"}, {\"Remove from heat and add coriander.\"}', '{\"Calories\": \"138\", \"Fat (g)\": \"10.2\", \"of which saturates (g)\": \"2.7\", \"Carbohydrates (g)\": \"0.9\", \"of which sugars (g)\": \"0.4\", \"Fibre (g)\": \"0.2\", \"Protein (g)\": \"10.7\", \"Salt (mg)\": \"1.5\"}', '', 'Salad', 'lunch', '20min'),
(94, 'Easy Chicken Curry', '[\"2 tbsp oil\", \"400g chicken thigh fillets, trimmed and chopped\", \"2 large onions\", \"1 tsp salt\", \"3 cloves of garlic\", \"3cm fresh ginger\", \"1 or 2 green chillies\", \"200g plum tomato tin, pureed\", \"½ tsp turmeric powder\", \"½ tsp red chilli powder\", \"1 tsp garam masala powder\", \"Large pinch of fresh coriander, chopped\"]', '{\"Blend the onions in a food processor.\"}, {\"Heat oil in a pan and sauté the onion paste. If it starts to stick, just add a little water and stir.\"}, {\"Stir in the salt to help the onions cook.\"}, {\"Put the ginger, garlic and chillies into a blender and blend to a paste (add a little water if required)\"}, {\"After 10 minutes of cooking the onions they should have browned a little. Now stir in the garlic, ginger and chilli paste.\"}, {\"Once softened add the pureed tinned tomatoes and increase the heat until the tomatoes start to simmer.\"}, {\"Reduce the heat and add the turmeric, chilli powder and garam masala. Cook together until the tomatoes and onions start to break down and the masala dries up and becomes paste-like.\"}, {\"Add chicken pieces into the masala. Stir well and cook for a few minutes. Reduce the heat to the lowest setting and put the lid on the pan. Leave to cook for about 15-20 minutes, stirring intermittently.\"}, {\"The chicken should be cooked through. To add a little more gravy pour in some hot water and stir before removing from the heat.\"}, {\"Check the seasoning and adjust if you need to. Sprinkle in the coriander and stir.\"}, {\"Serve with plain rice or roti.\"}', '{\"Calories\": \"100\", \"Fat (g)\": \"5.8\", \"of which saturates (g)\": \"1.7\", \"Carbohydrates (g)\": \"2.8\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"9.5\", \"Salt (mg)\": \"0.59\"}', '', 'Salad', 'lunch', '20min'),
(95, 'Homemade Paneer', '[\"2 pints (1.25L) full fat milk\", \"2½xa0tbsp lemon juice/white vinegar\"]', '{\"Pour the milk into a non-stick pan and heat.\"}, {\"Just before the milk comes to a boil and as it starts to bubble add the lemon juice or vinegar and stir. Remove from the heat and stir then leave to stand for 5 minutes. The milk will separate into solid curd and the watery liquid or whey. If it hasn\"t separated you may need to add a little more vinegar.\"}, {\"Line a colander with muslin or cheesecloth.\"}, {\"Scoop the curd into the lined colander (you can save the whey as stock).\"}, {\"Pull the cloth into a ball and when cool enough to handle squeeze out any excess liquid. if you want to use the paneer to crumble into a sauce then just leave to hang. If you want to cut the curd into chunks and add to a sauce then you need to make it more compact by placing a weight on to the muslin and leaving it to strain for at least an hour, but the longer the better.\"}, {\"The paneer can then be cut into cubes and fried or crumbled into a sauce.\"}', '{\"Calories\": \"155\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"9\", \"Carbohydrates (g)\": \"11\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"33\", \"Salt (mg)\": \"0\"}', '', 'Salad', 'lunch', '20min');
INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(96, 'Vegetable Biryani', '[\"300g basmati rice\", \"2 green cardamoms\", \"2 black cardamoms\", \"2 garlic cloves\", \"3cm cassia bark\", \"1 bay leaf\", \"2 single mace strands\", \"½ tsp salt\", \"150g cauliflower florets\", \"100g carrots, chopped\", \"50g French beans, chopped\", \"10 button mushrooms, sliced\", \"1 small red pepper, chopped\", \"50g cup fresh or frozen peas\", \"1 large onion, thinly sliced\", \"3cm ginger, grated\", \"8 garlic cloves, sliced\", \"3 tbsp ghee (or oil if you prefer)\", \"1 tsp shahi jeera (black cumin)\", \"1 bay leaf\", \"3 green cardamoms\", \"3 cloves\", \"1 black cardamon\", \"4cm cassia bark\", \"200g yoghurt, fresh whisked\", \"4 green chillies, whole\", \"½ tsp turmeric powder\", \"1 tsp red chilli powder\", \"½ cup water\", \"2 tbsp cashews\", \"1 tbsp sultanas/raisins\", \"2 tbsp almonds, blanched, peeled and sliced\", \"Salt as required for assembling and layering\", \"Handful fresh coriander leaves, chopped\", \"Handful mint leaves, chopped\", \"4 to 5 tbsp milk\", \"¼ tsp saffron\", \"2 tsp kewra water (screwpine water)\"]', '{\"Rinse basmati rice in 3 or 4 changes of water until the water runs clear of starch.\"}, {\"Soak the rice in enough water to cover the rice for 30 minutes. Drain the rice and keep aside.\"}, {\"Heat 300ml water in a deep pan. Once hot, add salt, bay leaf, 2 green cardamoms (cracked), 2 cloves, 2 black cardamom, 3cmxa0cassia bark, mace strands.\"}, {\"Bring the water to a boil, add the rice and stir gently.\"}, {\"Leave it to boil for about 5 minutes until the rice is almost cooked. The grains should have a slight bite to them when cooked.\"}, {\"Drain the rice in a colander, gently fluff and keep aside. Remove the whole spices.\"}, {\"Prepare all the vegetables and keep to one side and slice the onions.\"}, {\"In a pan, heat 3 tbsp ghee and add the whole spices (Shai jeera bay leaf, 3 green cardamoms, 3 cloves, 1 black cardamom, cassia bark) and sauté until the spices crackle and become fragrant.\"}, {\"Add the sliced onions, stir and sauté on a medium heat until they brown. This will take about 20 minutes. Remove a few of the brown onions and set to one side.\"}, {\"Beat the yoghurt with a whisk until it\"s soft and smooth.\"}, {\"Mince the ginger and garlic in a blender or in a pestle and mortar.\"}, {\"Once onions are golden brown, add the minced ginger and garlic paste, green chillies and the salt.xa0Continue to cook for 5 or 6 minutes.\"}, {\"Stir in the turmeric, red chilli powder and coriander powder and mix together.\"}, {\"Add all the chopped vegetables and sauté for a minute or two.\"}, {\"Stir in the whippedxa0yoghurt and leave the vegetables to cook - you may need to add a little splash of water.\"}, {\"Once the vegetables are soft and the gravy has a thick consistency, add the cashews, raisins and almonds to the masala.\"}, {\"Stir and check the seasoning and set to one side to cool a little.\"}, {\"Warm 5 tbsp milk.\"}, {\"Add a large pinch of saffron strands - stir and keep aside.\"}, {\"Heat the oven to 180ºC.\"}, {\"In a thick bottomed pan, layer half of the gravy, then layer half of the rice on top.\"}, {\"Sprinkle half of the chopped coriander, mint leaves, reserved browned onions and saffron milk before adding the next layer the remaining vegetables.\"}, {\"Layer the remainder of the rice on top and sprinkle the remaining coriander, mint leaves, saffron milk and brown onions on the top.\"}, {\"Sprinkle 2 tsp of kewra water.\"}, {\"Seal with aluminium foil and place a lid on top.\"}, {\"Bake the biryani in the oven for 20-25 minutes until piping hot, then serve.\"}', '{\"Calories\": \"447\", \"Fat (g)\": \"23\", \"of which saturates (g)\": \"9\", \"Carbohydrates (g)\": \"43\", \"of which sugars (g)\": \"7\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"17\", \"Salt (mg)\": \"485\"}', '', 'Salad', 'lunch', '20min'),
(97, 'Fish Kebabs', '[\"150g salmon, skinned and boned\", \"250g white fish, skinned and boned\", \"½xa0tsp salt, or to taste\", \"Juice 1 lemon\", \"2 cloves garlic\", \"3-4 tbsp mustard oil for frying\", \"2 tbsp gram flour\", \"4cm piece ginger, grated\", \"2 green chillies, finely chopped\", \"Handful of fresh coriander, finely chopped\", \"1 tsp black peppercorns,xa0cracked\", \"½xa0tsp turmeric powder\"]', '{\"Cut the fish into chunks, sprinkle with salt and the lemon juice.\"}, {\"Place the marinated fish in a steamer with the roughly crushed garlic and the squeezedxa0lemon.\"}, {\"Once you have added water to the steamer begin to cook the fish for about 5-7 minutes. Then remove from the heat and leave to cool.\"}, {\"Place most of the steamed fish and the garlic into a food processor and blend until smooth. Keep some of the steamed fish in the larger chunks for texture.\"}, {\"Place all the fish into a large bowl and set to one side.\"}, {\"Toast the gram flour in a frying pan on a gentle heat. Keep it moving in the pan until it turns a shade darker and you can smell a slightly sweet fragrance (about 5 minutes) then remove from the heat.\"}, {\"Into the bowl with the fish add the ginger, chillies, salt, fresh coriander, pepper, turmeric and toasted gram flour. Stir thoroughly to combine all the ingredients.xa0Cover and refrigerate for 15-20 minutes.\"}, {\"When you are ready to cook, wet your hands as this stops the mixture sticking to your fingers and start to shape the fish mixture into 5cm patties.\"}, {\"Heat the mustard oil in a non-stick frying pan to smoking point (not required for other oils). Then remove from the heat and wait for it to cool. Once cooled start to reheat gently to cook the fish.\"}, {\"Fry the kebabs on medium heat for 1-2 minutes on each side until crisp and golden brown on both sides.\"}', '{\"Calories\": \"143\", \"Fat (g)\": \"8.3\", \"of which saturates (g)\": \"0.9\", \"Carbohydrates (g)\": \"3.1\", \"of which sugars (g)\": \"0.5\", \"Fibre (g)\": \"0.6\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"0.19\"}', '', 'Salad', 'lunch', '20min'),
(98, 'Coconut and Vanilla Ice-cream', '[\"400ml tin of coconut cream\", \"100g sugar\", \"2 heaped tbsp coconut oil, melted\", \"1 vanilla pod\"]', '{\"Freeze the inside container of your ice cream maker overnight before making the ice cream.\"}, {\"Place all the ingredients into a bowl and whisk together so it has all fully incorporated.\"}, {\"Cover and cool for a while.\"}, {\"Put the mixture into the chilled bowl of the ice cream maker and leave to churn for about 20 minutes until it\"s thick.\"}, {\"Pour into a container and leave it to set in the freezer for about 2 hours.\"}', '{\"Calories\": \"132.00\", \"Fat (g)\": \"1.00\", \"of which saturates (g)\": \"1.00\", \"Carbohydrates (g)\": \"18.00\", \"of which sugars (g)\": \"17.00\", \"Fibre (g)\": \"0.00\", \"Protein (g)\": \"0.00\", \"Salt (mg)\": \"0.001\"}', '', 'Salad', 'lunch', '20min'),
(99, 'Hot Sticky Wings', '[\"vegetable oil for frying\", \"4 tbsp plain flour\", \"1 tbsp corn flour\", \"3 tsp chilli powder\", \"1 tsp cumin seeds\", \"24 wings, (split at the joints, tips removed)\", \"3 tbsp tomato ketchup\", \"3 tbsp brown sauce\", \"2 tbsp hot chilli sauce or 2 red chillies chopped\", \"2 tbsp honey\", \"1 tbsp soy sauce\", \"1 tsp kalongi seeds\"]', '{\"Mix the flour and chilli in a shallow dish.\"}, {\"Coat the wings in the flour mixture to coat, shake off any excess.\"}, {\"To cook in the oven heat to 180ºC and place the coated wings on a wire rack over a oven tray and cook for 30 minutes. You can also fry them in hot oil at 180ºC. Do this in batches, until cooked through and deep golden brown in colour, about 15 minutes. Once cooked remove and transfer to some kitchen paper to drain.\"}, {\"Meanwhile, heat the oven to 200ºC\"}, {\"In a small pan combine the ketchup, chilli sauce, honey, soy and kalongi seeds and heat over medium heat for about 10 minutes until the sauce thickens slightly.\"}, {\"Pour some of the sauce into a dipping bowl for later.\"}, {\"Place the cooked wings onto an oven tray and pour the remaining sauce over them. Place them in the oven for about 10-20 minutes until crisp and sticky.\"}, {\"Serve with the sauce and some napkins.\"}', '{\"Calories\": \"252\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"3.4\", \"Carbohydrates (g)\": \"15\", \"of which sugars (g)\": \"7.1\", \"Fibre (g)\": \"0.3\", \"Protein (g)\": \"21\", \"Salt (mg)\": \"1.6\"}', '', 'Salad', 'lunch', '20min'),
(100, 'Spicy Courgette and Pea Fritter', '[\"2 medium courgettes, grated\", \"100g plain flour (or gram flour)\", \"1 tsp baking powder\", \"1 small onion, finely chopped\", \"50g frozen peas, defrosted\", \"2 cloves of garlic, finely chopped\", \"salt to taste\", \"1 green chilli, chopped\", \"handful coriander, chopped\", \"1 tsp chilli powder\", \"1 tsp garam masala\", \"1 tsp cumin seeds\", \"oil for cooking\"]', '{\"Grate the courgette and sprinkle with salt and leave for as long as you can. Place it in a colander in the sink, squeezing out any excess water.\"}, {\"In a bowl mix together the flour and baking soda.\"}, {\"Add the grated courgette, onion, peas, garlic, salt, chilli, coriander, chilli powder, garam masala and cumin seeds.\"}, {\"Squeeze and mix everything together. If it\"s a little dry add a touch of water.\"}, {\"Heat some oil (2 tbsp) in a nonstick frying pan.\"}, {\"Take a large spoonful and place in the hot pan. Gently press to flatten (it will be sticky) and shallow fry fritters. Reduce the heat if it gets too hot.\"}, {\"Cook on the first side until golden then flip and cook the other side.\"}', '{\"Calories\": \"164\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"26\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"169\"}', '', 'Salad', 'lunch', '20min'),
(101, 'Tandoori Paneer', '[\"400g paneer, cut into large cubes\", \"1 tbsp mustard oil\", \"1 large lemon\", \"4 cloves garlic, crushed\", \"5cm piece of ginger, grated\", \"1 green chilli, finely chopped\", \"200g Greek yoghurt\", \"1 tsp salt\", \"2 tsp garam masala\", \"1 tsp cumin seeds, crushed\", \"1 tbsp kashmiri red chilli powder\", \"1 tbsp dried fenugreek leaves\", \"Handful of coriander chopped lemon wedges\"]', '{\"Blend the garlic, ginger, chilli in a pestle and mortar\"}, {\"Place the paneer cubes in the dish and stir in the blended ingredients along with the mustard oil and lemon juice.\"}, {\"In a separate dish mix the remaining ingredients together with the yoghurt to create a paste. Add this spiced yoghurt paste to the paneer. Cover and leave to marinade for at least 30 minutes (the longer the better).\"}, {\"Heat the oven to 180oC.\"}, {\"Transfer to an oven tray and cook for about 10-15 minutes. Alternatively, skewer onto bamboo sticks with peppers and onions and cook on the barbeque as kebabs!\"}', '{\"Calories\": \"59\", \"Fat (g)\": \"5.0\", \"of which saturates (g)\": \"1.9\", \"Carbohydrates (g)\": \"2.3\", \"of which sugars (g)\": \"1.5\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"2.0\", \"Salt (mg)\": \"0.93\"}', '', 'Nuts', 'snacks', '20min'),
(102, 'Tangy Fried Okra', '[\"500g okra\", \"3 tbsp mustard oil\", \"1 onion, finely sliced\", \"2 tsp coriander seeds\", \"1 dried red chilli/1tsp chilli flakes\", \"1 tsp salt\", \"1 tsp turmeric\", \"1 tsp garam masala\", \"2 tsp amchoor powder (dried mango powder)\"]', '{\"Wash and thoroughly dry the okra (kitchen roll is great for this).\"}, {\"Remove the tops and slice the okra in half lengthways. Place the coriander seeds and red chilli into the pestle and mortar and pound until you have a coarse powder, then leave to one side.\"}, {\"Heat the oil in a wok or non-stick pan on a medium heat, then stir in the sliced onions and cook until they just begin to brown.\"}, {\"Add the okra and fry for about ten minutes, stirring now and then.\"}, {\"Add the salt, turmeric along with the coriander and chilli mixture. Reduce the heat and leave the okra to cook for five more minutes (do not cover the pan).\"}, {\"Once cooked, remove from the heat, sprinkle with garam masala and dust with the armchoor powder to serve.\"}', '{\"Calories\": \"71\", \"Fat (g)\": \"5.6\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"3.5\", \"of which sugars (g)\": \"2.7\", \"Fibre (g)\": \"3.4\", \"Protein (g)\": \"2.6\", \"Salt (mg)\": \"0.56\"}', '', 'Nuts', 'snacks', '20min'),
(103, 'Indian Duck Breast with Tamarind Jam', '[\"1 tbsp rapeseed oil\", \"1 onion, sliced\", \"2 cloves of garlic\", \"1 tbsp ginger, grated\", \"1 fresh tomato, chopped\", \"½ tsp turmeric\", \"½ salt\", \"½ chilli, finely sliced\", \"½ tsp kashmiri chilli powder or paprika\", \"1 tbsp tamarind paste\", \"1 tsp garam masala\", \"2 tbsp fresh coriander, chopped\", \"4 duck breasts\", \"salt and pepper to taste\", \"½ tsp Kashmiri chilli powder\", \"2 star anise\"]', '{\"Heat oil and fry the onion and garlic gently until they caramelise and turn a dark brown, this will take about 10-15 minutes.\"}, {\"Reduce the heat, add tomatoes, ginger, turmeric, salt, chopped chilli, chilli powder and cook down until the tomatoes and onions melt down to create a thick pulp.\"}, {\"Add the tamarind and a splash of water. Leave to cook down to create a chutney texture on a gentle heat – add a little more water if required.\"}, {\"Once thick remove from the heat and add the garam masala. You can set this to once side and reheat to serve.\"}, {\"Heat oven to 200ºc and score the duck breast on the skin side, diagonally being careful not to go down to the flesh.xa0Trim the edges of any excess skin.\"}, {\"Season the breasts on both sides with some salt, pepper, Kashmiri Chilli powder and place into a cold pan skin side down. Put the heat on a gentle flame and heat to render down the fat.\"}, {\"As it begins to cook add the star anise to the pan.\"}, {\"As the fat begins to reder out the skin, pour it out into a jar (keep this in the fridge to cook your roasties). Leave to render until the skin is a golden brown and crisp. Turn the breast so it\"s skin side up and cook for another 5 minutes in the pan.\"}, {\"Keeping it skin side up place the breast onto a baking sheet and cook for 5-6 minutes in the oven (longer if you prefer it cooked through).\"}, {\"Remove from the oven and leave it to rest for 5-10 minutes so the meat can relax. The duck will be cooked through yet be beautifully pink inside.\"}, {\"Serve with the tamarind jam.\"}', '{\"Calories\": \"323\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"11\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"41\", \"Salt (mg)\": \"239\"}', '', 'Nuts', 'snacks', '20min'),
(104, 'Crab and Prawn Cakes', '[\"200g prawns\", \"200g crab meat\", \"1 large potato, cooked until just soft & grated\", \"4 curry leaves, chopped\", \"handful of fresh coriander leaves\", \"mustard oil for frying\", \"1 tsp turmeric\", \"1 fresh chilli, finely chopped\", \"½ tsp Kashmiri chilli powder\", \"1 tsp garam masala\", \"½xa0tsp salt or to taste\", \"juice from 1 lemon\", \"3 tbsp gram flour\", \"1 tsp chilli flakes\"]', '{\"Wash and roughly chop the prawns\"}, {\"Mix these with the crab meat, cooked potato, curry leaves, garam masala, chopped chilli, coriander leaves, Kashmiri chilli and turmeric powder, lemon juice and salt.\"}, {\"Wet your hands and form the mixture into 12 equal sized patties or tikki. If the mixture feels too wet you can add more cooked potato or some toasted gram flour.\"}, {\"Heat oil in a frying pan.\"}, {\"Place the gram flour onto a plate and sprinkle in a teaspoon of chilli flakes. Dust each one with the flour.\"}, {\"Once the oil is hot place the cakes into the pan and cook through for 3 minutes, reduce the heat if required, then turn over and cook the other side. They should be crisp on the outside - they are delicate and can break up so be gentle with them.\"}', '{\"Calories\": \"142\", \"Fat (g)\": \"7.0\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"6.5\", \"of which sugars (g)\": \"0.4\", \"Fibre (g)\": \"0.9\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"1.1\"}', '', 'Nuts', 'snacks', '20min'),
(105, 'Mango Bellini', '[\"1 mango, peeled and flesh chopped\", \"1 bottle of Prosecco, chilled\", \"1 lime, cut into 4 wedges\"]', '{\"Put the cut mango into a blender and puree\"}, {\"Spoon one tablespoon of the mango puree into the bottom of 4 champagne flues\"}, {\"Squeeze in the lime juice from one wedge into each glass\"}, {\"Gently pour in the Proseccoxa0to fill the glass\"}, {\"Stir through just before serving\"}', '{\"Calories\": \"175\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"32\", \"of which sugars (g)\": \"12\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"1\"}', '', 'Nuts', 'snacks', '20min'),
(106, 'Mint Raita', '[\"100ml natural set yoghurt\", \"Splash of milk\", \"1 tbsp mint sauce\", \"1 tsp garam masala\"]', '{\"Put the yoghurt into a bowl, add a splash of milk to create a runny consistency.\"}, {\"Stir in the mint sauce.\"}, {\"Stir in the garam masala.\"}, {\"Garnish with a sprig of mint and refrigerate until required.\"}', '{\"Calories\": \"35\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"5\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"5\"}', '', 'Nuts', 'snacks', '20min'),
(107, 'Boonthi Raita', '[\"1 handful of boonthi\", \"100ml milk\", \"300g Greek yoghurt\", \"1 tsp cumin seeds, toasted and ground\", \"½ tsp chilli powder\", \"½ tsp black pepper, ground\", \"¼ tsp salt (or to taste)\", \"1 tbsp corinder leaves, chopped\"]', '{\"Place the boonthi into a bowl and pour the milk over them. Leave to soak for about 20 minutes until soft.\"}, {\"In axa0bowl whisk the yoghurt and add cumin, chilli, pepper and salt\"}, {\"Stir in the boonthi with a little of the milk so the yoghurt has a slightly more runny consistency. Stir through.\"}, {\"Top with the chopped coriander and refrigerate until required.\"}', '{\"Calories\": \"96\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"8\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"10\", \"Salt (mg)\": \"301\"}', '', 'Nuts', 'snacks', '20min'),
(108, 'Chicken Jalfrezi', '[\"8 chicken thighs, cut into chunks\", \"2 tbsp vegetable oil\", \"4 chillies, chopped\", \"1 tsp cumin seeds\", \"4 garlic cloves, sliced\", \"1 tsp salt\", \"4 fresh tomatoes, chopped\", \"½xa0tsp turmeric\", \"2 tbsp Greek yoghurt (optional)\", \"½xa0tspxa0salt\", \"1 tbsp vegetable oil\", \"1 onion, cut into chunks\", \"1 red pepper, cut into chunks\", \"1 green pepper, cut into chunks\", \"1 tsp cumin seeds\", \"1 tomato, chopped\", \"2 chillies, chopped\", \"1 tsp garam masala\"]', '{\"Heat oil in a pan, add the cumin seeds, chilli and garlic and fry until lightly browned.\"}, {\"Add the chopped tomatoes, salt and turmeric then cook so the tomatoes break down to make a lovely thick sauce.\"}, {\"Add the chicken and stir to coat the pieces. Reduce the heat,xa0place the lid on the pan and leave to cook for 15-20 minutes on a low heat.\"}, {\"I like to add a bit of a zing to the sauce so I stir in some yoghurt, but you don\"t have to.\"}, {\"In a separate pan heat some oil and add the cumin seeds. Once fragrant stir in the chunky onions and peppers, tomato and the chilli, and then stir fry. You can cook these as much or as little as you like (I prefer mine with a bit of a crunch) then stir in the garam masala.\"}, {\"Once the chicken is cooked and the sauce has reduced stir in the vegetable mixture. simmer for a couple of minutes then serve.\"}', '{\"Calories\": \"386\", \"Fat (g)\": \"21\", \"of which saturates (g)\": \"3\", \"Carbohydrates (g)\": \"21\", \"of which sugars (g)\": \"12\", \"Fibre (g)\": \"6\", \"Protein (g)\": \"31\", \"Salt (mg)\": \"1018\"}', '', 'Nuts', 'snacks', '20min'),
(109, 'Lamb Kofta', '[\"400g mince lamb\", \"2 tbsp oil\", \"1 tsp salt\", \"1 tsp cumin seeds, crushed\", \"1 tsp chilli powder\", \"2 tsp garam masala\", \"1 tbsp oil\", \"1 large onion, finely chopped\", \"2-3 cloves of garlic, finely chopped\", \"2 tsp ginger, grated (3-4cm)\", \"1 tsp salt\", \"1 tsp turmeric\", \"1 tsp dried fenugreek leaves\", \"1 chilli, chopped\", \"½xa0tsp chilli powder\", \"200g or ½xa0tin of plum tomatoes\", \"1 tsp garam masala\", \"Handful fresh coriander, finely chopped\"]', '{\"In a large mixing bowl add the mince lamb, salt, cumin, chilli powder, garam masala, and mix using your hands to ensure the spices are evenly distributed.\"}, {\"Rub a little oil on to your hands to stop the mixture sticking to your hands.\"}, {\"Take a small amount of the meat and roll in your palms to make a meatball.xa0Ensure it is smooth all over and set to one side.\"}, {\"Repeat with the rest of the mixture.\"}, {\"Heat the oil in a frying pan. Carefully fry the meatballs (kofta) in batches so they brown and crisp up all over.\"}, {\"Remove the kofta using a slotted spoon and set them on some kitchen paper to drain.\"}, {\"Heat the oil in a pan and stir in the onions and garlic and gently cook down until the onions turn a dark golden brown colour.\"}, {\"Reduce the heat and add the ginger and chopped chilli, stir and add the tomatoes, salt, turmeric, fenugreek and chilli powder.\"}, {\"Stir together and leave to cook gently so the onions and tomatoes melt together with the spices creating a wonderfully thick aromatic paste.\"}, {\"Add the kofta to the pan and coat with the sauce for a few minutes.\"}, {\"Add enough boiling water to get the consistency of sauce you want. Bring it all to the boil and turn the heat off.\"}, {\"Leave the kofta to absorb the juices from the sauce for 5-10 minutes.\"}, {\"Throw in the garam masala and corinander before serving.\"}', '{\"Calories\": \"120\", \"Fat (g)\": \"8.0\", \"of which saturates (g)\": \"3.0\", \"Carbohydrates (g)\": \"3.1\", \"of which sugars (g)\": \"2.0\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"9.7\", \"Salt (mg)\": \"1.2\"}', '', 'Nuts', 'snacks', '20min'),
(110, 'Corn and Pomegranate Kachumber', '[\"300g tin sweetcorn\", \"¼ of a cucumber, peeled and diced\", \"2 tomatoes, diced\", \"crunchy corn (bought from supermarkets)\", \"handful of pomegranate jewels\", \"handful of pea shoots\", \"½ tsp honey\", \"1 lime, juiced\", \"½ tsp paprika powder\", \"3cm fresh ginger, fine chopped\", \"1 green chilly, fine chopped\", \"large pinch coriander leaves, chopped\", \"Salt to taste\"]', '{\"Wash the corn and leave to dry.\"}, {\"Mix all the dressing ingredients in jamxa0jar and shake to mix all the flavours together. Set to one side.\"}, {\"Place in a bowl the corn with the diced cucumber and diced tomatoes.\"}, {\"Sievexa0the dressing over the salad and toss it together.\"}, {\"Sprinkle in the pea shootsxa0and finally, sprinkle the crunchy corn and pomegranate on top and serve.\"}', '{\"Calories\": \"270\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"53\", \"of which sugars (g)\": \"16\", \"Fibre (g)\": \"8\", \"Protein (g)\": \"8\", \"Salt (mg)\": \"390\"}', '', 'Nuts', 'snacks', '20min'),
(111, 'Keema Burrito', '[\"250g Roti flour\", \"½ tsp salt\", \"2 tsp Rapeseed oil\", \"water\", \"2 tbsp oil\", \"1 onion, very finely chopped\", \"2 garlic cloves, minced\", \"5 cm piece ginger, minced\", \"400g minced lamb\", \"2 green chillies, finely chopped (optional)\", \"1 tsp chilli powder\", \"1 tsp coriander seeds, crushed\", \"1 tsp cumin seeds, crushed\", \"1 tsp garam masala\", \"1 tsp salt (to taste)\", \"2 tbsp tomato puree\", \"400g/1 tin kidney beans or aduki beans, drained\", \"Handful fresh coriander leaves, finely chopped\", \"½ small red onion\", \"1 tomato\", \"1 chilli, finely chopped\", \"Fresh coriander leaves, chopped\", \"Juice from ½ lemon\", \"½ tsp salt\", \"½ tsp kalonji seeds\", \"salad leaves (optional)\"]', '{\"In a bowl or stand mixer, mix flour, salt and oil together. Knead to a soft dough.\"}, {\"Cover the dough with a damp cloth and leave to rest for 20 minutes.\"}, {\"When you are ready to cook, heat your tava or frying pan to a medium heat.\"}, {\"Roll out the roti and place on the pan to cook. Once it changes colour a little, turn and cook the other side. Place in a tea towel to keep warm.\"}, {\"Heat oil in a pan and on a medium heat, start to fry the finely chopped onions.\"}, {\"After 5 minutes, add the minced ginger and garlic until everything is golden brown.\"}, {\"Add the mince meat, chopped chillies, spices and salt, and stir fry until the meat has browned.\"}, {\"Squeeze in the tomato puree and a splash of water with the beans. Leave the mixture to cook thoroughly, stirring occasionally until all the liquid has evaporated. This will take about 10 minutes.\"}, {\"The filling must be nice and dry. Leave to cool a little then add the chopped coriander leaves.\"}, {\"Finely dice the red onions, tomato, chilli and place into a bowl with coriander.\"}, {\"Squeeze in the lemon and sprinkle in the salt and kalonji seeds. Stir and serve.\"}, {\"Spoon the keema mixture into the roti\"}, {\"Add a spoonful of the tomato kachumber with a few salad leaves and roll up the burrito.\"}', '{\"Calories\": \"112\", \"Fat (g)\": \"3.6\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"7.8\", \"of which sugars (g)\": \"6.9\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"1.0\"}', '', 'Nuts', 'snacks', '20min'),
(112, 'Pistachio chicken', '[\"600g chicken thighs, cut into chunks\", \"100g Pistachios, blanched\", \"1 medium onion, chopped finely\", \"7cm piece ginger, roughly chopped\", \"2-3 green chillies 6 garlic cloves\", \"½ small bunch of fresh coriander leaves\", \"200g yoghurt ½ tsp turmeric powder\", \"Salt to taste\", \"2 tbsp ghee\", \"2 cloves\", \"15 black peppercorns\", \"4 green cardamoms, cracked\", \"1 bay leaf\", \"2 inch cassia bark\", \"1 tsp cumin seeds\", \"Fresh cream for garnish\", \"Fresh coriander to garnish</li>\"]', '{\"Boil enough water to cover the pistachios, add them and blanch for about 5 minutes.\"}, {\"Drain and put them into cold water so they stay green.\"}, {\"Squish them in your fingers to remove the skins. Discard the skin and place the pistachios in a bowl for later.\"}, {\"Put the chicken in a large bowl and add yoghurt, turmeric powder, salt and mix well.\"}, {\"Heat ghee and add cloves, black peppercorns, green cardamoms, bay leaf and cassia and sauté until fragrant. Add minced onion and and cook to soften for 5-10 minutes.\"}, {\"Add ginger, green chillies, garlic and sauté until soft. Stir in the pistachios and stil for 2-3 minutes. Remove the pan from the heat and let it cool for a while.\"}, {\"Remove the bay leaf and cassia bark. Pour into a large jug and add a handful of fresh coriander leaves and about 130 ml of water and with a stick blender and blitz to a fine purée.\"}, {\"In the same pan heat a tbsp of ghee and add cumin seeds until they sizzle and put the cassia and bay back to the pan. Add the marinated chicken and sauté on high heat for 3-4 minutes.\"}, {\"Pour in the blended pistachio paste with some salt and mix well. Cover the pan and cook for 25 minutes, stirring occasionally until cooked through.\"}, {\"Transfer into a serving bowl. Garnish with fresh cream, coriander and slivers of pistachios.\"}', '{\"Calories\": \"266\", \"Fat (g)\": \"7\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"13\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"6\", \"Protein (g)\": \"31\", \"Salt (mg)\": \"11\"}', '', 'Nuts', 'snacks', '20min'),
(113, 'Patra Ni Machi', '[\"4 seabass or pomfretxa0steaks\", \"100g fresh coconut, grated\", \"3 green chillies\", \"50g coriander, washed\", \"50g mint leaves, washed\", \"4cm piece of ginger\", \"3 garlic cloves\", \"½xa0tsp cumin powder\", \"¼xa0tsp turmeric powder\", \"½xa0tsp salt\", \"1 lemon\", \"1 large banana leaf washed thoroughly, central spine removed\", \"1 tbsp vegetable oil\"]', '{\"Put the fish steaks on a tray and squeeze the lemon over them with a sprinkle of salt and turmeric.\"}, {\"Rub this over the fish and set to one side for 20 minutes.\"}, {\"Crush the cumin seeds. Put the coconut, green chillies, coriander and mint leaves, ginger and garlic, a little salt and the crushed cumin into a blender and grind to a smooth paste.xa0And a dash of water if required.\"}, {\"Coat the pieces of fish all over and keep aside.\"}, {\"Pat dry the banana leaf pieces and smear lightly with a little oil on the smooth side.\"}, {\"Place one piece of fish in the center of each piece of leaf and wrap into a neat parcel. Tie with twine from the leaf or with a toothpick.\"}, {\"This can either be griddled or cooked in a steamer for 15 minutes. Serve it all wrapped up with a some rice.\"}', '{\"Calories\": \"138\", \"Fat (g)\": \"7.3\", \"of which saturates (g)\": \"4.9\", \"Carbohydrates (g)\": \"4.5\", \"of which sugars (g)\": \"0.7\", \"Fibre (g)\": \"1.1\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"0.63\"}', '', 'Nuts', 'snacks', '20min'),
(114, 'Roti', '[\"500g whole-wheat flour (atta)\", \"300ml Water approx.\", \"1 tsp butter or oil\"]', '{\"Put the atta in a bowl and adding a little water at a time bring the flour together with your hands to make dough.\"}, {\"Start to knead the dough using your knuckles, folding it over as you go. The dough should come together and come away from your hand and the bowl. If it is sticky add a little more flour and continue to knead. The dough needs to be soft but not sloppy. Set to one side for at least half an hour before making the roti.\"}, {\"Put some dry atta on a flat plate for dusting. Heat up the thava on the lowest setting, flour your hands and take a tangerine sized ball of dough.\"}, {\"Roll the dough in the palms of your hands creating a smooth ball.\"}, {\"Flatten it using your fingers then holding the dough in one hand rotate it round and flatten out with the other.\"}, {\"Flour again and begin to roll out. Turn it over, flour and roll again, try not to let it stick. When it is about 7cm in diameter pick it up and pass from one hand the other as if you are clapping.\"}, {\"This evens it out and removes the excess flour.\"}, {\"To cook, heat the tava which is an Indian griddle pan (but a non stick frying pan will do) and carefully place the roti flat on to it. Try not to let the roti fold.\"}, {\"You will see the colour of the roti darken after about 10 seconds, turn the roti over. If using gas - turn the heat down a little and when bubbles appear after about 10 seconds take the thava off the hob and put the roti directly onto the flame.\"}, {\"The roti will begin to puff up, turn it over using tongs and move it around so it doesn\"t burn. If you are not using a gas cooker or are not comfortable using a naked flame leave the roti on the pan. Turn the heat down a little and when bubbles appear turn the roti over.xa0Using a clean tea towel gently press the top of the roti and it will begin to blow up with hot steam.\"}, {\"Work quickly, turning and pressing until it has all blown up. Be careful not to burn yourself. Remove the roti and set it on a clean tea towel and cover to keep warm.\"}', '{\"Calories\": \"115\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"24\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"4\"}', '', 'Nuts', 'snacks', '20min'),
(115, 'Asparagus with Indian Spices', '[\"2 garlic cloves\", \"3cm piece ginger\", \"500g Asparagus, chopped\", \"3 tsp rapeseed oil\", \"1 tsp cumin seeds\", \"½ tsp fennel seeds\", \"1 onion, sliced\", \"1 green chillies, finely chopped\", \"1 tsp Kashmiri chilli powder\", \"½ tsp amchoor powder (dried mango powder)\", \"3 tomatoes, chopped finely\", \"Salt to taste\"]', '{\"Crush the ginger and garlic in a pestle and mortar to a paste.\"}, {\"Heat the oil in pan and on a medium heat add the cumin and fennel seeds.\"}, {\"Once sizzling and fragrant add sliced onions with the chopped green chilies and crushed ginger and garlic. Cook for about 5 minutes.\"}, {\"Add the chopped asparagus and sprinkle in the salt, red chili powder and amchoor.\"}, {\"Add chopped tomatoes and cook for about 2-3 minutes.\"}', '{\"Calories\": \"42\", \"Fat (g)\": \"2.7\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"2.9\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"1.4\", \"Protein (g)\": \"2.1\", \"Salt (mg)\": \"0.13\"}', '', 'Nuts', 'snacks', '20min'),
(116, 'Paneer Pakora', '[\"120g paneer sliced into rectangles about 2cm wide. 14-16 slices\", \"2 tbsp yoghurt, whisked\", \"4 tbsp corn flour\", \"2cm fresh ginger\", \"1 green chilli\", \"½ tsp salt\", \"1 tbsp coriander, chopped\", \"100g gram flour\", \"1 tsp xa0cumin seeds\", \"1 tsp salt\", \"Pinch of baking soda\", \"Water\", \"1 tsp chaat masala\"]', '{\"Mince the green chilli and ginger in a blender.\"}, {\"In a mixing bowl, combine the yoghurt, corn flour, salt, ginger, green paste and coriander. Mix all together until you get a paste.\"}, {\"Add the paneer and coat with the yoghurt mixture. Set aside for one hour or more.\"}, {\"Heat a little oil in a small pan to deep fry the pakora on a gentle heat.\"}, {\"In a second bowl, mix the gram flour, cumin seeds, salt and baking soda.\"}, {\"Add water slowly to make a thick xa0batter.\"}, {\"To test that the oil is hot enough, put one drop of batter in the oil. The batter should form a small ball, sink and rise to the surface, but not change colour too much.\"}, {\"Dip a marinated paneer slice into the batter so it is fully coated. Very carefully, slide it into the hot oil to start cooking. The pakoras will take about four to five minutes to cook.xa0Turn it occasionally, until both sides are golden brown.\"}, {\"Repeat with the remaining pakora in small batches.xa0The pakora should be light and crisp. They are delicious when served with a sprinkle of chaat masala and a chutney.\"}', '{\"Calories\": \"241\", \"Fat (g)\": \"12(pre-cooked)\", \"of which saturates (g)\": \"6\", \"Carbohydrates (g)\": \"23\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"13\", \"Salt (mg)\": \"895\"}', '', 'Nuts', 'snacks', '20min'),
(117, 'Tomato Kachumber Salad', '[\"1 small red onion\", \"2 tomatoes\", \"1 chilli, finely chopped\", \"Fresh coriander leaves\", \"Juice from 1 lemon\", \"1 tsp salt\", \"½ tsp garam masala\", \"1 tsp kalonji seeds\"]', '{\"Cut the onions, tomato, chilli into a very fine dice and place into a bowl.\"}, {\"Finely chop the coriander and place into the bowl.\"}, {\"Squeeze in the lemon and sprinkle in the salt, garam masala, kalonji seeds - stir and serve.\"}', '{\"Calories\": \"22\", \"Fat (g)\": \"0.3\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"4.3\", \"of which sugars (g)\": \"3.5\", \"Fibre (g)\": \"1.0\", \"Protein (g)\": \"1.0\", \"Salt (mg)\": \"1.3\"}', '', 'Nuts', 'snacks', '20min'),
(118, 'Prawn Pakora', '[\"2 green chillies\", \"3 garlic cloves, peeled\", \"3cm piece ginger, peeled\", \"juice from 1 lemon\", \"350g raw king prawns\", \"150g gram flour\", \"½ tsp sea salt\", \"½ tsp Kashmiri chilli powder\", \"½ tsp ground turmeric\", \"½ tsp cumin seeds\", \"½ tsp coriander seeds, crushed\", \"½ tsp garam masala\", \"small handful coriander, finely chopped\", \"approx. 100ml warm water\", \"Vegetable oil, for deep-frying\"]', '{\"In a blender blitz ginger, garlic, chillies and empty into a bowl.\"}, {\"Add the salt, turmeric, chilli powder and lemon juice and stir through the prawns – leave these to marinate for 30 minutes.\"}, {\"Heat oil in a karahi for deep frying\"}, {\"In a second bowl, sift in the gram flour and add the crushed coriander seeds, garam masala and cumin seeds.\"}, {\"Add the prawn mixture and mix to coat with the batter. If it feels dry add in a little water to create a thick batter.\"}, {\"Check the oil is hot enough by dropping in a little batter. If it rises straight away, it\"s ready.\"}, {\"Very carefully slip a few of the prawns into the hot oil to fry for three to four minutes. Turn them over and when they\"re golden brown all over remove them with a slotted spoon.\"}, {\"Drain on a baking tray lined with kitchen paper and keep warm in the oven while you cook the remaining. Serve immediately while they\"re still hot.\"}', '{\"Calories\": \"272\", \"Fat (g)\": \"8\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"23\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"28\", \"Salt (mg)\": \"670\"}', '', 'Nuts', 'snacks', '20min'),
(119, 'Courgette Chutney', '[\"1 tsp vegetable oil\", \"1 heaped tsp kalonji seeds\", \"1 tsp mustard seeds\", \"1 tsp cumin seeds\", \"2 dried kashmiri red chillies\", \"200ml vinegar\", \"200g jaggery or brown sugar\", \"3 courgettes or 1.5kg marrow, chopped into chunks\", \"1 red chilli, chopped\", \"4 cloves of garlic, sliced\", \"20g ginger, sliced\", \"2 onions, sliced\", \"1 tsp salt, or to taste\", \"1 tsp chilli powder, optional\"]', '{\"Heat the oil in a heavy pan and add the cumin, mustard, kalonji, dried chillies until they sizzle and become fragrant - this should only take a minute.\"}, {\"Add the onions, sliced garlic, ginger, chilli, vinegar, jaggery (or sugar), chopped courgette (or marrow) and bring to a boil then leave to simmer stirring occassionally until it gets to a thick consistency (about 45 minutes).\"}, {\"Season with salt and chilli powder then stir to keep it from sticking.\"}, {\"Put the chutney into a sterilised glass or pickling jar and leave to cool.\"}, {\"Once cooled seal the jar and the chutney will keep for 4-6 weeks. Refrigerate once opened.\"}', '{\"Calories\": \"60\", \"Fat (g)\": \"1.1\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"11\", \"of which sugars (g)\": \"10\", \"Fibre (g)\": \"0.8\", \"Protein (g)\": \"1.6\", \"Salt (mg)\": \"0.33\"}', '', 'Nuts', 'snacks', '20min'),
(120, 'Squid Pakora', '[\"vegetable oil, for deep frying\", \"250g prepared squid, body opened out, scored on the inside, then cut into chunks or cut into rings, plus the tentacles\", \"½ tsp fennel seed\", \"1 tsp cumin seeds\", \"140g gram flour\", \"½ tsp salt\", \"1 tsp ground turmeric\", \"7cm piece of ginger, finely grated\", \"2 garlic cloves, finely chopped\", \"1 green chilli, finely chopped\", \"juice from 1 lime\", \"4 spring onions, finely chopped\", \"1 tsp chilli flakes\"]', '{\"Heat the oil to deep fry the squid on a gentle heat.xa0Line a large bowl with kitchen paper, ready to drain the squid.\"}, {\"Crush the cumin and fennel seeds and place into a mixing bowl.\"}, {\"Into the same bowl sieve in the gram flour and add the salt, turmeric, ginger, garlic, chilli, lime juice and spring onions.\"}, {\"Stir in a little water, a bit at a time, to get a thick batter.\"}, {\"Placed the prepared squid into the batter and mix it well to coat.\"}, {\"Check the oil is hot enough by dropping in a tiny drop of batter. If it browns and floats to the top staright away then it\"s ready.\"}, {\"Very gently slip in a few pieces of the squid and fry for about a minute until it crisps up and turns golden in colour. Lift it out the oil and drain on the kitchen paper. You can then place these onto a baking tray and put them in the oven to keep warm.\"}, {\"Repeat, using up the rest of the batter.\"}, {\"When all the pakoras are cooked, put them on a platter, sprinkle with a little salt, some chilli flakes and serve with a mint dip.\"}', '{\"Calories\": \"248\", \"Fat (g)\": \"7\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"29\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"19\", \"Salt (mg)\": \"60\"}', '', 'Nuts', 'snacks', '20min'),
(121, 'Dirty Mango Lassi', '[\"1 mango peeled, stoned and chopped\", \"4 tbsp Greek yoghurt\", \"3 tsp sugar (or to taste)\", \"1 handful ice cubes\", \"A generous shot dark rum\", \"Sprinkle cardamom powder\"]', '{\"Put the yoghurt, mango,xa0sugar, ice, rum into a blender and blitz until smooth.\"}, {\"Pour the mixture into a tumbler and sprinkle with some cardamom powder.\"}', '{\"Calories\": \"83\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"11\", \"of which sugars (g)\": \"11\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"10\"}', '', 'Nuts', 'snacks', '20min'),
(122, 'Punjabi Piyaz', '[\"2 red onions, finely sliced in rings\", \"large pinch of fresh coriander, chopped\", \"1 green chilli, chopped\", \"1 lemon\", \"1 tsp Kashmiri chilli powder\", \"salt to taste\", \"chaat masala (optional)\"]', '{\"Place the sliced onions in a bowl\"}, {\"Add the chopped coriander and chopped chilli.\"}, {\"Squeeze in the juice from the lemon\"}, {\"Add the chilli powder, salt and chaat masala if using\"}, {\"Using your hands mix everything together and serve\"}', '{\"Calories\": \"17\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"4\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"61\"}', '', 'Nuts', 'snacks', '20min'),
(123, 'Sooka Masala Lamb', '[\"600g Leg of lamb, trimmed, washed & chopped into chunks\", \"2 tsp cumin seeds\", \"4 tsp coriander seeds\", \"2-4 dried whole red chillis\", \"3cm stick of cassia bark\", \"4 green cardamoms\", \"3 cloves\", \"4 tbsp oil\", \"2 black cardamom\", \"2 large onions, finely chopped\", \"5 cloves of garlic, finely chopped\", \"2 tbsp ginger, grated\", \"4 tomatoes, finely chopped\", \"1 tsp turmeric\", \"1 tsp salt\", \"Handful coriander, chopped\"]', '{\"To roast the spices place cumin, coriander, chillies, cassia, green cardamom, and cloves in frying pan and heat until they are fragrant and turn a shade darker. Transfer to a bowl and leave to cool.\"}, {\"Place the spices into a grinder and blitz to a fine powder.\"}, {\"Coat the meat with the spice mix and set to one side.\"}, {\"Heat oil and add the black cardamom then add the chopped onion and garlic. Fry on a high heat and reduce and cook gently until they turn a dark golden brown colour.\"}, {\"Add the ginger, turmeric, tomatoes and stir. Allow the tomatoes and onions to melt together creating a thick masala paste.\"}, {\"Add the spiced meat and salt then fry for 5 minutes.\"}, {\"Reduce the heat to the lowest setting and place the lid on the pan. Leave it to cook in its own juices for 40-50 minutes stirring occasionally until the meat is soft and tender.\"}, {\"When the meat is cooked through increase the heat and fry or \"bhun\" for 5 minutes until the sauce thickens and starts to cling to the meat.\"}, {\"Throw in the chopped coriander to serve.\"}', '{\"Calories\": \"137\", \"Fat (g)\": \"9.1\", \"of which saturates (g)\": \"2.3\", \"Carbohydrates (g)\": \"2.7\", \"of which sugars (g)\": \"1.9\", \"Fibre (g)\": \"0.6\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"0.72\"}', '', 'Nuts', 'snacks', '20min'),
(124, 'Mixed Vegetable Sabjee', '[\"1 potato, diced\", \"1 pepper, diced\", \"5 mushrooms, quatered\", \"1 carrot, diced\", \"50g frozen peas\", \"2 tbsp mustard oil\", \"1 tsp mustard seeds\", \"1 tsp cumin seeds\", \"1 onion, finely diced\", \"200g tomatoes\", \"2 garlic cloves, finely chopped\", \"1 tbsp ginger, grated\", \"1 tsp salt\", \"1 tsp turmeric\", \"1 tsp dried fenugreek leaves\", \"1 chilli, finely chopped\", \"1 tsp garam masala\", \"handful of fresh coriander, chopped\"]', '{\"Heat the oil in a karahi or wok and add the mustard seeds, when sizzling add the cumin seeds until fragrant.\"}, {\"Add the onions and garlic then fry until soft and lightly browned (about 10 minutes)\"}, {\"Reduce the heat and add the tomatoes, ginger, salt, turmeric, chilli and fenugreek. Continue to cook so the onions and tomatoes melt together to create a thick, aromatic masala paste.\"}, {\"Add the chopped vegetables and stir to coat with the sauce.\"}, {\"Reduce the heat cover the pan with the lid and leave to cook for about 10-20 minutes, stirring occasionally until the vegetables are cooked through.\"}, {\"Once cooked sprinkle with garam masala and fresh coriander before serving.\"}', '{\"Calories\": \"238\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"38\", \"of which sugars (g)\": \"7\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"651\"}', '', 'Nuts', 'snacks', '20min'),
(125, 'Lamb Bhuna', '[\"900g leg of lamb or mutton, trimmed and chopped\", \"2 tsp cumin seeds\", \"3 tsp coriander seeds\", \"2 tsp mustard seeds\", \"2-3 dried chilli\", \"2 tsp fennel seeds\", \"1 tsp fenugreek seeds\", \"2 onions, finely chopped\", \"6 garlic cloves, finely chopped\", \"20 curry leaves\", \"4cm ginger, grated\", \"400g / 1 tin plum tomatoes\", \"½ tsp turmeric\", \"1 tsp salt\", \"1 tsp garam masala\", \"Handful coriander, chopped\"]', '{\"Heat a frying pan and add the cumin seeds, coriander, mustard,xa0fennel, fenugreek seeds, and two or three dried chillies. Keep the spices moving for a minute or two until they go a shade darker. Empty the spices into a bowl and let them cool before grinding to a fine powder in a coffee grinder or with a pestle and mortar. Leave to one side.\"}, {\"Heat oil and add onions in a large pan, after a few minutes add the garlic.\"}, {\"Once they have browned add the curry leaves, with the ginger, tomatoesxa0and salt. Cook until the tomatoes break down creating a thick paste.\"}, {\"Add the roasted spice mix and turmeric to the pan and stir well. Cook for a minute or two, taking care not to let the sauce catch on the bottom of the pan. If it does, add a splash of water and quickly stir.\"}, {\"Place the meat in the pan and stir to coat then cook for five minutes. Reduce the heat and put a lid on the pan and cook on a very gentle heat for about 30-40 minutes (longer if using mutton). Check that the meat is tender. If it isn\"t, leave it for a while longer.\"}, {\"When the meat is ready, remove the lid from the pan and turn up the heat and fry to reduce the sauce until it almost disappears. The aim is to create a dry, concentrated sauce that clings tightly to the tender meat.\"}, {\"Finish with a sprinkle of garam masala and a handful of chopped fresh coriander.\"}', '{\"Calories\": \"98\", \"Fat (g)\": \"4.9\", \"of which saturates (g)\": \"2.0\", \"Carbohydrates (g)\": \"2.4\", \"of which sugars (g)\": \"1.6\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"0.53\"}', '', 'Nuts', 'snacks', '20min');
INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(126, 'Shammi Kebabs', '[\"1 tbsp ghee\", \"4 cardamom\", \"3 cloves\", \"7cm cassia bark\", \"2 bay leaves\", \"90g chana dal or split yellow peas, soaked in cold water for about an hour\", \"2 medium onions, roughly chopped\", \"8 garlicxa0cloves, peeled rughly chopped\", \"60g fresh root ginger, roughly chopped\", \"1 tbsp vegetable oil\", \"500g mince lamb, leg meat (this will need to cook for longer)\", \"1 tsp salt\", \"3 fresh green chillies,xa0roughly chopped, with seeds\", \"handful corianderxa0leaves, chopped\", \"1 tsp garam masala\", \"½ tsp Kashmiri chilli powder\", \"½ tsp black cuminxa0(shahi zeera) or regular cumin seeds\", \"1 limexa0, juice only\", \"1 free-range egg, lightly beaten\", \"2 tbsp plain flour, to bind\", \"Rapeseed oil, for shallow-frying\", \"1 medium red onion, finely chopped\", \"1 lime, juice only\", \"1 fresh green chilli, finely chopped, without seeds\", \"handful mintxa0leaves, finely chopped\", \"¼ tsp salt\"]', '{\"Drain the split peas and put them aside.\"}, {\"Heat ghee in a pan and add cardamom, cloves, cassia and bay leaves.xa0Stir in the split peas.\"}, {\"Roughly chop the onions, garlic and ginger and add to the pan. Fry for 10-20 minutes until they soften.\"}, {\"Add the lamb and pour over enough water to just cover the meat (about 400ml/14fl oz), add half a teaspoon of the salt, partially cover with a lid and bring to a simmer.\"}, {\"Cook for about 20 minutes, or until most of the liquid has evaporated. Remove the lid and cook for a further 5-10 minutes, or until the meat is just starting to brown and catch on the bottom. It’s important that any excess moisture has evaporated.\"}, {\"Remove the whole spices and transfer to a plate and leave to cool for about 15 minutes, then tip into a food processor and blend to a smooth paste.\"}, {\"Add the green chillies, coriander, garam masala, chilli powder, cumin, the remaining salt and the lime juice to the lamb mixture and blend again.\"}, {\"Gradually add enough of the egg to bind the mixture without making it too wet. Transfer to a bowl and stir in the flour to create a mixture you can shape.\"}, {\"In a separate bowl, mix together the onions, lime juice, chillies,chopped mint and salt. Drain off any liquid before filling the kebabs.\"}, {\"Wet your hands and divide the mixture into about 16-20 portions. (If you find the mixture is still a little too wet to shape into patties, then add another tablespoon of flour.) Shape one portion into a patty about 4cm/1½in in diameter and 5mm thick.\"}, {\"Put three-quarters of a teaspoon of the filling in the middle of the patty, and draw the edges around and over it to encase the filling and form a rough ball. Then flatten it into a 5mm-thick patty.\"}, {\"Place on a tray, repeat with the remaining mixture, then chill in the fridge for an hour before cooking.\"}, {\"To fry the kebabs, heat a few tablespoons of oil in a heavy-based frying pan over a medium heat. Fry the patties in batches for 2–3 minutes on each side, or until golden-brown and cooked through.\"}, {\"Serve warm with lime wedges, mint chutney and red onion kachumber.\"}', '{\"Calories\": \"150\", \"Fat (g)\": \"9.3\", \"of which saturates (g)\": \"3.5\", \"Carbohydrates (g)\": \"5.0\", \"of which sugars (g)\": \"1.4\", \"Fibre (g)\": \"0.6\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"0.80\"}', '', 'Nuts', 'snacks', '20min'),
(127, 'Samosa', '[\"1 tsp of rapeseed oil\", \"4 potatoes boiled (skin on)\", \"50g frozen peas\", \"½xa0tsp of cumin seeds\", \"1 tsp of salt\", \"½ tsp chilli powder\", \"2 chillies, finely chopped\", \"1-2 tsp of garam masala\", \"1 tbsp ginger, grated\", \"2 tbsp of fresh coriander, chopped\", \"1 tbsp plain flour in a small bowl\", \"Splash of cold water\", \"200g plain flour\", \"1½ tbsp rapeseed oil\", \"Pinch of salt\", \"Approx. 100ml water\", \"Potato filling\", \"Pastry\", \"Paste\", \"Rapeseed oil for deep frying\"]', '{\"Cook the potatoes gently with the skin on (do not boil too vigorously) for about 25 minutes until soft. Remove from the heat and leave to cool. Once cooled peel the skin off with your fingers.\"}, {\"Cut into small 1cm sized cubes and place in a large bowl.\"}, {\"In a small frying pan heat the oil and fry the cumin seeds.xa0When sizzling, carefully add the peas and fry gently for a few minutes to soften. Remove from the heat and leave to cool before adding to the potatoes.\"}, {\"Add the grated ginger, salt, chilli, chilli powder, garam masala and fresh coriander to the potatoes and stir - check seasoning and refrigerate for 10 minutes.\"}, {\"Make some flour glue by adding water to the flour and mix into a thick sticky paste.\"}, {\"Place flour, oil and salt in a bowl and rub the mixture together.\"}, {\"Using your hand begin to sprinkle in a little water at a time to bring the dough together.\"}, {\"Continue to add the water in this way until the dough comes together. Using wet hands knead the dough until it is soft and no longer sticking to your hands or the bowl.\"}, {\"Refrigerate for 10 minutes. Heat up a thava or frying pan on the lowest heat setting.\"}, {\"Take a small tangerine-sized ball of the dough and roll it between your palms to make a smooth ball.\"}, {\"Flatten and roll out with a rolling pin to create a thin round disc the size of a side plate, flouring when necessary. Place the disc on the tava for 4 seconds. Remove and place on a chopping board. Using a sharp knife slice the disc in half so you are left with 2 semi-circles.\"}, {\"Place one semi-circle on your hand with the flat edge at the top and the cooked side facing you. Dip your finger in the paste and spread it across the straight edge.\"}, {\"Fold in the two corners so they meet in the middle ensuring one edge overlaps the other and press together to seal all the way down to create a smooth upside down cone.\"}, {\"Turn the cone over so the pointed end is at the bottom. Using a spoon fill the cone with the potato filling to 2/3 of the way up.\"}, {\"Seal the opening with the paste, creating a triangle pastry. Lie on the tray and pat down to even the filling out. Repeat with the remaining dough until all your samosa made made.\"}, {\"Heat the oil, test it\"s hot enough by dropping in a little bit of pastry – if it bubbles and floats to the top immediately then the oil is ready.\"}, {\"Very carefully slip one samosa into the hot oil being careful that the hot oil doesn\"t splash out. Leave the samosa to cook for a few seconds. As the pastry begins to bubble turn it over using a slotted spoon.\"}, {\"Leave it to cook gently until it turns a beautiful golden brown. Once it\"s cooked remove from the oil and set on some kitchen paper. As you become more confident, fry 2 or 3 samosas at the same time.\"}', '{\"Calories\": \"143\", \"Fat (g)\": \"2.1\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"29\", \"of which sugars (g)\": \"0.9\", \"Fibre (g)\": \"1.8\", \"Protein (g)\": \"3.8\", \"Salt (mg)\": \"0.71\"}', '', 'Nuts', 'snacks', '20min'),
(128, 'Goan Fish Curry', '[\"600g skinless white fish fillets, chopped into chunks\", \"Juice of 1 lemon\", \"1 tsp turmeric powder\", \"½xa0tsp salt\", \"8 dried red chillies\", \"80g fresh coconut, grated\", \"3 tsp coriander seeds, crushed\", \"1 onion, chopped\", \"1 tsp cumin seeds, crushed\", \"1 tsp turmeric\", \"2 cloves garlic\", \"1 tsp tamarind extract\", \"2 tbsp of oil\", \"1 onion, sliced\", \"1 tomato, puréed\", \"3 fresh chillies, slit lengthways\", \"Handful of coriander, chopped\"]', '{\"Mix the salt, lemon juice and turmeric powder and rub over the fish chunks and leave to marinate for 30 minutes.\"}, {\"Soak the dried chilli in 250ml of warm water for 15 minutes. Drain and reserve the water.\"}, {\"Make up the spice paste by placing the soaked chillies, coconut, coriander seeds, chopped onion, cumin seeds, turmeric powder, garlic, tamarind extract and two tablespoons of the reserved soaking water in a blender and process to make a smooth paste.\"}, {\"Heat oil in a shallow wide based pan and add the sliced onion and fry to soften - do not brown. Add the spice paste and cook until golden brown. You may need a splash of water to ensure the paste doesn\"t burn.\"}, {\"Once aromatic stir in the tomato purée and fresh chillies and cook for a further five minutes.\"}, {\"Add water (or coconut milk if you prefer) to create a lovely sauce, bring to the boil and cook for a few more minutes.\"}, {\"Reduce the heat and gently place the marinated fish with any juice into the pan and cook for between five and seven minutes until the fish is soft.\"}, {\"Sprinkle with coriander to serve.\"}', '{\"Calories\": \"91\", \"Fat (g)\": \"4.7\", \"of which saturates (g)\": \"2.6\", \"Carbohydrates (g)\": \"3.2\", \"of which sugars (g)\": \"2.6\", \"Fibre (g)\": \"1.0\", \"Protein (g)\": \"9.6\", \"Salt (mg)\": \"0.72\"}', '', 'Nuts', 'snacks', '20min'),
(129, 'Gobi Masallum', '[\"3 tbsp raw cashews, soaked for two hours\", \"½ tsp turmeric\", \"½ tsp salt\", \"1 head cauliflower, outer leaves trimmed off\", \"2 tbsp ghee or rapeseed oil\", \"1 red onion, roughly chopped\", \"3cm ginger, sliced into strips\", \"2 tomatoes, roughly chopped\", \"1 green chilli, chopped\", \"4 cloves garlic, roughly chopped\", \"1 tbsp dried fenugreek leaves (methi)\", \"1 tsp coriander seeds\", \"1 tsp salt\", \"1 tsp Kashmiri red chilli powder\", \"½xa0cup water (more if needed)\", \"1 tsp cumin seeds\", \"1 tsp garam masala\", \"Handful of coriander, chopped\"]', '{\"Soak the cashews and heat the oven to 180°C .\"}, {\"Fill a tall pot with water, then add salt and turmeric. Bring to a boil and gently submerge the cauliflower using a slotted spoon.\"}, {\"Reduce the heat to medium and leave it to simmer for 5 minutes, then flip the cauliflower over and simmer for another 5 minutes. Keep the cauliflower submerged.\"}, {\"Strain your cauliflower and set aside on some kitchen roll while you make the sauce.\"}, {\"In a wide based pan heat the oil or ghee and add the onions. Sauté the onions until they soften, this should take about 5 minutes.\"}, {\"Stir in the garlic and cook until the onions start to brown. Add the chopped tomatoes, ginger, chilli, crushed coriander seeds, salt, Kashmiri red chilli powder and dried fenugreek leaves. Cook this until it becomes wonderfully aromatic and the tomatoes break down (about 7 minutes).\"}, {\"When the tomatoes have melted into the sauce add the garam masala and remove the sauce from the heat.\"}, {\"Add the cashew nuts and some water and using a hand held blender blitz the masala sauce until it\"s silky and smooth. Place it back on a gentle heat and cook through for a few minutes. The saucexa0should be the consistency of thick soup (add more water if the sauce gets too thick).\"}, {\"Find an oven proof dish that the cauliflower will sit in comfortably and add the ghee or oil.xa0Heat this dish and add the cumin seeds. When they sizzle and become fragrant remove the dish from the heat and place the blanched cauliflower into it.\"}, {\"Pour the lovely sauce over the cauliflower so it\"s completely covered. Some of the sauce will end up in the base which is fine. You can also keep some sauce back to serve with too.\"}, {\"Place the cauliflower in the oven and leave to bake for 40-45 minutes until the cauliflower is dry to touch and has just started to brown. The sauce will also have thickened.\"}, {\"Garnish with fresh coriander, slice and serve with some naan.\"}', '{\"Calories\": \"77\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"9\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"487\"}', '', 'Nuts', 'snacks', '20min'),
(130, 'Smoked Bangun Partha', '[\"2 aubergines\", \"2 tbsp of mustard oil\", \"2 onions, sliced\", \"1 heaped tsp cumin seeds\", \"4cm stick of cassia bark\", \"1 tsp of salt\", \"1 tsp of cinnamon powder\", \"2 green chillies, finely chopped\", \"½xa0tsp turmeric\", \"3 fresh tomatoes, cut into wedges\", \"Handful of fresh coriander, chopped\"]', '{\"Place one aubergine at a time directly onto the flame of your hob turning them with tongs to blacken and blister the outside. Alternatively, cook in a wood burning stove or barbecue to get a wonderful smoky flavour.\"}, {\"Once blackened place on a tray and roast in a pre-heated oven at 180oC) for about 10 minutes.xa0Turn and then leave for a further 10 minutes. They should be soft and cooked through.\"}, {\"Leave to cool then either peel the skin away or slice in half and scoop out the flesh discarding the skin. Mash the flesh to a pulp and set to one side.\"}, {\"Heat the oil in a pan and add the cumin seed and cassia bark.\"}, {\"Once sizzling add the sliced onion and cook until golden brown.\"}, {\"Add the chillies, turmeric, salt, cinnamon powder and stir in the aubergine flesh. Leave to cook for 20 minutes until you have a thick spicy masala pate.\"}, {\"Add the tomatoes and cook for another few minutes then remove from the heat.\"}, {\"Add a handful of fresh coriander before serving. I sometimes also like to add a splash of coconut milk to make it nice and creamy.\"}', '{\"Calories\": \"123\", \"Fat (g)\": \"8\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"16\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"8\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"662\"}', '', 'Nuts', 'snacks', '20min'),
(131, 'Aloo Tikki', '[\"4 medium potatoes, washed with skin on\", \"1 tspxa0garam masala\", \"2-3 chillies, finely chopped\", \"1 tspxa0salt\", \"2 tbsp ginger, grated (3cm piece)\", \"½ tsp chilli powder\", \"handful of fresh coriander, chopped\", \"100g KTC gram flour, sieved\", \"water\", \"1 tspxa0cumin seeds\", \"rapeseed oil for deep frying\"]', '{\"Place potatoes with the skin on into a pan and cover with cold water and bring to the boil. Reduce the heat and leave to cook gently until soft. Drain and cool.\"}, {\"Once cooled, peel the skin off with your fingers and discard. Grate the potatoes into a bowl and add the salt, garam masala, chilli, coriander, grated ginger, chilli powder and mix together.\"}, {\"Wet your hands, to stop the mixture sticking to your fingers and take a ball of the potato mixture. Shape into small patties or tikki, roughly 5cm in diameter and about 3cm thick.\"}, {\"Begin to heat the oil in a wok or a small pan.\"}, {\"In a separate bowl, sieve in the gram flour and gradually pour in a little water to make a thick batter then add the cumin seeds\"}, {\"Test the temperature of the oil by dropping in a little batter, if it sizzles and rises immediately then it is ready.\"}, {\"Dip one aloo tikki into the batter until it\"s covered and then carefully place it into the hot oil. Cook until golden brown (2-3 minutes)\"}, {\"Remove using a slotted spoon and set on kitchen paper. Repeat with the rest.\"}', '{\"Calories\": \"107\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"21.4\", \"of which sugars (g)\": \"0.9\", \"Fibre (g)\": \"2.5\", \"Protein (g)\": \"4.5\", \"Salt (mg)\": \"0.03\"}', '', 'Nuts', 'snacks', '20min'),
(132, 'Indian Scampi with Masala Chips', '[\"2 green chillies\", \"3 garlic cloves, peeled\", \"3cm piece ginger, peeled\", \"½ tsp coriander seeds\", \"½ tsp cumin seeds\", \"juice from 1 lemon\", \"20-30 raw large prawns\", \"½ tsp sea salt\", \"½ tsp Kashmiri chilli powder\", \"½ tsp ground turmeric\", \"½ tsp garam masala\", \"150g gram flour\", \"1 tsp corn flour\", \"Approx. 100ml water if required\", \"Vegetable oil, for deep-frying\", \"4 large Maris piper potatoes\", \"2 tbsp corn flour\", \"1 tsp salt\", \"¼ tsp black pepper (freshly ground)\", \"¼ tsp red chilli powder\", \"1 tsp chaat masala powder\", \"1 tsp cumin seeds, crushed\", \"1 tsp garam masala\", \"2 tbsp mayonnaise\", \"½ tsp chilli powder\", \"½ red chilli, chopped\"]', '{\"In a blender blitz ginger, garlic, chillies and empty into a bowl.\"}, {\"Crush the coriander seeds in a pestle and mortar and add to the bowl.\"}, {\"Add the cumin seed, lemon juice, salt, turmeric, chilli powder and stir into the bowl\"}, {\"Add the prawns and mix to coat. Leave them to marinate for about 30 minutes.\"}, {\"Heat oil for deep frying to about 180C.\"}, {\"In a second bowl, sift in the gram flour and corn flour and add the garam masala.\"}, {\"Add the prawn mixture to the flour and mix so all the prawns are coated with the batter. If it feels too dry add in a little water to create a thick batter.\"}, {\"Check the oil is hot enough by dropping in a little batter. If it rises straight away you’re good to go.\"}, {\"Once ready, very carefully slip a few of the prawns into the hot oil and fry for three to four minutes until they are golden. Remove and place on a baking tray lined with kitchen paper and keep warm in the oven while you cook the remaining. Serve immediately while they\"re still hot.\"}, {\"Heat the oil in deep pan or fryer to about 180ºC.\"}, {\"Peel the potatoes wash and cut into chips\"}, {\"Sprinkle the chips with the salt and leave it to sit for 10 minutes.\"}, {\"Place the chips on kitchen roll and pat dry.\"}, {\"In a bowl add the corn flour, salt, black pepper, chilli powder, chaat masala, cumin, garam masala and mix together.\"}, {\"Add the chips to the bowl and coat with the spices.\"}, {\"Check the oil is ready by dipping one chip into the pan - if it sizzles the oil is ready.\"}, {\"Fry the chips until they begin to turn golden. Remove from the fryer and let the oil heat again.\"}, {\"Dip the chips back in for a second fry so they become extra crunchy. Once golden brown, remove and place on kitchen roll to drain.\"}, {\"Place all the ingredients into a bowl, mix and serve.\"}', '{\"Calories\": \"272\", \"Fat (g)\": \"8\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"23\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"28\", \"Salt (mg)\": \"670\"}', '', 'Nuts', 'snacks', '20min'),
(133, 'Thari Wala Chicken', '[\"8 pieces of chicken (4 legs cut into thigh and drumsticks)\", \"2 tbsp of oil\", \"2 onions, finely diced\", \"3 cloves of garlic, finely chopped\", \"400g plum tomatoes\", \"1 heaped tbsp of ginger, grated\", \"1 tsp salt\", \"1 tsp turmeric\", \"Handful of coriander stalks, finely chopped\", \"1 chilli, finely chopped\", \"1 tsp of garam masala\", \"Handful of coriander leaves, chopped\"]', '{\"Skin the chicken, removing any excess fat.\"}, {\"Heat oil in a pan and add the onion and garlic. Fry on a high heat for a few minutes then reduce the heat and cook gently for about 20 minutes until they turn a lovely dark golden brown. If they stick to the bottom of the pan reduce the heat and add a dash of hot water as and when required.\"}, {\"Once browned add the tinned tomatoes, ginger, salt, turmeric, coriander stalks and chopped chilli. Increase the heat to high.\"}, {\"Let the onions and tomatoes melt together creating a thick aromatic masala paste. This will take about 5-10 minutes so be patient! Once the paste is shiny and thick add the chicken pieces and stir to coat.\"}, {\"Turn the heat up and fry the chicken for 5 minutes.\"}, {\"Reduce the heat to the lowest setting and put the lid on the pan. Leave to cook for 20 - 25 minutes until the chicken is cooked and the meat is starting to fall away from the bone.\"}, {\"Once cooked, add enough boiling water to just cover the chicken and cook for another few minutes then remove from the heat.\"}, {\"Stir in the garam masala, throw in the coriander and serve.\"}', '{\"Calories\": \"376\", \"Fat (g)\": \"20\", \"of which saturates (g)\": \"4\", \"Carbohydrates (g)\": \"13\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"39\", \"Salt (mg)\": \"953\"}', '', 'Nuts', 'snacks', '20min'),
(134, 'Spiced Potato Stuffed Peppers', '[\"4 whole peppers, 2 red and 2 green\", \"4 medium sized potatoes, boiled and diced\", \"1 tsp rapeseed oil\", \"1 tsp of salt\", \"1 tsp cumin seeds\", \"1 green chilli, finely chopped\", \"1 tsp garam masala\", \"3cm fresh ginger, grated\", \"1 tbsp fenugreek leaves\", \"1 tbsp fresh coriander, finely chopped\"]', '{\"Cook the potatoes gently with the skin on (do not boil too vigorously) for 20-25 minutes. Once soft leave to cool and then peel. Cut into small cubes and place into a large bowl.\"}, {\"In a small frying pan heat the oil and fry the cumin seeds. When sizzling and aromatic remove and add to the potatoes.\"}, {\"Next add the salt, chilli, garam masala, fenugreek, ginger and fresh coriander to the potatoes and stir - check seasoning.\"}, {\"Cut the top off the peppers, keeping the stalk intact.\"}, {\"Remove the insides and discard.\"}, {\"Divide the potato mixture into four and stuff each of the peppers.xa0Replace the top of each of the peppers.\"}, {\"Heat the oven to 180oC and place on a baking sheet.\"}, {\"Drizzle with a little oil and cook for about 30 minutes.\"}', '{\"Calories\": \"50\", \"Fat (g)\": \"1.7\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"8.1\", \"of which sugars (g)\": \"1.7\", \"Fibre (g)\": \"1.4\", \"Protein (g)\": \"1.3\", \"Salt (mg)\": \"0.61\"}', '', 'Nuts', 'snacks', '20min'),
(135, 'Amla and Beetroot Tikki', '[\"1 tbsp oil\", \"1 onion, finely chopped\", \"1 chilli, chopped\", \"1 tsp red chilli powder\", \"juice for half lemon\", \"1 tsp garam masala\", \"2 beetroots, boiled and mashed\", \"1 tsp salt\", \"6 amla (indian gooseberries), grated\", \"3 potatoes, boiled and mashed\", \"oil for frying\", \"pinch of fresh coriander\"]', '{\"Heat the oil in a frying pan and add the onion and sauté till lightly browned.\"}, {\"Stir in the mashed beetroot and saute until the mixture dries out a little.\"}, {\"Add the chilli, chilli powder, lemon juice and garam masala and stir through.\"}, {\"Add the grated potatoes and amla, stir the mixture and remove from the heat.\"}, {\"Refrigerate for about half an hour.\"}, {\"Put a little oil on your hands and divide the mixture into equal portions (about 8). Make small round patties or tikkis with each portion.\"}, {\"Heat the oil in a frying pan and cook each tikki for about 2-3 minutes on each side until they become crisp and golden on each side. Sprinkle with fresh coriander and serve\"}', '{\"Calories\": \"277\", \"Fat (g)\": \"5\", \"of which saturates (g)\": \"46\", \"Carbohydrates (g)\": \"63\", \"of which sugars (g)\": \"33\", \"Fibre (g)\": \"7\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"660\"}', '', 'Nuts', 'snacks', '20min'),
(136, 'Masala Prawns', '[\"500g prawns\", \"½xa0tsp turmeric\", \"½ tspxa0chilli powder\", \"1 tsp coriander seeds, crushed\", \"½ tspxa0cumin seeds, crushed\", \"½ tspxa0salt\", \"1 tbsp oil\", \"½ tspxa0brown mustard seeds\", \"½ tspxa0cumin seeds\", \"1 clove garlic, sliced\", \"1 chilli, sliced\", \"Juice from a lemon\"]', '{\"Wash the prawns and pat dry with some kitchen roll.\"}, {\"Crush the coriander and cumin seeds.\"}, {\"Sprinkle the prawns with turmeric, chilli, coriander, cumin, salt and mix well.\"}, {\"Heat the oil in a wide based pan and add the mustard and cumin seeds. Just as they sizzle add the sliced garlic and fresh chopped chilli.\"}, {\"Quickly stir in the prawns, reduce the heat and cook for about 2-3 minutes. Squeeze in the lemon juice and toss to coat the prawns.\"}, {\"Once pink and cooked through (another minute or so) throw in the fresh coriander to serve.\"}', '{\"Calories\": \"91\", \"Fat (g)\": \"3.2\", \"of which saturates (g)\": \"0.3\", \"Carbohydrates (g)\": \"0.2\", \"of which sugars (g)\": \"0.1\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"1.0\"}', '', 'Nuts', 'snacks', '20min'),
(137, 'Tandoori Chicken', '[\"4 chicken legs, skinned and trimmed\", \"1 tbsp mustard oil / rapeseed oil\", \"1 large lemon\", \"4 cloves garlic, crushed\", \"2 cm piece of ginger, grated\", \"1 green chilli, finely chopped\", \"200ml Greek yoghurt\", \"1 tsp salt\", \"1 tsp garam masala\", \"1 tsp cumin seeds, crushed\", \"1 tbsp Kashmiri red chilli powder\", \"1 tbsp dried fenugreek leaves.\", \"Handful of coriander with chopped lemon wedges\"]', '{\"Once skinned and trimmed, slash the flesh on the legs twice, diagonally, down to the bone.\"}, {\"Blend the garlic, ginger, chilli in a pestle and mortar.\"}, {\"Place the chicken in a dish and stir in the blended ingredients. Pour on the lemon juice and the mustard oil.\"}, {\"In a separate dish, mix the remaining ingredients (salt, garamxa0masala, ground cumin seeds, Kashmiri red chilli powder, dried fenugreek leaves) with the yoghurt to create a paste. Add this yoghurt paste to the chicken and massage into the meat using your hands.\"}, {\"Cover, refrigerate and leave for at least 30 minutes, but the longer the better. Heat the oven to 200oC.\"}, {\"Transfer the marinated chicken to an oven tray and cook for about 30-40 minutes. The chicken should be tender and a little charred, which helps give the smokey flavour. Even better, you can cook this on the barbecue!\"}', '{\"Calories\": \"255\", \"Fat (g)\": \"12\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"7\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"30\", \"Salt (mg)\": \"771\"}', '', 'Nuts', 'snacks', '20min'),
(138, 'Lamb Kebabs', '[\"500g minced lamb\", \"1 medium onion, very finely diced\", \"4 cloves garlic, very finely chopped\", \"1 tbsp ginger, grated\", \"1 tsp salt\", \"1 green chilli, finely chopped\", \"½xa0tsp red chilli powder (optional)\", \"2 tsp cumin seeds, crushed\", \"2 tsp garam masala\", \"1 tsp of dried fenugreek leaves (kasoori methi)\", \"Handful coriander, finely chopped\", \"1 tsp oil in a small dish\"]', '{\"Heat the grill and line the grill pan with foil and place a wire rack on top.\"}, {\"Place the lamb mince in a large bowl and add all the other ingredients and mix together using your hands to ensure all the spices are evenly distributed.\"}, {\"Wash hands and rub them with a little oil. This helps to shape the kebabs and stops the mixture sticking to your hands.\"}, {\"Take a small amount of the mixture and mold into small sausage shapes about 10cm long and 3cm thick. Don\"t make them too thin. Repeat with the rest of the meat keeping the kebabs the same size smoothing out any cracks.\"}, {\"Place the kebabs on the rack and place under the grill and cook for 15 minutes. Turn the kebabs over so they brown evenly and leave to cook for a further 10-15 minutes.\"}', '{\"Calories\": \"203\", \"Fat (g)\": \"10\", \"of which saturates (g)\": \"4.6\", \"Carbohydrates (g)\": \"13\", \"of which sugars (g)\": \"8.7\", \"Fibre (g)\": \"2.2\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"1.2\"}', '', 'Nuts', 'snacks', '20min'),
(139, 'Sweet Potato and Spinach Curry', '[\"1 tbsp rapeseed oil\", \"1 tsp cumin seeds\", \"1 tsp black mustard seeds\", \"2 red onions, thinly sliced\", \"2 large cloves of garlic, finely chopped\", \"1 tsp ginger, grated\", \"2 green chillies,, thinly sliced\", \"1 tsp coriander seeds\", \"1 tsp turmeric salt to taste\", \"1-2 sweet potatoes, diced (about 700g)\", \"300g spinach, coarsely chopped\", \"1 tsp garam masala\", \"1 tbsp flaked almonds, toasted\"]', '{\"Heat the oil in a large saucepan and add the cumin seeds, once fragrant add the mustard seeds. As they start to pop add the onion.\"}, {\"Stir and cook until it\"s translucent then add the garlic.\"}, {\"After a few minutes stir in the ginger, and chilli. You may need to add a splash of water too.\"}, {\"Grind the coriander seeds to a powder in a pestle and mortar.\"}, {\"Place the ground coriander and turmeric in a bowl and add a little water to produce a spice paste.\"}, {\"Once the onions have browned, pour in the spices paste and heat until fragrant.\"}, {\"Add some salt then reduce the heat then add the sweet potato cubes. Stir to coat with the spices.\"}, {\"Leave to cook gently for about 25-30 minutes, keep checking but do not stir too much. If you need to, you can add a little splash of water.\"}, {\"Once the sweet potatoes are soft add the spinach and stir together.\"}, {\"In a frying pan add some flaked almonds and toast for 1-2 minutes until a little brown and crisp. Remove from the pan and set to one side.\"}, {\"Once the spinach has wilted taste and adjust seasoning if required. Remove from the heat and stir in some garam masala. Top with the flaked almonds to serve.\"}', '{\"Calories\": \"62\", \"Fat (g)\": \"2.1\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"9.1\", \"of which sugars (g)\": \"2.4\", \"Fibre (g)\": \"2.0\", \"Protein (g)\": \"2.6\", \"Salt (mg)\": \"0.81\"}', '', 'Nuts', 'snacks', '20min'),
(140, 'Beetroot and Coconut Samosa', '[\"500g beetroot\", \"2 tbsp rapeseed oil\", \"½xa0tsp mustard seeds\", \"½xa0tsp cumin seeds\", \"¼xa0tsp asafoetida\", \"8 curry leaves, finely sliced\", \"2 green chillies, finely sliced\", \"8 tbsp grated fresh coconut\", \"1 tsp salt or to taste\", \"270g /1 pack of filo pastry (6 sheets cut in half lengthways)\", \"oil ot butter for brushing, melted\"]', '{\"Wash the beetroots, remove the leaves and boil, steam or pressure cook them until tender. Once cooled, peel and cut them into small cubes.\"}, {\"Heat 2 tbsp of oil and add the mustard seeds. Allow them to splutter then reduce the heat and add the cumin seeds.\"}, {\"As soon as they become aromatic add the sliced curry leaves and green chilli.\"}, {\"Stir together and cook for a minute before adding the asafoetida.\"}, {\"Stir in the grated coconut and saute with the spices. Coconut can stick to the bottom of the pan so keep it moving.\"}, {\"Once the coconut has toasted and dried out add the beetroot and cook for 2-3 minutes until the beetroot is dry. Check the seasoning and add the salt if required, remove the pan from the heat and leave to cool.\"}, {\"Slice the filo pastry into long strips about 6cm wide by 30cm long.\"}, {\"Place a heaped teaspoon of the filling at one corner of the strip then fold the pastry over to cover the filling creating a triangle shape. Keep rolling and folding the strip to produce a triangle shaped pastry.\"}, {\"When you get to the end brush with some butter to seal it closed. Brush the outside with butter and place on an oven tray.\"}, {\"Continue with the remaining mixture and once all the samosas are made put them on a baking sheet and cook in the oven until crispy and warmed through (about 20 minutes). This should make about 12 samosas.\"}', '{\"Calories\": \"185\", \"Fat (g)\": \"9.6\", \"of which saturates (g)\": \"4.2\", \"Carbohydrates (g)\": \"22\", \"of which sugars (g)\": \"4.3\", \"Fibre (g)\": \"1.9\", \"Protein (g)\": \"3.5\", \"Salt (mg)\": \"0.47\"}', '', 'Nuts', 'snacks', '20min'),
(141, 'Mango Kachumber', '[\"1 red onion, very finely diced\", \"Handful fresh coriander leaves, chopped\", \"½xa0red chilli, finely chopped\", \"Juice of one lime\", \"1 large ripe mango, pitted and cubed\", \"½ tsp kalongi seeds\"]', '{\"Finely dice the onion, mango.\"}, {\"Chop the coriander and chilli.\"}, {\"Combine the onion, coriander and chilli in a bowl\"}, {\"Add the lime juice, mango cubes and kalongi seeds.\"}, {\"Leave to stand for 10 minutes and stir before serving.\"}', '{\"Calories\": \"61\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"15\", \"of which sugars (g)\": \"12\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"4\"}', '', 'Nuts', 'snacks', '20min'),
(142, 'Pumpkin Halwa', '[\"500g pumpkin, peeled and grated\", \"250g brown sugar\", \"50ml milk\", \"4 tbsp ghee\", \"10 cardamoms, ground (1 tsp ground cardamom powder)\", \"20 cashew nuts\"]', '{\"Heat up 1 tsp of ghee and then add the cashew nuts until they have roasted and turned golden brown (2-3 mins). Remove and set to one side.\"}, {\"Add a little more ghee to the pan and saute the pumpkin for about 10 minutes.\"}, {\"Add the milk and cook until the pumkin has a dry consistency.\"}, {\"Stir in the sugar and turn the heat up and stir to evapourate any excess liquid.\"}, {\"Stir in the remaining ghee and crushed cardamom. Once it has thickened it will starts to come away from the sides of the pan. Remove from the heat.\"}, {\"Once the halwa has cooled sprinkle with the toasted cashews and serve at room temperature (a dollop of whipped cream goes really well with this too).\"}', '{\"Calories\": \"354\", \"Fat (g)\": \"14\", \"of which saturates (g)\": \"7\", \"Carbohydrates (g)\": \"56\", \"of which sugars (g)\": \"44\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"4\", \"Salt (mg)\": \"28\"}', '', 'Nuts', 'snacks', '20min'),
(143, 'Strawberry Lassi', '[\"500g strawberries, hulled\", \"4 tbsp yoghurt\", \"Splash of cold milk\", \"3 tsp sugar or to taste\", \"1 handful of ice cubes\", \"Crushed black pepper (optional)\"]', '{\"Place strawberries, yoghurt, milk, sugar, ice cubes into a blender and whizz up.\"}, {\"Pour the lassi mixture into a glass and top with a sliced strawberry and sprinkle with some crushed black pepper.\"}', '{\"Calories\": \"67\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"14\", \"of which sugars (g)\": \"11\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"11\"}', '', 'Nuts', 'snacks', '20min'),
(144, 'Pilchard Curry', '[\"2 x 425g tin of pilchard in tomato sauce\", \"1 tbsp oil\", \"1 onion, sliced\", \"½xa0tsp carom seeds\", \"2 cloves of garlic, sliced\", \"2 tsp ginger, grated\", \"1 chilli, chopped\", \"1 tsp salt\", \"1 tsp turmeric\", \"1 tsp dried fenugreek leaves (kasoori methi)\", \"Handful of fresh coriander, chopped\"]', '{\"Heat oil in a pan and add carom seeds. When the carom seeds start to sizzle add the sliced onion and garlic then fry until lightly brown.\"}, {\"Reduce the heat and add ginger, chilli, turmeric, salt, fenugreek and fry until aromatic (about 5 mins). If the spices stick just add a dash of water to loosen.\"}, {\"Open the tin of pilchards and pour in the tomato juice keeping the fish behind.\"}, {\"Cook everything to create a thick masala paste which becomes nice and shiny.\"}, {\"Gently place the fish into the masala and heat. Be careful not to stir as you don\"t want the fish to break up. If it looks a little dry, add some hot water.\"}, {\"Remove from the heat and add garam masala and a good pinch of coriander to serve.\"}', '{\"Calories\": \"139\", \"Fat (g)\": \"8.3\", \"of which saturates (g)\": \"1.5\", \"Carbohydrates (g)\": \"2.0\", \"of which sugars (g)\": \"1.4\", \"Fibre (g)\": \"0.2\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"0.63\"}', '', 'Nuts', 'snacks', '20min'),
(145, 'Pigeon Curry', '[\"4 pigeon breasts, skinned and trimmed\", \"1 tbsp rapeseed oil\", \"1 medium onion, finely diced\", \"salt to taste\", \"2 garlic cloves, finely chopped\", \"3cm piece of ginger, grated\", \"200g tinned tomatoes\", \"1 chilli, chopped\", \"1 green tsp turmeric\", \"½xa0tsp chilli powder\", \"1 tsp garam masala\", \"pinch of fresh coriander, chopped\"]', '{\"Heat oil in a pan and add the onion. Fry on a high heat for a few minutes then reduce the heat and cook gently for about 10 minutes. Add some salt.\"}, {\"Meanwhile in a blender add the ginger, garlic and chillies and grind to a paste. Add a little water to loosen if needed.\"}, {\"Add this to the pan and stir. Continue cooking for another few minutes until it turns a lovely dark golden brown colour. If they stick to the bottom of the pan add a dash of hot water as and when required. Once browned reduce the heat and add the tomatoes.\"}, {\"Let the onions and tomatoes melt together creating a thick aromatic masala paste.xa0This will take about 5 minutes.\"}, {\"Once the paste is shiny and thick add the pigeon and stir to coat. Turn the heat up and fry the for 5 minutes.\"}, {\"Reduce the heat to the lowest setting and put the lid on the pan. Leave to cook for another 5 minutes once cooked remove from the heat.\"}, {\"Remove the breasts and leave to rest for a few minutes then slice onto stips.\"}, {\"Return to the pan and sprinkle inxa0the garam masala and coriander leaves then serve.\"}', '{\"Calories\": \"203\", \"Fat (g)\": \"8\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"7\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"23\", \"Salt (mg)\": \"84\"}', '', 'Nuts', 'snacks', '20min'),
(146, 'Gurkha Chicken Curry', '[\"5 green cardamom pods\", \"1 tsp fennel seeds\", \"1 tbsp ginger, roughly chopped\", \"3 garlic cloves, roughly chopped\", \"150g Greek yoghurt\", \"8 pieces of chicken, thigh and drumsticks skinned\", \"2 tbsp rapeseed oil\", \"2 onions, sliced\", \"2 tsp cumin seeds\", \"4 cloves\", \"7cm stick of cassia bark\", \"2 bay leaves\", \"1 tsp turmeric\", \"½ tsp mace, ground\", \"¼-1 tsp Kashmiri chilli powder\", \"4 medium tomatoes, chopped\"]', '{\"Toast the cardamom pods with the fennel seeds until fragrant. Remove from the pan and let them cool.xa0 Crush with a pestle and mortar and remove the husk.\"}, {\"Add the ginger and garlic to the pestle and mortar and bash the to make a paste.\"}, {\"Put the yoghurt into a large bowl and add the spice paste with the salt and stir to combine everything.\"}, {\"Add the chicken and coat it all over, leave it to mariante for at least 2 hours.\"}, {\"When you are ready to cook heat the oil in a large oven-proof pan.\"}, {\"Remove the chicken and scrape off the excess marinade back into the bowl, reserve this for later.\"}, {\"Add the chicken to the pan and fry for 5 minutes on one side until brown, then turn it over and cook for another 4-5 minutes.\"}, {\"Remove the chicken from the pan and set to one side.\"}, {\"Add a little more oil and add the cumin seeds, cloves, bay and cassia bark to the pan. When the spices are fragrant add the onions and saute for about 10 minutes until they turn golden brown.\"}, {\"Add the turmeric, mace and chilli powder and cook for a further 1 minute.\"}, {\"Add water (approx 250ml) to the pan and simmer for 2-3 minutes until it’s reduced.\"}, {\"Mix the chopped tomatoes in with the remaining marinade and add it all to the pan.\"}, {\"Stir and then add the chicken back to the pan. Simmer on a low heat for 40 minutes or place in the oven at 180ºC for the same amount of time.\"}', '{\"Calories\": \"100\", \"Fat (g)\": \"5.8\", \"of which saturates (g)\": \"1.7\", \"Carbohydrates (g)\": \"2.8\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"9.5\", \"Salt (mg)\": \"0.59\"}', '', 'Nuts', 'snacks', '20min'),
(147, 'Chicken Balti', '[\"3cm ginger\", \"6 garlic cloves\", \"2 tomatoes, quartered\", \"1½ tsp garam masala\", \"1½ tsp cumin seeds, crushed\", \"1 tbsp coriander seeds, crushed\", \"1 tsp turmeric\", \"1 tsp Kashmiri chilli powder\", \"1 tbsp full-fat Greek yogurt\", \"Salt, to taste\", \"2 tbsp rapeseed oil\", \"1 tsp brown mustard seeds\", \"1 bay leaf\", \"1 onion, finely chopped\", \"6–10 whole green chillies, (reduce if this is too many for you)\", \"500g boneless chicken thigh fillets, cut into bite-size chunks\", \"Black peppercorns, freshly ground\", \"1 tbsp lemon juice, or to taste\", \"Large handful of finely chopped, fresh coriander leaves\"]', '{\"Blend together the ginger and garlic in a pestle and mortar or blender and set to one side.\"}, {\"Grind the cumin and coriander seeds and set to one side.\"}, {\"Blend the tomatoes to a paste and stir in the ground spices, garam masala,xa0turmeric, Kashmiri chilli powder, yoghurt and salt.\"}, {\"Heat the oil in a non-stick saucepan (or karahi if you have one) and add the mustard seeds.\"}, {\"Once the mustard seeds pop, add the bay leaf and chopped onion.\"}, {\"Stir and cook on a medium heat. After about 15 minutes add the minced ginger and garlic with the green chilliesxa0for at least 20-30 minutes until the onions are well browned. If the onions catch, add a splash of water and continue to cook the onions.\"}, {\"Stir in the blended tomatoes, spices and yoghurt mix. Turn the heat up and stir until the mixture thickens and you are left with a thick masala paste (10-15 minutes).\"}, {\"Add the chicken pieces and stir into the thick masala to coat it.\"}, {\"Reduce the heat and place the lid on the pan. Leave to cook for about 20 minutes, stirring every now and again.\"}, {\"The chicken will produce a lovely thick gravy.xa0Once the chicken is cooked through you can adjust the consistency of the sauce to your preference. To loosen, just add a little hot water, or to reduce it and make it thicker, cook further on a high flame.\"}, {\"Once cooked, add some black pepper and a squeeze of lemon, then check the seasoning.\"}, {\"Stir in the chopped coriander and serve.\"}', '{\"Calories\": \"100\", \"Fat (g)\": \"5.8\", \"of which saturates (g)\": \"1.7\", \"Carbohydrates (g)\": \"2.8\", \"of which sugars (g)\": \"2.1\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"9.5\", \"Salt (mg)\": \"0.59\"}', '', 'Nuts', 'snacks', '20min'),
(148, 'Sindhi Masala Fish', '[\"1 tbsp coriander seeds\", \"2 tsp fennel seeds\", \"2 garlic cloves\", \"2 tbsp plain flour\", \"1 tbsp turmeric powder\", \"1 tsp chilli powder\", \"2 tsp garam masala\", \"1 tsp salt\", \"4 large white fish fillets, plaice, haddock or cobbler are good\", \"Rapeseed oil to fry\"]', '{\"Crush the coriander seeds, fennel seeds and garlic cloves in a pestle and mortar then empty into a bowl.\"}, {\"Mix in the flour, turmeric, chilli powder, garam masala and salt.\"}, {\"Place the fish fillets into the masala mix and coated them then set to one side.\"}, {\"In a large deep frying pan, add enough vegetable oil so it\"s about 5cm deep to fry the fish.\"}, {\"Gently heat the oil and test whether it’s ready by dropping a small bit of the masala mixture into the oil, if it fizzes and turns brown in a few seconds the oil is ready.\"}, {\"Very gently slip in a couple of fish fillets and cook for around 4–5 minutes, gently turning them over until cooked through and they have turned a wonderful yellow colour.\"}, {\"Drain on some kitchen paper.\"}', '{\"Calories\": \"90\", \"Fat (g)\": \"1.6\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"4.0\", \"of which sugars (g)\": \"0.1\", \"Fibre (g)\": \"0.2\", \"Protein (g)\": \"18\", \"Salt (mg)\": \"0.88\"}', '', 'Nuts', 'snacks', '20min'),
(149, 'Chicken Pakora', '[\"5 chicken thigh fillets, trimmed & chopped into bite-sized pieces\", \"2 cloves garlic\", \"3cm piece fresh ginger, chopped roughly\", \"2 green chillies, chopped\", \"Juice from ½xa0lemon\", \"1 tspxa0salt\", \"2xa0tsp garam masala\", \"1 tspxa0cumin seeds (crushed)\", \"1 tspxa0red chilli powder\", \"2 tspxa0dried fenugreek leaves (kasoori methi)\", \"100g gram flour\", \"Handful of coriander, chopped\", \"Water (if required)\", \"Rapeseed oil for deep frying\"]', '{\"Place the garlic, ginger, green chillies, lemon juice, garam masala, cumin seeds, chilli powder, dried fenugreek leaves into a pestle and mortar and blend to a rough paste.\"}, {\"Place chicken in a bowl and add the paste, mix to marinade and leave for at least 20 minutes - the longer the better.\"}, {\"Heat up the oil in a karahi or wok to a medium heat.\"}, {\"Into the marinated chicken sprinkle in the freshly chopped coriander and then sieve in the gram flour.xa0Mix together using your hand.\"}, {\"Add a small amount of water if required to ensure the chicken is coated in a thick batter.\"}, {\"Test your oil is hot enough by dropping in a little batter into the oil. If it browns and rises immediately then it is ready. Very carefully place the pieces of chicken into the oil one at a time and fry until crisp and golden brown.\"}, {\"Using a slotted spoon move the pakora around, be careful not to overcrowd the karahi.\"}, {\"Once golden brown and crisp remove from the oil and set on some kitchen paper.\"}', '{\"Calories\": \"185\", \"Fat (g)\": \"7.4\", \"of which saturates (g)\": \"1.9\", \"Carbohydrates (g)\": \"8.2\", \"of which sugars (g)\": \"0.6\", \"Fibre (g)\": \"1.6\", \"Protein (g)\": \"22\", \"Salt (mg)\": \"1.1\"}', '', 'Nuts', 'snacks', '20min'),
(150, 'Courgette and Onion Pakora', '[\"2 medium courgettes coarsely grated (approx 750g total weight)\", \"1 medium onion, thinly sliced\", \"1 tsp whole cumin seeds\", \"handful of fresh coriander, chopped\", \"1 tsp kashmiri chilli powder (or ½xa0tsp paprika)\", \"1 green chilli, chopped\", \"1 tsp salt or to taste\", \"100g chickpea flour (gram flour)\", \"½ tspxa0baking soda\", \"Rapeseed oil to deep fry\"]', '{\"Begin to heat the oil in a deep pan or karahi (Indian wok) on a gentle heat. Keep an eye on your oil so it doesnt get too hot and never leave it unattended.\"}, {\"Place the grated courgette into a muslin or clean tea towel and squeeze out the excess water, then place the drained courgette into a bowl.\"}, {\"When you are ready to cook add the sliced onion, whole cumin, chopped coriander, chili powder, chopped chilli and salt.\"}, {\"Sieve in the chickpea flour and baking soda and using one hand mix everything together. Squeeze the mixture through your fingers until it comes together as a very thick batter.\"}, {\"Add a splash of water too loosen the batter if it feels too stiff.\"}, {\"Test if the oil is hot enough by dropping in a little batter. If it bubbles and rises to the top immidiately the oil is ready.\"}, {\"Using a tablespoon, spoon out the mixture and very carefully drop in small balls of the batter into the hot oil. Fry the pakora and turn every so often for 4-5 minutes until they are golden brown and cooked through.\"}, {\"Remove them from the oil using a slotted spoon, and drain on some kitchen paper. Serve hot with a hot and tangy chutney.\"}', '{\"Calories\": \"106\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"14\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"121\"}', '', 'Nuts', 'snacks', '20min'),
(151, 'Mint and Coriander Dip', '[\"50g of mint leaves\", \"50g of coriander leaves\", \"1 fresh chilli\", \"½xa0tsp salt\", \"3 tbsp Greek style yoghurt\", \"½xa0tsp garam masala\", \"sprinkle of chilli powder\"]', '{\"Put the chilli, mint, coriander and salt into a blender and whizz together to make a smooth paste (you may need to add a dash of water too).\"}, {\"Place into to a bowl and stir in the yoghurt and garam masala.\"}, {\"Sprinkle over the chilli power and serve straight away.\"}', '{\"Calories\": \"208\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"33\", \"of which sugars (g)\": \"8\", \"Fibre (g)\": \"24\", \"Protein (g)\": \"20\", \"Salt (mg)\": \"581\"}', '', 'Nuts', 'snacks', '20min'),
(152, 'Vegetable Pakora', '[\"100g gram flour, sieved\", \"1 medium onion\", \"3 medium potatoes\", \"1 tsp of salt\", \"2 tsp of garam masala\", \"1 tsp of turmeric\", \"2 chillies, finely chopped\", \"1 tbsp ginger, grated (optional)\", \"Handful of coriander, chopped\", \"2 tsp of dried fenugreek leaves\", \"1 tsp of cumin seeds\", \"½xa0tsp of red chilli powder\", \"Water\", \"Oil for deep frying\"]', '{\"Heat up the oil in a karahi or wok to a medium heat.\"}, {\"Slice the onion lengthways very thinly and place in a bowl.\"}, {\"Peel and grate (or very finely chop) the potatoes into the same bowl. You can also use aubergines and cauliflower - chop into very small pieces.\"}, {\"Sprinkle all the dry spices and freshly chopped coriander, chillies and ginger into the bowl and then sieve in the gram flour - mix together using your hands.\"}, {\"Add a small amount of water a little at a time to create a thick batter that coats all the vegetables. Squeeze the mixture through your fingers to ensure all the spices mix through. Do not leave the batter and vegetable mixture for too long before cooking.\"}, {\"Test your oil is hot enough by dropping a little batter into the oil. If it browns and rises immediately then it is ready. Very carefully drop in spoonfuls of the mixture into the oil and fry until golden brown.\"}, {\"Using a slotted spoon move the pakora around, be careful not to overcrowd the karahi.\"}, {\"Once golden brown and crisp remove from the oil and set on some kitchen paper.\"}', '{\"Calories\": \"309\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"35\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"7\", \"Protein (g)\": \"11\", \"Salt (mg)\": \"1.2\"}', '', 'Nuts', 'snacks', '20min');
INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(153, 'Hot and Spicy BBQ Ribs', '[\"2 racks of ribs\", \"3 tbsp fennel seeds\", \"1 tsp peppercorns\", \"2 tbsp cumin seeds\", \"1 tbsp heaped smoked paprika\", \"1 tsp salt\", \"2 tbsp tomato ketchup\", \"2 tbsp brown sauce\", \"2 tbsp honey\", \"1 tbsp hot chilli sauce or 4 hot birds eyexa0chillies, minced\", \"1 tsp chilli powder\", \"1 tbsp soy sauce\"]', '{\"Heat your oven to 140ºC.\"}, {\"Using a knife scrape the underside of the ribs on one end and you will see there is a transparent membrane present. Pull this membrane (use a cloth for grip) from the back of the ribs to remove it. Remove any excess fat too.\"}, {\"In a pestle and mortar bash up the fennel, cumin and pepper and put into a bowl then stir in the paprika and salt.\"}, {\"Place the ribs on an oven tray and rub the dry spices all over the ribs. Cover with foil and cook in the oven for 3-4 hours.\"}, {\"Meanwhile, make up the glaze and when the ribs are ready smear half the marinade over the ribs on both sides.\"}, {\"Increase the temperature of the oven to 200ºC and return the ribs to the oven for 10 minutes.\"}, {\"Every few minutes spoon over a little more of the glaze and replace in the oven for a final 20 minutes until the ribs are sticky and delicious.\"}', '{\"Calories\": \"263\", \"Fat (g)\": \"9\", \"of which saturates (g)\": \"4\", \"Carbohydrates (g)\": \"18\", \"of which sugars (g)\": \"11\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"25\", \"Salt (mg)\": \"971\"}', '', 'Nuts', 'snacks', '20min'),
(154, 'Melon Lassi', '[\"4 tbsp Greek yoghurt\", \"½xa0melon, chopped\", \"2 tsp sugar or to taste\", \"Crushed ice\"]', '{\"Put the melon, yoghurt, sugar into a blender and blitz until smooth.\"}, {\"Crush some ice and place in a tumbler.\"}, {\"Pour the mixture over the ice.\"}', '{\"Calories\": \"43\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"9\", \"of which sugars (g)\": \"8\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"18\"}', '', 'Nuts', 'snacks', '20min'),
(155, 'Hot Nariyal Machchi', '[\"400g white fish loin, cut into large chunks\", \"1 tbsp coconut oil\", \"1 heaped tsp cumin seeds\", \"2 medium onions, blended in a food processor to a grated consistency\", \"200g /½xa0tin plum tomatoes\", \"1 tsp salt\", \"1 tsp turmeric\", \"½xa0tbsp chilli powder (optional)\", \"2 to 3 green chillies, chopped\", \"200ml coconut cream\", \"1 tsp garam masala\", \"1 handful fresh coriander, chopped\"]', '{\"Heat the oil in a pan and add cumin seeds. When sizzling and aromatic add the onions and fry until they are a golden colour.\"}, {\"Add the tomatoes, salt, turmeric, chilli powder and fresh chillies. Stir together and leave to cook so the tomatoes break down and you are left with a thick paste.\"}, {\"Pour in the coconut cream and cook gently for a few minutes so the flavours combine.\"}, {\"Add the fish and stir to coat with the sauce.\"}, {\"Reduce the heat to the lowest setting and place the lid half on the pan and leave to cook for about 5-10 minutes until cooked.\"}, {\"Taste the sauce and adjust seasoning if required.\"}, {\"Remove from heat and add garam masala and throw in the fresh coriander to serve.\"}', '{\"Calories\": \"124\", \"Fat (g)\": \"8.9\", \"of which saturates (g)\": \"6.2\", \"Carbohydrates (g)\": \"3.4\", \"of which sugars (g)\": \"2.8\", \"Fibre (g)\": \"0.4\", \"Protein (g)\": \"8.2\", \"Salt (mg)\": \"0.70\"}', '', 'Nuts', 'snacks', '20min'),
(156, 'Roasties with a Sesame Crunch', '[\"4 potatoes, peeled and cut into 4\", \"4 tbsp vegetable oil\", \"sea salt to taste\", \"1 tsp fennel seeds\", \"1 tsp urad dhal\", \"2 tsp sesame seeds\", \"1 dried red chilli\"]', '{\"Pour the oil into a deep oven tray and place into the oven. Leave the oven to heat to 180°c\"}, {\"Peel and chop potatoes and place in a pan with cold water. Bring to the boil and leave to simmer for about 6 minutes, then drain in a colander. Place the colander over the empty hot pan and leave the potatoes to steam until cold.\"}, {\"Remove the tray with the oil and place on the hob and sprinkle in some salt. Add the cooled potatoes until they sizzle. Coat them with the hot oil and replace in the oven for 30 minutes.\"}, {\"Crush fennel seeds, urad dhal, sesame and one dried chilli in a pestle and mortar.\"}, {\"Remove the tray and sprinkle the potatoes with the mixture. Toss to coat them and replace in the oven and leave to cook for another 10 minutes until crisp.\"}', '{\"Calories\": \"286\", \"Fat (g)\": \"15\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"37\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"6\", \"Salt (mg)\": \"457\"}', '', 'Nuts', 'snacks', '20min'),
(157, 'Morel Mushroom Pilau', '[\"300g white basmati rice\", \"¼ tsp saffron strands\", \"1 tsp screw pine water (or 1 tbsp rosewater, or jasmine flower water)\", \"150g fresh morel mushrooms\", \"75g ghee or 3-4 tbsp rapeseed oil\", \"½xa0onion, sliced\", \"3cm ginger, sliced into thin strands\", \"4 black cardamoms, lightly crushed\", \"6 green cardamoms, lightly crushed\", \"10cm piece cassia bark, broken\", \"6 cloves\", \"3 dried bay leaves\", \"75g almond slivers\", \"1 tsp salt\", \"¾ litres cold water\", \"1 tsp garam masala\", \"fresh coriander leaves, chopped\"]', '{\"Wash the rice in several changes of cold water until the water runs clear and set to one side.\"}, {\"Soak the saffron strands in the screwpine water or flaower water and leave for later.\"}, {\"Rinse the mushrooms and cut them in half lengthways.\"}, {\"Heat the ghee or oil in a wide heavy-bottomed saucepan and add the whole spices with the bay leaves. Stir for a few minutes until you can smell the fragrance from the spices.\"}, {\"Stir in the sliced onions and cook for about 5 minutes before adding the ginger.\"}, {\"Next add the prepared mushrooms and almonds, and sauté for a couple of minutes until the nuts begin to brown.\"}, {\"Add the washed rice to the mushroom mixture and sauté for a few minutes until the grains of rice become shiny.\"}, {\"Pour in the saffron mixture and salt. Add the cold water and bring the rice to the boil.\"}, {\"Reduce the heat to the lowest setting and cover with a lid. Let the rice cook undisturbed for 15 minutes.\"}, {\"Check to see whether the rice is cooked by pressing a couple of grains between your fingers. Remove from heat and set aside.\"}, {\"Sprinkle the rice with garam masala and coriander leaves just before serving.\"}', '{\"Calories\": \"392\", \"Fat (g)\": \"20\", \"of which saturates (g)\": \"9\", \"Carbohydrates (g)\": \"49\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"6\", \"Protein (g)\": \"8\", \"Salt (mg)\": \"409\"}', '', 'Nuts', 'snacks', '20min'),
(158, 'Patoora or Bhatura', '[\"250g self raising flour, sifted\", \"1 tsp yeast\", \"1 tsp sugar\", \"1 or 2 tbsp warm water\", \"Pinch of salt\", \"Large pinch of coriander, chopped\", \"Warm water\", \"2 tbsp oil (to roll)\", \"Vegetable oil to deep fry\"]', '{\"Into a small bowl add the yeast, sugar and warm water (ensure the water is not too hot). Leave this to activate. Once it becomes frothy it\"s ready.\"}, {\"Place the sifted flour, oil, coriander and frothy yeast to a roomy bowl (the dough will expand) and mix together using your fingers.\"}, {\"Once mixed through start to add a little warm water at a time to make the dough. Knead the dough to firm it up, keep folding as you go. The dough should be soft but not sloppy.\"}, {\"Once the dough is ready put a little oil on your hand and wipe over the top of the dough to stop it drying out\"}, {\"Cover the bowl with a clean tea towel or cling film and leave at room temperature (not too cold) for 4-6 hours\"}, {\"Heat oil in a wok (karahi)\"}, {\"Use a little oil and roll out a small disc about about the size of a side plate - make sure it\"s not too thin so it gets nice and fluffy.\"}, {\"Check the oil is hot by dropping a tiny bit of dough in, this should sizzle and rise straight away.\"}, {\"When the oil is ready, gently slide one patoora into the oil and move it around gently with a slotted spoon. Once cooked it will begin to float - you don’t want these to become golden and crisp. They should be creamy in colour and very light and fluffy in texture.\"}, {\"Remove from the oil and set on some kitchen paper.\"}', '{\"Calories\": \"274\", \"Fat (g)\": \"8\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"45\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"6\", \"Salt (mg)\": \"36\"}', '', 'Nuts', 'snacks', '20min'),
(159, 'Poori', '[\"500g whole-wheat flour (atta)\", \"Water\", \"½ tsp carom seeds (optional)\", \"½ tsp salt (optional)\", \"Oil for deep frying\"]', '{\"Put the flour in a bowl and add a little water at a time bring the flour together with your hands to make dough.\"}, {\"Start to knead the dough using your knuckles, folding it over as you go. The dough should come together and come away from your hand and the bowl. If it is sticky add a little more flour and continue to knead. The dough should be soft but not sloppy. Set to one side for at least half an hour before making the roti.\"}, {\"Put some dry atta on a flat plate for dusting.\"}, {\"Flour your hands and take a tangerine sized ball of dough.\"}, {\"Roll the dough in the palms of your hands creating a smooth ball.\"}, {\"Flatten it using your fingers then holding the dough in one hand rotate it round and flatten out with the other. Flour again and begin to roll out.\"}, {\"Turn it over, flour and roll again, try not to let it stick. When it is about the size of a sideplate pick it up and pass from one hand the other as if you are clapping. This evens it out and removes the excess flour.\"}, {\"Ensure the oil in your fryer is hot. Check this by dropping in a little of the dough. If it sizzles and rises to the top immediately then its ready.\"}, {\"Carefully slide the roti into the hot oil.\"}, {\"It will start to sizzle and bubble. Once its fluffed up very carefully turn it over using a spoon.\"}, {\"After a few seconds sieve the poori out and place on some kitchen roll\"}', '{\"Calories\": \"308\", \"Fat (g)\": \"5\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"60\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"9\", \"Protein (g)\": \"11\", \"Salt (mg)\": \"192\"}', '', 'Nuts', 'snacks', '20min'),
(160, 'Imlee Chutney', '[\"3 tbsp tamarind paste/100g tamarind from a block\", \"1 tsp salt\", \"2 tsp sugar\", \"100ml boiling water\", \"1 tsp garam masala\", \"Splash of lemon juice\", \"1 chilli (2 chillies for more heat)\", \"1 small carrot, in chunks\", \"1 small onion, roughly chopped\"]', '{\"If using a block of tamarind hydrate the tamarind by covering it with hot water and soak for 10 minutes. Using a fork mash to remove the flesh. Sieve and keep hold of the tamarind water.\"}, {\"Place tamarind, salt, sugar, garam masala, and water into a bowl and stir together.\"}, {\"Then put the chilli, carrot and onion into a food processor to chop finely.\"}, {\"Stir the finely chopped vegetables into the tamarind water.\"}, {\"Add a splash of lemon juice and stir together.\"}, {\"Refrigerate until required.\"}, {\"Check seasoning before serving and adjust if required.\"}', '{\"Calories\": \"24\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"5\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"582\"}', '', 'Nuts', 'snacks', '20min'),
(161, 'Saag Walee Roti', '[\"260g chakki atta or atta flour (half wholemeal and half plain works as well)\", \"½ tsp salt\", \"2 tsp oil\", \"50g big handful of spinach\", \"100ml warm milk\"]', '{\"Heat water in a pan and add spinach. Blanch and remove the spinach, and then rinse under cold water.\"}, {\"Place in a blender and add the milk. Blitz to a puree and set to one side.\"}, {\"Mix flour, salt and oil together. Pour in the spinach and milk puree a little at a time and knead to a soft dough. Cover with a tea towel and set to one side for 20 minutes.\"}, {\"Put some dry atta on a flat plate for dusting. Flour your hands and take a tangerine-sized ball of dough.\"}, {\"Roll the dough in the palms of your hands, creating a smooth ball.\"}, {\"Flatten it using your fingers then holding the dough in one hand, rotate it round and flatten out with the other.\"}, {\"Flour again and begin to roll out. Turn it over, flour and roll again, try not to let it stick. When it is about 7cm in diameter, pick it up and pass from one hand the other as if you are clapping. This evens it out and removes the excess flour.\"}, {\"To cook, heat the tavaxa0- this is an Indian griddle pan (but a non-stick frying pan will do) - and carefully place the roti flat on to it. Try not to let the roti fold.\"}, {\"You will see the colour of the roti darken after about 10 seconds. When this happens, turn the roti over. If using gas, turn the heat down a little and when bubbles appear after about 10 seconds, take the tava off the hob and put the roti directly onto the flame. The roti will begin to puff up, turn it over using tongs and move it around so it doesn\"t burn.\"}, {\"If you are not using a gas cooker or are not comfortable using a naked flame, leave the roti on the pan. Turn the heat down a little and when bubbles appear, turn the roti over.xa0Using a clean tea towel, gently press the top of the roti and it will begin to blow up with hot steam.\"}, {\"Work quickly, turning and pressing until it has all blown up. Be careful not to burn yourself. Remove the roti and set it on a clean tea towel and cover to keep warm.\"}, {\"Smear with butter and serve.\"}', '{\"Calories\": \"115\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"24\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"4\"}', '', 'Nuts', 'snacks', '20min'),
(162, 'Spiced Tomato Chutney', '[\"3 tbsp vegetable oil\", \"1 tsp kalonji seeds\", \"1 tsp fennel seeds\", \"1 tsp mustard seeds\", \"1 tsp cumin seeds\", \"½ tsp fenugreek seeds\", \"2 dried kashmiri red chillis\", \"1 red chilli, chopped\", \"200ml white vinegar\", \"250g jaggery or brown sugar\", \"1 kg tomatoes, quartered\", \"1 tsp salt, or to taste\", \"1 tsp chilli powder, optional\"]', '{\"Dissolve the sugar with the vinegar in a bowl.\"}, {\"Heat the oil in a heavy pan and add all the spices until they sizzle & become fragrant. This should only take a minute.\"}, {\"Very gently, pour the vinegar and sugar mixture into the pan with the spices and stir.xa0Bring this to a simmer.\"}, {\"Add in the tomatoes and cook on a very low heat until they have softened and have gone pulpy (about 45 minutes to 1 hour).\"}, {\"Season with salt and chilli powder then stir to keep it from sticking. If you want to remove any of the tomato skins then do so with some tongs.\"}, {\"Put the chutney into a sterilised glass jar and leave to cool.\"}, {\"Once cooled seal the jar, the chutney will keep for 4-6 weeks refrigerate once opened.\"}', '{\"Calories\": \"98\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"17\", \"of which sugars (g)\": \"15\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"155\"}', '', 'Nuts', 'snacks', '20min'),
(163, 'Mushy Pea Curry', '[\"300g fresh tomatoes, roughly chopped\", \"1 small onion, roughly chopped\", \"150g fresh coconut\", \"5 cloves of garlic\", \"2 cm ginger, roughly chopped\", \"3 fresh green chillies (amend to personal taste)\", \"2 tbsp oil\", \"1 tsp cumin seeds\", \"½ tsp turmeric\", \"½ tsp red chilli powder\", \"400g tin marrow fat peas or frozen peas\", \"Salt to taste\", \"1 tsp coriander, chopped\"]', '{\"To make the masala, blend the tomatoes, onion, coconut, garlic, green chillies and ginger to a paste with 200ml of water.\"}, {\"Heat oil in a pan and add the cumin seeds until fragrant.\"}, {\"Pour the blended mixture into the pan and cook for about 10 minutes.\"}, {\"Add in the turmeric and chilli powder and stir. Leave this to cook so it thickens and the starts to make a masala.\"}, {\"Stir in the green peas with about 50ml of water and stir.\"}, {\"Continue to cook until the peas are soft and cooked through.xa0Taste and adjust the season if required.\"}, {\"Sprinkle with some fresh coriander to serve with some rice.\"}', '{\"Calories\": \"62\", \"Fat (g)\": \"2.1\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"9.1\", \"of which sugars (g)\": \"2.4\", \"Fibre (g)\": \"2.0\", \"Protein (g)\": \"2.6\", \"Salt (mg)\": \"0.81\"}', '', 'Nuts', 'snacks', '20min'),
(164, 'Saunth ki Chutney', '[\"100g tamarind\", \"150g jaggery grated\", \"1 tsp Salt\", \"1 tsp kala namak (pink salt), optional\", \"1 tsp garam Masala\", \"½ tsp ginger powder\", \"½ tsp black pepper\", \"½ tsp chilli powder\"]', '{\"If using tamarind in the block form - cover the tamarind in boiling water, leave it to soak for about 10-20minutes.\"}, {\"Using a fork mash it well and then strain, save the tamarind water and discard the stones and pulp. (You can repeat this process to get more tamarind water). The tamarind water should be pouring consistency.\"}, {\"Pour the tamarind water (or paste) into a pan, add the rest of the ingredients and bring to a boil. Leave to simmer for a few minutes until it thickens to a sauce consistency.\"}, {\"Cool and serve.\"}', '{\"Calories\": \"104\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"24\", \"of which sugars (g)\": \"21\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"813\"}', '', 'Nuts', 'snacks', '20min'),
(165, 'Curried Butternut Squash Soup', '[\"1 butternut squash\", \"1 red onion, chopped\", \"1 tsp cumin seeds\", \"2 garlic cloves, chopped finely\", \"3cm piece ginger, grated\", \"2 red chillies, chopped (keep some for garnish)\", \"500ml water or chicken stock\", \"50ml coconut cream\"]', '{\"Slice the squash into four long strips, remove the seeds and place on a tray with a little knob of butter on each and roast at 180°Cxa0for about 35 minutes until soft.\"}, {\"Meanwhile heat some oil and add cumin seeds until fragrant, then add onions and cook gently until soft.\"}, {\"Stir in the garlic and ginger and chilli and cook gently for about 5 minutes.\"}, {\"Once the squash is soft scrape the flesh out and discard the skin. Stir the flesh into the onions.\"}, {\"Add the stock and cook through until everything is soft (about 5 minutes).\"}, {\"Using a hand blender blitz the soup until it\"s smooth and thick. Pour in the coconut cream and if it\"s too thick add a little hot water.\"}, {\"Pour into bowls and top with a swirl of coconut cream and a chopped chilli. Serve with some crisp naan bread.\"}', '{\"Calories\": \"143\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"33\", \"of which sugars (g)\": \"8\", \"Fibre (g)\": \"7\", \"Protein (g)\": \"4\", \"Salt (mg)\": \"40\"}', '', 'Nuts', 'snacks', '20min'),
(166, 'Plain Aloo Tikki', '[\"4 medium potatoes, washed with skin on\", \"1 tsp garam masala\", \"2 chillies, finely chopped\", \"1 tsp salt\", \"1 tsp cumin seeds\", \"2 tbsp ginger, grated\", \"Handful of fresh coriander, chopped\"]', '{\"Place potatoes with the skin on in a pan and cover with cold water and bring to the boil. Reduce the heat and leave to cook gently until soft. Drain and leave to cool.\"}, {\"Once cooled, peel the skin off with your fingers and discard. Grate the potatoes into a bowl.\"}, {\"Add the salt, garam masala, cumin seeds, chilli, coriander, ginger and mix together.\"}, {\"Wet your hands so the potato mixture doesn\"t stick to your fingers and begin to shape the potato mixture into small patties or tikki, roughly 4-5cm in diameter and about 3cm thick.\"}, {\"Heat a little oil in a frying pan or on an Indian griddle pan or thava.\"}, {\"Place the cakes in the pan and cook until golden brown. Turn them over and cook the other side. Once crisp on both side serve with a chutney.\"}', '{\"Calories\": \"74\", \"Fat (g)\": \"0.3\", \"of which saturates (g)\": \"0.0\", \"Carbohydrates (g)\": \"16.9\", \"of which sugars (g)\": \"0.7\", \"Fibre (g)\": \"1.2\", \"Protein (g)\": \"2.1\", \"Salt (mg)\": \"0.02\"}', '', 'Nuts', 'snacks', '20min'),
(167, 'Karahi Paneer', '[\"400-600g Paneer, cubed\", \"1 tsp cumin seeds\", \"1 red onion, sliced\", \"2 garlic cloves\", \"3cm piece of ginger, thinly sliced into strips\", \"3 fresh tomatoes, chopped\", \"1 tsp salt\", \"2 or 3 green chillies, sliced lengthways\", \"1 tsp Kashmiri chilli powder\", \"½ tsp turmeric\", \"1 tsp coriander seeds, crushed\", \"½ tsp black pepper\", \"1 heaped tsp Kasoori methi\", \"½ red pepper, cubed\", \"½ green pepper, cubed\", \"Handful of Coriander leaves, chopped\", \"1 tsp garam masala\"]', '{\"Heat oil in a pan add the cumin seeds until the sizzle then add the ginger and garlic and give a quick fry.\"}, {\"Reduce the heat and add sliced onion and fry for a few minutes.\"}, {\"Add the chopped tomatoes and add the salt andxa0slit green chillies. Increase the heat and leave to cook.\"}, {\"Once the tomatoes start to cook down, add the chilli powder, crushed coriander seeds, black pepper and turmeric.xa0If you feel it is catching on the bottom of the pan, you can add a little water.\"}, {\"Fry until the tomatoes break down completely and you are left with a thick masala paste. Make sure the masala is nice and dry and thick.\"}, {\"Cut the paneer into cubes. If it is store-bought, you may want to soak the paneer in warm water to soften.\"}, {\"Add the peppers to the masala and stir.xa0Cook for 1 or 2 minutes\"}, {\"Remove the paneer from the water andxa0add to the pan.\"}, {\"Stir in the kasoori methi. Stir and reduce the heat and leave it to cook for about 5-6 minutes.\"}, {\"The masala should be thick and the paneer beautifully coated.\"}, {\"Add the chopped coriander and garam masala to serve.\"}', '{\"Calories\": \"46\", \"Fat (g)\": \"2.2\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"4.9\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"1.8\", \"Protein (g)\": \"2.2\", \"Salt (mg)\": \"0.89\"}', '', 'Nuts', 'snacks', '20min'),
(168, 'Mushroom Biryani', '[\"200g basmati rice\", \"2 to 3 tbsp oil\", \"1 tsp cumin\", \"1 tsp fennel\", \"3cm piece of cassia bark\", \"2 cloves\", \"3 green cardamoms\", \"2 strands of mace\", \"1 bay leaf\", \"1 star anise\", \"10 curry leaves\", \"1 onion, finely chopped\", \"6 cloves of garlic, crushed in a mortar-pestle\", \"7cm ginger, crushed in a mortar-pestle\", \"1 or 2 green chillies, finely chopped\", \"1 tomato, finely chopped\", \"1 tsp turmeric powder\", \"1 tsp red chilli powder\", \"½ tsp garam masala powder\", \"1 tsp coriander powder\", \"¼ tsp black pepper\", \"1 tsp salt\", \"250g chestnut mushrooms, cut into chunks\", \"Handful mint leaves, chopped\", \"Handful coriander leaves, chopped\"]', '{\"Rinse basmati rice in running water till the water runs clear of starch. Soak the rice in enough water to cover it and leave for 30 minutes. Then, drain the rice and keep aside.\"}, {\"Heat oil in a deep pan, then add all the whole spices - fennel, cumin, cloves, bay leaf, cassia, green cardamoms, star anise and mace.\"}, {\"Stir in the curry leaves and fry the spices until fragrant for a few seconds, then add chopped onions and saute until they are translucent.\"}, {\"Add the minced ginger, garlic and green chillies and cook until the garlic cooks through.\"}, {\"Add the chopped tomatoes and saute for about 10 minutes.\"}, {\"Add the coriander powder, turmeric powder, garam masala powder, red chilli powder, black pepper and salt.\"}, {\"Once fragrant and the tomatoes have broken down into the masala, add the mushrooms and half of mint and coriander leaves. Cookxa0on a low heat for 6 to 8 minutes.\"}, {\"Stir and add about 200ml of hot water. Bring the mixture to a simmer.\"}, {\"Add the rice and the remaining mint and coriander and stir through. Season with salt.\"}, {\"Reduce the heat and cover the pan with a lid. Cook for 10 minutes.\"}, {\"Once the water has been absorbed, check the rice is cooked. If it still has a bite, you can add a little more water and leave to cook with the lid on for a little longer.\"}, {\"Once the rice is cooked through, allow the rice to sit for 5 minutes.\"}, {\"Remove the lid and fluff the rice.\"}', '{\"Calories\": \"447\", \"Fat (g)\": \"23\", \"of which saturates (g)\": \"9\", \"Carbohydrates (g)\": \"43\", \"of which sugars (g)\": \"7\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"17\", \"Salt (mg)\": \"485\"}', '', 'Nuts', 'snacks', '20min'),
(169, 'Chicken Tikka Masala', '[\"6 chicken thighs, skinned and cut into chunks\", \"½xa0pepper, chopped into large chunks\", \"½xa0onion, chopped into large chunks\", \"1 tomato, chopped into large chunks\", \"½xa0tsp salt\", \"1 tsp chilli powder\", \"1 tsp coriander seeds, crushed\", \"3cm piece ginger, minced\", \"3 cloves garlic, minced\", \"3 tbsp Greek yoghurt\", \"1 heaped tsp dried fenugreek (kasoori Methi)\", \"Juice of 1 lime\", \"2 tbsp mustard oil, to cook\", \"1 tbsp oil\", \"5cm stick cassia bark\", \"3 green cardamoms\", \"2 bay leaves\", \"3 cloves\", \"1 tsp cumin seeds\", \"1 large onion, minced or very finely diced\", \"3 garlic cloves, minced\", \"1 tbsp ginger, minced\", \"1 or 2 green chillies, minced\", \"2 tsp cumin seeds\", \"2 tsp coriander seeds\", \"3 fresh tomatoes\", \"1-2 tbsp cashew nuts\", \"1 tsp salt\", \"½xa0tsp turmeric\", \"1 tspxa0chilli powder\", \"1 tsp dried fenugreek leaf (kasoori methi)\", \"100ml double cream\", \"Handful fresh coriander, chopped\"]', '{\"Blend the marinade spices and coat the chicken, (add the optional pepper, onion and tomato) for at least half an hour.\"}, {\"Heat oil in a pan and add the cassia, cardamom, bay leaves, cloves and 1tsp cumin seeds.\"}, {\"Once fragrant add onions and cook gently for about 20 minutes until golden brown.\"}, {\"Add salt to taste then add the turmeric, minced ginger, garlic and chillies.\"}, {\"Pound the 2 tsp cumin and coriander seeds and stir into the pan with the chilli powder. Add a splash of water to stop the spices from burning.\"}, {\"Blitz the fresh tomatoes to a purée.\"}, {\"Blend the cashew nuts to a powder then stir into the tomatoes to make a paste.\"}, {\"Add this nut and tomato paste to the sauce with a little water and leave to cook for 10 minutes (add more water to loosen if required).\"}, {\"Place the marinated chicken and vegetables onto an oven tray and pour the mustard oil over them. Cook on 180oC for about 15-25 minutes until the chicken pieces are a little charredxa0around the edges.\"}, {\"Once cooked place cooked chicken (and veg if using) into the sauce and stir. Leave this to cook for about 5-10 minutes.\"}, {\"Add the dried fenugreek, pour in a little cream, stir and remove from the heat. Throw in the coriander to serve.\"}', '{\"Calories\": \"177\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"4.4\", \"Carbohydrates (g)\": \"2.6\", \"of which sugars (g)\": \"1.7\", \"Fibre (g)\": \"0.4\", \"Protein (g)\": \"13\", \"Salt (mg)\": \"0.98\"}', '', 'Nuts', 'snacks', '20min'),
(170, 'Hariyali Chicken', '[\"6 chicken thigh fillets, trimmed and skinned\", \"1 tsp cumin seeds\", \"1 bunch fresh coriander, leaves and stems\", \"½ bunch fresh mint leaves,\", \"4 garlic cloves\", \"3cm piece of fresh ginger\", \"4 fresh green chillies\", \"1 tsp salt\", \"½ lemon, juice only\", \"1 tbsp oil\", \"3 tbsp thick Greek yogurt\"]', '{\"Clean, wash and pat dry the chicken pieces.\"}, {\"Put the cumin seeds into a pestle and mortar and roughly crush the seeds.\"}, {\"Place the mint, coriander, ginger, garlic, chillies, lemon juice, salt and oil into a blender and blitz to a paste.\"}, {\"Empty this paste into a bowl and mix in the yoghurt and crushed cumin seeds.\"}, {\"Combine the chicken and the marinade and let it sit for at least 30 minutes but overnight is better.\"}, {\"Cook in the oven at 180°C for 25 minutes or on the barbecue for about 10-15 minutes until cooked through.\"}', '{\"Calories\": \"99\", \"Fat (g)\": \"4.6\", \"of which saturates (g)\": \"1.0\", \"Carbohydrates (g)\": \"1.7\", \"of which sugars (g)\": \"0.7\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"13\", \"Salt (mg)\": \"1.1\"}', '', 'Nuts', 'snacks', '20min'),
(171, 'Masala Machchi', '[\"2 pieces of salmon\", \"1 tsp salt\", \"1 tsp cumin seeds, crushed\", \"2 tsp garam masala\", \"1 tbsp mustard oil\", \"½xa0tsp carom seeds, crushed\", \"1 tsp kashmiri chilli powder\", \"1 tbsp fresh ginger, grated\", \"1 tsp garlic, finely chopped\", \"1 or 2 chillies, finely chopped\", \"Handful of fresh coriander, finely chopped\", \"1 lemon\"]', '{\"Heat oven to 180°C.\"}, {\"Mix all the ingredeents for the oil rub in a bowl.\"}, {\"Add fish to the bowl and rub the oil all over the fish. Leave to marinade for at least 10-15 minutes.\"}, {\"Place fish on a foil lined oven tray and place in the oven for 10 minutes.\"}, {\"Remove the fish from the oven and top each piece of fish with the finely chopped chilli and replace in the oven for a further 5-10 minutes.\"}, {\"Give the cooked salmon a good squeeze of lemon juice and sprinkle with the coriander to serve.\"}', '{\"Calories\": \"186\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"2.0\", \"Carbohydrates (g)\": \"1.7\", \"of which sugars (g)\": \"0.4\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"15\", \"Salt (mg)\": \"1.2\"}', '', 'Nuts', 'snacks', '20min'),
(172, 'Pudla', '[\"450g chickpea flour\", \"700ml water\", \"1 tsp salt\", \"½ tsp chilli powder\", \"1 tsp carom seeds (if you can\"t find these use cumin seeds)\", \"1 large red onion\", \"4 chillies\", \"1 clove garlic, minced (optional)\", \"Fresh coriander, finely chopped\", \"Vegetable oil for frying\"]', '{\"Sift the gram flour and salt into a large mixing bowl.\"}, {\"Place onions and chillies into a blender and blitz. Place into the bowl with the flour.\"}, {\"Add carom or cumin seeds.\"}, {\"Add fresh chopped coriander.\"}, {\"Stir in water to create a loose batter – leave for about 30 minutes.\"}, {\"Heat the pan on a medium heat and pour in about two teaspoons of oil.\"}, {\"Pour in four tablespoons of the batter into the middle and tilt the pan to get an even coverage of the batter.\"}, {\"Leave to cook for about two-three minutes and once you can see small bubbles appearing on the top check that it is turning golden on the bottom. Flip the pancake with a spatula and cook the other side for another minute or so.\"}', '{\"Calories\": \"268\", \"Fat (g)\": \"6.6\", \"of which saturates (g)\": \"0.5\", \"Carbohydrates (g)\": \"40\", \"of which sugars (g)\": \"3.1\", \"Fibre (g)\": \"8.5\", \"Protein (g)\": \"15\", \"Salt (mg)\": \"1.2\"}', '', 'Nuts', 'snacks', '20min'),
(173, 'Bombay Aloo', '[\"1 tbsp vegetablexa0oil\", \"1 tsp mustard seeds\", \"5 curry leaves\", \"1 onion, sliced\", \"2 green chillies, finely chopped\", \"1 tsp cumin seeds\", \"1 tsp coriander seeds\", \"½ tsp red chilli powder (optional)\", \"½ tsp turmeric\", \"1 tsp salt\", \"2 potatoes, cut into chunks\", \"1 tsp garam masala\", \"Handful fresh coriander, finely chopped\"]', '{\"Heat the oil in a pan and add the mustard seeds and curry leaves.\"}, {\"Once the mustard seeds splutter stir in the onions and cook until they turn a light golden brown colour.\"}, {\"Place the coriander and cumin seeds into a pestle and mortar and pound to a powder. Add this, the turmeric, green chillies and chilli powder to the onions.\"}, {\"After a minute the spices will become fragrant, stir in the potatoes and salt then cook for about 5 minutes.\"}, {\"Reduce the heat and stir in a splash of water. Place the lid on the pan and leave to steam for about 15-20 minutes until the potatoes are soft.\"}, {\"Remove from the heat and finish with one teaspoon garam masala and a handful of fresh coriander.\"}', '{\"Calories\": \"201\", \"Fat (g)\": \"5\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"37\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"4\", \"Salt (mg)\": \"573\"}', '', 'Nuts', 'snacks', '20min'),
(174, 'Spicy Potato Wedges', '[\"4 large potatoes,\", \"1xa0tbsp oil\", \"1 tsp salt\", \"2 tsp cumin seeds, crushed\", \"1 tsp chilli powder\", \"1 tsp garam masala\", \"1 tsp paprika\"]', '{\"Heat the oven to 180°C.\"}, {\"Wash and scrub potatoes then cut into chunky wedges with the skin left on.\"}, {\"In a large roomy bowl and all the spices and oil to make a rub. Add the potatoes and mix using your hand to coat them with the oil rub.\"}, {\"Place wedges on an oven tray skin side down.\"}, {\"Place in the oven to cook for 25-30 minuets until crisp and spicy.\"}', '{\"Calories\": \"204\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"40\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"5\", \"Salt (mg)\": \"604\"}', '', 'Nuts', 'snacks', '20min'),
(175, 'Hot Coconut Vegetables', '[\"½ red pepper, cut into chunks\", \"½xa0green pepper, cut into chunks\", \"10 mushrooms, quartered\", \"100g green beans, topped and tailed\", \"1 tbsp vegetable oil\", \"1 tbsp cumin seeds\", \"2 medium onions, blended in a food processor to a grated consistency\", \"200g tinned plum tomatoes\", \"1 tsp salt\", \"1 tsp turmeric\", \"½xa0tbsp chilli powder (optional)\", \"2 or 3 green chillis, chopped\", \"200ml coconut cream\", \"1 tbsp garam masala\", \"1 handful fresh coriander, chopped\"]', '{\"Heat oil and butter in a pan and add cumin seeds.\"}, {\"When sizzling and aromatic add the minced onions and fry until golden colour.\"}, {\"Add the tomatoes, salt, turmeric, chilli powder and fresh chillies.\"}, {\"Stir together and leave to cook so the tomatoes break down and you are left with a thick paste.\"}, {\"Add the mushrooms and beans to the masala and stir. Cook for about five minutes\"}, {\"Pour in the coconut cream and cook gently for a few minutes so the flavours combine.\"}, {\"Reduce the heat and leave to cook for about 10 minutes before adding the peppers.\"}, {\"Taste the sauce and adjust seasoning if required.\"}, {\"Remove from heat and add garam masala and throw in the fresh coriander to serve.\"}', '{\"Calories\": \"124\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"7.7\", \"Carbohydrates (g)\": \"5.0\", \"of which sugars (g)\": \"4.1\", \"Fibre (g)\": \"0.9\", \"Protein (g)\": \"2.0\", \"Salt (mg)\": \"0.82\"}', '', 'Nuts', 'snacks', '20min'),
(176, 'Avocado Salsa', '[\"1 ripe avocado\", \"1 red onion\", \"1 chilli, finely chopped\", \"Juice from 1 lemon\", \"Small handful of fresh coriander, chopped\"]', '{\"Cut the avocado and onion into very small dices and place in a bowl.\"}, {\"Add chilli, lemon juice and coriander and stir together.\"}, {\"Leave for a few minutes and serve.\"}', '{\"Calories\": \"49\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"4\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"5\"}', '', 'Nuts', 'snacks', '20min'),
(177, 'Aloo Tama Bodi', '[\"2 tbsp ghee or oil\", \"1 onion, finely chopped\", \"2 garlic cloves, minced\", \"5cm piece of ginger, grated\", \"1 tsp coriander seeds, crushed\", \"1 green chilli (optional)\", \"½xa0tsp red chilli powder\", \"½xa0tsp turmeric\", \"200g red lentils, washed\", \"700ml water\", \"1xa0tsp salt\", \"Handful of coriander, chopped\"]', '{\"Heat the ghee or oil in a large frying pan and cook the onions until translucent but not brown.\"}, {\"Turn the heat to low and add in the garlic, ginger, chopped chilli (if using) crushed coriander seeds, red chilli powder and turmeric. Stir to combine for about 3 minutes or so.\"}, {\"Add the red lentils and mix with the onion mixture.\"}, {\"Pour thd water in and bring it to a boil, add the salt and reduce heat to a simmer for about 15 minutes or until the lentils are tender.\"}, {\"Remove from the heat and stir in the fresh coriander.\"}', '{\"Calories\": \"78\", \"Fat (g)\": \"3.3\", \"of which saturates (g)\": \"1.9\", \"Carbohydrates (g)\": \"9.4\", \"of which sugars (g)\": \"2.3\", \"Fibre (g)\": \"1.3\", \"Protein (g)\": \"3.7\", \"Salt (mg)\": \"1.3\"}', '', 'Nuts', 'snacks', '20min'),
(178, 'Fish Amritsari', '[\"4cm piece of ginger\", \"4 cloves of garlic\", \"2 lemons\", \"½xa0tsp turmeric powder\", \"1 tsp coriander seeds, crushed\", \"1 tsp cumin seeds, crushed\", \"1 tsp carom seeds (ajwain)\", \"1 tsp chilli powder\", \"salt to taste\", \"200g gram flour (chickpea flour)\", \"water\", \"400g fish (any firm white fish) in thick portion sizes\", \"oil to deep fry\"]', '{\"Crush the ginger and garlic to a paste and add to a large bowl.\"}, {\"Add the juice from 1 lemon and cut the second one into wedges to serve the fish with.\"}, {\"Add the turmeric, crushed cumin and coriander, carom, chilli and salt.\"}, {\"Sprinkle in the gram flour and mix all the ingredients for the batter together.\"}, {\"Add a a little water at a time to make a thick batter.\"}, {\"Place the fish in the batter and coat it all - leave to marinate for about 30 minutes.\"}, {\"Meanwhile begin to heat the oil in a fryer gently\"}, {\"When you are ready to cook check the oil is hot enough by dropping in a little batter into the oil. If it bubbles and floats to the top straight away it\"s ready.\"}, {\"Very gently place a piece of the battered fish into the oil (place it away from you so the hot oil doesn\"t splash up).\"}, {\"Fry the fish until it\"s cooked through and each piece is golden and crispy (about 5-6 minutes.\"}, {\"Remove and set on some kitchen roll to drain. Serve hot with homemade chips and a wedge of lemon.\"}', '{\"Calories\": \"140\", \"Fat (g)\": \"2.1\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"15\", \"of which sugars (g)\": \"1.0\", \"Fibre (g)\": \"3.1\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"0.59\"}', '', 'Nuts', 'snacks', '20min'),
(179, 'Athrak Soup', '[\"5cm piece of fresh ginger, roughly chopped\", \"1 fresh chilli, chopped\", \"3 cloves of garlic\", \"200g of tinned tomatoes\", \"200ml water\", \"1 tsp cumin seeds\", \"1 tsp salt\", \"½xa0tsp turmeric\", \"1 tsp garam masala\", \"handful of fresh coriander, chopped\", \"ginger julienne\"]', '{\"Put all the ginger, chilli, garlic, into a blender and blend to a paste. Then add the tomatoes and water.\"}, {\"Heat the oil in a pan and add cumin seeds and fry for a few seconds until they pop and become fragrant but be careful as they burn very quickly.\"}, {\"Add paste very carefully as it will spit. Bring to the boil and then reduce the heat to a simmer.\"}, {\"Add salt, turmeric, garam masala and leave to simmer for a few minutes. It will be a fairly liquidy consistency.\"}, {\"Check the seasoning and adjust to taste.\"}, {\"Remove from the heat, stir in the fresh coriander, and top with a sprinkle of ginger strips. Serve in a bowl with some buttered roti.\"}', '{\"Calories\": \"69\", \"Fat (g)\": \"5.7\", \"of which saturates (g)\": \"0.4\", \"Carbohydrates (g)\": \"3.6\", \"of which sugars (g)\": \"2.5\", \"Fibre (g)\": \"0.5\", \"Protein (g)\": \"1.3\", \"Salt (mg)\": \"1.3\"}', '', 'Nuts', 'snacks', '20min'),
(180, 'Xacuti Chicken', '[\"8 chicken pieces on the bone skinless\", \"1 tsp turmeric powder\", \"1 tsp salt (or to taste)\", \"100g fresh coconut, fresh grated/desiccated\", \"8 Kashmiri chillies, broken\", \"2 tbsp coriander seeds\", \"5cm stick of cassia bark, broken\", \"1 tsp black peppercorns\", \"1 tsp cumin seeds\", \"1 tsp fennel seeds\", \"4 cloves\", \"2 star anise\", \"1 tbsp poppy seeds\", \"6 garlic cloves\", \"2xa0tbsp vegetable oil\", \"2 medium onions, finely sliced\", \"½xa0tsp nutmeg powder\", \"2 tsp tamarind paste\"]', '{\"Marinade the chicken in salt and turmeric for 15-20 minutes.\"}, {\"Heat a dry frying pan on a low heat and roast the coconut for 5-7 minutes until just brown.xa0Remove and set aside.\"}, {\"Dry roast the chillies, coriander seeds, cassia bark, peppercorns, cumin seeds, fennel seeds, cloves and star anise in the same pan for 2 mins just till they release their aromatics.\"}, {\"Add the poppy seeds and roast for a further 1 minute.\"}, {\"Remove the spices and leave them to cool before grinding them to a powder in a spice grinder. Remove and set to one side.\"}, {\"Put the garlic into a blender with the toasted coconut and blend to a paste.\"}, {\"Add the ground spices with about 100ml of water to create a thick paste.\"}, {\"Heat oil in a pan and add sliced onions. Fry for 10 minutes once browned add the spice paste and fry for 5 minutes.\"}, {\"Stir in the chicken pieces and coat in the spice paste. Leave to cook on a low heat with the lid on the pan until the chicken pieces are tender (about 20-30 minutes).\"}, {\"Grate in the nutmeg and tamarind paste and leave for a further 5 minutes to cook.\"}, {\"Add some boiling water to create a little more gravy. Garnish with fresh coriander and whole red chillies.\"}', '{\"Calories\": \"189\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"5.9\", \"Carbohydrates (g)\": \"4.2\", \"of which sugars (g)\": \"2.9\", \"Fibre (g)\": \"2.1\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"0.84\"}', '', 'Nuts', 'snacks', '20min'),
(181, 'Stuffed Okra in a Yoghurt Sauce', '[\"500g okra\", \"½xa0tsp turmeric\", \"1 black cardamom, ground\", \"1 tsp fennel seeds, ground\", \"1½xa0tsp cumin seeds, ground\", \"1 tsp black pepper\", \"2½xa0tsp of mustard oil\", \"1 tbsp amchoor powder (dried mango powder)\", \"1 tsp coriander seeds, ground\", \"2 tsp chilli powder\", \"¼xa0tspxa0nutmeg\", \"½xa0tsp salt\", \"1½xa0tsp chilli powder\", \"½xa0tsp turmeric\", \"2 tbsp of rapeseed oil\", \"1 small onion, sliced\", \"750ml yoghurt\"]', '{\"Wash and thoroughly dry the okra (kitchen roll is great for this).\"}, {\"In a bowl stir the dry spices and mustard oil together to make the filling.\"}, {\"Remove the top of the okra and slit them to open up their tummys, then fill each one with the spice mixture and set aside.\"}, {\"For the sauce mix the chilli powder, turmeric and two tablespoons of water to create a paste.\"}, {\"Heat oil in a pan, add the sliced onion and fry for about four minutes.\"}, {\"Add the stuffed okra and cook for ten minutes.\"}, {\"Remove from the heat and stir in the chilli paste and yoghurt. Season with salt.\"}, {\"Return to a very low heat for five minutes until the sauce has thickened.\"}, {\"Adjust the seasoning if required and serve.\"}', '{\"Calories\": \"93\", \"Fat (g)\": \"8.1\", \"of which saturates (g)\": \"1.5\", \"Carbohydrates (g)\": \"3.4\", \"of which sugars (g)\": \"2.8\", \"Fibre (g)\": \"2.9\", \"Protein (g)\": \"3.2\", \"Salt (mg)\": \"0.50\"}', '', 'Nuts', 'snacks', '20min'),
(182, 'Tandoori Fish', '[\"500g Salmon orxa0monkfish, in thick chunks\", \"1 lemon\", \"salt to taste\", \"1 tsp cumin seeds\", \"3 garlic cloves, roughly chopped\", \"4cm piece of ginger, roughly chopped\", \"1 green chilli, chopped\", \"1 heaped tbsp thick greek yoghurt\", \"1 tsp kashmiri chilli powder or paprika\", \"1 tsp garam masala\", \"1 heaped tsp chickpea flour\", \"1 tbsp fresh coriander finely chopped\", \"1 tsp vegetable oil\", \"Lemon juice to garnish\", \"Handful of fresh coriander, chopped\"]', '{\"Add the salmon to a mixing bowl along with juice from half the lemon juice and salt and mix well\"}, {\"Give the cumin seeds a bash and add to the bowl.\"}, {\"Crush the ginger and garlic in a pestle and mortar and place into a bowl.\"}, {\"Add the finely chopped chilli, and the remaining marinade ingredients and mix to ensure the fish is all coated. Leave to marinate for half an hour. The fish can be skewered or cooked directly on a baking sheet.\"}, {\"Preheat the grill to a medium to high setting. Grill for 15 mins until it\"s just done (you can also bake this in the oven if too)\"}, {\"Once cooked squeeze over a little lemon juice and sprinkle with green coriander and serve.\"}', '{\"Calories\": \"154\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"2.9\", \"Carbohydrates (g)\": \"2.3\", \"of which sugars (g)\": \"1.5\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"13\", \"Salt (mg)\": \"0.99\"}', '', 'Nuts', 'snacks', '20min'),
(183, 'Amazing Nut Roast', '[\"1 tbsp ghee or oil\", \"1 tsp cumin seeds\", \"1 dried chilli\", \"1 large onion, finely chopped\", \"2 garlic cloves, finely chopped\", \"3cm ginger\", \"200g chestnut mushrooms, sliced\", \"100g paneer grated\", \"1 large carrot, grated\", \"1 tsp Kashmiri chilli powder\", \"½xa0tsp turmeric\", \"100g red lentils\", \"2 tomatoes, chopped\", \"300ml water\", \"100g walnuts and cashews, roughly chopped\", \"100g mature cheddar cheese, grated\", \"Handful of fresh coriander, chopped\"]', '{\"Preheat the oven to 180ºC or gas mark 4.\"}, {\"Line the base and sides of a 1.5-litre loaf tin with parchment paper.\"}, {\"Heat the ghee in a large frying pan and add the cumin seeds and dried chilli until fragrant.\"}, {\"Add the onions and cook for about 5 mins until they start to soften.\"}, {\"Stir in the garlic and ginger and stir for a few minutes.\"}, {\"Add the sliced mushrooms and cook until they soften then stir in the paneer and grated carrot. Cook the mixture for about 3 mins then add the chilli powder and turmeric and cook for just a minute.\"}, {\"Add the tomatoes and cook for about 1 minute until they start to break down a little, then add the water and season with salt.\"}, {\"Stir in the lentils and bring to the boil then leave to simmer over a very gentle heat until all the liquid has been absorbed and the mixture is fairly dry (about 10 minutes). Set aside to cool a little.\"}, {\"Roughly chop the nuts and stir in with the cheese and coriander.\"}, {\"Once mixed through, spoon the mixture into the prepared tin and press down into the tin.\"}, {\"Cover with foil and bake for 20 mins, then remove the foil and bake for a further 10–15 minutes until firm when pressed gently.\"}, {\"Allow the loaf to cool in the tin for about 10 mins then turn out onto a serving board or a plate and slice into lovely thick pieces.\"}', '{\"Calories\": \"303\", \"Fat (g)\": \"23\", \"of which saturates (g)\": \"9\", \"Carbohydrates (g)\": \"14\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"72\"}', '', 'Nuts', 'snacks', '20min'),
(184, 'Aloo Parantha', '[\"3 medium potatoes\", \"1 tsp salt\", \"1 or 2 chillies, finely chopped\", \"½xa0tsp carom seeds\", \"1 tsp garam masala\", \"1cm piece of ginger, grated\", \"Handful fresh coriander leaves, chopped\", \"1 tsp dried fenugreek leaves\", \"500g atta, wholemeal flour\", \"Water\", \"1 tsp butter/ghee or vegetable oil\"]', '{\"Boil the potatoes whole with the skin on for about 20 minutes. When soft remove from the water and leave to cool. Peel the potatoes and grate into a large bowl.\"}, {\"Add all remaining ingredients for the stuffing. Stir together using your hand until the stuffing comes together like dough. Divide into 4 equal sized balls. Try replacing the potatoes with grated raw cauliflower or grated mooli (Indian radish) - (make sure you squeeze any excess liquid out of the mooli).\"}, {\"Make the roti dough and make two dough balls. Put some dry flour (atta) on a plate for dusting.\"}, {\"Roll out each ball of dough so you have 2 thick discs (roti) approx 10cm in diameter, dusting when required to stop them sticking.\"}, {\"Take one ball of stuffing and put it on one of the rotis and press it down to spread it out a little.\"}, {\"Place the second roti on top of the first one and squeeze the edges together to seal in the stuffing.\"}, {\"Flour the stuffed Parantha and begin to roll out again. Carefully flip over when required - be gentle as you want the stuffing to stay inside. Roll out to about 15-20cm in diameter.\"}, {\"Place the Parantha flat on the heated thava and leave to cook for a few seconds. (The thava needs to be on a medium heat - if too hot the Parantha will burn.) You will see the colour of the Parantha darken after about 20 seconds.\"}, {\"Carefully turn it over. Smear butter on the top while the second side is cooking. It should begin to puff up after a few seconds. Turn it over again (there will be a lot of steam).\"}, {\"Butter the second side and leave it to cook for a few seconds then turn it over again. The Parantha should be a golden brown colour with small brown spots.\"}, {\"Remove from the tava and place on some kitchen roll. The bread should be nicely crisp with lovely soft spiced potatoes inside.\"}', '{\"Calories\": \"519\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"96\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"13\", \"Protein (g)\": \"20\", \"Salt (mg)\": \"805\"}', '', 'Nuts', 'snacks', '20min');
INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(185, 'Red Lentil Dhal', '[\"200g red lentils, washed\", \"900ml water (approx.)\", \"1 tsp of salt\", \"1 tbsp ghee or rapeseed oil\", \"1 tsp of cumin seeds\", \"1 dried red chilli\", \"1 bay leaf\", \"1 small onion, chopped\", \"1 garlic clove, chopped\", \"2 tomatoes, finely chopped\", \"1 tsp ginger, grated\", \"1 tsp turmeric\", \"1 chilli, finely chopped\", \"1 tsp fenugreek leaves\", \"1 tsp of garam masala\", \"Handful of coriander, chopped\"]', '{\"Place lentils in a pan with the salt, cover with the water and bring to the boil.\"}, {\"Remove the froth, reduce the heat and leave to simmer for 10 minutes. Check the lentils are cooked by squeezing them between your fingers. Once soft remove from the heat.\"}, {\"In a frying pan heat the oil or ghee. Add the dried chilli, bay leaf and the cumin seeds.\"}, {\"When the seeds sizzle, add the onion and garlic and fry until lightly browned. Reduce the heat and add the tomatoes, ginger, turmeric, fenugreek and the chopped chilli. Gently let the ingredients cook down for about 10 minutes to make a thick masala paste.\"}, {\"Add a ladle full of the lentils (dhal) to the masala paste in the frying pan and stir together, then empty all the contents back into the pan with the lentils and stir. It should have the consistency of a thick soup but if it\"s too thick just add a little boiling water and remove from the heat. If you prefer it thicker just leave it on the heat to reduce until you get the consistency you want.\"}, {\"Check the seasoning and add a little salt if required. Stir in the garam masala and coriander to serve.\"}', '{\"Calories\": \"78\", \"Fat (g)\": \"3.3\", \"of which saturates (g)\": \"1.9\", \"Carbohydrates (g)\": \"9.4\", \"of which sugars (g)\": \"2.3\", \"Fibre (g)\": \"1.3\", \"Protein (g)\": \"3.7\", \"Salt (mg)\": \"1.3\"}', '', 'Nuts', 'snacks', '20min'),
(186, 'Keralan Fish Curry', '[\"750g firm white fish cut into chunks\", \"½xa0tsp turmeric\", \"½xa0tsp salt\", \"1 tbsp Coconut oil\", \"1 tsp mustard seeds\", \"20 curry leaves\", \"5 shallots, finely sliced\", \"4 garlic cloves, finely sliced\", \"3cm piece of ginger, finely sliced\", \"1-2 green chilli, finely sliced\", \"1 tbsp Kashmiri chilli powder (this can be reduced to suit your taste, if unsure use 1tsp)\", \"½xa0tsp turmeric\", \"4 tomatoes, chopped\", \"400ml tin coconut milk\", \"Handful coriander, chopped\"]', '{\"Coat the fish in salt and turmeric\"}, {\"Heat a tbsp of coconut oil in a shallow large based pan.\"}, {\"Add the mustard seeds with the curry leaves till the seeds start to pop.\"}, {\"Add the sliced shallots, garlic, ginger and chilli, and cook on a medium heat for 5 minutes, till softened.\"}, {\"Mix together the chilli powder and turmeric with a splash of water to make a paste (this stops the turmeric burning), and then stir into the pan.\"}, {\"Add the coconut milk and heat through. When you are ready to serve add the chopped tomatoes and stir in the fish. Cook on a gentle heat for about 5 minutes until the fish is cooked through.\"}, {\"Check the seasoning then sprinkled with fresh chopped coriander and some with fragrant basmati rice.\"}', '{\"Calories\": \"69\", \"Fat (g)\": \"1.9\", \"of which saturates (g)\": \"1.1\", \"Carbohydrates (g)\": \"1.5\", \"of which sugars (g)\": \"1.0\", \"Fibre (g)\": \"0.4\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"0.39\"}', '', 'Nuts', 'snacks', '20min'),
(187, 'Jeera Aloo', '[\"4 potatoes, boiled and cubed\", \"2 tbsp vegetable oil\", \"1 tbsp coriander seeds\", \"2 tsp cumin seeds\", \"2 green chillies, slit lengthways\", \"3cm fresh ginger, sliced very thinly\", \"1 tsp red chilli powder\", \"¼xa0tsp turmeric powder\", \"salt to taste\", \"2 tsp mango powder (amchoor powder)\", \"handful of coriander leaves, chopped\"]', '{\"Boil the potatoes gently with the skin on for about 10 minutes. Once cooled peel and cut them into 4cm cubes and set to one side.\"}, {\"Dry roast the coriander seeds and 1 tsp of cumin seeds until fragrant then remove from the heat and cool before crushing.\"}, {\"Heat oil and add remaining cumin seeds once sizzling and fragrant, stir in the sliced green chillies and sliced ginger. Saute for a few seconds, reduce the heat and then add the roasted spice powder, turmeric powder, chilli powder and salt.\"}, {\"Add the boiled and cubed potatoes. Mix well so that it is well coated with the seasoning.\"}, {\"Cook on a gentle heat for 10 minutes stirring occasionally - you don\"t want them to turn into mash.\"}, {\"Add the amchoor powder and garnish with coriander leaves.\"}', '{\"Calories\": \"109\", \"Fat (g)\": \"5.3\", \"of which saturates (g)\": \"0.3\", \"Carbohydrates (g)\": \"15\", \"of which sugars (g)\": \"0.7\", \"Fibre (g)\": \"1.1\", \"Protein (g)\": \"1.9\", \"Salt (mg)\": \"0.61\"}', '', 'Nuts', 'snacks', '20min'),
(188, 'Broccoli Tikki', '[\"500g broccoli\", \"4 medium potatoes, washed with skin on\", \"1 tbsp oil\", \"2 tsp cumin seeds\", \"1 tsp coriander seeds\", \"1 tsp salt\", \"2 green chillies, finely chopped\", \"½ tsp turmeric\", \"1 tsp chaat masala\", \"3 spring onions\", \"handful fresh coriander\"]', '{\"Place potatoes with the skin on into a pan and cover with cold water and bring to the boil. Reduce the heat and leave to cook gently until soft. Drain and cool.\"}, {\"Once cooled, peel the skin off with your fingers and discard. Grate the potatoes into a bowl and set to one side.\"}, {\"Chop the broccoli florets so they finely shredded.\"}, {\"Heat a frying pan and toast the cumin and coriander seeds until they become fragrant, remove and set to one side to cool then grind to a powder.\"}, {\"Heat a large frying pan and add 1 tbsp oil add the shredded broccoli. Toss to start it cooking and add the coriander and cumin powder.\"}, {\"Add the salt, turmeric, green chillies andxa0chaat masala.\"}, {\"Once the broccoli has softened (about 6-7 minutes), remove the mixture from the heat and leave to cool.\"}, {\"Add some of the potatoes in and mix it all together add more potatoes until the mixture has combined.\"}, {\"Add the fresh coriander and the spring onions. You should end up with a lovely thick mixture. Check the seasoning adjust if required.\"}, {\"Wet your hands, to stop the mixture sticking to your fingers and take a ball mixture. Shape into patties or tikki, roughly 7cm in diameter and about 2cm thick.\"}, {\"Repeat until they are all made. Place in the fridge until you are ready to cook them.\"}, {\"Heat a frying pan or tavaxa0and place the tikki on for 2-3 minutes until they turn a lovely brown colour. Turn the tikki and cook the other side too.\"}, {\"These are very delicatexa0so be gentle. Remove and place on a baking sheet and keep warm in the oven until you are ready to serve them.\"}', '{\"Calories\": \"262\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"51\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"7\", \"Protein (g)\": \"9\", \"Salt (mg)\": \"676\"}', '', 'Nuts', 'snacks', '20min'),
(189, 'Homemade Yoghurt', '[\"1 pint full fat milk\", \"1 tbsp natural plain yoghurt\"]', '{\"Place 1 pint of milk into a large wide based saucepan and bring it to the boil. Make sure to stir it so it doesn\"t scorch.\"}, {\"Removed from the heat and pour into a large terracota pot with a lid. Leave it to cool until it\"s just warm enough to touch (about 49°C). Stir it every now and again so prevent a skin forming.\"}, {\"Once cool enough stir in a heaped teaspoon of natural plain yoghurt until it has dissolved.\"}, {\"Place the lid on the pot and wrap the pot with a warm blanket.\"}, {\"Leave this in a warm place overnight to set.\"}, {\"Refrigerate before you eat it.\"}', '{\"Calories\": \"72\", \"Fat (g)\": \"2\", \"of which saturates (g)\": \"3\", \"Carbohydrates (g)\": \"6\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"12\", \"Salt (mg)\": \"20\"}', '', 'Nuts', 'snacks', '20min'),
(190, 'Monkfish Curry', '[\"800g of monkfish fillet, cut into cubes\", \"4 tomatoes, roughly chopped\", \"200ml of hot water\", \"1 tbsp coconut oil\", \"½xa0tsp of black or brown mustard seeds\", \"½xa0tsp of fenugreek seeds\", \"10 fresh curry leaves or 15 dried\", \"1 inch piece ginger, cut into julienne\", \"1 onion, finely sliced\", \"3-4 green chillies, sliced\", \"½xa0tsp turmeric\", \"1 tsp cumin seeds\", \"3 tsp of coriander seeds\", \"1 tsp of Kashmiri chilli powder\", \"100ml of coconut milk\", \"1 tsp salt\", \"1 lime\"]', '{\"Wash the monkfish cubes and leave to drain.\"}, {\"In a blender, pulse the tomatoes into a purée with 200ml of water and set aside.\"}, {\"Slice the ginger, chillies and onions.\"}, {\"Heat 1 tbsp of coconut oil over a medium heat, then add in the mustard seeds.\"}, {\"Once they are crackling, stir in the fenugreek seeds followed by the curry leaves.\"}, {\"Dont let the fenugreek seeds colour then add the ginger, sliced onions and chillies. Stir and leave to cook until the onions are golden brown (10 minutes).\"}, {\"Stir in the puréed tomatoes and increase the heat.\"}, {\"Crush the cumin and coriander seeds in a pestle and mortar and add to the sauce with the turmeric and chilli powder.\"}, {\"Partially cover the pan and turn up the heat so that it starts to boil, leave the tomatoes to reduce and thicken for about 10-20 minutes.\"}, {\"Turn down the heat and pour in thexa0coconut milk and salt to taste. Bring the curry back to the boil and reduce to a simmer.\"}, {\"Place in the pieces of fish and allow it to cook for about 2-3 minutes untilxa0the fish is just cooked through, then remove from the heat.\"}, {\"Squeeze in the juice of lime and check the seasoning. Serve immediately with some plain Basmati rice.\"}', '{\"Calories\": \"213\", \"Fat (g)\": \"5\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"9\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"3\", \"Protein (g)\": \"33\", \"Salt (mg)\": \"598\"}', '', 'Nuts', 'snacks', '20min'),
(191, 'Keema', '[\"400g lean mince lamb\", \"1 tbsp vegetable oil\", \"1 onion, finely chopped\", \"3 cloves garlic, finely chopped\", \"200g/½xa0tin of tomatoes\", \"2 tsp ginger, grated\", \"½xa0tsp turmeric\", \"1 tspxa0cumin seeds, crushed\", \"1 tspxa0salt\", \"2 chillies, finely chopped\", \"50g frozen peas\", \"10 mushrooms quartered\", \"2 tspxa0garam masala\", \"Handful of fresh coriander, chopped\"]', '{\"Heat oil in a pan and add onion and garlic, cook for about 20 minutes until the onions turn a dark golden brown. If the onion catches the bottom of the pan reduce the heat down a little and add a dash of hot water and continue to cook down.\"}, {\"Once dark brown add the tomatoes, ginger, salt, turmeric, cumin and chilli.\"}, {\"Stir together, use your spoon to mash the tomatoes and onions to create a masala paste. Ensure the sauce and spices come together leaving a thick shiny paste.\"}, {\"Turn the heat up and add the mushrooms to cook for 5 minutes. Add thexa0mince and stir through coating all the mince with the sauce.\"}, {\"Leave to cook for 5 minutes then stir in thexa0peas, reduce heat, cover and leave to cook for another 5 minutes.\"}, {\"Turn the heat up and fry for a few minutes to reduce any liquid that might be present.\"}, {\"Add a teaspoon of garam masala and the fresh coriander to finish\"}', '{\"Calories\": \"323\", \"Fat (g)\": \"15\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"15\", \"of which sugars (g)\": \"7\", \"Fibre (g)\": \"4\", \"Protein (g)\": \"35\", \"Salt (mg)\": \"733\"}', '', 'Nuts', 'snacks', '20min'),
(192, 'Saffron Potatoes', '[\"4 large potatoes\", \"1 tbsp oil\", \"290ml boiling water\", \"pinch of saffron strands\", \"salt to taste\", \"1 tsp garam masala\", \"1 tsp chilli flakes\"]', '{\"Pour boiling water into a jug and add the saffron.\"}, {\"Wash and scrub potatoes then cut into chunky wedges with the skin left on.\"}, {\"In a large non-stick frying pan or oven tray heat the vegetable oil. Once hot add the wedges and saute then until they are starting to brown (about five minutes).\"}, {\"Add the salt, pepper, garam masala to coat the potatoes.\"}, {\"Then add the chilli flakes and pour in the saffron water.\"}, {\"Simmer this on a rapid heat for about six or seven minutes.\"}, {\"Reduce the heat and leave the potatoes to cook gently for about 15 minutes until the potatoes are soft and most of the water has evapourated.\"}', '{\"Calories\": \"143\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"27\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"83\"}', '', 'Nuts', 'snacks', '20min'),
(193, 'Mango Chutney', '[\"3 tbsp vegetable oil\", \"1 tsp cumin seeds\", \"1 tsp kalonji seeds\", \"8 cardamom pods, (you can use the seeds only and discard the husks)\", \"3 cloves\", \"5 garlic cloves, crushed\", \"2.5cm piece of ginger peeled & grated\", \"5-6 green mangoes ripe (approx. 250-300g each)\", \"1 tsp red chilli flakes\", \"1 tsp Kashmiri chilli powder\", \"½ tsp turmeric powder\", \"½ tsp ginger powder\", \"250ml cider vinegar\", \"150-250g jaggery/brown sugar (I used 150g)\", \"2 tsp salt flakes\", \"2 red chilli, sliced (increase for more kick)\"]', '{\"Heat oil and add the cumin, cardamom seeds and cloves for a few seconds until they become aromatic.\"}, {\"Add the kalongi seeds\"}, {\"Add the ginger and garlic and stir for a few seconds.\"}, {\"Add the diced mango pieces with the chilli flakes, chilli powder, turmeric, ginger powder, brown sugar, salt and cider vinegar and stir until the sugar dissolves.\"}, {\"Bring to the boil and then reduce to a simmer, cooking gently for about 40-50 minutes or until mixture looks syrupy, stirring regularly.\"}, {\"In the meantime sterilize your jars in the oven at 180ºC for 30 minutes.\"}, {\"Stir in the chopped red chilli 20 minutes before the end of cooking.\"}, {\"Put the chutney into hot sterilised jars and seal with lids immediately. Once you open the jar eat it within 4 weeks and store in the fridge.\"}', '{\"Calories\": \"98\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"17\", \"of which sugars (g)\": \"15\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"155\"}', '', 'Nuts', 'snacks', '20min'),
(194, 'Kucha Gosht ki Biryani', '[\"500g leg of lamb, diced\", \"5 black cardamom\", \"5 green cardamom\", \"1 star anise\", \"7cm stick of cassia bark\", \"1 tsp fennel seeds\", \"6 cloves\", \"10 black peppercorns\", \"1 blade of mace\", \"1 tsp coriander seeds\", \"1 tsp cumin seeds.\", \"1 tsp ginger, crushed\", \"1 tsp garlic, crushed\", \"1 tbsp kashmiri chilli powder\", \"1 tsp salt\", \"1 inch piece of ginger, thinly sliced\", \"3 green chillies, slit lengthways\", \"½xa0tsp turmeric\", \"1 tsp garam masala\", \"Handful fresh mint leaves, chopped\", \"5 tbsp Greek yoghurt\", \"3 tbsp ghee\", \"1 tbsp lemon juice\", \"2 onions, sliced into rings\", \"1 tbsp ghee\", \"1 pinch of Saffron\", \"3 tbsp milk\", \"2 cups Tilda Basmati rice, washed until it runs clear\", \"½xa0tsp caraway seeds\", \"½xa0tsp salt\", \"Handful mint leaves, chopped\", \"Handful coriander leaves, chopped\", \"½xa0tsp cardamom powder\", \"½xa0tsp garam masala\", \"1 tsp rose water\", \"1 tsp screwpine water/Kewra water (optional)\", \"1 tbsp ghee\", \"2 tbsp flour\", \"Splash of water\"]', '{\"Place the whole spices in some muslin and tie up into a knot. Place the muslin into a pan with 1L of water and bring to the boil to fragrance the water.xa0Leave to simmer for 10-15 minutes.\"}, {\"Meanwhile, mix the marinade ingredients together in the pan you will be cooking the dish in. Add the meat to the marinade massaging all the favours into the meat and leave.\"}, {\"In a separate pan add onion slices to 1 tbsp ghee and fry gently until a lovely caramelised dark brown colour is achieved. Remove and set to the side.\"}, {\"Put the saffron into 3 tbsp on milk and leave to steep to draw out the colour. Set to one side.\"}, {\"To the fragranced water add the caraway seeds and salt.\"}, {\"Remove the bouquet garnet from the water and add the rice then cook for about 6 minutes, ensure the rice still has a bite to it.\"}, {\"Using a slotted spoon start to bring across half the rice to the dish with the marinating lamb and sprinkle the rice over the top. Try and bring across some of the aromatic cooking water as well with each scoop to add liquid to the dish.\"}, {\"Sprinkle over half the mint and coriander leaves and half the crispy onions, ¼xa0tsp cardamom powder and ¼xa0tsp garam masala.\"}, {\"Pour in the rosewater and the screw pine water.\"}, {\"Bring across the final layer of rice with a little more water.\"}, {\"Top with the remaining mint, coriander and onions.\"}, {\"Sprinkle the saffron milk all over and dot with ghee around the edges of the rice.\"}, {\"Place a heavy lid on the pan and put it on the stove on a high flame for 5 minutes.\"}, {\"To make it really authentic you can seal the pan shut with some dough all around the edges.\"}, {\"Reduce the heat to a very low heat and leave to cook for 30 minutes until the seal has cracked and steam is escaping from the pan. This indicates the dish is nearly cooked. Leave for a further 5-10 minutes then remove from the heat and leave to sit for a couple on minutes before serving.\"}, {\"The rice on the edge of the pan should have a crunchy toasted texture - delicious.\"}', '{\"Calories\": \"164\", \"Fat (g)\": \"5.8\", \"of which saturates (g)\": \"3.1\", \"Carbohydrates (g)\": \"20\", \"of which sugars (g)\": \"1.8\", \"Fibre (g)\": \"0.4\", \"Protein (g)\": \"8.2\", \"Salt (mg)\": \"0.62\"}', '', 'Nuts', 'snacks', '20min'),
(195, 'Sholay', '[\"100g dried chickpeas soaked overnight in 1L of water\", \"1 onion, finely diced\", \"4 cloves of garlic, finely chopped\", \"400g/1 tin of tomatoes\", \"2 tsp ginger grated\", \"1 tsp salt\", \"1 green chilli, chopped\", \"1 tsp turmeric\", \"1 tsp chilli powder\", \"1 tsp dried fenugreek leaves\", \"1 tsp garam masala\", \"1 handful of coriander, chopped\", \"1 lemon\", \"1 or 2 green chillies, chopped to garnish\", \"sliced red onion to garnish\"]', '{\"In the pressure cooker heat oil and add onions and garlic. Fry until golden brown, and if the onions stick just add a dash of water and stir until they have browned.\"}, {\"Reduce the heat and add tomatoes, ginger, chilli, salt, turmeric and fenugreek. Cook this sauce until the onions and tomatoes melt together and you are left with an aromatic masala paste.\"}, {\"Wash the soaked chickpeas and add to the pan, then stir fry for a few minutes.\"}, {\"Add enough hot water to cover the chickpeas and put the lid on the pressure cooker. Bring it to the boil and leave it until it whistles twice, then reduce the heat and let it simmer for 10 minutes.\"}, {\"Remove from heat and leave to cool. DO NOT REMOVE LID. Once cooled remove the lid and check the chickpeas are cooked. If they are still hard, check the water and if you need to add a little more then and put the lid on again and repeat step 4.\"}, {\"Once cooked through place the pan on the heat and stir-fry the chickpeas to reduce and thicken the sauce.\"}, {\"Turn the heat off and squeeze in the juice from 1 lemon and stir in the garam masala.\"}, {\"To garnish sprinkle over the fresh coriander, the finely sliced onions and green chillies.\"}', '{\"Calories\": \"101\", \"Fat (g)\": \"5.2\", \"of which saturates (g)\": \"0.4\", \"Carbohydrates (g)\": \"11\", \"of which sugars (g)\": \"3.2\", \"Fibre (g)\": \"2.2\", \"Protein (g)\": \"4.0\", \"Salt (mg)\": \"0.98\"}', '', 'Nuts', 'snacks', '20min'),
(196, 'Fish Pakora', '[\"400g white fish loin, cut into large chunks\", \"1 tspxa0garam masala\", \"½ tspxa0salt\", \"Juice from ½xa0lime or lemon\", \"1 tbsp ginger, grated\", \"2 cloves garlic, pounded\", \"1 chilli, finely chopped\", \"100g gram flour, sieved\", \"1 tspxa0baking powder\", \"½ tsp salt\", \"1 tsp carom seeds (alternatively use cumin seeds)\", \"1 tsp chilli powder\", \"Handful coriander, chopped\", \"Water\", \"Rapeseed oil for frying\"]', '{\"Remove moisture from the fish by drying on kitchen paper.\"}, {\"Make up a marinade paste with the lime/lemon, salt, ginger, garlic, garam masala and chopped chilli. The marinade should be a dry paste.\"}, {\"Rub the marinade all over the fish and leave refrigerated for at least 30 minutes, but the longer the better.\"}, {\"Sieve the gram flour into a separate bowl and add carom seeds, salt, coriander, chilli powder, baking powder and a little water to make a thick batter. Beat to aerate the mixture.\"}, {\"Heat oil in a wok or karahi to a medium heat. (Note: if the oil is too hot the batter will cook too quickly and the fish will remain uncooked.)\"}, {\"Dip one of the marinated fish pieces into the batter to cover and very gently place in the hot oil. Leave to cook for about three minutes, use a slotted spoon to move the pakora around.\"}, {\"Once crisp and golden brown remove and set on some kitchen paper.\"}, {\"Taste to check the seasoning, adjust if required.\"}, {\"Continue to cook the rest in small batches.\"}, {\"Serve with salad and a wedge of lemon.\"}', '{\"Calories\": \"116\", \"Fat (g)\": \"1.7\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"9.7\", \"of which sugars (g)\": \"0.7\", \"Fibre (g)\": \"1.9\", \"Protein (g)\": \"17\", \"Salt (mg)\": \"0.95\"}', '', 'Nuts', 'snacks', '20min'),
(197, 'Lamb Madras', '[\"400-600g leg of lamb, trimmed and chopped\", \"2 tbsp coriander seeds\", \"1 tsp fenugreek seeds\", \"1 tsp mustard seeds\", \"1 tsp white poppy seeds\", \"1 tsp cumin seeds\", \"1 tsp black peppercorns\", \"½xa0tsp fennel seeds\", \"1 cassia bark stick (about 7cm long)\", \"5 whole cloves\", \"2 tbsp turmeric\", \"1 tsp Kashmiri chilli powder\", \"1 tsp salt or to taste\", \"3 tsp vegetable oil\", \"1 tsp black mustard seeds\", \"10-12 fresh curry leaves\", \"1 onion, finely diced\", \"1 green chilli, finely chopped (2 for more heat)\", \"2 cm ginger, grated\", \"2 cloves garlic, finely chopped\", \"400g / 1 tin plum tomatoes\", \"2 tsp tamarind pulp\", \"1 tsp hot red chilli powder (optional)\", \"Handful fresh coriander\"]', '{\"To create your madras powder combine black peppercorns, cassia, cloves, coriander, fenugreek, mustard, poppy, cumin and fennel seeds, and grind to a fine powder with an electric grinder, blender, or pestle and mortar.\"}, {\"Stir in the turmeric and 1 tsp of Kashmiri chilli powder into the spice blend.\"}, {\"Place the lamb in a large bowl and rub with 2 or 3 tablespoons of madras curry powder and the salt until all the meat is coated. Transfer the remaining powder into a well-sealed jar for another time.\"}, {\"Heat the oil in a large cast iron pan until hot. Add the mustard seeds – once they start to pop, stir in the curry leaves and then the onions.\"}, {\"Soften the onions until they turn dark brown (about 20 minutes) before adding the green chilli and ginger along with the finely chopped garlic.\"}, {\"Keep stirring as the mix has a tendency to catch on the bottom of the pan. If it does catch add a splash of water.\"}, {\"After a few minutes, add the tomatoes, tamarind and if you like it very spicy add a tsp of hot red chilli powder. Bring this to the boil then reduce the heat and simmer to create a thick masala sauce.\"}, {\"Once it is shiny and thick add the lamb to the pan. Stir to coat the meat with the sauce. Reduce the heat to the lowest setting, cover and leave to cook very gently for 40 minutes to 1 hour, until it\"s cooked through.\"}, {\"Stir occasionally until the sauce has thickened and the lamb is tender.\"}', '{\"Calories\": \"376\", \"Fat (g)\": \"17\", \"of which saturates (g)\": \"6\", \"Carbohydrates (g)\": \"19\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"8\", \"Protein (g)\": \"41\", \"Salt (mg)\": \"631\"}', '', 'Nuts', 'snacks', '20min'),
(198, 'Laal Maas', '[\"900g lamb leg, trimmed and chopped\", \"20-30 dried Kashmiri chillies\", \"1 tsp salt\", \"100g Ghee\"]', '{\"Place all the ingredients into a heavy cast iron pan.\"}, {\"Put the lid on and place on a very gentle heat for one hour.\"}, {\"Stir occasionally and if required you can add a little water.\"}', '{\"Calories\": \"520\", \"Fat (g)\": \"40\", \"of which saturates (g)\": \"21\", \"Carbohydrates (g)\": \"2\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"39\", \"Salt (mg)\": \"477\"}', '', 'Nuts', 'snacks', '20min'),
(199, 'Lamb Pitta Toastie', '[\"400g minced lamb,\", \"1 medium onion, very finely diced\", \"1 tsp salt\", \"twist of black pepper\", \"1 chilli, finely chopped\", \"½ tsp red chilli powder (optional)\", \"1 tsp cumin seeds, crushed\", \"2 tsp garam masala\", \"Handful coriander, finely chopped\", \"4 pitta breads\", \"8 slices of chedder cheese\"]', '{\"Using a fork, mix lamb, onion, coriander, cumin, salt, pepper, in a large bowl. Cover and chill for about 20 minutes.\"}, {\"Prepare the griddle pan by smearing on a little oil with some kitchen roll. Then begin to heat to a medium heat.\"}, {\"Open each pitta pocket by cutting along one side.\"}, {\"With a spoon fill each pitta with the spiced lamb. Make sure you spread it right to the edges. Press the pitta closing it up.\"}, {\"Grill the pitta breads until the filling is cooked through and bread is crisp, about 5 minutes per side.\"}', '{\"Calories\": \"508\", \"Fat (g)\": \"27\", \"of which saturates (g)\": \"13\", \"Carbohydrates (g)\": \"0\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"31\", \"Salt (mg)\": \"574\"}', '', 'Nuts', 'snacks', '20min'),
(200, 'Kale and Chickpea Curry', '[\"1-2 tbsp rapeseed oil\", \"½ tsp mustard seeds\", \"1 tsp cumin seeds\", \"1 large onion, diced\", \"4 garlic cloves, crushed\", \"4 plum tomatoes or 200g tinned tomatoes\", \"800g/2 tins of chickpeas,xa0drained and rinsed\", \"1 tsp salt, or to taste\", \"1 heaped tsp coriander seeds, crushed\", \"1 green chilli, chopped\", \"1 tsp red chilli powder\", \"1 tsp turmeric\", \"200g kale, chopped\", \"1 green chilli, sliced for garnish\"]', '{\"Heat the oil in a lidded pan over a medium heat and when it\"s hot add the mustard seeds and then the cumin seeds.\"}, {\"Stir for a minute until you can smell the aroma of the cumin seeds and the mustard seeds stop sizzling, then add the diced onions.\"}, {\"Fry the onions for 15 minutes until they start to brown, then add the garlic. Fry together for 4 minutes before adding the tomatoes, stir and leave to cook for a few minutes. Add a little water if required.\"}, {\"Add the crushed coriander, green chilli, chilli powder, turmeric and salt and leave to cook on a gentle heat until thexa0tomatoes start to break down and create a thick masala sauce (about 10 minutes).\"}, {\"Turn the heat up to thicken the sauce a little if required.\"}, {\"Add the chickpeas and stir to coat them with the masala. Add a splash of water and let themxa0simmer for 5 minutes.\"}, {\"Add the chopped kale, a handful at a time, stirring in between. Leave this to cook for 5 minutes until kale is soft and tender. Top with the sliced chilli and serve withxa0poorixa0with some fresh plain yoghurt.\"}', '{\"Calories\": \"272\", \"Fat (g)\": \"9\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"34\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"13\", \"Protein (g)\": \"14\", \"Salt (mg)\": \"1012\"}', '', 'Nuts', 'snacks', '20min'),
(201, 'Mackerel Fry', '[\"5 black peppercorns\", \"1 tsp chilli powder\", \"1 tsp cumin seeds\", \"1 tsp coriander seeds\", \"½xa0tsp turmeric\", \"salt to taste\", \"1 lemon\", \"3cm piece ginger, crushed\", \"2 cloves garlic, crushed\", \"2 whole mackeral\", \"1 tsbp vegetable oil\"]', '{\"In a pestle and mortar crush the pepper, cumin, and coriander seeds and place into a bowl\"}, {\"Then crush the ginger and garlic and add to the bowl as well.\"}, {\"Mix in the chilli, turmeric, salt and juice from the lemon to make a paste.\"}, {\"Put slits down the sides of the fish and smear the paste over the fish\"}, {\"Cook the fish in a frying pan on a gentle heat for about 4-5 mins on each side\"}, {\"Pour the oil over the fish at the end and it will crisp up and serve with a radish salad\"}', '{\"Calories\": \"177\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"2.6\", \"Carbohydrates (g)\": \"0.6\", \"of which sugars (g)\": \"0.3\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"0.78\"}', '', 'Nuts', 'snacks', '20min'),
(202, 'Saag Aloo', '[\"1 tbsp mustard oil\", \"1 tsp mustard seeds\", \"1 tsp cumin seeds\", \"Pinch asafoetida\", \"2 garlic cloves, sliced\", \"1 tbsp ginger, thinly sliced\", \"2 tomatoes, chopped\", \"600g baby spinach, finely sliced\", \"4 potatoes, peeled & chopped into 3cm cubes (go for floury potatoes such as maris pipers, waxy ones will take longer to cook)\", \"1 tsp salt or to taste\", \"1 or 2 chillies, finely sliced\", \"1 tsp garam masala\"]', '{\"Heat the oil in a karahi or wok. Add the mustard seeds, and just as they begin to pop, add the cumin seeds and asafoetida.\"}, {\"Add the garlic and ginger and fry for a few minutes on a gentle heat. Then stir in the tomatoes, chilli and salt to taste.\"}, {\"Cook the tomatoes on the same heat until they have turned to a soft pulp. Then add the cubed potatoes and stir them gently to coat them in the sauce. Don\"t be too heavy-handed as you don\"t want to mash the cooked potatoes.\"}, {\"Reduce the heat and place a lid on the pan. Cook for about 10 minutes, remembering to stir occasionally. You may need to add a splash of water halfway through to stop the potatoes sticking to the pan and leave to cook.\"}, {\"Once the potatoes have just turned soft (time depends on the potatoes your have used) , add the spinach to the pan and stir gently.\"}, {\"Cook for a further few minutes until the spinach has wilted down. If there is any liquid in the pan at this point, just increase the heat to dry the dish out.\"}, {\"Sprinkle the garam masala over the top before serving.\"}', '{\"Calories\": \"48\", \"Fat (g)\": \"1.9\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"6.2\", \"of which sugars (g)\": \"1.5\", \"Fibre (g)\": \"1.6\", \"Protein (g)\": \"2.3\", \"Salt (mg)\": \"0.76\"}', '', 'Nuts', 'snacks', '20min'),
(203, 'Plain Basmati Rice', '[\"1 mug of washed basmati rice\", \"2 mugs of cold water\"]', '{\"Wash the rice till the water runs clear - this is done by putting the rice in a pan stirring and draining, repeat and wash again until the water is clear. You will need to do this a few times. I always measure my rice in a mug (a standard mug will feed 3-4 people) and you will need twice the amount of water to rice to cook them perfectly.\"}, {\"Put your washed rice in a wide based pan and add twice the amount of cold water.\"}, {\"Begin to heat up the pan and bring it to a rolling boiling. Reduce the heat to the lowest setting possible and put the lid on the pan. Leave to cook for exactly 12 minutes. However tempted you maybe do not remove the lid.\"}, {\"After 12 minutes remove from the heat, take the lid off and leave for a few minutes.\"}, {\"All the water will have been absorbed and each grain will be separate - using a fork gently fluff up the rice don\"t just plunge straight in with a spoon\"}', '{\"Calories\": \"176\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"39\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"4\", \"Salt (mg)\": \"0\"}', '', 'Nuts', 'snacks', '20min'),
(204, 'Radish and Lemon Salad', '[\"10-12 radishes\", \"1 handful coriander leaves\", \"½xa0green chilli\", \"1 tsp cumin seeds\", \"2cm piece ginger, grated\", \"1 lemon\", \"Salt to taste\", \"splash of olive oil (optional)\"]', '{\"Finely slice the radishes and place them into a bowl\"}, {\"Chop the coriander leaves and chilli and add to the bowl\"}, {\"Toast the cumin seeds in a dry pan until you can smell their aroma then crush the seeds in a pestle and mortar. Sprinkle into the same bowl with the radish.\"}, {\"Grate in the ginger, and squeeze in the lemon juice (and oil if using).\"}, {\"Sprinkle in a little salt and mix everything together.\"}', '{\"Calories\": \"42\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"3\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"1\", \"Salt (mg)\": \"79\"}', '', 'Nuts', 'snacks', '20min'),
(205, 'Dhal Makhani', '[\"100g dry urid dhal (whole black lentils)\", \"25g dry rajma (kidney beans)\", \"1-2 tbsp vegetable oil\", \"1 tsp cumin seeds\", \"2 medium sized onions, finely chopped\", \"3cm piece ginger, crushed\", \"3 garlic cloves, crushed\", \"3 fresh tomatoes,xa0puréed\", \"2 green chillies, slit inxa0½\", \"½xa0tsp turmeric powder\", \"1 tsp chilli powder\", \"2 tsp coriander seeds, crushed\", \"1 tsp of garam masala\", \"1 tsp dried fenugreek leaf (kasoori methi)\", \"Salt to taste\", \"1-2 tbsp butter\", \"Handful fresh coriander leaves, chopped\"]', '{\"Clean, wash and soak the black lentils and kidney beans separately, overnight.\"}, {\"Drain and keep aside. Combine the two dhals and add 2 cups of water with a little salt and put into a pressure cooker and cook for about 25 minutes until they are cooked and soft. (DO NOT REMOVE the lid of the pressure cooker until fully cooled and pressure has been released.)\"}, {\"Heat the oil in a pan and add cumin seeds.\"}, {\"When the cumin seeds crackle, add chopped onions and garlic.\"}, {\"Fry the onion until golden brown over a medium flame.\"}, {\"Stir in the tomato purée, add the turmeric, chilli powder, ginger, green chillies and crushed coriander.\"}, {\"Cook for a few minutes so the onions and tomatoes melt together.\"}, {\"Add the cooked dhal and 1 cup of water and season with a little salt to taste.\"}, {\"Leave to simmer for 15 minutes until it is lovely and thick. (Take care as it may catch on the bottom of the pan.)\"}, {\"Stir in the butter, garam masala and fenugreek to make the dhal rich and delicious.\"}, {\"Garnish with a sprinkle of fresh coriander and serve.\"}', '{\"Calories\": \"102\", \"Fat (g)\": \"3.4\", \"of which saturates (g)\": \"1.8\", \"Carbohydrates (g)\": \"13\", \"of which sugars (g)\": \"3.4\", \"Fibre (g)\": \"1.5\", \"Protein (g)\": \"6.2\", \"Salt (mg)\": \"1.1\"}', '', 'Nuts', 'snacks', '20min'),
(206, 'Indian Slaw', '[\"2-3 medium carrots, peeled and coarsely shredded\", \"half a white cabbage, cored and finely shredd\", \"1 red onion, halved and finely sliced\", \"3 tbsp Greek yogurt\", \"2 tbsp mayonnaise\", \"Juice of half a lemon,\", \"½-1 red chilli (or to taste),xa0finely sliced\", \"½ tsp cumin seeds, toasted\", \"½ tsp Kashmiri chilli powder\", \"1 tsp turmeric\", \"½ tsp salt (or to taste)\", \"handful of fresh coriander, chopped\", \"40g cashews, toasted\"]', '{\"In a large bowl, mix the carrots, cabbage and onion.\"}, {\"Toast the cumin seeds in a dry pan until aromatic and keep to one side\"}, {\"Toast the cashew nuts until golden and set a side.\"}, {\"Mix the yogurt, mayonnaise, lime juice, chopped chilli, toasted cumin seeds, turmeric, chilli powder, salt and tip into the shredded veg mix. Stir to mix everything together.\"}, {\"Stir in half the coriander and half the cashews. Top with remaining coriander and cashews just before serving.\"}', '{\"Calories\": \"11\", \"Fat (g)\": \"0\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"3\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"1\", \"Protein (g)\": \"0\", \"Salt (mg)\": \"272\"}', '', 'Nuts', 'snacks', '20min'),
(207, 'Vegetable Pilau', '[\"50g peas\", \"1 carrot (diced small)\", \"100g mixed vegetables - mushrooms, cauliflower, sweetcorn etc\", \"1 tbsp vegetable oil\", \"2 medium onions, chopped\", \"1 garlic clove, chopped\", \"1 tbsp fresh ginger, grated\", \"2 green chillies, chopped\", \"2 bay leaves\", \"5cm stick cassia bark\", \"1 tbsp cumin seeds\", \"1 tbsp coriander seeds\", \"1 tbsp whole black peppercorns\", \"1 tsp salt\", \"4 cardamoms\", \"3 cloves\", \"2 black cardamom\", \"Handful of mint leaves, chopped\", \"Handful of coriander, chopped\", \"250g basmati rice, washed\", \"500ml water\", \"2 pinches of saffron threads\", \"5 tbsp of milk or warm water\"]', '{\"Wash the rice until water runs clear and set to one side.\"}, {\"In a small bowl add the saffron strands and pour in a splash milk. Leave the saffron to steep.\"}, {\"Heat the oil and add the bay leaves, cassia bark, peppercorns, cumin seeds, cardamoms, black cardamom, cloves and stir-fry for 2 minutes until the spices become aromatic.\"}, {\"Add chopped onions and cook until soft. Stir in the salt and cook until the onion just begin to turn golden then stir in the ginger, garlic, green chilli,xa0mint and coriander leaves.\"}, {\"Add the mixed vegetables. Stir to coat and cook for a few minutes.\"}, {\"Add the washed rice and stir through very gently. Add the water and bring to the boil.\"}, {\"Reduce the heat to the lowest setting and place the lid on the pan and leave to cook for 10 minutes. Splash the saffron milk on the rice and leave the lid on the pan for a few more minutes.\"}, {\"Remove the lid and fork through the rice and serve.\"}', '{\"Calories\": \"141\", \"Fat (g)\": \"0.9\", \"of which saturates (g)\": \"0.1\", \"Carbohydrates (g)\": \"30\", \"of which sugars (g)\": \"2.3\", \"Fibre (g)\": \"0.8\", \"Protein (g)\": \"4.4\", \"Salt (mg)\": \"0.89\"}', '', 'Nuts', 'snacks', '20min'),
(208, 'Soya curry', '[\"1 tbsp vegetable oil\", \"1 onion, finely chopped\", \"3 garlic cloves, chopped\", \"3cm piece of ginger, grated\", \"250g tinned plum tomatoes\", \"1 green chilli, finely chopped\", \"1 tsp salt\", \"1 tsp fenugreek powder (methi)\", \"1 tsp turmeric\", \"1 tsp chilli powder\", \"200g peas\", \"200g dried soya chunks\", \"1 red pepper, sliced\", \"1 tsp garam masala\", \"Handful of fresh coriander (chopped)\"]', '{\"Soak the soya chunks in boiling water for 10-20 minutes until they are soft.\"}, {\"Heat oil in a pan and add onion and after a few minutes stir in the garlic. Cook for about 10 minutes until the onions are soft and just turning golden.\"}, {\"When the onions are cooked add the tomatoes, ginger, salt, turmeric, fenugreek and chilli.\"}, {\"Stir together and cook the sauce until the tomatoes and onion melt together creating a thick masala paste.\"}, {\"Squeeze the water out of the soya (be mindful that the water may still be hot).\"}, {\"Once the masala is thick and shiny add the soya and frozen peas.xa0Stir and cook for 5 minuets.\"}, {\"Add the peppers and cook for 5-6 minutes. If you want to create a little sauce add some hot waterxa0to get the consistency of the sauce that you are looking for.\"}, {\"Sprinkle in the garam masala and fresh coriander to serve.\"}', '{\"Calories\": \"128\", \"Fat (g)\": \"3.5\", \"of which saturates (g)\": \"0.4\", \"Carbohydrates (g)\": \"7.9\", \"of which sugars (g)\": \"4.2\", \"Fibre (g)\": \"1.4\", \"Protein (g)\": \"17\", \"Salt (mg)\": \"4.6\"}', '', 'Nuts', 'snacks', '20min'),
(209, 'Paneer with Mixed Vegetables', '[\"400g paneer\", \"50g frozen peas\", \"½xa0red pepper, chopped into chunks\", \"½xa0green pepper, chopped into chunks\", \"5 mushrooms, chopped into chunks\", \"1 onion, sliced thinly\", \"4 cloves of garlic, chopped finely\", \"1 tbsp ginger, grated\", \"1 chilli, finely chopped\", \"200ml tinned plum tomatoes\", \"½xa0tsp turmeric\", \"1 tsp cumin seeds, ground\", \"1 tsp chilli powder\", \"1 tsp salt\", \"1 tsp fenugreek\", \"Handful fresh coriander,xa0chopped\", \"1 tsp garam masala\", \"4 spring onions, finely sliced\"]', '{\"Heat oil in a pan and add the sliced onions then gently cook until the onions have softened a little.\"}, {\"Add the chopped garlic and stir. Leave to cook until the onions slightly brown.\"}, {\"Stir in the tomatoes, grated ginger, salt, turmeric, fenugreek and chopped chilli.\"}, {\"Leave these to reduce and blend together - this is you masala paste.\"}, {\"Once the masala is think and shiny add the mixed vegetables and stir.\"}, {\"Crumble the paneer into the pan and stir to coat with the masala.\"}, {\"Cook for 5-10 minutes (add a little splash of water if it seems too dry). The paneer should have the consistency of scrabbled eggs. Once heated through remove from the heat.\"}, {\"Sprinkle with garam masala, chopped coriander and finely sliced spring onions and serve with roti.\"}', '{\"Calories\": \"46\", \"Fat (g)\": \"3.4\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"3.0\", \"of which sugars (g)\": \"1.8\", \"Fibre (g)\": \"0.8\", \"Protein (g)\": \"1.1\", \"Salt (mg)\": \"0.72\"}', '', 'Nuts', 'snacks', '20min'),
(210, 'Moong Masoor di Dhal', '[\"100g of split red lentils washed\", \"100g split mung beans washed\", \"900ml water 1 tsp salt\", \"1 tbsp ghee , butter or oil\", \"1 tsp cumin seeds\", \"1 bay leaf\", \"1 small onion, chopped\", \"1 garlic clove, chopped\", \"2 tomatoes, finely chopped\", \"1 tsp ginger, grated\", \"1 tsp turmeric\", \"1 chilli, finely chopped\", \"1 tsp garam masala\", \"1 or 2 whole red chillis to garnish\", \"Handful of coriander, chopped\"]', '{\"Place the red lentils in a pan with the salt, cover with the water and bring to the boil.\"}, {\"Remove the froth and add the split mung beans.\"}, {\"Reduce the heat and put the lid on the pan - leave to simmer for 15 minutes.\"}, {\"Check the lentils are cooked by squeezing them between your fingers. Once soft remove from the heat.\"}, {\"In a frying pan heat the oil or butter.\"}, {\"Using a fork pierce the red chillis and add to the pan with a bay leaf and the cumin seeds. When the seeds sizzle, remove the chilli and set to one side for your garnish.\"}, {\"Add the onion and garlic and fry until lightly browned.\"}, {\"Reduce the heat and add the tomatoes, ginger, turmeric, and the chopped chilli. Gently let the ingredients cook down to make a thick dry paste (10 mins).\"}, {\"Add a ladle full of the cooked lentils (dhal) to the masala paste in the frying pan and stir together, then empty all the contents back into the pan with the lentils and stir.\"}, {\"It should have the consistency of a thick soup but if it\"s too thick just add a little boiling water and remove from the heat.\"}, {\"Stir in the garam masala, coriander and top with the whole chillis to serve.\"}', '{\"Calories\": \"173\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"2\", \"Carbohydrates (g)\": \"27\", \"of which sugars (g)\": \"6\", \"Fibre (g)\": \"6\", \"Protein (g)\": \"10\", \"Salt (mg)\": \"11\"}', '', 'Nuts', 'snacks', '20min'),
(211, 'Spiced Cauliflower Rice', '[\"1 medium cauliflower, shredded\", \"1 tbsp rapeseed oil\", \"1 tsp black mustard seeds\", \"1 tsp cumin seeds\", \"2 dried Kashmiri chillies, each broken into 3 or 4 pieces\", \"5cm piece ginger, finely grated\", \"1 garlic clove, sliced\", \"½ tsp turmeric\", \"1 tsp salt\", \"2 fresh green chillies, sliced\"]', '{\"Roughly chop your cauliflower, put into a blender and blitz very quickly to get a fine shred of cauliflower.\"}, {\"Heat the oil in a large saucepan or karahi. When it is hot, add the mustard seeds followed by the cumin seeds and dried chillies.\"}, {\"Stir for about 30 seconds, then add the sliced garlic, grated ginger, turmeric and salt and fry for 30 seconds.\"}, {\"Stir in the cauli rice and stir-fry for about 3-4 minutes over a medium heat. Stir in the green chillies.\"}', '{\"Calories\": \"91\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"12\", \"of which sugars (g)\": \"5\", \"Fibre (g)\": \"6\", \"Protein (g)\": \"4\", \"Salt (mg)\": \"635\"}', '', 'Nuts', 'snacks', '20min'),
(212, 'Lamb Dhansak', '[\"500g leg of lamb, trimmed and cut into chunks\", \"60g toor dhal split\", \"60g masoor dhal split\", \"60g urid dhal split\", \"1 small aubergine, chopped into large chunks\", \"½ small pumpkin, chopped into large chunks (you could also use butternut squash or sweet potato)\", \"1 medium onion, chopped in chunks\", \"15 fresh mint leaves, chopped\", \"1 tsp cumin seeds\", \"1 tsp coriander seeds\", \"4cm stick cassia bark\", \"4 green cardamoms\", \"4 whole black peppercorns\", \"1 tbsp dry fenugreek leaves\", \"6 cloves garlic\", \"3cm piece of ginger\", \"2 chillies\", \"2 tbsp oil\", \"2 medium onions, diced\", \"3 tomatoes, diced\", \"1 tsp salt\", \"1 tsp turmeric powder\", \"1 tbsp tamarind paste\", \"Handful of coriander, chopped\"]', '{\"Put all the lentils, vegetables, onions and mint into a pan with 1L of water and some salt. Bring this to the boil and leave to simmer for 20 minutes until the lentils have cooked through.\"}, {\"Place all the dry spices into a spice grinder and blend to a fine powder.\"}, {\"Place this powder into a blender with the garlic, ginger and chillies and grind to make an aromatic paste. Add a splash of water to loosen if required.\"}, {\"Heat the oil and start to fry the diced onions until they are golden brown (approx. 20 minutes).\"}, {\"Once the onions are browned add the spice paste along with the turmeric and fry for a few minutes until golden.\"}, {\"Add the tomatoes and tamarind then stir for about 5 minutes until the masala is thick and glossy.\"}, {\"On a high heat, stir in the lamb and coat with the masala. After about 5 minutes add the cooked lentil mixture and leave this to simmer on a low heat for about 30-40 minutes. Make sure you stir occasionally as this can catch the bottom of the pan.\"}, {\"Once the meat is tender check the seasoning and adjust if required.\"}, {\"Throw in the fresh coriander to serve.\"}', '{\"Calories\": \"84\", \"Fat (g)\": \"2.7\", \"of which saturates (g)\": \"0.2\", \"Carbohydrates (g)\": \"12\", \"of which sugars (g)\": \"3.5\", \"Fibre (g)\": \"1.7\", \"Protein (g)\": \"4.2\", \"Salt (mg)\": \"0.51\"}', '', 'Nuts', 'snacks', '20min'),
(213, 'Zambezi Baked Sea Bream', '[\"2 whole sea bream (sea bass fillets if you prefer)\", \"1 onion, sliced\", \"1 green pepper, chopped\", \"1 tomato, chopped\", \"3 garlic cloves\", \"2cm piece of ginger\", \"1 red chilli\", \"½ tsp salt\", \"Half a lemon\", \"Fresh coriander (optional)\", \"½ tsp chilli flakes\", \"2 tsp coriander seeds\", \"2 tsp cumin seeds\", \"½ tsp black peppercorns\", \"5 curry leaves\", \"½xa0tsp turmeric\", \"1 tsp chilli powder\", \"1 tsp methi/dried fenugreek leaves\", \"1-2 tsbp vegetable oil\"]', '{\"Heat your oven to 180ºC\"}, {\"Remove any scales, clean and wash the fish. With a sharp knife make 3 or 4 slits on the outside of the fish on both sides. Set to one side.\"}, {\"In a pestle and mortar crush the coriander seeds, cumin seeds, black peppercorns and place into a bowl.\"}, {\"Chop the curry leaves and add to the bowl with the turmeric, chilli powder and methi. Stir in the oil to make a paste.\"}, {\"Slice the ginger, garlic and chillies.\"}, {\"Chop the peppers and tomato, slice the onion and mix with the ginger, garlic and chillies.\"}, {\"Smear some of the spice mix inside the fish and then stuff it with the onion mixture. Smear the remaining fish masala all over the outside of the fish.\"}, {\"Place the fish onto some foil and fold it to seal neatly.\"}, {\"Place of a baking sheet and cook forxa020-30 minutes until cooked through. This can also be cooked on the BBQ for a smoky flavour.\"}, {\"Once cooked, remove from the oven and open up the parcel with will be aromatic and delicious. You can put this under a hot grill for a few minutes to crispy up if you want to.\"}, {\"Serve with some cooked rice, a squeeze of lemon juice and a sprinkle of coriander. I also like to add a few chilli flakes.\"}', '{\"Calories\": \"177\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"2.6\", \"Carbohydrates (g)\": \"0.6\", \"of which sugars (g)\": \"0.3\", \"Fibre (g)\": \"0.1\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"0.78\"}', '', 'Nuts', 'snacks', '20min'),
(214, 'Marrow Curry', '[\"1 tbsp rapeseed oil\", \"1 tsp cumin seeds\", \"1 tsp mustard seeds\", \"1 large onion, peeled and chopped\", \"2-3 garlic cloves, peeled\", \"200g tin plum tomatoes\", \"1 tbsp of fresh ginger, grated\", \"1-2 green chillies, chopped\", \"½xa0tsp turmeric\", \"½ tsp chilli powder\", \"1xa0tsp salt\", \"1 large marrow (approx 1-1.5kg)\", \"1 tsp garam masala\", \"handful fresh coriander\"]', '{\"Heat oil and add the cumin and mustard seeds. Once they sizzle and become fragrant add the onions. Fry for about 6-7 minutes until they become translucent and just golden brown.\"}, {\"Add the garlic and cook on a gentle heat for a few minutes. In the meantime, wash and chop the marrow into 3-4cm chunks. If your marrow is an older marrow then you may also need to peel it as the skin can be tough. You may also need to remove the seeds and soft central part of the marrow.\"}, {\"Add the tomatoes to the pan and stir in the grated ginger, chilli powder, turmeric, salt, and green chilli. Stir for a few minutes until thexa0masala in thick and shiny.\"}, {\"Add the chopped marrow and bring the pan to a simmer. Cover, then turn the heat to low and cook for about 20-30 minutes. Do check and stir occasionally.\"}, {\"When the marrow has cooked to the texture you like, remove from the heat and add the garam masala and coriander to serve.\"}', '{\"Calories\": \"78\", \"Fat (g)\": \"4\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"9\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"824\"}', '', 'Nuts', 'snacks', '20min');
INSERT INTO `default_recipes` (`drecipe_id`, `drecipe_name`, `drecipe_ingredients`, `drecipe_recipe`, `drecipe_nutritional_information`, `drecipe_img`, `drecipe_category`, `drecipe_course`, `drecipe_time`) VALUES
(215, 'Green Chilli Sauce', '[\"100g large green chillixa0(mild)\", \"100g rocket green chillixa0(hot)\", \"175ml white vinegar\", \"2 tsp cumin seeds\", \"5 cm root ginger\", \"1½ tsp salt\", \"2 pinches asafoetida\", \"3 tbsp oil\"]', '{\"Put some kitchen gloves on and wash the green chillies. Remove the stems and cut it into large chunks.\"}, {\"Wash the ginger and cut it into small bits.\"}, {\"Heat oil in a pan then add the cumin seeds and asafoetida until fragrant.\"}, {\"Add the green chillies and ginger to the pan stir in the salt and cook for 2 minutes.\"}, {\"Pour in 70ml water and put the lid on the pan - leave to cook for about 15 minutes on a gentle heat stirring occasionally.\"}, {\"Once soft (after about 15 minutes) take the lid off and leave to reduce for a few minutes then remove from the heat and leave to cool.\"}, {\"Pour into a blender and blitz. Pour in the vinegar a little at a time and blend.\"}, {\"Once ready store the chilli sauce in a clean, dry jar. This will keep for 2-3 months.\"}', '{\"Calories\": \"112\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"0.7\", \"Carbohydrates (g)\": \"0.9\", \"of which sugars (g)\": \"0.7\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"1.7\", \"Salt (mg)\": \"0.02\"}', '', 'Nuts', 'snacks', '20min'),
(216, 'Sarson Ka Saag', '[\"500g palak/spinach\", \"500g saag mustard leaves if you can find them if not use curly kale or greens (washed and dried thoroughly)\", \"4cm ginger, roughly chopped\", \"5 cloves garlic, whole\", \"1 chilli, roughly chopped\", \"1 tsp salt\", \"1-2 tbsp corn flour to thicken (if required)\", \"4 tomatoes, finely chopped\", \"65g butter\"]', '{\"Wash and slice the spinach and place in the bottom of the pressure cooker.\"}, {\"Wash and finely slice the greens and place on top of the spinach.\"}, {\"Add the ginger, garlic, salt and chilli to the pan and secure the pan lid.\"}, {\"Heat the pressure cooker and bring to temperature. When the cooker whistles twice (should take about 10 minutes) reduce the heat and leave to simmer for about 5 minutes.\"}, {\"Remove from the heat and leave to cool - DO NOT REMOVE THE LID.\"}, {\"Next release the pressure, open the lid and leave to cool for a few minutes.\"}, {\"Using your hand blender blitz the saag. The aim is to have a thick bright green puree, if it\"s a little watery place the cooker back on the stove on a high heat and stir continuously to reduce and thicken.xa0You can also thicken it up by sprinkling with a little corn flour, but I prefer not to.\"}, {\"In a frying pan melt the butter and add the chopped tomatoes. Fry gently until the tomatoes have cooked down to a pulp and you have a thick tomato paste.\"}, {\"Stir into the saag, check seasoning and serve.\"}', '{\"Calories\": \"53\", \"Fat (g)\": \"4.0\", \"of which saturates (g)\": \"2.2\", \"Carbohydrates (g)\": \"2.3\", \"of which sugars (g)\": \"2.0\", \"Fibre (g)\": \"1.6\", \"Protein (g)\": \"2.1\", \"Salt (mg)\": \"0.70\"}', '', 'Nuts', 'snacks', '20min'),
(217, 'Sprouts with Cumin and Mustard', '[\"500g sprouts, cleaned and halved\", \"1 tbsp ghee\", \"2 tsp cumin seeds\", \"2 tsp mustard seeds\", \"2 onions, peeled and finely chopped\", \"1 tbsp ginger, minced\", \"1 tbsp garlic, minced\", \"1 tsp chilli powder or to taste\", \"salt to taste\"]', '{\"Heat ghee and add cumin and mustard seeds until they pop.\"}, {\"Add onions and cook for about 5-10 mins until just browning.\"}, {\"Add the ginger and garlic and cook for a few more minutes.\"}, {\"Stir in chilli powder and salt.\"}, {\"Add the sprouts with a little water and cook for about 5 mins until cooked (I like to leave mine a little crisp).\"}', '{\"Calories\": \"50\", \"Fat (g)\": \"1\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"10\", \"of which sugars (g)\": \"4\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"2\", \"Salt (mg)\": \"33\"}', '', 'Nuts', 'snacks', '20min'),
(218, 'Kedgeree', '[\"2 large free-range eggs\", \"700g smoked haddock fillets, boned\", \"2 fresh bay leaves\", \"170g basmati rice\", \"salt to taste\", \"½xa0tbsp ghee\", \"3cm piece fresh ginger, grated\", \"1 bunch of spring onions, finely chopped\", \"1 clove garlic, peeled and finely chopped\", \"1 tsp cumin seeds, crushed\", \"½xa0tsp turmeric\", \"2 tsp mustard seeds\", \"2 tomatoes, finely chopped\", \"juice of 2 lemons\", \"2 good handfuls fresh coriander, chopped\", \"1 fresh red chilli, finely chopped\"]', '{\"Boil the eggs for 10 minutes, then hold under cold running water.\"}, {\"Put the fish and bay leaves in a shallow pan with enough water to cover. Bring to the boil, cover and simmer for about 5 minutes, until cooked through. Remove from the pan and leave to cool. Remove the skin from fish, flake into chunks and set aside.\"}, {\"Cook the rice in water for about 10 minutes and drain. Fork through and leave to cool leave in the fridge until needed.\"}, {\"Melt the ghee in a pan over a low heat and add the mustard and cumin seeds.\"}, {\"Stir in the ginger, onion and garlic. Soften for about 5 minutes, and add the turmeric, salt and chilli. Cook for a further few minutes, then add the chopped tomatoes and lemon juice.\"}, {\"Stir in the cooked rice and heat through then add the fish. Once piping hot remove from the heat and add the fresh coriander.\"}, {\"Slice the eggs into quarters and place on top of the rice to serve.\"}', '{\"Calories\": \"113\", \"Fat (g)\": \"2.1\", \"of which saturates (g)\": \"0.7\", \"Carbohydrates (g)\": \"11\", \"of which sugars (g)\": \"0.7\", \"Fibre (g)\": \"0.2\", \"Protein (g)\": \"13\", \"Salt (mg)\": \"1.1\"}', '', 'Nuts', 'snacks', '20min'),
(219, 'Tamarind Ribs', '[\"100g tamarind pulp\", \"650ml boiling water\", \"8 cloves garlic, minced\", \"4cm piece of ginger, grated\", \"2 tsp coriander seeds, crushed\", \"2 star anise\", \"2 chillies, finely chopped\", \"100ml soy sauce\", \"100g brown sugar\", \"2 whole rack of pork ribs\"]', '{\"Place the tamarind pulp in a bowl, and add the boiling water. Let it soak for 15 minutes then mash it up using a fork. Sieve the tamarind water into a bowl and discard all the solids.\"}, {\"Into a roasting tray big enough to hold the ribs pour in the tamarind liquid, garlic, ginger, soy sauce, crushed coriander, star anise, chopped chillies and brown sugar. Stir until all the sugar dissolves.\"}, {\"Using a knife scrape the underside of the ribs on one end and you will see there is a transparent membrane present. Pull this membrane (use a cloth for grip) from the back of the ribs to remove it. Then place the ribs in the roasting tray and coat with the marinade. Cover and refrigerate for as long as possible - overnight is best.\"}, {\"Preheat the oven to 160ºC and cover the tray tightly with foil.\"}, {\"Cook the ribs until the meat starts to pull away easily from bones (about 2-3 hours).\"}, {\"Remove the tray from the oven and increase the heat to 180ºC.\"}, {\"Pour the juices from the tray into a saucepan, skim off any excess fat and boil the juices over a medium heat for about 15 minutes until it reduces and thickens. Pour half into a small bowl as a dipping sauce for later.\"}, {\"Brush the remaining sauce over the ribs and place back in the hot oven until the ribs are black and bubbling (about 5 minutes).\"}, {\"Brush with any remaining tamarind sauce and leave for a few minutes before cutting into single rib portions.\"}, {\"Serve with the dipping sauce.\"}', '{\"Calories\": \"196\", \"Fat (g)\": \"11\", \"of which saturates (g)\": \"4.4\", \"Carbohydrates (g)\": \"7.6\", \"of which sugars (g)\": \"7.4\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"0.99\"}', '', 'Nuts', 'snacks', '20min'),
(220, 'Tangy Tamarind Prawns', '[\"500g fresh king prawns\", \"2 tbsp oil\", \"1 tsp cumin seeds\", \"1 onion, finely sliced\", \"2 cloves of garlic, finely chopped\", \"200g tinned tomatoes (½ tin)\", \"1 tbsp ginger, grated\", \"1 tsp turmeric\", \"1 tsp salt\", \"1 chilli, finely chopped\", \"1 tbsp tamarind paste (alternatively a good squeeze of lemon juice)\", \"1 tsp of garam masala\", \"2 fresh tomatoes, finely diced\", \"Handful of chopped coriander\"]', '{\"Heat the oil in a pan. Add the cumin seeds, when sizzling add the onion and garlic. Fry gently until golden brown.\"}, {\"Once browned, reduce the heat and add the tinned tomatoes, ginger, turmeric, salt, chilli and tamarind paste. Increase the heat and stir so the tomatoes and onions melt together creating a thick masala sauce.\"}, {\"Once the sauce is shiny, add the prawns and stir to coat them with the sauce. Reduce the heat and cook through for a few minutes.\"}, {\"Add in the fresh tomatoes, stir and cook for a minute then remove from the heat.\"}, {\"Stir in the garam masala and throw in the coriander to add a beautiful freshness to the dish and serve.\"}', '{\"Calories\": \"77\", \"Fat (g)\": \"3.4\", \"of which saturates (g)\": \"0.3\", \"Carbohydrates (g)\": \"2.5\", \"of which sugars (g)\": \"2.0\", \"Fibre (g)\": \"0.4\", \"Protein (g)\": \"9.3\", \"Salt (mg)\": \"0.90\"}', '', 'Nuts', 'snacks', '20min'),
(221, 'Halibut with Indian spices', '[\"2 tsp cumin seeds\", \"2 tsp coriander seeds\", \"2 tsp fennel seeds\", \"4 cloves\", \"1 tsp turmeric\", \"½ tsp chilli powder (add more for more heat)\", \"4 halibut fillets or steaks (approx 140g each)\", \"1-3 tbsp mustard oil\"]', '{\"In a dry cast-iron pan, toast the cumin, coriander, fennel, and cloves over medium heat until fragrant, about two minutes. Leave to cool for a few minutes.\"}, {\"Transfer to a spice grinder or a mortar and grind to a fine powder. Put the ground spices in a small bowl and add the turmeric and chilli powder.\"}, {\"Lay the halibut on a baking sheet and season with salt and pepper. Drizzle with the mustard oil. Sprinkle the spice mixture over the fish, then massage it in. Cover and refrigerate for an hour. Bring the fish to room temperature before cooking.\"}, {\"Fry the halibut for 3 minutes on each side, until it\"s just opaque throughout. You can also cook the fish under a grill or baked it in the oven at 180°C for 10 minutes.\"}', '{\"Calories\": \"128\", \"Fat (g)\": \"5.7\", \"of which saturates (g)\": \"0.6\", \"Carbohydrates (g)\": \"0.0\", \"of which sugars (g)\": \"0.0\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"20\", \"Salt (mg)\": \"0.15\"}', '', 'Pasta', 'dinner', '20min'),
(222, 'Pomegranate Raita', '[\"250g plan Greek yoghurt\", \"½ tsp roasted cumin\", \"1 tsp jaggery (or brown sugar)\", \"2 tbsp pomegranate seeds\", \"2 tbsp grated cucumber\", \"½xa0tsp salt\"]', '{\"Put the yoghurt into a bowl and beat it a little to aerate.\"}, {\"Toast the cumin seeds in a frying pan until fragrant then add to the yoghurt.\"}, {\"Mix all the other ingredients and stir through\"}', '{\"Calories\": \"122\", \"Fat (g)\": \"8.7\", \"of which saturates (g)\": \"5.7\", \"Carbohydrates (g)\": \"6.6\", \"of which sugars (g)\": \"6.2\", \"Fibre (g)\": \"0.3\", \"Protein (g)\": \"5.0\", \"Salt (mg)\": \"0.32\"}', '', 'Pasta', 'dinner', '20min'),
(223, 'Paneer Makhani', '[\"400g paneer, diced\", \"2 medium red onion, roughly chopped\", \"2-3 green chillies, roughly chopped\", \"1 tsp ginger, grated\", \"4 cloves garlic, peeled and roughly chopped\", \"4cm stick of cassia bark\", \"4 green cardamom pods\", \"3 cloves\", \"5 whole black peppercorns\", \"7 ripe red tomatoes roughly chopped/400g tin plum tomatoes\", \"3 tbsp ghee\", \"1 tbsp cumin\", \"2 tsp coriander seeds, crushed\", \"½xa0tsp turmeric\", \"1 tsp Kashmiri chilli powder\", \"1 tsp salt\", \"1 tsp kasoori methi (fenugreek)\", \"2-4 tbsp greek style yogurt or cream\", \"1 cup hot water\", \"1 tbsp honey\", \"knob of butter\", \"10ml cream\", \"Handful of fresh coriander leaves, chopped\"]', '{\"Put onion, ginger, garlic, chillies, green cardamom, black pepper, cassia bark, salt into a pan and cover with water (approx. 1L) and bring to the boil.\"}, {\"Add a tin of tomatoes to the pan and leave to simmer for 15-20 min on medium heat stirring occasionally.\"}, {\"After the sauce has reduced and the mixture has come to a thick saucy consistency remove it from heat. Let the mixture cool down remove the cassia bark and discard.\"}, {\"Blend to a fine sauce, for a very smooth sauce you can strain it through a sieve.\"}, {\"In a second pan heat the ghee and add the cumin seeds. As soon as they crackle stir in the tomato sauce very carefully.\"}, {\"Fry the sauce then stir in turmeric, Kashmiri chilli, crushed coriander, dried fenugreek and stir for 2-3 minutes.\"}, {\"Once the sauce has thickened reduce the heat and stir in the yoghurt or cream, honey and butter.\"}, {\"Cook for a minute or two andxa0add the fresh homemade paneer. Stir to coat with the sauce then leave to simmer for 5 minutes on a gentle heat. Add a little hot water to loosen the sauce if required and the honey.\"}, {\"Garnish with coriander leaves and top with a dash of cream before serving.\"}', '{\"Calories\": \"72\", \"Fat (g)\": \"4.9\", \"of which saturates (g)\": \"2.9\", \"Carbohydrates (g)\": \"6.2\", \"of which sugars (g)\": \"5.4\", \"Fibre (g)\": \"1.2\", \"Protein (g)\": \"2.2\", \"Salt (mg)\": \"0.82\"}', '', 'Pasta', 'dinner', '20min'),
(224, 'Tandoori Style Pigeon Breast', '[\"8 pigeon breasts\", \"4 cloves garlic\", \"3 cm piece of ginger\", \"1 tsp of salt\", \"½xa0tsp chilli powder\", \"juice from 1 lemon\", \"100ml thick Greek yoghurt\", \"1 tsp kashmiri red chilli powder\", \"1 tsp of garam masala\", \"1 tsp cumin seeds, crushed\", \"1 tbsp vegetable oil\"]', '{\"Blend the ginger, garlic to make a paste.\"}, {\"Mix the ginger and garlic paste with lemon juice, salt, chilli powder and coat the pigeon breasts. Leave them to marinate for about 20 minutes.\"}, {\"Meanwhile make up a second marinade with the yoghurt, kashmiri chilli powder, garam masala and crushed cumin seeds.\"}, {\"Heat the oven to 180ºC\"}, {\"Once marinaded heat a frying pan and fry the breasts for about 1 minutes on each side.\"}, {\"Remove and place on an oven try then smear the yoghurt marinade over each breast. Place in the oven and cook for a further 3-4 minutes if you want the breasts pink. Longer if you prefer them more well done.\"}, {\"Remove from the oven and leave them to rest for at least 5 minutes.\"}, {\"Slice the breast and squeeze with a little lemon and serve with some salad.\"}', '{\"Calories\": \"333\", \"Fat (g)\": \"13\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"4\", \"of which sugars (g)\": \"2\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"48\", \"Salt (mg)\": \"592\"}', '', 'Pasta', 'dinner', '20min'),
(225, 'Fennel Laccha Paratha', '[\"300g atta/flour\", \"150ml water\", \"1 tbsp coconut oil\", \"1 tsp fennel seeds\", \"pinch salt\"]', '{\"Dry roast the fennel seeds until aromatic. leave to cool and the grind in a pestle and mortar\"}, {\"Add the ground seeds and salt to the flour.\"}, {\"Pour in the water a little at a time and with your hand bring it together.\"}, {\"knead until soft then cover and leave for 30 minutes.\"}, {\"Take a gold ball sized piece and roll in your hands. Flatten and roll out with a rolling pin.\"}, {\"Rub coconut oil over the top of it and dust with a little flour.\"}, {\"Cut the circle into long strips.\"}, {\"Holding the strips from one end wrap them around eachother very roughly like a rope.\"}, {\"Roll the rope strips into a tight ball and dust the ball.\"}, {\"Roll it out until it\"s about 25cm in diameter.\"}, {\"Fry on a medium heat on your griddle or tava until you have brown spots, then turn it over. Smear with coconut oil and turn again until cooked through.\"}, {\"Crunch it up in your hands to seperate into crispy layers.\"}', '{\"Calories\": \"330\", \"Fat (g)\": \"3\", \"of which saturates (g)\": \"0\", \"Carbohydrates (g)\": \"68\", \"of which sugars (g)\": \"0\", \"Fibre (g)\": \"0\", \"Protein (g)\": \"8\", \"Salt (mg)\": \"0\"}', '', 'Pasta', 'dinner', '20min'),
(226, 'Lamb Jalfrezi', '[\"400-600g lamb shoulder, trimmed and chopped\", \"2 tbsp vegetable oil\", \"4 chillies, chopped\", \"1 tsp cumin seeds\", \"4 garlic cloves, sliced\", \"1 tsp salt\", \"4 fresh tomatoes, chopped\", \"½xa0tsp turmeric\", \"½xa0tspxa0salt\", \"1 tbsp vegetable oil\", \"1 onion, cut into chunks\", \"1 red pepper, cut into chunks\", \"1 green pepper, cut into chunks\", \"1 tsp cumin seeds\", \"1 tomato, chopped into chunks\", \"2 chillies, chopped\", \"1 tsp garam masala\"]', '{\"Heat oil in a pan, add the cumin seeds, chilli and garlic and fry until lightly browned.\"}, {\"Add the chopped tomatoes, salt and turmeric then cook so the tomatoes break down to make a lovely thick gravy.\"}, {\"Add the lamb and stir to coat the pieces. Reduce the heat and place the lid on the pan and leave to cook for 30-40 minutes on a low heat until it\"s soft and tender.\"}, {\"In a separate pan heat some oil and add the cumin seeds, once fragrant stir in the chunky onions and peppers, tomato and the chilli then stir fry. You can cook these as much or as little as you like. I prefer mine with a bit of a crunch.\"}, {\"Stir in the garam masala for added body and depth.\"}, {\"Once the lamb is cooked and the sauce has reduced stir in the garam masala fried vegetable mix.\"}', '{\"Calories\": \"349\", \"Fat (g)\": \"24\", \"of which saturates (g)\": \"7\", \"Carbohydrates (g)\": \"7\", \"of which sugars (g)\": \"3\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"29\", \"Salt (mg)\": \"859\"}', '', 'Pasta', 'dinner', '20min'),
(227, 'Sausage and Courgette Curry', '[\"6/8 thick pork sausages\", \"1 large onion peeled and chopped\", \"1 tsp cumin seeds\", \"3 cloves garlic, peeled\", \"3cm of fresh ginger, grated\", \"2 large or 6 mini courgettes\", \"1 tsp rapeseed oil\", \"1 tsp chilli powder\", \"1 tsp turmeric\", \"200g tin plum tomatoes\", \"½ tsp salt\", \"1 tsp garam masala\"]', '{\"Heat the oil in a large frying pan over a medium heat and fry the sausages, turning until they are brown. Remove and put on a plate.\"}, {\"In the same pan and add the cumin seeds once the sizzle and become fragrant add the onions.\"}, {\"Fry for about 10 minutes until they become translucent and start to turn golden brown.\"}, {\"Add the garlic and cook on a gentle heat for a few minutes.\"}, {\"In the mean time wash and chop the courgettes.\"}, {\"Add the tomatoes and stir in the ginger, turmeric, salt, and chilli powder and stir for a further minute. Once the masala is thick and shiny add the courgettes.\"}, {\"Bring the pan to a simmer, cover, then turn heat to low and cook for 10 minutes. Cut the sausages into chunks and add them to the pan.\"}, {\"Cover and cook for about 5 minutes until hot.\"}, {\"Add the garam masala, sprinkle with coriander and serve\"}', '{\"Calories\": \"344\", \"Fat (g)\": \"14\", \"of which saturates (g)\": \"6\", \"Carbohydrates (g)\": \"37\", \"of which sugars (g)\": \"9\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"16\", \"Salt (mg)\": \"942\"}', '', 'Pasta', 'dinner', '20min'),
(228, 'Kofta Bites', '[\"400g mince lamb\", \"1 tbsp rapeseed oil\", \"½ tsp salt\", \"1 tsp cumin seeds, crushed\", \"1 tsp chilli powder (add a little more for more of a kick)\", \"2 tsp garam masala\", \"1 tsp cinnamon\", \"handful fresh coriander, finely chopped\"]', '{\"In a large mixing bowl add the mince lamb with all the other ingredients except the oil.\"}, {\"Mix everything together using your hands to ensure the spices are evenly distributed.\"}, {\"Rub a little oil on to your hands to stop the mixture sticking to your fingers.\"}, {\"Take a small amount of the meat and roll in your palms to make a meatball. Ensure it is smooth all over and set to one side. Repeat with the rest of the mixture.\"}, {\"Heat the oil in a frying pan.\"}, {\"Carefully fry the meatballs (kofta) in batches so they brown and crisp up all over (15-20 mins).\"}, {\"Remove the kofta using a slotted spoon and set them on some kitchen paper to drain.\"}, {\"Serve as a little snack or serve 2 or 3 as a lovely starter.\"}', '{\"Calories\": \"215\", \"Fat (g)\": \"16\", \"of which saturates (g)\": \"6.0\", \"Carbohydrates (g)\": \"0.5\", \"of which sugars (g)\": \"0.0\", \"Fibre (g)\": \"0.0\", \"Protein (g)\": \"18\", \"Salt (mg)\": \"0.94\"}', '', 'Pasta', 'dinner', '20min'),
(229, 'Crispy Paneer Fingers', '[\"500g block of paneer\", \"100g plain flour\", \"1 tsp cumin seeds\", \"1 tsp chilli powder\", \"1 tsp dried fenugreek leaves\", \"½ tsp salt\", \"1 tsp chaat masala\", \"½ tsp chilli flakes\", \"1 egg\", \"1 tbsp milk\", \"200g panko breadcrumbs\"]', '{\"Mix the flour with all the ingredients for the dusting.\"}, {\"Cut the paneer into thick fingers or into 4 squares.\"}, {\"Dust in the seasoned flour.\"}, {\"Make the egg wash by mixing the egg with the milk.\"}, {\"Coat the seasoned paneer with the egg wash.\"}, {\"Shake and coat in more of the flour and then in the egg again.\"}, {\"Coat with the breadcrumbs and refrigerate until ready to cook.\"}, {\"Heat oil in a pan and pan fry until crisp all over.\"}, {\"Serve with green chutney or tomato chutney\"}', '{\"Calories\": \"241\", \"Fat (g)\": \"12(pre-cooked)\", \"of which saturates (g)\": \"6\", \"Carbohydrates (g)\": \"23\", \"of which sugars (g)\": \"1\", \"Fibre (g)\": \"2\", \"Protein (g)\": \"13\", \"Salt (mg)\": \"895\"}', '', 'Pasta', 'dinner', '20min'),
(230, 'Amla Chutney', '[\"300g gooseberries (Amla)\", \"400g sugar\", \"3 cloves, ground\", \"1 tsp ginger powder\", \"4 black peppercorns\", \"2 cardamoms (seeds only), ground\", \"10 saffron strands\"]', '{\"Put the gooseberries in a pressure cooker and cover with water. Cook them until the cooker whistles 4 times until the gooseberries are soft. DO NOT remove the lid of the pressure cooker until it has cooled and relased all the pressure.\"}, {\"Drain the water and remove the seeds from the gooseberries.\"}, {\"Place the flesh into a pan and puree using a hand blender.\"}, {\"Add the sugar to the pan and heat gently. Bring the mixture to a boil and stir constantly\"}, {\"One all the sugar has melted add the spices and mix well.\"}, {\"Reduce the heat to low and let the mixture cook for 5-7 minutes, stirring occasionally.\"}, {\"Once the mixture has thickened removed from the heat.\"}, {\"Fill a sterlised jar with the mixture and leave to cool. Once completely cool, cover with the lid and store in the fridge. This will keep for up to 3 months.\"}', '{\"Calories\": \"205\", \"Fat (g)\": \"5\", \"of which saturates (g)\": \"1\", \"Carbohydrates (g)\": \"43\", \"of which sugars (g)\": \"8\", \"Fibre (g)\": \"5\", \"Protein (g)\": \"3\", \"Salt (mg)\": \"616\"}', '', 'Pasta', 'dinner', '20min');

-- --------------------------------------------------------

--
-- Table structure for table `dietitian`
--

CREATE TABLE `dietitian` (
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `qualification` varchar(20) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `profilePhoto` blob DEFAULT NULL,
  `p_p` varchar(255) NOT NULL DEFAULT 'user-default.png',
  `location` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `experience` float DEFAULT NULL,
  `about_me` varchar(250) DEFAULT NULL,
  `no_of_clients` int(11) NOT NULL DEFAULT 0,
  `referral_code` varchar(15) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `achievements` varchar(40) DEFAULT NULL,
  `greetings_to_show` int(11) NOT NULL DEFAULT 0,
  `greetings_shown` int(11) NOT NULL DEFAULT 0,
  `last_seen` datetime DEFAULT current_timestamp(),
  `verification_code` varchar(20) DEFAULT NULL,
  `OTP` varchar(255) NOT NULL,
  `referred_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`referred_by`)),
  `referral_users` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`referral_users`)),
  `joined_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietitian`
--

INSERT INTO `dietitian` (`dietitian_id`, `dietitianuserID`, `password`, `name`, `qualification`, `email`, `mobile`, `profilePhoto`, `p_p`, `location`, `age`, `gender`, `experience`, `about_me`, `no_of_clients`, `referral_code`, `facebook`, `whatsapp`, `twitter`, `linkedin`, `instagram`, `achievements`, `greetings_to_show`, `greetings_shown`, `last_seen`, `verification_code`, `OTP`, `referred_by`, `referral_users`, `joined_date`) VALUES
(1, 'infitsWebTeam', '$2y$10$h17mBwmNTFr66HkolKQ/o.5K3g1YR02AG1j5Tqup1187wKZ4gwU56', 'Infits Web Team', 'BCA', 'teaminfits@gmail.com', '9988776644', NULL, '5953_rajat_post.jpeg', 'delhi', 19, 'M', 1, NULL, 8, 'INF4581265', NULL, NULL, NULL, '', 'https://www.instagram.com', '1', 1, 1, '2024-03-31 19:46:46', 'c5BH9DYATy', '123456', NULL, NULL, '0000-00-00 00:00:00'),
(2, 'Test ', '123', 'Test', NULL, 'Test@gmail.com', '13243546', NULL, 'user-default.png', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-07-07 14:04:23', 'tFmPbEX7K8', '', NULL, NULL, '0000-00-00 00:00:00'),
(3, 'SumitKumar', 'Su@071002', 'Sumit Kumar', NULL, 'srvbar1e14@gmail.com', '1234567890', NULL, 'user-default.png', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-08-28 16:54:08', 'IAPkFXaEf2', '', NULL, NULL, '0000-00-00 00:00:00'),
(4, 'sdfsd', 'hi', 'sdfsdfs', NULL, 'ardsfsdfsd@gamil.com', '23423423423', NULL, 'user-default.png', NULL, NULL, NULL, NULL, NULL, 0, 'zKLTJWZ74v', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-09-01 13:06:33', 'QeSOcxtWkD', '', NULL, NULL, '0000-00-00 00:00:00'),
(5, 'uditsaxena', '$2y$10$VYhk6anMiALRQfhMnNHavOz9CrHbQMR243apcNDviigYaFQtsSM7.', 'Udit Saxena', 'asdf', 'uditsaxena940@gmail.com', '9811443764', NULL, '', 'delhi', 19, 'M', 0, NULL, 0, 'UDI0365948', 'https://www.facebook.com/Udit.Saxena', 'https://www.whatsapp.com/', 'https://www.twitter.com/_udking_/', 'https://www.linkedin.com/', 'https://www.instagram.com/_udking_/', '', 0, 0, '2023-11-26 20:36:45', 'D6ZBOoIcCV', '', NULL, '{\"29\": \"_udking_\", \"31\": \"_udkin_\"}', '0000-00-00 00:00:00'),
(29, '_udking_', '$2y$10$uYWeCHUh9nO6Z269UPhbIuV4UYvcuHyHlU3iAo6eaDms8401vx1/6', 'Udit Saxena', 'BCA', 'uditsaxena967@gmail.com', '2343242323', NULL, '', 'delhi', 19, 'M', 0, NULL, 0, 'UDI6229990', NULL, NULL, NULL, NULL, NULL, '', 0, 0, '2023-11-24 22:14:44', '4OcN6mECIV', '', '{\"5\": \"uditsaxena\"}', NULL, '2023-11-25 00:18:11'),
(31, '_udkin_', '$2y$10$fSSFbhKXTSSDc5levwseGOmpOzuAd1Yb6ZanmbHK4Xv6cKV8niFki', 'Udit Saxena', NULL, 'uditsaxena960@gmail.com', '2343282323', NULL, 'user-default.png', NULL, NULL, NULL, NULL, NULL, 0, 'UDI8819606', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2023-11-25 00:20:28', 'pDLsRtkze9', '', '{\"5\": \"uditsaxena\"}', NULL, '2023-11-25 00:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `dietitian_forms`
--

CREATE TABLE `dietitian_forms` (
  `form_id` int(11) NOT NULL,
  `form_name` varchar(50) NOT NULL,
  `total_que` int(11) NOT NULL DEFAULT 0,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` text NOT NULL,
  `questions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dietitian_forms`
--

INSERT INTO `dietitian_forms` (`form_id`, `form_name`, `total_que`, `dietitian_id`, `dietitianuserID`, `questions`) VALUES
(1, 'hi', 2, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"gender\",\"ansType\":\"radio\",\"options\":{\"option_0\":\"m\",\"option_1\":\"f\"},\"name\":\"pfoxw\"},{\"queId\":2,\"que\":\"name?\",\"ansType\":\"text\"}]'),
(2, 'testing', 2, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"age??\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"5\",\"option_1\":\"6\"}},{\"queId\":1,\"que\":\"AGe?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"100\",\"option_1\":\"90\"}}]'),
(3, 'Testing2', 5, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"Age?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"1\",\"option_1\":\"2\"}},{\"queId\":1,\"que\":\"gender?\",\"ansType\":\"radio\",\"options\":{\"option_0\":\"m\",\"option_1\":\"f\"},\"name\":\"radio_box_1\"},{\"queId\":1,\"que\":\"hello\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"q\",\"option_1\":\"m\"}},{\"queId\":1,\"que\":\"age?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"1\",\"option_1\":\"2\",\"option_2\":\"3\"}},{\"queId\":1,\"que\":\"hi?\",\"ansType\":\"text\"}]'),
(4, 'genreal', 1, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"age?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"q\",\"option_1\":\"q\"}}]'),
(5, 'testing', 6, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"hey\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"hi\",\"option_1\":\"hello\",\"option_2\":\"bro\"}},{\"queId\":1,\"que\":\"gender?\",\"ansType\":\"radio\",\"options\":{\"option_0\":\"m\",\"option_1\":\"f\",\"option_2\":\"others\"},\"name\":\"radio_box_1\"},{\"queId\":1,\"que\":\"hello?\",\"ansType\":\"radio\",\"options\":{\"option_0\":\"1\",\"option_1\":\"2\"},\"name\":\"radio_box_1\"},{\"queId\":1,\"que\":\"hey\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"1\"}},{\"queId\":1,\"que\":\"hello?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"hi\"}},{\"queId\":1,\"que\":\"hello?\",\"ansType\":\"text\"}]'),
(6, 'hi', 5, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"name?\",\"ansType\":\"text\"},{\"queId\":1,\"que\":\"abc?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"f\"}},{\"queId\":1,\"que\":\"efg?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"i\"}},{\"queId\":1,\"que\":\"a\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"e\",\"option_1\":\"l\"}},{\"queId\":1,\"que\":\"d\",\"ansType\":\"radio\",\"options\":{\"option_0\":\"a\",\"option_1\":\"b\"},\"name\":\"radio_box_1\"}]'),
(7, 'testing', 2, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"age??\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"5\",\"option_1\":\"6\"}},{\"queId\":1,\"que\":\"AGe?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"100\",\"option_1\":\"90\"}}]'),
(8, 'Testing2', 4, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"Age?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"1\",\"option_1\":\"2\"}},{\"queId\":1,\"que\":\"gender?\",\"ansType\":\"radio\",\"options\":{\"option_0\":\"m\"},\"name\":\"radio_box_1\"},{\"queId\":1,\"que\":\"hello\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"q\",\"option_1\":\"m\"}},{\"queId\":1,\"que\":\"age?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"1\",\"option_1\":\"2\",\"option_2\":\"3\"}}]'),
(9, 'genreal', 1, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"age?\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"q\",\"option_1\":\"q\"}}]'),
(10, 'adssad', 1, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"asfdsaf\",\"ansType\":\"checkbox\",\"options\":{\"option_0\":\"adfew\"}}]'),
(11, 'This is the form', 1, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"what is your gender\",\"ansType\":\"radio\",\"options\":{\"option_0\":\"male\",\"option_1\":\"female\"},\"name\":\"radio_box_1\"}]'),
(12, 'this is the new form', 0, 1, 'infitsWebTeam', '[]'),
(13, 'this is the second form ', 1, 1, 'infitsWebTeam', '[{\"queId\":1,\"que\":\"this is the question \",\"ansType\":\"radio\",\"options\":{\"option_0\":\"something\"},\"name\":\"radio_box_1\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `dietitian_recipes`
--

CREATE TABLE `dietitian_recipes` (
  `recipe_id` int(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `recipe_name` varchar(50) NOT NULL,
  `recipe_ingredients` text NOT NULL,
  `recipe_recipe` text NOT NULL,
  `recipe_nutritional_information` text NOT NULL,
  `recipe_img` text NOT NULL,
  `recipe_courses` varchar(255) NOT NULL,
  `recipe_category` varchar(255) NOT NULL,
  `recipe_time` varchar(30) NOT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietitian_recipes`
--

INSERT INTO `dietitian_recipes` (`recipe_id`, `dietitian_id`, `dietitianuserID`, `recipe_name`, `recipe_ingredients`, `recipe_recipe`, `recipe_nutritional_information`, `recipe_img`, `recipe_courses`, `recipe_category`, `recipe_time`, `lastupdate`) VALUES
(1, 1, 'infitsWebTeam', 'new my rexipe', '[\"Milk 5 each :milk\"]', '{}', '{\"Calories\":\"23\",\"Protein (g)\":\"56\",\"Fibre (g)\":\"56\",\"Carbohydrates (g)\":\"56\"}', '510487_rice_chicken.svg', 'breakfast', 'Categories', '20min', '2023-09-21 06:15:40'),
(2, 1, 'infitsWebTeam', 'Spiced Jerusalem Artichokes', '[\"500g Jerusalem artichokes\",\"2 tbsp vegetable oil\",\"1 heaped tsp cumin seeds\",\"large pinch of asafoetida\",\"1 green chilli, chopped\",\"?xa0tsp salt\",\"1 lemon\",\"1 tsp garam masala\",\"Handful of fresh coriander\"]', '{,{ },{ },{ },{ },}', '{\"Calories\":\"164\",\"Protein (g)\":\"3\",\"Fibre (g)\":\"3\",\"Carbohydrates (g)\":\"26\"}', '897024_chicken-svgrepo-com.svg', 'breakfast', 'Pancake', '1hr 20min', '2023-11-15 12:55:50'),
(18, 1, 'infitsWebTeam', 'deinei', '[]', '{}', '{\"Calories\":\"\",\"Protein (g)\":\"\",\"Fibre (g)\":\"\",\"Carbohydrates (g)\":\"\"}', '272384_rice_chicken.svg', 'Courses', 'Categories', '', '2024-03-20 11:53:17'),
(19, 1, 'infitsWebTeam', 'Veg Thali', '[]', '{}', '{\"Calories\":\"32\",\"Protein (g)\":\"43\",\"Fibre (g)\":\"78\",\"Carbohydrates (g)\":\"11\"}', '632399_plain_thali.svg', 'lunch', 'Sandwich', '1hr 22min', '2024-03-20 11:53:26'),
(20, 1, 'infitsWebTeam', 'demo123', '[]', '{}', '{\"Calories\":\"\",\"Protein (g)\":\"\",\"Fibre (g)\":\"\",\"Carbohydrates (g)\":\"\"}', '', 'Courses', 'Categories', '', '2024-03-20 11:53:32'),
(21, 1, 'infitsWebTeam', '', '[]', '{}', '{\"Calories\":\"\",\"Protein (g)\":\"\",\"Fibre (g)\":\"\",\"Carbohydrates (g)\":\"\"}', '', 'Courses', 'Categories', '', '2024-03-20 11:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `dietitian_tasks`
--

CREATE TABLE `dietitian_tasks` (
  `task_id` int(11) NOT NULL,
  `dietitianuserID` varchar(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(30) NOT NULL,
  `end_time` varchar(30) NOT NULL,
  `add_to_calander` int(11) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietitian_tasks`
--

INSERT INTO `dietitian_tasks` (`task_id`, `dietitianuserID`, `title`, `description`, `date`, `start_time`, `end_time`, `add_to_calander`, `time`) VALUES
(1, 'infitsWebTeam', 'Hey', 'test Task', '2023-12-21', '23:21', '23:59', 0, '2023-06-20 14:50:03'),
(2, 'infitsWebTeam', 'h', 'h', '2023-07-11', '16:49', '20:47', 0, '2023-07-11 11:17:14'),
(4, 'infitsWebTeam', 'h', 'h', '2023-07-15', '19:43', '19:44', 0, '2023-07-13 14:08:41'),
(5, 'SumitKumar', 'task list', 'Task Discription', '2023-09-01', '19:43', '19:44', 0, '2023-07-13 14:08:41'),
(6, 'SumitKumar', 'task list', 'Task Discription', '2023-08-26', '19:43', '19:44', 0, '2023-08-26 14:08:41'),
(7, 'SumitKumar', 'task list', 'Task Discription', '2023-08-29', '19:43', '19:44', 0, '2023-08-26 14:08:41'),
(16, 'infitsWebTeam', 'task 1', 'sdfsdfsd', '2023-08-31', '19:49', '19:49', 0, '2023-08-28 14:14:30'),
(18, 'infitsWebTeam', 'sdfsd', 'sdfsdfdsf', '2023-08-30', '19:57', '12:52', 0, '2023-08-28 14:22:22'),
(19, 'infitsWebTeam', 'sdfsd', 'sdfsdfdsf', '2023-08-30', '19:57', '12:52', 0, '2023-08-28 14:23:25'),
(20, 'infitsWebTeam', 'task new', 'sdfsdfsd', '2023-08-29', '19:58', '12:53', 0, '2023-08-28 14:23:42'),
(21, 'infitsWebTeam', 'task nee', 'sdfsdfsd', '2023-08-29', '19:58', '12:53', 0, '2023-08-28 14:26:01'),
(22, 'infitsWebTeam', 'sdfsdf', 'sdfsdfs', '2023-08-31', '19:01', '19:00', 0, '2023-08-28 14:26:35'),
(23, 'infitsWebTeam', 'sdfsdf', 'sdfsdfs', '2023-08-31', '19:01', '19:00', 0, '2023-08-28 14:33:46'),
(24, 'infitsWebTeam', 'sdfsdf', 'sdfsdfsdfsd', '2023-08-30', '20:08', '20:09', 0, '2023-08-28 14:34:27'),
(25, 'infitsWebTeam', 'sdfsdf', 'sdfsd', '2023-08-31', '20:25', '20:25', 0, '2023-08-28 14:51:39'),
(26, 'infitsWebTeam', 'walk', 'Walk very fast', '2023-11-01', '06:00', '07:00', 0, '2023-10-31 16:33:16'),
(27, 'infitsWebTeam', 'Dance', 'Dance my boy', '2023-10-31', '23:04', '23:07', 0, '2023-10-31 16:34:29'),
(29, 'infitsWebTeam', 'walk', 'walk', '2023-11-09', '18:14', '20:14', 0, '2023-11-25 10:44:58'),
(30, 'infitsWebTeam', 'walk', 'walk', '2023-11-29', '20:15', '21:15', 0, '2023-11-25 10:45:28'),
(31, 'infitsWebTeam', 'Eat', 'Cheese bread', '2023-11-29', '16:02', '17:02', 0, '2023-11-29 09:32:56'),
(32, 'infitsWebTeam', 'task', 'This is description', '2023-11-29', '19:06', '19:10', 0, '2023-11-29 12:36:52'),
(33, 'infitsWebTeam', 'Meeting', 'Meeting with Cats', '2023-11-30', '20:51', '21:51', 0, '2023-11-29 13:21:30'),
(34, 'infitsWebTeam', 'walk', '20 min', '2024-01-13', '21:44', '21:46', 0, '2024-01-13 16:12:37'),
(35, 'infitsWebTeam', 'walk', 'talk', '2024-01-14', '15:06', '19:02', 0, '2024-01-14 09:32:28'),
(36, 'infitsWebTeam', 'Eat', 'n kn', '2024-01-15', '15:02', '15:05', 0, '2024-01-14 09:32:55'),
(37, 'infitsWebTeam', 'sadsfasd', 'asdfasdf', '2024-02-11', '13:22', '14:22', 0, '2024-02-11 07:52:08'),
(38, 'infitsWebTeam', 'adfasdf', 'adsfasdf', '2024-02-11', '15:22', '17:22', 0, '2024-02-11 07:52:35'),
(39, 'infitsWebTeam', 'asdfasdf', 'asdfasdf', '2024-02-14', '13:25', '17:23', 0, '2024-02-11 07:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `diet_chart`
--

CREATE TABLE `diet_chart` (
  `dietchart_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `sunday` text NOT NULL,
  `dietchart_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `diet_chart`
--

INSERT INTO `diet_chart` (`dietchart_id`, `client_id`, `dietitian_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `dietchart_name`, `name`, `plan_id`) VALUES
(29, 6, 1, '{\"breakfast\":{\"breakfast_morning\":[{\"recipeId\":\"2\",\"isDefault\":\"true\"},{\"recipeId\":\"3\",\"isDefault\":\"true\"},{\"recipeId\":\"4\",\"isDefault\":\"true\"}]},\"lunch\":{\"lunch_after\":[{\"recipeId\":\"2\",\"isDefault\":\"true\"}]}}', '', '', '', '', '', '', 'hello bro', 'maintain weight', 0),
(33, 6, 1, '{\"breakfast\":{\"breakfast_morning\":[{\"recipeId\":\"2\",\"isDefault\":\"true\"},{\"recipeId\":\"4\",\"isDefault\":\"true\"}]},\"dinner\":{\"night\":[{\"recipeId\":\"5\",\"isDefault\":\"true\"},{\"recipeId\":\"8\",\"isDefault\":\"true\"}]}}', '', '', '', '', '', '', 'Rajat', '', 0),
(34, 6, 1, '', '{\"breakfast\":{\"breakfast_morning\":[{\"recipeId\":\"2\",\"isDefault\":\"true\"},{\"recipeId\":\"5\",\"isDefault\":\"true\"}]}}', '', '', '', '', '', 'Tue-demo', '', 0),
(35, 11, 1, '{\"breakfast\":{\"breakfast_morning\":[{\"recipeId\":\"1\",\"isDefault\":\"true\"},{\"recipeId\":\"8\",\"isDefault\":\"true\"}]}}', '', '', '', '', '', '', 'hi bro', '', 0),
(36, 11, 1, '{\"breakfast\":{\"breakfast_morning\":[{\"recipeId\":\"12\",\"isDefault\":\"true\"}]}}', '', '', '', '', '', '', 'Rajat diet', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `favourite_food_items`
--

CREATE TABLE `favourite_food_items` (
  `clientID` varchar(50) NOT NULL,
  `nameofFoodItem` varchar(50) NOT NULL,
  `calorie` varchar(15) NOT NULL,
  `protein` varchar(15) NOT NULL,
  `carb` varchar(15) NOT NULL,
  `fat` varchar(15) NOT NULL,
  `fiber` varchar(15) NOT NULL,
  `icon` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite_food_items`
--

INSERT INTO `favourite_food_items` (`clientID`, `nameofFoodItem`, `calorie`, `protein`, `carb`, `fat`, `fiber`, `icon`, `image`) VALUES
('testuser', 'Pizza', '20  kcal', '20', '20', '20', '10', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `food_info`
--

CREATE TABLE `food_info` (
  `name` varchar(30) NOT NULL,
  `calorie` varchar(10) NOT NULL,
  `protein` varchar(10) NOT NULL,
  `fiber` varchar(10) NOT NULL,
  `carb` varchar(10) NOT NULL,
  `fat` varchar(10) NOT NULL,
  `icon` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_info`
--

INSERT INTO `food_info` (`name`, `calorie`, `protein`, `fiber`, `carb`, `fat`, `icon`, `image`) VALUES
('Pizza', '20', '20', '10', '20', '20', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `goal_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `steps` int(11) NOT NULL,
  `heart` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `sleep` int(11) NOT NULL,
  `calorie` int(11) NOT NULL,
  `carbs` int(11) NOT NULL,
  `fats` int(11) NOT NULL,
  `fiber` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`goal_id`, `client_id`, `dietitian_id`, `steps`, `heart`, `water`, `weight`, `sleep`, `calorie`, `carbs`, `fats`, `fiber`, `protein`, `time`) VALUES
(0, 6, 1, 1000, 80, 10, 79, 7, 0, 1000, 10, 24, 43, '2024-03-12 14:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `heartrate`
--

CREATE TABLE `heartrate` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `average` varchar(4) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `maximum` text NOT NULL,
  `minimum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `in_app_notifications`
--

CREATE TABLE `in_app_notifications` (
  `row_id` int(11) NOT NULL,
  `clientuserID` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `in_app_notifications`
--

INSERT INTO `in_app_notifications` (`row_id`, `clientuserID`, `date`, `text`, `type`) VALUES
(2, 'debarghyabasak', '2024-01-29 02:56:31', 'Water goal not completed, drink 1000 ml more to complete', 'water'),
(18, 'testuser', '2024-01-31 08:07:04', 'Water goal not completed, drink 800 ml more to complete', 'water'),
(22, 'vaishali', '2024-01-31 08:37:06', 'Water goal not completed, drink 300 ml more to complete', 'water');

-- --------------------------------------------------------

--
-- Table structure for table `live`
--

CREATE TABLE `live` (
  `dietitian_id` int(11) NOT NULL,
  `dateandtime` datetime DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(40) NOT NULL,
  `viewer` int(11) NOT NULL,
  `invite_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `live`
--

INSERT INTO `live` (`dietitian_id`, `dateandtime`, `title`, `note`, `status`, `viewer`, `invite_code`) VALUES
(1, NULL, '', '', '', 0, 'pjfxIW'),
(2, NULL, '', '', '', 0, 'JwOdHG'),
(3, NULL, '', '', '', 0, 'GriT0I'),
(4, NULL, '', '', '', 0, '4rVUYd'),
(5, NULL, '', '', '', 0, 'WnoIBq'),
(6, NULL, '', '', '', 0, 'a5v6ML'),
(7, NULL, '', '', '', 0, 'cj9jHt'),
(8, NULL, '', '', '', 0, 'cVQkiq'),
(9, NULL, '', '', '', 0, '837eQn'),
(10, NULL, '', '', '', 0, 'm1Div3'),
(11, NULL, '', '', '', 0, 'Ke7EjI'),
(12, NULL, '', '', '', 0, 'WtJeNm'),
(13, NULL, '', '', '', 0, 'mhz7kw'),
(14, NULL, '', '', '', 0, 'IhXULz'),
(15, NULL, '', '', '', 0, '9emwcy'),
(16, NULL, '', '', '', 0, 'NijZBx'),
(17, NULL, '', '', '', 0, 'si6vWw'),
(18, NULL, '', '', '', 0, 'VNAeF3'),
(19, NULL, '', '', '', 0, 'Xymj1F'),
(20, NULL, '', '', '', 0, '2sfpGw'),
(21, NULL, '', '', '', 0, 'g4HVQG'),
(22, NULL, '', '', '', 0, 'bkJhyP'),
(23, NULL, '', '', '', 0, 'fyVHEk'),
(24, NULL, '', '', '', 0, 'eCDCh0'),
(25, NULL, '', '', '', 0, '3xuF9K'),
(26, NULL, '', '', '', 0, 'LaioXT'),
(27, NULL, '', '', '', 0, 'hT6dCI'),
(28, NULL, '', '', '', 0, 'T9TWvh'),
(29, NULL, '', '', '', 0, '99jVKh'),
(30, NULL, '', '', '', 0, 'x0Vex4'),
(31, NULL, '', '', '', 0, 'uD8jJq'),
(32, NULL, '', '', '', 0, 'q6kBcb'),
(33, NULL, '', '', '', 0, '0hU7un'),
(34, NULL, '', '', '', 0, 'yuei3f'),
(35, NULL, '', '', '', 0, 'GJ2uMw'),
(36, NULL, '', '', '', 0, 'FxtJzl'),
(37, NULL, '', '', '', 0, 'XaF9JX'),
(38, NULL, '', '', '', 0, 'ZjJ57D'),
(39, NULL, '', '', '', 0, 'jYfsnZ'),
(40, NULL, '', '', '', 0, 'zLuPyp'),
(41, NULL, '', '', '', 0, 'Pp65P4'),
(42, NULL, '', '', '', 0, 'mbwHct'),
(43, NULL, '', '', '', 0, 'SgSrUo'),
(44, NULL, '', '', '', 0, 'OuZybg'),
(45, NULL, '', '', '', 0, '84svWT'),
(46, NULL, '', '', '', 0, 'D7Bf3h'),
(47, NULL, '', '', '', 0, '6ujxwW'),
(48, NULL, '', '', '', 0, 'pcEXWl'),
(49, NULL, '', '', '', 0, 'O3a67O'),
(50, NULL, '', '', '', 0, 'DYwngR'),
(51, NULL, '', '', '', 0, 'ErvTfC'),
(52, NULL, '', '', '', 0, 'C5Ti4P'),
(53, NULL, '', '', '', 0, '9lKG4w'),
(54, NULL, '', '', '', 0, 'O1fmxM'),
(55, NULL, '', '', '', 0, '4MwkAg'),
(56, NULL, '', '', '', 0, '4B0RyY'),
(57, NULL, '', '', '', 0, '9jmdyo'),
(58, NULL, '', '', '', 0, '37EKgv'),
(59, NULL, '', '', '', 0, 'KPg3AE'),
(60, NULL, '', '', '', 0, '9wLhcN');

-- --------------------------------------------------------

--
-- Table structure for table `livemessage`
--

CREATE TABLE `livemessage` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meal_tracker`
--

CREATE TABLE `meal_tracker` (
  `row_id` int(11) NOT NULL,
  `mealchart_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitianuserID` varchar(25) NOT NULL,
  `currentDay` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `meal` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `calories` varchar(10) NOT NULL,
  `carbs` int(11) NOT NULL,
  `fiber` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `fat` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `icon` text NOT NULL,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_tracker`
--

INSERT INTO `meal_tracker` (`row_id`, `mealchart_id`, `client_id`, `dietitian_id`, `clientuserID`, `dietitianuserID`, `currentDay`, `name`, `meal`, `size`, `quantity`, `calories`, `carbs`, `fiber`, `protein`, `fat`, `position`, `dateandtime`, `icon`, `image`, `description`) VALUES
(1, 111, 4, 1, 'testuser', 'infitsWebTeam', 'hDJOASJAONJ', 'Naan', 'BK', '1.5', '1', '1', 1, 10, 20, 20, 1, '2024-02-14 07:57:22', '', NULL, NULL),
(5, 111, 4, 1, 'testuser', 'infitsWebTeam', 'hDJOASJAONJ', 'Naan', 'BK', '1.5', '1', '1', 1, 10, 20, 20, 1, '2024-02-15 06:19:27', ' mjjkmb,kb', 'hvjvjvjkvbk', 'vjv nj vm bkb '),
(2365, 0, 0, 0, 'testuser', 'testuser', '', 'Pizza', 'Snacks', 'Regular', '1', '20  kcal', 20, 10, 20, 20, 0, '2024-02-13 14:41:41', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG', ''),
(2366, 0, 0, 0, 'testuser', 'testuser', '', 'Pizza', 'Snacks', 'Regular', '1', '20  kcal', 20, 10, 20, 20, 0, '2024-02-13 14:41:56', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG', ''),
(2367, 0, 0, 0, 'testuser', 'testuser', '', 'Pizza', 'Lunch', 'Small', '1', '10.00', 10, 5, 10, 10, 0, '2023-04-07 16:49:55', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG', ''),
(2368, 0, 0, 0, 'testuser', 'testuser', '', 'Pizza', 'Lunch', 'Large', '2', '80.00', 80, 40, 80, 80, 0, '2024-02-01 17:33:15', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG', ''),
(2369, 0, 0, 0, 'testuser', 'testuser', '', 'Pizza', 'Lunch', 'Large', '2', '80.00', 80, 40, 80, 80, 0, '2024-02-15 10:52:42', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG', ''),
(2370, 0, 0, 0, 'testuser', 'testuser', '', 'Pizza', 'BreakFast', 'Regular', '1', '20  kcal', 20, 10, 20, 20, 0, '2024-02-15 11:18:04', 'http://192.168.1.70/androidApi/upload/Recipies/pizza.png', 'http://192.168.1.70/androidApi/upload/food/pizzaimg.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `dietitianID` varchar(25) NOT NULL,
  `clientID` varchar(25) NOT NULL,
  `message` varchar(300) NOT NULL,
  `messageBy` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  `type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `s_no` int(123) NOT NULL,
  `dieticianID` varchar(1234) NOT NULL,
  `dietitianuserID` varchar(1234) NOT NULL,
  `frmID` varchar(1234) DEFAULT NULL,
  `ttl` mediumtext NOT NULL,
  `body` mediumtext NOT NULL,
  `clpsky` varchar(1234) DEFAULT NULL,
  `mssgid` varchar(124) DEFAULT NULL,
  `dttmstmp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`s_no`, `dieticianID`, `dietitianuserID`, `frmID`, `ttl`, `body`, `clpsky`, `mssgid`, `dttmstmp`) VALUES
(1, '', '', '747547245786', 'hi guyzz', 'hello ', 'campaign_collapse_key_7456052397568150554', '176cbbc5-ac74-4bac-971f-0a36489e1cc3', '2023-06-21 13:01:23'),
(2, '', '', '747547245786', 'Sam', 'Hello', 'campaign_collapse_key_8476577244490333841', '4887597f-70f6-4a29-a08f-e332e36e46ff', '2023-06-21 14:36:08'),
(3, '', '', '747547245786', 'qwertyuiop[', 'kgfzx vgutftbfuftf fy ftyuf utb uybn', 'campaign_collapse_key_6518633673182239447', '9c5552b6-4e52-4162-93b8-3f3f291b663f', '2023-06-23 12:50:37'),
(4, '', '', '747547245786', 'werthjsrhj', 'erghgfgnhtrg', 'campaign_collapse_key_5664177220005084249', 'aced5149-58d6-4a82-89b8-07a17d1653b0', '2023-06-21 14:18:33'),
(5, '', '', '747547245786', 'sdfg', 'erwteyrdfg', 'campaign_collapse_key_7473580256425890768', 'd64fb0f2-9997-49fb-afdb-9e34767fd3d8', '2023-06-21 14:21:15'),
(6, '', '', '747547245786', 'qwertyuiop', 'qwertyu uytrewq sdfgh kjhgfds sdfghjn eyjfdhh536n347 ', 'campaign_collapse_key_8120886093205476862', '0e01e49e-da14-4d57-83a7-d566a157abfb', '2023-06-23 12:53:38'),
(7, '1', 'infitsWebTeam', '', 'Profile Update', 'You Updated test user 2 Profile now.', '', '', '2024-01-14 09:39:00'),
(8, '1', 'infitsWebTeam', '', 'Profile Update', 'You Updated test user 2 Profile now.', '', '', '2024-01-14 09:52:06'),
(9, '1', 'infitsWebTeam', '', 'Profile Update', 'You Updated test user 2 Profile now.', '', '', '2024-01-14 09:52:38'),
(10, '1', 'infitsWebTeam', '', 'Profile Update', 'You Updated test user 2 Profile now.', '', '', '2024-01-14 11:34:18'),
(11, '1', 'infitsWebTeam', '', 'Profile Update', 'You Updated test user 2 Profile now.', '', '', '2024-01-16 15:24:33'),
(18, '1', 'InfitsWebTeam', NULL, 'Reminder', 'You have In person appointment with cherry on 18 Feb 2024 at 08:32 PM', NULL, NULL, '2024-02-17 15:18:31'),
(19, '1', 'InfitsWebTeam', NULL, 'Reminder', 'You have In person appointment with test user 2 on 17 Feb 2024 at 09:23 PM', NULL, NULL, '2024-02-17 15:54:14'),
(20, '1', 'InfitsWebTeam', NULL, 'Reminder', 'You have Videocall appointment with test user 2 on 28 Feb 2024 at 04:29 PM', NULL, NULL, '2024-02-28 10:46:02'),
(21, '1', 'InfitsWebTeam', NULL, 'Reminder', 'You have Videocall appointment with cherry on 28 Feb 2024 at 04:23 PM', NULL, NULL, '2024-02-28 10:54:34'),
(22, '1', 'Infits Web Team', NULL, 'Reminder', 'You have Videocall appointment with test user 1 on 11 Mar 2024 at 08:35 PM', NULL, NULL, '2024-03-11 14:06:08'),
(23, '1', 'Infits Web Team', NULL, 'Reminder', 'You have Call appointment with cherry on 11 Mar 2024 at 09:41 PM', NULL, NULL, '2024-03-11 14:07:35'),
(24, '1', 'Infits Web Team', NULL, 'Reminder', 'You have Videocall appointment with test user 1 on 12 Mar 2024 at 08:02 PM', NULL, NULL, '2024-03-12 12:32:49'),
(25, '1', 'Infits Web Team', NULL, 'Reminder', 'You have In person appointment with test user 1 on 16 Mar 2024 at 03:33 AM', NULL, NULL, '2024-03-15 19:04:21'),
(26, '1', 'Infits Web Team', NULL, 'Reminder', 'You have Videocall appointment with test user 2 on 16 Mar 2024 at 04:41 AM', NULL, NULL, '2024-03-15 19:05:59'),
(27, '1', 'Infits Web Team', NULL, 'Reminder', 'You have In person appointment with test user 1 on 27 Mar 2024 at 02:17 AM', NULL, NULL, '2024-03-26 17:45:19'),
(28, '1', 'Infits Web Team', NULL, 'Reminder', 'You have Videocall appointment with test user 2 on 28 Mar 2024 at 02:24 AM', NULL, NULL, '2024-03-26 17:46:29'),
(29, '1', 'infitsWebTeam', NULL, 'Profile Update', 'You Updated Rajat_3030 Profile now.', NULL, NULL, '2024-03-28 14:55:28'),
(30, '1', 'infitsWebTeam', NULL, 'Profile Update', 'You Updated Rajat_3035 Profile now.', NULL, NULL, '2024-03-28 14:55:43'),
(31, '1', 'infitsWebTeam', NULL, 'Profile Update', 'You Updated Cherry Profile now.', NULL, NULL, '2024-03-28 14:57:44'),
(32, '1', 'infitsWebTeam', NULL, 'Profile Update', 'You Updated Cherry Profile now.', NULL, NULL, '2024-03-29 11:14:12'),
(33, '1', 'infitsWebTeam', NULL, 'Profile Update', 'You Updated Cherry Profile now.', NULL, NULL, '2024-03-31 06:45:49'),
(34, '1', 'infitsWebTeam', NULL, 'Profile Update', 'You Updated test user 2 Profile now.', NULL, NULL, '2024-03-31 07:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification_show_status`
--

CREATE TABLE `notification_show_status` (
  `id` int(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(255) NOT NULL,
  `show_all_notifications` int(11) NOT NULL DEFAULT 0,
  `show_client_updates` int(11) NOT NULL DEFAULT 0,
  `show_consultation_reminders` int(11) NOT NULL DEFAULT 0,
  `show_appointments` int(11) NOT NULL DEFAULT 0,
  `show_live_notifications` int(11) NOT NULL DEFAULT 0,
  `show_new_messages` int(11) NOT NULL DEFAULT 0,
  `show_payment_notifications` int(11) NOT NULL DEFAULT 0,
  `show_client_calls` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification_show_status`
--

INSERT INTO `notification_show_status` (`id`, `dietitian_id`, `dietitianuserID`, `show_all_notifications`, `show_client_updates`, `show_consultation_reminders`, `show_appointments`, `show_live_notifications`, `show_new_messages`, `show_payment_notifications`, `show_client_calls`) VALUES
(1, 1, 'infitsWebTeam', 1, 1, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `email` text NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendingclient`
--

CREATE TABLE `pendingclient` (
  `client_id` int(11) NOT NULL,
  `vercode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendingclient`
--

INSERT INTO `pendingclient` (`client_id`, `vercode`) VALUES
(4, 'c5BH9DYATy'),
(5, 'tFmPbEX7K8'),
(6, 'c5BH9DYATy');

-- --------------------------------------------------------

--
-- Table structure for table `referral_table`
--

CREATE TABLE `referral_table` (
  `row_id` int(11) NOT NULL,
  `clientuserID` varchar(25) NOT NULL,
  `referralCode` varchar(8) NOT NULL,
  `activeUsers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral_table`
--

INSERT INTO `referral_table` (`row_id`, `clientuserID`, `referralCode`, `activeUsers`) VALUES
(1, 'debarghyabasak', 'DEBA8860', 'none'),
(2, '', '', ''),
(3, 'vaishali', 'VAIS7085', 'none'),
(4, 'annu', 'ANNU8193', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL,
  `dietitianuserID` varchar(30) NOT NULL,
  `client_id` int(11) NOT NULL,
  `water_interval` varchar(30) NOT NULL,
  `water_amount` varchar(30) NOT NULL,
  `sleep_time` time NOT NULL,
  `wake_time` time NOT NULL,
  `breakfast_time` time NOT NULL,
  `lunch_time` time NOT NULL,
  `snacks_time` time NOT NULL,
  `dinner_time` time NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `dietitianuserID`, `client_id`, `water_interval`, `water_amount`, `sleep_time`, `wake_time`, `breakfast_time`, `lunch_time`, `snacks_time`, `dinner_time`, `time`) VALUES
(60, 'infitsWebTeam', 4, '3 Hour', '4 Glasses', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2023-06-15 15:20:13'),
(61, 'infitsWebTeam', 33, '', '', '10:00:00', '05:00:00', '07:00:00', '01:00:00', '05:00:00', '09:00:00', '2024-03-31 06:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `ropejumptracker`
--

CREATE TABLE `ropejumptracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `steps` int(11) DEFAULT NULL,
  `distance` decimal(5,2) DEFAULT NULL,
  `calories` decimal(5,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `goal` int(11) NOT NULL DEFAULT 1000,
  `runtime` float(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `runningtracker`
--

CREATE TABLE `runningtracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `distance` decimal(10,0) DEFAULT NULL,
  `calories` decimal(10,0) DEFAULT NULL,
  `runtime` float(10,0) DEFAULT NULL,
  `goal` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `runningtracker`
--

INSERT INTO `runningtracker` (`row_id`, `client_id`, `clientuserID`, `distance`, `calories`, `runtime`, `goal`, `date`) VALUES
(1, 1, 'dev', 0, 0, 0, 1, '2024-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `section1q1`
--

CREATE TABLE `section1q1` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section1q2`
--

CREATE TABLE `section1q2` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section1q3`
--

CREATE TABLE `section1q3` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section1q4`
--

CREATE TABLE `section1q4` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section1q5`
--

CREATE TABLE `section1q5` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section1q6`
--

CREATE TABLE `section1q6` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section1q7`
--

CREATE TABLE `section1q7` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section1q8`
--

CREATE TABLE `section1q8` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q1`
--

CREATE TABLE `section2q1` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q2`
--

CREATE TABLE `section2q2` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q3`
--

CREATE TABLE `section2q3` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q4`
--

CREATE TABLE `section2q4` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q5`
--

CREATE TABLE `section2q5` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q6`
--

CREATE TABLE `section2q6` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q7`
--

CREATE TABLE `section2q7` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section2q8`
--

CREATE TABLE `section2q8` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q1`
--

CREATE TABLE `section3q1` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q2`
--

CREATE TABLE `section3q2` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q3`
--

CREATE TABLE `section3q3` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q4`
--

CREATE TABLE `section3q4` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q5`
--

CREATE TABLE `section3q5` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q6`
--

CREATE TABLE `section3q6` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q7`
--

CREATE TABLE `section3q7` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q8`
--

CREATE TABLE `section3q8` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q9`
--

CREATE TABLE `section3q9` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q10`
--

CREATE TABLE `section3q10` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section3q11`
--

CREATE TABLE `section3q11` (
  `clientuserID` varchar(30) NOT NULL,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section4q1`
--

CREATE TABLE `section4q1` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section4q2`
--

CREATE TABLE `section4q2` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section4q3`
--

CREATE TABLE `section4q3` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section4q4`
--

CREATE TABLE `section4q4` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section4q5`
--

CREATE TABLE `section4q5` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section4q6`
--

CREATE TABLE `section4q6` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q1`
--

CREATE TABLE `section5q1` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q2`
--

CREATE TABLE `section5q2` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q3`
--

CREATE TABLE `section5q3` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q4`
--

CREATE TABLE `section5q4` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q5`
--

CREATE TABLE `section5q5` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q6`
--

CREATE TABLE `section5q6` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q7`
--

CREATE TABLE `section5q7` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q8`
--

CREATE TABLE `section5q8` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q9`
--

CREATE TABLE `section5q9` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q10`
--

CREATE TABLE `section5q10` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q11`
--

CREATE TABLE `section5q11` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q12`
--

CREATE TABLE `section5q12` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section5q13`
--

CREATE TABLE `section5q13` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q1`
--

CREATE TABLE `section6q1` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q2`
--

CREATE TABLE `section6q2` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q3`
--

CREATE TABLE `section6q3` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q4`
--

CREATE TABLE `section6q4` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q5`
--

CREATE TABLE `section6q5` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q6`
--

CREATE TABLE `section6q6` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q7`
--

CREATE TABLE `section6q7` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q8`
--

CREATE TABLE `section6q8` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q9`
--

CREATE TABLE `section6q9` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q10`
--

CREATE TABLE `section6q10` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q11`
--

CREATE TABLE `section6q11` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q12`
--

CREATE TABLE `section6q12` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q13`
--

CREATE TABLE `section6q13` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section6q14`
--

CREATE TABLE `section6q14` (
  `clientuserID` varchar(100) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sectionprogress`
--

CREATE TABLE `sectionprogress` (
  `clientuserID` varchar(30) NOT NULL,
  `section1` int(11) DEFAULT NULL,
  `section2` int(11) DEFAULT NULL,
  `section3` int(11) DEFAULT NULL,
  `section4` int(11) DEFAULT NULL,
  `section5` int(11) DEFAULT NULL,
  `section6` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sectionprogressbar`
--

CREATE TABLE `sectionprogressbar` (
  `clientuserID` varchar(30) NOT NULL,
  `newAnswer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skatingtracker`
--

CREATE TABLE `skatingtracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `steps` int(11) DEFAULT NULL,
  `distance` decimal(5,2) DEFAULT NULL,
  `calories` decimal(5,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `goal` int(11) NOT NULL DEFAULT 1000,
  `runtime` float(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sleeptracker`
--

CREATE TABLE `sleeptracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `sleeptime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `waketime` timestamp NULL DEFAULT NULL,
  `hrsSlept` int(11) DEFAULT NULL,
  `goal` int(11) NOT NULL,
  `minsSlept` int(11) DEFAULT NULL,
  `dateandtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sleeptracker`
--

INSERT INTO `sleeptracker` (`row_id`, `client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `sleeptime`, `waketime`, `hrsSlept`, `goal`, `minsSlept`, `dateandtime`) VALUES
(1, 4, 'testuser', 1, 'infitsWebTeam', '2024-01-30 06:29:02', '2024-01-30 06:29:08', 0, 8, 0, '2024-01-30 18:29:08'),
(2, 7, 'vaishali', -1, '-1', '2024-01-30 06:36:28', '2024-01-30 06:36:33', 0, 8, 0, '2024-01-30 18:36:33'),
(3, 3, 'debarghyabasak', -1, '-1', '2024-01-30 11:32:17', '2024-01-30 11:32:19', 0, 8, 0, '2024-01-30 23:32:19'),
(4, 7, 'vaishali', -1, '-1', '2024-01-31 10:15:56', '2024-01-31 10:16:05', 0, 8, 0, '2024-01-31 10:16:05'),
(5, 7, 'vaishali', -1, '-1', '2024-01-31 10:30:01', '2024-01-31 10:31:13', 0, 8, 1, '2024-01-31 10:31:13'),
(6, 3, 'debarghyabasak', -1, '-1', '2024-01-31 01:57:29', '2024-01-31 01:57:30', 0, 8, 0, '2024-01-31 13:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `stairclimbtracker`
--

CREATE TABLE `stairclimbtracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `steps` int(11) DEFAULT NULL,
  `distance` decimal(5,2) DEFAULT NULL,
  `calories` decimal(5,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `goal` int(11) DEFAULT 1000,
  `runtime` float(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `steptracker`
--

CREATE TABLE `steptracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `steps` int(11) DEFAULT NULL,
  `dateandtime` datetime DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `calories` varchar(45) DEFAULT NULL,
  `distance` varchar(45) DEFAULT NULL,
  `avgspeed` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `steptracker`
--

INSERT INTO `steptracker` (`row_id`, `client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `steps`, `dateandtime`, `goal`, `calories`, `distance`, `avgspeed`) VALUES
(1, 0, '', 0, '', 5, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trekkingtracker`
--

CREATE TABLE `trekkingtracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `steps` int(11) DEFAULT NULL,
  `distance` decimal(5,2) DEFAULT NULL,
  `calories` decimal(5,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `goal` int(11) NOT NULL DEFAULT 1000,
  `runtime` float(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `updated_by_users`
--

CREATE TABLE `updated_by_users` (
  `id` int(11) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `updated_drecipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updated_by_users`
--

INSERT INTO `updated_by_users` (`id`, `dietitian_id`, `updated_drecipe_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3),
(4, 3, 4),
(5, 3, 5),
(6, 1, 230),
(7, 1, 1),
(8, 1, 1),
(9, 1, 5),
(10, 1, 5),
(11, 1, 6),
(12, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `walkingtracker`
--

CREATE TABLE `walkingtracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `steps` int(11) DEFAULT NULL,
  `distance` varchar(20) DEFAULT NULL,
  `calories` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `runtime` float(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `watertracker`
--

CREATE TABLE `watertracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `drinkConsumed` varchar(50) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `goal` int(11) NOT NULL DEFAULT 1800,
  `amount` int(11) DEFAULT NULL,
  `perGlassAmount` int(11) NOT NULL DEFAULT 200,
  `dateandtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watertracker`
--

INSERT INTO `watertracker` (`row_id`, `client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `drinkConsumed`, `type`, `goal`, `amount`, `perGlassAmount`, `dateandtime`) VALUES
(1, 0, 'debarghyabasak', -1, '-1', '0', 'water', 1800, 800, 200, '2024-01-29 00:00:00'),
(2, 7, 'vaishali', -1, '-1', '0', 'water', 1600, 0, 200, '2024-01-31 00:00:00'),
(3, 7, 'vaishali', -1, '-1', '200', 'soda', 1600, 200, 200, '2024-01-31 00:00:00'),
(6, 4, 'testuser', 1, 'infitsWebTeam', '0', 'water', 1600, 800, 200, '2024-01-31 00:00:00'),
(7, 7, 'vaishali', -1, '-1', '500', 'juice', 1600, 500, 200, '2024-01-31 00:00:00'),
(8, 7, 'vaishali', -1, '-1', '600', 'coffee', 1600, 600, 200, '2024-01-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `weighttracker`
--

CREATE TABLE `weighttracker` (
  `row_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `clientuserID` varchar(30) NOT NULL,
  `dietitian_id` int(11) NOT NULL,
  `dietitianuserID` varchar(50) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `bmi` float NOT NULL,
  `goal` float NOT NULL,
  `dateandtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weighttracker`
--

INSERT INTO `weighttracker` (`row_id`, `client_id`, `clientuserID`, `dietitian_id`, `dietitianuserID`, `height`, `weight`, `bmi`, `goal`, `dateandtime`) VALUES
(1, 0, 'debarghyabasak', -1, '-1', 170, 55, 18, 7, '2024-01-29 09:43:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitygoals`
--
ALTER TABLE `activitygoals`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `activitytracker`
--
ALTER TABLE `activitytracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `addclient`
--
ALTER TABLE `addclient`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `clientuserID` (`clientuserID`),
  ADD KEY `dietitianuserID` (`dietitianuserID`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `calorietracker`
--
ALTER TABLE `calorietracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `calorie_burnt`
--
ALTER TABLE `calorie_burnt`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `calorie_consumed`
--
ALTER TABLE `calorie_consumed`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `UNIQUE` (`client_id`);

--
-- Indexes for table `client_forms_docs`
--
ALTER TABLE `client_forms_docs`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `create_event`
--
ALTER TABLE `create_event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `create_plan`
--
ALTER TABLE `create_plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `dietitianuserID` (`dietitianuserID`);

--
-- Indexes for table `cyclingtracker`
--
ALTER TABLE `cyclingtracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `default_recipes`
--
ALTER TABLE `default_recipes`
  ADD PRIMARY KEY (`drecipe_id`);

--
-- Indexes for table `dietitian`
--
ALTER TABLE `dietitian`
  ADD PRIMARY KEY (`dietitian_id`),
  ADD UNIQUE KEY `dietitian_id` (`dietitian_id`),
  ADD UNIQUE KEY `dietitianuserID` (`dietitianuserID`);

--
-- Indexes for table `dietitian_forms`
--
ALTER TABLE `dietitian_forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `dietitian_recipes`
--
ALTER TABLE `dietitian_recipes`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `dietitian_tasks`
--
ALTER TABLE `dietitian_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `diet_chart`
--
ALTER TABLE `diet_chart`
  ADD PRIMARY KEY (`dietchart_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`goal_id`),
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD UNIQUE KEY `dietitian_id` (`dietitian_id`);

--
-- Indexes for table `heartrate`
--
ALTER TABLE `heartrate`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `in_app_notifications`
--
ALTER TABLE `in_app_notifications`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `live`
--
ALTER TABLE `live`
  ADD PRIMARY KEY (`dietitian_id`);

--
-- Indexes for table `livemessage`
--
ALTER TABLE `livemessage`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `meal_tracker`
--
ALTER TABLE `meal_tracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `notification_show_status`
--
ALTER TABLE `notification_show_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingclient`
--
ALTER TABLE `pendingclient`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `referral_table`
--
ALTER TABLE `referral_table`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`),
  ADD UNIQUE KEY `client_id` (`client_id`),
  ADD KEY `dietitianuserID` (`dietitianuserID`);

--
-- Indexes for table `ropejumptracker`
--
ALTER TABLE `ropejumptracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `runningtracker`
--
ALTER TABLE `runningtracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `section1q1`
--
ALTER TABLE `section1q1`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section1q2`
--
ALTER TABLE `section1q2`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section1q3`
--
ALTER TABLE `section1q3`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section1q4`
--
ALTER TABLE `section1q4`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section1q5`
--
ALTER TABLE `section1q5`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section1q6`
--
ALTER TABLE `section1q6`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section1q7`
--
ALTER TABLE `section1q7`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section1q8`
--
ALTER TABLE `section1q8`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q1`
--
ALTER TABLE `section2q1`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q2`
--
ALTER TABLE `section2q2`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q3`
--
ALTER TABLE `section2q3`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q4`
--
ALTER TABLE `section2q4`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q5`
--
ALTER TABLE `section2q5`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q6`
--
ALTER TABLE `section2q6`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q7`
--
ALTER TABLE `section2q7`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section2q8`
--
ALTER TABLE `section2q8`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q1`
--
ALTER TABLE `section3q1`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q2`
--
ALTER TABLE `section3q2`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q3`
--
ALTER TABLE `section3q3`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q4`
--
ALTER TABLE `section3q4`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q5`
--
ALTER TABLE `section3q5`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q6`
--
ALTER TABLE `section3q6`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q7`
--
ALTER TABLE `section3q7`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q8`
--
ALTER TABLE `section3q8`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q9`
--
ALTER TABLE `section3q9`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q10`
--
ALTER TABLE `section3q10`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `section3q11`
--
ALTER TABLE `section3q11`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `sectionprogress`
--
ALTER TABLE `sectionprogress`
  ADD PRIMARY KEY (`clientuserID`);

--
-- Indexes for table `skatingtracker`
--
ALTER TABLE `skatingtracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `sleeptracker`
--
ALTER TABLE `sleeptracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `stairclimbtracker`
--
ALTER TABLE `stairclimbtracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `steptracker`
--
ALTER TABLE `steptracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `trekkingtracker`
--
ALTER TABLE `trekkingtracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `updated_by_users`
--
ALTER TABLE `updated_by_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walkingtracker`
--
ALTER TABLE `walkingtracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `watertracker`
--
ALTER TABLE `watertracker`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `weighttracker`
--
ALTER TABLE `weighttracker`
  ADD PRIMARY KEY (`row_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitygoals`
--
ALTER TABLE `activitygoals`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activitytracker`
--
ALTER TABLE `activitytracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addclient`
--
ALTER TABLE `addclient`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `calorietracker`
--
ALTER TABLE `calorietracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `calorie_burnt`
--
ALTER TABLE `calorie_burnt`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `calorie_consumed`
--
ALTER TABLE `calorie_consumed`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client_forms_docs`
--
ALTER TABLE `client_forms_docs`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `create_event`
--
ALTER TABLE `create_event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `create_plan`
--
ALTER TABLE `create_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `cyclingtracker`
--
ALTER TABLE `cyclingtracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dietitian`
--
ALTER TABLE `dietitian`
  MODIFY `dietitian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dietitian_forms`
--
ALTER TABLE `dietitian_forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dietitian_recipes`
--
ALTER TABLE `dietitian_recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dietitian_tasks`
--
ALTER TABLE `dietitian_tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `diet_chart`
--
ALTER TABLE `diet_chart`
  MODIFY `dietchart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `heartrate`
--
ALTER TABLE `heartrate`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_app_notifications`
--
ALTER TABLE `in_app_notifications`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `live`
--
ALTER TABLE `live`
  MODIFY `dietitian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `livemessage`
--
ALTER TABLE `livemessage`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meal_tracker`
--
ALTER TABLE `meal_tracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2371;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `s_no` int(123) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notification_show_status`
--
ALTER TABLE `notification_show_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referral_table`
--
ALTER TABLE `referral_table`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ropejumptracker`
--
ALTER TABLE `ropejumptracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `runningtracker`
--
ALTER TABLE `runningtracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skatingtracker`
--
ALTER TABLE `skatingtracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sleeptracker`
--
ALTER TABLE `sleeptracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stairclimbtracker`
--
ALTER TABLE `stairclimbtracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `steptracker`
--
ALTER TABLE `steptracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trekkingtracker`
--
ALTER TABLE `trekkingtracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `updated_by_users`
--
ALTER TABLE `updated_by_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `walkingtracker`
--
ALTER TABLE `walkingtracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watertracker`
--
ALTER TABLE `watertracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weighttracker`
--
ALTER TABLE `weighttracker`
  MODIFY `row_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
