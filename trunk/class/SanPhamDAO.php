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
			
			$strSQL = ("insert into san_pham(`Ma`, `TenSanPham`, `SoLuongTon`, `DonGiaGoc`, `DonGiaBan`, `DacDiemSP`, `NgayDang`, `NgayCapNhat`, `NguoiCapNhat`, `DaXoa`, `NguoiXoa`, `NgayXoa`, `DanhGia`, `HinhAnh`, `LuotXem`, `MaLoaiSP`)
					values(	$sanPhamDto->Ma,
							N'$sanPhamDto->TenSanPham',
							$sanPhamDto->SoLuongTon,
							$sanPhamDto->DonGiaGoc,
							$sanPhamDto->DonGiaBan,
							N'$sanPhamDto->DacDiemSP',
							$sanPhamDto->NgayDang,
							$sanPhamDto->NgayCapNhat,
							$sanPhamDto->NguoiCapNhat,
							$sanPhamDto->DaXoa,
							$sanPhamDto->NguoiXoa,
							$sanPhamDto->NgayXoa,
							$sanPhamDto->DanhGia,
							'$sanPhamDto->HinhAnh',
							$sanPhamDto->LuotXem,
							$sanPhamDto->MaLoaiSP
							);");
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
			
			$strSQL = sprintf("update san_pham as sp set sp.TenSanPham = $sanPhamDto->TenSanPham, sp.SoLuongTon = $sanPhamDto->SoLuongTon,
									 sp.DonGiaGoc = $sanPhamDto->DonGiaGoc, sp.DonGiaBan = $sanPhamDto->DonGiaBan, sp.DacDiemSP = $sanPhamDto->DacDiemSP,
									  sp.NgayCapNhat = $sanPhamDto->NgayCapNhat, sp.NguoiCapNhat = $sanPhamDto->NguoiCapNhat, sp.HinhAnh = $sanPhamDto->HinhAnh
								where sp.Ma = $sanPhamDto->Ma;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Cập nhật lượt xem của sản phẩm
	 * Enter description here ...
	 */
	public static function CapNhatLuotXemCuaSanPham($userName, $nguoiCapNhat)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = ("UPDATE san_pham as sp set sp.LuotXem = sp.LuotXem + 1, sp.NgayCapNhat= now(), sp.NguoiCapNhat = $nguoiCapNhat
				WHERE sp.Ma = $maSP;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Cập đánh giá của sản phẩm
	 * Enter description here ...
	 */
	public static function CapNhatDanhGiaCuaSanPham($sanPhamDto)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = sprintf("UPDATE san_pham as sp set sp.DanhGia = $sanPhamDto->DanhGia, sp.NgayCapNhat= $sanPhamDto->NgayCapNhat, sp.NguoiCapNhat = $sanPhamDto->NguoiCapNhat
				WHERE sp.Ma = $sanPhamDto->Ma;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy danh sách sản phẩm
	 * Chưa sửa thứ tự param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSanPham()
	{
		$lstSanPham = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = sprintf("Select * from San_pham;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSanPham = array();
			while ($row = mysql_fetch_array($result) )
			{
				
				$sanPhamDto = new SanPhamDTO();
				$sanPhamDto->Ma = $row["Ma"];
				$sanPhamDto->TenSanPham = $row["TenSanPham"];
				$sanPhamDto->SoLuongTon = $row["SoLuongTon"];
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
				$sanPhamDto->DanhGia = $row["DanhGia"];
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
	 * 
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LaySanPhamTheoMa($maSanPham)
	{
		$sanPhamDto = new SanPhamDTO();
		try {
			if (!ConnectDB::OpenConnection())
				return;
		
			$strSQL = ("select * from San_Pham sp where sp.Ma = $maSanPham;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$sanPhamDto = new SanPhamDTO();
			while ($row = mysql_fetch_array($result) )
			//else
			{
				
				$sanPhamDto->Ma = $row["Ma"];
				$sanPhamDto->TenSanPham = $row["TenSanPham"];
				$sanPhamDto->SoLuongTon = $row["SoLuongTon"];
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
				$sanPhamDto->DanhGia = $row["DanhGia"];
				$sanPhamDto->HinhAnh =$row["HinhAnh"];
				$sanPhamDto->LuotXem = $row["LuotXem"];
				
				
				//array_push($lstSanPham, $sanPhamDto);		
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$sanPhamDto = new SanPhamDTO();
		}
		return $sanPhamDto;
	}
	
	/**
	 * Lấy danh sách sản phẩm có lượt xem cao nhất
	 * Chưa sửa thứ tự param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachTop5SanPhamCoLuotXemCaoNhat()
	{
		$lstSanPham = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = ("SELECT * FROM san_pham as sp
								ORDER BY LuotXem DESC LIMIT 0, 5;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSanPham = array();
			while ($row = mysql_fetch_array($result) )
			{
				$sanPhamDto = new SanPhamDTO();
				$sanPhamDto->Ma = $row["Ma"];
				$sanPhamDto->TenSanPham = $row["TenSanPham"];
				$sanPhamDto->SoLuongTon = $row["SoLuongTon"];
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
				$sanPhamDto->DanhGia = $row["DanhGia"];
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
	 * Lấy danh sách sản phẩm theo gian hàng
	 * Chưa sửa thứ tự param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSanPhamTheoGianHang($username)
	{
		$lstSanPham = array();
		ConnectDB::OpenConnection();
		try {
			if (!ConnectDB::OpenConnection())
				return;
			else
			{
				$strSQL = "	SELECT sp.Ma, sp.TenSanPham, sp.SoLuongTon, sp.DonGiaGoc, sp.DonGiaBan, sp.DacDiemSP, sp.NgayDang, sp.NgayCapNhat, sp.NguoiCapNhat, sp.DaXoa, sp.NgayXoa, sp.NguoiXoa, sp.MaLoaiSP, sp.DanhGia, sp.HinhAnh, sp.LuotXem
							FROM san_pham sp, loai_san_pham lsp, gian_hang gh, nguoi_dung nd
							WHERE lsp.MaGianHang = gh.MaGianHang and gh.MaGianHang = nd.MaGianHang and nd.MaNguoiDung = gh.MaNguoiDung and nd.UserName = '$username' and sp.MaLoaiSP = lsp.MaLoaiSP";
				$result = mysql_query($strSQL);
				if(!$result)
					$lstSanPham = array();
				while ($row = mysql_fetch_array($result))
				{
					$sanPhamDto = new SanPhamDTO();
					$sanPhamDto->Ma = $row["Ma"];
					$sanPhamDto->TenSanPham = $row["TenSanPham"];
					$sanPhamDto->SoLuongTon = $row["SoLuongTon"];
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
					$sanPhamDto->DanhGia = $row["DanhGia"];
					$sanPhamDto->HinhAnh =$row["HinhAnh"];
					$sanPhamDto->LuotXem = $row["LuotXem"];
					
					
					array_push($lstSanPham, $sanPhamDto);		
				}
			}
			
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstSanPham = array();
		}
		return $lstSanPham;
	}
	
	/**
	 * Lấy danh sách sản phẩm theo loại sản phẩm
	 * Chưa sửa thứ tự param
	 * @param unknown_type $nguoidungDto
	 */
	public  static  function LayDanhSachSanPhamTheoLoaiSanPham($maLoaiSP)
	{
		$lstSanPham = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = ("SELECT * FROM san_pham as sp where sp.MaLoaiSP = $maLoaiSP;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if(!$result)
				$lstSanPham = array();
			while ($row = mysql_fetch_array($result) )
			{
				$sanPhamDto = new SanPhamDTO();
				$sanPhamDto->Ma = $row["Ma"];
				$sanPhamDto->TenSanPham = $row["TenSanPham"];
				$sanPhamDto->SoLuongTon = $row["SoLuongTon"];
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
				$sanPhamDto->DanhGia = $row["DanhGia"];
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
	 * Xóa sản phẩm
	 * Enter description here ...
	 */
	public static function XoaSanPham($maSanPham, $ngayXoa, $maNguoiDung)
	{
		$result = true;
		try {
			if (!ConnectDB::OpenConnection())
			return FALSE;
			
			$strSQL = ("UPDATE san_pham as sp SET sp.DaXoa = 1, sp.NgayXoa = $ngayXoa, sp.NguoiXoa = $maNguoiDung
	WHERE sp.Ma = $maSanPham;");
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Lấy danh sách sản phẩm mới nhất theo username (sản phẩm mới nhất là sản phẩm có (ngày hiện tại - ngày đăng) < 3 )
	 * Enter description here ...
	 */
	public static function LayDSSanPhamMoi($username)
	{
		$lstSanPham = array();
		$ngayhientai = date("Y-m-d");
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = ("SELECT sp.Ma, sp.TenSanPham, sp.DonGiaBan, sp.NgayDang, sp.HinhAnh, sp.LuotXem, sp.SoLuongTon, sp.DacDiemSP
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
				$sanPhamDto->SoLuongTon = $row["SoLuongTon"];
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
}

?>