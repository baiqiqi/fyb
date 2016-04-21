<?php

/*
 * 用户中心 usercenter
 * $author 周晶晶
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
                    <li><a class="current" href="index.php?r=index/user_center&m=">个人主页</a></li>
                    <li><a  href="index.php?r=index/user_center&m=personal_data">个人资料</a></li>
                    <li><a href="index.php?r=index/user_center&m=personal_pwd">密码设置</a></li>
                    <li><a href="index.php?r=index/user_center&m=get_address">收货地址</a></li>
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

    <!-- /.u-menu -->
    <div class="u-main">
        <div class="ucenter">
            <div class="ucenter-info mt10">
                <div class="info-title">
                    <h5>我的个人主页</h5>
                </div>
                <div class="info">
                    <ul class="info-img">
                    <?php if($userinfo['u_img']){?>
                     <li><img src="<?= $userinfo['u_img'];?>" class="avatar" /></li>
                     <?php }else{?>
                     <li><img src="images/touxiang.png" class="avatar" /></li>
                     <?php }?>
                    </ul>
                    <div class="info-main">
                        <div class="row">
                            <label>
                                用户名：</label><?= $userinfo['u_name'];?>
                        </div>

                        <div class="row" style="margin-bottom:0px;">
                            <br>
                            <br>
                            <a href="index.php?r=index/user_center&m=personal_data" style="float:right;color: blue;font-weight: bold">去编辑更多资料</a>
                        </div>

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
