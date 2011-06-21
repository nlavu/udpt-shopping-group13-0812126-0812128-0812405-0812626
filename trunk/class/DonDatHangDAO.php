<?php

require_once ('DonDatHangDTO.php');
require_once ('ConnectDB.php');

/** 
 * @author Anh Vu
 * 
 * 
 */
class DonDatHangDAO extends ConnectDB {
	//TODO - Insert your code here
	function DonDatHangDAO(){
		
	}
	
	/**
	 * Thêm đơn đặt hàng
	 * Edit Thu Hà 20/6/2011
	 */
	public static function ThemDonDatHang($donDatHang)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}			
			
			$strSql = "INSERT INTO `don_dat_hang` 
					(`MaDDH`, `MaGianHang`,`MaNguoiDung`, `TrangThai`, `GhiChu`, `NgayDat`, `NgayHuy`, `TongSoTien`) 
					VALUES ($donDatHang->MaDDH,						
						$donDatHangDto->MaGianHang,
						$donDatHang->MaNguoiDung,
						$donDatHang->TrangThai,
						'$donDatHang->GhiChu',
						'$donDatHang->NgayDat',
						'',
						$donDatHang->TongSoTien);";
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Cập Nhật Trạng Thái
	 * Edit by Thu Hà 20/6/2011
	 * $trangThai: 1-chờ xử lý, 2-đã liên hệ, 3-đã hoàn tất, 4-hủy
	 */
	public static function CapNhatTrangThaiDDH($maDDH, $trangThai)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				return false;
			}
			
			$strSql = "UPDATE `don_dat_hang` 
					 	SET `TrangThai` = $trangThai";
			if ($trangThai == 4)
				$strSql .= ", `NgayHuy`= now()";
			$strSql .="WHERE `MaDDH`=  $maDDH;";
									
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	/**
	 * Lấy DDH theo mã DDH
	 * Thu Hà 20/6/2011
	 */
	public static function LayDDHTheoMaDDH($maDDH)
	{
		$donDatHangDto = new DonDatHangDTO();
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				return false;
			}
			
			$strSql = "SELECT * FROM `don_dat_hang` 
					   WHERE `MaDDH` = $maDDH;";
												
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			if (!$result || mysql_num_rows($result) != 1)
				return null;
			$row = mysql_fetch_array($result);			
				
			$donDatHangDto->MaDDH = $row["MaDDH"];				
			$donDatHangDto->MaGianHang = $row["MaGianHang"];
			$donDatHangDto->MaNguoiDung = $row["MaNguoiDung"];
			$donDatHangDto->TrangThai = $row["TrangThai"];
			$donDatHangDto->GhiChu = $row["GhiChu"];
			$donDatHangDto->NgayDat = $row["NgayDat"];
			$donDatHangDto->NgayHuy = $row["NgayHuy"];
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$donDatHangDto = null;
		}
		return $donDatHangDto;
	}
	/**
	 * Lấy ds DDH của một tài khoản nào đó.
	 * Thu Hà 20/6/2011
	 */
	public static function LayDSDDHTheoMaNguoiDung($maNguoiDung)
	{
		$dsDDH = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				return false;
			}
			
			$strSql = "SELECT * FROM `don_dat_hang` 
					   WHERE `MaNguoiDung` = $maNguoiDung;";
												
			$result = mysql_query($strSql, ConnectDB::$mLink);
			if (!$result)
				return null;
			while($row = mysql_fetch_array($result))
			{
				$donDatHangDto = new DonDatHangDTO();
				$donDatHangDto->MaDDH = $row["MaDDH"];				
				$donDatHangDto->MaGianHang = $row["MaGianHang"];
				$donDatHangDto->MaNguoiDung = $row["MaNguoiDung"];
				$donDatHangDto->TrangThai = $row["TrangThai"];
				$donDatHangDto->GhiChu = $row["GhiChu"];
				$donDatHangDto->NgayDat = $row["NgayDat"];
				$donDatHangDto->NgayHuy = $row["NgayHuy"];
				
				array_push($dsDDH, $donDatHangDto);
			}
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$dsDDH = null;
		}
		return $dsDDH;
	}
	/**
	 * Lấy ds DDH của một gian hàng, sắp theo thứ tự thời gian giảm dần
	 * tùy chọn  $trangThai: 1-chờ xử lý, 2-đã liên hệ, 3-đã hoàn tất, 4-hủy, 0- lấy tất cả
	 * Thu Hà 20/6/2011
	 */
	public static function LayDSDDHTheoMaDDH_TrangThai($maGianHang, $trangThai)
	{
		$dsDDH = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				return false;
			}
			
			$strSql = "SELECT * FROM `don_dat_hang` 
					   WHERE `MaGianHang`= $maGianHang";
			if ($trangThai == 0)
			{
				$strSql = ";";
			}
			else
			{
				$strSql = "AND TrangThai = $trangThai;";
			}
												
			$result = mysql_query($strSql, ConnectDB::$mLink);
			if (!$result)
				return null;
			while($row = mysql_fetch_array($result))
			{
				$donDatHangDto = new DonDatHangDTO();
				$donDatHangDto->MaDDH = $row["MaDDH"];
				$donDatHangDto->MaGianHang = $row["MaGianHang"];
				$donDatHangDto->MaNguoiDung = $row["MaNguoiDung"];
				$donDatHangDto->TrangThai = $row["TrangThai"];
				$donDatHangDto->GhiChu = $row["GhiChu"];
				$donDatHangDto->NgayDat = $row["NgayDat"];
				$donDatHangDto->NgayHuy = $row["NgayHuy"];
				
				array_push($dsDDH, $donDatHangDto);
			}
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$dsDDH = null;
		}
		return $dsDDH;
	}
}

?>