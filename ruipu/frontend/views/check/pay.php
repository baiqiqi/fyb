<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/ej_class.css" />
<link rel="stylesheet" type="text/css" href="css/gwc.css" />
<style type="text/css">
.btn{display:block;width:113px;height:28px;line-height:28px;border:none;cursor:pointer;padding:0;background:url(http://api.d3pay.net:99/css/btn.png) 0 0 no-repeat;color:#fff;font-size:14px;font-weight:bold;}
</style>
<body>
<div style="clear:both;"></div>
<div class="w_980 m">
<div class="w_980 fl_l">
      <div class="gwc_pos second">
            <div class="un fl_l">1.我的购物车</div>
            <div class="sel fl_l">2.填写核对订单信息</div>
            <div class="un fl_l">3.成功填写订单</div>                
      </div>            
</div>
    <form name="form1" action="./index.php?r=check/alipay" method="post" enctype="multipart/form-data">
    <div class="w_978 fl_l bor">
              <div class="title"><span class="fl_r font12"><a href="#" class=" redfont">修改</a></span>商品列表</div>
              <div class="gwc_c">
                <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table">
                          <tr class="title">
                            <td width="10%">商品编号</td>
                            <td width="36%">商品名称</td>
                            <td width="11%">市场价</td>
                            <td width="9%">本站价</td>
                            <td width="10%">数量</td>
                            <td width="11%">小计</td>
                            <td width="13%">操作</td>
                          </tr>
                          <?php foreach ($data_shop as $key => $value): ?>
                            <tr>
                            <input type="hidden" value="<?php echo $value['pro_id']?>" name="pro_id">
                            <td><img src="<?php echo $value['shop_image'] ?>" width="45" height="45" /><p><?php echo $value['shop_id'] ?></p></td>
                            <td><a href="index.php?r=index/details&pro_id=<?php echo $value['pro_id']?>"><?php echo $value['shop_name'] ?></a></td>
                            <td><?php echo $value['pro_price'] ?></td>
                            <td class="redfont"><span id="aaa"><?php echo $value['pro_price'] ?></span></td>
                            <td>
                                <input type="hidden" value="<?php echo $value['shop_num']?>" name="ord_sum">
                                <span class="min"><img src="images/bag_close.gif" width="9" height="9" /></span>
                                <input id="text_box" class="text_box" name="" type="text" value="<?php echo $value['shop_num'] ?>" size="2" /> 
                                <span class="add"><img src="images/bag_open.gif" width="9" height="9" /></span>
                            </td>
                            <td><span class=" redfont font_c_14" id="total"><?php echo $value['shop_price'] ?></span></td>
                            <td><a href="#">删除</a> <a href="#">放入收藏夹</a></td>
                            </tr>
                            <tr>
                            <td colspan="7" class="te_r">商品总金额（不含运费）：<span class="redfont font_c_14" id="total1"><?php echo $value['shop_price'] ?></span> 元 </td>
                          </tr>
                          <?php endforeach ?>
                </table>
      </div>
      </div>
  <div class="w_978 fl_l bor ma_t10">
      <div class="title"><span class="fl_r font12"><a href="#" class=" redfont">修改</a></span>收货人信息</div>
      <div class="gwc_c">
        <?php foreach ($data as $key => $value): ?>
        <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table">
         <tr class="title">
         <td>收件人姓名</td>
         <td>收件人电话</td>
         <td>详细地址</td>
         <td>最佳配送时间</td>
         </tr>
          <?php if ($value['u_id']==$value['u_id']): ?>
            <tr>
            <input type="hidden" value="<?php echo $value['u_id']?>" name="u_id">
             <td><?php echo $value['rec_name'] ?></td>
             <td><?php echo $value['rec_tel'] ?></td>
             <td><?php echo $value['rec_address'] ?></td>
             <td><?php echo $value['rec_time'] ?></td>
           </tr>
          <?php endif ?>
          </table><br/>
         <?php endforeach ?>                               
        
      </div>
    </div>
  <div class="w_978 fl_l bor ma_t10">
      <div class="title">配送方式</div>
      <div class="gwc_c">
        <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table">
                          <tr class="title">
                            <td width="10%">&nbsp;</td>
                            <td width="36%">名称</td>
                            <td width="11%">订购描述</td>
                            <td width="9%">费用</td>
                            <td width="13%">报价费用</td>
                          </tr>
                          <?php foreach ($data_express as $key => $value): ?>
                            <tr>
                            <td><span><input type="radio"  class="radio1" name="ex_price" value="<?php echo $value['ex_price'] ?>" <?php echo ($key==0)?'checked':''; ?> /></span></td>
                            <td><?php echo $value['ex_name'] ?></td>
                            <td><?php echo $value['ex_content'] ?></td>
                            <td>￥<span id="bb"><?php echo $value['ex_price'] ?></span> 元</td>
                            <td><?php echo $value['ex_quote'] ?></td>
                            </tr>
                          <?php endforeach ?>                                       
                        </table>
      </div>
    </div>
   <div class="w_978 fl_l bor ma_t10">
      <div class="title">支付方式</div>
      <div class="gwc_c">
        <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table">
                         
                          <tr class="title">
                            <td width="10%">&nbsp;</td>
                            <td width="8%">名称</td>
                            <td width="64%">描述</td>
                          </tr> 
                          <?php foreach ($data_pay as $key => $value): ?>
                            <tr>
                            <td><input type="radio" name="pay_id" id="radio" value="<?php echo $value['pay_id'] ?>" <?php echo ($key==0)?'checked':''; ?> /></td>
                            <td><?php echo $value['pay_name'] ?></td>
                            <td><?php echo $value['pay_content'] ?></td>
                            </tr>
                          <?php endforeach ?>                                       
                        </table>
      </div>
    </div>
    <div class="w_978 fl_l bor ma_t10">
      <div class="title">费用总计</div>
      <div class="gwc_c">
      <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table">
      <?php foreach ($data_shop as $key => $value): ?>
      <tr>
        <td width="100%" class="te_r">商品总金额（不含运费）：<span class="redfont font_c_14"><span class=" redfont font_c_14" id="total2"><?php echo $value['shop_price'] ?></span> 元</td>
      </tr>
      <tr>
        <td class="te_r">商品总价：￥<span class="redfont font_c_14" id="zong1"><?php echo $value['shop_price'] ?></span> 元</td>
      </tr>
      <tr>
        <input type="hidden" id="money_sum" value="<?php echo $value['shop_price']?>" name="ord_price">
        <td class="te_r">应付款金额：￥<span class="redfont font_c_14" id="zong2"><?php echo $value['shop_price'] ?></span> 元</td>
      </tr>
      <?php endforeach ?>
    </table>
    <div class="te_m pa_t10">
    <a href="javascript:form1.submit();"><img src="images/sub.gif" width="160" height="37" /></a>
    </div>
      </div>
    </div> 
</div>
</form>

<script type="text/javascript" src="jquery-111.js"></script> 
<script> 
    $(function(){
      var price = $('#aaa').text()
      var total = $('#total')
      var total1 = $('#total1')
      var total2 = $('#total2')
      var zong1 = $('#zong1')
      var zong2 = $('#zong2')
      var money_sum = $('#money_sum')
      $(".add").click(function(){ 
        var t=$(this).parent().find('input[class*=text_box]'); 
        t.val(parseInt(t.val())+1)
        var val = t.val();
        total.text(val*price)
        total1.text(val*price)
        total2.text(val*price)
        zong1.text(val*price)
        zong2.text(val*price)
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
        total1.text(val*price)
        total2.text(val*price)
        zong1.text(val*price)
        zong2.text(val*price)
        // setTotal(); 
      })
    }) 

</script> 

<script> 
    $(function(){

      var zong1 = $('#zong1')
      var zong2 = $('#zong2')
      var price = zong1.text();
      zong2.text(parseInt($(".radio1[checked]").val())+parseInt(price))
      $(".radio1").click(function(){
        var obj = $(this);
        var val = obj.val()   
        var sum = parseInt(val)+parseInt(price)
        zong2.text(sum)
        $('#money_sum').val(sum)
      }) 
    }) 
</script> 