-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin-user`
--

CREATE TABLE `admin-user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `usr-name` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin-user`
--

INSERT INTO `admin-user` (`id`, `name`, `usr-name`, `pass`, `role`) VALUES
(1, 'Naimul islam', 'naimul007A', 'Naimul100', '1'),
(15, 'Amdadul', 'naimul007a', 'naimul100', '0'),
(16, 'Abir', 'abir09', 'abir00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(250) NOT NULL,
  `noPost` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `noPost`) VALUES
(3, 'Sport', '2'),
(4, 'Politics', '1'),
(5, 'Entertainment', '2'),
(6, 'Education', '5'),
(9, 'International', '2');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_cate` varchar(250) NOT NULL,
  `post_decs` text NOT NULL,
  `post_img` varchar(250) NOT NULL,
  `post_ath` varchar(250) NOT NULL,
  `post_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_cate`, `post_decs`, `post_img`, `post_ath`, `post_date`) VALUES
(24, 'just test', '3', 'hello world', 'Screen Shot 2022-12-05 at 17.15.28.png', '0', 'Sun 11 Dec,2022'),
(25, 'test2', '6', 'test 2', 'meeting-g8e5634252_1280.jpg', '0', 'Sun 11 Dec,2022'),
(26, 'this is a test post', '6', 'ssss', 'Screen Shot 2022-12-05 at 17.15.28.png', '1', 'Sun 11 Dec,2022'),
(27, 'hello', '4', 'hello everyone', 'meeting-g8e5634252_1280.jpg', '1', 'Sun 11 Dec,2022'),
(28, 'test post2', '9', 'test post', 'people-g1615fa5d7_640.jpg', '1', 'Sun 11 Dec,2022'),
(29, 'hello hi ', '5', 'bye bye', '2122.jpg', '1', 'Sun 11 Dec,2022'),
(30, '$10,000 to Flood Relief for Central West NSW', '9', 'Mingara Leisure Group Provides $10,000 to Flood Relief for Central West NSW The recent floods in the Central West of NSW have left a trail of devastation for many communities. Unbelievable images showing the speed and power at which these.', 'NSWFloods_slider-feature.jpg', '1', 'Sun 11 Dec,2022'),
(34, 'How to treat your sweet on the Mountains this Valentine’s Day', '5', 'Now, while we dismissed giving a bunch of roses, we’re not recommending you break the bank. We’ve compiled a few of our favourite suggestions below. Let’s look at gifts in two sections: him then her\r\n\r\nHim:\r\n\r\nWe know that most boys get excited about tech and also enjoy listening to their favourite tunes, so this year Google Nest Audio heads the top of our list. A smart home assistant, the Google Nest Audio can help you switch on lights, set reminders (helpful to remind him about special events throughout the year), step through recipes and most importantly play his favourite music. \r\n\r\nThe advantage of the Nest Audio over the Google Nest Mini or Google Nest Hub is the awesome sound quality. Packing a punch in even the largest of lounge rooms, the Google Nest Audio connects to your Spotify account and will play whatever you like by simply saying “Hey Google, play the Goo Goo Dolls,” (like what we did there?). In an instant, warm, rich tones of mild American rock will fill the surrounding spaces. And that’s really what we were getting at earlier, the sound quality. Designed for audio quality first and foremost, the Nest Audio’s directional speaker with built in subwoofer and tweeter, will make you all dance around the room – just like we did when we put it to the test. Let’s face it, you can’t listen to your favourite band without the presence of some bass.', 'Valentines-Banner.jpg', '1', 'Sun 11 Dec,2022'),
(36, 'Workout with Tiff (Part 2)', '6', 'PT Tiff takes you through another home workout exercise in the studio at Mingara One Fitness on the Central Coast, Australia.', 'Featured_Image_MingaraOne_Thumbnail_HomeWorkouts_Tiff_Part-2.jpg', '1', 'Sun 11 Dec,2022'),
(38, 'If it was easy, ', '6', 'Manuela: I am Manuela, I am originally from Italy. I moved to the Uk five and a half years ago. I am a professional MMA fighter and fitness coach. I have a background in CrossFit, functional training, martial arts and nutrition. I also study osteopathy. \r\n\r\nSam: Wow you have such a range of skills where do I start ….. tell me a bit about your career in MMA when did you start and how has it gone since then?\r\n\r\nManuela: I started MMA as soon as I moved to the UK. During the lockdown time I couldn’t compete however it allowed me to focus purely on MMA training. As I am part of the GB academy team we were allowed to continue during covid six times a week. I had my Bellator (American MMA promotional organisation) pro debut in Canada. I have also fought under Combat Global where I got called up to a fight short notice. I only had three weeks to prepare for the fight, I had to cut weight and really focus on my nutrition and get in the mindset. She happened to be one of the best in Europe as well! Against the odds I won the fight. My next opponent was under Ballator, this was a frustrating one. I won the fight but the judges deemed the opponent to have scraped the victory. I felt it was unfair and they were doing what was best for their promotions. I had to bounce back and that is what I am doing now. Training so I am even stronger next time.\r\n\r\nSam: Your journey is so interesting. What does success look like for you? What level of MMA do you aspire to get too?\r\n\r\nManuela: Obviously, every fighters dream is to be involved in the UFC. To compete in Las Vegas with such a big audience in front of the best in the world.\r\n\r\nSam: UFC has been in the spotlight more and more over the past few years. Have you seen this as a big positive change for the support and have you seen more competition because of it?\r\n\r\nManuela: I think it’s been amazing for people to recognise and engage with the sport. It has resulted in a lot more funding as well so there are more opportunities for people looking to start the sport.\r\n\r\nBook Manuela here - Book now\r\n\r\nSam: What would you say to someone looking to get into martial arts?\r\n\r\nManuela: I would say if you want to take it seriously the first steps are to find a good team and a good coach. You need people you can rely on who you can stick too. Because if you keep changing teams it is hard to progress. You need a coach who will challenge you every day. If you are going in to spar and end up winning every fight. Then you are not challenging yourself and learning. Becoming too comfortable can be bad for improvement.\r\n\r\nSam: That’s really useful to know. Just on your drive and motivation. Clearly you are someone who doesn’t give up easily considering you have had so many fights and train so intensely. What is the key thing that keeps you going?\r\n\r\nManuela: I would say that it’s about setting goals. I make sure I can set goals that are achievable then I get a step closer to my dreams. I also live in London which is a really expensive city. So I know I have to work hard to stay here. I always say to myself that if it was easy everyone would do it. So I challenge myself to the maximum and give that extra % to get the edge over my opponents. This is what helps me be more successful and do what others can’t do. ', 'SPORTSESSION-Coach-Interview--2-45535.png', '0', 'Sun 11 Dec,2022'),
(40, 'So you have made your profile ', '3', 'So you have made your profile but still cannot get enough sessions? Learn how to encourage clients to pay attention to you and book sessions in our new article.', 'How-to-Encourage-Clients-to-Book-Sessions-41517-4.jpg', '1', '11 Dec,2022'),
(41, 'test', '6', 'sssssssssssssssssssssss', 'phone-removebg-preview.png', '1', '11 Dec,2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin-user`
--
ALTER TABLE `admin-user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin-user`
--
ALTER TABLE `admin-user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
