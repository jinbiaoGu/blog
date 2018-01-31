<?php /* Smarty version 2.6.26, created on 2018-01-31 13:25:07
         compiled from admin/addbloguser.template */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/addbloguser.template', 14, false),array('block', 'check_perms', 'admin/addbloguser.template', 15, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/header.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/navigation.template", 'smarty_include_vars' => array('showOpt' => 'newBlogUser','title' => $this->_tpl_vars['locale']->tr('newBlogUser'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

 <form name="addBlogUser" id="addBlogUser" action="admin.php" method="post">
   <fieldset class="inputField">
  
     <legend><?php echo $this->_tpl_vars['locale']->tr('newBlogUser'); ?>
</legend>
     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/formvalidate.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

     <div class="field">
      <label for="userName"><?php echo $this->_tpl_vars['locale']->tr('username'); ?>
</label>
      <span class="required">*</span>
      <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('new_blog_username_help'); ?>
</div>
      <input type="text" id="userName" name="newBlogUserName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['newBlogUserName'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:50%" />
	  <?php $this->_tag_stack[] = array('check_perms', array('adminperm' => 'view_users')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	   <a href="#" onclick="window.open('?op=siteUsersChooser','UserChooser','scrollbars=yes,resizable=yes,toolbar=no,height=450,width=600');">
		<?php echo $this->_tpl_vars['locale']->tr('select'); ?>

	   </a>
	   <input type="hidden" id="userId" name="userId" value="" />		
	  <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/validate.template", 'smarty_include_vars' => array('field' => 'newBlogUserName','message' => $this->_tpl_vars['locale']->tr('error_invalid_user'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
     </div>

     <div class="field">
       <label for="sendNotification"><?php echo $this->_tpl_vars['locale']->tr('send_notification'); ?>
</label>      
       <div class="formHelp">
	    <input class="checkbox" type="checkbox" id="sendNotification" name="sendNotification" value="1" <?php if (isset ( $this->_tpl_vars['sendNotification'] )): ?>checked="checked"<?php endif; ?> />	   
	    <?php echo $this->_tpl_vars['locale']->tr('send_user_notification_help'); ?>

	  </div>
     </div>
     
     <div class="field">
      <label for="perm"><?php echo $this->_tpl_vars['locale']->tr('permissions'); ?>
</label>
      <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('blog_user_permissions_help'); ?>
</div>     
        <?php echo $this->_tpl_vars['locale']->tr('quick_permission_selection'); ?>

        </br>
        <select name="preselection" onChange="togglePermissionSets('addBlogUser', this.value);">
          <option value=""/><?php echo $this->_tpl_vars['locale']->tr('select'); ?>
</option>
          <option value="basic_blog_permission"/><?php echo $this->_tpl_vars['locale']->tr('basic_blog_permission'); ?>
</option>
          <option value="full_blog_permission"/><?php echo $this->_tpl_vars['locale']->tr('full_blog_permission'); ?>
</option>
        </select><br/>
     	<?php $_from = $this->_tpl_vars['perms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['permission']):
?>
     	 <?php if (! $this->_tpl_vars['permission']->isAdminOnlyPermission()): ?>
  		   <?php $this->assign('permId', $this->_tpl_vars['permission']->getId()); ?>
           <?php if ($this->_tpl_vars['permission']->getName() == 'blog_access'): ?>
             		     <input type="hidden" name="perm[<?php echo $this->_tpl_vars['permission']->getId(); ?>
]" value="<?php echo $this->_tpl_vars['permission']->getId(); ?>
" />
           <?php else: ?>
     	     <input type="checkbox" class="checkbox" name="perm[<?php echo $this->_tpl_vars['permission']->getId(); ?>
]" value="<?php echo $this->_tpl_vars['permission']->getId(); ?>
" <?php if ($this->_tpl_vars['perm'][$this->_tpl_vars['permId']] == $this->_tpl_vars['permission']->getId()): ?>checked="checked"<?php endif; ?> />
     	     <?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['permission']->getDescription()); ?>
<br/>
           <?php endif; ?>
     	 <?php endif; ?>
     	<?php endforeach; endif; unset($_from); ?>		
     </div>

    <div class="field">
      <label for="newBlogUserText"><?php echo $this->_tpl_vars['locale']->tr('notification_text'); ?>
</label>
      <span class="required">*</span>
      <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('notification_text_help'); ?>
</div>
      <textarea rows="10" cols="70" id="newBlogUserText" name="newBlogUserText"><?php echo $this->_tpl_vars['newBlogUserText']; ?>
</textarea>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/validate.template", 'smarty_include_vars' => array('field' => 'newBlogUserText','message' => $this->_tpl_vars['locale']->tr('error_empty_text'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
  </fieldset>
  <div class="buttons">  
    <input type="reset" value="<?php echo $this->_tpl_vars['locale']->tr('reset'); ?>
" name="reset" />
    <input type="submit" name="Add this user" value="<?php echo $this->_tpl_vars['locale']->tr('add'); ?>
"/>
    <input type="hidden" name="op" value="addBlogUser"/>
  </div> 
 </form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/footernavigation.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/footer.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>