-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2015, 01:25
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `larcms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `template_file` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `hide` tinyint(1) NOT NULL,
  `site_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `template_file`, `parent`, `weight`, `hide`, `site_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', '/', 'home', 0, 0, 0, 1, '0000-00-00 00:00:00', '2014-12-28 17:30:59'),
(5, 'Concept', 'concept', 'concept', 0, 1, 0, 1, '2014-12-07 19:33:42', '2014-12-29 10:04:16'),
(6, 'Research', '#research', '', 5, 1, 0, 1, '2014-12-07 19:34:10', '2014-12-21 16:44:34'),
(7, 'Congress', '#congress', '', 5, 2, 0, 1, '2014-12-07 19:45:26', '2014-12-21 16:44:30'),
(9, 'About us', 'about-us', 'about', 0, 2, 0, 1, '2014-12-07 19:46:16', '2015-01-19 13:27:28'),
(14, 'Topics', 'topics', 'panels', 0, 3, 0, 1, '2014-12-07 19:52:13', '2014-12-22 11:45:39'),
(15, 'Panels', '#panels', '', 14, 1, 0, 1, '2014-12-07 19:52:34', '2014-12-07 19:52:34'),
(16, 'Report', '#report', 'about', 5, 3, 0, 1, '2014-12-09 20:15:00', '2014-12-21 16:44:30'),
(18, 'Post', 'post', 'post', 0, 4, 1, 1, '2014-12-09 22:25:57', '2014-12-22 11:45:40'),
(19, 'About the project', '#about-the-project', 'concept', 5, 0, 0, 1, '2014-12-15 22:47:56', '2014-12-21 16:44:34'),
(20, 'Investments', '#inwestycje', 'panels', 15, 1, 0, 1, '2014-12-21 23:50:47', '2015-01-13 14:16:09'),
(21, 'Law and justice', '#law-and-justice', 'panels', 15, 2, 0, 1, '2014-12-21 23:51:29', '2015-01-21 11:56:17'),
(22, 'Taxes', '#podatki', 'panels', 15, 3, 0, 1, '2014-12-21 23:52:07', '2014-12-22 00:17:56'),
(23, 'Economy', '#gospodarka', 'panels', 15, 4, 0, 1, '2014-12-21 23:52:34', '2014-12-22 00:18:07'),
(24, 'Innovation', '#innowacyjnosc', 'panels', 15, 5, 0, 1, '2014-12-21 23:52:58', '2014-12-22 00:18:26'),
(25, 'Local government', '#samorzady', 'panels', 15, 6, 0, 1, '2014-12-21 23:53:22', '2014-12-22 00:19:02'),
(27, 'Keynote speakers', 'keyonte-speakers', 'ajax', 0, 5, 1, 1, '2014-12-22 11:37:26', '2014-12-22 11:52:57'),
(28, 'Home', '/', 'landing', 0, 1, 0, 2, '2014-12-28 22:21:54', '2014-12-30 20:35:10'),
(29, 'Peoples', '#peoples', 'landing', 0, 0, 0, 2, '2014-12-30 20:33:37', '2015-01-08 08:40:21'),
(30, 'Panels', '#panels', 'landing', 0, 3, 0, 2, '2014-12-30 20:36:49', '2014-12-30 21:19:45'),
(31, 'Get access', '#get-access', 'landing', 0, 4, 0, 2, '2014-12-30 20:37:18', '2014-12-30 21:19:58'),
(32, 'Contact', '#contact', 'landing', 0, 5, 0, 2, '2014-12-30 20:37:47', '2014-12-30 20:37:47'),
(33, 'Patronage', 'patronage', 'ajax', 0, 1002, 1, 1, '2015-01-19 19:15:58', '2015-01-19 19:16:00'),
(34, 'Law firms', 'law-firms', 'ajax', 0, 1003, 1, 1, '2015-01-19 19:20:05', '2015-01-19 19:20:07'),
(35, 'Business board', 'business-board', 'ajax', 0, 1005, 1, 1, '2015-01-19 19:22:47', '2015-01-19 19:22:51'),
(36, 'Political board', 'political-board', 'ajax', 0, 1006, 1, 1, '2015-01-19 19:27:20', '2015-01-19 19:27:23'),
(37, 'Economic board', 'economic-board', 'ajax', 0, 1007, 1, 1, '2015-01-19 19:29:08', '2015-01-19 19:29:10'),
(38, 'Legal board', 'legal-board', 'ajax', 0, 1008, 1, 1, '2015-01-19 19:32:03', '2015-01-19 19:32:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `key` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `key`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Partners top', 'partnersTop', 1, '2014-12-15 19:08:07', '2014-12-15 19:08:07'),
(3, 'Partners bottom', 'partnersBottom', 1, '2014-12-15 19:16:15', '2014-12-15 19:16:15'),
(4, 'Keynote speakers', 'keynoteSpeakers', 9, '2014-12-16 21:31:58', '2015-01-19 14:52:18'),
(5, 'Rada prawna', 'radaPrawna', 9, '2014-12-16 21:39:00', '2014-12-16 21:39:00'),
(6, 'Rada ekonomiczna', 'radaEkonomiczna', 9, '2014-12-16 21:55:22', '2014-12-16 21:55:22'),
(7, 'Rada polityczna', 'radaPolityczna', 9, '2014-12-16 22:05:30', '2014-12-16 22:05:30'),
(8, 'Rada biznesowa', 'galleryTwo', 9, '2014-12-16 22:16:47', '2015-01-19 14:37:17'),
(9, 'Patronaci', 'patronaci', 9, '2014-12-20 13:36:04', '2014-12-20 13:38:41'),
(10, 'Keynote speakers', 'keynoteSpeakers', 1, '2014-12-21 17:24:32', '2014-12-21 17:24:32'),
(11, 'Rada prawna', 'radaPrawna', 1, '2014-12-21 17:31:14', '2014-12-21 17:31:14'),
(12, 'Rada polityczna', 'radaPolityczna', 1, '2014-12-21 17:50:09', '2014-12-21 17:50:09'),
(13, 'Rada ekonomiczna', 'radaEkonomiczna', 1, '2014-12-21 17:51:32', '2014-12-21 17:51:32'),
(14, 'Hosts', 'host', 1, '2014-12-21 17:55:21', '2014-12-21 17:55:21'),
(15, 'Rada biznesowa', 'radaBiznesowa', 1, '2014-12-21 17:56:53', '2014-12-21 17:56:53'),
(17, 'Law firms', 'lawFirms', 9, '2015-01-19 18:53:13', '2015-01-19 18:53:13'),
(18, 'Sponsors', 'sponsors', 9, '2015-01-19 18:58:57', '2015-01-19 18:58:57'),
(19, 'Media', 'media', 9, '2015-01-19 19:00:55', '2015-01-19 19:00:55');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galleries_media`
--

