<?php /* Smarty version 2.6.20, created on 2015-05-19 16:43:22
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'footer.tpl', 19, false),)), $this); ?>
<a id="back-top" class="hidden-phone hidden-tablet" title="<?php echo $this->_tpl_vars['lang']['top']; ?>
">
    <i class="icon-chevron-up"></i>
    <span></span>
</a>
<footer>
<div class="container-fluid">
    <div class="container">
    <div class="row ftr-links">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <ul>
               <li><a href="<?php echo @_URL; ?>
/page.php?name=privacy-policy">Privacy</a></li>
               <li><a href="<?php echo @_URL; ?>
/page.php?name=terms">Terms</a></li>
               <li><a href="<?php echo @_URL; ?>
/page.php?name=dmca">DMCA</a></li>
               <li><a href="<?php echo @_URL; ?>
/submit_video.php">Submit Video</a></li>
           </ul>
        </div>
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <?php if (@_POWEREDBY == 1): ?><?php echo $this->_tpl_vars['lang']['powered_by']; ?>
<br /><?php endif; ?>
        &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
 <?php echo @_SITENAME; ?>
. <?php echo $this->_tpl_vars['lang']['rights_reserved']; ?>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:right;">
         <div id="lang_selector">
            <div class="btn-group dropup lang-selector hidden-phone" id="lang-selector">
               <?php if (count ( $this->_tpl_vars['langs_array'] ) > 0): ?>
               <div id="lang_selector">
                <div class="btn-group dropup lang-selector hidden-phone" id="lang-selector">
                <a class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="<?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['ico']; ?>
" width="16" height="10" alt="<?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['title']; ?>
" title="<?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['title']; ?>
" align="texttop"> <span class="hide"><?php echo $this->_tpl_vars['langs_array'][$this->_tpl_vars['current_lang_id']]['title']; ?>
</span> <span class="caret"></span></a>

                <ul class="dropdown-menu border-radius0 pullleft lang_submenu">
                <?php $_from = $this->_tpl_vars['langs_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['lang']):
?>
                 <?php if ($this->_tpl_vars['k'] != $this->_tpl_vars['current_lang_id']): ?>
                 <li><a href="#" title="<?php echo $this->_tpl_vars['lang']['title']; ?>
" name="<?php echo $this->_tpl_vars['k']; ?>
" id="lang_select_<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['lang']['title']; ?>
</a></li>
                 <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                </ul>
               </div>
               </div>
                <?php endif; ?>
              </div>
          </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-logo">
        <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <p style="text-align:center;margin-top:20px;">
            <img class="img-responsive" src="uploads/<?php echo $this->_tpl_vars['footer_logo']; ?>
" alt="">
        </p>
        </div>
    </div>
    </div>
    </div>
    
</div> 
</footer>
<?php echo '
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/bootstrap.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.cookee.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.validate.min.js" type="text/javascript"></script>
'; ?>

<?php if ($this->_tpl_vars['p'] == 'index'): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.carouFredSel.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.touchwipe.min.js" type="text/javascript"></script>
'; ?>

<?php endif; ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.tagsinput.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.uniform.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.ba-dotimeout.min.js" type="text/javascript"></script>
'; ?>
<?php if ($this->_tpl_vars['tpl_name'] == 'upload'): ?><?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/swfupload.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/swfupload.queue.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/jquery.swfupload.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/upload.js" type="text/javascript"></script>
'; ?>
<?php endif; ?>
<?php if (@_SEARCHSUGGEST == 1): ?><?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/jquery.typewatch.js" type="text/javascript"></script>
'; ?>
<?php endif; ?><?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/melody.dev.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/melody.dev.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/lightbox.min.js" type="text/javascript"></script>
'; ?>


<?php if (@_SEARCHSUGGEST == 1): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function () {
		// live search 
		$(\'#appendedInputButton\').typeWatch({
			callback: function() {
					var a = $(\'#appendedInputButton\').val();
					
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
'; ?>

<?php endif; ?>


<?php if ($this->_tpl_vars['p'] == 'detail' && $this->_tpl_vars['playlist']): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function () {
	$(\'.pm-video-playlist\').animate({
	    scrollTop: $(\'.pm-video-playlist-playing\').offset().top - $(\'.pm-video-playlist\').offset().top + $(\'.pm-video-playlist\').scrollTop()
	});
});
</script>
'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['p'] == 'detail'): ?>
<?php echo '
<script type="text/javascript">
$(document).ready(function () {
		var pm_elastic_player = $.cookie(\'pm_elastic_player\');
		if (pm_elastic_player == null) {
			$.cookie(\'pm_elastic_player\', \'normal\');
		}
		else if (pm_elastic_player == \'wide\') {
			$(\'#player_extend\').find(\'i\').addClass(\'icon-resize-small\');
			$(\'#secondary\').addClass(\'secondary-wide\');
			$(\'#video-wrapper\').addClass(\'video-wrapper-wide\');
			$(\'.pm-video-head\').addClass(\'pm-video-head-wide\');
			$(\'.entry-title\').addClass(\'ellipsis\');
		} else {
			$(\'#secondary\').removeClass(\'secondary-wide\');
			$(\'#video-wrapper\').removeClass(\'video-wrapper-wide\');
			$(\'.pm-video-head-wide\').removeClass(\'pm-video-head-wide\');
			$(\'.entry-title\').removeClass(\'ellipsis\');
		}

	$("#player_extend").click(function() {	
		if ($(this).find(\'i\').hasClass("icon-resize-full")) {
			$(this).find(\'i\').removeClass("icon-resize-full").addClass("icon-resize-small");
		} else {
			$(this).find(\'i\').removeClass("icon-resize-small").addClass("icon-resize-full");
		}
		$(\'#secondary\').animate({
			}, 10, function() {
				$(\'#secondary\').toggleClass("secondary-wide");
		});
		$(\'#video-wrapper\').animate({
			}, 150, function() {
				$(\'#video-wrapper\').toggleClass("video-wrapper-wide");
				$(\'.pm-video-head\').toggleClass(\'pm-video-head-wide\');
		});
		if ($.cookie(\'pm_elastic_player\') == \'normal\') {
			$.cookie(\'pm_elastic_player\',\'wide\');
			$(\'#player_extend\').find(\'i\').removeClass(\'icon-resize-full\').addClass(\'icon-resize-small\');
		} else {
			$.cookie(\'pm_elastic_player\', \'normal\');
			$(\'#player_extend\').find(\'i\').removeClass(\'icon-resize-small\').addClass(\'icon-resize-full\');
		}
	return false;
  });
});
</script>
'; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['p'] == 'index'): ?>
<?php echo '
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
'; ?>

<?php endif; ?>
<?php if (! $this->_tpl_vars['logged_in']): ?>
    <?php echo '
    <script type="text/javascript">
    
        $(\'#header-login-form\').on(\'shown\', function () {
            $(\'.hocusfocus\').focus();
        });
    
    </script>
    '; ?>

<?php endif; ?>
<?php if (@_MOD_SOCIAL == '1'): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/waypoints.min.js" type="text/javascript"></script>
<script src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/melody.social.min.js" type="text/javascript"></script> 
'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['display_preroll_ad'] == true): ?>
<?php echo '
<script src="'; ?>
<?php echo @_URL; ?>
<?php echo '/js/jquery.timer.min.js" type="text/javascript"></script>
<script type="text/javascript">

function timer_pad(number, length) {
	var str = \'\' + number;
	while (str.length < length) {str = \'0\' + str;}
	return str;
}

var preroll_timer;
var preroll_player_called = false;
var skippable = '; ?>
<?php if ($this->_tpl_vars['preroll_ad_data']['skip'] != 1): ?>0;<?php else: ?>1<?php endif; ?><?php echo '; 
var skippable_timer_current = '; ?>
<?php if ($this->_tpl_vars['preroll_ad_data']['skip_delay_seconds']): ?><?php echo $this->_tpl_vars['preroll_ad_data']['skip_delay_seconds']; ?>
<?php else: ?>0<?php endif; ?><?php echo ' * 1000;
var preroll_disable_stats = '; ?>
<?php if ($this->_tpl_vars['preroll_ad_data']['disable_stats'] == 1): ?>1;<?php else: ?>0<?php endif; ?><?php echo ';
	
$(document).ready(function(){
	if (skippable == 1) {
		$(\'#preroll_skip_btn\').hide();
	}
	
	var preroll_timer_current = '; ?>
'<?php echo $this->_tpl_vars['preroll_ad_data']['duration']; ?>
'<?php echo ' * 1000;
	
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
		
		$(\'.preroll_timeleft\').html(output);
		
		if (preroll_timer_current == 0 && preroll_player_called == false) {

			$.ajax({
		        type: "GET",
		        url: MELODYURL2 + "/ajax.php",
				dataType: "html",
		        data: {
					"p": "video",
					"do": "getplayer",
					"vid": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_player_uniq_id']; ?>
<?php echo '",
					"aid": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_data']['id']; ?>
<?php echo '",
					"player": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_player_page']; ?>
<?php echo '",
					"playlist": "'; ?>
<?php echo $this->_tpl_vars['playlist']['list_uniq_id']; ?>
<?php echo '"
		        },
		        dataType: "html",
		        success: function(data){
					$(\'#preroll_placeholder\').replaceWith(data);
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
			
			$(\'.preroll_skip_timeleft\').html(output);
			
			if (skippable_timer_current == 0 && preroll_player_called == false) {
				$(\'#preroll_skip_btn\').show();
				$(\'.preroll_skip_countdown\').hide();
				skippable_timer.stop();
			} else {
				skippable_timer_current -= 1000;
				if(skippable_timer_current < 0) {
					skippable_timer_current = 0;
				}
			}
		}, 1000, true);
		
		$(\'#preroll_skip_btn\').click(function(){
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
						"aid": "'; ?>
<?php echo $this->_tpl_vars['preroll_ad_data']['id']; ?>
<?php echo '",
						"at": "'; ?>
<?php echo @_AD_TYPE_PREROLL; ?>
<?php echo '"
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
'; ?>

<?php endif; ?>
<?php echo '
<script type="text/javascript" src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.main.js"></script>
<script type="text/javascript" src="'; ?>
<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
<?php echo '/js/jquery.fancybox.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	$(".front-featured").fancybox({
		maxWidth	: 990,
		maxHeight	: 585,
		fitToView	: false,
		padding: 0,
		width		: \'100%\',
		height		: \'100%\',
		autoSize	: false,
		closeClick	: false,
		openEffect	: \'none\',
		closeEffect	: \'none\',
		helpers: {
    overlay: {
      locked: false
    }
  }
	});
});
	</script>

'; ?>

<?php echo @_HTMLCOUNTER; ?>

</body>
</html>