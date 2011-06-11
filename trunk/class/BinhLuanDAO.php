<?php

require_once ('ConnectDB.php');
require_once ('BinhLuanDTO.php');

/** 
 * @author Anh Vu
 * 
 * 
 */
class BinhLuanDAO extends ConnectDB {
	//TODO - Insert your code here
	function BinhLuanDAO(){
		
	}
	/**
	 * Thêm bình luận
	 */
	public static function ThemBL($binhLuan)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			//chưa bít kiểu double
			$strSql = sprintf("call spThemBL(%d, N'%s', %d, STR_TO_DATE('%s', '%%d-%%m-%%Y'), %d, STR_TO_DATE('%s', '%%d-%%m-%%Y'), %d)",
				$binhLuan->MaBL,
				$binhLuan->NoiDungBL,
				$binhLuan->NguoiBL,
				$binhLuan->NgayBL,
				$binhLuan->DaXoa,
				$binhLuan->NgayXoa,
				$binhLuan->DoiTuongBL);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Xoá bình luận
	 */
	public static function XoaBL($maBL)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			//chưa bít kiểu double
			$strSql = sprintf("call spXoaBL(%d)",$maBL);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy DS bình luận theo mã đối tượng
	 */
	public  static  function LayDSBL_TheoMaDoiTuong($maDoiTuong)
	{
		$binhLuanDto = new BinhLuanDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("call spLayChiTietDDH_TheoMaDDH(%d)",$maDoiTuong);
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if($result == false)
			{
				$binhLuanDto = new BinhLuanDTO();
				return $binhLuanDto;
			}
			while ($row = mysql_fetch_array($result) )
			{
				
				$binhLuanDto->MaBL = $row["MaBL"];
				$binhLuanDto->NoiDungBL = $row["NoiDungBL"];
				$binhLuanDto->NguoiBL = $row["NguoiBL"];
				$binhLuanDto->NgayBL = $row["NgayBL"];
				$binhLuanDto->DaXoa = $row["DaXoa"];
				$binhLuanDto->NgayXoa = $row["NgayXoa"];
				$binhLuanDto->DoiTuongBL = $row["DoiTuongBL"];
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$binhLuanDto = new BinhLuanDTO();
		}
		return $binhLuanDto;
	}

}

?>