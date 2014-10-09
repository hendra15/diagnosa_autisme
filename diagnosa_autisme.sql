-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2014 at 07:22 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diagnosa_autisme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` varchar(20) NOT NULL,
  `USER` varchar(150) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `NAMA_ADMIN` varchar(50) DEFAULT NULL,
  `ALAMAT_ADMIN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_ADMIN`),
  KEY `FK_MEMILIKI_ADM` (`USER`),
  KEY `FK_TINGGAL_` (`ID_KOTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USER`, `ID_KOTA`, `NAMA_ADMIN`, `ALAMAT_ADMIN`) VALUES
('ADM-0001', 'hendra15', 356, 'agus hindrawan', 'jl.semampir tengah 3');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE IF NOT EXISTS `diagnosa` (
  `ID_DIAGNOSA` varchar(20) NOT NULL,
  `ID_PENYAKIT` varchar(20) DEFAULT NULL,
  `ID_PASIEN` varchar(20) DEFAULT NULL,
  `TANGGAL_PERIKSA` datetime DEFAULT NULL,
  `SOLUSI` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_DIAGNOSA`),
  KEY `FK_MELIHAT` (`ID_PASIEN`),
  KEY `FK_MENGIDAP` (`ID_PENYAKIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`ID_DIAGNOSA`, `ID_PENYAKIT`, `ID_PASIEN`, `TANGGAL_PERIKSA`, `SOLUSI`) VALUES
('4', '1', 'PAS-0002', '2014-05-01 00:00:00', 'Ciluk-ba,Memberikan contoh suara untuk ditiru, Mengenal nama'),
('5', '4', 'PAS-0003', '2014-05-02 00:00:00', '-'),
('6', '1', 'PAS-0004', '2014-06-26 00:00:00', 'Ciluk-ba,Memberikan contoh suara untuk ditiru, Mengenal nama'),
('7', '1', 'PAS-0005', '2014-06-26 00:00:00', 'Ciluk-ba,Memberikan contoh suara untuk ditiru, Mengenal nama'),
('8', '4', 'PAS-0005', '2014-06-26 00:00:00', '-');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `NID` varchar(20) NOT NULL,
  `USER` varchar(150) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `ID_SPESIALISASI` varchar(20) DEFAULT NULL,
  `NAMA_DOKTER` varchar(50) DEFAULT NULL,
  `ALAMAT_DOKTER` varchar(50) DEFAULT NULL,
  `NO_TELP_DOKTER` char(12) DEFAULT NULL,
  PRIMARY KEY (`NID`),
  KEY `FK_MEMILIKI` (`ID_SPESIALISASI`),
  KEY `FK_MEMILIKI_LOG` (`USER`),
  KEY `FK_TINGGAL` (`ID_KOTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`NID`, `USER`, `ID_KOTA`, `ID_SPESIALISASI`, `NAMA_DOKTER`, `ALAMAT_DOKTER`, `NO_TELP_DOKTER`) VALUES
('DOK-0002', 'effendy309', 7, '1', 'effendy aja', 'Jl.klampis 32', '085245666999');

-- --------------------------------------------------------

--
-- Table structure for table `id_kota`
--

