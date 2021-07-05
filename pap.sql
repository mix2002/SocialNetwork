-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 06:50 PM
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
-- Database: `pap`
--
CREATE DATABASE IF NOT EXISTS `pap` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pap`;

-- --------------------------------------------------------

--
-- Table structure for table `posts_comentarios`
--

CREATE TABLE `posts_comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_comentarios`
--

INSERT INTO `posts_comentarios` (`id`, `comentario`, `nome`, `users_id`) VALUES
(1, 'asdas', 'pedro', 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts_historico`
--

CREATE TABLE `posts_historico` (
  `post_id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_historico`
--

INSERT INTO `posts_historico` (`post_id`, `nome`, `descricao`, `users_id`) VALUES
(1, 'pedro', 'ds', 1),
(2, 'pedro', 'teste', 10),
(3, 'pedro', 'teste', 10),
(4, 'pedro', 'tasdas', 10);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id_post` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id_post`, `user_id`) VALUES
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes_counter`
--

CREATE TABLE `post_likes_counter` (
  `n_likes` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `assunto` text NOT NULL,
  `mensagem` text NOT NULL,
  `prioridade` text NOT NULL,
  `lido` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_tickets`
--

CREATE TABLE `users_tickets` (
  `id` int(11) NOT NULL,
  `tickets_id` int(11) NOT NULL,
  `assunto` text NOT NULL,
  `mensagem` text NOT NULL,
  `prioridade` text NOT NULL,
  `lido` tinyint(4) DEFAULT NULL,
  `resposta` text,
  `admin` tinyint(4) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `stamp` varchar(100) NOT NULL,
  `online` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `apelido`, `email`, `password`, `admin`, `stamp`, `online`) VALUES
(9, 'fabio', 'santos', 'fabiosantos12398@gmail.com', 'sxoWOFMQuDKRr26WS+hm4Q==', 1, 'mVi++R8Ry1DsbUnoFy3wiA==', 1),
(10, 'pedro', 'santos', 'musicsound12398@gmail.com', '6+pBdX4d/C5Ut/LdyUDs8Q==', 0, 'UJbfSmh30h0XnCDSyjudgw==', 1),
(12, 'afonso', 'teste', 'afonso@gmail.com', 'W6QaPSbBAG832D1uDhLwHA==', 0, 'G1/+Dzb+x5mdQNN6e3bRVQ==', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts_comentarios`
--
ALTER TABLE `posts_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_historico`
--
ALTER TABLE `posts_historico`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD KEY `id_post` (`id_post`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users_tickets`
--
ALTER TABLE `users_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `tickets_id` (`tickets_id`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts_comentarios`
--
ALTER TABLE `posts_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts_historico`
--
ALTER TABLE `posts_historico`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tickets`
--
ALTER TABLE `users_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts_historico` (`post_id`),
  ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `utilizadores` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `utilizadores` (`id`);

--
-- Constraints for table `users_tickets`
--
ALTER TABLE `users_tickets`
  ADD CONSTRAINT `users_tickets_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `utilizadores` (`id`),
  ADD CONSTRAINT `users_tickets_ibfk_2` FOREIGN KEY (`tickets_id`) REFERENCES `tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
