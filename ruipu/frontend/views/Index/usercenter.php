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
            <div class="ucenter-info mt10">
                <div class="info-title">
                    <h5>我的个人主页</h5>
                </div>
                <div class="info">
                    <ul class="info-img">
                     <li><img src="<?= $userinfo['u_img'];?>" class="avatar" /></li>
                    </ul>
                    <div class="info-main">
                        <div class="row">
                            <label>
                                用户名：</label><?= $userinfo['u_name'];?></div>
                        <div class="row">
                            <label>
                                性别：</label>
                                <?php if($userinfo['u_sex']==1){?>
                            <input type="radio" name="sex" value="1" checked>男
                            <input type="radio" name="sex" value="0">女
                            <?php }else{?>
                               <input type="radio" name="sex" value="1" >男
                                <input type="radio" name="sex" value="0" checked>女
                             <?php }?>
                                </div>
                        <div class="row">
                            <label>
                                手机号：</label><?= $userinfo['u_tel'];?></div>
                        <div class="row">
                            <label>
                                身高：</label><?= $userinfo['u_height'];?>&nbsp;cm</div>
                        <div class="row">
                            <label>
                                体重：</label><?= $userinfo['u_weight'];?>&nbsp;&nbsp;kg</div>
                        <div class="row">
                            <label style="width: 80px;">
                               主治医生：</label><?= $userinfo['doc_name'];?>&nbsp;&nbsp;医生</div>
                        <div class="row">
                            <label style="width: 100px;">
                                我的锻炼计划：</label><span class="orange"><?= $userinfo['exe_content'];?></span></div>

                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
            <!--  <div class="ucenter-info mt10">
                 <div class="ucenter-tab-box">
                     <ul class="u-tab clearfix">
                         <li class="current"><a>我关注的用户</a></li>
                         <li><a>关注我的用户</a></li>
                         <li><a>投标记录</a></li>
                         <li><a>贷款记录</a></li>
                     </ul>
                 </div>
                <div id="tab_box">
                     <div class="u-form-wrap">
                         <div>
                             这是我关注的用户</div>
                     </div>
                     <div class="u-form-wrap" style="display: none;">
                         <div>
                             这是关注我的用户</div>
                     </div>
                     <div class="u-form-wrap" style="display: none;">
                         <div>
                             这是我的投标记录</div>
                     </div>
                     <div class="u-form-wrap" style="display: none;">
                         <div>
                             这是我的贷款记录</div>
                     </div>
                 </div>
            </div>-->
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
