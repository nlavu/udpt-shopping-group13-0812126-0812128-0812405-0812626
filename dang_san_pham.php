<?php require_once 'session.inc';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload sản phẩm - ShoppingHere</title>

<?php require_once('controls/ucIncludeCSS_JS.php') ?>
<!--end attach-->
</head>
<body>
<div class="wrapper">
  <?php require_once('controls/ucHeader_Shop.php') ?>
  <!--end .menu-shop-wrapper-->
  <div class="content-shop">
    <div class="content-left">   	  
   	  	<div class="left">
        	<?php require_once('controls/ucMenu_Shop.php') ?>
            <!--end .menu-shop-left-->
    	</div>
        <!--end .left-->
      	<div class="right">
        	<?php //require_once('controls/ucNavigator_Shop.php') ?>           
            <!--end .navigator --> 
            <!--CHI TIẾT SẢN PHẨM--> 
          	<?php require_once('controls/ucUpSanPham.php') ?>   
            <!--end .product-detail-->
      	</div>
        <!--end .right-->
    </div>
     <!--end .content-left-->
	
    <!--// trong gian hàng bỏ content-right-->
  </div>
  <!--end .content-->
   <?php require_once('controls/ucFooter_Shop.php') ?> 
  <!--end .footer-->
</div>
<!--end .wrapper-->
</body>
</html>
