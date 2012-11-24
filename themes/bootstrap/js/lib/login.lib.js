var login = {
	init : function () {
		login.dom.init();
		login.behavior.init();
	},
	
	dom : {
		init : function() {
			$('[rel="tooltip"]').tooltip();
		},
		
	},
	
	behavior : {
		init : function () {
			login.behavior._init_local_user_storage();
			login.behavior._init_login_field();
			login.behavior._init_submit_event();
		},
		
		_init_login_field : function () {
			if ($('#login-inner>li.avatar').length == 0) {
				$('#login-inner').addClass('hide');
				$('#manual-login').removeClass('hide');
				$('#back-to-login').addClass('hide');
			}
			$('#login-inner .another-account>a[href="#manual-login"]').on('click',function(){
				$('#login-inner').fadeOut();
				$('#manual-login').removeClass('hide');
				return false;
			});
			$('#back-to-login').on('click',function(){
				$('#manual-login').addClass('hide');
				$('#login-inner').fadeIn();
				return false;
			});
		},
		
		_init_submit_event : function () {
			$('#login-inner .avatar').on('click',function(){
				data = {
					username : $(this).attr('data-username'),
					token : $(this).attr('data-token'),
				};
				login.behavior.login(data,'token');
			});
			$('#manual-login [name="submit"]').on('click',function() {
				data = {
					username : $('#manual-login [name="username"]').val(),
					password : $('#manual-login [name="password"]').val(),
					save_token : $('#manual-login [name="password"]').val() == 'true' ? true : false,
				};
				login.behavior.login(data,'password');
			});
		},
		
		__local_user_storage : {},
		__support_local_storage : false,
		
		_init_local_user_storage : function () {
			var data = new Array();
			data[0] = {
				username : 'duanchi',
				authorization_token : 'authorization_token',
				avatar : 'http://tp1.sinaimg.cn/1679192640/180/22822732235/1',
			};
			
			if (window.localStorage) login.behavior.__support_local_storage = true;
			//localStorage.setItem('user_storage',JSON.stringify(data));
			//localStorage.clear();
			if (localStorage.getItem('user_storage') != null) {
				login.behavior.__local_user_storage = JSON.parse(localStorage.getItem('user_storage'));
				var content = '';
				for (var i = 0; i < login.behavior.__local_user_storage.length; i++) content += '<li class="avatar pull-left" data-username="' + login.behavior.__local_user_storage[i].username + '" data-avatar="' + login.behavior.__local_user_storage[i].avatar + '" data-token="' + login.behavior.__local_user_storage[i].authorization_token + '"><span class="user-name">' + login.behavior.__local_user_storage[i].username + '</span></li>';
				$('#login-inner').prepend(content);
			}
		},
		
		login : function (data, type) {
			//type = password|token
			var result = false;
			switch (type) {
				case 'token' :
					
					break;
				
				case 'password' :
				default :
					$.ajax({
						url:'/api/login',
						type:'POST',
						dataType:'json',
						data:data,
						success: function(data) {
							if (data.status == true) {
								if (login.behavior.__support_local_storage == true) {
									localStorage.removeItem('user_storage');
									localStorage.setItem('user_storage',JSON.stringify(data.data));
								}
								window.location.href = '/';
							} else {
								$('#manual-login').append('<span class="alert alert-error hide">账号或密码错误,请重试<a class="close" data-dismiss="alert" href="#">&times;</a></span>');
								$('#manual-login .alert').fadeIn();
							}
						}
					});
					break;
			}
			
			return true;
		},
		
		
		
		
	},
}