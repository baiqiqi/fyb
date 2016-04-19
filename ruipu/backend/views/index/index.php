 <?php include('../views/layouts/top.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>导航栏管理</title>
	<style>
		#nav{
			font-size: 20px;
			font-family: 华文楷体;
		}
		h1{
			font-size: 30px;
		}
		#operation input{
			margin-left: 20px;

		}
	</style>
</head>
<body>
<div id="nav">
<center>
<h1>导航栏管理</h1>
<br />
<table border="1;solid">
<tr>
<td></td>
<td>ID</td>
<td>导航名称</td>
<td>导航路径</td>
<td>是否启用</td>
<td>显示顺序</td>
<td>管理操作</td>
</tr>
<?php foreach ($nav as $key => $val) {?>
<tr id="div">
<td><input type="checkbox" name="stu" /></td>
<td><?php echo $val["nav_id"];?></td>
<td><?php echo $val["nav_name"];?></td>
<td><?php echo $val["nav_url"];?></td>
<td><?php if ($val["nav_status"]==1) {
	echo "启用";
}
else{
	echo "未启用";
	}?></td>
<td><?php echo $val["nav_sort"];?></td>
<td><a href="">删除</a><a href="index.php?r=index/update_show&id=<?php echo $val["nav_id"]?>">修改</a></td>

</tr>
<?php } ?>
</div>
<tr id="operation"><td colspan="7" ><a href="">添加导航</a><input type="button" value="全选" onclick="allSelectType();"/><input type="button" value="反选" onclick="invertSelectType();"/><input type="button" value="批量删除" onclick="invertSelectType();"/>
</td></tr>
</table>
</center>
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
