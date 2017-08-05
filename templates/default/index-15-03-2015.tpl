{include file='header.tpl' p="index"} 
<div id="wrapper">
    <div class="container-fluid" style="margin-left:-20px; margin-right:0">
    
    
      <div class="row-fluid">
      
      {if $page_number == ""}
      
      <header  class="span12 heading">
						<h1>FEATURED <mark>VIDEOS</mark></h1>
					</header>
                                       
       <div class="featured-videos">
						                                                <section class="{if $fvid_main_type == 1} video large exclusive Exclusive {else}video large exclusive2{/if}">
                                                       <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_main_url}">
                                                                <img src="{$fvid_main_thumb}" width="1000" height="371" alt="">                                  <strong class="tag">{if $fvid_main_type == 1} Hoodclips Exclusive {else}Sponsored{/if}</strong>                                  <div class="caption">
                                                                        <h1>{$fvid_main_title}</h1>
                                                                        <h2>{$fvid_main_sdetail}</h2>
                                                                        <span class="btn-play">play</span>
                                                                        <span class="btn-play-hover">play</span>
									                                                                </div>
                                                        </a>
                                               </section>                                               
                                               
                                               
                               <section class="{if $fvid_s1_type == 1} video exclusive {else}video exclusive2{/if}">
                               <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_s1_url}">
                                                         <img src="{$fvid_s1_thumb}" width="500" height="371" alt="">	           <strong class="tag">{if $fvid_s1_type == 1} Hoodclips Exclusive {else}Sponsored{/if}</strong>                                        <div class="caption">
                                                                        <h1>{$fvid_s1_title}</h1>
                                                                        <h2>{$fvid_s1_sdetail}</h2>
                                                                        <span class="btn-play">play</span>
                                                                        <span class="btn-play-hover">play</span>
									
                                                                </div>
                                                        </a>
                                                </section> 
                                                
                                                
           <section class="{if $fvid_s2_type == 1} video secondary exclusive {else}video secondary exclusive2{/if}">
                                <a class="front-featured" data-fancybox-type="iframe" href="{$fvid_s2_url}">
                                                         <img src="{$fvid_s2_thumb}" width="500" height="371" alt="">	           <strong class="tag">{if $fvid_s2_type == 1} Hoodclips Exclusive {else}Sponsored{/if}</strong>                                        <div class="caption">
                                                                        <h1>{$fvid_s2_title}</h1>
                                                                        <h2>{$fvid_s2_sdetail}</h2>
                                                                        <span class="btn-play">play</span>
                                                                        <span class="btn-play-hover">play</span>
									
                                                                </div>
                                                        </a>
                                                </section>
                                                                                               					</div> 
       {/if}                                                                                                                       
                    
                    
      
      
      <div class="span12" style="text-align:center">

<a id="top"></a>
{if $ad_12 != ''}
<div class="pm-ad-zone" align="center">{$ad_12}</div>
{/if}
</div>
      
      
      
      <section>
                                        <header class="heading">
                                                <span class="num">{$total_videos1} VIDEOS</span>
                                                <h1><time datetime="{$added_date1}">{$added_date1}</time></h1>
                                        </header>
                                        <section class="videos">
                                        
                                        {if $data1 == "false"} 
                                                                         
       										 <section class="box"><b>{$added_date1} No Videos found</b></section>                                              {else}
                                                                               
                                        {foreach from=$video_listing1 key=k item=video_data}
                <section class="box">
							                                                        <a href="{$video_data.video_href}" class="video-box"><img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" width="222" height="125">
                                                        </a>
                                                        <strong class="title">
                                                        <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                                        </strong>
                                                        <div>
                                                               <span class="pm-video-attr-numbers"><small>{$video_data.views_compact} {$lang.views} / {$video_data.comments_compact} {$lang.comments}</small></span>
                                                        </div>
                                                       
                                                        
                                                </section>
                                                {/foreach}
                                               
                                                         {/if}
                                                
                                               
                                                
                                                
                                              
                         {if $date != "false"}                    
						<section class="box">
							<a href="{$smarty.const._URL}/submit_video.html">
								<span class="submit-video">SUBMIT YOUR VIDEO</span>
							</a>
						</section>
                        {/if}
                                        </section>

                                </section>
                                
                                
                                
                                
                                
                                
                                
                                 <div class="span12" style="text-align:center">

