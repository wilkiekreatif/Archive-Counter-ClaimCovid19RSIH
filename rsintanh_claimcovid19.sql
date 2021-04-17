-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Apr 2021 pada 14.07
-- Versi server: 10.3.28-MariaDB-log-cll-lve
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsintanh_claimcovid19`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `entry`
--

CREATE TABLE `entry` (
  `id` int(11) NOT NULL,
  `jml_berkas` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `jml_berkas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id`, `jml_berkas`) VALUES
(1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberkasan`
--

CREATE TABLE `pemberkasan` (
  `id` int(11) NOT NULL,
  `jml_berkas` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberkasan`
--

INSERT INTO `pemberkasan` (`id`, `jml_berkas`, `keterangan`, `periode`, `tahun`, `tgl_input`, `user`) VALUES
(15, 150, '1. Hasil Swab tidak ada<br>\r\n2. Tanggal masuk, keluar dan pindah di SPRI tidak isi atau tidak sesuai<br>\r\n3. Kartu identitas tidak ada dan tidak jelas<br>\r\n4. Pengantar lab dan radiologi tidak ada<br>\r\n5. EWS tidak ada ', 'Desember', 2020, '2021-02-16 11:07:42', 'User'),
(16, 60, '1. Hasil Swab sebagian tidak ada<br>\r\n2. Tanggal masuk, keluar dan pindah di SPRI tidak isi atau tidak sesuai<br>\r\n3. Kartu identitas tidak ada dan sebagian tidak jelas<br>\r\n4. Pengantar lab dan radiologi tidak ada<br>\r\n5. EWS tidak ada', 'Desember', 2020, '2021-02-16 14:26:13', 'Tubagus Rizal Abdul Hamid'),
(17, 39, '1. Hasil Swab sebagian tidak ada<br>\r\n2. Tanggal masuk, keluar dan pindah di SPRI tidak isi atau tidak sesuai<br>\r\n3. Kartu identitas tidak ada dan sebagian tidak jelas<br>\r\n4. Pengantar lab dan radiologi sebagian tidak ada<br>\r\n5. EWS tidak ada', 'Desember', 2020, '2021-02-16 14:26:13', 'Tubagus Rizal Abdul Hamid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id`, `nama`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `referensi`
--

CREATE TABLE `referensi` (
  `id` int(11) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jml_pasien` int(11) NOT NULL,
  `tgl_input` datetime DEFAULT current_timestamp(),
  `tgl_update` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `user` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `referensi`
--

INSERT INTO `referensi` (`id`, `periode`, `tahun`, `jml_pasien`, `tgl_input`, `tgl_update`, `user`) VALUES
(1, 'Desember', '2020', 41, '2021-02-11 20:25:17', '2021-02-16 11:00:48', 'Wildan Auliana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(35) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `bagian` varchar(5) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama_lengkap`, `bagian`, `level`, `status`) VALUES
('rizal', '150fb021c56c33f82eef99253eb36ee1', 'Tubagus Rizal Abdul Hamid', 'IT', 0, 1),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'User', 1, 0),
('wildan', 'af6b3aa8c3fcd651674359f500814679', 'Wildan Auliana', 'IT', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id` int(11) NOT NULL,
  `jml_berkas` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `tgl_input` datetime NOT NULL DEFAULT current_timestamp(),
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `verifikasi`
--

INSERT INTO `verifikasi` (`id`, `jml_berkas`, `keterangan`, `periode`, `tahun`, `tgl_input`, `user`) VALUES
(6, 3, '-', 'Desember', 2020, '2021-02-16 14:55:45', 'Tubagus Rizal Abdul Hamid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemberkasan`
--
ALTER TABLE `pemberkasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `referensi`
--
ALTER TABLE `referensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `entry`
--
ALTER TABLE `entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemberkasan`
--
ALTER TABLE `pemberkasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `referensi`
--
ALTER TABLE `referensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
