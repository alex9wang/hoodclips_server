<script type="text/javascript">

	// bind top #loading div for all ajax requests
	$(document).ajaxStart(function() {
		pm_doing_ajax = true;
		$('#loading').show();
	});
	$(document).ajaxComplete(function() {
		pm_doing_ajax = false;
		$('#loading').hide();
	});
	
	// Loading ...
	document.getElementById("loading").style.display="block";
	
	function addLoadEvent(func) {
	  var oldonload = window.onload;
	  if (typeof window.onload != 'function') {
		window.onload = func;
	  } else {
		window.onload = function() {
		  if (oldonload) {
			oldonload();
		  }
		  func();
		}
	  }
	}
	
	addLoadEvent(function() {
	  document.getElementById("loading").style.display="none";
	});

	var adminPrimary = $('.content').height()+100;
	$('#adminSecondary').css({'min-height': ''+ adminPrimary +'px' });

	//$('#adminSecondary').css('position','fixed');
	$(window).on('resize', function(){
		var win = $(this); //this = window
		if (win.height() <= 860) {
		$('#adminSecondary').css('position','absolute');
		}
		if(win.height() >= 860) {
			$('#adminSecondary').css('position','fixed');
		}
	});	
	
	//===== Color picker =====//
<?php if($load_colorpicker == 1): ?>

	$("#bg_bar").colorpicker().on("changeColor", function(ev){
		hex = ev.color.toHex();
		$("#bg_bar").val(hex);
	});
	$("#play_timer").colorpicker().on("changeColor", function(ev){
		hex = ev.color.toHex();
		$("#play_timer").val(hex);
	});
<?php endif; ?>

<?php if($load_uniform == 1): ?>
	$("input:file").uniform();
<?php endif; ?>

	$('#test-email').click(function(event){
		event.preventDefault();
		$('#loader').show();
		$.ajax({
			url: 'admin-ajax.php',
			data: {
				p: 'settings',
				"do": 'testmail',
				mail_server	: $('input[name=mail_server]').val(),
				mail_port	: $('input[name=mail_port]').val(),
				mail_user	: $('input[name=mail_user]').val(),
				mail_pass	: $('input[name=mail_pass]').val(),
				mail_smtp	: $('input[name=issmtp]:checked').val(),
				contact_email: $('input[name=contact_mail]').val()
			},
			type: 'POST',
			dataType: 'json',
			success: function(data){
				$('#test-email-response').html(data['message']).show();
				$('#loader').hide();
			}
		});
		return false;
	});

	$(".editadzone").click(function(){ // Click to only happen on announce links
		$("#adzoneid").val($(this).data('id'));
	});

<?php if($load_scrolltofixed == 1): ?>
	$('#stack-controls').scrollToFixed({ 
		bottom: 0,
		limit: $('#stack-controls').offset().top, //.top
		preFixed: function() { $(this).css({'background-color' : '#FFF', 'box-shadow' : '0 -2px 2px #eee', 'padding' : '5px 15px', 'border' : '1px solid #ddd', 'border-bottom' : 'none', 'background-image' : '-moz-linear-gradient(top, #fff, #f4f4f4)' }); },
		postFixed: function() { $(this).css({'background-color': '', 'box-shadow' : 'none', 'padding' : '10px 0px', 'border' : 'none', 'background-image' : 'none'}); }
	});
/*
	$('#import-nav').scrollToFixed({ 
		marginTop: $('header').outerHeight(),
        preFixed: function() { $(this).css({'background-color' : '#FFF', 'box-shadow' : '0 2px 2px #ddd', 'padding-right' : '10px' }); $(this).find('h2').css('visibility', 'hidden'); },
        postFixed: function() { $(this).css({'background-color': '', 'box-shadow' : 'none', 'padding-right' : '0px'}); $(this).find('h2').css('visibility', 'visible'); }
	});
*/
	/*$('#sideNav').scrollToFixed({ bottom: 0, limit: $('#wrapper').offset().top });*/

<?php endif; ?>
<?php if($load_tagsinput == 1): ?>
	var tidyTags = function(e){
		var tags = ($(e.target).val() + ',' + e.tags).split(',');
		var target = $(e.target);
		target.importTags('');
		for (var i = 0, z = tags.length; i<z; i++) {
			var tag = $.trim(tags[i]);
			if (!target.tagExist(tag)) {
				target.addTag(tag);
			}
		}
	}
	$('input[id^="tags_addvideo_"]').tagsInput({
		onAddTag : function(tag){
		if(tag.indexOf(',') > 0){
			tidyTags({target: 'input[id^="tags_addvideo_"]', tags : tag});
			 }
		 },
		'removeWithBackspace' : true,
		'height':'auto',
		'width':'auto',
		'defaultText':'',
		'minChars' : 3,
		'maxChars' : 90
	});
<?php endif; ?>

	$("img[name='video_thumbnail']").click(function() {
		
		var img = $(this);
		var row_id = $(this).attr('rowid');
		var ul = img.parents('.thumbs_ul_import');
		var li = img.parent();
		var tr = img.parents('div');	
		var input = $('#thumb_url_'+ row_id);
	
		if ( ! li.hasClass('stack-thumb-selected'))
		{
			ul.children().removeClass('stack-thumb-selected').addClass('stack-thumb');
			li.addClass('stack-thumb-selected');
			input.val(img.attr('src'));
		}
	});


<?php if($load_ibutton == 1): ?>
	$(document).ready(function() {
		$('.on_off :checkbox').iButton({
			duration: 80,
			labelOn: "",
			labelOff: "",
			enableDrag: false 
		});

	    $("#checkall").click(function () {
			$('.on_off :checkbox').iButton("repaint");
			if($('.on_off :checkbox').is(":checked")) {
			  $('.video-stack').addClass("stack-selected");
			} else {
			  $('.video-stack').removeClass("stack-selected");
			}
	    });
	});
<?php endif; ?>

	$('.on_off :checkbox').change(function () {
		if ($(this).attr("checked")) {
			$(this).closest('.video-stack').addClass("stack-selected");
		} 
		else {
		$(this).closest('.video-stack').removeClass("stack-selected");
		}
	});

<?php if ($load_import_js) : ?>

function import_subscribe_search_success(data) {
	
	if (data.success == false) {
		if (data.html != '') {
			$('.modal-response-placeholder').html(data.html).show();
		} else if (data.msg != '') {
			alert(data.msg);
		}
	} else {
		$('#modal_subscribe').modal('hide');

		$('#btn-subscribe').hide();
		$('#btn-unsubscribe').attr('data-subscription-id', data.sub_id).show();
		$('div.pagination > ul > li > a').each( function() {
			$(this).attr('href', $(this).attr('href') + '&sub_id=' + data.sub_id);
		});
	}
	return;
}
function import_subscribe_user_success(data) {
	
	if (data.success == false) {
		if (data.html != '') {
			$('#modal_subscribe').modal('show');
			$('.modal-response-placeholder').html(data.html).show();
		} else if (data.msg != '') {
			alert(data.msg);
		}
	} else {
		$('#modal_subscribe').modal('hide');
		$('#btn-subscribe').hide();
		$('#btn-unsubscribe').attr('data-subscription-id', data.sub_id).show();
		
		$('div.pagination > ul > li > a').each( function() {
			$(this).attr('href', $(this).attr('href') + '&sub_id=' + data.sub_id);
		});
	}
	return;
}

