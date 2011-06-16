  <div class="header">
	<div class="header-left"></div>
    <!--end .header-left-->    
    <div class="header-right">
    	<div class="header-navigator">
   	  		<ul> 
                <?php
					//kiểm tra xem user có đăng nhập hay chưa?
					if($_SESSION['IsLogin'] == 0)
					{
						// chưa login
						echo "	<li><a href='index.php'><span id='btnViewDangNhap'>Đăng nhập</span></a></li>                
                				<li><a href='dang_ky.php'>Đăng ký</a></li>
								<li><a href='ds_gian_hang.php'>Gian hàng</a></li>                
								<li><a href='index.php'>Trang chủ</a></li>
								<li><a href=''>Chào khách </a></li>
								";
						//header('Location:index.php');
					}
					else
					{
						echo "	<li><a href='trang_ca_nhan.php'><span id='btnViewTaiKhoan'>Tài khoản</span></a></li>
								<li><a href='ds_gian_hang.php'>Gian hàng</a></li>                
								<li><a href='index.php'>Trang chủ</a></li>
								<li><a href='trang_ca_nhan.php'>Chào ".$_SESSION['UserName'].",  </a></li>
								";
					}
				?>
                <!--<li> <a href="trang_ca_nhan.php"><span id="btnViewTaiKhoan">Tài khoản</span></a></li>
                <li><a href="ds_gian_hang.php">Gian hàng</a></li>                
                <li> <a href="index.php">Trang chủ</a></li>-->
            </ul> 
            <!--end menu-->            
            <div class="login-wrapper">
           	  <div class="login-content" >
              	 <form action="./form_SignIn.php" method="post" onsubmit="return check_info_signIn();"> 
               	  <div class="username-login">
                            <label for="navbar_username">Thành Viên:</label><br />
                            <input name="txtUserName" id="txtUserName" size="16" type="text" class="ui-widget-content"  /> 
                          </div>
                  <div class="pass-login">
                            <label for="navbar_password">Mật khẩu:</label><br />
                            <input name="txtPassword" id="txtPassword" size="16" type="password" class="ui-widget-content"  />
                         </div>                            
                  <div class="remember">
                            <label for="cb_cookieuser_navbar">
                                <input name="cookieuser" value="1" id="cb_cookieuser_navbar" class="cb_cookieuser_navbar" accesskey="c" tabindex="103" type="checkbox"> Ghi Nhớ? 
                            </label> 
                          </div>
                          <div class="login-button">
	                          <input value="Ðăng Nhập" type="submit" class="ui-widget ui-state-default "  name="btnLogin"/> 
                          </div>
                          <div class="forget-pass">
                          		<a href="#"> Quên mật khẩu </a>
                    </div>
                        	<input name="s" value="" type="hidden">
							<input name="securitytoken" value="guest" type="hidden"> <input name="do" value="login" type="hidden">
							<input name="vb_login_md5password" type="hidden"> <input name="vb_login_md5password_utf" type="hidden">
                    </form>
              </div>
            </div>
            <!--end .login-wrapper-->
            <div class="account-wrapper">
           	  <div class="account-content">
              	<div class="account-content-line">
               	  <div class="profile-page"><a href="trang_ca_nhan.php?id=tcn">Trang cá nhân</a></div>
                </div>
              	<div class="account-content-line">
                	<div class="my-orders"><a href="trang_ca_nhan.php?id=ddh">Đơn hàng của tôi</a></div>
                </div>
                <div class="account-content-line">
                	 <div class="my-shop"><a href="gian_hang.php">Gian hàng của tôi</a></div>
                </div>
                <div class="account-content-line">
                	<div class="logout"><a href="form_SignOut.php">Đăng xuất</a></div>
                </div>
                
           	  </div>
            </div>
            <!--end .account-wrapper-->
      </div>
        <!--end .header-navigator-->	
        <div class="search">
          	<form action="" method="get" name="frmSearch" class="search-frm" >                
                <label>
                	<input name="txtSearchIndex" type="text" id="search-input" class="ui-corner-left" title="*Tìm kiếm gian hàng - sản phẩm ..." />
                    <input type="button" id="search-btn" value="Search" class="ui-state-default ui-widget ui-corner-right" />
                </label> 
                                           
                <div id="advance-search"><a href="tim_kiem.php">Tìm kiếm nâng cao </a></div>    
           	</form>
        	<!--end .frmSearch-->                	
      	</div>
      	<!--end .search-->	
    </div>
    <!--end .header-right-->
  </div>
  <!--end .header-->

