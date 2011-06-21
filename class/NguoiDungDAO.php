<?php
require_once 'ConnectDB.php';
require_once 'NguoiDungDTO.php';
/** 
 * @author Thu Ha
 * 
 * 
 */
class NguoiDungDAO extends ConnectDB {
	//TODO - Insert your code here
	function NguoiDungDAO()
	{
	}
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function ThemNguoiDung($nguoidungDto )
	{
		$result = true;
		try 
		{
			if (!ConnectDB::OpenConnection())
				return false;
			
				$strSQL = "insert into nguoi_dung(`MaNguoiDung`, `MaLoaiND`, `MaGianHang`, `UserName`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `MatKhau`, `Email`, `TinhTrang`, `AnhDaiDien`)
				values ('$nguoidungDto->MaNguoiDung',
						'$nguoidungDto->MaLoaiND',
						'$nguoidungDto->MaGianHang',
						'$nguoidungDto->UserName',
						N'$nguoidungDto->HoTen',
						'$nguoidungDto->NgaySinh',
						$nguoidungDto->GioiTinh,
						'$nguoidungDto->DiaChi',
						'$nguoidungDto->MatKhau',
						'$nguoidungDto->Email',
						$nguoidungDto->TinhTrang,
						'$nguoidungDto->AnhDaiDien');";
				$result = mysql_query($strSQL, ConnectDB::$mLink);
				//echo $strSQL;
				ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	/**
	 * * cập nhật tình trạng người dùng - CHUA& XONG
	 * 
	 */
	public  static  function CapNhatThongTinNguoiDung($nguoidungDto )
	{
		$result = true;
		try 
		{
			if (!ConnectDB::OpenConnection())
				return false;
								
			$strSQL = sprintf("call spCapNhatThongTinNguoiDung(%d, %d, %d, %s, N'%s', STR_TO_DATE('%s', '%%d-%%m-%%Y'), %s, 
						N'%s', %s, %s, %d, %s)",
						$nguoidungDto->MaNguoiDung,
						$nguoidungDto->MaLoaiND,
						$nguoidungDto->MaGianHang,
						$nguoidungDto->UserName,
						$nguoidungDto->HoTen,
						$nguoidungDto->NgaySinh,
						$nguoidungDto->GioiTinh,
						$nguoidungDto->DiaChi,
						$nguoidungDto->MatKhau,
						$nguoidungDto->Email,
						$nguoidungDto->TinhTrang,
						$nguoidungDto->AnhDaiDien
						);
				$result = mysql_query($strSQL, ConnectDB::$mLink);
				ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	/**
	 * cập nhật tình trạng người dùng - CHUA& XONG
	 */
	public  static  function CapNhatTinhTrangNguoiDung($maNguoiDung, $tinhTrang)
	{
		$result = true;
		try 
		{
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Đổi mật khẩu - CHƯA XONG
	 */
	public  static  function DoiMatKhau($nguoidungDto )
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("call spDoiMatKhau(%d, %d, %d, %s, N'%s', STR_TO_DATE('%s', '%%d-%%m-%%Y'), %s, 
						N'%s', %s, %s, %d, %s)",
						$nguoidungDto->MaNguoiDung,
						$nguoidungDto->MaLoaiND,
						$nguoidungDto->MaGianHang,
						$nguoidungDto->UserName,
						$nguoidungDto->HoTen,
						$nguoidungDto->NgaySinh,
						$nguoidungDto->GioiTinh,
						$nguoidungDto->DiaChi,
						$nguoidungDto->MatKhau,
						$nguoidungDto->Email,
						$nguoidungDto->TinhTrang,
						$nguoidungDto->AnhDaiDien
						);
				$result = mysql_query($strSQL, ConnectDB::$mLink);
				ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy ds người dùng
	 * Edit by THu Hà 20/6/2011
	 * 1- Chưa kích hoạt, 2-kích hoạt, 3-vô hiệu, 4-xóa, 5-tất cả
	 */
	public  static  function LayDanhSachNguoiDung($tinhTrang)
	{
		$lstNguoiDung = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung`";
			if ($tinhTrang != 5)
				$strSQL .= " WHERE `TinhTrang` = $tinhTrang;";
				
			$result = mysql_query($strSQL, ConnectDB::$mLink);			
			if(!$result)
				$lstNguoiDung = array();
			while ($row = mysql_fetch_array($result))
			{
				$nguoiDungDto = new NguoiDungDTO();
				$nguoiDungDto->MaNguoiDung = $row["MaNguoiDung"];
				$nguoiDungDto->MaLoaiND = $row["MaLoaiND"];
				$nguoiDungDto->MaGianHang = $row["MaGianHang"];
				$nguoiDungDto->HoTen = $row["HoTen"];
				$nguoiDungDto->GioiTinh = $row["GioiTinh"];
				$nguoiDungDto->UserName = $row["UserName"];
				$nguoiDungDto->DiaChi = $row["DiaChi"];
				$nguoiDungDto->Email = $row["Email"];
				$nguoiDungDto->MatKhau = $row["MatKhau"];
				$nguoiDungDto->TinhTrang = $row["TinhTrang"];
				$nguoiDungDto->AnhDaiDien = $row["AnhDaiDien"];
				
				array_push($lstNguoiDung, $nguoiDungDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstNguoiDung = array();
		}
		return $lstNguoiDung;
	}
	
	/*
	*  Lấy thông tin người dùng theo mã người dùng
	*  Edit by THu Hà 20/6/2011
	*/
	public  static  function LayThongTinNguoiDungTheoMa($maNguoiDung)
	{
		$nguoiDungDto = new NguoiDungDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where `MaNguoiDung` = $maNguoiDung;";
			//	echo $strSQL;
			$result = mysql_query($strSQL, ConnectDB::$mLink);			
			if(!$result || mysql_num_rows($result) <= 0)
			{
				return null;
			}
			while ($row = mysql_fetch_array($result))
			{
				$nguoiDungDto->MaNguoiDung = $row["MaNguoiDung"];
				$nguoiDungDto->MaLoaiND = $row["MaLoaiND"];
				$nguoiDungDto->MaGianHang = $row["MaGianHang"];
				$nguoiDungDto->HoTen = $row["HoTen"];
				$nguoiDungDto->GioiTinh = $row["GioiTinh"];
				$nguoiDungDto->UserName = $row["UserName"];
				$nguoiDungDto->DiaChi = $row["DiaChi"];
				$nguoiDungDto->Email = $row["Email"];
				$nguoiDungDto->MatKhau = $row["MatKhau"];
				$nguoiDungDto->TinhTrang = $row["TinhTrang"];
				$nguoiDungDto->AnhDaiDien = $row["AnhDaiDien"];
				
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$nguoiDungDto = null;
		}
		return $nguoiDungDto;
	}
	
	/*
	*	Lấy thông tin người dùng theo username
	*	Edit by THu Hà 20/6/2011
	*/
	public  static  function LayThongTinNguoiDungTheoTenTaiKhoan($TenTaiKhoan)
	{
		$nguoiDungDto = new NguoiDungDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where `UserName` = '$TenTaiKhoan'";
			$result = mysql_query($strSQL, ConnectDB::$mLink);			
			if(!$result || mysql_num_rows($result) <= 0)
			{
				return null;
			}
			while ($row = mysql_fetch_array($result))
			{
				$nguoiDungDto->MaNguoiDung = $row["MaNguoiDung"];
				$nguoiDungDto->MaLoaiND = $row["MaLoaiND"];
				$nguoiDungDto->MaGianHang = $row["MaGianHang"];
				$nguoiDungDto->HoTen = $row["HoTen"];
				$nguoiDungDto->GioiTinh = $row["GioiTinh"];
				$nguoiDungDto->UserName = $row["UserName"];
				$nguoiDungDto->DiaChi = $row["DiaChi"];
				$nguoiDungDto->Email = $row["Email"];
				$nguoiDungDto->MatKhau = $row["MatKhau"];
				$nguoiDungDto->TinhTrang = $row["TinhTrang"];
				$nguoiDungDto->AnhDaiDien = $row["AnhDaiDien"];
				
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$nguoiDungDto = null;
		}
		return $nguoiDungDto;
	}
	/*
	*	Lấy thông tin người dùng theo email
	*	Edit by THu Hà 20/6/2011
	*/
	public  static  function LayThongTinNguoiDungTheoEmail($email)
	{
		$nguoiDungDto = new NguoiDungDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where `Email` = '$email'";
			$result = mysql_query($strSQL, ConnectDB::$mLink);			
			if(!$result || mysql_num_rows($result) <= 0)
			{
				return null;
			}
			while ($row = mysql_fetch_array($result))
			{
				$nguoiDungDto->MaNguoiDung = $row["MaNguoiDung"];
				$nguoiDungDto->MaLoaiND = $row["MaLoaiND"];
				$nguoiDungDto->MaGianHang = $row["MaGianHang"];
				$nguoiDungDto->HoTen = $row["HoTen"];
				$nguoiDungDto->GioiTinh = $row["GioiTinh"];
				$nguoiDungDto->UserName = $row["UserName"];
				$nguoiDungDto->DiaChi = $row["DiaChi"];
				$nguoiDungDto->Email = $row["Email"];
				$nguoiDungDto->MatKhau = $row["MatKhau"];
				$nguoiDungDto->TinhTrang = $row["TinhTrang"];
				$nguoiDungDto->AnhDaiDien = $row["AnhDaiDien"];
				
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$nguoiDungDto = null;
		}
		return $nguoiDungDto;
	}
	/*
	*	Kiểm tra tên user & pass có trùng
	*	Edit by THu Hà 20/6/2011 
	*/
	public  static  function KiemTraDangNhap($tenTaiKhoan, $matKhau)
	{
		$res = false;
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where `UserName` = '$tenTaiKhoan' AND `MatKhau` = '$matKhau'";
			//echo $strSQL;
			$result = mysql_query($strSQL, ConnectDB::$mLink);	
					
			if(!$result || mysql_num_rows($result) <= 0)
			{
				$res = false;
			}
			if(mysql_num_rows($result) == 1)
			{
				$res = true;
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$res = false;
		}
		return $res;
	}	
}
?>