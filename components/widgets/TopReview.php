<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\TravelModel;
//use app\models\RestaurantModel;

class TopReview extends Widget {
    
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
        $travel = TravelModel::find()->orderBy(['rating' => SORT_DESC])->limit(2)->all();
        //$restaurant = MainMenuModel::find()->orderBy(['rating' => SORT_DESC])->limit(2)->all();

        return $this->render('TopReview', 
                [
                    'travel' => $travel,
                    //'type' => $this->type,
                ]);
    }
}
