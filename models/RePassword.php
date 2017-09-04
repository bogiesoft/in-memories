<?php
namespace app\models;

use app\models\UserAuth;
use yii\base\Model;
use Yii;

/**
 */
class RePassword extends Model
{
    public $id;
    public $password;
    public $new_password;
    public $re_password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['new_password','re_password'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            ['new_password', 'string', 'min' => 8, 'max' => 18],
            
            ['re_password','compare','compareAttribute'=>'new_password', 'message' => 'กรุณากรอก password ให้ตรงกัน'],
            
            //['permission', 'required'],
            ['id', 'integer'],
        ];
    }

    /**
     */
    public function reset()
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
    public function resetByForget()
    {
        if ($this->validate()) {
            $user = UserAuth::findOne($this->id);
            $user->setPassword($this->new_password);
            $user->generateAuthKey();
            $user->generatePasswordResetToken();
            //$user->resetpw_r = null;
            //$user->resetpw_l = null;
            if ($user->update()) {
                return $user;
            }
        }

        return null;
    }
}
