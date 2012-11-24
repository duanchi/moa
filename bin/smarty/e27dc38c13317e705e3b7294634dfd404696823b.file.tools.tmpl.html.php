<?php /* Smarty version Smarty-3.1.11, created on 2012-11-01 16:48:50
         compiled from "/Users/duanChi/Projects/dashboard/trunk/application/views/wiki/tools.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:20386692995088ef940ed039-16173030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e27dc38c13317e705e3b7294634dfd404696823b' => 
    array (
      0 => '/Users/duanChi/Projects/dashboard/trunk/application/views/wiki/tools.tmpl.html',
      1 => 1351759728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20386692995088ef940ed039-16173030',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5088ef940f01c6_18461432',
  'variables' => 
  array (
    '_RESULT' => 0,
    'code_item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5088ef940f01c6_18461432')) {function content_5088ef940f01c6_18461432($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>错误代码 &middot 文档 &middot 开放平台</title>
<link rel="stylesheet" href="http://static.wo-api.com/bootstrap/css?2.1.0" />
<link rel="stylesheet" href="/themes/bootstrap2/css/bootstrap.css" />
<link rel="stylesheet" href="/themes/bootstrap2/css/docs.css" />
</head>

<body>
<div class="container">
	<div class="navbar navbar-fixed-top navbar-inverse">
    	<div class="navbar-inner">
        	<div class="container">
            	<a class="brand" href="#">开放平台</a>
                <ul class="nav pull-right">
                	<li><a href="#">首页</a></li>
                    <li><a href="#">产品</a></li>
                    <li><a href="#">应用开发</a></li>
                    <li class="active"><a href="#">文档</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="container-content span12 well">
    	<div class="row-fluid">
<?php echo $_smarty_tpl->getSubTemplate ("wiki/wiki-sidebar.tmpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('category'=>$_smarty_tpl->tpl_vars['_RESULT']->value['category']), 0);?>

        <div id="doc-content" class="span9">
<?php if ($_smarty_tpl->tpl_vars['_RESULT']->value['route']=='exception'){?>
            <div class="page-header"><h3>平台接口请求异常代码</h3><p>异常代码查询提供平台异常代码明细查询,方便应用开发与维护.</p></div>
            <section>
				<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>状态编码</th>
                            <th>状态信息</th>
                            <th>状态描述</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php  $_smarty_tpl->tpl_vars['code_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['code_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_RESULT']->value['code_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['code_item']->key => $_smarty_tpl->tpl_vars['code_item']->value){
$_smarty_tpl->tpl_vars['code_item']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['code_item']->value['status_code'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['code_item']->value['message'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['code_item']->value['description'];?>
</td>
                        </tr>
<?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">更新时间 2012-10-25</td>
                        </tr>
                    </tfoot>
				</table>
            </section>
<?php }else{ ?>

<?php }?>
        </div>
        </div>
    </div>
</div>


</body>
<script type="text/javascript" src="http://static.wo-api.com/jquery?1.8.0"></script>
</html><?php }} ?>