<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:56
         compiled from ./templates/admin/validate.template */ ?>
<?php if ($this->_tpl_vars['form']->formHasRun()): ?>
	<?php if (! $this->_tpl_vars['form']->isFieldValid($this->_tpl_vars['field'])): ?>
		<div class="fieldValidationError">
		  <span style="background:red;color:white;font-weight:bold">&nbsp;!&nbsp;</span>&nbsp;
		  <?php echo $this->_tpl_vars['message']; ?>

		</div>  
	<?php endif; ?>
<?php endif; ?>