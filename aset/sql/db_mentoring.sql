-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2014 at 07:30 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mentoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE IF NOT EXISTS `tb_agenda` (
  `id_agenda` int(3) NOT NULL,
  `tgl_agenda` date DEFAULT NULL,
  `jenis_agenda` varchar(35) DEFAULT NULL,
  `informasi` text,
  `id_panitia` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `tgl_agenda`, `jenis_agenda`, `informasi`, `id_panitia`) VALUES
(100, '2014-09-08', 'Global', 'bjkahfjkga kfuakdhjbchkjxb hkajbhxkad', '11000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE IF NOT EXISTS `tb_akun` (
  `id_akun` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `id_panitia` varchar(5) DEFAULT NULL,
  `id_pementor` char(5) DEFAULT NULL,
  `id_peserta` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_akun`),
  KEY `id_panitia` (`id_panitia`),
  KEY `id_pementor` (`id_pementor`),
  KEY `id_peserta` (`id_peserta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `username`, `password`, `id_panitia`, `id_pementor`, `id_peserta`) VALUES
(60, 'admin', 'admin', NULL, '2', NULL),
(100, 'rian', '1', NULL, NULL, 1),
(101, 'nitya', '12345', NULL, NULL, 2),
(102, 'rianx', '12345', NULL, NULL, 3),
(105, 'nitya', '12345', NULL, NULL, 4),
(106, '133010009', '133010009', NULL, NULL, 37);

-- --------------------------------------------------------

--
-- Table structure for table `tb_honor`
--

CREATE TABLE IF NOT EXISTS `tb_honor` (
  `id_honor` int(4) NOT NULL,
  `besar_honor` int(7) DEFAULT NULL,
  `jenis_honor` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_honor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_honor`
--

INSERT INTO `tb_honor` (`id_honor`, `besar_honor`, `jenis_honor`) VALUES
(1, 100000, 'Pengajar'),
(2, 15000, 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` char(5) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam` char(11) DEFAULT NULL,
  `kelompok` varchar(5) DEFAULT NULL,
  `id_pementor` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `tb_jadwal_ibfk_1` (`id_pementor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `hari`, `jam`, `kelompok`, `id_pementor`) VALUES
