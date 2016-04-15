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

	/*
	 *执行注册
	 */
	public $enableCsrfValidation = false;
	public function actionDosignin()
	{

		$session = Yii::$app->session;
		$session->open();

		if(empty($_GET['token'])){
			$email = $_POST['email'];
			$username = $_POST['username'];
			$pwd = $_POST['pwd'];
			$string = $username.'-'.$pwd;

			$session['token'] = $string;
			$lock_str = $this->encode($string);
			$content = "http://www.zcy.com/fyb/ruipu/frontend/web/index.php?r=login/dosignin&token=$lock_str";

	        $contacts = '这就是个测试';
	        $mail= Yii::$app->mailer->compose();
	        $mail->setTo($email);
	        $mail->setSubject('阳哥帅到被人砍');
	        $mail->setTextBody('zheshisha ');
	        $mail->setHtmlBody($content);    
	        $res = $mail->send();
	        if($res) {
	            echo "<script>alert('请去您输入的邮箱确认验证')</script>";
	        } else {
	            var_dump($res);
	        }
			$doctor = $_POST['doctor'];
			$user = $_POST['user'];
			if($doctor == 1) $table = 'doctor';
			if($user == 1) $table = 'user';
			echo $table;
		}else{
			$token = $_GET['token'];
			$str = $this->decode($token);
			echo $language = $session->get('token');
			if($str == $session['token']){
				echo $str.'--验证成功';	

			}

		}


	}


	function encode($string = '', $skey = 'cxphp') {
    $strArr = str_split(base64_encode($string));
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key < $strCount && $strArr[$key].=$value;
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}

function decode($string = '', $skey = 'cxphp') {
    $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key <= $strCount  && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
    return base64_decode(join('', $strArr));
}



}


?>