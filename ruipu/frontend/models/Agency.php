<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agency".
 *
 * @property integer $ag_id
 * @property string $ag_name
 * @property string $ag_img
 * @property string $ag_content
 * @property string $ag_addr
 * @property integer $ag_rid
 * @property string $ag_x
 * @property string $ag_y
 */
class Agency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ag_rid'], 'integer'],
            [['ag_name', 'ag_img', 'ag_content', 'ag_addr', 'ag_x', 'ag_y'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ag_id' => 'Ag ID',
            'ag_name' => 'Ag Name',
            'ag_img' => 'Ag Img',
            'ag_content' => 'Ag Content',
            'ag_addr' => 'Ag Addr',
            'ag_rid' => 'Ag Rid',
            'ag_x' => 'Ag X',
            'ag_y' => 'Ag Y',
        ];
    }

     /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        return $this->findBySql("SELECT * FROM agency")->asArray()->all();
    }
    
    /*
    * 赵思敏
    * 查询一条数据
    */

    public function selectone($ag_id=''){

        return $this->findBySql("SELECT * FROM agency where ag_id=$ag_id")->asArray()->one();
    }
}
