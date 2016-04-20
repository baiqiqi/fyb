<?php
use yii\widgets\LinkPager;
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
            <div class="crumb-list"><i class="icon-font"></i><a href="./index.php?r=index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">代理商列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>

                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="./index.php?r=about/add"><i class="icon-font"></i>新增代理商</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%">ID</th>
                            <th class="tc" width="15%">代理商名</th>
                            <th class="tc">代理商图片</th>
                            <th class="tc" width="20%">简介</th>
                            <th class="tc" width="12%">代理商地址</th>
                            <th class="tc" width="12%">经度</th>
                            <th class="tc" >纬度</th>
                            <th class="tc" width="15%">操作</th>
                        </tr>
                        <?php foreach($model as $k=>$v){ ?>
                        <tr>
                            <td class="tc"><?php echo $v['ag_id']?></td> 
                            <td class="tc" ><?php echo $v['ag_name']?></td>
                            <td class="tc" ><img width="100" height="100" src="<?php echo $v['ag_img']?>"></td>
                            <td class="tc" ><?php echo mb_strlen($v['ag_content'], 'utf-8') > 13  ? mb_substr($v['ag_content'], 0, 20 , 'utf-8').'....' :$v['ag_content'] ; ?></td>
                            <td class="tc" ><?php echo $v['ag_addr']?></td>
                            <td class="tc" ><?php echo $v['ag_x']?></td>
                            <td class="tc" ><?php echo $v['ag_y']?></td>
                            <td class="tc" >
                            <a class="link-update" href="./index.php?r=about/upload&ag_id=<?php echo $v['ag_id'] ?>">修改</a>
                            ||
                            <a class="link-del" href="./index.php?r=about/deletes&ag_id=<?php echo $v['ag_id'] ?>" onclick="javascript:return confirm('是否要删除?');">删除</a></td>
                        </tr>
                        <?php }?>
                    </table>
                    <div class="list-page"> 
                    <ul style="font-size: 25px;">
                    <li><?= LinkPager::widget(['pagination' => $pages]); ?></li>
                    </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>