<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:48
         compiled from ./templates/admin/menutabs.template */ ?>
            <ul id="tablist">
                <?php $this->assign('options', $this->_tpl_vars['menu']->getOpts($this->_tpl_vars['showOpt'])); ?>
                <?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
                  <?php if ($this->_tpl_vars['option']->getAttribute('ignoreTab') != 1 && $this->_tpl_vars['menu']->userCanSee ( $this->_tpl_vars['option'] , $this->_tpl_vars['user'] )): ?>
                    <?php $this->assign('name', $this->_tpl_vars['option']->name); ?>
                    <li <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['showOpt']): ?> id="tab_active" <?php endif; ?>>
                      <a <?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['showOpt']): ?> id="tab_current" <?php endif; ?> href="<?php echo $this->_tpl_vars['option']->getAttribute('url'); ?>
"><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['name']); ?>
</a>
                    </li>
                      <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
