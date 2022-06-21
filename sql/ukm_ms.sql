-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 11:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `id_broadcast` int(11) NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'p',
  `penerima` char(1) NOT NULL DEFAULT 'a',
  `id_ukm` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `reason` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broadcast`
--

INSERT INTO `broadcast` (`id_broadcast`, `pengirim`, `judul`, `isi`, `status`, `penerima`, `id_ukm`, `date`, `reason`) VALUES
(1, '2010130001', 'Pemberitahuan untuk kegiatan akhir bulan ini', 'kepada seluruh anggota ukm Ballet diharapkan untuk segera berkumpul di dan segera melunasi pembayaran kas untuk bulan ini, dikarenakan akan digunakan untuk kebutuhan organisasi ini.\r\nTerimakasih', 'a', 'a', 13, '2022-06-21 00:00:00', 'asdasd'),
(5, '2010130001', 'Harry Potah', 'dsfsdfsfsfhshfsg', 'a', 'a', 13, '2022-06-21 00:00:00', ''),
(6, '2010130001', 'ashdlaskdhla', 'alskdjlasjdalskdjlaksdjqweadasdw', 'r', 'a', 13, '2022-06-21 19:21:14', 'Tidak jelas'),
(7, '2010130001', 'test', 'testestse123', 'p', 'k', 13, '2022-06-22 00:52:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `id_ukm` int(11) NOT NULL,
  `id_bulan` int(11) NOT NULL,
  `pekan1` int(11) NOT NULL,
  `pekan2` int(11) NOT NULL,
  `pekan3` int(11) NOT NULL,
  `pekan4` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id_notif` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `id_ukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bulanan`
--

CREATE TABLE `pembayaran_bulanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tahun` date NOT NULL,
  `kasminggu` int(11) NOT NULL,
  `ukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reset-password`
--

CREATE TABLE `reset-password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'admin'),
(2, 'ketua'),
(3, 'wakil'),
(4, 'bendahara'),
(5, 'member'),
(7, 'lecturers');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id_ukm` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `berdiri` date NOT NULL DEFAULT current_timestamp(),
  `ketua` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `nama`, `logo`, `berdiri`, `ketua`) VALUES
(1, 'LDK Islamic Clubs', '', '2022-06-14', '0'),
(2, 'Golden Technology', '', '2022-06-14', '0'),
(3, 'Futsal', '', '2022-06-14', '0'),
(4, 'Basket', '', '2022-06-14', '0'),
(5, 'Gema', '', '2022-06-14', '0'),
(13, 'Ballet', '', '2022-06-14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim` varchar(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `notelp` varchar(16) NOT NULL,
  `sex` char(1) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `id_role` int(11) DEFAULT 5,
  `id_ukm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim`, `name`, `email`, `pass`, `status`, `notelp`, `sex`, `foto`, `bio`, `id_role`, `id_ukm`) VALUES
('2010130001', 'Afifah Khairiyyah', 'afifahkhairiyyah@students.esqbs.ac.id', '$2y$10$32pV/JIlbv1zjffmi.DqoOizj2t37vTHyoDvMGasIr7K5Kpu5rJOW', 0, '08123312', 'P', '2010130001_profile.png', 'hahashdka', 2, 13),
('2010130002', 'Ahmad Nur Hidaya', 'ahmadnurhidaya@gmail.com', '$2y$10$qa/RQNgHbe1.L.1Y87xNXOaJdiufQFrHXYJX9F9OEXJIFstHvPYNa', 0, '081382212', 'L', NULL, NULL, 2, 1),
('2010130003', 'Alif Zaky ChakraUnlimiteds', 'alif.zaky.cakraunlimited@students.esqbs.ac.id', '$2y$10$109u8Y4E8jhWfbjGbzfYDeoBUtkjwPht9NViP.ORQ/rfuNyWKFmEO', 0, '098123123', 'L', NULL, NULL, 5, 13),
('2010130007', 'Khaira Isyara', 'khaira.isyara1@students.esqbs.ac.id', '$2y$10$wO0xfjDrPw3F4z3onrw/I.qs0VOF8OupgM.qMme2fS/bvzB1Mnsgi', 0, '0812371238123', 'P', NULL, NULL, 4, 13),
('2010130011', 'Ihsan Shiddiq', 'ihsanshiddiq6513@gmail.com', '$2y$10$wo/sIIRL092ifSAkkh6pqOsbe8sR2u3k9L7CjyP/sJmXcTm7kO3wi', 0, '081382212', 'L', NULL, NULL, 3, 13),
('admin1', 'admin', 'adm.ukmms165@gmail.com', '$2y$10$tEluP2.1su/1X0NMHGlAh.Pmh7bG4jWLQ1DBVE35vOhwE6ht6TtPe', 0, '081382212', 'L', 'admin1_profile.png', 'lkasjdlaskhdiqwlkasd', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`nim` varchar(11)
,`name` text
,`email` varchar(100)
,`pass` varchar(255)
,`status` tinyint(1)
,`notelp` varchar(16)
,`sex` char(1)
,`foto` varchar(200)
,`bio` text
,`id_role` int(11)
,`id_ukm` int(11)
,`nama_ukm` varchar(50)
,`nama_role` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS SELECT `user`.`nim` AS `nim`, `user`.`name` AS `name`, `user`.`email` AS `email`, `user`.`pass` AS `pass`, `user`.`status` AS `status`, `user`.`notelp` AS `notelp`, `user`.`sex` AS `sex`, `user`.`foto` AS `foto`, `user`.`bio` AS `bio`, `user`.`id_role` AS `id_role`, `user`.`id_ukm` AS `id_ukm`, `ukm`.`nama` AS `nama_ukm`, `role`.`nama` AS `nama_role` FROM ((`user` join `ukm`) join `role`) WHERE `user`.`id_ukm` = `ukm`.`id_ukm` AND `user`.`id_role` = `role`.`id_role``id_role`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`id_broadcast`),
  ADD KEY `fk_bc_user` (`pengirim`),
  ADD KEY `fk_bc_ukm` (`id_ukm`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `fk_kas_ukm` (`id_ukm`),
  ADD KEY `fk_kas_bulan` (`id_bulan`),
  ADD KEY `fk_kas_user` (`id_user`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ukm_bulan` (`ukm`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset-password`
--
ALTER TABLE `reset-password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_role` (`id_role`),
  ADD KEY `fk_user_ukm` (`id_ukm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `id_broadcast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset-password`
--
ALTER TABLE `reset-password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD CONSTRAINT `fk_bc_ukm` FOREIGN KEY (`id_ukm`) REFERENCES `ukm` (`id_ukm`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bc_user` FOREIGN KEY (`pengirim`) REFERENCES `user` (`nim`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kas`
--
ALTER TABLE `kas`
  ADD CONSTRAINT `fk_kas_bulan` FOREIGN KEY (`id_bulan`) REFERENCES `pembayaran_bulanan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kas_ukm` FOREIGN KEY (`id_ukm`) REFERENCES `ukm` (`id_ukm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kas_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`nim`);

--
-- Constraints for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  ADD CONSTRAINT `fk_ukm_bulan` FOREIGN KEY (`ukm`) REFERENCES `ukm` (`id_ukm`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_ukm` FOREIGN KEY (`id_ukm`) REFERENCES `ukm` (`id_ukm`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
