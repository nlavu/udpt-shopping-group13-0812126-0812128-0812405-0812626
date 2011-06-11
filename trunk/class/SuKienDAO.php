<?php

require_once ('ConnectDB.php');

class SuKienDAO extends ConnectDB {
	function SuKienDAO(){
		
	}
	
/**
	 * ThÃªm sá»± kiá»‡n
	 * Enter description here ...
	 */
	public static function ThemSuKien($suKienDto)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("INSERT INTO su_kien (MaSuKien, MaGianHang, TenSuKien, HinhAnh, NoiDungSuKien,
									NgayTao, NgayBatDau, NgayKetThuc)
								VALUES($suKienDto->MaSuKien,
										$suKienDto->MaGianHang,
										$suKienDto->TenSuKien,
										$suKienDto->HinhAnh,
										$suKienDto->NoiDungSuKien,
										$suKienDto->NgayTao,
										$suKienDto->NgayBatDau,
										$suKienDto->NgayKetThuc);");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
/**
	 * Cáº­p nháº­t thÃ´ng tin sá»± kiá»‡n
	 * Enter description here ...
	 */
	public static function CapNhatThongTinSuKien($maSuKien, $tenSuKien, $hinhAnh, $ngayBatDau, $ngayKetThuc, $ngayCapNhat, $nguoiCapNhat)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("UPDATE su_kien  as sk set sk.TenSuKien = $tenSuKien, sk.HinhAnh = $hinhAnh,
									sk.NgayBatDau = $ngayBatDau, sk.NgayKetThuc= $ngayKetThuc, sk.NgayCapNhat = $ngayCapNhat, sk.NguoiCapNhat = NguoiCapNhat
								WHERE sk.MaSuKien = $maSuKien;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * XÃ³a sá»± kiá»‡n
	 * Enter description here ...
	 */
	public static function XoaSuKien($maSuKien, $ngayXoa, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("UPDATE su_kien as sk set sk.DaXoa = 1, sk.NgayXoa = $ngayXoa, sk.NguoiXoa = $maNguoiDung
								where sk.MaSuKien = $maSuKien;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
				$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Láº¥y danh sÃ¡ch sá»± kiá»‡n
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSuKien()
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("select * fron Su_Kien");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSuKien = array();
			while ($row = mysql_fetch_array($result) )
			{
				$suKienDto = new SuKienDTO();
				$suKienDto->MaSuKien = $row["MaSuKien"];
				$suKienDto->MaGianHang = $row["MaGianHang"];
				$suKienDto->TenSuKien = $row["TenSuKien"];
				$suKienDto->HinhAnh = $row["HinhAnh"];
				$suKienDto->NoiDungSuKien = $row["NoiDungSuKien"];
				$suKienDto->NgayTao = $row["NgayTao"];
				$suKienDto->NgayBatDau = $row["NgayBatDau"];
				$suKienDto->NgayKetThuc = $row["NgayKetThuc"];
				$suKienDto->NgayCapNhat = $row["NgayCapNhat"];
				$suKienDto->NguoiCapNhat = $row["NguoiCapNhat"];
				$suKienDto->NgayXoa = $row["NgayXoa"];
				$suKienDto->NguoiXoa = $row["NguoiXoa"];
				$suKienDto->DaXoa = $row["DaXoa"];
				
				
				array_push($lstSuKien, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSuKien = array();
		}
		return $lstSuKien;
	}
	
	/**
	 * Láº¥y sá»± kiá»‡n theo mÃ£ sá»± kiá»‡n
	 * 
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSuKienTheoMaSuKien($maSuKien)
	{
		$suKienDto = new SuKienDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return;
				
			$strSQL = sprintf("select * from Su_Kien sk where sk.MaSuKien = $maSuKien);");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$suKienDto = new SuKienDTO();
			while ($row = mysql_fetch_array($result) )
			{
				
				$suKienDto->MaSuKien = $row["MaSuKien"];
				$suKienDto->MaGianHang = $row["MaGianHang"];
				$suKienDto->TenSuKien = $row["TenSuKien"];
				$suKienDto->HinhAnh = $row["HinhAnh"];
				$suKienDto->NoiDungSuKien = $row["NoiDungSuKien"];
				$suKienDto->NgayTao = $row["NgayTao"];
				$suKienDto->NgayBatDau = $row["NgayBatDau"];
				$suKienDto->NgayKetThuc = $row["NgayKetThuc"];
				$suKienDto->NgayCapNhat = $row["NgayCapNhat"];
				$suKienDto->NguoiCapNhat = $row["NguoiCapNhat"];
				$suKienDto->NgayXoa = $row["NgayXoa"];
				$suKienDto->NguoiXoa = $row["NguoiXoa"];
				$suKienDto->DaXoa = $row["DaXoa"];
				
				
				array_push($lstSuKien, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSuKien = array();
		}
		return $lstSuKien;
	}
	
	/**
	 * Láº¥y danh sÃ¡ch sá»± kiá»‡n theo gian hÃ ng
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSuKienTheoGianHang($maGianHang)
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("select * from Su_Kien sk where sk.MaGianHang = $maGianHang;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSuKien = array();
			while ($row = mysql_fetch_array($result) )
			{
				$suKienDto = new SuKienDTO();
				$suKienDto->MaSuKien = $row["MaSuKien"];
				$suKienDto->MaGianHang = $row["MaGianHang"];
				$suKienDto->TenSuKien = $row["TenSuKien"];
				$suKienDto->HinhAnh = $row["HinhAnh"];
				$suKienDto->NoiDungSuKien = $row["NoiDungSuKien"];
				$suKienDto->NgayTao = $row["NgayTao"];
				$suKienDto->NgayBatDau = $row["NgayBatDau"];
				$suKienDto->NgayKetThuc = $row["NgayKetThuc"];
				$suKienDto->NgayCapNhat = $row["NgayCapNhat"];
				$suKienDto->NguoiCapNhat = $row["NguoiCapNhat"];
				$suKienDto->NgayXoa = $row["NgayXoa"];
				$suKienDto->NguoiXoa = $row["NguoiXoa"];
				$suKienDto->DaXoa = $row["DaXoa"];
				
				
				array_push($lstSuKien, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSuKien = array();
		}
		return $lstSuKien;
	}
	
	/**
	 * Láº¥y danh sÃ¡ch sá»± kiá»‡n theo tÃªn sá»± kiá»‡n
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSuKienTheoTenSuKien($tenSuKien)
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("select * from Su_Kien sk where sk.TenSuKien like $tenSuKien;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSuKien = array();
			while ($row = mysql_fetch_array($result) )
			{
				$suKienDto = new SuKienDTO();
				$suKienDto->MaSuKien = $row["MaSuKien"];
				$suKienDto->MaGianHang = $row["MaGianHang"];
				$suKienDto->TenSuKien = $row["TenSuKien"];
				$suKienDto->HinhAnh = $row["HinhAnh"];
				$suKienDto->NoiDungSuKien = $row["NoiDungSuKien"];
				$suKienDto->NgayTao = $row["NgayTao"];
				$suKienDto->NgayBatDau = $row["NgayBatDau"];
				$suKienDto->NgayKetThuc = $row["NgayKetThuc"];
				$suKienDto->NgayCapNhat = $row["NgayCapNhat"];
				$suKienDto->NguoiCapNhat = $row["NguoiCapNhat"];
				$suKienDto->NgayXoa = $row["NgayXoa"];
				$suKienDto->NguoiXoa = $row["NguoiXoa"];
				$suKienDto->DaXoa = $row["DaXoa"];
				
				
				array_push($lstSuKien, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSuKien = array();
		}
		return $lstSuKien;
	}
	
/**
	 * Láº¥y danh sÃ¡ch sá»± kiá»‡n tromg khoáº£ng thá»�i gian
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSuKienTrongKhoangThoiGian($thoiGianBD, $thoiGianKT)
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("SELECT * FROM su_kien WHERE DATEDIFF(su_kien.NgayBatDau,$thoiGianBD)<=0 and DATEDIFF(su_kien.NgayKetThuc,$thoiGianKT) >=0;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSuKien = array();
			while ($row = mysql_fetch_array($result) )
			{
				$suKienDto = new SuKienDTO();
				$suKienDto->MaSuKien = $row["MaSuKien"];
				$suKienDto->MaGianHang = $row["MaGianHang"];
				$suKienDto->TenSuKien = $row["TenSuKien"];
				$suKienDto->HinhAnh = $row["HinhAnh"];
				$suKienDto->NoiDungSuKien = $row["NoiDungSuKien"];
				$suKienDto->NgayTao = $row["NgayTao"];
				$suKienDto->NgayBatDau = $row["NgayBatDau"];
				$suKienDto->NgayKetThuc = $row["NgayKetThuc"];
				$suKienDto->NgayCapNhat = $row["NgayCapNhat"];
				$suKienDto->NguoiCapNhat = $row["NguoiCapNhat"];
				$suKienDto->NgayXoa = $row["NgayXoa"];
				$suKienDto->NguoiXoa = $row["NguoiXoa"];
				$suKienDto->DaXoa = $row["DaXoa"];
				
				
				array_push($lstSuKien, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSuKien = array();
		}
		return $lstSuKien;
	}
}

?>