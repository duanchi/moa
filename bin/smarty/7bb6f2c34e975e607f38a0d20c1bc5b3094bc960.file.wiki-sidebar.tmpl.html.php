<?php /* Smarty version Smarty-3.1.11, created on 2012-11-01 16:47:04
         compiled from "/Users/duanChi/Projects/dashboard/trunk/application/views/wiki/wiki-sidebar.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1426872714508f3a935df070-48968572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bb6f2c34e975e607f38a0d20c1bc5b3094bc960' => 
    array (
      0 => '/Users/duanChi/Projects/dashboard/trunk/application/views/wiki/wiki-sidebar.tmpl.html',
      1 => 1351759430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1426872714508f3a935df070-48968572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_508f3a935e2112_24643691',
  'variables' => 
  array (
    'category' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508f3a935e2112_24643691')) {function content_508f3a935e2112_24643691($_smarty_tpl) {?>        <div class="sidebar-nav span3 pull-left">
            <ul class="nav nav-list">
                <li class="navbar-search"><input type="text" class="search-query" placeholder="Search"></li>
                <li class="divider"></li>
                <li class="nav-header">平台说明</li>
                <li<?php if ($_smarty_tpl->tpl_vars['category']->value=='index'){?> class="active"<?php }?>><a href="/wiki">平台介绍</a></li>
                <li class="nav-header">授权API</li>
                <li<?php if ($_smarty_tpl->tpl_vars['category']->value=='auth/sso'){?> class="active"<?php }?>><a href="#">单点登录授权</a></li>
                <li<?php if ($_smarty_tpl->tpl_vars['category']->value=='auth/oauth'){?> class="active"<?php }?>><a href="#">oauth2.0</a></li>
                <li class="nav-header">资源API</li>
                <li<?php if ($_smarty_tpl->tpl_vars['category']->value=='api/lbs'){?> class="active"<?php }?>><a href="#">粗定位接口</a></li>
                <li<?php if ($_smarty_tpl->tpl_vars['category']->value=='api/exception'){?> class="active"<?php }?>><a href="#">异常代码接口</a></li>
                <li class="nav-header">API工具</li>
                <li<?php if ($_smarty_tpl->tpl_vars['category']->value=='tools/exception'){?> class="active"<?php }?>><a href="/wiki/tools/exception">平台异常代码</a></li>
            </ul>
        </div><?php }} ?>