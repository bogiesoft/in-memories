<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\GalleryModel;

class Gallery extends Widget {
    
    public $render = 'index';
    public $model = null;

    public function init() {
        if(!$this->model && $this->render != 'gallery-main'){
            $this->model = GalleryModel::find()->where(['show'=>1, 'banned'=>0])->orderBy(['create_date' => SORT_DESC])->limit(4)->all();
        }
    }

    public function run() {
        return $this->render('Gallery', 
                [
                    'model' => $this->model,
                    'render' => $this->render,
                ]);
    }
    
}
