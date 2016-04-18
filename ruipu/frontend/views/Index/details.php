<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
<title>商品详情</title>
<link rel="stylesheet" type="text/css" href="indexs/css/base.css"/>
<link rel="stylesheet" type="text/css" href="indexs/css/shopDetails.css"/>
<link rel="stylesheet" href="indexs/css/jquery-zoom.css" />
<script type="text/javascript" src="indexs/js/jquery.min.js"></script>
<script type="text/javascript" src="indexs/js/common.js"></script>
<script type="text/javascript" src="indexs/js/shopDetails.js" ></script>
<link rel="stylesheet" type="text/css" href="indexs/css/gift_view.css">
<script type="text/javascript" src="indexs/js/gift_pc.js"></script>
<script src="indexs/js/jquery.alerts.js" type="text/javascript"></script>
<style>
    .wy{
        font-family: 微软雅黑 Bold, 微软雅黑;
    }
    .font12{
        font-size:12px;
    }
    .font13{
        font-size:13px;
    }
    .font16{
        font-size:16px;
    }
</style>
</head>
<body>
<div>
        <div id="bigView" style="display:none;"><img width="800" height="800" alt="" src="" /></div>
        
        <!-- <link rel="stylesheet" href="indexs/css/base.css" /> -->
<link rel="stylesheet" href="indexs/css/mystyle.css"/><link href="indexs/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="indexs/js/jquery.1.11.3.js"></script>
<script type="text/javascript" src="indexs/js/jquery.SuperSlide.2.1.1.js"></script>
<!-- <script type="text/javascript" src="indexs/js/jquery.min.js" ></script> -->
<script type="text/javascript" src="indexs/js/myscript.js"></script>
<script type="text/javascript" src="indexs/js/common.js" ></script>
<!--[if IE]>
        <script src="indexs/js/html5shiv.min.js"></script>
    <![endif]-->
<script type="text/javascript">
         window.onbeforeunload=function (){
              $.ajax({
              url:"stat.php",
              type: "POST",
              data:"access_url=",
              async:true
              });
         }
        $(document).ready(function(){
            $("#AddFavorite").click(function(){
                jAlert('请使用浏览器快捷键Ctrl+D来完成收藏','温馨提示', function(r){obj.focus()});
            });
        });
         </script>
<style>
    .max {
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0,0,0,0.6);
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        text-align: center;
        display: none;
    }
    .max .ss {
        width: 100%;
        height: 300px;
        position: absolute;
        z-index: 11111;
        top: 50%;
        margin-top: -180px;
    }
    .max .ss>div{
        width: 300px;
        height: 300px;
        display: inline-block;
        margin-right: 30px;
        font-size: 20px;
        background: #fff;
        color: #fff;
    }
    .max .ss>div p{
        line-height: 32px
    }
    .max .ss img {
        width: 280px;
        padding: 10px;
    }
    .gw ,.gr{
    width: 100px;
    height: 35px;
    float: right;
    background-color: #f9f9f9;
    cursor: pointer;
    margin-top: 45px;
    line-height: 35px;
    text-align: center;
    margin-left: 15px;
    border: 1px solid #efeded;
}
.zxrx{
    position: absolute;
    top: 10px;
    font-size: 20px;
    left: 600px;
    vertical-align: top;
    color: #0e913a;
}
.zxrx img{
    height: 20px;
    vertical-align: -3px;
    background-color: #0e913a;
}
.zxrx2{
        position: absolute;
    right: 50%;
    width: 250px;
    padding: 8px;
    top: 300px;
    background-color: rgba(15, 148, 59, 0.71);
    color: #fff;
    line-height: 25px;
    font-size: 25px;
    z-index: 99;
    border-radius: 15px;
    box-shadow: 1px 2px #183314;
}
</style>
        <div class="main">
            <div class="fontb" id="ur_here">
                <div class="microsoft_yahei font14 fontb">
 <style>
   #ur_here a,#ur_here code{
      font-family: '微软雅黑','宋体';
      font-size: 14px;
      font-weight: bold;
   }
 </style>
</div>
<div class="blank5"></div>
            </div>
            <div class="shop_details">
                <div class="fl shop_left">
                    
                    <div class="shop_see" id='history_div'>
    <p class="fontb see_titer">看了又看</p>
    <div class="history_list_left clearfix" id='history_list_left'>
            </div>
