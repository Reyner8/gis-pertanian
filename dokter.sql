-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 10:59 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokter`
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
(1, 'reyner', 'rey@gmail.com', '$2b$10$zMPPkkkguj21L0MBS7o0IOlIkgMlaYHR0FbQgltFG5JNf.8nxdpQe');

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
(43, '10 Cara Menjaga Kesehatan Tubuh yang Sederhana dan Mudah Dilakukan Sehari-hari', '<p>Menjaga kesehatan menjadi hal yang sangat penting dilakukan semua kalangan. Apalagi dengan kondisi alam yang semakin tak tertebak cuacanya, tiba-tiba panas dan tiba-tiba dingin. Ditambah keadaan penyebaran virus dan bakteri yang semakin merebak setiap harinya.</p>\r\n\r\n<p>Terkadang hal sederhana yang rutin dilakukan setiap hari, mampu menjadi penangkal yang hebat dalam menjaga tubuh.</p>\r\n\r\n<p>Cara menjaga kesehatan tubuh biasanya tetap menyesuaikan dengan kebutuhan, usia, kesibukan, serta kemampuan seseorang. Asupan gizi menjadi perlu sebagai pendamping yang tepat, demi menjaga kesehatan tubuh dari dalam.</p>\r\n\r\n<p>Kesahatan darah juga penting bagi kesehatan tubuh, oleh karena itu sebaiknya Anda mengetahui kondisi hemoglobin dalam tubuh Anda. Karena jumlah hemoglobin yang rendah dapat menyebabkan kekurangan zat besi, sehingga memicu anemia. Gejala umum jika tubuh anda mengalami anemia defisiensi besi antara lain mudah lelah, lesu, merasa pusing, rambut rontok, kulit pucat dan kuku mudah patah.</p>\r\n\r\n<p>Kekurangan zat besi dapat menyebabkan kesehatan darah yang buruk. Periksa jumlah hemoglobin* Anda sekarang.</p>\r\n\r\n<p>Sementara itu, Anda dapat mengonsumsi makanan kaya akan zat besi seperti biji-bijian utuh seperti beras merah, sayuran berdaun hijau, kacang-kacangan, daging, apricot, plum dan kismis. Organisasi Kesehatan Dunia (WHO) merekomendasikan suplementasi zat besi oral setiap hari dengan zat besi elemental 30mg hingga 60mg untuk wanita dewasa guna mencegah anemia.</p>\r\n', '713840659.jpg', '2021-05-26', 'tips');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `bpjs` enum('Y','N') NOT NULL,
  `telepon` varchar(15) NOT NULL DEFAULT '0',
  `id_spesialis` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `foto`, `bpjs`, `telepon`, `id_spesialis`) VALUES
(11, 'dr. Rita Enny, M. Kes', '1920476772.jpg', 'Y', '081237661532', 2),
(8, 'dr. Dewa Ayu Dwi Suswati', '350133223.jpg', 'Y', '081363987991', 2),
(12, 'dr. Yosef Yanto Deventer Nyong Oematan, Sp.A', '1490257718.jpg', 'N', '081237661542', 1),
(13, 'dr. Laila Fitri Ibbibah, Sp.A', '802454885.jpg', 'N', '081233465077', 1),
(14, 'dr. Herbert Soritua Silalahi, Sp.B', '1933934872.jpg', 'N', '085338958221', 18),
(15, 'dr. Jean Eleonora Pello, Sp.B', '861232764.jpg', 'N', '081237654909', 18),
(16, 'dr. Siemon Junior Berhimpon, Sp.B', '12254138.jpg', 'N', '0813555016', 18),
(17, 'dr. Teguh Dwi Nugroho, Sp.B', '451305158.jpg', 'N', '0813555016', 18),
(18, 'drg. Eny Wahyuni, Sp.BM', '1938287263.jpg', 'Y', '0813555016', 19),
(19, 'dr. Donny Argie, Sp.BS', '1994812376.jpg', 'N', '0813555016', 20),
(20, 'dr. Elric Brahm Malelak, Sp.BS', '985288403.jpg', 'N', '0813555016', 20),
(21, 'dr. Lanny Tanesia, Sp.PD, M.Min', '1024139373.jpg', 'N', '0813555016', 21),
(22, 'drg. Alice Ritliany', '636614633.jpg', 'Y', '0813555016', 44),
(23, 'drg. Lily Liana', '201224017.jpg', 'Y', '0813555016', 44),
(24, 'drg. Yohannes Dian Indrajati, Sp.KG', '1778822500.jpg', 'N', '0813555016', 44),
(25, 'dr. Linda Arintawati, Sp.GK', '1571416271.jpg', 'N', '0813555016', 22),
(26, 'dr. Leonora Johana Tiluata, Sp.JP', '1582870960.jpg', 'N', '0813555016', 23),
(27, 'dr. Lowry Yunita, Sp.JP', '382636098.png', 'N', '0813555016', 23),
(147, 'dr. Maya Sp. A', '983523527.png', 'Y', '0814555987', 1),
(29, 'dr. Andreas Andhry Heru Tjahyono, Sp.OG', '1363789796.jpg', 'N', '0878555086', 5),
(30, 'dr. Imelda Rina Melati Damanik, Sp.OG', '623367517.jpg', 'N', '0838555237', 5),
(31, 'dr. Isaias Budi Cahaya, Sp.OG', '337220347.jpg', 'N', '0838555120', 5),
(32, 'dr. Jenny Elisabeth Pally, Sp.OG', '948213644.jpg', 'N', '0897555331', 5),
(33, 'dr. Evivana Sri Sundari, M.Sc, Sp.KK', '111982428.jpg', 'N', '0878555233', 24),
(34, 'dr. Boyke Kuhurima, Sp.M', '680964201.jpg', 'N', '0838555652', 25),
(35, 'dr. Su Djie To Rante, M. Biomed, Sp.OT', '1878760710.jpg', 'N', '0859555880', 27),
(36, 'dr. I Made Oka Mahendra, Sp.OT', '1902161526.jpg', 'N', '0897555769', 27),
(37, 'dr. Oka Wijaya, Sp.P', '254555554.jpg', 'N', '0813555523', 28),
(38, 'dr. Elisabeth Maria De Haan, Sp.PD', '373006671.jpg', 'N', '0896555902', 29),
(39, 'dr. Ida Bagus Ngurah Wisesa, Sp.PD', '1804192572.jpg', 'N', '0878555653', 29),
(146, 'dr. Sammy Sp. A', '710548666.png', 'Y', '0856555011', 1),
(41, 'dr. David Santosa, Sp.PD', '1215150423.jpg', 'N', '0878555439', 29),
(42, 'dr. Niniek Widiandriany, Sp.KJ', '473541129.jpg', 'N', '0838555150', 30),
(43, 'dr. Dyah Gita Rambu Kareri, Sp.KFR', '1565444970.jpg', 'N', '0838555603', 31),
(44, 'dr. Nini Natalia Li, Sp.KFR', '1782990041.jpg', 'N', '0898555515', 31),
(45, 'dr. Muhamad Ibrahim, Sp.THT-KL', '238325913.jpg', 'N', '0896555632', 8),
(46, 'dr. Lita Afrianty Puspitasari Harianja', '1431997883.jpg', 'Y', '0852555818', 2),
(47, 'dr. Maria Michaela Stephani Rea', '1047523663.jpg', 'Y', '0852555286', 2),
(148, 'dr. Amrul, Sp. B', '1107752400.png', 'N', '0819555302', 18),
(49, 'dr. Eric Sebastian Huaturuk, Sp.U', '2016740634.jpg', 'N', '0896555047', 32),
(50, 'dr. Firman Nugroho, Sp.U', '1902245126.jpg', 'N', '0838555885', 32),
(51, 'dr. Santry Yusnita Sinatra, Sp.RM', '172409556.jpg', 'N', '0858555402', 33),
(52, 'dr. Dewa Putu Sahadewa, Sp.OG (K)', '2044250308.png', 'N', '0878555060', 34),
(53, 'dr. Alexander Michael Joseph Saudale, Sp.PD', '1038129216.png', 'N', '0878555723', 29),
(54, 'dr. Eunike Cahyaningsih, Sp.M', '1560904957.png', 'N', '0838555638', 25),
(55, 'dr. Arley Sadra Telussa, Sp.U', '1155602160.png', 'N', '085455042', 32),
(56, 'dr. Woro Indri Padmosiwi, Sp.A', '17197194.png', 'Y', '0852555905', 1),
(57, 'dr. Johana Herlin, Sp.S', '1049693470.png', 'N', '0897555537', 35),
(58, 'dr. Nikson Eduard Faot, Sp.P', '171597884.png', 'N', '0897555537', 36),
(59, 'dr. Elsye Ruth Frida Thene, Sp.Rad', '1249622251.png', 'N', '0854555766', 37),
(60, 'Dr. Irene Lokananta Sp.BA', '628165494.jpg', 'N', '0878555969', 38),
(61, 'dr. Retno Widyawati, Sp.PA', '341200357.png', 'N', '0854555257', 39),
(62, 'dr. Margareth Juniawati Bya, M.Biomed., Sp.KK', '963981718.jpg', 'N', '0811555261', 24),
(63, 'dr. Budi Yulianto Sarim, Sp.An', '1078225339.png', 'N', '0838555860', 40),
(64, 'dr. Paul Steven, Sp.OT', '792384179.png', 'N', '0838555860', 41),
(65, 'dr. Hermi Indita Malewa, Sp.PK', '1077299840.png', 'N', '0878555018', 42),
(66, 'dr. Burhanudin Mursio, Sp.B', '289315745.png', 'N', '0838555743', 18),
(67, 'dr. Dedy Yulidar, SpB(K)Onk', '819759248.png', 'N', '0838555367', 43),
(68, 'dr. Lindayanti Sumali, Sp. P.', '1746137743.png', 'N', '0838555620', 28),
(69, 'dr. Hendriete I. Mamo, SpOG', '1886759202.png', 'N', '0852555057', 5),
(70, 'dr. Kamilius Karangora, Sp.PD', '661912942.png', 'N', '0855555298', 29),
(71, 'dr. Woro Indri, Sp.A', '1796532038.png', 'N', '0878555523', 1),
(72, 'dr. Jean Pello, Sp.B', '716013796.jpg', 'N', '0896555361', 18),
(73, 'dr. Immanuel E.S. Purba, SpTHT', '287598245.png', 'N', '0814555887', 8),
(74, 'dr. Riosna Ernawaty Sijabat', '758149646.png', 'N', '0855555105', 2),
(75, 'dr. Andi Gunawan Sihombing', '592951152.png', 'N', '0838555144', 44),
(76, 'dr. Herlince W. Amalo', '1522818515.png', 'N', '0838555894', 2),
(77, 'drg. Fauzi Sholeh', '1355762213.png', 'N', '0855555305', 44),
(78, 'drg. Maria F. Ika. I. Sundary', '700526142.png', 'N', '0814555598', 44),
(79, 'dr. Nur Reski Yulita Fajryani', '1143614534.png', 'N', '0853555494', 2),
(80, 'drg. Retnowati, M.Kes', '1487620853.png', 'N', '0859555823', 44),
(81, 'dr. Resti Victoria Fanggidae', '261500427.png', 'Y', '0855555234', 2),
(82, 'dr. Maria Imakulata husni', '514919653.png', 'N', '0838555090', 2),
(83, 'dr. Widya Cahya', '244512807.png', 'N', '0878555634', 2),
(84, 'drg. Euphrasia M. Soe', '1617346236.png', 'N', '0855555004', 44),
(85, 'dr. Joewen Sarliaency Manafe', '958871913.png', 'N', '0852555927', 2),
(86, 'dr. Owymardyan Yusel Manafe', '790958914.png', 'N', '0859555497', 2),
(87, 'dr. Fika Silvia', '1536087214.png', 'N', '0813555581', 2),
(88, 'dr. Herman Suwono', '742702883.png', 'N', '0857555375', 44),
(89, 'drg. Lindawati Alim', '1745841411.png', 'Y', '085225313316', 44),
(90, 'dr. Andree Hartanto, Sp.OG', '185605657.png', 'N', '0814555711', 5),
(91, 'dr. Christine Elim', '1892541575.png', 'N', '0853555359', 2),
(92, 'dr. Herewati Lianto', '31673950.png', 'N', '0819555486', 45),
(93, 'dr. Setijo Halim Sp.B.', '903789753.png', 'N', '0855555706', 18),
(94, 'drg. Fransisca Johana', '301900216.png', 'N', '0814555407', 44),
(95, 'dr. Riana Novita. H.M.Biomed (AAM)', '862146835.png', 'N', '0852555214', 46),
(96, 'drg. Rosa Da Lima', '1333433259.png', 'N', '0815555712', 44),
(97, 'drg. Arie.S.Angkiriwang, Sp.Pros', '1877724.jpg', 'N', '0811555237', 47),
(98, 'dr. Nyoman Sutama, SpKK', '1601595007.png', 'N', '0380822235', 24),
(99, 'dr. Ivyane M. I. Luanlaka', '1899006821.png', 'N', '0818555504', 2),
(100, 'drg. Emma Krisyudhanti, MDSc', '808852815.jpg', 'N', '0858555253', 44),
(101, 'dr. Kiswa Anggreany, Sp.OG', '1386218471.jpg', 'N', '0811555443', 34),
(102, 'drg. Maria Anggreani W. Phodi', '1517781893.png', 'Y', '0814555802', 44),
(103, 'drg. Rosita R Sp.KG', '2013931262.png', 'N', '081330519698', 44),
(143, 'dr. Sherly Sp. PD', '439220486.png', 'N', '0854555488', 29),
(105, 'dr. Sri Wahyuningsih, sp.TH', '1653128461.png', 'N', '0817555164', 8),
(106, 'dr. Ivan Gideon Ledoh', '1795819869.png', 'N', '0819555436', 44),
(107, 'dr. Maxi Mengundap, Sp.PD', '1400078759.png', 'N', '0858555590', 29),
(108, 'dr. Ratna Tallo, SpKK, FINSDV', '875647633.jpg', 'N', '0817555518', 24),
(109, 'dr. Andreas N. F. Lewai, Sp.PD', '1898351073.png', 'N', '0853555313', 29),
(145, 'dr. Sammy Sp. A\r\n', '1387266861.png', 'N', '0815555726', 35),
(111, 'dr. Lily Chandrawati, Sp.PD', '395112368.png', 'N', '0853555454', 29),
(112, 'dr. Adjunias Maifa, Sp.PD', '72259079.png', 'N', '0816555803', 29),
(113, 'dr. Sharon Sandra, Sp.PD', '2049535082.png', 'N', '0896555107', 29),
(114, 'dr. Eunike Cahyaningsih, Sp.M', '984138732.png', 'N', '0817555584', 25),
(115, 'dr. Cosmas H. K, Sp.M', '761024869.png', 'N', '0858555591', 25),
(116, 'dr. Novita Yappy, Sp.M', '1895122416.png', 'N', '0812555840', 25),
(117, 'dr. Hyasinta Arlette N, Sp.M', '1994779686.png', 'N', '0813555336', 25),
(118, 'dr. Sugi Deni P. S, Sp.A', '1598442485.png', 'N', '0857555365', 1),
(119, 'dr.  Benny Gunawan, Sp.B', '544112965.png', 'N', '0816555381', 18),
(120, 'dr. Johana Herlin, Sp.S', '1542488230.png', 'N', '0817555357', 35),
(144, 'dr. stefani Sp. PD', '749204229.png', 'N', '0811555737', 29),
(122, 'dr. Jansen L. Lalandos Sp.OG', '2118703000.png', 'N', '0858555836', 5),
(123, 'dr. Elisabeth G. K. Liga, Sp.OG M.Kes', '1333567381.png', 'N', '0858555402', 5),
(124, 'dr. Marsiana I. K. Parera, M. Gizi', '1915852375.png', 'N', '0856555309', 22),
(125, 'dr. Herni I. Malewa, Sp.PK', '1480768454.png', 'N', '0855555744', 42),
(126, 'dr. Syeben H. E. Hietungwati, SpPA', '401798945.png', 'N', '0856555960', 39),
(150, 'dr. Steve Sp. OT', '539825637.png', 'N', '0852555050', 27),
(149, 'dr. Oka Sp. OT', '1239295530.png', 'N', '0813555851', 27),
(129, 'dr. Frans C Homalessy, Sp.AN', '209581935.png', 'N', '0856555232', 40),
(130, 'dr. Erce Darmanto Sp.AN', '1028147069.png', 'N', '0815555902', 40),
(131, 'dr. Robinson Gunawan Fanggidae, Sp.AN', '372979443.png', 'N', '0815555775', 40),
(132, 'dr. Erma Rantela’bi, Sp.OG', '57076141.png', 'N', '0819555611', 5),
(133, 'dr. Hendriette Irene Mamo, Sp.OG', '410417967.png', 'N', '0817555807', 5),
(134, 'dr. Heru Tjahyono, Sp.OG', '1539442920.png', 'N', '0854555889', 5),
(135, 'dr. Nico Hudaya, Sp.OG', '1278921573.png', 'N', '0854535417', 5),
(136, 'dr. Hendrik Tokan, Sp.A', '1371512613.png', 'N', '85353590511', 1),
(137, 'dr. Karolin Tallo, Sp.A', '1306196813.png', 'N', '0812355965', 1),
(138, 'dr. Sientje M. Saudale, Sp.B', '1226878051.png', 'N', '0819555314', 18),
(139, 'dr. Stefanus Dhe Soka, Sp.B', '1854080372.png', 'N', '0852555452', 18),
(140, 'dr. Woro Padmosiwi, Sp.A', '1728926734.png', 'N', '0858555296', 1),
(141, 'Drg. Febrianty A Siampa', '52909758.png', 'N', '0811555709', 44),
(142, 'Drg. Fransiska Rima Tallo', '1767748457.png', 'N', '0859556541', 44),
(151, 'dr. Yuni, Sp.OG', '402973046.png', 'Y', '0853555725', 5),
(152, 'dr. Indrawan, Sp.OG', '664989067.png', 'Y', '0858555820', 5),
(153, 'dr. Jeris, Sp.KFR', '1699591141.png', 'N', '0852555593', 31),
(154, 'dr. Wulan Sp. BM', '1905613151.png', 'N', '0859555041', 19),
(155, 'dr. Niva, Sp.JP', '1475331208.png', 'N', '0812555467', 23),
(156, 'dr. Yuyun, Sp. KK', '359258242.png', 'Y', '0812555333', 24),
(157, 'dr. Dian Sp.M', '159488518.png', 'Y', '0819555992', 25),
(158, 'dr. D. A. A. Shanti Widyasari, Sp.OG', '351095498.png', 'Y', '858-555-414', 5),
(159, 'dr. Laurens David Paulus, Sp.OG', '1399267988.png', 'Y', '0857555138', 5),
(160, 'dr. Agus Sunatha', '817322445.png', 'Y', '0818555543', 5),
(161, 'dr. simplicia M. Anggrahini, Sp.A', '1163220879.png', 'Y', '0817555283', 1),
(162, 'dr. Frans Taolin, Sp.A', '1027056633.png', 'Y', '0857555140', 1),
(163, 'dr. Catharina P.S. Keraf, Sp.PD, Mars', '199557680.png', 'N', '0854555368', 29),
(164, 'dr. Thomas Aquinas Syukur Rejo Tonda Sp. An', '1436477644.png', 'N', '0814555873', 40),
(165, 'dr. Hendrik B. Tokan, Sp.A', '1112688473.png', 'Y', '0814555488', 1),
(167, 'dr. Herjuni Oematan, Biomed., SpKK', '913580911.png', 'N', '0819555760', 24),
(168, 'dr. Jeanyanty Y. Djaranjoera', '1522102086.png', 'Y', '0852555766', 2),
(169, 'drg. Dessy Endang Seskawati, M.Kes', '1784327424.png', 'Y', '0817555447', 44),
(170, 'dr. Yosef Oematan, SpA', '1036445592.png', 'Y', '0855555592', 1),
(171, 'dr. Putu Novinta Pradipta, Sp.PD', '1844870183.png', 'N', '0814555214', 29),
(172, 'drg. Marlin Angelia Salu', '748183777.png', 'Y', '0818555430', 44),
(173, 'dr. Sienny Amelia Kwok', '2043392218.png', 'Y', '0853555256', 2),
(174, 'dr. Kresnawati W. S, MCTM', '1652278341.png', 'Y', '0856555946', 2),
(175, 'drg. Melissa Yolanda Komala, Sp.Ort', '1217040750.png', 'Y', '0853555256', 44),
(176, 'drg. Indah Wulansari, Sp.BMM', '696596547.png', 'N', '0811555215', 19),
(177, 'dr. Cornelis A. Tallo', '896920508.png', 'Y', '0818555523', 2);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_lokasi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `nama`, `id_lokasi`) VALUES
(5, '6475981.jpg', 3),
(6, '6475990.png', 3),
(7, '1402523984.png', 2),
(8, '284219825.jpg', 2),
(9, '1965629867.jpg', 2),
(10, '655605868.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`) VALUES
(2, 'Alak'),
(3, 'Kelapa Lima'),
(4, 'Kota Raja'),
(5, 'Kota Lama'),
(6, 'Maulafa'),
(7, 'Oebobo');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `nama` text,
  `id_kecamatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `id_kecamatan`) VALUES
(6, 'Alak', 2),
(7, 'Batuplat', 2),
(8, 'Fatufeto', 2),
(9, 'Mantasi', 2),
(10, 'Manulai II', 2),
(11, 'Manutapen', 2),
(12, 'Naioni', 2),
(13, 'Namosain', 2),
(14, 'Nunbaun Delha', 2),
(15, 'Nunbaun Sabu', 2),
(16, 'Nunhila', 2),
(17, 'Penkase Oeleta', 2),
(18, 'Kelapa Lima', 3),
(19, 'Lasiana', 3),
(20, 'Oesapa', 3),
(21, 'Oesapa Barat', 3),
(22, 'Oesapa Selatan', 3),
(23, 'Airnona', 4),
(24, 'Bakunase', 4),
(25, 'Bakunase II', 4),
(26, 'Fontein', 4),
(27, 'Kuanino', 4),
(28, 'Naikoten I', 4),
(29, 'Naikoten II', 4),
(30, 'Nunleu', 4),
(31, 'Airmata', 5),
(32, ' Bonipoi', 5),
(33, 'Fatubesi', 5),
(34, 'Lai-lai', 5),
(35, 'Bisi Kopan', 5),
(36, 'Merdeka', 5),
(37, 'Nefonaek', 5),
(38, 'Oeba', 5),
(39, 'Pasir Panjang', 5),
(40, 'Solor', 5),
(41, 'Tode Kisar', 5),
(42, 'Belo', 6),
(43, 'Fatukoa', 6),
(44, 'Kolhua', 6),
(45, 'Maulafa', 6),
(46, 'Naikolan', 6),
(47, 'Naimata', 6),
(48, 'Oepura', 6),
(49, 'Penfui', 6),
(50, 'Sikumana', 6),
(51, 'Fatululi', 7),
(52, 'Kayu Putih', 7),
(53, 'Liliba', 7),
(54, 'Oebobo', 7),
(55, 'Oebufu', 7),
(56, 'Oetete', 7),
(57, 'Tuak Daun Merah', 7);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `apotik` enum('Y','N') NOT NULL,
  `wifi` enum('Y','N') NOT NULL,
  `ac` enum('Y','N') NOT NULL,
  `ruang_asi` enum('Y','N') NOT NULL,
  `ruang_tunggu` enum('Y','N') NOT NULL,
  `nebulizer` enum('Y','N') NOT NULL,
  `id_kelurahan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `latitude`, `longitude`, `nama_tempat`, `alamat`, `apotik`, `wifi`, `ac`, `ruang_asi`, `ruang_tunggu`, `nebulizer`, `id_kelurahan`) VALUES