function import_subscribe() {

	$('.modal-response-placeholder').html('').hide();
	
	var sub_type = $('input[name="sub-type"]').val();
 
	$.ajax({
		url: '<?php echo _URL . '/'. _ADMIN_FOLDER .'/admin-ajax.php'?>',
		data: {
			"p": "import-subscriptions",
			"do": "subscribe",
			"name": $('input[name="sub-name"]').val(),
			"type": $('input[name="sub-type"]').val(),
			"params": $('input[name="sub-params"]').val(),
			"keyword": $('input[name="keyword"]').val(),
			"_pmnonce": '_admin_import_subscriptions',
			"_pmnonce_t": $('#_pmnonce_t_admin_import_subscriptions').val()
		},
		type: 'POST',
		dataType: 'json',
		success: function(data){
			if (sub_type == 'user' || sub_type == 'user-favorites' || sub_type == 'user-playlist') {
				import_subscribe_user_success(data);
			} else {
				import_subscribe_search_success(data);
			}
			
			if (data._pmnonce != '') {
				$('#_pmnonce_t_admin_import_subscriptions').val(data._pmnonce_t);
			}
		}
	});
	return false;
}

function import_unsubscribe(unsubscribe_btn) {
 
	$('.subscriptions-response-placeholder').html('').hide();
 
	var sub_id = unsubscribe_btn.attr('data-subscription-id');

	if (sub_id) {
		if (confirm('Are you sure you want to unsubscribe?')) {

			$.ajax({
				url: '<?php echo _URL .'/'. _ADMIN_FOLDER .'/admin-ajax.php'?>',
				data: {
					"p": "import-subscriptions",
					"do": "unsubscribe",
					"sub-id": sub_id,
					"_pmnonce": '_admin_import_subscriptions',
					"_pmnonce_t": $('#_pmnonce_t_admin_import_subscriptions').val()
				},
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if (data.success == false) {
						//alert(data.msg);
						$('.subscriptions-response-placeholder').html(data.html).show();
					} else {
						$('#btn-subscribe').show();
						$('#btn-unsubscribe').hide();
						$('#row-subscription-'+ sub_id).fadeOut('normal');
						
						$('div.pagination > ul > li > a').each( function(index) {
							$(this).attr('href', $(this).attr('href').replace('&sub_id='+ sub_id, ''));
						});
					}
					
					if (data._pmnonce != '') {
						$('#_pmnonce_t_admin_import_subscriptions').val(data._pmnonce_t);
					}
				}
			});
		}
	} else {
		$('.subscriptions-response-placeholder').html('<div class="alert alert-error">Missing subscription ID. Please reload the page and try again.</div>').show();
	}

	return false;
}

<?php endif; ?>
	$(document).ready(function () {
		 $("input[id^='featured'][type=checkbox]").change(function () { $('#value-featured').text('updated').addClass('label label-success'); });
		 $("input[id^='visibility'][type=radio]").change(function () { $('#value-visibility').text('updated').addClass('label label-success'); });
		 $("input[id^='restricted'][type=radio]").change(function () { $('#value-register').text('updated').addClass('label label-success'); });
		 $("input[class^='pubDate']").change(function () { $('#value-publish').text('updated').addClass('label label-success'); });
		 $("select[class^='pubDate']").change(function () { $('#value-publish').text('updated').addClass('label label-success'); });
		 $("input[id^='site_views_input']").change(function () { $('#value-views').text('updated').addClass('label label-success'); });
		 $("input[id^='submitted']").change(function () { $('#value-submitted').text('updated').addClass('label label-success'); });
		 $("input[id^='allow_comments']").change(function () { $('#value-comments').text('updated').addClass('label label-success'); });
		 $("input[id^='yt_length']").change(function () { $('#value-yt_length').text('updated').addClass('label label-success'); });
		 $("input[id^='show_in_menu'][type=radio]").change(function () { $('#value-showinmenu').text('updated').addClass('label label-success'); });	 
	
         $("input[id^='import-'][type=checkbox]").each(function(){
             $(this).change(updateCount);
         });
         
         $("#checkall").each(function(){
             $(this).change(updateCount);
         });
         updateCount();
         
         function updateCount(){
             var count = $("input[id^='import-'][type=checkbox]:checked").size();
             
             $("#count").text(count);
             $("#status").toggle(count > 0);
         };

		var cc = $.cookie('list_grid');
		if (cc == 'g') {
			$('#vs-grid').addClass('vs-grid');
		} else {
			$('#vs-grid').removeClass('vs-grid');
		}
/*
		var list_filter = $.cookie('list_filter');
		if (list_filter == null) {
			$('#showfilter-content').show();
		} else {
			$('#showfilter-content').hide();
		}	
*/

<?php if ($load_import_js) :?>


	$('select[name="data_source"]').change(function(){
		
		var categories_youtube = '<?php echo $select_category_youtube_inner_html; ?>';
		var categories_dailymotion = '<?php echo $select_category_dailymotion_inner_html; ?>';
		
		if ($('select[name="data_source"] option:selected').val() == 'youtube') {
			$('select[name="search_category"]').html(categories_youtube).removeAttr('disabled');
			$('select[name="search_duration"]').removeAttr('disabled');
			$('select[name="search_time"]').removeAttr('disabled');
			$('select[name="search_language"]').removeAttr('disabled');
			$('select[name="search_license"]').removeAttr('disabled');
			$('input[name="search_hd"]').removeAttr('disabled');
			$('input[name="search_3d"]').removeAttr('disabled');
		}
		else if ($('select[name="data_source"] option:selected').val() == 'dailymotion') {
			$('select[name="search_category"]').html(categories_dailymotion).removeAttr('disabled');
			$('select[name="search_duration"]').removeAttr('disabled');
			$('select[name="search_time"]').removeAttr('disabled');
			$('select[name="search_language"]').removeAttr('disabled');
			$('select[name="search_license"]').attr('disabled', 'disabled');
			$('input[name="search_hd"]').removeAttr('disabled');
			$('input[name="search_3d"]').removeAttr('disabled');
		}
		else if ($('select[name="data_source"] option:selected').val() == 'vimeo') {
			$('select[name="search_category"]').html(categories_youtube).attr('disabled', 'disabled');
			$('select[name="search_duration"]').attr('disabled', 'disabled');
			$('select[name="search_time"]').attr('disabled', 'disabled');
			$('select[name="search_language"]').attr('disabled', 'disabled');
			$('select[name="search_license"]').attr('disabled', 'disabled');
			$('input[name="search_hd"]').attr('disabled', 'disabled');
			$('input[name="search_3d"]').attr('disabled', 'disabled');
		}
	});


	var sub_type = $('input[name="sub-type"]').val();

		$('#btn-subscribe-modal-save').click(function(){ 
			return import_subscribe();
		});
		if (sub_type == 'user' || sub_type == 'user-favorites' || sub_type == 'user-playlist') {
			$('#btn-subscribe').click(function(){
				return import_subscribe();
			})
		}

		$('#btn-unsubscribe').click(function(){
			return import_unsubscribe($(this));
		});
		
		$('.link-search-unsubscribe').click(function(){ 
			return import_unsubscribe($(this));
		});
		
		var subscriptions = $.makeArray($('.row-subscription-get-results'));

		if (subscriptions.length > 0) {
			var i = 0, sub_id = 0;
			var obj;
			var ajaxManager = $.manageAjax.create('subscriptions', {queue: true, maxRequests: 1});
			
			$('#loading').show();
			
			for (i = 0; i < subscriptions.length; i++) {
				sub_id = ( $(subscriptions[i]).attr('data-subscription-id') );
	
				if (sub_id > 0) {

					$.manageAjax.add( 'subscriptions' , { 
						url: '<?php echo _URL .'/'. _ADMIN_FOLDER .'/admin-ajax.php'?>',
						data: {
							"p": "import-subscriptions",
							"do": "get-results",
							"sub-id": sub_id
						},
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							$('#row-subscription-'+ data.sub_id).find('.row-subscription-get-results').html(data.msg);
						},
					});
				}
			}
		}
		
<?php endif; ?>

	});

	$('#stacks').click(function() {
		$('#vs-grid').fadeOut(200, function() {
			$(this).addClass('vs-grid').fadeIn(200);
			$.cookie('list_grid', 'g');
		});
		return false;
	});
	
	$('#list').click(function() {
		$('#vs-grid').fadeOut(200, function() {
			$(this).removeClass('vs-grid').fadeIn(200);
			$.cookie('list_grid', null);
		});
		return false;
	});


	$("[rel=tooltip]").tooltip();
	$("[rel=popover]").popover();

	$('#myModal').modal({
	  keyboard: true,
	  show: false
	});

	$('#searchVideos').click(function() {
		$(".searchLoader").css({"display" : "inline"});
	});

	$('#addvideo_direct_submit').click(function() {
		$(".addLoader").css({"display" : "inline"});
	});	

	$('#submitImport').click(function() {
        $('#loading').show();
		$('#loading-large').show().find('.loading-msg').replaceWith('Importing');
		$(".video-stack").css({"opacity" : "0.5"});
		$(".importLoader").css({"display" : "inline"});
	});

	$('#submitFind').click(function() {
		$('#loading-large').show().find('.loading-msg').replaceWith('Searching');
		$(".pm-tables").css({"opacity" : "0.5"});
		$(".findIcon").css({"display" : "none"});
		$(".findLoader").css({"display" : "inline"});
	});

	$('.pagination > ul > li > a').click(function() {
		$('#loading-large').show();
		$(".pm-tables td").css({"opacity" : "0.5"});
		$(".tableFooter").css({"opacity" : "1.0"});
		$("#vs-grid").css({"opacity" : "0.5"});
	});

	
