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
use app\models\Agency;

/*
 * About 关于我们
 */

class AboutController extends Controller
{
	public function actionAbout()
	{
    	$this -> layout = "header";
    	$model = new Product();
    	$data = $model -> selecteight();
    	$model_article = new Article();
    	$data_article = $model_article -> selectall();
        $model_agency = new Agency();
        $data_agency = $model_agency -> selectall();
    	return $this->render('about',['data'=>$data,'data_article'=>$data_article,'data_agency'=>$data_agency]);  			
	}

	public function actionIntro(){

		$this -> layout = "header";
    	$model = new Company();
    	$data = $model -> selectall();
    	return $this->render('intro',['data'=>$data]);
	}

    public function actionAgency(){

        $this->layout = "header";
        $model = new Agency();
        $ag_id = $_GET['ag_id'];
        $data = $model -> selectone($ag_id);
        return $this -> render('agency',['data'=>$data]);
    }

    public function actionDetails(){
        $this -> layout = "header";
        $model = new Product();
        $pro_id = $_GET['pro_id'];
        $data = $model -> selectone($pro_id);
        return $this -> render ('detail',['data'=>$data]);
    }
}