<!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" dir="{if $smarty.const._IS_RTL == '1'}rtl{else}ltr{/if}">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html dir="{if $smarty.const._IS_RTL == '1'}rtl{else}ltr{/if}">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$meta_title}</title>
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge,chrome=1">  
{if $no_index == '1' || $smarty.const._DISABLE_INDEXING == '1'}
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex,nofollow">
{/if}
<meta name="title" content="{$meta_title}" />
<meta name="keywords" content="{$meta_keywords}" />
<meta name="description" content="{$meta_description}" />
<link rel="shortcut icon" href="{$smarty.const._URL}/templates/{$template_dir}/favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="{$smarty.const._URL}/templates/{$template_dir}/favicon/favicon.ico" type="image/x-icon">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
{if $tpl_name == "video-category"}
<link rel="alternate" type="application/rss+xml" title="{$meta_title}" href="{$smarty.const._URL}/rss.php?c={$cat_id}" />
{elseif $tpl_name == "video-top"}
<link rel="alternate" type="application/rss+xml" title="{$meta_title}" href="{$smarty.const._URL}/rss.php?feed=topvideos" />
{elseif $tpl_name == "article-category"}
<link rel="alternate" type="application/rss+xml" title="{$meta_title}" href="{$smarty.const._URL}/rss.php?c={$cat_id}&feed=articles" />
{else}
<link rel="alternate" type="application/rss+xml" title="{$meta_title}" href="{$smarty.const._URL}/rss.php" />
{/if}

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
{if $smarty.const._IS_RTL == '1'}
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/bootstrap.min.rtl.css">
{/if}
<!--[if lt IE 9]>
<script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/new-style.css">
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/uniform.default.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/hoodclips.css">
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/custom-style.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&subset=all" rel="stylesheet" type="text/css">
<!--[if IE]>
{literal}
<link rel="stylesheet" type="text/css" media="screen" href="{/literal}{$smarty.const._URL}{literal}/templates/{/literal}{$template_dir}{literal}/css/new-style-ie.css">
{/literal}
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:400italic" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:700italic" rel="stylesheet" type="text/css">
<![endif]-->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
{if $tpl_name == 'video-watch' && $playlist}
<link rel="canonical" href="{$video_data.video_href}"/>
{/if}
<script type="text/javascript">
 var MELODYURL = "{$smarty.const._URL}";
 var MELODYURL2 = "{$smarty.const._URL2}";
 var TemplateP = "{$smarty.const._URL}/templates/{$template_dir}";
 var _LOGGEDIN_ = {if $logged_in} true; {else} false; {/if};
</script>
{literal}
<script type="text/javascript">
 var pm_lang = {
	lights_off: "{/literal}{$lang.lights_off}{literal}",
	lights_on: "{/literal}{$lang.lights_on}{literal}",
	validate_name: "{/literal}{$lang.validate_name}{literal}",
	validate_username: "{/literal}{$lang.validate_username}{literal}",
	validate_pass: "{/literal}{$lang.validate_pass}{literal}",
	validate_captcha: "{/literal}{$lang.validate_captcha}{literal}",
	validate_email: "{/literal}{$lang.validate_email}{literal}",
	validate_agree: "{/literal}{$lang.validate_agree}{literal}",
	validate_name_long: "{/literal}{$lang.validate_name_long}{literal}",
	validate_username_long: "{/literal}{$lang.validate_username_long}{literal}",
	validate_pass_long: "{/literal}{$lang.validate_pass_long}{literal}",
	validate_confirm_pass_long: "{/literal}{$lang.validate_confirm_pass_long}{literal}",
	choose_category: "{/literal}{$lang.choose_category}{literal}",
 	validate_select_file: "{/literal}{$lang.upload_errmsg10}{literal}",
 	validate_video_title: "{/literal}{$lang.validate_video_title}{literal}",
	please_wait: "{/literal}{$lang.please_wait}{literal}",
	// upload video page
	swfupload_status_uploaded: "{/literal}{$lang.swfupload_status_uploaded}{literal}",
	swfupload_status_pending: "{/literal}{$lang.swfupload_status_pending}{literal}",
	swfupload_status_queued: "{/literal}{$lang.swfupload_status_queued}{literal}",
	swfupload_status_uploading: "{/literal}{$lang.swfupload_status_uploading}{literal}",
	swfupload_file: "{/literal}{$lang.swfupload_file}{literal}",
	swfupload_btn_select: "{/literal}{$lang.swfupload_btn_select}{literal}",
	swfupload_btn_cancel: "{/literal}{$lang.swfupload_btn_cancel}{literal}",
	swfupload_status_error: "{/literal}{$lang.swfupload_status_error}{literal}",
	swfupload_error_oversize: "{/literal}{$lang.swfupload_error_oversize}{literal}",
	swfupload_friendly_maxsize: "{/literal}{$upload_limit}{literal}",
	// playlist
	playlist_delete_confirm: "{/literal}{$lang.playlist_delete_confirm}{literal}",
	playlist_delete_item_confirm: "{/literal}{$lang.playlist_delete_item_confirm}{literal}"
 }
