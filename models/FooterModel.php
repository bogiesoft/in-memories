<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_footer".
 *
 * @property integer $id_footer
 * @property string $type
 * @property string $title
 * @property string $detail_1
 * @property string $detail_2
 * @property string $detail_3
 * @property string $url
 * @property integer $status
 * @property integer $id_parent
 */
class FooterModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_footer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'detail_1', 'active', 'sorting'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['active', 'sorting'], 'integer'],
            [['detail_1'], 'string'],
            [['type', 'title'], 'string', 'max' => 128],
            [['detail_2', 'detail_3'], 'string', 'max' => 512],
            [['url'], 'string', 'max' => 256]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_footer' => 'Id Footer',
            'type' => 'Type',
            'title' => 'Title',
            'detail_1' => 'Detail 1',
            'detail_2' => 'Detail 2',
            'detail_3' => 'Detail 3',
            'url' => 'Url',
            'active' => 'active',
            'sorting' => 'sorting',
        ];
    }
}