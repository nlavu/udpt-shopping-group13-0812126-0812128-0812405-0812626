<?php
require_once 'ConnectDB.php';
require_once 'LoaiSanPhamDTO.php';
/** 
 * @author Thu Ha
 * 
 * 
 */
class LoaiSanPhamDAO extends ConnectDB {
	//TODO - Insert your code here
	function LoaiSanPhamDAO()
	{
	}
	/** Lấy ds loại sản phẩm theo mã gian hàng
	 * author Thu Ha
	 * 20/6/2011
	 * 
	 */
	public static function LayDanhSachLoaiSanPhamTheoMaGianHang($maGianHang)
	{
		$lstLoaiSP = array();
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
				return null;
			
			$strSQL = "	select *
						from `loai_san_pham`
						where `MaGianHang` = $maGianHang";
						
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			if(mysql_num_rows($result) == 0)
			{
				$lstLoaiSP = null;
			}
			else
			{
				while($rows = mysql_fetch_array($result))
				{
					$loaiSanPhamDto = new LoaiSanPhamDTO();
					$loaiSanPhamDto->MaLoaiSP = $rows["MaLoaiSP"];
					$loaiSanPhamDto->TenLoaiSP = $rows["TenLoaiSP"];
					$loaiSanPhamDto->MaGianHang = $rows["MaGianHang"];
					
					array_push($lstLoaiSP, $loaiSanPhamDto);
				}
			}

			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) 
		{			
			$lstLoaiSP = null;
		}
		return $lstLoaiSP;
	}
	
	/* Thêm loại sản phẩm
	 * author Thu Ha
	 * 20/6/2011
	 * 
	 */
	public static function ThemLoaiSanPham($loaiSanPhamDto)
	{
		$result = true;
		ConnectDB::OpenConnection();
		try 
		{
			if (!ConnectDB::OpenConnection())
				return false;				
			
			$strSQL = "insert into `loai_san_pham` (`MaLoaiSP`, `TenLoaiSP`, `MaGianHang`) values ('',N'$loaiSanPhamDto->TenLoaiSP',$loaiSanPhamDto->MaGianHang)";
			
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) 
		{
			$result = false;
		}
		return $result;		
	}
	
	/* Cập nhật tên loại sản phẩm
	 * author Thu Ha
	 * 20/6/2011
	 * 
	 */
	public static function CapNhatLoaiSP($tenLoaiSP, $maLoaiSP)
	{
		$result = true;
		ConnectDB::OpenConnection();
		try 
		{
			if (!ConnectDB::OpenConnection())
				return false;				
			
			$strSQL = "UPDATE `loai_san_pham` SET `TenLoaiSP`= '$tenLoaiSP'
						WHERE `MaLoaiSP` = $maLoaiSP ";
			
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) 
		{
			$result = false;
		}
		return $result;
		
	}
}

?>