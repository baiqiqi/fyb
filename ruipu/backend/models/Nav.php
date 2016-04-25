<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nav".
 *
 * @property integer $nav_id
 * @property string $nav_name
 * @property string $nav_url
 * @property string $nav_status
 * @property string $nav_sort
 */
class Nav extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nav';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nav_name', 'nav_url', 'nav_status', 'nav_sort'], 'required'],
            [['nav_name', 'nav_status', 'nav_sort'], 'string', 'max' => 11],
            [['nav_url'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nav_id' => 'Nav ID',
            'nav_name' => 'Nav Name',
            'nav_url' => 'Nav Url',
            'nav_status' => 'Nav Status',
            'nav_sort' => 'Nav Sort',
        ];
    }
}
