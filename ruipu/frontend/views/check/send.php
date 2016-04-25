
// include('../views/check/config.php'); 


// $orderId = date("YmdHis");
// $orderId .= rand(1000,2000);

// $orderId=$_REQUEST["orderId"];
// $payMode=$_REQUEST["payMode"];
// $money=$_REQUEST["money"];
// $param1='test1';
// $param2='test2';
// $signstr='eMail='.$eMail.'&payId='.$payId.'&payKey='.$payKey.'&orderId='.$orderId.'&payMode='.$payMode.'&retUrl='.$retUrl.'&money='.$money;

// $sign=strtoupper(md5($signstr));





<form name="form1" action="http://api.d3pay.net:99/d3payservice.dll/pay" method="post">
  <?php foreach ($re as $key => $value): ?>
  <input type="hidden" name="eMail" value="<?php echo $value['eMail'] ?>">
  <input type="hidden" name="payMode" value="<?php echo $value['pay_name'] ?>">
  <input type="hidden" name="orderId" value="<?php echo $value['ord_number'] ?>">
  <input type="hidden" name="money" value="<?php echo $value['ord_price'] ?>">
  <input type="hidden" name="retUrl" value="<?php echo $value['retUrl'] ?>">
  <input type="hidden" name="sign" value="<?php echo $value['sign'] ?>">
  <?php endforeach ?>
</form>
<script>document.forms['form1'].submit();</script>