<?php if($load_chzn_drop == 1): ?>
	$(document).ready(function() {
		$('.category_dropdown').addClass("chzn-select");
		$(".chzn-select").chosen();
		$(".chzn-select-deselect").chosen({allow_single_deselect:true});
	});
<?php endif; ?>

	$('#adminSecondary').css({'height': (($('#wrapper').height()))+'px'});
	$(window).resize(function () {
		$('#adminSecondary').css({'height': (($('#wrapper').height()))+'px'});
	});

   /* $('.content').css({'height': (($('#adminSecondary').height()))+'px'});	*/


	$(document).ready(function() {	
		$('#sideNav li.has-subcats').hover(function(){
			if ( ! $(this).hasClass('active')) {
			$('ul.pm-sub-menu', this).stop().doTimeout( 'hover', 00, 'addClass', 'pm-sub-menu-side' );
			}
		}, function() {
			if ( ! $(this).hasClass('active')) {
			$('ul.pm-sub-menu', this).stop().doTimeout( 'hover', 0, 'removeClass', 'pm-sub-menu-side' );
			}
		});
	});
	
	/*
	$(document).ready(function() {	
		$('li.has-subcats').hover(function(){
			if ( ! $(this).hasClass('active')) {
				//$('ul', this).stop().doTimeout( 'hover', 500, 'slideDown', 250 );
				$('ul', this).stop().doTimeout( 'hover', 250, 'slideDown', 250 ); //@since v2.1 
			}
		}, function(){
			if ( ! $(this).hasClass('active')) {
				//$('ul', this).stop().doTimeout( 'hover', 0, 'slideUp', 300 );
				$('ul', this).stop().doTimeout( 'hover', 200, 'slideUp', 300 ); //@since v2.1
			}
		});
	});
*/
	//$('#showfilter').click(function() { $('#showfilter-content').slideToggle(100, function() { $.cookie('list_filter', 'open'); }); }); 
	/*
	$('#showfilter').click(function() {
		$('#showfilter-content').slideToggle(100, function() {
			if ($.cookie('list_filter') == null) {
				$.cookie('list_filter','close');
			} else {
				$.cookie('list_filter', null);
			}
		});
		return false;
	});
	*/
	$('#import-options').click(function() { $('#import-opt-content').toggle(); });
	//$('#import-options').click(function() { $('#import-opt-content').slideToggle('fast'); });

	$('#show-comments').click(function() { $('#show-opt-comments').slideToggle('fast'); return false; });
	$('#show-restriction').click(function() { $('#show-opt-restriction').slideToggle('fast'); return false; });
	$('#show-visibility').click(function() { $('#show-opt-visibility').slideToggle('fast'); return false; });
	$('#show-publish').click(function() { $('#show-opt-publish').slideToggle('fast'); return false; });
	$('#show-thumb').click(function() { $('#show-opt-thumb').slideToggle(50); return false; });
	$('#show-featured').click(function() { $('#show-opt-featured').slideToggle('fast'); return false; });
	$('#show-user').click(function() { $('#show-opt-user').slideToggle('fast'); return false; });
	$('#show-views').click(function() { $('#show-opt-views').slideToggle('fast'); return false; });
	$('#show-vs1').click(function() { $('#show-opt-vs1').slideToggle('fast'); return false; });
	$('#show-vs2').click(function() { $('#show-opt-vs2').slideToggle('fast'); return false; });
	$('#show-vs3').click(function() { $('#show-opt-vs3').slideToggle('fast'); return false; });
	$('#show-duration').click(function() { $('#show-opt-duration').slideToggle('fast'); return false; });
	$('#show-showinmenu').click(function() { $('#show-opt-showinmenu').slideToggle('fast'); return false; });
	
	$('#show-help-assist').click(function() { $('#help-assist').slideToggle('fast'); $('#show-help-assist').toggleClass('opac5'); return false; });
	$('#show-help-link-assist').click(function() { $('#help-assist').slideToggle('fast'); $('#show-help-link-assist').toggleClass('opac5'); return false; });
	
	$('#show-playlists').click(function() { $('#playlists').slideToggle('normal'); $('#content-to-hide').fadeToggle(300); return false; });

