-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 mars 2021 à 11:03
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wikipower`
--

-- --------------------------------------------------------

--
-- Structure de la table `distribution`
--

DROP TABLE IF EXISTS `distribution`;
CREATE TABLE IF NOT EXISTS `distribution` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mono_schedule` double(5,4) NOT NULL,
  `day_schedule` double(5,4) NOT NULL,
  `night_schedule` double(5,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `distribution`
--

INSERT INTO `distribution` (`id`, `type`, `mono_schedule`, `day_schedule`, `night_schedule`, `created_at`, `updated_at`) VALUES
(1, 'normal', 0.1659, 0.1659, 0.1105, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_25_175211_create_ratecard_table', 1),
(2, '2021_03_26_080559_create_provider_table', 1),
(3, '2021_03_26_081402_create_distribution_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `provider`
--

DROP TABLE IF EXISTS `provider`;
CREATE TABLE IF NOT EXISTS `provider` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headoffice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `provider`
--

INSERT INTO `provider` (`id`, `name`, `headoffice`, `created_at`, `updated_at`) VALUES
(1, 'Mega', 'Liège', NULL, NULL),
(2, 'Lampiris', 'Liège', NULL, NULL),
(3, 'Luminus', 'Bruxelles', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ratecard`
--

DROP TABLE IF EXISTS `ratecard`;
CREATE TABLE IF NOT EXISTS `ratecard` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `distribution_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixedfee` double(8,2) NOT NULL,
  `mono_schedule` double(5,4) NOT NULL,
  `day_schedule` double(5,4) NOT NULL,
  `night_schedule` double(5,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ratecard_provider_id_foreign` (`provider_id`),
  KEY `ratecard_distribution_id_foreign` (`distribution_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratecard`
--

INSERT INTO `ratecard` (`id`, `provider_id`, `distribution_id`, `name`, `fixedfee`, `mono_schedule`, `day_schedule`, `night_schedule`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Easy', 40.00, 0.0613, 0.0723, 0.0518, NULL, NULL),
(2, 1, 1, 'Super', 0.00, 0.0625, 0.0747, 0.0531, NULL, NULL),
(3, 2, 1, 'TOP', 69.00, 0.0589, 0.0688, 0.0495, NULL, NULL),
(4, 3, 1, 'Comfy Green', 72.60, 0.0672, 0.0773, 0.0524, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
