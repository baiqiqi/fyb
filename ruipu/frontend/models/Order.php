<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $ord_id
 * @property string $ord_time
 * @property string $ord_price
 * @property string $ord_status
 * @property integer $pay_id
 * @property string $ord_accept
 * @property string $ord_goods
 * @property string $ord_number
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ord_time', 'ord_price', 'ord_status', 'pay_id', 'ord_accept', 'ord_goods'], 'required'],
            [['ord_time'], 'safe'],
            [['ord_price'], 'number'],
            [['pay_id'], 'integer'],
            [['ord_status', 'ord_accept', 'ord_goods', 'ord_number'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ord_id' => 'Ord ID',
            'ord_time' => 'Ord Time',
            'ord_price' => 'Ord Price',
            'ord_status' => 'Ord Status',
            'pay_id' => 'Pay ID',
            'ord_accept' => 'Ord Accept',
            'ord_goods' => 'Ord Goods',
            'ord_number' => 'Ord Number',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        return $this->find()->asArray()->all();
    }
}
