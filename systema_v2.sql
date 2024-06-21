-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4940
-- Generation Time: Jun 21, 2024 at 08:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systema_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessed`
--

CREATE TABLE `accessed` (
  `trangchu` int(11) NOT NULL,
  `trangcon` int(11) NOT NULL,
  `tt` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accessed`
--

INSERT INTO `accessed` (`trangchu`, `trangcon`, `tt`) VALUES
(1411, 1927, 193885500000);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img`, `title`, `text`) VALUES
(1, 'banner1-l.jpg', '', ''),
(2, 'banner2-l.jpg', '', ''),
(3, 'banner3-l.jpg', '', ''),
(4, 'scorn1.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `name`) VALUES
(1, 'AMD'),
(2, 'Nvida'),
(3, 'ASUS'),
(4, 'Gigabyte'),
(5, 'Intel'),
(6, 'MSI'),
(7, 'Corsair'),
(9, 'LG'),
(10, 'DELL'),
(11, 'Cooler Master'),
(12, 'seagate');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(2) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `loai` int(2) NOT NULL,
  `img` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `loai`, `img`) VALUES
(1, 'cpu', 4, ''),
(2, 'vga', 4, ''),
(3, 'main', 4, ''),
(4, 'ram', 4, ''),
(5, 'psu', 4, ''),
(6, 'hdd&sdd', 4, ''),
(7, 'monitor', 4, ''),
(8, 'AIO PC', 3, ''),
(9, 'fan', 4, ''),
(10, 'case', 4, ''),
(13, 'pc ráp sẵn', 3, ''),
(14, 'Laptop Workstation', 1, ''),
(15, 'Laptop Gaming', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_cmt` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `id_pd` int(7) NOT NULL,
  `id_user` int(7) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_cmt`, `noidung`, `id_pd`, `id_user`, `date`) VALUES
(1, 'vỏ rất chắc chắn, shop đóng gói cẩn thận, vận chuyển bằng xe hơi nên giao hàng rất nhanh', 31, 7, '2023-09-26'),
(2, 'Hơi đắt, nhưng hàng chất lượng. Shop giao nhanh', 31, 8, '2023-09-24'),
(3, 'hàng đẹp bắt mắt', 31, 11, '2023-09-26'),
(4, 'case đắt nhưng không có quà tặng :(', 31, 11, '2023-09-26'),
(5, 'hơi cồng kềnh', 31, 11, '2023-09-26'),
(8, 'ngon bổ rẻ', 6, 8, '2023-10-07'),
(9, 'quá xịn', 6, 9, '0000-00-00'),
(10, 'ngon bổ rẻ', 6, 8, '2023-10-07'),
(11, 'quá xịn', 6, 9, '2023-10-07'),
(12, 'hàng xịn vcl', 6, 18, '2023-10-07'),
(13, 'tôi phát điện cho cả nhà sài vẫn đủ, quá víp', 16, 24, '2023-11-24'),
(14, 'Vip vai l', 28, 11, '2023-11-28'),
(15, 'lỗ hổng bảo mật', 28, 11, '2023-11-28'),
(16, '<script>alert(\"vui lòng điển đầy đủ thông tin khách hàng!\");</script>', 28, 11, '2023-11-28'),
(17, 'ngon bổ rẻ', 5, 7, '2023-12-05'),
(18, 'chất lượng', 5, 7, '2023-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dc` varchar(255) NOT NULL,
  `dssp` text NOT NULL,
  `thanhtien` bigint(12) NOT NULL,
  `trangthai` varchar(20) NOT NULL,
  `created` date DEFAULT NULL,
  `submited` date DEFAULT NULL,
  `SHD` varchar(12) NOT NULL,
  `mgg` varchar(20) NOT NULL,
  `thanhtien2` bigint(12) NOT NULL,
  `pttt` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `name`, `sdt`, `email`, `dc`, `dssp`, `thanhtien`, `trangthai`, `created`, `submited`, `SHD`, `mgg`, `thanhtien2`, `pttt`) VALUES
(73, 'qưeqwe', 908888457, 'phuclhhps35520@fpt.edu.vn', '600 Lê Thúc Hoạch', '{\"dssp\":[{\"id\":18,\"name\":\"ADM R9 7950X3D\",\"img\":\"7950x3d.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU AMD\",\"price\":19000000,\"price_sale\":0,\"from_date\":null,\"to_date\":null,\"soluong\":\"2\",\"thanhtien\":38000000}],\"tong\":38000000}', 38000000, 'Chờ Xác Nhận', '2024-06-19', '0000-00-00', '888457225144', '', 0, 'VNBANK'),
(74, 'asd', 908888457, 'phuccuhp211@gmail.com', '214 QL22', '{\"dssp\":[{\"id\":5,\"name\":\"CORE I3 10100\",\"img\":\"i3.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU Intel\",\"price\":2500000,\"price_sale\":0,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":2500000},{\"id\":31,\"name\":\"COSMOS C700M Limited Edition\",\"img\":\"case2.webp\",\"detail\":\"u0110u00e2y lu00e0 case mu00e1y tu00ednh\",\"price\":25000000,\"price_sale\":0,\"from_date\":\"0000-00-00\",\"to_date\":\"0000-00-00\",\"soluong\":1,\"thanhtien\":25000000},{\"id\":2,\"name\":\"AMD R5 3600\",\"img\":\"r5.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU AMD\",\"price\":6000000,\"price_sale\":5750000,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":5750000}],\"tong\":33250000}', 33250000, 'Chờ Xác Nhận', '2024-06-19', '0000-00-00', '888457225654', '', 0, 'VNBANK'),
(75, 'asd', 908888457, 'phuclhhps35520@fpt.edu.vn', '214 QL22', '{\"dssp\":[{\"id\":5,\"name\":\"CORE I3 10100\",\"img\":\"i3.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU Intel\",\"price\":2500000,\"price_sale\":0,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":2500000},{\"id\":31,\"name\":\"COSMOS C700M Limited Edition\",\"img\":\"case2.webp\",\"detail\":\"u0110u00e2y lu00e0 case mu00e1y tu00ednh\",\"price\":25000000,\"price_sale\":0,\"from_date\":\"0000-00-00\",\"to_date\":\"0000-00-00\",\"soluong\":1,\"thanhtien\":25000000},{\"id\":2,\"name\":\"AMD R5 3600\",\"img\":\"r5.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU AMD\",\"price\":6000000,\"price_sale\":5750000,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":5750000}],\"tong\":33250000}', 33250000, 'Chờ Xác Nhận', '2024-06-19', '0000-00-00', '888457230653', '', 0, 'VNBANK'),
(76, 'asd', 908888457, 'phuclhhps35520@fpt.edu.vn', '214 QL22', '{\"dssp\":[{\"id\":5,\"name\":\"CORE I3 10100\",\"img\":\"i3.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU Intel\",\"price\":2500000,\"price_sale\":0,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":2500000},{\"id\":31,\"name\":\"COSMOS C700M Limited Edition\",\"img\":\"case2.webp\",\"detail\":\"u0110u00e2y lu00e0 case mu00e1y tu00ednh\",\"price\":25000000,\"price_sale\":0,\"from_date\":\"0000-00-00\",\"to_date\":\"0000-00-00\",\"soluong\":1,\"thanhtien\":25000000},{\"id\":2,\"name\":\"AMD R5 3600\",\"img\":\"r5.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU AMD\",\"price\":6000000,\"price_sale\":5750000,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":5750000}],\"tong\":33250000}', 33250000, 'Chờ Xác Nhận', '2024-06-19', '0000-00-00', '888457231443', '', 0, 'VNBANK'),
(77, 'qưeqwe', 908888457, 'phuclhhps35520@fpt.edu.vn', '214 QL22', '{\"dssp\":[{\"id\":5,\"name\":\"CORE I3 10100\",\"img\":\"i3.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU Intel\",\"price\":2500000,\"price_sale\":0,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":2500000},{\"id\":31,\"name\":\"COSMOS C700M Limited Edition\",\"img\":\"case2.webp\",\"detail\":\"u0110u00e2y lu00e0 case mu00e1y tu00ednh\",\"price\":25000000,\"price_sale\":0,\"from_date\":\"0000-00-00\",\"to_date\":\"0000-00-00\",\"soluong\":1,\"thanhtien\":25000000},{\"id\":2,\"name\":\"AMD R5 3600\",\"img\":\"r5.jpg\",\"detail\":\"u0110u00e2y lu00e0 CPU AMD\",\"price\":6000000,\"price_sale\":5750000,\"from_date\":null,\"to_date\":null,\"soluong\":1,\"thanhtien\":5750000}],\"tong\":33250000}', 33250000, 'Chờ Xác Nhận', '2024-06-19', '0000-00-00', '888457231549', '', 0, 'VNBANK');

