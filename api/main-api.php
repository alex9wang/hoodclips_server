<?php
	require_once '../config.php';
	require_once '../include/functions.php';
	require_once '../include/user_functions.php';
	
	
	if (strpos($_SERVER["CONTENT_TYPE"] ,'json')) {
		$_POST = json_decode(file_get_contents("php://input"), true);
		header('Content-Type: application/json');
	}
	$api_method = $_POST['MethodType'];
	
	error_log(json_encode($_POST), 0, "/var/tmp/myerrors.log");
	
	if($api_method == "UploadVideo"){
		$name = $_FILES['video']['name'];
		$type = $_FILES['video']['type'];
		$size = $_FILES['video']['size'];
		$tmp_name = $_FILES['video']['tmp_name'];
		
		$name_folder = "../uploaded_video/";
		$name_file = str_replace(" ", "_", $name);
		$name_file_baru =  $name_folder.basename($name_file);
		
		$name_thumb = $_FILES['image']['name'];
		$type_thumb = $_FILES['image']['type'];
		$size_thumb = $_FILES['image']['size'];
		$tmp_name_thumb = $_FILES['image']['tmp_name'];
		
		$name_folder_thumb = "../uploaded_image/";
		$name_file_thumb = str_replace(" ", "_", $name_thumb);
		$name_file_baru_thumb =  $name_folder_thumb.basename($name_file_thumb);
		
		$resultCode = 0;
		$sql = 'empty';
		
		if(file_exists($name_file_baru)){
			$msg = "File already exist! \n";
			$resultCode = 100;
		}else{
			if(move_uploaded_file($tmp_name, $name_file_baru) && move_uploaded_file($tmp_name_thumb, $name_file_baru_thumb)){
				$msg = "Video File uploaded successfully!";
				$resultCode = 200;
				
				$videoTitle = $_POST['VideoTitle'];
				$videoDesc  = $_POST['VideoDesc'];
				$videoEmail  = $_POST['VideoEmail'];
				
				//www.hoodclips.com
				$sql = "insert into pm_mobile_videos(url_flv, video_title, description, yt_thumb, date_added, submitted) values('http://www.hoodclips.com/uploaded_video/".basename($name_file)."','".$videoTitle."','".$videoDesc."', 'http://www.hoodclips.com/uploaded_image/".basename($name_file_thumb)."', '".date("Y-m-d")."', '".$videoEmail."');";

				mysql_query($sql);
			}else{
				$msg = "Video File uploaded failed!";
				$resultCode = 300;
			}
		}
		echo $resultCode;
		
	} else if($api_method == "LoadUploadedVideoList"){
		$sql = "";
		$list = array();
		$result = array();
		$resultArray = array();
		$allparamVal = array();

		$pageNumber = $_POST['PageNumber'];
		$pageLimit = $_POST['ListviewLimit'];
		$search = $_POST['search'];
		$deviceId = $_POST['DeviceID'];
		$favourite = $_POST['Favourite'];
		$trending = $_POST['Trending'];
		$searchVideoId = $_POST['vid'];
		$isAndroid = $_POST["isAndroid"];
		
		$startIndex = $pageNumber*$pageLimit;
		$where = "where 1=1 and video_status =1 and date_added < now() ";
		//$where = $where." and url_flv is not null and url_flv<>'' ";
		if (isset($search) && !empty($search))
		{
			$where = $where." AND (video_title like '%".$search."%' OR description like '%".$search."%')";
		}
		if (isset($favourite) && !empty($favourite) && $favourite==1)
		{
			$where = $where." AND favourite=1";
		}
		if (isset($searchVideoId) && !empty($searchVideoId))
		{
			$where = $where." AND pmv_id='".$searchVideoId."'";
		}
		if (isset($trending) && !empty($trending) && $trending == 1) {
			$where = $where." AND trending=1";	
		}
		if (isset($isAndroid) && !empty($isAndroid) && $isAndroid == 1) {
			$where = $where." AND yt_id=''";		
		}
		$deviceIdWhere = "";
		if (isset($deviceId) && !empty($deviceId))
		{
			$deviceIdWhere = "where device_id='".$deviceId."'";
		}

		//$sql = "select *, pm_mobile_videos.id as pmv_id, NOT(pmf.id is null) as favourite from pm_mobile_videos "."left outer join (select * from pm_mobile_favourite ".$diviceIdWhere.") as pmf on pm_mobile_videos.id=pmf.video_id ".$where." order by date_added desc limit ".$startIndex.",".$pageLimit.";";
		$sql = "select * ".
			"from (select ".
				"pm_videos.id as id".
				", video_title".
				", description".
				", yt_thumb".
				", site_views".
				", category".
				", url_flv".
				", featured".
				", date_added".
				", added".
				", yt_id".
				", video_status".
				", pm_videos.uniq_id as pmv_id".
				", NOT(pmf.id is null) as favourite ".
				", trending ".
				"from pm_videos ".
					"left outer join (select * from pm_mobile_favourite ".$deviceIdWhere.") as pmf on pm_videos.uniq_id=pmf.video_id) as result ".
				" ".$where." group by pmv_id order by date_added desc, added desc limit ".($pageNumber*$pageLimit).",".$pageLimit;
		
		$sql = "select * from (".$sql.") as videos left outer join pm_embed_code on pmv_id=pm_embed_code.uniq_id order by date_added desc, added desc";
		//$result["sql"] = $sql;
		$list = mysql_query($sql);
		while ($row = mysql_fetch_assoc($list)){
			//$result['sqlresult']=$row;
			
			$videoUrl = $row['url_flv'];
			if (empty($videoUrl)) {
				$videoUrl = $row['embed_code'];
			}
			$resultArray[] = array(
				'id'=>$row['pmv_id'],
				'video_title'=>$row['video_title'],
				'video_desc'=>$row['description'],
				'yt_thumb'=>$row['yt_thumb'],
				'site_views'=>$row['site_views'],
				'category'=>$row['category'],
				'video_url'=>$videoUrl,
				//'video_url'=>$row['url_flv'],
				'featured'=>$row['featured'],
				'date_added'=>$row['date_added'],
				'yt_id'=>$row['yt_id'],
				'favourite'=>$row['favourite'],
				//'embed_code'=>$row['embed_code']
			);
		}
	   
		//if(sizeof($resultArray) > 0){
		//$result["sql"] = $sql;
		//$result["status"] = "200";
		//$result["success"] = true;
		$result["status"] = 'success';
		$result["message"] = 'ok';
		$result["data"] = $resultArray;
		 /*}else{
			$result["status"] = 'error';
			$result["message"] = 'no data found';
			$result["data"] = $resultArray;
		 }*/
		 error_log(json_encode($result), 0);
		print_r (json_encode($result)) ;	
	}else if($api_method == "LeaveVideoComment"){
	
		$videoId = $_POST['VideoID'];
		$videoComment  = $_POST['Comment'];	
		
		$result = array();
		$sql = "insert into uploaded_comments(video_id, comment, commented_date) values('".$videoId."','".$videoComment."','".date("Y-m-d")."');";
		mysql_query($sql);
		$result["status"] = 'success';
		$result["message"] = 'ok';
		echo (json_encode($result)) ;	
		
	}else if($api_method == "LoadVideoCommentList"){
		$videoId = $_POST['VideoID'];
		$pageNumber = $_POST['PageNumber'];
		$pageLimit = $_POST['ListviewLimit'];
		
		$count = ($pageNumber+1)*$pageLimit;
		$sql = "select * from uploaded_comments where video_id = '".$videoId."' order by id desc, commented_date desc limit ".($pageNumber*$pageLimit).",".$count.";";	
		
		$list = array();
		$result = array();
		$resultArray = array();
		
		$list = mysql_query($sql);
		
		while ($row = mysql_fetch_assoc($list)){
			$resultArray[] = array(
				'id'=>$row['id'],
				'commented_date'=>$row['commented_date'],
				'comment'=>$row['comment']
			);
		}
	   
		//if(sizeof($resultArray) > 0){
		$result["status"] = 'success';
		$result["message"] = 'ok';
		$result["data"] = $resultArray;
		 /*}else{
			$result["status"] = 'error';
			$result["message"] = 'no data found';
			$result["data"] = $resultArray;
		 }*/
		print_r (json_encode($result));
	} else if($api_method == "AddToFavourite"){
		$result = array();
		$videoId = $_POST['VideoID'];
		$deviceId = $_POST['DeviceID'];
		$sql = "insert into pm_mobile_favourite(video_id, device_id) values('".$videoId."', '".$deviceId."')";
		mysql_query($sql);
		
		$result["status"] = 'success';
		$result["message"] = 'ok';
		print_r (json_encode($result));
	} else if($api_method == "RemoveFromFavourite"){
		$result = array();
		$videoId = $_POST['VideoID'];
		$deviceId = $_POST['DeviceID'];
		$sql = "delete from pm_mobile_favourite where video_id='".$videoId."' AND device_id='".$deviceId."'";
		mysql_query($sql);
		$result["status"] = 'success';
		$result["message"] = 'ok';
		print_r (json_encode($result));
	}
	
?>