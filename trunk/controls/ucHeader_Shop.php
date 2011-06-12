<div class="header">
	<div class="header-left">
    	<a href="index.html">Shopping HERE</a>
    </div>
    <!--end .header-left-->    
    <div class="header-right">
    	<div class="header-navigator">
   	  		<ul>            	
            	<li><a href="#"><span id="btnViewDangNhap">Đăng nhập</span></a></li>                
                <li> <a href="dang_ky.php">Đăng ký</a></li>     
                <li> <a href="trang_ca_nhan.php"><span id="btnViewTaiKhoan">Tài khoản</span></a></li>
                <li><a href="ds_gian_hang.php">Gian hàng</a></li>                
                <li> <a href="index.php">Trang chủ</a></li>
            </ul> 
            <!--end menu-->            
            <div class="login-wrapper">
           	  <div class="login-content" >
              		<form action="login.php?do=login" method="post" onsubmit="md5hash(vb_login_password, vb_login_md5password, vb_login_md5password_utf, 0)"> 
               	  <div class="username-login">                   							
                            <label for="navbar_username">Thành Viên:</label><br />
                            <input name="vb_login_username" id="navbar_username" size="16" type="text" class="ui-widget-content"> 
                          </div>
                  <div class="pass-login">
                            <label for="navbar_password">Mật khẩu:</label><br />
                            <input name="vb_login_password" id="navbar_password" size="16" type="password" class="ui-widget-content">
                         </div>                            
                  <div class="remember">
                            <label for="cb_cookieuser_navbar">
                                <input name="cookieuser" value="1" id="cb_cookieuser_navbar" class="cb_cookieuser_navbar" accesskey="c" tabindex="103" type="checkbox"> Ghi Nhớ? 
                            </label> 
                          </div>
                          <div class="login-button">
	                          <input value="Ðăng Nhập" type="submit" class="ui-widget ui-state-default "  /> 
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
               	  <div class="profile-page"><a href="trang_ca_nhan.php">Trang cá nhân</a></div>
                </div>
              	<div class="account-content-line">
                	<div class="my-orders"><a href="trang_ca_nhan.php">Đơn hàng của tôi</a></div>
                </div>
                <div class="account-content-line">
                	 <div class="my-shop"><a href="gian_hang.php">Gian hàng của tôi</a></div>
                </div>
                <div class="account-content-line">
                	<div class="logout"><a href="#">Đăng xuất</a></div>
                </div>
                
           	  </div>
            </div>
            <!--end .account-wrapper-->
      </div>
        <!--end .header-navigator-->	       
    </div>
    <!--end .header-right-->
  </div>
  <!--end .header-->
  <div class="header-shop">
  	<div class="back-ground">
    	banner của gian hàng
   	  <img src="#" />
    </div>
  </div>
  <!--end .header-shop-->
  <div class="slogan-shop">
  	<div class="content ui-corner-all">Content for  class "content" Goes Here</div>
  </div>
  <!--end .slogan-shop-->
  <div class="menu-shop-wrapper">
	 <div class="menu-shop">
        <ul>
            <li><a href="gian_hang.php">Trang chủ</a></li>
            <li><a href="ds_san_pham.php">Sản phẩm</a></li>
            <li><a href="ds_su_kien.php">Sự kiện</a></li>
          <li><a href="gian_hang.php">Về gian hàng</a></li>
            
        </ul>
        <!--end ul menu-->            
     </div>
     <!--end .menu-shop-->
     <div class="menu-search ui-corner-all">
   	   <div class="content">
       		<form action="" method="get" name="frmSearchShop">
            	<input name="txtSearchShop" type="text" id="search-input-shop" value="Tìm kiếm trong gian hàng ..." />
                <input name="btnSearchShop" type="submit" value="" id="search-btn-shop" class="ui-state-default ui-widget ui-corner-right" />
            </form>
       </div>
     </div>
     <!--end .menu-search-->
  </div>
  <!--end .menu-shop-wrapper-->