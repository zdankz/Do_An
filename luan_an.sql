-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 03:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luan_an`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_day_nhasi` (IN `idnhasi` INT)  BEGIN

SELECT nha_si.lich_lam_viec_nha_si,nha_si.id_nha_si FROM nha_si WHERE nha_si.Id_nha_si= idnhasi  ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_dich_vu_theo_nha_si` (IN `id_ns` INT(10), IN `id_ndv` INT(10))  BEGIN SELECT dich_vu.id_dich_vu, dich_vu.ten_dich_vu,dich_vu.mota_dich_vu,dich_vu.hinh_anh_dich_vu,dich_vu.chiphi_dich_vu,
dich_vu.thoi_gian_uoc_tinh,trinh_do_tay_nghe.id_nha_si,nha_si.ho_ten_nha_si from dich_vu inner join trinh_do_tay_nghe on dich_vu.id_dich_vu = trinh_do_tay_nghe.id_dich_vu inner join nhom_dich_vu on nhom_dich_vu.id_nhom_dich_vu = dich_vu.id_nhom_dich_vu JOIN nha_si on nha_si.Id_nha_si = trinh_do_tay_nghe.id_nha_si where trinh_do_tay_nghe.id_nha_si = id_ns and nhom_dich_vu.id_nhom_dich_vu = id_ndv; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_nha_si_theo_nhom_dich_vu` (IN `id_ndv` INT(20))  BEGIN
SELECT  DISTINCT nha_si.id_nha_si,nha_si.ho_ten_nha_si,nha_si.gioi_tinh_nha_si,nha_si.so_dien_thoai_nha_si,nha_si.trinh_do_nha_si,nha_si.gioi_thieu_nha_si,nha_si.hinh_anh_nha_si,nha_si.lich_lam_viec_nha_si,nhom_dich_vu.id_nhom_dich_vu from nha_si join  trinh_do_tay_nghe on trinh_do_tay_nghe.id_nha_si = nha_si.id_nha_si inner join dich_vu on dich_vu.id_dich_vu = trinh_do_tay_nghe.id_dich_vu inner join nhom_dich_vu on nhom_dich_vu.id_nhom_dich_vu = dich_vu.id_nhom_dich_vu where nhom_dich_vu.id_nhom_dich_vu = id_ndv ;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_nha_si_theo_van_de` (IN `id` INT)  BEGIN
SELECT nha_si.id_nha_si, nha_si.ho_ten_nha_si, nha_si.gioi_tinh_nha_si,nha_si.so_dien_thoai_nha_si,nha_si.trinh_do_nha_si,nha_si.gioi_thieu_nha_si,nha_si.hinh_anh_nha_si,nha_si.lich_lam_viec_nha_si ,trinh_do_tay_nghe.id_dich_vu from nha_si join trinh_do_tay_nghe on trinh_do_tay_nghe.id_nha_si = nha_si.id_nha_si where trinh_do_tay_nghe.id_dich_vu = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_time_lich_lam_viec` (IN `idns` INT(11), IN `ngay` DATE)  select don_dat_lich.id_nha_si, nha_si.ho_ten_nha_si,dich_vu.id_dich_vu,dich_vu.ten_dich_vu
,dich_vu.chiphi_dich_vu,time(addtime(don_dat_lich.thoi_gian_du_tru_ket_thuc,'00:30:00')) AS time_bat_dau,time(
addtime((addtime(don_dat_lich.thoi_gian_du_tru_ket_thuc,'00:30:00')),time(dich_vu.thoi_gian_uoc_tinh)))

AS 

time_ket_thuc
from don_dat_lich JOIN nha_si on nha_si.Id_nha_si = don_dat_lich.id_nha_si JOIN dich_vu on dich_vu.id_dich_vu = don_dat_lich.id_dich_vu
WHERE don_dat_lich.id_nha_si = idns and DATE(don_dat_lich.thoi_gian_dang_ky) = ngay
ORDER BY don_dat_lich.thoi_gian_du_tru_ket_thuc DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_time_next` (IN `idns` INT, IN `ngay` DATE)  BEGIN
SELECT nha_si.id_nha_si, nha_si.ho_ten_nha_si, dich_vu.id_dich_vu,dich_vu.ten_dich_vu,dich_vu.chiphi_dich_vu,
date(don_dat_lich.thoi_gian_du_tru_ket_thuc) AS ngay,
time(addtime(don_dat_lich.thoi_gian_du_tru_ket_thuc,'00:20:00')) AS batdau, 
time(addtime(time(addtime(don_dat_lich.thoi_gian_du_tru_ket_thuc,'00:20:00')),dich_vu.thoi_gian_uoc_tinh))
AS ketthuc
from don_dat_lich JOIN dich_vu on dich_vu.id_dich_vu = don_dat_lich.id_dich_vu JOIN nha_si ON nha_si.id_nha_si = don_dat_lich.id_nha_si WHERE don_dat_lich.id_nha_si = idns and date(don_dat_lich.thoi_gian_dang_ky) = ngay
ORDER BY don_dat_lich.thoi_gian_du_tru_ket_thuc DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_van_de_theo_nhom_van_de` (IN `id` INT(20))  BEGIN

