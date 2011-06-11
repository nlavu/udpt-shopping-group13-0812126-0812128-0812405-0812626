<?php

require_once ('ConnectDB.php');
require_once 'DoiTuongDTO.php';

/** 
 * @author Thu Ha
 * 
 * 
 */
class DoiTuongDAO extends ConnectDB {
	//TODO - Insert your code here
	function DoiTuongDAO()
	{		
	}
	
	public static function ThemDoiTuong($tenDoiTuong)
	{
		$result = TRUE;
		$identity = 0;
		try {
			if (!ConnectDB::OpenConnection())
			{
				throw  new Exception("Không thể kết nối với cơ sở dữ liệu.\n", $code);
				return FALSE;
			}
			
			//$strSQL =sprintf("CALL spThemDoiTuong('%s')", $tenDoiTuong);			
			//$result = mysql_query($strSQL, ConnectDB::$mLink);
			$strSQL = mysql_query("insert into doi_tuong(`MaDoiTuong`, `TenDoiTuong`) values ('','$tenDoiTuong->TenDoiTuong')");
			$identity = mysql_insert_id();

			ConnectDB::CloseConnection();
			
		} catch (Exception $e) {
			$result = FALSE;
		}
		if($strSQL)
		{
			return $identity;// trả về dòng đối tượng vừa được insert vào
		}
		else
		{
			$result = false;
			return $result;// nếu thực thi hok được thì trả về false
		}
	}	
}

?>