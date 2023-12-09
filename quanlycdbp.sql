-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 05:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlycdbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangchamdiem`
--

CREATE TABLE `bangchamdiem` (
  `Mã bảng chấm điểm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Thời gian` datetime NOT NULL,
  `Trạng thái` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã BCH chấm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã BCH chỉnh sửa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã CDBP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Khóa chỉnh sửa` int(11) NOT NULL,
  `Hiển thị chính thức` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bangchamdiem`
--

INSERT INTO `bangchamdiem` (`Mã bảng chấm điểm`, `Thời gian`, `Trạng thái`, `Mã BCH chấm`, `Mã BCH chỉnh sửa`, `Mã CDBP`, `Khóa chỉnh sửa`, `Hiển thị chính thức`) VALUES
('BCD001', '2022-04-05 17:52:16', 'Chưa xử lý', '', '', 'CD001', 1, 1),
('BCD002', '2022-05-27 18:04:47', 'Đã xử lý', 'TVBCH001', '', 'CD001', 1, 1),
('BCD003', '2022-05-27 05:08:03', 'Đã xử lý', 'TVBCH002', '', 'CD002', 1, 0),
('BCD004', '2022-05-29 06:45:14', 'Đã xử lý', 'TVBCH004', '', 'CD001', 0, 0),
('BCD005', '2022-05-29 06:48:13', 'Đã xử lý', 'TVBCH004', '', 'CD002', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bangchamdiem_chitiettieuchi`
--

