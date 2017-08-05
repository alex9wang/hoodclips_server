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

if(ini_get('max_execution_time') > 60)
{
	@set_time_limit(60);
}

header("Expires: Mon, 1 Jan 1999 01:01:01 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


define('VS_UNCHECKED', 0);
define('VS_OK', 1);
define('VS_BROKEN', 2);
define('VS_RESTRICTED', 3);
define('VS_UNCHECKED_IMG', "vs_unchecked");
define('VS_OK_IMG', "vs_ok");
define('VS_BROKEN_IMG', "vs_broken");
define('VS_RESTRICTED_IMG', "vs_restricted");
define('VS_NOTAVAILABLE_IMG', "vs_na");

define('SLEEP', 1);
define('TIME_DIFF', 10 * 60);

function response($video_id, $status = 0, $message = "")
{
	$status_img = VS_UNCHECKED_IMG;
	
	switch($status)
	{
		case VS_UNCHECKED: 	$status_img = VS_UNCHECKED_IMG;  break;
		case VS_OK: 		$status_img = VS_OK_IMG; 		 break;
		case VS_BROKEN: 	$status_img = VS_BROKEN_IMG; 	 break;
		case VS_RESTRICTED: $status_img = VS_RESTRICTED_IMG; break;
	}	
	return json_encode(array("video_id" => $video_id, "status_img" => $status_img, "message" => $message));
}

function get_video_details($video_id = 0)
{
	if( $video_id )
	{
		$sql = "SELECT * 
				FROM pm_videos 
				LEFT JOIN pm_videos_urls 
				  ON (pm_videos.uniq_id = pm_videos_urls.uniq_id) 
				WHERE pm_videos.id = '". $video_id ."' 
				LIMIT 1";
			
		$result = @mysql_query($sql);
		if(!$result)
		{
			return false;
		}
		$video = mysql_fetch_assoc($result);
		mysql_free_result($result);
		return $video;
	}
	return false;
}

function update_video($video_id = 0, $status = 0)
{
	if($video_id)
	{
		$sql = "UPDATE pm_videos SET status = '".$status."', last_check = '".time()."' WHERE id = '".$video_id."'";
		$result = mysql_query($sql);
		if(!$result)
			return false;
	}
	return true;
}

function vscheck_fetch_headers($url)
{
	$headers = array();
	$url = trim($url);
	
	$error = 0;
	if(function_exists('get_headers'))
	{
		$url = str_replace(' ', '%20', $url);
		if( ! strstr($url, "http://"))
		{
			$url = "http://" . $url;
		}
		$headers = @get_headers($url, 0);
		if(!$headers)
		{
			$error = 1;
		}
	}
	
	if($error == 1 || function_exists('get_headers') === FALSE)
	{
		$error = 0;

		if(function_exists('curl_init'))
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_NOBODY ,1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
			$data = curl_exec($ch);
			$errormsg = curl_error($ch);
			curl_close($ch);
			
			if($errormsg != '')
			{
				return array('error' => $errormsg);
			}				
			$headers = explode("\n", $data);
		}
		else if(ini_get('allow_url_fopen') == 1)
		{
			$fp = @fopen($url, "r");
			if ( ! $fp)
			{
				$error = 1;
			}
			else
			{
				if(function_exists('stream_get_meta_data'))
				{
					$data = @stream_get_meta_data($fp);
					$headers = $data['wrapper_data'];
				}
				else
				{
					$headers = $http_response_header;
				}
			}
			@fclose($fp);
		}
	}
	if ($error)
	{
		return array('error' => 'Failed to open stream.');
	}
	return $headers;
}

require_once('../config.php');
include_once('functions.php');
include_once( ABSPATH . 'include/user_functions.php');
include_once( ABSPATH . 'include/islogged.php');

if ( ! is_user_logged_in() || ( ! is_admin() && ! is_moderator()) || (is_moderator() && mod_cannot('manage_videos')))
{
	//log_error("Unauthorized access attempt", "Video Status Checker", 1);
	$message = json_encode(array("message" => "$x  You must be logged as an Administrator!"));
	echo $message;
	exit();
}


$job_type = 0;
if( ($_GET['job_type'] != '') || ($_POST['job_type'] != '') )
{
	$job_type = (int) ($_GET['job_type'] != '') ? $_GET['job_type'] : $_POST['job_type'];
}

