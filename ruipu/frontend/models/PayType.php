<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_type".
 *
 * @property integer $pay_id
 * @property string $pay_name
 * @property string $pay_money
 * @property string $pay_content
 */
class PayType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_name'], 'string', 'max' => 100],
            [['pay_money', 'pay_content'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pay_id' => 'Pay ID',
            'pay_name' => 'Pay Name',
            'pay_money' => 'Pay Money',
            'pay_content' => 'Pay Content',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        return $this->findBySql("SELECT * FROM pay_type")->asArray()->all();
    }
}
