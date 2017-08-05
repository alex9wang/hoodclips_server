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
if($_POST['select_language'] == 1 || (strcmp($_POST['select_language'],"1") == 0))
{
	require_once('include/settings.php');
	
	$l_id = (int) $_POST['lang_id'];
	if( ! array_key_exists($l_id, $langs) )
	{
		$l_id = 1;
	}
	
	setcookie(COOKIE_LANG, $l_id, time()+COOKIE_TIME, COOKIE_PATH);
	exit();
}

$page_number = $_GET['page'];
if($page_number == 1) {header("Location:index.php");}


//require_once('include/functions.php');
require_once('include/user_functions.php');
require_once('include/islogged.php');
require_once('include/rating_functions.php');
require_once('get_videos.php');
$modframework->trigger_hook('index_top');

// define meta tags & common variables
if ('' != $config['homepage_title'])
{
	$meta_title = $config['homepage_title'];
}
else
{
	$meta_title = sprintf($lang['homepage_title'], _SITENAME);	
}
$meta_keywords = $config['homepage_keywords'];
$meta_description = $config['homepage_description'];

	$tbl_name="pm_videos";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	//$query = "SELECT max(date_added), min(date_added), DATEDIFF(max(date_added),min(date_added)) FROM $tbl_name WHERE date_added !='0000-00-00' ";
	
	//print_r(mysql_fetch_array(mysql_query($query)));
	
	 $query = "SELECT  DATEDIFF(max(date_added),min(date_added)) as num FROM $tbl_name WHERE date_added !='0000-00-00' ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	 $total_pages = $total_pages['num'] + 1;
	//echo $total_pages;
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 4; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name order by date_added desc LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<ul class=\"paging\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<li class=\"prev\"><a href=\"$targetpage?page=$prev\" class=\"prev\" rel=\"prev\"> Previous</a></li>";
		else
			$pagination.= "<li class=\"prev\"><a class=\"prev disabled\"> Previous</a></li>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<li><span style=\"font-weight:bold;color:#991a1a;pointer-events:none; display:block;padding-top:10px;\">$counter</span></li>";
				else
					$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span style=\"font-weight:bold;color:#991a1a;pointer-events:none; display:block;padding-top:10px;\">$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
				$pagination.= "...";
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span style=\"font-weight:bold;color:#991a1a;pointer-events:none; display:block;padding-top:10px;\">$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\" >$counter</a></li>";					
				}
						$pagination.= "<li><a href=\"$targetpage?page=$counter\" >$counter</a></li>";					
				$pagination.= "<li><a href=\"$targetpage?page=$lpm1\">$lpm1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=$lastpage\">$lastpage</a></li>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<li><a href=\"$targetpage?page=1\">1</a></li>";
				$pagination.= "<li><a href=\"$targetpage?page=2\">2</a></li>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<li><span style=\"font-weight:bold;color:#991a1a;pointer-events:none; display:block;padding-top:10px;\">$counter</span></li>";
					else
						$pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<li class=\"next\"><a href=\"$targetpage?page=$next\" class=\"next\" rel=\"next\">Next </a></li>";
		else
			$pagination.= "<li class=\"next\"><span class=\"disabled\">Next </span></li>";
		$pagination.= "</ul>\n";		
	}

	if($page != ""){ $p =($page*4)-4;}
	else{$p=0;}
	$j=1;
	
	
	for($j=1; $j<=4; $j++)
	{
	$format = 'Y-m-j';
	$date = date ( $format );
	  $added_date = date ( $format, strtotime ( "-$p day" . $date ) );
	
	
	
	
	
	
	if($j == 1)
		{
		
$count = mysql_fetch_array(mysql_query("select count(*) as total_videos from pm_videos where date_added = '$added_date' and video_status =1"));
$smarty->assign("total_videos1", $count['total_videos']);

				 //Fetch listing
				 $res2 = mysql_query("SELECT * FROM $tbl_name where  date_added = '$added_date' and video_status =1"); 
				 while($row = mysql_fetch_array($res2))
				  {$new_video = get_video_list1($added_date,'id', 'desc', 0, _NEWVIDS);
					$smarty->assign("video_listing1", $new_video);			
					break;}
			
			
					if(mysql_num_rows($res2) == 0) {$smarty->assign("data1", 'false');}
					
					if(date('Y-m-d') == $added_date){$smarty->assign("added_date1", "TODAY'S <mark>VIDEOS</mark>");}
					else {
						$get_date = date("F j Y", strtotime($added_date) );
						$break_date = explode(' ',$get_date);
						$added_date = $break_date[0]."  <mark>".$break_date[1].", </mark> <mark style=color:#8f8f8f>".$break_date[2]."</mark> &nbsp;";
						$smarty->assign("added_date1", $added_date);
					$smarty->assign("date", 'false');}
		}		
		elseif($j == 2)
		{
			$count = mysql_fetch_array(mysql_query("select count(*) as total_videos from pm_videos where date_added = '$added_date' and video_status =1"));
$smarty->assign("total_videos2", $count['total_videos']);
			
			//Fetch listing
			$res2 = mysql_query("SELECT * FROM $tbl_name where  date_added = '$added_date' and video_status =1"); 
			while($row = mysql_fetch_array($res2))
	   		 {
				$new_video = get_video_list1($added_date,'id', 'desc', 0, _NEWVIDS);
				$smarty->assign("video_listing2", $new_video);			
		 	   break;
				}
				if(mysql_num_rows($res2) == 0) {$smarty->assign("data2", 'false');}
				
                $get_date = date("F j Y", strtotime($added_date) );
				$break_date = explode(' ',$get_date);     $added_date = $break_date[0]."
							<mark>".$break_date[1].", </mark> <mark style=color:#8f8f8f>".$break_date[2]."</mark> &nbsp;";
$smarty->assign("added_date2", $added_date);         }         elseif($j == 3)
{             $count = mysql_fetch_array(mysql_query("select count(*) as
total_videos from pm_videos where date_added = '$added_date' and video_status
=1")); $smarty->assign("total_videos3", $count['total_videos']);

			//Fetch listing
			$res2 = mysql_query("SELECT * FROM $tbl_name where  date_added = '$added_date' and video_status =1"); 
			while($row = mysql_fetch_array($res2))
	   		 {
				$new_video = get_video_list1($added_date,'id', 'desc', 0, _NEWVIDS);
				$smarty->assign("video_listing3", $new_video);			
		 	   break;
				}
				
			if(mysql_num_rows($res2) == 0) {$smarty->assign("data3", 'false');}
			$get_date = date("F j Y", strtotime($added_date) );
						$break_date = explode(' ',$get_date);
						$added_date = $break_date[0]."  <mark>".$break_date[1].", </mark> <mark style=color:#8f8f8f>".$break_date[2]."</mark> &nbsp;";
			$smarty->assign("added_date3", $added_date);
		}
		elseif($j == 4)
		{
			$count = mysql_fetch_array(mysql_query("select count(*) as total_videos from pm_videos where date_added = '$added_date' and video_status =1"));
$smarty->assign("total_videos4", $count['total_videos']);

			//Fetch listing
			$res2 = mysql_query("SELECT * FROM $tbl_name where  date_added = '$added_date' and video_status =1"); 
			while($row = mysql_fetch_array($res2))
	   		 {
				$new_video = get_video_list1($added_date,'id', 'desc', 0, _NEWVIDS);
				$smarty->assign("video_listing4", $new_video);			
		 	   break;
				}
				
			if(mysql_num_rows($res2) == 0) {$smarty->assign("data4", 'false');}
			$get_date = date("F j Y", strtotime($added_date) );
						$break_date = explode(' ',$get_date);
						$added_date = $break_date[0]."  <mark>".$break_date[1].", </mark> <mark style=color:#8f8f8f>".$break_date[2]."</mark> &nbsp;";
			$smarty->assign("added_date4", $added_date);
		}
	$p++;
	
	
	
	
	}

$pagination_code = $pagination;
$smarty->assign('pagination_code', $pagination_code);
$smarty->assign('page_number', $page_number);




//Featured Main Video
		 $get_fmain_row = mysql_fetch_array(mysql_query("select * from pm_videos where fvid_cat = 1 "));
		 $fvid_main_title = $get_fmain_row['video_title'];
		 $fvid_main_type = $get_fmain_row['fvid_type'];
		 $fvid_main_sdetail = $get_fmain_row['fvid_sdetail'];
 		 $fvid_main_thumb = $get_fmain_row['yt_thumb'];
	
	 $get_fmain_url_row = mysql_fetch_array(mysql_query("select embed_code from pm_embed_code where uniq_id = '".$get_fmain_row['uniq_id']."' "));
		 $fvid_main_url = $get_fmain_url_row['embed_code'];
		 
		 
//Featured small video 1
		 $get_s1_row = mysql_fetch_array(mysql_query("select * from pm_videos where fvid_cat = 2 "));
		 $fvid_s1_title = $get_s1_row['video_title'];
		 $fvid_s1_type = $get_s1_row['fvid_type'];
		 $fvid_s1_sdetail = $get_s1_row['fvid_sdetail'];
 		 $fvid_s1_thumb = $get_s1_row['yt_thumb'];
 		
		 $get_s1_url_row = mysql_fetch_array(mysql_query("select embed_code from pm_embed_code where uniq_id = '".$get_s1_row['uniq_id']."' "));
		 $fvid_s1_url = $get_s1_url_row['embed_code'];
		 
		 
//Featured small video 2
		 $get_s2_row = mysql_fetch_array(mysql_query("select * from pm_videos where fvid_cat = 3"));
		 $fvid_s2_title = $get_s2_row['video_title'];
		 $fvid_s2_type = $get_s2_row['fvid_type'];
		 $fvid_s2_sdetail = $get_s2_row['fvid_sdetail'];
		 $fvid_s2_thumb = $get_s2_row['yt_thumb'];
		
		 $get_s2_url_row = mysql_fetch_array(mysql_query("select embed_code from pm_embed_code where uniq_id = '".$get_s2_row['uniq_id']."' "));
		 $fvid_s2_url = $get_s2_url_row['embed_code'];
		 
		
//Fetch Trending Videos
		 $trending_videos = get_trending_videos('id', 'desc', 0, _NEWVIDS);
		 $smarty->assign("trending_videos", $trending_videos);			
include("footer.php");		

$smarty->assign('fvid_main_title', $fvid_main_title);
$smarty->assign('fvid_main_type', $fvid_main_type);
$smarty->assign('fvid_main_sdetail', $fvid_main_sdetail);
$smarty->assign('fvid_main_thumb', $fvid_main_thumb);
$smarty->assign('fvid_main_url', $fvid_main_url);

$smarty->assign('fvid_s1_title', $fvid_s1_title);
$smarty->assign('fvid_s1_type', $fvid_s1_type);
$smarty->assign('fvid_s1_sdetail', $fvid_s1_sdetail);
$smarty->assign('fvid_s1_thumb', $fvid_s1_thumb);
$smarty->assign('fvid_s1_url', $fvid_s1_url);


$smarty->assign('fvid_s2_title', $fvid_s2_title);
$smarty->assign('fvid_s2_type', $fvid_s2_type);
$smarty->assign('fvid_s2_sdetail', $fvid_s2_sdetail);
$smarty->assign('fvid_s2_thumb', $fvid_s2_thumb);
$smarty->assign('fvid_s2_url', $fvid_s2_url);


// --- DEFAULT SYSTEM FILES - DO NOT REMOVE --- //
$smarty->assign('meta_title', $meta_title);
$smarty->assign('meta_keywords', $meta_keywords);
$smarty->assign('meta_description', $meta_description);
$smarty->assign('template_dir', $template_f);
$modframework->trigger_hook('index_bottom');
$smarty->display('index.tpl');


