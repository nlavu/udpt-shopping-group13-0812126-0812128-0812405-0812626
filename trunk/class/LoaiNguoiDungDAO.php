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
	
	/*
	* Lấy ds loại người dùng
	* Edit by Thu Hà 20/6/2011
	*/
	public static function LayDSLoaiNguoiDung()
	{
		$lstLoaiNguoiDung = array();
		try {
			
			if (!ConnectDB::OpenConnection())
			{				
				return null;
			}
			
			$strSql = "SELECT * FROM `loai_nguoi_dung`;";
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			if ($result == false)
			{
				return null;
			}
			while ($row = mysql_fetch_array($result))
			{
				$LoaiNDDto = new LoaiNguoiDungDTO();
				$LoaiNDDto->MaLoaiND = $row["MaLoaiND"];
				$LoaiNDDto->LoaiNguoiDung = $row["LoaiNguoiDung"];
				
				array_push($lstLoaiNguoiDung, $LoaiNDDto);
			}
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$lstLoaiNguoiDung = null;
		}
		return $lstLoaiNguoiDung;
	}
}

?>