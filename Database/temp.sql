-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 05:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `education` varchar(200) DEFAULT NULL,
  `bio` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `uid`, `education`, `bio`, `description`, `profile_id`) VALUES
(1, 24, NULL, NULL, NULL, 45),
(2, 21, NULL, NULL, NULL, 32),
(3, 25, NULL, NULL, NULL, 44),
(6, 28, NULL, NULL, NULL, 46),
(7, 29, NULL, NULL, NULL, 52);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `atatus` int(11) NOT NULL DEFAULT 1,
  `editRoles` int(1) NOT NULL DEFAULT 0,
  `editUser` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `uid`, `atatus`, `editRoles`, `editUser`) VALUES
(2, 21, 1, 1, 1),
(3, 22, 1, 1, 1),
(4, 23, 1, 0, 0),
(5, 24, 1, 0, 0),
(6, 25, 1, 0, 0),
(9, 28, 1, 0, 0),
(10, 29, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(20) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `uid`, `name`) VALUES
(32, 21, 'public/uploads/Imgwvx3dpiksjh9media.png'),
(33, 21, 'public/uploads/Imgxkgaem87dzsvmedia.png'),
(34, 24, 'public/uploads/Imgzxil7bmepo5hmedia.png'),
(35, 24, 'public/uploads/Imgy5m2js6vazeumedia.png'),
(36, 24, 'public/uploads/Img61dg0vewnz7bmedia.png'),
(37, 21, 'public/uploads/Img0cj3fsubz8iwmedia.png'),
(38, 21, 'public/uploads/Imghx1e6ikvn53pmedia.png'),
(39, 25, 'public/uploads/Imgt30r46dphs58media.jpg'),
(40, 25, 'public/uploads/Img2j410ednqa6cmedia.jpg'),
(41, 25, 'public/uploads/Img9feqji7m4bs1media.jpg'),
(42, 25, 'public/uploads/Imgq80ons3wcbe5media.jpg'),
(43, 25, 'public/uploads/Imgzrv6t3lgh0mamedia.jpg'),
(44, 25, 'public/uploads/Img7q5r4a12whgumedia.jpg'),
(45, 24, 'public/uploads/Imgf36clztgu2eamedia.png'),
(46, 28, 'public/uploads/Imgfpn2ucv91qjymedia.png'),
(47, 29, 'public/uploads/Imgzg859fva3qwxmedia.mp4'),
(48, 29, 'public/uploads/Imgzw186d2jcfukmedia.jpg'),
(49, 29, 'public/uploads/Imgq9sc7d6rk58gmedia.jpg'),
(50, 29, 'public/uploads/Imgrv6xbyo23h4smedia.mp4'),
(51, 29, 'public/uploads/Imgi1yf3dja27sbmedia.jpg'),
(52, 29, 'public/uploads/Imgacu2pj5ne3qgmedia.jpg'),
(53, 29, 'public/uploads/Imgymhfos810lq2media.jpg'),
(54, 29, 'public/uploads/Img04b562pi1x8umedia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full-name` varchar(60) NOT NULL,
  `user-email` varchar(60) NOT NULL,
  `user-phone` varchar(15) NOT NULL,
  `user-password` varchar(60) NOT NULL,
  `user_level` varchar(60) NOT NULL DEFAULT 'guest',
  `status` varchar(60) DEFAULT 'not_verfied',
  `verification_code` int(6) DEFAULT NULL,
  `remember_me` varchar(60) DEFAULT NULL,
  `pwdreset_code` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full-name`, `user-email`, `user-phone`, `user-password`, `user_level`, `status`, `verification_code`, `remember_me`, `pwdreset_code`) VALUES
(21, 'josh the one', 'joshtheone70@gmail.com', '', '$2y$10$ISb7BRU6lCCI9jhAfHgaw.PKJ24oVPgpDUiCq1WVrJHA97XH8JMQO', 'admin', 'verified', NULL, NULL, 708456),
(22, 'guest User', 'guest@gmail.com', '09876543454321', '$2y$10$95dvKJD78gd7IB7G6bdVfO5wxK8YMNBoIjdC3UwLx0v3jHllqB/QG', 'user', 'not_verfied', NULL, NULL, 0),
(23, 'mama', 'mama@gmail.com', '12345676543', '$2y$10$V./vOk/kQCDNgFmHUpMj1.6bvkCUVNAEe1tVq4b4Iy5mHDe8LCiuS', 'Admin', 'not_verfied', NULL, NULL, 0),
(24, 'mtu mzito', 'baba@gmail.com', '0678455623', '$2y$10$DEkD6xgci.71jTVsyNVNR.vN1YiFyQRfRoFB1Vge88i1So1oZnGI2', 'user', 'verified', 958312, NULL, 0),
(25, 'Fiyo', 'yohanhudson003@gmail.com', '0788461945', '$2y$10$yEKCB2Q6QUnCs0XhpzSMeeOL18UonrAo3J1bN4qSGYkzpSeY3tmPG', 'guest', 'not_verfied', NULL, NULL, 0),
(28, 'Agapepct choir', 'agapepct@gmail.com', '0762765529', '$2y$10$XbhfaJ2v340rr.29WxnJ9eI3Hx9sF89S4HFI19Bb9u9OaguK6bI1e', 'guest', 'verified', 270984, NULL, 107694),
(29, 'Tumpe mwanyondo', 'tumpemwanyondo81@gmail.com', '0716575028', '$2y$10$fMFdAvZw.bwolVDd7nj3JOyoE9J9oojB6lfkcF9jG14ZTMCXDECM.', 'guest', 'verified', 569310, NULL, 672951);

-- --------------------------------------------------------

--
-- Table structure for table `validroles`
--

CREATE TABLE `validroles` (
  `id` int(11) NOT NULL,
  `roles` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validroles`
--

INSERT INTO `validroles` (`id`, `roles`) VALUES
(10, 'editRoles'),
(11, 'editUser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prouser` (`uid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_id` (`uid`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uuplod` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user-email` (`user-email`),
  ADD UNIQUE KEY `user-phone` (`user-phone`);

--
-- Indexes for table `validroles`
--
ALTER TABLE `validroles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `validroles`
--
ALTER TABLE `validroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `prouser` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `user_roles_id` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `uuplod` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
