function select_product (obj) {
	var data = $(obj).attr('data-value');
	if (data == '0' || data == 0 || data == null || data == undefined) {
		return false;
	} else {
		$('#PID-selector-name').text((!$.isEmptyObject($(obj).parent().parent().siblings('a').text()) ? ($(obj).parent().parent().siblings('a').text() + ' - ') : '') + $(obj).text());
		$('#PID').val(data);
	}
}

function init_preview() {
	//显示处理人
	var check = true;
	if ($('#PID').val() == '') {
		alert('请返回选择产品类别');
		check = false;
	}
	else get_product_leading($('#PID').val());
	
	//客户名称
	$('#preview_customer').text($('#customer').val());
	$('#preview_contacts').text($('#contacts').val());
	$('#preview_PID').text($('#PID-selector-name').text());
	$('#preview_description').text($('#description').val());
	$('#preview_comments').text($('#comments').val());
	
	get_jobnumber($('#PID').val());
	
	if (check == true) $('#add-dispatch-modal').modal('show');
}

function dispatch_view(id) {
	if (id != '' && id != undefined) {
		$.ajax({
			url:'/support/api/dispatch',
			dataType:'json',
			data:{'jobnumber':id},
			success: function(response){
				if (response != false) {
					$('#view-dispatch-modal').modal('show');
				} else alert('获取工单失败!');
			}
		});
	} else alert('无工单号');
}

function reset_preview() {
	$('#ctrl_enable_msg').remove();
	$('#preview_customer').text('');
	$('#preview_contacts').text('');
	$('#preview_PID').text('');
	$('#preview_description').text('');
	$('#preview_comment').text('');
	$('#add-dispatch-modal .modal-header h3').remove('span');
}


var jobnumber = '', p_id = 0;
function get_jobnumber(pid) {
	if (jobnumber == '' || pid != p_id) {
		$.ajax({
			url:'/support/api/jobnumber',
			dataType:'json',
			data:{'pid':pid},
			success: function(response){
				if (response != false) {
					jobnumber = response.jobnumber;
					p_id = pid;
					$('#preview_job_number').text(response.jobnumber);
				} else alert('获取工单编号失败!');
			}
		});
	} else $('#preview_job_number').text(jobnumber);
}

function get_product_leading(pid) {
	$.ajax({
		url:'/support/api/user',
		dataType:'json',
		data:{'pid':pid},
		success: function(response){
			if (response != false) {
				$('#preview_process_user').text(response.profile ? response.profile.screen_name : response.username);
				//短信提醒
				$('#enable_msg').attr('checked') == 'checked' ? $('#preview_process_user').append('<span id="ctrl_enable_msg">(已经启用短信提醒)</span>') : false;
			} else alert('无产品管理人!');
		}
	});
}

function dispatch_submit() {
	var o = {
		job_number:$('#preview_job_number').text(),
		occurrence_time:$('#preview_occurrence_time').text(),
		customer:$('#customer').val(),
		contacts:$('#contacts').val(),
		PID:$('#PID').val(),
		description:$('#description').val(),
		comments:$('#comments').val(),
		enable_msg:$('#enable_msg').val()
	};
	$.ajax({
		url:'/support/api/dispatch?action=add',
		type:'POST',
		dataType:'json',
		data:o,
		success: function(response){
			$('#add-dispatch-modal .modal-header h3').remove('span');
			if (response.status == 'true' || response.status == true) {
				$('#add-dispatch-modal .modal-header h3').append('<span class="label label-success">已成功发送工单.</span>');
				$('#add-dispatch-modal-submit').remove();
				window.location.href = '/support/dispatch/support';
			} else {
				$('#add-dispatch-modal .modal-header h3').append('<span class="label label-important">发送工单失败,请检查工单后重新发送.</span>');
				$('#add-dispatch-modal-submit').removeClass('btn-primary').addClass('btn-danger');
			}
		}
	});
	
}

function init_product_list(parent_id) {
	$.ajax({
		url:'/support/api/productlist',
		dataType:'json',
		data:{'parent_id':parent_id},
		success: function(response){
			var list = '';
			if (response != false) {
				list = show_product_list(response);
				$('#PID-selector').append(list);
			} else alert('获取产品列表失败!');
		}
	});
}

function show_product_list(obj) {
	var list = '';
	if (obj.category.length + obj.products.length > 0) {
		list += '<ul class="dropdown-menu">';
	}
	if (obj.category.length > 0) {
		for (n in obj.category) {
			list += '<li class="dropdown-submenu"><a href="#" data-value="0">' + obj.category[n].name + '</a>' + show_product_list(obj.category[n]) + '</li>';
		}
	}
	if (obj.products.length > 0) {
		for (m in obj.products) {
			list += '<li><a href="#" data-value="' + obj.products[m].PID + '">' + obj.products[m].name + '</a></li>';
		}
	}
	if (obj.category.length + obj.products.length > 0) {
		list += '</ul>';
	}
	return list;
}