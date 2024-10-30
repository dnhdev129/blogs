-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 04:54 PM
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
-- Database: `doanngochung_22662002`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `footer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`, `footer`, `created_at`, `updated_at`) VALUES
(1, '<p>About Us</p>', '<p style=\"font-size: 17px; line-height: 28px; color: rgb(27, 46, 75); font-family: &quot;IBM Plex Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px;\">Có một vài trang tôi đưa ra sẽ khiến bạn choáng vì chúng quá đẹp. Nhưng một số trang khác thì không đẹp lắm. Hãy nhớ là tôi không liệt kê bất kỳ một trang nào vào danh sách này chỉ vì trông nó đẹp.</span></p><p style=\"font-size: 17px; line-height: 28px; color: rgb(27, 46, 75); font-family: &quot;IBM Plex Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px;\">Tôi sẽ không đi sâu vào chi tiết ở đây vì tôi sẽ nói về những lợi thế của mỗi trang AU trong từng phần. Tôi hy vọng bài viết này sẽ giúp bạn biết cách xây dựng trang AU của bạn tốt hơn</span></p>', '2024-06-26 12:20:16', '2024-06-26 06:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Categories 1', 1, '2024-06-26 10:41:06', '2024-06-26 03:29:40'),
(3, 'Categories 2', 1, '2024-06-26 03:29:13', '2024-06-26 03:29:53'),
(4, 'Categories 3', 1, '2024-06-26 03:29:19', '2024-06-26 03:30:01'),
(5, 'Categories 4', 1, '2024-06-26 06:58:16', '2024-06-26 06:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `image`, `status`, `id_category`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Working to build a better web design', '<p><b style=\"background-color: rgb(255, 255, 255);\"><font color=\"#000000\"><span style=\"\" open=\"\" sans\";=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" display:=\"\" inline=\"\" !important;\"=\"\">Trong thời đại hiện nay, website được coi như bộ mặt của một doanh nghiệp. Website là một trong những điểm chạm đầu tiên của doanh nghiệp với người dùng, vì vậy nó có thể ảnh hưởng tới ấn tượng và cảm nhận của một khách hàng đối với công ty. Khi mà yêu cầu của người dùng ngày càng được nâng cao, doanh nghiệp cũng cần mang tới trải nghiệm tốt hơn cho khách hàng. Chính vì vậy, doanh nghiệp sẽ cần&nbsp;</span><span style=\"vertical-align: baseline;\" open=\"\" sans\";=\"\" font-weight:=\"\" 700;=\"\" outline:=\"\" 0px;=\"\" padding:=\"\" margin:=\"\" border:=\"\" color:=\"\" rgb(42,=\"\" 42,=\"\" 42);=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">thiết kế web cao cấp</span><span style=\"\" open=\"\" sans\";=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);=\"\" display:=\"\" inline=\"\" !important;\"=\"\">&nbsp;để thu hút khách hàng, đạt được hiệu quả kinh doanh cao hơn.</span></font></b><br></p>', 'media_667bd22696e2f.png', 1, 2, 7, '2024-06-26 03:27:09', '2024-06-26 07:16:11'),
(2, 'Vuejs và những kiến thức cần biết (P1)', '<p><span style=\"color: rgb(27, 27, 27); font-family: &quot;Open Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 18px; letter-spacing: -0.054px; background-color: rgb(255, 255, 255); display: inline !important;\">Vuejs là một javascript framework giúp người dùng xây dựng giao diện người dùng. . Khác với các monolithic framework (frame work nguyên khối), Vue được thiết kế theo hướng progressive framework (framework linh động) cho phép và khuyến khích việc phát triển ứng dụng theo từng bước.</span></p>', 'media_667bd28e3570b.jpg', 1, 3, 7, '2024-06-26 03:34:22', '2024-06-26 07:14:31'),
(3, 'Let’s Change How We Manage Business', '<p><span style=\"font-weight: bolder; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; background-color: rgb(255, 255, 255);\">Quản lý sự thay đổi</span><span style=\"color: rgb(0, 0, 0); font-family: Roboto, sans-serif; background-color: rgb(255, 255, 255);\">&nbsp;là bài toán khó đối với bất kì doanh nghiệp nào và cũng có thể mang lại thành công đột phá nếu tổ chức biết cách nắm bắt những cơ hội đổi mới. Luôn có những thách thức mới cần phải đổi mặt và những cách làm tốt hơn cũng luôn xuất hiện bởi lẽ không một doanh nghiệp nào có đủ khả năng để không bị tác động. Bên cạnh đó, ngoài những thay đổi luôn tìm đến như một điều không thể né tránh thì doanh nghiệp cũng có thể tự tạo ra những thay đổi tích cực để phát triển tốt hơn.</span><br></p>', 'media_667bd2db89c01.jpg', 1, 4, 7, '2024-06-26 03:35:39', '2024-06-26 03:35:39'),
(4, '12 trang có phần About Us tốt nhất trên internet', '<p style=\"font-size: 17px; line-height: 28px; color: rgb(27, 46, 75); font-family: &quot;IBM Plex Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px;\"><em>About Us: phần giới thiệu Doanh nghiệp / Công ty trên Website. Trong bài viết này, About Us sẽ được viết tắt là AU</em></span></p><p style=\"font-size: 17px; line-height: 28px; color: rgb(27, 46, 75); font-family: &quot;IBM Plex Sans&quot;, Arial, sans-serif; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 14px;\">Có một việc tôi đã phải thực hiện trong một thời gian rất dài, đó là chọn ra những website có phần AU tốt nhất. Vì sao? Bởi vì một trang có phần AU tốt rất khó có thể tìm được.</span></p>', 'media_667c028fa4afa.jpeg', 1, 5, 7, '2024-06-26 06:59:11', '2024-06-26 06:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_parent_comment` int(11) NOT NULL,
  `comment` text NOT NULL,
  `id_blog` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_parent_comment`, `comment`, `id_blog`, `name`, `email`, `created_at`, `updated_at`) VALUES
(5, 0, 'Trang được quá dậy.\r\n', 0, 'Nhi', 'nhi@gmail.com', '2024-06-26 15:49:26', '2024-06-26 15:49:26'),
(6, 0, 'Dữ dậy cha nội :))))', 0, 'Trang', 'trang123@gmail.com', '2024-06-26 15:52:44', '2024-06-26 15:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p>Hãy Liên Hệ Với Tui.</p>', '2024-06-26 03:48:18', '2024-06-26 03:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `url`, `created_at`, `updated_at`) VALUES
(2, 'facebook', 'https://www.facebook.com/', '2024-06-26 11:42:03', '2024-06-26 11:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `mailsettings`
--

CREATE TABLE `mailsettings` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mail_server` varchar(100) NOT NULL,
  `mail_username` varchar(100) NOT NULL,
  `mail_password` varchar(100) NOT NULL,
  `mail_port` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mailsettings`
--

INSERT INTO `mailsettings` (`id`, `email`, `mail_server`, `mail_username`, `mail_password`, `mail_port`, `created_at`, `updated_at`) VALUES
(1, 'support@gmail.com', 'sandbox.smtp.mailtrap.io', '1b9e2b2aa8d231', '5e82b98cd2ff71', '2525', '2024-06-26 01:07:18', '2024-06-26 01:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_map` text NOT NULL,
  `site_timezone` varchar(100) NOT NULL,
  `site_footer` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `site_map`, `site_timezone`, `site_footer`, `contact_phone`, `contact_address`, `contact_email`, `created_at`, `updated_at`) VALUES
