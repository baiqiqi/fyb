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
	public function actionIndex()
	{
    	$this->layout="header";
    	return $this->render('index');  			
	}
	//用户中心
	public  function actionUser_center(){
		$this->layout="header";
		$model = new User();
		$user_info = $model->user_center();
		//print_r($user_info);die;
		return  $this->render('usercenter',['userinfo'=>$user_info]);
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
	public function actionAbout()
	{
    	$this->layout="header";
    	return $this->render('about');  			
	}
}