<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $shop_id
 * @property integer $pro_id
 * @property integer $user_id
 * @property string $pro_name
 * @property string $pro_image
 * @property string $pro_price
 * @property integer $pro_num
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_id', 'user_id', 'pro_name', 'pro_image', 'pro_price', 'pro_num'], 'required'],
            [['pro_id', 'user_id', 'pro_num'], 'integer'],
            [['pro_price'], 'number'],
            [['pro_name'], 'string', 'max' => 20],
            [['pro_image'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shop_id' => 'Shop ID',
            'pro_id' => 'Pro ID',
            'user_id' => 'User ID',
            'pro_name' => 'Pro Name',
            'pro_image' => 'Pro Image',
            'pro_price' => 'Pro Price',
            'pro_num' => 'Pro Num',
        ];
    }

    /*
    * 赵思敏
    * 根据用户id查询数据
    */

    public function selectall(){
        $sql = "SELECT * FROM shop INNER JOIN user ON shop.user_id=user.u_id INNER JOIN product ON shop.pro_id=product.pro_id";
        return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();
    }    
}
