-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2025 pada 06.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_maryani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(23, 'Indomaret Salero'),
(24, 'Indomaret Sangaji'),
(25, 'Indomaret Jatilandmall'),
(26, 'Indomaret Tubo'),
(27, 'Indomaret Jati'),
(28, 'Indomaret Dufa-dufa'),
(29, 'Indomaret Ngade'),
(30, 'Indomaret Akehuda'),
(31, 'Indomaret Salero 1'),
(32, 'Indomaret Bastiong'),
(33, 'Indomaret Tafure'),
(36, 'Indomaret Salero 2'),
(37, 'Indomaret Tabona'),
(38, 'Indomaret Sangaji 1'),
(39, 'Indomaret Jati 1'),
(40, 'Indomaret Jati 2'),
(41, 'Indomaret Tafure 1'),
(42, 'Indomaret Sasa'),
(43, 'Indomaret Siko'),
(44, 'Indomaret Siko 1'),
(46, 'Indomaret Akehuda 1'),
(47, 'Indomaret Dufa-dufa 1'),
(48, 'Indomaret Ngade 1'),
(49, 'Indomaret Jati 3'),
(50, 'Indomaret Jati 4'),
(51, 'Indomaret Jati 5'),
(52, 'Indomaret Tabona 1'),
(53, 'Indomaret Gamalama'),
(54, 'Indomaret Bastiong Talangame'),
(55, 'Indomaret Kalumpang'),
(56, 'Indomaret Kalumata'),
(57, 'Indomaret Gambesi'),
(58, 'Indomaret Batu Angus'),
(59, 'Indomaret Tanah Tinggi'),
(60, 'Indomaret Jati 6'),
(61, 'Indomaret Gamalama 1'),
(62, 'Indomaret Bastiong 1'),
(63, 'Indomaret Toboko'),
(64, 'Indomaret Raya Jati'),
(65, 'Indomaret Kayu Merah'),
(66, 'Indomaret Kalumata Tugu'),
(67, 'Indomaret Skep'),
(68, 'Indomaret Jambula'),
(69, 'Indomaret Kota Baru'),
(70, 'Indomaret Tafure 2'),
(71, 'Indomaret Kampung Makassar'),
(72, 'Indomaret Bastiong 2'),
(73, 'Indomaret Kalumata 1'),
(74, 'Indomaret Ngade 2'),
(75, 'Indomaret Fitu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(128) NOT NULL,
  `bobot_kriteria` int(11) NOT NULL,
  `sifat_kriteria` enum('cost','benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `sifat_kriteria`) VALUES
(1, 'Harga Produk', 5, 'cost'),
(2, 'Pelayanan Karyawan', 4, 'benefit'),
(3, 'Kenyamanan', 4, 'benefit'),
(4, 'Jarak Toko', 3, 'cost'),
(6, 'Kelengkapan Produk', 2, 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `id_kriteria`, `id_subkriteria`, `id_alternatif`) VALUES
(1, 1, 4, 23),
(2, 2, 5, 23),
(3, 3, 8, 23),
(4, 4, 11, 23),
(5, 6, 14, 23),
(6, 1, 1, 24),
(7, 2, 6, 24),
(8, 3, 9, 24),
(9, 4, 12, 24),
(10, 6, 15, 24),
(11, 1, 4, 25),
(12, 2, 6, 25),
(13, 3, 9, 25),
(14, 4, 12, 25),
(15, 6, 16, 25),
(16, 1, 4, 26),
(17, 2, 7, 26),
(18, 3, 9, 26),
(19, 4, 13, 26),
(20, 6, 16, 26),
(21, 1, 4, 27),
(22, 2, 7, 27),
(23, 3, 9, 27),
(24, 4, 12, 27),
(25, 6, 16, 27),
(26, 1, 2, 28),
(27, 2, 6, 28),
(28, 3, 9, 28),
(29, 4, 12, 28),
(30, 6, 15, 28),
(31, 1, 2, 29),
(32, 2, 5, 29),
(33, 3, 8, 29),
(34, 4, 11, 29),
(35, 6, 14, 29),
(36, 1, 4, 30),
(37, 2, 7, 30),
(38, 3, 10, 30),
(39, 4, 13, 30),
(40, 6, 16, 30),
(41, 1, 2, 31),
(42, 2, 6, 31),
(43, 3, 9, 31),
(44, 4, 12, 31),
(45, 6, 16, 31),
(46, 1, 2, 32),
(47, 2, 6, 32),
(48, 3, 9, 32),
(49, 4, 12, 32),
(50, 6, 15, 32),
(51, 1, 4, 33),
(52, 2, 7, 33),
(53, 3, 10, 33),
(54, 4, 13, 33),
(55, 6, 16, 33),
(56, 1, 2, 36),
(57, 2, 5, 36),
(58, 3, 8, 36),
(59, 4, 11, 36),
(60, 6, 14, 36),
(61, 1, 4, 37),
(62, 2, 6, 37),
(63, 3, 9, 37),
(64, 4, 12, 37),
(65, 6, 16, 37),
(66, 1, 2, 38),
(67, 2, 5, 38),
(68, 3, 9, 38),
(69, 4, 12, 38),
(70, 6, 15, 38),
(71, 1, 4, 39),
(72, 2, 6, 39),
(73, 3, 9, 39),
(74, 4, 12, 39),
(75, 6, 16, 39),
(76, 1, 2, 40),
(77, 2, 5, 40),
(78, 3, 8, 40),
(79, 4, 12, 40),
(80, 6, 15, 40),
(81, 1, 2, 41),
(82, 2, 5, 41),
(83, 3, 8, 41),
(84, 4, 12, 41),
(85, 6, 15, 41),
(86, 1, 2, 42),
(87, 2, 6, 42),
(88, 3, 9, 42),
(89, 4, 12, 42),
(90, 6, 15, 42),
(91, 1, 1, 43),
(92, 2, 5, 43),
(93, 3, 8, 43),
(94, 4, 11, 43),
(95, 6, 14, 43),
(96, 1, 1, 44),
(97, 2, 5, 44),
(98, 3, 8, 44),
(99, 4, 11, 44),
(100, 6, 14, 44),
(101, 1, 2, 46),
(102, 2, 5, 46),
(103, 3, 9, 46),
(104, 4, 12, 46),
(105, 6, 15, 46),
(106, 1, 2, 47),
(107, 2, 6, 47),
(108, 3, 9, 47),
(109, 4, 12, 47),
(110, 6, 16, 47),
(111, 1, 2, 48),
(112, 2, 5, 48),
(113, 3, 8, 48),
(114, 4, 11, 48),
(115, 6, 14, 48),
(116, 1, 2, 49),
(117, 2, 6, 49),
(118, 3, 8, 49),
(119, 4, 12, 49),
(120, 6, 14, 49),
(121, 1, 2, 50),
(122, 2, 6, 50),
(123, 3, 9, 50),
(124, 4, 12, 50),
(125, 6, 15, 50),
(126, 1, 4, 51),
(127, 2, 6, 51),
(128, 3, 9, 51),
(129, 4, 11, 51),
(130, 6, 16, 51),
(131, 1, 2, 52),
(132, 2, 6, 52),
(133, 3, 9, 52),
(134, 4, 12, 52),
(135, 6, 15, 52),
(136, 1, 2, 53),
(137, 2, 6, 53),
(138, 3, 9, 53),
(139, 4, 12, 53),
(140, 6, 15, 53),
(141, 1, 2, 54),
(142, 2, 6, 54),
(143, 3, 9, 54),
(144, 4, 12, 54),
(145, 6, 15, 54),
(146, 1, 2, 55),
(147, 2, 6, 55),
(148, 3, 8, 55),
(149, 4, 11, 55),
(150, 6, 15, 55),
(151, 1, 2, 56),
(152, 2, 6, 56),
(153, 3, 9, 56),
(154, 4, 12, 56),
(155, 6, 15, 56),
(156, 1, 2, 57),
(157, 2, 5, 57),
(158, 3, 8, 57),
(159, 4, 11, 57),
(160, 6, 15, 57),
(161, 1, 2, 58),
(162, 2, 6, 58),
(163, 3, 8, 58),
(164, 4, 12, 58),
(165, 6, 15, 58),
(166, 1, 2, 59),
(167, 2, 5, 59),
(168, 3, 8, 59),
(169, 4, 12, 59),
(170, 6, 15, 59),
(171, 1, 2, 60),
(172, 2, 6, 60),
(173, 3, 9, 60),
(174, 4, 12, 60),
(175, 6, 15, 60),
(176, 1, 2, 61),
(177, 2, 6, 61),
(178, 3, 9, 61),
(179, 4, 13, 61),
(180, 6, 15, 61),
(181, 1, 2, 62),
(182, 2, 6, 62),
(183, 3, 9, 62),
(184, 4, 12, 62),
(185, 6, 16, 62),
(186, 1, 2, 63),
(187, 2, 6, 63),
(188, 3, 9, 63),
(189, 4, 12, 63),
(190, 6, 16, 63),
(191, 1, 2, 64),
(192, 2, 7, 64),
(193, 3, 9, 64),
(194, 4, 13, 64),
(195, 6, 15, 64),
(196, 1, 2, 65),
(197, 2, 5, 65),
(198, 3, 8, 65),
(199, 4, 12, 65),
(200, 6, 15, 65),
(201, 1, 2, 66),
(202, 2, 6, 66),
(203, 3, 9, 66),
(204, 4, 12, 66),
(205, 6, 16, 66),
(206, 1, 2, 67),
(207, 2, 6, 67),
(208, 3, 9, 67),
(209, 4, 12, 67),
(210, 6, 15, 67),
(211, 1, 2, 68),
(212, 2, 6, 68),
(213, 3, 8, 68),
(214, 4, 13, 68),
(215, 6, 15, 68),
(216, 1, 4, 69),
(217, 2, 6, 69),
(218, 3, 9, 69),
(219, 4, 13, 69),
(220, 6, 15, 69),
(221, 1, 2, 70),
(222, 2, 7, 70),
(223, 3, 9, 70),
(224, 4, 12, 70),
(225, 6, 16, 70),
(226, 1, 2, 71),
(227, 2, 6, 71),
(228, 3, 9, 71),
(229, 4, 12, 71),
(230, 6, 15, 71),
(231, 1, 4, 72),
(232, 2, 6, 72),
(233, 3, 9, 72),
(234, 4, 13, 72),
(235, 6, 16, 72),
(236, 1, 2, 73),
(237, 2, 6, 73),
(238, 3, 9, 73),
(239, 4, 12, 73),
(240, 6, 15, 73),
(241, 1, 2, 74),
(242, 2, 6, 74),
(243, 3, 9, 74),
(244, 4, 12, 74),
(245, 6, 15, 74),
(246, 1, 2, 75),
(247, 2, 6, 75),
(248, 3, 9, 75),
(249, 4, 12, 75),
(250, 6, 15, 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkriteria`
--

CREATE TABLE `tb_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(128) NOT NULL,
  `nilai_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_subkriteria`
--

INSERT INTO `tb_subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `nilai_subkriteria`) VALUES
(1, 1, 'Sangat Murah', 3),
(2, 1, 'Murah', 2),
(4, 1, 'Mahal', 1),
(5, 2, 'Sangat Puas', 3),
(6, 2, 'Puas', 2),
(7, 2, 'Tidak Puas', 1),
(8, 3, 'Sangat Nyaman', 3),
(9, 3, 'Nyaman', 2),
(10, 3, 'Tidak Nyaman', 1),
(11, 4, 'Sangat Dekat', 3),
(12, 4, 'Dekat', 2),
(13, 4, 'Jauh', 1),
(14, 6, 'Sangat Lengkap', 3),
(15, 6, 'Lengkap', 2),
(16, 6, 'Kurang Lengkap', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(2, 'maryani', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`,`id_alternatif`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indeks untuk tabel `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT untuk tabel `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD CONSTRAINT `tb_penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`),
  ADD CONSTRAINT `tb_penilaian_ibfk_2` FOREIGN KEY (`id_subkriteria`) REFERENCES `tb_subkriteria` (`id_subkriteria`),
  ADD CONSTRAINT `tb_penilaian_ibfk_3` FOREIGN KEY (`id_alternatif`) REFERENCES `tb_alternatif` (`id_alternatif`);

--
-- Ketidakleluasaan untuk tabel `tb_subkriteria`
--
ALTER TABLE `tb_subkriteria`
  ADD CONSTRAINT `tb_subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tb_kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
