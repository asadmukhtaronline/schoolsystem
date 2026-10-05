-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2025 at 04:19 PM
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
-- Database: `schooling`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `total_marks` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `creator_name` varchar(255) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `branch_id`, `title`, `description`, `total_marks`, `due_date`, `reference`, `class_id`, `section_id`, `creator_name`, `teacher_id`, `subject_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, 'Create Login System In php', 'English is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', '10', '2025-08-31', 'https://chatgpt.com/', 4, 2, 'Asad Mukhtar', 5, 13, 0, '2025-08-11 09:27:08', '2025-08-11 09:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `assignpermissions`
--

CREATE TABLE `assignpermissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignpermissions`
--

INSERT INTO `assignpermissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(47, 1, 2, '2024-07-15 09:50:47', '2024-07-15 09:50:47'),
(48, 1, 3, '2024-07-15 09:50:47', '2024-07-15 09:50:47'),
(49, 1, 4, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(50, 1, 5, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(51, 1, 6, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(52, 1, 7, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(53, 1, 8, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(54, 1, 9, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(55, 1, 10, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(56, 1, 11, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(57, 1, 12, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(58, 1, 13, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(59, 1, 14, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(60, 1, 15, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(61, 1, 16, '2024-07-15 09:50:48', '2024-07-15 09:50:48'),
(62, 1, 17, '2024-07-15 09:50:49', '2024-07-15 09:50:49'),
(63, 1, 18, '2024-07-15 09:50:49', '2024-07-15 09:50:49'),
(64, 3, 2, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(65, 3, 3, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(66, 3, 4, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(67, 3, 5, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(68, 3, 6, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(69, 3, 7, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(70, 3, 8, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(71, 3, 9, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(72, 3, 10, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(73, 3, 11, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(74, 3, 12, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(75, 3, 13, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(76, 3, 14, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(77, 3, 15, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(78, 3, 16, '2025-01-22 05:50:23', '2025-01-22 05:50:23'),
(79, 3, 18, '2025-01-22 05:50:23', '2025-01-22 05:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `assignsections`
--

CREATE TABLE `assignsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignsubjects`
--

CREATE TABLE `assignsubjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignsubjects`
--

INSERT INTO `assignsubjects` (`id`, `branch_id`, `year_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(12, NULL, 4, 9, '2025-08-11 07:52:35', '2025-08-11 07:52:35'),
(13, NULL, 4, 10, '2025-08-11 07:52:35', '2025-08-11 07:52:35'),
(14, NULL, 4, 11, '2025-08-11 07:52:35', '2025-08-11 07:52:35'),
(15, NULL, 4, 13, '2025-08-11 07:52:35', '2025-08-11 07:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `assignteachers`
--

CREATE TABLE `assignteachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignteachers`
--

INSERT INTO `assignteachers` (`id`, `branch_id`, `teacher_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(6, NULL, 5, 13, '2025-08-11 07:56:07', '2025-08-11 07:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `assigntimes`
--

CREATE TABLE `assigntimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `timetable_id` varchar(255) DEFAULT NULL,
  `day_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendences`
--

CREATE TABLE `attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `enrollment_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `year_id` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `current_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendences`
--

INSERT INTO `attendences` (`id`, `branch_id`, `student_id`, `enrollment_id`, `section_id`, `year_id`, `status`, `current_date`, `created_at`, `updated_at`) VALUES
(1, NULL, '4', '4', '2', '4', 1, '2025-08-11', '2025-08-11 09:24:43', '2025-08-11 09:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `campus_name` varchar(255) DEFAULT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `alternative_contact` varchar(255) DEFAULT NULL,
  `address` varchar(1024) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT 1,
  `principal_city` varchar(255) DEFAULT NULL,
  `principal_country` varchar(255) DEFAULT NULL,
  `photo` varchar(350) DEFAULT NULL,
  `principal_photo` varchar(191) DEFAULT NULL,
  `principal_email` varchar(191) DEFAULT NULL,
  `principal_whatsapp` varchar(191) DEFAULT NULL,
  `principal_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `campus_name`, `landline`, `location`, `city`, `country`, `fullname`, `email`, `whatsapp`, `alternative_contact`, `address`, `type`, `principal_city`, `principal_country`, `photo`, `principal_photo`, `principal_email`, `principal_whatsapp`, `principal_address`, `created_at`, `updated_at`) VALUES
(20, 'Aims School', 'Main Branch', '04112345666', 'Opposite to zainabia hospital main multan road lahore', 'Lahore', 'pakistan', 'Asad Mukhtar', NULL, NULL, '', NULL, 1, 'Lahore', 'pakistan', NULL, 'photos/principal/eBX2VvqjPwHM0LcTIBMMIXoBnAdPTy6ScLRIrjQR.jpg', 'axad03213@gmail.com', '00000000000', 'opposite to zainabia hosiptal main multan road lahore', '2025-08-11 07:24:36', '2025-08-11 07:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tracker` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `title`, `created_at`, `updated_at`) VALUES
(15, 'Monday', '2025-01-17 06:05:23', '2025-01-17 06:05:23'),
(16, 'Tuesday', '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(17, 'Wendesday', '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(18, 'Thursday', '2025-01-17 06:05:47', '2025-01-17 06:05:47'),
(19, 'Friday', '2025-01-17 06:05:55', '2025-01-17 06:05:55'),
(20, 'Saturday', '2025-01-17 06:06:02', '2025-01-17 06:06:02'),
(21, 'Sunday', '2025-01-17 06:06:08', '2025-01-17 06:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `year_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `fee` varchar(255) DEFAULT NULL,
  `fee_date` varchar(255) DEFAULT NULL,
  `admission_fee` varchar(255) DEFAULT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `rollnumber` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `branch_id`, `student_id`, `year_id`, `section_id`, `fee`, `fee_date`, `admission_fee`, `admission_date`, `rollnumber`, `status`, `created_at`, `updated_at`) VALUES
(4, 20, '4', '4', '2', '5000', '10', '10000', '1111/0808/25252525', 'AS-1Y-1', NULL, '2025-08-11 09:22:10', '2025-08-11 09:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `enrollment_id` varchar(255) DEFAULT NULL,
  `fee` varchar(255) DEFAULT NULL,
  `fee_date` date DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `paymethod` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `recipe` varchar(1000) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `branch_id`, `student_id`, `enrollment_id`, `fee`, `fee_date`, `admission_date`, `paymethod`, `status`, `recipe`, `order_id`, `created_at`, `updated_at`) VALUES
(7, 20, '4', '4', '5000', '2025-08-11', '2025-08-11', 'Jazzcash', '1', 'Hafiz Shahzad Ali-7-AS-1Y-1.pdf', '0001', '2025-08-11 09:22:10', '2025-08-11 09:22:38'),
(8, 20, '4', '4', '5000', '2025-09-10', NULL, NULL, NULL, NULL, '0002', '2025-08-11 09:22:35', '2025-08-11 09:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `post_code` varchar(191) DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `code`, `photo`, `name`, `email`, `whatsapp`, `landline`, `website`, `address`, `city`, `state`, `country`, `post_code`, `branch_id`, `created_at`, `updated_at`) VALUES
(9, 'AS', 'photos/rp2ZqFh7kCAga8kuHotT9gI2MKNw4Rrq85VYpSpm.png', 'Aims School', 'aims.lahore@gmail.com', '03374969039', '04112345666', 'https://webeducatorz.org/', 'Opposite to zainabia hospital main multan road lahore', 'Lahore', 'punjab', 'pakistan', '54000', NULL, '2025-08-11 07:24:36', '2025-08-11 07:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url_slug` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `url_slug`, `route_name`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', 'admin', '2024-06-24 09:35:29', '2024-06-24 09:35:29'),
(3, ' subjects', 'subjects', 'subjects', '2024-06-24 09:36:11', '2024-06-24 09:36:11'),
(4, ' classes', 'classes', 'classes', '2024-06-24 09:36:31', '2024-06-24 09:36:31'),
(5, ' attendance', 'attendance', 'attendance', '2024-06-24 09:36:49', '2024-06-24 09:36:49'),
(6, ' teachers', 'teachers', 'teachers', '2024-06-24 09:37:00', '2024-06-24 09:37:00'),
(7, 'staff', 'staff', 'staff', '2024-06-24 09:37:48', '2024-06-24 09:37:48'),
(8, ' students', 'students', 'students', '2024-06-24 09:38:04', '2024-06-24 09:38:04'),
(9, ' accounts', 'accounts', 'accounts', '2024-06-24 09:38:18', '2024-06-24 09:38:18'),
(10, ' profile', 'profile', 'profile', '2024-06-24 09:38:37', '2024-06-24 09:38:37'),
(11, ' timetable', 'timetable', 'timetable', '2024-06-24 09:40:07', '2024-06-24 09:40:07'),
(12, ' complain', 'complain', 'complain', '2024-06-24 09:40:19', '2024-06-24 09:40:19'),
(13, ' users', 'users', 'users', '2024-06-24 09:40:29', '2024-06-24 09:40:29'),
(14, ' school', 'school', 'school', '2024-06-24 09:40:47', '2024-06-24 09:40:47'),
(15, ' quiz', 'quiz', 'quiz', '2024-06-24 09:41:08', '2024-06-24 09:41:08'),
(16, 'dashboard', 'dashboard', 'dashboard', '2024-06-24 09:46:23', '2024-06-24 09:46:23'),
(17, 'branches', 'branches', 'branches', '2024-06-25 08:09:28', '2024-06-25 08:09:28'),
(18, 'assignments', 'assignments', 'assignments', '2024-07-15 09:50:32', '2024-07-15 09:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `alternative_contact` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `religious` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profilestaffs`
--

CREATE TABLE `profilestaffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profileteachers`
--

CREATE TABLE `profileteachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questioncategories`
--

CREATE TABLE `questioncategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questioncategories`
--

INSERT INTO `questioncategories` (`id`, `branch_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 20, 'Subjective And Objective ', '2025-08-11 09:34:11', '2025-08-11 09:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `quiz_id` varchar(255) DEFAULT NULL,
  `options` varchar(255) DEFAULT NULL,
  `question_no` varchar(191) DEFAULT NULL,
  `subjective_questions` varchar(255) DEFAULT NULL,
  `question_category` varchar(255) DEFAULT NULL,
  `obtained_marks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `branch_id`, `title`, `quiz_id`, `options`, `question_no`, `subjective_questions`, `question_category`, `obtained_marks`, `created_at`, `updated_at`) VALUES
(1, 20, 'What is computer', '1', '0', '1', NULL, 'Subjective', '5', '2025-08-11 09:40:00', '2025-08-11 09:40:00'),
(2, 20, 'What Is CPU?', '1', '0', '2', NULL, 'Subjective', '5', '2025-08-11 09:40:38', '2025-08-11 09:40:38'),
(3, 20, 'Which part of the computer is considered the \"brain\"?', '1', '4', '3', NULL, 'Objective', '1', '2025-08-11 09:42:09', '2025-08-11 09:42:09'),
(4, 20, 'What does RAM stand for?', '1', '4', '4', NULL, 'Objective', '1', '2025-08-11 09:43:00', '2025-08-11 09:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `quizanswers`
--

CREATE TABLE `quizanswers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `quiz_id` varchar(255) DEFAULT NULL,
  `question_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizanswers`
--

INSERT INTO `quizanswers` (`id`, `branch_id`, `title`, `quiz_id`, `question_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, 'Hard Disk', '1', '3', '0', '2025-08-11 09:42:09', '2025-08-11 09:42:09'),
(2, 20, 'CPU', '1', '3', '1', '2025-08-11 09:42:09', '2025-08-11 09:42:09'),
(3, 20, 'RAM', '1', '3', '0', '2025-08-11 09:42:09', '2025-08-11 09:42:09'),
(4, 20, 'Monitor', '1', '3', '0', '2025-08-11 09:42:09', '2025-08-11 09:42:09'),
(5, 20, 'Random Access Memory', '1', '4', '1', '2025-08-11 09:43:00', '2025-08-11 09:43:00'),
(6, 20, 'Read Access Memory', '1', '4', '0', '2025-08-11 09:43:00', '2025-08-11 09:43:00'),
(7, 20, 'Ready Application Module', '1', '4', '0', '2025-08-11 09:43:00', '2025-08-11 09:43:00'),
(8, 20, 'Run Access Mode', '1', '4', '0', '2025-08-11 09:43:00', '2025-08-11 09:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `teacher_id` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `no_of_questions` varchar(255) DEFAULT NULL,
  `subjective_questions` varchar(255) DEFAULT NULL,
  `objective_questions` varchar(255) DEFAULT NULL,
  `total_marks` varchar(255) DEFAULT NULL,
  `pass_marks_percentage` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `branch_id`, `title`, `teacher_id`, `due_date`, `description`, `class_id`, `section_id`, `no_of_questions`, `subjective_questions`, `objective_questions`, `total_marks`, `pass_marks_percentage`, `status`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 20, 'Computer Sciences Chapter 1', '5', '2025-08-31', 'English is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds', '4', '2', '12', '2', '10', '20', '50', NULL, '13', '2025-08-11 09:36:52', '2025-08-11 09:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Full Access', '2024-06-24 09:19:17', '2024-06-24 09:19:17'),
(3, 'Branch Manager', 'Branch Access', '2025-01-22 05:49:45', '2025-01-22 05:49:45'),
(4, 'Coordinator', '1', '2025-08-11 09:19:12', '2025-08-11 09:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `sectiondetails`
--

CREATE TABLE `sectiondetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `branch_id`, `year_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 'Section A', 20, 4, 5, '2025-08-11 07:57:54', '2025-08-11 07:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `sectiontimeslots`
--

CREATE TABLE `sectiontimeslots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sectiontimetable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `timetable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `timeslot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectiontimeslots`
--

INSERT INTO `sectiontimeslots` (`id`, `branch_id`, `section_id`, `sectiontimetable_id`, `timetable_id`, `timeslot_id`, `day_id`, `created_at`, `updated_at`) VALUES
(6, 20, 2, 6, 349, 37, 15, '2025-08-11 07:59:02', '2025-08-11 07:59:18'),
(7, 20, 2, 6, 373, 37, 16, '2025-08-11 07:59:02', '2025-08-11 07:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `sectiontimetables`
--

CREATE TABLE `sectiontimetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectiontimetables`
--

INSERT INTO `sectiontimetables` (`id`, `branch_id`, `section_id`, `subject_id`, `year_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(4, 20, 2, 9, 4, NULL, '2025-08-11 07:58:10', '2025-08-11 07:58:10'),
(5, 20, 2, 10, 4, NULL, '2025-08-11 07:58:42', '2025-08-11 07:58:42'),
(6, 20, 2, 13, 4, 5, '2025-08-11 07:58:47', '2025-08-11 07:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffcategories`
--

CREATE TABLE `staffcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stafs`
--

CREATE TABLE `stafs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `stafcategory_id` varchar(255) DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stuassignments`
--

CREATE TABLE `stuassignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `assignment_id` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `enrollment_id` varchar(255) DEFAULT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `obtain` varchar(191) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stuassignments`
--

INSERT INTO `stuassignments` (`id`, `branch_id`, `class_id`, `section_id`, `assignment_id`, `subject_id`, `enrollment_id`, `upload`, `marks`, `due_date`, `obtain`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '4', '2', '1', '13', '4', NULL, NULL, '2025-08-31', '7', 'assignment/1754923680.pdf', '1', '2025-08-11 09:27:08', '2025-08-11 09:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `studentaccounts`
--

CREATE TABLE `studentaccounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `enrollment_id` varchar(255) DEFAULT NULL,
  `fee_id` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `fee_date` varchar(255) DEFAULT NULL,
  `paymethod` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `current_address` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `admission_fee` varchar(255) DEFAULT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `monthly_fee` varchar(255) DEFAULT NULL,
  `fee_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `photo`, `name`, `parent_name`, `gender`, `current_address`, `street_address`, `city`, `region`, `postal`, `country`, `phone`, `email`, `branch_id`, `year_id`, `section_id`, `user_id`, `admission_fee`, `admission_date`, `monthly_fee`, `fee_date`, `created_at`, `updated_at`) VALUES
(4, '1754922130.jpg', 'Hafiz Shahzad Ali', 'Muhammad Shareef', 'Male', 'Lahore , Pakistan', 'Zainbia hospital main multan road lahore', 'Lahore', 'Punjab', '54000', 'Pakistan', '00000000000', 'hafiz.shahzadali02@gmail.com', 20, '4', '2', '53', '10000', '2025-08-11', '5000', '10', '2025-08-11 09:22:10', '2025-08-11 09:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `stuquizzes`
--

CREATE TABLE `stuquizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quiz_id` varchar(255) DEFAULT NULL,
  `section_id` varchar(255) DEFAULT NULL,
  `class_id` varchar(255) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `enrollment_id` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stuquizzes`
--

INSERT INTO `stuquizzes` (`id`, `branch_id`, `quiz_id`, `section_id`, `class_id`, `subject_id`, `enrollment_id`, `marks`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', '2', '4', '13', '4', NULL, NULL, '2025-08-11 09:36:52', '2025-08-11 09:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `branch_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(9, 20, 'English', 'English is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', '1754916287.png', '2025-08-11 07:44:47', '2025-08-11 07:44:47'),
(10, 20, 'Urdu', 'Urdu is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', '1754916407.png', '2025-08-11 07:46:47', '2025-08-11 07:46:47'),
(11, 20, 'Chemistry', 'Chemistry is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', '1754916527.jpg', '2025-08-11 07:48:47', '2025-08-11 07:48:47'),
(12, 20, 'Biology', 'Biology is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', '1754916546.jpg', '2025-08-11 07:49:06', '2025-08-11 07:49:06'),
(13, 20, 'Computer Sciences', 'Computer is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', '1754916568.jpg', '2025-08-11 07:49:28', '2025-08-11 07:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `contract` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `father_name`, `cnic`, `whatsapp`, `description`, `address`, `user_id`, `picture`, `dob`, `contract`, `gender`, `branch_id`, `created_at`, `updated_at`) VALUES
(5, 'Muhammad Rehan', 'rehan.ali9449073@gmail.com', 'Lutaf Ali', '0000000000000', '03374969039', 'Rehan is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', 'opposite to zainaia hopistal main multan road lahore', '52', '1754916967.jpg', '2024-08-21', '1754916967.pdf', 'Male', 20, '2025-08-11 07:56:07', '2025-08-11 07:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `teacherslots`
--

CREATE TABLE `teacherslots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `timetable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacherslots`
--

INSERT INTO `teacherslots` (`id`, `branch_id`, `teacher_id`, `timetable_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 337, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(2, NULL, 2, 338, '1', '2025-01-22 06:30:34', '2025-01-22 06:33:14'),
(3, NULL, 2, 339, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(4, NULL, 2, 340, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(5, NULL, 2, 341, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(6, NULL, 2, 342, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(7, NULL, 2, 343, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(8, NULL, 2, 344, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(9, NULL, 2, 345, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(10, NULL, 2, 346, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(11, NULL, 2, 347, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(12, NULL, 2, 348, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(13, NULL, 2, 349, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(14, NULL, 2, 350, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(15, NULL, 2, 351, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(16, NULL, 2, 352, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(17, NULL, 2, 353, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(18, NULL, 2, 354, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(19, NULL, 2, 355, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(20, NULL, 2, 356, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(21, NULL, 2, 357, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(22, NULL, 2, 358, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(23, NULL, 2, 359, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(24, NULL, 2, 360, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(25, NULL, 2, 361, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(26, NULL, 2, 362, '1', '2025-01-22 06:30:34', '2025-01-22 06:33:20'),
(27, NULL, 2, 363, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(28, NULL, 2, 364, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(29, NULL, 2, 365, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(30, NULL, 2, 366, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(31, NULL, 2, 367, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(32, NULL, 2, 368, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(33, NULL, 2, 369, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(34, NULL, 2, 370, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(35, NULL, 2, 371, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(36, NULL, 2, 372, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(37, NULL, 2, 373, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(38, NULL, 2, 374, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(39, NULL, 2, 375, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(40, NULL, 2, 376, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(41, NULL, 2, 377, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(42, NULL, 2, 378, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(43, NULL, 2, 379, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(44, NULL, 2, 380, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(45, NULL, 2, 381, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(46, NULL, 2, 382, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(47, NULL, 2, 383, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(48, NULL, 2, 384, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(49, NULL, 2, 385, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(50, NULL, 2, 386, '1', '2025-01-22 06:30:34', '2025-01-22 06:33:23'),
(51, NULL, 2, 387, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(52, NULL, 2, 388, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(53, NULL, 2, 389, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(54, NULL, 2, 390, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(55, NULL, 2, 391, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(56, NULL, 2, 392, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(57, NULL, 2, 393, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(58, NULL, 2, 394, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(59, NULL, 2, 395, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(60, NULL, 2, 396, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(61, NULL, 2, 397, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(62, NULL, 2, 398, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(63, NULL, 2, 399, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(64, NULL, 2, 400, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(65, NULL, 2, 401, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(66, NULL, 2, 402, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(67, NULL, 2, 403, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(68, NULL, 2, 404, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(69, NULL, 2, 405, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(70, NULL, 2, 406, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(71, NULL, 2, 407, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(72, NULL, 2, 408, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(73, NULL, 2, 409, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(74, NULL, 2, 410, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(75, NULL, 2, 411, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(76, NULL, 2, 412, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(77, NULL, 2, 413, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(78, NULL, 2, 414, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(79, NULL, 2, 415, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(80, NULL, 2, 416, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(81, NULL, 2, 417, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(82, NULL, 2, 418, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(83, NULL, 2, 419, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(84, NULL, 2, 420, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(85, NULL, 2, 421, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(86, NULL, 2, 422, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(87, NULL, 2, 423, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(88, NULL, 2, 424, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(89, NULL, 2, 425, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(90, NULL, 2, 426, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(91, NULL, 2, 427, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(92, NULL, 2, 428, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(93, NULL, 2, 429, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(94, NULL, 2, 430, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(95, NULL, 2, 431, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(96, NULL, 2, 432, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(97, NULL, 2, 433, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(98, NULL, 2, 434, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(99, NULL, 2, 435, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(100, NULL, 2, 436, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(101, NULL, 2, 437, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(102, NULL, 2, 438, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(103, NULL, 2, 439, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(104, NULL, 2, 440, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(105, NULL, 2, 441, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(106, NULL, 2, 442, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(107, NULL, 2, 443, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(108, NULL, 2, 444, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(109, NULL, 2, 445, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(110, NULL, 2, 446, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(111, NULL, 2, 447, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(112, NULL, 2, 448, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(113, NULL, 2, 449, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(114, NULL, 2, 450, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(115, NULL, 2, 451, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(116, NULL, 2, 452, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(117, NULL, 2, 453, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(118, NULL, 2, 454, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(119, NULL, 2, 455, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(120, NULL, 2, 456, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(121, NULL, 2, 457, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(122, NULL, 2, 458, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(123, NULL, 2, 459, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(124, NULL, 2, 460, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(125, NULL, 2, 461, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(126, NULL, 2, 462, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(127, NULL, 2, 463, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(128, NULL, 2, 464, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(129, NULL, 2, 465, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(130, NULL, 2, 466, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(131, NULL, 2, 467, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(132, NULL, 2, 468, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(133, NULL, 2, 469, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(134, NULL, 2, 470, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(135, NULL, 2, 471, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(136, NULL, 2, 472, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(137, NULL, 2, 473, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(138, NULL, 2, 474, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(139, NULL, 2, 475, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(140, NULL, 2, 476, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(141, NULL, 2, 477, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(142, NULL, 2, 478, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(143, NULL, 2, 479, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(144, NULL, 2, 480, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(145, NULL, 2, 481, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(146, NULL, 2, 482, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(147, NULL, 2, 483, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(148, NULL, 2, 484, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(149, NULL, 2, 485, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(150, NULL, 2, 486, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(151, NULL, 2, 487, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(152, NULL, 2, 488, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(153, NULL, 2, 489, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(154, NULL, 2, 490, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(155, NULL, 2, 491, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(156, NULL, 2, 492, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(157, NULL, 2, 493, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(158, NULL, 2, 494, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(159, NULL, 2, 495, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(160, NULL, 2, 496, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(161, NULL, 2, 497, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(162, NULL, 2, 498, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(163, NULL, 2, 499, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(164, NULL, 2, 500, '0', '2025-01-22 06:30:34', '2025-01-22 06:30:34'),
(165, NULL, 2, 501, '0', '2025-01-22 06:30:35', '2025-01-22 06:30:35'),
(166, NULL, 2, 502, '0', '2025-01-22 06:30:35', '2025-01-22 06:30:35'),
(167, NULL, 2, 503, '0', '2025-01-22 06:30:35', '2025-01-22 06:30:35'),
(168, NULL, 2, 504, '0', '2025-01-22 06:30:35', '2025-01-22 06:30:35'),
(169, NULL, 3, 337, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(170, NULL, 3, 338, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(171, NULL, 3, 339, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(172, NULL, 3, 340, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(173, NULL, 3, 341, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(174, NULL, 3, 342, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(175, NULL, 3, 343, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(176, NULL, 3, 344, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(177, NULL, 3, 345, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(178, NULL, 3, 346, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(179, NULL, 3, 347, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(180, NULL, 3, 348, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(181, NULL, 3, 349, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(182, NULL, 3, 350, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(183, NULL, 3, 351, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(184, NULL, 3, 352, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(185, NULL, 3, 353, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(186, NULL, 3, 354, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(187, NULL, 3, 355, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(188, NULL, 3, 356, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(189, NULL, 3, 357, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(190, NULL, 3, 358, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(191, NULL, 3, 359, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(192, NULL, 3, 360, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(193, NULL, 3, 361, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(194, NULL, 3, 362, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(195, NULL, 3, 363, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(196, NULL, 3, 364, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(197, NULL, 3, 365, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(198, NULL, 3, 366, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(199, NULL, 3, 367, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(200, NULL, 3, 368, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(201, NULL, 3, 369, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(202, NULL, 3, 370, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(203, NULL, 3, 371, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(204, NULL, 3, 372, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(205, NULL, 3, 373, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(206, NULL, 3, 374, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(207, NULL, 3, 375, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(208, NULL, 3, 376, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(209, NULL, 3, 377, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(210, NULL, 3, 378, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(211, NULL, 3, 379, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(212, NULL, 3, 380, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(213, NULL, 3, 381, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(214, NULL, 3, 382, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(215, NULL, 3, 383, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(216, NULL, 3, 384, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(217, NULL, 3, 385, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(218, NULL, 3, 386, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(219, NULL, 3, 387, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(220, NULL, 3, 388, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(221, NULL, 3, 389, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(222, NULL, 3, 390, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(223, NULL, 3, 391, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(224, NULL, 3, 392, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(225, NULL, 3, 393, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(226, NULL, 3, 394, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(227, NULL, 3, 395, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(228, NULL, 3, 396, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(229, NULL, 3, 397, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(230, NULL, 3, 398, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(231, NULL, 3, 399, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(232, NULL, 3, 400, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(233, NULL, 3, 401, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(234, NULL, 3, 402, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(235, NULL, 3, 403, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(236, NULL, 3, 404, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(237, NULL, 3, 405, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(238, NULL, 3, 406, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(239, NULL, 3, 407, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(240, NULL, 3, 408, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(241, NULL, 3, 409, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(242, NULL, 3, 410, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(243, NULL, 3, 411, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(244, NULL, 3, 412, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(245, NULL, 3, 413, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(246, NULL, 3, 414, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(247, NULL, 3, 415, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(248, NULL, 3, 416, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(249, NULL, 3, 417, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(250, NULL, 3, 418, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(251, NULL, 3, 419, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(252, NULL, 3, 420, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(253, NULL, 3, 421, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(254, NULL, 3, 422, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(255, NULL, 3, 423, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(256, NULL, 3, 424, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(257, NULL, 3, 425, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(258, NULL, 3, 426, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(259, NULL, 3, 427, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(260, NULL, 3, 428, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(261, NULL, 3, 429, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(262, NULL, 3, 430, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(263, NULL, 3, 431, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(264, NULL, 3, 432, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(265, NULL, 3, 433, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(266, NULL, 3, 434, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(267, NULL, 3, 435, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(268, NULL, 3, 436, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(269, NULL, 3, 437, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(270, NULL, 3, 438, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(271, NULL, 3, 439, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(272, NULL, 3, 440, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(273, NULL, 3, 441, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(274, NULL, 3, 442, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(275, NULL, 3, 443, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(276, NULL, 3, 444, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(277, NULL, 3, 445, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(278, NULL, 3, 446, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(279, NULL, 3, 447, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(280, NULL, 3, 448, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(281, NULL, 3, 449, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(282, NULL, 3, 450, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(283, NULL, 3, 451, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(284, NULL, 3, 452, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(285, NULL, 3, 453, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(286, NULL, 3, 454, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(287, NULL, 3, 455, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(288, NULL, 3, 456, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(289, NULL, 3, 457, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(290, NULL, 3, 458, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(291, NULL, 3, 459, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(292, NULL, 3, 460, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(293, NULL, 3, 461, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(294, NULL, 3, 462, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(295, NULL, 3, 463, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(296, NULL, 3, 464, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(297, NULL, 3, 465, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(298, NULL, 3, 466, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(299, NULL, 3, 467, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(300, NULL, 3, 468, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(301, NULL, 3, 469, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(302, NULL, 3, 470, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(303, NULL, 3, 471, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(304, NULL, 3, 472, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(305, NULL, 3, 473, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(306, NULL, 3, 474, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(307, NULL, 3, 475, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(308, NULL, 3, 476, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(309, NULL, 3, 477, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(310, NULL, 3, 478, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(311, NULL, 3, 479, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(312, NULL, 3, 480, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(313, NULL, 3, 481, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(314, NULL, 3, 482, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(315, NULL, 3, 483, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(316, NULL, 3, 484, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(317, NULL, 3, 485, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(318, NULL, 3, 486, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(319, NULL, 3, 487, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(320, NULL, 3, 488, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(321, NULL, 3, 489, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(322, NULL, 3, 490, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(323, NULL, 3, 491, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(324, NULL, 3, 492, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(325, NULL, 3, 493, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(326, NULL, 3, 494, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(327, NULL, 3, 495, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(328, NULL, 3, 496, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(329, NULL, 3, 497, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(330, NULL, 3, 498, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(331, NULL, 3, 499, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(332, NULL, 3, 500, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(333, NULL, 3, 501, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(334, NULL, 3, 502, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(335, NULL, 3, 503, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(336, NULL, 3, 504, '0', '2025-01-22 06:36:14', '2025-01-22 06:36:14'),
(337, NULL, 4, 337, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(338, NULL, 4, 338, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(339, NULL, 4, 339, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(340, NULL, 4, 340, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(341, NULL, 4, 341, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(342, NULL, 4, 342, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(343, NULL, 4, 343, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(344, NULL, 4, 344, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(345, NULL, 4, 345, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(346, NULL, 4, 346, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(347, NULL, 4, 347, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(348, NULL, 4, 348, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(349, NULL, 4, 349, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(350, NULL, 4, 350, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(351, NULL, 4, 351, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(352, NULL, 4, 352, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(353, NULL, 4, 353, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(354, NULL, 4, 354, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(355, NULL, 4, 355, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(356, NULL, 4, 356, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(357, NULL, 4, 357, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(358, NULL, 4, 358, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(359, NULL, 4, 359, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(360, NULL, 4, 360, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(361, NULL, 4, 361, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(362, NULL, 4, 362, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(363, NULL, 4, 363, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(364, NULL, 4, 364, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(365, NULL, 4, 365, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(366, NULL, 4, 366, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(367, NULL, 4, 367, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(368, NULL, 4, 368, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(369, NULL, 4, 369, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(370, NULL, 4, 370, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(371, NULL, 4, 371, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(372, NULL, 4, 372, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(373, NULL, 4, 373, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(374, NULL, 4, 374, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(375, NULL, 4, 375, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(376, NULL, 4, 376, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(377, NULL, 4, 377, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(378, NULL, 4, 378, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(379, NULL, 4, 379, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(380, NULL, 4, 380, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(381, NULL, 4, 381, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(382, NULL, 4, 382, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(383, NULL, 4, 383, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(384, NULL, 4, 384, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(385, NULL, 4, 385, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(386, NULL, 4, 386, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(387, NULL, 4, 387, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(388, NULL, 4, 388, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(389, NULL, 4, 389, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(390, NULL, 4, 390, '0', '2025-01-22 06:37:09', '2025-01-22 06:37:09'),
(391, NULL, 4, 391, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(392, NULL, 4, 392, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(393, NULL, 4, 393, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(394, NULL, 4, 394, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(395, NULL, 4, 395, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(396, NULL, 4, 396, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(397, NULL, 4, 397, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(398, NULL, 4, 398, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(399, NULL, 4, 399, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(400, NULL, 4, 400, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(401, NULL, 4, 401, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(402, NULL, 4, 402, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(403, NULL, 4, 403, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(404, NULL, 4, 404, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(405, NULL, 4, 405, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(406, NULL, 4, 406, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(407, NULL, 4, 407, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(408, NULL, 4, 408, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(409, NULL, 4, 409, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(410, NULL, 4, 410, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(411, NULL, 4, 411, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(412, NULL, 4, 412, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(413, NULL, 4, 413, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(414, NULL, 4, 414, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(415, NULL, 4, 415, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(416, NULL, 4, 416, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(417, NULL, 4, 417, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(418, NULL, 4, 418, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(419, NULL, 4, 419, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(420, NULL, 4, 420, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(421, NULL, 4, 421, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(422, NULL, 4, 422, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(423, NULL, 4, 423, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(424, NULL, 4, 424, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(425, NULL, 4, 425, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(426, NULL, 4, 426, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(427, NULL, 4, 427, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(428, NULL, 4, 428, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(429, NULL, 4, 429, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(430, NULL, 4, 430, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(431, NULL, 4, 431, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(432, NULL, 4, 432, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(433, NULL, 4, 433, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(434, NULL, 4, 434, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(435, NULL, 4, 435, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(436, NULL, 4, 436, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(437, NULL, 4, 437, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(438, NULL, 4, 438, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(439, NULL, 4, 439, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(440, NULL, 4, 440, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(441, NULL, 4, 441, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(442, NULL, 4, 442, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(443, NULL, 4, 443, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(444, NULL, 4, 444, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(445, NULL, 4, 445, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(446, NULL, 4, 446, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(447, NULL, 4, 447, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(448, NULL, 4, 448, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(449, NULL, 4, 449, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(450, NULL, 4, 450, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(451, NULL, 4, 451, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(452, NULL, 4, 452, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(453, NULL, 4, 453, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(454, NULL, 4, 454, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(455, NULL, 4, 455, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(456, NULL, 4, 456, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(457, NULL, 4, 457, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(458, NULL, 4, 458, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(459, NULL, 4, 459, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(460, NULL, 4, 460, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(461, NULL, 4, 461, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(462, NULL, 4, 462, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(463, NULL, 4, 463, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(464, NULL, 4, 464, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(465, NULL, 4, 465, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(466, NULL, 4, 466, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(467, NULL, 4, 467, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(468, NULL, 4, 468, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(469, NULL, 4, 469, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(470, NULL, 4, 470, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(471, NULL, 4, 471, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(472, NULL, 4, 472, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(473, NULL, 4, 473, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(474, NULL, 4, 474, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(475, NULL, 4, 475, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(476, NULL, 4, 476, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(477, NULL, 4, 477, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(478, NULL, 4, 478, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(479, NULL, 4, 479, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(480, NULL, 4, 480, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(481, NULL, 4, 481, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(482, NULL, 4, 482, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(483, NULL, 4, 483, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(484, NULL, 4, 484, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(485, NULL, 4, 485, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(486, NULL, 4, 486, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(487, NULL, 4, 487, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(488, NULL, 4, 488, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(489, NULL, 4, 489, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(490, NULL, 4, 490, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(491, NULL, 4, 491, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(492, NULL, 4, 492, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(493, NULL, 4, 493, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(494, NULL, 4, 494, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(495, NULL, 4, 495, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(496, NULL, 4, 496, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(497, NULL, 4, 497, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(498, NULL, 4, 498, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(499, NULL, 4, 499, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(500, NULL, 4, 500, '0', '2025-01-22 06:37:10', '2025-01-22 06:37:10'),
(505, NULL, 5, 337, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(506, NULL, 5, 338, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(507, NULL, 5, 339, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(508, NULL, 5, 340, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(509, NULL, 5, 341, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(510, NULL, 5, 342, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(511, NULL, 5, 343, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(512, NULL, 5, 344, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(513, NULL, 5, 345, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(514, NULL, 5, 346, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(515, NULL, 5, 347, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(516, NULL, 5, 348, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(517, NULL, 5, 349, '1', '2025-08-11 07:56:07', '2025-08-11 07:59:18'),
(518, NULL, 5, 350, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(519, NULL, 5, 351, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(520, NULL, 5, 352, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(521, NULL, 5, 353, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(522, NULL, 5, 354, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(523, NULL, 5, 355, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(524, NULL, 5, 356, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(525, NULL, 5, 357, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(526, NULL, 5, 358, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(527, NULL, 5, 359, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(528, NULL, 5, 360, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(529, NULL, 5, 361, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(530, NULL, 5, 362, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(531, NULL, 5, 363, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(532, NULL, 5, 364, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(533, NULL, 5, 365, '0', '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(534, NULL, 5, 366, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(535, NULL, 5, 367, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(536, NULL, 5, 368, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(537, NULL, 5, 369, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(538, NULL, 5, 370, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(539, NULL, 5, 371, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(540, NULL, 5, 372, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(541, NULL, 5, 373, '1', '2025-08-11 07:56:08', '2025-08-11 07:59:23'),
(542, NULL, 5, 374, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(543, NULL, 5, 375, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(544, NULL, 5, 376, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(545, NULL, 5, 377, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(546, NULL, 5, 378, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(547, NULL, 5, 379, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(548, NULL, 5, 380, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(549, NULL, 5, 381, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(550, NULL, 5, 382, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(551, NULL, 5, 383, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(552, NULL, 5, 384, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(553, NULL, 5, 385, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(554, NULL, 5, 386, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(555, NULL, 5, 387, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(556, NULL, 5, 388, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(557, NULL, 5, 389, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(558, NULL, 5, 390, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(559, NULL, 5, 391, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(560, NULL, 5, 392, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(561, NULL, 5, 393, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(562, NULL, 5, 394, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(563, NULL, 5, 395, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(564, NULL, 5, 396, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(565, NULL, 5, 397, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(566, NULL, 5, 398, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(567, NULL, 5, 399, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(568, NULL, 5, 400, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(569, NULL, 5, 401, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(570, NULL, 5, 402, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(571, NULL, 5, 403, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(572, NULL, 5, 404, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(573, NULL, 5, 405, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(574, NULL, 5, 406, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(575, NULL, 5, 407, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(576, NULL, 5, 408, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(577, NULL, 5, 409, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(578, NULL, 5, 410, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(579, NULL, 5, 411, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(580, NULL, 5, 412, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(581, NULL, 5, 413, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(582, NULL, 5, 414, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(583, NULL, 5, 415, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(584, NULL, 5, 416, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(585, NULL, 5, 417, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(586, NULL, 5, 418, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(587, NULL, 5, 419, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(588, NULL, 5, 420, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(589, NULL, 5, 421, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(590, NULL, 5, 422, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(591, NULL, 5, 423, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(592, NULL, 5, 424, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(593, NULL, 5, 425, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(594, NULL, 5, 426, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(595, NULL, 5, 427, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(596, NULL, 5, 428, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(597, NULL, 5, 429, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(598, NULL, 5, 430, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(599, NULL, 5, 431, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(600, NULL, 5, 432, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(601, NULL, 5, 433, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(602, NULL, 5, 434, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(603, NULL, 5, 435, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(604, NULL, 5, 436, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(605, NULL, 5, 437, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(606, NULL, 5, 438, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(607, NULL, 5, 439, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(608, NULL, 5, 440, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(609, NULL, 5, 441, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(610, NULL, 5, 442, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(611, NULL, 5, 443, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(612, NULL, 5, 444, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(613, NULL, 5, 445, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(614, NULL, 5, 446, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(615, NULL, 5, 447, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(616, NULL, 5, 448, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(617, NULL, 5, 449, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(618, NULL, 5, 450, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(619, NULL, 5, 451, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(620, NULL, 5, 452, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(621, NULL, 5, 453, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(622, NULL, 5, 454, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(623, NULL, 5, 455, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(624, NULL, 5, 456, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(625, NULL, 5, 457, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(626, NULL, 5, 458, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(627, NULL, 5, 459, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(628, NULL, 5, 460, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(629, NULL, 5, 461, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(630, NULL, 5, 462, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(631, NULL, 5, 463, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(632, NULL, 5, 464, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(633, NULL, 5, 465, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(634, NULL, 5, 466, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(635, NULL, 5, 467, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(636, NULL, 5, 468, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(637, NULL, 5, 469, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(638, NULL, 5, 470, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(639, NULL, 5, 471, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(640, NULL, 5, 472, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(641, NULL, 5, 473, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(642, NULL, 5, 474, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(643, NULL, 5, 475, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(644, NULL, 5, 476, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(645, NULL, 5, 477, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(646, NULL, 5, 478, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(647, NULL, 5, 479, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(648, NULL, 5, 480, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(649, NULL, 5, 481, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(650, NULL, 5, 482, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(651, NULL, 5, 483, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(652, NULL, 5, 484, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(653, NULL, 5, 485, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(654, NULL, 5, 486, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(655, NULL, 5, 487, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(656, NULL, 5, 488, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(657, NULL, 5, 489, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(658, NULL, 5, 490, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(659, NULL, 5, 491, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(660, NULL, 5, 492, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(661, NULL, 5, 493, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(662, NULL, 5, 494, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(663, NULL, 5, 495, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(664, NULL, 5, 496, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(665, NULL, 5, 497, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(666, NULL, 5, 498, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(667, NULL, 5, 499, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(668, NULL, 5, 500, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(669, NULL, 5, 501, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(670, NULL, 5, 502, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(671, NULL, 5, 503, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08'),
(672, NULL, 5, 504, '0', '2025-08-11 07:56:08', '2025-08-11 07:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `branch_id`, `title`, `category`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admission', NULL, '2025-08-11 07:37:14', '2025-08-11 07:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `timetable_id` varchar(255) DEFAULT NULL,
  `day_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(25, '00:00', '01:00', '2024-07-20 04:39:45', '2024-07-20 04:39:45'),
(26, '01:00', '02:00', '2024-07-20 04:40:00', '2024-07-20 04:40:00'),
(27, '02:00', '03:00', '2024-07-20 04:40:09', '2024-07-20 04:40:09'),
(28, '03:00', '04:00', '2024-07-20 04:40:18', '2024-07-20 04:40:18'),
(29, '04:00', '05:00', '2024-07-20 04:40:28', '2024-07-20 04:40:28'),
(30, '05:00', '06:00', '2024-07-20 04:40:36', '2024-07-20 04:40:36'),
(31, '06:00', '07:00', '2024-07-20 04:40:50', '2024-07-20 04:40:50'),
(32, '07:00', '08:00', '2024-07-20 04:41:02', '2024-07-20 04:41:02'),
(33, '08:00', '09:00', '2024-07-20 04:41:18', '2024-07-20 04:41:18'),
(34, '09:00', '10:00', '2024-07-20 04:41:27', '2024-07-20 04:41:27'),
(35, '10:00', '11:00', '2024-07-20 04:41:35', '2024-07-20 04:41:35'),
(36, '11:00', '12:00', '2024-07-20 04:42:05', '2024-07-20 04:42:05'),
(37, '12:00', '13:00', '2024-07-20 04:42:19', '2024-07-20 04:42:19'),
(38, '13:00', '14:00', '2024-07-20 04:42:28', '2024-07-20 04:42:28'),
(39, '14:00', '15:00', '2024-07-20 04:42:37', '2024-07-20 04:42:37'),
(40, '15:00', '16:00', '2024-07-20 04:42:47', '2024-07-20 04:42:47'),
(41, '16:00', '17:00', '2024-07-20 04:43:27', '2024-07-20 04:43:27'),
(42, '17:00', '18:00', '2024-07-20 04:43:40', '2024-07-20 04:43:40'),
(43, '18:00', '19:00', '2024-07-20 04:44:05', '2024-07-20 04:44:05'),
(44, '19:00', '20:00', '2024-07-20 04:44:19', '2024-07-20 04:44:19'),
(45, '20:00', '21:00', '2024-07-20 04:45:36', '2024-07-20 04:45:36'),
(46, '21:00', '22:00', '2024-07-20 04:45:49', '2024-07-20 04:45:49'),
(47, '22:00', '23:00', '2024-07-20 04:45:57', '2024-07-20 04:45:57'),
(48, '23:00', '00:00', '2024-07-20 04:46:06', '2024-07-20 04:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `timeslot_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `day_id`, `timeslot_id`, `created_at`, `updated_at`) VALUES
(337, 15, 25, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(338, 15, 26, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(339, 15, 27, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(340, 15, 28, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(341, 15, 29, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(342, 15, 30, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(343, 15, 31, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(344, 15, 32, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(345, 15, 33, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(346, 15, 34, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(347, 15, 35, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(348, 15, 36, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(349, 15, 37, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(350, 15, 38, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(351, 15, 39, '2025-01-17 06:05:24', '2025-01-17 06:05:24'),
(352, 15, 40, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(353, 15, 41, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(354, 15, 42, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(355, 15, 43, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(356, 15, 44, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(357, 15, 45, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(358, 15, 46, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(359, 15, 47, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(360, 15, 48, '2025-01-17 06:05:25', '2025-01-17 06:05:25'),
(361, 16, 25, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(362, 16, 26, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(363, 16, 27, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(364, 16, 28, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(365, 16, 29, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(366, 16, 30, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(367, 16, 31, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(368, 16, 32, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(369, 16, 33, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(370, 16, 34, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(371, 16, 35, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(372, 16, 36, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(373, 16, 37, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(374, 16, 38, '2025-01-17 06:05:30', '2025-01-17 06:05:30'),
(375, 16, 39, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(376, 16, 40, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(377, 16, 41, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(378, 16, 42, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(379, 16, 43, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(380, 16, 44, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(381, 16, 45, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(382, 16, 46, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(383, 16, 47, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(384, 16, 48, '2025-01-17 06:05:31', '2025-01-17 06:05:31'),
(385, 17, 25, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(386, 17, 26, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(387, 17, 27, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(388, 17, 28, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(389, 17, 29, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(390, 17, 30, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(391, 17, 31, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(392, 17, 32, '2025-01-17 06:05:39', '2025-01-17 06:05:39'),
(393, 17, 33, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(394, 17, 34, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(395, 17, 35, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(396, 17, 36, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(397, 17, 37, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(398, 17, 38, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(399, 17, 39, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(400, 17, 40, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(401, 17, 41, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(402, 17, 42, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(403, 17, 43, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(404, 17, 44, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(405, 17, 45, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(406, 17, 46, '2025-01-17 06:05:40', '2025-01-17 06:05:40'),
(407, 17, 47, '2025-01-17 06:05:41', '2025-01-17 06:05:41'),
(408, 17, 48, '2025-01-17 06:05:41', '2025-01-17 06:05:41'),
(409, 18, 25, '2025-01-17 06:05:47', '2025-01-17 06:05:47'),
(410, 18, 26, '2025-01-17 06:05:47', '2025-01-17 06:05:47'),
(411, 18, 27, '2025-01-17 06:05:47', '2025-01-17 06:05:47'),
(412, 18, 28, '2025-01-17 06:05:47', '2025-01-17 06:05:47'),
(413, 18, 29, '2025-01-17 06:05:47', '2025-01-17 06:05:47'),
(414, 18, 30, '2025-01-17 06:05:47', '2025-01-17 06:05:47'),
(415, 18, 31, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(416, 18, 32, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(417, 18, 33, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(418, 18, 34, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(419, 18, 35, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(420, 18, 36, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(421, 18, 37, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(422, 18, 38, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(423, 18, 39, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(424, 18, 40, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(425, 18, 41, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(426, 18, 42, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(427, 18, 43, '2025-01-17 06:05:48', '2025-01-17 06:05:48'),
(428, 18, 44, '2025-01-17 06:05:49', '2025-01-17 06:05:49'),
(429, 18, 45, '2025-01-17 06:05:49', '2025-01-17 06:05:49'),
(430, 18, 46, '2025-01-17 06:05:49', '2025-01-17 06:05:49'),
(431, 18, 47, '2025-01-17 06:05:49', '2025-01-17 06:05:49'),
(432, 18, 48, '2025-01-17 06:05:49', '2025-01-17 06:05:49'),
(433, 19, 25, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(434, 19, 26, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(435, 19, 27, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(436, 19, 28, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(437, 19, 29, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(438, 19, 30, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(439, 19, 31, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(440, 19, 32, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(441, 19, 33, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(442, 19, 34, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(443, 19, 35, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(444, 19, 36, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(445, 19, 37, '2025-01-17 06:05:56', '2025-01-17 06:05:56'),
(446, 19, 38, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(447, 19, 39, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(448, 19, 40, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(449, 19, 41, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(450, 19, 42, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(451, 19, 43, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(452, 19, 44, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(453, 19, 45, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(454, 19, 46, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(455, 19, 47, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(456, 19, 48, '2025-01-17 06:05:57', '2025-01-17 06:05:57'),
(457, 20, 25, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(458, 20, 26, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(459, 20, 27, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(460, 20, 28, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(461, 20, 29, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(462, 20, 30, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(463, 20, 31, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(464, 20, 32, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(465, 20, 33, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(466, 20, 34, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(467, 20, 35, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(468, 20, 36, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(469, 20, 37, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(470, 20, 38, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(471, 20, 39, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(472, 20, 40, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(473, 20, 41, '2025-01-17 06:06:03', '2025-01-17 06:06:03'),
(474, 20, 42, '2025-01-17 06:06:04', '2025-01-17 06:06:04'),
(475, 20, 43, '2025-01-17 06:06:04', '2025-01-17 06:06:04'),
(476, 20, 44, '2025-01-17 06:06:04', '2025-01-17 06:06:04'),
(477, 20, 45, '2025-01-17 06:06:04', '2025-01-17 06:06:04'),
(478, 20, 46, '2025-01-17 06:06:04', '2025-01-17 06:06:04'),
(479, 20, 47, '2025-01-17 06:06:04', '2025-01-17 06:06:04'),
(480, 20, 48, '2025-01-17 06:06:04', '2025-01-17 06:06:04'),
(481, 21, 25, '2025-01-17 06:06:08', '2025-01-17 06:06:08'),
(482, 21, 26, '2025-01-17 06:06:08', '2025-01-17 06:06:08'),
(483, 21, 27, '2025-01-17 06:06:08', '2025-01-17 06:06:08'),
(484, 21, 28, '2025-01-17 06:06:08', '2025-01-17 06:06:08'),
(485, 21, 29, '2025-01-17 06:06:08', '2025-01-17 06:06:08'),
(486, 21, 30, '2025-01-17 06:06:08', '2025-01-17 06:06:08'),
(487, 21, 31, '2025-01-17 06:06:08', '2025-01-17 06:06:08'),
(488, 21, 32, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(489, 21, 33, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(490, 21, 34, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(491, 21, 35, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(492, 21, 36, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(493, 21, 37, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(494, 21, 38, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(495, 21, 39, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(496, 21, 40, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(497, 21, 41, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(498, 21, 42, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(499, 21, 43, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(500, 21, 44, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(501, 21, 45, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(502, 21, 46, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(503, 21, 47, '2025-01-17 06:06:09', '2025-01-17 06:06:09'),
(504, 21, 48, '2025-01-17 06:06:10', '2025-01-17 06:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_confirmation` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_teacher` int(11) DEFAULT NULL,
  `is_student` int(11) DEFAULT NULL,
  `is_staf` int(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `branch_id`, `name`, `image`, `phone`, `description`, `email`, `email_verified_at`, `password`, `password_confirmation`, `role_id`, `is_teacher`, `is_student`, `is_staf`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(50, 20, 'Asad Mukhtar', 'photos/principal/eBX2VvqjPwHM0LcTIBMMIXoBnAdPTy6ScLRIrjQR.jpg', '00000000000', NULL, 'axad03213@gmail.com', NULL, '$2y$10$MLM4.j4axt4E/qoBHttGYu9rY88.9Zd1Hfz.PEvvFsJ6B/E3XxqXW', NULL, 1, NULL, NULL, NULL, 1, NULL, '2025-08-11 07:24:37', '2025-08-11 07:24:37'),
(51, 20, 'Muhammad Adeel', 'user/EJpx1qdHzCcID4OafRZHSdPZr1zp5Qvgu4aJxirf.png', '03374969039', 'lorem', 'adeelalpha32@gmail.com', NULL, '$2y$10$.z5GHGgI6TQlcR.EtRH/ROK5yC.YQMW0hjToDlitViNfed9I31rHq', NULL, 3, NULL, NULL, NULL, 1, NULL, '2025-08-11 07:33:43', '2025-08-11 07:33:43'),
(52, 20, 'Muhammad Rehan', NULL, NULL, NULL, 'rehan.ali9449073@gmail.com', NULL, '$2y$10$HTwyLbrsQh8.GAbpUETXju7fEvMSpohafdfuAvKmF5OEvE.lAkPrq', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2025-08-11 07:56:07', '2025-08-11 07:56:07'),
(53, 20, 'Hafiz Shahzad Ali', NULL, '00000000000', NULL, 'hafiz.shahzadali02@gmail.com', NULL, '$2y$10$X9gRWwqAu2a/G7wbicp83uLjeZIWapLRQwRvkdsArRkJ9wyKiaQNe', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2025-08-11 09:22:10', '2025-08-11 09:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(2550) DEFAULT NULL,
  `subject_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `branch_id`, `title`, `image`, `description`, `subject_id`, `created_at`, `updated_at`) VALUES
(4, 20, '1 year', '1754916755.jpg', '1st is a global language used for communication, education, business, and culture. It connects people from diverse backgrounds, enabling the exchange of ideas and knowledge.', NULL, '2025-08-11 07:52:35', '2025-08-11 07:52:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignpermissions`
--
ALTER TABLE `assignpermissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignsections`
--
ALTER TABLE `assignsections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignsubjects`
--
ALTER TABLE `assignsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignteachers`
--
ALTER TABLE `assignteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigntimes`
--
ALTER TABLE `assigntimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enrollments_rollnumber_unique` (`rollnumber`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `general_settings_code_unique` (`code`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_email_unique` (`email`);

--
-- Indexes for table `profilestaffs`
--
ALTER TABLE `profilestaffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileteachers`
--
ALTER TABLE `profileteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questioncategories`
--
ALTER TABLE `questioncategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizanswers`
--
ALTER TABLE `quizanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiondetails`
--
ALTER TABLE `sectiondetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiontimeslots`
--
ALTER TABLE `sectiontimeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiontimetables`
--
ALTER TABLE `sectiontimetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staffcategories`
--
ALTER TABLE `staffcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafs`
--
ALTER TABLE `stafs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stafs_cnic_unique` (`cnic`);

--
-- Indexes for table `stuassignments`
--
ALTER TABLE `stuassignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentaccounts`
--
ALTER TABLE `studentaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuquizzes`
--
ALTER TABLE `stuquizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherslots`
--
ALTER TABLE `teacherslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignpermissions`
--
ALTER TABLE `assignpermissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `assignsections`
--
ALTER TABLE `assignsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignsubjects`
--
ALTER TABLE `assignsubjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `assignteachers`
--
ALTER TABLE `assignteachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assigntimes`
--
ALTER TABLE `assigntimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilestaffs`
--
ALTER TABLE `profilestaffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profileteachers`
--
ALTER TABLE `profileteachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questioncategories`
--
ALTER TABLE `questioncategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quizanswers`
--
ALTER TABLE `quizanswers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sectiondetails`
--
ALTER TABLE `sectiondetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sectiontimeslots`
--
ALTER TABLE `sectiontimeslots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sectiontimetables`
--
ALTER TABLE `sectiontimetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffcategories`
--
ALTER TABLE `staffcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stafs`
--
ALTER TABLE `stafs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stuassignments`
--
ALTER TABLE `stuassignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentaccounts`
--
ALTER TABLE `studentaccounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stuquizzes`
--
ALTER TABLE `stuquizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacherslots`
--
ALTER TABLE `teacherslots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=673;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
