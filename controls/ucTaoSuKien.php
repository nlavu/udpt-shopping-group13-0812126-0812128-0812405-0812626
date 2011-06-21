<?php 
$frmTaoSuKien = "
<div class='up-product'>
	<h3>Tạo sự kiện</h3>
  <div class='content'>
  		<div class='separator'>
        </div>
  		<form action='tao_su_kien.php' method='post' name='frmThemSuKien' enctype='multipart/form-data' onsubmit='return checkThemSuKien()'>        	
        	<div class='row'>
            	<div class='leftcol' >
                	<label for='txtTenSuKien' >
            		Tên sự kiện:
                    </label>
                </div>
                <div class='rightcol required'>
                    <input name='txtTenSuKien' id='txtTenSuKien' type='text' size='50' maxlength='100' class='text verifyText' title='*Tên sự kiện không được quá 100 kí tự.' />                   
					<span class='iferror'>Tên sự kiện không được trống.</span>
                </div>
            </div>
            <!--end .row-->           
            <div class='row'>
            	<div class='leftcol field required' >
                	<label for='datepicker' >
            		Thời gian diễn ra từ ngày:
                    </label>
                </div>
                <div class='rightcol required'>
                   <input name='dtpNgayBD_SK' type='text' id='dtpNgayBD_SK' size='20'>
                   đến ngày
                   <input name='dtpNgayKT_SK' type='text' id='dtpNgayKT_SK' size='20'> 
                   <span id='chkNgay' class='iferror'>Ngày bắt đầu phải nhỏ hơn ngày kết thúc sự kiện.</span>  
                </div>
            </div>
            <!--end .row-->           
            <div class='row'>
            	<div class='leftcol'>
            		<label for='fileAnhSuKien'>
                    Hình ảnh:
                    </label>
                </div>
                <div class='rightcol'>
                   <input name='fileAnhSuKien' type='file' size='30' />   
				   <span class='error'><span class='iferror' >Website chỉ hỗ trợ ảnh kiểu *.gif, *.jpeg .</span>  </span>              
                </div>
            </div>
            <!--end .row-->
            <div class='row'>
            	<div class='leftcol'>
            		<label for='txtNoiDungSuKien'>
                    Nội dung sự kiện:
                    </label>
                </div>
                <div class='rightcol required'>
                    <textarea name='txtNoiDungSuKien' id='txtNoiDungSuKien'  cols='60' rows='8' wrap='hard' class='verifyText' title='*Nhập nội dung sự kiện ở đây ...' ></textarea>                                     
					<span class='iferror'>Nội dung sự kiện không được trống.</span>
              	</div>
            </div>
            <!--end .row-->
            <div class='separator'>
            </div>
            <div class='row'>
                <h3 align='left'>Chọn sản phẩm</h3>
            </div>
            <!--end .row sản phẩm liên quan sự kiện-->
            <div class='separator'>
            </div>
            <div class='row'>
                <input name='btnThemSuKien' type='submit' value='Thêm sự kiện'/>
                <input name='btnHuy' type='button' value='Hủy đăng' id='btnHuy' />
             </div>
             <!--end .row-->
        </form>
  </div>
</div>
<!--end .up-product-->";
?>
<?php
	$mess="";
	$frmThongBao_BD ="<div class='up-product'>
		<h3>Thông báo</h3>
		<div class='content'>		
			<p>";
	$frmThongBao_KT="</p>
					</div>
				</div>";
?>
<?php
	//kiểm tra quyền truy xuất
	/*$_SESSION['Privilege'] = 'NguoiBan';
	if ($_SESSION['Privilege'] != 'NguoiBan' || $_SESSION['IsLogin'] === 0)
	{
		header('Location:index.php');
		return;
	}
	*/
?>

