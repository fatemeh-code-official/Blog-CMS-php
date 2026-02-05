-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2026 at 10:43 PM
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
-- Database: `blog_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Horror'),
(2, 'Programming'),
(3, 'Romance'),
(4, 'Psychology'),
(5, 'Historical'),
(6, 'Mystery'),
(8, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `body`, `post_id`, `status`, `user_email`, `subject`, `created_date`) VALUES
(8, 'fatemeh', 'These books really scared me....', 8, 1, 'fatemeh.013081@gmail.com', 'Horror', '2026-01-27 11:11:24'),
(9, 'Mina', 'These books are really useful.I recomend thme...', 13, 1, 'fadi@gmail.com', 'Awesome', '2026-01-27 20:03:04'),
(11, 'Fatima', 'Such a good books.I love them', 13, 1, 'fadi@gmail.com', 'Awesome books', '2026-01-28 00:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `contact_content` text NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `subject`, `contact_content`, `user_email`) VALUES
(2, 'Fatemeh', 'A query', 'This is a test.', 'fatemeh@gmail.com'),
(8, 'fatemeh', 'test', '4t35trh5', 'fadi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `published_date` date DEFAULT NULL,
  `counted_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `author`, `category_id`, `published_date`, `counted_views`) VALUES
(8, '5 Horror Books That Will Keep You Awake at Night...', 'Some stories are not meant to be read before sleep.\r\nThese horror books build fear, suspense, and tension\r\nthat stay with you long after the last page.\r\nHorror books tap into our deepest fears and darkest imagination.\r\nThey explore suspense, mystery, and the unknown in ways\r\nthat movies often cannot.\r\nIn this article, we introduce five horror books\r\nthat create intense atmosphere, unforgettable characters,\r\nand chilling stories that will keep you awake at night.\r\n\r\n', '1769492194Horror_post.jpg', 'Fatemeh', 1, '2026-01-26', 5),
(11, 'When Love Lives Between the Pages', 'Romantic novels are not just about love.\r\nThey are about connection, longing, vulnerability, and the emotions\r\nwe often struggle to express in real life.\r\n\r\nThrough stories of relationships, heartbreak, hope, and devotion,\r\nromantic books allow readers to experience love in its many forms.\r\nThey show us how love can be gentle or painful,\r\nsimple or complicated, quiet or overwhelming.\r\nThese stories create emotional spaces where readers can slow down,\r\nreflect, and feel deeply.\r\nThey remind us that love is not always perfect,\r\nbut it is always meaningful.\r\nWhether it is a slow-burning romance or a powerful emotional journey,\r\nromantic novels have a unique way of staying with us.\r\nThey don’t just tell stories — they leave feelings behind.\r\n', 'Romance_post.jpg', 'Fatemeh', 3, '2026-01-27', 4),
(13, '5 Books Every Developer Should Read!', 'Being a developer is not just about learning new programming languages or frameworks.\r\nIt’s about thinking clearly, writing maintainable code, and continuously improving your skills.\r\n\r\nIn this article, we introduce five books that every developer should read.\r\nThese books focus on clean code, practical problem-solving, productivity,\r\nand building habits that help developers grow both technically and professionally.\r\nSoftware development is more than writing code.\r\nIt requires strong problem-solving skills, clean architecture,\r\nand a mindset focused on continuous learning.\r\n\r\nThis article highlights five essential books that provide valuable insights\r\ninto software craftsmanship, professional development, and effective work habits\r\nfor developers at any stage of their career.\r\n', '1769506154Programming_post.jpg', 'Fatemeh', 2, '2026-01-27', 8),
(14, 'Stories That Echo Through Time', 'Historical books bring the past to life.\r\nThey allow readers to step into different eras\r\nand experience moments that shaped civilizations, cultures, and societies.\r\n\r\nThrough powerful storytelling, these books transform historical events\r\ninto human experiences — filled with ambition, fear, hope, and resilience.\r\nThey remind us that history is not distant or silent,\r\nbut deeply connected to the present.\r\nBy exploring the lives of people from the past,\r\nhistorical novels and non-fiction works help readers understand\r\nhow decisions, conflicts, and ideas have echoed through time.\r\n\r\nThese stories offer more than knowledge.\r\nThey offer perspective.\r\nReading historical books is an invitation to slow down,\r\nreflect, and see the world through a wider lens.\r\nThey remind us that every era has its struggles,\r\nand every generation leaves a story behind.\r\n', '1769506563hostorical.jpg', 'Fatemeh', 5, '2026-01-27', 5),
(15, 'How Technology Is Changing the Way We Learn and Read', 'Technology has changed almost every aspect of modern life,\r\nand the way we read and learn is no exception.\r\nBooks are no longer limited to printed pages or physical shelves.\r\nToday, knowledge is more accessible than ever before.\r\nDigital books, online libraries, and learning platforms\r\nhave made it possible for people to read and study anytime, anywhere.\r\nReaders can switch between physical books, e-books, and audiobooks\r\nbased on their lifestyle and preferences.\r\nAt the same time, technology has introduced new ways of discovering books.\r\nRecommendation systems, online reviews, and digital bookstores\r\nhelp readers find content that matches their interests more easily.', '1769507571Technology_post.jpg', 'Fatemeh', 8, '2026-01-28', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'fatemeh@gmail.com', '123456');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
