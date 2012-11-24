$(function(){
	$('#task-detail-modal').on('hidden',function(){
		$('.modal-header h5',this).text('');
	});
	$('a[rel="modal-task"]').on('click',function(){
		$('#task-detail-modal .modal-header h5').text('任务详情:' + $(this).text());
	});
	task.init();
});