<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\MainDataModel;
use app\models\FeelingCommentModel;

class feelingComment extends Widget {

    public $id_comment;
    public $id_user_owner;
    public $count = 0;
    private $active = false;


    public function init() {
        $this->checkActive();
    }

    public function run() {
        $icon = MainDataModel::getFeeling();
        $icon_active = MainDataModel::getFeelingActive();
        return $this->render('feelingComment', 
                [
                    'active' => $this->active,
                    'icon' => $icon,
                    'icon_active' => $icon_active,
                    'id_comment' => $this->id_comment,
                    'id_user_owner' => $this->id_user_owner,
                    'count' => $this->count,
                ]);
    }
    public function checkActive(){
        if (\Yii::$app->user->isGuest){
            $this->active = FALSE;
        }
        else{
            $check = FeelingCommentModel::find()->where(['id_user'=>Yii::$app->user->id, 'id_user_owner'=>  $this->id_user_owner, 'id_comment'=>  $this->id_comment, 'value'=>  1])->one();
            if($check){
                $this->active = true;
            }
        }
    }
    
    public function count() {
        $count = FeelingCommentModel::find()->where(['id_comment'=>  $this->id_comment, 'value'=>  1])->count();
        return $count;
    }
}
