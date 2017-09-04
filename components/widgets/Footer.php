<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\FooterModel;

class Footer extends Widget {

    public function init() {

    }

    public function run() {
        $model = FooterModel::find()->where(['active' => 1])->orderBy(['sorting' => SORT_ASC])->limit(4)->all();
        return $this->render('Footer', 
                [
                    'model' => $model,
                ]);
    }
    
}
