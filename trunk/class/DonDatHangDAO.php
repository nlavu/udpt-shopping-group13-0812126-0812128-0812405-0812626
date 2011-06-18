<?php

require_once ('DonDatHangDTO.php');
require_once ('ConnectDB.php');

/** 
 * @author Anh Vu
 * 
 * 
 */
class DonDatHangDAO extends ConnectDB {
	//TODO - Insert your code here
	function DonDatHangDAO(){
		
	}
	
	/**
	 * Thêm đơn đặt hàng
	 */
	public static function ThemDonDatHang($donDatHang)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			//chưa bít kiểu double
			$strSql = sprintf("call spThemDDH(%d, %d, %d, N'%s', STR_TO_DATE('%s', '%%d-%%m-%%Y'), STR_TO_DATE('%s', '%%d-%%m-%%Y'),%)",
				$donDatHang->MaDDH,
				$donDatHang->MaNguoiDung,
				$donDatHang->TrangThai,
				$donDatHang->GhiChu,
				$donDatHang->NgayDat,
				$donDatHang->NgayHuy,
				$donDatHang->TongSoTien);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Cập Nhật Trạng Thái
	 */
	public static function CapNhatTrangThaiDDH($donDatHang)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			
			$strSql = sprintf("call spCapNhatTrangThaiDDH(%d, %d)", $donDatHang->MaDDH, $donDatHang->TrangThai);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Cập nhật ngày huỷ
	 */
	public static function CapNhatNgayHuyDDH($donDatHang)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			
			$strSql = sprintf("call spCapNhatNgayHuyDDH(%d, %d)", $donDatHang->MaDDH, $donDatHang->TrangThai);
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
}

?>