<?php if($load_prettypop == 1): ?>
	$("a[rel^='prettyPop']").prettyPhoto({
		animationSpeed: 'fast', /* fast/slow/normal */
		padding: 40, /* padding for each side of the picture */
		opacity: 0.70, /* Value betwee 0 and 1 */
		showTitle: false, /* true/false */
		allowresize: false, /* true/false */
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'dark_rounded', /* light_rounded / dark_rounded / light_square / dark_square */
		width: 1024,
		height: 744,
		// flowplayer settings - start
		fp_bgcolor: '<?php echo '0x' . _BGCOLOR;?>',
		fp_timecolor: '<?php echo '0x' . _TIMECOLOR;?>',
		fp_swf_loc: '<?php echo _URL .'/players/flowplayer2/flowplayer.swf';  ?>',
		// flowplayer settings - end 
		callback: function(){}
	});
<?php endif; ?>

	$('a[id^="show-more-"]').click(function(){
		var id = $(this).attr('id').match(/\d+$/);
		$(this).hide();
		$('#excerpt-'+id).hide();
		$('#full-text-'+id).show();
		$('#show-less-'+id).show();
		return false;
	});
	$('a[id^="show-less-"]').click(function(){
		var id = $(this).attr('id').match(/\d+$/);
		$(this).hide();
		$('#full-text-'+id).hide();
		$('#show-more-'+id).show();
		$('#excerpt-'+id).show();
		return false;
	});
	
	$(document).ready(function() {
		$('[placeholder]').focus(function() {
		  var input = $(this);
		  if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		  }
		}).blur(function() {
		  var input = $(this);
		  if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		  }
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  $(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
			  input.val('');
			}
		  })
		});
	});

	function validateFormOnSubmit(theForm, say_reason) {

		var counter = 0;

		if ( ! say_reason) {
			say_reason = 'Please fill in the required fields (highlighted)';
		}

		$("input,textarea").each(function () {
			if ($(this).attr('id') == "must") {
				if ($(this).attr("value").length == 0) {
					$(this).css("background", "#FFD2D2");
					counter++;
				}
				else {
					$(this).css("background", "#FFFFFF");
				}
			}
		});

		if ($('select[name="category[]"]').length > 0 && $('select[name="category[]"]').val() == null) {
			if (counter == 0) {
				alert('Please select at least one category');
				return false;
			} else {
				counter++;
			}
		}

		if (counter > 0) {
			alert(say_reason);
			return false;
		}
		return true;
	}


	function validateSearch(b_on_submit){
		if(document.forms['search'].keywords.value == '' || document.forms['search'].keywords.value == 'search'){
			alert('You did not enter a search term. Please try again.');
			if(b_on_submit == 'true')
				return false;
		}
		else{
			document.forms['search'].submit();
		}
	}
	function confirm_delete_all() {
		var confirm_msg = "You are about to delete all these selected items. Click 'Cancel' to stop or 'OK' to continue";	 // refers to articles, videos and users
		var response = false;
		if (confirm(confirm_msg)) {
		} else {
			return false;
		}
	}
<?php if ($load_settings_theme_resources) : ?>
 $(document).ready(function(){
	$('#btn-remove-logo').click(function(){
		 if (confirm('Are you sure you want to delete the current logo?')) {
			$.ajax({
				url: '<?php echo _URL .'/'. _ADMIN_FOLDER .'/admin-ajax.php'?>',
				data: {
					p: "layout-settings",
					"do": "delete-logo"
				},
				type: 'POST',
				dataType: 'json',
				success: function(data){
					$('#btn-remove-logo').hide();
					$('#show-logo').html(" ");
				}
			});
		}
		return false;
	});
});
<?php endif;?>

$(document).ready(function() {
 $('.tablesorter tr')
  .filter(':has(:checkbox:checked)')
	.addClass('selected')
  .end()
 .click(function(event) {
	var disallow = { "SMALL":1, "A":1, "IMG":1, "INPUT":1, "I":1, "TH":1, "TEXTAREA":1, "SPAN":1 }; 
  if(!disallow[event.target.tagName]) {
   $(':checkbox', this).trigger('click');
  }
 })
  .find(':checkbox')
  .click(function(event) {
   $(this).parents('tr:first').toggleClass('selected');
  });

  $("#selectall").click(function () {
	if($('.tablesorter tr').filter(':has(:checkbox:checked)').removeClass('selected').end()) {
		$('.tablesorter tr').not(".tablePagination").toggleClass("selected");
	}
  });
  
  // inline add new category
  $('#inline_add_new_category').click(function(){
  	$('#inline_add_new_category_form').slideToggle(0);
	$('#add_category_name').focus();
	return false;
  });
  
  $('button[name="add_category_submit_btn"]').click(function(event){
  	event.preventDefault();
	
	$('#add_category_response').html();
	var current_page = "<?php $tmp_parts = explode('/', $_SERVER['SCRIPT_NAME']); $tmp_script = array_pop($tmp_parts); echo $tmp_script; ?>";
	var category_name = $('input[name="add_category_name"]').val();
	var category_slug = $('input[name="add_category_slug"]').val();
	var parent_id = $('input[name="add_category_parent_id"]').val();
	var chzn_is_on = false;
	<?php if ($load_chzn_drop) : ?>
	chzn_is_on = true;
	<?php endif;?>

	// check if required fields are set
	if (category_name === "" || category_name == $('input[name="add_category_name"]').attr('placeholder')) {
		$('input[name="add_category_name"]').trigger('focus');
	} else if (category_slug === "" || category_slug == "Slug") {
		$('input[name="add_category_slug"]').trigger('focus');
	} else {
		if (current_page == "article_manager.php") {
			var ajax_do = "add-article-category"; 
			var parent_select_name = 'categories[]';
		} else {
			var ajax_do = "add-video-category";
			var parent_select_name = 'category[]';
		}

		$.ajax({
			url: "admin-ajax.php",
			data: {
			    p: "manage-categories",
			    name: $('input[name=add_category_name]').val(),
			    tag: $('input[name=add_category_slug]').val(),
			    category: $('select[name=add_category_parent_id]').val(),
				current_selection: $('select[name="'+ parent_select_name +'"]').val(),
				"do": ajax_do
			},
			type: 'POST',
			dataType: 'json',
			success: function(data){
				if (data.success == false) {
					$('#add_category_response').html(data.html);
				} else {
					// remove current Chosen instance html (no destroy method provided)
					if (chzn_is_on) {
						$(".chzn-select").removeAttr("style", "").removeClass("chzn-done").data("chosen", null).next().remove();
					}
					
					// update parent category dropdown   
					$('select.category_dropdown').replaceWith(data.html);

					$('#add_category_response').html('');
					
					// update Create-in category dropdown
					$('select[name=add_category_parent_id]').replaceWith(data.create_category_select_html);
					
					// clear Create-new-category form data
					$('input[name=add_category_name]').val("");
					$('input[name=add_category_slug]').val("");
					
					// create new Chosen instance for updated parent category dropdown
					if (chzn_is_on) {
						$('.category_dropdown').addClass("chzn-select");
						$(".chzn-select").chosen();
						$(".chzn-select-deselect").chosen({allow_single_deselect:true});
					}
				}
			}
		});
	}
	return false;
  });
});

