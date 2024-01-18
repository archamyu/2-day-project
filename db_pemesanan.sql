-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2024 pada 17.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemesanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `id_riwayat` int(11) NOT NULL,
  `jenis_kendaraan` varchar(64) NOT NULL,
  `id_driver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `id_riwayat`, `jenis_kendaraan`, `id_driver`) VALUES
(1, 1, 'Angkutan Barang', 5),
(2, 2, 'Angkutan Orang', 9),
(3, 3, 'Angkutan Barang', 5),
(4, 6, 'Angkutan Barang', 8),
(5, 7, 'Angkutan Orang', 8),
(6, 8, 'Angkutan Barang', 5),
(7, 9, 'Angkutan Orang', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(64) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `nama_pemesan` varchar(64) NOT NULL,
  `id_penyetuju` int(11) NOT NULL,
  `nama_penyetuju` varchar(64) NOT NULL,
  `jenis_kendaraan` varchar(64) NOT NULL,
  `tanggal_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `nama_pemesan` varchar(64) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(64) NOT NULL,
  `id_penyetuju` int(11) NOT NULL,
  `nama_penyetuju` varchar(64) NOT NULL,
  `jenis_kendaraan` varchar(64) NOT NULL,
  `tanggal_pemesanan` int(11) NOT NULL,
  `tanggal_disetujui` int(11) NOT NULL,
  `tanggal_dikirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_pemesan`, `nama_pemesan`, `id_driver`, `nama_driver`, `id_penyetuju`, `nama_penyetuju`, `jenis_kendaraan`, `tanggal_pemesanan`, `tanggal_disetujui`, `tanggal_dikirim`) VALUES
(1, 4, 'archamy', 5, 'joko', 6, 'budi', 'Angkutan Barang', 1705502163, 1705564366, 1705562782),
(2, 4, 'archamy', 9, 'Tomen Bojez', 6, 'budi', 'Angkutan Orang', 1705502245, 1705564365, 1705564384),
(3, 4, 'archamy', 5, 'joko', 6, 'budi', 'Angkutan Barang', 1705564015, 1705564366, 1705564388),
(6, 4, 'archamy', 8, 'Nanda', 6, 'budi', 'Angkutan Barang', 1705577586, 1705577606, 1705634042),
(7, 4, 'archamy', 8, 'Nanda', 6, 'budi', 'Angkutan Orang', 1705577593, 1705577667, 1705677685),
(8, 4, 'archamy', 5, 'joko', 8, 'Nanda', 'Angkutan Barang', 1705580194, 1705580225, 1705580530),
(9, 4, 'archamy', 6, 'budi', 8, 'Nanda', 'Angkutan Orang', 1705580203, 1705580226, 1705780531);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `level`) VALUES
(4, 'archamy', '$2y$10$KiYXqgzHkUA5S0ustf86F.M2rrIblaemjFOCCLRpiU.f/xUibnpju', 1),
(5, 'joko', '$2y$10$XvyolkVL4NxFBTyzWGhtJO4aD5N8VIpaZXRfgNnVIE90BAh2BuwTm', 2),
(6, 'budi', '$2y$10$39DNZG40VXv6kRLfZuYwdeeC7q0jsOehE.jwXyZJhBgo.JqmzKK2y', 2),
(8, 'Nanda', '$2y$10$W55PM5rnloPIGWoiwKwCOeJ06.cc4SAji9IjdhND2tDabkLLTIDau', 2),
(9, 'Tomen Bojez', '$2y$10$HoiqvbZJDOxHDGKqkC7wkeuobtTaokWDHhQc/HCMU4lhl9PKiaRqW', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_driver` (`id_driver`),
  ADD KEY `kendaraan_ibfk_2` (`id_riwayat`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pemesanan_ibfk_2` (`id_driver`),
  ADD KEY `id_pemesan` (`id_pemesan`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_driver` (`id_driver`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `id_penetuju` (`id_penyetuju`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `kendaraan_ibfk_2` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat` (`id_riwayat`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_driver`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_pemesan`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_pemesan`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_ibfk_3` FOREIGN KEY (`id_penyetuju`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
