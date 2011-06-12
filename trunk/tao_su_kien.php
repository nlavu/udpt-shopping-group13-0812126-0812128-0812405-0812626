<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tạo sự kiện - ShoppingHere</title>
<!--attach css-->
<link href="css/style-shop.css" rel="stylesheet" type="text/css"  />
<!--end attach css-->
<link type="text/css" href="jquery-ui-1.8.13.custom/css/no-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="jquery-ui-1.8.13.custom/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.13.custom/js/jquery-ui-1.8.13.custom.min.js"></script>

<script src="jquery-ui-1.8.13.custom/reflection.js" ></script>
<!--end attach JQUERY-->
</head>
<body>
<div class="wrapper">
  <?php require_once('controls/ucHeader_Shop.php') ?>
  <!--end .menu-shop-wrapper-->
  <div class="content">
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
          	<?php require_once('controls/ucTaoSuKien.php') ?>   
            <!--end .product-detail-->
      	</div>
        <!--end .right-->
    </div>
     <!--end .content-left-->
	
    <!--// trong gian hàng bỏ content-right-->
  </div>
  <!--end .content-->
  <div class="footer">
  	<?php require_once('controls/ucFooter_Shop.php') ?>
  </div>
  <!--end .footer-->
</div>
<!--end .wrapper-->
<!--SCRIPT JWUERY-->
  <?php require_once('controls/ucScriptJquery_Shop.php') ?>
<!--END SCRIPT JWUERY-->
</body>
</html>
