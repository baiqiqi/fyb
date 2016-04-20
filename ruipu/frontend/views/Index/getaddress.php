<?php

use yii\helpers\Html;

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
                        <li><a href="">所有订单</a></li>
                        <li><a href="">已支付</a></li>
                        <li><a href="">未支付</a></li>
                        <li><a href="">失效订单</a></li>
                    </ul>
                </li>
                <li class="item" id="user_menu_funds" name="user_menu_funds">
                    <h3 class="t2">
                        积分管理<span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a href="">积分记录</a></li>
                        <li><a href="">充值记录</a></li>

                    </ul>
                </li>
                <li class="item" id="user_menu_loan" name="user_menu_loan">
                    <h3 class="t3">
                        我的优惠券<a name="user_login"></a><span title="折叠"></span></h3>
                    <ul class="sub">
                        <li><a  href="">全部优惠券</a></li>

                        <li><a href="">已过期</a></li></ul>
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

        <!-- /.u-menu -->
        <div class="u-main">
            <div class="ucenter">
                <div class="ucenter-info mt10" style="width: 900px;">
                    <div class="info-title">
                        <h5>我的收货地址</h5>
                    </div>
                    <div class="info">
                        <div class="info-main" style="width: 900px">
                            <div class="row" style="width: 95%">
                            <ul style="font-size: 14px;" id="addr" >

                            <?php foreach($address as $k=>$v){?>
                              <?php if($v['is_moren']==1){?>
                                    <li class="ulli">
                                        <img src="images/dingwei.png"  width="20px">
                                        &nbsp;&nbsp;<span><font color="red">寄送至</font></span>&nbsp;&nbsp;<input type="radio" checked/>&nbsp;&nbsp;<?= $v['rec_address']?>(<?= $v['rec_name'];?>)    <?= $v['rec_tel'];?>&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">默认地址</font>&nbsp;&nbsp;<a href="" style="float: right;margin-left:35px">修改本地址</a>&nbsp;&nbsp;<em style="display: none;float: right;" id="moren"><font color="blue" size="">设为默认收货地址</font></em></li>
                            <?php } else{?>
                                <li  class="ulli">
                                   &nbsp;&nbsp;<input type="radio" style="margin-left: 75px;"/>&nbsp;&nbsp;<?= $v['rec_address']?>(<?= $v['rec_name'];?>)    <?= $v['rec_tel'];?>&nbsp;&nbsp;<a href="" style="float: right;margin-left:35px">修改本地址</a>&nbsp;&nbsp;<em style="display: none;float: right;" id="moren"><font color="blue" size="">设为默认收货地址</font></em></li>
                            <?php }?>
                            <?php }?>

                                </ul>
                            </div>

                            <script>
                                $(".ulli").hover(function(){
                                    $(this).find("em").css('display','block');
                                },function(){
                                    $(this).find("em").css('display','none');
                                })
                            </script>
                            <div class="row">
                                <a href="index.php?r=index/user_center&m=address_add">  <input type="button" id="add_address" style="margin-left: 103px;background: url(//img.alicdn.com/tps/i2/TB1kJUdGFXXXXcyaXXX08VS7pXX-176-1320.png) no-repeat -28px -70px;width: 90px;height: 25px;display: inline-block;font-size: 0;text-indent: -99px;vertical-align: text-top;"></a></div>
                        </div>

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
