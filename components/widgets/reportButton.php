<?php
namespace app\components\widgets;

use yii\base\Widget;

class reportButton extends Widget {
    
    public $id_cat;
    public $id_user;
    public $category;
    public $btn_size = 'md';

    public function init() {

    }

    public function run() {
        $url = \Yii::$app->seo->getUrl('wonder/report');
        $link = $url.'?i='.$this->id_cat.'&c='.$this->category.'&u='.$this->id_user;

        return $this->render('reportButton', 
                [
                    'link' => $link,
                    'btn_size' => $this->btn_size,
                ]);
    }
}
