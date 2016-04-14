<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "class".
 *
 * @property integer $c_id
 * @property string $class_name
 */
class Classs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'class_name' => 'Class Name',
        ];
    }
}
