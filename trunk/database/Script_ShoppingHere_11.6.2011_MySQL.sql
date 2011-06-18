-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2011 at 03:55 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping_here`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE IF NOT EXISTS binh_luan (
  MaBL int(11) NOT NULL,
  NoiDungBL varchar(200) NOT NULL,
  NguoiBL int(11) NOT NULL,
  NgayBL datetime NOT NULL,
  DaXoa int(11) NOT NULL,
  NgayXoa datetime DEFAULT NULL,
  DoiTuongBL int(11) NOT NULL,
  PRIMARY KEY (MaBL),
  KEY FK_Binh_Luan_Doi_Tuong (DoiTuongBL),
  KEY FK_Binh_Luan_Nguoi_Dung1 (NguoiBL)
);

--
-- Dumping data for table `binh_luan`
--


-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_dat_hang`
--

CREATE TABLE IF NOT EXISTS chi_tiet_dat_hang (
  MaDDH int(11) NOT NULL,
  MaSanPham int(11) NOT NULL,
  SoLuong int(11) DEFAULT NULL,
  DonGiaMua char(10) DEFAULT NULL,
  ThanhTien char(10) DEFAULT NULL,
  PRIMARY KEY (MaDDH,MaSanPham),
  KEY FK_Chi_Tiet_Dat_Hang_San_Pham (MaSanPham)
);

--
-- Dumping data for table `chi_tiet_dat_hang`
--


-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_su_kien`
--

CREATE TABLE IF NOT EXISTS chi_tiet_su_kien (
  MaSuKien int(11) NOT NULL,
  Ma int(11) NOT NULL,
  PhanTram_GiaGiam char(10) DEFAULT NULL,
  QuaTang char(10) DEFAULT NULL,
  PRIMARY KEY (MaSuKien,Ma),
  KEY FK_Chi_Tiet_Su_Kien_San_Pham (Ma)
);

--
-- Dumping data for table `chi_tiet_su_kien`
--


-- --------------------------------------------------------

--
-- Table structure for table `dang_ki_nhan_thong_tin`
--

CREATE TABLE IF NOT EXISTS dang_ki_nhan_thong_tin (
  MaGianHang int(11) NOT NULL,
  MaNguoiDung int(11) NOT NULL,
  NgayDangKy char(10) DEFAULT NULL,
  HuyDangKy int(11) DEFAULT NULL,
  PRIMARY KEY (MaGianHang,MaNguoiDung)
);

--
-- Dumping data for table `dang_ki_nhan_thong_tin`
--


-- --------------------------------------------------------

--
-- Table structure for table `doi_tuong`
--

CREATE TABLE IF NOT EXISTS doi_tuong (
  MaDoiTuong int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (MaDoiTuong)
) AUTO_INCREMENT=1 ;

--
-- Dumping data for table `doi_tuong`
--


-- --------------------------------------------------------

--
-- Table structure for table `don_dat_hang`
--

CREATE TABLE IF NOT EXISTS don_dat_hang (
  MaDDH int(11) NOT NULL,
  MaNguoiDung int(11) NOT NULL,
  TrangThai int(11) DEFAULT NULL,
  GhiChu varchar(100) DEFAULT NULL,
  NgayDat datetime NOT NULL,
  NgayHuy datetime DEFAULT NULL,
  TongSoTien double DEFAULT NULL,
  PRIMARY KEY (MaDDH),
  KEY FK_Don_Dat_Hang_Nguoi_Dung (MaNguoiDung)
);

--
-- Dumping data for table `don_dat_hang`
--


-- --------------------------------------------------------

--
-- Table structure for table `gian_hang`
--

CREATE TABLE IF NOT EXISTS gian_hang (
  MaGianHang int(11) NOT NULL,
  MaNguoiDung int(11) NOT NULL,
  TenGianHang varchar(100) DEFAULT NULL,
  NgayTao datetime DEFAULT NULL,
  NgayXoa datetime DEFAULT NULL,
  NguoiXoa int(11) DEFAULT NULL,
  NgayCapNhat datetime DEFAULT NULL,
  NguoiCapNhat int(11) DEFAULT NULL,
  Theme varchar(100) DEFAULT NULL,
  DaXoa int(11) NOT NULL,
  LuotXem INT(10) DEFAULT NULL,
  PRIMARY KEY (MaGianHang),
  KEY FK_Gian_Hang_Nguoi_Dung (MaNguoiDung)
);

--
-- Dumping data for table `gian_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