(2, -10.1579952, 123.5917698, 'Kimia Farma Oeba', 'Jl. A. Yani, Oeba, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'N', 'Y', 'Y', 'Y', 'N', 38),
(16, -10.1596485, 123.6091133, 'Cendana', 'Jl. RW Monginsidi, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 51),
(17, -10.1564748, 123.6054641, 'Klinik Pondok Sehat', 'Jl. RW Monginsidi No.21, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 51),
(19, -10.157225, 123.61049, 'Rumah Sakit Siloam', 'Jl. R. W. Monginsidi, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 51),
(20, -10.168299, 123.585738, 'RSUD Prof. Dr. W. Z. Johannes', 'Jl. Moch Hatta No.19, Oetete, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 56),
(21, -10.1685502, 123.5827345, 'RS Wirasakti', 'JL. Dr Moh Hatta, No. 9-11, Oebobo, Fontein, Fontein, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim. 85112', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 26),
(22, -10.1451726, 123.6527984, 'Kimia Farma Oesapa', 'Jl. Timor Raya, Oesapa, Klp. Lima, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 20),
(23, -10.1457601, 123.6527092, 'Apotek K-24 Oesapa', 'Jl. Timor Raya No.Km. 9, Oesapa, Klp. Lima, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 20),
(24, -10.1646629, 123.5893474, 'Prodia', 'Jl. Cak Doko No.52, Oetete, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85112', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 56),
(25, -10.170631, 123.5904741, 'Fauzi', 'Jl. Pemuda, Kuanino, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 27),
(26, -10.1825592, 123.5994805, 'Klinik Pratama Undana', 'Naikoten I, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 28),
(27, -10.183247, 123.6004695, 'Kimia Farma Naikolan', 'Naikolan, Maulafa, Kota Kupang, Nusa Tenggara Tim. 85142', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 45),
(28, -10.1653598, 123.6276735, 'Kimia Farma TDM', 'Tuak Daun Merah, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 57),
(29, -10.1631617, 123.6305145, 'Kupang Graha Medika', 'Tuak Daun Merah, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 57),
(30, -10.1732821, 123.596593, 'Kimia Farma Herewila', 'Naikoten II, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 29),
(31, -10.1757713, 123.5922043, 'Crystal Jaya', 'Kuanino, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 27),
(32, -10.1700304, 123.5869189, 'Kupang Farma', 'Jl. Jend. Sudirman No.146, Kupangkidul, Kupang, Kec. Ambarawa, Semarang, Jawa Tengah 50612', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 27),
(33, -10.1686328, 123.584952, 'Kimia Farma Fontein', 'Jl. Moch Hatta No.46, Fontein, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim. 85112', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 26),
(34, -10.1685502, 123.5847864, 'Fontein', 'Jl. Moch Hatta No.46, Fontein, Kec. Kota Raja, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 26),
(35, -10.1612967, 123.5845871, 'Apotik Ani', 'Jl. Urip Sumoharjo No.1, Merdeka, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim. 85225', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 36),
(36, -10.1603081, 123.5860739, 'Apotek K-24 Ahmad Yani', 'JL. A. Yani, No. 60, Oeba, Merdeka, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'N', 'Y', 'N', 'Y', 'N', 38),
(37, -10.1551851, 123.5909949, 'RS Mamami', 'Jalan R. W. Monginsidi I No. 3, Pasir Panjang, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim. 85228', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 39),
(38, -10.1568658, 123.6282, 'RS Kartini', 'Jl. Frans Seda No.17, Tuak Daun Merah, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85228', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 54),
(39, -10.170976, 123.6272226, 'RS Leona', 'Jl. Soverdi No.20, Oebufu, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85228', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 55),
(40, -10.1656662, 123.6254363, 'RS Dedari', 'Jalan Rantai Damai No.69D, Tuak Daun Merah, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85228\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 57),
(41, -10.1584731, 123.5953743, 'Apotik Tirta\r\n', 'Jl. Nangka 12 B Oeba- Kupang\r\n', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 38),
(42, -10.1579146, 123.5857439, 'rtc skin centre\r\n', 'Jl. Sumatera No.7, Fatubesi, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim.\r\n', 'Y', 'Y', 'Y', 'N', 'N', 'N', 33),
(43, -10.1549626, 123.6047507, 'Klinik Dermajune\r\n\r\n', 'Pasir Panjang, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim.\r\n\r\n', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 39),
(44, -10.1606937, 123.6103085, 'Mahkota', 'Mahkota Fitness Centre, Jl. R. W. Monginsidi, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 51),
(45, -14.6224069, 107.910533, 'Dental Care\r\n\r\n\r\n', 'sebelah Ja\'o Caffe, Jl. Frans Seda, Fatululi, Kec. Oebobo, Kota Kupang, Nusa Tenggara Tim. 85111\r\n\r\n\r\n', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 51),
(46, -13.219274, 107.889865, 'Gratcia', 'Jl. Sumatera No.24, Fatubesi, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim.\r\n\r\n\r\n', 'Y', 'Y', 'Y', 'N', 'Y', 'Y', 33),
(47, -10.1609799, 123.5852137, 'Kamilyane', 'Jl. A. Yani, Merdeka, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim.', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 36);

-- --------------------------------------------------------

--
-- Table structure for table `praktik`
--

CREATE TABLE `praktik` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `praktik`
--

INSERT INTO `praktik` (`id`, `id_dokter`, `id_lokasi`, `hari`, `jam_buka`, `jam_tutup`) VALUES
(29, 14, 19, 'senin', '09:00:00', '12:00:00'),
(28, 13, 19, 'senin', '15:00:00', '17:00:00'),
(27, 12, 19, 'senin', '08:00:00', '12:00:00'),
(18, 8, 2, 'Kamis', '17:30:00', '21:30:00'),
(17, 8, 2, 'Rabu', '17:30:00', '21:30:00'),
(16, 8, 2, 'Selasa', '17:30:00', '21:30:00'),
(15, 8, 2, 'Senin', '17:30:00', '21:30:00'),
(24, 11, 17, NULL, NULL, NULL),
(30, 15, 19, 'senin', '15:00:00', '18:00:00'),
(31, 16, 19, 'selasa', '09:00:00', '12:00:00'),
(32, 17, 19, NULL, NULL, NULL),
(33, 18, 19, 'senin', '14:00:00', '17:00:00'),
(34, 19, 19, 'senin', '16:00:00', '17:00:00'),
(35, 20, 19, 'senin', '14:00:00', '16:00:00'),
(36, 21, 19, 'senin', '09:00:00', '12:00:00'),
(37, 22, 19, 'senin', '12:00:00', '16:00:00'),
(38, 23, 19, 'senin', '09:00:00', '12:00:00'),
(39, 24, 19, 'senin', '15:00:00', '17:00:00'),
(40, 25, 19, 'selasa', '15:00:00', '16:30:00'),
(41, 26, 19, 'selasa', '14:00:00', '16:00:00'),
(42, 27, 19, 'senin', '14:00:00', '16:00:00'),
(329, 67, 21, 'selasa', '14:00:00', '15:00:00'),
(44, 29, 19, 'selasa', '18:00:00', '19:30:00'),
(45, 30, 19, 'senin', '15:00:00', '17:00:00'),
(46, 31, 19, 'senin', '09:00:00', '12:00:00'),
(47, 32, 19, 'senin', '15:00:00', '17:00:00'),
(48, 33, 19, 'senin', '15:00:00', '17:00:00'),
(49, 34, 19, 'senin', '09:00:00', '12:00:00'),
(50, 35, 19, 'senin', '10:00:00', '12:00:00'),
(51, 36, 19, 'selasa', '09:00:00', '11:00:00'),
(52, 37, 19, 'senin', '08:00:00', '12:00:00'),
(53, 38, 19, 'senin', '10:00:00', '12:00:00'),
(54, 39, 19, 'senin', '15:00:00', '17:00:00'),
(56, 41, 19, 'senin', '13:00:00', '15:30:00'),
(57, 42, 19, 'senin', '14:00:00', '16:00:00'),
(58, 43, 19, 'selasa', '13:00:00', '15:00:00'),
(59, 44, 19, 'senin', '12:00:00', '14:00:00'),
(60, 45, 19, 'senin', '17:00:00', '19:00:00'),
(61, 46, 19, 'senin', '08:00:00', '15:00:00'),
(62, 47, 19, 'senin', '16:00:00', '19:00:00'),
(64, 49, 19, 'senin', '08:00:00', '12:00:00'),
(65, 50, 19, 'senin', '08:00:00', '12:00:00'),
(66, 51, 20, NULL, NULL, NULL),
(67, 52, 20, NULL, NULL, NULL),
(68, 53, 20, NULL, NULL, NULL),
(69, 54, 20, NULL, NULL, NULL),
(70, 55, 20, NULL, NULL, NULL),
(71, 56, 20, NULL, NULL, NULL),
(72, 57, 20, NULL, NULL, NULL),
(73, 58, 20, NULL, NULL, NULL),
(74, 59, 20, NULL, NULL, NULL),
(75, 60, 20, NULL, NULL, NULL),
(76, 61, 20, NULL, NULL, NULL),
(77, 62, 20, NULL, NULL, NULL),
(78, 63, 20, NULL, NULL, NULL),
(79, 64, 20, NULL, NULL, NULL),
(80, 65, 20, NULL, NULL, NULL),
(81, 66, 21, NULL, NULL, NULL),
(82, 67, 21, 'senin', '14:00:00', '15:00:00'),
(83, 68, 21, 'senin', '14:00:00', '17:00:00'),
(84, 69, 21, 'senin', '14:00:00', '15:00:00'),
(85, 70, 21, 'senin', '14:00:00', '15:00:00'),
(86, 71, 21, 'senin', '14:00:00', '15:00:00'),
(87, 72, 21, 'senin', '14:00:00', '15:00:00'),
(88, 73, 21, 'senin', '07:00:00', '15:00:00'),
(89, 74, 22, 'senin', '17:00:00', '22:00:00'),
(90, 75, 22, 'senin', '17:00:00', '22:00:00'),
(91, 76, 23, 'senin', '17:00:00', '20:00:00'),
(92, 23, 24, 'senin', '09:00:00', '12:00:00'),
(93, 77, 25, 'senin', '17:00:00', '21:00:00'),
(94, 78, 26, 'senin', '08:00:00', '21:00:00'),
(95, 79, 26, 'senin', '08:00:00', '21:00:00'),
(96, 80, 27, 'senin', '18:00:00', '21:00:00'),
(97, 81, 27, 'senin', '18:00:00', '21:00:00'),
(98, 82, 28, NULL, NULL, NULL),
(99, 83, 29, 'senin', '16:30:00', '20:00:00'),
(100, 84, 29, 'senin', '18:00:00', '21:00:00'),
(101, 85, 29, 'senin', '16:00:00', '21:00:00'),
(102, 86, 29, 'senin', '15:00:00', '20:00:00'),
(103, 87, 30, 'senin', '09:00:00', '12:00:00'),
(104, 88, 30, 'senin', '17:00:00', '21:00:00'),
(105, 89, 31, 'senin', '16:00:00', '20:00:00'),
(106, 90, 32, NULL, NULL, NULL),
(107, 91, 32, NULL, NULL, NULL),
(108, 92, 32, NULL, NULL, NULL),
(109, 93, 33, 'senin', '18:00:00', '22:00:00'),
(110, 94, 33, 'senin', '18:00:00', '21:00:00'),
(111, 26, 33, NULL, NULL, NULL),
(112, 57, 33, 'senin', '18:00:00', '21:00:00'),
(116, 96, 34, 'senin', '08:00:00', '13:00:00'),
(115, 95, 34, 'senin', '09:00:00', '21:00:00'),
(117, 97, 34, 'senin', '08:00:00', '13:00:00'),
(118, 98, 35, 'senin', '18:00:00', '21:00:00'),
(119, 99, 35, 'senin', '17:00:00', '21:00:00'),
(120, 100, 35, 'selasa', '17:00:00', '19:00:00'),
(121, 8, 2, 'jumat', '17:30:00', '21:30:00'),
(122, 8, 2, 'sabtu', '17:30:00', '21:30:00'),
(123, 101, 2, 'senin', '17:00:00', '20:00:00'),
(124, 102, 2, 'senin', '19:30:00', '21:30:00'),
(125, 101, 2, 'selasa', '17:00:00', '20:00:00'),
(126, 101, 2, 'rabu', '17:00:00', '20:00:00'),
(127, 101, 2, 'kamis', '17:00:00', '20:00:00'),
(128, 101, 2, 'jumat', '17:00:00', '20:00:00'),
(129, 101, 2, 'sabtu', '17:00:00', '20:00:00'),
(130, 103, 36, 'senin', '18:00:00', '22:00:00'),
(131, 103, 36, 'selasa', '18:00:00', '22:00:00'),
(132, 103, 36, 'rabu', '18:00:00', '22:00:00'),
(133, 103, 36, 'kamis', '18:00:00', '20:00:00'),
(134, 103, 36, 'jumat', '18:00:00', '20:00:00'),
(135, 103, 36, 'sabtu', '18:00:00', '22:00:00'),
(136, 109, 38, 'senin', '09:00:00', '12:00:00'),
(137, 112, 37, 'senin', '16:00:00', '17:00:00'),
(138, 129, 37, NULL, NULL, NULL),
(139, 130, 37, NULL, NULL, NULL),
(140, 131, 37, NULL, NULL, NULL),
(141, 132, 37, 'senin', '12:00:00', '14:00:00'),
(142, 133, 37, 'jumat', '18:00:00', '20:00:00'),
(143, 134, 37, NULL, NULL, NULL),
(144, 135, 37, 'senin', '12:00:00', '13:00:00'),
(145, 136, 37, 'senin', '13:00:00', '14:00:00'),
(146, 137, 37, 'senin', '08:00:00', '09:00:00'),
(147, 138, 37, NULL, NULL, NULL),
(148, 139, 37, 'rabu', '14:00:00', '15:00:00'),
(149, 140, 37, 'selasa', '18:00:00', '20:00:00'),
(150, 141, 37, 'senin', '19:00:00', '20:00:00'),
(151, 142, 37, NULL, NULL, NULL),
(152, 109, 38, NULL, NULL, NULL),
(153, 41, 38, 'senin', '08:00:00', '13:00:00'),
(154, 111, 38, 'selasa', '08:00:00', '13:00:00'),
(155, 112, 38, 'senin', '18:00:00', '20:00:00'),
(156, 113, 38, 'senin', '13:00:00', '15:00:00'),
(157, 114, 38, 'senin', '08:00:00', '11:00:00'),
(158, 115, 38, 'senin', '08:00:00', '12:00:00'),
(159, 116, 38, 'kamis', '18:00:00', '21:00:00'),
(160, 117, 38, 'senin', '08:00:00', '12:00:00'),
(161, 118, 38, 'senin', '08:00:00', '17:00:00'),
(162, 119, 38, 'senin', '07:00:00', '20:00:00'),
(163, 120, 38, 'senin', '15:00:00', '17:00:00'),
(164, 68, 38, 'senin', '18:00:00', '19:00:00'),
(165, 122, 38, 'senin', '10:00:00', '12:00:00'),
(166, 123, 38, 'senin', '19:00:00', '21:00:00'),
(167, 124, 38, 'senin', '09:00:00', '11:00:00'),
(168, 125, 38, 'senin', '07:00:00', '15:00:00'),
(169, 126, 38, 'senin', '07:00:00', '15:00:00'),
(170, 12, 19, 'senin', '15:00:00', '17:00:00'),
(171, 12, 19, 'selasa', '08:00:00', '12:00:00'),
(172, 12, 19, 'selasa', '15:00:00', '17:00:00'),
(173, 12, 19, 'rabu', '08:00:00', '12:00:00'),
(174, 12, 19, 'rabu', '15:00:00', '17:00:00'),
(175, 12, 19, 'kamis', '08:00:00', '12:00:00'),
(176, 12, 19, 'kamis', '15:00:00', '17:00:00'),
(177, 12, 19, 'jumat', '08:00:00', '12:00:00'),
(178, 12, 19, 'jumat', '15:00:00', '17:00:00'),
(179, 12, 19, 'sabtu', '08:00:00', '12:00:00'),
(180, 13, 19, 'selasa', '15:00:00', '17:00:00'),
(181, 13, 19, 'rabu', '15:00:00', '17:00:00'),
(182, 13, 19, 'kamis', '15:00:00', '17:00:00'),
(183, 13, 19, 'jumat', '15:00:00', '17:00:00'),
(184, 13, 19, 'sabtu', '08:00:00', '10:00:00'),
(185, 14, 19, 'selasa', '09:00:00', '12:00:00'),
(186, 14, 19, 'rabu', '09:00:00', '12:00:00'),
(187, 14, 19, 'kamis', '09:00:00', '12:00:00'),
(188, 14, 19, 'jumat', '09:00:00', '12:00:00'),
(189, 14, 19, 'sabtu', '09:00:00', '12:00:00'),
(190, 15, 19, 'rabu', '15:00:00', '18:00:00'),
(191, 15, 19, 'jumat', '15:00:00', '18:00:00'),
(192, 16, 19, 'selasa', '09:00:00', '12:00:00'),
(193, 16, 19, 'rabu', '09:00:00', '12:00:00'),
(194, 16, 19, 'kamis', '09:00:00', '12:00:00'),
(195, 16, 19, 'jumat', '09:00:00', '12:00:00'),
(196, 16, 19, 'sabtu', '09:00:00', '12:00:00'),
(197, 16, 19, 'rabu', '09:00:00', '12:00:00'),
(198, 16, 19, 'kamis', '09:00:00', '12:00:00'),
(199, 16, 19, 'jumat', '09:00:00', '12:00:00'),
(200, 16, 19, 'sabtu', '09:00:00', '12:00:00'),
(201, 16, 19, 'senin', '09:00:00', '12:00:00'),
(202, 18, 19, 'rabu', '14:00:00', '17:00:00'),
(203, 18, 19, 'jumat', '14:00:00', '17:00:00'),
(204, 19, 19, 'selasa', '16:00:00', '17:00:00'),
(205, 19, 19, 'rabu', '16:00:00', '17:00:00'),
(206, 19, 19, 'kamis', '16:00:00', '17:00:00'),
(207, 19, 19, 'jumat', '16:00:00', '17:00:00'),
(208, 20, 19, 'selasa', '14:00:00', '16:00:00'),
(209, 20, 19, 'rabu', '14:00:00', '16:00:00'),
(210, 20, 19, 'kamis', '14:00:00', '16:00:00'),
(211, 20, 19, 'jumat', '14:00:00', '16:00:00'),
(212, 21, 19, 'selasa', '09:00:00', '12:00:00'),
(213, 21, 19, 'rabu', '09:00:00', '12:00:00'),
(214, 21, 19, 'kamis', '09:00:00', '12:00:00'),
(215, 21, 19, 'jumat', '09:00:00', '12:00:00'),
(216, 22, 19, 'selasa', '12:00:00', '16:00:00'),
(217, 22, 19, 'rabu', '12:00:00', '16:00:00'),
(218, 22, 19, 'kamis', '12:00:00', '16:00:00'),
(219, 22, 19, 'jumat', '12:00:00', '16:00:00'),
(220, 23, 19, 'selasa', '09:00:00', '12:00:00'),
(221, 23, 19, 'rabu', '09:00:00', '12:00:00'),
(222, 23, 19, 'kamis', '09:00:00', '12:00:00'),
(223, 23, 19, 'jumat', '09:00:00', '12:00:00'),
(224, 23, 19, 'sabtu', '09:00:00', '12:00:00'),
(225, 25, 19, 'rabu', '15:00:00', '16:30:00'),
(226, 25, 19, 'jumat', '15:00:00', '16:30:00'),
(227, 26, 19, 'kamis', '14:00:00', '16:00:00'),
(228, 27, 19, 'selasa', '14:00:00', '16:00:00'),
(229, 27, 19, 'rabu', '14:00:00', '16:00:00'),
(230, 27, 19, 'kamis', '14:00:00', '16:00:00'),
(232, 29, 19, 'rabu', '09:00:00', '11:00:00'),
(233, 29, 19, 'kamis', '18:00:00', '19:30:00'),
(234, 29, 19, 'jumat', '09:00:00', '11:00:00'),
(236, 29, 19, 'minggu', '10:00:00', '12:00:00'),
(237, 30, 19, 'selasa', '15:00:00', '17:00:00'),
(238, 30, 19, 'rabu', '15:00:00', '17:00:00'),
(239, 30, 19, 'kamis', '15:00:00', '17:00:00'),
(240, 30, 19, 'jumat', '15:00:00', '17:00:00'),
(241, 30, 19, 'sabtu', '15:00:00', '17:00:00'),
(242, 31, 19, 'selasa', '09:00:00', '12:00:00'),
(243, 31, 19, 'rabu', '09:00:00', '12:00:00'),
(244, 31, 19, 'kamis', '09:00:00', '12:00:00'),
(245, 31, 19, 'jumat', '09:00:00', '12:00:00'),
(246, 31, 19, 'sabtu', '09:00:00', '12:00:00'),
(247, 32, 19, 'rabu', '15:00:00', '17:00:00'),
(248, 32, 19, 'jumat', '15:00:00', '17:00:00'),
(249, 32, 19, 'sabtu', '11:00:00', '13:00:00'),
(250, 24, 19, 'selasa', '15:00:00', '17:00:00'),
(251, 24, 19, 'rabu', '15:00:00', '17:00:00'),
(252, 24, 19, 'kamis', '15:00:00', '17:00:00'),
(253, 24, 19, 'jumat', '15:00:00', '17:00:00'),
(254, 33, 19, 'selasa', '15:00:00', '17:00:00'),
(255, 33, 19, 'rabu', '15:00:00', '17:00:00'),
(256, 33, 19, 'kamis', '15:00:00', '17:00:00'),
(257, 34, 19, 'senin', '17:00:00', '19:00:00'),
(258, 34, 19, 'selasa', '09:00:00', '12:00:00'),
(259, 34, 19, 'selasa', '17:00:00', '19:00:00'),
(260, 34, 19, 'rabu', '09:00:00', '12:00:00'),
(261, 34, 19, 'rabu', '17:00:00', '19:00:00'),
(262, 34, 19, 'kamis', '17:00:00', '19:00:00'),
(263, 34, 19, 'kamis', '17:00:00', '19:00:00'),
(264, 34, 19, 'jumat', '17:00:00', '19:00:00'),
(265, 34, 19, 'jumat', '17:00:00', '19:00:00'),
(266, 35, 19, 'senin', '15:00:00', '17:00:00'),
(267, 35, 19, 'rabu', '10:00:00', '12:00:00'),
(268, 35, 19, 'rabu', '15:00:00', '17:00:00'),
(269, 35, 19, 'jumat', '10:00:00', '12:00:00'),
(270, 35, 19, 'jumat', '15:00:00', '17:00:00'),
(271, 36, 19, 'selasa', '15:00:00', '17:00:00'),
(272, 36, 19, 'kamis', '09:00:00', '11:00:00'),
(273, 36, 19, 'kamis', '15:00:00', '17:00:00'),
(274, 36, 19, 'sabtu', '11:00:00', '13:00:00'),
(276, 37, 19, 'senin', '16:00:00', '20:00:00'),
(277, 37, 19, 'selasa', '08:00:00', '12:00:00'),
(278, 37, 19, 'selasa', '16:00:00', '20:00:00'),
(279, 37, 19, 'rabu', '08:00:00', '12:00:00'),
(280, 37, 19, 'rabu', '16:00:00', '20:00:00'),
(281, 37, 19, 'kamis', '08:00:00', '12:00:00'),
(282, 37, 19, 'kamis', '16:00:00', '20:00:00'),
(283, 37, 19, 'jumat', '08:00:00', '12:00:00'),
(284, 37, 19, 'jumat', '16:00:00', '20:00:00'),
(285, 37, 19, 'sabtu', '08:00:00', '12:00:00'),
(286, 37, 19, 'minggu', '10:00:00', '12:00:00'),
(288, 38, 19, 'senin', '15:00:00', '17:00:00'),
(289, 38, 19, 'selasa', '15:00:00', '17:00:00'),
(290, 38, 19, 'rabu', '10:00:00', '12:00:00'),
(291, 38, 19, 'rabu', '15:00:00', '17:00:00'),
(292, 38, 19, 'kamis', '15:00:00', '17:00:00'),
(293, 38, 19, 'jumat', '10:00:00', '12:00:00'),
(294, 38, 19, 'jumat', '15:00:00', '17:00:00'),
(295, 38, 19, 'sabtu', '10:00:00', '12:00:00'),
(296, 39, 19, 'rabu', '15:00:00', '17:00:00'),
(297, 39, 19, 'sabtu', '15:00:00', '17:00:00'),
(298, 41, 19, 'selasa', '09:00:00', '12:00:00'),
(299, 41, 19, 'rabu', '13:00:00', '15:30:00'),
(300, 41, 19, 'kamis', '09:00:00', '12:00:00'),
(301, 41, 19, 'sabtu', '09:00:00', '12:00:00'),
(302, 41, 19, 'minggu', '10:00:00', '12:00:00'),
(304, 42, 19, 'rabu', '14:00:00', '16:00:00'),
(305, 43, 19, 'kamis', '13:00:00', '15:00:00'),
(306, 44, 19, 'rabu', '12:00:00', '14:00:00'),
(307, 45, 19, 'selasa', '17:00:00', '19:00:00'),
(308, 45, 19, 'rabu', '17:00:00', '19:00:00'),
(309, 45, 19, 'kamis', '17:00:00', '19:00:00'),
(310, 45, 19, 'jumat', '17:00:00', '19:00:00'),
(311, 46, 19, 'selasa', '08:00:00', '15:00:00'),
(312, 46, 19, 'rabu', '08:00:00', '15:00:00'),
(313, 46, 19, 'kamis', '08:00:00', '15:00:00'),
(314, 46, 19, 'jumat', '08:00:00', '15:00:00'),
(315, 46, 19, 'sabtu', '08:00:00', '15:00:00'),
(316, 47, 19, 'selasa', '16:00:00', '19:00:00'),
(317, 47, 19, 'rabu', '16:00:00', '19:00:00'),
(318, 47, 19, 'kamis', '16:00:00', '19:00:00'),
(319, 47, 19, 'jumat', '16:00:00', '19:00:00'),
(320, 49, 19, 'rabu', '08:00:00', '12:00:00'),
(321, 49, 19, 'kamis', '08:00:00', '12:00:00'),
(322, 49, 19, 'jumat', '08:00:00', '12:00:00'),
(323, 49, 19, 'sabtu', '08:00:00', '12:00:00'),
(324, 50, 19, 'selasa', '08:00:00', '12:00:00'),
(325, 50, 19, 'rabu', '08:00:00', '12:00:00'),
(326, 50, 19, 'kamis', '08:00:00', '12:00:00'),
(327, 50, 19, 'jumat', '08:00:00', '12:00:00'),
(328, 50, 19, 'sabtu', '08:00:00', '12:00:00'),
(330, 67, 21, 'rabu', '14:00:00', '15:00:00'),
(331, 67, 21, 'kamis', '14:00:00', '15:00:00'),
(332, 67, 21, 'jumat', '14:00:00', '15:00:00'),
(333, 67, 21, 'sabtu', '14:00:00', '15:00:00'),
(334, 68, 21, 'selasa', '14:00:00', '17:00:00'),
(335, 68, 21, 'rabu', '14:00:00', '17:00:00'),
(336, 68, 21, 'kamis', '14:00:00', '17:00:00'),
(337, 68, 21, 'jumat', '14:00:00', '17:00:00'),
(338, 68, 21, 'sabtu', '14:00:00', '17:00:00'),
(339, 69, 21, 'selasa', '14:00:00', '15:00:00'),
(340, 69, 21, 'rabu', '14:00:00', '15:00:00'),
(341, 69, 21, 'kamis', '14:00:00', '15:00:00'),
(342, 69, 21, 'jumat', '14:00:00', '15:00:00'),
(343, 69, 21, 'sabtu', '14:00:00', '15:00:00'),
(344, 70, 21, 'selasa', '14:00:00', '15:00:00'),
(345, 70, 21, 'rabu', '14:00:00', '15:00:00'),
(346, 70, 21, 'kamis', '14:00:00', '15:00:00'),
(347, 70, 21, 'jumat', '14:00:00', '15:00:00'),
(348, 70, 21, 'sabtu', '14:00:00', '15:00:00'),
(349, 71, 21, 'senin', '17:00:00', '20:00:00'),
(350, 71, 21, 'selasa', '14:00:00', '15:00:00'),
(351, 71, 21, 'rabu', '14:00:00', '15:00:00'),
(352, 71, 21, 'rabu', '17:00:00', '20:00:00'),
(353, 71, 21, 'kamis', '14:00:00', '15:00:00'),
(354, 71, 21, 'jumat', '14:00:00', '15:00:00'),
(355, 71, 21, 'jumat', '17:00:00', '20:00:00'),
(356, 71, 21, 'sabtu', '14:00:00', '15:00:00'),
(357, 72, 21, 'selasa', '14:00:00', '15:00:00'),
(358, 72, 21, 'rabu', '14:00:00', '15:00:00'),
(359, 72, 21, 'kamis', '14:00:00', '15:00:00'),
(360, 72, 21, 'jumat', '14:00:00', '15:00:00'),
(361, 72, 21, 'sabtu', '14:00:00', '15:00:00'),
(362, 73, 21, 'selasa', '07:00:00', '15:00:00'),
(363, 73, 21, 'rabu', '07:00:00', '15:00:00'),
(364, 73, 21, 'kamis', '07:00:00', '15:00:00'),
(365, 73, 21, 'jumat', '07:00:00', '15:00:00'),
(366, 73, 21, 'sabtu', '07:00:00', '15:00:00'),
(367, 109, 38, 'selasa', '09:00:00', '12:00:00'),
(368, 109, 38, 'rabu', '09:00:00', '12:00:00'),
(369, 109, 38, 'kamis', '09:00:00', '12:00:00'),
(370, 109, 38, 'jumat', '09:00:00', '12:00:00'),
(371, 109, 38, 'sabtu', '09:00:00', '12:00:00'),
(372, 41, 38, 'rabu', '08:00:00', '13:00:00'),
(373, 41, 38, 'jumat', '08:00:00', '13:00:00'),
(374, 111, 38, 'kamis', '08:00:00', '13:00:00'),
(375, 111, 38, 'sabtu', '08:00:00', '13:00:00'),
(376, 112, 38, 'selasa', '18:00:00', '20:00:00'),
(377, 112, 38, 'rabu', '18:00:00', '20:00:00'),
(378, 112, 38, 'kamis', '18:00:00', '20:00:00'),
(379, 112, 38, 'jumat', '18:00:00', '20:00:00'),
(380, 113, 38, 'selasa', '11:00:00', '13:00:00'),
(381, 113, 38, 'rabu', '11:00:00', '13:00:00'),
(382, 113, 38, 'kamis', '13:00:00', '15:00:00'),
(383, 113, 38, 'jumat', '11:00:00', '13:00:00'),
(384, 113, 38, 'sabtu', '13:00:00', '15:00:00'),
(385, 114, 38, 'selasa', '08:00:00', '11:00:00'),
(386, 114, 38, 'rabu', '08:00:00', '11:00:00'),
(387, 114, 38, 'kamis', '08:00:00', '11:00:00'),
(388, 114, 38, 'jumat', '08:00:00', '11:00:00'),
(389, 115, 38, 'senin', '18:00:00', '20:00:00'),
(390, 115, 38, 'selasa', '08:00:00', '12:00:00'),
(391, 115, 38, 'rabu', '08:00:00', '12:00:00'),
(392, 115, 38, 'rabu', '18:00:00', '20:00:00'),
(393, 115, 38, 'kamis', '08:00:00', '12:00:00'),
(394, 115, 38, 'jumat', '08:00:00', '12:00:00'),
(395, 116, 38, 'jumat', '18:00:00', '21:00:00'),
(396, 116, 38, 'sabtu', '09:00:00', '13:00:00'),
(397, 116, 38, 'sabtu', '18:00:00', '21:00:00'),
(398, 117, 38, 'selasa', '08:00:00', '12:00:00'),
(399, 117, 38, 'rabu', '08:00:00', '12:00:00'),
(400, 117, 38, 'kamis', '08:00:00', '12:00:00'),
(401, 117, 38, 'jumat', '08:00:00', '12:00:00'),
(402, 118, 38, 'selasa', '08:00:00', '17:00:00'),
(403, 118, 38, 'rabu', '08:00:00', '17:00:00'),
(404, 118, 38, 'kamis', '08:00:00', '17:00:00'),
(405, 118, 38, 'jumat', '08:00:00', '17:00:00'),
(406, 119, 38, 'selasa', '07:00:00', '20:00:00'),
(407, 119, 38, 'kamis', '07:00:00', '20:00:00'),
(408, 119, 38, 'jumat', '07:00:00', '20:00:00'),
(409, 120, 38, 'selasa', '15:00:00', '17:00:00'),
(410, 120, 38, 'rabu', '15:00:00', '17:00:00'),
(411, 120, 38, 'kamis', '15:00:00', '17:00:00'),
(412, 120, 38, 'jumat', '15:00:00', '17:00:00'),
(413, 68, 38, 'rabu', '18:00:00', '19:00:00'),
(414, 68, 38, 'jumat', '18:00:00', '19:00:00'),
(415, 122, 38, 'rabu', '10:00:00', '12:00:00'),
(416, 122, 38, 'jumat', '10:00:00', '12:00:00'),
(417, 123, 38, 'rabu', '19:00:00', '21:00:00'),
(418, 123, 38, 'jumat', '19:00:00', '21:00:00'),
(419, 124, 38, 'selasa', '09:00:00', '11:00:00'),
(420, 124, 38, 'rabu', '09:00:00', '11:00:00'),
(421, 124, 38, 'kamis', '09:00:00', '11:00:00'),
(422, 124, 38, 'jumat', '09:00:00', '11:00:00'),
(423, 125, 38, 'selasa', '07:00:00', '15:00:00'),
(424, 125, 38, 'rabu', '07:00:00', '15:00:00'),
(425, 125, 38, 'kamis', '07:00:00', '15:00:00'),
(426, 125, 38, 'jumat', '07:00:00', '15:00:00'),
(427, 125, 38, 'sabtu', '07:00:00', '15:00:00'),
(428, 126, 38, 'selasa', '07:00:00', '15:00:00'),
(429, 126, 38, 'rabu', '07:00:00', '15:00:00'),
(430, 126, 38, 'kamis', '07:00:00', '15:00:00'),
(431, 126, 38, 'jumat', '07:00:00', '15:00:00'),
(432, 126, 38, 'sabtu', '07:00:00', '15:00:00'),
(433, 112, 37, 'kamis', '16:00:00', '17:00:00'),
(434, 70, 37, 'senin', '07:00:00', '10:00:00'),
(435, 70, 37, 'selasa', '07:00:00', '10:00:00'),
(436, 70, 37, 'kamis', '07:00:00', '10:00:00'),
(437, 70, 37, 'jumat', '07:00:00', '10:00:00'),
(438, 132, 37, 'selasa', '12:00:00', '14:00:00'),
(439, 132, 37, 'rabu', '12:00:00', '14:00:00'),
(440, 132, 37, 'kamis', '12:00:00', '14:00:00'),
(441, 132, 37, 'jumat', '12:00:00', '14:00:00'),
(442, 132, 37, 'sabtu', '12:00:00', '14:00:00'),
(443, 101, 37, 'senin', '09:00:00', '10:00:00'),
(444, 101, 37, 'selasa', '09:00:00', '10:00:00'),
(445, 101, 37, 'rabu', '09:00:00', '10:00:00'),
(446, 101, 37, 'kamis', '09:00:00', '10:00:00'),
(447, 101, 37, 'jumat', '09:00:00', '10:00:00'),
(448, 101, 37, 'sabtu', '09:00:00', '10:00:00'),
(449, 135, 37, 'selasa', '12:00:00', '13:00:00'),
(450, 135, 37, 'rabu', '12:00:00', '13:00:00'),
(451, 135, 37, 'kamis', '12:00:00', '13:00:00'),
(452, 135, 37, 'jumat', '12:00:00', '13:00:00'),
(453, 135, 37, 'sabtu', '12:00:00', '13:00:00'),
(454, 136, 37, 'kamis', '13:00:00', '14:00:00'),
(455, 137, 37, 'selasa', '08:00:00', '09:00:00'),
(456, 137, 37, 'rabu', '08:00:00', '09:00:00'),
(457, 139, 37, 'jumat', '14:00:00', '15:00:00'),
(458, 140, 37, 'jumat', '18:00:00', '20:00:00'),
(459, 141, 37, 'selasa', '19:00:00', '20:00:00'),
(460, 141, 37, 'rabu', '19:00:00', '20:00:00'),
(461, 141, 37, 'kamis', '19:00:00', '20:00:00'),
(462, 141, 37, 'jumat', '19:00:00', '20:00:00'),
(463, 141, 37, 'sabtu', '19:00:00', '20:00:00'),
(464, 74, 22, 'selasa', '17:00:00', '22:00:00'),
(465, 74, 22, 'rabu', '17:00:00', '22:00:00'),
(466, 74, 22, 'kamis', '17:00:00', '22:00:00'),
(467, 74, 22, 'jumat', '17:00:00', '22:00:00'),
(468, 74, 22, 'sabtu', '17:00:00', '22:00:00'),
(469, 75, 22, 'rabu', '17:00:00', '22:00:00'),
(470, 75, 22, 'kamis', '17:00:00', '22:00:00'),
(471, 75, 22, 'jumat', '17:00:00', '22:00:00'),
(472, 75, 22, 'sabtu', '17:00:00', '22:00:00'),
(473, 75, 22, 'selasa', '17:00:00', '22:00:00'),
(474, 76, 23, 'selasa', '17:00:00', '20:00:00'),
(475, 76, 23, 'rabu', '17:00:00', '20:00:00'),
(476, 76, 23, 'kamis', '17:00:00', '20:00:00'),
(477, 76, 23, 'jumat', '17:00:00', '20:00:00'),
(478, 76, 23, 'sabtu', '17:00:00', '20:00:00'),
(479, 23, 24, 'senin', '17:00:00', '20:00:00'),
(480, 23, 24, 'selasa', '09:00:00', '12:00:00'),
(481, 23, 24, 'selasa', '17:00:00', '20:00:00'),
(482, 23, 24, 'rabu', '09:00:00', '12:00:00'),
(483, 23, 24, 'rabu', '17:00:00', '20:00:00'),
(484, 23, 24, 'kamis', '09:00:00', '12:00:00'),
(485, 23, 24, 'kamis', '17:00:00', '20:00:00'),
(486, 23, 24, 'jumat', '09:00:00', '12:00:00'),
(487, 23, 24, 'jumat', '17:00:00', '20:00:00'),
(488, 23, 24, 'sabtu', '09:00:00', '12:00:00'),
(489, 23, 24, 'sabtu', '17:00:00', '20:00:00'),
(490, 77, 25, 'selasa', '17:00:00', '21:00:00'),
(491, 77, 25, 'rabu', '17:00:00', '21:00:00'),
(492, 77, 25, 'kamis', '17:00:00', '21:00:00'),
(493, 77, 25, 'jumat', '17:00:00', '21:00:00'),
(494, 77, 25, 'sabtu', '17:00:00', '21:00:00'),
(495, 78, 26, 'selasa', '08:00:00', '21:00:00'),
(496, 78, 26, 'rabu', '08:00:00', '21:00:00'),
(497, 78, 26, 'kamis', '08:00:00', '21:00:00'),
(498, 78, 26, 'jumat', '08:00:00', '21:00:00'),
(499, 78, 26, 'sabtu', '08:00:00', '21:00:00'),
(500, 79, 26, 'selasa', '08:00:00', '21:00:00'),
(501, 79, 26, 'rabu', '08:00:00', '21:00:00'),
(502, 79, 26, 'kamis', '08:00:00', '21:00:00'),
(503, 79, 26, 'jumat', '08:00:00', '21:00:00'),
(504, 79, 26, 'sabtu', '08:00:00', '21:00:00'),
(505, 111, 39, NULL, NULL, NULL),
(506, 129, 39, NULL, NULL, NULL),
(507, 139, 39, NULL, NULL, NULL),
(508, 58, 39, NULL, NULL, NULL),
(509, 122, 39, NULL, NULL, NULL),
(510, 60, 39, NULL, NULL, NULL),
(511, 143, 39, NULL, NULL, NULL),
(512, 144, 39, NULL, NULL, NULL),
(513, 145, 39, NULL, NULL, NULL),
(514, 147, 39, NULL, NULL, NULL),
(515, 148, 39, NULL, NULL, NULL),
(516, 149, 39, NULL, NULL, NULL),
(517, 150, 39, NULL, NULL, NULL),
(518, 151, 39, NULL, NULL, NULL),
(519, 152, 39, NULL, NULL, NULL),
(520, 153, 30, NULL, NULL, NULL),
(521, 154, 39, NULL, NULL, NULL),
(522, 155, 39, NULL, NULL, NULL),
(523, 156, 39, NULL, NULL, NULL),
(524, 157, 39, NULL, NULL, NULL),
(525, 52, 40, NULL, NULL, NULL),
(526, 63, 40, NULL, NULL, NULL),
(527, 158, 40, NULL, NULL, NULL),
(528, 159, 40, NULL, NULL, NULL),
(529, 160, 40, NULL, NULL, NULL),
(530, 161, 40, NULL, NULL, NULL),
(531, 162, 40, NULL, NULL, NULL),
(532, 163, 40, NULL, NULL, NULL),
(533, 164, 40, NULL, NULL, NULL),
(534, 165, 41, NULL, NULL, NULL),
(535, 108, 42, 'senin', '08:00:00', '20:00:00'),
(536, 167, 43, NULL, NULL, NULL),
(537, 27, 43, NULL, NULL, NULL),
(538, 168, 44, NULL, NULL, NULL),
(539, 169, 16, NULL, NULL, NULL),
(540, 170, 16, NULL, NULL, NULL),
(541, 171, 16, NULL, NULL, NULL),
(542, 172, 16, NULL, NULL, NULL),
(543, 173, 16, NULL, NULL, NULL),
(544, 174, 16, NULL, NULL, NULL),
(545, 175, 45, NULL, NULL, NULL),
(546, 176, 45, NULL, NULL, NULL),
(547, 24, 45, NULL, NULL, NULL),
(548, 137, 46, 'senin', '17:00:00', '21:00:00'),
(549, 177, 46, 'senin', '08:00:00', '12:00:00'),
(550, 135, 46, NULL, NULL, NULL),
(551, 102, 2, 'selasa', '19:30:00', '21:30:00'),
(552, 102, 2, 'rabu', '19:30:00', '21:30:00'),
(553, 102, 2, 'kamis', '19:30:00', '21:30:00'),
(554, 102, 2, 'jumat', '19:30:00', '21:30:00'),
(555, 102, 2, 'sabtu', '19:30:00', '21:30:00'),
(556, 70, 47, 'senin', '08:00:00', '11:00:00'),
(557, 70, 47, 'senin', '18:00:00', '22:00:00'),
(558, 70, 47, 'selasa', '08:00:00', '11:00:00'),
(559, 70, 47, 'selasa', '18:00:00', '22:00:00'),
(560, 70, 47, 'rabu', '08:00:00', '11:00:00'),
(561, 70, 47, 'rabu', '18:00:00', '22:00:00'),
(562, 70, 47, 'kamis', '08:00:00', '11:00:00'),
(563, 70, 47, 'kamis', '18:00:00', '22:00:00'),
(564, 70, 47, 'jumat', '08:00:00', '11:00:00'),
(565, 70, 47, 'jumat', '18:00:00', '22:00:00'),
(566, 70, 47, 'sabtu', '08:00:00', '11:00:00'),
(567, 70, 47, 'sabtu', '18:00:00', '22:00:00'),
(568, 67, 47, 'senin', '19:00:00', '22:00:00'),
(569, 67, 47, 'rabu', '19:00:00', '22:00:00'),
(570, 67, 47, 'jumat', '19:00:00', '22:00:00'),
(571, 98, 35, 'selasa', '18:00:00', '21:00:00'),
(572, 98, 35, 'rabu', '18:00:00', '21:00:00'),
(573, 98, 35, 'kamis', '18:00:00', '21:00:00'),
(574, 98, 35, 'jumat', '18:00:00', '21:00:00'),
(575, 98, 35, 'sabtu', '18:00:00', '21:00:00'),
(576, 99, 35, 'selasa', '17:00:00', '21:00:00'),
(577, 99, 35, 'rabu', '17:00:00', '21:00:00'),
(578, 99, 35, 'kamis', '17:00:00', '21:00:00'),
(579, 99, 35, 'jumat', '17:00:00', '21:00:00'),
(580, 99, 35, 'sabtu', '17:00:00', '21:00:00'),
(581, 100, 35, 'senin', '17:00:00', '19:00:00'),
(582, 100, 35, 'jumat', '17:00:00', '19:00:00'),
(583, 100, 35, 'kamis', '17:00:00', '19:00:00'),
(584, 100, 35, 'sabtu', '17:00:00', '19:00:00'),
(585, 100, 35, 'rabu', '17:00:00', '19:00:00'),
(586, 95, 34, 'selasa', '09:00:00', '21:00:00'),
(587, 95, 34, 'rabu', '09:00:00', '21:00:00'),
(588, 95, 34, 'kamis', '09:00:00', '21:00:00'),
(589, 95, 34, 'jumat', '09:00:00', '21:00:00'),
(590, 95, 34, 'sabtu', '09:00:00', '21:00:00'),
(591, 95, 34, 'minggu', '09:00:00', '21:00:00'),
(592, 96, 34, 'senin', '16:00:00', '21:00:00'),
(593, 96, 34, 'selasa', '08:00:00', '13:00:00'),
(594, 96, 34, 'selasa', '16:00:00', '21:00:00'),
(595, 96, 34, 'rabu', '08:00:00', '13:00:00'),
(596, 96, 34, 'rabu', '16:00:00', '21:00:00'),
(597, 96, 34, 'kamis', '08:00:00', '13:00:00'),
(598, 96, 34, 'kamis', '16:00:00', '21:00:00'),
(599, 96, 34, 'jumat', '08:00:00', '13:00:00'),
(600, 96, 34, 'jumat', '16:00:00', '21:00:00'),
(601, 96, 34, 'sabtu', '08:00:00', '13:00:00'),
(602, 96, 34, 'sabtu', '16:00:00', '21:00:00'),
(603, 97, 34, 'senin', '16:00:00', '21:00:00'),
(604, 97, 34, 'selasa', '08:00:00', '13:00:00'),
(605, 97, 34, 'selasa', '16:00:00', '21:00:00'),
(606, 97, 34, 'rabu', '08:00:00', '13:00:00'),
(607, 97, 34, 'rabu', '16:00:00', '21:00:00'),
(608, 97, 34, 'kamis', '08:00:00', '13:00:00'),
(609, 97, 34, 'kamis', '16:00:00', '21:00:00'),
(610, 97, 34, 'jumat', '08:00:00', '13:00:00'),
(611, 97, 34, 'jumat', '16:00:00', '21:00:00'),
(612, 97, 34, 'sabtu', '08:00:00', '13:00:00'),
(613, 97, 34, 'sabtu', '16:00:00', '16:00:00'),
(614, 93, 33, 'rabu', '18:00:00', '22:00:00'),
(615, 93, 33, 'jumat', '18:00:00', '22:00:00'),
(616, 57, 33, 'kamis', '18:00:00', '21:00:00'),
(617, 57, 33, 'rabu', '18:00:00', '21:00:00'),
(618, 57, 33, 'selasa', '18:00:00', '21:00:00'),
(619, 57, 33, 'jumat', '18:00:00', '21:00:00'),
(620, 94, 33, 'selasa', '18:00:00', '21:00:00'),
(621, 94, 33, 'rabu', '18:00:00', '21:00:00'),
(622, 94, 33, 'kamis', '18:00:00', '21:00:00'),
(623, 94, 33, 'jumat', '18:00:00', '21:00:00'),
(624, 94, 33, 'sabtu', '18:00:00', '21:00:00'),
(625, 89, 31, 'selasa', '16:00:00', '20:00:00'),
(626, 89, 31, 'rabu', '16:00:00', '20:00:00'),
(627, 89, 31, 'kamis', '16:00:00', '20:00:00'),
(628, 89, 31, 'jumat', '16:00:00', '20:00:00'),
(629, 89, 31, 'sabtu', '16:00:00', '20:00:00'),
(630, 87, 30, 'senin', '17:00:00', '21:00:00'),
(631, 87, 30, 'selasa', '09:00:00', '12:00:00'),
(632, 87, 30, 'selasa', '17:00:00', '21:00:00'),
(633, 87, 30, 'rabu', '09:00:00', '12:00:00'),
(634, 87, 30, 'rabu', '17:00:00', '21:00:00'),
(635, 87, 30, 'kamis', '09:00:00', '12:00:00'),
(636, 87, 30, 'kamis', '17:00:00', '21:00:00'),
(637, 87, 30, 'jumat', '09:00:00', '12:00:00'),
(638, 87, 30, 'jumat', '17:00:00', '21:00:00'),
(639, 87, 30, 'sabtu', '09:00:00', '12:00:00'),
(640, 87, 30, 'sabtu', '17:00:00', '21:00:00'),
(641, 88, 30, 'selasa', '17:00:00', '21:00:00'),
(642, 88, 30, 'rabu', '17:00:00', '21:00:00'),
(643, 88, 30, 'kamis', '17:00:00', '21:00:00'),
(644, 88, 30, 'jumat', '17:00:00', '21:00:00'),
(645, 88, 30, 'sabtu', '17:00:00', '21:00:00'),
(646, 105, 30, 'senin', '17:00:00', '21:00:00'),
(647, 105, 30, 'selasa', '17:00:00', '21:00:00'),
(648, 105, 30, 'rabu', '17:00:00', '21:00:00'),
(649, 105, 30, 'kamis', '17:00:00', '21:00:00'),
(650, 105, 30, 'jumat', '17:00:00', '21:00:00'),
(651, 105, 30, 'sabtu', '17:00:00', '21:00:00'),
(652, 83, 29, 'selasa', '16:30:00', '20:00:00'),
(653, 83, 29, 'rabu', '16:30:00', '20:00:00'),
(654, 83, 29, 'kamis', '16:30:00', '20:00:00'),
(655, 83, 29, 'jumat', '16:30:00', '20:00:00'),
(656, 83, 29, 'sabtu', '16:30:00', '20:00:00'),
(657, 84, 29, 'selasa', '18:00:00', '21:00:00'),
(658, 84, 29, 'rabu', '18:00:00', '21:00:00'),
(659, 84, 29, 'kamis', '18:00:00', '21:00:00'),
(660, 84, 29, 'jumat', '18:00:00', '21:00:00'),
(661, 84, 29, 'sabtu', '18:00:00', '21:00:00'),
(662, 85, 29, 'selasa', '16:00:00', '21:00:00'),
(663, 85, 29, 'rabu', '16:00:00', '21:00:00'),
(664, 85, 29, 'kamis', '16:00:00', '21:00:00'),
(665, 85, 29, 'jumat', '16:00:00', '21:00:00'),
(666, 85, 29, 'sabtu', '16:00:00', '21:00:00'),
(667, 86, 29, 'selasa', '15:00:00', '20:00:00'),
(668, 86, 29, 'rabu', '15:00:00', '20:00:00'),
(669, 86, 29, 'kamis', '15:00:00', '20:00:00'),
(670, 86, 29, 'jumat', '08:00:00', '13:00:00'),
(671, 86, 29, 'sabtu', '08:00:00', '13:00:00'),
(672, 80, 27, 'selasa', '18:00:00', '21:00:00'),
(673, 80, 27, 'rabu', '18:00:00', '21:00:00'),
(674, 80, 27, 'kamis', '18:00:00', '21:00:00'),
(675, 80, 27, 'jumat', '18:00:00', '21:00:00'),
(676, 80, 27, 'sabtu', '18:00:00', '21:00:00'),
(677, 81, 27, 'selasa', '18:00:00', '21:00:00'),
(678, 81, 27, 'rabu', '18:00:00', '21:00:00'),
(679, 81, 27, 'kamis', '18:00:00', '21:00:00'),
(680, 81, 27, 'jumat', '18:00:00', '21:00:00'),
(681, 81, 27, 'sabtu', '18:00:00', '21:00:00'),
(682, 108, 42, 'selasa', '08:00:00', '20:00:00'),
(683, 108, 42, 'rabu', '08:00:00', '20:00:00'),
(684, 108, 42, 'kamis', '08:00:00', '20:00:00'),
(685, 108, 42, 'jumat', '08:00:00', '20:00:00'),
(686, 108, 42, 'sabtu', '08:00:00', '20:00:00'),
(687, 135, 46, 'senin', '17:00:00', '21:00:00'),
(688, 135, 46, 'selasa', '17:00:00', '21:00:00'),
(689, 135, 46, 'rabu', '17:00:00', '21:00:00'),
(690, 135, 46, 'kamis', '17:00:00', '21:00:00'),
(691, 135, 46, 'jumat', '17:00:00', '21:00:00'),
(692, 135, 46, 'sabtu', '17:00:00', '21:00:00'),
(693, 135, 46, 'minggu', '17:00:00', '21:00:00'),
(694, 137, 46, 'selasa', '17:00:00', '21:00:00'),
(695, 137, 46, 'rabu', '17:00:00', '21:00:00'),
(696, 137, 46, 'kamis', '17:00:00', '21:00:00'),
(697, 137, 46, 'jumat', '17:00:00', '21:00:00'),
(698, 137, 46, 'sabtu', '17:00:00', '21:00:00'),
(699, 177, 46, 'senin', '17:00:00', '21:00:00'),
(700, 177, 46, 'selasa', '08:00:00', '12:00:00'),
(701, 177, 46, 'selasa', '17:00:00', '21:00:00'),
(702, 177, 46, 'rabu', '08:00:00', '12:00:00'),
(703, 177, 46, 'rabu', '17:00:00', '21:00:00'),
(704, 177, 46, 'kamis', '08:00:00', '12:00:00'),
(705, 177, 46, 'kamis', '17:00:00', '21:00:00'),
(706, 177, 46, 'jumat', '08:00:00', '12:00:00'),
(707, 177, 46, 'jumat', '17:00:00', '21:00:00'),
(708, 177, 46, 'sabtu', '08:00:00', '12:00:00'),
(709, 177, 46, 'sabtu', '17:00:00', '21:00:00'),
(710, 177, 46, 'minggu', '08:00:00', '12:00:00'),
(711, 177, 46, 'minggu', '17:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `isi` text,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `nama`, `isi`, `tanggal`) VALUES
(6, 'Reyner', 'Tambahkan Data dokter lagi', '2021-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesialis`
--

INSERT INTO `spesialis` (`id`, `nama`, `icon`) VALUES
(1, 'Anak', '1.png'),
(2, 'Umum', '2.png'),
(20, 'Bedah Saraf', '250843208.png'),
(5, 'Kandungan', '5.png'),
(8, 'THT (Telinga Hidung Tenggorokan)', '6.png'),
(18, 'Bedah', '929391411.png'),
(19, 'Bedah Mulut', '142687346.png'),
(21, 'Gastroenterologi', '1960091301.png'),
(22, 'Gizi', '1560390250.png'),
(23, 'Jantung Dan Pembuluh Darah', '82822980.png'),
(24, 'Kulit Dan Kelamin', '1396991445.png'),
(25, 'Mata', '1440960913.png'),
(26, 'Onkologi', '1348216131.png'),
(27, 'Ortopedi', '1414291467.png'),
(28, 'Paru', '1196123763.png'),
(29, 'Penyakit Dalam', '479506986.png'),
(30, 'Psikiater', '1822328232.png'),
(31, 'Rehabilitasi Medis', '194666366.png'),
(32, 'Urologi', '1019923643.png'),
(33, 'Kedokteran Fisik Dan Rehabilitasi', '1690231817.png'),
(34, 'Kebidanan Kandungan', '1748729153.png'),
(35, 'Saraf', '972748668.png'),
(36, 'Pulmonologi Dan Kedokteran Respirasi (Paru)', '1172153344.png'),
(37, 'Radiologi', '1623347085.png'),
(38, 'Bedah Anak', '191497039.png'),
(39, 'Patologi Anatomi', '1215311783.png'),
(40, 'Anestesiologi Dan Terapi Intensif', '11779282.png'),
(41, 'Orthopaedi Dan Traumatologi', '1724430542.png'),
(42, 'Patologi Klinik', '744615861.png'),
(43, 'Bedah Onkologi', '912266910.png'),
(44, 'Gigi', '751282324.png'),
(45, 'Estetika', '1888885238.png'),
(46, 'Estetika Dan Anti Aging', '748226358.png'),
(47, 'Gigi Tiruan & Implant Gigi', '252432926.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praktik`
--
ALTER TABLE `praktik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
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
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `praktik`
--
ALTER TABLE `praktik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=712;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spesialis`
--
ALTER TABLE `spesialis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
