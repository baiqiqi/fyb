 <?php include('../views/layouts/top.php');?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
 <head>
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 	<title>文章</title>
    <style>
        h1{
            text-align: center;
            font-size:30px;
            font-family: 华文行楷;
        }
        p{ 
        text-indent: 2em; 
        margin-left: 200px;
        margin-right:200px; 
        } 
        #author{
            text-align: right;
            margin-right: 200px;
        }
    </style>
 </head>
 <body>
 	<div class="container clearfix">
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="./index.php?r=index/index">首页</a><span class="crumb-step">&gt;</span><a href="./index.php?r=index/articles"><span class="crumb-name">文章列表</span></a>&gt<span class="crumb-name">详情</span>
        </div><br />
        <?php foreach ($art_show as $val) {?>
        
            <h1><?php echo $val["art_title"]?></h1>
            <p><?php echo $val["art_content"]?></p>
          <div id="author">  
            <span><?php echo $val["art_name"]?></span> <br />  
            <span><?php echo $val["art_time"]?></span>
          </div>
        <?php }?>               
        </div>
 </body>
 </html>