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
(1, 1, 'Tẩy Trắng Răng', 'Tẩy trắng răng thực chất là phương pháp nha khoa nhằm lấy đi các sắc tố vàng, nâu… ở men răng và ngà răng. Từ đó, giúp răng trở nên trắng sáng hơn. Tuy nhiên, tẩy trắng răng không phải là làm cho răng trắng sáng tuyệt đối.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/taytrangrang.png', '200000', '01:00:00'),
(2, 1, 'Đính Hạt Kim Cương', 'Đính đá kim cương lên răng đang là xu hướng thẩm mỹ được rất nhiều người yêu thích để tạo nên nét duyên ngầm và tinh tế cho nụ cười', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/dinhhatkimcuong.jpg', '1000000', '01:00:00'),
(3, 1, 'Bọc Răng Sứ', 'Bọc răng sứ trên răng thật thì yêu cầu răng phải được sửa soạn (mài) thành hình dạng nhỏ hơn nhằm tạo không gian cho răng sứ, được gọi là cùi răng. Cùi răng phải được tạo sao vừa đủ độ dày và độ lưu giữ (độ cao, độ song song,..) để đảm bảo sự gắn dính lâu dài của răng sứ.\r\nRăng sứ sẽ được tạo riêng cá nhân cho mỗi người bên trong phòng lab nha khoa, dựa trên mẫu cùi răng đã được sao chép khi bác sĩ lấy dấu răng.\r\n', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bocrangsu.jpg', '300000', '01:30:00'),
(4, 2, 'Điều Trị Tủy Răng', 'Điều trị tủy răng là phương pháp lấy bỏ phần tủy bị viêm hay đã chết nằm sâu trong thân răng. Bên cạnh đó, làm sạch khoảng trống còn lại bên trong răng, tạo hình dạng ống tủy và trám bít lại nhằm bít kín ống tủy đã bị hở.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/tuyrang.jpg', '2000000', '02:30:00'),
(5, 2, 'Điều Trị Nha Chu', 'Nha chu là tình trạng viêm nhiễm của tổ chức quanh răng, ảnh hưởng đến cấu trúc nâng đỡ răng, khiến răng mất liên kết với tổ chức nâng đỡ này. Bệnh nha chu ban đầu chỉ ảnh hưởng đến phần mô mềm – nướu răng – sau có thể phát triển ảnh hưởng đến cả xương ổ răng có vai trò quan trọng trong việc giữ răng. Trong trường hợp nghiêm trọng, bệnh nha chu có thể gây ra rụng răng, mất răng.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/nhachu.jpg', '2000000', '01:00:00'),
(6, 2, 'Nhổ Răng', 'Nếu răng bị mẻ hoặc bị tổn thương do sâu răng, nha sĩ sẽ cố gắng khắc phục tình trạng này bằng cách trám răng, sử dụng mão răng hoặc các biện pháp điều trị khác. Tuy nhiên, đôi khi, răng bị tổn thương quá nặng và không thể phục hồi. Trong trường hợp này, răng cần phải được nhổ bỏ.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/nhorang.jpg', '300000', '00:30:00');

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
(1, '0766589630', 'Trần MInh Tâm');

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
(1, 'Trần Thị Diễm', 'Nữ', '0766588633', 'Thạc Sĩ', 'Ba đời trị bênh về răng miêng.', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_diem.jpg', 'Mon - Wed'),
(2, 'Trần Minh Khôi', 'Nam', '0766588634', 'Thạc Sĩ', 'Răng miệng là dễ', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_khoi.jpg', 'Tue - Thu'),
(3, 'Trần Minh Nam', 'Nam', '0766588635', 'Thạc Sĩ', 'Không phải chuyện đùa đâu, tâm linh đó', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_a.jpg', 'Wed - Fri'),
(4, 'Trần Bá Xuyên', 'Nữ', '0766588636', 'Thạc Sĩ', 'Chắc là chữa được, không sao', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_phuong.jpg', 'Thu - Sat'),
(5, 'Trần Bá Ngọc Bình', 'Nữ', '0766588637', 'Thạc Sĩ', 'Chữa xong là đẹp nhứt xóm', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_xuyen.jpg', 'Tue - Fri'),
(6, 'Trần Vĩnh Khiêm', 'Nam', '0766588638', 'Thạc Sĩ', 'Chưa có chắc đâu', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_b.png', 'Thu - Sun'),
(7, 'Trần Dần', 'Nam', '0766588639', 'Tiến Sĩ', 'Để xem....', 'https://raw.githubusercontent.com/zdankz/Do_An/main/khoa_luan/Sou/Pub/images/bs_c.jpg', 'Sat - Sun');

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
(1, 'Thẩm Mỹ', 'Chuyên Làm Đẹp'),
(2, 'Bệnh Lý', 'Vấn đề liên quan răng miệng');

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
(1, 1, '1 Năm'),
(1, 3, '3 Năm'),
(2, 1, '1 Năm'),
(2, 2, '2 Năm'),
(3, 2, '4 Năm'),
(3, 3, '4 Năm'),
(7, 2, '7 Năm'),
(7, 5, '5 Năm\r\n'),
(4, 4, '8 Năm'),
(4, 6, '3 Năm'),
(5, 1, '2 Năm'),
(1, 6, '4 Năm'),
(5, 4, '2 Năm'),
(5, 5, '5 Năm'),
(6, 5, '8 Năm'),
(6, 6, '3 Năm');

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
