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
 * @property string $pro_sales
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
            [['pro_content', 'pro_sales'], 'string', 'max' => 255],
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
            'pro_sales' => 'Pro Sales',
        ];
    }
    /*
    * 添加数据 add
    * 程啊倩  15.20
    */
    public function add($pro_img,$pro_name,$pro_content,$pro_price,$pro_count,$pro_sales){
        $sql="insert into product(pro_img,pro_name,pro_content,pro_price,pro_count,pro_sales) values('$pro_img','$pro_name','$pro_content','$pro_price','$pro_count','$pro_sales')";
        return $d=\Yii::$app->db->createCommand($sql)->execute();
    }

     /*
    * 修改数据 updates
    * 程啊倩  10.30
    */
     public function updates($pro_id,$pro_img,$pro_name,$pro_content,$pro_price,$pro_count,$pro_sales){
        $sql="update product set pro_img='$pro_img',pro_name='$pro_name',pro_content='$pro_content',pro_price='$pro_price',pro_count='$pro_count',pro_sales='$pro_sales' where pro_id='$pro_id'";
        return $d=\Yii::$app->db->createCommand($sql)->execute();
     }
     public function selectone($pro_id=''){
        $sql="select * from product where pro_id='$pro_id'";
        return $d=\Yii::$app->db->createCommand($sql)->queryOne();
     }
}
