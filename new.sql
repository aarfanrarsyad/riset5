-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 10:33 AM
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
-- Database: `riset5`
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
  `fb` varchar(255) DEFAULT NULL,
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
(1, 'Dummy_dummy', 'Lk', 'Sungai Penuh', '1997-01-25', '081299594151', 'Jr. Abdul Rahmat No. 755, Tangerang 47637, SulUt', 'Kabupaten Tuban', 'Jawa Timur', 'Indonesia', 0, 1978, 'amet', 0, 'Maiores ut quasi beatae vel quisquam. Quo aut iusto et nobis et blanditiis non. Animi in architecto et iusto occaecati mollitia vel.', '', 'dummy_igza__', '', 'Dummy__', '', '', '198109262004122002', '301820912', 'Lk/default.svg', 0, 0, 0, 0),
(2, 'Kartika Lismawati', 'Pr', 'Palembang', '1964-11-19', '', 'Jl. Lumbu Barat II B No. 82 Bl', '', '', '', 1, 2022, 'Kepala Subbidang Program dan Evaluasi Pendidikan dan Pelatihan Teknis dan Fungsional', 1, 'Test test 1 2 3', '', 'kartika123', '', '', '', '', '196411191987022003', '340011691', 'Pr/default.svg', 0, 0, 0, 0),
(3, 'Budi Cahyono', 'Lk', 'Bojonegoro', '1964-06-08', '', 'Kp. Jati Griya Jatimas Asri', '', '', '', 1, 2022, 'Kepala BPS Kabupaten/Kota', 1, 'Hi there', '', 'boecah123', '', 'Budi Cahyono', '', '', '196406081987021002', '340011692', 'Lk/default.svg', 1, 1, 1, 0),
(4, 'Indra Susilo', 'Lk', 'Jakarta Pusat', '1964-06-07', '081318869089', 'Jl. Wibisana No. 6', '', '', 'Indonesia', 1, 2022, 'Kepala BPS Kabupaten/Kota', 1, 'Test123', '', 'indrass98', '', '', '', '', '196406071987021001', '340011693', 'Lk/default.svg', 1, 1, 0, 0),
(5, 'Erisman', 'Lk', 'Jakarta Timur', '1964-11-02', '08129491174', 'JL.SMART HOUSE KAV.B56', '', '', '', 1, 2020, 'Kepala BPS Kabupaten/Kota', 0, 'Saya adalah Kepala BPS Kabupaten/Kota', '', 'erisman222', '', 'erisman123', '', '', '196411021987021001', '340011694', 'Lk/default.svg', 1, 1, 0, 0),
(6, 'Ono Margiono', 'LK', 'Jakarta Timur', '1966-05-13', '081214770887', 'Jl. Pangeran Kejaksan Gg. Muja', '', '', '', 1, 2024, 'Kepala BPS Kabupaten/Kota', 1, 'good', '', '', '', '', '', '', '196605131988021001', '340011828', 'LK/default.svg', 0, 0, 0, 0),
(7, 'Sofan', 'LK', 'Kebumen', '1964-10-21', '0811383762', 'Jl Alamandar', '', '', '', 1, 2022, 'Kepala Bidang Statistik Produksi', 1, 'asyik', '', '', '', '', '', '', '196410211988021001', '340011829', 'LK/default.svg', 0, 0, 0, 0),
(8, 'Efliza', 'PR', 'Medan', '1965-04-28', '0816228960', 'Jl Masjid Nurul Falah No 14', '', '', '', 1, 2025, 'Kepala Direktorat Statistik Distribusi', 1, 'asyiap', '', '', '', '', '', '', '196504281988022001', '340011855', 'PR/default.svg', 0, 0, 0, 0),
(9, 'Oldestia Vianny', 'Pr', 'Payakumbuh', '1979-06-11', '081274707292', 'Jl Rantau 3 No. 3 Rt 003 Rw 01', '', '', '', 1, 2037, 'Statistisi Muda Seksi Analisis Statistik Lintas Sektor', 1, 'PNS', '', '', '', '', '', '', '197906111999122001', '340015996', 'Pr/default.svg', 0, 0, 0, 0),
(10, 'Oemar Syarief Wibisono', 'Lk', 'Jakarta', '1994-09-29', '082278449084', 'Lorong Perdamaian Bedeng Akau', '', '', '', 1, 2052, 'Staf Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, 'gk tau', '', 'NULL', '', 'Omar', '', '', '199409292017011001', '340057694', 'Lk/default.svg', 0, 0, 0, 0),
(11, 'Odry Syafwil', 'Lk', 'Jakarta', '1954-10-08', '081574594320', 'KOMPLEKS STATISTIK Jl. Statistik', '', '', '', 1, 2019, 'Lektor Kepala Tenaga Fungsional STIS', 0, 'Sudah pensiun', '', '', '', '', '', '', '195410081979031004', '340006615', 'Lk/default.svg', 0, 0, 0, 0),
(12, 'Pradini Ajeng Gemellia', 'Pr', 'Bandung', '1989-10-13', '08567485818', 'Jl. Pelabuhan II Km 4,5 RT 2/8', '', '', '', 1, 2047, 'Staf Seksi Statistik Niaga dan Jasa', 1, 'hmm', '', '', '', '', '', '', '198910132012112001', '340055881', 'Pr/default.svg', 0, 0, 0, 0),
(13, 'Lisiana Imana Yesani', 'PR', 'Jakarta Pusat', '1977-05-21', '085283507222', 'Jl. Kayu Manis VII No. 36', 'Jakarta Pusat', 'DKI Jakarta', 'Indonesia', 1, 2035, 'Kepala Seksi Statistik Sosial', 1, 'Asli jakarta hehe', '', '', '', '', '', '', '197705211999012001', '340015738', 'PR/default.svg', 0, 0, 0, 0),
(14, 'Sana Damarhita', 'PR', 'Jakarta Selatan', '1977-05-14', '087722882289', 'Perumahan Bumi Cinderaya Jl. C', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', 1, 2035, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, 'Haha hihi penempatan', '', '', '', '', '', '', '197705141999011001', '340015739', 'PR/default.svg', 0, 0, 0, 0),
(15, 'Krisdiana Galih', 'LK', 'Bandung', '1990-12-30', '081261932301', 'cluster hang lekir J9, batu IX', 'Bintan', 'Kepulauan Riau', 'Indonesia', 1, 2049, 'Kepala Subbagian Tata Usaha', 1, 'Sekarang rantau dulu bos', '', '', '', '', '', '', '199012302014101001', '340056726', 'LK/default.svg', 0, 0, 0, 0),
(16, 'La Ode Ahmad Arafat', 'LK', 'Ambon', '1991-09-16', '085733198934', 'Jl. Raya Sambiroto, Dsn. Sambi', '', '', '', 1, 2049, 'Statistisi Pertama Seksi Diseminasi dan Layanan Statistik', 1, 'mantap ks teladan', '', '', '', '', '', '', '340056728', '199109162014101002', 'LK/default.svg', 0, 0, 0, 0),
(17, 'Aan Sujanah', 'Pr', 'Jakarta Timur', '1962-10-02', '08116291011', 'Maskoki Raya No 2', '', '', 'Indonesia', 0, 2020, 'Kepala Subbagian Penyimpanan', 0, '', '', '', '', '', '', '', '196210021986012001', '340011224', 'Pr/default.svg', 0, 0, 0, 0),
(18, 'Risma Pijayantini', 'Pr', 'Palembang', '1963-06-09', '082183288585', 'Perumnas Permata Biru Blok B3', '', '', 'Indonesia', 1, 2021, 'Kepala Bagian Tata Usaha', 1, '', '', '', '', '', '', '', '196306091986012001', '340011225', 'Pr/default.svg', 0, 0, 0, 0),
(19, 'Ade Rika Agus', 'Pr', 'Bogor', '1963-10-14', '', 'JL Bojong Kaler I/4 Cigadung', '', '', 'Indonesia', 0, 0000, 'Staf Seksi Neraca Produksi', 0, '', '', '', '', '', '', '', '196310141986012001', '340011226', 'Pr/default.svg', 0, 0, 0, 0),
(20, 'Haryoto Sutomo', 'Lk', 'Jakarta Selatan', '1962-07-02', '', 'Jl. Statistik II/32 Komplek St', '', '', 'Indonesia', 0, 2011, 'Staf Seksi Pengembangan Desain Sensus dan Survei Bidang Statistik Distribusi dan Jasa', 0, '', '', '', '', '', '', '', '', '', 'Lk/default.svg', 0, 0, 0, 0),
(21, 'I Ketut Mertayasa', 'Lk', 'Padangbae', '1968-07-26', '081271067114', 'JL. BYPASS, KOBA, BANGKA TENGA', 'Bangka Tengah', 'Bangka Belitung', 'Indonesia', 1, 2026, 'Kepala BPS Kabupaten/Kota', 1, '', '', '', '', '', '', '', '196807261992111001', '340013357', 'Lk/default.svg', 0, 0, 0, 0),
(22, 'Ni Putu Beliana Puspita Sari', 'Pr', 'Tabanan', '1996-11-29', '082237404808', 'BTN Senapahan II No. 26, Br. D', '', '', '', 1, 2054, 'Staf Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, '', '', '', '', '', '', '', '199611292019012002', '340058885', 'Pr/default.svg', 0, 0, 0, 0),
(23, 'Putu Yogi Wigunanca', 'Lk', 'Tabanan', '1994-11-15', '081558417994', 'banjar rangdu, desa pohsanten', '', '', '', 1, 2052, 'Penugasan Statistisi Pelaksana Lanjutan Seksi Statistik Produksi', 1, '', '', '', '', '', '', '', '199411152019011001', '340058915', 'Lk/default.svg', 0, 0, 0, 0),
(24, 'Ni Putu Ayu Mila Dewi', 'Pr', 'Karangasem', '1992-12-28', '081806595936', 'Jalan Anawai no. 27', '', '', '', 1, 2051, 'Statistisi Pertama Seksi Statistik Industri', 1, '', '', '', '', '', '', '', '199212282014122001', '340057159', 'Pr/default.svg', 0, 0, 0, 0),
(25, 'Ratna Rosmayanti', 'Pr', 'Cianjur', '1972-10-11', '085860789234', 'JL PIRUS II NO. 34 BLOK 7 PERU', '', '', '', 1, 2030, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, 'Tring tring', '', '', '', '', '', '', '197210111992032001', '340013242', 'Pr/default.svg', 0, 0, 0, 0),
(26, 'Aris Muji Atmoko', 'Lk', 'Karawang', '1983-11-20', ' 6281381234899', 'Perum Pesona Handayani Indah', '', '', '', 1, 2041, 'Statistisi Muda Seksi Statistik Sosial', 1, 'Jalan dengan kaki', '', '', '', '', '', '', ' 198311202009021004', ' 340050003', 'Lk/default.svg', 0, 0, 0, 0),
(27, 'Efran Feri Kriswanto', 'Lk', 'Palembang', '1985-02-22', '085208314690', 'Jl R. Sukamto Lr. Masjid No.39', '', '', '', 1, 2043, 'Staf Seksi Neraca Wilayah dan Analisis Statistik', 1, '', '', '', '', '', '', '', '198502222009021005', '340050005', 'Lk/default.svg', 0, 0, 0, 0),
(28, 'Husin Maulana', 'LK', 'Jakarta Selatan', '0000-00-00', '', 'Griya Serang Asri Blok L4/13', '', '', '', 1, 2033, 'Kepala BPS Kabupaten/Kota', 1, 'asadadassas', '', '', '', '', '', '', '197504231996121001', '340015382', 'LK/default.svg', 0, 0, 0, 0),
(29, 'Toto E Sastrasuanda', 'LK', 'Cirebon', '0000-00-00', '', 'Dusun Belawa I Rt 03/01', '', '', '', 1, 2003, 'Kepala Deputi Bidang Statistik Sosial', 1, 'sasasaasa', '', '', '', '', '', '', '', '340003304', 'LK/default.svg', 0, 0, 0, 0),
(30, 'Anik Triani', 'PR', 'Semarang', '0000-00-00', '', 'Griya Cempaka Arum Blok AA 11', '', '', '', 1, 2039, 'Statistisi Muda Seksi Statistik Pertambangan, Energi dan Konstruksi', 1, 'asadadadad', '', '', '', '', '', '', '198103102002122002', '340016472', 'PR/default.svg', 0, 0, 0, 0),
(31, 'Maya Harsanti', 'PR', 'Jakarta', '0000-00-00', '', 'Perum Grand Duta Cluster Jade', '', '', '', 1, 2038, 'Staf Seksi Statistik Distribusi', 1, 'ADAAADADDAD', '', '', '', '', '', '', '198011042002122001', '340016479', 'PR/default.svg', 0, 0, 0, 0),
(32, 'Lestari Utaminingsih', 'PR', 'Kendal', '1977-10-13', '085641509482', 'Jl. Candi Kencana IV/C.66', '', '', 'Indonesia', 1, 2035, 'Staf Subbagian Kepegawaian & Hukum', 1, 'Taken', '', 'lestari10', '', 'lestari_utami', '', '', '197710132000022001', '340016072', 'PR/default.svg', 0, 0, 0, 0),
(33, 'Hengki Eko Riyadi', 'LK', 'Lubang Lor (Purworejo)', '1978-09-03', '085261660531', 'Grand Serpong Residence Blok A', '', '', 'Indonesia', 1, 2038, 'Statistisi Madya Pejabat Fungsional', 1, 'Laper nih', '', 'iri_hengki', '', 'hengki01', '', '', '197809032000121002', '340016113', 'LK/default.svg', 0, 0, 0, 0),
(34, 'Eddy Prayitno', 'LK', 'Bandar Lampung', '1977-01-15', '07215605102', 'Jl. Purnawirawan Raya Belakang', '', '', 'Indonesia', 1, 2035, 'Kepala BPS Kabupaten/Kota', 1, 'Makan bang!!', '', '', '', '', '', '', '197701151999011001', '340015736', 'LK/default.svg', 0, 0, 0, 0),
(35, 'Edison Manurung', 'LK', 'Tapanuli Utara', '1962-11-10', '021-7815560', 'Jl.Raya Lt.Agung Tg.BaratRt.00', '', '', 'Indonesia', 0, 2019, 'Staf Seksi Penyiapan Statistik Perdagangan Dalam Negeri', 0, 'Ngantuk bat', '', '', '', '', '', '', '196211101988021001', '340011827', 'LK/default.svg', 0, 0, 0, 0),
(36, 'Bambang Susilo', 'Lk', 'Blora', '1957-04-03', '', 'H.Ahyar No.49 RT.006/05 13440', '', '', '', 1, 2013, 'Staf Seksi Pengolahan Statistik Pendidikan dan Kesejahteraan Sosial', 0, '', '', '', '', '', '', '', '195704031977121001', '340005601', 'Lk/default.svg', 0, 0, 0, 0),
(37, 'Hotbel Purba', 'Lk', 'Pasir/Banjar Tongga', '1966-06-20', '081350343245', 'Jl. Pusat Pemerintahan', '', '', '', 1, 2024, 'Kepala BPS Kabupaten/Kota', 1, '', '', '', '', '', '', '', '196606201986031001', '340011571', 'Lk/default.svg', 0, 0, 0, 0),
(38, 'Edison Situmorang', 'Lk', 'Simarsoituruk', '1966-11-26', '082347774666', 'A W syahrani 4 Rt 23 Sempaja', '', '', '', 1, 2024, 'Kepala Seksi Statistik Sosial', 1, '', '', '', '', '', '', '', '196611261988021001', '340011786', 'Lk/default.svg', 0, 0, 0, 0),
(39, 'Chatarina Budi Anggarini', 'Pr', 'Bantul', '1969-04-29', '089610147898', 'Melikan Lor RT 04 Gandekan Ban', '', '', '', 1, 2027, 'Kepala Seksi Statistik Keuangan Dan Harga Produsen', 1, '', '', '', '', '', '', '', '196904291989022001', '340012122', 'Pr/default.svg', 0, 0, 0, 0),
(40, 'Muhammad Dedy', 'LK', 'Palembang', '1978-08-05', '081377900322', 'Jl. Sambu No. 33', '', '', 'Indonesia', 1, 2036, 'Kepala BPS Kabupaten/Kota', 1, '', '', '', '', '', '', '', '197808052000121001', '340016240', 'LK/default.svg', 0, 0, 0, 0),
(41, 'Ayu Setiawaty', 'PR', 'Jakarta Barat', '1977-05-09', 'Jakarta Barat', 'PERUMAHAN DUKUH ZAMRUD BLOK N7', '', '', '', 1, 2035, 'Penugasan Statistisi Pertama Seksi Statistik Distribusi', 1, '', '', '', '', '', '', '', '197705092000122007', '340016241', 'PR/default.svg', 0, 0, 0, 0),
(42, 'Shanti Kartika Astrilestari', 'PR', 'Surabaya', '1979-04-26', '082181923897', 'Perum Ragom Mufakat I Blok F-5', '', '', 'Indonesia', 1, 2037, 'Kepala Seksi Neraca Wilayah dan Analisis Statistik', 1, '', '', '', '', '', '', '', '197904262000122001', '340016242', 'PR/default.svg', 0, 0, 0, 0),
(43, 'Bambang Pamungkas', 'LK', 'Semarang', '1979-09-17', '081355103999', 'Jl Kredit Blok B 5 No 13', '', '', 'Indonesia', 1, 2037, 'Kepala BPS Kabupaten/Kota', 1, '', '', '', '', '', '', '', '197909172000121003', '340016243', 'LK/default.svg', 0, 0, 0, 0),
(44, 'Johanes Supranto', 'Lk', 'Semarang', '1939-05-22', '', 'Jl. Kejaksaan Raya No. 23 Kreo C', '', 'DKI Jakarta', 'Indonesia', 0, 2004, 'Kepala K.S Tk. I (Tipe A)', 0, 'Jangan Menyerah', '', '', '', '', '', '', '', '340000423', 'Lk/default.svg', 1, 0, 0, 0),
(45, 'Gita Devi Asyarita', 'Pr', 'Bekasi', '1994-08-05', '6281319546221', 'Desa Daruba', '', '', '', 1, 2052, 'Statistisi Pertama Seksi Statistik Distribusi', 1, 'Bersakit-sakit dahulu, bersenang-senangnya gak tau kapan', '', 'gitaasy_', '', '', '', '', '199408052017012001', '340058000', 'Pr/default.svg', 1, 0, 0, 0),
(46, 'Galang Retno Winarko', 'Lk', 'Blitar', '1990-10-22', '6282299649735', 'RT 4 RW 3, Desa Panggungrejo, Kecamatan Panggungrejo', 'Blitar', 'Jawa Timur', 'Indonesia', 1, 2048, 'Staf Seksi Integrasi Pengolahan Data', 1, 'WOW Amazing', '', 'galang_winarko', '', '', '', '', '199010222017011001', '340057999', 'Lk/default.svg', 1, 0, 0, 0),
(47, 'Timbang Sirait', 'Lk', 'Labuhan Batu', '1973-12-27', '628179719667', 'Puri Bintara Regency Blok K-19', 'Jakarta Timur', 'DKI Jakarta', 'Indonesia', 1, 2039, 'Lektor Tenaga Fungsional STIS', 1, 'Statmat jaya', '', '', '', '', '', '', '197312272000031002', '340016106', 'Lk/default.svg', 1, 0, 0, 0),
(48, 'Khaerul Anwar', 'LK', 'Demak', '1970-03-29', '081228439121', 'Perum Griya Utama Permai Blok', '', '', 'Indonesia', 1, 2028, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, '', '', '', '', '', '', '', '197003291991021001', '340012773', 'LK/default.svg', 0, 0, 0, 0),
(49, 'Achmad Rifai', 'LK', 'Jakarta Utara', '1974-12-05', '082221518394', 'Jl. Kranji No. 493', '', '', 'Indonesia', 1, 2033, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, '', '', '', '', '', '', '', '197412052000031001', '340016107', 'LK/default.svg', 0, 0, 0, 0),
(50, 'Apriliya Puput Nadea', 'PR', 'Klaten', '1989-04-06', '085647331647', 'Gg Spoor Dalam IV no 12', '', '', 'Indonesia', 1, 2047, 'Staf Seksi Jasa Perpustakaan', 1, '', '', '', '', '', '', '', '198904062012112001', '340055736', 'PR/default.svg', 0, 0, 0, 0),
(51, 'Arini Ismiati', 'PR', 'Malang', '1979-12-20', '081215927271', 'Jl. Batok GG III no.5', '', '', 'Indonesia', 1, 2038, 'Statistisi Muda Seksi Statistik Produksi', 1, '', '', '', '', '', '', '', '197912202003122006', '340017013', 'PR/default.svg', 0, 0, 0, 0),
(52, 'Dea Venditama', 'LK', 'Bantul', '1991-06-02', '6282292146507', 'Otista', 'Pusat', 'DKI Jakarta', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Pemantauan dan Evaluasi Publikasi', 1, '', '', '', '', '', '', '', '199106022014101001', '340056757', 'LK/default.svg', 0, 0, 0, 0),
(53, 'Delly Rakasiwi', 'LK', 'Jakarta', '1991-03-05', '', 'Ki Hajar DewantaraRT 01 RW 06', 'Palangkaraya', 'Kalimantan Tengah', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Jaringan dan Rujukan Statistik', 1, '', '', '', '', '', '', '', '199103052014101002', '340056758', 'LK/default.svg', 0, 0, 0, 0),
(54, 'Dhoni Eko Wahyu Nugroho', 'LK', 'Kediri', '1991-07-28', '', 'Jl. Kebon Nanas Utara No 10 Ja', 'Pusat', 'DKI Jakarta', 'Indonesia', 1, 2049, 'Pranata Komputer Pertama Seksi Pengemasan Informasi Statistik', 1, '', '', '', '', '', '', '', '199107282014101001', '340056759', 'LK/default.svg', 0, 0, 0, 0),
(55, 'Poltak Sutrisno Siahaan', 'Lk', 'Tebing Tinggi', '1952-08-06', '', 'Jl. Asrama Komplek Bumi AsriBl', '', '', '', 1, 2012, 'Staf MPP', 0, '', '', '', '', '', '', '', '195208061975031001', '340004375', 'Lk/default.svg', 0, 0, 0, 0),
(56, 'Weni Lidya Sukma', 'Pr', 'Padang Pariaman', '1989-09-12', '085263662023', 'jl. mandor dami 2 perumahan fe', '', '', '', 1, 2047, 'Penugasan Statistisi Pelaksana Lanjutan Seksi Pengolahan Statistik Ketenagakerjaan', 1, '', '', '', '', '', '', '', '198909122012112001', '340055951', 'Pr/default.svg', 0, 0, 0, 0),
(57, 'Tri Hayuni Syardi', 'Pr', 'Padang', '1990-10-30', '081281060452', 'Komplek Mawar Putih Blok L No.', '', '', '', 1, 2048, 'Kepala Seksi Integrasi Pengolahan dan Diseminasi Statistik', 1, '', '', '', '', '', '', '', '199010302012112001', '340055938', 'Pr/default.svg', 0, 0, 0, 0),
(58, 'Subuh Sukmono Putro', 'Lk', 'Sragen', '1975-03-15', '081329278642', 'Graha Surya No IC', '', '', '', 1, 2033, 'Kepala Seksi Statistik Sosial', 1, '', '', '', '', '', '', '', '197503151996121001', '340015332', 'Lk/default.svg', 0, 0, 0, 0),
(59, 'Sigit Purnomo', 'LK', 'Kulon Progo', '1965-02-17', '081288378366', 'Puri Citayam Permai Blok B-10', '', '', '', 1, 2023, 'Kepala Bagian Penyusunan Rencana', 1, 'mantap', '', '', '', '', '', '', '196502171988021001', '340011821', 'LK/default.svg', 0, 0, 0, 0),
(60, 'MOCHAMAD IZZA ZULFIKAR SYA\'RONI', 'Pr', 'Jayapura', '1989-12-12', '(+62) 29 2629 944', 'Ds. Sumpah Pemuda No. 190, Singkawang 21576, KalSel', 'Makassar', 'Gorontalo', 'Mikronesia', 1, 2002, 'minima', 1, 'Voluptatem quam a tenetur dolore minima qui. Nostrum aut autem ut. Sapiente enim consequatur ipsam qui quia provident. Et at vel illo.', '', '', '', '', '', '', '2435731040527948', '221810422', 'Pr/default.svg', 0, 0, 0, 0);

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
(6, 55),
(7, 13),
(8, 2),
(9, 52),
(10, 53),
(11, 2),
(12, 54),
(13, 22),
(14, 23),
(15, 24),
(16, 25),
(17, 2),
(18, 7),
(19, 10),
(20, 2),
(21, 28),
(22, 29),
(23, 30),
(24, 31),
(25, 32),
(26, 33),
(27, 34),
(28, 18),
(29, 2),
(30, 10),
(31, 19),
(32, 20),
(33, 2),
(34, 21),
(35, 2),
(36, 2),
(37, 35),
(38, 36),
(39, 37),
(40, 38),
(41, 39),
(42, 40),
(43, 41),
(44, 2),
(45, 42),
(46, 43),
(47, 44),
(48, 47),
(49, 48),
(50, 49),
(51, 50),
(52, 2),
(53, 2),
(54, 12),
(55, 13),
(56, 2),
(57, 14),
(58, 15),
(59, 17),
(60, 1);

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
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) UNSIGNED NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `judul` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `akses` enum('public','private','other','Review') NOT NULL DEFAULT 'Review',
  `user_id` int(11) NOT NULL,
  `groups_id` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `aktif` char(1) NOT NULL
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

--
-- Dumping data for table `client_app`
--

INSERT INTO `client_app` (`id`, `uid`, `nama_app`, `deskripsi`, `status`, `req_date`, `req_acc`, `uid_admin`, `id_token`) VALUES
(1, 1, 'Aplikasi Sipadu Mobile', 'Aplikasi ini membutuhkan request data dari sistem anda.', 'Diterima', '2021-03-16 22:45:34', '2021-03-17 21:56:53', 1, 1);

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
  `tag` varchar(80) DEFAULT NULL,
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
(33, 1, 12),
(34, 1, 32),
(35, 1, 33),
(36, 1, 34),
(37, 1, 35),
(38, 1, 36),
(39, 1, 37),
(40, 1, 38),
(41, 1, 39),
(42, 1, 40),
(43, 1, 41),
(44, 1, 42),
(45, 1, 43),
(46, 1, 44),
(47, 1, 45),
(48, 1, 46),
(49, 1, 47),
(50, 1, 48),
(51, 1, 49),
(52, 1, 50),
(53, 1, 51),
(54, 1, 52),
(55, 1, 53),
(56, 1, 54),
(57, 1, 55),
(58, 1, 56),
(59, 1, 57),
(60, 1, 58),
(61, 1, 59),
(62, 1, 60),
(63, 1, 61),
(64, 1, 62),
(65, 1, 63),
(66, 1, 64),
(67, 1, 65),
(68, 1, 66),
(69, 1, 67),
(70, 1, 68),
(71, 1, 69),
(72, 1, 70),
(73, 1, 71);

-- --------------------------------------------------------

--
-- Table structure for table `kabkota`
--

CREATE TABLE `kabkota` (
  `id_provinsi` int(11) NOT NULL,
  `id_kabkota` int(11) NOT NULL,
  `nama_kabkota` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id` int(11) UNSIGNED NOT NULL,
  `berita_id` int(11) UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Managemen RBAC', 'fas fa-users-cog'),
(2, 'Security', 'fas fa-user-shield'),
(3, 'Token', 'fas fa-qrcode'),
(4, 'Dashboard', 'fas fa-tachometer-alt'),
(5, 'Tracking Activity', 'fas fa-user-clock'),
(6, 'Setting Aplikasi', 'fas fa-user-shield'),
(7, 'Manajemen Berita', 'fas fa-book-open'),
(8, 'Manajemen API', 'fab fa-chrome'),
(9, 'Managemen Database', 'fas fa-user-circle'),
(10, 'Managemen Galeri', 'fas fa-photo-video');

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
(1, '2021-04-17-213105', 'App\\Database\\Migrations\\Alumni', 'default', 'App', 1622017980, 1),
(2, '2021-04-17-213203', 'App\\Database\\Migrations\\AuthTable', 'default', 'App', 1622017981, 1),
(3, '2021-04-17-213248', 'App\\Database\\Migrations\\Rbac', 'default', 'App', 1622017981, 1),
(4, '2021-04-17-213438', 'App\\Database\\Migrations\\Webservice', 'default', 'App', 1622017982, 1),
(5, '2021-04-29-090021', 'App\\Database\\Migrations\\Berita', 'default', 'App', 1622017982, 1),
(6, '2021-05-21-073527', 'App\\Database\\Migrations\\ProvKabKot', 'default', 'App', 1622017982, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_visited`
--

CREATE TABLE `news_visited` (
  `id` int(11) UNSIGNED NOT NULL,
  `news_id` int(11) UNSIGNED NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'D-III', 'Akademi Ilmu Statistik', 1986, 1983, 25, 2),
(2, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 1999, 40, 2),
(3, 'D-III', 'Akademi Ilmu Statistik', 1986, 0000, 25, 3),
(4, 'D-III', 'Akademi Ilmu Statistik', 1986, 0000, 25, 4),
(5, 'D-III', 'Akademi Ilmu Statistik', 1986, 0000, 25, 5),
(6, 'D-III', 'Akademi Ilmu Statistik', 1975, 1972, 14, 55),
(7, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2011, 2007, 14, 56),
(8, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2011, 2007, 49, 57),
(9, 'D-III', 'Akademi Ilmu Statistik', 1966, 0000, 6, 29),
(10, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 0000, 40, 30),
(11, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 0000, 40, 31),
(12, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, 0000, 37, 13),
(13, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 0000, 39, 13),
(14, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, 0000, 37, 14),
(15, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2013, 0000, 51, 15),
(16, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2013, 0000, 51, 16),
(17, 'D-III', 'Akademi Ilmu Statistik', 1985, 0000, 24, 17),
(18, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 0000, 40, 17),
(19, 'D-III', 'Akademi Ilmu Statistik', 1985, 0000, 24, 18),
(20, 'D-III', 'Akademi Ilmu Statistik', 1992, 1989, 31, 21),
(21, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2018, 2014, 56, 22),
(22, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2018, 2014, 56, 23),
(23, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2014, 2010, 52, 24),
(24, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 25),
(25, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 26),
(26, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2008, 2004, 46, 27),
(27, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2003, 2002, 41, 32),
(28, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1999, 1996, 38, 33),
(29, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1999, 38, 33),
(30, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, 1995, 37, 34),
(31, 'D-III', 'Akademi Ilmu Statistik', 1987, 1984, 26, 35),
(32, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 40),
(33, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 41),
(34, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 42),
(35, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 1997, 39, 43),
(36, 'D-III', 'Akademi Ilmu Statistik', 1961, 1958, 1, 44),
(37, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2016, 2012, 55, 45),
(38, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2016, 2012, 55, 46),
(39, 'D-III', 'Sekolah Tinggi Ilmu Statistik', 1998, 1995, 37, 47),
(40, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1998, 39, 47),
(41, 'D-III', 'Akademi Ilmu Statistik', 1997, 1994, 36, 48),
(42, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1997, 38, 48),
(43, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 1998, 38, 49),
(44, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2011, 2007, 49, 50),
(45, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2003, 1999, 41, 51),
(46, 'D-III', 'Akademi Ilmu Statistik', 1985, 0000, 24, 19),
(47, 'D-III', 'Akademi Ilmu Statistik', 1985, 0000, 24, 20),
(48, 'D-III', 'Akademi Ilmu Statistik', 1996, 1993, 35, 58),
(49, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2003, 1999, 41, 58),
(50, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 1999, 1995, 38, 21),
(51, 'D-III', 'Akademi Ilmu Statistik', 1996, 0000, 35, 28),
(52, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2000, 0000, 35, 28),
(53, 'D-III', 'Akademi Ilmu Statistik', 1990, 0000, 29, 36),
(54, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 0000, 40, 36),
(55, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 0000, 39, 37),
(56, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2001, 0000, 39, 38),
(57, 'D-IV', 'Sekolah Tinggi Ilmu Statistik', 2002, 0000, 40, 39),
(58, 'D4', 'Akademi Ilmu Statistik', 1951, 1950, 25, 1);

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
(1, 'D-III AIS', '1320', ''),
(2, 'Statistik Sosial Kependudukan', '01.0258', ''),
(3, 'D-III AIS', '1264', ''),
(4, 'D-III AIS', '1281', ''),
(5, 'D-III AIS', '1274', ''),
(6, 'Ak. Ilmu Statistik', '559', ''),
(7, 'D-IV Statistik Sosial Kependudukan', 'SK.07.5525', ''),
(8, 'D-IV Statistik Ekonomi', 'SE.07.5510', ''),
(9, 'D-III AIS', '270', ''),
(10, 'D-IV SK', 'SK.01.0186', ''),
(11, 'D-IV SK', 'SK.01.0275 ', ''),
(12, 'D-III STIS', '95.2655', 'Analisis Ubinan Kota Wonogiri 1997'),
(13, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0118', 'Mortalitas Penduduk Indonesia'),
(14, 'D-III STIS', '95.2679', 'Judul Tulisannya Apa ya'),
(15, 'D-IV Komputasi Statistik', 'KS.09.6024', 'Clustering Indeks Pembangunan Manusia hihi'),
(16, 'D-IV Komputasi Statistik', 'KS.09.6027', 'Remote Sensing ajah pokoknya'),
(17, 'D-III AIS', '1188', 'Disparitas Distribusi Pendapatan dan Variabel-Variabel yang Mempengaruhinya'),
(18, 'D-IV Statistik Sosial Kependudukan', 'SK.01.0171 ', 'Faktor-faktor yang Mempengaruhi Perawatan Kehamilan'),
(19, 'D-III AIS', '1209', 'Ketimpangan Capaian Pendidikan di Indonesia dan Determinannya'),
(20, 'D-III AIS', '1842', 'Analisis Sistem Keamanan Jaringan Hot-Spot'),
(21, 'Komputasi Statistik', 'KS.14.8287', 'Analisis Sistem Keamanan Jaringan Hot-Spot'),
(22, 'Statistik Ekonomi', 'SE.14.8316', 'Analisis Efisiensi Penggunaan Modal Kerja Untuk Kegiatan Usaha Pada Perusahaan Konveksi Perusahaan'),
(23, 'Komputasi Statistik', 'KS.10.6395', 'Analisa Struktur Kalimat Bahasa Indonesia dengan Menggunakan Pengurai Kalimat Berbasis Linguistik'),
(24, 'D-IV Statistik Sosial Kependudukan', ' SK.04.4611', ''),
(25, 'D-IV Statistik Sosial Kependudukan', ' SK.03.4145', ''),
(26, 'D-IV Statistik Ekonomi', 'SE.03.4182 ', ''),
(27, 'D-IV Statistik Ekonomi', 'SE.02.0398', 'Analisis Prediksi Hari Kiamat 2012 Dengan Metode Monte Carlo'),
(28, 'D-III STIS', '96.2782', 'Analisis Peubah Ganda'),
(29, 'D-IV Statistik Ekonomi', 'SE.99.0052', 'Kecerdasan Buatan'),
(30, 'D-III STIS', '95.2623', 'Sadis, seorang istri tega menjemur dan memukuli kasur karna ketahuan sudah ditiduri suaminya'),
(31, 'Ak. Ilmu Statistik', '1271', 'Ingin mempunyai umur yang panjang seorang kakek berpura-pura budek ketika dipanggil malaikat'),
(32, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0127', ''),
(33, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0082', ''),
(34, 'D-IV Statistik Ekonomi', 'SE.00.0152', ''),
(35, 'D-IV Komputasi Statistik', 'KS.00.0067', ''),
(36, 'D-III AIS', '1', 'Analisis Klaster Menggunakan Metode Hierarchical Clustering'),
(37, 'D-IV Statistik Ekonomi', 'SE.12.7157', 'Pengaruh Virus H5N1 terhadap Perekonomian di Provinsi Banten'),
(38, 'D-IV Komputasi Statistik', 'KS.12.7151', 'Perancangan Sistem Pakar Pendeteksi Gangguan Kecemasan Berbasis Web'),
(39, 'D-III STIS', '95.2691', 'Analisis Pola Fertilitas Wanita Usia Subur di Indonesia tahun 1997'),
(40, 'D-IV Statistik Ekonomi', 'SE..98.0036', 'Kesalahan Spesifikasi Model pada Data Cacah Menyebabkan Overdispersi'),
(41, 'Ak. Ilmu Statistik', '2515', ''),
(42, 'D-IV Statistik Sosial Kependudukan', 'SK.99.0055 ', ''),
(43, 'D-IV Komputasi Statistik', 'KS.98.0019 ', ''),
(44, 'D-IV Komputasi Statistik', 'KS.07.5297', ''),
(45, 'D-IV Statistik Ekonomi', 'SE.02.0365', ''),
(46, 'D-III AIS', '1226', 'Kemiskinan Multidimensi dan Variabel yang Mempengaruhinya'),
(47, 'D-III AIS', '1200', 'Pemilihan Model Terbaik pada Peramalan Produksi Batubara di Indonesia'),
(48, 'Ak. Ilmu Statistik', '2421', ''),
(49, 'D-IV Statistik Ekonomi', 'SE.02.0433', ''),
(50, 'Komputasi Statistik', 'KS.97.0008', 'Analisis Data Geospasial Media Sosial untuk Melihat Pola Pariwisata di Indonesia'),
(51, 'D-III AIS', '2353', ''),
(52, 'D-IV SE', 'SE.99.0054', ''),
(53, 'D-III AIS', '2314', 'Pengeruh Skripsi Terhadap Kesehatan Mental'),
(54, 'D-IV Statistik Sosial Kependudukan', 'SK.01.0199', 'Pengaruh Pertumbuhan Penduduk terhadap Harga Pasar'),
(55, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0103', 'Pengaruh Nilai terhadap Presatasi'),
(56, 'D-IV Statistik Sosial Kependudukan', 'SK.00.0093', 'Binggung bikin judul'),
(57, 'D-IV Statistik Ekonomi', 'SE.01.0210 ', 'Pokoknya Judul'),
(58, 'Komputasi', '221810', 'Aww Malu banget');

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

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 'alumni:profile:list', 'Mengakses list informasi pribadi dasar alumni atas nama pengguna');

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
(14, 4, 'Report 2', 'admin/reports/report-2', 'far fa-chart-bar', '0'),
(15, 7, 'Berita', 'admin/berita', 'fas fa-book-open', '1'),
(16, 8, 'API', 'admin/request-api', 'fab fa-chrome', '1'),
(17, 9, 'Alumni', 'admin/alumni', 'fas fa-user', '1'),
(18, 9, 'Instansi', 'admin/instansi', 'fas fa-landmark', '1'),
(19, 9, 'Publikasi', 'admin/publikasi', 'fas fa-file-alt', '1'),
(20, 9, 'Pendidikan', 'admin/pendidikan', 'fas fa-school', '1'),
(21, 9, 'Pendidikan Tinggi', 'admin/pendidikan-tinggi', 'fas fa-school', '1'),
(22, 9, 'Prestasi', 'admin/prestasi', 'fas fa-award', '1'),
(23, 10, 'Galeri Foto', 'admin/galeri-foto', 'fas fa-images', '1'),
(24, 10, 'Galeri Video', 'admin/galeri-video', 'fab fa-youtube', '1');

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
(31, 13, 2),
(32, 15, 1),
(33, 15, 2),
(34, 15, 3),
(35, 15, 4),
(36, 16, 1),
(37, 16, 2),
(38, 16, 3),
(39, 16, 4),
(40, 17, 1),
(41, 17, 2),
(42, 17, 3),
(43, 17, 4),
(44, 18, 1),
(45, 18, 2),
(46, 18, 3),
(47, 18, 4),
(48, 19, 1),
(49, 19, 2),
(50, 19, 3),
(51, 19, 4),
(52, 20, 1),
(53, 20, 2),
(54, 20, 3),
(55, 20, 4),
(56, 21, 1),
(57, 21, 2),
(58, 21, 3),
(59, 21, 4),
(60, 22, 1),
(61, 22, 2),
(62, 22, 3),
(63, 22, 4),
(64, 23, 1),
(65, 23, 2),
(66, 23, 3),
(67, 23, 4),
(68, 24, 1),
(69, 24, 2),
(70, 24, 3),
(71, 24, 4);

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
(3, 'BPS Kota Semarang', 'Semarang', 'Jawa Tengah', 'Indonesia', 'Jl. Inspeksi Kali Semarang No.1', '0243546413', '', 'bps3374@bps.go.id'),
(4, 'BPS Kabupaten Tabanan', 'Tabanan', 'Bali', 'Indonesia', 'Jl. Pahlawan No 1B', '0361811571', '', 'bps5102@bps.go.id'),
(5, 'BPS Kabupaten Karawang', 'Karawang', 'Jawa Barat', 'Indonesia', 'Jl. Cakradireja No.36', '0267402250', '', 'kabkarawang@bps.go.id'),
(6, 'BPS Kabupaten Lamongan', 'Lamongan', 'Jawa Timur', 'Indonesia', 'Jl. Veteran 185 Lamongan-62218', '(0322) 321339', '(0322) 321339', 'bps3524@bps.go.id'),
(7, 'BPS Provinsi Lampung', 'Bandar Lampung', 'Lampung', 'Indonesia', 'Jl. Basuki Rahmat No 54', '(62-721) 482909', '(62-721) 484329', 'bps1800@bps.go.id'),
(8, 'BPS Kabupaten Tegal', 'Tegal', 'Jawa Tengah', 'Indonesia', 'Jl Ade Irma Suryani No 1 Slawi', '(0283) 4561190', '(0283) 4561190', 'bps3328@bps.go.id'),
(9, 'BPS Provinsi DKI Jakarta', 'Jakarta Pusat', 'Jakarta', 'Indonesia', 'Jl. Salemba Tengah No. 36-38 Paseban Senen', '(021) 31928493', '(021) 3152004', 'bps3100@bps.go.id'),
(10, 'BPS Provinsi Jawa Barat', 'Bandung', 'Jawa Barat', 'Indonesia', 'Jl. PHH. Mustofa No. 43 Bandung 40124', '+62 22 7272595', '+62 22 7213572', 'bps3200@bps.go.id'),
(11, 'BPS Indragiri Hilir', 'Indragiri Hilir', 'Riau', 'Indonesia', 'Jl. Praja Sakti (Bunga) No. 11 Tembilahan Hilir, Tembilahan. ', ' (0768) 22489', ' (0768) 22489', 'bps1403@bps.go.id'),
(12, 'BPS Provinsi Kalimantan Selatan', 'Palangkaraya', 'Kalimantan Tengah', 'Indonesia', 'Jl. Kapt. Piere Tendean No 6 Palangka Raya 73112 Indonesia', ' (0536) 322 8105', ' (0536) 322 8105', 'kalteng@bps.go.id'),
(13, 'BPS Provinsi Nusa Tenggara Timur', 'Kupang', 'Nusa Tenggara Timur', 'Indonesia', 'Jl. R. Suprapto No. 5', '(0380) 8554535', '(0380) 8550136', 'ntt@bps.go.id'),
(14, 'BPS Kota Pariaman', 'Pariaman', 'Sumatera Barat', 'Indonesia', 'Jl. Sentot Ali Basa', '(0751) 93785', '(0751) 93780', 'pariaman@bps.go.id'),
(15, 'BPS Kabupaten Boyolali', 'Boyolali', 'Jawa Tengah', 'Indonesia', 'Jl. Raya Boyolali-Semarang No.Km. 2', '(0276) 323772', '(0276) 323701', 'boyolali@bps.go.id'),
(16, 'BPS Kabupaten Garut', 'Garut', 'Jawa Barat', 'Indonesia', 'Jl. Pembangunan No.222, Sukagalih, Kec. Tarogong Kidul', '233273', '020234873432', 'bpsgarut@gmail.com'),
(17, 'BPS Kabupaten Musi Banyuasin', 'Musi Banyuasin', 'Sumatera Selatan', 'Indonesia', 'Jl. Merdeka No.531, Kayu Ara, Sekayu', '0001234', '02025678', 'bpsmusibanyuasin@gmail.com'),
(18, 'BPS Kabupaten Lebak', 'Lebak', 'Banten', 'Indonesia', 'Jl. Jendral Sudirman No.807, Narimbang Mulia, Kec. Rangkasbitung, Kabupaten Lebak, Banten 42315', '(62-252) 5554673', '', 'bps3602@bps.go.id'),
(19, 'BPS Kota Tangerang', 'Tangerang', 'Banten', 'Indonesia', 'Jl. RHM Noer Radji No. 28 Gerendeng Tangerang', '(62-21) 55792858', '(62-21) 55796910', 'bps3671@bps.go.id'),
(20, 'BPS Provinsi Jawa Tengah', 'Semarang', 'Jawa Tengah', 'Indonesia', 'Jl. Pahlawan No.6, Pleburan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50241', '024 - 8412802', '024 - 8311195', 'bps3300@bps.go.id'),
(21, 'BPS Kabupaten Pringsewu', 'Pringsewu', 'Lampung', 'Indonesia', 'Jl. Raya Gading Rejo KM.33 Wonodadi, Gading Rejo 35372', '(62-729) 7330811', '', 'bps1810@bps.go.id'),
(22, 'BPS Kota Jakarta Selatan', 'Jakarta Selatan', 'DKI Jakarta', 'Indonesia', 'Komplek Walikota Jakarta Selatan Blok A 15th Floor, JL. Prapanca Raya, No. 9, Kebayoran Baru, RT.2/RW.3, Pulo, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160', '(021) 72792576', '(021) 27872812', 'bps3171@bps.go.id'),
(23, 'BPS Kabupaten Indramayu', 'Indramayu', 'Jawa Barat', 'Indonesia', 'Jl. Golf No. 4 Indramayu, Jawa Barat - Indonesia', '+62 234 272880', '+62 234 272880', 'bps3212@bps.go.id'),
(24, 'BPS Kabupaten Bintan', 'Bintan', 'Kepulauan Riau', 'Indonesia', 'Jl. Tata Bumi, Ceruk Ijuk, Toapaya, Bintan, Kepulauan Riau', ' (0771) 3300 700', '', 'bps2102@bps.go.id'),
(25, 'BPS Kota Surabaya', 'Kota Surabaya', 'Jawa Timur', '', 'Jl. A. Yani 152 E Surabaya 60231 Jawa Timur Indonesia', '(62-31) 82516020', '(62-31) 8296691', 'bps3578@bps.go.id'),
(26, 'BPS Minahasa', 'Minahasa', 'Sulawesi Utara', 'Indonesia', 'Jl. Dotulolong Lasut, Tondano Timur, Minahasa', '(0431)321155', '(0431)321155', ' bps7102@bps.go.id'),
(27, 'BPS Jawa Timur', 'Surabaya', 'Jawa Timur', 'Indonesia', 'Jl. Raya Kendangsari Industri N0.34', '081213869409', '62913857000', 'tpramono11@bps.go.id'),
(28, 'BPS Bangka Selatan', 'Bangka Selatan', 'Bangka Belitung', 'Indonesia', '', '(0718) 4220039', '', 'bps1905@bps.go.id'),
(29, 'BPS Tomohon', 'Tomohon', 'Sulawesi Utara', 'Indonesia', 'JL. Nimawanua, Lansot, Lansot, Tomohon Sel., Kota Tomohon, Sulawesi Utara', '0431) 3159904', '', 'bps7173@bps.go.id'),
(30, 'BPS Sorong Selatan', 'Sorong Selatan', 'Papua Barat', 'Indonesia', 'Jalan Teminabuan-Ayamaru', '', '', 'bps9106@bps.go.id'),
(31, 'BPS Sulawesi Tenggara', 'Kendari', 'Sulawesi Tenggara', 'Indonesia', 'Jl. Boulevard No. 1 Kendari Sulawesi Tenggara', '(0401) 3135363', '0401-3122355', 'bps7400@bps.go.id'),
(32, 'BPS Kabupaten Sukabumi', 'Sukabumi', 'Jawa Barat', 'Indonesia', 'Jl. Raya Karangtengah Km 14 No 52 Cibadak Sukabumi 43351', '0266536953', '0653536949', 'bps3202@bps.go.id'),
(33, 'BPS Kabupaten Gunungkidul', 'Gunungkidul', 'Jawa Tengah', 'Indonesia', 'Jl. Pemuda 19A Baleharjo Wonosari 55811', '0274394180', '0274394181', 'bps3403@bps.go.id'),
(34, 'BPS Kabupaten Ogan Ilir', 'Prabumulih', 'Sumatera Selatan', 'Indonesia', 'Jl. Palembang-Prabumulih Km 33 Desa Tanjung Pering 30813 Indralaya', '0711581713', '0711581713', 'bps1610@bps.go.id'),
(35, 'BPS Kabupaten Paser', 'Paser', 'Kalimantan Timur', 'Indonesia', 'Jl. Gajah Mada No.76, Tanah Grogot', '(0543)21219', '(0543)21219', 'bps6401@bps.go.id'),
(36, 'BPS Kota Samarinda', 'Samarinda', 'Kalimantan Timur', 'Indonesia', 'Jl. Kyai Haji Ahmad Dahlan No.33, Sungai Pinang Luar', '(0543)21219', '(0543)21219', 'bps6401@bps.go.id'),
(37, 'BPS Provinsi Daerah Istimewa Yogyakarta', 'Bantul', 'Daerah Istimewa Yogyakar', 'Indonesia', 'Jalan Lingkar Selatan, Tamantirto, Kasihan, Geblagan, Tamantirto', '0274-4342234', '0274-4342230', 'pst3400@bps.go.id'),
(38, 'BPS Kab Empat Lawang', '', '', 'Indonesia', 'Jl. Lintas Sumatera No. 35 Kecamatan Tebing Tinggi Kabupaten Empat Lawang Sumatera Selatan', '070221674', '070221674', 'bps1611@bps.go.id'),
(39, 'BPS Kota Bekasi', '', '', 'Indonesia', 'Jl. Rawa Tembaga I, No. 6, Bekasi', '02188953987', '02188953987', 'bps3275@bps.go.id'),
(40, 'BPS Kab Lampung Selatan', '', '', 'Indonesia', 'Jl. Mustafa Kemal No. 24 Kalianda, Lampung Selatan - Lampung', '0727322241 ', '0727322241 ', 'bps1803@bps.go.id'),
(41, 'BPS Kab Tasikmalaya', '', '', 'Indonesia', 'Jalan Raya Timur Singaparna km 4 Cintaraja Singaparna Tasikmalaya', '0265549281', '0265549253', 'bps3206@bps.go.id'),
(42, 'BPS Kabupaten Pulau Morotai', 'Pulau Morotai', 'Maluku Utara', 'Indonesia', 'Jln. Hi. Ahmad Syukur, Kec. Morotai Selatan, Pulau Morotai-Maluku Utara, 97771', '(0923) 2221133', '', 'bps8207@bps.go.id'),
(43, 'BPS Provinsi Maluku Utara', 'Ternate', 'Maluku Utara', 'Indonesia', 'Jl. Stadion No 65 Ternate 97712', '(0921) 3127878', '(0921) 3126301', 'bps8200@bps.go.id'),
(44, 'Politeknik Statistika STIS', 'Jakarta Timur', 'DKI Jakarta', 'Indonesia', 'Jl. Otto Iskandardinata No. 64C', '(021) 8508812', '8197577', 'info@stis.ac.id'),
(45, 'BPS Kabupaten/Kota Bandung', 'Bandung', 'Jawa Barat', 'Indonesia', '', '', '', ''),
(46, 'BPS Kabupaten Aceh Singkil', 'Aceh Singkil', 'Aceh', 'Indonesia', 'Jl. H. Sayuthi No. 2 Pulo Sarok', '(0658) 21268', '21268', 'bps1102@bps.go.id'),
(47, 'BPS Kabupaten Rembang', 'Rembang', 'Jawa Tengah', 'Indonesia', 'Jl. Pemuda Km. 1', '0295691040', '0295691040', 'bps3317@bps.go.id'),
(48, 'BPS Kabupaten Cilacap', 'Cilacap', 'Jawa Tengah', 'Indonesia', 'Jalan Dr. Soetomo No. 16A', '0282534328', '0282535011', 'bps3301@bps.go.id'),
(49, 'BPS Kabupaten Klaten', 'Klaten', 'Jawa Tengah', 'Indonesia', 'Jl. Merapi No. 6', '62272321689', '', 'bps3310@bps.go.id'),
(50, 'BPS Kota Malang', 'Malang', 'Jawa Timur', 'Indonesia', 'Jl. Janti Barat No. 47', '0341801164', '0341805871', 'bps3573@bps.go.id'),
(51, 'BPS Kota Banjarmasin', '', '', '', 'Jalan Gatot Subroto No. 5 Banjarmasin 70235', '(0511) 6773031', '(0511) 6773032', 'bps6371@gmail.com'),
(52, 'BPS Provinsi Riau', '', '', '', 'Jl. Pattimura No. 12 Pekanbaru - Riau, Indonesia', '(62-761) 23042', '(62-761) 21336', 'riau@bps.go.id'),
(53, 'BPS Kabupaten Tanjung Jabung Barat', '', '', '', 'Jl. Prof.Dr. Sri Soedewi MS, SH.-Kuala Tungkal, Jambi', '(0742) 21738', '', 'bps1507@bps.go.id'),
(54, 'BPS Provinsi Sulawesi Utara', '', '', '', 'Jl. 17 Agustus Manado 95119', '(0431) 847044', '(0431) 862204', 'mailto:sulut@bps.go.id'),
(55, 'BPS Kabupaten Cirebon', '', '', '', 'Jl. Sunan Kalijaga No.4 Sumber-Cirebon 45611', '+62 231 321445', '+62 231 321445', 'bps3209@bps.go.id');

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

--
-- Dumping data for table `token_app`
--

INSERT INTO `token_app` (`id`, `token`, `count_usage`, `last_access`) VALUES
(1, 'BFvhXmuJLtEHkGoQCcrUaNM9SPbf7q', 1, '2021-03-17 21:56:53');

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
(1, 'dummy@stis.ac.id', 'Dummy', 1, 'Dummy_dummy', 'default.svg', '$2y$10$yLFu3bK0s5cHqd1VLT6Eh.GjA3H2GJzwqb6o/gjrhKXTWGkMsh3IS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-26 15:33:06', '2021-05-26 15:33:06', NULL);

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
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `kabkota_id_provinsi_foreign` (`id_provinsi`);

--
-- Indexes for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_berita_berita_id_foreign` (`berita_id`);

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
-- Indexes for table `news_visited`
--
ALTER TABLE `news_visited`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_visited_news_id_foreign` (`news_id`);

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
  MODIFY `id_alumni` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_app`
--
ALTER TABLE `client_app`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `access_group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_visited`
--
ALTER TABLE `news_visited`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(16) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `submenu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `submenu_access`
--
ALTER TABLE `submenu_access`
  MODIFY `menu_access_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `table_scope`
--
ALTER TABLE `table_scope`
  MODIFY `target_scope_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempat_kerja`
--
ALTER TABLE `tempat_kerja`
  MODIFY `id_tempat_kerja` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `token_app`
--
ALTER TABLE `token_app`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD CONSTRAINT `kabkota_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD CONSTRAINT `komentar_berita_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_visited`
--
ALTER TABLE `news_visited`
  ADD CONSTRAINT `news_visited_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
