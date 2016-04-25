<form action="index.php?r=userinfo/doxiu" method="post">
<table>
	<tr>
		<td>姓名</td>
		<td>
		<input type="hidden" value="<?php echo $arr['0']['u_id']?>" name="u_id">
		<input type="text" value="<?php echo $arr['0']['u_name']?>" name="u_name"></td>
	</tr>
	<tr>
		<td>电话</td>
		<td><input type="text" value="<?php echo $arr['0']['u_tel']?>" name="u_tel"></td>
	</tr>
	<tr>
		<td>性别</td>
		<td>
	<select name="u_sex" id="" value="<?php echo $arr['0']['u_sex']?>" >
		
		<option value="1" <?php echo ($arr['0']['u_sex']==1)?'selected':''?> >男</option>
		<option value="2" <?php echo ($arr['0']['u_sex']==2)?'selected':''?> >女</option>
	</select>
		</td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><input type="text" value="<?php echo $arr['0']['u_age']?>" name="u_age"></td>
	</tr>
	<tr>
		<td>身高</td>
		<td><input type="text" value="<?php echo $arr['0']['u_height']?>" name="u_height"></td>
	</tr>
	<tr>
		<td>体重</td>
		<td><input type="text" value="<?php echo $arr['0']['u_weight']?>" name="u_weight"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="提交"><input type="reset" value="清空"></td>
	</tr>
</table>
</form>