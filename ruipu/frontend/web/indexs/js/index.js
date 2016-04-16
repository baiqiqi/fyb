$(function(){

    try{
        //首页中部图片滚动
        jQuery("#JS_slide_cont").slide({ titCell:".num ul" , mainCell:".JS_lb" , effect:"fold", autoPlay:true, delayTime:1000 , autoPage:true ,interTime:3000});
        //首页买家说法向上滚动
        jQuery(".picMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:25,trigger:"click"});
        //首页精彩活动向上滚动
        jQuery(".txtScroll-top").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,scroll:5,vis:12});

    }catch (e){

    }



	/* 轮播下面广告位效果 */
	$(".moudle_01 a").hover(function(){
		$(this).stop().animate({width:"502px"},300);
		$(this).siblings().stop().animate({width:"230px"},300)
	},function(){
	//	$(".moudle_01 a").css("width","300px");
		$(".moudle_01 a").stop().animate({width:"300px"},500);
	})

	//首页中部限时秒杀移动到层
	$(".center1_left_ul li").mouseover(function(){
		$(this).addClass("hover").siblings().removeClass("hover");
	})



	//新品首秀移动效果
	$(".center_animate li").mouseover(function(){
		$(this).siblings().stop().animate({opacity:"0.5"},200);
	}).mouseout(function(){
		$(".center_animate li").stop().animate({opacity:"1"},200);
	})

	//首页商品分类下侧分类淡出效果
	var clear;
	$(".all_shop_type li").mouseover(function(){
		$(this).children(".shop_type_list").fadeIn(300);
	})
	$(".all_shop_type").mouseleave(function(){
		clear=setTimeout(function(){
			$(".shop_type_list").fadeOut(300);
			$(".all_shop_type li").removeClass("hover");
		},300)
	});
	$(".all_shop_type li").mouseover(function(){
		$(this).addClass("hover").siblings().removeClass("hover");
	})

	$("#shop_type_list").mouseover(function(){
		clearTimeout(clear);
	})

	$("#shop_type_list").mouseleave(function(){
		$("#shop_type_list").fadeOut(300);	
	})


    /*
     * 品牌推荐部分效果
     */
	var oul=document.getElementById('pin_ul');
    var oDiv=document.getElementById('pin_msg');
    var clear=null;
    var iW=328;
    var iH=298;
    var aLi=[];
    if(oul){
        aLi=oul.getElementsByTagName('li');
    }
    for(var i=0;i<aLi.length;i++) {
		aLi[i].index=i;
		aLi[i].onmouseover=function(){
			for(var i=0;i<aLi.length;i++){
				aLi[i].className='';
			}
			aLi[this.index].className='hover';
			var brand_figure = this.childNodes[0].rel;
			$("#pin_msg").find("a").attr("href","");
			$("#pin_msg").find("img").attr("src","");
			$("#brand_title").html("蓝海商城");
			if(brand_figure.length>0){
				var brand_figure_pic = "./data/brand_figure/" + brand_figure;
				var href = this.childNodes[0].href;
				var brand_title = this.childNodes[0].title; 
				$("#pin_msg").find("a").attr("href",href);
				$("#pin_msg").find("img").attr("src",brand_figure_pic);
				$("#brand_title").html(brand_title);
				$("#pin_msg").fadeIn(300);
				clearTimeout(clear)
				oDiv.style.left=getLeft(aLi[this.index])-iW+'px'
				oDiv.style.top=gettop(aLi[this.index])/2+'px'
			}else{
				$("#pin_msg").hide();
			}
		}
		aLi[i].onmouseout=function(){
			clear=setTimeout(function(){
				for(var i=0;i<aLi.length;i++){
					aLi[i].className=''
				};	
				$("#pin_msg").fadeOut("slow")
			},500)	
		}
		oDiv.onmouseover=function(){
			clearTimeout(clear)
		}
		oDiv.onmouseout=function(){
			clear=setTimeout(function(){
				$("#pin_msg").fadeOut("slow")
			},500)	
		}
		function getLeft(obj)
		{
			var iLeft=0;
			iLeft=obj.offsetLeft;
			return iLeft
		}
		function gettop(obj)
		{
			var itop=0;
			itop=obj.offsetTop;
			return itop
		}
	}

	//限时抢购js
	setInterval(countdownToEnd,1000);

	//首页点击加入购物车，图片飞入效果
	var oImg;
	$(".add_pay").click(function(){
		if(oImg){
			oImg.remove(); 
		}
		/* $(this).closest('li')从当前层开始查找，$(this).parents('li')从父层开始查找*/
		var shop_box=$(this).parents('li');
		var img=shop_box.find("img");
		var oImg=img.clone();
		var img_position=img.offset();
		var car_position=$(".sidebar_car").offset();
		var car_top=car_position.top+10;
		var car_left=car_position.left+10;
		
		function scroll(ev){
			var ev=ev || event;
        		ev.preventDefault();
		}

		//FF阻止滚动条滚动
		if(document.addEventListener){
        	document.addEventListener('DOMMouseScroll',scroll,false)
        }
		//IE阻止滚动条滚动
     	$("body").attr({"onmousewheel":"return false"});
		
		//创建克隆的img图片
		oImg.addClass("cloneImg").css(img_position).appendTo("body");
		//动画参数
		car_position=$.extend(car_position,{left:car_left,top:car_top,height:5,width:5,opacity:0.5});
		$(oImg).animate(car_position,"slow",function(){
			oImg.remove();
			if(document.addEventListener){
	        	document.removeEventListener('DOMMouseScroll',scroll,false)
	        }
			$("body").attr({"onmousewheel":"return true"});
		})
	})
});

