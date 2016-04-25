<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<style>
    ul li{
        list-style: none;
        float: left;
    }
</style>
<body>
<?php include('../views/layouts/top.php');?>
<div class="container clearfix">
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="./index.php?r=index/index">首页</a><span class="crumb-step">&gt;</span><a href="index.php?r=index/nav"><span class="crumb-name">导航栏列表</span></a>&gt;<span class="crumb-name">添加导航</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
            <form action="index.php?r=index/adds" method="post">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>导航名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="nav_name" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>导航路径：</th>
                                <td><input class="common-text required" id="title" name="nav_url"></input></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>是否显示：</th>
                                <td>
                                    <input type="radio" name="nav_status" checked="checked" value="1">是
                                    <input type="radio" name="nav_status" value="2">否
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>显示顺序：</th>
                                <td>
                                   <input class="common-text required" id="sort" name="nav_sort" size="20" value="" type="text" onblur="check_sort()">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
        </div>
        <script src="js/jquery.js"></script>
        <script>
          function check_sort(){
            var nav_sort = document.getElementById("sort").value;
             if(isNaN(nav_sort)){
                   alert("请填写整数");
                }else{
                    $.post("index.php?r=index/add_sort",{nav_sort:nav_sort},function(data){
                        if (data == "存在") {
                            alert("该排序存在请重新输入");
                        }
                    })
                } 
          }
        </script>
</body>
</html>