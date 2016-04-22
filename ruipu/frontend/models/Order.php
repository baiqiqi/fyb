<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $ord_id
 * @property string $ord_time
 * @property string $ord_price
 * @property string $ord_status
 * @property integer $pay_id
 * @property string $ord_accept
 * @property string $ord_goods
 * @property string $ord_number
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ord_time', 'ord_price', 'ord_status', 'pay_id', 'ord_accept', 'ord_goods'], 'required'],
            [['ord_time'], 'safe'],
            [['ord_price'], 'number'],
            [['pay_id'], 'integer'],
            [['ord_status', 'ord_accept', 'ord_goods', 'ord_number'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ord_id' => 'Ord ID',
            'ord_time' => 'Ord Time',
            'ord_price' => 'Ord Price',
            'ord_status' => 'Ord Status',
            'pay_id' => 'Pay ID',
            'ord_accept' => 'Ord Accept',
            'ord_goods' => 'Ord Goods',
            'ord_number' => 'Ord Number',
        ];
    }

    /*
    * 赵思敏
    * 查询表中所有数据
    */

    public function selectall(){

        $sql = "SELECT * FROM order INNER JOIN user ON order.u_id=user.u_id INNER JOIN product ON order.pro_id=product.pro_id INNER JOIN pay_type ON order.pay_id=pay_type.pay_id inner join express_type ON order.ord_eid=express_type.ex_id";
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
            $res = Yii::$app->db->createCommand()->insert('order',['pro_id'=>$pro_id,'pro_num'=>$pro_num,'user_id'=>$user_id,'det_price'=>$det_price,'pro_price'=>$pro_price,'det_numbur'=>$det_numbur,'det_time'=>$det_time])->query();
            return $res;
        }
     }
}
