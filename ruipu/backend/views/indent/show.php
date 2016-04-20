 <?php include('../views/layouts/top.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>订单管理</title>
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
<h1>订单管理</h1>
<br />
<table border="1;solid">
<tr>
<td></td>
<td>ID</td>
<td>用户名称</td>
<td>商品名称</td>
<td>商品总价</td>
<td>商品数量</td>
<td>快递名称</td>
<td>订单号</td>
<td>订单时间</td>
<td>管理操作</td>
</tr>
<?php foreach ($arr as $k => $v) {?>
<tr id="div">
<td><input type="checkbox" name="stu" /></td>
<td><?php echo $v["ord_id"];?></td>
<td><?php echo $v["u_name"];?></td>
<td><?php echo $v["pro_name"];?></td>
<td><?php echo $v["pro_price"];?></td>
<td><?php echo $v["pro_num"];?></td>
<td><?php echo $v["ex_name"];?></td>
<td><?php echo $v["det_numbur"];?></td>
<td><?php echo $v["det_time"];?></td>
<td><a href="">删除</a>||<a href="">修改</a></td>

</tr>
<?php } ?>
</div>
<tr id="operation"><td colspan="10" ><input type="button" value="全选" onclick="allSelectType();"/><input type="button" value="反选" onclick="invertSelectType();"/><input type="button" value="批量删除" onclick="invertSelectType();"/>
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
