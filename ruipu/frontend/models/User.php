<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $u_id
 * @property string $u_name
 * @property string $u_pwd
 * @property string $u_img
 * @property string $u_tel
 * @property string $u_sex
 * @property string $u_age
 * @property double $u_height
 * @property double $u_weight
 * @property string $u_email
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_name', 'u_pwd'], 'required'],
            [['u_height', 'u_weight'], 'number'],
            [['u_name', 'u_email'], 'string', 'max' => 100],
            [['u_pwd'], 'string', 'max' => 32],
            [['u_img'], 'string', 'max' => 200],
            [['u_tel'], 'string', 'max' => 11],
            [['u_sex'], 'string', 'max' => 2],
            [['u_age'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_name' => 'U Name',
            'u_pwd' => 'U Pwd',
            'u_img' => 'U Img',
            'u_tel' => 'U Tel',
            'u_sex' => 'U Sex',
            'u_age' => 'U Age',
            'u_height' => 'U Height',
            'u_weight' => 'U Weight',
            'u_email' => 'U Email',
        ];
    }
}
