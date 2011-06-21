<?php require_once 'session.inc';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang cá nhân - ShoppingHere - NHÓM 13</title>
<!--attach css-->
<?php require_once('controls/ucIncludeCSS_JS.php') ?>
<!--end attach -->
</head>
<body>
<div class="wrapper" >
  <?php require_once('controls/ucHeader.php')?>
  <!--end .header-->
  <div class="content">
	<?php require_once('controls/ucTrangCaNhan.php') ?>
	<!--end .left-->
    <div class="content-right">
    	<div class="box-wrapper-right-sidebar">
    		<div class="box-title-right-sidebar">Giỏ hàng</div>
   	  		<div id="idCart_Shop">
                <?php require_once('controls/ucCart.php') ?>
            </div>

            <div class="seperator-item-box-right-sidebar"></div>
        </div> 
        <!--end .box-wrapper-right-sidebar || giỏ hàng-->
	  <?php require_once('controls/ucEventSidebar.php') ?>
      <!--end .box-wrapper-right-sidebar-->
    </div>
    <!--end .right-->
  </div>
  <!--end .content-->
	 <?php require_once('controls/ucFooter.php')?>
  <!--end .footer-->
</div>
<!--end .wrapper-->
</body>
</html>
