DROP DATABASE IF EXISTS `blog`;
CREATE DATABASE IF NOT EXISTS `blog`;
USE `blog`;

-- Table: users
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert Data: users
DELETE FROM `users`;
INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `profile`, `verification_code`, `created_at`, `updated_at`) VALUES
(4, 'Abdelrahman', 'abdelalrahmanehabgomaa.sayed@st.uskudar.edu.tr', '$2y$10$hxXgMsrIfoteD/Z6aS743ekPMp0gtahU1SZVW7m984DsiHk9mD9cC', 'profile.png', '', '2024-11-30 07:33:35', '2025-01-02 22:10:04'),
(7, 'yousif', 'yousifabdulmuti@gmail.com', '$2y$10$5Yg8qPbDfYvTZge94E4XMuJ3zoe7QnnfbLmEkicrbQuV4aWPY6lbq', 'Untitled design (15).png', '163482', '2025-01-02 21:40:39', '2025-01-02 22:10:15');

-- Table: categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert Data: categories
DELETE FROM `categories`;
INSERT INTO `categories` (`cat_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technology', '2024-11-30 07:30:21', '2024-11-30 07:30:21'),
(2, 'Health', '2024-11-30 07:30:21', '2024-11-30 07:30:21'),
(3, 'Lifestyle', '2024-11-30 07:30:21', '2024-11-30 07:30:21'),
(4, 'Finance', '2024-11-30 07:30:21', '2024-11-30 07:30:21'),
(5, 'Entertainment', '2024-11-30 07:30:21', '2024-11-30 07:30:21'),
(6, 'AI', '2025-01-02 18:39:33', '2025-01-02 18:39:33');

-- Table: posts
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert Data: posts
DELETE FROM `posts`;
INSERT INTO `posts` (`posts_id`, `title`, `category`, `body`, `post_img`, `user_id`, `username`, `created_at`, `updated_at`) VALUES
(7, 'The Future of Technology: Innovations Shaping Our World in 2024 and Beyond', 1, '1. Artificial Intelligence: Smarter and More Integrated\r\nArtificial Intelligence (AI) continues to dominate the tech landscape, with applications in every industry, from healthcare to finance. In 2024, AI systems are becoming more intuitive, creative, and capable of understanding human emotions. Technologies like ChatGPT, generative AI tools, and advanced machine learning models are driving innovations in customer service, content creation, and complex problem-solving.\r\n\r\nKey Impact: Businesses are automating tasks, improving decision-making, and enhancing customer interactions with AI-powered tools.\r\n\r\n2. Quantum Computing: Unlocking Unimaginable Potential\r\nQuantum computing is no longer just a theoretical concept. Tech giants are racing to build scalable quantum systems capable of solving problems that even the most powerful supercomputers can\'t tackle. Industries like pharmaceuticals, logistics, and cryptography are set to benefit significantly from these advancements.\r\n\r\nKey Impact: Faster drug discovery, optimized supply chains, and unbreakable encryption standards.', 'Untitled_design__10__1735848009.png', 4, 'body2h2b', '2025-01-02 20:00:09', '2025-01-02 20:01:12'),
(8, 'The Road to Wellness: Key Health Trends and Tips for a Healthier Life in 2024', 2, '1. Mental Health Awareness: Breaking the Stigma\r\nMental health is finally getting the attention it deserves. In 2024, more people are seeking therapy, practicing mindfulness, and openly discussing their mental health struggles. Digital tools, such as mental health apps and AI-driven therapy platforms, are making professional help more accessible.', 'Untitled_design__11__1735848245.png', 4, 'body2h2b', '2025-01-02 20:04:05', '2025-01-02 20:04:05'),
(10, 'Modern Lifestyle: Balancing Ambition, Wellness, and Joy in 2024', 3, '1. Work-Life Balance: The New Definition of Success\r\nThe traditional 9-to-5 work model is being redefined as remote and hybrid work arrangements become the norm.', 'Untitled_design__12__1735848804.png', 4, 'body2h2b', '2025-01-02 20:13:24', '2025-01-02 20:13:24'),
(11, 'Mastering Your Finances: Smart Strategies for Financial Success in 2024', 4, '1. Budgeting: The Foundation of Financial Health', 'Untitled_design__13__1735848977.png', 4, 'body2h2b', '2025-01-02 20:16:17', '2025-01-02 20:16:17'),
(12, 'The Evolution of Entertainment: Trends Shaping the Future of Fun in 2024', 5, '1. Streaming Wars: Quality Over Quantity', 'Untitled_design__14__1735849131.png', 4, 'body2h2b', '2025-01-02 20:18:51', '2025-01-02 20:18:51'),
(13, 'Artificial Intelligence in 2024: Transforming Industries and Shaping the Future', 6, '1. AI in Healthcare: Saving Lives with Precision', 'Untitled_design__15__1735849276.png', 4, 'body2h2b', '2025-01-02 20:21:16', '2025-01-02 20:21:16');
