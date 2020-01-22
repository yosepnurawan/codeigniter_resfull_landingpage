-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2020 at 01:11 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damri_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` text NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(7, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.IjIwMjAtMDEtMTQgMDE6MTU6NTUi.vXzQL_O9tJmbFgpiaqVsBF5tdGZk8Ge4vaQijPTr3yQ', 1, 0, 0, '%', 1579004155);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id_comment` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_comment`, `name`, `company`, `comment`) VALUES
(1, 'Joko Pramono', 'Abc Company', 'Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.'),
(2, 'Ilham', 'Tokepedia', 'Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.'),
(3, 'Prima', 'Bukalapuk Company', 'Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `name_galeri` varchar(250) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `name_galeri`, `image`) VALUES
(9, 'Pernikahan 1', '20200116_Pernikahan_1.jpg'),
(10, 'Pernikahan 2', '20200116_Pernikahan_2.jpg'),
(11, 'Pernikahan 3', '20200116_Pernikahan_3.jpg'),
(12, 'Pernikahan 4x2', '20200116_Pernikahan_4x2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(250) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `photo`) VALUES
(1, 'Asbray', 'Programmer', ''),
(14, 'Adi Winarto', 'Marketing', '20200114_Adi_Winarto.png'),
(15, 'Yosep', 'Programmer', '20200114_Yosep.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `keterangan` text NOT NULL,
  `slogan` text NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `github` varchar(250) NOT NULL,
  `service_info` text NOT NULL,
  `cta_info` text NOT NULL,
  `compliment_info` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `latitude` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`id_profile`, `nama`, `keterangan`, `slogan`, `twitter`, `instagram`, `facebook`, `github`, `service_info`, `cta_info`, `compliment_info`, `visi`, `misi`, `longitude`, `latitude`) VALUES
(1, 'SENJA LOGISTICS INDONESIA', 'SENJA LOGISTICS INDONESIA established in April 2003 with it\'s head office in Jakarta, Indonesia after several restructuring in the organization in past company we develope our vision and mission to build international freight forwading in 1st quality and service.', 'International Air and Sea Freight Forwarding.', 'yozhnoe', '106.827324', '-6.175072', 'yosepnurawan', 'With more than 15 years of experience our company has become a partner of hundreds of customers who entrust their cargo shipments, including international companies, exporters, importers, wholesalers, retailers, private individuals and online stores. Following are the professional forwarder services that we have.', 'Freight Forwarders who deliver imported door to door service, LCL / FCL, official / legal and Company / Undername lending throughout Indonesia and we have Agents in Europe and Asia so that we can work on wholesale and official door to door imports at prices Ex-Work, FOB, C&F and CIF.', 'We develope our vision and mission to built international freight forwading in 1st quality and service. Base supported by professional staff and experiences in the field.', 'Lorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Magna et cursus lorem faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod tempus. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida lorem ipsum dolor sit amet dolor feugiat consequat.\r\n\r\nLorem ipsum dolor sit accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Magna et cursus lorem faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod tempus. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida lorem ipsum dolor sit amet dolor feugiat consequat.', 'In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor. Ante commodo blandit adipiscing integer semper orci eget. Faucibus commodo adipiscing mi eu nullam accumsan morbi arcu ornare odio mi adipiscing nascetur lacus ac interdum morbi accumsan vis mi accumsan ac praesent.\r\n\r\nFelis sagittis eget tempus primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Magna sed etiam ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus lorem ipsum dolor sit amet nullam.', '106.827156', '-6.175392');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id_service` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id_service`, `nama`, `keterangan`) VALUES
(1, 'DOOR TO DOOR SERVICE', 'We serve orders from goods pickup at the supplier\'s address, until delivery to the hands of customers from various countries around the world.'),
(2, 'CUSTOMS CLEARANCE & HANDLING', 'We also provide Custom Clearance for ocean and air shipping in quick time and are supported by our professional personnel.'),
(3, 'QUALITY CONTROL', 'Entrust checks your ordered items to match the specifications you provide.'),
(4, 'WAREHOUSE SERVICE', 'Nunc lacinia ante nunc ac lobortis ipsum. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus.'),
(5, 'VERIFIKASI SUPPLIER', 'To accommodate the convenience of making transactions between customers and suppliers abroad, senja logistics comes with a complete solution that includes; supplier selection consultancy - ordering goods - price negotiations - to payment of goods to the supplier.'),
(6, 'TRANSFER SERVICE', 'As an efficient door to door forwarder, we can help you make payments to suppliers within 1 (one) day. This transfer service is very easy and saves you time in payment transactions with suppliers, without the hassle of converting your currency for payment.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tingkat`
--

CREATE TABLE `tbl_tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tingkat`
--

INSERT INTO `tbl_tingkat` (`id_tingkat`, `tingkat`, `keterangan`, `flag`) VALUES
(1, 'Level 1', 'Akses Semua Menu', 1),
(2, 'Level 2', 'Akses 2 Menu', 1),
(3, 'Level 3', 'Akses 1 Menu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `flag` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `flag`, `id_tingkat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(4, 'user2', '7e58d63b60197ceb55a1c487989a3720', 1, 2),
(5, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tbl_tingkat`
--
ALTER TABLE `tbl_tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tingkat`
--
ALTER TABLE `tbl_tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