<a id="top"></a>
{if $ad_13 != ''}
<div class="pm-ad-zone" align="center">{$ad_13}</div>
{/if}
</div>
      
      
      {if $added_date2 !=""}
      <section>
                                        <header class="heading">
                                                <span class="num">{$total_videos2} VIDEOS</span>
                                                <h1><time datetime="{$added_date2}">{$added_date2}</mark></time></h1>
                                        </header>
                                        
							                                                         <section class="videos">                                                
                                        {if $data2 == "false"} 
                                        
                                        
                                                      <section class="box">
							                        <b> {$added_date2} No Videos found  </b>                                                 
                                                        
                                                </section>
                                                
                                                 {else}
                                                                               
                                        {foreach from=$video_listing2 key=k item=video_data}
                <section class="box">
							                                                        <a href="{$video_data.video_href}" class="video-box"><img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" width="222" height="125">
                                                        </a>
                                                        <strong class="title">
                                                        <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                                        </strong>
                                                        <div>
                                                               <span class="pm-video-attr-numbers"><small>{$video_data.views_compact} {$lang.views} / {$video_data.comments_compact} {$lang.comments}</small></span>
                                                        </div>
                                                       
                                                        
                                                </section>
                                                {/foreach}
                                               
                                                         {/if}
                                                
                                                </section>
						
                                        </section>
                                        {/if}

{if $added_date3 !=""}
<section>
                                        <header class="heading">
                                                <span class="num">{$total_videos3} VIDEOS</span>
                                                <h1><time datetime="{$added_date3}">{$added_date3}</mark></time></h1>
                                        </header>
                                        
							                                                         <section class="videos">                                                
                                        {if $data3 == "false"} 
                                        
                                        
                                                      <section class="box">
							                        <b> {$added_date3} No Videos found  </b>                                                 
                                                        
                                                </section>
                                                
                                                 {else}
                                                                               
                                        {foreach from=$video_listing3 key=k item=video_data}
                <section class="box">
							                                                        <a href="{$video_data.video_href}" class="video-box"><img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" width="222" height="125">
                                                        </a>
                                                        <strong class="title">
                                                        <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                                        </strong>
                                                        <div>
                                                               <span class="pm-video-attr-numbers"><small>{$video_data.views_compact} {$lang.views} / {$video_data.comments_compact} {$lang.comments}</small></span>
                                                        </div>
                                                       
                                                        
                                                </section>
                                                {/foreach}
                                               
                                                         {/if}
                                                
                                                </section>
						
                                        </section>
                                      {/if}  
                                        
          {if $added_date4 !=""}
                                        <section>
                                        <header class="heading">
                                                <span class="num">{$total_videos4} VIDEOS</span>
                                                <h1><time datetime="{$added_date4}">{$added_date4}</mark></time></h1>
                                        </header>
                                        
							                                                         <section class="videos">                                                
                                        {if $data4 == "false"} 
                                        
                                        
                                                      <section class="box">
							                        <b> {$added_date4} No Videos found  </b>                                                 
                                                        
                                                </section>
                                                
                                                 {else}
                                                                               
                                        {foreach from=$video_listing4 key=k item=video_data}
                <section class="box">
							                                                        <a href="{$video_data.video_href}" class="video-box"><img src="{$video_data.thumb_img_url}" alt="{$video_data.attr_alt}" width="222" height="125">
                                                        </a>
                                                        <strong class="title">
                                                        <a href="{$video_data.video_href}">{$video_data.video_title}</a>
                                                        </strong>
                                                        <div>
                                                               <span class="pm-video-attr-numbers"><small>{$video_data.views_compact} {$lang.views} / {$video_data.comments_compact} {$lang.comments}</small></span>
                                                        </div>
                                                       
                                                        
                                                </section>
                                                {/foreach}
                                               
                                                         {/if}
                                                
                                                </section>
						
                        {/if} 
                        
                        
                        
                          {$pagination_code} 
                          
                         </section>



                        
                           
                           
                           
                           
                           
                                 <div class="span12" style="text-align:center">

<a id="top"></a>
{if $ad_14 != ''}
<div class="pm-ad-zone" align="center">{$ad_14}</div>
{/if}
</div>
                           
                                </section>
      
      
    
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
{include file='footer.tpl' p="index"} 