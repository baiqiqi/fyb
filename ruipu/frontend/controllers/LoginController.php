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
use app\models\User;
use app\models\Doctor;

/*
 *signin方法：调用注册页面
 *login方法：调用登录页面
 *dosiginin方法：处理注册信息
 *encode方法：对称加密---加密
 *docode方法：对称加密---解密
 */
class LoginController extends Controller
{

	public function actionSignin()
	{
		$this->layout=false;
		return $this->render('index'); 
	}

	public function actionLogin()
	{
		$this->layout=false;
		return $this->render('login'); 
	}

	public $enableCsrfValidation = false;
	public function actionDosignin()
	{

			$session = Yii::$app->session;
			$session->open();
			if(empty($_GET['token'])){
			$email = $_POST['email'];
			$username = $_POST['username'];
			$pwd = $_POST['pwd'];
			$doctor = $_POST['doctor'];
			$user = $_POST['user'];
			$email = $_POST['email'];
			if($doctor == 1) $table = 'doctor';
			if($user == 1) $table = 'user';
			$string = $username.'-'.$pwd.'-'.$table.'-'.$email;
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

			echo $table;
		}else{
			$token = $_GET['token'];
			$str = $this->decode($token);
			$language = $session->get('token');
			$arr = explode('-',$language);
			$username = $arr['0'];
			$pwd = $arr['1'];
			$pwds = md5($pwd);
			$table = $arr['2'];
			$email = $arr['3'];
			$arr = array('select', 'insert', 'delete', 'update');
			for($i=0;$i<count($arr);$i++){
				$username = str_replace($arr[$i],'',$username);
				$pwds = str_replace($arr[$i],'',$pwds);
			}
			$brr = array('alert');
			$uname = $username;
			$password = $pwds;
			for($i=0;$i<count($brr);$i++){
				$uname = str_replace($arr[$i],'',$uname);
				$password = str_replace($arr[$i],'',$password);
			}
			if($str == $session['token']){
				if($table == 'user')
				{
					$sql = "insert into user(u_name,u_pwd,u_email) value('$uname','$password','$email')";
					$info =\Yii::$app->db->createCommand($sql)->execute();
			     	if($info)
			     	{
			     		echo '验证成功';
			     	}

				}else{
					$sql = "insert into doctor(doc_name,doc_pwd,doc_email) value('$uname','$password','$email')";
					$infos =\Yii::$app->db->createCommand($sql)->execute();
					if($infos){
						echo '验证成功';
					}
				}
				
				

			}

		}


	}
	public function actionCheckoutemail()
	{
			$email = $_GET['email'];
			$table = $_GET['table'];
			$sql = "select * from $table where u_email='$email'";
			$info =\Yii::$app->db->createCommand($sql)->queryOne();
			if($info){
				echo '1';
			}else{
				echo '0';
			}


	}

	public function encode($string = '', $skey = 'cxphp')
	{
		    
		    $strArr = str_split(base64_encode($string));
		    $strCount = count($strArr);
		    foreach (str_split($skey) as $key => $value)
		        $key < $strCount && $strArr[$key].=$value;
		    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
	}

	public function decode($string = '', $skey = 'cxphp')
	{
		    
		    $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
		    $strCount = count($strArr);
		    foreach (str_split($skey) as $key => $value)
		        $key <= $strCount  && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
		    return base64_decode(join('', $strArr));
	}
	public function actionDologin()
	{
			
			$session = Yii::$app->session;
			$session->open();	
			$doctor = $_POST['doctor'];
			$user = $_POST['user'];
			$username = $_POST['username'];
			$pwd = $_POST['pwd'];
			$pwds = md5($pwd);
			$arr = array('select', 'insert', 'delete', 'update');
			for ($i = 0; $i < count($arr); $i++) {
				$username = str_replace($arr[$i], ' ', $username);
				$pwds = str_replace($arr[$i], ' ', $pwds);
			}
			$uname = $username;
			$password = $pwds;
			$brr = array('alert');
			for ($i = 0; $i < count($brr); $i++) {
				$uname = str_replace($brr[$i], ' ', $uname);
				$password = str_replace($brr[$i], ' ', $password);
			}
			if($doctor == 1) $table = 'doctor';
			if($user == 1) $table = 'user';
			if($table == 'doctor'){
				$sql = "select * from doctor where doc_name='$uname' and doc_pwd='$password'";
			    $info =\Yii::$app->db->createCommand($sql)->queryOne();
		    if($info){
		    	header("location:index.php?r=index/index");
				$session['uname'] = $uname;	    	
		    }else{
				echo "<script>alert('您的用户名或密码有误');location.href='index.php?r=login/login';</script>";
		    }
			}else{
		    $sql = "select * from user where u_name='$uname' and u_pwd='$password'";
		    $infos =\Yii::$app->db->createCommand($sql)->queryOne();	
		    if($infos){
		    	header("location:index.php?r=index/index");
		    	$session['uname'] = $uname;
		    }else{
		    	echo "<script>alert('您的用户名或密码有误');location.href='index.php?r=login/login';</script>";
		    }
		}
	}
	public function actionBack()
	{
		$session = Yii::$app->session;
		$session->open();		
		$session->destroy();
		header("location:index.php?r=login/login");
	}



}


?>