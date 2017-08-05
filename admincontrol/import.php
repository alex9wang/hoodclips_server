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
// | Copyright: (c) 2004-2015 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+

$showm = '2';
/*
$load_uniform = 0;
$load_ibutton = 0;
$load_tinymce = 0;
$load_swfupload = 0;
$load_colorpicker = 0;
$load_prettypop = 0;
$load_chzn_drop = 0;
*/
$load_scrolltofixed = 1;
$load_chzn_drop = 1;
$load_tagsinput = 1;
$load_ibutton = 1;
$load_prettypop = 1;
$load_import_js = 1;
$load_googlesuggests = 1;
$load_lazy_load = 1;


$_page_title = 'Import Videos by Keyword';
include('header.php');

$action = '';
$action = trim($_GET['action']);

$post_n_get = 0;
$post_n_get = count($_POST) + count($_GET);

@set_time_limit(120);

$sources = a_fetch_video_sources();
$data_source = 'youtube';

if (in_array($_COOKIE['aa_import_from'], array('youtube', 'dailymotion', 'vimeo')))
{
	$data_source = $_COOKIE['aa_import_from'];
}

if ($_GET['data_source'] != '' || $_POST['data_source'] != '')
{
	$data_source = ($_GET['data_source'] != '') ? $_GET['data_source'] : $_POST['data_source'];
}

$search_categories_dailymotion = array( 'all' => 'All',
										'music' => 'Music',
										'fun' => 'Comedy & Entertainment',
										'shortfilms' => 'Movies',
										'news' => 'News',
										'sport' => 'Sports',
										'auto' => 'Auto-Moto',
										'animals' => 'Animals',
										'people' => 'Celeb',
										'webcam' => 'Community & Blogs',
										'creation' => 'Creative',
										'school' => 'Education',
										'videogames' => 'Gaming',
										'lifestyle' => 'Lifestyle & How-to',
										'tech' => 'Tech',
										'travel' => 'Travel',
										'tv' => 'TV'
								);
$search_categories_youtube = array( 'all' => 'All',
									'32' => 'Action &amp; Adventure',
									'31' => 'Anime &amp; Animation',
									'2'  => 'Autos &amp; Vehicles',
									'33' => 'Classics',
									'23' => 'Comedy',
									'35' => 'Documentary',
									'36' => 'Drama',
									'27' => 'Education',
									'24' => 'Entertainment',
									'37' => 'Family',
									'1'  => 'Film &amp; Animation',
									'38' => 'Foreign',
									'20' => 'Gaming',
									'39' => 'Horror',
									'26' => 'Howto &amp; Style',
									'30' => 'Movies',
									'10' => 'Music',
									'25' => 'News &amp; Politics',
									'29' => 'Nonprofits &amp; Activism',
									'22' => 'People &amp; Blogs',
									'15' => 'Pets &amp; Animals',
									'40' => 'Sci-Fi &amp; Fantasy',
									'28' => 'Science &amp; Technology',
									'18' => 'Short Movies',
									'42' => 'Shorts',
									'43' => 'Shows',
									'17' => 'Sports',
									'41' => 'Thriller',
									'44' => 'Trailers',
									'19' => 'Travel &amp; Events',
									'21' => 'Videoblogging',
							);
if ($data_source == 'dailymotion')
{
	$search_categories = $search_categories_dailymotion;
}
else
{
	$search_categories = $search_categories_youtube;
}

$search_languages = array(
						  'all' => 'All',  
						  'af' => 'Afrikaans',
						  'sq' => 'Albanian',
						  'ar' => 'Arabic',
						  'hy' => 'Armenian',
						  'az' => 'Azerbaijani',
						  'be' => 'Belarusian',
						  'bs' => 'Bosnian',
						  'bg' => 'Bulgarian',
						  'ca' => 'Catalan; Valencian',
						  'cs' => 'Czech',
						  'zh-Hans' => 'Chinese (simplified)',
						  'zh-Hant' => 'Chinese (traditional)',
						  'cs' => 'Czech',
						  'da' => 'Danish',
						  'de' => 'German',
						  'nl' => 'Dutch',
						  'el' => 'Greek',
						  'en' => 'English',
						  'et' => 'Estonian',
						  'fi' => 'Finnish',
						  'fr' => 'French',
						  'ka' => 'Georgian',
						  'de' => 'German',
						  'gd' => 'Gaelic',
						  'ga' => 'Irish',
						  'ht' => 'Haitian',
						  'he' => 'Hebrew',
						  'hi' => 'Hindi',
						  'hr' => 'Croatian',
						  'hu' => 'Hungarian',
						  'is' => 'Icelandic',
						  'id' => 'Indonesian',
						  'it' => 'Italian',
						  'ja' => 'Japanese',
						  'kk' => 'Kazakh',
						  'ko' => 'Korean',
						  'lt' => 'Lithuanian',
						  'no' => 'Norwegian',
						  'pa' => 'Panjabi',
						  'pl' => 'Polish',
						  'pt' => 'Portuguese',
						  'ro' => 'Romanian',
						  'ru' => 'Russian',
						  'sk' => 'Slovak',
						  'sl' => 'Slovenian',
						  'es' => 'Spanish',
						  'sr' => 'Serbian',
						  'sv' => 'Swedish',
						  'ty' => 'Tahitian',
						  'ta' => 'Tamil',
						  'th' => 'Thai',
						  'tr' => 'Turkish',
						  'uk' => 'Ukrainian',
						  'vi' => 'Vietnamese',
						  'cy' => 'Welsh',
						);