/* 限时秒杀时间js START */
var timeOffsetToServer = 0;
var timeNowFromServer = 0;
//获取当前时间
function now() {
	var nowMil = timeNowFromServer || new Date().getTime();
	nowMil = parseFloat(nowMil) + timeOffsetToServer * 1000;
	return new Date(nowMil);
}
//以下是判断单一商品的各种状态和填充
//判断商品的拍卖状态
// return 1:等待拍卖  2.正在拍卖  3.拍卖结束
function getAuctionStatus(startTime,endTime)
{
	var nowToEnd = endTime - now().getTime();
	if(nowToEnd>0)
	{
		var startToNow = now().getTime() - startTime;
		if(startToNow>0)
		{
			return 2;
		}
		else
		{
			return 1;
		}
	}
	else
	{
		return 3;
	}
}
//计算时间差
function timeBetweenText(fromDate, toDate) {
	var timeOffset = toDate - fromDate;
	var dayOfMil = (24 * 60 * 60 * 1000);
	var hourOfMil = 60 * 60 * 1000;
	var minOfMil = 60 * 1000;
	var hourOffset = timeOffset % dayOfMil;
	var minuteOffset = hourOffset % hourOfMil;
	var seccondOffset = minuteOffset % minOfMil;
	
	var hours = rightZeroStr(Math.floor(timeOffset / hourOfMil));
	var minutes = rightZeroStr(Math.floor(minuteOffset / minOfMil));
	var secconds = rightZeroStr(Math.floor(seccondOffset / 1000));
	
	var text = "";
	if (hours > 0) {
		text = "<span class='ftx-04'>"+hours+"时"+minutes +"分"+secconds + "秒</span>";
		return text;
	} else if (minutes > 0) {
		text = "<span class='ftx-04'>"+minutes+"分"+secconds+"秒</span>";
		return text;
	} else if (secconds > 0) {
		text = "<span class='ftx-04'>"+secconds+"秒</span>";
		return text;
	} else {
		text = "<span class='ftx-04'>0秒</span>";
		return text;
	}
	return text;
}
//倒计时函数
function countdownToEnd()
{
	var hotDeals = $('.center1_left_ul p.time input[id^=resultDeals]');

    for(var i=0;i<hotDeals.length;i++)
	{
		var startTime = $(hotDeals[i]).attr("id").split("|")[2];
		var endTime = $(hotDeals[i]).attr("id").split("|")[3];
		var auctionStatus = getAuctionStatus(startTime,endTime);
		var id = $(hotDeals[i]).attr("id").split("|")[4];
		var type = $(hotDeals[i]).attr("id").split("|")[5];
		if(auctionStatus=='1')
		{
			var info = "<span class='font14'>等待:</span>"+timeBetweenText(now().getTime(),startTime);
			var idInfo = "#"+type+"List"+id;
			$(idInfo).html(info);
		}
		if(auctionStatus=="2")
		{
			var info = "<span class='font14'>剩余:</span>"+timeBetweenText(now().getTime(),endTime);
			var idInfo = "#"+type+"List"+id;
			$(idInfo).html(info);
		}
		if(auctionStatus=="3")
		{
			var idInfo = "#"+type+"List"+id;
			$(idInfo).html("<span class='font14'>活动已结束</span>");
		}
	}
}
function rightZeroStr(v) {
	if (v < 10) {
		return "0" + v;
	}
	return v + "";
}
/* 限时秒杀时间js END */