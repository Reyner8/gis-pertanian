-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 10:41 AM
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
-- Database: `gis-pertanian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2b$10$zMPPkkkguj21L0MBS7o0IOlIkgMlaYHR0FbQgltFG5JNf.8nxdpQe');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` enum('ketua','anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_kelompok`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jabatan`) VALUES
(2, 8, 'test212', 'asda', '2022-07-01', 'ketua');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `waktu` date NOT NULL,
  `kategori` enum('berita','tips') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`, `waktu`, `kategori`) VALUES
(41, 'Update Covid 26 Mei: Kasus Baru Tambah 5.304, Wafat 144', '<p>Kasus positif <strong>Virus Corona</strong> bertambah 5.304 hari ini per 24 jam terakhir hingga pukul 12.00 WIB. Dengan demikian, total akumulasi positif Covid-19 sejak pasien pertama diumumkan pemerintah pada 2 Maret 2020 kini menjadi 1.791.221 kasus.</p>\r\n\r\n<p>Dari jumlah akumulatif tersebut sebanyak 1.645.263 dinyatakan sembuh (bertambah 3.189) dan 49.771 meninggal dunia (bertambah 144).&nbsp;</p>\r\n\r\n<p>Dari angka-angka tersebut, maka jumlah kasus aktif per 24 jam terakhir yang dilaporkan Satgas Covid-19 hingga pukul 12.00 WIB hari ini adalah 96.187 di seluruh Indonesia. Sementara untuk suspek Covid-19 pada waktu yang sama adalah 90.901 di seluruh wilayah Indonesia.</p>\r\n\r\n<p>Adapun untuk jumlah spesimen yang diperiksa per hari ini di seluruh laboratorium kesehatan se-Indonesia dalam 24 jam terakhir adalah 82.320</p>\r\n\r\n<p>Mengutip dari situs covid19.go.id, total akumulasi sudah 16.291.888 spesimen yang diperiksa, di mana 14.403.910 di antaranya berdasarkan tes PCR, dan sisanya adalah antigen. Jumlah spesimen itu diambil dari akumulasi 10.224.833 orang yang diperiksa, di mana 9.300.112 di antaranya sudah di-PCR.</p>\r\n\r\n<p>Sehari sebelumnya, Selasa (25/5), total akumulasi positif Covid-19 di Indonesia adalah 1.786.187 kasus. Dari jumlah akumulatif tersebut sebanyak 1.642.074 dinyatakan sembuh, dan 49.627 telah meninggal dunia. Dari angka-angka tersebut, berarti jumlah kasus aktif positif per hari tersebut adalah 94.486 orang.</p>\r\n\r\n<p>Diketahui, Pemerintah kembali memperpanjang penerapan PPKM mikro hingga akhir Mei 2021 untuk mengantisipasi lonjakan Corona pascalibur lebaran.</p>\r\n\r\n<p>Selain itu, Kementerian Kesehatan (Kemenkes) juga menjadwalkan kedatangan vaksin virus corona Novavax akan datang di bulan Juni dan dilanjutkan vaksin Pfizer yang akan didatangkan di Juli 2021. Kemudian pada kemarin tiba lagi 8 juta dosis vaksin corona merek Sinovac ke Indonesia.</p>\r\n\r\n<p>Per hari ini, Satgas mencatat sebanyak 15.535.998 orang telah mendapatkan vaksinasi 1 (bertambah 205.692), di mana 10.224.833 di antaranya sudah lengkap mendapatkan dosis kedua (99.353).</p>\r\n\r\n<p>Kemenkes tetap meminta peningkatan disiplin&nbsp;protokol kesehatan. Pasalnya, sejauh ini ada 54 kasus mutasi virus SARS-CoV-2 yang tergolong &#39;Variant of Concern (VoC)&#39; yang teridentifikasi di Indonesia berdasarkan hasil Whole <em>Genome Sequence</em> (WGS).</p>\r\n\r\n<p>Satgas Penanganan Covid-19 pun menyebut terjadi kenaikan kasus Corona dalam enam hari terakhir. Selain itu, ada tren kenaikan tingkat keterisian tempat tidur atau <em>bed occupancy rate</em> (BOR) di rumah sakit Covid-19 di Pulau Jawa.</p>\r\n\r\n<p>The Institute for Health Metrics and Evaluation (IHME) bahkan memprediksi angka kasus kematian warga Indonesia akibat Corona melebihi data yang dilaporkan pemerintah.</p>\r\n\r\n<p>Terkait itu, Kementerian Kesehatan mengakui ada kemungkinan kasus kematian akibat Covid-19 di Indonesia yang belum terdeteksi dan tercatat dalam sistem Mew All Record (NAR) milik pemerintah.</p>\r\n\r\n<p>&quot;Kita tahu belum semua kabupaten/kota punya laboratorium pemeriksaan PCR, sehingga pasti kasus akan underdiagnosis. Dan pasti kematian juga akan berdampak tidak terdeteksi,&quot; kata Direktur Pencegahan dan Pengendalian Penyakit Menular Langsung (P2PML) Kementerian Kesehatan Siti Nadia Tarmizi melalui pesan singkat kepada <em>CNNIndonesia.com</em>, Senin (24/5).</p>\r\n\r\n<p>Nadia lantas mengatakan sebaran kasus Covid-19 di luaran sana yang belum terjaring kemungkinan didominasi warga yang terpapar Covid-19 dengan status asymptomatic atau orang tanpa gejala (OTG).</p>\r\n\r\n<p>Sementara itu, di tengah penanggulangan Covid-19 di Indonesia, Presiden RI Joko Widodo (Jokowi) menggeser Doni&nbsp;Monardo&nbsp;dari Kepala BNPB&nbsp;karena memasuki masa purnabakti sebagai prajurit TNI dengan pangkat bintang tiga. Posisinya di BNPB&nbsp;digantikan Letjen&nbsp;TNI Ganip&nbsp;Warsito&nbsp;yang sebelumnya adalah Kasum TNI.</p>\r\n\r\n<p>Diketahui, BNPB&nbsp;adalah corong dari Satgas Percepatan Penanganan Covid-19. Doni&nbsp;Monardo&nbsp;sebagai Kepala BNPB&nbsp;kala itu merupakan pemegang komando dari satgas tersebut.</p>\r\n', '984180561.jpg', '2021-05-26', 'berita'),
(45, 'hello', '<p><strong>hello</strong></p>\r\n', '1848470209.jpg', '2022-07-15', 'berita');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_kelompok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `nama`, `id_kelompok`) VALUES
(23, '256098700.jpg', 8),
(21, '780120.jpg', 8),
(20, '99284977.jpg', 8),
(19, '2074855548.jpg', 8),
(17, '460772400.jpg', 8),
(24, '254750744.jpg', 8),
(25, '816023142.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_panen`
--

CREATE TABLE `hasil_panen` (
  `id` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ditanam` int(11) NOT NULL,
  `panen` int(11) NOT NULL,
  `modal_awal` int(11) DEFAULT NULL,
  `hasil_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_panen`
--

INSERT INTO `hasil_panen` (`id`, `id_kelompok`, `nama`, `ditanam`, `panen`, `modal_awal`, `hasil_jual`) VALUES
(2, 8, 'test 121', 20, 19, 1000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`) VALUES
(8, 'Miomaffo Timur'),
(9, 'Miomaffo Barat'),
(10, 'Biboki Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_tani`
--

CREATE TABLE `kelompok_tani` (
  `id` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok_tani`
--

INSERT INTO `kelompok_tani` (`id`, `id_kelurahan`, `nama`, `alamat`, `lng`, `lat`, `icon`) VALUES
(8, 58, 'hello world', 'qwe  ', '124.48105435785226', '-9.467723308723837', '1446772794.png'),
(9, 59, 'abcde', ' asdasd', '124.47537375889347', '-9.448667335126753', '1806866453.png');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `nama` text DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `id_kecamatan`) VALUES
(58, 'Amol', 8),
(59, 'Bokon', 8),
(60, 'Fatusene', 8),
(61, 'Bitefa', 8),
(62, 'Fatuneno', 9),
(63, 'Eban', 9),
(64, 'Oenaem', 10),
(65, 'Pantae', 10),
(66, 'Supun', 10);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `nama`, `isi`, `tanggal`) VALUES
(6, 'Reyner', 'Tambahkan Data dokter lagi', '2021-05-26'),
(7, 'test', 'test 123\r\n', '2022-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hasil_panen`
--
ALTER TABLE `hasil_panen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
