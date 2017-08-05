<?php /* Smarty version 2.6.20, created on 2016-07-31 20:29:35
         compiled from header.tpl */ ?>
<?php 

 ?>﻿<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" dir="<?php if (@_IS_RTL == '1'): ?>rtl<?php else: ?>ltr<?php endif; ?>">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html dir="<?php if (@_IS_RTL == '1'): ?>rtl<?php else: ?>ltr<?php endif; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-itunes-app" content="app-id=1013596666, app-argument=http://www.hoodclips.com" />
<title><?php echo $this->_tpl_vars['meta_title']; ?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge,chrome=1">
<?php if ($this->_tpl_vars['no_index'] == '1' || @_DISABLE_INDEXING == '1'): ?>
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex,nofollow">
<?php endif; ?>
<meta name="title" content="<?php echo $this->_tpl_vars['meta_title']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
<link rel="shortcut icon" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/favicon/favicon.ico" type="image/x-icon">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<?php if ($this->_tpl_vars['tpl_name'] == "video-category"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
" />
<?php elseif ($this->_tpl_vars['tpl_name'] == "video-top"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?feed=topvideos" />
<?php elseif ($this->_tpl_vars['tpl_name'] == "article-category"): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php?c=<?php echo $this->_tpl_vars['cat_id']; ?>
&feed=articles" />
<?php elseif ($this->_tpl_vars['tpl_name'] == "video-watch"): ?>
<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="@thehoodclips" />
<meta name="twitter:image" content="<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
" />
<?php else: ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->_tpl_vars['meta_title']; ?>
" href="<?php echo @_URL; ?>
/rss.php" />
<?php endif; ?>

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php if (@_IS_RTL == '1'): ?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap.min.rtl.css">
<?php endif; ?>
<!--[if lt IE 9]>
<script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/new-style.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/uniform.default.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/hoodclips.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/custom-style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=all" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/trending.css">
<!--[if IE]>
<?php echo '
<link rel="stylesheet" type="text/css" media="screen" href="'; ?>
<?php echo @_URL; ?>
<?php echo '/templates/'; ?>
<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/css/new-style-ie.css">
'; ?>

<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:700italic" rel="stylesheet" type="text/css">
<![endif]-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<?php if ($this->_tpl_vars['tpl_name'] == 'video-watch' && $this->_tpl_vars['playlist']): ?>
<link rel="canonical" href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"/>
<?php endif; ?>
<script type="text/javascript">
 var MELODYURL = "<?php echo @_URL; ?>
";
 var MELODYURL2 = "<?php echo @_URL2; ?>
";
 var TemplateP = "<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
";
 var _LOGGEDIN_ = <?php if ($this->_tpl_vars['logged_in']): ?> true; <?php else: ?> false; <?php endif; ?>;
</script>
<?php echo '
<script type="text/javascript">
 var pm_lang = {
	lights_off: "'; ?>
<?php echo $this->_tpl_vars['lang']['lights_off']; ?>
<?php echo '",
	lights_on: "'; ?>
<?php echo $this->_tpl_vars['lang']['lights_on']; ?>
<?php echo '",
	validate_name: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_name']; ?>
<?php echo '",
	validate_username: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_username']; ?>
<?php echo '",
	validate_pass: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_pass']; ?>
<?php echo '",
	validate_captcha: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_captcha']; ?>
<?php echo '",
	validate_email: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_email']; ?>
<?php echo '",
	validate_agree: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_agree']; ?>
<?php echo '",
	validate_name_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_name_long']; ?>
<?php echo '",
	validate_username_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_username_long']; ?>
<?php echo '",
	validate_pass_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_pass_long']; ?>
<?php echo '",
	validate_confirm_pass_long: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_confirm_pass_long']; ?>
<?php echo '",
	choose_category: "'; ?>
<?php echo $this->_tpl_vars['lang']['choose_category']; ?>
<?php echo '",
 	validate_select_file: "'; ?>
<?php echo $this->_tpl_vars['lang']['upload_errmsg10']; ?>
<?php echo '",
 	validate_video_title: "'; ?>
<?php echo $this->_tpl_vars['lang']['validate_video_title']; ?>
<?php echo '",
	please_wait: "'; ?>
<?php echo $this->_tpl_vars['lang']['please_wait']; ?>
<?php echo '",
	// upload video page
	swfupload_status_uploaded: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_uploaded']; ?>
<?php echo '",
	swfupload_status_pending: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_pending']; ?>
<?php echo '",
	swfupload_status_queued: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_queued']; ?>
<?php echo '",
	swfupload_status_uploading: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_uploading']; ?>
<?php echo '",
	swfupload_file: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_file']; ?>
<?php echo '",
	swfupload_btn_select: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_btn_select']; ?>
<?php echo '",
	swfupload_btn_cancel: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_btn_cancel']; ?>
<?php echo '",
	swfupload_status_error: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_status_error']; ?>
<?php echo '",
	swfupload_error_oversize: "'; ?>
<?php echo $this->_tpl_vars['lang']['swfupload_error_oversize']; ?>
<?php echo '",
	swfupload_friendly_maxsize: "'; ?>
<?php echo $this->_tpl_vars['upload_limit']; ?>
<?php echo '",
	// playlist
	playlist_delete_confirm: "'; ?>
<?php echo $this->_tpl_vars['lang']['playlist_delete_confirm']; ?>
<?php echo '",
	playlist_delete_item_confirm: "'; ?>
<?php echo $this->_tpl_vars['lang']['playlist_delete_item_confirm']; ?>
<?php echo '"
 }
</script>
'; ?>


<script type="text/javascript" src="<?php echo @_URL; ?>
/js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/js/zeroClipboard.js"></script>
<script type="text/javascript" src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/js/facebook-ads.js"></script>



<?php if ($this->_tpl_vars['facebook_image_src'] != ''): ?>
    <link rel="image_src" href="<?php echo $this->_tpl_vars['facebook_image_src']; ?>
" />
    <meta property="og:title" content="<?php echo $this->_tpl_vars['meta_title']; ?>
" />
    <meta property="og:url" content="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" />
    <meta property="og:description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
    <meta property="og:image" content="<?php echo $this->_tpl_vars['facebook_image_src']; ?>
" />
    <?php if ($this->_tpl_vars['video_data']['source_id'] == 1): ?>
        <link rel="video_src" href="<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
"/>
        <meta property="og:video:url" content="<?php echo @_URL2; ?>
/videos.php?vid=<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
" />
    <?php endif; ?>
<?php endif; ?>
<style type="text/css"><?php echo $this->_tpl_vars['theme_customizations']; ?>
</style>
<?php if (isset ( $this->_tpl_vars['mm_header_inject'] )): ?><?php echo $this->_tpl_vars['mm_header_inject']; ?>
<?php endif; ?>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/css/bootstrap-social.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>

</head>
<?php if ($this->_tpl_vars['tpl_name'] == "video-category"): ?>
<body class="video-category catid-<?php echo $this->_tpl_vars['cat_id']; ?>
 page-<?php echo $this->_tpl_vars['gv_pagenumber']; ?>
">
<?php elseif ($this->_tpl_vars['tpl_name'] == "video-watch"): ?>
<body class="video-watch videoid-<?php echo $this->_tpl_vars['video_data']['id']; ?>
 author-<?php echo $this->_tpl_vars['video_data']['author_user_id']; ?>
 source-<?php echo $this->_tpl_vars['video_data']['source_id']; ?>
<?php if ($this->_tpl_vars['video_data']['featured'] == 1): ?> featured<?php endif; ?><?php if ($this->_tpl_vars['video_data']['restricted'] == 1): ?> restricted<?php endif; ?>">
<?php elseif ($this->_tpl_vars['tpl_name'] == "article-category"): ?>
<body class="article-category catid-<?php echo $this->_tpl_vars['cat_id']; ?>
">
<?php elseif ($this->_tpl_vars['tpl_name'] == "article-read"): ?>
<body class="article-read articleid-<?php echo $this->_tpl_vars['article']['id']; ?>
 author-<?php echo $this->_tpl_vars['article']['author']; ?>
 <?php if ($this->_tpl_vars['article']['featured'] == 1): ?> featured<?php endif; ?><?php if ($this->_tpl_vars['article']['restricted'] == 1): ?> restricted<?php endif; ?>">
<?php elseif ($this->_tpl_vars['tpl_name'] == 'page'): ?>
<body class="page pageid-<?php echo $this->_tpl_vars['page']['id']; ?>
 author-<?php echo $this->_tpl_vars['page']['author']; ?>
">
<?php else: ?>
<body>
<?php endif; ?>
<?php if ($this->_tpl_vars['maintenance_mode']): ?>
	<div class="alert alert-danger" align="center"><strong>Currently running in maintenance mode.</strong></div>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['mm_body_top_inject'] )): ?><?php echo $this->_tpl_vars['mm_body_top_inject']; ?>
