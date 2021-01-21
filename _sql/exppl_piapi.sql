-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 21 Sty 2021, 10:31
-- Wersja serwera: 10.1.48-MariaDB-cll-lve
-- Wersja PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `exppl_piapi`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `conferences_actives`
--

CREATE TABLE `conferences_actives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cm` int(11) NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_pin` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `access_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_description` text COLLATE utf8mb4_unicode_ci,
  `registration_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone_offset` int(11) DEFAULT NULL,
  `paid_enabled` int(11) DEFAULT NULL,
  `automated_enabled` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `permanent_room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_presenter_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_listener_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widgets_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autologin_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `conferences_actives`
--

INSERT INTO `conferences_actives` (`id`, `id_cm`, `room_type`, `room_pin`, `name`, `name_url`, `starts_at`, `ends_at`, `access_type`, `lobby_enabled`, `lobby_description`, `registration_enabled`, `status`, `timezone`, `timezone_offset`, `paid_enabled`, `automated_enabled`, `created_at`, `updated_at`, `type`, `permanent_room`, `ccc`, `room_url`, `phone_presenter_pin`, `phone_listener_pin`, `embed_room_url`, `widgets_hash`, `autologin_hash`) VALUES
(1352, 4738824, 'webinar', 892229498, 'Ochrona urządzeń i aparatów przed skutkami wybuchu pyłów', 'ochrona-urzadzen-i-aparatow-przed-skutkami-wybuchu-pylow', '2021-01-27 09:00:00', '2021-01-27 10:30:00', '1', '1', '', '1', 'active', 'Europe/Warsaw', 3600, 0, 1, '2020-06-16 01:37:55', '2021-01-20 10:50:09', 2, '0', '2021-01-27 09:00:00', 'https://sebastian324.clickmeeting.com/ochrona-urzadzen-i-aparatow-przed-skutkami-wybuchu-pylow', '678965153', '749841392', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151474738824', 'Ha1t77', 'AQpmBQtlARO8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsROkBGEhA3OiAGEkZmR1ZJ8lAQZkowOjZQN2ZQN4paZ1pxO8YKkN'),
(1353, 4731411, 'webinar', 589675285, 'Poprawny dobór zabezpieczeń przeciwwybuchowych dla jednostek odpylających', 'poprawny-dobor-zabezpieczen-przeciwwybuchowych-dla-jednostek-odpylajacych', '2021-01-26 09:00:00', '2021-01-26 10:50:00', '1', '1', '', '1', 'active', 'Europe/Warsaw', 3600, 0, 1, '2020-06-15 09:14:00', '2021-01-19 11:00:05', 2, '0', '2021-01-26 09:00:00', 'https://sebastian324.clickmeeting.com/poprawny-dobor-zabezpieczen-przeciwwybuchowych-dla-jednostek-odpylajacych', '858245424', '624131822', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151474731411', 'HAXG76', 'AQpmZGDkZHO8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsRNlZmDmpGtkZmZkpJ41BGpmo3RjA3AiZQN2ZQN4paZ1pxO8YKkN'),
(1354, 4707517, 'webinar', 784578182, 'Oświetlenie podstawowe i awaryjne w strefach zagrożenia wybuchem', 'oswietlenie-podstawowe-i-awaryjne-w-strefach-zagrozenia-wybuchem', '2021-01-21 10:00:00', '2021-01-21 01:40:00', '1', '1', '', '1', 'active', 'Europe/Warsaw', 3600, 0, 1, '2020-06-25 01:13:24', '2021-01-14 01:50:09', 2, '0', '2021-01-21 10:00:00', 'https://sebastian324.clickmeeting.com/oswietlenie-podstawowe-i-awaryjne-w-strefach-zagrozenia-wybuchem', '433437789', '494924587', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151474707517', 'HUSiea', 'AQpjAmHkA0O8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsRNlomDkAwOhpmR3ZUR5pGp2pKOjomxmZQN2ZQN4paZ1pxO8YKkN'),
(1355, 4707305, 'webinar', 221552426, 'Awaryjne oświetlenie ewakuacyjne i zapasowe a prawo i normy', 'awaryjne-oswietlenie-ewakuacyjne-i-zapasowe-a-prawo-i-normy-a', '2021-01-21 11:10:00', '2021-01-21 01:20:00', '1', '1', '', '1', 'active', 'Europe/Warsaw', 3600, 0, 1, '2020-09-21 08:06:54', '2021-01-14 01:30:11', 2, '0', '2021-01-21 11:10:00', 'https://sebastian324.clickmeeting.com/awaryjne-oswietlenie-ewakuacyjne-i-zapasowe-a-prawo-i-normy-a', '341978223', '444857764', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151474707305', 'HUZ96a', 'AQpjAmZjAHO8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsRN1p3N3pQukZwRjowqlo29mBQVjAQNkZQN2ZQN4paZ1pxO8YKkN'),
(1356, 4687618, 'webinar', 245963763, 'Wyładowania elektrostatyczne jako przyczyna wybuchu - jak się chronić', 'wyladowania-elektrostatyczne-jako-przyczyna-wybuchu-jak-sie-chronic', '2021-06-28 08:30:00', '2021-06-28 10:00:00', '1', '1', '', '1', 'active', 'Europe/Warsaw', 3600, 0, 0, '2021-01-11 01:15:45', '2021-01-11 01:15:45', 0, '0', '2021-06-28 08:30:00', 'https://sebastian324.clickmeeting.com/wyladowania-elektrostatyczne-jako-przyczyna-wybuchu-jak-sie-chronic', '818214476', '653231549', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151474687618', 'HN4U17', 'AQL4AmLkBRO8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsRN1ZwtmAGp1owNlowOhZKNmp3NmAKNlZQN2ZQN4paZ1pxO8YKkN'),
(1357, 4096472, 'webinar', 458858872, 'Poprawny dobór zabezpieczeń przeciwwybuchowych dla jednostek odpylających on demand', 'poprawny-dobor-zabezpieczen-przeciwwybuchowych-dla-jednostek-odpylajacych-on-demand', NULL, NULL, '1', '1', '', '1', 'active', 'UTC', 0, 0, 0, '2020-09-23 07:09:10', '2020-10-01 07:07:47', 3, '1', NULL, 'https://sebastian324.clickmeeting.com/poprawny-dobor-zabezpieczen-przeciwwybuchowych-dla-jednostek-odpylajacych-on-demand', '975114737', '915762945', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151474096472', '93Tk46', 'AQN5AwD3ZxO8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsROiAJ43pwp2ZmD4AGOlZwtlpmtjowWhZQN2ZQN4paZ1pxO8YKkN'),
(1358, 3843874, 'webinar', 332736515, 'Test warsztatu na żądanie', 'test-warsztatu-na-zadanie', NULL, NULL, '1', '1', '', '0', 'active', 'UTC', 0, 0, 0, '2020-07-18 06:44:49', '2020-07-18 06:44:49', 3, '1', NULL, 'https://sebastian324.clickmeeting.com/test-warsztatu-na-zadanie', '851725494', '822332352', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151473843874', 'qmKo51', 'Zmt0Zmt3ARO8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsRN4ZmOlZ3Sioz41ZJ9mpGWjpQyhZUN3ZQN2ZQN4paZ1pxO8YKkN'),
(1359, 2894823, 'webinar', 261486191, 'Spotkanie otwarte permanentnie', 'spotkanie-otwarte-permanentnie', NULL, NULL, '1', '1', '<p><strong>Termin: 29.04.20&nbsp; &nbsp;|&nbsp; &nbsp;10:00 –\n11:30</strong></p>\n<p><strong>Planowana długość warsztatu obejmuje poniższy program\noraz sesję pytań i odpowiedzi. W przypadku dużej ilości pytań\nwarsztat może zostać przedłożony.</strong><br></p>\n<p><strong><br></strong></p>\n<p><strong>PROGRAM</strong></p>\n<hr id=\"null\">\n<p><strong>Podstawy teoretyczne i prawne</strong><br></p>\n<p>Krótkie wprowadzenie pozwoli Ci zdobyć niezbędna wiedzę\nprzydatną w dalszej części warsztatów.<br></p>\n<ul>\n<li>wybuch i jego konsekwencje</li>\n<li>przepisy dotyczące zabezpieczeń przed skutkami wybuchu</li>\n</ul>\n<hr id=\"null\">\n<p><strong>Odciążanie i tłumienie wybuchu</strong></p>\n<p>Panel dotyczący prawidłowej ochrony urządzeń i aparatów (np.\nsilosów, filtrów odpylających, młynów, suszarni, ) przed skutkami\nwybuchy. Dużą wartość panelu stanowią filmy pokazujące skutki\nwybuchu w przypadku prawidłowo i nieprawidłowo zabezpieczonych\ninstalacji.</p>\n<ul>\n<li>zalety i ograniczenia odciążania, bezpłomieniowego odciążania i\ntłumienia wybuchu</li>\n<li>zasady poprawnego doboru</li>\n<li>najczęściej popełniane błędy</li>\n<li>przykłady zastosowania</li>\n</ul>\n<hr id=\"null\">\n<p><strong>Izolacja wybuchu</strong></p>\n<p>Izolacja wybuchu stanowi bardzo ważny element systemu\nminimalizującego wybuch w instalacji. Niestety często jest pomijany\nlub stosowany nieprawidłowo, co sprawia, że inne zastosowane\nzabezpieczenia są nieskuteczne. Także i w tym przypadku\nprzedstawimy szereg filmów pokazujących skutki wybuchu w przypadku\nprawidłowo i nieprawidłowo zabezpieczonej instalacji.</p>\n<ul>\n<li>dostępne rozwiązania techniczne</li>\n<li>zalety i ograniczenia poszczególnych rozwiązań</li>\n<li>zasady poprawnego doboru</li>\n<li>najczęściej popełniane błędy</li>\n<li>przykłady zastosowania</li>\n</ul>\n', '1', 'active', 'UTC', 0, 0, 0, '2020-03-16 06:31:20', '2020-06-19 05:13:51', 1, '1', NULL, 'https://sebastian324.clickmeeting.com/spotkanie-otwarte-permanentnie', '361544', '658468', 'https://embed.clickwebinar.com/embed_conference.html?r=1712151472894823', 'rwFi60', 'Zwt5AQtlZ0O8YKkNMv50MJuzoKuhDUEynTAhYJcvrKAmYaWbDUjgsROHEHuQGvOXDyyGH0O8YKkNDUjgsRN2BKNjZmElpT45BQN1ompjpQL1pGZkZQN2ZQN4paZ1pxO8YKkN');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `conferences_inactives`
--

CREATE TABLE `conferences_inactives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cm` int(11) NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_pin` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `ends_at` datetime DEFAULT NULL,
  `access_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_description` text COLLATE utf8mb4_unicode_ci,
  `registration_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone_offset` int(11) DEFAULT NULL,
  `paid_enabled` int(11) DEFAULT NULL,
  `automated_enabled` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `permanent_room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_presenter_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_listener_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widgets_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autologin_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `iinactives`
--

CREATE TABLE `iinactives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idcm` int(11) NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_pin` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_at` date DEFAULT NULL,
  `ends_at` date DEFAULT NULL,
  `access_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_description` text COLLATE utf8mb4_unicode_ci,
  `registration_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone_offset` int(11) DEFAULT NULL,
  `paid_enabled` int(11) DEFAULT NULL,
  `automated_enabled` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `permanent_room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_presenter_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_listener_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widgets_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autologin_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `iinactivesessionrooms`
--

CREATE TABLE `iinactivesessionrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_room` int(11) NOT NULL,
  `iinactivesessions_idsession` bigint(20) UNSIGNED NOT NULL,
  `total_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `iinactivesessions`
--

CREATE TABLE `iinactivesessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idsession` int(11) NOT NULL,
  `iinactives_idcm` bigint(20) UNSIGNED NOT NULL,
  `total_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inactives`
--

CREATE TABLE `inactives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idcm` int(11) NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_pin` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_at` date DEFAULT NULL,
  `ends_at` date DEFAULT NULL,
  `access_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobby_description` text COLLATE utf8mb4_unicode_ci,
  `registration_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone_offset` int(11) DEFAULT NULL,
  `paid_enabled` int(11) DEFAULT NULL,
  `automated_enabled` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `permanent_room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_presenter_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_listener_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed_room_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widgets_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autologin_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_06_125840_create_jobs_table', 1),
(5, '2020_10_07_182847_add_new_fields_to_users_table', 1),
(6, '2020_11_10_075010_create_conferences_active_table', 1),
(7, '2020_11_10_075016_create_conferences_inactive_table', 1),
(8, '2020_11_18_130048_create_posts_table', 1),
(9, '2020_11_23_143300_create_session_rooms_table', 1),
(10, '2020_11_23_143310_create_sessions_table', 1),
(11, '2020_11_24_102820_create_inactives_table', 1),
(12, '2020_11_24_124702_create_iinactives_table', 1),
(13, '2020_11_24_124800_create_iinactivesessions_table', 1),
(14, '2020_11_24_124811_create_iinactivesessionrooms_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_session` int(11) NOT NULL,
  `total_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `session_rooms`
--

CREATE TABLE `session_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_room` int(11) NOT NULL,
  `total_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_visitors` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `conferences_actives`
--
ALTER TABLE `conferences_actives`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `conferences_inactives`
--
ALTER TABLE `conferences_inactives`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `iinactives`
--
ALTER TABLE `iinactives`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `iinactivesessionrooms`
--
ALTER TABLE `iinactivesessionrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iinactivesessionrooms_iinactivesessions_idsession_foreign` (`iinactivesessions_idsession`);

--
-- Indeksy dla tabeli `iinactivesessions`
--
ALTER TABLE `iinactivesessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iinactivesessions_iinactives_idcm_foreign` (`iinactives_idcm`);

--
-- Indeksy dla tabeli `inactives`
--
ALTER TABLE `inactives`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `session_rooms`
--
ALTER TABLE `session_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `conferences_actives`
--
ALTER TABLE `conferences_actives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1360;

--
-- AUTO_INCREMENT dla tabeli `conferences_inactives`
--
ALTER TABLE `conferences_inactives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `iinactives`
--
ALTER TABLE `iinactives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `iinactivesessionrooms`
--
ALTER TABLE `iinactivesessionrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `iinactivesessions`
--
ALTER TABLE `iinactivesessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `inactives`
--
ALTER TABLE `inactives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `session_rooms`
--
ALTER TABLE `session_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `iinactivesessionrooms`
--
ALTER TABLE `iinactivesessionrooms`
  ADD CONSTRAINT `iinactivesessionrooms_iinactivesessions_idsession_foreign` FOREIGN KEY (`iinactivesessions_idsession`) REFERENCES `iinactivesessions` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `iinactivesessions`
--
ALTER TABLE `iinactivesessions`
  ADD CONSTRAINT `iinactivesessions_iinactives_idcm_foreign` FOREIGN KEY (`iinactives_idcm`) REFERENCES `iinactives` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
