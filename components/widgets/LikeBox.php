<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\LikeDataModel;

class LikeBox extends Widget {
    
    public $model;
    public $position;
    public $cat;
    public $like;
    public $sub_cat = null;

    public function init() {
        $this->cat = $this->getCategory();
        $like = LikeDataModel::find()->where(['id_user' => Yii::$app->user->id, 'id_like_cat' => $this->model->id, 'main_category' => $this->cat, 'sub_category' => $this->sub_cat])->one();
        if($like){
            $this->like = $like->like_value;
        }
    }

    public function run() {
        
        return $this->render('LikeBox', 
                [
                    'model' => $this->model,
                    'position' => $this->position,
                    'category' => $this->cat,
                    'sub_category' => $this->sub_cat,
                    'isLike' => $this->like,
                    'like' => LikeDataModel::countAllLike($this->model->id, $this->cat, $this->sub_cat),
                    'unlike' => LikeDataModel::countAllUnlike($this->model->id, $this->cat, $this->sub_cat),
                ]);
    }
    
    public function getCategory() {
        $class = str_replace("app\models\\","",get_class($this->model));
        $model = str_replace("Model","",$class);
        $cat = str_replace("Board","",$model);
        
        return strtolower($cat);
    }
    
}
