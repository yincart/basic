// JavaScript Document
function magnifier()
{
	//容器
	var box = $("#product-view-box");
	//放大镜图片容器
	var zoom = $("#product-view-box .zoom");
	
	var zoomImage = $("#product-view-box .zoom img");
	//商品放大镜效果图容器
	var zoomDiv = $("#product-view-box .zoom-div");
	//放大镜容器
	var zoomMouse = $("#product-view-box .zoom .zoom-mouse");
	//缩略图容器
	var smallList = $("#product-view-box .small-box");
	
	var control = smallList.find("li");
	
	var controlImage = control.find("img");
	
	var flashIndex = 0;
	//目标距离
	var target = 0; 
	//时间间隔
	var pause = 500;
	//每次移动距离
	var parameter = 62;

	var iNow = 0;
	
	
	//鼠标移动事件   生成放大镜
	function buildZoomMouse(mouseLeft,mouseTop,max_Left,max_Top)
	{
		//给放大镜设置边界  只允许再其范围内活动
		if(mouseLeft<0){
			mouseLeft = 0;
		}else if(mouseLeft>max_Left){
			mouseLeft = max_Left;
		}
		
		
		if(mouseTop<0){
			mouseTop = 0;
		}else if(mouseTop>max_Top){
			mouseTop = max_Top;
		}
		
		//获取放大镜的移动比例，即这个小框在区域中移动的比例
		var x = mouseLeft / zoom.outerWidth();
		var y = mouseTop / zoom.outerHeight();
		
		var bigLeft = -x * $("#product-view-box .zoom-div img").outerWidth();
		var bigTop = -y * $("#product-view-box .zoom-div img").outerHeight();
		
		//设定小框的位置
		zoomMouse.css({"left":mouseLeft,"top":mouseTop,"display":"block"});
		//使显示放大镜效果处于显示状态
		zoomDiv.css({"display":"block"});
		//生成放大镜效果图
		$("#product-view-box .zoom-div img").css({"left":bigLeft,"top":bigTop});
	}
	//鼠标离开 取消放大镜
	function canceZoomMouse()
	{
		zoomMouse.css({"display":"none"});
		zoomDiv.css({"display":"none"});
	}

	//处理鼠标移动
	function zoomMouseMove(event)
	{
		//算出放大镜在小图上面的位置 x y
		var zoomMouseLeft = event.pageX - zoom.offset().left - zoomMouse.outerWidth() / 2;
		var zoomMouseTop = event.pageY - zoom.offset().top - zoomMouse.outerHeight() / 2;
		var maxLeft = zoom.width() - zoomMouse.outerWidth();
		var maxTop = zoom.height() - zoomMouse.outerHeight();
		//生成放大镜 同时生成放大镜效果图
		buildZoomMouse(zoomMouseLeft,zoomMouseTop,maxLeft,maxTop);
	}

	//处理鼠标离开
	function zoomMouseLeave()
	{
		canceZoomMouse();
	}
	
	//下一张
	function imgNext()
	{
		if((flashIndex + 5) < control.length) 
		{
			flashIndex++;
			move(flashIndex);

			controlImage.removeClass("img-hover");
			controlImage.eq(flashIndex).addClass("img-hover");
			e = controlImage.eq(flashIndex).attr("src");
			zoomImage.eq(0).attr({src:e.replace("/n5/","/n1/")});
			$("#product-view-box .zoom-div img").eq(0).attr("src",e.replace("/n5/","/n0/"));
			if((flashIndex + 5) < control.length) 
			{
				//可移动状态
				$("#product-view-box .btn-next").removeClass("small-box-btn-off");
			}
			else
				//不可移动状态
				$("#product-view-box .btn-next").addClass("small-box-btn-off");
			if(flashIndex > 0)
				$("#product-view-box .btn-before").removeClass("small-box-btn-off");
		}
		
	}

	//上一张
	function imgPre()
	{
		if(flashIndex > 0)
		{
			flashIndex--;
			move(flashIndex);
			controlImage.removeClass("img-hover");
			controlImage.eq(flashIndex).addClass("img-hover");
			e = controlImage.eq(flashIndex).attr("src");
			zoomImage.eq(0).attr({src:e.replace("/n5/","/n1/")});
			$("#product-view-box .zoom-div img").eq(0).attr("src",e.replace("/n5/","/n0/"));
			if(flashIndex > 0)
				$("#product-view-box .btn-before").removeClass("small-box-btn-off");
			else
			    $("#product-view-box .btn-before").addClass("small-box-btn-off");
			if((flashIndex + 5) < control.length)
				$("#product-view-box .btn-next").removeClass("small-box-btn-off");
		}
		
	}
	
	function smallMouseMove(v)
	{
		controlImage.removeClass("img-hover");
		controlImage.eq(v).addClass("img-hover");
		zoomImage.attr('src',controlImage.eq(v).attr('data-url'));
	}
	
	function move(v){
		controlImage.removeClass("img-hover");
		controlImage.eq(v).addClass("img-hover");
		//会根据索引的增加而增加  根据索引的减少而减少
		target = -1 * parameter * flashIndex;
		toTarget(target);
		
	}
	//移动到目标
	function toTarget(step)
	{
		iNow = parseInt(iNow) || 0
		var iStep = step - iNow; 
		var iTarget = iNow + iStep;
		$("#product-view-box .small-box ul").animate({left:iTarget},pause);
	}
	
	zoom.bind("mousemove",zoomMouseMove).bind("mouseleave",zoomMouseLeave);
	control.click(function(){ 
					var t=$(this).find("img");
					e=t.attr("src");
					i=control.index($(this));
					controlImage.removeClass("img-hover");
					t.addClass("img-hover");
					zoomImage.eq(0).attr({src:e.replace("/n5/","/n1/")});
					$("#product-view-box .zoom-div img").eq(0).attr("src",e.replace("/n5/","/n0/"));
					});
	if(control.length > 5)
	{
		$("#product-view-box .btn-next").removeClass("small-box-btn-off");
	}
	else
	{
		$("#product-view-box .btn-next").addClass("small-box-btn-off");
	}
	
	$("#product-view-box .btn-next").click(function(){ 
				imgNext();
			});
	$("#product-view-box .btn-before").click(function(){ 
				imgPre();
			});
}