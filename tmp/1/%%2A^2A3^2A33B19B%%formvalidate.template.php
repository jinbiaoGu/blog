<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:56
         compiled from ./templates/admin/formvalidate.template */ ?>
  <?php if ($this->_tpl_vars['form']->formHasRun()): ?>
    <?php if (! $this->_tpl_vars['form']->formIsValid()): ?>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/errormessage.template", 'smarty_include_vars' => array('message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
  <?php endif; ?>  
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/successmessage.template", 'smarty_include_vars' => array('message' => $this->_tpl_vars['message'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>