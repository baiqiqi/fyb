<?php
namespace frontend\controllers;
/*
 *关于我们
 *作者：赵思敏
 *时间：2016/04/14
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
use app\models\Product;
use app\models\Company;
use app\models\Article;




class AboutController extends Controller
{
	public function actionAbout()
	{
    	$this->layout="header";
    	$model = new Product();
    	$data = $model -> selectall();
    	$model_article = new Article();
    	$data_article = $model_article -> selectall();
    	// print_r($data);die;
    	return $this->render('about',['data'=>$data,'data_article'=>$data_article]);  			
	}

	public function actionIntro(){

		$this->layout="header";
    	$model = new Company();
    	$data = $model -> selectall();
    	// print_r($data);die;
    	return $this->render('intro',['data'=>$data]);
	}
}