<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_feeling_comment".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_user_owner
 * @property integer $id_comment
 * @property integer $value
 * @property string $detail
 * @property string $create_time
 * @property integer $active
 */
class FeelingCommentModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_feeling_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_user_owner', 'id_comment', 'value', 'create_time', 'active'], 'required'],
            [['id_user', 'id_user_owner', 'id_comment', 'value', 'active'], 'integer'],
            [['create_time'], 'safe'],
            [['detail'], 'string', 'max' => 128],
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
            'id_comment' => 'Id Comment',
            'value' => 'Value',
            'detail' => 'Detail',
            'create_time' => 'Create Time',
            'active' => 'Active',
        ];
    }
}