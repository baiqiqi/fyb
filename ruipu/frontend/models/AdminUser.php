<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin_user".
 *
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $admin_pwd
 * @property string $admin_tel
 * @property string $admin_email
 */
class AdminUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_name', 'admin_pwd', 'admin_tel', 'admin_email'], 'required'],
            [['admin_name'], 'string', 'max' => 50],
            [['admin_pwd'], 'string', 'max' => 32],
            [['admin_tel'], 'string', 'max' => 11],
            [['admin_email'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'Admin ID',
            'admin_name' => 'Admin Name',
            'admin_pwd' => 'Admin Pwd',
            'admin_tel' => 'Admin Tel',
            'admin_email' => 'Admin Email',
        ];
    }
}
