<?php

namespace app\components\api;
use app\models\LeagueModel;
use app\models\LeagueScoresModel;
use Yii;

class updateLeagueScore{
    
    public function upScore($id) {
        $score = updateLeagueScore::getScore($id);

        if($score){
            foreach ($score as $row) {
                updateLeagueScore::updateScore($id, $row);
            }
            return TRUE;
        }
        return FALSE;
    }
    
    public function getScore($id){

        require_once Yii::$app->basePath . '/components/simple_html_dom.php';
        $url = updateLeagueScore::getLeagueUrl($id);
 
        $html = file_get_html($url);

        $score = array();

        $count = 0;
        $group = 0;
        $groupB = 0;
        $find = $html->find('#tables-overall table tr');

        for($i=2;$i<count($find);$i++){

            $score[$count]['no'] = trim($html->find('td.pos',$count)->plaintext);
                $score[$count]['team_name'] = trim($html->find('td.team',$count)->plaintext);

                $score[$count]['play'] = trim($html->find('td.groupA',$group)->plaintext);
                $group++;
                        
                //over all       
                $allWin = trim($html->find('td.groupA',$group)->plaintext);
                $group++;
                $allDraw = trim($html->find('td.groupA',$group)->plaintext);
                $group++;
                $allLost = trim($html->find('td.groupA',$group)->plaintext);
                $group++;
                $allGfor = trim($html->find('td.groupA',$group)->plaintext);
                $group++;
                $allAgainst = trim($html->find('td.groupA',$group)->plaintext);
                $group++;

                //HOME        
                $score[$count]['h_win'] = trim($html->find('td.groupB',$groupB)->plaintext);
                $groupB++;
                $score[$count]['h_draw'] = trim($html->find('td.groupB',$groupB)->plaintext);
                $groupB++;
                $score[$count]['h_lost'] = trim($html->find('td.groupB',$groupB)->plaintext);
                $groupB++;
                $score[$count]['h_gfor'] = trim($html->find('td.groupB',$groupB)->plaintext);
                $groupB++;
                $score[$count]['h_against'] = trim($html->find('td.groupB',$groupB)->plaintext);
                $groupB++;
                
                //AWAY
                $score[$count]['a_win'] = $allWin - $score[$count]['h_win'];
                $score[$count]['a_draw'] = $allDraw - $score[$count]['h_draw'];
                $score[$count]['a_lost'] = $allLost - $score[$count]['h_lost'];
                $score[$count]['a_gfor'] = $allGfor - $score[$count]['h_gfor'];
                $score[$count]['a_against'] = $allAgainst - $score[$count]['h_against'];
                
                
                $score[$count]['goal_dif'] = trim($html->find('td.gd',$count)->plaintext);
                $score[$count]['point'] = trim($html->find('td.pts',$count)->plaintext);
            
            $count ++;
        }

        return $score;
    }
    public function updateScore($id, $team) {
        //var_dump(updateLeagueScore::season);exit();
                
        $model = LeagueScoresModel::find()->where(['league_id' => $id, 'no' => $team['no'], 'season' => LeagueModel::season])->one();

        if($model){

            $model->team_name = $team['team_name'];
            $model->play = $team['play'];
            $model->h_win = $team['h_win'];
            $model->h_draw = $team['h_draw'];
            $model->h_lost = $team['h_lost'];
            $model->h_gfor = $team['h_gfor'];
            $model->h_against = $team['h_against'];
            $model->a_win = $team['a_win'];
            $model->a_draw = $team['a_draw'];
            $model->a_lost = $team['a_lost'];
            $model->a_gfor = $team['a_gfor'];
            $model->a_against = $team['a_against'];
            $model->goal_dif = $team['goal_dif'];
            $model->point = $team['point'];
            
            $model->update();
        }
        else{
            $model = new LeagueScoresModel();

            $model->league_id = $id;
            $model->no = $team['no'];
            $model->season = LeagueModel::season;
            $model->team_name = $team['team_name'];
            $model->play = $team['play'];
            $model->h_win = $team['h_win'];
            $model->h_draw = $team['h_draw'];
            $model->h_lost = $team['h_lost'];
            $model->h_gfor = $team['h_gfor'];
            $model->h_against = $team['h_against'];
            $model->a_win = $team['a_win'];
            $model->a_draw = $team['a_draw'];
            $model->a_lost = $team['a_lost'];
            $model->a_gfor = $team['a_gfor'];
            $model->a_against = $team['a_against'];
            $model->goal_dif = $team['goal_dif'];
            $model->point = $team['point'];
            
            $model->save();
        }
        
    }
    
    protected function getLeagueUrl($id) {
        $model = LeagueModel::findOne($id);

        return $model->link_get_scores;
    }
    
}
