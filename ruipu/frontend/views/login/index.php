
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="css/style2.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<style>
			.reg{
				background-color: gray;
			}
			.check{
				background-color: blue;
			}
		</style>
</head>
 
<body>
	<div class="main">
				 <!-----start-main---->

				 <form action="index.php?r=login/dosignin" method="POST">
				 <div class="inset">
				 	<div class="social-icons">
		    			 <div class="span reg "><input type="hidden" name="doctor"><a href="#"><img src="images/fb.png" alt=""/><i>医生注册</i><div class="clear"></div></a></div>	
    					 <div class="span1 reg check"><input type="hidden" name="user" value="1"><a href="#"><img src="images/t-bird.png" alt=""/><i>用户注册</i><div class="clear"></div></a></div>
    					 <div class="clear"></div>
					</div>
				 </div>	
				 <h2></h2>				 
							<div class="lable-2">
		                   <!--   	<input type="text" class="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" id="active">

		                     	<input type="text" class="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"> -->
		                     	
		                    </div>
		                    <div class="clear"> </div>
		                    <div class="lable-2">
		                    <input type="text" class="text" name="username" value="请输入您的用户名 " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入您的用户名';}">
		                    <input type="text" class="text" name="email" value="请输入您的邮箱 " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '请输入您的邮箱';}">
		                     <input type="password" class="text" name="pwd" value="Password " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password ';}">
							</diyuy8v>

							<div class="clear"> </div>
							 <h3>快速登录：<span><a href="#">QQ</a>&nbsp&nbsp&nbsp&nbsp<a href="#">微博</a>&nbsp&nbsp&nbsp&nbsp<a href="#">微信</a><span></h3>
								 <div class="submit"> 
									<input type="submit" onclick="myFunction()" value="确 认 注 册" >
								</div>
									<div class="clear"> </div>
							 </form>
		<!-----//end-main---->
		</div>
		 <!-----start-copyright---->
   					<div class="copy-right">
						<p>瑞普医疗 <a href="http://www.cssmoban.com/" target="_blank" title="瑞普医疗">ruipu.com</a></p> 
					</div>
				<!-----//end-copyright---->
	 
</body>
</html>
<script src='js/jquery-1.11.1.min.js'></script>
<script type="text/javascript">
	$(function(){
		$('.reg').click(function(){
			$('.reg').removeClass('check')
			$('.reg').children('input[type=hidden]').val('')
			var obj = $(this)
			obj.addClass('check')
			obj.children('input[type=hidden]').val('1')
		})
	})
</script>