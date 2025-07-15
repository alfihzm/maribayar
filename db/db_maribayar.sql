-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 08:43 PM
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
-- Database: `db_maribayar`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buat_tagihan` (IN `p_id_penggunaan` INT, IN `p_id_pelanggan` INT, IN `p_bulan` VARCHAR(20), IN `p_tahun` VARCHAR(4), IN `p_meter_awal` INT, IN `p_meter_akhir` INT)   BEGIN
    DECLARE v_jumlah_meter INT;

    SET v_jumlah_meter = p_meter_akhir - p_meter_awal;

    INSERT INTO tagihan (
        id_penggunaan, id_pelanggan, bulan, tahun, jumlah_meter, status
    ) VALUES (
        p_id_penggunaan, p_id_pelanggan, p_bulan, p_tahun, v_jumlah_meter, 'Belum Dibayar'
    );
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_tagihan` (`jumlah_meter` INT, `tarif_kwh` INT) RETURNS INT(11) DETERMINISTIC RETURN jumlah_meter * tarif_kwh$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_kwh` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `id_tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`) VALUES
(3, 'yadihermawan', '325077d1d7b6fa325b095fb212f3bc42', '18943598212', 'Yadi Hermawan Supandi', 'Jl. Ratu Mawar Blok C13 No.3, Kelurahan Banyuasih, Kecamatan Lawangsewu, Kota Sandiwara, Jawa Utara 15493', 3),
(5, 'alfihzm', '$2y$10$0jHNwwvth6n9AazOkXyrcuR.vBdt7ZWWwTFmN7RBlYIgNvn7tENn.', '393241292842', 'Mohammad Alfi Hamzami', 'Griya Suradita Indah Blok O13 No.3, Kel. Suradita, Kec. Cisauk, Kab. Tangerang 15343', 2),
(6, 'giladewa', '$2y$10$3kp/jbj/x1ZXE/h83WqfRO0bOWEde1AUkILotxWERLHsRl9ScP.mm', '1234987655', 'Gilang Sadewa', 'Kabupaten Tangerang', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bulan_bayar` varchar(20) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_pelanggan`, `tanggal_pembayaran`, `bulan_bayar`, `biaya_admin`, `total_bayar`, `id_user`, `status`) VALUES
(11, 'TG250716869', '5', '2025-07-16', '', 0, 910000, 0, 'Dikonfirmasi'),
(12, 'TG250716140', '6', '2025-07-16', '', 0, 3382500, 0, 'Dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` varchar(16) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `meter_awal` int(11) NOT NULL,
  `meter_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
('PGN250715341', 5, 'July', '2025', 0, 1500),
('PGN250715780', 6, 'July', '2025', 0, 2500);

--
-- Triggers `penggunaan`
--
DELIMITER $$
CREATE TRIGGER `after_insert_penggunaan` AFTER INSERT ON `penggunaan` FOR EACH ROW BEGIN
  DECLARE new_id_tagihan VARCHAR(20);
  DECLARE tarif_kwh INT;
  DECLARE admin_fee INT DEFAULT 2500;
  DECLARE total_meter INT;
  DECLARE jumlah_bayar INT;

  
  SET new_id_tagihan = CONCAT('TG', DATE_FORMAT(NOW(), '%y%m%d'), LPAD(FLOOR(RAND() * 999) + 1, 3, '0'));

  
  SELECT tarif.tarifperkwh INTO tarif_kwh
  FROM pelanggan
  JOIN tarif ON pelanggan.id_tarif = tarif.id_tarif
  WHERE pelanggan.id_pelanggan = NEW.id_pelanggan;

  
  SET total_meter = NEW.meter_akhir - NEW.meter_awal;
  SET jumlah_bayar = (total_meter * tarif_kwh) + admin_fee;

  
  INSERT INTO tagihan (
    id_tagihan,
    id_penggunaan,
    id_pelanggan,
    bulan,
    tahun,
    jumlah_meter,
    jumlah_bayar,
    status
  ) VALUES (
    new_id_tagihan,
    NEW.id_penggunaan,
    NEW.id_pelanggan,
    NEW.bulan,
    NEW.tahun,
    total_meter,
    jumlah_bayar,
    'Belum Dibayar'
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` varchar(20) NOT NULL,
  `id_penggunaan` varchar(16) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `jumlah_bayar`, `status`) VALUES
('TG250716140', 'PGN250715780', 6, 'July', '2025', 2500, 3382500, 'Lunas'),
('TG250716869', 'PGN250715341', 5, 'July', '2025', 1500, 910000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `daya` int(11) NOT NULL,
  `tarifperkwh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `daya`, `tarifperkwh`) VALUES
(1, 450, 420),
(2, 900, 605),
(3, 1300, 1352);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_admin`, `id_level`) VALUES
(1, 'admin', 'ad556d63e9333734ab1fd7e76f753269', 'Mohammad Alfi Hamzami', 1),
(3, 'budisan', '570c396b3fc856eceb8aa7357f32af1a', 'Budi Santosa', 2),
(4, 'rudiman', '570c396b3fc856eceb8aa7357f32af1a', 'Rudi Budiman', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tarif`
-- (See below for the actual view)
--
CREATE TABLE `v_tarif` (
`id_tarif` int(11)
,`daya` int(11)
,`tarifperkwh` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_tarif`
--
DROP TABLE IF EXISTS `v_tarif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tarif`  AS SELECT `tarif`.`id_tarif` AS `id_tarif`, `tarif`.`daya` AS `daya`, `tarif`.`tarifperkwh` AS `tarifperkwh` FROM `tarif``tarif`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_user` (`id_pelanggan`),
  ADD KEY `pembayaran_ibfk_1` (`id_tagihan`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
