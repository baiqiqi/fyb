define('usercenter_lxl_amd/prod_comment',['jquery'],function($){var exports={};var comment_v2={autoPlus:function(){var levelAll=$("#levelAll").val();$(".score_all").find("li").each(function(i,n){var li_em=$(n).find(".num_per em");var level_someone=$(n).find(".level_someone").val();var li_length=parseInt((level_someone/levelAll)*100);li_em.animate({"width":li_length},800);});},filter:function(){var prod_classify=$(".prod_classify");prod_classify.find("li").click(function(){if($(this).hasClass("no_comment_wp")){return false;}
if($(this).hasClass("current")){$(this).removeClass("current")}else{$(this).siblings().removeClass("current").end().addClass("current");}});var prod_classify=$(".fliter_comment");prod_classify.find("li").not(".filter_by_pic").click(function(){if($(this).find("span").hasClass("current")){return false;}
$(this).siblings().find("span").removeClass("current").end().end().find("span").addClass("current");});},addLoading:function(){if($("#commentLoading").length>0){return false;}
var p_str="<center id='commentLoading' style='height:48px;line-height:48px;'><img src='http://img1.tuniucdn.com/img/20140325/common/loading-48x48---1.gif' /></center>";var fliter_comment=$(".fliter_comment");fliter_comment.after(p_str);},removeLoading:function(){if($("#commentLoading").length>0){var commentLoading=$("#commentLoading");commentLoading.remove();}},hrefRePos:function(){try{$("body,html").animate({"scrollTop":$("#dpjl").offset().top},300);}catch(e){var dpjl=$("#dpjl").offset().top;var rwebkit=/(webkit)[ \/]([\w.]+)/;var agent=navigator.userAgent;if(rwebkit.test(agent)){$("body").animate({"scrollTop":dpjl},300);}else{$("html").animate({"scrollTop":dpjl},300);}}}};var init=function(){init=function(){};comment_v2.autoPlus();comment_v2.filter();};exports.init=init;exports.comment_v2=comment_v2;return exports;});;define('usercenter_lxl_amd/slidy_v2',['jquery'],function($){var exports={};var us_temp=0;var us_temp_length=0;function sp_slidy(){var pic_lists=$(".pic_lists");pic_lists.each(function(i,n){var slider=$(n).find("ul");var slider_child_l=slider.find("li").length;var slider_width=slider.find("li").width()+6;var slider_height=slider.find("li").height()+10;var sp_prev=$(n).find(".sp_prev").length>0?$(n).find(".sp_prev"):"";var sp_next=$(n).find(".sp_next").length>0?$(n).find(".sp_next"):"";slider.width(slider_child_l*slider_width);var slider_count=0;if(slider_child_l<=8){sp_prev.hide();sp_next.hide();}
sp_prev.click(function(){if(slider_count<=0){return false;}
slider_count--;slider.animate({left:'+='+slider_width+'px'},'slow');slider_pic(sp_prev,sp_next,slider_count,slider_child_l);});sp_next.click(function(){if(slider_child_l<8||slider_count>=slider_child_l-8){return false;}
slider_count++;slider.animate({left:'-='+slider_width+'px'},'slow');slider_pic(sp_prev,sp_next,slider_count,slider_child_l);});slider.find("li a").click(function(){var _this=$(this).attr("href");var _this_img_data=$(this).parent().attr("titledata")?$(this).parent().attr("titledata"):"";var _this_date=$(this).parent().parent().attr("timedata")?$(this).parent().parent().attr("timedata"):"";us_temp=$(this).parent().index();us_temp_length=$(this).parent().parent().find("li").length;setNum(us_temp+1,us_temp_length);popShow();getListImg(slider,$(n),_this,_this_img_data,_this_date);return false;});});}
function getPicTitle(s){return s.attr("data");}
function pop_slidy(s){var pic_lists=s;pic_lists.each(function(i,n){var slider=$(n).find("ul");var slider_child_l=slider.find("li").length;var slider_width=slider.find("li").width()+15;var slider_height=slider.find("li").height()+10;var pop_prev=$(n).find(".pop_prev").length>0?$(n).find(".pop_prev"):"";var pop_next=$(n).find(".pop_next").length>0?$(n).find(".pop_next"):"";slider.height(slider_child_l*slider_height);var slider_count=0;if(slider_child_l<6){pop_prev.hide();pop_next.hide();}
else{pop_prev.show();pop_next.show();}
pop_prev.click(function(){if(slider_count<=0){return false;}
slider_count--;slider.animate({top:'+='+slider_height+'px'},'slow');pop_slider_pic(pop_prev,pop_next,slider_count,slider_child_l);});pop_next.click(function(){if(slider_child_l<5||slider_count>=slider_child_l-5){return false;}
slider_count++;slider.animate({top:'-='+slider_height+'px'},'slow');pop_slider_pic(pop_prev,pop_next,slider_count,slider_child_l);});slider.find("li a").click(function(){var _this=$(this).attr("href");var _this_img_data=$(this).parent().attr("titledata")?$(this).parent().attr("titledata"):"";var _this_date=$(this).parent().parent().attr("timedata")?$(this).parent().parent().attr("timedata"):"";var s_num=$(this).parent().index();us_temp=$(this).parent().index();us_temp_length=$(this).parent().parent().find("li").length;setNum(us_temp+1,us_temp_length);showBigImg($(this));popSlidyList(_this_img_data,_this_date);return false;});});}
function slider_pic(s,t,k,j){if(k>=j-8){t.css({cursor:"auto"});t.addClass("sp_grey");}
else if(k>0&&k<=j-8){s.css({cursor:"pointer"});s.removeClass("sp_grey");t.css({cursor:"pointer"});t.removeClass("sp_grey");}
else if(k<=0){s.css({cursor:"auto"});s.addClass("sp_grey");}}
function pop_slider_pic(s,t,k,j){if(k>=j-5){t.css({cursor:"auto"});t.addClass("pop_grey");}
else if(k>0&&k<=j-5){s.css({cursor:"pointer"});s.removeClass("pop_grey");t.css({cursor:"pointer"});t.removeClass("pop_grey");}
else if(k<=0){s.css({cursor:"auto"});s.addClass("pop_grey");}}
function popShow(){var divMask=$(".divMask");var pop_slidy=$(".pop_slidy");divMask.removeClass("hide");pop_slidy.removeClass("hide");var pop_close=$(".pop_slidy .pop_close");pop_close.click(function(){divMask.addClass("hide");pop_slidy.addClass("hide");});}
function getListImg(s,t,img,i_t,i_date){var cmain_cont=t.prevAll(".clists_main_cont");var comment_cont=cmain_cont.find(".comment_detail").html();var comment_star=cmain_cont.find(".clists_stars").html();var comment_title=cmain_cont.attr("data").substr(0,35)+"...";var pop_slidy_list=$(".pop_slidy .pop_lists");var pop_slidy_a=$(".pop_slidy .pop_prod_lists a");var pop_slidy_img=$(".pop_slidy .pop_prod_lists img");var pop_slidy_bigimg=$(".pop_slidy .pop_left img");var pop_word=$(".pop_slidy .pop_word");var pop_star=$(".pop_slidy .clists_stars");var pop_tt=$(".pop_slidy .ps_tt label");var pop_pic_title=$(".pop_slidy .pop_left_span .bar_left");var pop_pic_date=$(".pop_slidy .pop_left_span .bar_right_time");pop_slidy_list.html(s.html());pop_word.html(comment_cont);pop_star.html(comment_star);pop_tt.html(comment_title);if(i_t.length>0){pop_pic_title.html(i_t);}
if(i_date.length>0){pop_pic_date.html(i_date);}
pop_slidy_bigimg.attr("src",img)
$(".pop_slidy .pop_prev").unbind("click");$(".pop_slidy .pop_next").unbind("click");$(".pop_slidy ul").find("li a").unbind("click");pop_slidy_list.find("li").removeClass("cur").eq(us_temp).addClass("cur");pop_slidy($(".pop_img .pop_right"));slideDown(pop_slidy_list,us_temp);}
function popSlidyList(i_t,i_date){var pop_pic_title=$(".pop_slidy .pop_left_span .bar_left");var pop_pic_date=$(".pop_slidy .pop_left_span .bar_right_time");if(i_t.length>0){pop_pic_title.html(i_t);}
if(i_date.length>0){pop_pic_date.html(i_date);}
return false;}
function showBigImg(s){if(s.parents(".pop_lists").length<=0){return false;}
var s_parent=s.parent();var s_parent_index=s_parent.index();var s_parent_length=s_parent.siblings().length+1;var pop_slidy_img=$(".pop_slidy .pop_left").find("img");if(s.attr("href").length>0){pop_slidy_img.attr("src",s.attr("href"));}
setNum(s_parent_index+1,s_parent_length);s_parent.siblings().removeClass("cur");s_parent.addClass("cur");}
function setNum(s,l){var setNum=$("#setNum");setNum.html("(<span>"+s+"</span>/"+l+")")}
function slideDown(s,n){if(n>4){s.animate({"top":-(n-4)*60});}else{s.animate({"top":0});}}
function getClickNum(){}
function isIE6(){if($.browser.msie&&$.browser.version==6){return true;}else{return false;}}
function resetPosition(){var pop_slidy=$(".pop_slidy");var pop_slidy_h=pop_slidy.height();var w_height=$(window).height();offset_top=(w_height-pop_slidy_h)/2;pop_slidy.css("top",offset_top);if(isIE6()){var pop_scroll=$(document).scrollTop();pop_slidy.css("top",offset_top+pop_scroll);}}
var init=function(){init=function(){};sp_slidy();resetPosition();};exports.init=init;exports.sp_slidy=sp_slidy;return exports;});