</div>
<div class="blank5"></div>
<script type="text/javascript">
if (document.getElementById('history_list_left').innerHTML.replace(/\s/g,'').length<1){
    document.getElementById('history_div').style.display='none';
}else{
    document.getElementById('history_div').style.display='block';
}
function clear_history(){
    Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res){
    if(document.getElementById("history_list_left")){
        document.getElementById('history_list_left').innerHTML = '<ul id="clear_history"><a onclick="clear_history()">您已清空最近浏览过的商品</a></ul>';
    }
    if(document.getElementById("history_list")){
        document.getElementById('history_list').innerHTML = '';
    }
    if(document.getElementById("history_count")){
        document.getElementById('history_count').innerHTML = '0';
    }
}
</script>
                </div>
                    
                <div class="fl shop_msg">
                    <div class="detail_top">
                        <div class="goods_detail_left " style="margin-right:0px;">
                            <div class="preview">
                                <div id="vertical" class="bigImg">
                                    <img src="<?php echo $arr['pro_img']?>" alt="" id="midimg" />
                                    <div style="display:none;" id="winSelector"></div>
                                </div>
                                <div class="smallImg">
                                    <div class="scrollbutton smallImgUp disabled"></div>
                                    <div id="imageMenu">
                                        <ul>
                                                    <li id="onlickImg"><img src="<?php echo $arr['pro_img']?>" bigsrc="<?php echo $arr['pro_img']?>" width="66" height="68" alt=""/></li>
                                                    <li><img src="<?php echo $arr['pro_img']?>" bigsrc="<?php echo $arr['pro_img']?>" width="66" height="68" alt=""/></li>
                                                    <li><img src="<?php echo $arr['pro_img']?>" bigsrc="<?php echo $arr['pro_img']?>" width="66" height="68" alt=""/></li>
                                                    <li><img src="<?php echo $arr['pro_img']?>" bigsrc="<?php echo $arr['pro_img']?>" width="66" height="68" alt=""/></li>
                                                    <li><img src="<?php echo $arr['pro_img']?>" bigsrc="<?php echo $arr['pro_img']?>" width="66" height="68" alt=""/></li>
                                                    <li><img src="<?php echo $arr['pro_img']?>" bigsrc="{{$v->s_name}}" width="66" height="68" alt=""/></li>
                                        </ul>
                                    </div>
                                    <div class="scrollbutton smallImgDown"></div>
                                </div>
                            </div>
                            
                            <div class="dashed"></div>
                            <p><a style="height:30px" href="javascript:myAddFav('371');" class="like fl  wy font12">收藏（<font id="collect_count">0</font>）</a></p>
                            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" data="{'url':'http://www.scstnysc.com/goods.php?id=371'}">
                                <span class="bds_more wy font12">分享到：</span>
                                <a class="bds_qzone" title="分享到QQ空间" href="#"></a>
                                <a class="bds_tsina" title="分享到新浪微博" href="#"></a>
                                <a class="bds_tqq" title="分享到腾讯微博" href="#"></a>
                                <a class="bds_renren" title="分享到人人网" href="#"></a>
                                <a class="bds_t163" title="分享到网易微博" href="#"></a>
                                <a class="shareCount" href="#" title="累计分享0次">0</a>
                            </div>
                            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" src="indexs/js/bds_s_v2.js?cdnversion=391587"></script>
                
                            <script type="text/javascript">
                            //document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/indexs/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                            </script>
                
                            <p></p>
                        </div>
                        
                        <form action="javascript:addToCart(371)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
                        <div class="goods_detail_right" style="margin-left:28px;_margin-left:18px;">
                            
                            <input type="hidden" id="goods_id" value="371" />
                            <p class="wy font18" style="font-weight: 700;font-style: normal;"><strong><?php echo $arr['pro_name']?></strong></p><br>
                            <span class="clo9 wy font12">详情</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="wy font13" ><?php echo $arr['pro_content']?></span>
                            <p class="clo9 shop_txt wy font13" style="font-family: 'font-style: normal;color: #797979;">
                                
                            </p>
                            <p class="clo9 shop_txt wy font12" style="display:none;">商品货号：&nbsp;&nbsp;<span class='code'>ECS0001</span></p>
                            <p class="wy font13">
                            <span class="clo9 wy font12">促销价</span>
                            <span id="ECS_SHOPPRICE" class="a_b1 font20 new_parce ecymar" style="font-size:30px">￥<?php echo $arr['pro_price']?></span>
            <script language="javascript">
                $(function(){
                    var num = $(".ppyt ul li").length;
                    var divheight=num*28+"px";
                    $("#openmore").click(function(){
                        $(".ppyt").show();
                        //$(".ppyt").animate({height:divheight},500);
                    });
                    $("#closemore").click(function(){
                        $(".ppyt").hide();
                        //$(".ppyt").animate({height:"0px"},500);
                    });
                });
            </script>
                            <P style="display:none;">销　　量：&nbsp;&nbsp;<span class='sale_count'>0件</span></P>
                        
                            <p class="font14">
                                    <span class="clo9 wy font12">运&nbsp;&nbsp;&nbsp;费</span>
                                    <span class="yun_parce wy font12">免运费</span>
                            </p>
                        
                        
                            <ul id="shop_msg_ul" style="height:78px;margin-top:20px">
                                <li>
                                    <a class="nou" href="javascript:;">
                                        <p class="wy font12" style="color:#A2754D;font-weight:bold"><?php echo $arr['pro_sales']?></p>
                                        <span class="clo9 wy font12">月销量</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nou" href="javascript:;">
                                        <p class="wy font12" style="color:#3486C5;font-weight:bold">2689</p>
                                        <span class="clo9 wy font12">累计评价</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a class="nou" href="javascript:;">
                                        <p id="points" class="wy font12 " style="color:#2C822E;font-weight:bold">+1</p>
                                        <span class="clo9 wy font12">送285U商城积分</span>
                                    </a>
                                </li>
                                
                            </ul>
