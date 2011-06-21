<?php

require_once ('ChiTietSuKienDTO.php');
require_once ('ConnectDB.php');

/** 
 * @author Anh Vu
 * 
 * 
 */
class ChiTietSuKienDAO extends ConnectDB {
	//TODO - Insert your code here
	function ChiTietSuKienDAO(){
		
	}
	
	/**
	 * Thêm chi tiết sự kiện
	 * Edit by Thu Hà 20/6/2011
	 */
	public static function ThemChiTietSuKien($chiTietSuKien)
	{
		$result = true;
		try 
		{			
			if (!ConnectDB::OpenConnection())
			{				
				return false;
			}
			
			/*$strSql = sprintf("call spThemChiTietSuKien(%d, %d, %d, N'%s')",$chiTietSuKien->MaSuKien, $chiTietSuKien->Ma, $chiTietSuKien->PhanTram_GiaGiam, $chiTietSuKien->QuaTang);*/
			$strSql ="INSERT INTO `chi_tiet_su_kien` (`MaSuKien`, `Ma`, `PhanTramGiamGia`, `QuaTang`)
					VALUES($chiTietSuKien->MaSuKien, $chiTietSuKien->Ma, $chiTietSuKien->PhanTramGiamGia, '$chiTietSuKien->QuaTang');";
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}

	
	/**
	 * Xoá Chi Tiết Sự Kiện
	 * Edit by Thu Hà 20/6/2011
	 */
	public static function XoaChiTietSuKien($maSuKien, $maSanPham)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{				
				return false;
			}
			
			//$strSql = sprintf("call spXoaChiTietSuKien(%d)",$chiTietSuKien->MaSuKien);
			$strSql ="DELETE FROM chi_tiet_su_kien WHERE MaSuKien = $maSuKien AND Ma=$maSanPham;";
			
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy DS Chi Tiết Sự Kiện Theo Mã Sự Kiện
	 * Edit by Thu Hà 20/6/2011
	 */
	public static function LayDSChiTietSuKien_TheoMaSK($maSuKien)
	{
		$dsSuKien = array();
		try 
		{
			if (!ConnectDB::OpenConnection())
				return false;
				
			//$strSQL = sprintf("call spLayDanhSachCTSK_TheoMaSK(%d)",$maSuKien);
			$strSQL = "SELECT * FROM chi_tiet_su_kien WHERE MaSuKien = $maSuKien;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if($result == false)
			{				
				return null;
			}
			
			while ($row = mysql_fetch_array($result))
			{
				$chiTietSuKienDto = new ChiTietSuKienDTO();
				$chiTietSuKienDto->MaSuKien = $row["MaSuKien"];
				$chiTietSuKienDto->Ma = $row["Ma"];
				$chiTietSuKienDto->PhanTram_GiaGiam = $row["PhanTramGiamGia"];
				$chiTietSuKienDto->QuaTang = $row["QuaTang"];
				
				array_push($dsSuKien, $chiTietSuKienDto);
			}
			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) {
			$dsSuKien = null;
		}
		return $dsSuKien;
	}
	
/**
	 * Lấy DS Chi Tiết Sự Kiện Theo Mã Sản Phẩm
	 */
	public static function LayDSChiTietSuKien_TheoMaSP($maSanPham)
	{
		$dsSuKien = array();
		try 
		{
			if (!ConnectDB::OpenConnection())
				return false;
							
			$strSQL = "SELECT * FROM chi_tiet_su_kien WHERE Ma = $maSanPham;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if($result == false)
			{				
				return null;
			}
			
			while ($row = mysql_fetch_array($result))
			{
				$chiTietSuKienDto = new ChiTietSuKienDTO();
				$chiTietSuKienDto->MaSuKien = $row["MaSuKien"];
				$chiTietSuKienDto->Ma = $row["Ma"];
				$chiTietSuKienDto->PhanTram_GiaGiam = $row["PhanTramGiamGia"];
				$chiTietSuKienDto->QuaTang = $row["QuaTang"];
				
				array_push($dsSuKien, $chiTietSuKienDto);
			}
			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) {
			$dsSuKien = null;
		}
		return $dsSuKien;
	}
}

?>