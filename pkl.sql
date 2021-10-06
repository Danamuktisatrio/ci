-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2021 pada 16.51
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(50) NOT NULL,
  `Nama_Desa` varchar(50) NOT NULL,
  `id_kec` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `Nama_Desa`, `id_kec`) VALUES
(1, 'TULUNGREJO', 1),
(2, 'BANJAREJO', 1),
(3, 'KEDUNGSALAM', 1),
(4, 'TLOGOSARI', 1),
(5, 'TEMPURSARI', 1),
(6, 'DONOMULYO', 1),
(7, 'PURWOREJO', 1),
(8, 'SUMBEROTO', 1),
(9, 'MENTARAWAN', 1),
(10, 'PURWODADI', 1),
(11, 'WONOKERTO', 2),
(12, 'REJOSARI', 2),
(13, 'BANTUR', 2),
(14, 'WONOREJO', 2),
(15, 'SRIGONCO', 2),
(16, 'SUMBERBENING', 2),
(17, 'BANDUNGREJO', 2),
(18, 'PRINGGONDANI', 2),
(19, 'REJOYOSO', 2),
(20, 'KARANGSARI', 2),
(21, 'SUKODONO', 3),
(22, 'SUMBERSUKO', 3),
(23, 'SRIMULYO', 3),
(24, 'BATURETNO', 3),
(25, 'BUMIREJO', 3),
(26, 'AMADANOM', 3),
(27, 'PAMOTAN', 3),
(28, 'MAJANGTENGAH', 3),
(29, 'REMBUN', 3),
(30, 'POJOK', 3),
(31, 'JAMBANGAN', 3),
(32, 'TAWANGREJENI', 4),
(33, 'KEMULAN', 4),
(34, 'SAWAHAN', 4),
(35, 'UDAAN', 4),
(36, 'GEDOK KULON', 4),
(37, 'GEDOK WETAN', 4),
(38, 'TALOK', 4),
(39, 'TANGGUNG', 4),
(40, 'JERU', 4),
(41, 'PAGEDANGAN', 4),
(42, 'SANANKERTO', 4),
(43, 'SANANREJO', 4),
(44, 'KEDOK', 4),
(45, 'TALANGSUKO', 4),
(46, 'TUMPUKRENTENG', 4),
(47, 'SUMBERPUTIH', 5),
(48, 'WONOAYU', 5),
(49, 'BAMBANG', 5),
(50, 'BRINGIN', 5),
(51, 'DADAPAN', 5),
(52, 'PATOKPICIS', 5),
(53, 'SUMBERPUTIH', 5),
(54, 'BLAYU', 5),
(55, 'CODO', 5),
(56, 'SUKOLILO', 5),
(57, 'KIDANGBANG', 5),
(58, 'SUKOANYAR', 5),
(59, 'WAJAK', 5),
(60, 'NGEMBAL', 5),
(61, 'SUMBERMANJINGKULON', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `Nama_Kec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `Nama_Kec`) VALUES
(1, 'DONOMULYO'),
(2, 'BANTUR'),
(3, 'DAMPIT'),
(4, 'TUREN'),
(5, 'WAJAK'),
(6, 'PAGAK'),
(7, 'KALIPARE'),
(8, 'SUMBERMANJING WETAN'),
(9, 'AMPELGADING'),
(10, 'PONCOKUSUMO'),
(11, 'GONDANGLEGI'),
(12, 'KALIPARE'),
(13, 'SUMBERPUCUNG'),
(14, 'KEPANJEN'),
(15, 'BULULAWANG'),
(16, 'TAJINAN'),
(17, 'TUMPANG'),
(18, 'JABUNG'),
(19, 'PAKIS'),
(20, 'PAKISAJI'),
(21, 'NGAJUM'),
(22, 'WAGIR'),
(23, 'DAU'),
(24, 'KARANG PLOSO'),
(25, 'SINGOSARI'),
(26, 'LAWANG'),
(27, 'PUJON'),
(28, 'NGANTANG'),
(29, 'KASEMBON'),
(30, 'GEDANGAN'),
(31, 'TIRTOYUDO'),
(32, 'KROMENGAN'),
(33, 'WONOSARI'),
(34, 'PAGELARAN');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kec` (`id_kec`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
