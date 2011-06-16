<?php require_once 'session.inc';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tạo gian hàng - ShoppingHere - NHÓM 13</title>
<!--attach css-->
<link href="css/style-default.css" rel="stylesheet" type="text/css"  />
<!--end attach css-->
<link type="text/css" href="jquery-ui-1.8.13.custom/css/no-theme/jquery-ui-1.8.13.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="jquery-ui-1.8.13.custom/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.13.custom/js/jquery-ui-1.8.13.custom.min.js"></script>

<script src="jquery-ui-1.8.13.custom/reflection.js" ></script>
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
