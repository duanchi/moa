// JavaScript Document
$(function(){
	$('aside.sidebar').delay(1000).animate({width:'48px'},'fast','linear',function(){
		$('.icon-chevron-up').removeClass('icon-chevron-up').addClass('icon-chevron-down');
		$('.sidebar-fixed-left .notification:gt(0)').removeClass('pull-right').addClass('notification-popup');
	});
	sidebar.init();
	$('#wrapper-container').tooltip({selector:"a[rel=tooltip]",placement:"bottom"});
	//$('.sidebar-fixed-left').popover({selector:"a[rel=popover]",placement:"right"});
	$('#user-options').popover();
});