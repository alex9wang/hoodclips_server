<a id="back-top" class="hidden-phone hidden-tablet" title="{$lang.top}">
    <i class="icon-chevron-up"></i>
    <span></span>
</a>
<footer>
<div class="container-fluid">
    <div class="container">
    <div class="row ftr-links">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <ul>
               <li><a href="{$smarty.const._URL}/page.php?name=privacy-policy">Privacy</a></li>
               <li><a href="{$smarty.const._URL}/page.php?name=terms">Terms</a></li>
               <li><a href="{$smarty.const._URL}/page.php?name=dmca">DMCA</a></li>
               <li><a href="{$smarty.const._URL}/submit_video.php">Submit Video</a></li>
           </ul>
        </div>
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        {if $smarty.const._POWEREDBY == 1}{$lang.powered_by}<br />{/if}
        &copy; {$smarty.now|date_format:'%Y'} {$smarty.const._SITENAME}. {$lang.rights_reserved}
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:right;">
         <div id="lang_selector">
            <div class="btn-group dropup lang-selector hidden-phone" id="lang-selector">
               {if count($langs_array) > 0}
               <div id="lang_selector">
                <div class="btn-group dropup lang-selector hidden-phone" id="lang-selector">
                <a class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{$langs_array.$current_lang_id.ico}" width="16" height="10" alt="{$langs_array.$current_lang_id.title}" title="{$langs_array.$current_lang_id.title}" align="texttop"> <span class="hide">{$langs_array.$current_lang_id.title}</span> <span class="caret"></span></a>

                <ul class="dropdown-menu border-radius0 pullleft lang_submenu">
                {foreach from=$langs_array item=lang key=k}
                 {if $k != $current_lang_id}
                 <li><a href="#" title="{$lang.title}" name="{$k}" id="lang_select_{$k}">{$lang.title}</a></li>
                 {/if}
                {/foreach}
                </ul>
               </div>
               </div>
                {/if}
              </div>
          </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-logo">
        <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p style="text-align:center;margin-top:20px;">
            <img class="img-responsive" src="uploads/{$footer_logo}" alt="">
        </p>
        </div>
    </div>
    </div>
    </div>
    
</div> 
</footer>
{literal}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.cookee.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.validate.min.js" type="text/javascript"></script>
{/literal}
{if $p == "index"}
{literal}
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.carouFredSel.min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.touchwipe.min.js" type="text/javascript"></script>
{/literal}
{/if}
{literal}
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.ba-dotimeout.min.js" type="text/javascript"></script>
{/literal}{if $tpl_name == "upload"}{literal}
<script src="{/literal}{$smarty.const._URL}{literal}/js/swfupload.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}{literal}/js/swfupload.queue.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}{literal}/js/jquery.swfupload.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}{literal}/js/upload.js" type="text/javascript"></script>
{/literal}{/if}
{if $smarty.const._SEARCHSUGGEST == 1}{literal}
<script src="{/literal}{$smarty.const._URL}{literal}/js/jquery.typewatch.js" type="text/javascript"></script>
{/literal}{/if}{literal}
<script src="{/literal}{$smarty.const._URL}{literal}/js/melody.dev.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/melody.dev.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/lightbox.min.js" type="text/javascript"></script>
{/literal}

{if $smarty.const._SEARCHSUGGEST == 1}
{literal}
<script type="text/javascript">
$(document).ready(function () {
		// live search 
		$('#appendedInputButton').typeWatch({
			callback: function() {
					var a = $('#appendedInputButton').val();
					
					$.ajax({
						type: "POST",
			            url: MELODYURL2 + "/ajax_search.php",
			            data: {
							"queryString": a
			            },
			            dataType: "html",
			            success: function(b){
							if (b.length > 0) {
			                    $("#suggestions").show();
			                } else {
								$("#suggestions").hide();
							}
							$("#autoSuggestionsList").html(b);		
						}
					});
				},
		    	wait: 400,
		    	highlight: true,
		    	captureLength: 3
		});
});
</script>
{/literal}
{/if}


