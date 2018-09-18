-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2018 at 07:06 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sptv`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `page_id`, `title`, `visibility`, `created_at`, `updated_at`) VALUES
(2, 1, 'Početna', 1, '2018-03-08 09:51:55', '2018-03-08 09:51:58'),
(5, 354, 'Kontakt', 1, '2018-03-08 09:57:02', '2018-03-15 19:37:29'),
(6, 531, 'Program', 1, '2018-03-08 09:59:31', '2018-03-08 09:59:34'),
(7, 532, 'Emisije', 1, '2018-03-08 09:59:41', '2018-03-08 09:59:44'),
(8, 533, 'Blog kutak', 1, '2018-03-08 09:59:52', '2018-03-08 09:59:54'),
(9, 351, 'O nama', 1, '2018-03-08 10:00:02', '2018-03-08 10:00:17'),
(10, 557, 'Livestream', 1, '2018-03-15 19:46:06', '2018-03-15 19:46:08'),
(11, 560, 'Treći blog', 1, '2018-03-15 19:54:49', '2018-03-15 19:54:56'),
(12, 559, 'Drugi blog', 1, '2018-03-15 19:55:58', '2018-03-15 19:56:00'),
(13, 558, 'Prvi blog', 1, '2018-03-15 19:57:03', '2018-03-15 19:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `carousels_fragments`
--

CREATE TABLE `carousels_fragments` (
  `id` int(10) UNSIGNED NOT NULL,
  `carousel_id` int(10) UNSIGNED DEFAULT NULL,
  `photo_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `hierarchy` int(11) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `carousels_fragments`
--

