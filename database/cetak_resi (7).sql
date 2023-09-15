-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2023 pada 11.17
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cetak_resi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pickup`
--

CREATE TABLE `data_pickup` (
  `id_pickup` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat_pengirim` varchar(100) NOT NULL,
  `tlp_pengirim` varchar(15) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `tlp_penerima` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `kantor_asal` varchar(100) NOT NULL,
  `regional_asal` varchar(100) NOT NULL,
  `kantor_tujuan` varchar(100) NOT NULL,
  `regional_tujuan` varchar(100) NOT NULL,
  `berat_barang` varchar(10) NOT NULL,
  `bea_kirim` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jenis_pembayaran` varchar(50) DEFAULT NULL,
  `status` enum('Approve','Belum diapprove') DEFAULT 'Belum diapprove'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_import`
--

CREATE TABLE `history_import` (
  `id` int(11) NOT NULL,
  `id_pickup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_import`
--

INSERT INTO `history_import` (`id`, `id_pickup`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0),
(37, 0),
(38, 0),
(39, 0),
(40, 0),
(41, 0),
(42, 0),
(43, 0),
(44, 0),
(45, 0),
(46, 0),
(47, 0),
(48, 0),
(49, 0),
(50, 0),
(51, 0),
(52, 0),
(53, 1),
(54, 2),
(55, 3),
(56, 4),
(57, 6),
(58, 7),
(59, 8),
(60, 9),
(61, 10),
(62, 11),
(63, 12),
(64, 13),
(65, 14),
(66, 15),
(67, 16),
(68, 17),
(69, 18),
(70, 19),
(71, 20),
(72, 21),
(73, 22),
(74, 23),
(75, 24),
(76, 25),
(77, 26),
(78, 27),
(79, 28),
(80, 29),
(81, 30),
(82, 31),
(83, 32),
(84, 33),
(85, 34),
(86, 35),
(87, 36),
(88, 37),
(89, 38),
(90, 39),
(91, 40),
(92, 46),
(93, 47),
(94, 48),
(95, 49);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `id_kantor` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `cabang_regional` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nopend` int(11) NOT NULL,
  `regional` varchar(50) NOT NULL,
  `tipe_kantor` enum('Kantor Cabang','Pusat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `nama_kota`, `cabang_regional`, `alamat`, `kode_pos`, `phone`, `nopend`, `regional`, `tipe_kantor`) VALUES
(25, 'JAKARTA', 'TANGGERANG', 'Jalan', 15000, '082281739615', 15000, 'REGIONAL II', 'Kantor Cabang'),
(26, 'BANDUNG', 'BANDUNG', 'Jalan Bandung', 40000, '081513796579', 40000, 'REGIONAL III', 'Kantor Cabang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(15, 79, '45c5bd4ea60164938713938c00835143', 1, 0, 0, NULL, 1),
(16, 80, '438ed0d7da92ee75deeb6c650934664d', 1, 0, 0, NULL, 1),
(17, 81, '81576221143110fe57382e6bad9e0b67', 1, 0, 0, NULL, 1),
(18, 82, 'b88723bc260ca1be4f01eba613db2037', 1, 0, 0, NULL, 1),
(19, 83, '692d7bee61834a80243873e980771ee2', 1, 0, 0, NULL, 1),
(20, 84, 'a8ba38bae6f82fe4ea90d8e5e23c2c60', 1, 0, 0, NULL, 1),
(21, 85, '4eb64858ee0f4ff0852da74b028fd9df', 1, 0, 0, NULL, 1),
(22, 86, '50e1a77a760c988bed32815d0f0bb47f', 1, 0, 0, NULL, 1),
(23, 87, 'f18534c90611afff8b7795c9880a3323', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nipos` int(11) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `status_pegawai` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `alamat` varchar(150) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `hak_akses` enum('Admin','Petugas Loket','Customer') NOT NULL DEFAULT 'Customer',
  `id_kantor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_lengkap`, `email`, `nipos`, `no_telp`, `status_pegawai`, `alamat`, `username`, `password`, `hak_akses`, `id_kantor`) VALUES
