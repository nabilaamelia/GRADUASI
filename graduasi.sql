-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2022 at 09:43 AM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kabb2428_graduasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_periode`
--

CREATE TABLE `detail_periode` (
  `id_detail_periode` int(11) NOT NULL,
  `id_penerima_bantuan` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_periode`
--

INSERT INTO `detail_periode` (`id_detail_periode`, `id_penerima_bantuan`, `id_periode`, `total`) VALUES
(9, 1, 1, 56.25),
(10, 2, 2, 76.25),
(11, 9, 1, 70),
(12, 9, 2, 66.25),
(14, 10, 2, 46.67),
(15, 1, 2, 38.33),
(16, 11, 2, 48.75),
(17, 13, 2, 55.42),
(18, 15, 2, 55.42),
(19, 14, 2, 53.75),
(21, 12, 2, 61.25),
(31, 11, 1, 51.25),
(32, 13, 1, 53.75),
(33, 14, 1, 62.5),
(34, 17, 2, 52.92),
(35, 15, 1, 60),
(36, 16, 1, 63.75),
(38, 17, 1, 88.75),
(39, 12, 1, 48.75),
(40, 20, 2, 72.92),
(41, 22, 7, 90),
(42, 16, 2, 55),
(43, 25, 2, 62.92),
(44, 26, 2, 63.75),
(45, 28, 2, 59.58),
(46, 29, 2, 57.92),
(47, 27, 2, 62.5),
(48, 30, 2, 61.25),
(49, 31, 2, 50.42),
(50, 32, 2, 63.75),
(51, 24, 2, 62.92),
(52, 42, 2, 57.92),
(53, 35, 2, 61.25),
(54, 33, 2, 59.17),
(55, 39, 2, 62.08),
(56, 34, 2, 62.5),
(57, 37, 2, 57.08),
(58, 36, 2, 51.67),
(59, 47, 2, 61.25),
(60, 22, 2, 58.75),
(61, 40, 2, 72.5),
(62, 43, 2, 62.5),
(63, 10, 7, 60.42),
(64, 11, 7, 75.42),
(65, 12, 7, 73.33);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kode` varchar(5) NOT NULL,
  `jenis_kriteria` varchar(90) NOT NULL,
  `atribut` varchar(10) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kode`, `jenis_kriteria`, `atribut`, `bobot`) VALUES
