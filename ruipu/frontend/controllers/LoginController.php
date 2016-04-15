<?php
namespace frontend\controllers;
/*
 *调用页面控制器
 *作者：张晨阳 
 *英文名：Taeyang
 *绰号：帅到被人砍
 *时间：2016/04/14 19:08
 */
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

class LoginController extends Controller
{
	/*
	 *调用注册页面
	 */
	public function actionSignin()
	{
		$this->layout=false;
		return $this->render('index'); 
	}

	/*
	 *调用登录页面
	 */
	public function actionLogin()
	{
		$this->layout=false;
		return $this->render('index'); 
	}
}


?>