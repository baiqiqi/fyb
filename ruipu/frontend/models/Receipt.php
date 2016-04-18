<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receipt".
 *
 * @property integer $rec_id
 * @property string $rec_name
 * @property string $rec_tel
 * @property string $rec_address
 * @property string $rec_time
 */
class Receipt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receipt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rec_name', 'rec_tel', 'rec_address', 'rec_time'], 'required'],
            [['rec_time'], 'safe'],
            [['rec_name'], 'string', 'max' => 11],
            [['rec_tel'], 'string', 'max' => 30],
            [['rec_address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rec_id' => 'Rec ID',
            'rec_name' => 'Rec Name',
            'rec_tel' => 'Rec Tel',
            'rec_address' => 'Rec Address',
            'rec_time' => 'Rec Time',
        ];
    }

    /*
    * 赵思敏
    * 根据用户id查询数据
    */

    public function selectall(){
        // return $this->findBySql("SELECT * FROM receipt")->asArray()->all();
        $sql = "select * from receipt inner join user on receipt.u_id=user.u_id ";
        return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();
    }
}
