-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 03:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sumberjaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(100) NOT NULL,
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_status` enum('input','ready') NOT NULL DEFAULT 'input',
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_harjul_grosir` double DEFAULT NULL,
  `barang_stok` double(11,2) DEFAULT 0.00,
  `barang_min_stok` double(11,2) DEFAULT 0.00,
  `barang_tgl_input` timestamp NULL DEFAULT current_timestamp(),
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `barang_id`, `barang_nama`, `barang_satuan`, `barang_status`, `barang_harpok`, `barang_harjul`, `barang_harjul_grosir`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`) VALUES
(1, '0709297900006', 'Tp Roti', 'Kilogram', 'ready', 9040, 10500, 9500, 17.50, 0.00, '2022-12-08 12:51:43', NULL, 6, 1),
(2, '0709197900001', 'Aqua 600ml', 'Botol', 'ready', 1867, 2500, 2000, 329.00, 72.00, '2022-12-06 04:01:10', '2022-12-06 11:03:59', 5, 1),
(3, '0709197900002', 'Aqua 1500ml', 'Botol', 'ready', 4192, 5000, 4500, 59.00, 12.00, '2022-12-06 04:07:15', NULL, 5, 1),
(4, '0709197900003', 'Air mineral Clinci ', 'Kotak', 'ready', 12500, 13500, 13000, 59.00, 10.00, '2022-12-06 04:14:47', '2022-12-08 10:01:21', 5, 1),
(5, '0709197900004', 'Air mineral teman', 'Kotak', 'ready', 12500, 13500, 13000, 49.00, 10.00, '2022-12-06 04:15:54', '2022-12-08 10:01:30', 5, 1),
(6, '0709197900005', 'Tepung beras rose brand', 'Bks', 'ready', 5700, 6500, 5850, 99.00, 20.00, '2022-12-06 04:19:15', '2022-12-06 11:30:52', 6, 1),
(53, '0709197900007', 'tepung kanji', 'Kilogram', 'ready', 7800, 9000, 8500, 24.00, 0.00, '2022-12-08 13:57:45', NULL, 6, 1),
(54, '0709197900008', 'tepung sagu', 'Kilogram', 'ready', 10667, 12000, 11500, 29.00, 0.00, '2022-12-08 14:12:25', NULL, 6, 1),
(55, '0709197900009', 'kerupuk pecal', 'Kilogram', 'ready', 13000, 14500, 14000, 4.00, 0.00, '2022-12-08 14:16:07', NULL, 7, 1),
(56, '0709197900010', 'mie lidi srikaya', 'Bks', 'ready', 5800, 6500, 6200, 49.00, 0.00, '2022-12-08 14:19:24', NULL, 8, 1),
(57, '8998225800012', 'minyak makan fortun', 'Bks', 'ready', 15208, 16000, 15700, 24.00, 0.00, '2022-12-08 14:24:24', NULL, 3, 1),
(58, '0709197900011', 'minyak makan curah', 'Kilogram', 'ready', 12800, 13500, 13500, 54.00, 0.00, '2022-12-08 14:25:42', NULL, 3, 1),
(59, '0709197900012', 'gula putih', 'Kilogram', 'ready', 12850, 13500, 13500, 50.00, 0.00, '2022-12-08 14:27:10', NULL, 3, 1),
(60, '0709197900013', 'kacang hijau', 'Kilogram', 'ready', 20500, 22000, 22000, 10.00, 0.00, '2022-12-08 14:29:19', NULL, 9, 1),
(61, '0709197900014', 'sagu mata ikan', 'Kilogram', 'ready', 24000, 26000, 26000, 3.00, 0.00, '2022-12-08 14:30:35', NULL, 6, 1),
(62, '0709197900015', 'pulut putih', 'Kilogram', 'ready', 13200, 16000, 16000, 25.00, 0.00, '2022-12-08 14:32:00', NULL, 3, 1),
(63, '0709197900016', 'pulut hitam', 'Kilogram', 'ready', 18000, 20000, 20000, 5.00, 0.00, '2022-12-08 14:33:14', NULL, 3, 1),
(66, '0709197900017', 'tepung pulut', 'Bks', 'ready', 9250, 10000, 9500, 40.00, 0.00, '2022-12-08 14:38:28', NULL, 6, 1),
(67, '0709197900018', 'kertas nasi', 'Bks', 'ready', 26500, 28000, 28000, 5.00, 0.00, '2022-12-08 14:40:38', NULL, 10, 1),
(68, '8999999706180', 'pepsodent besar 190 gr', 'PCS', 'ready', 10417, 14000, 13000, 12.00, 0.00, '2022-12-08 14:44:41', NULL, 11, 1),
(69, '8999999706173', 'pepsodent sedang 120gr', 'PCS', 'ready', 7083, 8500, 7500, 12.00, 0.00, '2022-12-08 14:46:45', '2022-12-08 21:47:11', 11, 1),
(70, '8999999706081', 'pepsodent kecil 75gr', 'PCS', 'ready', 4250, 4800, 4750, 12.00, 0.00, '2022-12-08 14:49:33', NULL, 11, 1),
(71, '8992770084064', 'tepung sajiku  220gr', 'Bks', 'ready', 4875, 5500, 5250, 40.00, 0.00, '2022-12-08 14:54:12', NULL, 6, 1),
(72, '8992770061010', 'tepung sajiku 75gr', 'Bks', 'ready', 2000, 2500, 2250, 120.00, 0.00, '2022-12-08 14:56:23', NULL, 6, 1),
(73, '7118443301150', 'sarden ABC 425gr besar', 'Kaleng', 'ready', 19500, 23000, 0, 12.00, 0.00, '2022-12-09 13:42:44', NULL, 3, 1),
(74, '0709197900019', 'sarden ABC 425gr besar (grosir)', 'Kotak', 'ready', 234000, 236000, 0, 0.00, 0.00, '2022-12-09 13:44:31', NULL, 3, 1),
(75, '7118443301080', 'sarden ABC 425gr kecil 155gr', 'Kaleng', 'ready', 9500, 10500, 0, 12.00, 0.00, '2022-12-09 13:46:35', NULL, 3, 1),
(76, '0709197900020', 'sarden ABC 425gr kecil 155gr(grosir)', 'Kotak', 'ready', 114000, 116000, 0, 0.00, 0.00, '2022-12-09 13:47:44', NULL, 3, 1),
(77, '8993007002967', 'susu tiga sapi kaleng 490gr', 'Kaleng', 'ready', 11875, 12500, 0, 24.00, 0.00, '2022-12-09 13:51:15', NULL, 12, 1),
(78, '0709197900021', 'susu tiga sapi kaleng 490gr(grosir)', 'Kotak', 'ready', 285000, 290000, 0, 0.00, 0.00, '2022-12-09 13:52:27', NULL, 12, 1),
(79, '8992753102204', 'susu bendera coklat 370gr', 'Kaleng', 'ready', 11667, 12800, 0, 24.00, 0.00, '2022-12-09 13:54:43', NULL, 12, 1),
(80, '0709197900022', 'susu bendera coklat 370gr( grosir)', 'Kotak', 'ready', 280000, 285000, 0, 0.00, 0.00, '2022-12-09 13:55:53', NULL, 12, 1),
(81, '8992753101207', 'susu bendera putih 370gr', 'Kaleng', 'ready', 11667, 12800, 0, 24.00, 0.00, '2022-12-09 13:57:28', NULL, 12, 1),
(82, '0709197900023', 'susu bendera putih 370gr(grosir)', 'Kotak', 'ready', 280000, 285000, 0, 0.00, 0.00, '2022-12-09 13:58:29', NULL, 12, 1),
(83, '8998866602556', 'sabun nuvo merah 76gr', 'PCS', 'ready', 2361, 2800, 0, 72.00, 0.00, '2022-12-09 14:01:30', NULL, 13, 1),
(84, '0709197900024', 'sabun nuvo merah 76gr(grosir)', 'Kotak', 'ready', 170000, 175000, 0, 1.00, 0.00, '2022-12-09 14:02:29', NULL, 13, 1),
(85, '8993379210854', 'sabun harmony 70gr', 'PCS', 'ready', 2083, 2600, 0, 72.00, 0.00, '2022-12-09 14:04:23', '2022-12-09 21:06:03', 13, 1),
(86, '0709197900025', 'sabun harmony 70gr(grosir)', 'Kotak', 'ready', 150000, 155000, 0, 0.00, 0.00, '2022-12-09 14:05:25', NULL, 13, 1),
(87, '8998866107501', 'zinc almond', 'Lusin', 'ready', 4643, 7000, 0, 21.00, 0.00, '2022-12-09 14:12:41', NULL, 14, 1),
(88, '0709197900026', 'zinc almond (grosir)', 'Kotak', 'ready', 97500, 100000, 0, 0.00, 0.00, '2022-12-09 14:13:43', NULL, 14, 1),
(89, '8999999529833', 'clear  menthol', 'Lusin', 'ready', 9789, 11000, 0, 38.00, 0.00, '2022-12-09 14:17:17', NULL, 14, 1),
(90, '0709197900027', 'clear  menthol(grosir)', 'Kotak', 'ready', 372000, 380000, 0, 0.00, 0.00, '2022-12-09 14:18:27', NULL, 14, 1),
(91, '0709197900028', 'sirup kurnia', 'Botol', 'ready', 19333, 21000, 0, 12.00, 0.00, '2022-12-09 14:20:41', NULL, 16, 1),
(92, '0709197900029', 'sirup kurnia(grosir)', 'Lusin', 'ready', 232000, 0, 235000, 1.00, 0.00, '2022-12-09 14:21:58', NULL, 16, 1),
(93, '0709197900030', 'sirup pohon pinang', 'Botol', 'ready', 19583, 21500, 0, 12.00, 0.00, '2022-12-09 14:23:26', NULL, 16, 1),
(94, '0709197900031', 'sirup pohon pinang(grosir)', 'Lusin', 'ready', 235000, 239000, 0, 0.00, 0.00, '2022-12-09 14:24:30', NULL, 16, 1),
(95, '8992705011042', 'agar agar sriti', 'PCS', 'ready', 3883, 4500, 0, 24.00, 0.00, '2022-12-09 14:27:46', NULL, 4, 1),
(96, '0709197900032', 'agar agar sriti(grosir)', 'Kotak', 'ready', 46000, 48000, 0, 1.00, 0.00, '2022-12-09 14:29:06', NULL, 4, 1),
(97, '8998866601429', 'daia 5000', 'Bks', 'ready', 4375, 5000, 0, 24.00, 0.00, '2022-12-09 14:32:33', NULL, 17, 1),
(98, '0709197900033', 'daia 5000(grosir)', 'Kotak', 'ready', 105000, 107000, 0, 0.00, 0.00, '2022-12-09 14:33:50', NULL, 17, 1),
(99, '8998866610230', 'daia 1000', 'Bks', 'ready', 792, 1000, 0, 36.00, 0.00, '2022-12-09 14:36:03', '2022-12-09 21:39:01', 17, 1),
(100, '0709197900034', 'daia 1000(grosir', 'Lusin', 'ready', 9504, 10500, 0, 3.00, 0.00, '2022-12-09 14:38:38', '2022-12-09 21:42:17', 17, 1),
(101, '8998866608695', 'daia 500', 'PCS', 'ready', 400, 500, 0, 60.00, 0.00, '2022-12-09 14:40:13', NULL, 17, 1),
(102, '0709197900035', 'daia 500(grosir)', 'Lusin', 'ready', 4800, 5500, 0, 5.00, 0.00, '2022-12-09 14:41:29', NULL, 17, 1),
(103, '8992696521797', ' milo sahcet ', 'PCS', 'ready', 1591, 2000, 0, 110.00, 0.00, '2022-12-09 14:46:02', NULL, 12, 1),
(104, '0709197900036', 'milo sahcet(grosir)', 'Roll', 'ready', 17500, 18500, 0, 10.00, 0.00, '2022-12-09 14:50:38', NULL, 12, 1),
(105, '8999999556327', 'teh sariwangi', 'Kotak', 'ready', 5104, 6000, 0, 48.00, 0.00, '2022-12-09 14:54:36', NULL, 18, 1),
(106, '0709197900037', 'teh sariwangi(grosir)', 'Box', 'ready', 245000, 248000, 0, 0.00, 0.00, '2022-12-09 14:56:09', NULL, 18, 1),
(107, '8993055000601', 'teh bendera', 'Kotak', 'ready', 5000, 6000, 0, 48.00, 0.00, '2022-12-09 14:57:11', NULL, 18, 1),
(108, '0709197900038', 'teh bendera(grosir)', 'Box', 'ready', 240000, 243000, 0, 0.00, 0.00, '2022-12-09 14:58:10', NULL, 18, 1),
(109, '8999999050009', 'sunlight 2000', 'PCS', 'ready', 1667, 2000, 0, 72.00, 0.00, '2022-12-09 14:59:49', '2022-12-09 22:01:32', 17, 1),
(110, '0709197900039', 'sunlight 2000(grosir)', 'Kotak', 'ready', 120000, 125000, 0, 0.00, 0.00, '2022-12-09 15:01:19', NULL, 17, 1),
(111, '8999999059781', 'sunlight 5000', 'PCS', 'ready', 4250, 5000, 0, 24.00, 0.00, '2022-12-09 15:02:28', NULL, 17, 1),
(112, '0709197900040', 'sunlight 5000(grosir)', 'Kotak', 'ready', 102000, 107000, 0, 0.00, 0.00, '2022-12-09 15:03:44', NULL, 17, 1),
(115, '0709197900041', 'acid citrid', 'PCS', 'ready', 2500, 3000, 0, 200.00, 0.00, '2022-12-10 04:03:21', '2022-12-10 11:22:10', 17, 1),
(117, '0709197900042', 'acid citrid (grosir)', 'Kotak', 'ready', 50000, 52000, 0, 0.00, 0.00, '2022-12-10 04:06:15', '2022-12-11 10:28:17', 17, 1),
(118, '9311931029017', 'indocafe cappucino', 'PCS', 'ready', 1840, 2500, 0, 130.00, 0.00, '2022-12-10 04:11:22', '2022-12-10 11:24:31', 19, 1),
(119, '0709197900043', 'indocafe cappucino(grosir)', 'Roll', 'ready', 18400, 20000, 0, 12.00, 0.00, '2022-12-10 04:14:22', '2022-12-11 17:48:17', 19, 1),
(120, '0709197900044', 'sari gula cap lonceng', 'PCS', 'ready', 3500, 4000, 0, 80.00, 0.00, '2022-12-10 04:20:41', '2022-12-10 11:28:54', 4, 1),
(122, '0709197900045', 'sari gula cap lonceng ( grosir)', 'Bks', 'ready', 17500, 20000, 0, 2.00, 0.00, '2022-12-10 04:31:54', NULL, 4, 1),
(123, '8993296210005', 'Tepung roti Sigitiga biru', 'Bks', 'ready', 13083, 15000, 0, 12.00, 0.00, '2022-12-10 04:38:24', NULL, 6, 1),
(124, '0709197900046', 'Tepung roti Sigitiga biru (grosir)', 'Kotak', 'ready', 157000, 160000, 0, 0.00, 0.00, '2022-12-10 04:39:52', NULL, 6, 1),
(125, '0709197900047', 'Kacang Tanah', 'Kilogram', 'ready', 24500, 26500, 0, 50.00, 0.00, '2022-12-10 04:41:16', NULL, 9, 1),
(126, '0709197900048', 'Kacang Tanah (grosir)', 'Kotak', 'ready', 1225000, 1325000, 0, 0.00, 0.00, '2022-12-10 04:43:32', NULL, 9, 1),
(127, '07091979000449', 'Plastik PE 1/4 (grosir)', 'Kilogram', 'ready', 27000, 29000, 0, 5.00, 0.00, '2022-12-10 04:46:39', NULL, 20, 1),
(128, '0709197900050', 'Plastik PE 1/4 ', 'PCS', 'ready', 2700, 3500, 0, 50.00, 0.00, '2022-12-10 04:47:55', NULL, 20, 1),
(129, '0709197900051', 'Plastik PE 1/2 grosiran', 'Kilogram', 'ready', 27000, 29000, 0, 5.00, 0.00, '2022-12-10 04:48:54', '2022-12-10 11:54:25', 20, 1),
(132, '0709197900052', 'Plastik PE 1/2', 'Kilogram', 'ready', 270, 3500, 0, 50.00, 0.00, '2022-12-10 04:49:38', '2022-12-10 11:54:58', 20, 1),
(133, '0709197900053', 'Plastik PE 1', 'PCS', 'ready', 2700, 3500, 0, 50.00, 0.00, '2022-12-10 04:56:58', NULL, 20, 1),
(134, '0709197900054', 'Plastik PE 1 grosiran', 'Kilogram', 'ready', 27000, 29000, 0, 5.00, 0.00, '2022-12-10 04:58:13', NULL, 20, 1),
(135, '0709197900055', 'Plastik PE 2/3', 'PCS', 'ready', 2700, 3500, 0, 50.00, 0.00, '2022-12-10 04:59:05', NULL, 20, 1),
(136, '0709197900056', 'Plastik PE 2/3', 'Kilogram', 'ready', 27000, 29000, 0, 5.00, 0.00, '2022-12-10 05:00:05', NULL, 20, 1),
(137, '0709197900057', 'Pipet Bengkok', 'Bks', 'ready', 1500, 2000, 0, 100.00, 0.00, '2022-12-10 05:02:13', NULL, 20, 1),
(138, '0709197900058', 'Soas Eceran kecil', 'Kilogram', 'ready', 6100, 7000, 0, 20.00, 0.00, '2022-12-10 05:06:03', NULL, 21, 1),
(139, '0709197900059', 'Pinsil 2b', 'Buah', 'ready', 500, 1000, 0, 72.00, 0.00, '2022-12-10 05:10:32', NULL, 22, 1),
(140, '2405202211670', 'Pinsil 2b grosiran', 'Kotak', 'ready', 6000, 8000, 0, 6.00, 0.00, '2022-12-10 05:11:38', NULL, 22, 1),
(141, '0709197900060', 'pulpen murah  kingsman', 'Buah', 'ready', 590, 1000, 0, 72.00, 0.00, '2022-12-10 05:14:30', NULL, 22, 1),
(142, '0709197900061', 'pulpen murah  kingsman grosiran', 'Kotak', 'ready', 7083, 9500, 0, 6.00, 0.00, '2022-12-10 05:15:48', NULL, 22, 1),
(143, '0709197900062', 'Mancis Tokai', 'Buah', 'ready', 1740, 2500, 0, 50.00, 0.00, '2022-12-10 05:19:00', NULL, 23, 1),
(144, '6972877020372', 'Mancis lampu', 'Buah', 'ready', 1500, 2500, 0, 50.00, 0.00, '2022-12-10 05:21:08', NULL, 23, 1),
(145, '0709197900064', 'Notes16', 'PCS', 'ready', 1583, 2500, 0, 12.00, 0.00, '2022-12-10 05:23:48', NULL, 22, 1),
(146, '0709197900063', 'notes7', 'PCS', 'ready', 750, 1500, 0, 12.00, 0.00, '2022-12-10 05:24:53', NULL, 22, 1),
(147, '0709197900065', 'Notes Tabungan Besar', 'PCS', 'ready', 3125, 5000, 0, 12.00, 0.00, '2022-12-10 05:26:02', NULL, 22, 1),
(148, '0709197900066', 'Lakban Tebal', 'Roll', 'ready', 9500, 10500, 0, 12.00, 0.00, '2022-12-10 05:28:06', NULL, 22, 1),
(149, '8992745480426', 'HIT (K)', 'PCS', 'ready', 10500, 12000, 0, 12.00, 0.00, '2022-12-10 05:31:07', NULL, 24, 1),
(150, '0709197900067', 'Lem Kertas GJ', 'PCS', 'ready', 1667, 2500, 0, 24.00, 0.00, '2022-12-10 05:32:36', NULL, 22, 1),
(151, '8993176812022', 'Balsem geliga 20gr', 'Botol', 'ready', 8000, 10000, 0, 12.00, 0.00, '2022-12-10 05:34:59', NULL, 25, 1),
(152, '0709197900068', 'Salisiban hitam', 'PCS', 'input', 600, 1000, 0, 20.00, 0.00, '2022-12-10 05:37:09', NULL, 22, 1),
(153, '0709197900069', 'Benang ', 'PCS', 'input', 556, 1500, 0, 72.00, 0.00, '2022-12-10 05:41:10', '2022-12-10 12:41:53', 26, 1),
(154, '8997239630103', 'Adem sari sahcet', 'PCS', 'input', 1729, 2500, 0, 24.00, 0.00, '2022-12-10 05:44:20', NULL, 27, 1),
(155, '8991111109121', 'bedak jhonson kecil 75gr', 'PCS', 'input', 6250, 7000, 0, 12.00, 0.00, '2022-12-10 05:45:57', '2022-12-10 12:52:03', 11, 1),
(156, '8999908042408', 'my baby kecil 50 gr', 'PCS', 'input', 2917, 4000, 0, 6.00, 0.00, '2022-12-10 05:47:33', '2022-12-10 12:52:29', 11, 1),
(157, '8999908208200', 'my baby besar 100gr', 'PCS', 'input', 5667, 7000, 0, 6.00, 0.00, '2022-12-10 05:48:46', '2022-12-10 12:52:52', 11, 1),
(158, '8999908284907', 'Minyak telon 90ml', 'PCS', 'input', 19583, 21000, 0, 12.00, 0.00, '2022-12-10 05:50:57', NULL, 27, 1),
(159, '8999908204202', 'Minyak telon 60ml', 'PCS', 'input', 14583, 16000, 0, 12.00, 0.00, '2022-12-10 05:54:47', NULL, 27, 1),
(160, '8999908356505', 'Minyak telon 30ml', 'PCS', 'input', 8333, 9500, 0, 12.00, 0.00, '2022-12-10 05:55:42', NULL, 27, 1),
(161, '0709197900070', 'cutter hiruka', 'PCS', 'input', 667, 1000, 0, 24.00, 0.00, '2022-12-10 05:57:53', NULL, 28, 1),
(162, '0709197900071', 'cutter hiruka grosiran', 'renceng', 'input', 8000, 10000, 0, 1.00, 0.00, '2022-12-10 05:58:42', NULL, 28, 1),
(164, '0709197900072', 'Selasiban Kado', 'PCS', 'input', 2000, 2500, 0, 6.00, 0.00, '2022-12-10 10:11:09', NULL, 22, 1),
(165, '0709197900073', 'Selasiban Kado 2 inch', 'PCS', 'input', 2083, 2750, 0, 6.00, 0.00, '2022-12-10 10:13:36', NULL, 22, 1),
(169, '8998838290255', 'Pulpen cair Kenko', 'PCS', 'input', 4583, 5500, 0, 12.00, 0.00, '2022-12-10 10:25:46', NULL, 22, 1),
(170, '8694257260076', 'Pulpen cair high gel', 'PCS', 'input', 1667, 2500, 0, 12.00, 0.00, '2022-12-10 10:27:00', NULL, 22, 1),
(171, '6956953529126', 'Pulpen Cair apple', 'PCS', 'input', 1250, 2000, 0, 12.00, 0.00, '2022-12-10 10:28:47', NULL, 22, 1),
(172, '8999999528935', 'citra 12oml', 'PCS', 'input', 11250, 12500, 0, 6.00, 0.00, '2022-12-10 10:35:27', NULL, 29, 1),
(173, '8999908214805', 'marina natural  besar', 'PCS', 'input', 6833, 8000, 0, 6.00, 0.00, '2022-12-10 10:38:46', NULL, 29, 1),
(174, '8999908060600', 'marina natural  kecil', 'PCS', 'input', 4167, 6000, 0, 6.00, 0.00, '2022-12-10 10:41:49', NULL, 29, 1),
(175, '8991102021678', 'sikat gigi formula diamond', 'PCS', 'input', 2500, 3000, 0, 12.00, 0.00, '2022-12-10 10:45:02', NULL, 13, 1),
(176, '8991102020152', 'sikat gigi formula double action', 'PCS', 'input', 2500, 3000, 0, 12.00, 0.00, '2022-12-10 10:45:59', NULL, 13, 1),
(177, '8999999048167', ' sampo sunslik saset', 'renceng', 'input', 0, 8974, 10500, 39.00, 0.00, '2022-12-10 10:52:03', NULL, 14, 1),
(178, '4902430563864', 'pantene', 'renceng', 'input', 8750, 10500, 0, 42.00, 0.00, '2022-12-10 10:56:13', NULL, 14, 1),
(179, '8999999027056', 'sampo lifebuoy', 'renceng', 'input', 8650, 10000, 0, 20.00, 0.00, '2022-12-11 03:31:11', NULL, 14, 1),
(180, '8997007545677', 'Staples 10', 'PCS', 'input', 1250, 1500, 0, 20.00, 0.00, '2022-12-11 03:36:51', '2022-12-11 10:37:12', 22, 1),
(181, '6945082411112', 'Lampu Hannochs Vario45W', 'PCS', 'input', 67500, 77500, 0, 2.00, 0.00, '2022-12-11 03:43:10', NULL, 30, 1),
(182, '6945082411099', 'Lampu Hannochs Vario30W', 'PCS', 'input', 39000, 44500, 0, 3.00, 0.00, '2022-12-11 03:44:50', '2022-12-11 10:49:02', 30, 1),
(183, '6945082411082', 'Lampu Hannochs Vario24W', 'PCS', 'input', 28500, 32500, 0, 3.00, 0.00, '2022-12-11 03:46:37', '2022-12-11 10:49:18', 30, 1),
(184, '6945082411068', 'Lampu Hannochs Vario12W', 'PCS', 'input', 18500, 21500, 0, 3.00, 0.00, '2022-12-11 03:48:29', NULL, 30, 1),
(185, '6945082411051', 'Lampu Hannochs Vario6W', 'PCS', 'input', 13500, 15500, 0, 3.00, 0.00, '2022-12-11 03:50:55', NULL, 30, 1),
(186, '6945082411075', 'Lampu Hannochs Vario18W', 'PCS', 'input', 24500, 28000, 0, 3.00, 0.00, '2022-12-11 03:58:25', NULL, 30, 1),
(187, '6945082400260', 'Lampu Hannochs biasa26W', 'PCS', 'input', 31000, 35500, 0, 3.00, 0.00, '2022-12-11 04:00:57', NULL, 30, 1),
(188, '6945082400253', 'Lampu Hannochs biasa23W', 'PCS', 'input', 29500, 33500, 0, 3.00, 0.00, '2022-12-11 04:02:30', NULL, 30, 1),
(189, '6945082400246', 'Lampu Hannochs biasa18W', 'PCS', 'input', 29000, 32000, 0, 3.00, 0.00, '2022-12-11 04:04:29', '2022-12-11 11:04:54', 30, 1),
(190, '6945082400239', 'Lampu Hannochs biasa14W', 'PCS', 'input', 25000, 28000, 0, 3.00, 0.00, '2022-12-11 04:06:14', NULL, 30, 1),
(191, '6945082400208', 'Lampu Hannochs biasa15W', 'PCS', 'input', 22000, 25000, 0, 3.00, 0.00, '2022-12-11 04:07:29', NULL, 30, 1),
(192, '8995757827098', 'amplop merpati (grosir)', 'Kotak', 'input', 17500, 20000, 0, 1.00, 0.00, '2022-12-11 04:15:09', '2022-12-11 11:17:43', 31, 1),
(194, '7995757827098', 'amplop merpati (grosir)', 'Kotak', 'input', 17500, 20000, 0, 1.00, 0.00, '2022-12-11 04:16:24', NULL, 31, 1),
(195, '0709197900075', 'amplop AA', 'Bks', 'input', 3750, 5000, 0, 5.00, 0.00, '2022-12-11 04:19:00', NULL, 31, 1),
(196, '8997021870151', 'Freshcre10ml', 'PCS', 'input', 10417, 12000, 0, 12.00, 0.00, '2022-12-11 04:22:43', NULL, 27, 1),
(197, '8993176110111', 'GPU 30ml', 'PCS', 'input', 8333, 10000, 0, 6.00, 0.00, '2022-12-11 04:24:28', NULL, 27, 1),
(198, '8992222055208', 'minyak rambut pomade sachet', 'PCS', 'input', 833, 1000, 0, 36.00, 0.00, '2022-12-11 04:31:07', NULL, 32, 1),
(199, '0709197900076', 'buku gambar A4', 'PCS', 'input', 1520, 2500, 0, 25.00, 0.00, '2022-12-11 04:32:49', NULL, 22, 1),
(200, '8991946310044', 'V-TEc (tipek)', 'PCS', 'input', 3750, 5000, 0, 12.00, 0.00, '2022-12-11 04:37:08', NULL, 22, 1),
(201, '8990007910032', 'pisau inggris astra', 'Kotak', 'input', 4000, 5000, 0, 20.00, 0.00, '2022-12-11 04:39:43', NULL, 28, 1),
(202, '0709197900077', 'kartu joker TG727', 'Bks', 'input', 2667, 5000, 0, 24.00, 0.00, '2022-12-11 04:45:00', NULL, 33, 1),
(203, '2369858595440', 'PVC mika roll (sampul gulung)', 'Roll', 'input', 6500, 7500, 0, 10.00, 0.00, '2022-12-11 04:46:54', NULL, 22, 1),
(204, '8992959508299', 'sweety M', 'PCS', 'input', 1917, 2500, 0, 72.00, 0.00, '2022-12-11 04:56:37', NULL, 34, 1),
(205, '8992959508305', 'sweety L', 'PCS', 'input', 1917, 2500, 0, 17.00, 0.00, '2022-12-11 04:57:50', NULL, 34, 1),
(206, '8997018959999', 'Lem kambing', 'PCS', 'input', 6833, 8500, 0, 12.00, 0.00, '2022-12-11 05:01:02', NULL, 35, 1),
(207, '0709197900078', 'cuttonbuds', 'Bks', 'input', 208, 1000, 0, 24.00, 0.00, '2022-12-11 05:06:05', NULL, 27, 1),
(208, '0709197900079', 'sisir coklat', 'PCS', 'input', 1250, 2500, 0, 12.00, 0.00, '2022-12-11 05:08:34', NULL, 36, 1),
(209, '0709197900080', 'sisir warnah', 'PCS', 'input', 972, 1500, 0, 36.00, 0.00, '2022-12-11 05:10:26', NULL, 36, 1),
(210, '6972288673822', 'cat air wenshen', 'Bks', 'input', 3750, 5000, 0, 12.00, 0.00, '2022-12-11 05:14:57', NULL, 22, 1),
(211, '2258140115124', 'Cat Kayu combo panjang', 'Bks', 'input', 7083, 8500, 0, 12.00, 0.00, '2022-12-11 05:16:33', NULL, 22, 1),
(212, '8994705049988', 'Cat Kayu voxy pendek', 'Bks', 'input', 3750, 5000, 0, 12.00, 0.00, '2022-12-11 05:17:52', NULL, 22, 1),
(213, '8934868015024', 'Rexona sachet', 'PCS', 'input', 1875, 0, 2500, 144.00, 0.00, '2022-12-11 05:24:57', NULL, 29, 1),
(214, '8992727004480', 'laurier sachet', 'PCS', 'input', 420, 1000, 0, 40.00, 0.00, '2022-12-11 05:30:18', NULL, 34, 1),
(215, '0709197900081', 'laurier sachet grosir', 'renceng', 'input', 4200, 8000, 0, 6.00, 0.00, '2022-12-11 05:31:30', NULL, 34, 1),
(216, '8992727000048', 'laurier maci bantal', 'Bks', 'input', 5000, 6500, 0, 12.00, 0.00, '2022-12-11 05:35:55', NULL, 34, 1),
(217, '0709197900082', 'kartu domino gobhui', 'PCS', 'input', 1500, 3000, 0, 20.00, 0.00, '2022-12-11 05:39:44', NULL, 33, 1),
(218, '0709197900083', 'paku pyung 1001', 'Bks', 'input', 650, 1000, 0, 10.00, 0.00, '2022-12-11 05:42:42', NULL, 22, 1),
(219, '8994705039811', 'gunting VOH 165', 'Buah', 'input', 3750, 5000, 0, 12.00, 0.00, '2022-12-11 05:45:35', NULL, 22, 1),
(220, '8992761002039', 'fanta 5500', 'Botol', 'input', 3500, 4750, 0, 12.00, 0.00, '2022-12-11 05:49:27', NULL, 37, 1),
(221, '0709197900084', 'fanta 5500 grosir', 'Lusin', 'input', 42000, 47500, 0, 1.00, 0.00, '2022-12-11 05:51:06', NULL, 37, 1),
(222, '8992761002015', 'cocacola 5500', 'Botol', 'input', 3500, 4750, 0, 12.00, 0.00, '2022-12-11 05:51:56', NULL, 37, 1),
(223, '0709197900085', 'cocacola 5500 grosir', 'Lusin', 'input', 42000, 47500, 0, 1.00, 0.00, '2022-12-11 05:52:44', NULL, 37, 1),
(224, '8992761002022', 'sprite 5500', 'Botol', 'input', 3500, 4750, 0, 12.00, 0.00, '2022-12-11 05:53:28', NULL, 37, 1),
(225, '0709197900086', 'sprite 5500 grosir', 'Lusin', 'input', 42000, 47500, 0, 1.00, 0.00, '2022-12-11 05:54:09', NULL, 37, 1),
(226, '8990007910001', 'lem setan', 'PCS', 'input', 4000, 5000, 0, 50.00, 0.00, '2022-12-11 05:55:55', NULL, 35, 1),
(227, '0709197900087', 'minyak rambut sogo / artis', 'Botol', 'input', 6667, 8000, 0, 12.00, 0.00, '2022-12-11 05:58:45', '2022-12-11 12:58:58', 32, 1),
(228, '8888826019589', 'Gillette Blue II', 'PCS', 'input', 5833, 7000, 0, 24.00, 0.00, '2022-12-11 06:01:33', NULL, 28, 1),
(229, '8992765301008', 'Gillette kuning goal II', 'PCS', 'input', 4583, 6000, 0, 24.00, 0.00, '2022-12-11 06:02:49', NULL, 28, 1),
(230, '8997240100916', 'buku albino isi 42', 'PCS', 'input', 3750, 5000, 0, 0.00, 40.00, '2022-12-11 06:06:16', NULL, 22, 1),
(231, '0709197900089', 'buku tulis isi 50', 'PCS', 'input', 2100, 3500, 0, 40.00, 0.00, '2022-12-11 06:08:21', NULL, 22, 1),
(232, '0709197900090', 'buku albino isi 30', 'PCS', 'input', 1400, 2500, 0, 40.00, 0.00, '2022-12-11 06:09:16', NULL, 22, 1),
(233, '0709197900092', 'lem fox', 'PCS', 'input', 7091, 8500, 0, 11.00, 0.00, '2022-12-11 06:13:36', '2022-12-11 13:24:28', 35, 1),
(234, '0709197900091', 'lem bakar', 'batang', 'input', 1022, 1250, 0, 93.00, 0.00, '2022-12-11 06:18:31', NULL, 35, 1),
(235, '8999801310260', 'baterai  jam ABC', 'Buah', 'input', 1750, 2250, 0, 48.00, 0.00, '2022-12-11 06:23:32', NULL, 38, 1),
(236, '0709197900093', 'kwitansi besar', 'PCS', 'input', 6250, 8500, 0, 6.00, 0.00, '2022-12-11 06:26:08', NULL, 22, 1),
(237, '8694677100006', 'Henna Black', 'PCS', 'input', 6250, 8000, 0, 6.00, 0.00, '2022-12-11 06:27:58', NULL, 32, 1),
(238, '8996001523223', 'Migelas Protevid', 'PCS', 'input', 1121, 1500, 0, 66.00, 0.00, '2022-12-11 09:53:57', NULL, 8, 1),
(239, '0709197900094', 'Migelas Protevid grosir', 'renceng', 'input', 12333, 13500, 0, 6.00, 0.00, '2022-12-11 09:56:46', NULL, 8, 1),
(240, '8999999502393', 'Royco kaldu ayam sachet', 'PCS', 'input', 354, 500, 0, 288.00, 0.00, '2022-12-11 10:01:57', NULL, 4, 1),
(241, '0709197900095', 'Royco kaldu ayam sachet grosir', 'renceng', 'input', 4250, 5000, 0, 24.00, 0.00, '2022-12-11 10:04:25', NULL, 4, 1),
(242, '8999999192150', 'Royco kaldu ayam 94gr', 'PCS', 'input', 4028, 5000, 0, 36.00, 0.00, '2022-12-11 10:07:50', NULL, 4, 1),
(243, '7118441101378', 'kecap manis ABC', 'PCS', 'input', 14500, 16500, 0, 12.00, 0.00, '2022-12-11 10:11:27', NULL, 39, 1),
(244, '8992775913000', 'chocolatos drink', 'renceng', 'input', 15875, 19000, 0, 8.00, 0.00, '2022-12-11 10:13:46', '2022-12-11 17:47:35', 19, 1),
(245, '0709197900096', 'Karet Cincin', 'Bks', 'input', 4550, 5500, 0, 50.00, 0.00, '2022-12-11 10:20:16', NULL, 40, 1),
(247, '0709197900097', 'Kotak makan gabus besar', 'PCS', 'input', 430, 550, 0, 200.00, 0.00, '2022-12-11 10:28:45', NULL, 4, 1),
(248, '0709197900098', 'Kotak makan gabus besar grosir', 'ball', 'input', 43000, 48000, 0, 3.00, 0.00, '2022-12-11 10:31:05', NULL, 4, 1),
(249, '0709197900099', 'Kotak makan gabus kecil', 'PCS', 'input', 330, 450, 0, 200.00, 0.00, '2022-12-11 10:32:40', '2022-12-11 17:33:14', 4, 1),
(250, '0709197900101', 'Kotak makan gabus kecil grosir', 'ball', 'input', 33000, 38000, 0, 3.00, 0.00, '2022-12-11 10:34:12', NULL, 4, 1),
(251, '8993007004145', 'susu 3 sapi coklat', 'PCS', 'input', 1125, 1500, 0, 60.00, 0.00, '2022-12-11 10:39:05', NULL, 12, 1),
(252, '8993007004169', 'susu 3 sapi coklat grosir', 'renceng', 'input', 6750, 7500, 0, 10.00, 0.00, '2022-12-11 10:40:48', NULL, 12, 1),
(253, '8999999100506', 'kecap bango 520', 'PCS', 'input', 20083, 22000, 0, 12.00, 0.00, '2022-12-11 10:44:37', NULL, 39, 1),
(254, '8999999012625', 'kecap bango 210Ml', 'PCS', 'input', 10042, 11000, 0, 24.00, 0.00, '2022-12-11 10:50:40', NULL, 39, 1),
(255, '8999999514006', 'kecap bango 60Ml', 'PCS', 'input', 2219, 3000, 0, 48.00, 0.00, '2022-12-11 10:53:14', NULL, 39, 1),
(256, '8992759170580', 'tisu jolly', 'Bks', 'input', 6563, 8000, 0, 48.00, 0.00, '2022-12-11 12:50:20', NULL, 41, 1),
(257, '0117472341600', 'garam dolpin 250gr', 'Bks', 'input', 2708, 3500, 0, 48.00, 0.00, '2022-12-11 12:56:43', '2022-12-11 20:00:12', 4, 1),
(258, '0117472341910', 'garam dolpin 500gr', 'Bks', 'input', 5333, 7000, 0, 24.00, 0.00, '2022-12-11 12:59:48', NULL, 4, 1),
(259, '8994171102101', 'luwak white koffie botol', 'Botol', 'input', 4167, 5000, 0, 12.00, 0.00, '2022-12-11 13:03:23', NULL, 19, 1),
(260, '8999999502003', 'teh sarimurni', 'PCS', 'ready', 12667, 15000, 0, 15.00, 0.00, '2022-12-11 13:09:22', NULL, 18, 1),
(261, '0709197900102', 'tusuk sate pendek swan', 'Bks', 'input', 9750, 11000, 0, 60.00, 0.00, '2022-12-11 13:18:32', NULL, 4, 1),
(262, '0709197900103', 'tusuk sate panjang swan', 'Bks', 'input', 9500, 11500, 0, 60.00, 0.00, '2022-12-11 13:19:47', NULL, 4, 1),
(263, '0709197900104', 'tusuk sate panjang global', 'Bks', 'input', 9167, 10500, 0, 60.00, 0.00, '2022-12-11 13:20:44', NULL, 4, 1),
(264, '0709197900105', 'tali plastik matahari 2kg', 'Roll', 'input', 3500, 4500, 0, 10.00, 0.00, '2022-12-11 13:25:52', NULL, 20, 1),
(265, '0709197900106', 'tali plastik matahari 4kg', 'Roll', 'input', 6700, 7500, 0, 10.00, 0.00, '2022-12-11 13:26:53', NULL, 20, 1),
(266, '8992761166205', 'frestea', 'Botol', 'input', 2750, 3500, 0, 12.00, 0.00, '2022-12-11 13:32:55', '2022-12-11 20:35:33', 42, 1),
(267, '0709197900107', ' frestea grosir', 'Lusin', 'input', 33000, 35000, 0, 1.00, 0.00, '2022-12-11 13:35:07', NULL, 42, 1),
(268, '8992696523081', 'milo uht 110ml', 'PCS', 'input', 2278, 3000, 0, 36.00, 0.00, '2022-12-11 13:38:47', NULL, 12, 1),
(269, '08992696523098', 'milo uht 110ml grosiran', 'Kotak', 'input', 82000, 85000, 0, 0.00, 0.00, '2022-12-11 13:40:24', NULL, 12, 1),
(270, '8992753031894', 'susu bendera putih  sahcet', 'PCS', 'input', 1258, 1750, 0, 60.00, 0.00, '2022-12-11 13:44:42', '2022-12-11 20:45:55', 12, 1),
(271, '8992753031900', 'susu bendera putih  renceng', 'renceng', 'input', 7550, 9000, 0, 10.00, 0.00, '2022-12-11 13:47:34', NULL, 12, 1),
(272, '8992753102006', 'susu bendera coklat sachet', 'PCS', 'input', 1263, 1750, 0, 60.00, 0.00, '2022-12-11 13:50:10', NULL, 12, 1),
(273, '8992753102303', 'susu bendera coklat ', 'renceng', 'input', 7575, 9000, 0, 10.00, 0.00, '2022-12-11 13:52:00', NULL, 12, 1),
(274, '8997035563544', 'pocari botol 350ml', 'Botol', 'input', 5167, 6000, 0, 24.00, 0.00, '2022-12-11 13:55:17', NULL, 42, 1),
(275, '8997035563414', 'pocari boto 500ml', 'Botol', 'input', 6167, 7500, 0, 24.00, 0.00, '2022-12-11 13:57:44', NULL, 42, 1),
(276, '18997035563411', 'pocari botol 500ml', 'Kotak', 'input', 148000, 153000, 0, 0.00, 0.00, '2022-12-11 13:59:42', NULL, 42, 1),
(277, '0709197900108', 'pocari botol 350ml', 'Kotak', 'input', 124000, 129000, 0, 0.00, 0.00, '2022-12-11 14:01:30', NULL, 42, 1),
(278, '8992857010528', 'vape premium', 'Bks', 'input', 3267, 4500, 0, 60.00, 0.00, '2022-12-11 14:03:52', NULL, 27, 1),
(279, '8997027300331', 'nomos premium', 'Bks', 'input', 3100, 4000, 0, 60.00, 0.00, '2022-12-11 14:05:26', NULL, 27, 1),
(280, '8997027300089', 'nomos 0,31mc', 'Bks', 'input', 3117, 4000, 0, 60.00, 0.00, '2022-12-11 14:07:15', '2022-12-11 21:11:29', 27, 1),
(281, '0709197900109', 'rinso bubuk 38gr', 'PCS', 'input', 762, 1000, 0, 60.00, 0.00, '2022-12-11 14:14:18', '2022-12-11 21:17:24', 17, 1),
(282, '8999999558079', 'rinso bubuk 38gr renceng', 'renceng', 'input', 4571, 5500, 0, 11.00, 0.00, '2022-12-11 14:15:58', NULL, 17, 1),
(283, '8999999042646', 'rinso cair 1000', 'renceng', 'input', 4333, 5500, 0, 24.00, 0.00, '2022-12-11 14:21:43', NULL, 17, 1),
(284, '8999999556136', 'rinso cair 500', 'renceng', 'input', 2208, 3000, 0, 48.00, 0.00, '2022-12-11 14:29:34', NULL, 17, 1),
(285, '4987176052865', 'downy 500', 'renceng', 'input', 4250, 5250, 0, 60.00, 0.00, '2022-12-11 14:32:53', NULL, 17, 1),
(286, '9311931201208', 'max tea teh tarik renceng', 'renceng', 'input', 17444, 18500, 0, 30.00, 0.00, '2022-12-11 14:39:31', NULL, 18, 1),
(287, '0709197900110', 'max tea teh tarik ', 'PCS', 'input', 1744, 2250, 0, 60.00, 0.00, '2022-12-11 14:41:02', NULL, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_old`
--

