<?php

namespace app\models;


use Yii;
use app\models\UserRole;

/**
 * This is the model class for table "user".
 *
 * @property integer $u_id
 * @property string $u_email
 * @property string $u_name
 * @property string $student_num
 * @property string $passwd
 * @property string $phone
 * @property integer $sex
 * @property string $id_card
 * @property integer $class_id
 * @property integer $group_id
 * @property string $tea_name
 * @property string $dir_name
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
            [['sex', 'class_id', 'group_id'], 'integer'],
            [['u_email'], 'string', 'max' => 50],
            [['u_name', 'tea_name', 'dir_name'], 'string', 'max' => 40],
            [['student_num', 'id_card'], 'string', 'max' => 20],
            [['passwd'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_email' => 'U Email',
            'u_name' => 'U Name',
            'student_num' => 'Student Num',
            'passwd' => 'Passwd',
            'phone' => 'Phone',
            'sex' => 'Sex',
            'id_card' => 'Id Card',
            'class_id' => 'Class ID',
            'group_id' => 'Group ID',
            'tea_name' => 'Tea Name',
            'dir_name' => 'Dir Name',
        ];
    }
    /*
     * @白琪琪
     * @登录
     * @return int
     */
    public function signin(){
        $uname = htmlspecialchars(Yii::$app->request->post('u_name'));
        $passwd = htmlspecialchars(md5((Yii::$app->request->post('passwd'))));
        if(strpos($uname,'@')){
            return $this->find()->asArray()
                ->select('*')
                //->join('INNER JOIN','user_role','user.u_id = user_role.u_id')
                //->join('INNER JOIN','role','user_role.r_id = role.r_id')
                ->where(['u_name'=>$uname,'u_pwd'=>$passwd])->one();
        }else{
            return $this->find()->asArray()
                ->select('*')
                //->join('INNER JOIN','user_role','user.u_id = user_role.u_id')
                //->join('INNER JOIN','role','user_role.r_id = role.r_id')
                ->where(['u_name'=>$uname,'u_pwd'=>$passwd])->one();
        }
    }

    public  function getUserRole(){
      return $this->hasMany(UserRole::className(), ['u_id' => 'u_id']);
    }
    public  function getRole(){
      return Role::find()->hasMany(Role::className(), ['r_id' => 'r_id']);
    }

}
