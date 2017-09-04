<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_log_zeny".
 *
 * @property integer $id_log_zeny
 * @property integer $id_user
 * @property string $text
 * @property double $zeny
 * @property string $update_time
 */
class LogZenyModel extends \yii\db\ActiveRecord
{
    public $count;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_log_zeny';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'text', 'zeny', 'update_time', 'status'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user'], 'integer'],
            [['text'], 'string'],
            [['zeny'], 'number'],
            [['update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log_zeny' => 'Id Log Zeny',
            'id_user' => 'Id User',
            'text' => 'Text',
            'zeny' => 'Zeny',
            'update_time' => 'Update Time',
            'status' => 'status',
        ];
    }
}