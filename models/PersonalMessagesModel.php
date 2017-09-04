<?php

namespace app\models;

use Yii;
use app\models\UserModel;

/**
 * This is the model class for table "db_personal_messages".
 *
 * @property integer $id
 * @property integer $id_user_from
 * @property integer $id_user_to
 * @property string $title
 * @property string $detail
 * @property string $create_time
 * @property integer $read
 * @property integer $show_sent
 * @property integer $delete
 */
class PersonalMessagesModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public  $username;


    public static function tableName()
    {
        return 'db_personal_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user_from', 'id_user_to', 'title', 'detail', 'create_time'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            //['username', 'required', 'on' => 'sent', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user_from', 'id_user_to', 'read', 'show_sent', 'delete'], 'integer'],
            [['detail'], 'string'],
            [['create_time'], 'safe'],
            [['title'], 'string', 'max' => 256],
            [['username'], 'checkIsUser'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user_from' => 'จาก',
            'id_user_to' => 'ถึง',
            'title' => 'เรื่อง',
            'detail' => 'ข้อความ',
            'create_time' => 'ส่งเมื่อ',
            'read' => 'อ่าน',
            'username' => 'ถึง',
            'show_sent' => 'show_sent',
            'delete' => 'delete',
            
        ];
    }
    
    public function checkIsUser($attribute, $params){
        $model = UserModel::getUserByName($this->username);
        if(!$model){
            $this->addError($attribute, 'ไม่พบข้อมูลของ User ที่ท่านต้องการส่งข้อความ');
        }
    }

}