<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\GalleryModel;

class gallery2 extends Widget {
    public $render = 'index';
    public $model = null;

    public function init() {
        if(!$this->model && $this->render != 'gallery-main'){
            $this->model = GalleryModel::find()->where(['show'=>1, 'banned'=>0])->orderBy(['create_date' => SORT_DESC])->limit(6)->all();
        }
    }

    public function run() {
        //test
        //$model = AlertModel::find()->where(['id_user'=>Yii::$app->user->id,'read' => 0])->orderBy(['show_date' => SORT_DESC])/*->limit(5)*/->all();
        
        //live
        //$model = AlertModel::find()->where(['id_user'=>Yii::$app->user->id,'read' => 0,'show_date' => date('Y-m-d')])->orderBy(['show_date' => SORT_DESC])/*->limit(5)*/->all();
        return $this->render('gallery2', 
                [
                    'model' => $this->model,
                ]);
    }
    
}
