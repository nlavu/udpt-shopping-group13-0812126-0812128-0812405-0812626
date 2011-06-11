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

	public static function LayDanhSachLoaiSanPhamTheoUserName($username)
	{
		$lstLoaiSP = array();
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
				return;
			//$strSQL = sprintf("call spLayNguoiDungTheoMa(%d)",$maNguoiDung);
			//$result = mysql_query($strSQL, ConnectDB::$mLink);
			else
			{
				$strSQL = "	select lsp.MaLoaiSP, lsp.TenLoaiSP
							from nguoi_dung nd, gian_hang gh, loai_san_pham lsp
							where nd.username = '$username' and nd.MaGianHang = gh.MaGianHang and lsp.MaGianHang = gh.MaGianHang and nd.MaLoaiND = 3
							";
				$result = mysql_query($strSQL);
				if(mysql_num_rows($result) == 0)
				{
					$lstLoaiSP = array();
				}
				else
				{
					while($rows = mysql_fetch_array($result))
					{
						$loaiSanPhamDto = new LoaiSanPhamDTO();
						$loaiSanPhamDto->MaLoaiSP = $rows["MaLoaiSP"];
						$loaiSanPhamDto->TenLoaiSP = $rows["TenLoaiSP"];
						
						array_push($lstLoaiSP, $loaiSanPhamDto);
					}
				}
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstLoaiSP = array();
		}
		return $lstLoaiSP;
	}
	
	public static function ThemLoaiSanPham($loaiSanPhamDto)
	{
		$result = true;
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
				return;				
			//$strSQL = sprintf("call spLayNguoiDungTheoMa(%d)",$maNguoiDung);
			//$result = mysql_query($strSQL, ConnectDB::$mLink);
			else
			{
				$strSQL = "insert into loai_san_pham(`MaLoaiSP`, `TenLoaiSP`, `MaGianHang`) values ('',N'$loaiSanPhamDto->TenLoaiSP',$loaiSanPhamDto->MaGianHang)";
				$result = mysql_query($strSQL);
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$result = false;
		}
		return $result;
		
	}
}

?>