(73, 'Siti Fatimah', 'fsiti4605@gmail.com', 123, '082281739615', 'Aktif', 'jalan sarijadi blok 8 No.112 Rt.10/Rw.09 Sukasari, Sarijadi Bandung', 'Sifa', '1234', 'Admin', 1),
(76, 'Hanni Tria Septiani', 'Hanni45@gmail.com', 123456789, '0809377236723', 'Aktif', 'Jalan Ranca bentang barat  Rt.02/ Rw. 25 No.28', 'Hanni', '1234', 'Petugas Loket', 1),
(77, 'Daffa Fauziah', 'daffa@gmail.com', 2147483647, '0809377236723', 'Tidak Aktif', 'jalan sarijadi blok 8 No.112 Rt.10/Rw.09 Sukasari, Sarijadi Bandung', 'Daffa', '123', 'Petugas Loket', 1),
(78, 'Gracecya Selfiah', 'gracecyace@gmail.com', 1234, '0809377236723', 'Aktif', 'jalan sarijadi blok 8 No.112 Rt.10/Rw.09 Sukasari, Sarijadi Bandung', 'grace', '123', 'Petugas Loket', 1),
(79, 'Redha Aulia Putri', 'redha@gmail.com', 1234, '0809377236723', 'Aktif', 'Jakarta Selatan', 'Redha', '1234', 'Petugas Loket', 1),
(80, 'Supono,S.T.,M.T', 'fsiti4605@gmail.com', 123, '0809377236723', 'Aktif', 'jalan sarijadi blok 8 No.112 Rt.10/Rw.09 Sukasari, Sarijadi Bandung', 'admin', '1234', 'Petugas Loket', 1),
(81, 'Aditya Wiranda', 'adit@gmail.com', 455678953, '0809377236723', 'Aktif', 'jalan Omtenk 1', 'adit', '123', 'Petugas Loket', 1),
(82, 'Nur Fatimah Azzahrah', 'zahra@gmail.com', 467832145, '08228379172', 'Aktif', 'jalan Sarimana', 'zahra', '123', 'Petugas Loket', 1),
(83, 'Salma Najla Hanifa', 'salma@gmail.com', 2147483647, '0845678923', 'Aktif', 'Jalan Sarijadi', 'salma', '1234', 'Petugas Loket', 1),
(84, 'Shafa Zahra Artatiah', 'shafa@gmail.com', 2147483647, '0987654356', 'Aktif', 'jalan jalan aku sendiri', 'shafa', '123', 'Petugas Loket', 1),
(85, 'Okta Agnes', 'anes@gmail.com', 2147483647, '097551639111342', 'Tidak Aktif', 'Jalan mana ya lupa', 'anes', '123', 'Petugas Loket', 1),
(86, 'Diyon', 'diyon@gmail.com', 567898765, '085267384564', 'Aktif', 'Jakarta Selatan', 'Diyon', 'diyon123', 'Petugas Loket', 1),
(87, 'Siti fatimah', 'fsiti4605@gmail.com', 1234, '080937723672', 'Aktif', 'jalan sarijadi blok 8 No.112 Rt.10/Rw.09 Sukasari, Sarijadi Bandung', 'Sifa', '1234', 'Admin', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id_data` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_order` varchar(255) DEFAULT NULL,
  `project_value` int(11) DEFAULT NULL,
  `project_start` date DEFAULT NULL,
  `project_finish` date DEFAULT NULL,
  `tribe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id_data`, `id`, `project_code`, `name`, `client_id`, `duration`, `client_name`, `note`, `status`, `status_order`, `project_value`, `project_start`, `project_finish`, `tribe`) VALUES
