-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 01:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custom-form`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `board` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `board`, `project_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'board1', 1, '2024-01-24 02:01:35', '2024-01-24 02:01:35', NULL),
(2, 'board2', 1, '2024-01-24 05:50:11', '2024-01-24 05:50:11', NULL);

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
-- Table structure for table `mdl_customfield_data`
--

CREATE TABLE `mdl_customfield_data` (
  `id` bigint(10) NOT NULL,
  `fieldid` bigint(10) NOT NULL,
  `instanceid` bigint(10) NOT NULL,
  `intvalue` bigint(10) DEFAULT NULL,
  `decvalue` decimal(10,5) DEFAULT NULL,
  `shortcharvalue` varchar(255) DEFAULT NULL,
  `charvalue` varchar(1333) DEFAULT NULL,
  `value` longtext NOT NULL,
  `valueformat` bigint(10) NOT NULL,
  `timecreated` bigint(10) NOT NULL,
  `timemodified` bigint(10) NOT NULL,
  `contextid` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='core_customfield data table' ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Table structure for table `mdl_customfield_field`
--

CREATE TABLE `mdl_customfield_field` (
  `id` bigint(10) NOT NULL,
  `shortname` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(400) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL DEFAULT '',
  `description` longtext DEFAULT NULL,
  `descriptionformat` bigint(10) DEFAULT NULL,
  `sortorder` bigint(10) DEFAULT NULL,
  `categoryid` bigint(10) DEFAULT NULL,
  `configdata` longtext DEFAULT NULL,
  `timecreated` bigint(10) NOT NULL,
  `timemodified` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='core_customfield field table' ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `mdl_customfield_field`
--

INSERT INTO `mdl_customfield_field` (`id`, `shortname`, `name`, `type`, `description`, `descriptionformat`, `sortorder`, `categoryid`, `configdata`, `timecreated`, `timemodified`) VALUES
(1, 'full_name', 'full name', 'text', 'vcvbc', 0, 0, 1, '{\"required\":\"yes\",\"uniquevalues\":0,\"locked\":\"0\",\"visibility\":0,\"defaultvalue\":null,\"displaysize\":\"5\",\"maxlength\":\"10\",\"ispassword\":\"0\",\"link\":null}', 1705910005, 1706006749),
(4, 'shortname', 'selectname', 'select', '<p>dsafd fsdg</p>', 0, 0, 1, '{\"required\":\"no\",\"uniquevalues\":0,\"options\":\"aaaa\\r\\nbbbb\\r\\ncccc\\r\\ndddd\",\"defaultvalue\":\"cccc\",\"locked\":\"1\",\"visibility\":0}', 1705991146, 1705994163),
(6, 'gen', 'gender', 'radio', NULL, 0, 0, 1, '{\"required\":\"yes\",\"uniquevalues\":0,\"options\":\"male\\r\\nfemale\\r\\nchild\",\"defaultvalue\":\"male\",\"locked\":\"0\",\"visibility\":0}', 1705996585, 1705996729),
(8, 'name', 'entername', 'text', 'mandatory', 0, 0, 1, '{\"required\":\"no\",\"uniquevalues\":0,\"locked\":\"0\",\"visibility\":0,\"defaultvalue\":null,\"displaysize\":null,\"maxlength\":null,\"ispassword\":\"0\",\"link\":null}', 1706084242, 1706084242),
(9, 'sdsafdsf', 'sdsadfsd', 'text', '<p>saddsfd</p>', 0, 0, 1, '{\"required\":\"no\",\"uniquevalues\":0,\"locked\":\"0\",\"visibility\":0,\"defaultvalue\":null,\"displaysize\":null,\"maxlength\":null,\"ispassword\":\"0\",\"link\":null}', 1706092433, 1706092443),
(10, 'hg', 'hkjh', 'text', '<p>gfh</p>', 0, 0, 1, '{\"required\":\"no\",\"uniquevalues\":0,\"locked\":\"0\",\"visibility\":0,\"defaultvalue\":null,\"displaysize\":null,\"maxlength\":null,\"ispassword\":\"0\",\"link\":null}', 1706095323, 1706097694),
(11, 'bn', 'bvn', 'text', '<p>bvn</p>', 0, 0, 2, '{\"required\":\"no\",\"uniquevalues\":0,\"locked\":\"0\",\"visibility\":0,\"defaultvalue\":null,\"displaysize\":null,\"maxlength\":null,\"ispassword\":\"0\",\"link\":null}', 1706099837, 1706099837);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_24_052812_create_projects_table', 2),
(7, '2024_01_24_062446_create_tasks_table', 3),
(8, '2024_01_24_072920_create_boards_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'project1', '2024-01-24 00:53:47', '2024-01-24 00:53:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mdl_customfield_data`
--
ALTER TABLE `mdl_customfield_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mdl_custdata_insfie_uix` (`instanceid`,`fieldid`),
  ADD KEY `mdl_custdata_fieint_ix` (`fieldid`,`intvalue`),
  ADD KEY `mdl_custdata_fiesho_ix` (`fieldid`,`shortcharvalue`),
  ADD KEY `mdl_custdata_fiedec_ix` (`fieldid`,`decvalue`),
  ADD KEY `mdl_custdata_fie_ix` (`fieldid`),
  ADD KEY `mdl_custdata_con_ix` (`contextid`);

--
-- Indexes for table `mdl_customfield_field`
--
ALTER TABLE `mdl_customfield_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mdl_custfiel_catsor_ix` (`categoryid`,`sortorder`),
  ADD KEY `mdl_custfiel_cat_ix` (`categoryid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mdl_customfield_data`
--
ALTER TABLE `mdl_customfield_data`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mdl_customfield_field`
--
ALTER TABLE `mdl_customfield_field`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
