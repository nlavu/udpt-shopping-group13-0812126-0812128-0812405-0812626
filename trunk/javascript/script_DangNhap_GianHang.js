// JavaScript Document
function check_info_signIn()
{
	var username = document.getElementById("txtUserName").value;
	var password = document.getElementById("txtPassword").value;
	var error = 'Bạn chưa điền đầy đủ thông tin đăng nhập!';
	if(!username || !password)
	{
		alert(error);
		return false;
	}
	else
		return true;
}

/*function verify_check()
{
	var checkbox = document.getElementById("cb_rules_agree").value;
	if(checkbox != 'Yes')
	{
		alert('Lỗi! Bạn chưa chấp nhận đồng ý ĐIỀU KHOẢN ĐĂNG KÝ SHOPPING HERE, nên việc đăng ký không thể tiếp tục..!');
		return;	
	}
}
*/
var xmlHttp;
function CreateXMLHttpRequest()
{
	if(window.XMLHttpRequest)
	{
		return new XMLHttpRequest()
	}
	else if(window.ActiveXObject)
	{
		return new ActiceXObject("Microsoft.XMLHTTP")			
	}
}
function btnCapNhat()
{
	xmlHttp = CreateXMLHttpRequest();
	var username = document.getElementById("username").innerHTML;
	var full_name = document.getElementById("full_name").value;
	var gender = document.getElementById("gender").value;
	var birthday = document.getElementById("datepicker").value;
	var location = document.getElementById("location").value;
	
	//var keyword = document.getElementById("keyword").value;
	var serverURL = "xl_Edit_myprofile.php?username=" + username +
											"&full_name=" + full_name + 
											"&gender=" + gender +
											"&birthday=" + birthday +
											"&location=" + location +
											"&t=" + (new Date()).getTime();
	
	xmlHttp.open("GET", serverURL, true);
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			var kq = xmlHttp.responseText;			
			document.getElementById("divResult").innerHTML = kq;								
		}
	};
	xmlHttp.send(null);
}
function check_gianhang()
{
	xmlHttp = CreateXMLHttpRequest();
	var username = document.getElementById("username").innerHTML;
	var serverURL = "xl_Check_Store.php?username=" +  username + "&t=" + (new Date()).getTime();
	
	xmlHttp.open("GET", serverURL, true);
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			var kq = xmlHttp.responseText;
			if(!kq)
			{
				location.href = 'mystore.php';
			}
			else
			{
				alert(kq);
				location.href = 'index.php';
			}
			
		}
		/*else
		{
			location.href = 'mystore.php';
		}*/
	};
		

	xmlHttp.send(null);
}