<?php if ($load_swfupload_upload_image_handlers): ?>
$(document).ready(function() {
	
	// WYSIWYG Editor image uploader
	$('#ButtonPlaceHolder').swfupload({
	    upload_url: "upload_image.php",
	    
	    file_size_limit: "<?php echo ($upload_max_filesize > 0) ? $upload_max_filesize.'' : '0';?>",
	    file_types: "*.jpg;*.jpeg;*.png;*.gif",
	    file_types_description: "Image files",
	    file_upload_limit: 30,
	    flash_url: "js/swfupload/swfupload.swf",
	    button_width: 114,
	    button_height: 29,
	    custom_settings: {
	        progressTarget: "fsUploadProgress"
	    },
	    post_params: {
	        "PHPSESSID": "<?php echo session_id(); ?>"
	    },
	    // Button settings
	    //button_image_url: "js/swfupload/upload.png",
	    button_placeholder_id: "ButtonPlaceHolder",
	    button_width: "110",
	    button_height: "20",
	    button_text: 'Upload images',
	    button_text_style: '.button-text { text-align: center; font-size: 11px; font-weight: bold;font-family: Arial, Geneva, Verdana, sans-serif; letter-spacing:-0.045em; text-shadow: 0 1px 0 #FFF; }',
	    button_text_top_padding: 2,
	    button_text_left_padding: 0,
	    //button_window_mode: "window",
	    button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
	    button_cursor: SWFUpload.CURSOR.HAND,
	    debug: false
	})
	.bind('fileQueued', function(event, file){
	    var listitem = '<li id="' + file.id + '" >' +
	    '<div class="progressfilename"><em>' +
	    file.name +
	    '</em> (' +
	    Math.round(file.size / 1024) +
	    ' KB)<span class="progressvalue" ></span></div>' +
	    '<div class="progressbar" ><div class="progress" ></div></div>' +
	    '<p class="status" >Pending</p>' +
	    '<span class="cancel" >&nbsp;</span>' +
	    '</li>';
	    $('#uploadLog').append(listitem);
	    $('li#' + file.id + ' .cancel').bind('click', function(){
	        var swfu = $.swfupload.getInstance('#swfupload-control');
	        swfu.cancelUpload(file.id);
	        $('li#' + file.id).slideUp('fast');
	    });
	    // start the upload since it's queued
	    $(this).swfupload('startUpload');
	})
	.bind('fileQueueError', function(event, file, errorCode, message){
	    alert('Size of the file ' + file.name + ' is greater than the limit');
	})
	.bind('fileDialogStart', function(event){})
	.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
	    $('#fsUploadProgress').text('Uploaded: ' + numFilesSelected + ' file(s)');
	})
	.bind('uploadStart', function(event, file){
	    $('#uploadLog li#' + file.id).find('p.status').text('Uploading...');
	    $('#uploadLog li#' + file.id).find('span.progressvalue').text('0%');
	    $('#uploadLog li#' + file.id).find('span.cancel').hide();
		$('#loading').show();
	})
	.bind('uploadProgress', function(event, file, bytesLoaded){
	    //Show Progress
	    var percentage = Math.round((bytesLoaded / file.size) * 100);
	    $('#uploadLog li#' + file.id).find('div.progress').css('width', percentage + '%');
	    $('#uploadLog li#' + file.id).find('span.progressvalue').text(percentage + '%');
	})
	.bind('uploadSuccess', function(event, file, serverData){
	    var item = $('#uploadLog li#' + file.id);
	    item.find('div.progress').css('width', '100%');
	    item.find('span.progressvalue').text('100%');
	    var pathtofile = '<a href="uploads/' + file.name + '" target="_blank" >view &raquo;</a>';
	    item.addClass('success').find('p.status').html('Uploaded!');
	    if ($("#wysiwygtextarea-WYSIWYG").length > 0) {
	        $("#wysiwygtextarea-WYSIWYG").contents().find("body").append(serverData);
	    }
	    else 
	        if ($("#textarea-WYSIWYG").length > 0) {
	            var textarea = $("#textarea-WYSIWYG").val();
	            $("#textarea-WYSIWYG").val(textarea + serverData);
	        }
	    setTimeout(function(){
	        $('#uploadLog li#' + file.id).fadeOut('slow');
	    }, 2000);
	})
	.bind('uploadComplete', function(event, file){
	    // upload has completed, try the next one in the queue
	    $(this).swfupload('startUpload');
		$('#loading').hide();
	})
	.bind('uploadError', function(event, file, errorCode, message){
		//file.name
		alert("Upload Error: " + message);
		$('#loading').hide();
	});

	
	// video thumbnail image uploader/editor
	$('#thButtonPlaceholder').swfupload({
	    upload_url: "upload_image.php",
	    
	    file_size_limit: "<?php echo ($upload_max_filesize > 0) ? $upload_max_filesize.'' : '0';?>",
	    file_types: "*.jpg;*.jpeg;*.png;*.gif",
	    file_types_description: "Image files",
	    file_upload_limit: 0,
	    file_queue_limit: 1,
	    flash_url: "js/swfupload/swfupload.swf",
	    button_width: 114,
	    button_height: 24,
	    custom_settings: {
	        progressTarget: "thUploadProgress"
	    },
	    post_params: {
	        "PHPSESSID": "<?php echo session_id(); ?>",
	        "uniq_id": "<?php echo $uniq_id; ?>",
	        "doing": "video-thumb"
	    },
	    // Button settings
	    //button_image_url: "js/swfupload/upload.png",
	    button_placeholder_id: "thButtonPlaceholder",
	    button_width: "60",
	    button_height: "24",
	    button_text: 'Change',
	    button_text_style: '.button-text { text-align: center; font-size: 11px; font-weight: bold;font-family: Arial, Geneva, Verdana, sans-serif; letter-spacing:-0.045em; text-shadow: 0 1px 0 #FFF; }',
	    button_text_top_padding: 5,
	    button_text_left_padding: 0,
	    //button_window_mode: "window",
	    button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
	    button_cursor: SWFUpload.CURSOR.HAND,
	    debug: false
	})
	.bind('fileQueued', function(event, file){
	    var listitem = '<li id="' + file.id + '" >' +
	    //  'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
	    '<div class="progressbar" ><div class="progress" ></div></div>' +
	    '<p class="status" >Pending</p>' +
	    '<span class="cancel" >&nbsp;</span>' +
	    '</li>';
	    $('#uploadThumbLog').append(listitem);
	    $('li#' + file.id + ' .cancel').bind('click', function(){
	        var swfu = $.swfupload.getInstance('#swfupload-control');
	        swfu.cancelUpload(file.id);
	        $('li#' + file.id).slideUp('fast');
	    });
	    // start the upload since it's queued
	    $(this).swfupload('startUpload');
	})
	.bind('fileQueueError', function(event, file, errorCode, message){
	    alert('Size of the file ' + file.name + ' is greater than the limit');
	})
	.bind('fileDialogStart', function(event){})
	.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
	    //$('#thUploadProgress').text('Uploaded: '+numFilesSelected+' file(s)');
	})
	.bind('uploadStart', function(event, file){
	    $('#uploadThumbLog li#' + file.id).find('p.status').text('Uploading...');
	    $('#uploadThumbLog li#' + file.id).find('span.progressvalue').text('0%');
	    $('#uploadThumbLog li#' + file.id).find('span.cancel').hide();
		$('#loading').show();
	})
	.bind('uploadProgress', function(event, file, bytesLoaded){
	    //Show Progress
	    var percentage = Math.round((bytesLoaded / file.size) * 100);
	    $('#uploadThumbLog li#' + file.id).find('div.progress').css('width', percentage + '%');
	    $('#uploadThumbLog li#' + file.id).find('span.progressvalue').text(percentage + '%');
	})
	.bind('uploadSuccess', function(event, file, serverData){
	    var item = $('#uploadThumbLog li#' + file.id);
	    item.find('div.progress').css('width', '100%');
	    item.find('span.progressvalue').text('100%');
	    var pathtofile = '<a href="uploads/' + file.name + '" target="_blank" >view &raquo;</a>';
	    item.addClass('success').find('p.status').html('Uploaded! "Save" this page to apply the changes.');
	    $('#showThumb').html(serverData);
	    setTimeout(function(){
	        $('#uploadThumbLog li#' + file.id).fadeOut('slow');
	    }, 2000);
	})
	.bind('uploadComplete', function(event, file){
	    // upload has completed, try the next one in the queue
	    $(this).swfupload('startUpload');
		$('#loading').hide();
	})
	.bind('uploadError', function(event, file, errorCode, message){
		//file.name
		alert("Upload Error: " + message);
		$('#loading').hide();
	});
	
	$('#changeFlvButtonPlaceholder').swfupload({
	    upload_url: "upload_file.php",
	    
	    file_size_limit: "<?php echo ($upload_max_filesize > 0) ? $upload_max_filesize.'' : '0';?>",
	    file_types: "*.flv;*.mp4;*.mov;*.wmv;*.divx;*.avi;*.mkv;*.asf;*.wma;*.mp3;*.m4v;*.m4a;*.3gp;*.3g2",
	    file_types_description: "Video files",
	    file_upload_limit: 0,
	    file_queue_limit: 1,
	    flash_url: "js/swfupload/swfupload.swf",
	    button_width: 114,
	    button_height: 20,
	    custom_settings: {
	        progressTarget: "changeFlvUploadProgress"
	    },
	    post_params: {
	        "PHPSESSID": "<?php echo session_id(); ?>",
	        "uniq_id": "<?php echo $uniq_id; ?>",
			"doing": "upload_video"
	    },
	    // Button settings
	    //button_image_url: "js/swfupload/upload.png",
	    button_placeholder_id: "changeFlvButtonPlaceholder",
	    button_width: "60",
	    button_height: "24",
	    button_text: 'Change',
	    button_text_style: '.button-text { text-align: center; font-size: 11px; font-weight: bold;font-family: Arial, Geneva, Verdana, sans-serif; letter-spacing:-0.045em; text-shadow: 0 1px 0 #FFF; }',
	    button_text_top_padding: 5,
	    button_text_left_padding: 0,
	    //button_window_mode: "window",
	    button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
	    button_cursor: SWFUpload.CURSOR.HAND,
	    debug: false
	})
	.bind('fileQueued', function(event, file){
		var listitem = '<li id="' + file.id + '" >' +
	    //  'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
	    '<div class="progressbar" ><div class="progress" ></div></div>' +
	    '<p class="status" >Pending</p>' +
	    '<span class="cancel" >&nbsp;</span>' +
	    '</li>';
	    $('#uploadFlvLog').append(listitem);
	    $('li#' + file.id + ' .cancel').bind('click', function(){
	        var swfu = $.swfupload.getInstance('#swfupload-control');
	        swfu.cancelUpload(file.id);
	        $('li#' + file.id).slideUp('fast');
	    });
	    // start the upload since it's queued
	    $(this).swfupload('startUpload');
	})
	.bind('fileQueueError', function(event, file, errorCode, message){
	    alert('Size of the file ' + file.name + ' is greater than the limit');
	})
	.bind('fileDialogStart', function(event){})
	.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
	    //$('#thUploadProgress').text('Uploaded: '+numFilesSelected+' file(s)');
	})
	.bind('uploadStart', function(event, file){
	    $('#uploadFlvLog li#' + file.id).find('p.status').text('Uploading...');
	    $('#uploadFlvLog li#' + file.id).find('span.progressvalue').text('0%');
	    $('#uploadFlvLog li#' + file.id).find('span.cancel').hide();
		$('#loading').show();
	})
	.bind('uploadProgress', function(event, file, bytesLoaded){
	    //Show Progress
	    var percentage = Math.round((bytesLoaded / file.size) * 100);
	    $('#uploadFlvLog li#' + file.id).find('div.progress').css('width', percentage + '%');
	    $('#uploadFlvLog li#' + file.id).find('span.progressvalue').text(percentage + '%');
	})
	.bind('uploadSuccess', function(event, file, serverData){
	    var item = $('#uploadFlvLog li#' + file.id);
	    item.find('div.progress').css('width', '100%');
	    item.find('span.progressvalue').text('100%');
	    var pathtofile = '<a href="uploads/' + file.name + '" target="_blank" >view &raquo;</a>';
	    item.addClass('success').find('p.status').html('Uploaded! "Save" this page to apply the changes.');
	    $('#showFlv').html(serverData);
	    setTimeout(function(){
	        $('#uploadFlvLog li#' + file.id).fadeOut('slow');
	    }, 2000);
	})
	.bind('uploadComplete', function(event, file){
	    // upload has completed, try the next one in the queue
	    $(this).swfupload('startUpload');
		$('#loading').hide();
	})
	.bind('uploadError', function(event, file, errorCode, message){
		//file.name
		alert("Upload Error: " + message);
		$('#loading').hide();
	});

	//var swfu = $.swfupload.getInstance('#uploadSubtitlePlaceholder');
	$('#uploadSubtitlePlaceholder').swfupload({
	    upload_url: "upload_file.php",
	    file_size_limit: "<?php echo ($upload_max_filesize > 0) ? $upload_max_filesize.'' : '0';?>",
	    file_types: "*.vtt;*.srt",
	    file_types_description: "Subtitle file",
	    file_upload_limit: 0,
	    file_queue_limit: 1,
	    flash_url: "js/swfupload/swfupload.swf",
	    button_width: 114,
	    button_height: 20,
	    custom_settings: {
	        progressTarget: "uploadSubtitleProgress"
	    },
	    post_params: {
	        "PHPSESSID": "<?php echo session_id(); ?>",
	        "uniq_id": "<?php echo $uniq_id; ?>",
			"doing": "upload_subtitle"
	    },
	    // Button settings
	    //button_image_url: "js/swfupload/upload.png",
	    button_placeholder_id: "uploadSubtitlePlaceholder",
	    button_width: "98",
	    button_height: "24",
	    button_text: 'Select & Upload',
	    button_text_style: '.button-text { text-align: center; font-size: 11px; font-weight: bold;font-family: Arial, Geneva, Verdana, sans-serif; letter-spacing:-0.045em; text-shadow: 0 1px 0 #FFF; }',
	    button_text_top_padding: 5,
	    button_text_left_padding: 0,
	    //button_window_mode: "window",
	    button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
	    button_cursor: SWFUpload.CURSOR.HAND,
	    debug: false
	})
	.bind('fileQueued', function(event, file){
		var listitem = '<li id="' + file.id + '" >' +
	    //  'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
	    '<div class="progressbar" ><div class="progress" ></div></div>' +
	    '<p class="status" >Pending</p>' +
	    '<span class="cancel" >&nbsp;</span>' +
	    '</li>';
	    $('#uploadSubLog').append(listitem);
	    $('li#' + file.id + ' .cancel').bind('click', function(){
	        var swfu = $.swfupload.getInstance('#swfupload-control');
	        swfu.cancelUpload(file.id);
	        $('li#' + file.id).slideUp('fast');
	    });
	    // start the upload since it's queued
		$(this).swfupload('addPostParam', 'language', $("#language").val());
		$(this).swfupload('startUpload');
	})
	.bind('fileQueueError', function(event, file, errorCode, message){
	    alert('Size of the file ' + file.name + ' is greater than the limit');
	})
	.bind('fileDialogStart', function(event){})
	.bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
	    //$('#thUploadProgress').text('Uploaded: '+numFilesSelected+' file(s)');
	})
	.bind('uploadStart', function(event, file){
	    $('#uploadSubLog li#' + file.id).find('p.status').text('Uploading...');
	    $('#uploadSubLog li#' + file.id).find('span.progressvalue').text('0%');
	    $('#uploadSubLog li#' + file.id).find('span.cancel').hide();
		$('#loading').show();
	})
	.bind('uploadProgress', function(event, file, bytesLoaded){
	    //Show Progress
	    var percentage = Math.round((bytesLoaded / file.size) * 100);
	    $('#uploadSubLog li#' + file.id).find('div.progress').css('width', percentage + '%');
	    $('#uploadSubLog li#' + file.id).find('span.progressvalue').text(percentage + '%');
	})
	.bind('uploadSuccess', function(event, file, serverData){
	    var item = $('#uploadSubLog li#' + file.id);
	    item.find('div.progress').css('width', '100%');
	    item.find('span.progressvalue').text('100%');
	    item.addClass('success').find('p.status').html('Uploaded! "Save" this page to apply the changes.');
	    setTimeout(function(){
	        $('#uploadSubLog li#' + file.id).fadeOut('slow');
	    }, 2000);

		if (serverData.indexOf('alert') > 0) {
			$('#showSubtitle').append(serverData);
		} else {
			$('#showSubtitle').html(serverData);
		}
	})
	.bind('uploadComplete', function(event, file){
	    // upload has completed, try the next one in the queue
	    $(this).swfupload('startUpload');
		$('#loading').hide();
	})
	.bind('uploadError', function(event, file, errorCode, message){
		//file.name
		alert("Upload Error: " + message);
		$('#loading').hide();
	});
});
<?php endif; ?>


