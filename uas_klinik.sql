-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2020 pada 15.11
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `nip` varchar(10) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `password_user` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`nip`, `nama_admin`, `kontak`, `alamat`, `password_user`) VALUES
('ADM00001', 'aji', '87878', 'Pagedaangan', '321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `idpasien` varchar(20) NOT NULL,
  `namapasien` varchar(100) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`idpasien`, `namapasien`, `kontak`, `alamat`, `foto`) VALUES
('hhjgh', 'cccc', 'ghjghj', 'hgjhghj', 'icon.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `iddaftar` varchar(20) NOT NULL,
  `idpasien` varchar(20) DEFAULT NULL,
  `tgldaftar` date DEFAULT NULL,
  `idadmin` varchar(10) DEFAULT NULL,
  `biaya` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`iddaftar`, `idpasien`, `tgldaftar`, `idadmin`, `biaya`) VALUES
('', '', '2020-01-28', 'aji', 0),
('000010', '000011', '2020-01-28', 'aji', 9000),
('0001', '00021', '0000-00-00', '', 0),
('0009', 'PS00056', '2020-01-28', 'aji', 9990000),
('009999', '008999', '2020-01-28', 'aji', 9989),
('10000000', '0099899', '2020-01-28', 'aji', 20000),
('aaaaa', 'bbbbb', '2020-01-28', 'aji', 8000),
('bnkjhj', 'hhjgh', '2020-01-28', 'aji', 8000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`iddaftar`),
  ADD UNIQUE KEY `idpasien` (`idpasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
