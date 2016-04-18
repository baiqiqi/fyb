<?php
namespace frontend\controllers;
/*
 *调用页面控制器
 *作者：赵思敏
 *时间：2016/04/18 
*/
use app\models\User;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\yii2_alipay\Alipaypay;

use app\models\Details;
use app\models\ExpressType;
use app\models\Order;
use app\models\PayType;
use app\models\Receipt;



/**
 * check controller
 */
class CheckController extends Controller
{
	public function actionCheck()
	{  
    	$this->layout="header";
    	return $this->render('checkout');  			
	}

	/*
	*核对订单页面
	*作者：赵思敏
	*时间：2016/04/18 
	*/

	public function actionPay(){
		$this->layout="header";
		$model = new Receipt();
		$data = $model -> selectall();
		// print_r($data);die;
		$model_express = new ExpressType();
		$data_express = $model_express -> selectall();
		$model_pay = new PayType();
		$data_pay = $model_pay -> selectall();
		$model_details = new Details();
		$data_details = $model_details ->selectall();
		// print_r($data_details);die;
		return $this->render('pay',['data'=>$data,'data_express'=>$data_express,'data_pay'=>$data_pay,'data_details'=>$data_details]);
	}
    
    /*
	*支付后
	*作者：赵思敏
	*时间：2016/04/18 
	*/

	public function actionPay_hou(){
		$this->layout="header";
		return $this->render('pay_hou');
	}
	
	/**
     * 生成充值跳转链接
     * @return string
     * 赵思敏
     */
	public $enableCsrfValidation = false;

    public function actionAlipay()
    {

        $order_id = '200000001' . time();
        $gift_name = 'aaa';
        $money = 0.01;
        $body = 'aaa';
        $show_url = 'http://www.phpman.cn';
        $alipay = new AlipayPay();
        // var_dump($alipay);die;
        $html = $alipay->requestPay($order_id, $gift_name, $money, $body, $show_url);
        // var_dump($html);
        echo $html;
    }

    /**
     * @var String 服务器异步通知页面路径
     * 赵思敏
     * 需http://格式的完整路径，不能加?id=123这类自定义参数
     */
    public function actionNotify_call()
    {

        $alipay = new AlipayPay();
        $verify_result = $alipay->verifyNotify();
        if ($verify_result) {//验证成功
            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];
            //支付宝交易号
            $trade_no = $_POST['trade_no'];
            //交易状态
            $trade_status = $_POST['trade_status'];

            //记录支付宝回调数据
            $alipay_log = array();
            $alipay_log['subject'] = $_POST['subject'];
            $alipay_log['trade_no'] = $trade_no;
            $alipay_log['buyer_email'] = $_POST['buyer_email'];
            $alipay_log['gmt_create'] = $_POST['gmt_create'];
            $alipay_log['out_trade_no'] = $out_trade_no;
            $alipay_log['notify_time'] = $_POST['notify_time'];
            $alipay_log['trade_status'] = $trade_status;


            /* $this->vip_recharge_model->addAlipayLog($alipay_log);

              if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
              //取该订单信息
              $order_info = $this->vip_recharge_model->getOrder($out_trade_no);
              if (!$order_info) {
              //未找到该订单？
              }
              //判断该笔订单是否在商户网站中已经做过处理
              $order_status = $order_info['status'];
              if ($order_status == 0) {
              //完成订单
              $this->vip_recharge_model->changeOrderStatus($out_trade_no, ORDER_SUCCESS);
              } else {
              //已处理过的订单 不做处理
              }
              } */

            //返回状态
            echo "success";
        } else {
            //验证失败
            echo "fail";
        }
    }


    /**
     * @var String 页面跳转同步通知页面路径
     * 赵思敏
     * 需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
     */
    public function actionReturn_call()
    {
        //判断结果，跳转到不同页面
        $success = $_GET['trade_status'];
        $out_trade_no = $_GET['out_trade_no'];
        if ($success == 'TRADE_SUCCESS') {
            echo 'ok';
        } else {
            echo 'no';
        }
    }

}