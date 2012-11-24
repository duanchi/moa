<?php /* Smarty version Smarty-3.1.11, created on 2012-11-20 11:21:25
         compiled from "/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/pending.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:181728494950a9d77092c2e0-72494334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83912541dc3b3ecc52c9eddac3a7a6a5d0610b9c' => 
    array (
      0 => '/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/pending.tmpl.html',
      1 => 1353381495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181728494950a9d77092c2e0-72494334',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50a9d770931976_90302580',
  'variables' => 
  array (
    '_RESULT' => 0,
    'dispatch' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a9d770931976_90302580')) {function content_50a9d770931976_90302580($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>售后工单管理系统</title>
<link rel="stylesheet" type="text/css" href="http://static.wo-api.com/bootstrap/css?2.2.1" />
<link rel="stylesheet" type="text/css" href="/themes/bootstrap2/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/themes/bootstrap2/css/dispatch.css" />
</head>

<body>

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['ROOT_TEMPLATE_PATH']->value)."/include/header.tmpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container" style="height:100%;">
	<div class="span12 wrapper-box">
    	<div class="box-header">
        	<div class="navbar">
            	<div class="navbar-inner">
                	<div class="container">
                    	<ul class="nav">
                        	<li class="active"><a href="#"><i class="icon-share"></i>&nbsp;派单管理</a></li>
                            <li><a href="#"><i class="icon-check"></i>&nbsp;回单管理</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="api-doc" class="box-body row-fluid">
<?php echo $_smarty_tpl->getSubTemplate ('./sidebar.tmpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="box-content">
            	<table class="table table-striped">
                	<thead>
                    	<th>工单编号</th>
                        <th>客户名称</th>
                    	<th>产品类型</th>
                        <th>提交时间</th>
                        <th></th>
                    </thead>
                    <tbody>
<?php  $_smarty_tpl->tpl_vars['dispatch'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dispatch']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_RESULT']->value['dispatch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dispatch']->key => $_smarty_tpl->tpl_vars['dispatch']->value){
$_smarty_tpl->tpl_vars['dispatch']->_loop = true;
?>
                    	<tr>
                        	<td><?php echo $_smarty_tpl->tpl_vars['dispatch']->value['job_number'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['dispatch']->value['customer'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['dispatch']->value['product'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['dispatch']->value['occurrence_time'];?>
</td>
                            <td><a class="badge" href="#view-dispatch-modal" rel="view-dispatch" data-id="<?php echo $_smarty_tpl->tpl_vars['dispatch']->value['job_number'];?>
">工单详情</a>&nbsp;<a class="badge" href="">处理</a></td>
                        </tr>
<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
        </div>
    </div>
</div>
<div id="view-dispatch-modal" class="modal span9 hide fade">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>查看工单&nbsp;ZXPT-201211050010</h3>
    </div>
    <div class="modal-body">
    	<form class="dispatch-preview form-horizontal">
        	<section>
                <h3>受理信息</h3>
                <div class="control-group">
                    <label class="control-label" for="job_number">工单编号&nbsp;</label>
                    <div class="controls"><label id="job_number" name="job_number" class="span6">ZXPT-201211050010</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contacts">工单提交时间&nbsp;</label>
                    <div class="controls"><label id="contacts" class="span6" name="contacts" placeholder="联系电话">2012-11-05 14:35:43</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contacts">工单提交人&nbsp;</label>
                    <div class="controls"><label id="contacts" class="span6" name="contacts" placeholder="联系电话">吕振华</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contacts">工单处理人&nbsp;</label>
                    <div class="controls"><label id="contacts" class="span6" name="contacts" placeholder="联系电话">史景烨(已使用短信提醒)</label></div>
                </div>
            </section>
            <section>
                <h3>客户信息</h3>
                <div class="control-group">
                    <label class="control-label" for="customer">客户名称&nbsp;</label>
                    <div class="controls"><label id="customer" class="span6" name="customer" placeholder="客户名称">这是客户名称</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contacts">联系电话&nbsp;</label>
                    <div class="controls"><label id="contacts" class="span6" name="contacts" placeholder="联系电话"></label></div>
                </div>
            </section>
            <section>
                <h3>工单信息</h3>
                <div class="control-group">
                    <label class="control-label" for="customer">产品分类&nbsp;</label>
                    <div class="controls"><label id="customer" class="span6" name="customer" placeholder="客户名称">这是客户名称</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contacts">问题描述&nbsp;</label>
                    <div class="controls"><label id="contacts" class="span6" name="contacts" placeholder="联系电话"><br />asdfasf<br />sfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsadsfasdfsad</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="contacts">问题备注&nbsp;</label>
                    <div class="controls"><label id="contacts" class="span6" name="contacts" placeholder="联系电话"></label></div>
                </div>
            </section>
        </form>
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal">关闭</button>
    <button id="add-dispatch-modal-submit" class="btn btn-primary">处理工单</button>
    </div>
</div>

</body>
<script type="text/javascript" src="http://static.wo-api.com/jquery?1.8.0"></script>
<script type="text/javascript" src="http://static.wo-api.com/bootstrap/js?2.2.1"></script>
<script type="text/javascript" src="/themes/bootstrap2/js/controller/dispatch.controller.js"></script>
<script type="text/javascript" src="/themes/bootstrap2/js/lib/dispatch.lib.js"></script>
</html><?php }} ?>