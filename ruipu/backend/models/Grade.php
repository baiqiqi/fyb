<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property integer $grade_id
 * @property double $grade
 * @property integer $u_id
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grade'], 'number'],
            [['u_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grade_id' => 'Grade ID',
            'grade' => 'Grade',
            'u_id' => 'U ID',
        ];
    }
}