<?php if($load_tinymce == 1 && _SEOMOD): ?>

	// Permalink Adjuster
	
	//var inputJ = $('input[class="permalink-input"]').val().length;

	//$('input[class="permalink-input"]').attr('size', inputJ);

	var inputPermalink = $('input[class="permalink-input"]').val().length;
	if(inputPermalink > 0) {
		$('input[class="permalink-input"]').attr('size', inputPermalink).css('width', inputPermalink * 6.5 +'px');
	}
	// Permalink Adjuster
	/*

    var input = document.querySelectorAll('input[class="permalink-input"]');
	for(i=0; i<input.length; i++){
		input[i].setAttribute('size',input[i].getAttribute('placeholder').length);
	}


	function resizeInput() {
		if($(this).val().length > inputPermalink) {
			$(this).attr('size', $(this).val().length);
		}
	}
	$('input[class="permalink-input"]').keypress(resizeInput);
	*/


<?php endif; ?>
<?php if($config['keyboard_shortcuts'] == 1) : ?>
$(document).bind('keydown', 'shift+/', function() {
	$('#seeShortcuts').modal('show');
});
$(document).bind('keydown', 'c', function() {
	$('#addVideo').modal('show');
	$('#addVideo').on('shown', function () {
    	$('#yt_query').focus();
	});
});
$(document).bind('keydown', 'alt+s', function() {
	window.location = 'settings.php';
	return false;
});
$(document).bind('keydown', 'alt+l', function() {
	window.location = 'settings_theme.php';
	return false;
});
$(document).bind('keydown', 'alt+v', function() {
	window.location = 'videos.php';
	return false;
});
$(document).bind('keydown', 'alt+a', function() {
	window.location = 'articles.php';
	return false;
});
$(document).bind('keydown', 'alt+p', function() {
	window.location = 'pages.php';
	return false;
});
$(document).bind('keydown', 'alt+c', function() {
	window.location = 'comments.php';
	return false;
});
$(document).bind('keydown', 'shift+a', function() {
	$(".pm-tables").each(function(){
		if ( $('input:checkbox').attr('checked')) {
			$('input:checkbox').attr('checked', false);
		} else {
			$('input:checkbox').attr('checked', 'checked');
		}
	});
	if($('.tablesorter tr').filter(':has(:checkbox:checked)').removeClass('selected').end()) {
		$('.tablesorter tr').toggleClass("selected");
	}
	<?php if($load_ibutton == 1): ?>
	$("#import-opt-content").each(function(){
	
		if ( $('input[name^="video_ids"]:checkbox').attr('checked')) {
			$('input[name^="video_ids"]:checkbox').attr('checked', false);
		} else {
			$('input[name^="video_ids"]:checkbox').attr('checked', 'checked');
		}

		$('.on_off :checkbox').iButton("repaint");
		if($('.on_off :checkbox').is(":checked")) {
		  $('.video-stack').addClass("stack-selected");
		}else {
		  $('.video-stack').removeClass("stack-selected");
		}

	});
	<?php endif; ?>

});
$(document).bind('keydown', 'shift+s', function() {
	$('#form-search-input').focus();
	$('#form-search-input').css({"border":"1px solid #ddd"});	
	return false;
});
<?php endif; ?>