{if $p == "detail" && $playlist}
{literal}
<script type="text/javascript">
$(document).ready(function () {
	$('.pm-video-playlist').animate({
	    scrollTop: $('.pm-video-playlist-playing').offset().top - $('.pm-video-playlist').offset().top + $('.pm-video-playlist').scrollTop()
	});
});
</script>
{/literal}
{/if}
{if $p == "detail"}
{literal}
<script type="text/javascript">
$(document).ready(function () {
		var pm_elastic_player = $.cookie('pm_elastic_player');
		if (pm_elastic_player == null) {
			$.cookie('pm_elastic_player', 'normal');
		}
		else if (pm_elastic_player == 'wide') {
			$('#player_extend').find('i').addClass('icon-resize-small');
			$('#secondary').addClass('secondary-wide');
			$('#video-wrapper').addClass('video-wrapper-wide');
			$('.pm-video-head').addClass('pm-video-head-wide');
			$('.entry-title').addClass('ellipsis');
		} else {
			$('#secondary').removeClass('secondary-wide');
			$('#video-wrapper').removeClass('video-wrapper-wide');
			$('.pm-video-head-wide').removeClass('pm-video-head-wide');
			$('.entry-title').removeClass('ellipsis');
		}

	$("#player_extend").click(function() {	
		if ($(this).find('i').hasClass("icon-resize-full")) {
			$(this).find('i').removeClass("icon-resize-full").addClass("icon-resize-small");
		} else {
			$(this).find('i').removeClass("icon-resize-small").addClass("icon-resize-full");
		}
		$('#secondary').animate({
			}, 10, function() {
				$('#secondary').toggleClass("secondary-wide");
		});
		$('#video-wrapper').animate({
			}, 150, function() {
				$('#video-wrapper').toggleClass("video-wrapper-wide");
				$('.pm-video-head').toggleClass('pm-video-head-wide');
		});
		if ($.cookie('pm_elastic_player') == 'normal') {
			$.cookie('pm_elastic_player','wide');
			$('#player_extend').find('i').removeClass('icon-resize-full').addClass('icon-resize-small');
		} else {
			$.cookie('pm_elastic_player', 'normal');
			$('#player_extend').find('i').removeClass('icon-resize-small').addClass('icon-resize-full');
		}
	return false;
  });
});
</script>
{/literal}
{/if}
{if $p == "index"}
{literal}
<script type="text/javascript">
$(document).ready(function() {
	$("#pm-ul-wn-videos").carouFredSel({
		items				: 4,
		circular			: false,
		direction			: "left",
		height				: null,
		width       		: null,
		infinite			: false,
		responsive			: true,
		prev	: {	
			button	: "#pm-slide-prev",
			key		: "left"
		},
		next	: { 
			button	: "#pm-slide-next",
			key		: "right"
		},
	scroll		: {
		items			: null,		//	items.visible
		fx				: "scroll",
		easing			: "swing",
		duration		: 500,
		wipe			: true,
		event			: "click"
	},
	auto: false
				
	});	
});

$(document).ready(function() {
	$("#pm-ul-top-videos").carouFredSel({
	items: 5,
	direction: "up",
	width: "variable",
	height:  "variable",
	circular: false,
	infinite: false,
	scroll: {
		fx: "fade",
		event: "click",
		wipe: true,
		duration: 150
	},
	auto: false,
		prev	: {	
			button	: "#pm-slide-top-prev",
			key		: "left"
		},
		next	: { 
			button	: "#pm-slide-top-next",
			key		: "right"
		}
	});	
});
</script>
{/literal}
{/if}
{if ! $logged_in}
    {literal}
    <script type="text/javascript">
    
        $('#header-login-form').on('shown', function () {
            $('.hocusfocus').focus();
        });
    
    </script>
    {/literal}
{/if}
{if $smarty.const._MOD_SOCIAL == '1'}
{literal}
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/waypoints.min.js" type="text/javascript"></script>
<script src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/melody.social.min.js" type="text/javascript"></script> 
{/literal}
{/if}

{if $display_preroll_ad == true}
{literal}
<script src="{/literal}{$smarty.const._URL}{literal}/js/jquery.timer.min.js" type="text/javascript"></script>
<script type="text/javascript">

function timer_pad(number, length) {
	var str = '' + number;
	while (str.length < length) {str = '0' + str;}
	return str;
}

