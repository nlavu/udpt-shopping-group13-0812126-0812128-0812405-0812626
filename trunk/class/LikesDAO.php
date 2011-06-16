<?php

require_once ('ConnectDB.php');
require_once ('LikesDTO.php');

/** 
 * @author Thu Ha
 * 
 * 
 */
 class LikesDAO extends ConnectDB {
	function LikesDAO(){
		
	}
	
	// lấy ds theo mã đối tượng
 	public  static  function LayDanhSachLikeTheoMaDoiTuong($maDoiTuong)
	{
		$lstLikes = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from Likes where MaDoiTuong = $maDoiTuong;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result || mysql_num_rows($result) <= 0)
				return null;
				
			while ($row = mysql_fetch_array($result) )
			{
				$likesDto = new LikesDTO();
				$likesDto->MaDoiTuong = $row["MaDoiTuong"];
				$likesDto->MaNguoiDung = $row["MaNguoiDung"];
				$likesDto->SoSao = $row["SoSao"];							
				
				array_push($lstLikes, $likesDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstLikes = null;
		}
		return $lstLikes;
	}
	
	// lấy like theo mã đối tượng & mã người dùng
 	public  static  function LayDanhSachLikeTheoMaDT_MaNguoiDung($maDoiTuong, $maNguoiDung)
	{
		$likesDto = new LikesDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from Likes where MaDoiTuong = $maDoiTuong AND MaNguoiDung = $maNguoiDung;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result || mysql_num_rows($result) <= 0)
				return null;
				
			while ($row = mysql_fetch_array($result) )
			{
				$likesDto = new LikesDTO();
				$likesDto->MaDoiTuong = $row["MaDoiTuong"];
				$likesDto->MaNguoiDung = $row["MaNguoiDung"];
				$likesDto->SoSao = $row["SoSao"];
					
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$likesDto = null;
		}
		return $likesDto;
	}
	// Thêm likes
	public  static  function ThemLike($likesDto)
	{
		$res = false;
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "INSERT INTO Likes (MaDoiTuong, MaNguoiDung, SoSao) 
					VALUES ('$likesDto->MaDoiTuong','$likesDto->MaNguoiDung','$likesDto->SoSao')";
			$res = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$res = false;
		}
		return $res;
	}
	// Xóa likes
	public  static  function XoaLike($maDoiTuong, $maNguoiDung)
	{
		$res = false;
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "DELETE From  Likes WHERE MaDoiTuong=$maDoiTuong AND MaNguoiDung=$maNguoiDung";
			$res = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$res = false;
		}
		return $res;
	}
	// Cập nhật likes
	public  static  function CapNhatLike($maDoiTuong, $maNguoiDung, $soSao)
	{
		$res = false;
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "UPDATE Likes SET SoSao = $soSao WHERE MaDoiTuong=$maDoiTuong AND MaNguoiDung=$maNguoiDung";
			$res = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$res = false;
		}
		return $res;
	}
 } 
?>