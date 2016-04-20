<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/ej_class.css" />
<link rel="stylesheet" type="text/css" href="css/gwc.css" />
<body>
    <div>
              <div class="title">&nbsp;&nbsp;&nbsp;&nbsp;我挑选的商品</div>
              <div class="gwc_c">
                <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table">
                  <tr>
                    <td width="10%" class="title">商品编号</td>
                    <td width="20%" class="title">商品图片</td>
                    <td width="20%" class="title">商品名称</td>
                    <td width="10%" class="title">市场价</td>
                    <td width="10%" class="title">本站价</td>
                    <td width="10%" class="title">数量</td>
                    <td width="10%" class="title">操作</td>
                  </tr>
                  <tr>
                    <td><?php echo $arr['pro_id']?></td>
                    <td><img src="<?php echo $arr['pro_img']?>" width="100" height="100" /><p>205199</p></td>
                    <td><?php echo $arr['pro_name']?></td>
                    <td><?php echo $arr['pro_price']?>元</td>
                    <td><span id="aaa"><?php echo $arr['pro_price']?></span>元</td>
                    <td>
                    <span class="min"><img src="images/bag_close.gif" width="9" height="9" /></span>
                    <input id="text_box" class="text_box" name="" type="text" value="1" size="2" /> 
                    <span class="add"><img src="images/bag_open.gif" width="9" height="9" /></span></td>
                    <td><a href="index.php?r=check/delete&pro_id=<?php echo $arr['pro_id']?>">删除</a></td>
                  </tr>
                  <tr>
                    <td colspan="7" class="te_r">商品总金额（不含运费）：<span class=" redfont font_c_14" id="total"></span> 元</td>
                  </tr>
                  <tr>
                    <td colspan="7" class="content_bot"><span class="fl_r"><a href="index.php?r=index/index"><img src="images/jxgw.gif" width="110" height="37" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="index.php?r=check/pay"><img src="images/payment.gif" width="110" height="37" /></a>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                  </tr>
                </table>
      </div>
      </div>
      </body>
      <script type="text/javascript" src="jquery-111.js"></script> 
<script> 
		$(function(){
			var price = $('#aaa').text()
			var total = $('#total')
			$(".add").click(function(){ 
				var t=$(this).parent().find('input[class*=text_box]'); 
				t.val(parseInt(t.val())+1)
				var val = t.val();
				total.text(val*price)
				// setTotal();
			}) 
			$(".min").click(function(){ 
				var t=$(this).parent().find('input[class*=text_box]'); 
				t.val(parseInt(t.val())-1) 
				if(parseInt(t.val())<1){ 
					t.val(1); 
				} 
				var val = t.val();
				total.text(val*price)
			 	// setTotal(); 
			})
		}) 

</script> 