CREATE TABLE IF NOT EXISTS loai_san_pham (
	MaLoaiSP INT(11) NOT NULL AUTO_INCREMENT,
	TenLoaiSP VARCHAR(50) DEFAULT NULL,
	MaGianHang INT (11) NOT NULL,
	PRIMARY KEY (MaLoaiSP)
) AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gian_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `loai_nguoi_dung`
--

CREATE TABLE IF NOT EXISTS loai_nguoi_dung (
  MaLoaiND int(11) NOT NULL AUTO_INCREMENT,
  LoaiNguoiDung varchar(50) DEFAULT NULL,
  PRIMARY KEY (MaLoaiND)
) AUTO_INCREMENT=1 ;

--
-- Dumping data for table `loai_nguoi_dung`
--


-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE IF NOT EXISTS nguoi_dung (
  MaNguoiDung int(11) NOT NULL,
  MaLoaiND int(11) NOT NULL,
  MaGianHang int(11) DEFAULT NULL,
  UserName VARCHAR(20) NOT NULL,
  HoTen varchar(30) NOT NULL,
  NgaySinh datetime NOT NULL,
  GioiTinh int(11) NOT NULL,
  DiaChi varchar(100) DEFAULT NULL,
  MatKhau varchar(32) NOT NULL,
  Email varchar(50) NOT NULL,
  TinhTrang int(11) NOT NULL,
  AnhDaiDien varchar(50) DEFAULT NULL,
  PRIMARY KEY (MaNguoiDung),
  KEY FK_Nguoi_Dung_Loai_Nguoi_Dung (MaLoaiND)
);

--
-- Dumping data for table `nguoi_dung`
--

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE IF NOT EXISTS san_pham (
  Ma int(11) NOT NULL,
  MaSanPham varchar(20) DEFAULT NULL,
  TenSanPham varchar(50) NOT NULL,
  SoLuongTon int(11) NOT NULL,
  DonGiaGoc double NOT NULL,
  DonGiaBan double DEFAULT NULL,
  DacDiemSP text,
  NgayDang datetime NOT NULL,
  NgayCapNhat datetime DEFAULT NULL,
  NguoiCapNhat int(11) DEFAULT NULL,
  DaXoa int(11) DEFAULT NULL,
  NguoiXoa int(11) DEFAULT NULL,
  NgayXoa char(10) DEFAULT NULL,
  DanhGia double DEFAULT NULL,
  HinhAnh varchar(50) DEFAULT NULL,
  MaLoaiSP INT(11) DEFAULT NULL,
  PRIMARY KEY (Ma)
);

--
-- Dumping data for table `san_pham`
--

-- --------------------------------------------------------

--
-- Table structure for table `su_kien`
--

CREATE TABLE IF NOT EXISTS su_kien (
  MaSuKien int(11) NOT NULL,
  MaGianHang int(11) NOT NULL,
  TenSuKien varchar(100) NOT NULL,
  NoiDungSuKien text,
  NgayTao datetime NOT NULL,
  NgayBatDau datetime DEFAULT NULL,
  NgayKetThuc datetime DEFAULT NULL,
  NgayCapNhat datetime DEFAULT NULL,
  NguoiCapNhat int(11) DEFAULT NULL,
  NgayXoa datetime DEFAULT NULL,
  NguoiXoa int(11) DEFAULT NULL,
  DaXoa int(11) NOT NULL,
  PRIMARY KEY (MaSuKien),
  KEY FK_Su_Kien_Gian_Hang (MaGianHang)
);

--
-- Dumping data for table `su_kien`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT FK_Binh_Luan_Doi_Tuong FOREIGN KEY (DoiTuongBL) REFERENCES doi_tuong (MaDoiTuong) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_Binh_Luan_Nguoi_Dung1 FOREIGN KEY (NguoiBL) REFERENCES nguoi_dung (MaNguoiDung) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chi_tiet_dat_hang`
--
ALTER TABLE `chi_tiet_dat_hang`
  ADD CONSTRAINT FK_Chi_Tiet_Dat_Hang_San_Pham FOREIGN KEY (MaSanPham) REFERENCES san_pham (Ma) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_Chi_Tiet_Dat_Hang_Don_Dat_Hang FOREIGN KEY (MaDDH) REFERENCES don_dat_hang (MaDDH) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chi_tiet_su_kien`
--
ALTER TABLE `chi_tiet_su_kien`
  ADD CONSTRAINT FK_Chi_Tiet_Su_Kien_San_Pham FOREIGN KEY (Ma) REFERENCES san_pham (Ma) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_Chi_Tiet_Su_Kien_Su_Kien FOREIGN KEY (MaSuKien) REFERENCES su_kien (MaSuKien) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `don_dat_hang`