switch($job_type)
{
	case 0: break;
	case 1:

		$video_id = (int) trim($_POST['vid_id']);

		$video = array();
		$status = 0;
		$message = "";
		
		if($video_id != 0)
		if($video = get_video_details($video_id))
		{
			switch($video['source_id'])
			{
			  case 3:	//	Youtube
				
				if ($video['yt_id'] == "")
				{
					$message = response($video_id, $status, "Video '".$video['uniq_id']."' has an invalid video id.");
					break;
				}
				
				if((time() - $video['last_check']) > TIME_DIFF)
				{
					$reason = '';
					
					define('PHPMELODY', true);
					include(ABSPATH . 'admin/src/youtube-sdk/autoload.php');

					$google_client = new Google_Client();
					$google_client->setDeveloperKey($config['youtube_api_key']);
					$youtube_api = new PhpmelodyYouTube($google_client);

					// cheaper way first
					$status = $youtube_api->pm_get_video_status($video['yt_id']);

					if (is_array($status) && array_key_exists('error', $status))
					{
						$reason = $status['error']['message']; // api error
					}
					else
					{
						update_video($video_id, $status);
					}
				}
				else
				{
					$status = $video['status'];
				}
				
				if(strlen($reason) > 0)
				{
					$message = response($video_id, $status, $reason);
				}
				else
				{
					$message = response($video_id, $status, "");
				}
				
				sleep(SLEEP);
			
			  break;
			  
			  default:
			
				$message = response($video_id, $status, "Sorry, Video ID '".$video['uniq_id']."' cannot be checked.");
				
			  break;
			  
			  case 1: // localhost
			  	
			  	$error_msg = '';
				
			  	if ($video['url_flv'] != '')
				{
					if (file_exists(_VIDEOS_DIR_PATH . $video['url_flv']))
					{
						if (($size = filesize(_VIDEOS_DIR_PATH . $video['url_flv'])) === 0)
						{
							$status = VS_BROKEN;
							$error_msg = 'The file <code>'. $video['url_flv'] .'</code> is <strong>'. $size .' bytes</strong> in size.';
						}
						else
						{
							$status = VS_OK;
						}
					}
					else
					{
						$status = VS_BROKEN;
						$error_msg = 'File <code>'. $video['url_flv'] .'</code> not found in <code>'. _VIDEOS_DIR_PATH .'</code> directory.';
					}
					
					$error_msg = ($error_msg != '') ? $video['uniq_id'] .': '. $error_msg : '';
					
					$message = response($video_id, $status, $error_msg);
					update_video($video_id, $status);
				}
				else
				{
					// url_flv = ''
				}
				
			  break;
			  
			  case 2: // remote file location
			  
			  	$error_msg = '';
				$status = $video['status'];
				
			  	if (is_url($video['url_flv']) || is_ip_url($video['url_flv']))
				{
					$headers = (array) vscheck_fetch_headers($video['url_flv']);
					
					if (array_key_exists('error', $headers))
					{
						$error_msg = 'Could not fetch requested information. <br />Error <code>'. $headers['error'] .'</code>';
					}
					else
					{
						preg_match('/[0-9]{3}/', $headers[0], $matches);
						$code = (int) $matches[0];
						
						unset($matches);
						
						switch ($code)
						{
							case 200:
							case 304: 
								
								$status = VS_OK;
								
							break;
							
							case 301:
							case 302:
								
								// get new location
								foreach ($headers as $k => $v)
								{
									if(strpos($headers[$i], "ocation:") !== false)
									{
										$str1 = explode("ocation:", $headers[$i]);
										$link = trim($str1[1]);
										break;
									}
								}
								
								$status = VS_BROKEN;
								
								$error_msg = 'File moved ';
								$error_msg .= ($code == 301) ? 'permanently' : 'temporarily';
								$error_msg .= ' to this location: <code>'. $link .'</code>';
								
							break;
	
							case 400:
							case 401:
							case 403:
							case 404:
							case 501:
							case 502:
								
								$status = VS_BROKEN;
								$error_msg = 'The server responded with a <code>'. $headers[0] .'</code> to your request.'; 
							
							break;
							
							case 500:
							case 503:
								
								$error_msg = 'The server is temporarily unavailable. Try again later.';
								
							break;
						}						
					}
				}
				else
				{
					$error_msg = 'This doesn\'t look like a valid URL: <code>'. $video['url_flv'] .'</code>';
				}
				
				$error_msg = ($error_msg != '') ? $video['uniq_id'] .': '. $error_msg : '';
				
			  	update_video($video_id, $status);
				$message = response($video_id, $status, $error_msg);
				
			  break;
			}	//	end main switch()
		}
		else
		{
			$message = response($video_id, $status, "Error: Cannot retrieve video details.");
		}

		echo $message;
	break;
}
exit();
