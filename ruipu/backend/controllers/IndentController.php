<?php
/*
 *调用页面控制器
 *作者：张晨阳 
 *英文名：Taeyang
 *绰号：帅到被人砍	
 *时间：2016/04/20 15:11
 */
namespace backend\controllers;
use yii\web\Controller;
use DB;
/*
 *show方法----调用显示页面
 */
class IndentController extends Controller
{
	public $layout = false ;  
	public function actionShow()
	{
     	$sql = "select * from details inner join product on details.pro_id = product.pro_id inner join user on details.user_id = user.u_id inner join express_type on details.det_price = express_type.ex_id";
    	$arr =\Yii::$app->db->createCommand($sql)->queryAll();
    	// print_r($arr);die;     	
     	return $this->render('show',['arr'=>$arr]);
	}
}