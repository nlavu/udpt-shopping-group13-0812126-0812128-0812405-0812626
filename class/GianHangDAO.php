<?php

require_once ('ConnectDB.php');
require_once ('GianHangDTO.php');

/** 
 * @author Thu Ha
 * 
 * 
 */
class GianHangDAO extends ConnectDB {
	//TODO - Insert your code here
	function GianHangDAO()
	{
		
	}
	/**
	 * Thêm gian hàng
	 */
	public static function ThemGianHang($gianHangDto)
	{
		$result = true;
		try 
		{
			if (!ConnectDB::OpenConnection())
				return FALSE;
						
			$strSql = "	
					insert into gian_hang(
					`MaGianHang`, `MaNguoiDung`, `TenGianHang`, `NgayTao`, `NgayXoa`, `NguoiXoa`,
					`NgayCapNhat`, `NguoiCapNhat`, `Theme`, `DaXoa`, `LuotXem`,`ThongTin`)	
					values('$gianHangDto->MaGianHang',
			 				'$gianHangDto->MaNguoiDung',
							'$gianHangDto->TenGianHang',
							'$gianHangDto->NgayTao',
							'$gianHangDto->NgayXoa',
							'$gianHangDto->NguoiXoa',
							'$gianHangDto->NgayCapNhat',
							'$gianHangDto->NguoiCapNhat',
							'$gianHangDto->Theme',
							$gianHangDto->DaXoa,
							$gianHangDto->LuotXem,
							'$gianHangDto->ThongTin');";
							
			$result = mysql_query($strSql, ConnectDB::$mLink);
				
			ConnectDB::CloseConnection();			
		} 
		catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Tìm kiếm gian hàng
	 * edit by Thu Hà 20/6/2011 - CHƯA XONG
	 */
	public static function TimKiemGianHang($TenGianHang, $TenChuGianHang)
	{
		$lstGianHang = array();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			//$strSQL = sprintf("call spTimKiemGianHang()",$TenGianHang, $TenChuGianHang);
			//$result = mysql_query($strSQL, ConnectDB::$mLink);
			if ($result== false)
			{
				return null;
			}
			
			while ($row = mysql_fetch_array($result))
			{
				$gianHangDto = new GianHangDTO();
				$gianHangDto->MaGianHang = $row["MaGianHang"];				
				$gianHangDto->MaNguoiDung = $row["MaNguoiDung"];	
				$gianHangDto->TenGianHang = $row["TenGianHang"];	
				$gianHangDto->NgayTao = $row["NgayTao"];	
				$gianHangDto->LuotXem = $row["LuotXem"];	
				$gianHangDto->DaXoa = $row["DaXoa"];	
				$gianHangDto->Theme = $row["Theme"];	
				$gianHangDto->NgayTao = $row["NgayTao"];	
				$gianHangDto->NgayCapNhat = $row["NgayCapNhat"];	
				$gianHangDto->NguoiCapNhat = $row["NguoiCapNhat"];	
				$gianHangDto->NguoiXoa = $row["NguoiXoa"];	
				$gianHangDto->NgayXoa = $row["NgayXoa"];

				array_push($lstGianHang, $gianHangDto);
			}
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$lstGianHang = null;
		}
		return $lstGianHang;
	}
		