--
ALTER TABLE `don_dat_hang`
  ADD CONSTRAINT FK_Don_Dat_Hang_Nguoi_Dung FOREIGN KEY (MaNguoiDung) REFERENCES nguoi_dung (MaNguoiDung) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_Don_Dat_Hang_Doi_Tuong FOREIGN KEY (MaDDH) REFERENCES doi_tuong (MaDoiTuong) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gian_hang`
--
ALTER TABLE `gian_hang`
  ADD CONSTRAINT FK_Gian_Hang_Nguoi_Dung FOREIGN KEY (MaNguoiDung) REFERENCES nguoi_dung (MaNguoiDung) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_Gian_Hang_Doi_Tuong FOREIGN KEY (MaGianHang) REFERENCES doi_tuong (MaDoiTuong) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT FK_Nguoi_Dung_Loai_Nguoi_Dung FOREIGN KEY (MaLoaiND) REFERENCES loai_nguoi_dung (MaLoaiND) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_Nguoi_Dung_DoiTuong FOREIGN KEY (MaNguoiDung) REFERENCES doi_tuong (MaDoiTuong) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD CONSTRAINT FK_LoaiSP_GianHang FOREIGN KEY (MaGianHang) REFERENCES gian_hang (MaGianHang) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT FK_San_Pham_Doi_Tuong FOREIGN KEY (Ma) REFERENCES doi_tuong (MaDoiTuong) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_San_Pham_Loai_SP1 FOREIGN KEY (MaLoaiSP) REFERENCES loai_san_pham (MaLoaiSP) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `su_kien`
--
ALTER TABLE `su_kien`
  ADD CONSTRAINT FK_Su_Kien_Gian_Hang FOREIGN KEY (MaGianHang) REFERENCES gian_hang (MaGianHang) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT FK_Su_Kien_Doi_Tuong FOREIGN KEY (MaSuKien) REFERENCES doi_tuong (MaDoiTuong) ON DELETE NO ACTION ON UPDATE NO ACTION;

 ALTER TABLE `nguoi_dung` ADD UNIQUE (
`UserName`
 );
 
 ALTER TABLE `nguoi_dung` ADD UNIQUE (
`Email`
 );
 
ALTER TABLE `doi_tuong` ADD `TenDoiTuong` VARCHAR( 30 ) NOT NULL AFTER `MaDoiTuong` ;
 
ALTER TABLE `san_pham` ADD `LuotXem` INT( 11 ) NOT NULL AFTER `HinhAnh` 
 
--Thu Hà 11.6.2011
-- ALTER TABLE `don_dat_hang` CHANGE `MaDDH` `MaDDH` INT( 11 ) NOT NULL AUTO_INCREMENT
 
ALTER TABLE `san_pham` DROP `MaSanPham`

--Thu Hà 11.6.2011
ALTER TABLE `su_kien`
ADD COLUMN `HinhAnh`  varchar(100) NULL AFTER `DaXoa`;

--Thu Hà 11.6.2011
ALTER TABLE `gian_hang`
ADD COLUMN `Slogan`  varchar(200) NOT NULL AFTER `LuotXem`,
ADD COLUMN `DiaChi`  varchar(100) NOT NULL AFTER `Slogan`,
ADD COLUMN `ThongTin`  text NULL AFTER `DiaChi`;
--Thu Hà 15.6.2011
ALTER TABLE `san_pham`
CHANGE COLUMN `SoLuongTon` `SoLuong`  int(11) NOT NULL AFTER `TenSanPham`,
MODIFY COLUMN `NgayXoa`  datetime NULL DEFAULT NULL AFTER `NguoiXoa`;

CREATE TABLE `Likes` (
`MaDoiTuong`  int NOT NULL ,
`MaNguoiDung`  int NOT NULL ,
`SoSao`  int NOT NULL ,
PRIMARY KEY (`MaDoiTuong`, `MaNguoiDung`),
CONSTRAINT `FK_LIKE_DoiTuong` FOREIGN KEY (`MaDoiTuong`) REFERENCES `doi_tuong` (`MaDoiTuong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `FK_LIKE_NguoiDung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoi_dung` (`MaNguoiDung`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
--Thu Hà 16.6.2011
ALTER TABLE `nguoi_dung`
MODIFY COLUMN `AnhDaiDien`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL AFTER `TinhTrang`;






