 <?php include('../views/layouts/top.php');?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 	<title>文章</title>
 </head>
 <body>
 	<div class="container clearfix">
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="./index.php?r=index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">文章列表</span>
        </div>
        <div class="result-wrap">
            <div class="result-content">
            <form action="index.php?r=index/adds" method="post">
                    <table class="insert-tab" width="100%">
                        <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="15%">作者</th>
                            <th class="tc"width="20%">文章主题</th>
                            <th class="tc" width="25%">详情</th>
                            <th class="tc" width="25%">发表时间</th>
                            <th class="tc" width="15%">操作</th>
                        </tr>
                        <?php foreach ($article as $v) {?>
                        <tr>
                            <td><?php echo $v["art_name"]?></td>
                            <td><?php echo $v["art_title"]?></td>
                            <td><?php echo mb_strcut($v["art_content"],0, 150)?>.... <a href="index.php?r=index/art_show&art_id=<?php echo $v['art_id']?>">详情</a></td>
                            <td><?php echo $v["art_time"]?></td>
                            <td class="tc" >
                            <a class="link-update" href="./index.php?r=index/upload&art_id=<?php echo $v['art_id'] ?>" onclick="javascript:return confirm('您确定要修改吗?');"><img src="./images/update.jpg" width="30" height="30"></a>
                            ||
                            <a class="link-del" href="./index.php?r=index/deletes&art_id=<?php echo $v['art_id'] ?>" onclick="javascript:return confirm('您确定要删除吗?');"><img src="./images/delete.jpg" width="30" height="30"></a></td>
                        </tr>
                        <?php }?>
                    </table>
                    </table>
                    </form>
        </div>
 </body>
 </html>