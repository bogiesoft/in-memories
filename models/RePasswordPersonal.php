<?php
namespace app\models;

use app\models\UserAuth;
//use app\models\UserModel;
use yii\base\Model;
use Yii;

/**
 */
class RePasswordPersonal extends Model
{
    public $id;
    public $old_password;
    public $new_password;
    public $re_password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['old_password','new_password','re_password'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            ['new_password', 'string', 'min' => 6],
            
            ['re_password','compare','compareAttribute'=>'new_password'],
            
            ['old_password', 'validateCompare'],
            ['id', 'integer'],
        ];
    }

    /**
     */
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'old_password' => 'Password เดิม',
            'new_password' => 'Password ใหม่',
            're_password' => 'ยืนยัน Password ใหม่',
        ];
    }
    public function checkOld()
    {
        if ($this->validate()) {
            $user = UserAuth::findOne($this->id);
            $user->setPassword($this->new_password);
            $user->generateAuthKey();
            $user->generatePasswordResetToken();

            if ($user->update()) {
                return $user;
            }
        }

        return null;
    }
    public function validateCompare($attribute, $params){
        $user = UserAuth::findOne($this->id);
        if(!$user->validatePassword($this->old_password)){
            $this->addError($attribute, 'ท่านกรอก Password เดิมไม่ถูกต้อง');
        }
    }

    
    
}
