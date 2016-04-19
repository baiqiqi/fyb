<?php include('../views/layouts/top.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>修改页面</title>
</head>
<body>
<center>
<h1>修改页面</h1>
<form action="index.php?r=index/update" method="post">
	<table>
	<tr>
			<td>导航ID</td>
			<td><input type="text" value="<?php echo $val["nav_id"]?>" name="nav_id"/></td>
		</tr>
	<?php foreach ($update_show as $val) {?>
		<tr>
			<td>导航名称</td>
			<td><input type="text" value="<?php echo $val["nav_name"]?>" name="nav_name"/></td>
		</tr>
		<tr>
			<td>导航路径</td>
			<td><input type="text" value="<?php echo $val["nav_url"]?>" name="nav_url"/></td>
		</tr>
		<tr>
			<td>是否启用</td>
			<td><?php if ($val["nav_status"] == 1) {?>
				<input type='radio' checked='checked'/>是<input type='radio'/>否;
			<?php }else{?>
				<input type='radio'/>是<input type='radio' checked='checked'/>否;
			<?php }?></td>
		</tr>
		<tr>
			<td>显示顺序</td>
			<td><input type="text" value="<?php echo $val["nav_sort"]?>" name="nav_sort"/></td>
		</tr>
		<?php }?>
		<tr>
			<td><input type="submit" value="修改" /></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>