<strong class="wy font12" style="display:none;">购买此商品可使用：</strong><font style="display:none" class="f4 wy font12">70 积分</font>
      
      
        
            <p class="shop_number_msg clearfix">
              <span class="fl clo9 wy font12" style="width:70px;text-align:left;_margin-top:10px;">数量</span>
              <span class="fl shop_number">
                  <input class="shop_sum wy font12" onblur="changePrice();" name="number" id="number" class="text" value="1" title="请输入购买量" type="text">
                  <span class="number_add" style="clear:both">
                    <span class="pointer add" class="increase" onclick="goods_add();/*changePrice()*/"></span>
                    <span class="pointer minus" class="decrease" onclick="goods_cut();/*changePrice()*/"></span>
                  </span>
              </span>
              <span class="wy font12" style="margin: 0 10px 0 35px;">件</span>
              <font id="ECS_GOODS_AMOUNT" class="shop" style="display: none;"></font>&nbsp;&nbsp;
              <span class="clo9 wy font12" id="max_num">库存 <?php echo $arr['pro_count']?>&nbsp;&nbsp; </span>
              
                <span class="wx01" style="position: absolute; display: none; z-index: 9990; border: 1px solid #ccc; padding:2px; width: 124px; height: 160px; left: 0px; top: -180px; background: #fff;">
                <span style="overflow: hidden; text-overflow:ellipsis;white-space:nowrap; width: 124px; word-wrap:normal;display:block; height: 30px; color: #333;">{{$v->s_name}}</span>
                <img src="indexs/images/qr.jpg" width="124px" height="130px"/>  
                </span>
                <i class="wx02" style="position: absolute;  display:none;height: 20px; width: 120px; left: 10px; top: -16px; z-index: 9999; background: url(indexs/images/qr.jpg) no-repeat;"></i>
              </a>
        <script language="javascript" type="text/javascript">
            function goods_cut(){
                var num_val=document.getElementById('number');
                var new_num=num_val.value;
                 if(isNaN(new_num)){jAlert('请输入数字');return false}
                var Num = parseInt(new_num);
                if(Num>1)Num=Num-1;
                num_val.value=Num;
            }
            function goods_add(){
                var num_val=document.getElementById('number');
                var new_num=num_val.value;
                 if(isNaN(new_num)){jAlert('请输入数字');return false}
                var Num = parseInt(new_num);
                Num=Num+1;
                num_val.value=Num;
            }
        </script>
            </p>                            
                            <p>
                                <a href="./index.php?r=check/check"><input class="pointer add_pay" type="button" name="now_buy" id="now_buy" value="立即购买" onclick="addToCart(371,0,1)" style="background-color: rgb(255, 237, 237); color: rgb(196, 0, 0); border: 1px solid rgb(196, 0, 0); width: 170px; font-family: microsoft yahei; font-size: 16px;"/></a>
                                <input class="pointer paying" type="button" name="add_to_cart" id="add_to_cart" value="加入购物车" onclick="javascript:addToCart_choose(371)" style="background-color:#c40000;width: 170px; font-family: microsoft yahei; font-size: 16px;" />
                            </p>
                        </div>
                        </form>
                    </div>
                    <style type="text/css">
                       td{
                        width: 300px;
                       }
                    </style>
                    
                    <div style="clear: both;"></div>
                    <div class="shop_content">
                        <p class="shop_btn">
                            <a href="javascript:;" class="nou selected font14">商品介绍</a>
                            <a name="comment" id="comment" href="javascript:;" class="nou font14">商品评价</a>
                        </p>
                        <div class="shop_one">
                            <blockquote>
                              <table class="shop_tab" border="0" cellspacing="0" cellpadding="0s">
                                
                              </table>
                             </blockquote>
                             
                             <table>
                                <tr>
                                    <td><img src="<?php echo $arr['pro_img']?>" width="290px;" height="290px;" /></td>
                                    <td><img src="<?php echo $arr['pro_img']?>"  width="390px;" height="390px;" /></td>
                                    <td><img src="<?php echo $arr['pro_img']?>"  width="490px;" height="490px;" /></td>
                                </tr>
                             </table>
                        </div>
                        <div class="shop_two hide">
                        <br>
                            <script type="text/javascript" src="indexs/js/utils.js"></script><div id="ECS_COMMENT" style="shop_two hide">   <p class="clo9 wy font12"><?php echo $arr['pro_name']?></p>
