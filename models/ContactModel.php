<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $other
 * @property string $subject
 * @property string $body
 * @property string $create_time
 * @property string $ip
 */
class ContactModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'other', 'subject', 'body', 'create_time', 'ip'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['body'], 'string'],
            [['create_time'], 'safe'],
            [['name', 'email', 'other', 'subject'], 'string', 'max' => 256],
            [['ip'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อ',
            'email' => 'อีเมล์',
            'other' => 'ข้อมูลอื่นๆ',
            'subject' => 'ชื่เรื่อง',
            'body' => 'ข้อความ',
            'create_time' => 'เมื่อ',
            'ip' => 'Ip',
        ];
    }
}