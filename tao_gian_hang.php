<?php require_once 'session.inc';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tạo gian hàng - ShoppingHere - NHÓM 13</title>
<!--attach -->
 <?php require_once('controls/ucIncludeCSS_JS.php'); ?>
<!--end attach JQUERY-->
</head>
<body>
<div class="wrapper">
  <?php require_once('controls/ucHeader.php') ?>
  <!--end .header-->
  <div class="content">
	<div class="content-left">   	  
      <?php require_once('controls/ucDangKyGianHang.php') ?>
      <!--end .sign-up-wrapper-->
	</div>
     <!--end .content-left-->
	<div class="content-right">   	
	   	<div class="welcome-box ui-corner-all">
   	    	<img src="image/create_shop_2.jpg" width="244" height="450" />
        </div>
    </div>
    <!--end .content-right-->
  </div>
  <!--end .content-->
    <?php require_once('controls/ucFooter.php')?>
  <!--end .footer-->
</div>
<!--end .wrapper-->
</body>
</html>
