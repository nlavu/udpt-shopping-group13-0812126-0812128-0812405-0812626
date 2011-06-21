<?php require_once 'session.inc';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sự kiện - ShoppingHere - NHÓM 13</title>

<?php require_once('controls/ucIncludeCSS_JS.php') ?>
<!--attach -->

</head>
<body>
<div class="wrapper">
  <?php require_once('controls/ucHeader_Shop.php') ?>
  <!--end -->
  <div class="content-shop">
    <div class="content-left">   	  
   	  	<div class="left">
        	<?php require_once('controls/ucMenu_Shop.php') ?>
            <!--end .menu-shop-left  -->
    	</div>
      	<div class="right">
        	<?php require_once('controls/ucNavigator_Shop.php') ?>
            <!--end .navigator --> 
   	    	<?php require_once('controls/ucTimKiemSP_Shop.php') ?>
          	<!--end .search-product-wrapper-->
            <?php require_once('controls/ucDSSuKien_Shop.php') ?>
            <!--end .paging -->       	
        </div>
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
