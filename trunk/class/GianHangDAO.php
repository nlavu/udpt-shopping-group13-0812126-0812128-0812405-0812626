<?php

require_once ('ConnectDB.php');
require_once 'GianHangDTO.php';

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
	 * chưa sắp xếp thứ tự param
	 * Enter description here ...
	 * @param unknown_type $gianHangDto
	 */
	public static function ThemGianHang($gianHangDto)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			/*$strSQL = sprintf("call spThemGianHang()",
				$gianHangDto->MaGianHang,
				$gianHangDto->MaNguoiDung,
				$gianHangDto->TenGianHang,
				$gianHangDto->NgayTao,
				$gianHangDto->LuotXem,
				$gianHangDto->DaXoa,
				$gianHangDto->Theme,
				$gianHangDto->NgayCapNhat, 
				$gianHangDto->NguoiCapNhat, 
				$gianHangDto->NguoiXoa,
				$gianHangDto->NgayXoa);*/ 
			//$result = mysql_query($strSQL, ConnectDB::$mLink);
			$result = mysql_query("
			insert into gian_hang(`MaGianHang`, `MaNguoiDung`, `TenGianHang`, `NgayTao`, `NgayXoa`, `NguoiXoa`, `NgayCapNhat`, `NguoiCapNhat`, `Theme`, `DaXoa`, `LuotXem`)	values(	'$gianHangDto->MaGianHang',
			 				'$gianHangDto->MaNguoiDung',
							'$gianHangDto->TenGianHang',
							'$gianHangDto->NgayTao',
							'$gianHangDto->NgayXoa',
							'$gianHangDto->NguoiXoa',
							'$gianHangDto->NgayCapNhat',
							'$gianHangDto->NguoiCapNhat',
							'$gianHangDto->Theme',
							$gianHangDto->DaXoa,
							$gianHangDto->LuotXem);");			
			ConnectDB::CloseConnection();			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Tìm kiếm gian hàng
	 * chưa sắp xếp thứ tự param
	 * Enter description here ...
	 * @param unknown_type $gianHangDto
	 */
	public static function TimKiemGianHang($TenGianHang, $TenChuGianHang)
	{
		$lstGianHang = array();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("call spTimKiemGianHang()",$TenGianHang, $TenChuGianHang);
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if ($result== false)
			{
				$lstGianHang = array();
				return $lstGianHang;
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
			
		} catch (Exception $e) {
			$lstGianHang = array();
		}
		return $lstGianHang;
	}
	
	/**
	 * Lấy top 5 gian hàng
	 * @param unknown_type $gianHangDto
	 */
	public static function LayTop5GianHang()
	{
		$lstGianHang = array();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("call spLayTop5GianHang()");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if ($result== false)
			{
				$lstGianHang = array();
				return $lstGianHang;
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
			
		} catch (Exception $e) {
			$lstGianHang = array();
		}
		return $lstGianHang;
	}
	
	/**
	 * Lấy tất cả gian hàng xếp theo thứ tự Lượt xem
	 * Enter description here ...
	 * @param unknown_type $gianHangDto
	 */
	public static function LayTatCaGianHang()
	{
		$lstGianHang = array();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("call spLayTatCaGianHang()");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if ($result== false)
			{
				$lstGianHang = array();
				return $lstGianHang;
			}
			
			while ($row = mysql_fetch_row($result))
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
			
		} catch (Exception $e) {
			$lstGianHang = array();
		}
		return $lstGianHang;
	}
	
	/**
	 * Lấy gian hàng theo mã gian hàng
	 * @param unknown_type $gianHangDto
	 */
	public static function LayGianHangTheoMa($maGianHang)
	{
		$gianHangDto = new GianHangDTO();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "SELECT gh.MaGianHang, gh.TenGianHang
					FROM gian_hang gh
					WHERE gh.MaGianHang = $maGianHang AND gh.DaXoa = 0;";
			//echo $strSQL;
			
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if (!$result || mysql_num_rows($result) <= 0)
			{
				return null;
			}
			
			while ($row = mysql_fetch_array($result))
			{				
				$gianHangDto->MaGianHang = $row["MaGianHang"];	
				$gianHangDto->TenGianHang = $row["TenGianHang"];			
			}
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$gianHangDto = null;
		}
		return $gianHangDto;
	}
	
	/**
	 * Cập nhật lượt xem
	 * NHỚ SỬA sp
	 * @param unknown_type $gianHangDto
	 */
	public static function TangLuotXemCuaGianHang()
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("call spTangLuotXemCuaGianHang()");
			$result = mysql_query($strSQL, ConnectDB::$mLink);			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = false;
		}
		return $result;
	}
	/**
	 * Cập nhật gian hàng
	 * chưa sắp xếp thứ tự param
	 * Enter description here ...
	 * @param unknown_type $gianHangDto
	 */
	public static function CapNhatGianHang($gianHangDto)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("call spCapNhatGianHang()",
				$gianHangDto->MaGianHang,				
				$gianHangDto->TenGianHang,				
				$gianHangDto->Theme,				
				$gianHangDto->NgayCapNhat,
				$gianHangDto->NguoiCapNhat);
				
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Xóa gian hàng
	 * chưa sắp xếp thứ tự param + ngày hiện tại
	 * Enter description here ...
	 * @param unknown_type $gianHangDto
	 */
	public static function XoaGianHang($maGianHang, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("call spXoaGianGianHang()",
				$maGianHang,				
				getdate(),
				$maNguoiDung);
				
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	public static function LayMaGianHangTheoUserName($username)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = mysql_query("SELECT gh.MaGianHang, gh.TenGianHang
									FROM nguoi_dung nd, gian_hang gh
									WHERE nd.UserName = '$username' and nd.MaGianHang = gh.MaGianHang and gh.MaNguoiDung = nd.MaNguoiDung
			");
			if(mysql_num_rows($strSQL) == 1)
			{
				$result = true;
			}
			else
			{
				$result = false;
			}
			ConnectDB::CloseConnection();			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	public static function LayGianHangTheoUserName($username)
	{
		$result = true;
		$magianhang = "";
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = mysql_query("SELECT gh.MaGianHang, gh.TenGianHang
									FROM nguoi_dung nd, gian_hang gh
									WHERE nd.UserName = '$username' and nd.MaGianHang = gh.MaGianHang and gh.MaNguoiDung = nd.MaNguoiDung
			");
			if(mysql_num_rows($strSQL) == 1)
			{
				$result = true;
				$rows = mysql_fetch_array($strSQL);
				$magianhang = $rows["MaGianHang"];
			}
			else
			{
				$result = false;
			}
			ConnectDB::CloseConnection();			
		} catch (Exception $e) {
			$result = FALSE;
		}
		if($result == true)
		{
			return $magianhang;
		}
		else
		{
			return $result;
		}
	}
}
?>