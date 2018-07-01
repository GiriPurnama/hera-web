-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 03:36 PM
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
(8, 'sdv', 'sdv', '../upload/page-album/DSCF3819_1530013577.JPG', '2018-06-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `idartikel` int(11) NOT NULL,
  `judul_artikel` varchar(200) NOT NULL,
  `isi_artikel` text NOT NULL,
  `foto_artikel` varchar(200) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `galeri_video`
--

CREATE TABLE `galeri_video` (
  `videoid` int(11) NOT NULL,
  `nama_video` varchar(200) NOT NULL,
  `video_deskripsi` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `img_video` varchar(200) NOT NULL,
  `date_video` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_video`
--

INSERT INTO `galeri_video` (`videoid`, `nama_video`, `video_deskripsi`, `video`, `img_video`, `date_video`, `status`) VALUES
(2, 'asdasdaa', 'dsf', 'https://www.youtube.com/embed/Bkcz__8r0l4', '../upload/page-video/arata_1529381386.jpg', '2018-05-30', ''),
(4, 'Video Baru', 'hello', 'https://www.youtube.com/embed/fV4DiAyExN0', '../upload/page-video/test_1529382483.jpg', '2018-06-19', '');

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
(2, 'IT Programmer', '<p>1. IT</p>\r\n\r\n<p>2. Supprot</p>\r\n', '2018-06-08', 'aktif');

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
(1, 'giri', 'giri.purnama78@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Giri Purnama', 'IT Support', 'Jakarta', '../upload/page-team/DSC_1667_1530003990.JPG', 'ADMIN', '08567909767', 'Aku Sendiri', 'https://www.linkedin.com/in/giri-purnama-060818123/', 'https://www.linkedin.com/in/giri-purnama-060818123/', 'https://www.linkedin.com/in/giri-purnama-060818123/', 'No Game No Life'),
(6, 'angga', 'angga.dwicahya@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Angga', 'Recruitment Officer', 'Bandung', '../upload/page-team/DSCF4680_1530004443.JPG', 'RECRUITMENT', '', '', '', '', '', ''),
(7, 'zalora', 'zaloras.hardaesaraksa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Zalora Sanchenia', 'Recruitment Officer', 'Surabaya', '../upload/page-team/20171231_135229_1529567798.jpg', 'ADMIN', '08112330051', 'CALON SUAMI. AAMIIN', 'https://www.facebook.com/Ola.Cecu', 'https://www.linkedin.com/in/zaloras/', 'https://twitter.com/zaloras', 'SETIAP KEINGINAN & MIMPI AKAN MENJADI NYATA APABILA HATIMU MEYAKINI. GAPAILAH KESUKSESAN DUNIA & AKHIRAT'),
(8, 'novi', 'novi.amalia@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Novi Amalia', 'HRD', 'Jakarta', '../upload/page-team/DSCF4698_1530004371.JPG', 'ADMIN', '', '', '', '', '', '');

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
(2, 'dd', 'ddff', '../upload/page-client/astronomy-evening-exploration-962095_1528268922.jpg', '2018-07-09');

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
(14, 'Terpercaya Sejak 2007', 'Mulai dari tahun 2007 hingga saat ini. PT. Harda Esa Raksa dipercaya dalam pengelolaan SDM, baik itu di perusahaan perbankan maupun non perbankan.', '../upload/page-home/IMG-20180626-WA0000_1530000240.jpg'),
(15, 'Good Service', 'Dengan memberikan yang prima dan sesuai dengan motto kami â€œBekerja Dengan Sepenuh Hatiâ€. Kami adalah solusi terbaik dalam penyedia tenaga kerja bagi perusahaan anda.', '../upload/page-home/IMG-20180626-WA0007_1530000320.jpg'),
(16, 'Management Fee Kompetitif', 'Kami menawarkan management fee yang sesuai dengan kualitas yang kami berikan.', '../upload/page-home/IMG-20180626-WA0006_1530000366.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `idtestimonial` int(11) NOT NULL,
  `nama_testimonial` varchar(200) NOT NULL,
  `isi_testimonial` text NOT NULL,
  `foto_testimonial` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`idartikel`);

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
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`idtestimonial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `idartikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `galeri_video`
--
ALTER TABLE `galeri_video`
  MODIFY `videoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `idtestimonial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
