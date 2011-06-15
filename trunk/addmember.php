<?php
	require_once 'class/NguoiDungDAO.php';
	require_once 'class/NguoiDungDTO.php';
	require_once 'class/DoiTuongDAO.php';
	require_once 'class/DoiTuongDTO.php';
	$doi_tuong = new DoiTuongDAO();// tạo đối tượng mới là người dùng
	$nguoi_dung = new NguoiDungDAO();// tạo đối tượng người dùng DAO
	
	$username = $_POST["txtusername"];
	$password = $_POST["txtpassword"];
	$passwordconfirm = $_POST["txtpasswordconfirm"];	
	$email = $_POST["txtemail"];
	$emailconfirm = $_POST["emailconfirm"];
	//$checkbox = $_POST['agree'];
	$fullname = $_POST["fullname"];
	$datepicker = $_POST["datepicker"];
	$datepicker = date("Y-m-d", strtotime($datepicker)); // chuyển về định dạng YYYY-mm-dd để insert vào mysql
	
	$gender = $_POST["combobox"];
	// xử lý $gender
	if($gender == "Nam")
	{
		$gender = 1;
	}
	if($gender == "Nữ")
	{
		$gender = "2";
	}
	if($gender == "Không tiết lộ")
	{
		$gender = 3;
	}						
	
	if(isset($_POST["btnRegister"]))
	{
		mysql_connect("localhost","root","") or die("Not connect host");
		mysql_select_db("shopping_here") or die("Not connect database");
		
		if(!$username || !$password || !$email || !$passwordconfirm || !$emailconfirm)
		{
			echo "<script>alert('Lỗi! Chưa nhập đủ thông tin username, password, email, vui lòng thử lại');</script>";
			echo "<meta http-equiv='refresh' content='1;url=http://localhost/%5BUDPT%5DDATH/form_SignUp.php'/>"; 			
			return;
		}
		if(($password != $passwordconfirm) || ($email != $emailconfirm))
		{
			echo "<script>alert('Lỗi! Passwordconfirm/Emailconfirm không giống với Password/Email. Yêu cầu hiệu chỉnh lại!');</script>";
			echo "<meta http-equiv='refresh' content='1;url=http://localhost/%5BUDPT%5DDATH/form_SignUp.php'/>"; 
			return;
		}
		else
		{
			// mã hóa password = md5
			$password = md5($password);									
			// tìm xem tên user có trong csdl hay chưa?
			$check_user_name = mysql_query("select UserName from nguoi_dung where UserName = '$username'");
			// tìm xem email có trong csdl hay chưa?
			$check_email = mysql_query("select Email from nguoi_dung where Email = '$email'");
			if((mysql_num_rows($check_user_name) == 0) && (mysql_num_rows($check_email) == 0))
			{
				//$doi_tuong->MaDoiTuong = '';
				$doi_tuong->TenDoiTuong = 'NormalUser';
				// tạo một đối tượng người dùng insert vào csdl:
				$result_doituong = DoiTuongDAO::ThemDoiTuong($doi_tuong);
				if($result_doituong != 0)
				{											
					$nguoi_dung->MaNguoiDung = $result_doituong;
					$nguoi_dung->MaLoaiND = 2;
					$nguoi_dung->MaGianHang = '';
					$nguoi_dung->Username = $username;
					$nguoi_dung->HoTen = $fullname;
					$nguoi_dung->NgaySinh = $datepicker;
					$nguoi_dung->GioiTinh = $gender;
					$nguoi_dung->DiaChi = '';
					$nguoi_dung->MatKhau = $password;
					$nguoi_dung->Email = $email;
					$nguoi_dung->TinhTrang = 1;
					$nguoi_dung->AnhDaiDien = '';
					$result = NguoiDungDAO::ThemNguoiDung($nguoi_dung);
					//$result = mysql_query("
		//insert into nguoi_dung(`MaNguoiDung`, `MaLoaiND`, `MaGianHang`, `UserName`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `MatKhau`, `Email`, `TinhTrang`, `AnhDaiDien`)
		//values ('$record','3','','$username','$fullname','$datepicker','$gender','','$password','$email',1,'')");
					if($result)
					{
						echo "<p> Đăng ký thành công Quay về Trang chủ </p>";
						echo "<meta http-equiv='refresh' content='3;url=http://localhost/%5BUDPT%5DDATH/index.html'/>";
					}
					else
					{
						echo "<p>Lỗi đăng ký</p>";
						echo "<meta http-equiv='refresh' content='3;url=http://localhost/%5BUDPT%5DDATH/form_SignUp.php'/>"; 	
					}											
				}
				else
				{
					echo "<script>alert('Lỗi hệ thống! Vui lòng thử lại');</script>";
					echo "<meta http-equiv='refresh' content='3;url=http://localhost/%5BUDPT%5DDATH/form_SignUp.php'/>";
				}
			}
			else
			{
				echo "<script>alert('Lỗi! Tên đăng nhập hay địa chỉ email đã có người sử dụng');</script>";
				echo "<meta http-equiv='refresh' content='3;url=http://localhost/%5BUDPT%5DDATH/form_SignUp.php'/>"; 	
			}
		}				
	}
?>