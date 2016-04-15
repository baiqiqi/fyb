<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $art_id
 * @property string $art_name

 * @property string $art_content
 * @property string $art_time
 * @property string $art_status
 * @property integer $typ_id
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['art_name', 'art_content', 'art_time', 'art_status', 'typ_id'], 'required'],
            [['art_time'], 'safe'],
            [['typ_id'], 'integer'],
            [['art_name'], 'string', 'max' => 11],

            [['art_title', 'art_content'], 'string', 'max' => 255],


            [['art_status'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'art_id' => 'Art ID',
            'art_name' => 'Art Name',

            'art_title' => 'Art Title',

            'art_content' => 'Art Content',
            'art_time' => 'Art Time',
            'art_status' => 'Art Status',
            'typ_id' => 'Typ ID',
        ];
    }


    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        return $this->findBySql("SELECT * FROM article")->asArray()->all();
    }

}
