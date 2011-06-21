<?php

require_once ('ConnectDB.php');
require_once ('SuKienDTO.php');

class SuKienDAO extends ConnectDB {
	function SuKienDAO(){
		
	}
	
	/**
	 * Thêm sự kiện
	 * Enter description here ...
	 */
	public static function ThemSuKien($suKienDto)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "INSERT INTO su_kien (MaSuKien, MaGianHang, TenSuKien, HinhAnh, NoiDungSuKien,NgayTao, NgayBatDau, NgayKetThuc, NgayCapNhat, NguoiCapNhat, NgayXoa, NguoiXoa,DaXoa)
								VALUES('$suKienDto->MaSuKien',
										'$suKienDto->MaGianHang',
										N'$suKienDto->TenSuKien',
										'$suKienDto->HinhAnh',
										N'$suKienDto->NoiDungSuKien',
										'$suKienDto->NgayTao',
										'$suKienDto->NgayBatDau',
										'$suKienDto->NgayKetThuc',
										NULL, NULL, NULL, NULL,
										'$suKienDto->DaXoa');";
			//echo $strSQL;
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
/**
	 * Cập nhật sự kiện
	 * Edit by Thu Hà 20/6/2011	 
	 */
	public static function CapNhatThongTinSuKien($maSuKien, $tenSuKien, $hinhAnh, $ngayBatDau, $ngayKetThuc, $ngayCapNhat, $nguoiCapNhat)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "UPDATE su_kien  as sk 
						SET sk.TenSuKien = N'$tenSuKien', sk.HinhAnh = '$hinhAnh',
							sk.NgayBatDau = '$ngayBatDau', sk.NgayKetThuc= '$ngayKetThuc', 
							sk.NgayCapNhat = '$ngayCapNhat', sk.NguoiCapNhat = NguoiCapNhat
						WHERE sk.MaSuKien = $maSuKien AND sk.DaXoa = 0;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Xóa xự kiện
	 * Edit by Thu Hà 20/6/2011	 
	 */
	public static function XoaSuKien($maSuKien, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "UPDATE su_kien as sk 
						SET sk.DaXoa = 1, sk.NgayXoa = now() , sk.NguoiXoa = $maNguoiDung 
						WHERE sk.MaSuKien = $maSuKien;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			//echo $strSQL;
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
				$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy ds sự kiện
	 * $tinhTrang = 1: đã xóa, 0 chưa xóa, 2 tất cả
	 * Edit by Thu Hà 20/6/2011	  
	 */
	public  static  function LayDanhSachSuKien($tinhTrang)
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from Su_Kien";
			if ($tinhTrang != 2)
			{
				$strSQL .= " WHERE DaXoa = $tinhTrang";
			}
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSuKien = null;
				
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
				
				
				array_push($lstSuKien, $suKienDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSuKien = null;
		}
		return $lstSuKien;
	}
	
	/**
	 * Lay su kien theo ma su kien
	 */
	public  static  function LaySuKienTheoMaSuKien($maSuKien)
	{
		$suKienDto = new SuKienDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return;
				
			$strSQL = "select * from Su_Kien sk where sk.MaSuKien = $maSuKien AND sk.DaXoa = 0;";
			//echo $strSQL;
			
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
			{
				return null;
			}
			if (mysql_num_rows($result) <= 0)
			{
				return null;
			}
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
					
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$suKienDto = null;
		}
		return $suKienDto;
	}
	
	/**
	 * Lấy danh sách sự kiện theo gian hàng
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSuKienTheoGianHang($maGianHang)
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "	select * from Su_Kien sk 
					   	where sk.MaGianHang = $maGianHang  AND sk.DaXoa = 0
						ORDER BY sk.NgayBatDau DESC;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				return null;
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
				
				
				array_push($lstSuKien, $suKienDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSuKien = null;
		}
		return $lstSuKien;
	}
	
	/**
	 * Lấy ds sự kiện theo tên sự kiện
	 */
	public  static  function LayDanhSachSuKienTheoTenSuKien($tenSuKien)
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from Su_Kien sk where sk.TenSuKien like $tenSuKien;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			if(!$result)
				return null;
				
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
			
		} 
		catch (Exception $e) {
			$lstSuKien = null;
		}
		return $lstSuKien;
	}
	
	/**
	 * Lấy ds sự kiện trong khoảng thời gian
	 * Edit by Thu Hà 20/6/2011	 
	 */
	public  static  function LayDanhSachSuKienTrongKhoangThoiGian($thoiGianBD, $thoiGianKT)
	{
		$lstSuKien = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "SELECT * FROM su_kien 
						WHERE DATEDIFF(su_kien.NgayBatDau,$thoiGianBD)<=0 
						and DATEDIFF(su_kien.NgayKetThuc,$thoiGianKT) >=0
						AND su_kien.DaXoa = 0;";
						
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			if(!$result)
				return null;
				
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
			
		} 
		catch (Exception $e) {
			$lstSuKien = null;
		}
		return $lstSuKien;
	}
}

?>