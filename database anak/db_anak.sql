-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 06:21 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_anak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','superadmin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `nama`, `alamat`, `username`, `password`, `level`) VALUES
('D2796', 'adjdj', 'hajha', 'admin', '123', 'Admin'),
('user3654', 'salah', 'cirebon', 'salah', '123', 'User'),
('user4492', 'handok', 'han', 'handoko', '123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_lap` int(10) NOT NULL,
  `id_user` varchar(55) NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `kd_gejala` varchar(55) NOT NULL,
  `ya_siap` varchar(55) NOT NULL,
  `ragu_ragu` varchar(55) NOT NULL,
  `belum_siap` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_g` int(20) NOT NULL,
  `kd_gejala` varchar(20) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_g`, `kd_gejala`, `gejala`) VALUES
(1, 'G1', 'Kalau berjalan di titian, ia tidak jatuh karena sudah lebih bisa mengontrol keseimbangan dirinya.'),
(2, 'G2', 'Anak ingin mengetahui sesuatu yang belum diketahuinya, seperti ingin dapat menulis, membaca, atau berhitung'),
(3, 'G3', 'Anak dapat memegang alat tulis dengan benar, '),
(4, 'G4', 'Anak dapat mengoordinasikan mata dan tangannya. Misal, anak bisa mengancingkan baju sendiri, menyusun balok-balok, atau memasukkan balok sesuai dengan bentuknya.'),
(5, 'G5', 'Anak bisa menggambar, dan dapat membuat coretan-coretan yang lebih bermakna.'),
(6, 'G6', 'Anak bisa makan sendiri, habis bermain membereskan mainan sendiri, dan bisa mandi sendiri meskipun belum bersih betul.'),
(7, 'G7', 'waktu bermain balok-balok, anak bisa bermain bersamasama dengan temannya membangun sesuatu.'),
(8, 'G8', 'Anak dapat berbagi dan bermain bersamasama dengan temannya.'),
(9, 'G9', 'Anak senang berbicara, pertanyaan anak juga sudah lebih rumit.  Contoh, â€œAyah, mengapa ayam kalau dari jauh menjadi kecil?â€ Anak juga cepat tanggap jika ada hal-hal yang bertentangan dengan apa yang sudah ibu-ayah ucapkan, â€œKata Ibu, sebelum makan harus cuci tangan dulu, tapi kok Ayah boleh â€œ.'),
(10, 'G10', 'anak Mempunyai motivasi belajar yang tinggi tidak mudah menyerah dalam mengerjakan sesuatu'),
(11, 'G11', 'apakah anak anda bisa melakukan Pengamatan bentuk dan kemampuan dalam membedakan sesuatu barang atau benda'),
(12, 'G12', 'bisa melakukan Pengamatan bentuk dan kemampuan dalam membedakan sesuatu barang atau benda');

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id_k` int(11) NOT NULL,
  `kd_kerusakan` varchar(20) NOT NULL,
  `kerusakan` varchar(50) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id_k`, `kd_kerusakan`, `kerusakan`, `solusi`) VALUES
(5, 'P1', 'ANAK ANDA DINYATAKAN SIAP UNTUK BERSEKOLAH', 'Beri MINUM'),
(6, 'P2', 'ANAK ANDA MASIH BELUM SIAP UNTUK BERSEKOLAH', 'Beri MAKAN');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `kerusakan` varchar(150) NOT NULL,
  `id_user` varchar(55) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `kerusakan`, `id_user`, `tgl_diagnosa`) VALUES
(1, 'ANAK ANDA DINYATAKAN SIAP UNTUK BERSEKOLAH ', 'D2796', '2023-05-28'),
(2, 'ANAK ANDA DINYATAKAN SIAP UNTUK BERSEKOLAH ', 'user3654', '2023-05-28'),
(3, 'ANAK ANDA DINYATAKAN SIAP UNTUK BERSEKOLAH ', 'D2796', '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(55) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `user_role`, `gambar`) VALUES
('s5', 'abdul', '123', 'User', 'img/avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_g`);

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_lap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_g` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
