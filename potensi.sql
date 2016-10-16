-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2016 at 06:07 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `potensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `groups` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `groups`) VALUES
(1, 'Guru'),
(2, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `teks` varchar(30) DEFAULT NULL,
  `skor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `teks`, `skor`) VALUES
(1, 'Sangat sesuai', 4),
(2, 'Sesuai', 3),
(3, 'Tidak sesuai', 2),
(4, 'Sangat tidak sesuai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `standar_kompetensi_id` int(11) DEFAULT '0',
  `kompetensi_id` int(11) DEFAULT '0',
  `indikator_id` int(11) DEFAULT '0',
  `teks` text,
  `jenis` enum('standar','kompetensi','indikator','pertanyaan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `standar_kompetensi_id`, `kompetensi_id`, `indikator_id`, `teks`, `jenis`) VALUES
(1, 0, 0, 0, 'A. Peserta didik menguasai kecakapan menginvestigasi dunia kerja dalam hubungannya dengan diri sendiri dan pembuatan informasi karir.', 'standar'),
(3, 0, 0, 0, 'B. Peserta didik menguasai strategi untuk mencapai kesuksesan dan kepuasan karir di masa depan', 'standar'),
(4, 1, 0, 0, 'A.1  Mengembangkan kesadaran karir', 'kompetensi'),
(6, 1, 0, 0, 'A. 2 Mengembangkan kesiapan menjadi karyawan', 'kompetensi'),
(7, 3, 0, 0, 'B.1 Memperoleh informasi karir', 'kompetensi'),
(8, 0, 7, 0, 'B.1.1 Menerapkan kecakapan pembuatan keputusan dalam perencanaan karir, pemilihan kursus, dan transisi karir', 'indikator'),
(10, 0, 4, 0, 'A.1.1  Mengembangkan kecakapan untuk menempatkan, mengevaluasi, dan menginterpretasi informasi karir.', 'indikator'),
(11, 0, 4, 0, 'A.1.2 Mengevaluasi pekerjaan tradisional dan modern', 'indikator'),
(12, 0, 6, 0, 'A.2.1 Memperoleh kecakapan kemampuan kerja seperti bekerja dalam tim, pengentasan masalah, dan organisasi.', 'indikator'),
(13, 0, 7, 0, 'B.1.2 Mengidentifikasi kecakapan, minat, dan kemampuan pribadi serta kaitannya dengan pilihan karir terkini', 'indikator'),
(15, 0, 0, 10, 'Saya menambah wawasan tentang informasi pendidikan lanjut melalui internet, guru, orang tua dan membandingkan jenis studi lanjut yang ada (SMA, MA, SMK) sehingga paham perbedaannya.', 'pertanyaan'),
(16, 0, 0, 12, 'Saya belajar bekerja sama dengan teman melalui keterlibatan dalam OSIS dan kegiatan ekstra kurikuler di sekolah. ', 'pertanyaan'),
(17, 0, 0, 0, 'C. Peserta didik memahami hubungan antara kualitas pribadi, pendidikan, pelatihan, dan dunia kerja', 'standar'),
(18, 17, 0, 0, 'C.1 Memperoleh pengetahuan untuk mencapai tujuan karir', 'kompetensi'),
(19, 0, 18, 0, 'C.1.1 Memahami hubungan antara prestasi pendidikan dan kesuksesan karir', 'indikator'),
(20, 0, 18, 0, 'C1.2 Menjelaskan bagaimana pekerjaan dapat membantu mencapai kesuksesan dan kepuasan pribadi ', 'indikator'),
(22, 0, 0, 20, 'Saya akan merasa bahagia, jika setamat SMP berhasil lolos dalam seleksi di sekolah terbaik yang diinginkan dengan bidang minat sesuai cita-cita.', 'pertanyaan'),
(23, 0, 0, 19, 'Saya giat belajar agar lolos seleksi di sekolah terbaik yang diinginkan dengan bidang minat sesuai cita-cita.', 'pertanyaan'),
(24, 0, 0, 11, 'Saya dapat menilai dengan baik ciri-ciri pekerjaan tradisional dan modern.', 'pertanyaan'),
(25, 0, 4, 0, 'A.1.3 Mengembangkan kesadaran terhadap kemampuan, kecakapan, minat, dan motivasi pribadi', 'indikator'),
(26, 0, 4, 0, 'A.1.4 Mempelajari cara berinteraksi dan bekerja sama dalam tim', 'indikator'),
(27, 0, 4, 0, 'A.1.5 Mempelajari pembuatan keputusan', 'indikator'),
(28, 0, 4, 0, 'A.1.6 Mempelajari cara menetapkan tujuan', 'indikator'),
(29, 0, 4, 0, 'A.1.7 Memahami pentingnya perencanaan', 'indikator'),
(30, 0, 4, 0, 'A.1.8 Mengembangkan kompetensi dalam area minat tertentu', 'indikator'),
(31, 0, 4, 0, 'A.1.9 Mengembangkan hobi dan minat vokasional', 'indikator'),
(32, 0, 4, 0, 'A.1. 10 Menyeimbangkan antara bekerja dan penggunaan waktu luang', 'indikator'),
(33, 0, 0, 25, 'Saya mengikuti kegiatan ekstrakurikuler di sekolah untuk mengembangkan kecakapan, minat dan bakat yang dimiliki.', 'pertanyaan'),
(34, 0, 0, 26, 'Saya belajar bekerja sama dengan teman saat menyelesaikan tugas kelompok.', 'pertanyaan'),
(35, 0, 0, 27, 'Saya mempelajari informasi berbagai jenis pendidikan lanjut yang ada (SMA, MA, SMK) sebelum menentukan pilihan pendidikan lanjut setelah SMP.', 'pertanyaan'),
(36, 0, 0, 28, 'Saya berdiskusi dengan orang tua dan/atau guru di sekolah sebelum memutuskan akan melanjutkan pendidikan ke SMA, MA, atau SMK.', 'pertanyaan'),
(37, 0, 0, 29, 'Saya membuat jadwal dan tahapan kerja dalam mengerjakan sesuatu agar mendapat hasil baik dan selesai tepat waktu.', 'pertanyaan'),
(38, 0, 0, 30, 'Saya mengikuti kegiatan ekstrakurikuler/kursus sesuai dengan bidang peminatan (misalnya seni, olah raga, komputer, bahasa) untuk mengembangkan kompetensi yang dimiliki.', 'pertanyaan'),
(39, 0, 0, 31, 'Saya menyalurkan hobi untuk mendukung pencapaian bidang pekerjaan yang disukai.', 'pertanyaan'),
(40, 0, 0, 32, 'Pada hari libur sekolah, saya mengisi waktu dengan melakukan aktivitas yang disukai (misalnya membaca buku, main game, mendengarkan musik, nonton film, jalan-jalan)', 'pertanyaan'),
(41, 0, 6, 0, 'A.2.2 Menerapkan kecakapan kesiapan kerja untuk melihat peluang ketenagakerjaan (karir)', 'indikator'),
(42, 0, 6, 0, 'A.2.3 Mendemonstrasikan pengetahuan tentang perubahan di tempat kerja', 'indikator'),
(43, 0, 6, 0, 'A.2.4 Mempelajari hak dan tanggung jawab sebagai atasan dan karyawan', 'indikator'),
(44, 0, 6, 0, 'A.2.5 Belajar menghargai keunikan individu di tempat kerja', 'indikator'),
(45, 0, 6, 0, 'A.2.6 Mempelajari cara menulis resume (CV, lamaran kerja)', 'indikator'),
(46, 0, 6, 0, 'A.2.7 Mengembangkan sikap positif terhadap kerja dan belajar', 'indikator'),
(47, 0, 6, 0, 'A.2.8 Memahami pentingnya tanggung jawab, kesalingtergantungan, ketetapan waktu, integritas, dan usaha di tempat kerja.', 'indikator'),
(48, 0, 6, 0, 'A.2.9 Menggunakan kecakapan mengelola waktu dan tugas', 'indikator'),
(49, 0, 0, 41, 'Saya mengikuti kursus di SMP sebagai persiapan untuk memasuki bidang peminatan sains dan teknologi, bahasa, dan humaniora pada pendidikan lanjut setamat SMP (SMA, MA, atau SMK) yang mendukung cita-cita saya.', 'pertanyaan'),
(50, 0, 0, 42, 'Saya giat mempelajari bahasa Inggris atau bahasa asing lainnya dan komputer karena keduanya sangat diperlukan dalam dunia kerja saat ini.', 'pertanyaan'),
(51, 0, 0, 43, 'Saya mempelajari hak dan kewajiban setiap pengurus dan anggota organisasi melalui keterlibatan dalam berbagai kegiatan OSIS dan esktrakurikuler di sekolah.', 'pertanyaan'),
(52, 0, 0, 44, 'Saya bergaul dengan siapa saja tanpa membeda-bedakannya berdasarkan latar belakang sosial-ekonomi dan SARA (Suku, Agama, Ras, dan Antargolongan). ', 'pertanyaan'),
(53, 0, 0, 45, 'Saya aktif belajar cara menulis surat lamaran pekerjaan dan riwayat hidup yang baik dan benar. ', 'pertanyaan'),
(54, 0, 0, 46, 'Saya belajar dengan sungguh-sungguh untuk menggapai cita-cita.', 'pertanyaan'),
(55, 0, 0, 47, 'Saya menyadari pencapaian cita-cita salah satunya dipengaruhi oleh tanggung jawab, pengelolaan waktu, atau usaha  dalam mengerjakan tugas.', 'pertanyaan'),
(56, 0, 0, 48, 'Saya membuat jadwal pembagian waktu untuk belajar, kursus, bermain, atau istirahat agar kegiatan di sekolah dan luar sekolah berjalan dengan baik.', 'pertanyaan'),
(57, 3, 0, 0, 'B.2 Mengidentifikasi tujuan karir', 'kompetensi'),
(58, 0, 7, 0, 'B.1.3 Mendemonstrasikan pengetahuan tentang proses perencanaan karir', 'indikator'),
(59, 0, 7, 0, 'B.1.4 Mengetahui kelompok okupasi (pekerjaan)', 'indikator'),
(60, 0, 7, 0, 'B.1.5 Menggunakan penelitian dan sumber informasi untuk memperoleh informasi karir', 'indikator'),
(61, 0, 7, 0, 'B.1.6 Belajar menggunakan internet untuk mengakses informasi perencanaan karir', 'indikator'),
(62, 0, 7, 0, 'B.1.7 Mendeskripsikan pilihan karir tradisional dan modern dan kaitannya dengan pilihan karir', 'indikator'),
(63, 0, 7, 0, 'B.1.8 Memahami perubahan kebutuhan ekonomi dan kemasyarakatan yang mempengaruhi tren dan pelatihan ketenagakerjaan ', 'indikator'),
(64, 0, 57, 0, 'B.2.1 Mendemonstrasikan kesadaran terhadap pendidikan dan pelatihan yang dibutuhkan untuk mencapai tujuan karir', 'indikator'),
(65, 0, 57, 0, 'B.2.2 Mengases dan memodifikasi perencanaan pendidikan untuk mendukung karirnya', 'indikator'),
(66, 0, 57, 0, 'B.2.3 Menggunakan kemampuan kerja dan kecakapan kesiapan kerja dalam magang, mentoring, asistensi dan/atau pengalaman kerja orang lain', 'indikator'),
(67, 0, 57, 0, 'B.2.4 Memilih kursus kerja yang sesuai dengan minat karir', 'indikator'),
(68, 0, 57, 0, 'B.2.5 Memelihara portofolio perencanaan karir', 'indikator'),
(69, 0, 0, 8, 'Semua kegiatan belajar, ekstrakurikuler, atau kursus yang saya ikuti sesuai dengan perencanaan pendidikan lanjut setamat SMP.', 'pertanyaan'),
(70, 0, 0, 13, 'Saya mempertimbangkan kemampuan diri untuk memilih pendidikan lanjut (SMA, MA, atau SMK) setelah tamat SMP.', 'pertanyaan'),
(71, 0, 0, 58, 'Penetapan bidang peminatan pada saat saya melanjutkan pendidikan setamat SMP, akan ditentukan saat awal masuk sekolah dengan mempertimbangkan kemampuan, prestasi belajar, dan minat yang dimiliki.', 'pertanyaan'),
(72, 0, 0, 59, 'Saya mengetahui berbagai bidang peminatan (jurusan) yang ada di SMA, MA, atau SMK yang dapat dipilih sesuai dengan rencana pekerjaan saya di masa depan.', 'pertanyaan'),
(73, 0, 0, 60, 'Saya mendapatkan informasi tentang berbagai bidang peminatan (jurusan) yang ada di SMA, MA, atau SMK dari berbagai sumber (seperti buku, guru, orangtua, internet).', 'pertanyaan'),
(74, 0, 0, 61, 'Saya mencari berbagai informasi tentang pendidikan lanjut melalui internet sebagai persiapan dalam menetapkan pemilihan studi lanjut atau cita-cita setamat SMP.', 'pertanyaan'),
(75, 0, 0, 62, 'Menurut saya, bidang pekerjaan tradisional (misalnya petani) lebih mengutamakan keterampilan khusus, sedangkan pekerjaan modern (dokter, guru) membutuhkan pendidikan tinggi dan keahlian khusus. ', 'pertanyaan'),
(76, 0, 0, 63, 'Saya mengikuti kursus bahasa Inggris atau asing lainnya dan komputer karena keduanya dibutuhkan pada kehidupan saat ini.', 'pertanyaan'),
(77, 0, 0, 64, 'Saya belajar dengan sungguh-sungguh secara terjadwal untuk mencapai prestasi dan karir yang dicita-citakan.', 'pertanyaan'),
(78, 0, 0, 65, 'Saya mempertimbangkan sekolah lanjutan ke SMA, MA, atau SMK yang dapat mendukung pencapaian cita-cita (pekerjaan) di masa depan. ', 'pertanyaan'),
(79, 0, 0, 66, 'Saya belajar dari pengalaman orang lain yang sukses dalam pendidikan dan pekerjaannya. ', 'pertanyaan'),
(80, 0, 0, 67, 'Saya mengikuti kegiatan ekstra kurikuler atau kursus yang sesuai dengan cita-cita, minat dan bakat yang dimiliki.', 'pertanyaan'),
(81, 0, 0, 68, 'Saya menyimpan dengan baik semua bukti hasil prestasi akademik dan non-akademik yang pernah dicapai seperti piagam, sertifikat, mendali, piala, foto, video, atau hasil karya.', 'pertanyaan'),
(82, 17, 0, 0, 'C.2 Menerapkan kecakapan untuk mencapai tujuan karir', 'kompetensi'),
(83, 0, 18, 0, 'C.1.3 Mengidentifikasi preferensi dan minat pribadi yang mempengaruhi pilihan dan kesuksesan karir', 'indikator'),
(84, 0, 18, 0, 'C.1.4 Memahami bahwa perubahan di tempat kerja mempersyaratkan belajar sepanjang hayat dan kecakapan baru ', 'indikator'),
(85, 0, 18, 0, 'C.1.5 Mendeskripsikan dampak pekerjaan terhadap gaya hidup ', 'indikator'),
(86, 0, 18, 0, 'C.1.6 Memahami pentingnya keadilan dan akses dalam pilihan karir', 'indikator'),
(87, 0, 18, 0, 'C.1.7 Memahami pentingnya pekerjaan dan ekspresi kepuasan pribadi', 'indikator'),
(88, 0, 82, 0, 'C.2.1 Mendemonstrasikan bagaimana minat, kemampuan, dan prestasi berhubungan dengan tujuan pribadi, sosial, pendidikan, dan karir', 'indikator'),
(89, 0, 82, 0, 'C.2.2 Mempelajari cara menggunakan kecakapan mengelola konflik dengan teman sebaya dan orang dewasa', 'indikator'),
(90, 0, 82, 0, 'C.2.3 Belajar bekerja sama dengan orang lain sebagai anggota tim', 'indikator'),
(91, 0, 82, 0, 'C.2.4 Menerapkan kecakapan akademik dan kesiapan kerja berlandaskan situasi belajar seperti magang, asistensi dan/atau pengalaman mentoring', 'indikator'),
(92, 0, 0, 83, 'Saya mengikuti pemeriksaan psikologis (psikotes), agar dapat menetapkan pilihan pendidikan lanjut dan bidang minat yang sesuai dengan kemampuan, bakat dan minat yang dimiliki.', 'pertanyaan'),
(93, 0, 0, 84, 'Capaian prestasi belajar saya di SD dan SMP saat ini, tidak lepas dari tinggi-rendahnya kesungguhan, tanggung jawab dan konsistensi saya dalam belajar selama ini.', 'pertanyaan'),
(94, 0, 0, 85, 'Saya bergaul dengan orang yang berprestasi di sekolah atau berhasil dalam pekerjaannya agar terbawa sukses.', 'pertanyaan'),
(95, 0, 0, 86, 'Menurut saya proses seleksi masuk pendidikan lanjut setamat SMP di sekolah negeri dilakukan secara obyektif, adil dan mudah diakses oleh semua calon siswa, karena dilakukan melalui proses online.', 'pertanyaan'),
(96, 0, 0, 87, 'Bagi saya pemilihan studi lanjut dan bidang minat setelah tamat SMP, harus sesuai dengan cita-cita saya.', 'pertanyaan'),
(97, 0, 0, 88, 'Saya menetapkan pilihan pendidikan lanjut dan bidang minat setelah tamat SMP berdasarkan prestasi belajar yang diperoleh serta kemampuan dan minat yang dimiliki. ', 'pertanyaan'),
(98, 0, 0, 89, 'Saya bermusyawarah jika terjadi perbedaan pendapat dalam pengambilan keputusan di antara anggota kelompok belajar untuk menghindari konflik.', 'pertanyaan'),
(99, 0, 0, 90, 'Saat menyelesaikan tugas kelompok yang menjadi tanggung saya sebagai anggota.', 'pertanyaan'),
(100, 0, 0, 91, 'Saya ditugaskan oleh guru untuk menjadi tutor sebaya dalam belajar di kelas karena prestasi belajar yang dicapai selama ini.', 'pertanyaan');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `nip` varchar(40) DEFAULT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(40) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `etnis` varchar(50) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `etnis`, `kontak`, `email`, `foto`, `kelas`, `sekolah`, `group_id`) VALUES
(1, '112', 'Guru', '', '', '0000-00-00', '', '022 234 344', 'guru@gmail.com', '/files/users.png', '', '', 1),
(2, '222', 'Joko Mulato', 'Laki-laki', 'Barru', '1988-07-04', 'Bugis', '234', 'joko@gmail.com', '/files/users.png', 'XI-IPA-1', 'SMP N 1', 2),
(4, '222', 'Jono Sukarno', 'Laki-laki', 'Bandung', '1990-07-04', 'Sunda', '022 344 344', 'jono@gmail.com', '/files/users.png', 'XI-IPA-1', 'SMP N 1', 2),
(5, '111', 'Mufida Salim', 'Perempuan', 'Majalengka', '2016-08-03', '', '', '', '/files/photo/1469846614-assadi.jpg', 'v1', '', 2),
(6, '432', 'Rina rini', 'Perempuan', NULL, NULL, NULL, '', '', '/files/users.png', 'vii', NULL, 2),
(7, '444', 'Sumarno Ano', 'Laki-laki', 'CIrebon', '2016-08-04', '', '', '', '/files/users.png', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `key` varchar(20) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mulai` bigint(20) DEFAULT NULL,
  `selesai` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `user_id`, `mulai`, `selesai`) VALUES
(1, 2, 1470235964, 1469802947),
(2, 3, 1469805669, 1469805669),
(3, 4, 1469846620, 1469846521),
(4, 5, 1470262590, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tes_jawaban`
--

CREATE TABLE `tes_jawaban` (
  `id` int(11) NOT NULL,
  `tes_id` int(11) DEFAULT NULL,
  `pertanyaan_id` int(11) DEFAULT NULL,
  `jawaban_id` int(11) DEFAULT NULL,
  `waktu` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tes_jawaban`
--

INSERT INTO `tes_jawaban` (`id`, `tes_id`, `pertanyaan_id`, `jawaban_id`, `waktu`) VALUES
(1, 1, 15, 3, 1469802890),
(2, 1, 24, 4, 1469793882),
(3, 1, 16, 3, 1469802893),
(4, 1, 70, 4, 1469793884),
(5, 1, 23, 4, 1469793885),
(6, 1, 100, 2, 1469801330),
(7, 1, 99, 3, 1469802947),
(8, 1, 22, 3, 1469802895),
(9, 1, 33, 4, 1469793888),
(10, 1, 34, 4, 1469793889),
(11, 1, 35, 4, 1469793891),
(12, 1, 36, 4, 1469793893),
(13, 1, 37, 4, 1469793894),
(14, 1, 38, 4, 1469793896),
(15, 1, 39, 3, 1469794031),
(16, 1, 40, 2, 1469794032),
(17, 1, 49, 3, 1469794033),
(18, 1, 50, 4, 1469794035),
(19, 1, 51, 1, 1469794036),
(20, 1, 52, 4, 1469794037),
(21, 1, 53, 3, 1469794039),
(22, 1, 54, 4, 1469794040),
(23, 1, 55, 2, 1469794041),
(24, 1, 56, 4, 1469794042),
(25, 1, 71, 4, 1469794043),
(26, 1, 72, 4, 1469794044),
(27, 1, 73, 3, 1469794044),
(28, 1, 74, 4, 1469794045),
(29, 1, 75, 2, 1469794046),
(30, 1, 76, 3, 1469794047),
(31, 1, 77, 4, 1469794048),
(32, 1, 78, 2, 1469794049),
(33, 1, 79, 3, 1469794051),
(34, 1, 80, 4, 1469794052),
(35, 1, 81, 3, 1469794053),
(36, 1, 92, 2, 1469794055),
(37, 1, 93, 3, 1469794055),
(38, 1, 94, 4, 1469794057),
(39, 1, 95, 4, 1469794058),
(40, 1, 96, 4, 1469794059),
(41, 1, 97, 2, 1469802902),
(42, 1, 98, 3, 1469802903),
(43, 1, 69, 4, 1469802440),
(44, 2, 15, 4, 1469802971),
(45, 2, 16, 4, 1469803974),
(46, 2, 22, 1, 1469804050),
(47, 2, 23, 3, 1469804279),
(48, 2, 24, 3, 1469804857),
(49, 2, 33, 4, 1469804863),
(50, 2, 34, 4, 1469804872),
(51, 2, 35, 4, 1469804876),
(52, 2, 36, 3, 1469804878),
(53, 2, 37, 3, 1469804880),
(54, 2, 38, 3, 1469805032),
(55, 2, 39, 2, 1469805034),
(56, 2, 40, 2, 1469805072),
(57, 2, 49, 3, 1469805075),
(58, 2, 50, 4, 1469805077),
(59, 2, 51, 2, 1469805080),
(60, 2, 52, 3, 1469805082),
(61, 2, 53, 4, 1469805084),
(62, 2, 54, 3, 1469805087),
(63, 2, 55, 4, 1469805089),
(64, 2, 56, 2, 1469805091),
(65, 2, 69, 2, 1469805125),
(66, 2, 70, 3, 1469805127),
(67, 2, 71, 3, 1469805128),
(68, 2, 72, 4, 1469805129),
(69, 2, 73, 3, 1469805131),
(70, 2, 74, 2, 1469805132),
(71, 2, 75, 3, 1469805177),
(72, 2, 76, 3, 1469805279),
(73, 2, 77, 3, 1469805280),
(74, 2, 78, 4, 1469805282),
(75, 2, 79, 3, 1469805283),
(76, 2, 80, 2, 1469805285),
(77, 2, 81, 4, 1469805287),
(78, 2, 92, 3, 1469805288),
(79, 2, 93, 3, 1469805290),
(80, 2, 94, 4, 1469805292),
(81, 2, 95, 2, 1469805294),
(82, 2, 96, 2, 1469805296),
(83, 2, 97, 4, 1469805298),
(84, 2, 98, 3, 1469805661),
(85, 2, 99, 3, 1469805663),
(86, 2, 100, 4, 1469805669),
(87, 3, 15, 3, 1469846513),
(88, 3, 16, 4, 1469846514),
(89, 3, 22, 2, 1469846516),
(90, 3, 23, 3, 1469846521),
(91, 3, 24, 4, 1469805718),
(92, 3, 33, 3, 1469805720),
(93, 3, 34, 2, 1469805724),
(94, 3, 35, 3, 1469805725),
(95, 3, 36, 4, 1469805727),
(96, 3, 37, 1, 1469805729),
(97, 3, 38, 3, 1469805732),
(98, 3, 39, 4, 1469805734),
(99, 3, 40, 3, 1469805735),
(100, 3, 49, 2, 1469805736),
(101, 3, 50, 4, 1469805737),
(102, 3, 51, 1, 1469805739),
(103, 3, 52, 3, 1469805740),
(104, 3, 53, 4, 1469805742),
(105, 3, 54, 3, 1469805744),
(106, 3, 55, 2, 1469805745),
(107, 3, 56, 4, 1469805746),
(108, 3, 69, 3, 1469805747),
(109, 3, 70, 2, 1469805749),
(110, 3, 71, 3, 1469805750),
(111, 3, 72, 4, 1469805751),
(112, 3, 73, 1, 1469805753),
(113, 3, 74, 3, 1469805754),
(114, 3, 75, 4, 1469805756),
(115, 3, 76, 3, 1469805757),
(116, 3, 77, 2, 1469805759),
(117, 3, 78, 3, 1469805760),
(118, 3, 79, 4, 1469805762),
(119, 3, 80, 1, 1469805763),
(120, 3, 81, 3, 1469805765),
(121, 3, 92, 4, 1469805766),
(122, 3, 93, 3, 1469805767),
(123, 3, 94, 3, 1469805774),
(124, 3, 95, 4, 1469805775),
(125, 3, 96, 2, 1469805776),
(126, 3, 97, 3, 1469805777),
(127, 3, 98, 4, 1469805779),
(128, 3, 99, 3, 1469805780),
(129, 3, 100, 1, 1469805782);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tpwd` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'penanda aktif tidaknya user',
  `group_id` int(11) DEFAULT NULL,
  `last_login` bigint(20) DEFAULT NULL,
  `ref_id` int(20) DEFAULT NULL COMMENT 'ref ke tabel profil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `tpwd`, `status`, `group_id`, `last_login`, `ref_id`) VALUES
(1, 'guru', '77e69c137812518e359196bb2f5e9bb9', '', 1, 1, NULL, 1),
(2, 'joko', '9ba0009aa81e794e628a04b51eaf7d7f', '', 1, 2, NULL, 2),
(3, 'jono', '42867493d4d4874f331d288df0044baa', 'jono', 1, 2, NULL, 4),
(4, 'mufida', '214ca99b9516b691b034939b46269b33', 'mufida', 1, 2, NULL, 5),
(5, 'rinaa', '3aea9516d222934e35dd30f142fda18c', 'rina', 1, 2, NULL, 6),
(6, 'sumarno', '9dcccd77f708097fca17830b52694301', 'sumarno', 1, 2, NULL, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tes_jawaban`
--
ALTER TABLE `tes_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `ref_id` (`ref_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tes_jawaban`
--
ALTER TABLE `tes_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ref_id`) REFERENCES `profiles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
