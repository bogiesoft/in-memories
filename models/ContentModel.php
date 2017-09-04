<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_content".
 *
 * @property integer $id_content
 * @property string $type
 * @property string $name
 * @property string $content
 * @property integer $active
 */
class ContentModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'content', 'active'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['active'], 'integer'],
            [['type', 'name'], 'string', 'max' => 128],
            [['content'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_content' => 'Id Content',
            'type' => 'Type',
            'name' => 'Name',
            'content' => 'Content',
            'active' => 'Active',
        ];
    }
}