	/**
	 * Lấy tất cả gian hàng xếp theo thứ tự Lượt xem, ngày tạo
	 * edit by Thu Hà 20/6/2011
	 * $number: > 0: số dòng phải lấy ra, = 0: lấy tất cả
	 */
	public static function LayTatCaGianHangTheoNgayTao($number)
	{
		$lstGianHang = array();
		try 
		{
			if (!ConnectDB::OpenConnection())
				return FALSE;
						
			$strSQL = "SELECT * FROM `gian_hang` ORDER BY `LuotXem` DESC, `NgayTao` DESC ";
			if ($number > 0)
				$strSQL .= " LIMIT 0, $number ";
			$strSQL .= " ;";
			
			//echo $strSQL;
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if (!$result || mysql_num_rows($result) <= 0)
			{				
				return null;
			}
			
			while ($row = mysql_fetch_array($result))
			{
				$gianHangDto = new GianHangDTO();
				$gianHangDto->MaGianHang = $row["MaGianHang"];				
				$gianHangDto->MaNguoiDung = $row["MaNguoiDung"];	
				$gianHangDto->TenGianHang = $row["TenGianHang"];
				$gianHangDto->NgayTao = $row["NgayTao"];
				$gianHangDto->NgayXoa = $row["NgayXoa"];
				$gianHangDto->NguoiXoa = $row["NguoiXoa"];		
				$gianHangDto->NgayCapNhat = $row["NgayCapNhat"];	
				$gianHangDto->NguoiCapNhat = $row["NguoiCapNhat"];	
				$gianHangDto->Theme = $row["Theme"];	
				$gianHangDto->DaXoa = $row["DaXoa"];
				$gianHangDto->LuotXem = $row["LuotXem"];	
				$gianHangDto->ThongTin = $row["ThongTin"];
				
				array_push($lstGianHang, $gianHangDto);
			}
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) 
		{
			$lstGianHang = null;
		}
		return $lstGianHang;
	}
	/**
	 * Lấy tất cả gian hàng xếp theo thứ tự Lượt xem, ngày cập nhật
	 * edit by Thu Hà 20/6/2011
	 * $number: > 0: số dòng phải lấy ra, = 0: lấy tất cả
	 */
	public static function LayTatCaGianHangTheoNgayCapNhat($number)
	{
		$lstGianHang = array();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
						
			$strSQL = "SELECT";
			if ($number > 0)
				$strSQL .= " TOP $number ";
			$strSQL .= " * FROM `gian_hang` ORDER BY `LuotXem` DESC, `NgayCapNhat` DESC;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if ($result== false)
			{				
				return null;
			}
			
			while ($row = mysql_fetch_row($result))
			{
				$gianHangDto = new GianHangDTO();
				$gianHangDto->MaGianHang = $row["MaGianHang"];				
				$gianHangDto->MaNguoiDung = $row["MaNguoiDung"];	
				$gianHangDto->TenGianHang = $row["TenGianHang"];
				$gianHangDto->NgayTao = $row["NgayTao"];
				$gianHangDto->NgayXoa = $row["NgayXoa"];
				$gianHangDto->NguoiXoa = $row["NguoiXoa"];		
				$gianHangDto->NgayCapNhat = $row["NgayCapNhat"];	
				$gianHangDto->NguoiCapNhat = $row["NguoiCapNhat"];	
				$gianHangDto->Theme = $row["Theme"];	
				$gianHangDto->DaXoa = $row["DaXoa"];
				$gianHangDto->LuotXem = $row["LuotXem"];	
				$gianHangDto->ThongTin = $row["ThongTin"];
				
				array_push($lstGianHang, $gianHangDto);
			}
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$lstGianHang = array();
		}
		return $lstGianHang;
	}
	/**
	 * Lấy gian hàng theo mã gian hàng
	 * $trangThai: 0 chưa xóa, 1: đã xóa, 2: tất cả 
	 * edit by Thu Hà 20/6/2011
	 */
	public static function LayGianHangTheoMa($maGianHang, $trangThai)
	{
		$gianHangDto = new GianHangDTO();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "SELECT *
					FROM `gian_hang`
					WHERE `MaGianHang` = $maGianHang ";
			if ($trangThai == 2)
			{
				$strSQL .=";";
			}
			else
			{
				$strSQL .=" AND `DaXoa` = $trangThai;";
			}
			//echo $strSQL;
			
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if (!$result || mysql_num_rows($result) != 1)
			{
				return null;
			}
			
			$row = mysql_fetch_array($result);
			
			$gianHangDto->MaGianHang = $row["MaGianHang"];				
			$gianHangDto->MaNguoiDung = $row["MaNguoiDung"];	
			$gianHangDto->TenGianHang = $row["TenGianHang"];
			$gianHangDto->NgayTao = $row["NgayTao"];
			$gianHangDto->NgayXoa = $row["NgayXoa"];
			$gianHangDto->NguoiXoa = $row["NguoiXoa"];		
			$gianHangDto->NgayCapNhat = $row["NgayCapNhat"];	
			$gianHangDto->NguoiCapNhat = $row["NguoiCapNhat"];	
			$gianHangDto->Theme = $row["Theme"];	
			$gianHangDto->DaXoa = $row["DaXoa"];
			$gianHangDto->LuotXem = $row["LuotXem"];	
			$gianHangDto->ThongTin = $row["ThongTin"];			
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$gianHangDto = null;
		}
		return $gianHangDto;
	}
	
	/**
	 * Cập nhật lượt xem
	 * Edit by Thu Hà 20/6/2011
	 */
	public static function TangLuotXemCuaGianHang($maGianHang, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL ="UPDATE `gian_hang` 
					SET `LuotXem` = `LuotXem` + 1, `NguoiCapNhat` = $maNguoiDung, `NgayCapNhat` = now()
					WHERE `MaGianHang` = $maGianHang AND DaXoa = 0;";
			//echo $strSQL;
			$result = mysql_query($strSQL, ConnectDB::$mLink);			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = false;
		}
		return $result;
	}
	/**
	 * Cập nhật gian hàng
	 * Edit by Thu Hà 20/11/2011 - CHƯA XONG
	 */
	public static function CapNhatGianHang($gianHangDto)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "";
				
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Xóa gian hàng
	 * Edit by Thu Hà 20/11/2011
	 */
	public static function XoaGianHang($maGianHang, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "	UPDATE `gian_hang` 
						SET `DaXoa` = 1, `NguoiXoa` = $maNguoiDung, `NgayXoa` = now()
						WHERE `MaGianHang` = $maGianHang;";
				
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
}
?>