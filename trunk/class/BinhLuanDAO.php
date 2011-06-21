<?php

require_once ('ConnectDB.php');
require_once ('BinhLuanDTO.php');

/** 
 * @author Anh Vu
 * 
 * 
 */
class BinhLuanDAO extends ConnectDB {
	//TODO - Insert your code here
	function BinhLuanDAO(){
		
	}
	/**
	 * Thêm bình luận
	 *Edit Thu Hà 19/06/2011
	 */
	public static function ThemBL($binhLuan)
	{
		$result = true;
		$identity = 0;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			
			$strSql = "INSERT INTO `shopping_here`.`binh_luan` (`MaBL` ,`NoiDungBL` ,`NguoiBL` ,`NgayBL` ,`DaXoa`,`DoiTuongBL`)
					VALUES ($binhLuan->MaBL,'$binhLuan->NoiDungBL',$binhLuan->NguoiBL,now(),$binhLuan->DaXoa,$binhLuan->DoiTuongBL);";
				
			$result = mysql_query($strSql, ConnectDB::$mLink);
						
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) 
		{
			$result = FALSE;
		}
		
		return $result;
		
	}
	
	/**
	 * Xoá bình luận
	 *Edit Ngọc Hà 16/06/2011
	 *Edit Thu Hà 20/6/2011: sửa lại thành update thuộc tính DaXoa = 1
	 */
	public static function XoaBL($maBinhLuan, $ngayXoa, $nguoiXoa)
	{
		$result = true;
		try {
			
			if (!ConnectDB::OpenConnection())
			{
				$result = false;
				return $result;
			}
			//chưa bít kiểu double
		
			$strSql = "UPDATE `binh_luan` 
						SET 	`binh_luan`.`DaXoa`= 1,   
								`binh_luan`.`NgayXoa`= $ngayXoa, 
								`binh_luan`.`NguoiXoa`=$nguoiXoa
						WHERE `binh_luan`.`MaBL` =$maBinhLuan LIMIT 1 ;";
			$result = mysql_query($strSql, ConnectDB::$mLink);
			
			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		return $result;
	}
	
	/**
	 * Thu Hà
	 * Lấy DS bình luận theo mã đối tượng
	 * Edit by Thu Hà 20/6/2011: thêm điều kiện DaXoa = 0
	 * $tinhTrang: 0 - chưa xóa, 1 - đã xóa, 2 - tất cả
	 */
	public  static  function LayDSBL_TheoMaDoiTuong($maDoiTuong, $tinhTrang)
	{
		$lstBinhLuan = array();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = "select * from binh_luan bl 
						where bl.DoiTuongBL = $maDoiTuong";
			if ($tinhTrang == 2)
			{
				$strSQL .= ";";
			}
			else
			{
				$strSQL .=" AND bl.DaXoa = $tinhTrang";
			}
	
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if($result == false)
			{
				return null;
			}
			while ($row = mysql_fetch_array($result) )
			{
				$binhLuanDto = new BinhLuanDAO();
				$binhLuanDto->MaBL = $row["MaBL"];
				$binhLuanDto->NoiDungBL = $row["NoiDungBL"];
				$binhLuanDto->NguoiBL = $row["NguoiBL"];
				$binhLuanDto->NgayBL = $row["NgayBL"];
				$binhLuanDto->DaXoa = $row["DaXoa"];
				$binhLuanDto->NgayXoa = $row["NgayXoa"];
				$binhLuanDto->NguoiXoa = $row["NguoiXoa"];
				$binhLuanDto->DoiTuongBL = $row["DoiTuongBL"];
				
				array_push($lstBinhLuan, $binhLuanDto);
			}
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$lstBinhLuan = null;
		}
		return $lstBinhLuan;
	}
	
	/**
	 * Lấy bình luận theo mã bình luận
	 * Edit Ngọc Hà 16/6/2011
	 * Edit by Thu Hà 20/6/2011: nếu không tồn tại thì trả về null
	 */
	public  static  function LayBinhLuanTheoMaBL($maBL)
	{
		$binhLuanDto = new BinhLuanDAO();
		try {
			if (!ConnectDB::OpenConnection())
				return false;
				
			$strSQL = ("select * from binh_luan bl where bl.MaBL = $maBL;");
	
			$result = mysql_query($strSQL, ConnectDB::$mLink);
			if($result == false || mysql_num_rows($result)!= 1)
			{
				return null;
			}
			
			$row = mysql_fetch_array($result);
				
			$binhLuanDto->MaBL = $row["MaBL"];
			$binhLuanDto->NoiDungBL = $row["NoiDungBL"];
			$binhLuanDto->NguoiBL = $row["NguoiBL"];
			$binhLuanDto->NgayBL = $row["NgayBL"];
			$binhLuanDto->DaXoa = $row["DaXoa"];
			$binhLuanDto->NgayXoa = $row["NgayXoa"];
			$binhLuanDto->NguoiXoa = $row["NguoiXoa"];
			$binhLuanDto->DoiTuongBL = $row["DoiTuongBL"];
			
			ConnectDB::CloseConnection();				
			
		} catch (Exception $e) {
			$binhLuanDto = null;
		}
		return $binhLuanDto;
	}

}

?>