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
use app\models\Shop;



/**
 * check controller
 */
class CheckController extends Controller
{
	/*
	*购物车
  *购物车界面显示  check
  *购物车商品删除  delete
	*作者：程啊倩
	*时间：2016/04/18 9.10	
	*/
	public function actionCheck()
	{  
    	$this->layout="header";
    	$pro_id=$_GET['pro_id'];
    	$sql="select * from product where pro_id='$pro_id'";
    	$arr=\Yii::$app->db->createCommand($sql)->queryOne();
    	return $this->render('checkout',['arr'=>$arr]);  			
	}
    public function actionDelete(){
    	$pro_id=$_GET['pro_id'];
    	$delete="delete * from product where pro_id='$pro_id'";
    	if ($delete) {
    		echo "<script>alert('删除成功');location.href='index.php?r=index/index'</script>";
    	}
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
		$model_express = new ExpressType();
		$data_express = $model_express -> selectall();
		$model_pay = new PayType();
		$data_pay = $model_pay -> selectall();
		$model_shop = new Shop();
		$data_shop = $model_shop ->selectall();
		// print_r($data_shop);die;
		return $this->render('pay',['data'=>$data,'data_express'=>$data_express,'data_pay'=>$data_pay,'data_shop'=>$data_shop]);
	}
    
    /*
	*支付后
	*作者：赵思敏
	*时间：2016/04/18 
	*/
    public $enableCsrfValidation = false;
	public function actionAlipay(){
		$this->layout="header";
		$model = new Details();
		$data = $model -> add();
		// print_r($data);die;
		return $this->render('alipayapi');
	}

}