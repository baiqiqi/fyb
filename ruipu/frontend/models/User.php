<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $u_id
 * @property string $u_name
 * @property string $u_pwd
 * @property string $u_img
 * @property string $u_tel
 * @property string $u_sex
 * @property string $u_age
 * @property double $u_height
 * @property double $u_weight
 * @property string $u_email
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_name', 'u_pwd'], 'required'],
            [['u_height', 'u_weight'], 'number'],
            [['u_name', 'u_email'], 'string', 'max' => 100],
            [['u_pwd'], 'string', 'max' => 32],
            [['u_img'], 'string', 'max' => 200],
            [['u_tel'], 'string', 'max' => 11],
            [['u_sex'], 'string', 'max' => 2],
            [['u_age'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_name' => 'U Name',
            'u_pwd' => 'U Pwd',
            'u_img' => 'U Img',
            'u_tel' => 'U Tel',
            'u_sex' => 'U Sex',
            'u_age' => 'U Age',
            'u_height' => 'U Height',
            'u_weight' => 'U Weight',
            'u_email' => 'U Email',
        ];
    }


    /*
     * @author 周晶晶
     * 用户中心 user_center
     * */
    public  function  user_center(){
        $user_name = Yii::$app->session->get('uname');
        $arr =(new \yii\db\Query())
            ->select('*')
            ->from('user as u')
            ->innerJoin("exercise as ex","u.u_id=ex.u_id")
            ->innerJoin("doctor as doc","ex.d_id=doc.doc_id")
            ->where("u.u_name = '$user_name'")
            ->one();
        return $arr;
    }
    /*
     * @author 周晶晶
     * 个人资料 personal_data
     * */
    public  function personal_data(){
        $user_name = Yii::$app->session->get('uname');
        $arr =(new \yii\db\Query())
            ->select('*')
            ->from('user as u')

            ->where("u.u_name = '$user_name'")
            ->one();
        return $arr;
    }
    /*
     * @author 周晶晶
     * 修改密码
     * */
    public function pwd_update(){
        $old_pwd = md5($_GET['old_pwd']);
        $new_pwd = md5($_GET['new_pwd']);
        $user_name = Yii::$app->session->get('uname');
        $arr = $this->find()->where("u_name = '$user_name'")->asArray()->one();
        if($old_pwd == $arr['u_pwd']){
            $info = Yii::$app->db->createCommand("update user set u_pwd= '$new_pwd' where u_name = '$user_name'")->execute();
            if($info){
                return "密码设置成功";
            }else{
                return '密码设置失败';
            }
        }else{
            return "原密码填写错误" ;
        }

    }



}
