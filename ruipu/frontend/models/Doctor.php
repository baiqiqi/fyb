<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $doc_id
 * @property string $doc_name
 * @property string $doc_pwd
 * @property string $doc_img
 * @property string $doc_tel
 * @property string $doc_sex
 * @property string $doc_age
 * @property integer $doc_sid
 * @property string $doc_education
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_name', 'doc_pwd', 'doc_img', 'doc_tel', 'doc_age', 'doc_sid', 'doc_education'], 'required'],
            [['doc_sid'], 'integer'],
            [['doc_name'], 'string', 'max' => 100],
            [['doc_pwd'], 'string', 'max' => 32],
            [['doc_img', 'doc_education'], 'string', 'max' => 255],
            [['doc_tel'], 'string', 'max' => 11],
            [['doc_sex'], 'string', 'max' => 2],
            [['doc_age'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_id' => 'Doc ID',
            'doc_name' => 'Doc Name',
            'doc_pwd' => 'Doc Pwd',
            'doc_img' => 'Doc Img',
            'doc_tel' => 'Doc Tel',
            'doc_sex' => 'Doc Sex',
            'doc_age' => 'Doc Age',
            'doc_sid' => 'Doc Sid',
            'doc_education' => 'Doc Education',
        ];
    }
    public function insert($username,$pwd)
    {
        $sql = "insert into doctor('doc_id','doc_name','doc_pwd') value(0,$username,$pwd)";
        return $sql;
        // print_r($sql);die;
        $info =\Yii::$app->db->createCommand($sql)->execute();
        return $info;       
    }
}
