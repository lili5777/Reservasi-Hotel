-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 02:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin123', 'admin123'),
(2, 'admin321', 'admin321');

-- --------------------------------------------------------

--
-- Table structure for table `desk_abounner`
--

CREATE TABLE `desk_abounner` (
  `id` int(2) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `desk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desk_abounner`
--

INSERT INTO `desk_abounner` (`id`, `gambar`, `desk`) VALUES
(1, 'banner8.jpg', 'Tempat ternyaman yang anda damba-dambakan, nikmati keindahan ALTA hotel kami yang dipenuhi dengan keindahan dan fasilitas yang begitu mewah untuk digunakan'),
(2, 'banner2.jfif', 'Terletak di Makassar dan 6 km dari Pantai Losari, ALTA Hotel menyediakan check-in dan check-out secara cepat, kamar, wi-fi gratis di seluruh area, dan taman. ALTA Hotel memiliki pusat kebugaran yang lengkap. Anda dapat menikmati sarapan prasmanan di Hotel ini. ALTA Hotel memiliki beberapa fasilitas yang memudahkan urusan anda. ');

-- --------------------------------------------------------

--
-- Table structure for table `desk_galeri`
--

CREATE TABLE `desk_galeri` (
  `id` int(2) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `desk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desk_galeri`
--

INSERT INTO `desk_galeri` (`id`, `gambar`, `desk`) VALUES
(1, 'banner2.jfif', 'Halaman belakang dengan nuansa kolam renang'),
(2, 'gazebo.jpg', 'Gazebo'),
(3, 'kamar2.jpg', 'Kamar');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(2) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `desk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `gambar`, `nama`, `desk`) VALUES
(1, 'gazebo.jpg', 'GAZEBO', 'gazebo merupakan sebuah fasilitas yang punya ruang terbuka untuk melakukan beragam aktivitas berkumpul dan bersantai'),
(2, 'gym.jpg', 'GYM', 'GYM merupakan pusat kebugaran untuk melatih kesegaran dan kebugara jasmani. Di sana, terdiri dari beberapa tempat yang menyimpan beragam alat-alat olahraga dan latihan fisik, khususnya alat fitness.'),
(3, 'laundry3.jpg', 'LAUNDRY', 'Laundry (binatu) merupakan salah satu bagian dari department Housekeeping sebuah hotel yang memberikan layanan jasa pencucian baik pakaian tamu, seragam karyawan, hingga seluruh linen hotel, restaurant, dan balai pertemuan.'),
(4, 'musholla4.jpg', 'MUSHOLLA', 'Musholla merupakan ruangan, tempat atau rumah kecil menyerupai masjid yang digunakan sebagai tempat salat dan mengaji bagi umat Islam.'),
(5, 'parkiran.jpg', 'PARKIRAN', 'Fasilitas parkir adalah lokasi yang ditentukan sebagai tempat pemberhentian kendaraan yang tidak bersifat sementara untuk melakukan kegiatan pada suatu kurun waktu'),
(6, 'wifi1.jpg', 'WI-FI', 'Wi-Fi adalah teknologi jaringan nirkabel yang menggunakan gelombang radio untuk menyediakan akses internet tanpa kabel dengan kecepatan yang tinggi. Dengan adanya fasilitas wi-fi memudahkan tamu dalam mengakses internet.');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `chek_in` date NOT NULL,
  `chek_out` date NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `metode` enum('Transfer','Tunai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `tipe` varchar(40) NOT NULL,
  `status` enum('TRUE','FALSE','ORDER') DEFAULT NULL,
  `status_bayar` enum('SELESAI','BARU') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `tipe`, `status`, `status_bayar`) VALUES
(1, 'Standar', 'FALSE', 'BARU');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `Ktp` varchar(16) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Nmr` varchar(13) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `Ktp`, `Alamat`, `Nmr`, `username`, `password`) VALUES
(5, 'lili', '01010101', 'pallangga', '08999999', 'user', 'user'),
(8, 'akmal', '987654321', 'gowa', '123456789', 'admin', 'admin'),
(9, 'anjai', '987654321', 'giwa', '987654321', 'anjai', 'anjai'),
(10, 'akmalll', '1234565', 'hoihf', '098765432', 'user1', 'user1'),
(11, 'aljiwani', '123', 'jl kandea 3', '123', 'aji', 'aji'),
(12, 'tri', '123', 'makassar', '0818181', '', ''),
(13, 'kkk', '332', 'kandea 3', '233', '', ''),
(14, 'ali', '1928', 'gowa', '089666554433', 'lili777', 'lili'),
(15, 'CHAKRAJJ', '2222222222', 'kandea', '12345678222', 'chakra1', 'chakra1'),
(16, 'Rahman', '7301092105990001', 'bung', '0808008080', 'dcc', 'dcc123');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id` int(11) NOT NULL,
  `tipe` varchar(40) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `harga` int(7) NOT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `desk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id`, `tipe`, `singkatan`, `harga`, `gambar`, `desk`) VALUES
(1, 'Standar', 'STD', 500000, 'kamar3.jpg', 'Kamar standar adalah tipe kamar hotel yang paling dasar di hotel. Kamar standar juga nerupakan kamar yang terbilang lebih murah dari tipe kamar lainnya. '),
(3, 'Unggul', 'UGL', 750000, 'kamar8.jpeg', 'Kamar Unggul merupakan jenis kamar hotel yang lebih baik dari sisi fasilitas hingga ukuran yang diberikan dibandingkan kamar standar.'),
(4, 'Mewah', 'MWH', 999000, 'kamar5.jpg', 'Di atas tipe kamar unggul adalah kamar mewah. Kamar ini tentu memiliki kamar yang lebih besar. Kamar ini terkesan lebih mewah dari segi interior.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desk_abounner`
--
ALTER TABLE `desk_abounner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desk_galeri`
--
ALTER TABLE `desk_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desk_abounner`
--
ALTER TABLE `desk_abounner`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `desk_galeri`
--
ALTER TABLE `desk_galeri`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
