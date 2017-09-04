<?php

namespace app\components\api;
use app\models\LeagueModel;
use app\models\MatchModel;
use Yii;

class getScoreResult{
    
    public function updateScoreResult($id, $date) {
        $model = LeagueModel::findOne($id);
        if($model->link_get_result == 1){
            $score = getScoreResult::getScoreESPN($model->link_get_result_sub, $date);
        }
        else if($model->link_get_result == 2){
            $score = getScoreResult::getScoreFIFA($model->link_get_result_sub, $date);
        }
        else{
            $score = null;
        }
        
        //$score = getScoreResult::getScoreESPN($id, $date);

        if($score){
            foreach ($score as $row) {
                getScoreResult::updateScore($id, $row);
            }
            return TRUE;
        }
        return FALSE;
        
    }
    
    protected function getScore($id, $date){

        $league_url = getScoreResult::getLeagueResultsUrlESPN($id);
        
        if($league_url){
            require_once Yii::$app->basePath . '/components/simple_html_dom.php';
            $url = $league_url;

            $html = file_get_html($url);

            $lastTable = $html->find('table.table-stats',0);
            
            foreach($lastTable->find('tbody tr td.match-details') as $row) {
                $item['home'] = trim($row->find('span.team-home', 0)->plaintext);
                $item['score'] = trim($row->find('span.score', 0)->plaintext);
                $item['away'] = trim($row->find('span.team-away', 0)->plaintext);
                
                $result[] = $item;
            }
            //var_dump($result);exit();
            if(!empty($result)){
                return $result;
            }
        }
        
        return FALSE;
        
    }
    
    protected function getScoreESPN($url, $date){

        //$league_url = getScoreResult::getLeagueResultsUrlESPN($id);
        //var_dump($url);exit();
        if($url){
            require_once Yii::$app->basePath . '/components/simple_html_dom.php';
            //$url = $league_url;

            $html = file_get_html($url);

            $lastTable = $html->find('div#score-leagues',0);
            
            foreach($lastTable->find('div.score-content') as $row) {
                $item['home'] = trim($row->find('div.team-name', 0)->plaintext);
                
                $item['away'] = trim($row->find('div.team-name', 1)->plaintext);
                
                $item['h_score'] = trim($row->find('div.team-score', 0)->plaintext);
                $item['a_score'] = trim($row->find('div.team-score', 1)->plaintext);
                
                $result[] = $item;
            }
            var_dump($result);exit();
            if(!empty($result)){
                return $result;
            }
        }
        
        return FALSE;
        
    }
    
    protected function updateScore($id, $row) {
        //var_dump($row['home']);exit();
        $model = MatchModel::find()->where(['id_league' => $id,'active' => 0])->andFilterWhere(['or',['like', 'home', $row['home']],['like', 'away', $row['away']]])->one();
        //$model = MatchModel::find()->where(['id_league' => $id])->andFilterWhere(['or',['like', 'play_time', $date]])->one();
        //var_dump($row);exit();
        if($model){
            //$score = getScoreResult::cutScore($row['score']);
            
            $model->h_score = $row['h_score'];
            $model->a_score = $row['a_score'];
            $model->active = 1;

            $model->update();
        }
        
    }
    
    protected function getLeagueResultsUrl($id) {
        $model = LeagueModel::findOne($id);

        return $model->link_get_result;
    }
    
    protected function getLeagueResultsUrlESPN($id) {
        $model = LeagueModel::findOne($id);

        return $model->link_get_result_sub;
    }
    
    protected function cutScore($score){
        $array = explode("-", $score);
        return $array;
    }
    
    protected function getScoreFIFA($url, $date){
        $id = date('Ymd', strtotime($date));
        //var_dump(date('Ymd', strtotime($date)));exit();
        if($url){
            require_once Yii::$app->basePath . '/components/simple_html_dom.php';

            $html = file_get_html($url);

            $lastTable = $html->find('div#'.$id,0);
            
            foreach($lastTable->find('div.result') as $row) {
                $item['home'] = trim($row->find('div.home', 0)->find('span.t-nText', 0)->plaintext);
                
                $item['away'] = trim($row->find('div.away', 0)->find('span.t-nText', 0)->plaintext);
                
                $score = explode("-", trim($row->find('span.s-scoreText', 0)->plaintext));
                
                $item['h_score'] = $score[0];
                $item['a_score'] = $score[1];
                
                $result[] = $item;
                
                //var_dump($result);exit();
            }
            //var_dump($result);exit();
            if(!empty($result)){
                return $result;
            }
        }
        
        return FALSE;
        
    }
    
    
}
