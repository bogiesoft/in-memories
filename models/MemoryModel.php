<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_memory".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $title
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 * @property string $image_thumb
 * @property string $gallery_tags
 * @property string $video_tags
 * @property integer $read
 * @property integer $show
 */
class MemoryModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_memory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'title', 'content', 'create_time', 'read', 'show'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'read', 'show', 'banned'], 'integer'],
            [['title', 'content'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['image_thumb'], 'string', 'max' => 128],
            [['gallery_tags', 'video_tags'], 'string', 'max' => 32],
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
            'content' => 'รายละเอียด',
            'create_time' => 'สร้างเมื่อ',
            'update_time' => 'แก้ไขล่าสุด',
            'image_thumb' => 'ภาพตัวอย่าง',
            'gallery_tags' => 'Gallery ที่เกี่ยวข้อง',
            'video_tags' => 'Video ที่เกี่ยวข้อง',
            'read' => 'อ่าน',
            'show' => 'เปิดเป็นสาธารณะ',
        ];
    }
    
    public function filterContent($content, $length) {
        $data = strip_tags($content);
        return MemoryModel::cutStr($data, $length);
    }
    public function cutStr($data, $length){
        if(strlen($data) > $length){
            $last_space = strrpos(substr($data, 0, $length), ' ');
            $data = substr($data, 0, $last_space);
            $data .= '...';
        }
        return $data;
    }
}