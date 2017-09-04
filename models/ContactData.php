<?php

namespace app\models;

use Yii;
use yii\base\Model;


class ContactData extends Model
{
    public $email;
    public $phone_1;
    public $phone_2;
    public $address;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            //[['name', 'email', 'subject', 'body'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            ['email', 'email'],
            [['phone_1','phone_2'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 512],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'phone_1' => 'Phone 1',
            'phone_2' => 'Phone 2',
            'address' => 'Address',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
