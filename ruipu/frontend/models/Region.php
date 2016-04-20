<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property integer $region_id
 * @property integer $parent_id
 * @property string $region_name
 * @property integer $region_type
 * @property integer $agency_id
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'region_type', 'agency_id'], 'integer'],
            [['region_name'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_id' => 'Region ID',
            'parent_id' => 'Parent ID',
            'region_name' => 'Region Name',
            'region_type' => 'Region Type',
            'agency_id' => 'Agency ID',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){
        return $this->findBySql("SELECT * FROM region")->asArray()->all();
    }
    /*
     * @author 周晶晶
     * 获取地区列表
     * */
     public function address_country(){
        $arr = $this->find()->where("parent_id =0")->asArray()->all();
        return $arr;
     }
     /*
      *@author 周晶晶
      * 获取城市信息
      * */
    public function addr_ajax(){
      $p_name = $_GET['v'];
      $arr1 = $this->find()->where("region_name='$p_name'")->asArray()->one();
      $p_id = $arr1['region_id'];
      $arr = $this->find()->where("parent_id = $p_id")->asArray()->all();
      return $arr;
    }
}
