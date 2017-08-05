{include file='header.tpl' p="index"} 
{include file='trending.tpl'}
<div class="container">
    <div id="main-video-contents" class="row primary-content">
        <div class="seperator hidden-lg hidden-md"></div>
        <div class="header-mobile-ad hidden-lg hidden-md" style="padding-top:5px">

            <center>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- hoodclips_mobile_main_ad -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:250px"
                     data-ad-client="ca-pub-7913152423620879"
                     data-ad-slot="2292181545"></ins>
                <script>
                {literal}
                (adsbygoogle = window.adsbygoogle || []).push({});
                {/literal}
                </script>
            </center>
        </div>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding hidden-sm hidden-xs">
        <div style="margin:10px 10px 10px 10px">
            {if $page_number == ""}
            <!--<header class="heading">
                <h1><b>FEATURED <b><mark><b>VIDEOS<b></mark></h1>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <section class="{if $fvid_main_type == 1} video large exclusive Exclusive {else}video large exclusive2{/if}">
                <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_main_url}">
                    <img src="{$fvid_main_thumb}" width="1000" height="371" alt="">                                  
                    <strong class="tag">{if $fvid_main_type == 1} Hoodclips Exclusive {else}Sponsored{/if}</strong>                                  
                    <div class="caption">
                        <h1>{$fvid_main_title}</h1>
                        <h2>{$fvid_main_sdetail}</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section>
            </div>-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
            <section class="{if $fvid_s1_type == 1} video exclusive {else}video exclusive2{/if}">
                <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_s1_url}">
                    <img src="{$fvid_s1_thumb}" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" height="371" alt="">	           
                    <strong class="tag">
                        <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_white_logo.png" alt="" width="18px">
                        {if $fvid_s1_type == 1} Hoodclips Exclusive {else}Sponsored{/if}
                    </strong>                                        
                    <div class="caption">
                        <h1>{$fvid_s1_title}</h1>
                        <h2>{$fvid_s1_sdetail}</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section> 
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
            <section class="{if $fvid_s2_type == 1} video secondary exclusive {else}video secondary exclusive2{/if}">
                <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_s2_url}">
                    <img src="{$fvid_s2_thumb}" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" height="371" alt="">	           
                    <strong class="tag">
                        <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_white_logo.png" alt="" width="18px">
                        {if $fvid_s2_type == 1} Hoodclips Exclusive {else}Sponsored{/if}
                    </strong>                                        
                    <div class="caption">
                        <h1>{$fvid_s2_title}</h1>
                        <h2>{$fvid_s2_sdetail}</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section>
            </div>
          {/if}              
        </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md align-center">
            <a id="top"></a>
            {if $ad_12 != ''}
                <div class="pm-ad-zone" align="center">{$ad_12}</div>
            {/if}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="seperator"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading hidden-sm hidden-xs">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="title">
                            <time datetime="{$added_date1}">
                                <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_gun.png" alt="" class="title-gun">
                                <b>{$added_date1}</b>
                            </time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos1} VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                  {assign var='count' value=0}
                {if $data1 == "false"} 
                    <section class="box  hidden-sm hidden-xs">
                        <b>{$added_date1} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing1 key=k item=video_data}
                    {assign var='count' value=$count+1}
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="{$video_data.video_href}" class="video-box">
                                <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                        {if $count is div by 5}
                        <!-- <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos1_{$count}" data-testmode="false"></div>
                            <div id="ad_root_videos1_{$count}">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        {/if}
                    </section>
                    {if $count is div by 4}
                        <div class="clearfix"></div>
                    {/if}
                {/foreach}
                {/if}
                {if false and $date != "false"}                    
                <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 visible-lg visible-md box">
                    <a href="{$smarty.const._URL}/submit_video.php">
                        <span class="submit-video">SUBMIT YOUR VIDEO</span>
                    </a>
                </section>
                {/if}
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md align-center">
                <a id="top"></a>
                {if $ad_13 != ''}
                    <div class="pm-ad-zone" align="center">{$ad_13}</div>
                {/if}
            </div>
        </div>
        {if $added_date2 !=""}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  no-padding">
            <div class="seperator  hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading  hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="{$added_date2}">
                                <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_gun.png" alt="" class="title-gun">
                                <b>{$added_date2}</b>
                            </time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos2} VIDEOS</span>
                    </div>
                </div>
            </header>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                {assign var='count' value=0}
                {if $data2 == "false"}     
                <section class="box  hidden-sm hidden-xs">
                        <b>{$added_date2} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing2 key=k item=video_data}
                     {assign var='count' value=$count+1}
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="{$video_data.video_href}" class="video-box">
                                <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                        {if $count is div by 5}
                        <!-- <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos2_{$count}" data-testmode="false"></div>
                            <div id="ad_root_videos2_{$count}">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        {/if}
                    </section>
                        {if $count is div by 4}
                            <div class="clearfix"></div>
                        {/if}
                {/foreach}
                {/if}
            </div> 
        </div>
          {/if} 
          
          {if $added_date3 !=""}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="seperator  hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading  hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="{$added_date3}">
                                <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_gun.png" alt="" class="title-gun">
                                <b>{$added_date3}</b>
                            </time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos3} VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
               {assign var='count' value=0}
                {if $data3 == "false"} 
                    <section class="box  hidden-sm hidden-xs">
                        <b>{$added_date3} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing3 key=k item=video_data}
                    {assign var='count' value=$count+1}
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="{$video_data.video_href}" class="video-box">
                                <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                        {if $count is div by 5}
                        <!-- <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos3_{$count}" data-testmode="false"></div>
                            <div id="ad_root_videos3_{$count}">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        {/if}
                    </section>
                    {if $count is div by 4}
                        <div class="clearfix"></div>
                    {/if}
                {/foreach}
                {/if}
            </div> 
        </div>
          {/if}
          
          {if $added_date4 !=""}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="seperator  hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading  hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="{$added_date4}">
                                <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ic_gun.png" alt="" class="title-gun">
                                <b>{$added_date4}</b>
                            </time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos4} VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                  {assign var='count' value=0}
                {if $data4 == "false"} 
                    <section class="box  hidden-sm hidden-xs">
                        <b>{$added_date4} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing4 key=k item=video_data}
                     {assign var='count' value=$count+1}
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="{$video_data.video_href}" class="video-box">
                                <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                        {if $count is div by 5}
                        <!--<div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos4_{$count}" data-testmode="false"></div>
                            <div id="ad_root_videos4_{$count}">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        {/if}
                    </section>
                                {if $count is div by 4}
                                    <div class="clearfix"></div>
                                {/if}
                {/foreach}
                {/if}
                </div> 
            </div>
          {/if}
          
          <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
              {$pagination_code}
              </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md align-center">
            <a id="top"></a>
            {if $ad_14 != ''}
                <div class="pm-ad-zone" align="center">{$ad_14}</div>
            {/if}
          </div>-->
        </div>
    </div>
    <div id="loading-bar" class="row">
            <img src="{$smarty.const._URL}/templates/{$template_dir}/img/ajax-loading.gif" alt="" >
    </div>

<div class="clear-fix" style="margin-bottom: 10px"></div>
{include file='footer.tpl' p="index"} 

				
