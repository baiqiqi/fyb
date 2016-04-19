<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_type".
 *
 * @property integer $t_id
 * @property string $t_type
 */
class ProductType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'T ID',
            't_type' => 'T Type',
        ];
    }

    /*
    * 赵思敏
    * 查询所有数据
    */

    public function selectall(){

        return $this->findBySql("SELECT * FROM product_type")->asArray()->all();
    }
}
