<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role_node".
 *
 * @property integer $r_id
 * @property integer $n_id
 */
class RoleNode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['r_id', 'n_id'], 'required'],
            [['r_id', 'n_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'r_id' => 'R ID',
            'n_id' => 'N ID',
        ];
    }
}
