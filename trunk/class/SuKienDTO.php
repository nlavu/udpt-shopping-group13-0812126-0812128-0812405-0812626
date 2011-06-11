<?php

require_once ('ConnectDB.php');

/** 
 * @author Ngoc Ha
 * 
 * 
 */
class SuKienDTO{
	//TODO - Insert your code here
	public $MaSuKien;
	public $MaGianHang;
	public $TenSuKien;
	public $HinhAnh;
	public $NoiDungSuKien;
	public $NgayTao;
	public $NgayBatDau;
	public $NgayKetThuc;
	public $NgayCapNhat;
	public $NguoiCapNhat;
	public $NgayXoa;
	public $NguoiXoa;
	public $DaXoa;
	

}

class SuKienDAO extends ConnectDB {

}
?>