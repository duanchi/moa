var MNoCheckKeyFlag = true,option_fold = true;
var gis = {
	map : {
		default_options : {
			googlemap : {
				apikey : 'AIzaSyAQlbbv-V7909JynTZDCITYMNDvbzHb_Lg',
			},
			mapabc : {
				apikey:'b0a7db0b3a30f944a21c3682064dc70ef5b738b062f6479a5eca39725798b1ee300bd8d5de3a4ae3|29e8ed1f7f6a97d8e99fc568cea6a7dc0ccd920856e07c0718b9885faf7551a1814699c81f526d7',
			},
			center : [38.051853521418,114.51780366703],
			zoom : 15,
		},
		object : {},
		options : {},
		init : function (o) {
			gis.map.options = o;
			eval('gis.map.extend.' + gis.map.options.version.toLowerCase() + '();');
			gis.map.show();
		},
		show : function() {/* 在gis.map.extend.CURRENTMAP中重写该函数 */},
		clear : function() {
			gis.map.object = {};
			$('#' + gis.map.options.container).empty();
		},
		set_center : function(){},
		extend : {
			googlemap : function() {
				gis.map.show = function() {
					var key = (typeof(gis.map.options.options) != 'undefined' && typeof(gis.map.options.options.apikey) != 'undefined') ? gis.map.options.options.apikey : gis.map.default_options.googlemap.apikey;
					$.getScript('http://maps.googleapis.com/maps/api/js?key=' + key + '&sensor=false',function(){
						$.getScript('http://maps.gstatic.com/intl/zh_cn/mapfiles/api-3/9/13b/main.js',function(){
							var options = {
								center: (typeof(gis.map.options.options) != 'undefined' && typeof(gis.map.options.options.center) == 'object') ? new google.maps.LatLng(gis.map.options.options.center[0],gis.map.options.options.center[1]) : new google.maps.LatLng(gis.map.default_options.center[0],gis.map.default_options.center[1]),
								zoom: (typeof(gis.map.options.options) != 'undefined' && gis.map.options.options.zoom > 0 && gis.map.options.options.zoom < 18) ? gis.map.options.options.zoom : gis.map.default_options.zoom,
								mapTypeId: google.maps.MapTypeId.ROADMAP,
								panControl: false,
								rotateControl: false,
								scaleControl: false,
								streetViewControl: false,
							};
							gis.map.object = new google.maps.Map(document.getElementById(gis.map.options.container),options);
						});
					});
				};
				gis.map.set_center = function(){};
			},
			mapabc : function() {
				gis.map.show = function() {
					var key = (typeof(gis.map.options.options) != 'undefined' && typeof(gis.map.options.options.apikey) != 'undefined') ? gis.map.options.options.apikey : gis.map.default_options.mapabc.apikey;
					$.getScript('http://api.mapabc.com/ajaxmap/2.1.2/js/ame.js?key=' + key,function(){
						var script_count = 0;
						$.getScript('http://api.mapabc.com/ajaxmap/2.1.2/js/Mapabc.js',function(){script_count++});
						$.getScript('http://api.mapabc.com/ajaxmap/2.1.2/js/Profile.js',function(){script_count++});
						$.getScript('http://api.mapabc.com/ajaxmap/2.1.2/js/mapTools.js',function(){script_count++});
						$.getScript('http://api.mapabc.com/ajaxmap/2.1.2/js/validateKey.js',function(){script_count++});
						$.getScript('http://api.mapabc.com/ajaxmap/2.1.2/js/asaCore.js?key=' + key,function(){script_count++});
						var loop = setInterval(function(){
							if (script_count == 5) {
								var options = new MMapOptions();//构建地图辅助类
								options.zoom = (typeof(gis.map.options.options) != 'undefined' && gis.map.options.options.zoom > 0 && gis.map.options.options.zoom < 18) ? gis.map.options.options.zoom : gis.map.default_options.zoom;//设置地图zoom级别
								options.center = (typeof(gis.map.options.options) != 'undefined' && typeof(gis.map.options.options.center) == 'object') ? new MLngLat(gis.map.options.options.center[1],gis.map.options.options.center[0]) : new MLngLat(gis.map.default_options.center[1],gis.map.default_options.center[0]);   //设置地图中心点
								options.toolbar = MINI;//工具条 
								options.toolbarPos = new MPoint(15,15);  //工具条
								options.overviewMap = HIDE;//是否显示鹰眼
								options.scale = HIDE;//是否显示比例尺
								options.returnCoordType = COORD_TYPE_OFFSET;//返回数字坐标
								options.zoomBox = false;//鼠标滚轮缩放和双击放大时是否有红框动画效果。
								gis.map.object = new MMap(gis.map.options.container,options); //地图初始
								clearInterval(loop);
							}
						},50);
					});
				};
			},
			baidumap : function() {
				gis.map.show = function() {
					$.getCss('http://api.map.baidu.com/res/12/bmap.css');
					$.getScript('http://api.map.baidu.com/getscript?v=1.2&key=&services=',function(){
						gis.map.object = new BMap.Map(gis.map.options.container);
						var point = (typeof(gis.map.options.options) != 'undefined' && typeof(gis.map.options.options.center) == 'object') ? new BMap.Point(gis.map.options.options.center[1],gis.map.options.options.center[0]) : new BMap.Point(gis.map.default_options.mapabc.center[1],gis.map.default_options.mapabc.center[0]);
						gis.map.object.centerAndZoom(point,(typeof(gis.map.options.options) != 'undefined' && gis.map.options.options.zoom > 0 && gis.map.options.options.zoom < 18) ? gis.map.options.options.zoom : gis.map.default_options.zoom);
					});
				};
			},
		}
	}
}
$.extend({  
    getCss: function(cssurl){  
        return $("head").append('<link href="' + cssurl + '" rel="stylesheet" />');
    }  
});

function show(map) {
	gis.map.clear();
	gis.map.init({
		"version":map,
		"container":"map",
		"options":{
			"center":[38.051853521418,114.51780366703],
			"zoom":15,
			"apikey":"AIzaSyAQlbbv-V7909JynTZDCITYMNDvbzHb_Lg"
		}
	});
}

function toggle_option() {
	if (option_fold == true) {
		$('#option').animate({top:'0px'},'fast','linear');
		option_fold = false;
	}
	else {
		$('#option').animate({top:'-140px'},'fast','linear');
		option_fold = true;
	}
}

/*
{
	"version":"mapabc",
	"container":"map",
	"options":{
		"center":[39.90923,116.397428],
		"zoom":13,
		"apikey":""
	}
}
*/