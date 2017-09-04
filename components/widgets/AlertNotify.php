<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\AlertModel;

class AlertNotify extends Widget {

    public function init() {

    }

    public function run() {
        //test
        $model = AlertModel::find()->where(['id_user'=>Yii::$app->user->id,'read' => 0])->orderBy(['show_date' => SORT_DESC])/*->limit(5)*/->all();
        
        //live
        $model = AlertModel::find()->where(['id_user'=>Yii::$app->user->id,'read' => 0,'show_date' => date('Y-m-d')])->orderBy(['show_date' => SORT_DESC])/*->limit(5)*/->all();
        return $this->render('AlertNotify', 
                [
                    'model' => $model,
                ]);
    }
    
}
