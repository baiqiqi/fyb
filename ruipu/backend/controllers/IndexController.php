<?php
/*
 *@白琪琪
 *@2016-4-18 1：40
 */
namespace backend\controllers;
use yii\web\Controller;
use DB;
use mysqli;

/*
 * nav 导航栏管理显示页面
 * Update_show 修改导航栏显示页面
 * update 修改导航
 * 白琪琪
 * 2016-4-18 1：50 
 */
class IndexController extends Controller
{
    public $layout = false ;  //布局
    public function actionIndex(){
     return $this->render('//login/welcome');
    }
    public function actionNav(){
    	$sql="select * from nav";
    	$nav=\Yii::$app->db->createCommand($sql)->queryAll();
    	return $this->render('nav',['nav'=>$nav]);  		
    }
    public function actionUpdate_show(){
    	$id = $_GET["id"];
    	$sql = "select * from nav where nav_id='$id'";
    	$update_show = \Yii::$app->db->createCommand($sql)->queryAll();
    	return $this->render('update_show',['update_show'=>$update_show]);
    }
    public function actionUpda(){
    	$id = $_POST["nav_id"];
    	//$arr = $_POST;
        print_r($_POST);die;
        return $this->render('index');
    }
    public function actionBackups(){ 
       
    }
}
?>