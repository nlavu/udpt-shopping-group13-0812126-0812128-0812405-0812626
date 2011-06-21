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
		if (maNguoiDung == 0)
		{
			alert("Bạn phải đăng nhập hoặc đăng ký thành viên mới được like sản phẩm !!!");			
		}
		else
		{
			var strURL = "controls/ucXLLikes.php?id=" + maDoiTuong + "&user=" + maNguoiDung + "&kq="+ idKQ + "&page=" + page + "&t=" + new Date().getTime();
			alert(strURL);
			
			var idKetQua = idKQ;		
			alert("kết quả: " + idKetQua);		
			funcAJAX_GET(idKetQua, strURL);
		}
	}
	/*đánh giá 1 sản phẩm nào đó*/
	function funcDanhGiaSP(maDoiTuong, maNguoiDung, idKQ, page)
	{		
		if (maDoiTuong.length === 0 || maNguoiDung.length === 0 || page.length === 0)
		{
			return;
		}
		if (maNguoiDung == 0)
		{
			alert("Bạn phải đăng nhập hoặc đăng ký thành viên mới được đánh giá sản phẩm !!!");			
		}
		else
		{
			var soSao = document.getElementsByName("selDanhGiaSP")[0].value;
			var strURL = "controls/ucXLDanhGiaSP.php?sosao="+ soSao+"&id=" + maDoiTuong + "&user=" + maNguoiDung + "&kq="+ idKQ + "&page=" + page + "&t=" + new Date().getTime();
			alert(strURL);
			
			var idKetQua = idKQ;		
			alert("kết quả: " + idKetQua);		
			funcAJAX_GET(idKetQua, strURL);
		}
	}
	
	/*Thêm bình luận*/
	function funcThemBinhLuan(idTxtNoiDung, maDoiTuong, maNguoiDung, idKQ, page)
	{				
		var noiDung = document.getElementById(idTxtNoiDung).value;
		alert(noiDung);
		if (maDoiTuong.length == 0 || maNguoiDung.length == 0 || 
			page.length == 0 )
		{
			return;
		}
		if (noiDung.length == 0 || noiDung.Length > 200)
		{
			alert("Bình luận phải có độ dài nhỏ hơn 200 kí tự!!!");
			return;
		}
		if (maNguoiDung == 0)
		{
			alert("Bạn phải đăng nhập hoặc đăng ký thành viên mới được bình luận!!!");
			return;			
		}
		else
		{		
			var t = new Date().getTime();
			var idKetQua  = idKQ + "_" + t;
		
			var divNode = document.createElement("div");
			divNode.setAttribute("id", idKetQua);
			document.getElementById(idKQ).parentNode.insertBefore(divNode, document.getElementById(idKQ));
				
			var strURL = "controls/ucXLBinhLuan.php?noiDungBL="+ noiDung+"&id=" + maDoiTuong + "&user=" + maNguoiDung + "&kq="+ idKetQua + "&page=" + page + "&t=" + t ;
			
			alert(strURL);
			funcAJAX_GET(idKetQua, strURL);
			document.getElementById(idTxtNoiDung).value = "";
		}
	}
	// thêm vào giỏ hàng
	// khách cũng được quyền mua sản phẩm nhưng phải đăng nhập mới được thanh toán
	// type = 1 thêm sp, = 0 xóa sp khỏi giỏ
	function funcThemVaoGioHang()
	{	
		var maSP = document.getElementById("hidMaSanPham").value;
		var soluong = document.getElementById("txtSoLuongSPThemVaoSoGio").value;
		
		var strURL = "controls/ucCart.php?maSP=" + maSP + "&soLuong=" + soluong + "&type=1&t=" + new Date().getTime() ;
		alert(strURL);	
		var idKetQua = "idCart_Shop";
		funcAJAX_GET(idKetQua, strURL);
		document.getElementById("txtSoLuongSPThemVaoSoGio").value = "";
		
	}
	// Xóa sản phẩm khỏi giỏ hàng
	// khách cũng được quyền mua sản phẩm nhưng phải đăng nhập mới được thanh toán
	function funcXoaSPTrongGioHang(maSanPham)
	{	
		var strURL = "controls/ucCart.php?maSP=" + maSanPham + "&soLuong=0&type=0&t=" + new Date().getTime() ;
		alert(strURL);	
		var idKetQua = "idCart_Shop";
		funcAJAX_GET(idKetQua, strURL);		
	}