<?php
namespace app\components\widgets;

use yii\base\Widget;
//use yii\helpers\Url;
use app\models\TravelModel;

class Review extends Widget {
    
    public $type;
    public $review;

    public function init() {
        /*parent::init();
        if($this->message===null){
            $this->message= 'Welcome User';
        }else{
            $this->message= 'Welcome '.$this->message;
        }*/
        if($this->type == 'travel'){
            $this->review = TravelModel::find()->all();
        }
        else if($this->type == 'restaurant'){
            //$this->review = re::find()->all();
        }
        else{
            $this->review = NULL;
        }

    }

    public function run() {
        //$review = TravelModel::find()->where(['type'=>'mainMenu','active' => 1])->orderBy(['sorting' => SORT_ASC])->limit(10)->all();
        //$review = TravelModel::find()->all();
        return $this->render('Review', 
                [
                    'model' => $this->review,
                    'type' => $this->type,
                ]);
        //return $this->render('Review');
    }
    
}
