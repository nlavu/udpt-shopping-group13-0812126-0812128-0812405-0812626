<div class="sign-up-wrapper">
   		<div class="sign-up">
       	  	<div class="title">Đăng ký tài khoản</div>
            <form action="../addmember.php" method="post" onsubmit="return check_info_signUp();">
           		<div class="content">
          		<div class="title" >1. Thông tin tài khoản</div>
           	  	<div class="sub-content">                	
                    <div class="row"> 
<div class="leftcol">
                       	  <label for="regusername">Tài khoản:</label> 
                        </div>
                        <!--end .leftcol-->
                  <div class="rightcol"> 										  
                            <input name="txtusername" type="text" class="primary textbox" id="txtusername" tabindex="1" value="" size="30" maxlength="16" autocomplete="off"> 
                         	 &nbsp;<span class="hint">Tài khoản từ 3 đến 20 ký tự và không có ký tự đặc biệt<span class="hint-pointer">&nbsp;&nbsp;&nbsp;</span></span>
                          	<div id="reg_verif_div" class="primary" style="display:none;"></div><br />  
                            Xin hãy điền tên mà bạn thích được hiển thị trên diễn đàn. 
                      </div> 
                        <!--end .rightcol-->
                    </div> 
                    <!--end .row tài khoản-->
                    <div class="row"> 
                        <div class="leftcol">
                        	<label for="password">Mật khẩu:</label> 
                        </div>
                      	<div class="rightcol">
                        	<input name="txtpassword" type="password" class="textbox" id="password" tabindex="1" value="" size="30" maxlength="16">
                            &nbsp;<span class="hint">Email từ 6 đến 80 ký tự <span class="hint-pointer">&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                    </div>
                    <!--end .row  mật khẩu-->
                    <div class="row">
                   	  	<div class="leftcol">
                        	<label for="passwordconfirm">Xác nhận mật khẩu:</label> 
                        </div>
                        <div class="rightcol">
                        	<input name="txtpasswordconfirm" type="password" class="textbox" id="passwordconfirm" tabindex="1" value="" size="30" maxlength="16"> 
                            <br />
                            Xin chọn mật mã cho tài khoản của bạn. <br>
                        	<b>Chú ý:</b> mật  mã được phân biệt bởi chữ 'thường' và 'HOA'.<br />
                      </div> 
                  	</div> 
                    <!--end .row xác nhận mật khẩu-->
                    <div class="row">
                   	  	<div class="leftcol">
                        	<label for="email">Ðịa Chỉ Email:</label>
                        </div>
                        <div class="rightcol">
                        	<input name="txtemail" type="text" class="textbox" id="email" tabindex="1" dir="ltr" value="" size="40" maxlength="50">                           &nbsp;<span class="hint">Email từ 6 đến 80 ký tự <span class="hint-pointer">&nbsp;&nbsp;&nbsp;</span></span>
                      	</div> 
                  	</div>
                    <!--end .row email-->
                    <div class="row">
                   	  	<div class="leftcol">
                        	<label for="emailconfirm">Nhập lại Email một lần nữa:</label> 
                        </div>
                        <div class="rightcol">
                        	<input name="emailconfirm" type="text" class="textbox" id="emailconfirm" tabindex="1" dir="ltr" value="" size="40" maxlength="50"> 
                            <br />
                           Hãy điền đúng địa chỉ email của bạn.
                      </div> 
                  	</div>
                    <!--end .row nhắc lại email-->
                    <div class="row">
                    	<div class="leftcol">
                        	<label for="recaptcha_challenge_field">Hình bảo mật</label>
                        </div>
                        <div class="rightcol">
                        	<table>
                            	<tr>
                                	<td>
                                    	<img src="../capcha/CaptchaSecurityImages.php?width=100&height=40&characters=5" />
                                    </td>
                                    <td>
                                    	<a href="#" onclick="re_capcha();"><img src="image/refresh_capcha.png" /></a>
                                    </td>
                                </tr>
                                <tr>
                                	<td>
                                    	<input id="security_code" name="security_code" type="text" tabindex="1"/><br />
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!--end .row capcha-->
                </div>
                <!--end .sub-content thông tin tài khoản-->
              <div class="title" >2. Thông tin cá nhân</div>
       	  	  <div class="sub-content">
                	 <div class="row">
                   	  	<div class="leftcol">
                        	<label>Họ và Tên:</label> 
                        </div>
                        <div class="rightcol">
                        	<input name="fullname" type="text" id="regfullname" size="30" tabindex="1"> 
                            <div style="display:none;" class="primary" id="reg_verif_div"></div> 
                      </div> 
                  	</div>
                    <!--end .row họ tên-->
                     <div class="row">
                   	  	<div class="leftcol">
                        	<label>Giới tính:</label> 
                        </div>
                        <div class="rightcol">
                   	  <select name="combobox" id="cfield_5" tabindex="1"> 
                                <option value="0" selected="selected"></option> 
                                <option value="1">Nam</option> 
                                <option value="2">Nữ</option>
                            </select> 
                            <input name="userfield[field5_set]" value="1" type="hidden"> 
                      </div> 
                  	</div>
                    <!--end .row giới tính--> 
                    <div class="row">
                   	  	<div class="leftcol">
                        	<label>Ngày Sinh:</label> 
                        </div>
                        <div class="rightcol">
                        	<input name="datepicker" type="text" id="dtpNgaySinh" size="20" tabindex="1">  
                            <div style="display:none;" class="primary" id="reg_verif_div"></div>
                      </div> 
                  	</div>
                    <!--end .row ngày sinh-->
                     <div class="row">
                   	  	<div class="leftcol">
                        	<label for="address">Địa chỉ:</label> 
                        </div>
                        <div class="rightcol">
                        	<input name="address" type="text" class="textbox" id="address" tabindex="1" dir="ltr" value="" size="40" maxlength="50"> 
                            <br />                           
                      </div> 
                  	</div>
                    <!--end .row địa chỉ-->
                     <div class="row">
                   	  	<div class="leftcol">
                        	<label for="avatar">Ảnh đại diện</label> 
                        </div>
                        <div class="rightcol">
                       	  <input name="" type="file" size="40"/>
                      </div> 
                  	</div>
                    <!--end .row ảnh đại diện-->
              </div>
                 <!--end .sub-content thông tin cá nhân-->
              <div class="title" >Nội quy website</div>
           	    <div class="sub-content">
                	<strong>Quy định Website ShoppingHere</strong><br /><br />
					Xin hãy dành vài phút để đọc các nội quy và các quy định của Website.<br /> 					
                    <b>
                        <font color="#FF0000">
                        1) Đọc kỹ <a target="_blank" href="#">"Điều khoản và Quy Định của Website"</a>.<br>
                        2) Dùng Tiếng Việt có dấu khi sử dụng Website.<br>
                        3) Tài khoản của bạn sẽ bị xóa nếu bạn vi phạm các nguyên tắc bán hàng.<br /><br />
                        </font>
                    </b>
					Xin nhớ là chúng tôi không chịu trách nhiệm về bất kỳ bài viết nào đăng trong diễn đàn. Chúng tôi không đảm bảo sự chính xác, hoàn hảo hoặc hữu ích của bất kỳ bài viết nào, và không chịu trách nhiệm về nội dung của bất kỳ bài viết nào. <br /><br />
                   Các bài viết bộc lộ quan điểm của người viết bài, không nhất thiết là quan điểm của diễn đàn. Bất kỳ thành viên nào cảm thấy một bài viết có nội dung không lành mạnh thì xin hãy thông báo cho chúng tôi biết bằng email. Chúng tôi có khả năng xóa bài viết có nội dung không lành mạnh và chúng tôi sẽ cố gắng để làm như thế trong thời gian sớm nhất nếu chúng tôi xét thấy việc xóa bài viết là cần thiết.<br /><br />
            	</div>
                <!--end .sub-content-->
          	</div>
            <!--end .account-->
          	<div class="action">
       	  	  <input type="submit" value="Đăng Ký" class="ui-button ui-state-default ui-state-hover"  name="btnRegister" onclick="return kiemtra();" /> 
			  <input type="reset" value="Hủy Bỏ Tất Cả" name="Reset" class="ui-button ui-state-default ui-state-hover" /> 
          	</div>
            <!--end .action-->
   		</div>
            </form>
          	
        <!--end .sign-up-->
      </div>