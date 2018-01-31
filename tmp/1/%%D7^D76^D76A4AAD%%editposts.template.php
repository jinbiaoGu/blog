<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:48
         compiled from admin/editposts.template */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/editposts.template', 69, false),array('modifier', 'strip_tags', 'admin/editposts.template', 122, false),array('block', 'check_perms', 'admin/editposts.template', 92, false),array('function', 'adminpager', 'admin/editposts.template', 193, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/header.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/navigation.template", 'smarty_include_vars' => array('showOpt' => 'editPosts','title' => $this->_tpl_vars['locale']->tr('editPosts'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<script type="text/javascript" src="js/ui/plogui.js"></script>
	<script type="text/javascript">
		var errorPostStatusMsg = '<?php echo $this->_tpl_vars['locale']->tr('error_post_status'); ?>
';
		var showMassiveChangeOption = '<?php echo $this->_tpl_vars['locale']->tr('show_massive_change_option'); ?>
';
		var hideMassiveChangeOption = '<?php echo $this->_tpl_vars['locale']->tr('hide_massive_change_option'); ?>
';
	</script>
	<script type="text/javascript">
	<?php echo '
	YAHOO.util.Event.addListener( window, "load", function() {
			var t = new Lifetype.UI.TableEffects( "list" );
			t.stripe();
			t.highlightRows();
		});
	'; ?>

	</script>	
		  <div id="list_nav_bar">
            <div id="list_nav_select">
                <form id="showBy" action="admin.php" method="post">
                <fieldset>
                <legend><?php echo $this->_tpl_vars['locale']->tr('show_by'); ?>
</legend>
                    <div class="list_nav_option">
                    <label for="showCategory"><?php echo $this->_tpl_vars['locale']->tr('category'); ?>
</label>
                    <br />
                    <select name="showCategory" id="showCategory">
                     <option value="-1"><?php echo $this->_tpl_vars['locale']->tr('category_all'); ?>
</option>
                     <?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
                     <option value="<?php echo $this->_tpl_vars['category']->getId(); ?>
" <?php if ($this->_tpl_vars['currentcategory'] == $this->_tpl_vars['category']->getId()): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['category']->getName(); ?>
</option>
                     <?php endforeach; endif; unset($_from); ?>
                    </select>
                    </div>

                    <div class="list_nav_option">
                    <label for="showStatus"><?php echo $this->_tpl_vars['locale']->tr('status'); ?>
</label>
                    <br />
                    <select name="showStatus" id="showStatus">
                     <?php $_from = $this->_tpl_vars['poststatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['status']):
?>
                     <option value="<?php echo $this->_tpl_vars['status']; ?>
" <?php if ($this->_tpl_vars['currentstatus'] == $this->_tpl_vars['status']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['name']); ?>
</option>
                     <?php endforeach; endif; unset($_from); ?>
                    </select>
                    </div>

                    <div class="list_nav_option">
                    <label for="showUser"><?php echo $this->_tpl_vars['locale']->tr('author'); ?>
</label>
                    <br />
                    <select name="showUser" id="showUser">
                      <option value="0" <?php if ($this->_tpl_vars['currentuser'] == 0): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['locale']->tr('author_all'); ?>
</option>
                      <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bloguser']):
?>
                       <option value="<?php echo $this->_tpl_vars['bloguser']->getId(); ?>
" <?php if ($this->_tpl_vars['currentuser'] == $this->_tpl_vars['bloguser']->getId()): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['bloguser']->getUsername(); ?>
</option>
                      <?php endforeach; endif; unset($_from); ?>
                    </select>
                    </div>

                    <div class="list_nav_option">
                    <label for="time"><?php echo $this->_tpl_vars['locale']->tr('date'); ?>
</label>
                    <br />
                    <select name="showMonth" id="time">
                     <option value="-1" <?php if ($this->_tpl_vars['currentmonth'] == -1): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['locale']->tr('all'); ?>
</option>
                     <?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['month']):
?>
                     <option value="<?php echo $this->_tpl_vars['month']['date']; ?>
" <?php if ($this->_tpl_vars['currentmonth'] == $this->_tpl_vars['month']['date']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['month']['name']; ?>
</option>
                     <?php endforeach; endif; unset($_from); ?>
                    </select>
                    </div>

                    <div class="list_nav_option">
                    <label for="search"><?php echo $this->_tpl_vars['locale']->tr('search_terms'); ?>
