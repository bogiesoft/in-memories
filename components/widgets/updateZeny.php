<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\LogZenyModel;

class updateZeny extends Widget {

    public function init() {

    }

    public function run() {

        $income = LogZenyModel::find()->where(['id_user' => Yii::$app->user->id,'status' => 0])->orderBy(['update_time' => SORT_ASC])->all();
        return $this->render('updateZeny', 
                [
                    'income' => $income,
                ]);
    }

}
