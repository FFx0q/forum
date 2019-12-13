SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `grouppermission` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` smallint(5) UNSIGNED NOT NULL,
  `group_name` varchar(64) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `permission` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `permission_name` varchar(64) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `post` text COLLATE utf8mb4_polish_ci NOT NULL,
  `post_date` bigint(20) NOT NULL,
  `votes` mediumint(9) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `question` (
  `id` int(11) UNSIGNED NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_polish_ci NOT NULL,
  `topic_date` bigint(20) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_polish_ci NOT NULL,
  `member_password_hash` text COLLATE utf8mb4_polish_ci NOT NULL,
  `email` int(255) NOT NULL,
  `join_date` bigint(20) NOT NULL,
  `avatar_url` varchar(64) COLLATE utf8mb4_polish_ci NOT NULL,
  `reputation` mediumint(9) NOT NULL,
  `warnings` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB;

ALTER TABLE `grouppermission`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `grouppermission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `permission`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `question`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

