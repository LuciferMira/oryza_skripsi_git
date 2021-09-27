-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2021 pada 12.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oryza_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `gambar`, `nama`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`) VALUES
(1, 'default.jpg', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Bekasi', '2021-06-01', 'Bekasi', 1234567890),
(2, 'jpg', 'adit', 'aditya@gmail.com', '357344787fa3d91429f000604af9667f', 'sumedang', '1999-06-06', 'sumedang', 2324546);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
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
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `nama_barang`, `kategori`, `tanggal_keluar`, `berat`, `jumlah`, `harga`) VALUES
(1, 'premium', 'beras', '2021-06-01', 25, 10, 280000),
(2, 'aswra', 'beras', '2021-06-01', 25, 10, 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_produk`, `tanggal_masuk`, `jumlah`) VALUES
(7, 3, '2021-08-17', 2),
(8, 3, '2021-08-17', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_pesanan` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah_beli` int(3) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_pesanan`, `id_produk`, `harga_satuan`, `jumlah_beli`, `subtotal`) VALUES
(2, 3, 452, 3, 1356),
(3, 10, 452, 1, 452);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
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
-- Struktur dari tabel `penjualan`
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
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama`, `harga`, `berat`, `stok`, `deskripsi`, `kategori`) VALUES
(3, 'all.jpg', 'Beras Cuy', 452, 5, 15, 'jawdaw', 'beras'),
(10, 'Leo.png', 'wdrgd', 452, 5, 12, 'jawdaw', 'beras'),
(11, '3469374_1392737773569.91res_480_319.jpg', 'aswwww', 21615616, 5, 12, 'jawdaw', 'dedak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
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
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_transaksi`, `tanggal`, `gambar`, `nama_produk`, `jumlah`, `harga`, `status_bayar`) VALUES
(1, '2021-07-08', 'premium.jpg', 'beras premium', 55, 250000, 'lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_pesanan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jumlah_beli` int(3) NOT NULL,
  `total` double NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `telp_penerima` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_pesanan`, `id_user`, `id_produk`, `jumlah_beli`, `total`, `tanggal_transaksi`, `nama_penerima`, `alamat_penerima`, `telp_penerima`) VALUES
(2, 118, 3, 3, 1356, '2021-08-29', 'User', 'Jalan Jalan', '08768756'),
(3, 118, 10, 1, 452, '2021-08-29', 'User', 'Jalan Jalan', '08768756');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `akses` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_pengguna`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telepon`, `akses`) VALUES
(11, 'user', 'user@user.com', 'user', 'Jakarta', '2021-06-01', 'sumedang', '085972836', 'user'),
(111, 'nadia', 'nadialika@gmail.com', 'nadia123', 'Jakarta', '1999-05-01', 'dsn cicelot. rt 02/03. cimalaka', '085972836583', 'user'),
(112, 'adit', 'aditya@gmail.com', '357344787fa3d91429f000604af9667f', 'Sumedang', '1999-07-06', 'cimalaka', '085920681351', 'user'),
(116, 'Administrator', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Jakarta', '2021-08-11', 'Jl. Pegangsaan timur 06', '08548587556', 'admin'),
(118, 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Bekasi', '2021-08-17', 'Jalan Jalan', '08768756', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_pesanan` (`id_admin`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_barang` (`id_produk`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
