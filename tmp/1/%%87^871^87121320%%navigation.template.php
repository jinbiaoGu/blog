<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:48
         compiled from ./templates/admin/navigation.template */ ?>
        <div id="nav_bar">
            <div id="navigation">
             <?php echo $this->_tpl_vars['menu']->breadCrumbs($this->_tpl_vars['showOpt']); ?>

            </div>
			<?php if ($this->_tpl_vars['user']->isSiteAdmin() && ( $this->_tpl_vars['blog']->getOwnerId() != $this->_tpl_vars['user']->getId() )): ?>
            <div id="section_title_admin_mode">
                <h2><?php echo $this->_tpl_vars['title']; ?>
 [<?php echo $this->_tpl_vars['locale']->tr('admin_mode'); ?>
]</h2>
            </div>						
			<?php else: ?>
            <div id="section_title">
                <h2><?php echo $this->_tpl_vars['title']; ?>
</h2>
            </div>						
			<?php endif; ?>
            <br style="clear:both;" />
        </div>
        <?php if ($this->_tpl_vars['templatename'] != 'main' && $this->_tpl_vars['templatename'] != 'controlcenter' && $this->_tpl_vars['templatename'] != 'adminsettings' && $this->_tpl_vars['templatename'] != 'resourcesgroup' && $this->_tpl_vars['templatename'] != 'error' && $this->_tpl_vars['templatename'] != 'message'): ?>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/menutabs.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>