CREATE TABLE IF NOT EXISTS `id_kota` (
  `ID_KOTA` int(11) NOT NULL,
  `KOTA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_KOTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_kota`
--

INSERT INTO `id_kota` (`ID_KOTA`, `KOTA`) VALUES
(1, 'Kabupaten Aceh Barat'),
(2, 'Kabupaten Aceh Barat Daya'),
(3, 'Kabupaten Aceh Besar'),
(4, 'Kabupaten Aceh Jaya'),
(5, 'Kabupaten Aceh Selatan'),
(6, 'Kabupaten Aceh Singkil'),
(7, 'Kabupaten Aceh Tamiang'),
(8, 'Kabupaten Aceh Tengah'),
(9, 'Kabupaten Aceh Tenggara'),
(10, 'Kabupaten Aceh Timur'),
(11, 'Kabupaten Aceh Utara'),
(12, 'Kabupaten Bener Meriah'),
(13, 'Kabupaten Bireuen'),
(14, 'Kabupaten Gayo Lues'),
(15, 'Kabupaten Nagan Raya'),
(16, 'Kabupaten Pidie'),
(17, 'Kabupaten Pidie Jaya'),
(18, 'Kabupaten Simeulue'),
(19, 'Kota Banda Aceh'),
(20, 'Kota Langsa'),
(21, 'Kota Lhokseumawe'),
(22, 'Kota Sabang'),
(23, 'Kota Subulussalam'),
(24, 'Kabupaten Asahan'),
(25, 'Kabupaten Batu Bara'),
(26, 'Kabupaten Dairi'),
(27, 'Kabupaten Deli Serdang'),
(28, 'Kabupaten Humbang Hasundutan'),
(29, 'Kabupaten Karo'),
(30, 'Kabupaten Labuhanbatu'),
(31, 'Kabupaten Labuhanbatu Selatan'),
(32, 'Kabupaten Labuhanbatu Utara'),
(33, 'Kabupaten Langkat'),
(34, 'Kabupaten Mandailing Natal'),
(35, 'Kabupaten Nias'),
(36, 'Kabupaten Nias Barat'),
(37, 'Kabupaten Nias Selatan'),
(38, 'Kabupaten Nias Utara'),
(39, 'Kabupaten Padang Lawas'),
(40, 'Kabupaten Padang Lawas Utara'),
(41, 'Kabupaten Pakpak Bharat'),
(42, 'Kabupaten Samosir'),
(43, 'Kabupaten Serdang Bedagai'),
(44, 'Kabupaten Simalungun'),
(45, 'Kabupaten Tapanuli Selatan'),
(46, 'Kabupaten Tapanuli Tengah'),
(47, 'Kabupaten Tapanuli Utara'),
(48, 'Kabupaten Toba Samosir'),
(49, 'Kota Binjai'),
(50, 'Kota Gunung Sitoli'),
(51, 'Kota Medan'),
(52, 'Kota Padang Sidempuan'),
(53, 'Kota Pematangsiantar'),
(54, 'Kota Sibolga'),
(55, 'Kota Tanjung Balai'),
(56, 'Kota Tebing Tinggi'),
(57, 'Kabupaten Bengkulu Selatan'),
(58, 'Kabupaten Bengkulu Tengah'),
(59, 'Kabupaten Bengkulu Utara'),
(60, 'Kabupaten Benteng'),
(61, 'Kabupaten Kaur'),
(62, 'Kabupaten Kepahiang'),
(63, 'Kabupaten Lebong'),
(64, 'Kabupaten Mukomuko'),
(65, 'Kabupaten Rejang Lebong'),
(66, 'Kabupaten Seluma'),
(67, 'Kota Bengkulu'),
(68, 'Kabupaten Batang Hari'),
(69, 'Kabupaten Bungo'),
(70, 'Kabupaten Kerinci'),
(71, 'Kabupaten Merangin'),
(72, 'Kabupaten Muaro Jambi'),
(73, 'Kabupaten Sarolangun'),
(74, 'Kabupaten Tanjung Jabung Barat'),
(75, 'Kabupaten Tanjung Jabung Timur'),
(76, 'Kabupaten Tebo'),
(77, 'Kota Jambi'),
(78, 'Kota Sungai Penuh'),
(79, 'Kabupaten Bengkalis'),
(80, 'Kabupaten Indragiri Hilir'),
(81, 'Kabupaten Indragiri Hulu'),
(82, 'Kabupaten Kampar'),
(83, 'Kabupaten Kuantan Singingi'),
(84, 'Kabupaten Pelalawan'),
(85, 'Kabupaten Rokan Hilir'),
(86, 'Kabupaten Rokan Hulu'),
(87, 'Kabupaten Siak'),
(88, 'Kota Pekanbaru'),
(89, 'Kota Dumai'),
(90, 'Kabupaten Kepulauan Meranti'),
(91, 'Kabupaten Agam'),
(92, 'Kabupaten Dharmasraya'),
(93, 'Kabupaten Kepulauan Mentawai'),
(94, 'Kabupaten Lima Puluh Kota'),
(95, 'Kabupaten Padang Pariaman'),
(96, 'Kabupaten Pasaman'),
(97, 'Kabupaten Pasaman Barat'),
(98, 'Kabupaten Pesisir Selatan'),
(99, 'Kabupaten Sijunjung'),
(100, 'Kabupaten Solok'),
(101, 'Kabupaten Solok Selatan'),
(102, 'Kabupaten Tanah Datar'),
(103, 'Kota Bukittinggi'),
(104, 'Kota Padang'),
(105, 'Kota Padangpanjang'),
(106, 'Kota Pariaman'),
(107, 'Kota Payakumbuh'),
(108, 'Kota Sawahlunto'),
(109, 'Kota Solok'),
(110, 'Kabupaten Banyuasin'),
(111, 'Kabupaten Empat Lawang'),
(112, 'Kabupaten Lahat'),
(113, 'Kabupaten Muara Enim'),
(114, 'Kabupaten Musi Banyuasin'),
(115, 'Kabupaten Musi Rawas'),
(116, 'Kabupaten Ogan Ilir'),
(117, 'Kabupaten Ogan Komering Ilir'),
(118, 'Kabupaten Ogan Komering Ulu'),
(119, 'Kabupaten Ogan Komering Ulu Selatan'),
(120, 'Kabupaten Ogan Komering Ulu Timur'),
(121, 'Kota Lubuklinggau'),
(122, 'Kota Pagar Alam'),
(123, 'Kota Palembang'),
(124, 'Kota Prabumulih'),
(125, 'Kabupaten Lampung Barat'),
(126, 'Kabupaten Lampung Selatan'),
(127, 'Kabupaten Lampung Tengah'),
(128, 'Kabupaten Lampung Timur'),
(129, 'Kabupaten Lampung Utara'),
(130, 'Kabupaten Mesuji'),
(131, 'Kabupaten Pesawaran'),
(132, 'Kabupaten Pringsewu'),
(133, 'Kabupaten Tanggamus'),
(134, 'Kabupaten Tulang Bawang'),
(135, 'Kabupaten Tulang Bawang Barat'),
(136, 'Kabupaten Way Kanan'),
(137, 'Kota Bandar Lampung'),
(138, 'Kota Metro'),
(139, 'Kabupaten Bangka'),
(140, 'Kabupaten Bangka Barat'),
(141, 'Kabupaten Bangka Selatan'),
(142, 'Kabupaten Bangka Tengah'),
(143, 'Kabupaten Belitung'),
(144, 'Kabupaten Belitung Timur'),
(145, 'Kota Pangkal Pinang'),
(146, 'Kabupaten Bintan'),
(147, 'Kabupaten Karimun'),
(148, 'Kabupaten Kepulauan Anambas'),
(149, 'Kabupaten Lingga'),
(150, 'Kabupaten Natuna'),
(151, 'Kota Batam'),
(152, 'Kota Tanjung Pinang'),
(153, 'Kabupaten Lebak'),
(154, 'Kabupaten Pandeglang'),
(155, 'Kabupaten Serang'),
(156, 'Kabupaten Tangerang'),
(157, 'Kota Cilegon'),
(158, 'Kota Serang'),
(159, 'Kota Tangerang'),
(160, 'Kota Tangerang Selatan'),
(161, 'Kabupaten Bandung'),
(162, 'Kabupaten Bandung Barat'),
(163, 'Kabupaten Bekasi'),
(164, 'Kabupaten Bogor'),
(165, 'Kabupaten Ciamis'),
(166, 'Kabupaten Cianjur'),
(167, 'Kabupaten Cirebon'),
(168, 'Kabupaten Garut'),
(169, 'Kabupaten Indramayu'),
(170, 'Kabupaten Karawang'),
(171, 'Kabupaten Kuningan'),
(172, 'Kabupaten Majalengka'),
(173, 'Kabupaten Purwakarta'),
(174, 'Kabupaten Subang'),
(175, 'Kabupaten Sukabumi'),
(176, 'Kabupaten Sumedang'),
(177, 'Kabupaten Tasikmalaya'),
(178, 'Kota Bandung'),
(179, 'Kota Banjar'),
(180, 'Kota Bekasi'),
(181, 'Kota Bogor'),
(182, 'Kota Cimahi'),
(183, 'Kota Cirebon'),
(184, 'Kota Depok'),
(185, 'Kota Sukabumi'),
(186, 'Kota Tasikmalaya'),
(187, 'Kabupaten Administrasi Kepulauan Seribu'),
(188, 'Kota Administrasi Jakarta Barat'),
(189, 'Kota Administrasi Jakarta Pusat'),
(190, 'Kota Administrasi Jakarta Selatan'),
(191, 'Kota Administrasi Jakarta Timur'),
(192, 'Kota Administrasi Jakarta Utara'),
(193, 'Kabupaten Banjarnegara'),
(194, 'Kabupaten Banyumas'),
(195, 'Kabupaten Batang'),
(196, 'Kabupaten Blora'),
(197, 'Kabupaten Boyolali'),
(198, 'Kabupaten Brebes'),
(199, 'Kabupaten Cilacap'),
(200, 'Kabupaten Demak'),
(201, 'Kabupaten Grobogan'),
(202, 'Kabupaten Jepara'),
(203, 'Kabupaten Karanganyar'),
(204, 'Kabupaten Kebumen'),
(205, 'Kabupaten Kendal'),
(206, 'Kabupaten Klaten'),
(207, 'Kabupaten Kudus'),
(208, 'Kabupaten Magelang'),
(209, 'Kabupaten Pati'),
(210, 'Kabupaten Pekalongan'),
(211, 'Kabupaten Pemalang'),
(212, 'Kabupaten Purbalingga'),
(213, 'Kabupaten Purworejo'),
(214, 'Kabupaten Rembang'),
(215, 'Kabupaten Semarang'),
(216, 'Kabupaten Sragen'),
(217, 'Kabupaten Sukoharjo'),
(218, 'Kabupaten Tegal'),
(219, 'Kabupaten Temanggung'),
(220, 'Kabupaten Wonogiri'),
(221, 'Kabupaten Wonosobo'),
(222, 'Kota Magelang'),
(223, 'Kota Pekalongan'),
(224, 'Kota Salatiga'),
(225, 'Kota Semarang'),
(226, 'Kota Surakarta'),
(227, 'Kota Tegal'),
(228, 'Kabupaten Bangkalan'),
(229, 'Kabupaten Banyuwangi'),
(230, 'Kabupaten Blitar'),
(231, 'Kabupaten Bojonegoro'),
(232, 'Kabupaten Bondowoso'),
(233, 'Kabupaten Gresik'),
(234, 'Kabupaten Jember'),
(235, 'Kabupaten Jombang'),
(236, 'Kabupaten Kediri'),
(237, 'Kabupaten Lamongan'),
(238, 'Kabupaten Lumajang'),
(239, 'Kabupaten Madiun'),
(240, 'Kabupaten Magetan'),
(241, 'Kabupaten Malang'),
(242, 'Kabupaten Mojokerto'),
(243, 'Kabupaten Nganjuk'),
(244, 'Kabupaten Ngawi'),
(245, 'Kabupaten Pacitan'),
(246, 'Kabupaten Pamekasan'),
(247, 'Kabupaten Pasuruan'),
(248, 'Kabupaten Ponorogo'),
(249, 'Kabupaten Probolinggo'),
(250, 'Kabupaten Sampang'),
(251, 'Kabupaten Sidoarjo'),
(252, 'Kabupaten Situbondo'),
(253, 'Kabupaten Sumenep'),
(254, 'Kabupaten Trenggalek'),
(255, 'Kabupaten Tuban'),
(256, 'Kabupaten Tulungagung'),
(257, 'Kota Batu'),
(258, 'Kota Blitar'),
(259, 'Kota Kediri'),
(260, 'Kota Madiun'),
(261, 'Kota Malang'),
(262, 'Kota Mojokerto'),
(263, 'Kota Pasuruan'),
(264, 'Kota Probolinggo'),
(265, 'Kota Surabaya'),
(266, 'Kabupaten Bantul'),
(267, 'Kabupaten Gunung Kidul'),
(268, 'Kabupaten Kulon Progo'),
(269, 'Kabupaten Sleman'),
(270, 'Kota Yogyakarta'),
(271, 'Kabupaten Badung'),
(272, 'Kabupaten Bangli'),
(273, 'Kabupaten Buleleng'),
(274, 'Kabupaten Gianyar'),
(275, 'Kabupaten Jembrana'),
(276, 'Kabupaten Karangasem'),
(277, 'Kabupaten Klungkung'),
(278, 'Kabupaten Tabanan'),
(279, 'Kota Denpasar'),
(280, 'Kabupaten Bima'),
(281, 'Kabupaten Dompu'),
(282, 'Kabupaten Lombok Barat'),
(283, 'Kabupaten Lombok Tengah'),
(284, 'Kabupaten Lombok Timur'),
(285, 'Kabupaten Lombok Utara'),
(286, 'Kabupaten Sumbawa'),
(287, 'Kabupaten Sumbawa Barat'),
(288, 'Kota Bima'),
(289, 'Kota Mataram'),
(290, 'Kabupaten Kupang'),
(291, 'Kabupaten Timor Tengah Selatan'),
(292, 'Kabupaten Timor Tengah Utara'),
(293, 'Kabupaten Belu'),
(294, 'Kabupaten Alor'),
(295, 'Kabupaten Flores Timur'),
(296, 'Kabupaten Sikka'),
(297, 'Kabupaten Ende'),
(298, 'Kabupaten Ngada'),
(299, 'Kabupaten Manggarai'),
(300, 'Kabupaten Sumba Timur'),
(301, 'Kabupaten Sumba Barat'),
(302, 'Kabupaten Lembata'),
(303, 'Kabupaten Rote Ndao'),
(304, 'Kabupaten Manggarai Barat'),
(305, 'Kabupaten Nagekeo'),
(306, 'Kabupaten Sumba Tengah'),
(307, 'Kabupaten Sumba Barat Daya'),
(308, 'Kabupaten Manggarai Timur'),
(309, 'Kabupaten Sabu Raijua'),
(310, 'Kota Kupang'),
(311, 'Kabupaten Bengkayang'),
(312, 'Kabupaten Kapuas Hulu'),
(313, 'Kabupaten Kayong Utara'),
(314, 'Kabupaten Ketapang'),
(315, 'Kabupaten Kubu Raya'),
(316, 'Kabupaten Landak'),
(317, 'Kabupaten Melawi'),
(318, 'Kabupaten Pontianak'),
(319, 'Kabupaten Sambas'),
(320, 'Kabupaten Sanggau'),
(321, 'Kabupaten Sekadau'),
(322, 'Kabupaten Sintang'),
(323, 'Kota Pontianak'),
(324, 'Kota Singkawang'),
(325, 'Kabupaten Balangan'),
(326, 'Kabupaten Banjar'),
(327, 'Kabupaten Barito Kuala'),
(328, 'Kabupaten Hulu Sungai Selatan'),
(329, 'Kabupaten Hulu Sungai Tengah'),
(330, 'Kabupaten Hulu Sungai Utara'),
(331, 'Kabupaten Kotabaru'),
(332, 'Kabupaten Tabalong'),
(333, 'Kabupaten Tanah Bumbu'),
(334, 'Kabupaten Tanah Laut'),
(335, 'Kabupaten Tapin'),
(336, 'Kota Banjarbaru'),
(337, 'Kota Banjarmasin'),
(338, 'Kabupaten Barito Selatan'),
(339, 'Kabupaten Barito Timur'),
(340, 'Kabupaten Barito Utara'),
(341, 'Kabupaten Gunung Mas'),
(342, 'Kabupaten Kapuas'),
(343, 'Kabupaten Katingan'),
(344, 'Kabupaten Kotawaringin Barat'),
(345, 'Kabupaten Kotawaringin Timur'),
(346, 'Kabupaten Lamandau'),
(347, 'Kabupaten Murung Raya'),
(348, 'Kabupaten Pulang Pisau'),
(349, 'Kabupaten Sukamara'),
(350, 'Kabupaten Seruyan'),
(351, 'Kota Palangka Raya'),
(352, 'Kabupaten Berau'),
(353, 'Kabupaten Bulungan'),
(354, 'Kabupaten Kutai Barat'),
(355, 'Kabupaten Kutai Kartanegara'),
(356, 'Kabupaten Kutai Timur'),
(357, 'Kabupaten Malinau'),
(358, 'Kabupaten Nunukan'),
(359, 'Kabupaten Paser'),
(360, 'Kabupaten Penajam Paser Utara'),
(361, 'Kabupaten Tana Tidung'),
(362, 'Kota Balikpapan'),
(363, 'Kota Bontang'),
(364, 'Kota Samarinda'),
(365, 'Kota Tarakan'),
(366, 'Kabupaten Boalemo'),
(367, 'Kabupaten Bone Bolango'),
(368, 'Kabupaten Gorontalo'),
(369, 'Kabupaten Gorontalo Utara'),
(370, 'Kabupaten Pohuwato'),
(371, 'Kota Gorontalo'),
(372, 'Kabupaten Bantaeng'),
(373, 'Kabupaten Barru'),
(374, 'Kabupaten Bone'),
(375, 'Kabupaten Bulukumba'),
(376, 'Kabupaten Enrekang'),
(377, 'Kabupaten Gowa'),
(378, 'Kabupaten Jeneponto'),
(379, 'Kabupaten Kepulauan Selayar'),
(380, 'Kabupaten Luwu'),
(381, 'Kabupaten Luwu Timur'),
(382, 'Kabupaten Luwu Utara'),
(383, 'Kabupaten Maros'),
(384, 'Kabupaten Pangkajene dan Kepulauan'),
(385, 'Kabupaten Pinrang'),
(386, 'Kabupaten Sidenreng Rappang'),
(387, 'Kabupaten Sinjai'),
(388, 'Kabupaten Soppeng'),
(389, 'Kabupaten Takalar'),
(390, 'Kabupaten Tana Toraja'),
(391, 'Kabupaten Toraja Utara'),
(392, 'Kabupaten Wajo'),
(393, 'Kota Makassar'),
(394, 'Kota Palopo'),
(395, 'Kota Parepare'),
(396, 'Kabupaten Bombana'),
(397, 'Kabupaten Buton'),
(398, 'Kabupaten Buton Utara'),
(399, 'Kabupaten Kolaka'),
(400, 'Kabupaten Kolaka Utara'),
(401, 'Kabupaten Konawe'),
(402, 'Kabupaten Konawe Selatan'),
(403, 'Kabupaten Konawe Utara'),
(404, 'Kabupaten Muna'),
(405, 'Kabupaten Wakatobi'),
(406, 'Kota Bau-Bau'),
(407, 'Kota Kendari'),
(408, 'Kabupaten Banggai'),
(409, 'Kabupaten Banggai Kepulauan'),
(410, 'Kabupaten Buol'),
(411, 'Kabupaten Donggala'),
(412, 'Kabupaten Morowali'),
(413, 'Kabupaten Parigi Moutong'),
(414, 'Kabupaten Poso'),
(415, 'Kabupaten Tojo Una-Una'),
(416, 'Kabupaten Toli-Toli'),
(417, 'Kabupaten Sigi'),
(418, 'Kota Palu'),
(419, 'Kabupaten Bolaang Mongondow'),
(420, 'Kabupaten Bolaang Mongondow Selatan'),
(421, 'Kabupaten Bolaang Mongondow Timur'),
(422, 'Kabupaten Bolaang Mongondow Utara'),
(423, 'Kabupaten Kepulauan Sangihe'),
(424, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(425, 'Kabupaten Kepulauan Talaud'),
(426, 'Kabupaten Minahasa'),
(427, 'Kabupaten Minahasa Selatan'),
(428, 'Kabupaten Minahasa Tenggara'),
(429, 'Kabupaten Minahasa Utara'),
(430, 'Kota Bitung'),
(431, 'Kota Kotamobagu'),
(432, 'Kota Manado'),
(433, 'Kota Tomohon'),
(434, 'Kabupaten Majene'),
(435, 'Kabupaten Mamasa'),
(436, 'Kabupaten Mamuju'),
(437, 'Kabupaten Mamuju Utara'),
(438, 'Kabupaten Polewali Mandar'),
(439, 'Kabupaten Buru'),
(440, 'Kabupaten Buru Selatan'),
(441, 'Kabupaten Kepulauan Aru'),
(442, 'Kabupaten Maluku Barat Daya'),
(443, 'Kabupaten Maluku Tengah'),
(444, 'Kabupaten Maluku Tenggara'),
(445, 'Kabupaten Maluku Tenggara Barat'),
(446, 'Kabupaten Seram Bagian Barat'),
(447, 'Kabupaten Seram Bagian Timur'),
(448, 'Kota Ambon'),
(449, 'Kota Tual'),
(450, 'Kabupaten Halmahera Barat'),
(451, 'Kabupaten Halmahera Tengah'),
(452, 'Kabupaten Halmahera Utara'),
(453, 'Kabupaten Halmahera Selatan'),
(454, 'Kabupaten Kepulauan Sula'),
(455, 'Kabupaten Halmahera Timur'),
(456, 'Kabupaten Pulau Morotai'),
(457, 'Kota Ternate'),
(458, 'Kota Tidore Kepulauan'),
(459, 'Kabupaten Asmat'),
(460, 'Kabupaten Biak Numfor'),
(461, 'Kabupaten Boven Digoel'),
(462, 'Kabupaten Deiyai'),
(463, 'Kabupaten Dogiyai'),
(464, 'Kabupaten Intan Jaya'),
(465, 'Kabupaten Jayapura'),
(466, 'Kabupaten Jayawijaya'),
(467, 'Kabupaten Keerom'),
(468, 'Kabupaten Kepulauan Yapen'),
(469, 'Kabupaten Lanny Jaya'),
(470, 'Kabupaten Mamberamo Raya'),
(471, 'Kabupaten Mamberamo Tengah'),
(472, 'Kabupaten Mappi'),
(473, 'Kabupaten Merauke'),
(474, 'Kabupaten Mimika'),
(475, 'Kabupaten Nabire'),
(476, 'Kabupaten Nduga'),
(477, 'Kabupaten Paniai'),
(478, 'Kabupaten Pegunungan Bintang'),
(479, 'Kabupaten Puncak'),
(480, 'Kabupaten Puncak Jaya'),
(481, 'Kabupaten Sarmi'),
(482, 'Kabupaten Supiori'),
(483, 'Kabupaten Tolikara'),
(484, 'Kabupaten Waropen'),
(485, 'Kabupaten Yahukimo'),
(486, 'Kabupaten Yalimo'),
(487, 'Kota Jayapura'),
(488, 'Kabupaten Fakfak'),
(489, 'Kabupaten Kaimana'),
(490, 'Kabupaten Manokwari'),
(491, 'Kabupaten Maybrat'),
(492, 'Kabupaten Raja Ampat'),
(493, 'Kabupaten Sorong'),
(494, 'Kabupaten Sorong Selatan'),
(495, 'Kabupaten Tambrauw'),
(496, 'Kabupaten Teluk Bintuni'),
(497, 'Kabupaten Teluk Wondama'),
(498, 'Kota Sorong');

-- --------------------------------------------------------

--
-- Table structure for table `id_penyakit`
--

CREATE TABLE IF NOT EXISTS `id_penyakit` (
  `ID_PENYAKIT` varchar(20) NOT NULL,
  `PENYAKIT` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID_PENYAKIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_penyakit`
--

INSERT INTO `id_penyakit` (`ID_PENYAKIT`, `PENYAKIT`) VALUES
('1', 'Autis Infantil'),
('2', 'Sindrom Asperger'),
('3', 'Hiperaktif'),
('4', 'Tidak Terjangkit');

-- --------------------------------------------------------

--
-- Table structure for table `login_aja`
--

CREATE TABLE IF NOT EXISTS `login_aja` (
  `USER` varchar(150) NOT NULL,
  `PASSWORD` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_aja`
--

INSERT INTO `login_aja` (`USER`, `PASSWORD`) VALUES
('adhi', 'YWRoaQ=='),
('agus15', 'YWd1czE1'),
('bedjoe', 'YmVkam9l'),
('diooo', 'ZGlvb28='),
('effendy309', 'ZWZmZW5keTMwOQ=='),
('hendra15', 'b3JiaXRmYW4xNQ=='),
('supri', 'c3Vwcmk=');

-- --------------------------------------------------------

--
-- Table structure for table `pasein`
--

CREATE TABLE IF NOT EXISTS `pasein` (
  `ID_PASIEN` varchar(20) NOT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `USER` varchar(150) DEFAULT NULL,
  `NAMA_PASIEN` varchar(120) DEFAULT NULL,
  `ALAMAT_PASIEN` varchar(120) DEFAULT NULL,
  `JENIS_KELAMIN` char(2) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `NO_TELP_PASIEN` char(12) DEFAULT NULL,
  `TEMPAT` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_PASIEN`),
  KEY `FK_MEMILIKI_PAS` (`USER`),
  KEY `FK_TINGGALL` (`ID_KOTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasein`
--

INSERT INTO `pasein` (`ID_PASIEN`, `ID_KOTA`, `USER`, `NAMA_PASIEN`, `ALAMAT_PASIEN`, `JENIS_KELAMIN`, `TANGGAL_LAHIR`, `NO_TELP_PASIEN`, `TEMPAT`) VALUES
('PAS-0002', 185, 'diooo', 'Dio Gadang', 'Jl.kebraon', 'L', '2011-06-10', '087546666636', '6'),
('PAS-0003', 77, 'adhi', 'adhi', 'REWWIN', 'L', '2012-06-11', '085732390390', '294'),
('PAS-0004', 270, 'supri', 'supri', 'Kedung Baruk', 'L', '2014-06-03', '094762834668', '315'),
('PAS-0005', 56, 'bedjoe', 'Bedjoe', 'Jl. Merak', 'L', '2009-06-16', '742374248434', '459');

-- --------------------------------------------------------

--
-- Table structure for table `spesialisasi`
--

CREATE TABLE IF NOT EXISTS `spesialisasi` (
  `ID_SPESIALISASI` varchar(20) NOT NULL,
  `SPESIALISASI` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_SPESIALISASI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesialisasi`
--

INSERT INTO `spesialisasi` (`ID_SPESIALISASI`, `SPESIALISASI`) VALUES
('1', 'Psikiater'),
('2', 'Psikologi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_MEMILIKI_ADM` FOREIGN KEY (`USER`) REFERENCES `login_aja` (`USER`),
  ADD CONSTRAINT `FK_TINGGAL_` FOREIGN KEY (`ID_KOTA`) REFERENCES `id_kota` (`ID_KOTA`);

--
-- Constraints for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD CONSTRAINT `FK_MELIHAT` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasein` (`ID_PASIEN`),
  ADD CONSTRAINT `FK_MENGIDAP` FOREIGN KEY (`ID_PENYAKIT`) REFERENCES `id_penyakit` (`ID_PENYAKIT`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_SPESIALISASI`) REFERENCES `spesialisasi` (`ID_SPESIALISASI`),
  ADD CONSTRAINT `FK_MEMILIKI_LOG` FOREIGN KEY (`USER`) REFERENCES `login_aja` (`USER`),
  ADD CONSTRAINT `FK_TINGGAL` FOREIGN KEY (`ID_KOTA`) REFERENCES `id_kota` (`ID_KOTA`);

--
-- Constraints for table `pasein`
--
ALTER TABLE `pasein`
  ADD CONSTRAINT `FK_MEMILIKI_PAS` FOREIGN KEY (`USER`) REFERENCES `login_aja` (`USER`),
  ADD CONSTRAINT `FK_TINGGALL` FOREIGN KEY (`ID_KOTA`) REFERENCES `id_kota` (`ID_KOTA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