<?php if($load_dotdotdot): ?>
$(".item-comment").dotdotdot({
	height: 40,
});
<?php endif; ?>

<?php if($load_scrollpane): ?>
$(document).ready(function(){
	
	$(".widget-handle").click(function(){
		//$(this).next(".widget-inside").toggle();
		//$(this).toggleClass("widget-handle-active"); return false;
	});

	$(".widget-hide").click(function(){});

	$('.scroll-panel').each(
		function()
		{
			$(this).jScrollPane(
				{
					showArrows: false,
					horizontalGutter: 0,
				}
			);
			var api = $(this).data('jsp');
			var throttleTimeout;
			$(window).bind(
				'resize',
				function()
				{
					if (!throttleTimeout) {
						throttleTimeout = setTimeout(
							function()
							{
								api.reinitialise();
								throttleTimeout = null;
							},
							50
						);
					}
				}
			);
		}
	);
});
<?php endif; ?>


$(document).ready(function(){
	$('#meta_switch_select_input').click(function(event){
		event.preventDefault();
		
		$('#meta_key_select').hide();
		$(this).hide();
		$('input[name="meta_key"]').show();
		$('#meta_switch_input_select').show('50');
		
		return false;
	});
	
	$('#meta_switch_input_select').click(function(event){
		event.preventDefault();
		
		$('#meta_key_select').show();
		$(this).hide();
		$('input[name="meta_key"]').hide();
		$('#meta_switch_select_input').show('50');
		
		return false;
	});
	
	$('#add_meta_btn').click(function(event){
		event.preventDefault();
		
		$('#new-meta-error').html('');

		if (($('input[name="meta_key"]').val() != "" 
			 && $('input[name="meta_key"]').val() != $('input[name="meta_key"]').attr('placeholder')) 
			|| ($('select[name="meta_key_select"]').val() != "_nokey"))
		{
			var input_key = '';
			var input_value = '';
			
			if ($('input[name="meta_key"]').val() != "" 
				 && $('input[name="meta_key"]').val() != $('input[name="meta_key"]').attr('placeholder'))
			{
				input_key = $('input[name="meta_key"]').val();
			} else {
				input_key = $('select[name="meta_key_select"]').val();
			}
			
			if ($('input[name="meta_value"]').val() != $('input[name="meta_value"]').attr('placeholder')) {
				input_value = $('input[name="meta_value"]').val();
			}
			
			$.ajax({
				url: 'admin-ajax.php',
				data: {
					"p": "metadata",
					"do": "add-meta",
				    "meta_key": input_key,
				    "meta_value": input_value,
					"item_id": $('input[name="meta_item_id"]').val(),
				    "item_type": $('input[name="meta_item_type"]').val(),
				},
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if (data['type'] == "error") {
						$('#new-meta-error').html(data['html']);
					} else {
					 
						$('#new-meta-placeholder').append(data['html']);
						
						// clear form
						$('input[name="meta_key"]').val("");
						$('input[name="meta_value"]').val("");
						
						bind_metadata_actions(data['meta_id']);
					}
				}
			});
		}
		else {
			$('input[name="meta_key"]').trigger('focus');
		}
		return false;
	});
	
	$('div[id^="meta-row-"]').click(function() {
			$(this).find('button.btn-normal').css('box-shadow','0 1px 3px #bee1be').removeClass("btn-normal").addClass("btn-success");
			$('input').change(function() {
				$(this).css('border', '1px solid #96ce96');
			});
	});
	
	bind_metadata_actions("");
});