var preroll_timer;
var preroll_player_called = false;
var skippable = {/literal}{if $preroll_ad_data.skip != 1}0;{else}1{/if}{literal}; 
var skippable_timer_current = {/literal}{if $preroll_ad_data.skip_delay_seconds}{$preroll_ad_data.skip_delay_seconds}{else}0{/if}{literal} * 1000;
var preroll_disable_stats = {/literal}{if $preroll_ad_data.disable_stats == 1}1;{else}0{/if}{literal};
	
$(document).ready(function(){
	if (skippable == 1) {
		$('#preroll_skip_btn').hide();
	}
	
	var preroll_timer_current = {/literal}'{$preroll_ad_data.duration}'{literal} * 1000;
	
	preroll_timer = $.timer(function(){
	
		var seconds = parseInt(preroll_timer_current / 1000);
		var hours = parseInt(seconds / 3600);
		var minutes = parseInt((seconds / 60) % 60);
		var seconds = parseInt(seconds % 60);
		
		var output = "00";
		if (hours > 0) {
			output = timer_pad(hours, 2) +":"+ timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
		} else if (minutes > 0) { 
			output = timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
		} else {
			output = timer_pad(seconds, 1);
		}
		
		$('.preroll_timeleft').html(output);
		
		if (preroll_timer_current == 0 && preroll_player_called == false) {

			$.ajax({
		        type: "GET",
		        url: MELODYURL2 + "/ajax.php",
				dataType: "html",
		        data: {
					"p": "video",
					"do": "getplayer",
					"vid": "{/literal}{$preroll_ad_player_uniq_id}{literal}",
					"aid": "{/literal}{$preroll_ad_data.id}{literal}",
					"player": "{/literal}{$preroll_ad_player_page}{literal}",
					"playlist": "{/literal}{$playlist.list_uniq_id}{literal}"
		        },
		        dataType: "html",
		        success: function(data){
					$('#preroll_placeholder').replaceWith(data);
		        }
			});
			
			preroll_player_called = true;
			preroll_timer.stop();
		} else {
			preroll_timer_current -= 1000;
			if(preroll_timer_current < 0) {
				preroll_timer_current = 0;
			}
		}
	}, 1000, true);
	
	if (skippable == 1) {
		
		skippable_timer = $.timer(function(){
	
			var seconds = parseInt(skippable_timer_current / 1000);
			var hours = parseInt(seconds / 3600);
			var minutes = parseInt((seconds / 60) % 60);
			var seconds = parseInt(seconds % 60);
			
			var output = "00";
			if (hours > 0) {
				output = timer_pad(hours, 2) +":"+ timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
			} else if (minutes > 0) { 
				output = timer_pad(minutes, 2) +":"+ timer_pad(seconds, 2);
			} else {
				output = timer_pad(seconds, 1);
			}
			
			$('.preroll_skip_timeleft').html(output);
			
			if (skippable_timer_current == 0 && preroll_player_called == false) {
				$('#preroll_skip_btn').show();
				$('.preroll_skip_countdown').hide();
				skippable_timer.stop();
			} else {
				skippable_timer_current -= 1000;
				if(skippable_timer_current < 0) {
					skippable_timer_current = 0;
				}
			}
		}, 1000, true);
		
		$('#preroll_skip_btn').click(function(){
			preroll_timer_current = 0;
			skippable_timer_current = 0;

			if (preroll_disable_stats == 0) {
				$.ajax({
			        type: "GET",
			        url: MELODYURL2 + "/ajax.php",
					dataType: "html",
			        data: {
						"p": "stats",
						"do": "skip",
						"aid": "{/literal}{$preroll_ad_data.id}{literal}",
						"at": "{/literal}{$smarty.const._AD_TYPE_PREROLL}{literal}"
			        },
			        dataType: "html",
			        success: function(data){}
				});
			}
			return false;
		});
	}
});
</script>
{/literal}
{/if}
{literal}
<script type="text/javascript" src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.main.js"></script>
<script type="text/javascript" src="{/literal}{$smarty.const._URL}/templates/{$template_dir}{literal}/js/jquery.fancybox.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	$(".front-featured").fancybox({
		maxWidth	: 990,
		maxHeight	: 585,
		fitToView	: false,
		padding: 0,
		width		: '100%',
		height		: '100%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		helpers: {
    overlay: {
      locked: false
    }
  }
	});
});
	</script>

{/literal}
{$smarty.const._HTMLCOUNTER}
</body>
</html>