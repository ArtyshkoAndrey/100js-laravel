-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 18 2019 г., 14:36
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cr86568_100js`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PUBLISHED',
  `date` date NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `article_tag`
--

CREATE TABLE IF NOT EXISTS `article_tag` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `article_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `lft` int(10) UNSIGNED DEFAULT NULL,
  `rgt` int(10) UNSIGNED DEFAULT NULL,
  `depth` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `git_link` text COLLATE utf8mb4_unicode_ci,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `days`
--

INSERT INTO `days` (`id`, `body`, `title`, `short_description`, `git_link`, `views`, `slug`, `meta_description`, `meta_keywords`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'uploads/Day 1 - Random background color/index.html', 'Random background color', '<p>В этом дне реализовано изменение цвета фона при нажатии на кнопку.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%201%20-%20Random%20background%20color', 121, 'random-background-color', 'Day 1 - Random background color', 'Day 1 - Random background color', 3, '2018-07-09 13:08:58', '2018-08-26 14:26:04'),
(8, 'uploads/Day 2 - The moving block/index.html', 'The moving block', '<p>Двигающийся блок с плавной анимацией.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%202%20-%20The%20moving%20block', 69, 'the-moving-block', 'The moving block', 'The moving block', 3, '2018-07-09 13:31:41', '2018-08-26 14:26:20'),
(9, 'uploads/Day 3 - Mini quiz/index.html', 'Mini quiz', '<p>Шуточная мини викторина.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%203%20-%20Mini%20quiz', 104, 'mini-quiz', 'Mini quiz', 'Mini quiz', 3, '2018-07-09 13:37:48', '2018-08-26 14:26:27'),
(10, 'uploads/Day 4 - Piano roll/index.html', 'Piano roll', '<p>Просто мини пианино.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%204%20-%20Piano%20roll', 75, 'piano-roll', 'Piano roll', 'Piano roll', 3, '2018-07-09 13:42:53', '2018-08-26 14:26:38'),
(11, 'uploads/Day 5 - The colors of the day/index.html', 'The colors of the day', '<p>Каждая секунда дня в цветовой визуализации.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%205%20-%20The%20colors%20of%20the%20day', 57, 'the-colors-of-the-day', 'The colors of the day', 'The colors of the day', 3, '2018-07-09 13:45:38', '2018-08-26 14:27:00'),
(12, 'uploads/Day 6 - Travel to color/index.html', 'Travel by colors', '<p>Путешествие по цветам. Задай два цвета в формате <a href=\"https://yandex.ru/search/?text=%D1%86%D0%B2%D0%B5%D1%82%D0%B0%20hex&amp;lr=62\">HEX</a> и путешествуй.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%206%20-%20Travel%20to%20color', 68, 'travel-by-colors', 'Travel by colors', 'Travel by colors', 3, '2018-07-09 13:51:00', '2018-08-26 14:27:08'),
(13, 'uploads/Day 7 - Russian roulette/index.html', 'Russian roulette', '<p>Русская рулетка, проверь удачу. Мой рекорд 21.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%207%20-%20Russian%20roulette', 53, 'russian-roulette', 'Russian roulette', 'Russian roulette', 3, '2018-07-09 13:55:02', '2018-08-26 14:27:26'),
(14, 'uploads/Day 8 - Enter your phone number/index.html', 'Enter your phone number', '<p>Попробуй ввести свой номер телефона.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%208%20-%20Enter%20your%20phone%20number', 66, 'enter-your-phone-number', 'Enter your phone number', 'Enter your phone number', 3, '2018-07-09 13:59:34', '2018-08-26 14:27:33'),
(15, 'uploads/Day 9 - Weather сonditions/index.html', 'Weather conditions', '<p>Управляй погодой! Солнце или дождь?</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%209%20-%20Weather%20%D1%81onditions', 51, 'weather-conditions', 'Weather conditions', 'Weather conditions', 3, '2018-07-09 14:02:18', '2018-08-26 14:27:41'),
(16, 'uploads/Day 10 - Roguelike game(beta)/index.html', 'Roguelike game(beta)', '<p>Своеобразная игра жанра&nbsp;&quot;<a href=\"https://ru.wikipedia.org/wiki/Roguelike\">рогалик</a>&quot; с интерфейсом оформленным в текстовом стиле.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2010%20-%20Roguelike%20game(beta)', 75, 'roguelike-game-beta', 'Roguelike game(beta)', 'Roguelike game(beta)', 3, '2018-07-09 14:09:04', '2018-07-09 14:23:03'),
(17, 'uploads/Day 11 - Division into syllables/index.html', 'Division into syllables', '<p>Разделение слов на слоги. Проверить можно на&nbsp;<a href=\"http://slogi.su/\">slogi.su</a>.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2011%20-%20Division%20into%20syllables', 64, 'division-into-syllables', 'Division into syllables', 'Division into syllables', 3, '2018-07-09 14:13:10', '2018-07-09 14:13:10'),
(18, 'uploads/Day 12 - Generation of clever phrases/index.html', 'Generation of clever phrases', '<p>Случайные фразы.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2012%20-%20Generation%20of%20clever%20phrases', 44, 'generation-of-clever-phrases', 'Generation of clever phrases', 'Generation of clever phrases', 3, '2018-07-09 14:18:45', '2018-07-09 14:18:45'),
(19, 'uploads/Day 13 - Solve my barley-break/index.html', 'Solve my barley-break', '<p>Игра <a href=\"https://ru.wikipedia.org/wiki/%D0%98%D0%B3%D1%80%D0%B0_%D0%B2_15\">пятнашки</a>.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2013%20-%20Solve%20my%20barley-break', 46, 'solve-my-barley-break', 'Solve my barley-break', 'Solve my barley-break', 3, '2018-07-09 14:26:34', '2018-07-09 14:26:34'),
(20, 'uploads/Day 14 - Roguelike Game/index.html', 'Roguelike game', '<p>Завершенная&nbsp;<a href=\"https://100js.artyshko.ru/day/roguelike-game-beta\">Roguelike game(beta)</a>.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2014%20-%20Roguelike%20Game', 49, 'roguelike-game', 'Roguelike game', 'Roguelike game', 3, '2018-07-09 14:33:42', '2018-07-09 14:34:21'),
(21, 'uploads/Day 15 - The modulation of flying ball/index.html', 'The modulation of flying ball', '<p>Модуляция вертикального броска мячика.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2015%20-%20The%20modulation%20of%20flying%20ball', 40, 'the-modulation-of-flying-ball', 'The modulation of flying ball', 'The modulation of flying ball', 3, '2018-07-09 14:38:20', '2018-07-09 14:38:20'),
(22, 'uploads/Day 16 - Modulation of the biological process/index.html', 'Modulation of the biological process', '<p>Модуляция динамики популяций заяцы,&nbsp;волки, трава.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2016%20-%20Modulation%20of%20the%20biological%20process', 44, 'modulation-of-the-biological-process', 'Modulation of the biological process', 'Modulation of the biological process', 3, '2018-07-09 14:42:13', '2018-07-09 14:42:13'),
(23, 'uploads/Day 17 - Musical keyboard/index.html', 'Musical keyboard', '<p>Музыкальная клавиатура. Почуствуй себя диджеем. Некоторые клавиши могут не звучать, так как звук еще загружается.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2017%20-%20Musical%20keyboard', 51, 'musical-keyboard', 'Musical keyboard', 'Musical keyboard', 3, '2018-07-09 14:49:40', '2018-07-09 14:49:40'),
(24, 'uploads/Day 18 - Find the number PI/index.html', 'Find the number PI', '<p>Нахождение числа ПИ методом <a href=\"https://habr.com/post/128454/\">Монте-Карло</a>.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2018%20-%20Find%20the%20number%20PI', 58, 'find-the-number-pi', 'Find the number PI', 'Find the number PI', 3, '2018-07-09 14:54:23', '2018-07-09 14:54:23'),
(25, 'uploads/Day 19 - Arkanoid/index.html', 'Arkanoid', '<p>Простенькая реализация игры <a href=\"https://ru.wikipedia.org/wiki/Arkanoid\">Arkanoid</a>. Управление стрелочки, пробел, enter.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2019%20-%20Arkanoid', 199, 'arkanoid', 'Простенькая реализация игры Arkanoid.', 'Игра Arkanoid, игра arkanoid, akranoid js, арканоид', 3, '2018-07-25 06:28:39', '2018-07-28 17:11:43'),
(27, 'uploads/Day 20 - Rain of words/index.html', 'Rain of words', '<p>Словесный дождь. Напишите слово и нажмите enter. Переключив кнопку вы можете сделать слова цветными.</p>', 'https://github.com/Hugant/100js-Days/tree/master/Day%2020%20-%20Rain%20of%20words', 94, 'rain-of-words', 'rain of words', 'rain of words, дождь из слов, словесный дождь', 3, '2018-09-09 07:47:54', '2018-09-09 07:47:54');

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'artyshko.andrey@gmail.com', '2018-07-08 01:40:17', '2018-07-08 01:40:17'),
(7, 'den-549@mail.ru', '2018-07-09 09:38:19', '2018-07-09 09:38:19'),
(10, 'gron.mihail@mail.ru', '2018-07-16 11:16:33', '2018-07-16 11:16:33'),
(11, 'kate_bazi.ru@mail.ru', '2018-07-28 17:05:38', '2018-07-28 17:05:38'),
(12, 'andrej333444@mail.ru', '2018-07-29 00:44:52', '2018-07-29 00:44:52'),
(13, 'hookah5550@gmail.com', '2018-07-29 04:06:21', '2018-07-29 04:06:21'),
(14, 'kgalubinskij@gmail.com', '2018-08-15 14:10:37', '2018-08-15 14:10:37'),
(15, 'tensor-flow@mail.ru', '2018-08-20 07:03:02', '2018-08-20 07:03:02'),
(16, 'anhelika1997@yandex.ru', '2018-09-09 08:16:25', '2018-09-09 08:16:25'),
(17, 'lunara09@gmail.com', '2018-10-18 11:34:30', '2018-10-18 11:34:30'),
(18, 'fesenko.oxana@mail.ru', '2018-11-04 12:26:19', '2018-11-04 12:26:19'),
(19, 'mil.kirillka@mail.ru', '2018-11-25 02:31:22', '2018-11-25 02:31:22'),
(20, 'Elfrieda.Prosacco@gmail.com', '2018-12-02 02:43:36', '2018-12-02 02:43:36'),
(21, 'Drew.Hilll@hotmail.com', '2018-12-02 02:48:19', '2018-12-02 02:48:19'),
(22, 'Emery.Ortiz@hotmail.com', '2018-12-02 02:54:24', '2018-12-02 02:54:24');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbr` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `script` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `default` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`, `flag`, `abbr`, `script`, `native`, `active`, `default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', '', 'en', 'Latn', 'English', 1, 1, NULL, NULL, NULL),
(2, 'Romanian', '', 'ro', 'Latn', 'română', 1, 0, NULL, NULL, NULL),
(3, 'French', '', 'fr', 'Latn', 'français', 0, 0, NULL, NULL, NULL),
(4, 'Italian', '', 'it', 'Latn', 'italiano', 0, 0, NULL, NULL, NULL),
(5, 'Spanish', '', 'es', 'Latn', 'español', 0, 0, NULL, NULL, NULL),
(6, 'German', '', 'de', 'Latn', 'Deutsch', 0, 0, NULL, NULL, NULL),
(7, 'Russian', NULL, 'ru', NULL, 'Russian', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `lft` int(10) UNSIGNED DEFAULT NULL,
  `rgt` int(10) UNSIGNED DEFAULT NULL,
  `depth` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `type`, `link`, `page_id`, `parent_id`, `lft`, `rgt`, `depth`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Главная', 'page_link', '/', 2, NULL, NULL, NULL, NULL, '2018-07-09 03:21:16', '2018-07-09 03:21:16', NULL),
(2, 'Days', 'page_link', 'days', 4, NULL, NULL, NULL, NULL, '2018-07-09 03:21:16', '2018-07-09 03:21:16', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_08_04_131614_create_settings_table', 1),
(4, '2015_09_07_190535_create_languages_table', 1),
(5, '2015_09_10_124414_alter_languages_table', 1),
(6, '2016_05_05_115641_create_menu_items_table', 1),
(7, '2016_05_25_121918_create_pages_table', 1),
(8, '2017_04_10_195926_change_extras_to_longtext', 1),
(9, '2018_06_08_094211_create_cache_table', 1),
(10, '2018_06_09_083941_articles', 2),
(11, '2018_06_09_084007_categories', 2),
(12, '2018_06_09_084029_tags', 2),
(13, '2018_06_09_084057_article_tag', 2),
(14, '2018_07_01_143610_create_days_table', 3),
(15, '2018_07_02_095128_create_emails_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `extras` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `template`, `name`, `title`, `slug`, `content`, `extras`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'home', 'Index', '100 Days of JavaScript - Hugant Mirron', '/', '{\"content_title\":\"<p>100 Days<br \\/>\\r\\nof JavaScript<\\/p>\",\"by\":\"Hugant Mirron\",\"by_link\":\"https:\\/\\/hugant.github.io\"}', '{\"meta_title\":\"100 Days of JavaScript - Hugant Mirron\",\"meta_description\":\"100js, hugant, mirron, hugant mirron, days, \\u0445\\u0443\\u0433\\u0430\\u043d\\u0433, \\u043c\\u0438\\u0440\\u043e\\u043d, \\u0445\\u0443\\u0433\\u0430\\u043d\\u0442 \\u043c\\u0438\\u0440\\u043e\\u043d, 100 days of javascritp, 100 \\u0434\\u043d\\u0435\\u0439 \\u0434\\u0436\\u0430\\u0432\\u0430\\u0441\\u043a\\u0440\\u0438\\u043f\\u0442\\u0430, \\u0434\\u0436\\u0430\\u0432\\u0430\\u0441\\u043a\\u0440\\u0438\\u043f\\u0442, 100 \\u0434\\u043d\\u0435\\u0439, javascript, 100 \\u0434\\u043d\\u0435\\u0439 javascript\",\"meta_keywords\":\"100 Days of JavaScript - Hugant Mirron. \\u0421\\u043e\\u0437\\u0434\\u0430\\u044e \\u0447\\u0442\\u043e-\\u0442\\u043e \\u043d\\u043e\\u0432\\u043e\\u0435 \\u0434\\u043b\\u044f \\u043c\\u0435\\u043d\\u044f \\u043d\\u0430 \\u044f\\u0437\\u044b\\u043a\\u0435 JavaScript.\"}', '2018-07-13 13:22:05', '2018-07-15 02:56:00', NULL),
(4, 'days', 'Days', 'All days - Hugant Mirron', 'days', '<p>&nbsp; &nbsp; &nbsp; &nbsp; Проект 100 Days of JavaScript - своеобразный челлендж, который направлен на изучение языка программирования <a href=\"https://ru.wikipedia.org/wiki/JavaScript\">JavaScript</a> посредством реализации собственных идей в различных отраслях.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; Каждая такая реализация представляет собой мини-проект, именуемое как &quot;день&quot;, на который вы можете перейти и посмотреть. Помимо этого существует возможность ознакомиться с <a href=\"https://github.com/Hugant/100js-Days/tree/master\">исходным код каждого дня</a>.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; С каждым разом я изучаю для себя что-то новое и тем самым повышаю свои навыки и умения по работе с данной технологией, из чего следует что чем дальше я продвигаюсь, тем все более сложные и интересные задумки я буду реализовывать.<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; Подписывайтесь на почтовую рассылку&nbsp;или на <a href=\"https://vk.com/dojs_hugantmirron\">мою группу в вконтакте</a>&nbsp;дабы следить за появлением новых дней, впереди будет еще много всего интересного! :)</p>', '{\"meta_title\":\"All days - Hugant Mirron\",\"meta_description\":\"\\u0412\\u0441\\u0435 \\u0434\\u043d\\u0438 100js Hugant Miron\",\"meta_keywords\":\"100js, hugant, mirron, hugant mirron, days, \\u0445\\u0443\\u0433\\u0430\\u043d\\u0433, \\u043c\\u0438\\u0440\\u043e\\u043d, \\u0445\\u0443\\u0433\\u0430\\u043d\\u0442 \\u043c\\u0438\\u0440\\u043e\\u043d, 100 days of javascritp, 100 \\u0434\\u043d\\u0435\\u0439 \\u0434\\u0436\\u0430\\u0432\\u0430\\u0441\\u043a\\u0440\\u0438\\u043f\\u0442\\u0430, \\u0434\\u0436\\u0430\\u0432\\u0430\\u0441\\u043a\\u0440\\u0438\\u043f\\u0442, 100 \\u0434\\u043d\\u0435\\u0439, javascript, 100 \\u0434\\u043d\\u0435\\u0439 javascript\",\"content_title\":\"\\u0427\\u0442\\u043e \\u044d\\u0442\\u043e?\"}', '2018-07-13 14:08:21', '2018-07-28 15:12:48', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('artishko.andrei@yandex.ru', '$2y$10$qw7ymU6TsXJHsgNO1rdHAe1VgZ6I.Vgr.kl/R7wNGgXTiv0US4H3K', '2018-06-08 12:27:18'),
('artyshko.andrey@gmail.com', '$2y$10$A2HPSVFHdHHBYbny2eOL4eYcAfo4AyeS4riS/s2oaq9ngozjF6P0a', '2018-06-08 12:28:19');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `field` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `key`, `name`, `description`, `value`, `field`, `active`, `created_at`, `updated_at`) VALUES
(1, 'contact_email', 'Contact form email address', 'The email address that all emails from the contact form will go to.', 'artyshko.andrey@gmail.com', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"email\"}', 1, NULL, '2018-06-09 01:34:27'),
(2, 'contact_cc', 'Contact form CC field', 'Email addresses separated by comma, to be included as CC in the email sent by the contact form.', '', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 1, NULL, NULL),
(3, 'contact_bcc', 'Contact form BCC field', 'Email addresses separated by comma, to be included as BCC in the email sent by the contact form.', '', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"email\"}', 1, NULL, NULL),
(4, 'motto', 'Motto', 'Website motto', 'Зайди и купи', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"textarea\"}', 1, NULL, '2018-06-09 01:34:38');

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Артышко Андрей', 'artyshko.andrey@gmail.com', '$2y$10$oEW/ZdJ7LbTyjSYTeNcEv.WsRP2d/aIl2ljiaYJNuI6RgT7SKm3sq', 'Nuro89O1XaSVZxwxzhvhRUMBAXzVM9PdenEjiDLEqO7o3Hpnw75yx6Bl6M2a', '2018-07-01 11:32:09', '2018-07-01 23:46:08'),
(3, 'Hugant', 'den-549@mail.ru', '$2y$10$7kXOYap4EeEpzdRn5otDxeVkf0Fb4OG1d0LiIttetDpJ1PspkKPGy', 'OjKhiU2gjaxGSnrUCXWxd9eD0h8Q5Hq8LloKv9znAPDM6RciACXSvYb9giri', '2018-07-09 09:24:13', '2018-07-09 09:24:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
