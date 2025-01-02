-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for blog
DROP DATABASE IF EXISTS `blog`;
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `blog`;

-- Dumping structure for table blog.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table blog.categories: ~5 rows (approximately)
DELETE FROM `categories`;
INSERT INTO `categories` (`cat_id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Technology', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(2, 'Health', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(3, 'Lifestyle', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(4, 'Finance', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(5, 'Entertainment', '2024-11-30 10:30:21', '2024-11-30 10:30:21');

-- Dumping structure for table blog.posts
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `posts_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` int NOT NULL,
  `body` text NOT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`posts_id`),
  KEY `user_id` (`user_id`),
  KEY `category` (`category`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table blog.posts: ~8 rows (approximately)
DELETE FROM `posts`;
INSERT INTO `posts` (`posts_id`, `title`, `category`, `body`, `post_img`, `user_id`, `username`, `created_at`, `updated_at`) VALUES
	(1, 'The Future of Technology', 1, 'In this article, we explore the future of technology...', 'http://example.com/posts/tech.jpg', 1, 'john_doe', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(2, 'The Benefits of Regular Exercise', 2, 'Regular exercise is essential for good health...', 'http://example.com/posts/exercise.jpg', 2, 'jane_smith', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(3, 'How to Manage Your Finances', 4, 'Managing your finances can be challenging, but here are some tips...', 'http://example.com/posts/finance.jpg', 3, 'alice_jones', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(4, 'Top Movies to Watch This Year', 5, 'This year’s top movies are full of action and drama...', 'http://example.com/posts/movies.jpg', 1, 'john_doe', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(5, 'Healthy Eating Tips', 2, 'Eating healthy doesn’t have to be difficult...', 'http://example.com/posts/eating.jpg', 2, 'jane_smith', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(7, '78t6yutruy', 1, 'iopiojhoijnoi', 'pexels-moh-adbelghaffar-771742.jpg', 4, 'body2h2b', '2024-12-22 03:43:09', '2024-12-22 03:43:09'),
	(8, 'sddsdsd', 2, 'dssssssssssssss', 'pexels-moh-adbelghaffar-771742.jpg', 4, 'body2h2b', '2024-12-23 15:21:25', '2024-12-23 15:21:25'),
	(9, 'sdaaaaaaaaaaaaaaaaaaaaaaaa', 4, 'sdaaaaaaaaaaaaaaaaaaaaaaaasdaaaaaaaaaaaaaaaaaaaaaaaasdaaaaaaaaaaaaaaaaaaaaaaaasdaaaaaaaaaaaaaaaaaaaaaaaasdaaaaaaaaaaaaaaaaaaaaaaaasdaaaaaaaaaaaaaaaaaaaaaaaa', 'photo-1687204209659-3bded6aecd79.jpg', 6, 'bodsay2hsd2b', '2024-12-23 15:43:35', '2024-12-23 15:43:35');

-- Dumping structure for table blog.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table blog.users: ~5 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `profile`, `verification_code`, `created_at`, `updated_at`) VALUES
	(1, 'john_doe', 'john.doe@example.com', 'hashed_password1', 'http://example.com/profiles/john_doe.jpg', 'verif_code_123', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(2, 'jane_smith', 'jane.smith@example.com', 'hashed_password2', 'http://example.com/profiles/jane_smith.jpg', 'verif_code_456', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(3, 'alice_jones', 'alice.jones@example.com', 'hashed_password3', 'http://example.com/profiles/alice_jones.jpg', 'verif_code_789', '2024-11-30 10:30:21', '2024-11-30 10:30:21'),
	(4, 'body2h2b', 'abdelalrahmanehabgomaa.sayed@st.uskudar.edu.tr', '$2y$10$hxXgMsrIfoteD/Z6aS743ekPMp0gtahU1SZVW7m984DsiHk9mD9cC', 'pexels-moh-adbelghaffar-771742.jpg', '', '2024-11-30 10:33:35', '2024-11-30 10:34:03'),
	(6, 'bodsay2hsd2b', 'mr.body.eg@gmail.com', '$2y$10$hxXgMsrIfoteD/Z6aS743ekPMp0gtahU1SZVW7m984DsiHk9mD9cC', 'pexels-moh-adbelghaffar-771742.jpg', '321610', '2024-12-23 15:31:39', '2024-12-23 15:33:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
