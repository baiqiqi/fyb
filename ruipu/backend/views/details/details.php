 <?php

use yii\widgets\LinkPager;
?>
<style type="text/css">
    ul li{
        float: left;
    }
</style>
 <?php include('../views/layouts/top.php');?>
   <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="index.php?r=details/search" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="search" value="" id="search" type="text"></td>
                            <td><input class="btn btn-primary btn2" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="index.php?r=details/upload"><i class="icon-font"></i>新增作品</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th width="5%">ID</th>
                            <th width="8%">商品图片</th>
                            <th width="11%">商品名称</th>
                            <th width="10%">商品详情</th>
                            <th width="6%">商品价格</th>
                            <th width="6%">商品数量</th>
                            <th width="6%">商品月销量</th>
                            <th width="6%">操作</th>
                        </tr>
                        <?php
                         foreach ($model as $k => $v) {?>
                        <tr>
                             <td><input type="checkbox"></td>
                             <td><?php echo $v['pro_id']?></td>
                             <td><img src="<?php echo $v['pro_img']?>" width="120" height="120"></td>
                             <td><?php echo mb_substr($v['pro_name'],0,30)?></td>
                             <td><?php echo $v['pro_content']?></td>
                             <td><?php echo $v['pro_price']?></td>
                             <td><?php echo $v['pro_count']?></td>
                             <td><?php echo $v['pro_sales']?></td>
                             <td>
                                <a class="link-update" href="index.php?r=details/xiu&pro_id=<?php echo $v['pro_id']?>">修改</a>
                                <a class="link-del" href="index.php?r=details/delete&pro_id=<?php echo $v['pro_id']?>">删除</a>
                            </td>
                        </tr>
                         <?php } ?>
                    </table>
                    <div class="list-page"><?= LinkPager::widget(['pagination' => $pages]); ?></div>
                </div>
            </form>
        </div>
    </div>
</div>