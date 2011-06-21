<?php  	

/*Xử lý thêm + xóa sản phẩm vào giỏ hàng*/
	if (isset($_REQUEST['maSP']) && isset($_REQUEST['soLuong']) && isset($_REQUEST['type']) 
		&& isset($_REQUEST['t'])
		&& is_numeric($_REQUEST['maSP']) && is_numeric($_REQUEST['soLuong']) && is_numeric($_REQUEST['type']))
	{
		require_once('../class/SanPhamDAO.php');
		require_once('../session.inc');
		require_once('ucIncludeCSS_JS.php');
		
		$gioHang = $_SESSION['GioHang'];
		
		$soLuongThem = $_REQUEST['soLuong'];
		$type = $_REQUEST['type'];
		$maSanPhamTemp = $_REQUEST['maSP'];
		//kiểm tra mã sản phẩm có tồn tại hay không
		if (!is_null(SanPhamDAO::LaySanPhamTheoMa($maSanPhamTemp, 0)))
		{
			//có tồn tại
			//////////////////////////////////
			/* Thêm sp vào giỏ hàng 		*/
			if($soLuongThem >0 && $type == 1)
			{
				if (array_key_exists($maSanPhamTemp,$gioHang))
				{			
					//echo $gioHang[$maSP];
					$gioHang[$maSanPhamTemp]= $gioHang[$maSanPhamTemp] + $soLuongThem;
					//echo $gioHang[$maSP];
				}
				else
				{
					$gioHang[$maSanPhamTemp] = $soLuongThem;
				}	
				$_SESSION['GioHang'] = $gioHang;
			}
			//////////////////////////////////
			/* Xóa sp khỏi giỏ hàng 		*/
			if($soLuongThem == 0 && $type == 0)
			{
				$lstMaSP =  array_keys($_SESSION['GioHang']);
				$gioHang_New = array();
				for($i = 0; $i< count($lstMaSP); $i++)
				{		
					if ($lstMaSP[$i] != $maSanPhamTemp)
					{
						$gioHang_New[$maSanPhamTemp] = $gioHang[$maSanPhamTemp];
					}	
					
				}
				$_SESSION['GioHang'] = $gioHang_New;
			}
			
		}	
	}
	else
	{
		require_once ('class/SanPhamDAO.php');
	}
/*xử lý xóa sản phẩm khỏi giỏ hàng*/
/* chưa làm */

/*Hiển thị giỏ hàng*/
	$tongTien = 0;
	$tableChiTietGioHang ="";
	
	if (count($_SESSION['GioHang'])!=0)
	{
		$arrSanPham = $_SESSION['GioHang'];	
		
		$lstMaSP =  array_keys($_SESSION['GioHang']);

		$tableChiTietGioHang .='
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="cart-detail-row">
              <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Sửa</th>
                <th>Xóa</th>
              </tr>';
			  
		for($i = 0; $i< count($lstMaSP); $i++)
		{		

			$maSanPham = $lstMaSP[$i];
			$soluong = $arrSanPham[$maSanPham];
			
			$sanPham = SanPhamDAO::LaySanPhamTheoMa($maSanPham, 0);
			$thanhtien = $sanPham->DonGiaBan * $soluong;
			$tongTien = $tongTien + $thanhtien;
			
			$funcXoaSP = "funcXoaSPTrongGioHang('".$maSanPham."')";
			$tableChiTietGioHang .= '
				<tr>
                <td>'.$sanPham->TenSanPham.'</td>
                <td>'.$soluong.'</td>
                <td>
					<img src="image/edit_cart_24.png" width="24" height="24" title="Cập nhật số lượng sản phẩm" />
				</td>
                <td>
					<a href="javascript:'.$funcXoaSP.'"> 
						<img src="image/remove_from_shopping_cart_24.png" width="24" height="24" title="Xóa sản phẩm khỏi giỏ hàng" />	
					</a>				
				</td>
              </tr> ';
		}		                
        $tableChiTietGioHang .='</table>';
	}
	else
	{
		$tableChiTietGioHang ='<p><span class="text-color-normal-2">Chưa có sản phẩm nào trong giỏ hàng của bạn!</span></p>';
	}
	$tongTien = formatMoney($tongTien);		
 ?>

    <div class="item-box-right-sidebar" id="idGioHang">
      <div class="content">
        <div class="cart-image"></div>
        <div class="cart-content">
          <div class="total-money"><?php echo $tongTien; ?> VND</div>
          <div class="check-out">
                <span class="link-1-small" style="cursor:pointer;"><a href="./controls/ucThanhToan.php">Thanh toán</a></span>
          </div>
          <div class="view-detail" id="idViewDetail">
                <span class="link-1-small"><a href="#">Chi tiết giỏ hàng</a></span>
          </div>
        </div>
      </div>
      <!--end .content giỏ hàng-->  
      <div class="cart-detail">           
            <?php echo $tableChiTietGioHang; ?>            
      </div>
      <!--end .cart-detail-->
    </div>
    <!--end .item-box-right-sidebar-->
    