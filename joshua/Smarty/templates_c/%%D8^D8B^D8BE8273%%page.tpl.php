<?php /* Smarty version 2.6.20, created on 2015-05-20 04:04:37
         compiled from page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'page.tpl', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('p' => 'article')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
<div id="wrapper">
<?php if ($this->_tpl_vars['show_addthis_widget'] == '1'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'widget-addthis.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
    <section>
        <div class="heading">
            <h1 class="single-page-title">
                <?php $this->assign('splitArray', ((is_array($_tmp=' ')) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['page']['title']) : explode($_tmp, $this->_tpl_vars['page']['title']))); ?>
                <?php $_from = 'splitArray'; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key']):
?>

                <?php endforeach; endif; unset($_from); ?>
                <?php echo $this->_tpl_vars['page']['titleFirstWord']; ?>

                <mark><?php echo $this->_tpl_vars['page']['titleSndWord']; ?>
</mark>
            </h1>
        </div>
    </section>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12 extra-space">
		<div id="primary">
                    <p class="single-page-desc"><?php echo $this->_tpl_vars['page']['content']; ?>
</p>
		</div><!-- #primary -->
        </div><!-- #content -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>