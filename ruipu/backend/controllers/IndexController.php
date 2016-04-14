<?php

namespace backend\controllers;
use yii\web\Controller;

class IndexController extends Controller
{
    public $layout = false ;  //布局

    public function actionIndex(){
     return $this->render('index');
    }


}
?>