</div>
                        </div>
                    </div>
   <div class="morehd">
      <a href="javascript:void();" class="onclickmore">
      查看更多活动&nbsp;<img src="indexs/images/down.png"></a>
    </div>
  <script type="text/javascript">
    $(function(){
      var menber = $(".activity_list dl").length;
      var vheight = menber*198+"px";
       if(menber > 1){
        $(".morehd").show();
       }else{
        $(".morehd").hide();
       }
       $(".onclickmore").toggle(function(){
          $(".activity_list").height(vheight)
          $(this).html('收起活动列表&nbsp;<img src="indexs/images/up.png">')
       },function(){
          $(".activity_list").height("198px");
          $(this).html('查看更多活动&nbsp;<img src="indexs/images/down.png">')
       });
      //alert(menber);
    })
</script>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        function $id(element) {
            return document.getElementById(element);
        }
        //切屏--是按钮，_v是内容平台，_h是内容库
        function reg(str){
            var bt=$id(str+"_b").getElementsByTagName("h2");
                for(var i=0;i<bt.length;i++){
                bt[i].subj=str;
                bt[i].pai=i;
                bt[i].style.cursor="pointer";
                bt[i].onclick=function(){
                    $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
                    for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
                        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
                        var ison=j==this.pai;
                        _bt.className=(ison?"":"h2bg");
                    }
                }
            }
            $id(str+"_h").className="none";
            $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
        }
        </script>
        <script type="text/javascript">
        function changeAtt(t,a,goods_id) {
            t.lastChild.checked='checked';
            for (var i = 0; i<t.parentNode.childNodes.length;i++) {
                if (t.parentNode.childNodes[i].className == 'selected') {
                    t.parentNode.childNodes[i].className = '';
                }
            }
            t.className = "selected";
            changePrice();
        }
        </script>
        <script type="text/javascript">
        function changeGoodsAttr(show_error,which){
            if(typeof(show_error)=='undefined'){
                show_error=true;
            }
        }
        </script>
        <script type="text/javascript">
        var goods_id = 371;
        var goodsattr_style = 1;
        
        var day = "天";
        
        var hour = "小时";
        
        var minute = "分钟";
        
        var second = "秒";
        
        var end = "结束";
        
        var goodsId = 371;
        var now_time = 1458303706;
        
        onload = function(){
            changePrice();
        }
        /**
        * 点选可选属性或改变数量时修改商品价格的函数
        */
        function changePrice()
        {
            var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
            var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
            Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
        }
        /**
        * 接收返回的信息
        */
        function changePriceResponse(res){
            if (res.err_msg.length > 0){
                jAlert(res.err_msg);
            }else{
                document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;
                if (document.getElementById('ECS_GOODS_AMOUNT'))
                document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
                if (document.getElementById('ECS_SHOPPRICE'))
                document.getElementById('ECS_SHOPPRICE').innerHTML = res.result;
                
            
                
                if(res.count>0){
            
                if(!res.product_number>0){
                   res.product_number=0
                 }
                 document.getElementById('max_num').innerHTML ='库存'+res.product_number;
              }
              if(-1=='-1'){
               $('#points').html(parseInt(res.result.replace('￥','')))
              }else{
           
              document.getElementById('points').innerHTML =-1;
              }
              
              
            
             
            
             $('.old_parce').html(res.market_price)
           
         
            }
        }
        
        </script>
    
        <script type="text/javascript">
        $(function(){
            //微信扫描
            $('a.a_wx').mouseover(function(){
                $('.wx01').css({"display":"block"})
                $('.wx02').css({"display":"block"})
            })
            $('a.a_wx').mouseout(function(){
                $('.wx01').css({"display":"none"})
                $('.wx02').css({"display":"none"})
            })
            //配送方式js效果
            $("#chromemenu").mouseover(function(){
                $("#dropmenu1").show();
            })
            $("#dropmenu1").mouseover(function(){
                $("#dropmenu1").show();
            });
            $("#dropmenu1").mouseout(function(){
                $("#dropmenu1").hide();
            });
            $("#dropmenu1 a").click(function(){
                $("#dropmenu1").hide();
            });
            $(".shop_img_list img").mouseover(function(){
                    var src=$(this).attr("rel");
                    $(this).parents(".shop_img_list").prev().find("img").attr("src",src);
            })
            changePrice();
        });
        </script>
        
