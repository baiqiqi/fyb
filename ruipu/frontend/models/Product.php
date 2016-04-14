<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $pro_id
 * @property integer $pro_tid
 * @property string $pro_name
 * @property string $pro_content
 * @property string $pro_price
 * @property string $pro_img
 * @property string $pro_count
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_tid'], 'integer'],
            [['pro_price'], 'number'],
            [['pro_name'], 'string', 'max' => 100],
            [['pro_content'], 'string', 'max' => 255],
            [['pro_img', 'pro_count'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'pro_tid' => 'Pro Tid',
            'pro_name' => 'Pro Name',
            'pro_content' => 'Pro Content',
            'pro_price' => 'Pro Price',
            'pro_img' => 'Pro Img',
            'pro_count' => 'Pro Count',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        return $this->findBySql("SELECT * FROM product")->asArray()->all();
    }
}
