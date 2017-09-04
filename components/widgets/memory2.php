<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\MemoryModel;

class memory2 extends Widget {
    public $render = null;
    public $cut = null;
    public $model;

    public function init() {
        if($this->render == 'index'){
            $this->model = MemoryModel::find()->where(['show' => 1, 'banned'=>0])->limit(3)->orderBy(['create_time' => SORT_DESC])->all();
            $this->cut = 400;
        }
        elseif($this->render == 'memory'){
            $this->model = MemoryModel::find()->where(['show' => 1, 'banned'=>0])->orderBy(['create_time' => SORT_DESC])->all();
            $this->cut = 400;
        }
        else{
            $this->model = null;
        }
    }

    public function run() {
        //test
        //$model = AlertModel::find()->where(['id_user'=>Yii::$app->user->id,'read' => 0])->orderBy(['show_date' => SORT_DESC])/*->limit(5)*/->all();
        
        //live
        //$model = AlertModel::find()->where(['id_user'=>Yii::$app->user->id,'read' => 0,'show_date' => date('Y-m-d')])->orderBy(['show_date' => SORT_DESC])/*->limit(5)*/->all();
        return $this->render('memory2', 
                [
                    'model' => $this->model,
                    'cut' => $this->cut,
                ]);
    }
    
}
