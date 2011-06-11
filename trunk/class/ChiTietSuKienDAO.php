<?php

require_once ('ChiTietSuKienDTO.php');
require_once ('ConnectDB.php');

/** 
 * @author Anh Vu
 * 
 * 
 */
class ChiTietSuKienDAO extends ConnectDB {
	//TODO - Insert your code here
	function ChiTietSuKienDAO(){
		
	}
	
	/**
	 * Thêm chi tiết sự kiện
	 */
	public static function ThemChiTietSuKien($chiTietSuKien)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			
			$strSql = sprintf("call spThemChiTietSuKien(%d, %d, %d, N'%s')",$chiTietSuKien->MaSuKien, $chiTietSuKien->Ma, $chiTietSuKien->PhanTram_GiaGiam, $chiTietSuKien->QuaTang);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}

	/**
	 * Cập Nhật Chi Tiết Sự Kiện
	 */
	public static function CapNhatChiTietSuKien($chiTietSuKien)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			
			$strSql = sprintf("call spCapNhatChiTietSuKien(%d, %d, N'%s')",$chiTietSuKien->MaSuKien, $chiTietSuKien->PhanTram_GiaGiam, $chiTietSuKien->QuaTang);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Xoá Chi Tiết Sự Kiện
	 */
	public static function XoaChiTietSuKien($chiTietSuKien)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			
			$strSql = sprintf("call spXoaChiTietSuKien(%d)",$chiTietSuKien->MaSuKien);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy DS Chi Tiết Sự Kiện Theo Mã Sự Kiện
	 */
	public static function LayDSChiTietSuKien_TheoMaSK($maSuKien)
	{
		$chiTietSuKienDto = new ChiTietSuKienDTO();
			try 
			{
				if (!ConnectDB::OpenConnection())
					return false;
					
				$strSQL = sprintf("call spLayDanhSachCTSK_TheoMaSK(%d)",$maSuKien);
				$result = mysql_query($strSQL, ConnectDB::$mLink);
				if($result == false)
				{
					$chiTietSuKienDto = new ChiTietSuKienDTO();
					return $chiTietSuKienDto;
				}
				
				while ($row = mysql_fetch_array($result))
				{
					$chiTietSuKienDto->MaSuKien = $row["MaSuKien"];
					$chiTietSuKienDto->Ma = $row["Ma"];
					$chiTietSuKienDto->PhanTram_GiaGiam = $row["PhanTram_GiaGiam"];
					$chiTietSuKienDto->QuaTang = $row["QuaTang"];
				}
				ConnectDB::CloseConnection();				
				
			} catch (Exception $e) {
				$chiTietSuKien = new ChiTietSuKienDTO();
		}
		return $chiTietSuKienDto;
	}
	
/**
	 * Lấy DS Chi Tiết Sự Kiện Theo Mã Sản Phẩm
	 */
	public static function LayDSChiTietSuKien_TheoMaSP($maSanPham)
	{
		$chiTietSuKienDto = new ChiTietSuKienDTO();
			try 
			{
				if (!ConnectDB::OpenConnection())
					return false;
					
				$strSQL = sprintf("call spLayDanhSachCTSK_TheoMaSK(%d)",$maSanPham);
				$result = mysql_query($strSQL, ConnectDB::$mLink);
				if($result == false)
				{
					$chiTietSuKienDto = new ChiTietSuKienDTO();
					return $chiTietSuKienDto;
				}
				while ($row = mysql_fetch_array($result))
				{
					$chiTietSuKienDto->MaSuKien = $row["MaSuKien"];
					$chiTietSuKienDto->Ma = $row["Ma"];
					$chiTietSuKienDto->PhanTram_GiaGiam = $row["PhanTram_GiaGiam"];
					$chiTietSuKienDto->QuaTang = $row["QuaTang"];
				}
				ConnectDB::CloseConnection();				
				
			} catch (Exception $e) {
				$chiTietSuKien = new ChiTietSuKienDTO();
		}
		return $chiTietSuKienDto;
	}
}

?>