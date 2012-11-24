$(function(){
	gis.map.init({
		"version":"baidumap",
		"container":"map",
		"options":{
			"center":[38.051853521418,114.51780366703],
			"zoom":15,
			"apikey":"AIzaSyAQlbbv-V7909JynTZDCITYMNDvbzHb_Lg"
		}
	});
	$('#option .handler').on('click',function(){
		toggle_option();
	});
	/*$('#option a[rel=popover-menu]').on('click',function(){
		$('#popover-menu').toggleClass('show');
	});*/
	$('#option a[rel=popover]').popover();
	//$('#option a[rel=popover]').on('click',function(){
	//	$('#option a[rel=popover]').popover();
	//});
});