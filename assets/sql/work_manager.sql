-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 09:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `projectName` varchar(255) DEFAULT NULL,
  `projectPosition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `userId`, `projectName`, `projectPosition`) VALUES
(85, 7, 'Production Project', 0),
(87, 7, 'Automatization Project', 1),
(88, 7, 'Distribute enough employees on every project', 2),
(89, 7, 'Project 4', 3),
(132, 4, 'Proiectul 1 nu are un nume descriptiv deoarece nu am imaginatie acuma', 0),
(133, 4, 'Project 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `taskName` varchar(255) DEFAULT NULL,
  `taskDescription` varchar(9999) DEFAULT NULL,
  `is_checked` tinyint(1) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `taskPosition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `projectId`, `taskName`, `taskDescription`, `is_checked`, `date_time`, `taskPosition`) VALUES
(161, 85, 'Increase the production by 14%', 'Details about production.\nHow to increase production.', 1, '2023-01-27 12:00:00', 0),
(164, 87, 'Improve automatizations everywhere', 'ycdtytfytfy cfy tfycfugyugy uvgugyu', 1, '2023-03-24 16:00:00', 0),
(165, 87, 'Cost for every robot', 'Robot 1 - 50m$\nRobot 2 - 25m$\nRobot 3 - 37.5m$', 0, '2023-03-23 12:00:00', 0),
(166, 87, 'Implement the robots', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\nWhy do we use it?\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n\nWhere does it come from?\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\n\nWhere can I get some?\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 0, '2023-03-21 12:00:00', 0),
(167, 88, 'Recalculate number of employees for every project', '', 0, NULL, 0),
(168, 88, 'Production project', '', 0, '2023-01-05 12:00:00', 0),
(169, 88, 'Automatization Project', '', 0, '2023-01-07 12:00:00', 0),
(170, 89, 'This is just an example to see the scrollbar for the \"Tasks Container\"', '', 0, NULL, 0),
(171, 89, 'All the projects and tasks are just examples.', '', 0, NULL, 0),
(217, 132, 'Task 1', 'fsdfsdfsd', 1, '2023-03-24 12:00:00', 0),
(218, 132, 'Task 2', 'fasdfsdf', 0, '2023-03-10 12:00:00', 0),
(219, 132, 'Task 3', 'dsfs', 0, '2023-03-14 12:00:00', 0),
(220, 132, 'Task 4', 'vcxzvcx', 0, '2023-03-31 12:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `firstname`, `lastname`) VALUES
(4, 'user1@gmail.com', '$2y$04$7WapNJrX6KzSiwn3.phb3OkCHp9I6zV9VjmNjmaOo0mBKvqLBJzX6', 'User1Username', 'User1Firstname', 'User1Lastname'),
(7, 'user2@gmail.com', '$2y$04$dYdZ24MWAPRETdUYws81ueIxxEZPId6DYiusP30RByD55aHMHGk6e', 'User2 Username', 'User2 FirstN', 'User2 LastN'),
(8, 'laurentiucozma12@gmail.com', '$2y$04$Q95A8vXwFbolhxHz28Owo.mT4l0xI4L91kbJXCYx1rlyPpfcbGVhC', 'laurentiucozma12', 'Laurentiu', 'Cozma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cascade_Users` (`userId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cascade_Projects` (`projectId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `Cascade_Users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `Cascade_Projects` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
