-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2019 pada 06.26
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mangkuy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cv`
--

CREATE TABLE `cv` (
  `id_cv` int(11) NOT NULL,
  `keahlian` varchar(255) NOT NULL,
  `deskripsi_cv` text NOT NULL,
  `file_cv` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`id_kategori`, `nama_kategori`) VALUES
(1, 'IT/Komputer'),
(2, 'Pendidkan'),
(3, 'Telekomunikasi'),
(4, 'Bank/Keuangan'),
(5, 'Properti'),
(6, 'Kesehatan'),
(7, 'Media'),
(8, 'Makanan & Minuman'),
(9, 'Asuransi'),
(10, 'E-Commerce'),
(11, 'Marketing'),
(12, 'Manufaktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran_pekerjaan`
--

CREATE TABLE `lamaran_pekerjaan` (
  `id_lamaran` int(11) NOT NULL,
  `pesan_lamaran` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lamaran_pekerjaan`
--

INSERT INTO `lamaran_pekerjaan` (`id_lamaran`, `pesan_lamaran`, `id_user`, `id_pekerjaan`, `status`) VALUES
(1, 'Saya ingin melamar pekerjaan ini.', 20, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `deadline_pekerjaan` varchar(255) NOT NULL,
  `skill_pekerjaan` varchar(255) NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `jenis_pekerjaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`, `deadline_pekerjaan`, `skill_pekerjaan`, `deskripsi_pekerjaan`, `jenis_pekerjaan`, `id_user`) VALUES
(1, 'Programmer', '2019-04-30', 'Menguasai Banyak Bahasa Pemrograman', 'Dibutuhkan programmer yang berkualitas dan bertanggung jawab.', 1, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `email`, `password`, `status`) VALUES
(18, 'Admin', '089679047230', 'admin@gmail.com', '$2y$10$XzVG1MFj.hAWNiyT9/hEB.cx9Rx6pGyfZ1gWriillkMH/7hdzMy8q', 2),
(19, 'PT. Lapak Jaya', '0218121212', 'lapakjaya@gmail.com', '$2y$10$fnkBlLmKb69e7ybCDP.iTOhnJ9ObLXnmAjE3jJLKDl0yVOSsPAv7S', 1),
(20, 'ahmadridhoiwananda', '082219726991', 'ahmadridhoiwananda@gmail.com', '$2y$10$WowHnLljPkUKV3IiBe3//.Y3.V.5yx4yUvbfy5J/pMH1JNZ.773HW', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id_cv`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lamaran_pekerjaan`
--
ALTER TABLE `lamaran_pekerjaan`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `jenis_pekerjaan` (`jenis_pekerjaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cv`
--
ALTER TABLE `cv`
  MODIFY `id_cv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `lamaran_pekerjaan`
--
ALTER TABLE `lamaran_pekerjaan`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `lamaran_pekerjaan`
--
ALTER TABLE `lamaran_pekerjaan`
  ADD CONSTRAINT `lamaran_pekerjaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `lamaran_pekerjaan_ibfk_2` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`);

--
-- Ketidakleluasaan untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`jenis_pekerjaan`) REFERENCES `kategori_pekerjaan` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pekerjaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
