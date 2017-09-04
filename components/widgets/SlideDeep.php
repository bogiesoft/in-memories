<?php
namespace app\components\widgets;

use yii\base\Widget;
//use yii\helpers\Url;
//use app\models\MainMenuModel;

class SlideDeep extends Widget {
    
    public $message;

    public function init() {
        /*parent::init();
        if($this->message===null){
            $this->message= 'Welcome User';
        }else{
            $this->message= 'Welcome '.$this->message;
        }*/

    }

    public function run() {
        /*$mainMenuList = MainMenuModel::find()->where(['type'=>'mainMenu','active' => 1])->orderBy(['sorting' => SORT_ASC])->limit(10)->all();
        return $this->render('mainMenuBlock', 
                [
                    'mainMenuList' => $mainMenuList,
                ]);*/
        return $this->render('SlideDeep');
    }
}
