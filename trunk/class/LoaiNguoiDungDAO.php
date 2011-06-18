<?php

require_once ('ConnectDB.php');
require_once 'LoaiNguoiDungDTO.php';
/** 
 * @author Thu Ha
 * 
 * 
 */
class LoaiDoiTuongDAO extends ConnectDB {
	//TODO - Insert your code here

	function LoaiNguoiDungDAO()
	{
		
	}
	/**
	 * Thêm loại người dùng
	 * Enter description here ...
	 * @param unknown_type $loaiNguoiDung
	 */
	public static function ThemLoaiNguoiDung($loaiNguoiDung)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			
			$strSql = sprintf("call spThemLoaiNguoiDung(%d, N'%s')",$loaiNguoiDung->MaLoaiND, $loaiNguoiDung->LoaiNguoiDung);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	/**
	 * Láº¥y ds loáº¡i ngÆ°á»�i dÃ¹ng
	 * Enter description here ...
	 * @param unknown_type $loaiNguoiDung
	 */
	public static function LayDSLoaiNguoiDung()
	{
		$lstLoaiNguoiDung = array();
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$lstLoaiNguoiDung = array();
				return $lstLoaiNguoiDung;
			}
			
			$strSql = sprintf("call spLayDSLoaiNguoiDung()");
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			if ($result == false)
			{
				$lstLoaiNguoiDung = array();
				return $lstLoaiNguoiDung;
			}
			while ($row = mysql_fetch_array($result))
			{
				$LoaiNDDto = new LoaiNguoiDungDTO();
				$LoaiNDDto->MaLoaiND = $row["MaLoaiND"];
				$LoaiNDDto->LoaiNguoiDung = $row["LoaiNguoiDung"];
				
				array_push($lstLoaiNguoiDung, $LoaiNDDto);
			}
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$lstLoaiNguoiDung = array();
		}
		return $lstLoaiNguoiDung;
	}
}

?>