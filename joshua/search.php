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
require_once('include/functions.php');
require_once('include/user_functions.php');
require_once('include/islogged.php');
require_once('include/rating_functions.php');
require_once('get_videos.php');


	$tbl_name="pm_videos";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	
	$filter = $_GET['filter'];
	
	if($_REQUEST['keywords'] != ""){
	$_SESSION['keywords'] = $_REQUEST['keywords'];
	$search = $_SESSION['keywords'];
	}
	else{
		unset($_SESSION['keywords']);
		header("Location:index.php");
	}
	
	if($filter  == "Most Viewed") {$filter = ' order by site_views desc';}
	elseif($filter  == "Newest") {$search_like = 'order by date_added desc';}
	elseif($filter  == "Oldest") {$search_like = 'order by date_added asc';}
	
	
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE video_title Like '%$search%' $search_like";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "search.php"; 	//your file name  (the name of this file)
	$limit = 52; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name WHERE video_title Like '%$search%' $search_like LIMIT $start, $limit";
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


$Search_Data = array();
$s = 0; 


		while($row = mysql_fetch_array($result))
		{
			
		$Search_Data[$s] = $row;	
        
        $Search_Data[$s]['video_href'] = makevideolink($row['uniq_id'], $row['video_title'], $row['video_slug']);
	      	$Search_Data[$s]['added_date'] = date("F j, Y", strtotime($row['date_added']) );
		
		$Search_Data[$s]['thumb_img_url'] = show_thumb($row['uniq_id'], 1, $row);
		$Search_Data[$s]['views_compact'] = pm_compact_number_format($row['site_views']);
		
		 //get video comments
		 $get_comment = mysql_fetch_array(mysql_query("select count(*) as total_comments from pm_comments where uniq_id = '".$row['uniq_id']."' "));
		 
		 			
		$Search_Data[$s]['comments_compact'] = pm_compact_number_format($get_comment['total_comments']);
		
		
		
		
        
        $s++;
		
		
	
		
		 
		


	
				
	
		}
		
$smarty->assign("Search_Data", $Search_Data);	

$smarty->assign("search", $search);	
$smarty->assign("total_videos", $total_pages);	
$smarty->assign("filter", $filter);	

	
$pagination_code = $pagination;
$smarty->assign('pagination_code', $pagination_code);


include("footer.php");		


$smarty->assign('meta_title', $meta_title);
$smarty->assign('meta_description', $meta_description);
$smarty->assign('template_dir', $template_f);
$smarty->display('video-search.tpl');
?>