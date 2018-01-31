<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:56
         compiled from admin/newpost.template */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/newpost.template', 21, false),array('block', 'check_perms', 'admin/newpost.template', 138, false),)), $this); ?>
<?php $this->assign('editor', 1); ?>
<?php $this->assign('htmlarea', $this->_tpl_vars['blogsettings']->getValue('htmlarea_enabled')); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/header.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/navigation.template", 'smarty_include_vars' => array('showOpt' => 'newPost','title' => $this->_tpl_vars['locale']->tr('newPost'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 <script type="text/javascript" src="js/ui/plogui.js"></script>
 <link rel="stylesheet" type="text/css" media="all" href="js/jscalendar/calendar-win2k-cold-1.css" title="win2k-cold-1" />
 <script type="text/javascript" src="js/jscalendar/calendar_stripped.js"></script>
 <script type="text/javascript" src="js/jscalendar/lang/calendar-en.js"></script>
 <script type="text/javascript" src="js/jscalendar/calendar-setup_stripped.js"></script>
 <script type="text/javascript" src="js/ui/autosave.js"></script>
 <script type="text/javascript">
  
  // some messages that we are going to need in the functions above
  var msgErrorMakingRequest = "<?php echo $this->_tpl_vars['locale']->tr('error_sending_request'); ?>
";
  var msgErrorNoCategorySelected = "<?php echo $this->_tpl_vars['locale']->tr('error_no_category_selected'); ?>
";
  var xmlHttpRequestSupportEnabled = '<?php echo $this->_tpl_vars['xmlHttpRequestSupportEnabled']; ?>
';
  var htmlAreaEnabled = <?php if ($this->_tpl_vars['htmlarea'] == 0 || ! $this->_tpl_vars['htmlarea']): ?>false<?php else: ?>true<?php endif; ?>;
  var msgErrorPostTopic = "<?php echo $this->_tpl_vars['locale']->tr('error_missing_post_topic'); ?>
";
  var msgErrorPostText = "<?php echo $this->_tpl_vars['locale']->tr('error_missing_post_text'); ?>
";
  var msgSaving = "<?php echo $this->_tpl_vars['locale']->tr('saving_message'); ?>
";
  var msgAutoSaveMessage = '<?php echo ((is_array($_tmp=$this->_tpl_vars['locale']->tr('warning_autosave_message'))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
  
  var todayDay = '<?php echo $this->_tpl_vars['today']->getDay(); ?>
';
  var todayMonth = '<?php echo $this->_tpl_vars['today']->getMonth(); ?>
';
  var todayYear = '<?php echo $this->_tpl_vars['today']->getYear(); ?>
'; 
  
  // this needs to be pre-initialized
  var preview = false; 

<?php echo ' 
function selectOperation( t )
{
	if( preview ) {	
		document.newPost.op.value="previewPost";
		window.open("", t, "scrollbars=yes,resizable=yes,toolbar=no" );
		return true;
	}
	else {
		document.newPost.op.value="addPost";
		document.newPost.target="";
		document.newPost.action="admin.php";
		return true;
	}
}
'; ?>

</script>
 
  <form name="newPost" id="newPost" action="admin.php" method="post" onSubmit="return selectOperation(this.target);" target="admin">   
   <fieldset class="inputField">
   <legend><?php echo $this->_tpl_vars['locale']->tr('newPost'); ?>
</legend>
   <div id="mainPanel" style="float:left; width: 73%; border-right: 1px solid #DEDEDE;">
	   <div id="autoSaveMessage" style="display: none;"></div>
	   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/formvalidate.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>  
	   <div class="field">
	     <label for="postTopic"><?php echo $this->_tpl_vars['locale']->tr('topic'); ?>
