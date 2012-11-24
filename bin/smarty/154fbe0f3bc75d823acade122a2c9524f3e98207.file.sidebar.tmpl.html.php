<?php /* Smarty version Smarty-3.1.11, created on 2012-11-06 15:23:22
         compiled from "/Users/duanChi/Projects/after-sales-manage/trunk/application/modules/Support/views/dispatch/sidebar.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:2264492965098829a10cb50-68905768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '154fbe0f3bc75d823acade122a2c9524f3e98207' => 
    array (
      0 => '/Users/duanChi/Projects/after-sales-manage/trunk/application/modules/Support/views/dispatch/sidebar.tmpl.html',
      1 => 1352185921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2264492965098829a10cb50-68905768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5098829a10dd00_24580206',
  'variables' => 
  array (
    '_REQUEST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5098829a10dd00_24580206')) {function content_5098829a10dd00_24580206($_smarty_tpl) {?>        	<div class="box-sidebar well sidebar-nav span3">
            	<ul class="nav nav-list">
                	<li class="nav-header">新派单</li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='support'){?> class="active"<?php }?>><a href="#">新增售后派单</a></li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='consult'){?> class="active"<?php }?>><a href="#">新增咨询派单</a></li>
                    <li class="nav-header">派单管理</li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='pending'){?> class="active"<?php }?>><a href="#">待处理派单</a></li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='processing'){?> class="active"<?php }?>><a href="#">处理中派单</a></li>
                    <li<?php if ($_smarty_tpl->tpl_vars['_REQUEST']->value['controller']=='Dispatch'&&$_smarty_tpl->tpl_vars['_REQUEST']->value['action']=='finished'){?> class="active"<?php }?>><a href="#">已完成派单</a></li>
                </ul>
            </div><?php }} ?>