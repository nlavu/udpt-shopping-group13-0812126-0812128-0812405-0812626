<?php
	if (isset($_REQUEST['maGianHang']) && is_numeric($_REQUEST['maGianHang']))
	{
		require_once ('class/GianHangDAO.php');		
		
		$maGH = $_REQUEST['maGianHang'];
		$gianHangDto = GianHangDAO::LayGianHangTheoMa($maGH, 0);	
		if (is_null($gianHangDto))
		{
			header("Location:ds_gian_hang.php");
		}
		else
		{
			//kiểm tra đăng nhập hay chưa, chưa thì tăng biến xem lượt gian hàng
			if ($_SESSION['IsLogin'] == 1)
			{
				$luotXemGH = $_SESSION['LuotXemGianHang'];
				if (!in_array($maGH,$luotXemGH))
				{	
					array_push($luotXemGH, $maGH);
				}	
				$_SESSION['LuotXemGianHang'] = $luotXemGH;
			}
		}
	}
	else
	{
		header("Location:ds_gian_hang.php");
	}
	
?>
<div class="header-shop">
	<div class="header-left">
    	<a href="index.html">Shopping HERE</a>
    </div>
    <!--end .header-left-->    
    <div class="header-right">
    	<?php require_once('controls/ucMenu_Header.php'); ?>
        <!--end .header-navigator-->	       
    </div>
    <!--end .header-right-->
  </div>
  <!--end .header-->
  <div class="banner-shop">
  	<div class="back-ground">
    	banner của gian hàng
   	  <img src="#" />
    </div>
  </div>
  <!--end .banner-shop-->
  <div class="slogan-shop">
  	<div class="content ui-corner-all">Content for  class "content" Goes Here</div>
  </div>
  <!--end .slogan-shop-->
  <div class="menu-shop-wrapper">
	 <div class="menu-shop">
        <ul>
            <li><a href="gian_hang.php?maGianHang=<?php echo $maGH ?>">Trang chủ</a></li>
            <li><a href="ds_san_pham.php?maGianHang=<?php echo $maGH ?>">Sản phẩm</a></li>
            <li><a href="ds_su_kien.php?maGianHang=<?php echo $maGH ?>">Sự kiện</a></li>
          <li><a href="gian_hang.php?maGianHang=<?php echo $maGH ?>">Về gian hàng</a></li>
            
        </ul>
        <!--end ul menu-->            
     </div>
     <!--end .menu-shop-->
     <div class="menu-search ui-corner-all">
   	   <div class="content">
       		<form action="" method="get" name="frmSearchShop">
            	<input name="txtSearchShop" type="text" id="search-input-shop" title="*Tìm kiếm trong gian hàng ..." />
                <input name="btnSearchShop" type="submit" value="" id="search-btn-shop" class="ui-state-default ui-widget ui-corner-right" />
            </form>
       </div>
     </div>
     <!--end .menu-search-->
  </div>
  <!--end .menu-shop-wrapper-->