(1756, '63039da42b9d006b0578ddff', 'ABC2203', 'Project Aplikasi Kesehatan ABC', '63039d47b0ccf3208503b022', 'PT69H', 'PT ABC', '', 'Done/Inactive', 'Paid,Paid', 600000000, '2022-04-07', '2022-06-09', 'Health'),
(1757, '6304e336c41f1808edfd0762', 'ARG2208', 'Alim Rugi APPS', '6304e31bc41f1808edfd065d', 'PT23H', 'PT Alim Rugi', '', 'Done/Inactive', 'Invoiced', 90000000, '2022-08-23', '2022-08-23', 'Health'),
(1758, '6304359fb0ccf32085060ff4', 'BSM2208', 'Bismillah App', '63043588b0ccf32085060edd', 'PT0S', 'TEST', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1759, '63039dd42b9d006b0578df23', '', 'Design', '', 'PT22H', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1760, '63039de0b0ccf3208503b349', '', 'General Support', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1761, '63039de7fa6cc063faa71669', '', 'General Task', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1762, '63039df3fa6cc063faa716b9', 'GTS2202', 'Pengembangan GPP System', '63039d74b0ccf3208503b0fa', 'PT86H30M', 'PT GITS INDONESIA', '', 'Done/Inactive', 'Paid,Paid,Paid', 90000000, '2022-03-02', '2022-08-11', 'Enterprise'),
(1763, '63039e082b9d006b0578e059', '', 'Ops', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1764, '63039e12b0ccf3208503b473', 'PIS2201', 'Sehat APPS', '63039d792b9d006b0578dd0a', 'PT82H59M', 'PT Indonesia Sejahtera', '', 'Done/Inactive', 'Paid,Paid,Invoiced', 200000000, '2022-01-03', '2022-05-10', 'Health'),
(1765, '63039e1f2b9d006b0578e0d6', 'PPI2205', 'Integrasi Surat Internal', '63039d41b0ccf3208503b006', 'PT109H51M', 'Politeknik Pos Indonesia', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid', 40000000, '2022-05-19', '2022-08-05', 'Enterprise'),
(1766, '63039e27fa6cc063faa7180f', '', 'Sales', '', 'PT0S', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(1767, '6304cd56c41f1808edfc2da6', 'SPT2208', 'Toko Online Sportama', '6304ca3fe57d4632b9207200', 'PT40H52M', 'Sportama', '', 'Done/Inactive', 'Invoiced', 1000000000, '2022-08-23', '2022-08-23', 'Commerce'),
(1768, '63039e34b0ccf3208503b535', 'ULB2204', 'Sistem Kepegawaian', '63039d7f2b9d006b0578dd16', 'PT71H57M', 'ULBI Indonesia', '', 'Done/Inactive', 'Paid,Paid,Paid', 100000000, '2022-04-15', '2022-08-18', 'Enterprise'),
(1769, '63039e3ffa6cc063faa718ad', 'UTJ2202', 'POS Ultra', '63039d822b9d006b0578dd3b', 'PT61H30M', 'Ultrajaya', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid,Paid', 500000000, '2022-02-02', '2022-07-14', 'Commerce'),
(1770, '63039e492b9d006b0578e1ea', 'WKM2108', 'Project A Wekomsel', '63039d86fa6cc063faa7144b', 'PT189H13M', 'Welkomsel', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid,Paid,Paid,Paid', 1000000000, '2021-09-07', '2022-06-24', 'Enterprise'),
(1771, '63039e532b9d006b0578e223', 'WKM2205', 'Project B Wekomsel', '63039d86fa6cc063faa7144b', 'PT58H', 'Welkomsel', '', 'Done/Inactive', 'Paid,Paid,Paid', 50000000, '2022-05-12', '2022-07-13', 'Commerce'),
(1772, '63039e5d2b9d006b0578e258', 'WKM2206', 'Digilearning', '63039d86fa6cc063faa7144b', 'PT69H', 'Welkomsel', '', 'Done/Inactive', 'Paid,Paid,Paid,Paid', 200000000, '2022-06-06', '2022-08-18', 'Enterprise'),
(1773, '', 'sifa', 'sifa', 'sifa', 'sifa', 'sifa', 'sifa', 'sifa', 'siga', 1, '2023-03-21', '2023-03-28', 'sifa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regional`
--

CREATE TABLE `regional` (
  `id_regional` int(11) NOT NULL,
  `regional` varchar(50) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `cabang_regional` varchar(50) NOT NULL,
  `nopend` int(11) NOT NULL,
  `tipe_kantor` enum('Kantor Cabang','Pusat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `regional`
--

INSERT INTO `regional` (`id_regional`, `regional`, `nama_kota`, `cabang_regional`, `nopend`, `tipe_kantor`) VALUES
(1, 'REGIONAL I', 'MEDAN', 'MEDAN', 20000, 'Kantor Cabang'),
(2, 'REGIONAL I', 'MEDAN', 'BENGKULU', 38000, 'Kantor Cabang'),
(3, 'REGIONAL I', 'MEDAN', 'PARIAMAN', 25500, 'Kantor Cabang'),
(4, 'REGIONAL I', 'MEDAN', 'JAMBI', 36000, 'Kantor Cabang'),
(5, 'REGIONAL I', 'MEDAN', 'PADANG', 25000, 'Kantor Cabang'),
(6, 'REGIONAL II', 'JAKARTA', 'JAKARTA PUSAT', 10000, 'Kantor Cabang'),
(7, 'REGIONAL II', 'JAKARTA', 'JAKARTA BARAT', 11000, 'Kantor Cabang'),
(8, 'REGIONAL II', 'JAKARTA', 'JAKARTA SELATAN', 12000, 'Kantor Cabang'),
(9, 'REGIONAL II', 'JAKARTA', 'TANGGERANG', 15000, 'Kantor Cabang'),
(10, 'REGIONAL II', 'JAKARTA', 'DEPOK', 16400, 'Kantor Cabang'),
(11, 'REGIONAL III', 'BANDUNG', 'BANDUNG', 40000, 'Kantor Cabang'),
(12, 'REGIONAL III', 'BANDUNG', 'KARAWANG', 42300, 'Kantor Cabang'),
(13, 'REGIONAL III', 'BANDUNG', 'GARUT', 44100, 'Kantor Cabang'),
(14, 'REGIONAL III', 'BANDUNG', 'CIREBON', 54100, 'Kantor Cabang'),
(15, 'REGIONAL III', 'BANDUNG', 'MAJALENGKA', 45400, 'Kantor Cabang'),
(16, 'REGIONAL IV', 'SEMARANG', 'YOGYAKARTA', 55000, 'Kantor Cabang'),
(17, 'REGIONAL IV', 'SEMARANG', 'KLATEN', 57400, 'Kantor Cabang'),
(18, 'REGIONAL V', 'SURABAYA', 'SURABAYA', 60000, 'Kantor Cabang'),
(19, 'REGIONAL V', 'SURABAYA', 'SIDOARJO', 61200, 'Kantor Cabang'),
(20, 'REGIONAL VI', 'MAKASAR', 'PALANGKARAYA', 73000, 'Kantor Cabang'),
(21, 'REGIONAL VI', 'MAKASAR', 'SPPMAKASAR', 90400, 'Kantor Cabang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resi`
--

CREATE TABLE `resi` (
  `kode_resi` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_pengirim` varchar(50) NOT NULL,
  `alamat_pengirim` varchar(100) NOT NULL,
  `tlp_pengirim` varchar(15) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(100) NOT NULL,
  `tlp_penerima` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` enum('Elektronik','Pakaian','Makanan','Kosmetik') NOT NULL,
  `kantor_asal` varchar(50) DEFAULT NULL,
  `regional_asal` varchar(100) DEFAULT NULL,
  `kantor_tujuan` varchar(50) DEFAULT NULL,
  `regional_tujuan` varchar(100) DEFAULT NULL,
  `berat_barang` varchar(10) NOT NULL,
  `bea_kirim` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resi`
--

INSERT INTO `resi` (`kode_resi`, `id_order`, `tanggal_transaksi`, `nama_pengirim`, `alamat_pengirim`, `tlp_pengirim`, `nama_penerima`, `alamat_penerima`, `tlp_penerima`, `nama_barang`, `jenis_barang`, `kantor_asal`, `regional_asal`, `kantor_tujuan`, `regional_tujuan`, `berat_barang`, `bea_kirim`, `total_harga`, `jenis_pembayaran`, `id_petugas`) VALUES
(1, 'QOB25693970102623', '2023-03-14 11:22:01', 'Hani Tria Septiani', 'Jalan Sariasih No.54', '082281739615', 'Siti Fatimah', 'Jalan Mataram', '089478723', 'Handpone', 'Elektronik', 'Bandung', 'REGIONAL III BANDUNG', 'JL.DESA CERIH RT03/R', 'REGIONAL I MEDAN', '2', 12000, 14, '', 73),
(2, '23MRN0000000438', '2023-03-14 11:22:01', 'Siti Fatimah', 'jalan sarijadi bandung', '087654356789', 'Muhammad Zaki Hanif', 'jalan mana ya yang harus aku lewat', '09876545678', 'baju', 'Pakaian', 'Medan', 'REGIONAL I MEDAN', 'JL. RAYA MARITIM NO 8 SUNDA KELAPA PADEMANGAN PADE', 'REGIONAL III BANDUNG', '3', 20000, 60000, '', 73),
(3, 'QOB16029088084044', '2023-03-14 11:22:02', 'Muhammad Zaki Hanif', 'Jalan jalan kepasar baru', '08764728791', 'Hani Tria Septiani', 'jalan tadi lah', '08863264971', 'Pempek', 'Makanan', 'Medan', 'REGIONAL I MEDAN', 'JALAN SUBANG BLOK D PERUM DUREN JAYA RT 11 RW 09 D', 'REGIONAL I MEDAN', '4', 20000, 80000, '', 73),
(4, 'P1q323riepofd', '0000-00-00 00:00:00', 'ss', 'jalan jalan', '082281739615', 'Daffa Fauziah', 'jalan merdeka', '0834567898765', 'baju', 'Pakaian', 'Gorontalo', 'REGIONAL I MEDAN', 'dd', 'REGIONAL I MEDAN', 'sd', 2, 1, '', 73),
(5, 'poeifhgjdhfsakl', '0000-00-00 00:00:00', 'iudfholas', 'dwetgr', 'aerdfhygf', 'eawtrdg', 'trehdg', 'trgdf', 'wetrdxhf', '', 'rezstgdfh', '', 'wterd', '', 'terd', 34, 0, '', 80),
(6, 'QOB2537829813', '2023-08-03 00:00:00', 'susabti', 'bandung', '082150549750', 'santi', 'jakarta', '0834567898765', 'jam', '', 'bandung', '', 'jakarta', '', '3', 3, 30000, '', 77),
(7, 'GSJ098385476873928', '2023-08-02 00:00:00', 'Vio', 'jakarta', '098754536789', 'vina', 'bandung', '09876544567', 'basreng', 'Makanan', 'jakarta', '', 'bandung', '', '1', 12000, 12000, '', 73),
(8, 'BDJHJ09876543', '2023-08-01 00:00:00', 'bambang', 'medan', '09876543', 'dapp', 'jombang', '09876543', 'speaker', '', 'medan', '', 'jombang', '', '2', 4, 36000, '', 79),
(9, 'BXHHSXB09876543', '2023-08-01 00:00:00', 'Syarif', 'sarijadi', '0976253678394', 'fudin', 'lombok', '083624468', 'sambal', 'Makanan', 'bandung', '', 'lombok', '', '2', 23000, 23000, '', 79),
(10, 'VSHWV0987654', '2023-08-01 00:00:00', 'Gino', 'jombang', '08372356378', 'gia', 'bandung', '08764589432', 'baju', 'Pakaian', 'jombang', '', 'bandung', '', '2', 12000, 12000, '', 73),
(11, 'Vh09876545678', '2023-08-04 00:00:00', 'Jaenab', 'Palembang', '098760987654', 'Putri', 'Bandung', '0987654323456', 'Hp', 'Elektronik', 'Gorontalo', '', 'Jakarta', '', '2', 12000, 140000, '', 79),
(12, 'P73289323rh', '2023-08-10 00:00:00', 'Fulani', 'Makasar', '086456789', 'Wina', 'jalan merdeka', '0834567898765', 'Buku', '', 'medan', '', 'jombang', '', '3', 12000, 36000, '', 76),
(13, 'P09876545678', '2023-08-04 00:00:00', 'Diyon', 'Jalan Bongas', '0987654567', 'Sifa', 'jalan merdeka', '09876567234', 'baju', 'Pakaian', 'bandung', 'REGIONAL I MEDAN', 'Bandung', 'REGIONAL I MEDAN', '3', 12000, 36000, '', 73),
(14, 'Poiuytresdvb', '2023-08-04 00:00:00', 'Siti Fatimah', 'jalan jalan', '098754536789', 'santi', 'jalan merdeka', '096523456789', 'Celana', 'Pakaian', 'Gorontalo', 'REGIONAL I MEDAN', 'jombang', 'REGIONAL I MEDAN', '3', 40000, 120000, '', 79),
(15, 'POKJHGDFGHJK', '2023-08-04 00:00:00', 'Fulan', 'bandung', '082150549750', 'Daffa Fauziah', 'jakarta', '09876543', 'jam', 'Elektronik', 'jombang', '', 'wterd', 'REGIONAL I MEDAN', '3', 50000, 150000, '', 81),
(16, 'PUDS56789098Y', '2023-08-04 00:00:00', 'Aulia', 'bongas', '082150549750', 'vina', 'jakarta', '09876544567', 'basreng', 'Makanan', 'Gorontalo', 'REGIONAL I MEDAN', 'bandung', 'REGIONAL I MEDAN', '2', 70000, 140000, '', 85),
(19, 'P23080400000002', '2023-08-04 21:30:49', 'Siti Fatimah', 'jalan jalan', '082281739615', 'Daffa Fauziah', 'jalan merdeka', '0834567898765', 'Buku', 'Elektronik', NULL, NULL, NULL, NULL, '', 12000, 36000, '', 73),
(34, 'P230805000000017', '2023-08-05 01:13:28', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(35, 'P230805000000018', '2023-08-05 01:13:28', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(36, 'P230805000000019', '2023-08-05 01:20:34', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(43, 'P230805000000026', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(44, 'P230805000000027', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(45, 'P230805000000028', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(46, 'P230805000000029', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(47, 'P230805000000030', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(48, 'P230805000000031', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(49, 'P230805000000032', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(50, 'P230805000000033', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(51, 'P230805000000034', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(52, 'P230805000000035', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(53, 'P230805000000036', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(54, 'P230805000000037', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(55, 'P230805000000038', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(56, 'P230805000000039', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(57, 'P230805000000040', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(58, 'P230805000000041', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(59, 'P230805000000042', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(60, 'P230805000000043', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(61, 'P230805000000044', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(62, 'P230805000000045', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(63, 'P230805000000046', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(64, 'P230805000000047', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(65, 'P230805000000048', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(66, 'P230805000000049', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(67, 'P230805000000050', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(68, 'P230805000000051', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(69, 'P230805000000052', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(70, 'P230805000000053', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(71, 'P230805000000054', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(72, 'P230805000000055', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(73, 'P230805000000056', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(74, 'P230805000000057', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(75, 'P230805000000058', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(76, 'P230805000000059', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(77, 'P230805000000060', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(78, 'P230805000000061', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(79, 'P230806000000062', '2023-08-06 14:07:18', 'Robi', 'jl.lebar', '23456879809', 'Reva', 'Jl.Masing2', '213347687', 'Laptop', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 2000000, '', 73),
(80, 'P230805000000063', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(81, 'P230805000000064', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(82, 'P230805000000065', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(83, 'P230805000000066', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(84, 'P230806000000067', '2023-08-06 14:07:18', 'Robi', 'jl.lebar', '23456879809', 'Reva', 'Jl.Masing2', '213347687', 'Laptop', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 2000000, '', 73),
(85, 'P230805000000068', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(86, 'P230805000000069', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(87, 'P230805000000070', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(88, 'P230805000000071', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(89, 'P230806000000072', '2023-08-06 14:08:20', 'Robi', 'jl.lebar', '23456879809', 'Reva', 'Jl.Masing2', '213347687', 'Laptop', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 2000000, '', 73),
(90, 'P230805000000073', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 2000, 20000, '', 73),
(91, 'P230805000000074', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(92, 'P230805000000075', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 100000, '', 73),
(93, 'P230805000000076', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Elektronik', NULL, NULL, NULL, NULL, '', 10000, 1000000, '', 73),
(94, 'P230806000000077', '2023-08-06 14:09:22', 'Robi', 'jl.lebar', '23456879809', 'Reva', 'Jl.Masing2', '213347687', 'Laptop', 'Elektronik', NULL, NULL, NULL, NULL, '', 20000, 2000000, '', 73),
(95, 'P230805000000078', '2023-08-05 19:01:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Hani', 'Jl.Basar Beraspal', '082121484833', 'Sarung Tangan', 'Pakaian', '', '', '', NULL, '100', 2000, 20000, '', 73),
(96, 'P230805000000079', '2023-08-05 19:01:37', 'Sifa', 'Jalan jalan', '098765', 'Hanni', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '098765456', 'Baju', 'Pakaian', '', '', '', NULL, '5', 20000, 100000, 'COD', 73),
(97, 'P230805000000080', '2023-08-05 19:01:37', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jl.Basar Beraspal', '0856473829', 'Sarung Tangan', 'Pakaian', '', '', '', NULL, '5', 20000, 100000, 'COD', 73),
(98, 'P230805000000081', '2023-08-05 19:01:37', 'adel', 'Jl. Kesana', '98765432', 'Adul', 'Jl.Banjir', '7654398765', 'jaket', 'Pakaian', '', '', '', NULL, '10', 10000, 1000000, 'COD', 73),
(99, 'P230806000000082', '2023-08-06 15:04:45', 'Robi', 'jl.lebar', '23456879809', 'Reva', 'Jl.Masing2', '213347687', 'Laptop', 'Elektronik', '', '', '', NULL, '100', 20000, 2000000, 'COD', 73),
(100, 'P230806000000083', '2023-08-06 15:04:45', 'kathrina', 'Jl.weh', '2134556', 'Shani', 'Jl.Basar Beraspal', '0856473829', 'jaket', 'Pakaian', '', '', '', NULL, '5', 1000, 100000, 'COD', 73),
(101, 'P230806000000084', '2023-08-06 15:04:45', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'Shani', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '2143546', 'Sarung Tangan', 'Pakaian', 'Jakarta', '', 'Bandung', NULL, '10', 20000, 1000000, 'NON COD', 73),
(102, 'P230806000000085', '2023-08-06 15:04:45', 'Sekar', 'Jl. Yang Jauh', '463526', 'Andarini', 'Jl. Jangan Lupa Pulang', '082121484833', 'Loki', 'Pakaian', 'Jakarta', '', 'Bandung', NULL, '5', 1000, 20000, '', 73),
(103, 'P230806000000086', '2023-08-06 15:12:18', 'Indah', 'jl.bengkulu', '089627040899', 'Marsh', 'Jl.Nime', '0856473829', 'PC', 'Elektronik', 'Bengkulu', '', 'jakarta', '', '8', 20000, 800000, 'COD', 73),
(104, 'P230806000000087', '2023-08-06 15:19:11', 'Berman', 'Jl.Benteng', '463526', 'Onel', 'Jl.Ketinggian', '082121484833', 'Laptop', 'Elektronik', 'Medan', 'REGIONAL I', 'jakarta', 'REGIONAL II', '10', 10000, 2000000, '', 73),
(105, 'P230806000000088', '2023-08-06 15:24:01', 'Berman', 'Jl.Benteng', '463526', 'Cornelio', 'Jl.Ketinggian', '082121484833', 'Laptop', 'Elektronik', 'Medan', 'REGIONAL I', 'Jakarta', 'REGIONAL II', '100', 100000, 2000000, 'NON COD', 73),
(106, 'P230806000000089', '2023-08-06 15:24:01', 'bebas', 'jl.aja', '2345456', 'gatau', 'jl.nin aja', '21432534657', 'Sarung Tangan', 'Pakaian', 'Bengkulu', 'REGIONAL I', 'Bandung', 'REGIONAL III', '10', 100000, 800000, 'NON COD', 73),
(107, 'P230806000000090', '2023-08-06 19:03:03', 'Arif', 'Jl.kemarin', '5436357375', 'Zio', 'Jl.Besok', '213546587', 'jaket', 'Pakaian', 'Jakarta', 'REGIONAL II', 'Medan', 'REGIONAL I MEDAN', '5', 2000, 20000, 'COD', 73),
(108, 'P230806000000091', '2023-08-06 19:03:03', 'Kristi', 'Jl.Melong', '089627040899', 'Ciki', 'Jl.meet', '082121484833', 'Baju', 'Pakaian', 'Jakarta', 'REGIONAL II JAKARTA', 'makasar', 'REGIONAL VI MAKASAR', '5', 20000, 2135465, 'COD', 73),
(109, 'P230806000000092', '2023-08-06 21:07:54', 'fulan', 'jl.sendiri', '21436897', 'fulani', 'jl.bebas', '1243568798', 'baseng', 'Pakaian', 'Jakarta', 'REGIONAL II JAKARTA', 'Bandung', 'REGIONAL III BANDUNG', '5', 100000, 800000, 'COD', 73),
(110, 'P230807000000093', '2023-08-07 03:37:30', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Shani', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Sarung Tangan', 'Pakaian', 'Bengkulu', 'REGIONAL I MEDAN', 'Jakarta', 'REGIONAL II JAKARTA', '10', 100000, 1000000, 'COD', 73),
(111, 'P230807000000094', '2023-08-07 03:37:30', 'Berman', 'Jl.Benteng', '089627040899', 'Cornelio', 'Jl.Ketinggian', '0856473829', 'Baju', 'Pakaian', 'Medan', 'REGIONAL I MEDAN', 'Bandung', 'REGIONAL III BANDUNG', '10', 20000, 800000, 'COD', 73),
(112, 'P230807000000095', '2023-08-07 03:37:30', 'cahya', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Nabila', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Laptop', 'Elektronik', 'Jakarta', 'REGIONAL II JAKARTA', 'Bandung', 'REGIONAL III BANDUNG', '8', 100000, 800000, 'COD', 73),
(113, 'P230807000000096', '2023-08-07 03:37:30', 'yuda', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Cornelio', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Baju', 'Pakaian', 'Medan', 'REGIONAL I MEDAN', 'Bandung', 'REGIONAL III BANDUNG', '10', 100000, 2000000, 'NON COD', 73),
(114, 'P230807000000097', '2023-08-07 03:37:30', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Sarung Tangan', 'Elektronik', 'd', 'REGIONAL IV SEMARANG', 'Jakarta', 'REGIONAL IV SEMARANG', '5', 20000, 1000000, 'NON COD', 73),
(115, 'P230807000000098', '2023-08-07 03:41:29', 'Berman', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'Shani', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'jaket', 'Pakaian', 'Jakarta', 'REGIONAL II JAKARTA', 'Bandung', 'REGIONAL III BANDUNG', '10', 100000, 1000000, 'COD', 73),
(116, 'P230807000000099', '2023-08-07 03:41:29', 'adfohd', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Cornelio', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Sarung Tangan', 'Pakaian', 'Bengkulu', 'REGIONAL I MEDAN', 'Bandung', 'REGIONAL III BANDUNG', '100', 10000, 800000, 'NON COD', 73),
(117, 'P2308070000000100', '2023-08-07 03:44:37', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Cornelio', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Sarung Tangan', 'Pakaian', 'Medan', 'REGIONAL VI MAKASAR', 'Jakarta', 'REGIONAL I MEDAN', '10', 100000, 20000, 'COD', 73),
(118, 'P2308070000000101', '2023-08-07 03:52:08', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'dia', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'baseng', 'Pakaian', 'wgwgr', 'REGIONAL I MEDAN', 'Jakarta', 'REGIONAL II JAKARTA', '100', 2000, 20000, 'COD', 73),
(119, 'P2308070000000102', '2023-08-07 09:24:02', 'basir', 'jl.sari asih', '08123456', 'hani', 'jl,cibeureum', '0123456', 'Baju', 'Pakaian', 'Jakarta', 'REGIONAL II JAKARTA', 'Bandung', 'REGIONAL III BANDUNG', '5', 10000, 50000, 'COD', 73),
(120, 'P2308090000000103', '2023-08-09 01:33:12', 'adfohd', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'jlbesar beraspal', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'hp', 'Elektronik', 'Jakarta', 'REGIONAL II JAKARTA', 'jakarta', 'REGIONAL II JAKARTA', '5', 0, 1000000, 'COD', 73),
(121, 'P2308090000000104', '2023-08-09 01:33:12', 'Berman', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'Cornelio', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Sarung Tangan', 'Makanan', 'wgwgr', 'REGIONAL II JAKARTA', 'jakarta', 'REGIONAL I MEDAN', '5', 0, 100000, 'NON COD', 73),
(122, 'P2308090000000105', '2023-08-09 01:33:12', 'adfohd', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Baju', 'Pakaian', 'Medan', 'REGIONAL I MEDAN', 'Bandung', 'REGIONAL III BANDUNG', '5', 0, 800000, 'COD', 73),
(123, 'P2308090000000106', '2023-08-09 01:33:12', 'adfohd', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Cornelio', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', 's', 'Baju', 'Pakaian', 'wgwgr', 'REGIONAL II JAKARTA', 'Jakarta', 'REGIONAL IV SEMARANG', '5', 0, 2000000, 'COD', 73),
(124, 'P2308090000000107', '2023-08-09 01:33:12', 'adfohd', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', '3', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Sarung Tangan', 'Makanan', 'Medan', 'REGIONAL V SURABAYA', '3', 'REGIONAL I MEDAN', '123', 0, 20000, 'COD', 73),
(125, 'P2308090000000108', '2023-08-09 01:33:12', 'adfohd', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'jlbesar beraspal', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Sarung Tangan', 'Makanan', 'wgwgr', 'REGIONAL IV SEMARANG', 'jakarta', 'REGIONAL I MEDAN', '100', 0, 2000000, 'COD', 73),
(126, 'P2308090000000109', '2023-08-09 01:33:12', 'adfohd', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Sarung Tangan', 'Pakaian', 'Bengkulu', 'REGIONAL IV SEMARANG', 'Bandung', 'REGIONAL I MEDAN', '123', 0, 100000, 'NON COD', 73),
(127, 'P2308090000000110', '2023-08-09 01:33:12', 'zahrah', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'Shani', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Sarung Tangan', '', 'Medan', 'REGIONAL I MEDAN', 'jakarta', 'REGIONAL I MEDAN', '10', 0, 20000, 'COD', 73),
(128, 'P2308090000000111', '2023-08-09 01:33:12', 'ada', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'jlbesar beraspal', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Baju', '', 'Jakarta', 'REGIONAL II JAKARTA', 'Bandung', 'REGIONAL III BANDUNG', '5', 0, 1000000, 'COD', 73),
(129, 'P2308090000000112', '2023-08-09 01:33:12', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '463526', 'jlbesar beraspal', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Sarung Tangan', 'Pakaian', 'Jakarta', 'REGIONAL II JAKARTA', 'Bandung', 'REGIONAL II JAKARTA', '10', 0, 50000, 'COD', 73),
(130, 'P2308090000000113', '2023-08-09 01:33:12', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', '3', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Baju', 'Pakaian', 'wgwgr', 'REGIONAL IV SEMARANG', '3', 'REGIONAL III BANDUNG', '10', 0, 50000, 'COD', 73),
(131, 'P2308090000000114', '2023-08-09 01:33:12', 'kathrina', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'jlbesar beraspal', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Baju', '', 'wgwgr', 'REGIONAL I MEDAN', 'jakarta', 'REGIONAL III BANDUNG', '10', 0, 50000, 'COD', 73),
(132, 'P2308090000000115', '2023-08-09 01:54:01', 'Ira', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Elmayana', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '0856473829', 'Laptop', '', 'wgwgr', 'REGIONAL I MEDAN', 'Bandung', 'REGIONAL I MEDAN', '10', 0, 100000, 'COD', 73),
(133, 'P2308090000000116', '2023-08-09 01:54:01', 'Shafa', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '089627040899', 'Redha', 'Jalan Rancabentang Barat No. 28 RT 02 RW 25, Cibeureum', '082121484833', 'Sarung Tangan', 'Pakaian', 'Jakarta', 'REGIONAL II JAKARTA', 'Jakarta', 'REGIONAL II JAKARTA', '100', 0, 500000, 'NON COD', 73),
(134, 'P2308140000000117', '2023-08-14 17:22:48', 'Aran', 'Jl.Kostan', '08140920221', 'Shani', 'Jl.Jogja', '08290519825', 'Laptop', '', 'Jakarta', 'REGIONAL II JAKARTA', 'Yogjakarta', 'REGIONAL IV SEMARANG', '10', 0, 100000, 'NON COD', 73),
(135, 'P2308140000000118', '2023-08-14 17:22:48', 'Berman', 'Jl.Medan', '08201409022', 'Cornelio', 'Jl.Gamungkin', '08298945624', 'Laptop', '', 'Medan', 'REGIONAL I MEDAN', 'Jakarta', 'REGIONAL II JAKARTA', '100', 0, 1000000, 'NON COD', 73),
(136, 'P2308140000000119', '2023-08-14 17:41:28', 'Zafran', 'Jl.Sunda', '085020031409', 'Indiraa', 'Jl.Bandung', '089124680234', 'TV', '', 'Jakarta', 'REGIONAL II JAKARTA', 'Bandung', 'REGIONAL III BANDUNG', '100', 0, 1000000, 'NON COD', 73),
(137, 'P2308140000000120', '2023-08-14 17:41:28', 'Saras', 'Jl.pesawat', '089627040899', 'Shani', 'Jl.jogja', '082121484833', 'Hoodie', 'Pakaian', 'Solo', 'REGIONAL IV SEMARANG', 'Jogja', 'REGIONAL IV SEMARANG', '5', 5000, 25000, 'NON COD', 73);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pickup`
--
ALTER TABLE `data_pickup`
  ADD PRIMARY KEY (`id_pickup`);

--
-- Indeks untuk tabel `history_import`
--
ALTER TABLE `history_import`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id_regional`);

--
-- Indeks untuk tabel `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`kode_resi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pickup`
--
ALTER TABLE `data_pickup`
  MODIFY `id_pickup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `history_import`
--
ALTER TABLE `history_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `kantor`
--
ALTER TABLE `kantor`
  MODIFY `id_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1774;

--
-- AUTO_INCREMENT untuk tabel `regional`
--
ALTER TABLE `regional`
  MODIFY `id_regional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `resi`
--
ALTER TABLE `resi`
  MODIFY `kode_resi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
