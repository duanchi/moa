var socket_server = 'ws://172.16.0.211:8000/im';
//var current_user = 'duanchi';
var current_user = prompt('请输入昵称');
var im = {
	init : function () {
		im.dom.init();
		im.behavior.init();
		im.socket.init();
	},
	
	dom : {
		init : function () {
			im.dom._init_heights();
		},
		
		_init_heights : function () {
			$('#im-interface-modal .modal-body').height($('#im-interface-modal').height() - $('#im-interface-modal .modal-header').height() - 19);
			$('#im-interface-modal .modal-body .conversation-content').width($('#im-interface-modal .modal-body').width() - $('#im-interface-modal .modal-body .conversation-list').width() - 30);
			$('#im-interface-modal .modal-body .conversation-content').height($('#im-interface-modal .modal-body').height() - 80);
			$('#add-conversation .search-query').width($('#im-interface-modal .modal-body .conversation-content').width() - 100);
		},
		
		show_conversation : function(user, message, date, type) {
			var container = $('.conversation-content>section[data-name="' + user + '"]'), content = (type == 'receive' ? '<blockquote class="pull-left">' : '<blockquote class="pull-right">') + '<small>' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds() + '</small><p>' + message + '</p></blockquote>';
			if (container.length == 0) im.behavior.refesh_online_list('show');
			$(container).append(content);
		},
	},
	
	behavior : {
		__online_popup_list_status : false,
		init : function () {
			im.behavior._init_online_popup_list();
			im.behavior._init_add_conversation_btn();
			im.behavior._init_current_user();
			
		},
		
		_init_current_user : function () {
			$('#current-user').text(current_user);
		},
		
		_init_online_popup_list : function () {
			$('#new-conversation').on('click',function(){
				$('#new-conversation').popover({
					'placement' : 'bottom',
					'content' : im.behavior._get_content(),
					'trigger' : 'manual'
				});
			});
			$('#new-conversation').on('click',function(){
				event.stopPropagation();
				if(im.behavior.__online_popup_list_status) {
					$('#new-conversation').popover('hide');
					im.behavior.__online_popup_list_status = false;
				} else {
					$('#new-conversation').popover('show');
					im.behavior.__online_popup_list_status = true;
				}
			});
			$(document).click(function(){
				$('#new-conversation').popover('hide');
				im.behavior.__online_popup_list_status = false;
			});
		},
		
		_init_add_conversation_btn : function () {
			$('#add-conversation-btn').on('click',function(){
				var result = false, message = $('#add-conversation .search-query').val();
				if (message != '') {
					var date = new Date(), payload = new Object();
					payload.action = 'message';
					payload.user = $(this).attr('data-name');
					payload.direct_id = $(this).attr('data-id');
					payload.data = message;
					//log("Sent @ " + date.getHours() + "点" + date.getMinutes() + "分: <br />" + payload.data + "<br />");
					im.dom.show_conversation(payload.user,message,date,'send');
					result = im.socket.send(JSON.stringify(payload));
					$('#add-conversation .search-query').val('');
				}
				return result;
			});
			
			
		},
		
		refesh_online_list : function () {
			//arguments[0] = action
			//arguments[1] = data
			switch (arguments[0]) {
				case 'get' :
					payload = {
						action : 'auth',
						user : current_user,
					};
					im.socket.send(JSON.stringify(payload));
					break;
					
				case 'show' :
				default :
					var content = '';
					for (var v = 0; v < arguments[1].length ; v++) content += '<li><a href="#" onclick="im.behavior.select_client(\'' + arguments[1][v].user + '\',\'' + arguments[1][v].id + '\',\'add\');">' + arguments[1][v].user + '</a></li>';
					$('#current-online-list').empty();
					$('#current-online-list').append(content);
					break;
			}
		},
		
		select_client : function (user, id, type) {
			id = (type == 'switch') ? $(id).attr('data-id') : id;
			//找到该元素
			var element = $('#conversation-user-list>li[data-name="' + user + '"]'), active = ($('.active',$(this).parent()).length == 0 ? false : true);
			//如果存在,改为用户当前id
			if (element.length > 0) $('a',element).attr('data-id',id);
			//如果没有则追加
			else $('#conversation-user-list').append('<li data-name="' + user + '"><span class="label label-success">online</span><a href="#" onclick="im.behavior.select_client(\'' + user + '\',this,\'switch\');" data-id="' + id + '">' + user + '</a></li>');
			//重新获得该元素
			element = $('#conversation-user-list>li[data-name="' + user + '"]');
			//焦点转移到当前元素 若是notify 则忽略焦点移动
			if (type != 'notify') {
				$('#conversation-user-list>li').removeClass('active');
				$(element).addClass('active');
				//去掉notify图标 图标为已读状态
				$('a .badge',element).remove();
				
				//对话内容切换
				//隐藏所有对话框
				$('.conversation-content>section').addClass('hide');
			} else {//notify 添加notify图标
				var notify = $('a>.badge',$(element));
				if (notify.length == 0) {//没有notify图标的情况
					$('a',element).append('<span class="pull-right badge">1</span>');
				} else {//存在notify图标的情况
					$(notify).text(parseInt($(notify).text()) + 1);
				}
			}
			var conversation_content = $('.conversation-content>section[data-name="' + user + '"]');
			//不存在当前用户对话框则新建对话框
			if (conversation_content.length == 0) {
				
				$('.conversation-content').append('<section data-name="' + user + '" class="conversation-content-inner hide"></section>');
				conversation_content = $('.conversation-content>section[data-name="' + user + '"]');
			}
			////焦点转移到当前对话框 若是notify则忽略
			if (type != 'notify') {
				$(conversation_content).removeClass('hide');
				$('#add-conversation .search-query').focus();
			}
			//给聊天输入框赋值
			$('#add-conversation-btn').attr('data-id',id);
			$('#add-conversation-btn').attr('data-name',user);
			
			return false;
		},
		
		_get_content : function () {
			return '<ul class="user-list">' + $('#current-online-list').html() + '</ul>';
		},
		
	},
	
	socket : {
		__connection : new Object,
		init : function () {
			if (im.socket.connect(socket_server)) {
				//websocket主体内容
				
				//连接
				im.socket.__connection.onopen = function(msg) {
					//返回当前在线人数
					im.behavior.refesh_online_list('get');
					return $('#status').removeClass().addClass('label label-success').html('在线');
				};
				//关闭
				im.socket.__connection.onclose = function() {
					return $('#status').removeClass().addClass('label').html('离线');
				};
				//信息接收
				im.socket.__connection.onmessage = function(msg) {
					//alert(msg.data);
					var response = JSON.parse(msg.data);
					switch(response.action) {
						case 'message' :
							if ($('#add-conversation-btn').attr('data-name') != response.from.user) im.behavior.select_client(response.from.user,response.from.id,'notify');
							im.dom.show_conversation(response.from.user,response.data,new Date(),'receive');
							break;
						
						case 'sync' :
						default :
							im.behavior.refesh_online_list('show',response.data);
							break;
					}
				};
				
			} else alert('websocket初始化失败,请确认是否支持websocket');
		},
		
		connect : function (server) {
			var result = false;
			if (window.MozWebSocket) {
				im.socket.__connection = new MozWebSocket(server);
				im.socket.__connection.binaryType = 'blob';
				result = true;
			} else if(window.WebSocket) {
				im.socket.__connection = new WebSocket(server);
				im.socket.__connection.binaryType = 'blob';
				result = true;
			} else im.socket.__connection = undefined;
			return result;
		},
		send : function(data) {return im.socket.__connection.send(data)},
	},
}

