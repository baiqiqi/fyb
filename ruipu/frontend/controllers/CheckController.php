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
use app\models\Config;



/**
 * check controller
 */
class CheckController extends Controller
{
	/*
	*购物车
  * check 购物车界面显示
  * delete 购物车商品删除
  *购物车界面显示  check
  *购物车商品删除  delete
	*作者：程啊倩
	*时间：2016/04/18 9.10	
	*/

  public function actionAdd(){
     $pro_id=$_GET['pro_id'];
     $pro_name=$_GET['pro_name'];
     $pro_price=$_GET['pro_price'];
     $pro_img=$_GET['pro_img'];
     $number=$_GET['number'];
     $sqll="select * from shop where pro_id='$pro_id'";
     $db=\Yii::$app->db->createCommand($sqll)->queryOne();
     if ($db) {
       $number+=$db['shop_num'];
       $update="update shop set shop_num='$number' where pro_id='$pro_id'";
       $re=\Yii::$app->db->createCommand($update)->execute();
     }else{
       $sql="insert into shop(pro_id,shop_name,shop_price,shop_image,shop_num) values('$pro_id','$pro_name','$pro_price','$pro_img','$number')";
       $re=\Yii::$app->db->createCommand($sql)->execute();
     }
     if ($re) {
        echo "<script>alert('添加成功');location.href='index.php?r=check/check'</script>";
      }
  }

	public function actionCheck()
	{  
    	$this->layout="header";
    	$sql="select * from shop";
      $arr=\Yii::$app->db->createCommand($sql)->queryAll();
      $sum_money = 0;
      foreach ($arr as $k => $v) {
         $sum_money+=$v['shop_num']*$v['shop_price'];
      }
    	return $this->render('checkout',['arr'=>$arr,'sum_money'=>$sum_money]);  			
	}
  
    public function actionDelete(){
    	$shop_id=$_GET['shop_id'];
    	$delete="delete * from shop where shop_id='$shop_id'";
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
    $model = new Order();
    $data = $model -> add();
    $re = $model ->selectall();
    // $models = new Config();
    // $datas = $models -> selectall();
    if($data)
    return $this->render('send',['re'=>$re]);
  }
}