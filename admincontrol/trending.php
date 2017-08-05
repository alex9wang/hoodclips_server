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
require_once '../config.php';
require_once '../include/functions.php';
require_once '../include/user_functions.php';
require_once './functions.php';
require_once './functions_push.php';

echo "111";
$vid = $_GET['vid'];
$message = $_GET['message'];
$flag = $_GET['flag-trending'];

$sql = "UPDATE pm_videos SET trending='". $flag. "' WHERE uniq_id='".$vid."'";
echo $sql.'<br/>';
mysql_query($sql);

				
/*$headers = array("Content-Type:" . "application/json", "Authorization:" . "key=" . $apiKey);
echo "vid=".$vid."<br/>";
echo "message=".$message."<br/>";
echo "apiKey=".$apiKey."<br/>";
echo "title=".$video_title."<br/>";
echo "description=".$video_description."<br/>";

$videoUrl = $row['url_flv'];
if (empty($videoUrl)) {
	$videoUrl = $row['embed_code'];
}

if (isset($vid) && !empty($vid)) {
	$messageBody = array(
		'TYPE'=>'VIDEO',
		'TITLE'=>$video_title,
		'DESCRIPTION'=>$video_description,
		'CONTENT'=>$vid,
		'id' => $row['pmv_id'],
		'video_title'=>$row['video_title'],
		'video_desc'=>$row['description'],
		'yt_thumb'=>$row['yt_thumb'],
		'site_views'=>$row['site_views'],
		'category'=>$row['category'],
		'video_url'=>$videoUrl,
		'date_added'=>$row['date_added'],
		'yt_id'=>$row['yt_id']
	);
	$data = array(
		'data' => array('message' => $messageBody),
		'to' => '/topics/promote'
	);
} elseif (isset($message) && !empty($message)) {
	$data = array(
		'data' => array('message' => 'PROMOTED_MESSAGE:'.$message),
		'to' => '/topics/promote'
	);
}
echo $data;
$ch = curl_init();
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers ); 
curl_setopt( $ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send" );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data) );

$response = curl_exec($ch);
echo $response;
curl_close($ch);

push_apns($video_title, $row['pmv_id']);
*/
?>