 <?php include('../views/layouts/top.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户管理</title>
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
<h1>用户管理</h1>
<br />
<table border="1;solid">
<tr>
<td></td>
<td>ID</td>		
<td>姓名</td>
<td>电话</td>
<td>性别</td>
<td>年龄</td>
<td>身高</td>
<td>体重</td>
<td>邮箱</td>
<td>管理操作</td>
</tr>
<?php foreach ($arr as $k => $v) {?>
<tr id="div">
<td><input type="checkbox" name="stu" /></td>
<td><?php echo $v["u_id"];?></td>
<td><?php echo $v["u_name"];?></td>
<td><?php echo $v["u_tel"];?></td>
	<?php
	if($v['u_sex'] == '1'){
		echo '<td>男</td>';
	}else{
		echo '<td>女</td>';
	}
	?>
<td><?php echo $v["u_age"];?></td>
<td><?php echo $v["u_height"];?></td>
<td><?php echo $v["u_weight"];?></td>
<td><?php echo $v["u_email"];?></td>
<td><a href="">删除</a>||<a href="">修改</a>||<a href="">交易记录</a></td>

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
