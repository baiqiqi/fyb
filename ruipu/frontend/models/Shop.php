<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $shop_id
 * @property integer $pro_id
 * @property integer $user_id
 * @property string $shop_name
 * @property string $shop_image
 * @property string $shop_price
 * @property integer $shop_num
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
            [['pro_id', 'user_id', 'shop_name', 'shop_image', 'shop_price', 'shop_num'], 'required'],
            [['pro_id', 'user_id', 'shop_num'], 'integer'],
            [['shop_price'], 'number'],
            [['shop_name'], 'string', 'max' => 20],
            [['shop_image'], 'string', 'max' => 60]
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
            'shop_name' => 'Shop Name',
            'shop_image' => 'Shop Image',
            'shop_price' => 'Shop Price',
            'shop_num' => 'Shop Num',
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
