<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\RulesModel;

class rules extends Widget {
    public $log = null;

    public function init() {

    }

    public function run() {

        $model = RulesModel::find()->where(['type' => 'rules'])->one();
        return $this->render('rules', 
                [
                    'model' => $model,
                ]);
    }


}
