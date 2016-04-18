<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/ej_class.css" />
<link rel="stylesheet" type="text/css" href="css/gwc.css" />
<body>
<div style="clear:both;"></div>
<div class="w_980 m">
    <div class="gwc_logo g_sec fl_l">填写核对订单信息</div>
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
                          <tr>
                            <td><img src="images/pic45.jpg" width="45" height="45" /><p>205199</p></td>
                            <td class="content_l"><a href="#">索尼爱立信索爱索爱W995W995C</a></td>
                            <td>￥1399 元</td>
                            <td class="redfont">￥1399 元</td>
                            <td>2</td>
                            <td>￥1399 元</td>
                            <td><a href="#">删除</a> <a href="#">放入收藏夹</a></td>
                          </tr>
                          <tr>
                            <td colspan="7" class="te_r">商品总金额（不含运费）：<span class="redfont font_c_14">￥1399</span> 元 比市场价￥1399 元节省了￥1399 元</td>
                          </tr>
                </table>
      </div>
      </div>
  <div class="w_978 fl_l bor ma_t10">
      <div class="title"><span class="fl_r font12"><a href="#" class=" redfont">修改</a></span>收货人信息</div>
      <div class="gwc_c">
        <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table1">
                          <tr>
                            <td width="11%" class="title_l">收件人姓名</td>
                            <td width="41%" class="content_l"><?php echo $data['rec_name'] ?></td>
                            <td width="10%" class="title_l">收件人电话</td>
                            <td width="38%" class="content_l"><?php echo $data['rec_tel'] ?></td>
                          </tr>
                          <tr>
                            <td class="title_l">详细地址</td>
                            <td class="content_l"><a href="#"><?php echo $data['rec_address'] ?></a></td>
                            <td class="title_l">最佳配送时间</td>
                            <td class="content_l"><?php echo $data['rec_time'] ?></td>
                          </tr>                                    
                        </table>
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
                            <td width="10%">免费额度</td>
                            <td width="11%">小计</td>
                            <td width="13%">报价费用</td>
                          </tr>
                          <?php foreach ($data_ as $key => $value): ?>
                            <tr>
                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                            <td class="content_l"><a href="#"><?php echo $value['ex_name'] ?></a></td>
                            <td><a href="#"><?php echo $value['ex_content'] ?></td>
                            <td class="content redfont">￥1399 元</td>
                            <td>￥1399 元</td>
                            <td>￥1399 元</td>
                            <td><a href="#"><?php echo $value['ex_quote'] ?></td>
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
                            <td width="18%">手续费</td>
                          </tr> 
                          <?php foreach ($data_pay as $key => $value): ?>
                            <tr>
                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                            <td class="content_l"><a href="#"><?php echo $value['pay_name'] ?></a></td>
                            <td class="content_l"><?php echo $value['pay_content'] ?></td>
                            <td>￥<?php echo $value['pay_money'] ?>元</td>
                            </tr>
                          <?php endforeach ?>                                       
                        </table>
      </div>
    </div>  
    <div class="w_978 fl_l bor ma_t10">
      <div class="title">费用总计</div>
      <div class="gwc_c">
            <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" class="gwc_table">
      <tr>
        <td width="100%" class="te_r">商品总金额（不含运费）：<span class="redfont font_c_14">￥1399</span> 元 比市场价<span>￥1399 元</span>节省了<span>￥1399 元</span></td>
      </tr>
      <tr>
        <td class="te_r">商品总价：<span class="redfont font_c_14">￥1399</span> 元</td>
      </tr>
      <tr>
        <td class="te_r">应付款金额：<span class="redfont font_c_14">￥1399</span> 元</td>
      </tr>
    </table>
    <div class="te_m pa_t10"><img src="images/sub.gif" width="160" height="37" /></div>
      </div>
    </div> 
</div>