INSERT INTO `carousels_fragments` (`id`, `carousel_id`, `photo_id`, `title`, `subtitle`, `url`, `hierarchy`, `visibility`, `created_at`, `updated_at`) VALUES
(10, 9, 32, 'O nama', NULL, NULL, NULL, 1, '2018-03-15 19:29:48', '2018-03-15 19:29:52'),
(11, 5, 33, 'Kontakt', NULL, NULL, NULL, 1, '2018-03-15 19:37:04', '2018-03-15 19:37:11'),
(12, 10, 34, 'Livestream', NULL, NULL, NULL, 1, '2018-03-15 19:46:06', '2018-03-15 19:46:10'),
(13, 11, 35, 'Treći blog', NULL, NULL, NULL, 1, '2018-03-15 19:54:49', '2018-03-15 19:54:55'),
(14, 12, 36, 'Drugi blog', NULL, NULL, NULL, 1, '2018-03-15 19:55:58', '2018-03-15 19:56:03'),
(15, 13, 37, 'Prvi blog', NULL, NULL, NULL, 1, '2018-03-15 19:57:03', '2018-03-15 19:57:07'),
(16, 2, 38, 'Sportska televizija', 'Vaša najdraža televizija', 'emisije', NULL, 1, '2018-03-16 16:28:23', '2018-03-16 16:28:33'),
(17, 8, 43, NULL, NULL, NULL, NULL, 1, '2018-03-18 19:46:23', '2018-03-18 19:46:27'),
(18, 7, 44, NULL, NULL, NULL, NULL, 1, '2018-03-18 20:19:18', '2018-03-18 20:19:22'),
(19, 6, 45, NULL, NULL, NULL, NULL, 1, '2018-03-18 20:28:50', '2018-03-18 20:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `page_id`, `title`, `visibility`, `created_at`, `updated_at`) VALUES
(2, 351, 'O nama', 1, '2018-03-17 12:15:38', '2018-03-17 12:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `galleries_fragments`
--

CREATE TABLE `galleries_fragments` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) UNSIGNED DEFAULT NULL,
  `photo_id` int(11) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `hierarchy` int(11) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries_fragments`
--

INSERT INTO `galleries_fragments` (`id`, `gallery_id`, `photo_id`, `title`, `subtitle`, `hierarchy`, `visibility`, `created_at`, `updated_at`) VALUES
(7, 2, 39, 'O nama', NULL, NULL, 1, '2018-03-17 12:15:38', '2018-03-17 12:15:43'),
(8, 2, 40, 'O nama', NULL, NULL, 1, '2018-03-17 12:15:38', '2018-03-17 12:15:45'),
(9, 2, 41, 'O nama', NULL, NULL, 1, '2018-03-17 12:15:38', '2018-03-17 12:15:46'),
(10, 2, 42, 'O nama', NULL, NULL, 1, '2018-03-17 12:15:38', '2018-03-17 12:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hierarchy` int(11) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `page_id`, `title`, `address`, `lat`, `lng`, `hierarchy`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 354, 'Sportska televizija', 'Kneza Ljudevita Posavskog 48, Zagreb', '45.80920099999999', '15.9984965', NULL, 1, '2018-03-08 09:31:30', '2018-03-08 09:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `marketings`
--

CREATE TABLE `marketings` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `hierarchy` int(11) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `marketings`
--

INSERT INTO `marketings` (`id`, `photo_id`, `title`, `url`, `hierarchy`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 47, 'Advert', 'https://www.google.hr/', 0, 1, '2018-03-26 17:49:29', '2018-03-27 14:52:19'),
(2, 48, 'Advert two', 'https://www.google.hr/', 1, 1, '2018-03-26 17:49:53', '2018-03-27 14:52:19'),
(3, 49, 'Advert 3', 'https://www.google.hr/', NULL, 1, '2018-03-27 14:52:46', '2018-03-27 14:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_27_152305_create_videos_table', 1),
(4, '2017_04_27_152457_create_photos_table', 1),
(5, '2017_04_27_152648_create_galleries_table', 1),
(6, '2017_04_27_152750_create_carousels_table', 1),
(7, '2017_04_27_152834_create_files_table', 1),
(8, '2017_04_27_152928_create_pages_table', 1),
(9, '2017_04_27_154428_create_services_table', 1),
(10, '2017_04_27_154713_create_products_table', 1),
(11, '2017_04_27_154928_create_articles_table', 1),
(12, '2017_04_27_155246_create_events_table', 1),
(13, '2017_04_27_155546_create_locations_table', 1),
(14, '2017_04_27_155705_create_settings_table', 1),
(15, '2017_04_28_150022_create_events_informations_table', 1),
(16, '2017_05_04_154428_create_testimonials_table', 2),
(17, '2017_05_05_104003_create_contacts_table', 3),
(18, '2017_05_11_185943_create_parts_table', 4),
(19, '2017_05_11_185943_create_hierarchy_table', 5),
(20, '2017_05_16_170634_create_parts_table', 6),
(21, '2017_05_25_102508_create_pages_drafts_table', 7),
(22, '2017_05_04_154428_create_members_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navigation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'main',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `abstract` longtext COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Administrator',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hierarchy` int(11) DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT '0',
  `pregnancy` tinyint(1) DEFAULT '0',
  `deletable` tinyint(1) DEFAULT '1',
  `seo_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_id`, `type`, `category`, `navigation`, `title`, `subtitle`, `content`, `abstract`, `author`, `url`, `hierarchy`, `visibility`, `pregnancy`, `deletable`, `seo_keywords`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'base', 'main', 'Naslovna', NULL, NULL, NULL, 'Franjo Heršak', NULL, 0, 1, 0, 0, NULL, NULL, '2017-05-02 18:00:16', '2018-03-17 11:18:16'),
(351, NULL, NULL, 'about', 'main', 'O nama', NULL, '<p>Televizijsko poslovanje je poslovanje s ljudima, o ljudima i za ljude. Poslovanje Sportske televizije je poslovanje sa sporta&scaron;ima, o sporta&scaron;ima i za sporta&scaron;e i sve koji se tako osjećaju. Kao prva nacionalna sportska televizija, na&scaron; je cilj pružiti sveobuhvatnu informaciju o hrvatskom i međunarodnom sportu, educirati i zabaviti, pružiti program koji će zadovoljiti apetite cijele obitelji. Kroz ogla&scaron;avanje i partnerstvo sa gospodarskim subjektima u Hrvatskoj i &scaron;ire, cilj nam je tim subjektima pružiti mogućnost povezivanja sa sportom, ulaganje i poistovjećivanje sa trudom i radom, odricanjem sporta&scaron;a u ostvarenju njihovim ciljeva. Sinergijom snage gospodarstva i vje&scaron;tine, znanja i kreativnosti novinarske ekipe, stvaramo prepoznatljiv rukopis programskog poslovanja.</p>', '<p>Televizijsko poslovanje je poslovanje s ljudima, o ljudima i za ljude. Poslovanje Sportske televizije je poslovanje sa sporta&scaron;ima, o sporta&scaron;ima i za sporta&scaron;e i sve koji se tako osjećaju. Kao prva nacionalna sportska televizija, na&scaron; je cilj pružiti sveobuhvatnu informaciju o hrvatskom i međunarodnom sportu, educirati i zabaviti, pružiti program koji će zadovoljiti apetite cijele obitelji.</p>', 'Franjo Heršak', 'o-nama', 4, 1, 0, 1, NULL, NULL, '2017-11-18 17:24:12', '2018-03-15 19:52:36'),
(354, NULL, NULL, 'contact', 'main', 'Kontakt', NULL, '<p>Marketing Sportske televizije ima rje&scaron;enje za svaku va&scaron;u nedoumicu, a možete nas svakodnevno kontaktirati, bez obzira na vrijeme.</p>\r\n\r\n<p><strong>Sportska televizija</strong></p>\r\n\r\n<p>HOO TV d.o.o.<br />\r\nKneza Ljudevita Posavskog 48, 10000 Zagreb</p>\r\n\r\n<p>OIB: 54294536626<br />\r\nMB:&nbsp;02686406<br />\r\nŽIRO RAČUN:&nbsp;2340009-1110467593</p>\r\n\r\n<p>E-mail:<a href=\"mailto:info@sptv.hr\">&nbsp;info@sptv.hr</a><br />\r\nTel:&nbsp;+385 1 555 3800</p>\r\n\r\n<p><strong>Direktor</strong></p>\r\n\r\n<p>mr. sc. Petar Čavlović<br />\r\nE-mail:&nbsp;<a href=\"mailto:petar.cavlovic@sptv.hr\">petar.cavlovic@sptv.hr</a></p>\r\n\r\n<p><strong>Glavni urednik</strong></p>\r\n\r\n<p>Jura Ozmec<br />\r\nE-mail:&nbsp;<a href=\"mailto:info@sptv.hr\">info@sptv.hr</a><br />\r\nTel:&nbsp;+385 1 555 3801</p>\r\n\r\n<p><a href=\"mailto:jura.ozmec@sptv.hr\">jura.ozmec@sptv.hr</a></p>\r\n\r\n<p><strong>Pomoćnica urednika za Nove medije</strong></p>\r\n\r\n<p>Gorana Đivić<br />\r\nE-mail:&nbsp;<a href=\"mailto:gorana.djivic@sptv.hr\">gorana.djivic@sptv.hr</a></p>\r\n\r\n<p><strong>Koordinatorica programa i tajnica redakcije</strong></p>\r\n\r\n<p>Vlasta Goričanec<br />\r\nEmail:<a href=\"mailto:vlasta.goricanec@sptv.hr\">vlasta.goricanec@sptv.hr</a><br />\r\nTel: +385 1 555 3800<br />\r\nTel:+385 1 555 3810</p>\r\n\r\n<p><strong>Tajnica uprave</strong></p>\r\n\r\n<p>Željka Gudan<br />\r\nE-mail:&nbsp;<a href=\"mailto:uprava@sptv.hr\">uprava@sptv.hr</a>&nbsp;<br />\r\nTel:&nbsp;+385 1 555 3801</p>\r\n\r\n<p><strong>Prodaja</strong></p>\r\n\r\n<p>E-mail:&nbsp;<a href=\"mailto:prodaja@sptv.hr\">prodaja@sptv.hr</a><br />\r\nTel:&nbsp;+385 1 555 3806</p>', '<p>Marketing Sportske televizije ima rje&scaron;enje za svaku va&scaron;u nedoumicu, a možete nas svakodnevno kontaktirati, bez obzira na vrijeme.</p>\r\n\r\n<p><strong>Sportska televizija</strong></p>\r\n\r\n<p>Kneza Ljudevita Posavskog 48, 10000 Zagreb<br />\r\nE-mail:<a href=\"mailto:info@sptv.hr\">&nbsp;info@sptv.hr</a><br />\r\nTel:&nbsp;+385 1 555 3800</p>', 'Franjo Heršak', 'kontakt', 5, 1, 0, 1, NULL, NULL, '2017-11-18 17:25:25', '2018-03-15 19:52:39'),
(513, 351, NULL, 'about', 'main', 'adf', 'adf', NULL, NULL, 'Franjo Heršak', 'afd', NULL, 0, 0, 1, NULL, NULL, '2018-03-01 21:03:01', '2018-03-01 21:03:01'),
(531, NULL, NULL, 'programs', 'main', 'Program', NULL, NULL, NULL, 'Franjo Heršak', 'program', 1, 1, 0, 1, NULL, NULL, '2018-03-08 08:59:26', '2018-03-28 05:20:38'),
(532, NULL, NULL, 'shows', 'main', 'Emisije', 'Otkrijte i pratite svoje najdraže emisije na Sportskoj televiziji', NULL, NULL, 'Franjo Heršak', 'emisije', 2, 1, 1, 1, NULL, NULL, '2018-03-08 08:59:55', '2018-03-16 15:47:44'),
(533, NULL, NULL, 'news', 'main', 'Blog', 'perJURAtivno', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Franjo Heršak', 'blog', 3, 1, 1, 1, NULL, NULL, '2018-03-08 09:04:01', '2018-03-15 19:21:28'),
(541, 532, NULL, 'shows', 'main', 'Sportski magazin', NULL, '<p>&Scaron;to je novo u svijeta sporta doznajte svakog ponedjeljka od 19.05 na SPTV-u kada vam prikazujemo magazin Al Jazeere Balkans. Intervjui sa sporta&scaron;ima i sportskim djelatnicima, pregledi događanja, iza kulisa pojedinih natjecanja, zanimljive priče iz regije svijeta i jo&scaron; mnogo toga samo u Sportskom magazinu.</p>', '<p>&Scaron;to je novo u svijeta sporta doznajte svakog ponedjeljka od 19.05 na SPTV-u kada vam prikazujemo magazin Al Jazeere Balkans. Intervjui sa sporta&scaron;ima i sportskim djelatnicima, pregledi događanja, iza kulisa pojedinih natjecanja, zanimljive priče iz regije svijeta i jo&scaron; mnogo toga samo u Sportskom magazinu.</p>', 'Franjo Heršak', 'sportski-magazin', 0, 1, 0, 1, NULL, NULL, '2018-03-08 09:11:57', '2018-03-08 09:15:31'),
(542, 532, NULL, 'shows', 'main', 'Sport nedeljom', NULL, '<p>Autor i voditelj Ante Breko u studio dovodi najaktualnije goste kako bi zajedno s njima razgovarao o najnovijim događajima i analizirao postojeće stvari. Kroz reportaže podsjeća na pro&scaron;li tjedan u hrvatskom sportu i najavljuje buduće važne sportske događaje.<br />\r\n<br />\r\nFacebook:&nbsp;<a href=\"http://www.sptv.hr%20facebook.com/Sportska.televizija\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT: str. 322</p>', '<p>Autor i voditelj Ante Breko u studio dovodi najaktualnije goste kako bi zajedno s njima razgovarao o najnovijim događajima i analizirao postojeće stvari. Kroz reportaže podsjeća na pro&scaron;li tjedan u hrvatskom sportu i najavljuje buduće važne sportske događaje.</p>', 'Franjo Heršak', 'sport-nedeljom', 1, 1, 0, 1, NULL, NULL, '2018-03-08 09:12:12', '2018-03-08 09:16:11'),
(543, 532, NULL, 'shows', 'main', 'Istinom do gola', NULL, '<p>Srijedom od 17.00 poznati sportski novinar Zdravko Reić u svom Talk showu &quot;Istinom do gola&quot; s gostima razgovara o stanju u hrvatskom sportu i svemu vezanom uz sport. Uvijek aktualno, zanimljivo, sadržajno i opu&scaron;teno.<br />\r\n<br />\r\nFacebook:&nbsp;<a href=\"http://www.sptv.hr%20facebook.com/Sportska.televizija\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT:&nbsp; str. 323</p>', '<p>Srijedom od 17.00 poznati sportski novinar Zdravko Reić u svom Talk showu &quot;Istinom do gola&quot; s gostima razgovara o stanju u hrvatskom sportu i svemu vezanom uz sport. Uvijek aktualno, zanimljivo, sadržajno i opu&scaron;teno.</p>', 'Franjo Heršak', 'istinom-do-gola', 2, 1, 0, 1, NULL, NULL, '2018-03-08 09:12:22', '2018-03-08 09:16:46'),
(544, 532, NULL, 'shows', 'main', 'Motosport', NULL, '<p>U pola sata brzine i adrenalina, u sklopu jedine emisije ovakvog tipa u Hrvatskoj, pronaći ćete puno automobila i motora, te zaljubljenika koji ih slažu i uživaju u njima - na stazi i izvan nje. Imamo i zgodnih teta, poznate ekipe koja poku&scaron;ava voziti brzo, bezbroj pametnih i zabavnih ideja, savjeta i svega ostalog &scaron;to na domaćoj tuning i auto-moto sceni. Svakog drugog petka od 21:15.</p>\r\n\r\n<p>Facebook:<a href=\"http://www.facebook.com/Sportska.televizija.SPTV\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT:&nbsp; str. 341</p>', '<p>U pola sata brzine i adrenalina, u sklopu jedine emisije ovakvog tipa u Hrvatskoj, pronaći ćete puno automobila i motora, te zaljubljenika koji ih slažu i uživaju u njima - na stazi i izvan nje. Imamo i zgodnih teta, poznate ekipe koja poku&scaron;ava voziti brzo, bezbroj pametnih i zabavnih ideja, savjeta i svega ostalog &scaron;to na domaćoj tuning i auto-moto sceni. Svakog drugog petka od 21:15.</p>', 'Franjo Heršak', 'motosport', 3, 1, 0, 1, NULL, NULL, '2018-03-08 09:12:34', '2018-03-08 09:17:31'),
(545, 532, NULL, 'shows', 'main', 'Svijet autosporta', NULL, '<p>Emisija koja se bavi događajima u Hrvatskom autosportu, kroz reportaže, razgovore u studiju i izjave. Svake druge nedjelje na SPTV-u od 9:20.</p>', '<p>Emisija koja se bavi događajima u Hrvatskom autosportu, kroz reportaže, razgovore u studiju i izjave. Svake druge nedjelje na SPTV-u od 9:20.</p>', 'Franjo Heršak', 'svijet-autosporta', 4, 1, 0, 1, NULL, NULL, '2018-03-08 09:12:44', '2018-03-08 09:18:22'),
(546, 532, NULL, 'shows', 'main', 'Sportska emisija', NULL, '<p>Pola sata s nekim od vrhunskih hrvatskih sporta&scaron;a. netko voli kuhati, netko spavati, netko pričati. Svakog ponedjeljka od 21:00h.</p>\r\n\r\n<p>Facebook:&nbsp;<a href=\"http://www.sptv.hr%20facebook.com/Sportska.televizija\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT: str. 321</p>', '<p>Pola sata s nekim od vrhunskih hrvatskih sporta&scaron;a. netko voli kuhati, netko spavati, netko pričati. Svakog ponedjeljka od 21:00h.</p>', 'Franjo Heršak', 'sportska-emisija', 5, 1, 0, 1, NULL, NULL, '2018-03-08 09:12:56', '2018-03-08 09:36:24'),
(547, 532, NULL, 'shows', 'main', 'Rotor', NULL, '<p>Sve &scaron;to ste oduvijek željeli znati u automotosportu u Hrvatskoj i u svijetu, kroz snimke, reportaže, razgovore. Vrlo temeljto. Petkom od 17 sati na SPTV-u.</p>\r\n\r\n<p>Facebook:&nbsp;<a href=\"http://www.sptv.hr%20facebook.com/Sportska.televizija\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT: str. 339</p>', '<p>Sve &scaron;to ste oduvijek željeli znati u automotosportu u Hrvatskoj i u svijetu, kroz snimke, reportaže, razgovore. Vrlo temeljto. Petkom od 17 sati na SPTV-u.</p>', 'Franjo Heršak', 'rotor', 6, 1, 0, 1, NULL, NULL, '2018-03-08 09:13:04', '2018-03-08 09:19:42'),
(548, 532, NULL, 'shows', 'main', 'Svijet auto moto nautike', NULL, '<p>Ljubitelji brzina, automobila, motora ili dobrih plovila svakog četvrtka od 17.00 mogu doći na svoje. Kako birati automobil, gdje pogledati najnovije brodice, za&scaron;to odabrati jedno, a ne drugo? Predstavljamo &scaron;to je novo na trži&scaron;tu, donosimo recenzije pojedinih modela vozila, najavljujemo sajmove automobila, a tu su i priče iz povijesti automobilske industrije.<br />\r\n<br />\r\nFacebook:&nbsp;<a href=\"http://www.sptv.hr%20facebook.com/Sportska.televizija\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT:&nbsp;str. 338</p>', '<p>Ljubitelji brzina, automobila, motora ili dobrih plovila svakog četvrtka od 17:00 mogu doći na svoje. Kako birati automobil, gdje pogledati najnovije brodice, za&scaron;to odabrati jedno, a ne drugo? Predstavljamo &scaron;to je novo na trži&scaron;tu, donosimo recenzije pojedinih modela vozila, najavljujemo sajmove automobila, a tu su i priče iz povijesti automobilske industrije.</p>', 'Franjo Heršak', 'svijet-auto-moto-nautike', 7, 1, 0, 1, NULL, NULL, '2018-03-08 09:13:17', '2018-03-08 09:20:21'),
(549, 532, NULL, 'shows', 'main', 'Školska liga', NULL, '<p>Kad kamera Sportske televizije svrati u neki gradić, &scaron;kolu, mali klub, na medijski zanemaren sportski događaj ili u dvoranu koju je te&scaron;ko naći na karti Hrvatske, onda je to najče&scaron;će kamera emisije &Scaron;kolska liga. Srijedom od 18 sati.</p>\r\n\r\n<p>Facebook:&nbsp;<a href=\"http://www.sptv.hr%20facebook.com/Sportska.televizija\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT: str. 332</p>', '<p>Kad kamera Sportske televizije svrati u neki gradić, &scaron;kolu, mali klub, na medijski zanemaren sportski događaj ili u dvoranu koju je te&scaron;ko naći na karti Hrvatske, onda je to najče&scaron;će kamera emisije &Scaron;kolska liga. Srijedom od 18 sati.</p>', 'Franjo Heršak', 'skolska-liga', 8, 1, 0, 1, NULL, NULL, '2018-03-08 09:13:30', '2018-03-08 09:20:55'),
(550, 532, NULL, 'shows', 'main', 'Moj savez', NULL, '<p>Na Sportskoj televiziji doznajte sve odgovore o pojedinom sportu. Kako, &scaron;to i gdje trenirati, koliko ima klubova i kako su organizirani, koje su uspjehe do sada ostvarili.&nbsp;Predstavljanje sportskih saveza, klubova, njihovih akcija, rad s mladima. Sve to i jo&scaron; puno vi&scaron;e u emisiji MOJ SAVEZ, srijedom i petkom od 19:05.</p>\r\n\r\n<p>Facebook:&nbsp;<a href=\"http://www.sptv.hr%20facebook.com/Sportska.televizija\">www.facebook.com/Sportska.televizija.SPTV</a></p>', '<p>Na Sportskoj televiziji doznajte sve odgovore o pojedinom sportu. Kako, &scaron;to i gdje trenirati, koliko ima klubova i kako su organizirani, koje su uspjehe do sada ostvarili.&nbsp;Predstavljanje sportskih saveza, klubova, njihovih akcija, rad s mladima. Sve to i jo&scaron; puno vi&scaron;e u emisiji MOJ SAVEZ, srijedom i petkom od 19:05.</p>', 'Franjo Heršak', 'moj-savez', 9, 1, 0, 1, NULL, NULL, '2018-03-08 09:13:39', '2018-03-08 09:21:26'),
(551, 532, NULL, 'shows', 'main', 'Sport report', NULL, '<p>Sport Report je emisija koja donosi aktualne reportaže sa sportskih dogadjanja. U emisiji pogledajte izvje&scaron;taje s državnih prvenstava, kup natjecanja, reportaže o sportskim klubovima, intervjue s uglednicima hrvatskog sporta, edukativne priloge i ostale zanimljive sportske teme.&nbsp;Petkom od 17:10.</p>\r\n\r\n<p>Facebook:&nbsp;<a href=\"http://www.facebook.com/Sportska.televizija.SPTV\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT: str. 333</p>', '<p>Sport Report je emisija koja donosi aktualne reportaže sa sportskih dogadjanja. U emisiji pogledajte izvje&scaron;taje s državnih prvenstava, kup natjecanja, reportaže o sportskim klubovima, intervjue s uglednicima hrvatskog sporta, edukativne priloge i ostale zanimljive sportske teme.&nbsp;Petkom od 17:10.</p>', 'Franjo Heršak', 'sport-report', 10, 1, 0, 1, NULL, NULL, '2018-03-08 09:13:47', '2018-03-08 09:22:07'),
(552, 532, NULL, 'shows', 'main', 'TV automagazin', NULL, '<p>Novosti iz svijeta oktana, sajmovi. brzine, Na originalan način doznajte četvrtkom od 17.30 na Sportskoj televiziji u TV automagazinu, najgledanijoj emisiji tog formata.</p>\r\n\r\n<p>Facebook:&nbsp;<a href=\"http://www.facebook.com/Sportska.televizija.SPTV\">www.facebook.com/Sportska.televizija.SPTV</a><br />\r\nTTXT: str. 340</p>', '<p>Novosti iz svijeta oktana, sajmovi. brzine, Na originalan način doznajte četvrtkom od 17.30 na Sportskoj televiziji u TV automagazinu, najgledanijoj emisiji tog formata.</p>', 'Franjo Heršak', 'tv-automagazin', 11, 1, 0, 1, NULL, NULL, '2018-03-08 09:14:00', '2018-03-08 09:22:51'),
(557, NULL, NULL, 'livestream', 'main', 'Uživo', 'Pratite nas sa svojeg računala, tableta ili pametnog telefona', NULL, NULL, 'Franjo Heršak', 'uzivo', 6, 1, 0, 1, NULL, NULL, '2018-03-15 18:27:24', '2018-03-17 11:17:45'),
(558, 533, NULL, 'news', 'main', 'Prvi blog', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Franjo Heršak', 'prvi-blog', NULL, 1, 0, 1, NULL, NULL, '2018-03-15 19:20:08', '2018-03-15 19:32:05'),
(559, 533, NULL, 'news', 'main', 'Drugi blog', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Franjo Heršak', 'drugi-blog', NULL, 1, 0, 1, NULL, NULL, '2018-03-15 19:20:14', '2018-03-15 19:21:51'),
(560, 533, NULL, 'news', 'main', 'Treći blog', NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Franjo Heršak', 'treci-blog', NULL, 1, 0, 1, NULL, NULL, '2018-03-15 19:20:22', '2018-03-15 19:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `hierarchy` int(11) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `photo_id`, `title`, `url`, `hierarchy`, `visibility`, `created_at`, `updated_at`) VALUES
(2, 22, 'Hrvatski nogometni savez', 'http://hns-cff.hr/', 0, 1, '2018-03-15 17:46:39', '2018-03-26 18:10:38'),
(3, 23, 'Sportska Hrvatska', 'http://www.sportskahrvatska.com/', 1, 1, '2018-03-15 17:50:21', '2018-03-15 18:09:46'),
(4, 24, 'Hrvatska reprezentacija', 'http://www.hrvatskareprezentacija.hr/', 2, 1, '2018-03-15 17:52:35', '2018-03-15 18:09:54'),
(5, 25, 'Hrvatsko novinarsko društvo', 'http://www.hnd.hr/', 3, 1, '2018-03-15 17:54:17', '2018-03-15 18:10:00'),
(6, 26, 'Hrvatski zbor sportskih novinara', 'http://www.hzsn.hr/hr/', 4, 1, '2018-03-15 17:56:18', '2018-03-15 18:10:02'),
(7, 27, 'Hrvatski odbojkaški savez', 'http://hos-cvf.hr/', 5, 1, '2018-03-15 17:59:30', '2018-03-15 18:10:08'),
(8, 28, 'Hrvatski olimpijski odbor', 'http://www.hoo.hr/hr/', 0, 1, '2018-03-15 18:01:20', '2018-03-15 18:09:40'),
(9, 29, 'Hrvatski rukometni savez', 'http://hrs.hr/', 8, 1, '2018-03-15 18:02:40', '2018-03-15 18:10:11'),
(10, 30, 'Hrvatski košarkaški savez', 'http://www.hks-cbf.hr/', 9, 1, '2018-03-15 18:03:46', '2018-03-15 18:10:11'),
(11, 31, 'Hrvatski judo savez', 'https://judo.hr/', 7, 1, '2018-03-15 18:04:48', '2018-03-15 18:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `caption`, `alt`, `source`, `path`, `created_at`, `updated_at`) VALUES
(22, 'Hrvatski nogometni savez', 'Hrvatski nogometni savez', NULL, 'assets/uploads/photos/c8a3bbbd1e187c2e64dd9bc56e435cfa.png', '2018-03-15 17:48:16', '2018-03-15 17:48:16'),
(23, 'Sportska Hrvatska', 'Sportska Hrvatska', NULL, 'assets/uploads/photos/c7d6668b503517cffbe9163d54d33b49.png', '2018-03-15 17:50:21', '2018-03-15 17:50:21'),
(24, 'Hrvatska reprezentacija', 'Hrvatska reprezentacija', NULL, 'assets/uploads/photos/b1a44a8e472d564127cc85d8ee8a1bb7.png', '2018-03-15 17:52:35', '2018-03-15 17:52:35'),
(25, 'Hrvatsko novinarsko društvo', 'Hrvatsko novinarsko društvo', NULL, 'assets/uploads/photos/75a4d5143ee4e3c23091dd0f306ebe40.png', '2018-03-15 17:54:17', '2018-03-15 17:54:17'),
(26, 'Hrvatski zbor sportskih novinara', 'Hrvatski zbor sportskih novinara', NULL, 'assets/uploads/photos/a2132b68f0083a4ace7329f5da07e673.png', '2018-03-15 17:56:18', '2018-03-15 17:56:18'),
(27, 'Hrvatski odbojkaški savez', 'Hrvatski odbojkaški savez', NULL, 'assets/uploads/photos/e0f1ca9fa7706d9d30c540c7597cc302.png', '2018-03-15 17:59:30', '2018-03-15 17:59:30'),
(28, 'Hrvatski olimpijski odbor', 'Hrvatski olimpijski odbor', NULL, 'assets/uploads/photos/aab05ca0c999d82504bcb36c2ea9c524.png', '2018-03-15 18:01:20', '2018-03-15 18:01:20'),
(29, 'Hrvatski rukometni savez', 'Hrvatski rukometni savez', NULL, 'assets/uploads/photos/28e4226696d67c598111a2985447ed7f.png', '2018-03-15 18:02:40', '2018-03-15 18:02:40'),
(30, 'Hrvatski košarkaški savez', 'Hrvatski košarkaški savez', NULL, 'assets/uploads/photos/f6ac8c40132f6db86a67c86407ce3b70.png', '2018-03-15 18:03:46', '2018-03-15 18:03:46'),
(31, 'Hrvatski judo savez', 'Hrvatski judo savez', NULL, 'assets/uploads/photos/a80ff9b3af8ca94fd5e250a34196308c.png', '2018-03-15 18:04:48', '2018-03-15 18:04:48'),
(32, 'O nama', 'O nama', NULL, 'assets/uploads/photos/3c4f1adc70aa7ceb3429c98e59525c2e.jpg', '2018-03-15 19:29:48', '2018-03-15 19:29:48'),
(33, 'Kontakt', 'Kontakt', NULL, 'assets/uploads/photos/c8f0258d64d14fad80b0b61ee2999e56.jpg', '2018-03-15 19:37:04', '2018-03-15 19:37:04'),
(34, 'Livestream', 'Livestream', NULL, 'assets/uploads/photos/4088db72e3b1f540b2e950c5495e923c.jpg', '2018-03-15 19:46:06', '2018-03-15 19:46:06'),
(35, 'Treći blog', 'Treći blog', NULL, 'assets/uploads/photos/5a7466610309a53709ba1ac66ea2e55f.jpg', '2018-03-15 19:54:49', '2018-03-15 19:54:49'),
(36, 'Drugi blog', 'Drugi blog', NULL, 'assets/uploads/photos/b11ead1a95e4b97e22e293c70af119fe.jpg', '2018-03-15 19:55:58', '2018-03-15 19:55:58'),
(37, 'Prvi blog', 'Prvi blog', NULL, 'assets/uploads/photos/ebf7695008359de95a5c2147276614fb.jpg', '2018-03-15 19:57:03', '2018-03-15 19:57:03'),
(38, 'Sportska televizija', 'Sportska televizija', NULL, 'assets/uploads/photos/c181b23742b50733f62ecf36488abd1b.jpg', '2018-03-16 16:28:23', '2018-03-16 16:28:23'),
(39, 'O nama', 'O nama', NULL, 'assets/uploads/photos/072c0c91a5458c6525c0d3437ac5424f.jpg', '2018-03-17 12:15:38', '2018-03-17 12:15:38'),
(40, 'O nama', 'O nama', NULL, 'assets/uploads/photos/aa39c1df25f0fdccae4057da06ba0935.jpg', '2018-03-17 12:15:38', '2018-03-17 12:15:38'),
(41, 'O nama', 'O nama', NULL, 'assets/uploads/photos/5112775eea20f7af2c18f396a5b4d6ad.jpg', '2018-03-17 12:15:38', '2018-03-17 12:15:38'),
(42, 'O nama', 'O nama', NULL, 'assets/uploads/photos/d6aa99fb0d4510b13283aa32c7feebf4.jpg', '2018-03-17 12:15:38', '2018-03-17 12:15:38'),
(43, NULL, NULL, NULL, 'assets/uploads/photos/3ec0ac54c7a3fbe3c98d85a3c8dcbd4c.jpg', '2018-03-18 19:46:23', '2018-03-18 19:46:23'),
(44, NULL, NULL, NULL, 'assets/uploads/photos/67a03fc51f17b3d4b0a3f2716554c9d6.jpg', '2018-03-18 20:19:18', '2018-03-18 20:19:18'),
(45, NULL, NULL, NULL, 'assets/uploads/photos/3c4b4af1729e98410f1925b132eab2b8.jpg', '2018-03-18 20:28:50', '2018-03-18 20:28:50'),
(47, 'Advert', 'Advert', NULL, 'assets/uploads/photos/ab7e7be4cbf0bea12336e372118a5810.jpg', '2018-03-26 17:49:29', '2018-03-26 17:49:29'),
(48, 'Advert two', 'Advert two', NULL, 'assets/uploads/photos/173251e7bfbf4d105d27339cde4a5b8c.jpg', '2018-03-26 17:49:53', '2018-03-26 17:49:53'),
(49, 'adf', 'adf', NULL, 'assets/uploads/photos/cea80d7c91c3797304d3f68822273005.jpg', '2018-03-27 14:52:46', '2018-03-27 14:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `page_id`, `title`, `description`, `date`, `time`, `visibility`, `created_at`, `updated_at`) VALUES
(18, 531, 'TV magazin', NULL, '2018-03-28', '12:00:00', 1, '2018-03-28 05:23:21', '2018-03-28 14:25:05'),
(19, 531, 'Sport report', NULL, '2018-03-28', '08:00:00', 1, '2018-03-28 05:24:13', '2018-03-28 05:25:25'),
(20, 531, 'Moj savez', NULL, '2018-03-28', '09:00:00', 1, '2018-03-28 05:25:20', '2018-03-28 05:25:26'),
(21, 531, 'Školska liga', NULL, '2018-03-28', '10:30:00', 1, '2018-03-28 05:25:43', '2018-03-28 05:26:04'),
(22, 531, 'Moj savez', NULL, '2018-03-29', '08:00:00', 1, '2018-03-28 05:25:58', '2018-03-28 05:26:02'),
(23, 531, 'Sport report', NULL, '2018-03-29', '12:30:00', 1, '2018-03-28 14:08:16', '2018-03-28 14:08:19'),
(24, 531, 'Školska liga', NULL, '2018-03-29', '17:00:00', 1, '2018-03-28 14:08:38', '2018-03-28 14:08:58'),
(25, 531, 'Moj savez', NULL, '2018-03-29', '18:00:00', 1, '2018-03-28 14:08:52', '2018-03-28 14:08:59'),
(26, 531, 'TV magazin', NULL, '2018-03-29', '20:00:00', 1, '2018-03-28 14:09:51', '2018-03-28 14:09:55'),
(27, 531, 'Svijet autosporta', NULL, '2018-03-27', '08:00:00', 1, '2018-03-28 14:11:45', '2018-03-28 14:12:11'),
(28, 531, 'Motosport', NULL, '2018-03-27', '07:00:00', 1, '2018-03-28 14:12:08', '2018-03-28 14:12:13'),
(29, 531, 'Sportska emisija', NULL, '2018-03-28', '18:00:00', 1, '2018-03-28 14:17:52', '2018-03-28 14:18:02'),
(30, 531, 'Rotor', NULL, '2018-03-28', '20:00:00', 1, '2018-03-28 14:18:25', '2018-03-28 14:18:31'),
(31, 531, 'Istinom do gola', NULL, '2018-03-28', '21:00:00', 0, '2018-03-28 14:38:47', '2018-03-28 14:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'superadmin',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `activation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `activation_token`, `password_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Franjo Heršak', 'hersak.franjo@gmail.com', '$2y$10$38cwXuFYLDXaLjwT5rOULOAH.zGvJsh/6kQlGLhkffZYqs1EGnlda', 'superadministrator', 1, NULL, '77b31c9d216278b562190afdc0481859', 'iIimrzRpCzz0eJuIGOnmHGGeUJRAlX0hmtWP70dRP7kSOkxLvAKSm65Y8z2y', '2017-05-10 11:34:53', '2018-01-18 08:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standard_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hierarchy` int(11) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `page_id`, `title`, `host`, `host_id`, `standard_url`, `embed_url`, `hierarchy`, `visibility`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Jestofunk', 'www.youtube.com', 'tTVKLVuRbmU', 'https://www.youtube.com/watch?v=tTVKLVuRbmU', 'https://www.youtube.com/embed/tTVKLVuRbmU', NULL, 1, '2018-03-08 09:39:05', '2018-03-08 09:39:08'),
(3, 351, 'Gorica vs. Hajduk', 'www.youtube.com', 'uAS0BOwkylc', 'https://www.youtube.com/watch?v=uAS0BOwkylc', 'https://www.youtube.com/embed/uAS0BOwkylc', NULL, 1, '2018-03-17 12:13:44', '2018-03-17 12:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `hierarchy` int(11) NOT NULL DEFAULT '0',
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `hierarchy`, `visibility`, `created_at`, `updated_at`) VALUES
(5, 'Photos', 2, 1, '2017-11-03 12:02:21', '2018-03-27 14:47:43'),
(6, 'Carousels', 3, 1, '2017-11-03 12:02:26', '2018-03-27 14:47:43'),
(7, 'Galleries', 4, 1, '2017-11-03 12:02:30', '2018-03-27 14:47:43'),
(8, 'Videos', 5, 1, '2017-11-03 12:02:35', '2018-03-27 14:47:43'),
(9, 'Locations', 7, 1, '2017-11-03 12:02:40', '2018-03-26 17:23:42'),
(20, 'Partners', 6, 1, '2018-03-15 17:27:33', '2018-03-27 14:47:43'),
(21, 'Schedules', 1, 1, '2018-03-21 18:07:25', '2018-03-27 14:47:46'),
(22, 'Marketings', 0, 1, '2018-03-26 17:23:35', '2018-03-27 14:51:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`page_id`);

--
-- Indexes for table `carousels_fragments`
--
ALTER TABLE `carousels_fragments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carousel_id` (`carousel_id`),
  ADD KEY `image_id` (`photo_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`page_id`);

--
-- Indexes for table `galleries_fragments`
--
ALTER TABLE `galleries_fragments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_id` (`gallery_id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`page_id`);

--
-- Indexes for table `marketings`
--
ALTER TABLE `marketings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`page_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`page_id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `carousels_fragments`
--
ALTER TABLE `carousels_fragments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `galleries_fragments`
--
ALTER TABLE `galleries_fragments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marketings`
--
ALTER TABLE `marketings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carousels`
--
ALTER TABLE `carousels`
  ADD CONSTRAINT `carousels_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `carousels_fragments`
--
ALTER TABLE `carousels_fragments`
  ADD CONSTRAINT `carousels_fragments_ibfk_1` FOREIGN KEY (`carousel_id`) REFERENCES `carousels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `carousels_fragments_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `galleries_fragments`
--
ALTER TABLE `galleries_fragments`
  ADD CONSTRAINT `galleries_fragments_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `galleries_fragments_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `marketings`
--
ALTER TABLE `marketings`
  ADD CONSTRAINT `marketings_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_7` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
