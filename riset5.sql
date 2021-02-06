-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 03:19 PM
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
  `activity_id` int(10) UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `group_name` varchar(25) NOT NULL,
  `access_name` tinyint(1) NOT NULL COMMENT '1 : Insert; 2 : Update ; 3 : Delete',
  `target_scope_id` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 : Success ; 0 : Failed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_id`, `time`, `user_name`, `group_name`, `access_name`, `target_scope_id`, `description`, `status`) VALUES
(2, '2020-12-17 11:04:04', 'Rifki Gustiawan', 'Administrator', 2, 1, 'Mengubah group user Muh. Restu', 1),
(4, '2020-12-02 00:13:45', '211810567@stis.ac.id', 'Administrator', 1, 1, 'no desc', 1),
(7, '2021-01-21 12:54:33', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 1, 'mengaktifkan user Annisa Silviana', 1),
(8, '2021-01-21 13:01:01', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 1, 'Menonaktifkan user Annisa Silviana', 1),
(9, '2021-01-21 13:12:14', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 1, 'Menghapus user Annisa Silviana', 1),
(10, '2021-01-21 21:28:07', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 1, 'Menghapus user AnnisaSil', 1),
(11, '2021-01-21 21:30:09', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 1, 1, 'Menambahkan user Annisa Silvianna', 1),
(12, '2021-01-21 21:33:15', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 1, 'Mengaktifkan user Annisa Silvianna', 1),
(13, '2021-01-21 21:33:37', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 1, 'Menonaktifkan user Annisa Silvianna', 1),
(14, '2021-01-21 21:34:24', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 1, 'Menghapus user Annisa Silvianna', 1),
(15, '2021-01-21 21:53:46', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(16, '2021-01-21 22:05:05', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(17, '2021-01-21 22:05:14', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(18, '2021-01-21 22:05:45', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(19, '2021-01-21 22:05:53', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(20, '2021-01-21 22:05:59', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Developer untuk user Rifki Gustiawan', 1),
(21, '2021-01-21 22:10:36', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(22, '2021-01-21 22:13:57', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(23, '2021-01-21 22:14:09', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(24, '2021-01-21 22:14:53', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(25, '2021-01-21 22:14:55', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(26, '2021-01-21 22:14:56', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(27, '2021-01-21 22:15:10', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(28, '2021-01-21 22:15:40', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Developer untuk user Rifki Gustiawan', 1),
(29, '2021-01-21 22:15:56', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(30, '2021-01-21 22:16:55', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(31, '2021-01-21 22:18:41', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(32, '2021-01-21 22:19:22', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(33, '2021-01-21 22:19:33', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(34, '2021-01-21 22:20:55', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(35, '2021-01-21 22:26:41', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(36, '2021-01-21 22:26:43', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(37, '2021-01-21 22:26:44', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(38, '2021-01-21 22:26:45', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(39, '2021-01-21 22:26:46', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(40, '2021-01-21 22:26:46', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(41, '2021-01-21 22:26:47', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(42, '2021-01-21 22:26:47', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(43, '2021-01-21 22:27:01', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 2, 'Menambahkan role/group Developer untuk user Rifki Gustiawan', 1),
(44, '2021-01-21 22:27:15', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(45, '2021-01-21 22:27:27', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(46, '2021-01-21 22:27:30', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(47, '2021-01-21 22:27:31', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(48, '2021-01-21 22:28:00', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 2, 'Menambahkan role/group Developer untuk user Rifki Gustiawan', 1),
(49, '2021-01-21 22:38:31', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(50, '2021-01-21 22:38:51', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 3, 2, 'Menghapus role/group Developer untuk user Rifki Gustiawan', 1),
(51, '2021-01-21 22:39:11', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(52, '2021-01-21 22:39:25', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 2, 'Menambahkan role/group Developer untuk user Rifki Gustiawan', 1),
(53, '2021-01-21 22:44:20', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(54, '2021-01-21 22:44:35', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 3, 2, 'Menghapus role/group Developer untuk user Rifki Gustiawan', 1),
(55, '2021-01-21 22:44:45', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(56, '2021-01-21 22:44:54', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(57, '2021-01-21 22:45:09', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Developer untuk user Rifki Gustiawan', 1),
(58, '2021-01-21 22:45:27', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 3, 2, 'Menghapus role/group Developer untuk user Rifki Gustiawan', 1),
(59, '2021-01-21 22:45:58', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Developer untuk user Rifki Gustiawan', 1),
(60, '2021-01-21 22:46:08', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 3, 2, 'Menghapus role/group Developer untuk user Rifki Gustiawan', 1),
(61, '2021-01-21 22:46:18', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(62, '2021-01-21 22:48:35', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(63, '2021-01-21 22:48:40', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(64, '2021-01-21 22:54:43', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 1, 6, 'Menambahkan group/role APIs', 1),
(65, '2021-01-21 22:55:43', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 1, 6, 'Menambahkan group/role Directure', 1),
(66, '2021-01-21 22:56:55', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 1, 6, 'Menambahkan group/role BAAK', 1),
(67, '2021-01-21 23:01:35', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 6, 'Mengubah group/role Directure. Dari  deskripsi this for debug menjadi this for debug and testing update.', 1),
(68, '2021-01-21 23:05:15', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 6, 'Mengubah group/role \"Directure\". Untuk  deskripsi \"this for debug and testing update\" menjadi \"this for debug and testing update test 2\".', 1),
(69, '2021-01-21 23:05:45', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 6, 'Mengubah group/role \"Directure\". Untuk  nama group \"Directure\" menjadi \"Directure v.2\".', 1),
(70, '2021-01-21 23:07:23', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 6, 'Mengubah group/role \"Administrator\". Untuk  deskripsi \"\" menjadi \"This is only for root user.\".', 1),
(71, '2021-01-21 23:10:48', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 2, 6, 'Mengubah group \"Directure v.2\". Untuk  deskripsi \"this for debug and testing update test 2\" menjadi \"\".', 1),
(72, '2021-01-21 23:19:15', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 6, 'Menghapus group Directure v.2.', 1),
(73, '2021-01-21 23:19:30', 'rifkigustiawan78.rg@gmail.com', 'Administrator', 3, 6, 'Menghapus group APIs.', 1),
(74, '2021-01-21 23:37:08', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Alumni. Group sedang digunakan oleh user ', 0),
(75, '2021-01-21 23:59:42', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Administrator. Group ini sedang digunakan oleh user Rifki Gustiawan.', 0),
(76, '2021-01-22 00:11:40', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Administrator. Group ini sedang digunakan oleh user Rifki Gustiawan.', 0),
(77, '2021-01-22 00:11:50', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Administrator. Group ini sedang digunakan oleh user Rifki Gustiawan.', 0),
(78, '2021-01-22 00:12:03', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Administrator. Group ini sedang digunakan oleh user Rifki Gustiawan.', 0),
(79, '2021-01-22 00:12:06', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Administrator. Group ini sedang digunakan oleh user Rifki Gustiawan.', 0),
(80, '2021-01-22 00:15:39', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Administrator. Group ini sedang digunakan oleh user Rifki Gustiawan.', 0),
(81, '2021-01-22 00:16:29', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Alumni. Grup ini memiliki akses untuk resource Users.', 0),
(82, '2021-01-22 00:17:45', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Gagal menghapus group Alumni. Grup ini memiliki akses untuk resource \"Users.\"', 0),
(83, '2021-01-22 00:34:35', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 3, 'Menambahkan menu Api', 1),
(84, '2021-01-22 01:18:09', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 3, 'Menambahkan menu x', 1),
(85, '2021-01-22 01:18:57', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 3, 'Menambahkan menu debug', 1),
(86, '2021-01-22 01:20:08', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 3, 'Menambahkan menu c', 1),
(87, '2021-01-22 01:55:29', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengupdate menu Api. Untuk  icon menu fa apis menjadi Apisa.', 1),
(88, '2021-01-22 01:56:01', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengupdate menu Apisa. Untuk  nama menu Apisa menjadi Apisa.', 1),
(89, '2021-01-22 01:57:31', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengupdate menu Apisa. Untu.', 1),
(90, '2021-01-22 01:58:06', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengupdate menu Apisa1. Untu.', 1),
(91, '2021-01-22 02:10:37', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengupdate menu Apisa12. Untuk nama menu Apisa12 menjadi Apisa12s, icon menu fa apissa12 menjadi fa apissa12s.', 1),
(92, '2021-01-22 02:12:02', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengupdate menu \"Apisa12s\". Untuk nama menu \"Apisa12s\" menjadi Apisa12sx.', 1),
(93, '2021-01-24 01:11:01', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 3, 'Menghapus menu x.', 1),
(94, '2021-01-24 01:11:16', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 3, 'Menghapus menu Apisa12sx.', 1),
(95, '2021-01-24 01:12:19', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 3, 'Menghapus menu c.', 1),
(96, '2021-01-24 01:12:25', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 3, 'Menghapus menu debug.', 1),
(97, '2021-01-24 01:13:08', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 3, 'Menambahkan resorce/submenu 4', 1),
(98, '2021-01-24 01:15:46', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 3, 'Menambahkan resorce sad', 1),
(99, '2021-01-24 01:16:34', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengubah data resouce sad. Dari title sad menjadi CHECK SAD REV.', 1),
(100, '2021-01-24 01:21:13', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 2, 3, 'Mengubah data resouce CHECK SAD REV. Dari status \"aktif\" menjadi \"nonaktif\".', 1),
(101, '2021-01-24 01:21:35', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 3, 'Menghapus resorce/submenu CHECK SAD REV', 1),
(102, '2021-01-24 01:23:25', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 4, 'Menambahkan access Create untuk resource Report 3.', 1),
(103, '2021-01-24 01:24:52', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 4, 'Menambahkan access Read untuk resource Report 3.', 1),
(104, '2021-01-24 01:25:07', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 4, 'Menghapus access Create untuk resource Report 3.', 1),
(105, '2021-01-24 01:30:19', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Read pada resource Report 3 untuk role Administrator', 1),
(106, '2021-01-24 01:30:25', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 5, 'Menghapus access Read pada resource Report 3 untuk role Administrator', 1),
(107, '2021-01-24 01:30:28', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Read pada resource Report 3 untuk role Administrator', 1),
(108, '2021-01-24 01:31:23', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 5, 'Menghapus access Read pada resource Report 3 untuk role Administrator', 1),
(109, '2021-01-24 01:33:51', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Read pada resource Report 3 untuk role Administrator', 1),
(110, '2021-01-24 01:33:59', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 5, 'Menghapus access Read pada resource Report 3 untuk role Administrator', 1),
(111, '2021-01-24 01:46:14', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Alumni,Deve', 1, 2, 'Menambahkan role/group Alumni untuk user Rifki Gustiawan', 1),
(112, '2021-01-24 01:46:17', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user Rifki Gustiawan', 1),
(113, '2021-01-24 01:47:56', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 3, 'Menghapus resorce Report 3', 1),
(114, '2021-01-24 01:50:19', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Read pada resource Reset Tokens untuk role Administrator', 1),
(115, '2021-01-24 01:54:10', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 1, 'Menambahkan user User_tester', 1),
(116, '2021-01-24 01:54:35', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 1, 'Menghapus user User_tester', 1),
(117, '2021-01-24 02:09:14', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 1, 'Menghapus user Tester 2', 1),
(118, '2021-01-24 02:16:56', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 5, 'Menghapus access Create pada resource Groups untuk role Administrator', 1),
(119, '2021-01-24 02:17:20', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 5, 'Menghapus access Read pada resource Groups untuk role Administrator', 1),
(120, '2021-01-24 02:17:39', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Read pada resource Groups untuk role Administrator', 1),
(121, '2021-01-24 02:18:18', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Create pada resource Groups untuk role Administrator', 1),
(122, '2021-01-24 02:18:21', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 5, 'Menghapus access Update pada resource Groups untuk role Administrator', 1),
(123, '2021-01-24 02:18:32', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 6, 'Menambahkan group/role a', 1),
(124, '2021-01-24 02:18:54', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Update pada resource Groups untuk role Administrator', 1),
(125, '2021-01-24 02:18:58', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 5, 'Menghapus access Delete pada resource Groups untuk role Administrator', 1),
(126, '2021-01-24 02:19:47', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 5, 'Menambahkan access Delete pada resource Groups untuk role Administrator', 1),
(127, '2021-01-24 02:19:54', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 6, 'Menghapus group a.', 1),
(128, '2021-02-01 17:27:05', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 2, 'Menambahkan role/group Administrator untuk user Dummy_dummy', 1),
(129, '2021-02-01 17:27:11', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 2, 'Menambahkan role/group Alumni untuk user Dummy_dummy', 1),
(130, '2021-02-03 20:02:41', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 1, 2, 'Menambahkan role/group Administrator untuk user RIFKI GUSTIAWAN', 1),
(131, '2021-02-03 20:02:46', 'rifkigustiawan78.rg@gmail.com', 'Administrator,Developer', 3, 2, 'Menghapus role/group Alumni untuk user RIFKI GUSTIAWAN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `angkatan` int(3) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telp_alumni` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `status_bekerja` tinyint(1) NOT NULL,
  `perkiraan_pensiun` year(4) DEFAULT NULL,
  `jabatan_terakhir` varchar(50) NOT NULL,
  `aktif_pns` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`angkatan`, `nama`, `nim`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telp_alumni`, `alamat`, `status_bekerja`, `perkiraan_pensiun`, `jabatan_terakhir`, `aktif_pns`) VALUES
(1, 'Anastasia Mayasari', '102076506', 'P', 'Samarinda', '2009-10-30', '0807 9556 6413', 'Jr. Moch. Toha No. 224, Salatiga 42210, Aceh', 1, 2009, 'doloribus', 0),
(45, 'Tomi Pradana', '132735969', 'P', 'Padangpanjang', '1983-12-14', '0909 8238 995', 'Jln. Wahid Hasyim No. 924, Tanjungbalai 62342, Papua', 0, 2013, 'eius', 1),
(48, 'Zamira Padmasari', '145143707', 'L', 'Pangkal Pinang', '2004-11-13', '(+62) 760 6550 4386', 'Ds. Salak No. 387, Bau-Bau 51969, Banten', 0, 1981, 'sunt', 1),
(49, 'Oliva Puspasari', '17884061', 'L', 'Gunungsitoli', '1975-01-02', '0854 1764 776', 'Psr. Abdul No. 968, Palangka Raya 86506, NTT', 1, 1992, 'ut', 0),
(11, 'Labuh Putra S.I.Kom', '183050008', 'L', 'Banjarbaru', '2017-10-17', '(+62) 591 5236 8425', 'Ki. Hang No. 409, Batu 66309, Bali', 0, 1981, 'debitis', 0),
(20, 'Nabila Icha Yolanda M.Farm', '2007402', 'P', 'Blitar', '2020-04-05', '0316 4945 3358', 'Jln. Yap Tjwan Bing No. 75, Depok 85899, NTB', 0, 2006, 'odit', 1),
(44, 'Fathonah Puspita M.Farm', '211353572', 'P', 'Administrasi Jakarta Selatan', '1993-02-11', '0774 1358 8182', 'Kpg. K.H. Maskur No. 458, Administrasi Jakarta Timur 59461, JaTeng', 0, 1990, 'nobis', 1),
(56, 'Padmi Nasyiah M.Pd', '212863610', 'P', 'Bitung', '1998-12-13', '0440 3533 966', 'Jln. Untung Suropati No. 836, Medan 46643, SulUt', 1, 1992, 'beatae', 1),
(52, 'Erik Saptono S.Farm', '214099282', 'P', 'Tangerang', '1994-03-07', '(+62) 504 1043 3088', 'Psr. Yos Sudarso No. 827, Sibolga 43993, JaBar', 0, 2014, 'ab', 1),
(35, 'Dummy_dummy', '221810160', 'L', 'Probolinggo', '2013-02-19', '0819 6640 178', 'Psr. Sutarto No. 618, Magelang 61100, JaTeng', 1, 2017, 'eos', 0),
(27, 'Rahmi Usada', '227564623', 'L', 'Tebing Tinggi', '2016-08-17', '0245 7813 7746', 'Ds. Casablanca No. 223, Madiun 36265, KalTim', 0, 1971, 'saepe', 0),
(44, 'Galar Damanik', '231097622', 'L', 'Jambi', '2005-05-31', '(+62) 664 0776 658', 'Kpg. Rajiman No. 539, Parepare 16565, SulTeng', 1, 1987, 'accusantium', 1),
(53, 'Daryani Taufan Hardiansyah S.T.', '251779543', 'L', 'Metro', '1990-03-27', '0339 2147 185', 'Ds. Sukabumi No. 836, Pangkal Pinang 10715, SulBar', 0, 1970, 'quia', 1),
(2, 'Danang Jatmiko Firgantoro', '253423451', 'L', 'Bogor', '2000-07-14', '(+62) 902 3361 8578', 'Jln. Yoga No. 824, Metro 58899, Bali', 1, 1989, 'alias', 0),
(4, 'Carla Violet Laksmiwati', '257986641', 'L', 'Semarang', '2020-06-23', '024 2178 8290', 'Ds. Elang No. 353, Bau-Bau 99516, DIY', 0, 2008, 'neque', 1),
(28, 'Tira Nuraini', '267552404', 'P', 'Kediri', '1982-11-09', '(+62) 675 1273 8595', 'Kpg. Babadan No. 665, Batu 28283, SumSel', 1, 1989, 'voluptatem', 1),
(3, 'Taswir Hakim', '29430551', 'P', 'Salatiga', '1985-04-29', '0267 9320 044', 'Ki. Fajar No. 865, Padang 99052, Banten', 0, 1996, 'quia', 0),
(56, 'Nasab Cakrawala Wijaya', '300171766', 'L', 'Administrasi Jakarta Barat', '1983-02-24', '(+62) 764 1511 242', 'Ds. Nakula No. 163, Banjar 38604, Jambi', 1, 1979, 'amet', 0),
(57, 'Hafshah Suryatmi S.T.', '319492930', 'L', 'Gunungsitoli', '1989-03-27', '0529 4109 2650', 'Dk. Batako No. 98, Magelang 94331, JaBar', 1, 1972, 'nesciunt', 0),
(53, 'Ganep Okta Hutasoit', '326462282', 'L', 'Tanjungbalai', '1974-11-04', '0499 2112 0840', 'Gg. Kartini No. 163, Balikpapan 96492, BaBel', 0, 2010, 'quis', 0),
(45, 'Michelle Rahayu', '326533254', 'L', 'Pagar Alam', '2003-07-10', '0411 6505 5709', 'Psr. Rajawali No. 874, Makassar 11351, NTB', 1, 2005, 'est', 1),
(26, 'Kurnia Narpati', '328214806', 'L', 'Gorontalo', '1995-07-28', '023 4074 671', 'Dk. Babadak No. 732, Makassar 33693, MalUt', 0, 1992, 'quibusdam', 1),
(9, 'Umi Rahmi Susanti M.Ak', '333118824', 'L', 'Jayapura', '1981-06-02', '(+62) 561 7799 840', 'Dk. Thamrin No. 606, Payakumbuh 92350, Bali', 1, 1983, 'velit', 1),
(2, 'Iriana Nasyidah S.T.', '342887469', 'L', 'Madiun', '2010-12-18', '0967 3064 853', 'Kpg. Sutoyo No. 832, Metro 72595, SumSel', 0, 2013, 'a', 0),
(31, 'Balijan Kusumo', '351682238', 'P', 'Kupang', '1981-01-15', '(+62) 800 1043 975', 'Psr. Bacang No. 651, Mojokerto 59654, KalTeng', 1, 1978, 'porro', 0),
(50, 'Jessica Carla Purnawati', '35220728', 'L', 'Depok', '1997-03-29', '(+62) 256 3092 502', 'Ki. Pacuan Kuda No. 247, Kupang 92068, Aceh', 0, 1983, 'quia', 0),
(52, 'Estiawan Manullang', '359282395', 'P', 'Pangkal Pinang', '1994-05-19', '0745 1279 603', 'Kpg. Flores No. 393, Padangpanjang 24960, JaTim', 0, 2017, 'quaerat', 1),
(22, 'Dariati Wacana', '376315665', 'L', 'Salatiga', '2007-11-16', '0770 9639 446', 'Jr. Yoga No. 176, Cimahi 91070, JaTeng', 1, 2019, 'dolorem', 1),
(33, 'Kala Jinawi Rajata', '381210597', 'L', 'Sorong', '2009-11-11', '0960 8489 442', 'Kpg. Suryo Pranoto No. 161, Cimahi 59112, DIY', 0, 1975, 'inventore', 0),
(16, 'Lantar Iswahyudi', '381544166', 'L', 'Sibolga', '1993-02-12', '(+62) 920 4274 236', 'Dk. Rajawali Timur No. 30, Bontang 93231, Lampung', 0, 1983, 'sapiente', 1),
(60, 'Hartana Waskita', '387443158', 'P', 'Ambon', '2012-02-04', '0446 3316 767', 'Ds. Sugiyopranoto No. 683, Binjai 10787, KalUt', 1, 2019, 'et', 1),
(37, 'Siti Halimah S.T.', '40029669', 'P', 'Jambi', '1998-04-12', '0623 4125 2287', 'Jln. Ikan No. 198, Ambon 18952, JaBar', 0, 2013, 'incidunt', 0),
(1, 'Simon Mangunsong', '404990449', 'L', 'Bengkulu', '2012-12-10', '0445 4253 707', 'Ds. B.Agam 1 No. 311, Ambon 64669, KalSel', 1, 2005, 'aut', 1),
(31, 'Zelda Mardhiyah', '411779763', 'L', 'Jayapura', '1996-04-03', '(+62) 508 4283 643', 'Psr. K.H. Maskur No. 383, Serang 60164, SumSel', 1, 2016, 'temporibus', 0),
(12, 'Purwa Wibowo', '417134522', 'P', 'Tasikmalaya', '1992-05-09', '0852 7352 483', 'Ki. Banceng Pondok No. 315, Tangerang 86571, SulSel', 0, 2014, 'expedita', 1),
(59, 'Novi Carla Wijayanti', '456243432', 'L', 'Banjar', '1989-02-01', '(+62) 556 4653 364', 'Dk. Camar No. 835, Gunungsitoli 76640, KalSel', 0, 2002, 'dolor', 1),
(42, 'Safina Fitria Safitri', '461303929', 'L', 'Sabang', '2015-11-17', '(+62) 22 8745 4749', 'Ds. Bakhita No. 474, Denpasar 80422, Riau', 1, 2012, 'perspiciatis', 1),
(7, 'Kardi Nugroho M.Kom.', '465335563', 'P', 'Mojokerto', '1993-04-22', '0510 6248 9671', 'Jr. Teuku Umar No. 19, Probolinggo 31215, Riau', 1, 2015, 'praesentium', 1),
(47, 'Lamar Prakasa', '502447306', 'L', 'Sawahlunto', '1987-04-24', '(+62) 757 7963 523', 'Jr. Baranang Siang No. 622, Batam 40905, SulSel', 1, 1980, 'ut', 1),
(28, 'Halima Namaga', '544695696', 'L', 'Palu', '2000-01-19', '(+62) 311 2602 9690', 'Gg. Supono No. 771, Banjarbaru 64117, BaBel', 1, 1982, 'deserunt', 1),
(44, 'Diana Puspasari', '545559411', 'L', 'Subulussalam', '1979-04-14', '(+62) 446 3466 0969', 'Psr. Basuki Rahmat  No. 914, Mojokerto 62912, NTT', 1, 2010, 'cum', 1),
(4, 'Puspa Novitasari', '564058991', 'P', 'Padangpanjang', '1977-03-22', '0229 8916 841', 'Gg. Sukabumi No. 680, Tebing Tinggi 21755, Aceh', 0, 1977, 'aliquid', 0),
(55, 'Soleh Thamrin M.Ak', '568014526', 'L', 'Bandar Lampung', '1991-08-16', '(+62) 24 1021 1303', 'Psr. B.Agam Dlm No. 415, Pariaman 97094, Papua', 1, 2004, 'et', 0),
(23, 'Maryadi Siregar', '578849343', 'L', 'Gorontalo', '1971-05-07', '0683 1639 5147', 'Ds. Peta No. 521, Palopo 81080, BaBel', 1, 1992, 'recusandae', 0),
(13, 'Endah Pertiwi', '5853860', 'L', 'Bekasi', '1991-03-06', '029 1961 2607', 'Ki. Katamso No. 840, Balikpapan 92250, SulUt', 0, 1981, 'ratione', 1),
(11, 'Restu Suryatmi', '593925544', 'L', 'Administrasi Jakarta Pusat', '1982-10-04', '0284 0554 202', 'Ds. Thamrin No. 883, Bitung 16261, SulSel', 0, 1982, 'vitae', 1),
(25, 'Lega Jaga Sirait', '59624652', 'L', 'Bontang', '2010-01-26', '(+62) 454 2843 685', 'Psr. Ahmad Dahlan No. 491, Depok 80906, SumSel', 0, 1974, 'quibusdam', 1),
(31, 'Kasim Nainggolan', '609650976', 'L', 'Tangerang', '2011-06-16', '0793 1216 019', 'Psr. Ciumbuleuit No. 512, Sabang 18059, KalTeng', 1, 1987, 'consequuntur', 0),
(6, 'Vera Halimah S.Farm', '615615301', 'P', 'Padangsidempuan', '2015-06-17', '0889 654 090', 'Dk. Monginsidi No. 190, Jayapura 59027, Bali', 0, 1987, 'non', 0),
(3, 'Talia Vicky Agustina M.Pd', '619114001', 'L', 'Prabumulih', '1970-03-03', '(+62) 544 6174 279', 'Dk. Yos No. 277, Palembang 30928, KalTeng', 0, 1980, 'voluptate', 1),
(39, 'Cindy Kasiyah Haryanti', '62594803', 'L', 'Bukittinggi', '2006-07-29', '0261 8682 912', 'Ki. B.Agam 1 No. 341, Cimahi 40000, SumUt', 1, 1985, 'ratione', 1),
(33, 'Kemba Dipa Waluyo S.E.I', '629424152', 'L', 'Bandung', '1984-05-14', '0881 6140 2450', 'Gg. Baing No. 332, Tebing Tinggi 33361, KalUt', 0, 1990, 'ut', 0),
(58, 'Emong Marbun', '629716080', 'P', 'Tangerang', '2019-04-11', '0295 2245 286', 'Dk. Perintis Kemerdekaan No. 714, Kupang 26546, JaTim', 1, 1993, 'inventore', 0),
(57, 'Martaka Balamantri Prasetyo', '639326099', 'L', 'Salatiga', '2015-05-11', '(+62) 821 6390 9514', 'Jln. Bakti No. 12, Blitar 66674, Aceh', 0, 1991, 'in', 1),
(62, 'Jasmin Rahayu', '640736478', 'L', 'Palu', '1982-11-30', '0880 6463 0436', 'Gg. Untung Suropati No. 167, Pariaman 81905, SulTeng', 0, 1983, 'repellendus', 0),
(33, 'Yuni Vanya Fujiati', '642429360', 'L', 'Blitar', '2013-07-10', '(+62) 759 3375 186', 'Jln. Bayam No. 634, Padangpanjang 29249, SulUt', 0, 2001, 'molestiae', 0),
(5, 'Cinta Queen Lestari M.Ak', '65112262', 'L', 'Batu', '1971-12-17', '024 8850 2904', 'Jln. Bagis Utama No. 160, Solok 41544, SulSel', 0, 1995, 'aut', 1),
(25, 'Eman Suwarno', '654319652', 'P', 'Payakumbuh', '1977-08-26', '027 6742 100', 'Ki. Yosodipuro No. 465, Administrasi Jakarta Timur 69077, SumSel', 1, 2000, 'earum', 1),
(35, 'Okto Lukman Halim S.Ked', '663157700', 'P', 'Gorontalo', '1987-07-16', '0609 5396 2098', 'Jr. Dahlia No. 761, Tasikmalaya 86460, SulTra', 1, 2020, 'accusamus', 1),
(42, 'Rafi Labuh Firmansyah S.Ked', '668211347', 'L', 'Tarakan', '2017-09-28', '(+62) 365 2059 7228', 'Dk. Sutami No. 143, Lhokseumawe 32656, SulBar', 0, 1998, 'quaerat', 0),
(40, 'Hana Hesti Agustina', '675741401', 'L', 'Tual', '1992-07-15', '0888 6260 305', 'Psr. Pasirkoja No. 35, Banjarbaru 81568, SulTra', 1, 2007, 'quod', 1),
(51, 'Ian Hidayat', '683151883', 'P', 'Administrasi Jakarta Pusat', '2016-02-11', '(+62) 384 5939 1244', 'Ds. Jaksa No. 911, Bandung 94483, Riau', 1, 2004, 'ducimus', 1),
(62, 'Caket Firmansyah S.H.', '688806274', 'P', 'Palembang', '1972-07-13', '(+62) 898 908 588', 'Psr. Imam Bonjol No. 307, Salatiga 28920, SulBar', 0, 2013, 'repellendus', 1),
(23, 'Septi Haryanti', '708758850', 'L', 'Jambi', '1973-04-28', '(+62) 838 0093 920', 'Kpg. Bak Air No. 537, Subulussalam 87684, KalBar', 1, 1991, 'iusto', 1),
(22, 'Juli Karen Purwanti M.M.', '725255535', 'P', 'Subulussalam', '2009-11-24', '0367 0394 192', 'Jr. Bayan No. 389, Lhokseumawe 34834, SulTra', 1, 2014, 'corporis', 0),
(24, 'Lanjar Siregar', '734088848', 'L', 'Bontang', '1995-01-24', '(+62) 880 6274 8508', 'Ki. Sukajadi No. 233, Pasuruan 58441, SumSel', 0, 2008, 'repudiandae', 0),
(45, 'Drajat Maryadi', '736252462', 'P', 'Binjai', '1998-08-29', '0962 3408 8124', 'Gg. Gedebage Selatan No. 807, Administrasi Jakarta Selatan 96150, Bali', 1, 1971, 'consequuntur', 0),
(35, 'Yessi Mila Purwanti S.E.I', '73934', 'P', 'Sorong', '2014-07-25', '024 7007 6125', 'Ki. Surapati No. 27, Bitung 89636, Papua', 1, 1992, 'consequuntur', 1),
(7, 'Balangga Harja Samosir', '753852512', 'P', 'Pontianak', '1988-04-21', '0245 2589 4318', 'Jr. Baranangsiang No. 800, Pagar Alam 11553, SulBar', 1, 1978, 'dolor', 0),
(38, 'Gandi Sihombing', '755352741', 'L', 'Bandung', '2013-11-16', '0324 0892 758', 'Dk. Bahagia No. 386, Sukabumi 88665, Aceh', 1, 1991, 'omnis', 0),
(10, 'Shakila Mayasari', '76954816', 'P', 'Jayapura', '1972-03-16', '(+62) 611 1895 112', 'Ds. Ters. Kiaracondong No. 806, Tegal 92201, KalSel', 0, 1978, 'repellat', 1),
(16, 'Hardana Anggriawan', '7751877', 'L', 'Banjarmasin', '2012-07-21', '0734 4802 636', 'Kpg. Raden No. 514, Manado 69561, Jambi', 1, 2004, 'quia', 0),
(46, 'Nrima Prayoga', '776766954', 'L', 'Sabang', '2008-12-23', '0993 3182 902', 'Ds. Basudewo No. 891, Pekalongan 18483, Banten', 0, 2017, 'qui', 1),
(26, 'Prima Kusumo', '781646622', 'L', 'Probolinggo', '1996-06-05', '(+62) 27 5624 8382', 'Jln. Panjaitan No. 491, Tebing Tinggi 42746, KalTeng', 0, 1971, 'doloremque', 1),
(5, 'Jaka Hidayat', '783015304', 'L', 'Binjai', '1975-01-28', '0878 0768 593', 'Jr. Baranang Siang Indah No. 53, Tangerang Selatan 19125, Riau', 0, 1992, 'aut', 1),
(7, 'Purwadi Zulkarnain S.Farm', '789136537', 'P', 'Administrasi Jakarta Selatan', '1985-12-10', '(+62) 804 0148 5437', 'Ki. Bhayangkara No. 311, Tual 49092, SulUt', 1, 1982, 'laboriosam', 0),
(45, 'Dalima Melani', '805898385', 'P', 'Administrasi Jakarta Pusat', '1997-10-31', '(+62) 903 8626 0160', 'Jln. Yoga No. 273, Probolinggo 87262, Lampung', 0, 2012, 'nisi', 0),
(27, 'Siska Usamah', '807296325', 'P', 'Surabaya', '1970-04-21', '(+62) 264 3715 035', 'Dk. Raya Setiabudhi No. 958, Banda Aceh 46074, PapBar', 0, 1986, 'nesciunt', 1),
(9, 'Ian Putra S.Pd', '813466314', 'P', 'Magelang', '1980-03-10', '0328 3920 704', 'Kpg. Sudiarto No. 544, Administrasi Jakarta Utara 42542, JaBar', 1, 1999, 'corporis', 1),
(34, 'Jaka Marbun', '815649330', 'P', 'Balikpapan', '1973-09-10', '(+62) 826 5080 5520', 'Gg. Bacang No. 467, Bau-Bau 70341, SulUt', 1, 2012, 'non', 0),
(30, 'Gandewa Wira Simbolon', '816242632', 'L', 'Tangerang Selatan', '1990-02-26', '0861 463 383', 'Psr. Lembong No. 474, Administrasi Jakarta Timur 35605, MalUt', 0, 1986, 'corporis', 1),
(26, 'Halima Usamah', '827933737', 'P', 'Malang', '1978-09-04', '021 6926 385', 'Dk. Pattimura No. 937, Tegal 92600, MalUt', 0, 2009, 'quia', 0),
(16, 'Daru Carub Rajata', '837178005', 'P', 'Medan', '2020-11-13', '(+62) 749 6582 704', 'Jln. Supono No. 721, Manado 62611, PapBar', 0, 1990, 'dolor', 0),
(29, 'Maria Kamaria Pratiwi', '862314940', 'L', 'Binjai', '1979-11-19', '0853 3771 5389', 'Psr. Banceng Pondok No. 763, Semarang 53620, KalUt', 0, 2007, 'quasi', 0),
(57, 'Safina Usamah', '863078807', 'L', 'Solok', '2005-11-23', '(+62) 324 1246 120', 'Jr. Merdeka No. 788, Padangsidempuan 95430, Gorontalo', 0, 1994, 'nisi', 1),
(25, 'Betania Maryati', '87565840', 'P', 'Bengkulu', '1988-10-01', '0207 9210 940', 'Psr. Merdeka No. 791, Tangerang 97478, JaTim', 0, 1988, 'iure', 0),
(55, 'Zahra Salsabila Fujiati', '875857175', 'L', 'Lhokseumawe', '1983-06-07', '(+62) 338 8451 730', 'Dk. K.H. Wahid Hasyim (Kopo) No. 495, Sabang 77406, SulSel', 0, 2015, 'debitis', 0),
(11, 'Nasab Taufan Rajasa', '883778944', 'L', 'Pematangsiantar', '1992-01-13', '0803 1409 2706', 'Psr. Ronggowarsito No. 497, Denpasar 62018, Lampung', 0, 1984, 'ut', 1),
(38, 'Viman Budiyanto', '901114986', 'L', 'Tual', '1995-05-08', '(+62) 25 5140 669', 'Ki. Rumah Sakit No. 244, Pagar Alam 41526, DIY', 1, 1985, 'neque', 0),
(31, 'Michelle Mandasari', '909694890', 'L', 'Palangka Raya', '1993-04-02', '(+62) 905 9155 8954', 'Ki. Pasir Koja No. 596, Palu 42800, Aceh', 1, 1970, 'molestiae', 1),
(59, 'Rahman Mangunsong', '916094032', 'L', 'Pematangsiantar', '1983-10-31', '(+62) 914 2320 516', 'Ds. HOS. Cjokroaminoto (Pasirkaliki) No. 728, Banjar 34531, SumSel', 1, 2005, 'adipisci', 1),
(48, 'Mila Safina Usamah S.Sos', '933431610', 'P', 'Malang', '1974-01-12', '0487 3246 597', 'Ds. Setiabudhi No. 997, Pematangsiantar 91155, DIY', 0, 1980, 'quod', 0),
(41, 'Gaiman Budiyanto', '938521136', 'P', 'Batam', '1983-04-09', '0217 2793 544', 'Psr. Salak No. 209, Binjai 81387, SulTra', 0, 2020, 'ut', 1),
(7, 'Puspa Handayani', '940035546', 'P', 'Tual', '2005-08-23', '(+62) 331 7540 1493', 'Gg. Padang No. 227, Banjarbaru 46190, Papua', 0, 1982, 'voluptate', 0),
(28, 'Eka Kuswandari', '943136384', 'P', 'Administrasi Jakarta Pusat', '1980-06-22', '(+62) 444 9502 5123', 'Gg. Baik No. 272, Pangkal Pinang 73676, SumUt', 0, 1985, 'exercitationem', 1),
(18, 'Fitria Laksmiwati', '96449680', 'P', 'Bitung', '1976-07-05', '(+62) 873 399 319', 'Gg. Jend. A. Yani No. 863, Dumai 57494, Lampung', 0, 1985, 'corporis', 0),
(51, 'Lukita Haryanto S.Sos', '96691124', 'P', 'Jayapura', '2016-02-23', '0595 7918 102', 'Jln. Honggowongso No. 692, Palu 69536, Banten', 0, 2006, 'dignissimos', 0),
(59, 'Najwa Alika Nurdiyanti', '967453646', 'P', 'Ambon', '1971-02-08', '0402 8796 916', 'Jr. Warga No. 244, Bengkulu 86929, Maluku', 1, 1975, 'est', 0),
(28, 'Asirwada Bahuwarna Widodo', '969322058', 'L', 'Probolinggo', '2018-10-04', '0648 1071 6336', 'Dk. Yoga No. 98, Pasuruan 86086, Lampung', 1, 2013, 'dolorem', 0),
(35, 'Galar Putra', '972354215', 'L', 'Probolinggo', '1977-09-10', '0472 5138 1908', 'Jln. Bakau No. 927, Surakarta 69116, JaTim', 1, 1978, 'doloribus', 0),
(60, 'Vivi Oktaviani', '98747034', 'P', 'Yogyakarta', '2013-05-30', '0346 9646 808', 'Kpg. Moch. Yamin No. 237, Cirebon 12471, KalBar', 1, 1982, 'natus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_publikasi`
--

