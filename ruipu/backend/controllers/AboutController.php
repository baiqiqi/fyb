<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\AddFile;

use app\models\Agency;
use app\models\UploadForm;
use app\models\AddForm;






class AboutController extends Controller
{
	/**
	* 作者：赵思敏
	* 代理列表展示
	*/
	public function actionAgency(){

		$model_agency = new Agency();
		$data = $model_agency ->selectall();
        $data = Agency::find();
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

    	return $this->renderPartial('agency',['model' => $model,'pages' => $pages]);
	}

    /**
	 * 作者：赵思敏
	 * 代理添加
	*/

	public function actionAdd()
    {

        $model = new AddForm();
        $m     = new Agency();

       if (Yii::$app->request->isPost) {

        $model->file = AddFile::getInstance($model,'file');

        if ($model->file && $model->validate()) {

            $model->file->saveAs('images/' . $model->file->baseName . '.' . $model->file->extension);

                $imgs = $_FILES['AddForm']['name']['file'];
                $ag_img = './images/'.$imgs;
                $ag_name = $_POST['ag_name'];
                $ag_content = $_POST['ag_content'];
                $ag_addr = $_POST['ag_addr'];
                $ag_x = $_POST['ag_x'];
                $ag_y = $_POST['ag_y'];
                $arr = $m->add($ag_name,$ag_img,$ag_content,$ag_addr,$ag_x,$ag_y);

                if($arr){

                    echo "<script>alert('上传成功');location.href='index.php?r=about/agency';</script>";

                }else{

                    echo "<script>alert('上传失败');location.href='index.php?r=about/add';</script>";
                }

        }
    }
        return $this->renderPartial('agency_add',['model'=>$model]);
    }

    /**
	 * 作者：赵思敏
	 * 代理修改
	*/

	public function actionUpload(){

		$model = new UploadForm();
        $m     = new Agency();

        $ag_id = $_GET['ag_id'];
        $data  = $m -> selectone($ag_id);

       if (Yii::$app->request->isPost) {

        $model->file = UploadedFile::getInstance($model,'file');

        if ($model->file && $model->validate()) {

            $model->file->saveAs('images/' . $model->file->baseName . '.' . $model->file->extension);

                $imgs = $_FILES['UploadForm']['name']['file'];
                $ag_img = './images/'.$imgs;
                $ag_id  = $_GET['ag_id'];
                $ag_name = $_POST['ag_name'];
                $ag_content = $_POST['ag_content'];
                $ag_addr = $_POST['ag_addr'];
                $ag_x = $_POST['ag_x'];
                $ag_y = $_POST['ag_y'];
                $arr = $m->upload($ag_id,$ag_name,$ag_img,$ag_content,$ag_addr,$ag_x,$ag_y);

                if($arr){

                    echo "<script>alert('修改成功');location.href='index.php?r=about/agency';</script>";

                }else{

                    echo "<script>alert('修改失败');location.href='index.php?r=about/agency';</script>";
                }

        }
    }
		return $this->renderPartial('agency_exit',['model'=>$model,'data'=>$data]);
	}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
	/**
	 * 作者：赵思敏
	 * 代理删除
	*/

	public function actionDeletes(){
      
      $model = new Agency();

      $ag_id = $_GET['ag_id'];

      $data = $model -> deletes($ag_id);

      if($data){
      	echo "<script>alert('删除成功');location.href='index.php?r=about/agency';</script>";
      }else{
      	echo "<script>alert('删除失败');location.href='index.php?r=about/agency';</script>";	
      }

	}

    /**
     * 作者：赵思敏
     * 代理搜索
    */
    public $enableCsrfValidation = false;
    public function actionSearch(){
        $model = new Agency();
        $data = $model ->search();

        return $this->renderPartial('search',['data' => $data]);
    }
}