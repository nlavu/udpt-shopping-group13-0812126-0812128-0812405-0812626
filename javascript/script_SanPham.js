// JavaScript Document
// cập nhật thành tiền sau khi update số lượng
function updateThanhTien()
{
	//alert("afsd");
	var soluong = document.getElementById("txtSoLuongSPThemVaoSoGio").value;
	//alert(soluong);
	var dongia = document.getElementById("idDonGiaBan").value;
	//alert(dongia);
	var thanhTien = soluong * dongia;
	//alert(thanhTien);
	
	document.getElementById("idThanhTien").innerHTML = thanhTien.formatMoney(0,".",",");
}
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

function btnXoaSPTrongGioHang(masanpham)
{
	
	xmlHttp = CreateXMLHttpRequest();		
	
	var serverURL = "./controls/ucDelProductInCart.php?maSanPham=" + masanpham +  "&t=" + (new Date()).getTime();
	xmlHttp.open("GET", serverURL, true);
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			
			var kq = xmlHttp.responseText;			
			document.getElementById(masanpham).innerHTML = '';	
			document.getElementById('thanhTien').innerHTML = kq;						
		}
	};
	xmlHttp.send(null);	
}

function CapNhatLuotXemSP(masanpham)
{
	xmlHttp = CreateXMLHttpRequest();
	var serverURL = "./controls/ucCapNhatLuotXemSP.php?maSanPhamXem=" + masanpham +  "&t=" + (new Date()).getTime();

	xmlHttp.open("GET", serverURL, true);
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			
			var kq = xmlHttp.responseText;
			location.href ='index.php';
		}
	
	};
	xmlHttp.send(null);	
}

function CapNhatLuotXemGH(magianhang)
{
	
	xmlHttp = CreateXMLHttpRequest();		
		
	
	var serverURL = "./controls/ucCapNhatLuotXemGH.php?maGianHang=" + magianhang +  "&t=" + (new Date()).getTime();

	xmlHttp.open("GET", serverURL, true);
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			
			var kq = xmlHttp.responseText;			
			location.href ='index.php';
			
		}
	
		
	};
	xmlHttp.send(null);	
}

function BinhLuanSanPham(maSP, nguoiBL)//, soLuotBL)
{

	xmlHttp = CreateXMLHttpRequest();		

	var noiDungBL = document.getElementById('txtNoiDungBinhLuan').value;
	var serverURL = "./controls/ucBinhLuan.php?maSanPham=" + maSP + "&noiDungBL=" + noiDungBL +
										"&nguoiBL=" + nguoiBL +  "&t=" + (new Date()).getTime();
	
	xmlHttp.open("GET", serverURL, true);
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			
			var kq = xmlHttp.responseText;			
			document.getElementById('lblNewComment').innerHTML = kq;
			document.getElementById('lblNewComment').id = '';
			document.getElementById('txtNoiDungBinhLuan') = '';
			//document.getElementById('lblSoLuotBL') = soLuotBL ++;
			
		}
	
		
	};
	xmlHttp.send(null);	
}


function Like(maDoiTuong)
{
	xmlHttp = CreateXMLHttpRequest();		
	var serverURL = "./controls/ucLike.php?maDoiTuong=" + maDoiTuong +  "&t=" + (new Date()).getTime();

	xmlHttp.open("GET", serverURL, true);
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			
			var kq = xmlHttp.responseText;	
			document.getElementById('divLike').innerHTML = kq;
			
		}
	
		
	};
	xmlHttp.send(null);	
}


function LikeBinhLuan(maDoiTuong)
{
	;
	
	xmlHttp = CreateXMLHttpRequest();		
	var serverURL = "./controls/ucLikeBL.php?maDoiTuong=" + maDoiTuong +  "&t=" + (new Date()).getTime();

	xmlHttp.open("GET", serverURL, true);
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			
			var kq = xmlHttp.responseText;	
			document.getElementById(maDoiTuong).innerHTML = kq;
			
		}
	
		
	};
	xmlHttp.send(null);	
}


function XoaBL(maBL)
{
	
	xmlHttp = CreateXMLHttpRequest();		
	var serverURL = "./controls/ucXoaBinhLuan.php?maBinhLuan=" + maBL + "&t=" + (new Date()).getTime();
	xmlHttp.open("GET", serverURL, true);
	
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			
			
			var kq = xmlHttp.responseText;	
			var id = "divBinhLuan" + maBL;
			document.getElementById(id).innerHTML = '';
			document.getElementById('lblSoLuotBL').innerHTML= kq;
			
		}
	
		
	};
	xmlHttp.send(null);	
}