('0111', 'Senin', '08.00-09.00', '1', '2'),
('0112', 'Senin', '08.00-09.00', '2', '2'),
('0113', 'Senin', '08.00-09.00', '3', '2'),
('0121', 'Senin', '09.00-10.00', '1', '2'),
('0122', 'Senin', '09.00-10.00', '2', '2'),
('0123', 'Senin', '09.00-10.00', '3', '2'),
('0124', 'Senin', '09.00-10.00', '4', '2'),
('0131', 'Senin', '10.00-11.00', '1', '2'),
('0132', 'Senin', '10.00-11.00', '2', '2'),
('0133', 'Senin', '10.00-11.00', '3', '2'),
('1111', 'Senin', '08.00-09.00', '1', '2'),
('1112', 'Senin', '08.00-09.00', '2', '2'),
('1113', 'Senin', '08.00-09.00', '3', '2'),
('1114', 'Senin', '08.00-09.00', '4', '2'),
('1115', 'Senin', '08.00-09.00', '5', '2'),
('1121', 'Senin', '09.00-10.00', '1', '2'),
('1122', 'Senin', '09.00-10.00', '2', '2'),
('1123', 'Senin', '09.00-10.00', '3', '2'),
('1124', 'Senin', '09.00-10.00', '4', '2'),
('1125', 'Senin', '09.00-10.00', '5', '2'),
('1131', 'Senin', '10.00-11.00', '1', '2'),
('1132', 'Senin', '10.00-11.00', '2', '2'),
('1133', 'Senin', '10.00-11.00', '3', '2'),
('1134', 'Senin', '10.00-11.00', '4', '2'),
('1135', 'Senin', '10.00-11.00', '5', '2'),
('1141', 'Senin', '13.00-14.00', '1', '2'),
('1142', 'Senin', '13.00-14.00', '2', '2'),
('1143', 'Senin', '13.00-14.00', '3', '2'),
('1144', 'Senin', '13.00-14.00', '4', '2'),
('1145', 'Senin', '13.00-14.00', '5', '2'),
('1211', 'Selasa', '08.00-09.00', '1', '2'),
('1212', 'Selasa', '08.00-09.00', '2', '2'),
('1213', 'Selasa', '08.00-09.00', '3', '2'),
('1214', 'Selasa', '08.00-09.00', '4', '2'),
('1215', 'Selasa', '08.00-09.00', '5', '2'),
('1221', 'Selasa', '09.00-10.00', '1', '2'),
('1222', 'Selasa', '09.00-10.00', '2', '2'),
('223', 'Selasa', '09.00-10.00', '3', '2'),
('224', 'Selasa', '09.00-10.00', '4', '2'),
('225', 'Selasa', '09.00-10.00', '5', '2'),
('231', 'Selasa', '10.00-11.00', '1', '2'),
('232', 'Selasa', '10.00-11.00', '2', '2'),
('233', 'Selasa', '10.00-11.00', '3', '2'),
('234', 'Selasa', '10.00-11.00', '4', '2'),
('235', 'Selasa', '10.00-11.00', '5', '2'),
('241', 'Selasa', '13.00-14.00', '1', '2'),
('242', 'Selasa', '13.00-14.00', '2', '2'),
('243', 'Selasa', '13.00-14.00', '3', '2'),
('244', 'Selasa', '13.00-14.00', '4', '2'),
('245', 'Selasa', '13.00-14.00', '5', '2'),
('311', 'Rabu', '08.00-09.00', '1', '2'),
('312', 'Rabu', '08.00-09.00', '2', '2'),
('313', 'Rabu', '08.00-09.00', '3', '2'),
('314', 'Rabu', '08.00-09.00', '4', '2'),
('315', 'Rabu', '08.00-09.00', '5', '2'),
('321', 'Rabu', '09.00-10.00', '1', '2'),
('322', 'Rabu', '09.00-10.00', '2', '2'),
('323', 'Rabu', '09.00-10.00', '3', '2'),
('324', 'Rabu', '09.00-10.00', '4', '2'),
('325', 'Rabu', '09.00-10.00', '5', '2'),
('331', 'Rabu', '10.00-11.00', '1', '2'),
('332', 'Rabu', '10.00-11.00', '2', '2'),
('333', 'Rabu', '10.00-11.00', '3', '2'),
('334', 'Rabu', '10.00-11.00', '4', '2'),
('335', 'Rabu', '10.00-11.00', '5', '2'),
('341', 'Rabu', '13.00-14.00', '1', '2'),
('342', 'Rabu', '13.00-14.00', '2', '2'),
('343', 'Rabu', '13.00-14.00', '3', '2'),
('344', 'Rabu', '13.00-14.00', '4', '2'),
('345', 'Rabu', '13.00-14.00', '5', '2'),
('411', 'Kamis', '08.00-09.00', '1', '2'),
('412', 'Kamis', '08.00-09.00', '2', '2'),
('413', 'Kamis', '08.00-09.00', '3', '2'),
('414', 'Kamis', '08.00-09.00', '4', '2'),
('415', 'Kamis', '08.00-09.00', '5', '2'),
('421', 'Kamis', '09.00-10.00', '1', '2'),
('422', 'Kamis', '09.00-10.00', '2', '2'),
('423', 'Kamis', '09.00-10.00', '3', '2'),
('424', 'Kamis', '09.00-10.00', '4', '2'),
('425', 'Kamis', '09.00-10.00', '5', '2'),
('431', 'Kamis', '10.00-11.00', '1', '2'),
('432', 'Kamis', '10.00-11.00', '2', '2'),
('433', 'Kamis', '10.00-11.00', '3', '2'),
('434', 'Kamis', '10.00-11.00', '4', '2'),
('435', 'Kamis', '10.00-11.00', '5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `nrp` varchar(9) NOT NULL,
  `nama_mahasiswa` varchar(35) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `fakultas` varchar(30) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nrp`, `nama_mahasiswa`, `jurusan`, `fakultas`, `jenis_kelamin`, `kontak`, `alamat`, `kota`) VALUES
('113020036', 'Nitya', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '08262727272', 'Jln Mekar', 'Kendari'),
('113030039', 'Feri Etrawan', 'Teknik Mesin', 'Fakultas Teknik', 'L', '089012345678', 'Psir Inpun, Cicaheum', 'Bandung'),
('113040150', 'Iqbal ', 'Teknik Informatika', 'Fakultas Teknik', 'L', '085756603194', 'Jln Mekar No 25 I', 'Kendari'),
('113040233', 'Siti Fauzia Khairunnisa', 'Teknik Informatika', 'Fakultas Teknik', 'P', '09809897831', 'Padalarang', 'Bandung'),
('113040234', 'Guskar', 'Teknik Informatika', 'Fakultas Teknik', 'L', '0898989892', 'Jl. Setiabudi No. 193', 'Bandung'),
('113040257', 'Mohamad Rahmatuloh', 'Teknik Informatika', 'Teknik', 'L', '081220485102', 'Gegerkalong Tengah No. 50', 'Bandung'),
('123010137', 'Diana Rizky A. ', 'Teknik Industri', 'Fakultas Teknik', 'L', '0817867617671', 'Cipasnas', 'Cianjur'),
('123020001', 'Anis Matta', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020002', 'Kira', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020003', 'Itachi', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020004', 'Sasuke', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020005', 'Bryan', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020006', 'Roger', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020007', 'Pressman', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020008', 'Tobi', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020009', 'Madara', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020010', 'Senju', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020011', 'Hashirama', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020012', 'Uciha', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020013', 'Ichigo', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020014', 'Obito', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020015', 'Kakashi', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020016', 'Luffy', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020017', 'Tifatul Sembiring', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123020062', 'Yoga Purnama N.', 'Teknologi Pangan', 'Fakultas Teknik', 'L', '089786735615', 'Gg. Sempit', 'Jakarta'),
('123020101', 'Anis Hamidah ', 'Teknologi Pangan', 'Fakultas Teknik', 'P', '09927489729', 'Sukasari', 'Cibeo'),
('123040226', 'Riansyah', 'Teknologi Informatika', 'Fakultas Teknik', 'L', '085756603194', 'Jln Mekar', 'Kendari'),
('133010001', 'TEDI RESTIADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010002', 'MUHAMMAD REZA PRIMAYANDI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010003', 'GALIH NUR MUHAMAD', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010004', 'SUPARMAN FAIZAL', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010005', 'RIDWAN MAULANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010006', 'AGUNG GUMELAR', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010007', 'SABILA FIRDAUS', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010008', 'MOCH NURHIDAYAT', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010009', 'GILANG ALGHIFARI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010010', 'DIDIK ARIYANTO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010011', 'SEPTIAN PUJA MAHARDIKA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010012', 'GYA MARSELA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010013', 'AGUNG ADITYA FEBRI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010014', 'ADITYA RIZKI PRASETYO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010015', 'YULIAWATI GUSWARA PUTRI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010016', 'BRAM LODEWIJK PICAULY', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010017', 'SEFTIAN IRHAF', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010018', 'ABYAN HAFIZH RAIHAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010019', 'MOCH RIFQY NURFAZA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010020', 'YOPI MARLAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010021', 'DYAN MAHARDIKA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010022', 'AYU KHARISMA PUTRI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010024', 'HANIFAH FAUZIYAH NIBRAS', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010025', 'TITO KURNIAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010027', 'RADEN SABRINA EVANS', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010028', 'RADEN MUHAMMAD YUSUF KURNIA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010029', 'RIYAN SULISTYAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010030', 'MEGA SUKARNAPUTRI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010031', 'REZA PUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010032', 'RIZKA DWI OKTAVIANA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010033', 'JUNJUNAN RAMADHAN ARYADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010034', 'ASEP HIDAYAT HS', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010035', 'GISCHA YUSTISIA SLAMET TRINAND', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010036', 'ROBY MULYADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010037', 'TRISNA WIKI PERMANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010039', 'DANI RAMDANI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010040', 'WAHYU NUGROHO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010041', 'MUHAMMAD REXY SAPTARI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010042', 'TAUFIK SATRIAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010043', 'LENI LISTIANAWATI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010044', 'NURUL MAGFIRA HARFI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010045', 'BUDIMAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010047', 'AGAM SEFTIAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010048', 'DICKY RANDA P', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010049', 'IRVAN NURDIANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010050', 'SUCAHYO PRASETYONO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010051', 'MUHAMMAD RIDHOTULLAH SAIDA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010052', 'JULIAN SURYA KUSUMAH PRAJA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010053', 'NOVIK IRMAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010054', 'FACHRY ANDARA SUKMA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010055', 'EDWIN FADEL MUHAMMAD', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010056', 'MUHAMAD MASYKUR', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010057', 'RENDY FEBRIAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010058', 'RIA ELISABET TAMPUBOLON', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010059', 'HERIN SEPTIAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010060', 'RIZAL PACHLEVI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010061', 'AMMAR NATSIR', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010062', 'INDRI RAMADIANSYAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010063', 'AKMAL AKHMADIPURA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010064', 'SATRIO TAUFIK INDARMAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010065', 'REVINDO DARMA PRATAMA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010066', 'YOGA AGUNG PRATAMA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010067', 'TB NAWIR GALBY', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010068', 'DEDEN YUSUF', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010069', 'AHMAD FADHILAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010070', 'CEPI SUPRIADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010071', 'CHAKRA DANISHAWARA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010073', 'SUWARDI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010074', 'ETHANTO LAIL HAKIM', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010075', 'CEPY CHURNIANTO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010076', 'DYAH RARA AYU PANDANWANGI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010077', 'DHIA MALIKA REYHANANDAR', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010078', 'JAUDAT WAFA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010079', 'BAGUS WIDANTOKO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010080', 'THIO YUSHARDIANSYAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010081', 'MOCH. FAUZI NURRAMDHAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010082', 'EKO FIRMAN FADILAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010083', 'NELLA INFANDI YOLANDA DEVI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010084', 'ASEP MEI NURIANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010085', 'M. YUSA BADRU TAMAM', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010086', 'MOHAMMAD ANDRIE ANCER RIDWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010087', 'AGUNG ROCHMAT', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010088', 'HERMANTO RAMADHAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010089', 'ADHIYA KANDIANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010090', 'ACENG KURNIA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010091', 'IBRAHIM FAHMI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010092', 'ALFIAN ANDI FATULLAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010093', 'ENDRIYANTO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010094', 'EKA ROMANTIKA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010095', 'NOVA PUSPITASARI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010096', 'AKHMAD YUSUF SUBAGJA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010097', 'RULI SEPTIAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010098', 'KHARISMA SUYUDI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010099', 'EKA PERMANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010100', 'YAYANG WIJAYA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010101', 'FAUZY RAMDHANI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010102', 'RIAN RAMDHANI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010103', 'ROSYIHAN ANWAR', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010104', 'DAVID PRAKOSO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010105', 'DIKI SOPANDI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010106', 'GERI YOLANDA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010107', 'IRFANDANI EKA BUDI PRATOMO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010108', 'ATIKA SATIARIDA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010109', 'MUHAMMAD ZULFAH FAUZAN SUKARNA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010110', 'ASEP SYAMSUDDIN ABDUL CHOLIQ', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010111', 'DIAN AJI PERMANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010112', 'LUTFI ALFIRAZ', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010113', 'ANTO INGDRIANTO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010114', 'BABY TASYA HANAAN', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010115', 'THEO RIZKY PRANATA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010116', 'NAILATUS SAFA''AH', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010117', 'AGI SUHARYADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010118', 'DENI SUHERLAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010119', 'HAMKA DWI PUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010120', 'DESI SOLEKHA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010121', 'SAFIRA AUDINA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010122', 'INDRA HENDRAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010123', 'ISFAN FAJAR SAWITO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010124', 'HASTIA MAULIDAH', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010125', 'FIKRY', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010126', 'GIA RIDWAN RAMADHAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010127', 'MUHAMMA AZHAR NURFAUZI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010128', 'MILA FATMAWATI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010129', 'NURUL IMAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010130', 'GIAN AGUNG DWI PUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010131', 'RANDY KURNIAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010132', 'MUHAMAD HARIZ YUDHA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010133', 'OGI NADA SAPUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010134', 'MOCHAMAD NIZAR ZUL FAHMI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010135', 'A. MALIK FAJAR H', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010136', 'SANDI RAHAYU', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010137', 'MUHARDI ARI AFDHAL', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010138', 'RIZKY MAULANA PUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010139', 'MUHAMAD IRFAI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010140', 'NURUDIN RAHMAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010141', 'DIDIH BUDIANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010142', 'TRI PUSPITA SARI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010143', 'TIODOVA SATRIA WIDODO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010144', 'ANDIKA PERMANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010145', 'JULDI SYARA ROMDANI KOSIM', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010146', 'NADIA INDIRA PURI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010147', 'VEBINA SHEILA PASHA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010148', 'YURI ERDIANSYAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010149', 'RADEN MUHAMAD SEPTIANA ISKANDA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010150', 'PUSPITA SARI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010151', 'LUTHFIA LISMAWAN SUWANDI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010152', 'WINA AYU WIFTIANI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010153', 'ALIEF IBNUWIBOWO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010154', 'CANDRA RESTU PAKARTI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010155', 'TRUELY ANUGRAH UTAMA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010156', 'ADI MAIDA SUHAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010157', 'HERRY YULIANTO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010158', 'IWALDI EBEN EZER V. SIMAREMARE', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010159', 'JAYANTI MONALISA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010160', 'MUH. AFIF ALAUDDIN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010161', 'RADEN MUHAMAD HIRAWAN RAMDANI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010162', 'ADHADI FARIJAL YUNUS', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010164', 'TIA WAHYUNI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010165', 'ABU DODO SUARYO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010166', 'MOHAMAD YOHANDI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010167', 'MUHAMMAD SALMAN AL-AZIZ', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010168', 'RINTO PRIBADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010169', 'TRY PRIATNA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010170', 'MUHAMAD PARID', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010171', 'DHAFIN HERJAYA PUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010172', 'SAYID GHAFAR', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010173', 'RIFQI ROFIEQ', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010174', 'RIZALDI MUTAQIN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010175', 'JAJANG NURJAMAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010176', 'EKO FITRIANTO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010177', 'FEBY ANISYARA SUCITRA', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010178', 'MUHAMMAD DIMAS FARHAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010179', 'MUHAMMAD HARISZ RYADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010180', 'SUWANDIN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010181', 'R.RIZKY AKBAR AHMAD NOER', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010182', 'IKA ASTUTI HANDAYANI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010183', 'RISKY SUCIARINI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010184', 'ASKAR BAHARI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010185', 'AHMAD FAISAL NURCHOLIS', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010186', 'GEGEN PERMADA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010187', 'IRFAN MARSYAL NUGRAHA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010188', 'ANDI MUHAMAD RIKMAN WIJAYA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010189', 'AYU NOVA RAHMAWATI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010190', 'IMAN TAUFIK', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010191', 'SANDRA ALLIYUSUFI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010192', 'MUHAMAD ILHAM RISMAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010193', 'SUDIATI NURLITASARI', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010194', 'REZA DOVIANDA PUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010195', 'LABIB LUKMAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010196', 'WIRA WIJAYA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010197', 'LUKMAN HAKIM', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010198', 'IMAN WIGUNA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010199', 'WAHID GUNAWAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010200', 'GELLIS BERLIAN ANJARA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010201', 'RAHMAD TRI MULYADI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010202', 'MUHAMMAD ABDURRAHMAN NAUFAL', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010203', 'YUDI SURYATNO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010204', 'VARIAN ASHARI MUHAMAD', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010205', 'RIZKI FAISAL OKTAVIANSYAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010206', 'RANGGA NUGRAHA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010207', 'IQBAL MUHSAL Y,', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010208', 'REGINA SITUMORANG', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010209', 'POLOS ANGGOLA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010210', 'FAHMYNUR CAHYANTO', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010211', 'ARIF RAHMAN HARDIAN', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010212', 'RANDI NUGRAHA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010213', 'MUHAMAD MUJIB AJIJI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010214', 'MUHAMAD INDRA PERMANA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010215', 'ACEP DANI KUSUMA WARDI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010216', 'RIZKY JATNIKA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010217', 'RIFKY MUHAMAD JUDIT PUTRA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010218', 'ASEP NASRUDIN SAEROJI', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010219', 'RIVALDA NUGRAHA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010220', 'AGUNG NUGRAHA', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010221', 'ENOK SOFIANDI BAHARI DALOK SAR', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010222', 'GHINA AFIFAH', 'Teknik Industri', NULL, 'P', NULL, NULL, NULL),
('133010223', 'WILDAN FIRMANSYAH', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133010224', 'WIRA AKHSANAL', 'Teknik Industri', NULL, 'L', NULL, NULL, NULL),
('133020002', 'BELLA NURHALIZA', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020003', 'ADINDA PUTRI DWI NINGRUM', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020004', 'SHABIRAH FITRIANI FEBRIANTY', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020005', 'ADELLA NUR NOVIANTY', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020006', 'SINTA WINDRIANI DEWI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020007', 'SHANNI HAADII NUR SHALEH', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020008', 'MESTIKA UTAMI WULANDARI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020009', 'MELISA PUTRI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020010', 'RIRI RISTIFARI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020011', 'FHANZY SAEPUL RACHMAT', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020012', 'FITRIA RAHAYU', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020013', 'RAGA PADILA MULYANA', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020014', 'ITA PUSPITASARI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020015', 'DEDE IRFAN', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020016', 'RIMA NUARY RAHMA', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020017', 'M. RIZKI SUBAGJA', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020018', 'MUHAMAD BAHRUL ULUM', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020019', 'R. AFINA NUR FATIMAH', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020020', 'R. RONI ADHI WICAKSONO', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020021', 'WINDA ARIYANI RAHAYU', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020022', 'ERFIN APRILIAN SYACH', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020023', 'INDAH SULASTRI SUMARNO', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020024', 'ADITYA EKA NUGRAHA', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020025', 'PUTRI FITRIYANTI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020026', 'KRISDIAN SOBANDA', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020027', 'CINDY SONIA YURISTINA', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020028', 'REDYKE EGANANDA', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020029', 'DEVI INDRIYANI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020030', 'RIZKY WIRANI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020031', 'ASRI WULANDARI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020032', 'ISHARDI NUR FATHURACHMAN', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020033', 'DESY TRESNAPUTRI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020034', 'MUHAMMAD ABDUSYAKIR', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020035', 'HANA HANDAYANI ZHAFIRAH', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020036', 'NURSYIFA AMALIA', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020037', 'HENDRUE NURFALAH', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020038', 'SAEPUL NURMUHTADIN', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020039', 'IRMA ROSMAYANTI', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020040', 'ZAHRA SHAFIYAH MARDIANA', 'Teknologi Pangan', NULL, 'P', NULL, NULL, NULL),
('133020041', 'FAUZAN PRATAMA ADITYA', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL),
('133020042', 'RAMADIANSYAH', 'Teknologi Pangan', NULL, 'L', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE IF NOT EXISTS `tb_materi` (
  `id_materi` int(3) NOT NULL,
  `no_bab` int(3) DEFAULT NULL,
  `topik` varchar(50) DEFAULT NULL,
  `isi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `no_bab`, `topik`, `isi`) VALUES
