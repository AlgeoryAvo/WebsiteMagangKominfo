-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2022 pada 15.18
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realisasi_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(250) NOT NULL,
  `sub_kegiatan` varchar(250) NOT NULL,
  `nama_belanja` varchar(250) NOT NULL,
  `kode_rekening` varchar(250) NOT NULL,
  `pagu_anggaran` int(250) NOT NULL,
  `nama_pptk` varchar(250) NOT NULL,
  `tanggal_input` date NOT NULL,
  `nominal` int(250) NOT NULL,
  `bukti_tagihan` varchar(250) NOT NULL,
  `bukti_transfer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `sub_kegiatan`, `nama_belanja`, `kode_rekening`, `pagu_anggaran`, `nama_pptk`, `tanggal_input`, `nominal`, `bukti_tagihan`, `bukti_transfer`) VALUES
(1, 'ahahed', 'aaa', 'aaa', '123.312.123.32', 3354365, 'haris', '2022-06-06', 0, '', ''),
(2, 'dhfh', 'htrhtr', 'ttr', '234.89.900', 557565555, 'sarip', '2023-01-06', 0, 'Screenshot_4.png', ''),
(3, 'fddfh', 'fdfdh', 'fdhfh', '234.89.900', 545546, 'haris', '2022-06-06', 0, '', ''),
(4, 'fhf', 'dfhfd', 'hfdh', '234.89.900', 464565454, 'sarip', '2023-01-11', 0, '', ''),
(6, 'sbdhjdf', 'fdfdb', 'fbfd', '123.312.123.32', 5444554, 'haris', '2023-06-06', 0, '', ''),
(7, 'rsgg', 'rgdr', 'grdh', '123.312.123.32', 5754746, 'haris', '2025-02-11', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(250) NOT NULL,
  `kode_rek` varchar(20) NOT NULL,
  `jabatan_pengguna` varchar(250) NOT NULL,
  `username_pengguna` varchar(250) NOT NULL,
  `password_pengguna` varchar(250) NOT NULL,
  `pengguna_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `kode_rek`, `jabatan_pengguna`, `username_pengguna`, `password_pengguna`, `pengguna_status`) VALUES
(1, 'Satria', '', 'Operator', 'satria', 'satria123', 'Aktif'),
(2, 'Kamui', '', 'Atasan', 'kamui', 'kamui123', 'Aktif'),
(4, 'Dima', '', 'Bendahara', 'dima', 'dima123', 'Aktif'),
(41, 'Bagas', '', 'Operator', 'bagas', 'bagas', 'Aktif'),
(47, 'haris', '123.312.123.32', 'PPTK', 'haris', 'haris123', 'Aktif'),
(48, 'sarip', '234.89.900', 'PPTK', 'sarip', 'sarip123', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_subkegiatan`
--

CREATE TABLE `tb_subkegiatan` (
  `id_subkegiatan` int(20) NOT NULL,
  `nama_kegiatan` varchar(300) NOT NULL,
  `sub_kegiatan` varchar(200) NOT NULL,
  `nama_belanja` varchar(300) NOT NULL,
  `kode_rekening` varchar(25) NOT NULL,
  `pagu_anggaran` int(50) NOT NULL,
  `nama_pptk` varchar(50) NOT NULL,
  `tanggal_input` date NOT NULL,
  `nominal` int(40) NOT NULL,
  `bukti_tagihan` varchar(40) NOT NULL,
  `bukti_transfer` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_subkegiatan`
--

INSERT INTO `tb_subkegiatan` (`id_subkegiatan`, `nama_kegiatan`, `sub_kegiatan`, `nama_belanja`, `kode_rekening`, `pagu_anggaran`, `nama_pptk`, `tanggal_input`, `nominal`, `bukti_tagihan`, `bukti_transfer`) VALUES
(2, 'egrg', 'rerg', 'ergre', '123.312.123.32', 333352, 'haris', '2022-06-06', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_subkegiatan`
--
ALTER TABLE `tb_subkegiatan`
  ADD PRIMARY KEY (`id_subkegiatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_subkegiatan`
--
ALTER TABLE `tb_subkegiatan`
  MODIFY `id_subkegiatan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
