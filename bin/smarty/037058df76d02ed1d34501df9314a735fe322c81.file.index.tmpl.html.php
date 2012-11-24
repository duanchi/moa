<?php /* Smarty version Smarty-3.1.11, created on 2012-11-13 11:05:54
         compiled from "/Users/duanChi/Projects/after-sales-manage/application/views/index/index.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:86882144650a1b9124a45a6-80602309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '037058df76d02ed1d34501df9314a735fe322c81' => 
    array (
      0 => '/Users/duanChi/Projects/after-sales-manage/application/views/index/index.tmpl.html',
      1 => 1351217471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86882144650a1b9124a45a6-80602309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_RESULT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50a1b91253cf13_05491339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a1b91253cf13_05491339')) {function content_50a1b91253cf13_05491339($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link href="http://static.wo-api.com/bootstrap/css/?2.1.0" rel="stylesheet" />
<link href="/themes/bootstrap/css/bootstrap.css" rel="stylesheet" />
<link href="/themes/bootstrap/css/dashboard.css" rel="stylesheet" />
</head>

<body>
<aside class="sidebar sidebar-fixed-left span2">
    <ul class="side auto-height-container">
        <li><a id="user-options" href="#user-options"><i class="icon-chevron-up"></i>&nbsp;<?php if ($_smarty_tpl->tpl_vars['_RESULT']->value['account']!=false){?><?php echo $_smarty_tpl->tpl_vars['_RESULT']->value['account']['UID'];?>
<?php }else{ ?>游客<?php }?><span class="notification pull-right"><i class="icon-user icon-white"></i>&nbsp;注销</span></a></li>
        <li class="active"><a href="task.html" target="target-frame"><i class="icon-tasks icon-white"></i>&nbsp;任务列表<span class="notification notification-info pull-right">123</span></a></li>
        <li><a href=""><i class="icon-time"></i>&nbsp;提醒列表<span class="notification pull-right">3</span></a></li>
        <li><a href="map.html" target="target-frame"><i class="icon-map-marker"></i>&nbsp;位置分布</a></li>
        <li><a href="/wiki" target="target-frame"><i class="icon-leaf"></i>&nbsp;API文档</a></li>
        <li id="settings" class="pull-buttom"><a href="#settings"><i class="icon-wrench"></i></a></li>
    </ul>
</aside>
<div id="main-container" class="row-fluid auto-height-container">
	<iframe name="target-frame" id="target-frame" src="task.html" frameborder="0"></iframe>
</div>
<div class="alert alert-success alert-notification">您有一个新提醒<a class="close" data-dismiss="alert" href="#">&times;</a></div>
</body>
<script type="text/javascript" src="http://static.wo-api.com/jquery/?1.8.0"></script>
<script type="text/javascript" src="http://static.wo-api.com/bootstrap/js/?2.1.0"></script>
<script type="text/javascript" src="/themes/bootstrap/js/controller/root.controller.js"></script>
<script type="text/javascript" src="/themes/bootstrap/js/lib/root.lib.js"></script>
</html><?php }} ?>