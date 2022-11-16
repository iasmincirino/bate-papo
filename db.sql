DROP DATABASE IF EXISTS `chat`;
CREATE DATABASE IF NOT EXISTS `chat`;
USE `chat`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `unique_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
);

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `incoming_msg_id` int(50) NOT NULL,
  `outgoing_msg_id` int(50) NOT NULL,
  `msg` varchar(1000) NOT NULL
);