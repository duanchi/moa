<?php /* Smarty version Smarty-3.1.11, created on 2012-09-28 11:01:39
         compiled from "/Users/duanChi/Projects/dashboard/trunk/application/views/login/index.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:15930524735062670c26d134-74163384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e2d9ba7d687958ee38dccb4ba81d790d0545461' => 
    array (
      0 => '/Users/duanChi/Projects/dashboard/trunk/application/views/login/index.tmpl.html',
      1 => 1348801261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15930524735062670c26d134-74163384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5062670c306b14_14091002',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5062670c306b14_14091002')) {function content_5062670c306b14_14091002($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login &middot; Dashboard</title>
<link href="http://static.wo-api.com/bootstrap/css/?2.1.0" rel="stylesheet" />
<link href="/themes/bootstrap/css/bootstrap.css" rel="stylesheet" />
<link href="/themes/bootstrap/css/login.css" rel="stylesheet" />
</head>

<body>
<div class="container">
    <div id="login">
        <ul id="login-inner">
            <li class="another-account pull-right"><a class="btn" href="#manual-login">使用其他帐号登录&nbsp;<i class="icon-user"></i></a></li>
        </ul>
        <div id="manual-login" class="hide">
        	<a id="back-to-login" href="#login"><i class="icon-circle-arrow-left icon-white"></i></a>
        	<input type="text" name="username" value="" placeholder="username" />
            <input type="password" name="password" value="" placeholder="password" />
            <label rel="tooltip" title="如果您想在本台电脑中保存账户信息,请选中此项" data-placement="bottom" class="checkbox"><input type="checkbox" checked="checked" value="true" name="remember_login_region" />这台不是公用电脑</label>
            <button type="submit" name="submit"><i class="icon-circle-arrow-right"></i></button>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="http://static.wo-api.com/jquery/?1.8.0"></script>
<script type="text/javascript" src="http://static.wo-api.com/bootstrap/js/?2.1.0"></script>
<script type="text/javascript" src="/themes/bootstrap/js/controller/login.controller.js"></script>
<script type="text/javascript" src="/themes/bootstrap/js/lib/login.lib.js"></script>
</html><?php }} ?>