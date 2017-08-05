<?php /* Smarty version 2.6.20, created on 2015-05-20 09:29:35
         compiled from video-search.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'general')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
<div id="wrapper">
    <div class="container-fluid" style="margin-left:-20px; margin-right:0">
      <div class="row-fluid" style="margin-top:-20px;">		
		<section class="video-results" >
					<header class="heading" style="padding:0px">
						<form action="search.php" class="filter2-form" method="GET">
							<fieldset>
                            
                           
 <select class="filter2 results" <?php if ($this->_tpl_vars['filter'] == ''): ?>title="Filter results"<?php endif; ?> name="filter" onchange="this.form.submit()">
                                  
           
           <?php if ($this->_tpl_vars['filter'] == 'Most Viewed'): ?><option>Most Viewed</option><?php endif; ?> 
           <?php if ($this->_tpl_vars['filter'] == 'Newest'): ?><option>Newest</option><?php endif; ?>
           <?php if ($this->_tpl_vars['filter'] == 'Oldest'): ?><option>Oldest</option><?php endif; ?>       
          <option>Best Match</option>
          <?php if ($this->_tpl_vars['filter'] != 'Most Viewed'): ?><option>Most Viewed</option><?php endif; ?>
          <?php if ($this->_tpl_vars['filter'] != 'Newest'): ?><option>Newest</option><?php endif; ?>
          <?php if ($this->_tpl_vars['filter'] != 'Oldest'): ?><option>Oldest</option><?php endif; ?>
     
 </select>							<input type="hidden" name="keywords" value="<?php echo $this->_tpl_vars['search']; ?>
">
							</fieldset>
						</form>

						<h1>“<?php echo $this->_tpl_vars['search']; ?>
”  <mark><?php echo $this->_tpl_vars['total_videos']; ?>
 VIDEOS</mark></h1>
					</header>
        
        
        
<section class="videos" style="border-bottom:none;">                                                
                                                                                       
                                                                               
                                        <?php $_from = $this->_tpl_vars['Search_Data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                <section class="box">
                <span class="date">Uploaded <time><?php echo $this->_tpl_vars['video_data']['added_date']; ?>
</time></span>
               
							                                                        <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box"><img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" width="222" height="125">
                                                        </a>
                                                        <strong class="title">
                                                        <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                                        </strong>
                                                        <div>
                                                               <span class="pm-video-attr-numbers"><small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
 / <?php echo $this->_tpl_vars['video_data']['comments_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['comments']; ?>
</small></span>
                                                        </div>
                                                       
                                                        
                                                </section>
                                                <?php endforeach; endif; unset($_from); ?>
                                               
                                                        
                                                
                                                </section>
						
          </section>
			<?php echo $this->_tpl_vars['pagination_code']; ?>

		
		
       
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>