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
     	$sql = "select * from details inner join product on details.pro_id = product.pro_id inner join user on details.user_id = user.u_id inner join express_type on details.det_price = express_type.ex_id where det_status='1'";
    	$arr =\Yii::$app->db->createCommand($sql)->queryAll();  	
     	return $this->render('show',['arr'=>$arr]);
	}
	public function actionDelete()
	{
        $id = $_GET['id'];
        $info =\Yii::$app->db->createCommand()->update('details',['det_status'=>0],"ord_id='$id'")->query();
        echo "<script>alert('移除成功');location.href='index.php?r=indent/show';</script>"; 
	}
	public function actionSave()
	{
     	$id = $_GET['id'];
     	$sql = "select * from details inner join product on details.pro_id = product.pro_id inner join user on details.user_id = user.u_id inner join express_type on details.det_price = express_type.ex_id where ord_id=$id";
    	$arr =\Yii::$app->db->createCommand($sql)->queryOne();
    	print_r($arr);die;  
		return $this->render('xiu',['arr'=>$arr]);
	}
}