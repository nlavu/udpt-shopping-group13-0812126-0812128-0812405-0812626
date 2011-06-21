<?php

require_once ('ConnectDB.php');
require_once ('ChiTietDonDatHangDTO.php');

/** 
 * @author Anh Vu
 * 
 * 
 */
class ChiTietDonDatHangDAO extends ConnectDB {
	//TODO - Insert your code here
	function ChiTietDonDatHangDAO(){
		
	}

	/**
	 * Thêm chi tiết đơn đặt hàng
	 * Edit by Thu Hà 20/6/2011
	 */
	public static function ThemChiTietDDH($chiTietDDH)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				return false;
			}
			//chưa bít kiểu double
			/*$strSql = sprintf("call spThemDDH(%d, %d, %d, %d, %d)",
				$chiTietDDH->MaDDH,
				$chiTietDDH->MaSanPham,
				$chiTietDDH->SoLuong,
				$chiTietDDH->DonGiaMua,
				$chiTietDDH->ThanhTien);*/
				
			$strSql ="INSERT INTO `chi_tiet_dat_hang` (`MaDDH`, `MaSanPham`, `SoLuong`, `DonGiaMua`,`ThanhTien`)
					VALUES($chiTietDDH->MaDDH, $chiTietDDH->MaSanPham, 
					$chiTietDDH->SoLuong, $chiTietDDH->DonGiaMua, $chiTietDDH->ThanhTien)";
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy ds chi tiết DDH theo mã DDH
	 * Edit by Thu Hà 20/6/2011
	 */
	public  static  function LayDSChiTietDDHTheoMaDDH($maDDH)
	{
		$dsChiTietDDH = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			//$strSQL = sprintf("call spLayChiTietDDH_TheoMaDDH(%d)",$maDDH);
			$strSQL = "SELECT * FROM `chi_tiet_dat_hang` WHERE `MaDDH` = $maDDH;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if($result == false)
			{
				return null;
			}
			while ($row = mysql_fetch_array($result) )
			{
				$chiTietDDHDto = new ChiTietDonDatHangDTO();
				$chiTietDDHDto->MaDDH = $row["MaDDH"];
				$chiTietDDHDto->MaSanPham = $row["MaSanPham"];
				$chiTietDDHDto->SoLuong = $row["SoLuong"];
				$chiTietDDHDto->DonGiaMua = $row["DonGiaMua"];
				$chiTietDDHDto->ThanhTien = $row["ThanhTien"];
				
				array_push($dsChiTietDDH, $chiTietDDHDto);
			}
			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) {
			$dsChiTietDDH = null;
		}
		return $dsChiTietDDH;
	}
	/*
	*	Xóa chi tiết đơn đặt hàng của một mã đặt hàng
	*	Created by Thu Hà 20/6/2011
	*/
	public static function XoaChiTietDDH($maDDH)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				return false;
			}
			
			$strSql ="DELETE FROM `chi_tiet_dat_hang` WHERE `MaDDH` = $maDDH;";
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/*
	*	Tính tiền của một DDH
	*	Created by Thu Hà 20/6/2011
	*/
	public static function TinhTongSotienTheoMaDDH($maDDH)
	{
		$sum = 0;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				return false;
			}
			
			$strSql ="SELECT SUM(`ThanhTien`) as TongSoTien FROM `chi_tiet_dat_hang` WHERE `MaDDH` = $maDDH;";
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			if (!$result || mysql_num_rows($result) != 1)
				return 0;
				
			$row = mysql_fetch_array($result);
			$sum = $row["TongSoTien"];
			
			ConnectDB::CloseConnection();
			
		} 
		catch (Exception $e) {
			$sum = 0;
		}
		return $sum;
	}
}

?>