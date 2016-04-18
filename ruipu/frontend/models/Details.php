<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "details".
 *
 * @property integer $ord_id
 * @property integer $user_id
 * @property integer $pro_id
 * @property string $pro_name
 * @property string $pro_price
 * @property integer $pro_num
 */
class Details extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'pro_id', 'pro_name', 'pro_price', 'pro_num'], 'required'],
            [['user_id', 'pro_id', 'pro_num'], 'integer'],
            [['pro_price'], 'number'],
            [['pro_name'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ord_id' => 'Ord ID',
            'user_id' => 'User ID',
            'pro_id' => 'Pro ID',
            'pro_name' => 'Pro Name',
            'pro_price' => 'Pro Price',
            'pro_num' => 'Pro Num',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        $sql = "select * from details inner join user on details.user_id=user.u_id inner join product on details.pro_id=product.pro_id";
        return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();
        
    }
  

}
