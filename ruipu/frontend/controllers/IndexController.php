<?php
namespace frontend\controllers;
/*
 *调用页面控制器
 *作者：张晨阳
 *时间：2016/04/13 14:04
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
 * Site controller
 */
class IndexController extends Controller
{
	/*
	*首页循环显示
	*作者：程啊倩
	*时间：2016/4/14  14:40
	*/
	public function actionIndex()
	{  
    	$this->layout="header";
    	$sql="select * from product";
    	$arr=\Yii::$app->db->createCommand($sql)->queryAll();
    	$sql1="select * from product limit 0,3";
    	$row=\Yii::$app->db->createCommand($sql1)->queryAll();
    	return $this->render('index',['arr'=>$arr,'row'=>$row]);  			
	}
	/*
	*详情显示
	*作者：程啊倩
	*时间：2016/4/14  16:16
	*/
	public function actionDetails(){
		$this->layout="header";
		$pro_id=$_GET['pro_id'];
    	$sql="select * from product where pro_id='$pro_id'";
    	$arr=\Yii::$app->db->createCommand($sql)->queryOne();
    	return $this->render('details',['arr'=>$arr]); 
	}
	//用户中心
	public  function actionUser_center(){
		$this->layout="header";
		$model = new User();
		$m = $_GET['m'];
		switch ($m) {
			case '' :$user_info = $model->user_center();
				//print_r($user_info);die;
				return  $this->render('usercenter',['userinfo'=>$user_info]);
				break;
			case 'personal_data' :
			    $personal_data = $model->personal_data();
			    //print_r($personal_data);
				return  $this->render('personaldata',['personal'=>$personal_data]);
			    break;



		}

	}


	public function actionContact()
	{
    	$this->layout="header";
    	return $this->render('contact');  			
	}
	public function actionProducts()
	{
    	$this->layout="header";
    	return $this->render('products');  			
	}
	public function actionSale()
	{
    	$this->layout="header";
    	return $this->render('sale');  			
	}

	
}