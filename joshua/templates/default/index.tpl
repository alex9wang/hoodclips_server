{include file='header.tpl' p="index"} 
<div class="container no-padding">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
            {if $page_number == ""}
            <header class="heading">
                <h1>FEATURED <mark>VIDEOS</mark></h1>
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
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
            <section class="{if $fvid_s1_type == 1} video exclusive {else}video exclusive2{/if}">
                <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_s1_url}">
                    <img src="{$fvid_s1_thumb}" width="1000" height="371" alt="">	           
                    <strong class="tag">{if $fvid_s1_type == 1} Hoodclips Exclusive {else}Sponsored{/if}</strong>                                        
                    <div class="caption">
                        <h1>{$fvid_s1_title}</h1>
                        <h2>{$fvid_s1_sdetail}</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section> 
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  no-padding">
            <section class="{if $fvid_s2_type == 1} video secondary exclusive {else}video secondary exclusive2{/if}">
                <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_s2_url}">
                    <img src="{$fvid_s2_thumb}" width="1000" height="371" alt="">	           
                    <strong class="tag">{if $fvid_s2_type == 1} Hoodclips Exclusive {else}Sponsored{/if}</strong>                                        
                    <div class="caption">
                        <h1>{$fvid_s2_title}</h1>
                        <h2>{$fvid_s2_sdetail}</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section>
            </div>
        </div> 
        {/if}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">
            <a id="top"></a>
            {if $ad_12 != ''}
                <div class="pm-ad-zone" align="center">{$ad_12}</div>
            {/if}
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="{$added_date1}">{$added_date1}</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos1} VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
                {if $data1 == "false"} 
                    <section class="box">
                        <b>{$added_date1} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing1 key=k item=video_data}
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
                        <div class="visible-lg visible-md col-lg-12 col-md-12">
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
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="{$video_data.video_href}" class="video-box">
                                    <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                    </section>
                {/foreach}
                {/if}
                {if $date != "false"}                    
                <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 visible-lg visible-md box">
                    <a href="{$smarty.const._URL}/submit_video.php">
                        <span class="submit-video">SUBMIT YOUR VIDEO</span>
                    </a>
                </section>
                {/if}
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">
                <a id="top"></a>
                {if $ad_13 != ''}
                    <div class="pm-ad-zone" align="center">{$ad_13}</div>
                {/if}
            </div>
        </div>
        {if $added_date2 !=""}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="{$added_date2}">{$added_date2}</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos2} VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                {if $data2 == "false"} 
                    <section class="box">
                        <b>{$added_date2} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing2 key=k item=video_data}
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
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="{$video_data.video_href}" class="video-box">
                                    <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                    </section>
                {/foreach}
                {/if}
            </div> 
        </div>
          {/if} 
          
          {if $added_date3 !=""}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="{$added_date3}">{$added_date3}</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos3} VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                {if $data2 == "false"} 
                    <section class="box">
                        <b>{$added_date2} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing3 key=k item=video_data}
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
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="{$video_data.video_href}" class="video-box">
                                    <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                    </section>
                {/foreach}
                {/if}
            </div> 
        </div>
          {/if}
          
          {if $added_date4 !=""}
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="{$added_date4}">{$added_date4}</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num">{$total_videos4} VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                {if $data2 == "false"} 
                    <section class="box">
                        <b>{$added_date2} No Videos found</b>
                    </section>                                              
                {else}
                {foreach from=$video_listing4 key=k item=video_data}
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
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="{$video_data.video_href}" class="video-box">
                                    <img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                    </section>
                {/foreach}
                {/if}
                </div> 
            </div>
          {/if}
          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
              {$pagination_code}
              </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">
            <a id="top"></a>
            {if $ad_14 != ''}
            <div class="pm-ad-zone" align="center">{$ad_14}</div>
            {/if}
          </div>
        </div>
    </div>
<div class="clear-fix" style="margin-bottom: 10px"></div>
{include file='footer.tpl' p="index"} 