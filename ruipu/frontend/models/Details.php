<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "details".
 *
 * @property integer $ord_id
 * @property integer $user_id
 * @property integer $pro_id
 * @property string $pro_price
 * @property integer $pro_num
 * @property string $det_numbur
 * @property string $det_time
 * @property string $det_status
 * @property integer $det_eid
 */
class Details extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'pro_id', 'pro_num'], 'integer'],
            [['det_price'], 'number'],
            [['pro_price'], 'number'],
            [['det_time'], 'safe'],
            [['det_numbur'], 'string', 'max' => 255],
            [['det_status'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ord_id' => 'Ord ID',
            'user_id' => 'User ID',
            'pro_id' => 'Pro ID',
            'pro_price' => 'Pro Price',
            'pro_num' => 'Pro Num',
            'det_numbur' => 'Det Numbur',
            'det_time' => 'Det Time',
            'det_status' => 'Det Status',
            'det_price' => 'Det Price',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        $sql = "select * from details inner join user on details.user_id=user.u_id inner join product on details.pro_id=product.pro_id";
        return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();
    }
    
    /*
    * 赵思敏
    * 添加数据
    */

    public function add(){

        $request=Yii::$app->request;
        if ($_POST) {
            $pro_id=$request->post("pro_id");
            $pro_num=$request->post("pro_num");
            $user_id = $request->post('user_id');
            $det_price=$request->post("det_price");
            $pro_price=$request->post("pro_price");
            $det_numbur=$request->post("det_numbur");
            $det_time=$request->post(date('y-m-d h:i:s',time()));
            $res = Yii::$app->db->createCommand()->insert('details',['pro_id'=>$pro_id,'pro_num'=>$pro_num,'user_id'=>$user_id,'det_price'=>$det_price,'pro_price'=>$pro_price,'det_numbur'=>$det_numbur,'det_time'=>$det_time])->query();
            return $res;
        }
     }
}
