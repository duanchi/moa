var sidebar = {
	init : function() {
		sidebar.sibebar_action();
		sidebar.sidebar_slide();
	},
	sibebar_action : function() {
		$('.side>li>a').on('click',function(){
			//$(this).parent().siblings('li').removeClass('active');
			//$(this).parent().siblings('li').find('a').removeClass('white');
			$('.side>li').removeClass('active');
			$('.side>li>a>i').removeClass('icon-white');
			$(this).parent().addClass('active');
			$('i',this).addClass('icon-white');
		});
	},
	sidebar_slide :function(){ 
		var hoverTimer, outTimer; 
		$('aside.sidebar').hover(function(e){
			clearTimeout(outTimer);
			hoverTimer = setTimeout(function(){
				$('.sidebar-fixed-left .notification:gt(0)').removeClass('notification-popup').addClass('pull-right');
				$('aside.sidebar').animate({width:'14.89361702%'},'fast','linear',function(){
					$('.icon-chevron-down').removeClass('icon-chevron-down').addClass('icon-chevron-up');
				});
				//$('#profile-title').css('z-index',10);
			},500);
		},
		function(){
			clearTimeout(hoverTimer);
			outTimer = setTimeout(function(){
				$('aside.sidebar').animate({width:'48px'},'fast','linear',function(){
					$('.icon-chevron-up').removeClass('icon-chevron-up').addClass('icon-chevron-down');
					$('.sidebar-fixed-left .notification:gt(0)').removeClass('pull-right').addClass('notification-popup');
				});
				//$('#profile-title').css('z-index',100);
			},500);
		});
	}
}