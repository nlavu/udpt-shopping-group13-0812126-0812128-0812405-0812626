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
						$nguoidungDto->Username,
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
						'$nguoidungDto->Username',
						N'$nguoidungDto->HoTen',
						'$nguoidungDto->NgaySinh',
						'$nguoidungDto->GioiTinh',
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
						$nguoidungDto->Username,
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
						$nguoidungDto->Username,
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
						$nguoidungDto->Username,
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
	
	public  static  function LayThongTinNguoiDungTheoMa($nguoiDungDto)
	{
		$lstThongTinNguoiDungTheoMa = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from nguoi_dung where MaNguoiDung = $nguoiDungDto";
			$result = mysql_query($strSQL, ConnectDB::$mLink);			
			if(!$result)
				$lstThongTinNguoiDungTheoMa = array();
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
				
				array_push($lstThongTinNguoiDungTheoMa, $nguoiDungDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstThongTinNguoiDungTheoMa = array();
		}
		return $lstThongTinNguoiDungTheoMa;
	}
	
/**
	 * Láº¥y danh sÃ¡ch ngÆ°á»�i dÃ¹ng theo tÃ¬nh tráº¡ng
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
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
				$nguoiDungDto->Username = $row["Username"];
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
	/**
	 * Láº¥y ngÆ°á»�i dÃ¹ng theo mÃ£
	 * ChÆ°a sá»­a thá»© tá»± param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayNguoiDungTheoMa($UserName)
	{
		$nguoiDungDto = new NguoiDungDTO();
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
				return;				
			//$strSQL = sprintf("call spLayNguoiDungTheoMa(%d)",$maNguoiDung);
			//$result = mysql_query($strSQL, ConnectDB::$mLink);
			else
			{
				$strSQL = "select hoten, ngaysinh, gioitinh, diachi, matkhau, email, anhdaidien from nguoi_dung where UserName = '$UserName'";
				$result = mysql_query($strSQL);
				if(mysql_num_rows($result) == 1)
				{					
					$nguoiDungDto = new NguoiDungDTO();
					while($row = mysql_fetch_array($result))
					{
						$nguoiDungDto->HoTen = $row["hoten"];
						$nguoiDungDto->NgaySinh = $row["ngaysinh"];
						$nguoiDungDto->GioiTinh = $row["gioitinh"];
						$nguoiDungDto->DiaChi = $row["diachi"];
						$nguoiDungDto->Email = $row["email"];
						$nguoiDungDto->MatKhau = $row["matkhau"];
						$nguoiDungDto->AnhDaiDien = $row["anhdaidien"];
					}
					$nguoiDungDto->NgaySinh = date("d-m-Y", strtotime($nguoiDungDto->NgaySinh));
				}
				else
				{
					echo "<script>alert('Lỗi hệ thống! Vui lòng thử lại');</script>";
					echo "<meta http-equiv='refresh' content='3;url=http://localhost/%5BUDPT%5DDATH/index.php'/>";
				}
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$nguoiDungDto = new NguoiDungDTO();
		}
		return $nguoiDungDto;
	}
}

?>