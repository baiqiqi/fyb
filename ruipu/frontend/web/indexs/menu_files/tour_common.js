define("tour_amd/tour_common",["jquery"],function($){var QrcodeOrder=function(cfg){this.cfg=cfg;this.init();this.bindEvents();};QrcodeOrder.prototype={init:function(){$.extend(this,this.cfg);this.orderInfo1=this.elt.find(".J_info_1");this.orderInfo2=this.elt.find(".J_info_2");this.qrcodeImg=this.elt.find(".J_qrcode_image");},bindEvents:function(){this.elt.on("mouseover",$.proxy(this.onMouseOver,this));},onMouseOver:function(){var self=this,orderInfo=this.collectOrderInfo();this.updateOrderInfo(orderInfo);var imgUrl;if(orderInfo.departure_date){imgUrl="/yii.php?r=detail/tourAjax/generateQxCode&departure_date="
+orderInfo.departure_date+"&adult_count="+orderInfo.adult_count+"&child_count="+orderInfo.child_count+"&id="+orderInfo.id;}else{imgUrl="/yii.php?r=detail/tourAjax/generateQxCode&id="+orderInfo.id;}
self.qrcodeImg.attr("src",imgUrl);},updateOrderInfo:function(orderInfo){var Week=["周日","周一","周二","周三","周四","周五","周六"];var date;if(orderInfo.departure_date){date=this.parseISO8601(orderInfo.departure_date);var month=date.getMonth()+1,day=date.getDate(),week=Week[date.getDay()];var info1=month+"-"+day+"("+week+") "+"从"　+orderInfo.departure_city+"出发",info2=orderInfo.adult_count+"成人　"　+orderInfo.child_count+"儿童";this.orderInfo1.html(info1);this.orderInfo2.html(info2);}else{date=null;this.orderInfo1.html("");this.orderInfo2.html("");}},collectOrderInfo:function(){var child_count=$("#childN").val(),adult_count=$("#adultN").val(),departure_date=$("#selectDepartDate .select_result").attr("date"),departure_city=$("#order_mess .select_city .select_result").text(),id=$("#route_id").val();departure_city=$.trim(departure_city);return{departure_date:departure_date,departure_city:departure_city,adult_count:adult_count,child_count:child_count,id:id};},parseISO8601:function(dateStringInRange){var isoExp=/^\s*(\d{4})-(\d\d)-(\d\d)\s*$/,date=new Date(NaN),month,parts=isoExp.exec(dateStringInRange);if(parts){month=+parts[2];date.setFullYear(parts[1],month-1,parts[3]);if(month!=date.getMonth()+1){date.setTime(NaN);}}
return date;}};var TeamTour=function(){this.init();this.bindEvents();}
TeamTour.prototype={init:function(){this.elt1=$(".J_team_tour_1");this.elt2=$(".J_team_tour_2");},bindEvents:function(){$(window).on("orderinfochange",$.proxy(this.onOrderInfoChange,this));$("#adultN").blur(function(){$(window).trigger("orderinfochange");});$("#childN").blur(function(){$(window).trigger("orderinfochange");});},onOrderInfoChange:function(e){var orderInfo=this.collectOrderInfo();var adultCount1=parseInt(orderInfo.adultCount1);if(adultCount1>=10){this.elt1.show();this.elt1.find("a").attr("href",this.buildUrl({departDate:orderInfo.departDate1,departCityName:orderInfo.departCityName,departCityCode:orderInfo.departCityCode,destCityName:orderInfo.destCityName,destCityCode:orderInfo.destCityCode,tourDay:orderInfo.tourDay,adultCount:orderInfo.adultCount1,childCount:orderInfo.childCount1}));}else{this.elt1.hide();}
var adultCount2=parseInt(orderInfo.adultCount2);if(adultCount2>=10){this.elt2.show();this.elt2.find("a").attr("href",this.buildUrl({departDate:orderInfo.departDate2,departCityName:orderInfo.departCityName,departCityCode:orderInfo.departCityCode,destCityName:orderInfo.destCityName,destCityCode:orderInfo.destCityCode,tourDay:orderInfo.tourDay,adultCount:orderInfo.adultCount2,childCount:orderInfo.childCount2}));}else{this.elt2.hide();}},collectOrderInfo:function(){var departDate1=$("#selectDepartDate .select_result").attr("date"),departDate2=$(".order_wrap .select_date .s_con").text(),departCityName=this.elt1.attr('data-departCityName'),departCityCode=this.elt1.attr("data-departCityCode"),destCityName=this.elt1.attr("data-destCityName"),destCityCode=this.elt1.attr("data-destCityCode"),tourDay=this.elt1.attr("data-tourDay");var adultCount1=$("#adultN").val(),childCount1=$("#childN").val(),adultCount2=$("#select_adult_num .s_acon").text(),childCount2=$("#select_child_num .s_ccon").text();return{departDate1:departDate1,departDate2:departDate2,departCityName:departCityName,departCityCode:departCityCode,destCityName:destCityName,destCityCode:destCityCode,tourDay:tourDay,adultCount1:adultCount1,childCount1:childCount1,adultCount2:adultCount2,childCount2:childCount2}},buildUrl:function(info){return'http://www.tuniu.com/bang/post?oneType=3&'+$.param($.extend(true,{},info));}}
$(function(){if(($(".J_team_tour_1").length>0)&&($(".J_team_tour_2").length>0)){new TeamTour();}});});