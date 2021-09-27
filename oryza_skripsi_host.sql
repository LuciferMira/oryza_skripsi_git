-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Sep 2021 pada 16.55
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15856561_oryza_skripsi`
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
  `id_pesanan` int(10) DEFAULT NULL,
  `id_produk` int(10) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_pesanan`, `id_produk`, `tanggal_keluar`, `jumlah`) VALUES
(1, 14, 3, '2021-09-18', 1),
(2, 18, 14, '1999-09-26', 10);

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
  `subtotal` double NOT NULL,
  `qty_kirim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_pesanan`, `id_produk`, `harga_satuan`, `jumlah_beli`, `subtotal`, `qty_kirim`) VALUES
(1, 10, 11000, 2, 22000, 0),
(2, 14, 12000, 1, 12000, 0),
(3, 19, 6000, 3, 18000, 0),
(4, 20, 6000, 10, 60000, 0),
(5, 19, 6000, 1, 6000, 0),
(6, 3, 12000, 1, 12000, 0),
(7, 3, 12000, 1, 12000, 0),
(8, 10, 11000, 1, 11000, 0),
(9, 17, 32000, 1, 32000, 0),
(10, 3, 12000, 2, 24000, 0),
(11, 3, 12000, 1, 12000, 0),
(12, 3, 12000, 2, 24000, 0),
(13, 3, 12000, 1, 12000, 0),
(14, 3, 12000, 1, 12000, 1),
(15, 12, 9500, 1, 9500, 0),
(15, 3, 12000, 1, 12000, 0),
(16, 12, 9500, 10, 95000, 0),
(17, 14, 12000, 12, 144000, 0),
(18, 14, 12000, 10, 120000, 10);

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
(3, 'organik.jpg', 'Beras Organik', 12000, 1, 15, 'Beras organik adalah beras yang dihasilkan melalui proses budidaya organik tanpa menggunakan pupuk dan pestisida (racun hama) kimia. Sedangkan proses organik adalah budidaya di tanah yang ramah lingkungan, tidak menggunakan pupuk dan pestisida (racun hama) kimia', 'beras'),
(10, 'ketan1.jpg', 'Beras Ketan', 11000, 1, 25, 'Beras ketan adalah jenis beras yang warnanya lebih putih daripada beras lainnya. Beras ketan ini memiliki ukuran yang lebih besar dan keras.', 'beras'),
(12, 'ramos.jpg', 'Beras Setra Ramos', 9500, 1, 50, 'Setra Ramos merupakan salah satu jenis beras yang paling sering ditemui karena harganya yang relatif sangat terjangkau dibanding beras-beras premium lainnya.', 'beras'),
(13, 'menirr.jpg', 'Beras Menir', 7000, 1, 40, 'Menir merupakan salah satu hasil samping proses penggilingan beras selain sekam dan bekatul. Penampakan menir seperti halnya beras patah, namun menir berukuran lebih kecil dari 0,2 bagian beras utuh', 'beras'),
(14, 'pandan1.jpg', 'Beras Pandan Wangi', 12000, 1, 20, 'pandan wangi merupakan salah satu varietas beras lokal Cianjur yang terkenal, karena mempunyai aroma khas pandan dan rasa yang enak.', 'beras'),
(15, 'pera.jpg', 'Beras Pera', 11000, 1, 15, 'beras pera mempunyai karakteristik yang keras dan kering. Bentuknya pun lebih kecil dan bulat.', 'beras'),
(16, 'muncul.png', 'Beras Muncul', 13000, 1, 10, 'Beras Muncul sering disebut juga beras Rojolele memiliki ciri fisik cenderung bulat, memiliki sedikit bagian yang berwarna putih susu, dan tidak wangi.', 'beras'),
(17, 'merah.jpg', 'Beras Merah', 32000, 1, 10, 'Beras merah adalah biji-bijian utuh yang lebih kaya nutrisi dan serat dibanding dengan beras putih.', 'beras'),
(18, 'hitamm.jpg', 'Beras Hitam', 11000, 1, 10, 'beras hitam adalah kumpulan berbagai jenis beras dari spesies Oryza sativa L., termasuk beberapa di antaranya yakni beras ketan.', 'beras'),
(19, 'dedak.jpg', 'Dedak Halus', 6000, 15, 200, 'Dedak adalah hasil samping proses penggilingan padi, terdiri atas lapisan sebelah luar butiran padi dengan sejumlah lembaga biji.', 'dedak'),
(20, 'dedak kasar.jpg', 'Dedak Kasar', 6000, 15, 300, 'Dedak Kasar adalah kulit gabah halus yang bercampur dengan sedikit pecahan lembaga beras dan daya cernanya relatif rendah.', 'dedak');

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
(1, 118, 10, 2, 22000, '2021-09-13', 'User', 'Jalan Jalan', '08768756'),
(2, 120, 14, 1, 12000, '2021-09-14', 'Mini', 'Sumedang', '085937682351'),
(3, 120, 19, 3, 18000, '2021-09-14', 'Mini', 'Sumedang', '085937682351'),
(4, 120, 20, 10, 60000, '2021-09-14', 'Mini', 'Sumedang', '085937682351'),
(5, 121, 19, 1, 6000, '2021-09-16', 'Rangga', 'Bekasi', '081515222333'),
(6, 120, 3, 1, 12000, '2021-09-16', 'Mini', 'Sumedang', '085937682351'),
(7, 120, 3, 1, 12000, '2021-09-16', 'Mini', 'Sumedang', '085937682351'),
(8, 118, 10, 1, 11000, '2021-09-17', 'User', 'Jalan Jalan', '08768756'),
(9, 118, 17, 1, 32000, '2021-09-17', 'User', 'Jalan Jalan', '08768756'),
(10, 118, 3, 2, 24000, '2021-09-17', 'User', 'Jalan Jalan', '08768756'),
(11, 118, 3, 1, 12000, '2021-09-17', 'User', 'Jalan Jalan', '08768756'),
(12, 118, 3, 2, 24000, '2021-09-17', 'User', 'Jalan Jalan', '08768756'),
(13, 118, 3, 1, 12000, '2021-09-17', 'User', 'Jalan Jalan', '08768756'),
(14, 118, 3, 1, 12000, '2021-09-17', 'User', 'Jalan Jalan', '08768756'),
(15, 122, 12, 1, 21500, '2021-09-18', 'rico', 'brkasi', '087809649967'),
(16, 118, 12, 10, 95000, '2021-09-25', 'mini', 'dusun cicelot rt 02/08. no 10. kec cimalaka. kab sumedang', '085920681351'),
(17, 118, 14, 12, 144000, '2021-09-26', 'User', 'Jalan Jalan', '08768756'),
(18, 118, 14, 10, 120000, '2021-09-26', 'User', 'Jalan Jalan', '08768756');

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
(118, 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Bekasi', '2021-08-17', 'Jalan Jalan', '08768756', 'user'),
(119, 'Trial Host', 'trial@user.com', '58723627fcebc230ab0d53ddf5f16e34', 'Bekasi', '2021-09-11', 'Trial Customer', '5516516161', 'user'),
(120, 'Mini', 'mini@gmail.com', '44c6c370fd1859325f7119e96a81584e', 'Jakarta', '1997-09-11', 'Sumedang', '085937682351', 'user'),
(121, 'Rangga', 'rangga@rangga.com', '863c2a4b6bff5e22294081e376fc1f51', 'Bekasi', '2021-09-09', 'Bekasi', '081515222333', 'user'),
(122, 'rico', 'rico.nusa.p@hotmail.com', 'f939ee54c4293270480125281bc4aa93', 'bandunh', '1999-09-18', 'brkasi', '087809649967', 'user');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
