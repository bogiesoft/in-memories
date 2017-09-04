<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\MemoryModel;


class memoryBox extends Widget {
    public $render = null;
    public $cut = null;
    public $model;


    public function init() {
        if($this->render == 'index'){
            $this->model = MemoryModel::find()->where(['show' => 1, 'banned'=>0])->limit(4)->orderBy(['create_time' => SORT_DESC])->all();
            $this->cut = 1400;
        }
        elseif($this->render == 'memory'){
            $this->model = MemoryModel::find()->where(['show' => 1, 'banned'=>0])->orderBy(['create_time' => SORT_DESC])->all();
            $this->cut = 2000;
        }
        else{
            $this->model = null;
        }
    }

    public function run() {

        //$model = MemoryModel::find()->where(['show' => 1])->limit(4)->orderBy(['create_time' => SORT_DESC])->all();
        return $this->render('memoryBox', 
                [
                    'model' => $this->model,
                    'cut' => $this->cut,
                ]);
    }
    
    public function getFirstImageGallary($id){

            throw new NotFoundHttpException('The requested page does not exist.');
        
    }

}
