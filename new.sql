-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 09:24 AM
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

INSERT INTO `alumni` (`id_alumni`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telp_alumni`, `alamat_alumni`, `kota`, `provinsi`, `negara`, `status_bekerja`, `perkiraan_pensiun`, `jabatan_terakhir`, `aktif_pns`, `deskripsi`, `email`, `ig`, `fb`, `twitter`, `nip`, `nip_bps`, `foto_profil`, `cttl`, `calamat`, `cpendidikan`, `cprestasi`) VALUES
(1, 'Dummy_dummy', 'Lk', 'Sungai Penuh', '1997-01-25', '(+62) 244 7038 597', 'Jr. Abdul Rahmat No. 755, Tangerang 47637, SulUt', 'Magelang', 'Aceh', 'Kolombia', 0, 1978, 'amet', 0, 'Maiores ut quasi beatae vel quisquam. Quo aut iusto et nobis et blanditiis non. Animi in architecto et iusto occaecati mollitia vel.', 'wulan.pratiwi@winarsih.mil.id', 'dummy_igza__', 'Dummy', 'Dummy__', '198109262004122002', '301820912', 'default.svg', 0, 0, 0, 0),
(2, 'Kartika Lismawati', 'Pr', 'Palembang', '1964-11-19', NULL, 'Jl. Lumbu Barat II B No. 82 Bl', NULL, NULL, NULL, 1, 2022, 'Kepala Subbidang Program dan Evaluasi Pendidikan dan Pelatihan Teknis dan Fungsional', 1, 'Test test 1 2 3', 'kartika@gmail.com', 'kartika123', NULL, NULL, '196411191987022003', '340011691', 'default.svg', 0, 0, 0, 0),
(3, 'Budi Cahyono', 'Lk', 'Bojonegoro', '1964-06-08', NULL, 'Kp. Jati Griya Jatimas Asri', NULL, NULL, NULL, 1, 2022, 'Kepala BPS Kabupaten/Kota', 1, 'Hi there', 'boecah@gmail.com', 'boecah123', 'Budi Cahyono', 'Budi Cahyono', '196406081987021002', '340011692', 'default.svg', 1, 1, 1, 0),
(4, 'Indra Susilo', 'Lk', 'Jakarta Pusat', '1964-06-07', '081318869089', 'Jl. Wibisana No. 6', NULL, NULL, 'Indonesia', 1, 2022, 'Kepala BPS Kabupaten/Kota', 1, 'Test123', 'indrass@yahoo.co.id', 'indrass98', NULL, NULL, '196406071987021001', '340011693', 'default.svg', 1, 1, 0, 0),
(5, 'Erisman', 'Lk', 'Jakarta Timur', '1964-11-02', '08129491174', 'JL.SMART HOUSE KAV.B56', NULL, NULL, NULL, 1, 2020, 'Kepala BPS Kabupaten/Kota', 0, 'Saya adalah Kepala BPS Kabupaten/Kota', 'erisman@gmail.com', 'erisman222', NULL, 'erisman123', '196411021987021001', '340011694', 'default.svg', 1, 1, 0, 0),
(6, 'Ono Margiono', 'LK', 'Jakarta Timur', '1966-05-13', '081214770887', 'Jl. Pangeran Kejaksan Gg. Muja', NULL, NULL, NULL, 1, 2024, 'Kepala BPS Kabupaten/Kota', 1, 'good', 'ono@bps.go.id', NULL, NULL, NULL, '196605131988021001', '340011828', 'default.svg', 0, 0, 0, 0),
(7, 'Sofan', 'LK', 'Kebumen', '1964-10-21', '0811383762', 'Jl Alamandar', NULL, NULL, NULL, 1, 2022, 'Kepala Bidang Statistik Produksi', 1, 'asyik', 'sofan@bps.go.id', NULL, NULL, NULL, '196410211988021001', '340011829', 'default.svg', 0, 0, 0, 0),
(8, 'Efliza', 'PR', 'Medan', '1965-04-28', '0816228960', 'Jl Masjid Nurul Falah No 14', NULL, NULL, NULL, 1, 2025, 'Kepala Direktorat Statistik Distribusi', 1, 'asyiap', 'efliza@bps.go.id', NULL, NULL, NULL, '196504281988022001', '340011855', 'default.svg', 0, 0, 0, 0),
(9, 'Noyo Purwoko', 'Lk', 'Lumajang', '1975-05-03', NULL, 'Dusun Simbatan', NULL, NULL, NULL, 1, 2033, 'Kepala Subbagian Tata Usaha', 1, NULL, 'noyo@bps.go.id', NULL, NULL, NULL, '197505031997121001', '340015501', 'default.svg', 0, 0, 0, 0),
(10, 'Nurjanah', 'Pr', 'Salatiga', '1974-12-04', NULL, 'Jl. Terusan P. Bawean I', NULL, NULL, NULL, 1, 2033, 'Kepala Subbagian Keuangan,', 1, NULL, 'nurjanah@bps.go.id', NULL, NULL, NULL, '197412041997122001', '340015494', 'default.svg', 0, 0, 0, 0),
(11, 'Nurlaeli', 'Pr', 'Tegal', '1975-09-23', NULL, 'Jl. KH Zaenal Arifin 3 No 11 R', NULL, NULL, NULL, 1, 2033, 'Statistisi Muda Seksi Statistik Distribusi', 1, NULL, 'nhaeng@bps.go.id', NULL, NULL, NULL, '197509231997122001', '340015500', 'default.svg', 0, 0, 0, 0),
(12, 'Nurhayati', 'Pr', 'Jakarta Timur', '1975-08-19', NULL, 'Kebun Nanas Pinang', NULL, NULL, NULL, 1, 2016, NULL, 1, NULL, 'noer@bps.go.id', NULL, NULL, NULL, '197508191997122001', '340015489', 'default.svg', 0, 0, 0, 0),
(17, 'Oldestia Vianny', 'Pr', 'Payakumbuh', '1979-06-11', '081274707292', 'Jl Rantau 3 No. 3 Rt 003 Rw 01', NULL, NULL, NULL, 1, 2037, 'Statistisi Muda Seksi Analisis Statistik Lintas Sektor', 1, 'PNS', 'oldestia@bps.go.id', NULL, NULL, NULL, '197906111999122001', '340015996', 'default.svg', 0, 0, 0, 0),
(18, 'Oemar Syarief Wibisono', 'Lk', 'Jakarta', '1994-09-29', '082278449084', 'Lorong Perdamaian Bedeng Akau', NULL, NULL, NULL, 1, 2052, 'Staf Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, 'gk tau', 'oemar.wibisono@bps.go.id', 'NULL', 'Omarhehe', 'Omar', '199409292017011001', '340057694', 'default.svg', 0, 0, 0, 0),
(19, 'Odry Syafwil', 'Lk', 'Jakarta', '1954-10-08', '081574594320', 'KOMPLEKS STATISTIK Jl. Statistik', NULL, NULL, NULL, 1, 2019, 'Lektor Kepala Tenaga Fungsional STIS', 0, 'Sudah pensiun', 'odrys@bps.go.id', NULL, NULL, NULL, '195410081979031004', '340006615', 'default.svg', 0, 0, 0, 0),
(20, 'Pradini Ajeng Gemellia', 'Pr', 'Bandung', '1989-10-13', '08567485818', 'Jl. Pelabuhan II Km 4,5 RT 2/8', NULL, NULL, NULL, 1, 2047, 'Staf Seksi Statistik Niaga dan Jasa', 1, 'hmm', 'pradinigemellia@bps.go.id', NULL, NULL, NULL, '198910132012112001', '340055881', 'default.svg', 0, 0, 0, 0),
(21, 'Lisiana Imana Yesani', 'PR', 'Jakarta Pusat', '1977-05-21', '085283507222', 'Jl. Kayu Manis VII No. 36', 'Jakarta Pusat', 'DKI Jakarta', 'Indonesia', 1, 2035, 'Kepala Seksi Statistik Sosial', 1, 'Asli jakarta hehe', 'lisiana@bps.go.id', NULL, NULL, NULL, '197705211999012001', '340015738', 'default.svg', 0, 0, 0, 0),
(22, 'Sana Damarhita', 'PR', 'Jakarta Selatan', '1977-05-14', '087722882289', 'Perumahan Bumi Cinderaya Jl. C', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', 1, 2035, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, 'Haha hihi penempatan', 'sana@bps.go.id', NULL, NULL, NULL, '197705141999011001', '340015739', 'default.svg', 0, 0, 0, 0),
(23, 'Krisdiana Galih', 'LK', 'Bandung', '1990-12-30', '081261932301', 'cluster hang lekir J9, batu IX', 'Bintan', 'Kepulauan Riau', 'Indonesia', 1, 2049, 'Kepala Subbagian Tata Usaha', 1, 'Sekarang rantau dulu bos', 'krisdiana.galih@bps.go.id', NULL, NULL, NULL, '199012302014101001', '340056726', 'default.svg', 0, 0, 0, 0),
(24, 'La Ode Ahmad Arafat', 'LK', 'Ambon', '1991-09-16', '085733198934', 'Jl. Raya Sambiroto, Dsn. Sambi', '', '', '', 1, 2049, 'Statistisi Pertama Seksi Diseminasi dan Layanan Statistik', 1, 'mantap ks teladan', 'ahmad.arafat@bps.go.id', NULL, NULL, NULL, '340056728', '199109162014101002', 'default.svg', 0, 0, 0, 0),
(25, 'Aan Sujanah', 'Pr', 'Jakarta Timur', '1962-10-02', '08116291011', 'Maskoki Raya No 2', NULL, NULL, 'Indonesia', 0, 2020, 'Kepala Subbagian Penyimpanan', 0, NULL, 'aan@bps.go.id', NULL, NULL, NULL, '196210021986012001', '340011224', 'default.svg', 0, 0, 0, 0),
(26, 'Risma Pijayantini', 'Pr', 'Palembang', '1963-06-09', '082183288585', 'Perumnas Permata Biru Blok B3', NULL, NULL, 'Indonesia', 1, 2021, 'Kepala Bagian Tata Usaha', 1, NULL, 'risma@bps.go.id', NULL, NULL, NULL, '196306091986012001', '340011225', 'default.svg', 0, 0, 0, 0),
(27, 'Ade Rika Agus', 'Pr', 'Bogor', '1963-10-14', NULL, 'JL Bojong Kaler I/4 Cigadung', NULL, NULL, 'Indonesia', 0, NULL, 'Staf Seksi Neraca Produksi', 0, NULL, 'aderika@bps.go.id', NULL, NULL, NULL, '196310141986012001', '340011226', 'default.svg', 0, 0, 0, 0),
(28, 'Haryoto Sutomo', 'Lk', 'Jakarta Selatan', '1962-07-02', NULL, 'Jl. Statistik II/32 Komplek St', NULL, NULL, 'Indonesia', 0, 2011, 'Staf Seksi Pengembangan Desain Sensus dan Survei Bidang Statistik Distribusi dan Jasa', 0, NULL, 'haryoto@bps.go.id', NULL, NULL, NULL, NULL, NULL, 'default.svg', 0, 0, 0, 0),
(39, 'I Ketut Mertayasa', 'Lk', 'Padangbae', '1968-07-26', '081271067114', 'JL. BYPASS, KOBA, BANGKA TENGA', 'Bangka Tengah', 'Bangka Belitung', 'Indonesia', 1, 2026, 'Kepala BPS Kabupaten/Kota', 1, NULL, 'ikmertayasa@bps.go.id', NULL, NULL, NULL, '196807261992111001', '340013357', 'default.svg', 0, 0, 0, 0),
(40, 'Ni Putu Beliana Puspita Sari', 'Pr', 'Tabanan', '1996-11-29', '082237404808', 'BTN Senapahan II No. 26, Br. D', NULL, NULL, NULL, 1, 2054, 'Staf Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'beliana.puspita@bps.go.id', NULL, NULL, NULL, '199611292019012002', '340058885', 'default.svg', 0, 0, 0, 0),
(41, 'Putu Yogi Wigunanca', 'Lk', 'Tabanan', '1994-11-15', '081558417994', 'banjar rangdu, desa pohsanten', NULL, NULL, NULL, 1, 2052, 'Penugasan Statistisi Pelaksana Lanjutan Seksi Statistik Produksi', 1, NULL, 'putu.yogi@bps.go.id', NULL, NULL, NULL, '199411152019011001', '340058915', 'default.svg', 0, 0, 0, 0),
(42, 'Ni Putu Ayu Mila Dewi', 'Pr', 'Karangasem', '1992-12-28', '081806595936', 'Jalan Anawai no. 27', NULL, NULL, NULL, 1, 2051, 'Statistisi Pertama Seksi Statistik Industri', 1, NULL, 'niputu.mila@bps.go.id', NULL, NULL, NULL, '199212282014122001', '340057159', 'default.svg', 0, 0, 0, 0),
(43, 'Ratna Rosmayanti', 'Pr', 'Cianjur', '1972-10-11', '085860789234', 'JL PIRUS II NO. 34 BLOK 7 PERU', NULL, NULL, NULL, 1, 2030, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, 'Tring tring', 'ratna_r@bps.go.id', NULL, NULL, NULL, '197210111992032001', '340013242', 'default.svg', 0, 0, 0, 0),
(44, 'Aris Muji Atmoko', 'Lk', 'Karawang', '1983-11-20', ' 6281381234899', 'Perum Pesona Handayani Indah', NULL, NULL, NULL, 1, 2041, 'Statistisi Muda Seksi Statistik Sosial', 1, 'Jalan dengan kaki', 'atmoko@bps.go.id', NULL, NULL, NULL, ' 198311202009021004', ' 340050003', 'default.svg', 0, 0, 0, 0),
(45, 'Efran Feri Kriswanto', 'Lk', 'Palembang', '1985-02-22', '085208314690', 'Jl R. Sukamto Lr. Masjid No.39', NULL, NULL, NULL, 1, 2043, 'Staf Seksi Neraca Wilayah dan Analisis Statistik', 1, NULL, 'efran@bps.go.id', NULL, NULL, NULL, '198502222009021005', '340050005', 'default.svg', 0, 0, 0, 0),
(46, 'Helmy Azhary', 'Lk', 'Ciamis', '1974-10-31', '082113390490', 'Jl. Kramat Pangeran syarif No.', NULL, NULL, NULL, 1, 2032, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, NULL, 'helmy.azhari@bps.go.id', NULL, NULL, NULL, '197410311996121001', '340015394', 'default.svg', 0, 0, 0, 0),
(47, 'Ganjar', 'Lk', 'Bandung', '1965-04-04', '081323516034', 'Perum Jatiputra Blok O2 No.3 D', NULL, NULL, NULL, 1, 2023, 'Kepala Seksi Statistik Distribusi', 1, NULL, 'ganjar@bps.go.id', NULL, NULL, NULL, '196504041984031001', '340010831', 'default.svg', 0, 0, 0, 0),
(48, 'Darusman', 'Lk', 'Jakarta Pusat', '1972-07-27', '08129487539', 'Kav. Sepang Susukan', NULL, NULL, NULL, 1, 2032, 'Kepala Biro Keuangan', 1, NULL, 'darusman@bps.go.id', NULL, NULL, NULL, '197207271994121001', '340015018', 'default.svg', 0, 0, 0, 0),
(49, 'Rizka Ita Yuanita', 'Pr', 'Malang', '1986-07-20', '081221713322', 'Jln. PHH Mustopa no 43', NULL, NULL, NULL, 1, 2044, 'Pranata Komputer Muda Seksi Jaringan dan Rujukan Statistik', 1, NULL, 'rizka.ita@bps.go.id', NULL, NULL, NULL, '198607202009022007', '340050228', 'default.svg', 0, 0, 0, 0),
(50, 'Tio Angga Agasi', 'Lk', 'Palembang', '1991-12-28', '08981009029', 'Perumahan Griya Sekayu Indah B', NULL, NULL, NULL, 1, 2050, 'Statistisi Pertama Seksi Statistik Produksi', 1, NULL, 'tioagasi@bps.go.id', NULL, NULL, NULL, '199112282014101001', '340056903', 'default.svg', 0, 0, 0, 0),
(69, 'Husin Maulana', 'LK', 'Jakarta Selatan', '0000-00-00', NULL, 'Griya Serang Asri Blok L4/13', NULL, NULL, NULL, 1, 2033, 'Kepala BPS Kabupaten/Kota', 1, 'asadadassas', 'hmaulana@bps.go.id', NULL, NULL, NULL, '197504231996121001', '340015382', 'default.svg', 0, 0, 0, 0),
(70, 'Toto E Sastrasuanda', 'LK', 'Cirebon', '0000-00-00', NULL, 'Dusun Belawa I Rt 03/01', NULL, NULL, NULL, 1, 2003, 'Kepala Deputi Bidang Statistik Sosial', 1, 'sasasaasa', 'tsastra@bps.go.id', NULL, NULL, NULL, NULL, '340003304', 'default.svg', 0, 0, 0, 0),
(71, 'Anik Triani', 'PR', 'Semarang', '0000-00-00', NULL, 'Griya Cempaka Arum Blok AA 11', NULL, NULL, NULL, 1, 2039, 'Statistisi Muda Seksi Statistik Pertambangan, Energi dan Konstruksi', 1, 'asadadadad', 'triani@bps.go.id', NULL, NULL, NULL, '198103102002122002', '340016472', 'default.svg', 0, 0, 0, 0),
(72, 'Maya Harsanti', 'PR', 'Jakarta', '0000-00-00', NULL, 'Perum Grand Duta Cluster Jade', NULL, NULL, NULL, 1, 2038, 'Staf Seksi Statistik Distribusi', 1, 'ADAAADADDAD', 'mayah@bps.go.id', NULL, NULL, NULL, '198011042002122001', '340016479', 'default.svg', 0, 0, 0, 0),
(73, 'Lestari Utaminingsih', 'PR', 'Kendal', '1977-10-13', '085641509482', 'Jl. Candi Kencana IV/C.66', NULL, NULL, 'Indonesia', 1, 2035, 'Staf Subbagian Kepegawaian & Hukum', 1, 'Taken', 'lestari.utaminingsih@bps.go.id', 'lestari10', 'lestari_utami', 'lestari_utami', '197710132000022001', '340016072', 'default.svg', 0, 0, 0, 0),
(74, 'Hengki Eko Riyadi', 'LK', 'Lubang Lor (Purworejo)', '1978-09-03', '085261660531', 'Grand Serpong Residence Blok A', NULL, NULL, 'Indonesia', 1, 2038, 'Statistisi Madya Pejabat Fungsional', 1, 'Laper nih', 'hengki@bps.go.id', 'iri_hengki', 'hengki_itudosa', 'hengki01', '197809032000121002', '340016113', 'default.svg', 0, 0, 0, 0),
(75, 'Eddy Prayitno', 'LK', 'Bandar Lampung', '1977-01-15', '07215605102', 'Jl. Purnawirawan Raya Belakang', NULL, NULL, 'Indonesia', 1, 2035, 'Kepala BPS Kabupaten/Kota', 1, 'Makan bang!!', 'eddyp@bps.go.id', NULL, NULL, NULL, '197701151999011001', '340015736', 'default.svg', 0, 0, 0, 0),
(76, 'Edison Manurung', 'LK', 'Tapanuli Utara', '1962-11-10', '021-7815560', 'Jl.Raya Lt.Agung Tg.BaratRt.00', NULL, NULL, 'Indonesia', 0, 2019, 'Staf Seksi Penyiapan Statistik Perdagangan Dalam Negeri', 0, 'Ngantuk bat', 'victor@bps.go.id', NULL, NULL, NULL, '196211101988021001', '340011827', 'default.svg', 0, 0, 0, 0),
(77, 'Bambang Susilo', 'Lk', 'Blora', '1957-04-03', NULL, 'H.Ahyar No.49 RT.006/05 13440', NULL, NULL, NULL, 1, 2013, 'Staf Seksi Pengolahan Statistik Pendidikan dan Kesejahteraan Sosial', 0, NULL, 'bsusilo@bps.go.id', NULL, NULL, NULL, '195704031977121001', '340005601', 'default.svg', 0, 0, 0, 0),
(78, 'Hotbel Purba', 'Lk', 'Pasir/Banjar Tongga', '1966-06-20', '081350343245', 'Jl. Pusat Pemerintahan', NULL, NULL, NULL, 1, 2024, 'Kepala BPS Kabupaten/Kota', 1, NULL, 'hotbelpurba@bps.go.id', NULL, NULL, NULL, '196606201986031001', '340011571', 'default.svg', 0, 0, 0, 0),
(79, 'Edison Situmorang', 'Lk', 'Simarsoituruk', '1966-11-26', '082347774666', 'A W syahrani 4 Rt 23 Sempaja', NULL, NULL, NULL, 1, 2024, 'Kepala Seksi Statistik Sosial', 1, NULL, 'edisons@bps.go.id', NULL, NULL, NULL, '196611261988021001', '340011786', 'default.svg', 0, 0, 0, 0),
(80, 'Chatarina Budi Anggarini', 'Pr', 'Bantul', '1969-04-29', '089610147898', 'Melikan Lor RT 04 Gandekan Ban', NULL, NULL, NULL, 1, 2027, 'Kepala Seksi Statistik Keuangan Dan Harga Produsen', 1, NULL, 'chatarina@bps.go.id', NULL, NULL, NULL, '196904291989022001', '340012122', 'default.svg', 0, 0, 0, 0),
(81, 'Muhammad Dedy', 'LK', 'Palembang', '1978-08-05', '081377900322', 'Jl. Sambu No. 33', NULL, NULL, 'Indonesia', 1, 2036, 'Kepala BPS Kabupaten/Kota', 1, NULL, 'mdedy@bps.go.id', NULL, NULL, NULL, '197808052000121001', '340016240', 'default.svg', 0, 0, 0, 0),
(82, 'Ayu Setiawaty', 'PR', 'Jakarta Barat', '1977-05-09', 'Jakarta Barat', 'PERUMAHAN DUKUH ZAMRUD BLOK N7', NULL, NULL, NULL, 1, 2035, 'Penugasan Statistisi Pertama Seksi Statistik Distribusi', 1, NULL, '', NULL, NULL, NULL, '197705092000122007', '340016241', 'default.svg', 0, 0, 0, 0),
(83, 'Shanti Kartika Astrilestari', 'PR', 'Surabaya', '1979-04-26', '082181923897', 'Perum Ragom Mufakat I Blok F-5', NULL, NULL, 'Indonesia', 1, 2037, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, NULL, 'shanti_ka@bps.go.id', NULL, NULL, NULL, '197904262000122001', '340016242', 'default.svg', 0, 0, 0, 0),
(84, 'Bambang Pamungkas', 'LK', 'Semarang', '1979-09-17', '081355103999', 'Jl Kredit Blok B 5 No 13', NULL, NULL, 'Indonesia', 1, 2037, 'Kepala BPS Kabupaten/Kota', 1, NULL, '', NULL, NULL, NULL, '197909172000121003', '340016243', 'default.svg', 0, 0, 0, 0),
(85, 'Johanes Supranto', 'Lk', 'Semarang', '1939-05-22', NULL, 'Jl. Kejaksaan Raya No. 23 Kreo C', NULL, 'DKI Jakarta', 'Indonesia', 0, 2004, 'Kepala K.S Tk. I (Tipe A)', 0, 'Jangan Menyerah', '', NULL, NULL, NULL, NULL, '340000423', 'default.svg', 1, 0, 0, 0),
(86, 'Gita Devi Asyarita', 'Pr', 'Bekasi', '1994-08-05', '6281319546221', 'Desa Daruba', NULL, NULL, NULL, 1, 2052, 'Statistisi Pertama Seksi Statistik Distribusi', 1, 'Bersakit-sakit dahulu, bersenang-senangnya gak tau kapan', 'gita.asyarita@bps.go.id', 'gitaasy_', NULL, NULL, '199408052017012001', '340058000', 'default.svg', 1, 0, 0, 0),
(87, 'Galang Retno Winarko', 'Lk', 'Blitar', '1990-10-22', '6282299649735', 'RT 4 RW 3, Desa Panggungrejo, Kecamatan Panggungrejo', 'Blitar', 'Jawa Timur', 'Indonesia', 1, 2048, 'Staf Seksi Integrasi Pengolahan Data', 1, 'WOW Amazing', 'galang.winarko@bps.go.id', 'galang_winarko', NULL, NULL, '199010222017011001', '340057999', 'default.svg', 1, 0, 0, 0),
(88, 'Timbang Sirait', 'Lk', 'Labuhan Batu', '1973-12-27', '628179719667', 'Puri Bintara Regency Blok K-19', 'Jakarta Timur', 'DKI Jakarta', 'Indonesia', 1, 2039, 'Lektor Tenaga Fungsional STIS', 1, 'Statmat jaya', 'timbang@bps.go.id', NULL, NULL, NULL, '197312272000031002', '340016106', 'default.svg', 1, 0, 0, 0),
(89, 'Aris Budiyanto', 'Lk', 'Tegal', '0000-00-00', '081363000430', 'Perumahan Mega Endah, RW 04 Ke', NULL, NULL, 'Indonesia', 1, 2032, ' Kepala BPS Kabupaten/Kota ', 1, NULL, ' arisb@bps.go.id ', NULL, NULL, NULL, '197403071995121001', '340015129', 'default.svg', 0, 0, 0, 0),
(90, 'Budiyanto', 'Lk', 'Kebumen', '0000-00-00', '08121898666', 'Perum Permata Depok sekt Mutia', NULL, NULL, 'Indonesia', 1, 2029, 'Widyaiswara Madya Pejabat Fungsional', 1, NULL, ' budiyant@bps.go.id', NULL, NULL, NULL, '196908311993121001', '340013756', 'default.svg', 0, 0, 0, 0),
(91, 'Sri Mulyono', 'Lk', 'Banjarmasin', '0000-00-00', '08121318016', 'Jl Rawa Sawah II No.19', NULL, NULL, 'Indonesia', 1, 2028, 'Kepala Seksi Pengembangan Kerangka Sampel Survei Bidang Statistik Distribusi dan Jasa', 1, NULL, 'boim@bps.go.id', NULL, NULL, NULL, '197005261993121001', '340013755', 'default.svg', 0, 0, 0, 0),
(92, 'Yuniarto', 'Lk', 'Banjarnegara', '0000-00-00', '081230994395', 'Jl. Titiran 1. No. 103', NULL, NULL, 'Indonesia', 1, 2031, ' Kepala BPS Kabupaten/Kota', 1, NULL, ' yuniarto@bps.go.id', NULL, NULL, NULL, '197306071995121001', '340015128', 'default.svg', 0, 0, 0, 0),
(93, 'Khaerul Anwar', 'LK', 'Demak', '1970-03-29', '081228439121', 'Perum Griya Utama Permai Blok', NULL, NULL, 'Indonesia', 1, 2028, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'kh_anwar@bps.go.id', NULL, NULL, NULL, '197003291991021001', '340012773', 'default.svg', 0, 0, 0, 0),
(94, 'Achmad Rifai', 'LK', 'Jakarta Utara', '1974-12-05', '082221518394', 'Jl. Kranji No. 493', NULL, NULL, 'Indonesia', 1, 2033, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'arifai@bps.go.id', NULL, NULL, NULL, '197412052000031001', '340016107', 'default.svg', 0, 0, 0, 0),
(95, 'Apriliya Puput Nadea', 'PR', 'Klaten', '1989-04-06', '085647331647', 'Gg Spoor Dalam IV no 12', NULL, NULL, 'Indonesia', 1, 2047, 'Staf Seksi Jasa Perpustakaan', 1, NULL, 'nadea@bps.go.id', NULL, NULL, NULL, '198904062012112001', '340055736', 'default.svg', 0, 0, 0, 0),
(96, 'Arini Ismiati', 'PR', 'Malang', '1979-12-20', '081215927271', 'Jl. Batok GG III no.5', NULL, NULL, 'Indonesia', 1, 2038, 'Statistisi Muda Seksi Statistik Produksi', 1, NULL, 'arini.ismi@bps.go.id', NULL, NULL, NULL, '197912202003122006', '340017013', 'default.svg', 0, 0, 0, 0),
(127, 'Tiodora Hadumaon Siagian', 'Pr', 'Jakarta', '1970-01-12', '02187986260', 'Jl. Pradana Xl No 4 Komplek Vi', NULL, NULL, NULL, 1, 2030, 'Lektor Pejabat Fungsional STIS', 1, 'Dosen di STIS', 'theo@bps.go.id', 'TiodoraHS', NULL, NULL, '197001121991122001', '340013015', 'default.svg', 0, 0, 0, 0),
(128, 'Tarida Herdina Marpaung', 'Pr', 'Jakarta', '1970-07-07', '081386704932', 'Perumahan Taman Anyelir Blok C', NULL, NULL, NULL, 1, 2030, 'Kepala Seksi Pengolahan Statistik Hortikultura', 1, 'Pecinta tumbuh-tumbuhan', 'tarida@bps.go.id', 'Trida_10', 'Tarida', 'Tarida', '197007071991032004', '340012937', 'default.svg', 0, 0, 0, 0),
(129, 'Teguh Pramono', 'Lk', 'Banyumas', '1959-11-28', '0218618762', 'Jl Elang Malindo III A2/10 RT', NULL, NULL, NULL, 1, 2019, 'Kepala BPS Provinsi', 0, 'Sudah pensiun', 'tpramono@bps.go.id', NULL, NULL, NULL, '195911281983021002', '340010073', 'default.svg', 0, 0, 0, 0),
(130, 'Teta Puti Sugesti', 'Pr', 'Bandar Lampung', '1992-11-10', '082368737968', 'Jl Agrowisata 1 No. 7', 'Teta_puti', NULL, NULL, 1, 2052, 'Staf Seksi Statistik Keuangan Dan Harga Produsen', 1, 'Masih muda', 'teta.puti@bps.go.id', NULL, NULL, NULL, '199211102016022001', '340057614', 'default.svg', 0, 0, 0, 0),
(229, 'Muksalmina Jamil', 'LK', 'Bireuen', '1993-02-10', '081372702866', 'Kampung Jawa, Tomohon Selatan', NULL, NULL, NULL, 1, 2051, 'Staf Seksi Statistik Distribusi', 1, 'PNS', 'muksalmina.jamil@bps.go.id', NULL, NULL, NULL, '199302102016021001', '340057505', 'default.svg', 0, 0, 0, 0),
(230, 'Amanda Pratama Putra', 'LK', 'Sumbawa', '1993-12-01', '087863969334', 'Jalan Ayub no. 17 RT 15 RW 08', NULL, NULL, NULL, 1, 2052, 'Statistisi Pertama Seksi Pengembangan Desain Sensus dan Survei Bidang Statistik Produksi', 1, 'PNS', 'amanda.putra@bps.go.id', NULL, NULL, NULL, '199312012017011001', '340057661', 'default.svg', 0, 0, 0, 0),
(231, 'Agus Purwoto', 'Lk', 'Kediri', '1960-08-22', '087883165656', 'Jl. Lumbu Barat II B No. 82 Bl', NULL, NULL, NULL, 1, 2025, 'Lektor Kepala Wakil Direktur', 1, 'PNS', 'purwoto@bps.go.id', NULL, NULL, NULL, '196008221985011001', '340010894', 'default.svg', 0, 0, 0, 0),
(232, 'Saadah', 'PR', 'Purwakarta', '1970-02-13', '082114484016', 'Perumahan Graha Setia Blok A N', NULL, NULL, NULL, 1, 2028, 'Staf Subbagian Tata Usaha Umum', 1, 'PNS', 'saadah@bps.go.id', NULL, NULL, NULL, '197002131992112001', '340013345', 'default.svg', 0, 0, 0, 0),
(331, 'Darianto', 'LK', 'Padang Panjang', '1967-12-11', '6281378523666', 'Jl TANJUNG HARAPAN GG. TANJUNG', NULL, NULL, 'Indonesia', 1, 2025, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, NULL, 'darianto@bps.go.id', NULL, NULL, NULL, '196711121989021001', '340012069', 'default.svg', 0, 0, 0, 0),
(332, 'Dea Venditama', 'LK', 'Bantul', '1991-06-02', '6282292146507', 'Otista', 'Pusat', 'DKI Jakarta', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Pemantauan dan Evaluasi Publikasi', 1, NULL, 'deav@bps.go.id', NULL, NULL, NULL, '199106022014101001', '340056757', 'default.svg', 0, 0, 0, 0),
(333, 'Delly Rakasiwi', 'LK', 'Jakarta', '1991-03-05', NULL, 'Ki Hajar DewantaraRT 01 RW 06', 'Palangkaraya', 'Kalimantan Tengah', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Jaringan dan Rujukan Statistik', 1, NULL, 'drakasiwi@bps.go.id', NULL, NULL, NULL, '199103052014101002', '340056758', 'default.svg', 0, 0, 0, 0),
(334, 'Dhoni Eko Wahyu Nugroho', 'LK', 'Kediri', '1991-07-28', NULL, 'Jl. Kebon Nanas Utara No 10 Ja', 'Pusat', 'DKI Jakarta', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Pengemasan Informasi Statistik', 1, NULL, 'dhonieko@bps.go.id', NULL, NULL, NULL, '199107282014101001', '340056759', 'default.svg', 0, 0, 0, 0),
(433, 'Poltak Sutrisno Siahaan', 'Lk', 'Tebing Tinggi', '1952-08-06', NULL, 'Jl. Asrama Komplek Bumi AsriBl', NULL, NULL, NULL, 1, 2012, 'Staf MPP', 0, NULL, 'poltak@bps.go.id', NULL, NULL, NULL, '195208061975031001', '340004375', 'default.svg', 0, 0, 0, 0),
(434, 'Weni Lidya Sukma', 'Pr', 'Padang Pariaman', '1989-09-12', '085263662023', 'jl. mandor dami 2 perumahan fe', NULL, NULL, NULL, 1, 2047, 'Penugasan Statistisi Pelaksana Lanjutan Seksi Pengolahan Statistik Ketenagakerjaan', 1, NULL, 'wenilidya@bps.go.id', NULL, NULL, NULL, '198909122012112001', '340055951', 'default.svg', 0, 0, 0, 0),
(435, 'Tri Hayuni Syardi', 'Pr', 'Padang', '1990-10-30', '081281060452', 'Komplek Mawar Putih Blok L No.', NULL, NULL, NULL, 1, 2048, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, NULL, 'trihayuni@bps.go.id', NULL, NULL, NULL, '199010302012112001', '340055938', 'default.svg', 0, 0, 0, 0),
(436, 'Subuh Sukmono Putro', 'Lk', 'Sragen', '1975-03-15', '081329278642', 'Graha Surya No IC', NULL, NULL, NULL, 1, 2033, 'Kepala Seksi Statistik Sosial', 1, NULL, 'subuhsukmono@bps.go.id', NULL, NULL, NULL, '197503151996121001', '340015332', 'default.svg', 0, 0, 0, 0),
(555, 'Sigit Purnomo', 'LK', 'Kulon Progo', '1965-02-17', '081288378366', 'Puri Citayam Permai Blok B-10', NULL, NULL, NULL, 1, 2023, 'Kepala Bagian Penyusunan Rencana', 1, 'mantap', 'sigit@bps.go.id', NULL, NULL, NULL, '196502171988021001', '340011821', 'default.svg', 0, 0, 0, 0);

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
(9, 9),
(10, 10),
(11, 11),
(12, 12),
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
(46, 210),
(47, 50),
(48, 2),
(49, 27),
(50, 51),
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
(89, 890),
(90, 2),
(91, 2),
(92, 920),
(93, 930),
(94, 940),
(95, 950),
(96, 960),
(127, 2),
(128, 2),
(129, 299),
(130, 830),
(229, 290),
(230, 2),
(231, 2),
(232, 2),
(331, 31),
(332, 2),
(333, 2),
(334, 32),
(433, 33),
(434, 2),
(435, 35),
(436, 36),
(555, 961);

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
(1, '::1', 'dummy@stis.ac.id', 1, '2021-04-27 10:28:13', 1);

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
(271, 'D-III', 'Akademi Ilmu Statistik', 1991, 1988, 30, 127),
(272, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1996, 38, 127),
(281, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2004, 2000, 42, 128),
(291, 'D-III', 'Akademi Ilmu Statistik', 1982, 1979, 21, 129),
(292, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2015, 2011, 53, 229),
(301, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2015, 2011, 53, 130),
(302, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 1999, 40, 331),
(303, 'D-III', 'Akademi Ilmu Statistik', 1995, 1992, 34, 331),
(304, 'D-III', 'Akademi Ilmu Statistik', 1995, 1992, 34, 47),
(305, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, NULL, 39, 47),
(306, 'D-III', 'Akademi Ilmu Statistik', 1994, 1991, 33, 48),
(307, 'S-1', 'Universitas Terbuka', 1998, 1996, 0, 48),
(308, 'S-2', 'Universitas Suropati', 2004, 2002, 0, 48),
(309, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 49),
(310, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2013, 2009, 51, 50),
(312, 'D-III', 'Akademi Ilmu Statistik', 1984, 1981, 23, 231),
(322, 'D-III', 'Akademi Ilmu Statistik', 1992, 1989, 31, 232),
(323, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 1998, 40, 232),
(391, 'D-III', 'Akademi Ilmu Statistik', 1992, 1989, 31, 39),
(401, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2018, 2014, 56, 40),
(411, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2018, 2014, 56, 41),
(421, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2014, 2010, 52, 42),
(431, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 43),
(441, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 44),
(451, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 45),
(461, 'D-III', 'Akademi Ilmu Statistik', 1996, 1993, 35, 46),
(462, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1997, 38, 46),
(463, 'S-1', 'Universitas Terbuka', 2001, NULL, 0, 46),
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
(901, 'D-III', 'Akademi Ilmu Statistik', 1997, 1994, 36, 9),
(902, 'S-1', 'Universitas Terbuka', 2001, NULL, 0, 9),
(903, 'S-2', 'Universitas Wijaya Putra', 2010, NULL, 0, 9),
(931, 'D-III', 'Akademi Ilmu Statistik', 1997, 1994, 36, 93),
(932, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1997, 38, 93),
(941, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1998, 38, 94),
(951, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2011, 2007, 49, 95),
(961, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2003, 1999, 41, 96),
(1001, 'D-III', 'Akademi Ilmu Statistik', 1997, 1994, 36, 10),
(1002, 'S-1', 'Universitas Terbuka', 1999, NULL, 0, 10),
(1003, 'S-2', 'Universitas Diponegoro', 2007, NULL, 0, 10),
(1101, 'D-III', 'Akademi Ilmu Statistik', 1997, 1994, 36, 11),
(1102, 'S-1', 'Universitas Terbuka', 2003, NULL, 0, 11),
(1201, 'D-III', 'Akademi Ilmu Statistik', 1997, 1994, 36, 12),
(1202, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 1999, 40, 12),
(1203, 'S-2', 'Universitas Indonesia', 2010, NULL, 0, 12),
(2302, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2016, 2012, 54, 230),
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
(8910, 'D-III', 'Akademi Ilmu Statistik', 1995, 1992, 34, 89),
(8911, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1996, 39, 89),
(8912, 'S-2', 'Universitas Sriwijaya', 2008, 2006, 0, 89),
(9010, 'D-III', 'Akademi Ilmu Statistik', 1993, 1990, 32, 90),
(9011, 'S-1', 'Universitas Terbuka', 2002, 2000, 0, 90),
(9012, 'S-2', 'Universitas Indonesia', 2009, 2007, 0, 90),
(9110, 'D-III', 'Akademi Ilmu Statistik', 1993, 1990, 32, 91),
(9111, 'S-1', 'Universitas Terbuka', 1998, 1996, 0, 91),
(9210, 'D-III', 'Akademi Ilmu Statistik', 1995, 1992, 34, 92),
(9211, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1996, 39, 92),
(9212, 'S-2', 'Institut Teknologi 10 Nopember', 2009, 2007, 0, 92);

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
(461, 'DIII-AIS', '2345 ', NULL),
(462, 'D-IV Statistik Ekonomi', 'SE.98.0027 ', NULL),
(463, 'S-1 Statistik', NULL, NULL),
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
(901, 'Ak. Ilmu Statistik', '2539', NULL),
(902, 'Statistik', NULL, NULL),
(903, 'Manajemen', NULL, NULL),
(931, 'Ak. Ilmu Statistik', '2515', NULL),
(932, 'D-IV Statistik Sosial Kependudukan', 'SK.99.0055 ', NULL),
(941, 'D-IV Komputasi Statistik', 'KS.98.0019 ', NULL),
(951, 'D-IV Komputasi Statistik', 'KS.07.5297', NULL),
(961, 'D-IV Statistik Ekonomi', 'SE.02.0365', NULL),
(1001, 'Ak. Ilmu Statistik', '2541', NULL),
(1002, 'Statistik', NULL, NULL),
(1003, 'Teknik Pembangunan Wilayah dan Kota', NULL, NULL),
(1101, 'Ak. Ilmu Statistik', '2542', NULL),
(1102, 'Statistik', NULL, NULL),
(1201, 'Ak. Ilmu Statistik', '2540', NULL),
(1202, 'D-IV Statistik Sosial Kependudukan', 'SK.01.0290', NULL),
(1203, 'Kajian Statistik Sosial Kependudukan', NULL, NULL),
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
(8910, 'D-III AIS', '2199', NULL),
(8911, 'D-IV Komputasi Statistik', 'KS.98.0022', NULL),
(8912, 'S-2 Ekonomi', NULL, NULL),
(9010, 'D-III AIS', '1926', NULL),
(9011, 'S-1 Statistik', NULL, NULL),
(9012, 'S-2 Ekonomi', NULL, NULL),
(9110, 'D-III AIS', '1992', NULL),
(9111, 'S-1 Statistika', NULL, NULL),
(9210, 'D-III AIS', '2235', NULL),
(9211, 'D-IV Statistik Sosial Kependudukan', 'SK.98.0041', NULL),
(9212, 'S-2 Statistik', NULL, NULL);

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
(292, 'Juara 1 Lomba Riset Sawit Tingkat Mahasiswa', 2014, 229),
(302, 'Juara 1 Hello World Tingkat Mahasiswa', 2015, 230),
(312, 'Juara 1 Statistika Ria', 1983, 231),
(322, 'Juara 1 Statistika Ria', 1991, 232),
(392, 'Juara 3 Olimpiade Statistika ', 1997, 39),
(402, 'Juara I Olimpiade Matematika Tk Provinsi', 2010, 40),
(412, 'Juara 2 Debat Bahasa Inggris', 2012, 41),
(422, 'Harapan I lomba Statistik nasional Statistika Ria IPB', 2012, 42),
(550, 'Juara 3 Lomba Lompat Tali', 1996, 47),
(551, 'Juara 5 Olimpiade Nasional Statistika', 1995, 48),
(552, 'Juara 2 Lomba Balap Karung', 2007, 49),
(553, 'Juara 1 Lomba Menangkap Lele', 2011, 50),
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
(2701, 'Juara 1 Olimpiade Matematika', 1986, 127),
(2801, 'Juara 3 Debat Bahasa Inggris', 1989, 128),
(2901, 'Juara 2 Pidato Bahasa Inggris', 1975, 129),
(3001, 'Juara 2 Lomba Menyanyi', 2007, 130),
(4301, 'Juara 1 Jambore Statistika ', 2007, 43),
(4401, 'Juara 3 Olimpiade Statistika', 2006, 44),
(4501, 'Juara 2 Kompetisi Essay Statistika Statistics Festival UGM', 2007, 45),
(4601, 'Juara 1 Olimpiade Nasional Statistika', 2000, 46),
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
(9601, 'Juara 3 Olimpiade Statistika', 2003, 96);

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
('AIUEO1', 89),
('AIUEO2', 90),
('AIUEO3', 91),
('AIUEO4', 92),
('Algoritma Pemrograman Metode Numerik Kalkulus ', 24),
('Analisa Komoditi Ekspor Sektor Industri, Pertanian, dan Pertambangan', 25),
('Analisa Struktur Kalimat Bahasa Indonesia dengan Menggunakan Pengurai Kalimat Berbasis Linguistik', 42),
('Analisis Bivariate 1991', 232),
('Analisis Custering Time Series pada Data Import tiap Provinsi', 22),
('Analisis Data Geospasial Media Sosial untuk Melihat Pola Pariwisata di Indonesia', 39),
('Analisis Deskriptif Pola Konsumsi Penduduk DKI Jakarta', 128),
('Analisis Efisiensi Penggunaan Modal Kerja Untuk Kegiatan Usaha Pada Perusahaan Konveksi Perusahaan', 41),
('Analisis Empiris Perilaku Konsumsi Pangan Masyarakat di Kota Sukabumi', 43),
('Analisis Faktor-faktor yang Memengaruhi Mahasiswa STIS dalam Memilih Penempatan', 95),
('Analisis Harga Bitcoin Menggunakan Metode SARIMA', 86),
('Analisis Kepuasan Mahasiswa STIS terhadap Kualitas Pelayanan Klinik Kampus STIS', 94),
('Analisis Klaster Menggunakan Partition-based Clustering pada Data Kemiskinan Provinsi Jawa Barat Tahun 2013', 87),
('Analisis Manajemen Pelayanan Masyarakat', 48),
('Analisis Mobilitas Tenaga Kerja Hasil Sakernas', 28),
('Analisis Model Ekonomi XXX', 50),
('Analisis Multivariate 1983', 231),
('Analisis Pengaruh Bermain Game terhadap Prestasi', 72),
('Analisis Pertumbuhan Ekonomi di Kabupaten X', 130),
('Analisis Perubahan Pola Makan Penduduk dengan Perekonomian Tingkat Menengah dengan Tingkat Atas', 2),
('Analisis Semantik terhadap pernyataan \"Tetap semangat ya, kegagalanmu hari ini adalah awal dari kegagalan selanjutnya\"', 85),
('Analisis Sistem Keamanan Jaringan Hot-Spot', 40),
('Analisis Time Series Pendekatan Error Correction Mechanism pada Ekspor  Kopi Indonesia ke Jepang Periode 2005-2010', 44),
('Aplikasi Simulasi Monte Carlo dalam Estimasi Jumlah Pasien Malaria di Indonesia', 47),
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
('Hello World 2015', 230),
('Implementasi Analisis Faktor Pada Pengambilan Keputusan Mahasiswa dalam Memilih Program Studi di STIS', 433),
('Ini Publikasi', 77),
('Itu Publikasi', 78),
('Kreatifitas tanpa batas dan melampauinya', 21),
('Model Regresi Dummy Indeks Prestasi Kumulatif Mahasiswa Prodi D-IV Statistik Ekonomi di STIS', 435),
('Penerapan Monte Carlo Marcov Chain pada Cinta', 23),
('Pengaruh Demografi Penduduk terhadap Jenis Pekerjaan', 127),
('Pengaruh Gaya Hidup terhadap Kecerdasan Mental', 129),
('Pengaruh Jam Tidur terhadap Kerajinan', 71),
('Pengaruh lama tidur terhadap prestasi', 70),
('pengaruh rokok terhadap kesehatan paru-paru', 5),
('pengaruh sarapan pagi terhadap kesehatan otak', 7),
('Pengaruh Stress terhadap Prestasi', 69),
('pengaruh tidur siang terhadap efektivitas belajar ', 6),
('Pengelompokan Kecamatan di DKI Jakarta Berdasarkan Karakteristik Kesejahteraan Rakyat Menggunakan Metode K-Means Cluster', 96),
('Pengembangan Sistem Informasi Jurusan Berbasis Web', 49),
('Pengendalian Kualitas Produk Menggunakan Peta Kendali T^2 Hotelling', 436),
('Potret Pendidikan Indonesia', 26),
('Prediksi Jumlah Pendaftar STIS dengan Menggunakan Metode ARIMA', 93),
('Produksi Padi dan Palawija dan Angka Ramalan', 27),
('Reliabilitas sistem CAWI BPS dengan Pendekatan Nonparametrik', 46),
('Riset Sawit Kalimantan 2014', 229),
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
(1, 'dummy@stis.ac.id', 'Dummy', 1, 'Dummy_dummy', 'default.svg', '$2y$10$yLFu3bK0s5cHqd1VLT6Eh.GjA3H2GJzwqb6o/gjrhKXTWGkMsh3IS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-27 22:27:45', '2021-04-27 22:27:45', NULL);

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
  MODIFY `id_alumni` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_pendidikan` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9213;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9602;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
