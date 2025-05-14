-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2025 pada 20.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(8, 'public/banner-image/2022-10-24-23-19-09.jpeg', 'http://localhost/GameNewsSite/', '2022-10-24 14:19:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'Technology', '2022-10-24 09:26:37', '2022-10-24 09:26:43'),
(15, 'Esport', '2022-10-24 09:36:05', '2025-05-09 00:22:48'),
(16, 'Education', '2022-10-24 09:49:39', '2025-05-09 00:22:56'),
(17, 'Tips & Tricks', '2022-10-24 10:00:18', '2025-05-09 00:23:09'),
(20, 'Others', '2025-05-09 00:23:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` enum('unseen','seen','approved') NOT NULL DEFAULT 'unseen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(320) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bilqis Mufida', 'bilqismufida207@gmail.com', 'In my opinion, the website’s color scheme is quite problematic. Not only does it lack aesthetic appeal, but it also significantly hinders user experience by making navigation and readability more challenging. As a result, visitors may find it frustrating and inconvenient to engage with the content effectively.', '2025-05-05 10:20:28', NULL),
(2, 'Bilqis Mufida', 'bilqismufida207@gmail.com', 'wmng', '2025-05-07 11:24:42', NULL),
(3, 'Bilqis Mufida', 'bilqismufida207@gmail.com', 'ita ', '2025-05-07 11:25:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(300) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `parent_id`, `created_at`, `updated_at`) VALUES
(9, 'most visited', '#', NULL, '2019-07-17 12:05:11', '2022-10-24 11:33:11'),
(12, 'about us ', 'http://localhost/GameNewsSite/', NULL, '2022-10-24 14:38:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `summary` text NOT NULL,
  `body` text NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('disable','enable') NOT NULL DEFAULT 'disable',
  `selected` tinyint(5) NOT NULL DEFAULT 1,
  `breaking_news` tinyint(5) NOT NULL DEFAULT 1,
  `post_status` enum('unseen','seen','approved') CHARACTER SET utf16 COLLATE utf16_persian_ci NOT NULL DEFAULT 'unseen',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `summary`, `body`, `view`, `user_id`, `cat_id`, `image`, `status`, `selected`, `breaking_news`, `post_status`, `created_at`, `updated_at`) VALUES
(37, 'Ubisoft Dituduh Kumpulkan Data Diam-Diam dari Pemain Single-Player', 'Ubisoft dilaporkan mendapat komplain dari agensi perlindungan data Austria, Noyb, karena diduga mengumpulkan data pemain secara diam-diam saat bermain game single-player.', '<p>Ubisoft dilaporkan mendapat komplain dari agensi perlindungan data Austria, Noyb, karena diduga mengumpulkan data pemain secara diam-diam saat bermain game single-player. Menurut laporan, pengumpulan data ini dilakukan tanpa dasar hukum yang valid, melanggar regulasi GDPR yang mengatur perlindungan data pribadi di Eropa.</p><p><br></p><p>Noyb menyatakan bahwa Ubisoft memaksa pemain untuk selalu online, bahkan saat memainkan game tanpa fitur online, sehingga memungkinkan perusahaan mengakses informasi seperti waktu bermain dan durasi permainan. Mereka juga menilai Ubisoft gagal memberikan penjelasan jelas terkait alasan koneksi wajib tersebut.</p><p><br></p><p>Jika komplain ini berhasil, Ubisoft terancam denda hingga 92 juta Euro dan diwajibkan menghapus semua data pribadi yang dikumpulkan tanpa legalitas yang sah. Kasus ini bisa berdampak besar terhadap reputasi dan operasi Ubisoft ke depan.&nbsp;</p>', 1, 21, 20, 'public/post-image/2025-05-08-19-35-14.jpeg', 'disable', 1, 1, 'approved', '2025-05-09 00:35:14', '2025-05-09 00:52:23'),
(38, 'Tainted Grail: The Fall of Avalon Rilis 23 Mei 2025', 'Tainted Grail: The Fall of Avalon resmi rilis pada 23 Mei 2025 setelah sukses melalui masa Early Access. Game ini menawarkan pengalaman RPG dunia terbuka dengan nuansa gelap yang terinspirasi dari legenda Arthurian.', '<p>Tainted Grail: The Fall of Avalon resmi rilis pada 23 Mei 2025 setelah sukses melalui masa Early Access. Game ini menawarkan pengalaman RPG dunia terbuka dengan nuansa gelap yang terinspirasi dari legenda Arthurian, di mana pemain menjelajahi Avalon yang dilanda wabah Red Death dan kekacauan akibat Wyrdness.</p><p><br></p><p>Pemain akan bertualang di tiga zona besar dengan tantangan unik, bertarung menggunakan senjata atau sihir, serta membuat pilihan penting yang membentuk jalannya cerita. Dengan lebih dari 200 misi sampingan, 70 dungeon, dan NPC berkarakter kuat, game ini menjanjikan petualangan yang mendalam dan penuh variasi.</p><p><br></p><p>Tainted Grail: The Fall of Avalon menghadirkan dunia kelam yang sarat misteri dan pilihan moral, cocok untuk pecinta RPG dan cerita kompleks. Bagi yang tertarik, informasi lebih lanjut tersedia di halaman Steam resminya.&nbsp;</p>', 1, 21, 20, 'public/post-image/2025-05-08-19-38-12.jpeg', 'disable', 1, 1, 'approved', '2025-05-09 00:38:12', '2025-05-09 00:52:24'),
(39, 'Ghost of Yotei: Aksi Epik Ronin di PS5, Oktober 2025!', 'Ghost of Yotei adalah game aksi petualangan eksklusif PS5 yang akan dirilis pada 2 Oktober 2025. Berlatar di Ezo pada tahun 1603, pemain mengikuti kisah Atsu, seorang Ronin yang memburu kelompok kriminal Yotei Six setelah keluarganya dibantai.', '<p>Ghost of Yotei adalah game aksi petualangan eksklusif PS5 yang akan dirilis pada 2 Oktober 2025. Berlatar di Ezo pada tahun 1603, pemain mengikuti kisah Atsu, seorang Ronin yang memburu kelompok kriminal Yotei Six setelah keluarganya dibantai.</p><p><br></p><p>Game ini menawarkan dunia terbuka yang luas dengan sistem non-linear, memungkinkan pemain memilih urutan target, menyelesaikan kontrak, dan melatih kemampuan. Visual memukau dan efek cuaca dinamis menjadi keunggulan berkat kekuatan PS5.</p><p><br></p><p>Ghost of Yotei hadir dalam tiga edisi dengan bonus pre-order seperti topeng dalam game dan avatar eksklusif. Dengan narasi kuat dan gameplay imersif, game ini menjadi salah satu rilisan PS5 paling ditunggu tahun ini.&nbsp;</p>', 14, 21, 20, 'public/post-image/2025-05-08-19-40-34.jpeg', 'disable', 1, 1, 'approved', '2025-05-09 00:40:34', '2025-05-09 00:52:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `permission` enum('user','admin','author') NOT NULL DEFAULT 'user',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'gamenewssite@admin.com', '$2y$10$IN3YIlgIvxiHxdBvNVz/GOm72x2h5aBvV9J2QmsVhLLwkvooKBhbm', 'admin', '2023-06-12 16:17:46', '2023-06-12 16:31:15'),
(2, 'louis', 'louis@yahoo.com', '$2y$10$kUh4xMjKTXeNiy7jSIJO6.LOVBth9hQiPwMi0BgD.ao2uWBDn1OB.', 'user', '2021-06-23 23:35:51', '2019-07-05 02:10:50'),
(3, 'kam', 'kamran@gmail.com', '$2y$10$nlZ5dMJ2sv9HrKU4NJslDe0ick10lGSBZNM2i14zKtDGGAEqAdXVS', 'user', '2019-06-06 01:28:40', '2023-06-12 16:13:53'),
(4, 'nova', 'nova@yahoo.com', '$2y$10$CrqnkHtp2dKlyHfYRniXG.B8fWtrHtfavUyGVqc6bdiiF5lgwzi96', 'user', '2019-10-27 21:56:13', '2019-10-27 22:18:23'),
(16, 'rampli', 'rampli@wandek.com', '$2y$10$JEFKwA/Rr5ybDLv0QIb0MOHdTMic0sqtbDQesQuUqtHrkSlI2nnDW', 'user', '2025-04-17 14:38:46', '2025-04-17 14:38:58'),
(17, 'bilqish', 'bilqismufida207@gmail.com', '$2y$10$AVeYsrv38kMSyKpGzQZezOsKVjOyMa5qo6bmv.OrVzB/iPi93PSPu', 'user', '2025-04-19 02:06:01', '2025-05-05 09:59:46'),
(18, 'sausan', 'sausan@gmail.com', '$2y$10$ieDQt.He4PQn9yjxXrMYye9cPodbd8VAcrTLztIj1f3TJ4.Rmk21.', 'user', '2025-04-21 16:03:48', NULL),
(19, 'prabowo', 'presiden@negara.id', '$2y$10$jT6pV2sY/xTvENvKW/ER.ujIyJXEQ9UBnaI/mzG4jqpPsMGNuaLy.', 'admin', '2025-04-22 22:55:14', '2025-05-02 09:54:49'),
(20, 'teddy', 'teddy@mayor.id', '$2y$10$dQmGhwQMlux80oq.xdxRM.KLxcY3kACEyFVNuqWHB9WqwIAc7L9rK', 'user', '2025-04-24 15:39:18', NULL),
(21, 'Authorzz', 'author@gamenewssite.com', '$2y$10$jSHfuhyb.OJ7xfllBwRhSu.HzacDzvExKbbb7xUZmlFKhWG/chGt.', 'author', '2025-05-02 16:49:44', '2025-05-05 09:56:54'),
(22, 'bilqis', 'bilqismufii@gmail.com', '$2y$10$.CpxthG0g9ID4w60BKncG.vyYhg7G1vYuCQAsjeO5llGiTRLt/5E2', 'user', '2025-05-07 11:23:25', NULL),
(23, 'pancasss', 'bilqismufidai@gmail.com', '$2y$10$8OEjAkxIgcXqiSQwpcXsu.5Grk.QHC5rxvyRO0qG4saI8guQhvwr6', 'author', '2025-05-07 11:26:46', NULL),
(24, 'npc', 'ff@gmail.com', '$2y$10$e1XcDRyAzbSIy37SxVrKLemMIj73d/0S7y7W8cNLEYKuBqiioMuCq', 'user', '2025-05-07 12:17:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `websetting`
--

CREATE TABLE `websetting` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data untuk tabel `websetting`
--

INSERT INTO `websetting` (`id`, `title`, `description`, `keywords`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Game News Website', 'Game News Website', 'Game News Website', 'public/setting/icon.png', 'public/setting/icon.png', '2024-10-24 15:54:37', '2025-04-15 09:41:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `websetting`
--
ALTER TABLE `websetting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `websetting`
--
ALTER TABLE `websetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
