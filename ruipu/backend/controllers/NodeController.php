<?php

namespace backend\controllers;
use app\models\Node;
use Yii;
use yii\web\Controller;
use yii\rbac\Permission;

/*
 *NodeController 权限控制
 *
 * */
class NodeController extends Controller
{

    /*
     * 权限添加
     * param Object $model_node
     *
     * */
    public function actionCreate()
    {
        $model_node = new Node();
        if ($model_node->load(Yii::$app->request->post()) && $model_node->validate())
         {

        }
    }

    /*
    *权限修改
    * param string $node_id 修改的权限id
    * param Object $model_node 跟添加一样提交上来的数据
    */
    public function actionEdit(){
        $model_node = new Node();
    }

    /*
     * 权限删除
     * $
     * param string $node_id 删除的权限id
     * */
    public  function  actionDelete(){
       $model_node = new Node();

    }





}





?>