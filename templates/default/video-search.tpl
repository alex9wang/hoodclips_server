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
        
        
        
<section class="videos primary-content" style="border-bottom:none;width:100%">                                                
                                                                                       
                                                                               
                                        {foreach from=$Search_Data key=k item=video_data}

                

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
                                <span class="col-sm-12 col-xs-12 ">
                                    <small>{$video_data.views_compact} {$lang.views}</small>
                                </span>
                            </div>
                        </div>
                    </section>
                    {if $count is div by 4}
                        <div class="clearfix"></div>
                    {/if}




                                                {/foreach}
                                               
                                                        
                                                
                                                </section>
						
          </section>

			{$pagination_code}
		
		
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
{include file='footer.tpl'}
