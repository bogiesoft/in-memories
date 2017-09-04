<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\MatchModel;
use app\models\MatchTicketModel;

class Ticket extends Widget {
    public $log = null;

    public function init() {

    }

    public function run() {

        $ticket = MatchTicketModel::find()->where(['id_game_log' => $this->log->id_game_log])->orderBy(['update_time' => SORT_ASC])->all();
        return $this->render('Ticket', 
                [
                    'ticket' => $ticket,
                    'log' => $this->log,
                ]);
    }
    
    public function getTeam($id){
        if (($model = MatchModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
