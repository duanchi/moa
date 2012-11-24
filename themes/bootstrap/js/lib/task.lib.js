var task = {
	init : function() {
		task.container.init();
	},
	container : {
		init : function() {
			$('#task-detail-modal .task-detail-section-controller button').on('click',function(){
				$(this).siblings('button').removeClass('active');
				$(this).addClass('active');
				$('#task-detail-modal .modal-body .task-detail-section').removeClass('active');
				$('#task-detail-modal .modal-body ' + $(this).attr('href')).addClass('active');
			});
		}
	},
	content : {
		init : function() {
			
		}
	},
};