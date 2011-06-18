<?php require_once 'session.inc';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShoppingHere - Đăng nhập</title>
<!--attach css-->
<link href="css/style-default.css" rel="stylesheet" type="text/css"  />
<!--end attach css-->
<link type="text/css" href="jquery-ui-1.8.13.custom/css/no-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="jquery-ui-1.8.13.custom/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.13.custom/js/jquery-ui-1.8.13.custom.min.js"></script>

<script src="jquery-ui-1.8.13.custom/reflection.js" ></script>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/css_002.css" type="text/css" rel="stylesheet" />
<!--end attach JQUERY-->
</head>
<body>
<?php

	// lấy username và password:
	require_once('class/NguoiDungDAO.php');
	$username = $_POST["txtUserName"];
	$password = $_POST["txtPassword"];
	
	
	if(isset($_POST["btnLogin"]))
	{
		mysql_connect("localhost","root","") or die("Not connect host");
		mysql_select_db("shopping_here") or die("Not connect database");		
		
		// mã hóa password = md5
		$password = md5($password);
		$check_user_name = NguoiDungDAO::LayThongTinNguoiDungTheoTenTaiKhoan($username);
		if (is_null($check_user_name))		
		{
			echo "<script>alert('Tên đăng nhập này chưa tồn tại!');</script>";
			//echo "<meta http-equiv='refresh' content='3;url=index.php'/>";
			//echo "<script>location.href = 'index.php';\</script\>";
		}
		else
		{
			$result = NguoiDungDAO::KiemTraDangNhap($username, $password);
			if($result)
			{
				$nguoiDungDto = NguoiDungDAO::LayThongTinNguoiDungTheoTenTaiKhoan($username);				
				// set session:
				$_SESSION['IsLogin'] = true;
				$_SESSION['IdUser'] = $nguoiDungDto->MaNguoiDung;
				$_SESSION['UserName'] = $nguoiDungDto->UserName;	
				$_SESSION['Authentication']	= $nguoiDungDto->MaLoaiND;	
									
				// set cookies:
				//setcookie('UserCookies',$username,time() + 3600);
				$response = "								
					<div class='standard_error'>
						<form class='block vbform' method='post' action='#' name='postvarform'>
							<h2 class='blockhead'>Ðang chuyển tới ...</h2>
							<div class='blockbody formcontrols'>
								<p class='blockrow restore'>Cảm ơn, <strong>$username</strong> đã đăng nhập thành công<br><br> </p>
								<center>Shopping-Here website mua bán hàng đầu Việt Nam</center>
								<p></p>
							</div>
							<div class='blockfoot actionbuttons redirect_button'>
								<div class='group' id='redirect_button'>
									<a href='index.php' class='textcontrol'>[ Click vào đây nếu trình duyệt không tự chuyển ]</a>
								</div>
							</div>
						</form>
					</div>
							";
							
				//echo "<p align='center'  style='font:arial; color:#000; font-size:14px;'>Đăng nhập thành công! Đang chuyển hướng về trang chủ</p>";
				if($nguoiDungDto->MaLoaiND == 3)
				{
					//header('Location: admin.php');
					echo $response;
					echo "<meta http-equiv='refresh' content='3;url=admin.php'/>";
				}
				else
				{
					//header('Location: index.php');
					echo $response;
					echo "<script>location.href = 'index.php';\</script\>";
					echo "<meta http-equiv='refresh' content='3;url=index.php'/>";
				}
				
			}
			else
			{
				echo "<script>alert('Sai Username hay Password, Đăng nhập không thành công! Quay về trang chủ');\</script\>";
				echo "<meta http-equiv='refresh' content='3;url=index.php'/>";
				echo "<script>location.href = 'index.php';\</script\>";
			}
		}									
						
	}
?>
<script type="text/javascript"> <!--
function exec_refresh()
{
	window.status = "Ðang chuyển tới ..." + myvar;
	myvar = myvar + " .";
	var timerID = setTimeout("exec_refresh();", 100);
	if (timeout > 0)
	{
		timeout -= 1;
	}
	else
	{
		clearTimeout(timerID);
		window.status = "";
		window.location = "index.php";
	}
}

var myvar = "";
var timeout = 20;
exec_refresh();
//--> </script>
  
</body>
</html>
