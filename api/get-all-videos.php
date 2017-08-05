<?php
require_once '../config.php';
require_once '../include/functions.php';
require_once '../include/user_functions.php';
/*api key*/
$apiKeyDefined = "apIDeveLopedBYPalasH-05-15";

/* get parameters*/
$apiKey = trim($_GET['apiKey']);
$limit = $_GET['limit'];

if($limit > 0 == false){
    $limit = 0;
}

/*variables*/
$list = array();
$resultArray = array();
$allparamVal = array();

if(true || strlen($_GET['apiKey']) > 0 && strcmp(base64_decode($_GET['apiKey']), $apiKeyDefined) == 0){
    db_connect();
    switch ($_GET['videoType']) {
            case "views":
                $list = top_videos("views", $limit);
            break;
            
            case "all":
                $list = get_video_list($order_by, $sort, $start, $limit);
            break;
        
            case "lastentry":
                $list = get_video_list("id", "DESC", 0, 1);
            break;
            
            case "featured":
                $list = get_featured_video_list($limit = 1);
            break;
        
        case "topRated":
                $list = top_videos("rating", $limit);
            break;
        
        case "mostLike":
            $list = get_most_liked_comment($vid);
    
        default :
            break;
    }
    
   for($i = 0;$i<sizeof($list); $i++){
       $resultArray[$i]['id'] = $list[$i]['id'];
       $resultArray[$i]['uniq_id'] = $list[$i]['uniq_id'];
       $resultArray[$i]['video_title'] = $list[$i]['video_title'];
       $resultArray[$i]['yt_thumb'] = $list[$i]['yt_thumb'];
       $resultArray[$i]['yt_views'] = $list[$i]['yt_views'];
       $resultArray[$i]['category'] = $list[$i]['category'];
       $resultArray[$i]['url_flv'] = $list[$i]['url_flv'];
   }
   if(strcmp($_GET['videoType'], "lastentry") == 0){
       if(sizeof($resultArray) > 0){
           echo $resultArray[0]['id'];
       }else{
           echo "0";
       }
   }else{
       if(sizeof($resultArray) > 0){
            array_push($resultArray, array('status'=>'success','message'=>'ok'));
         }else{
                array_push($resultArray, array('status'=>'error','message'=>'no data found'));
         }

        print_r (json_encode($resultArray)) ;
   }
    
}
/*
 * API to get all videos
 * 
 */
?>
