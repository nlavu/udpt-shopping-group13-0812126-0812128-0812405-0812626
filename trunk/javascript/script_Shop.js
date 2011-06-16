// JavaScript Document
	function checkAll(idCheckAll, nameCheckBox,nameList)
	{		
		var list = document.getElementsByName(nameCheckBox);
		
		for(var i =0; i < list.length; i++)
		{
			list[i].checked = document.getElementById(idCheckAll).checked;
		}
		var listChkAll =	document.getElementsByName('chkAll');
		for(var i =0; i < listChkAll.length; i++)
		{
			listChkAll[i].checked = document.getElementById(idCheckAll).checked;
		}
		//alert(list.length);
		updateList(nameCheckBox, nameList);
	}
	function updateList(nameCheckBox, nameList)
	{
		
		var list = document.getElementsByName(nameCheckBox);
		var s = "";
		for(var i =0; i < list.length; i++)
		{
			if (list[i].checked)
			{
				s = s + list[i].value + ",";
			}
		}			
		//alert(nameList);
		document.getElementById(nameList).value = s;	
		
	}
	// check sự kiện
	function checkAll_SuKien(idCheckAll)
	{	
		var nameCheckBox = "chkSuKien";		
		var nameList = "hidListMaSK";
		
		checkAll(idCheckAll, nameCheckBox, nameList);
	}
	function updateList_SuKien()
	{
		var nameCheckBox = "chkSuKien";
		var nameList = "hidListMaSK";
		
		updateList(nameCheckBox, nameList)
	}
	
/* AJAX*/
//****************** AJAX xem ds nv theo phong ban ************
	function funcAJAX_GET(idKetQua, strURL)
	{			
		//create object
		var xmlHttp;
		if (window.XMLHttpRequest)
		{
			xmlHttp = new XMLHttpRequest();
		}
		else
		{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		// response
		xmlHttp.onreadystatechange = function()
		{
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
			{				
				document.getElementById(idKetQua).innerHTML = xmlHttp.responseText;
			}
		}
			
		// request	
		xmlHttp.open("GET", strURL, true);
		xmlHttp.send(null);
			
	}
	/*Xóa 1 sự kiện*/
	function funcXoaSuKien(maSuKien)
	{		
		if (maSuKien.length === 0)
		{
			alert("Chưa chọn sự kiện nào!!!");
			return;
		}
		var strURL = "controls/ucXLXoaSuKien.php?id=" + maSuKien + "&t=" + new Date().getTime();
		//alert(strURL);
		var idKetQua = "kq_xuly";
		//alert("kết quả: " + idKetQua);
		funcAJAX_GET(idKetQua, strURL);
	}
	/*Xóa nhiều sự kiện*/
	function funcXoaNhieuSuKien()
	{
		var lstID = document.getElementById("hidListMaSK").value;		
		//alert(lstID);
		funcXoaSuKien(lstID);
		
	}
	
	/*Tham gia sự kiện*/
	function funcThamGiaSuKien(maSuKien, maNguoiDung, page)
	{		
		if (maSuKien.length === 0)
		{
			alert("Chưa chọn sự kiện nào!!!");
			return;
		}
		var strURL = "controls/ucXLThamGiaSuKien.php?id=" + maSuKien + "&user=" + maNguoiDung + "&page=" + page + "&t=" + new Date().getTime();
		//alert(strURL);
		var idKetQua = "kq_thamgia_sukien";
		//alert("kết quả: " + idKetQua);
		funcAJAX_GET(idKetQua, strURL);
	}
	
	/*Like 1 đối tượng nào đó*/
	function funcLike(maDoiTuong, maNguoiDung, idKQ, page)
	{		
		if (maDoiTuong.length === 0 || maNguoiDung.length === 0 || page.length === 0)
		{
			return;
		}
		var strURL = "controls/ucXLLikes.php?id=" + maDoiTuong + "&user=" + maNguoiDung + "&kq="+ idKQ + "&page=" + page + "&t=" + new Date().getTime();
		//alert(strURL);
		
		var idKetQua = idKQ;		
		//alert("kết quả: " + idKetQua);		
		funcAJAX_GET(idKetQua, strURL);
	}