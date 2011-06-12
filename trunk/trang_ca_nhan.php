<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang cá nhân - ShoppingHere - NHÓM 13</title>
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
  <?php require_once('controls/ucHeader.php')?>
  <!--end .header-->
  <div class="content">
	<?php require_once('controls/ucTrangCaNhan.php') ?>
	<!--end .left-->
    <div class="content-right">
    	<div class="box-wrapper-right-sidebar">
    		<div class="box-title-right-sidebar">Giỏ hàng</div>
   	  		<?php require_once('controls/ucCart.php') ?>
            <div class="seperator-item-box-right-sidebar"></div>
        </div> 
        <!--end .box-wrapper-right-sidebar || giỏ hàng-->
	  <?php require_once('controls/ucEventSidebar.php') ?>
      <!--end .box-wrapper-right-sidebar-->
    </div>
    <!--end .right-->
  </div>
  <!--end .content-->
	<?php  require_once('controls/ucFooter.php') ?>
</body>
</html>