CREATE TABLE `tbl_barang_old` (
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` varchar(30) DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_harjul_grosir` double DEFAULT NULL,
  `barang_stok` int(11) DEFAULT 0,
  `barang_min_stok` int(11) DEFAULT 0,
  `barang_tgl_input` timestamp NULL DEFAULT current_timestamp(),
  `barang_tgl_last_update` datetime DEFAULT NULL,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `barang_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_old`
--

INSERT INTO `tbl_barang_old` (`barang_id`, `barang_nama`, `barang_satuan`, `barang_harpok`, `barang_harjul`, `barang_harjul_grosir`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `barang_user_id`) VALUES
('8886008101091', 'Aqua 1,5 L', 'Botol', 8000, 10000, 9000, 9, 1, '2022-12-02 14:02:30', NULL, 2, 1),
('8997215708635', 'zamzams', 'Botol', 2000, 3000, 2500, 8, 1, '2022-12-02 07:57:16', '2022-12-06 10:21:08', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE `tbl_beli` (
  `beli_nofak` varchar(15) DEFAULT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL,
  `beli_user_id` int(11) DEFAULT NULL,
  `beli_kode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `rowid` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harpok` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  `qty` double(11,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL,
  `d_beli_kode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(37, '061222000004', '0709197900001', 'Aqua 600ml', 'Botol', 1867, 2500, 1, 0, 2500),
(38, '061222000005', '0709197900003', 'Air mineral Clinci ', 'Kotak', 12500, 13000, 2, 0, 26000),
(39, '061222000006', '0709197900001', 'Aqua 600ml', 'Botol', 1867, 2000, 24, 0, 48000),
(40, '061222000006', '0709197900004', 'Air mineral teman', 'Kotak', 12500, 13000, 4, 0, 52000),
(41, '101222000001', '0709297900006', 'Tp Roti', 'Kilogram', 9040, 10500, 1, 0, 10500),
(42, '101222000001', '0709197900001', 'Aqua 600ml', 'Botol', 1867, 2500, 1, 0, 2500),
(43, '121222000001', '0709197900001', 'Aqua 600ml', 'Botol', 1867, 2500, 1, 0, 2500),
(44, '121222000002', '0709297900006', 'Tp Roti', 'Kilogram', 9040, 10500, 1, 0, 10500),
(45, '121222000003', '0709297900006', 'Tp Roti', 'Kilogram', 9040, 10500, 1, 0, 10500),
(46, '121222000003', '0709197900001', 'Aqua 600ml', 'Botol', 1867, 2500, 1, 0, 2500),
(47, '171222000001', '0709197900001', 'Aqua 600ml', 'Botol', 1867, 2500, 1, 0, 2500),
(48, '171222000002', '0709297900006', 'Tp Roti', 'Kilogram', 9040, 10500, 1, 0, 10500),
(49, '171222000003', '0709297900006', 'Tp Roti', 'Kilogram', 9040, 10500, 2, 0, 21000),
(50, '171222000003', '0709197900001', 'Aqua 600ml', 'Botol', 1867, 2500, 2, 0, 5000),
(51, '171222000003', '0709197900002', 'Aqua 1500ml', 'Botol', 4192, 5000, 1, 0, 5000),
(52, '171222000003', '0709197900003', 'Air mineral Clinci ', 'Kotak', 12500, 13500, 1, 0, 13500),
(53, '171222000003', '0709197900004', 'Air mineral teman', 'Kotak', 12500, 13500, 1, 0, 13500),
(54, '171222000003', '0709197900005', 'Tepung beras rose brand', 'Bks', 5700, 6500, 1, 0, 6500),
(55, '171222000003', '0709197900007', 'tepung kanji', 'Kilogram', 7800, 9000, 1, 0, 9000),
(56, '171222000003', '0709197900008', 'tepung sagu', 'Kilogram', 10667, 12000, 1, 0, 12000),
(57, '171222000003', '0709197900009', 'kerupuk pecal', 'Kilogram', 13000, 14500, 1, 0, 14500),
(58, '171222000003', '0709197900010', 'mie lidi srikaya', 'Bks', 5800, 6500, 1, 0, 6500),
(59, '171222000004', '0709297900006', 'Tp Roti', 'Kilogram', 9040, 10500, 2, 0, 15750);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `jual_total` double DEFAULT NULL,
  `jual_diskon` int(11) NOT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_diskon`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`) VALUES
('101222000001', '2022-12-10 12:16:58', 13000, 0, 16000, 3000, 1, 'eceran'),
('121222000001', '2022-12-12 13:15:22', 2500, 0, 2500, 0, 2, 'eceran'),
('121222000002', '2022-12-12 13:24:14', 10500, 0, 10500, 0, 2, 'eceran'),
('121222000003', '2022-12-12 13:36:30', 13000, 0, 15000, 2000, 2, 'eceran'),
('171222000001', '2022-12-17 14:30:58', 10500, 0, 10500, 0, 2, 'eceran'),
('171222000002', '2022-12-17 14:35:37', 10500, 0, 10500, 0, 2, 'eceran'),
('171222000003', '2022-12-17 14:37:23', 106500, 0, 106500, 0, 2, 'eceran'),
('171222000004', '2022-12-17 14:41:45', 15750, 0, 16000, 250, 2, 'eceran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(2, 'hanh sanitizer'),
(3, 'sembako'),
(4, 'frozen'),
(5, 'Air mineral'),
(6, 'Tepung'),
(7, 'kerupuk'),
(8, 'mie'),
(9, 'kacang'),
(10, 'pembungkus'),
(11, 'kosmetik'),
(12, 'susu'),
(13, 'sabun'),
(14, 'sampo'),
(15, 'renceng'),
(16, 'sirup'),
(17, 'ditergen'),
(18, 'teh'),
(19, 'kopi'),
(20, 'plastik'),
(21, 'saos'),
(22, 'ATK'),
(23, 'korek'),
(24, 'anti nyamuk'),
(25, 'balsem'),
(26, 'benang'),
(27, 'obat'),
(28, 'pisau'),
(29, 'bodylotion'),
(30, 'lampu'),
(31, 'Amplop'),
(32, 'minyak rambut'),
(33, 'kartu'),
(34, 'pampers'),
(35, 'LEM'),
(36, 'sisir'),
(37, 'air besodah'),
(38, 'baterai'),
(39, 'kecap'),
(40, 'karet'),
(41, 'tisu'),
(42, 'minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_retur`
--

CREATE TABLE `tbl_retur` (
  `retur_id` int(11) NOT NULL,
  `retur_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `retur_barang_id` varchar(15) DEFAULT NULL,
  `retur_barang_nama` varchar(150) DEFAULT NULL,
  `retur_barang_satuan` varchar(30) DEFAULT NULL,
  `retur_harjul` double DEFAULT NULL,
  `retur_qty` int(11) DEFAULT NULL,
  `retur_subtotal` double DEFAULT NULL,
  `retur_keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id`, `name`) VALUES
(1, 'Unit'),
(2, 'Kotak'),
(3, 'Botol'),
(4, 'Butir'),
(5, 'Buah'),
(6, 'Biji'),
(7, 'Sachet'),
(8, 'Bks'),
(9, 'Roll'),
(10, 'PCS'),
(11, 'Box'),
(12, 'Meter'),
(13, 'Centimeter'),
(14, 'Liter'),
(15, 'CC'),
(16, 'Mililiter'),
(17, 'Lusin'),
(18, 'Gross'),
(19, 'Kodi'),
(20, 'Rim'),
(21, 'Dozen'),
(22, 'Kaleng'),
(23, 'Lembar'),
(24, 'Helai'),
(25, 'Gram'),
(26, 'Kilogram'),
(27, 'Kotak'),
(28, 'Botol'),
(29, 'Butir'),
(30, 'Buah'),
(31, 'Biji'),
(32, 'Sachet'),
(33, 'Bks'),
(34, 'Roll'),
(35, 'PCS'),
(36, 'Box'),
(37, 'Meter'),
(38, 'Centimeter'),
(39, 'Liter'),
(40, 'CC'),
(41, 'Mililiter'),
(42, 'Lusin'),
(43, 'Gross'),
(44, 'Kodi'),
(45, 'Rim'),
(46, 'Dozen'),
(47, 'Kaleng'),
(48, 'Lembar'),
(49, 'Helai'),
(50, 'Gram'),
(51, 'Kilogram'),
(57, 'renceng'),
(58, 'batang'),
(59, 'ball');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_level`, `user_status`) VALUES
(1, 'Arif darmawan', 'sumberjaya', '68f4ee5aca2df7f5a843fc10696aeade', '1', '1'),
(2, 'kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_id` (`barang_id`);

--
-- Indexes for table `tbl_barang_old`
--
ALTER TABLE `tbl_barang_old`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_user_id` (`barang_user_id`),
  ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`beli_kode`),
  ADD KEY `beli_user_id` (`beli_user_id`),
  ADD KEY `beli_suplier_id` (`beli_suplier_id`),
  ADD KEY `beli_id` (`beli_kode`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD PRIMARY KEY (`d_beli_id`),
  ADD KEY `d_beli_barang_id` (`d_beli_barang_id`),
  ADD KEY `d_beli_nofak` (`d_beli_nofak`),
  ADD KEY `d_beli_kode` (`d_beli_kode`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_retur`
--
ALTER TABLE `tbl_retur`
  MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD CONSTRAINT `tbl_beli_ibfk_1` FOREIGN KEY (`beli_user_id`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_beli_ibfk_2` FOREIGN KEY (`beli_suplier_id`) REFERENCES `tbl_suplier` (`suplier_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD CONSTRAINT `tbl_detail_beli_ibfk_1` FOREIGN KEY (`d_beli_barang_id`) REFERENCES `tbl_barang_old` (`barang_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_beli_ibfk_2` FOREIGN KEY (`d_beli_kode`) REFERENCES `tbl_beli` (`beli_kode`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
