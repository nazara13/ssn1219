-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2020 pada 02.55
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`) VALUES
(1, 'Badan Kepegawaian Daerah (BKD)'),
(2, 'Badan Penanggulangan Bencana Daerah'),
(3, 'Badan Pengelola Keuangan Dan Aset Daerah'),
(4, 'Badan Pengelola Pajak Dan Retribusi Daerah'),
(5, 'Badan Perencanaan Pembangunan Daerah'),
(6, 'Badan Satuan Polisi Pamong Praja'),
(7, 'Dinas Kepemudaan, Olahraga Dan Pariwisata'),
(8, 'Dinas Kependudukan Dan Pencatatan Sipil'),
(9, 'Dinas Kesehatan'),
(10, 'Dinas Ketahanan Pangan'),
(11, 'Dinas Ketenagakerjaan'),
(12, 'Dinas Komunikasi Dan Informatika'),
(13, 'Dinas Koperasi Usaha Kecil Dan Menengah'),
(14, 'Dinas Lingkungan Hidup'),
(15, 'Dinas Pekerjaan Umum Dan Penataan Ruang'),
(16, 'Dinas Pemberdayaan Masyarakat Dan Desa'),
(17, 'Dinas Pemberdayaan Perempuan Dan Perlindungan Anak'),
(18, 'Dinas Penanaman Modal Dan Pelayanan Perizinan'),
(19, 'Dinas Pendidikan'),
(20, 'Dinas Pengendalian Penduduk Dan Keluarga Berencana'),
(21, 'Dinas Perhubungan'),
(22, 'Dinas Perikanan'),
(23, 'Dinas Perpustakaan'),
(24, 'Dinas Pertanian'),
(25, 'Dinas Perumahan Dan Kawasan Permukiman'),
(26, 'Dinas Peternakan Dan Perkebunan'),
(27, 'Dinas Sosial'),
(28, 'Inspektorat'),
(29, 'Kantor Kesatuan Bangsa Dan Politik'),
(30, 'Kecamatan Air Putih'),
(31, 'Kecamatan Datuk Lima Puluh'),
(32, 'Kecamatan Datuk Tanah Datar'),
(33, 'Kecamatan Laut Tador'),
(34, 'Kecamatan Lima Puluh'),
(35, 'Kecamatan Lima Puluh Pesisir'),
(36, 'Kecamatan Medang Deras'),
(37, 'Kecamatan Nibung Hangus'),
(38, 'Kecamatan Sei Balai'),
(39, 'Kecamatan Sei Suka'),
(40, 'Kecamatan Talawi'),
(41, 'Kecamatan Tanjung Tiram'),
(42, 'Sekretariat Daerah'),
(43, 'Sekretariat DPRD'),
(44, 'Mitra Badan Pusat Statistik'),
(45, 'Polri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1583499596),
('m130524_201442_init', 1583510721),
('m190124_110200_add_verification_token_column_to_user_table', 1583510721);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploadolah`
--

CREATE TABLE `uploadolah` (
  `idpost` int(11) NOT NULL,
  `filesplit` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `dateupload` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, '', 'admin1219', '_z2dLBfWdGmgX3cKmQfgPgJhwDLdQocr', '$2y$13$YERG9IchcdwjZB6sCEAKTOn5zAC1XzqLBQloWeuSmhUEY4Q1DrEbq', NULL, 'krisman.nazara@kolomdata.com', 10, 1585880296, 1585880296, '5Gec_8yqgc1pesZnDPEHEuciTjyhG3HW_1585880296'),
(2, 'Eka Pertiwi', 'eka.pertiwi', 'kbvAtAZ8foQo71jZRFlOa4dB4CvhPbPp', '$2y$13$tF7sO3w.skDPRAvWaAKrYOlmhIh.RPo6oL1AmPJxfM7CdVQio8EMK', NULL, 'eka.pertiwi@kolomdata.com', 10, 1585881096, 1585881096, '2cgFYYiGa_PpBAsQ6Grae4YF8lied63O_1585881096'),
(3, 'Windi Sartika', 'windi.sartika', '-UTttsVb_m21UhdSOdblBLZXglaj7gmB', '$2y$13$2YCG99OvydtspfbNfPDq7ubCIVTxFLmRbcJJnZk6YIRKozVdKVZuO', NULL, 'windi.sartika@kolomdata.com', 10, 1585881118, 1585881118, 'ZIbClGxpOhOL8HdPBPvfPc3ZQGpL767p_1585881118'),
(4, 'Norma Yunita Harahap', 'norma.yunita', 'pqhNYuBhnPHiDcownlZBhQxTIev7xGcq', '$2y$13$0nooJW3J7sw/9E4zl/.H1ullX0eS4Y1OArVQde6dqU2Ymcdcm4hAa', NULL, 'norma.yunita@kolomdata.com', 10, 1585881136, 1585881136, 'VnIT1DL3Q-1GvTSImdyi3MNo5-ZivG0w_1585881136'),
(5, 'Wida Yanci Dwi Anggraini', 'wida.yanci', 'TF0hsY6h4NmCjkCuxBQ02B83qfkeIQuw', '$2y$13$folAoOFhYtCCQUoREmf/bOIC24qCrwg6BwQsUlvz7kPdRxOfzjQne', NULL, 'wida.yanci@kolomdata.com', 10, 1585881203, 1585881203, 'GACGNGBjobglnuS5Zf0KXMc50JHA8b_e_1585881203'),
(6, 'Ratna Nurdila Lubis', 'ratna.nurdila', 'xd_VWFaxSifJEkj5mLmQ4l0hKca85w1j', '$2y$13$F9ykOTd82G8am/iv7Tbkeu4W/.6mUvXP4Cq/uo1vKgWNSYZnWkNoG', NULL, 'ratna.nurdila@kolomdata.com', 10, 1585881226, 1585881226, '0i-iQENf7El7SAMb6vm0ZWydeCP0on92_1585881226'),
(7, 'Jefri Johanson Sinaga', 'jefri.johanson', 'UUJMR0Q30ICv1Jr8ewa6Zti6pOzRCNrG', '$2y$13$hQDkHOB.5f80yvTVkCZP4uBw4UVyqYpCubrsmju5KDwV93c0aVNSO', NULL, 'jefri.johanson@kolomdata.com', 10, 1585881244, 1585881244, 'v9o9Y86da1iCFHAvDgSeLojzsiZYOM7u_1585881244');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userspo`
--

CREATE TABLE `userspo` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `uploadolah`
--
ALTER TABLE `uploadolah`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indeks untuk tabel `userspo`
--
ALTER TABLE `userspo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `uploadolah`
--
ALTER TABLE `uploadolah`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `userspo`
--
ALTER TABLE `userspo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `uploadolah`
--
ALTER TABLE `uploadolah`
  ADD CONSTRAINT `uploadolah_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `userspo`
--
ALTER TABLE `userspo`
  ADD CONSTRAINT `userspo_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
