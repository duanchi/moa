<?php /* Smarty version Smarty-3.1.11, created on 2012-11-16 15:37:12
         compiled from "/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/preprocess.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:135446086350a5ed2882c807-18943154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab382cbb944a95b6da0970783ac1745afde43f72' => 
    array (
      0 => '/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/preprocess.tmpl.html',
      1 => 1353050285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135446086350a5ed2882c807-18943154',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50a5ed28831183_89075438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a5ed28831183_89075438')) {function content_50a5ed28831183_89075438($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>售后工单管理系统</title>
<link rel="stylesheet" type="text/css" href="http://static.wo-api.com/bootstrap/css?2.2.1" />
<link rel="stylesheet" type="text/css" href="/themes/bootstrap2/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/themes/bootstrap2/css/dispatch.css" />
</head>

<body>
<div class="container">
	<div class="navbar navbar-fixed-top navbar-inverse">
    	<div class="navbar-inner">
        	<div class="container">
            	<a class="brand" href="#">售后工单管理系统</a>
                <a class="pull-right" href="">基于wo-api开放平台技术构建</a>
            </div>
        </div>
    </div>
</div>
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
        	<div class="box-sidebar well sidebar-nav span3">
            	<ul class="nav nav-list">
                	<li class="nav-header">新派单</li>
                    <li><a href="#">新增售后派单</a></li>
                    <li><a href="#">新增咨询派单</a></li>
                    <li class="nav-header">派单管理</li>
                    <li class="active"><a href="#">待处理派单</a></li>
                    <li><a href="#">处理中派单</a></li>
                    <li><a href="#">已完成派单</a></li>
                </ul>
            </div>
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
                    	<tr>
                        	<td>ZXPT-201211050010</td>
                            <td>社区客户</td>
                            <td>综信平台</td>
                            <td>2012-11-05 15:24:09</td>
                            <td><a class="badge" href="#view-dispatch-modal" data-toggle="modal">工单详情</a>&nbsp;<a class="badge" href="">处理</a></td>
                        </tr>
                        <tr>
                        	<td>ZXPT-201211050010</td>
                            <td>社区客户</td>
                            <td>综信平台</td>
                            <td>2012-11-05 15:24:09</td>
                            <td><a class="badge" href="">处理</a></td>
                        </tr>
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