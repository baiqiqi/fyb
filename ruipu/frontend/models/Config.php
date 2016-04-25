<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property integer $id
 * @property string $eMail
 * @property string $payId
 * @property string $payKey
 * @property string $retUrl
 * @property integer $ord_id
 * @property string $sign
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ord_id'], 'integer'],
            [['eMail', 'payKey', 'retUrl', 'sign'], 'string', 'max' => 255],
            [['payId'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'eMail' => 'E Mail',
            'payId' => 'Pay ID',
            'payKey' => 'Pay Key',
            'retUrl' => 'Ret Url',
            'ord_id' => 'Ord ID',
            'sign' => 'Sign',
        ];
    }
    /*
    *
    *zsm查询数据
    */
    public function selectall(){
        $sql="SELECT * FROM config INNER JOIN order on config.ord_id=order.ord_id";
        return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();
    }
}
