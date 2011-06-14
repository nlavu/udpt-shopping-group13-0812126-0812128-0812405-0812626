<?php
	session_start(); // bắt đầu 1 phiên làm việc
	// lấy username và password:
	$username = $_POST["txtUserName"];
	$password = $_POST["txtPassword"];
	
	
	if(isset($_POST["btnLogin"]))
	{
		mysql_connect("localhost","root","") or die("Not connect host");
		mysql_select_db("shopping_here") or die("Not connect database");
		
		if(!$username || !$password) // nếu không có username hay password
		{
			echo "<script>alert('Lỗi! Chưa nhập đủ thông tin username, password. Vui lòng thử lại!');</script>";
			echo "<meta http-equiv='refresh' content='2;url=http://localhost/%5BUDPT%5DDATH/index.html'/>";
			return;
		}
		else
		{
			// mã hóa password = md5
			$password = md5($password);
			$check_username = mysql_query("select UserName from nguoi_dung where UserName = '$username'");
			$rows = mysql_fetch_array($check_username,MYSQL_NUM);
			$record = $rows[0];
			if(!$record)
			{
				echo "<script>alert('Tên đăng nhập này chưa tồn tại!');</script>";
				echo "<meta http-equiv='refresh' content='2;url=http://localhost/%5BUDPT%5DDATH/index.html'/>";
			}
			else
			{
				$result = mysql_query("select count(*) from nguoi_dung where UserName = '$username' and MatKhau = '$password'");
				$rows = mysql_fetch_array($result, MYSQL_NUM);
				$record = $rows[0];
				if($record == 1)
				{
					$loaind = mysql_query("select MaLoaiND from nguoi_dung where UserName = '$username'");
					$rows = mysql_fetch_array($loaind);
					$maLoaiND = $rows["MaLoaiND"];
					// set session:
					$_SESSION['db_is_logged_in'] = true;										
					// set cookies:
					setcookie('UserCookies',$username,time() + 3600); 
					echo "<p> Đăng nhập thành công! Đang chuyển hướng về trang chủ </p>";
					if($maLoaiND==1)
					{
						//header('Location: admin.php');
						echo "<meta http-equiv='refresh' content='2;url=http://localhost/%5BUDPT%5DDATH/admin.php'/>";
					}
					else
					{
						//header('Location: index.php');
						echo "<script>location.href = 'index.php';</script>";
						//echo "<meta http-equiv='refresh' content='3;url=http://localhost/%5BUDPT%5DDATH/index.php'/>";
					}
					
				}
				else
				{
					echo "<p align='center'>Sai Username hay Password, Đăng nhập không thành công! Quay về trang chủ</p>";
					echo "<meta http-equiv='refresh' content='2;url=http://localhost/%5BUDPT%5DDATH/index.html'/>";
				}
			}									
		}				
	}
?>
