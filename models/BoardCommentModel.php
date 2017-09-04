<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_board_comment".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_topic
 * @property integer $id_parent
 * @property string $content
 * @property string $post_time
 * @property string $post_ip
 */
class BoardCommentModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public static function tableName()
    {
        return 'db_board_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_topic', 'id_parent', 'content', 'post_time', 'post_ip'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'id_topic', 'id_parent'], 'integer'],
            [['content'], 'string'],
            [['post_time'], 'safe'],
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
            'id_user' => 'Id User',
            'id_topic' => 'Id Topic',
            'id_parent' => 'Id Parent',
            'content' => 'ข้อความ',
            'post_time' => 'Post Time',
            'post_ip' => 'Post Ip',
        ];
    }
    
    public function countAllReply($id_user) {
        $count = BoardCommentModel::find()->where(['id_user'=>$id_user])->count();
        return $count;
    }
    public function findComment($id) {
        /*//$model = BoardCommentModel::find()->where(['id_topic'=>$id,'id_parent'=>0])->orderBy(['post_time'=>SORT_ASC])->all();
        $model = BoardCommentModel::find()->where(['id_topic'=>$id,'id_parent'=>0])->orderBy(['post_time'=>SORT_ASC]);
        $count = $model->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count]);

        // limit the query using the pagination and retrieve the articles
        $articles = $model->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $articles;*/
    }
    public function findParent($id_parent) {
        $model = BoardCommentModel::find()->where(['id_parent'=>$id_parent])->orderBy(['post_time'=>SORT_ASC])->all();
        return $model;
    }
}