</label>
                    <br />
                    <input type="text" name="searchTerms" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['searchTerms'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" size="15" id="search" />
                    </div>

                    <div class="list_nav_option">
                    <br />
                    <input type="hidden" name="op" value="editPosts" />
                    <input type="submit" name="Show" value="<?php echo $this->_tpl_vars['locale']->tr('show'); ?>
" class="submit" />
                    </div>

					<div class="list_nav_option">
						<br/>
						<a href="<?php echo $this->_tpl_vars['pager']->getCurrentPageLink(); ?>
" title="<?php echo $this->_tpl_vars['locale']->tr('bookmark_this_filter'); ?>
">
							<img style="border:0px" src="imgs/admin/icon_link-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('bookmark_this_filter'); ?>
" />
						</a>
					</div>

                </fieldset>
                </form>
            </div>
            <br style="clear:both;" />
        </div>

        <form id="postsList" action="admin.php" method="post">
	    <?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_post')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
        <div class="optionIcon">
			<a id="optionIconLink" href="#bulkEdit" title="<?php echo $this->_tpl_vars['locale']->tr('show_massive_change_option'); ?>
" onclick="switchMassiveOption()"><?php echo $this->_tpl_vars['locale']->tr('show_massive_change_option'); ?>
</a>
		</div>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
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
            <table id="list" class="info" summary="<?php echo $this->_tpl_vars['locale']->tr('editPosts'); ?>
">
                <thead>
                    <tr>
                        <th><input class="checkbox" type="checkbox" name="all" id="all" value="1" onclick="toggleAllChecks('postsList');" /></th>
                        <th style="width:40%;"><?php echo $this->_tpl_vars['locale']->tr('topic'); ?>
</th>
                        <th style="width:10%;"><?php echo $this->_tpl_vars['locale']->tr('date'); ?>
</th>
                        <th style="width:10%;"><?php echo $this->_tpl_vars['locale']->tr('author'); ?>
</th>
                        <th style="width:10%;"><?php echo $this->_tpl_vars['locale']->tr('status'); ?>
</th>
                        <th style="width:5%;text-align:center;">CM</th>
                        <th style="width:5%;text-align:center;">TB</th>
                        <th style="width:5%;text-align:center;"><?php echo $this->_tpl_vars['locale']->tr('num_reads'); ?>
</th>
                        <th style="width:10%;"><?php echo $this->_tpl_vars['locale']->tr('actions'); ?>
</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $_from = $this->_tpl_vars['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>
                    <tr>
                        <td>
                            <input class="checkbox" type="checkbox" name="postIds[<?php echo $this->_tpl_vars['post']->getId(); ?>
]" id="checks_<?php echo $this->_tpl_vars['post']->getId(); ?>
" value="<?php echo $this->_tpl_vars['post']->getId(); ?>
" />
                        </td>
                        <td class="col_highlighted">
                            <?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_post')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><a href="?op=editPost&amp;postId=<?php echo $this->_tpl_vars['post']->getId(); ?>
"><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            <?php echo ((is_array($_tmp=$this->_tpl_vars['post']->getTopic())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>

                            <?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_post')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?></a><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br />
                            &nbsp;&raquo;
                            <span style="font-weight: normal;">
                            <?php $_from = $this->_tpl_vars['post']->getCategories(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['postCategories'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['postCategories']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['postCategory']):
        $this->_foreach['postCategories']['iteration']++;
?>
                                <a href="?op=editPosts&amp;showCategory=<?php echo $this->_tpl_vars['postCategory']->getId(); ?>
&amp;showStatus=0"><?php echo $this->_tpl_vars['postCategory']->getName(); ?>
</a><?php if (! ($this->_foreach['postCategories']['iteration'] == $this->_foreach['postCategories']['total'])): ?>, <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                            </span>
                        </td>
                        <td>
                            <?php $this->assign('date', $this->_tpl_vars['post']->getDateObject()); ?>
                            <?php echo $this->_tpl_vars['locale']->formatDate($this->_tpl_vars['date']); ?>

                        </td>
                        <td>
                            <?php $this->assign('owner', $this->_tpl_vars['post']->getUserInfo()); ?>
                            <?php echo $this->_tpl_vars['owner']->getUsername(); ?>

                        </td>
                        <td>
                          <?php $_from = $this->_tpl_vars['poststatus']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['status']):
?>
                           <?php if ($this->_tpl_vars['post']->getStatus() == $this->_tpl_vars['status']): ?>
						    <?php if ($this->_tpl_vars['status'] == 1): ?><span style="color:green"><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['name']); ?>
</span>
							<?php elseif ($this->_tpl_vars['status'] == 2): ?><span style="color:blue"><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['name']); ?>
</span>
							<?php elseif ($this->_tpl_vars['status'] == 3): ?><span style="color:red"><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['name']); ?>
</span>
							<?php else: ?><?php echo $this->_tpl_vars['locale']->tr(($this->_tpl_vars['name'])); ?>
