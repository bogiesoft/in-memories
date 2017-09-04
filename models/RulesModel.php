<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_rules".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $content
 */
class RulesModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_rules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'content'], 'required'],
            [['content'], 'string'],
            [['type'], 'string', 'max' => 128],
            [['name'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'content' => 'Content',
        ];
    }
}