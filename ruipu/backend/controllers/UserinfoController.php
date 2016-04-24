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
	public $enableCsrfValidation = false;
	public function actionInfo()
	{
     // 	$sql = "select * from user where u_status='1'";
    	// $arr =\Yii::$app->db->createCommand($sql)->queryAll();
    	// print_r($arr);die;   
		$connection = \Yii::$app->db;
         if (empty($_GET['page'])) {
           $page = 1;
        }else{
            $page = $_GET['page'];
        }
        $pagesize = 2;
        $command = $connection->createCommand('SELECT COUNT(*) FROM user');   
        $postCount = $command->queryScalar();
        $countpage = ceil($postCount/$pagesize);
        $limit2 = ($page-1)*$pagesize;
        $command = $connection->createCommand("select * from user where u_status=1 order by u_id desc limit $limit2,$pagesize");
        $arr = $command->queryAll();
        return $this->render('info',['arr'=>$arr,'page'=>$page,'countpage'=>$countpage]);  	
     	// return $this->render('info',['arr'=>$arr]);
	}
	public function actionDelete()
	{
		$id = $_GET['id'];
        $info =\Yii::$app->db->createCommand()->update('user',['u_status'=>0],"u_id='$id'")->query();
		if($info)
		{
			echo "<script>location.href='index.php?r=userinfo/info'</script>";
		}else{
			echo "移除错误";
		}	
	}
	public function actionSave()
	{
		$id = $_GET['id'];
		// echo $id;
		$sql = "select * from user where u_id=$id";
		$arr = \Yii::$app->db->createCommand($sql)->queryAll();
		// print_r($arr);die;
		return $this->render('xiu',['arr'=>$arr]);
	}
	public function actionDoxiu()
	{
		// echo '111';
		$u_name = $_POST['u_name'];
		$u_id = $_POST['u_id'];
		$u_tel = $_POST['u_tel'];
		$u_sex = $_POST['u_sex'];
		$u_age = $_POST['u_age'];
		$u_height = $_POST['u_height'];
		$u_weight = $_POST['u_weight'];
		$u_email = $_POST['u_email'];
		$update = \Yii::$app->db->createCommand()->update('user',['u_name'=>$u_name,'u_tel'=>$u_tel,'u_sex'=>$u_sex,'u_age'=>$u_age,'u_height'=>$u_height,'u_email'=>$u_email],"u_id='$u_id'")->query();
		if($update)
		{
			echo "<script>location.href='index.php?r=userinfo/info'</script>";
		}else{
			echo '修改错误';
		}
	}
}