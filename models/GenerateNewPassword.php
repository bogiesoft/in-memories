<?php
namespace app\models;

use app\models\UserModel;
use yii\base\Model;
use Yii;
use yii\helpers\Url;

/**
 */
class GenerateNewPassword extends Model
{
    public $username;
    public $has_error;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required', 'message' => 'Please insert Username or Email'],
        ];
    }

    /**
     */
    public function check()
    {
        if ($this->validate()) {
            $user = UserModel::find()->where(['username' => $this->username])->orWhere(['email' => $this->username])->one();
            if ($user) {
                if($this->sentMail($user)){
                    return true;
                }
                else{
                    $this->addError('username', 'ระบบผิดพลาด ไม่สามารถดำเนินการได้ โปรดลองใหม่ภายหลัง');
                }
            }
            else{
                $this->addError('username', 'ไม่พบข้อมูลของท่านในระบบ กรุณาตรวจสอบข้อมูลอีกครั้ง');
            }
        }

        return null;
    }
    public function genNewPass($user) {
        
        base64_decode();
        $new_pass = substr(Yii::$app->getSecurity()->generateRandomString(),10);
    }
    
    public function sentMail($user) {
        $from = 'noryply@inmemories.com';
        $email = $user->email;
        
        $head = 'in-memories : Password Reset';
        $body = $this->genBody($user);
        
        if($body){
            return Yii::$app->mailer
             ->compose()
             ->setFrom($from)
             ->setTo($email)
             ->setSubject($head)
             ->setHtmlBody($body)
             ->send();
        }
        return false;
    }
    
    public function genBody($user) {
        
        $random_r = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        $random_l = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        
        $username = base64_encode(base64_encode($user->username));
        $url = Url::home(true).'pwreset?u='.$username.'&amp;r='.$random_r.'&amp;l='.$random_l;
        
        $head = 'in-memories : Password Reset';
        $team = 'in-memories Team';
        
        $warning = 'If you did not notice or do not want to change your password. You can be released through or delete this email immediately.';
        
        
        $body = '<table style="background:#000;" border="0" cellpadding="0" cellspacing="0" width="700" id="m_-2603041818435827336templateBody">
                                    	<tbody><tr>
                                            <td valign="top" class="m_-2603041818435827336bodyContent">

                                                
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                    <tbody><tr>
                                                        <td valign="top">
                                                            <div style="color:#888;font-size:14px;font-family:Helvetica,Arial,sans-serif;line-height:150%;text-align:left;padding:0 10px">
                                                                <h1 style="font-size:30px;font-weight:100;font-family:Helvetica,Arial,sans-serif;color:#ffffff;padding:0 0 20px 0;line-height:30px">'.$head.'</h1>
                                                                Please click this link to reset your password or copy the following URL:
                                                                <br>
                                                                <br>
                                                                <a href="'.$url.'" style="color:#00ff00;text-decoration:none" target="_blank">'.$url.'</a>
                                                                <br>
                                                                <br>
                                                                    '.$warning.'
                                                                <br>
								<br>
                                                                Thank you,
                                                                <br>
                                                                <span id="m_-2603041818435827336signoff" style="color:#fff;font-size:16px">'.$team.'</span>
                                                                <br>
                                                                <br>
                                                            </div>
                                                            </td>
                                                    </tr>
                                                </tbody></table>
                                                

                                            </td>
                                        </tr>
                                    </tbody></table>';
        
        if($this->updateGenerateSecurity($user, $random_r, $random_l)){
            return $body;
        }
        return false;
    }
    
    public function updateGenerateSecurity($user, $r, $l) {
        $user->resetpw_r = $r;
        $user->resetpw_l = $l;
        if($user->save()){
            return true;
        }
        return false;
    }

    
    
}
