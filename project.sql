-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 11, 2018 lúc 08:20 PM
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
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldanhmuc`
--

CREATE TABLE `tbldanhmuc` (
  `madm` varchar(20) NOT NULL,
  `tendanhmuc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbldanhmuc`
--

INSERT INTO `tbldanhmuc` (`madm`, `tendanhmuc`) VALUES
('ABRC', 'Bracelet'),
('AG', 'Glasses'),
('AH', 'Hat'),
('ANCK', 'Necklace'),
('APER', 'Perfume'),
('AR', 'Ring'),
('FWB', 'Boots'),
('FWD', 'Derbies'),
('FWS', 'Sneakers'),
('P', 'Pants'),
('PS', 'Shorts'),
('PSK', 'Skirt'),
('S', 'Shirt'),
('SB', 'Blazer'),
('SC', 'Coat'),
('SJ', 'Jacket'),
('SS', 'Sweater'),
('ST', 'T-Shirt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblhoadon`
--

CREATE TABLE `tblhoadon` (
  `mahd` int(11) NOT NULL,
  `matk` int(11) DEFAULT NULL,
  `ngaydathang` date DEFAULT NULL,
  `sdtgiaohang` varchar(20) DEFAULT NULL,
  `diachigiaohang` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `yeucau` text CHARACTER SET utf8,
  `tinhtrang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblhoadon`
--

INSERT INTO `tblhoadon` (`mahd`, `matk`, `ngaydathang`, `sdtgiaohang`, `diachigiaohang`, `yeucau`, `tinhtrang`) VALUES
(1, 2, '2018-01-10', '01324567568', 'Hà Nội', 'Giao hàng lúc 13h', 3),
(2, 2, '2018-01-10', '01324567568', 'Hà Nội', '', 1),
(3, 4, '2018-01-10', '094894561521', 'Quảng Bình', '', 4),
(6, 2, '2018-01-10', '01324567568', 'Hà Nội', 'Giao hàng đến Yên Viên !', 2),
(7, 6, '2018-01-11', '0124567820', 'Trần Duy Hưng, Hà Nội', 'Ship đến gốc cây số 12', 2),
(8, 7, '2018-01-11', '01647713999', 'hà nôi', '', 1),
(9, 2, '2018-01-11', '01324567568', 'Hà Nội', '', 1),
(10, 2, '2018-01-12', '01324567568', 'Hà Nội', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblhoadonchitiet`
--

CREATE TABLE `tblhoadonchitiet` (
  `mahd` int(11) DEFAULT NULL,
  `masp` varchar(30) DEFAULT NULL,
  `soluong` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tblhoadonchitiet`
--

INSERT INTO `tblhoadonchitiet` (`mahd`, `masp`, `soluong`) VALUES
(1, 'CD-012-SS', 1),
(1, 'CD-011-SS', 2),
(2, 'CD-003-S', 1),
(2, 'CD-004-S', 1),
(2, 'CD-011-SS', 2),
(3, 'CD-011-SS', 1),
(6, 'CD-007-SS', 10),
(7, 'RO-001-P', 3),
(7, 'CD-007-SS', 5),
(8, 'KBR-001-AG', 6),
(8, 'CD-003-S', 3),
(8, 'CD-010-ST', 2),
(9, 'CD-007-SS', 7),
(10, 'CD-002-P', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnsx`
--

CREATE TABLE `tblnsx` (
  `mansx` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tennsx` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `gioithieunsx` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblnsx`
--

INSERT INTO `tblnsx` (`mansx`, `tennsx`, `gioithieunsx`) VALUES
('CD', 'Christian Dada', 'CHRISTIAN DADA được thành lập ở Tokyo vào năm 2010 bởi Masanori Morikawa. Tên thương hiệu là sự kết hợp từ Parisian Haute Couture và Dadaism (một phong trào văn hóa nghệ thuật bắt đầu từ Zürich, Thụy Sĩ, trong thời kì thế chiến I)\r\n    Cốt lõi của thiết kế Christian Dada, cũng là nền tảng của triết lý thẩm mỹ Wabi-sabi của Nhật Bản - tập trung vào việc chấp nhận tính phù du và sự không hoàn hảo . Masanori Morikawa được học hỏi và đào tạo bởi Charles Anastase tại London, đã tạo ra một cách tiếp cận độc đáo cho thời trang . Tầm nhìn phức tạp, tối tăm và tràn đầy sức sống của anh ấy, ông thu hút sự chú ý của các nền văn hoá phương Đông và các nghề thủ công Nhật Bản truyền thống như kỹ thuật nhuộm tay \"Yuzen\" được sử dụng cho lụa làm kimonos.\r\n    Ông đã cân bằng kéo léo những thứ có ảnh hưởng mạnh mẽ và mang tính thương mại trong streetwear. Bộ sưu tập của ông được nâng cao bởi những chi tiết phức tạp và những trang trí tinh xảo, tạo ra một sự đụng độ tinh tế của những nghệ thuật quá khứ và những phong trào của giới trẻ.\r\n'),
('DSRO', 'DRKSHDW By Rick Owens', ''),
('GD', 'Guidi', 'Vào năm 1896 - Guido Guidi, Giovanni Rosellini và Gino Ulivo đã thành lập ra “ Conceria Guidi Rosellini” tại Pescia, Tuscany nước Ý. Nơi đây, như một cái nôi của nghệ thuật thuộc da được bắt nguồn từ thời trung lưu, tồn tại từ thế kỷ XIV. \r\nRuggero Guidi hoạt động trong lĩnh vực thuộc da và ông đã dành thời gian để tìm kiếm sự cân bằng hoàn hảo giữa công nghệ tiên tiến và sự tôn trọng về di sản truyền thống cùng kỹ năng của mình. Với tài năng của mình “ Conceria Guidi Rosellini” đã nổi tiếng trên toàn thế giới và được sự tín nghiệm từ những nhà thiết kế mong muốn được sử dụng những dòng da đặc biệt và những phương pháp bảo quản chăm sóc da từ Guidi và ông luôn luôn đáp ứng được chính xác những gì mà khách hàng của mình mong muốn.\r\nNiềm đam mê chất liệu da và sự tôn trọng dành cho truyền thống là sự kết hợp ý nghĩa dành cho những bộ sưu tập giày của Guidi. Những trào lưu, quá trình sản xuất hàng loạt không phải sự tập trung của Guidi, CEO Guidi đã tập trung vào quá trình nghiên cứu để đúc kết những gì tinh hoa nhất. Guidi’s shoes sinh ra để dành cho những tín đồ của sự độc đáo, hòa quyện với truyền thống, những đôi giày được đúc kết bởi những thợ thủ công lành nghề cùng với da chất liệu da tuyệt vời . Guidi mong muốn đem đến cho những khách hàng không chỉ coi một sản phẩm đơn thuần mà như một sự liên kết tồn tại giữa những sản phẩm và người sở hữu.'),
('J7', 'Julius-7', 'Thương hiệu Julius_7 từ lâu đã trở thành một biểu tượng đi đầu cho phong cách avant-garde tại Nhật Bản và khắp thế giới. Dưới bàn tay của nhà thiết kế Tatsuro Horikawa, từng bộ sưu tập của Julius_7 luôn mang vẻ đẹp đầy ma mị, đậm bản sắc từ các nền văn hoá thần bí, như câu chuyện cổ xưa bước ra thế giới thực tại. '),
('KBR', 'Kuboraum', ''),
('LF', 'Lost & Found', 'Lấy cảm hứng bắt nguồn từ văn hoá phục hưng hàng thế kỉ trước, thương hiệu Lost&Found đến từ nước Ý luôn chú trọng vào sự thô mộc trên bộ trang phục của mình. Từ các chất vải cơ bản được xử lý thủ công đến những đường may, đường cắt không cân xứng mang dụng ý của nhà thiết kế Ria Dunn, tạo nên vẻ đẹp gần gũi, nhã nhặn, tách biệt khỏi các thương hiệu thời trang cao cấp khác để khẳng định phong cách thời trang thủ công xa xưa \"đã từng mất và được tìm lại\"'),
('OBS', 'OBSCUR', ''),
('OW', 'Off-White', 'Nhà thiết kế người Mỹ, DJ - Virgil Abloh đã trở nên nổi bật như là giám đốc sáng tạo của Kanye West. Anh ấy đã tạo ra làn sóng trong thế giới thời trang với nhãn hiệu thời trang cao cấp của mình, Off-White.\r\nKhi Off-White / Virgil Abloh ra mắt vào cuối năm 2013, Abloh đã nhanh chóng trở nên quen thuộc với các tín đồ thời trang đường phố. Các hình ảnh và biểu tượng bắt mắt đã tạo nên điểm nhấn mạnh đối với những người yêu thích nó.'),
('RO', 'Rick Owens', 'Thành lập từ năm 1994, lần đầu tiên ra mắt trước thế giới tại Paris Fashion Week 2003 và tới bây giờ, Rick Owens đã trở thành biểu tượng mới cho sự đột phá và cách tân của thời trang đương đại. Mỗi bộ sưu tập được trình diễn hàng năm khiến cả thế giới trầm trồ vì vẻ đẹp và những câu chuyện đầy cảm hứng đằng sau. Sử dụng chủ yếu những gam màu cơ bản, các thiết kế của Rick Owens chú trọng vào chất liệu và đường nét trên từng sợi vải, để mỗi bộ đồ mặc lên sẽ toát ra một phong cách khác biệt, từ sang trọng, uyển chuyển đến cả phóng khoáng, bụi bặm.\r\n'),
('SFTM', 'Song For The Mute', ''),
('SOS', 'Shades of Silence', 'Shades of Silence được sáng lập bởi nhà thiết kế Hiko đến từ Hongkong. Phong cách chủ đạo của hãng hướng đến thời trang tối\r\n giản mang âm hưởng của thời trang thế kỉ 18 và có thể sử dụng lâu dài. Hiko chú trọng sử dụng chất liệu vải thô và các đường\r\n cắt may đơn nhất bởi chính tay các nghệ nhân Hongkong, tạo nên vẻ đẹp nguyên thủy trong bộ trang phục, để nói lên cá tính của\r\n người mặc theo thời gian thấm nhuần vào từng mảnh vải.'),
('VLA', 'Vlades', '\"VLADES\" là thương hiệu đến từ Seoul sáng lập bởi nhà thiết kế trẻ Mooyeol Choi, hiện đang là một trong những tên tuổi lớn tại Hàn Quốc và luôn góp mặt ở các show trình diễn Seoul Fashion Week. Phong cách của hãng tập trung vào sự khác biệt trong các chi tiết và khí chất toát lên từ các thiết kế, tạo nên bộ trang phục hoàn hảo cho người mặc và trờ thành \"bộ giáp\" của chính họ tách biệt với\r\n  ​thời trang đại chúng.'),
('Y3', 'Y-3', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsanpham`
--

CREATE TABLE `tblsanpham` (
  `masp` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tensp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `gia` float DEFAULT NULL,
  `anh` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `tinhtrang` int(11) DEFAULT NULL,
  `mota` text,
  `mansx` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `madm` varchar(20) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tblsanpham`
--

INSERT INTO `tblsanpham` (`masp`, `tensp`, `gia`, `anh`, `tinhtrang`, `mota`, `mansx`, `madm`) VALUES
('CD-001-P', 'SUPER SKINNY SIGNATURE KNEE DAMAGED TROUSER', 9360000, 'Images/hanghoa/CD-001-P.jpg', 1, '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 95%Cotton, 5%Polyurethane\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'P'),
('CD-002-P', 'KNEE DAMAGED SIGNATURE SKINNY JEAN', 10400000, 'Images/hanghoa/CD-002-P.jpg', 1, '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 95%Cotton, 5%Polyurethane\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'P'),
('CD-003-S', 'DISTORTION SILK COTTON TURTLENECK SHIRT', 9750000, 'Images/hanghoa/CD-003-S.jpg', 1, '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"\r\n\r\n- Chất liệu : 95%Cotton, 5%Polyurethane\r\n\r\n- Màu : Đen\r\n\r\n- Made in Japan\r\n\r\n- Model : 1m78 / 54kg mặc size 46', 'CD', 'S'),
('CD-004-S', 'STRIPED COTTON TURLTE NECK SHIRT', 9750000, 'Images/hanghoa/CD-004-S.jpg', 1, '', 'CD', 'S'),
('CD-005-S', '\"TFTLTYTD\" EMBROIDERY STRIPED COTTON SHIRT', 10400000, 'Images/hanghoa/CD-005-S.jpg', 1, '', 'CD', 'S'),
('CD-006-S', 'PRINT SHIRT', 12750000, 'Images/hanghoa/CD-006-S.jpg', 2, '', 'CD', 'S'),
('CD-007-SS', '\"TFTLTYTD\" EMBROIDERY TURTLE NECK KNIT', 10750000, 'Images/hanghoa/CD-007-SS.jpg', 1, '', 'CD', 'SS'),
('CD-008-SS', 'SIGNATURE BOMBER SWEATER SHIRT', 8750000, 'Images/hanghoa/CD-008-SS.jpg', 1, '', 'CD', 'SS'),
('CD-009-ST', '\"NO POSTING\" COTTON PRINT T-SHIRT', 3700000, 'Images/hanghoa/CD-009-ST.jpg', 1, '', 'CD', 'ST'),
('CD-010-ST', 'COTTON PRINT T-SHIRT', 5750000, 'Images/hanghoa/CD-010-ST.jpg', 1, '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"', 'CD', 'ST'),
('CD-011-SS', 'SIGNATURE DADA HODDIE', 9750000, 'Images/hanghoa/CD-011-SS.jpg', 1, '', 'CD', 'SS'),
('CD-012-SS', 'OVERDYEING BOMBER HOODIE ORANGE', 9380000, 'Images/hanghoa/CD-012-SS.jpg', 1, '- Collection Fall/Winter 2017 của Christian Dada mang tên \"BLUE\"', 'CD', 'SS'),
('KBR-001-AG', 'MASK Z3 TS', 16320000, 'Images/hanghoa/KBR-001-G.JPG', 1, 'Free size', 'KBR', 'AG'),
('KBR-002-AG', 'MASK N3 CHP', 13980000, 'Images/hanghoa/KBR-002-AG.JPG', 1, 'Free size', 'KBR', 'AG'),
('KBR-003-AG', 'MASK H52 SILVER', 15850000, 'Images/hanghoa/KBR-003-AG.JPG', 2, 'Free size', 'KBR', 'AG'),
('KBR-004-AG', 'MASK Y3 CHP', 8300000, 'Images/hanghoa/KBR-004-AG.jpg', 1, 'Free size', 'KBR', 'AG'),
('RO-001-P', 'DRAWSTRING CROPPED FW17', 21150000, 'Images/hanghoa/RO-001-P.jpg', 1, '', 'RO', 'P'),
('RO-002-FWS', 'LEVEL RUNNER LOW. FW17', 12500000, 'Images/hanghoa/RO-002-SHOS.JPG', 1, '', 'RO', 'FWS'),
('RO-003-SB', 'JMF CROPPED FW17', 48160000, 'Images/hanghoa/RO-003-SB.jpg', 1, '', 'RO', 'SB'),
('RO-004-ST', 'LEVEL T-SHIRT BLACK FW17', 6650000, 'Images/hanghoa/RO-004-ST.jpg', 1, '', 'RO', 'ST'),
('RO-005-FWS', 'MASTODON PROMODEL II FW17', 17580000, 'Images/hanghoa/RO-005-SHOS.JPG', 2, '', 'RO', 'FWS'),
('VLA-001-PS', 'Red Seam Layered Shorts', 9200000, 'Images/hanghoa/VLA-001-PS.jpg', 1, '', 'VLA', 'PS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbltaikhoan`
--

CREATE TABLE `tbltaikhoan` (
  `matk` int(11) NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `mapq` int(11) DEFAULT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(30) DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbltaikhoan`
--

INSERT INTO `tbltaikhoan` (`matk`, `user`, `pass`, `mapq`, `ten`, `ngaysinh`, `diachi`, `gioitinh`, `sdt`, `email`) VALUES
(1, 'administrator', '123456', 1, 'Dũng Zin', '1998-06-15', 'Hà Nội', 1, '01632406674', 'mightyarrow255@gmail.com'),
(2, 'kieutrang', '123456', 3, 'Nguyễn Kiều Trang', '1998-11-26', 'Hà Nội', 0, '01324567568', 'kieutrang@gmail.com'),
(3, 'admin', '123456', 2, 'Hoàng Đức Việt', '1998-01-10', 'Hà Nội', 1, '0156465414565', 'hoangviet@gmail.com'),
(4, 'truongson', '123456', 3, 'Nguyễn Trường Sơn', '1997-02-21', 'Quảng Bình', 1, '094894561521', 'truongson@gmail.com'),
(5, 'chuhieu', '123456', 3, 'Chu Minh Hiếu', '1998-12-19', 'Hà Nội', 1, '0458945864', 'chuhieu@gmail.com'),
(6, 'quanghuy', '123456', 3, 'Trần Quang Huy', '1998-12-12', 'Hà Nội', 1, '0124567891', 'quanghuy@gmail.com'),
(7, 'sonanh123', 'namlun123', 3, 'Trần Minh Sơn Anh', '1998-05-12', 'hà nôi', 1, '01647713999', 'sonanhdepzai@yahoo.com.vn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbldanhmuc`
--
ALTER TABLE `tbldanhmuc`
  ADD PRIMARY KEY (`madm`);

--
-- Chỉ mục cho bảng `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `matk` (`matk`);

--
-- Chỉ mục cho bảng `tblhoadonchitiet`
--
ALTER TABLE `tblhoadonchitiet`
  ADD KEY `mahd` (`mahd`),
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `tblnsx`
--
ALTER TABLE `tblnsx`
  ADD PRIMARY KEY (`mansx`);

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
  ADD PRIMARY KEY (`matk`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD CONSTRAINT `tblhoadon_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `tbltaikhoan` (`matk`);

--
-- Các ràng buộc cho bảng `tblhoadonchitiet`
--
ALTER TABLE `tblhoadonchitiet`
  ADD CONSTRAINT `tblhoadonchitiet_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `tblhoadon` (`mahd`),
  ADD CONSTRAINT `tblhoadonchitiet_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `tblsanpham` (`masp`);

--
-- Các ràng buộc cho bảng `tblsanpham`
--
ALTER TABLE `tblsanpham`
  ADD CONSTRAINT `tblsanpham_ibfk_1` FOREIGN KEY (`mansx`) REFERENCES `tblnsx` (`mansx`),
  ADD CONSTRAINT `tblsanpham_ibfk_2` FOREIGN KEY (`madm`) REFERENCES `tbldanhmuc` (`madm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
