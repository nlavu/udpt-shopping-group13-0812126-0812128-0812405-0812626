<?php
		//kiểm tra quyền truy xuất
		/*$_SESSION['Privilege'] = 'NguoiBan';
		if ($_SESSION['Privilege'] != 'NguoiBan' || $_SESSION['IsLogin'] === 0)
		{
			header('Location:index.php');
			return;
		}
		*/
		require_once('../class/SuKienDAO.php');
		
		$strSQL ="";			
		if (isset($_REQUEST['id']) && isset($_REQUEST['t']))
		{
			$listMaSK  = $_REQUEST['id'];
			
			$token = strtok($listMaSK, ",");
			
			$successful = "";
			$fail ="";
			while ($token != false)
		  	{		  		
				if (strlen($token) > 0 && is_numeric($token))
				{					
					$ngayXoa = date('Y-m-d');
					//$nguoiXoa = $_SESSION['IdUser'];
					$nguoiXoa = 2;
					if (SuKienDAO::XoaSuKien($token, $ngayXoa, $nguoiXoa))
					{
						$successful .= $token.", ";
						
					}
					else
					{
						$fail .= $token.", ";
					}
				}
		  		$token = strtok(",");
		  	}  
			echo "<p style='text-align: center;'><span class='ui-state-highlight'>Xóa thành công sự kiện có mã $successful";
			if (strlen($fail) === 0)
			{
				echo " không bị lỗi sự kiện nào.</span></p><br>";
			}
			else
			{
				echo " bị lỗi sự kiện $fail bạn hãy xóa lại.</span></p><br>";
			}
		}
		else{
			header("Locate:ds_su_kien_admin.php");
		}
?>