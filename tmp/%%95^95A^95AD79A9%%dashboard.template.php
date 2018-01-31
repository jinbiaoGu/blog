<?php /* Smarty version 2.6.26, created on 2018-01-31 13:11:21
         compiled from admin/dashboard.template */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'admin/dashboard.template', 48, false),array('modifier', 'utf8_truncate', 'admin/dashboard.template', 84, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/simpleheader.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <div id="nav_bar">
        <div id="section_title">
            <h2><?php echo $this->_tpl_vars['locale']->tr('dashboard'); ?>
</h2>
        </div>
        <div class="dashboard_logout_link">
          <?php if ($this->_tpl_vars['userCanCreateBlog']): ?><a href="?op=registerBlog"><?php echo $this->_tpl_vars['locale']->tr('createBlog'); ?>
</a><?php endif; ?>
          <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['userblogs'][0]->getId(); ?>
&amp;action=Logout"><?php echo $this->_tpl_vars['locale']->tr('Logout'); ?>
</a>
        </div>
        <br style="clear:both;" />
    </div>
    <div id="dashboard">
    <?php $_from = $this->_tpl_vars['userblogs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>
	<script type="text/javascript">
	tables_<?php echo $this->_tpl_vars['blog']->getId(); ?>
 = [ "dashboard_data_table_<?php echo $this->_tpl_vars['blog']->getId(); ?>
", "dashboard_recent_comments_<?php echo $this->_tpl_vars['blog']->getId(); ?>
", "dashboard_recent_trackbacks_<?php echo $this->_tpl_vars['blog']->getId(); ?>
" ];
	YAHOO.util.Event.addListener( window, "load", function() <?php echo '{'; ?>

			for( i = 0; i < tables_<?php echo $this->_tpl_vars['blog']->getId(); ?>
.length; i++ ) <?php echo '{'; ?>

				var t = new Lifetype.UI.TableEffects( tables_<?php echo $this->_tpl_vars['blog']->getId(); ?>
[i] );
				t.stripe();
				t.highlightRows();
			<?php echo '	
			}
		}		
		'; ?>
);
	</script> 
        <div class="dashboard_blog">
        <h2><?php echo $this->_tpl_vars['locale']->tr('login'); ?>
&raquo; <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
"><?php echo $this->_tpl_vars['blog']->getBlog(); ?>
</a></h2>
        <div class="dashboardHelp"><?php echo $this->_tpl_vars['locale']->tr('help_login_admin_panel'); ?>
</div>
        <table class="dashboard_blog_layout" summary="">
            <tr>
                <td style="width: 70%; border: 0px solid black;">
                    <h3><?php echo $this->_tpl_vars['locale']->tr('recent_articles'); ?>
</h3>
                    <table class="dashboard_data_table" id="dashboard_data_table_<?php echo $this->_tpl_vars['blog']->getId(); ?>
" summary="<?php echo $this->_tpl_vars['locale']->tr('recent_articles'); ?>
">
                        <thead>
                         <tr>
                            <th><?php echo $this->_tpl_vars['locale']->tr('topic'); ?>
</th>
                            <th style="width:60px;"><?php echo $this->_tpl_vars['locale']->tr('actions'); ?>
</th>
                         </tr>
                        </thead>
                        <?php $this->assign('blogId', $this->_tpl_vars['blog']->getId()); ?>
                        <?php $this->assign('url', $this->_tpl_vars['blog']->getBlogRequestGenerator()); ?>
                        						<?php if (! empty ( $this->_tpl_vars['recentposts'][$this->_tpl_vars['blogId']] )): ?>
						<tbody>
                        <?php $_from = $this->_tpl_vars['recentposts'][$this->_tpl_vars['blogId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['post']):
?>
                        <tr>
                            <td>
                                <a target="_blank" href="<?php echo $this->_tpl_vars['url']->postPermalink($this->_tpl_vars['post']); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']->getTopic())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a><br/>
                            </td>
                            <td>
                                <div class="list_action_button">
                                <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=editPost&amp;postId=<?php echo $this->_tpl_vars['post']->getId(); ?>
"><img src="imgs/admin/icon_edit-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('edit'); ?>
" /></a>
                                <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=deletePost&amp;postId=<?php echo $this->_tpl_vars['post']->getId(); ?>
"><img src="imgs/admin/icon_delete-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('delete'); ?>
" /></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
						</tbody>
						<?php endif; ?>
                    </table>

                    <h3><?php echo $this->_tpl_vars['locale']->tr('recent_comments'); ?>
</h3>
                    <table class="dashboard_data_table" id="dashboard_recent_comments_<?php echo $this->_tpl_vars['blog']->getId(); ?>
" summary="<?php echo $this->_tpl_vars['locale']->tr('recent_comments'); ?>
">
                        <thead>
                        <tr>
                            <th><?php echo $this->_tpl_vars['locale']->tr('topic'); ?>
</th>
                            <th><?php echo $this->_tpl_vars['locale']->tr('posted_by'); ?>
</th>
                            <th><?php echo $this->_tpl_vars['locale']->tr('in'); ?>
</th>
                            <th><?php echo $this->_tpl_vars['locale']->tr('date'); ?>
</th>
                            <th style="width:60px;"><?php echo $this->_tpl_vars['locale']->tr('actions'); ?>
</th>
                         </tr>
                        </thead>
                        						<?php if (! empty ( $this->_tpl_vars['recentcomments'][$this->_tpl_vars['blogId']] )): ?>
						<tbody>
                        <?php $_from = $this->_tpl_vars['recentcomments'][$this->_tpl_vars['blogId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
                        <?php $this->assign('article', $this->_tpl_vars['comment']->getArticle()); ?>
                        <tr>
                            <td>
                                <a target="_blank" href="<?php echo $this->_tpl_vars['url']->postPermalink($this->_tpl_vars['article']); ?>
#<?php echo $this->_tpl_vars['comment']->getId(); ?>
">
                                <?php if ($this->_tpl_vars['comment']->getTopic() == ""): ?>
                                <i><?php echo $this->_tpl_vars['locale']->tr('no_subject'); ?>
</i>
                                <?php else: ?>
                                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['comment']->getTopic())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('utf8_truncate', true, $_tmp, 60, "...", true) : smarty_modifier_utf8_truncate($_tmp, 60, "...", true)); ?>

                                <?php endif; ?>
                                </a>
                            </td>
                            <td>
                                <?php if ($this->_tpl_vars['comment']->getUsername() != ""): ?>
                                <?php echo $this->_tpl_vars['comment']->getUsername(); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo $this->_tpl_vars['url']->postPermalink($this->_tpl_vars['article']); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']->getTopic())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                            </td>
                            <td>
                                <?php $this->assign('commentDate', $this->_tpl_vars['comment']->getDateObject()); ?>
                                <?php echo $this->_tpl_vars['locale']->formatDate($this->_tpl_vars['commentDate']); ?>
<br/>
                            </td>
                            <td>
                                <div class="list_action_button">
                                <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=deleteComment&amp;commentId=<?php echo $this->_tpl_vars['comment']->getId(); ?>
&amp;articleId=<?php echo $this->_tpl_vars['article']->getId(); ?>
"><img src="imgs/admin/icon_delete-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('delete'); ?>
" /></a>
								<?php if ($this->_tpl_vars['bayesian_filter_enabled']): ?>
                                <?php if ($this->_tpl_vars['comment']->getStatus() != 1): ?>
                                    <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=markComment&amp;mode=1&amp;articleId=<?php echo $this->_tpl_vars['comment']->getArticleId(); ?>
&amp;commentId=<?php echo $this->_tpl_vars['comment']->getId(); ?>
">
                                     <img src="imgs/admin/icon_spam-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('mark_as_spam'); ?>
" />
                                    </a>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['comment']->getStatus() != 0): ?>
                                    <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=markComment&amp;mode=0&amp;articleId=<?php echo $this->_tpl_vars['comment']->getArticleId(); ?>
&amp;commentId=<?php echo $this->_tpl_vars['comment']->getId(); ?>
">
                                     <img src="imgs/admin/icon_nospam-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('mark_as_no_spam'); ?>
" />
                                    </a>
                                <?php endif; ?>
								<?php endif; ?>
                                <?php if ($this->_tpl_vars['comment']->getUserUrl()): ?>
                                  <a href="<?php echo $this->_tpl_vars['comment']->getUserUrl(); ?>
">
                                   <img src="imgs/admin/icon_url-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('url'); ?>
" />
                                  </a>
                                <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?>
						</tbody>
						<?php endif; ?>
                    </table>

                    <h3><?php echo $this->_tpl_vars['locale']->tr('recent_trackbacks'); ?>
</h3>
                    <table class="dashboard_data_table" id="dashboard_recent_trackbacks_<?php echo $this->_tpl_vars['blog']->getId(); ?>
" summary="<?php echo $this->_tpl_vars['locale']->tr('recent_trackbacks'); ?>
">
                        <thead>
                        <tr>
                            <th><?php echo $this->_tpl_vars['locale']->tr('topic'); ?>
</th>
                            <th><?php echo $this->_tpl_vars['locale']->tr('in'); ?>
</th>
                            <th><?php echo $this->_tpl_vars['locale']->tr('date'); ?>
</th>
                            <th style="width:60px;"><?php echo $this->_tpl_vars['locale']->tr('actions'); ?>
</th>
                        </tr>
                        </thead>
                        						<?php if (! empty ( $this->_tpl_vars['recenttrackbacks'][$this->_tpl_vars['blogId']] )): ?>
						<tbody>
                        <?php $_from = $this->_tpl_vars['recenttrackbacks'][$this->_tpl_vars['blogId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trackback']):
?>
                        <tr>
                            <td>
                                <?php $this->assign('article', $this->_tpl_vars['trackback']->getArticle()); ?>
                                <a target="_blank" href="<?php echo $this->_tpl_vars['url']->postTrackbackStatsLink($this->_tpl_vars['article']); ?>
#<?php echo $this->_tpl_vars['trackback']->getId(); ?>
">
                                <?php if ($this->_tpl_vars['trackback']->getTitle() == ""): ?>
                                <i><?php echo $this->_tpl_vars['locale']->tr('no_subject'); ?>
</i>
                                <?php else: ?>
                                <?php echo $this->_tpl_vars['trackback']->getExcerpt(); ?>

                                <?php endif; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $this->_tpl_vars['url']->postPermalink($this->_tpl_vars['article']); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']->getTopic())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a>
                            </td>
                            <td>
                                <?php $this->assign('trackbackDate', $this->_tpl_vars['trackback']->getDateObject()); ?>
                                <?php echo $this->_tpl_vars['locale']->formatDate($this->_tpl_vars['trackbackDate']); ?>
<br/>
                            </td>
                            <td>
                                <div class="list_action_button">
                                 <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=deleteTrackback&amp;articleId=<?php echo $this->_tpl_vars['article']->getId(); ?>
&amp;trackbackId=<?php echo $this->_tpl_vars['trackback']->getId(); ?>
"><img src="imgs/admin/icon_delete-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('delete'); ?>
" /></a>
								<?php if ($this->_tpl_vars['bayesian_filter_enabled']): ?>
                                  <?php if ($this->_tpl_vars['trackback']->getStatus() == 0): ?>
                                    <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=markTrackback&amp;mode=1&amp;articleId=<?php echo $this->_tpl_vars['trackback']->getArticleId(); ?>
&amp;trackbackId=<?php echo $this->_tpl_vars['trackback']->getId(); ?>
">
                                     <img src="imgs/admin/icon_spam-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('mark_as_spam'); ?>
" />
                                    </a>
                                  <?php elseif ($this->_tpl_vars['trackback']->getStatus() == 1): ?>
                                    <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=markTrackback&amp;mode=0&amp;articleId=<?php echo $this->_tpl_vars['trackback']->getArticleId(); ?>
&amp;trackbackId=<?php echo $this->_tpl_vars['trackback']->getId(); ?>
">
                                     <img src="imgs/admin/icon_nospam-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('mark_as_no_spam'); ?>
" />
                                    </a>
                                  <?php endif; ?>
								<?php endif; ?>
                                  <?php if ($this->_tpl_vars['trackback']->getUserUrl()): ?>
                                    <a href="<?php echo $this->_tpl_vars['trackback']->getUserUrl(); ?>
">
                                     <img src="imgs/admin/icon_url-16.png" alt="<?php echo $this->_tpl_vars['locale']->tr('url'); ?>
" />
                                    </a>
                                  <?php endif; ?>
                                </div>                                
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
					</tbody>
					<?php endif; ?>
                    </table>
                </td>
                <td style="width: 30%; vertical-align: top; border-left: 1px solid #DEDEDE; border-bottom: 0px; padding-left: 4px;">
                    
                    <h3><?php echo $this->_tpl_vars['locale']->tr('quick_launches'); ?>
</h3>
                    <table class="dashboard_data_quick_launches" id="dashboard_quick_launches_<?php echo $this->_tpl_vars['blog']->getId(); ?>
" summary="<?php echo $this->_tpl_vars['locale']->tr('quick_launches'); ?>
">
                        <tr>
                            <th>
                                <?php echo $this->_tpl_vars['locale']->tr('managePosts'); ?>
:
                            </th>
                            <td>
                                <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=newPost"><?php echo $this->_tpl_vars['locale']->tr('newPost'); ?>
</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo $this->_tpl_vars['locale']->tr('manageLinks'); ?>
:
                            </th>
                            <td>
                                <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=newLink"><?php echo $this->_tpl_vars['locale']->tr('newLink'); ?>
</a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo $this->_tpl_vars['locale']->tr('resourceCenter'); ?>
:
                            </th>
                            <td>
                                <a href="?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['blog']->getId(); ?>
&amp;action=newResource"><?php echo $this->_tpl_vars['locale']->tr('newResource'); ?>
</a>
                            </td>
                        </tr>
                    </table>
                    
                    <h3><?php echo $this->_tpl_vars['locale']->tr('blog_statistics'); ?>
</h3>
                    <table class="dashboard_data_table_statistics" id="dashboard_statistics_<?php echo $this->_tpl_vars['blog']->getId(); ?>
" summary="<?php echo $this->_tpl_vars['locale']->tr('blog_statistics'); ?>
">
	 	 			  <tbody>
                        <tr>
                            <th>
                                <?php echo $this->_tpl_vars['locale']->tr('total_posts'); ?>
:
                            </th>
                            <td>
                                <?php echo $this->_tpl_vars['blog']->getTotalPosts(); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo $this->_tpl_vars['locale']->tr('total_comments'); ?>
:
                            </th>
                            <td>
                                <?php echo $this->_tpl_vars['blog']->getTotalComments(); ?>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo $this->_tpl_vars['locale']->tr('total_trackbacks'); ?>
:
                            </th>
                            <td>
                                <?php echo $this->_tpl_vars['blog']->getTotalTrackbacks(); ?>

                            </td>
                        </tr>
						</tbody>
                    </table>
                </td>
            </tr>
        </table>
        </div>
    <?php endforeach; endif; unset($_from); ?>
    </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admintemplatepath'])."/simplefooter.template", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>