SELECT  DISTINCT dich_vu.id_dich_vu,dich_vu.id_nhom_dich_vu, dich_vu.ten_dich_vu, dich_vu.mota_dich_vu,dich_vu.hinh_anh_dich_vu,dich_vu.chiphi_dich_vu,dich_vu.thoi_gian_uoc_tinh from dich_vu where dich_vu.id_nhom_dich_vu = id; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dich_vu`
--

CREATE TABLE `dich_vu` (
  `id_dich_vu` int(11) NOT NULL,
  `id_nhom_dich_vu` int(11) NOT NULL,
  `ten_dich_vu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota_dich_vu` text COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh_dich_vu` text COLLATE utf8_unicode_ci NOT NULL,
  `chiphi_dich_vu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_uoc_tinh` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dich_vu`
--

INSERT INTO `dich_vu` (`id_dich_vu`, `id_nhom_dich_vu`, `ten_dich_vu`, `mota_dich_vu`, `hinh_anh_dich_vu`, `chiphi_dich_vu`, `thoi_gian_uoc_tinh`) VALUES
(1, 1, 'T???y Tr???ng R??ng', 'T???y tr???ng r??ng th???c ch???t l?? ph????ng ph??p nha khoa nh???m l???y ??i c??c s???c t??? v??ng, n??u??? ??? men r??ng v?? ng?? r??ng. T??? ????, gi??p r??ng tr??? n??n tr???ng s??ng h??n. Tuy nhi??n, t???y tr???ng r??ng kh??ng ph???i l?? l??m cho r??ng tr???ng s??ng tuy???t ?????i.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/taytrangrang.png', '200000', '01:00:00'),
(2, 1, '????nh H???t Kim C????ng', '????nh ???? kim c????ng l??n r??ng ??ang l?? xu h?????ng th???m m??? ???????c r???t nhi???u ng?????i y??u th??ch ????? t???o n??n n??t duy??n ng???m v?? tinh t??? cho n??? c?????i', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/dinhhatkimcuong.jpg', '1000000', '01:00:00'),
(3, 1, 'B???c R??ng S???', 'B???c r??ng s??? tr??n r??ng th???t th?? y??u c???u r??ng ph???i ???????c s???a so???n (m??i) th??nh h??nh d???ng nh??? h??n nh???m t???o kh??ng gian cho r??ng s???, ???????c g???i l?? c??i r??ng. C??i r??ng ph???i ???????c t???o sao v???a ????? ????? d??y v?? ????? l??u gi??? (????? cao, ????? song song,..) ????? ?????m b???o s??? g???n d??nh l??u d??i c???a r??ng s???.\r\nR??ng s??? s??? ???????c t???o ri??ng c?? nh??n cho m???i ng?????i b??n trong ph??ng lab nha khoa, d???a tr??n m???u c??i r??ng ???? ???????c sao ch??p khi b??c s?? l???y d???u r??ng.\r\n', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bocrangsu.jpg', '300000', '01:30:00'),
(4, 2, '??i???u Tr??? T???y R??ng', '??i???u tr??? t???y r??ng l?? ph????ng ph??p l???y b??? ph???n t???y b??? vi??m hay ???? ch???t n???m s??u trong th??n r??ng. B??n c???nh ????, l??m s???ch kho???ng tr???ng c??n l???i b??n trong r??ng, t???o h??nh d???ng ???ng t???y v?? tr??m b??t l???i nh???m b??t k??n ???ng t???y ???? b??? h???.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/tuyrang.jpg', '2000000', '02:30:00'),
(5, 2, '??i???u Tr??? Nha Chu', 'Nha chu l?? t??nh tr???ng vi??m nhi???m c???a t??? ch???c quanh r??ng, ???nh h?????ng ?????n c???u tr??c n??ng ????? r??ng, khi???n r??ng m???t li??n k???t v???i t??? ch???c n??ng ????? n??y. B???nh nha chu ban ?????u ch??? ???nh h?????ng ?????n ph???n m?? m???m ??? n?????u r??ng ??? sau c?? th??? ph??t tri???n ???nh h?????ng ?????n c??? x????ng ??? r??ng c?? vai tr?? quan tr???ng trong vi???c gi??? r??ng. Trong tr?????ng h???p nghi??m tr???ng, b???nh nha chu c?? th??? g??y ra r???ng r??ng, m???t r??ng.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/nhachu.jpg', '2000000', '01:00:00'),
(6, 2, 'Nh??? R??ng', 'N???u r??ng b??? m??? ho???c b??? t???n th????ng do s??u r??ng, nha s?? s??? c??? g???ng kh???c ph???c t??nh tr???ng n??y b???ng c??ch tr??m r??ng, s??? d???ng m??o r??ng ho???c c??c bi???n ph??p ??i???u tr??? kh??c. Tuy nhi??n, ????i khi, r??ng b??? t???n th????ng qu?? n???ng v?? kh??ng th??? ph???c h???i. Trong tr?????ng h???p n??y, r??ng c???n ph???i ???????c nh??? b???.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/nhorang.jpg', '300000', '00:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `don_dat_lich`
--

CREATE TABLE `don_dat_lich` (
  `id_don_dat_lich` int(11) NOT NULL,
  `id_nha_si` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL,
  `thoi_gian_tao_don` datetime NOT NULL,
  `thoi_gian_dang_ky` datetime NOT NULL,
  `thoi_gian_du_tru_ket_thuc` datetime NOT NULL,
  `chi_phi_uoc_tinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `don_dat_lich`
