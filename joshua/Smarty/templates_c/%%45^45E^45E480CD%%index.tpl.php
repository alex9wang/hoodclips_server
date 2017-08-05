<?php /* Smarty version 2.6.20, created on 2015-05-19 16:43:22
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
<div class="container no-padding">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
            <?php if ($this->_tpl_vars['page_number'] == ""): ?>
            <header class="heading">
                <h1>FEATURED <mark>VIDEOS</mark></h1>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <section class="<?php if ($this->_tpl_vars['fvid_main_type'] == 1): ?> video large exclusive Exclusive <?php else: ?>video large exclusive2<?php endif; ?>">
                <a class="front-featured" data-fancybox-type="iframe" href="<?php echo $this->_tpl_vars['fvid_main_url']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['fvid_main_thumb']; ?>
" width="1000" height="371" alt="">                                  
                    <strong class="tag"><?php if ($this->_tpl_vars['fvid_main_type'] == 1): ?> Hoodclips Exclusive <?php else: ?>Sponsored<?php endif; ?></strong>                                  
                    <div class="caption">
                        <h1><?php echo $this->_tpl_vars['fvid_main_title']; ?>
</h1>
                        <h2><?php echo $this->_tpl_vars['fvid_main_sdetail']; ?>
</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
            <section class="<?php if ($this->_tpl_vars['fvid_s1_type'] == 1): ?> video exclusive <?php else: ?>video exclusive2<?php endif; ?>">
                <a class="front-featured" data-fancybox-type="iframe" href="<?php echo $this->_tpl_vars['fvid_s1_url']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['fvid_s1_thumb']; ?>
" width="1000" height="371" alt="">	           
                    <strong class="tag"><?php if ($this->_tpl_vars['fvid_s1_type'] == 1): ?> Hoodclips Exclusive <?php else: ?>Sponsored<?php endif; ?></strong>                                        
                    <div class="caption">
                        <h1><?php echo $this->_tpl_vars['fvid_s1_title']; ?>
</h1>
                        <h2><?php echo $this->_tpl_vars['fvid_s1_sdetail']; ?>
</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section> 
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12  no-padding">
            <section class="<?php if ($this->_tpl_vars['fvid_s2_type'] == 1): ?> video secondary exclusive <?php else: ?>video secondary exclusive2<?php endif; ?>">
                <a class="front-featured" data-fancybox-type="iframe" href="<?php echo $this->_tpl_vars['fvid_s2_url']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['fvid_s2_thumb']; ?>
" width="1000" height="371" alt="">	           
                    <strong class="tag"><?php if ($this->_tpl_vars['fvid_s2_type'] == 1): ?> Hoodclips Exclusive <?php else: ?>Sponsored<?php endif; ?></strong>                                        
                    <div class="caption">
                        <h1><?php echo $this->_tpl_vars['fvid_s2_title']; ?>
</h1>
                        <h2><?php echo $this->_tpl_vars['fvid_s2_sdetail']; ?>
</h2>
                        <span class="btn-play">play</span>
                        <span class="btn-play-hover">play</span>
                    </div>
                </a>
            </section>
            </div>
        </div> 
        <?php endif; ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">
            <a id="top"></a>
            <?php if ($this->_tpl_vars['ad_12'] != ''): ?>
                <div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_12']; ?>
</div>
            <?php endif; ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="<?php echo $this->_tpl_vars['added_date1']; ?>
"><?php echo $this->_tpl_vars['added_date1']; ?>
</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num"><?php echo $this->_tpl_vars['total_videos1']; ?>
 VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
                <?php if ($this->_tpl_vars['data1'] == 'false'): ?> 
                    <section class="box">
                        <b><?php echo $this->_tpl_vars['added_date1']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
                        <div class="visible-lg visible-md col-lg-12 col-md-12">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                    <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                    </section>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['date'] != 'false'): ?>                    
                <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 visible-lg visible-md box">
                    <a href="<?php echo @_URL; ?>
/submit_video.php">
                        <span class="submit-video">SUBMIT YOUR VIDEO</span>
                    </a>
                </section>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">
                <a id="top"></a>
                <?php if ($this->_tpl_vars['ad_13'] != ''): ?>
                    <div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_13']; ?>
</div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($this->_tpl_vars['added_date2'] != ""): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="<?php echo $this->_tpl_vars['added_date2']; ?>
"><?php echo $this->_tpl_vars['added_date2']; ?>
</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num"><?php echo $this->_tpl_vars['total_videos2']; ?>
 VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                <?php if ($this->_tpl_vars['data2'] == 'false'): ?> 
                    <section class="box">
                        <b><?php echo $this->_tpl_vars['added_date2']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
                        <div class="visible-lg visible-md col-lg-12 col-md-12 no-padding">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                    <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                    </section>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </div> 
        </div>
          <?php endif; ?> 
          
          <?php if ($this->_tpl_vars['added_date3'] != ""): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="<?php echo $this->_tpl_vars['added_date3']; ?>
"><?php echo $this->_tpl_vars['added_date3']; ?>
</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num"><?php echo $this->_tpl_vars['total_videos3']; ?>
 VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                <?php if ($this->_tpl_vars['data2'] == 'false'): ?> 
                    <section class="box">
                        <b><?php echo $this->_tpl_vars['added_date2']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
                        <div class="visible-lg visible-md col-lg-12 col-md-12 no-padding">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                    <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                    </section>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </div> 
        </div>
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['added_date4'] != ""): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="<?php echo $this->_tpl_vars['added_date4']; ?>
"><?php echo $this->_tpl_vars['added_date4']; ?>
</time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num"><?php echo $this->_tpl_vars['total_videos4']; ?>
 VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                <?php if ($this->_tpl_vars['data2'] == 'false'): ?> 
                    <section class="box">
                        <b><?php echo $this->_tpl_vars['added_date2']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                    <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
                        <div class="visible-lg visible-md col-lg-12 col-md-12 no-padding">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class=" col-sm-6 col-xs-7 no-padding">
                                <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                    <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                <strong class="title col-sm-12 col-xs-12">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                                <span class="col-sm-12 col-xs-12">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                    </section>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                </div> 
            </div>
          <?php endif; ?>
          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
              <?php echo $this->_tpl_vars['pagination_code']; ?>

              </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">
            <a id="top"></a>
            <?php if ($this->_tpl_vars['ad_14'] != ''): ?>
            <div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_14']; ?>
</div>
            <?php endif; ?>
          </div>
        </div>
    </div>
<div class="clear-fix" style="margin-bottom: 10px"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array('p' => 'index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 