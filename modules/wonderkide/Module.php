<?php

namespace app\modules\wonderkide;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\wonderkide\controllers';

    public function init() {
        parent::init();

        $this->defaultRoute = 'main';
    }

}