<?php endif; ?>

<div id="fb-root"></div>
<div id="fb-root"></div>
<script>
<?php echo '
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));
'; ?>

</script>

<?php 
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false)
{
 ?>
<!--<div style="min-height:100px" id="popwarper" class="visible-sm visible-md visible-xs">

</div>-->
<!--<nav class="navbar navbar-fixed-top visible-sm visible-xs visible-md">
  <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color:#E2E2E2">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="$('#popwarper').css('min-height', '0').css('max-height' , 0);">
      <span aria-hidden="true" style="font-size:35px">&times;</span>
     </button>
    <div class="row">
    <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
<a href="https://play.google.com/store/apps/details?id=com.hoodclips.urban"><img alt="Get it on Google Play" style="width:100%;" src="https://lh3.googleusercontent.com/ey8YWSV4G2x3bqXx3osjdiRiXrD570u153Rt9soxLHaYifACV1g8IP0I6kMdl1Lkxspa=w300-rw" /></a>
    </div>

     <div class="col-sm-7 col-xs-7 col-md-7 col-lg-7">
<br>
       <h5>

         hoodclipsdClips
         <br>
         Entertinment
         <br>
         Get On The Play store.
       </h5>

     </div>

     <div class="col-sm-2 col-xs-2 col-md-2 col-lg-2 text-center">
       <h3>
         <a href="https://play.google.com/store/apps/details?id=com.hoodclips.urban" class="text-success">view <br> <i class="fa fa-android"></i>
         </a>
       </h3>

     </div>

    </div>
  </div>

</nav>-->
<?php 
}
 ?>




