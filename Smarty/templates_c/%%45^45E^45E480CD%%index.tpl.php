<?php /* Smarty version 2.6.20, created on 2016-08-01 17:37:53
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'trending.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="container">
    <div id="main-video-contents" class="row primary-content">
        <div class="seperator hidden-lg hidden-md"></div>
        <div class="header-mobile-ad hidden-lg hidden-md" style="padding-top:5px">

            <center>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- hoodclips_mobile_main_ad -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:300px;height:250px"
                     data-ad-client="ca-pub-7913152423620879"
                     data-ad-slot="2292181545"></ins>
                <script>
                <?php echo '
                (adsbygoogle = window.adsbygoogle || []).push({});
                '; ?>

                </script>
            </center>
        </div>  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding hidden-sm hidden-xs">
        <div style="margin:10px 10px 10px 10px">
            <?php if ($this->_tpl_vars['page_number'] == ""): ?>
            <!--<header class="heading">
                <h1><b>FEATURED <b><mark><b>VIDEOS<b></mark></h1>
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
            </div>-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
            <section class="<?php if ($this->_tpl_vars['fvid_s1_type'] == 1): ?> video exclusive <?php else: ?>video exclusive2<?php endif; ?>">
                <a class="front-featured" data-fancybox-type="iframe" href="<?php echo $this->_tpl_vars['fvid_s1_url']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['fvid_s1_thumb']; ?>
" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" height="371" alt="">	           
                    <strong class="tag">
                        <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ic_white_logo.png" alt="" width="18px">
                        <?php if ($this->_tpl_vars['fvid_s1_type'] == 1): ?> Hoodclips Exclusive <?php else: ?>Sponsored<?php endif; ?>
                    </strong>                                        
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
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding">
            <section class="<?php if ($this->_tpl_vars['fvid_s2_type'] == 1): ?> video secondary exclusive <?php else: ?>video secondary exclusive2<?php endif; ?>">
                <a class="front-featured" data-fancybox-type="iframe" href="<?php echo $this->_tpl_vars['fvid_s2_url']; ?>
">
                    <img src="<?php echo $this->_tpl_vars['fvid_s2_thumb']; ?>
" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding" height="371" alt="">	           
                    <strong class="tag">
                        <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ic_white_logo.png" alt="" width="18px">
                        <?php if ($this->_tpl_vars['fvid_s2_type'] == 1): ?> Hoodclips Exclusive <?php else: ?>Sponsored<?php endif; ?>
                    </strong>                                        
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
          <?php endif; ?>              
        </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md align-center">
            <a id="top"></a>
            <?php if ($this->_tpl_vars['ad_12'] != ''): ?>
                <div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_12']; ?>
</div>
            <?php endif; ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="seperator"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading hidden-sm hidden-xs">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="title">
                            <time datetime="<?php echo $this->_tpl_vars['added_date1']; ?>
">
                                <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ic_gun.png" alt="" class="title-gun">
                                <b><?php echo $this->_tpl_vars['added_date1']; ?>
</b>
                            </time>
                        </h1>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                        <span class="num"><?php echo $this->_tpl_vars['total_videos1']; ?>
 VIDEOS</span>
                    </div>
                </div>
            </header>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding bg-white">
                  <?php $this->assign('count', 0); ?>
                <?php if ($this->_tpl_vars['data1'] == 'false'): ?> 
                    <section class="box  hidden-sm hidden-xs">
                        <b><?php echo $this->_tpl_vars['added_date1']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                    <?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <?php if (!($this->_tpl_vars['count'] % 5)): ?>
                        <!-- <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos1_<?php echo $this->_tpl_vars['count']; ?>
" data-testmode="false"></div>
                            <div id="ad_root_videos1_<?php echo $this->_tpl_vars['count']; ?>
">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php endif; ?>
                    </section>
                    <?php if (!($this->_tpl_vars['count'] % 4)): ?>
                        <div class="clearfix"></div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                <?php if (false && $this->_tpl_vars['date'] != 'false'): ?>                    
                <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12 visible-lg visible-md box">
                    <a href="<?php echo @_URL; ?>
/submit_video.php">
                        <span class="submit-video">SUBMIT YOUR VIDEO</span>
                    </a>
                </section>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md align-center">
                <a id="top"></a>
                <?php if ($this->_tpl_vars['ad_13'] != ''): ?>
                    <div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_13']; ?>
</div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($this->_tpl_vars['added_date2'] != ""): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  no-padding">
            <div class="seperator  hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading  hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="<?php echo $this->_tpl_vars['added_date2']; ?>
">
                                <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ic_gun.png" alt="" class="title-gun">
                                <b><?php echo $this->_tpl_vars['added_date2']; ?>
</b>
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
                <?php $this->assign('count', 0); ?>
                <?php if ($this->_tpl_vars['data2'] == 'false'): ?>     
                <section class="box  hidden-sm hidden-xs">
                        <b><?php echo $this->_tpl_vars['added_date2']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                     <?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <?php if (!($this->_tpl_vars['count'] % 5)): ?>
                        <!-- <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos2_<?php echo $this->_tpl_vars['count']; ?>
" data-testmode="false"></div>
                            <div id="ad_root_videos2_<?php echo $this->_tpl_vars['count']; ?>
">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php endif; ?>
                    </section>
                        <?php if (!($this->_tpl_vars['count'] % 4)): ?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </div> 
        </div>
          <?php endif; ?> 
          
          <?php if ($this->_tpl_vars['added_date3'] != ""): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="seperator  hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading  hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="<?php echo $this->_tpl_vars['added_date3']; ?>
">
                                <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ic_gun.png" alt="" class="title-gun">
                                <b><?php echo $this->_tpl_vars['added_date3']; ?>
</b>
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
               <?php $this->assign('count', 0); ?>
                <?php if ($this->_tpl_vars['data3'] == 'false'): ?> 
                    <section class="box  hidden-sm hidden-xs">
                        <b><?php echo $this->_tpl_vars['added_date3']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                    <?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <?php if (!($this->_tpl_vars['count'] % 5)): ?>
                        <!-- <div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos3_<?php echo $this->_tpl_vars['count']; ?>
" data-testmode="false"></div>
                            <div id="ad_root_videos3_<?php echo $this->_tpl_vars['count']; ?>
">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php endif; ?>
                    </section>
                    <?php if (!($this->_tpl_vars['count'] % 4)): ?>
                        <div class="clearfix"></div>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            </div> 
        </div>
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['added_date4'] != ""): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
            <div class="seperator  hidden-sm hidden-xs"></div>
            <header class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading  hidden-sm hidden-xs" style="padding: 20px 0px 20px 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h1 class="align-center">
                            <time datetime="<?php echo $this->_tpl_vars['added_date4']; ?>
">
                                <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ic_gun.png" alt="" class="title-gun">
                                <b><?php echo $this->_tpl_vars['added_date4']; ?>
</b>
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
                  <?php $this->assign('count', 0); ?>
                <?php if ($this->_tpl_vars['data4'] == 'false'): ?> 
                    <section class="box  hidden-sm hidden-xs">
                        <b><?php echo $this->_tpl_vars['added_date4']; ?>
 No Videos found</b>
                    </section>                                              
                <?php else: ?>
                <?php $_from = $this->_tpl_vars['video_listing4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['video_data']):
?>
                     <?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
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
                        <div class="visible-sm visible-xs col-sm-offset-2 col-xs-offset-1 col-sm-8 col-xs-10 no-padding recommend-video-box">
                            <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
" class="video-box">
                                <img src="<?php echo $this->_tpl_vars['video_data']['thumb_img_url']; ?>
" alt="<?php echo $this->_tpl_vars['video_data']['attr_alt']; ?>
" class="img-responsive">
                            </a>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <strong class="title">
                                    <a href="<?php echo $this->_tpl_vars['video_data']['video_href']; ?>
"><?php echo $this->_tpl_vars['video_data']['video_title']; ?>
</a>
                                </strong>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="pm-video-attr-numbers">
                                    <small><?php echo $this->_tpl_vars['video_data']['views_compact']; ?>
 <?php echo $this->_tpl_vars['lang']['views']; ?>
</small>
                                </span>
                            </div>
                        </div>
                        <?php if (!($this->_tpl_vars['count'] % 5)): ?>
                        <!--<div class="visible-sm visible-xs col-sm-12 col-xs-12 no-padding">
                            <div class="fb-ad" data-placementid="1569665693333635_1571463626487175" data-format="native" data-nativeadid="ad_root_videos4_<?php echo $this->_tpl_vars['count']; ?>
" data-testmode="false"></div>
                            <div id="ad_root_videos4_<?php echo $this->_tpl_vars['count']; ?>
">
                                <div class=" col-sm-6 col-xs-7 no-padding">
                                    <a class="fbAdLink video-box">
                                        <div class="fbAdMedia img-responsive"></div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xs-5" style="padding: 3px 1px">
                                    <strong class="title col-sm-12 col-xs-12">
                                        <a class="fbAdLink"><div class="fbAdTitle"></div></a>
                                    </strong>
                                    <span class="col-sm-12 col-xs-12 ">
                                        <small><div class="fbAdBody"></div></small>
                                    </span>
                                    <div class="btn-success col-sm-12 col-xs-12">
                                        <div class="fbAdCallToAction"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php endif; ?>
                    </section>
                                <?php if (!($this->_tpl_vars['count'] % 4)): ?>
                                    <div class="clearfix"></div>
                                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                </div> 
            </div>
          <?php endif; ?>
          
          <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
              <?php echo $this->_tpl_vars['pagination_code']; ?>

              </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md align-center">
            <a id="top"></a>
            <?php if ($this->_tpl_vars['ad_14'] != ''): ?>
                <div class="pm-ad-zone" align="center"><?php echo $this->_tpl_vars['ad_14']; ?>
</div>
            <?php endif; ?>
          </div>-->
        </div>
    </div>
    <div id="loading-bar" class="row">
            <img src="<?php echo @_URL; ?>
/templates/<?php echo $this->_tpl_vars['template_dir']; ?>
/img/ajax-loading.gif" alt="" >
    </div>

<div class="clear-fix" style="margin-bottom: 10px"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array('p' => 'index')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 

				