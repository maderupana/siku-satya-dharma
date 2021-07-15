-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 03:28 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistie`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan','','','') NOT NULL,
  `noidentitas` varchar(50) NOT NULL,
  `Instansi` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `notlf` varchar(13) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `foto` varchar(125) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `tgl_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `nama`, `jk`, `noidentitas`, `Instansi`, `alamat`, `notlf`, `pekerjaan`, `foto`, `status`, `tgl_daftar`) VALUES
(5, 'Nurmantara Rangga Galih Pangestu', 'Laki-Laki', '17011154', 'UNDIKSHA', 'Jl. Jelantik Gingsir Nomor. 17, Suksada Buleleng', '0856392223', 'Makan', '5b95f434ae9c7.jpg', 'Aktif', '2018-09-09'),
(6, 'I Wayan Gunung', 'Laki-Laki', '3232323', 'Soidas', 'Kejrekr', '3232', 'Sdfkd', '5baef5a4b97da.jpg', 'Aktif', '2018-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbdp`
--

CREATE TABLE `tbdp` (
  `id_dp` int(11) NOT NULL,
  `id_harga` int(11) DEFAULT NULL,
  `nim` int(25) DEFAULT NULL,
  `dp` varchar(125) DEFAULT NULL,
  `tglbyr_dp` datetime DEFAULT NULL,
  `bukti_dp` varchar(255) DEFAULT NULL,
  `bank` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdp`
--

INSERT INTO `tbdp` (`id_dp`, `id_harga`, `nim`, `dp`, `tglbyr_dp`, `bukti_dp`, `bank`) VALUES
(7, 30, 18011028, '3000000', '2019-04-16 13:36:30', '5cb56a6e493c3.jpg', 'BPR'),
(8, 30, 18021003, '3000000', '2019-04-16 13:39:57', '5cb56aad7e794.jpg', 'BPR'),
(9, 30, 18011002, '3000000', '2019-04-16 13:40:19', '5cb56ac32e97d.jpg', 'BRI'),
(10, 30, 18021015, '3000000', '2019-04-16 13:40:43', '5cb56adb7438d.jpg', ''),
(11, 30, 18011154, '3000000', '2019-04-16 13:41:43', '5ccfadb63924c.jpg', 'BPD'),
(12, 30, 18011001, '3000000', '2019-05-16 09:24:56', '5cdcbbe8bd038.png', 'BRI');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`idkategori`, `kategori`) VALUES
(15, 'Buku'),
(16, 'Jurnal'),
(17, 'Skripsi'),
(18, 'Tugas Akhir'),
(19, 'Tesis'),
(22, 'Majalah ');

-- --------------------------------------------------------

--
-- Table structure for table `tbkeuangan`
--

CREATE TABLE `tbkeuangan` (
  `idcash` int(11) NOT NULL,
  `uang_masuk` varchar(25) NOT NULL,
  `uang_keluar` varchar(25) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkoleksi`
--

CREATE TABLE `tbkoleksi` (
  `id` int(11) NOT NULL,
  `id_koleksi` varchar(25) NOT NULL,
  `kode_koleksi` varchar(25) NOT NULL,
  `isbn` varchar(125) DEFAULT NULL,
  `judul` varchar(225) NOT NULL,
  `pengarang1` varchar(225) DEFAULT NULL,
  `pengarang2` varchar(225) NOT NULL,
  `editor` varchar(125) DEFAULT NULL,
  `penerjemah` varchar(125) DEFAULT NULL,
  `kota_terbit` varchar(125) DEFAULT NULL,
  `penerbit` varchar(55) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `foto` varchar(125) NOT NULL,
  `copies` int(11) NOT NULL,
  `sisa_copies` int(11) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `jenis_buku` varchar(25) DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `cetakan` varchar(25) DEFAULT NULL,
  `edisi` varchar(25) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkoleksi`
--

INSERT INTO `tbkoleksi` (`id`, `id_koleksi`, `kode_koleksi`, `isbn`, `judul`, `pengarang1`, `pengarang2`, `editor`, `penerjemah`, `kota_terbit`, `penerbit`, `tahun_terbit`, `foto`, `copies`, `sisa_copies`, `deskripsi`, `jenis_buku`, `kategori`, `cetakan`, `edisi`, `Status`, `tgl_update`) VALUES
(1, 'K-0001', '338.5', '978-979-769-483-8', 'EKONOMI MANAJERIAL DENGAN PENDEKATAN MATEMATIS', 'Tasman, Aulia', 'Tasman, Aulia', 'Nugroho, Arissetyanto', '-', 'Depok', 'Rajawali Pers', 2018, '5b9bdfe156755.jpeg', 1, 1, 'Buku Ekonomi Manajerial', 'EKONOMI', 'Buku', '5', 'Revisi', 'Tersedia', '2018-09-14'),
(2, 'K-0002', '658.5', '978-979-061-553-3', 'MANAJEMEN OPERASI: MANAJEMEN KEBERLANGSUNGAN DAN RANTAI PASOKAN', 'Heizer, Jay', 'Heizer, Jay', 'Halim, Dedy A.', 'Karunia, Hirson', 'Jakarta', 'Salemba Empat', 2017, '5b9bdeecea5ac.jpg', 5, 5, 'Buku Manajemen Operasi', 'MANAJEMEN', 'Buku', '3', '11', 'Tersedia', '2018-09-14'),
(3, 'K-0003', '658.81', '979-638-817-6', 'MANAJEMEN PEMASARAN; JIL. 1', 'Kotler, Philip', 'Kotler, Philip', '-', 'Molan, Benyamin', 'Jakarta', 'Indeks', 2017, '5b9be0157645c.jpeg', 1, 1, 'Manajemen Pemasaran', 'MANAJEMEN', 'Buku', '-', '12', 'Tersedia', '2018-09-14'),
(4, 'K-0004', '658.81', '978-0-13-600998-6', 'MANAJEMEN PEMASARAN; JIL. 1', 'Kotler, Philip', 'Kotler, Philip', 'Maulana, Adi', 'Sabran, Bob', 'Jakarta', 'Erlangga', 2009, '5b9be055822a8.jpeg', 1, 1, 'Manajemen Pemasaran', 'MANAJEMEN', 'Buku', '-', '13', 'Tersedia', '2018-09-14'),
(5, 'K-0005', '658.81', '978-0-13-600998-6', 'MANAJEMEN PEMASARAN; JIL. 2', 'Kotler, Philip', 'Kotler, Philip', 'Maulana, Adi', 'Sabran, Bob', 'Jakarta', 'Erlangga', 2009, '5b9be072e2bec.jpeg', 1, 1, 'Manajemen Pemasaran', 'MANAJEMEN', 'Buku', '-', '13', 'Tersedia', '2018-09-14'),
(6, 'K-0006', '658.3', '978-979-061-052-1', 'MANAJEMEN SUMBER DAYA MANUSIA: MENCAPAI KEUNGGULAN BERSAING; BUKU 1', 'Noe, Raymond A.', 'Noe, Raymond A.', '-', 'Wijaya, David', 'Jakarta', 'Salemba Empat', 2014, '5b9bdf34e20a7.jpg', 4, 4, 'MSDM', 'MANAJEMEN', 'Buku', '6', '6', 'Tersedia', '2018-09-14'),
(7, 'K-0007', '658.3', '978-979-061-053-8', 'MANAJEMEN SUMBER DAYA MANUSIA: MENCAPAI KEUNGGULAN BERSAING; BUKU 2', 'Noe, Raymond A.', 'Noe, Raymond A.', '-', 'Wijaya, David', 'Jakarta', 'Salemba Empat', 2014, '5b9bdf1c34dd6.jpeg', 5, 5, 'MSDM', 'MANAJEMEN', 'Buku', '-', '6', 'Tersedia', '2018-09-14'),
(8, 'K-0008', '339', '978-979-061-779-7', 'PENGANTAR EKONOMI MAKRO', 'Mainkiw, N. Gregory', 'Mainkiw, N. Gregory', '-', 'Sungkono, Chriswan', 'Jakarta', 'Salemba Empat', 2018, '5b9bdf5c39f73.jpeg', 2, 2, 'Makro Ekonomi', 'EKONOMI', 'Buku', '-', '7', 'Tersedia', '2018-09-14'),
(9, 'K-0009', '304', '978-979-061-515-1', 'PERILAKU ORGANISASI', 'Robbins, Stephen P.', 'Robbins, Stephen P.', '-', 'Saraswati, Ratna', 'Jakarta', 'Salemba Empat', 2017, '5b9bdf91c802b.jpg', 2, 2, 'Perilaku Organisasi', 'EKONOMI', 'Buku', '6', '16', 'Tersedia', '2018-09-14'),
(10, 'K-0010', '658.3', '979-526-022-7', 'MANAJEMEN SUMBER DAYA MANUSIA: SUATU PENDEKATAN MAKRO', 'Barthos, Basir', 'Barthos, Basir', '-', '-', 'Jakarta', 'Bumi Aksara', 2012, '5b9bdebff4220.jpg', 13, 13, 'MSDM', 'MANAJEMEN', 'Buku', '9', '1', 'Tersedia', '2018-09-14'),
(11, 'K-0011', '658.5', '978-979-061-773-5', 'MANAJEMEN OPERASI: KONSEP DAN APLIKASI', 'Martono, Ricky Virona', 'Martono, Ricky Virona', '-', '-', 'Jakarta', 'Salemba Empat', 2014, '5b9c605c78ca4.jpg', 2, 2, 'Buku Manajemen operasi', 'MANAJEMEN', 'Buku', '-', '-', 'Tersedia', '2018-09-15'),
(12, 'K-0012', '658.3', '978-979-769-917-8', 'MANAJEMEN SUMBER DAYA MANUSIA: TEORI &amp; PRAKTIK', 'Kasmir', '-', '-', '-', 'Jakarta', 'Rajawali Pers', 2016, '5b9c6278a6d5b.jpg', 2, 2, 'MSDM', 'MANAJEMEN', 'Buku', '-', '1', 'Tersedia', '2018-09-15'),
(13, 'K-0013', '658.81', '978-602-9324-72-3', 'MANAJEMEN PEMASARAN JASA', 'Sunyoto, Danang', 'Susanti, Fathonah Eka', 'Admojo, Tri', '-', 'Yogyakarta', 'CAPS', 2015, '5b9c65e01618c.jpg', 1, 1, 'Manajemen Pemasaran Jasa', 'MANAJEMEN', 'Buku', '1', '-', 'Tersedia', '2018-09-15'),
(14, 'K-0014', '337', '978-979-061-468-0', 'EKONOMI INTERNASIONAL; BUKU 2', 'Salvatore, Dominick', '-', '-', 'Hartanto, Romi Bhakti', 'Jakarta', 'Salemba Empat', 2014, '5b9c67887f064.jpg', 2, 2, 'Ekonomi Internasional', 'EKONOMI', 'Buku', '-', '9', 'Tersedia', '2018-09-15'),
(15, 'K-0015', '332.1', '978-979-769-467-8', 'MANAJEMEN PERBANKAN', 'Kasmir', '-', '-', '-', 'Jakarta', 'Rajawali Pers', 2012, '5b9c6863f194c.jpg', 8, 8, 'Manajemen Perbankan', 'MANAJEMEN', 'Buku', '-', 'Revisi', 'Tersedia', '2018-09-15'),
(16, 'K-0016', '658.8', '978-979-061-741-4', 'MANAJEMEN RESIKI: PRINSIP, PENERAPAN DAN PENELITIAN', 'Rustam, Bambang Rianto', '-', '-', '-', 'Jakarta', 'Salemba Empat', 2018, '5b9c69696387d.jpg', 2, 2, 'Manajemen Resiko', 'MANAJEMEN', 'Buku', '2', '-', 'Tersedia', '2018-09-15'),
(17, 'K-0017', '658.81', '978-979-29-5829-4', 'MANAJEMEN PEMASARAN: TEORI &amp; IMPLEMENTASI', 'Sudaryono', '-', 'Sigit', '-', 'Yogyakarta', 'ANDI', 2016, '5b9c6afda66e1.jpg', 2, 2, 'Manajemen Pemasaran', 'MANAJEMEN', 'Buku', '-', '1', 'Tersedia', '2018-09-15'),
(18, 'K-0018', '658.83', '978-602-031-921-6', 'RISET PEMASARAN', 'Rangkuti, Freddy', '-', '-', '-', 'Jakarta', 'Gramedia', 2015, '5b9c6bfcda61d.jpg', 3, 3, 'Riset Pemasaran', 'MANAJEMEN', 'Buku', '12', '-', 'Tersedia', '2018-09-15'),
(19, 'K-0019', '658.81', '979-683-173-2', 'MANAJEMEN PEMASARAN JASA', 'Lovelock, Christoper', 'Wright, Lauren K.', 'Samosir, Marianto', 'Widyantoro, Agus', 'Jakarta', 'Indeks', 2007, '5b9c6e4c2d158.jpg', 2, 2, 'Manajemen Pemasaran', 'MANAJEMEN', 'Buku', '2', '-', 'Tersedia', '2018-09-15'),
(20, 'K-0020', '658.401', '978-979-061-693-6', 'MANAJEMEN STRATEGIK: SUATU PENDEKATAN KEUNGGULAN BERSAING- KOSEP', 'David, Fred R.', 'David, Forest R.', 'Halim, Dedy A.', 'Puspasari, Novita', 'Jakarta', 'Salemba Empat', 2017, '5b9c7061bc99e.jpg', 2, 2, 'Manajemen Strategik', 'MANAJEMEN', 'Buku', '-', '15', 'Tersedia', '2018-09-15'),
(21, 'K-0021', '658.81', '979-421-115-x', 'MANAJEMEN PEMASARAN', 'Assauri, Sofjan', '-', '-', '-', 'Jakarta', 'Rajawali Pers', 2014, '5b9c723a90005.jpg', 3, 3, 'Manajemen Pemasaran', 'MANAJEMEN', 'Buku', '13', '1', 'Tersedia', '2018-09-15'),
(22, 'K-0022', '338.5', '978-979-061-766-7', 'EKONOMI ( BUKU 1: MAKRO )', 'Parkin, Michael', '-', 'Halim, Dedy A.', '-', 'Jakarta', 'Salemba Empat', 2017, '5b9c7380ecda0.jpg', 2, 2, 'Ekonomi Makro', 'EKONOMI', 'Buku', '-', '11', 'Tersedia', '2018-09-15'),
(23, 'K-0023', '658.87', '978-979-061-538-0', 'MANAJEMEN RITEL: STRATEGI DAN IMPLEMENTASI OPERASIONAL BISNIS RITEL MODERN DI INDONESIA', 'Utami, Christina Whidya', '-', 'Suharsi, Ema Sri', '-', 'Jakarta', 'Salemba Empat', 2017, '5b9c74d936e3a.jpg', 2, 2, 'Manajemen Ritel', 'MANAJEMEN', 'Buku', '-', '3', 'Tersedia', '2018-09-15'),
(24, 'K-0024', '658.3', '978-979-061-533-5', 'MANAJEMEN SUMBER DAYA MANUSIA: HUMAN RESOURCES MANAGEMENT', 'Dessler, Gary', '-', 'Masykur, Muhammad', 'Angelica, Diana', 'Jakarta', 'Salemba Empat', 2017, '5b9c7b6891e17.jpg', 1, 1, 'MSDM', 'MANAJEMEN', 'Buku', '4', '14', 'Tersedia', '2018-09-15'),
(25, 'K-0025', '338.5', '978-602-0946-07-8', 'EKONOMI MANAJERIAL &amp; STRATEGI BISNIS', 'Mubarok, E. Saefuddin', '-', '-', '-', 'Jakarta', 'In Media', 2015, '5b9c7d0228904.jpg', 1, 1, 'Ekonomi Manajerial', 'EKONOMI', 'Buku', '-', '-', 'Tersedia', '2018-09-15'),
(26, 'K-0026', '658.31', '978-602-289-240-3', 'PENGEMBANGAN MANAJEMEN: MEMPERSIAPKAN DAN MENGEMBANGKAN CALON DAN MANAJER YANG EFEKTIF', 'Kaswan', '-', '-', '-', 'Bandung', 'Alfabeta', 2016, '5b9c7e4a79050.jpg', 2, 2, 'Pengembangan Manajemen', 'MANAJEMEN', 'Buku', '-', '-', 'Tersedia', '2018-09-15'),
(27, 'K-0027', '658', '979-562-704-3', 'PENGANTAR MANAJEMEN', 'Siswanto', 'Siswanto', '-', '-', 'Jakarta', 'Bumi Aksara', 2016, '5b9c81a4d0d09.jpg', 1, 1, 'Pengantar Manajemen', 'MANAJEMEN', 'Buku', '12', '-', 'Tersedia', '2018-09-15'),
(28, 'K-0028', '331.11', '978-979-769-610-8', 'EKONOMI SUMBER DAYA MANUSIA DALAM PERSPEKTIF PEMBANGUNAN', 'Mulyadi', '-', '-', '-', 'Jakarta', 'Rajawali Pers', 2014, '5b9c807c137b9.png', 1, 1, 'Ekonomi Sumber Daya Manusia', 'EKONOMI', 'Buku', '5', 'Revisi', 'Tersedia', '2018-09-15'),
(29, 'K-0029', '658.81', '978-979-29-4417-4', 'PEMASARAN JASA: PRINSIP, PENERAPAN , PENELITIAN', 'Tjiptono, Fandy', '-', '-', '-', 'Yogyakarta', 'ANDI', 2014, '5b9c83474c6fd.jpg', 1, 1, 'Pemasaran Jasa', 'MANAJEMEN', 'Buku', '-', '1', 'Tersedia', '2018-09-15'),
(30, 'K-0030', '658.3', '978-602-277-724-3', 'MANAJEMEN SUMBER DAYA MANUSIA: UNTUK MAHASISWA &amp; UMUM', 'Supomo, R.', 'Nurhayati, Eti', 'Malyani, Lia', '-', 'Bandung', 'Yrama Widya', 2018, '1', 1, 1, 'MSDM', 'MANAJEMEN', 'Buku', '1', '-', 'Tersedia', '2018-09-16'),
(31, 'K-0031', '658.15', '978-979-010-504-1', 'MANAJEMEN KEUANGAN BERBASIS BALANCED SCORECARD: PENDEKATAN TEORI, KASUS DAN RISET BISNIS', 'Harmono', '-', 'Rachmatika, Rini', '-', 'Jakarta', 'Bumi Aksara', 2015, '1', 1, 1, 'Manajemen Keuangan', 'MANAJEMEN', 'Buku', '4', '-', 'Tersedia', '2018-09-16'),
(32, 'K-0032', '658.3', '978-602-229-395-8', 'MANAJEMEN PEMBANGUNAN SUMBER DAYA MANUSIA', 'Widodo, Suparno Eko', '-', '-', '-', 'Yogyakarta', 'Pustaka Pelajar', 2015, '1', 1, 1, 'Manajemen Pembangunan Manusia', 'MANAJEMEN', 'Buku', '2', '-', 'Tersedia', '2018-09-16'),
(33, 'K-0033', '658.401', '979-731-098-1', 'MANAJEMEN STRATEGIS', 'Hunger, J. David', 'Wheelen, Thomas L.', '-', 'Agung, Julianto', 'Yogyakarta', 'ANDI', 2003, '1', 1, 1, 'Manajemen Strategis', 'Manajemen', 'Buku', '-', '2', 'Tersedia', '2018-09-16'),
(34, 'K-0034', '658.383', '979-421-369-1', 'MANAJEMEN TRANSPORTASI', 'Salim, Abbas H. A.', '-', '-', '-', 'Jakarta', 'Rajawali Pers', 2013, '1', 1, 1, 'Manajemen Transportasi', 'MANAJEMEN', 'Buku', '11', '1', 'Tersedia', '2018-09-16'),
(35, 'K-0035', '658.401', '978-979-769-471-5', 'STRATEGIC MARKETING: SUSTAINING LIFETIME CUSTOMER VALUE', 'Assauri, Sofjan', '-', '-', '-', 'Jakarta', 'Rajawali Pers', 2012, '1', 1, 1, 'Strategi Pemasaran', 'MANAJEMEN', 'Buku', '1', '1', 'Tersedia', '2018-09-16'),
(36, 'K-0036', '338.5', '978-979-769-483-8', 'EKONOMI MANAJERIAL DENGAN PENDEKATAN MATEMATIS', 'Tasman, Aulia', 'Aima, H. M. Havidz', 'Nugroho, Arissetyanto', '-', 'Jakarta', 'Rajawali Pers', 2013, '1', 1, 1, 'Ekonomi Manajerial', 'EKONOMI', 'Buku', '2', 'Revisi', 'Tersedia', '2018-09-16'),
(37, 'K-0037', '658.15', '978-979-1486-93-4', 'PENGANTAR MANAJEMEN KEUANGAN', 'Kasmir', '-', '-', '-', 'Jakarta', 'Kencana', 2013, '1', 1, 1, 'Manajemen Keuangan', 'MANAJEMEN', 'Buku', '3', '1', 'Tersedia', '2018-09-16'),
(38, 'K-0038', '658', '979-3465-75-1', 'PENGANTAR MANAJEMEN', 'Sule, Ernie Tisnawati', 'Saefullah, Kurniawan', '-', '-', 'Jakarta', 'Kencana', 2015, '1', 1, 1, 'Pengantar Manajemen', 'MANAJEMEN', 'Buku', '9', '1', 'Tersedia', '2018-09-16'),
(39, 'K-0039', '338.9', '979-3925-37-x', 'EKONOMI PEMBANGUNAN: PROSES, MASALAH, DAN DASAR KEBIJAKAN', 'Sukirno, Sadono', '-', '-', '-', 'Jakarta', 'Kencana', 2017, '1', 1, 1, 'Ekonomi Pembangunan', 'EKONOMI', 'Buku', '8', '2', 'Tersedia', '2018-09-16'),
(40, 'K-0040', '658.15', '978-979-683-733-5', 'MANAJEMEN KEUANGAN', 'Keown, Arthur J.', 'Martin, Jhon D.', '-', '-', 'Jakarta', 'Indeks', 2010, '1', 1, 1, 'Manajemen Keuangan', 'MANAJEMEN', 'Buku', '1', '10', 'Tersedia', '2018-09-16'),
(41, 'K-0041', '658.81', '979-683-818-4', 'MANAJEMEN PEMASARAN', 'Kotler, Philip', 'Keller, Kevin Lane', 'Sarwaji, Bambang', 'Molan, Benyamin', 'Jakarta', 'Indeks', 2007, '1', 1, 1, 'Manajemen Pemasaran', 'MANAJEMEN', 'Buku', '1', '12', 'Tersedia', '2018-09-16'),
(42, 'K-0042', '310', '978-979-769-877-5', 'PENGANTAR STATISTIK INFERENSIAL', 'Gunawan, Imam', '-', '-', '-', 'Jakarta', 'Rajawali Pers', 2016, '1', 1, 1, 'Statistik Inferensial', 'STATISTIK', 'Buku', '1', '1', 'Tersedia', '2018-09-16'),
(43, 'K-0043', '310', '979-704-015-1', 'APLIKASI ANALISIS MULTIVARIATE DENGAN PROGRAM IBM SPSS 23', 'Ghozali, H. Imam', '-', '-', '-', 'Semarang', 'UNDIP', 2016, '1', 1, 1, 'SPSS', 'STATISTIK', 'Buku', '8', '8', 'Tersedia', '2018-09-16'),
(44, 'K-0044', '310', '978-979-061-669-8', 'STRUCTURAL EQUATION MODELING (SEM) BERBASIS KOVARIAN DENGAN LISREL DAN AMOS UNTUK RISET SKRIPSI, TESIS, DAN DISERTASI', 'Narimawati, Umi', 'Sarwono, Jonathan', 'Halim, Dedy A.', '-', 'Jakarta', 'Salemba Empat', 2017, '1', 2, 2, 'SEM', 'STATISTIK', 'Buku', '-', '-', 'Tersedia', '2018-09-16'),
(45, 'K-0045', '764.7364237', 'dfd', 'DFDS', 'dfs', 'dfs', 'dsf', 'df', 'dsf', 'dfs', 2014, '1', 1, 1, 'sdfds', 'MSDM', 'Buku', 'sdfd', 'dsf', 'Tersedia', '2018-09-19'),
(46, 'K-0046', '343.4348923', 'fgf', 'DFD', 'dfd', 'gfgf', 'dfd', 'fg', 'gfg', 'gf', 2018, '1', 1, 1, 'df', 'sd', 'Buku', 'gf', 'fd', 'Tersedia', '2018-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbkunjungan`
--

CREATE TABLE `tbkunjungan` (
  `idkunjungan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `noidentitas` varchar(125) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `waktu_kunjung` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkunjungan`
--

INSERT INTO `tbkunjungan` (`idkunjungan`, `nama`, `noidentitas`, `instansi`, `status`, `waktu_kunjung`) VALUES
(8, 'I Wayan Gunung', '80902932139', 'Suzuku Finace', 'Non Anggota', '2018-08-05 16:00:00'),
(9, 'Sunyahmi', '12389128', 'UNDIKSHA', 'Non Anggota', '2018-08-05 16:00:00'),
(12, 'I Wayan Gunung', '80902932139', 'Suzuku Finace', 'Non Anggota', '2018-08-05 16:00:00'),
(13, 'Made Rupanajaya', '14101579', 'STIKI INDONESIA', 'Anggota', '2018-08-05 16:00:00'),
(14, 'I Wayang Pasek  ', '14202226', 'BANK MANDIRI Buleleng', 'Anggota', '2018-08-13 22:54:15'),
(15, 'wayan', '1239891809', 'BPR INDRA', 'Non Anggota', '2018-08-14 03:07:37'),
(16, '', '2132139898', '', 'Non Anggota', '2018-08-14 03:07:58'),
(17, 'Marion Jola', '920379182', 'stiki', 'Non Anggota', '2018-09-10 05:02:17'),
(18, 'Ranggg', '34793', 'Dfjgkdfg', 'Anggota', '2018-09-10 05:03:04'),
(19, 'Made Rupanajaya', '', '', 'Non Anggota', '2018-09-17 04:05:35'),
(20, 'I Wayan Gunung', '92348923', 'stikom', 'Non Anggota', '2018-09-29 03:42:26'),
(21, '', '14101579', '', 'Non Anggota', '2018-09-29 03:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbmhs`
--

CREATE TABLE `tbmhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` int(20) DEFAULT NULL,
  `nama` varchar(125) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `angakatan` varchar(6) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `modified_by` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmhs`
--

INSERT INTO `tbmhs` (`id_mhs`, `nim`, `nama`, `jurusan`, `angakatan`, `kelas`, `date_modified`, `modified_by`) VALUES
(297, 18011028, 'LUH PUTU WIDAYANTI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(298, 18011001, 'LUH YULI NURJIASIH', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(300, 18021003, 'NI LUH DEWI SUCIASTUTI', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(301, 18011002, 'KADEK DHARMA GURITNA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(302, 18021015, 'NI LUH PUTU RENY PRAYNA DEWI', 'Akuntansi', '2018', 'Eksekutif', NULL, NULL),
(303, 18011003, 'M BAYU MAHARDIKA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(304, 18021004, 'DEWA AYU WIDYA ANTARI', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(305, 18011004, 'LUH ARI ADNYANI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(306, 18021005, 'LUH INTAN PARDINA DEVI', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(307, 18011029, 'KADEK DWI PUTRI ADNYANI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(308, 18021016, 'LUH WINDA ARDANI', 'Akuntansi', '2018', 'Eksekutif', NULL, NULL),
(309, 18011005, 'GEDE ARDANA YASA ', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(310, 18021006, 'LUH PUTU PURNAMI', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(311, 18011030, 'KETUT SURYA PRAMITA', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(312, 18021017, 'AYU MADE RUDIANI', 'Akuntansi', '2018', 'Eksekutif', NULL, NULL),
(313, 18011006, 'I PUTU SONI PARIASCANA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(314, 18021007, 'LUH SRI SINTYA ANDAYANI', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(315, 18011031, 'CELVIN PRIASTAYADI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(316, 18011007, 'KADEK AYU WARSINI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(317, 18021018, 'KADEK ARIK DARMAYANTI', 'Akuntansi', '2018', 'Eksekutif', NULL, NULL),
(318, 18021008, 'NI NYOMAN SRI DAMAYANTI', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(319, 18011008, 'MADE SRI RAHAYU', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(320, 18011032, 'KOMANG SUTRISILA', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(321, 18021019, 'NI KOMANG DAMAYANTI', 'Akuntansi', '2018', 'Eksekutif', NULL, NULL),
(322, 18011009, 'NI MADE DEVI ERMAWANTI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(323, 18021009, 'SABAT ROSALINA LETE', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(324, 18011033, 'KADEK INDRA KHANTI SANJAYA', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(325, 18021020, 'HERTIKA KHUSNUL KHOTIMAH', 'Akuntansi', '2018', 'Eksekutif', NULL, NULL),
(326, 18011010, 'KEDEK DIAN WAHYUNI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(327, 18021010, 'DESAK PUTU AYU SUKRINI', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(328, 18011034, 'KOMANG YUNITA PURNAMA SARI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(329, 18021021, 'KOMANG ITAYANI', 'Akuntansi', '2018', 'Eksekutif', NULL, NULL),
(330, 18011011, 'NI KETUT CANTIKA PARASWANI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(331, 18021011, 'NI WAYAN YANIX MARTIN', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(332, 18011035, 'NI LUH ARISTA WIDIARI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(333, 18011012, 'KADEK DENA KRISNANTARA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(334, 18021012, 'I GEDE YUNA SARASTIKA', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(335, 18011036, 'KETUT PENI TARAYANI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(336, 18011013, 'GEDE YUDI PRATAMA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(337, 18011037, 'I GUSTI AYU DEA MEITARI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(338, 18021013, 'DEWA GEDE MARTA EKAYANA', 'Akuntansi', '2018', 'Reg. Pagi', NULL, NULL),
(339, 18011014, 'KADEK SANTIKA DEWI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(340, 18011038, 'KOMANG DEVI INDRAYANI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(341, 18011015, 'KADEK AYU SUPRIANI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(342, 18011039, 'PUTU NIK MAWARNI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(343, 18011016, 'KADEK RIA GUSPITA DAMAYANTI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(344, 18011040, 'PUTU YUNI PURNAMININGSIH', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(345, 18011017, 'MAHARTA FIRMANTARA LETE', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(346, 18011041, 'LUH PUTU EKA SUCIANI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(347, 18011018, 'NYOMAN SULASMI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(348, 18011042, 'PUTU WIDIASTU', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(349, 18011019, 'GEDE PARMAYASA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(350, 18011043, 'NI NYOMAN EGARINI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(351, 18011020, 'LUH PUTU TRIANA DEWI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(352, 18011044, 'FERA FAIZAH', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(353, 18011021, 'I MADE PANJI DWIPAYANA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(354, 18011045, 'I NYOMAN ADE MAWAN SETIAWAN', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(355, 18011022, 'NI KADEK ANIK KRISNA DEWI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(356, 18011046, 'KADEK ARTIKA ADELINA', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(357, 18011047, 'KADEK DARMAWAN ', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(358, 18011023, 'KADEK ANGGA KURNIAWAN', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(359, 18011048, 'LUH RISKA', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(360, 18011024, 'NI KOMANG OKTA YOPITA SUKRANINGSIH', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(361, 18011025, 'K.A.DWI ANGGRENI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(362, 18011049, 'KADEK BUDA MARIANI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(363, 18011026, 'NI KOMANG DESI SINTA LESTARI', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(364, 18011050, 'KOMANG REDIASTITI', 'Manajemen', '2018', 'Reg. Sore', NULL, NULL),
(365, 18011027, 'I GEDE RIZKI WIDANA', 'Manajemen', '2018', 'Reg. Pagi', NULL, NULL),
(367, 18011153, 'I GUSTI NGURAH AGUS E.', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(368, 18011154, 'NI PUTU SARI DEWI', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(369, 18011155, 'NI KETUT ERI SUDEWI', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(370, 18011156, 'KETUT YOSI PUTRI ANUGRAH', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(371, 18011157, 'KOMANG PURNAMI', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(372, 18011158, 'KADEK RIANTI OKTAVIANI', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(373, 18011159, 'I GUSTI AGUNG WAHYUDI PUTRA', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(375, 18011161, 'LUH SARI WAHYUNI', 'Manajemen', '2018', 'Eksekutif', NULL, NULL),
(376, 18011162, 'KETUT MANGKU SARI ASTI', 'Manajemen', '2018', 'Eksekutif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbnamaharga`
--

CREATE TABLE `tbnamaharga` (
  `idnamhar` int(11) NOT NULL,
  `Nama` varchar(125) DEFAULT NULL,
  `untuk` varchar(125) DEFAULT NULL,
  `jenis` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbnamaharga`
--

INSERT INTO `tbnamaharga` (`idnamhar`, `Nama`, `untuk`, `jenis`) VALUES
(29, 'Dana Pembangunan', 'Pembayaran diawal', ''),
(30, 'OSPEK &amp; LKKM', 'Pembayaran diawal', 'Kegiatan'),
(31, 'OMT', 'Pembayaran diawal', 'Kegiatan'),
(34, 'Jas Almamater', 'Pembayaran diawal', ''),
(35, 'SPP', 'Per Tiga Bulan', ''),
(36, 'SKS', 'Per Tiga Bulan', ''),
(37, 'Magang', 'Per Tiga Bulan', ''),
(38, 'UPP &amp; Skripsi', 'Per Tiga Bulan', ''),
(39, 'Seminar', 'Per Tiga Bulan', 'Kegiatan'),
(40, 'Lokakarya', 'Per Tiga Bulan', 'Kegiatan'),
(41, 'Kersos', 'Per Tiga Bulan', 'Kegiatan'),
(42, 'Pelatihan Aplikom', 'Per Tiga Bulan', 'Kegiatan'),
(43, 'Kursus Bahasa Inggris', 'Per Tiga Bulan', 'Kegiatan'),
(44, 'Listrik, Air &amp; Telpn', 'Per Tiga Bulan', ''),
(45, 'TA', 'Per Tiga Bulan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbpinjaman`
--

CREATE TABLE `tbpinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `kode_anggota` varchar(12) DEFAULT NULL,
  `kode_koleksi` varchar(12) DEFAULT NULL,
  `jml_pinjam` int(5) DEFAULT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpinjaman`
--

INSERT INTO `tbpinjaman` (`id_pinjaman`, `kode_anggota`, `kode_koleksi`, `jml_pinjam`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(14, '14101579', 'SM.0001', 3, '2018-07-30', '2018-07-28', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tbsett_harga`
--

CREATE TABLE `tbsett_harga` (
  `id` int(11) NOT NULL,
  `harga` int(125) DEFAULT NULL,
  `nama_harga` varchar(125) DEFAULT NULL,
  `angkatan` varchar(125) DEFAULT NULL,
  `jurusan` varchar(55) DEFAULT NULL,
  `kelas` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsett_harga`
--

INSERT INTO `tbsett_harga` (`id`, `harga`, `nama_harga`, `angkatan`, `jurusan`, `kelas`) VALUES
(30, 3000000, 'Pembayaran diawal', '2018,2019', 'Semua', 'Reg. Pagi'),
(31, 3000000, 'Pembayaran diawal', '2018,2019', 'Semua', 'Reg. Sore'),
(32, 975000, 'Per Tiga Bulan', '2018,2019', 'Akuntansi', 'Reg. Pagi'),
(33, 1500000, 'Per Tiga Bulan', '2018,2019', 'Manajemen', 'Reg. Pagi'),
(34, 1650000, 'Per Tiga Bulan', '2018,2019', 'Manajemen', 'Reg. Sore'),
(35, 1350000, 'Per Tiga Bulan', '2018,2019', 'Akuntansi', 'Eksekutif');

-- --------------------------------------------------------

--
-- Table structure for table `tbspp`
--

CREATE TABLE `tbspp` (
  `id_spp` int(11) NOT NULL,
  `id_harga` int(11) DEFAULT NULL,
  `nim` varchar(125) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `pembayaran1` varchar(125) DEFAULT NULL,
  `pembayaran2` varchar(125) DEFAULT NULL,
  `tgl_byr1` datetime DEFAULT NULL,
  `tgl_byr2` datetime DEFAULT NULL,
  `bukti_pembayaran1` varchar(225) DEFAULT NULL,
  `bukti_pembayaran2` varchar(225) DEFAULT NULL,
  `bank` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbspp`
--

INSERT INTO `tbspp` (`id_spp`, `id_harga`, `nim`, `semester`, `pembayaran1`, `pembayaran2`, `tgl_byr1`, `tgl_byr2`, `bukti_pembayaran1`, `bukti_pembayaran2`, `bank`) VALUES
(0, 33, '18011001', 2, '', '3000000', '0000-00-00 00:00:00', '2019-05-16 10:51:17', '', '5cdcd0259e027.png', 'BPD'),
(13, 34, '18011028', 1, '1650000', '1650000', '2019-04-16 13:42:24', '2019-04-22 11:52:00', '5cb56b403e983.jpg', '5cbd3a60c43d3.png', 'BPR,BPR'),
(14, 33, '18011002', 1, '', '3000000', '0000-00-00 00:00:00', '2019-04-16 13:43:48', '', '5cb56b943f734.jpg', 'BRI'),
(15, 32, '18021003', 1, '975000', '', '2019-04-22 12:18:58', '0000-00-00 00:00:00', '5cbd40b20f69a.png', '', 'BPD'),
(23, 33, '18011001', 1, '1500000', '1500000', '2019-05-16 09:48:33', '2019-05-16 10:50:44', '5cdcc1714b87e.png', '5cdcd004aa589.png', 'BPR,BRI');

-- --------------------------------------------------------

--
-- Table structure for table `tbthnajran`
--

CREATE TABLE `tbthnajran` (
  `id_thn` int(11) NOT NULL,
  `thn_ajaran` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbthnajran`
--

INSERT INTO `tbthnajran` (`id_thn`, `thn_ajaran`) VALUES
(1, '2011/2012'),
(3, '2012/2013'),
(4, '2018/2019'),
(5, '2017/2018'),
(6, '2016/2017'),
(7, '2015/2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(125) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `username`, `password`, `email`, `level`) VALUES
(2, 'maderupanajaya', '$2y$10$150Q8/Hdr9I0M5.urvcBw.4e8Odn3nkVDEcq8VgayiFpYOYagyEvO', 'maderupanajaya@gmail.com', 'Web Master'),
(4, 'admin', '$2y$10$m3a0DJVpcLllvrFlBBpMSuFDcOK0trCiTv2HUiLPwKLde3SwoZqTy', 'admin@gamil.com', 'Pegawai Perpustakaan'),
(5, 'ranggagalih', '$2y$10$holNQtNHJr0alTAQW19axulmQj81CUzLR7t7dTCbreozDCnLH3mo6', 'rangga@mail.com', 'Pegawai Perpustakaan'),
(7, 'parwati', '$2y$10$zsnqNil/sLIOog3/pq8.peTPwOL3h/9k4DQGyVYUvu8UNHHsmf43K', 'parwati@mail.com', 'Pegawai Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tbusulan`
--

CREATE TABLE `tbusulan` (
  `idusulan` int(11) NOT NULL,
  `noanggota` varchar(25) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `pengarang` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_usulan` date NOT NULL,
  `status_usulan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbusulan`
--

INSERT INTO `tbusulan` (`idusulan`, `noanggota`, `judul`, `pengarang`, `keterangan`, `tgl_usulan`, `status_usulan`) VALUES
(3, '14101579', 'Manajemen Statistika Tenologi', 'Syarifudin Wawan', 'Tahun terbit 2016', '2018-08-08', 'Disetujui'),
(4, '16101578', 'Standar Akuntansi Keuangan 2018', 'Ikatan Akuntansi Indonesia', 'Tahun Terbit : 2018', '2018-08-08', '-'),
(5, '14101579', 'Manajemen Operasiaonal', 'Dr. Wirawan B. Ilyas, M.Si., M.H., CPA.', 'tahun 2018', '2018-08-14', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id` int(11) NOT NULL,
  `nim` varchar(125) DEFAULT NULL,
  `jenis_kegiatan` int(11) DEFAULT NULL,
  `nama_kegiatan` varchar(225) DEFAULT NULL,
  `tgl_kegiatan` date DEFAULT NULL,
  `bukti_kegiatan` varchar(225) DEFAULT NULL,
  `tgl_upload_bukti` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rincianspp`
--

CREATE TABLE `tb_rincianspp` (
  `id_rincian` int(11) NOT NULL,
  `id_settharga` int(11) DEFAULT NULL,
  `nama_rincian` varchar(125) DEFAULT NULL,
  `harga_rincian` int(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rincianspp`
--

INSERT INTO `tb_rincianspp` (`id_rincian`, `id_settharga`, `nama_rincian`, `harga_rincian`) VALUES
(79, 30, 'Dana Pembangunan', 2225000),
(80, 30, 'OSPEK & LKKM', 600000),
(81, 30, 'Jas Almamater', 175000),
(82, 31, 'Dana Pembangunan', 2625000),
(83, 31, 'OMT', 200000),
(84, 31, 'Jas Almamater', 175000),
(85, 32, 'SPP', 437500),
(86, 32, 'SKS', 216667),
(87, 32, 'Magang', 33333),
(88, 32, 'Seminar', 43750),
(89, 32, 'Lokakarya', 58333),
(90, 32, 'Kersos', 33333),
(91, 32, 'Pelatihan Aplikom', 41667),
(92, 32, 'Kursus Bahasa Inggris', 16667),
(93, 32, 'Listrik, Air & Telpn', 31250),
(94, 33, 'SPP', 700000),
(95, 33, 'SKS', 295313),
(96, 33, 'UPP & Skripsi', 78125),
(97, 33, 'Magang', 50000),
(98, 33, 'Seminar', 65625),
(99, 33, 'Lokakarya', 87500),
(100, 33, 'Kersos', 37500),
(101, 33, 'Pelatihan Aplikom', 31250),
(102, 33, 'Kursus Bahasa Inggris', 12500),
(103, 33, 'Listrik, Air & Telpn', 142187),
(104, 32, 'TA', 62500),
(105, 34, 'SPP', 1000000),
(106, 34, 'SKS', 253125),
(107, 34, 'UPP & Skripsi', 78125),
(108, 34, 'Seminar', 65625),
(109, 34, 'Lokakarya', 87500),
(110, 34, 'Kersos', 37500),
(111, 34, 'Pelatihan Aplikom', 31250),
(112, 34, 'Kursus Bahasa Inggris', 12500),
(113, 34, 'Listrik, Air & Telpn', 84375),
(114, 35, 'SPP', 850000),
(115, 35, 'SKS', 216667),
(116, 35, 'TA', 62500),
(117, 35, 'Seminar', 43750),
(118, 35, 'Lokakarya', 58333),
(119, 35, 'Kersos', 33333),
(120, 35, 'Pelatihan Aplikom', 41667),
(121, 35, 'Kursus Bahasa Inggris', 16667),
(122, 35, 'Listrik, Air & Telpn', 27083);

-- --------------------------------------------------------

--
-- Table structure for table `tb_temp`
--

CREATE TABLE `tb_temp` (
  `id_temp` int(11) NOT NULL,
  `no_transaksi` varchar(125) DEFAULT NULL,
  `id_koleksi` varchar(11) DEFAULT NULL,
  `kode_koleksi` varchar(25) DEFAULT NULL,
  `id_anggota` varchar(25) DEFAULT NULL,
  `id_sesion` varchar(25) DEFAULT NULL,
  `jumlah` int(12) DEFAULT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status_trans` varchar(12) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_temp`
--

INSERT INTO `tb_temp` (`id_temp`, `no_transaksi`, `id_koleksi`, `kode_koleksi`, `id_anggota`, `id_sesion`, `jumlah`, `tgl_pinjaman`, `tgl_kembali`, `status_trans`, `tgl_transaksi`) VALUES
(221, 'P0001', 'K-0001', '174.4', '5', '17011154', 1, '2018-09-17', '2018-09-24', 'Dikembalikan', '2018-09-17'),
(222, 'P0002', 'K-0003', '657.42', '5', '17011154', 1, '2018-09-17', '2018-09-24', 'Dikembalikan', '2018-09-17'),
(228, NULL, 'K-0002', '658.5', '5', '17011154', 1, '2018-09-18', NULL, '', NULL),
(229, NULL, 'K-0010', '658.3', '5', '17011154', 1, '2018-09-18', NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `tbdp`
--
ALTER TABLE `tbdp`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tbkeuangan`
--
ALTER TABLE `tbkeuangan`
  ADD PRIMARY KEY (`idcash`);

--
-- Indexes for table `tbkoleksi`
--
ALTER TABLE `tbkoleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkunjungan`
--
ALTER TABLE `tbkunjungan`
  ADD PRIMARY KEY (`idkunjungan`);

--
-- Indexes for table `tbmhs`
--
ALTER TABLE `tbmhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `tbnamaharga`
--
ALTER TABLE `tbnamaharga`
  ADD PRIMARY KEY (`idnamhar`);

--
-- Indexes for table `tbpinjaman`
--
ALTER TABLE `tbpinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `tbsett_harga`
--
ALTER TABLE `tbsett_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbspp`
--
ALTER TABLE `tbspp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `tbthnajran`
--
ALTER TABLE `tbthnajran`
  ADD PRIMARY KEY (`id_thn`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tbusulan`
--
ALTER TABLE `tbusulan`
  ADD PRIMARY KEY (`idusulan`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rincianspp`
--
ALTER TABLE `tb_rincianspp`
  ADD PRIMARY KEY (`id_rincian`);

--
-- Indexes for table `tb_temp`
--
ALTER TABLE `tb_temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbanggota`
--
ALTER TABLE `tbanggota`
  MODIFY `idanggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbdp`
--
ALTER TABLE `tbdp`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbkeuangan`
--
ALTER TABLE `tbkeuangan`
  MODIFY `idcash` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbkoleksi`
--
ALTER TABLE `tbkoleksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbkunjungan`
--
ALTER TABLE `tbkunjungan`
  MODIFY `idkunjungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbmhs`
--
ALTER TABLE `tbmhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `tbnamaharga`
--
ALTER TABLE `tbnamaharga`
  MODIFY `idnamhar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbpinjaman`
--
ALTER TABLE `tbpinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbsett_harga`
--
ALTER TABLE `tbsett_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbspp`
--
ALTER TABLE `tbspp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbthnajran`
--
ALTER TABLE `tbthnajran`
  MODIFY `id_thn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbusulan`
--
ALTER TABLE `tbusulan`
  MODIFY `idusulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rincianspp`
--
ALTER TABLE `tb_rincianspp`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tb_temp`
--
ALTER TABLE `tb_temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
