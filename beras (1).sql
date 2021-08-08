-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 07:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beras`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `gambar`, `nama`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`) VALUES
(1, 'default.jpg', 'admin', 'admin@admin.com', '', 'Bekasi', '2021-06-01', 'Bekasi', 1234567890),
(2, 'jpg', 'adit', 'aditya@gmail.com', '357344787fa3d91429f000604af9667f', 'sumedang', '1999-06-06', 'sumedang', 2324546);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` enum('beras','dedak') NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `berat` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `nama_barang`, `kategori`, `tanggal_keluar`, `berat`, `jumlah`, `harga`) VALUES
(1, 'premium', 'beras', '2021-06-01', 25, 10, 280000),
(2, 'aswra', 'beras', '2021-06-01', 25, 10, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `berat` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `total_bayar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `nama_barang`, `tanggal_masuk`, `berat`, `jumlah`, `harga`, `total_bayar`) VALUES
(1, 'premium', '2021-06-02', 25, 10, 280000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_barang` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `total_pemasukan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_pesanan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga` int(100) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(100) NOT NULL,
  `berat` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` enum('beras','dedak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama`, `harga`, `berat`, `stok`, `deskripsi`, `kategori`) VALUES
(3, 'default.jpg', 'beras pandan wangi', 250000, 25, 50, 'beras adalah skdjknsbsa cscsnjcksa', 'beras');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `status_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_transaksi`, `tanggal`, `gambar`, `nama_produk`, `jumlah`, `harga`, `status_bayar`) VALUES
(1, '2021-07-08', 'premium.jpg', 'beras premium', 55, 250000, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_pesanan` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `total_bayar` int(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_pesanan`, `id_barang`, `nama`, `jumlah`, `total_bayar`, `alamat`, `telepon`) VALUES
(2, 2, 'Fauzi aditya Hidayat', 10, 100000, 'ljubyggj', 812347823);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_pengguna`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`) VALUES
(11, 'user', 'user@user.com', 'user', 'Jakarta', '2021-06-01', 'sumedang', '085972836'),
(111, 'nadia', 'nadialika@gmail.com', 'nadia123', 'Jakarta', '1999-05-01', 'dsn cicelot. rt 02/03. cimalaka', '085972836583'),
(112, 'adit', 'aditya@gmail.com', '357344787fa3d91429f000604af9667f', 'Sumedang', '1999-07-06', 'cimalaka', '085920681351');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_pesanan` (`id_admin`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
