<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:48
         compiled from ./templates/admin/errormessage.template */ ?>
<?php if ($this->_tpl_vars['viewIsError']): ?>
<div id="FormError">
  <img src="imgs/admin/icon_warning-16.png" alt="Info" class="InfoIcon" />
  <p class="ErrorText"><?php if ($this->_tpl_vars['message'] == ""): ?><?php echo $this->_tpl_vars['viewErrorMessage']; ?>
<?php else: ?><?php echo $this->_tpl_vars['message']; ?>
<?php endif; ?></p>
</div>
<?php endif; ?>