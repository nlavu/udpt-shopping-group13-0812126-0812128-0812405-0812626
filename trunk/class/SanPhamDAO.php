<?php
require_once 'ConnectDB.php';
require_once 'SanPhamDTO.php';
class SanPhamDAO extends ConnectDB {
	/**
	 * 
	 * Enter description here ...
	 */
	function SanPhamDAO(){
		
	}
	/**
	 * Thêm sản phẩm
	 * Enter description here ...
	 */
	public static function ThemSanPham($sanPhamDto)
	{
		$result = true;
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "insert into san_pham(`Ma`, `TenSanPham`, `SoLuong`, `DonGiaGoc`, `DonGiaBan`, `DacDiemSP`, `NgayDang`, `NgayCapNhat`, `NguoiCapNhat`, `DaXoa`, `NguoiXoa`, `NgayXoa`, `HinhAnh`, `LuotXem`, `MaLoaiSP`)
					values(	$sanPhamDto->Ma,
							N'$sanPhamDto->TenSanPham',
							$sanPhamDto->SoLuong,
							$sanPhamDto->DonGiaGoc,
							$sanPhamDto->DonGiaBan,
							N'$sanPhamDto->DacDiemSP',
							$sanPhamDto->NgayDang,
							$sanPhamDto->NgayCapNhat,
							$sanPhamDto->NguoiCapNhat,
							$sanPhamDto->DaXoa,
							$sanPhamDto->NguoiXoa,
							$sanPhamDto->NgayXoa,
							'$sanPhamDto->HinhAnh',
							$sanPhamDto->LuotXem,
							$sanPhamDto->MaLoaiSP
							);";
			echo $strSQL;
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Cập nhật thông tin sản phẩm
	 * Enter description here ...
	 */
	public static function CapNhatThongTinSanPham($sanPhamDto)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("UPDATE san_pham as sp 
			SET sp.TenSanPham = $sanPhamDto->TenSanPham, sp.SoLuong = $sanPhamDto->SoLuong,
				sp.DonGiaGoc = $sanPhamDto->DonGiaGoc, sp.DonGiaBan = $sanPhamDto->DonGiaBan, 
				sp.DacDiemSP = $sanPhamDto->DacDiemSP, sp.NgayCapNhat = $sanPhamDto->NgayCapNhat, 
				sp.NguoiCapNhat = $sanPhamDto->NguoiCapNhat, sp.HinhAnh = $sanPhamDto->HinhAnh
			WHERE sp.Ma = $sanPhamDto->Ma;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Cập nhật lượt xem của sản phẩm ( sp chưa bị xóa mới được cập nhật)
	 * Edit by Thu Hà 20/6/2011.
	 */
	public static function CapNhatLuotXemCuaSanPham($maSP, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "UPDATE san_pham as sp 
				SET sp.LuotXem = sp.LuotXem + 1, sp.NgayCapNhat= now(), sp.NguoiCapNhat = $maNguoiDung
				WHERE sp.Ma = $maSP AND sp.DaXoa = 0;";
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
		
	/**
	 * Lấy danh sách sản phẩm theo thứ tự view, ngày đăng giảm dần
	 * $soLuong = TOP n
	 */
	public  static  function LayDanhSachSanPham($soLuong)
	{
		$lstSanPham = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			if ($soLuong > 0)
				$strSQL = "SELECT * FROM `San_pham` WHERE DaXoa = 0 ORDER BY `LuotXem` DESC, `NgayDang` DESC LIMIT 0, $soLuong;";
			else
				$strSQL = "SELECT * FROM `San_pham` WHERE DaXoa = 0 ORDER BY `LuotXem` DESC, `NgayDang` DESC;";
			
			//echo $strSQL;
				
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSanPham = array();
			while ($row = mysql_fetch_array($result) )
			{
				
				$sanPhamDto = new SanPhamDTO();
				$sanPhamDto->Ma = $row["Ma"];
				$sanPhamDto->TenSanPham = $row["TenSanPham"];
				$sanPhamDto->SoLuong = $row["SoLuong"];
				$sanPhamDto->DonGiaGoc = $row["DonGiaGoc"];
				$sanPhamDto->DonGiaBan = $row["DonGiaBan"];
				$sanPhamDto->DacDiemSP = $row["DacDiemSP"];
				$sanPhamDto->NgayDang = $row["NgayDang"];
				$sanPhamDto->NgayCapNhat = $row["NgayCapNhat"];
				$sanPhamDto->NguoiCapNhat = $row["NguoiCapNhat"];
				$sanPhamDto->DaXoa = $row["DaXoa"];
				$sanPhamDto->NgayXoa = $row["NgayXoa"];
				$sanPhamDto->NguoiXoa = $row["NguoiXoa"];
				$sanPhamDto->MaLoaiSP = $row["MaLoaiSP"];
				$sanPhamDto->HinhAnh =$row["HinhAnh"];
				$sanPhamDto->LuotXem = $row["LuotXem"];
				
				array_push($lstSanPham, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSanPham = array();
		}
		return $lstSanPham;
	}
	
	/**
	 * Lấy sản phẩm theo mã sản phẩm
	 * $tinhTrang = 1: đã xóa, 0 chưa xóa, 2 tất cả
	 * Edit by Thu Hà 20/6/2011	 
	 */
	public  static  function LaySanPhamTheoMa($maSanPham, $tinhTrang)
	{
		$sanPhamDto = new SanPhamDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return null;
		
			$strSQL = "select * from San_Pham sp where sp.Ma = $maSanPham";
			if ($tinhTrang != 2)
				$strSQL .= " AND sp.DaXoa = $tinhTrang ";
					
			//echo $strSQL;
				
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result || mysql_num_rows($result) <= 0)
			{
				return null;
			}
			$row = mysql_fetch_array($result);				
				
			$sanPhamDto->Ma = $row["Ma"];
			$sanPhamDto->MaSanPham = $row["MaSanPham"];
			$sanPhamDto->TenSanPham = $row["TenSanPham"];
			$sanPhamDto->SoLuong = $row["SoLuong"];
			$sanPhamDto->DonGiaGoc = $row["DonGiaGoc"];
			$sanPhamDto->DonGiaBan = $row["DonGiaBan"];
			$sanPhamDto->DacDiemSP = $row["DacDiemSP"];
			$sanPhamDto->NgayDang = $row["NgayDang"];
			$sanPhamDto->NgayCapNhat = $row["NgayCapNhat"];
			$sanPhamDto->NguoiCapNhat = $row["NguoiCapNhat"];
			$sanPhamDto->DaXoa = $row["DaXoa"];
			$sanPhamDto->NgayXoa = $row["NgayXoa"];
			$sanPhamDto->NguoiXoa = $row["NguoiXoa"];
			$sanPhamDto->MaLoaiSP = $row["MaLoaiSP"];
			$sanPhamDto->HinhAnh =$row["HinhAnh"];
			$sanPhamDto->LuotXem = $row["LuotXem"];
				
			ConnectDB::CloseConnection();				
			
		} 
		catch (Exception $e) {
			$sanPhamDto = null;
		}
		return $sanPhamDto;
	}
	
	
	/**
	 * Lấy danh sách sản phẩm theo gian hàng
	 * $tinhTrang = 1: đã xóa, 0 chưa xóa, 2 tất cả
	 * Edit by Thu Hà 20/6/2011
	 */
	public  static  function LayDanhSachSanPhamTheoGianHang($maGianHang, $tinhTrang)
	{
		$lstSanPham = array();
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
				return;
			else
			{
				$strSQL = "	SELECT sp.Ma, sp.TenSanPham, sp.SoLuong, sp.DonGiaGoc, sp.DonGiaBan, sp.DacDiemSP, sp.NgayDang, sp.NgayCapNhat, sp.NguoiCapNhat, sp.DaXoa, sp.NgayXoa, sp.NguoiXoa, sp.MaLoaiSP, sp.HinhAnh, sp.LuotXem
							FROM san_pham sp, loai_san_pham lsp
							WHERE sp.MaLoaiSP = lsp.MaLoaiSP AND lsp.MaGianHang = $maGianHang";
				if ($tinhTrang != 2)
					$strSQL .= " AND sp.DaXoa = $tinhTrang ";
							
				$result = mysql_query($strSQL, ConnectDB::$mLink);
				if(!$result)
					return null;
				while ($row = mysql_fetch_array($result))
				{
					$sanPhamDto = new SanPhamDTO();
					$sanPhamDto->Ma = $row["Ma"];
					$sanPhamDto->TenSanPham = $row["TenSanPham"];
					$sanPhamDto->SoLuong = $row["SoLuong"];
					$sanPhamDto->DonGiaGoc = $row["DonGiaGoc"];
					$sanPhamDto->DonGiaBan = $row["DonGiaBan"];
					$sanPhamDto->DacDiemSP = $row["DacDiemSP"];
					$sanPhamDto->NgayDang = $row["NgayDang"];
					$sanPhamDto->NgayCapNhat = $row["NgayCapNhat"];
					$sanPhamDto->NguoiCapNhat = $row["NguoiCapNhat"];
					$sanPhamDto->DaXoa = $row["DaXoa"];
					$sanPhamDto->NgayXoa = $row["NgayXoa"];
					$sanPhamDto->NguoiXoa = $row["NguoiXoa"];
					$sanPhamDto->MaLoaiSP = $row["MaLoaiSP"];
					$sanPhamDto->HinhAnh =$row["HinhAnh"];
					$sanPhamDto->LuotXem = $row["LuotXem"];					
					
					array_push($lstSanPham, $sanPhamDto);		
				}
			}
			
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSanPham = null;
		}
		return $lstSanPham;
	}
	
	/**
	 * Lấy danh sách sản phẩm theo loại sản phẩm
	 * $tinhTrang = 1: đã xóa, 0 chưa xóa, 2 tất cả
	 * Edit by Thu Hà 20/6/2011
	 */
	public  static  function LayDanhSachSanPhamTheoLoaiSanPham($maLoaiSP, $tinhTrang)
	{
		$lstSanPham = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "SELECT * FROM san_pham as sp WHERE sp.MaLoaiSP = $maLoaiSP";
			if ($tinhTrang != 2)
				$strSQL .= " AND sp.DaXoa = $tinhTrang";
			
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			if(!$result)
				return null;
				
			while ($row = mysql_fetch_array($result) )
			{
				$sanPhamDto = new SanPhamDTO();
				$sanPhamDto->Ma = $row["Ma"];
				$sanPhamDto->TenSanPham = $row["TenSanPham"];
				$sanPhamDto->SoLuong = $row["SoLuong"];
				$sanPhamDto->DonGiaGoc = $row["DonGiaGoc"];
				$sanPhamDto->DonGiaBan = $row["DonGiaBan"];
				$sanPhamDto->DacDiemSP = $row["DacDiemSP"];
				$sanPhamDto->NgayDang = $row["NgayDang"];
				$sanPhamDto->NgayCapNhat = $row["NgayCapNhat"];
				$sanPhamDto->NguoiCapNhat = $row["NguoiCapNhat"];
				$sanPhamDto->DaXoa = $row["DaXoa"];
				$sanPhamDto->NgayXoa = $row["NgayXoa"];
				$sanPhamDto->NguoiXoa = $row["NguoiXoa"];
				$sanPhamDto->MaLoaiSP = $row["MaLoaiSP"];
				$sanPhamDto->HinhAnh =$row["HinhAnh"];
				$sanPhamDto->LuotXem = $row["LuotXem"];				
				
				array_push($lstSanPham, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSanPham = null;
		}
		return $lstSanPham;
	}

	/**
	 * Xóa sản phẩm
	 */
	public static function XoaSanPham($maSanPham, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = "UPDATE san_pham as sp 
						SET sp.DaXoa = 1, sp.NgayXoa = now(), sp.NguoiXoa = $maNguoiDung
						WHERE sp.Ma = $maSanPham;";
						
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy danh sách sản phẩm mới nhất theo username (sản phẩm mới nhất là sản phẩm có (ngày hiện tại - ngày đăng) < 3 )
	 * Có ý nghĩa gì ???
	 */
	public static function LayDSSanPhamMoi($username)
	{
		$lstSanPham = array();
		$ngayhientai = date("Y-m-d");
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = ("SELECT sp.Ma, sp.TenSanPham, sp.DonGiaBan, sp.NgayDang, sp.HinhAnh, sp.LuotXem, sp.SoLuong, sp.DacDiemSP
						FROM nguoi_dung nd, gian_hang gh, loai_san_pham lsp, san_pham sp
						WHERE nd.UserName = '$username' and nd.MaGianHang = gh.MaGianHang 
								and lsp.MaGianHang = gh.MaGianHang and sp.MaLoaiSP = lsp.MaLoaiSP
								and (($ngayhientai - sp.NgayDang) < 3) and sp.DaXoa = 0
						");// daxoa = 0 => chưa xoa, daxoa = 1 => xóa rùi
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSanPham = array();
			while ($row = mysql_fetch_array($result) )
			{
				$sanPhamDto = new SanPhamDTO();
				$sanPhamDto->Ma = $row["Ma"];
				$sanPhamDto->TenSanPham = $row["TenSanPham"];
				$sanPhamDto->SoLuong = $row["SoLuong"];
				$sanPhamDto->DonGiaBan = $row["DonGiaBan"];
				$sanPhamDto->DacDiemSP = $row["DacDiemSP"];
				$sanPhamDto->NgayDang = $row["NgayDang"];
				$sanPhamDto->HinhAnh =$row["HinhAnh"];
				$sanPhamDto->LuotXem = $row["LuotXem"];
				
				
				array_push($lstSanPham, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSanPham = array();
		}
		return $lstSanPham;

	}
	/**
	 * Ngọc Hà 12/6/2011
	 * Lấy danh mã gian hàng của sản phẩm
	 * Enter description here ...
	 */
	public  static  function LayMaGianHangCuaSanPham($maSanPham)
	{
		$res = 0;
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
				return;
			else
			{
				$strSQL = "	SELECT lsp.MaGianHang
							FROM san_pham sp, loai_san_pham lsp
							WHERE sp.Ma = $maSanPham AND sp.MaLoaiSP = lsp.MaLoaiSP and sp.DaXoa = 0;";

				$result = mysql_query($strSQL);
				$row = mysql_fetch_array($result);
				$res = $row["MaGianHang"];
				if(!$result)
					$res = 0;
				
			}
			
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$res = 0;
		}
		return $res;
	}
}

?>