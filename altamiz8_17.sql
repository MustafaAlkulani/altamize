-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 أغسطس 2019 الساعة 14:55
-- إصدار الخادم: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `altamiz`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin/user.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_sit` tinyint(1) NOT NULL DEFAULT '0',
  `is_social` tinyint(1) NOT NULL DEFAULT '0',
  `is_control` tinyint(1) NOT NULL DEFAULT '0',
  `is_un` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `phone`, `image`, `email`, `password`, `is_admin`, `is_sit`, `is_social`, `is_control`, `is_un`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'abobaker', '772544010', 'admins/LRi9zVfDxrpaUOhGp3T5wFgbTDQAvhZuYvqPp4Vp.png', 'admin@test.com', '$2y$10$zmqFeXVJAioycUC6MbPZg..WhC1kCAbVDVS/7hZiDbPHOC/zv6bU6', 1, 1, 1, 1, 1, 'QBS4II2IyUEbndsTFY1ctG8JRtrAaKKDQzX4xY88WlPZciINW0T8q8HoS5St', NULL, '2019-07-27 12:29:13'),
(2, 'ابوبكر  محسن الشهاري', 'abobaker', '772544010', 'admins/user.png', 'abobaker@gmail.com', '$2y$10$d1VJ7eVuhi06ussu3D13/.rmKFGLpDQ5HgsPuwBydaAQFW.3BtnNa', 1, 0, 1, 0, 1, NULL, '2019-02-24 12:55:42', '2019-07-05 12:30:38'),
(3, 'abobaker mohsen', 'abm', '555555', 'admins/ZBEzQGNv9ExIy72oo7CQU5OkUYFsN427RKL2NwHc.jpeg', 'admin_root@gmail.com', '$2y$10$65lxeEG/yRuOj5ne.7vy0elXhW3X80NmdQs1Z0EDyqjU2OSM40ChG', 0, 0, 0, 0, 0, NULL, '2019-02-24 13:26:31', '2019-02-24 13:26:31'),
(5, 'abobaker', 'abobaker', '77777777l', 'admins/user.png', 'abobaker20@gmail.com', '$2y$10$d2VrUYtvg6BMx/zHdW36SedV2QmdaC2Iiu4L2EkQYJQlw5VI9KHpe', 1, 1, 1, 0, 0, NULL, '2019-07-09 14:45:26', '2019-07-09 14:45:26'),
(6, 'اسامة المعمري', 'osama', '773569041', 'admins/mL6xZMlyNJq7vOsKCNykN9AxhD0Uxayb4WRBdoSA.jpeg', 'osama1234887@gmail.com', '$2y$10$Tyznx2sDX/jLRShs6pOdiuRnNjqw83ukiZtG/lBXWgXziyQY5vc1i', 1, 1, 1, 1, 1, 'bwZLW2K9Acf0QyfrkXSCiEJ9qWyAh8cMh884KlKkV0pFXYYCdLq2sTMOMtge', '2019-07-16 13:38:57', '2019-07-23 17:12:56'),
(7, 'فؤاد منصور', 'Fuad', '775859492', 'admins/hNlvYTpDmUQoyHtgadG3YilSEVDW98O6XLj4AVkH.jpeg', 'fuad@gmail.com', '$2y$10$ln5r352kYECuZVSX9eoa9OZij6JZVGW5KRXkZpz/XIWnYFtH3EdXK', 1, 1, 1, 1, 1, NULL, '2019-07-26 15:38:26', '2019-07-26 15:38:26'),
(8, 'ابوبكر الشهاري', 'abobaker', '777777777777', 'admin/user.png', 'abobaker2020@gmail.com', '$2y$10$S/jSvkA3NkYJunZWD/DzRufwHzaHlAffTsWWHWXn92YLq6llESt72', 1, 1, 1, 1, 1, NULL, '2019-07-26 15:39:30', '2019-07-26 15:39:30'),
(10, 'osama', 'admin@test.com', '777777', 'admin/user.png', 'osama1234@gmail.com', '$2y$10$hU5v6ExWUZVSNAXIQ/EmHO5Uphh9jJomZNQFmT./UAfUlyaK5Bdhm', 1, 1, 1, 1, 1, NULL, '2019-07-27 17:13:15', '2019-07-27 17:13:15'),
(12, 'ali', 'ali', '7777777', 'admin/user.png', 'ali@gmail.com', '$2y$10$eV5t.LGThi9ElkMbxMTcQ.9toVPN35Y.kTP5vdTE07TEuPUmcGm0.', 0, 1, 0, 0, 0, '0eIxk2yYqh7BqW5lWDVIHwK6MXhPLcph2MJVR6diINJix2jXUsL7VNnwvLK5', '2019-07-28 05:39:52', '2019-07-28 05:40:46'),
(13, 'اسامة المعمري', 'osama', '777777', 'admin/user.png', 'osama123487@gmail.com', '$2y$10$VluEqcGWTMyvcsX3QvvUYOEdGi0WCnu/mlyN.9jwvfy/9lwQ4PQMW', 0, 1, 0, 0, 0, NULL, '2019-07-28 07:13:24', '2019-07-28 07:13:24');

-- --------------------------------------------------------

--
-- بنية الجدول `advertising`
--

CREATE TABLE `advertising` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `advertising`
--

INSERT INTO `advertising` (`id`, `text`, `image`) VALUES
(1, 'يحق للطالب الراغب في التحويل من كليات أخرى معترف بها إلى كلية التميز', 'advertising/gB3qwcBxFCGbzX3iGj77xlHN1ZN4076xlLgRNjhj.jpeg'),
(2, 'يحق للطالب الراغب في التحويل من كليات أخرى معترف بها إلى كلية التميز', 'advertising/zHCCEdxCFcmykQ8Kxea7Lt7PxP4cd4l8YMPmN02K.jpeg'),
(3, 'يحق للطالب الراغب في التحويل من كليات أخرى معترف بها إلى كلية التميز', 'advertising/RFpji9feRSbpjZegctqnfI8mlx2vs4yIsnSFxAYs.png');

-- --------------------------------------------------------

--
-- بنية الجدول `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `describtion` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `originalName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `assignments`
--

INSERT INTO `assignments` (`id`, `describtion`, `file`, `originalName`, `study_course_id`, `created_at`, `updated_at`) VALUES
(1, '<p>jbj kjibnqwoeklsnfmvowdsljgmv&#39;we;dsks</p>', 'Assignment/teacherAssignment/3bf1YHnflbSJO2UL0oF9v3QtZxsr3ftdnTXayuN7.docx', 'slah mnsor.docx', 9, '2019-07-17 10:52:48', '2019-07-17 10:52:48'),
(2, '<p>jbj kjibnqwoeklsnfmvowdsljgmv&#39;we;dsks</p>', 'Assignment/teacherAssignment/PtNQFHDhGXIRUDjB2DIu1RLeqMnyJwtoD8qA0VY7.docx', 'slah mnsor.docx', 9, '2019-07-17 10:56:53', '2019-07-17 10:56:53'),
(3, '<p>jbj kjibnqwoeklsnfmvowdsljgmv&#39;we;dsks</p>', 'Assignment/teacherAssignment/tjo625vF257RvHjj0VXsCIcuMMkGuHRAwKR7ErU6.docx', 'slah mnsor.docx', 9, '2019-07-17 10:59:02', '2019-07-17 10:59:02'),
(4, '<p>jbj kjibnqwoeklsnfmvowdsljgmv&#39;we;dsks</p>', 'Assignment/teacherAssignment/3GbpMVXng9N76d7WUmmgPe9fQak8NXl4fIzcuqec.docx', 'slah mnsor.docx', 9, '2019-07-17 11:00:12', '2019-07-17 11:00:12'),
(5, '<p>jbj kjibnqwoeklsnfmvowdsljgmv&#39;we;dsks</p>', 'Assignment/teacherAssignment/jahawFScDFx5YhLgCyOvJL5W0MWr8pZbQFCjxsWi.docx', 'slah mnsor.docx', 9, '2019-07-17 11:00:24', '2019-07-17 11:00:24'),
(6, '<p><strong>اسامة</strong> محمد احمد </p>\n\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\n	<tbody>\n		<tr>\n			<td> </td>\n			<td> </td>\n		</tr>\n		<tr>\n			<td> </td>\n			<td> </td>\n		</tr>\n		<tr>\n			<td> </td>\n			<td> </td>\n		</tr>\n	</tbody>\n</table>\n\n<p> </p>', 'Assignment/teacherAssignment/FpYkibFcGn3iBnAUGcAgs9nHdD9HTDYPdZRDPXPi.txt', 'مستند نصي جديد (2).txt', 5, '2019-07-21 16:22:19', '2019-07-22 19:50:45'),
(8, '<p>hhhhhhhh</p>', 'Assignment/teacherAssignment/Zmu2c2X6c5RwfSAh7lgMuA8Z1HPd59ANdpnZWecD.docx', '‏‏ملخص الخوارزميات - نسخة.docx', 11, '2019-07-26 16:24:15', '2019-07-26 16:24:15'),
(12, '<p>usrgwhs9doijcmoasjcmcihvwisdhp;</p>', 'Assignment/teacherAssignment/AV82JTH4FsVKQhGJdeCYdHTZVKeh1azLsgNHvkF3.docx', 'الخوارزميات L5.docx', 24, '2019-07-28 07:30:42', '2019-07-28 07:30:42');

-- --------------------------------------------------------

--
-- بنية الجدول `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `contact_us`
--

INSERT INTO `contact_us` (`id`, `contact_name`, `subject`, `email`, `message`, `view`, `created_at`, `updated_at`) VALUES
(1, 'محمد', 'gyuguyfguyg', 'm@m.com', 'ucv hjvblukjbj ul', 0, '2019-07-22 16:46:17', '2019-07-22 16:46:17'),
(2, 'ابوبكر الشهاري', 'بداية العام الدراسي', 'abobaker@gmail.com', 'متى سوف يتم البدا في التسجيل والدراسة في العام الدراسي الجديد', 1, '2019-07-26 16:06:35', '2019-07-27 12:16:06'),
(3, 'تتنه', 'التكنال', 'fhhj@gmail.com', 'البييي', 0, '2019-07-26 16:55:15', '2019-07-26 16:55:15'),
(4, 'yousif', 'hgjg', 'abosam@gmail.com', 'jnvjhj', 1, '2019-07-27 19:26:26', '2019-07-27 19:28:23');

-- --------------------------------------------------------

--
-- بنية الجدول `coumment_posts`
--

CREATE TABLE `coumment_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `coumment_posts`
--

INSERT INTO `coumment_posts` (`id`, `text`, `image`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'hello osama', NULL, 16, 3, '2019-07-17 20:54:16', '2019-07-17 20:54:16'),
(2, 'oh my gad', NULL, 26, 3, '2019-07-17 20:59:25', '2019-07-17 20:59:25'),
(3, 'ااا', NULL, 23, 6, '2019-07-17 21:03:34', '2019-07-17 21:03:34'),
(4, 'om my gad \r\nwhere ara you', NULL, 23, 3, '2019-07-17 21:04:27', '2019-07-17 21:04:27'),
(5, 'غغغغغغغاغه', NULL, 21, 3, '2019-07-17 21:07:48', '2019-07-17 21:07:48'),
(6, '😍😍😍😍', NULL, 23, 6, '2019-07-17 21:16:58', '2019-07-17 21:16:58'),
(8, 'صباح الخير', NULL, 26, 4, '2019-07-26 14:37:58', '2019-07-26 14:37:58'),
(9, 'اسعد مساك', NULL, 17, 4, '2019-07-26 14:41:57', '2019-07-26 14:41:57'),
(10, 'تقهوى', 'social/ReplyCommentPost/FaRPx5LWldCg29Fg6ScQKK3OfnIfKr3zgsjZJ8Gx.jpeg', 17, 4, '2019-07-26 14:42:28', '2019-07-26 14:42:28'),
(11, 'وين الاعجابات', NULL, 21, 4, '2019-07-26 14:42:56', '2019-07-26 14:42:56'),
(12, 'ما دخلك', NULL, 34, 3, '2019-07-26 14:49:33', '2019-07-26 14:49:33'),
(13, 'فؤاد مايعجبش', NULL, 34, 4, '2019-07-26 14:52:06', '2019-07-26 14:52:06'),
(14, 'جابر نفسك', NULL, 37, 5, '2019-07-26 14:52:20', '2019-07-26 14:52:20'),
(15, 'يافؤاد لا تصدق للمطابزين', NULL, 37, 4, '2019-07-26 14:54:51', '2019-07-26 14:54:51'),
(16, 'يا خبير', NULL, 37, 4, '2019-07-26 14:55:02', '2019-07-26 14:55:02'),
(17, 'هللويا', NULL, 32, 4, '2019-07-26 14:55:42', '2019-07-26 14:55:42'),
(18, '1qqqwhdhdii', NULL, 16, 4, '2019-07-26 14:56:50', '2019-07-26 14:56:50'),
(19, 'وهو بين الريح', NULL, 39, 17, '2019-07-26 15:08:03', '2019-07-26 15:08:03'),
(22, 'ومطرهم', NULL, 39, 20, '2019-07-26 15:17:24', '2019-07-26 15:17:24'),
(24, 'بالعربي ياعمنا', NULL, 32, 20, '2019-07-26 15:19:23', '2019-07-26 15:19:23'),
(25, 'الف مبروك', 'social/ReplyCommentPost/uXTKPKF4ePlp40CwyVwhnuwOwjWcV5oOqEVJ4kNX.jpeg', 32, 20, '2019-07-26 15:19:53', '2019-07-26 15:19:53'),
(29, 'يا مساء الحلووين', NULL, 45, 20, '2019-07-26 15:28:43', '2019-07-26 15:28:43'),
(30, 'لاتشغلنا انت والموقع خقك', NULL, 48, 19, '2019-07-26 15:39:38', '2019-07-26 15:39:38'),
(31, 'قوووووة', NULL, 45, 19, '2019-07-26 15:40:57', '2019-07-26 15:40:57'),
(33, 'l;jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 53, 19, '2019-07-26 15:44:58', '2019-07-26 15:44:58'),
(34, 'عتبيع والاعتربي', NULL, 48, 16, '2019-07-26 15:45:55', '2019-07-26 15:45:55'),
(35, 'الفندم بيرم', NULL, 55, 17, '2019-07-26 15:47:00', '2019-07-26 15:47:00'),
(36, 'اهلا بالفندم', NULL, 55, 20, '2019-07-26 15:47:09', '2019-07-26 15:47:09'),
(37, 'السيد كعبول', NULL, 53, 17, '2019-07-26 15:47:20', '2019-07-26 15:47:20'),
(38, 'ايش يشوف', NULL, 50, 17, '2019-07-26 15:48:12', '2019-07-26 15:48:12'),
(39, 'جعلها مكسر بس', NULL, 45, 17, '2019-07-26 15:48:48', '2019-07-26 15:48:48'),
(40, 'الفندم العزي', NULL, 57, 17, '2019-07-26 15:57:31', '2019-07-26 15:57:31'),
(41, 'اهلا', NULL, 41, 17, '2019-07-26 16:04:10', '2019-07-26 16:04:10'),
(42, 'مركوووب', NULL, 68, 17, '2019-07-26 16:09:45', '2019-07-26 16:09:45'),
(43, 'الله من هذا العسل', NULL, 75, 17, '2019-07-26 16:11:34', '2019-07-26 16:11:34'),
(44, '❤❤❤❤❤', NULL, 75, 17, '2019-07-26 16:11:41', '2019-07-26 16:11:41'),
(45, '❤💜💜💜', NULL, 75, 17, '2019-07-26 16:11:49', '2019-07-26 16:11:49'),
(46, 'قولوا ماشاءالله', NULL, 75, 17, '2019-07-26 16:12:01', '2019-07-26 16:12:01'),
(47, 'الحالي حالي', NULL, 75, 21, '2019-07-26 16:12:35', '2019-07-26 16:12:35'),
(48, 'هذا صاحب العزي ابن حسين محمد', NULL, 76, 17, '2019-07-26 16:14:25', '2019-07-26 16:14:25'),
(49, 'بيرم', NULL, 76, 17, '2019-07-26 16:14:36', '2019-07-26 16:14:36'),
(50, 'اين الفندم', NULL, 77, 17, '2019-07-26 16:16:57', '2019-07-26 16:16:57'),
(51, 'نمممممممممممممممممممممممممممممم', NULL, 80, 19, '2019-07-26 16:47:08', '2019-07-26 16:47:08'),
(52, 'هذا ابن حسين محمد', NULL, 83, 17, '2019-07-26 16:49:39', '2019-07-26 16:49:39'),
(53, 'ايوة بذاتة ماعرفتاه من الكوت حق سعد الدين', NULL, 83, 16, '2019-07-26 16:52:07', '2019-07-26 16:52:07'),
(54, 'مكتن', NULL, 83, 19, '2019-07-26 16:54:05', '2019-07-26 16:54:05'),
(55, 'بس سوي الباروكة سوى', NULL, 82, 16, '2019-07-26 16:54:10', '2019-07-26 16:54:10'),
(56, 'لحالك', NULL, 84, 19, '2019-07-26 16:55:41', '2019-07-26 16:55:41'),
(57, 'انا ابركه داخلك', NULL, 82, 17, '2019-07-26 16:56:53', '2019-07-26 16:56:53'),
(58, 'اب نورت بالعزي', NULL, 84, 17, '2019-07-26 16:58:18', '2019-07-26 16:58:18'),
(59, 'حيا بمن شمه باروت', NULL, 85, 17, '2019-07-26 17:01:01', '2019-07-26 17:01:01'),
(60, 'موقع الكتروني تعريفي وتواصل اجتماعي بين الطلاب والكادر التعليمي لكلية التميز للعلوم الطبية والتقنية \r\nبالمحويت / الرجم.', 'social/ReplyCommentPost/rHUl7Sfle3BXNQOxBo2c0Svk3Z8kN4gIjBlET4eI.png', 100, 13, '2019-07-30 12:07:08', '2019-07-30 12:07:08');

-- --------------------------------------------------------

--
-- بنية الجدول `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `levels` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `departments`
--

INSERT INTO `departments` (`id`, `name`, `vision`, `message`, `fees`, `levels`, `created_at`, `updated_at`) VALUES
(3, 'تمريض', '', '', '', 1, NULL, NULL),
(4, 'ادارة اعمال', 'ان تكون كلية التميز الرائدة محلياً واقليمياً في المجال الأكاديمي والتطبيقي وتقديم المشورة العلمية والمهنية لخدمة المجتمع .', 'اعداد كوادر بشرية مؤهلة علمياً ومهنياً في مجالات العلوم الطبية والتقنية قادرة على المنافسة في سوق العمل المحلية والإقليمية ومجال البحث العلمي من خلال برنامج عالي الجودة وفقاً لل32ممارسات العلمية .', '600$', 3, '2019-07-10 08:11:32', '2019-07-10 08:12:10'),
(9, 'علوم حاسوب', 'ل78عهلح78ع', 'ههاعهل8بلح87فل', '15', 3, '2019-07-28 07:14:43', '2019-07-28 07:14:43');

-- --------------------------------------------------------

--
-- بنية الجدول `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `context` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `events`
--

INSERT INTO `events` (`id`, `context`, `date`, `created_at`, `updated_at`) VALUES
(1, 'n iwhegdi hgnrdfjgnh fnl', '2019-03-02', '2019-07-17 13:10:40', '2019-07-17 13:10:40'),
(5, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkkkkk k k k                         kk k k km km lk', '2019-03-02', '2019-07-17 13:20:20', '2019-07-17 13:20:20'),
(6, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkkkkk k k k                         kk k k km km lk', '2019-03-02', '2019-07-17 13:20:25', '2019-07-17 13:20:25'),
(8, 'n iwhegdi hgnrdfjgnh fnl', '2019-02-05', '2019-07-27 12:15:28', '2019-07-27 12:15:28'),
(9, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkkkkk k k k                         kk k k km km lk', '2019-07-08', '2019-07-29 16:08:20', '2019-07-29 16:08:20');

-- --------------------------------------------------------

--
-- بنية الجدول `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'social/groups/cover.jpg',
  `description` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `groups`
--

