<?php /* Smarty version 2.6.20, created on 2015-06-21 19:33:51
         compiled from video-watch.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'echo_securimage_sid', 'video-watch.tpl', 188, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('p' => 'detail','tpl_name' => "video-watch")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container no-padding">
<?php if ($this->_tpl_vars['show_addthis_widget'] == '1'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'widget-addthis.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>
<div class="container">
<div class="row primary-content">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <article class="content col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 10px">
    <div class="content-heading">
        <h1><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</h1>
    </div>
    <div id="video-wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
        <div id="Playerholder" style="float: left;margin-bottom: 10px;">
     <noscript>
     You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
     a browser with JavaScript support.
     </noscript>


	
	<?php if ($this->_tpl_vars['video_url_get']): ?>
		
		
		





	<?php else: ?>

		<?php echo '
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer6/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="'; ?>
<?php echo $this->_tpl_vars['jwplayerkey']; ?>
<?php echo '";</script>
<div id="hero-video">

</div>

		<script type="text/javascript">
			var flashvars = {
					'; ?>

						<?php if ($this->_tpl_vars['video_data']['source_id'] == 0): ?>
							file: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['file']; ?>
',
							streamer: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['streamer']; ?>
',
							<?php echo 'rtmp: {'; ?>

							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['provider'] != ''): ?> provider: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['provider']; ?>
',<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['startparam'] != ''): ?> startparam: '<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['startparam']; ?>
',<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['loadbalance'] != ''): ?> loadbalance: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['loadbalance']; ?>
,<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['subscribe'] != ''): ?> subscribe: <?php echo $this->_tpl_vars['video_data']['jw_flashvars']['subscribe']; ?>
,<?php endif; ?>
							<?php if ($this->_tpl_vars['video_data']['jw_flashvars']['securetoken'] != ''): ?> securetoken: "<?php echo $this->_tpl_vars['video_data']['jw_flashvars']['securetoken']; ?>
",<?php endif; ?>
							},
						<?php elseif ($this->_tpl_vars['video_data']['source_id'] == 1): ?>
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
							//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
							'; ?>

						<?php elseif ($this->_tpl_vars['video_data']['source_id'] == 3): ?>
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['direct']; ?>
<?php echo '\',
							//image: \'//img.youtube.com/vi/'; ?>
<?php echo $this->_tpl_vars['video_data']['yt_id']; ?>
<?php echo '/hqdefault.jpg\',
							'; ?>

						<?php elseif ($this->_tpl_vars['video_data']['source_id'] == 57): ?>
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
							type: \'mp3\',
							//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
						<?php else: ?>		
							<?php echo '
							file: \''; ?>
<?php echo $this->_tpl_vars['video_data']['url_flv']; ?>
<?php echo '\',
							//image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
',
						<?php endif; ?>
						<?php echo '
						flashplayer: "'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer6/jwplayer.flash.swf",                        
						primary: "html5",
						width: "100%",
						'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
						height: "401",
						autostart: true, 
						'; ?>
<?php else: ?><?php echo '
						height: "'; ?>
<?php echo @_PLAYER_H; ?>
<?php echo '",
						autostart: "'; ?>
<?php echo @_AUTOPLAY; ?>
<?php echo '", 
						'; ?>
<?php endif; ?><?php echo '					
						image: \''; ?>
<?php echo $this->_tpl_vars['video_data']['preview_image']; ?>
<?php echo '\',
						stretching: "fill",
						events: {
							'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
							onComplete: function() {
								window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
							},
							'; ?>
<?php endif; ?><?php echo '
							onError: function(object) { 
								ajax_request("video", "do=report&vid='; ?>
<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
<?php echo '&error-message="+ object.message, "", "", false);
								'; ?>
<?php if ($this->_tpl_vars['playlist']): ?><?php echo '
								window.location = "'; ?>
<?php echo $this->_tpl_vars['playlist_next_url']; ?>
<?php echo '";
								'; ?>
<?php endif; ?><?php echo '
							}
						},
						logo: {
							file: \''; ?>
<?php echo @_WATERMARKURL; ?>
<?php echo '\',
							link: \''; ?>
<?php echo @_WATERMARKLINK; ?>
<?php echo '\',
						},
						"tracks": [
						'; ?>
<?php $_from = $this->_tpl_vars['video_subtitles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_subtitles']):
?><?php echo '
							{ file: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['filename']; ?>
<?php echo '", label: "'; ?>
<?php echo $this->_tpl_vars['video_subtitles']['language']; ?>
<?php echo '", kind: "subtitles" },
						'; ?>
<?php endforeach; endif; unset($_from); ?><?php echo '
						]
						};
						'; ?>
<?php echo $this->_tpl_vars['jw_flashvars_override']; ?>
<?php echo '
			jwplayer("hero-video").setup(flashvars);
		</script>
		'; ?>

	


















<?php endif; ?>








     
        </div>
    </div>

    <div class="share-box" style="padding-top:10px;">    

    <div style="overflow:hidden;width:70px;float:left;"> 
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $this->_tpl_vars['facebook_like_href']; ?>
&amp;t=<?php echo $this->_tpl_vars['facebook_like_title']; ?>
" target="_blank"><img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/fbshare3.png" style="opacity:0.98;"></a></div>

    <div style="overflow:hidden;width:95px;float:left;"> 
        <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $this->_tpl_vars['video_data']['video_href_urldecoded']; ?>
&amp;layout=button_count&amp;show_faces=false&amp;width=95&amp;action=like&amp;font=verdana&amp;colorscheme=dark&amp;height=20" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:95px; height:20px;" allowTransparency="true"></iframe></div>

    <div style="overflow:hidden;width:95px;float:left;">
    <a href="https://twitter.com/share" class="twitter-share-button" data-via="hoodclip" data-lang="en" data-hashtags="WSHH" data-url="<?php echo $this->_tpl_vars['video_data']['video_href_urldecoded']; ?>
">Tweet</a>
    <?php echo '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>'; ?>

    </div>


    <div style="overflow:hidden;width:70px;float:left;">
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script> <g:plusone size="medium"></g:plusone>
    </div>


    <a href="#" class="btn-report" title="BROKEN?"  id="pm-vc-report">
        <span>BROKEN?</span>
    </a>
    <strong class="watch-view-count"><?php echo $this->_tpl_vars['video_data']['site_views']; ?>
 views</strong>
    </div>
  <div style="border-bottom:1px solid #e0e0e0; clear:both; margin-bottom:5px;"></div>  
  <div id="pm-vc-report-content" class="hide well well-small alert alert-well col-lg-10 col-md-10 col-sm-10 col-xs-10">
            <div id="report-confirmation" class="hide"></div>
            <form name="reportvideo" action="" method="POST" class="form-inline">
              <input type="hidden" id="name" name="name" class="input-small" value="<?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['s_name']; ?>
<?php endif; ?>">
              <input type="hidden" id="email" name="email" class="input-small" value="<?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['s_email']; ?>
<?php endif; ?>">

              <select name="reason" class="input-medium inp-small">
                <option value="<?php echo $this->_tpl_vars['lang']['report_form1']; ?>
" selected="selected"><?php echo $this->_tpl_vars['lang']['report_form1']; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['lang']['report_form4']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form4']; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['lang']['report_form5']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form5']; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['lang']['report_form6']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form6']; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['lang']['report_form7']; ?>
"><?php echo $this->_tpl_vars['lang']['report_form7']; ?>
</option>
              </select>

              <?php if (! $this->_tpl_vars['logged_in']): ?>
                <input type="text" name="imagetext" class="input-small inp-small" autocomplete="off" placeholder="<?php echo $this->_tpl_vars['lang']['confirm_comment']; ?>
">
                <button class="btn btn-small btn-link" onclick="document.getElementById('securimage-report').src = '<?php echo @_URL; ?>
/include/securimage_show.php?sid=' + Math.random(); return false;"><i class="icon-refresh"></i> </button>
                <img src="<?php echo @_URL; ?>
/include/securimage_show.php?sid=<?php echo smarty_echo_securimage_sid(array(), $this);?>
" id="securimage-report" alt="" class="border-radius3">
              <?php endif; ?>
              <button type="submit" name="Submit" class="btn btn-danger" value="<?php echo $this->_tpl_vars['lang']['submit_send']; ?>
"><?php echo $this->_tpl_vars['lang']['report_video']; ?>
</button>
              <input type="hidden" name="p" value="detail">
              <input type="hidden" name="do" value="report">
              <input type="hidden" name="vid" value="<?php echo $this->_tpl_vars['video_data']['uniq_id']; ?>
">
            </form>
        </div>


  <div class="mask-info">
    <div class="slideset">
        <div class="slide info-slide">
            <div class="information">
                <time class="date" datetime="2015-03-01">Uploaded <?php echo $this->_tpl_vars['date_added']; ?>
</time>
                <div class="text" style="height: auto;padding: 2px 2px">
                    <div class="text-holder">
                        <p><?php echo $this->_tpl_vars['video_data']['excerpt']; ?>
</p>
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
                            <a class="copy-url" data-text="<?php echo @_URL; ?>
/watch.php?vid=<?php echo $this->_tpl_vars['uniq_id']; ?>
" href="#url">
                                <span id="btn-hold" style="position:relative">
                                    <span id="btn-copied" href="#">URL</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#embed" data-text='<?php echo $this->_tpl_vars['embedcode']; ?>
' class="copy-embed">
                            <span id="btn-hold2" style="position:relative">
                                <span id="btn-copied2" href="#">EMBED</span>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="#autoplay" data-text='<?php echo $this->_tpl_vars['embedcode']; ?>
' class="copy-play">
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
<?php echo ' 
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = \'hoodclips\';
    var uniq_id = '; ?>
'<?php echo $this->_tpl_vars['uniq_id']; ?>
'<?php echo ';
    //var disqus_identifier = uniq_id;
    //var disqus_url = \'http://localhost/joshua/watch.php?vid=\'+uniq_id;
    var disqus_url = \'http://www.hoodclips.net/joshua/watch.php?vid=\'+uniq_id;
        
    /* * * DON\'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
        dsq.src = \'//\' + disqus_shortname + \'.disqus.com/embed.js\';
        (document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
    })();
</script>
  '; ?>



<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>
</noscript>

  

<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
   
 </article>
</div>
<!-- Recomanded vide area -->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 vd-recomanded-cnt visible-lg visible-md">
    <noscript>
    You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
    a browser with JavaScript support.
    </noscript>
    <div class="row">
    <article class="content">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 recomanded-vhead">
            RECOMMENDED <mark>VIDEOS</mark>
        </div>
        <div class="clear"></div>
        <?php if (isset ( $this->_tpl_vars['top_video_data'] ) && is_array ( $this->_tpl_vars['top_video_data'] )): ?>
            <?php $_from = $this->_tpl_vars['top_video_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
                <?php if ($this->_tpl_vars['row']['uniq_id'] != $this->_tpl_vars['video_unique_id']): ?>
                    <?php $this->assign('uid', $this->_tpl_vars['row']['uniq_id']); ?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">      
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div id="Playerholder" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">
                    <a href="watch.php?vid=<?php echo $this->_tpl_vars['row']['uniq_id']; ?>
">
                        <img src="<?php echo $this->_tpl_vars['row']['yt_thumb']; ?>
" width="100%" height="80" alt=""/>
                    </a>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 no-padding">
                  <label> <a href="watch.php?vid=<?php echo $this->_tpl_vars['row']['uniq_id']; ?>
"><?php echo $this->_tpl_vars['row']['video_title']; ?>
</a></label><br/>
                 <label><small><?php echo $this->_tpl_vars['row']['site_views']; ?>
 views</small></label>
              </div>
              <div class="clear"></div>
              </div>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </article>
    </div>
</div>

  </div>


   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

  </div>

  <!-- .row-fluid -->
</div><!-- .container-fluid -->
<div class="clear-fix" style="margin-bottom: 10px"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array('p' => 'detail','tpl_name' => "video-watch")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>