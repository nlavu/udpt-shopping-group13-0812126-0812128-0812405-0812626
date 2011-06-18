<?php 
$frmThongBao_BD ="
<div class='sign-up-wrapper'>
   		<div class='sign-up'>
       	  	<div class='title'>Thông báo đăng ký tài khoản</div>
            <div class='text-color-normal-1 ui-state-highlight'>";            	
$frmThongBao_KT =" </div>
        </div>
</div>";

$frmDangKy="
<div class='sign-up-wrapper'>
   		<div class='sign-up'>
       	  	<div class='title'>Đăng ký tài khoản</div>
            <form action='dang_ky.php' method='post' name='frmDangKyTaiKhoan' onsubmit='return check_info_signUp();'>
           		<div class='content'>
          		<div class='title' >1. Thông tin tài khoản</div>
           	  	<div class='sub-content'>                	
                    <div class='row'> 
						<div class='leftcol'>
                       	  <label for='txtUsername'>Tài khoản:</label> 
                        </div>
                        <!--end .leftcol-->
                  		<div class='rightcol'> 										  
                            <input name='txtUsername' type='text' class='primary textbox verifyText' id='txtUsername' tabindex='1' size='30' maxlength='16' autocomplete='off' /> 
                         	 &nbsp;<span class='field-hint'>Tên tài khoản từ 6 đến 20 ký tự và không có ký tự đặc biệt<span class='hint-pointer'>&nbsp;&nbsp;&nbsp;</span></span><br /> 
                             Tên tài khoản là tên sẽ hiển thị trong website. <br>
                    	</div> 
                    	<!--end .rightcol-->
                    </div> 
                    <!--end .row tài khoản-->
                    <div class='row'> 
                        <div class='leftcol'>
                        	<label for='txtPassword'>Mật khẩu:</label> 
                        </div>
                      	<div class='rightcol'>
                        	<input name='txtPassword' type='password' class='textbox' id='txtPassword' tabindex='1' value='' size='30' maxlength='16' />
                            &nbsp;<span class='field-hint'>Mật khẩu có độ dài từ 6 đến 20 ký tự<span class='hint-pointer'>&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                    </div>
                    <!--end .row  mật khẩu-->
                    <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='txtPassConfirm'>Xác nhận mật khẩu:</label> 
                        </div>
                        <div class='rightcol'>
                        	<input name='txtPassConfirm' type='password' class='textbox' id='txtPassConfirm' tabindex='1' value='' size='30' maxlength='16'/> 
                            &nbsp;<span class='field-hint'>Mật khẩu có độ dài từ 6 đến 20 ký tự<span class='hint-pointer'>&nbsp;&nbsp;&nbsp;</span></span>
                            <br />
                            Xin chọn mật khẩu cho tài khoản của bạn. <br>
                        	<b>Chú ý:</b> mật  khẩu được phân biệt bởi chữ 'thường' và 'HOA'.<br />
                      </div> 
                  	</div> 
                    <!--end .row xác nhận mật khẩu-->
                    <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='txtEmail'>Ðịa Chỉ Email:</label>
                        </div>
                        <div class='rightcol'>
                        	<input name='txtEmail' type='text' class='textbox' id='txtEmail' tabindex='1' dir='ltr' value='' size='40' maxlength='50'>                           &nbsp;<span class='field-hint'>Email từ 6 đến 80 ký tự <span class='hint-pointer'>&nbsp;&nbsp;&nbsp;</span></span>
                      	</div> 
                  	</div>
                    <!--end .row email-->
                    <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='txtEmailConfirm'>Nhập lại Email một lần nữa:</label> 
                        </div>
                        <div class='rightcol'>
                        	<input name='txtEmailConfirm' type='text' class='textbox' id='txtEmailConfirm' tabindex='1' dir='ltr' value='' size='40' maxlength='50'> 
                            <br />
                           Hãy điền đúng địa chỉ email của bạn.
                      </div> 
                  	</div>
                    <!--end .row nhắc lại email-->
                    <div class='row'>
                    	<div class='leftcol'>
                        	<label for='recaptcha_challenge_field'>Hình bảo mật</label>
                        </div>
                        <div class='rightcol'>
                        	<table>
                            	<tr>
                                	<td>
                                    	<img src='capcha/CaptchaSecurityImages.php?width=100&height=40&characters=5' />
                                    </td>
                                    <td>
                                    	<a href='#' onclick='re_capcha();'><img src='image/refresh_capcha.png' /></a>
                                    </td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input id='security_code' name='security_code' type='text' tabindex='1'/><br />
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!--end .row capcha-->
                </div>
                <!--end .sub-content thông tin tài khoản-->
              <div class='title' >2. Thông tin cá nhân</div>
       	  	  <div class='sub-content'>
                	 <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='txtHoTen'>Họ và Tên:</label> 
                        </div>
                        <div class='rightcol'>
                        	<input name='txtHoTen' type='text' id='txtHoTen' size='30' tabindex='1'>
                            &nbsp;<span class='field-hint'>Họ tên có chiều dài tối đa 30 ký tự. <span class='hint-pointer'>&nbsp;&nbsp;&nbsp;</span></span><br /> 
                      </div> 
                  	</div>
                    <!--end .row họ tên-->
                     <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='cboGioiTinh' >Giới tính:</label> 
                        </div>
                        <div class='rightcol'>
                   	  		<select name='cboGioiTinh' id='cboGioiTinh' tabindex='1'> 
                                <option value='1'>Nam</option> 
                                <option value='2'>Nữ</option>
                            </select> 
                      </div> 
                  	</div>
                    <!--end .row giới tính--> 
                    <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='dtpNgaySinh'>Ngày Sinh:</label> 
                        </div>
                        <div class='rightcol'>
                        	<input name='dtpNgaySinh' type='text' id='dtpNgaySinh' size='20' tabindex='1'>
                      </div> 
                  	</div>
                    <!--end .row ngày sinh-->
                     <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='txtDiaChi'>Địa chỉ:</label> 
                        </div>
                        <div class='rightcol'>
                        	<input name='txtDiaChi' type='text' class='textbox' id='txtDiaChi' tabindex='1' dir='ltr' value='' size='40' maxlength='50'> 
                            &nbsp;<span class='field-hint'>Địa chỉ có chiều dài tối đa 50 ký tự. <span class='hint-pointer'>&nbsp;&nbsp;&nbsp;</span></span><br />                            
                      </div> 
                  	</div>
                    <!--end .row địa chỉ-->
                     <div class='row'>
                   	  	<div class='leftcol'>
                        	<label for='fileAnhDaiDien'>Ảnh đại diện</label> 
                        </div>
                        <div class='rightcol'>
                       	  <input name='fileAnhDaiDien' type='file' size='40'/>
						  &nbsp;<span class='field-hint'>Website chỉ hỗ trợ file ảnh dạnh .gif, .ipeg. <span class='hint-pointer'>&nbsp;&nbsp;&nbsp;</span></span><br />
                      </div> 
                  	</div>
                    <!--end .row ảnh đại diện-->
              </div>
              <!--end .sub-content thông tin cá nhân-->
              <div class='title' >Nội quy website</div>
           	    <div class='sub-content'>
                	<strong>Quy định Website ShoppingHere</strong><br /><br />
					Xin hãy dành vài phút để đọc các nội quy và các quy định của Website.<br /> 					
                    <b>
                        <font color='#FF0000'>
                        1) Đọc kỹ <a target='_blank' href='#'>'Điều khoản và Quy Định của Website'</a>.<br>
                        2) Dùng Tiếng Việt có dấu khi sử dụng Website.<br>
                        3) Tài khoản của bạn sẽ bị xóa nếu bạn vi phạm các nguyên tắc bán hàng.<br /><br />
                        </font>
                    </b>
					Xin nhớ là chúng tôi không chịu trách nhiệm về bất kỳ bài viết nào đăng trong diễn đàn. Chúng tôi không đảm bảo sự chính xác, hoàn hảo hoặc hữu ích của bất kỳ bài viết nào, và không chịu trách nhiệm về nội dung của bất kỳ bài viết nào. <br /><br />
                   Các bài viết bộc lộ quan điểm của người viết bài, không nhất thiết là quan điểm của diễn đàn. Bất kỳ thành viên nào cảm thấy một bài viết có nội dung không lành mạnh thì xin hãy thông báo cho chúng tôi biết bằng email. Chúng tôi có khả năng xóa bài viết có nội dung không lành mạnh và chúng tôi sẽ cố gắng để làm như thế trong thời gian sớm nhất nếu chúng tôi xét thấy việc xóa bài viết là cần thiết.<br /><br />
            	</div>
                <!--end .sub-content-->
          	</div>
            <!--end .content-->
          	<div class='action'>
       	  	  <input type='submit' value='Đăng Ký' class='ui-button ui-state-default ui-state-hover'  name='btnRegister' /> 
			  <input type='reset' value='Hủy Bỏ Tất Cả' name='Reset' class='ui-button ui-state-default ui-state-hover' /> 
          	</div>
            <!--end .action-->   		
            </form>
        </div>	
        <!--end .sign-up-->    
 </div>";
 ?>
 
 
 
 <?php
 	$mess ="";
	//echo "xử lý đăng ký ";
	if(isset($_POST["btnRegister"]) && isset($_POST["txtUsername"]) 
		&& isset($_POST["txtPassword"])	&& isset($_POST["txtEmail"]))
	{
		require_once 'class/NguoiDungDAO.php';
		require_once 'class/NguoiDungDTO.php';
		require_once 'class/DoiTuongDAO.php';
		require_once 'class/DoiTuongDTO.php';
		$doi_tuong = new DoiTuongDAO();// tạo đối tượng mới là người dùng
		$nguoi_dung = new NguoiDungDAO();// tạo đối tượng người dùng DAO
		
		$nguoi_dung->UserName = $_POST["txtUsername"];
		$nguoi_dung->MaLoaiND = 1;
		$nguoi_dung->MaGianHang = '';
		// mã hóa password = md5
		$password = md5($_POST["txtPassword"]);	
		$nguoi_dung->MatKhau = $password;
		$nguoi_dung->Email = $_POST["txtEmail"];
		$nguoi_dung->TinhTrang = 1;
		//họ tên
		if (isset($_POST["txtHoTen"]))
			$nguoi_dung->HoTen = $_POST["txtHoTen"];
		else
			$nguoi_dung->HoTen ='';
		// địa chỉ	
		if (isset($_POST["txtDiaChi"]))
			$nguoi_dung->DiaChi = $_POST["txtDiaChi"];
		else
			$nguoi_dung->DiaChi = '';
		// ngày sinh	
		if (isset($_POST["dtpNgaySinh"]))
			$NgaySinh = $_POST["dtpNgaySinh"];	
		else
			$NgaySinh = '1/1/1900';
		$nguoi_dung->NgaySinh  = date("Y-m-d", strtotime($NgaySinh));
			
		$nguoi_dung->AnhDaiDien = '';		
		// chuyển về định dạng YYYY-mm-dd để insert vào mysql		
		// giới tính
		if (isset($_POST["cboGioiTinh"]))
			$nguoi_dung->GioiTinh = $_POST["cboGioiTinh"];
		else
			$nguoi_dung->GioiTinh = 1;
		
		// tìm xem tên user có trong csdl hay chưa?
		$check_user_name = NguoiDungDAO::LayThongTinNguoiDungTheoTenTaiKhoan($nguoi_dung->UserName);
		if (!is_null($check_user_name))
		{
			$mess .="Tên tài khoản đã tồn tại, <a href='dang_ky.php'>click vào đây </a> để thử lại.";
			echo $frmThongBao_BD.$mess.$frmThongBao_KT;
			return;
		}
		// tìm xem email có trong csdl hay chưa?
		$check_email = NguoiDungDAO::LayThongTinNguoiDungTheoEmail($nguoi_dung->Email);	
		if (!is_null($check_email))
		{
			$mess .="Email đã tồn tại, <a href='dang_ky.php'>click vào đây </a> để thử lại.";
			echo $frmThongBao_BD.$mess.$frmThongBao_KT;
			return;
		}
		// tạo folder người dùng
		$structure ="./users/".$nguoi_dung->UserName."/theme/";
		if (!mkdir($structure, 0, true)) {
			die('Failed to create folders...');
			return;
		}
		$structure ="./users/".$nguoi_dung->UserName."/product/";
		if (!mkdir($structure, 0, true)) {
			die('Failed to create folders...');
			return;
		}
		
		// xử lý ảnh đại diện
		$types = array('image/jpeg', 'image/gif','image/pjpeg'); 
		$fileName = "";
		// kiểm tra file upload		
		if (!empty($_FILES))
		{
			//echo "Kiểm tra up file";
			
			$file = $_FILES['fileAnhDaiDien'];
			//echo $file['error'];
			
			if (!in_array($file['type'], $types)) 
			{			
				$mess .= "<br><span class='error'>Website chỉ hỗ trợ file kiểu *.gif, *.jpeg, bạn <a href='dang_ky.php'>click vào đây </a> để thử lại.</span><br/><br/>";	
				echo $frmThongBao_BD.$mess.$frmThongBao_KT;
				return;
			}		
			
			if ($file['error'] != 0)
			{
				$mess .= "<br><span class='error'>Up ảnh bị lỗi, bạn có thể vào <a href='trang_ca_nhan.php'>trang cá nhân </a> để up lại.</span><br/><br/>";				
			}
			// move file & đổi tên ...
			$dir = "users/".$nguoi_dung->UserName."/".$file['name'];
			if (!move_uploaded_file($file['tmp_name'], $dir))
			{
				$mess .= "<br><span class='error'>Up ảnh bị lỗi, bạn có thể vào <a href='trang_ca_nhan.php'>trang cá nhân </a> để up lại.</span><br/><br/>";
			}
			
			//upfile thành công
			$nguoi_dung->AnhDaiDien = $dir;
		}
	
		// insert vào CSDL
		mysql_connect("localhost","root","") or die("Not connect host");
		mysql_select_db("shopping_here") or die("Not connect database");
		
		// insert đối tượng
		$doi_tuong->TenDoiTuong = 'Nguoi mua';
		$result_doituong = DoiTuongDAO::ThemDoiTuong($doi_tuong);
		if($result_doituong)
		{											
			$nguoi_dung->MaNguoiDung = $result_doituong;			
			$result = NguoiDungDAO::ThemNguoiDung($nguoi_dung);
			
			if($result)
			{
				$_SESSION['IsLogin'] = 1;
				$_SESSION['IdUser'] = $nguoi_dung->MaNguoiDung;
				$_SESSION['UserName'] = $nguoi_dung->UserName;
				$_SESSION['Authentication'] = 'Nguoi mua';
				$mess .= "<p>
                 Bạn đã đăng ký thành công, 
                 click vào đây để về <span class='text-color-bold-1'><a href='trang_ca_nhan.php'>trang cá nhân</a></span> 
                 hoặc về <span class='text-color-bold-1'><a href='index.php'>trang chủ.</a></span>                 </p>";
				 echo $frmThongBao_BD.$mess.$frmThongBao_KT;
			}
			else
			{
				$mess .= "<p>
                 Quá trình đăng ký bị lỗi 1, 
                 <span class='text-color-bold-1'>
				 <a href='dang_ky.php'>click vào đây </a> để thử lại.</a>
				 </span>                 
				 </p>";
				 echo $frmThongBao_BD.$mess.$frmThongBao_KT;
			}											
		}
		else
		{
			$mess .= "<p>
                 Quá trình đăng ký bị lỗi 2, 
                 <span class='text-color-bold-1'>
				 <a href='dang_ky.php'>click vào đây </a> để thử lại.</a>
				 </span>                 
				 </p>";
			echo $frmThongBao_BD.$mess.$frmThongBao_KT;
		}
	}
	
	else
	{
		echo $frmDangKy;
	}
?>