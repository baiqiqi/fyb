<form action="index.php?r=doctor/doxiu" method="post">
<table>
	<tr>
		<td>姓名</td>
		<td>
		<input type="hidden" value="<?php echo $arr['0']['doc_id']?>" name="doc_id">
		<input type="text" value="<?php echo $arr['0']['doc_name']?>" name="doc_name"></td>
	</tr>
	<tr>
		<td>电话</td>
		<td><input type="text" value="<?php echo $arr['0']['doc_tel']?>" name="doc_tel"></td>
	</tr>
	<tr>
		<td>性别</td>
		<td>
	<select name="doc_sex" id="" value="<?php echo $arr['0']['doc_sex']?>" >
		
		<option value="1" <?php echo ($arr['0']['doc_sex']==1)?'selected':''?> >男</option>
		<option value="2" <?php echo ($arr['0']['doc_sex']==2)?'selected':''?> >女</option>
	</select>
		</td>
	</tr>
	<tr>
		<td>年龄</td>
		<td><input type="text" value="<?php echo $arr['0']['doc_age']?>" name="doc_age"></td>
	</tr>
	<tr>
		<td>学位</td>
		<td><input type="text" value="<?php echo $arr['0']['doc_education']?>" name="doc_education"></td>
	</tr>
	<tr>
		<td>邮箱</td>
		<td><input type="text" value="<?php echo $arr['0']['u_email']?>" name="u_email"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="提交"><input type="reset" value="清空"></td>
	</tr>
</table>
</form>