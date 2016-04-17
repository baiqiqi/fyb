<link rel="stylesheet" type="text/css" href="indexs/css/base.css"/>
<link rel="stylesheet" type="text/css" href="indexs/css/shopDetails.css"/>
<link rel="stylesheet" href="indexs/css/jquery-zoom.css" />
<script type="text/javascript" src="indexs/js/jquery.min.js"></script>
<script type="text/javascript" src="indexs/js/common.js"></script>
<script type="text/javascript" src="indexs/js/shopDetails.js" ></script>
<body>
<div>
<div id="bigView" style="display:none;"><img width="800" height="800" alt="" src="" /></div>
<div class="main">
<div class="shop_details">    
<div class="fl shop_msg">
<div class="detail_top">
<div class="goods_detail_left " style="margin-right:0px;">
<div class="preview">
<div id="vertical" class="bigImg">
<img src="<?php echo $data['pro_img'] ?>" alt="" id="midimg" />
<div style="display:none;" id="winSelector"></div>
</div>
</div>    
</div>                      
<form action="javascript:addToCart(371)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
<div class="goods_detail_right" style="margin-left:28px;_margin-left:18px;">    
<input type="hidden" id="goods_id" value="371" />
<p class="wy font18" style="font-weight: 700;font-style: normal;"><strong><?php echo $data['pro_name'] ?></strong></p><br>
<span class="clo9 wy font12">简单介绍：</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="wy font13" ><?php echo $data['pro_content'] ?></span>            
</div>
</form>
</div>           
</div>
</div>
</div>      
<div id="shopbox" class="shopbox">
<script type="text/javascript" src="indexs/js/jquery-zoom.js" ></script>
</div>