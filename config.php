<?php
  /*if ($_SERVER['HTTP_HOST'] != 'www.hoodclips.com') {
	header ('HTTP/1.1 301 Moved Permanently'); 
        header ('Location: http://www.hoodclips.com' . $_SERVER['REQUEST_URI']);
        exit ();
    }*/
// +------------------------------------------------------------------------+
// | PHP Melody ( www.phpsugar.com )
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | PHPSUGAR, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: PHPSUGAR (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2014 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+

// Not sure how to configure? Please read the Installation Manual PDF
// +------------------------------------------------------------------------+

//$apiKey="AIzaSyBKQ07K6Hn6_HLqRyBvw-rLCUahVxfCvvw";
$apiKey = "AIzaSyAC13bW16H_M7IwVVHRHb4vJObpoZAB8Hs";

//-- MySQL Settings --//
/** MySQL database name */
$db_name = 'phpmelody';

/** MySQL database username */
//$db_user = 'hoodclipsnet';
$db_user = 'root';

/** MySQL database password */
//$db_pass = '123456josh';
$db_pass = '';

/** MySQL hostname */
$db_host = 'localhost';

// Full URL without any trailing slash (e.g http://www.example.com)
define('_URL', 'http://192.168.1.232:8880/hoodclips');	

//-- Customer ID --//
// Replace "YOUR_CUSTOMER_ID" below with the assigned "Customer ID".
// The "Customer ID" is found in the order confirmation emails or in your Customer Account
// If you don't know your "Customer ID" email support at support@phpsugar.com
define('_CUSTOMER_ID', 'PS23d2c65c15e');	

define('_ADMIN_FOLDER', 'admincontrol');

//error_reporting(E_ALL & ~E_NOTICE &  ~E_STRICT); // Production
error_reporting(E_ALL & ~E_NOTICE); // Development

// ========================================================= //
//-- MySQL Backup Directory --//
define('BKUP_DIR', 'temp');	//	WITHOUT any trailing slash
define('_POWEREDBY', 0);

@header('CONTENT-TYPE: text/html; charset=utf-8');
@ini_set( 'upload_max_size' , '100000000000M' );
@ini_set( 'post_max_size', '100000000000M');
@ini_set( 'max_execution_time', '3000000' );
define('ABSPATH', dirname(__FILE__).'/'); 
if ( ! file_exists('install.php') ) 
{
	require_once( ABSPATH.'include/settings.php');
}
else
{
	if ( ! defined('PM_DOING_INSTALL'))
	{
		die('<div align="center" style="font-family: Arial, sans-serif; color: #555; margin: 60px 0; line-height: 1.6em;"><img src="'. _ADMIN_FOLDER .'/img/login-logo.png"> <br /> <br /> <br />If you haven\'t installed PHP Melody yet, <a href="install.php">start the installation process</a> now. <br> Otherwise, remove <strong>install.php</strong> from your server.');
	}
}

define('_URL_MOBI', _URL .'/mobile');
define('ABSPATH_MOBI', ABSPATH .'mobile/');


if (file_exists(ABSPATH_MOBI) && ! defined('IGNORE_MOBILE') && strpos($_SERVER['SCRIPT_NAME'], '/'. _ADMIN_FOLDER .'/') === false)
{
	define('MOBILE_MELODY', true);
	include(ABSPATH_MOBI .'mobile_detect.php');
	
	$mobile_detector = new Mobile_Detect;
	
	define('USER_DEVICE', ($mobile_detector->isMobile()) ? 'mobile' : 'desktop');
	
	include(ABSPATH_MOBI .'detect.php');
}
else
{
	define('MOBILE_MELODY', false);
	define('USER_DEVICE', 'desktop');
}
