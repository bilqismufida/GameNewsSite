-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2025 pada 08.27
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
(17, 'bilqis', 'bilqismufida207@gmail.com', '$2y$10$AVeYsrv38kMSyKpGzQZezOsKVjOyMa5qo6bmv.OrVzB/iPi93PSPu', 'user', '2025-04-19 02:06:01', '2025-04-29 11:06:53'),
(18, 'sausan', 'sausan@gmail.com', '$2y$10$ieDQt.He4PQn9yjxXrMYye9cPodbd8VAcrTLztIj1f3TJ4.Rmk21.', 'user', '2025-04-21 16:03:48', NULL),
(19, 'prabowo', 'presiden@negara.id', '$2y$10$jT6pV2sY/xTvENvKW/ER.ujIyJXEQ9UBnaI/mzG4jqpPsMGNuaLy.', 'admin', '2025-04-22 22:55:14', '2025-05-02 09:54:49'),
(20, 'teddy', 'teddy@mayor.id', '$2y$10$dQmGhwQMlux80oq.xdxRM.KLxcY3kACEyFVNuqWHB9WqwIAc7L9rK', 'user', '2025-04-24 15:39:18', NULL),
(21, 'Author', 'author@gamenewssite.com', '$2y$10$jSHfuhyb.OJ7xfllBwRhSu.HzacDzvExKbbb7xUZmlFKhWG/chGt.', 'author', '2025-05-02 16:49:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