CREATE TABLE `bangchamdiem_chitiettieuchi` (
  `Mã bảng chấm điểm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã chi tiết tiêu chí` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã tiêu chí` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Điểm CDBP chấm` float NOT NULL,
  `Điểm BCH chấm` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bangchamdiem_chitiettieuchi`
--

INSERT INTO `bangchamdiem_chitiettieuchi` (`Mã bảng chấm điểm`, `Mã chi tiết tiêu chí`, `Mã tiêu chí`, `Điểm CDBP chấm`, `Điểm BCH chấm`) VALUES
('BCD001', 'CTTC001', 'TC001', 1, 0),
('BCD001', 'CTTC002', 'TC001', 2, 0),
('BCD001', 'CTTC003', 'TC001', 2, 0),
('BCD001', 'CTTC004', 'TC001', 2, 0),
('BCD001', 'CTTC005', 'TC001', 0, 0),
('BCD001', 'CTTC006', 'TC001', 1, 0),
('BCD001', 'CTTC007', 'TC001', 0, 0),
('BCD001', 'CTTC008', 'TC002', 2, 0),
('BCD001', 'CTTC009', 'TC002', 0, 0),
('BCD001', 'CTTC010', 'TC002', 2, 0),
('BCD001', 'CTTC011', 'TC002', 0, 0),
('BCD001', 'CTTC012', 'TC003', 2, 0),
('BCD001', 'CTTC013', 'TC003', 0, 0),
('BCD001', 'CTTC014', 'TC003', 0, 0),
('BCD001', 'CTTC015', 'TC003', 0, 0),
('BCD001', 'CTTC016', 'TC003', 2, 0),
('BCD001', 'CTTC017', 'TC004', 1, 0),
('BCD001', 'CTTC018', 'TC004', 1, 0),
('BCD001', 'CTTC019', 'TC004', 0, 0),
('BCD001', 'CTTC020', 'TC004', 0, 0),
('BCD001', 'CTTC021', 'TC004', 0, 0),
('BCD001', 'CTTC022', 'TC004', 0, 0),
('BCD001', 'CTTC023', 'TC005', 1, 0),
('BCD001', 'CTTC024', 'TC005', 0, 0),
('BCD001', 'CTTC025', 'TC005', 0, 0),
('BCD001', 'CTTC026', 'TC006', 1, 0),
('BCD001', 'CTTC027', 'TC006', 0, 0),
('BCD001', 'CTTC028', 'TC006', 0, 0),
('BCD001', 'CTTC029', 'TC007', 2, 0),
('BCD001', 'CTTC030', 'TC007', 3, 0),
('BCD001', 'CTTC031', 'TC008', 3, 0),
('BCD001', 'CTTC032', 'TC008', 0, 0),
('BCD001', 'CTTC033', 'TC008', 1, 0),
('BCD002', 'CTTC001', 'TC001', 1, 1),
('BCD002', 'CTTC002', 'TC001', 1, 1),
('BCD002', 'CTTC003', 'TC001', 1, 1),
('BCD002', 'CTTC004', 'TC001', 0, 0),
('BCD002', 'CTTC005', 'TC001', 0, 0),
('BCD002', 'CTTC006', 'TC001', 0, 0),
('BCD002', 'CTTC007', 'TC001', 0, 0),
('BCD002', 'CTTC008', 'TC002', 1, 0),
('BCD002', 'CTTC009', 'TC002', 1, 1),
('BCD002', 'CTTC010', 'TC002', 0, 1),
('BCD002', 'CTTC011', 'TC002', 0, 0),
('BCD002', 'CTTC012', 'TC003', 0, 0),
('BCD002', 'CTTC013', 'TC003', 0, 0),
('BCD002', 'CTTC014', 'TC003', 0, 0),
('BCD002', 'CTTC015', 'TC003', 0, 0),
('BCD002', 'CTTC016', 'TC003', 0, 1),
('BCD002', 'CTTC017', 'TC004', 0, 0),
('BCD002', 'CTTC018', 'TC004', 0, 0),
('BCD002', 'CTTC019', 'TC004', 0, 0),
('BCD002', 'CTTC020', 'TC004', 0, 0),
('BCD002', 'CTTC021', 'TC004', 0, 0),
('BCD002', 'CTTC022', 'TC004', 0, 0),
('BCD002', 'CTTC023', 'TC005', 0, 0),
('BCD002', 'CTTC024', 'TC005', 0, 0),
('BCD002', 'CTTC025', 'TC005', 0, 0),
('BCD002', 'CTTC026', 'TC006', 0, 0),
('BCD002', 'CTTC027', 'TC006', 0, 0),
('BCD002', 'CTTC028', 'TC006', 0, 0),
('BCD002', 'CTTC029', 'TC007', 0, 0),
('BCD002', 'CTTC030', 'TC007', 0, 0),
('BCD002', 'CTTC031', 'TC008', 0, 1),
('BCD002', 'CTTC032', 'TC008', 0, 0),
('BCD002', 'CTTC033', 'TC008', 0, 0),
('BCD003', 'CTTC001', 'TC001', 2, 2),
('BCD003', 'CTTC002', 'TC001', 3, 3),
('BCD003', 'CTTC003', 'TC001', 3, 3),
('BCD003', 'CTTC004', 'TC001', 3, 3),
('BCD003', 'CTTC005', 'TC001', 0, 3),
('BCD003', 'CTTC006', 'TC001', 0, 3),
('BCD003', 'CTTC007', 'TC001', 0, 0),
('BCD003', 'CTTC008', 'TC002', 2, 2),
('BCD003', 'CTTC009', 'TC002', 0, 2),
('BCD003', 'CTTC010', 'TC002', 0, 0),
('BCD003', 'CTTC011', 'TC002', 0, 3),
('BCD003', 'CTTC012', 'TC003', 0, 0),
('BCD003', 'CTTC013', 'TC003', 0, 3),
('BCD003', 'CTTC014', 'TC003', 0, 3),
('BCD003', 'CTTC015', 'TC003', 0, 0),
('BCD003', 'CTTC016', 'TC003', 0, 0),
('BCD003', 'CTTC017', 'TC004', 0, 0),
('BCD003', 'CTTC018', 'TC004', 0, 0),
('BCD003', 'CTTC019', 'TC004', 0, 3),
('BCD003', 'CTTC020', 'TC004', 0, 2),
('BCD003', 'CTTC021', 'TC004', 0, 0),
('BCD003', 'CTTC022', 'TC004', 0, 0),
('BCD003', 'CTTC023', 'TC005', 0, 0),
('BCD003', 'CTTC024', 'TC005', 0, 0),
('BCD003', 'CTTC025', 'TC005', 0, 1),
('BCD003', 'CTTC026', 'TC006', 0, 0),
('BCD003', 'CTTC027', 'TC006', 0, 0),
('BCD003', 'CTTC028', 'TC006', 0, 0),
('BCD003', 'CTTC029', 'TC007', 0, 2),
('BCD003', 'CTTC030', 'TC007', 2, 0),
('BCD003', 'CTTC031', 'TC008', 0, 2),
('BCD003', 'CTTC032', 'TC008', 0, 2),
('BCD003', 'CTTC033', 'TC008', 0, 4),
('BCD004', 'CTTC001', 'TC001', 3, 2),
('BCD004', 'CTTC002', 'TC001', 3, 2),
('BCD004', 'CTTC003', 'TC001', 3, 0),
('BCD004', 'CTTC004', 'TC001', 3, 2),
('BCD004', 'CTTC005', 'TC001', 3, 0),
('BCD004', 'CTTC006', 'TC001', 3, 3),
('BCD004', 'CTTC007', 'TC001', 2, 0),
('BCD004', 'CTTC008', 'TC002', 2, 0),
('BCD004', 'CTTC009', 'TC002', 2, 0),
('BCD004', 'CTTC010', 'TC002', 2, 0),
('BCD004', 'CTTC011', 'TC002', 9, 0),
('BCD004', 'CTTC012', 'TC003', 4, 2),
('BCD004', 'CTTC013', 'TC003', 3, 2),
('BCD004', 'CTTC014', 'TC003', 3, 0),
('BCD004', 'CTTC015', 'TC003', 2, 0),
('BCD004', 'CTTC016', 'TC003', 3, 0),
('BCD004', 'CTTC017', 'TC004', 2, 0),
('BCD004', 'CTTC018', 'TC004', 2, 0),
('BCD004', 'CTTC019', 'TC004', 4, 3),
('BCD004', 'CTTC020', 'TC004', 2, 0),
('BCD004', 'CTTC021', 'TC004', 2, 0),
('BCD004', 'CTTC022', 'TC004', 3, 0),
('BCD004', 'CTTC023', 'TC005', 2, 0),
('BCD004', 'CTTC024', 'TC005', 2, 0),
('BCD004', 'CTTC025', 'TC005', 1, 0),
('BCD004', 'CTTC026', 'TC006', 2, 0),
('BCD004', 'CTTC027', 'TC006', 2, 0),
('BCD004', 'CTTC028', 'TC006', 1, 0),
('BCD004', 'CTTC029', 'TC007', 2, 0),
('BCD004', 'CTTC030', 'TC007', 3, 0),
('BCD004', 'CTTC031', 'TC008', 9, 0),
('BCD004', 'CTTC032', 'TC008', 2, 0),
('BCD004', 'CTTC033', 'TC008', 4, 2),
('BCD005', 'CTTC001', 'TC001', 2, 2),
('BCD005', 'CTTC002', 'TC001', 2, 3),
('BCD005', 'CTTC003', 'TC001', 2, 3),
('BCD005', 'CTTC004', 'TC001', 2, 2),
('BCD005', 'CTTC005', 'TC001', 1, 0),
('BCD005', 'CTTC006', 'TC001', 0, 0),
('BCD005', 'CTTC007', 'TC001', 0, 0),
('BCD005', 'CTTC008', 'TC002', 0, 0),
('BCD005', 'CTTC009', 'TC002', 0, 0),
('BCD005', 'CTTC010', 'TC002', 2, 0),
('BCD005', 'CTTC011', 'TC002', 3, 0),
('BCD005', 'CTTC012', 'TC003', 0, 0),
('BCD005', 'CTTC013', 'TC003', 0, 0),
('BCD005', 'CTTC014', 'TC003', 0, 0),
('BCD005', 'CTTC015', 'TC003', 0, 0),
('BCD005', 'CTTC016', 'TC003', 0, 0),
('BCD005', 'CTTC017', 'TC004', 0, 0),
('BCD005', 'CTTC018', 'TC004', 0, 0),
('BCD005', 'CTTC019', 'TC004', 0, 0),
('BCD005', 'CTTC020', 'TC004', 0, 0),
('BCD005', 'CTTC021', 'TC004', 0, 0),
('BCD005', 'CTTC022', 'TC004', 0, 0),
('BCD005', 'CTTC023', 'TC005', 0, 0),
('BCD005', 'CTTC024', 'TC005', 0, 2),
('BCD005', 'CTTC025', 'TC005', 0, 0),
('BCD005', 'CTTC026', 'TC006', 0, 0),
('BCD005', 'CTTC027', 'TC006', 0, 0),
('BCD005', 'CTTC028', 'TC006', 0, 0),
('BCD005', 'CTTC029', 'TC007', 0, 1),
('BCD005', 'CTTC030', 'TC007', 0, 1),
('BCD005', 'CTTC031', 'TC008', 0, 2),
('BCD005', 'CTTC032', 'TC008', 0, 2),
('BCD005', 'CTTC033', 'TC008', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bangquyen`
--

CREATE TABLE `bangquyen` (
  `Mã quyền` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tên quyền` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bangquyen`
--

INSERT INTO `bangquyen` (`Mã quyền`, `Tên quyền`) VALUES
('AD', 'Quyền Admin'),
('CDBP', 'Quyền công đoàn bộ phận'),
('CTCD', 'Chủ tịch công đoàn'),
('TVBCH', 'Quyền thành viên ban chấp hành công đoàn');

-- --------------------------------------------------------

--
-- Table structure for table `bch`
--

CREATE TABLE `bch` (
  `Mã ban chấp hành CDBP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Số lượng` int(11) NOT NULL,
  `Khóa` int(11) NOT NULL,
  `Ngày thành lập` date NOT NULL,
  `Ngày kết thúc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bch`
--

INSERT INTO `bch` (`Mã ban chấp hành CDBP`, `Số lượng`, `Khóa`, `Ngày thành lập`, `Ngày kết thúc`) VALUES
('BCH001', 2, 1, '2000-05-22', '2005-05-22'),
('BCH002', 2, 2, '2005-05-22', '2010-05-22'),
('BCH003', 2, 3, '2010-05-22', '2015-05-22'),
('BCH004', 3, 4, '2015-05-22', '2020-05-22'),
('BCH005', 3, 5, '2020-05-22', '2025-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `cdbp`
--

CREATE TABLE `cdbp` (
  `Mã CDBP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tên CDBP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ngày thành lập` date NOT NULL,
  `Ngày kết thúc` date NOT NULL,
  `Tên tài khoản` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Trạng thái` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cdbp`
--

INSERT INTO `cdbp` (`Mã CDBP`, `Tên CDBP`, `Ngày thành lập`, `Ngày kết thúc`, `Tên tài khoản`, `Trạng thái`) VALUES
('CD001', 'Ban Quản lý dự án và Hạ tầng', '2017-01-01', '0000-00-00', 'TK001', 'Đã chấm điểm'),
('CD002', 'Khoa Công nghệ thông tin', '2017-01-01', '0000-00-00', 'TK002', 'Đã chấm điểm'),
('CD003', 'Khoa Điện tử Viễn thông', '2017-01-01', '0000-00-00', 'TK003', 'Chưa chấm điểm'),
('CD004', 'Khoa Giáo dục', '2017-01-01', '0000-00-00', 'TK004', 'Chưa chấm điểm'),
('CD005', 'Khoa Giáo dục Chính trị', '2017-01-01', '0000-00-00', 'TK005', 'Chưa chấm điểm'),
('CD006', 'Khoa Giáo dục Mầm non', '2017-01-01', '0000-00-00', 'TK006', 'Chưa chấm điểm'),
('CD007', 'Khoa Giáo dục Quốc phòng -An ninh & Giáo dục Thể chất', '2017-01-01', '0000-00-00', 'TK007', 'Chưa chấm điểm'),
('CD008', 'Khoa Giáo dục Tiểu học', '0000-00-00', '0000-00-00', 'TK008', 'Chưa chấm điểm'),
('CD009', 'Khoa Khoa học Môi trường', '2017-01-01', '0000-00-00', 'TK009', 'Chưa chấm điểm'),
('CD010', 'Khoa Luật', '2017-01-01', '0000-00-00', 'TK010', 'Chưa chấm điểm'),
('CD011', 'Khoa Nghệ thuật', '2017-01-01', '0000-00-00', 'TK011', 'Chưa chấm điểm'),
('CD012', 'Khoa Ngoại ngữ', '2017-01-01', '0000-00-00', 'TK012', 'Chưa chấm điểm'),
('CD013', 'Khoa Quan hệ Quốc tế', '2017-01-01', '0000-00-00', 'TK013', 'Chưa chấm điểm'),
('CD014', 'Khoa Quản trị Kinh doanh', '2017-01-01', '0000-00-00', 'TK014', 'Chưa chấm điểm'),
('CD015', 'Khoa Sư phạm Khoa học Tự nhiên', '2017-01-01', '0000-00-00', 'TK015', 'Chưa chấm điểm'),
('CD016', 'Khoa Sư phạm Khoa học Xã hội', '2017-01-01', '0000-00-00', 'TK016', 'Chưa chấm điểm'),
('CD017', 'Khoa Tài chính Kế toán', '2017-01-01', '0000-00-00', 'TK017', 'Chưa chấm điểm'),
('CD018', 'Khoa Thư viện Văn phòng', '2017-01-01', '0000-00-00', 'TK018', 'Chưa chấm điểm'),
('CD019', 'Khoa Toán - Ứng dụng', '2017-01-01', '0000-00-00', 'TK019', 'Chưa chấm điểm'),
('CD020', 'Ký túc xá', '2017-01-01', '0000-00-00', 'TK020', 'Chưa chấm điểm'),
('CD021', 'Phòng Công tác sinh viên', '2017-01-01', '0000-00-00', 'TK021', 'Chưa chấm điểm'),
('CD022', 'Phòng Đào tạo', '2017-01-01', '0000-00-00', 'TK022', 'Chưa chấm điểm'),
('CD023', 'Phòng Đào tạo Sau Đại học', '2017-01-01', '0000-00-00', 'TK023', 'Chưa chấm điểm'),
('CD024', 'Phòng Giáo dục Thường xuyên', '2017-01-01', '0000-00-00', 'TK024', 'Chưa chấm điểm'),
('CD025', 'Phòng Hợp tác Quốc tế và Doanh nghiệp - Y tế - Trung tâm Đào tạo Quốc tế', '2017-01-01', '0000-00-00', 'TK025', 'Chưa chấm điểm'),
('CD026', 'Phòng Kế hoạch Tài chính', '2017-01-01', '0000-00-00', 'TK026', 'Chưa chấm điểm'),
('CD027', 'Phòng Khảo thí và Đảm bảo chất lượng giáo dục', '2017-01-01', '0000-00-00', 'TK027', 'Chưa chấm điểm'),
('CD028', 'Phòng Quản lý Khoa học', '0000-00-00', '0000-00-00', 'TK028', 'Chưa chấm điểm'),
('CD029', 'Phòng Thanh tra Pháp chế', '0000-00-00', '0000-00-00', 'TK029', 'Chưa chấm điểm'),
('CD030', 'Phòng Thiết bị', '0000-00-00', '0000-00-00', 'TK030', 'Chưa chấm điểm'),
('CD031', 'Phòng Tổ chức Cán bộ', '0000-00-00', '0000-00-00', 'TK031', 'Chưa chấm điểm'),
('CD032', 'Phòng Văn phòng', '0000-00-00', '0000-00-00', 'TK032', 'Chưa chấm điểm'),
('CD033', 'Trung tâm Bồi dưỡng và Khảo thí Ngoại ngữ', '0000-00-00', '0000-00-00', 'TK033', 'Chưa chấm điểm'),
('CD034', 'Trung tâm Công nghệ thông tin', '0000-00-00', '0000-00-00', 'TK034', 'Chưa chấm điểm'),
('CD035', 'Trung tâm Hỗ trợ sinh viên', '0000-00-00', '0000-00-00', 'TK035', 'Chưa chấm điểm'),
('CD036', 'Trung tâm Học liệu', '0000-00-00', '0000-00-00', 'TK036', 'Chưa chấm điểm');

-- --------------------------------------------------------

--
-- Table structure for table `chitietgioithieu`
--

CREATE TABLE `chitietgioithieu` (
  `Mã chi tiết giới thiệu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã giới thiệu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nội dung chi tiết giới thiệu` text COLLATE utf8_unicode_ci NOT NULL,
  `Hiển thị` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietgioithieu`
--

INSERT INTO `chitietgioithieu` (`Mã chi tiết giới thiệu`, `Mã giới thiệu`, `Nội dung chi tiết giới thiệu`, `Hiển thị`) VALUES
('CTGT001', 'GT001', 'Là tổ chức chính trị – xã hội rộng lớn của giai cấp công nhân và người lao động, tự nguyện lập ra dưới sự lãnh đạo của Đảng cộng sản Việt Nam.', 0),
('CTGT002', 'GT001', 'Đại diện và bảo vệ các quyền, lợi ích hợp pháp chính đáng của người lao động, phối hợp cùng với chính quyền, thủ trưởng cơ quan chăm lo đời sống vật chất, tinh thần cho người lao động.', 0),
('CTGT003', 'GT001', 'Thực hiện các nhiệm vụ có liên quan đến công tác tổ chức, quản lý cán bộ, giảng viên, giáo viên, công nhân viên.', 0),
('CTGT004', 'GT001', 'Đại diện và tổ chức người lao động tham gia quản lý cơ quan đơn vị, tổ chức các phong trào thi đua, không ngừng nâng cao chất lượng đội ngũ về chính trị lẫn chuyên môn, nghiệp vụ.', 0),
('CTGT005', 'GT001', 'Cùng với nhà trường tổ chức, thực hiện quyền làm chủ của tập thể lao động theo quy định của pháp luật.', 0),
('CTGT006', 'GT001', 'Kiểm tra, giám sát việc thi hành chính sách pháp luật, chế độ về lao động.', 0),
('CTGT007', 'GT001', 'Phát triển đoàn viên, xây dựng công đoàn vững mạnh, vận động mọi người lao động thực hiện nếp sống văn hoá mới, chính sách Dân số -kế hoạch.', 0),
('CTGT008', 'GT002', 'Là tổ chức chính trị – xã hội rộng lớn của giai cấp công nhân và người lao động, tự nguyện lập ra dưới sự lãnh đạo của Đảng cộng sản Việt Nam.', 0),
('CTGT009', 'GT002', 'Đại diện và bảo vệ các quyền, lợi ích hợp pháp chính đáng của người lao động, phối hợp cùng với chính quyền, thủ trưởng cơ quan chăm lo đời sống vật chất, tinh thần cho người lao động.', 0),
('CTGT010', 'GT002', 'Thực hiện các nhiệm vụ có liên quan đến công tác tổ chức, quản lý cán bộ, giảng viên, giáo viên, công nhân viên.', 0),
('CTGT011', 'GT002', 'Đại diện và tổ chức người lao động tham gia quản lý cơ quan đơn vị, tổ chức các phong trào thi đua, không ngừng nâng cao chất lượng đội ngũ về chính trị lẫn chuyên môn, nghiệp vụ.', 0),
('CTGT012', 'GT002', 'Cùng với nhà trường tổ chức, thực hiện quyền làm chủ của tập thể lao động theo quy định của pháp luật.', 0),
('CTGT013', 'GT002', 'Kiểm tra, giám sát việc thi hành chính sách pháp luật, chế độ về lao động.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitiettieuchichamdiem`
--

CREATE TABLE `chitiettieuchichamdiem` (
  `Mã chi tiết tiêu chí` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nội dung chi tiết tiêu chí` text COLLATE utf8_unicode_ci NOT NULL,
  `Điểm chuẩn chi tiết tiêu chí` int(11) NOT NULL,
  `Mã tiêu chí` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiettieuchichamdiem`
--

INSERT INTO `chitiettieuchichamdiem` (`Mã chi tiết tiêu chí`, `Nội dung chi tiết tiêu chí`, `Điểm chuẩn chi tiết tiêu chí`, `Mã tiêu chí`) VALUES
('CTTC001', 'Phổ biến các Nghị quyết, chủ trương của Đảng, pháp luật của Nhà nước, chế độ chính sách cho cán bộ, viên chức (CBVC).', 3, 'TC001'),
('CTTC002', 'Phối hợp với Trưởng đơn vị tổ chức hội nghị CBVC đúng thời hạn, thực hiện tốt quy chế dân chủ nơi đơn vị.', 3, 'TC001'),
('CTTC003', 'Giám sát việc thực hiện đầy đủ các chế độ chính sách đối với CBVC.', 3, 'TC001'),
('CTTC004', 'Phối hợp với Trưởng đơn vị phát động, tổ chức các phong trào thi đua hiệu quả, thiết thực.', 3, 'TC001'),
('CTTC005', 'Tham gia cải tiến lề lối, điều kiện làm việc, nâng cao chất lượng công tác và thực hiện tốt nhiệm vụ chính trị.', 3, 'TC001'),
('CTTC006', 'Tổ chức tốt các hoạt động chăm lo đời sống vật chất, tinh thần cho CBVC (Tết Nguyên đán, Ngày NGVN), kết hợp với Chính quyền tổ chức hoạt động nghỉ dưỡng, tham quan.', 3, 'TC001'),
('CTTC007', 'Không có đoàn viên công đoàn vi phạm pháp luật, chế độ chính sách, pháp lệnh, bị kỷ luật dưới mọi hình thức.', 2, 'TC001'),
('CTTC008', 'Tổ chức triển khai, tuyên truyền các tài liệu, đề cương về: chủ trương, chính sách của Đảng, pháp luật của Nhà nước, các phong trào thi đua, các cuộc vận động của Ngành và Công đoàn.', 2, 'TC002'),
('CTTC009', 'Nắm bắt và phản ánh kịp thời dư luận xã hội trong CBVC. Tham mưu giải quyết kịp thời các kiến nghị, nguyện vọng chính đáng của CBVC. Vận động CBVC học tập nâng cao trình độ, bồi dưỡng chuyên môn nghiệp vụ.', 2, 'TC002'),
('CTTC010', 'Vận động đoàn viên công đoàn (ĐVCĐ) tham gia các hoạt động và phong trào thi đua: “Đổi mới, sáng tạo trong dạy và học”;  “Dạy tốt - Học tốt”; các cuộc vận động “Dân chủ - Kỷ cương - Tình thương – Trách nhiệm”. Đẩy mạnh “Học tập và làm theo tư tưởng, đạo dức, phong cách Hồ Chí Minh”.', 2, 'TC002'),
('CTTC011', 'Tham gia các hoạt động do CĐCS tổ chức\r\n- Hội thao kỷ niệm Ngày Nhà giáo Việt Nam (20/11)\r\n- Cuộc thi ảnh “Nét đẹp Áo dài – Đại học Sài Gòn”\r\n- Hội thao truyền thống Công đoàn chào mừng các ngày lễ lớn (30/4, 01/5, 19/5), Tháng Công nhân năm 2021.\r\n- Hội thi trực tuyến “Tìm hiểu pháp luật về bầu cử đại biểu Quốc hội và đại biểu Hội đồng nhân dân”.\r\n', 9, 'TC002'),
('CTTC012', 'Tham gia đầy đủ các buổi họp Ban Chấp hành Công đoàn mở rộng.', 4, 'TC003'),
('CTTC013', '- Xây dựng kế hoạch hoạt động năm học \r\n- Nộp đúng thời gian quy định\r\n- Có đăng ký danh hiệu thi đua, công trình', 3, 'TC003'),
('CTTC014', 'Kết quả công tác kết nạp đoàn viên công đoàn và làm thẻ đoàn viên (đạt trên 95%)', 3, 'TC003'),
('CTTC015', '- Có xem xét, giới thiệu đoàn viên công đoàn xuất sắc tham gia lớp học “Bồi dưỡng nhận thức về Đảng” căn cứ theo danh sách của bộ phận công tác Đảng (1 điểm)\r\n- Có xem xét, giới thiệu đoàn viên công đoàn ưu tú đề nghị Chi bộ kết nạp Đảng (1 điểm)', 2, 'TC003'),
('CTTC016', '- Có tổ chức họp CĐBP (2 tháng/lần)\r\n- Có ghi chép đầy đủ nội dung các cuộc họp, sinh hoạt của BCH CĐBP, của tập thể CĐBP.\r\n- Cập nhật Sổ Tổ chức CĐBP đầy đủ đúng quy định.', 3, 'TC003'),
('CTTC017', 'Triển khai các chương trình sinh hoạt về: Bình đẳng giới; Dân số và sức khỏe sinh sản; Phòng chống bạo lực gia đình; Chương trình hành động vì trẻ em…', 2, 'TC004'),
('CTTC018', 'Giám sát, đảm bảo thực hiện đầy đủ các chế độ chính sách cho nữ CBVC-NLĐ.', 2, 'TC004'),
('CTTC019', '- Tổ chức, tham gia các hoạt động thiết thực, sinh hoạt tập thể, tuyên truyền về giới kỷ niệm ngày thành lập Hội LHPN.VN (20/10), ngày Quốc tế phụ nữ (8/3)\r\n- Nộp Báo cáo nhanh đúng hạn', 4, 'TC004'),
('CTTC020', '- Có phát động, đăng ký phong trào thi đua “Giỏi việc nước, đảm việc nhà”\r\n- Có tổ chức bình chọn danh hiệu thi đua “Giỏi việc nước, đảm việc nhà”', 2, 'TC004'),
('CTTC021', 'Tham gia đóng góp chương trình học bổng Nguyễn Đức Cảnh cấp CĐCS (trích trong đóng góp 1 ngày lương của CBVC-NLĐ trường ĐHSG).', 2, 'TC004'),
('CTTC022', 'Tham gia cùng CĐCS các hoạt động chăm lo cho con CBVC-NLĐ ngày Quốc tế thiếu nhi, Tết Trung thu, tham dự trại hè Thanh Đa, tham dự lễ trao học bổng Nguyễn Đức Cảnh và Khen thưởng Học sinh giỏi năm học 2020-2021 (ngày 00/00/2021).', 3, 'TC004'),
('CTTC023', 'Đảm bảo thực hiện nghiêm công tác thu, chi tài chính của CĐBP (hợp lý, công khai, minh bạch).', 2, 'TC005'),
('CTTC024', 'Thực hiện Sổ Quỹ tiền mặt CĐBP theo đúng quy định\r\nCó chứng từ đầy đủ, hợp pháp.', 2, 'TC005'),
('CTTC025', 'Có phân công nhân sự phụ trách công tác tài chính của CĐBP.', 1, 'TC005'),
('CTTC026', 'Nộp hồ sơ, sổ sách đầy đủ, đúng hạn phục vụ cho công tác giám sát, kiểm tra của CĐCS.', 2, 'TC006'),
('CTTC027', 'Có theo dõi, kiểm tra đoàn viên khi có dấu hiệu vi phạm Điều lệ, Nghị quyết, Chỉ thị và các quy định của Công đoàn.', 2, 'TC006'),
('CTTC028', 'Có theo dõi, giám sát, kiểm tra việc thực hiện Nghị quyết hội nghị CBVC của đơn vị.', 1, 'TC006'),
('CTTC029', 'Thực hiện chế độ thông tin báo cáo, báo cáo nhanh kịp thời theo quy định của CĐCS. Ứng dụng công nghệ thông tin trong công tác hành chính.', 2, 'TC007'),
('CTTC030', 'Nộp đầy đủ, đúng hạn hồ sơ thi đua khen thưởng:\r\n- Báo cáo tổng kết hoạt động CĐBP.\r\n- Danh sách danh hiệu thi đua khen thưởng.\r\n- Bảng chấm điểm CĐBP.', 3, 'TC007'),
('CTTC031', 'Tham gia các hoạt động của Công đoàn cấp trên; Đảng ủy Khối ĐH-CĐ:\r\n- Chương trình “Áo dài – Trao gởi yêu thương”\r\n- Hiến máu tình nguyện trong tình hình dịch Covid-19\r\n- Chương trình “75 nghìn sáng kiến, vượt khó, phát triển”\r\n- Hội thi “Bạn có biết”\r\n- Tham gia viết bài Sổ tay công đoàn LĐLĐ\r\n- Các hoạt động khác (Ghi tên hoạt động)', 9, 'TC008'),
('CTTC032', 'CĐBP đạt kết quả cao trong các hoạt động do CĐCS tổ chức, cụ thể:\r\n- Hội thao kỷ niệm ngày Nhà giáo Việt Nam (20/11)\r\n- Cuộc thi ảnh “Nét đẹp Áo dài – Đại học Sài Gòn”\r\n- Hội thao truyền thống Công đoàn chào mừng các ngày lễ lớn (30/4, 01/5, 19/5), Tháng Công nhân năm 2021.\r\n- Hội thi trực tuyến “Tìm hiểu pháp luật về bầu cử đại biểu Quốc hội và đại biểu Hội đồng nhân dân”', 2, 'TC008'),
('CTTC033', 'Hội thảo chuyên đề, công trình của CĐBP: Có tổ chức hội thảo khoa học, báo cáo chuyên đề trong các phong trào thi đua “Đổi mới, sáng tạo trong dạy và học”, “Dạy tốt – Học tốt”, các cuộc vận động “Dân chủ - Kỷ cương – Tình thương – Trách nhiệm”, \"Học tập và làm theo tư tưởng đạo đức, phong cách Hồ Chí Minh\", chuyên môn, nghiệp vụ,... hoặc thực hiện công trình.', 4, 'TC008');

-- --------------------------------------------------------

--
-- Table structure for table `chucnang`
--

CREATE TABLE `chucnang` (
  `Mã chức năng` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tên chức năng` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucnang`
--

INSERT INTO `chucnang` (`Mã chức năng`, `Tên chức năng`) VALUES
('CN001', 'Quản lý công đoàn bộ phận'),
('CN002', 'Quản lý đơn vị'),
('CN003', 'Quản lý ban chấp hành'),
('CN004', 'Quản lý thành viên BCH'),
('CN005', 'Quản lý tiêu chí chấm điểm'),
('CN006', 'Quản lý chi tiết tiêu chí chấm điểm'),
('CN007', 'Quản lý bảng chấm điểm mới nhất'),
('CN008', 'Quản lý tất cả bảng chấm điểm'),
('CN009', 'Quản lý chức năng chấm điểm'),
('CN010', 'Thông báo'),
('CN011', 'Quản lý ý kiến công đoàn'),
('CN012', 'Quản lý chức năng'),
('CN013', 'Quản lý quyền'),
('CN014', 'Quản lý tài khoản'),
('CN015', 'Giới thiệu');

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `Mã đơn vị` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tên đơn vị` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Địa chỉ` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Số điện thoại` int(11) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Mã CDBP` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`Mã đơn vị`, `Tên đơn vị`, `Địa chỉ`, `Số điện thoại`, `Email`, `Mã CDBP`) VALUES
('DV001', 'Đơn vị 1', '123 An Dương Vương, quận 5  ', 900900902, '1@gmail.com  ', 'CD002'),
('DV002', 'Đơn vị 2', '124 An Dương Vương, quận 5 ', 900900901, '2@gmail.com ', 'CD001'),
('DV003', 'Đơn vị 31', '125 An Dương Vương, quận 5       ', 900900900, '2@gmail.com       ', 'CD018'),
('DV004', '1', '1', 900900906, 'a@gmail.com', 'CD015');

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu`
--

CREATE TABLE `gioithieu` (
  `Mã giới thiệu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nội dung giới thiệu` text COLLATE utf8_unicode_ci NOT NULL,
  `Hình ảnh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Hiển thị` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gioithieu`
--

INSERT INTO `gioithieu` (`Mã giới thiệu`, `Nội dung giới thiệu`, `Hình ảnh`, `Hiển thị`) VALUES
('GT001', 'Vị trí - chức năng', './img/gioithieu1.jpg', 0),
('GT002', 'Nhiệm vụ chủ yếu', './img/gioithieu2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quyen_chucnang`
--

CREATE TABLE `quyen_chucnang` (
  `Mã quyền` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã chức năng` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyen_chucnang`
--

INSERT INTO `quyen_chucnang` (`Mã quyền`, `Mã chức năng`) VALUES
('AD', 'CN001'),
('AD', 'CN002'),
('AD', 'CN003'),
('AD', 'CN004'),
('AD', 'CN005'),
('AD', 'CN006'),
('AD', 'CN012'),
('AD', 'CN013'),
('AD', 'CN014'),
('CTCD', 'CN007'),
('CTCD', 'CN008'),
('CTCD', 'CN009'),
('CTCD', 'CN010'),
('CTCD', 'CN015'),
('TVBCH', 'CN007'),
('TVBCH', 'CN008'),
('TVBCH', 'CN010'),
('TVBCH', 'CN015');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Tên tài khoản` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Mật khẩu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Hoạt động` int(11) NOT NULL,
  `Mã quyền` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Tên tài khoản`, `Mật khẩu`, `Hoạt động`, `Mã quyền`) VALUES
('222', '232', 0, 'TVBCH'),
('Admin', '12345678', 0, 'AD'),
('CT001', '12345678  ', 0, 'CTCD'),
('CT002', '12345678 ', 0, 'CTCD'),
('CT003', '12345678  ', 0, 'CTCD'),
('CT004', '12345678  ', 0, 'CTCD'),
('CT005', '12345678  ', 0, 'CTCD'),
('TK001', '12345678          ', 0, 'CDBP'),
('TK002', '12345678  ', 0, 'CDBP'),
('TK003', '12345678', 0, 'CDBP'),
('TK004', '12345678', 0, 'CDBP'),
('TK005', '12345678  ', 0, 'CDBP'),
('TK006', '12345678', 0, 'CDBP'),
('TK007', '12345678', 0, 'CDBP'),
('TK008', '12345678', 0, 'CDBP'),
('TK009', '12345678', 0, 'CDBP'),
('TK010', '12345678', 0, 'CDBP'),
('TK011', '12345678', 0, 'CDBP'),
('TK012', '12345678', 0, 'CDBP'),
('TK013', '12345678', 0, 'CDBP'),
('TK014', '12345678', 0, 'CDBP'),
('TK015', '12345678', 0, 'CDBP'),
('TK016', '12345678', 0, 'CDBP'),
('TK017', '12345678', 0, 'CDBP'),
('TK018', '12345678', 0, 'CDBP'),
('TK019', '12345678', 0, 'CDBP'),
('TK020', '12345678', 0, 'CDBP'),
('TK021', '12345678', 0, 'CDBP'),
('TK022', '12345678', 0, 'CDBP'),
('TK023', '12345678', 0, 'CDBP'),
('TK024', '12345678', 0, 'CDBP'),
('TK025', '12345678', 0, 'CDBP'),
('TK026', '12345678', 0, 'CDBP'),
('TK027', '12345678', 0, 'CDBP'),
('TK028', '12345678', 0, 'CDBP'),
('TK029', '12345678', 0, 'CDBP'),
('TK030', '12345678', 0, 'CDBP'),
('TK031', '12345678', 0, 'CDBP'),
('TK032', '12345678', 0, 'CDBP'),
('TK033', '12345678', 0, 'CDBP'),
('TK034', '12345678', 0, 'CDBP'),
('TK035', '12345678', 0, 'CDBP'),
('TK036', '12345678', 0, 'CDBP'),
('TK037', '12345678', 0, 'CDBP'),
('TKBCH002', '12345678', 0, 'TVBCH'),
('TKBCH004', '12345678', 0, 'TVBCH'),
('TKBCH006', '12345678', 0, 'TVBCH'),
('TKBCH008', '12345678', 0, 'TVBCH'),
('TKBCH009', '12345678', 0, 'TVBCH'),
('TKBCH011', '12345678', 0, 'TVBCH'),
('TKBCH012', '12345678', 0, 'TVBCH');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvienbch`
--

CREATE TABLE `thanhvienbch` (
  `Mã thành viên BCH CDBP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tên thành viên BCH CDBP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Chức vụ` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Số điện thoại` int(11) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Mã ban chấp hành CDBP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Tên tài khoản` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvienbch`
--

INSERT INTO `thanhvienbch` (`Mã thành viên BCH CDBP`, `Tên thành viên BCH CDBP`, `Chức vụ`, `Số điện thoại`, `Email`, `Mã ban chấp hành CDBP`, `Tên tài khoản`) VALUES
('TVBCH001', 'Nguyễn Văn Nam', 'Chủ tịch', 900900900, 'nvnam@gmail.com', 'BCH001', 'CT001'),
('TVBCH002', 'Phạm Văn Hiếu', 'Phó chủ tịch', 900900901, 'pvhieu@gmail.com', 'BCH001', 'TKBCH002'),
('TVBCH003', 'Nguyễn Tín', 'Chủ tịch', 900900902, 'ntin@gmail.com', 'BCH002', 'CT002'),
('TVBCH004', 'Trần Công Tuấn', 'Phó chủ tịch', 900900903, 'tctuan@gmail.com', 'BCH002', 'TKBCH004'),
('TVBCH005', 'Nguyễn Ngọc Nghĩa', 'Chủ tịch', 900900904, 'nnnghia@gmail.com', 'BCH003', 'CT003'),
('TVBCH006', 'Lê Bích Tuyết', 'Phó chủ tịch', 900900905, 'tbtuyet@gmail.com', 'BCH003', 'TKBCH006'),
('TVBCH007', 'Trần Tấn Phát', 'Chủ tịch', 900900906, 'ttphat@gmail.com', 'BCH004', 'CT004'),
('TVBCH008', 'Nguyễn Thanh Ngân', 'Phó chủ tịch', 900900907, 'ntngan@gmail.com', 'BCH004', 'TKBCH008'),
('TVBCH009', 'Đặng Quốc Việt', 'Ủy viên', 900900908, 'dqviet@gmail.com', 'BCH004', 'TKBCH009'),
('TVBCH010', 'Lê Thị Diễm My', 'Chủ tịch', 900900909, 'ltdmy@gmail.com', 'BCH005', 'CT005'),
('TVBCH011', 'Phan Trung Khang', 'Phó chủ tịch', 900900910, 'ptkhang@gmail.com', 'BCH005', 'TKBCH011'),
('TVBCH012', 'Huỳnh Thế Duy', 'Ủy viên', 900900911, 'htduy@gmail.com', 'BCH005', 'TKBCH012');

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `Mã thông báo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nội dung thông báo` text COLLATE utf8_unicode_ci NOT NULL,
  `Ngày đăng` datetime NOT NULL,
  `Ngày thực hiện` datetime NOT NULL,
  `Ngày hết hạn` datetime NOT NULL,
  `Mã thành viên BCH CDBP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Hiển thị` tinyint(1) NOT NULL,
  `Phân loại` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`Mã thông báo`, `Nội dung thông báo`, `Ngày đăng`, `Ngày thực hiện`, `Ngày hết hạn`, `Mã thành viên BCH CDBP`, `Hiển thị`, `Phân loại`) VALUES
('TB001', 'CHẤM ĐIỂM CDBP', '2022-04-25 00:00:00', '2022-05-26 22:49:00', '2022-06-28 22:49:00', 'TVBCH010', 1, 'Chấm điểm'),
('TB002', 'Chấm điểm CDBP', '2022-04-28 14:39:10', '2022-04-25 00:00:00', '2022-05-04 10:00:00', 'TVBCH002', 0, 'Thông báo'),
('TB003', 'TB003', '2022-04-29 14:39:10', '2022-04-30 14:39:10', '2022-05-05 14:39:10', 'TVBCH002', 0, 'Thông báo'),
('TB004', 'TB004', '2022-04-29 14:39:10', '0000-00-00 00:00:00', '2022-05-04 14:39:10', 'TVBCH002', 1, 'Thông báo'),
('TB005', 'TB005', '2022-04-28 14:39:10', '2022-05-06 14:39:10', '2022-05-08 14:39:10', 'TVBCH002', 1, 'Thông báo'),
('TB006', 'TB006', '2022-04-28 14:39:10', '2022-05-09 14:39:10', '2022-05-12 14:39:10', 'TVBCH002', 1, 'Thông báo'),
('TB007', 'CHẤM ĐIỂM CDBP', '2022-05-04 15:29:03', '2022-05-04 20:28:00', '2022-05-10 20:28:00', 'TVBCH001', 1, 'Chấm điểm'),
('TB008', 'aaa', '2022-05-04 17:43:13', '2022-05-11 22:43:00', '2022-05-20 22:43:00', 'TVBCH001', 1, 'Thông báo'),
('TB009', '1', '2022-05-26 04:50:53', '2022-04-28 09:50:00', '2022-05-12 09:50:00', 'TVBCH001', 1, 'Thông báo'),
('TB010', 'a', '2022-05-27 13:48:45', '2022-05-27 13:48:45', '2022-05-27 13:48:45', 'TVBCH006', 1, 'thông báo'),
('TB011', 'CHẤM ĐIỂM CDBP', '2022-05-27 17:49:36', '2022-05-26 22:49:00', '2022-06-28 22:49:00', 'TVBCH001', 1, 'Chấm điểm'),
('TB012', 'CHẤM ĐIỂM CDBP', '2022-05-29 06:44:38', '2022-05-29 00:00:00', '2022-05-30 00:00:00', 'TVBCH001', 0, 'Chấm điểm');

-- --------------------------------------------------------

--
-- Table structure for table `tieuchichamdiem`
--

CREATE TABLE `tieuchichamdiem` (
  `Mã tiêu chí` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nội dung tiêu chí` text COLLATE utf8_unicode_ci NOT NULL,
  `Điểm chuẩn tiêu chí` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tieuchichamdiem`
--

INSERT INTO `tieuchichamdiem` (`Mã tiêu chí`, `Nội dung tiêu chí`, `Điểm chuẩn tiêu chí`) VALUES
('TC001', 'CÔNG TÁC CHÍNH SÁCH PHÁP LUẬT', 20),
('TC002', 'CÔNG TÁC TUYÊN GIÁO', 15),
('TC003', 'CÔNG TÁC TỔ CHỨC', 15),
('TC004', 'CÔNG TÁC NỮ CÔNG', 15),
('TC005', 'CÔNG TÁC TÀI CHÍNH', 5),
('TC006', 'CÔNG TÁC KIỂM TRA', 5),
('TC007', 'CÔNG TÁC HÀNH CHÍNH  - VĂN PHÒNG', 5),
('TC008', 'ĐIỂM THƯỞNG', 15),
('TC009', 'Ban thường vụ CĐCS (Điểm này do BTV chấm)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ykien`
--

CREATE TABLE `ykien` (
  `Mã ý kiến` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Mã bảng chấm điểm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nội dung ý kiến` text COLLATE utf8_unicode_ci NOT NULL,
  `Trạng thái` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangchamdiem`
--
ALTER TABLE `bangchamdiem`
  ADD PRIMARY KEY (`Mã bảng chấm điểm`),
  ADD KEY `bch_cdbp_FK` (`Mã CDBP`),
  ADD KEY `bcd_tvbch_FK` (`Mã BCH chấm`),
  ADD KEY `bcd_tvbchEdit_FK` (`Mã BCH chỉnh sửa`);

--
-- Indexes for table `bangchamdiem_chitiettieuchi`
--
ALTER TABLE `bangchamdiem_chitiettieuchi`
  ADD PRIMARY KEY (`Mã bảng chấm điểm`,`Mã chi tiết tiêu chí`),
  ADD KEY `bcd_cttc_FK` (`Mã chi tiết tiêu chí`);

--
-- Indexes for table `bangquyen`
--
ALTER TABLE `bangquyen`
  ADD PRIMARY KEY (`Mã quyền`);

--
-- Indexes for table `bch`
--
ALTER TABLE `bch`
  ADD PRIMARY KEY (`Mã ban chấp hành CDBP`),
  ADD UNIQUE KEY `Khóa` (`Khóa`);

--
-- Indexes for table `cdbp`
--
ALTER TABLE `cdbp`
  ADD PRIMARY KEY (`Mã CDBP`),
  ADD KEY `cdbp_tk_FK` (`Tên tài khoản`);

--
-- Indexes for table `chitietgioithieu`
--
ALTER TABLE `chitietgioithieu`
  ADD PRIMARY KEY (`Mã chi tiết giới thiệu`),
  ADD KEY `ctgt_gt_FK` (`Mã giới thiệu`);

--
-- Indexes for table `chitiettieuchichamdiem`
--
ALTER TABLE `chitiettieuchichamdiem`
  ADD PRIMARY KEY (`Mã chi tiết tiêu chí`),
  ADD KEY `tccd_tc_FK` (`Mã tiêu chí`);

--
-- Indexes for table `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`Mã chức năng`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`Mã đơn vị`);

--
-- Indexes for table `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`Mã giới thiệu`);

--
-- Indexes for table `quyen_chucnang`
--
ALTER TABLE `quyen_chucnang`
  ADD PRIMARY KEY (`Mã quyền`,`Mã chức năng`),
  ADD KEY `qcn_cn_FK` (`Mã chức năng`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Tên tài khoản`),
  ADD KEY `tk_bq_FK` (`Mã quyền`);

--
-- Indexes for table `thanhvienbch`
--
ALTER TABLE `thanhvienbch`
  ADD PRIMARY KEY (`Mã thành viên BCH CDBP`),
  ADD KEY `tvbch_bch_FK` (`Mã ban chấp hành CDBP`),
  ADD KEY `tvbch_tk_FK` (`Tên tài khoản`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`Mã thông báo`),
  ADD KEY `tb_tvbch_FK` (`Mã thành viên BCH CDBP`),
  ADD KEY `STT` (`Mã thông báo`);

--
-- Indexes for table `tieuchichamdiem`
--
ALTER TABLE `tieuchichamdiem`
  ADD PRIMARY KEY (`Mã tiêu chí`);

--
-- Indexes for table `ykien`
--
ALTER TABLE `ykien`
  ADD KEY `yk_bcd_FK` (`Mã bảng chấm điểm`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bangchamdiem`
--
ALTER TABLE `bangchamdiem`
  ADD CONSTRAINT `bch_cdbp_FK` FOREIGN KEY (`Mã CDBP`) REFERENCES `cdbp` (`Mã CDBP`);

--
-- Constraints for table `bangchamdiem_chitiettieuchi`
--
ALTER TABLE `bangchamdiem_chitiettieuchi`
  ADD CONSTRAINT `bcd_cttc_FK` FOREIGN KEY (`Mã chi tiết tiêu chí`) REFERENCES `chitiettieuchichamdiem` (`Mã chi tiết tiêu chí`),
  ADD CONSTRAINT `bcd_cttc_bcd_FK` FOREIGN KEY (`Mã bảng chấm điểm`) REFERENCES `bangchamdiem` (`Mã bảng chấm điểm`),
  ADD CONSTRAINT `bcdcttc_bcd_FK` FOREIGN KEY (`Mã bảng chấm điểm`) REFERENCES `bangchamdiem` (`Mã bảng chấm điểm`);

--
-- Constraints for table `cdbp`
--
ALTER TABLE `cdbp`
  ADD CONSTRAINT `cdbp_tk_FK` FOREIGN KEY (`Tên tài khoản`) REFERENCES `taikhoan` (`Tên tài khoản`) ON UPDATE CASCADE;

--
-- Constraints for table `chitietgioithieu`
--
ALTER TABLE `chitietgioithieu`
  ADD CONSTRAINT `ctgt_gt_FK` FOREIGN KEY (`Mã giới thiệu`) REFERENCES `gioithieu` (`Mã giới thiệu`);

--
-- Constraints for table `chitiettieuchichamdiem`
--
ALTER TABLE `chitiettieuchichamdiem`
  ADD CONSTRAINT `tccd_tc_FK` FOREIGN KEY (`Mã tiêu chí`) REFERENCES `tieuchichamdiem` (`Mã tiêu chí`);

--
-- Constraints for table `quyen_chucnang`
--
ALTER TABLE `quyen_chucnang`
  ADD CONSTRAINT `qcn_bq_FK` FOREIGN KEY (`Mã quyền`) REFERENCES `bangquyen` (`Mã quyền`),
  ADD CONSTRAINT `qcn_cn_FK` FOREIGN KEY (`Mã chức năng`) REFERENCES `chucnang` (`Mã chức năng`),
  ADD CONSTRAINT `qcn_q_FK` FOREIGN KEY (`Mã quyền`) REFERENCES `bangquyen` (`Mã quyền`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `tk_bq_FK` FOREIGN KEY (`Mã quyền`) REFERENCES `bangquyen` (`Mã quyền`);

--
-- Constraints for table `thanhvienbch`
--
ALTER TABLE `thanhvienbch`
  ADD CONSTRAINT `tvbch_bch_FK` FOREIGN KEY (`Mã ban chấp hành CDBP`) REFERENCES `bch` (`Mã ban chấp hành CDBP`),
  ADD CONSTRAINT `tvbch_tk_FK` FOREIGN KEY (`Tên tài khoản`) REFERENCES `taikhoan` (`Tên tài khoản`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `tb_tvbch_FK` FOREIGN KEY (`Mã thành viên BCH CDBP`) REFERENCES `thanhvienbch` (`Mã thành viên BCH CDBP`);

--
-- Constraints for table `ykien`
--
ALTER TABLE `ykien`
  ADD CONSTRAINT `yk_bcd_FK` FOREIGN KEY (`Mã bảng chấm điểm`) REFERENCES `bangchamdiem` (`Mã bảng chấm điểm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
