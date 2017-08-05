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
require_once('../config.php');
include_once('functions.php');
include_once( ABSPATH . 'include/user_functions.php');
include_once( ABSPATH . 'include/islogged.php');

if ( ! defined('U_ADMIN'))
{
	define('U_ADMIN', 1);
}

if ( ! $logged_in || ! (is_admin() || is_moderator() || is_editor()))
{
	exit('Access denied.');
}

$illegal_chars = array(">", "<", "&", "'", '"');

$message = '';
$page	 = '';


if ($_GET['p'] != '' || $_POST['p'] != '')
{
	$page = ($_GET['p'] != '') ? $_GET['p'] : $_POST['p'];
}

if ($_GET['do'] != '' || $_POST['do'] != '')
{
	$action = ($_GET['do'] != '') ? $_GET['do'] : $_POST['do'];
}

if ($page == '')
{
	exit('Page param is required.');
}

switch ($page)
{
	case 'addvideo':
		
		switch ($action)
		{
			case 'checkurl':
				
				if ($_POST['url'] == '')
				{
					exit();
				}
				
				if ( ! $logged_in || ( ! is_admin() && ! is_moderator() && ! is_editor()))
				{
					exit();
				}
				if (is_editor() || (is_moderator() && !mod_can('manage_videos')))
				{
					exit();
				}
				
				$msg = '';
				$msg_color = '';
				
				$url = trim($_POST['url']);
				$url = secure_sql($url);
				$uniq_id = '';
				
				if (strpos($url, 'youtube.com'))
				{
					preg_match("/v=([^(\&|$)]*)/", $url, $matches);
					$url = 'http://www.youtube.com/watch?v='. $matches[1];
				}
			
				$sql = "SELECT uniq_id FROM pm_videos_urls 
						WHERE direct = '". $url ."'";
				$result = @mysql_query($sql);
				if ( ! $result)
				{
					$msg = 'MySQL error';
					$msg_color = 'red';
				}
				if (mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_assoc($result);
					$uniq_id = $row['uniq_id'];
					
					$msg = 'This URL was already added into your database! <a href="modify.php?vid='. $uniq_id. '">Edit</a> video.';
					$msg_color = 'red';
				}
				else
				{
					$msg = '';
					$msg_color = 'green';
				}
				mysql_free_result($result);
				
				if (strlen($msg) > 0)
				{
					echo '<small><i><span style="color: '. $msg_color .';">'. $msg .'</span></i></small>';
				}
				
				exit(); // the end
				
			break;
			
			case 'generate-video-slug':
				
				if ($_POST['video-title'] != '')
				{
					$text = trim($_POST['video-title']);
					$text = sanitize_title($text);
					$text = urldecode($text); 
					exit($text);
				}
				
				exit();
				
			break;

			case 'delete-subtitle': // @since v2.3

				if( ! (is_admin() || (is_moderator() && mod_can('manage_videos'))))
				{
					exit(json_encode(array('type' => 'error',
										   'html' => pm_alert_error('You do not have permission to perform this action.', array('id' => '_error'))
										)
									)
					);
				}

				$sub_id = (int) $_POST['sub-id'];
				if ( ! $sub_id)
				{
					exit(json_encode(array('type' => 'error',
							  			   'html' => pm_alert_error('Invalid ID provided.', array('id' => '_error'), true)
										)
								)
					);
				}

				$sql = "SELECT * FROM pm_video_subtitles
						WHERE id = ". $sub_id;
				$result = mysql_query($sql);
				$sub = mysql_fetch_assoc($result);
				mysql_free_result($result);

				if ( ! $sub)
				{
					exit(json_encode(array('type' => 'error',
											'html' => pm_alert_error('Subtitle not found.', array('id' => '_error'), true)
										)
								)
					);
				}

				$sql = "DELETE FROM pm_video_subtitles
						WHERE id = ". $sub_id;
				if ( ! @mysql_query($sql))
				{
					exit(json_encode(array('type' => 'error',
											'html' => pm_alert_error('Failed to update database: <code>'. mysql_error() .'</code>.', array('id' => '_error'), true)
										)
									)
					);
				}

				if($sub['filename'] != '')
				{
					@unlink( _SUBTITLES_DIR_PATH . $sub['filename']);
				}

				exit(json_encode(array('type' => 'success')));

			break;
		}
		
	break;
	
	case 'metadata':
		
		if( ! (is_admin() || (is_moderator() && mod_can('manage_videos'))))
		{
			exit(json_encode(array('type' => 'error',
								   'html' => pm_alert_error('You do not have permission to perform this action.', array('id' => '_error'))
								  )
							)
				);
		}

		$response_type = 'success'; // success, error
		$error_msg = $html = '';
		
		switch ($action)
		{
			case 'add-meta':
				
				$meta_id = 0;
				
				if ($_POST['meta_key_select'] != '' && $_POST['meta_key_select'] != '_nokey')
				{
					$key = trim($_POST['meta_key_select']);
				}
				else
				{
					$key = trim($_POST['meta_key']);					
				}
				$key = substr($key, 0, 255);

				if (strlen($key) > 0)
				{
					$_POST['meta_value'] = str_replace('"', '&quot;', $_POST['meta_value']);
					$_POST['meta_key'] = $key;
					
					if (is_meta_key_reserved($key))
					{
						$error_msg = 'Names starting with an underscore "_" are reserved for the system.'; 
					}
					else
					{
						$meta_id = add_meta((int) $_POST['item_id'], $_POST['item_type'], $key, $_POST['meta_value']);
					
						if ($meta_id)
						{
							$html = admin_custom_fields_row($meta_id, $_POST);
						}
					}
				}
				else
				{
					$error_msg = '"Custom name" field is required.';
				}
				
				if ($error_msg != '')
				{
					$html = pm_alert_error($error_msg, array('id' => '_error_'));
					$response_type = 'error';
				}

				exit(json_encode(array('type' => $response_type, 'html' => $html, 'meta_id' => $meta_id)));
				
			break;

			case 'update-meta':
				
				$meta_id = (int) $_POST['meta_id'];
				
				if ( ! $meta_id)
				{
					$error_msg = 'Invalid meta_id provided.';
				}
				else
				{
					if (is_meta_key_reserved($_POST['meta_key']))
					{
						$error_msg = 'Names starting with an underscore "_" are reserved for the system.';
					}
					else
					{
						$_POST['meta_value'] = str_replace('"', '&quot;', $_POST['meta_value']);
						$update = update_meta(0, 0, $_POST['meta_key'], $_POST['meta_value'], $meta_id);
						
						if ($update)
						{
							$html = pm_alert_success('Updated');
						}
						else
						{
							$error_msg = 'An error occurred while updating. Please try again.';
						}
					}
				}
				
				if ($error_msg != '')
				{
					$response_type = 'error';
					$html = pm_alert_error($error_msg, array('id' => '_error_'));
				}

				exit(json_encode(array('type' => $response_type, 'html' => $html, 'meta_id' => $meta_id)));

			break;
						
			case 'delete-meta':
			
				$meta_id = (int) $_POST['meta_id'];
				
				if ($meta_id)
				{
					$deleted = delete_meta(0, 0, '', $meta_id);
				}
				
				exit(json_encode(array('type' => $response_type, 'html' => '', 'meta_id' => $meta_id)));
				
			break;
			
			default: 
				exit();
			break;
		}
		
	break; // end case 'metadata';

	case 'manage-categories': // @since 2.2
		
		if ( ! is_admin())
		{
			$ajax_msg = 'Sorry, you do not have access to this area.';
			exit(json_encode(array(	'success' => false, 
									'msg' => $ajax_msg, 
									'html' => pm_alert_error($ajax_msg))));
		}
		
		switch ($action)
		{
			case 'add-video-category':
			case 'add-article-category':
			
				$create_category_select_html = ''; // will hold the updated 'Create in' dropdown 

				switch ($action)
				{
					case 'add-video-category':
						
						$result = insert_category($_POST, 'video');
						
					break;
					
					case 'add-article-category':
						
						$result = insert_category($_POST, 'article');
						
					break;
				}
				
				if ($result['type'] == 'error')
				{
					exit(json_encode(array(	'success' => false, 
											'msg' => $result['msg'], 
											'html' => pm_alert_error($result['msg'], false, true))));
				}

				$_POST['current_selection'][] = $result['id'];
				
				switch ($action)
				{
					case 'add-video-category':
						
						$categories_dropdown_options = array(
														'attr_name' => 'category[]',
														'attr_id' => 'main_select_category must',
														'attr_class' => 'category_dropdown span12',
														'select_all_option' => false,
														'spacer' => '&mdash;',
														'selected' => $_POST['current_selection'],
														'other_attr' => 'multiple="multiple"'
														);
						
		
						$ajax_msg = categories_dropdown($categories_dropdown_options);
						$categories_dropdown_options = array(
														'first_option_text' => '&ndash; Parent Category &ndash;', 
														'first_option_value' => '-1',
														'attr_name' => 'add_category_parent_id',
														'attr_id' => '',
														'attr_class' => '',
														'select_all_option' => true,
														'spacer' => '&mdash;'
														);
						$create_category_select_html = categories_dropdown($categories_dropdown_options);
						
					break;
					
					case 'add-article-category':
						
						 $categories_dropdown_options = array(
								                        'db_table' => 'art_categories',
								                        'attr_name' => 'categories[]',
								                        'attr_id' => 'main_select_category',
														'attr_class' => 'category_dropdown span12',
								                        'select_all_option' => false,
								                        'spacer' => '&mdash;',
								                        'selected' => $_POST['current_selection'], 
								                        'other_attr' => 'multiple="multiple" size="3"',
								                        'option_attr_id' => 'check_ignore'
								                        );
						unset($_article_categories);
						$ajax_msg = categories_dropdown($categories_dropdown_options);
						$categories_dropdown_options = array(
															'db_table' => 'art_categories',
															'first_option_text' => '&ndash; Parent Category &ndash;', 
															'first_option_value' => '-1',
															'attr_name' => 'add_category_parent_id',
															'attr_id' => '',
															'attr_class' => '',
															'select_all_option' => true,
															'spacer' => '&mdash;'
															);
						$create_category_select_html = categories_dropdown($categories_dropdown_options); 
						
					break;
				}
				
				exit(json_encode(array(	'success' => true, 
										'create_category_select_html' => $create_category_select_html,
										'msg' => $result['msg'],
										'html' =>  $ajax_msg)));
				
			break;
			
			case 'delete':
				
				if ( ! csrfguard_check_referer('_admin_catmanager'))
				{
					$ajax_msg = 'Invalid token or session expired. Please refresh this page and try again.';
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg, 
											'html' => pm_alert_error($ajax_msg, false, true))));
				}
				
				$id = (int) $_POST['id'];
				$category_type = $_POST['type'];
				
				if ($id > 0)
				{
					$result = delete_category($id, $category_type);
					
					$nonce = csrfguard_raw('_admin_catmanager');
					
					if ($result['type'] == 'error')
					{
						exit(json_encode(array(	'success' => false, 
												'_pmnonce' => $nonce['_pmnonce'],
												'_pmnonce_t' => $nonce['_pmnonce_t'],
												'msg' => $result['msg'], 
												'html' => pm_alert_error($result['msg'], false, true))));
					}
					else
					{
						exit(json_encode(array(	'success' => true, 
												'_pmnonce' => $nonce['_pmnonce'],
												'_pmnonce_t' => $nonce['_pmnonce_t'],
												'msg' => $result['msg'],
												'html' => pm_alert_success($result['msg'], false, true))));
					}
				}
				
			break;
			
			case 'organize':
				
				$sql_table = ($_POST['type'] == 'article') ? 'art_categories' : 'pm_categories';
				
				$tree = $_POST['tree'];
				$total_items = count($tree);
				
				$order = array($tree[1]['item_id'] => array('id' => $tree[1]['item_id'],
															'parent_id' => 0,
															'position' => 1
															)); 
				for ($i = 2; $i < $total_items; $i++)
				{
					$position = 0;
					$parent_id = ($tree[$i]['parent_id'] != '') ? (int) $tree[$i]['parent_id'] : 0;  
					foreach ($order as $category_id => $c)
					{
						if ($c['parent_id'] == $parent_id && $position < $c['position'])
						{
							$position = (int) $c['position'];
						}
					}
					$position++;
					
					$order[$tree[$i]['item_id']] = array('id' => $tree[$i]['item_id'],
														 'parent_id' => (int) $tree[$i]['parent_id'],
														 'position' => (int) $position
														);
				}
				
				if (count($order) > 0)
				{
					$errors = array();
					
					foreach ($order as $category_id => $c)
					{
						$sql = "UPDATE ". $sql_table ." 
								   SET parent_id = ". $c['parent_id'] .", 
								   	   position = ". $c['position'] ."
								 WHERE id = $category_id";
						if ( ! $result = mysql_query($sql))
						{
							$errors[] = 'An MySQL error occurred while updating your category: '. mysql_error();
						}
					}
					if (count($errors) > 0)
					{
						exit(json_encode(array(	'success' => false, 
												'msg' => '',
												'html' => pm_alert_error($errors, false, true))));
					}
				}
				
				$ajax_msg = 'The new order was saved.';
				exit(json_encode(array(	'success' => true, 
										'msg' => $ajax_msg,
										'html' => pm_alert_success($ajax_msg, false, true))));
					
			break;
		}
		
	break;

	case 'page':
		
		switch ($action)
		{
			case 'delete':
				
				if( ! $logged_in || ! is_admin())
				{
					echo pm_alert_error('Sorry, you do not have access to this area.');
					exit();
				}
					
				if ( ! csrfguard_check_referer('_admin_pages'))
				{
					echo pm_alert_error('Invalid token or session expired. Please refresh this page and try again.');
					exit();
				}
				
				$result = delete_page($_GET['id']);				
				if ($result['type'] == 'error')
				{
					echo pm_alert_error($result['msg'], false, true);
				}
				else
				{
					echo csrfguard_form('_admin_pages');
					echo pm_alert_success($result['msg'], false, true);
				}
				
				exit();
				
			break;
			
		}
		
	break;

	case 'articles':
		
		// test permissions for moderators; editors and admins are allowed.
		if (is_moderator() && mod_cannot('manage_articles'))
		{
			echo pm_alert_error('Sorry, you do not have access to this area.');
			exit();
		}
				
		switch ($action)
		{
			case 'delete': // delete an article 
				
				if ( ! csrfguard_check_referer('_admin_articles'))
				{
					echo pm_alert_error('Invalid token or session expired. Please refresh this page and try again.');
					exit();
				}
					
				$id = (int) $_GET['id'];
				if ($id > 0)
				{
					$result = delete_article($id);
					
					if ($result['type'] == 'error')
					{
						echo pm_alert_error($result['msg']);
					}
					else
					{
						// refresh token
						echo csrfguard_form('_admin_articles');
						echo pm_alert_success($result['msg']);
					}
				}

			break;
			
			case 'generate-article-slug':
				
				if ($_POST['title'] != '')
				{
					$text = trim($_POST['title']);
					$text = sanitize_title($text);
					$text = urldecode($text); 

					exit($text);
				}
				
				exit();

			break;
			
			default: 
				exit();
			break;
		}
		
	break;

	case 'layout-settings': // settings_theme.php
		
		if ( ! is_admin())
		{
			$ajax_msg = ($logged_in) ? 'Access denied!' : 'Please log in.';
			exit(json_encode(array('success' => false, 'msg' => pm_alert_error($ajax_msg))));
		}
		
		switch ($action)
		{
			case 'delete-logo':
				
				if ($config['custom_logo_url'] == '')
				{
					exit(json_encode(array('success' => false, 'msg' => '')));
				}
				$tmp_parts = explode('/', $config['custom_logo_url']);
				$filename = array_pop($tmp_parts);
				
				if (is_writeable( ABSPATH . _UPFOLDER ))
				{
					$filepath = ABSPATH . _UPFOLDER .'/'. $filename;
				}
				else
				{
					$filepath = _THUMBS_DIR_PATH . $filename;
				}
				if (file_exists($filepath))
				{
					unlink($filepath);
				}
				update_config('custom_logo_url','');
				
				echo json_encode(array('success' => true,
										'msg' => pm_alert_success('The logo was deleted.')
									  ));
				exit();
				
			break;
		}

	break;

	case 'settings': // settings.php
		
		if ( ! is_admin())
		{
			$ajax_msg = ($logged_in) ? 'Access denied!' : 'Please log in.';
			
			echo json_encode(array('message' => pm_alert_error($ajax_msg)));
			exit();
		}
		
		switch ($action)
		{
			case 'testmail':
				
				extract($_POST);
				
				if (empty($mail_server) || empty($mail_port) || empty($mail_user) || empty($mail_pass) || empty($contact_email))
				{
					$error = true;
					$ajax_msg = 'Please fill in all the required details.';
				}
				
				if ($error)
				{
					echo json_encode(array('message' => pm_alert_error($ajax_msg)));
					exit();
				}
			
				require_once(ABSPATH .'include/class.phpmailer.php');
			
			
				$mail = new PHPMailer();
				$mail->SetLanguage("en", "include/");
			
				if ($mail_smtp == '1')
				{
					$mail->IsSMTP();
				}
			
				$mail->Subject = 'Test email from '. _SITENAME;
				$mail->Host 	= $mail_server;
				$mail->SMTPAuth = true;
				$mail->Port 	= $mail_port;
				$mail->Username = $mail_user;
				$mail->Password = $mail_pass;
				$mail->From 	= $contact_email;
				$mail->FromName = html_entity_decode(_SITENAME, ENT_QUOTES);
				$mail->CharSet = "UTF-8";
				$mail->AddAddress($contact_email);
				$mail->IsHTML(false);
			
				$mailcontent = "Hey!\n\n
			This is a test mail sent from your site powered by PHP Melody.\n
			If received this email you can rest assured. Your e-mail settings are OK and PHP Melody can send emails.\n Yey!:)";
			
				$mail->Body = $mailcontent;
			
				if ( ! @$mail->Send())
				{
					$ajax_msg = pm_alert_error($mail->ErrorInfo);
				}
				else
				{
					$ajax_msg = pm_alert_success('Test mail delivered successfully to <strong>'. $contact_email .'</strong>. Check your Inbox (and/or the spam box) for the confirmation email. Remember to <strong>Save</strong> your settings if everything is fine.');
				}
			
				echo json_encode(array('message' => $ajax_msg));
			
				exit();
				
			break;
		}
		
	break;
	
	case 'utilities':
		
		switch ($action)
		{
			case 'sanitize-title':
				
				if ($_POST['text'] != '')
				{
					$text = trim($_POST['text']);
					$text = sanitize_title($text);
					exit($text);
				}
				
				exit();
				
			break;
		}

	break;
	
	case 'readlog':
		
		if ( ! is_admin())
		{
			$ajax_msg = ($logged_in) ? 'Access denied!' : 'Please log in.';
			exit(json_encode(array('success' => false, 'msg' => pm_alert_error($ajax_msg))));
		}
			
		switch ($action)
		{
			case 'mark-all-read':
				if ( ! csrfguard_check_referer('_admin_readlog'))
				{
					exit(json_encode(array('success' => false, 'msg' => pm_alert_error('Invalid token or session expired. Please refresh this page and try again.'))));
				}
				
				if (mysql_query("UPDATE pm_log SET msg_type = '0'"))
				{
					update_config('unread_system_messages', 0);
					exit(json_encode(array('success' => true, 'msg' => '')));
				}
				else
				{
					exit(json_encode(array('success' => false, 'msg' => pm_alert_error('An error occurred while performing your request.<br /><strong>MySQL reported:</strong> '. mysql_error()))));
				}
				
			break;
			
			case 'delete-all':
				
				if ( ! csrfguard_check_referer('_admin_readlog'))
				{
					exit(json_encode(array('success' => false, 'msg' => pm_alert_error('Invalid token or session expired. Please refresh this page and try again.'))));
				}
				
				if (mysql_query("TRUNCATE TABLE pm_log"))
				{
					exit(json_encode(array('success' => true, 'msg' => '')));
				}
				else
				{
					exit(json_encode(array('success' => false, 'msg' => pm_alert_error('An error occurred while performing your request.<br /><strong>MySQL reported:</strong> '. mysql_error()))));
				}
						
			break;
		}
		
	break;
	
	case 'searchlog':
		
		if ( ! is_admin())
		{
			$ajax_msg = ($logged_in) ? 'Access denied!' : 'Please log in.';
			exit(json_encode(array('success' => false, 'msg' => pm_alert_error($ajax_msg))));
		}
		
		switch ($action)
		{
			case 'delete-all':
				
				if ( ! csrfguard_check_referer('_admin_searchlog'))
				{
					exit(json_encode(array('success' => false, 'msg' => pm_alert_error('Invalid token or session expired. Please refresh this page and try again.'))));
				}
				
				if (mysql_query("TRUNCATE TABLE pm_searches"))
				{
					exit(json_encode(array('success' => true, 'msg' => '')));
				}
				else
				{
					exit(json_encode(array('success' => false, 'msg' => pm_alert_error('An error occurred while performing your request.<br /><strong>MySQL reported:</strong> '. mysql_error()))));
				}
				
			break;
		}
		
	break;
	
	
	case 'import-subscriptions':

		switch ($action)
		{
			case 'subscribe':
	
				if ( ! is_admin() && ! ( is_moderator() && mod_can('manage_videos')))
				{
					$ajax_msg = 'Sorry, you do not have access to this area.';
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg, 
											'html' => pm_alert_error($ajax_msg))));
				}
				
				$sub_name = trim($_POST['name']);
				$sub_type = $_POST['type'];
				$sub_params_serialized = trim($_POST['params']);
				$sub_params = unserialize($sub_params_serialized);
				
				if (empty($sub_name))
				{
					$sub_name = urldecode($_POST['keyword']) .' - '. date('F j, Y g:i A');
				}

				if (empty($sub_params_serialized))
				{
					$ajax_msg = 'Missing subscription parameters. Please reload the page and try again.';
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg,
											'html' => pm_alert_error($ajax_msg)))); 
				}
				
				if ( ! csrfguard_check_referer('_admin_import_subscriptions'))
				{
					$ajax_msg = 'Invalid token or session expired. Please refresh this page and try again.';
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg,
											'html' => pm_alert_error($ajax_msg)))); 
				}
				
				$nonce = csrfguard_raw('_admin_import_subscriptions');

				if ($sub_type == 'user' || $sub_type == 'user-favorites' || $sub_type == 'user-playlist')
				{
					// "Save this user" is the desired behavior @since v2.3.1
					$sub_params['action'] = 'search';
					$sub_type = 'user';
					$sub_name = $sub_params['username'];

					// Get user profile avatar
					switch ($sub_params['data_source'])
					{
						default:
						case 'youtube':

							if ( ! class_exists('PhpmelodyYoutube'))
							{
								include(ABSPATH . 'admin/src/youtube-sdk/autoload.php');
							}

							$google_client = new Google_Client();
							$google_client->setDeveloperKey($config['youtube_api_key']);

							$youtube_api = new PhpmelodyYouTube($google_client);
							$avatar_url = $youtube_api->pm_get_user_avatar_url($sub_params['username']);
							
							if (is_array($avatar_url) && $avatar_url['error'])
							{
								$ajax_msg = htmlentities($avatar_url['error']['message']);
								exit(json_encode(array(	'success' => false, 
														'_pmnonce' => $nonce['_pmnonce'],
														'_pmnonce_t' => $nonce['_pmnonce_t'],
														'msg' => $ajax_msg,
														'html' =>  pm_alert_error($ajax_msg),
														'sub_id' => $sub_id)));
							}
		
							$sub_params['profile_avatar_url'] = $avatar_url;
							
						break;
						
						
						case 'dailymotion':
							
							include(ABSPATH .'admin/src/dailymotion-sdk/Dailymotion.php');
		
							$dailymotion_api = new PhpmelodyDailymotion();

							$sub_params['profile_avatar_url'] = $dailymotion_api->pm_get_user_avatar_url($sub_params['username']);

						break;
						
						case 'vimeo':
							
							include(ABSPATH .'admin/src/vimeo-sdk/autoload.php');
							
							$vimeo_api = new PhpmelodyVimeo(null, null, $config['vimeo_api_token']);
							
							$sub_params['profile_avatar_url'] = $vimeo_api->pm_get_user_avatar_url($sub_params['username']);
							
						break;
					}
					
					$sub_params_serialized = serialize($sub_params);
				}

				$sql = "INSERT INTO pm_import_subscriptions (sub_name, sub_type, last_query_time, last_query_results, user_id, data) 
							 VALUES ('". secure_sql($sub_name) ."',
							 		'". $sub_type ."',
							 		 0,
									 0,
									 ". $userdata['id'] .",
									 '". secure_sql($sub_params_serialized) ."'
							 		)";

				if ( ! ($result = mysql_query($sql)))
				{
					exit(json_encode(array(	'success' => false, 
											'_pmnonce' => $nonce['_pmnonce'],
											'_pmnonce_t' => $nonce['_pmnonce_t'],
											'msg' => 'MySQL error: '. mysql_error(),
											'html' => pm_alert_error('An error occurred while performing your request.<br /><strong>MySQL reported:</strong> '. mysql_error()))));
				}

				$ajax_msg = 'Subscribed'; 
				exit(json_encode(array(	'success' => true,
										'_pmnonce' => $nonce['_pmnonce'],
										'_pmnonce_t' => $nonce['_pmnonce_t'], 
										'msg' => $ajax_msg, 
										'html' => pm_alert_success($ajax_msg),
										'sub_id' => mysql_insert_id())));
			break;
			
			case 'unsubscribe':
		
				if ( ! is_admin() && ! ( is_moderator() && mod_can('manage_videos')))
				{
					$ajax_msg = 'Sorry, you do not have access to this area.';
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg, 
											'html' => pm_alert_error($ajax_msg))));	
				}
				
				$sub_id = (int) $_POST['sub-id'];
				
				if ( ! $sub_id)
				{
					$ajax_msg = 'Invalid subscription ID provided.'; 
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg,
											'html' => pm_alert_error($ajax_msg))));
				}
				
				if ( ! csrfguard_check_referer('_admin_import_subscriptions'))
				{
					$ajax_msg = 'Invalid token or session expired. Please refresh this page and try again.';
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg,
											'html' => pm_alert_error($ajax_msg)))); 
				}				
				
				$nonce = csrfguard_raw('_admin_import_subscriptions');
				
				if (is_moderator())
				{
					$sql = "SELECT user_id 
							FROM pm_import_subscriptions 
							WHERE sub_id = $sub_id";
				
					if ( ! $result = mysql_query($sql))
					{
						exit(json_encode(array(	'success' => false, 
												'_pmnonce' => $nonce['_pmnonce'],
												'_pmnonce_t' => $nonce['_pmnonce_t'],
												'msg' => 'MySQL error: '. mysql_error(), 
												'html' => pm_alert_error('An error occurred while performing your request.<br /><strong>MySQL reported:</strong> '. mysql_error()))));
					}
					
					$sub = mysql_fetch_assoc($result);
					mysql_free_result($result);
					
					if ((int) $userdata['id'] != (int) $sub['user_id'])
					{
						$ajax_msg = 'You can manage your own subscriptions only.';
						exit(json_encode(array(	'success' => false, 
												'_pmnonce' => $nonce['_pmnonce'],
												'_pmnonce_t' => $nonce['_pmnonce_t'],
												'msg' => $ajax_msg,
												'html' => pm_alert_error($ajax_msg)))); 
					}
				}
				
				$sql = "DELETE FROM pm_import_subscriptions 
						WHERE sub_id = $sub_id";
				if ( ! mysql_query($sql))
				{
					exit(json_encode(array(	'success' => false, 
											'_pmnonce' => $nonce['_pmnonce'],
											'_pmnonce_t' => $nonce['_pmnonce_t'],
											'msg' => 'MySQL error: '. mysql_error(),
											'html' => pm_alert_error('An error occurred while performing your request.<br /><strong>MySQL reported:</strong> '. mysql_error()))));
				}
				
				$ajax_msg = 'Unsubscribed';
				exit(json_encode(array(	'success' => true, 
										'_pmnonce' => $nonce['_pmnonce'],
										'_pmnonce_t' => $nonce['_pmnonce_t'],
										'msg' => $ajax_msg,
										'html' => pm_alert_success($ajax_msg)))); 

			break;
			
			case 'get-results':
					
				$sub_id = (int) $_GET['sub-id'];

				if ( ! $sub_id)
				{
					$ajax_msg = 'Invalid subscription ID provided.'; 
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg,
											'html' => pm_alert_error($ajax_msg))));
				}
				
				if ( ! is_admin() && ! ( is_moderator() && mod_can('manage_videos')))
				{
					$ajax_msg = 'Sorry, you do not have access to this area.';
					exit(json_encode(array(	'success' => false, 
											'msg' => $ajax_msg, 
											'html' => pm_alert_error($ajax_msg),
											'sub_id' => $sub_id)));	
				}
				
				$sql = "SELECT sub_type, last_query_time, last_query_results, data 
						FROM pm_import_subscriptions 
						WHERE sub_id = $sub_id ";
				if ( ! ($result = mysql_query($sql)))
				{
					exit(json_encode(array(	'success' => false, 
											'msg' => 'MySQL error: '. mysql_error(), 
											'html' => pm_alert_error('An error occurred while performing your request.<br /><strong>MySQL reported:</strong> '. mysql_error()),
											'sub_id' => $sub_id)));
				}
				
				$sub = mysql_fetch_assoc($result);
				mysql_free_result($result);
				
				if (import_subscription_cache_fresh($sub['last_query_time']))
				{
					$ajax_msg = ($sub['last_query_results'] == 0) ? 'None' : number_format($sub['last_query_results']);
					exit(json_encode(array(	'success' => true, 
											'msg' => $ajax_msg,
											'html' => $ajax_msg,
											'sub_id' => $sub_id)));
				}
				
				$query_params = unserialize($sub['data']);

				switch ($query_params['data_source'])
				{
					default:
					case 'youtube':
						
						if ( ! class_exists('PhpmelodyYouTube'))
						{
							include(ABSPATH . 'admin/src/youtube-sdk/autoload.php');
						}

						$google_client = new Google_Client();
						$google_client->setDeveloperKey($config['youtube_api_key']);

						$youtube_api = new PhpmelodyYouTube($google_client);

						$query_params['search_orderby'] = ($query_params['search_orderby'] == 'published') ? 'date' : $query_params['search_orderby'];
						$query_params['per_page'] = $query_params['results'];

						switch ($sub['sub_type'])
						{
							default:
							case 'search':

								if ($query_params['action'] == 'search-popular' || $query_params['keyword'] == 'popular') // @since v2.3.1
								{
									$api_data = $youtube_api->pm_most_popular($query_params);
								}
								else
								{
									$query_params['search_time'] = 'this_week';
									$query_params['per_page'] = 0;
									$api_data = $youtube_api->pm_search($query_params['keyword'], $query_params, true);
								}

							break;
							
							// do the same for all @since v2.3.1
							case 'user':
							case 'user-favorites':
							case 'user-playlist':
								
								$playlists = $youtube_api->pm_user_playlists($query_params['username']);
								$api_data = $youtube_api->pm_playlist($youtube_api->pm_uploads_playlist_id, array('per_page' => 50), false);

							break;
						}
				

						
						if ($api_data['error']['message'] != '')
						{
							$ajax_msg = $api_data['error']['message'];
							exit(json_encode(array(	'success' => false, 
													'msg' => $ajax_msg,
													'html' =>  pm_alert_error($ajax_msg),
													'sub_id' => $sub_id)));
						}

						$total_search_results = 0;
						$data = json_decode($data, true);
				
						if ($sub['sub_type'] == 'search')
						{
							$total_search_results = $api_data['meta']['total_results'];
						}
						else //if ($sub['sub_type'] == 'user' || $sub['sub_type'] == 'user-favorites' || $sub['sub_type'] == 'user-playlist')
						{
							$last_7_days = $time_now - (86400 * 7);

							if (count($api_data['results']) > 0)
							foreach ($api_data['results'] as $k => $item)
							{
								if ($item['publish_date_timestamp'] >= $last_7_days)
								{
									$total_search_results++;
								}
							}
						}
						
					break;
					
					case 'dailymotion':
					
							$query_params['search_time'] = ($query_params['search_time'] != 'this_week') ? 'this_week' : '';
							
							include(ABSPATH .'admin/src/dailymotion-sdk/Dailymotion.php');
							$dailymotion_api = new PhpmelodyDailymotion();
							
							try {
								$args = array('page' => 1,
											  'per_page' => (int) $query_params['results']
											);
								$args = array_merge($args, $query_params);
								
								switch ($sub['sub_type'])
								{
									default:
									case 'search':
										
										$api_data = $dailymotion_api->pm_search($query_params['keyword'], $args);
										
									break;
									case 'user':
									
										$api_data = $dailymotion_api->pm_user_videos($query_params['username'], $args);
										
									break;
									
									case 'user-favorites':
										
										$api_data = $dailymotion_api->pm_user_favorites($query_params['username'], $args);
										
									break;
									
									case 'user-playlist':
										
										$api_data = $dailymotion_api->pm_playlist($query_params['playlistid'], $args);
										
									break;
								}
								
								$total_search_results = (int) $api_data['meta']['total_results'];

							} catch(DailymotionApiException $e) {
								
								if ($dailymotion_api->error)
								{
									$api_data['error']['message'] = '<strong>Dailymotion API error '. $dailymotion_api->error->code . ':</strong> '. $dailymotion_api->error->message;
								}
								else
								{
									$api_data['error']['message'] = '<strong>Dailymotion API error:</strong> '. $e->__toString();
								}
								
								exit(json_encode(array(	'success' => false, 
														'msg' => strip_tags($api_data['error']['message']), 
														'html' => pm_alert_error($api_data['error']['message']),
														'sub_id' => $sub_id)));
								
							}
								
					break;
					
					case 'vimeo':
						
						/*
						 * Note: Vimeo API doesn't support time-based search for user's videos.
						 */
							
						$query_params['search_time'] = ($query_params['search_time'] != 'this_week') ? 'this_week' : '';
						
						include(ABSPATH .'admin/src/vimeo-sdk/autoload.php');
						
						$vimeo_api = new PhpmelodyVimeo(null, null, $config['vimeo_api_token']);

						$args = array('page' => 1,
									  'per_page' => (int) $query_params['results']
									);
						$args = array_merge($args, $query_params);
						
						switch ($sub['sub_type'])
						{
							default:
							case 'search':
								
								$api_data = $vimeo_api->pm_search($query_params['keyword'], $args);
								
							break;
							case 'user':

								$api_data = $vimeo_api->pm_user_videos($query_params['username'], $args);
								
							break;
							
							case 'user-favorites':
								
								$api_data = $vimeo_api->pm_user_favorites($query_params['username'], $args);
								
							break;
							
							case 'user-playlist':

								$api_data = $vimeo_api->pm_playlist($query_params['playlistid'], $args);
								
							break;
						}
						
						if (array_key_exists('error', $api_data))
						{
							exit(json_encode(array(	'success' => false, 
													'msg' => $api_data['error']['message'], 
													'html' => pm_alert_error($api_data['error']['message']),
													'sub_id' => $sub_id)));
						}
						
						$total_search_results = (int) $api_data['meta']['total_results'];
						
					break;
				} // end switch ($sub['data_source'])
				
				// cache results
				$sql = 'UPDATE pm_import_subscriptions 
						SET last_query_time = '. $time_now .', 
							last_query_results = '. $total_search_results .' 
						WHERE sub_id = '. $sub_id;
				@mysql_query($sql); 

				$ajax_msg = ($total_search_results == 0) ? 'None' : number_format($total_search_results);
				exit(json_encode(array(	'success' => true, 
										'msg' => $ajax_msg,
										'html' => $ajax_msg,
										'sub_id' => $sub_id)));
			break;
		}
	break;

	default: 
		exit();
	break;
} // end switch ($page)

// always exit ajax requests
exit();