<?php require_once 'session.inc';?>
<?php

	require_once('class/SanPhamDAO.php');
	require_once('class/GianHangDAO.php');	
	require_once('class/NguoiDungDAO.php');
	
	//hủy session giỏ hàng
	if (isset($_SESSION['GioHang']))
	{		
		//unset($_SESSION['GioHang']);
	}
	//Hủy sesion quản lý lượt xem gian hàng
	//thêm lượt xem gian hàng ở ucHeader_Shop
	if (isset($_SESSION['LuotXemGianHang']))
	{
		$lstGH = $_SESSION['LuotXemGianHang'];
		for($i = 0; $i< count($lstGH);$i++)
		{
			GianHangDAO::TangLuotXemCuaGianHang($lstGH[$i],$_SESSION['IdUser']);
			echo $lstGH[$i]."<br>";
		}
		unset($_SESSION['LuotXemGianHang']);
	}
	
	//Hủy sesion quản lý lượt xem sản phẩm
	//thêm lượt xem gian hàng ở ucChiTietSanPham_Shop
	if (isset($_SESSION['LuotXemSanPham']))
	{
		$lstSP = $_SESSION['LuotXemSanPham'];
		for($i = 0; $i< count($lstSP);$i++)
		{
			SanPhamDAO::CapNhatLuotXemCuaSanPham($lstSP[$i], $_SESSION['IdUser']);		
			echo $lstSP[$i]."<br>";
		}
		unset($_SESSION['LuotXemSanPham']);
	}
	if($_SESSION['IsLogin'] > 0)
	{		
		//setcookie('UserCookies',"",time() - 3600);
		$_SESSION['IsLogin'] = 0;
		$_SESSION['IdUser'] = 0;
		$_SESSION['UserName'] = "Khách";
		$_SESSION['Authentication'] = 'Khach';
		
		$giohang = array();
		$_SESSION['GioHang'] = $giohang;	
		
		$gianhang = array();
		$_SESSION['LuotXemGianHang'] = $gianhang;
			
		$sanpham = array();
		$_SESSION['LuotXemSanPham'] = $sanpham;
	}
	header('Location: index.php');
?>