<?php endif; ?>
						   <?php endif; ?>
                          <?php endforeach; endif; unset($_from); ?>
                        </td>
                        <td style="text-align: center;">
                            <?php if ($this->_tpl_vars['post']->getTotalComments(false) > 0): ?>
							 <a href="?op=editComments&amp;articleId=<?php echo $this->_tpl_vars['post']->getId(); ?>
">(<?php echo $this->_tpl_vars['post']->getTotalComments(false); ?>
)</a>
							<?php else: ?>
							 0
							<?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php if ($this->_tpl_vars['post']->getTotalTrackbacks() > 0): ?>
							 <a href="?op=editTrackbacks&amp;articleId=<?php echo $this->_tpl_vars['post']->getId(); ?>
">(<?php echo $this->_tpl_vars['post']->getTotalTrackbacks(false); ?>
)</a>
							<?php else: ?>
							 0
							<?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php echo $this->_tpl_vars['post']->getNumReads(); ?>

                        </td>
                        <td>
							<?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_post')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <div class="list_action_button">
                            <a href="?op=editPost&amp;postId=<?php echo $this->_tpl_vars['post']->getId(); ?>
" title="<?php echo $this->_tpl_vars['locale']->tr('edit'); ?>
">
                            	<img src="imgs/admin/icon_edit-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('edit'); ?>
" />
                            </a>
                            <a href="?op=deletePost&amp;postId=<?php echo $this->_tpl_vars['post']->getId(); ?>
" title="<?php echo $this->_tpl_vars['locale']->tr('delete'); ?>
">
                            	<img src="imgs/admin/icon_delete-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('delete'); ?>
" />
                            </a>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            <a href="<?php echo $this->_tpl_vars['url']->postPermalink($this->_tpl_vars['post']); ?>
" title="<?php echo $this->_tpl_vars['locale']->tr('permalink'); ?>
">
                            	<img src="imgs/admin/icon_url-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('permalink'); ?>
" />
                            </a>
							<?php $this->_tag_stack[] = array('check_perms', array('perm' => 'view_blog_stats')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                            <a href="?op=postStats&amp;postId=<?php echo $this->_tpl_vars['post']->getId(); ?>
" title="<?php echo $this->_tpl_vars['locale']->tr('Stats'); ?>
">
                            	<img src="imgs/admin/icon_stats-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('Stats'); ?>
" />
                            </a>
							<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </tbody>
            </table>
        </div>
        <a name="bulkEdit"></a>
        <div id="list_action_bar">
			<?php echo smarty_function_adminpager(array('style' => 'list'), $this);?>

			<?php $this->_tag_stack[] = array('check_perms', array('adminperm' => 'purge_data')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<input type="submit" name="purgePosts" class="submit" value="<?php echo $this->_tpl_vars['locale']->tr('cleanup_posts'); ?>
" onClick="javascript:submitPostsList('doCleanUp');" />
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			<?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_post')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <input type="button" name="delete" value="<?php echo $this->_tpl_vars['locale']->tr('delete'); ?>
" class="submit" onClick="javascript:submitPostsList('deletePosts');" />
            <input type="hidden" name="op" value="" />
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			<?php $this->_tag_stack[] = array('check_perms', array('perm' => 'update_post')); $_block_repeat=true;smarty_block_check_perms($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <div id="massiveChangeOption" style="display: none">
                <fieldset>
                <legend><?php echo $this->_tpl_vars['locale']->tr('massive_change_option'); ?>
</legend>            
		            <label for="postStatus"><?php echo $this->_tpl_vars['locale']->tr('status'); ?>
</label>
		            <select name="postStatus" id="postStatus">
		              <option value="-1">-<?php echo $this->_tpl_vars['locale']->tr('select'); ?>
-</option>
		              <?php $_from = $this->_tpl_vars['poststatusWithoutAll']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['status']):
?>
		                <option value="<?php echo $this->_tpl_vars['status']; ?>
"><?php echo $this->_tpl_vars['locale']->tr($this->_tpl_vars['name']); ?>
</option>
		              <?php endforeach; endif; unset($_from); ?>
		            </select>
		            <input type="button" name="changePostsStatus" value="<?php echo $this->_tpl_vars['locale']->tr('change_status'); ?>
" class="submit" onClick="javascript:submitPostsList('changePostsStatus');" />
		            <label for="postCategories[]"><?php echo $this->_tpl_vars['locale']->tr('categories'); ?>
</label>
		            <select name="postCategories[]" id="postCategories" size="5" multiple="multiple">
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
		            <input type="button" name="changePostsCategory" value="<?php echo $this->_tpl_vars['locale']->tr('change_category'); ?>
" class="submit" onClick="javascript:submitPostsList('changePostsCategory');" />
		        </fieldset>
			</div>
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