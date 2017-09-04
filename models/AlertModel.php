<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_alert".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $content
 * @property string $theme
 * @property string $show_date
 * @property string $create_time
 * @property string $update_time
 * @property integer $read
 */
class AlertModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_alert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'title', 'content', 'theme', 'show_date', 'create_time', 'read'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'read'], 'integer'],
            [['show_date', 'create_time', 'update_time'], 'safe'],
            [['content'], 'string', 'max' => 512],
            [['title'], 'string', 'max' => 256],
            [['theme'], 'string', 'max' => 64],
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
            'title' => 'ชื่อเรื่อง',
            'content' => 'ข้อความ',
            'theme' => 'ธีม',
            'show_date' => 'วันที่',
            'create_time' => 'สร้างเมื่อ',
            'update_time' => 'แก้ไขล่าสุด',
            'read' => 'อ่าน',
        ];
    }
}