
<head>
    <title>个人资料</title>
    <script src="js/ops.js" type="text/javascript"></script>
    <link href="css/UserCSS.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js" type="text/javascript"></script>
</head>
<div style="margin: auto;margin-top: 60px;height:1000px;">
<div class="row" style="margin-top: 10px;">
</div>
<div class="row">
    <div class="u-menu">
        <ul class="u-nav" id="user_menu">
            <li class="item" id="user_menu_my" name="user_menu_my">
                <h3 class="t1">
                    我的个人天地<span title="折叠"></span></h3>
                <ul class="sub">
                    <li><a href="index.php?r=index/user_center&m=">个人主页</a></li>
                    <li><a class="current"  href="index.php?r=index/user_center&m=personal_data">个人资料</a></li>
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
    <div class="u-main">
        <div id="tab_menu">
            <ul class="u-tab clearfix">
                <li class="current"><a>个人详细信息</a></li>

            </ul>
        </div>
        <div id="tab_box">
            <div class="u-form-wrap">

                <style>
                    .person tr{
                      height: 30px;

                    }
                    .person td{
                      text-align: center;
                    }
                    .personal tr{
                     height: 40px;
                    }
                    .avatars{
                       margin-top: 10px;
                    }
                </style>
                <div style="margin-top: 5px;margin-bottom: 20px;text-align: center">
                     <?php if($personal['u_tel']){?>
                        <?php if($personal['u_img']){?>
                            <span><img src="<?= $personal['u_img'];?>" title="更换头像" class="avatars" id="upload_update " style="width: 170px;height: 195px;"/></span>
                        <?php }else{?>
                            <span><img src="images/touxiang.png" title="上传头像" class="avatars" id="upload" style="width: 170px;height: 195px;"/></span>
                        <?php }?>

                    <table border="1" style="float: right;width:75%;margin-left:px;color: black;font-size: 14px" class="person">

                        <tr>
                            <td>用户名：</td>
                            <td><?= $personal['u_name'];?></td>
                        </tr>
                        <tr>
                            <td>性别：</td>
                            <td><?php if($personal['u_sex']==1){?>
                                    <input type="radio" name="u_sex" value="1" checked>男&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="u_sex" value="0">女
                                <?php }else{?>
                                    <input type="radio" name="u_sex" value="1">男&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="u_sex" value="0" checked>女
                                <?php }?>

                            </td>
                        </tr>
                        <tr>
                            <td>年龄：</td>
                            <td><?= $personal['u_age']?></td>
                        </tr>
                        <tr>
                            <td>身高：</td>
                            <td><?= $personal['u_height'];?>cm</td>
                        </tr>
                        <tr>
                            <td>体重：</td>
                            <td><?= $personal['u_weight'];?>kg</td>
                        </tr>
                        <tr>
                            <td>手机号：</td>
                            <td><?= $personal['u_tel']?></td>
                        </tr>
                        <tr>
                            <td>邮箱：</td>
                            <td><?= $personal['u_email'];?></td>
                        </tr>
                    </table>
                     <?php }else{?>
                         你好神秘哦。。。<a href="javascript:void(0)" id="display" style="color: blue;font-size: 14px">让更多的人了解我</a>
                     <?php }?>

                </div>
                <script>
                    $("#display").click(function(){
                       $("#user_addinfo").css('display','block');
                    })
                </script>
                <div style="display: none" id="user_addinfo">
                    <div class="uf-tips">
                        <span class="red">*</span> 为必填项，所有资料均会严格保密。
                    </div>
                 <table border="1" style="width:100%;margin-top:30px;font-size: 14px;color: black;" class="personal" id="person_info">

                    <tr>
                            <td align="center">用户名：</td>
                            <td><input type="text" value="<?= $personal['u_name']; ?>" style="margin-left: 30px;"/></td>
                        </tr>
                        <tr>
                            <td align="center">头像</td>
                            <td>
                                <?php if($personal['u_img']){?>
                                    <img src="<?= $personal['u_img'];?>" title="更换头像" width="60" style="margin: 5px auto;margin-left: 60px;width: 170px;height: 195px;" alt="" id="upload_update">
                                <?php }else{?>
                                    <img src="images/touxiang.png" title="上传头像" style="margin: 5px auto;margin-left: 60px;width: 170px;height: 195px;" id="upload">
                                <?php }?>
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center">性别：</td>
                            <td>
                               <input type="radio" name="sex" value="1" checked style="margin-left: 50px;">男&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="radio" name="sex" value="0">女
                            </td>
                        </tr>
                        <tr>
                            <td align="center">年龄：</td>
                            <td><input type="text" name="u_age" id="u_age" style="margin-left: 30px;" /></td>
                        </tr>
                        <tr>
                            <td align="center">身高：</td>
                            <td><input type="text" name='u_height' id="u_height" style="margin-left: 30px;"/>&nbsp;cm</td>
                        </tr>
                        <tr>
                            <td align="center">体重：</td>
                            <td><input type="text" name="u_weight" id="u_weight" style="margin-left: 30px;">&nbsp;kg</td>
                        </tr>
                        <tr>
                            <td align="center">手机号：</td>
                            <td><input type="text" name="u_tel" id="u_tel" style="margin-left: 30px;">&nbsp;<span style="color: red">*请填写正确的11位手机号</span></td>
                        </tr>
                        <tr>
                            <td align="center">邮箱：</td>
                            <td><input type="text" name="u_tel" id="u_tel" style="margin-left: 30px;">&nbsp;<span style="color: red">*请填写正确邮箱格式</span></td>
                        </tr>

                    </table>
                    <table style="width:100%;margin-top:30px;font-size: 14px;color: black;">
                        <tr>
                            <td colspan="2" align="center">
                                <input type="button" value="添加" style="width: 60px;height: 35px;font-size: 14px;font-weight: bold">
                                <input type="reset" value="取消" style="width: 60px;height: 35px;font-size: 14px;font-weight: bold;margin-left: 50px;">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">

        var $div_li = $("#tab_menu ul li");

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
</div>

