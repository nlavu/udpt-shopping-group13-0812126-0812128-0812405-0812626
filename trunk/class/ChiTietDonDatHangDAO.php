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
	 */
	public static function ThemChiTietDDH($chiTietDDH)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			//chưa bít kiểu double
			$strSql = sprintf("call spThemDDH(%d, %d, %d, %d, %d)",
				$chiTietDDH->MaDDH,
				$chiTietDDH->MaSanPham,
				$chiTietDDH->SoLuong,
				$chiTietDDH->DonGiaMua,
				$chiTietDDH->ThanhTien);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy chi tiết DDH theo mã DDH
	 */
	public  static  function LayChiTietDDHTheoMa($maDDH)
	{
		$chiTietDDHDto = new ChiTietDonDatHangDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("call spLayChiTietDDH_TheoMaDDH(%d)",$maDDH);
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if($result == false)
			{
				$chiTietDDHDto = new ChiTietDonDatHangDTO();
				return $chiTietDDHDto;
			}
			while ($row = mysql_fetch_array($result) )
			{
				
				$chiTietDDHDto->MaDDH = $row["MaDDH"];
				$chiTietDDHDto->MaSanPham = $row["MaSanPham"];
				$chiTietDDHDto->SoLuong = $row["SoLuong"];
				$chiTietDDHDto->DonGiaMua = $row["DonGiaMua"];
				$chiTietDDHDto->ThanhTien = $row["ThanhTien"];
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$chiTietDDHDto = new ChiTietDonDatHangDTO();
		}
		return $chiTietDDHDto;
	}
}

?>