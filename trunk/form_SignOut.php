<?php require_once 'session.inc';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Online - Đăng Xuất</title>
</head>

<body>
<?php

	require_once('class/SanPhamDAO.php');
	require_once('class/GianHangDAO.php');
	
	require_once('class/NguoiDungDAO.php');
	session_start();
	if (isset($_SESSION['GioHang']))
	{
		
		unset($_SESSION['GioHang']);
	}
	//Hủy sesion quản lý lượt xem gian hàng
	if (isset($_SESSION['LuotXemGianHang']))
	{
		$lstGH = $_SESSION['LuotXemGianHang'];
		for($i = 0; $i< count($lstGH);$i++)
		{
			$gianHang = new GianHangDAO();
			$gianHang = NguoiDungDAO::LayNguoiDungTheoMa($_COOKIE['UserCookies']);
			GianHangDAO::TangLuotXemCuaGianHang($lstGH[$i],$gianHang->MaNguoiDung);
			

		}
		unset($_SESSION['LuotXemGianHang']);
	}
	
	//Hủy sesion quản lý lượt xem sản phẩm
	if (isset($_SESSION['LuotXemSanPham']))
	{
		$lstSP = $_SESSION['LuotXemSanPham'];
		for($i = 0; $i< count($lstSP);$i++)
		{
			$nguoiDung = new NguoiDungDAO();
			$nguoiDung = NguoiDungDAO::LayNguoiDungTheoMa($_COOKIE['UserCookies']);
			SanPhamDAO::CapNhatLuotXemCuaSanPham($lstSP[$i],$nguoiDung->MaNguoiDung);
			

		}
		unset($_SESSION['LuotXemSanPham']);
	}
	if(isset($_SESSION['db_is_logged_in']))
	{
		unset($_SESSION['db_is_logged_in']);
		setcookie('UserCookies',"",time() - 3600);
	}
	header('Location: index.php');
?>
</body>
</html>