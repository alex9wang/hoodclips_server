<?php /* Smarty version 2.6.20, created on 2015-05-20 11:57:37
         compiled from contact.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'echo_securimage_sid', 'contact.tpl', 80, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'general')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
<div class="container primary-content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 extra-space">
	  <div id="primary">
        <div class="tab-content">
          <div class="tab-pane active" id="contact-form">
          <h1><?php echo $this->_tpl_vars['lang']['contact_us']; ?>
</h1>
          <p class="lead"></p>
            <?php if (isset ( $this->_tpl_vars['err_captcha'] )): ?>
            <div class="alert alert-warning"><?php echo $this->_tpl_vars['err_captcha']; ?>
</div>
            <?php endif; ?>
            <?php if (isset ( $this->_tpl_vars['err_email'] )): ?>
            <div class="alert alert-warning"><?php echo $this->_tpl_vars['err_email']; ?>
</div>
            <?php endif; ?>
            <?php if (isset ( $this->_tpl_vars['err_msg'] )): ?>
            <div class="alert alert-warning"><?php echo $this->_tpl_vars['err_msg']; ?>
</div>
            <?php endif; ?>
            <?php if (isset ( $this->_tpl_vars['confirm_send'] )): ?>
            <div class="alert alert-success">
            <?php echo $this->_tpl_vars['lang']['contact_msg1']; ?>

            </div>
            <?php endif; ?>
          	<hr />
	    <?php if (! isset ( $this->_tpl_vars['confirm_send'] )): ?>
            <form class="form-horizontal" method="post" action="<?php echo @_URL; ?>
/contact_us.php">
              <div class="form-group">
                <label class="col-sm-2 control-label" for="your_name"><?php echo $this->_tpl_vars['lang']['your_name']; ?>
</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="your_name" value="<?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['s_name']; ?>
<?php else: ?><?php echo $_POST['your_name']; ?>
<?php endif; ?>">
                </div>
              </div>
             <div class="form-group">
                <label class="col-sm-2 control-label" for="your_name"><?php echo $this->_tpl_vars['lang']['your_name']; ?>
</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="your_name" value="<?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['s_name']; ?>
<?php else: ?><?php echo $_POST['your_name']; ?>
<?php endif; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="your_email"><?php echo $this->_tpl_vars['lang']['your_email']; ?>
</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" name="your_email" value="<?php if ($this->_tpl_vars['logged_in']): ?><?php echo $this->_tpl_vars['s_email']; ?>
<?php else: ?><?php echo $_POST['your_email']; ?>
<?php endif; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="importance"><?php echo $this->_tpl_vars['lang']['importance']; ?>
</label>
                <div class="col-sm-4">
                    <select name="importance" class="form-control">
                    <option value="<?php echo $this->_tpl_vars['lang']['low']; ?>
"><?php echo $this->_tpl_vars['lang']['low']; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['lang']['normal']; ?>
" selected="selected"><?php echo $this->_tpl_vars['lang']['normal']; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['lang']['high']; ?>
"><?php echo $this->_tpl_vars['lang']['high']; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['lang']['urgent']; ?>
"><?php echo $this->_tpl_vars['lang']['urgent']; ?>
</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="select"><?php echo $this->_tpl_vars['lang']['in_regard']; ?>
</label>
                <div class="col-sm-4">
                  <select name="select" class="form-control">
                    <option selected="selected"><?php echo $this->_tpl_vars['lang']['select']; ?>
</option>
                    <option><?php echo $this->_tpl_vars['lang']['bug_report']; ?>
</option>
                    <option><?php echo $this->_tpl_vars['lang']['suggestions']; ?>
</option>
                    <option><?php echo $this->_tpl_vars['lang']['general_q']; ?>
</option>
                    <option><?php echo $this->_tpl_vars['lang']['other']; ?>
</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="msg"><?php echo $this->_tpl_vars['lang']['your_message']; ?>
</label>
                <div class="col-sm-5">
                  <textarea id="msg" name="msg" rows="4" class="form-control textarea" placeholder=""><?php echo $_POST['msg']; ?>
</textarea>
                </div>
              </div>
            <?php if ($this->_tpl_vars['logged_in'] == 0): ?>
            <?php if ($this->_tpl_vars['spambot_prevention'] == 'securimage'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="msg"></label>
                <div class="col-sm-4">
                    <input type="text" name="imagetext" class="form-control" autocomplete="off" placeholder="<?php echo $this->_tpl_vars['lang']['enter_captcha']; ?>
">
                    <img src="<?php echo @_URL; ?>
/include/securimage_show.php?sid=<?php echo smarty_echo_securimage_sid(array(), $this);?>
" id="image" align="absmiddle" alt="" class="img-rounded">
                    <button class="btn btn-small btn-link" onclick="document.getElementById('image').src = '<?php echo @_URL; ?>
/include/securimage_show.php?sid=' + Math.random(); return false">
                    <i class="icon-refresh"></i>
                    </button>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['spambot_prevention'] == 'recaptcha'): ?>
            <div class="form-group">
                <div class="col-sm-4">
                    <?php echo $this->_tpl_vars['recaptcha_html']; ?>

                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="msg"></label>
                <div class="col-sm-4">
                  <button type="submit" name="Submit" value="<?php echo $this->_tpl_vars['lang']['submit_send_msg']; ?>
" class="btn btn-blue" data-loading-text="<?php echo $this->_tpl_vars['lang']['submit_send_msg']; ?>
"><?php echo $this->_tpl_vars['lang']['submit_send_msg']; ?>
</button>
                </div>
              </div>
            </form>
	  <?php endif; ?>
          </div>
          <!-- end pm-contact --> 
        </div>
	</div>
        <!-- end tag-content --> 
      </div>
      <!-- #sidebar --> 
    </div>
    <!-- .row-fluid --> 
  </div>
  <!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 