<?php
	if (isset($_REQUEST['maGianHang']) && is_numeric($_REQUEST['maGianHang']))
	{
		require_once ('class/GianHangDAO.php');
		require_once ('class/LoaiSanPhamDAO.php');
		
		$maGH = $_REQUEST['maGianHang'];
		$gianHangDto = GianHangDAO::LayGianHangTheoMa($maGH, 0);	
		if (is_null($gianHangDto))
		{
			//header("Location:ds_gian_hang.php");
		}
		else
		{
			$dsLoaiSP = LoaiSanPhamDAO::LayDanhSachLoaiSanPhamTheoMaGianHang($maGH);
			echo '
				<div class="menu-shop-left">
					<ul>
						<li><div class="title"><label>danh mục sản phẩm</label></div></li>';	
			if (is_null($dsLoaiSP))
			{
				echo "";
			}
			else
			{
				foreach($dsLoaiSP as $loaiSanPhamDto)
				{
					echo '<li>
					<a href="ds_san_pham.php?maLoaiSP='.$loaiSanPhamDto->MaLoaiSP.'&maGianHang='.$gianHangDto->MaGianHang.'">'.$loaiSanPhamDto->TenLoaiSP.'</a></li>';
				}
			}			
			echo '</ul>
				</div>
				<!--end .menu-shop-left || danh mục sản phẩm-->';
		}
	}
	else
	{
		//header("Location:ds_gian_hang.php");
	}
	
?>
<?php 
	if($_SESSION['IsLogin'] == 1)
	{
		if ($gianHangDto->MaNguoiDung == $_SESSION['IdUser'])
		{
			echo '
			<div class="menu-shop-left">
				<ul>
					<li><div class="title"><label>Quản lý gian hàng</label></div></li>                   
					<li><a href="cap_nhat_theme.php?maGianHang='.$gianHangDto->MaGianHang.'">Theme</a></li>
					<li><a href="ds_don_dat_hang.php=?maGianHang='.$gianHangDto->MaGianHang.'">Đơn đặt hàng</a></li>
					<li><a href="ds_san_pham_admin.php?maGianHang='.$gianHangDto->MaGianHang.'">Sản phẩm</a></li> 
					<li><a href="danh_muc_san_pham.php?maGianHang='.$gianHangDto->MaGianHang.'">Danh mục sản phẩm</a></li>
					<li><a href="ds_su_kien_admin.php?maGianHang='.$gianHangDto->MaGianHang.'">Sự kiện</a></li>                                    
			  </ul>
			</div>
			<!--end .menu-shop-left || quản lý gian hàng -->';					
		}
	}	
?>