<?php

namespace app\components\api;
use app\models\LeagueModel;
use app\models\LeagueTopScoreModel;
use Yii;

class updateTopScore{
    
    public function upScore($id) {
        $score = updateTopScore::getScore($id);
        if($score){
            foreach ($score as $row) {
                updateTopScore::updateScore($id, $row);
            }
            return TRUE;
        }
        return FALSE;
    }
    
    public function getScore($id){

        require_once Yii::$app->basePath . '/components/simple_html_dom.php';
        $url = updateTopScore::getLeagueUrl($id);
 
        $html = file_get_html($url);

        $top = array();

        $count = 0;

        $find = $html->find('#stats-top-scorers table.data tr');
        
        $rank = 1;
        for($i=1;$i<count($find);$i++){

            //$top[$count]['rank'] = trim($html->find('td[headers=rank]',$count)->plaintext);
            $top[$count]['rank'] = $rank;
            $top[$count]['player'] = trim($html->find('td[headers=player]',$count)->plaintext);
            $top[$count]['team'] = trim($html->find('td[headers=team]',$count)->plaintext);
            $top[$count]['goal'] = trim($html->find('td[headers=goals]',$count)->plaintext);
            $count ++;
            $rank++;
        }

        return $top;
    }
    public function updateScore($id, $top) {
                
        $model = LeagueTopScoreModel::find()->where(['id_league' => $id, 'rank' => $top['rank'], 'season' => LeagueModel::season])->one();

        if($model){
            $model->rank = $top['rank'];
            $model->player = $top['player'];
            $model->team = $top['team'];
            $model->goal = $top['goal'];
            
            $model->update();
        }
        else{
            $model = new LeagueTopScoreModel();
            $model->id_league = $id;
            $model->rank = $top['rank'];
            $model->player = $top['player'];
            $model->team = $top['team'];
            $model->goal = $top['goal'];
            $model->season = LeagueModel::season;
            
            $model->save();
        }
        
    }
    
    protected function getLeagueUrl($id) {
        $model = LeagueModel::findOne($id);

        return $model->link_get_topscore;
    }
    
}
