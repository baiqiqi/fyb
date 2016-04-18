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
	public function actionCheck()
	{  
    	$this->layout="header";
    	return $this->render('checkout');  			
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

}