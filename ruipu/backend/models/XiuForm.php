<?php
namespace app\models;

use yii\base\Model;
use yii\web\XiuFile;

/**
* XiuForm is the model behind the upload form.
*/
class XiuForm extends Model
{
    /**
    * @var XiuedFile file attribute
    */
    public $file;

    /**
    * @return array the validation rules.
    */
    public function rules()
    {
        return [
            [['file'],'file'],
        ];
    }
}