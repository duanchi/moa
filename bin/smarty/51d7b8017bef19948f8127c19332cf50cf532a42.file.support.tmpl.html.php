<?php /* Smarty version Smarty-3.1.11, created on 2012-11-16 11:26:07
         compiled from "/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/support.tmpl.html" */ ?>
<?php /*%%SmartyHeaderCode:1779076286509b0bc0bea088-42597642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51d7b8017bef19948f8127c19332cf50cf532a42' => 
    array (
      0 => '/Users/duanChi/Projects/after-sales-manage/application/modules/Support/views/dispatch/support.tmpl.html',
      1 => 1353036232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1779076286509b0bc0bea088-42597642',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_509b0bc0c1b927_79129430',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_509b0bc0c1b927_79129430')) {function content_509b0bc0c1b927_79129430($_smarty_tpl) {?><!doctype html>
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
        <div class="box-body row-fluid">
<?php echo $_smarty_tpl->getSubTemplate ('./sidebar.tmpl.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <div class="box-content">
            	<section>
                    <form id="add-dispatch" class="form-horizontal dispatch" method="post">
                        <fieldset>
                            <section>
                            <h3 class="form-actions">客户信息</h3>
                            <div class="control-group">
                                <label class="control-label" for="customer">客户名称</label>
                                <div class="controls"><input type="text" id="customer" class="span8" name="customer" placeholder="客户名称"></div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="contacts">联系电话</label>
                                <div class="controls"><input type="text" id="contacts" class="span8" name="contacts" placeholder="联系电话"></div>
                            </div>
                            </section>
                            <section>
                            <h3 class="form-actions">工单信息</h3>
                            <div class="control-group">
                                <label class="control-label" for="PID">产品分类</label>
                                <input type="hidden" value="" id="PID" name="PID" />
                                <div class="controls">
                                	<div id="PID-selector" class="btn-group">
                                    	<button id="PID-selector-name" class="btn" onclick="return false;">请选择产品分类</button><button class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    </div><!-- /btn-group -->
                                </div>
                            </div>
                            
                            
                            <div class="control-group">
                                <label class="control-label" for="description">问题描述</label>
                                <div class="controls"><textarea id="description" class="span8" rows="5" name="description" placeholder="请输入问题描述"></textarea></div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="comments">问题备注</label>
                                <div class="controls"><textarea id="comments" class="span8" rows="3" name="comments" placeholder="问题备注,请填写用户名、密码、域名等其他信息"></textarea></div>
                            </div>
                            <div class="control-group">
                            	<div class="controls">
                            		<label class="checkbox" for="enable_msg"><input type="checkbox" id="enable_msg" name="enable_msg" checked="checked" value="true">短信提醒处理人员</label>
                                </div>
                            </div>
                            </section>
                            <div class="form-actions pull-bottom span12">
                            	<button type="reset" class="btn pull-right">重新填写</button>
                            	<button id="preview-submit" type="submit" class="btn btn-primary pull-right" data-target="#add-dispatch-modal">提交工单...</button>
                            </div>
                        </fieldset>
                    </form>
                </section>
            </div>
        </div>
        <div class="box-footer">
        </div>
    </div>
</div>
<div id="add-dispatch-modal" class="modal span9 hide fade">
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>确认工单&nbsp;</h3>
    </div>
    <div class="modal-body">
    	<form class="dispatch-preview form-horizontal">
        	<section>
                <h3>受理信息</h3>
                <div class="control-group">
                    <label class="control-label" for="preview_job_number">工单编号&nbsp;</label>
                    <div class="controls"><label id="preview_job_number" name="preview_job_number" class="span6"></label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="preview_occurrence_time">工单提交时间&nbsp;</label>
                    <div class="controls"><label id="preview_occurrence_time" class="span6" name="preview_occurrence_time">2012-11-05 14:35:43</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="preview_post_user">工单提交人&nbsp;</label>
                    <div class="controls"><label id="preview_post_user" class="span6" name="preview_post_user">吕振华</label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="preview_process_user">工单处理人&nbsp;</label>
                    <div class="controls"><label id="preview_process_user" class="span6" name="preview_process_user"></label></div>
                </div>
            </section>
            <section>
                <h3>客户信息</h3>
                <div class="control-group">
                    <label class="control-label" for="preview_customer">客户名称&nbsp;</label>
                    <div class="controls"><label id="preview_customer" class="span6" name="preview_customer"></label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="preview_contacts">联系电话&nbsp;</label>
                    <div class="controls"><label id="preview_contacts" class="span6" name="preview_contacts"></label></div>
                </div>
            </section>
            <section>
                <h3>工单信息</h3>
                <div class="control-group">
                    <label class="control-label" for="preview_PID">产品分类&nbsp;</label>
                    <div class="controls"><label id="preview_PID" class="span6" name="preview_PID"></label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="preview_description">问题描述&nbsp;</label>
                    <div class="controls"><label id="preview_description" class="span6" name="preview_description"></label></div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="preview_comments">问题备注&nbsp;</label>
                    <div class="controls"><label id="preview_comments" class="span6" name="preview_comments"></label></div>
                </div>
            </section>
        </form>
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal">关闭</button>
    <button id="add-dispatch-modal-submit" class="btn btn-primary">确认提交工单</button>
    </div>
</div>
</body>
<script type="text/javascript" src="http://static.wo-api.com/jquery?1.8.0"></script>
<script type="text/javascript" src="http://static.wo-api.com/bootstrap/js?2.2.1"></script>
<script type="text/javascript" src="/themes/bootstrap2/js/lib/common.lib.js"></script>
<script type="text/javascript" src="/themes/bootstrap2/js/controller/dispatch.controller.js"></script>
<script type="text/javascript" src="/themes/bootstrap2/js/lib/dispatch.lib.js"></script>
</html><?php }} ?>