/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : shopping_here

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-06-21 01:49:20
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `binh_luan`
-- ----------------------------
DROP TABLE IF EXISTS `binh_luan`;
CREATE TABLE `binh_luan` (
  `MaBL` int(11) NOT NULL,
  `NoiDungBL` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `NguoiBL` int(11) NOT NULL,
  `NgayBL` datetime NOT NULL,
  `DaXoa` int(11) NOT NULL,
  `NgayXoa` datetime DEFAULT NULL,
  `NguoiXoa` int(11) DEFAULT NULL,
  `DoiTuongBL` int(11) NOT NULL,
  PRIMARY KEY (`MaBL`),
  KEY `FK_Binh_Luan_Doi_Tuong` (`DoiTuongBL`),
  KEY `FK_Binh_Luan_Nguoi_Dung1` (`NguoiBL`),
  CONSTRAINT `FK_Binh_Luan_Doi_Tuong` FOREIGN KEY (`DoiTuongBL`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Binh_Luan_Nguoi_Dung1` FOREIGN KEY (`NguoiBL`) REFERENCES `nguoi_dung` (`MaNguoiDung`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of binh_luan
-- ----------------------------
INSERT INTO binh_luan VALUES ('20', 'acb', '1', '2011-06-09 00:14:22', '0', null, null, '14');
INSERT INTO binh_luan VALUES ('21', 'def', '1', '2011-06-10 00:16:20', '0', null, null, '26');
INSERT INTO binh_luan VALUES ('22', 'ert', '1', '2011-06-09 00:16:44', '0', null, null, '27');
INSERT INTO binh_luan VALUES ('23', 'tr6576', '1', '2011-06-06 00:17:07', '0', null, null, '26');
INSERT INTO binh_luan VALUES ('39', 'adssdf', '28', '2011-06-19 02:43:52', '0', null, null, '39');
INSERT INTO binh_luan VALUES ('40', 'vdddddddddddddddd', '28', '2011-06-19 02:44:33', '0', null, null, '40');
INSERT INTO binh_luan VALUES ('41', 'asdsds', '28', '2011-06-19 02:49:07', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('42', 'sasd', '28', '2011-06-19 02:59:33', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('43', '4444444645b5redtntryytguuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu5e6463n244', '28', '2011-06-19 03:07:16', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('44', 'erv4v54545', '28', '2011-06-19 03:08:01', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('45', 'adsdf', '33', '2011-06-20 02:35:47', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('46', 'rfrsdfd', '33', '2011-06-20 02:36:57', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('47', 'afsds', '33', '2011-06-20 02:53:55', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('48', 'adfsdfs', '33', '2011-06-20 03:18:07', '0', null, null, '26');
INSERT INTO binh_luan VALUES ('49', 'dsdsdfs', '33', '2011-06-20 03:19:18', '0', null, null, '16');
INSERT INTO binh_luan VALUES ('51', 'ewrere', '50', '2011-06-20 03:35:05', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('52', 'sdsfd', '28', '2011-06-20 22:18:58', '0', null, null, '30');
INSERT INTO binh_luan VALUES ('53', 'heo con bị khùng :))', '33', '2011-06-20 22:35:06', '0', null, null, '26');

-- ----------------------------
-- Table structure for `chi_tiet_dat_hang`
-- ----------------------------
DROP TABLE IF EXISTS `chi_tiet_dat_hang`;
CREATE TABLE `chi_tiet_dat_hang` (
  `MaDDH` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGiaMua` double(10,0) DEFAULT NULL,
  `ThanhTien` double(10,0) DEFAULT NULL,
  PRIMARY KEY (`MaDDH`,`MaSanPham`),
  KEY `FK_Chi_Tiet_Dat_Hang_San_Pham` (`MaSanPham`),
  CONSTRAINT `FK_Chi_Tiet_Dat_Hang_Don_Dat_Hang` FOREIGN KEY (`MaDDH`) REFERENCES `don_dat_hang` (`MaDDH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Chi_Tiet_Dat_Hang_San_Pham` FOREIGN KEY (`MaSanPham`) REFERENCES `san_pham` (`Ma`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chi_tiet_dat_hang
-- ----------------------------

-- ----------------------------
-- Table structure for `chi_tiet_su_kien`
-- ----------------------------
DROP TABLE IF EXISTS `chi_tiet_su_kien`;
CREATE TABLE `chi_tiet_su_kien` (
  `MaSuKien` int(11) NOT NULL,
  `Ma` int(11) NOT NULL,
  `PhanTramGiamGia` float DEFAULT NULL,
  `QuaTang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaSuKien`,`Ma`),
  KEY `FK_Chi_Tiet_Su_Kien_San_Pham` (`Ma`),
  CONSTRAINT `FK_Chi_Tiet_Su_Kien_San_Pham` FOREIGN KEY (`Ma`) REFERENCES `san_pham` (`Ma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Chi_Tiet_Su_Kien_Su_Kien` FOREIGN KEY (`MaSuKien`) REFERENCES `su_kien` (`MaSuKien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chi_tiet_su_kien
-- ----------------------------

-- ----------------------------
-- Table structure for `dang_ki_nhan_thong_tin`
-- ----------------------------
DROP TABLE IF EXISTS `dang_ki_nhan_thong_tin`;
CREATE TABLE `dang_ki_nhan_thong_tin` (
  `MaGianHang` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `NgayDangKy` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HuyDangKy` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaGianHang`,`MaNguoiDung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dang_ki_nhan_thong_tin
-- ----------------------------

-- ----------------------------
-- Table structure for `doi_tuong`
-- ----------------------------
DROP TABLE IF EXISTS `doi_tuong`;
CREATE TABLE `doi_tuong` (
  `MaDoiTuong` int(11) NOT NULL AUTO_INCREMENT,
  `TenDoiTuong` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaDoiTuong`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of doi_tuong
-- ----------------------------
INSERT INTO doi_tuong VALUES ('1', 'Nguoi Mua');
INSERT INTO doi_tuong VALUES ('2', 'Nguoi Ban');
INSERT INTO doi_tuong VALUES ('3', 'Gian Hang');
INSERT INTO doi_tuong VALUES ('4', 'Su Kien');
INSERT INTO doi_tuong VALUES ('5', 'Su Kien');
INSERT INTO doi_tuong VALUES ('6', 'Su Kien');
INSERT INTO doi_tuong VALUES ('7', 'Su Kien');
INSERT INTO doi_tuong VALUES ('8', 'Su Kien');
INSERT INTO doi_tuong VALUES ('9', 'Su Kien');
INSERT INTO doi_tuong VALUES ('10', 'Su Kien');
INSERT INTO doi_tuong VALUES ('11', 'Su Kien');
INSERT INTO doi_tuong VALUES ('12', 'Su Kien');
INSERT INTO doi_tuong VALUES ('13', 'Su Kien');
INSERT INTO doi_tuong VALUES ('14', 'Su Kien');
INSERT INTO doi_tuong VALUES ('15', 'Su Kien');
INSERT INTO doi_tuong VALUES ('16', 'Su Kien');
INSERT INTO doi_tuong VALUES ('17', 'Su Kien');
INSERT INTO doi_tuong VALUES ('18', 'Su Kien');
INSERT INTO doi_tuong VALUES ('19', 'Su Kien');
INSERT INTO doi_tuong VALUES ('20', 'Binh luan');
INSERT INTO doi_tuong VALUES ('21', 'Binh luan');
INSERT INTO doi_tuong VALUES ('22', 'Binh luan');
INSERT INTO doi_tuong VALUES ('23', ' Binh luan');
INSERT INTO doi_tuong VALUES ('24', 'Su Kien');
INSERT INTO doi_tuong VALUES ('25', 'Su Kien');
INSERT INTO doi_tuong VALUES ('26', 'Su Kien');
INSERT INTO doi_tuong VALUES ('27', 'Su Kien');
INSERT INTO doi_tuong VALUES ('28', 'Nguoi mua');
INSERT INTO doi_tuong VALUES ('29', 'Nguoi mua');
INSERT INTO doi_tuong VALUES ('30', 'Sản phẩm');
INSERT INTO doi_tuong VALUES ('31', 'Sản phẩm');
INSERT INTO doi_tuong VALUES ('32', 'Sản phẩm');
INSERT INTO doi_tuong VALUES ('33', 'Nguoi mua');
INSERT INTO doi_tuong VALUES ('34', 'Nguoi mua');
INSERT INTO doi_tuong VALUES ('35', '');
INSERT INTO doi_tuong VALUES ('36', '');
INSERT INTO doi_tuong VALUES ('37', 'Binh luan');
INSERT INTO doi_tuong VALUES ('38', 'Binh luan');
INSERT INTO doi_tuong VALUES ('39', 'Binh luan');
INSERT INTO doi_tuong VALUES ('40', 'Binh luan');
INSERT INTO doi_tuong VALUES ('41', 'Binh luan');
INSERT INTO doi_tuong VALUES ('42', 'Binh luan');
INSERT INTO doi_tuong VALUES ('43', 'Binh luan');
INSERT INTO doi_tuong VALUES ('44', 'Binh luan');
INSERT INTO doi_tuong VALUES ('45', 'Binh luan');
INSERT INTO doi_tuong VALUES ('46', 'Binh luan');
INSERT INTO doi_tuong VALUES ('47', 'Binh luan');
INSERT INTO doi_tuong VALUES ('48', 'Binh luan');
INSERT INTO doi_tuong VALUES ('49', 'Binh luan');
INSERT INTO doi_tuong VALUES ('50', 'Nguoi mua');
INSERT INTO doi_tuong VALUES ('51', 'Binh luan');
INSERT INTO doi_tuong VALUES ('52', 'Binh luan');
INSERT INTO doi_tuong VALUES ('53', 'Binh luan');
INSERT INTO doi_tuong VALUES ('54', 'Gian hang');

-- ----------------------------
-- Table structure for `don_dat_hang`
-- ----------------------------
DROP TABLE IF EXISTS `don_dat_hang`;
CREATE TABLE `don_dat_hang` (
  `MaDDH` int(11) NOT NULL,
  `MaGianHang` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `TrangThai` int(11) DEFAULT NULL,
  `GhiChu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayDat` datetime NOT NULL,
  `NgayHuy` datetime DEFAULT NULL,
  PRIMARY KEY (`MaDDH`),
  KEY `FK_Don_Dat_Hang_Nguoi_Dung` (`MaNguoiDung`),
  CONSTRAINT `FK_Don_Dat_Hang_Doi_Tuong` FOREIGN KEY (`MaDDH`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Don_Dat_Hang_Nguoi_Dung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoi_dung` (`MaNguoiDung`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of don_dat_hang
-- ----------------------------

-- ----------------------------
-- Table structure for `gian_hang`
-- ----------------------------
DROP TABLE IF EXISTS `gian_hang`;
CREATE TABLE `gian_hang` (
  `MaGianHang` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `TenGianHang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NgayXoa` datetime DEFAULT NULL,
  `NguoiXoa` int(11) DEFAULT NULL,
  `NgayCapNhat` datetime DEFAULT NULL,
  `NguoiCapNhat` int(11) DEFAULT NULL,
  `Theme` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DaXoa` int(11) NOT NULL,
  `LuotXem` int(10) NOT NULL DEFAULT '0',
  `ThongTin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaGianHang`),
  KEY `FK_Gian_Hang_Nguoi_Dung` (`MaNguoiDung`),
  CONSTRAINT `FK_Gian_Hang_Doi_Tuong` FOREIGN KEY (`MaGianHang`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Gian_Hang_Nguoi_Dung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoi_dung` (`MaNguoiDung`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gian_hang
-- ----------------------------
INSERT INTO gian_hang VALUES ('3', '33', 'ABC', '2011-06-14 00:00:00', null, null, '2011-06-21 00:43:50', '34', 'users/tentaikhoan/daisy.jpg', '0', '2', null);
INSERT INTO gian_hang VALUES ('54', '34', 'DEF', '2011-06-21 00:38:07', null, null, '2011-06-21 00:43:50', '34', 'users/tentaikhoan/daisy.jpg', '0', '1', null);

-- ----------------------------
-- Table structure for `likes`
-- ----------------------------
DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `MaDoiTuong` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `SoSao` int(11) NOT NULL,
  PRIMARY KEY (`MaDoiTuong`,`MaNguoiDung`),
  KEY `FK_LIKE_NguoiDung` (`MaNguoiDung`) USING BTREE,
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`MaDoiTuong`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoi_dung` (`MaNguoiDung`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of likes
-- ----------------------------
INSERT INTO likes VALUES ('14', '1', '0');
INSERT INTO likes VALUES ('20', '1', '0');
INSERT INTO likes VALUES ('23', '1', '0');
INSERT INTO likes VALUES ('26', '1', '0');
INSERT INTO likes VALUES ('26', '33', '0');
INSERT INTO likes VALUES ('30', '28', '1');
INSERT INTO likes VALUES ('41', '28', '0');
INSERT INTO likes VALUES ('43', '28', '0');
INSERT INTO likes VALUES ('44', '28', '0');
INSERT INTO likes VALUES ('46', '33', '0');
INSERT INTO likes VALUES ('48', '33', '0');
INSERT INTO likes VALUES ('53', '33', '0');

-- ----------------------------
-- Table structure for `loai_nguoi_dung`
-- ----------------------------
DROP TABLE IF EXISTS `loai_nguoi_dung`;
CREATE TABLE `loai_nguoi_dung` (
  `MaLoaiND` int(11) NOT NULL AUTO_INCREMENT,
  `LoaiNguoiDung` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaLoaiND`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of loai_nguoi_dung
-- ----------------------------
INSERT INTO loai_nguoi_dung VALUES ('1', 'Nguoi Mua');
INSERT INTO loai_nguoi_dung VALUES ('2', 'Nguoi Ban');
INSERT INTO loai_nguoi_dung VALUES ('3', 'Admin');

-- ----------------------------
-- Table structure for `loai_san_pham`
-- ----------------------------
DROP TABLE IF EXISTS `loai_san_pham`;
CREATE TABLE `loai_san_pham` (
  `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaGianHang` int(11) NOT NULL,
  PRIMARY KEY (`MaLoaiSP`),
  KEY `FK_LoaiSP_GianHang` (`MaGianHang`),
  CONSTRAINT `FK_LoaiSP_GianHang` FOREIGN KEY (`MaGianHang`) REFERENCES `gian_hang` (`MaGianHang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of loai_san_pham
-- ----------------------------
INSERT INTO loai_san_pham VALUES ('1', 'điện tử', '3');

-- ----------------------------
-- Table structure for `nguoi_dung`
-- ----------------------------
DROP TABLE IF EXISTS `nguoi_dung`;
CREATE TABLE `nguoi_dung` (
  `MaNguoiDung` int(11) NOT NULL,
  `MaLoaiND` int(11) NOT NULL,
  `MaGianHang` int(11) DEFAULT NULL,
  `UserName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `AnhDaiDien` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaNguoiDung`),
  UNIQUE KEY `UserName` (`UserName`),
  UNIQUE KEY `Email` (`Email`),
  KEY `FK_Nguoi_Dung_Loai_Nguoi_Dung` (`MaLoaiND`),
  CONSTRAINT `FK_Nguoi_Dung_DoiTuong` FOREIGN KEY (`MaNguoiDung`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Nguoi_Dung_Loai_Nguoi_Dung` FOREIGN KEY (`MaLoaiND`) REFERENCES `loai_nguoi_dung` (`MaLoaiND`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of nguoi_dung
-- ----------------------------
INSERT INTO nguoi_dung VALUES ('1', '1', '0', 'nguoimua2', '', '0000-00-00 00:00:00', '0', null, '', 'thuha09@gmail.com', '0', 'users/tentaikhoan/daisy.jpg');
INSERT INTO nguoi_dung VALUES ('28', '1', '0', 'nguoimua3', '', '1970-01-01 00:00:00', '0', '', 'e10adc3949ba59abbe56e057f20f883e', 'thuha@.com', '1', 'users/tentaikhoan/daisy.jpg');
INSERT INTO nguoi_dung VALUES ('33', '2', '3', 'nguoiban', '', '1970-01-01 00:00:00', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'a@.com', '1', 'users/tentaikhoan/daisy.jpg');
INSERT INTO nguoi_dung VALUES ('34', '2', '54', 'nguoiban2', '', '1970-01-01 00:00:00', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'b@.com', '1', 'users/tentaikhoan/daisy.jpg');
INSERT INTO nguoi_dung VALUES ('50', '3', '0', 'admin', '', '1970-01-01 00:00:00', '1', '', 'e10adc3949ba59abbe56e057f20f883e', 'heo@.com', '1', '');

-- ----------------------------
-- Table structure for `san_pham`
-- ----------------------------
DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE `san_pham` (
  `Ma` int(11) NOT NULL,
  `MaSanPham` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenSanPham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGiaGoc` double NOT NULL,
  `DonGiaBan` double DEFAULT NULL,
  `DacDiemSP` text COLLATE utf8_unicode_ci,
  `NgayDang` datetime NOT NULL,
  `NgayCapNhat` datetime DEFAULT NULL,
  `NguoiCapNhat` int(11) DEFAULT NULL,
  `DaXoa` int(11) DEFAULT NULL,
  `NguoiXoa` int(11) DEFAULT NULL,
  `NgayXoa` datetime DEFAULT NULL,
  `HinhAnh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaLoaiSP` int(11) DEFAULT NULL,
  `LuotXem` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Ma`),
  KEY `FK_San_Pham_Loai_SP1` (`MaLoaiSP`),
  CONSTRAINT `FK_San_Pham_Doi_Tuong` FOREIGN KEY (`Ma`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_San_Pham_Loai_SP1` FOREIGN KEY (`MaLoaiSP`) REFERENCES `loai_san_pham` (`MaLoaiSP`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of san_pham
-- ----------------------------
INSERT INTO san_pham VALUES ('30', 'A01', 'Máy vi tính', '10', '50000', '45000', 'eruh37438ru2390jw rij38w4739-1378209', '2011-06-16 19:24:56', '2011-06-20 22:52:56', '33', '0', null, null, 'users/tentaikhoan/daisy.jpg', '1', '1');

-- ----------------------------
-- Table structure for `su_kien`
-- ----------------------------
DROP TABLE IF EXISTS `su_kien`;
CREATE TABLE `su_kien` (
  `MaSuKien` int(11) NOT NULL,
  `MaGianHang` int(11) NOT NULL,
  `TenSuKien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDungSuKien` text COLLATE utf8_unicode_ci,
  `NgayTao` datetime NOT NULL,
  `NgayBatDau` datetime DEFAULT NULL,
  `NgayKetThuc` datetime DEFAULT NULL,
  `NgayCapNhat` datetime DEFAULT NULL,
  `NguoiCapNhat` int(11) DEFAULT NULL,
  `NgayXoa` datetime DEFAULT NULL,
  `NguoiXoa` int(11) DEFAULT NULL,
  `DaXoa` int(11) NOT NULL,
  `HinhAnh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaSuKien`),
  KEY `FK_Su_Kien_Gian_Hang` (`MaGianHang`),
  CONSTRAINT `FK_Su_Kien_Doi_Tuong` FOREIGN KEY (`MaSuKien`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Su_Kien_Gian_Hang` FOREIGN KEY (`MaGianHang`) REFERENCES `gian_hang` (`MaGianHang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of su_kien
-- ----------------------------
INSERT INTO su_kien VALUES ('14', '3', 'Quốc tế thiếu nhi 1/6 iur389ue9trfkdokf', 'Khuyến mãi nhân dịp quốc tế thiếu nhi 1/6. Giảm giá 50%', '2011-06-15 00:00:00', '2011-05-25 18:18:38', '2011-06-05 18:18:47', null, null, '0000-00-00 00:00:00', '2', '0', 'users/tentaikhoan/december-10-christmas_stuff__70-nocal-1680x1050.jpg');
INSERT INTO su_kien VALUES ('16', '3', '30/4', '30/4 và 1/5. Giảm giá 30%', '2011-06-15 00:00:00', '2011-04-15 18:18:56', '2011-05-11 18:19:05', null, null, '0000-00-00 00:00:00', '2', '0', 'users/tentaikhoan/december-10-christmas_stuff__70-nocal-1680x1050.jpg');
INSERT INTO su_kien VALUES ('26', '3', 'ads foektopek orek5903i jkfe9tu', 'dfs', '2011-06-15 00:00:00', '2011-06-09 00:00:00', '2011-06-21 00:00:00', null, null, '0000-00-00 00:00:00', '2', '0', '');
INSERT INTO su_kien VALUES ('27', '3', 'abc', 'gfgfgfaaaaaaaaaaaaaaaaaaaaaaaa', '2011-06-15 00:00:00', '2011-06-01 00:00:00', '2011-06-22 00:00:00', null, null, null, null, '0', '');
