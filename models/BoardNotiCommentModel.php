<?php

namespace app\models;

use Yii;
use app\models\UserModel;
use app\models\BoardTopicModel;
use app\components\helpFunction;

/**
 * This is the model class for table "db_board_noti_comment".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_user_post
 * @property integer id_topic
 * @property integer $id_commnet
 * @property string $category
 * @property string $title
 * @property string $post_time
 * @property integer $active
 */
class BoardNotiCommentModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_board_noti_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_user_post', 'id_topic', 'id_comment', 'category', 'post_time', 'active'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'id_user_post', 'id_topic', 'id_comment', 'active'], 'integer'],
            [['post_time'], 'safe'],
            [['category'], 'string', 'max' => 128],
            [['title'], 'string', 'max' => 256],
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
            'id_user_post' => 'Id User Post',
            'id_topic' => 'id topic',
            'id_comment' => 'Id Comment',
            'category' => 'Category',
            'title' => 'Title',
            'post_time' => 'Post Time',
            'active' => 'Active',
        ];
    }
    
    public function getNotiBadge() {
        //render noti comment
        $cm_badge = '';
        $count_cm = BoardNotiCommentModel::countNotiComment();

        if($count_cm > 0){
            $cm_badge .= '<span class="badge">'.$count_cm.'</span>';
        }
        return $cm_badge;
    }

    public function countNotiComment() {
        $model = BoardNotiCommentModel::find()->where(['id_user_post' => Yii::$app->user->id, 'active' => 0])->count();
        return $model;
    }
    public function getNotiComment() {
        $model = BoardNotiCommentModel::find()->where(['id_user_post' => Yii::$app->user->id])->orderBy(['post_time'=>SORT_DESC])->limit(5)->all();
        return $model;
    }
    public function genNotiComment() {
        $model = BoardNotiCommentModel::getNotiComment();
        $data = '';
        foreach ($model as $row) {
            if($row->category == 'topic'){
                $name  = UserModel::getUsername($row->id_user);
                $topic = BoardTopicModel::findOne($row->id_topic);
                if($row->active == 0){
                    $data .= '<a data-target="'.$row->id.'" href="/board/topic/' . $row->id_topic . '#comment-link-' . $row->id_comment . '" class="list-group-item noti-comment-item non-active"><span class="text-bold">'.$name.'</span> ได้ตอบกลับกระทู้ '.$topic->title.' ของคุณ<br> เมื่อ '.helpFunction::humanTiming(strtotime($row->post_time)).'</a>';
                }
                else{
                    $data .= '<a data-target="'.$row->id.'" href="/board/topic/' . $row->id_topic . '#comment-link-' . $row->id_comment . '" class="list-group-item noti-comment-item"><span class="text-bold">'.$name.'</span> ได้ตอบกลับกระทู้ '.$topic->title.' ของคุณ<br> เมื่อ '.helpFunction::humanTiming(strtotime($row->post_time)).'</a>';
                }
                
            }
            if($row->category == 'comment'){
                $name  = UserModel::getUsername($row->id_user);
                $topic = BoardTopicModel::findOne($row->id_topic);
                if($row->active == 0){
                    $data .= '<a data-target="'.$row->id.'" href="/board/topic/' . $row->id_topic . '#comment-link-' . $row->id_comment . '" class="list-group-item noti-comment-item non-active"><span class="text-bold">'.$name.'</span> ได้ตอบกลับคอมเม้นในหัวข้อ "'.$topic->title.'" ของคุณ<br> เมื่อ '.helpFunction::humanTiming(strtotime($row->post_time)).'</a>';
                }
                else{
                    $data .= '<a data-target="'.$row->id.'" href="/board/topic/' . $row->id_topic . '#comment-link-' . $row->id_comment . '" class="list-group-item noti-comment-item"><span class="text-bold">'.$name.'</span> ได้ตอบกลับคอมเม้นในหัวข้อ "'.$topic->title.'" ของคุณ<br> เมื่อ '.helpFunction::humanTiming(strtotime($row->post_time)).'</a>';
                }
            }
        }
        //all history
        //$data .= '<a href="/board/comment-history" class="list-group-item text-center">ดูการแจ้งเตือนทั้งหมด</a>';
        
        return $data;
    }
    
}