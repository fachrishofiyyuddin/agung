-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 03:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_konveksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `harga_bahan` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `id_produk`, `nama_bahan`, `harga_bahan`) VALUES
(1, 1, 'polyester dan PE', 32000),
(2, 1, 'teteron cotton', 32000),
(3, 1, 'hyget', 1000),
(4, 1, 'spandek', 1000),
(5, 1, 'dri fit', 1000),
(6, 1, 'water', 1000),
(7, 1, 'ribstop', 1000),
(8, 1, 'taslan', 1000),
(9, 1, 'milky', 1000),
(10, 1, 'micro/despo', 1000),
(11, 1, 'scott/scott puma', 1000),
(12, 1, 'adidas', 1000),
(13, 1, 'diadora', 1000),
(14, 1, 'lotto', 1000),
(15, 2, 'spandek', 1000),
(16, 2, 'jersey', 1000),
(17, 2, 'lotto', 1000),
(18, 2, 'paragon', 1000),
(19, 2, 'water', 1000),
(20, 2, 'hyget', 1000),
(21, 2, 'adidas', 1000),
(22, 2, 'diadora', 1000),
(23, 2, 'dri fit', 1000),
(24, 2, 'parasut', 1000),
(25, 2, 'adidas', 1000),
(26, 3, 'combed 20s, 24s, 30s', 1000),
(27, 3, 'cardet(20s,30s)', 1000),
(28, 3, 'polyester dan PE', 1000),
(29, 3, 'teteron cotton', 1000),
(30, 3, 'viscose', 1000),
(31, 3, 'cotton viscose', 1000),
(32, 3, 'hyget', 1000),
(33, 4, 'drill', 1000),
(34, 4, 'ribstock', 1000),
(35, 4, 'taipan tropical', 1000),
(36, 4, 'chambray', 1000),
(37, 4, 'oxpord', 1000),
(38, 4, 'high twist', 1000),
(39, 4, 'kanvas', 1000),
(40, 4, 'twill', 1000),
(41, 5, 'drill', 1000),
(42, 5, 'ribstock', 1000),
(43, 5, 'taipan tropical', 1000),
(44, 5, 'chambray', 1000),
(45, 5, 'oxpord', 1000),
(46, 5, 'high twist', 1000),
(47, 5, 'kanvas', 1000),
(48, 5, 'twill', 1000),
(49, 6, 'combed 20s, 24s, 30s', 1000),
(50, 6, 'cardet(20s,30s)', 1000),
(51, 6, 'polyester dan PE', 1000),
(52, 6, 'teteron cotton', 1000),
(53, 6, 'viscose', 1000),
(54, 6, 'cotton viscose', 1000),
(55, 6, 'hyget', 1000),
(56, 7, 'drill', 1000),
(57, 7, 'katun', 1000),
(58, 7, 'thaisilk', 1000),
(59, 7, 'denim', 1000),
(60, 7, 'corduroy', 1000),
(61, 7, 'polyester', 1000),
(62, 7, 'nilon', 1000),
(63, 7, 'kanvas', 1000),
(64, 8, 'spandek', 1000),
(65, 8, 'jersey', 1000),
(66, 8, 'lotto', 1000),
(67, 8, 'paragon', 1000),
(68, 8, 'water', 1000),
(69, 8, 'hyget', 1000),
(70, 8, 'adidas', 1000),
(71, 8, 'diadora', 1000),
(72, 8, 'dri fit', 1000),
(73, 8, 'parasut', 1000),
(86, 8, 'adidas', 1000),
(87, 9, 'sd', 1000),
(88, 9, 'smp', 1000),
(89, 9, 'sma', 1000),
(90, 9, 'tk', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_ukuran` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kodepos` int(5) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_kirim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_selesai` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ket` text NOT NULL,
  `status` enum('sedang diproses','sedang dikirim','selesai','menunggu pembayaran') DEFAULT 'menunggu pembayaran',
  `gambar_dp` varchar(50) DEFAULT NULL,
  `gambar_lunas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesan`, `id_user`, `id_produk`, `id_bahan`, `id_ukuran`, `nama`, `email`, `telp`, `alamat`, `kota`, `provinsi`, `kodepos`, `gambar`, `tgl_kirim`, `tgl_selesai`, `ket`, `status`, `gambar_dp`, `gambar_lunas`) VALUES
(75, 8, 1, 14, '6280e99e4fe1c', 'kiwil', 'aaaa@aa.com', '0895763527346', 'jepara', 'Kabupaten Jepara', 'jawa tengah', 59463, '6280e99e4fe06.png', '2022-05-15 11:55:20', '0000-00-00 00:00:00', 'wekekek', 'sedang diproses', 'Belum mengirim dp', 'Belum melakukan pelunasan'),
(76, 8, 1, 5, '628cdf0d55161', 'kiwil ul', 'aaaa@aa.com', '0895763527678', 'jepara', 'Kabupaten Jepara', 'jawa tengah', 59463, '628cdf0d5514d.png', '2022-05-24 08:35:09', '2022-05-24 08:35:09', 'wawawa', 'menunggu pembayaran', 'Belum mengirim dp', 'Belum melakukan pelunasan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `gambar_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar_produk`) VALUES
(1, 'baju olahraga', 'baju-olahraga.png'),
(2, 'celana olahraga', 'celana-olahraga.png'),
(3, 'kaos', 'kaos.png\r\n'),
(4, 'kemeja \r\n', 'kemeja-laki.png'),
(5, 'kemeja lengan panjang', 'kemeja-lengan-panjang.png'),
(6, 'kaos polo', 'kemeja.png'),
(7, 'kemeja wanita', 'kemeja-wanita.png'),
(8, 'celana panjang', 'celana-panjang.png'),
(9, 'jaket', 'hoodie.png\r\n'),
(12, 'celana chinos', '1929973304insta-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` varchar(32) NOT NULL,
  `small` int(10) NOT NULL,
  `medium` int(10) NOT NULL,
  `large` int(10) NOT NULL,
  `exlarge` int(10) NOT NULL,
  `exexlarge` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `small`, `medium`, `large`, `exlarge`, `exexlarge`) VALUES
('5df675879750d', 12, 12, 12, 12, 12),
('5df677660f6e4', 1, 1, 1, 1, 1),
('5df67af098b79', 12, 12, 12, 12, 12),
('5df6e8784b4c1', 12, 12, 12, 0, 0),
('6280e99e4fe1c', 2, 3, 2, 1, 0),
('628cdf0d55161', 3, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(8, 'tian', 'tian11', 'pelanggan'),
(9, 'kiwil', 'kiwil1', 'pelanggan'),
(10, 'bro', 'bro21321212121', 'pelanggan'),
(13, 'pemilik', 'pemilik', 'pemilik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_produk` (`id_produk`),
  ADD KEY `fk_bahan` (`id_bahan`),
  ADD KEY `fk_ukuran` (`id_ukuran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ukuran` FOREIGN KEY (`id_ukuran`) REFERENCES `ukuran` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
