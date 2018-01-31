<?php /* Smarty version 2.6.26, created on 2018-01-31 13:11:16
         compiled from ./templates/admin/simpleheader.template */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
<meta http-equiv="content-type" content="text/html;charset=<?php echo $this->_tpl_vars['locale']->getCharset(); ?>
" />
<title>LifeType Admin</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="generator" content="<?php echo $this->_tpl_vars['version']; ?>
" />
<?php if ($this->_tpl_vars['locale']->getDirection() == 'rtl'): ?>
<link rel="stylesheet" href="styles/admin-rtl.css" type="text/css" media="screen" />
<?php else: ?>
<link rel="stylesheet" href="styles/admin.css" type="text/css" media="screen" />
<?php endif; ?>
<link rel="shortcut icon" type="image/x-icon" href="imgs/favicon.ico" />
<!--[if IE ]>
<link rel="stylesheet" href="styles/admin-ie.css" type="text/css" media="screen" />
<![endif] -->
<script type="text/javascript" src="js/ui/default.js"></script>
<script type="text/javascript" src="js/ui/core.js"></script>
<script type="text/javascript" src="js/ui/tableeffects.js"></script>
<script type="text/javascript" src="js/yui/yahoo/yahoo-min.js"></script> 
<script type="text/javascript" src="js/yui/dom/dom-min.js"></script> 
<script type="text/javascript" src="js/yui/event/event-min.js"></script>
<?php if ($this->_tpl_vars['templatename'] == 'default'): ?><style type="text/css"><?php echo '
html,body
{
    margin		     : 0px;
    padding     	 : 0px;
    text-align       : center;
    font             : 12px verdana, tahoma, arial, sans-serif;
    background       : none;
}

#header
{
    height           : 10px;
    width            : 100%;
    background       : none;
    padding          : 0px;
    margin           : 0px;
}

#content
{
    position         : relative;
    width            : 100%;
    display          : block;
    margin           : 0;
    padding          : 0;
    background       : #FFFFFF url("./imgs/lt_logo_plant.jpg") no-repeat top left; 
}
'; ?>

</style>
<?php endif; ?>
</head>
<?php if ($this->_tpl_vars['templatename'] == 'default'): ?>
	<body onload="document.loginForm.userName.focus();">
<?php else: ?>
	<body>
<?php endif; ?>

<div id="container" >

    <div id="header" >
        <h1><span>LifeType Admin</span></h1>
    </div>


    <div id="content" >