CREATE TABLE `alumni_publikasi` (
  `nim` varchar(12) NOT NULL,
  `id_publikasi` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni_publikasi`
--

INSERT INTO `alumni_publikasi` (`nim`, `id_publikasi`) VALUES
('102076506', 62),
('132735969', 41),
('145143707', 47),
('17884061', 25),
('183050008', 60),
('2007402', 38),
('211353572', 57),
('212863610', 13),
('214099282', 94),
('221810160', 1),
('227564623', 96),
('231097622', 2),
('251779543', 76),
('253423451', 78),
('257986641', 97),
('267552404', 54),
('29430551', 100),
('300171766', 20),
('319492930', 18),
('326462282', 66),
('326533254', 63),
('328214806', 30),
('333118824', 7),
('342887469', 40),
('351682238', 23),
('35220728', 58),
('359282395', 72),
('376315665', 14),
('381210597', 5),
('381544166', 79),
('387443158', 48),
('40029669', 46),
('404990449', 69),
('411779763', 39),
('417134522', 84),
('456243432', 35),
('461303929', 19),
('465335563', 52),
('502447306', 89),
('544695696', 24),
('545559411', 37),
('564058991', 74),
('568014526', 101),
('578849343', 90),
('5853860', 81),
('593925544', 53),
('59624652', 86),
('609650976', 82),
('615615301', 80),
('619114001', 22),
('62594803', 75),
('629424152', 77),
('629716080', 17),
('639326099', 95),
('640736478', 70),
('642429360', 15),
('65112262', 26),
('654319652', 88),
('663157700', 12),
('668211347', 36),
('675741401', 73),
('683151883', 56),
('688806274', 99),
('708758850', 49),
('725255535', 55),
('734088848', 45),
('736252462', 61),
('753852512', 50),
('755352741', 59),
('76954816', 28),
('7751877', 85),
('776766954', 98),
('781646622', 3),
('783015304', 68),
('789136537', 91),
('805898385', 67),
('807296325', 34),
('813466314', 9),
('815649330', 29),
('816242632', 64),
('827933737', 44),
('837178005', 83),
('862314940', 71),
('863078807', 27),
('87565840', 10),
('875857175', 11),
('883778944', 21),
('901114986', 32),
('909694890', 6),
('916094032', 65),
('933431610', 92),
('938521136', 4),
('940035546', 42),
('943136384', 51),
('96449680', 33),
('96691124', 16),
('967453646', 43),
('969322058', 31),
('972354215', 87),
('98747034', 93);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_tempat_kerja`
--

CREATE TABLE `alumni_tempat_kerja` (
  `nim` varchar(12) NOT NULL,
  `id_tempat_kerja` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni_tempat_kerja`
--

INSERT INTO `alumni_tempat_kerja` (`nim`, `id_tempat_kerja`) VALUES
('102076506', 15),
('132735969', 61),
('145143707', 3),
('17884061', 70),
('183050008', 82),
('2007402', 5),
('211353572', 77),
('212863610', 45),
('214099282', 51),
('221810160', 1),
('227564623', 35),
('231097622', 21),
('251779543', 68),
('253423451', 17),
('257986641', 40),
('267552404', 81),
('29430551', 39),
('300171766', 63),
('319492930', 30),
('326462282', 59),
('326533254', 88),
('328214806', 100),
('333118824', 20),
('342887469', 18),
('351682238', 27),
('35220728', 11),
('359282395', 9),
('376315665', 52),
('381210597', 62),
('381544166', 97),
('387443158', 91),
('40029669', 58),
('404990449', 57),
('411779763', 71),
('417134522', 79),
('456243432', 69),
('461303929', 75),
('465335563', 67),
('502447306', 92),
('544695696', 29),
('545559411', 8),
('564058991', 101),
('568014526', 33),
('578849343', 65),
('5853860', 34),
('593925544', 87),
('59624652', 19),
('609650976', 64),
('615615301', 60),
('619114001', 95),
('62594803', 80),
('629424152', 6),
('629716080', 84),
('639326099', 53),
('640736478', 93),
('642429360', 14),
('65112262', 13),
('654319652', 90),
('663157700', 73),
('668211347', 98),
('675741401', 32),
('683151883', 24),
('688806274', 23),
('708758850', 50),
('725255535', 36),
('734088848', 47),
('736252462', 76),
('73934', 42),
('753852512', 54),
('755352741', 10),
('76954816', 16),
('7751877', 2),
('776766954', 38),
('781646622', 31),
('783015304', 89),
('789136537', 56),
('805898385', 44),
('807296325', 86),
('813466314', 96),
('815649330', 12),
('816242632', 74),
('827933737', 85),
('837178005', 22),
('862314940', 7),
('863078807', 72),
('87565840', 83),
('875857175', 28),
('883778944', 25),
('901114986', 46),
('909694890', 26),
('916094032', 55),
('933431610', 49),
('938521136', 48),
('940035546', 43),
('943136384', 4),
('96449680', 99),
('96691124', 66),
('967453646', 94),
('969322058', 78),
('972354215', 37),
('98747034', 41);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author` varchar(100) NOT NULL,
  `id_publikasi` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author`, `id_publikasi`) VALUES
('Ab quia.', 8),
('Aliquam repudiandae.', 8),
('Aliquid similique et.', 8),
('Animi consequuntur.', 8),
('Aperiam error optio.', 8),
('Aperiam temporibus.', 8),
('Architecto consequatur facere.', 8),
('Assumenda unde esse.', 8),
('Aut beatae.', 8),
('Aut est.', 8),
('Aut et omnis.', 8),
('Aut et suscipit.', 8),
('Aut quia.', 8),
('Autem quo.', 8),
('Consectetur consequatur quod.', 8),
('Consequuntur aut sed.', 8),
('Consequuntur pariatur.', 8),
('Culpa perspiciatis.', 8),
('Culpa sed.', 8),
('Delectus eligendi.', 8),
('Deserunt dolorum.', 8),
('Dolor et.', 8),
('Dolore et non.', 8),
('Dolore quas.', 8),
('Dolorem aspernatur.', 8),
('Doloremque quasi.', 8),
('Earum ea.', 8),
('Eius iste.', 8),
('Eius magni ut.', 8),
('Enim et saepe.', 8),
('Est aut.', 8),
('Est dolores.', 8),
('Et debitis.', 8),
('Et illum atque.', 8),
('Et ipsum sed.', 8),
('Et quibusdam molestiae.', 8),
('Eum atque rerum.', 8),
('Ex ut iure.', 8),
('Excepturi aut est.', 8),
('Exercitationem cumque.', 8),
('Exercitationem sed ea.', 8),
('Expedita aspernatur.', 8),
('Expedita sunt error.', 8),
('Hamba Allah', 1),
('Hic consectetur est.', 8),
('Hic labore maxime.', 8),
('Hic suscipit.', 8),
('Illo nobis et.', 8),
('Illum a.', 8),
('In repellat expedita.', 8),
('Incidunt asperiores tempora.', 8),
('Ipsa dolores.', 8),
('Ipsa nam omnis.', 8),
('Ipsum ut.', 8),
('Itaque dolore maxime.', 8),
('Laudantium dolorem.', 8),
('Maxime fugit ex.', 8),
('Minima aliquam in.', 8),
('Modi aut.', 8),
('Natus et velit.', 8),
('Natus mollitia quasi.', 8),
('Nihil occaecati repudiandae.', 8),
('Numquam dicta.', 8),
('Numquam repellat at.', 8),
('Odio quia ducimus.', 8),
('Officiis omnis.', 8),
('Omnis et ea.', 8),
('Omnis iste sint.', 8),
('Placeat ipsa ipsam.', 8),
('Possimus id.', 8),
('Praesentium dolorem et.', 8),
('Praesentium minus.', 8),
('Quae atque.', 8),
('Qui et deserunt.', 8),
('Quia ipsum.', 8),
('Quia omnis est.', 8),
('Quo occaecati.', 8),
('Repellendus aspernatur.', 8),
('Reprehenderit non quis.', 8),
('Sequi autem.', 8),
('Sequi consectetur consequatur.', 8),
('Sint a deleniti.', 8),
('Sit aut facere.', 8),
('Sit cumque occaecati.', 8),
('Sit tempore.', 8),
('Soluta laudantium porro.', 8),
('Totam eum non.', 8),
('Unde beatae.', 8),
('Ut omnis voluptatem.', 8),
('Ut rerum.', 8),
('Ut vel.', 8),
('Velit alias.', 8),
('Veniam voluptas.', 8),
('Vero repellat deserunt.', 8),
('Vero tempora distinctio.', 8),
('Vero ut.', 8),
('Voluptas cum sed.', 8),
('Voluptate impedit nostrum.', 8),
('Voluptatem beatae.', 8),
('Voluptatem sint.', 8);

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

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '62bec2826f422f7ef4246ea7216d3b6a', '2020-12-23 05:38:00'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '2de3757699947e38258b307be2dd45e8', '2020-12-23 05:43:46'),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '44c0536969512ecebafa43b6a5e33309', '2020-12-26 19:19:22'),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'bae7a60e639f14e05b27942363846f5f', '2020-12-28 23:49:38'),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'd64a5d52a3172bf5114c3cbd8dcaa498', '2020-12-29 02:13:36'),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5ba5efb2f9838b2e4474c603153c3579', '2020-12-29 02:34:03'),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5ba5efb2f9838b2e4474c603153c3579', '2020-12-29 02:35:28'),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5ba5efb2f9838b2e4474c603153c3579', '2020-12-29 02:39:19'),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5ba5efb2f9838b2e4474c603153c3579', '2020-12-29 02:40:21'),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'a073fa4933bc98e9a81e044a2948a244', '2020-12-29 02:52:06'),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'a073fa4933bc98e9a81e044a2948a244', '2020-12-29 02:53:28'),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'a073fa4933bc98e9a81e044a2948a244', '2020-12-29 02:55:33'),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'a073fa4933bc98e9a81e044a2948a244', '2020-12-29 02:58:06'),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'a073fa4933bc98e9a81e044a2948a244', '2020-12-29 03:00:26'),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'a073fa4933bc98e9a81e044a2948a244', '2020-12-29 03:03:31'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'eb4528858a66617a1ffa39b67ff283db', '2020-12-29 03:16:57'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '80d36eaea8a640ed5f16da2f8705c27b', '2020-12-30 09:15:07');

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
(6, 'Developer', 'developer');

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
(1, 58),
(1, 65),
(1, 66),
(2, 67),
(2, 68),
(6, 58);

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
(1, '::1', '211810567@stis.ac.id', NULL, '2020-12-23 05:30:55', 0),
(2, '::1', 'admin@admin.com', NULL, '2020-12-23 05:32:39', 0),
(3, '::1', '211810567@stis.ac.id', 2, '2020-12-23 05:38:18', 1),
(4, '::1', 'rifkigustiawan78.rg@gmail.com', 3, '2020-12-23 05:44:02', 1),
(5, '::1', '211810567@stis.ac.id', 2, '2020-12-23 05:53:13', 1),
(6, '::1', 'rifkigustiawan78.rg@gmail.com', 3, '2020-12-23 06:00:55', 1),
(7, '::1', '211810567@stis.ac.id', 2, '2020-12-23 06:01:34', 1),
(8, '::1', '211810567@stis.ac.id', 2, '2020-12-23 07:36:14', 1),
(9, '::1', '211810567@stis.ac.id', 2, '2020-12-23 07:38:51', 1),
(10, '::1', '211810567@stis.ac.id', 2, '2020-12-26 08:06:46', 1),
(11, '::1', '211810567@stis.ac.id', 2, '2020-12-26 08:13:56', 1),
(12, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:04:22', 1),
(13, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:06:55', 1),
(14, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:07:45', 1),
(15, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:08:27', 1),
(16, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:09:55', 1),
(17, '::1', '211810567@stis.ac.id', NULL, '2020-12-26 10:12:43', 0),
(18, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:12:52', 1),
(19, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:15:31', 1),
(20, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:22:51', 1),
(21, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:24:31', 1),
(22, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:25:27', 1),
(23, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:25:41', 1),
(24, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:26:31', 1),
(25, '::1', 'admin@admin.com', NULL, '2020-12-26 10:32:36', 0),
(26, '::1', '211810567@stis.ac.id', NULL, '2020-12-26 10:38:20', 0),
(27, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:38:27', 1),
(28, '::1', '211810567@stis.ac.id', 2, '2020-12-26 10:57:15', 1),
(29, '::1', '211810567@stis.ac.id', 2, '2020-12-26 11:00:31', 1),
(30, '::1', '211810567@stis.ac.id', 2, '2020-12-26 12:09:14', 1),
(31, '::1', '211810567@stis.ac.id', 2, '2020-12-26 12:10:54', 1),
(32, '::1', '211810567@stis.ac.id', 2, '2020-12-26 12:11:02', 1),
(33, '::1', 'anini@gmail.com', NULL, '2020-12-26 19:15:20', 0),
(34, '::1', 'anini@gmail.com', NULL, '2020-12-26 19:16:06', 0),
(35, '::1', '211810567@stis.ac.id', 2, '2020-12-26 19:16:13', 1),
(36, '::1', '211810567@stis.ac.id', NULL, '2020-12-27 03:20:36', 0),
(37, '::1', '211810567@stis.ac.id', 2, '2020-12-27 03:20:42', 1),
(38, '::1', '211810567@stis.ac.id', 2, '2020-12-27 06:12:44', 1),
(39, '::1', '211810567@stis.ac.id', NULL, '2020-12-27 11:40:32', 0),
(40, '::1', '211810567@stis.ac.id', 2, '2020-12-27 11:40:42', 1),
(41, '::1', '211810567@stis.ac.id', 2, '2020-12-27 11:42:51', 1),
(42, '::1', '211810567@stis.ac.id', 2, '2020-12-27 11:45:13', 1),
(43, '::1', '211810567@stis.ac.id', NULL, '2020-12-27 11:48:18', 0),
(44, '::1', '211810567@stis.ac.id', NULL, '2020-12-27 11:48:26', 0),
(45, '::1', '211810567@stis.ac.id', 2, '2020-12-27 11:48:35', 1),
(46, '::1', '211810567@stis.ac.id', 2, '2020-12-27 11:50:23', 1),
(47, '::1', '211810567@stis.ac.id', 2, '2020-12-27 11:50:44', 1),
(48, '::1', '211810567@stis.ac.id', 2, '2020-12-27 20:14:16', 1),
(49, '::1', '211810567@stis.ac.id', 2, '2020-12-27 20:18:36', 1),
(50, '::1', '211810567@stis.ac.id', 2, '2020-12-27 20:18:46', 1),
(51, '::1', '211810567@stis.ac.id', 2, '2020-12-27 20:20:39', 1),
(52, '::1', '211810567@stis.ac.id', 2, '2020-12-27 20:23:19', 1),
(53, '::1', '211810567@stis.ac.id', 2, '2020-12-28 04:45:09', 1),
(54, '::1', '211810567@stis.ac.id', 2, '2020-12-28 05:19:38', 1),
(55, '::1', '211810567@stis.ac.id', 2, '2020-12-28 05:39:42', 1),
(56, '::1', '211810567@stis.ac.id', 2, '2020-12-28 05:42:36', 1),
(57, '::1', '211810567@stis.ac.id', 2, '2020-12-28 06:14:59', 1),
(58, '::1', '211810567@stis.ac.id', 2, '2020-12-28 10:28:49', 1),
(59, '::1', '211810567@stis.ac.id', 2, '2020-12-28 10:46:30', 1),
(60, '::1', '211810567', NULL, '2020-12-28 21:00:42', 0),
(61, '::1', '211810567@stis.ac.id', 2, '2020-12-28 21:01:02', 1),
(62, '::1', '211810567@stis.ac.id', 2, '2020-12-29 03:04:55', 1),
(63, '::1', '211810567@stis.ac.id', 2, '2020-12-29 03:06:23', 1),
(64, '::1', '211810567@stis.ac.id', 2, '2020-12-29 03:18:45', 1),
(65, '::1', '211810567@stis.ac.id', 2, '2020-12-29 21:44:53', 1),
(66, '::1', '211810567@stis.ac.id', 2, '2020-12-29 23:23:52', 1),
(67, '::1', '211810567@stis.ac.id', 2, '2020-12-29 23:54:34', 1),
(68, '::1', '211810567@stis.ac.id', 2, '2020-12-30 00:52:15', 1),
(69, '::1', '211810567@stis.ac.id', 2, '2020-12-30 04:05:44', 1),
(70, '::1', '211810567@stis.ac.id', 2, '2020-12-30 04:20:06', 1),
(71, '::1', '211810567@stis.ac.id', 2, '2020-12-30 05:49:10', 1),
(72, '::1', '211810567@stis.ac.id', NULL, '2020-12-30 05:56:57', 0),
(73, '::1', '211810567@stis.ac.id', 2, '2020-12-30 05:57:11', 1),
(74, '::1', '211810567@stis.ac.id', 2, '2020-12-30 05:58:00', 1),
(75, '::1', '211810567@stis.ac.id', 2, '2020-12-30 05:58:23', 1),
(76, '::1', '211810567@stis.ac.id', 2, '2020-12-30 05:59:54', 1),
(77, '::1', '211810567@stis.ac.id', 2, '2020-12-30 06:00:06', 1),
(78, '::1', '211810567@stis.ac.id', 2, '2020-12-30 06:00:22', 1),
(79, '::1', '211810567@stis.ac.id', 2, '2020-12-30 06:01:36', 1),
(80, '::1', '211810567@stis.ac.id', 2, '2020-12-30 06:02:16', 1),
(81, '::1', '211810567@stis.ac.id', 2, '2020-12-30 06:04:21', 1),
(82, '::1', '211810567@stis.ac.id', 2, '2020-12-30 06:06:34', 1),
(83, '::1', '211810567@stis.ac.id', 2, '2020-12-30 06:19:36', 1),
(84, '::1', '211810567@stis.ac.id', 2, '2020-12-30 08:20:51', 1),
(85, '::1', 'rifkigustiawan78@gmail.com', NULL, '2020-12-30 09:15:25', 0),
(86, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2020-12-30 09:15:39', 1),
(87, '::1', '211810567@stis.ac.id', 2, '2020-12-30 09:16:02', 1),
(88, '::1', 'rifkigustiawan78.rg@gmail.com', NULL, '2020-12-30 09:16:52', 0),
(89, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2020-12-30 09:17:07', 1),
(90, '::1', 'rifkigustiawan78.rg@gmail.com', NULL, '2021-01-13 05:56:45', 0),
(91, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 05:57:37', 1),
(92, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 08:32:05', 1),
(93, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 08:39:58', 1),
(94, '::1', 'rifkigustiawan78.rg@gmail.com', NULL, '2021-01-13 09:59:57', 0),
(95, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 10:00:48', 1),
(96, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 10:04:35', 1),
(97, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 10:44:28', 1),
(98, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 11:04:56', 1),
(99, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 11:20:31', 1),
(100, '::1', 'Rifkigustiawan78.rg@gmail.com', NULL, '2021-01-13 21:43:43', 0),
(101, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 21:43:50', 1),
(102, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-13 22:42:55', 1),
(103, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-14 02:47:55', 1),
(104, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-14 07:29:46', 1),
(105, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-15 02:55:56', 1),
(106, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-15 09:03:01', 1),
(107, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 03:11:11', 1),
(108, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 08:31:36', 1),
(109, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 08:32:52', 1),
(110, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 09:21:31', 1),
(111, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 09:23:23', 1),
(112, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 09:26:56', 1),
(113, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 09:28:00', 1),
(114, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 09:30:05', 1),
(115, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 09:44:57', 1),
(116, '::1', 'Rifkigustiawan78.rg@gmail.com', NULL, '2021-01-16 09:45:08', 0),
(117, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-16 09:45:16', 1),
(118, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-17 05:04:37', 1),
(119, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-20 08:06:02', 1),
(120, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-20 10:59:24', 1),
(121, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-20 22:14:36', 1),
(122, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-20 23:19:45', 1),
(123, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-21 05:06:54', 1),
(124, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-21 07:36:25', 1),
(125, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-01-23 12:04:12', 1),
(126, '::1', 'dummy@stis.ac.id', NULL, '2021-02-01 04:25:47', 0),
(127, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-02-01 04:26:26', 1),
(128, '::1', 'dummy@stis.ac.id', 65, '2021-02-01 04:27:17', 1),
(129, '::1', 'dummy@stis.ac.id', 65, '2021-02-01 04:30:28', 1),
(130, '::1', 'rifkigustiawan78.rg@gmail.com', NULL, '2021-02-03 06:45:04', 0),
(131, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-02-03 06:45:16', 1),
(132, '::1', '211810567@stis.ac.id', 66, '2021-02-03 07:01:49', 1),
(133, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-02-03 07:02:18', 1),
(134, '::1', '211810567@stis.ac.id', 66, '2021-02-03 07:03:07', 1),
(135, '::1', 'rifkigustiawan78.rg@gmail.com', NULL, '2021-02-03 08:49:08', 0),
(136, '::1', 'rifkigustiawan78.rg@gmail.com', NULL, '2021-02-03 08:49:08', 0),
(137, '::1', 'rifkigustiawan78.rg@gmail.com', 58, '2021-02-03 08:49:32', 1),
(138, '::1', '211810567@stis.ac.id', 66, '2021-02-03 08:57:09', 1);

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

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5b4325ba552de1e079e89fe9212d11f9', '2020-12-27 11:36:13'),
(2, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5b4325ba552de1e079e89fe9212d11f9', '2020-12-27 11:36:33'),
(3, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5b4325ba552de1e079e89fe9212d11f9', '2020-12-27 11:38:09'),
(4, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5b4325ba552de1e079e89fe9212d11f9', '2020-12-27 11:38:11'),
(5, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '5b4325ba552de1e079e89fe9212d11f9', '2020-12-27 11:38:45'),
(6, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '8da682b56c30f2632add1772f19aa384', '2020-12-28 05:16:23'),
(7, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '8da682b56c30f2632add1772f19aa384', '2020-12-28 05:16:26'),
(8, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '8da682b56c30f2632add1772f19aa384', '2020-12-28 05:17:04'),
(9, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '8da682b56c30f2632add1772f19aa384', '2020-12-28 05:17:44'),
(10, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '8da682b56c30f2632add1772f19aa384', '2020-12-28 05:17:56'),
(11, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '8da682b56c30f2632add1772f19aa384', '2020-12-28 05:18:15'),
(12, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', '0e740f4c6d0918ead05356d468211c9b', '2020-12-28 05:20:35'),
(13, '211810567@stis.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'd4f9d5c728da1153b598a67f0f7a3bb3', '2020-12-28 05:21:15');

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
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `crud_id` int(1) UNSIGNED NOT NULL,
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
-- Table structure for table `groups_access`
--

CREATE TABLE `groups_access` (
  `access_group_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED DEFAULT NULL,
  `menu_access_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups_access`
--

INSERT INTO `groups_access` (`access_group_id`, `group_id`, `menu_access_id`) VALUES
(35, 2, 2),
(36, 6, 31),
(37, 1, 1),
(38, 1, 2),
(39, 1, 3),
(40, 1, 4),
(41, 1, 5),
(42, 1, 6),
(43, 1, 7),
(44, 1, 8),
(49, 1, 13),
(50, 1, 14),
(51, 1, 15),
(52, 1, 16),
(53, 1, 17),
(54, 1, 18),
(55, 1, 19),
(56, 1, 20),
(57, 1, 21),
(58, 1, 22),
(59, 1, 23),
(60, 1, 24),
(61, 1, 26),
(62, 1, 28),
(63, 1, 29),
(64, 1, 30),
(65, 1, 31),
(66, 1, 32),
(67, 2, 1),
(71, 1, 33),
(72, 1, 10),
(73, 1, 9),
(74, 1, 11),
(75, 1, 12);

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
(10, 'Setting Aplikasi', 'fas fa-user-shield');

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
(1, '2021-01-16-124254', 'App\\Database\\Migrations\\AlumniDB', 'default', 'App', 1612621012, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) UNSIGNED NOT NULL,
  `jenjang` varchar(2) NOT NULL,
  `universitas` varchar(16) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `judul_tulisan` varchar(100) NOT NULL,
  `nim` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `jenjang`, `universitas`, `program_studi`, `tahun_lulus`, `tahun_masuk`, `judul_tulisan`, `nim`) VALUES
(1, 'S2', 'Harvard Universi', 'Computer Science', 2013, 1994, 'Ini adalah Judul Tulisan', '221810160'),
(2, 'S2', 'Sequi beatae mag', 'Sint et.', 2020, 2003, 'Itaque numquam consequuntur incidunt dolorem.', '776766954'),
(3, 'S2', 'Maiores numquam ', 'Voluptas rem cupiditate.', 2005, 1983, 'Non et eos facere consequuntur sit.', '972354215'),
(4, 'S1', 'Natus omnis nisi', 'Quia deserunt.', 2005, 1987, 'Placeat distinctio occaecati maiores cum id.', '73934'),
(5, 'S1', 'Neque itaque.', 'Eius suscipit rerum.', 2015, 1988, 'Aut asperiores est voluptatem voluptatem nobis.', '827933737'),
(6, 'S2', 'Dolor eos volupt', 'Consectetur quae.', 2013, 1999, 'Vero deleniti esse iusto nemo id nisi.', '417134522'),
(7, 'S2', 'Quia fugit dolor', 'Sed magnam quibusdam.', 1993, 2009, 'Porro tempora rerum sunt nisi blanditiis deleniti.', '404990449'),
(8, 'S3', 'Iure quis dolor.', 'Ut doloribus harum.', 1989, 1971, 'Maxime corporis error doloribus sint ipsa.', '813466314'),
(9, 'S2', 'Enim et.', 'Omnis nesciunt eius.', 1995, 2019, 'Placeat explicabo consequatur ducimus ut ea.', '708758850'),
(10, 'S3', 'Odio sit omnis e', 'Eaque repellendus qui.', 1970, 2004, 'Sequi sed ut sit voluptate dolorum.', '640736478'),
(11, 'S1', 'Omnis dignissimo', 'Odio doloribus.', 1994, 2011, 'Voluptatum alias exercitationem ut rem ex ipsum.', '411779763'),
(12, 'S2', 'Itaque eius mini', 'Quibusdam quis qui.', 1985, 1975, 'Ut voluptatum ab deserunt ea aut.', '319492930'),
(13, 'S1', 'Dignissimos repe', 'Expedita et.', 2006, 2003, 'Et harum dolorem aut dignissimos.', '969322058'),
(14, 'S3', 'Eos beatae nihil', 'Accusantium magnam.', 1972, 1984, 'Quia fugit consequatur voluptatem qui.', '326533254'),
(15, 'S1', 'Harum cum ration', 'Molestias tenetur expedita.', 1997, 2007, 'Ut eos excepturi nemo.', '863078807'),
(16, 'S3', 'Vel accusantium ', 'Dolorem quod.', 1985, 1971, 'Aliquam odit qui et dicta.', '333118824'),
(17, 'S3', 'Maxime tenetur q', 'Sed in.', 2015, 1978, 'Rerum sit est soluta et animi facilis.', '132735969'),
(18, 'S3', 'Harum autem qui.', 'Illum architecto doloribus.', 1978, 1994, 'Esse in cupiditate iusto recusandae.', '98747034'),
(19, 'S3', 'Eum quam labore.', 'Tempore nihil.', 2009, 1991, 'Magnam unde cumque dolorem nemo.', '755352741'),
(20, 'S1', 'Sit sed laborios', 'Minus harum.', 1986, 1979, 'Excepturi aperiam iure laboriosam cum facilis fuga.', '901114986'),
(21, 'S1', 'Voluptas consequ', 'Qui omnis eum.', 2014, 2010, 'Maxime vero quia repellat mollitia.', '411779763'),
(22, 'S1', 'Deleniti dolor q', 'Maxime vel est.', 1998, 2005, 'Maiores provident veritatis nesciunt sed.', '725255535'),
(23, 'S2', 'Quod commodi eli', 'Quidem pariatur.', 1998, 2021, 'Alias qui officia alias nemo molestiae.', '683151883'),
(24, 'S3', 'Consequatur rati', 'Possimus et.', 1973, 1991, 'Ut quia consequatur qui atque maiores.', '781646622'),
(25, 'S1', 'Ut molestiae rem', 'Eligendi quasi.', 1971, 2014, 'Cumque blanditiis id omnis quia officiis veniam.', '29430551'),
(26, 'S3', 'Est necessitatib', 'Voluptatum dolore.', 2010, 1990, 'Dignissimos rerum qui ut.', '212863610'),
(27, 'S1', 'Eaque dicta accu', 'Sit est provident.', 2017, 1999, 'Maiores et optio qui ex voluptas.', '901114986'),
(28, 'S2', 'Nemo sit nihil u', 'Quis a ipsam.', 1999, 2009, 'Rerum est enim totam molestias esse.', '227564623'),
(29, 'S3', 'Eaque impedit la', 'Provident voluptatem esse.', 1987, 1993, 'Qui impedit nostrum tenetur nihil velit.', '456243432'),
(30, 'S1', 'Quia fugit quo i', 'Quas veniam ducimus.', 1986, 2015, 'Laudantium sapiente dolorem placeat praesentium ullam.', '544695696'),
(31, 'S2', 'Facilis ab earum', 'Neque voluptas.', 2001, 1987, 'Rerum enim ut sunt id.', '231097622'),
(32, 'S2', 'Tempore dicta et', 'Explicabo earum.', 1999, 2021, 'Consequatur commodi repellat voluptas eum.', '96691124'),
(33, 'S2', 'Ut rerum eos.', 'Doloremque fuga magni.', 2005, 2004, 'Minus nostrum tempora natus eum ut enim.', '725255535'),
(34, 'S3', 'Omnis aspernatur', 'Numquam cumque aut.', 1978, 1971, 'Sunt enim pariatur magni occaecati tenetur ut.', '805898385'),
(35, 'S2', 'Aliquam accusamu', 'Incidunt voluptatem.', 2000, 1986, 'Sed impedit eius nesciunt totam dolorum non.', '568014526'),
(36, 'S2', 'Magnam quidem ip', 'Est laudantium natus.', 1986, 1970, 'Officiis eveniet nesciunt quis et sit.', '815649330'),
(37, 'S1', 'Repudiandae nece', 'Est dicta.', 2016, 1989, 'Aperiam tenetur repellat consequatur quos dolor.', '456243432'),
(38, 'S2', 'Aperiam labore e', 'Maxime et.', 2012, 1996, 'Labore nisi animi voluptatem est.', '328214806'),
(39, 'S3', 'Dignissimos nequ', 'Voluptas eum amet.', 1988, 2004, 'Ut debitis dolorum omnis eum quo fugiat.', '875857175'),
(40, 'S3', 'Dolores corporis', 'Qui itaque.', 1981, 1994, 'Incidunt saepe esse perspiciatis ea.', '102076506'),
(41, 'S3', 'Pariatur qui.', 'Repellendus fugit.', 1979, 2011, 'Rerum qui ea eos a.', '96449680'),
(42, 'S3', 'Quasi natus.', 'Suscipit in.', 1984, 2018, 'Quisquam inventore quae magnam quam impedit.', '326533254'),
(43, 'S2', 'Corrupti invento', 'Impedit quibusdam asperiores.', 2013, 2011, 'At repellendus velit quas mollitia.', '725255535'),
(44, 'S3', 'Ut vel.', 'Sit et nemo.', 2013, 2007, 'Modi unde enim quas et doloribus.', '683151883'),
(45, 'S1', 'Et porro ea dolo', 'Minus sunt iure.', 1985, 1994, 'Hic aut impedit quasi.', '59624652'),
(46, 'S1', 'Et corporis et.', 'Voluptatem deserunt.', 1976, 1984, 'Harum ut magni corporis quae a.', '29430551'),
(47, 'S3', 'Voluptas provide', 'Quis veritatis.', 1970, 2013, 'Pariatur voluptas est ducimus iste non.', '938521136'),
(48, 'S3', 'Nesciunt iusto i', 'Esse dolorum.', 2015, 1986, 'Vel et sit officiis debitis.', '663157700'),
(49, 'S1', 'Ut possimus quas', 'Sunt magnam.', 2002, 2019, 'Sunt similique possimus error eos.', '972354215'),
(50, 'S2', 'Earum quibusdam ', 'Vero veniam.', 1987, 1974, 'Delectus officia aut esse et ipsa numquam.', '862314940'),
(51, 'S2', 'Omnis ullam nihi', 'Qui sint.', 1980, 1973, 'Eos odit libero et at soluta.', '456243432'),
(52, 'S1', 'Voluptatem volup', 'Voluptas quidem eaque.', 1987, 1980, 'Ut aut dolor ipsa ut dolorum fugiat.', '7751877'),
(53, 'S1', 'Unde voluptatem ', 'Voluptatem omnis.', 1983, 1977, 'Consequatur qui voluptatem laboriosam mollitia quasi rem.', '333118824'),
(54, 'S1', 'Ea similique.', 'Dolor laboriosam voluptatibus.', 2005, 1975, 'Tempore fugiat dolorum eos cupiditate vel.', '668211347'),
(55, 'S1', 'Saepe asperiores', 'Enim commodi.', 2009, 2018, 'Ea voluptatibus eveniet ducimus.', '933431610'),
(56, 'S3', 'Nemo aliquid sin', 'Autem sit.', 1982, 2019, 'Sit ut quasi voluptatum consectetur sed.', '783015304'),
(57, 'S2', 'Qui non autem ip', 'Quasi ad.', 1992, 2015, 'Dolore soluta quae quo ex.', '776766954'),
(58, 'S2', 'Quaerat ut eos d', 'Quasi dignissimos maxime.', 2003, 1970, 'Et natus deserunt dignissimos.', '98747034'),
(59, 'S3', 'Esse ut et.', 'Debitis quod at.', 1998, 1972, 'Repellendus corporis corporis fugit voluptatem provident culpa.', '267552404'),
(60, 'S3', 'Et qui recusanda', 'Non atque enim.', 2012, 1984, 'Illum quis qui distinctio.', '319492930'),
(61, 'S3', 'Dolore sit ex ab', 'Sit fuga.', 1988, 2019, 'Mollitia provident delectus at.', '359282395'),
(62, 'S1', 'Aut id laboriosa', 'Ipsum dolor.', 2004, 1989, 'Eos deleniti voluptates molestias suscipit excepturi doloremque.', '883778944'),
(63, 'S3', 'Et beatae dolore', 'Modi ullam illo.', 1994, 1983, 'Enim provident eius earum ab.', '351682238'),
(64, 'S3', 'Iure quibusdam e', 'Et rem.', 1979, 2008, 'Fugit autem modi ab delectus.', '807296325'),
(65, 'S1', 'Blanditiis exerc', 'Dolore quaerat voluptatibus.', 2014, 1994, 'Commodi maxime perferendis commodi magni debitis voluptatem.', '221810160'),
(66, 'S2', 'Et enim rem quis', 'Alias et.', 2006, 1970, 'Non sit culpa labore.', '87565840'),
(67, 'S3', 'Doloribus ut har', 'Sunt et repellat.', 2000, 1998, 'Placeat earum similique beatae porro.', '609650976'),
(68, 'S3', 'Quis deserunt mi', 'Temporibus necessitatibus rerum.', 2013, 1998, 'Eum enim provident nesciunt et.', '883778944'),
(69, 'S2', 'Pariatur omnis s', 'Aut minima neque.', 1999, 1988, 'Soluta nihil ut dolor aut.', '326533254'),
(70, 'S2', 'Beatae incidunt ', 'Similique rem.', 2005, 1996, 'Tempora esse doloribus nobis voluptatem.', '755352741'),
(71, 'S2', 'Minus nostrum co', 'Voluptatem quae.', 2015, 1993, 'Quia laudantium repellat laborum dolorum omnis.', '212863610'),
(72, 'S1', 'Incidunt cumque ', 'Omnis odit.', 2000, 2014, 'Et quisquam est nisi quisquam ea.', '629716080'),
(73, 'S2', 'Assumenda accusa', 'Sequi et velit.', 1999, 1987, 'Velit id est sed quia in aspernatur.', '736252462'),
(74, 'S1', 'Tempora voluptas', 'Soluta dolorem quis.', 1993, 1970, 'Autem deserunt inventore velit ut impedit.', '916094032'),
(75, 'S2', 'Et in labore.', 'Voluptatem provident.', 1999, 1993, 'Animi et quis nam.', '972354215'),
(76, 'S1', 'Omnis officiis.', 'Et placeat.', 1974, 2005, 'Recusandae at nulla voluptate minus.', '640736478'),
(77, 'S1', 'Perspiciatis non', 'Inventore quam eum.', 2015, 1997, 'Rerum sit et nobis eum sint.', '5853860'),
(78, 'S3', 'Est quia nulla n', 'Voluptas aliquid.', 1990, 1986, 'Ea est dignissimos odio quas.', '257986641'),
(79, 'S1', 'Est voluptatibus', 'Nihil totam similique.', 2014, 1992, 'Ut deserunt sed velit.', '214099282'),
(80, 'S2', 'Reprehenderit ex', 'Numquam facere.', 1971, 2006, 'Dolorem aut omnis architecto.', '465335563'),
(81, 'S3', 'Sed porro facili', 'Sed et.', 1998, 2003, 'Eius quasi tenetur illum qui vero.', '381210597'),
(82, 'S1', 'Voluptatibus occ', 'Sed aut et.', 1983, 1982, 'Cum aut incidunt maiores.', '837178005'),
(83, 'S3', 'In minus volupta', 'Illo odio.', 1974, 1994, 'Voluptas nemo non consectetur autem saepe.', '59624652'),
(84, 'S3', 'Facere dicta nob', 'Perspiciatis ut iste.', 2016, 2005, 'Voluptatem sit aut assumenda ea.', '351682238'),
(85, 'S1', 'Ab adipisci mole', 'Et fugiat.', 1980, 1989, 'Minima iure sit voluptatem.', '29430551'),
(86, 'S3', 'Expedita et dolo', 'Facilis molestiae quibusdam.', 2001, 1993, 'Voluptas voluptatem non aut velit non saepe.', '132735969'),
(87, 'S2', 'Qui sunt quia ex', 'Expedita quaerat aspernatur.', 2015, 1974, 'Fugit quidem consequuntur molestiae sapiente.', '862314940'),
(88, 'S2', 'Tempora deleniti', 'Repellendus quibusdam.', 1974, 1995, 'Dignissimos est similique itaque ipsam.', '351682238'),
(89, 'S1', 'Enim nam aut exc', 'Vel sed dicta.', 1988, 1988, 'Ea aut aliquam repellat.', '863078807'),
(90, 'S2', 'Et dolor aut rer', 'Et atque tempora.', 2007, 1981, 'Impedit voluptatem veniam minima beatae porro.', '221810160'),
(91, 'S3', 'Est fugiat ut od', 'Voluptas sit aut.', 1993, 1991, 'Accusantium maxime magni veniam.', '381210597'),
(92, 'S2', 'Sed est quam.', 'Eum corporis.', 1973, 2001, 'Dolorem accusantium ipsum non tempora molestiae quasi.', '568014526'),
(93, 'S1', 'Eos voluptates s', 'Et maxime quia.', 1981, 1982, 'Culpa impedit aut autem inventore.', '654319652'),
(94, 'S1', 'Alias eum aut.', 'Alias esse in.', 1970, 1993, 'Hic ullam labore eligendi eum velit.', '545559411'),
(95, 'S1', 'Quos laboriosam ', 'Quod sint ut.', 1997, 1997, 'Culpa omnis quo voluptates.', '564058991'),
(96, 'S2', 'Amet rerum repud', 'Earum optio doloremque.', 2012, 2018, 'Ab id id soluta cum.', '593925544'),
(97, 'S3', 'Velit eos dolore', 'Aut totam.', 1999, 1976, 'Eveniet velit rerum officia quibusdam rerum officia.', '29430551'),
(98, 'S2', 'Eum debitis reic', 'Quod tenetur.', 1970, 1999, 'Ut dolorem deserunt iste velit ut ipsum.', '972354215'),
(99, 'S2', 'Consequatur quas', 'Optio quisquam rerum.', 2010, 2015, 'Voluptatem libero molestiae voluptas dolor.', '183050008'),
(100, 'S3', 'Debitis molestia', 'Assumenda labore.', 1973, 2014, 'Id et aliquam quae qui beatae.', '221810160'),
(101, 'S2', 'Voluptatem a ten', 'Quia ut.', 2020, 1997, 'Iste cum dicta est esse.', '816242632');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) UNSIGNED NOT NULL,
  `nama_prestasi` varchar(100) DEFAULT NULL,
  `tahun_prestasi` year(4) DEFAULT NULL,
  `nim` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `nama_prestasi`, `tahun_prestasi`, `nim`) VALUES
