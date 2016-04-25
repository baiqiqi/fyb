<?php
    include 'config.php';
    $d3PayOrderId = $_REQUEST["d3PayOrderId"]; //第三方支付大师返回的订单号
	$orderId = $_REQUEST["orderId"]; //商户订单号
	$realMoney = $_REQUEST["realMoney"]; //支付金额
	$payStatus = $_REQUEST["payStatus"]; //支付状态 1 成功 其他失败
	$sign = $_REQUEST["sign"]; //签名
	
if ($payStatus==1){//支付成功
	$signstr=$d3PayOrderId . '&' . $orderid . '&' . $realMoney . '&' . $payStatus . '&' . $payKey;//签名原串
	if ($sign==strtoupper(md5($signstr))){
		//你的业务处理，注意查重，避免重复增加服务
		
		}
}
echo "success";//接收到通知，最后必须返回success，此处不要修改

?>