--

INSERT INTO `don_dat_lich` (`id_don_dat_lich`, `id_nha_si`, `id_khach_hang`, `id_dich_vu`, `thoi_gian_tao_don`, `thoi_gian_dang_ky`, `thoi_gian_du_tru_ket_thuc`, `chi_phi_uoc_tinh`) VALUES
(7, 1, 1, 1, '2021-04-06 08:17:28', '2021-04-14 08:00:00', '2021-04-14 09:30:00', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_khach_hang` int(11) NOT NULL,
  `so_dien_thoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten_khach_hang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id_khach_hang`, `so_dien_thoai`, `ho_ten_khach_hang`) VALUES
(1, '0766589630', 'Tr???n MInh T??m');

-- --------------------------------------------------------

--
-- Table structure for table `nha_si`
--

CREATE TABLE `nha_si` (
  `Id_nha_si` int(11) NOT NULL,
  `ho_ten_nha_si` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_tinh_nha_si` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai_nha_si` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `trinh_do_nha_si` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu_nha_si` text COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh_nha_si` text COLLATE utf8_unicode_ci NOT NULL,
  `lich_lam_viec_nha_si` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nha_si`
--

INSERT INTO `nha_si` (`Id_nha_si`, `ho_ten_nha_si`, `gioi_tinh_nha_si`, `so_dien_thoai_nha_si`, `trinh_do_nha_si`, `gioi_thieu_nha_si`, `hinh_anh_nha_si`, `lich_lam_viec_nha_si`) VALUES
(1, 'Tr???n Th??? Di???m', 'N???', '0766588633', 'Th???c S??', 'Ba ?????i tr??? b??nh v??? r??ng mi??ng.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_diem.jpg', 'Mon - Wed'),
(2, 'Tr???n Minh Kh??i', 'Nam', '0766588634', 'Th???c S??', 'R??ng mi???ng l?? d???', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_khoi.jpg', 'Tue - Thu'),
(3, 'Tr???n Minh Nam', 'Nam', '0766588635', 'Th???c S??', 'Kh??ng ph???i chuy???n ????a ????u, t??m linh ????', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_a.jpg', 'Wed - Fri'),
(4, 'Tr???n B?? Xuy??n', 'N???', '0766588636', 'Th???c S??', 'Ch???c l?? ch???a ???????c, kh??ng sao', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_phuong.jpg', 'Thu - Sat'),
(5, 'Tr???n B?? Ng???c B??nh', 'N???', '0766588637', 'Th???c S??', 'Ch???a xong l?? ?????p nh???t x??m', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_xuyen.jpg', 'Tue - Fri'),
(6, 'Tr???n V??nh Khi??m', 'Nam', '0766588638', 'Th???c S??', 'Ch??a c?? ch???c ????u', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_b.png', 'Thu - Sun'),
(7, 'Tr???n D???n', 'Nam', '0766588639', 'Ti???n S??', '????? xem....', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_c.jpg', 'Sat - Sun');

-- --------------------------------------------------------

--
-- Table structure for table `nhom_dich_vu`
--

CREATE TABLE `nhom_dich_vu` (
  `id_nhom_dich_vu` int(11) NOT NULL,
  `ten_nhom_dich_vu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota_nhom_dich_vu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhom_dich_vu`
--

INSERT INTO `nhom_dich_vu` (`id_nhom_dich_vu`, `ten_nhom_dich_vu`, `mota_nhom_dich_vu`) VALUES
(1, 'Th???m M???', 'Chuy??n L??m ?????p'),
(2, 'B???nh L??', 'V???n ????? li??n quan r??ng mi???ng');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai`
--

CREATE TABLE `trang_thai` (
  `id_trang_thai` int(11) NOT NULL,
  `ten_trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trinh_do_tay_nghe`
--

CREATE TABLE `trinh_do_tay_nghe` (
  `id_nha_si` int(11) NOT NULL,
  `id_dich_vu` int(11) NOT NULL,
  `kinh_nghiem` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trinh_do_tay_nghe`
--

INSERT INTO `trinh_do_tay_nghe` (`id_nha_si`, `id_dich_vu`, `kinh_nghiem`) VALUES
(1, 1, '1 N??m'),
(1, 3, '3 N??m'),
(2, 1, '1 N??m'),
(2, 2, '2 N??m'),
(3, 2, '4 N??m'),
(3, 3, '4 N??m'),
(7, 2, '7 N??m'),
(7, 5, '5 N??m\r\n'),
(4, 4, '8 N??m'),
(4, 6, '3 N??m'),
(5, 1, '2 N??m'),
(1, 6, '4 N??m'),
(5, 4, '2 N??m'),
(5, 5, '5 N??m'),
(6, 5, '8 N??m'),
(6, 6, '3 N??m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD PRIMARY KEY (`id_dich_vu`),
  ADD KEY `fk_dich_vu_nhom_dich_vu` (`id_nhom_dich_vu`);

--
-- Indexes for table `don_dat_lich`
--
ALTER TABLE `don_dat_lich`
  ADD PRIMARY KEY (`id_don_dat_lich`),
  ADD KEY `fk_don_dat_lich_dich_vu` (`id_dich_vu`),
  ADD KEY `fk_don_dat_lich_nha_si` (`id_nha_si`),
  ADD KEY `fk_don_dat_lich_khach_hang` (`id_khach_hang`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_khach_hang`);

--
-- Indexes for table `nha_si`
--
ALTER TABLE `nha_si`
  ADD PRIMARY KEY (`Id_nha_si`);

--
-- Indexes for table `nhom_dich_vu`
--
ALTER TABLE `nhom_dich_vu`
  ADD PRIMARY KEY (`id_nhom_dich_vu`);

--
-- Indexes for table `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`id_trang_thai`);

--
-- Indexes for table `trinh_do_tay_nghe`
--
ALTER TABLE `trinh_do_tay_nghe`
  ADD KEY `nha_si_trinh_do` (`id_nha_si`),
  ADD KEY `dich_vu_trinh_do` (`id_dich_vu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dich_vu`
--
ALTER TABLE `dich_vu`
  MODIFY `id_dich_vu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `don_dat_lich`
--
ALTER TABLE `don_dat_lich`
  MODIFY `id_don_dat_lich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_khach_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nha_si`
--
ALTER TABLE `nha_si`
  MODIFY `Id_nha_si` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nhom_dich_vu`
--
ALTER TABLE `nhom_dich_vu`
  MODIFY `id_nhom_dich_vu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `id_trang_thai` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dich_vu`
--
ALTER TABLE `dich_vu`
  ADD CONSTRAINT `fk_dich_vu_nhom_dich_vu` FOREIGN KEY (`id_nhom_dich_vu`) REFERENCES `nhom_dich_vu` (`id_nhom_dich_vu`);

--
-- Constraints for table `don_dat_lich`
--
ALTER TABLE `don_dat_lich`
  ADD CONSTRAINT `fk_don_dat_lich_dich_vu` FOREIGN KEY (`id_dich_vu`) REFERENCES `dich_vu` (`id_dich_vu`),
  ADD CONSTRAINT `fk_don_dat_lich_khach_hang` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id_khach_hang`),
  ADD CONSTRAINT `fk_don_dat_lich_nha_si` FOREIGN KEY (`id_nha_si`) REFERENCES `nha_si` (`Id_nha_si`);

--
-- Constraints for table `trinh_do_tay_nghe`
--
ALTER TABLE `trinh_do_tay_nghe`
  ADD CONSTRAINT `dich_vu_trinh_do` FOREIGN KEY (`id_dich_vu`) REFERENCES `dich_vu` (`id_dich_vu`),
  ADD CONSTRAINT `nha_si_trinh_do` FOREIGN KEY (`id_nha_si`) REFERENCES `nha_si` (`Id_nha_si`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