CREATE TABLE IF NOT EXISTS `galleries_media` (
`id` int(10) unsigned NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `galleries_media`
--

INSERT INTO `galleries_media` (`id`, `gallery_id`, `media_id`, `weight`, `link`, `title`, `content`) VALUES
(5, 2, 3, 1, 'http://atlas.com.pl/', '', ''),
(6, 2, 5, 2, 'http://www.bzwbk.pl/', '', ''),
(7, 3, 4, 1, 'http://www.kancelariadkk.pl/', '', ''),
(8, 3, 6, 2, 'http://kancelaria.poltax.pl/', '', ''),
(9, 3, 7, 3, 'http://www.kancelaria-ms.pl/', '', ''),
(10, 3, 8, 4, 'http://www.dobreprawo.org/', '', ''),
(11, 3, 9, 5, 'http://www.komornik.pl/', '', ''),
(12, 3, 10, 6, 'https://krdp.pl/', '', ''),
(13, 4, 11, 1, '#', 'Keynote speakers', 'Prominent lawyers, economists and reformers who will share their knowledge and experiences during the congress<br /><a data-toggle="ajaxModal" data-target="#KeynoteSpeakers" href="/keyonte-speakers" style="cursor:pointer;">Show me keynote speakers</a>'),
(14, 5, 12, 1, '', 'Legal board', 'Brings together recognized lawyers – theorists and practitioners of the law <br /><a data-toggle="ajaxModal" data-target="#legalBoard" href="/legal-board" style="cursor:pointer;">Show me more</a>'),
(15, 6, 13, 1, '', 'Economic board', 'Brings together prominent economists <br /><a data-toggle="ajaxModal" data-target="#economicBoard" href="/economic-board" style="cursor:pointer;">Show me more</a>'),
(16, 7, 14, 1, '#', 'Political board', 'Brings together authors of reforms from states taking part in Forum Brings together entrepreneurs and other representatives of business environment\r\n<br /><a data-toggle="ajaxModal" data-target="#politicalBoard" href="/political-board" style="cursor:pointer;">Show me more</a>'),
(17, 8, 15, 2, '', 'Business board', 'Brings together entrepreneurs and other representatives of business environment \r\n<br /><a data-toggle="ajaxModal" data-target="#businessBoard" href="/business-board" style="cursor:pointer;">Show me more</a>'),
(18, 7, 13, 2, '#', 'Political board', 'Brings together authors of reforms from states taking part in Forum Brings together entrepreneurs and other representatives of business environment\r\n<br /><a data-toggle="ajaxModal" data-target="#politicalBoard" href="/political-board" style="cursor:pointer;">Show me more</a>'),
(20, 9, 12, 1, '#', 'Patronage', 'Organizations, institutions, universities and other entities that embraced the Forum with substantive or honorary patronage.  <br /><a data-toggle="ajaxModal" data-target="#patronage" href="/patronage" style="cursor:pointer;">Show me more</a>'),
(21, 10, 11, 1, '/about-us', 'Keynote speaker s', 'Prominent lawyers, economists and reformers who will share their knowledge and experiences during the congress<br /><a data-toggle="ajaxModal" data-target="#KeynoteSpeakers" href="/keyonte-speakers" style="cursor:pointer;">Show me keynote speakers</a>'),
(22, 11, 12, 1, '/about-us', 'Legal board', 'Brings together recognized lawyers – theorists and practitioners of the law'),
(23, 12, 14, 1, '/about-us', 'Political board', 'Brings together authors of reforms from states taking part in Forum'),
(24, 13, 13, 1, '/about-us', 'Economic board', 'Brings together prominent economists'),
(25, 14, 15, 0, '/about-us', 'Hosts', 'Law firms substantially supporting the Organizer within the given legal issue (panel)'),
(26, 15, 12, 1, '/about-us', 'Business board', 'Brings together entrepreneurs and other representatives of business environment\r\n<a data-toggle="ajaxModal" data-target="#businessBoard" href="/business-board" style="cursor:pointer;">Show me more</a>'),
(28, 17, 13, 0, '', 'Law firms', 'Law firms form the region of Central and Eastern Europe participating in the Forum.'),
(30, 18, 15, 0, '', 'Sponsors', 'Enterprises, organizations and individuals supporting Forum Project.'),
(31, 19, 15, 0, '', 'Media 1', 'Media patrons of the Project'),
(32, 19, 14, 0, '', 'Media 2', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', '{"admin":1}', '2014-11-24 17:30:17', '2014-11-24 17:30:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `realname` varchar(150) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `media`
--

INSERT INTO `media` (`id`, `name`, `realname`, `type`, `created_at`, `updated_at`) VALUES
(3, 'partner1.png', '58xmNMGU6iif.png', 'png', '2014-12-15 19:06:20', '2014-12-15 19:06:20'),
(4, 'partner2.png', 'mBnW6TWDHYr2.png', 'png', '2014-12-15 19:06:33', '2014-12-15 19:06:33'),
(5, 'partner3.png', 'j6j59Y7T0weo.png', 'png', '2014-12-15 19:06:42', '2014-12-15 19:06:42'),
(6, 'partner4.png', 'WRzRxBCxdBOl.png', 'png', '2014-12-15 19:06:50', '2014-12-15 19:06:50'),
(7, 'partner5.png', 'j8fFajhOAHGj.png', 'png', '2014-12-15 19:06:59', '2014-12-15 19:06:59'),
(8, 'partner6.png', 'NWd1QsiZ87u4.png', 'png', '2014-12-15 19:07:05', '2014-12-15 19:07:05'),
(9, 'partner7.png', 'WKQqO2qEeGIh.png', 'png', '2014-12-15 19:07:13', '2014-12-15 19:07:13'),
(10, 'partner8.png', 'a9VFgxnqKAb6.png', 'png', '2014-12-15 19:07:19', '2014-12-15 19:07:19'),
(11, 'Depositphotos_6476423_original.jpg', 'aui7h1Yc4jx7.jpg', 'jpg', '2014-12-16 21:17:00', '2014-12-16 21:17:00'),
(12, 'Depositphotos_13634023_original.jpg', 'gui8vpRYj66k.jpg', 'jpg', '2014-12-16 21:38:27', '2014-12-16 21:38:27'),
(13, 'Depositphotos_37862997_original.jpg', 'TDeAjTF60QrH.jpg', 'jpg', '2014-12-16 21:53:58', '2014-12-16 21:53:58'),
(14, 'Depositphotos_10148684_original.jpg', '0BtbI9A0DiSi.jpg', 'jpg', '2014-12-16 22:04:04', '2014-12-16 22:04:04'),
(15, 'Depositphotos_19466575_original.jpg', 'PKF9YCmoxIOP.jpg', 'jpg', '2014-12-16 22:16:12', '2014-12-16 22:16:12'),
(16, 'Depositphotos_17823903_original COPYRIGHT.jpg', 'FQ4DT7iyLhqu.jpg', 'jpg', '2015-01-19 21:04:58', '2015-01-19 21:04:58'),
(17, 'Depositphotos_20021363_original PRESS AND MEDIA LAW.jpg', 'FwAOmrQrXINn.jpg', 'jpg', '2015-01-19 21:07:54', '2015-01-19 21:07:54'),
(18, 'Zamówienia publiczne.jpg', '2VwPFNvvZAh9.jpg', 'jpg', '2015-01-20 11:22:45', '2015-01-20 11:22:45'),
(19, 'fakro_cmyk.jpg', 'S3aKbgsEk69Y.jpg', 'jpg', '2015-01-23 12:32:48', '2015-01-23 12:32:48');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2014_11_24_225016_create_categories_table', 2),
('2014_11_24_225619_create_texts_table', 3),
('2014_12_07_165646_create_posts_table', 4),
('2014_12_07_223256_create_media_table', 5),
('2014_12_12_210653_create_galleries_table', 6),
('2014_12_21_235325_create_panels_table', 7),
('2014_12_28_162045_create_site_table', 8),
('2015_01_06_223601_create_presscenter_table', 9),
('2015_01_14_135042_create_orders_table', 9),
('2015_01_15_092901_create_products_table', 9),
('2015_01_20_205918_create_people_table', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
`id` int(10) unsigned NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `panels`
--

CREATE TABLE IF NOT EXISTS `panels` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `panels`
--

INSERT INTO `panels` (`id`, `title`, `photo`, `content`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'ENERGY LAW', 'T65HVzz0YqUK.jpg', '<p><small><strong>Energy Law</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Energy Law&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Principles of operation and basic assumptions of regulated fuel and energy market</small></li>\r\n	<li><small>Concessions for activities related to the production, storage, transfer, trading, etc. of energy, fuels and carbon dioxide</small></li>\r\n	<li><small>Energy policy of the state ( including local self-government energy policy ) </small></li>\r\n	<li><small>Entities involved in the energy trading market and the possibility and the extent of participation in the trading of private entities</small></li>\r\n	<li><small>Duties and powers of energy enterprises </small></li>\r\n	<li><small>The mandatory elements of the contract for the supply of gaseous fuels or energy</small></li>\r\n	<li><small>Special provisions relating to renewable energy sources</small></li>\r\n	<li><small>Principles of carbon dioxide emissions</small></li>\r\n	<li><small>Special provisions relating to nuclear energy and radioactive waste</small></li>\r\n	<li><small>Special provisions relating to transmission corridors</small></li>\r\n	<li><small>International cooperation in the field of investments and sales of energy and fuels</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong><small>Panel&#39;s host: Law Firm</small></strong><br />\r\n<small>Kancelaria Adwokat&oacute;w i Radc&oacute;w Prawnych Dziedzic Kowalski Kornasiewicz i Partnerzy</small></p>\r\n\r\n<p><small><img alt="" src="http://www.test.law4growth.com/uploads/media/mBnW6TWDHYr2.png" style="float:left; height:117px; margin-left:20px; margin-right:20px; width:152px" />Kancelaria DKK jest niezależną firmą prawniczą świadczącą doradztwo prawne dla polskich i zagranicznych podmiot&oacute;w gospodarczych. Zesp&oacute;ł DKK liczy blisko trzydziestu prawnik&oacute;w, z czego ośmiu posiada status partnera kancelarii. Prawnicy Kancelarii DKK swoje usługi świadczą od ponad 15 lat. Pośr&oacute;d licznych specjalizacji Kancelarii DKK szczeg&oacute;lne miejsce zajmuje sektor energetyczny, w tym jego poszczeg&oacute;lne segmenty: energetyka, ciepłownictwo i gazownictwo. W tym zakresie prawnicy Kancelarii DKK posiadają wieloletnie doświadczenie wynikające ze wsp&oacute;łpracy z przedsiębiorstwami mającymi aktualnie status lidera branży.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</small></p>\r\n\r\n<p><small><strong>Panel&#39;s substantive patronage:</strong></small></p>\r\n\r\n<p><strong>Join the project</strong></p>\r\n\r\n<p><strong>Get an access to the survey</strong></p>\r\n', 23, '2014-12-21 23:42:42', '2015-01-22 06:39:09'),
(2, 'FORMAL TAX LAW', 'ihEikIXyGH22.jpg', '<p><strong>Formal Tax Law</strong></p>\r\n\r\n<p>In the framework of the &quot;Formal Tax Law&quot; panel the following issues will be raised:</p>\r\n\r\n<ul>\r\n	<li><small>Characteristics of the tax system</small></li>\r\n	<li><small>E-declarations</small></li>\r\n	<li><small>Formalism and bureaucracy</small></li>\r\n	<li><small>The enforcement of tax claims</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong><small>Panel&#39;s host:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small></strong><br />\r\n<small>Prof. dr hab. Henryk Dzwonkowski Tax Law Firm</small></p>\r\n\r\n<p><a href="http://kancelaria.poltax.pl/" target="_blank"><img alt="" src="http://www.test.law4growth.com/uploads/media/WRzRxBCxdBOl.png" style="float:left; height:106px; margin-left:20px; margin-right:20px; width:138px" /></a><small> Prof. dr hab. Henryk Dzwonkowski Tax Law Firm conducts cases in the field of widely understood economic law. In particular it concerns about tax law, treasury criminal law, public auctions law, partnerships law, customs law and administrative law.</small><br />\r\n<br />\r\n<br />\r\n<small><strong>Panel&#39;s substantive patronage:</strong><br />\r\nNational Chamber of Tax Advisors<br />\r\n<br />\r\n<a href="https://krdp.pl/" target="_blank"><img alt="" src="http://www.test.law4growth.com/uploads/media/a9VFgxnqKAb6.png" style="float:left; height:106px; margin-left:20px; margin-right:20px; width:138px" /></a> National Chamber of Tax Advisors is a professional self-government which unites tax advisors and whose one of the statutory tasks is to submit proposals in the field of constituting and application of tax law.</small><br />\r\n<br />\r\n<br />\r\nJ<small><strong>oin the project<br />\r\nGet an access to the survey</strong></small></p>\r\n', 22, '2014-12-22 00:20:46', '2015-01-22 14:32:11'),
(3, 'ARBITRATION', 'TumsjN97y7zF.jpg', '<p><strong>Arbitration</strong></p>\r\n\r\n<p><small>In the framework of the &quot;Arbitration&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Form, admissibility and effectiveness of arbitration clause</small></li>\r\n	<li><small>The composition of the arbitration board (qualifications of arbitrators, the number of arbitrators, the method of selection of the arbitrators)</small></li>\r\n	<li><small>Arbitration proceedings, the rights and obligations of the arbitration board&nbsp; including the possibility to freely settle the issue by the parties of the agreement</small></li>\r\n	<li><small>The outcome of arbitration - the way the decision was made and basis for that decision</small></li>\r\n	<li><small>Reversal of arbitration board decision</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><small><strong>Panel&#39;s host:</strong><br />\r\nKancelaria Adwokat&oacute;w i i&nbsp;Radc&oacute;w Prawnych Marcinkowski Szymański Trzeciak</small></p>\r\n\r\n<p><small>Kancelaria</small><small><a href="http://www.kancelaria-ms.pl/" target="_blank"><img alt="" src="http://www.test.law4growth.com/uploads/media/j8fFajhOAHGj.png" style="float:left; height:106px; margin-left:20px; margin-right:20px; width:138px" /></a></small><small> specjalizuje się w kompleksowej obsłudze prawnej z zakresu: finansowania projekt&oacute;w, restrukturyzacji i fuzji przedsiębiorstw, kontrakt&oacute;w menadżerskich czy ochrony&nbsp; konkurencji.<br />\r\n<br />\r\n<br />\r\n<strong>Panel&#39;s substantive patronage:</strong></small><br />\r\n<br />\r\n<small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 21, '2014-12-22 00:21:55', '2015-01-21 14:38:11'),
(4, 'PUBLIC-PRIVATE PARTNERSHIP', 'aysipVBydJIo.jpg', '<p><small><strong>Public-Private Partnership</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Public-Private Partnership&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>The concept of private partner and public entity</small></li>\r\n	<li><small>Qualifications and experience of public entities to enter into PPP contracts</small></li>\r\n	<li><small>The activities of the specialized government administration authorities, providing substantive guidance in the selection of the private partner and the proper preparation of PPP contracts</small></li>\r\n	<li><small>Procedures determining appropriate preparation of the PPP project</small></li>\r\n	<li><small>Methods for implementation of PPP and normative acts regulating them</small></li>\r\n	<li><small>Principles of selection of a private partner&nbsp;</small></li>\r\n	<li><small>Changing provisions of concluded PPP contract in terms of offer&#39;s content&nbsp;</small></li>\r\n	<li><small>PPP in the form of company&nbsp;</small></li>\r\n	<li><small>Liabilities arising from PPP contracts and the level of public debt and shortage of public finance sector&nbsp;</small></li>\r\n	<li><small>Control of the implementation of the project by private partner&nbsp;</small></li>\r\n	<li><small>Private partner&#39;s responsibilities for failing to implement or improper implementation of PPP contract</small></li>\r\n	<li><small>Lack of public funding for the preparation and implementation of investment within the PPP</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective&nbsp;</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small><a name="tw-target-text"></a>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 20, '2014-12-22 00:22:49', '2015-01-20 11:02:29'),
(5, 'PUBLIC PROCUREMENT', '7mQ2kKpkC8iQ.jpg', '<p><small><strong>Public Procurement</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Public Procurement&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Circle of public entities obliged to use procedures of granting of public procurement</small></li>\r\n	<li><small>The auction committee and its selection </small></li>\r\n	<li><small>Detailed description of the object of the public procurement and the requirements concerning contractor </small></li>\r\n	<li><small>Unreliable constructors and the possibility of their exclusion from proceeding for granitng of public procurement</small></li>\r\n	<li><small>Modes of granting of public procurement and impact of their amount on the speed and reliability of the proceeding for granting the public procurement</small></li>\r\n	<li><small>Criteria for selecting the most favourable offer</small></li>\r\n	<li><small>Criterion of the lowest price </small></li>\r\n	<li><small>Blatantly low price and the possibility of rejection of the offer in the case of determining the blatantly low price </small></li>\r\n	<li><small>Control system of granting of public procurement</small></li>\r\n	<li><small>Sanctions for violation of the rules governing the granting of public procurement</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 20, '2015-01-14 09:31:52', '2015-01-20 11:27:44'),
(6, 'ADMINISTRATION OF JUSTICE', 'csImni2ulgLR.jpg', '<p><small><strong>Administration of justice</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Administration of justice&quot; panel the following issues will be raised:</small></p>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>J<small><strong>oin the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 21, '2015-01-14 09:48:16', '2015-01-20 14:58:35'),
(7, 'CONSTRUCTION', 'kMFjnd3yh5Zo.jpg', '<p><small><strong>Construction</strong></small></p>\r\n\r\n<p><small>Within the framework of the &quot;Public Utility Buildings&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Preparation of investment of public utility buildings</small></li>\r\n	<li><small>Construction supervision</small></li>\r\n	<li><small>Adjustment of investment conducting method </small></li>\r\n	<li><small>System of general contractor and subcontractors</small></li>\r\n	<li><small>Liability for defective execution of construction works</small></li>\r\n	<li><small>Liability of the manager of costruction works</small></li>\r\n	<li><small>The obligation of keeping the journal of construction works</small></li>\r\n	<li><small>Participant of building process</small></li>\r\n	<li><small>Investment of public purpose and location of investment of public purpose in the event of lack of local zoning plan </small></li>\r\n	<li><small>Specific technical conditions that should be met by public utility builidngs and their locations </small></li>\r\n	<li><small>Regulations (so called &quot;special laws&quot;) concerning the specific kinds of investments of public purposes</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Join the project</strong></p>\r\n\r\n<p><strong>Get an access to the survey</strong></p>\r\n', 20, '2015-01-14 09:53:16', '2015-01-21 10:39:17'),
(8, 'SALES TAXES', 'P6FJNLr1NB4X.jpg', '<p><small><strong>Sales Tax</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Sales Tax&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Forms of the existing in regulations sales taxes</small></li>\r\n	<li><small>Subject of the general (common) sales tax</small></li>\r\n	<li><small>The tax base of general (common) sales tax</small></li>\r\n	<li><small>Taxpayer and payer of general (common) sales tax</small></li>\r\n	<li><small>Rate of general (common) sales tax</small></li>\r\n	<li><small>Subjective and objective tax reliefs and tax exemptions in the terms of general (common) sales tax</small></li>\r\n	<li><small>Excise</small></li>\r\n	<li><small>Tax on legal transactions</small></li>\r\n	<li><small>Other special sales taxes charging particular kind of trade</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective&nbsp;</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong><small>Panel&#39;s host:<br />\r\n<br />\r\nPanel&#39;s substantive patronage:&nbsp; </small></strong><br />\r\n<small>National Chamber of Tax Advisors</small></p>\r\n\r\n<p><small><a href="https://krdp.pl/" target="_blank"><img alt="" src="http://www.test.law4growth.com/uploads/media/a9VFgxnqKAb6.png" style="float:left; height:106px; margin-left:20px; margin-right:20px; width:138px" /></a>National Chamber of Tax Advisors is a professional self-government which unites tax advisors and whose one of the statutory tasks is to submit proposals in the field of constituting and application of tax law.<br />\r\n<br />\r\n<strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 22, '2015-01-14 09:57:14', '2015-01-22 14:34:02'),
(9, 'CREATING THE LABOR MARKET', 'NCZZ0VVP4oWv.jpg', '<p><small><strong>Creating the Labor Market</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Creating the Labor Market&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Concept of employee and employer</small></li>\r\n	<li><small>Principles of labour law</small></li>\r\n	<li><small>Costs of hiring an employee on the basis of job contract</small></li>\r\n	<li><small>The minimum wage</small></li>\r\n	<li><small>Employment relationship and ways of its development</small></li>\r\n	<li><small>Unusual forms of employment</small></li>\r\n	<li><small>Protection of stability of employment relationship</small></li>\r\n	<li><small>Working time</small></li>\r\n	<li><small>Employers&#39; trades union</small></li>\r\n	<li><small>Other than employment relationship forms of employment</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 23, '2015-01-14 10:01:49', '2015-01-19 21:59:10'),
(10, 'PRESS AND MEDIA LAW', '5e3rmI4L6q9n.jpg', '<p><small><strong>Press and Media</strong> <strong>Law</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Press and Media Law&quot; panel the following issues will be raised:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><small>Rights and duties of journalists</small></li>\r\n	<li><small>Protection of sources</small></li>\r\n	<li><small>Institutional bases for the functioning and freedom of press and media</small></li>\r\n	<li><small>Position of public media</small></li>\r\n	<li><small>Registering and issuing a press title&nbsp;</small></li>\r\n	<li><small>Registering and pursuing radio and television broadcasting activity</small></li>\r\n	<li><small>Restrictions to publishing certain content in the media</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective&nbsp;</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p>Panel&#39;s host:</p>\r\n\r\n<p>Panel&#39;s substantive patronage:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Join the project</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Get an access to the survey</strong></p>\r\n', 24, '2015-01-14 10:08:36', '2015-01-21 15:02:39'),
(11, 'COPYRIGHT LAW', '36rPFRO4Crt3.jpg', '<p><small>Copyright Law:<br />\r\nIn the framework of the &quot;Copyright Law&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Object, subject matter and scope of copyright law&nbsp;</small></li>\r\n	<li><small>Use of work without the creator&#39;s consent</small></li>\r\n	<li><small>Methods of compensating damage caused to creators by use of works without their consent</small></li>\r\n	<li><small>Transfer of copyright</small></li>\r\n	<li><small>Protection of computer software&nbsp;</small></li>\r\n	<li><small>Use of works in the digital environment</small></li>\r\n	<li><small>Liability for copyright infringement on the&nbsp;Internet&nbsp;</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective&nbsp;</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong><small>Panel&#39;s host: </small></strong></p>\r\n\r\n<p><strong><small>Panel&#39;s substantive patronage:</small></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 24, '2015-01-14 10:44:57', '2015-01-21 15:02:09'),
(12, 'ADJUSTING THE PRINCIPLES OF NATURAL RESOURCES MANAGEMENT', 'eiWXxqeRYUEI.jpg', '<p><small><strong>Adjusting the Principles of Natural Resources Management</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Adjusting the Principles of Natural Resources Management &quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Concept of minerals</small></li>\r\n	<li><small>Ownership of minerals</small></li>\r\n	<li><small>Governing of minerals owned by the State Treasury</small></li>\r\n	<li><small>The concession for exploration and recognition of mineral deposits and for the extraction of minerals from the deposits</small></li>\r\n	<li><small>Principles of working of a mining plant</small></li>\r\n	<li><small>Liability for damages caused by the work of a mining plant</small></li>\r\n	<li><small>Geological administration authorities and mining supervision authorities</small></li>\r\n	<li><small>The system of fines for non-compliance of a entrepreneur to provisions of a regulation or to decision of the competent authorities</small></li>\r\n	<li><small>Environmental protection and exploration, recognition and extraction of minerals</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 23, '2015-01-14 11:00:11', '2015-01-19 21:58:08'),
(13, 'LEGISLATION', 'DNc0Cvbz5cf6.jpg', '<p><small><strong>LEGISLATION</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Legistaltion&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Content of the land ownership law</small></li>\r\n	<li><small>The boundaries of the land ownership</small></li>\r\n	<li><small>Adjustment of the law of ownership of a real estate after II World War</small></li>\r\n	<li><small>Restriction of the law of ownership of a real estate by the mandatory establishment of easements</small></li>\r\n	<li><small>Impact of the local zoning plan on the execution of the law of ownership of a real estate</small></li>\r\n	<li><small>Restriction of the law of ownership of a real estate justified by the environmenal protection</small></li>\r\n	<li><small>Change in the area structure of the agricultural real estates, forest properties and forests</small></li>\r\n	<li><small>Restriction of acquiring the real estate by foreigners</small></li>\r\n	<li><small>Expropriation</small></li>\r\n	<li><small>Public records and real estate records and their relevance to real estate transactions</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 21, '2015-01-14 11:05:09', '2015-01-21 14:37:37'),
(14, 'LATITUDE OF BUSINESS ACTIVITY', 'jB6uaT2LigYM.jpg', '<p><small><strong>Latitude of Business Activity</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Latitude of Business Activity&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Concept of business activity</small></li>\r\n	<li><small>Latitude of business activity and necessity of registration (record) of business activity</small></li>\r\n	<li><small>Latitude of undertaking of business activity and different forms of regulating of business activity</small></li>\r\n	<li><small>Entrepreneur&#39;s possibility to apply for a written interpretation of the scope and the method of appliance of laws</small></li>\r\n	<li><small>Control of the entrepreneur&#39;s business activity</small></li>\r\n	<li><small>Regulations concerning micro, small and medium entrepreneurs</small></li>\r\n	<li><small>The principle of equivalence of business entities and departures from it</small></li>\r\n	<li><small>The possibility (restrictions) and rules of undertaking of business activities by foreigners</small></li>\r\n	<li><small>Acts of unfair competition</small></li>\r\n	<li><small>Prohibited practices restricting competition and unfair market practices</small></li>\r\n	<li><small>Competition and consumers protections authorities</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host:&nbsp; </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 23, '2015-01-14 11:17:43', '2015-01-20 11:42:44'),
(15, 'CLAIMS ENFORCEMENT', '4AntPXUlk6sq.jpg', '<p><small>Claims Enforcement</small></p>\r\n\r\n<p><small>In the framework of the &quot;Claims Enforcement&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Enforcement authorities</small></li>\r\n	<li><small>Enforcement activities and means</small></li>\r\n	<li><small>Costs of enforcement authorities activities</small></li>\r\n	<li><small>Enforcement decisions and determining their feasibility</small></li>\r\n	<li><small>Possibility of debtors to defend, in the relation to the enforcement proceeding conducted against them</small></li>\r\n	<li><small>Object of the enforcement and the order of satisfying the creditor with particular debtor&#39;s assets</small></li>\r\n	<li><small>Assets excluded by virtue of law from the enforcement</small></li>\r\n	<li><small>Methods of conducting the enforcement</small></li>\r\n	<li><small>The division of the sum obtained during the enforcement and the order of satisfying the creditors</small></li>\r\n	<li><small>Enforcement of claims in relation to entities that have declared bankruptcy</small></li>\r\n	<li><small>Enforcement of debts owed to public entities</small></li>\r\n	<li><small>Joinder of enforcements</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective&nbsp;</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong><small>Panel&#39;s host and</small> </strong><small><strong>substantive patronage:</strong><br />\r\nNational Bailiff Council</small></p>\r\n\r\n<p><small><a href="http://www.komornik.pl/" target="_blank"><img alt="" src="http://www.test.law4growth.com/uploads/media/WKQqO2qEeGIh.png" style="float:left; height:106px; margin-left:20px; margin-right:20px; width:138px" /></a>National Bailiff Council &ndash; self-government bailiff organ representing all bailiffs operating on the territory of Republic of Poland. Apart from supervising bailiffs, its operating range involves expressing opinion in cases concerning the adoption of rules of enforcement proceedings and functioning of bailiffs and other statutes having an influence on enforcement proceeding. National Bailiff Council cooperates with bailiffs organizations from other countries and actively participate in creating union projects concerning enforcement.</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><small>Join the project</small></strong></p>\r\n\r\n<p><strong><small>Get an access to the survey</small></strong></p>\r\n', 21, '2015-01-14 11:21:50', '2015-01-22 14:38:03'),
(16, 'INNOVATION', 'yuYvebdXlZ8E.jpg', '<p><small><strong>Innovation</strong></small></p>\r\n\r\n<p><small>Within the framework of the &quot;Innovation&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Protection of industrial property rights</small></li>\r\n	<li><small>Know &ndash; how and industrial property rights</small></li>\r\n	<li><small>Exclusions from industrial property rights</small></li>\r\n	<li><small>Mutual relations existing between the protection of industrial property rights, copyrights and antitrust laws, in the relation to the objects of protection of industrial property rights</small></li>\r\n	<li><small>Concept of the creator and his rights to industrial property</small></li>\r\n	<li><small>Entities entitled to file an application to Pattent Office and obtain a patent or a right for protection</small></li>\r\n	<li><small>Transferability of patent rights, protective rigths and licenes</small></li>\r\n	<li><small>Protection periods</small></li>\r\n	<li><small>Procedure of granting the patents rigths and protective rights</small></li>\r\n	<li><small>Priority and priority date</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective&nbsp;</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 24, '2015-01-14 11:26:35', '2015-01-20 11:52:38'),
(17, 'HEALTH SERVICE​', 'VHE6liLni8pX.jpg', '<p><small><strong>Health Service:</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Health service&quot; panel the following issues will be raised:</small></p>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 24, '2015-01-14 11:32:30', '2015-01-21 10:22:49'),
(18, 'CORRUPTION ', 'lE4rMWv3EVmW.jpg', '<p><small><strong>Corruption</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Corruption&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Specialised offices prosecuting, combating or counteracting corruption.</small></li>\r\n	<li><small>Provisions obligating public persons to submit financial disclosure statements.3. Provisions on lobbying activity.</small></li>\r\n	<li><small>Provisions restricting the pursuit of economic activity by persons performing public functions.</small></li>\r\n	<li><small>Provisions regarding the financing of political parties.</small></li>\r\n	<li><small>Specific provisions regarding local government employees, members of bodies of local government units and employees of public authorities.</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong><small>Panel&#39;s host: </small></strong></p>\r\n\r\n<p><strong><small>Panel&#39;s substantive patronage:</small></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 21, '2015-01-14 12:12:30', '2015-01-21 14:59:47'),
(19, 'Self - management and efficiency', 'LowjpaVe86JT.jpg', '<p><small>Self - management and Efficiency<br />\r\nIn the framework of the &quot;Self - management and Efficiency&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Structure of local government</small></li>\r\n	<li><small>Methods and principles of creation of local government units</small></li>\r\n	<li><small>Tasks of local government</small></li>\r\n	<li><small>Principles of financial economy of local government units</small></li>\r\n	<li><small>Legal acts adopted by the local government units (local law)</small></li>\r\n	<li><small>Documentation and acts preceding the adoption of a spatial plan&nbsp;</small></li>\r\n	<li><small>Financing the creation of spatial plans&nbsp;</small></li>\r\n	<li><small>Participation of society in the process of&nbsp;spatial plan&nbsp;adoption</small></li>\r\n	<li><small>Consequences of adopting the spatial plan</small></li>\r\n	<li><small>Local referendum</small></li>\r\n	<li><small>Supervision of the activity of local government units&nbsp;</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective&nbsp;</small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><small>Panel&#39;s host: </small></p>\r\n\r\n<p><small>Panel&#39;s substantive patronage:</small></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><small><strong>Join the project</strong></small></p>\r\n\r\n<p><small><strong>Get an access to the survey</strong></small></p>\r\n', 25, '2015-01-14 12:17:03', '2015-01-21 15:01:39'),
(20, 'SUBSTANTIVE TAX LAW', 'nEPzR82vEMlP.jpg', '<p><small><strong>Substantive Tax Law</strong></small></p>\r\n\r\n<p><small>In the framework of the &quot;Substantive Tax Law&quot; panel the following issues will be raised:</small></p>\r\n\r\n<ul>\r\n	<li><small>Income taxes and wealth taxes</small></li>\r\n	<li><small>The object of taxation, tax base, tax rates</small></li>\r\n	<li><small>Tax exemptions and reliefs</small></li>\r\n	<li><small>Other issues important from the freedom and economic growth perspective </small></li>\r\n</ul>\r\n\r\n<hr />\r\n<p><strong><small>Panel&#39;s host:&nbsp;</small></strong><br />\r\n<small>Prof. dr hab. Henryk Dzwonkowski Tax Law Firm</small></p>\r\n\r\n<p><a href="http://kancelaria.poltax.pl/" target="_blank"><img alt="" src="http://www.test.law4growth.com/uploads/media/WRzRxBCxdBOl.png" style="float:left; height:106px; margin-left:20px; margin-right:20px; width:138px" /></a><small> Prof. dr hab. Henryk Dzwonkowski Tax Law Firm conducts cases in the field of widely understood economic law. In particular it concerns about tax law, treasury criminal law, public auctions law, partnerships law, customs law and administrative law.</small><br />\r\n<br />\r\n<strong><small>Panel&#39;s substantive patronage:&nbsp; </small></strong><br />\r\n<small>National Chamber of Tax Advisors</small></p>\r\n\r\n<p><small><a href="https://krdp.pl/" target="_blank"><img alt="" src="http://www.test.law4growth.com/uploads/media/a9VFgxnqKAb6.png" style="float:left; height:106px; margin-left:20px; margin-right:20px; width:138px" /></a>National Chamber of Tax Advisors is a professional self-government which unites tax advisors and whose one of the statutory tasks is to submit proposals in the field of constituting and application of tax law.</small><br />\r\n<br />\r\n<br />\r\n<small><strong>Join the project<br />\r\nGet an access to the survey</strong></small></p>\r\n', 22, '2015-01-15 14:43:20', '2015-01-22 14:36:34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `people`
--

CREATE TABLE IF NOT EXISTS `people` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `people`
--

INSERT INTO `people` (`id`, `name`, `desc`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'John Doe', '<p>asdsadasd</p>\r\n', '7vfSn9rWGOjH.jpg', '2015-01-20 20:33:47', '2015-01-20 20:33:47');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `photo` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `category_id`, `created_at`, `updated_at`, `photo`) VALUES
(3, 'The research process has begun!', '<p>I Edition of &quot;The Law for Freedom and Growth&quot; - Legal Forum for the Countries of Central and Eastern Europe is devoted to legal aspects of regulation and deregulation. In this regard Organizer identified 21 legal issues (specialist panels), i.e.:</p>\r\n\r\n<ul>\r\n	<li>Public-private partnership</li>\r\n	<li>Public procurement</li>\r\n	<li>Residential building and construction permits</li>\r\n	<li>Public buildings</li>\r\n	<li>Formal tax legislation</li>\r\n	<li>Substantive tax law</li>\r\n	<li>Sales tax</li>\r\n	<li>Latitude of business activity</li>\r\n	<li>Privatization and reprivatization</li>\r\n	<li>Energy law</li>\r\n	<li>Reindustrialization</li>\r\n	<li>Adjusting the principles of the natural resource management</li>\r\n	<li>Land ownership</li>\r\n	<li>Creating the labor market</li>\r\n	<li>Claims enforcement</li>\r\n	<li>Innovation</li>\r\n	<li>Certification, approvals</li>\r\n	<li>Food control</li>\r\n	<li>Local-zoning development plans</li>\r\n	<li>Self-management of local government and efficiency</li>\r\n	<li>Arbitration</li>\r\n</ul>\r\n\r\n<p>Within above-mentioned panels&nbsp;the most important,&nbsp;detailed problematic issues were determined. They are going to be the subject of the research&nbsp;i.e. comperative studies of legal regulations in force in 21 states of Central and Eastern Europe.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2014-07-01 19:12:28', '2015-01-13 14:05:41', 'DrhIBD6Uniug.jpg'),
(4, 'First press releases about Forum', '<p>Today, on the pages of Forbes magazine, first information about &quot;The Law for Freedom and Growth&quot; Legal Forum for the Countries of Central and Eastern Europe has appeared.<br />\r\nThe content of this article can be viewed by clicking on the link below:<br />\r\n<a href="http://google.pl/" target="_blank">Go to Forbes article</a></p>\r\n', 1, '2014-09-21 20:02:43', '2015-01-13 14:01:28', 'b0MVaVDuTh9w.jpg'),
(5, 'Surveys are ready!', '<p>Selection of the best legal regulations will be based on data from surveys (fullfiled by law firms from the region) collected by Organizer.<br />\r\n<br />\r\nToday the process of developing surveys for all 21 legal issues (&quot;see the issues&quot;) was completed. Individual surveys includes from seventy to two hundred specific questions.<br />\r\n<br />\r\nSurveys questions apply to both legal status and factual status of the states taking part in Forum. It means that respondent, while fulfiling the surveys, can also evaluate how the legal regulations work in practice. Additionally each survey allows to propose improvements in current legal regulations that could have positive impact on economic growth and freedom of the country. Content of questions will be now consulted with the best law firms in Poland in order to provide the highest substantive&nbsp;level of research process.&nbsp;</p>\r\n', 1, '2014-09-26 20:04:46', '2015-01-13 13:54:53', 'oC9gfmeMAgWt.jpg'),
(6, 'Algorithm for surveys was developed', '<p>In order to provide the highest quality, special algorithm for surveys&#39; evaluation was developed. Algorithm will serve as a mean to create ranking of legal regulatations in force in 21 states of Central and Eastern Europe.</p>\r\n\r\n<p><br />\r\n<strong><em>How regulations are evaluated?</em></strong><br />\r\n<br />\r\nRanking of legal regulations is based on:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>general evaluation of legal regulations made by law firms from the region</li>\r\n	<li>evaluation of individual legal regulations made by respondents</li>\r\n	<li>evaluation of individual legal regulations made by Organizer</li>\r\n</ul>\r\n\r\n<p>In every evaluation following criteria are taking into account:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>transparency and coherence of legal regulation</li>\r\n	<li>the possibility of enforcement of legislation</li>\r\n	<li>economic benefits</li>\r\n</ul>\r\n\r\n<p>Each of above-mentioned elements will be assessed in 1- 10 scale.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '2014-10-17 20:14:45', '2015-01-13 13:48:22', '33PL6eKOsJvI.jpg'),
(7, 'Computer system of electronical forms.', '<p>We have just started preparation of special computer system enabling fullfilment of electronic surveys&nbsp;by respondents (law firms from Central and Eastern Europe). Fullfilment of the survey will be possible only after receiving special access code (token) from Organizer.<br />\r\n<br />\r\n<strong>How to receive a token from organizer</strong><br />\r\n<br />\r\n&nbsp;</p>\r\n', 1, '2014-09-29 20:24:37', '2015-01-13 13:52:28', 'ycebj7kddYey.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `presscenter`
--

CREATE TABLE IF NOT EXISTS `presscenter` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `file` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `photo`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Bilet', '<p>dfffffffffffffffffffffff</p>\r\n', '10000.00', '0', 1, '2015-01-18 17:38:07', '2015-01-18 17:38:07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `domain` varchar(150) NOT NULL,
  `theme` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `sites`
--

INSERT INTO `sites` (`id`, `name`, `domain`, `theme`, `created_at`, `updated_at`) VALUES
(1, 'Default', '', 'front', '2014-12-28 16:31:32', '2014-12-29 11:03:14'),
(2, 'landing', 'landing.local', 'landing', '2014-12-28 17:08:41', '2015-01-24 23:08:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `texts`
--

CREATE TABLE IF NOT EXISTS `texts` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `texts`
--

INSERT INTO `texts` (`id`, `title`, `key`, `content`, `category_id`, `weight`, `created_at`, `updated_at`) VALUES
(2, '21 Specialist panels', 'specjalistPanels', '<p>Forum 2015 will be devoted to the legal aspects of regulation and deregulation. 21 issues will be examined and discussed on specialist panels from above-mentioned perspective</p>\r\n', 5, 2, '2014-12-09 17:26:56', '2015-01-13 19:35:17'),
(3, 'Participants', 'participants', '<p>&nbsp;The Congress will be attended by&nbsp;1000 guests, including approximately 300 active participants giving lectures or taking part in&nbsp;discussions.</p>\r\n\r\n<p><br />\r\nParticipants of the Congress are: policymakers, the representatives of bussiness, law experts and the representatives of civil society organizations.</p>\r\n', 5, 2, '2014-12-09 17:38:09', '2015-01-13 11:44:58'),
(4, '10 months', 'months', '<div>Research and comparative studies last 10 months and are carried out by a research team cooperating with law firms from Poland and region.</div>', 5, 3, '2014-12-09 17:40:40', '2014-12-09 17:43:43'),
(5, '21 states', 'states', '<p>Research will include the analysis of the legislation of 21 states from Central and Eastern Europe&nbsp;in order to bring best solutions from freedom and growth perspective.</p>\r\n', 5, 4, '2014-12-09 18:01:06', '2015-01-13 11:46:14'),
(6, 'Goals and formula', 'goalsAndFormula', '<p>The Forum as a whole will constitute a public instrument for the promotion of comprehensive and essentially common to the entire region legislative solutions.<br />\r\n<br />\r\nThe Forum goals are:<br />\r\n- to elaborate the drafts of the legislative acts including the best&nbsp;solutions from freedom and growth perspective;</p>\r\n\r\n<p>- to communicate the effects of research and discussions undertaken during the Congress to the widest possible circle of recipients;</p>\r\n\r\n<p>- to contribute to improving the quality of legislation by invating policymakers to participate in the Forum.</p>\r\n', 5, 5, '2014-12-09 18:05:02', '2015-01-13 12:10:01'),
(7, '21 Specialist panels', 'specialistPanels', '<p>Forum 2015 will be devoted to the legal aspects of regulation and deregulation. 21 issues will be examined and discussed on specialist panels from above-mentioned perspective</p>\r\n', 5, 6, '2014-12-09 18:07:14', '2015-01-13 12:16:40'),
(8, 'Contact data', 'contactData', '<p><img alt="" src="/front/images/content/logofooterw.png" /></p>\r\n\r\n<p><br />\r\nul. Kościuszki 69/1c<br />\r\n90-436 Ł&oacute;dź<br />\r\nNIP: 728-276-92-63<br />\r\nKRS: 0000380083<br />\r\n<br />\r\nemail: forum@law4growth.com</p>\r\n', 1, 1, '2014-12-10 21:16:04', '2014-12-10 21:25:00'),
(9, 'About the project', 'aboutTheProject', '<p><strong>&ldquo;The Law for Freedom and Growth&rdquo; &shy;</strong> Legal Forum for the Countries of Central and Eastern Europe is the first of this scale in this part of Europe civic project&nbsp;involving legal, business, economic and political environments, which seeks to identify the most effective, from freedom and economic growth perspective, legal solutions.</p>\r\n\r\n<p>The Project aims to select the best legal solutions from freedom and growth perspective among 21 states of Central and Eastern Europe. In each state there are proven and effective legal solutions in force, applicable in other jurisdictions. The Forum seeks to find the best solutions, discuss them, submit them to experts&#39; evaluation and subsequently prepare drafts of model legal acts.</p>\r\n\r\n<p><strong>&ldquo;The Law for Freedom and Growth&rdquo; Forum</strong> gives the opportunity to remove legislation that is hindering business. Moreover, due to the fact that the Project is addressed to all states of Central and Eastern Europe, it prevents eurozone countries from forming caucus and overruling the non&shy;eurozone countries. The Forum shows that each state of Europe is equal and has the same chances for freedom and development.</p>\r\n\r\n<p><strong>Forum consists of following stages:</strong></p>\r\n\r\n<ul>\r\n	<li><a href="#research">Research</a></li>\r\n	<li><a href="#congress">Congress</a></li>\r\n	<li><a href="#report">Report</a></li>\r\n</ul>\r\n', 5, 10, '2014-12-15 22:01:53', '2015-01-13 13:09:26'),
(10, 'STAGE I - RESEARCH', 'stageIresearch', '<p><strong>STAGE I &ndash; RESEARCH</strong></p>\r\n\r\n<p>Selection of the best legal solutions will be based on the research conducted by Organizer<em> </em>in cooperation with law firms from the region of Central and Eastern Europe. Research consists of comparative studies of legal regulations in force in the states taking part in the Forum within each of selected legal issues (panels). Information necessary to identify the best legal solutions will be collected from detailed surveys fulfilled by the law firms (via electronic form).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Preparation of surveys and fulfillment of surveys by local experts</strong></p>\r\n\r\n<p>Surveys have been created on the basis of specially prepared for this purpose computer system that allows fulfillment of the certain survey&nbsp;only after receiving access code (token) from Organizer. Number of questions in different surveys varies from dozens to two hundreds. In addition to questions relating to the law in force in the state of origin of the respondent, the forms also makes inquires which help to determine and evaluate the operation of the legislation in practice. Moreover, each survey allows respondent&nbsp;to propose amendments to the legal acts in force in the state of his origin and to carry out a detailed evaluation of the specific legal solutions in the following categories:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<ol>\r\n		<li>\r\n		<p>general evaluation of legal regulation,</p>\r\n		</li>\r\n		<li>\r\n		<p>conciseness and clarity of legal regulation,</p>\r\n		</li>\r\n		<li>\r\n		<p>operating&nbsp;of legal regulation in practice.</p>\r\n		</li>\r\n	</ol>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Analysis of surveys outcomes</strong></p>\r\n\r\n<p>Analysis of the surveys outcomes is carried out on the basis of the computer system which allows automatic and ordered data collection. The overall evaluation of legal regulations&nbsp;in force in each state within specific legal issue&nbsp;will consist of:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Organizer&#39;s evaluation (concerning entire legal act as well as particular regulations and legal solutions),</p>\r\n	</li>\r\n	<li>\r\n	<p>Regional law firm evaluation (concerning entire legal act, particular regulations and legal solutions, as well as the operation of regulations in practice).</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Both, the Organizer evaluation and regional law firm evaluation, will be used to create a ranking of regulations in force in the states participating in the Forum. The best legal regulation will be afterwards &ldquo;improved&rdquo; in order to establish the best possible legal solution. It will be done in two steps. First is to remove such parts of the best legal regulations that were found, during the research process, harmful for business (from economic freedom and growth perspective). Second is to replace them with rules from other legal regulations which were positively evaluated.</p>\r\n', 5, 13, '2014-12-19 08:49:19', '2015-01-13 13:42:15'),
(11, 'STAGE II – CONGRESS', 'stageIICongress', '<p>Results of conducted research including the best legal solutions selected in the course of the research process will be presented on three-day congress (first in Katowice, Poland, on 27th-29th May 2015). Lectures will be completed with specialist debates&nbsp;which will be attended by representatives of the legal profession, business and political environments, as well as civil society organizations. The goal of all debates is to analyze the best legal solutions from the point of view of all represented interest groups and also to determine the conditions of their current implementation.</p>\r\n', 5, 11, '2014-12-19 09:03:36', '2015-01-13 13:23:49'),
(12, 'STAGE III – REPORT', 'stageIIIreport', '<p>Report will be the summary of the whole research process conducted within all legal issues, as well as the summary of debates and the conclusions extracted from them. Report will also contain first drafts of legal acts that may be implemented in states taking part in the Forum.</p>\r\n', 5, 12, '2014-12-19 09:05:23', '2014-12-21 16:45:37'),
(13, 'Contact data', 'contactData', '<p><img alt="" src="/front/images/content/logofooterw.png" /></p>\r\n\r\n<p><br />\r\nul. Kościuszki 69/1c<br />\r\n90-436 Ł&oacute;dź<br />\r\nNIP: 728-276-92-63<br />\r\nKRS: 0000380083<br />\r\n<br />\r\nemail: forum@law4growth.com</p>\r\n', 5, 20, '2014-12-21 22:25:19', '2014-12-21 22:25:19'),
(14, 'Contact data', 'contactData', '<p><img alt="" src="/front/images/content/logofooterw.png" /></p>\r\n\r\n<p><br />\r\nul. Kościuszki 69/1c<br />\r\n90-436 Ł&oacute;dź<br />\r\nNIP: 728-276-92-63<br />\r\nKRS: 0000380083<br />\r\n<br />\r\nemail: forum@law4growth.com</p>\r\n', 9, 21, '2014-12-21 22:33:20', '2014-12-21 22:33:20'),
(15, 'Contact data', 'contactData', '<p><img alt="" src="/front/images/content/logofooterw.png" /></p>\r\n\r\n<p><br />\r\nul. Kościuszki 69/1c<br />\r\n90-436 Ł&oacute;dź<br />\r\nNIP: 728-276-92-63<br />\r\nKRS: 0000380083<br />\r\n<br />\r\nemail: forum@law4growth.com</p>\r\n', 14, 22, '2014-12-21 22:38:44', '2014-12-21 22:38:44'),
(16, 'Keynote speakers', 'keynoteSpeakers', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tempus facilisis metus. Suspendisse fringilla molestie euismod. Integer non eros vitae risus blandit eleifend in nec massa. Vivamus interdum cursus mi, id iaculis justo vehicula ac. Praesent ac maximus orci, euismod tristique ligula. Proin non nisl maximus, placerat nisl ac, volutpat justo. Cras consequat orci sapien, nec varius est euismod quis. Fusce vel tincidunt diam. Praesent in nisi id neque euismod ultrices. Pellentesque id blandit ante. Pellentesque vel accumsan massa, sit amet dapibus turpis.</p>\r\n', 27, 1, '2014-12-22 12:01:39', '2014-12-22 12:01:39'),
(17, 'Contact data', 'contactData', '<p><img alt="" src="/front/images/content/logofooterw.png" /></p>\r\n\r\n<p><br />\r\nul. Kościuszki 69/1c<br />\r\n90-436 Ł&oacute;dź<br />\r\nNIP: 728-276-92-63<br />\r\nKRS: 0000380083<br />\r\n<br />\r\nemail: forum@law4growth.com</p>\r\n', 18, 1, '2014-12-22 12:06:57', '2014-12-22 12:06:57'),
(18, 'Patronage', 'patronage', '<p>ssdfsdf sdfsdfsd</p>\r\n', 33, 1, '2015-01-19 19:17:18', '2015-01-19 19:17:18'),
(19, 'Law firms', 'lawFirms', '<p>sdfds</p>\r\n', 34, 1, '2015-01-19 19:20:35', '2015-01-19 19:20:35'),
(20, 'Business board', 'businessBoard', '<p>fdfgdfgd</p>\r\n', 35, 1, '2015-01-19 19:23:29', '2015-01-19 19:23:29'),
(21, 'Political board', 'politicalBoard', '<p>dsfsdfsdf</p>\r\n', 36, 1, '2015-01-19 19:27:46', '2015-01-19 19:27:46'),
(22, 'Economic board', 'economicBoard', '<p>dssdfsdfsdfsdf</p>\r\n', 37, 1, '2015-01-19 19:29:28', '2015-01-19 19:29:28'),
(23, 'Legal board', 'legalBoard', '<p>sdfsdfsdfsdf</p>\r\n', 38, 1, '2015-01-19 19:32:26', '2015-01-19 19:32:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 1, '::1', 0, 0, 0, NULL, NULL, NULL),
(3, 1, '31.182.80.185', 0, 0, 0, NULL, NULL, NULL),
(4, 1, '87.204.168.66', 0, 0, 0, NULL, NULL, NULL),
(5, 1, '212.191.81.221', 0, 0, 0, NULL, NULL, NULL),
(6, 1, '31.1.245.249', 0, 0, 0, NULL, NULL, NULL),
(7, 1, '109.173.208.82', 0, 0, 0, NULL, NULL, NULL),
(8, 1, '95.40.206.26', 0, 0, 0, NULL, NULL, NULL),
(9, 1, '95.40.206.26', 0, 0, 0, NULL, NULL, NULL),
(10, 1, '109.173.209.73', 0, 0, 0, NULL, NULL, NULL),
(11, 1, '46.76.113.211', 0, 0, 0, NULL, NULL, NULL),
(12, 1, '95.41.193.207', 0, 0, 0, NULL, NULL, NULL),
(13, 1, '77.65.83.198', 0, 0, 0, NULL, NULL, NULL),
(14, 1, '176.221.120.211', 0, 0, 0, NULL, NULL, NULL),
(15, 1, '95.41.7.238', 0, 0, 0, NULL, NULL, NULL),
(16, 1, '77.112.95.200', 0, 0, 0, NULL, NULL, NULL),
(17, 1, '37.7.36.223', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` text,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) DEFAULT NULL,
  `reset_password_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'm.jedrasz@gmail.com', '$2y$10$rCd2CJYBO8.qj247zs6N8uQgD7HmDpFLngS5dFmdnwvR7IJ7z8cSK', NULL, 1, NULL, NULL, '2015-01-24 23:07:43', '$2y$10$LvgOG8ydJQCQhuAyMW5WHewhHGaYzM8CPg6AndAT9Pnn5Gn4bwuoC', NULL, 'Michał', 'Jędraszczyk', '2014-11-24 17:30:17', '2015-01-24 23:10:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries_media`
--
ALTER TABLE `galleries_media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panels`
--
ALTER TABLE `panels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presscenter`
--
ALTER TABLE `presscenter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
 ADD PRIMARY KEY (`id`), ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD KEY `users_activation_code_index` (`activation_code`), ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT dla tabeli `galleries`
--
ALTER TABLE `galleries`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `galleries_media`
--
ALTER TABLE `galleries_media`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `media`
--
ALTER TABLE `media`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `orders_products`
--
ALTER TABLE `orders_products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `panels`
--
ALTER TABLE `panels`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `people`
--
ALTER TABLE `people`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `presscenter`
--
ALTER TABLE `presscenter`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `sites`
--
ALTER TABLE `sites`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `texts`
--
ALTER TABLE `texts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT dla tabeli `throttle`
--
ALTER TABLE `throttle`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
