<?php /* Smarty version 2.6.20, created on 2015-06-21 19:22:05
         compiled from player.tpl */ ?>
	
	<?php if ($this->_tpl_vars['video_url_get']): ?>
		<div id="Playerholder">
			<noscript>
			You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
			a browser with JavaScript support.
			</noscript>
			<iframe src="<?php echo $this->_tpl_vars['video_url_get']; ?>
" class="col-lg-12 col-md-12 visible-lg visible-md no-padding" height="369" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
      <iframe src="<?php echo $this->_tpl_vars['video_url_get']; ?>
" class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding" height="150" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
     

		</div>





	<?php else: ?>
ddddddddd
		<div id="Playerholder">
			You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
			a browser with JavaScript support.
		</div>
		<?php echo '
		<script type="text/javascript" src="'; ?>
<?php echo @_URL2; ?>
<?php echo '/players/jwplayer6/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="'; ?>
<?php echo $this->_tpl_vars['jwplayerkey']; ?>
<?php echo '";</script>
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
			jwplayer("Playerholder").setup(flashvars);
		</script>
		'; ?>

	


















<?php endif; ?>