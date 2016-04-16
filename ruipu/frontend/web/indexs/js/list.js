$(function(){	$(".classifys li").click(function(){		$(this).addClass("checked").siblings().removeClass("checked");		var val=$(this).children("a").text();		$(this).parent().prev().children("span").text(val);	})	$(".shop_img_list img").mouseover(function(){		var src=$(this).attr("rel");		$(this).parents(".shop_img_list").prev().find("img").attr("src",src);	})
	//点击切换列表
	classify(".classify>a","classify_hover");
})