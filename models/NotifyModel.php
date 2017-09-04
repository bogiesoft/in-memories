<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "db_notify".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_user_owner
 * @property integer $id_cat
 * @property integer $id_comment
 * @property integer $reply_comment
 * @property string $category
 * @property string $action
 * @property string $detail
 * @property string $url
 * @property string $create_time
 * @property integer $active
 */
class NotifyModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_notify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_user_owner', 'id_cat', 'category', 'url', 'action', 'create_time'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'id_user_owner', 'id_cat', 'active'], 'integer'],
            [['create_time'], 'safe'],
            [['category', 'detail'], 'string', 'max' => 128],
            [['action'], 'string', 'max' => 64],
            [['url'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_user_owner' => 'Id User Owner',
            'id_cat' => 'Id Cat',
            'category' => 'Category',
            'action' => 'Action',
            'detail' => 'Detail',
            'url' => 'URL',
            'create_time' => 'Create Time',
            'active' => 'Active',
        ];
    }
}