<header class="wide-header" id="header">
    <div class="header-ad hidden-sm hidden-xs">
          <center>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- hoodclilps_header_ad -->  
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-7913152423620879"
                 data-ad-slot="9847631149">
            </ins>
            <script>
            <?php echo '
            (adsbygoogle = window.adsbygoogle || []).push({});
            '; ?>

            </script>
          </center>

    </div>  
    <div class="container">
        
        <div class="row" >
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:#FFF">
              <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 no-padding">
                  <?php if ($this->_tpl_vars['_custom_logo_url'] != ''): ?>
                   <a href="<?php echo @_URL; ?>
/index.<?php echo @_FEXT; ?>
" rel="home">
                       <img class="hoodclip-logo" src="<?php echo $this->_tpl_vars['_custom_logo_url']; ?>
" alt="<?php echo @_SITENAME; ?>
" title="<?php echo @_SITENAME; ?>
" border="0" />
                   </a>
                   <?php else: ?>
                   <span class="site-title">
                      <a class="site-name" href="<?php echo @_URL; ?>
/index.<?php echo @_FEXT; ?>
" rel="home"><?php echo @_SITENAME; ?>
</a>
                   </span>
                   <?php endif; ?>
              </div>
              <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 nav-bar">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 no-padding visible-lg visible-md">
                        <nav>
                        <ul id="nav">
                        		<!--<li><a href="<?php echo @_URL; ?>
/submit_video.php">Submit Video</a></li>-->
                            <li><a href="http://www.crackappstudio.com/" class="wide-nav-link">Crack Apps</a></li>
                            <li><a href="<?php echo @_URL; ?>
/contact_us.<?php echo @_FEXT; ?>
" class="wide-nav-link">Advertise</a></li>
                            <li><a href="<?php echo @_URL; ?>
/contact_us.<?php echo @_FEXT; ?>
" class="wide-nav-link">Contact</a></li>
                           <!--   <li><a href="http://hoodclips.bigcartel.com/" target="_blank">SHOP</a></li> -->
                        </ul>
                        </nav>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                        <form action="<?php echo @_URL; ?>
/search.php" method="GET" id="search"  class="search-form col-lg-12 col-md-12 col-sm-12 col-xs-12" name="search" onSubmit="return validateSearch('true');">
                        <fieldset>
                            <input class="text" type="search" name="keywords" value="<?php echo $this->_tpl_vars['search']; ?>
" placeholder="<?php echo $this->_tpl_vars['lang']['submit_search']; ?>
" x-webkit-speech speech onwebkitspeechchange="this.form.submit();">
                            <input type="submit" value="Search">
                        </fieldset>
                        </form>
                        <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ic_search_grey.png" alt="" class="img-search-grey">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-5 col-xs-5 visible-lg visible-md">
                        <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 social-networks no-padding">
                           <li class="instagram"><a href="http://instagram.com/hoodclips/" target="_blank">Instagram</a></li>
                           <li class="twitter"><a href="https://twitter.com/thehoodclips" target="_blank">twitter</a></li>
                           <li class="facebook"><a href="https://www.facebook.com/TheHoodClips" target="_blank">facebook</a></li>
                        </ul>
                    </div>
                </div>
              </div>
           </div>
       </div>
    </div>
    <div style="background:#c90000;height:15px"></div>
</header>


<div class="header-main-ad hidden-sm hidden-xs" style="padding-top:5px">
    <center>
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- hoodcips_main_head_ad -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:970px;height:250px"
           data-ad-client="ca-pub-7913152423620879"
           data-ad-slot="9729879942">
      </ins>
      <script>
      <?php echo '
      (adsbygoogle = window.adsbygoogle || []).push({});
      '; ?>

      </script>
    </center>
</div>  
<div class="header-mobile-ad hidden-lg hidden-md" style="padding-top:5px">
    <center>
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <!-- hoodclips_mobile_header_banner -->
      <ins class="adsbygoogle"
           style="display:inline-block;width:320px;height:50px"
           data-ad-client="ca-pub-7913152423620879"
           data-ad-slot="6796433149"></ins>
      <script>
      <?php echo '
      (adsbygoogle = window.adsbygoogle || []).push({});
      '; ?>

      </script>
    </center>
</div>  


<!--<div class="hidden-sm hidden-xs" style="height:20px;"></div>-->