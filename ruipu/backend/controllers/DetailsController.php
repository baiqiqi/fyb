<?php
  /*
 *作者：程啊倩
 *时间：2016-4-20 14:00
 */
namespace backend\controllers;
use yii\web\Controller;

use app\models\Product;

use app\models\UploadForm;
use yii\web\UploadedFile;

use yii\data\Pagination;
/*
 * 详情管理显示页面 details
 * 添加方法 upload
 * 删除方法 delete
 * 2016-4-20 14:00
 */
class DetailsController extends Controller
{
    public $layout = false ; 
    public $enableCsrfValidation = false; 
    public function actionDetails(){
       $data = product::find();
       $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '3']);
       $model = $data->offset($pages->offset)->limit($pages->limit)->all();
       
       return $this->render('details',[
             'model' => $model,
             'pages' => $pages,
       ]);
    }

    public function actionUpload()
    {
        $model = new UploadForm();
        $m     = new Product();
       if (\Yii::$app->request->isPost) {
        $model->file = UploadedFile::getInstance($model,'file');
        if ($model->file && $model->validate()) {
            $model->file->saveAs('images/' . $model->file->baseName . '.' . $model->file->extension);
                $imgs = $_FILES['UploadForm']['name']['file'];
                $pro_img = './images/'.$imgs;
                // print_r($pro_img);die;
                $pro_name = $_POST['pro_name'];
                $pro_content = $_POST['pro_content'];
                $pro_price = $_POST['pro_price'];
                $pro_count = $_POST['pro_count'];
                $pro_sales = $_POST['pro_sales'];
                $arr = $m->add($pro_img,$pro_name,$pro_content,$pro_price,$pro_count,$pro_sales);
                if($arr){
                    echo "<script>alert('上传成功');location.href='index.php?r=details/details';</script>";
                }else{
                    echo "<script>alert('上传失败');location.href='index.php?r=details/add';</script>";
                }
        }
    }
        return $this->renderPartial('add',['model'=>$model]);
    }
    public function actionDelete(){ 
        $pro_id=$_GET['pro_id'];
        $sql="delete from product where pro_id='$pro_id'";
        $d=\Yii::$app->db->createCommand($sql)->execute();
        if($d){
            echo "<script>alert('删除成功');location.href='index.php?r=details/details';</script>";
        }
    }
}
?>