(1, 'Build Effective Designs', 'media_667bd60477753.ico', 'media_667bd5f35d4ac.ico', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.8945223546134!2d106.61781097480446!3d10.742612089404137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752dd1a7e83067%3A0xa80e9bf29def166d!2zMzMzIMSQLiBLaW5oIETGsMahbmcgVsawxqFuZywgQW4gTOG6oWMsIELDrG5oIFTDom4sIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1719380027217!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Asia/Ho_Chi_Minh', 'Copyright © 2024. All rights reserved. www.DA.vn', '0337695716', '333 Kinh Dương Vương, Quận Bình Tân, Tp.HCM', 'hung12@gmail.com', '2024-06-26 12:35:09', '2024-06-26 03:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Slider 1', 'media_667bd4b293499.jpg', '2024-06-26 11:18:25', '2024-06-26 03:43:30'),
(5, 'Slider 2', 'media_667bd4ce5ede3.jpg', '2024-06-26 03:43:58', '2024-06-26 03:43:58'),
(6, 'Slider 3', 'media_667bd4dfe21b4.jpg', '2024-06-26 03:44:15', '2024-06-26 03:44:15'),
(7, 'Slider 4', 'media_667bd50d9a83b.jpeg', '2024-06-26 03:45:01', '2024-06-26 03:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Linkedin', 'https://www.linkedin.com/', '<i class=\"fa fa-linkedin\" aria-hidden=\"true\"></i>', '2024-06-26 11:28:05', '2024-06-26 11:30:31'),
(3, 'facebook', 'https://www.facebook.com/', '<i class=\"fa fa-facebook\" aria-hidden=\"true\"></i>', '2024-06-26 03:45:28', '2024-06-26 03:45:28'),
(4, 'Twiter', 'https://x.com/?lang=vi', '<i class=\"fa fa-twitter-square\" aria-hidden=\"true\"></i>', '2024-06-26 03:46:07', '2024-06-26 03:46:07'),
(5, 'Instagram', 'https://www.instagram.com/', '<i class=\"fa fa-instagram\" aria-hidden=\"true\"></i>', '2024-06-26 03:46:43', '2024-06-26 03:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified_token` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `verified_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hung12@gmail.com', 'verified', 1, '2024-06-26 13:15:24', '2024-06-26 13:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `email_verified` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `image`, `phone`, `role`, `status`, `email_verified`, `created_at`, `updated_at`) VALUES
(7, 'Đoàn Ngọc Hưng', 'ngochung12', '62c10405f6c30dc35e226db26715092d12479eaa', 'hung12@gmail.com', 'media_667b9dd53f12b.jpg', '0337695716', 2, 1, 'verified', '2024-06-26 11:49:25', '2024-06-26 11:49:25'),
(8, 'Băng Nhi', 'nhi123', '68f5ee328f7b32a71fb04c9b24a5c50bc08d3831', 'nhi12@gmail.com', 'media_667b9e9c44633.jpg', '0772729901', 0, 1, 'verified', '2024-06-26 11:52:44', '2024-06-26 11:52:44'),
(9, 'Đoan Trang', 'trang12', '8e7c777a1890b8d914ca74040aaa8665b8208f25', 'trang12@gmail.com', 'media_667bd3305e529.jpg', '0977665665', 1, 1, 'verified', '2024-06-26 03:37:04', '2024-06-26 03:37:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailsettings`
--
ALTER TABLE `mailsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mailsettings`
--
ALTER TABLE `mailsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
