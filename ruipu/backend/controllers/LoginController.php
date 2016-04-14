<?php

namespace backend\controllers;
use app\models\Node;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\User;

class LoginController extends Controller
{
    public $layout = 'top';
    public $enableCsrfValidation = false;

    /*
     * @arthurdou
     * @登录界面
     */
    public function actionIndex(){
        return $this->render('welcome');
     /*   $model = new User();
        $ip = $_SERVER['REMOTE_ADDR'];
        if(Yii::$app->session->get($ip)){
            return $this->redirect(Url::toRoute('login/welcome'));
        }
        if(Yii::$app->request->post()){
            $user_arr = $model->signin();
            if($user_arr){
                Yii::$app->session->set($ip,$user_arr);

             return $this->redirect(Url::toRoute('login/welcome'));
            }else{
               return $this->renderPartial('index',['login_error'=>'账户或密码错误！！']);
            }
        }else{
            return $this->renderPartial('index');
        }*/
    }

    /*
     * @arthurdou
     * @欢迎界面
     */

    public function actionWelcome(){
        $ip = $_SERVER['REMOTE_ADDR'];
        if(Yii::$app->session->get($ip)){
            $data['hostname'] = gethostbyaddr($_SERVER['REMOTE_ADDR']); //当前计算机名
            $data['port'] = $_SERVER['SERVER_PORT'];  //当前的服务器端口号
            $data['hostip'] = $_SERVER['HTTP_HOST'];     //当前服务器的ip
            $data['hostinfo'] = $_SERVER ['SERVER_SOFTWARE'];  //当前服务器版本信息
            $data['systemname'] = PHP_OS;   //当前系统名称
            $data['filepath'] =  __FILE__;  //当前文件存在的额路径
            date_default_timezone_set('PRC');
            $data['time'] = date("Y-m-d h:i:s");   //当前服务器的时间
            return $this->render('welcome',$data);
        }
        return $this->renderPartial('index');
    }

    /*
     * @arthurdou
     * @logout
     */

    public function actionLogout(){
        Yii::$app->session->removeAll();
        return $this->redirect(Url::toRoute('login/index'));
    }

}
?>
