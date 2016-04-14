<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "node".
 *
 * @property integer $n_id
 * @property string $n_name
 * @property string $node
 * @property integer $pid
 * @property integer $sort_id
 */
class Node extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'sort_id'], 'integer'],
            [['n_name'], 'string', 'max' => 40],
            [['node'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'n_id' => 'N ID',
            'n_name' => 'N Name',
            'node' => 'Node',
            'pid' => 'Pid',
            'sort_id' => 'Sort ID',
        ];
    }










}