<script type="text/javascript" src="indexs/js/right_info.js"></script>

<style>

*html{background-image:url(other/.com/about:blank); background-attachment:fixed;}/*防止

模块跳动*/ 

/*右侧栏*/

#right_sidebar{width:40px;height:100%;background:#000;position:fixed;right:0;top:0;_position:absolute;_right:0;

_top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight)); ;z-index:99999999;}



/*快捷按钮*/

.sidebar_top,.sidebar_car,.sidebar_center,.sidebar_bottom{display:inline-block;width:40px;}

.sidebar_top{height:235px; margin-bottom:20px}

.right_top_ul{height:190px;padding-top:45px;position:absolute;top:0;right:0}

.right_top_ul li{display:inline-block;margin-top:8px;_margin-top:8px;position:relative}

.right_top_ul li a{display:block;width:60px;position:relative;z-index:9999}

.right_top_ul li img{margin-right:20px;z-index: 9999}

.right_top_ul li span{display:inline-block;width:40px;height:35px;background:#000;position:absolute;right:0;top:0;z-index:2}

.right_top_ul li div{display:none;width:100px;height:35px;line-height:35px;border-radius:17.5px 0 0 17.5px;background:#cc0000;position: absolute;left:-80px;top:0;z-index:-1}



/*购物车*/

.sidebar_car{overflow:hidden;width:40px;height:140px;border: 1px solid #545454;border-width:1px 0;background:url(indexs/images/right_sidebar_car2.png) no-repeat -7px 13px;position: relative;cursor:pointer}

.shop_numbers{width:20px;height:20px;line-height:20px;border-radius:10px;background:#cc0100;color:#fff;position:absolute;left:9px;bottom:12px}

.sidebar_car:hover .shop_numbers{background-color: #fff;color: #cc0100;}

.open_box{display:none;width:260px;height:100%;background:#404040;box-shadow:-2px -2px 2px #ccc;position:absolute;left:40px;top:0;z-index:10000}

.car_msg_titer{height:30px;line-height:30px}

.close_box{display:inline-block;width:30px;height:30px;margin-left:10px;background:url(indexs/images/car_close.png) no-repeat 6px 6px}

.clof.shop_sum{display:inline;height:20px;line-height:20px;margin:5px 0 0 50px;padding:0 15px;border-radius:10px;background:#545454}

.shop_null{display:block;margin-right:10px}

.car_shop_list{overflow:hidden;width:260px;margin-top:10px}

.car_shop_list li{float:left;display:inline;width:110px;height:160px;margin:10px;position:relative;}

.car_shop_list li .shop_img{display:block;overflow:hidden;width:110px;height:110px;position:relative}

.shop_img img{width:100%;height:100%}

.car_shop_list li b{display:block;width:100%;height:20px;line-height:20px;background:#404040}

.car_shop_list li span{color:#FFF; line-height:20px;}

.function_box{display:block;width:100%;height:30px;background:#333333;opacity:0.6;position:absolute;left:0;bottom:30px}

.shop_del,.shop_addcar,.shop_sees{border:none;width:18px;height: 18px;margin:6px 10px;background: url(indexs/images/car_del.png) no-repeat left top}

.shop_addcar{background: url(indexs/images/add_car.png) no-repeat left top}

.shop_sees{background: url(indexs/images/shop_xing.png) no-repeat left top}

.go_pay{width:100%;height:80px;background:#fff;position:absolute;left:0;bottom:0}

.go_pay p{line-height:1.5em}

.go_pay p span{padding:5px 10px}

.go_pay .pay_btn,.login_btn{border:none;width:240px;height:35px;border-radius:3px;margin:10px;background:#c10100}

.san_ling,.san_ling1,.san_ling2,.san_ling3,.san_ling4{color:#404040;font-size:30px;position:absolute;right:-8px;_right:-8px;top:300px}

.san_ling{top:135px;color:#fff}

.san_ling2{top:440px}

.san_ling3{top:477px}

.san_ling4{right:-9px;top:48px;font-size:30px;color:#fff;}

/*用户*/

.sidebar_center{height:105px}

.right_center_ul{height:105px;width:40px;position:relative}

.right_center_ul li{height:35px; width:40px;cursor:pointer;position: relative;background-color:none!important;}

.right_center_ul li.right_center1{background: url(indexs/images/dl_n.png) no-repeat center center}

.right_center_ul li.right_center2{background: url(indexs/images/shop_n.png) no-repeat center center}

.right_center_ul li.right_center3{background: url(indexs/images/time_n.png) no-repeat center center}

.right_center_ul li:hover{background-color:#cc0100}

.shou_more{width:200px;height:25px;line-height:25px;margin:15px auto;background:#535353}

.user_msg{width:300px;height:175px;padding-top:30px;border-radius:3px;box-shadow:2px 2px 1px #ccc,-2px -2px 1px #ccc;background:#fff;position:absolute;left:-320px;top:270px;opacity:0;z-index:99999;}

/*.login_txt,.password{width:215px;height:33px;line-height:33px;margin:0 25px 10px;padding-left:33px;border:1px solid #C9C9C9;color:#8D8D8D;background:#fff url(indexs/images/input_left2.png) no-repeat 8px top}

.password{background-position:8px -35px}

.login_btn{width:250px;margin:10px 25px}*/

.user_msg .user_img{width:62px;height: 62px;margin:0 auto;border-radius:50%;}

.user_msg p{height:50px;line-height:50px;border-bottom:1px dotted #d5d5d5;}

.my_order,.my_shou{margin:10px auto;margin-left:15px;padding:8px 15px;border:1px solid #E9E9E9;background:#f3f3f3}

.my_order:hover,.my_shou:hover{background:#FCF1F6;border:1px solid #FCCADB;}  

/*用户已经登录*/

.user_logo {margin:0px 30px;}

.user_logo img{width:62px;height: 62px;margin:0 auto;border-radius:50%;float:left}

.user_logo .user_info{width:150px;float:left;height:62px;text-align: left;margin:10px 0px 30px 10px;}

.user_logo .user_info span{display: block;line-height: 25px;}

/*二维码*/

.sidebar_bottom{width:39px;height:160px;border-top:1px solid #545454}

.sidebar_er{display:inline-block;width:40px;height:35px;margin-top:20px;background:#000 url(indexs/images/ewm_n.png) no-repeat center center ;cursor:pointer}

.sidebar_gun{display:inline-block;width:40px;height:35px;margin-top:20px;background:url(indexs/images/top_n.png) no-repeat center center;cursor:pointer}

.open_code{width:200px;height:200px;box-shadow:2px 2px 1px #ccc,-2px -2px 1px #ccc;background:#fff;position:absolute;left:-220px;top:485px;opacity:0;z-index:99999;display:none;}

.code_img{width:120px;height:120px;margin:15px 40px}

.kf_index{display:inline-block;width:40px;height:35px;margin-top:20px;background:#000 url(indexs/images/kf.png) no-repeat center center ;cursor:pointer}

.kf_index_unset{display:inline-block;width:40px;height:35px;margin-top:20px;background:#000 url(indexs/images/kf_unset.png) no-repeat center center ;cursor:pointer}

.span_title{position: absolute; border:1px solid #ccc; border-right:none; left:-85px;top:0px; width:71px; border-radius:3px;  height:33px;line-height:35px;text-align:center; background:#fff; display:none; opacity:0;filter:alpha(opacity=0)}

.right_center_ul li i{background:url(indexs/images/right_n.png) no-repeat; width:4px; height:6px; position:absolute;left:-15px; top:15px; z-index:999; display:none}

</style>


<script type="text/javascript">

window.onload=function(){

    var _src = "http://qr.liantu.com/api.php?&m=0&el=h&text=http://"+window.location.host+"/mobile/";

    var code_img = document.getElementById("code_img");

    code_img.src = _src;

};

function deleteCollectGoods(rec_id)

{

  Ajax.call('delete_cart_goods.php?act=drop_collect', 'id='+rec_id, deleteCollectGoodsResponse, 'POST', 'JSON');

}



/**

 * 接收返回的信息

 */

function deleteCollectGoodsResponse(res)

{

  if (res.error)

  {

    jAlert(res.err_msg);

  }

  else

  {

      if(document.getElementById('ECS_COLLECTINFO2') && res.content2){

        document.getElementById('ECS_COLLECTINFO2').innerHTML = res.content2;

      }

  }

}



function clear_history(){

    Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);

}

function clear_history_Response(res){

    if(document.getElementById("history_list_left")){

        document.getElementById('history_list_left').innerHTML = '<ul id="clear_history"><a onclick="clear_history()">您已清空最近浏览过的商品</a></ul>';

    }

    if(document.getElementById("history_list")){

        document.getElementById('history_list').innerHTML = '';

    }

    if(document.getElementById("history_count")){

        document.getElementById('history_count').innerHTML = '0';

    }

}

</script>
<script type="text/javascript" src="indexs/js/osSlider.min.js" ></script>
<script type="text/javascript">
    window.onload=function(){var slider = new osSlider({ //开始创建效果
        pNode:'.slider', //容器的选择器 必填
        cNode:'.slider-main li', //轮播体的选择器 必填
        speed:2000, //速度 默认3000 可不填写
        autoPlay:true //是否自动播放 默认true 可不填写
    });}
</script>
<script type="text/javascript">
    function check_del(msg,url){
        jConfirm(msg,'温馨提示',function(r){
            if(r){
                window.location.href=url;
            }
        });
    }
/*网站统计*/
    $("#wxcm").hover(function(){
        /*$(".sewm").slideToggle();*/
        $(".max").fadeIn();
    });
    $(".max").click(function(){
        /*$(".sewm").slideToggle();*/
        $(this).fadeOut();
    });
$.ajax({
    url:"stat.php",
    type: "post",
    data:'act=visit&visit_times=8&lang=&domain=&path=&access_url=/goods.php?id=371&access_domain=http://www.scstnysc.com&time=1458303705&session_id=1cd1be091774628f649f2140fa402908&user_id=0&goods_id=371&is_mobile=0',
    async:true
});
</script>
        <link href="indexs/css/cart.css" rel="stylesheet" type="text/css"  charset="utf-8">
<div id="shopbox" class="shopbox">
    <h1>
    <a class="cl" href="javascript:catbox_hidden('shopbox');"></a>
    </h1>
    <h2>添加成功</h2>
    <div class="ibtn clearfix">
        <a href="flow.php" class="ibtn_red">去购物车结算</a>
        <a href="javascript:catbox_hidden('shopbox');" class="ibtn_shop">继续购物</a>
    </div>
    <img src="indexs/images/u10_line.png" width="730" height="1"/>

<script language="javascript">
/**
 * 获取添加商品到购物车的参数
 */
function addToCart_choose(goodsId, parentId)
{
    var goods        = new Object();
    var spec_arr     = new Array();
    var fittings_arr = new Array();
    var number       = 1;
    var formBuy      = document.forms['ECS_FORMBUY'];
    var quick          = 0;
    // 检查是否有商品规格 
    if (formBuy){
        spec_arr = getSelectedAttributes(formBuy);
        if (formBuy.elements['number']){
            number = formBuy.elements['number'].value;
        }else{
            number = $("#quantity").html();
        }
        quick = 1;
    }
    goods.quick    = quick;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
    Ajax.call('flow.php?step=add_to_cart','goods=' + obj2str(goods), addToCartResponse_choose, 'POST', 'JSON');//官方原模板
    // Ajax.call('flow.php?step=add_to_cart', 'goods=' + objToJSONString(goods), addToCartResponse_choose, 'POST', 'JSON');//有的改了模板机制的！
}
/**
 * 处理添加商品到购物车的反馈信息
 */
function addToCartResponse_choose(result)
{
    if (result.error > 0)
    {
        // 如果需要缺货登记，跳转
        if (result.error == 2)
        {
            jAlert(result.message);
            var url = 'user.php?act=add_booking&id=' + result.goods_id + '&spec=' + result.product_spec;
            doConfirm(result.message,url);
        }
        // 没选规格，弹出属性选择框
        else if (result.error == 6){
            jAlert("请选择属性!");
            //openSpeDiv(result.message, result.goods_id, result.parent);
        }else{
            jAlert(result.message);
        }
    }
    else
    {
        var cartInfo = document.getElementById('ECS_CARTINFO');
        var cartInfo_flow = document.getElementById('ECS_CARTINFO_flow');
        var cartInfo2 = document.getElementById('ECS_CARTINFO2');
        var mini_cart_number = document.getElementById('mini_cart_number');
        var cart_url = 'flow.php?step=cart';
        if (cartInfo && result.content)
        {
            cartInfo.innerHTML = result.content;
        }
        if (cartInfo_flow && result.content2)
        {
            cartInfo_flow.innerHTML = result.content2;
        }
        if (cartInfo2 && result.content2)
        {
          cartInfo2.innerHTML = result.content2;
        }
        if (mini_cart_number && result.cart_number)
        {
          mini_cart_number.innerHTML = result.cart_number;
        }
        catbox_show('shopbox');
    }
}
/**
 * 打开购物车div
 */
function catbox_show(elfm)
{
    var cart_timecount=0;
    var cat_box = document.getElementById(elfm);
    cat_box.style.display='block';
    var aaaa = setInterval(function(){
        cart_timecount=cart_timecount+0.05;
        cat_box.style.opacity=cart_timecount;
        if(cart_timecount>=1)clearInterval(aaaa);
    },10)
}
/**
 * 关闭购物车div
 */
function catbox_hidden(elfm)
{
    var cart_timecount=0;
    var cat_box = document.getElementById(elfm);
    cat_box.style.display='none';
    var aaaa = setInterval(function(){
        cart_timecount=cart_timecount+0.05;
        cat_box.style.opacity=cart_timecount;
        if(cart_timecount>=1)clearInterval(aaaa);
    },10)
}
</script>
    <link href="indexs/css/wb_Css.css" type="text/css" rel="stylesheet"/>
    <div id="LoginBox" class="Show_K">
        <div class="Show_Box">
            <div class="Show_Top">
                <div class="Show_Top1">美食商城</div>
                <div class="Show_Top2">X</div>
            </div>
            <div class="Show_Main">
                <div class="Login1">亲，请登陆！</div>
                <div class="Login2">用户名/手机号/邮箱：</div>
                <div class="Login3">
                    <input id="username" class="Login_Text" type="text" placeholder="输入用户名/手机号/邮箱" value="" maxlength="50" />
                </div>
                <div class="Login2">密码：</div>
                <div class="Login3">
                    <input id="password" class="Login_Text" type="password" placeholder="密码" value="" maxlength="20" />
                </div>
                                <input class="Login_Submit" type="button" value="登录" onclick="myCheckLogin()" />
                <div class="Login4">
                    <input type="hidden" id="goods_id" value="" />
                    <input class="Login4_1" type="checkbox" id="remember" value=1 />
                    <div class="Login4_2">记住用户名</div>
                    <div class="Login4_3">
                        <a class="Login4_3_Link" href="user.php?act=register">免费注册</a>
                        <div class="Login4_3_FG">|</div>
                        <a class="Login4_3_Link" href="find_pwd.php">忘记密码</a>
                    </div>
                </div>
                <div class="Login5">
                        <div class="denglubaidu" id="denglubaidu" style="width:100%;">
<script type="text/javascript" id="bd_soc_login_boot" src=""></script>
<script type="text/javascript">
(function(){
var t = new Date().getTime(),
  script = document.getElementById("bd_soc_login_boot"),
  redirect_uri = encodeURIComponent("http://kshop.abcd.com/denglu.php?dtype=baidu"),
  domid = "denglubaidu",
  src = "http://openapi.baidu.com/social/oauth/2.0/connect/login?redirect_uri=" + redirect_uri + "&domid=" + domid + "&client_type=web&response_type=code&media_types=sinaweibo%2Cqqdenglu%2Cbaidu%2Cqqweibo%2Ckaixin%2Crenren&size=-1&button_type=4&client_id=SH68XBbvgZsskQiHPcUZN4U5&view=embedded&t=" + t;
script.src = src;
})();
</script>
                        </div>
                </div>
            </div>
            <div class="Show_Box_BG"></div>
        </div>
        <div class="Show_BG"></div>
    </div>
   
     <script type="text/javascript">
            $(
                function(){
                    $(".Show_BG").fadeTo(0,0.1);
                    $(".Show_Box_BG").fadeTo(0,0.8);
                    $("#LoginBox .Show_Top2").click(function(){closeShow("LoginBox");});
                    $("#SCBox .Show_Top2").click(function(){closeShow("SCBox");});
                }
            );
            function myCheckLogin(){
                var postdata="";
                if($('#LoginBox #username').val()==""){
                    $('#LoginBox .Show_Main .Login1').html('<span style="color:red">用户名/手机号/邮箱不能为空</span>');
                    $('#LoginBox #username').focus();
                    return false;
                }
                postdata +="username=" + $('#LoginBox #username').val()+"&";
                if($('#LoginBox #password').val()==""){
                    $('#LoginBox .Show_Main .Login1').html('<span style="color:red">密码不能为空</span>');
                    $('#LoginBox #password').focus();
                    return false;
                }
                postdata +="password=" + $('#LoginBox #password').val()+"&";
                                 $('#LoginBox .Show_Main .Login1').html('');
                 var goods_id=$('#LoginBox #goods_id').val();
                 doLogin(postdata,function(username,id){
                    refreshHeaderUserInfo(username,'四川生态农业商城');
                    closeShow('LoginBox');
                    myAddFav(id);
                 },function(msg,id){
                    $('#LoginBox .Show_Main .Login1').html('<span style="color:red">' + msg  + '</span>');
                 },goods_id,goods_id)
            }
            function myAddFav(id){
                ajaxCheckLogin(function(id){
                    $.getJSON('user.php?act=collect&id='+id,null,function(result){
                        showBox("SCBox");
                    });
                },function(id){
                    $('#LoginBox #goods_id').val(id);
                    showBox("LoginBox");
                },id,id);
            }
            function showBox(ID){
                $("#"+ID).show(300);
                var myH=$("#"+ID+" .Show_Box").height();
                $("#"+ID+" .Show_Box").css("marginTop",-(myH/2)+"px");
            }
            function closeShow(ID){
                $("#"+ID).hide(300);
            }
        </script>
    <script type="text/javascript" src="indexs/js/jquery-zoom.js" ></script>
    </div>
</body>
</html>