</script>
{/literal}

<script type="text/javascript" src="{$smarty.const._URL}/js/swfobject.js"></script>
<script type="text/javascript" src="{$smarty.const._URL}/templates/{$template_dir}/js/zeroClipboard.js"></script>

{if $facebook_image_src != ''}
    <link rel="image_src" href="{$facebook_image_src}" />
    <meta property="og:title" content="{$meta_title}" />
    <meta property="og:url" content="{$video_data.video_href}" />
    <meta property="og:description" content="{$meta_description}" />
    <meta property="og:image" content="{$facebook_image_src}" />
    {if $video_data.source_id == 1}
        <link rel="video_src" href="{$smarty.const._URL2}/videos.php?vid={$video_data.uniq_id}"/>
        <meta property="og:video:url" content="{$smarty.const._URL2}/videos.php?vid={$video_data.uniq_id}" />
    {/if}
{/if}
<style type="text/css">{$theme_customizations}</style>
{if isset($mm_header_inject)}{$mm_header_inject}{/if}
</head>
{if $tpl_name == "video-category"}
<body class="video-category catid-{$cat_id} page-{$gv_pagenumber}">
{elseif $tpl_name == "video-watch"}
<body class="video-watch videoid-{$video_data.id} author-{$video_data.author_user_id} source-{$video_data.source_id}{if $video_data.featured == 1} featured{/if}{if $video_data.restricted == 1} restricted{/if}">
{elseif $tpl_name == "article-category"}
<body class="article-category catid-{$cat_id}">
{elseif $tpl_name == "article-read"}
<body class="article-read articleid-{$article.id} author-{$article.author} {if $article.featured == 1} featured{/if}{if $article.restricted == 1} restricted{/if}">
{elseif $tpl_name == "page"}
<body class="page pageid-{$page.id} author-{$page.author}">
{else}
<body>
{/if}
{if $maintenance_mode}
	<div class="alert alert-danger" align="center"><strong>Currently running in maintenance mode.</strong></div>
{/if}
{if isset($mm_body_top_inject)}{$mm_body_top_inject}{/if}
<header class="wide-header" id="header">
    <div class="container">
        <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-ad" style="color:#FFF">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 holder">
                   <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
                       {if $_custom_logo_url != ''}
                           <a href="{$smarty.const._URL}/index.{$smarty.const._FEXT}" rel="home">
                               <img class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hoodclip-logo" src="{$_custom_logo_url}" alt="{$smarty.const._SITENAME}" title="{$smarty.const._SITENAME}" border="0" />
                           </a>
                       {else}
                       <span class="site-title">
                           <a class="site-name" href="{$smarty.const._URL}/index.{$smarty.const._FEXT}" rel="home">{$smarty.const._SITENAME}</a>
                       </span>
                       {/if}
                   </div>
                   <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 nav-bar">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 no-padding">
                            <nav>
                            <ul id="nav">
                                  <li><a href="{$smarty.const._URL}/submit_video.php">Submit Video</a></li>
                                  <li><a href="{$smarty.const._URL}/contact_us.{$smarty.const._FEXT}" class="wide-nav-link">Contact</a></li>
                                  <li><a href="#">SHOP</a></li>
                            </ul>
                            </nav>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-7 col-xs-7 visible-lg visible-md">
                            <form action="{$smarty.const._URL}/search.php" method="post" id="search"  class="search-form col-lg-12 col-md-12 col-sm-12 col-xs-12" name="search" onSubmit="return validateSearch('true');">
                            <fieldset>
                                <input class="text" type="search" name="keywords" value="{$search}" placeholder="{$lang.submit_search}" x-webkit-speech speech onwebkitspeechchange="this.form.submit();">
                                <input type="submit" value="Search">
                            </fieldset>
                            </form>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-5 col-xs-5 visible-lg visible-md">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 social-networks no-padding">
                                   <li class="instagram"><a href="http://instagram.com/hoodclips/" target="_blank">Instagram</a></li>
                                   <li class="twitter"><a href="http://www.twitter.com/" target="_blank">twitter</a></li>
                                   <li class="facebook"><a href="http://www.facebook.com/" target="_blank">facebook</a></li>
                             </ul>
                        </div>
                    </div>
                </div>
               </div>
           </div>
       </div>
    </div>
</header>

