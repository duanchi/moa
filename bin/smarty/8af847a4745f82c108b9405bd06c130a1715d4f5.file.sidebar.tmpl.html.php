<?php /* Smarty version Smarty-3.1.11, created on 2012-11-19 14:53:34
         compiled from "/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/sidebar.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1332763231509b0bc0c21719-36894914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8af847a4745f82c108b9405bd06c130a1715d4f5' => 
    array (
      0 => '/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/sidebar.tmpl.html',
      1 => 1353307963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1332763231509b0bc0c21719-36894914',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_509b0bc0c45105_92701917',
  'variables' => 
  array (
    '_REQUEST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_509b0bc0c45105_92701917')) {function content_509b0bc0c45105_92701917($_smarty_tpl) {?>        	<div class="box-sidebar well sidebar-nav span3">
            	<ul class="nav nav-list">
                	<li class="nav-header">新派单</li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='support'){?> class="active"<?php }?>><a href="/support/dispatch/support">新增售后派单</a></li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='consult'){?> class="active"<?php }?>><a href="/support/dispatch/consult">新增咨询派单</a></li>
                    <li class="nav-header">派单管理</li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='pending'){?> class="active"<?php }?>><a href="/support/dispatch/pending">待处理派单</a></li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='processing'){?> class="active"<?php }?>><a href="/support/dispatch/processing">处理中派单</a></li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='finished'){?> class="active"<?php }?>><a href="/support/dispatch/finished">已完成派单</a></li>
                </ul>
            </div><?php }} ?>