<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;

class actionReplyComment extends Widget {
    public $model;
    public $category;

    public function init() {

    }

    public function run() {
        return $this->render('actionReplyComment', 
        [
            'model' => $this->model,
            'category' => $this->category,
        ]);
    }
    
}
