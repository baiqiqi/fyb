<?php
/*
 *用户添加新的收获地址 addaddress
 * @author  周晶晶
 * */
?>

<head>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <link href="css/UserCSS.css" rel="stylesheet" type="text/css" />
    <script src="js/ops.js" type="text/javascript"></script>
</head>
<div style="margin: auto;margin-top: 60px;height:1000px;">
    <div class="row" >
        <div class="u-menu">
            <ul class="u-nav" id="user_menu">
                <li class="item" id="user_menu_my" name="user_menu_my">
                    <h3 class="t1">
                        我的个人天地<span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a href="index.php?r=index/user_center&m=">个人主页</a></li>
                        <li><a  href="index.php?r=index/user_center&m=personal_data">个人资料</a></li>
                        <li><a href="index.php?r=index/user_center&m=personal_pwd">密码设置</a></li>
                        <li><a class="current" href="index.php?r=index/user_center&m=get_address">收货地址</a></li>
                        <li><a href="index.php?r=index/user_center&m=personal_news">我的消息</a></li>
                        <li><a href="index.php?r=index/user_center&m=personal_words">我的微留言</a></li>
                    </ul>
                </li>

                <li class="item" id="user_menu_invest" name="user_menu_invest">
                    <h3 class="t4">
                        我的订单<span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a href="index.php?r=index/user_center&m=order_all">所有订单</a></li>
                        <li><a href="index.php?r=index/user_center&m=order_pay_yes">已支付</a></li>
                        <li><a href="index.php?r=index/user_center&m=order_pay_no">未支付</a></li>
                        <li><a href="index.php?r=index/user_center&m=order_invalid">失效订单</a></li>
                    </ul>
                </li>
                <li class="item" id="user_menu_funds" name="user_menu_funds">
                    <h3 class="t2">
                        积分管理<span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a href="index.php?r=index/user_center&m=points_record">积分记录</a></li>
                        <li><a href="index.php?r=index/user_center&m=rechange_record">充值记录</a></li>

                    </ul>
                </li>
                <li class="item" id="user_menu_loan" name="user_menu_loan">
                    <h3 class="t3">
                        我的优惠券<a name="user_login"></a><span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a  href="index.php?r=index/user_center&m=coupon_all">全部优惠券</a></li>
                        <li><a href="index.php?r=index/user_center&m=coupon_invalid">已过期</a></li></ul>
                </li>

            </ul>
            <script type="text/javascript">
                var menuClosed = Ops.getCookie('menuClosed');

                $(".item h3 span").click(function () {

                    menuClosed = Ops.getCookie('menuClosed');
                    if (menuClosed == undefined || menuClosed == null) {
                        menuClosed = '';
                        Ops.setCookie('menuClosed', menuClosed);
                    }
                    //console.log(menuClosed+',click;;;');
                    $(this).parent().parent().toggleClass('bg-slide');
                    $(this).parent().parent().find(".sub").slideToggle('fast');

                    if ($(this).attr('title') == '折叠') {
                        $(this).attr('title', '展开');
                    } else {
                        $(this).attr('title', '折叠');
                    }

                    var pid = $(this).parent().parent().attr('id');

                    if ($(this).parent().parent().hasClass('bg-slide') && menuClosed.indexOf("#" + pid + "#") == -1) {
                        var cookies = menuClosed + '#' + pid + '#';
                    } else {
                        var cookies = menuClosed.replace("#" + pid + "#", '');
                    }
                    Ops.setCookie('menuClosed', cookies);
                });

                if (menuClosed != null) {
                    var closedMatch = menuClosed.match(/([a-z_]+)/g);
                    for (var i in closedMatch) {
                        var idObj = $('#' + closedMatch[i]);
                        idObj.toggleClass('bg-slide');
                        idObj.find(".sub").hide();
                        idObj.find('h3 span').attr('title', '展开');
                    }
                } else {
                    $("#user_menu_loan h3 span").click();
                }
            </script>
        </div>
        <style>
            .countrys {
                width: 100px;
                height: 30px;
                text-align: center;
                color: #000000;
            }
            .countrys option{
              text-align: center;
              color: #000000;
            }
            .row{

               text-align: left;
            }

        </style>
        <!-- /.u-menu -->
        <div class="u-main">
            <div class="ucenter">
                <div class="ucenter-info mt10">
                    <div class="info-title">
                        <h5>我的个人主页</h5>
                    </div>
                    <div class="info" style="margin: 0 auto;text-align: center;">
                        <div class="info-main" style="text-align: center;width: 100%;">

                            <div class="row">
                                <label style="width: 120px;">
                                   收货人姓名：</label><input type="text" name="rec_name" id="rec_name" style="width: 305px;"></div>
                            <div class="row">
                                <label style="width: 120px;">
                                    收货人电话：</label>
                                <input type="text" name="rec_tel" id="rec_tel" style="width: 305px;">
                            </div>
                            <div class="row">
                                <label style="width: 120px;">
                                    收货人地址：</label>
                                <select name="countrys" id="countrys" class="countrys">
                                    <option value="">--请选择--</option>
                                    <?php foreach($country as $k=>$v){?>
                                     <option value="<?= $v['region_name'];?>"><?= $v['region_name'];?></option>
                                    <?php }?>
                                </select>
                                <select name="citys" id="citys" class="countrys">
                                    <option value="0">--请选择--</option>

                                </select>
                                <select name="xian" id="xian" class="countrys">
                                    <option value="0">--请选择--</option>

                                </select>
                                <span id="adde_warn"></span>
                                </div>

                                <div class="row" style="height: px">
                                    <label style="width: 120px;float: left;padding-left: 13px">
                                        详细地址：</label>
                              <textarea name="" id="xiangxi" cols="" rows="" style="color:black;margin: 0;padding: 3px;width: 380px;height: 62px;border: 1px solid #afafaf;font-size: 12px;" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息"></textarea>
                                    </div>
                            <div class="row">
                                <label style="width: 120px">设为默认地址：</label>
                                <input type="radio" name="is_moren" class="is_moren" value="1">是
                                <input type="radio" name="is_moren" class="is_moren" value="0">否
                            </div>
                            <div class="row">
                                <input type="button" value="提交" id="add_botton" style="width: 80px;height: 35px;font-size: 16px;font-weight: bold;margin-left: 25%">
                                <input type="reset" value="取消" style="width: 80px;height: 35px;font-size: 16px;font-weight: bold;margin-left: 20px">
                                </div>
                        </div>
                        <script>
                            $(".countrys").change(function(){
                               var v = $(this).val();
                               //alert(v)
                               var $this = $(this)
                               var url = "index.php?r=index/addr_ajax";
                                $.get(url,{v:v},function(msg){
                                    $this.next('select').html(msg)
                                })
                            })
                            $("#add_botton").click(function(){
                              var rec_name = $("#rec_name").val();
                              var rec_tel = $("#rec_tel").val();
                              var country = $("#countrys").val()
                              var citys = $("#citys").val()
                              var xian = $("#xian").val()
                              var xiangxi = $("#xiangxi").val();
                              var is_morens = $(".is_moren");
                              var is_moren = '';
                              for(var i=0;i<is_morens.length;i++){
                                    if(is_morens[i].checked==true){
                                        is_moren += is_morens[i].value;
                                    }
                                }
                              var url = "index.php?r=index/address_insert";
                              if(country==0 || citys==0 || xian==0){
                                 $("#adde_warn").text("*请选择").css('color','red')
                              }else{
                                  $("#adde_warn").text("");
                              var rec_address = country+citys+xian+xiangxi;
                              }
                                $.get(url,{rec_name:rec_name,rec_tel:rec_tel,rec_address:rec_address,is_moren:is_moren},function(msga){
                                alert(msga)
                                })
                            })

                        </script>
                        <div class="clear">
                        </div>
                    </div>
                </div>
                <script type="text/javascript">

                    var $div_li = $(".ucenter-tab-box ul li");

                    $div_li.click(function () {

                        $(this).addClass("current").siblings().removeClass("current");

                        var div_index = $div_li.index(this);

                        $("#tab_box>div").eq(div_index).show().siblings().hide();

                    }).hover(function () {

                        $(this).addClass("hover");

                    }, function () {

                        $(this).removeClass("hover");

                    });

                </script>
            </div>
            <!-- /.u-main -->
        </div>

    </div>

