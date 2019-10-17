-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 10:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Python'),
(2, 'C++'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(9, 'sure come inbox!', 'ibtisamur_rehman', 'posted_to', '2017-12-05 10:48:41', 'no', 76),
(10, 'i m also available if u need any help...', 'ammar_ahmed', 'posted_to', '2017-12-05 12:13:39', 'no', 76),
(11, 'okay thanks ammar', 'mehran_butt', 'posted_to', '2017-12-05 12:18:25', 'no', 76),
(12, 'no problem mehran :)', 'ammar_ahmed', 'posted_to', '2017-12-05 16:15:28', 'no', 76),
(13, 'okay okay\r\n', 'ibtisamur_rehman', 'posted_to', '2017-12-05 17:22:43', 'no', 74),
(14, 'okay\r\n', 'ammar_ahmed', 'posted_to', '2017-12-05 17:23:43', 'no', 74),
(15, 'okay 3', 'mehran_butt', 'posted_to', '2017-12-05 17:25:51', 'no', 74),
(16, 'ibm', 'mehran_butt', 'posted_to', '2017-12-09 06:06:12', 'no', 82),
(17, 'i like that', 'mehran_butt', 'posted_to', '2017-12-10 06:30:16', 'no', 87),
(18, 'ibtisam', 'mehran_butt', 'ammar_ahmed', '2017-12-10 13:19:39', 'no', 85);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`) VALUES
(9, '', 'mehran_butt'),
(13, '', 'ammar_ahmed'),
(26, 'ahmad_kamal', 'ammar_ahmed'),
(27, 'ahmad_kamal', 'ammar_ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(27, 'mehran_butt', 78),
(29, 'mehran_butt', 74),
(30, 'mehran_butt', 70),
(31, 'ibtisamur_rehman', 79),
(32, 'ibtisamur_rehman', 75),
(33, 'mehran_butt', 82),
(34, 'mehran_butt', 85),
(35, 'mehran_butt', 83),
(36, 'mehran_butt', 84),
(37, 'ibtisamur_rehman', 86);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(46, 'ammar_ahmed', 'mehran_butt', 'hello ammar', '2017-12-03 08:13:57', 'yes', 'yes', 'no'),
(47, 'mehran_butt', 'ammar_ahmed', 'hi butt', '2017-12-03 08:15:10', 'yes', 'yes', 'no'),
(48, 'ammar_ahmed', 'ammar_ahmed', 'myself', '2017-12-03 08:15:58', 'yes', 'yes', 'no'),
(49, 'mehran_butt', 'mehran_butt', 'yo man!', '2017-12-04 13:37:49', 'yes', 'yes', 'no'),
(50, 'mehran_butt', 'ibtisamur_rehman', 'hi mehran!', '2017-12-08 13:11:39', 'yes', 'yes', 'no'),
(51, 'mehran_butt', 'ibtisamur_rehman', 'well...', '2017-12-08 13:13:55', 'yes', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_to`, `user_from`, `message`, `link`, `datetime`, `opened`, `viewed`) VALUES
(19, 'mehran_butt', 'ammar_ahmed', 'Ammar Ahmed commented on your post', 'post.php?id=76', '2017-12-05 12:13:39', 'yes', 'yes'),
(20, 'ibtisamur_rehman', 'ammar_ahmed', 'Ammar Ahmed commented on your profile post', 'post.php?id=76', '2017-12-05 12:13:39', 'yes', 'yes'),
(21, 'ibtisamur_rehman', 'mehran_butt', 'Mehran Butt commented on your profile post', 'post.php?id=76', '2017-12-05 12:18:25', 'yes', 'yes'),
(22, 'ammar_ahmed', 'mehran_butt', 'Mehran Butt commented on a post you commented on', 'post.php?id=76', '2017-12-05 12:18:25', 'yes', 'yes'),
(23, 'mehran_butt', 'ammar_ahmed', 'Ammar Ahmed commented on your post', 'post.php?id=76', '2017-12-05 16:15:29', 'yes', 'yes'),
(24, 'ibtisamur_rehman', 'ammar_ahmed', 'Ammar Ahmed commented on your profile post', 'post.php?id=76', '2017-12-05 16:15:29', 'yes', 'yes'),
(25, 'mehran_butt', 'ibtisamur_rehman', 'Ibtisam ur Rehman commented on your post', 'post.php?id=74', '2017-12-05 17:22:43', 'yes', 'yes'),
(26, 'ammar_ahmed', 'ibtisamur_rehman', 'Ibtisam ur Rehman commented on your profile post', 'post.php?id=74', '2017-12-05 17:22:43', 'yes', 'yes'),
(27, 'mehran_butt', 'ammar_ahmed', 'Ammar Ahmed commented on your post', 'post.php?id=74', '2017-12-05 17:23:43', 'yes', 'yes'),
(28, 'ibtisamur_rehman', 'ammar_ahmed', 'Ammar Ahmed commented on a post you commented on', 'post.php?id=74', '2017-12-05 17:23:44', 'yes', 'yes'),
(29, 'ammar_ahmed', 'mehran_butt', 'Mehran Butt commented on your profile post', 'post.php?id=74', '2017-12-05 17:25:51', 'yes', 'yes'),
(30, 'ibtisamur_rehman', 'mehran_butt', 'Mehran Butt commented on a post you commented on', 'post.php?id=74', '2017-12-05 17:25:51', 'yes', 'yes'),
(31, 'ibtisamur_rehman', 'mehran_butt', 'Mehran Butt liked your post', 'post.php?id=77', '2017-12-05 17:33:00', 'yes', 'yes'),
(32, 'ibtisamur_rehman', 'mehran_butt', 'Mehran Butt liked your post', 'post.php?id=78', '2017-12-05 17:47:55', 'yes', 'yes'),
(33, 'mehran_butt', 'ibtisamur_rehman', 'Ibtisam ur Rehman posted on your profile', 'post.php?id=79', '2017-12-05 17:48:42', 'no', 'yes'),
(34, 'ammar_ahmed', 'mehran_butt', 'Mehran Butt liked your post', 'post.php?id=70', '2017-12-05 18:07:50', 'yes', 'yes'),
(35, 'mehran_butt', 'ibtisamur_rehman', 'Ibtisam ur Rehman liked your post', 'post.php?id=75', '2017-12-08 15:39:44', 'no', 'yes'),
(36, 'ammar_ahmed', 'mehran_butt', 'Mehran Butt liked your post', 'post.php?id=85', '2017-12-10 06:07:24', 'no', 'yes'),
(37, 'ahmad_kamal', 'mehran_butt', 'Mehran Butt liked your post', 'post.php?id=84', '2017-12-10 07:43:38', 'no', 'yes'),
(38, 'ammar_ahmed', 'mehran_butt', 'Mehran Butt commented on your post', 'post.php?id=85', '2017-12-10 13:19:39', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`, `image`, `categories_id`) VALUES
(66, 'ammar', 'First Post by Ammar Ahmed', 'ammar_ahmed', 'none', '2017-12-03 07:56:45', 'no', 'no', 0, '', 1),
(67, 'image to show and image to show', 'image to show learning', 'ammar_ahmed', 'none', '2017-12-03 07:58:41', 'no', 'yes', 0, '', 0),
(68, 'img', 'image to learn', 'ammar_ahmed', 'none', '2017-12-03 08:10:14', 'no', 'no', 0, 'assets/images/posts/5a23b166b89cceducation-quotes-shutterstock.jpg', 0),
(69, 'meh', 'hi mehran', 'ammar_ahmed', 'mehran_butt', '2017-12-03 08:10:57', 'no', 'no', 0, '', 0),
(70, '3rdp', 'my 3rd post', 'ammar_ahmed', 'none', '2017-12-03 08:15:46', 'no', 'no', 1, '', 0),
(71, 'mehran f', 'first post by mehran', 'mehran_butt', 'none', '2017-12-03 08:18:06', 'no', 'no', 0, '', 0),
(72, 'ammar what', 'hi ammar whats happening!', 'mehran_butt', 'none', '2017-12-03 08:19:11', 'no', 'yes', 0, '', 0),
(73, 'hi ammar', 'hi ammar whats happenin', 'mehran_butt', 'ammar_ahmed', '2017-12-03 08:19:56', 'no', 'no', 0, '', 0),
(74, 'again am', 'again hi ammar', 'mehran_butt', 'ammar_ahmed', '2017-12-03 08:21:17', 'no', 'no', 1, '', 0),
(75, 'continent', 'Asia', 'mehran_butt', 'none', '2017-12-03 08:21:56', 'no', 'no', 1, 'assets/images/posts/5a23b4245c816JP_ASIA_2.jpg', 0),
(76, '', 'Hi Sir !<br /> I want to know laravel ...', 'mehran_butt', 'ibtisamur_rehman', '2017-12-05 10:47:38', 'no', 'no', 0, '', 0),
(77, '', 'hi ibm', 'mehran_butt', 'ibtisamur_rehman', '2017-12-05 17:33:00', 'no', 'no', 0, '', 0),
(78, '', 'hi again ibm!', 'mehran_butt', 'ibtisamur_rehman', '2017-12-05 17:47:55', 'no', 'no', 1, '', 0),
(79, '', 'hi butt', 'ibtisamur_rehman', 'mehran_butt', '2017-12-05 17:48:41', 'no', 'no', 1, '', 0),
(80, '', 'ibtisam first post on his own wall', 'ibtisamur_rehman', 'none', '2017-12-08 13:12:48', 'no', 'no', 0, '', 0),
(81, '', 'hi my name is ibm', 'ibtisamur_rehman', 'none', '2017-12-08 15:35:56', 'no', 'no', 0, '', 0),
(82, '', 'Dr.sb The Great', 'mehran_butt', 'none', '2017-12-08 15:41:09', 'no', 'no', 1, 'assets/images/posts/5a2ab2950e027Screenshot (4).png', 0),
(83, '', 'Pyara Afzal', 'mehran_butt', 'none', '2017-12-09 11:28:33', 'no', 'no', 1, '', 0),
(84, '', 'hi this is kamal ch', 'ahmad_kamal', 'none', '2017-12-10 05:48:02', 'no', 'no', 1, '', 0),
(85, '', 'butt g', 'ammar_ahmed', 'none', '2017-12-10 05:49:23', 'no', 'no', 1, '', 0),
(86, '', 'Be Workaholic :)', 'ibtisamur_rehman', 'none', '2017-12-10 12:53:26', 'no', 'no', 1, '', 0),
(87, '', 'ibtisam here', 'ammar_ahmed', 'none', '2017-12-10 16:57:52', 'no', 'no', 0, '', 1),
(88, '', 'my name is mehran', 'mehran_butt', 'none', '2017-12-10 19:29:58', 'no', 'no', 0, '', 1),
(89, '', 'Hi this is C category post', 'mehran_butt', 'none', '2017-12-10 20:07:11', 'no', 'no', 0, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(11, 'Ammar', 'Ahmed', 'ammar_ahmed', 'Ammar@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2017-12-03', 'assets/images/profile_pics/defaults/head_deep_blue.png', 8, 2, 'no', 'mehran_butt,'),
(12, 'Mehran', 'Butt', 'mehran_butt', 'Mehran@gmail.com', 'efe6398127928f1b2e9ef3207fb82663', '2017-12-03', 'assets/images/profile_pics/defaults/head_deep_blue.png', 14, 5, 'no', 'ahmad_kamal,ammar_ahmed,ammar_ahmed,'),
(13, 'Ibtisam ur', 'Rehman', 'ibtisamur_rehman', 'Ibm@gmail.com', 'efe6398127928f1b2e9ef3207fb82663', '2017-12-04', 'assets/images/profile_pics/defaults/head_emerald.png', 4, 2, 'no', ''),
(14, 'Ahmad', 'Kamal', 'ahmad_kamal', 'Kamal@gmail.com', 'edd40c37e1d023fa06851ac4a18decf7', '2017-12-09', 'assets/images/profile_pics/defaults/head_emerald.png', 1, 1, 'no', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
