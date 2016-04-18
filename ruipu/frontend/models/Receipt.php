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
 * @property integer $u_id
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
            [['rec_name', 'rec_tel', 'rec_address', 'rec_time', 'u_id'], 'required'],
            [['rec_time'], 'safe'],
            [['u_id'], 'integer'],
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
            'u_id' => 'U ID',
        ];
    }

    /*
    * 赵思敏
    * 根据用户id查询数据
    */

    public function selectall(){
        $sql = "select * from receipt inner join user on receipt.u_id=user.u_id ";
        return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();
    }            
    }
    /*
     *获取用户的收货地址
     * */
     public function get_address(){
      $user_name = '张晨阳';
      $arr =(new \yii\db\Query())
             ->select('u_id')
             ->from('user as u')
             ->where("u.u_name = '$user_name'")
             ->one();
      $u_id=$arr['u_id'];
      return $this->find()->where("u_id = $u_id")->orderBy(['is_moren'=>SORT_DESC])->asArray()->all();
     }
}
