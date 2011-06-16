	function checkLength( o, min, max ) 
	{
			if ( o.length > max || o.length < min ) 
			{
				return false;
			} 
			else 
			{
				return true;
			}
		}

	function checkRegexp( o, regexp) 
	{
		if (!(regexp.test(o))) 
		{
			return false;
		} 
		else 
		{
			return true;
		}
	}
	
	function check_info_signUp()
	{
		var frm = document.forms["frmDangKyTaiKhoan"];	
		var name = frm.elements["txtUsername"];
		var email = frm.elements["txtEmail"];
		var	password1 = frm.elements["txtPassword"];
		var	password2 = frm.elements["txtPassConfirm"];
		var	hoten = frm.elements["txtHoTen"];
		var diachi = frm.elements["txtDiaChi"];
				
		if(checkLength(name.value,6,20) == false)
		{
			alert('Tên tài khoản phải từ 6 đến 20 ký tự !');
			name.focus();
			return false;
		}
		if(checkRegexp(name.value, /^[0-9a-z]([0-9a-z_])+$/i) == false)
		{
			alert('Tên tài khoản không được có những ký tự đặc biệt !');
			name.focus();
			return false;
		}
		
		if(checkLength(password1.value,6,20) == false)
		{
			alert('Mật khẩu có độ dài từ 6  đến 20 ký tự!');
			password1.focus();
			return false;
		}
		if(checkRegexp(password1.value, /^([0-9a-zA-Z])+$/) == false)
		{
			alert('Mật khẩu không được có những ký tự đặc biệt!');
			password1.focus();
			return false;
		}
			
		// trùng khớp mật khẩu
		if(!(password1.value === password2.value))
		{
			alert('Mật khẩu không trùng khớp!');
			password2.focus();
			return false;
		}
		
		if(checkLength(email.value,6,80) == false)
		{
			alert('Email từ 6 đến 80 ký tự !');
			email.focus();
			return false;
		}
		if(checkRegexp(email.value, /\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3}/))
		{
			alert('Email nhập không hợp lệ !');
			email.focus();
			return false;
		}
		
		if(checkLength(hoten.value,0,30) == false)
		{
			alert('Họ tên có chiều dài tối đa 30 ký tự !');
			hoten.focus();
			return false;
		}
		
		if(checkLength(diachi.value,0,100) == false)
		{
			alert('Địa chỉ có chiều dài tối đa 100 ký tự !');
			diachi.focus();
			return false;
		}
		
		
		//return confirm('Tôi đã đọc, và đồng ý tuân theo điều khoản đăng ký thành viên của Shopping-Here - Mua bán và giới thiệu sản phẩm online');
		alert("reurh");
		return true;		
	}
	
	function kttaogianhang()
	{
		
			var tengianhang = $( "#tengianhang" );

		if(checkLength(tengianhang,6,20) == false)
			{
				alert('Tên gian hàng phải từ 6 đến 20 ký tự !');
				return false;
			}
		if(checkRegexp(tengianhang, /^[0-9a-z]([0-9a-z_])+$/i) == false)
			{
				alert('Bao gồm các ký tự chữ cái, số, gạch dưới. Không bao gồm các ký tự đặc biệt !');
				return false;
			}
		else
		{
			alert( "andh");
			return confirm('Khi đã đăng ký tạo gian hàng trong hệ thống, tức là bạn đã đọc , đã nhất trí &amp; hoàn toàn tuân thủ theo điều lệ hoạt động của 		Shopping-Here ?');
			return true;
		}
	}
	
	
	
	function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}

function prepareInputsForHints() {
	var inputs = document.getElementsByTagName("input");
	for (var i=0; i<inputs.length; i++){
		// test to see if the hint span exists first
		if (inputs[i].parentNode.getElementsByTagName("span")[0]) {
			// the span exists!  on focus, show the hint
			inputs[i].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			// when the cursor moves away from the field, hide the hint
			inputs[i].onblur = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "none";
			}
		}
	}
	// repeat the same tests as above for selects
	var selects = document.getElementsByTagName("select");
	for (var k=0; k<selects.length; k++){
		if (selects[k].parentNode.getElementsByTagName("span")[0]) {
			selects[k].onfocus = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
			}
			selects[k].onblur = function () {
				this.parentNode.getElementsByTagName("span")[0].style.display = "none";
			}
		}
	}
}
addLoadEvent(prepareInputsForHints);
