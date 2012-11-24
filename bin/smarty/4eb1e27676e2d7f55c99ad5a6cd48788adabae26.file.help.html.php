<?php /* Smarty version Smarty-3.1.11, created on 2012-11-24 15:48:41
         compiled from "/Users/duanChi/Projects/moa/projects/1307261330/www/index/help.html" */ ?>
<?php /*%%SmartyHeaderCode:5634655350b03f9da51c97-62732239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4eb1e27676e2d7f55c99ad5a6cd48788adabae26' => 
    array (
      0 => '/Users/duanChi/Projects/moa/projects/1307261330/www/index/help.html',
      1 => 1353743307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5634655350b03f9da51c97-62732239',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b03f9da52bd2_02672542',
  'variables' => 
  array (
    '_TEMPLATE' => 0,
    '_VARS' => 0,
    'k' => 0,
    'v' => 0,
    'n' => 0,
    's' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b03f9da52bd2_02672542')) {function content_50b03f9da52bd2_02672542($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB18030">
<title>Insert title here</title>
</head>
<body>
haha hello world!<br /><?php echo $_smarty_tpl->tpl_vars['_TEMPLATE']->value['path'];?>

<h3>list of vars</h3>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_VARS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 => <?php echo $_smarty_tpl->tpl_vars['v']->value['text'];?>
 and attrs <?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['attr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
 $_smarty_tpl->tpl_vars['n']->value = $_smarty_tpl->tpl_vars['s']->key;
?> [<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
],<?php } ?><br />
<?php } ?>
</body>
</html><?php }} ?>