INSERT INTO `groups` (`id`, `cover_image`, `description`, `name`, `study_course_id`, `created_at`, `updated_at`) VALUES
(1, 'social/groups/coverImages/hLtQTJar4jwGebzXKckqNDXk95rYZfkpu8LoJKaY.jpeg', NULL, 'الثقافة الاسلامية_2019-2020', 1, '2019-07-14 13:09:58', '2019-07-17 10:28:58'),
(5, 'social/groups/cover.jpg', NULL, 'مقدمة الحاسب الآلي_2019-2020', 5, '2019-07-14 13:41:32', '2019-07-14 13:41:32'),
(6, 'social/groups/cover.jpg', NULL, 'اللغة العربية_2019-2020', 6, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(7, 'social/groups/cover.jpg', NULL, 'اللغة الانجليزية_2019-2020', 7, '2019-07-14 13:50:43', '2019-07-14 13:50:43'),
(8, 'social/groups/coverImages/4Hj5r8OEsrOUXxLP1WzsNWWs65soC8fzCLJoPjSU.png', NULL, 'مبادئ نظم المعلومات_2019-2020', 8, '2019-07-22 16:29:43', '2019-08-01 17:26:34'),
(10, 'social/groups/cover.jpg', NULL, 'اللغة الانجليزية_2019-2020', 11, '2019-07-26 15:05:20', '2019-07-26 15:05:20'),
(11, 'social/groups/coverImages/U9o5rCV1iPHsoTEpehdlDwhC5tk0A6OgWmsai4Re.jpeg', NULL, 'اللغة العربية_2019-2020', 12, '2019-07-26 15:05:52', '2019-07-26 15:08:27'),
(12, 'social/groups/cover.jpg', NULL, 'course-7-2018-2019', 13, '2019-07-27 11:39:04', '2019-07-27 11:39:04'),
(14, 'social/groups/cover.jpg', NULL, 'course-7-2018-2019', 15, '2019-07-27 11:41:13', '2019-07-27 11:41:13'),
(17, 'social/groups/cover.jpg', NULL, 'course-7-2018-2019', 13, '2019-07-27 14:23:18', '2019-07-27 14:23:18'),
(19, 'social/groups/cover.jpg', NULL, 'course-7-2019-2020', 18, '2019-07-27 16:24:01', '2019-07-27 16:24:01'),
(24, 'social/groups/cover.jpg', NULL, 'course-7-2019-2020', 9, '2019-07-28 06:11:16', '2019-07-28 06:11:16'),
(26, 'social/groups/cover.jpg', NULL, 'مقدمة الحاسب الآلي_2019-2020', 24, '2019-07-28 07:29:33', '2019-07-28 07:29:33');

-- --------------------------------------------------------

--
-- بنية الجدول `group_files`
--

CREATE TABLE `group_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `describtion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `originalName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `group_files`
--

INSERT INTO `group_files` (`id`, `describtion`, `file`, `originalName`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'jfkdbnlif', 'social/groups/files/rmQeh7gbLptt14sDYUywmUREiWwiN5lazPIf0DwX.docx', 'صلاح منصور.docx', 26, 29, '2019-07-28 07:32:25', '2019-07-28 07:32:25'),
(4, 'ارلاتءم', 'social/groups/files/dNVtIzNa1XBLWt8VtdZvKiMQPeNmzE9uWo29lo1u.docx', 'slah mnsor (1).docx', 8, 13, '2019-08-01 17:41:44', '2019-08-01 17:41:44'),
(5, 'ؤ', 'social/groups/files/FpjQMzQoamJkJ4C5JPYLkt6A5oEeqfJiOG5xlhYJ.docx', 'صلاح منصور.docx', 8, 4, '2019-08-01 17:42:07', '2019-08-01 17:42:07');

-- --------------------------------------------------------

--
-- بنية الجدول `group_members`
--

CREATE TABLE `group_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `isBlocked` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `group_members`
--

INSERT INTO `group_members` (`id`, `isAdmin`, `isBlocked`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 12, '2019-07-14 13:09:58', '2019-07-27 15:10:22'),
(5, 0, 0, 1, 4, '2019-07-14 13:09:58', '2019-07-14 13:09:58'),
(6, 0, 0, 1, 5, '2019-07-14 13:09:58', '2019-07-14 13:09:58'),
(7, 0, 0, 1, 6, '2019-07-14 13:09:58', '2019-07-14 13:09:58'),
(8, 0, 0, 1, 7, '2019-07-14 13:09:58', '2019-07-14 13:09:58'),
(9, 0, 0, 1, 8, '2019-07-14 13:09:58', '2019-07-14 13:09:58'),
(10, 0, 0, 1, 9, '2019-07-14 13:09:58', '2019-07-14 13:09:58'),
(11, 0, 0, 1, 10, '2019-07-14 13:09:58', '2019-07-14 13:09:58'),
(49, 1, 0, 5, 12, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(52, 0, 0, 5, 3, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(53, 0, 0, 5, 4, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(54, 0, 0, 5, 5, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(55, 0, 0, 5, 6, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(56, 0, 0, 5, 7, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(57, 0, 0, 5, 8, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(58, 0, 0, 5, 9, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(59, 0, 0, 5, 10, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(60, 0, 0, 5, 11, '2019-07-14 13:41:33', '2019-07-14 13:41:33'),
(61, 1, 0, 6, 12, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(64, 0, 0, 6, 3, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(65, 0, 0, 6, 4, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(66, 0, 0, 6, 5, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(67, 0, 0, 6, 6, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(68, 0, 0, 6, 7, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(69, 0, 0, 6, 8, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(70, 0, 0, 6, 9, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(71, 0, 0, 6, 10, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(72, 0, 0, 6, 11, '2019-07-14 13:50:00', '2019-07-14 13:50:00'),
(73, 1, 0, 7, 12, '2019-07-14 13:50:43', '2019-07-14 13:50:43'),
(76, 0, 0, 7, 3, '2019-07-14 13:50:43', '2019-07-14 13:50:43'),
(77, 0, 0, 7, 4, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(78, 0, 0, 7, 5, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(79, 0, 0, 7, 6, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(80, 0, 0, 7, 7, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(81, 0, 0, 7, 8, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(82, 0, 0, 7, 9, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(83, 0, 0, 7, 10, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(84, 0, 0, 7, 11, '2019-07-14 13:50:44', '2019-07-14 13:50:44'),
(85, 1, 0, 8, 13, '2019-07-22 16:29:43', '2019-07-22 16:29:43'),
(87, 0, 0, 8, 3, '2019-07-22 16:29:43', '2019-07-22 16:29:43'),
(88, 0, 0, 8, 4, '2019-07-22 16:29:43', '2019-07-22 16:29:43'),
(89, 0, 0, 8, 5, '2019-07-22 16:29:43', '2019-07-22 16:29:43'),
(108, 0, 0, 10, 13, '2019-07-26 15:05:20', '2019-07-27 11:25:47'),
(110, 0, 0, 10, 17, '2019-07-26 15:05:20', '2019-07-26 15:05:20'),
(111, 0, 0, 10, 18, '2019-07-26 15:05:20', '2019-07-26 15:05:20'),
(112, 0, 0, 10, 19, '2019-07-26 15:05:20', '2019-07-26 15:05:20'),
(113, 0, 0, 10, 20, '2019-07-26 15:05:20', '2019-07-26 15:05:20'),
(114, 1, 0, 11, 13, '2019-07-26 15:05:53', '2019-07-26 15:05:53'),
(115, 1, 0, 11, 16, '2019-07-26 15:05:53', '2019-07-26 15:58:00'),
(116, 0, 0, 11, 17, '2019-07-26 15:05:53', '2019-07-26 15:05:53'),
(117, 0, 0, 11, 18, '2019-07-26 15:05:53', '2019-07-26 15:05:53'),
(118, 0, 0, 11, 19, '2019-07-26 15:05:53', '2019-07-26 15:05:53'),
(119, 0, 0, 11, 20, '2019-07-26 15:05:53', '2019-07-26 15:05:53'),
(121, 0, 0, 11, 21, '2019-07-26 16:04:51', '2019-07-26 16:22:41'),
(122, 1, 0, 10, 12, '2019-07-27 11:22:17', '2019-07-27 11:25:32'),
(144, 1, 0, 14, 13, '2019-07-27 11:41:13', '2019-07-27 11:41:13'),
(146, 0, 0, 14, 3, '2019-07-27 11:42:47', '2019-07-27 11:42:47'),
(148, 0, 0, 14, 4, '2019-07-27 11:42:47', '2019-07-27 11:42:47'),
(152, 0, 0, 14, 6, '2019-07-27 11:42:47', '2019-07-27 11:42:47'),
(154, 0, 0, 14, 7, '2019-07-27 11:42:47', '2019-07-27 11:42:47'),
(156, 0, 0, 14, 8, '2019-07-27 11:42:47', '2019-07-27 11:42:47'),
(158, 0, 0, 14, 9, '2019-07-27 11:42:47', '2019-07-27 11:42:47'),
(160, 0, 0, 14, 10, '2019-07-27 11:42:47', '2019-07-27 11:42:47'),
(162, 0, 0, 14, 11, '2019-07-27 11:42:48', '2019-07-27 11:42:48'),
(164, 0, 0, 14, 14, '2019-07-27 11:42:48', '2019-07-27 11:42:48'),
(177, 1, 0, 17, 12, '2019-07-27 14:23:18', '2019-07-27 14:23:18'),
(178, 0, 0, 17, 3, '2019-07-27 14:23:32', '2019-07-27 14:23:32'),
(180, 0, 0, 17, 4, '2019-07-27 14:23:32', '2019-07-27 14:23:32'),
(182, 0, 0, 17, 5, '2019-07-27 14:23:32', '2019-07-27 14:23:32'),
(184, 0, 0, 17, 6, '2019-07-27 14:23:32', '2019-07-27 14:23:32'),
(186, 0, 0, 17, 7, '2019-07-27 14:23:32', '2019-07-27 14:23:32'),
(188, 0, 0, 17, 8, '2019-07-27 14:23:33', '2019-07-27 14:23:33'),
(190, 0, 0, 17, 9, '2019-07-27 14:23:33', '2019-07-27 14:23:33'),
(192, 0, 0, 17, 10, '2019-07-27 14:23:33', '2019-07-27 14:23:33'),
(194, 0, 0, 17, 11, '2019-07-27 14:23:33', '2019-07-27 14:23:33'),
(196, 0, 0, 17, 14, '2019-07-27 14:23:33', '2019-07-27 14:23:33'),
(198, 1, 0, 19, 12, '2019-07-27 16:24:01', '2019-07-27 16:24:01'),
(201, 0, 0, 19, 3, '2019-07-27 16:24:19', '2019-07-27 16:24:19'),
(203, 0, 0, 19, 4, '2019-07-27 16:24:19', '2019-07-27 16:24:19'),
(207, 0, 0, 19, 6, '2019-07-27 16:24:19', '2019-07-27 16:24:19'),
(209, 0, 0, 19, 7, '2019-07-27 16:24:20', '2019-07-27 16:24:20'),
(211, 0, 0, 19, 8, '2019-07-27 16:24:20', '2019-07-27 16:24:20'),
(213, 0, 0, 19, 9, '2019-07-27 16:24:20', '2019-07-27 16:24:20'),
(215, 0, 0, 19, 10, '2019-07-27 16:24:20', '2019-07-27 16:24:20'),
(218, 0, 0, 19, 14, '2019-07-27 16:24:20', '2019-07-27 16:24:20'),
(229, 0, 0, 24, 3, '2019-07-28 06:11:28', '2019-07-28 06:11:28'),
(233, 0, 0, 24, 4, '2019-07-28 06:11:29', '2019-07-28 06:11:29'),
(237, 0, 0, 24, 6, '2019-07-28 06:11:29', '2019-07-28 06:11:29'),
(239, 0, 0, 24, 7, '2019-07-28 06:11:29', '2019-07-28 06:11:29'),
(241, 0, 0, 24, 8, '2019-07-28 06:11:29', '2019-07-28 06:11:29'),
(243, 0, 0, 24, 9, '2019-07-28 06:11:29', '2019-07-28 06:11:29'),
(245, 0, 0, 24, 10, '2019-07-28 06:11:29', '2019-07-28 06:11:29'),
(247, 0, 0, 24, 14, '2019-07-28 06:11:29', '2019-07-28 06:11:29'),
(249, 1, 0, 26, 28, '2019-07-28 07:29:33', '2019-07-28 07:33:34'),
(253, 0, 0, 26, 6, '2019-07-28 07:34:26', '2019-07-28 07:34:26');

-- --------------------------------------------------------

--
-- بنية الجدول `imagenews`
--

CREATE TABLE `imagenews` (
  `id` int(10) UNSIGNED NOT NULL,
  `new_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `imagenews`
--

INSERT INTO `imagenews` (`id`, `new_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'news/AZhQEmhBVmexzIDq5OL0dg02F5ApOoDygnCk5EgS.jpeg', '2019-07-17 12:59:50', '2019-07-17 12:59:50'),
(2, 2, 'news/LPb5fSrfaabFbEGkMYkAQ4gdknFoq9uAT4IjG3IZ.jpeg', '2019-07-17 13:00:20', '2019-07-17 13:00:20'),
(3, 3, 'news/rrRnnEYgkM2UGdSeM4o8nlguWroX2U9jimI7vt4n.png', '2019-07-17 13:00:51', '2019-07-17 13:00:51'),
(4, 4, 'news/dvga155wmbD5VITrXiOaVPIm02NTZzj6gqZzYM5S.png', '2019-07-17 13:01:21', '2019-07-17 13:01:21'),
(5, 5, 'news/GRC5HDveLRCfaAmA0OvRComUAvO6haKBjpXTQkmK.jpeg', '2019-07-17 13:21:57', '2019-07-17 13:21:57'),
(6, 6, 'news/T0X93sxsEh3TWW3CQvkF1GC6Ik2wCEsUC1tWif1a.jpeg', '2019-07-17 13:23:03', '2019-07-17 13:23:03'),
(7, 6, 'news/QKhkmatFQ5K1Ts0wjCLKP37YDj4plLmXe5GS5ss4.jpeg', '2019-07-17 13:23:03', '2019-07-17 13:23:03'),
(8, 6, 'news/GszTe13Dv51PjUfPrSHBjMzqH3RuHsCIYf0mir2Q.jpeg', '2019-07-17 13:23:03', '2019-07-17 13:23:03'),
(10, 7, 'news/cQ4LlAL6CyV2znkdUCOGBhqK6DBLWefjIsPLWinI.png', '2019-07-27 12:12:01', '2019-07-27 12:12:01');

-- --------------------------------------------------------

--
-- بنية الجدول `image_posts`
--

CREATE TABLE `image_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `image_posts`
--

INSERT INTO `image_posts` (`id`, `image`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'social/post/VmsMRp5h4C9tRriy63G8bpVTsWUdEQIY6q3O5au7.jpeg', 6, '2019-07-16 18:49:39', '2019-07-16 18:49:39'),
(2, 'social/post/iwGSMKnpDblRHu9nsCDTdKIBBskCv7bJaeQmYGIP.webp', 6, '2019-07-16 18:49:39', '2019-07-16 18:49:39'),
(3, 'social/post/s1FrDqIX5YaW3gGJvrSHG9huUTSYiteTAf1MQ3nD.jpeg', 6, '2019-07-16 18:49:39', '2019-07-16 18:49:39'),
(4, 'social/post/89XUwbDnfSOjY5Gow1CKWpltecKyYlXAPwtwAzYg.jpeg', 6, '2019-07-16 18:49:40', '2019-07-16 18:49:40'),
(5, 'social/post/8KppqEUcR88CsMkZcDmNwLHyp2oihG3kOokIsa94.jpeg', 6, '2019-07-16 18:49:40', '2019-07-16 18:49:40'),
(6, 'social/post/HFhuMg034aKU3Anz0C3daayPc1KFPeyNmufuQXsB.jpeg', 6, '2019-07-16 18:49:40', '2019-07-16 18:49:40'),
(7, 'social/post/1sWoNAYJ9qHSigShl9Ieh361IJNRRclQYK8vqmaa.jpeg', 6, '2019-07-16 18:49:40', '2019-07-16 18:49:40'),
(8, 'social/post/VgHUfjg489IQ7pfxAoYHQ5UgEp2Ojqp2jOIGvmiN.jpeg', 14, '2019-07-16 19:39:43', '2019-07-16 19:39:43'),
(9, 'social/post/dT2CSlzI3THhJGbZBrpzVCTLFi1JMPM4zLTjDZQZ.jpeg', 15, '2019-07-16 19:40:12', '2019-07-16 19:40:12'),
(10, 'social/post/BqPWoaTB2oSMTRNXtpajhNPnfNUIlYJprdgmWb6t.png', 20, '2019-07-17 19:02:16', '2019-07-17 19:02:16'),
(11, 'social/post/FJVMq0mj9hEALx2Ka2Tb3OX4wInLfuK4sL9CN9Wu.png', 20, '2019-07-17 19:02:16', '2019-07-17 19:02:16'),
(12, 'social/post/wUK4t6McBqonPA4Ne20u3genGyRilSo3QaGdcgAW.png', 20, '2019-07-17 19:02:16', '2019-07-17 19:02:16'),
(13, 'social/post/XMSGEbFDgfRGUsASilAFAidXHqpyIO1ODvlWFIfU.jpeg', 20, '2019-07-17 19:02:16', '2019-07-17 19:02:16'),
(14, 'social/post/vbqH51kAXG8eORRuAco9ZBInE6Pg8X92HQRnWH8s.jpeg', 20, '2019-07-17 19:02:17', '2019-07-17 19:02:17'),
(15, 'social/post/e5fcc6gHNJLhLiMrUUTrU2He3dtW7XUzJOJuKNR2.png', 20, '2019-07-17 19:02:17', '2019-07-17 19:02:17'),
(22, 'social/post/qBZOSXcHYiGnQEcwIR76ByUNc8hRzonbfryq944I.png', 31, '2019-07-24 06:45:37', '2019-07-24 06:45:37'),
(24, 'social/post/fspQoueyLjQlDjWWFLYHohlPdWJcVs8NBGFk3D8V.jpeg', 41, '2019-07-26 15:20:31', '2019-07-26 15:20:31'),
(25, 'social/post/XwMcrHJpSQZAVC6IIa6eNYp9RitkZAMIlP4Wdsy1.jpeg', 45, '2019-07-26 15:27:44', '2019-07-26 15:27:44'),
(26, 'social/post/70OEpAWQcRmM6c9CYLG4MkTCePy0iVHrdqkslA5Z.png', 48, '2019-07-26 15:36:48', '2019-07-26 15:36:48'),
(27, 'social/post/4w1qyAtQpWdLvl3GSPah7mC3gqpDGypaZhFnncLi.png', 53, '2019-07-26 15:43:14', '2019-07-26 15:43:14'),
(28, 'social/post/7s2Ugl3tlmUUd3tyzO3Ws9bpTuiclDAF9Y0gQPOC.jpeg', 55, '2019-07-26 15:45:49', '2019-07-26 15:45:49'),
(29, 'social/post/pwGI3bqgIoAe1IZnGqmwHGlG9xIAmDFuA6HdGAvm.jpeg', 69, '2019-07-26 16:08:58', '2019-07-26 16:08:58'),
(30, 'social/post/UQWTSrESPxiVJYYbdcrd1OQXIEaQ243H21jgINmR.jpeg', 70, '2019-07-26 16:09:33', '2019-07-26 16:09:33'),
(31, 'social/post/sqXXT4Uh9V2EwzpdptNnoz3w9JxnD8QRVbJisAlR.jpeg', 74, '2019-07-26 16:10:46', '2019-07-26 16:10:46'),
(32, 'social/post/8PNqUyXEJq2zrmwqZUOqfnIIIQPUgUyneigDKGxq.jpeg', 75, '2019-07-26 16:10:47', '2019-07-26 16:10:47'),
(33, 'social/post/Wr5Q49pIDoSggX0LmIBhigzKlUiBLzrWRQxpsklD.jpeg', 76, '2019-07-26 16:13:55', '2019-07-26 16:13:55'),
(34, 'social/post/f8wauqNZlICj08c2oTrErbeKCvPrzYzARqbx4ypL.jpeg', 80, '2019-07-26 16:45:05', '2019-07-26 16:45:05'),
(35, 'social/post/ZZrl6X6jBkQYdmTaZWvCgfQ9SaqwPcWJfB9hgQ5L.gif', 81, '2019-07-26 16:45:22', '2019-07-26 16:45:22'),
(36, 'social/post/yySlGM31a4NdU0AjFH6KrNWMHjAM8vHSzomhYH9i.jpeg', 82, '2019-07-26 16:45:28', '2019-07-26 16:45:28'),
(37, 'social/post/F88GlsS94T9s4b9rOZU0SFk7I3ez2Vmq4feqd3rc.jpeg', 83, '2019-07-26 16:48:59', '2019-07-26 16:48:59'),
(38, 'social/post/wfbgwyb1GxEAWzkMhruhKdWHMr5LQm6oZmRYOKdh.jpeg', 84, '2019-07-26 16:54:46', '2019-07-26 16:54:46'),
(48, 'social/post/KFD7q15ow4TSzPmLzcjcSL3AqnQPYpoeDMKzdGc0.png', 97, '2019-07-28 07:22:16', '2019-07-28 07:22:16'),
(49, 'social/post/6ClIp6zhy2dnn6mhEmaxIilPzNvsbW4mm4dPzb5V.png', 97, '2019-07-28 07:22:16', '2019-07-28 07:22:16'),
(50, 'social/post/Y2hy39LUL0jt3NZwhuuH0rA1nEq6FDVQUUnT8te2.jpeg', 100, '2019-07-30 12:04:50', '2019-07-30 12:04:50'),
(51, 'social/post/DlOeJAmomlmTNuMYZOP5q6jEFmVbCeWTrUI9A9xe.jpeg', 100, '2019-07-30 12:04:50', '2019-07-30 12:04:50'),
(53, 'social/post/878nmGI5hfXvzQja3OGbbfxcxgkyEGQBBdTlB3TK.jpeg', 100, '2019-07-30 12:04:50', '2019-07-30 12:04:50'),
(54, 'social/post/rOqMBdqMvWTzZfoefK1jJbywSfNBM1gaFcvlmZ7S.jpeg', 100, '2019-07-30 12:04:50', '2019-07-30 12:04:50'),
(55, 'social/post/F0LD5qCVLDJCwhgdccKdVu2rulpwiFOLwUm7ZmSv.jpeg', 100, '2019-07-30 12:06:08', '2019-07-30 12:06:08'),
(56, 'social/post/767mqjKG2pRRVpVcHLlr6XBLNMxGnUoIjtseTTeI.jpeg', 100, '2019-07-30 12:06:08', '2019-07-30 12:06:08');

-- --------------------------------------------------------

--
-- بنية الجدول `like_coumment_posts`
--

CREATE TABLE `like_coumment_posts` (
  `coumment_post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('like','dislike') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `like_coumment_posts`
--

INSERT INTO `like_coumment_posts` (`coumment_post_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(4, 6, 'like', '2019-07-17 21:16:19', '2019-07-17 21:16:19'),
(10, 3, 'like', '2019-07-26 14:43:53', '2019-07-26 14:43:53'),
(13, 3, 'like', '2019-07-26 14:57:21', '2019-07-26 14:57:21'),
(14, 3, 'like', '2019-07-26 14:56:17', '2019-07-26 14:56:17'),
(14, 5, 'like', '2019-07-26 14:55:16', '2019-07-26 14:55:16'),
(15, 3, 'like', '2019-07-26 14:55:56', '2019-07-26 14:55:56'),
(16, 3, 'like', '2019-07-26 14:56:04', '2019-07-26 14:56:04'),
(17, 3, 'like', '2019-07-26 14:56:43', '2019-07-26 14:56:43'),
(19, 18, 'like', '2019-07-26 15:09:59', '2019-07-26 15:09:59'),
(35, 17, 'like', '2019-07-26 15:47:03', '2019-07-26 15:47:03'),
(37, 20, 'like', '2019-07-26 15:47:54', '2019-07-26 15:47:54'),
(43, 17, 'like', '2019-07-26 16:12:27', '2019-07-26 16:12:27'),
(44, 17, 'like', '2019-07-26 16:12:26', '2019-07-26 16:12:26'),
(45, 17, 'like', '2019-07-26 16:12:21', '2019-07-26 16:12:21'),
(46, 17, 'like', '2019-07-26 16:12:24', '2019-07-26 16:12:24'),
(47, 17, 'like', '2019-07-26 16:12:57', '2019-07-26 16:12:57'),
(48, 21, 'like', '2019-07-26 16:17:27', '2019-07-26 16:17:27'),
(52, 16, 'like', '2019-07-26 16:52:16', '2019-07-26 16:52:16'),
(53, 16, 'like', '2019-07-26 16:52:18', '2019-07-26 16:52:18'),
(53, 17, 'like', '2019-07-26 16:52:27', '2019-07-26 16:52:27'),
(60, 13, 'like', '2019-07-30 12:13:09', '2019-07-30 12:13:09');

-- --------------------------------------------------------

--
-- بنية الجدول `like_posts`
--

CREATE TABLE `like_posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('like','dislike') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `like_posts`
--

INSERT INTO `like_posts` (`post_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(97, 28, 'like', '2019-07-28 07:22:32', '2019-07-28 07:22:32'),
(100, 13, 'like', '2019-07-30 12:06:14', '2019-07-30 12:06:14'),
(100, 29, 'like', '2019-07-30 12:14:22', '2019-07-30 12:14:22');

-- --------------------------------------------------------

--
-- بنية الجدول `like_post_groups`
--

CREATE TABLE `like_post_groups` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('like','dislike') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `maininfo`
--

CREATE TABLE `maininfo` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `maininfo`
--

INSERT INTO `maininfo` (`id`, `slug`, `name`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'اسم الموقع', 'sit_name', 'كليه التميز', 1, NULL, '2019-02-23 16:15:46'),
(2, 'شعار الموقع ', 'logo', 'setting/kpw0vBg3z04MmdF9jheK3LFc4ILdYiZ5vePzUhsQ.png', 3, NULL, '2019-07-15 16:50:59'),
(3, 'رقم الهاتف', 'phone', '77356941', 1, NULL, '2019-07-08 15:53:08'),
(4, 'حساب الفيس بوك', 'facebook', '..www.facebook,com', 1, NULL, NULL),
(5, 'قناه اليوتيوب', 'youtube', '..www.youtube/altamez.com', 1, NULL, NULL),
(6, 'حساب التويتر', 'twetter', '..', 1, NULL, NULL),
(7, 'رقم الواتساب', 'whatsap', '777888999', 1, NULL, NULL),
(8, 'عن الجامعة', 'about_u', '<p><strong>أنشئت كلية التميز للعلوم الطبية والتقنية بتاريخ2016 بموجب الترخيص الوزاري الأولي </strong></p>\r\n\r\n<p><strong>رقم(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )&nbsp; صادر عن وزارة التعليم الفني والتدريب المهني وترخيص الاعتماد العام </strong></p>\r\n\r\n<p><strong>برقم (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ) لتكون كلية التميز هي أول كلية مجتمع خاصة بمديرية الرجم &nbsp;لتسهم في عملية التنمية البشرية في بلادنا من خلال رفد أسواق العمل بكوادر مؤهلة ومدربة في المجال الصحي والتقني النوعي وبكفاءات عالية , كوادر قادرة على مواكبة التطورات العلمية الحديثة وتلبية تطلعات الفرد والمجتمع , لتحقيق التنمية البشرية الشاملة , في جميع التخصصات والأقسام المرخصة للكلية .</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>أهم التراخيص والاعتمادات &nbsp;.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; التراخيص الحاصلة عليها كلية التميز(كلية مجتمع خاصة) من المجلس الأعلى لكليات المجتمع( وزير التعليم الفني والتدريب المهني ) </strong></p>\r\n\r\n<p><strong>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>الترخيص الاولي رقم (31) لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp; ترخيص الاعتماد العام رقم (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ) لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;</strong><strong>&nbsp;&nbsp;&nbsp; ترخيص الاعتماد الخاص رقم (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )&nbsp; لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;</strong><strong>&nbsp;&nbsp;&nbsp; ترخيص النهائي رقم (&nbsp;&nbsp;&nbsp;&nbsp; )&nbsp; لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تراخيص السجل التجاري .</strong></p>', 2, NULL, '2019-07-08 15:41:52'),
(9, 'اسم عميد الكلية', 'name_b', 'د / علي مظفرb', 1, NULL, '2019-07-27 12:10:34'),
(10, 'كلمة عميد الكلية', 'word_b', '<p><strong>في عصر التطور المتسارع في شتى مجالات العلوم المعرفية والخبرات المهنية وفي زمن تخطت فيه العجلة والسرعة كل الحدود &nbsp;الفاصلة والمصطنعة واصبح العالم في حكم القرية الواحدة كان ولابد من الاستفادة من هذا الحجم الهائل في التطور المعرفي.</strong></p>\r\n\r\n<p><strong>ولم تكن أي حضارة نباتاً عشوائياً وإنما كان أهم ركيزة لها هو العلم الذي يرقى بالإنسان ويحقق أهدافة وطموحاته </strong></p>\r\n\r\n<p><strong>الخبرات العلمية والمهنية . </strong></p>\r\n\r\n<p><strong>وبالعلم ومن خلال الخبرات التراكمية لمن سبقونا في المجالات المهنية بطرق علمية حديثة ووفق أحدث الوسائل والمناهج وبأحدث الأجهزة المعملية نعمل على مواكبة كل جديد ونافع , لتدريب وتأهيل العناصر المجتمعية بما يسد حاجات السوق من مهارات وخبرات بجودة عالية من خلال اكساب أبناء المجتمع سبل العيش وفقاً لأحدث الوسائل العلمية الحديثة كي يحملون على اكتافهم معاول البناء وفقاُ لعقول نيرة فيكونوا صناعاً لغد افضل .</strong></p>\r\n\r\n<p><strong>وبما ان هدفنا المساهمة في خلق مجتمع مثالي متسلحاً بالعلم والمعرفة يواكب كل جديد في شتى مجالات العلوم المختلفة كان ولابد من وضع الأهداف والخطط والبرامج لتدريب وتأهيل العنصر البشري في هذه البلدة الطيبة , ليصبح نافعاً لهذا المجتمع الذي له حق علينا كشريحة متعلمة في ان نجعل منه مجتمعاً مثالياً والذي لا يمكن ذلك الا بتدريب وتأهيل أبناؤه وتنمية مهاراتهم وقدراتهم في كسب وتعلم مهنه تخدم المجتمع وفق خدمه تعليمية متميزة ذات جودة عالية .</strong></p>\r\n\r\n<p><strong>لذلك عملنا على إنشاء مؤسسه متميزة لتدريب وتأهيل كوادرنا وفق الخطط والبرامج والبنية التحتية المتميزة من مبانِ ومعامل ومناهج متطورة وفق كادر أكاديمي وإداري وفني متميز.</strong></p>\r\n\r\n<p><strong>وقد جٌمع كل ذلك في مؤسسة واحدة هي ( كلية التميز ) والتي نأمل أن نتميز قدماً بإخراج كوادر متميزة تقدم خدمة متميزة وتكون اسم على مسمى .</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &quot; والسلام عليكم ورحمة الله وبركاته &quot;</strong></p>', 2, NULL, '2019-07-08 15:39:50'),
(11, 'صوره عميد الكلية', 'image_b', 'setting/ttqCiogicKZ4WoDNGvgBPoqyJvWsOTXXeTUQgnID.jpeg', 3, NULL, '2019-07-15 17:12:12'),
(12, 'روية الكلية', 'vision', '<p><strong>ان تكون كلية التميز الرائدة محلياً واقليمياً في المجال الأكاديمي والتطبيقي وتقديم المشورة العلمية والمهنية لخدمة المجتمع .</strong></p>', 2, NULL, '2019-07-08 15:43:59'),
(13, 'رسالة الكلية ', 'message_u', '<p>&nbsp;</p>\r\n\r\n<p><strong><span dir=\"RTL\">اعداد كوادر بشرية مؤهلة علمياً ومهنياً في مجالات العلوم الطبية والتقنية قادرة على المنافسة في سوق العمل المحلية والإقليمية ومجال البحث العلمي من خلال برنامج عالي الجودة وفقاً لل32ممارسات العلمية </span></strong></p>', 2, NULL, '2019-07-08 15:44:22'),
(14, 'اهداف الكلية ', 'object_u', '<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li><strong>تزويد الطلاب الدارسين بالمعارف وإكسابهم المهارات التطبيقية اللازمة لتمكينهم من استخدام وسائل التكنولوجيا الحديثة خدمة لأهداف التنمية الاقتصادية والاجتماعية وحاجات المجتمع المحلي وسوق العمل. </strong></li>\r\n	<li><strong>إعداد الدارسين وتأهيلهم تأهيلاً فنياً يركز على الجوانب العلمية والتطبيقية من خلال بيئة تكميلية وتفاعلية بما يعزز من تنافسية الخريجين في الحصول على فرص العمل المناسبة . </strong></li>\r\n	<li><strong>إعداد الكوادر البشرية اللازمة من المستوى التقني للوظائف والمهن الفنية والإدارية المختلفة للمساهمة في توطين الكفاءات المحلية . </strong></li>\r\n	<li><strong>توفير التعليم المستمر وإعادة التدريب وتقديم برامج دراسية متنوعة ودورات قصيرة وطويلة للمجتمع المحلي . </strong></li>\r\n	<li><strong>رفع كفاءة العاملين في القطاعين العام والخاص . </strong></li>\r\n	<li><strong>القيام بالأبحاث والدراسات العلمية والمالية والإدارية والتطبيقية .</strong></li>\r\n	<li><strong>ترسيخ مبدأ مشاركة المجتمع في التنمية البشرية ونشر التعليم . </strong></li>\r\n	<li><strong>تعزيز التعاون مع الجامعات والكليات والمعاهد المحلية والعربية والأجنبية لخدمة هذه الأهداف .</strong></li>\r\n</ol>', 2, NULL, '2019-07-08 15:45:06'),
(15, 'الهيكل التنضيمي', 'structure_u', 'setting/QH1d2WdkuaXq4eC0LZ1VCpxQYasz2IwJhtgQyQzK.jpeg', 3, NULL, '2019-07-17 18:58:38'),
(16, 'البريد الالكتروني', 'email', 'altameez123@gmail.com', 1, NULL, NULL),
(17, 'شروط القبول', 'accept_condiation', '<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li><strong>أن يكون الطالب حائزاً على شهادة الثانوية العامة أو ما يعادلها وفقاً للنسبة المحددة للقبول من المجلس الأعلى لكليات المجتمع .</strong></li>\r\n	<li><strong>&nbsp;تقديم كافة الوثائق المطلوبة بحسب الشروط العامة والخاصة بالقبول والتسجيل إلى لجنة التسجيل والقبول .</strong></li>\r\n	<li><strong>تسليم رسوم التسجيل والبطاقة والرسوم الدراسية المقررة للجهة المختصة وأخذ استلام بذلك .</strong></li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><strong>يستوفي ملف الطالب المتقدم للالتحاق بالكلية الوثائق والمستندات الآتية :</strong></h3>\r\n\r\n<ol>\r\n	<li><strong>أصل استمارة الثانوية العامة أو ما يعادلها + صورة طبق الأصل .</strong></li>\r\n	<li><strong>أصل النجاح في الثانوية العامة أو ما يعادلها + صورة طبق الأصل معتمدة من وزارة خارجية بلد الطالب وسفارة اليمن في ذلك البلد ومصادق عليها من وزارة الخارجية اليمنية ( لغير اليمنيين أو الدارسين لخريجي الثانوية خارج اليمن ) .</strong></li>\r\n	<li><strong>صورة البطاقة الشخصية أو جواز السفر لغير اليمنيين .</strong></li>\r\n	<li><strong>كشف طبي يثبت اللياقة الصحية وخلوه من الأمراض المعدية . </strong></li>\r\n	<li><strong>شهادة إنفاق مالية من ولي أمر الطالب الوافد دراسيا على نفقته الخاصة مصدقة من سفارة بلدة في اليمن .</strong></li>\r\n	<li><strong>تصريح الإقامة في الأراضي اليمنية سارية المفعول ( لغير اليمنيين ) .</strong></li>\r\n	<li><strong>موافقة الجهاز التنفيذي للمجلس الأعلى ( لغير اليمنيين ) .</strong></li>\r\n	<li><strong>&nbsp;استمارة&nbsp; طلب الالتحاق بالكلية .</strong></li>\r\n	<li><strong>إفادة من وزارة التعليم الفني والتدريب المهني للطالب الوافد الحاصل على منحة دراسية من الحكومة اليمنية. </strong></li>\r\n</ol>\r\n\r\n<p><strong>تسجيل الطلبة الدراسين والمحولين من الكليات أو الجامعات الأخرى ( طلبة المقاصة&nbsp; ) لا يتجاوز فترة القبول والتسجيل المدة الزمنية المحددة للقبول والتسجيل في الكلية .</strong></p>', 2, NULL, '2019-07-16 11:11:27'),
(22, 'شؤون الطلاب', 'about_student', 'Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.\r\n                        Specifically, we support the latest versions of the following browsers and platforms.', 2, NULL, NULL),
(23, 'عنوان الكاية', 'address', 'الجمهورية اليمنية- محافظة المحويت-- مديرية الرجم', 1, '2019-04-02 04:00:00', '2019-04-02 04:00:00'),
(24, 'الهاتف', 'phone', '02 124 515', 1, '2019-04-02 04:00:00', '2019-04-02 04:00:00'),
(25, 'البريد الالكتروني', 'email', 'altammez@gmail.com', 1, '2019-04-02 04:00:00', '2019-04-02 04:00:00'),
(26, 'رابط الموقع', 'link', 'www.altameez.com', 1, '2019-04-02 04:00:00', '2019-04-02 04:00:00'),
(27, 'التحويل الخارجي', 'external_switch', '<p><strong>يحق للطالب الراغب في التحويل من كليات أخرى معترف بها إلى كلية التميز وفق ما يلي:-</strong></p>\r\n\r\n<ol>\r\n	<li><strong>أن يقدم الطالب المحول طلباً إلى إدارة القبول والتسجيل وفق النموذج المعتمد لذلك مرفقاً به الوثائق اللازمة كالآتي :-</strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li><strong>جميع الوثائق والشهادات المطلوبة بحسب شروط القبول والتسجيل وفق المواعيد المحددة للقبول .</strong></li>\r\n	<li><strong>كشوفات النتائج أو السجل الاكاديمي&nbsp; والتي تثبت دراسته في الكلية التي حول منها معمدة من الكلية او الجامعة ومصادق عليها من المجلس الاعلى لكليات المجتمع أو الكليات الحكومية أو الخاصة.</strong></li>\r\n	<li><strong>أن يكون الطالب قد اجتاز جميع مواد المستوى الدراسي الأول على الأقل بنجاح ما لم فيعامل كمسجل جديد يخضع لجميع شروط القيد والتسجيل.</strong></li>\r\n	<li><strong>افراد مفردات كل مقرر دراسي تم دراسته في الكلية المحول منها او الدارس فيها .</strong></li>\r\n	<li><strong>أن لا يكون قد انقطع عن الدراسة أكثر من سنة دراسية في الكلية التي يريد التحويل منها .</strong></li>\r\n	<li><strong>أن يكون التحويل إلى قسم مساوي للقسم الذي درس فيه في الجهة التي حول منها .</strong></li>\r\n	<li><strong>أن لا يكون الطالب قد فصل من الجهة التي حول منها لأسباب سلوكية أو أكاديمية أو أخلاقية وإذا اتضح ذلك بعد قبوله في الكلية فيعد تحويله ملغيا ويخضع للإجراءات المناسبة المتخذة ضده بحسب قرار العمادة </strong><strong><span dir=\"LTR\">.</span></strong></li>\r\n	<li><strong>المقاصة وثيقة تحديد مستوى وليست خطة دراسية وعلى الطالب الالتزام بالتغييرات التي قد تطرأ على الخطة الدراسية للقسم المحول الية .</strong></li>\r\n</ul>', 2, NULL, '2019-07-15 18:16:49'),
(28, 'تويتر', 'twitter', 'ىن', 1, NULL, NULL),
(29, 'التحويل الداخلي', 'internal_switch', '<h2>يجوز للطالب المستجد في الكلية التحويل من قسم الى قسم آخر على أن يكون التحويل خلال فترة القبول والتسجيل المعلن عنها وفق الشروط الاتية :</h2>\r\n\r\n<ul>\r\n	<li><strong>تقديم نموذج طلب تحويل الى مسجل الكلية خلال المدة المحددة ويعتمد من عميد الكلية مدونة فيه أسم الطالب وجميع البيانات .</strong></li>\r\n	<li><strong>توفر الشروط الخاصة بالقبول في القسم المنتقل الية . </strong></li>\r\n	<li><strong>أن يتقدم بطلب التحويل خلال فترة لا تزيد عن أسبوعين كحد أقصى من بدء الدراسة في القسم الذي يريد التحويل إليه وأن لا تتجاوز الفترة بين بدء الدراسة في القسم الذي سجل فيه وبدء الدراسة في القسم الذي يريد التحويل إليه.</strong></li>\r\n	<li><strong>أن لا يكون التحويل لأكثر من مرة خلال سنوات الدراسة في الكلية . </strong></li>\r\n	<li><strong>دفع الرسوم الدراسية المقررة للتحويل بحسب ملحق اللائحة المالية لنفس العام بعد موافقة العمادة والجهات المختصة&nbsp;على تحويل الطالب بصورة نهائية على طلب تحويل الطالب في نفس الطلب المقدم منه .</strong>\r\n	<h2><strong>* لا تستحق أي رسوم تحويل على الطالب&nbsp; اذا تم التحويل لأسباب راجعة إلى الكلية كما يلي :</strong></h2>\r\n	</li>\r\n	<li>\r\n	<ul>\r\n		<li><strong>عدم فتح الشعبة أو القسم لعدم استيفاء النصاب .</strong></li>\r\n		<li><strong>إغلاق القسم أو الشعبة لأسباب عامة أو خاصة تقررها العمادة .</strong></li>\r\n		<li><strong>تحويل نوع الدراسة في الشعبة أو القسم من تخصص لآخر يقر من قبل العمادة .</strong></li>\r\n		<li><strong>توقيف الدراسة مؤقتاً في الشعبة أو القسم لأسباب تستدعي ذلك وتقرها العمادة.</strong></li>\r\n		<li><strong>أي أسباب أخرى تحول دون مواصلة بعض أو كل الطلاب لدراستهم في أي قسم من أقسام الكلية.</strong></li>\r\n	</ul>\r\n	</li>\r\n</ul>', 2, NULL, '2019-07-15 18:17:14'),
(30, 'وقف قيد', 'stop_study', '<p>* يحق لأي طالب من طلاب الكلية وقف قيده الدراسي وتأجيل دراسته وفق الشروط والقواعد الآتية :-</p>\r\n\r\n<ol>\r\n	<li>تقديم طلب توقيف القيد وفق النموذج المعتمد مدوناً فيه اسمه وشعبته ودفعته ومستواه وسبب رغبته في توقيف قيده الدراسي وموقعاً عليه من قبله<span dir=\"LTR\"> .</span></li>\r\n	<li>التقدم بطلب توقيف القيد لمدة سنة دراسية واحدة فقط و بإجمالي فصلين دراسيين فقط خلال فترة دراسته كاملة في الكلية<span dir=\"LTR\">.</span></li>\r\n</ol>\r\n\r\n<p>أن يكون الطالب قد درس المستوى الأول واجتازه بنجاح<span dir=\"LTR\"> .</span></p>\r\n\r\n<ol>\r\n	<li>يجوز لعميد الكلية بصورة استثنائية قبول وقف قيد الطالب خلال الفصل الدراسي &nbsp;الاول أو الثاني للمستوى الثاني أو الثالث للظروف الطارئة للطالب .</li>\r\n	<li>الموافقة النهائية كتابيا من الإدارات المختصة والعمادة على&nbsp; طلب توقيف قيد الطالب .</li>\r\n	<li>إخلاء طرف الطالب الراغب في توقيف قيده من جميع المتعلقات المالية والأكاديمية في الكلية من قبل الجهات المختصة بذلك<span dir=\"LTR\"> .</span></li>\r\n</ol>\r\n\r\n<p>لا يجوز وقف قيد الطلاب للفئات التالية :</p>\r\n\r\n<ol>\r\n	<li>لا يجوز إيقاف القيد للطلاب المستجدين أو المحولين من كليات أخرى أو الحاصلين على منحة داخلية , او من المجلس الاعلى&nbsp; لكليات المجتمع أو منح من الحكومة .</li>\r\n	<li>لا يجوز وقف قيد أي طالب تغيب عن دراسته أو اختباراته بغير عذر مقبول متجاوزاً الحد المسموح به في ذلك.</li>\r\n	<li>الطالب الباقي للإعادة لا يحق له وقف القيد .</li>\r\n	<li>أن لا يكون للطالب المراد توقيف قيده إنذار نهائي بالفصل من الكلية .</li>\r\n</ol>', 2, NULL, '2019-07-15 18:24:15'),
(31, 'انسحاب', 'retreating', '<p>يحق لأي طالب أن ينسحب من الدراسة بالكلية وفق القواعد والشروط الآتية:-</p>\r\n\r\n<ol>\r\n	<li>&nbsp;تقديم طلب خطي من الطالب بسحب ملفة من الكلية وفق النموذج المعتمد <span dir=\"LTR\">&nbsp;.</span></li>\r\n	<li>أن يتقدم للانسحاب شخصياً أو يوكل من يراه على أن يكون التوكيل معتمداً من الجهات الرسمية المختصة<span dir=\"LTR\"> .</span></li>\r\n	<li>أن ينهي جميع المتعلقات المالية والأكاديمية الخاصة به في الكلية &nbsp;ويخلي طرفه منها في نفس طلب الانسحاب وفقاً للنموذج المعتمد لذلك<span dir=\"LTR\"> .</span></li>\r\n	<li>يعتبر انسحاب الطالب نهائياً بعد الموافقة النهائية من قبل العمادة وجميع الجهات المختصة في الكلية<span dir=\"LTR\">&nbsp; .</span></li>\r\n	<li>تطبق على الطالب لائحة خصميات الرسوم الدراسية الخاصة بالانسحاب .</li>\r\n	<li>أن لا يكون محال الى اللجنة الانضباطية للتحقيق في مخالفة ارتكبها .</li>\r\n</ol>\r\n\r\n<p><span dir=\"RTL\">أن يسلم البطاقة الجامعية </span></p>', 2, NULL, '2019-07-15 18:26:33'),
(33, 'التراخيص والاعتمادات', 'licence', '<p><strong>التراخيص الحاصلة عليها كلية التميز(كلية مجتمع خاصة) من المجلس الأعلى لكليات المجتمع( وزير التعليم الفني والتدريب المهني ) </strong></p>\r\n\r\n<p><strong>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>الترخيص الاولي رقم (31) لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp; ترخيص الاعتماد العام رقم (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ) لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;</strong><strong>&nbsp;&nbsp;&nbsp; ترخيص الاعتماد الخاص رقم (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )&nbsp; لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;</strong><strong>&nbsp;&nbsp;&nbsp; ترخيص النهائي رقم (&nbsp;&nbsp;&nbsp;&nbsp; )&nbsp; لسنة 2016</strong></p>\r\n\r\n<p><strong>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تراخيص السجل التجاري .</strong></p>', 2, NULL, '2019-07-15 18:13:42'),
(34, 'الدرجات العلمية', 'educationGrades', '<ol>\r\n	<li><strong>تمنح الكلية درجة الدبلوم التقني نظام ثلاث سنوات لجميع الأقسام في الكلية . </strong></li>\r\n	<li><strong>تمنح الكلية شهادة للدورات التدريبية والبرامج المختلفة القصيرة والمتوسطة والطويلة .</strong></li>\r\n</ol>', 2, NULL, '2019-07-16 11:14:15'),
(35, 'نظام الدراسة في الكلية      ', 'studySystem', '<ol>\r\n	<li><strong>لغة الدراسة الأساسية هي اللغة العربية ولغة الدراسة المساندة هي اللغة الإنجليزية.</strong></li>\r\n	<li><strong>الدراسة في الكلية نظامية وتشترط المواظبة وحضور جميع الدروس النظرية والعملية.</strong></li>\r\n	<li><strong>يحدد التقويم الدراسي السنوي المعتمد للفعاليات الدراسية الاساسية المختلفة على مستوى العام الدراسي الجامعي ككل واهم مراحلها ومتعلقاتها بصورة دقيقة كما يحدد الاجازات الرسمية والعطل الصيفية والدراسية ويحدد ايضاً مواعيد الامتحانات النصفية والنهائية واعلان النتائج وكل ما يتعلق بذلك .</strong></li>\r\n	<li><strong>تتبع الكلية نظام الفصل الدراسي الذي يتكون من ستة عشر أسبوعا دراسياً بما في ذلك فترة الامتحانات .</strong></li>\r\n	<li><strong>مدة الدراسة في الكلية ثلاث سنوات ، السنة التمهيدية والسنتان الثانية والثالثة تخصصية.</strong></li>\r\n	<li><strong>يمنح الطالب المتخرج شهادة دبلوم تقني .</strong></li>\r\n	<li><strong>لا يجوز للطالب أن يتجاوز المدة الزمنية المحددة بخمس سنوات لنيل شهادة الدبلوم التقني .</strong></li>\r\n</ol>', 2, NULL, '2019-07-15 18:18:26'),
(36, 'ضوابط الحضور والغياب', 'absenceRule', '<p>فيما يتعلق بغياب الطالب في دراسة المواد النظرية والعملية في أي فصل دراسي يتم التعامل معه وفق القواعد الآتية : -</p>\r\n\r\n<ol>\r\n	<li><strong>حضور الطالب محاضرات كل مقرر دراسي شرط أساسي&nbsp; ويجب أن لا تقل نسبة الحضور عن</strong><strong><span dir=\"LTR\">(75%)</span></strong><strong> &nbsp;من الساعات المحددة لكل مقرر .</strong></li>\r\n	<li><strong>إذا بلغ غياب الطالب نسبة (</strong><strong><span dir=\"LTR\">25</span></strong><strong>%) من إجمالي مدة الدراسة للمادة في الفصل الدراسي الواحد ( بدون أي عذر أو بعذر غير مقبول ) &nbsp;يؤدي إلى حرمانه من دخول امتحان المقرر النهائي في امتحانات الدور الأول لنفس الفصل ويكتب&nbsp;في خانة نتيجته في كشوفات النتائج العامة &quot; غـ حـ : غياب حرمان &quot; و يسمح له بدخول امتحان المقرر في الدور الثاني لنفس الفصل دون حفظ تقديره ويعامل معاملة الطالب الراسب&nbsp; في الدور الأول فيها.</strong></li>\r\n	<li><strong>يوجه للطالب الذي بلغ نسبة غيابة بأي مقرر </strong><strong><span dir=\"LTR\">20%)</span></strong><strong> ) من مجموع المحاضرات إنذار ويعتبر نافذاً حتى وأن لم يستلمه الطالب</strong><strong><span dir=\"LTR\">.</span></strong></li>\r\n</ol>', 2, NULL, '2019-07-15 18:19:02'),
(37, 'الرسوم الدراسية', 'fees', 'l', 2, NULL, NULL),
(38, 'نظام الاعذار الطبية ', 'alibiRule', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>الأعذار الطبية تعتمد من اللجنة الطبية المعتمدة&nbsp; في الكلية &nbsp;بعد إحالتها من عميد الكلية .</strong></li>\r\n	<li><strong>على الطالب تقديم العذر الطبي خلال أسبوع واحد من بدء غيابة عن الكلية وفي حالة تأخر تقديم العذر بما لا يتجاوز شهر ينظر فيه عميد الكلية وفي حالة الموافقة يتم أحالته الى اللجنة الطبية للبت فيه .</strong></li>\r\n</ul>', 2, NULL, '2019-07-15 18:23:19');

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `messageFrom_id` int(10) UNSIGNED NOT NULL,
  `messageTo_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viewed` tinyint(1) NOT NULL,
  `delete` int(11) NOT NULL DEFAULT '0',
  `recived` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `messages`
--

INSERT INTO `messages` (`id`, `messageFrom_id`, `messageTo_id`, `message`, `image`, `viewed`, `delete`, `recived`, `created_at`, `updated_at`) VALUES
(12, 4, 1, 'c', NULL, 0, 0, 0, '2019-07-16 20:54:54', '2019-07-16 20:54:54'),
(13, 4, 1, 'scd x', NULL, 0, 0, 0, '2019-07-16 20:54:59', '2019-07-16 20:54:59'),
(14, 4, 1, 'dddddddddddddddd', NULL, 0, 0, 0, '2019-07-16 20:55:14', '2019-07-16 20:55:14'),
(15, 4, 2, 'd', NULL, 0, 0, 0, '2019-07-16 20:55:28', '2019-07-16 20:55:28'),
(16, 13, 4, 'hvjdck jdsvlh', NULL, 1, 0, 0, '2019-07-24 05:15:01', '2019-07-24 05:15:49'),
(17, 13, 4, 'osama', NULL, 1, 0, 1, '2019-07-24 05:16:44', '2019-07-24 05:19:48'),
(18, 4, 13, 'knlkss;', NULL, 1, 0, 1, '2019-07-24 05:17:06', '2019-07-24 05:19:37'),
(19, 4, 13, 'lmzxlm;l', NULL, 1, 0, 1, '2019-07-24 05:17:44', '2019-07-24 05:19:37'),
(20, 4, 13, 'x', 'social/masssanger/QTFFfIH2ekueg0JxdGOzP2wjTBojlYiGOoMxi1hV.jpeg', 1, 0, 1, '2019-07-24 05:18:48', '2019-07-24 05:19:37'),
(21, 13, 4, 'lmz;xlcm ;', NULL, 1, 0, 1, '2019-07-24 05:20:00', '2019-07-24 05:27:56'),
(22, 13, 4, 'l;dmc;ldm;l m;', NULL, 1, 0, 1, '2019-07-24 05:20:12', '2019-07-24 05:27:56'),
(23, 13, 4, 'l;m;lm;', NULL, 1, 0, 1, '2019-07-24 05:20:35', '2019-07-24 05:27:56'),
(24, 13, 4, 'd', NULL, 1, 0, 1, '2019-07-24 05:20:48', '2019-07-24 05:27:56'),
(25, 13, 4, 'nlkdns/n', NULL, 1, 0, 1, '2019-07-24 05:21:34', '2019-07-24 05:27:56'),
(26, 4, 2, 'xx', NULL, 0, 0, 0, '2019-07-24 05:27:05', '2019-07-24 05:27:05'),
(27, 4, 2, 'zx', NULL, 0, 0, 0, '2019-07-24 05:27:20', '2019-07-24 05:27:20'),
(28, 13, 4, 'x', NULL, 1, 0, 1, '2019-07-24 05:27:33', '2019-07-24 05:27:56'),
(29, 13, 4, 'knl k,', NULL, 1, 0, 1, '2019-07-24 05:28:10', '2019-07-24 05:30:34'),
(30, 13, 4, 'x', NULL, 1, 0, 1, '2019-07-24 05:28:16', '2019-07-24 05:30:34'),
(31, 13, 4, 'z', NULL, 1, 0, 1, '2019-07-24 05:28:19', '2019-07-24 05:30:34'),
(32, 13, 4, 'isfu', NULL, 1, 0, 1, '2019-07-24 05:30:15', '2019-07-24 05:30:34'),
(33, 13, 4, 'cvytfvk', NULL, 1, 0, 1, '2019-07-24 05:30:20', '2019-07-24 05:30:34'),
(34, 13, 4, 'jiug', NULL, 1, 0, 1, '2019-07-24 05:30:40', '2019-07-24 06:50:58'),
(35, 13, 4, 'rtyukil', NULL, 1, 0, 1, '2019-07-24 05:30:56', '2019-07-24 06:50:58'),
(36, 13, 4, 'hjvkhvyffifffi', NULL, 1, 0, 1, '2019-07-24 05:31:09', '2019-07-24 06:50:58'),
(37, 13, 4, 'uiwegfsdiu', NULL, 1, 0, 1, '2019-07-24 05:31:13', '2019-07-24 06:50:58'),
(38, 4, 13, 'kjbk', NULL, 1, 0, 0, '2019-07-26 14:11:51', '2019-07-26 14:20:54'),
(39, 13, 3, 'bnn', NULL, 1, 0, 0, '2019-07-26 14:21:10', '2019-07-26 14:34:22'),
(40, 4, 13, 'uhnuixjkniu', NULL, 1, 0, 0, '2019-07-26 14:24:30', '2019-07-26 14:24:39'),
(41, 22, 23, 'uiwehsoidhxo', NULL, 1, 0, 1, '2019-07-27 18:22:18', '2019-07-27 18:22:38'),
(43, 22, 23, 'uuewskhdefjds.', NULL, 1, 0, 1, '2019-07-27 18:22:49', '2019-07-27 18:23:00'),
(46, 22, 3, 'ugli,', NULL, 0, 0, 0, '2019-07-27 18:25:15', '2019-07-27 18:25:15'),
(47, 4, 13, 'kkkkk', NULL, 1, 0, 1, '2019-07-30 12:59:41', '2019-07-30 12:59:41'),
(49, 4, 13, 'x', 'social/masssanger/gHh1qesHD5FhnV4og0qMcILJ9I0i5Hxm5H9LBh1p.jpeg', 1, 0, 1, '2019-07-30 13:03:14', '2019-07-30 13:03:55'),
(50, 6, 13, 'hg,,,,,,,,,', NULL, 1, 0, 1, '2019-08-01 17:51:55', '2019-08-01 17:52:21'),
(51, 6, 13, 'مساء الخير', NULL, 1, 0, 1, '2019-08-01 17:52:03', '2019-08-01 17:52:21'),
(52, 13, 6, 'ء', NULL, 0, 0, 1, '2019-08-01 17:52:24', '2019-08-01 17:52:24'),
(53, 13, 6, 'اهلا', NULL, 0, 0, 1, '2019-08-01 17:52:38', '2019-08-01 17:52:38'),
(54, 13, 6, 'مساء الخير', NULL, 0, 0, 1, '2019-08-01 17:52:48', '2019-08-01 17:52:48');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_29_184326_create_admins_table', 1),
(4, '2019_02_23_153101_create_main_info', 1),
(5, '2019_02_23_153434_create_departmente', 1),
(6, '2019_02_23_153532_create_news', 1),
(7, '2019_02_23_153627_create_image_news', 1),
(8, '2019_02_23_153708_create_events', 1),
(9, '2019_02_23_153814_create_contact_us', 1),
(10, '2019_02_23_154222_create_sliders', 1),
(11, '2019_02_23_155241_create_advertising', 1),
(12, '2019_03_02_143253_create_students', 1),
(13, '2019_03_02_143437_create_teachers', 1),
(14, '2019_03_02_143624_create_study_plans', 1),
(15, '2019_04_08_200641_create_user_accounts_table', 1),
(16, '2019_04_08_204508_create_user_flowings_table', 1),
(17, '2019_04_08_205737_create_user_blockeds_table', 1),
(18, '2019_04_08_210146_create_messages_table', 1),
(19, '2019_04_08_210908_create_notificationAdmins_table', 1),
(20, '2019_04_08_212226_create_notification_users_table', 1),
(21, '2019_04_08_214335_create_study_courses_table', 1),
(22, '2019_04_08_214726_create_groups_table', 1),
(23, '2019_04_08_215310_create_group_members_table', 1),
(24, '2019_04_08_215904_create_posts_table', 1),
(25, '2019_04_08_220740_create_image_posts_table', 1),
(26, '2019_04_08_221142_create_like_post_groups_table', 1),
(27, '2019_04_08_221142_create_like_posts_table', 1),
(28, '2019_04_08_222402_create_coumment_posts_table', 1),
(29, '2019_04_08_223122_create_reply_coumment_posts_table', 1),
(30, '2019_04_08_224814_create_like_coumment_posts_table', 1),
(31, '2019_04_09_154812_create_reference_books_table', 1),
(32, '2019_04_09_165213_create_assignments_table', 1),
(33, '2019_04_09_170637_create_solution_assignments_table', 1),
(34, '2019_05_13_210710_create_upgrades_table', 1),
(35, '2019_06_23_144613_create_results_table', 1),
(36, '2019_07_01_214458_create_personal_images_table', 1),
(37, '2019_07_03_202329_create_years_table', 1),
(38, '2019_07_04_152855_create_group_files_table', 1),
(39, '2019_07_09_220132_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `news`
--

INSERT INTO `news` (`id`, `title`, `type`, `detail`, `state`, `created_at`, `updated_at`) VALUES
(1, 'فبتاي نستنج القانون التالي', 4, 'في المتوسط سنفرض انه ليس هناك أي احتمالية لعدم عمل تبديل (swap) في أي لفة \r\nبعد ذألك نريد معرفة كم عدد المقارنات التي تمت في كل احتمالية \r\nفاذا توقفنا بعد اول لفة سنكون قد انجزنا n-1    مقارنة وبعد اللفة الثانية سنكون قد انجزنا n-2 مقارنة\r\n            وبعد اللفة الثالثة سنكون قد انجزنا n-3 مقارنة\r\nفبتالي يمكننا سنفرض ان لدينا الدالة C(i)   لحساب كم عدد المقارنات تتم في أي لفة pass i\r\n\r\nفبتاي نستنج القانون التالي', 0, '2019-07-17 12:59:50', '2019-07-17 12:59:50'),
(2, 'فبتاي نستنج القانون التالي', 3, '•	جميع الخوارزميات التي درسناها قد حلت مشاكلها في فترة زمنية معقولة.\r\n•	كل هذه المشاكل لها ترتيب يمكن التعبير عنه بواسطة بعض المعادلات متعددة الحدود.\r\no	خوارزميات الوقت الخطي مثل البحث المتسلسل،\r\no	الخوارزميات التي لها وقت O (N2)، مثل بعض خوارزميات الترتيب.\r\no	ورأينا خوارزميات لها وقت O (N3)، مثل ضرب المصفوفة،\r\n•	في هذا الفصل، سوف نلقي نظرة على مجموعة من المشكلات التي لها أوقات تشغيل \r\n•	هي (N!) O     و ( xN ) O   الأسية ( x ≥ 2).', 0, '2019-07-17 13:00:20', '2019-07-17 13:00:20'),
(3, 'ما هو NP؟', 2, 'ما هو NP؟\r\n•	جميع الخوارزميات حتى الآن يمكننا الحصول على حل دقيق لتلك المشاكل في غضون فترة زمنية معقولة. يقال إن هذه المجموعة من المشكلات تقع في الفئة (polynomial) P، حيث P تعني التعقيد الزمني متعدد الحدود.\r\n•	هناك فئة أخرى من المشاكل التي لا يمكن حلها، والتي لا يوجد حاليًا خوارزمية من شأنها حل المشكلات في أي فترة زمنية معقولة.\r\n•	هذه المشكلات موجودة في الفئة NP (nondeterministic polynomial)، والتي تعني التعقيد الزمني متعدد الحدود غير المحدد.\r\n•	إن الخوارزميات الحتمية الوحيدة (deterministic algorithms) المعروفة لحل هذه المشكلات لها تعقيد ذي ترتيب أسي أو المضروب exponential or factorial order..\r\n•	يأتي اسم كثير الحدود غير محددً (nondeterministic polynomial) المشاكل فئة NP من عملية من خطوتين لحلها.\r\no	 في الخطوة الأولى، هناك عملية غير محددة (nondeterministic) تؤدي إلى إيجاد حل ممكن      للمشكلة.   (تخمين عشوائي للحل.)\r\no	 الخطوة الثانية ستبحث في مخرجات الخطوة الأولى وتحدد ما إذا كان الحل الحقيقي أم لا.', 0, '2019-07-17 13:00:51', '2019-07-17 13:00:51'),
(4, 'طة أن ننظر إلى تكلفة كل زوج متتالي من المدن في القائمة، التي سيكون لها تعقيد O (N 2) في أسوأ الحالات.', 1, 'أن هذه الخوارزمية موجودة في الفئة NP:\r\n•	نحتاج إلى إظهار كيف ستعمل العملية المؤلفة من خطوتين على حلها.\r\no	وتتمثل الخطوة الأولى ستكون لتوليد nondeterministic ally قائمة المدن. (اختيار عشوائي) لأن هذه العملية غير محددة، في كل مرة يتم تشغيلها، سيتم إنشاء ترتيب مختلف من المدن.\r\n ستعمل هذه العملية بالترتيب (N) O    حيث N هو عدد المدن.\r\n\r\no	الخطوة الثانية هي تحديد تكلفة السفر إلى المدن بالترتيب المحدد.\r\nلتحديد ذلك، سيتعين علينا ببساطة أن ننظر إلى تكلفة كل زوج متتالي من المدن في القائمة،\r\nالتي سيكون لها تعقيد O (N 2) في أسوأ الحالات.\r\n•	لأن كل من هذه الخطوات ذات تعقيد متعدد الحدود (polynomial comp', 0, '2019-07-17 13:01:21', '2019-07-17 13:01:21'),
(5, 'مشاكل NP النموذجية - مشكلة CNF-Satisfiability', 1, 'مشاكل NP النموذجية - مشكلة CNF-Satisfiability \r\n•	لدينا عدد من الصناديق بسعة واحدة، ولدينا مجموعة من\r\n•	الكائنات كلها بأحجام مختلفة s1, s2, . . ., sN   بين 0 و1.\r\n•	مشكلة التحسين تسال عن أقل عدد من الصناديق التي ستكون هناك حاجة إليها لتخزين كل هذه الكائنات \r\n•	مشكلة القرار تسأل ما إذا كان من الممكن تخزين جميع الكائنات في صناديق B أو أقل.\r\n•	يمكن أن تكون هذه المشكلة مرتبطة بتخزين المعلومات على الأقراص أو في ذاكرة الكمبيوتر المجزأة للبنوك، لشركات الشحن الذين يرغبون في\r\nمشاكل NP النموذجية - مشكلة جدولة الوظيفة\r\n•	لدينا مجموعة من المهام   لكل مهمة وقت محدد لكي تنتهي، t1, t2, . . .,tN,\r\n•	الموعد النهائي الذي يحتاجون إلى إكماله d1, d2, . . ., dN\r\n•	والعقوبة المتكبدة في حالة عدم اكتمال الوظيفة بحلول الموعد النهائي، p1, p2, . . ., pN \r\n•	تحاول مشكلة التحسين ترتيب الوظائف بحيث تتحمل أصغر عقوبة.\r\n•	مشكلة القرار يسأل عما إذا كان هناك جدول زمني يحتوي على عقوبة أقل من P.\r\n•	يتم تحديد الوظائف على أنها 4 صفوف (n,t,d,p) حيث:\r\no	n هو رقم الوظيفة ،\r\no	t هو مقدار الوقت الذي سيستغرقه ،\r\no	d هو الموعد النهائي ، و\r\no	 P هي العقوبة.', 0, '2019-07-17 13:21:57', '2019-07-17 13:21:57'),
(6, 'تحليل الخوارزمية:', 1, 'تحليل الخوارزمية:\r\n1-	أفضل حالة للخوارزمية beast case   هي ان يكون العنصر المراد البحث عنة هو العنصر المنتصف للمصفوفة لذا ستعمل مقارنة واحدة فقط.\r\nإذا يكون التعقيد لهه الخوارزمية هو O (1) \r\n2-	اسواء حالة للخوارزمية worse case   \r\nمن الملاحظ ان كل مستوى يكون عدد العناصر فيه من مضاعفات العدد 2 وعدد العناصر تزداد في كل مستوى بمضاعفات العدد 2 ( 20   و   21    و   22    و   23       و 2k)   حيث ال  k  هو رقم المستوى k= \r\nومن الملاحظ اننا نقوم بعمل مقارنة واحدة فقط في كل مستوى \r\nإذا سيكون عدد المقارنات في اسوى حاله هي بعدد المستويات  \r\nإذا تعقيد الخوارزمية هو   \r\n3-	الحالة المتوسطة للخوارزمية average case  \r\n	في المتوسط يكون احتمال أي عنصر من المصفوفة هو المطلوب يكون 1n/ \r\n                                فاذا كان العنصر في المستوى الأول سيعمل مقارنة واحدة\r\n                                 فاذا كان العنصر في المستوى الثاني سيعمل 2 مقارنة \r\n                                  فاذا كان العنصر في المستوى الثالث سيعمل 3 مقارنة', 0, '2019-07-17 13:23:03', '2019-07-17 13:23:03'),
(7, 'tittle', 2, 'mmmmmmmmmmmmmmmmmmmmmmmmmm', 0, '2019-07-27 12:11:19', '2019-07-27 12:12:01');

-- --------------------------------------------------------

--
-- بنية الجدول `notificationadmins`
--

CREATE TABLE `notificationadmins` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0525a4b7-29e1-438b-87da-bb5b66961356', 'App\\Notifications\\AssignmentNotification', 26, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"student\",\"assignment_id\":22,\"user_id\":27,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628 \"}', NULL, '2019-07-28 06:19:35', '2019-07-28 06:19:35'),
('090b8783-508b-4ec4-ab4c-8dc693e325b1', 'App\\Notifications\\postNotification', 11, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('0b69d2d0-4a20-477b-b8b0-f1b3ea8e62c9', 'App\\Notifications\\postNotification', 7, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('10ff8724-f844-45d9-aac4-acb74c56e76b', 'App\\Notifications\\postNotification', 4, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('19065784-5146-4aff-9c38-2bb63ad23596', 'App\\Notifications\\postNotification', 10, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('2bf299d5-0d24-4a49-8a01-f6c3e3874ead', 'App\\Notifications\\postNotification', 8, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('2f9a2f3c-d1e1-4771-9ce5-2c5fad41d390', 'App\\Notifications\\postNotification', 3, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('32dedec1-f37c-4418-83ba-851df1318c41', 'App\\Notifications\\likenotification', 29, 'App\\UserAccount', '{\"post_id\":\"98\",\"group_id\":\"\",\"user_id\":\"28\",\"title\":\" \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0627\\u0639\\u062c\\u0627\\u0628 \\u0628\\u0645\\u0646\\u0634\\u0648\\u0631\\u0643   \",\"type\":\"-\",\"like\":\"yes\"}', NULL, '2019-07-28 07:26:42', '2019-07-28 07:26:42'),
('34696fe5-bfbb-4136-a824-239f871c2494', 'App\\Notifications\\postNotification', 19, 'App\\UserAccount', '{\"post_id\":100,\"group_id\":\"0\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-30 12:04:49', '2019-07-30 12:04:49'),
('3870e2b5-908e-4845-82af-b0783e8ba465', 'App\\Notifications\\postNotification', 8, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('38f9457a-7649-4fa4-b51a-b07158a740b2', 'App\\Notifications\\postNotification', 28, 'App\\UserAccount', '{\"post_id\":99,\"group_id\":\"26\",\"user_id\":29,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-07-28 07:31:52', '2019-07-28 07:31:52'),
('3e55af96-ee75-467b-9417-9dfd58e58add', 'App\\Notifications\\AssignmentNotification', 13, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"student\",\"assignment_id\":5,\"user_id\":4,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628 \"}', NULL, '2019-07-30 14:25:20', '2019-07-30 14:25:20'),
('41433eb3-7f24-4705-9ccf-8dda06fb5657', 'App\\Notifications\\postNotification', 17, 'App\\UserAccount', '{\"post_id\":100,\"group_id\":\"0\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-30 12:04:49', '2019-07-30 12:04:49'),
('4db3be51-8efe-4050-846b-346f8aa2657a', 'App\\Notifications\\postNotification', 28, 'App\\UserAccount', '{\"post_id\":100,\"group_id\":\"0\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-30 12:04:50', '2019-07-30 12:04:50'),
('50010b43-3810-4fe4-bdb5-deb62116b21c', 'App\\Notifications\\AssignmentNotification', 13, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"student\",\"assignment_id\":5,\"user_id\":4,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628 \"}', NULL, '2019-07-30 14:24:37', '2019-07-30 14:24:37'),
('50e5b7b2-468f-42af-85e8-25b095263132', 'App\\Notifications\\postNotification', 4, 'App\\UserAccount', '{\"post_id\":100,\"group_id\":\"0\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-30 12:04:49', '2019-07-30 12:04:49'),
('55ebfa03-c672-4c44-9b20-7777c70b311e', 'App\\Notifications\\AssignmentNotification', 29, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"teacher\",\"assignment_id\":\"24\",\"user_id\":28,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0627\\u0630  \"}', NULL, '2019-07-28 07:30:42', '2019-07-28 07:30:42'),
('5a6e3487-d380-4b38-aada-eedc53d0ae02', 'App\\Notifications\\AssignmentNotification', 13, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"student\",\"assignment_id\":5,\"user_id\":6,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628 \"}', NULL, '2019-07-30 14:31:19', '2019-07-30 14:31:19'),
('5caa6516-8669-4ddf-8e09-047c8a0c5798', 'App\\Notifications\\AssignmentNotification', 13, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"student\",\"assignment_id\":5,\"user_id\":5,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628 \"}', NULL, '2019-07-30 14:30:30', '2019-07-30 14:30:30'),
('66b2fb12-b7bd-430a-907b-0d81f14ff147', 'App\\Notifications\\postNotification', 7, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('6f12cd11-9b02-4859-956a-3ad1b09eee40', 'App\\Notifications\\AssignmentNotification', 13, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"student\",\"assignment_id\":5,\"user_id\":4,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628 \"}', NULL, '2019-07-30 14:26:21', '2019-07-30 14:26:21'),
('71a0924d-17e9-4279-832d-696b82dc6ff9', 'App\\Notifications\\postNotification', 3, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('71f2991d-5cd4-4966-9cf0-81f04d9afeec', 'App\\Notifications\\postNotification', 4, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('741ff413-6c28-4f1b-94f6-f0a684e3fcea', 'App\\Notifications\\postNotification', 6, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('751c3c8f-cc88-4b79-9744-ce9d8a9bfe4f', 'App\\Notifications\\postNotification', 9, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('75605f1a-3e44-4b9c-8ef2-ede0b6201b8a', 'App\\Notifications\\postNotification', 5, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('7b40cae9-01cb-4797-8ba1-d58934179727', 'App\\Notifications\\postNotification', 9, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('7b94f673-8477-4c15-8455-93a997c4e315', 'App\\Notifications\\postNotification', 5, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('893ff8b4-27c6-4b0d-aaa1-5fea619ecbab', 'App\\Notifications\\postNotification', 6, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('aa3b5e75-5173-4357-85ff-17b786baf70b', 'App\\Notifications\\likenotification', 13, 'App\\UserAccount', '{\"post_id\":\"100\",\"group_id\":\"\",\"user_id\":\"29\",\"title\":\" \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0627\\u0639\\u062c\\u0627\\u0628 \\u0628\\u0645\\u0646\\u0634\\u0648\\u0631\\u0643   \",\"type\":\"-\",\"like\":\"yes\"}', '2019-07-30 12:14:49', '2019-07-30 12:14:22', '2019-07-30 12:14:49'),
('aaa642f5-2d41-4d4e-b8b5-deaef7a422de', 'App\\Notifications\\postNotification', 10, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('ae670cd3-67f1-492b-bb52-fbc56227d905', 'App\\Notifications\\postNotification', 14, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('c5cce970-0ff5-47c9-b8b9-9d4cd935c106', 'App\\Notifications\\postNotification', 13, 'App\\UserAccount', '{\"post_id\":101,\"group_id\":\"8\",\"user_id\":4,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:28:38', '2019-08-01 17:28:38'),
('c9b46113-0e87-4a57-be66-d408120a6005', 'App\\Notifications\\postNotification', 28, 'App\\UserAccount', '{\"post_id\":98,\"group_id\":\"0\",\"user_id\":29,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-28 07:26:33', '2019-07-28 07:26:33'),
('cec52be1-ec89-4bad-9c1c-1c1dae4f0f62', 'App\\Notifications\\postNotification', 16, 'App\\UserAccount', '{\"post_id\":100,\"group_id\":\"0\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-30 12:04:49', '2019-07-30 12:04:49'),
('d23b4a73-ebdf-4dc8-adea-e70d83d12c6e', 'App\\Notifications\\postNotification', 11, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('d76249a0-0e27-4d6b-8187-aedf87fd73bf', 'App\\Notifications\\postNotification', 3, 'App\\UserAccount', '{\"post_id\":100,\"group_id\":\"0\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-30 12:04:49', '2019-07-30 12:04:49'),
('dac6a4a6-5013-429d-94f4-435655a50668', 'App\\Notifications\\postNotification', 14, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('ddc0dbf0-cc16-43e2-9f65-52367fc5523a', 'App\\Notifications\\postNotification', 13, 'App\\UserAccount', '{\"post_id\":102,\"group_id\":\"8\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-08-01 17:31:14', '2019-08-01 17:31:14'),
('e8e93d66-540f-462d-bbf4-b0b446649f3b', 'App\\Notifications\\postNotification', 6, 'App\\UserAccount', '{\"post_id\":100,\"group_id\":\"0\",\"user_id\":13,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0647\",\"type\":\"-\"}', NULL, '2019-07-30 12:04:49', '2019-07-30 12:04:49'),
('e967c424-07a2-406a-a8c9-630245394e25', 'App\\Notifications\\postNotification', 29, 'App\\UserAccount', '{\"post_id\":99,\"group_id\":\"26\",\"user_id\":29,\"title\":\"\\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u0646\\u0634\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0645\\u062c\\u0645\\u0648\\u0639\\u0629\",\"type\":\"-\"}', NULL, '2019-07-28 07:31:52', '2019-07-28 07:31:52'),
('eb3ce164-22ad-4a7a-b2ac-dd7ec2b1870f', 'App\\Notifications\\AssignmentNotification', 27, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"teacher\",\"assignment_id\":\"22\",\"user_id\":26,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0627\\u0633\\u062a\\u0627\\u0630  \"}', NULL, '2019-07-28 06:03:59', '2019-07-28 06:03:59'),
('fc0e0593-4e1c-4e2b-82c5-461efc300634', 'App\\Notifications\\AssignmentNotification', 28, 'App\\UserAccount', '{\"post_id\":0,\"type\":\"student\",\"assignment_id\":24,\"user_id\":29,\"title\":\"  \\u062a\\u0645 \\u0631\\u0641\\u0639 \\u0645\\u0644\\u0641 \\u0645\\u0646 \\u0627\\u0644\\u0637\\u0627\\u0644\\u0628 \"}', NULL, '2019-07-28 07:31:10', '2019-07-28 07:31:10');

-- --------------------------------------------------------

--
-- بنية الجدول `notification_users`
--

CREATE TABLE `notification_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_images`
--

CREATE TABLE `personal_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `personal_images`
--

INSERT INTO `personal_images` (`id`, `image`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'social/personal_image/NGbGfFhO6wcjqtdZDWeArsGs77gRNyfFTWR7uljb.jpeg', 'personal_image', 3, '2019-07-16 18:48:54', '2019-07-16 18:48:54'),
(2, 'social/cover_image/fcxG5HWpkNieXkq6uYIEFImah1cV4hSbpeU0m9PO.jpeg', 'cover_image', 3, '2019-07-16 18:51:42', '2019-07-16 18:51:42'),
(3, 'social/personal_image/9XSBm2pYMtEo7uRqNHqS4dBIOxNjg4Ag3Kn1TfRJ.jpeg', 'personal_image', 3, '2019-07-16 19:16:53', '2019-07-16 19:16:53'),
(4, 'social/cover_image/nzIHr4lcLxK4IrrmHKPzn86qH7zLfgsE2scWbt21.jpeg', 'cover_image', 3, '2019-07-16 19:17:21', '2019-07-16 19:17:21'),
(5, 'social/cover_image/4MOVKFgfe3Yp8L96HuFV8HfeYe31hjDdUuLX4YpZ.jpeg', 'cover_image', 3, '2019-07-17 12:39:15', '2019-07-17 12:39:15'),
(6, 'social/personal_image/PqFFzMKS4t0NgK91uhA9d8RhTC7L0Xsz9aumTpRY.jpeg', 'personal_image', 3, '2019-07-17 12:39:27', '2019-07-17 12:39:27'),
(7, 'social/personal_image/whWVz3LlrCbfvL9y4ZnCmzn2QaU0NETvYFD7a37p.jpeg', 'personal_image', 3, '2019-07-17 20:53:01', '2019-07-17 20:53:01'),
(8, 'social/cover_image/L3XzA47RgdpWBeniViYDe8YyynUDtKHs39UbItIe.jpeg', 'cover_image', 6, '2019-07-17 20:53:21', '2019-07-17 20:53:21'),
(9, 'social/cover_image/0KNwgTfkb5qmE4KR3f0vJQx01pHub1MNKBLylpnn.jpeg', 'cover_image', 3, '2019-07-17 20:53:51', '2019-07-17 20:53:51'),
(10, 'social/personal_image/tK0XC5k6QdBtg2fRZsbJDiBgZ06Ja2jG8wQaYKxj.png', 'personal_image', 3, '2019-07-17 22:26:05', '2019-07-17 22:26:05'),
(11, 'social/cover_image/Nw6hJmAWJu0FidM7yiQAIUsLu4VOlRha2WzU6hij.jpeg', 'cover_image', 4, '2019-07-22 16:05:55', '2019-07-22 16:05:55'),
(12, 'social/personal_image/pPBB9Dl0GTz9bO7CabCEZJEYYwbpSmXI7Foh7hFx.jpeg', 'personal_image', 4, '2019-07-22 16:06:16', '2019-07-22 16:06:16'),
(13, 'social/cover_image/p810zA3U1T0YuLF7WsnpClAq6NknkSFURCFHZb4w.jpeg', 'cover_image', 13, '2019-07-22 17:01:43', '2019-07-22 17:01:43'),
(14, 'social/personal_image/B3lpMJZDkp6DoAOejdRhP68ip78swK3GH6UcTFtF.jpeg', 'personal_image', 13, '2019-07-22 17:04:19', '2019-07-22 17:04:19'),
(15, 'social/cover_image/ZUNGA6mQTkSUMa0L1qII9alKQBX84HPq0jYSHxJE.jpeg', 'cover_image', 13, '2019-07-22 17:19:17', '2019-07-22 17:19:17'),
(16, 'social/cover_image/CIc8XnJs4QtCeFiIH3XXxusW3DQLwzLyt9p8LQZ5.jpeg', 'cover_image', 13, '2019-07-24 05:22:20', '2019-07-24 05:22:20'),
(17, 'social/cover_image/BQQofWQC6fnzSGuNF66QLlgDnLBLo9uvvrxhpgzy.png', 'cover_image', 13, '2019-07-24 05:22:29', '2019-07-24 05:22:29'),
(18, 'social/personal_image/PVSQ2W5iLk8kXM98PTvULy5dYiAVBuOjblnusK9B.jpeg', 'personal_image', 13, '2019-07-24 05:22:42', '2019-07-24 05:22:42'),
(19, 'social/cover_image/Y4AonHFI88leIEFuPqnTdlOAScfplXq76Mig68Zf.jpeg', 'cover_image', 13, '2019-07-24 05:22:56', '2019-07-24 05:22:56'),
(20, 'social/personal_image/UkJnXGNLAddEo9aQsXd6GOEZMiKwVg5vhEfa6WaV.jpeg', 'personal_image', 13, '2019-07-24 05:23:04', '2019-07-24 05:23:04'),
(21, 'social/cover_image/077kpW4cJ354CPMrcgo1S8vo3yiKSxOE7PbLz9AF.jpeg', 'cover_image', 4, '2019-07-24 05:31:43', '2019-07-24 05:31:43'),
(22, 'social/personal_image/necexlIaD5R3kYr4bv4Pg3F0B0ZVtmKpbtZfIlL4.png', 'personal_image', 13, '2019-07-24 06:49:06', '2019-07-24 06:49:06'),
(24, 'social/personal_image/14Ih67ldgscjOmNYHMAnE1wuuMZafQU1bfYazX4R.jpeg', 'personal_image', 3, '2019-07-26 14:39:12', '2019-07-26 14:39:12'),
(25, 'social/cover_image/9v7QjltlwqymIDGAARwPJvgBsyAhytURrmzFBYDC.jpeg', 'cover_image', 3, '2019-07-26 14:39:29', '2019-07-26 14:39:29'),
(26, 'social/personal_image/2vFnt5NONFdt6j52ZMD034SDniqpyFm89dhGGHg2.jpeg', 'personal_image', 16, '2019-07-26 15:02:57', '2019-07-26 15:02:57'),
(27, 'social/cover_image/BsIeR04W6mcaddzWPqK24D16ZJxKmF9aVoBsFalm.jpeg', 'cover_image', 16, '2019-07-26 15:03:49', '2019-07-26 15:03:49'),
(28, 'social/cover_image/thNzguuAbxMjp90UUHcNgpKHf4MKbMYRgtZgZwWw.jpeg', 'cover_image', 17, '2019-07-26 15:04:21', '2019-07-26 15:04:21'),
(29, 'social/personal_image/1HdjjeLF3CEl7YgWJVHocIhjpKK1sgqT2WJA6RsS.jpeg', 'personal_image', 17, '2019-07-26 15:04:42', '2019-07-26 15:04:42'),
(30, 'social/cover_image/Yc8P61A8j68EYdeuz9TI8Yc2CBM1QhXbvWpvAbfo.jpeg', 'cover_image', 17, '2019-07-26 15:05:55', '2019-07-26 15:05:55'),
(31, 'social/personal_image/iZOmHBwho2QLLH66Hmj1T4eb4emb1u1itTbDSyUT.jpeg', 'personal_image', 19, '2019-07-26 15:10:05', '2019-07-26 15:10:05'),
(32, 'social/personal_image/PtgSEAhaSsLoiJhHgsBkmdbR04p4KmKIZwfjNIub.png', 'personal_image', 18, '2019-07-26 15:11:09', '2019-07-26 15:11:09'),
(33, 'social/cover_image/mfRHhl9LU6pT4uV6CEaCxgSsTfqcyjQEZWkixukX.jpeg', 'cover_image', 18, '2019-07-26 15:11:37', '2019-07-26 15:11:37'),
(34, 'social/personal_image/5lzxqc10rleNzh3fI3qCbP5k5TMSVWQtczCRDpdu.jpeg', 'personal_image', 18, '2019-07-26 15:13:55', '2019-07-26 15:13:55'),
(35, 'social/personal_image/cujNRXs1FGKWpBJbYbjmu9n4W2ocX6sfdT3yDb8u.jpeg', 'personal_image', 20, '2019-07-26 15:14:33', '2019-07-26 15:14:33'),
(37, 'social/cover_image/370nl2K45UD6MzpTKhH2eKhjjN76A9IQyemwwDd3.png', 'cover_image', 20, '2019-07-26 15:15:08', '2019-07-26 15:15:08'),
(38, 'social/cover_image/Y6ESWHeRrjvR4pYwjguVWTOxrMrqAVG8ujjiEsTZ.jpeg', 'cover_image', 19, '2019-07-26 15:15:48', '2019-07-26 15:15:48'),
(39, 'social/personal_image/RoEmHsrktBwshXkf0m98BTIckiXF6UwX8ke7jAFd.jpeg', 'personal_image', 19, '2019-07-26 15:16:48', '2019-07-26 15:16:48'),
(40, 'social/personal_image/zB5qe0icGQrqJn8Xo6mftJ5d9Sd5VMKq19rpYxgc.jpeg', 'personal_image', 20, '2019-07-26 15:16:53', '2019-07-26 15:16:53'),
(41, 'social/cover_image/zx5lfeBIIxZFqZWERwAqGI0JWBMQYeZYz1p1WqTF.jpeg', 'cover_image', 19, '2019-07-26 15:51:23', '2019-07-26 15:51:23'),
(42, 'social/personal_image/xP6tRVhnQMPq7IezhLJPIqXlusrF2xTHkxltBjUY.jpeg', 'personal_image', 21, '2019-07-26 15:51:35', '2019-07-26 15:51:35'),
(43, 'social/personal_image/zNX9uNeazk1Z8d5z5GjRuhNS8fRKyYLe225aDdat.jpeg', 'personal_image', 21, '2019-07-26 15:51:59', '2019-07-26 15:51:59'),
(44, 'social/personal_image/5GYqGIzzdiwgF4dpC73mhr43eJOtwuqT5niJo031.jpeg', 'personal_image', 21, '2019-07-26 15:59:51', '2019-07-26 15:59:51'),
(45, 'social/personal_image/zdMFspYc6yBxe03lgzPOO1ChgJfMsP0IwBHys5mU.jpeg', 'personal_image', 19, '2019-07-26 16:58:59', '2019-07-26 16:58:59'),
(46, 'social/cover_image/67ypcZd2rmk4Q9SkRo8grhTcr7HpMbdHuEe9q8At.jpeg', 'cover_image', 19, '2019-07-26 16:59:37', '2019-07-26 16:59:37'),
(47, 'social/personal_image/afkRPfastxrh2x4Yyzt5BbivJNz4prrHww9odSuQ.jpeg', 'personal_image', 21, '2019-07-26 17:02:40', '2019-07-26 17:02:40'),
(55, 'social/cover_image/3YxvvQfXYJLSrTnuBLMtD0eOZI9UWaYnx1sPj7yN.png', 'cover_image', 28, '2019-07-28 07:21:56', '2019-07-28 07:21:56'),
(56, 'social/personal_image/R2djeY9nMOLSvtOD49alCKpHGkfqDONUBjiJZRFj.png', 'personal_image', 28, '2019-07-28 07:22:01', '2019-07-28 07:22:01'),
(57, 'social/personal_image/VS0JEtrUrlGrHREYGX9W22xg6EvOnArJ35HfSwwg.jpeg', 'personal_image', 13, '2019-07-30 11:58:15', '2019-07-30 11:58:15'),
(58, 'social/personal_image/KwRiPOHWULZID8CaN8DLTT2aF1BSyl5YJ5TmsjKx.jpeg', 'personal_image', 13, '2019-07-30 11:58:39', '2019-07-30 11:58:39'),
(59, 'social/cover_image/KAorQtjbiUX48NHVKL1GVxyCxcNPAeKSXDvlyMkP.jpeg', 'cover_image', 13, '2019-07-30 12:02:26', '2019-07-30 12:02:26'),
(60, 'social/personal_image/s7Y1hY0QFqTkRGWchNBVvViTZo8XhqIIrNYzazt8.png', 'personal_image', 4, '2019-07-30 13:06:11', '2019-07-30 13:06:11'),
(61, 'social/personal_image/rWI7mIAiFFD8YrJ96MKINrf26stYRaSSytxv0Zxe.png', 'personal_image', 13, '2019-08-08 12:29:19', '2019-08-08 12:29:19');

-- --------------------------------------------------------

--
-- بنية الجدول `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `posts`
--

INSERT INTO `posts` (`id`, `text`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'jjjj', 0, 3, '2019-07-16 18:14:23', '2019-07-16 18:14:23'),
(4, 'n', 0, 3, '2019-07-16 18:27:28', '2019-07-16 18:27:28'),
(5, 'hh', 0, 3, '2019-07-16 18:28:06', '2019-07-16 18:28:06'),
(6, 'vbbb', 0, 3, '2019-07-16 18:49:39', '2019-07-16 18:49:39'),
(7, 'bbb', 0, 3, '2019-07-16 19:18:11', '2019-07-16 19:18:11'),
(8, 'hhh', 0, 4, '2019-07-16 19:36:47', '2019-07-16 19:36:47'),
(9, 'hhh', 0, 4, '2019-07-16 19:37:14', '2019-07-16 19:37:14'),
(10, 'hhh', 0, 4, '2019-07-16 19:37:40', '2019-07-16 19:37:40'),
(11, 'cccc', 0, 3, '2019-07-16 19:38:01', '2019-07-16 19:38:01'),
(12, 'hhh', 0, 3, '2019-07-16 19:38:09', '2019-07-16 19:38:09'),
(13, 'khjhsdfghjkl;\'', 0, 5, '2019-07-16 19:38:26', '2019-07-16 19:38:26'),
(14, 'hello', 0, 5, '2019-07-16 19:39:43', '2019-07-16 19:39:43'),
(15, '\';lkj', 0, 5, '2019-07-16 19:40:12', '2019-07-16 19:40:12'),
(16, 'z', 0, 3, '2019-07-16 20:28:49', '2019-07-16 20:28:49'),
(17, 'xxx', 0, 3, '2019-07-16 20:28:57', '2019-07-16 20:28:57'),
(18, 'xxxxxx4', 0, 4, '2019-07-16 20:31:01', '2019-07-16 20:31:01'),
(19, 'xxxxxxxx', 0, 4, '2019-07-16 20:31:40', '2019-07-16 20:31:40'),
(20, 'xx', 0, 4, '2019-07-16 20:32:36', '2019-07-17 19:02:16'),
(21, 'bbb', 0, 3, '2019-07-16 20:32:52', '2019-07-16 20:32:52'),
(23, 'تتن', 0, 6, '2019-07-17 19:27:18', '2019-07-17 19:27:18'),
(24, 'kljljml', 0, 4, '2019-07-17 19:54:17', '2019-07-17 19:54:17'),
(25, 'xx', 0, 4, '2019-07-17 20:00:29', '2019-07-17 20:00:29'),
(26, 'helllllo', 0, 3, '2019-07-17 20:58:12', '2019-07-17 20:58:12'),
(27, 'عصام الجحش', 0, 3, '2019-07-17 21:07:23', '2019-07-17 21:07:23'),
(28, 'ctfj', 0, 4, '2019-07-17 22:58:09', '2019-07-17 22:58:09'),
(31, 'تلاىماىز', 10, 13, '2019-07-24 06:45:36', '2019-07-24 06:45:36'),
(32, 'hello', 0, 3, '2019-07-26 14:34:05', '2019-07-26 14:34:05'),
(33, 'عبدالله عقبه', 0, 5, '2019-07-26 14:43:07', '2019-07-26 14:43:07'),
(34, 'ممنوع التدخين ياعقبه', 1, 4, '2019-07-26 14:45:10', '2019-07-26 14:45:10'),
(35, 'و عبدالله', 0, 5, '2019-07-26 14:45:52', '2019-07-26 14:45:52'),
(36, 'يافؤاد اتنازل العزي', 0, 3, '2019-07-26 14:50:11', '2019-07-26 14:50:11'),
(37, 'يافؤاد اتنازل العزي', 0, 3, '2019-07-26 14:50:11', '2019-07-26 14:50:11'),
(38, 'ابوبكر الشهاري \r\n\r\n\r\nمعك من يربيك', 0, 4, '2019-07-26 14:51:33', '2019-07-26 14:51:33'),
(39, 'وريحهم', 0, 18, '2019-07-26 15:03:10', '2019-07-26 15:03:10'),
(41, 'اهللللين وسهلييين', 0, 20, '2019-07-26 15:20:31', '2019-07-26 15:20:31'),
(43, 'وريحهم', 0, 6, '2019-07-26 15:22:20', '2019-07-26 15:22:20'),
(44, 'وريحهم', 0, 6, '2019-07-26 15:22:35', '2019-07-26 15:22:35'),
(45, 'يامصطفى', 0, 18, '2019-07-26 15:27:44', '2019-07-26 15:27:44'),
(46, 'منورييييييييييييين', 0, 16, '2019-07-26 15:35:26', '2019-07-26 15:35:26'),
(47, 'الوه', 0, 6, '2019-07-26 15:36:38', '2019-07-26 15:36:38'),
(48, 'سسسسسسسسسسسسسسس', 0, 16, '2019-07-26 15:36:48', '2019-07-26 15:36:48'),
(49, 'هلا', 0, 6, '2019-07-26 15:37:34', '2019-07-26 15:37:34'),
(50, 'ياشهاري تعال شوف', 0, 20, '2019-07-26 15:39:31', '2019-07-26 15:39:31'),
(52, 'تتترتتتزتننن', 0, 19, '2019-07-26 15:42:06', '2019-07-26 15:42:06'),
(53, 'الله يحسن الختام للشيبه هذا', 0, 20, '2019-07-26 15:43:14', '2019-07-26 15:43:14'),
(54, 'gkjlfsd;gkdflsjlkjglkdfsjglkfgldfkjglkjfdlkgjfdlkjglsdk', 0, 19, '2019-07-26 15:45:24', '2019-07-26 15:45:24'),
(55, 'hi', 0, 19, '2019-07-26 15:45:49', '2019-07-26 15:45:49'),
(57, 'وريحهم', 0, 21, '2019-07-26 15:55:50', '2019-07-26 15:55:50'),
(58, 'خخيحخيحيؤيؤتسيتسيطت', 12, 21, '2019-07-26 16:05:27', '2019-07-26 16:05:27'),
(59, 'منسيتظسنكءنءطؤنطنسحس', 12, 21, '2019-07-26 16:06:27', '2019-07-26 16:06:27'),
(60, 'لممغمغمغخهغغمعبببع', 12, 21, '2019-07-26 16:06:51', '2019-07-26 16:06:51'),
(61, 'اهلا', 12, 17, '2019-07-26 16:07:27', '2019-07-26 16:07:27'),
(62, 'اهلااااا', 12, 17, '2019-07-26 16:07:38', '2019-07-26 16:07:38'),
(63, 'ه', 12, 17, '2019-07-26 16:07:47', '2019-07-26 16:07:47'),
(64, 'اثير', 12, 17, '2019-07-26 16:07:54', '2019-07-26 16:07:54'),
(65, 'الاء', 12, 17, '2019-07-26 16:08:02', '2019-07-26 16:08:02'),
(66, 'العذي', 12, 17, '2019-07-26 16:08:16', '2019-07-26 16:08:16'),
(67, 'هايات', 12, 17, '2019-07-26 16:08:39', '2019-07-26 16:08:39'),
(68, 'الوووووووووووووه', 12, 21, '2019-07-26 16:08:53', '2019-07-26 16:08:53'),
(69, 'اهلا', 12, 17, '2019-07-26 16:08:58', '2019-07-26 16:08:58'),
(70, 'ممممممممممممممممممممممممممممممممممم', 12, 21, '2019-07-26 16:09:33', '2019-07-26 16:09:33'),
(71, 'kknk', 11, 13, '2019-07-26 16:10:04', '2019-07-26 16:10:04'),
(72, 'ايسسايؤاني', 11, 21, '2019-07-26 16:10:23', '2019-07-26 16:10:23'),
(74, 'هاي', 11, 17, '2019-07-26 16:10:45', '2019-07-26 16:10:45'),
(75, 'هاي', 11, 17, '2019-07-26 16:10:46', '2019-07-26 16:10:46'),
(76, 'الفندم بيرم', 11, 21, '2019-07-26 16:13:55', '2019-07-26 16:13:55'),
(77, 'يؤؤااؤكايؤاايثاؤا', 11, 21, '2019-07-26 16:16:30', '2019-07-26 16:16:30'),
(78, 'احم احم', 11, 21, '2019-07-26 16:41:49', '2019-07-26 16:41:49'),
(79, 'ااتاخمتمخت', 11, 21, '2019-07-26 16:43:08', '2019-07-26 16:43:08'),
(80, 'الحمدلله بعد الضر زال الهم', 0, 17, '2019-07-26 16:45:05', '2019-07-26 16:45:05'),
(81, 'كوكو', 11, 21, '2019-07-26 16:45:21', '2019-07-26 16:45:21'),
(82, 'منتنت', 0, 19, '2019-07-26 16:45:27', '2019-07-26 16:45:27'),
(83, 'العزي', 11, 21, '2019-07-26 16:48:58', '2019-07-26 16:48:58'),
(84, 'أب الخضراء', 0, 21, '2019-07-26 16:54:46', '2019-07-26 16:54:46'),
(85, 'وريحهم يارجال \r\nكيف كل وحالة', 0, 16, '2019-07-26 16:55:57', '2019-07-26 16:55:57'),
(88, 'تنمتنتمنتمنتم', 0, 22, '2019-07-27 18:06:51', '2019-07-27 18:06:51'),
(89, 'kjkljljkj', 0, 22, '2019-07-27 18:11:08', '2019-07-27 18:11:08'),
(97, 'uijferdugjfaegwpsufibweals', 0, 28, '2019-07-28 07:22:16', '2019-07-28 07:22:16'),
(100, 'موقع الكتروني تعريفي وتواصل اجتماعي بين الطلاب والكادر التعليمي لكلية التميز للعلوم الطبية والتقنية \r\nبالمحويت / الرجم.', 0, 13, '2019-07-30 12:04:49', '2019-07-30 12:04:49'),
(101, 'ايش تم اخذ اليوم من درس', 8, 4, '2019-08-01 17:28:36', '2019-08-01 17:28:36'),
(102, 'سنقيم غدا ان شاء الله محاضرة تعويضية من الساعة 10 قاعة رقم 1', 8, 13, '2019-08-01 17:31:14', '2019-08-01 17:31:14');

-- --------------------------------------------------------

--
-- بنية الجدول `reference_books`
--

CREATE TABLE `reference_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `describtion` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `originalName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `reference_books`
--

INSERT INTO `reference_books` (`id`, `describtion`, `file`, `originalName`, `study_course_id`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>h</strong></p><p><strong>hzzc</strong></p><p><strong>zzz</strong></p><p><strong>zz</strong><strong>kjb</strong></p>', 'Reference/Rdy01rvQwlM56Zfq0JkzKbwktdhZkq3CpKAmcJZp.docx', 'صلاح منصور.docx', 5, '2019-07-22 12:35:14', '2019-07-22 21:10:55'),
(2, '<p><strong>hhzzzzzzz</strong></p><p><strong>zzzzzzzzzzzzzzzzhjbkjb</strong></p>', 'Reference/H31MiJxohPDiFiNnya8ZLu8k7pkqO0yPDFxfJl01.docx', 'ما هي الخوارزميات.docx', 5, '2019-07-22 19:56:16', '2019-07-22 20:54:31'),
(3, '<p>ihjgtriofpyg09[0uj9o</p>', 'Reference/3yrE9veU9IIf4Bn5GlQ13OEzJ8jCPwKKuCQVwxMN.docx', 'ما هي الخوارزميات.docx', 11, '2019-07-26 16:29:25', '2019-07-26 16:29:25');

-- --------------------------------------------------------

--
-- بنية الجدول `reply_coumments`
--

CREATE TABLE `reply_coumments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coumment_post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `reply_coumments`
--

INSERT INTO `reply_coumments` (`id`, `text`, `image`, `coumment_post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '😍😍😍😍😔😂', NULL, 4, 6, '2019-07-17 21:16:42', '2019-07-17 21:16:42'),
(2, 'هههههههخخ', NULL, 4, 6, '2019-07-21 16:14:50', '2019-07-21 16:14:50'),
(4, 'هو مسكين', NULL, 14, 3, '2019-07-26 14:54:14', '2019-07-26 14:54:14'),
(8, 'انا حالي والله', NULL, 47, 17, '2019-07-26 16:13:07', '2019-07-26 16:13:07'),
(9, 'العزي ابن حسين محمد حالي والكل', NULL, 47, 17, '2019-07-26 16:13:40', '2019-07-26 16:13:40'),
(10, 'ممممممممممممم', NULL, 58, 21, '2019-07-26 17:00:40', '2019-07-26 17:00:40'),
(11, 'انا فداااااالوة', NULL, 56, 21, '2019-07-26 17:01:28', '2019-07-26 17:01:28'),
(12, 'موقع الكتروني تعريفي وتواصل اجتماعي بين الطلاب والكادر التعليمي لكلية التميز للعلوم الطبية والتقنية \r\nبالمحويت / الرجم.', NULL, 60, 13, '2019-07-30 12:07:19', '2019-07-30 12:07:19');

-- --------------------------------------------------------

--
-- بنية الجدول `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `study_course_id` int(10) UNSIGNED NOT NULL,
  `grade` int(11) NOT NULL DEFAULT '0',
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `results`
--

INSERT INTO `results` (`id`, `student_id`, `study_course_id`, `grade`, `rate`, `year`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 98, 'جيد', '2019-2020', NULL, NULL),
(2, 4, 1, 90, 'مقبول', '2019-2020', NULL, NULL),
(3, 5, 1, 98, 'جيد', '2019-2020', NULL, NULL),
(4, 6, 1, 98, 'جيد', '2019-2020', NULL, NULL),
(5, 7, 1, 78, 'مقبول', '2019-2020', NULL, NULL),
(6, 8, 1, 80, 'مقبول', '2019-2020', NULL, NULL),
(7, 9, 1, 80, 'مقبول', '2019-2020', NULL, NULL),
(8, 10, 1, 79, 'مقبول', '2019-2020', NULL, NULL),
(9, 11, 1, 89, 'مقبول', '2019-2020', NULL, NULL),
(10, 12, 1, 89, 'مقبول', '2019-2020', NULL, NULL),
(41, 3, 7, 98, 'جيد', '2019-2020', NULL, NULL),
(42, 4, 7, 90, 'مقبول', '2019-2020', NULL, NULL),
(43, 5, 7, 98, 'جيد', '2019-2020', NULL, NULL),
(44, 6, 7, 98, 'جيد', '2019-2020', NULL, NULL),
(45, 7, 7, 78, 'مقبول', '2019-2020', NULL, NULL),
(46, 8, 7, 80, 'مقبول', '2019-2020', NULL, NULL),
(47, 9, 7, 80, 'مقبول', '2019-2020', NULL, NULL),
(48, 10, 7, 140, 'ممتاز', '2019-2020', NULL, '2019-07-15 20:57:30'),
(49, 11, 7, 89, 'مقبول', '2019-2020', NULL, NULL),
(50, 12, 7, 90, 'مقبول', '2019-2020', NULL, NULL),
(51, 3, 6, 98, 'جيد', '2019-2020', NULL, NULL),
(52, 4, 6, 90, 'مقبول', '2019-2020', NULL, NULL),
(53, 5, 6, 98, 'جيد', '2019-2020', NULL, NULL),
(54, 6, 6, 98, 'جيد', '2019-2020', NULL, NULL),
(55, 7, 6, 78, 'مقبول', '2019-2020', NULL, NULL),
(56, 8, 6, 80, 'مقبول', '2019-2020', NULL, NULL),
(57, 9, 6, 80, 'مقبول', '2019-2020', NULL, NULL),
(58, 10, 6, 79, 'مقبول', '2019-2020', NULL, NULL),
(59, 11, 6, 89, 'مقبول', '2019-2020', NULL, NULL),
(60, 12, 6, 90, 'مقبول', '2019-2020', NULL, NULL),
(101, 3, 8, 98, 'جيد', '2019-2020', NULL, NULL),
(102, 4, 8, 89, 'مقبول', '2019-2020', NULL, NULL),
(103, 5, 8, 97, 'مقبول', '2019-2020', NULL, NULL),
(104, 6, 8, 87, 'مقبول', '2019-2020', NULL, NULL),
(105, 7, 8, 78, 'مقبول', '2019-2020', NULL, NULL),
(106, 8, 8, 98, 'جيد', '2019-2020', NULL, NULL),
(107, 9, 8, 98, 'جيد', '2019-2020', NULL, NULL),
(108, 10, 8, 88, 'مقبول', '2019-2020', NULL, NULL),
(109, 11, 8, 85, 'مقبول', '2019-2020', NULL, NULL),
(110, 12, 8, 89, 'مقبول', '2019-2020', NULL, NULL),
(179, 17, 12, 91, 'ممتاز', '2019-2020', NULL, NULL),
(180, 19, 12, 98, 'ممتاز', '2019-2020', NULL, NULL),
(181, 15, 12, 98, 'ممتاز', '2019-2020', NULL, NULL),
(182, 20, 12, 82, ' جيد جدا', '2019-2020', NULL, NULL),
(183, 18, 12, 72, 'جيد', '2019-2020', NULL, NULL),
(184, 16, 12, 90, 'ممتاز', '2019-2020', NULL, NULL),
(185, 3, 5, 148, 'ممتاز', '2019-2020', NULL, NULL),
(186, 4, 5, 90, 'مقبول', '2019-2020', NULL, NULL),
(187, 5, 5, 98, 'جيد', '2019-2020', NULL, NULL),
(188, 6, 5, 98, 'جيد', '2019-2020', NULL, NULL),
(189, 7, 5, 108, 'جيد', '2019-2020', NULL, NULL),
(190, 8, 5, 80, 'مقبول', '2019-2020', NULL, NULL),
(191, 9, 5, 80, 'مقبول', '2019-2020', NULL, NULL),
(192, 10, 5, 79, 'مقبول', '2019-2020', NULL, NULL),
(193, 11, 5, 89, 'مقبول', '2019-2020', NULL, NULL),
(194, 12, 5, 90, 'مقبول', '2019-2020', NULL, NULL),
(195, 3, 4, 80, 'مقبول', '2019-2020', NULL, NULL),
(196, 4, 4, 70, 'ضعيف', '2019-2020', NULL, NULL),
(197, 5, 4, 78, 'مقبول', '2019-2020', NULL, NULL),
(198, 6, 4, 80, 'مقبول', '2019-2020', NULL, NULL),
(199, 7, 4, 77, 'مقبول', '2019-2020', NULL, NULL),
(200, 8, 4, 51, 'ضعيف', '2019-2020', NULL, NULL),
(201, 9, 4, 88, 'مقبول', '2019-2020', NULL, NULL),
(202, 10, 4, 40, 'ضعيف', '2019-2020', NULL, NULL),
(203, 11, 4, 78, 'مقبول', '2019-2020', NULL, NULL),
(204, 12, 4, 89, 'مقبول', '2019-2020', NULL, NULL),
(205, 17, 11, 82, ' جيد جدا', '2019-2020', NULL, NULL),
(206, 19, 11, 90, 'ممتاز', '2019-2020', NULL, NULL),
(207, 15, 11, 92, 'ممتاز', '2019-2020', NULL, NULL),
(208, 20, 11, 94, 'ممتاز', '2019-2020', NULL, NULL),
(209, 18, 11, 95, 'ممتاز', '2019-2020', NULL, NULL),
(210, 16, 11, 80, ' جيد جدا', '2019-2020', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sliders`
--

INSERT INTO `sliders` (`id`, `text`, `image`) VALUES
(1, 'التعلم اجيال الغد المشرق في كل مجال علمي جيدكمكمكينكمنش', 'slider/N3S956Bqn2dEqrqZ5uzKJBrDzrfFrInpUDi5N0RD.jpeg'),
(3, 'خفيض الرسوم الدراسية لخيجين الثانوية لهذا العام', 'slider/RNYQPghUnUq3pdGtZpJeJZfEYS65Dd51F461q3Yn.jpeg'),
(4, 'خفيض الرسوم الدراسية لخيجين الثانوية لهذا العام', 'slider/mny0kZ1qtPlPtjBfP4w6nOGss8zjGm4werTw9UZ3.jpeg'),
(5, 'يحق للطالب الراغب في التحويل من كليات أخرى معترف بها إلى كلية التميز', 'slider/iD0m7pAqSLMFhlVlGhKv1HLYLNblKpZigmFqShMg.png');

-- --------------------------------------------------------

--
-- بنية الجدول `solution_assignments`
--

CREATE TABLE `solution_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `describtion` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `originalName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `assignment_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `solution_assignments`
--

INSERT INTO `solution_assignments` (`id`, `describtion`, `file`, `originalName`, `viewed`, `assignment_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, '<p>l,cxl;xm, ;lzx</p>', 'Assignment/studentAssignment/QxS2TrI8wNQUAxvG926cm2DTNFUoCmAgWZBChVac.docx', 'slah mnsor.docx', 1, 6, 6, '2019-07-21 16:43:29', '2019-07-21 16:43:55'),
(3, '<p>نامنامنليسمنمنيمكنلام</p>', 'Assignment/studentAssignment/uzs0y6k7rEWhbAiIrz3zP0by1b7RZ2pOYxx9cDW8.docx', 'جــــمــــال الادور.docx', 1, 8, 17, '2019-07-26 16:26:07', '2019-07-26 16:28:24'),
(4, '<p>انا محكم&nbsp;</p>', 'Assignment/studentAssignment/Pw917PBnA0ndnI6AyjqAvmyCe3z6BywENCQEeOcr.docx', '1.docx', 1, 8, 16, '2019-07-26 16:27:31', '2019-07-26 16:27:47'),
(5, '<p>لاااااااااااتلنتلبانتب لتنتبابنتابن تالالتالبا الاتابتابتبلاب التابلبلبالببيلببتالنتباالب تبنالبنالبالب اتنبلبلبل</p>', 'Assignment/studentAssignment/6MTKYh8DEyzQW1qaymMNknZvuhvyDVYgQX1dp5O2.docx', 'بسم الله الرحمن الرحيم.docx', 0, 8, 19, '2019-07-26 16:39:59', '2019-07-26 16:39:59'),
(9, '<p>jkrgdvbuyejsgfhaewol</p>', 'Assignment/studentAssignment/msFNH4c7YnJcvyY7ISH7omY2NJ7qWj1KbRXIBiXJ.docx', 'صلاح منصور.docx', 1, 12, 26, '2019-07-28 07:31:10', '2019-07-28 07:31:23'),
(10, '<p>هذا حل الواجب</p>', 'Assignment/studentAssignment/sKgnN3IZScmXW6W4KqdM4FVdzR4ZxzdydDvAFYev.docx', 'ملخص الخوارزميات.docx', 1, 6, 9, '2019-07-30 14:24:37', '2019-07-30 14:26:35'),
(12, '<p>هذا بقية الحل</p>', 'Assignment/studentAssignment/CyMGf56UvGt9IsgziPR7Le1dA4iNlVJMD7cn277n.docx', '‏‏ملخص الخوارزميات - نسخة.docx', 0, 6, 9, '2019-07-30 14:26:21', '2019-07-30 14:26:21'),
(13, '<p>kj</p>', 'Assignment/studentAssignment/s6lmal3z0w0UqOoHCqBfKFz0PJKWAJV9W5K7xoLv.docx', '‏‏ملخص الخوارزميات - نسخة.docx', 0, 6, 8, '2019-07-30 14:30:30', '2019-07-30 14:30:30'),
(14, '<p>x</p>', 'Assignment/studentAssignment/lkawaNMTLF1So0YvCaoJaQq8EatFW7AekExlKk7g.docx', '‏‏ملخص الخوارزميات - نسخة.docx', 0, 6, 7, '2019-07-30 14:31:19', '2019-07-30 14:31:19');

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acadimy_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_acount` tinyint(1) NOT NULL DEFAULT '0',
  `ginder` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `students`
--

INSERT INTO `students` (`id`, `name`, `acadimy_id`, `department_id`, `phone`, `level`, `status`, `email`, `ssn`, `has_acount`, `ginder`, `created_at`, `updated_at`) VALUES
(2, 'افراح منصور احمد الولي', '201600012101', 4, '123', '2', 0, 'A@A.com', '11', 1, 'female', '2019-07-10 08:25:27', '2019-07-27 15:08:02'),
(3, 'امة الوهاب علي عبد الله البشاري', '201600012118', 4, '77777777', '1', 0, 'B@B.com', '201600012118', 1, 'female', '2019-07-10 08:26:39', '2019-07-10 08:53:56'),
(4, 'دعاء علي سعد هازع', '201600012111', 4, '777777', '1', 0, 'C@C.com', '201600012111', 1, 'female', '2019-07-10 08:27:44', '2019-07-10 08:52:51'),
(5, 'سارة خالد ناصر رزق', '201600012109', 4, '44', '1', 0, 'D@D.com', '201600012109', 1, 'female', '2019-07-10 08:28:41', '2019-07-10 08:52:25'),
(6, 'علي منصور ناصر مبخوت', '201600012113', 4, '44', '1', 0, 'E@E.com', '201600012113', 1, 'male', '2019-07-10 08:30:41', '2019-07-10 08:50:20'),
(7, 'عصام يحيى محمد الحمزي', '201600012122', 4, '777', '1', 0, 'F@F.com', '201600012122', 1, 'male', '2019-07-10 08:31:30', '2019-07-10 08:49:50'),
(8, 'فؤاد عبد الله محمد الذيباني', '201600012116', 4, '777777', '1', 0, 'G@G.coom', '201600012116', 1, 'male', '2019-07-10 08:32:19', '2019-07-10 08:48:36'),
(9, 'قصى عبد الرحمن عبده الزبيدي', '201600012117', 4, '777777', '1', 0, 'u@U.com', '201600012117', 1, 'male', '2019-07-10 08:33:05', '2019-07-10 08:48:00'),
(10, 'محمد صالح ناصر الحلحلي', '201600012108', 4, '77', '1', 0, 't@T.com', '201600012108', 1, 'male', '2019-07-10 08:34:02', '2019-07-10 08:47:27'),
(11, 'مختار سيف يحيى العزكي', '201600012119', 4, '777777', '1', 0, 'tt@f.com', '201600012119', 1, 'male', '2019-07-10 08:34:53', '2019-07-30 16:10:57'),
(12, 'هدى علي حمود المعمري', '201600012103', 4, '8', '1', 0, 'j@f.com', '201600012103', 0, 'female', '2019-07-10 08:35:42', '2019-07-17 11:10:45'),
(13, 'محمد علي', '123456', 4, '773569041', '1', 0, 'm@gmail.com', '123456', 1, 'male', '2019-07-22 16:12:54', '2019-07-22 16:16:16'),
(15, 'ابوبكر محسن حسن الشهاري', '160133', 3, '772544010', '1', 0, 'abobaker@gmail.com', '772544010', 1, 'male', '2019-07-26 14:50:20', '2019-07-26 14:57:29'),
(16, 'عبد الله عقبه', '163202', 3, '77777', '1', 0, 'blackahmed88@gmail.com', '163202', 1, 'male', '2019-07-26 14:51:23', '2019-07-26 14:59:56'),
(17, 'محمد الاهجري', '16150', 3, '777', '1', 0, 'mohamed70@gmail.com', '16150', 1, 'male', '2019-07-26 14:52:41', '2019-07-26 15:49:38'),
(18, 'مصطفى  الخولاني', '1694', 3, '4444', '1', 0, 'malkhulany0@gmail.com', '1694', 1, 'male', '2019-07-26 14:55:08', '2019-07-26 15:11:01'),
(19, 'يوسف  الادور', '1458', 3, '777', '1', 0, 'aladower@gmail.com', '1458', 1, 'male', '2019-07-26 14:55:59', '2019-07-30 18:22:50'),
(20, 'فؤاد منصور', '1661', 3, '444', '1', 0, 'fuad@gmail.com', '1661', 1, 'male', '2019-07-26 14:57:34', '2019-07-26 15:00:54'),
(26, 'الطالب يوسف', '5555', 9, '777777', '1', 0, 's@s.com', '5555', 0, 'male', '2019-07-28 07:16:54', '2019-07-30 14:48:31'),
(27, 'اسامة المعمري', '888', 3, '5', '1', 0, NULL, '4', 0, 'male', '2019-07-30 14:49:34', '2019-07-30 14:49:34'),
(28, 'java', '445', 3, '4', '1', 0, NULL, '5', 0, 'male', '2019-07-30 14:49:55', '2019-07-30 14:49:55'),
(29, '46', '40', 3, '46', '1', 0, NULL, '46', 0, 'male', '2019-07-30 14:50:30', '2019-07-30 14:50:30');

-- --------------------------------------------------------

--
-- بنية الجدول `study_courses`
--

CREATE TABLE `study_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_plan_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `study_courses`
--

INSERT INTO `study_courses` (`id`, `year`, `study_plan_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, '2019-2020', 5, 3, '2019-07-14 13:07:41', '2019-07-27 11:30:28'),
(4, '2019-2020', 2, 1, '2019-07-14 13:40:26', '2019-07-14 13:40:26'),
(5, '2019-2020', 1, 2, '2019-07-14 13:40:47', '2019-07-15 19:36:08'),
(6, '2019-2020', 4, 1, '2019-07-14 13:48:59', '2019-07-14 13:48:59'),
(7, '2019-2020', 3, 1, '2019-07-14 13:49:38', '2019-07-14 13:49:38'),
(8, '2019-2020', 6, 2, '2019-07-15 20:00:31', '2019-07-15 20:00:31'),
(9, '2019-2020', 7, 3, '2019-07-15 20:11:40', '2019-07-17 13:30:51'),
(11, '2019-2020', 10, 1, '2019-07-26 15:04:36', '2019-07-27 11:22:17'),
(12, '2019-2020', 11, 2, '2019-07-26 15:04:56', '2019-07-26 15:04:56'),
(13, '2018-2019', 7, 1, '2019-07-27 11:39:04', '2019-07-27 11:39:04'),
(15, '2018-2019', 7, 2, '2019-07-27 11:41:13', '2019-07-27 11:41:13'),
(18, '2019-2020', 7, 1, '2019-07-27 16:24:01', '2019-07-27 16:24:01'),
(24, '2019-2020', 16, 9, '2019-07-28 07:29:06', '2019-07-28 07:29:06');

-- --------------------------------------------------------

--
-- بنية الجدول `study_plans`
--

CREATE TABLE `study_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theorical_hore` int(11) NOT NULL,
  `lab_hore` int(11) NOT NULL,
  `max_grade` int(11) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `study_plans`
--

INSERT INTO `study_plans` (`id`, `name_ar`, `name_en`, `theorical_hore`, `lab_hore`, `max_grade`, `department_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'مقدمة الحاسب الآلي', 'intodaction to computer', 3, 0, 150, 4, 1, '1', '2019-07-10 08:14:09', '2019-07-10 08:14:09'),
(2, 'رياضيات الاعمال', 'mathmatical', 3, 0, 150, 4, 1, '1', '2019-07-10 08:15:18', '2019-07-10 08:15:18'),
(3, 'اللغة الانجليزية', 'English', 3, 0, 150, 4, 1, '1', '2019-07-10 08:15:47', '2019-07-10 08:15:47'),
(4, 'مبادئ نظم المعلومات', 'information system', 3, 0, 150, 4, 1, '1', '2019-07-10 08:16:24', '2019-07-27 17:19:21'),
(5, 'الثقافة الاسلامية', 'islamic', 2, 0, 100, 4, 1, '1', '2019-07-10 08:17:09', '2019-07-10 08:17:09'),
(6, 'مبادئ نظم المعلومات', 'information system', 3, 0, 150, 4, 1, '1', '2019-07-10 08:21:24', '2019-07-10 08:21:24'),
(7, 'مبادئ الاقتصاد', 'encomic  princilple', 3, 0, 150, 4, 1, '2', '2019-07-15 19:51:09', '2019-07-15 19:51:09'),
(10, 'اللغة الانجليزية', 'English', 3, 0, 100, 3, 1, '1', '2019-07-26 15:01:15', '2019-07-26 15:01:15'),
(11, 'اللغة العربية', 'Arabic', 3, 0, 100, 3, 1, '1', '2019-07-26 15:01:41', '2019-07-26 15:01:41'),
(16, 'مقدمة الحاسب الآلي', 'intodaction to computer', 2, 0, 100, 9, 1, '1', '2019-07-28 07:15:16', '2019-07-28 07:15:16');

-- --------------------------------------------------------

--
-- بنية الجدول `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acadimy_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_acount` tinyint(1) NOT NULL DEFAULT '0',
  `ginder` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('doctor','teacher') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `acadimy_id`, `qualification`, `phone`, `email`, `ssn`, `has_acount`, `ginder`, `type`, `created_at`, `updated_at`) VALUES
(1, 'الاستاذ علي', '1234', 'ggggggg', '1234', 'G@F.com', '1234', 1, 'male', 'teacher', '2019-07-14 13:07:11', '2019-07-27 15:08:30'),
(2, 'اسامة محمد احمد المعمري', '160065', 'بكيلاريوس', '773569041', 'osama1234887@gmail.com', '5671234', 1, 'male', 'teacher', '2019-07-15 19:35:22', '2019-07-27 15:09:54'),
(3, 'عبد الله عقبه', '193313', 'بكيلاريوس', '854196', 'abob@gmail.com', '1231651', 0, 'male', 'teacher', '2019-07-17 13:30:26', '2019-07-17 13:30:26'),
(4, 'فاطمة حمود', '11111', 'بكيلاريوس', '641654', 'f@s.com', '11111', 0, 'female', 'doctor', '2019-07-17 13:32:30', '2019-07-17 13:32:30'),
(6, 'اسامة المعمري', '3334', 'بكيلاريوس', '777', 'abosam@gmail.com', '3334', 1, 'male', 'doctor', '2019-07-27 17:28:22', '2019-07-27 17:33:20'),
(9, 'الاستاذ عبد الله', '5556', 'بكيلاريوس', '777777', 'r@f.com', '5556', 1, 'male', 'teacher', '2019-07-28 07:18:50', '2019-07-28 07:19:33');

-- --------------------------------------------------------

--
-- بنية الجدول `upgrades`
--

CREATE TABLE `upgrades` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `stape` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `upgrades`
--

INSERT INTO `upgrades` (`id`, `year`, `admin_id`, `department_id`, `level`, `semester`, `stape`, `status`, `created_at`, `updated_at`) VALUES
(1, '2018-2019', 1, 4, 1, '1', 2, 1, '2019-07-15 19:55:54', '2019-07-27 14:23:33'),
(4, '2019-2020', 1, 4, 1, '1', 2, 1, '2019-07-27 16:07:17', '2019-07-27 16:28:51'),
(5, '2019-2020', 1, 3, 1, '1', 1, 0, '2019-07-27 16:29:57', '2019-07-27 16:29:57'),
(6, '2019-2020', 1, 3, 1, '1', 1, 0, '2019-07-27 19:20:40', '2019-07-27 19:20:40'),
(8, '2019-2020', 1, 4, 1, '1', 2, 1, '2019-07-28 06:10:52', '2019-07-28 06:11:29');

-- --------------------------------------------------------

--
-- بنية الجدول `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `personal_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'social/users/personal.jpg',
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'social/users/cover.jpg',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_Active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `useraccountable_id` int(10) UNSIGNED NOT NULL,
  `completeRigester` tinyint(1) NOT NULL DEFAULT '0',
  `follow_my` tinyint(1) NOT NULL DEFAULT '1',
  `message_my` tinyint(1) NOT NULL DEFAULT '0',
  `view_my` tinyint(1) NOT NULL DEFAULT '1',
  `Ifollow` tinyint(1) NOT NULL DEFAULT '1',
  `Myfollow` tinyint(1) NOT NULL DEFAULT '1',
  `useraccountable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `personal_image`, `cover_image`, `password`, `user_name`, `display_name`, `about`, `address`, `site`, `last_Active`, `useraccountable_id`, `completeRigester`, `follow_my`, `message_my`, `view_my`, `Ifollow`, `Myfollow`, `useraccountable_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'social/personal_image/14Ih67ldgscjOmNYHMAnE1wuuMZafQU1bfYazX4R.jpeg', 'social/cover_image/9v7QjltlwqymIDGAARwPJvgBsyAhytURrmzFBYDC.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '224', 'عبدالله', NULL, NULL, NULL, '2019-07-30 17:28:46', 10, 1, 1, 0, 1, 1, 1, 'App\\Student', 'ZNhnDCCParrkWYqlewkIsRGtW9T7D5y0t8GNN6U03M86WEGWsrtFixctjaQC', '2019-07-10 08:47:27', '2019-07-27 11:29:24'),
(4, 'social/personal_image/s7Y1hY0QFqTkRGWchNBVvViTZo8XhqIIrNYzazt8.png', 'social/cover_image/077kpW4cJ354CPMrcgo1S8vo3yiKSxOE7PbLz9AF.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '225', 'قصى عبد الرحمن عبده الزبيدي', NULL, NULL, NULL, '2019-07-30 19:08:59', 9, 1, 1, 0, 1, 1, 1, 'App\\Student', 'FAZdtqtzmJ07ZJFZXt9t9n7R2OkUs358I9dUmwuhQjhMreDTBEen1q67vcme', '2019-07-10 08:48:00', '2019-07-30 13:06:11'),
(5, 'social/users/user_male_1.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '226', 'فؤاد عبد الله محمد الذيباني', NULL, NULL, NULL, '2019-07-30 17:30:51', 8, 1, 1, 0, 1, 1, 1, 'App\\Student', 'Seb6fe9VYkMspIzzGXuIZ0OFdYerdK2mpVNY5qRDKMNPQDDR6oTlxfIYGjyK', '2019-07-10 08:48:36', '2019-07-10 08:49:05'),
(6, 'social/users/user_male_1.jpg', 'social/cover_image/L3XzA47RgdpWBeniViYDe8YyynUDtKHs39UbItIe.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '227', 'محمد الاهجري', NULL, NULL, NULL, '2019-07-26 18:24:15', 7, 1, 0, 0, 1, 1, 1, 'App\\Student', 'lcjMKWJGj4Gg7cuGn3sFUf1LslfWVBeWHRZdyJ7SkKfgKeenNwRJR4MK1Fs1', '2019-07-10 08:49:50', '2019-07-26 15:24:15'),
(7, 'social/users/user_male_1.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '229', 'علي منصور ناصر مبخوت', NULL, NULL, NULL, '2019-07-26 17:31:51', 6, 1, 1, 0, 1, 1, 1, 'App\\Student', 'q9NFJ4d42GBnXHljQlWNPN5iPCcsmrAbUKj7l5NC1mtDhhls3sEf0I45UGjj', '2019-07-10 08:50:20', '2019-07-10 08:51:54'),
(8, 'social/users/user_male_1.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '230', 'سارة خالد ناصر رزق', NULL, NULL, NULL, '2019-07-26 17:31:51', 5, 1, 1, 0, 1, 1, 1, 'App\\Student', NULL, '2019-07-10 08:52:25', '2019-07-10 08:52:33'),
(9, 'social/users/user_male_1.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '231', 'دعاء علي سعد هازع', NULL, NULL, NULL, '2019-07-26 17:31:51', 4, 1, 1, 0, 1, 1, 1, 'App\\Student', NULL, '2019-07-10 08:52:51', '2019-07-10 08:53:36'),
(10, 'social/users/user_male_1.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '232', 'امة الوهاب علي عبد الله البشاري', NULL, NULL, NULL, '2019-07-26 17:31:51', 3, 1, 1, 0, 1, 1, 1, 'App\\Student', NULL, '2019-07-10 08:53:56', '2019-07-10 08:54:17'),
(11, 'social/users/user_male_1.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '233', 'افراح منصور احمد الولي', NULL, NULL, NULL, '2019-07-26 17:31:51', 2, 1, 0, 0, 1, 1, 0, 'App\\Student', 'pK0Simb8VcUGrbqoNABxXaqru21IMaaaaxaj6hkzL85hyRKmUlnVadpseOPp', '2019-07-10 08:55:19', '2019-07-10 18:40:36'),
(12, 'social/users/cover.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '1234', 'الاستاذ علي', NULL, NULL, NULL, '2019-07-26 17:31:51', 1, 1, 1, 0, 1, 1, 1, 'App\\Teacher', 'RcwJ4VRR6DoOU0Q5G9gefnZywhL9Kvp4SfwoXGtpA4fnDyN0baZ8nxOfEKtf', '2019-07-14 13:09:02', '2019-07-14 13:09:13'),
(13, 'social/personal_image/rWI7mIAiFFD8YrJ96MKINrf26stYRaSSytxv0Zxe.png', 'social/cover_image/KAorQtjbiUX48NHVKL1GVxyCxcNPAeKSXDvlyMkP.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'osama', 'اسامة محمد احمد المعمري', 'لا ياس معا الحياة ولا حياة معا الياس', 'صنعاء - شارع تونس', 'www.samSoft.com', '2019-08-08 19:48:45', 2, 1, 1, 0, 0, 0, 1, 'App\\Teacher', 'txF62f6RQzHG4yEY1BcaLeYGepgFt4myrPdps6FZ2lHG2eg51Tc6EpsNWsWI', '2019-07-17 10:38:25', '2019-08-08 12:29:19'),
(14, 'social/users/cover.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', '123456', 'محمد علي', NULL, NULL, NULL, '2019-07-26 17:31:51', 13, 1, 1, 0, 1, 1, 1, 'App\\Student', 'WX46lvlRXBa5LB0Z224Ov7s3sy62OUTVUTddGOdbdQu8m6teP80noM4JhLKP', '2019-07-22 16:15:35', '2019-07-22 16:16:17'),
(16, 'social/personal_image/2vFnt5NONFdt6j52ZMD034SDniqpyFm89dhGGHg2.jpeg', 'social/cover_image/BsIeR04W6mcaddzWPqK24D16ZJxKmF9aVoBsFalm.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'abobaker Mohsen', 'ابوبكر محسن حسن الشهاري', NULL, NULL, NULL, '2019-07-30 17:28:46', 15, 1, 1, 0, 1, 1, 1, 'App\\Student', 'Z2l3TqYm4C0w6d3RSylPNpKph8nQcaP7p9OM1zuh32r2SF6P7onx5OBU4RTj', '2019-07-26 14:51:28', '2019-07-26 15:03:49'),
(17, 'social/personal_image/1HdjjeLF3CEl7YgWJVHocIhjpKK1sgqT2WJA6RsS.jpeg', 'social/cover_image/Yc8P61A8j68EYdeuz9TI8Yc2CBM1QhXbvWpvAbfo.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'عبدالله أحمد عقبه', 'عبد الله عقبه', NULL, NULL, NULL, '2019-07-30 17:28:46', 16, 1, 1, 0, 1, 1, 1, 'App\\Student', 'FOlQbDXwUjJjE5Cc07jZFcMcuhzGEobDrk3E2FZtUqUsi7tuB6R3b5cixIlr', '2019-07-26 14:59:26', '2019-07-26 15:05:55'),
(18, 'social/personal_image/5lzxqc10rleNzh3fI3qCbP5k5TMSVWQtczCRDpdu.jpeg', 'social/cover_image/JfXtEp0menP8bvfTVRHPkIMIYpzppBYGpiz4CgMs.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'Fuad', 'فؤاد منصور', NULL, NULL, NULL, '2019-07-30 17:28:46', 20, 1, 1, 0, 1, 1, 1, 'App\\Student', 'TQD5UBNLC9fxMb8gEGDUwUDQoAx06nUSVMBqKHmz4SeHmvUHywtmEHCxTCd4', '2019-07-26 15:00:27', '2019-07-26 15:14:44'),
(19, 'social/personal_image/zdMFspYc6yBxe03lgzPOO1ChgJfMsP0IwBHys5mU.jpeg', 'social/cover_image/67ypcZd2rmk4Q9SkRo8grhTcr7HpMbdHuEe9q8At.jpeg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'يوسف الادور', 'يوسف  الادور', NULL, NULL, NULL, '2019-07-30 17:28:46', 19, 1, 1, 0, 1, 1, 1, 'App\\Student', 'y2WpF87vvm2pOfGT3Zab0uAPSH1cZeS8zzn9MAZH7s3gIo65GJtiKXmaWoiC', '2019-07-26 15:00:49', '2019-07-26 17:03:56'),
(20, 'social/personal_image/zB5qe0icGQrqJn8Xo6mftJ5d9Sd5VMKq19rpYxgc.jpeg', 'social/cover_image/370nl2K45UD6MzpTKhH2eKhjjN76A9IQyemwwDd3.png', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'musstafa@y', 'مصطفى  الخولاني', NULL, NULL, NULL, '2019-07-30 17:28:46', 18, 1, 1, 0, 1, 1, 1, 'App\\Student', 'YNuC6DznHfRnyqvfh1JbafCGlcJMdDhRxcIgM4erhhBH8VC6YDnFNluQx2rE', '2019-07-26 15:02:11', '2019-07-26 15:16:53'),
(21, 'social/personal_image/afkRPfastxrh2x4Yyzt5BbivJNz4prrHww9odSuQ.jpeg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'محمد الاهجري', 'محمد الاهجري', NULL, NULL, NULL, '2019-07-30 17:28:46', 17, 1, 1, 0, 1, 1, 1, 'App\\Student', 'ilszltzzoSYvNaxrgSNKmmTNlXyRYLEezzYYXVo8kMG2jQSF6nNgjLbhQdQr', '2019-07-26 15:48:46', '2019-07-26 17:02:55'),
(22, 'social/users/cover.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 't', 'اسامة المعمري', 'jkgiulhjn.', 'khni', 'k,[pk', '2019-07-30 17:28:46', 6, 1, 1, 0, 1, 1, 1, 'App\\Teacher', '87E2eUEJV1iVk2QqpW6KziEiC0y3QqCkkegdgUu1RcWClw01Qi9t0beEpqWq', '2019-07-27 17:32:31', '2019-07-27 18:14:17'),
(28, 'social/personal_image/R2djeY9nMOLSvtOD49alCKpHGkfqDONUBjiJZRFj.png', 'social/cover_image/3YxvvQfXYJLSrTnuBLMtD0eOZI9UWaYnx1sPj7yN.png', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'tttt', 'الاستاذ عبد الله', NULL, NULL, NULL, '2019-07-30 17:28:46', 9, 1, 1, 0, 1, 1, 1, 'App\\Teacher', 'MLolendtis6Qo8DkJutGbeRw9akOTTzfb7PweFwB8wylR9R2uROoXpbExwtB', '2019-07-28 07:19:33', '2019-07-28 07:22:01'),
(29, 'social/users/cover.jpg', 'social/users/cover.jpg', '$2y$10$9oyoN.i0rppO26a2wJElseOCuHkFlkf8QXRPKvrremwVGl3n4vXA6', 'ssss', 'الطالب يوسف', NULL, NULL, NULL, '2019-07-30 17:28:46', 26, 1, 0, 0, 1, 1, 1, 'App\\Student', 'h1DsQDB2c3e0XmFnuKXz3xIizmK8h8FHXzyRW3wurf4jIQtg7FFiZhMZXQPF', '2019-07-28 07:20:25', '2019-07-28 07:25:32'),
(30, 'social/users/cover.jpg', 'social/users/cover.jpg', '$2y$10$7TMo4/BfPi0Hdn3aMQHYHeQjLXiVcDukgHk0PByZu0YsBwBgHVuFS', '201600012119', 'مختار سيف يحيى العزكي', NULL, NULL, NULL, '2019-07-30 19:10:57', 11, 0, 1, 0, 1, 1, 1, 'App\\Student', NULL, '2019-07-30 16:10:57', '2019-07-30 16:10:57');

-- --------------------------------------------------------

--
-- بنية الجدول `user_blockeds`
--

CREATE TABLE `user_blockeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `member1_id` int(10) UNSIGNED NOT NULL,
  `member2_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `user_flowings`
--

CREATE TABLE `user_flowings` (
  `id` int(10) UNSIGNED NOT NULL,
  `member1_id` int(10) UNSIGNED NOT NULL,
  `member2_id` int(10) UNSIGNED NOT NULL,
  `request` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_flowings`
--

INSERT INTO `user_flowings` (`id`, `member1_id`, `member2_id`, `request`, `created_at`, `updated_at`) VALUES
(16, 13, 11, 0, '2019-07-17 16:11:54', '2019-07-17 16:11:54'),
(18, 3, 6, 1, '2019-07-17 20:55:22', '2019-07-17 20:56:26'),
(21, 4, 6, 1, '2019-07-26 11:11:08', '2019-07-26 15:39:14'),
(22, 4, 13, 1, '2019-07-26 11:11:09', '2019-07-26 11:11:09'),
(26, 5, 3, 1, '2019-07-26 14:44:09', '2019-07-26 14:44:09'),
(27, 3, 5, 1, '2019-07-26 14:52:06', '2019-07-26 14:52:06'),
(28, 3, 13, 1, '2019-07-26 14:52:07', '2019-07-26 14:52:07'),
(29, 3, 4, 1, '2019-07-26 14:52:51', '2019-07-26 14:52:51'),
(32, 4, 3, 1, '2019-07-26 14:53:23', '2019-07-26 14:53:23'),
(33, 16, 4, 1, '2019-07-26 14:53:25', '2019-07-26 14:53:25'),
(34, 16, 5, 1, '2019-07-26 14:53:26', '2019-07-26 14:53:26'),
(35, 16, 6, 1, '2019-07-26 14:53:26', '2019-07-26 15:39:13'),
(37, 4, 5, 1, '2019-07-26 14:54:16', '2019-07-26 14:54:16'),
(38, 4, 8, 1, '2019-07-26 14:54:18', '2019-07-26 14:54:18'),
(39, 4, 10, 1, '2019-07-26 14:54:20', '2019-07-26 14:54:20'),
(40, 16, 8, 1, '2019-07-26 14:54:53', '2019-07-26 14:54:53'),
(41, 3, 16, 1, '2019-07-26 14:54:53', '2019-07-26 14:54:53'),
(42, 16, 9, 1, '2019-07-26 14:55:02', '2019-07-26 14:55:02'),
(43, 16, 10, 1, '2019-07-26 14:55:15', '2019-07-26 14:55:15'),
(44, 16, 11, 0, '2019-07-26 14:55:16', '2019-07-26 14:55:16'),
(45, 16, 12, 1, '2019-07-26 14:55:17', '2019-07-26 14:55:17'),
(46, 18, 3, 1, '2019-07-26 15:01:50', '2019-07-26 15:01:50'),
(47, 18, 16, 1, '2019-07-26 15:02:05', '2019-07-26 15:02:05'),
(48, 18, 17, 1, '2019-07-26 15:02:09', '2019-07-26 15:02:09'),
(49, 18, 19, 1, '2019-07-26 15:02:10', '2019-07-26 15:02:10'),
(50, 18, 20, 1, '2019-07-26 15:02:14', '2019-07-26 15:02:14'),
(51, 17, 18, 1, '2019-07-26 15:06:16', '2019-07-26 15:06:16'),
(55, 19, 16, 1, '2019-07-26 15:06:30', '2019-07-26 15:06:30'),
(56, 19, 20, 1, '2019-07-26 15:06:33', '2019-07-26 15:06:33'),
(57, 17, 16, 1, '2019-07-26 15:06:34', '2019-07-26 15:06:34'),
(58, 17, 20, 1, '2019-07-26 15:06:36', '2019-07-26 15:06:36'),
(60, 19, 13, 1, '2019-07-26 15:06:38', '2019-07-26 15:06:38'),
(61, 19, 18, 1, '2019-07-26 15:08:52', '2019-07-26 15:08:52'),
(63, 19, 17, 1, '2019-07-26 15:08:55', '2019-07-26 15:08:55'),
(64, 17, 19, 1, '2019-07-26 15:09:48', '2019-07-26 15:09:48'),
(65, 17, 3, 1, '2019-07-26 15:09:56', '2019-07-26 15:09:56'),
(66, 20, 17, 1, '2019-07-26 15:13:52', '2019-07-26 15:13:52'),
(67, 20, 19, 1, '2019-07-26 15:13:53', '2019-07-26 15:13:53'),
(68, 20, 18, 1, '2019-07-26 15:13:55', '2019-07-26 15:13:55'),
(69, 20, 3, 1, '2019-07-26 15:14:01', '2019-07-26 15:14:01'),
(71, 16, 19, 1, '2019-07-26 15:18:53', '2019-07-26 15:18:53'),
(72, 16, 17, 1, '2019-07-26 15:18:55', '2019-07-26 15:18:55'),
(77, 16, 18, 1, '2019-07-26 15:25:46', '2019-07-26 15:25:46'),
(78, 16, 20, 1, '2019-07-26 15:32:29', '2019-07-26 15:32:29'),
(79, 16, 3, 1, '2019-07-26 15:32:37', '2019-07-26 15:32:37'),
(80, 16, 16, 1, '2019-07-26 15:32:40', '2019-07-26 15:32:40'),
(81, 19, 6, 1, '2019-07-26 15:38:17', '2019-07-26 15:39:12'),
(82, 6, 3, 1, '2019-07-26 15:39:04', '2019-07-26 15:39:04'),
(83, 6, 13, 1, '2019-07-26 15:39:06', '2019-07-26 15:39:06'),
(84, 6, 5, 1, '2019-07-26 15:39:46', '2019-07-26 15:39:46'),
(85, 6, 16, 1, '2019-07-26 15:40:07', '2019-07-26 15:40:07'),
(86, 6, 17, 1, '2019-07-26 15:40:13', '2019-07-26 15:40:13'),
(87, 6, 18, 1, '2019-07-26 15:40:15', '2019-07-26 15:40:15'),
(88, 6, 20, 1, '2019-07-26 15:40:19', '2019-07-26 15:40:19'),
(89, 6, 19, 1, '2019-07-26 15:40:27', '2019-07-26 15:40:27'),
(90, 16, 13, 1, '2019-07-26 15:43:41', '2019-07-26 15:43:41'),
(92, 21, 16, 1, '2019-07-26 15:53:33', '2019-07-26 15:53:33'),
(93, 21, 18, 1, '2019-07-26 15:53:37', '2019-07-26 15:53:37'),
(94, 21, 17, 1, '2019-07-26 15:53:39', '2019-07-26 15:53:39'),
(95, 21, 19, 1, '2019-07-26 15:53:42', '2019-07-26 15:53:42'),
(96, 21, 20, 1, '2019-07-26 15:53:46', '2019-07-26 15:53:46'),
(97, 17, 6, 0, '2019-07-26 15:54:04', '2019-07-26 15:54:04'),
(98, 17, 21, 1, '2019-07-26 15:54:10', '2019-07-26 15:54:10'),
(99, 19, 21, 1, '2019-07-26 15:54:47', '2019-07-26 15:54:47'),
(102, 17, 13, 1, '2019-07-26 16:32:25', '2019-07-26 16:33:05'),
(103, 22, 3, 1, '2019-07-27 17:38:24', '2019-07-27 17:38:24'),
(104, 22, 4, 1, '2019-07-27 17:38:33', '2019-07-27 17:38:33'),
(105, 22, 5, 1, '2019-07-27 17:38:48', '2019-07-27 17:38:48'),
(120, 28, 13, 0, '2019-07-28 07:24:06', '2019-07-28 07:24:06'),
(126, 13, 17, 1, '2019-07-30 12:36:08', '2019-07-30 12:36:08'),
(127, 13, 19, 1, '2019-07-30 12:36:10', '2019-07-30 12:36:10'),
(128, 13, 16, 1, '2019-07-30 12:36:11', '2019-07-30 12:36:11'),
(129, 13, 18, 1, '2019-07-30 12:36:13', '2019-07-30 12:36:13'),
(130, 13, 6, 0, '2019-07-30 12:36:15', '2019-07-30 12:36:15'),
(132, 13, 20, 1, '2019-07-30 12:38:05', '2019-07-30 12:38:05'),
(133, 13, 4, 1, '2019-07-30 13:00:21', '2019-07-30 13:00:21');

-- --------------------------------------------------------

--
-- بنية الجدول `years`
--

CREATE TABLE `years` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `isCurrent` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `years`
--

INSERT INTO `years` (`id`, `year`, `semester`, `isCurrent`, `created_at`, `updated_at`) VALUES
(1, '2019-2020', '1', 1, '2019-07-09 14:37:00', '2019-07-27 11:21:17'),
(2, '2018-2019', '1', 0, '2019-07-08 15:14:26', '2019-07-13 12:49:58'),
(3, '2021-2022', '1', 0, '2019-07-27 11:01:16', '2019-07-27 11:01:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advertising`
--
ALTER TABLE `advertising`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_study_course_id_foreign` (`study_course_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coumment_posts`
--
ALTER TABLE `coumment_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coumment_posts_post_id_foreign` (`post_id`),
  ADD KEY `coumment_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_study_course_id_foreign` (`study_course_id`);

--
-- Indexes for table `group_files`
--
ALTER TABLE `group_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_files_group_id_foreign` (`group_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_members_group_id_foreign` (`group_id`),
  ADD KEY `group_members_user_id_foreign` (`user_id`);

--
-- Indexes for table `imagenews`
--
ALTER TABLE `imagenews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenews_new_id_foreign` (`new_id`);

--
-- Indexes for table `image_posts`
--
ALTER TABLE `image_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_posts_post_id_foreign` (`post_id`);

--
-- Indexes for table `like_coumment_posts`
--
ALTER TABLE `like_coumment_posts`
  ADD PRIMARY KEY (`coumment_post_id`,`user_id`),
  ADD KEY `like_coumment_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `like_posts`
--
ALTER TABLE `like_posts`
  ADD PRIMARY KEY (`post_id`,`user_id`),
  ADD KEY `like_posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `like_post_groups`
--
ALTER TABLE `like_post_groups`
  ADD PRIMARY KEY (`post_id`,`user_id`),
  ADD KEY `like_post_groups_user_id_foreign` (`user_id`);

--
-- Indexes for table `maininfo`
--
ALTER TABLE `maininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_messagefrom_id_foreign` (`messageFrom_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationadmins`
--
ALTER TABLE `notificationadmins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificationadmins_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `notification_users`
--
ALTER TABLE `notification_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_users_user_id_foreign` (`user_id`),
  ADD KEY `notification_users_notification_id_foreign` (`notification_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_images`
--
ALTER TABLE `personal_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_images_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `reference_books`
--
ALTER TABLE `reference_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reference_books_study_course_id_foreign` (`study_course_id`);

--
-- Indexes for table `reply_coumments`
--
ALTER TABLE `reply_coumments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_coumments_coumment_post_id_foreign` (`coumment_post_id`),
  ADD KEY `reply_coumments_user_id_foreign` (`user_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_study_course_id_foreign` (`study_course_id`),
  ADD KEY `results_student_id_foreign` (`student_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution_assignments`
--
ALTER TABLE `solution_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solution_assignments_assignment_id_foreign` (`assignment_id`),
  ADD KEY `solution_assignments_student_id_foreign` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_acadimy_id_unique` (`acadimy_id`),
  ADD UNIQUE KEY `students_ssn_unique` (`ssn`),
  ADD KEY `students_department_id_foreign` (`department_id`);

--
-- Indexes for table `study_courses`
--
ALTER TABLE `study_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_courses_study_plan_id_foreign` (`study_plan_id`);

--
-- Indexes for table `study_plans`
--
ALTER TABLE `study_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_plans_department_id_foreign` (`department_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_acadimy_id_unique` (`acadimy_id`),
  ADD UNIQUE KEY `teachers_ssn_unique` (`ssn`);

--
-- Indexes for table `upgrades`
--
ALTER TABLE `upgrades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upgrades_admin_id_foreign` (`admin_id`),
  ADD KEY `upgrades_department_id_foreign` (`department_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_accounts_user_name_unique` (`user_name`);

--
-- Indexes for table `user_blockeds`
--
ALTER TABLE `user_blockeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_blockeds_member1_id_foreign` (`member1_id`);

--
-- Indexes for table `user_flowings`
--
ALTER TABLE `user_flowings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_flowings_member1_id_foreign` (`member1_id`),
  ADD KEY `user_flowings_member2_id_foreign` (`member2_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_year_unique` (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `advertising`
--
ALTER TABLE `advertising`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coumment_posts`
--
ALTER TABLE `coumment_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `group_files`
--
ALTER TABLE `group_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `imagenews`
--
ALTER TABLE `imagenews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `image_posts`
--
ALTER TABLE `image_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `maininfo`
--
ALTER TABLE `maininfo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notificationadmins`
--
ALTER TABLE `notificationadmins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_users`
--
ALTER TABLE `notification_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_images`
--
ALTER TABLE `personal_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `reference_books`
--
ALTER TABLE `reference_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reply_coumments`
--
ALTER TABLE `reply_coumments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `solution_assignments`
--
ALTER TABLE `solution_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `study_courses`
--
ALTER TABLE `study_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `study_plans`
--
ALTER TABLE `study_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `upgrades`
--
ALTER TABLE `upgrades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_blockeds`
--
ALTER TABLE `user_blockeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_flowings`
--
ALTER TABLE `user_flowings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_study_course_id_foreign` FOREIGN KEY (`study_course_id`) REFERENCES `study_courses` (`id`);

--
-- القيود للجدول `coumment_posts`
--
ALTER TABLE `coumment_posts`
  ADD CONSTRAINT `coumment_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `coumment_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_study_course_id_foreign` FOREIGN KEY (`study_course_id`) REFERENCES `study_courses` (`id`);

--
-- القيود للجدول `group_files`
--
ALTER TABLE `group_files`
  ADD CONSTRAINT `group_files_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- القيود للجدول `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `group_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `imagenews`
--
ALTER TABLE `imagenews`
  ADD CONSTRAINT `imagenews_new_id_foreign` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`);

--
-- القيود للجدول `image_posts`
--
ALTER TABLE `image_posts`
  ADD CONSTRAINT `image_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- القيود للجدول `like_coumment_posts`
--
ALTER TABLE `like_coumment_posts`
  ADD CONSTRAINT `like_coumment_posts_coumment_post_id_foreign` FOREIGN KEY (`coumment_post_id`) REFERENCES `coumment_posts` (`id`),
  ADD CONSTRAINT `like_coumment_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `like_posts`
--
ALTER TABLE `like_posts`
  ADD CONSTRAINT `like_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `like_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `like_post_groups`
--
ALTER TABLE `like_post_groups`
  ADD CONSTRAINT `like_post_groups_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `like_post_groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_messagefrom_id_foreign` FOREIGN KEY (`messageFrom_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `notificationadmins`
--
ALTER TABLE `notificationadmins`
  ADD CONSTRAINT `notificationadmins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- القيود للجدول `notification_users`
--
ALTER TABLE `notification_users`
  ADD CONSTRAINT `notification_users_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notificationadmins` (`id`),
  ADD CONSTRAINT `notification_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `personal_images`
--
ALTER TABLE `personal_images`
  ADD CONSTRAINT `personal_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `reference_books`
--
ALTER TABLE `reference_books`
  ADD CONSTRAINT `reference_books_study_course_id_foreign` FOREIGN KEY (`study_course_id`) REFERENCES `study_courses` (`id`);

--
-- القيود للجدول `reply_coumments`
--
ALTER TABLE `reply_coumments`
  ADD CONSTRAINT `reply_coumments_coumment_post_id_foreign` FOREIGN KEY (`coumment_post_id`) REFERENCES `coumment_posts` (`id`),
  ADD CONSTRAINT `reply_coumments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `results_study_course_id_foreign` FOREIGN KEY (`study_course_id`) REFERENCES `study_courses` (`id`);

--
-- القيود للجدول `solution_assignments`
--
ALTER TABLE `solution_assignments`
  ADD CONSTRAINT `solution_assignments_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`),
  ADD CONSTRAINT `solution_assignments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- القيود للجدول `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- القيود للجدول `study_courses`
--
ALTER TABLE `study_courses`
  ADD CONSTRAINT `study_courses_study_plan_id_foreign` FOREIGN KEY (`study_plan_id`) REFERENCES `study_plans` (`id`);

--
-- القيود للجدول `study_plans`
--
ALTER TABLE `study_plans`
  ADD CONSTRAINT `study_plans_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- القيود للجدول `upgrades`
--
ALTER TABLE `upgrades`
  ADD CONSTRAINT `upgrades_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `upgrades_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- القيود للجدول `user_blockeds`
--
ALTER TABLE `user_blockeds`
  ADD CONSTRAINT `user_blockeds_member1_id_foreign` FOREIGN KEY (`member1_id`) REFERENCES `user_accounts` (`id`);

--
-- القيود للجدول `user_flowings`
--
ALTER TABLE `user_flowings`
  ADD CONSTRAINT `user_flowings_member1_id_foreign` FOREIGN KEY (`member1_id`) REFERENCES `user_accounts` (`id`),
  ADD CONSTRAINT `user_flowings_member2_id_foreign` FOREIGN KEY (`member2_id`) REFERENCES `user_accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
