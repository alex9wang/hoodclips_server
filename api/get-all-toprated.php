<?php
require_once '../config.php';
require_once '../include/functions.php';
require_once '../include/user_functions.php';
/*api key*/
$apiKeyDefined = "apIDeveLopedBYPalasH-05-15";

/* get parameters*/
//$apiKey = trim($_GET['apiKey']);
$limit = $_POST['limit'];

if($limit > 0 == false){
    $limit = 0;
}

/*variables*/
$list = array();
$result = array();
$resultArray = array();
$allparamVal = array();

if(true){
    db_connect();
    $list = top_videos("rating", $limit);
    
   for($i = 0;$i<sizeof($list); $i++){
		$resultArray[] = array(
			'id'=>$list[$i]['id'],
			'uniq_id'=>$list[$i]['uniq_id'],
			'video_title'=>$list[$i]['video_title'],
			'yt_thumb'=>$list[$i]['yt_thumb'],
			//'yt_thumb'=>"http://192.168.1.145/phpmelody_test/1.jpg",
			'site_views'=>$list[$i]['site_views'],
			'category'=>$list[$i]['category'],
			'url_flv'=>$list[$i]['url_flv'],
			//'url_flv'=>"http://192.168.1.145/phpmelody_test/1.avi",
			'featured'=>$list[$i]['featured'],
			'date_added'=>$list[$i]['date_added'],
		);
   }
   
    if(sizeof($resultArray) > 0){
		$result["status"] = 'success';
		$result["message"] = 'ok';
		$result["data"] = $resultArray;
	 }else{
		$result["status"] = 'error';
		$result["message"] = 'no data found';
		$result["data"] = $resultArray;
	 }

	print_r (json_encode($result)) ;
   
    
}
/*
 * API to get all videos
 * 
 */
?>
