<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\NotifyModel;

class notifyDropdown extends Widget {
    
    public $limit = null;
    private $like_pattern = 'แสดงความรู้สึกต่อ';
    private $feel_pattern = 'ให้คะแนนความมีสาระบน';
    private $parent_comment_pattern = 'แสดงความคิดเห็นบน';
    private $child_comment_pattern = 'แสดงความคิดเห็นบน';

    public function init() {
        
    }

    public function run() {

        return $this->render('notifyDropdown', 
                [
                    'model' => $this->getNoti(),
                    'like' => $this->like_pattern,
                    'parent_comment' => $this->parent_comment_pattern,
                    'child_comment' => $this->child_comment_pattern,
                    'limit' => $this->limit,
                    'feel' => $this->feel_pattern,
                ]);
    }
    
    public function getNoti() {
        if($this->limit){
            $model = NotifyModel::find()->where(['id_user_owner'=>Yii::$app->user->id])->orderBy(['create_time' => SORT_DESC])->limit($this->limit)->all();
        }
        else{
            $model = NotifyModel::find()->where(['id_user_owner'=>Yii::$app->user->id])->orderBy(['create_time' => SORT_DESC])->all();
        }
        if($model){
            return $model;
        }
        return null;
    }
    public function genNotiList() {
        $data = [];
        $model = $this->getNoti();
        /*foreach ($model as $key => $row) {
            $data[$key] = <a href="#" class="list-group-item non-active">
                <div class="noti-img">
                    <?= Html::img(Yii::$app->user->identity->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': Yii::$app->user->identity->image_crop, ['class' => 'img-responsive show-profile-img','id' => 'profile-img-detail',]) ?>
                </div>
                <div class="noti-content">
                    <p>Dapibus ac facilisis in Morbi leo risusPorta ac consectetur ac</p>
                    <p class="time">xxxx</p>
                </div>
                <div class="clearfix"></div>
            </a>
        }*/
    }
    
    public function genContent($model, $user) {
        //$action = '';
        $back = 'ของคุณ';
        if($model->action == "like"){
            $action = $this->like_pattern;
        }
        if($model->action == "comment"){
            if($model->category != "comment"){
                $action = 'แสดงความคิดเห็นบน';
            }
            else{
                $action = 'แสดงความคิดเห็นบน';
                $back = 'ที่มีคุณ';
            }
            
        }
        $content = '<strong>' . $user->nickname ? $user->nickname : $user->username .'</strong> ได้' . $action . '<strong>' . $model->category . '</strong> ' . $back;
        return $content;
    }
}
