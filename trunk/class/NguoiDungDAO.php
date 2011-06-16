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
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			/*$strSQL = sprintf("call spThemNguoiDung (%d, %d, %d, %s, N'%s', STR_TO_DATE('%s', '%%d-%%m-%%Y'), %s, 
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
				$result = mysql_query($strSQL, ConnectDB::$mLink);*/
				$strSQL = mysql_query("
				insert into nguoi_dung(`MaNguoiDung`, `MaLoaiND`, `MaGianHang`, `UserName`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `MatKhau`, `Email`, `TinhTrang`, `AnhDaiDien`)
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
						'$nguoidungDto->AnhDaiDien')");
				ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	/**
	 * 
	 * Cáº­p nháº­t thÃ´ng tin ngÆ°á»�i dÃ¹ng
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function CapNhatThongTinNguoiDung($nguoidungDto )
	{
		$result = true;
		try {
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
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	/**
	 * Cáº­p nháº­t tÃ¬nh tráº¡ng ngÆ°á»�i dÃ¹ng
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function CapNhatTinhTrangNguoiDung($nguoidungDto )
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("call spCapNhatTinhTrangNguoiDung(%d, %d, %d, %s, N'%s', STR_TO_DATE('%s', '%%d-%%m-%%Y'), %s, 
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
	 * Ä�á»•i máº­t kháº©u ngÆ°á»�i dÃ¹ng
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
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
	 * Láº¥y danh sÃ¡ch ngÆ°á»�i dÃ¹ng
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachNguoiDung()
	{
		$lstNguoiDung = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from nguoi_dung";
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
	*	Lấy thông tin người dùng theo mã người dùng
	*/
	public  static  function LayThongTinNguoiDungTheoMa($maNguoiDung)
	{
		$nguoiDungDto = new NguoiDungDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where MaNguoiDung = $maNguoiDung";
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
	*/
	public  static  function LayThongTinNguoiDungTheoTenTaiKhoan($TenTaiKhoan)
	{
		$nguoiDungDto = new NguoiDungDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where UserName = '$TenTaiKhoan'";
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
	*/
	public  static  function LayThongTinNguoiDungTheoEmail($email)
	{
		$nguoiDungDto = new NguoiDungDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where Email = '$email'";
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
	*/
	public  static  function KiemTraDangNhap($tenTaiKhoan, $matKhau)
	{
		$res = false;
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from `nguoi_dung` where UserName = '$tenTaiKhoan' AND MatKhau = '$matKhau'";
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
	/**
	 * Lấy ds người dùng theo tình trạng
	 */
	public  static  function LayDanhSachNguoiDungTheoTinhTrang()
	{
		$lstNguoiDung = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("call spLayDanhSachNguoiDungTheoTinhTrang()");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstNguoiDung = array();
			while ($row = mysql_fetch_array($result) )
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
}
?>