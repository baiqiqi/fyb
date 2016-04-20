<?php
namespace frontend\controllers;
/*
 *调用页面控制器
 *作者：张晨阳
 *时间：2016/04/13 14:04
 */
use app\models\Receipt;
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
		$model_receipt =new Receipt();
		$m = $_GET['m'];
		switch ($m) {
     		//个人主页
			case '' :$user_info = $model->user_center();
				
				return  $this->render('usercenter',['userinfo'=>$user_info]);
				break;
			//个人资料
			case 'personal_data' :
			    $personal_data = $model->personal_data();
			  
				return  $this->render('personaldata',['personal'=>$personal_data]);
			    break;
			//密码设置
			case 'personal_pwd': return $this->render('personalpwd');
			    break;
			//收货地址
			case 'get_address':
			    $address = $model_receipt->get_address();
			 
			    return $this->render('getaddress',['address'=>$address]);
			    break;
			//我的消息
			case 'personal_news' : return $this->render('personalnews') ;
			    break;
			//我的微留言
			case 'personal_words' : return $this->render('personalwords') ;
			    break;

		}

	}
    public  function actionPersonal_pwd_pro(){
      $model = new User();
      $info = $model->pwd_update();
      print_r($info);

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