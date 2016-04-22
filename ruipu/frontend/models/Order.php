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
 * @property integer $u_id
 * @property integer $pro_id
 * @property string $ord_sum
 * @property string $ex_price
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
            [['ord_time', 'ord_price', 'ord_status', 'pay_id', 'ord_accept', 'ord_goods', 'u_id'], 'required'],
            [['ord_time'], 'safe'],
            [['ord_price'], 'number'],
            [['pay_id', 'u_id', 'pro_id'], 'integer'],
            [['ord_status', 'ord_accept', 'ord_goods', 'ord_number', 'ord_sum'], 'string', 'max' => 255],
            [['ex_price'], 'string', 'max' => 11]
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
            'u_id' => 'U ID',
            'pro_id' => 'Pro ID',
            'ord_sum' => 'Ord Sum',
            'ex_price' => 'Ex Price',
        ];
    }
        /*
    * 赵思敏
    * 查询表中所有数据
    */
     public function selectall(){

        $sql = "SELECT * FROM `order` INNER JOIN `user` ON `order`.u_id=`user`.u_id INNER JOIN product ON `order`.pro_id=product.pro_id";
        return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();
    }
    
    /*
    * 赵思敏
    * 添加数据
    */

    public function add(){

        $request=Yii::$app->request;
        if ($request->ispost) {
            $pro_id=$request->post("pro_id");
            $ord_sum=$request->post("ord_sum");
            $u_id = $request->post('u_id');
            $ex_price=$request->post("ex_price");
            $ord_price=$request->post("ord_price");          
            $ord_time=date('y-m-d h:i:s',time()); 
            $ord_number = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

            $res = Yii::$app->db->createCommand()->insert('order',['pro_id'=>$pro_id,'ord_sum'=>$ord_sum,'u_id'=>$u_id,'ex_price'=>$ex_price,'ord_price'=>$ord_price,'ord_time'=>$ord_time,'ord_number'=>$ord_number])->query();
            return $res;
        }
     }

     // public function selectnum(){
     //    // $ord_number=$_GET['ord_number'];
     //    $sql="SELECT * FROM order WHERE ord_number ='$ord_number'";
     //    return  $info = \Yii::$app -> db -> createCommand($sql)->queryAll();

          
     // }
}