(1, 'Juara 1 Dummy', 1982, '221810160'),
(2, 'consectetur', 1975, '132735969'),
(3, 'eum', 1989, '668211347'),
(4, 'incidunt', 2004, '29430551'),
(5, 'beatae', 1975, '381544166'),
(6, 'quo', 2007, '688806274'),
(7, 'qui', 1998, '251779543'),
(8, 'qui', 1982, '502447306'),
(9, 'temporibus', 1999, '863078807'),
(10, 'iste', 1984, '376315665'),
(11, 'nam', 2008, '781646622'),
(12, 'eligendi', 1994, '411779763'),
(13, 'quia', 1970, '183050008'),
(14, 'nihil', 1998, '87565840'),
(15, 'quo', 1975, '619114001'),
(16, 'enim', 2001, '102076506'),
(17, 'nesciunt', 1982, '663157700'),
(18, 'aut', 1991, '640736478'),
(19, 'et', 1980, '708758850'),
(20, 'beatae', 1976, '875857175'),
(21, 'blanditiis', 1971, '211353572'),
(22, 'sunt', 2005, '300171766'),
(23, 'veniam', 1977, '938521136'),
(24, 'quaerat', 2006, '776766954'),
(25, 'perferendis', 1993, '381210597'),
(26, 'facilis', 2005, '381210597'),
(27, 'rerum', 1994, '227564623'),
(28, 'officia', 1998, '351682238'),
(29, 'occaecati', 2014, '212863610'),
(30, 'explicabo', 2010, '805898385'),
(31, 'nesciunt', 2004, '7751877'),
(32, 'possimus', 1975, '404990449'),
(33, 'aliquid', 2005, '251779543'),
(34, 'et', 2018, '333118824'),
(35, 'cumque', 1995, '359282395'),
(36, 'ducimus', 2006, '2007402'),
(37, 'rerum', 1980, '465335563'),
(38, 'architecto', 1985, '98747034'),
(39, 'temporibus', 1973, '815649330'),
(40, 'consectetur', 2001, '328214806'),
(41, 'rerum', 2019, '376315665'),
(42, 'eveniet', 1993, '267552404'),
(43, 'voluptatum', 1998, '5853860'),
(44, 'nisi', 1981, '253423451'),
(45, 'ad', 2018, '7751877'),
(46, 'numquam', 2007, '629424152'),
(47, 'velit', 2020, '98747034'),
(48, 'non', 1992, '940035546'),
(49, 'quos', 1971, '319492930'),
(50, 'laborum', 1994, '916094032'),
(51, 'ea', 2019, '214099282'),
(52, 'tenetur', 1996, '7751877'),
(53, 'illo', 2012, '883778944'),
(54, 'voluptas', 1986, '943136384'),
(55, 'ipsum', 2004, '654319652'),
(56, 'cupiditate', 2005, '328214806'),
(57, 'voluptas', 2006, '221810160'),
(58, 'et', 2017, '593925544'),
(59, 'cupiditate', 1996, '145143707'),
(60, 'expedita', 1980, '96691124'),
(61, 'ipsum', 1997, '663157700'),
(62, 'laborum', 2007, '753852512'),
(63, 'soluta', 2003, '593925544'),
(64, 'vel', 2012, '62594803'),
(65, 'rerum', 2015, '734088848'),
(66, 'nisi', 2020, '333118824'),
(67, 'architecto', 2002, '629424152'),
(68, 'eveniet', 2013, '943136384'),
(69, 'dolores', 1989, '943136384'),
(70, 'sit', 1988, '411779763'),
(71, 'quas', 1971, '76954816'),
(72, 'et', 2004, '789136537'),
(73, 'nisi', 2011, '807296325'),
(74, 'saepe', 2016, '62594803'),
(75, 'rerum', 2018, '404990449'),
(76, 'dolores', 1984, '359282395'),
(77, 'ipsam', 2007, '7751877'),
(78, 'ut', 2016, '7751877'),
(79, 'perspiciatis', 1985, '465335563'),
(80, 'ut', 2019, '73934'),
(81, 'voluptas', 2012, '29430551'),
(82, 'voluptas', 1992, '145143707'),
(83, 'consequatur', 1996, '465335563'),
(84, 'aperiam', 1998, '578849343'),
(85, 'vitae', 2007, '17884061'),
(86, 'corrupti', 1973, '629716080'),
(87, 'aut', 1996, '251779543'),
(88, 'in', 1983, '736252462'),
(89, 'itaque', 2007, '688806274'),
(90, 'in', 2014, '933431610'),
(91, 'quos', 2018, '837178005'),
(92, 'excepturi', 2005, '73934'),
(93, 'asperiores', 2008, '933431610'),
(94, 'omnis', 2008, '5853860'),
(95, 'mollitia', 2019, '619114001'),
(96, 'doloremque', 2005, '675741401'),
(97, 'consequatur', 1990, '619114001'),
(98, 'vero', 1986, '969322058'),
(99, 'adipisci', 2012, '253423451'),
(100, 'officiis', 2015, '5853860'),
(101, 'quo', 1980, '5853860');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id_publikasi` int(11) UNSIGNED NOT NULL,
  `topik` varchar(45) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `publisher` varchar(25) NOT NULL,
  `tanggal_disahkan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id_publikasi`, `topik`, `judul`, `deskripsi`, `publisher`, `tanggal_disahkan`) VALUES
(1, 'Random', 'Publikasi ngadi ngadi', 'Sunt repudiandae enim laudantium soluta nostrum ipsam distinctio eius.', 'rerum', '2007-06-07'),
(2, 'aut', 'Quo et pariatur autem.', 'Dolores veniam id culpa ea officiis molestiae perspiciatis at.', 'laboriosam', '1987-12-31'),
(3, 'repellendus', 'A repellat quae.', 'Quibusdam fuga quo sed magnam.', 'facilis', '1994-07-23'),
(4, 'et', 'Rerum totam omnis ut.', 'Alias nesciunt ea ut deleniti.', 'pariatur', '2003-12-30'),
(5, 'beatae', 'Totam voluptates voluptatum.', 'Incidunt consectetur quos molestiae.', 'quas', '1997-07-27'),
(6, 'doloribus', 'Quisquam velit facilis maxime tempore.', 'Quod vero quaerat consequatur animi aut est mollitia.', 'perferendis', '2008-07-20'),
(7, 'quo', 'Ab suscipit quis odit.', 'Qui dolores tempore eum iste assumenda.', 'sit', '1994-03-15'),
(8, 'nobis', 'Assumenda aliquid libero.', 'Suscipit iure consequuntur voluptatem amet ut ratione porro.', 'perspiciatis', '2015-01-26'),
(9, 'tenetur', 'Cupiditate architecto alias totam.', 'Culpa et porro expedita quia repellendus expedita.', 'repellendus', '1977-12-14'),
(10, 'vel', 'Nihil architecto necessitatibus.', 'Qui autem aut enim maiores nesciunt eveniet distinctio.', 'autem', '1995-04-03'),
(11, 'rerum', 'Aperiam quia eos.', 'Dolor rem et consectetur ut et consequatur.', 'nisi', '2017-06-09'),
(12, 'hic', 'Consequatur tempore nobis.', 'Occaecati ex enim minima quae aliquid labore delectus.', 'dolor', '1987-03-28'),
(13, 'minus', 'Inventore rerum inventore perferendis.', 'Eum amet dolorum amet reiciendis nostrum est.', 'ullam', '2006-05-03'),
(14, 'omnis', 'Sunt ex cum rerum.', 'Nesciunt ab adipisci maiores rem enim quia aliquid.', 'id', '2003-07-02'),
(15, 'asperiores', 'Asperiores deserunt quo atque consectetur.', 'Id facilis dolorum quia tempore temporibus architecto.', 'et', '1974-09-18'),
(16, 'voluptatibus', 'Veritatis suscipit error nihil.', 'Sint ipsam perspiciatis sed et nemo qui reiciendis fugit.', 'illum', '2006-08-31'),
(17, 'illo', 'Consectetur quis voluptatem hic.', 'Ut ut reiciendis reiciendis quas adipisci sequi.', 'fuga', '2010-02-18'),
(18, 'est', 'Aliquam ut perspiciatis.', 'Officia repudiandae recusandae ut quia deserunt ex.', 'deserunt', '2018-06-09'),
(19, 'ut', 'Illum eius ut reprehenderit.', 'Occaecati id nulla tenetur debitis.', 'qui', '1994-12-19'),
(20, 'saepe', 'Voluptatibus reiciendis magni.', 'Quia aut non quod totam iure.', 'autem', '1986-03-11'),
(21, 'vel', 'Quasi voluptas facere est.', 'Quia et nihil adipisci quis.', 'est', '2012-10-23'),
(22, 'animi', 'Ex voluptatum repudiandae.', 'Sint laboriosam perferendis rerum modi occaecati voluptate odit.', 'quibusdam', '2015-10-15'),
(23, 'tempore', 'Earum vel corrupti.', 'Dicta quo et est odit cupiditate.', 'quis', '2001-08-17'),
(24, 'quasi', 'Perferendis praesentium et rerum.', 'Reiciendis tempora consectetur perspiciatis minus earum sed.', 'ut', '1989-06-26'),
(25, 'quia', 'Sunt libero est molestiae.', 'Qui error recusandae quo quae delectus tenetur est.', 'repellat', '1980-04-18'),
(26, 'tempore', 'Rerum magni tenetur soluta.', 'Eligendi velit aut omnis aut et ratione omnis.', 'laborum', '2012-02-12'),
(27, 'ut', 'Nesciunt consequatur corrupti.', 'Quasi expedita et iste atque illum eum quia.', 'dolorem', '2002-01-10'),
(28, 'facere', 'Et impedit sequi rerum.', 'Id et itaque molestiae placeat et atque.', 'velit', '2019-01-22'),
(29, 'est', 'Aut ex dolore.', 'Eligendi rerum est corrupti perferendis veniam.', 'ea', '1985-12-31'),
(30, 'perspiciatis', 'Voluptas totam molestiae ex.', 'Rerum qui sed voluptas perspiciatis debitis consequatur sequi.', 'molestiae', '2002-04-10'),
(31, 'ea', 'Earum reiciendis reprehenderit.', 'Id officia molestiae omnis nobis atque.', 'reiciendis', '1994-09-20'),
(32, 'illo', 'Adipisci iusto atque.', 'Aut minus nobis consequuntur ea.', 'et', '2009-08-05'),
(33, 'voluptas', 'Cumque quisquam velit ut alias.', 'Quam quae sequi dolores magnam deleniti.', 'sed', '2011-04-26'),
(34, 'ducimus', 'Culpa quia dignissimos.', 'Eligendi voluptate beatae porro amet.', 'dolorem', '2000-01-09'),
(35, 'accusantium', 'Vel at doloribus natus.', 'Dolorem voluptatem et nihil totam.', 'asperiores', '2010-06-02'),
(36, 'et', 'Voluptas omnis qui.', 'Autem quis et omnis optio sint omnis.', 'et', '2001-09-28'),
(37, 'aliquam', 'Necessitatibus quis excepturi.', 'Est nesciunt assumenda rem dolorem molestiae animi libero.', 'id', '1998-07-24'),
(38, 'id', 'Aut accusantium dolore.', 'Perferendis harum qui sit praesentium doloribus.', 'unde', '2013-06-01'),
(39, 'eveniet', 'Repudiandae ea sequi.', 'Qui iusto officiis quasi dolor provident et eius.', 'est', '1982-03-26'),
(40, 'quod', 'Esse quam quisquam dolor.', 'Ratione quos enim cupiditate amet aut at.', 'at', '1985-01-31'),
(41, 'corporis', 'Qui nam rerum voluptatem.', 'Excepturi ad nam dignissimos odio minima illo consequatur.', 'debitis', '1981-03-22'),
(42, 'molestiae', 'Numquam illo quasi.', 'Ut impedit facilis quis et ut enim est.', 'quae', '2017-07-21'),
(43, 'aut', 'Distinctio atque.', 'Velit unde laudantium et quia est eius sint.', 'aut', '2007-03-18'),
(44, 'ut', 'Exercitationem magni excepturi voluptatem consequuntur.', 'Tenetur quia consequuntur sed numquam repellendus error.', 'in', '2009-02-09'),
(45, 'at', 'Totam enim sed vel.', 'Non illum perspiciatis quia.', 'veritatis', '2005-08-19'),
(46, 'sit', 'Laborum eum totam.', 'Et cum vel quia.', 'eius', '2017-01-27'),
(47, 'aut', 'Et veritatis illo sunt.', 'Laudantium et nulla eveniet ea dicta corrupti id.', 'iure', '1985-12-17'),
(48, 'vel', 'Distinctio hic eos.', 'Veritatis vel rerum rerum deserunt.', 'distinctio', '1992-07-17'),
(49, 'ullam', 'Molestiae similique tenetur occaecati.', 'Magnam qui id qui voluptate.', 'ut', '1988-12-07'),
(50, 'quia', 'Id sit aut neque.', 'Distinctio sit aut voluptas.', 'rerum', '1994-10-10'),
(51, 'quo', 'Id ad nesciunt in sed.', 'Ab corporis veritatis nesciunt dicta dolorem culpa iure.', 'odit', '1970-03-10'),
(52, 'voluptate', 'Rem aut architecto quam.', 'Non qui dolorem rerum iste cum ex ipsa.', 'fugiat', '1984-04-15'),
(53, 'nulla', 'Quos dolorem nostrum doloribus.', 'Pariatur in beatae et sit doloribus aut qui.', 'numquam', '2018-05-01'),
(54, 'magnam', 'Quo vel esse dignissimos voluptas.', 'Consequatur nulla odit excepturi nostrum nam ex.', 'ut', '1980-09-23'),
(55, 'facere', 'Sunt est suscipit dolorum.', 'Culpa molestiae vero omnis nesciunt rerum fuga at.', 'sed', '2017-08-09'),
(56, 'necessitatibus', 'Cum qui nemo voluptatum.', 'Totam similique quos voluptatum rerum et corporis tempore.', 'corrupti', '2013-02-19'),
(57, 'ad', 'Aut aut rem voluptas.', 'Atque possimus sint ipsa et.', 'totam', '1978-12-28'),
(58, 'odio', 'Autem id tempore.', 'Nisi consectetur consequatur debitis aliquid fuga iusto porro.', 'nihil', '2000-12-10'),
(59, 'id', 'Enim nihil et.', 'Doloremque quibusdam quo nostrum voluptatem.', 'eum', '1976-05-18'),
(60, 'distinctio', 'Aspernatur perspiciatis sit est.', 'Molestias fuga omnis est quas temporibus.', 'fugiat', '1990-04-07'),
(61, 'officia', 'Aliquid et voluptatem.', 'Sequi quod nihil aspernatur ea est ad et.', 'aut', '2018-09-20'),
(62, 'molestias', 'Voluptatem velit aut.', 'Doloremque molestias perferendis autem enim assumenda eligendi dolor.', 'omnis', '1971-11-23'),
(63, 'consequatur', 'Rerum et sed.', 'Animi ipsa quaerat voluptatem consequuntur cum ad ut.', 'assumenda', '1983-07-08'),
(64, 'est', 'Dolorem ut nisi.', 'Ullam nisi qui occaecati at excepturi explicabo sapiente.', 'quis', '1995-04-11'),
(65, 'iusto', 'Corrupti eligendi autem.', 'Sapiente aut aut expedita ducimus laboriosam nam.', 'ea', '2008-11-28'),
(66, 'et', 'Odit quidem cumque quasi.', 'Aliquid dolor quibusdam velit iure ea aliquid.', 'tempore', '2009-06-14'),
(67, 'veniam', 'Ut eaque cumque.', 'Similique molestias fugit omnis est fuga maiores ipsum.', 'rerum', '2001-10-30'),
(68, 'consequatur', 'Sit minus quis.', 'Voluptates aut beatae sunt.', 'quia', '1979-03-21'),
(69, 'et', 'Et placeat.', 'Ipsa vel eligendi aperiam id ducimus non.', 'dolor', '2012-03-26'),
(70, 'praesentium', 'Quidem praesentium aperiam.', 'Fugiat esse ducimus rem soluta quam libero.', 'laborum', '2015-06-08'),
(71, 'quibusdam', 'Vitae accusamus odit.', 'Omnis repudiandae dolores rem qui.', 'numquam', '1999-10-04'),
(72, 'sed', 'Voluptate magnam.', 'Dolores minima et iusto et.', 'atque', '1998-11-27'),
(73, 'et', 'Optio odit deserunt nesciunt.', 'Rerum beatae facilis voluptas sunt.', 'perspiciatis', '1986-10-09'),
(74, 'praesentium', 'Necessitatibus amet itaque cumque.', 'Officiis architecto aut excepturi libero.', 'beatae', '1978-05-15'),
(75, 'id', 'Perferendis facilis similique sit.', 'Laborum vel molestiae facilis sed repellendus odio.', 'repellendus', '1991-04-06'),
(76, 'consectetur', 'Aut et itaque eos.', 'Porro consequuntur officiis est adipisci quae corrupti aut.', 'ut', '1979-10-02'),
(77, 'culpa', 'Veniam delectus ut.', 'Accusamus fugiat deleniti reiciendis fugiat aut.', 'fugiat', '1974-08-09'),
(78, 'at', 'Iusto et quia.', 'Sunt quas explicabo natus laudantium.', 'aliquam', '2001-01-26'),
(79, 'cupiditate', 'Quas commodi quo.', 'Aut cum rerum unde.', 'corporis', '1986-03-17'),
(80, 'voluptatum', 'Perspiciatis magnam impedit.', 'Dicta aut porro magni ratione atque dolores quas veniam.', 'ipsum', '1997-07-14'),
(81, 'dolores', 'Facilis repellat illum.', 'Suscipit velit dicta modi eos nisi et.', 'distinctio', '1993-07-29'),
(82, 'quae', 'Commodi eum.', 'Et est consectetur rerum voluptatem vero ab.', 'aut', '2009-05-09'),
(83, 'accusantium', 'Qui ea amet facilis.', 'Ut ut debitis voluptatem placeat inventore consequatur.', 'qui', '1987-06-21'),
(84, 'minima', 'Itaque consectetur facilis.', 'Reprehenderit doloremque enim totam cum et quis.', 'ea', '1972-10-13'),
(85, 'ut', 'Commodi quam autem reprehenderit.', 'Alias sed et quia molestias ratione.', 'quisquam', '2007-11-20'),
(86, 'perferendis', 'Praesentium quia qui et.', 'Rerum illum et dolore maiores quis quidem est.', 'illo', '1971-12-25'),
(87, 'rerum', 'Voluptate ducimus ab.', 'Repellendus aut veritatis dolorem sint culpa.', 'exercitationem', '2015-08-28'),
(88, 'earum', 'Doloribus consequuntur aut.', 'Quaerat deleniti itaque tempore velit maiores itaque.', 'unde', '1991-04-11'),
(89, 'eaque', 'Est id sint.', 'Quibusdam mollitia occaecati saepe eveniet velit et aliquam.', 'totam', '1970-06-22'),
(90, 'ducimus', 'Sed sit dolore.', 'Est sit non placeat ut cum similique ullam.', 'veritatis', '1987-08-13'),
(91, 'iusto', 'Esse sit necessitatibus.', 'Eligendi consequatur impedit quia vel cupiditate ab.', 'est', '1983-10-09'),
(92, 'exercitationem', 'Pariatur occaecati consequuntur assumenda.', 'Dignissimos ab fugiat doloremque omnis eos accusantium laborum cum.', 'dolorem', '1976-07-29'),
(93, 'aliquam', 'Sunt molestias aut tempore.', 'Repudiandae et quo a ut perferendis.', 'ullam', '2013-02-19'),
(94, 'iusto', 'Provident in dicta sit.', 'Sit ipsa doloremque aut occaecati.', 'odio', '1985-07-18'),
(95, 'temporibus', 'Aliquam inventore velit.', 'Explicabo quos id ipsa est.', 'atque', '1970-08-09'),
(96, 'fugit', 'Veritatis consequatur aut omnis.', 'Nobis ut officiis autem et iste qui.', 'eum', '1995-10-29'),
(97, 'in', 'Enim expedita enim.', 'Quasi similique aut harum animi molestias eum.', 'omnis', '1997-12-10'),
(98, 'accusantium', 'Sint recusandae aut.', 'Voluptatum debitis nam laborum doloremque quasi.', 'doloribus', '2005-07-06'),
(99, 'architecto', 'Optio animi beatae aut.', 'Omnis sint id aut quidem voluptatem.', 'quia', '2010-10-08'),
(100, 'est', 'Et minus est nesciunt.', 'Quam rerum minima est sed.', 'consequatur', '1989-10-16'),
(101, 'sint', 'Ut dolorum eligendi repellat sed.', 'Soluta repellat rerum sed cumque impedit voluptatem.', 'sed', '2020-09-26');

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
  `active` char(1) NOT NULL
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
(8, 2, 'Reset Attempts', 'admin/reset-attempts', 'fas fa-sync-alt', '1'),
(9, 2, 'Activation Attempts', 'admin/activation-attempts', 'fas fa-key', '1'),
(10, 2, 'Login Attempts', 'admin/login-attempts', 'fas fa-sign-in-alt', '1'),
(11, 4, 'Report 1', 'admin/report-1', 'far fa-chart-bar', '1'),
(12, 5, 'Activity Log', 'admin/activity-log', 'fas fa-mouse', '1'),
(13, 3, 'Activation Tokens', 'admin/activation-tokens', 'fas fa-barcode', '1'),
(14, 3, 'Reset Tokens', 'admin/reset-tokens', 'fas fa-barcode', '1'),
(20, 4, 'Report 2', 'admin/reports/report-2', 'far fa-chart-bar', '0');

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
(26, 8, 2),
(28, 9, 2),
(29, 10, 2),
(30, 13, 2),
(31, 12, 2),
(32, 11, 2),
(33, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_scope`
--

