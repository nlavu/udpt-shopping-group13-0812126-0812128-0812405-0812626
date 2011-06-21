<?php
	require_once ('../class/BinhLuanDAO.php');
	$maBL = $_REQUEST['maBinhLuan'];
	$bl = BinhLuanDAO::LayBinhLuanTheoMaBL($maBL);
	$res = BinhLuanDAO::XoaBL($maBL);
	if(!$res)
		return;
	else
	{

		$lstBL = BinhLuanDAO::LayDSBL_TheoMaDoiTuong($bl->DoiTuongBL);
		$soluong = count($lstBL);
		echo $soluong;
	}
	

?>