(1, 'C1', 'Kepemilikan Rumah', 'Benefit', 10),
(3, 'C2', 'Penghasilan', 'Benefit', 20),
(4, 'C3', 'Jumlah Hutang Dalam Setahun', 'Benefit', 5),
(6, 'C4', 'Presentase Pengeluaran Pembelian makanan dalam seminggu (Terhadap Penghasilan)', 'Benefit', 5),
(7, 'C5', 'Pembelian pakaian dalam setahun', 'Benefit', 5),
(8, 'C6', 'Lantai Tempat Tinggal', 'Benefit', 10),
(9, 'C7', 'Dinding Tempat Tinggal', 'Benefit', 10),
(10, 'C8', 'Tempat BAB / BAK', 'Benefit', 10),
(11, 'C9', 'Sumber Penerangan', 'Benefit', 10),
(12, 'C10', 'Hak Aset ', 'Benefit', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_detail_periode` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_rentang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `id_kriteria`, `id_detail_periode`, `id_petugas`, `id_rentang`) VALUES
(131, 1, 9, 2, 2),
(132, 3, 9, 2, 6),
(133, 4, 9, 2, 10),
(134, 6, 9, 2, 21),
(135, 7, 9, 2, 23),
(136, 8, 9, 2, 29),
(137, 9, 9, 2, 33),
(138, 10, 9, 2, 37),
(139, 11, 9, 2, 41),
(140, 12, 9, 2, 45),
(141, 1, 10, 2, 2),
(142, 3, 10, 2, 8),
(143, 4, 10, 2, 12),
(144, 6, 10, 2, 22),
(145, 7, 10, 2, 25),
(146, 8, 10, 2, 29),
(147, 9, 10, 2, 33),
(148, 10, 10, 2, 37),
(149, 11, 10, 2, 41),
(150, 12, 10, 2, 46),
(151, 1, 11, 2, 18),
(152, 3, 11, 2, 6),
(153, 4, 11, 2, 11),
(154, 6, 11, 2, 21),
(155, 7, 11, 2, 26),
(156, 8, 11, 2, 28),
(157, 9, 11, 2, 34),
(158, 10, 11, 2, 37),
(159, 11, 11, 2, 42),
(160, 12, 11, 2, 46),
(161, 1, 12, 2, 2),
(162, 3, 12, 2, 7),
(163, 4, 12, 2, 11),
(164, 6, 12, 2, 22),
(165, 7, 12, 2, 24),
(166, 8, 12, 2, 29),
(167, 9, 12, 2, 33),
(168, 10, 12, 2, 38),
(169, 11, 12, 2, 40),
(170, 12, 12, 2, 44),
(181, 1, 14, 2, 2),
(182, 3, 14, 2, 6),
(183, 4, 14, 2, 10),
(184, 6, 14, 2, 20),
(185, 7, 14, 2, 24),
(186, 8, 14, 2, 28),
(187, 9, 14, 2, 32),
(188, 10, 14, 2, 36),
(189, 11, 14, 2, 40),
(190, 12, 14, 2, 44),
(191, 1, 15, 2, 17),
(192, 3, 15, 2, 5),
(193, 4, 15, 2, 9),
(194, 6, 15, 2, 19),
(195, 7, 15, 2, 23),
(196, 8, 15, 2, 27),
(197, 9, 15, 2, 31),
(198, 10, 15, 2, 36),
(199, 11, 15, 2, 41),
(200, 12, 15, 2, 45),
(201, 1, 16, 2, 1),
(202, 3, 16, 2, 5),
(203, 4, 16, 2, 11),
(204, 6, 16, 2, 20),
(205, 7, 16, 2, 25),
(206, 8, 16, 2, 28),
(207, 9, 16, 2, 33),
(208, 10, 16, 2, 36),
(209, 11, 16, 2, 41),
(210, 12, 16, 2, 45),
(211, 1, 17, 2, 2),
(212, 3, 17, 2, 6),
(213, 4, 17, 2, 10),
(214, 6, 17, 2, 21),
(215, 7, 17, 2, 25),
(216, 8, 17, 2, 28),
(217, 9, 17, 2, 32),
(218, 10, 17, 2, 37),
(219, 11, 17, 2, 41),
(220, 12, 17, 2, 45),
(221, 1, 18, 2, 2),
(222, 3, 18, 2, 6),
(223, 4, 18, 2, 10),
(224, 6, 18, 2, 21),
(225, 7, 18, 2, 25),
(226, 8, 18, 2, 27),
(227, 9, 18, 2, 32),
(228, 10, 18, 2, 37),
(229, 11, 18, 2, 42),
(230, 12, 18, 2, 45),
(231, 1, 19, 2, 2),
(232, 3, 19, 2, 5),
(233, 4, 19, 2, 10),
(234, 6, 19, 2, 21),
(235, 7, 19, 2, 24),
(236, 8, 19, 2, 30),
(237, 9, 19, 2, 33),
(238, 10, 19, 2, 37),
(239, 11, 19, 2, 40),
(240, 12, 19, 2, 44),
(251, 1, 21, 2, 2),
(252, 3, 21, 2, 7),
(253, 4, 21, 2, 10),
(254, 6, 21, 2, 20),
(255, 7, 21, 2, 24),
(256, 8, 21, 2, 28),
(257, 9, 21, 2, 33),
(258, 10, 21, 2, 37),
(259, 11, 21, 2, 41),
(260, 12, 21, 2, 45),
(311, 1, 31, 2, 2),
(312, 3, 31, 2, 6),
(313, 4, 31, 2, 10),
(314, 6, 31, 2, 20),
(315, 7, 31, 2, 25),
(316, 8, 31, 2, 29),
(317, 9, 31, 2, 32),
(318, 10, 31, 2, 37),
(319, 11, 31, 2, 40),
(320, 12, 31, 2, 44),
(321, 1, 32, 2, 2),
(322, 3, 32, 2, 7),
(323, 4, 32, 2, 11),
(324, 6, 32, 2, 21),
(325, 7, 32, 2, 25),
(326, 8, 32, 2, 28),
(327, 9, 32, 2, 32),
(328, 10, 32, 2, 36),
(329, 11, 32, 2, 40),
(330, 12, 32, 2, 44),
(331, 1, 33, 2, 17),
(332, 3, 33, 2, 7),
(333, 4, 33, 2, 11),
(334, 6, 33, 2, 19),
(335, 7, 33, 2, 25),
(336, 8, 33, 2, 30),
(337, 9, 33, 2, 33),
(338, 10, 33, 2, 36),
(339, 11, 33, 2, 40),
(340, 12, 33, 2, 45),
(341, 1, 34, 2, 1),
(342, 3, 34, 2, 6),
(343, 4, 34, 2, 11),
(344, 6, 34, 2, 20),
(345, 7, 34, 2, 25),
(346, 8, 34, 2, 29),
(347, 9, 34, 2, 32),
(348, 10, 34, 2, 37),
(349, 11, 34, 2, 40),
(350, 12, 34, 2, 45),
(351, 1, 35, 2, 2),
(352, 3, 35, 2, 6),
(353, 4, 35, 2, 12),
(354, 6, 35, 2, 21),
(355, 7, 35, 2, 25),
(356, 8, 35, 2, 29),
(357, 9, 35, 2, 34),
(358, 10, 35, 2, 37),
(359, 11, 35, 2, 40),
(360, 12, 35, 2, 44),
(361, 1, 36, 6, 1),
(362, 3, 36, 6, 8),
(363, 4, 36, 6, 9),
(364, 6, 36, 6, 22),
(365, 7, 36, 6, 23),
(366, 8, 36, 6, 30),
(367, 9, 36, 6, 34),
(368, 10, 36, 6, 37),
(369, 11, 36, 6, 40),
(370, 12, 36, 6, 43),
(381, 1, 38, 6, 18),
(382, 3, 38, 6, 8),
(383, 4, 38, 6, 12),
(384, 6, 38, 6, 22),
(385, 7, 38, 6, 26),
(386, 8, 38, 6, 30),
(387, 9, 38, 6, 34),
(388, 10, 38, 6, 38),
(389, 11, 38, 6, 42),
(390, 12, 38, 6, 45),
(391, 1, 39, 6, 2),
(392, 3, 39, 6, 6),
(393, 4, 39, 6, 9),
(394, 6, 39, 6, 20),
(395, 7, 39, 6, 25),
(396, 8, 39, 6, 28),
(397, 9, 39, 6, 33),
(398, 10, 39, 6, 37),
(399, 11, 39, 6, 40),
(400, 12, 39, 6, 43),
(401, 1, 40, 6, 17),
(402, 3, 40, 6, 8),
(403, 4, 40, 6, 12),
(404, 6, 40, 6, 20),
(405, 7, 40, 6, 26),
(406, 8, 40, 6, 29),
(407, 9, 40, 6, 32),
(408, 10, 40, 6, 38),
(409, 11, 40, 6, 40),
(410, 12, 40, 6, 45),
(412, 1, 41, 2, 18),
(413, 3, 41, 2, 8),
(414, 4, 41, 2, 11),
(415, 6, 41, 2, 22),
(416, 7, 41, 2, 26),
(417, 8, 41, 2, 30),
(418, 9, 41, 2, 33),
(419, 10, 41, 2, 38),
(420, 11, 41, 2, 42),
(421, 12, 41, 2, 45),
(422, 1, 42, 2, 2),
(423, 3, 42, 2, 6),
(424, 4, 42, 2, 10),
(425, 6, 42, 2, 20),
(426, 7, 42, 2, 26),
(427, 8, 42, 2, 28),
(428, 9, 42, 2, 33),
(429, 10, 42, 2, 37),
(430, 11, 42, 2, 40),
(431, 12, 42, 2, 44),
(432, 1, 43, 2, 17),
(433, 3, 43, 2, 8),
(434, 4, 43, 2, 9),
(435, 6, 43, 2, 20),
(436, 7, 43, 2, 25),
(437, 8, 43, 2, 27),
(438, 9, 43, 2, 32),
(439, 10, 43, 2, 37),
(440, 11, 43, 2, 41),
(441, 12, 43, 2, 45),
(442, 1, 44, 2, 17),
(443, 3, 44, 2, 7),
(444, 4, 44, 2, 11),
(445, 6, 44, 2, 19),
(446, 7, 44, 2, 25),
(447, 8, 44, 2, 28),
(448, 9, 44, 2, 33),
(449, 10, 44, 2, 37),
(450, 11, 44, 2, 40),
(451, 12, 44, 2, 46),
(452, 1, 45, 2, 18),
(453, 3, 45, 2, 7),
(454, 4, 45, 2, 9),
(455, 6, 45, 2, 21),
(456, 7, 45, 2, 24),
(457, 8, 45, 2, 29),
(458, 9, 45, 2, 31),
(459, 10, 45, 2, 37),
(460, 11, 45, 2, 40),
(461, 12, 45, 2, 45),
(462, 1, 46, 2, 1),
(463, 3, 46, 2, 7),
(464, 4, 46, 2, 11),
(465, 6, 46, 2, 20),
(466, 7, 46, 2, 25),
(467, 8, 46, 2, 29),
(468, 9, 46, 2, 32),
(469, 10, 46, 2, 37),
(470, 11, 46, 2, 40),
(471, 12, 46, 2, 45),
(472, 1, 47, 2, 17),
(473, 3, 47, 2, 7),
(474, 4, 47, 2, 11),
(475, 6, 47, 2, 20),
(476, 7, 47, 2, 25),
(477, 8, 47, 2, 28),
(478, 9, 47, 2, 33),
(479, 10, 47, 2, 37),
(480, 11, 47, 2, 40),
(481, 12, 47, 2, 44),
(482, 1, 48, 2, 17),
(483, 3, 48, 2, 6),
(484, 4, 48, 2, 10),
(485, 6, 48, 2, 21),
(486, 7, 48, 2, 25),
(487, 8, 48, 2, 29),
(488, 9, 48, 2, 33),
(489, 10, 48, 2, 36),
(490, 11, 48, 2, 41),
(491, 12, 48, 2, 45),
(492, 1, 49, 2, 17),
(493, 3, 49, 2, 6),
(494, 4, 49, 2, 11),
(495, 6, 49, 2, 20),
(496, 7, 49, 2, 24),
(497, 8, 49, 2, 28),
(498, 9, 49, 2, 32),
(499, 10, 49, 2, 36),
(500, 11, 49, 2, 40),
(501, 12, 49, 2, 44),
(502, 1, 50, 2, 17),
(503, 3, 50, 2, 7),
(504, 4, 50, 2, 10),
(505, 6, 50, 2, 21),
(506, 7, 50, 2, 25),
(507, 8, 50, 2, 29),
(508, 9, 50, 2, 33),
(509, 10, 50, 2, 36),
(510, 11, 50, 2, 40),
(511, 12, 50, 2, 45),
(512, 1, 51, 2, 17),
(513, 3, 51, 2, 8),
(514, 4, 51, 2, 10),
(515, 6, 51, 2, 20),
(516, 7, 51, 2, 24),
(517, 8, 51, 2, 29),
(518, 9, 51, 2, 32),
(519, 10, 51, 2, 36),
(520, 11, 51, 2, 40),
(521, 12, 51, 2, 45),
(522, 1, 52, 2, 2),
(523, 3, 52, 2, 7),
(524, 4, 52, 2, 10),
(525, 6, 52, 2, 22),
(526, 7, 52, 2, 24),
(527, 8, 52, 2, 28),
(528, 9, 52, 2, 32),
(529, 10, 52, 2, 36),
(530, 11, 52, 2, 41),
(531, 12, 52, 2, 45),
(532, 1, 53, 2, 2),
(533, 3, 53, 2, 7),
(534, 4, 53, 2, 11),
(535, 6, 53, 2, 21),
(536, 7, 53, 2, 24),
(537, 8, 53, 2, 28),
(538, 9, 53, 2, 33),
(539, 10, 53, 2, 36),
(540, 11, 53, 2, 41),
(541, 12, 53, 2, 45),
(542, 1, 54, 2, 2),
(543, 3, 54, 2, 7),
(544, 4, 54, 2, 10),
(545, 6, 54, 2, 21),
(546, 7, 54, 2, 25),
(547, 8, 54, 2, 29),
(548, 9, 54, 2, 32),
(549, 10, 54, 2, 37),
(550, 11, 54, 2, 40),
(551, 12, 54, 2, 44),
(552, 1, 55, 2, 17),
(553, 3, 55, 2, 7),
(554, 4, 55, 2, 11),
(555, 6, 55, 2, 21),
(556, 7, 55, 2, 25),
(557, 8, 55, 2, 29),
(558, 9, 55, 2, 31),
(559, 10, 55, 2, 37),
(560, 11, 55, 2, 41),
(561, 12, 55, 2, 44),
(562, 1, 56, 2, 2),
(563, 3, 56, 2, 7),
(564, 4, 56, 2, 10),
(565, 6, 56, 2, 21),
(566, 7, 56, 2, 25),
(567, 8, 56, 2, 29),
(568, 9, 56, 2, 33),
(569, 10, 56, 2, 37),
(570, 11, 56, 2, 40),
(571, 12, 56, 2, 44),
(572, 1, 57, 2, 17),
(573, 3, 57, 2, 7),
(574, 4, 57, 2, 11),
(575, 6, 57, 2, 19),
(576, 7, 57, 2, 25),
(577, 8, 57, 2, 29),
(578, 9, 57, 2, 31),
(579, 10, 57, 2, 37),
(580, 11, 57, 2, 40),
(581, 12, 57, 2, 44),
(582, 1, 58, 2, 17),
(583, 3, 58, 2, 6),
(584, 4, 58, 2, 11),
(585, 6, 58, 2, 20),
(586, 7, 58, 2, 24),
(587, 8, 58, 2, 28),
(588, 9, 58, 2, 32),
(589, 10, 58, 2, 37),
(590, 11, 58, 2, 40),
(591, 12, 58, 2, 43),
(592, 1, 59, 2, 2),
(593, 3, 59, 2, 7),
(594, 4, 59, 2, 9),
(595, 6, 59, 2, 21),
(596, 7, 59, 2, 24),
(597, 8, 59, 2, 28),
(598, 9, 59, 2, 33),
(599, 10, 59, 2, 37),
(600, 11, 59, 2, 41),
(601, 12, 59, 2, 45),
(602, 1, 60, 2, 18),
(603, 3, 60, 2, 7),
(604, 4, 60, 2, 9),
(605, 6, 60, 2, 21),
(606, 7, 60, 2, 24),
(607, 8, 60, 2, 28),
(608, 9, 60, 2, 33),
(609, 10, 60, 2, 36),
(610, 11, 60, 2, 40),
(611, 12, 60, 2, 43),
(612, 1, 61, 2, 2),
(613, 3, 61, 2, 8),
(614, 4, 61, 2, 12),
(615, 6, 61, 2, 20),
(616, 7, 61, 2, 24),
(617, 8, 61, 2, 30),
(618, 9, 61, 2, 33),
(619, 10, 61, 2, 37),
(620, 11, 61, 2, 41),
(621, 12, 61, 2, 44),
(622, 1, 62, 2, 2),
(623, 3, 62, 2, 7),
(624, 4, 62, 2, 10),
(625, 6, 62, 2, 20),
(626, 7, 62, 2, 25),
(627, 8, 62, 2, 28),
(628, 9, 62, 2, 33),
(629, 10, 62, 2, 37),
(630, 11, 62, 2, 41),
(631, 12, 62, 2, 45),
(632, 1, 63, 2, 17),
(633, 3, 63, 2, 7),
(634, 4, 63, 2, 10),
(635, 6, 63, 2, 21),
(636, 7, 63, 2, 24),
(637, 8, 63, 2, 29),
(638, 9, 63, 2, 32),
(639, 10, 63, 2, 37),
(640, 11, 63, 2, 40),
(641, 12, 63, 2, 43),
(642, 1, 64, 2, 2),
(643, 3, 64, 2, 8),
(644, 4, 64, 2, 10),
(645, 6, 64, 2, 21),
(646, 7, 64, 2, 26),
(647, 8, 64, 2, 29),
(648, 9, 64, 2, 33),
(649, 10, 64, 2, 37),
(650, 11, 64, 2, 42),
(651, 12, 64, 2, 44),
(652, 1, 65, 2, 17),
(653, 3, 65, 2, 7),
(654, 4, 65, 2, 11),
(655, 6, 65, 2, 22),
(656, 7, 65, 2, 26),
(657, 8, 65, 2, 29),
(658, 9, 65, 2, 33),
(659, 10, 65, 2, 37),
(660, 11, 65, 2, 41),
(661, 12, 65, 2, 44);

-- --------------------------------------------------------

--
-- Table structure for table `penerima_bantuan`
--

CREATE TABLE `penerima_bantuan` (
  `id_penerima_bantuan` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `angkatan` tinyint(4) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `status_bantuan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerima_bantuan`
--

INSERT INTO `penerima_bantuan` (`id_penerima_bantuan`, `nik`, `nama`, `angkatan`, `alamat`, `kategori`, `status_bantuan`) VALUES
(1, '351908016050233', 'SITI MASROBINGATUN                           ', 1, 'SARADAN  RT 8 RW 2', 'Pendidikan', 'aktif'),
(2, '351908017060348', 'LAMINI                                       ', 3, 'DESA SUGIHWARAS  RT 17 RW 5', 'Kesejahteraan Sosial', 'aktif'),
(9, '351908016300439', 'ENDANG PATMIATUN                             ', 2, 'DSN KEDUNGREJO DESA SUGIHWARAS  RT 22 RW 7', 'Kesehatan', 'aktif'),
(10, '351908017060396', 'ERLIN YULISTIANA', 4, 'JOSAREN  RT 44 RW 13', 'Kesehatan', 'aktif'),
(11, '351908016050273', 'GUNOTO                                       ', 2, 'DSN JOSAREN DESA SUGIHWARAS  RT 41 RW 12', 'Kesehatan', 'aktif'),
(12, '351908017060360', 'IWAN ARIS WAHYUDIANTO                        ', 4, 'DS SUGIHWARAS  RT 21 RW 7', 'Pendidikan', 'aktif'),
(13, '351908016050278', 'HERLINA PUSPITASARI                          ', 2, 'SUGIHWARAS  RT 16 RW 5', 'Pendidikan', 'aktif'),
(14, '351908016006386', 'KARDINEM                                     ', 2, 'DUSUN CABE  RT 25 RW 8', 'Kesejahteraan Sosial', 'aktif'),
(15, '351908016009106', 'LAMIRAH                                      ', 2, 'DUSUN JOSAREN  RT 40 RW 12', 'Kesejahteraan Sosial', 'aktif'),
(16, '351908020000079', 'LUSMINANIK                                   ', 2, 'DUSUN JOSAREN  RT 39 RW 12', 'Kesehatan', 'aktif'),
(17, '351908016004537', 'LIA PUSPITA SARI                             ', 2, 'DUSUN CABE  RT 25 RW 8', 'Pendidikan', 'aktif'),
(19, '351908016012418', 'MARIANA                                      ', 3, 'DUSUN JOSAREN DESA SUGIHWARAS  RT 40 RW 12', 'Pendidikan', 'tidak'),
(20, '351908016050311', 'MUSTODJO                                     ', 1, 'DS SUGIHWRAS  RT 22 RW 7', 'Kesejahteraan Sosial', 'aktif'),
(22, '351908016004534', 'NYAMINEM                                     ', 3, 'DESA SUGIHWARAS  RT 16 RW 5', 'Kesejahteraan Sosial', 'aktif'),
(23, '351908016050367', 'AGUS SULANDRIO                               ', 2, 'SUGIHWARAS   RT 37  RW 11', 'Kesejahteraan Sosial', 'aktif'),
(24, '351908000600152', 'ARTATIK                                      ', 3, 'DUSUN SARADAN DESA SUGIHWARAS  RT 4 RW 1', 'Pendidikan', 'aktif'),
(25, '351908016050230', 'ASIH YUNIARTI                                ', 2, 'SARADAN  RT 7 RW 2', 'Pendidikan', 'aktif'),
(26, '351908017060371', 'BANDIYAH', 2, 'SUGIHWARAS  RT 5 RW 2', 'Kesejahteraan Sosial', 'aktif'),
(27, '351908016005959', 'BIBIT SUMARNI                                ', 2, 'DUSUN JAMBANGAN  RT 29 RW 9', 'Kesejahteraan Sosial', 'aktif'),
(28, '351908016300472', 'BINTI MUAMANAH                               ', 2, 'DUSUN JAMBANGAN  RT 34 RW 10', 'Kesehatan', 'aktif'),
(29, '351908000600121', 'DAHLIYA                                      ', 2, 'SUGIHWARAS  RT 3 RW 1', 'Pendidikan', 'aktif'),
(30, '351908000600041', 'DAMINEM                                      ', 3, 'DS.SUGIHWARAS  RT 32 RW 9', 'Kesejahteraan Sosial', 'aktif'),
(31, '351908016050207', 'DAMINI                                       ', 1, 'DSN SARADAN  RT 8 RW 2', 'Pendidikan', 'aktif'),
(32, '351908016004743', 'DARMIATI                                     ', 3, 'DUSUN JAMBANGAN  RT 33 RW 9', 'Kesehatan', 'aktif'),
(33, '351908016050255', 'DARMINI                                      ', 2, 'DSN SARADAN DS SUGIHWARAS  RT 10 RW 3', 'Kesejahteraan Sosial', 'aktif'),
(34, '351908016050336', 'DARNI                                        ', 2, 'DESA SUGIHWARAS  RT 29 RW 9', 'Kesehatan', 'aktif'),
(35, '351908016050187', 'DIKEM                                        ', 3, 'SARADAN  RT 4 RW 1', 'Kesejahteraan Sosial', 'aktif'),
(36, '351908016300484', 'DINA APRILLIA                                ', 2, 'NAMPUREJO  RT 38 RW 11', 'Pendidikan', 'aktif'),
(37, '351908016004737', 'DJAMI                                        ', 3, 'SARADAN  RT 8 RW 2', 'Kesehatan', 'aktif'),
(38, '351908019000065', 'DJAMILAH                                     ', 2, 'DSN SARADAN  RT 10 RW 3', 'Kesehatan', 'aktif'),
(39, '351908020000067', 'DJUMINI                                      ', 2, 'DESA SUGIHWARAS  RT 34 RW 10', 'Kesehatan', 'aktif'),
(40, '351908016050243', 'DJUMIRAH                                     ', 2, 'DUSUN. SARADAN  RT 12 RW 3', 'Kesehatan', 'aktif'),
(41, '351908016050211', 'DWI FEBRIANI                                 ', 4, 'SARADAN SARADAN RT 5 RW 2', 'Pendidikan', 'aktif'),
(42, '351908016300351', 'GALIYEM                                      ', 1, 'SUGIHWARAS  RT 6 RW 6', 'Kesejahteraan Sosial', 'aktif'),
(43, '351908016300467', 'HARI YATI                                    ', 3, 'DUSUN JAMBANGAN  RT 32 RW 9', 'Kesehatan', 'aktif'),
(44, '351908016300384', 'HARTATIK                                     ', 3, 'DESA SUGIHWARAS  RT 11 RW 3', 'Kesehatan', 'aktif'),
(45, '351908016009539', 'KASIJATUN                                    ', 3, 'NAMPUREJO  RT 37 RW 11', 'Kesehatan', 'aktif'),
(46, '351908000600136', 'KASMINING                                    ', 3, 'SARADAN  RT 4 RW 1', 'Kesejahteraan Sosial', 'aktif'),
(47, '351908017060386', 'KATEMI                                       ', 3, 'DUSUN JAMBANGAN DS. SUGIHWARAS  RT 32 RW 10', 'Kesejahteraan Sosial', 'aktif'),
(48, '351908016009534', 'NYAMILAH                                     ', 3, 'SUGIHWARAS  RT 21 RW 7', 'Kesejahteraan Sosial', 'aktif'),
(49, '351908016050293', 'NYOTO                                        ', 3, 'DESA SUGIHWARAS  RT 39 RW 12', 'Kesehatan', 'aktif'),
(50, '351908017060339', 'PADIYO                                       ', 1, 'DS SUGIHWARAS  RT 14 RW 4', 'Kesehatan', 'aktif'),
(51, '351908016008331', 'PAINEM                                       ', 1, 'SUGIHWARAS  RT 13 RW 4', 'Kesejahteraan Sosial', 'aktif'),
(52, '351908016005949', 'PARIYEM                                      ', 3, 'SUGIHWARAS  RT 18 RW 5', 'Kesehatan', 'aktif'),
(53, '351908000600089', 'PONIYEM                                      ', 3, 'DS SUGIHWARAS  RT 22 RW 7', 'Kesejahteraan Sosial', 'aktif'),
(54, '351908016050357', 'SEMI                                         ', 3, 'SUGIHWARAS  RT 39 RW 12', 'Kesejahteraan Sosial', 'tidak'),
(55, '351908016005578', 'SRI GEMI ASTUTI                              ', 3, 'DS SUGIHWARAS  RT 14 RW 4', 'Kesejahteraan Sosial', 'aktif'),
(56, '351908016012413', 'SUWARTINI                                    ', 2, 'DESA SUGIHWARAS  RT 20 RW 6', 'Kesejahteraan Sosial', 'aktif'),
(57, '351908017060316', 'TIJAH                                        ', 3, 'DSN CABE  RT 27 RW 8', 'Kesejahteraan Sosial', 'tidak'),
(58, '351908016003971', 'TANEM                                        ', 3, 'NAMPUREJO  RT 37 RW 11', 'Kesehatan', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nama_periode` varchar(20) NOT NULL,
  `tgl_dimulai` date NOT NULL,
  `tgl_berakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `nama_periode`, `tgl_dimulai`, `tgl_berakhir`) VALUES
(1, 'Periode I', '2022-04-01', '2022-04-30'),
(2, 'Periode II', '2022-06-01', '2022-08-31'),
(7, 'Periode III', '2022-07-15', '2022-07-23'),
(9, 'Periode IV', '2022-08-01', '2022-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `nohp`, `alamat`, `username`, `password`, `foto`, `level`, `status`) VALUES
(2, 'Novika Triana', '081231029995', 'Jl. Tugu Ds. Sugihwaras Kec. Saradan ', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'novika.PNG', 'Admin', 'aktif'),
(6, 'Cinta Kirana', '081231045678', 'Jl. Punden Ds. Sugihwaras Kec. Saradan', 'Cinta', '827ccb0eea8a706c4c34a16891f84e7b', 'testimonial-33.jpg', 'Superadmin', 'pasif'),
(8, 'Ridwan Fadilla', '081231029995', 'Jl. Mangga Dsn. Cabe Ds. Sugihwaras ', 'superadmin', '827ccb0eea8a706c4c34a16891f84e7b', 'testimonial-42.jpg', 'Superadmin', 'aktif'),
(9, 'Nabila Fifin', '081231045678', 'Ds. Sugihwaras Kec. Saradan Kab. Madiun', 'novika', 'b88bf1e6afb212abbe645848e3f36a13', 'karina.jpg', 'Admin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `rentang_nilai`
--

CREATE TABLE `rentang_nilai` (
  `id_rentang` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `jenis_rentang` varchar(35) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentang_nilai`
--

INSERT INTO `rentang_nilai` (`id_rentang`, `id_kriteria`, `jenis_rentang`, `nilai`) VALUES
(1, 1, 'Tidak Punya', 1),
(2, 1, 'Menumpang', 2),
(5, 3, 'Tidak Bekerja', 1),
(6, 3, '< 1000000', 2),
(7, 3, '1000000 - 2000000', 3),
(8, 3, '> 2000000', 4),
(9, 4, '> 3 kali', 1),
(10, 4, '2 kali', 2),
(11, 4, '1 kali', 3),
(12, 4, 'Tidak Pernah', 4),
(17, 1, 'Sewa', 3),
(18, 1, 'Milik Sendiri', 4),
(19, 6, '>75%', 1),
(20, 6, '50% - 75 %', 2),
(21, 6, '25% - 50 %', 3),
(22, 6, '< 25 %', 4),
(23, 7, '0', 1),
(24, 7, '1 kali', 2),
(25, 7, '2 kali', 3),
(26, 7, '> 3 kali', 4),
(27, 8, 'Tanah', 1),
(28, 8, 'Plester', 2),
(29, 8, 'Ubin', 3),
(30, 8, 'Keramik', 4),
(31, 9, 'Kayu, Bambu, Kawat', 1),
(32, 9, 'Tembok tanpa plester', 2),
(33, 9, 'Tembok plester / Papan kayu plitur', 3),
(34, 9, 'Tembok Keramik', 4),
(35, 10, 'Tidak Ada', 1),
(36, 10, 'Cubluk', 2),
(37, 10, 'Jongkok', 3),
(38, 10, 'Duduk', 4),
(39, 11, 'Tidak Ada', 1),
(40, 11, '450 Watt', 2),
(41, 11, '900 Watt', 3),
(42, 11, '1300 Watt', 4),
(43, 12, 'Tidak Ada', 1),
(44, 12, '1', 2),
(45, 12, '2', 3),
(46, 12, '> 3', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_periode`
--
ALTER TABLE `detail_periode`
  ADD PRIMARY KEY (`id_detail_periode`),
  ADD KEY `id_penerima_bantuan` (`id_penerima_bantuan`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_rentang` (`id_detail_periode`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `rentang` (`id_rentang`);

--
-- Indexes for table `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  ADD PRIMARY KEY (`id_penerima_bantuan`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `rentang_nilai`
--
ALTER TABLE `rentang_nilai`
  ADD PRIMARY KEY (`id_rentang`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_periode`
--
ALTER TABLE `detail_periode`
  MODIFY `id_detail_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=662;

--
-- AUTO_INCREMENT for table `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  MODIFY `id_penerima_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rentang_nilai`
--
ALTER TABLE `rentang_nilai`
  MODIFY `id_rentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_periode`
--
ALTER TABLE `detail_periode`
  ADD CONSTRAINT `detail_periode_ibfk_1` FOREIGN KEY (`id_penerima_bantuan`) REFERENCES `penerima_bantuan` (`id_penerima_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_periode_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `id_detail_periode` FOREIGN KEY (`id_detail_periode`) REFERENCES `detail_periode` (`id_detail_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kuisioner_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kuisioner_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentang` FOREIGN KEY (`id_rentang`) REFERENCES `rentang_nilai` (`id_rentang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentang_nilai`
--
ALTER TABLE `rentang_nilai`
  ADD CONSTRAINT `rentang_nilai_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