function bind_metadata_actions(selector_meta_id)
{
	var update_btn_selector = '[id^="update_meta_btn_"]';
	var delete_btn_selector = '[id^="delete_meta_btn_"]';
	
	if (selector_meta_id != "")
	{
		update_btn_selector = '#update_meta_btn_' + selector_meta_id;
		delete_btn_selector = '#delete_meta_btn_' + selector_meta_id;
	}
	
	$(update_btn_selector).click(function(event){
		event.preventDefault();
		
		var meta_id = $(this).attr('id').replace( /^\D+/g, '');
		
		$('#update-response-'+ meta_id).html('');

		if ($('input[name="meta['+ meta_id +'][key]"]').val() === "") {
			$('input[name="meta['+ meta_id +'][key]"]').trigger('focus');
		} else {
			$.ajax({
				url: 'admin-ajax.php',
				data: {
					"p": "metadata",
					"do": "update-meta",
				    "meta_id": meta_id,
					meta_key: $('input[name="meta['+ meta_id +'][key]"]').val(),
				    meta_value: $('input[name="meta['+ meta_id +'][value]"]').val()
				},
				type: 'POST',
				dataType: 'json',
				success: function(data){
					if (data['type'] == 'success') {
						$('#update-response-'+ meta_id).html(data['html']).show().delay(2000).fadeOut("slow");
					} else { 
						$('#update-response-'+ meta_id).html(data['html']).show();
					}
				}
			});
		}
		return false;
	});
	
	$(delete_btn_selector).click(function(event){
		event.preventDefault();
		
		var meta_id = $(this).attr('id').replace( /^\D+/g, '');
		
		$.ajax({
			url: 'admin-ajax.php',
			data: {
				"p": "metadata",
				"do": "delete-meta",
			    "meta_id": meta_id
			},
			type: 'POST',
			dataType: 'json',
			success: function(data){
				$('#meta-row-'+ meta_id).css('border-bottom', '5px solid #f4543c').slideUp();
			}
		});

		return false;
	});
}


<?php if ($load_sortable) : ?>
$(document).ready(function(){

    var changes_made = false;
		
    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
		itemsAttr: 'data-id',
        toleranceElement: '> div',
		placeholder: 'transport',
		forcePlaceholderSize: true,
		opacity: .6,
		update: function(){
			pm_prevent_leaving_without_saving = true;
		}
    });
	
	$('#organize-category-save-btn').click(function(){
		var tree = $('.sortable').nestedSortable('toArray');

		$.ajax({
			url: 'admin-ajax.php',
			data: {
				"p": "manage-categories", 
				"do": "organize",
				"type": "<?php echo $category_type; ?>",
				"tree": tree
			},
			type: 'POST',
			dataType: 'json',
			success: function(data){
				if (data.success == true) {
					pm_prevent_leaving_without_saving = false;
					window.location = 'categories.php?type=<?php echo $category_type;?>&organized=true';
				} else {
					$('#display_result').html(data.html).show();
				}
			}
		});
		return false;
	});
	
});
<?php endif; ?>


window.onbeforeunload = function (e) {
	if (pm_prevent_leaving_without_saving == true) {
		var e = e || window.event;
		var msg = 'Are you sure you want to leave without saving?';
		// For IE and Firefox
		if (e) {
			e.returnValue = msg;
		}
		// For Safari / chrome
		return msg;
	}
}
</script>

<?php if($load_googlesuggests == 1) : ?>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">
/**@license
This file uses Google Suggest for jQuery plugin (licensed under GPLv3) by Haochi Chen ( http://ihaochi.com )
 */
(function ($) {
$.fn.googleSuggest = function(opts){
  opts = $.extend({service: 'web', secure: false}, opts);

  var services = {
    youtube: { client: 'youtube', ds: 'yt' },
    books: { client: 'books', ds: 'bo' },
    products: { client: 'products-cc', ds: 'sh' },
    news: { client: 'news-cc', ds: 'n' },
    images: { client: 'img', ds: 'i' },
    web: { client: 'hp', ds: '' },
    recipes: { client: 'hp', ds: 'r' }
  }, service = services[opts.service], span = $('<span>');


  opts.source = function(request, response){
    $.ajax({
      url: 'http'+(opts.secure?'s':'')+'://clients1.google.com/complete/search',
      dataType: 'jsonp',
      data: {
        q: request.term,
        nolabels: 't',
        client: service.client,
        ds: service.ds
      },
      success: function(data) {
        response($.map(data[1], function(item){
          return { value: span.html(item[0]).text() };
        }));
      }
    });  
  };
  
  return this.each(function(){
    $(this).autocomplete(opts);
  });
}
}(jQuery));

$(document).ready(function(){
	$(".gautocomplete").googleSuggest({service: "youtube"});
});
</script>
<?php endif; ?>
<?php if($load_lazy_load == 1) : ?>
<script src="js/echo.min.js"></script>
<script>
$(document).ready(function(){
	echo.init({
	offset: 100,
	throttle: 250,
	unload: false,
	});
});
</script>
<?php endif; ?>