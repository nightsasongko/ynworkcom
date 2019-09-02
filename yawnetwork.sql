-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Sep 2019 pada 14.36
-- Versi server: 10.0.38-MariaDB
-- Versi PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yawnetwork`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `area_tugas`
--

CREATE TABLE `area_tugas` (
  `id` int(11) NOT NULL,
  `kode` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `keterangan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `area_tugas`
--

INSERT INTO `area_tugas` (`id`, `kode`, `nama`, `keterangan`) VALUES
(1, 'PENGGUNA', 'Manajemen Pengguna', ''),
(2, 'JABATAN', 'Manajemen Jabatan', ''),
(3, 'AREA_TUGAS', 'Area Tugas', ''),
(7, 'DEPARTEMEN', 'Departemen', ''),
(13, 'AUDIT_TRAIL', 'AUDIT TRAIL', ''),
(14, 'MAINTENANCE', 'Maintenance', 'Maintenance'),
(15, 'KLIEN', 'Klien', 'Manajemen Klien'),
(16, 'LAPORAN', 'Laporan', 'Laporan'),
(17, 'KLAIM', 'Klaim', 'Klaim'),
(18, 'PRODUK', 'Produk', 'Manajemen Kategori produk dan item produk'),
(19, 'MEMBER', 'Member', 'Manajemen Member'),
(20, 'TRANSAKSI', 'Transaksi', 'Manajemen Transaksi'),
(21, 'TUTUPPOIN', 'Tutup Poin', 'Tutup Poin'),
(22, 'BERITA', 'Berita', 'Berita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_list`
--

CREATE TABLE `bank_list` (
  `kode` varchar(4) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank_list`
--

INSERT INTO `bank_list` (`kode`, `nama`) VALUES
('002', 'BANK RAKYAT INDONESIA - BRI'),
('008', 'BANK MANDIRI'),
('009', 'BANK NEGARA INDONESIA 46 - BNI'),
('011', 'BANK DANAMON'),
('013', 'BANK PERMATA'),
('014', 'BANK CENTRAL ASIA - BCA'),
('016', 'BANK INTERNASIONAL INDONESIA - BII'),
('019', 'PANIN BANK'),
('022', 'BANK CIMB NIAGA'),
('023', 'BANK UOB BUANA'),
('028', 'BANK OCBC NISP'),
('031', 'CITIBANK, NA'),
('032', 'JPMORGAN CHASE BANK, NA'),
('033', 'BANK OF AMERICA, NA'),
('036', 'BANK WINDU KENTJANA'),
('037', 'BANK ARTHA GRAHA INTERNASIONAL'),
('040', 'THE BANGKOK BANK PCL'),
('041', 'THE HONGKONG AND SHANGHAI BC'),
('042', 'THE BANK OF TOKYO MITSUBISHI LTD.'),
('045', 'BANK SUMITOMO MITSUI INDONESIA'),
('046', 'BANK DBS INDONESIA'),
('047', 'BANK RESONA PERDANIA'),
('048', 'BANK MIZUHO INDONESIA'),
('050', 'STANDARD CHARTERED BANK'),
('052', 'ABN AMRO BANK NV'),
('054', 'BANK CAPITAL INDONESIA'),
('057', 'BANK BNP PARIBAS INDONESIA'),
('059', 'KOREA EXCHANGE BANK DANAMON'),
('060', 'BANK RABOBANK INTERNATIONAL INDONESIA'),
('061', 'ANZ PANIN BANK'),
('067', 'DEUTSCHE BANK AG'),
('068', 'BANK WOORI INDONESIA'),
('069', 'BANK OF CHINA LIMITED'),
('076', 'BANK BUMI ARTA'),
('087', 'BANK EKONOMI RAHARJA'),
('088', 'BANK ANTAR DAERAH'),
('095', 'BANK MUTIARA'),
('097', 'BANK MAYAPADA'),
('110', 'BANK PEMBANGUNAN DAERAH JABAR DAN BANTEN'),
('111', 'BPD DKI JAKARTA'),
('112', 'BANK PEMBANGUNAN DAERAH DIY'),
('113', 'BANK PEMBANGUNAN DAERAH JATENG'),
('114', 'BANK PEMBANGUNAN DAERAH JATIM'),
('115', 'BANK PEMBANGUNAN DAERAH JAMBI'),
('116', 'BANK PEMBANGUNAN DI ACEH'),
('117', 'BANK PEMBANGUNAN DAERAH SUMUT'),
('119', 'BANK PEMBANGUNAN DAERAH RIAU'),
('120', 'BANK PEMBANGUNAN DAERAH SUMATERA SELATAN DAN BANGKA BELITUNG'),
('121', 'BANK PEMBANGUNAN DAERAH LAMPUNG'),
('122', 'BANK PEMBANGUNAN DAERAH KALSEL'),
('123', 'BANK PEMBANGUNAN DAERAH KALBAR'),
('124', 'BANK PEMBANGUNAN DAERAH KALTIM'),
('125', 'BANK PEMBANGUNAN DAERAH KALTENG'),
('126', 'BANK PEMBANGUNAN DAERAH SULAWESI SELATAN DAN SULAWESI BARAT'),
('127', 'BANK PEMBANGUNAN SULUT'),
('128', 'BANK PEMBANGUNAN DAERAH NTB'),
('129', 'BANK PEMBANGUNAN DAERAH BALI'),
('130', 'BANK PEMBANGUNAN DAERAH NTT'),
('131', 'BANK PEMBANGUNAN DAERAH MALUKU'),
('132', 'BANK PEMBANGUNAN DAERAH PAPUA'),
('133', 'BPD BENGKULU'),
('135', 'BPD SULAWESI TENGGARA'),
('145', 'BANK NUSANTARA PARAHYANGAN'),
('146', 'BANK SWADESI'),
('147', 'BANK MUAMALAT INDONESIA'),
('151', 'BANK MESTIKA DHARMA'),
('152', 'BANK METRO EKSPRESS'),
('153', 'BANK SINAR MAS'),
('157', 'BANK MASPION INDONESIA'),
('161', 'BANK GANESHA'),
('167', 'BANK KESAWAN'),
('200', 'BANK TABUNGAN NEGARA'),
('212', 'BANK HS 1906'),
('213', 'BANK TABUNGAN'),
('405', 'BANK SWAGUNA'),
('422', 'BANK RAKYAT INDONESIA SYARIAH'),
('426', 'BANK MEGA'),
('427', 'BANK JASA JAKARTA'),
('441', 'BANK BUKOPIN'),
('451', 'BANK SYARIAH MANDIRI'),
('459', 'BANK BISNIS INTERNATIONAL'),
('485', 'BANK BUMIPUTERA'),
('490', 'BANK YUDHA BHAKTI'),
('491', 'BANK MITRANIAGA'),
('494', 'AGRONIAGA BANK'),
('498', 'BANK SBI INDONESIA'),
('501', 'BANK ROYAL INDONESIA'),
('506', 'BANK SYARIAH MEGA INDONESIA'),
('513', 'BANK INA PERDANA'),
('517', 'BANK HARFA'),
('520', 'PRIMA MASTER BANK'),
('521', 'BANK PERSYARIKATAN INDONESIA'),
('523', 'BANK DIPO INTERNATIONAL'),
('525', 'BANK AKITA'),
('526', 'BANK LIMAN INTERNATIONAL'),
('531', 'ANGLOMAS INTERNATIONAL BANK'),
('535', 'BANK KESEJAHTERAAN EKONOMI'),
('542', 'BANK ARTOS INDONESIA'),
('547', 'BANK SAHABAT PURBA DANARTA'),
('548', 'BANK MULTIARTA SENTOSA'),
('553', 'BANK MAYORA INDONESIA'),
('555', 'BANK INDEX SELINDO'),
('559', 'CENTRATAMA NASIONAL BANK'),
('562', 'BANK FAMA INTERNATIONAL'),
('564', 'BANK SINAR HARAPAN BALI'),
('566', 'BANK VICTORIA INTERNATIONAL'),
('567', 'BANK HARDA INTERNASIONAL'),
('947', 'BANK MAYBANK INDOCORP'),
('949', 'BANK CHINATRUST INDONESIA'),
('950', 'BANK COMMONWEALTH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(254) NOT NULL,
  `isi_berita` text NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_hapus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 tidak, 1 terhapus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `posting_date`, `is_hapus`) VALUES
(3, 'Kabar Heboh Banget Buat Distributor Baru', 'Aliquam erat volutpat. Donec sit amet maximus enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla non felis turpis. Nam dictum orci ac tincidunt sagittis. Maecenas purus dolor, condimentum efficitur lorem id, porta ullamcorper urna. Pellentesque at dui eget dolor iaculis convallis.\r\n\r\nNullam non nunc accumsan mi bibendum pellentesque. Integer malesuada elit tincidunt augue porttitor, in ultricies turpis fermentum. Aenean ut felis ante. Aliquam sagittis massa tempor laoreet consectetur. In volutpat massa libero, non sodales est faucibus vitae. Vestibulum laoreet id lectus in pharetra. Proin eu blandit lacus, sed eleifend ligula. Nam eget nisi elementum, pretium sem a, egestas mauris. Aliquam ligula libero, tristique sed aliquet non, finibus nec leo. Quisque ornare accumsan tempor. Vestibulum aliquet justo non magna cursus, eget molestie quam feugiat. Fusce dignissim est dolor, eget suscipit justo egestas id. Integer vitae egestas arcu. Nunc a est imperdiet urna volutpat gravida. Fusce auctor, est vitae dictum hendrerit, eros ligula convallis erat, at rutrum dui ante vel libero. Nunc vel eros metus.', '2019-08-09 10:04:34', 0),
(4, 'Tutup Poin Menyambut Tahun Baru', 'Kami akan mengadakan tutup poin dalam menyambut tahun baru 2020. Kami sediakan hadiah-hadiah yang sangat menarik\r\n\r\n1 - 100 poin = Gelas Cantik\r\n101 - 200 poin = Jam Dinding\r\n201 keatas = HP keren\r\n\r\nIni hanya coba-coba saja.\r\nDonec hendrerit convallis ante. Integer non erat lorem. Suspendisse velit urna, porta in consectetur eget, mollis non tellus. In bibendum tempus nisi non suscipit. Sed lectus augue, rutrum vel justo non, viverra consectetur mi. Morbi suscipit iaculis ipsum, id ornare tellus dictum in. Duis semper ultricies ligula at ullamcorper. Nunc cursus mauris dui, vel malesuada eros dictum nec. Nullam ut ultricies ante. Nullam bibendum ante urna, in tincidunt dui sagittis eget. Quisque at velit dolor. Donec feugiat pretium quam nec hendrerit. Vestibulum egestas vestibulum erat ut imperdiet. Donec feugiat nibh et ipsum scelerisque, eu rutrum dui pellentesque. Vestibulum hendrerit est urna, in rhoncus eros commodo id. Donec facilisis ligula nisi, ac sollicitudin metus commodo eu.', '2019-08-09 10:25:11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_umum` int(11) NOT NULL,
  `harga_distributor` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `permalink` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `id_grup` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `id_grup`, `nama`) VALUES
(1, 1, 'Sistem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `def_privilege`
--

CREATE TABLE `def_privilege` (
  `id` int(11) NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `lihat` tinyint(4) NOT NULL,
  `tambah` tinyint(4) NOT NULL,
  `ubah` tinyint(4) NOT NULL,
  `hapus` tinyint(4) NOT NULL,
  `isprovide` tinyint(4) NOT NULL,
  `isapprove` tinyint(4) NOT NULL,
  `isrelease` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `def_privilege`
--

INSERT INTO `def_privilege` (`id`, `idjabatan`, `idarea`, `lihat`, `tambah`, `ubah`, `hapus`, `isprovide`, `isapprove`, `isrelease`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1, 1, 1, 1),
(10, 4, 3, 0, 0, 0, 0, 0, 0, 0),
(12, 4, 2, 0, 0, 0, 0, 0, 0, 0),
(13, 4, 1, 0, 0, 0, 0, 0, 0, 0),
(21, 1, 7, 1, 1, 1, 1, 1, 1, 1),
(22, 4, 7, 0, 0, 0, 0, 0, 0, 0),
(107, 1, 13, 1, 1, 1, 1, 0, 0, 0),
(128, 4, 13, 0, 0, 0, 0, 0, 0, 0),
(129, 1, 14, 1, 1, 1, 1, 1, 1, 1),
(130, 1, 15, 1, 1, 1, 1, 0, 0, 0),
(131, 4, 14, 0, 0, 0, 0, 0, 0, 0),
(132, 4, 15, 1, 1, 1, 1, 0, 0, 0),
(133, 1, 16, 1, 1, 1, 1, 0, 0, 0),
(134, 4, 16, 1, 1, 1, 1, 0, 0, 0),
(135, 1, 17, 1, 1, 1, 1, 0, 0, 0),
(136, 4, 17, 1, 1, 1, 1, 0, 0, 0),
(137, 1, 18, 1, 1, 1, 1, 0, 0, 0),
(138, 1, 19, 1, 1, 1, 1, 0, 0, 0),
(139, 1, 20, 1, 1, 1, 1, 1, 1, 1),
(140, 4, 18, 1, 1, 1, 1, 0, 0, 0),
(141, 4, 19, 1, 1, 1, 1, 0, 0, 0),
(142, 4, 20, 1, 1, 1, 1, 0, 0, 0),
(143, 1, 21, 1, 1, 1, 1, 0, 0, 0),
(144, 1, 22, 1, 1, 1, 1, 0, 0, 0),
(145, 4, 21, 1, 1, 1, 1, 0, 0, 0),
(146, 4, 22, 1, 1, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id`, `nama`) VALUES
(1, 'Internal'),
(2, 'Eksternal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Super Admin'),
(4, 'Staff Internal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `ismaintenance` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `maintenance`
--

INSERT INTO `maintenance` (`id`, `ismaintenance`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_shipping`
--

CREATE TABLE `master_shipping` (
  `id_master_shipping` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `kode` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_shipping`
--

INSERT INTO `master_shipping` (`id_master_shipping`, `nama`, `kode`) VALUES
(0, 'Test pembayaran', 'test'),
(1, 'Jalur Nugraha Ekakurir', 'jne'),
(2, 'POS Indonesia', 'pos'),
(3, 'Citra Van Titipan Kilat', 'tiki'),
(4, 'RPX Holding', 'rpx'),
(5, 'Eka Sari Lorena', 'esl'),
(6, 'Priority Cargo and Package', 'pcp'),
(7, 'Pandu Logistics', 'pandu'),
(8, 'Wahana Prestasi Logistik', 'wahana'),
(9, 'SiCepat Express', 'sicepat'),
(10, 'J&T Express', 'jnt'),
(11, 'Pahala Kencana Express', 'pahala'),
(12, 'Cahaya Logistik', 'cahaya'),
(13, 'SAP Express', 'sap'),
(14, 'JET Express', 'jet'),
(15, 'Indah Logistic', 'indah'),
(16, '21 Express', 'dse'),
(17, 'Solusi Ekspres', 'slis'),
(18, 'First Logistics', 'first'),
(19, 'Nusantara Card Semesta', 'ncs'),
(20, 'Star Cargo', 'star'),
(21, 'Nusantara Surya Sakti Express', 'nss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_wilayah`
--

CREATE TABLE `master_wilayah` (
  `id` int(11) NOT NULL,
  `kodeprov` varchar(8) NOT NULL,
  `namaprov` varchar(128) NOT NULL,
  `kodekab` varchar(8) NOT NULL,
  `namakab` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_wilayah`
--

INSERT INTO `master_wilayah` (`id`, `kodeprov`, `namaprov`, `kodekab`, `namakab`) VALUES
(0, '0', ' -', '0.0', ' -'),
(1, '11', 'aceh', '11.01', 'aceh selatan'),
(2, '11', 'aceh', '11.02', 'aceh tenggara'),
(3, '11', 'aceh', '11.03', 'aceh timur'),
(4, '11', 'aceh', '11.04', 'aceh tengah'),
(5, '11', 'aceh', '11.05', 'aceh barat'),
(6, '11', 'aceh', '11.06', 'aceh besar'),
(7, '11', 'aceh', '11.07', 'pidie'),
(8, '11', 'aceh', '11.08', ' aceh utara'),
(9, '11', 'aceh', '11.09', 'simeulue'),
(10, '11', 'aceh', '11.1', 'aceh singkil'),
(11, '11', 'aceh', '11.11', 'bireuen'),
(12, '11', 'aceh', '11.12', 'aceh barat daya'),
(13, '11', 'aceh', '11.13', 'gayo lues'),
(14, '11', 'aceh', '11.14', 'aceh jaya'),
(15, '11', 'aceh', '11.15', 'nagan raya'),
(16, '11', 'aceh', '11.16', 'aceh tamiang'),
(17, '11', 'aceh', '11.17', 'bener meriah'),
(18, '11', 'aceh', '11.18', 'pidie jaya'),
(19, '11', 'aceh', '11.71', 'banda aceh'),
(20, '11', 'aceh', '11.72', 'sabang'),
(21, '11', 'aceh', '11.73', 'lhokseumawe'),
(22, '11', 'aceh', '11.74', 'langsa'),
(23, '11', 'aceh', '11.75', 'subulussalam'),
(24, '12', 'sumatera utara', '12.01', 'tapanuli tengah'),
(25, '12', 'sumatera utara', '12.02', 'tapanuli utara'),
(26, '12', 'sumatera utara', '12.03', 'tapanuli selatan'),
(27, '12', 'sumatera utara', '12.04', 'nias'),
(28, '12', 'sumatera utara', '12.05', 'langkat'),
(29, '12', 'sumatera utara', '12.06', 'karo'),
(30, '12', 'sumatera utara', '12.07', 'deli serdang'),
(31, '12', 'sumatera utara', '12.08', 'simalungun'),
(32, '12', 'sumatera utara', '12.09', 'asahan'),
(33, '12', 'sumatera utara', '12.1', 'labuhanbatu'),
(34, '12', 'sumatera utara', '12.11', 'dairi'),
(35, '12', 'sumatera utara', '12.12', 'toba samosir'),
(36, '12', 'sumatera utara', '12.13', 'mandailing natal'),
(37, '12', 'sumatera utara', '12.14', 'nias selatan'),
(38, '12', 'sumatera utara', '12.15', 'pakpak bharat'),
(39, '12', 'sumatera utara', '12.16', 'humbang hasundutan'),
(40, '12', 'sumatera utara', '12.17', 'samosir'),
(41, '12', 'sumatera utara', '12.18', 'serdang bedagai'),
(42, '12', 'sumatera utara', '12.19', 'batu bara'),
(43, '12', 'sumatera utara', '12.2', 'padang lawas utara'),
(44, '12', 'sumatera utara', '12.21', 'padang lawas'),
(45, '12', 'sumatera utara', '12.22', 'labuhanbatu selatan'),
(46, '12', 'sumatera utara', '12.23', 'labuhanbatu utara'),
(47, '12', 'sumatera utara', '12.24', 'nias utara'),
(48, '12', 'sumatera utara', '12.25', 'nias barat'),
(49, '12', 'sumatera utara', '12.71', 'medan'),
(50, '12', 'sumatera utara', '12.72', 'pematang siantar'),
(51, '12', 'sumatera utara', '12.73', 'sibolga'),
(52, '12', 'sumatera utara', '12.74', 'tanjung balai'),
(53, '12', 'sumatera utara', '12.75', 'binjai'),
(54, '12', 'sumatera utara', '12.76', 'tebing tinggi'),
(55, '12', 'sumatera utara', '12.77', 'padang sidempuan'),
(56, '12', 'sumatera utara', '12.78', 'gunung sitoli'),
(57, '13', 'sumatera barat', '13.01', 'pesisir selatan'),
(58, '13', 'sumatera barat', '13.02', 'solok kabupaten'),
(59, '13', 'sumatera barat', '13.03', 'sijunjung'),
(60, '13', 'sumatera barat', '13.04', 'tanah datar'),
(61, '13', 'sumatera barat', '13.05', 'padang pariaman'),
(62, '13', 'sumatera barat', '13.06', 'agam'),
(63, '13', 'sumatera barat', '13.07', 'lima puluh kota'),
(64, '13', 'sumatera barat', '13.08', 'pasaman'),
(65, '13', 'sumatera barat', '13.09', 'kepulauan mentawai'),
(66, '13', 'sumatera barat', '13.1', 'dharmasraya'),
(67, '13', 'sumatera barat', '13.11', 'solok selatan'),
(68, '13', 'sumatera barat', '13.12', 'pasaman barat'),
(69, '13', 'sumatera barat', '13.71', 'padang'),
(70, '13', 'sumatera barat', '13.72', 'solok kota '),
(71, '13', 'sumatera barat', '13.73', 'sawah lunto'),
(72, '13', 'sumatera barat', '13.74', 'padang panjang'),
(73, '13', 'sumatera barat', '13.75', 'bukittinggi'),
(74, '13', 'sumatera barat', '13.76', 'payakumbuh'),
(75, '13', 'sumatera barat', '13.77', 'pariaman'),
(76, '14', 'riau', '14.01', 'kampar'),
(77, '14', 'riau', '14.02', 'indragiri hulu'),
(78, '14', 'riau', '14.03', 'bengkalis'),
(79, '14', 'riau', '14.04', 'indragiri hilir'),
(80, '14', 'riau', '14.05', 'pelalawan'),
(81, '14', 'riau', '14.06', 'rokan hulu'),
(82, '14', 'riau', '14.07', 'rokan hilir'),
(83, '14', 'riau', '14.08', 'siak'),
(84, '14', 'riau', '14.09', 'kuantan singingi'),
(85, '14', 'riau', '14.1', 'kepulauan meranti'),
(86, '14', 'riau', '14.71', 'pekanbaru'),
(87, '14', 'riau', '14.72', 'duma'),
(88, '15', 'jambi', '15.01', 'kerinci'),
(89, '15', 'jambi', '15.02', 'merangin'),
(90, '15', 'jambi', '15.03', 'sarolangun'),
(91, '15', 'jambi', '15.04', 'batanghari'),
(92, '15', 'jambi', '15.05', 'muaro jambi'),
(93, '15', 'jambi', '15.06', 'tanjung jabung barat'),
(94, '15', 'jambi', '15.07', 'tanjung jabung timur'),
(95, '15', 'jambi', '15.08', 'bungo'),
(96, '15', 'jambi', '15.09', 'tebo'),
(97, '15', 'jambi', '15.71', 'jambi'),
(98, '15', 'jambi', '15.72', 'sungai penuh'),
(99, '16', 'sumatera selatan', '16.01', 'ogan komering ulu'),
(100, '16', 'sumatera selatan', '16.02', 'ogan komering ilir'),
(101, '16', 'sumatera selatan', '16.03', 'muara enim'),
(102, '16', 'sumatera selatan', '16.04', 'lahat'),
(103, '16', 'sumatera selatan', '16.05', 'musi rawas'),
(104, '16', 'sumatera selatan', '16.06', 'musi banyuasin'),
(105, '16', 'sumatera selatan', '16.07', 'banyuasin'),
(106, '16', 'sumatera selatan', '16.08', 'ogan komering ulu timur'),
(107, '16', 'sumatera selatan', '16.09', 'ogan komering ulu selatan'),
(108, '16', 'sumatera selatan', '16.1', 'ogan ilir'),
(109, '16', 'sumatera selatan', '16.11', 'empat lawang'),
(110, '16', 'sumatera selatan', '16.12', 'penukal abab lematang ilir'),
(111, '16', 'sumatera selatan', '16.13', 'musi rawas utara'),
(112, '16', 'sumatera selatan', '16.71', 'palembang'),
(113, '16', 'sumatera selatan', '16.72', 'pagar alam'),
(114, '16', 'sumatera selatan', '16.73', 'lubuk linggau'),
(115, '16', 'sumatera selatan', '16.74', 'prabumulih'),
(116, '17', 'bengkulu', '17.01', 'bengkulu selatan'),
(117, '17', 'bengkulu', '17.02', 'rejang lebong'),
(118, '17', 'bengkulu', '17.03', 'bengkulu utara'),
(119, '17', 'bengkulu', '17.04', 'kaur'),
(120, '17', 'bengkulu', '17.05', 'seluma'),
(121, '17', 'bengkulu', '17.06', 'muko muko'),
(122, '17', 'bengkulu', '17.07', 'lebong'),
(123, '17', 'bengkulu', '17.08', 'kepahiang'),
(124, '17', 'bengkulu', '17.09', 'bengkulu tengah'),
(125, '17', 'bengkulu', '17.71', 'bengkulu'),
(126, '18', 'lampung', '18.01', 'lampung selatan'),
(127, '18', 'lampung', '18.02', 'lampung tengah'),
(128, '18', 'lampung', '18.03', 'lampung utara'),
(129, '18', 'lampung', '18.04', 'lampung barat'),
(130, '18', 'lampung', '18.05', 'tulang bawang'),
(131, '18', 'lampung', '18.06', 'tanggamus'),
(132, '18', 'lampung', '18.07', 'lampung timur'),
(133, '18', 'lampung', '18.08', 'way kanan'),
(134, '18', 'lampung', '18.09', 'pesawaran'),
(135, '18', 'lampung', '18.1', 'pringsewu'),
(136, '18', 'lampung', '18.11', 'mesuji'),
(137, '18', 'lampung', '18.12', 'tulang bawang barat'),
(138, '18', 'lampung', '18.13', 'pesisir barat'),
(139, '18', 'lampung', '18.71', 'bandar lampung'),
(140, '18', 'lampung', '18.72', 'metro'),
(141, '19', 'kepulauan bangka belitung', '19.01', 'bangka'),
(142, '19', 'kepulauan bangka belitung', '19.02', 'belitung'),
(143, '19', 'kepulauan bangka belitung', '19.03', 'bangka selatan'),
(144, '19', 'kepulauan bangka belitung', '19.04', 'bangka tengah'),
(145, '19', 'kepulauan bangka belitung', '19.05', 'bangka barat'),
(146, '19', 'kepulauan bangka belitung', '19.06', 'belitung timur'),
(147, '19', 'kepulauan bangka belitung', '19.71', 'pangkal pinang'),
(148, '21', 'kepulauan riau', '21.01', 'bintan'),
(149, '21', 'kepulauan riau', '21.02', 'karimun'),
(150, '21', 'kepulauan riau', '21.03', 'natuna'),
(151, '21', 'kepulauan riau', '21.04', 'lingga'),
(152, '21', 'kepulauan riau', '21.05', 'kepulauan anambas'),
(153, '21', 'kepulauan riau', '21.71', 'batam'),
(154, '21', 'kepulauan riau', '21.72', 'tanjung pinang'),
(155, '31', 'dki jakarta', '31.01', 'kep. seribu'),
(156, '31', 'dki jakarta', '31.71', 'jakarta pusat'),
(157, '31', 'dki jakarta', '31.72', 'jakarta utara'),
(158, '31', 'dki jakarta', '31.73', 'jakarta barat'),
(159, '31', 'dki jakarta', '31.74', 'jakarta selatan'),
(160, '31', 'dki jakarta', '31.75', 'jakarta timur'),
(161, '32', 'jawa barat', '32.01', 'bogor kabupaten'),
(162, '32', 'jawa barat', '32.02', 'sukabumi kabupaten'),
(163, '32', 'jawa barat', '32.03', 'cianjur'),
(164, '32', 'jawa barat', '32.04', 'bandung kabupaten'),
(165, '32', 'jawa barat', '32.05', 'garut'),
(166, '32', 'jawa barat', '32.06', 'tasikmalaya kabupaten'),
(167, '32', 'jawa barat', '32.07', 'ciamis'),
(168, '32', 'jawa barat', '32.08', 'kuningan'),
(169, '32', 'jawa barat', '32.09', 'cirebon kabupaten'),
(170, '32', 'jawa barat', '32.1', 'majalengka'),
(171, '32', 'jawa barat', '32.11', 'sumedang'),
(172, '32', 'jawa barat', '32.12', 'indramayu'),
(173, '32', 'jawa barat', '32.13', 'subang'),
(174, '32', 'jawa barat', '32.14', 'purwakarta'),
(175, '32', 'jawa barat', '32.15', 'karawang'),
(176, '32', 'jawa barat', '32.16', 'bekasi'),
(177, '32', 'jawa barat', '32.17', 'bandung barat'),
(178, '32', 'jawa barat', '32.18', 'pangandaran'),
(179, '32', 'jawa barat', '32.71', 'bogor kota'),
(180, '32', 'jawa barat', '32.72', 'sukabumi kota'),
(181, '32', 'jawa barat', '32.73', 'bandung kota'),
(182, '32', 'jawa barat', '32.74', 'cirebon kota'),
(183, '32', 'jawa barat', '32.75', 'bekasi'),
(184, '32', 'jawa barat', '32.76', 'depok'),
(185, '32', 'jawa barat', '32.77', 'cimahi'),
(186, '32', 'jawa barat', '32.78', 'tasikmalaya kota'),
(187, '32', 'jawa barat', '32.79', 'banjar jabar'),
(188, '33', 'jawa tengah', '33.01', 'cilacap'),
(189, '33', 'jawa tengah', '33.02', 'banyumas'),
(190, '33', 'jawa tengah', '33.03', 'purbalingga'),
(191, '33', 'jawa tengah', '33.04', 'banjarnegara'),
(192, '33', 'jawa tengah', '33.05', 'kebumen'),
(193, '33', 'jawa tengah', '33.06', 'purworejo'),
(194, '33', 'jawa tengah', '33.07', 'wonosobo'),
(195, '33', 'jawa tengah', '33.08', 'magelang kabupaten'),
(196, '33', 'jawa tengah', '33.09', 'boyolali'),
(197, '33', 'jawa tengah', '33.1', 'klaten'),
(198, '33', 'jawa tengah', '33.11', 'sukoharjo'),
(199, '33', 'jawa tengah', '33.12', 'wonogiri'),
(200, '33', 'jawa tengah', '33.13', 'karanganyar'),
(201, '33', 'jawa tengah', '33.14', 'sragen'),
(202, '33', 'jawa tengah', '33.15', 'grobogan'),
(203, '33', 'jawa tengah', '33.16', 'blora'),
(204, '33', 'jawa tengah', '33.17', 'rembang'),
(205, '33', 'jawa tengah', '33.18', 'pati'),
(206, '33', 'jawa tengah', '33.19', 'kudus'),
(207, '33', 'jawa tengah', '33.2', 'jepara'),
(208, '33', 'jawa tengah', '33.21', 'demak'),
(209, '33', 'jawa tengah', '33.22', 'semarang kabupaten'),
(210, '33', 'jawa tengah', '33.23', 'temanggung'),
(211, '33', 'jawa tengah', '33.24', 'kendal'),
(212, '33', 'jawa tengah', '33.25', 'batang'),
(213, '33', 'jawa tengah', '33.26', 'pekalongan kabupaten'),
(214, '33', 'jawa tengah', '33.27', 'pemalang'),
(215, '33', 'jawa tengah', '33.28', 'tegal kabupaten'),
(216, '33', 'jawa tengah', '33.29', 'brebes'),
(217, '33', 'jawa tengah', '33.71', 'magelang kota'),
(218, '33', 'jawa tengah', '33.72', 'surakarta (solo)'),
(219, '33', 'jawa tengah', '33.73', 'salatiga'),
(220, '33', 'jawa tengah', '33.74', 'semarang kota'),
(221, '33', 'jawa tengah', '33.75', 'pekalongan kota'),
(222, '33', 'jawa tengah', '33.76', 'tegal kota'),
(223, '36', 'banten', '36.01', 'pandeglang'),
(224, '36', 'banten', '36.02', 'lebak'),
(225, '36', 'banten', '36.03', 'tangerang kabupaten'),
(226, '36', 'banten', '36.04', 'serang kabupaten'),
(227, '36', 'banten', '36.71', 'tangerang kota'),
(228, '36', 'banten', '36.72', 'cilegon'),
(229, '36', 'banten', '36.73', 'serang kota'),
(230, '36', 'banten', '36.74', 'tangerang selatan'),
(231, '35', 'jawa timur', '35.01', 'pacitan'),
(232, '35', 'jawa timur', '35.02', 'ponorogo'),
(233, '35', 'jawa timur', '35.03', 'trenggalek'),
(234, '35', 'jawa timur', '35.04', 'tulungagung'),
(235, '35', 'jawa timur', '35.05', 'blitar kabupaten'),
(236, '35', 'jawa timur', '35.06', 'kediri kabupaten'),
(237, '35', 'jawa timur', '35.07', 'malang kabupaten'),
(238, '35', 'jawa timur', '35.08', 'lumajang'),
(239, '35', 'jawa timur', '35.09', 'jember'),
(240, '35', 'jawa timur', '35.1', 'banyuwangi'),
(241, '35', 'jawa timur', '35.11', 'bondowoso'),
(242, '35', 'jawa timur', '35.12', 'situbondo'),
(243, '35', 'jawa timur', '35.13', 'probolinggo kabupaten'),
(244, '35', 'jawa timur', '35.14', 'pasuruan kabupaten'),
(245, '35', 'jawa timur', '35.15', 'sidoarjo'),
(246, '35', 'jawa timur', '35.16', 'mojokerto kabupaten'),
(247, '35', 'jawa timur', '35.17', 'jombang'),
(248, '35', 'jawa timur', '35.18', 'nganjuk'),
(249, '35', 'jawa timur', '35.19', 'madiun kabupaten'),
(250, '35', 'jawa timur', '35.2', 'magetan'),
(251, '35', 'jawa timur', '35.21', 'ngawi'),
(252, '35', 'jawa timur', '35.22', 'bojonegoro'),
(253, '35', 'jawa timur', '35.23', 'tuban'),
(254, '35', 'jawa timur', '35.24', 'lamongan'),
(255, '35', 'jawa timur', '35.25', 'gresik'),
(256, '35', 'jawa timur', '35.26', 'bangkalan'),
(257, '35', 'jawa timur', '35.27', 'sampang'),
(258, '35', 'jawa timur', '35.28', 'pamekasan'),
(259, '35', 'jawa timur', '35.29', 'sumenep'),
(260, '35', 'jawa timur', '35.71', 'kediri kota'),
(261, '35', 'jawa timur', '35.72', 'blitar kota'),
(262, '35', 'jawa timur', '35.73', 'malang kota'),
(263, '35', 'jawa timur', '35.74', 'probolinggo kota'),
(264, '35', 'jawa timur', '35.75', 'pasuruan kota'),
(265, '35', 'jawa timur', '35.76', 'mojokerto kota'),
(266, '35', 'jawa timur', '35.77', 'madiun kota'),
(267, '35', 'jawa timur', '35.78', 'surabaya'),
(268, '35', 'jawa timur', '35.79', 'batu'),
(269, '34', 'daerah istimewa yogyakarta', '34.01', 'kulon progo'),
(270, '34', 'daerah istimewa yogyakarta', '34.02', 'bantul'),
(271, '34', 'daerah istimewa yogyakarta', '34.03', 'gunungkidul'),
(272, '34', 'daerah istimewa yogyakarta', '34.04', 'sleman'),
(273, '34', 'daerah istimewa yogyakarta', '34.71', 'yogyakarta'),
(274, '51', 'bali', '51.01', 'jembrana'),
(275, '51', 'bali', '51.02', 'tabanan'),
(276, '51', 'bali', '51.03', 'badung'),
(277, '51', 'bali', '51.04', 'gianyar'),
(278, '51', 'bali', '51.05', 'klungkung'),
(279, '51', 'bali', '51.06', 'bangli'),
(280, '51', 'bali', '51.07', 'karangasem'),
(281, '51', 'bali', '51.08', 'buleleng'),
(282, '51', 'bali', '51.71', 'denpasar'),
(283, '52', 'nusa tenggara barat', '52.01', 'lombok barat'),
(284, '52', 'nusa tenggara barat', '52.02', 'lombok tengah'),
(285, '52', 'nusa tenggara barat', '52.03', 'lombok timur'),
(286, '52', 'nusa tenggara barat', '52.04', 'sumbawa'),
(287, '52', 'nusa tenggara barat', '52.05', 'dompu'),
(288, '52', 'nusa tenggara barat', '52.06', 'bima kabupaten'),
(289, '52', 'nusa tenggara barat', '52.07', 'sumbawa barat'),
(290, '52', 'nusa tenggara barat', '52.08', 'lombok utara'),
(291, '52', 'nusa tenggara barat', '52.71', 'mataram'),
(292, '52', 'nusa tenggara barat', '52.72', 'bima kota'),
(293, '53', 'nusa tenggara timur', '53.01', 'kupang kabupaten'),
(294, '53', 'nusa tenggara timur', '53.02', 'timor tengah selatan'),
(295, '53', 'nusa tenggara timur', '53.03', 'timor tengah utara'),
(296, '53', 'nusa tenggara timur', '53.04', 'belu'),
(297, '53', 'nusa tenggara timur', '53.05', 'alor'),
(298, '53', 'nusa tenggara timur', '53.06', 'flores timur'),
(299, '53', 'nusa tenggara timur', '53.07', 'sikka'),
(300, '53', 'nusa tenggara timur', '53.08', 'ende'),
(301, '53', 'nusa tenggara timur', '53.09', 'ngada'),
(302, '53', 'nusa tenggara timur', '53.1', 'manggarai'),
(303, '53', 'nusa tenggara timur', '53.11', 'sumba timur'),
(304, '53', 'nusa tenggara timur', '53.12', 'sumba barat'),
(305, '53', 'nusa tenggara timur', '53.13', 'lembata'),
(306, '53', 'nusa tenggara timur', '53.14', 'rote ndao'),
(307, '53', 'nusa tenggara timur', '53.15', 'manggarai barat'),
(308, '53', 'nusa tenggara timur', '53.16', 'nagekeo'),
(309, '53', 'nusa tenggara timur', '53.17', 'sumba tengah'),
(310, '53', 'nusa tenggara timur', '53.18', 'sumba barat daya'),
(311, '53', 'nusa tenggara timur', '53.19', 'manggarai timur'),
(312, '53', 'nusa tenggara timur', '53.2', 'sabu raijua'),
(313, '53', 'nusa tenggara timur', '53.21', 'malaka'),
(314, '53', 'nusa tenggara timur', '53.71', 'kupang kota'),
(315, '61', 'kalimantan barat', '61.01', 'sambas'),
(316, '61', 'kalimantan barat', '61.02', 'mempawah'),
(317, '61', 'kalimantan barat', '61.03', 'sanggau'),
(318, '61', 'kalimantan barat', '61.04', 'ketapang'),
(319, '61', 'kalimantan barat', '61.05', 'sintang'),
(320, '61', 'kalimantan barat', '61.06', 'kapuas hulu'),
(321, '61', 'kalimantan barat', '61.07', 'bengkayang'),
(322, '61', 'kalimantan barat', '61.08', 'landak'),
(323, '61', 'kalimantan barat', '61.09', 'sekadau'),
(324, '61', 'kalimantan barat', '61.1', 'melawi'),
(325, '61', 'kalimantan barat', '61.11', 'kayong utara'),
(326, '61', 'kalimantan barat', '61.12', 'kubu raya'),
(327, '61', 'kalimantan barat', '61.71', 'pontianak'),
(328, '61', 'kalimantan barat', '61.72', 'singkawang'),
(329, '62', 'kalimantan tengah', '62.01', 'kotawaringin barat'),
(330, '62', 'kalimantan tengah', '62.02', 'kotawaringin timur'),
(331, '62', 'kalimantan tengah', '62.03', 'kapuas'),
(332, '62', 'kalimantan tengah', '62.04', 'barito selatan'),
(333, '62', 'kalimantan tengah', '62.05', 'barito utara'),
(334, '62', 'kalimantan tengah', '62.06', 'katingan'),
(335, '62', 'kalimantan tengah', '62.07', 'seruyan'),
(336, '62', 'kalimantan tengah', '62.08', 'sukamara'),
(337, '62', 'kalimantan tengah', '62.09', 'lamandau'),
(338, '62', 'kalimantan tengah', '62.1', 'gunung mas'),
(339, '62', 'kalimantan tengah', '62.11', 'pulang pisau'),
(340, '62', 'kalimantan tengah', '62.12', 'murung raya'),
(341, '62', 'kalimantan tengah', '62.13', 'barito timur'),
(342, '62', 'kalimantan tengah', '62.71', 'palangkaraya'),
(343, '63', 'kalimantan selatan', '63.01', 'tanah laut'),
(344, '63', 'kalimantan selatan', '63.02', 'kotabaru'),
(345, '63', 'kalimantan selatan', '63.03', 'banjar kalsel'),
(346, '63', 'kalimantan selatan', '63.04', 'barito kuala'),
(347, '63', 'kalimantan selatan', '63.05', 'tapin'),
(348, '63', 'kalimantan selatan', '63.06', 'hulu sungai selatan'),
(349, '63', 'kalimantan selatan', '63.07', 'hulu sungai tengah'),
(350, '63', 'kalimantan selatan', '63.08', 'hulu sungai utara'),
(351, '63', 'kalimantan selatan', '63.09', 'tabalong'),
(352, '63', 'kalimantan selatan', '63.1', 'tanah bumbu'),
(353, '63', 'kalimantan selatan', '63.11', 'balangan'),
(354, '63', 'kalimantan selatan', '63.71', 'banjarmasin'),
(355, '63', 'kalimantan selatan', '63.72', 'banjarbaru'),
(356, '64', 'kalimantan timur', '64.01', 'paser'),
(357, '64', 'kalimantan timur', '64.02', 'kutai kartanegara'),
(358, '64', 'kalimantan timur', '64.03', 'berau'),
(359, '64', 'kalimantan timur', '64.07', 'kutai barat'),
(360, '64', 'kalimantan timur', '64.08', 'kutai timur'),
(361, '64', 'kalimantan timur', '64.09', 'penajam paser utara'),
(362, '64', 'kalimantan timur', '64.11', 'mahakam ulu'),
(363, '64', 'kalimantan timur', '64.71', 'balikpapan'),
(364, '64', 'kalimantan timur', '64.72', 'samarinda'),
(365, '64', 'kalimantan timur', '64.74', 'bontang'),
(366, '65', 'kalimantan utara', '65.01', 'bulungan'),
(367, '65', 'kalimantan utara', '65.02', 'malinau'),
(368, '65', 'kalimantan utara', '65.03', 'nunukan'),
(369, '65', 'kalimantan utara', '65.04', 'tana tidung'),
(370, '65', 'kalimantan utara', '65.71', 'tarakan'),
(371, '71', 'sulawesi utara', '71.01', 'bolaang mongondow'),
(372, '71', 'sulawesi utara', '71.02', 'minahasa'),
(373, '71', 'sulawesi utara', '71.03', 'kepulauan sangihe'),
(374, '71', 'sulawesi utara', '71.04', 'kepulauan talaud'),
(375, '71', 'sulawesi utara', '71.05', 'minahasa selatan'),
(376, '71', 'sulawesi utara', '71.06', 'minahasa utara'),
(377, '71', 'sulawesi utara', '71.07', 'minahasa tenggara'),
(378, '71', 'sulawesi utara', '71.08', 'bolaang mongondow utara'),
(379, '71', 'sulawesi utara', '71.09', 'kepsiau tagulandang biaro'),
(380, '71', 'sulawesi utara', '71.1', 'bolaang mongondow timur'),
(381, '71', 'sulawesi utara', '71.11', 'bolaang mongondow selatan'),
(382, '71', 'sulawesi utara', '71.71', 'manado'),
(383, '71', 'sulawesi utara', '71.72', 'bitung'),
(384, '71', 'sulawesi utara', '71.73', 'tomohon'),
(385, '71', 'sulawesi utara', '71.74', 'kotamobagu'),
(386, '72', 'sulawesi tengah', '72.01', 'banggai'),
(387, '72', 'sulawesi tengah', '72.02', 'poso'),
(388, '72', 'sulawesi tengah', '72.03', 'donggala'),
(389, '72', 'sulawesi tengah', '72.04', 'toli toli'),
(390, '72', 'sulawesi tengah', '72.05', 'buol'),
(391, '72', 'sulawesi tengah', '72.06', 'morowali'),
(392, '72', 'sulawesi tengah', '72.07', 'banggai kepulauan'),
(393, '72', 'sulawesi tengah', '72.08', 'parigi moutong'),
(394, '72', 'sulawesi tengah', '72.09', 'tojo una una'),
(395, '72', 'sulawesi tengah', '72.1', 'sigi'),
(396, '72', 'sulawesi tengah', '72.11', 'banggai laut'),
(397, '72', 'sulawesi tengah', '72.12', 'morowali utara'),
(398, '72', 'sulawesi tengah', '72.71', 'palu'),
(399, '73', 'sulawesi selatan', '73.01', 'kepulauan selayar'),
(400, '73', 'sulawesi selatan', '73.02', 'bulukumba'),
(401, '73', 'sulawesi selatan', '73.03', 'bantaeng'),
(402, '73', 'sulawesi selatan', '73.04', 'jeneponto'),
(403, '73', 'sulawesi selatan', '73.05', 'takalar'),
(404, '73', 'sulawesi selatan', '73.06', 'gowa'),
(405, '73', 'sulawesi selatan', '73.07', 'sinjai'),
(406, '73', 'sulawesi selatan', '73.08', 'bone'),
(407, '73', 'sulawesi selatan', '73.09', 'maros'),
(408, '73', 'sulawesi selatan', '73.1', 'pangkajene kepulauan'),
(409, '73', 'sulawesi selatan', '73.11', 'barru'),
(410, '73', 'sulawesi selatan', '73.12', 'soppeng'),
(411, '73', 'sulawesi selatan', '73.13', 'wajo'),
(412, '73', 'sulawesi selatan', '73.14', 'sidenreng rappang'),
(413, '73', 'sulawesi selatan', '73.15', 'pinrang'),
(414, '73', 'sulawesi selatan', '73.16', 'enrekang'),
(415, '73', 'sulawesi selatan', '73.17', 'luwu'),
(416, '73', 'sulawesi selatan', '73.18', 'tana toraja'),
(417, '73', 'sulawesi selatan', '73.22', 'luwu utara'),
(418, '73', 'sulawesi selatan', '73.24', 'luwu timur'),
(419, '73', 'sulawesi selatan', '73.26', 'toraja utara'),
(420, '73', 'sulawesi selatan', '73.71', 'makassar'),
(421, '73', 'sulawesi selatan', '73.72', 'pare pare'),
(422, '73', 'sulawesi selatan', '73.73', 'palopo'),
(423, '74', 'sulawesi tenggara', '74.01', 'kolaka'),
(424, '74', 'sulawesi tenggara', '74.02', 'konawe'),
(425, '74', 'sulawesi tenggara', '74.03', 'muna'),
(426, '74', 'sulawesi tenggara', '74.04', 'buton'),
(427, '74', 'sulawesi tenggara', '74.05', 'konawe selatan'),
(428, '74', 'sulawesi tenggara', '74.06', 'bombana'),
(429, '74', 'sulawesi tenggara', '74.07', 'wakatobi'),
(430, '74', 'sulawesi tenggara', '74.08', 'kolaka utara'),
(431, '74', 'sulawesi tenggara', '74.09', 'konawe utara'),
(432, '74', 'sulawesi tenggara', '74.1', 'buton utara'),
(433, '74', 'sulawesi tenggara', '74.11', 'kolaka timur'),
(434, '74', 'sulawesi tenggara', '74.12', 'konawe kepulauan'),
(435, '74', 'sulawesi tenggara', '74.13', 'muna barat'),
(436, '74', 'sulawesi tenggara', '74.14', 'buton tengah'),
(437, '74', 'sulawesi tenggara', '74.15', 'buton selatan'),
(438, '74', 'sulawesi tenggara', '74.71', 'kendari'),
(439, '74', 'sulawesi tenggara', '74.72', 'bau bau'),
(440, '75', 'gorontalo', '75.01', 'gorontalo kabupaten'),
(441, '75', 'gorontalo', '75.02', 'boalemo'),
(442, '75', 'gorontalo', '75.03', 'bone bolango'),
(443, '75', 'gorontalo', '75.04', 'pahuwato'),
(444, '75', 'gorontalo', '75.05', 'gorontalo utara'),
(445, '75', 'gorontalo', '75.71', 'gorontalo kota'),
(446, '76', 'sulawesi barat', '76.01', 'mamuju utara'),
(447, '76', 'sulawesi barat', '76.02', 'mamuju'),
(448, '76', 'sulawesi barat', '76.03', 'mamasa'),
(449, '76', 'sulawesi barat', '76.04', 'polewali mandar'),
(450, '76', 'sulawesi barat', '76.05', 'majene'),
(451, '76', 'sulawesi barat', '76.06', 'mamuju tengah'),
(452, '81', 'maluku', '81.01', 'maluku tengah'),
(453, '81', 'maluku', '81.02', 'maluku tenggara'),
(454, '81', 'maluku', '81.03', 'maluku tenggara barat'),
(455, '81', 'maluku', '81.04', 'buru'),
(456, '81', 'maluku', '81.05', 'seram bagian timur'),
(457, '81', 'maluku', '81.06', 'seram bagian barat'),
(458, '81', 'maluku', '81.07', 'kepulauan aru'),
(459, '81', 'maluku', '81.08', 'maluku barat daya'),
(460, '81', 'maluku', '81.09', 'buru selatan'),
(461, '81', 'maluku', '81.71', 'ambon'),
(462, '81', 'maluku', '81.72', 'tual'),
(463, '82', 'maluku utara', '82.01', 'halmahera barat'),
(464, '82', 'maluku utara', '82.02', 'halmahera tengah'),
(465, '82', 'maluku utara', '82.03', 'halmahera utara'),
(466, '82', 'maluku utara', '82.04', 'halmahera selatan'),
(467, '82', 'maluku utara', '82.05', 'kepulauan sula'),
(468, '82', 'maluku utara', '82.06', 'halmahera timur'),
(469, '82', 'maluku utara', '82.07', 'pulau morotai'),
(470, '82', 'maluku utara', '82.08', 'pulau taliabu'),
(471, '82', 'maluku utara', '82.71', 'ternate'),
(472, '82', 'maluku utara', '82.72', 'tidore kepulauan'),
(473, '91', 'p a p u a', '91.01', 'merauke'),
(474, '91', 'p a p u a', '91.02', 'jayawijaya'),
(475, '91', 'p a p u a', '91.03', 'jayapura kabupaten'),
(476, '91', 'p a p u a', '91.04', 'nabire'),
(477, '91', 'p a p u a', '91.05', 'kepulauan yapen'),
(478, '91', 'p a p u a', '91.06', 'biak numfor'),
(479, '91', 'p a p u a', '91.07', 'puncak jaya'),
(480, '91', 'p a p u a', '91.08', 'pania'),
(481, '91', 'p a p u a', '91.09', 'mimika'),
(482, '91', 'p a p u a', '91.1', 'sarmi'),
(483, '91', 'p a p u a', '91.11', 'keerom'),
(484, '91', 'p a p u a', '91.12', 'pegunungan bintang'),
(485, '91', 'p a p u a', '91.13', 'yahukimo'),
(486, '91', 'p a p u a', '91.14', 'tolikara'),
(487, '91', 'p a p u a', '91.15', 'waropen'),
(488, '91', 'p a p u a', '91.16', 'boven digoel'),
(489, '91', 'p a p u a', '91.17', 'mappi'),
(490, '91', 'p a p u a', '91.18', 'asmat'),
(491, '91', 'p a p u a', '91.19', 'supior'),
(492, '91', 'p a p u a', '91.2', 'mamberamo raya'),
(493, '91', 'p a p u a', '91.21', 'mamberamo tengah'),
(494, '91', 'p a p u a', '91.22', 'yalimo'),
(495, '91', 'p a p u a', '91.23', 'lanny jaya'),
(496, '91', 'p a p u a', '91.24', 'nduga'),
(497, '91', 'p a p u a', '91.25', 'puncak'),
(498, '91', 'p a p u a', '91.26', 'dogiyai'),
(499, '91', 'p a p u a', '91.27', 'intan jaya'),
(500, '91', 'p a p u a', '91.28', 'deiyai'),
(501, '91', 'p a p u a', '91.71', 'jayapura kota'),
(502, '92', 'papua barat', '92.01', 'sorong kabupaten'),
(503, '92', 'papua barat', '92.02', 'manokwari'),
(504, '92', 'papua barat', '92.03', 'fak fak'),
(505, '92', 'papua barat', '92.04', 'sorong selatan'),
(506, '92', 'papua barat', '92.05', 'raja ampat'),
(507, '92', 'papua barat', '92.06', 'teluk bintuni'),
(508, '92', 'papua barat', '92.07', 'teluk wondama'),
(509, '92', 'papua barat', '92.08', 'kaimana'),
(510, '92', 'papua barat', '92.09', 'tambrauw'),
(511, '92', 'papua barat', '92.1', 'maybrat'),
(512, '92', 'papua barat', '92.11', 'manokwari selatan'),
(513, '92', 'papua barat', '92.12', 'pegunungan arfak'),
(514, '92', 'papua barat', '92.71', 'sorong kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL COMMENT '1 distributor, 2 reseller',
  `nama` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kodepos` varchar(8) NOT NULL,
  `telepon` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `id_member_upline` int(11) NOT NULL,
  `id_member_sponsor` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 baru, 1 confirm bayar, 2 active, 3 suspend, 4 hapus',
  `id_bank` varchar(4) NOT NULL,
  `nomor_rekening` varchar(32) NOT NULL,
  `nama_rekening` varchar(64) NOT NULL,
  `saldo_rupiah` int(11) NOT NULL,
  `saldo_poin` int(11) NOT NULL,
  `link_instagram` text NOT NULL,
  `link_lazada` text NOT NULL,
  `link_tokopedia` text NOT NULL,
  `link_bukalapak` text NOT NULL,
  `link_shopee` text NOT NULL,
  `link_blibli` text NOT NULL,
  `permalink` varchar(254) NOT NULL,
  `avatar` varchar(128) NOT NULL,
  `gambar_toko` varchar(32) NOT NULL,
  `kunjungan` int(11) NOT NULL,
  `bukti_transfer` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `level`, `nama`, `alamat`, `id_kota`, `kodepos`, `telepon`, `email`, `password`, `id_member_upline`, `id_member_sponsor`, `join_date`, `status`, `id_bank`, `nomor_rekening`, `nama_rekening`, `saldo_rupiah`, `saldo_poin`, `link_instagram`, `link_lazada`, `link_tokopedia`, `link_bukalapak`, `link_shopee`, `link_blibli`, `permalink`, `avatar`, `gambar_toko`, `kunjungan`, `bukti_transfer`) VALUES
(1, 1, 'Ugus Marugus', 'Karangmojo, Tasikmadu', 200, '57722', '08122334455667', 'ugus@gmail.com', '3599f8a8ca68ce5059721b818a6ba6fe', 0, 0, '2019-07-21', 2, '002', '22334455', 'Ugus Juga', 0, 12540, 'https://www.instagram.com/ndeso_family/', 'a', 'b', 'c', 'd', 'e', 'ugus-marugus', '', '', 38, ''),
(3, 1, 'Undis', 'aaaa', 3, '', '085227722053', 'undis@gmail.com', '338f06165f55b7f19ce417dd70043d9b', 0, 0, '2019-07-22', 0, '002', '242323', 'Night Sasongko', 0, 12, 'https://www.instagram.com/galnslery_fotografi_art_/', 'https://www.lazada.co.id/?spm=a2o4j.pdp.header.dhome.a5e4133bqxwjbr#', 'https://www.tokopedia.com/nsasongko-store?nref=shphead', 'https://www.bukalapak.com/?blca=SEBRA-BR-GEN-D-s&amp;blpt=SEBRA-BR-GEN-D-s&amp;gclid=CjwKCAjwpuXpBRAAEiwAyRRPgbigpxB-DjsqE_iDeOZcWQRhUmMR9AhVB4ov1Pm8UuOzUtHCY7oJtBoCwocQAvD_BwE&amp;sem=65884349968_1t1_1597133973_c_9056664_g_aud-550125406930:kwd-48053501828', 'https://shopee.co.id/?gclid=CjwKCAjwpuXpBRAAEiwAyRRPgeAGNssxVWqLKVW0_41rI0FebKL8aUe5Bsg65_CgAjiWXN5vlKeluBoC434QAvD_BwE', 'https://www.blibli.com/', 'undis-margundis', '20190822062109_4165.jpg', '20190822052835_1774.jpg', 36, ''),
(17, 1, 'Night Sasongko', '', 0, '', '', 'nn@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, '2019-08-26', 2, '008', '11111', 'Night Sasongko', 0, 0, 'https://www.instagram.com/galnslery_fotografi_art_/', 'https://www.lazada.co.id/?spm=a2o4j.pdp.header.dhome.a5e4133bqxwjbr#', '', '', '', '', 'night-sasongko', '20190826035617_6533.png', '20190826043606_5664.png', 37, '20190826033551_5815.png'),
(18, 1, 'Night Sasongko cc', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, '231', '085227722053', 'cc@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, '2019-08-27', 2, '002', '333', 'Night Sasongko', 0, 2, '', '', '', '', '', '', 'night-sasongko-cc', '', '', 3, '20190827065349_2728.jpg'),
(19, 1, 'Night Sasongko bb', 'xxx', 191, '', '085227722053', 'bb@gmail.com', '08f8e0260c64418510cefb2b06eee5cd', 0, 0, '2019-08-28', 2, '022', '45345888', 'Night Sasongko', 0, 0, 'https://www.instagram.com/galnslery_fotografi_art_/', 'laaaa', 'tkkk', 'bkkk', 'shhh', 'blll', 'night-sasongko-bb', '20190828015556_9138.jpg', '20190828015608_8986.jpg', 9, '20190828015304_6831.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_fee_promosi`
--

CREATE TABLE `mutasi_fee_promosi` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `sejumlah` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` varchar(254) NOT NULL,
  `plus_minus` tinyint(4) NOT NULL COMMENT '1 plus, 2 minus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_poin_member`
--

CREATE TABLE `mutasi_poin_member` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `sejumlah` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` varchar(254) NOT NULL,
  `plus_minus` tinyint(4) NOT NULL COMMENT '1 plus, 2 minus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mutasi_poin_member`
--

INSERT INTO `mutasi_poin_member` (`id`, `id_member`, `sejumlah`, `id_transaksi`, `posting_date`, `keterangan`, `plus_minus`) VALUES
(1, 3, 4, 24, '2019-08-22 10:38:48', 'Transaksi terbayar dari nomor transaksi: 1031', 1),
(2, 18, 2, 38, '2019-08-27 15:34:25', 'Transaksi terbayar dari nomor transaksi: 1047', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL,
  `departemen` int(11) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(254) NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `islogin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `departemen`, `jabatan`, `nama`, `email`, `isactive`, `islogin`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 1, 1, 'Super Admin', 'agung@agung.com', 1, 0),
(8, 'ekopurnomo', '285c701ec6c7ccce009424717c34da67', 1, 4, 'Eko Purnomo', 'eko@purnomo.com', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_image`
--

CREATE TABLE `produk_image` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `thumbnail` varchar(64) NOT NULL,
  `foto` varchar(64) NOT NULL,
  `img_width` int(11) NOT NULL,
  `img_height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_image`
--

INSERT INTO `produk_image` (`id`, `id_produk`, `thumbnail`, `foto`, `img_width`, `img_height`) VALUES
(2, 2, '20190808023202_9161_small.jpg', '20190808023202_9161.jpg', 600, 600),
(15, 3, '20190816024946_4331_small.jpg', '20190816024946_4331.jpg', 400, 400),
(16, 3, '20190816032654_8363_small.jpg', '20190816032654_8363.jpg', 400, 400),
(19, 1, '20190814033829_2689_small.jpg', '20190814033829_2689.jpg', 367, 265),
(20, 1, '20190828014949_8738_small.jpg', '20190828014949_8738.jpg', 877, 1241),
(21, 1, '20190828015311_3435_small.jpg', '20190828015311_3435.jpg', 877, 1241);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_item`
--

CREATE TABLE `produk_item` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_umum` int(11) NOT NULL,
  `harga_distributor` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `ishapus` tinyint(4) NOT NULL COMMENT '0 tidak, 1 terhapus',
  `permalink` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_item`
--

INSERT INTO `produk_item` (`id_produk`, `id_kategori`, `kode`, `nama`, `deskripsi`, `harga_umum`, `harga_distributor`, `berat`, `ishapus`, `permalink`) VALUES
(1, 1, 'KP', 'King Pandanus', 'King Pandanus is eye supplement drink, it can be consume directly overall from the bottle with orally. It easy to carried, practical and tasteful\r\n\r\nFunction of Active ingredients\r\n\r\nBeta- Karoten ( Pro-Vitamin A) \r\n- Help to changed  light molecule signal from retina to become image projection  in brain.\r\n- Help on metabolism retina cells & to adapt bright & dark condition\r\n\r\nAlfa- Tocopherol  ( Vitamin E)\r\n- Eye Protective to prevent degeneration cause of oxidative process\r\n- Help to decreace ocular pressure on eyes which can cause of Glaucoma disorder\r\n\r\nAscorbic Acid (Viitamin C) \r\n- Increase cell retina functions to visual improvement\r\n- To prevent inflamation process on eyes \r\n\r\nAntosianin\r\n- Neuroprotective Function\r\n- Help improve in night vision\r\n- Can Improve Tear Secretion \r\n\r\nEssential Fatty Acid ( Omega-3)\r\n- Maintan mouisture  level on eyes \r\n- Improve Sharpness of vision', 100000, 70000, 1, 0, 'king-pandanus'),
(2, 2, 'HS01', 'Air Magic', 'Proin rhoncus est in dolor congue, ut sodales augue condimentum. Nulla facilisi. Sed non felis vitae nisi varius iaculis. Nulla dui ex, gravida vitae mattis accumsan, tristique et lacus. Sed tincidunt magna at quam ornare, sodales fringilla odio pulvinar. Vestibulum eget suscipit massa. Nunc a urna metus. Fusce fringilla in mauris ut aliquam. In et lobortis ex.', 130000, 100000, 1, 0, 'air-magic'),
(3, 3, 'NF', 'Nano Fix Up', 'Solusi perawatan mobil all in one\r\n\r\nSolusi praktis mengatasi masalah pada permukaan cat mobil yang terkena goresan. Teknologi unik nano fiber dengan nano molekul yang diabsorbsi secara aktif mengkilapkan, menghilangkan dan memperbaiki kerusakan pada permukaan cat mobil.\r\n\r\nManfaat:\r\n1. Menghilangkan goresan kecil sampai goresan sedang pad permukaan cat mobil\r\n2. Mengatasi baret pada pegangan pintu\r\n3. Membersihkan kerak air pada kaca dan body mobil\r\n4. Mengangkat kerak kotoran burung\r\n5. Membersihkan oksidasi pada cat mobil yang menyebabkan warna kusam pada cat mobil\r\n6. Mengkilapkan kembali area chrome pada mobil\r\n\r\nCara Penggunaan:\r\n1. Cuci dan keringkan mobil\r\n2. Gunakan sarung tangan yang tersedia dalam kemasan nano fix up\r\n3. Gosok bagian yang ingin diperbaiki dengan menggunakan nano fix up\r\n4. Bersihkan dengan kain halus / micro fiber\r\n\r\nCara Penyimpanan:\r\n1. Kain nano fix up dapat dipergunakan kembali selama cairan nano fix up terdapat pada kain\r\n2. Lipat kain nano fix up dan masukkan ke dalam kemasan kemudian tutup seal dengan rapat\r\n3. Simpan di suhu ruangan yang tidak terpapar matahari secara langsung\r\n4. Maksimal waktu penyimpanan 3 tahun sejak pertama kali dipergunakan', 50000, 35000, 1, 0, 'nano-fix-up');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `permalink` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_kategori`
--

INSERT INTO `produk_kategori` (`id_kategori`, `nama`, `permalink`) VALUES
(1, 'Healthy Life', 'healthy-life'),
(2, 'Hygiene Sanitation', 'hygiene-sanitation'),
(3, 'Care', 'care');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_review`
--

CREATE TABLE `produk_review` (
  `id_review` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_orang` varchar(64) NOT NULL,
  `avatar` varchar(64) NOT NULL,
  `review` text NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_review`
--

INSERT INTO `produk_review` (`id_review`, `id_produk`, `nama_orang`, `avatar`, `review`, `posting_date`) VALUES
(1, 1, 'Vina Ndut', '20190815032516_6175.jpg', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text', '2019-08-14 14:41:52'),
(2, 1, 'Eko Purnomo', '20190815032451_4132.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', '2019-08-15 10:24:54'),
(3, 3, 'Sumardi', '20190815032655_2818.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '2019-08-15 10:26:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trail`
--

CREATE TABLE `trail` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `postingdate` datetime NOT NULL,
  `keterangan` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trail`
--

INSERT INTO `trail` (`id`, `userid`, `username`, `postingdate`, `keterangan`) VALUES
(1, 1, 'superadmin', '2019-07-18 10:32:06', 'Edit kategori produk: Coba 2x'),
(2, 1, 'superadmin', '2019-07-18 10:33:34', 'Menghapus kategori produk: Coba 2x'),
(3, 1, 'superadmin', '2019-07-18 10:33:44', 'Menghapus kategori produk: COba 4'),
(4, 1, 'superadmin', '2019-07-18 10:33:58', 'Edit kategori produk: Coba 2'),
(5, 1, 'superadmin', '2019-07-19 09:08:14', 'Login ke dashboard'),
(6, 1, 'superadmin', '2019-07-19 09:40:26', 'Tambah item produk: Indomie rebus'),
(7, 1, 'superadmin', '2019-07-19 09:42:07', 'Tambah item produk: Indomie mantap'),
(8, 1, 'superadmin', '2019-07-19 10:01:56', 'Tambah item produk: K101'),
(9, 1, 'superadmin', '2019-07-19 10:32:54', 'Edit item produk: Kecap manis mantap'),
(10, 1, 'superadmin', '2019-07-19 13:31:11', 'Login ke dashboard'),
(11, 1, 'superadmin', '2019-07-19 14:01:37', 'Menghapus item produk: Indomie mantap'),
(12, 1, 'superadmin', '2019-07-22 08:58:24', 'Login ke dashboard'),
(13, 1, 'superadmin', '2019-07-22 11:46:29', 'Edit kategori produk: Mie Instan'),
(14, 1, 'superadmin', '2019-07-22 11:46:43', 'Edit kategori produk: Sabun Cuci'),
(15, 1, 'superadmin', '2019-07-22 11:46:52', 'Edit kategori produk: Minyak Goreng'),
(16, 1, 'superadmin', '2019-07-22 11:48:03', 'Edit item produk: Tropical Minyak 2 Liter'),
(17, 1, 'superadmin', '2019-07-22 11:49:26', 'Tambah item produk: Bimoli Minyak Goreng'),
(18, 1, 'superadmin', '2019-07-22 11:50:18', 'Tambah item produk: Indomie Goreng'),
(19, 1, 'superadmin', '2019-07-22 11:51:06', 'Tambah item produk: Sedaap Mie Goreng'),
(20, 1, 'superadmin', '2019-07-22 11:52:06', 'Tambah item produk: Supermi Extra'),
(21, 1, 'superadmin', '2019-07-22 11:53:12', 'Tambah item produk: Rinso Anti Noda'),
(22, 1, 'superadmin', '2019-07-23 08:33:35', 'Login ke dashboard'),
(23, 1, 'superadmin', '2019-07-23 09:17:34', 'Menghapus/suspend member: Ugus Marugus'),
(24, 1, 'superadmin', '2019-07-23 09:19:10', 'Menghapus/suspend member: Ugus Marugus'),
(25, 1, 'superadmin', '2019-07-23 11:43:00', 'Edit member: '),
(26, 1, 'superadmin', '2019-07-23 11:43:57', 'Edit member: '),
(27, 1, 'superadmin', '2019-07-23 11:44:31', 'Edit member: '),
(28, 1, 'superadmin', '2019-07-23 11:44:59', 'Edit member: '),
(29, 1, 'superadmin', '2019-07-23 11:45:28', 'Edit member: Ugus Marugus'),
(30, 1, 'superadmin', '2019-07-23 11:46:18', 'Edit member: Ugus Marugus'),
(31, 1, 'superadmin', '2019-07-23 11:47:36', 'Edit member: Ugus Marugus'),
(32, 1, 'superadmin', '2019-07-23 11:47:52', 'Edit member: Ugus Marugus'),
(33, 1, 'superadmin', '2019-07-24 09:04:31', 'Login ke dashboard'),
(34, 1, 'superadmin', '2019-07-24 15:18:31', 'Login ke dashboard'),
(35, 1, 'superadmin', '2019-07-25 08:32:06', 'Login ke dashboard'),
(36, 1, 'superadmin', '2019-07-25 13:49:13', 'ubah status invoice id: 1, nomor: 1001'),
(37, 1, 'superadmin', '2019-07-25 13:53:23', 'ubah status invoice id: 1, nomor: 1001'),
(38, 1, 'superadmin', '2019-07-25 13:58:41', 'ubah status invoice id: 1, nomor: 1001'),
(39, 1, 'superadmin', '2019-07-25 14:07:48', 'Menghapus transaksi nomer trx: 1001'),
(40, 1, 'superadmin', '2019-07-25 14:37:57', 'ubah status invoice id: 2, nomor: 1002'),
(41, 1, 'superadmin', '2019-07-25 14:46:45', 'ubah status invoice id: 2, nomor: 1002'),
(42, 1, 'superadmin', '2019-07-25 14:50:36', 'ubah status invoice id: 1, nomor: 1001'),
(43, 1, 'superadmin', '2019-07-25 14:53:11', 'ubah status kirim id: 1, nomor: 1001'),
(44, 1, 'superadmin', '2019-07-25 14:54:25', 'ubah status kirim id: 2, nomor: 1002'),
(45, 1, 'superadmin', '2019-07-25 15:10:03', 'ubah status kirim id: 2, nomor: 1002'),
(46, 1, 'superadmin', '2019-07-25 15:10:58', 'ubah status kirim id: 2, nomor: 1002'),
(47, 1, 'superadmin', '2019-07-25 15:12:39', 'ubah status kirim id: 1, nomor: 1001'),
(48, 1, 'superadmin', '2019-07-25 15:13:00', 'ubah status kirim id: 1, nomor: 1001'),
(49, 1, 'superadmin', '2019-07-25 15:13:33', 'ubah status invoice id: 2, nomor: 1002'),
(50, 1, 'superadmin', '2019-07-25 15:13:43', 'ubah status invoice id: 2, nomor: 1002'),
(51, 1, 'superadmin', '2019-07-25 15:13:51', 'ubah status kirim id: 2, nomor: 1002'),
(52, 1, 'superadmin', '2019-07-25 15:14:09', 'ubah status kirim id: 2, nomor: 1002'),
(53, 1, 'superadmin', '2019-07-26 09:13:35', 'Login ke dashboard'),
(54, 1, 'superadmin', '2019-07-26 14:06:35', 'Login ke dashboard'),
(55, 1, 'superadmin', '2019-07-29 09:33:07', 'Login ke dashboard'),
(56, 1, 'superadmin', '2019-07-29 09:46:30', 'ubah status invoice id: 2, nomor: 1002'),
(57, 1, 'superadmin', '2019-07-29 10:28:11', 'Tambah event tutup poin: tes 1'),
(58, 1, 'superadmin', '2019-07-29 10:40:48', 'Edit event tutup poin: tes 2'),
(59, 1, 'superadmin', '2019-07-29 10:45:36', 'Menghapus tutup poin: tes 2'),
(60, 1, 'superadmin', '2019-07-29 10:53:10', 'Edit event tutup poin: Menyambut tahun baru'),
(61, 1, 'superadmin', '2019-07-29 13:32:00', 'Login ke dashboard'),
(62, 1, 'superadmin', '2019-07-29 13:32:14', 'Tambah event tutup poin: Coba coba'),
(63, 1, 'superadmin', '2019-07-29 14:37:03', 'Tambah hadiah event tutup poin: Kaos keren'),
(64, 1, 'superadmin', '2019-07-29 14:51:31', 'Tambah hadiah event tutup poin: Jam Dinding'),
(65, 1, 'superadmin', '2019-07-29 14:59:18', 'Login ke dashboard'),
(66, 1, 'superadmin', '2019-07-29 15:01:36', 'Tambah hadiah event tutup poin: Sepeda'),
(67, 1, 'superadmin', '2019-07-29 15:04:01', 'Login ke dashboard'),
(68, 1, 'superadmin', '2019-07-29 15:14:07', 'Tambah hadiah event tutup poin: tes'),
(69, 1, 'superadmin', '2019-07-30 08:37:14', 'Login ke dashboard'),
(70, 1, 'superadmin', '2019-08-06 14:36:34', 'Login ke dashboard'),
(71, 1, 'superadmin', '2019-08-07 09:26:52', 'Login ke dashboard'),
(72, 1, 'superadmin', '2019-08-08 09:21:46', 'Login ke dashboard'),
(73, 1, 'superadmin', '2019-08-08 09:27:04', 'Tambah kategori produk: Healthy Life'),
(74, 1, 'superadmin', '2019-08-08 09:27:23', 'Tambah kategori produk: Hygiene Sanitation'),
(75, 1, 'superadmin', '2019-08-08 09:27:37', 'Tambah kategori produk: Care'),
(76, 1, 'superadmin', '2019-08-08 09:31:09', 'Tambah item produk: King Pandannus'),
(77, 1, 'superadmin', '2019-08-08 09:32:04', 'Tambah item produk: Air Magic'),
(78, 1, 'superadmin', '2019-08-08 09:32:47', 'Tambah item produk: Nano FIx Up'),
(79, 1, 'superadmin', '2019-08-08 09:39:12', 'Edit item produk: King Pandannus'),
(80, 1, 'superadmin', '2019-08-09 09:28:06', 'Login ke dashboard'),
(81, 1, 'superadmin', '2019-08-09 10:39:18', 'Login ke dashboard'),
(82, 1, 'superadmin', '2019-08-14 10:18:40', 'Login ke dashboard'),
(83, 1, 'superadmin', '2019-08-14 10:29:43', 'Edit item produk: King Pandanus'),
(84, 1, 'superadmin', '2019-08-14 10:38:12', 'Edit item produk: King Pandanus'),
(85, 1, 'superadmin', '2019-08-14 10:38:31', 'Edit item produk: King Pandanus'),
(86, 1, 'superadmin', '2019-08-14 10:56:21', 'Edit item produk: King Pandanus'),
(87, 1, 'superadmin', '2019-08-15 10:24:00', 'Login ke dashboard'),
(88, 1, 'superadmin', '2019-08-15 10:24:54', 'Tambah review produk: Eko Purnomo'),
(89, 1, 'superadmin', '2019-08-15 10:25:18', 'Edit review produk: Vina Ndut'),
(90, 1, 'superadmin', '2019-08-15 10:26:58', 'Tambah review produk: Sumardi'),
(91, 1, 'superadmin', '2019-08-16 09:49:00', 'Login ke dashboard'),
(92, 1, 'superadmin', '2019-08-16 09:49:52', 'Edit item produk: Nano Fix Up'),
(93, 1, 'superadmin', '2019-08-16 10:09:34', 'Edit item produk: Nano Fix Up'),
(94, 1, 'superadmin', '2019-08-16 10:11:52', 'Edit item produk: Nano Fix Up'),
(95, 1, 'superadmin', '2019-08-16 10:23:51', 'Edit item produk: Nano Fix Up'),
(96, 1, 'superadmin', '2019-08-16 10:26:58', 'Edit item produk: Nano Fix Up'),
(97, 1, 'superadmin', '2019-08-16 16:27:20', 'Login ke dashboard'),
(98, 1, 'superadmin', '2019-08-20 08:55:37', 'Login ke dashboard'),
(99, 1, 'superadmin', '2019-08-22 10:09:46', 'Login ke dashboard'),
(100, 1, 'superadmin', '2019-08-22 10:38:48', 'ubah status invoice id: 24, nomor: 1031'),
(101, 1, 'superadmin', '2019-08-22 10:40:36', 'ubah status kirim id: 24, nomor: 1031'),
(102, 1, 'superadmin', '2019-08-22 14:25:32', 'Login ke dashboard'),
(103, 1, 'superadmin', '2019-08-22 14:53:18', 'Login ke dashboard'),
(104, 1, 'superadmin', '2019-08-26 10:18:17', 'Login ke dashboard'),
(105, 1, 'superadmin', '2019-08-26 10:34:30', 'Login ke dashboard'),
(106, 1, 'superadmin', '2019-08-26 10:36:53', 'Aktivasi member: Night Sasongko'),
(107, 1, 'superadmin', '2019-08-26 13:17:39', 'Login ke dashboard'),
(108, 1, 'superadmin', '2019-08-26 14:37:17', 'Login ke dashboard'),
(109, 1, 'superadmin', '2019-08-26 15:18:26', 'Login ke dashboard'),
(110, 1, 'superadmin', '2019-08-27 10:29:33', 'Login ke dashboard'),
(111, 1, 'superadmin', '2019-08-27 13:54:22', 'Login ke dashboard'),
(112, 1, 'superadmin', '2019-08-27 13:57:55', 'Aktivasi member: Night Sasongko cc'),
(113, 1, 'superadmin', '2019-08-27 15:34:25', 'ubah status invoice id: 38, nomor: 1047'),
(114, 1, 'superadmin', '2019-08-27 15:35:02', 'ubah status kirim id: 38, nomor: 1047'),
(115, 1, 'superadmin', '2019-08-27 15:43:18', 'ubah status invoice id: 39, nomor: 1048'),
(116, 1, 'superadmin', '2019-08-27 15:44:21', 'ubah status kirim id: 39, nomor: 1048'),
(117, 1, 'superadmin', '2019-08-27 15:57:18', 'ubah status invoice id: 40, nomor: 1049'),
(118, 1, 'superadmin', '2019-08-27 15:57:41', 'ubah status kirim id: 40, nomor: 1049'),
(119, 1, 'superadmin', '2019-08-28 08:47:30', 'Login ke dashboard'),
(120, 1, 'superadmin', '2019-08-28 08:48:06', 'Login ke dashboard'),
(121, 1, 'superadmin', '2019-08-28 08:49:52', 'Edit item produk: King Pandanus'),
(122, 1, 'superadmin', '2019-08-28 08:53:13', 'Edit item produk: King Pandanus'),
(123, 1, 'superadmin', '2019-08-28 08:54:30', 'Aktivasi member: Night Sasongko bb'),
(124, 1, 'superadmin', '2019-08-29 12:05:07', 'Login ke dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_trx_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `total_berat` float NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_trx_detail`, `id_transaksi`, `id_pembeli`, `id_produk`, `qty`, `harga_satuan`, `harga_total`, `total_berat`, `posting_date`) VALUES
(1, 2, 3, 1, 5, 70000, 350000, 1, '2019-08-15 11:48:26'),
(2, 3, 3, 1, 1, 70000, 70000, 1, '2019-08-15 11:49:11'),
(3, 4, 3, 3, 4, 35000, 140000, 1, '2019-08-15 11:50:27'),
(4, 5, 3, 1, 1, 70000, 70000, 1, '2019-08-15 12:01:10'),
(5, 6, 3, 2, 1, 100000, 100000, 1, '2019-08-15 12:01:45'),
(6, 7, 3, 1, 3, 70000, 210000, 1, '2019-08-15 15:18:21'),
(7, 7, 3, 2, 1, 100000, 100000, 1, '2019-08-15 15:18:21'),
(8, 8, 3, 3, 2, 35000, 70000, 1, '2019-08-16 10:38:50'),
(9, 8, 3, 1, 5, 70000, 350000, 1, '2019-08-16 10:38:50'),
(10, 8, 3, 2, 2, 100000, 200000, 1, '2019-08-16 10:38:50'),
(11, 9, 3, 1, 6, 70000, 420000, 1, '2019-08-16 10:48:22'),
(12, 10, 3, 2, 1, 100000, 100000, 1, '2019-08-16 10:58:06'),
(13, 10, 3, 2, 4, 100000, 400000, 1, '2019-08-16 10:58:06'),
(14, 11, 3, 1, 1, 70000, 70000, 1, '2019-08-19 16:52:45'),
(15, 12, 1, 1, 1, 70000, 70000, 1, '2019-08-20 10:46:06'),
(16, 13, 3, 1, 1, 70000, 70000, 1, '2019-08-20 15:53:54'),
(17, 14, 3, 2, 1, 100000, 100000, 1, '2019-08-20 15:54:10'),
(18, 15, 3, 1, 1, 70000, 70000, 1, '2019-08-20 16:03:25'),
(19, 16, 3, 1, 1, 70000, 70000, 1, '2019-08-20 19:06:30'),
(20, 16, 3, 2, 1, 100000, 100000, 1, '2019-08-20 19:06:30'),
(21, 17, 3, 1, 1, 70000, 70000, 1, '2019-08-20 19:07:01'),
(22, 18, 3, 3, 1, 35000, 35000, 1, '2019-08-20 19:07:19'),
(23, 19, 3, 2, 1, 100000, 100000, 1, '2019-08-20 19:07:46'),
(24, 20, 3, 1, 7, 70000, 490000, 1, '2019-08-21 09:57:13'),
(25, 20, 3, 1, 1, 70000, 70000, 1, '2019-08-21 09:57:13'),
(26, 20, 3, 2, 4, 100000, 400000, 1, '2019-08-21 09:57:13'),
(27, 21, 3, 2, 1, 100000, 100000, 1, '2019-08-21 13:51:39'),
(28, 21, 3, 1, 4, 70000, 280000, 1, '2019-08-21 13:51:39'),
(29, 22, 3, 1, 1, 70000, 70000, 1, '2019-08-21 16:07:31'),
(30, 23, 3, 1, 8, 70000, 560000, 1, '2019-08-21 16:07:50'),
(31, 24, 3, 1, 2, 70000, 140000, 1, '2019-08-22 10:07:20'),
(32, 24, 3, 2, 3, 100000, 300000, 1, '2019-08-22 10:07:20'),
(33, 25, 3, 1, 1, 70000, 70000, 1, '2019-08-22 12:29:16'),
(34, 25, 3, 2, 2, 100000, 200000, 1, '2019-08-22 12:29:16'),
(35, 26, 3, 1, 2, 70000, 140000, 1, '2019-08-22 12:56:13'),
(36, 27, 3, 1, 2, 70000, 140000, 1, '2019-08-23 13:25:59'),
(37, 28, 3, 1, 3, 70000, 210000, 1, '2019-08-23 16:50:04'),
(38, 29, 3, 1, 4, 70000, 280000, 1, '2019-08-23 16:56:07'),
(39, 30, 3, 1, 1, 70000, 70000, 1, '2019-08-26 09:45:24'),
(40, 31, 17, 1, 1, 70000, 70000, 1, '2019-08-26 10:37:49'),
(41, 31, 17, 2, 3, 100000, 300000, 1, '2019-08-26 10:37:49'),
(42, 32, 17, 2, 1, 100000, 100000, 1, '2019-08-26 11:30:38'),
(43, 33, 17, 1, 3, 70000, 210000, 1, '2019-08-26 11:35:27'),
(44, 34, 17, 1, 3, 70000, 210000, 1, '2019-08-27 10:31:41'),
(45, 34, 17, 2, 1, 100000, 100000, 1, '2019-08-27 10:31:41'),
(46, 35, 17, 2, 1, 100000, 100000, 1, '2019-08-27 10:32:38'),
(47, 36, 17, 1, 2, 70000, 140000, 1, '2019-08-27 13:15:42'),
(48, 37, 18, 1, 3, 70000, 210000, 1, '2019-08-27 14:58:01'),
(49, 38, 18, 3, 7, 35000, 245000, 1, '2019-08-27 15:09:19'),
(50, 39, 18, 1, 1, 70000, 70000, 1, '2019-08-27 15:40:40'),
(51, 40, 18, 3, 1, 35000, 35000, 1, '2019-08-27 15:56:38'),
(52, 41, 19, 2, 3, 100000, 300000, 1, '2019-08-28 16:31:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_umum`
--

CREATE TABLE `transaksi_umum` (
  `id_transaksi` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nomor_transaksi` varchar(32) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_kurir` int(11) NOT NULL,
  `total_harga_dan_kurir` int(11) NOT NULL,
  `fee_transaksi` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `status_bayar` tinyint(4) NOT NULL COMMENT '0 baru, 1 pembayaran berhasil, 2 pembayaran gagal, 3 pembayaran pending, 4 request konfirmasi pembayaran',
  `tanggal_bayar` datetime NOT NULL,
  `nomor_bukti_bayar` varchar(32) NOT NULL,
  `nama_pembayar` varchar(64) NOT NULL,
  `payment_method` varchar(32) NOT NULL,
  `instansi_pembayaran` varchar(32) NOT NULL COMMENT 'nama bank atau nama cc dll',
  `kode_bank` varchar(4) NOT NULL,
  `nomor_rekening` varchar(32) NOT NULL,
  `nama_rekening` varchar(64) NOT NULL,
  `trxid_midtrans` varchar(64) NOT NULL,
  `nama_penerima` varchar(64) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `id_kota_penerima` int(11) NOT NULL,
  `kodepos_penerima` int(11) NOT NULL,
  `telepon_penerima` varchar(32) NOT NULL,
  `is_hapus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: dihapus',
  `status_checkout` tinyint(4) NOT NULL COMMENT '0: belum, 1: sudah',
  `id_kurir` int(11) NOT NULL,
  `layanan_kurir` varchar(128) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `status_kirim` tinyint(4) NOT NULL COMMENT '0: baru, 1: terkirim, 2: diterima',
  `no_resi_pengiriman` varchar(64) NOT NULL,
  `file_bukti_bayar` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_umum`
--

INSERT INTO `transaksi_umum` (`id_transaksi`, `id_member`, `posting_date`, `nomor_transaksi`, `total_harga`, `total_kurir`, `total_harga_dan_kurir`, `fee_transaksi`, `total_tagihan`, `status_bayar`, `tanggal_bayar`, `nomor_bukti_bayar`, `nama_pembayar`, `payment_method`, `instansi_pembayaran`, `kode_bank`, `nomor_rekening`, `nama_rekening`, `trxid_midtrans`, `nama_penerima`, `alamat_penerima`, `id_kota_penerima`, `kodepos_penerima`, `telepon_penerima`, `is_hapus`, `status_checkout`, `id_kurir`, `layanan_kurir`, `tgl_kirim`, `tgl_terima`, `status_kirim`, `no_resi_pengiriman`, `file_bukti_bayar`) VALUES
(5, 3, '0000-00-00 00:00:00', '1004', 70000, 0, 70000, 0, 70000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(6, 3, '0000-00-00 00:00:00', '1005', 100000, 0, 100000, 0, 100000, 0, '0000-00-00 00:00:00', '', '', '', '', '002', '242323', 'Night Sasongko', '', 'Undis', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 0, '085227722053', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', 'brand-logo.png'),
(7, 3, '0000-00-00 00:00:00', '1006', 310000, 0, 310000, 0, 310000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(8, 3, '0000-00-00 00:00:00', '1007', 620000, 0, 620000, 0, 620000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(9, 3, '0000-00-00 00:00:00', '1008', 420000, 0, 420000, 0, 420000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(10, 3, '0000-00-00 00:00:00', '1009', 500000, 0, 500000, 0, 500000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(11, 3, '2019-08-19 16:52:45', '1010', 70000, 0, 70000, 0, 70000, 0, '0000-00-00 00:00:00', '', '', '', '', '002', '242323', 'Night Sasongko', '', 'Undis', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 0, '085227722053', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', 'brand-logo.png'),
(12, 1, '2019-08-20 10:46:06', '1011', 70000, 0, 70000, 0, 70000, 4, '0000-00-00 00:00:00', '', '', '', '', '002', '22334455', 'Ugus Juga', '', 'Ugus Marugus', 'Karangmojo, Tasikmadu', 200, 444, '08122334455667', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190826032414_4827.png'),
(13, 3, '2019-08-20 15:53:54', '1012', 70000, 0, 70000, 0, 70000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(14, 3, '2019-08-20 15:54:10', '1013', 100000, 0, 100000, 0, 100000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(15, 3, '2019-08-20 16:03:25', '1014', 70000, 0, 70000, 0, 70000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(16, 3, '2019-08-20 19:06:30', '1015', 170000, 0, 170000, 0, 170000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(17, 3, '2019-08-20 19:07:01', '1016', 70000, 0, 70000, 0, 70000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(18, 3, '2019-08-20 19:07:19', '1017', 35000, 0, 35000, 0, 35000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(19, 3, '2019-08-20 19:07:46', '1018', 100000, 0, 100000, 0, 100000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(20, 3, '2019-08-21 09:57:13', '1019', 960000, 0, 960000, 0, 960000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(21, 3, '2019-08-21 13:51:39', '1020', 380000, 0, 380000, 0, 380000, 4, '0000-00-00 00:00:00', '', '', '', '', '002', '242323', 'Night Sasongko', '', 'Undis', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 777, '085227722053', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', 'brand-logo.png'),
(22, 3, '2019-08-21 16:07:31', '1028', 70000, 0, 70000, 0, 70000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(23, 3, '2019-08-21 16:07:50', '1029', 560000, 0, 560000, 0, 560000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', 'brand-logo.png'),
(24, 3, '2019-08-22 10:07:20', '1031', 440000, 0, 440000, 0, 440000, 1, '0000-00-00 00:00:00', '', '', '', '', '002', '242323', 'Night Sasongko', '', 'Undis', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 123, '085227722053', 0, 0, 0, '', '2019-08-21', '0000-00-00', 2, '', 'brand-logo.png'),
(25, 3, '2019-08-22 12:29:16', '1032', 270000, 0, 270000, 0, 270000, 4, '0000-00-00 00:00:00', '', '', '', '', '002', '242323', 'Night Sasongko', '', 'Undis', 'aaaa', 3, 3333, '085227722053', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190822055237_7951.jpg'),
(26, 3, '2019-08-22 12:56:13', '1033', 140000, 0, 140000, 0, 140000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190822062129_8251.jpg'),
(27, 3, '2019-08-23 13:25:59', '1034', 140000, 0, 140000, 0, 140000, 4, '0000-00-00 00:00:00', '', '', '', '', '002', '242323', 'Night Sasongko', '', 'Undis', 'aaaa', 3, 4444, '085227722053', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190823062650_4821.jpg'),
(28, 3, '2019-08-23 16:50:04', '1035', 210000, 0, 210000, 0, 210000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(29, 3, '2019-08-23 16:56:07', '1036', 280000, 0, 280000, 0, 280000, 1, '0000-00-00 00:00:00', '', '', '', '', '002', '234', 'rsfd', '', 'fsdf', 'sdf', 3, 24, '768', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190823095621_5356.png'),
(30, 3, '2019-08-26 09:45:24', '1037', 70000, 0, 70000, 0, 70000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190826024943_9679.PNG'),
(34, 17, '2019-08-27 10:31:41', '1043', 310000, 0, 310000, 0, 310000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190827034341_2376.png'),
(35, 17, '2019-08-27 10:32:38', '1044', 100000, 0, 100000, 0, 100000, 4, '0000-00-00 00:00:00', '', '', '', '', '008', '11111', 'Night Sasongko', '', 'Night Sasongko', 'xxxxxxxxxxxxx', 15, 0, '8888888888888', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', ''),
(36, 17, '2019-08-27 13:15:42', '1045', 140000, 0, 140000, 0, 140000, 4, '0000-00-00 00:00:00', '', '', '', '', '008', '11111', 'Night Sasongko', '', 'Night Sasongko', 'xxxxxx', 6, 111111, '00000000', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190827061821_6286.jpg'),
(37, 18, '2019-08-27 14:58:01', '1046', 210000, 0, 210000, 0, 210000, 4, '0000-00-00 00:00:00', '', '', '', '', '002', '333', 'Night Sasongko', '', 'Night Sasongko cc', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 2147483647, '085227722053', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '20190827075929_4539.jpg'),
(38, 18, '2019-08-27 15:09:19', '1047', 245000, 0, 245000, 0, 245000, 1, '0000-00-00 00:00:00', '', '', '', '', '002', '333', 'Night Sasongko', '', 'Night Sasongko cc', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 33, '085227722053', 0, 0, 0, '', '2019-08-27', '0000-00-00', 2, '', '20190827083339_6966.jpg'),
(39, 18, '2019-08-27 15:40:40', '1048', 70000, 0, 70000, 0, 70000, 1, '0000-00-00 00:00:00', '', '', '', '', '002', '333', 'Night Sasongko', '', 'Night Sasongko cc', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 777, '085227722053', 0, 0, 0, '', '2019-08-27', '0000-00-00', 2, '', '20190827084219_6747.jpg'),
(40, 18, '2019-08-27 15:56:38', '1049', 35000, 0, 35000, 0, 35000, 1, '0000-00-00 00:00:00', '', '', '', '', '002', '333', 'Night Sasongko', '', 'Night Sasongko cc', 'Manggisan Permai RT.06 RW.07 Kel.Mudal, Kec.Mojotengah, Kab.Wonosobo', 3, 888, '085227722053', 0, 0, 0, '', '2019-08-27', '0000-00-00', 2, '', '20190827085649_1689.jpg'),
(41, 19, '2019-08-28 16:31:37', '1051', 300000, 0, 300000, 0, 300000, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, '', '0000-00-00', '0000-00-00', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_urutan`
--

CREATE TABLE `transaksi_urutan` (
  `id` int(11) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_urutan`
--

INSERT INTO `transaksi_urutan` (`id`, `urutan`) VALUES
(1, 1052);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutup_poin_detail`
--

CREATE TABLE `tutup_poin_detail` (
  `id_detail` int(11) NOT NULL,
  `id_umum` int(11) NOT NULL,
  `nama_hadiah` varchar(254) NOT NULL,
  `thumbnail` varchar(254) NOT NULL,
  `gambar` varchar(254) NOT NULL,
  `poin_min` int(11) NOT NULL,
  `poin_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutup_poin_umum`
--

CREATE TABLE `tutup_poin_umum` (
  `id_umum` int(11) NOT NULL,
  `title` varchar(254) NOT NULL,
  `is_finished` tinyint(4) NOT NULL COMMENT '0 belum, 1 udah selesai',
  `tgl_pelaksanaan` date NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `permalink` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_privilege`
--

CREATE TABLE `user_privilege` (
  `id` int(11) NOT NULL,
  `idpengguna` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `lihat` tinyint(4) NOT NULL,
  `tambah` tinyint(4) NOT NULL,
  `ubah` tinyint(4) NOT NULL,
  `hapus` tinyint(4) NOT NULL,
  `isprovide` tinyint(4) NOT NULL,
  `isapprove` tinyint(4) NOT NULL,
  `isrelease` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_privilege`
--

INSERT INTO `user_privilege` (`id`, `idpengguna`, `idarea`, `lihat`, `tambah`, `ubah`, `hapus`, `isprovide`, `isapprove`, `isrelease`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 7, 1, 1, 1, 1, 1, 1, 1),
(18, 8, 1, 0, 0, 0, 0, 0, 0, 0),
(19, 8, 2, 0, 0, 0, 0, 0, 0, 0),
(20, 8, 3, 0, 0, 0, 0, 0, 0, 0),
(22, 8, 7, 0, 0, 0, 0, 0, 0, 0),
(66, 1, 13, 1, 1, 1, 1, 1, 1, 1),
(84, 8, 13, 0, 0, 0, 0, 0, 0, 0),
(85, 1, 14, 1, 1, 1, 1, 1, 1, 1),
(86, 1, 15, 1, 1, 1, 1, 0, 0, 0),
(87, 8, 14, 0, 0, 0, 0, 0, 0, 0),
(88, 8, 15, 1, 1, 1, 1, 0, 0, 0),
(89, 1, 16, 1, 1, 1, 1, 0, 0, 0),
(90, 8, 16, 1, 1, 1, 1, 0, 0, 0),
(91, 1, 17, 1, 1, 1, 1, 0, 0, 0),
(92, 8, 17, 1, 1, 1, 1, 0, 0, 0),
(93, 1, 18, 1, 1, 1, 1, 0, 0, 0),
(94, 1, 19, 1, 1, 1, 1, 1, 1, 1),
(95, 1, 20, 1, 1, 1, 1, 1, 1, 1),
(96, 1, 21, 1, 1, 1, 1, 0, 0, 0),
(97, 1, 22, 1, 1, 1, 1, 0, 0, 0),
(98, 8, 18, 1, 1, 1, 1, 0, 0, 0),
(99, 8, 19, 1, 1, 1, 1, 0, 0, 0),
(100, 8, 20, 1, 1, 1, 1, 0, 0, 0),
(101, 8, 21, 1, 1, 1, 1, 0, 0, 0),
(102, 8, 22, 1, 1, 1, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `area_tugas`
--
ALTER TABLE `area_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_list`
--
ALTER TABLE `bank_list`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `def_privilege`
--
ALTER TABLE `def_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_shipping`
--
ALTER TABLE `master_shipping`
  ADD PRIMARY KEY (`id_master_shipping`);

--
-- Indeks untuk tabel `master_wilayah`
--
ALTER TABLE `master_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `mutasi_fee_promosi`
--
ALTER TABLE `mutasi_fee_promosi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutasi_poin_member`
--
ALTER TABLE `mutasi_poin_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_image`
--
ALTER TABLE `produk_image`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_item`
--
ALTER TABLE `produk_item`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk_review`
--
ALTER TABLE `produk_review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `trail`
--
ALTER TABLE `trail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_trx_detail`);

--
-- Indeks untuk tabel `transaksi_umum`
--
ALTER TABLE `transaksi_umum`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi_urutan`
--
ALTER TABLE `transaksi_urutan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tutup_poin_detail`
--
ALTER TABLE `tutup_poin_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tutup_poin_umum`
--
ALTER TABLE `tutup_poin_umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- Indeks untuk tabel `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `area_tugas`
--
ALTER TABLE `area_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `def_privilege`
--
ALTER TABLE `def_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_shipping`
--
ALTER TABLE `master_shipping`
  MODIFY `id_master_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `master_wilayah`
--
ALTER TABLE `master_wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mutasi_fee_promosi`
--
ALTER TABLE `mutasi_fee_promosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mutasi_poin_member`
--
ALTER TABLE `mutasi_poin_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk_image`
--
ALTER TABLE `produk_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `produk_item`
--
ALTER TABLE `produk_item`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_review`
--
ALTER TABLE `produk_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `trail`
--
ALTER TABLE `trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_trx_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `transaksi_umum`
--
ALTER TABLE `transaksi_umum`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `transaksi_urutan`
--
ALTER TABLE `transaksi_urutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tutup_poin_detail`
--
ALTER TABLE `tutup_poin_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tutup_poin_umum`
--
ALTER TABLE `tutup_poin_umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