$search_regions = array(
						'all' => 'All',
						'DZ' => 'Algeria',
						'AR' => 'Argentina',
						'AU' => 'Australia',
						'AT' => 'Austria',
						'BH' => 'Bahrain',
						'BE' => 'Belgium',
						'BA' => 'Bosnia and Herzegovina',
						'BR' => 'Brazil',
						'BG' => 'Bulgaria',
						'CA' => 'Canada',
						'CL' => 'Chile',
						'CO' => 'Colombia',
						'HR' => 'Croatia',
						'CZ' => 'Czech Republic',
						'DK' => 'Denmark',
						'EG' => 'Egypt',
						'EE' => 'Estonia',
						'FI' => 'Finland',
						'FR' => 'France',
						'DE' => 'Germany',
						'GH' => 'Ghana',
						'GB' => 'Great Britain',
						'GR' => 'Greece',
						'HK' => 'Hong Kong',
						'HU' => 'Hungary',
						'IN' => 'India',
						'ID' => 'Indonesia',
						'IE' => 'Ireland',
						'IL' => 'Israel',
						'IT' => 'Italy',
						'JP' => 'Japan',
						'JO' => 'Jordan',
						'KE' => 'Kenya',
						'KW' => 'Kuwait',
						'LV' => 'Latvia',
						'LB' => 'Lebanon',
						'MK' => 'Macedonia',
						'MY' => 'Malaysia',
						'MX' => 'Mexico',
						'ME' => 'Montenegro',
						'MA' => 'Morocco',
						'NL' => 'Netherlands',
						'NZ' => 'New Zealand',
						'NG' => 'Nigeria',
						'NO' => 'Norway',
						'OM' => 'Oman',
						'PE' => 'Peru',
						'PH' => 'Philippines',
						'PL' => 'Poland',
						'PT' => 'Portugal',
						'QA' => 'Qatar',
						'RO' => 'Romania',
						'RU' => 'Russia',
						'SA' => 'Saudi Arabia',
						'SN' => 'Senegal',
						'RS' => 'Serbia',
						'SG' => 'Singapore',
						'SK' => 'Slovakia',
						'ZA' => 'South Africa',
						'KR' => 'South Korea',
						'ES' => 'Spain',
						'SE' => 'Sweden',
						'CH' => 'Switzerland',
						'TW' => 'Taiwan',
						'TH' => 'Thailand',
						'TN' => 'Tunisia',
						'TR' => 'Turkey',
						'UG' => 'Uganda',
						'UA' => 'Ukraine',
						'AE' => 'United Arab Emirates',
						'GB' => 'United Kingdom',
						'US' => 'United States',
						'YE' => 'Yemen'
					);
?>
<div id="adminPrimary">
    <div class="row-fluid" id="help-assist">
        <div class="span12">
        <div class="tabbable tabs-left">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#help-overview" data-toggle="tab">Overview</a></li>
            <li><a href="#help-onthispage" data-toggle="tab">On this page</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="help-overview">
			<p>This page allows you to import videos from a massive database of videos from the top three video sites: YouTube.com, DailyMotion.com and Vimeo.com. PHP Melody will also retrieve all the extra info from each video so you don't have to.</p>
			<p>Start importing videos simply by entering some keywords. You can also fine tune your seaches by clicking the &quot;options&quot; button.
