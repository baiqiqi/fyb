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
            <div class="crumb-list"><i class="icon-font"></i><a href="./index.php?r=index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">导航栏列表</span></div>
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
                        <a href="#"><i class="icon-font"></i>新增导航</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"></th>
                            <th class="tc" width="5%">ID</th>
                            <th class="tc" width="15%">导航名称</th>
                            <th class="tc" width="20%">导航路径</th>
                            <th class="tc" width="12%">是否启用</th>
                            <th class="tc" width="12%">显示顺序</th>
                            <th class="tc" width="15%">管理操作</th>
                        </tr>
                        <?php foreach ($nav as $key => $val) {?>
                        <tr id="div">
                            <td class="tc"><input type="checkbox" name="stu" /></td>
                            <td class="tc"><?php echo $val["nav_id"];?></td> 
                            <td class="tc" ><?php echo $val["nav_name"];?></td>
                            <td class="tc" ><?php echo $val["nav_url"];?></td>
                            <td class="tc" >
                             <?php if ($val["nav_status"]==1) {
									echo "启用";
								}
								else{
									echo "未启用";
									}?>  
                            </td>
                            <td class="tc" ><?php echo $val["nav_sort"];?></td>
                            <td class="tc" >
                            <a class="link-update" href="index.php?r=index/update_show&id=<?php echo $val["nav_id"]?>">修改</a>
                            ||
                            <a class="link-del" href="#" onclick="javascript:return confirm('是否要删除?');">删除</a></td>
                        </tr>
                        <?php }?>
                            <tr id="operation">
                            	<td class="tc" colspan="7"><input type="button" value="全选" onclick="allSelectType();"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="反选" onclick="invertSelectType();"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="批量删除" onclick="invertSelectType();"/></td>
                            </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script>
function invertSelectType()

{ 

//这里重写反选和全选方法，因为再次使用原先的会导致页面上的选项也会被选  

　　var ids=$("input[name='stu']");
　　 for(var i=0;i<ids.length;i++)
　　{  
 　　　　if(ids[i].checked==true)
　　　　{    
　　　　　　ids[i].checked="";   

　　　　}else{   

 　　　　　　ids[i].checked="checked";  
 　　　}  
　　}
}

//全选

function allSelectType()

{  
　　var ids=$("input[name='stu']");  
　　for(var i=0;i<ids.length;i++)
　　{   
　　　　ids[i].checked="checked";  
　　}
}
</script>

</body>
</html>