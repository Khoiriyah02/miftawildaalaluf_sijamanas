-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 08.44
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sarpras`
--

CREATE TABLE `data_sarpras` (
  `Sarpras` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `Jumlah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_sarpras`
--

INSERT INTO `data_sarpras` (`Sarpras`, `kode`, `Jumlah`) VALUES
('KENDARAAN', 'TREVEL', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `alamat_peminjam` varchar(50) NOT NULL,
  `no_telepon` int(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`alamat_peminjam`, `no_telepon`, `tgl_mulai`, `fasilitas`, `keperluan`, `tgl_kembali`) VALUES
('banyuwangi', 85330202, '2023-12-07', 'mobil', 'hajatan', '2023-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`password`, `nama`, `nip`) VALUES
('ALUF 05', 'MIFTA WILDA AL- ALUF', 90909);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
