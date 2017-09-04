<?php

namespace app\components\api;

use app\models\MatchModel;
use app\models\LogZenyModel;
use app\models\LogGameModel;
use app\models\MatchTicketModel;
use Yii;

class calculateTicket{
    
    public function calculateTicket() {
        /*if(!empty($date) && $date != ''){
        }
        else{
            $date = date("Y-m-d");
        }*/
        
        $flag = 0;
        //$date = getScoreResult::getScoreESPN($id, $date);
        $log = calculateTicket::findLog();
        if(!$log){
            return 1;
        }
        
        //update bet
        foreach ($log as $row) {
            
            if(!calculateTicket::checkTicket($row)){
                return 2;
            }
            else {
                $zeny = calculateTicket::checkBet($row);
                if($zeny){
                    calculateTicket::updateZeny($row, $zeny);
                    calculateTicket::updateLog($row);
                }
                else{
                    calculateTicket::updateFailLog($row);
                }
                
                $flag = 111;
            }
            //calculateTicket::updateLog($row);
        }
        
        //check and calculate step
        /*foreach ($log as $row) {
            $zeny = calculateTicket::checkBet($row);
            if($zeny){
                calculateTicket::updateZeny($row, $zeny);
            }
        }*/
        
        return $flag;
        
    }
    
    protected function findLog() {
        //$check = date("Y-m-d");
        //$cut = explode("-", $check);
        //$date = $cut[0]."-".$cut[1]."-".($cut[2])-1;
        $model = LogGameModel::find()->where(['status' => 0, ])/*->andFilterWhere(['or',['like', 'play_date', $date]])*/->all();
        return $model;
    }
    
    protected function checkTicket($idLog) {
        //var_dump($idLog);exit();
        $model = MatchTicketModel::find()->where(['id_game_log' => $idLog->id_game_log, ])->all();
        //var_dump($model);exit();
        $flag = FALSE;
        foreach ($model as $ticket) {
            if(!calculateTicket::updateTicket($ticket)){
                return FALSE;
            }
            else {
                $flag = TRUE;
            }
            //calculateTicket::updateRate($bet);
        }
        return $flag;
        
    }
    
    protected function updateTicket($ticket) {
        $model = MatchModel::findOne($ticket->id_match);
        
        //var_dump($model);exit();
        //$sumScore = $model->h_score - $model->a_score;
        //$sum = $sumScore - $model->bet;
        //var_dump($sum);
        if($model->bet_team == 'h'){
            $sum = $model->h_score - ($model->a_score + $model->bet);
        }
        else{
            $sum = ($model->h_score + $model->bet) - $model->a_score;
        }
        $bet = 0;
        if($model->active == -1){
            $bet = 1;
        }
        else if($ticket->team_selected == 'h'){
            if($sum >= 0.5){
                $bet = $model->h_odds;
            }
            else if($sum == 0.25){
                $bet = 1.4;
            }
            else if($sum == 0){
                $bet = 1;
            }
            else if($sum == -0.25){
                $bet = -1.4;
            }
            else if($sum <= -0.5){
                $bet = -1;
            }
        }
        else{
            if($sum >= 0.5){
                $bet = -1;
            }
            else if($sum == 0.25){
                $bet = -1.4;
            }
            else if($sum == 0){
                $bet = 1;
            }
            else if($sum == -0.25){
                $bet = 1.4;
            }
            else if($sum <= -0.5){
                $bet = $model->a_odds;
            }
        }
        //var_dump($bet);
        //var_dump($bet);exit();
        //$model->
        //return $bet;
        $ticketModel = MatchTicketModel::findOne($ticket->id_match_ticket);
        //var_dump($ticketModel);exit();
        if($ticketModel){
            //var_dump($ticketModel);exit();
            $ticketModel->rate = $bet;
            $ticketModel->update();
            
            return TRUE;
        }
        return FALSE;
    }
    protected function checkBet($idLog) {
        $model = MatchTicketModel::find()->where(['id_game_log' => $idLog->id_game_log, ])->all();
        //var_dump($model);
        if($model){
            $zeny = $idLog->zeny;
            foreach ($model as $ticket) {
                if($ticket->rate < 1 && $ticket->rate != -1.4){
                    return FALSE;
                }
                else{
                    if($ticket->rate == -1.4){
                        $zeny /= 1.4;
                    }
                    else{
                        $zeny *= $ticket->rate;
                    }
                }
            }
            //var_dump($zeny);exit();
            
            return floor($zeny);
            
        }
    }
    
    protected function updateZeny($log, $zeny) {
        
        $logZeny = new LogZenyModel();
        //$text = '';

        if($zeny){
            $logZeny->id_user = $log->id_user;
            $logZeny->text = Yii::$app->params['winTicket'];
            $logZeny->zeny = $zeny;
            $logZeny->update_time = date('Y-m-d');
            $logZeny->status = 0;
            $logZeny->id_log_game = $log->id_game_log;
            
            $logZeny->save();         
        }
        else{
            /*$logZeny->id_user = $log->id_user;
            $logZeny->text = $text;
            $logZeny->zeny = $log->zeny;
            $logZeny->update_time = date('Y-m-d');
            $logZeny->status = -1;
            
            $logZeny->save();*/
        }
    }
    
    protected function updateLog($row) {
        $model = LogGameModel::findOne($row->id_game_log);
        $model->status = 1;
        $model->update();
    }
    
    protected function updateFailLog($row) {
        $model = LogGameModel::findOne($row->id_game_log);
        $model->status = -1;
        $model->update();
    }

}
