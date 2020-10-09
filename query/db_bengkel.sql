-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2020 pada 14.58
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` char(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `warna`, `jumlah_barang`, `harga_beli`, `harga_jual`, `keterangan`) VALUES
('BRG0000001', 'Ban Battlax Bridgestone 90/90-18 BT 46 F', 'hitam', 8, '625000', '650000', 'baik'),
('BRG0000002', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless Nmax Depan Front', 'hitam', 2, '730000', '765000', 'baik'),
('BRG0000004', ' Ban 4', 'hitam', 3, '320000', '350000', 'baru'),
('BRG0000005', 'Ban 5', 'hitam', 2, '240000', '300000', 'baru'),
('BRG0000006', 'Ban 6', 'hitam', 2, '240000', '320000', 'baru'),
('BRG0000007', 'ban 7', 'hitam', 5, '120000', '130000', 'baru'),
('BRG0000008', 'Ban 8', 'hitam', 1, '600000', '620000', 'baru'),
('BRG0000009', 'Ban 9', 'hitam', 3, '300000', '390000', 'baru'),
('BRG0000010', 'Ban 10', 'hitam', 5, '360000', '400000', 'baru'),
('BRG0000011', 'Kamvas Rem', 'Hitam', 10, '24000', '35000', 'Baru'),
('BRG0000012', 'Cakram', 'Metal', 22, '75000', '90000', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` char(15) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('JBT01', 'kasir'),
('JBT02', 'Owner'),
('JBT03', 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` char(15) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KT001', 'Aksesoris Motor'),
('KT002', 'Perawatan Motor'),
('KT003', 'Modifikasi Motor'),
('KT004', 'Suku Cadang Pengganti'),
('KT005', 'Hiasan Motor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` char(15) NOT NULL,
  `id_transaksi` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `subharga` int(15) NOT NULL,
  `subtotal` int(15) NOT NULL,
  `bayar` int(15) NOT NULL,
  `kembali` int(15) NOT NULL,
  `tgl_penjualan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `id_transaksi`, `id_barang`, `id_user`, `nama_barang`, `jumlah_barang`, `harga`, `subharga`, `subtotal`, `bayar`, `kembali`, `tgl_penjualan`) VALUES
('PNJ0000001', '', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 2, 1530000, 0, 0, 0, 0, '13-September-2020 02:20:44'),
('PNJ0000002', '', 'BRG0000001', 'USE0004', 'Ban Battlax Bridgestone 90/90-18 BT 46 F', 3, 1950000, 0, 0, 0, 0, '13-September-2020 02:20:44'),
('PNJ0000003', '', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 2, 1530000, 0, 0, 0, 0, '13-September-2020 02:51:42'),
('PNJ0000004', '', 'BRG0000001', 'USE0004', 'Ban Battlax Bridgestone 90/90-18 BT 46 F', 4, 2600000, 0, 0, 0, 0, '13-September-2020 02:51:42'),
('PNJ0000005', '', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 2, 1530000, 0, 0, 0, 0, '13-September-2020 02:51:42'),
('PNJ0000006', '', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 2, 1530000, 0, 0, 0, 0, '13-September-2020 03:04:36'),
('PNJ0000007', '', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 2, 1530000, 0, 0, 0, 0, '13-September-2020 13:40:36'),
('PNJ0000008', '', 'BRG0000004', 'USE0004', 'Ban', 2, 700000, 0, 0, 0, 0, '13-September-2020 14:37:07'),
('PNJ0000009', 'TRX0000001', 'BRG0000004', 'USE0004', 'Ban', 2, 700000, 0, 0, 0, 0, '13-September-2020 14:51:56'),
('PNJ0000010', 'TRX0000001', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 4, 3060000, 0, 0, 0, 0, '13-September-2020 14:51:56'),
('PNJ0000011', 'TRX0000002', 'BRG0000006', 'USE0004', 'Ban', 2, 640000, 0, 0, 0, 0, '13-September-2020 15:07:10'),
('PNJ0000012', 'TRX0000003', 'BRG0000004', 'USE0004', 'Ban', 2, 7, 0, 0, 0, 0, '14-September-2020 08:32:06'),
('PNJ0000013', 'TRX0000004', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 2, 765000, 1530000, 2, 2, 2, '14-September-2020 11:20:58'),
('PNJ0000014', 'TRX0000004', 'BRG0000001', 'USE0004', 'Ban Battlax Bridgestone 90/90-18 BT 46 F', 1, 650000, 650000, 1, 2, 0, '14-September-2020 11:20:58'),
('PNJ0000015', 'TRX0000005', 'BRG0000005', 'USE0004', 'Ban', 4, 300000, 1200000, 1330000, 1500000, 170000, '14-September-2020 11:24:27'),
('PNJ0000016', 'TRX0000005', 'BRG0000007', 'USE0004', 'ban', 1, 130000, 130000, 1330000, 1500000, 170000, '14-September-2020 11:24:27'),
('PNJ0000017', 'TRX0000006', 'BRG0000001', 'USE0004', 'Ban Battlax Bridgestone 90/90-18 BT 46 F', 2, 650000, 1300000, 2065000, 2100000, 35000, '14-September-2020 11:51:22'),
('PNJ0000018', 'TRX0000006', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 1, 765000, 765000, 2065000, 2100000, 35000, '14-September-2020 11:51:22'),
('PNJ0000019', 'TRX0000007', 'BRG0000002', 'USE0004', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 2, 765000, 1530000, 1530000, 1600000, 70000, '14-September-2020 12:21:50'),
('PNJ0000020', 'TRX0000008', 'BRG0000012', 'USE0004', 'Cakram', 2, 90000, 180000, 180000, 200000, 20000, '09-October-2020 13:36:59');

--
-- Trigger `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
	update tb_barang set jumlah_barang = jumlah_barang - new.jumlah_barang where id_barang = new.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_return`
--

CREATE TABLE `tb_return` (
  `id_return` int(50) NOT NULL,
  `id_transaksi` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `jumlah_brg_return` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_return`
--

INSERT INTO `tb_return` (`id_return`, `id_transaksi`, `id_barang`, `id_user`, `jumlah_brg_return`) VALUES
(1, 'TRX0000008', 'BRG0000012', 'USE0004', 2),
(2, 'TRX0000006', 'BRG0000001', 'USE0004', 2),
(3, 'TRX0000006', 'BRG0000002', 'USE0004', 1),
(4, 'TRX0000008', 'BRG0000012', 'USE0004', 2),
(5, 'TRX0000009', 'BRG0000012', 'USE0004', 2),
(6, 'TRX0000009', 'BRG0000012', 'USE0004', 2);

--
-- Trigger `tb_return`
--
DELIMITER $$
CREATE TRIGGER `return_tb_penjualan` AFTER INSERT ON `tb_return` FOR EACH ROW BEGIN
	update tb_barang set jumlah_barang = jumlah_barang + NEW.jumlah_brg_return WHERE id_barang = NEW.id_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_roles` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `id_jabatan` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_roles`
--

INSERT INTO `tb_roles` (`id_roles`, `id_user`, `id_jabatan`) VALUES
('TOL0001', 'USE0001', 'JBT03'),
('TOL0002', 'USE0002', 'JBT01'),
('TOL0003', 'USE0003', 'JBT02'),
('TOL0004', 'USE0004', 'JBT01'),
('TOL0005', 'USE0005', 'JBT01'),
('TOL0006', 'USE0006', 'JBT01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_roles_kategori`
--

CREATE TABLE `tb_roles_kategori` (
  `id_roles_kategori` int(50) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `id_kategori` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_roles_kategori`
--

INSERT INTO `tb_roles_kategori` (`id_roles_kategori`, `id_barang`, `id_kategori`) VALUES
(6, 'BRG0000011', 'KT001'),
(9, 'BRG0000012', 'KT002'),
(12, 'BRG0000010', 'KT002'),
(13, 'BRG0000001', 'KT002'),
(14, 'BRG0000002', 'KT002'),
(15, 'BRG0000004', 'KT003'),
(16, 'BRG0000005', 'KT001'),
(17, 'BRG0000006', 'KT003'),
(18, 'BRG0000007', 'KT004'),
(19, 'BRG0000008', 'KT002'),
(20, 'BRG0000009', 'KT004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_roles_supplier`
--

CREATE TABLE `tb_roles_supplier` (
  `id_roles_supplier` int(50) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `id_supplier` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_roles_supplier`
--

INSERT INTO `tb_roles_supplier` (`id_roles_supplier`, `id_barang`, `id_supplier`) VALUES
(3, 'BRG0000012', 'SPL0000001'),
(4, 'BRG0000010', 'SPL0000001'),
(6, 'BRG0000011', 'SPL0000001'),
(7, 'BRG0000001', 'SPL0000001'),
(8, 'BRG0000002', 'SPL0000001'),
(9, 'BRG0000004', 'SPL0000001'),
(10, 'BRG0000005', 'SPL0000001'),
(11, 'BRG0000006', 'SPL0000001'),
(12, 'BRG0000007', 'SPL0000001'),
(13, 'BRG0000008', 'SPL0000001'),
(14, 'BRG0000009', 'SPL0000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` char(15) NOT NULL,
  `nama_supplier` varchar(225) NOT NULL,
  `alamat_supplier` varchar(225) NOT NULL,
  `no_telp_supplier` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`) VALUES
('SPL0000001', 'AJi', 'Jakarta', '085676778788'),
('SPL0000002', 'DID Online', 'Tangerang', '087655576655');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_penjualan`
--

CREATE TABLE `tb_transaksi_penjualan` (
  `id_penjualan` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `id_user` char(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi_penjualan`
--

INSERT INTO `tb_transaksi_penjualan` (`id_penjualan`, `id_barang`, `id_user`, `nama_barang`, `jumlah_barang`, `harga`) VALUES
('TRX0000001', 'BRG0000002', 'USR0001', 'Ban Bridgestone Battlax 120/70-13 SC Bias Tubeless', 1, 765000),
('TRX0000002', 'BRG0000001', 'USR0001', 'Ban Battlax Bridgestone 90/90-18 BT 46 F', 2, 650000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` char(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(225) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `confirm_password`, `nama_user`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `status`) VALUES
('USE0001', 'admin', 'admin', 'admin', 'Hendra', 'Jakarta', 'Laki-laki', 'Jakarta', '03-12-1996', 'active'),
('USE0002', 'kasir', 'kasir', 'kasir', 'Ricki', 'Pamulang', 'Laki-laki', 'Jakarta', '02-11-1995', 'non active'),
('USE0003', 'pemilik', 'pemilik', 'pemilik', 'Andi', 'Tangerang', 'Perempuan', 'Tangerang', '04-10-1990', 'active'),
('USE0004', 'kasir2020', 'kasir2020', 'kasir2020', 'Diandra', '', '', '', '', 'active'),
('USE0005', 'retno', 'retno2020', 'retno2020', '', '', '', '', '', 'active'),
('USE0006', 'kasir1010', 'kasir1010', 'kasir1010', '', '', '', '', '', 'active');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_return`
--
ALTER TABLE `tb_return`
  ADD PRIMARY KEY (`id_return`);

--
-- Indeks untuk tabel `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_roles`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_roles_kategori`
--
ALTER TABLE `tb_roles_kategori`
  ADD PRIMARY KEY (`id_roles_kategori`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `tb_roles_kategori_ibfk_2` (`id_kategori`);

--
-- Indeks untuk tabel `tb_roles_supplier`
--
ALTER TABLE `tb_roles_supplier`
  ADD PRIMARY KEY (`id_roles_supplier`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_transaksi_penjualan`
--
ALTER TABLE `tb_transaksi_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_return`
--
ALTER TABLE `tb_return`
  MODIFY `id_return` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_roles_kategori`
--
ALTER TABLE `tb_roles_kategori`
  MODIFY `id_roles_kategori` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_roles_supplier`
--
ALTER TABLE `tb_roles_supplier`
  MODIFY `id_roles_supplier` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD CONSTRAINT `tb_roles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_roles_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_roles_kategori`
--
ALTER TABLE `tb_roles_kategori`
  ADD CONSTRAINT `tb_roles_kategori_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_roles_kategori_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_roles_supplier`
--
ALTER TABLE `tb_roles_supplier`
  ADD CONSTRAINT `tb_roles_supplier_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_roles_supplier_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
