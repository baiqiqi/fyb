<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $com_id
 * @property string $com_name
 * @property string $com_content
 * @property string $com_addr
 * @property string $com_img
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_name'], 'string', 'max' => 100],
            [['com_content'], 'string', 'max' => 500],
            [['com_addr', 'com_img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'com_id' => 'Com ID',
            'com_name' => 'Com Name',
            'com_content' => 'Com Content',
            'com_addr' => 'Com Addr',
            'com_img' => 'Com Img',
        ];
    }


    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        return $this->findBySql("SELECT * FROM company")->asArray()->all();
    }

}
