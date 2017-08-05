<?php
function get_video_list1($date, $order_by = '', $sort = '', $start = 0, $limit = 1000, $category_id = 0, $video_ids = array(), $uniq_ids = array()) 
{
	 $sql = "SELECT * FROM pm_videos 
			 WHERE date_added = '". $date ."' and video_status =1 ";

	if ( ! $limit && (empty($category_id) && empty($video_ids) && empty($uniq_ids)))
	{	
		return array();
	}
	
	$video_ids_count = (is_array($video_ids)) ? count($video_ids) : 0;
	$uniq_ids_count = (is_array($uniq_ids)) ? count($uniq_ids) : 0;
	
	if ($uniq_ids_count > 0)
	{
		$sql_in = '';
		foreach ($uniq_ids as $k => $uid)
		{
			$sql_in .= "'$uid',";
		}
		$sql_in = rtrim($sql_in, ',');
		$sql .= ' AND uniq_id IN('. $sql_in .') ';
	}
	else if ($video_ids_count > 0)
	{
		$sql_in = '';
		foreach ($video_ids as $k => $vid)
		{
			$sql_in .= "'$vid',";
		}
		$sql_in = rtrim($sql_in, ',');
		$sql .= ' AND id IN('. $sql_in .') ';
	}
	else if ($category_id != 0)
	{
		$sql .= " AND (category LIKE '%,$category_id,%' or category like '%,$category_id' or category like '$category_id,%' or category='$category_id') ";
	}
	$sql .= ( ! empty($order_by)) ? " ORDER BY $order_by $sort " : '';
	 $sql .= ( ! empty($limit)) ? " LIMIT $start, $limit " : '';	

	$list = array();
	$i = 0; 
	
	$result = mysql_query($sql);
	while ($row = mysql_fetch_assoc($result))
	{
		$list[$i] = $row;
			
		$sql_date = date('Y-m-d', $row['added']);
		$date_diff = round( abs(strtotime(date('Y-m-d'))-strtotime($sql_date)) / 86400, 0 );
		
		$list[$i]['attr_alt'] = htmlspecialchars(stripslashes($row['video_title']));
		$list[$i]['excerpt'] = generate_excerpt($row['description'], 255);

		if ($date_diff < _ISNEW_DAYS)
		{
			$list[$i]['mark_new'] = true; 
		}
		
		if ($row['site_views'] > _ISPOPULAR)
		{
			$list[$i]['mark_popular'] = true;
		}

		if (function_exists('bin_rating_get_item_meta'))
		{
			$rating_meta = bin_rating_get_item_meta($row['uniq_id']);
			$balance = bin_rating_calc_balance($rating_meta['up_vote_count'], $rating_meta['down_vote_count']);

			$list[$i]['up_vote_count'] = (int) $rating_meta['up_vote_count'];
			$list[$i]['likes'] = $list[$i]['up_vote_count'];
			$list[$i]['down_vote_count'] = (int) $rating_meta['down_vote_count'];
			$list[$i]['dislikes'] = $list[$i]['down_vote_count'];
			
			$list[$i]['up_vote_count_formatted'] = pm_number_format($list[$i]['up_vote_count']);
			$list[$i]['down_vote_count_formatted'] = pm_number_format($list[$i]['down_vote_count']);
			$list[$i]['up_vote_count_compact'] = pm_compact_number_format($list[$i]['up_vote_count']);
			$list[$i]['down_vote_count_compact'] = pm_compact_number_format($list[$i]['down_vote_count']);
			
			$list[$i]['likes_formatted'] = $list[$i]['up_vote_count_formatted'];
			$list[$i]['dislikes_formatted'] = $list[$i]['down_vote_count_formatted'];
			$list[$i]['likes_compact'] = $list[$i]['up_vote_count_compact'];
			$list[$i]['dislikes_compact'] = $list[$i]['down_vote_count_compact'];
			
			$list[$i] = array_merge($list[$i], $balance);
		}
		
		$author_data = fetch_user_info($row['submitted']);

		$list[$i]['date_added'] = $row['date_added'];
		$list[$i]['duration'] = sec2hms($row['yt_length']);
		$list[$i]['video_href'] = makevideolink($row['uniq_id'], $row['video_title'], $row['video_slug']);
		$list[$i]['video_href_urldecoded'] = urldecode($list[$i]['video_href']); // otherwise it looks encoded for cyrillic, arabic and other non-latin charsets.
		$list[$i]['thumb_img_url'] = show_thumb($row['uniq_id'], 1, $row);
		$list[$i]['author_username'] = $row['submitted'];
		$list[$i]['author_user_id'] = $author_data['id'];
		$list[$i]['author_power'] = $author_data['power'];
		$list[$i]['author_name'] = $author_data['name'];
		$list[$i]['author_avatar_url'] = $author_data['avatar_url'];
		$list[$i]['author_profile_href'] = ($row['submitted'] != 'bot') ? _URL .'/profile.'. _FEXT .'?u='. $row['submitted'] : '#';
		
		$list[$i]['html5_datetime'] = date('Y-m-d\TH:i:sO', $row['added']); // ISO 8601
		$list[$i]['full_datetime'] = date('l, F j, Y g:i A', $row['added']); 
		$list[$i]['time_since_added'] = time_since($row['added']);
		 $list[$i]['views_compact'] = pm_compact_number_format($row['site_views']);
		 
		 //get video comments
		 $get_comment = mysql_fetch_array(mysql_query("select count(*) as total_comments from pm_comments where uniq_id = '".$row['uniq_id']."' "));
		 $list[$i]['comments_compact'] = pm_compact_number_format($get_comment['total_comments']);

		//$list[$i]['comments'] = 0; // EDITME @todo
		//$list[$i]['comments_compact'] = pm_compact_number_format(0); // EDITME @todo
		$i++;
	}
	mysql_free_result($result);

	// preserve order for given $video_ids or $uniq_ids
	if (empty($order_by) && ($video_ids_count > 0 || $uniq_ids_count > 0))
	{
		$i = 0;
		$new_list = array();
		$order = ($video_ids_count > 0) ? $video_ids : $uniq_ids;
		$search_attr = ($video_ids_count > 0) ? 'id' : 'uniq_id';

		foreach ($order as $k => $id)
		{
			foreach ($list as $kk => $video_data)
			{
				if ($video_data[$search_attr] == $id)
				{
					$new_list[$i] = (array) $video_data;
					break;
				}
			}
			$i++;
		}
		
		return $new_list;
	}
	
	return $list;
}