CREATE TABLE `table_scope` (
  `target_scope_id` tinyint(1) NOT NULL,
  `target_scope` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_scope`
--

INSERT INTO `table_scope` (`target_scope_id`, `target_scope`) VALUES
(1, 'Tabel Users'),
(2, 'Tabel Users Groups'),
(3, 'Tabel Resources'),
(4, 'Tabel Resources Access'),
(5, 'Tabel Permissions'),
(6, 'Tabel Groups');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_kerja`
--

CREATE TABLE `tempat_kerja` (
  `id_tempat_kerja` int(11) UNSIGNED NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `telp_instansi` varchar(25) NOT NULL,
  `faks_instansi` varchar(50) NOT NULL,
  `email_instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempat_kerja`
--

INSERT INTO `tempat_kerja` (`id_tempat_kerja`, `nama_instansi`, `alamat_instansi`, `telp_instansi`, `faks_instansi`, `email_instansi`) VALUES
(1, 'BPS Dummy', 'Kpg. Basuki Rahmat  No. 53, Pontianak 83231, PapBar', '0982 0165 8931', '(+62) 791 2286 562', 'candrakanta.palastri@gmail.co.id'),
(2, 'CV Puspita', 'Psr. Gotong Royong No. 585, Blitar 76275, PapBar', '(+62) 443 5500 4560', '0359 8631 3522', 'bahuwarna87@gmail.com'),
(3, 'UD Mustofa Saputra', 'Jln. BKR No. 265, Ambon 65054, DIY', '(+62) 229 3452 2901', '(+62) 565 8561 052', 'tampubolon.endra@yahoo.com'),
(4, 'PD Hidayanto Wijaya Tbk', 'Ki. Abdullah No. 528, Sungai Penuh 85281, NTT', '0779 1178 071', '0248 7411 4881', 'vhidayanto@gmail.com'),
(5, 'PT Januar (Persero) Tbk', 'Dk. Ir. H. Juanda No. 596, Bitung 66058, SulSel', '0860 4063 0640', '(+62) 20 4821 0490', 'rrajata@gmail.com'),
(6, 'Perum Pangestu', 'Psr. Baha No. 146, Pasuruan 67987, Aceh', '0647 1613 675', '0759 9819 4710', 'kawaya76@gmail.co.id'),
(7, 'PD Lestari', 'Jln. Imam No. 971, Ambon 59250, KalTeng', '(+62) 23 8021 1574', '(+62) 999 0460 150', 'mulyani.olga@yahoo.co.id'),
(8, 'Perum Narpati Kusumo Tbk', 'Gg. Daan No. 223, Serang 17703, Gorontalo', '(+62) 952 2267 0786', '0907 0245 4428', 'teguh74@gmail.co.id'),
(9, 'Perum Anggriawan Usada', 'Ki. Yosodipuro No. 837, Administrasi Jakarta Pusat 33425, KalTeng', '(+62) 221 3306 3927', '(+62) 569 6695 6900', 'tri34@gmail.com'),
(10, 'PD Anggraini Simanjuntak Tbk', 'Ds. Lumban Tobing No. 204, Tual 26932, DIY', '0970 9548 7466', '(+62) 233 2954 1689', 'sihotang.ami@yahoo.com'),
(11, 'PT Namaga Handayani Tbk', 'Jln. Panjaitan No. 119, Sibolga 60433, Maluku', '(+62) 348 6284 4321', '(+62) 530 1347 5126', 'michelle.waskita@gmail.co.id'),
(12, 'PT Anggraini Laksita', 'Psr. S. Parman No. 621, Sabang 79544, PapBar', '0307 5464 594', '(+62) 693 6643 4559', 'latika.hassanah@gmail.com'),
(13, 'PD Saefullah (Persero) Tbk', 'Ki. Bazuka Raya No. 2, Sawahlunto 13028, KalSel', '(+62) 29 2143 292', '(+62) 29 4598 936', 'zelaya99@gmail.co.id'),
(14, 'PT Yuliarti Hariyah', 'Jr. Reksoninten No. 143, Parepare 62824, Jambi', '0915 6070 122', '(+62) 439 2700 800', 'permata.dariati@yahoo.com'),
(15, 'UD Uyainah Tbk', 'Jr. Bara No. 321, Pontianak 43143, SulTeng', '(+62) 524 7873 0195', '0797 2306 5644', 'najmudin.hadi@yahoo.com'),
(16, 'Perum Suryatmi (Persero) Tbk', 'Jr. Yoga No. 918, Surakarta 69338, JaBar', '0705 0292 406', '(+62) 520 4759 4854', 'halima17@gmail.com'),
(17, 'PT Samosir Firmansyah Tbk', 'Kpg. Cikapayang No. 61, Banda Aceh 58108, KepR', '0845 3113 794', '027 1700 5627', 'garang52@gmail.com'),
(18, 'Perum Suryatmi Dongoran', 'Dk. Baya Kali Bungur No. 394, Magelang 75977, KalTeng', '(+62) 697 0763 705', '(+62) 780 4661 8407', 'xnovitasari@gmail.co.id'),
(19, 'PD Wijaya Mansur (Persero) Tbk', 'Jr. Dr. Junjunan No. 884, Parepare 16035, JaTim', '0624 5938 918', '0962 1730 0200', 'yunita34@gmail.com'),
(20, 'PD Prasetya Laksmiwati', 'Dk. Basudewo No. 456, Pagar Alam 16095, DIY', '0213 2650 939', '0290 0328 029', 'osimanjuntak@gmail.com'),
(21, 'PT Puspasari Tbk', 'Dk. Adisumarmo No. 379, Administrasi Jakarta Barat 97488, SulTeng', '(+62) 521 2545 6776', '(+62) 846 471 719', 'mahendra.hani@gmail.co.id'),
(22, 'CV Marpaung (Persero) Tbk', 'Jr. Bawal No. 551, Bau-Bau 57097, Bali', '(+62) 818 7112 3325', '023 5224 185', 'uyainah.ganep@yahoo.co.id'),
(23, 'UD Prakasa', 'Jr. Monginsidi No. 838, Bandung 93692, SulSel', '(+62) 820 498 396', '0573 2307 7118', 'onajmudin@gmail.com'),
(24, 'PD Namaga Tbk', 'Ds. Nanas No. 983, Depok 16760, KalTeng', '(+62) 23 6108 920', '0867 035 985', 'gina01@gmail.com'),
(25, 'UD Saptono Tbk', 'Gg. Abdullah No. 734, Bandung 40354, Bali', '(+62) 796 3668 9782', '(+62) 342 9809 240', 'widya.prastuti@gmail.co.id'),
(26, 'UD Wijaya Firgantoro', 'Dk. B.Agam 1 No. 227, Surabaya 17829, KalBar', '(+62) 714 1302 4634', '0315 5349 387', 'suryono.puji@gmail.com'),
(27, 'PT Mandasari Usamah Tbk', 'Psr. Merdeka No. 328, Tual 51628, SumBar', '(+62) 390 9183 183', '0862 442 970', 'cinthia.sudiati@yahoo.co.id'),
(28, 'PT Padmasari (Persero) Tbk', 'Jr. Gegerkalong Hilir No. 843, Binjai 45747, NTT', '(+62) 672 8328 226', '0959 6896 522', 'zizi.wahyudin@yahoo.co.id'),
(29, 'PT Nasyidah Rajata Tbk', 'Ki. Achmad Yani No. 642, Surabaya 73347, Bengkulu', '0884 780 718', '0840 250 289', 'prabu50@yahoo.com'),
(30, 'UD Novitasari Tbk', 'Kpg. Eka No. 376, Subulussalam 36574, Bengkulu', '0515 3411 967', '0743 0180 021', 'ida11@gmail.com'),
(31, 'UD Mulyani Rahmawati', 'Dk. Halim No. 528, Depok 95304, KalUt', '0603 3733 077', '(+62) 882 397 080', 'novitasari.yulia@gmail.com'),
(32, 'PD Wijayanti Hutasoit (Persero) Tbk', 'Dk. B.Agam 1 No. 513, Cilegon 90104, SulBar', '(+62) 350 8565 204', '0854 0992 195', 'nugroho.tomi@yahoo.co.id'),
(33, 'PD Januar', 'Ki. Gremet No. 756, Langsa 69656, NTB', '0730 4527 939', '(+62) 475 9989 295', 'lnainggolan@yahoo.co.id'),
(34, 'PT Waluyo (Persero) Tbk', 'Gg. Otto No. 434, Tomohon 35122, SulUt', '(+62) 280 1099 4973', '0894 1575 3448', 'salsabila.usada@yahoo.com'),
(35, 'PD Nashiruddin', 'Jr. Yoga No. 781, Tebing Tinggi 36157, Gorontalo', '(+62) 391 3838 0848', '(+62) 835 4091 614', 'jabal.wahyudin@yahoo.co.id'),
(36, 'UD Sudiati (Persero) Tbk', 'Gg. Ekonomi No. 589, Tarakan 47971, MalUt', '0206 2468 2848', '(+62) 865 4806 870', 'mtarihoran@yahoo.com'),
(37, 'CV Pertiwi Maryati', 'Jln. Basoka No. 457, Samarinda 50079, JaTeng', '0696 7236 389', '0831 9837 6582', 'opranowo@yahoo.com'),
(38, 'PD Permata', 'Jln. Suharso No. 497, Cilegon 41161, JaTim', '0919 3552 787', '0687 4239 6903', 'xrahmawati@yahoo.co.id'),
(39, 'UD Laksita Tbk', 'Psr. Karel S. Tubun No. 955, Bima 22196, SulTeng', '0723 4568 3368', '(+62) 214 9882 193', 'endah.yolanda@gmail.co.id'),
(40, 'PT Wahyudin Tbk', 'Dk. Basmol Raya No. 247, Surakarta 32620, Banten', '(+62) 270 4554 3741', '(+62) 690 4514 4177', 'ghani85@gmail.co.id'),
(41, 'UD Mandasari', 'Psr. HOS. Cjokroaminoto (Pasirkaliki) No. 291, Serang 68995, SumBar', '0618 1468 086', '0780 7166 5566', 'uwais.eli@yahoo.com'),
(42, 'UD Purwanti Yulianti (Persero) Tbk', 'Ki. Sugiyopranoto No. 220, Administrasi Jakarta Barat 76914, KalTim', '0703 9953 668', '0972 4514 612', 'taswir.prasetyo@yahoo.com'),
(43, 'Perum Puspita Tbk', 'Dk. Suryo Pranoto No. 745, Pekanbaru 68502, Papua', '0781 8162 996', '(+62) 939 5320 453', 'wulandari.lala@yahoo.co.id'),
(44, 'CV Mardhiyah', 'Ds. Bakaru No. 360, Bandar Lampung 32402, Banten', '0585 1590 927', '(+62) 21 6802 351', 'ibudiman@gmail.co.id'),
(45, 'CV Gunarto', 'Jln. Supomo No. 456, Banjarmasin 60403, Papua', '0833 1421 772', '0899 984 565', 'hesti77@gmail.co.id'),
(46, 'Perum Novitasari Mandasari', 'Ds. Ters. Buah Batu No. 193, Tangerang 94836, SulTeng', '(+62) 510 1853 322', '(+62) 563 0204 1392', 'yahya52@gmail.com'),
(47, 'PT Nainggolan Tbk', 'Dk. Wahid No. 774, Bekasi 51170, NTB', '(+62) 854 8506 968', '(+62) 354 0454 5529', 'ufujiati@yahoo.co.id'),
(48, 'UD Suwarno Tbk', 'Jr. Samanhudi No. 440, Mataram 78359, Banten', '0632 1364 9344', '(+62) 445 3185 8011', 'iswahyudi.cornelia@gmail.co.id'),
(49, 'UD Prastuti (Persero) Tbk', 'Dk. Teuku Umar No. 211, Sawahlunto 35201, Papua', '(+62) 455 9618 263', '(+62) 352 2110 401', 'suryatmi.maida@yahoo.co.id'),
(50, 'PT Mulyani Pudjiastuti Tbk', 'Psr. Kalimantan No. 122, Bontang 37903, PapBar', '0593 4779 653', '0815 279 728', 'wahyuni.padmi@yahoo.com'),
(51, 'CV Lazuardi Siregar', 'Kpg. Yap Tjwan Bing No. 194, Balikpapan 56654, PapBar', '(+62) 828 3562 385', '0255 7081 3271', 'mhariyah@yahoo.co.id'),
(52, 'PD Wastuti Laksita (Persero) Tbk', 'Dk. Suniaraja No. 277, Banjarmasin 48764, Papua', '022 6069 083', '(+62) 625 7398 997', 'mayasari.dwi@gmail.co.id'),
(53, 'CV Haryanti Prastuti Tbk', 'Dk. Otto No. 845, Pangkal Pinang 18033, JaBar', '(+62) 479 5326 530', '0347 2292 5843', 'fitria10@yahoo.co.id'),
(54, 'CV Kurniawan Tbk', 'Ds. PHH. Mustofa No. 257, Batam 85666, SumBar', '0736 4025 0164', '(+62) 869 0314 644', 'nova.uyainah@gmail.co.id'),
(55, 'PT Mandala', 'Jln. Baing No. 379, Pagar Alam 13247, SumSel', '(+62) 836 5963 440', '(+62) 821 4500 5825', 'utami.uli@yahoo.com'),
(56, 'PD Prasasta Dongoran (Persero) Tbk', 'Ds. Suniaraja No. 254, Palopo 62101, Aceh', '(+62) 509 6590 091', '0683 8502 1846', 'spuspita@yahoo.com'),
(57, 'PD Haryanto', 'Dk. Baha No. 948, Batam 17627, SulTeng', '0962 7503 6992', '0229 7493 1252', 'pdamanik@yahoo.co.id'),
(58, 'PT Yuliarti', 'Dk. Cokroaminoto No. 723, Banda Aceh 95671, KalSel', '0791 8943 537', '(+62) 274 8135 4954', 'kasiyah.safitri@gmail.co.id'),
(59, 'PT Rahayu Nainggolan', 'Psr. Industri No. 249, Pekanbaru 64945, KalBar', '(+62) 447 6164 0432', '(+62) 232 5455 7196', 'yessi.namaga@gmail.co.id'),
(60, 'Perum Prayoga', 'Ds. Sam Ratulangi No. 528, Magelang 38786, SumBar', '(+62) 337 9360 969', '(+62) 24 3293 963', 'thamrin.cahya@gmail.co.id'),
(61, 'UD Aryani (Persero) Tbk', 'Jr. Otto No. 879, Pematangsiantar 48661, KepR', '020 6343 7967', '0657 5030 239', 'jamalia.tampubolon@yahoo.com'),
(62, 'CV Prasasta (Persero) Tbk', 'Ds. Ters. Pasir Koja No. 374, Pekalongan 23446, DKI', '(+62) 504 0106 9512', '(+62) 289 7211 336', 'prakasa.titi@gmail.co.id'),
(63, 'UD Wahyuni Tbk', 'Ki. Juanda No. 488, Bima 85952, NTB', '0282 2926 231', '0506 2150 6328', 'lwastuti@gmail.co.id'),
(64, 'CV Uyainah', 'Dk. Warga No. 551, Padangsidempuan 96822, Gorontalo', '0891 0869 551', '(+62) 562 1471 2631', 'septi.pradana@gmail.co.id'),
(65, 'Perum Tampubolon', 'Ki. Umalas No. 849, Sungai Penuh 25777, SumUt', '(+62) 952 8862 8697', '(+62) 809 745 576', 'uwaskita@yahoo.com'),
(66, 'PT Waskita', 'Psr. Camar No. 525, Lhokseumawe 14062, KalBar', '(+62) 221 6369 2268', '(+62) 890 930 665', 'situmorang.vera@gmail.com'),
(67, 'CV Winarno', 'Dk. Panjaitan No. 219, Sungai Penuh 58529, SumBar', '0271 5201 935', '(+62) 23 1995 1031', 'raden.wastuti@gmail.co.id'),
(68, 'PD Damanik Anggriawan Tbk', 'Ki. Sunaryo No. 32, Pematangsiantar 69163, DKI', '(+62) 911 4006 937', '(+62) 20 1260 6899', 'tira.prasetyo@yahoo.com'),
(69, 'PD Nurdiyanti Mardhiyah', 'Ds. R.E. Martadinata No. 588, Administrasi Jakarta Selatan 26632, Bengkulu', '(+62) 205 3478 9681', '0473 3632 0211', 'baktiono70@gmail.com'),
(70, 'UD Purnawati Gunawan (Persero) Tbk', 'Gg. Bara No. 467, Pasuruan 33718, Bali', '(+62) 529 2548 4020', '021 9349 692', 'umaryati@gmail.com'),
(71, 'UD Zulaika Novitasari', 'Ki. Bacang No. 605, Jambi 55996, Bali', '(+62) 250 4225 765', '(+62) 793 7340 4881', 'uda.yuniar@yahoo.co.id'),
(72, 'UD Suryatmi Lailasari Tbk', 'Psr. Baabur Royan No. 644, Administrasi Jakarta Barat 55536, BaBel', '(+62) 896 8248 4796', '(+62) 284 7375 273', 'rajasa.gandi@yahoo.co.id'),
(73, 'PT Farida (Persero) Tbk', 'Ki. Jamika No. 656, Magelang 13234, SulTeng', '(+62) 711 4957 2612', '(+62) 229 4240 9589', 'maria46@yahoo.com'),
(74, 'Perum Maryati Widiastuti Tbk', 'Ds. Sentot Alibasa No. 553, Pontianak 72430, Papua', '0592 2295 042', '(+62) 971 5224 2651', 'siska93@gmail.com'),
(75, 'PD Irawan', 'Psr. Ikan No. 666, Banjar 29169, SumBar', '(+62) 410 2777 5200', '(+62) 811 0778 4680', 'purnawati.wulan@gmail.co.id'),
(76, 'PD Tampubolon Hassanah (Persero) Tbk', 'Jln. R.E. Martadinata No. 832, Tangerang Selatan 85670, NTT', '0359 7586 5179', '(+62) 814 9974 1172', 'yahya48@gmail.com'),
(77, 'PT Prasasta Lailasari (Persero) Tbk', 'Jln. Muwardi No. 181, Solok 53035, KalTeng', '0414 0661 6954', '0850 480 995', 'budiyanto.gangsar@gmail.co.id'),
(78, 'UD Hassanah', 'Dk. Badak No. 440, Administrasi Jakarta Utara 25277, Lampung', '022 2556 4135', '(+62) 715 0402 7767', 'rahayu.pradana@yahoo.com'),
(79, 'Perum Halimah Astuti Tbk', 'Gg. Bahagia  No. 804, Tomohon 31247, DKI', '(+62) 309 1476 697', '0777 5237 2244', 'zpratama@yahoo.co.id'),
(80, 'UD Padmasari', 'Ki. Lumban Tobing No. 873, Pekanbaru 73315, KalTim', '(+62) 762 1695 1230', '(+62) 21 6845 611', 'januar.ayu@yahoo.com'),
(81, 'PT Maryadi Tbk', 'Jln. Siliwangi No. 291, Depok 98797, SulUt', '(+62) 794 7215 496', '0638 1434 755', 'yolanda.tirta@yahoo.co.id'),
(82, 'PT Hassanah Padmasari (Persero) Tbk', 'Kpg. Kali No. 115, Cimahi 13418, Gorontalo', '0851 2376 5979', '0645 6292 820', 'salwa18@gmail.co.id'),
(83, 'PT Purwanti Januar (Persero) Tbk', 'Psr. Sadang Serang No. 670, Tual 19213, Papua', '0706 7428 3829', '(+62) 907 8536 513', 'januar.belinda@gmail.com'),
(84, 'UD Mansur Nashiruddin Tbk', 'Gg. Sutan Syahrir No. 406, Jambi 37454, SulBar', '(+62) 709 2978 2736', '0278 8333 8996', 'farhunnisa.wijaya@yahoo.com'),
(85, 'Perum Natsir Tbk', 'Gg. Ters. Buah Batu No. 422, Singkawang 39136, Bengkulu', '0998 8605 5308', '0550 0282 425', 'nababan.okta@yahoo.co.id'),
(86, 'UD Mulyani (Persero) Tbk', 'Ki. Yohanes No. 37, Salatiga 96923, KalUt', '0478 9091 4758', '(+62) 489 5056 6778', 'rajata.nabila@yahoo.co.id'),
(87, 'Perum Kuswandari Tbk', 'Jr. Jambu No. 921, Padangpanjang 12183, Banten', '(+62) 971 9669 139', '0915 9387 075', 'erik44@gmail.com'),
(88, 'PD Budiyanto Tbk', 'Dk. B.Agam 1 No. 671, Administrasi Jakarta Selatan 15586, BaBel', '(+62) 797 6230 6975', '(+62) 460 6712 4354', 'nilam.hutagalung@gmail.co.id'),
(89, 'PD Gunarto Tbk', 'Jln. Bazuka Raya No. 388, Binjai 39488, PapBar', '0463 8653 2219', '(+62) 772 6016 007', 'surya71@gmail.co.id'),
(90, 'CV Hastuti Mulyani (Persero) Tbk', 'Ds. Flores No. 422, Banjarbaru 80305, KalTeng', '(+62) 432 4069 730', '0972 9386 7805', 'yusuf.hutapea@yahoo.com'),
(91, 'UD Putra Tbk', 'Ki. Wahid Hasyim No. 934, Metro 64038, Banten', '(+62) 584 6796 8429', '0681 5944 709', 'rafid.mardhiyah@yahoo.com'),
(92, 'CV Hidayat Haryanto (Persero) Tbk', 'Psr. Yogyakarta No. 850, Serang 98766, JaTim', '(+62) 352 3218 005', '(+62) 927 7256 609', 'umelani@gmail.com'),
(93, 'Perum Kusmawati', 'Jln. Babakan No. 33, Bukittinggi 29366, SumBar', '(+62) 568 6795 675', '(+62) 820 7860 9673', 'ohassanah@gmail.co.id'),
(94, 'UD Hidayanto', 'Psr. Radio No. 679, Probolinggo 29123, JaBar', '(+62) 397 9152 3541', '0820 6209 075', 'pandu24@yahoo.co.id'),
(95, 'PD Hastuti Nasyidah (Persero) Tbk', 'Ki. Dipatiukur No. 432, Palangka Raya 91958, SulTra', '0765 0433 4141', '021 5426 384', 'waskita.winda@yahoo.com'),
(96, 'UD Hutagalung Marpaung Tbk', 'Ds. Padma No. 551, Sibolga 72918, Bengkulu', '(+62) 859 4388 324', '(+62) 670 8128 4294', 'hasta20@gmail.co.id'),
(97, 'Perum Mangunsong', 'Jr. Suprapto No. 859, Makassar 62132, SulTra', '(+62) 489 3786 402', '(+62) 398 1968 792', 'wastuti.gina@yahoo.com'),
(98, 'UD Prasasta (Persero) Tbk', 'Ds. Gardujati No. 588, Gunungsitoli 23713, MalUt', '(+62) 668 7258 320', '(+62) 221 2070 354', 'fitria11@gmail.co.id'),
(99, 'PD Wijayanti Tbk', 'Jln. Urip Sumoharjo No. 904, Metro 22227, Bengkulu', '0340 6522 681', '(+62) 312 3642 528', 'xkusmawati@yahoo.com'),
(100, 'Perum Astuti Tbk', 'Jr. Raya Setiabudhi No. 164, Kediri 21302, KalTim', '0242 7674 1135', '0200 1817 4560', 'maida66@yahoo.com'),
(101, 'UD Yuliarti Yulianti (Persero) Tbk', 'Kpg. Halim No. 771, Tarakan 79818, JaTeng', '(+62) 257 6421 8848', '0841 442 573', 'permata.ajiman@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nim` char(9) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
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

INSERT INTO `users` (`id`, `email`, `username`, `nim`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(58, 'rifkigustiawan78.rg@gmail.com', NULL, '211810567', 'Rifki Gustiawan', 'default.svg', '$2y$10$xmIhmusshRIqzvYSRi4jJ.BZ.jFIxjIWfCIs3Is6AjnDCrPg65mGW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-12-30 09:14:35', '2020-12-30 09:15:07', NULL),
(65, 'dummy@stis.ac.id', 'Dummy', '221810160', 'Dummy_dummy', 'default.svg', '$2y$10$yLFu3bK0s5cHqd1VLT6Eh.GjA3H2GJzwqb6o/gjrhKXTWGkMsh3IS', NULL, '2021-02-01 04:26:55', NULL, NULL, NULL, NULL, 1, 0, '2021-02-01 04:26:55', '2021-02-01 04:26:55', NULL),
(66, '211810567@stis.ac.id', '211810567', '211810567', 'RIFKI GUSTIAWAN', 'default.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-02-03 07:01:49', '2021-02-03 07:01:49', NULL),
(67, 'rifkigustiawan78@gmail.com', NULL, '211810523', 'Rifki Gustiawan', 'default.svg', '$2y$10$c1mfEi/Aatt9JYPpfxdjGeBqE/BDldx1HWf74OYp.bnXnk8OcS/HC', NULL, NULL, NULL, '02dc1370de7d20f552981e988bdc91c5', NULL, NULL, 0, 0, '2021-02-03 09:51:18', '2021-02-03 09:51:18', NULL),
(68, '221810129@stis.ac.id', NULL, '221810129', 'Akhmad Fadilah ', 'default.svg', '$2y$10$r/.3VHdb20/2kQtKuNlBQeAPpE.H8gSpeJEZWyFhDUHCFDikVvE2m', NULL, NULL, NULL, '86c785443ac2fca83849622c6951496b', NULL, NULL, 0, 0, '2021-02-03 09:56:36', '2021-02-03 09:56:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `target_scope` (`target_scope_id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `alumni_publikasi`
--
ALTER TABLE `alumni_publikasi`
  ADD PRIMARY KEY (`nim`,`id_publikasi`),
  ADD KEY `alumni_publikasi_id_publikasi_foreign` (`id_publikasi`);

--
-- Indexes for table `alumni_tempat_kerja`
--
ALTER TABLE `alumni_tempat_kerja`
  ADD PRIMARY KEY (`nim`,`id_tempat_kerja`),
  ADD KEY `alumni_tempat_kerja_id_tempat_kerja_foreign` (`id_tempat_kerja`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author`,`id_publikasi`),
  ADD KEY `author_id_publikasi_foreign` (`id_publikasi`);

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
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`crud_id`);

--
-- Indexes for table `groups_access`
--
ALTER TABLE `groups_access`
  ADD PRIMARY KEY (`access_group_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `menu_access_id` (`menu_access_id`);

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
  ADD KEY `pendidikan_nim_foreign` (`nim`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `prestasi_nim_foreign` (`nim`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id_publikasi`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `submenu_access`
--
ALTER TABLE `submenu_access`
  ADD PRIMARY KEY (`menu_access_id`),
  ADD KEY `submenu_id` (`submenu_id`),
  ADD KEY `crud_id` (`crud_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `crud_id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups_access`
--
ALTER TABLE `groups_access`
  MODIFY `access_group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id_publikasi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `submenu_access`
--
ALTER TABLE `submenu_access`
  MODIFY `menu_access_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `table_scope`
--
ALTER TABLE `table_scope`
  MODIFY `target_scope_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempat_kerja`
--
ALTER TABLE `tempat_kerja`
  MODIFY `id_tempat_kerja` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`target_scope_id`) REFERENCES `table_scope` (`target_scope_id`) ON UPDATE CASCADE;

--
-- Constraints for table `alumni_publikasi`
--
ALTER TABLE `alumni_publikasi`
  ADD CONSTRAINT `alumni_publikasi_id_publikasi_foreign` FOREIGN KEY (`id_publikasi`) REFERENCES `publikasi` (`id_publikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_publikasi_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `alumni` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alumni_tempat_kerja`
--
ALTER TABLE `alumni_tempat_kerja`
  ADD CONSTRAINT `alumni_tempat_kerja_id_tempat_kerja_foreign` FOREIGN KEY (`id_tempat_kerja`) REFERENCES `tempat_kerja` (`id_tempat_kerja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumni_tempat_kerja_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `alumni` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_id_publikasi_foreign` FOREIGN KEY (`id_publikasi`) REFERENCES `publikasi` (`id_publikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `groups_access`
--
ALTER TABLE `groups_access`
  ADD CONSTRAINT `groups_access_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_access_ibfk_3` FOREIGN KEY (`menu_access_id`) REFERENCES `submenu_access` (`menu_access_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `alumni` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_nim_foreign` FOREIGN KEY (`nim`) REFERENCES `alumni` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON UPDATE CASCADE;

--
-- Constraints for table `submenu_access`
--
ALTER TABLE `submenu_access`
  ADD CONSTRAINT `submenu_access_ibfk_1` FOREIGN KEY (`submenu_id`) REFERENCES `submenu` (`submenu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submenu_access_ibfk_2` FOREIGN KEY (`crud_id`) REFERENCES `crud` (`crud_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
