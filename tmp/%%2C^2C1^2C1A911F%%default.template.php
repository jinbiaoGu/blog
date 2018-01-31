<?php /* Smarty version 2.6.26, created on 2018-01-31 13:11:16
         compiled from admin/default.template */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['blogtemplate'])."/simpleheader.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="loginBox" style="padding-top: 180px;">
	   <form name="loginForm" method="post" action="admin.php">
		  <fieldset class="inputField">
		   <h4><?php echo $this->_tpl_vars['locale']->tr('login'); ?>
</h4> 
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['blogtemplate'])."/errormessage.template", 'smarty_include_vars' => array('message' => $this->_tpl_vars['viewErrorMessage'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['blogtemplate'])."/successmessage.template", 'smarty_include_vars' => array('message' => $this->_tpl_vars['viewSuccessMessage'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		   <?php if ($this->_tpl_vars['viewIsError'] == "" && $this->_tpl_vars['viewIsSuccess'] == ""): ?>
		     <div class="welcomeMessage">
		   	   <?php echo $this->_tpl_vars['locale']->tr('welcome_message'); ?>

			 </div>
			<?php endif; ?>	
		 <div class="field">
	       <label for="userName"><?php echo $this->_tpl_vars['locale']->tr('username'); ?>
</label>
		   <input type="text" tabindex="1" id="userName" name="userName" value="" />
		 </div>
		 <div class="field">  
		   <label for="userPassword"><?php echo $this->_tpl_vars['locale']->tr('password'); ?>
</label>
		   <input type="password" tabindex="2" name="userPassword" />
		 </div>
         <a href="summary.php?op=resetPasswordForm"><?php echo $this->_tpl_vars['locale']->tr('password_forgotten'); ?>
</a>
		</fieldset>
		<div class="buttons">
         <input type="submit" class="button" name="Login" value="<?php echo $this->_tpl_vars['locale']->tr('login'); ?>
" tabindex="3" />
         <input type="hidden" name="op" value="Login"/>		 
		</div> 
       </form>		
	</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['blogtemplate'])."/simplefooter.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>