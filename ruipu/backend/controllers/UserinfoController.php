<?php
/*
 *调用页面控制器
 *作者：张晨阳 
 *英文名：Taeyang
 *绰号：帅到被人砍	
 *时间：2016/04/20 18:18
 */
namespace backend\controllers;
use yii\web\Controller;
use DB;
/*
 *show方法----调用显示页面
 */
class UserinfoController extends Controller
{
	public $layout = false ;  
	public function actionInfo()
	{
     	$sql = "select * from user";
    	$arr =\Yii::$app->db->createCommand($sql)->queryAll();
    	// print_r($arr);die;     	
     	return $this->render('info',['arr'=>$arr]);
	}
}