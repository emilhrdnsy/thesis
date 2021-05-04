-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2021 pada 17.13
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

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
  `id_login` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL,
  `batas_login` int(3) NOT NULL,
  `blokir` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_login`, `nama`, `nama_pengguna`, `kata_sandi`, `batas_login`, `blokir`) VALUES
(1, 'admin', 'admin', 'admin', 20, 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bidang_masalah`
--

CREATE TABLE `t_bidang_masalah` (
  `id_bidang_masalah` int(11) NOT NULL,
  `kode_bidang_masalah` varchar(5) NOT NULL,
  `nama_bidang_masalah` varchar(500) NOT NULL,
  `detail_bidang_masalah` varchar(500) NOT NULL,
  `layanan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_bidang_masalah`
--

INSERT INTO `t_bidang_masalah` (`id_bidang_masalah`, `kode_bidang_masalah`, `nama_bidang_masalah`, `detail_bidang_masalah`, `layanan`) VALUES
(1, 'BM1', 'Penguasaan Materi Pelajaran', 'Masalah yang sering terjadi pada konten prasyarat penguasaan materi adalah ditemukan adanya siswa yang memiliki hambatan dan tidak menguasai materi pelajaran yang telah diberikan guru dan siswa yang tidak mampu menjawab soal-soal ulangan atau ujian karena kurangnya penguasaan materi pelajaran.   \r\n                                  \r\n                                ', 'lorem 1'),
(2, 'BM2', 'Keterampilan Belajar', 'Masalah yang sering terjadi pada konten keterampilan belajar adalah siwa yang tidak mencatat materi pelajaran yang telah diberikan guru, siswa mengalami kesulitan terhadap materi yang memuat kata-kata dalam bahasa asing, siswa yang memiliki kebiasaan mengganggu teman ketika belajar atau ribut ketika jam pelajaran berlangsung, siswa yang sering lupa atau tidak membawa peralatan yang diperlukan dalam belajar di sekolah, tidak menggunakan waktu luang untuk mendalami materi pelajaran, tidak terbiasa', 'lorem 2'),
(3, 'BM3', 'Sarana Belajar', 'Masalah yang sering terjadi pada konten sarana dan prasarana belajar yaitu siswa merasa tidak nyaman didalam kelas karena terasa panas, sarana belajar yang tidak memadai di rumah dan ekonomi orang tua yang pas-pasan. ', 'lorem 3'),
(4, 'BM4', 'Diri Pribadi', 'Masalah yang sering terjadi pada konten diri sendiri atau masalah pribadi siswa yaitu siswa merasa tidak konsestrasi belajar dan motivasi belajarnya sangat rendah, merokok di sekolah supaya terlihat keren oleh teman-temannya dan Siswa yang tidak menghormati atau mengolok-olok gurunya. ', 'lorem 4'),
(5, 'BM5', 'Keadaan Lingkungan Fisik dan Lingkungan Sosio Emosional', 'Masalah yang sering terjadi pada konten lingkungan belajar dan sosio-emosional yaitu siswa sering terlambat ke sekolah karena jarak tempuh antara rumah siswa ke sekolah sangat jauh, Siswa yang tidak bisa bergaul dengan teman kelasnya, Sering bolos sekolah karena ingin main bersama teman dan siswa yang merasa rendah diri karena sering di bully.  \r\n                                  \r\n                                ', 'lorem 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_bidang_masalah`
--

CREATE TABLE `t_detail_bidang_masalah` (
  `id` int(11) NOT NULL,
  `nama_item_masalah` varchar(100) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_detail_bidang_masalah`
--

INSERT INTO `t_detail_bidang_masalah` (`id`, `nama_item_masalah`, `detail`) VALUES
(1, 'Prasyarat penguasaan materi pelajaran', 'Masalah yang sering terjadi pada konten prasyarat penguasaan materi adalah ditemukan adanya siswa yang memiliki hambatan dan tidak menguasai materi pelajaran yang telah diberikan guru dan siswa yang tidak mampu menjawab soal-soal ulangan atau ujian karena kurangnya penguasaan materi pelajaran. '),
(2, 'Ketrampilan belajar ', 'Masalah yang sering terjadi pada konten keterampilan belajar adalah siwa yang tidak mencatat materi pelajaran yang telah diberikan guru, siswa mengalami kesulitan terhadap materi yang memuat kata-kata dalam bahasa asing, siswa yang memiliki kebiasaan mengganggu teman ketika belajar atau ribut ketika jam pelajaran berlangsung, siswa yang sering lupa atau tidak membawa peralatan yang diperlukan dalam belajar di sekolah, tidak menggunakan waktu luang untuk mendalami materi pelajaran, tidak terbiasa'),
(3, 'Sarana belajar', 'Masalah yang sering terjadi pada konten sarana dan prasarana belajar yaitu siswa merasa tidak nyaman didalam kelas karena terasa panas, sarana belajar yang tidak memadai di rumah dan ekonomi orang tua yang pas-pasan. '),
(4, 'Keadaan diri pribadi', 'Masalah yang sering terjadi pada konten diri sendiri atau masalah pribadi siswa yaitu siswa merasa tidak konsestrasi belajar dan motivasi belajarnya sangat rendah, merokok di sekolah supaya terlihat keren oleh teman-temannya dan Siswa yang tidak menghormati atau mengolok-olok gurunya. '),
(5, 'Lingkungan belajar dan sosio emosional', 'Masalah yang sering terjadi pada konten lingkungan belajar dan sosio-emosional yaitu siswa sering terlambat ke sekolah karena jarak tempuh antara rumah siswa ke sekolah sangat jauh, Siswa yang tidak bisa bergaul dengan teman kelasnya, Sering bolos sekolah karena ingin main bersama teman dan siswa yang merasa rendah diri karena sering di bully.');

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
(1, 'a:2:{s:3:\"BM2\";s:6:\"0.5534\";s:3:\"BM4\";s:6:\"0.5334\";}', 'a:3:{s:4:\"IM59\";s:1:\"3\";s:4:\"IM60\";s:1:\"1\";s:4:\"IM61\";s:1:\"2\";}', '0.5534', '2021-04-18 11:30:27', 'BM2', 'S4'),
(2, 'a:1:{s:3:\"BM1\";s:6:\"0.4358\";}', 'a:3:{s:3:\"IM1\";s:1:\"2\";s:3:\"IM2\";s:1:\"2\";s:3:\"IM3\";s:1:\"4\";}', '0.4358', '2021-04-18 14:11:16', 'BM1', 'S6'),
(7, 'a:4:{s:3:\"BM2\";s:6:\"0.9013\";s:3:\"BM5\";s:6:\"0.3837\";s:3:\"BM4\";s:6:\"0.2286\";s:3:\"BM1\";s:6:\"0.0647\";}', 'a:7:{s:3:\"IM2\";s:1:\"3\";s:3:\"IM4\";s:1:\"4\";s:3:\"IM7\";s:1:\"2\";s:4:\"IM23\";s:1:\"1\";s:4:\"IM25\";s:1:\"2\";s:4:\"IM47\";s:1:\"2\";s:4:\"IM60\";s:1:\"3\";}', '0.9013', '2021-05-04 21:12:12', 'BM2', 'S9'),
(8, 'a:3:{s:3:\"BM2\";s:6:\"0.9621\";s:3:\"BM3\";s:6:\"0.6763\";s:3:\"BM1\";s:6:\"0.1686\";}', 'a:6:{s:3:\"IM3\";s:1:\"3\";s:3:\"IM5\";s:1:\"4\";s:3:\"IM6\";s:1:\"2\";s:3:\"IM9\";s:1:\"3\";s:4:\"IM14\";s:1:\"3\";s:4:\"IM19\";s:1:\"2\";}', '0.9621', '2021-05-04 21:17:14', 'BM2', 'S10'),
(9, 'a:1:{s:3:\"BM1\";s:6:\"0.0453\";}', 'a:1:{s:3:\"IM2\";s:1:\"2\";}', '0.0453', '2021-05-04 22:20:32', 'BM1', 'S11'),
(10, 'a:1:{s:3:\"BM1\";s:6:\"0.0194\";}', 'a:1:{s:3:\"IM2\";s:1:\"1\";}', '0.0194', '2021-05-04 22:55:17', 'BM1', 'S12');

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
(1, 0.584301, 0, 0.584301, 0, 'BM1', 'IM1'),
(2, 0.0646766, 0, 0.0646766, 0, 'BM1', 'IM2'),
(3, 0.910731, 0, 0.910731, 0, 'BM2', 'IM3'),
(4, 0.910731, 0, 0.910731, 0, 'BM2', 'IM4'),
(5, 0.821463, 0, 0.821463, 0, 'BM2', 'IM5'),
(6, 0.821463, 0, 0.821463, 0, 'BM2', 'IM6'),
(7, 0.375119, 0, 0.375119, 0, 'BM2', 'IM7'),
(8, 0.424372, 0, 0.424372, 0, 'BM3', 'IM8'),
(9, 0.539498, 0, 0.539498, 0, 'BM3', 'IM9'),
(10, 0.6827, 0, 0.6827, 0, 'BM4', 'IM10'),
(11, 0.698718, 0, 0.698718, 0, 'BM5', 'IM11'),
(12, 0.774038, 0, 0.774038, 0, 'BM5', 'IM12'),
(13, 0.844113, 0, 0.84, 0, 'BM1', 'IM13'),
(14, 0.168601, 0, 0.17, 0, 'BM1', 'IM14'),
(15, 0.910731, 0, 0.910731, 0, 'BM2', 'IM15'),
(16, 0.553656, 0, 0.553656, 0, 'BM2', 'IM16'),
(17, 0.375119, 0, 0.375119, 0, 'BM2', 'IM17'),
(18, 1, 0, 1, 0, 'BM2', 'IM18'),
(19, 0.424372, 0, 0.424372, 0, 'BM3', 'IM19'),
(20, 0.424372, 0, 0.424372, 0, 'BM3', 'IM20'),
(21, 0.712186, 0, 0.712186, 0, 'BM3', 'IM21'),
(22, 0.884874, 0, 0.884874, 0, 'BM3', 'IM22'),
(23, 0.762025, 0, 0.762025, 0, 'BM4', 'IM23'),
(24, 0.698718, 0, 0.698718, 0, 'BM5', 'IM24'),
(25, 0.548077, 0, 0.548077, 0, 'BM5', 'IM25'),
(26, 0.548077, 0, 0.548077, 0, 'BM5', 'IM26'),
(27, 0.740188, 0, 0.740188, 0, 'BM1', 'IM27'),
(28, 0.324489, 0, 0.324489, 0, 'BM1', 'IM28'),
(29, 0.324489, 0, 0.324489, 0, 'BM1', 'IM29'),
(30, 0.168601, 0, 0.168601, 0, 'BM1', 'IM30'),
(31, 0.28585, 0, 0.28585, 0, 'BM2', 'IM31'),
(32, 0.464387, 0, 0.464387, 0, 'BM2', 'IM32'),
(33, 0.712186, 0, 0.712186, 0, 'BM3', 'IM33'),
(34, 0.539498, 0, 0.539498, 0, 'BM3', 'IM34'),
(35, 0.539498, 0, 0.539498, 0, 'BM3', 'IM35'),
(36, 0.524051, 0, 0.524051, 0, 'BM4', 'IM36'),
(37, 0.524051, 0, 0.524051, 0, 'BM4', 'IM37'),
(38, 0.84135, 0, 0.84135, 0, 'BM4', 'IM38'),
(39, 0.623397, 0, 0.623397, 0, 'BM5', 'IM39'),
(40, 0.623397, 0, 0.623397, 0, 'BM5', 'IM40'),
(41, 0.623397, 0, 0.623397, 0, 'BM5', 'IM41'),
(42, 0.472756, 0, 0.472756, 0, 'BM5', 'IM42'),
(43, 0.472756, 0, 0.472756, 0, 'BM5', 'IM43'),
(44, 0.948038, 0, 0.948038, 0, 'BM1', 'IM44'),
(45, 0.480376, 0, 0.480376, 0, 'BM1', 'IM45'),
(46, 0.464387, 0, 0.464387, 0, 'BM2', 'IM46'),
(47, 1, 0, 1, 0, 'BM2', 'IM47'),
(48, 0.107312, 0, 0.107312, 0, 'BM2', 'IM48'),
(49, 0.6827, 0, 0.6827, 0, 'BM4', 'IM49'),
(50, 0.6827, 0, 0.6827, 0, 'BM4', 'IM50'),
(51, 0.548077, 0, 0.548077, 0, 'BM5', 'IM51'),
(52, 0.698718, 0, 0.698718, 0, 'BM5', 'IM52'),
(53, 0.107312, 0, 0.107312, 0, 'BM2', 'IM53'),
(54, 0.0180437, 0, 0.0180437, 0, 'BM2', 'IM54'),
(55, 0.196581, 0, 0.196581, 0, 'BM2', 'IM55'),
(56, 0.553656, 0, 0.553656, 0, 'BM2', 'IM56'),
(57, 0.472756, 0, 0.472756, 0, 'BM5', 'IM57'),
(58, 0.472756, 0, 0.472756, 0, 'BM5', 'IM58'),
(59, 0.464387, 0, 0.464387, 0, 'BM2', 'IM59'),
(60, 0.553656, 0, 0.553656, 0, 'BM2', 'IM60'),
(61, 0.762025, 0, 0.762025, 0, 'BM4', 'IM61');

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
(3, 'IM3', 'Sewaktu proses belajar-mengajar di kelas berlangsung saya tidak memanfaatkaan kesempatan untuk bertanya tentang hal-hal yang kurang saya pahami'),
(4, 'IM4', 'Sewaktu proses belajar-mengajar di kelas berlangsung saya mengalami kesulitan menyusun kata-kata untuk bertanya kepada guru tentang hal-hal yang kurang saya pahami  '),
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
(15, 'IM15', 'Saya kehabisan waktu untuk mengoreksi kembali semua jawaban ulangan/ujian sebelum diserahkan kepada guru/pengawas'),
(16, 'IM16', 'Saya menghafal hukum-hukum'),
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
  `layanan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Selalu', ''),
(2, 'Sering', ''),
(3, 'Kadang-kadang', ''),
(4, 'Tidak Pernah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE `t_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kode_siswa` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin`, `kelas`, `kode_siswa`) VALUES
(1, 'emil', 'Laki-laki', 'X IPA 1', 'S1'),
(2, 'emil', 'Laki-laki', 'X IPA 1', 'S2'),
(3, 'qwe', 'Laki-laki', 'X IPA 1', 'S3'),
(4, 'qwe', 'Laki-laki', 'X IPA 1', 'S4'),
(5, 'emil', 'Laki-laki', 'X IPA 1', 'S5'),
(6, 'emil', 'Laki-laki', 'X IPA 1', 'S6'),
(7, 'emil', 'Laki-laki', 'X IPA 1', 'S7'),
(8, 'qwe', 'Laki-laki', 'X IPA 1', 'S8'),
(9, 'qwe', 'Laki-laki', 'X IPA 1', 'S9'),
(10, 'niubie', 'Laki-laki', 'X IPA 1', 'S10'),
(11, 'zxc', 'Laki-laki', 'X IPA 1', 'S11'),
(12, 'new', 'Laki-laki', 'X IPA 1', 'S12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `kata_sandi` varchar(20) NOT NULL,
  `batas_login` int(3) NOT NULL,
  `blokir` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_login`, `nama`, `nama_pengguna`, `kata_sandi`, `batas_login`, `blokir`) VALUES
(1, 'user', 'user', 'user', 20, 'N');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `t_bidang_masalah`
--
ALTER TABLE `t_bidang_masalah`
  ADD PRIMARY KEY (`id_bidang_masalah`);

--
-- Indeks untuk tabel `t_detail_bidang_masalah`
--
ALTER TABLE `t_detail_bidang_masalah`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_bidang_masalah`
--
ALTER TABLE `t_bidang_masalah`
  MODIFY `id_bidang_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_detail_bidang_masalah`
--
ALTER TABLE `t_detail_bidang_masalah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_hasil`
--
ALTER TABLE `t_hasil`
  MODIFY `kode_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `t_identifikasi`
--
ALTER TABLE `t_identifikasi`
  MODIFY `kode_identifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `t_item_masalah`
--
ALTER TABLE `t_item_masalah`
  MODIFY `id_item_masalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
