<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
$session = Yii::$app->session;
$ip = $_SERVER['REMOTE_ADDR'];
?>
<?php $this->beginPage() ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『瑞普』后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php?r=index/index">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="http://www.jscss.me">管理员</a></li>
                <li><a href="http://www.jscss.me">修改密码</a></li>
                <li><a href="index.php?r=login/index">退出</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="index.php?r=index/nav"><i class="icon-font">&#xe008;</i>导航栏管理</a></li>
                        <li><a href="index.php?r=details/details"><i class="icon-font">&#xe005;</i>商品管理</a></li>
                        <li><a href="index.php?r=about/agency"><i class="icon-font">&#xe052;</i>代理商管理</a></li>
                        <li><a href="index.php?r=indent/show"><i class="icon-font">&#xe006;</i>订单管理</a></li>
                        <li><a href="index.php?r=userinfo/info"><i class="icon-font">&#xe004;</i>用户管理</a></li>
                        <li><a href="index.php?r=doctor/dinfo"><i class="icon-font">&#xe012;</i>医生管理</a></li>
                        <li><a href="index.php?r=index/articles"><i class="icon-font">&#xe033;</i>文章管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href=""><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href=""><i class="icon-font">&#xe037;</i>清理缓存</a></li>
                        <li><a href="index.php?r=index/backups"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href=""><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
