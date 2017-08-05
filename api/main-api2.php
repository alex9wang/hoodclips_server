<?php
	require_once '../config.php';
	require_once '../include/functions.php';
	require_once '../include/user_functions.php';

	$api_method = $_POST['MethodType'];
	
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
		
	}else if($api_method == "LoadUploadedVideoList"){
		
		$sql = "";
		$list = array();
		$result = array();
		$resultArray = array();
		$allparamVal = array();

		$pageNumber = $_POST['PageNumber'];
		$pageLimit = $_POST['ListviewLimit'];
		
		$startIndex = $pageNumber*$pageLimit;
		
		$sql = "select * from pm_mobile_videos order by date_added desc limit ".$startIndex.",".$pageLimit.";";	
		
		$list = mysql_query($sql);
		while ($row = mysql_fetch_assoc($list)){
			$resultArray[] = array(
				'id'=>$row['id'],
				'video_title'=>$row['video_title'],
				'video_desc'=>$row['description'],
				'yt_thumb'=>$row['yt_thumb'],
				'site_views'=>$row['site_views'],
				'category'=>$row['category'],
				'video_url'=>$row['url_flv'],
				'featured'=>$row['featured'],
				'date_added'=>$row['date_added'],
				'yt_id'=>$row['yt_id']
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
		$sql = "select * from uploaded_comments where video_id = '".$videoId."' order by id desc, commented_date desc limit 0,".$count.";";	
		
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
		print_r (json_encode($result)) ;	
	}
?>