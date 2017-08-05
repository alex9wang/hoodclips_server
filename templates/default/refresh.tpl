 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="seperator  hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading  hidden-sm hidden-xs">
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
            <div class="seperator hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
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
                <section class="box hidden-sm hidden-xs">
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
            <div class="seperator hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
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
                    <section class="box hidden-sm hidden-xs">
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
                        <!-- </center> -->
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
            <div class="seperator hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
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
                    <section class="box hidden-sm hidden-xs">
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
                        <!-- <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
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
        </div>


				
