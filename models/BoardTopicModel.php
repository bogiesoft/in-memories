<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_board_topic".
 *
 * @property integer $id
 * @property integer $id_forum
 * @property integer $id_user
 * @property string $title
 * @property string $content
 * @property string $tag
 * @property string $post_time
 * @property string $post_ip
 * @property integer $read
 * @property integer $reply
 * @property integer $sticky
 */
class BoardTopicModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_board_topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_forum', 'id_user', 'title', 'content', 'tag', 'post_time', 'post_ip', 'read', 'reply'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_forum', 'id_user', 'read', 'reply', 'sticky'], 'integer'],
            [['content'], 'string'],
            [['post_time'], 'safe'],
            [['title'], 'string', 'max' => 1024],
            [['tag'], 'string', 'max' => 256],
            [['post_ip'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_forum' => 'Id Forum',
            'id_user' => 'Id User',
            'title' => 'Title',
            'content' => 'Content',
            'tag' => 'Tag',
            'post_time' => 'Post Time',
            'post_ip' => 'Post Ip',
            'read' => 'Read',
            'reply' => 'Reply',
            'sticky' => 'Sticky',
        ];
    }

}