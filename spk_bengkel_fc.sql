-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 09:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_bengkel_fc`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `gejala_id` varchar(11) NOT NULL,
  `isi_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`gejala_id`, `isi_gejala`) VALUES
('G01', 'Saat motor di starter atau di engkol mesin tidak hidup.'),
('G02', 'Mesin motor tidak hidup padahal bensin masih penuh.'),
('G02-1', 'Mesin motor tidak hidup padahal bensin masih penuh.'),
('G03', 'Saat motor di engkol terasa ringan atau los.'),
('G04', 'Kabel coil atau busi tidak mengeluarkan arus listrik.'),
('G04-1', 'Kabel coil atau busi tidak mengeluarkan arus listrik.'),
('G05', 'Seluruh kelistrikan mati.'),
('G05-1', 'Seluruh kelistrikan mati'),
('G05-2', 'Seluruh kelistrikan mati'),
('G06', 'Saat motor di starter mesin tidak hidup.'),
('G07', 'Saat motor di starter tidak terdengar suara dinamo starter.'),
('G07-1', 'Saat motor di starter tidak terdengar suara dinamo starter.'),
('G08', 'Saat motor di starter mesin tidak hidup padahal aki normal.'),
('G08-1', 'Saat motor di starter mesin tidak hidup padahal aki normal.'),
('G09', 'Timbul suara menggelitik.'),
('G10', 'Pada cylinder head, timbul suara berisik pada cylinder head'),
('G20', 'Test Edit'),
('G30', 'Tidak ada Kerusakan');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `hasil_id` varchar(25) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `notlp` int NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `merek` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `tipe` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `nama_mekanik` varchar(255) DEFAULT NULL,
  `kerusakan` varchar(255) DEFAULT NULL,
  `gejala_1` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `gejala_2` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `gejala_3` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tanggal` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`hasil_id`, `Nama`, `notlp`, `alamat`, `merek`, `tipe`, `nama_mekanik`, `kerusakan`, `gejala_1`, `gejala_2`, `gejala_3`, `tanggal`) VALUES
('HAS1', 'NamaSatu', 9191919, 'asda awsda asd', 'Samsung', '10 Pro', 'Mekanik Sati', 'Gangguan atau kerusakan pada busi', 'Saat motor di starter atau di engkol mesin tidak hidup.', 'Mesin motor tidak hidup padahal bensin masih penuh.', 'Saat motor di engkol terasa ringan atau los.', '2024-07-09 08:46:00'),
('HAS189', 'NamaSatu', 9191919, 'askdmklajwidja', 'Samsung', 'Galaxy Z', 'Mekanik Sati', 'Gangguan atau kerusakan pada klep.', 'Kabel coil atau busi tidak mengeluarkan arus listrik.', 'Seluruh kelistrikan mati.', 'Seluruh kelistrikan mati.', '2024-07-29 22:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `kerusakan_id` varchar(11) NOT NULL,
  `Nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`kerusakan_id`, `Nama`) VALUES
('K01', 'Gangguan atau kerusakan pada busi'),
('K02', 'Gangguan atau kerusakan pada klep.'),
('K03', 'Gangguan atau kerusakan pada ignition coil atau EC.'),
('K04', 'Gangguan atau kerusakan pada sekring aki.'),
('K05', 'Gangguan atau kerusakan pada aki.'),
('K06', 'Gangguan atau kerusakan pada komponen dinamo stater.'),
('K07', 'Gangguan atau kerusakan pada noken as.'),
('K08', 'Gangguan atau kerusakan pada pelatuk klep.'),
('K09', 'Gangguan atau kerusakan pada bosh klep.'),
('K10', 'Gangguan atau kerusakan pada otomatis tensioner.'),
('K11', 'Coba untuk Isi Bensin terlebih Dahulu'),
('K12', 'Motor Normal Coba naikkan standarnya'),
('K32 ', 'asdadsdawdasd');

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `mekanik_id` varchar(30) NOT NULL,
  `username` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `notlp` varchar(20) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`mekanik_id`, `username`, `password`, `Nama`, `notlp`, `alamat`) VALUES
('MEK01', 'Mekaniktest', '123456', 'Mekanik Sati', '0812818181818', 'Jalan RAya ');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `motor_id` varchar(30) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `notlp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `merek` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`motor_id`, `Nama`, `notlp`, `alamat`, `merek`, `jenis`, `tanggal`) VALUES
('MOT110', 'Test Nama', '123123', 'asda awsda asd', 'infinix', '123123', '2024-07-10 01:01:52'),
('MOT19', 'NamaSatu', '9191919', 'asda awsda asd', 'Samsung', '10 Pro', '2024-07-09 08:46:00'),
('MOT191', 'Erzie', '081281480122', 'asssc crdt gvgfd ssss', 'Honda', 'Vario', '2024-07-17 19:18:20'),
('MOT200', 'NamaSatu', '9191919', 'askdmklajwidja', 'Samsung', 'Galaxy Z', '2024-07-29 22:42:59'),
('MOT43', 'NamaSatu', '123123', 'asda awsda asd', 'Honda', 'Vario', '2024-07-10 02:37:16'),
('MOT55', 'NamaSatu', '123123', 'asda awsda asd', 'Merek Satu', '123123', '2024-08-01 03:06:59'),
('MOT73', 'NamaSatu', '9191919', 'askdmklajwidja', 'Merek Satu', '123123', '2024-08-01 03:22:44'),
('MOT79', 'NamaSatu', '4444', 'asda awsda asd', 'Merek Satu', '10 Pro', '2024-07-29 22:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `rule_id` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `kerusakan_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `rule_1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `rule_2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `rule_3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`rule_id`, `kerusakan_id`, `rule_1`, `rule_2`, `rule_3`) VALUES
('R01', 'K01', 'G01', 'G02', 'G03'),
('R02', 'K02', 'G04', 'G05', 'G05'),
('R03', 'K03', 'G02', 'G07', 'G08'),
('R04', 'K04', 'G05', 'G07', 'G09'),
('R05', 'K05', 'G04', 'G05', 'G10'),
('R13', 'K11', 'G30', 'G30', 'G30'),
('R49', 'K12', 'G30', 'G30', 'G30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`gejala_id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`hasil_id`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`kerusakan_id`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`mekanik_id`),
  ADD UNIQUE KEY `Username` (`username`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`motor_id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`rule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
