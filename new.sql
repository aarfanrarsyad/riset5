-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 07:11 PM
-- Server version: 10.4.14-MariaDB-log
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_id` int(11) UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `group_name` varchar(25) NOT NULL,
  `access_name` int(1) NOT NULL,
  `target_scope_id` int(11) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_id`, `time`, `user_name`, `group_name`, `access_name`, `target_scope_id`, `description`, `status`) VALUES
(1, '2021-02-18 18:30:05', 'dummy@stis.ac.id', 'Alumni', 3, 2, 'Menghapus role/group Administrator untuk user Dummy_dummy', 1),
(2, '2021-02-18 18:30:05', 'dummy@stis.ac.id', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Dummy_dummy', 1),
(3, '2021-02-18 18:30:05', 'dummy@stis.ac.id', 'Administrator,Alumni', 1, 2, 'MMenambahkan role/group Alumni untuk user Dummy_dummy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(6) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telp_alumni` varchar(20) DEFAULT NULL,
  `alamat_alumni` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(24) DEFAULT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `status_bekerja` tinyint(1) NOT NULL,
  `perkiraan_pensiun` year(4) DEFAULT NULL,
  `jabatan_terakhir` varchar(255) DEFAULT NULL,
  `aktif_pns` tinyint(1) NOT NULL,
  `deskripsi` varchar(300) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `ig` varchar(50) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `gscholar` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `nip_bps` varchar(255) DEFAULT NULL,
  `foto_profil` varchar(255) NOT NULL DEFAULT 'default.svg',
  `cttl` tinyint(1) NOT NULL DEFAULT 0,
  `calamat` tinyint(1) NOT NULL DEFAULT 0,
  `cpendidikan` tinyint(1) NOT NULL DEFAULT 0,
  `cprestasi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telp_alumni`, `alamat_alumni`, `kota`, `provinsi`, `negara`, `status_bekerja`, `perkiraan_pensiun`, `jabatan_terakhir`, `aktif_pns`, `deskripsi`, `email`, `ig`, `fb`, `twitter`, `linkedin`, `gscholar`, `nip`, `nip_bps`, `foto_profil`, `cttl`, `calamat`, `cpendidikan`, `cprestasi`) VALUES
(1, 'Dummy_dummy', 'Lk', 'Sungai Penuh', '1997-01-25', '081299594151', 'Jr. Abdul Rahmat No. 755, Tangerang 47637, SulUt', 'Kabupaten Tuban', 'Jawa Timur', 'Indonesia', 0, 1978, 'amet', 0, 'Maiores ut quasi beatae vel quisquam. Quo aut iusto et nobis et blanditiis non. Animi in architecto et iusto occaecati mollitia vel.', 'wulan.pratiwi@winarsih.mil.id', 'dummy_igza__', 'Dummy', 'Dummy__', '', '', '198109262004122002', '301820912', 'Lk/default.svg', 0, 0, 0, 0),
(2, 'Kartika Lismawati', 'Pr', 'Palembang', '1964-11-19', NULL, 'Jl. Lumbu Barat II B No. 82 Bl', NULL, NULL, NULL, 1, 2022, 'Kepala Subbidang Program dan Evaluasi Pendidikan dan Pelatihan Teknis dan Fungsional', 1, 'Test test 1 2 3', 'kartika@gmail.com', 'kartika123', NULL, NULL, NULL, NULL, '196411191987022003', '340011691', 'Pr/default.svg', 0, 0, 0, 0),
(3, 'Budi Cahyono', 'Lk', 'Bojonegoro', '1964-06-08', NULL, 'Kp. Jati Griya Jatimas Asri', NULL, NULL, NULL, 1, 2022, 'Kepala BPS Kabupaten/Kota', 1, 'Hi there', 'boecah@gmail.com', 'boecah123', 'Budi Cahyono', 'Budi Cahyono', NULL, NULL, '196406081987021002', '340011692', 'Lk/default.svg', 1, 1, 1, 0),
(4, 'Indra Susilo', 'Lk', 'Jakarta Pusat', '1964-06-07', '081318869089', 'Jl. Wibisana No. 6', NULL, NULL, 'Indonesia', 1, 2022, 'Kepala BPS Kabupaten/Kota', 1, 'Test123', 'indrass@yahoo.co.id', 'indrass98', NULL, NULL, NULL, NULL, '196406071987021001', '340011693', 'Lk/default.svg', 1, 1, 0, 0),
(5, 'Erisman', 'Lk', 'Jakarta Timur', '1964-11-02', '08129491174', 'JL.SMART HOUSE KAV.B56', NULL, NULL, NULL, 1, 2020, 'Kepala BPS Kabupaten/Kota', 0, 'Saya adalah Kepala BPS Kabupaten/Kota', 'erisman@gmail.com', 'erisman222', NULL, 'erisman123', NULL, NULL, '196411021987021001', '340011694', 'Lk/default.svg', 1, 1, 0, 0),
(6, 'Ono Margiono', 'LK', 'Jakarta Timur', '1966-05-13', '081214770887', 'Jl. Pangeran Kejaksan Gg. Muja', NULL, NULL, NULL, 1, 2024, 'Kepala BPS Kabupaten/Kota', 1, 'good', 'ono@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196605131988021001', '340011828', 'LK/default.svg', 0, 0, 0, 0),
(7, 'Sofan', 'LK', 'Kebumen', '1964-10-21', '0811383762', 'Jl Alamandar', NULL, NULL, NULL, 1, 2022, 'Kepala Bidang Statistik Produksi', 1, 'asyik', 'sofan@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196410211988021001', '340011829', 'LK/default.svg', 0, 0, 0, 0),
(8, 'Efliza', 'PR', 'Medan', '1965-04-28', '0816228960', 'Jl Masjid Nurul Falah No 14', NULL, NULL, NULL, 1, 2025, 'Kepala Direktorat Statistik Distribusi', 1, 'asyiap', 'efliza@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196504281988022001', '340011855', 'PR/default.svg', 0, 0, 0, 0),
(17, 'Oldestia Vianny', 'Pr', 'Payakumbuh', '1979-06-11', '081274707292', 'Jl Rantau 3 No. 3 Rt 003 Rw 01', NULL, NULL, NULL, 1, 2037, 'Statistisi Muda Seksi Analisis Statistik Lintas Sektor', 1, 'PNS', 'oldestia@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197906111999122001', '340015996', 'Pr/default.svg', 0, 0, 0, 0),
(18, 'Oemar Syarief Wibisono', 'Lk', 'Jakarta', '1994-09-29', '082278449084', 'Lorong Perdamaian Bedeng Akau', NULL, NULL, NULL, 1, 2052, 'Staf Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, 'gk tau', 'oemar.wibisono@bps.go.id', 'NULL', 'Omarhehe', 'Omar', NULL, NULL, '199409292017011001', '340057694', 'Lk/default.svg', 0, 0, 0, 0),
(19, 'Odry Syafwil', 'Lk', 'Jakarta', '1954-10-08', '081574594320', 'KOMPLEKS STATISTIK Jl. Statistik', NULL, NULL, NULL, 1, 2019, 'Lektor Kepala Tenaga Fungsional STIS', 0, 'Sudah pensiun', 'odrys@bps.go.id', NULL, NULL, NULL, NULL, NULL, '195410081979031004', '340006615', 'Lk/default.svg', 0, 0, 0, 0),
(20, 'Pradini Ajeng Gemellia', 'Pr', 'Bandung', '1989-10-13', '08567485818', 'Jl. Pelabuhan II Km 4,5 RT 2/8', NULL, NULL, NULL, 1, 2047, 'Staf Seksi Statistik Niaga dan Jasa', 1, 'hmm', 'pradinigemellia@bps.go.id', NULL, NULL, NULL, NULL, NULL, '198910132012112001', '340055881', 'Pr/default.svg', 0, 0, 0, 0),
(21, 'Lisiana Imana Yesani', 'PR', 'Jakarta Pusat', '1977-05-21', '085283507222', 'Jl. Kayu Manis VII No. 36', 'Jakarta Pusat', 'DKI Jakarta', 'Indonesia', 1, 2035, 'Kepala Seksi Statistik Sosial', 1, 'Asli jakarta hehe', 'lisiana@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197705211999012001', '340015738', 'PR/default.svg', 0, 0, 0, 0),
(22, 'Sana Damarhita', 'PR', 'Jakarta Selatan', '1977-05-14', '087722882289', 'Perumahan Bumi Cinderaya Jl. C', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', 1, 2035, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, 'Haha hihi penempatan', 'sana@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197705141999011001', '340015739', 'PR/default.svg', 0, 0, 0, 0),
(23, 'Krisdiana Galih', 'LK', 'Bandung', '1990-12-30', '081261932301', 'cluster hang lekir J9, batu IX', 'Bintan', 'Kepulauan Riau', 'Indonesia', 1, 2049, 'Kepala Subbagian Tata Usaha', 1, 'Sekarang rantau dulu bos', 'krisdiana.galih@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199012302014101001', '340056726', 'LK/default.svg', 0, 0, 0, 0),
(24, 'La Ode Ahmad Arafat', 'LK', 'Ambon', '1991-09-16', '085733198934', 'Jl. Raya Sambiroto, Dsn. Sambi', '', '', '', 1, 2049, 'Statistisi Pertama Seksi Diseminasi dan Layanan Statistik', 1, 'mantap ks teladan', 'ahmad.arafat@bps.go.id', NULL, NULL, NULL, NULL, NULL, '340056728', '199109162014101002', 'LK/default.svg', 0, 0, 0, 0),
(25, 'Aan Sujanah', 'Pr', 'Jakarta Timur', '1962-10-02', '08116291011', 'Maskoki Raya No 2', NULL, NULL, 'Indonesia', 0, 2020, 'Kepala Subbagian Penyimpanan', 0, NULL, 'aan@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196210021986012001', '340011224', 'Pr/default.svg', 0, 0, 0, 0),
(26, 'Risma Pijayantini', 'Pr', 'Palembang', '1963-06-09', '082183288585', 'Perumnas Permata Biru Blok B3', NULL, NULL, 'Indonesia', 1, 2021, 'Kepala Bagian Tata Usaha', 1, NULL, 'risma@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196306091986012001', '340011225', 'Pr/default.svg', 0, 0, 0, 0),
(27, 'Ade Rika Agus', 'Pr', 'Bogor', '1963-10-14', NULL, 'JL Bojong Kaler I/4 Cigadung', NULL, NULL, 'Indonesia', 0, NULL, 'Staf Seksi Neraca Produksi', 0, NULL, 'aderika@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196310141986012001', '340011226', 'Pr/default.svg', 0, 0, 0, 0),
(28, 'Haryoto Sutomo', 'Lk', 'Jakarta Selatan', '1962-07-02', NULL, 'Jl. Statistik II/32 Komplek St', NULL, NULL, 'Indonesia', 0, 2011, 'Staf Seksi Pengembangan Desain Sensus dan Survei Bidang Statistik Distribusi dan Jasa', 0, NULL, 'haryoto@bps.go.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lk/default.svg', 0, 0, 0, 0),
(39, 'I Ketut Mertayasa', 'Lk', 'Padangbae', '1968-07-26', '081271067114', 'JL. BYPASS, KOBA, BANGKA TENGA', 'Bangka Tengah', 'Bangka Belitung', 'Indonesia', 1, 2026, 'Kepala BPS Kabupaten/Kota', 1, NULL, 'ikmertayasa@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196807261992111001', '340013357', 'Lk/default.svg', 0, 0, 0, 0),
(40, 'Ni Putu Beliana Puspita Sari', 'Pr', 'Tabanan', '1996-11-29', '082237404808', 'BTN Senapahan II No. 26, Br. D', NULL, NULL, NULL, 1, 2054, 'Staf Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'beliana.puspita@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199611292019012002', '340058885', 'Pr/default.svg', 0, 0, 0, 0),
(41, 'Putu Yogi Wigunanca', 'Lk', 'Tabanan', '1994-11-15', '081558417994', 'banjar rangdu, desa pohsanten', NULL, NULL, NULL, 1, 2052, 'Penugasan Statistisi Pelaksana Lanjutan Seksi Statistik Produksi', 1, NULL, 'putu.yogi@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199411152019011001', '340058915', 'Lk/default.svg', 0, 0, 0, 0),
(42, 'Ni Putu Ayu Mila Dewi', 'Pr', 'Karangasem', '1992-12-28', '081806595936', 'Jalan Anawai no. 27', NULL, NULL, NULL, 1, 2051, 'Statistisi Pertama Seksi Statistik Industri', 1, NULL, 'niputu.mila@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199212282014122001', '340057159', 'Pr/default.svg', 0, 0, 0, 0),
(43, 'Ratna Rosmayanti', 'Pr', 'Cianjur', '1972-10-11', '085860789234', 'JL PIRUS II NO. 34 BLOK 7 PERU', NULL, NULL, NULL, 1, 2030, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, 'Tring tring', 'ratna_r@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197210111992032001', '340013242', 'Pr/default.svg', 0, 0, 0, 0),
(44, 'Aris Muji Atmoko', 'Lk', 'Karawang', '1983-11-20', ' 6281381234899', 'Perum Pesona Handayani Indah', NULL, NULL, NULL, 1, 2041, 'Statistisi Muda Seksi Statistik Sosial', 1, 'Jalan dengan kaki', 'atmoko@bps.go.id', NULL, NULL, NULL, NULL, NULL, ' 198311202009021004', ' 340050003', 'Lk/default.svg', 0, 0, 0, 0),
(45, 'Efran Feri Kriswanto', 'Lk', 'Palembang', '1985-02-22', '085208314690', 'Jl R. Sukamto Lr. Masjid No.39', NULL, NULL, NULL, 1, 2043, 'Staf Seksi Neraca Wilayah dan Analisis Statistik', 1, NULL, 'efran@bps.go.id', NULL, NULL, NULL, NULL, NULL, '198502222009021005', '340050005', 'Lk/default.svg', 0, 0, 0, 0),
(69, 'Husin Maulana', 'LK', 'Jakarta Selatan', '0000-00-00', NULL, 'Griya Serang Asri Blok L4/13', NULL, NULL, NULL, 1, 2033, 'Kepala BPS Kabupaten/Kota', 1, 'asadadassas', 'hmaulana@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197504231996121001', '340015382', 'LK/default.svg', 0, 0, 0, 0),
(70, 'Toto E Sastrasuanda', 'LK', 'Cirebon', '0000-00-00', NULL, 'Dusun Belawa I Rt 03/01', NULL, NULL, NULL, 1, 2003, 'Kepala Deputi Bidang Statistik Sosial', 1, 'sasasaasa', 'tsastra@bps.go.id', NULL, NULL, NULL, NULL, NULL, NULL, '340003304', 'LK/default.svg', 0, 0, 0, 0),
(71, 'Anik Triani', 'PR', 'Semarang', '0000-00-00', NULL, 'Griya Cempaka Arum Blok AA 11', NULL, NULL, NULL, 1, 2039, 'Statistisi Muda Seksi Statistik Pertambangan, Energi dan Konstruksi', 1, 'asadadadad', 'triani@bps.go.id', NULL, NULL, NULL, NULL, NULL, '198103102002122002', '340016472', 'PR/default.svg', 0, 0, 0, 0),
(72, 'Maya Harsanti', 'PR', 'Jakarta', '0000-00-00', NULL, 'Perum Grand Duta Cluster Jade', NULL, NULL, NULL, 1, 2038, 'Staf Seksi Statistik Distribusi', 1, 'ADAAADADDAD', 'mayah@bps.go.id', NULL, NULL, NULL, NULL, NULL, '198011042002122001', '340016479', 'PR/default.svg', 0, 0, 0, 0),
(73, 'Lestari Utaminingsih', 'PR', 'Kendal', '1977-10-13', '085641509482', 'Jl. Candi Kencana IV/C.66', NULL, NULL, 'Indonesia', 1, 2035, 'Staf Subbagian Kepegawaian & Hukum', 1, 'Taken', 'lestari.utaminingsih@bps.go.id', 'lestari10', 'lestari_utami', 'lestari_utami', NULL, NULL, '197710132000022001', '340016072', 'PR/default.svg', 0, 0, 0, 0),
(74, 'Hengki Eko Riyadi', 'LK', 'Lubang Lor (Purworejo)', '1978-09-03', '085261660531', 'Grand Serpong Residence Blok A', NULL, NULL, 'Indonesia', 1, 2038, 'Statistisi Madya Pejabat Fungsional', 1, 'Laper nih', 'hengki@bps.go.id', 'iri_hengki', 'hengki_itudosa', 'hengki01', NULL, NULL, '197809032000121002', '340016113', 'LK/default.svg', 0, 0, 0, 0),
(75, 'Eddy Prayitno', 'LK', 'Bandar Lampung', '1977-01-15', '07215605102', 'Jl. Purnawirawan Raya Belakang', NULL, NULL, 'Indonesia', 1, 2035, 'Kepala BPS Kabupaten/Kota', 1, 'Makan bang!!', 'eddyp@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197701151999011001', '340015736', 'LK/default.svg', 0, 0, 0, 0),
(76, 'Edison Manurung', 'LK', 'Tapanuli Utara', '1962-11-10', '021-7815560', 'Jl.Raya Lt.Agung Tg.BaratRt.00', NULL, NULL, 'Indonesia', 0, 2019, 'Staf Seksi Penyiapan Statistik Perdagangan Dalam Negeri', 0, 'Ngantuk bat', 'victor@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196211101988021001', '340011827', 'LK/default.svg', 0, 0, 0, 0),
(77, 'Bambang Susilo', 'Lk', 'Blora', '1957-04-03', NULL, 'H.Ahyar No.49 RT.006/05 13440', NULL, NULL, NULL, 1, 2013, 'Staf Seksi Pengolahan Statistik Pendidikan dan Kesejahteraan Sosial', 0, NULL, 'bsusilo@bps.go.id', NULL, NULL, NULL, NULL, NULL, '195704031977121001', '340005601', 'Lk/default.svg', 0, 0, 0, 0),
(78, 'Hotbel Purba', 'Lk', 'Pasir/Banjar Tongga', '1966-06-20', '081350343245', 'Jl. Pusat Pemerintahan', NULL, NULL, NULL, 1, 2024, 'Kepala BPS Kabupaten/Kota', 1, NULL, 'hotbelpurba@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196606201986031001', '340011571', 'Lk/default.svg', 0, 0, 0, 0),
(79, 'Edison Situmorang', 'Lk', 'Simarsoituruk', '1966-11-26', '082347774666', 'A W syahrani 4 Rt 23 Sempaja', NULL, NULL, NULL, 1, 2024, 'Kepala Seksi Statistik Sosial', 1, NULL, 'edisons@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196611261988021001', '340011786', 'Lk/default.svg', 0, 0, 0, 0),
(80, 'Chatarina Budi Anggarini', 'Pr', 'Bantul', '1969-04-29', '089610147898', 'Melikan Lor RT 04 Gandekan Ban', NULL, NULL, NULL, 1, 2027, 'Kepala Seksi Statistik Keuangan Dan Harga Produsen', 1, NULL, 'chatarina@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196904291989022001', '340012122', 'Pr/default.svg', 0, 0, 0, 0),
(81, 'Muhammad Dedy', 'LK', 'Palembang', '1978-08-05', '081377900322', 'Jl. Sambu No. 33', NULL, NULL, 'Indonesia', 1, 2036, 'Kepala BPS Kabupaten/Kota', 1, NULL, 'mdedy@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197808052000121001', '340016240', 'LK/default.svg', 0, 0, 0, 0),
(82, 'Ayu Setiawaty', 'PR', 'Jakarta Barat', '1977-05-09', 'Jakarta Barat', 'PERUMAHAN DUKUH ZAMRUD BLOK N7', NULL, NULL, NULL, 1, 2035, 'Penugasan Statistisi Pertama Seksi Statistik Distribusi', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, '197705092000122007', '340016241', 'PR/default.svg', 0, 0, 0, 0),
(83, 'Shanti Kartika Astrilestari', 'PR', 'Surabaya', '1979-04-26', '082181923897', 'Perum Ragom Mufakat I Blok F-5', NULL, NULL, 'Indonesia', 1, 2037, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, NULL, 'shanti_ka@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197904262000122001', '340016242', 'PR/default.svg', 0, 0, 0, 0),
(84, 'Bambang Pamungkas', 'LK', 'Semarang', '1979-09-17', '081355103999', 'Jl Kredit Blok B 5 No 13', NULL, NULL, 'Indonesia', 1, 2037, 'Kepala BPS Kabupaten/Kota', 1, NULL, '', NULL, NULL, NULL, NULL, NULL, '197909172000121003', '340016243', 'LK/default.svg', 0, 0, 0, 0),
(85, 'Johanes Supranto', 'Lk', 'Semarang', '1939-05-22', NULL, 'Jl. Kejaksaan Raya No. 23 Kreo C', NULL, 'DKI Jakarta', 'Indonesia', 0, 2004, 'Kepala K.S Tk. I (Tipe A)', 0, 'Jangan Menyerah', '', NULL, NULL, NULL, NULL, NULL, NULL, '340000423', 'Lk/default.svg', 1, 0, 0, 0),
(86, 'Gita Devi Asyarita', 'Pr', 'Bekasi', '1994-08-05', '6281319546221', 'Desa Daruba', NULL, NULL, NULL, 1, 2052, 'Statistisi Pertama Seksi Statistik Distribusi', 1, 'Bersakit-sakit dahulu, bersenang-senangnya gak tau kapan', 'gita.asyarita@bps.go.id', 'gitaasy_', NULL, NULL, NULL, NULL, '199408052017012001', '340058000', 'Pr/default.svg', 1, 0, 0, 0),
(87, 'Galang Retno Winarko', 'Lk', 'Blitar', '1990-10-22', '6282299649735', 'RT 4 RW 3, Desa Panggungrejo, Kecamatan Panggungrejo', 'Blitar', 'Jawa Timur', 'Indonesia', 1, 2048, 'Staf Seksi Integrasi Pengolahan Data', 1, 'WOW Amazing', 'galang.winarko@bps.go.id', 'galang_winarko', NULL, NULL, NULL, NULL, '199010222017011001', '340057999', 'Lk/default.svg', 1, 0, 0, 0),
(88, 'Timbang Sirait', 'Lk', 'Labuhan Batu', '1973-12-27', '628179719667', 'Puri Bintara Regency Blok K-19', 'Jakarta Timur', 'DKI Jakarta', 'Indonesia', 1, 2039, 'Lektor Tenaga Fungsional STIS', 1, 'Statmat jaya', 'timbang@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197312272000031002', '340016106', 'Lk/default.svg', 1, 0, 0, 0),
(93, 'Khaerul Anwar', 'LK', 'Demak', '1970-03-29', '081228439121', 'Perum Griya Utama Permai Blok', NULL, NULL, 'Indonesia', 1, 2028, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'kh_anwar@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197003291991021001', '340012773', 'LK/default.svg', 0, 0, 0, 0),
(94, 'Achmad Rifai', 'LK', 'Jakarta Utara', '1974-12-05', '082221518394', 'Jl. Kranji No. 493', NULL, NULL, 'Indonesia', 1, 2033, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'arifai@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197412052000031001', '340016107', 'LK/default.svg', 0, 0, 0, 0),
(95, 'Apriliya Puput Nadea', 'PR', 'Klaten', '1989-04-06', '085647331647', 'Gg Spoor Dalam IV no 12', NULL, NULL, 'Indonesia', 1, 2047, 'Staf Seksi Jasa Perpustakaan', 1, NULL, 'nadea@bps.go.id', NULL, NULL, NULL, NULL, NULL, '198904062012112001', '340055736', 'PR/default.svg', 0, 0, 0, 0),
(96, 'Arini Ismiati', 'PR', 'Malang', '1979-12-20', '081215927271', 'Jl. Batok GG III no.5', NULL, NULL, 'Indonesia', 1, 2038, 'Statistisi Muda Seksi Statistik Produksi', 1, NULL, 'arini.ismi@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197912202003122006', '340017013', 'PR/default.svg', 0, 0, 0, 0),
(332, 'Dea Venditama', 'LK', 'Bantul', '1991-06-02', '6282292146507', 'Otista', 'Pusat', 'DKI Jakarta', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Pemantauan dan Evaluasi Publikasi', 1, NULL, 'deav@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199106022014101001', '340056757', 'LK/default.svg', 0, 0, 0, 0),
(333, 'Delly Rakasiwi', 'LK', 'Jakarta', '1991-03-05', NULL, 'Ki Hajar DewantaraRT 01 RW 06', 'Palangkaraya', 'Kalimantan Tengah', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Jaringan dan Rujukan Statistik', 1, NULL, 'drakasiwi@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199103052014101002', '340056758', 'LK/default.svg', 0, 0, 0, 0),
(334, 'Dhoni Eko Wahyu Nugroho', 'LK', 'Kediri', '1991-07-28', NULL, 'Jl. Kebon Nanas Utara No 10 Ja', 'Pusat', 'DKI Jakarta', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Pengemasan Informasi Statistik', 1, NULL, 'dhonieko@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199107282014101001', '340056759', 'LK/default.svg', 0, 0, 0, 0),
(433, 'Poltak Sutrisno Siahaan', 'Lk', 'Tebing Tinggi', '1952-08-06', NULL, 'Jl. Asrama Komplek Bumi AsriBl', NULL, NULL, NULL, 1, 2012, 'Staf MPP', 0, NULL, 'poltak@bps.go.id', NULL, NULL, NULL, NULL, NULL, '195208061975031001', '340004375', 'Lk/default.svg', 0, 0, 0, 0),
(434, 'Weni Lidya Sukma', 'Pr', 'Padang Pariaman', '1989-09-12', '085263662023', 'jl. mandor dami 2 perumahan fe', NULL, NULL, NULL, 1, 2047, 'Penugasan Statistisi Pelaksana Lanjutan Seksi Pengolahan Statistik Ketenagakerjaan', 1, NULL, 'wenilidya@bps.go.id', NULL, NULL, NULL, NULL, NULL, '198909122012112001', '340055951', 'Pr/default.svg', 0, 0, 0, 0),
(435, 'Tri Hayuni Syardi', 'Pr', 'Padang', '1990-10-30', '081281060452', 'Komplek Mawar Putih Blok L No.', NULL, NULL, NULL, 1, 2048, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'trihayuni@bps.go.id', NULL, NULL, NULL, NULL, NULL, '199010302012112001', '340055938', 'Pr/default.svg', 0, 0, 0, 0),
(436, 'Subuh Sukmono Putro', 'Lk', 'Sragen', '1975-03-15', '081329278642', 'Graha Surya No IC', NULL, NULL, NULL, 1, 2033, 'Kepala Seksi Statistik Sosial', 1, NULL, 'subuhsukmono@bps.go.id', NULL, NULL, NULL, NULL, NULL, '197503151996121001', '340015332', 'Lk/default.svg', 0, 0, 0, 0),
(555, 'Sigit Purnomo', 'LK', 'Kulon Progo', '1965-02-17', '081288378366', 'Puri Citayam Permai Blok B-10', NULL, NULL, NULL, 1, 2023, 'Kepala Bagian Penyusunan Rencana', 1, 'mantap', 'sigit@bps.go.id', NULL, NULL, NULL, NULL, NULL, '196502171988021001', '340011821', 'LK/default.svg', 0, 0, 0, 0),
(210422, 'MOCHAMAD IZZA ZULFIKAR SYA\'RONI', 'Pr', 'Jayapura', '1989-12-12', '(+62) 29 2629 944', 'Ds. Sumpah Pemuda No. 190, Singkawang 21576, KalSel', 'Makassar', 'Gorontalo', 'Mikronesia', 1, 2002, 'minima', 1, 'Voluptatem quam a tenetur dolore minima qui. Nostrum aut autem ut. Sapiente enim consequatur ipsam qui quia provident. Et at vel illo.', '221810422@stis.ac.id', NULL, NULL, NULL, NULL, NULL, '2435731040527948', '221810422', 'Pr/default.svg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_tempat_kerja`
--

CREATE TABLE `alumni_tempat_kerja` (
  `id_alumni` int(7) NOT NULL,
  `id_tempat_kerja` int(16) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni_tempat_kerja`
--

INSERT INTO `alumni_tempat_kerja` (`id_alumni`, `id_tempat_kerja`) VALUES
(1, 2),
(2, 2),
(3, 5),
(4, 4),
(5, 3),
(6, 965),
(7, 33),
(8, 2),
(17, 962),
(18, 963),
(19, 2),
(20, 964),
(21, 210),
(22, 220),
(23, 230),
(24, 240),
(25, 2),
(26, 10),
(27, 27),
(28, 2),
(39, 390),
(40, 400),
(41, 410),
(42, 420),
(43, 430),
(44, 440),
(45, 450),
(69, 69),
(70, 2),
(71, 27),
(72, 72),
(73, 73),
(74, 2),
(75, 75),
(76, 2),
(77, 2),
(78, 781),
(79, 791),
(80, 801),
(81, 810),
(82, 820),
(83, 830),
(84, 840),
(85, 2),
(86, 860),
(87, 870),
(88, 880),
(93, 930),
(94, 940),
(95, 950),
(96, 960),
(332, 2),
(333, 2),
(334, 32),
(433, 33),
(434, 2),
(435, 35),
(436, 36),
(555, 961),
(210422, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Administrator', ''),
(2, 'Alumni', ''),
(3, 'Webservice Administrator', ''),
(4, 'Developer', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'dummy@stis.ac.id', 1, '2021-04-27 10:28:13', 1),
(2, '::1', '@stis.ac.id', 2, '2021-05-02 00:33:27', 1),
(3, '::1', 'dummy@stis.ac.id', 1, '2021-05-01 12:39:05', 1),
(4, '::1', 'dummy@stis.ac.id', 1, '2021-05-05 10:04:58', 1),
(5, '::1', 'dummy@stis.ac.id', 1, '2021-05-10 02:14:25', 1),
(6, '::1', 'dummy@stis.ac.id', 1, '2021-05-10 04:32:19', 1),
(7, '::1', 'dummy@stis.ac.id', 1, '2021-05-15 06:46:18', 1),
(8, '::1', 'dummy@stis.ac.id', 1, '2021-05-15 20:09:54', 1),
(9, '::1', 'dummy@stis.ac.id', 1, '2021-05-16 03:05:28', 1),
(10, '::1', 'dummy@stis.ac.id', NULL, '2021-05-16 11:22:14', 0),
(11, '::1', 'dummy@stis.ac.id', 1, '2021-05-16 11:22:28', 1),
(12, '::1', 'dummy@stis.ac.id', 1, '2021-05-19 05:07:42', 1),
(13, '::1', 'dummy@stis.ac.id', 1, '2021-05-21 01:49:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'user-index', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_app`
--

CREATE TABLE `client_app` (
  `id` int(11) UNSIGNED NOT NULL,
  `uid` int(11) UNSIGNED DEFAULT NULL,
  `nama_app` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` enum('Review','Diterima','Ditolak') NOT NULL DEFAULT 'Review',
  `req_date` datetime DEFAULT NULL,
  `req_acc` datetime DEFAULT NULL,
  `uid_admin` int(11) UNSIGNED DEFAULT NULL,
  `id_token` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `crud_id` int(11) UNSIGNED NOT NULL,
  `crud_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`crud_id`, `crud_name`) VALUES
(1, 'Create'),
(2, 'Read'),
(3, 'Update'),
(4, 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(16) UNSIGNED NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `caption` varchar(2200) DEFAULT NULL,
  `created_at` date NOT NULL,
  `album` varchar(255) NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT 0,
  `id_alumni` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups_access`
--

CREATE TABLE `groups_access` (
  `access_group_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `menu_access_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_access`
--

INSERT INTO `groups_access` (`access_group_id`, `group_id`, `menu_access_id`) VALUES
(1, 2, 2),
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 1, 13),
(11, 1, 14),
(12, 1, 15),
(13, 1, 16),
(14, 1, 17),
(15, 1, 18),
(16, 1, 19),
(17, 1, 20),
(18, 1, 21),
(19, 1, 22),
(20, 1, 23),
(21, 1, 24),
(22, 1, 25),
(23, 1, 26),
(24, 1, 27),
(25, 1, 28),
(26, 1, 29),
(27, 1, 30),
(28, 2, 1),
(29, 1, 31),
(30, 1, 10),
(31, 1, 9),
(32, 1, 11),
(33, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `kabkota`
--

CREATE TABLE `kabkota` (
  `id_provinsi` int(11) NOT NULL,
  `id_kabkota` int(11) NOT NULL,
  `nama_kabkota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabkota`
--

INSERT INTO `kabkota` (`id_provinsi`, `id_kabkota`, `nama_kabkota`) VALUES
(11, 1101, 'Kabupaten Simeulue'),
(11, 1102, 'Kabupaten Aceh Singkil'),
(11, 1103, 'Kabupaten Aceh Selatan'),
(11, 1104, 'Kabupaten Aceh Tenggara'),
(11, 1105, 'Kabupaten Aceh Timur'),
(11, 1106, 'Kabupaten Aceh Tengah'),
(11, 1107, 'Kabupaten Aceh Barat'),
(11, 1108, 'Kabupaten Aceh Besar'),
(11, 1109, 'Kabupaten Pidie'),
(11, 1110, 'Kabupaten Bireuen'),
(11, 1111, 'Kabupaten Aceh Utara'),
(11, 1112, 'Kabupaten Aceh Barat Daya'),
(11, 1113, 'Kabupaten Gayo Lues'),
(11, 1114, 'Kabupaten Aceh Tamiang'),
(11, 1115, 'Kabupaten Nagan Raya'),
(11, 1116, 'Kabupaten Aceh Jaya'),
(11, 1117, 'Kabupaten Bener Meriah'),
(11, 1118, 'Kabupaten Pidie Jaya'),
(11, 1171, 'Kota Banda Aceh'),
(11, 1172, 'Kota Sabang'),
(11, 1173, 'Kota Langsa'),
(11, 1174, 'Kota Lhokseumawe'),
(11, 1175, 'Kota Subulussalam'),
(12, 1201, 'Kabupaten Nias'),
(12, 1202, 'Kabupaten Mandailing Natal'),
(12, 1203, 'Kabupaten Tapanuli Selatan'),
(12, 1204, 'Kabupaten Tapanuli Tengah'),
(12, 1205, 'Kabupaten Tapanuli Utara'),
(12, 1206, 'Kabupaten Toba Samosir'),
(12, 1207, 'Kabupaten Labuhan Batu'),
(12, 1208, 'Kabupaten Asahan'),
(12, 1209, 'Kabupaten Simalungun'),
(12, 1210, 'Kabupaten Dairi'),
(12, 1211, 'Kabupaten Karo'),
(12, 1212, 'Kabupaten Deli Serdang'),
(12, 1213, 'Kabupaten Langkat'),
(12, 1214, 'Kabupaten Nias Selatan'),
(12, 1215, 'Kabupaten Humbang Hasundutan'),
(12, 1216, 'Kabupaten Pakpak Bharat'),
(12, 1217, 'Kabupaten Samosir'),
(12, 1218, 'Kabupaten Serdang Bedagai'),
(12, 1219, 'Kabupaten Batu Bara'),
(12, 1220, 'Kabupaten Padang Lawas Utara'),
(12, 1221, 'Kabupaten Padang Lawas'),
(12, 1222, 'Kabupaten Labuhan Batu Selatan'),
(12, 1223, 'Kabupaten Labuhan Batu Utara'),
(12, 1224, 'Kabupaten Nias Utara'),
(12, 1225, 'Kabupaten Nias Barat'),
(12, 1271, 'Kota Sibolga'),
(12, 1272, 'Kota Tanjung Balai'),
(12, 1273, 'Kota Pematang Siantar'),
(12, 1274, 'Kota Tebing Tinggi'),
(12, 1275, 'Kota Medan'),
(12, 1276, 'Kota Binjai'),
(12, 1277, 'Kota Padangsidimpuan'),
(12, 1278, 'Kota Gunungsitoli'),
(13, 1301, 'Kabupaten Kepulauan Mentawai'),
(13, 1302, 'Kabupaten Pesisir Selatan'),
(13, 1303, 'Kabupaten Solok'),
(13, 1304, 'Kabupaten Sijunjung'),
(13, 1305, 'Kabupaten Tanah Datar'),
(13, 1306, 'Kabupaten Padang Pariaman'),
(13, 1307, 'Kabupaten Agam'),
(13, 1308, 'Kabupaten Lima Puluh Kota'),
(13, 1309, 'Kabupaten Pasaman'),
(13, 1310, 'Kabupaten Solok Selatan'),
(13, 1311, 'Kabupaten Dharmasraya'),
(13, 1312, 'Kabupaten Pasaman Barat'),
(13, 1371, 'Kota Padang'),
(13, 1372, 'Kota Solok'),
(13, 1373, 'Kota Sawah Lunto'),
(13, 1374, 'Kota Padang Panjang'),
(13, 1375, 'Kota Bukittinggi'),
(13, 1376, 'Kota Payakumbuh'),
(13, 1377, 'Kota Pariaman'),
(14, 1401, 'Kabupaten Kuantan Singingi'),
(14, 1402, 'Kabupaten Indragiri Hulu'),
(14, 1403, 'Kabupaten Indragiri Hilir'),
(14, 1404, 'Kabupaten Pelalawan'),
(14, 1405, 'Kabupaten S I A K'),
(14, 1406, 'Kabupaten Kampar'),
(14, 1407, 'Kabupaten Rokan Hulu'),
(14, 1408, 'Kabupaten Bengkalis'),
(14, 1409, 'Kabupaten Rokan Hilir'),
(14, 1410, 'Kabupaten Kepulauan Meranti'),
(14, 1471, 'Kota Pekanbaru'),
(14, 1473, 'Kota D U M A I'),
(15, 1501, 'Kabupaten Kerinci'),
(15, 1502, 'Kabupaten Merangin'),
(15, 1503, 'Kabupaten Sarolangun'),
(15, 1504, 'Kabupaten Batang Hari'),
(15, 1505, 'Kabupaten Muaro Jambi'),
(15, 1506, 'Kabupaten Tanjung Jabung Timur'),
(15, 1507, 'Kabupaten Tanjung Jabung Barat'),
(15, 1508, 'Kabupaten Tebo'),
(15, 1509, 'Kabupaten Bungo'),
(15, 1571, 'Kota Jambi'),
(15, 1572, 'Kota Sungai Penuh'),
(16, 1601, 'Kabupaten Ogan Komering Ulu'),
(16, 1602, 'Kabupaten Ogan Komering Ilir'),
(16, 1603, 'Kabupaten Muara Enim'),
(16, 1604, 'Kabupaten Lahat'),
(16, 1605, 'Kabupaten Musi Rawas'),
(16, 1606, 'Kabupaten Musi Banyuasin'),
(16, 1607, 'Kabupaten Banyu Asin'),
(16, 1608, 'Kabupaten Ogan Komering Ulu Selatan'),
(16, 1609, 'Kabupaten Ogan Komering Ulu Timur'),
(16, 1610, 'Kabupaten Ogan Ilir'),
(16, 1611, 'Kabupaten Empat Lawang'),
(16, 1612, 'Kabupaten Penukal Abab Lematang Ilir'),
(16, 1613, 'Kabupaten Musi Rawas Utara'),
(16, 1671, 'Kota Palembang'),
(16, 1672, 'Kota Prabumulih'),
(16, 1673, 'Kota Pagar Alam'),
(16, 1674, 'Kota Lubuklinggau'),
(17, 1701, 'Kabupaten Bengkulu Selatan'),
(17, 1702, 'Kabupaten Rejang Lebong'),
(17, 1703, 'Kabupaten Bengkulu Utara'),
(17, 1704, 'Kabupaten Kaur'),
(17, 1705, 'Kabupaten Seluma'),
(17, 1706, 'Kabupaten Mukomuko'),
(17, 1707, 'Kabupaten Lebong'),
(17, 1708, 'Kabupaten Kepahiang'),
(17, 1709, 'Kabupaten Bengkulu Tengah'),
(17, 1771, 'Kota Bengkulu'),
(18, 1801, 'Kabupaten Lampung Barat'),
(18, 1802, 'Kabupaten Tanggamus'),
(18, 1803, 'Kabupaten Lampung Selatan'),
(18, 1804, 'Kabupaten Lampung Timur'),
(18, 1805, 'Kabupaten Lampung Tengah'),
(18, 1806, 'Kabupaten Lampung Utara'),
(18, 1807, 'Kabupaten Way Kanan'),
(18, 1808, 'Kabupaten Tulangbawang'),
(18, 1809, 'Kabupaten Pesawaran'),
(18, 1810, 'Kabupaten Pringsewu'),
(18, 1811, 'Kabupaten Mesuji'),
(18, 1812, 'Kabupaten Tulang Bawang Barat'),
(18, 1813, 'Kabupaten Pesisir Barat'),
(18, 1871, 'Kota Bandar Lampung'),
(18, 1872, 'Kota Metro'),
(19, 1901, 'Kabupaten Bangka'),
(19, 1902, 'Kabupaten Belitung'),
(19, 1903, 'Kabupaten Bangka Barat'),
(19, 1904, 'Kabupaten Bangka Tengah'),
(19, 1905, 'Kabupaten Bangka Selatan'),
(19, 1906, 'Kabupaten Belitung Timur'),
(19, 1971, 'Kota Pangkal Pinang'),
(21, 2101, 'Kabupaten Karimun'),
(21, 2102, 'Kabupaten Bintan'),
(21, 2103, 'Kabupaten Natuna'),
(21, 2104, 'Kabupaten Lingga'),
(21, 2105, 'Kabupaten Kepulauan Anambas'),
(21, 2171, 'Kota B A T A M'),
(21, 2172, 'Kota Tanjung Pinang'),
(31, 3101, 'Kabupaten Kepulauan Seribu'),
(31, 3171, 'Kota Jakarta Selatan'),
(31, 3172, 'Kota Jakarta Timur'),
(31, 3173, 'Kota Jakarta Pusat'),
(31, 3174, 'Kota Jakarta Barat'),
(31, 3175, 'Kota Jakarta Utara'),
(32, 3201, 'Kabupaten Bogor'),
(32, 3202, 'Kabupaten Sukabumi'),
(32, 3203, 'Kabupaten Cianjur'),
(32, 3204, 'Kabupaten Bandung'),
(32, 3205, 'Kabupaten Garut'),
(32, 3206, 'Kabupaten Tasikmalaya'),
(32, 3207, 'Kabupaten Ciamis'),
(32, 3208, 'Kabupaten Kuningan'),
(32, 3209, 'Kabupaten Cirebon'),
(32, 3210, 'Kabupaten Majalengka'),
(32, 3211, 'Kabupaten Sumedang'),
(32, 3212, 'Kabupaten Indramayu'),
(32, 3213, 'Kabupaten Subang'),
(32, 3214, 'Kabupaten Purwakarta'),
(32, 3215, 'Kabupaten Karawang'),
(32, 3216, 'Kabupaten Bekasi'),
(32, 3217, 'Kabupaten Bandung Barat'),
(32, 3218, 'Kabupaten Pangandaran'),
(32, 3271, 'Kota Bogor'),
(32, 3272, 'Kota Sukabumi'),
(32, 3273, 'Kota Bandung'),
(32, 3274, 'Kota Cirebon'),
(32, 3275, 'Kota Bekasi'),
(32, 3276, 'Kota Depok'),
(32, 3277, 'Kota Cimahi'),
(32, 3278, 'Kota Tasikmalaya'),
(32, 3279, 'Kota Banjar'),
(33, 3301, 'Kabupaten Cilacap'),
(33, 3302, 'Kabupaten Banyumas'),
(33, 3303, 'Kabupaten Purbalingga'),
(33, 3304, 'Kabupaten Banjarnegara'),
(33, 3305, 'Kabupaten Kebumen'),
(33, 3306, 'Kabupaten Purworejo'),
(33, 3307, 'Kabupaten Wonosobo'),
(33, 3308, 'Kabupaten Magelang'),
(33, 3309, 'Kabupaten Boyolali'),
(33, 3310, 'Kabupaten Klaten'),
(33, 3311, 'Kabupaten Sukoharjo'),
(33, 3312, 'Kabupaten Wonogiri'),
(33, 3313, 'Kabupaten Karanganyar'),
(33, 3314, 'Kabupaten Sragen'),
(33, 3315, 'Kabupaten Grobogan'),
(33, 3316, 'Kabupaten Blora'),
(33, 3317, 'Kabupaten Rembang'),
(33, 3318, 'Kabupaten Pati'),
(33, 3319, 'Kabupaten Kudus'),
(33, 3320, 'Kabupaten Jepara'),
(33, 3321, 'Kabupaten Demak'),
(33, 3322, 'Kabupaten Semarang'),
(33, 3323, 'Kabupaten Temanggung'),
(33, 3324, 'Kabupaten Kendal'),
(33, 3325, 'Kabupaten Batang'),
(33, 3326, 'Kabupaten Pekalongan'),
(33, 3327, 'Kabupaten Pemalang'),
(33, 3328, 'Kabupaten Tegal'),
(33, 3329, 'Kabupaten Brebes'),
(33, 3371, 'Kota Magelang'),
(33, 3372, 'Kota Surakarta'),
(33, 3373, 'Kota Salatiga'),
(33, 3374, 'Kota Semarang'),
(33, 3375, 'Kota Pekalongan'),
(33, 3376, 'Kota Tegal'),
(34, 3401, 'Kabupaten Kulon Progo'),
(34, 3402, 'Kabupaten Bantul'),
(34, 3403, 'Kabupaten Gunung Kidul'),
(34, 3404, 'Kabupaten Sleman'),
(34, 3471, 'Kota Yogyakarta'),
(35, 3501, 'Kabupaten Pacitan'),
(35, 3502, 'Kabupaten Ponorogo'),
(35, 3503, 'Kabupaten Trenggalek'),
(35, 3504, 'Kabupaten Tulungagung'),
(35, 3505, 'Kabupaten Blitar'),
(35, 3506, 'Kabupaten Kediri'),
(35, 3507, 'Kabupaten Malang'),
(35, 3508, 'Kabupaten Lumajang'),
(35, 3509, 'Kabupaten Jember'),
(35, 3510, 'Kabupaten Banyuwangi'),
(35, 3511, 'Kabupaten Bondowoso'),
(35, 3512, 'Kabupaten Situbondo'),
(35, 3513, 'Kabupaten Probolinggo'),
(35, 3514, 'Kabupaten Pasuruan'),
(35, 3515, 'Kabupaten Sidoarjo'),
(35, 3516, 'Kabupaten Mojokerto'),
(35, 3517, 'Kabupaten Jombang'),
(35, 3518, 'Kabupaten Nganjuk'),
(35, 3519, 'Kabupaten Madiun'),
(35, 3520, 'Kabupaten Magetan'),
(35, 3521, 'Kabupaten Ngawi'),
(35, 3522, 'Kabupaten Bojonegoro'),
(35, 3523, 'Kabupaten Tuban'),
(35, 3524, 'Kabupaten Lamongan'),
(35, 3525, 'Kabupaten Gresik'),
(35, 3526, 'Kabupaten Bangkalan'),
(35, 3527, 'Kabupaten Sampang'),
(35, 3528, 'Kabupaten Pamekasan'),
(35, 3529, 'Kabupaten Sumenep'),
(35, 3571, 'Kota Kediri'),
(35, 3572, 'Kota Blitar'),
(35, 3573, 'Kota Malang'),
(35, 3574, 'Kota Probolinggo'),
(35, 3575, 'Kota Pasuruan'),
(35, 3576, 'Kota Mojokerto'),
(35, 3577, 'Kota Madiun'),
(35, 3578, 'Kota Surabaya'),
(35, 3579, 'Kota Batu'),
(36, 3601, 'Kabupaten Pandeglang'),
(36, 3602, 'Kabupaten Lebak'),
(36, 3603, 'Kabupaten Tangerang'),
(36, 3604, 'Kabupaten Serang'),
(36, 3671, 'Kota Tangerang'),
(36, 3672, 'Kota Cilegon'),
(36, 3673, 'Kota Serang'),
(36, 3674, 'Kota Tangerang Selatan'),
(51, 5101, 'Kabupaten Jembrana'),
(51, 5102, 'Kabupaten Tabanan'),
(51, 5103, 'Kabupaten Badung'),
(51, 5104, 'Kabupaten Gianyar'),
(51, 5105, 'Kabupaten Klungkung'),
(51, 5106, 'Kabupaten Bangli'),
(51, 5107, 'Kabupaten Karang Asem'),
(51, 5108, 'Kabupaten Buleleng'),
(51, 5171, 'Kota Denpasar'),
(52, 5201, 'Kabupaten Lombok Barat'),
(52, 5202, 'Kabupaten Lombok Tengah'),
(52, 5203, 'Kabupaten Lombok Timur'),
(52, 5204, 'Kabupaten Sumbawa'),
(52, 5205, 'Kabupaten Dompu'),
(52, 5206, 'Kabupaten Bima'),
(52, 5207, 'Kabupaten Sumbawa Barat'),
(52, 5208, 'Kabupaten Lombok Utara'),
(52, 5271, 'Kota Mataram'),
(52, 5272, 'Kota Bima'),
(53, 5301, 'Kabupaten Sumba Barat'),
(53, 5302, 'Kabupaten Sumba Timur'),
(53, 5303, 'Kabupaten Kupang'),
(53, 5304, 'Kabupaten Timor Tengah Selatan'),
(53, 5305, 'Kabupaten Timor Tengah Utara'),
(53, 5306, 'Kabupaten Belu'),
(53, 5307, 'Kabupaten Alor'),
(53, 5308, 'Kabupaten Lembata'),
(53, 5309, 'Kabupaten Flores Timur'),
(53, 5310, 'Kabupaten Sikka'),
(53, 5311, 'Kabupaten Ende'),
(53, 5312, 'Kabupaten Ngada'),
(53, 5313, 'Kabupaten Manggarai'),
(53, 5314, 'Kabupaten Rote Ndao'),
(53, 5315, 'Kabupaten Manggarai Barat'),
(53, 5316, 'Kabupaten Sumba Tengah'),
(53, 5317, 'Kabupaten Sumba Barat Daya'),
(53, 5318, 'Kabupaten Nagekeo'),
(53, 5319, 'Kabupaten Manggarai Timur'),
(53, 5320, 'Kabupaten Sabu Raijua'),
(53, 5321, 'Kabupaten Malaka'),
(53, 5371, 'Kota Kupang'),
(61, 6101, 'Kabupaten Sambas'),
(61, 6102, 'Kabupaten Bengkayang'),
(61, 6103, 'Kabupaten Landak'),
(61, 6104, 'Kabupaten Mempawah'),
(61, 6105, 'Kabupaten Sanggau'),
(61, 6106, 'Kabupaten Ketapang'),
(61, 6107, 'Kabupaten Sintang'),
(61, 6108, 'Kabupaten Kapuas Hulu'),
(61, 6109, 'Kabupaten Sekadau'),
(61, 6110, 'Kabupaten Melawi'),
(61, 6111, 'Kabupaten Kayong Utara'),
(61, 6112, 'Kabupaten Kubu Raya'),
(61, 6171, 'Kota Pontianak'),
(61, 6172, 'Kota Singkawang'),
(62, 6201, 'Kabupaten Kotawaringin Barat'),
(62, 6202, 'Kabupaten Kotawaringin Timur'),
(62, 6203, 'Kabupaten Kapuas'),
(62, 6204, 'Kabupaten Barito Selatan'),
(62, 6205, 'Kabupaten Barito Utara'),
(62, 6206, 'Kabupaten Sukamara'),
(62, 6207, 'Kabupaten Lamandau'),
(62, 6208, 'Kabupaten Seruyan'),
(62, 6209, 'Kabupaten Katingan'),
(62, 6210, 'Kabupaten Pulang Pisau'),
(62, 6211, 'Kabupaten Gunung Mas'),
(62, 6212, 'Kabupaten Barito Timur'),
(62, 6213, 'Kabupaten Murung Raya'),
(62, 6271, 'Kota Palangka Raya'),
(63, 6301, 'Kabupaten Tanah Laut'),
(63, 6302, 'Kabupaten Kota Baru'),
(63, 6303, 'Kabupaten Banjar'),
(63, 6304, 'Kabupaten Barito Kuala'),
(63, 6305, 'Kabupaten Tapin'),
(63, 6306, 'Kabupaten Hulu Sungai Selatan'),
(63, 6307, 'Kabupaten Hulu Sungai Tengah'),
(63, 6308, 'Kabupaten Hulu Sungai Utara'),
(63, 6309, 'Kabupaten Tabalong'),
(63, 6310, 'Kabupaten Tanah Bumbu'),
(63, 6311, 'Kabupaten Balangan'),
(63, 6371, 'Kota Banjarmasin'),
(63, 6372, 'Kota Banjar Baru'),
(64, 6401, 'Kabupaten Paser'),
(64, 6402, 'Kabupaten Kutai Barat'),
(64, 6403, 'Kabupaten Kutai Kartanegara'),
(64, 6404, 'Kabupaten Kutai Timur'),
(64, 6405, 'Kabupaten Berau'),
(64, 6409, 'Kabupaten Penajam Paser Utara'),
(64, 6411, 'Kabupaten Mahakam Hulu'),
(64, 6471, 'Kota Balikpapan'),
(64, 6472, 'Kota Samarinda'),
(64, 6474, 'Kota Bontang'),
(65, 6501, 'Kabupaten Malinau'),
(65, 6502, 'Kabupaten Bulungan'),
(65, 6503, 'Kabupaten Tana Tidung'),
(65, 6504, 'Kabupaten Nunukan'),
(65, 6571, 'Kota Tarakan'),
(71, 7101, 'Kabupaten Bolaang Mongondow'),
(71, 7102, 'Kabupaten Minahasa'),
(71, 7103, 'Kabupaten Kepulauan Sangihe'),
(71, 7104, 'Kabupaten Kepulauan Talaud'),
(71, 7105, 'Kabupaten Minahasa Selatan'),
(71, 7106, 'Kabupaten Minahasa Utara'),
(71, 7107, 'Kabupaten Bolaang Mongondow Utara'),
(71, 7108, 'Kabupaten Siau Tagulandang Biaro'),
(71, 7109, 'Kabupaten Minahasa Tenggara'),
(71, 7110, 'Kabupaten Bolaang Mongondow Selatan'),
(71, 7111, 'Kabupaten Bolaang Mongondow Timur'),
(71, 7171, 'Kota Manado'),
(71, 7172, 'Kota Bitung'),
(71, 7173, 'Kota Tomohon'),
(71, 7174, 'Kota Kotamobagu'),
(72, 7201, 'Kabupaten Banggai Kepulauan'),
(72, 7202, 'Kabupaten Banggai'),
(72, 7203, 'Kabupaten Morowali'),
(72, 7204, 'Kabupaten Poso'),
(72, 7205, 'Kabupaten Donggala'),
(72, 7206, 'Kabupaten Toli-toli'),
(72, 7207, 'Kabupaten Buol'),
(72, 7208, 'Kabupaten Parigi Moutong'),
(72, 7209, 'Kabupaten Tojo Una-una'),
(72, 7210, 'Kabupaten Sigi'),
(72, 7211, 'Kabupaten Banggai Laut'),
(72, 7212, 'Kabupaten Morowali Utara'),
(72, 7271, 'Kota Palu'),
(73, 7301, 'Kabupaten Kepulauan Selayar'),
(73, 7302, 'Kabupaten Bulukumba'),
(73, 7303, 'Kabupaten Bantaeng'),
(73, 7304, 'Kabupaten Jeneponto'),
(73, 7305, 'Kabupaten Takalar'),
(73, 7306, 'Kabupaten Gowa'),
(73, 7307, 'Kabupaten Sinjai'),
(73, 7308, 'Kabupaten Maros'),
(73, 7309, 'Kabupaten Pangkajene Dan Kepulauan'),
(73, 7310, 'Kabupaten Barru'),
(73, 7311, 'Kabupaten Bone'),
(73, 7312, 'Kabupaten Soppeng'),
(73, 7313, 'Kabupaten Wajo'),
(73, 7314, 'Kabupaten Sidenreng Rappang'),
(73, 7315, 'Kabupaten Pinrang'),
(73, 7316, 'Kabupaten Enrekang'),
(73, 7317, 'Kabupaten Luwu'),
(73, 7318, 'Kabupaten Tana Toraja'),
(73, 7322, 'Kabupaten Luwu Utara'),
(73, 7325, 'Kabupaten Luwu Timur'),
(73, 7326, 'Kabupaten Toraja Utara'),
(73, 7371, 'Kota Makassar'),
(73, 7372, 'Kota Parepare'),
(73, 7373, 'Kota Palopo'),
(74, 7401, 'Kabupaten Buton'),
(74, 7402, 'Kabupaten Muna'),
(74, 7403, 'Kabupaten Konawe'),
(74, 7404, 'Kabupaten Kolaka'),
(74, 7405, 'Kabupaten Konawe Selatan'),
(74, 7406, 'Kabupaten Bombana'),
(74, 7407, 'Kabupaten Wakatobi'),
(74, 7408, 'Kabupaten Kolaka Utara'),
(74, 7409, 'Kabupaten Buton Utara'),
(74, 7410, 'Kabupaten Konawe Utara'),
(74, 7411, 'Kabupaten Kolaka Timur'),
(74, 7412, 'Kabupaten Konawe Kepulauan'),
(74, 7413, 'Kabupaten Muna Barat'),
(74, 7414, 'Kabupaten Buton Tengah'),
(74, 7415, 'Kabupaten Buton Selatan'),
(74, 7471, 'Kota Kendari'),
(74, 7472, 'Kota Baubau'),
(75, 7501, 'Kabupaten Boalemo'),
(75, 7502, 'Kabupaten Gorontalo'),
(75, 7503, 'Kabupaten Pohuwato'),
(75, 7504, 'Kabupaten Bone Bolango'),
(75, 7505, 'Kabupaten Gorontalo Utara'),
(75, 7571, 'Kota Gorontalo'),
(76, 7601, 'Kabupaten Majene'),
(76, 7602, 'Kabupaten Polewali Mandar'),
(76, 7603, 'Kabupaten Mamasa'),
(76, 7604, 'Kabupaten Mamuju'),
(76, 7605, 'Kabupaten Mamuju Utara'),
(76, 7606, 'Kabupaten Mamuju Tengah'),
(81, 8101, 'Kabupaten Maluku Tenggara Barat'),
(81, 8102, 'Kabupaten Maluku Tenggara'),
(81, 8103, 'Kabupaten Maluku Tengah'),
(81, 8104, 'Kabupaten Buru'),
(81, 8105, 'Kabupaten Kepulauan Aru'),
(81, 8106, 'Kabupaten Seram Bagian Barat'),
(81, 8107, 'Kabupaten Seram Bagian Timur'),
(81, 8108, 'Kabupaten Maluku Barat Daya'),
(81, 8109, 'Kabupaten Buru Selatan'),
(81, 8171, 'Kota Ambon'),
(81, 8172, 'Kota Tual'),
(82, 8201, 'Kabupaten Halmahera Barat'),
(82, 8202, 'Kabupaten Halmahera Tengah'),
(82, 8203, 'Kabupaten Kepulauan Sula'),
(82, 8204, 'Kabupaten Halmahera Selatan'),
(82, 8205, 'Kabupaten Halmahera Utara'),
(82, 8206, 'Kabupaten Halmahera Timur'),
(82, 8207, 'Kabupaten Pulau Morotai'),
(82, 8208, 'Kabupaten Pulau Taliabu'),
(82, 8271, 'Kota Ternate'),
(82, 8272, 'Kota Tidore Kepulauan'),
(91, 9101, 'Kabupaten Fakfak'),
(91, 9102, 'Kabupaten Kaimana'),
(91, 9103, 'Kabupaten Teluk Wondama'),
(91, 9104, 'Kabupaten Teluk Bintuni'),
(91, 9105, 'Kabupaten Manokwari'),
(91, 9106, 'Kabupaten Sorong Selatan'),
(91, 9107, 'Kabupaten Sorong'),
(91, 9108, 'Kabupaten Raja Ampat'),
(91, 9109, 'Kabupaten Tambrauw'),
(91, 9110, 'Kabupaten Maybrat'),
(91, 9111, 'Kabupaten Manokwari Selatan'),
(91, 9112, 'Kabupaten Pegunungan Arfak'),
(91, 9171, 'Kota Sorong'),
(94, 9401, 'Kabupaten Merauke'),
(94, 9402, 'Kabupaten Jayawijaya'),
(94, 9403, 'Kabupaten Jayapura'),
(94, 9404, 'Kabupaten Nabire'),
(94, 9408, 'Kabupaten Kepulauan Yapen'),
(94, 9409, 'Kabupaten Biak Numfor'),
(94, 9410, 'Kabupaten Paniai'),
(94, 9411, 'Kabupaten Puncak Jaya'),
(94, 9412, 'Kabupaten Mimika'),
(94, 9413, 'Kabupaten Boven Digoel'),
(94, 9414, 'Kabupaten Mappi'),
(94, 9415, 'Kabupaten Asmat'),
(94, 9416, 'Kabupaten Yahukimo'),
(94, 9417, 'Kabupaten Pegunungan Bintang'),
(94, 9418, 'Kabupaten Tolikara'),
(94, 9419, 'Kabupaten Sarmi'),
(94, 9420, 'Kabupaten Keerom'),
(94, 9426, 'Kabupaten Waropen'),
(94, 9427, 'Kabupaten Supiori'),
(94, 9428, 'Kabupaten Mamberamo Raya'),
(94, 9429, 'Kabupaten Nduga'),
(94, 9430, 'Kabupaten Lanny Jaya'),
(94, 9431, 'Kabupaten Mamberamo Tengah'),
(94, 9432, 'Kabupaten Yalimo'),
(94, 9433, 'Kabupaten Puncak'),
(94, 9434, 'Kabupaten Dogiyai'),
(94, 9435, 'Kabupaten Intan Jaya'),
(94, 9436, 'Kabupaten Deiyai'),
(94, 9471, 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) UNSIGNED NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_icon`) VALUES
(1, 'Magement RBAC', 'fas fa-users-cog'),
(2, 'Security', 'fas fa-user-shield'),
(3, 'Token', 'fas fa-qrcode'),
(4, 'Dashboard', 'fas fa-tachometer-alt'),
(5, 'Tracking Activity', 'fas fa-user-clock'),
(6, 'Setting Aplikasi', 'fas fa-user-shield');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-04-17-213105', 'App\\Database\\Migrations\\Alumni', 'default', 'App', 1619537253, 1),
(2, '2021-04-17-213203', 'App\\Database\\Migrations\\AuthTable', 'default', 'App', 1619537254, 1),
(3, '2021-04-17-213248', 'App\\Database\\Migrations\\Rbac', 'default', 'App', 1619537254, 1),
(4, '2021-04-17-213438', 'App\\Database\\Migrations\\Webservice', 'default', 'App', 1619537254, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(16) UNSIGNED NOT NULL,
  `jenjang` varchar(6) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `angkatan` int(4) NOT NULL DEFAULT 0,
  `id_alumni` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `jenjang`, `instansi`, `tahun_lulus`, `tahun_masuk`, `angkatan`, `id_alumni`) VALUES
(2, 'D-III', 'Akademi Ilmu Statistik', 1986, 1983, 25, 2),
(3, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 1999, 40, 2),
(4, 'D-III', 'Akademi Ilmu Statistik', 1986, NULL, 25, 3),
(5, 'D-III', 'Akademi Ilmu Statistik', 1986, NULL, 25, 4),
(6, 'D-III', 'Akademi Ilmu Statistik', 1986, NULL, 25, 5),
(33, 'D-III', 'Akademi Ilmu Statistik', 1975, 1972, 14, 433),
(34, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2011, 2007, 14, 434),
(35, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2011, 2007, 49, 435),
(70, 'D-III', 'Akademi Ilmu Statistik', 1966, NULL, 6, 70),
(71, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, NULL, 40, 71),
(72, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, NULL, 40, 72),
(211, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, NULL, 37, 21),
(212, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, NULL, 39, 21),
(221, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, NULL, 37, 22),
(231, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2013, NULL, 51, 23),
(241, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2013, NULL, 51, 24),
(251, 'D-III', 'Akademi Ilmu Statistik', 1985, NULL, 24, 25),
(252, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, NULL, 40, 25),
(261, 'D-III', 'Akademi Ilmu Statistik', 1985, NULL, 24, 26),
(391, 'D-III', 'Akademi Ilmu Statistik', 1992, 1989, 31, 39),
(401, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2018, 2014, 56, 40),
(411, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2018, 2014, 56, 41),
(421, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2014, 2010, 52, 42),
(431, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 43),
(441, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 44),
(451, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 45),
(731, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2003, 2002, 41, 73),
(741, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1999, 1996, 38, 74),
(742, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1999, 38, 74),
(751, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, 1995, 37, 75),
(761, 'D-III', 'Akademi Ilmu Statistik', 1987, 1984, 26, 76),
(811, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 81),
(821, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 82),
(831, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 83),
(841, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 84),
(850, 'D-III', 'Akademi Ilmu Statistik', 1961, 1958, 1, 85),
(860, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2016, 2012, 55, 86),
(870, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2016, 2012, 55, 87),
(880, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, 1995, 37, 88),
(881, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1998, 39, 88),
(931, 'D-III', 'Akademi Ilmu Statistik', 1997, 1994, 36, 93),
(932, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1997, 38, 93),
(941, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1998, 38, 94),
(951, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2011, 2007, 49, 95),
(961, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2003, 1999, 41, 96),
(2711, 'D-III', 'Akademi Ilmu Statistik', 1985, NULL, 24, 27),
(2811, 'D-III', 'Akademi Ilmu Statistik', 1985, NULL, 24, 28),
(3601, 'D-III', 'Akademi Ilmu Statistik', 1996, 1993, 35, 436),
(3602, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2003, 1999, 41, 436),
(3911, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 1999, 1995, 38, 39),
(6901, 'D-III', 'Akademi Ilmu Statistik', 1996, NULL, 35, 69),
(6902, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, NULL, 35, 69),
(7701, 'D-III', 'Akademi Ilmu Statistik', 1990, NULL, 29, 77),
(7702, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, NULL, 40, 77),
(7801, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, NULL, 39, 78),
(7901, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, NULL, 39, 79),
(8001, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, NULL, 40, 80),
(9213, 'D4', 'ais', 1951, 1950, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_tinggi`
--

CREATE TABLE `pendidikan_tinggi` (
  `id_pendidikan` int(16) UNSIGNED NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `judul_tulisan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan_tinggi`
--

INSERT INTO `pendidikan_tinggi` (`id_pendidikan`, `program_studi`, `nim`, `judul_tulisan`) VALUES
(2, 'D-III AIS', '1320', ''),
(3, 'Statistik Sosial Kependudukan', '01.0258', NULL),
(4, 'D-III AIS', '1264', NULL),
(5, 'D-III AIS', '1281', NULL),
(6, 'D-III AIS', '1274', NULL),
(33, 'Ak. Ilmu Statistik', '559', NULL),
(34, 'D-IV Statistik Sosial Kependudukan', 'SK.07.5525', NULL),
(35, 'D-IV Statistik Ekonomi', 'SE.07.5510', NULL),
(70, 'D-III AIS', '270', NULL),
(71, 'D-IV SK', 'SK.01.0186', NULL),
(72, 'D-IV SK', 'SK.01.0275 ', NULL),
(211, 'D-III STIS', '95.2655', 'Analisis Ubinan Kota Wonogiri 1997'),
(212, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0118', 'Mortalitas Penduduk Indonesia'),
(221, 'D-III STIS', '95.2679', 'Judul Tulisannya Apa ya'),
(231, 'D-IV Komputasi Statistik', 'KS.09.6024', 'Clustering Indeks Pembangunan Manusia hihi'),
(241, 'D-IV Komputasi Statistik', 'KS.09.6027', 'Remote Sensing ajah pokoknya'),
(251, 'D-III AIS', '1188', 'Disparitas Distribusi Pendapatan dan Variabel-Variabel yang Mempengaruhinya'),
(252, 'D-IV Statistik Sosial Kependudukan', 'SK.01.0171 ', 'Faktor-faktor yang Mempengaruhi Perawatan Kehamilan'),
(261, 'D-III AIS', '1209', 'Ketimpangan Capaian Pendidikan di Indonesia dan Determinannya'),
(391, 'D-III AIS', '1842', 'Analisis Sistem Keamanan Jaringan Hot-Spot'),
(401, 'Komputasi Statistik', 'KS.14.8287', 'Analisis Sistem Keamanan Jaringan Hot-Spot'),
(411, 'Statistik Ekonomi', 'SE.14.8316', 'Analisis Efisiensi Penggunaan Modal Kerja Untuk Kegiatan Usaha Pada Perusahaan Konveksi Perusahaan'),
(421, 'Komputasi Statistik', 'KS.10.6395', 'Analisa Struktur Kalimat Bahasa Indonesia dengan Menggunakan Pengurai Kalimat Berbasis Linguistik'),
(431, 'D-IV Statistik Sosial Kependudukan', ' SK.04.4611', NULL),
(441, 'D-IV Statistik Sosial Kependudukan', ' SK.03.4145', NULL),
(451, 'D-IV Statistik Ekonomi', 'SE.03.4182 ', NULL),
(731, 'D-IV Statistik Ekonomi', 'SE.02.0398', 'Analisis Prediksi Hari Kiamat 2012 Dengan Metode Monte Carlo'),
(741, 'D-III STIS', '96.2782', 'Analisis Peubah Ganda'),
(742, 'D-IV Statistik Ekonomi', 'SE.99.0052', 'Kecerdasan Buatan'),
(751, 'D-III STIS', '95.2623', 'Sadis, seorang istri tega menjemur dan memukuli kasur karna ketahuan sudah ditiduri suaminya'),
(761, 'Ak. Ilmu Statistik', '1271', 'Ingin mempunyai umur yang panjang seorang kakek berpura-pura budek ketika dipanggil malaikat'),
(811, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0127', NULL),
(821, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0082', NULL),
(831, 'D-IV Statistik Ekonomi', 'SE.00.0152', NULL),
(841, 'D-IV Komputasi Statistik', 'KS.00.0067', NULL),
(850, 'D-III AIS', '1', 'Analisis Klaster Menggunakan Metode Hierarchical Clustering'),
(860, 'D-IV Statistik Ekonomi', 'SE.12.7157', 'Pengaruh Virus H5N1 terhadap Perekonomian di Provinsi Banten'),
(870, 'D-IV Komputasi Statistik', 'KS.12.7151', 'Perancangan Sistem Pakar Pendeteksi Gangguan Kecemasan Berbasis Web'),
(880, 'D-III STIS', '95.2691', 'Analisis Pola Fertilitas Wanita Usia Subur di Indonesia tahun 1997'),
(881, 'D-IV Statistik Ekonomi', 'SE..98.0036', 'Kesalahan Spesifikasi Model pada Data Cacah Menyebabkan Overdispersi'),
(931, 'Ak. Ilmu Statistik', '2515', NULL),
(932, 'D-IV Statistik Sosial Kependudukan', 'SK.99.0055 ', NULL),
(941, 'D-IV Komputasi Statistik', 'KS.98.0019 ', NULL),
(951, 'D-IV Komputasi Statistik', 'KS.07.5297', NULL),
(961, 'D-IV Statistik Ekonomi', 'SE.02.0365', NULL),
(2711, 'D-III AIS', '1226', 'Kemiskinan Multidimensi dan Variabel yang Mempengaruhinya'),
(2811, 'D-III AIS', '1200', 'Pemilihan Model Terbaik pada Peramalan Produksi Batubara di Indonesia'),
(3601, 'Ak. Ilmu Statistik', '2421', NULL),
(3602, 'D-IV Statistik Ekonomi', 'SE.02.0433', NULL),
(3911, 'Komputasi Statistik', 'KS.97.0008', 'Analisis Data Geospasial Media Sosial untuk Melihat Pola Pariwisata di Indonesia'),
(6901, 'D-III AIS', '2353', NULL),
(6902, 'D-IV SE', 'SE.99.0054', NULL),
(7701, 'D-III AIS', '2314', 'Pengeruh Skripsi Terhadap Kesehatan Mental'),
(7702, 'D-IV Statistik Sosial Kependudukan', 'SK.01.0199', 'Pengaruh Pertumbuhan Penduduk terhadap Harga Pasar'),
(7801, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0103', 'Pengaruh Nilai terhadap Presatasi'),
(7901, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0093', 'Binggung bikin judul'),
(8001, 'D-IV Statistik Ekonomi', 'SE.01.0210 ', 'Pokoknya Judul'),
(9213, 'Komputasi', '221810', 'Aww Malu banget');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(16) UNSIGNED NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `tahun_prestasi` year(4) NOT NULL,
  `id_alumni` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nama_prestasi`, `tahun_prestasi`, `id_alumni`) VALUES
(1, 'Juara 1 Lomba Makan Kerupuk Provinsi DKI Jakarta', 1998, 2),
(5, 'juara 1 puisi nasional', 1986, 5),
(6, 'juara 2 puisi nasional', 1986, 6),
(7, 'juara 3 puisi nasional', 1986, 7),
(8, 'juara 1 puisi provinsi', 1986, 8),
(33, 'Juara 1 Pidato Bahasa Inggris Provinsi Sumatera Utara', 1970, 433),
(34, 'Juara 1 Olimpiade Matematika Provinsi Sumatera Barat', 2006, 434),
(35, 'Juara 2 Olimpiade Matematika Provinsi Sumatera Barat', 2006, 435),
(36, 'Juara 3 Pidato Bahasa Inggris Kota Sragen', 1992, 436),
(69, 'Juara 1 tadarus nasional', 1995, 69),
(70, 'juara 1 adzan nasional', 1999, 70),
(71, 'juara 1 ngaji nasional', 2001, 71),
(72, 'juara 1 lari nasional', 2001, 72),
(251, 'Juara 1 Speech Contest', 1984, 25),
(261, 'Best Speaker English Debate', 1983, 26),
(262, 'Juara 1 Infografis Statistika Ria', 1984, 26),
(281, 'Juara 1 Lomba Gombal Nasional', 1985, 28),
(392, 'Juara 3 Olimpiade Statistika ', 1997, 39),
(402, 'Juara I Olimpiade Matematika Tk Provinsi', 2010, 40),
(412, 'Juara 2 Debat Bahasa Inggris', 2012, 41),
(422, 'Harapan I lomba Statistik nasional Statistika Ria IPB', 2012, 42),
(850, 'Juara 1 Lomba Tarik Tambang Provinsi DKI Jakarta', 1962, 85),
(860, 'Juara 3 Lomba Mencari Perhatian Tingkat Jabodetabek', 2014, 86),
(870, 'Juara 2 Menulis Cerita Palsu Tingkat Nasional', 2013, 87),
(880, 'Juara 1 Lomba Dakwah Islami', 1996, 88),
(892, 'Juara 1 Olimpiade Matematika', 1995, 93),
(902, 'Juara 1 Olimpiade Matematika', 2001, 94),
(912, 'Juara 1 Olimpiade Matematika', 2008, 95),
(922, 'Juara 3 Olimpiade Matematika', 2003, 96),
(2101, 'Juara 1 Logika UI ', 1998, 21),
(2102, 'Juara 3 Satria Data Essay Nasional', 1999, 21),
(2301, 'Juara 1 Lomba Makan Mie Sepuluh Porsi', 2010, 23),
(2401, 'Juara 3 Arkavidia ITB Kompetisi Programming', 2019, 24),
(4301, 'Juara 1 Jambore Statistika ', 2007, 43),
(4401, 'Juara 3 Olimpiade Statistika', 2006, 44),
(4501, 'Juara 2 Kompetisi Essay Statistika Statistics Festival UGM', 2007, 45),
(7301, 'JUARA 1 LOMBA RENANG 10 KM CABANG GAYA KODOK DI ANTARTIKA', 2020, 73),
(7401, 'JUARA 1 LOMBA MEMASUKKAN JIN KE DALAM BOTOL', 2022, 74),
(7501, 'JUARA 2 LOMBA MEMBUAT BAYI MENANGIS', 2017, 75),
(7601, 'JUARA 3 LOMBA TIDUR PALING LAMA DI KELAS', 2015, 76),
(8101, 'Juara 1 Turnamen Dewa Kipas', 2001, 81),
(8201, 'Juara 2 Lomba Baca Puisi Cinta', 2001, 82),
(8301, 'Juara 1 Olimpiade Statistika', 2000, 83),
(8401, 'Juara 1 Olimpiade Statistika', 2000, 84),
(9301, 'Juara 2 Olimpiade Matematika', 1995, 93),
(9401, 'Juara 1 Kompetisi Sains Data', 2001, 94),
(9501, 'Juara 1 Olimpiade Statistika', 2008, 95),
(9601, 'Juara 3 Olimpiade Statistika', 2003, 96),
(9602, 'Mangatz', 1954, 210422);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(11, 'Aceh'),
(12, 'Sumatera Utara'),
(13, 'Sumatera Barat'),
(14, 'Riau'),
(15, 'Jambi'),
(16, 'Sumatera Selatan'),
(17, 'Bengkulu'),
(18, 'Lampung'),
(19, 'Kepulauan Bangka Belitung'),
(21, 'Kepulauan Riau'),
(31, 'Dki Jakarta'),
(32, 'Jawa Barat'),
(33, 'Jawa Tengah'),
(34, 'Di Yogyakarta'),
(35, 'Jawa Timur'),
(36, 'Banten'),
(51, 'Bali'),
(52, 'Nusa Tenggara Barat'),
(53, 'Nusa Tenggara Timur'),
(61, 'Kalimantan Barat'),
(62, 'Kalimantan Tengah'),
(63, 'Kalimantan Selatan'),
(64, 'Kalimantan Timur'),
(65, 'Kalimantan Utara'),
(71, 'Sulawesi Utara'),
(72, 'Sulawesi Tengah'),
(73, 'Sulawesi Selatan'),
(74, 'Sulawesi Tenggara'),
(75, 'Gorontalo'),
(76, 'Sulawesi Barat'),
(81, 'Maluku'),
(82, 'Maluku Utara'),
(91, 'Papua Barat'),
(94, 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `publikasi` varchar(255) NOT NULL,
  `id_alumni` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`publikasi`, `id_alumni`) VALUES
('ABCD', 79),
('Algoritma Pemrograman Metode Numerik Kalkulus ', 24),
('Analisa Komoditi Ekspor Sektor Industri, Pertanian, dan Pertambangan', 25),
('Analisa Struktur Kalimat Bahasa Indonesia dengan Menggunakan Pengurai Kalimat Berbasis Linguistik', 42),
('Analisis Custering Time Series pada Data Import tiap Provinsi', 22),
('Analisis Data Geospasial Media Sosial untuk Melihat Pola Pariwisata di Indonesia', 39),
('Analisis Efisiensi Penggunaan Modal Kerja Untuk Kegiatan Usaha Pada Perusahaan Konveksi Perusahaan', 41),
('Analisis Empiris Perilaku Konsumsi Pangan Masyarakat di Kota Sukabumi', 43),
('Analisis Faktor-faktor yang Memengaruhi Mahasiswa STIS dalam Memilih Penempatan', 95),
('Analisis Harga Bitcoin Menggunakan Metode SARIMA', 86),
('Analisis Kepuasan Mahasiswa STIS terhadap Kualitas Pelayanan Klinik Kampus STIS', 94),
('Analisis Klaster Menggunakan Partition-based Clustering pada Data Kemiskinan Provinsi Jawa Barat Tahun 2013', 87),
('Analisis Mobilitas Tenaga Kerja Hasil Sakernas', 28),
('Analisis Pengaruh Bermain Game terhadap Prestasi', 72),
('Analisis Perubahan Pola Makan Penduduk dengan Perekonomian Tingkat Menengah dengan Tingkat Atas', 2),
('Analisis Semantik terhadap pernyataan \"Tetap semangat ya, kegagalanmu hari ini adalah awal dari kegagalan selanjutnya\"', 85),
('Analisis Sistem Keamanan Jaringan Hot-Spot', 40),
('Analisis Time Series Pendekatan Error Correction Mechanism pada Ekspor  Kopi Indonesia ke Jepang Periode 2005-2010', 44),
('BE YOURSELF AND NEVER SURRENDER!1', 81),
('BE YOURSELF AND NEVER SURRENDER!2', 82),
('BE YOURSELF AND NEVER SURRENDER!3', 83),
('BE YOURSELF AND NEVER SURRENDER!4', 84),
('Biarkan saja orang menertawakan dirimu, karena itu memang pantas untukmu', 88),
('dampak buruk makan malam terhadap aktivitas olahraga', 8),
('Diduga sebagai penyebab kemacetan, polisi tidur dibangunkan oleh warga', 75),
('Distribusi Upah di Indonesia : Perbandingan Antar Kelompok Gender', 434),
('EFGH', 80),
('Faktor-Faktor yang Mempengaruhi Pernikahan Dini pada Wanita usia 20-24 di Ogan Ilir Tahun 2016 ', 45),
('Harga sembako sudah mulai merangkak naik, diperkirakan sudah dapat berjalan dan bisa berlari tahun depan', 73),
('Implementasi Analisis Faktor Pada Pengambilan Keputusan Mahasiswa dalam Memilih Program Studi di STIS', 433),
('Ini Publikasi', 77),
('Itu Publikasi', 78),
('Kreatifitas tanpa batas dan melampauinya', 21),
('Model Regresi Dummy Indeks Prestasi Kumulatif Mahasiswa Prodi D-IV Statistik Ekonomi di STIS', 435),
('Penerapan Monte Carlo Marcov Chain pada Cinta', 23),
('Pengaruh Jam Tidur terhadap Kerajinan', 71),
('Pengaruh lama tidur terhadap prestasi', 70),
('pengaruh rokok terhadap kesehatan paru-paru', 5),
('pengaruh sarapan pagi terhadap kesehatan otak', 7),
('Pengaruh Stress terhadap Prestasi', 69),
('pengaruh tidur siang terhadap efektivitas belajar ', 6),
('Pengelompokan Kecamatan di DKI Jakarta Berdasarkan Karakteristik Kesejahteraan Rakyat Menggunakan Metode K-Means Cluster', 96),
('Pengendalian Kualitas Produk Menggunakan Peta Kendali T^2 Hotelling', 436),
('Potret Pendidikan Indonesia', 26),
('Prediksi Jumlah Pendaftar STIS dengan Menggunakan Metode ARIMA', 93),
('Produksi Padi dan Palawija dan Angka Ramalan', 27),
('Seorang anak tewas tersedak karena disuruh memakan kuda saat pertandingan catur', 76),
('Tragis, seorang jomblo terjatuh dalam jurang masa lalu dan terkubur bersama kenangan', 74);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id_report` int(16) UNSIGNED NOT NULL,
  `alasan` varchar(300) NOT NULL,
  `id_alumni` int(7) NOT NULL,
  `id_foto` int(16) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scope_app`
--

CREATE TABLE `scope_app` (
  `id` int(11) UNSIGNED NOT NULL,
  `scope` varchar(255) NOT NULL,
  `scope_dev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scope_app`
--

INSERT INTO `scope_app` (`id`, `scope`, `scope_dev`) VALUES
(1, 'user:profile:read', 'Mengakses informasi pribadi dasar pengguna'),
(2, 'alumni:profile:read', 'Mengakses informasi pribadi dasar alumni atas nama pengguna'),
(3, 'alumni:profile:list', 'Mengakses informasi pribadi dasar alumni atas nama pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `active` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `menu_id`, `title`, `url`, `icon`, `active`) VALUES
(1, 1, 'Users', 'admin/users', 'fas fa-users', '1'),
(2, 1, 'Users Groups', 'admin/users-groups', 'fas fa-tags', '1'),
(3, 1, 'Groups', 'admin/groups', 'fas fa-user-tag', '1'),
(4, 1, 'Resources', 'admin/resources', 'fas fa-tasks', '1'),
(5, 1, 'Access', 'admin/access', 'fas fa-tools', '1'),
(6, 1, 'Permissions', 'admin/permissions', 'fas fa-cogs', '1'),
(7, 2, 'Reset Attempts', 'admin/reset-attempts', 'fas fa-sync-alt', '1'),
(8, 2, 'Activation Attempts', 'admin/activation-attempts', 'fas fa-key', '1'),
(9, 2, 'Login Attempts', 'admin/login-attempts', 'fas fa-sign-in-alt', '1'),
(10, 4, 'Report 1', 'admin/report-1', 'far fa-chart-bar', '1'),
(11, 5, 'Activity Log', 'admin/activity-log', 'activity-log', '1'),
(12, 3, 'Activation Tokens', 'admin/activation-tokens', 'fas fa-barcode', '1'),
(13, 3, 'Reset Tokens', 'admin/reset-tokens', 'fas fa-barcode', '1'),
(14, 4, 'Report 2', 'admin/reports/report-2', 'far fa-chart-bar', '0');

-- --------------------------------------------------------

--
-- Table structure for table `submenu_access`
--

CREATE TABLE `submenu_access` (
  `menu_access_id` int(11) UNSIGNED NOT NULL,
  `submenu_id` int(11) UNSIGNED NOT NULL,
  `crud_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submenu_access`
--

INSERT INTO `submenu_access` (`menu_access_id`, `submenu_id`, `crud_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4),
(21, 6, 1),
(22, 6, 2),
(23, 6, 3),
(24, 6, 4),
(25, 7, 2),
(26, 8, 2),
(27, 9, 2),
(28, 12, 2),
(29, 11, 2),
(30, 10, 2),
(31, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_scope`
--

CREATE TABLE `table_scope` (
  `target_scope_id` int(11) UNSIGNED NOT NULL,
  `target_scope` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_scope`
--

INSERT INTO `table_scope` (`target_scope_id`, `target_scope`) VALUES
(1, 'Tabel Users'),
(2, 'Tabel Users Groups'),
(3, 'Tabel Resources'),
(4, 'Tabel Resources Access'),
(5, 'Tabel Permission'),
(6, 'Tabel Groups');

-- --------------------------------------------------------

--
-- Table structure for table `tag_foto`
--

CREATE TABLE `tag_foto` (
  `tag` varchar(80) NOT NULL,
  `id_foto` int(16) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_kerja`
--

CREATE TABLE `tempat_kerja` (
  `id_tempat_kerja` int(16) UNSIGNED NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(24) DEFAULT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `alamat_instansi` text DEFAULT NULL,
  `telp_instansi` varchar(25) DEFAULT NULL,
  `faks_instansi` varchar(50) DEFAULT NULL,
  `email_instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempat_kerja`
--

INSERT INTO `tempat_kerja` (`id_tempat_kerja`, `nama_instansi`, `kota`, `provinsi`, `negara`, `alamat_instansi`, `telp_instansi`, `faks_instansi`, `email_instansi`) VALUES
(1, 'BPS Dummy', 'Manado', 'Lampung', 'Albania', 'Ki. Acordion No. 70, Probolinggo 66519, KalUt', '0859 3699 927', '0809 083 024', 'yunita57@gmail.com'),
(2, 'BPS Pusat', 'Jakarta Pusat', 'DKI Jakarta', 'Indonesia', 'Jl. Dr. Sutomo 6-8', '(62-21) 3841195', '(62-21) 3857046', 'bpshq@bps.go.id'),
(3, 'BPS Kota Semarang', 'Semarang', 'Jawa Tengah', 'Indonesia', 'Jl. Inspeksi Kali Semarang No.1', '0243546413', NULL, 'bps3374@bps.go.id'),
(4, 'BPS Kabupaten Tabanan', 'Tabanan', 'Bali', 'Indonesia', 'Jl. Pahlawan No 1B', '0361811571', '', 'bps5102@bps.go.id'),
(5, 'BPS Kabupaten Karawang', 'Karawang', 'Jawa Barat', 'Indonesia', 'Jl. Cakradireja No.36', '0267402250', NULL, 'kabkarawang@bps.go.id'),
(9, 'BPS Kabupaten Lamongan', 'Lamongan', 'Jawa Timur', 'Indonesia', 'Jl. Veteran 185 Lamongan-62218', '(0322) 321339', '(0322) 321339', 'bps3524@bps.go.id'),
(10, 'BPS Provinsi Lampung', 'Bandar Lampung', 'Lampung', 'Indonesia', 'Jl. Basuki Rahmat No 54', '(62-721) 482909', '(62-721) 484329', 'bps1800@bps.go.id'),
(11, 'BPS Kabupaten Tegal', 'Tegal', 'Jawa Tengah', 'Indonesia', 'Jl Ade Irma Suryani No 1 Slawi', '(0283) 4561190', '(0283) 4561190', 'bps3328@bps.go.id'),
(12, 'BPS Provinsi DKI Jakarta', 'Jakarta Pusat', 'Jakarta', 'Indonesia', 'Jl. Salemba Tengah No. 36-38 Paseban Senen', '(021) 31928493', '(021) 3152004', 'bps3100@bps.go.id'),
(27, 'BPS Provinsi Jawa Barat', 'Bandung', 'Jawa Barat', 'Indonesia', 'Jl. PHH. Mustofa No. 43 Bandung 40124', '+62 22 7272595', '+62 22 7213572', 'bps3200@bps.go.id'),
(31, 'BPS Indragiri Hilir', 'Indragiri Hilir', 'Riau', 'Indonesia', 'Jl. Praja Sakti (Bunga) No. 11 Tembilahan Hilir, Tembilahan. ', ' (0768) 22489', ' (0768) 22489', 'bps1403@bps.go.id'),
(32, 'BPS Provinsi Kalimantan Selatan', 'Palangkaraya', 'Kalimantan Tengah', 'Indonesia', 'Jl. Kapt. Piere Tendean No 6 Palangka Raya 73112 Indonesia', ' (0536) 322 8105', ' (0536) 322 8105', 'kalteng@bps.go.id'),
(33, 'BPS Provinsi Nusa Tenggara Timur', 'Kupang', 'Nusa Tenggara Timur', 'Indonesia', 'Jl. R. Suprapto No. 5', '(0380) 8554535', '(0380) 8550136', 'ntt@bps.go.id'),
(35, 'BPS Kota Pariaman', 'Pariaman', 'Sumatera Barat', 'Indonesia', 'Jl. Sentot Ali Basa', '(0751) 93785', '(0751) 93780', 'pariaman@bps.go.id'),
(36, 'BPS Kabupaten Boyolali', 'Boyolali', 'Jawa Tengah', 'Indonesia', 'Jl. Raya Boyolali-Semarang No.Km. 2', '(0276) 323772', '(0276) 323701', 'boyolali@bps.go.id'),
(50, 'BPS Kabupaten Garut', 'Garut', 'Jawa Barat', 'Indonesia', 'Jl. Pembangunan No.222, Sukagalih, Kec. Tarogong Kidul', '233273', '020234873432', 'bpsgarut@gmail.com'),
(51, 'BPS Kabupaten Musi Banyuasin', 'Musi Banyuasin', 'Sumatera Selatan', 'Indonesia', 'Jl. Merdeka No.531, Kayu Ara, Sekayu', '0001234', '02025678', 'bpsmusibanyuasin@gmail.com'),
(69, 'BPS Kabupaten Lebak', 'Lebak', 'Banten', 'Indonesia', 'Jl. Jendral Sudirman No.807, Narimbang Mulia, Kec. Rangkasbitung, Kabupaten Lebak, Banten 42315', '(62-252) 5554673', '', 'bps3602@bps.go.id'),
(72, 'BPS Kota Tangerang', 'Tangerang', 'Banten', 'Indonesia', 'Jl. RHM Noer Radji No. 28 Gerendeng Tangerang', '(62-21) 55792858', '(62-21) 55796910', 'bps3671@bps.go.id'),
(73, 'BPS Provinsi Jawa Tengah', 'Semarang', 'Jawa Tengah', 'Indonesia', 'Jl. Pahlawan No.6, Pleburan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50241', '024 - 8412802', '024 - 8311195', 'bps3300@bps.go.id'),
(75, 'BPS Kabupaten Pringsewu', 'Pringsewu', 'Lampung', 'Indonesia', 'Jl. Raya Gading Rejo KM.33 Wonodadi, Gading Rejo 35372', '(62-729) 7330811', NULL, 'bps1810@bps.go.id'),
(210, 'BPS Kota Jakarta Selatan', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', 'Komplek Walikota Jakarta Selatan Blok A 15th Floor, JL. Prapanca Raya, No. 9, Kebayoran Baru, RT.2/RW.3, Pulo, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160', '(021) 72792576', '(021) 27872812', 'bps3171@bps.go.id'),
(220, 'BPS Kabupaten Indramayu', 'Indramayu', 'Jawa Barat', 'Indonesia', 'Jl. Golf No. 4 Indramayu, Jawa Barat - Indonesia', '+62 234 272880', '+62 234 272880', 'bps3212@bps.go.id'),
(230, 'BPS Kabupaten Bintan', 'Bintan', 'Kepulauan Riau', 'Indonesia', 'Jl. Tata Bumi, Ceruk Ijuk, Toapaya, Bintan, Kepulauan Riau', ' (0771) 3300 700', NULL, 'bps2102@bps.go.id'),
(240, 'BPS Kota Surabaya', 'Kota Surabaya', 'Jawa Timur', NULL, 'Jl. A. Yani 152 E Surabaya 60231 Jawa Timur Indonesia', '(62-31) 82516020', '(62-31) 8296691', 'bps3578@bps.go.id'),
(290, 'BPS Minahasa', 'Minahasa', 'Sulawesi Utara', 'Indonesia', 'Jl. Dotulolong Lasut, Tondano Timur, Minahasa', '(0431)321155', '(0431)321155', ' bps7102@bps.go.id'),
(299, 'BPS Jawa Timur', 'Surabaya', 'Jawa Timur', 'Indonesia', 'Jl. Raya Kendangsari Industri N0.34', '081213869409', '62913857000', 'tpramono11@bps.go.id'),
(390, 'BPS Bangka Selatan', 'Bangka Selatan', 'Bangka Belitung', 'Indonesia', NULL, '(0718) 4220039', NULL, 'bps1905@bps.go.id'),
(400, 'BPS Tomohon', 'Tomohon', 'Sulawesi Utara', 'Indonesia', 'JL. Nimawanua, Lansot, Lansot, Tomohon Sel., Kota Tomohon, Sulawesi Utara', '0431) 3159904', NULL, 'bps7173@bps.go.id'),
(410, 'BPS Sorong Selatan', 'Sorong Selatan', 'Papua Barat', 'Indonesia', 'Jalan Teminabuan-Ayamaru', NULL, NULL, 'bps9106@bps.go.id'),
(420, 'BPS Sulawesi Tenggara', 'Kendari', 'Sulawesi Tenggara', 'Indonesia', 'Jl. Boulevard No. 1 Kendari Sulawesi Tenggara', '(0401) 3135363', '0401-3122355', 'bps7400@bps.go.id'),
(430, 'BPS Kabupaten Sukabumi', 'Sukabumi', 'Jawa Barat', 'Indonesia', 'Jl. Raya Karangtengah Km 14 No 52 Cibadak Sukabumi 43351', '0266536953', '0653536949', 'bps3202@bps.go.id'),
(440, 'BPS Kabupaten Gunungkidul', 'Gunungkidul', 'Jawa Tengah', 'Indonesia', 'Jl. Pemuda 19A Baleharjo Wonosari 55811', '0274394180', '0274394181', 'bps3403@bps.go.id'),
(450, 'BPS Kabupaten Ogan Ilir', 'Prabumulih', 'Sumatera Selatan', 'Indonesia', 'Jl. Palembang-Prabumulih Km 33 Desa Tanjung Pering 30813 Indralaya', '0711581713', '0711581713', 'bps1610@bps.go.id'),
(781, 'BPS Kabupaten Paser', 'Paser', 'Kalimantan Timur', 'Indonesia', 'Jl. Gajah Mada No.76, Tanah Grogot', '(0543)21219', '(0543)21219', 'bps6401@bps.go.id'),
(791, 'BPS Kota Samarinda', 'Samarinda', 'Kalimantan Timur', 'Indonesia', 'Jl. Kyai Haji Ahmad Dahlan No.33, Sungai Pinang Luar', '(0543)21219', '(0543)21219', 'bps6401@bps.go.id'),
(801, 'BPS Provinsi Daerah Istimewa Yogyakarta', 'Bantul', 'Daerah Istimewa Yogyakar', 'Indonesia', 'Jalan Lingkar Selatan, Tamantirto, Kasihan, Geblagan, Tamantirto', '0274-4342234', '0274-4342230', 'pst3400@bps.go.id'),
(810, 'BPS Kab Empat Lawang', NULL, NULL, 'Indonesia', 'Jl. Lintas Sumatera No. 35 Kecamatan Tebing Tinggi Kabupaten Empat Lawang Sumatera Selatan', '070221674', '070221674', 'bps1611@bps.go.id'),
(820, 'BPS Kota Bekasi', NULL, NULL, 'Indonesia', 'Jl. Rawa Tembaga I, No. 6, Bekasi', '02188953987', '02188953987', 'bps3275@bps.go.id'),
(830, 'BPS Kab Lampung Selatan', NULL, NULL, 'Indonesia', 'Jl. Mustafa Kemal No. 24 Kalianda, Lampung Selatan - Lampung', '0727322241 ', '0727322241 ', 'bps1803@bps.go.id'),
(840, 'BPS Kab Tasikmalaya', NULL, NULL, 'Indonesia', 'Jalan Raya Timur Singaparna km 4 Cintaraja Singaparna Tasikmalaya', '0265549281', '0265549253', 'bps3206@bps.go.id'),
(860, 'BPS Kabupaten Pulau Morotai', 'Pulau Morotai', 'Maluku Utara', 'Indonesia', 'Jln. Hi. Ahmad Syukur, Kec. Morotai Selatan, Pulau Morotai-Maluku Utara, 97771', '(0923) 2221133', NULL, 'bps8207@bps.go.id'),
(870, 'BPS Provinsi Maluku Utara', 'Ternate', 'Maluku Utara', 'Indonesia', 'Jl. Stadion No 65 Ternate 97712', '(0921) 3127878', '(0921) 3126301', 'bps8200@bps.go.id'),
(880, 'Politeknik Statistika STIS', 'Jakarta Timur', 'DKI Jakarta', 'Indonesia', 'Jl. Otto Iskandardinata No. 64C', '(021) 8508812', '8197577', 'info@stis.ac.id'),
(890, 'BPS Kabupaten/Kota Bandung', 'Bandung', 'Jawa Barat', 'Indonesia', NULL, NULL, NULL, ''),
(920, 'BPS Kabupaten Aceh Singkil', 'Aceh Singkil', 'Aceh', 'Indonesia', 'Jl. H. Sayuthi No. 2  Pulo Sarok', '(0658) 21268', '21268', 'bps1102@bps.go.id'),
(930, 'BPS Kabupaten Rembang', 'Rembang', 'Jawa Tengah', 'Indonesia', 'Jl. Pemuda Km. 1', '0295691040', '0295691040', 'bps3317@bps.go.id'),
(940, 'BPS Kabupaten Cilacap', 'Cilacap', 'Jawa Tengah', 'Indonesia', 'Jalan Dr. Soetomo No. 16A', '0282534328', '0282535011', 'bps3301@bps.go.id'),
(950, 'BPS Kabupaten Klaten', 'Klaten', 'Jawa Tengah', 'Indonesia', 'Jl. Merapi No. 6', '62272321689', NULL, 'bps3310@bps.go.id'),
(960, 'BPS Kota Malang', 'Malang', 'Jawa Timur', 'Indonesia', 'Jl. Janti Barat No. 47', '0341801164', '0341805871', 'bps3573@bps.go.id'),
(961, 'BPS Kota Banjarmasin', NULL, NULL, NULL, 'Jalan Gatot Subroto No. 5 Banjarmasin 70235', '(0511) 6773031', '(0511) 6773032', 'bps6371@gmail.com'),
(962, 'BPS Provinsi Riau', NULL, NULL, NULL, 'Jl. Pattimura No. 12 Pekanbaru - Riau, Indonesia', '(62-761) 23042', '(62-761) 21336', 'riau@bps.go.id'),
(963, 'BPS Kabupaten Tanjung Jabung Barat', NULL, NULL, NULL, 'Jl. Prof.Dr. Sri Soedewi MS, SH.-Kuala Tungkal, Jambi', '(0742) 21738', NULL, 'bps1507@bps.go.id'),
(964, 'BPS Provinsi Sulawesi Utara', NULL, NULL, NULL, 'Jl. 17 Agustus Manado 95119', '(0431) 847044', '(0431) 862204', 'mailto:sulut@bps.go.id'),
(965, 'BPS Kabupaten Cirebon', NULL, NULL, NULL, 'Jl. Sunan Kalijaga No.4 Sumber-Cirebon 45611', '+62 231 321445', '+62 231 321445', 'bps3209@bps.go.id');

-- --------------------------------------------------------

--
-- Table structure for table `token_app`
--

CREATE TABLE `token_app` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` varchar(30) DEFAULT NULL,
  `count_usage` int(11) NOT NULL DEFAULT 0,
  `last_access` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `token_scope`
--

CREATE TABLE `token_scope` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_token` int(11) UNSIGNED NOT NULL,
  `id_scope` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `id_alumni` int(6) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `id_alumni`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dummy@stis.ac.id', 'Dummy', 1, 'Dummy_dummy', 'default.svg', '$2y$10$yLFu3bK0s5cHqd1VLT6Eh.GjA3H2GJzwqb6o/gjrhKXTWGkMsh3IS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-27 22:27:45', '2021-04-27 22:27:45', NULL),
(2, '221810422@stis.ac.id', '221810422', 210422, 'MOCHAMAD IZZA ZULFIKAR SYA\'RONI', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-02 00:33:27', '2021-05-02 00:33:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(16) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `approval` tinyint(1) NOT NULL DEFAULT 0,
  `id_alumni` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `activity_log_target_scope_id_foreign` (`target_scope_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `alumni_tempat_kerja`
--
ALTER TABLE `alumni_tempat_kerja`
  ADD PRIMARY KEY (`id_alumni`,`id_tempat_kerja`),
  ADD KEY `alumni_tempat_kerja_id_tempat_kerja_foreign` (`id_tempat_kerja`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `client_app`
--
ALTER TABLE `client_app`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_app_uid_foreign` (`uid`),
  ADD KEY `client_app_uid_admin_foreign` (`uid_admin`),
  ADD KEY `client_app_id_token_foreign` (`id_token`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`crud_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `foto_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `groups_access`
--
ALTER TABLE `groups_access`
  ADD PRIMARY KEY (`access_group_id`),
  ADD KEY `groups_access_group_id_foreign` (`group_id`),
  ADD KEY `groups_access_menu_access_id_foreign` (`menu_access_id`);

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`id_kabkota`),
  ADD KEY `foreign` (`id_provinsi`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `pendidikan_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `pendidikan_tinggi`
--
ALTER TABLE `pendidikan_tinggi`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `prestasi_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`publikasi`,`id_alumni`),
  ADD KEY `publikasi_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `report_id_foto_foreign` (`id_foto`),
  ADD KEY `report_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `scope_app`
--
ALTER TABLE `scope_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`),
  ADD KEY `submenu_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `submenu_access`
--
ALTER TABLE `submenu_access`
  ADD PRIMARY KEY (`menu_access_id`),
  ADD KEY `submenu_access_submenu_id_foreign` (`submenu_id`),
  ADD KEY `submenu_access_crud_id_foreign` (`crud_id`);

--
-- Indexes for table `table_scope`
--
ALTER TABLE `table_scope`
  ADD PRIMARY KEY (`target_scope_id`);

--
-- Indexes for table `tag_foto`
--
ALTER TABLE `tag_foto`
  ADD PRIMARY KEY (`tag`,`id_foto`),
  ADD KEY `tag_foto_id_foto_foreign` (`id_foto`);

--
-- Indexes for table `tempat_kerja`
--
ALTER TABLE `tempat_kerja`
  ADD PRIMARY KEY (`id_tempat_kerja`);

--
-- Indexes for table `token_app`
--
ALTER TABLE `token_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_scope`
--
ALTER TABLE `token_scope`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token_scope_id_token_foreign` (`id_token`),
  ADD KEY `token_scope_id_scope_foreign` (`id_scope`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_id_alumni_foreign` (`id_alumni`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `video_id_alumni_foreign` (`id_alumni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210423;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_app`
--
ALTER TABLE `client_app`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `crud_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(16) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups_access`
--
ALTER TABLE `groups_access`
  MODIFY `access_group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9214;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9603;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(16) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scope_app`
--
ALTER TABLE `scope_app`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `submenu_access`
--
ALTER TABLE `submenu_access`
  MODIFY `menu_access_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `table_scope`
--
ALTER TABLE `table_scope`
  MODIFY `target_scope_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempat_kerja`
--
ALTER TABLE `tempat_kerja`
  MODIFY `id_tempat_kerja` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=966;

--
-- AUTO_INCREMENT for table `token_app`
--
ALTER TABLE `token_app`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token_scope`
--
ALTER TABLE `token_scope`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(16) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_target_scope_id_foreign` FOREIGN KEY (`target_scope_id`) REFERENCES `table_scope` (`target_scope_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alumni_tempat_kerja`
--
ALTER TABLE `alumni_tempat_kerja`
  ADD CONSTRAINT `alumni_tempat_kerja_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_tempat_kerja_id_tempat_kerja_foreign` FOREIGN KEY (`id_tempat_kerja`) REFERENCES `tempat_kerja` (`id_tempat_kerja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_app`
--
ALTER TABLE `client_app`
  ADD CONSTRAINT `client_app_id_token_foreign` FOREIGN KEY (`id_token`) REFERENCES `token_app` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `client_app_uid_admin_foreign` FOREIGN KEY (`uid_admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `client_app_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups_access`
--
ALTER TABLE `groups_access`
  ADD CONSTRAINT `groups_access_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_access_menu_access_id_foreign` FOREIGN KEY (`menu_access_id`) REFERENCES `submenu_access` (`menu_access_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD CONSTRAINT `foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan_tinggi`
--
ALTER TABLE `pendidikan_tinggi`
  ADD CONSTRAINT `pendidikan_tinggi_id_pendidikan_foreign` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD CONSTRAINT `publikasi_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_id_foto_foreign` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id_foto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submenu_access`
--
ALTER TABLE `submenu_access`
  ADD CONSTRAINT `submenu_access_crud_id_foreign` FOREIGN KEY (`crud_id`) REFERENCES `crud` (`crud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submenu_access_submenu_id_foreign` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`submenu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_foto`
--
ALTER TABLE `tag_foto`
  ADD CONSTRAINT `tag_foto_id_foto_foreign` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id_foto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `token_scope`
--
ALTER TABLE `token_scope`
  ADD CONSTRAINT `token_scope_id_scope_foreign` FOREIGN KEY (`id_scope`) REFERENCES `scope_app` (`id`),
  ADD CONSTRAINT `token_scope_id_token_foreign` FOREIGN KEY (`id_token`) REFERENCES `token_app` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_id_alumni_foreign` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