<?php 
	if (isset($_REQUEST['btnThemSuKien']))
	{
		
		// xử lý tạo sự kiện
		$types = array('image/jpeg', 'image/gif','image/pjpeg'); 
		$fileName = "";
		// kiểm tra file upload		
		if (empty($_FILES))
		{
			//echo "Kiểm tra up file";
			
			$file = $_FILES['fileAnhSuKien'];
			//echo $file['error'];
			
			if (!in_array($file['type'], $types)) 
			{			
				echo $frmTaoSuKien;
				return;
			}		
			
			if ($file['error'] != 0)
			{
				$mess = "<span class='error'>Up ảnh bị lỗi, <a href='tao_su_kien.php' id='backURLTaoSuKien'> click vào đây </a> để thử lại.</span><br/>";
				echo $frmThongBao_BD.$mess.$frmThongBao_KT;
				return;
			}
			// move file & đổi tên ...
			if (!move_uploaded_file($file['tmp_name'], 'users/tentaikhoan/'.$file['name']))
			{
				$mess = "<span class='error'>Up ảnh bị lỗi, <a href='tao_su_kien.php' id='backURLTaoSuKien'> click vào đây </a> để thử lại.</span><br/>";
				echo $frmThongBao_BD.$mess.$frmThongBao_KT;
				return;
			}
			
			//upfile thành công
			$fileName = 'users/tentaikhoan/'.$file['name'];
		}
		
		// tạo đối tượng sự kiện
		require_once('class/DoiTuongDAO.php');
		require_once('class/SuKienDAO.php');		
			
		$res = DoiTuongDAO::ThemDoiTuong('Su Kien');
		
		if ($res)
		{
			$suKienDto = new SuKienDTO();
			$suKienDto->MaSuKien = $res;
			$suKienDto->MaGianHang = 3;
			$suKienDto->TenSuKien = $_REQUEST['txtTenSuKien'];
			$suKienDto->HinhAnh = $fileName;
			$suKienDto->NoiDungSuKien = $_REQUEST['txtNoiDungSuKien'];
			$suKienDto->NgayTao = date('Y-m-j');  
			
			$time = strtotime($_REQUEST['dtpNgayBD_SK'] );
			$ngayBD = date( 'Y-m-j', $time );
			
			$time = strtotime($_REQUEST['dtpNgayKT_SK']);
			$ngayKT = date( 'Y-m-j', $time );
						
			$suKienDto->NgayBatDau = $ngayBD;			
			$suKienDto->NgayKetThuc = $ngayKT;			
			
			$suKienDto->NgayCapNhat = '';
			$suKienDto->NguoiCapNhat = '';
			$suKienDto->NgayXoa = '';
			$suKienDto->NguoiXoa = '';
			$suKienDto->DaXoa = 0;
			if (!SuKienDAO::ThemSuKien($suKienDto))
			{
				$mess = "<span class='error'>Tạo sự kiện bị lỗi, <a href='tao_su_kien.php' id='backURLTaoSuKien'> click vào đây </a> để thử lại.</span><br/>";
				echo $frmThongBao_BD.$mess.$frmThongBao_KT;
				return;
			}
		}
		else
		{
			$mess = "<span class='error'>Tạo đối tượng sự kiện bị lỗi, <a href='tao_su_kien.php' id='backURLTaoSuKien'> click vào đây </a> để thử lại.</span><br/>";
			echo $frmThongBao_BD.$mess.$frmThongBao_KT;
			return;
		}
		// insert sự kiện
		$mess= "Tạo sự kiện thành công. <a href='tao_su_kien.php'> Click vào đây để tiếp tục tạo sự kiện</a> hoặc quay về <a href='ds_su_kien_admin.php' >trang sự kiện</a>.<br/>";
		echo $frmThongBao_BD.$mess.$frmThongBao_KT;
	}
	else
	{		
		echo $frmTaoSuKien;		
	}
?>
<script language="javascript" type="text/javascript">
	//function kiểm tra nội dung nhập
	function checkThemSuKien()
	{
		var frm = document.forms["frmThemSuKien"];		
		if (frm.elements["dtpNgayBD_SK"].value >= frm.elements["dtpNgayKT_SK"].value)
		{
			//alert("ko hợp lệ");
			document.getElementById('chkNgay').parentNode.className='rightcol required error';
			return false;
		}
		return true;
	}
</script>