(100, 1, 'Thaharah', 'http://www.dopbox.co/bla/taharah.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(3) NOT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `bobot_nilai` int(11) DEFAULT NULL,
  `id_peserta` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `tb_nilai_ibfk_1` (`id_peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `kategori`, `bobot_nilai`, `id_peserta`) VALUES
(1, 'tugas 1', 87, 1),
(2, 'tugas 2', 90, 1),
(3, 'quis 1', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_panitia`
--

CREATE TABLE IF NOT EXISTS `tb_panitia` (
  `id_panitia` varchar(5) NOT NULL,
  `nrp` varchar(9) DEFAULT NULL,
  `jabatan` varchar(35) DEFAULT NULL,
  `id_honor` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_panitia`),
  KEY `id_honor` (`id_honor`),
  KEY `nrp` (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_panitia`
--

INSERT INTO `tb_panitia` (`id_panitia`, `nrp`, `jabatan`, `id_honor`) VALUES
('11000', '113020036', 'Kordinator Mentoring', 1),
('11001', '113020036', 'Sekretariat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pementor`
--

CREATE TABLE IF NOT EXISTS `tb_pementor` (
  `id_pementor` char(5) NOT NULL,
  `nrp` varchar(10) DEFAULT NULL,
  `id_honor` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_pementor`),
  KEY `tb_pementor_ibfk_1` (`nrp`),
  KEY `id_honor` (`id_honor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pementor`
--

INSERT INTO `tb_pementor` (`id_pementor`, `nrp`, `id_honor`) VALUES
('2', '113030039', 1),
('5', '113040257', 1),
('6', '123020062', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_peserta` (
  `id_peserta` int(5) NOT NULL AUTO_INCREMENT,
  `nrp` varchar(9) DEFAULT NULL,
  `id_jadwal` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`),
  KEY `tb_peserta_ibfk_1` (`nrp`),
  KEY `tb_peserta_ibfk_2` (`id_jadwal`),
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `nrp`, `id_jadwal`) VALUES
(1, '113020036', '1111'),
(2, '113040233', '1111'),
(3, '123010137', '1111'),
(4, '123020002', '1112'),
(5, '123020003', '1112'),
(6, '123020004', '1112'),
(7, '123020005', '1112'),
(8, '123020006', '1112'),
(9, '123020007', '1112'),
(10, '123020008', '1112'),
(11, '123020009', '1112'),
(12, '123020012', '1111'),
(13, '123020013', '1111'),
(14, '123020014', '1111'),
(15, '123020015', '1111'),
(16, '123020016', '1111'),
(17, '123020017', '1111'),
(18, '123020101', '1111'),
(19, '123040226', '1112'),
(21, '113040150', '0111'),
(24, '123020001', NULL),
(25, '123020010', NULL),
(26, '113040234', NULL),
(27, '123020011', NULL),
(28, '133010001', NULL),
(29, '113040234', '0121'),
(30, '133010002', NULL),
(31, '133010003', NULL),
(32, '133010004', NULL),
(33, '133010005', NULL),
(34, '133010006', NULL),
(35, '133010007', NULL),
(36, '133010008', NULL),
(37, '133010009', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE IF NOT EXISTS `tb_presensi` (
  `pertemuan` int(3) DEFAULT NULL,
  `status_kehadiran` varchar(10) DEFAULT NULL,
  `id_presensi` int(3) NOT NULL,
  `id_peserta` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pementor` char(5) DEFAULT NULL,
  `berita_acara` text,
  `id_jadwal` char(5) DEFAULT NULL,
  `id_materi` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_presensi`),
  KEY `tb_presensi_ibfk_1` (`id_peserta`),
  KEY `id_materi` (`id_materi`),
  KEY `id_jadwal` (`id_jadwal`),
  KEY `id_pementor` (`id_pementor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_presensi`
--

INSERT INTO `tb_presensi` (`pertemuan`, `status_kehadiran`, `id_presensi`, `id_peserta`, `tanggal`, `id_pementor`, `berita_acara`, `id_jadwal`, `id_materi`) VALUES
(1, 'Hadir', 1, 1, '2014-09-02', '5', 'pada pertemuan ini membahas tentang tharah', '0111', 100),
(2, 'Absen', 2, 1, '2014-09-09', '5', 'Pada pertemuan ini membahas tentang kesalahan membaca qur''an', '0111', 100),
(3, 'Hadir', 3, 1, '2014-09-16', '5', 'Pada pertemuan ini membahas tentang fiqih shalat', '0111', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_saran`
--

CREATE TABLE IF NOT EXISTS `tb_saran` (
  `id_saran` int(5) NOT NULL AUTO_INCREMENT,
  `kategori_saran` varchar(30) DEFAULT NULL,
  `isi_saran` text,
  `id_peserta` int(5) DEFAULT NULL,
  `id_pementor` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_saran`),
  KEY `tb_komplain_ibfk_1` (`id_peserta`),
  KEY `tb_komplain_ibfk_2` (`id_pementor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_saran`
--

INSERT INTO `tb_saran` (`id_saran`, `kategori_saran`, `isi_saran`, `id_peserta`, `id_pementor`) VALUES
(2, 'KBM', 'woy mentor sing beneeeeeeeeeer', 1, NULL),
(3, NULL, 'halo kawan', 1, NULL),
(9, NULL, 'mentoringnya garing', 1, NULL),
(10, NULL, 'mentoringnya jelek', 1, NULL),
(11, NULL, 'biji pementornya', 1, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD CONSTRAINT `tb_agenda_ibfk_1` FOREIGN KEY (`id_panitia`) REFERENCES `tb_panitia` (`id_panitia`);

--
-- Constraints for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD CONSTRAINT `tb_akun_ibfk_1` FOREIGN KEY (`id_panitia`) REFERENCES `tb_panitia` (`id_panitia`),
  ADD CONSTRAINT `tb_akun_ibfk_2` FOREIGN KEY (`id_pementor`) REFERENCES `tb_pementor` (`id_pementor`),
  ADD CONSTRAINT `tb_akun_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta` (`id_peserta`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`id_pementor`) REFERENCES `tb_pementor` (`id_pementor`);

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta` (`id_peserta`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_panitia`
--
ALTER TABLE `tb_panitia`
  ADD CONSTRAINT `tb_panitia_ibfk_1` FOREIGN KEY (`id_honor`) REFERENCES `tb_honor` (`id_honor`),
  ADD CONSTRAINT `tb_panitia_ibfk_2` FOREIGN KEY (`nrp`) REFERENCES `tb_mahasiswa` (`nrp`);

--
-- Constraints for table `tb_pementor`
--
ALTER TABLE `tb_pementor`
  ADD CONSTRAINT `tb_pementor_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `tb_mahasiswa` (`nrp`),
  ADD CONSTRAINT `tb_pementor_ibfk_2` FOREIGN KEY (`id_honor`) REFERENCES `tb_honor` (`id_honor`);

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `tb_peserta_ibfk_11` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peserta_ibfk_8` FOREIGN KEY (`nrp`) REFERENCES `tb_mahasiswa` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `tb_presensi_ibfk_8` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta` (`id_peserta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_presensi_ibfk_2` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`),
  ADD CONSTRAINT `tb_presensi_ibfk_4` FOREIGN KEY (`id_pementor`) REFERENCES `tb_pementor` (`id_pementor`),
  ADD CONSTRAINT `tb_presensi_ibfk_7` FOREIGN KEY (`id_jadwal`) REFERENCES `tb_jadwal` (`id_jadwal`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_saran`
--
ALTER TABLE `tb_saran`
  ADD CONSTRAINT `tb_saran_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta` (`id_peserta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_saran_ibfk_2` FOREIGN KEY (`id_pementor`) REFERENCES `tb_pementor` (`id_pementor`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
