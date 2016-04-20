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
<<<<<<< HEAD
    
=======

>>>>>>> 48148b87d5dfa2e2f496555625b5cc2657db9f7c
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
     /*
      * @author 周晶晶
      * 添加收货地址
      * return string 添加结果
      * */
      public function address_insert(){
        $rec_name = $_GET['rec_name'];
        $rec_tel = $_GET['rec_tel'];
        $rec_address = $_GET['rec_address'];
        $is_moren = $_GET['is_moren'];
        $user_name = '张晨阳';
         $arr =(new \yii\db\Query())
             ->select('u_id')
             ->from('user as u')
             ->where("u.u_name = '$user_name'")
             ->one();
        $u_id=$arr['u_id'];
        if($is_moren==1){
            Yii::$app->db->createCommand("update receipt set is_moren=0 where u_id=$u_id")->execute();
        }
            $info = Yii::$app->db->createCommand()->batchInsert('receipt', ['rec_name', 'rec_tel', 'rec_address', 'is_moren', 'u_id'], [[$rec_name, $rec_tel, $rec_address, $is_moren, $u_id]])->execute();

            if ($info) {
                return '地址添加成功';
            } else {
                return '地址添加失败';
            }

      }
      /*
       * @author 周晶晶
       * 修改收货地址
       * return string 修改结果
       * */
       public  function address_edit(){
        

       }
}
