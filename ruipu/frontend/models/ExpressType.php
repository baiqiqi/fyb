<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "express_type".
 *
 * @property integer $ex_id
 * @property string $ex_name
 * @property string $ex_price
 * @property string $ex_content
 * @property string $ex_quote
 */
class ExpressType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'express_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ex_price'], 'number'],
            [['ex_name', 'ex_content', 'ex_quote'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ex_id' => 'Ex ID',
            'ex_name' => 'Ex Name',
            'ex_price' => 'Ex Price',
            'ex_content' => 'Ex Content',
            'ex_quote' => 'Ex Quote',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        return $this->findBySql("SELECT * FROM express_type")->asArray()->all();
    }
}
