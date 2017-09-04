<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_url".
 *
 * @property integer $id
 * @property string $realpath
 * @property string $url
 * @property string $pagetitle
 * @property string $keywords
 * @property string $description
 * @property integer $editable
 */
class UrlModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['realpath', 'url'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['realpath', 'url', 'pagetitle', 'keywords', 'description'], 'string'],
            [['editable'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'realpath' => 'URL เดิม',
            'url' => 'URL ที่ต้องการ',
            'pagetitle' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'editable' => 'Editable',
        ];
    }
}