<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:56
         compiled from ./templates/admin/newpost_customfields.template */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './templates/admin/newpost_customfields.template', 7, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
  <?php $this->assign('fieldId', $this->_tpl_vars['field']->getId()); ?>
  <?php if ($this->_tpl_vars['field']->getType() == 1 && ( $this->_tpl_vars['type'] == 1 || $this->_tpl_vars['type'] == "" )): ?>
    <div class="field">
	  <label for="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]"><?php echo $this->_tpl_vars['field']->getName(); ?>
</label>
	  <div class="formHelp"><?php echo $this->_tpl_vars['field']->getDescription(); ?>
</div>
      <input type="text" name="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" id="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customField'][$this->_tpl_vars['fieldId']])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
	</div>  
  <?php elseif ($this->_tpl_vars['field']->getType() == 2 && ( $this->_tpl_vars['type'] == 2 || $this->_tpl_vars['type'] == "" )): ?>
    <div class="field">
	  <label for="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]"><?php echo $this->_tpl_vars['field']->getName(); ?>
</label>
	  <div class="formHelp"><?php echo $this->_tpl_vars['field']->getDescription(); ?>
</div>
      <textarea name="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" id="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" rows="10" style="width:100%"><?php echo $this->_tpl_vars['customField'][$this->_tpl_vars['fieldId']]; ?>
</textarea>
	</div>  
  <?php elseif ($this->_tpl_vars['field']->getType() == 3 && ( $this->_tpl_vars['type'] == 3 || $this->_tpl_vars['type'] == "" )): ?>
    <div class="field_checkbox">    
	  <input class="checkbox" type="checkbox" id="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" name="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" value="1" <?php if ($this->_tpl_vars['customField'][$this->_tpl_vars['fieldId']] == '1'): ?>checked="checked"<?php endif; ?> />
	  <label for="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]"><?php echo $this->_tpl_vars['field']->getDescription(); ?>
</label>	  
	</div>  
  <?php elseif ($this->_tpl_vars['field']->getType() == 4 && ( $this->_tpl_vars['type'] == 4 || $this->_tpl_vars['type'] == "" )): ?>
    <div class="field">
	  <label for="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]"><?php echo $this->_tpl_vars['field']->getName(); ?>
</label>
	  <div class="formHelp"><?php echo $this->_tpl_vars['field']->getDescription(); ?>
</div>
      <input name="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" class="dateTime" id="customField_<?php echo $this->_tpl_vars['fieldId']; ?>
" readonly="true" type="text" size="16" value="<?php echo $this->_tpl_vars['customField'][$this->_tpl_vars['fieldId']]; ?>
" />
      <img src="imgs/admin/cal.jpg" id="customField_<?php echo $this->_tpl_vars['fieldId']; ?>
_Selector" alt="<?php echo $this->_tpl_vars['locale']->tr('pick_date'); ?>
" style="cursor: pointer; border: 0px; width: 16px; height: 14px; padding: 0;" />
	</div>  
    <script type="text/javascript">
        var MondayFirstDay = ( 1 == 1);
        Calendar.setup({
            inputField  : "customField_<?php echo $this->_tpl_vars['fieldId']; ?>
",
            ifFormat    : "%d/%m/%Y %H:%M",
            button      : "customField_<?php echo $this->_tpl_vars['fieldId']; ?>
_Selector",
            showsTime   : true,
            timeFormat  : "24",
            electric    : false,
            align       : "Bl",
            firstDay    : MondayFirstDay,
            singleClick : true
        });
    </script>

	<?php elseif ($this->_tpl_vars['field']->getType() == 5 && ( $this->_tpl_vars['type'] == 5 || $this->_tpl_vars['type'] == "" )): ?>
    <div class="field">
	  <label for="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]"><?php echo $this->_tpl_vars['field']->getName(); ?>
</label>
	  <div class="formHelp"><?php echo $this->_tpl_vars['field']->getDescription(); ?>
</div>
	  <select name="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]" id="customField[<?php echo $this->_tpl_vars['fieldId']; ?>
]">
		<?php $_from = $this->_tpl_vars['field']->getFieldValues(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
		  <option value="<?php echo $this->_tpl_vars['value']; ?>
" <?php if ($this->_tpl_vars['customField'][$this->_tpl_vars['fieldId']] == $this->_tpl_vars['value']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['value']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
	  </select>
	</div> 	
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>