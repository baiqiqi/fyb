$(document).ready(function(){
 qih();
 $(".giftclick").click(function(){
    if($(".giftclick").hasClass("on")){
  	  $(this).removeClass("on");
  }else{
  	$(this).addClass("on");
     } 
   qislide();
 }) 

})

function qih(){
  if($(".giftclick").hasClass("on")){
  	$(".gift_goods").show();
  }else{
  	$(".gift_goods").hide();
  }

}
function qislide(){
  if($(".giftclick").hasClass("on")){
  	$(".gift_goods").stop(false,true).slideDown();
  }else{
  	$(".gift_goods").stop(false,true).slideUp();
  }

}


	   
	   
