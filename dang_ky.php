<?php require_once 'session.inc';?> ffff
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShoppingHere - Đăng ký thành viên</title>

<?php require_once('controls/ucIncludeCSS_JS.php') ?>

</head>

<style type="text/css">

.formcontrols .section {
    padding: 0 15px;
	position: relative;
}


.field-hint {
   	display: none;
    position: absolute;
    margin-top: -4px;
    border: 1px solid #c93;
    padding: 5px 15px;
    background: #ffc url(images/pointer.gif) no-repeat -10px 5px;
}

/* The pointer image is hadded by using another span */
.field-hint .hint-pointer {
    position: absolute;
    left: -10px;
    top: 5px;
    width: 10px;
    height: 19px;
    background: url(images/pointer.gif) left top no-repeat;
}
</style>

<body>
<div class="wrapper">
  <?php require_once('controls/ucHeader.php') ?>
  <!--end .header-->
  <div class="content">
	<div class="content-left">   	  
      <?php require_once('controls/ucDangKy.php') ?>
      <!--end .sign-up-wrapper-->	
    </div>
     <!--end .content-left-->
	<div class="content-right">   	
	   	<div class="welcome-box ui-corner-all">  
   	    	<img src="image/welcome_2.gif" width="240" height="800" />
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
