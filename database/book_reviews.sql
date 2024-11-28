-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3380
-- Generation Time: Nov 28, 2024 at 07:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_reviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `book_title`, `author`, `rating`, `review_text`, `date_added`) VALUES
(17, 'Madol Doova', 'Martin Wickramasinghe', 4, 'I approached this book by friendship as a lovely friend gifted me this book as representative of the literature of her country, so my predisposition to read it was beyond the mere literary motivation.', '2024-11-28 09:41:07'),
(29, 'Harry Potter and The Philosopher’s Stone', 'J.K.Rowling', 5, 'The thing is I love the most about these books is that it doesn’t matter how old you are when you start reading them. I grew up with these books, and I probably read Harry Potter and the Philosopher’s Stone either as a preteen or an early teenager. I read this book again for the first time since then last year. At around twice the age I was when I first read the book, I loved it just as much!', '2024-11-28 10:54:21'),
(30, 'Canon of Sherlock Holmes, A Study in Scarlet', 'Arthur Conan Doyle', 3, 'Quite clearly marvelous to see how the rules of detective fiction/noir are placed so meticulous and clear in this, the first Sherlock Holmes novel. Halfway the locale turns exotic--Holmes already knows who the culprit is--and, fittingly, the motive is but half the story! What a feeling of pervasive excitement the mid 19th century had with these cerebral, albeit universal, yarns of suspense.', '2024-11-28 11:21:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
