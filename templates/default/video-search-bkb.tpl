{include file='header.tpl' p="general"} 
<div id="wrapper">
    <div class="container-fluid" style="margin-left:-20px; margin-right:0">
      <div class="row-fluid" style="margin-top:-20px;">		
		<section class="video-results" >
					<header class="heading" style="padding:0px">
						<form action="search.php" class="filter2-form" method="GET">
							<fieldset>
                            
                           
 <select class="filter2 results" {if $filter == ''}title="Filter results"{/if} name="filter" onchange="this.form.submit()">
                                  
           
           {if $filter == 'Most Viewed'}<option>Most Viewed</option>{/if} 
           {if $filter == 'Newest'}<option>Newest</option>{/if}
           {if $filter == 'Oldest'}<option>Oldest</option>{/if}       
          <option>Best Match</option>
          {if $filter != 'Most Viewed'}<option>Most Viewed</option>{/if}
          {if $filter != 'Newest'}<option>Newest</option>{/if}
          {if $filter != 'Oldest'}<option>Oldest</option>{/if}
     
 </select>							<input type="hidden" name="keywords" value="{$search}">
							</fieldset>
						</form>

						<h1>“{$search}”  <mark>{$total_videos} VIDEOS</mark></h1>
					</header>
        
        
        
<section class="videos" style="border-bottom:none;">                                                
                                                                                       
                                                                               
                                        {foreach from=$Search_Data key=k item=video_data}

                

<section class="box">
                <span class="date">Uploaded <time>{$video_data.added_date}</time></span>
               
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
                                               
                                                        
                                                
                                                </section>
						
          </section>

			{$pagination_code}
		
		
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
{include file='footer.tpl'}
