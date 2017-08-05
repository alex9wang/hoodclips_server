	
	{if $video_url_get}
		<div id="Playerholder">
			<noscript>
			You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
			a browser with JavaScript support.
			</noscript>
			<iframe src="{$video_url_get}" class="col-lg-12 col-md-12 visible-lg visible-md no-padding" height="369" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
      <iframe src="{$video_url_get}" class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding" height="150" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
     

		</div>





	{else}
ddddddddd
		<div id="Playerholder">
			You need to have the <a href="http://www.macromedia.com/go/getflashplayer">Flash Player</a> installed and
			a browser with JavaScript support.
		</div>
		{literal}
		<script type="text/javascript" src="{/literal}{$smarty.const._URL2}{literal}/players/jwplayer6/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="{/literal}{$jwplayerkey}{literal}";</script>
		<script type="text/javascript">
			var flashvars = {
					{/literal}
						{if $video_data.source_id == 0}
							file: '{$video_data.jw_flashvars.file}',
							streamer: '{$video_data.jw_flashvars.streamer}',
							{literal}rtmp: {{/literal}
							{if $video_data.jw_flashvars.provider != ''} provider: '{$video_data.jw_flashvars.provider}',{/if}
							{if $video_data.jw_flashvars.startparam != ''} startparam: '{$video_data.jw_flashvars.startparam}',{/if}
							{if $video_data.jw_flashvars.loadbalance != ''} loadbalance: {$video_data.jw_flashvars.loadbalance},{/if}
							{if $video_data.jw_flashvars.subscribe != ''} subscribe: {$video_data.jw_flashvars.subscribe},{/if}
							{if $video_data.jw_flashvars.securetoken != ''} securetoken: "{$video_data.jw_flashvars.securetoken}",{/if}
							},
						{elseif $video_data.source_id == 1}
							{literal}
							file: '{/literal}{$video_data.url_flv}{literal}',
							//image: '{/literal}{$video_data.preview_image}{literal}',
							{/literal}
						{elseif $video_data.source_id == 3}
							{literal}
							file: '{/literal}{$video_data.direct}{literal}',
							//image: '//img.youtube.com/vi/{/literal}{$video_data.yt_id}{literal}/hqdefault.jpg',
							{/literal}
						{elseif $video_data.source_id == 57}
							{literal}
							file: '{/literal}{$video_data.url_flv}{literal}',
							type: 'mp3',
							//image: '{/literal}{$video_data.preview_image}',
						{else}		
							{literal}
							file: '{/literal}{$video_data.url_flv}{literal}',
							//image: '{/literal}{$video_data.preview_image}',
						{/if}
						{literal}
						flashplayer: "{/literal}{$smarty.const._URL2}{literal}/players/jwplayer6/jwplayer.flash.swf",                        
						primary: "html5",
						width: "100%",
						{/literal}{if $playlist}{literal}
						height: "401",
						autostart: true, 
						{/literal}{else}{literal}
						height: "{/literal}{$smarty.const._PLAYER_H}{literal}",
						autostart: "{/literal}{$smarty.const._AUTOPLAY}{literal}", 
						{/literal}{/if}{literal}					
						image: '{/literal}{$video_data.preview_image}{literal}',
						stretching: "fill",
						events: {
							{/literal}{if $playlist}{literal}
							onComplete: function() {
								window.location = "{/literal}{$playlist_next_url}{literal}";
							},
							{/literal}{/if}{literal}
							onError: function(object) { 
								ajax_request("video", "do=report&vid={/literal}{$video_data.uniq_id}{literal}&error-message="+ object.message, "", "", false);
								{/literal}{if $playlist}{literal}
								window.location = "{/literal}{$playlist_next_url}{literal}";
								{/literal}{/if}{literal}
							}
						},
						logo: {
							file: '{/literal}{$smarty.const._WATERMARKURL}{literal}',
							link: '{/literal}{$smarty.const._WATERMARKLINK}{literal}',
						},
						"tracks": [
						{/literal}{foreach from=$video_subtitles key=k item=video_subtitles}{literal}
							{ file: "{/literal}{$video_subtitles.filename}{literal}", label: "{/literal}{$video_subtitles.language}{literal}", kind: "subtitles" },
						{/literal}{/foreach}{literal}
						]
						};
						{/literal}{$jw_flashvars_override}{literal}
			jwplayer("Playerholder").setup(flashvars);
		</script>
		{/literal}
	


















{/if}
