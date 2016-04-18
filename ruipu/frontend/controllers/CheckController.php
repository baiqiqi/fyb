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



/**
 * check controller
 */
class CheckController extends Controller
{
	/*
	*购物车
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
	*支付
	*作者：赵思敏
	*时间：2016/04/18 
	*/

	public function actionPay(){
		$this->layout="header";
		return $this->render('pay');
	}
    
    /*
	*支付
	*作者：赵思敏
	*时间：2016/04/18 
	*/
	
	public function actionPay_hou(){
		$this->layout="header";
		return $this->render('pay_hou');
	}

}