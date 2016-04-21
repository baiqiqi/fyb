<?php
/*
 *调用页面控制器
 *作者：张晨阳 
 *英文名：Taeyang
 *绰号：帅到被人砍	
 *时间：2016/04/20 19:04
 */
namespace backend\controllers;
use yii\web\Controller;
use DB;
/*
 *show方法----调用显示页面
 */
class DoctorController extends Controller
{
	public $layout = false ;
	public $enableCsrfValidation = false;  
	public function actionDinfo()
	{
     	$sql = "select * from doctor where doc_status='1'";
    	$arr =\Yii::$app->db->createCommand($sql)->queryAll();
    	// print_r($arr);die;  
     	return $this->render('dinfo',['arr'=>$arr]);
	}
	public function actionDelete()
	{
		$id = $_GET['id'];
        $info =\Yii::$app->db->createCommand()->update('doctor',['doc_status'=>0],"doc_id='$id'")->query();
		if($info)
		{
			echo "<script>location.href='index.php?r=doctor/dinfo'</script>";
		}else{
			echo "移除错误";
		}	
	}
	public function actionSave()
	{
		$id = $_GET['id'];
		// echo $id;
		$sql = "select * from doctor where doc_id=$id";
		$arr = \Yii::$app->db->createCommand($sql)->queryAll();
		// print_r($arr);die;
		return $this->render('xiu',['arr'=>$arr]);
	}
	public function actionDoxiu()
	{
		// echo '111';
		$doc_name = $_POST['doc_name'];
		$id = $_POST['doc_id'];
		$doc_tel = $_POST['doc_tel'];
		$doc_sex = $_POST['doc_sex'];
		$doc_age = $_POST['doc_age'];
		$doc_age = $_POST['doc_education'];
		$u_email = $_POST['u_email'];
		$update = \Yii::$app->db->createCommand()->update('doctor',['doc_name'=>$doc_name,'doc_tel'=>$doc_tel,'doc_sex'=>$doc_sex,'doc_age'=>$doc_age,'u_email'=>$u_email],"doc_id='$id'")->query();
		if($update)
		{
			echo "<script>location.href='index.php?r=doctor/dinfo'</script>";
		}else{
			echo '修改错误';
		}
	}
}