</label>
		 <span class="required">*</span>
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('topic_help'); ?>
</div>
	     <input type="text" name="postTopic" style="width:100%" id="postTopic" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['postTopic'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
	     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/validate.template", 'smarty_include_vars' => array('field' => 'postTopic','message' => $this->_tpl_vars['locale']->tr('error_missing_post_topic'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	   </div>
	   
	   <!-- text field custom fields -->
	   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/newpost_customfields.template", 'smarty_include_vars' => array('type' => 1,'fields' => $this->_tpl_vars['customfields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	   
	   	 
	   <div class="field">
	     <label for="postText"><?php echo $this->_tpl_vars['locale']->tr('text'); ?>
</label>
		 <span class="required">*</span>
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('text_help'); ?>
</div>
	     <?php if (! $this->_tpl_vars['htmlarea']): ?><script type="text/javascript">var ed1 = new LifetypeUIEditor('postText','ed1');</script><?php endif; ?>
	     <textarea <?php if ($this->_tpl_vars['htmlarea'] == 1): ?>rows="20"<?php else: ?>rows="15"<?php endif; ?> id="postText" name="postText" style="width:100%"><?php echo $this->_tpl_vars['postText']; ?>
</textarea>
         <?php if (! $this->_tpl_vars['htmlarea']): ?>
           <a href="javascript:ed1.execute('postText','7_but_res','')"><?php echo $this->_tpl_vars['locale']->tr('insert_media'); ?>
</a> |
           <a href="javascript:ed1.execute('postText','8_but_more','')"><?php echo $this->_tpl_vars['locale']->tr('insert_more'); ?>
</a>
         <?php endif; ?>
	     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/validate.template", 'smarty_include_vars' => array('field' => 'postText','message' => $this->_tpl_vars['locale']->tr('error_missing_post_text'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>   
	   </div>

          <div class="field">
            <label for="trackbackUrls"><?php echo $this->_tpl_vars['locale']->tr('trackback_urls'); ?>
</label>
                <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('trackback_urls_help'); ?>
</div>
            <textarea rows="5" id="trackbackUrls" name="trackbackUrls" style="width:100%"><?php echo $this->_tpl_vars['trackbackUrls']; ?>
</textarea>
          </div>
	   
	   <!-- text area custom fields -->
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/newpost_customfields.template", 'smarty_include_vars' => array('type' => 2,'fields' => $this->_tpl_vars['customfields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   </div>

   <div id="optionPanel" style="float:left; width: 23%; margin-left: 8px;">
	   <div class="field">
	     <label for="postSlug"><?php echo $this->_tpl_vars['locale']->tr('post_slug'); ?>
</label>
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('post_slug_help'); ?>
</div>
	     <input type="text" name="postSlug" id="postSlug" style="width:100%" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['postSlug'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
	   </div>

       <div class="field">
   	     <label for="postDateTime"><?php echo $this->_tpl_vars['locale']->tr('date'); ?>
</label>
		 <span class="required">*</span>
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('post_date_help'); ?>
</div>
	     <input name="postDateTime" id="postDateTime" class="dateTime" readonly="true" type="text" size="16" value="<?php echo $this->_tpl_vars['postDateTime']; ?>
" style="margin-bottom: 4px;" />
	     <img src="imgs/admin/cal.jpg" id="postDateTimeSelector" alt="<?php echo $this->_tpl_vars['locale']->tr('date'); ?>
" style="cursor: pointer; border: 0px; width: 16px; height: 14px; padding: 0;" />
	   </div>

	   <script type="text/javascript">
	   var MondayFirstDay = ( <?php echo $this->_tpl_vars['locale']->firstDayOfWeek(); ?>
 == 1);
       <?php echo '
	       Calendar.setup({
	           inputField  : "postDateTime",
	           ifFormat    : "%d/%m/%Y %H:%M",
	           button      : "postDateTimeSelector",
	           showsTime   : true,
	           timeFormat  : "24",
	           electric    : false,
	           align       : "Bl",
	           firstDay    : MondayFirstDay,
	           singleClick : true
	       });
	   '; ?>

	   </script>
	   
	   <!-- date custom fields -->
	   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/newpost_customfields.template", 'smarty_include_vars' => array('type' => 4,'fields' => $this->_tpl_vars['customfields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	   
	   <div class="field">
         <label for="postStatus"><?php echo $this->_tpl_vars['locale']->tr('status'); ?>
</label>
		 <span class="required">*</span>		 
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('post_status_help'); ?>
</div>
		 <select name="postStatus" id="postStatus">
		   <?php $_from = $this->_tpl_vars['poststatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['status']):
?>
             <?php if ($this->_tpl_vars['name'] != 'post_status_deleted'): ?>
               <option value="<?php echo $this->_tpl_vars['status']; ?>
" <?php if ($this->_tpl_vars['postStatus'] == $this->_tpl_vars['status']): ?>
                  selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['name']); ?>
</option>
             <?php endif; ?>
		   <?php endforeach; endif; unset($_from); ?>
         </select>	   
	   </div>
	
	  <!-- user field -->
	  <?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_all_user_articles')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	   <div class="field">
		<?php if (empty ( $this->_tpl_vars['postUser'] )): ?><?php $this->assign('postUser', $this->_tpl_vars['user']->getId()); ?><?php endif; ?>
        <label for="postUser"><?php echo $this->_tpl_vars['locale']->tr('posted_by'); ?>
</label>
		 <span class="required">*</span>		 
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('posted_by_help'); ?>
</div>
		 <select name="postUser" id="postUser">
		   <?php $_from = $this->_tpl_vars['blog']->getUsersInfo(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bloguser']):
?>
			<option value="<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
" <?php if ($this->_tpl_vars['postUser'] == $this->_tpl_vars['bloguser']->getId()): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['bloguser']->getUserName(); ?>
</option>
		   <?php endforeach; endif; unset($_from); ?>
        </select>	   
	   </div>
	   <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	   
	   <div class="field">
         <label for="postCategories[]"><?php echo $this->_tpl_vars['locale']->tr('categories'); ?>
</label>
		 <span class="required">*</span>
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('post_categories_help'); ?>
</div>
         <select name="postCategories[]" id="postCategories" size="5" multiple="multiple" style="width:100%">
           <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['categories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['categories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category']):
        $this->_foreach['categories']['iteration']++;
?>
           <option value="<?php echo $this->_tpl_vars['category']->getId(); ?>
" <?php if (($this->_foreach['categories']['iteration'] <= 1)): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['category']->getName(); ?>
</option>
           <?php endforeach; endif; unset($_from); ?>
         </select>
         <input type="text" name="newArticleCategory" id="newArticleCategory" style="width:100px; margin-top:3px;" size="16" value="" />
         <input type="button" name="addArticleCategory" id="addArticleCategory" style="width:auto;margin-top:3px;" value="<?php echo $this->_tpl_vars['locale']->tr('add'); ?>
" onclick="javascript:addArticleCategoryAjax()" />
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/validate.template", 'smarty_include_vars' => array('field' => 'postCategories','message' => $this->_tpl_vars['locale']->tr('error_no_category_selected'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	   
	   </div>
	   
      <div class="field">
         <label for="globalArticleCategoryId"><?php echo $this->_tpl_vars['locale']->tr('global_category'); ?>
</label>
		 <span class="required">*</span>
		 <div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('global_article_category_help'); ?>
</div>
	    <select name="globalArticleCategoryId" id="globalArticleCategoryId" size="1" style="width:100%">
	       <option value="0"><?php echo $this->_tpl_vars['locale']->tr('none'); ?>
</option>
           <?php if ($this->_tpl_vars['globalArticleCategoryId']): ?>
	           <?php $_from = $this->_tpl_vars['globalcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['globalcategory']):
?>
	           <option value="<?php echo $this->_tpl_vars['globalcategory']->getId(); ?>
" <?php if ($this->_tpl_vars['globalcategory']->getId() == $this->_tpl_vars['globalArticleCategoryId']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['globalcategory']->getName(); ?>
</option>
	           <?php endforeach; endif; unset($_from); ?>
           <?php else: ?>
	           <?php $_from = $this->_tpl_vars['globalcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['globalcategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['globalcategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['globalcategory']):
        $this->_foreach['globalcategories']['iteration']++;
?>
	           <option value="<?php echo $this->_tpl_vars['globalcategory']->getId(); ?>
"><?php echo $this->_tpl_vars['globalcategory']->getName(); ?>
</option>
	           <?php endforeach; endif; unset($_from); ?>
	       <?php endif; ?>
         </select>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/validate.template", 'smarty_include_vars' => array('field' => 'globalArticleCategoryId','message' => $this->_tpl_vars['locale']->tr('error_no_global_article_category_selected'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	   
       </div>	  

	   <!-- list custom fields -->
	   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/newpost_customfields.template", 'smarty_include_vars' => array('type' => 5,'fields' => $this->_tpl_vars['customfields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   
       <div class="field_checkbox">
         <input class="checkbox" type="checkbox" id="commentsEnabled" name="commentsEnabled" value="1" <?php if ($this->_tpl_vars['commentsEnabled']): ?> checked="checked" <?php endif; ?>/>
		 <label for="commentsEnabled"><?php echo $this->_tpl_vars['locale']->tr('post_comments_enabled_help'); ?>
</label>
	   </div>
   
       <div class="field_checkbox">
	     <input class="checkbox" type="checkbox" name="sendNotification" id="sendNotification" value="1" <?php if ($this->_tpl_vars['sendNotification']): ?> checked="checked" <?php endif; ?>/>
		 <label for="sendNotification"><?php echo $this->_tpl_vars['locale']->tr('send_notification_help'); ?>
</label>
	   </div>

       <div class="field_checkbox">
	     <input class="checkbox" type="checkbox" name="sendTrackbacks" id="sendTrackbacks" value="1" <?php if ($this->_tpl_vars['sendTrackbacks']): ?> checked="checked" <?php endif; ?>/>  
		 <label for="sendTrackbacks"><?php echo $this->_tpl_vars['locale']->tr('send_trackback_pings_help'); ?>
</label>
	   </div>
        
	   <div class="field_checkbox">	
         <?php if ($this->_tpl_vars['xmlRpcPingEnabled']): ?>
		 <input class="checkbox" type="checkbox" name="sendPings" id="sendPings" value="1" <?php if ($this->_tpl_vars['sendPings']): ?> checked="checked" <?php endif; ?>/>
		 <label for="sendPings"><?php echo $this->_tpl_vars['locale']->tr('send_xmlrpc_pings_help'); ?>
</label>
		 <?php endif; ?>
      </div>

	  <!-- checkbox custom fields -->
	   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/newpost_customfields.template", 'smarty_include_vars' => array('type' => 3,'fields' => $this->_tpl_vars['customfields'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

      <div class="field">
       	<br /><label for="bookmarklet"><?php echo $this->_tpl_vars['locale']->tr('bookmarklet'); ?>
</label>
       	<div class="formHelp"><?php echo $this->_tpl_vars['locale']->tr('bookmarklet_help'); ?>
</div>
		<a href="javascript:bm=document.selection?document.selection.createRange().text:window.getSelection();void(ltbm=window.open('<?php echo $this->_tpl_vars['url']->getAdminUrl(); ?>
?op=newPost&amp;sendTrackbacks=1&amp;postText='+encodeURIComponent('&lt;p&gt;'+bm+' ... '+'&lt;a href=&quot;'+window.location.href+'&quot;&gt;'+'<?php echo $this->_tpl_vars['locale']->tr('original_post'); ?>
'+'&lt;/a&gt;&lt;/p&gt;'),'ltbm','toolbar=1,status=1,location=1,scrollbars=1,menubar=1,resizable=1'))" onclick="window.alert('<?php echo $this->_tpl_vars['locale']->tr('bookmarklet_help'); ?>
');"><?php echo $this->_tpl_vars['locale']->tr('blogit_to_lifetype'); ?>
</a> 
      </div>
	  
	</div>
	</fieldset>
    <div class="buttons">
		<input type="button" name="saveDraftAndContinue" value="<?php echo $this->_tpl_vars['locale']->tr('save_draft_and_continue'); ?>
" onclick="javascript:saveDraftArticleAjax()" />
		<input type="submit" name="previewPost" value="<?php echo $this->_tpl_vars['locale']->tr('preview'); ?>
" onClick="preview=true"/>
		<input type="submit" name="addPost" value="<?php echo $this->_tpl_vars['locale']->tr('add_post'); ?>
" onClick="preview=false" />
		<input type="hidden" name="op" value="addPost" />
		<input type="hidden" name="postId" id="postId" value="<?php echo $this->_tpl_vars['postId']; ?>
" />
    </div>
  </form>
  <script type="text/javascript">
    initialAutoSave();
    startAutoSave();
  </script>
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