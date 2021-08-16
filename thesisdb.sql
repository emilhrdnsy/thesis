-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2021 pada 04.12
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesisdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `kode_admin` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `kode_admin`, `nama`, `nama_pengguna`, `kata_sandi`) VALUES
(1, 'ADM-G1', 'admin', 'admin', 'admin'),
(2, 'ADM-G2', 'emil', 'emile', 'emile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bidang_masalah`
--

CREATE TABLE `t_bidang_masalah` (
  `id_bidang_masalah` int(11) NOT NULL,
  `kode_bidang_masalah` varchar(5) NOT NULL,
  `nama_bidang_masalah` varchar(100) NOT NULL,
  `detail_bidang_masalah` varchar(1000) NOT NULL,
  `layanan` varchar(1000) NOT NULL,
  `detail_layanan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_bidang_masalah`
--

INSERT INTO `t_bidang_masalah` (`id_bidang_masalah`, `kode_bidang_masalah`, `nama_bidang_masalah`, `detail_bidang_masalah`, `layanan`, `detail_layanan`) VALUES
(1, 'BM1', 'Penguasaan Materi Pelajaran', 'Masalah yang sering terjadi pada konten prasyarat penguasaan materi adalah ditemukan adanya siswa yang memiliki hambatan dan tidak menguasai materi pelajaran yang telah diberikan guru dan siswa yang tidak mampu menjawab soal-soal ulangan atau ujian karena kurangnya penguasaan materi pelajaran. ', 'Layanan Pembelajaran', 'Layanan bimbingan dan konseling yang memungkinkan peserta didik (klien) mengembangkan diri berkenaan dengan sikap dan kebiasaan belajar yang baik, materi belajar yang cocok dengan kecepatan dan kesulitan belajarnya, serta berbagai aspek tujuan dan kegiatan belajar lainnya.'),
(2, 'BM2', 'Keterampilan Belajar', 'Masalah yang sering terjadi pada konten keterampilan belajar adalah siwa yang tidak mencatat materi pelajaran yang telah diberikan guru, siswa mengalami kesulitan terhadap materi yang memuat kata-kata dalam bahasa asing, siswa yang memiliki kebiasaan mengganggu teman ketika belajar atau ribut ketika jam pelajaran berlangsung, siswa yang sering lupa atau tidak membawa peralatan yang diperlukan dalam belajar di sekolah, tidak menggunakan waktu luang untuk mendalami materi pelajaran, tidak terbiasa memanfaatkan media elektronik untuk belajar dan siswa yang tidak bisa mengatur waktu dengan tepat. ', 'Layanan Pembelajaran', 'Layanan bimbingan dan konseling yang memungkinkan peserta didik (klien) mengembangkan diri berkenaan dengan sikap dan kebiasaan belajar yang baik, materi belajar yang cocok dengan kecepatan dan kesulitan belajarnya, serta berbagai aspek tujuan dan kegiatan belajar lainnya.'),
(3, 'BM3', 'Sarana Belajar', 'Masalah yang sering terjadi pada konten sarana dan prasarana belajar yaitu siswa merasa tidak nyaman didalam kelas karena terasa panas, sarana belajar yang tidak memadai di rumah dan ekonomi orang tua yang pas-pasan. ', '', ''),
(4, 'BM4', 'Diri Pribadi', 'Masalah yang sering terjadi pada konten diri sendiri atau masalah pribadi siswa yaitu siswa merasa tidak konsestrasi belajar dan motivasi belajarnya sangat rendah, merokok di sekolah supaya terlihat keren oleh teman-temannya dan Siswa yang tidak menghormati atau mengolok-olok gurunya.', 'Layanan Konseling Perorangan', 'Layanan yang membantu peserta didik dalam mengentaskan masalah pribadinya. '),
(5, 'BM5', 'Lingkungan Belajar dan Sosio Emosional', 'Masalah yang sering terjadi pada konten lingkungan belajar dan sosio-emosional yaitu siswa sering terlambat ke sekolah karena jarak tempuh antara rumah siswa ke sekolah sangat jauh, Siswa yang tidak bisa bergaul dengan teman kelasnya, Sering bolos sekolah karena ingin main bersama teman dan siswa yang merasa rendah diri karena sering di bully.', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hasil`
--

CREATE TABLE `t_hasil` (
  `kode_hasil` int(11) NOT NULL,
  `bidang_masalah` text NOT NULL,
  `item_masalah` text NOT NULL,
  `nilai_cf` varchar(16) NOT NULL,
  `tanggal` datetime NOT NULL,
  `hasil_id` varchar(11) NOT NULL,
  `kode_siswa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_hasil`
--

INSERT INTO `t_hasil` (`kode_hasil`, `bidang_masalah`, `item_masalah`, `nilai_cf`, `tanggal`, `hasil_id`, `kode_siswa`) VALUES
(1, 'a:5:{s:3:\"BM4\";s:6:\"0.9452\";s:3:\"BM2\";s:6:\"0.8807\";s:3:\"BM1\";s:6:\"0.8211\";s:3:\"BM5\";s:6:\"0.4424\";s:3:\"BM3\";s:6:\"0.1530\";}', 'a:20:{s:3:\"IM1\";s:1:\"3\";s:3:\"IM3\";s:1:\"2\";s:3:\"IM4\";s:1:\"2\";s:3:\"IM5\";s:1:\"2\";s:3:\"IM6\";s:1:\"2\";s:4:\"IM12\";s:1:\"4\";s:4:\"IM13\";s:1:\"2\";s:4:\"IM15\";s:1:\"2\";s:4:\"IM23\";s:1:\"4\";s:4:\"IM24\";s:1:\"2\";s:4:\"IM27\";s:1:\"4\";s:4:\"IM32\";s:1:\"3\";s:4:\"IM33\";s:1:\"2\";s:4:\"IM36\";s:1:\"4\";s:4:\"IM37\";s:1:\"4\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM46\";s:1:\"2\";s:4:\"IM54\";s:1:\"4\";s:4:\"IM61\";s:1:\"2\";}', '0.9452', '0000-00-00 00:00:00', 'BM4', 'KD-1'),
(2, 'a:5:{s:3:\"BM4\";s:6:\"0.9743\";s:3:\"BM2\";s:6:\"0.9723\";s:3:\"BM5\";s:6:\"0.9623\";s:3:\"BM1\";s:6:\"0.8977\";s:3:\"BM3\";s:6:\"0.5936\";}', 'a:36:{s:3:\"IM5\";s:1:\"3\";s:3:\"IM6\";s:1:\"3\";s:3:\"IM8\";s:1:\"2\";s:4:\"IM10\";s:1:\"3\";s:4:\"IM13\";s:1:\"2\";s:4:\"IM15\";s:1:\"2\";s:4:\"IM16\";s:1:\"2\";s:4:\"IM18\";s:1:\"2\";s:4:\"IM19\";s:1:\"2\";s:4:\"IM20\";s:1:\"2\";s:4:\"IM21\";s:1:\"4\";s:4:\"IM23\";s:1:\"3\";s:4:\"IM24\";s:1:\"2\";s:4:\"IM25\";s:1:\"2\";s:4:\"IM26\";s:1:\"2\";s:4:\"IM27\";s:1:\"2\";s:4:\"IM28\";s:1:\"3\";s:4:\"IM29\";s:1:\"3\";s:4:\"IM32\";s:1:\"2\";s:4:\"IM36\";s:1:\"4\";s:4:\"IM37\";s:1:\"4\";s:4:\"IM38\";s:1:\"3\";s:4:\"IM39\";s:1:\"4\";s:4:\"IM40\";s:1:\"4\";s:4:\"IM41\";s:1:\"4\";s:4:\"IM44\";s:1:\"3\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM46\";s:1:\"2\";s:4:\"IM47\";s:1:\"2\";s:4:\"IM48\";s:1:\"4\";s:4:\"IM49\";s:1:\"2\";s:4:\"IM50\";s:1:\"3\";s:4:\"IM51\";s:1:\"2\";s:4:\"IM52\";s:1:\"2\";s:4:\"IM53\";s:1:\"3\";s:4:\"IM54\";s:1:\"2\";}', '0.9743', '0000-00-00 00:00:00', 'BM4', 'KD-2'),
(3, 'a:4:{s:3:\"BM4\";s:6:\"0.8352\";s:3:\"BM2\";s:6:\"0.7800\";s:3:\"BM1\";s:6:\"0.7639\";s:3:\"BM5\";s:6:\"0.6686\";}', 'a:28:{s:3:\"IM1\";s:1:\"2\";s:3:\"IM2\";s:1:\"2\";s:3:\"IM7\";s:1:\"2\";s:4:\"IM11\";s:1:\"2\";s:4:\"IM12\";s:1:\"2\";s:4:\"IM13\";s:1:\"2\";s:4:\"IM15\";s:1:\"2\";s:4:\"IM16\";s:1:\"2\";s:4:\"IM17\";s:1:\"2\";s:4:\"IM18\";s:1:\"2\";s:4:\"IM28\";s:1:\"2\";s:4:\"IM29\";s:1:\"2\";s:4:\"IM30\";s:1:\"2\";s:4:\"IM32\";s:1:\"2\";s:4:\"IM36\";s:1:\"3\";s:4:\"IM37\";s:1:\"3\";s:4:\"IM39\";s:1:\"2\";s:4:\"IM40\";s:1:\"2\";s:4:\"IM41\";s:1:\"2\";s:4:\"IM44\";s:1:\"2\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM49\";s:1:\"2\";s:4:\"IM50\";s:1:\"2\";s:4:\"IM52\";s:1:\"2\";s:4:\"IM53\";s:1:\"3\";s:4:\"IM55\";s:1:\"2\";s:4:\"IM60\";s:1:\"2\";s:4:\"IM61\";s:1:\"3\";}', '0.8352', '0000-00-00 00:00:00', 'BM4', 'KD-3'),
(4, 'a:5:{s:3:\"BM4\";s:6:\"0.9710\";s:3:\"BM5\";s:6:\"0.9568\";s:3:\"BM1\";s:6:\"0.9350\";s:3:\"BM3\";s:6:\"0.8311\";s:3:\"BM2\";s:6:\"0.6606\";}', 'a:33:{s:3:\"IM1\";s:1:\"2\";s:3:\"IM7\";s:1:\"2\";s:3:\"IM8\";s:1:\"3\";s:4:\"IM10\";s:1:\"2\";s:4:\"IM13\";s:1:\"2\";s:4:\"IM15\";s:1:\"2\";s:4:\"IM16\";s:1:\"2\";s:4:\"IM18\";s:1:\"2\";s:4:\"IM24\";s:1:\"2\";s:4:\"IM27\";s:1:\"2\";s:4:\"IM28\";s:1:\"2\";s:4:\"IM29\";s:1:\"2\";s:4:\"IM30\";s:1:\"2\";s:4:\"IM31\";s:1:\"2\";s:4:\"IM32\";s:1:\"2\";s:4:\"IM34\";s:1:\"3\";s:4:\"IM35\";s:1:\"4\";s:4:\"IM36\";s:1:\"2\";s:4:\"IM37\";s:1:\"2\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM39\";s:1:\"3\";s:4:\"IM40\";s:1:\"3\";s:4:\"IM41\";s:1:\"3\";s:4:\"IM42\";s:1:\"4\";s:4:\"IM43\";s:1:\"4\";s:4:\"IM44\";s:1:\"4\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM47\";s:1:\"4\";s:4:\"IM49\";s:1:\"4\";s:4:\"IM50\";s:1:\"4\";s:4:\"IM53\";s:1:\"2\";s:4:\"IM58\";s:1:\"2\";s:4:\"IM61\";s:1:\"4\";}', '0.9710', '0000-00-00 00:00:00', 'BM4', 'KD-4'),
(5, 'a:5:{s:3:\"BM4\";s:6:\"0.9710\";s:3:\"BM5\";s:6:\"0.9550\";s:3:\"BM1\";s:6:\"0.9210\";s:3:\"BM3\";s:6:\"0.8502\";s:3:\"BM2\";s:6:\"0.6606\";}', 'a:32:{s:3:\"IM1\";s:1:\"2\";s:3:\"IM7\";s:1:\"2\";s:3:\"IM8\";s:1:\"2\";s:4:\"IM10\";s:1:\"2\";s:4:\"IM13\";s:1:\"2\";s:4:\"IM15\";s:1:\"2\";s:4:\"IM16\";s:1:\"2\";s:4:\"IM18\";s:1:\"2\";s:4:\"IM24\";s:1:\"2\";s:4:\"IM28\";s:1:\"2\";s:4:\"IM29\";s:1:\"2\";s:4:\"IM30\";s:1:\"2\";s:4:\"IM31\";s:1:\"2\";s:4:\"IM32\";s:1:\"2\";s:4:\"IM34\";s:1:\"4\";s:4:\"IM35\";s:1:\"4\";s:4:\"IM36\";s:1:\"2\";s:4:\"IM37\";s:1:\"2\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM39\";s:1:\"3\";s:4:\"IM40\";s:1:\"3\";s:4:\"IM41\";s:1:\"3\";s:4:\"IM42\";s:1:\"4\";s:4:\"IM43\";s:1:\"4\";s:4:\"IM44\";s:1:\"4\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM47\";s:1:\"4\";s:4:\"IM49\";s:1:\"4\";s:4:\"IM50\";s:1:\"4\";s:4:\"IM53\";s:1:\"2\";s:4:\"IM57\";s:1:\"2\";s:4:\"IM61\";s:1:\"4\";}', '0.9710', '2021-06-28 04:41:42', 'BM4', 'KD-5'),
(6, 'a:5:{s:3:\"BM2\";s:6:\"0.9944\";s:3:\"BM5\";s:6:\"0.9904\";s:3:\"BM1\";s:6:\"0.9821\";s:3:\"BM3\";s:6:\"0.9576\";s:3:\"BM4\";s:6:\"0.9414\";}', 'a:45:{s:3:\"IM1\";s:1:\"3\";s:3:\"IM5\";s:1:\"3\";s:3:\"IM6\";s:1:\"3\";s:3:\"IM7\";s:1:\"4\";s:3:\"IM8\";s:1:\"2\";s:4:\"IM11\";s:1:\"3\";s:4:\"IM13\";s:1:\"4\";s:4:\"IM16\";s:1:\"3\";s:4:\"IM17\";s:1:\"3\";s:4:\"IM19\";s:1:\"3\";s:4:\"IM20\";s:1:\"3\";s:4:\"IM21\";s:1:\"2\";s:4:\"IM22\";s:1:\"4\";s:4:\"IM23\";s:1:\"3\";s:4:\"IM24\";s:1:\"4\";s:4:\"IM25\";s:1:\"3\";s:4:\"IM26\";s:1:\"3\";s:4:\"IM27\";s:1:\"2\";s:4:\"IM28\";s:1:\"4\";s:4:\"IM29\";s:1:\"4\";s:4:\"IM31\";s:1:\"2\";s:4:\"IM32\";s:1:\"4\";s:4:\"IM33\";s:1:\"2\";s:4:\"IM34\";s:1:\"3\";s:4:\"IM35\";s:1:\"2\";s:4:\"IM36\";s:1:\"2\";s:4:\"IM37\";s:1:\"2\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM39\";s:1:\"2\";s:4:\"IM40\";s:1:\"2\";s:4:\"IM41\";s:1:\"2\";s:4:\"IM42\";s:1:\"4\";s:4:\"IM43\";s:1:\"4\";s:4:\"IM44\";s:1:\"4\";s:4:\"IM47\";s:1:\"2\";s:4:\"IM48\";s:1:\"2\";s:4:\"IM49\";s:1:\"2\";s:4:\"IM50\";s:1:\"4\";s:4:\"IM51\";s:1:\"4\";s:4:\"IM52\";s:1:\"2\";s:4:\"IM53\";s:1:\"3\";s:4:\"IM54\";s:1:\"4\";s:4:\"IM55\";s:1:\"4\";s:4:\"IM56\";s:1:\"2\";s:4:\"IM59\";s:1:\"2\";}', '0.9944', '2021-06-28 05:17:54', 'BM2', 'KD-6'),
(7, 'a:5:{s:3:\"BM2\";s:6:\"0.9970\";s:3:\"BM4\";s:6:\"0.9900\";s:3:\"BM5\";s:6:\"0.9864\";s:3:\"BM1\";s:6:\"0.9509\";s:3:\"BM3\";s:6:\"0.9064\";}', 'a:44:{s:3:\"IM2\";s:1:\"2\";s:3:\"IM3\";s:1:\"4\";s:3:\"IM4\";s:1:\"4\";s:3:\"IM5\";s:1:\"3\";s:3:\"IM6\";s:1:\"3\";s:3:\"IM8\";s:1:\"2\";s:3:\"IM9\";s:1:\"4\";s:4:\"IM10\";s:1:\"4\";s:4:\"IM12\";s:1:\"4\";s:4:\"IM13\";s:1:\"3\";s:4:\"IM14\";s:1:\"4\";s:4:\"IM15\";s:1:\"2\";s:4:\"IM16\";s:1:\"2\";s:4:\"IM17\";s:1:\"3\";s:4:\"IM18\";s:1:\"2\";s:4:\"IM19\";s:1:\"3\";s:4:\"IM20\";s:1:\"3\";s:4:\"IM21\";s:1:\"3\";s:4:\"IM23\";s:1:\"4\";s:4:\"IM25\";s:1:\"4\";s:4:\"IM26\";s:1:\"4\";s:4:\"IM27\";s:1:\"3\";s:4:\"IM30\";s:1:\"4\";s:4:\"IM31\";s:1:\"2\";s:4:\"IM32\";s:1:\"4\";s:4:\"IM33\";s:1:\"3\";s:4:\"IM36\";s:1:\"4\";s:4:\"IM37\";s:1:\"4\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM39\";s:1:\"2\";s:4:\"IM40\";s:1:\"2\";s:4:\"IM41\";s:1:\"2\";s:4:\"IM42\";s:1:\"3\";s:4:\"IM43\";s:1:\"3\";s:4:\"IM45\";s:1:\"4\";s:4:\"IM47\";s:1:\"4\";s:4:\"IM49\";s:1:\"2\";s:4:\"IM50\";s:1:\"4\";s:4:\"IM51\";s:1:\"4\";s:4:\"IM52\";s:1:\"3\";s:4:\"IM53\";s:1:\"3\";s:4:\"IM54\";s:1:\"4\";s:4:\"IM55\";s:1:\"4\";s:4:\"IM56\";s:1:\"2\";}', '0.9970', '2021-06-28 05:24:09', 'BM2', 'KD-7'),
(8, 'a:5:{s:3:\"BM5\";s:6:\"0.9962\";s:3:\"BM1\";s:6:\"0.9731\";s:3:\"BM4\";s:6:\"0.9673\";s:3:\"BM3\";s:6:\"0.9564\";s:3:\"BM2\";s:6:\"0.9480\";}', 'a:44:{s:3:\"IM1\";s:1:\"3\";s:3:\"IM7\";s:1:\"2\";s:3:\"IM8\";s:1:\"3\";s:3:\"IM9\";s:1:\"4\";s:4:\"IM10\";s:1:\"3\";s:4:\"IM11\";s:1:\"3\";s:4:\"IM12\";s:1:\"3\";s:4:\"IM13\";s:1:\"4\";s:4:\"IM15\";s:1:\"3\";s:4:\"IM17\";s:1:\"2\";s:4:\"IM18\";s:1:\"4\";s:4:\"IM19\";s:1:\"3\";s:4:\"IM21\";s:1:\"3\";s:4:\"IM22\";s:1:\"2\";s:4:\"IM23\";s:1:\"2\";s:4:\"IM27\";s:1:\"2\";s:4:\"IM28\";s:1:\"3\";s:4:\"IM29\";s:1:\"2\";s:4:\"IM30\";s:1:\"3\";s:4:\"IM33\";s:1:\"3\";s:4:\"IM34\";s:1:\"3\";s:4:\"IM35\";s:1:\"2\";s:4:\"IM36\";s:1:\"4\";s:4:\"IM37\";s:1:\"4\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM39\";s:1:\"3\";s:4:\"IM40\";s:1:\"3\";s:4:\"IM41\";s:1:\"3\";s:4:\"IM42\";s:1:\"3\";s:4:\"IM43\";s:1:\"3\";s:4:\"IM44\";s:1:\"3\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM46\";s:1:\"3\";s:4:\"IM47\";s:1:\"3\";s:4:\"IM50\";s:1:\"2\";s:4:\"IM51\";s:1:\"3\";s:4:\"IM54\";s:1:\"2\";s:4:\"IM55\";s:1:\"2\";s:4:\"IM56\";s:1:\"3\";s:4:\"IM57\";s:1:\"4\";s:4:\"IM58\";s:1:\"4\";s:4:\"IM59\";s:1:\"2\";s:4:\"IM60\";s:1:\"2\";s:4:\"IM61\";s:1:\"3\";}', '0.9962', '2021-06-28 05:29:23', 'BM5', 'KD-8'),
(9, 'a:5:{s:3:\"BM5\";s:6:\"0.9981\";s:3:\"BM2\";s:6:\"0.9965\";s:3:\"BM3\";s:6:\"0.9493\";s:3:\"BM4\";s:6:\"0.9255\";s:3:\"BM1\";s:6:\"0.9029\";}', 'a:39:{s:3:\"IM1\";s:1:\"2\";s:3:\"IM3\";s:1:\"2\";s:3:\"IM4\";s:1:\"2\";s:3:\"IM5\";s:1:\"2\";s:3:\"IM6\";s:1:\"2\";s:3:\"IM7\";s:1:\"4\";s:3:\"IM8\";s:1:\"3\";s:3:\"IM9\";s:1:\"4\";s:4:\"IM10\";s:1:\"3\";s:4:\"IM11\";s:1:\"4\";s:4:\"IM12\";s:1:\"3\";s:4:\"IM13\";s:1:\"4\";s:4:\"IM15\";s:1:\"4\";s:4:\"IM16\";s:1:\"3\";s:4:\"IM17\";s:1:\"3\";s:4:\"IM18\";s:1:\"4\";s:4:\"IM21\";s:1:\"4\";s:4:\"IM22\";s:1:\"4\";s:4:\"IM23\";s:1:\"4\";s:4:\"IM31\";s:1:\"4\";s:4:\"IM32\";s:1:\"4\";s:4:\"IM33\";s:1:\"4\";s:4:\"IM36\";s:1:\"2\";s:4:\"IM37\";s:1:\"2\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM39\";s:1:\"4\";s:4:\"IM40\";s:1:\"4\";s:4:\"IM41\";s:1:\"4\";s:4:\"IM42\";s:1:\"4\";s:4:\"IM43\";s:1:\"4\";s:4:\"IM44\";s:1:\"4\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM54\";s:1:\"2\";s:4:\"IM56\";s:1:\"4\";s:4:\"IM57\";s:1:\"4\";s:4:\"IM58\";s:1:\"4\";s:4:\"IM59\";s:1:\"3\";s:4:\"IM60\";s:1:\"4\";s:4:\"IM61\";s:1:\"3\";}', '0.9981', '2021-06-28 05:36:15', 'BM5', 'KD-9'),
(10, 'a:5:{s:3:\"BM4\";s:6:\"0.9559\";s:3:\"BM3\";s:6:\"0.9367\";s:3:\"BM2\";s:6:\"0.9216\";s:3:\"BM5\";s:6:\"0.9114\";s:3:\"BM1\";s:6:\"0.7677\";}', 'a:33:{s:3:\"IM1\";s:1:\"2\";s:3:\"IM2\";s:1:\"2\";s:3:\"IM7\";s:1:\"4\";s:3:\"IM8\";s:1:\"2\";s:3:\"IM9\";s:1:\"3\";s:4:\"IM12\";s:1:\"3\";s:4:\"IM13\";s:1:\"4\";s:4:\"IM17\";s:1:\"2\";s:4:\"IM18\";s:1:\"3\";s:4:\"IM19\";s:1:\"2\";s:4:\"IM20\";s:1:\"2\";s:4:\"IM21\";s:1:\"4\";s:4:\"IM22\";s:1:\"4\";s:4:\"IM23\";s:1:\"4\";s:4:\"IM27\";s:1:\"2\";s:4:\"IM28\";s:1:\"2\";s:4:\"IM29\";s:1:\"2\";s:4:\"IM34\";s:1:\"2\";s:4:\"IM35\";s:1:\"2\";s:4:\"IM36\";s:1:\"3\";s:4:\"IM37\";s:1:\"4\";s:4:\"IM38\";s:1:\"3\";s:4:\"IM39\";s:1:\"4\";s:4:\"IM45\";s:1:\"2\";s:4:\"IM46\";s:1:\"2\";s:4:\"IM47\";s:1:\"3\";s:4:\"IM48\";s:1:\"3\";s:4:\"IM49\";s:1:\"3\";s:4:\"IM55\";s:1:\"2\";s:4:\"IM56\";s:1:\"3\";s:4:\"IM57\";s:1:\"3\";s:4:\"IM58\";s:1:\"3\";s:4:\"IM61\";s:1:\"3\";}', '0.9559', '2021-06-28 05:45:44', 'BM4', 'KD-10'),
(11, 'a:5:{s:3:\"BM2\";s:6:\"0.9994\";s:3:\"BM5\";s:6:\"0.9447\";s:3:\"BM3\";s:6:\"0.7541\";s:3:\"BM4\";s:6:\"0.7289\";s:3:\"BM1\";s:6:\"0.6105\";}', 'a:39:{s:3:\"IM1\";s:1:\"2\";s:3:\"IM3\";s:1:\"4\";s:3:\"IM4\";s:1:\"4\";s:3:\"IM5\";s:1:\"2\";s:3:\"IM6\";s:1:\"2\";s:3:\"IM7\";s:1:\"2\";s:3:\"IM8\";s:1:\"2\";s:4:\"IM12\";s:1:\"3\";s:4:\"IM13\";s:1:\"3\";s:4:\"IM14\";s:1:\"2\";s:4:\"IM15\";s:1:\"3\";s:4:\"IM16\";s:1:\"4\";s:4:\"IM18\";s:1:\"4\";s:4:\"IM19\";s:1:\"3\";s:4:\"IM20\";s:1:\"3\";s:4:\"IM25\";s:1:\"3\";s:4:\"IM26\";s:1:\"2\";s:4:\"IM30\";s:1:\"2\";s:4:\"IM31\";s:1:\"2\";s:4:\"IM32\";s:1:\"3\";s:4:\"IM33\";s:1:\"2\";s:4:\"IM34\";s:1:\"2\";s:4:\"IM36\";s:1:\"2\";s:4:\"IM37\";s:1:\"2\";s:4:\"IM38\";s:1:\"3\";s:4:\"IM42\";s:1:\"2\";s:4:\"IM46\";s:1:\"2\";s:4:\"IM47\";s:1:\"2\";s:4:\"IM48\";s:1:\"3\";s:4:\"IM49\";s:1:\"2\";s:4:\"IM50\";s:1:\"2\";s:4:\"IM51\";s:1:\"3\";s:4:\"IM53\";s:1:\"4\";s:4:\"IM54\";s:1:\"3\";s:4:\"IM55\";s:1:\"4\";s:4:\"IM56\";s:1:\"3\";s:4:\"IM57\";s:1:\"3\";s:4:\"IM58\";s:1:\"3\";s:4:\"IM59\";s:1:\"3\";}', '0.9994', '2021-06-28 05:57:17', 'BM2', 'KD-11'),
(12, 'a:5:{s:3:\"BM2\";s:6:\"0.9834\";s:3:\"BM4\";s:6:\"0.9624\";s:3:\"BM1\";s:6:\"0.9552\";s:3:\"BM5\";s:6:\"0.9478\";s:3:\"BM3\";s:6:\"0.1800\";}', 'a:31:{s:3:\"IM3\";s:1:\"3\";s:3:\"IM4\";s:1:\"3\";s:3:\"IM5\";s:1:\"2\";s:4:\"IM10\";s:1:\"3\";s:4:\"IM11\";s:1:\"3\";s:4:\"IM12\";s:1:\"2\";s:4:\"IM13\";s:1:\"3\";s:4:\"IM15\";s:1:\"2\";s:4:\"IM20\";s:1:\"2\";s:4:\"IM25\";s:1:\"2\";s:4:\"IM26\";s:1:\"2\";s:4:\"IM27\";s:1:\"4\";s:4:\"IM28\";s:1:\"4\";s:4:\"IM29\";s:1:\"4\";s:4:\"IM30\";s:1:\"2\";s:4:\"IM31\";s:1:\"2\";s:4:\"IM32\";s:1:\"4\";s:4:\"IM38\";s:1:\"4\";s:4:\"IM39\";s:1:\"2\";s:4:\"IM40\";s:1:\"2\";s:4:\"IM43\";s:1:\"4\";s:4:\"IM45\";s:1:\"4\";s:4:\"IM49\";s:1:\"4\";s:4:\"IM50\";s:1:\"4\";s:4:\"IM51\";s:1:\"4\";s:4:\"IM55\";s:1:\"4\";s:4:\"IM57\";s:1:\"2\";s:4:\"IM58\";s:1:\"2\";s:4:\"IM59\";s:1:\"4\";s:4:\"IM60\";s:1:\"3\";s:4:\"IM61\";s:1:\"3\";}', '0.9834', '2021-06-28 06:06:44', 'BM2', 'KD-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_identifikasi`
--

CREATE TABLE `t_identifikasi` (
  `kode_identifikasi` int(11) NOT NULL,
  `mb` float NOT NULL,
  `md` float NOT NULL,
  `cf_bidang_masalah` float NOT NULL,
  `cf_item_masalah` float NOT NULL,
  `kode_bidang_masalah` varchar(11) NOT NULL,
  `kode_item_masalah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_identifikasi`
--

INSERT INTO `t_identifikasi` (`kode_identifikasi`, `mb`, `md`, `cf_bidang_masalah`, `cf_item_masalah`, `kode_bidang_masalah`, `kode_item_masalah`) VALUES
(1, 0.9, 0.2, 0.7, 0, 'BM1', 'IM1'),
(2, 0.6, 0.3, 0.3, 0, 'BM1', 'IM2'),
(3, 0.65, 0.03, 0.62, 0, 'BM2', 'IM3'),
(4, 0.6, 0.2, 0.4, 0, 'BM2', 'IM4'),
(5, 0.8, 0.2, 0.6, 0, 'BM2', 'IM5'),
(6, 0.8, 0.3, 0.5, 0, 'BM2', 'IM6'),
(7, 0.6, 0.3, 0.3, 0, 'BM2', 'IM7'),
(8, 0.6, 0.2, 0.4, 0, 'BM3', 'IM8'),
(9, 0.7, 0.2, 0.5, 0, 'BM3', 'IM9'),
(10, 0.8, 0.3, 0.5, 0, 'BM4', 'IM10'),
(11, 0.7, 0.2, 0.5, 0, 'BM5', 'IM11'),
(12, 0.7, 0.35, 0.35, 0, 'BM5', 'IM12'),
(13, 0.8, 0.4, 0.4, 0, 'BM1', 'IM13'),
(14, 0.85, 0.3, 0.55, 0, 'BM1', 'IM14'),
(15, 0.9, 0.5, 0.4, 0, 'BM2', 'IM15'),
(16, 0.5, 0.05, 0.45, 0, 'BM2', 'IM16'),
(17, 0.8, 0.35, 0.45, 0, 'BM2', 'IM17'),
(18, 0.5, 0.04, 0.46, 0, 'BM2', 'IM18'),
(19, 0.7, 0.3, 0.4, 0, 'BM3', 'IM19'),
(20, 0.8, 0.2, 0.6, 0, 'BM3', 'IM20'),
(21, 0.7, 0.3, 0.4, 0, 'BM3', 'IM21'),
(22, 0.8, 0.1, 0.7, 0, 'BM3', 'IM22'),
(23, 0.7, 0.2, 0.5, 0, 'BM4', 'IM23'),
(24, 0.7, 0.08, 0.62, 0, 'BM5', 'IM24'),
(25, 0.8, 0.2, 0.6, 0, 'BM5', 'IM25'),
(26, 0.75, 0.3, 0.45, 0, 'BM5', 'IM26'),
(27, 0.7, 0.11, 0.59, 0, 'BM1', 'IM27'),
(28, 0.7, 0.1, 0.6, 0, 'BM1', 'IM28'),
(29, 0.5, 0.1, 0.4, 0, 'BM1', 'IM29'),
(30, 0.8, 0.2, 0.6, 0, 'BM1', 'IM30'),
(31, 0.75, 0.4, 0.35, 0, 'BM2', 'IM31'),
(32, 0.7, 0.3, 0.4, 0, 'BM2', 'IM32'),
(33, 0.71, 0.2, 0.51, 0, 'BM3', 'IM33'),
(34, 0.8, 0.1, 0.7, 0, 'BM3', 'IM34'),
(35, 0.9, 0.3, 0.6, 0, 'BM3', 'IM35'),
(36, 0.6, 0.05, 0.55, 0, 'BM4', 'IM36'),
(37, 0.85, 0.3, 0.55, 0, 'BM4', 'IM37'),
(38, 0.7, 0.1, 0.6, 0, 'BM4', 'IM38'),
(39, 0.8, 0.2, 0.6, 0, 'BM5', 'IM39'),
(40, 0.8, 0.2, 0.6, 0, 'BM5', 'IM40'),
(41, 0.8, 0.2, 0.6, 0, 'BM5', 'IM41'),
(42, 0.7, 0.3, 0.4, 0, 'BM5', 'IM42'),
(43, 0.8, 0.3, 0.5, 0, 'BM5', 'IM43'),
(44, 0.9, 0.04, 0.86, 0, 'BM1', 'IM44'),
(45, 0.6, 0.1, 0.5, 0, 'BM1', 'IM45'),
(46, 0.9, 0.3, 0.6, 0, 'BM2', 'IM46'),
(47, 0.6, 0.4, 0.2, 0, 'BM2', 'IM47'),
(48, 0.9, 0.1, 0.8, 0, 'BM2', 'IM48'),
(49, 0.8, 0.35, 0.45, 0, 'BM4', 'IM49'),
(50, 0.8, 0.05, 0.75, 0, 'BM4', 'IM50'),
(51, 0.8, 0.3, 0.5, 0, 'BM5', 'IM51'),
(52, 0.8, 0.1, 0.7, 0, 'BM5', 'IM52'),
(53, 0.6, 0.2, 0.4, 0, 'BM2', 'IM53'),
(54, 0.8, 0.2, 0.6, 0, 'BM2', 'IM54'),
(55, 0.8, 0.2, 0.6, 0, 'BM2', 'IM55'),
(56, 0.6, 0.2, 0.4, 0, 'BM2', 'IM56'),
(57, 0.7, 0.05, 0.65, 0, 'BM5', 'IM57'),
(58, 0.8, 0.04, 0.76, 0, 'BM5', 'IM58'),
(59, 0.8, 0.1, 0.7, 0, 'BM2', 'IM59'),
(60, 0.9, 0.3, 0.6, 0, 'BM2', 'IM60'),
(61, 0.9, 0.4, 0.5, 0, 'BM4', 'IM61'),
(63, 0.8, 0.2, 0.6, 0, '', 'IM1'),
(64, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_item_masalah`
--

CREATE TABLE `t_item_masalah` (
  `id_item_masalah` int(11) NOT NULL,
  `kode_item_masalah` varchar(5) NOT NULL,
  `nama_item_masalah` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_item_masalah`
--

INSERT INTO `t_item_masalah` (`id_item_masalah`, `kode_item_masalah`, `nama_item_masalah`) VALUES
(1, 'IM1', 'Tugas-tugas pelajaran yang diberikan guru tidak dapat saya kerjakan dengan baik karena materi pelajaran yang menunjang penyelesaian tugas tersebut tidak saya kuasai.'),
(2, 'IM2', 'Saya tidak dapat mengaitkan atau melihat urutan yang teratur antara materi pelajaran terdahulu dengan materi pelajaran berikutnya.'),
(3, 'IM3', 'Sewaktu proses belajar-mengajar di kelas berlangsung saya tidak memanfaatkaan kesempatan untuk bertanya tentang hal-hal yang kurang saya pahami.'),
(4, 'IM4', 'Sewaktu proses belajar-mengajar di kelas berlangsung saya mengalami kesulitan menyusun kata-kata untuk bertanya kepada guru tentang hal-hal yang kurang saya pahami.'),
(5, 'IM5', 'Saya sulit menghindarkan diri dari berbuat curang sewaktu ulangan/ujian berlangsung.'),
(6, 'IM6', 'Saya sulit menghindarkan diri dari melayani pertanyaan teman sewaktu ulangan/ujian berlangsung.'),
(7, 'IM7', 'Saya mengalami kesulitan dalam membuat ringkasan bahan bacaan (misalnya dari buku pelajaran) untuk melengkapi catatan pelajaran.'),
(8, 'IM8', 'Kegiatan belajar dan kegiatan sekolah lainnya terganggu karena saya harus membantu orang tua bekerja.'),
(9, 'IM9', 'Karena saya harus mempersiapkan biaya hidup dan lain-lainnya seperti pulang kampung untuk menjemput perbekalan, saya kehilangan banyak waktu untuk mengikuti pelajaran dan kegiatan sekolah lainnya.'),
(10, 'IM10', 'Khayalan-khayalan dan lamunan-lamunan tentang sesuatu, mengganggu konsentrasi saya dalam bélajar.'),
(11, 'IM11', 'Saya mengalami kesulitan dalam mengajukan pertanyaan kepada guru karena kurang baiknya hubungan saya dengan guru tersebut.'),
(12, 'IM12', 'Ketidaksukaan saya kepada guru tertentu menyebabkan saya melalaikan tugas-tugas pelajaran.'),
(13, 'IM13', 'Saya mengalami kesulitan dalam belajar karena materi pelajaran tidak berurutan. Sehingga materi pelajaran terdahulu tidak menunjang untuk mempelajari materi pelajaran berikutnya.'),
(14, 'IM14', 'Saya mengalami kesulitan dalam menyelesaikan tugas pelajaran karena tidak meneliti petunjuk mengerjakan tugas tersebut.'),
(15, 'IM15', 'Saya kehabisan waktu untuk mengoreksi kembali semua jawaban ulangan/ujian sebelum diserahkan kepada guru/pengawas.'),
(16, 'IM16', 'Saya menghafal hukum-hukum, definisi-definisi, rumus-rumus dan sebagainya tanpa mamahami benar apa yang dimaksud.'),
(17, 'IM17', 'Saya mengalami kesulitan memahami bahan bacaan (misalnya dari buku pelajaran) yang memuat istilah-istilah baru.'),
(18, 'IM18', 'Dalam mempelajari bahan bacaan, saya melewatkan bagian-bagian tertentu seperti grafik, diagram dan tabel. Yang ternyata hal itu adalah penting.'),
(19, 'IM19', 'Kegiatan belajar saya terganggu karena setiap kali harus memikirkan biaya untuk membayar SPP.'),
(20, 'IM20', 'Kegiatan belajar saya terganggu karena setiap kali harus memikirkan biaya untuk membayar untuk hal-hal lainnya.'),
(21, 'IM21', 'Saya mengalami kesulitan bila tugas-tugas pelajaran diharuskan dibuat di buku tersendiri, misalnya lembaran kerja siswa (LKS) karena saya tidak memiliki biaya untuk membeli itu.'),
(22, 'IM22', 'Saya kurang mampu tampil dengan kepercayaan diri yang tinggi di hadapan guru dan teman-teman karena kekurangan biaya hidup sehari-hari.'),
(23, 'IM23', 'Saya kurang semangat dalam mengikuti pelajaran sehingga sewaktu belajar saya membuat gambar, coret-coretan pada buku catatan atau meja belajar, atau melakukan kegiatan-kegiatan yang tidak menentu lainnya.'),
(24, 'IM24', 'Suara musik yang bergema di lingkungan rumah atau tetangga serta kebisingan lainnya mengakibatkan saya sukar berkonsentrasi dalam belajar.'),
(25, 'IM25', 'Saya sulit belajar di rumah karena penghuni rumah terlalu banyak.'),
(26, 'IM26', 'Saya sulit belajar di rumah karena tamu terlalu banyak.'),
(27, 'IM27', 'Penguasaan saya terhadap materi-materi pelajaran di kelas sebelumnya kurang membantu saya menguasai materi pelajaran di kelas yang sekarang.'),
(28, 'IM28', 'Saya mengalami kesulitan memahami isi buku pelajaran karena isi buku tersebut tidak berurutan.'),
(29, 'IM29', 'Saya mengalami kesulitan memahami isi buku pelajaran karena materi yang terdahulu tidak mendasari pemahaman materi berikutnya.'),
(30, 'IM30', 'Ketidakmampuan saya dalam menjawab soal-soal ulangan/ujian disebabkan karena kurangnya pengetahuan dasar yang menunjang.'),
(31, 'IM31', 'Saya mengalami kesulitan dalam menentukan ide pokok/intisari dari bahan bacaan yang saya pelajari.'),
(32, 'IM32', 'Kesalahan saya dalam menjawab soal-soal ulangan/ujian, ternyata disebabkan oleh kecerobohan saya dalam menjawab soal-soal tersebut.'),
(33, 'IM33', 'Pemikiran saya untuk memperoleh beasiswa atau tunjangan belajar lainnya mengganggu saya berkonsentrasi dalam belajar.'),
(34, 'IM34', 'Ketidakmampuan saya untuk memenuhi tuntutan seperti pakaian seragam, iuran dan sebagainya, membuat saya kesulitan dalam mengikuti pelajaran.'),
(35, 'IM35', 'Ketidakmampuan saya untuk memenuhi tuntutan seperti pakaian seragam, iuran dan sebagainya, membuat saya kurang bersemangat dalam mengikuti pelajaran.'),
(36, 'IM36', 'Ketidaksenangan saya terhadap guru tertentu tidak menjadikan saya mengabaikan mata pelajaran tersebut.'),
(37, 'IM37', 'Ketidaksenangan saya terhadap mata pelajaran tertentu tidak menjadikan saya mengabaikan mata pelajaran tersebut.'),
(38, 'IM38', 'Perasaan gelisah, murung atau pikiran kacau membuat saya tidak dapat belajar dengan baik.'),
(39, 'IM39', 'Di rumah saya harus membantu adik-adik belajar, sehingga pelajaran saya terbengkalai.'),
(40, 'IM40', 'Di rumah saya harus mengasuh adik-adik, sehingga pelajaran saya terbengkalai.'),
(41, 'IM41', 'Di rumah saya harus membantu pekerjaan sehari-hari, sehingga pelajaran saya terbengkalai.'),
(42, 'IM42', 'Saya tidak mau bertanya sewaktu pelajaran dalam kelas berlangsung karena takut ditertawakan oleh teman-teman jika ada yang salah.'),
(43, 'IM43', 'Saya tidak mau memberikan tanggapan sewaktu pelajaran dalam kelas berlangsung karena takut ditertawakan oleh teman-teman jika ada yang salah.'),
(44, 'IM44', 'Kurikulum, urutan materi pelajaran dan buku-buku pelajaran kurang membantu saya dalam menguasai materi pelajaran.'),
(45, 'IM45', 'Saya kesulitan dalam memahami materi pelajaran, disebabkan karena saya tidak memahami konsep-konsep dasar dan istilah-istilah yang harus dikuasai terlebih dahulu.'),
(46, 'IM46', 'Rendahnya hasil ulangan/ujian yang saya peroleh disebabkan karena saya kurang menguasai materi pelajaran yang diajarkan oleh guru.'),
(47, 'IM47', 'Dalam mengerjakan tugas yang berupa makalah atau laporan tertulis saya mengalami kesulitan berkenaan dengan tata cara penulisan (ejaan, tata bahasa, tanda baca), pengutipan, format dan sistematika penulisan.'),
(48, 'IM48', 'Saya mengalami kesulitan memanfaatkan waktu luang untuk mendalami materi pelajaran.'),
(49, 'IM49', 'Ketika hendak belajar saya merasa sangat lelah atau jenuh atau mengantuk sehingga tidak dapat belajar dengan baik.'),
(50, 'IM50', 'Saya membuang-buang waktu untuk mengobrol, menonton televisi, mendengarkan musik, menonton di bioskop dan sebagainya. Yang sebenarnya waktu itu amat berguna untuk kegiatan belajar saya.'),
(51, 'IM51', 'Kegiatan organisasi kesiswaan mengganggu kegiatan belajar saya.'),
(52, 'IM52', 'Lingkungan sekolah yang kurang nyaman mengakibatkan proses belajar saya terganggu.'),
(53, 'IM53', 'Bila saya harus mengerjakan tugas-tugas pelajaran yang berat atau tidak menarik, maka tugas itu saya selesaikan seadanya untuk sekedar memenuhi tuntutan saja.'),
(54, 'IM54', 'Saya kurang berminat dan cepat bosan dalam membaca buku pelajaran.'),
(55, 'IM55', 'Saya kurang mampu memberikan sumbangan berupa ide atau pendapat kepada teman dalam kegiatan belajar kelompok.'),
(56, 'IM56', 'Pada waktu belajar saya mengalami kesulitan untuk menghindarkan diri dari gangguan-gangguan yang mungkin timbul seperti menonton televisi, mendengarkan musik, ajakan teman, dan sebagainya.'),
(57, 'IM57', 'Letak rumah yang jauh dari sekolah melemahkan semangat saya untuk belajar.'),
(58, 'IM58', 'Kesulitan transportasi melemahkan semangat saya untuk belajar.'),
(59, 'IM59', 'Saya mengalami kesulitan dalam memahami materi pelajaran, terutama yang berbentuk grafik, gambar, dan tabel.'),
(60, 'IM60', 'Saya mengalami kesulitan untuk mengingat materi pelajaran tertentu.'),
(61, 'IM61', 'Saya mengalami hambatan tertentu dalam belajar bersama karena suasana kelompok yang kurang menyenangkan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_layanan`
--

CREATE TABLE `t_layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_bidang_masalah` varchar(100) NOT NULL,
  `layanan` varchar(1000) NOT NULL,
  `detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_layanan`
--

INSERT INTO `t_layanan` (`id_layanan`, `nama_bidang_masalah`, `layanan`, `detail`) VALUES
(1, 'Layanan Pembelajaran', 'Layanan ini untuk membantu siswa dalam mengembangkan keterampilan belajar dan penguasaan terhadap materi pelajaran.\r\n\r\nLayanan bimbingan dan konseling yang memungkinkan peserta didik (klien) mengembangkan diri berkenaan dengan sikap dan kebiasaan belajar yang baik, materi belajar yang cocok dengan kecepatan dan kesulitan belajarnya, serta berbagai aspek tujuan dan kegiatan belajar lainnya. \r\n\r\nLayanan diberikan pada peserta didik dengan tujuan memungkinkan siswa memahami dan mengembangkan sikap dan kebiasaan belajar yang baik. Keterampilan dan materi belajar yang diberikan cocok dengan kecepatan dan kesulitan belajarnya, serta tuntutan kemampuan yang berguna dalam kehidupan dan perkembangan dirinya.\r\n', ''),
(2, 'Layanan Konseling Perorangan ', 'Konseling Perorangan (KP) merupakan layanan konseling yang diselenggarakan oleh seorang konselor terhadap seorang klien dalam rangka pengentasan masalah pribadi klien. Dalam suasana tatap muka dilaksanakan interaksi langsung antara klien dan Konselor, membahas berbagai hal tentang masalah yang dialami klien. Pembahasan tersebut bersifat mendalam menyentuh hal-hal penting tentang diri klien (bahkan sangat penting yang boleh jadi penyangkut rahasia pribadi klien); bersifat meluas meliputi berbagai sisi yang menyangkut permasalahan klien; namun juga bersifat spesifik menuju ke arah pengentasan masalah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pilihan_pengguna`
--

CREATE TABLE `t_pilihan_pengguna` (
  `id_pilihan_pengguna` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_pilihan_pengguna`
--

INSERT INTO `t_pilihan_pengguna` (`id_pilihan_pengguna`, `kondisi`, `keterangan`) VALUES
(1, 'Tidak Pernah', ''),
(2, 'Kadang-kadang', ''),
(3, 'Sering', ''),
(4, 'Selalu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE `t_siswa` (
  `id_siswa` int(11) NOT NULL,
  `kode_siswa` varchar(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`id_siswa`, `kode_siswa`, `nama_siswa`, `jenis_kelamin`, `kelas`) VALUES
(1, 'KD-1', 'SINTYA SRIKANDI. P.R', 'Perempuan', 'X IPA 1'),
(2, 'KD-2', 'NUR HALIZA HIOLA', 'Perempuan', 'X IPA 1'),
(3, 'KD-3', 'ANGEL CLAUDYA LARASATI', 'Perempuan', 'X IPA 1'),
(4, 'KD-4', 'AURA FERYAL', 'Perempuan', 'X IPA 2'),
(5, 'KD-5', 'HUMAIRA ANSARINI', 'Perempuan', 'X IPA 2'),
(6, 'KD-6', 'FADIEL WIRAHMAN S.', 'Laki-laki', 'X IPA 2'),
(7, 'KD-7', 'IMAM KAHFI', 'Laki-laki', 'X IPA 2'),
(8, 'KD-8', 'MOHAMMAD GATHAN MOIDADY', 'Laki-laki', 'X IPA 2'),
(9, 'KD-9', 'NATALIA ANTOLIS', 'Perempuan', 'X IPA 4'),
(10, 'KD-10', 'HIDAYATULLAH', 'Laki-laki', 'X IPA 4'),
(11, 'KD-11', 'YULITA MAGFIRAH', 'Perempuan', 'X IPA 4'),
(12, 'KD-12', 'RADHA RANI SAPUTRI DEWI', 'Perempuan', 'X IPA 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `kode_user`, `nama`, `nama_pengguna`, `kata_sandi`) VALUES
(1, 'USER-S1', 'user', 'user', 'user'),
(2, 'USER-S2', 'emil', 'emile', 'emile');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_bidang_masalah`
--
ALTER TABLE `t_bidang_masalah`
  ADD PRIMARY KEY (`id_bidang_masalah`);

--
-- Indeks untuk tabel `t_hasil`
--
ALTER TABLE `t_hasil`
  ADD PRIMARY KEY (`kode_hasil`);

--
-- Indeks untuk tabel `t_identifikasi`
--
ALTER TABLE `t_identifikasi`
  ADD PRIMARY KEY (`kode_identifikasi`);

--
-- Indeks untuk tabel `t_item_masalah`
--
ALTER TABLE `t_item_masalah`
  ADD PRIMARY KEY (`id_item_masalah`);

--
-- Indeks untuk tabel `t_layanan`
--
ALTER TABLE `t_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `t_pilihan_pengguna`
--
ALTER TABLE `t_pilihan_pengguna`
  ADD PRIMARY KEY (`id_pilihan_pengguna`);

--
-- Indeks untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_bidang_masalah`
--
ALTER TABLE `t_bidang_masalah`
  MODIFY `id_bidang_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_hasil`
--
ALTER TABLE `t_hasil`
  MODIFY `kode_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_identifikasi`
--
ALTER TABLE `t_identifikasi`
  MODIFY `kode_identifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `t_item_masalah`
--
ALTER TABLE `t_item_masalah`
  MODIFY `id_item_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `t_layanan`
--
ALTER TABLE `t_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_pilihan_pengguna`
--
ALTER TABLE `t_pilihan_pengguna`
  MODIFY `id_pilihan_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
