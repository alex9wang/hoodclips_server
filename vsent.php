<?php
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
// | Copyright: (c) 2004-2013 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+

session_start();

require('config.php');
require_once(ABSPATH .'include/user_functions.php');
require_once(ABSPATH .'include/islogged.php');
require_once(ABSPATH .'include/article_functions.php');

// require_once('recaptchalib.php');
 if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
        //  echo '<h2>Please check the the captcha form.</h2>';
        //  exit;
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le7KgkTAAAAAIhrI28JD4UhjnigCLqlHdFbBK1g&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {
         
$error_data = "<section>
					<header class=\"heading\">
						<h1>submit <mark>video</mark></h1>
					</header>
					<section class=\"submission-form-holder\">
						<div class=\"text-holder\">
							<h2>
<font color=\"red\"><b>The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: incorrect-captcha-sol)<br><p> <input name=\"button\" type=\"button\" onclick=\"history.back()\" value=\"Back\"> </p></b></font></h2></div></section></section>";
        }
        else
        {
$recptcha = 'ok';
         // echo '<h2>Thanks for posting comment.</h2>';
        }


// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6Le7KgkTAAAAAF9jXLZdRn5zXvJfc_7VOemxGY9Z";
$privatekey = "6Le7KgkTAAAAAIhrI28JD4UhjnigCLqlHdFbBK1g";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;
//recaptacha ends





$email = $_POST['email']; // Invalid email address 
$regex = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";

if($_POST['video-title'] == "" ||  $_POST['video-title']== "Title"){ $error_field = "insert correct title";}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == "username@domain.com"){$error_field = "insert valid email address";}
elseif($_POST['attention'] == ""){ $error_field = "select correct video type";}
elseif($_POST['video-url'] == "" || $_POST['video-url'] == "http://we.tl/0as0bCysax"){ $error_field = "insert a correct Video URL";}



if($error_field !=""){
$error = "<section class=\"submission-form-holder\">
						<div class=\"text-holder\">
							<h2>
Please click back and ".$error_field.".. <br><p> <input name=\"button\" type=\"button\" onclick=\"history.back()\" value=\"Back\"> </p></h2></div></section>";
}

if ($recptcha == 'ok') {


        if ($recptcha == 'ok') {
			
			if($error_field ==""){
				
				$str = time();
				$str = md5($str);
				$uniq_id = substr($str, 0, 9);
				
				$added = strtotime(date('Y-m-d'));
				$today = date('Y-m-d');
				
			$sql = "INSERT INTO pm_videos (uniq_id, video_title, description, category, submitted, added, url_flv, yt_views, site_views,  allow_comments, video_slug, video_status,date_added)
			VALUES ('". $uniq_id ."', 
					'". secure_sql($_POST['video-title']) ."', 
					'". secure_sql($_POST['video-description']) ."', 
						'". $_POST['attention'] ."', 
					'user', 
					'". $added ."', 
					'". $_POST['video-url'] ."', 
					
					'0', 
					'0', 
					'1',
					'". secure_sql(sanitize_title($_POST['video-title'])) ."',
					'0',
					'".$today."')";
				
				
		if ($sql)
	{
		$result = mysql_query($sql);
	}
	
	if ( ! $result)
	{
		return array(mysql_error(), mysql_errno());
	}
	$insert_id = mysql_insert_id();
	
	$sql = "UPDATE pm_categories SET total_videos=total_videos+1 ";
	$sql .= ( $added <= $time_now) ? ", published_videos = published_videos + 1 " : '';
	$sql .= " WHERE id IN(". $_POST['attention'] .")";
	mysql_query($sql);
	
	update_config('total_videos', $config['total_videos'] + 1);
	
	if ($added <= $time_now)
	{
		update_config('published_videos', $config['published_videos'] + 1);
	}
	
	$sql = "INSERT INTO pm_videos_urls (uniq_id, mp4, direct) VALUES 
			('".$uniq_id."', '', '".$_POST['video-url']."')";
	$result = mysql_query($sql);
	
	if ($_POST['video-url'])
	{
		$sql = "INSERT INTO pm_embed_code (uniq_id, embed_code) VALUES ('".$uniq_id."', '".$_POST['video-url']."')";
		$result = mysql_query($sql);
	}
	
	
	
				
				
				
				
				
				$success = 1;
			}
               
        } else {
                # set the error code so that we can display it
                $error = $error_data;
				
        }
}
else
{
$error = $error_data;

}


$smarty->assign('error_data', $error);

$smarty->assign('success', $success);
$smarty->assign('template_dir', $template_f);
$smarty->assign('meta_title', htmlspecialchars($page['title'], ENT_QUOTES));
$smarty->assign('meta_keywords', $page['meta_keywords']);
$smarty->assign('meta_description', $page['meta_description']);
$smarty->assign('show_addthis_widget', $config['show_addthis_widget']);

$smarty->display('vsent.tpl');
?>
