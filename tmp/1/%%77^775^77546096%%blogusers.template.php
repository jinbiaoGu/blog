<?php /* Smarty version 2.6.26, created on 2018-01-31 13:25:31
         compiled from admin/blogusers.template */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'check_perms', 'admin/blogusers.template', 54, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/header.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/navigation.template", 'smarty_include_vars' => array('showOpt' => 'showBlogUsers','title' => $this->_tpl_vars['locale']->tr('showBlogUsers'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript">
<?php echo '
YAHOO.util.Event.addListener( window, "load", function() {
		var t = new Lifetype.UI.TableEffects( "list" );
		t.stripe();
		t.highlightRows();
	});
'; ?>

</script>
        <form id="blogUsers" action="admin.php" method="post">
        <div id="list">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/successmessage.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/errormessage.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <table id="list" class="info" summary="<?php echo $this->_tpl_vars['locale']->tr('showBlogUsers'); ?>
">
                <thead>
                    <tr>
                        <th><input class="checkbox" type="checkbox" name="all" id="all" value="1" onclick="toggleAllChecks('blogUsers');" /></th>
                        <th style="width:20%;"><?php echo $this->_tpl_vars['locale']->tr('username'); ?>
</th>
                        <th style="width:40%;"><?php echo $this->_tpl_vars['locale']->tr('full_name'); ?>
</th>                        
                        <th style="width:30%;"><?php echo $this->_tpl_vars['locale']->tr('email'); ?>
</th>
                        <th style="width:10%;"><?php echo $this->_tpl_vars['locale']->tr('actions'); ?>
</th>
                    </tr>
                </thead>
                <?php if ($this->_tpl_vars['blogusers']): ?>
                <tbody>
                   <?php $_from = $this->_tpl_vars['blogusers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bloguser']):
?>
                    <tr>
                        <td>
                            <input class="checkbox" type="checkbox" name="userIds[<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
]" id="checks_1" value="<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
" />
                        </td>
                        <td class="col_highlighted">
                            <a id="user_<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
" href="?op=editBlogUser&amp;userId=<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
"><?php echo $this->_tpl_vars['bloguser']->getUsername(); ?>
</a>
							<?php $this->assign('blogId', $this->_tpl_vars['blog']->getId()); ?>
							<?php $this->assign('userPerms', $this->_tpl_vars['bloguser']->getPermissions($this->_tpl_vars['blogId'])); ?>
							<script type="text/javascript">
							  myTooltip = new YAHOO.widget.Tooltip("myTooltip", <?php echo '{'; ?>
  
							    context:"user_<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
",  
								text:"<?php echo $this->_tpl_vars['locale']->tr('permissions'); ?>
:<br/><?php $_from = $this->_tpl_vars['userPerms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['perm']):
?><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['perm']->getPermissionDescription()); ?>
<br/><?php endforeach; endif; unset($_from); ?>"
								<?php echo '}'; ?>
 );
							</script>
                        </td>
                        <td>
                            <?php echo $this->_tpl_vars['bloguser']->getFullName(); ?>

                        </td>                        
                        <td>
                            <a href="mailto:<?php echo $this->_tpl_vars['bloguser']->getEmail(); ?>
">
                            <?php echo $this->_tpl_vars['bloguser']->getEmail(); ?>

                            </a>
                        </td>
                        <td>
                            <div class="list_action_button">
							<?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_blog_users')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <a href="?op=editBlogUser&amp;userId=<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
" title="<?php echo $this->_tpl_vars['locale']->tr('edit'); ?>
">
	                           <img src="imgs/admin/icon_edit-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('edit'); ?>
" />
	                        </a>
                            <a href="?op=deleteBlogUserPermissions&amp;userId=<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
" title="<?php echo $this->_tpl_vars['locale']->tr('revoke_permissions'); ?>
">
	                           <img src="imgs/admin/icon_delete-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('revoke_permissions'); ?>
" />
	                        </a>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
                <?php endif; ?>
            </table>
        </div>
        <div id="list_action_bar">
			<?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_blog_users')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <input type="submit" name="delete" value="<?php echo $this->_tpl_vars['locale']->tr('revoke_permissions'); ?>
" class="submit" />
            <input type="hidden" name="op" value="deleteBlogUsersPermissions" />
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
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