Note: For performance considerations, please work with 50 results per page.</p>
            </div>
            <div class="tab-pane fade" id="help-onthispage">
			<p>Each result is organized in a stack containing thumbnails, the video title, category, description and tags. Data such as video duration, original URL and more will be imported automatically.</p>
            <p>Youtube provides three thumbnails for each video and PHP MELODY allows you to choose the best one for your site. By default, the chosen thumbnail is the largest one, but changing it will be represented by a blue border.
            You can also do a quality control by using the video preview. Just click the play button overlaying the large thumbnail image and the video will be loaded in a window.</p>
            <p>By default none of the results is selected for import. Clicking on the top right switch from each stack will select it for importing. This is indicated by a green highlight of the stack. If you're satisfied with all the results and wish to import them all at once, you can do that as well by selecting the &quot;SELECT ALL VIDEOS” checkbox (bottom left).<br />
            Enjoy!</p>
            </div>
          </div>
        </div> <!-- /tabbable -->
        </div><!-- .span12 -->
    </div><!-- /help-assist -->
    <div class="content">
	<a href="#" id="show-help-assist">Help</a>

	<nav id="import-nav" class="tabbable" role="navigation">
	<h2 class="h2-import pull-left">Import Videos by Keyword</h2>
		<ul class="nav nav-tabs pull-right">
			<li class="active"><a href="import.php" class="tab-pane">Import by Keyword</a></li>
			<li><a href="import_user.php" class="tab-pane">Import from User</a></li>
		</ul>
	</nav>
	<br /><br />
	<?php
	if ( empty($config['youtube_api_key']) )
	{
	$info_msg .= pm_alert_warning('<strong>Before importing your first YouTube video...</strong> 
									<br /><br />
									Youtube API requires a public <em>API Key</em> to retrieve data. <strong><a href="https://www.youtube.com/watch?v=9fNP_fJsxX0" target="_blank">Watch the video</a></strong> or follow these steps to get your API key:
									<br /><br />
									<ol>
									<li><a href="https://developers.google.com/youtube/registering_an_application" target="_blank" title="Youtube Developer API">Create</a> a new key in your <a href="https://console.developers.google.com/" target="_blank" title="Google Developers Console">Google Developers Console</a>.</li>
									<li>Enter the generated key in the <a href="settings.php?highlight=youtube_api_key&view=video">Settings</a> page (under "<em>Youtube Public API Key</em>" ).</li>
									</ol><br />');
	}
	?>
	<div class="clearfix"></div>

	<?php echo $info_msg; ?>

<?php 

load_categories();
if (count($_video_categories) == 0) 
{
	echo pm_alert_error('Please <a href="edit_category.php?do=add&type=video">create a category</a> first.');
}
?>
<form name="search_yt_videos" action="import.php?action=search" method="post" class="form-inline">
<div class="input-append import-group">
<input name="keyword" type="text" value="<?php echo ($_POST['keyword'] != '') ? $_POST['keyword'] : str_replace("+", " ", $_GET['keyword']); ?>" size="35" placeholder="Type keywords to search for..." class="span5 gautocomplete" />
<select name="data_source">
	<option value="youtube" <?php echo ($data_source == 'youtube' || empty($data_source)) ? 'selected="selected"' : ''; ?>>Youtube</option>
	<option value="dailymotion" <?php echo ($data_source == 'dailymotion') ? 'selected="selected"' : ''; ?>>Dailymotion</option>
	<option value="vimeo" <?php echo ($data_source == 'vimeo') ? 'selected="selected"' : ''; ?>>Vimeo</option>
</select>
<button type="button" class="btn" data-toggle="button" id="import-options">options</button>
<button type="submit" name="submit" class="btn" id="searchVideos" data-loading-text="Searching...">Search</button>
</div>
<span class="searchLoader"><img src="img/ico-loading.gif" width="16" height="16" /></span>


<?php if (($action == 'search' && ($_POST['keyword'] != '' || $_GET['keyword'] != ''))) : ?>
<div class="opac7 list-choice pull-right">
<button class="btn btn-normal btn-small" data-toggle="button" id="list"><i class="icon-th"></i> </button>
<button class="btn btn-normal btn-small" data-toggle="button" id="stacks"><i class="icon-th-list"></i> </button>
</div>

<div class="pull-right">
<?php if (empty($_GET['sub_id'])) : ?>
<a href="#unsubscribe" data-subscription-id="0" class="btn btn-success btn-small hide" id="btn-unsubscribe" title="Unsubscribe"><i class="icon-ok icon-white"></i> Subscribed</a>
	<a href="#modal_subscribe" data-toggle="modal" class="btn btn-small btn-info" rel="tooltip" title="Save this search for quick access" id="btn-subscribe"><i class="icon-star icon-white"></i> Save this search</a>
<?php else : ?>
<a href="#modal_subscribe" data-toggle="modal" class="btn btn-info btn-small hide" rel="tooltip" title="Save this search for quick access" id="btn-subscribe"><i class="icon-star icon-white"></i> Save this search</a>
<!--<a href="#unsubscribe" data-subscription-id="<?php echo (int) $_GET['sub_id'];?>" class="btn" id="btn-unsubscribe" title="Unsubscribe">Unsubscribe</a>-->
<a href="#unsubscribe" data-subscription-id="<?php echo (int) $_GET['sub_id'];?>" class="btn btn-success btn-small" id="btn-unsubscribe" title="Unsubscribe"><i class="icon-ok icon-white"></i> Subscribed</a>
<?php endif; ?>
<?php echo csrfguard_form('_admin_import_subscriptions'); ?>
</div>
<?php endif; ?>

<div class="clearfix"></div>

<div id="import-opt-content">
<div class="row-fluid">
	<div class="span3">
	<h4>Autocomplete Results</h4>

	<!--
	<input type="checkbox" name="autofilling" id="autofilling" value="1" <?php if($_POST['autofilling'] == "1" || $_GET['autofilling'] == "1" || $post_n_get == 0) echo 'checked="checked"'; ?> />
	<label for="autofilling">Auto-populate the video title</label>-->
	<label>Autocomplete results with this category</label>
	<?php 
	$selected_categories = array();
	if (is_array($_POST['use_this_category']))
	{
	    $selected_categories = $_POST['use_this_category'];
	}
	else if (is_string($_POST['use_this_category']) && $_POST['use_this_category'] != '') 
	{
	    $selected_categories = (array) explode(',', $_POST['use_this_category']);
	}
	if ($_GET['utc'] != '')
	{
	    $selected_categories = (array) explode(',', $_GET['utc']);
	}

	$categories_dropdown_options = array(
	                                'attr_name' => 'use_this_category[]',
	                                'attr_id' => 'main_select_category',
	                                'select_all_option' => false,
	                                'spacer' => '&mdash;',
	                                'selected' => $selected_categories,
	                                'other_attr' => 'multiple="multiple" size="3" data-placeholder="Import videos into..."',
	                                'option_attr_id' => 'check_ignore'
	                                );
	echo categories_dropdown($categories_dropdown_options);
	?>
	<br>
	<label for="autodata">
	<input type="checkbox" name="autodata" id="autodata" value="1" <?php if($_POST['autodata'] == "1" || $_GET['autodata'] == "1" || $post_n_get == 0) echo 'checked="checked"'; ?> />
	Autocomplete available data from API</label> <i class="icon-info-sign" rel="tooltip" title="Retrieve and include the video description, tags or any other information the API may provide."></i>
	</div>
	<div class="span9">
		<h4>Filter Videos</h4>
		<div class="row-fluid">
		<div class="span3" id="div_search_category">
			<label>Category</label><br>
			<select name="search_category" class="span12" <?php echo ($data_source == 'vimeo') ? 'disabled="disabled"' : ''; ?>>
				<?php foreach ($search_categories as $value => $label) : ?>
				<option value="<?php echo $value; ?>" <?php echo ($_GET['search_category'] == $value || $_POST['search_category'] == $value) ? 'selected="selected"' : '';?>><?php echo $label;?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="span3" id="div_search_duration">
			<label>Duration</label><br>
			<select name="search_duration" class="span12" <?php echo ($data_source == 'vimeo') ? 'disabled="disabled"' : ''; ?>>
				<option value="all">All</option>
				<option value="short" <?php echo ($_GET['search_duration'] == 'short' || $_POST['search_duration'] == 'short') ? 'selected="selected"' : ''; ?>>Short (~4 minutes)</option>
				<option value="medium" <?php echo ($_GET['search_duration'] == 'medium' || $_POST['search_duration'] == 'medium') ? 'selected="selected"' : ''; ?>>Medium (4-20 minutes)</option>
				<option value="long" <?php echo ($_GET['search_duration'] == 'long' || $_POST['search_duration'] == 'long') ? 'selected="selected"' : ''; ?>>Long (20+ minutes)</option>
			</select>
		</div>
		<div class="span3" id="div_search_time">
			<label>Upload date</label><br>
			<select name="search_time" class="span12" <?php echo ($data_source == 'vimeo') ? 'disabled="disabled"' : ''; ?>>
				<option value="all_time">All time</option>
				<option value="today" <?php echo ($_GET['search_time'] == 'today' || $_POST['search_time'] == 'today') ? 'selected="selected"' : ''; ?>>Today</option>
				<option value="this_week" <?php echo ($_GET['search_time'] == 'this_week' || $_POST['search_time'] == 'this_week') ? 'selected="selected"' : ''; ?>>This week</option>
				<option value="this_month" <?php echo ($_GET['search_time'] == 'this_month' || $_POST['search_time'] == 'this_month') ? 'selected="selected"' : ''; ?>>This month</option>
			</select>
		</div>
		<div class="span3" id="div_search_orderby">
			<label>Order by</label><br>
			<select name="search_orderby" class="span12">
				<option value="relevance" <?php echo ($_GET['search_orderby'] == 'relevance' || $_POST['search_orderby'] == 'relevance') ? 'selected="selected"' : '';?>>Relevance</option>
				<option value="date" <?php echo ($_GET['search_orderby'] == 'date' || $_POST['search_orderby'] == 'date') ? 'selected="selected"' : '';?>>Upload date</option>
				<option value="viewCount" <?php echo ($_GET['search_orderby'] == 'viewCount' || $_POST['search_orderby'] == 'viewCount') ? 'selected="selected"' : '';?>>View count</option>
				<option value="rating" <?php echo ($_GET['search_orderby'] == 'rating' || $_POST['search_orderby'] == 'rating') ? 'selected="selected"' : '';?>>Rating</option>
			</select> 
		</div>
		</div>
		<hr />
		<div class="row-fluid">

		<div class="span3" id="div_results">
			<label>Results per page <i class="icon-info-sign" rel="tooltip" title="For optimum performance, a maximum of 50 videos per page is recommended."></i></label><br>
			<select name="results" class="span11">
				<option value="10" <?php if($_POST['results'] == 10 || $_GET['results'] == 10) echo 'selected="selected"'; ?>>10 results</option>
				<option value="20" <?php if($_POST['results'] == 20 || $_GET['results'] == 20) echo 'selected="selected"'; ?>>20 results</option>
				<option value="30" <?php if($_POST['results'] == 30 || $_GET['results'] == 30|| $post_n_get == 0) echo 'selected="selected"'; ?>>30 results</option>
				<option value="40" <?php if($_POST['results'] == 40 || $_GET['results'] == 40) echo 'selected="selected"'; ?>>40 results</option>
				<option value="50" <?php if($_POST['results'] == 50 || $_GET['results'] == 50) echo 'selected="selected"'; ?>>50 results (recommended)</option>
				<option value="100" <?php if($_POST['results'] == 100 || $_GET['results'] == 100) echo 'selected="selected"'; ?>>100 results</option>
			</select>
		</div>

		<div class="span3" id="div_search_language">
			<label>Language</label><br>
			<select name="search_language" class="span12" <?php echo ($data_source == 'vimeo') ? 'disabled="disabled"' : ''; ?>>
				<?php foreach ($search_languages as $lang_code => $label): ?>
				<option value="<?php echo $lang_code; ?>" <?php echo ($_GET['search_language'] == $lang_code || $_POST['search_language'] == $lang_code ) ? 'selected="selected"' : ''; ?>><?php echo $label; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="span3" id="div_search_license">
			<label>License</label><br>
			<select name="search_license" class="span12" <?php echo ($data_source != 'youtube') ? 'disabled="disabled"' : ''; ?>>
				<option value="all">All</option>
				<option value="cc" <?php echo ($_GET['search_license'] == 'cc' || $_POST['search_license'] == 'cc') ? 'selected="selected"' : '';?>>Creative Commons</option>
				<option value="youtube" <?php echo ($_GET['search_license'] == 'youtube' || $_POST['search_license'] == 'youtube') ? 'selected="selected"' : '';?>>Youtube</option>
			</select>
		</div>
		<div class="span3" id="div_features">
			<label>Features</label><br>
			<label class="checkbox">
				<input type="checkbox" name="search_hd" value="true" <?php echo ($_GET['search_hd'] == 'true' || $_POST['search_hd'] == 'true') ? 'checked="checked"' : ''; ?> <?php echo ($data_source == 'vimeo') ? 'disabled="disabled"' : ''; ?> /> HD
			</label>
			<label class="checkbox">
				<input type="checkbox" name="search_3d" value="true" <?php echo ($_GET['search_3d'] == 'true' || $_POST['search_3d'] == 'true') ? 'checked="checked"' : ''; ?> <?php echo ($data_source == 'vimeo') ? 'disabled="disabled"' : ''; ?> /> 3D
			</label>
		</div>

		</div>
	</div>
</div> 
</div>
<hr />
</form>
 
<?php
if (empty($_GET['action'])) 
{
	$subscriptions = get_import_subscriptions();
	if ($subscriptions['total_results'] > 0)
	{
		$subscriptions_count = $subscriptions['total_results'];
		$subscriptions = $subscriptions['data'];
		
		foreach ($subscriptions as $k => $sub)
		{
			$subscriptions[$k] = unserialize($sub['data']);
			$subscriptions[$k]['sub_id'] = $sub['sub_id'];
			$subscriptions[$k]['sub_name'] = $sub['sub_name'];
			$subscriptions[$k]['last_query_time'] = (int) $sub['last_query_time'];
			$subscriptions[$k]['last_query_results'] = (int) $sub['last_query_results'];
			$subscriptions[$k]['sub_user_id'] = $sub['user_id'];
			$subscriptions[$k]['sub_username'] = $sub['username'];
			$subscriptions[$k]['search_time'] = 'this_week';
			$subscriptions[$k]['page'] = 1;
		}
	?>
	<h3><strong>Subscriptions</strong></h3>
	<div class="subscriptions-response-placeholder hide"></div>
	<table class="table table-striped table-bordered pm-tables">
		<thead>
			<th width="5"></th>
			<th style="text-align: left;padding:0 8px">Search</th>
			<th width="110">Saved by</th>
			<th width="220">Videos added this week</th>
			<th width="110"></th>
		</thead>
		<tbody>
			<?php foreach ($subscriptions as $k => $sub) : ?>
			<tr id="row-subscription-<?php echo $sub['sub_id']; ?>">
				<td>
					<div class="sprite <?php echo ( ! empty($sub['data_source'])) ? strtolower($sub['data_source']) : 'youtube'; ?>" rel="tooltip" title="Source: <?php echo ( ! empty($sub['data_source'])) ? ucfirst($sub['data_source']) : 'youtube'; ?>"></div>
				</td>
				<td>
					<?php
					$url_params = $sub;
					unset($url_params['sub_name'], $url_params['last_query_time'], $url_params['last_query_results'], $url_params['sub_user_id'], $url_params['sub_username']);
					?>
					<strong><a href="import.php?<?php echo http_build_query($url_params);?>"><?php echo $sub['sub_name'];?></a></strong>
				</td>
				<td align="center" style="text-align:center">
					<a href="<?php echo _URL .'/profile.php?u='. $sub['sub_username'];?>" target="_blank"><?php echo $sub['sub_username'];?></a>
				</td>
				<td align="center" style="text-align:center">
					<?php if (import_subscription_cache_fresh($sub['last_query_time'])) : ?>
					<?php echo ($sub['last_query_results'] > 0) ? number_format($sub['last_query_results']) : '0'; ?>
					<?php else : ?>
					<span class="row-subscription-get-results" data-subscription-id="<?php echo $sub['sub_id']; ?>">
						<img src="img/ico-loading.gif" width="16" height="16" />
					</span>
					<?php endif; ?>
				</td>
				<td align="center">
					<a href="#" data-subscription-id="<?php echo $sub['sub_id'];?>" class="link-search-unsubscribe btn btn-small btn-danger pull-right" title="Unsubscribe">Unsubscribe</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo csrfguard_form('_admin_import_subscriptions'); ?>
	<?php 
	}  // end if ($subscriptions['total_results'] > 0)
	?>
<div id="stack-controls" style="display: none;"></div>
<?php
}
/*
 *  Import
 */  
if($_POST['submit'] == 'Import' && ($action == 'import'))
{
	$exec_start = get_micro_time();

	$source_id = $sources[ $data_source ]['source_id'];

	$total_videos = count($_POST['video_ids']);
	$imported_total = 0;
	
	define('PHPMELODY', true);
	switch ($data_source)
	{
		case 'youtube':
			require_once( "./src/youtube.php");
		break;
		
		case 'dailymotion':
			require_once( "./src/dailymotion.php");
		break;
		
		case 'vimeo':
			require_once( "./src/vimeo.php");
		break;
	}
	
	$duplicate = 0;

	if($total_videos > 0)
	foreach($_POST['video_ids'] as $i => $v)
	{	
		$video_details = array( 'uniq_id' => '',	
								'video_title' => '',	
								'description' => '',	
								'yt_id' => '',	
								'yt_length' => '',	
								'category' => '',	
								'submitted' => '',	
								'source_id' => '',	
								'language' => '',	
								'age_verification' => '',
								'url_flv' => '',	
								'yt_thumb' => '',
								'mp4' => '',	
								'direct' => '',	
								'tags' => '', 
								'featured' => 0,
								'restricted' => 0,
								'allow_comments' => 1 
							);
		
		$video_details['video_title'] = trim( str_replace('&quot;', '"', $_POST['video_title'][$i]) );
		$video_details['description'] = trim( $_POST['description'][$i] );
		$video_details['tags'] 		  = trim( $_POST['tags'][$i] );
		$video_details['category'] 	  = is_array($_POST['category'][$i]) ? implode(',', $_POST['category'][$i]) : '';
		$video_details['direct'] 	  = trim( $_POST['video_ids'][$i] );
		$video_details['source_id']	  = $source_id;
		$video_details['language']	  = 1;
		$video_details['submitted']	  = $userdata['username'];
		$video_details['yt_id']		  = $_POST['video_ids'][$i];
		$video_details['yt_length']	  = $_POST['duration'][$i];
		$video_details['tags']		  = $_POST['tags'][$i];
		$video_details['yt_thumb']	  = $_POST['thumb_url'][$i];
		$video_details['url_flv']	  = $_POST['direct'][$i];
		$video_details['direct']	  = $_POST['direct'][$i];
		$video_details['mp4']		  = '';
		$video_details['description'] = nl2br($video_details['description']);
		
		//	generate unique id;
		$found = 0;
		$uniq_id = '';

		do
		{
			$found = 0;
			if(function_exists('microtime'))
				$str = microtime();
			else
				$str = time();
			$str = md5($str);
			$uniq_id = substr($str, 0, 9);
			if(count_entries('pm_videos', 'uniq_id', $uniq_id) > 0)
				$found = 1;
		} while($found === 1);

		$video_details['uniq_id'] = $uniq_id;

		//	download thumbnail
		if ($video_details['yt_thumb'] != '')
		{
			$img = download_thumb($video_details['yt_thumb'], _THUMBS_DIR_PATH, $uniq_id);
		}
		
		if ($_POST['featured'][$i] == "1")
		{
			$video_details['featured'] = 1;
		}
		
		$modframework->trigger_hook('admin_import_insertvideo_pre');
		$new_video = insert_new_video($video_details, $new_video_id);
		if ($new_video !== true)
		{
			echo pm_alert_error('An error occurred while inserting this video in your database.<br /><strong>MySQL reported:</strong> '. $new_video[0]);
		}
		else
		{
			$modframework->trigger_hook('admin_import_insertvideo_post');
			//	tags?
			if($video_details['tags'] != '')
			{
				$tags = explode(",", $video_details['tags']);
				foreach($tags as $k => $tag)
				{
					$tags[$k] = stripslashes(trim($tag));
				}
				//	remove duplicates and 'empty' tags
				$temp = array();
				for($i = 0; $i < count($tags); $i++)
				{
					if($tags[$i] != '')
						if($i <= (count($tags)-1))
						{
							$found = 0;
							for($j = $i + 1; $j < count($tags); $j++)
							{
								if(strcmp($tags[$i], $tags[$j]) == 0)
									$found++;
							}
							if($found == 0)
								$temp[] = $tags[$i];
						}
				}
				$tags = $temp;
				//	insert tags
				if(count($tags) > 0)
					insert_tags($video_details['uniq_id'], $tags);
			}
			$imported_total++;
		}

		
		unset($video_details, $temp);

	}	//	end for()
	
	$exec_end = get_micro_time();
	
	if ($imported_total == $total_videos)
	{
		$info_msg = 'The selected videos were successfully imported.';
	}
	else
	{
		$info_msg = 'Imported <strong>'.$imported_total.'</strong> out of <strong>'.$total_videos.'</strong> selected videos.';
	}

	if ($imported_total < $total_videos)
	{
		$info_msg .= '<br />Duplicated videos and videos without a title were skipped.';
	}
	
	$info_msg .= '<br />Import took <strong>' . get_exec_time($exec_end, $exec_start) . '</strong> seconds.';

	if($_POST['yt_username'] != '') 
	{
		$params = '';
		$params .= 'action=search&username='. $_POST['yt_username'];
		$params .= '&results=' .$_POST['results'];
		$params .= '&autofilling=' .$_POST['autofilling'];
		$params .= '&autodata='. $_POST['autodata'];
		$params .= (is_array($_POST['use_this_category'])) ? '&oc=1&utc='. implode(',', $_POST['use_this_category']) : '&oc=0&utc=';
		$params .= '&data_source='. $_POST['data_source'];
		$info_msg .= '</div><hr /><a href="import_user.php?'. $params .'" class="btn">&larr; Return to <em>'. $_POST['yt_username'] .'\'s</em> videos</a>';
	}
	echo pm_alert_success($info_msg);
	echo '<div id="stack-controls" style="display: none;"></div>';
}

/*
 *  Search
 */ 
if (($action == 'search' && ($_POST['keyword'] != '' || $_GET['keyword'] != '')))
{
	
	?>

	<div class="subscriptions-response-placeholder hide"></div>
	<div class="clearfix"></div>
	<form name="import_videos" action="import.php?action=import" method="post">
    <?php $modframework->trigger_hook('admin_import_importopts'); ?>
    <div id="vs-grid">
	<?php
	
	$page = (int) $_GET['page'];

	if(empty($page))
		$page = 1;
	
	$autodata = 0;
	$autofilling = 0;
	$overwrite_category = array();
	
	if(isset($_POST['submit']) && !empty($_POST['keyword']))
	{
		$v				= trim($_POST['keyword']);
		$import_results	= $_POST['results'];
		
		if($_POST['autofilling'] == '1') 
		{
			$autofill = $_POST['keyword'];			
			$autofilling = 1;
		}
		if($_POST['autodata'] == '1')
		{
			$autodata = 1;
		}
		if (is_array($_POST['use_this_category']))
		{
			$overwrite_category = $_POST['use_this_category'];
		}
	}
	elseif($_GET['keyword'] != '')
	{
		$v				= urldecode($_GET['keyword']);
		
		if($_GET['results'] != '')
		{
			$import_results	= (int) $_GET['results'];
		}
		else
		{
			$import_results = 20;
		}
		
		if($_GET['autofilling'] == 1)
		{
			$autofill = urldecode($_GET['keyword']);
			$autofilling = 1;
		}
		if($_GET['autodata'] == 1)
		{
			$autodata = 1;
		}
		if($_GET['oc'] == 1)	//	oc = overwrite_category
		{
			$overwrite_category = (array) explode(',', $_GET['utc']);	//	utc = use_this_cateogory
		}
	}
	
	$search_in_category = ($_GET['search_category'] != '') ? trim($_GET['search_category']) : $_POST['search_category'];
	$search_orderby = ($_GET['search_orderby'] != '') ? $_GET['search_orderby'] : $_POST['search_orderby'];
	$search_duration = ($_GET['search_duration'] != '') ? $_GET['search_duration'] : $_POST['search_duration'];
	$search_language = ($_GET['search_language'] != '') ? $_GET['search_language'] : $_POST['search_language'];
	$search_time = ($_GET['search_time'] != '') ? $_GET['search_time'] : $_POST['search_time'];
	$search_license = ($_GET['search_license'] != '') ? $_GET['search_license'] : $_POST['search_license'];
	$search_hd = ($_GET['search_hd'] == 'true' || $_POST['search_hd'] == 'true') ? true : false;
	$search_3d = ($_GET['search_3d'] == 'true' || $_POST['search_3d'] == 'true') ? true : false;
	$search_region = ($_GET['search_region'] != '') ? $_GET['search_region'] : $_POST['search_region'];
	

	$start_from = ($data_source == 'youtube') ? 0 : ($page * $import_results) - $import_results + 1;

	$search_term = str_replace("-", " ", $v);	
	$search_term = urlencode($search_term);

	$api_data = array();
	switch ($data_source)
	{
		case 'youtube':

			if ( ! empty($config['youtube_api_key']))
			{
				include(ABSPATH . 'admin/src/youtube-sdk/autoload.php');

				$google_client = new Google_Client();
				$google_client->setDeveloperKey($config['youtube_api_key']);

				$youtube_api = new PhpmelodyYouTube($google_client);

				
				$args = array('per_page' => (int) $import_results);
				$args = array_merge($args, $_POST, $_GET);

				if ($search_term == 'popular')
				{
					$api_data = $youtube_api->pm_most_popular($args);
				}
				else
				{
					$api_data = $youtube_api->pm_search($search_term, $args);
				}
			}
			else
			{
				$api_data = array('error' => array('message' =>
					'Youtube API requires a public <em>API Key</em> to retrieve data. This is how you can get an API key:
					<br /><br />
					<ol>
						<li><a href="https://developers.google.com/youtube/registering_an_application" target="_blank" title="Youtube Developer API">Create</a> a new key in your <a href="https://console.developers.google.com/" target="_blank" title="Google Developers Console">Google Developers Console</a>.</li>
						<li>Enter the generated key in the <a href="settings.php?highlight=youtube_api_key&view=video">Settings</a> page (under "<em>Youtube Public API Key</em>" ).</li>
					</ol>'));
			}

		break; 
		
		case 'dailymotion':
			
			include(ABSPATH .'admin/src/dailymotion-sdk/Dailymotion.php');
		
			$dailymotion_api = new PhpmelodyDailymotion();

			try {
				$args = array('page' => $page,
							  'per_page' => (int) $import_results,
							);
				$args = array_merge($args, $_POST, $_GET);
				
				$api_data = $dailymotion_api->pm_search($search_term, $args);
  
			} catch(DailymotionApiException $e) {

				if ($dailymotion_api->error)
				{
					$api_data['error']['message'] = '<strong>Dailymotion API error '. $dailymotion_api->error->code . ':</strong> '. $dailymotion_api->error->message;
				}
				else
				{
					$api_data['error']['message'] = '<strong>Dailymotion API error:</strong> '. $e->__toString();
				}
			}

		break;
		
		case 'vimeo':

			if ( ! empty($config['vimeo_api_token']))
			{
				include(ABSPATH .'admin/src/vimeo-sdk/autoload.php');
				
				$vimeo_api = new PhpmelodyVimeo(null, null, $config['vimeo_api_token']);
				
				$args = array('page' => $page,
							  'per_page' => (int) $import_results,
							);
				$args = array_merge($args, $_POST, $_GET);
				
				$api_data = $vimeo_api->pm_search($search_term, $args);

			}
			else
			{
				$api_data = array('error' => array('message' =>
					'Vimeo API requires a <em>Access Token</em> to retrieve data. This is how you can get an API key:
					<br /><br />
					<ol>
						<li><a href="https://developer.vimeo.com/apps" target="_blank" title="Vimeo Developer API">Create</a> your Vimeo developer account to generate your token.</li>
						<li>Enter the generated token in the <a href="settings.php?highlight=vimeo_api_token&view=video">Settings</a> page.</li>
					</ol>'));
			}
			
			
		break; 
	}

	if (array_key_exists('error', $api_data))
	{
	   ?>
		<div class="alert alert-error">
			<strong>Unable to retrieve requested data.</strong>
			<br />
			<br />
			<?php echo $api_data['error']['message']; ?>
			<?php if ( ! function_exists('curl_init') && ! ini_get('allow_url_fopen')) : ?>
			Your system doesn't support remote connections.
			<br /> 
			Ask your hosting provider to enable either <strong>allow_url_fopen</strong> or the <strong>cURL extension</strong>.
			<?php endif;?>
		</div>
   </div><!-- .content -->
</div><!-- .primary -->
			<?php
			include('footer.php');
			exit();
	}

	// begin formatting
	$alt = 0;
	$total_results = count($api_data['results']);
	$counter = 1;
	$duplicates = 0;
	$total_search_results = $api_data['meta']['total_results'];

	if ($total_results > 0)
	{
		foreach ($api_data['results'] as $i => $item)
		{
			// Check if we already have this video
			$count_vids = (int) count_entries('pm_videos', 'yt_id', $item['id'] ."' AND source_id = '". $sources[$data_source]['source_id']);
			if ($count_vids == 0)
			{
				$col = ($alt % 2) ? 'table_row1' : 'table_row2';
				$alt++;		

				$col_unembed = '';
				
				if ( ! $item['embeddable'] || $item['private'])
				{
					$col_unembed = 'table_row_unembed';
					?>
					<!--<div class="css_yellow_warn"><span onMouseover="showhint('This video will not work since the owner decided to disable embedding.', this, event, '350px')">YouTube disabled embedding for this video.</span></div>-->
					<?php 
				}

				if (is_array($item['geo-restriction']))
				{
					$col_unembed = 'table_row_unembed';
					$georestriction = 'This video is ';
					$georestriction .=  ($item['geo-restriction']['type'] == 'deny') ? 'geo-restricted' : 'available only'; 
					$georestriction .= ' in the following countries: '. $item['geo-restriction']['list'];
				}

				?>
				<div class="video-stack" id="stackid-[<?php echo $counter;?>]">
					<div style="font-size: 10px; font-weight: normal">
						<div class="on_off" rel="tooltip" title="Select to import">
							<label for="video_ids[<?php echo $counter;?>]">IMPORT</label>
							<input type="checkbox" id="import-[<?php echo $counter;?>]" name="video_ids[<?php echo $counter;?>]" value="<?php echo $item['id'] .'" '; if( ! $item['embeddable'] || $item['private']) echo 'disabled="disabled" id="check_ignore"'; ?> />
						</div>
					</div>
					<a id="video-id-[<?php echo $counter;?>]"></a>
					<input id="video-title[<?php echo $counter;?>]" name="video_title[<?php echo $counter;?>]" type="text" value="<?php echo ucwords($item['title']); ?>" size="20" class="video-stack-title required_field" rel="tooltip" title="Click to edit" onClick="SelectAll('video-title[<?php echo $counter;?>]');" />
					<div class="clearfix"></div>
					<div class="video-stack-left">
						<ul class="thumbs_ul_import">
							<li class="stack-thumb-selected stack-thumb">
								<?php if (is_array($item['geo-restriction'])) : ?>
								<span class="video-stack-geo"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="<?php echo $georestriction; ?>"><img src="img/ico-geo-warn.png" /></a></span>
								<?php endif; ?>
								<span class="stack-thumb-text"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="The default thumbnail for this video."><i class="icon-ok icon-white"></i></a></span>
								<span class="stack-video-duration"><?php echo ($item['duration']) ? sec2hms($item['duration']) : ''; ?></span>
								<?php if ($item['embeddable']) : ?>
									<span class="stack-preview"><a href="<?php echo $item['embed_url']; ?>" rel="prettyPop[flash]" title="<?php echo str_replace('"', '&quot;', $item['title']); ?>"><div class="pm-sprite ico-playbutton"></div></a></span>
								<?php endif; ?>
								<img src="img/blank.gif" alt="Thumb 1" width="154" height="117" border="0" name="video_thumbnail" videoid="<?php echo $item['id']; ?>" rowid="<?php echo $counter;?>" class="" data-echo="<?php echo $item['thumbs'][0]['medium']; ?>" />
							</li>
							<?php if ($item['total_thumbs'] > 1) : ?>
							<li class="thumbs_li_default stack-thumb-small">
								<span class="stack-thumb-text"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="The default thumbnail for this video."><i class="icon-ok icon-white"></i></a></span>
								<img src="img/blank.gif" alt="Thumb 2" width="71" height="53" border="0" name="video_thumbnail" videoid="<?php echo $item['id']; ?>" rowid="<?php echo $counter;?>" class="" data-echo="<?php echo $item['thumbs'][1]['small']; ?>" />
							</li>
							<?php endif; ?>
							<?php if ($item['total_thumbs'] > 2) : ?>
							<li class="thumbs_li_default stack-thumb-small">
								<span class="stack-thumb-text"><a href="#video-id-[<?php echo $counter;?>]" rel="tooltip" data-placement="right" title="The default thumbnail for this video."><i class="icon-ok icon-white"></i></a></span>
								<img src="img/blank.gif" alt="Thumb 3" width="71" height="53" border="0" name="video_thumbnail" videoid="<?php echo $item['id']; ?>" rowid="<?php echo $counter;?>" class="" data-echo="<?php echo $item['thumbs'][2]['small']; ?>" />
							</li>
							<?php endif; ?>
						</ul>
						<div class="clearfix"></div>
						<label>
							<input type="checkbox" name="featured[<?php echo $counter;?>]" id="check_ignore" value="1" /> <small>Mark as <span class="label label-featured">FEATURED</span></small>
						</label>
						<?php if ( ! $item['embeddable']) : ?>

						<?php endif; ?>
					</div><!-- .video-stack-left -->
					<div class="video-stack-right noSearch clearfix">
						<label>CATEGORY <small style="color:red;">*</small></label>
						<div class="video-stack-cats">
							<?php
							$categories_dropdown_options = array(
										'attr_name' => 'category['. $counter .'][]',
										'attr_id' => 'select_category-'. $counter,
										'select_all_option' => false,
										'spacer' => '&mdash;',
										'selected' => $overwrite_category,
										'other_attr' => 'multiple="multiple" size="3"',
										'option_attr_id' => 'check_ignore'
										);
							echo categories_dropdown($categories_dropdown_options);
							?>
						</div>
					
						<div class="clear"></div>
						<label>DESCRIPTION</label>
						<textarea name="description[<?php echo $counter;?>]" id="description[<?php echo $counter;?>]" rows="2" class="video-stack-desc"><?php if($autodata) echo $item['description'];?></textarea>
						<label class="control-label" for="tags">TAGS</label>
						<div class="tagsinput">
							<input type="text" id="tags_addvideo_<?php echo $counter;?>" name="tags[<?php echo $counter;?>]" value="<?php if($autodata) echo $item['keywords'];?>" class="tags" />
						</div>		  
						<input type="hidden" id="thumb_url_<?php echo $counter;?>" name="thumb_url[<?php echo $counter;?>]" value="<?php echo $item['thumbs'][0]['medium']; ?>" />
						
						<input type="hidden" name="duration[<?php echo $counter;?>]" value="<?php echo $item['duration']; ?>" />
						<input type="hidden" name="direct[<?php echo $counter;?>]" value="<?php echo $item['url']; ?>" />
						<input type="hidden" name="url_flv[<?php echo $counter;?>]" value="" />
						
					</div> <!-- .video-stack-right -->
				</div><!-- .video-stack -->
				<?php
				
				$counter++;
			}
			else
			{
				$duplicates++;
			}
		}	//	end for()
	}	//	end if()
	else
	{
		?>
 
		<div class="alert alert-block">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			Your search did not return any results. Try using different keywords or options.
		</div>

		<?php
	}
	
	if($duplicates == $total_results && $duplicates > 0)
	{
		//	All videos found
		echo pm_alert_info('<p>All videos found on this page are already in your database.</p><p>Load more videos by visiting the next page or search again using different keywords.</p>');
	}
	?>
		
		
			<div class="clearfix"></div>
			<div id="stack-controls" class="row-fluid">
			<div class="span4" style="text-align: left;">
				<label class="checkbox import-all">
					<input type="checkbox" name="checkall" id="checkall" class="btn" onclick="checkUncheckAll(this);"/> <small>SELECT ALL VIDEOS</small>
				</label>				
			</div>

			<div class="span4">
			
			<?php
			//	generate pagination	
			if($total_search_results > 0)
			{
			 if($total_search_results > 1000)
			 {
				$total_search_results = 1000; // API limit
			 }
			?>
			
			<div class="pagination pagination-centered">
			<?php
			
			// generate smart pagination
			$filename = 'import.php';
			$query_params = array(	'action' => 'search',
									'keyword' => ($_POST['keyword'] != '') ? $_POST['keyword'] : $_GET['keyword'],
									'results' => $import_results,
									'page' => $page,
									'autofilling' => $autofilling,
									'autodata' => $autodata,
									);
			
			if (count($overwrite_category) > 0)
			{
				$query_params['oc'] = 1;
				$query_params['utc'] = implode(',', $overwrite_category);
			}
			else
			{
				$query_params['oc'] = 0;
				$query_params['utc'] = '';
			}
			
			if ($search_in_category != '' && $search_in_category != 'all')
			{
				$query_params['search_category'] = $search_in_category;
			}
			
			if (in_array($search_orderby, array('relevance', 'date', 'published', 'viewCount', 'rating')))
			{
				$query_params['search_orderby'] = $search_orderby;
			}
			
			if (in_array($search_duration, array('short', 'medium', 'long')))
			{
				$query_params['search_duration'] = $search_duration;
			}
			
			if ($search_language != '' && $search_language != 'all')
			{
				$query_params['search_language'] = $search_language;
			}
			
			if (in_array($search_time, array('today', 'this_week', 'this_month'/*, 'all_time'*/)))
			{
				$query_params['search_time'] = $search_time;
			}
			
			if ($search_license != '' && $search_license != 'all')
			{
				$query_params['search_license'] = $search_license;
			}
			
			if ($search_hd)
			{
				$query_params['search_hd'] = 'true';
			}
			
			if ($search_3d)
			{
				$query_params['search_3d'] = 'true';
			}
			
			if ($_GET['sub_id'] != '')
			{
				$query_params['sub_id'] = (int) $_GET['sub_id'];
			}
			
			$query_params['data_source'] = $data_source;

			if ($data_source == 'youtube')
			{
				unset($query_params['page']);

				?>
				<ul>
					<?php if ($api_data['meta']['prev_page']) : ?>
						<li><a href="<?php echo $filename .'?page='. $api_data['meta']['prev_page'] .'&'. http_build_query($query_params); ?>">Previous Page</a></li>
					<?php else : ?>
						<li class="disabled"><a href='#'>Previous Page</a></li>
					<?php endif; ?>
					<?php if ($api_data['meta']['next_page']) : ?>
						<li><a href="<?php echo $filename .'?page='. $api_data['meta']['next_page'] .'&'. http_build_query($query_params); ?>">Next Page</a></li>
					<?php else : ?>
						<li class="disabled"><a href='#'>Next Page</a></li>
					<?php endif; ?>
				</ul>
				<?php
			}
			else
			{
				echo a_generate_smart_pagination($page, $total_search_results, $import_results, 1, $filename, http_build_query($query_params));
			}
			?>
			</div>
		   
		
			<div class="clearfix"></div>
			<?php
			} // end if($youtube[0]['OPENSEARCH:TOTALRESULTS'] > 0)
			?>
			
			</div>
			
			<div class="span4">
			<div style="padding-right: 10px;">
			<span class="importLoader"><img src="img/ico-loader.gif" width="16" height="16" /></span>
			<button type="submit" name="submit" class="btn btn-success btn-strong" value="Import" id="submitImport" data-loading-text="Importing...">Import <span id="status"><span id="count">0</span></span> videos </button>
			</div>
			</div>
			</div><!-- #stack-controls -->
		</div><!-- #vs-grid -->
		<?php
		// end <table>
		?>
	<!-- search form information -->
	<?php if ($action == 'search') : ?>
	<input type="hidden" name="keyword" value="<?php echo htmlspecialchars(urldecode($v), ENT_COMPAT,'UTF-8',true); ?>" />
	<?php endif ;?>
	<input type="hidden" name="results" value="<?php echo $import_results; ?>" />
	<input type="hidden" name="autofilling" value="<?php echo $autofilling; ?>" />
	<input type="hidden" name="autodata" value="<?php echo $autodata; ?>" />
	<input type="hidden" name="overwrite_category" value="<?php echo ($_GET['oc'] == 1 || is_array($_POST['use_this_category'])) ? '1' : '0'; ?>" />
	<input type="hidden" name="use_this_category" value="<?php echo implode(',', $overwrite_category); ?>" />
	<input type="hidden" name="data_source" value="<?php echo $data_source; ?>" />

   </form>

<?php
}
else if ($action == 'search' && (empty($_GET['keyword']) || empty($_POST['keyword'])))
{
	echo pm_alert_error('Please enter your keywords first.');
}
?>
	</div><!-- .content -->
</div><!-- .primary -->

<?php 
if ($action == 'search')
{
	$sub_name = $query_params['keyword'];
	$sub_name .= ($search_in_category != '' && $search_in_category != 'all') ? ', '. $search_in_category : '';
	$sub_name .= (in_array($search_time, array('today', 'this_week', 'this_month'/*, 'all_time'*/))) ? ', '. str_replace('_', ' ', ucfirst($search_time)) : '';
	$sub_name .= (in_array($search_duration, array('short', 'medium', 'long'))) ? ', '. $search_duration : '';
	$sub_name .= ($search_hd) ? ', HD' : '';
	$sub_name .= ($search_3d) ? ', 3D' : '';
	$sub_params['data_source'] = $data_source;
	$sub_params = serialize($query_params); 

?>

	<!-- subscribe modal -->
	<div class="modal hide" id="modal_subscribe" tabindex="-1" role="dialog" aria-labelledby="modal_subscribe" aria-hidden="true">
	
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
	        <h3>Subscribe</h3>
	    </div>
		
	
		<form name="subscribe-to-search" method="post" action="">
	        <div class="modal-body">
	        	
				<div class="modal-response-placeholder hide"></div>
				
				<div style="padding: 10px; margin: 10px;">
						<label>Subscription label</label>
			            <input type="text" name="sub-name" value="<?php echo htmlspecialchars($sub_name);?>" size="40" />
						<input type="hidden" name="sub-params" value="<?php echo htmlspecialchars($sub_params); ?>" />
						<input type="hidden" name="sub-type" value="search" />
				</div>
			</div>
	        <div class="modal-footer">
		        <input type="hidden" name="status" value="1" />
		        <a class="btn btn-strong btn-normal" data-dismiss="modal" aria-hidden="true">Cancel</a>
		        <button type="submit" name="Submit" value="Submit" class="btn btn-success btn-strong" id="btn-subscribe-modal-save" />Save</button>
		    </div>
	    </form>
	
	</div>
<?php
}
?>
<?php 
$select_category_youtube_inner_html = '';
$select_category_dailymotion_inner_html = '';
foreach ($search_categories_youtube as $value => $label)
{
	$select_category_youtube_inner_html .= '<option value="'. $value .'">'. $label .'</option>';
}
foreach ($search_categories_dailymotion as $value => $label)
{
	$select_category_dailymotion_inner_html .= '<option value="'. $value .'">'. $label .'</option>';
}  
?>
<script type="text/javascript">

</script>
<?php
include('footer.php');
?>