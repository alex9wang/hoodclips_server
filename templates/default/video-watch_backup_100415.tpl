{include file="header.tpl" p="detail" tpl_name="video-watch"}
<div id="wrapper">
{if $show_addthis_widget == '1'}
{include file='widget-addthis.tpl'}
{/if}
<div class="container-fluid">

<div class="row-fluid">
<div class="span8">
   <article class="content">
    <div class="content-heading">
        <h1>{$video_data.video_title}</h1>
    </div>
    <div id="video-wrapper">
    <div id="Playerholder">
     <noscript>
     You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
     a browser with JavaScript support.
     </noscript>
     <iframe src="{$video_url_get}" width="500" height="369" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
     </div>
    </div>

    <div class="share-box" style="padding-top:10px">    

    <div style="overflow:hidden;width:70px;float:left; margin-top:-2px"> <a href="https://www.facebook.com/sharer/sharer.php?u={$facebook_like_href}&amp;t={$facebook_like_title}" target="_blank"><img src="{$smarty.const._URL}/templates/{$template_dir}/img/fbshare3.png" style="opacity:0.98;"></a></div>

    <div style="overflow:hidden;width:95px;float:left;"> <iframe src="http://www.facebook.com/plugins/like.php?href={$video_data.video_href_urldecoded}&amp;layout=button_count&amp;show_faces=false&amp;width=95&amp;action=like&amp;font=verdana&amp;colorscheme=dark&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:20px;" allowTransparency="true"></iframe></div>

    <div style="overflow:hidden;width:95px;float:left;">
    <a href="https://twitter.com/share" class="twitter-share-button" data-via="hoodclip" data-lang="en" data-hashtags="WSHH" data-url="{$video_data.video_href_urldecoded}">Tweet</a>
    {literal}<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>{/literal}
    </div>


    <div style="overflow:hidden;width:70px;float:left;">
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script> <g:plusone size="medium"></g:plusone>
    </div>


    <a href="#" class="btn-report" title="BROKEN?"  id="pm-vc-report"><span>BROKEN?</span></a>


    <strong class="watch-view-count">{$video_data.site_views} views</strong>

    </div>
  <div style="border-bottom:1px solid #e0e0e0; clear:both; margin-bottom:5px;"></div>  
  <div id="pm-vc-report-content" class="hide well well-small alert alert-well span10">
            <div id="report-confirmation" class="hide"></div>
            <form name="reportvideo" action="" method="POST" class="form-inline">
              <input type="hidden" id="name" name="name" class="input-small" value="{if $logged_in}{$s_name}{/if}">
              <input type="hidden" id="email" name="email" class="input-small" value="{if $logged_in}{$s_email}{/if}">

              <select name="reason" class="input-medium inp-small">
                <option value="{$lang.report_form1}" selected="selected">{$lang.report_form1}</option>
                <option value="{$lang.report_form4}">{$lang.report_form4}</option>
                <option value="{$lang.report_form5}">{$lang.report_form5}</option>
                <option value="{$lang.report_form6}">{$lang.report_form6}</option>
                <option value="{$lang.report_form7}">{$lang.report_form7}</option>
              </select>

              {if ! $logged_in}
                <input type="text" name="imagetext" class="input-small inp-small" autocomplete="off" placeholder="{$lang.confirm_comment}">
                <button class="btn btn-small btn-link" onclick="document.getElementById('securimage-report').src = '{$smarty.const._URL}/include/securimage_show.php?sid=' + Math.random(); return false;"><i class="icon-refresh"></i> </button>
                <img src="{$smarty.const._URL}/include/securimage_show.php?sid={echo_securimage_sid}" id="securimage-report" alt="" class="border-radius3">
              {/if}
              <button type="submit" name="Submit" class="btn btn-danger" value="{$lang.submit_send}">{$lang.report_video}</button>
              <input type="hidden" name="p" value="detail">
              <input type="hidden" name="do" value="report">
              <input type="hidden" name="vid" value="{$video_data.uniq_id}">
            </form>
        </div>


  <div class="mask-info">
    <div class="slideset">
        <div class="slide info-slide">
            <div class="information">
                <time class="date" datetime="2015-03-01">Uploaded {$date_added}</time>
                <div class="text" style="height: 67px;padding: 10px 2px">
                    <div class="text-holder">
                        <p>{$video_data.excerpt}</p>
                    </div>
                </div>
                <div class="btn-holder"></div>
            </div>
        </div>
    </div>
