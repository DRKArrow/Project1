-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2018 lúc 07:36 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbproject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbladmin`
--

CREATE TABLE `tbladmin` (
  `maad` int(11) NOT NULL,
  `tenad` varchar(100) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbladmin`
--

INSERT INTO `tbladmin` (`maad`, `tenad`, `ngaysinh`, `diachi`, `gioitinh`, `sdt`, `email`, `matk`) VALUES
(1, 'Dũng Zin', '1998-06-15', 'Hanoi', 1, '01632406674', 'dungbkc08@gmail.com', 1),
(2, 'Việt', '1998-01-10', 'Hanoi', 1, '1231320', 'vietsida@gmail.com', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldanhmuc`
--

CREATE TABLE `tbldanhmuc` (
  `madm` varchar(10) CHARACTER SET latin1 NOT NULL,
  `loai` varchar(20) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbldanhmuc`
--

INSERT INTO `tbldanhmuc` (`madm`, `loai`) VALUES
('BRC', 'Bracelet'),
('G', 'Glasses'),
('H', 'Hat'),
('NCK', 'Necklace'),
('P', 'Pants'),
('PER', 'Perfume'),
('PS', 'Shorts'),
('PSK', 'Skirt'),
('R', 'Ring'),
('S', 'Shirts'),
('SB', 'Blazer'),
('SC', 'Coat'),
('SHOB', 'Boots'),
('SHOD', 'Derbies'),
('SHOS', 'Sneakers'),
('SJ', 'Jacket'),
('SS', 'Sweater'),
('ST', 'T-Shirt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldonhang`
--

CREATE TABLE `tbldonhang` (
  `madh` int(11) NOT NULL,
  `makh` int(11) DEFAULT NULL,
  `ngaydathang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbldonhang`
--

INSERT INTO `tbldonhang` (`madh`, `makh`, `ngaydathang`) VALUES
(1, 1, '2018-01-03'),
(2, 1, '2018-01-03'),
(3, 1, '2018-01-06'),
(4, 2, '2018-01-08'),
(5, 18, '2018-01-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblgiaohang`
--

CREATE TABLE `tblgiaohang` (
  `madh` int(11) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `yeucau` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblgiaohang`
--

INSERT INTO `tblgiaohang` (`madh`, `sdt`, `diachi`, `yeucau`) VALUES
(1, '015647984', 'Trần Duy Hưng', 'Gốc cây số 10'),
(2, '0123456789', 'Hà Nội', 'Giao hàng ở tầng 2'),
(3, '1233366454', 'hanoi', ''),
(4, '017848572', 'Hanoi', 'Giao hàng 2h'),
(5, '0123456711', 'Hà Nội', 'Ship về nhà ăn A15 vào lúc 14h');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblgioithieunsx`
--

CREATE TABLE `tblgioithieunsx` (
  `mansx` varchar(10) DEFAULT NULL,
  `gioithieu` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblgioithieunsx`
--

INSERT INTO `tblgioithieunsx` (`mansx`, `gioithieu`) VALUES
('CD', 'CHRISTIAN DADA được thành lập ở Tokyo vào năm 2010 bởi Masanori Morikawa. Tên thương hiệu là sự kết hợp từ Parisian Haute Couture và Dadaism (một phong trào văn hóa nghệ thuật bắt đầu từ Zürich, Thụy Sĩ, trong thời kì thế chiến I)\r\nCốt lõi của thiết kế Christian Dada, cũng là nền tảng của triết lý thẩm mỹ Wabi-sabi của Nhật Bản - tập trung vào việc chấp nhận tính phù du và sự không hoàn hảo . Masanori Morikawa được học hỏi và đào tạo bởi Charles Anastase tại London, đã tạo ra một cách tiếp cận độc đáo cho thời trang . Tầm nhìn phức tạp, tối tăm và tràn đầy sức sống của anh ấy, ông thu hút sự chú ý của các nền văn hoá phương Đông và các nghề thủ công Nhật Bản truyền thống như kỹ thuật nhuộm tay \"Yuzen\" được sử dụng cho lụa làm kimonos.\r\nÔng đã cân bằng kéo léo những thứ có ảnh hưởng mạnh mẽ và mang tính thương mại trong streetwear. Bộ sưu tập của ông được nâng cao bởi những chi tiết phức tạp và những trang trí tinh xảo, tạo ra một sự đụng độ tinh tế của những nghệ thuật quá khứ và những phong trào của giới trẻ.'),
('RO', 'Thành lập từ năm 1994, lần đầu tiên ra mắt trước thế giới tại Paris Fashion Week 2003 và tới bây giờ, Rick Owens đã trở thành biểu tượng mới cho sự đột phá và cách tân của thời trang đương đại. Mỗi bộ sưu tập được trình diễn hàng năm khiến cả thế giới trầm trồ vì vẻ đẹp và những câu chuyện đầy cảm hứng đằng sau. Sử dụng chủ yếu những gam màu cơ bản, các thiết kế của Rick Owens chú trọng vào chất liệu và đường nét trên từng sợi vải, để mỗi bộ đồ mặc lên sẽ toát ra một phong cách khác biệt, từ sang trọng, uyển chuyển đến cả phóng khoáng, bụi bặm.'),
('VLA', '\"VLADES\" là thương hiệu đến từ Seoul sáng lập bởi nhà thiết kế trẻ Mooyeol Choi, hiện đang là một trong những tên tuổi lớn tại Hàn\r\n  Quốc và luôn góp mặt ở các show trình diễn Seoul Fashion Week. Phong cách của hãng tập trung vào sự khác biệt trong các chi tiết\r\n  và khí chất toát lên từ các thiết kế, tạo nên bộ trang phục hoàn hảo cho người mặc và trờ thành \"bộ giáp\" của chính họ tách biệt với\r\n  ​thời trang đại chúng.'),
('LF', 'Lấy cảm hứng bắt nguồn từ văn hoá phục hưng hàng thế kỉ trước, thương hiệu Lost&Found đến từ nước Ý luôn chú trọng vào sự thô mộc trên bộ trang phục của mình. Từ các chất vải cơ bản được xử lý thủ công đến những đường may, đường cắt không cân xứng mang dụng ý của nhà thiết kế Ria Dunn, tạo nên vẻ đẹp gần gũi, nhã nhặn, tách biệt khỏi các thương hiệu thời trang cao cấp khác để khẳng định phong cách thời trang thủ công xa xưa \"đã từng mất và được tìm lại\"'),
('SOS', 'Shades of Silence được sáng lập bởi nhà thiết kế Hiko đến từ Hongkong. Phong cách chủ đạo của hãng hướng đến thời trang tối\r\n giản mang âm hưởng của thời trang thế kỉ 18 và có thể sử dụng lâu dài. Hiko chú trọng sử dụng chất liệu vải thô và các đường\r\n cắt may đơn nhất bởi chính tay các nghệ nhân Hongkong, tạo nên vẻ đẹp nguyên thủy trong bộ trang phục, để nói lên cá tính của\r\n người mặc theo thời gian thấm nhuần vào từng mảnh vải.'),
('GD', '\r\n\r\n    Vào năm 1896 - Guido Guidi, Giovanni Rosellini và Gino Ulivo đã thành lập ra “ Conceria Guidi Rosellini” tại Pescia, Tuscany nước Ý. Nơi đây, như một cái nôi của nghệ thuật thuộc da được bắt nguồn từ thời trung lưu, tồn tại từ thế kỷ XIV. \r\n    Ruggero Guidi hoạt động trong lĩnh vực thuộc da và ông đã dành thời gian để tìm kiếm sự cân bằng hoàn hảo giữa công nghệ tiên tiến và sự tôn trọng về di sản truyền thống cùng kỹ năng của mình. Với tài năng của mình “ Conceria Guidi Rosellini” đã nổi tiếng trên toàn thế giới và được sự tín nghiệm từ những nhà thiết kế mong muốn được sử dụng những dòng da đặc biệt và những phương pháp bảo quản chăm sóc da từ Guidi và ông luôn luôn đáp ứng được chính xác những gì mà khách hàng của mình mong muốn.\r\n    Niềm đam mê chất liệu da và sự tôn trọng dành cho truyền thống là sự kết hợp ý nghĩa dành cho những bộ sưu tập giày của Guidi. Những trào lưu, quá trình sản xuất hàng loạt không phải sự tập trung của Guidi, CEO Guidi đã tập trung vào quá trình nghiên cứu để đúc kết những gì tinh hoa nhất. Guidi’s shoes sinh ra để dành cho những tín đồ của sự độc đáo, hòa quyện với truyền thống, những đôi giày được đúc kết bởi những thợ thủ công lành nghề cùng với da chất liệu da tuyệt vời . Guidi mong muốn đem đến cho những khách hàng không chỉ coi một sản phẩm đơn thuần mà như một sự liên kết tồn tại giữa những sản phẩm và người sở hữu.\r\n'),
('OW', 'Nhà thiết kế người Mỹ, DJ - Virgil Abloh đã trở nên nổi bật như là giám đốc sáng tạo của Kanye West. Anh ấy đã tạo ra làn sóng trong thế giới thời trang với nhãn hiệu thời trang cao cấp của mình, Off-White.\r\nKhi Off-White / Virgil Abloh ra mắt vào cuối năm 2013, Abloh đã nhanh chóng trở nên quen thuộc với các tín đồ thời trang đường phố. Các hình ảnh và biểu tượng bắt mắt đã tạo nên điểm nhấn mạnh đối với những người yêu thích nó.'),
('J7', 'Thương hiệu Julius_7 từ lâu đã trở thành một biểu tượng đi đầu cho phong cách avant-garde tại Nhật Bản và khắp thế giới. Dưới bàn tay của nhà thiết kế Tatsuro Horikawa, từng bộ sưu tập của Julius_7 luôn mang vẻ đẹp đầy ma mị, đậm bản sắc từ các nền văn hoá thần bí, như câu chuyện cổ xưa bước ra thế giới thực tại. ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblhoadonchitiet`
--

CREATE TABLE `tblhoadonchitiet` (
  `madh` int(11) DEFAULT NULL,
  `masp` varchar(30) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblhoadonchitiet`
--

INSERT INTO `tblhoadonchitiet` (`madh`, `masp`, `soluong`) VALUES
(1, 'KBR-001-G', 1),
(1, 'GD-001-SHOB', 3),
(2, 'VLA-002-SJ', 4),
(2, 'CD-005-SS', 1),
(3, 'SOS-001-PSK', 6),
(3, 'GD-002-SHOB', 1),
(4, 'VLA-002-SJ', 1),
(5, 'RO-003-SB', 1),
(5, 'RO-002-SHOS', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblkhachhang`
--

CREATE TABLE `tblkhachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(100) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `sdt` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblkhachhang`
--

INSERT INTO `tblkhachhang` (`makh`, `tenkh`, `ngaysinh`, `diachi`, `gioitinh`, `sdt`, `email`, `matk`) VALUES
(1, 'Chi Khoai', '1998-12-12', 'hanoi', 0, '0123456789', 'chikhoai@gmail.com', 3),
(2, 'Quỳnh Hoa', '1998-02-03', 'Hanoi', 0, '017848572', 'quynhhoa@gmail.com', 4),
(18, 'Nguyễn Trường Sơn', '0000-00-00', 'Quảng Bình', 1, '0123456712', 'truongson@gmail.com', 5),
(19, 'Kiều Trang', '1998-11-26', 'Hà Nội', 1, '01564565454', 'kieutrang@gmail.com', 6),
(20, 'Trần Hồng', '2001-05-25', 'Hà Nội', 0, '01663243154', 'tranhong@gmail.com', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnsx`
--

CREATE TABLE `tblnsx` (
  `mansx` varchar(10) NOT NULL,
  `tennsx` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblnsx`
--

INSERT INTO `tblnsx` (`mansx`, `tennsx`) VALUES
('CD', 'Christian Dada'),
('DSRO', 'DRKSHDW by Rick Owens'),
('GD', 'Guidi'),
('J7', 'Julius-7'),
('KBR', 'Kuboraum'),
('LF', 'Lost&Found'),
('OBS', 'OBSCUR'),
('OW', 'Off-White'),
('RO', 'Rick Owens'),
('SFTM', 'Song for The Mute'),
('SOS', 'Shades Of Silence'),
('VLA', 'Vlades'),
('Y3', 'Y-3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblphanquyen`
--

CREATE TABLE `tblphanquyen` (
  `mapq` int(11) NOT NULL,
  `tenpq` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblphanquyen`
--

INSERT INTO `tblphanquyen` (`mapq`, `tenpq`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsanpham`
--

CREATE TABLE `tblsanpham` (
  `masp` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tensp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `anh` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tinhtrang` int(11) DEFAULT NULL,
  `mota` varchar(100) DEFAULT NULL,
  `motachitiet` text,
  `mansx` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `madm` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblsanpham`
--

INSERT INTO `tblsanpham` (`masp`, `tensp`, `gia`, `anh`, `tinhtrang`, `mota`, `motachitiet`, `mansx`, `madm`) VALUES
('CD-001-P', 'SUPER SKINNY SIGNATURE KNEE DAMAGED TROUSER', 9360000, 'Images/hanghoa/CD-001-P.jpg', 1, NULL, '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 95%Cotton, 5%Polyurethane\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'P'),
('CD-002-P', 'KNEE DAMAGED SIGNATURE SKINNY JEAN', 10400000, 'Images/hanghoa/CD-002-P.jpg', 1, '', '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 98%Cotton, 2%Polyurethane\r\n\r\n- Màu : Indigo\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'P'),
('CD-003-S', 'DISTORTION SILK COTTON TURTLENECK SHIRT', 9750000, 'Images/hanghoa/CD-003-S.jpg', 1, '', '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 80%Cotton, 20%Silk\r\n\r\n- Màu : trắng\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'ST'),
('CD-004-S', 'STRIPED COTTON TURLTE NECK SHIRT', 9750000, 'Images/hanghoa/CD-004-S.jpg', 1, '', '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 59%Cotton, 41%Polyeste\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'ST'),
('CD-005-SS', '\"TFTLTYTD\" EMBROIDERY TURTLE NECK KNIT', 10750000, 'Images/hanghoa/CD-005-SS.jpg', 1, '', '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 100%Wool\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'SS'),
('CD-006-S', '\"TFTLTYTD\" EMBROIDERY STRIPED COTTON SHIRT', 10400000, 'Images/hanghoa/CD-006-S.jpg', 1, '', '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 59%Cotton, 41%POLYESTE\r\n\r\n- Màu : Xanh-Trắng\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'S'),
('CD-008-SS', 'SIGNATURE BOMBER SWEATER SHIRT', 8750000, 'Images/hanghoa/CD-008-SS.jpg', 1, '', '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 100%Cotton\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'SS'),
('CD-009-ST', '\"NO POSTING\" COTTON PRINT T-SHIRT', 3700000, 'Images/hanghoa/CD-009-ST.jpg', 2, '', '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 100%Cotton\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'ST'),
('DSRO-001-P', 'PANTALONI DENIM- DETROIT CUT- BLACK MATTE', 9700000, 'Images/hanghoa/DSRO-001-P.jpg', 2, '', '', 'DSRO', 'P'),
('DSRO-002-SJ', 'MOUNTAIN HOODIE BLACK', 15750000, 'Images/hanghoa/DSRO-002-SJ.jpg', 1, '', '', 'DSRO', 'SJ'),
('DSRO-003-PSK', 'TOP- TIE TOP MILK', 7380000, 'Images/hanghoa/DSRO-003-PSK.jpg', 1, '', '', 'DSRO', 'PSK'),
('GD-001-SHOB', 'GUIDI PL2 WHITE', 19700000, 'Images/hanghoa/GD-001-SHOB.jpg', 1, '', '', 'GD', 'SHOB'),
('GD-002-SHOB', 'GUIDI PL2 BLACK', 19700000, 'Images/hanghoa/GD-002-SHOB.jpg', 1, '', '', 'GD', 'SHOB'),
('GD-003-SHOD', 'GUIDI 992 WHITE /GRAIN.C000T', 14900000, 'Images/hanghoa/GD-003-SHOD.jpg', 1, '', '', 'GD', 'SHOD'),
('J7-001-SJ', 'CROPPED BOMBER JACKET', 29890000, 'Images/hanghoa/J7-001-SJ.jpg', 1, '', '', 'J7', 'SJ'),
('J7-002-SS', 'DISTRESSED HOODIE', 14780000, 'Images/hanghoa/J7-002-SS.jpg', 1, '', '', 'J7', 'SS'),
('J7-003-SJ', 'COTTON SATIN BACK JACKET', 21910000, 'Images/hanghoa/J7-003-SJ.jpg', 1, '', '', 'J7', 'SJ'),
('J7-004-SJ', 'INDIGO DISTRESSED ZIPPED DENIM JACKET', 21200000, 'Images/hanghoa/J7-004-SJ.jpg', 1, '', '', 'J7', 'SJ'),
('KBR-001-G', 'MASK C2 BMBT PLUM', 11660000, 'Images/hanghoa/KBR-001-G.JPG', 1, '', 'Free size', 'KBR', 'G'),
('KBR-002-G', 'MASK A1', 8860000, 'Images/hanghoa/KBR-002-G.JPG', 1, '', 'Free size', 'KBR', 'G'),
('KBR-003-G', 'MASK Z3 TS', 16320000, 'Images/hanghoa/KBR-003-BRC.JPG', 1, '', 'Free size', 'KBR', 'G'),
('LF-001-ST', '\'OVER\' T-SHIRT', 6730000, 'Images/hanghoa/LF-001-ST.jpg', 1, '', '- Collection Srping/Summer 2017 của Lost & Found Rooms\r\n\r\n- Chất liệu : 100% cotton được làm thủ công từ hãng Lost & Found \r\n\r\n- Màu : Xám đen\r\n\r\n- Made in Italy', 'LF', 'ST'),
('LF-002-ST', 'STRIPE DETAILING T-SHIRT', 7460000, 'Images/hanghoa/LF-002-ST.jpg', 1, '', '- Collection Srping/Summer 2017 của Lost & Found Rooms\r\n\r\n- Chất liệu : 100% cotton được làm thủ công từ hãng Lost & Found \r\n\r\n- Màu : Xám đen\r\n\r\n- Made in Italy\r\nColor\r\n', 'LF', 'ST'),
('LF-004-PS', 'WOOL DRAWSTRING SHORTS', 8190000, 'Images/hanghoa/LF-004-PS.jpg', 1, '', '', 'LF', 'PS'),
('OBS-001-ST', 'Raglan Longsleeves T-shirt', 5940000, 'Images/hanghoa/OBS-001-ST.jpg', 1, '', '', 'OBS', 'ST'),
('OBS-002-SHOS', 'Tumor Sneakers', 21450000, 'Images/hanghoa/OBS-002-SHOS.jpg', 1, '', '', 'OBS', 'SHOS'),
('OBS-003-S', 'Sleeveless Highneck Shirt', 8770000, 'Images/hanghoa/OBS-003-S.jpg', 1, '', '', 'OBS', 'S'),
('OBS-004-P', 'Latex Hem Trousers', 11470000, 'Images/hanghoa/OBS-004-P.jpg', 1, '', '', 'OBS', 'P'),
('OBS-005-SC', 'MOLESKIN DOUBLE BREASTED COAT', 29320000, 'Images/hanghoa/OBS-005-SC.jpg', 1, '', '', 'OBS', 'SC'),
('OBS-006-SJ', 'AVANCORPO MINIMAL LEATHER JACKET', 35580000, 'Images/hanghoa/OBS-006-SJ.jpg', 1, '', '', 'OBS', 'SJ'),
('RO-001-P', 'DRAWSTRING CROPPED FW17', 21150000, 'Images/hanghoa/RO-001-P.jpg', 1, '', '', 'RO', 'P'),
('RO-002-SHOS', 'LEVEL RUNNER LOW. FW17', 12500000, 'Images/hanghoa/RO-002-SHOS.JPG', 1, '', '', 'RO', 'SHOS'),
('RO-003-SB', 'JMF CROPPED FW17', 48160000, 'Images/hanghoa/RO-003-SB.jpg', 1, '', '', 'RO', 'SB'),
('RO-004-ST', 'LEVEL T-SHIRT BLACK FW17', 6650000, 'Images/hanghoa/RO-004-ST.jpg', 1, '', '', 'RO', 'ST'),
('RO-005-SHOS', 'MASTODON PROMODEL II FW17', 17580000, 'Images/hanghoa/RO-005-SHOS.JPG', 1, '', '', 'RO', 'SHOS'),
('RO-006-SHOS', 'RAMONES SLIP ON FW17', 14500000, 'Images/hanghoa/RO-006-SHOS.JPG', 1, '', '', 'RO', 'SHOS'),
('RO-007-SJ', 'STOOGES FW17', 59250000, 'Images/hanghoa/RO-007-SJ.jpg', 1, '', '', 'RO', 'SJ'),
('SFTM-001-SS', '\"OOFT\" PRINT QUARTER SLEEVE HOODIE', 9900000, 'Images/hanghoa/SFTM-001-SS.jpg', 1, '', '', 'SFTM', 'SS'),
('SFTM-002-ST', '\"MUTE\" PRINT - OVERSIZED TEE BLACK', 4950000, 'Images/hanghoa/SFTM-002-ST.jpg', 1, '', '', 'SFTM', 'ST'),
('SFTM-003-P', 'ELASTICATED BUCKET WOOL PANT', 13200000, 'Images/hanghoa/SFTM-003-P.jpg', 1, '', '', 'SFTM', 'P'),
('SFTM-004-SB', '\"BIRD\" PRINT - OVERSIZED SOFT BLAZER', 28800000, 'Images/hanghoa/SFTM-004-SB.jpg', 1, '', '', 'SFTM', 'SB'),
('SOS-001-PSK', 'Quadruple Layers Tulle Skirt', 5100000, 'Images/hanghoa/SOS-001-PSK.jpg', 1, '', '', 'SOS', 'PSK'),
('SOS-002-SC', 'Drape Tunic Cape Top', 3550000, 'Images/hanghoa/SOS-002-SC.jpg', 1, '', '', 'SOS', 'SC'),
('SOS-003-SS', 'Wool Overlocked Seam Layers Hooded Jacket', 9250000, 'Images/hanghoa/SOS-003-SS.jpg', 1, '', '', 'SOS', 'SS'),
('SOS-004-SC', 'COAT BLAZER', 5970000, 'Images/hanghoa/SOS-004-SC.jpg', 1, '', 'Collection - FALL/WINTER 2015\r\n\r\nMaterial - 100% JAPANESE LINEN', 'SOS', 'SC'),
('VLA-001-SJ', 'GRUNGE LEATHER JACKET', 19900000, 'Images/hanghoa/VLA-001-SJ.jpg', 1, '', 'Collection - FALL/WINTER 2015\r\n\r\nMaterial - 100% LAMB LEATHER', 'VLA', 'SJ'),
('VLA-002-SJ', 'BOMBER JACKET', 7950000, 'Images/hanghoa/VLA-002-SJ.jpg', 1, '', 'Collection: SPRING/SUMMER 2015\r\n\r\nMaterial: 100% POL', 'VLA', 'SJ'),
('VLA-003-PS', 'RED SEAM LAYERED SHORTS', 9000000, 'Images/hanghoa/VLA-003-PS.jpg', 1, '', '', 'VLA', 'PS'),
('VLA-004-PS', 'COATED ADJUSTABLE DRAWSTRINGS SHORTS', 10000000, 'Images/hanghoa/VLA-004-PS.jpg', 1, '', 'Six pocket style hand coated with adjustable hem drawstrings shorts in Black. Spring/Summer 2016 collection. Made in Korea. 100% cotton. Coat treatment. Waxed drawstrings.', 'VLA', 'PS'),
('Y3-001-SHOS', 'Y-3 ZAZU', 9430000, 'Images/hanghoa/Y3-001-SHOS.jpg', 1, '', '', 'Y3', 'SHOS'),
('Y3-002-SHOS', 'Y-3 RYO', 9430000, 'Images/hanghoa/Y3-002-SHOS.jpg', 1, '', '', 'Y3', 'SHOS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltaikhoan`
--

CREATE TABLE `tbltaikhoan` (
  `matk` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `mapq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbltaikhoan`
--

INSERT INTO `tbltaikhoan` (`matk`, `user`, `pass`, `mapq`) VALUES
(1, 'administrator', 'dungzin', 1),
(2, 'admin1', 'hoangviet', 2),
(3, 'chikhoai', '123456', 3),
(4, 'quynhhoa', '123456', 3),
(5, 'truongson', '123456', 3),
(6, 'kieutrang', '123456', 3),
(7, 'vuhongtran', '123456', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltinhtrang`
--

CREATE TABLE `tbltinhtrang` (
  `matt` int(11) NOT NULL,
  `tinhtrang` varchar(30) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbltinhtrang`
--

INSERT INTO `tbltinhtrang` (`matt`, `tinhtrang`) VALUES
(1, 'Đang xử lý'),
(2, 'Đang giao hàng'),
(3, 'Đã giao hàng'),
(4, 'Hủy đơn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltinhtrangdonhang`
--

CREATE TABLE `tbltinhtrangdonhang` (
  `madh` int(11) DEFAULT NULL,
  `matt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbltinhtrangdonhang`
--

INSERT INTO `tbltinhtrangdonhang` (`madh`, `matt`) VALUES
(1, 1),
(2, 3),
(3, 2),
(4, 4),
(5, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`maad`),
  ADD KEY `matk` (`matk`);

--
-- Chỉ mục cho bảng `tbldanhmuc`
--
ALTER TABLE `tbldanhmuc`
  ADD PRIMARY KEY (`madm`);

--
-- Chỉ mục cho bảng `tbldonhang`
--
ALTER TABLE `tbldonhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `tblgiaohang`
--
ALTER TABLE `tblgiaohang`
  ADD KEY `madh` (`madh`);

--
-- Chỉ mục cho bảng `tblhoadonchitiet`
--
ALTER TABLE `tblhoadonchitiet`
  ADD KEY `madh` (`madh`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  ADD PRIMARY KEY (`makh`),
  ADD KEY `matk` (`matk`);

--
-- Chỉ mục cho bảng `tblnsx`
--
ALTER TABLE `tblnsx`
  ADD PRIMARY KEY (`mansx`);

--
-- Chỉ mục cho bảng `tblphanquyen`
--
ALTER TABLE `tblphanquyen`
  ADD PRIMARY KEY (`mapq`);

--
-- Chỉ mục cho bảng `tblsanpham`
--
ALTER TABLE `tblsanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `mansx` (`mansx`),
  ADD KEY `madm` (`madm`);

--
-- Chỉ mục cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD PRIMARY KEY (`matk`),
  ADD KEY `mapq` (`mapq`);

--
-- Chỉ mục cho bảng `tbltinhtrang`
--
ALTER TABLE `tbltinhtrang`
  ADD PRIMARY KEY (`matt`);

--
-- Chỉ mục cho bảng `tbltinhtrangdonhang`
--
ALTER TABLE `tbltinhtrangdonhang`
  ADD KEY `madh` (`madh`),
  ADD KEY `matt` (`matt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `maad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbldonhang`
--
ALTER TABLE `tbldonhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tblphanquyen`
--
ALTER TABLE `tblphanquyen`
  MODIFY `mapq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD CONSTRAINT `tbladmin_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `tbltaikhoan` (`matk`);

--
-- Các ràng buộc cho bảng `tbldonhang`
--
ALTER TABLE `tbldonhang`
  ADD CONSTRAINT `tbldonhang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `tblkhachhang` (`makh`);

--
-- Các ràng buộc cho bảng `tblgiaohang`
--
ALTER TABLE `tblgiaohang`
  ADD CONSTRAINT `tblgiaohang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `tbldonhang` (`madh`);

--
-- Các ràng buộc cho bảng `tblhoadonchitiet`
--
ALTER TABLE `tblhoadonchitiet`
  ADD CONSTRAINT `tblhoadonchitiet_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `tbldonhang` (`madh`),
  ADD CONSTRAINT `tblhoadonchitiet_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `tblsanpham` (`masp`);

--
-- Các ràng buộc cho bảng `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  ADD CONSTRAINT `tblkhachhang_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `tbltaikhoan` (`matk`);

--
-- Các ràng buộc cho bảng `tblsanpham`
--
ALTER TABLE `tblsanpham`
  ADD CONSTRAINT `tblsanpham_ibfk_1` FOREIGN KEY (`mansx`) REFERENCES `tblnsx` (`mansx`),
  ADD CONSTRAINT `tblsanpham_ibfk_2` FOREIGN KEY (`madm`) REFERENCES `tbldanhmuc` (`madm`);

--
-- Các ràng buộc cho bảng `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD CONSTRAINT `tbltaikhoan_ibfk_1` FOREIGN KEY (`mapq`) REFERENCES `tblphanquyen` (`mapq`);

--
-- Các ràng buộc cho bảng `tbltinhtrangdonhang`
--
ALTER TABLE `tbltinhtrangdonhang`
  ADD CONSTRAINT `tbltinhtrangdonhang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `tbldonhang` (`madh`),
  ADD CONSTRAINT `tbltinhtrangdonhang_ibfk_2` FOREIGN KEY (`matt`) REFERENCES `tbltinhtrang` (`matt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