-- --------------------------------------------------------

--
-- Table structure for table `phanloai`
--

CREATE TABLE `phanloai` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phanloai`
--

INSERT INTO `phanloai` (`id`, `name`) VALUES
(1, 'laptop'),
(2, 'linh kiện laptop'),
(3, 'máy tính bộ'),
(4, 'PC - linh kiện máy tính'),
(5, 'PC - phụ kiện máy tính');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(7) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mdetail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_cata` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `price_sale` int(10) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `viewed` int(10) NOT NULL DEFAULT 0,
  `hidden` int(11) NOT NULL,
  `saled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `detail`, `mdetail`, `id_type`, `id_cata`, `id_brand`, `price`, `price_sale`, `from_date`, `to_date`, `viewed`, `hidden`, `saled`) VALUES
(2, 'AMD R5 3600', 'r5.jpg', 'Đây là CPU AMD', '', 4, 1, 1, 6000000, 5750000, NULL, NULL, 25, 0, 0),
(3, 'AMD R7 3800', 'r7.jpg', 'Đây là CPU AMD', '', 4, 1, 1, 9000000, 0, NULL, NULL, 3, 0, 0),
(4, 'AMD R9 3900', 'r9.jpg', 'Đây là CPU AMD', '', 4, 1, 1, 15000000, 0, NULL, NULL, 5, 0, 0),
(5, 'CORE I3 10100', 'i3.jpg', 'Đây là CPU Intel', '', 4, 1, 5, 2500000, 0, NULL, NULL, 32, 0, 100),
(6, 'CORE I5 10400', 'i5.jpg', 'Đây là CPU Intel', '', 4, 1, 5, 4500000, 0, NULL, NULL, 2, 0, 0),
(7, 'CORE I7 10700', 'i7.jpg', 'Đây là CPU Intel', '', 4, 1, 5, 8000000, 0, NULL, NULL, 2, 0, 0),
(8, 'CORE I9 10900', 'i9.jpg', 'Đây là CPU Intel', '', 4, 1, 5, 14000000, 13500000, '0000-00-00', '0000-00-00', 0, 0, 0),
(9, 'AMD RX 6900XT', '6900.jpg', 'Đây là GPU AMD', '', 4, 2, 1, 25000000, 0, NULL, NULL, 2, 0, 0),
(10, 'AMD RX 7900XTX', '7900.jpg', 'Đây là GPU AMD', '', 4, 2, 1, 30000000, 0, NULL, NULL, 1, 0, 0),
(11, 'Nvidia RTX 3909TI', '3090.jpg', 'Đây là GPU Nvidia', '', 4, 2, 2, 34000000, 0, NULL, NULL, 1, 0, 0),
(12, 'Nvidia RTX 4090', '4090.jpg', 'Đây là GPU Nvidia', '', 4, 2, 2, 45000000, 0, NULL, NULL, 1, 0, 0),
(13, 'ASUS Z690 XE', 'z690.jpg', 'Đây là Mainboard', '', 4, 3, 3, 50000000, 0, NULL, NULL, 1, 0, 0),
(14, 'MSI X670E MEG', 'x670.jpg', 'Đây là Mainboard', '', 4, 3, 6, 40000000, 0, NULL, NULL, 0, 0, 1),
(15, 'CORSAIR AX 2KW', 'corsair.jpg', 'Đây là PSU', '', 4, 5, 7, 34000000, 0, NULL, NULL, 0, 0, 0),
(16, 'Nuclear Power Plant 10KW', 'nuclear.jpg', 'Đây là PSU', '', 4, 5, 7, 99000000, 0, NULL, NULL, 2, 0, 1),
(17, 'ADM R9 7950X', '7950.jpg', 'Đây là CPU AMD', '', 4, 1, 1, 14000000, 0, NULL, NULL, 0, 0, 0),
(18, 'ADM R9 7950X3D', '7950x3d.jpg', 'Đây là CPU AMD', '', 4, 1, 1, 19000000, 0, NULL, NULL, 0, 0, 0),
(19, 'Intel I9 13900K', '13900k.jpg', 'Đây là CPU Intel', '', 4, 1, 5, 15000000, 0, NULL, NULL, 1, 0, 0),
(20, 'Intel I9 13900KS', '13900ks.jpg', 'Đây là CPU Intel', '', 4, 1, 5, 18000000, 0, NULL, NULL, 0, 0, 0),
(21, 'AMD Threadripper Pro 5995WX ', '5995wx.webp', 'Đây là CPU AMD', '', 4, 1, 1, 165000000, 0, '0000-00-00', '0000-00-00', 1, 0, 1),
(22, 'Intel Xeon w9-3495X', '3495x.png', 'Đây là CPU Intel', '', 4, 1, 5, 150000000, 0, '0000-00-00', '0000-00-00', 0, 0, 0),
(23, 'Nvidia Quadro RTX 8000', 'qr8000.webp', 'Đây là GPU Nvidia', '', 4, 2, 2, 155000000, 0, '0000-00-00', '0000-00-00', 2, 0, 3),
(24, 'Nvidia Quadro RTX A6000', 'a6000.webp', 'Đây là GPU Nvidia', '', 4, 2, 2, 140000000, 0, '0000-00-00', '0000-00-00', 0, 0, 0),
(25, 'Nvidia Titan RTX', 'ttrtx.jpg', 'Đây là GPU Nvidia', '', 4, 2, 2, 81000000, 0, '0000-00-00', '0000-00-00', 0, 0, 0),
(26, 'CORSAIR Vengeance RGB 32GB DDR5-7200', 'ddr5.jpg', 'Đây là ram Corsair', '', 4, 4, 7, 13000000, 0, '0000-00-00', '0000-00-00', 1, 0, 0),
(27, 'CORSAIR Vengeance RGB 64GB DDR5-7200', 'ddr5.jpg', 'Đây là ram Corsair', '', 4, 4, 7, 17000000, 0, '0000-00-00', '0000-00-00', 0, 0, 4),
(28, 'LG UltraGear™ OLED 45” 45GR95QE-B', 'manhinh1.webp', 'Đây là màn hình', '', 4, 7, 9, 37500000, 0, '0000-00-00', '0000-00-00', 6, 0, 0),
(29, 'Alienware AW5520QF', 'manhinh2.jpg', 'Đây là màn hình', '', 4, 7, 10, 90000000, 0, '0000-00-00', '0000-00-00', 1, 0, 3),
(30, 'Corsair 1000D', 'case1.jpg', 'Đây là case máy tính', '', 4, 10, 7, 12200000, 0, '0000-00-00', '0000-00-00', 13, 0, 0),
(31, 'COSMOS C700M Limited Edition', 'case2.webp', 'Đây là case máy tính', '&lt;h2&gt;&lt;strong&gt;Đ&amp;aacute;nh gi&amp;aacute; chi tiết&amp;nbsp;case Cooler Master Cosmos C700M - 30th Anniversary Limited Edition&lt;/strong&gt;&lt;/h2&gt;\n&lt;p&gt;Những sản phẩm từ Cooler Master lu&amp;ocirc;n được người d&amp;ugrave;ng tin chọn, điều n&amp;agrave;y đến từ ng&amp;ocirc;n ngữ thiết kế bắt mắt v&amp;agrave; chất lượng ho&amp;agrave;n thiện cao cấp, đặc biệt ch&amp;iacute;nh về ph&amp;acirc;n kh&amp;uacute;c case m&amp;aacute;y t&amp;iacute;nh. Cosmos C700M vốn l&amp;agrave; model đ&amp;atilde; nhận được rất nhiều sự ch&amp;uacute; &amp;yacute; từ mọi người d&amp;ugrave;ng v&amp;agrave; nay, một phi&amp;ecirc;n bản đặc biệt m&amp;agrave; GEARVN sẽ mang tới cho c&amp;aacute;c bạn,&amp;nbsp;&lt;strong&gt;Cooler Master Cosmos C700M - 30th Anniversary Limited Edition&lt;/strong&gt;&amp;nbsp;!&lt;/p&gt;\n&lt;h3&gt;&lt;strong&gt;Thiết kế full nh&amp;ocirc;m bắt mắt&lt;/strong&gt;&lt;/h3&gt;\n&lt;p&gt;Giữ vững ngoại h&amp;igrave;nh hầm hố v&amp;agrave; ngầu l&amp;ograve;i của phi&amp;ecirc;n bản Cooler Master Cosmos C700M, phi&amp;ecirc;n bản giới hạn kỉ niệm 30 năm được t&amp;ocirc; th&amp;ecirc;m m&amp;agrave;u xanh v&amp;agrave;o thanh quai x&amp;aacute;ch ở tr&amp;ecirc;n v&amp;agrave; thanh dưới đ&amp;oacute;ng vai tr&amp;ograve; l&amp;agrave; ch&amp;acirc;n đế của&amp;nbsp;&lt;a href=&quot;https://gearvn.com/collections/case-thung-may-tinh&quot;&gt;case m&amp;aacute;y t&amp;iacute;nh&lt;/a&gt;&amp;nbsp;tạo n&amp;ecirc;n một phi&amp;ecirc;n bản t&amp;agrave;u vũ trụ sắc m&amp;agrave;u hơn. To&amp;agrave;n bộ những chi tiết tr&amp;ecirc;n Cooler Master Cosmos C700M - 30th Anniversary Limited Edition đều được l&amp;agrave;m từ nh&amp;ocirc;m đem đến sự cứng c&amp;aacute;p v&amp;agrave; bền bỉ, tạo điều kiện cho khả năng ph&amp;aacute;t t&amp;aacute;n nhiệt dễ d&amp;agrave;ng. Điểm nhấn của phi&amp;ecirc;n bản&amp;nbsp;&lt;a href=&quot;https://gearvn.com/collections/case-coolermaster&quot;&gt;case Cooler Master&lt;/a&gt;&amp;nbsp;sẽ đến từ huy hiệu kỉ niệm 30 năm d&amp;agrave;nh cho phi&amp;ecirc;n bản giới hạn n&amp;agrave;y.&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;https://file.hstatic.net/1000026716/file/rvn-case-cooler-master-cosmos-c700m-30th-anniversary-limited-edition-7_6d86608a0bae4281aaf3cf9efbea47c1_1024x1024.png&quot; alt=&quot;GEARVN - Case Cooler Master&amp;nbsp;Cosmos C700M - 30th Anniversary Limited Edition&quot;&gt;&lt;/p&gt;\n&lt;h3&gt;&lt;strong&gt;Kh&amp;ocirc;ng gian rộng r&amp;atilde;i d&amp;agrave;nh cho tản nhiệt&lt;/strong&gt;&lt;/h3&gt;\n&lt;p&gt;Case Cooler Master Cosmos C700M - 30th Anniversary Limited Edition cung cấp kh&amp;ocirc;ng gian đủ để bạn c&amp;oacute; thể lắp đặt l&amp;ecirc;n đến 9 chiếc&amp;nbsp;&lt;a href=&quot;https://gearvn.com/collections/fan-rgb-tan-nhiet-pc&quot;&gt;quạt tản nhiệt&lt;/a&gt;&amp;nbsp;với k&amp;iacute;ch thước 120/140mm kết hợp với đ&amp;oacute; l&amp;agrave; chiều rộng cho tản nhiệt CPU c&amp;oacute; chiều cao tối đa 198mm. V&amp;agrave; kh&amp;ocirc;ng thể thiếu l&amp;agrave; hệ thống&amp;nbsp;&lt;a href=&quot;https://gearvn.com/collections/tan-nhiet-nuoc-240mm&quot;&gt;tản nhiệt AIO&lt;/a&gt;, Cooler Master Cosmos C700M - 30th Anniversary Limited Edition hỗ trợ cho bạn lắp được radiator với k&amp;iacute;ch thước l&amp;ecirc;n đến 420mm. Từ đ&amp;oacute;, bạn c&amp;oacute; thể tạo n&amp;ecirc;n một&amp;nbsp;&lt;a href=&quot;https://gearvn.com/pages/pc-gvn&quot;&gt;d&amp;agrave;n PC&lt;/a&gt;&amp;nbsp;mạnh mẽ với hiệu năng b&amp;ugrave;ng nổ nhất c&amp;oacute; thể.&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;https://file.hstatic.net/1000026716/file/rvn-case-cooler-master-cosmos-c700m-30th-anniversary-limited-edition-8_2a83f67a221c492f86601f6e34f4aed2.png&quot; alt=&quot;GEARVN - Case Cooler Master&amp;nbsp;Cosmos C700M - 30th Anniversary Limited Edition&quot;&gt;&lt;/p&gt;\n&lt;h3&gt;&lt;strong&gt;Hệ thống I/O đa dạng&lt;/strong&gt;&lt;/h3&gt;\n&lt;p&gt;Bạn mong muốn một chiếc case với mặt trước trang bị nhiều cổng USB nhất, vậy th&amp;igrave; Cooler Master Cosmos C700M - 30th Anniversary Limited Edition sẽ mang đến cho bạn 4 cổng USB 3.0 Type-A ở ngay mặt trước, v&amp;igrave; vậy c&amp;oacute; thể dễ d&amp;agrave;ng kết nối với c&amp;aacute;c thiết bị ngoại vi như&amp;nbsp;&lt;a href=&quot;https://gearvn.com/pages/chuot-may-tinh&quot;&gt;chuột m&amp;aacute;y t&amp;iacute;nh&lt;/a&gt;,&amp;nbsp;&lt;a href=&quot;https://gearvn.com/pages/ban-phim-may-tinh&quot;&gt;b&amp;agrave;n ph&amp;iacute;m cơ&lt;/a&gt;&amp;nbsp;v&amp;agrave;&amp;nbsp;&lt;a href=&quot;https://gearvn.com/collections/tai-nghe-bluetooth-chinh-hang&quot;&gt;tai nghe kh&amp;ocirc;ng d&amp;acirc;y&lt;/a&gt;. Ngo&amp;agrave;i ra c&amp;ograve;n c&amp;oacute; cổng USB 3.1 Type-C để hỗ trợ bạn kết nối với c&amp;aacute;c thiết bị kh&amp;aacute;c hỗ trợ, combo jack audio 3.5mm kết nối cho những&amp;nbsp;&lt;a href=&quot;https://gearvn.com/collections/tai-nghe-tren-4-trieu&quot;&gt;tai nghe gaming&lt;/a&gt;&amp;nbsp;c&amp;oacute; d&amp;acirc;y.&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;https://file.hstatic.net/1000026716/file/rvn-case-cooler-master-cosmos-c700m-30th-anniversary-limited-edition-9_af6a3241f2ff440f983401e8700cd832.png&quot; alt=&quot;GEARVN - Case Cooler Master&amp;nbsp;Cosmos C700M - 30th Anniversary Limited Edition&quot;&gt;&lt;/p&gt;\n&lt;p&gt;Tr&amp;ecirc;n mặt trước của Cooler Master Cosmos C700M - 30th Anniversary Limited Edition được trang bị th&amp;ecirc;m những ph&amp;iacute;m, bao gồm n&amp;uacute;t nguồn, n&amp;uacute;t điều chỉnh tốc độ quạt v&amp;agrave; n&amp;uacute;t điều chỉnh đ&amp;egrave;n&amp;nbsp;&lt;a href=&quot;https://gearvn.com/collections/fan-led-trang-tri&quot;&gt;LED RGB&lt;/a&gt;.&lt;/p&gt;', 4, 10, 11, 25000000, 0, '0000-00-00', '0000-00-00', 154, 0, 1),
(40, 'Dell Precision 7710 (WS)', 'dell7710.jpg', 'Laptop Workstation Dell Pre 7710 i7/32/1Tb/M5000M', '{\"doan1\":\"&lt;p&gt;CPU: Intel Core I7-6920HQ&lt;/p&gt;&lt;p&gt;Ram: 2X16Gb LDDR4 3200Mhz&lt;/p&gt;&lt;p&gt;GPU: Nvidia Quadro M5000M 8Gb&lt;/p&gt;&lt;p&gt;SDD: 1Tb Nvme&lt;/p&gt;\",\"doan2\":\"&lt;p&gt;&lt;span class=&quot;Drop-Cap-Feature&quot;&gt;&lt;span class=&quot;dropcap&quot;&gt;D&lt;/span&gt;&lt;/span&gt;ell has always delivered excellent mobile workstations. For example, for the past two years, we have raved about the Dell Precision M3800. But that thin, lightweight system could be a bit underpowered when faced with more demanding engineering applications.&lt;/p&gt;&lt;p&gt;Enter its new big brother: the Dell Precision 7710. Billed as Dell&amp;rsquo;s most powerful mobile workstation ever, the 7710 is the logical replacement for the M6800. But where that older system had a squared-off design, the new Precision 7710 is rounded and sleek, belying the power within.&lt;/p&gt;&lt;p&gt;The redesigned chassis measures 16.42x11.08x1.36 in. and weighs 7.9 lbs. as tested. A large but thin 240-watt external power supply (7.8x3.8x1.0 in.) adds another 2.1 lbs., bringing the total weight to 10 lbs. While that&amp;rsquo;s still quite a load, it is nearly 4 lbs. lighter than the&amp;nbsp;&lt;a href=&quot;https://www.digitalengineering247.com/article/a-true-desktop-replacement/&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;Eurocom Sky X9W&lt;/a&gt;&amp;nbsp;we recently tested.&lt;/p&gt;&lt;p&gt;Raising the lid reveals a 17.3-in. wide view anti-glare backlit LED and a 103-key keyboard with separate numeric keypad. The base configuration comes with a 1920x1080 IPS (in-plane switching) display, but our evaluation unit had a gorgeous UHD IGZO (indium gallium zinc oxide) panel with a native 3840x2160 UHD resolution and a maximum brightness of 400 nits, adding $170. A 1280x720 webcam and microphone array, centered above the display, come standard. A non-backlit keyboard is also standard; the backlit version in our evaluation unit is a $35 option.&lt;/p&gt;&lt;p&gt;A round power button is located in the upper-right corner above the keyboard and a touchpad with three dedicated buttons is centered below the spacebar. There is also a blue pointing stick nestled between the G, H and B keys with its own three buttons directly below the spacebar. A fingerprint reader sits to the lower right and a contactless smartcard reader to the lower left of the keyboard. Battery status, hard drive activity and power status lights as well as the two stereo speakers are aligned along the front edge of the case.&lt;/p&gt;&lt;div class=&quot;sidebar-right&quot;&gt;&lt;p&gt;&lt;strong&gt;Dell Precision 7710&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Price: $3,890 as tested ($1,699 base price)&lt;/li&gt;&lt;li&gt;Size: 16.42x11.08x1.36 in. (WxDxH) notebook&lt;/li&gt;&lt;li&gt;Weight: 7.9 lbs. plus 2.1-pound power supply&lt;/li&gt;&lt;li&gt;CPU: 2.9GHz Intel Xeon E3-1535M v5 w/8MB Smart Cache&lt;/li&gt;&lt;li&gt;Memory: 32GB (64GB max)&lt;/li&gt;&lt;li&gt;Graphics: NVIDIA Quadro M5000M w/8GB GDDR5 memory&lt;/li&gt;&lt;li&gt;LCD: 17.3-in. UHD 3840x2160 wide view anti-glare backlit IGZO&lt;/li&gt;&lt;li&gt;Hard Disk: 512GB 7200rpm 2.5-in. HD&lt;/li&gt;&lt;li&gt;Floppy: None&lt;/li&gt;&lt;li&gt;Optical: None&lt;/li&gt;&lt;li&gt;Audio: Built-in speakers, headphone/microphone jack, built-in microphone array&lt;/li&gt;&lt;li&gt;Network: Intel Dual-Band Wireless-AC 8260 WiFi 4.1 plus Bluetooth, one RJ45 jack&lt;/li&gt;&lt;li&gt;Modem: None&lt;/li&gt;&lt;li&gt;Other: Four USB 3.0 with PowerShare, mini DisplayPort, HDMI, headphone/microphone combo jack, SmartCard reader, integrated 1MP webcam&lt;/li&gt;&lt;li&gt;Keyboard: Integrated 103-key full-size backlit keyboard with numeric keypad&lt;/li&gt;&lt;li&gt;Pointing device: Integrated touchpad with 3 buttons, pointing stick with 3 buttons, fingerprint reader&lt;/li&gt;&lt;/ul&gt;&lt;/div&gt;&lt;h3&gt;&lt;strong&gt;A New Generation&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Where the M6800 came with 4th generation Intel processors, the new Precision 7710 offers a choice of 6th generation CPUs. The base model has a 2.3GHz Intel Core i5 processor. Our evaluation unit had a 2.9GHz quad-core Intel Xeon E3-1535M v5 CPU. This Skylake chip features 14nm lithography, 8MB Smart Cache, a 45 watt thermal design power (TDP) rating, a maximum turbo speed of 3.8GHz and adds $529 to the price.&lt;/p&gt;&lt;p&gt;Although the CPU includes integrated Intel HD Graphics P530, Dell also offers five different video cards. An AMD FirePro W5170M is included in the base configuration, but our Precision 7710 came with a top-of-the-line NVIDIA Quadro M5000M with 8GB of dedicated GDDR5 memory. This 100-watt GPU (graphics processing unit) provides 1536 CUDA (compute unified device architecture) cores, a 256-bit interface, a bandwidth of 160GB per second, and adds $1,190 to the total cost.&lt;/p&gt;&lt;p&gt;There are also lots of memory options. The base configuration comes with 8GB of non-ECC memory, installed as a single DDR4-2133MHz DIMM (dual in-line memory module). Our evaluation unit came with 32GB of non-ECC memory, installed as four 8GB modules (adding $279). You can opt for up to 32GB of ECC memory or 64GB of non-ECC memory.&lt;/p&gt;&lt;p&gt;Storage options also abound. In addition to the 500GB 2.5-in. 7200rpm SATA drive offered in the base model, the Precision 7710 can accommodate an additional PCIe solid-state drive (SSD) or up to three PCIe SSDs in lieu of a 2.5-inch HD. Standard hard drives of up to 2TB are available as well as SSDs ranging from 256GB to 1TB. Our configuration included just the standard Samsung 500GB hard drive. With multiple drives, the system supports RAID 0, 1 and 5. As is becoming increasingly common, there is no optical drive; you will have to provide your own. Dell sells a slim USB DVD+/-RW drive for $50, but similar drives are available for as little as $25.&lt;/p&gt;&lt;p&gt;The Precision 7710 has a decent selection of ports arrayed around its exterior. The right side provides a Smart Card slot, a headphone/microphone combo jack, three USB 3.0 ports with PowerShare and a Kensington lock slot. The left side houses an HDMI port, a mini DisplayPort and another USB 3.0 PowerShare port. The rear panel sports only an RJ45 network port, the connection for the external power supply, and two large air vents.&lt;/p&gt;&lt;div class=&quot;photofull&quot;&gt;&lt;a href=&quot;https://www.digitalengineering247.com/article/wp-content/uploads/2016/03/Dell_3.jpg&quot;&gt;&lt;img class=&quot;size-full wp-image-29517&quot; src=&quot;https://www.digitalengineering247.com/article/wp-content/uploads/2016/03/Dell_3.jpg&quot; alt=&quot;Dell&quot; width=&quot;620&quot; height=&quot;354&quot;&gt;&lt;/a&gt;Internal access is easy &amp;mdash; just slide a latch to remove the battery cover. Image courtesy of David Cohn.&lt;/div&gt;&lt;p&gt;Dual-band Wi-Fi and Bluetooth come standard, but can be eliminated. Mobile broadband is available as an option. Although the base configuration comes with a six-cell 72Whr lithium ion battery with ExpressCharge, Dell included the longer-life 91Whr battery in our package, a $29 add-on. The company also sells a 91Whr long life cycle lithium polymer battery for $79. Changing batteries and 2.5-in. hard drives is simply a matter of sliding a latch to remove the battery cover. Accessing other components requires removing two screws to release the base cover. Thanks to the larger battery, our Precision 7710 ran for 5.5 hours &amp;mdash; very impressive for a mobile workstation.&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;Great Performance at an Attractive Price&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;In terms of performance, the Dell Precision 7710 proved to be everything you would expect from a 17.3-in. mobile workstation. On the SPECviewperf benchmark, which focuses on graphics, the 7710 scored near the top and beat all other systems equipped with processors designed for mobile systems rather than desktops.&lt;/p&gt;&lt;p&gt;We recently switched to the new SPEC SOLIDWORKS 2015 benchmark, and while this marks just the second time we are publishing results from this new test, we did go back and retest several other systems we recently reviewed. The Dell Precision 7710 performed quite well on this new test.&lt;/p&gt;&lt;div class=&quot;photofull&quot;&gt;&lt;a href=&quot;https://www.digitalengineering247.com/article/wp-content/uploads/2016/03/Dell_2.jpg&quot;&gt;&lt;img class=&quot;size-full wp-image-29516&quot; src=&quot;https://www.digitalengineering247.com/article/wp-content/uploads/2016/03/Dell_2.jpg&quot; alt=&quot;Dell&quot; width=&quot;620&quot; height=&quot;218&quot;&gt;&lt;/a&gt;Top: The Dell Precision 7710 plus its 240-watt power supply weighs a total of 10 lbs. Image courtesy of David Cohn.&lt;/div&gt;&lt;p&gt;On the SPECwpc benchmark, the Dell Precision 7710 turned in great results on this very demanding test. Only the Autodesk rendering results, which averaged 85.6 seconds, lagged the field. On this multi-threaded test, systems with faster CPUs and more CPU cores have a definite edge.&lt;/p&gt;&lt;p&gt;Throughout our tests, the Dell Precision 7710 ran cool and quiet, barely ever becoming audible over the ambient noise in our test lab. Users can choose to have Windows 7, 8.1 or 10 preloaded. Our system came with Windows 10 Professional 64-bit. Dell backs the system with a three-year hardware service warranty with onsite/in-home service after remote diagnosis. That coverage can be extended to up to five years and augmented with extended battery service for years two and three of the system life, and accidental damage protection. Dell also sells several docking stations/port replicators, with a Thunderbolt Dock not yet released as of this writing.&lt;/p&gt;&lt;p&gt;As configured, our Dell Precision 7710 currently sells for $3,980 &amp;mdash; a competitive price compared to similarly equipped systems. All things considered, the Dell Precision 7710 is a winner and a great choice of any engineer on the go, offering an appealing combination of style, performance and extended battery life at a price that won&amp;rsquo;t break the bank.&lt;/p&gt;\"}', 1, 14, 10, 10000000, 0, '0000-00-00', '0000-00-00', 8, 0, 0);
INSERT INTO `product` (`id`, `name`, `img`, `detail`, `mdetail`, `id_type`, `id_cata`, `id_brand`, `price`, `price_sale`, `from_date`, `to_date`, `viewed`, `hidden`, `saled`) VALUES
(41, 'Dell Precision 7730 (WS)', 'dell7730.png', 'Laptop Workstation Dell Pre 7730 i9/32/1Tb/P5200', '{\"doan1\":\"&lt;p&gt;CPU: Intel Core I9-8950HK&lt;/p&gt;&lt;p&gt;Ram: 2X16Gb LDDR4 3200Mhz&lt;/p&gt;&lt;p&gt;GPU: Nvidia Quadro P5200 16Gb&lt;/p&gt;&lt;p&gt;SSD: 2Tb Nvme&lt;/p&gt;\",\"doan2\":\"&lt;p&gt;If you need the most powerful laptop around, regardless of price or size, look no further than the Precision 7730. This workstation has blazing-fast performance and an alluring&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/4k-resolution&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/4k-resolution&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;6596032675316643257&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;4K&quot;&gt;4K&lt;/a&gt;&amp;nbsp;display that bursts with color. Factor in a comfortable keyboard, premium design and rugged build quality, and this beastly machine hits (almost) all the right notes.&lt;/p&gt;&lt;div id=&quot;ad-unit-1&quot; class=&quot;ad-unit&quot;&gt;&lt;/div&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/2QYgMTuoQsgtzdBvvySCD3.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;Unfortunately, disappointing battery life and poor heat management are notable pain points. And the Precision 7730&#039;s high, $5,534 price isn&#039;t for everyone. But if you&#039;re an engineer or creative who needs a powerful workstation, take the plunge; you won&#039;t regret emptying your pockets for a Precision 7730.&amp;nbsp;We even confidently placed it on&amp;nbsp;our&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/best-workstation-laptops&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/best-workstation-laptops&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/best-workstation-laptops&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;5620527578549346646&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;best workstations&quot;&gt;best workstations&lt;/a&gt;&amp;nbsp;and&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/best-4k-laptops&quot; data-analytics-id=&quot;inline-link&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/articles/best-4k-laptops&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;1128370588065260275&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;best 4K laptops&quot;&gt;best 4K laptops&lt;/a&gt;&amp;nbsp;pages.&lt;/p&gt;&lt;aside class=&quot;hawk-nest hawk-processed&quot; data-render-type=&quot;fte&quot; data-skip=&quot;dealsy&quot; data-widget-type=&quot;seasonal&quot; data-widget-id=&quot;7c9d4b14-6386-451a-b3ef-df925262ba6c&quot; data-result=&quot;missing&quot;&gt;&lt;div class=&quot;hawk-master-widget-hawk-main-wrapper&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/aside&gt;&lt;p&gt;&lt;strong&gt;Design&lt;/strong&gt;&lt;/p&gt;&lt;div id=&quot;mobile-in-article&quot; class=&quot;in-article ad-unit&quot;&gt;&lt;div id=&quot;mobile-taboola-mid-article&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;p&gt;Do your wrists a favor and use both arms when lifting the&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/dell&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/dell&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;1129959480500202322&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Dell&quot;&gt;Dell&lt;/a&gt;&amp;nbsp;Precision 7730. Better yet, if you have a good chiropractor, carry this system around in a backpack. At 7.5 pounds, the laptop weighs more than the&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/reviews/laptops/hp-zbook-17-g4&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/reviews/laptops/hp-zbook-17-g4&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/reviews/laptops/hp-zbook-17-g4&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1355032830273365427&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;HP ZBook 17 G4&quot;&gt;HP ZBook 17 G4&lt;/a&gt;&amp;nbsp;(7.1 pounds), but it&#039;s lighter than the sumo-size&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/reviews/laptops/lenovo-thinkpad-p71&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/reviews/laptops/lenovo-thinkpad-p71&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/reviews/laptops/lenovo-thinkpad-p71&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1287248512859862326&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;ThinkPad P71&quot;&gt;ThinkPad P71&lt;/a&gt;&amp;nbsp;(8 pounds).&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/9WE89KEo5akpMVEtYeaTj6.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;While the Dell machine is slimmer than its predecessor, the Precision 7730&#039;s 16.3 x 10.8 x 1.2-inch frame is best kept dormant on a desk. Its competitor, the&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/reviews/laptops/lenovo-thinkpad-p71&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/reviews/laptops/lenovo-thinkpad-p71&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/reviews/laptops/lenovo-thinkpad-p71&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;3486806886683452364&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Lenovo ThinkPad P71&quot;&gt;Lenovo ThinkPad P71&lt;/a&gt;, is about the same size (16.4 x 10.4 x 1.2 inches), while the&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/reviews/laptops/hp-zbook-17-g4&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/reviews/laptops/hp-zbook-17-g4&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/reviews/laptops/hp-zbook-17-g4&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1355032830273365427&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;HP ZBook 17 G4&quot;&gt;HP ZBook 17 G4&lt;/a&gt;&amp;nbsp;is longer on each end (16.5 x 11 x 1.3 inches).&lt;/p&gt;&lt;div id=&quot;ad-unit-2&quot; class=&quot;ad-unit&quot;&gt;&lt;/div&gt;&lt;figure&gt;&lt;blockquote&gt;&lt;p&gt;With premium, durable materials -- a carbon-fiber lid, a soft-touch deck and a metal frame -- the Precision 7730 exudes class.&lt;/p&gt;&lt;/blockquote&gt;&lt;/figure&gt;&lt;p&gt;With premium, durable&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.tomsguide.com/us/gadget-materials-guide,news-22743.html&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.tomsguide.com/us/gadget-materials-guide,news-22743.html&quot; data-hl-processed=&quot;none&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;6032787355595111616&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;materials&quot;&gt;materials&lt;/a&gt;&amp;nbsp;-- a carbon-fiber lid, a soft-touch deck and a metal frame -- the Precision 7730 exudes class. People will notice the machine for its sheer size, but its industrial black-and-silver design is easy on the eyes.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/UKuiXbnkYgmZsykgsdosDo.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;Aggressive dual vents, a shiny metal trim around the deck and a thin LED battery indicator on the front lip are all welcome additions. I just wish the lid weren&#039;t such a fingerprint magnet and that the display bezels were trimmed down.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Ports&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730 has a comprehensive selection of&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/port-and-adapter-guide&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/port-and-adapter-guide&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/port-and-adapter-guide&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1268937990690871882&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;ports&quot;&gt;ports&lt;/a&gt;&amp;nbsp;that are conveniently located around the laptop.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/xEFJhCJKzDgRMbPjd8yCD6.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;On the left side, you&#039;ll find a smart card reader, an SD card slot and two&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/best-usb-type-c-accessories-cables&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/best-usb-type-c-accessories-cables&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/best-usb-type-c-accessories-cables&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1263259916760204396&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Thunderbolt 3 ports&quot;&gt;Thunderbolt 3 ports&lt;/a&gt;.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/mbt9LNFHa3DjdXedCT7zYK.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;The right side is primed for peripherals, with&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/laptop-ports-you-need&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/laptop-ports-you-need&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/laptop-ports-you-need&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;7854733435198526103&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;two USB 3.1 Type-A ports&quot;&gt;two USB 3.1 Type-A ports&lt;/a&gt;&amp;nbsp;as well as a&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/laptop-lock-guide&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/laptop-lock-guide&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/laptop-lock-guide&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;4129062423064324808&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Kensington lock&quot;&gt;Kensington lock&lt;/a&gt;&amp;nbsp;and headphone/mic combo jack.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/FGaJfrzpFeCawHAiwmVs5j.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;For stationary accessories, the rear houses an HDMI, a mini DisplayPort, an Ethernet port, a DC power jack and a third USB 3.1 Type-A port.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Durability and Security&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Don&#039;t worry about your arms giving out when you hold the Precision 7730; this tank can survive a fall. The business laptop passed 15&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/rugged-notebooks-explained-how-tough-is-tough-enough&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/rugged-notebooks-explained-how-tough-is-tough-enough&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/rugged-notebooks-explained-how-tough-is-tough-enough&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;5276769467911976707&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;MIL-SPEC durability tests&quot;&gt;MIL-SPEC durability tests&lt;/a&gt;, including those for high altitudes, extreme temperatures, dirt, shock and drop, according to Dell.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/babXVjSwXE64RoiH8sjuHH.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;The Precision 7730 also has safeguards to protect your sensitive data. You have the option to add a FIPS fingerprint sensor in the palm rest to go along with a standard smart-card reader and an NFC sensor for contactless smart cards. &amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Display&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730&#039;s 17-inch&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/laptop-screen-guide&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/laptop-screen-guide&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/laptop-screen-guide&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1677769953000947665&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;display&quot;&gt;display&lt;/a&gt;&amp;nbsp;gives you a theater-like viewing experience. Its bright&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/best-4k-laptops&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/best-4k-laptops&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/best-4k-laptops&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1330142305142327938&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;4K panel&quot;&gt;4K panel&lt;/a&gt;&amp;nbsp;is incredibly detailed, and the colors it produces are exceptionally vivid and rich.&lt;/p&gt;&lt;p&gt;When I watched a trailer for the upcoming autobiographical film&amp;nbsp;&lt;em&gt;Green Book&lt;/em&gt;, I could make out the tiniest details in the set design, like individual records in Mahershala Ali&#039;s house during a wide shot of his chic living room and wisps of smoke rising from Viggo Mortensen&#039;s cigarette. The turquoise paint on the pianist&#039;s Chevy popped, as if the car had just driven off the show floor.&lt;/p&gt;&lt;figure&gt;&lt;blockquote&gt;&lt;p&gt;The Precision 7730&#039;s 17-inch display gives you a theater-like viewing experience.&lt;/p&gt;&lt;/blockquote&gt;&lt;/figure&gt;&lt;p&gt;Similarly, in the trailer for the upcoming sci-fi film&amp;nbsp;&lt;em&gt;Kin&lt;/em&gt;, the neon lights and colorful explosions burst with rich, saturated blues and oranges. Matte displays don&#039;t typically have the same wow factor as their glossy counterparts, but I was in awe every time I visited my favorite websites on the Precision. My main complaint with the display is that skin tones look oversaturated, but you can adjust the color temperature using Dell&#039;s included display-calibration software.&lt;/p&gt;&lt;p&gt;The display&#039;s outstanding qualities were quantified in our testing. The panel reproduced a staggering 211 percent of the sRGB color gamut, achieving among the highest ratings we&#039;ve seen. While the Lenovo&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/thinkpad&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/thinkpad&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;3043614864650300861&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;ThinkPad&quot;&gt;ThinkPad&lt;/a&gt;&amp;nbsp;P71 (183 percent) and&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/hp-zbook&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/hp-zbook&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;9501003254171442799&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;HP ZBook&quot;&gt;HP ZBook&lt;/a&gt;&amp;nbsp;17 G4 (173 percent) also impressed, their panels were nowhere near as colorful as the Precision&#039;s. The workstation average is much lower, at 149 percent.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;MORE:&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/best-picks/best-dell-laptops&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/best-picks/best-dell-laptops&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-redirect=&quot;/best-dell-laptops&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/best-picks/best-dell-laptops&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1160555334710344775&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Best Dell and Alienware Laptops - Laptop Mag&quot;&gt;Best Dell and Alienware Laptops - Laptop Mag&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;With this machine&#039;s matte display and impressive peak brightness, you should have no issue using the Precision 7730 in bright environments. The display reached a maximum brightness of 330 nits, which is higher than scores from the ThinkPad P71 (283 nits) and HP ZBook 17 G4 (256 nits). The workstation average is also dimmer, at 325 nits. &amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Keyboard, Touchpad and Pointing Stick&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;With an actuation force of 69 grams and a key travel of 1.6 millimeters (1.5mm to 2mm is recommended), the chiclet-style keyboard with numpad is comfortable to use, even during long typing sessions. Weighty and tactile, the backlit keys offer a rewarding amount of feedback and are well-spaced.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/AFhRQtukPhtUZwjAgxEsJP.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;In the 10fastfingers.com typing test, I reached 114 words per minute, with an error rate of 5 percent. That matches my 95 percent accuracy rate but is slightly slower than my 119 word-per-minute average, likely because of the key&#039;s above-average actuation force. &amp;nbsp;&lt;/p&gt;&lt;p&gt;For a device this large, the Precision 7730&#039;s 3.9 x 2.1-inch touchpad is inexplicably small. Fortunately, it made up for its size by responding quickly to my gestures, including pinch-to-zoom, four-finger tapping to open settings and three-finger swiping to change apps.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;MORE:&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.tomsguide.com/us/best-gaming-keyboards,review-2009.html&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.tomsguide.com/us/best-gaming-keyboards,review-2009.html&quot; data-hl-processed=&quot;none&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1389184587191375683&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Our Favorite Gaming Keyboards&quot;&gt;Our Favorite Gaming Keyboards&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;If touchpads aren&#039;t your thing, you can use the little rubber nub in the center of the Precision 7730&#039;s keyboard. That is, if you can find it. The black pointing stick doesn&#039;t have a colorful ring around it, so it blends in with the dark deck. Still, I had no problems using the pointing stick and secondary set of left-, right- and middle-click buttons to navigate the web.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Performance&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730 is a performance powerhouse. Equipped with an&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/intel-core&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/intel-core&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;1032688503304685530&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Intel Core&quot;&gt;Intel Core&lt;/a&gt;&amp;nbsp;i9-8950HK CPU and 32GB of RAM, the Precision 7730 quickly loaded 30&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/edge-browser-guide&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/edge-browser-guide&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/edge-browser-guide&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;4657996511494869964&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Microsoft Edge&quot;&gt;Microsoft Edge&lt;/a&gt;&amp;nbsp;tabs, four of which played&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.tomsguide.com/us/youtube-premium-worth-it,news-24081.html&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.tomsguide.com/us/youtube-premium-worth-it,news-24081.html&quot; data-hl-processed=&quot;none&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;6892516002428691781&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;YouTube&quot;&gt;YouTube&lt;/a&gt;&amp;nbsp;videos while two others streamed&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.tomsguide.com/us/fortnite-battle-royale-faq,news-25928.html&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.tomsguide.com/us/fortnite-battle-royale-faq,news-25928.html&quot; data-hl-processed=&quot;none&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1584104100994712003&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Fornite&quot;&gt;Fornite&lt;/a&gt;&amp;nbsp;on&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/stream-twitch-laptop&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/stream-twitch-laptop&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/stream-twitch-laptop&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;6905878971241094752&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Twitch&quot;&gt;Twitch&lt;/a&gt;.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/qoFhmWcFzoACkG9RNTuqka.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;With that demanding workload running in the background, the workstation opened the Xbox and 3D Paint&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/microsoft-windows&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/microsoft-windows&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;1435008616706017231&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Windows&quot;&gt;Windows&lt;/a&gt;&amp;nbsp;apps without breaking a sweat. Impressive, yes, but not surprising considering the Precision 7730 is meant to run the most-demanding tasks, like video encoding and 3D rendering.&lt;/p&gt;&lt;figure&gt;&lt;blockquote&gt;&lt;p&gt;The Precision 7730 is a performance powerhouse.&lt;/p&gt;&lt;/blockquote&gt;&lt;/figure&gt;&lt;p&gt;It took the Precision 7730 only 1 minute and 19 seconds to complete our&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/microsoft-excel&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/microsoft-excel&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;1328156706126000792&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Excel&quot;&gt;Excel&lt;/a&gt;&amp;nbsp;Spreadsheet Test, which involves matching 65,000 names to their corresponding addresses. The workstation average is a few seconds slower, at 1:21.&lt;/p&gt;&lt;p&gt;This laptop scored an excellent 23,130 on the Geekbench 4 overall performance test. That is significantly higher than the scores from the Lenovo ThinkPad P71 (15,972) and HP ZBook 17 G4 (15,839), and the workstation average (15,252).&lt;/p&gt;&lt;p&gt;The Precision also boasts very fast storage. In our File Transfer Test, the workstation&#039;s two&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/ssds-are-worth-it&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/ssds-are-worth-it&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/ssds-are-worth-it&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;7417621179687946747&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;512GB M.2 PCIe SSD&quot;&gt;512GB M.2 PCIe SSD&lt;/a&gt;s duplicated 4.97GB of mixed-media files in 9 seconds, for a rate of 565 megabytes per second. That&#039;s quicker than the Lenovo ThinkPad P71&#039;s rate (463 MBps) and the workstation average (505.6 MBps), but it falls short of the mark from the blisteringly fast dual-SSDs in the HP ZBook 17 G4 (848 MBps).&lt;/p&gt;&lt;p&gt;&lt;strong&gt;MORE:&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/benchmarks/cpu-performance&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/benchmarks/cpu-performance&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-redirect=&quot;/benchmarks/overall-performance&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/benchmarks/cpu-performance&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1373331968411828093&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Laptops with the Best Productivity Performance&quot;&gt;Laptops with the Best Productivity Performance&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;When we made the Precision 7730 transcode a video from 4K to 1080p using the HandBrake app, the laptop finished in just 8 minutes and 59 seconds, which is nearly twice as fast as the workstation average (17:44).&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Graphics&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Nvidia Quadro P5200 GPU with 16GB of GDDR5 memory is powerful enough to run the most graphics-intensive programs or the latest games at high settings. With this GPU, the Precision 7730 scored a 3,953 on the 3DMark Fire Strike Ultra synthetic graphics test, beating the Lenovo ThinkPad P71 (3,588), HP ZBook 17 G4 (3,643) and the workstation average (1,490).&lt;/p&gt;&lt;figure&gt;&lt;blockquote&gt;&lt;p&gt;The Nvidia Quadro P5200 GPU with 16GB of GDDR5 memory is powerful enough to run the most graphics-intensive programs or the latest games at high settings.&lt;/p&gt;&lt;/blockquote&gt;&lt;/figure&gt;&lt;p&gt;The Precision 7730 played the racing game Dirt 3 at 223 frames per second, so drifting around hairpin turns should feel butter smooth. The Nvidia Quadro P5000-equipped HP ZBook 17 G4 ran the same title at 171 fps.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Audio&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The bottom-firing speakers on the Precision 7730 are loud enough to fill a large-size room, but they don&#039;t sound good doing it. When I listened to the vocally driven song &quot;Grace Beneath the Pines,&quot; Glen Hansard&#039;s powerful vocals were front and center, but the Irishman sounded muffled and the solemn piano chords that provide a pulse to this emotional tune were empty and hollow.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;MORE:&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/benchmarks/cpu-performance&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/benchmarks/cpu-performance&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-redirect=&quot;/benchmarks/overall-performance&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/benchmarks/cpu-performance&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1367831336322345465&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Laptops with the Best Overall Performance&quot;&gt;Laptops with the Best Overall Performance&lt;/a&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;I had similar impressions when listening to John Mayer&#039;s up-paced single &quot;New Light.&quot; Mayer&#039;s silky-smooth vocals sounded accurate enough, but drum hits lacked weight and this funky tune&#039;s instruments were all over the place.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Battery Life&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730 doesn&#039;t last long on a charge, even with the optional 97Wh battery. The machine powered down after just 4 hours and 14 minutes on the&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/all-day-strong-longest-lasting-notebooks&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/all-day-strong-longest-lasting-notebooks&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/all-day-strong-longest-lasting-notebooks&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;3245520894173263290&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Laptop Battery Test&quot;&gt;Laptop Battery Test&lt;/a&gt;, which involves continuous web surfing over Wi-Fi at 150 nits of brightness. The Lenovo ThinkPad P71 (5:57) and HP ZBook 17 G4 (5:23) endured for more than an hour longer, and even they fall short of the workstation run-time average (6:49).&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Webcam&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730&#039;s webcam is OK. The 720p lens captures a decent amount of detail, but it&#039;s not very bright, and the colors it produces look unnatural. In a selfie I snapped in our dimly lit office, the red hues in my face looked oversaturated, and the shirt I was wearing was so dark that I couldn&#039;t make out its pattern of white dots.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Heat&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730 failed to stay cool after we played a 15-minute HD video on YouTube. While the touchpad maintained a comfortable 83 degrees Fahrenheit, the underside (108 degrees) and the keyboard center (96 degrees) warmed up to above our 95-degree comfort threshold. The vent on the underside reached a troubling 110 degrees.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Software and Warranty&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730&#039;s&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/how-to-use-windows-10&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/how-to-use-windows-10&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/how-to-use-windows-10&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;2505582239189975940&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Windows 10 Pro&quot;&gt;Windows 10 Pro&lt;/a&gt;&amp;nbsp;operating system doesn&#039;t come with a lot of preinstalled software. What&#039;s included is pretty useful, like Dell Power Manager, which tracks the health of your battery, and PremiereColor, which lets you adjust display color, brightness and white balance.&lt;/p&gt;&lt;p&gt;In total, 10 Dell-branded apps provide general warranty and tech support and help you optimize the workstation&#039;s performance. One notable program is the Dell Precision Optimizer, which uses&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/uk/tag/artificial-intelligence&quot; data-analytics-id=&quot;inline-link&quot; data-auto-tag-linker=&quot;true&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/uk/tag/artificial-intelligence&quot; data-component-tracked=&quot;1&quot; data-hl-processed=&quot;none&quot; data-custom-tracking-id=&quot;7872543929947833158&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;AI&quot;&gt;AI&lt;/a&gt;&amp;nbsp;to auto-optimize applications. &amp;nbsp;&lt;/p&gt;&lt;p&gt;The&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.tomsguide.com/us/bloatware-to-remove,news-21271.html&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.tomsguide.com/us/bloatware-to-remove,news-21271.html&quot; data-hl-processed=&quot;none&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;9234094080034076970&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;bloatware&quot;&gt;bloatware&lt;/a&gt;&amp;nbsp;Microsoft typically brings to Windows 10 is mostly absent on the Precision 7730. A few apps remain, like Microsoft Solitaire Collection and&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/articles/4-tips-to-keep-your-privacy-on-linkedin&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/articles/4-tips-to-keep-your-privacy-on-linkedin&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/articles/4-tips-to-keep-your-privacy-on-linkedin&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;5880190610117484697&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;LinkedIn&quot;&gt;LinkedIn&lt;/a&gt;, but Candy Crush games are nowhere to be found.&lt;/p&gt;&lt;p&gt;The Dell Precision ships with a three-year warranty, upgradable to five years with on-site repair services. See how Dell performed on our&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/news/tech-support-showdown&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/news/tech-support-showdown&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-redirect=&quot;/articles/tech-support-showdown&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/news/tech-support-showdown&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;9019830802266149555&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Tech Support Showdown&quot;&gt;Tech Support Showdown&lt;/a&gt;&amp;nbsp;and&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/features/laptop-brand-ratings&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/features/laptop-brand-ratings&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-redirect=&quot;/articles/laptop-brand-ratings&quot; data-before-rewrite-localise=&quot;https://www.laptopmag.com/features/laptop-brand-ratings&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;3585988052448897597&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Best and Worst Brands&quot;&gt;Best and Worst Brands&lt;/a&gt;&amp;nbsp;rankings.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Configurations&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Dell Precision 7730 starts at $1,479 for the base model, which comes with a 1600 x 900 display, an Intel Core i5-8300H CPU, integrated Intel HD GFX graphics, 8GB of RAM, and a 500GB and 7,200-rpm HDD.&lt;/p&gt;&lt;figure class=&quot;van-image-figure pull-&quot; data-bordeaux-image-check=&quot;&quot;&gt;&lt;div class=&quot;image-full-width-wrapper&quot;&gt;&lt;div class=&quot;image-widthsetter&quot;&gt;&lt;p class=&quot;vanilla-image-block&quot;&gt;&lt;picture&gt;&lt;source srcset=&quot;https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-320-80.jpg.webp 320w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-480-80.jpg.webp 480w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-650-80.jpg.webp 650w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-970-80.jpg.webp 970w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-1024-80.jpg.webp 1024w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-1200-80.jpg.webp 1200w&quot; type=&quot;image/webp&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot;&gt;&lt;/picture&gt;&lt;/p&gt;&lt;figure class=&quot;expandable-image&quot;&gt;&lt;img class=&quot;pull- expandable&quot; src=&quot;https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-320-80.jpg&quot; sizes=&quot;(min-width: 1000px) 970px, calc(100vw - 40px)&quot; srcset=&quot;https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-320-80.jpg 320w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-480-80.jpg 480w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-650-80.jpg 650w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-970-80.jpg 970w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-1024-80.jpg 1024w, https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN-1200-80.jpg 1200w&quot; loading=&quot;lazy&quot; data-original-mos=&quot;https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN.jpg&quot; data-pin-media=&quot;https://cdn.mos.cms.futurecdn.net/unQa8KAJHycJ8eHWHTTYQN.jpg&quot;&gt;&lt;div class=&quot;expand icon icon-expand-image&quot;&gt;&amp;nbsp;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/figure&gt;&lt;p&gt;Our $5,534 review unit has a 4K display and ramps up the components to an Intel Core i9-8950HK CPU, an Nvidia Quadro P5200 GPU, 32GB of memory and dual 512GB PCIe NVMe SSDs.&lt;/p&gt;&lt;p&gt;A top-of-the-line Precision 7730 has the same 4K display and P5200 GPU but upgrades you to an Intel Core Xeon E-2186M CPU, 128GB of RAM and 8TB of SSD storage. This model costs $10,928 without any add-ons.&lt;/p&gt;&lt;p&gt;There are endless configuration options to customize the Precision 7730 to your liking. Dell offers i5, i7 and Xeon CPUs; Radeon Pro and Nvidia Quadro GPUs; four 32GB RAM slots for up to 128GB; and up to four 2TB SSDs for up to 8TB. You can also change RAID configurations, upgrade to a backlit keyboard, boost the battery from 64Wh to 97Wh and opt for a fingerprint reader.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Bottom Line&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Precision 7730 is an excellent workstation, with class-leading performance and a bright, vivid 4K display. A comfortable keyboard, premium design and capable GPU are icing on the cake. I just wish the laptop&#039;s battery life lasted a few hours longer and that the chassis didn&#039;t get uncomfortably warm under a heavy workload. &amp;nbsp;&lt;/p&gt;&lt;p&gt;The Precision 7730 faces tough competition. The $6,059&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/reviews/laptops/hp-zbook-17-g4&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/reviews/laptops/hp-zbook-17-g4&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/reviews/laptops/hp-zbook-17-g4&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;1355032830273365427&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;HP ZBook 17 G4&quot;&gt;HP ZBook 17 G4&lt;/a&gt;&amp;nbsp;also has a gorgeous display and super-fast performance, but it remained cool during our testing and has considerably longer battery life. On the other hand, the HP workstation&#039;s display is rather dim and it has a bland design. The $4,643&amp;nbsp;&lt;a class=&quot;hawk-link-parsed&quot; href=&quot;https://www.laptopmag.com/reviews/laptops/lenovo-thinkpad-p71&quot; data-analytics-id=&quot;inline-link&quot; data-url=&quot;https://www.laptopmag.com/reviews/laptops/lenovo-thinkpad-p71&quot; data-hl-processed=&quot;none&quot; data-before-rewrite-localise=&quot;/reviews/laptops/lenovo-thinkpad-p71&quot; data-component-tracked=&quot;1&quot; data-custom-tracking-id=&quot;3486806886683452364&quot; data-hawk-tracked=&quot;hawklinks&quot; data-google-interstitial=&quot;false&quot; data-label=&quot;Lenovo ThinkPad P71&quot;&gt;Lenovo ThinkPad P71&lt;/a&gt;&amp;nbsp;is another compelling workstation; it comes with a color-correcting 4K panel and fantastic keyboard. However, the P71&#039;s hard drive can&#039;t keep pace with the Precision 7730&#039;s.&lt;/p&gt;&lt;p&gt;Overall, the Precision 7730 is an excellent all-around workstation that I wholeheartedly recommend -- if you can afford it.&lt;/p&gt;\"}', 1, 14, 10, 20000000, 0, '0000-00-00', '0000-00-00', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `turn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `idsp`, `stars`, `turn`) VALUES
(1, 1, 9, 2),
(2, 31, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `poster` text NOT NULL,
  `ebd_img` text NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_cata` int(11) NOT NULL,
  `ido` int(11) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `poster`, `ebd_img`, `id_type`, `id_cata`, `ido`, `ref`, `ord`) VALUES
(1, 'Khuyến Mãi Tết', 'bg2.webp', 'bg1.webp', 0, 0, 1, 'price_sale', 3),
(3, 'Sản Phẩm Hot', '', 'bg3.webp', 0, 0, 2, 'viewed', 2),
(4, 'Mặt Hàng Bán Chạy', '', 'bg3.jpg', 0, 0, 3, 'saled', 2),
(5, 'CPU Giá Rẻ', '', 'bg2.jpg', 0, 1, 4, 'price', 1);

-- --------------------------------------------------------

--
-- Table structure for table `turnrt`
--

CREATE TABLE `turnrt` (
  `id` int(11) NOT NULL,
  `idus` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `turnrt`
--

INSERT INTO `turnrt` (`id`, `idus`, `idsp`, `stars`) VALUES
(1, 7, 1, 4),
(2, 7, 31, 5),
(3, 8, 1, 5),
(4, 8, 31, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(7) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ho` varchar(20) NOT NULL,
  `ten` varchar(6) NOT NULL DEFAULT 'User',
  `sdt` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `role` tinyint(1) NOT NULL,
  `avt` varchar(70) NOT NULL,
  `ban` int(11) DEFAULT NULL,
  `storage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `ho`, `ten`, `sdt`, `email`, `diachi`, `role`, `avt`, `ban`, `storage`) VALUES
(1, 'Admin_1', '4297f44b13955235245b2497399d7a93', '', 'User', '', '', '', 0, '', 1, ''),
(2, 'Admin_2', 'b51e8dbebd4ba8a8f342190a4b9f08d7', '', '', '', '', '', 0, '', 1, ''),
(3, 'Admin_3', '21b95a0f90138767b0fd324e6be3457b', '', '', '', '', '', 0, '', 2, ''),
(7, 'nguoidungso1', 'a772f15eb3feb8c64d166ca89ca6df09', 'da', 'ki', '0123456789', 'phuclhhps35520@fpt.edu.vn', '560 Trần Quốc Toản', 1, '', 1, ''),
(8, 'nguoidungso2', '4297f44b13955235245b2497399d7a93', 'day la', 'user 2', '', '', '', 1, '', 1, ''),
(9, 'nguoidungso3', '5772c009478a517d7b29e10a9fa94152', '', 'User', '0246813579', 'nds3@yahoo.com', '510 Lũy Bán Bích', 1, '', 2, ''),
(11, 'nguoidungso4', '4297f44b13955235245b2497399d7a93', '', 'User', '', '', '', 1, '', 2, ''),
(14, 'nguoidungso5', '4297f44b13955235245b2497399d7a93', '', 'User', '', '', '', 1, '', 2, ''),
(18, 'nguoidungso6', '4297f44b13955235245b2497399d7a93', '', 'User', '', '', '', 1, '', 2, ''),
(19, 'phuccuhp211', '5772c009478a517d7b29e10a9fa94152', 'lưu', 'phúc', '0935222871', 'phuccuhp211@gmail.com', '214 QL 22', 1, '', 1, ''),
(20, 'Admin_4', '5772c009478a517d7b29e10a9fa94152', '', '', '0123456789', 'nds1@yahoo.com', '', 0, '', 2, ''),
(21, 'x79x99', 'fae0b27c451c728867a567e8c1bb4e53', 'x79', 'x99', '0666666666', 'qwe@qwe.com', '666 dia nguc', 0, '', 1, ''),
(23, 'asdasd123', '4297f44b13955235245b2497399d7a93', 'lưu', 'bánh m', '0121231231', 'phuclhhps35520@fpt.edu.vn', '214 QL 22', 1, '', 1, ''),
(24, 'qweqwe', 'a8f5f167f44f4964e6c998dee827110c', 'fgh', 'vbn', '0987654321', 'phuclhhps35520@fpt.edu.vn', '666 Địa Ngục', 1, '', 1, ''),
(25, 'thaytho', '4297f44b13955235245b2497399d7a93', 'thay', 'tho', '0123123123', 'phuclhhps35520@fpt.edu.vn', '214 QL 22', 1, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `max` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `f_date` date DEFAULT NULL,
  `t_date` date DEFAULT NULL,
  `percent` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `name`, `max`, `remaining`, `f_date`, `t_date`, `percent`) VALUES
(1, 'KHAITRUONG2024', 2024, 2018, '2023-12-01', '2023-12-30', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessed`
--
ALTER TABLE `accessed`
  ADD UNIQUE KEY `trangchu` (`trangchu`),
  ADD UNIQUE KEY `trangcon` (`trangcon`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai` (`loai`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_pd` (`id_pd`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcata` (`id_cata`,`id_brand`),
  ADD KEY `id_cata` (`id_cata`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnrt`
--
ALTER TABLE `turnrt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_cmt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turnrt`
--
ALTER TABLE `turnrt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`loai`) REFERENCES `phanloai` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_pd`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_cata`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
