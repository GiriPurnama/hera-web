-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 06:05 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbheraweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `nama_album` varchar(300) NOT NULL,
  `album_deskripsi` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `album_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `nama_album`, `album_deskripsi`, `image`, `album_date`, `status`) VALUES
(2, 'Test', 'Album tentang jalan', '../upload/page-album/png-lebah_1527232029.png', '2018-05-25', ''),
(3, 'vv', 'vv', '../upload/page-album/triangle-3213782_1920_1528268948.jpg', '2018-06-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_foto`
--

CREATE TABLE `galeri_foto` (
  `gid` int(11) NOT NULL,
  `albumid` int(11) NOT NULL,
  `nama_foto` varchar(300) NOT NULL,
  `desc_foto` text NOT NULL,
  `foto` varchar(300) NOT NULL,
  `date_foto` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_foto`
--

INSERT INTO `galeri_foto` (`gid`, `albumid`, `nama_foto`, `desc_foto`, `foto`, `date_foto`, `status`) VALUES
(11, 2, 'Skip', 'ccc', '../upload/page-foto/AJFC_1527233279.png', '2018-05-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_video`
--

CREATE TABLE `galeri_video` (
  `videoid` int(11) NOT NULL,
  `nama_video` varchar(200) NOT NULL,
  `video_deskripsi` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `date_video` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_video`
--

INSERT INTO `galeri_video` (`videoid`, `nama_video`, `video_deskripsi`, `video`, `date_video`, `status`) VALUES
(2, 'asdasdaa', 'dsf', 'https://www.youtube.com/embed/Bkcz__8r0l4', '2018-05-30', ''),
(3, 'vv', 'dd', 'https://www.youtube.com/embed/HAIDqt2aUek', '2018-06-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `info_lowongan`
--

CREATE TABLE `info_lowongan` (
  `idlowongan` int(11) NOT NULL,
  `nama_lowongan` varchar(200) NOT NULL,
  `desc_lowongan` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_lowongan`
--

INSERT INTO `info_lowongan` (`idlowongan`, `nama_lowongan`, `desc_lowongan`, `tgl_posting`, `status`) VALUES
(2, 'IT Programmer', '1. IT\r\n2. Supprot', '2018-06-08', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `idkontak` int(11) NOT NULL,
  `wilayah` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `maps` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`idkontak`, `wilayah`, `alamat`, `telepon`, `email`, `maps`) VALUES
(3, 'Surabaya', 'Jalan Sukolilo', '08679800098', 'test@gmail.com', 'surabaya'),
(4, 'Jakarta', 'Jalan Raya Pasar Minggu No 39 A', '08679800098', 'hera.harda@gmail.com', 'Jakarta'),
(5, 'Bandung', 'Jalan Sukolilo', '08679800098', 'hera.harda@gmail.com', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `kotak_surat`
--

CREATE TABLE `kotak_surat` (
  `idkotak_masuk` int(11) NOT NULL,
  `nama_pengirim` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `img_divisi` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `no_emergency` varchar(20) NOT NULL,
  `hubungan` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `motto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_admin`, `username`, `email_admin`, `password`, `nama_lengkap`, `divisi`, `branch`, `img_divisi`, `status`, `no_emergency`, `hubungan`, `facebook`, `linkedin`, `twitter`, `motto`) VALUES
(1, 'giri', 'giri.purnama78@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Giri Purnama', 'IT Support', 'Jakarta', '../upload/page-team/mario-taferner-339576-unsplash_1528269171.jpg', 'ADMIN', '08567909767', 'Aku Sendiri', 'https://www.linkedin.com/in/giri-purnama-060818123/', 'https://www.linkedin.com/in/giri-purnama-060818123/', 'https://www.linkedin.com/in/giri-purnama-060818123/', 'No Game No Life'),
(6, 'angga', 'angga.dwicahya@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Angga', 'HRD IT', 'Bandung', '../upload/page-team/fa984ece3b8e71a622f81f4c849764f2_1528269702.jpg', 'RECRUITMENT', '', '', '', '', '', ''),
(7, 'zalora', 'zalora@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'zalora', 'Recruitment', 'Surabaya', '../upload/page-team/IMG-20180420-WA0032_1528269777.jpg', 'RECRUITMENT', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_client`
--

CREATE TABLE `menu_client` (
  `idclient` int(11) NOT NULL,
  `title_client` varchar(200) NOT NULL,
  `desc_client` varchar(300) NOT NULL,
  `img_client` varchar(200) NOT NULL,
  `tgl_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_client`
--

INSERT INTO `menu_client` (`idclient`, `title_client`, `desc_client`, `img_client`, `tgl_join`) VALUES
(1, 'HArda', 'tessss', '../upload/page-client/hera-black2_1527661230.png', '2016-12-12'),
(2, 'dd', 'ddff', '../upload/page-client/astronomy-evening-exploration-962095_1528268922.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_home`
--

CREATE TABLE `menu_home` (
  `idhome` int(11) NOT NULL,
  `title_img` varchar(200) NOT NULL,
  `desc_img` varchar(300) NOT NULL,
  `image_home` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_home`
--

INSERT INTO `menu_home` (`idhome`, `title_img`, `desc_img`, `image_home`) VALUES
(14, 'cccwwwfff', 'zzzvvvsss', '../upload/page-home/sc onepage_1526628659.png'),
(15, 'cccsss', 'cccccww', '../upload/page-home/mountain_panorama_312395_1526969032.jpg'),
(16, 'hw', 'sd', '../upload/page-home/mario-taferner-339576-unsplash_1528268904.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_team`
--

CREATE TABLE `menu_team` (
  `idteam` int(11) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `img_anggota` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `idpesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idpesan`, `nama`, `subjek`, `email`, `isi_pesan`, `tgl_kirim`, `status`) VALUES
(2, 'ddd', 'saddfas', 'hiroyuki.giri@gmail.com', 'asasf asasf afsa', '2018-05-21', '1'),
(3, 'vvvx sadd', 'vvvxzcx zxc', 'hiroyuki.giri@gmail.com', 'zxcawq', '2018-05-21', '1'),
(5, 'test', 'khkasdh', 'hiroyuki.giri@gmail.com', 'kklasjdljl alksjdl', '2018-05-21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `refrensi` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `warga_negara` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `no_sim` varchar(30) NOT NULL,
  `status_sipil` varchar(20) NOT NULL,
  `alamat_email` varchar(255) NOT NULL,
  `alamat_sekarang` text NOT NULL,
  `berat_badan` varchar(10) NOT NULL,
  `tinggi_badan` varchar(10) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `kuliah` varchar(15) NOT NULL,
  `kemampuan_komputer` text NOT NULL,
  `bahasa_asing` varchar(100) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL,
  `pengalaman_kerja` text NOT NULL,
  `perusahaan_kerja` varchar(100) NOT NULL,
  `tahun_kerja` varchar(5) NOT NULL,
  `lama_pengalaman` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `jadwal_interview` date NOT NULL,
  `promosi_diri` text NOT NULL,
  `post_date` date NOT NULL,
  `status_pelamar` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `posisi_rekomendasi` varchar(100) NOT NULL,
  `token` varchar(20) NOT NULL,
  `interview` varchar(50) NOT NULL,
  `copy_cv` varchar(200) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`id`, `posisi`, `refrensi`, `nama_lengkap`, `warga_negara`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `no_ktp`, `no_sim`, `status_sipil`, `alamat_email`, `alamat_sekarang`, `berat_badan`, `tinggi_badan`, `no_handphone`, `telepon`, `pendidikan_terakhir`, `kuliah`, `kemampuan_komputer`, `bahasa_asing`, `riwayat_penyakit`, `pengalaman_kerja`, `perusahaan_kerja`, `tahun_kerja`, `lama_pengalaman`, `foto`, `ktp`, `ijazah`, `jadwal_interview`, `promosi_diri`, `post_date`, `status_pelamar`, `komentar`, `posisi_rekomendasi`, `token`, `interview`, `copy_cv`, `branch`) VALUES
(9, 'SS', 'ZALORA', 'SS', 'SS', 'SS', '1985-10-17', 'ISLAM', 'PEREMPUAN', '11', '11', 'DUDA', 'AS@MAIL.COM', '11', '11', '11', '11', '11', 'SMA', '', '11', 'JEPANG', '11', '11', '', '', '', '../upload/mario-taferner-339576-unsplash_1528258781.jpg', '../upload/astronomy-evening-exploration-962095_1528258781.jpg', '../upload/triangle-3213782_1920_1528258781.jpg', '0000-00-00', '11', '2018-06-06', '', '', '', 'ZA-38U', '', '../cv/pelamar-exportxls-04-06-2018_1528258781.xls', 'BANDUNG'),
(10, 'SD', 'DD', 'EE', 'EE', 'EE', '2018-06-19', 'ISLAM', 'LAKI-LAKI', '11', '22', 'MENIKAH', 'EEE@GAMIL.COM', 'EE', '11', '11', '11', '11', 'SMA', '', 'EE', 'JEPANG', 'EE', 'EE', '', '', '', '../upload/mario-taferner-339576-unsplash_1528260088.jpg', '../upload/astronomy-evening-exploration-962095_1528260088.jpg', '../upload/background-2730506_1920_1528260088.jpg', '0000-00-00', 'EE', '2018-06-06', '', '', '', 'DD-zNO', '', '../cv/DATA ID CARD SALES_1528260088.xlsx', 'JAKARTA'),
(11, 'XXX', 'ZALORA', 'XXX', 'XX', 'XX', '2018-06-13', 'ISLAM', 'LAKI-LAKI', '111', '11', 'MENIKAH', 'XXX@GMAIL.COM', 'XX', '12', '34', '11', '11', 'D3', '', 'XX', 'MANDARIN', 'XX', 'XX', '', '', '', '../upload/mario-taferner-339576-unsplash_1528266907.jpg', '../upload/astronomy-evening-exploration-962095_1528266907.jpg', '../upload/IMG-20180521-WA0000_1528266907.jpg', '0000-00-00', 'XX', '2018-06-06', '', '', '', 'ZA-IOV', '', '../cv/PT HARDA ESA RAKSA_1528266907.docx', 'SURABAYA'),
(12, 'TEST', 'ZALORA', 'SSF', 'FF', 'FF', '1978-11-15', 'ISLAM', 'LAKI-LAKI', '222', '222', 'MENIKAH', 'FF@GMAIL.COM', 'SS', '12', '32', '11', '11', 'D3', '', 'SSS', 'JERMAN', 'SS', 'SSS', '', '', '', '../upload/IMG-20180418-WA0064_1528352144.jpg', '../upload/turkey-3251638_1528352144.jpg', '../upload/coollogo_com-81561601_1528352144.png', '0000-00-00', '11', '2018-06-07', 'DISARANKAN', '', 'APA AJA', 'ZA-5Gr', 'HELLO', '../cv/CV ORI_1528352144.pdf', 'JAKARTA'),
(13, 'CCC', 'ANGGA', 'CCC', 'CC', 'CC', '1994-07-13', 'ISLAM', 'LAKI-LAKI', '122', '2131', 'MENIKAH', 'ASD@MAIL.COM', 'SDAS', '12', '12', '1231', '213', 'SMA', '', '123', 'JEPANG', 'SAD', 'ASSA', '', '', '', '../upload/astronomy-evening-exploration-962095_1528425796.jpg', '../upload/Ijazah-min_1528425796.jpg', '../upload/image019_1528425796.jpg', '0000-00-00', 'ASA', '2018-06-08', '', '', '', 'AN-Ntq', '', '../cv/Invoice_1528425796.pdf', 'JAKARTA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `galeri_video`
--
ALTER TABLE `galeri_video`
  ADD PRIMARY KEY (`videoid`);

--
-- Indexes for table `info_lowongan`
--
ALTER TABLE `info_lowongan`
  ADD PRIMARY KEY (`idlowongan`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`idkontak`);

--
-- Indexes for table `kotak_surat`
--
ALTER TABLE `kotak_surat`
  ADD PRIMARY KEY (`idkotak_masuk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `menu_client`
--
ALTER TABLE `menu_client`
  ADD PRIMARY KEY (`idclient`);

--
-- Indexes for table `menu_home`
--
ALTER TABLE `menu_home`
  ADD PRIMARY KEY (`idhome`);

--
-- Indexes for table `menu_team`
--
ALTER TABLE `menu_team`
  ADD PRIMARY KEY (`idteam`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`idpesan`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `galeri_video`
--
ALTER TABLE `galeri_video`
  MODIFY `videoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `info_lowongan`
--
ALTER TABLE `info_lowongan`
  MODIFY `idlowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `idkontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kotak_surat`
--
ALTER TABLE `kotak_surat`
  MODIFY `idkotak_masuk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `menu_client`
--
ALTER TABLE `menu_client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu_home`
--
ALTER TABLE `menu_home`
  MODIFY `idhome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `menu_team`
--
ALTER TABLE `menu_team`
  MODIFY `idteam` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
