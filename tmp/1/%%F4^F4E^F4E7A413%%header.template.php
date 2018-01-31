<?php /* Smarty version 2.6.26, created on 2018-01-31 13:24:48
         compiled from ./templates/admin/header.template */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', './templates/admin/header.template', 21, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
<meta http-equiv="content-type" content="text/html;charset=<?php echo $this->_tpl_vars['locale']->getCharset(); ?>
" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="generator" content="<?php echo $this->_tpl_vars['version']; ?>
" />
<title>LifeType Admin</title>
<?php $this->assign('blogEnablePullDownMenu', $this->_tpl_vars['blogsettings']->getValue('pull_down_menu_enabled')); ?>
<?php if ($this->_tpl_vars['locale']->getDirection() == 'rtl'): ?>
<link rel="stylesheet" href="styles/admin-rtl.css" type="text/css" media="screen" />
<?php else: ?>
<link rel="stylesheet" href="styles/admin.css" type="text/css" media="screen" />
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="js/yui/container/assets/container.css" /> 
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->_tpl_vars['url']->getUrl("/imgs/favicon.ico"); ?>
" />
<!--[if IE ]>
<link rel="stylesheet" href="styles/admin-ie.css" type="text/css" media="screen" />
<![endif] -->
<script type="text/javascript">
    var blogLocale = '<?php echo ((is_array($_tmp=$this->_tpl_vars['locale']->getCharset())) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
';
  	// base url where we can find the admin.php script
  	var plogBaseUrl = "<?php echo $this->_tpl_vars['url']->getBaseUrl(false); ?>
";
	var plogAdminBaseUrl = "<?php echo $this->_tpl_vars['url']->getBaseUrl(false); ?>
/admin.php";
	var plogBlogId = "<?php echo $this->_tpl_vars['blog']->getId(); ?>
";
</script>
 <?php if ($this->_tpl_vars['editor']): ?>
   <?php if ($this->_tpl_vars['htmlarea']): ?>
     <script type="text/javascript" src="js/tinymce/tiny_mce_gzip.js"></script>
     <script type="text/javascript" src="js/tinymce/tiny_mce-plog.js"></script>
   <?php else: ?>
     <script type="text/javascript" src="js/editor/lifetypeeditor.js"></script>
   <?php endif; ?>
 <?php endif; ?>
<script type="text/javascript" src="js/cookie/cookie.js"></script>
<script type="text/javascript" src="js/prototype/prototype.js"></script>
<!-- Yahoo UI Library -->
<script type="text/javascript" src="js/yui/yahoo/yahoo-min.js"></script> 
<script type="text/javascript" src="js/yui/dom/dom-min.js"></script> 
<script type="text/javascript" src="js/yui/event/event-min.js"></script>
<script type="text/javascript" src="js/yui/container/container-min.js"></script>
<!-- LifeType UI Library -->
<script type="text/javascript" src="js/ui/core.js"></script>
<script type="text/javascript" src="js/ui/default.js"></script>
<script type="text/javascript" src="js/ui/common.js"></script>
<script type="text/javascript" src="js/ui/forms.js"></script>
<script type="text/javascript" src="js/ui/tableeffects.js"></script>
<?php if ($this->_tpl_vars['blogEnablePullDownMenu']): ?>
  <script type="text/javascript" src="js/JSCookMenu/JSCookMenu.js"></script>
  <link rel="stylesheet" href="js/JSCookMenu/ThemeOffice/theme.css" type="text/css" />
  <script type="text/javascript" src="js/JSCookMenu/ThemeOffice/theme.js"></script>
<?php endif; ?>
</head>
<body>

<div id="container" >

    <div id="header" >
        <h1><span>LifeType Admin</span></h1>
    </div>

    <hr class="hide" />
    <div id="skipNav">
        <ul title="Accessibility options">
        <li><a href="#menubar">Skip to Menu Bar</a></li>
        <li><a href="#navigation">Skip to Navigation Bar</a></li>
        <li><a href="#list_nav_bar">Search/List Options</a></li>
        <li><a href="#list">Skip to Post Lists</a></li>
        </ul>
    </div>
    <hr class="hide" />

    <div id="menubar">
        <div id="menu">
        <?php if (! $this->_tpl_vars['blogEnablePullDownMenu']): ?>
          <?php echo $this->_tpl_vars['menu']->generateAt('menu',1); ?>

        <?php else: ?>
          <?php echo $this->_tpl_vars['menu']->generateAt('menu','3',"",'JavaScript'); ?>

        <?php endif; ?>
        </div>
    </div>

   	<div style="text-align: right; padding-right: 5px;">
		(<?php echo $this->_tpl_vars['user']->getUsername(); ?>
)
   		<select name="userBlog" id="userBlog" onchange="MM_jumpMenu('parent',this,0)">
     	<?php $_from = $this->_tpl_vars['userBlogs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['userBlog']):
?>
     		<option value="admin.php?op=blogSelect&amp;blogId=<?php echo $this->_tpl_vars['userBlog']->getId(); ?>
" <?php if ($this->_tpl_vars['userBlog']->getId() == $this->_tpl_vars['blog']->getId()): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['userBlog']->getBlog(); ?>
</option>
       	<?php endforeach; endif; unset($_from); ?>
       	</select>
       	<?php $this->assign('blogname', $this->_tpl_vars['blog']->getBlog()); ?>
       	<a href="<?php echo $this->_tpl_vars['url']->blogLink(); ?>
" id="blogLink" target="_blank" title="<?php echo $this->_tpl_vars['locale']->pr('goto_blog_page',$this->_tpl_vars['blogname']); ?>
"><img style="vertical-align: top; border: 0px;" src="imgs/admin/icon_goto-16.png" alt="<?php echo $this->_tpl_vars['locale']->pr('goto_blog_page',$this->_tpl_vars['blogname']); ?>
" /></a>
    </div>

    <div id="content" >