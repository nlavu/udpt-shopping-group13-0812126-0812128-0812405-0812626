<?php
/**
 * session.inc
 *
 * Author: Marc Wandschneider
 *
 * This file will contain the core session handling code that
 * we will use in our poster store web application.  We will
 * do a few extra things when we create a session to try to
 * avoid some common security problems:
 *
 * 1. We will add a 'created' variable to the session data to
 *    verify that we were the ones who created this session.
 *    (This helps avoid session fixation attacks.)
 *
 * 2. We will record a hash of the client's USER_AGENT string
 *    along with another string to reduce the chance of a
 *    compromised session ID being used successfully.
 */
define('USER_AGENT_SALT', 'PosterStore');

/**
 * One of these sessions can last 60 minutes
 */
ini_set('session.gc_maxlifetime', 3600);
session_start();

/**
 * Try to prevent session fixation by ensuring that we created
 * the session ID.
 */
if (!isset($_SESSION['created']))
{
  session_regenerate_id();
  $_SESSION['created'] = TRUE;
}

/**
 * Try to limit the damage from a compromised session ID by
 * saving a hash of the User-Agent: string with another
 * value.
 */
if (!isset($_SESSION['user_agent']))
{
  /**
   * create a hash user agent and a string to store in session
   * data.
   */
  $_SESSION['user_agent'] =
      md5($_SERVER['HTTP_USER_AGENT'] . USER_AGENT_SALT);
}
else
{
  /**
   * verify that the user agent matches the session data.
   */
  if ($_SESSION['user_agent'] !=
          md5($_SERVER['HTTP_USER_AGENT'] . USER_AGENT_SALT))
  {
    /**
     * Possible Security Violation.  Tell the user what
     * happened and refuse to continue.
     */
    throw new SessionCompromisedException();
  }
}

//$_SESSION['IsLogin'] = 1;

//$_SESSION['UserName'] = 'ThuHa';

if (!isset($_SESSION['GioHang']))
{
	$giohang = array();
	$_SESSION['GioHang'] = $giohang;
}
//Tạo sesion quản lý lượt xem gian hàng
if (!isset($_SESSION['LuotXemGianHang']))
{
	$gianhang = array();
	$_SESSION['LuotXemGianHang'] = $gianhang;
}

//Tạo sesion quản lý lượt xem sản phẩm
if (!isset($_SESSION['LuotXemSanPham']))
{
	$sanpham = array();
	$_SESSION['LuotXemSanPham'] = $sanpham;
}
	
?>

