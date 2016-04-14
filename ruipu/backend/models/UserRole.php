<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property integer $u_id
 * @property integer $r_id
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'r_id'], 'required'],
            [['u_id', 'r_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'r_id' => 'R ID',
        ];
    }
}