</div>


<div class="watch-actions-share-panel slide-panel span12" data-iframe="#video-block">
<div class="panels-holder" style="margin-left: 0px;">
        <div class="actions-row">
                <ul class="panel-buttons">
                        <li>
                            <a class="copy-url" data-text="{$smarty.const._URL}/watch.php?vid={$uniq_id}" href="#url">
                                <span id="btn-hold" style="position:relative">
                                    <span id="btn-copied" href="#">URL</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#embed" data-text='{$embedcode}' class="copy-embed">
                            <span id="btn-hold2" style="position:relative">
                                <span id="btn-copied2" href="#">EMBED</span>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#autoplay" data-text='{$embedcode}' class="copy-play">
                                <span id="btn-hold3" style="position:relative">
                                    <span id="btn-copied3" href="#">AUTOPLAY</span>
                                </span>
                            </a>
                        </li>
                </ul>
                <div class="panel-container">
                        <p class="msg">Embedding Options <mark>(Click to copy)</mark></p>
                        <span class="text"><input type="hidden" id="clip_text" value=""></span>
                </div>
        </div>
        <div class="share-panel-slide">
                <form action="./video_files/video.html">
                        <fieldset>
                                <div class="panel-container">
                                <a class="input-link" href="./video_files/video.html">Click to copy the embed code</a>
                                <div style="position: absolute; left: 0px; top: 7px; width: 198px; height: 16px; z-index: 99;"><embed id="ZeroClipboardMovie_1" src="http://hoodclips.com/videos/js/ZeroClipboard.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="198" height="16" name="ZeroClipboardMovie_1" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=1&amp;width=198&amp;height=16" wmode="transparent"></div></div>
                                <div class="input-holder"><input type="text" id="url-field" value="" class=""><div style="position: absolute; left: 0px; top: 0px; width: 374px; height: 39px; z-index: 99;"><embed id="ZeroClipboardMovie_2" src="http://hoodclips.com/videos/js/ZeroClipboard.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="374" height="39" name="ZeroClipboardMovie_2" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=2&amp;width=374&amp;height=39" wmode="transparent"></div></div>
                                <a href="./video_files/video.html" class="close">Close</a>
                        </fieldset>
                </form>
        </div>
</div>
<span class="alert-copied" style="display:none;">COPIED!</span>





   <div class="regulation_1 span12">Comments will only be displayed by verified emails.  No Spamming or Racism.</div>
   </div>

<div id="disqus_thread"></div>
{literal} 
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'hoodclips';
    var uniq_id = {/literal}'{$uniq_id}'{literal};
    //var disqus_identifier = uniq_id;
    //var disqus_url = 'http://localhost/joshua/watch.php?vid='+uniq_id;
    var disqus_url = 'http://www.hoodclips.net/joshua/watch.php?vid='+uniq_id;
        
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
  {/literal}


<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>
</noscript>

  

<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
   
 </article>
</div>
<!-- Recomanded vide area -->
<div class="span4 vd-recomanded-cnt">
    <noscript>
    You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
    a browser with JavaScript support.
    </noscript>
    <article class="content">
    <div class="row-fluid">
        <div class="span12 recomanded-vhead">
            RECOMMENDED <mark>VIDEOS</mark>
        </div>
        {if isset($top_video_data) && is_array($top_video_data)}
            {foreach from = $top_video_data item = row}
                {if $row.uniq_id != $video_unique_id}
                    {assign var = "uid" value = $row.uniq_id}
              <div class="span6">
                <div id="Playerholder" class="span12" style="margin-bottom: 10px;">
                    <!--
                        <iframe class="round-corner-vd" src="{$top_video_embed_data.$uid}" width="100%" height="80" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                    -->
                    <a href="watch.php?vid={$row.uniq_id}">
                        <img src="{$row.yt_thumb}" width="100%" height="80" alt=""/>
                    </a>
                </div>
              </div>
              <div class="span5">
                  <label> <a href="watch.php?vid={$row.uniq_id}">{$row.video_title | truncate:20}</a></label><br/>
                 <label><small>{$row.site_views} views</small></label>
              </div>
              <div class="clear"></div>
                {/if}
            {/foreach}
        {/if}
    </div>
    </article>
</div>

  </div>


   <div class="span2">

  </div>

  <!-- .row-fluid -->
</div><!-- .container-fluid -->
{include file="footer.tpl" p="detail" tpl_name="video-watch"}