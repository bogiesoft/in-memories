<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\MatchModel;
use app\models\MatchTicketModel;
use app\models\LogZenyModel;

class Ticket extends Widget {
    public $log = null;
    public $history = false;

    public function init() {

    }

    public function run() {

        $ticket = MatchTicketModel::find()->where(['id_game_log' => $this->log->id_game_log])->orderBy(['update_time' => SORT_ASC])->all();
        return $this->render('Ticket', 
                [
                    'ticket' => $ticket,
                    'log' => $this->log,
                    'history' => $this->history,
                ]);
    }
    
    public function getTeam($id){
        if (($model = MatchModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function getZeny($id) {
        $model = LogZenyModel::findOne(['id_log_game' => $id]);
        if($model){
            return $model->zeny;
        }
        return 0;
    }

}
