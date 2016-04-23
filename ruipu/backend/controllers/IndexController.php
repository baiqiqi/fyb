<?php
/*
 *@白琪琪
 *@2016-4-18 1：40
 */
namespace backend\controllers;
use yii\web\Controller;
use DB;
use CDbExpression;
use app\models\nav;
use yii\data\Pagination;
/*
 * @nav 导航栏管理显示页面
 * @Update_show 修改导航栏显示页面
 * @upda 修改导航
 * @backups 数据库备份 
 * @huanups 数据库恢复
 * @adds 导航添加
 * @add_sort 导航添加判断排序
 * @nav_del 导航删除
 * @白琪琪
 * @2016-4-18 1：50 
 */
class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout = false ;  //布局
    public function actionIndex(){
     return $this->render('//login/welcome');
    }
    public function actionNav(){
         $data = Nav::find();
       $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '5']);
       $model = $data->offset($pages->offset)->limit($pages->limit)->all();
       return $this->render('nav',[
             'nav' => $model,
             'pages' => $pages,
       ]);
  }
    public function actionUpdate_show(){
    	$id = $_GET["id"];
    	$sql = "select * from nav where nav_id='$id'";
    	$update_show = \Yii::$app->db->createCommand($sql)->queryAll();
    	return $this->render('update_show',['update_show'=>$update_show]);
    }
    public function actionUpda(){
    	$id = $_POST["nav_id"];
         $nav_name = $_POST['nav_name'];
        $nav_url = $_POST['nav_url'];
        $nav_sort = $_POST['nav_sort'];
        $update_nav = \Yii::$app->db->createCommand()->update('nav', 
        array(
           'nav_name'=>$nav_name,
           'nav_url'=>$nav_url,
           'nav_sort'=>$nav_sort,
            ),
            "nav_id=".$id
            )->query();
        if ($update_nav) {
            return $this->redirect("index.php?r=index/nav");
        }
        
    }
    public function actionBackups(){ 
        $cfg_dbuser='root';
        $cfg_dbpwd='root';
        $cfg_dbname='reap';
        date_default_timezone_set('PRC');
        // 设置SQL文件保存文件名
        $filename=date("Y-m-d_H-i-s")."-".$cfg_dbname.".sql"; 
        $tmpFile = (dirname(__FILE__))."\\".'back\\'.$filename;
        
        // 用MySQLDump命令导出数据库
        exec("mysqldump -u$cfg_dbuser -p$cfg_dbpwd --default-character-set=utf8 $cfg_dbname > ".$tmpFile);
        $file = fopen($tmpFile, "r"); // 打开文件
        fread($file,filesize($tmpFile));
        fclose($file);
        //将备份数据插入到bak.xml文件内
        $bak=(dirname(__FILE__))."\\".'back\\bak.xml';
        $current = file_get_contents($bak);
        $current .= "\n".$filename.','.$tmpFile;
        file_put_contents($bak, $current);
        $time = date("Y-m-d H:i:s");
        $sql = "insert into backups(name,url,time) values('$filename','$tmpFile','$time')";
        DB::insert($sql);
        echo "<script>alert('备份成功');location.href='reduction_list';</script>";
    }
    public function huanups(){
          $filename =$_GET['url'];
            //echo $filename;die;
            // $filename = substr($url,strrpos($url,"\\")+1);
            $cfg_dbuser='root';//用户名
            $cfg_dbpwd='root';//密码
            $cfg_dbname='reap';//数据库
            date_default_timezone_set('PRC');
            //还原时间
            $time=date("Y-m-d_H-i-s",time());
            
            // 获取当前页面文件路径，SQL文件就导出到此文件夹内
            $tmpFile = (dirname(__FILE__))."\\".'mysql\\'.$filename;
            // 用MySQLDump命令导入数据库
            exec("mysql -u$cfg_dbuser -p$cfg_dbpwd $cfg_dbname < ".$tmpFile);
                // echo "mysql -u$cfg_dbuser -p$cfg_dbpwd $cfg_dbname < ".$tmpFile;die;
            //将备份数据插入到huan.xml文件内
            $huan=(dirname(__FILE__))."\\".'huan\\huan.xml';
            $current = file_get_contents($huan);
            $current .= "\n".$time.','.$tmpFile;
            file_put_contents($huan, $current);
    }
    public function actionArtciles(){
        $sql = "select * from artcile";
        $artcile = \Yii::$app->db->createCommand($sql)->queryAll();
        return $this->render('artcile',['artcile'=>$artcile]);
    }
    public function actionNav_add(){
        return $this->render("nav_add");
    }
    public function actionAdd_sort(){
        $nav_sort=$_POST["nav_sort"];
        $sql = "select nav_sort from nav";
        $nav = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($nav as $key => $value) {
            $add_sort = $value;
        if (in_array($nav_sort, $add_sort)) {
            echo "存在";die;
        }else{
            echo "不存在";die;
        }
        }      
    }
    public function actionAdds(){
        $nav = new Nav();
        $nav->nav_name = $_POST["nav_name"];
        $nav->nav_url = $_POST["nav_url"];
        $nav->nav_status = $_POST["nav_status"];
        $nav->nav_sort = $_POST["nav_sort"];
        if($nav->save()){ 
           return $this->redirect("index.php?r=index/nav");
        }else{ 
            echo "添加失败"; 
        }
    }
    public function actionNav_del(){
        $id = $_GET["id"];
        $nav_del= Nav::findOne($id)->delete();
        if ($nav_del) {
            return $this->redirect("index.php?r=index/nav");
        }else{
            return $this->redirect("index.php?r=index/nav");
        }
    }
}
?> 