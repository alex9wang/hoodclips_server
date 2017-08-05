<script type="text/javascript" src="{$smarty.const._URL}/templates/{$template_dir}/js/trending.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/owl/owl.carousel.css">
<link rel="stylesheet" type="text/css" media="screen" href="{$smarty.const._URL}/templates/{$template_dir}/css/owl/owl.theme.css">
<script type="text/javascript" src="{$smarty.const._URL}/templates/{$template_dir}/js/owl.carousel.min.js"></script>

<div class="container">
    <div class="row primary-content">
      <header class="heading">
              <h1 class="title">
                <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_logo.png" alt="" class="title-logo">
                <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_trending.png" alt="" class="title-trending-logo">
                <b>TRENDING</b> <mark class="mark"><b>NOW</b></mark>
              </h1>
      </header>
      <div class="seperator"></div>
      <div class="row trending" style="padding:0;">  

          <a id="prev" href="javascript:void(0)" class="hidden-sm hidden-xs"><img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_left_more.png" alt="" class="slider-prev"></a>
          <div class="hidden-lg hidden-md col-sm-1 col-xs-1" style="margin-top:20%;padding-right:0px;">
            <a id="prev_small" href="javascript:void(0)" style=""><img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_left_small_more.png" alt="" class=""></a>
          </div>
          <div id="owl-slider" class="col-lg-12 col-md-12 col-sm-10 col-xs-10">
                {foreach from=$trending_videos key=k item=video_data}
                    {assign var='count' value=$count+1}
                    <div class="item">
                        <section class="col-lg col-md col-sm col-xs box">
                            <div class="visible-lg visible-md col-lg-12 col-md-12 no-padding">
                                <a href="{$video_data.video_href}" class="video-box">
                                    <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                                </a>
                                <div class="col-lg-12 col-md-12">
                                    <strong class="title">
                                        <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                    </strong>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <span class="pm-video-attr-numbers">
                                        <small>{$video_data.views_compact} {$lang.views}</small>
                                    </span>
                                </div>
                            </div>
                            <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                                <a href="{$video_data.video_href}" class="video-box">
                                    <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                                </a>
                                <div class="col-lg-12 col-md-12">
                                    <strong class="title">
                                        <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                    </strong>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <span class="pm-video-attr-numbers">
                                        <small>{$video_data.views_compact} {$lang.views}</small>
                                    </span>
                                </div>
                            </div>
                        </section>
                    </div>
                {/foreach}
          </div>
          <div class="hidden-lg hidden-md col-sm-1 col-xs-1" style="margin-top:20%;padding-left:0px;">
            <a id="next_small" href="javascript:void(0)" style=""><img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_right_small_more.png" alt="" class=""></a>
          </div>
          <a id="next" href="javascript:void(0)" class="hidden-sm hidden-xs"><img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_right_more.png" alt="" class="slider-next"></a>
      </div>
      
    </div>
</div>
<div class="hidden-sm hidden-xs" style="height:20px;"></div>






				
