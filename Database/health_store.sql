-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2022 pada 02.53
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`) VALUES
(1, 'BRI', '345765431290873'),
(2, 'BCA', '2756452386'),
(3, 'DANA', '081267895436');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Yogyakarta', 16000),
(2, 'Jawa Tengah', 18000),
(3, 'Jawa Timur', 20000),
(4, 'Jawa Barat', 20000),
(5, 'Jakarta', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `telepon`, `email`, `password`) VALUES
(1, 'Fahrizal Wira Ananda', '1293469086', 'fah@gmail.com', '$2y$10$ycyKW3Vnp2ObLYFcFiMrpulcewCwaqnAFmnQ5IMTd6Q9W6vhiHLTy'),
(2, 'fahrizal w', '081216012712', 'fahrizalw0@gmail.com', '$2y$10$tOj63YUgjFE7qbRZn8/TXuYZAu3aUuIM0I5c0jdRpPChyw9RnKswu'),
(3, 'Ridwan S', '345324626411', 'w@gmail.com', '$2y$10$rws1J2bqDVlYKiovunJORuotlgSJ9e1ITh/Ba1i7yp9PRYKEU0hL6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(3, 8, 'FAHRIZAL WIRA ANANDA', 'DANA', 43800, '2022-01-02', '20220102013434Background-Zoom-SpongeBob-2-1536x864.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total_beli` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `kodepos` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tgl_beli`, `total_beli`, `nama_kota`, `tarif`, `alamat_pengiriman`, `kodepos`, `nama_bank`, `no_rek`, `status_pembelian`) VALUES
(8, 2, 1, '2021-12-30', 43800, 'Yogyakarta', 16000, 'Pucanggading, Hargomulyo, Kokap, Kulon Progo, Daerah Istimewa Yogyakarta', 55653, 'DANA', '081267895436', 'Pembayaran Telah Dilakukan & Tunggu Konfirmasi Admin'),
(9, 2, 1, '2021-12-30', 27900, 'Yogyakarta', 16000, 'Pucanggading, Hargomulyo, Kokap, Kulon Progo, Daerah Istimewa Yogyakarta', 55653, 'BRI', '345765431290873', 'Menunggu Pembayaran'),
(10, 1, 1, '2021-12-30', 57700, 'Yogyakarta', 16000, 'Pucanggading, Hargomulyo, Kokap, Kulon Progo, Daerah Istimewa Yogyakarta', 55653, 'DANA', '081267895436', 'Menunggu Pembayaran'),
(11, 1, 1, '2021-12-30', 29900, 'Yogyakarta', 16000, 'Pucanggading, Hargomulyo, Kokap, Kulon Progo, Daerah Istimewa Yogyakarta', 55653, 'BRI', '345765431290873', 'Menunggu Pembayaran'),
(12, 1, 1, '2022-01-01', 57700, 'Yogyakarta', 16000, 'Pucanggading, Hargomulyo, Kokap, Kulon Progo, Daerah Istimewa Yogyakarta', 55653, 'BRI', '345765431290873', 'Menunggu Pembayaran'),
(13, 1, 1, '2022-01-01', 29900, 'Yogyakarta', 16000, 'Pucanggading, Hargomulyo, Kokap, Kulon Progo, Daerah Istimewa Yogyakarta', 55653, 'BCA', '2756452386', 'Menunggu Pembayaran'),
(14, 2, 1, '2022-01-02', 75500, 'Yogyakarta', 16000, 'Pucanggading, Hargomulyo, Kokap, Kulon Progo, Daerah Istimewa Yogyakarta', 55653, 'DANA', '081267895436', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_beli_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `subberat` int(11) DEFAULT NULL,
  `subharga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_beli_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(14, 8, 1, 2, 'Insto', 13900, 50, 100, 27800),
(15, 9, 3, 1, 'betadine', 11900, 50, 50, 11900),
(16, 10, 1, 3, 'Insto', 13900, 50, 150, 41700),
(17, 11, 1, 1, 'Insto', 13900, 50, 50, 13900),
(18, 12, 1, 3, 'Insto', 13900, 50, 150, 41700),
(19, 13, 1, 1, 'Insto', 13900, 50, 50, 13900),
(20, 14, 3, 5, 'betadine', 11900, 50, 250, 59500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL DEFAULT 'None',
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL DEFAULT 0,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok_produk` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi`, `stok_produk`) VALUES
(1, 'Insto', 'tetes', 13900, 50, 'produk2.jfif', 'Ini adalah obat khusus mata', 5),
(2, 'betametason', 'salep', 6900, 30, 'produk3.jfif', 'obat gatal', 10),
(3, 'betadine', 'tetes', 11900, 50, 'produk1.jfif', 'Untuk mengobati luka luar', 0),
(4, 'vital', 'tetes', 16900, 50, 'produk3.jfif', 'untuk obat tetes telinga', 5),
(5, 'THM', 'tetes', 15900, 50, 'produk4.jfif', 'Obat tetes untuk telinga, hidung dan mata', 5),
(6, 'Freshkon', 'tetes', 17900, 10, 'produk5.jfif', 'Merupakan cairan untuk tetes mata', 10);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `ambilid-daripembelian` (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `bag ongkir` (`id_ongkir`),
  ADD KEY `bag pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_beli_produk`),
  ADD KEY `pembelian-ambil` (`id_pembelian`),
  ADD KEY `produk-beli` (`id_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_beli_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `ambilid-daripembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `bag ongkir` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bag pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `pembelian-ambil` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk-beli` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
