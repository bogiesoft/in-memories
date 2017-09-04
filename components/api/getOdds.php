<?php

namespace app\components\api;
use app\models\LeagueModel;
use app\models\MatchModel;
use Yii;

class getOdds{
    
    public function addOdds($id, $date) {
        $model = getOdds::getLeagueOdds($id);
        if($model->api_get_match == 1){
            $match = getOdds::getMatchOdd88($model->link_get_odds, $date);
        }
        else if($model->api_get_match == 9){
            $match = getOdds::getMatchAsiaBookie($model->link_get_odds, $date);
        }
        else{
            $match = null;
        }
        //$flag = FALSE;
        if($match){
            foreach ($match as $row) {
                /*if(getOdds::updateScore($id, $row)){
                    $flag = TRUE;
                }
                else{
                    //return FALSE;
                }*/
                getOdds::updateScore($id, $row);
            }
            return TRUE;
        }
        return FALSE;
        
    }
    
    protected function getMatchOdd88($url, $date){

        //$league_url = $url;
        
        if($url){
            require_once Yii::$app->basePath . '/components/simple_html_dom.php';
            //$url = $league_url;

            $html = file_get_html($url);

            //$match = array();

            foreach($html->find('table table tr') as $row) {
                if(!empty($row->find('td', 1)->plaintext) || !empty($row->find('td', 5)->plaintext)){
                    
                    $check = substr(trim($row->find('td', 0)->plaintext),0,2);
                    $time = substr(trim($row->find('td', 0)->plaintext),6,2);
                    //var_dump(date("H:i"));
                    //$time = (int)$time;
                    //var_dump($time);exit();
                    if(!empty($date) && $date != ''){
                        $checkDate = explode('-', $date)[2];
                    }
                    else{
                        $checkDate = date("d");
                    }
                    //var_dump($checkDate.$check);exit();
                    if($check == $checkDate || ($check == ($checkDate+1) && (int)$time <= 6)){

                        $item['play_time'] = getOdds::generateTime(trim($row->find('td', 0)->plaintext), $date);
                        $item['home'] = trim($row->find('td', 1)->plaintext);
                        $item['h_odds'] = trim($row->find('td', 2)->plaintext);
                        
                        $checkBet = explode(',', getOdds::filterBet(trim($row->find('td', 3)->plaintext)));
                        
                        //$item['bet'] = getOdds::filterBet(trim($row->find('td', 3)->plaintext));
                        $item['bet'] = $checkBet[0];
                        $item['bet_team'] = $checkBet[1];
                        
                        $item['a_odds'] = trim($row->find('td', 4)->plaintext);
                        $item['away'] = trim($row->find('td', 5)->plaintext);

                        $result[] = $item;
                    }

                }

            }
            //var_dump($result);exit();
            if(!empty($result)){
                return $result;
            }
        }
        
        return FALSE;
        
    }
    
    protected function updateScore($id, $row) {
        //var_dump($row);exit();
        $resetTeam = getOdds::compare($id, $row['home'], $row['away']);
        //var_dump($resetTeam);exit();
        if($resetTeam){
            $row['home'] = $resetTeam['team_h'];
            $row['away'] = $resetTeam['team_a'];
        }
        $model = MatchModel::find()->where(['id_league' => $id, 'home' => $row['home'], 'away' => $row['away']])->one();
        
        if($model){
            
            //$model->id_match = $model->id_match;
            $model->id_league = $id;
            $model->home = $row['home'];
            $model->away = $row['away'];
            $model->play_time = $row['play_time'];
            $model->h_odds = $row['h_odds'];
            $model->a_odds = $row['a_odds'];
            $model->bet = $row['bet'];
            $model->bet_team = $row['bet_team'];
            $model->h_score = 0;
            $model->a_score = 0;
            $model->comment = '-';
            $model->active = 0;
            /*var_dump($model->update());exit();
            if($model->update()){
                var_dump($row);exit();
                return TRUE;
            }*/
            $model->update();
        }
        else{
            $model = new MatchModel();
            $model->id_league = $id;
            $model->home = $row['home'];
            $model->away = $row['away'];
            $model->play_time = $row['play_time'];
            $model->h_odds = $row['h_odds'];
            $model->a_odds = $row['a_odds'];
            $model->bet = $row['bet'];
            $model->bet_team = $row['bet_team'];
            $model->h_score = 0;
            $model->a_score = 0;
            $model->comment = '-';
            $model->active = 0;
            /*var_dump($model->save());exit();
            if($model->save()){
                return TRUE;
            }*/
            $model->save();
        }
        
    }
    
    protected function getLeagueOdds($id) {
        $model = LeagueModel::findOne($id);

        return $model;
    }
    
    protected function generateTime($time, $date){
        $array = explode(" ", $time);
        if(!empty($date) && $date != ''){
            $datetime = $date.' '.$array[1].':00';
        }
        else{
            $cut = explode("/", $array[0]);
            
            //check kickoff after 00:00 clock
            /*if(substr($array[1],0,2)<=6){
                $cut[0] = $cut[0]-1;
                if($cut[0] < 10){
                    $cut[0] = '0'.$cut[0];
                }
            }*/
            $datetime = date("Y-").date('m',strtotime($cut[1])).'-'.$cut[0].' '.$array[1].':00';
        }
        return $datetime;
    }


    protected function filterBet($bet){
        //$bet = str_replace(" ","",$bet);
        $home_away = explode(":",$bet);
        $home_away[0] = trim($home_away[0]);
        $home_away[1] = trim($home_away[1]);
        
        if($home_away[0]==0 && $home_away[1]==0){
            $bet_team = 'n';
        }
        else if($home_away[0]==0){
            $bet_team = 'h';
        }
        else{
            $bet_team = 'a';
        }
        
        $getBet = '-';
        foreach ($home_away as $check) {
            if($check!=0){
                $num = array('1', '2', '3', '4', '5', '6', '7', '8', '9');
                if(in_array($check, $num)){
                    $getBet = $check;
                }
                else {
                    $getBet = getOdds::generateBet($check);
                }
            }
        }
        //var_dump($getBet);
                //exit();
        
        return $getBet.','.$bet_team;
    }
    
    protected function generateBet($bet) {
        $over = explode(" ",$bet);
        
        if(!empty($over[1])){

            if($over[1] == '1/4'){
                $returnBet = $over[0].'.25';
            }
            else if($over[1] == '1/2'){
                $returnBet = $over[0].'.5';
            }
            else if($over[1] == '3/4'){
                $returnBet = $over[0].'.75';
            }
            else{
                $returnBet = $over[0].' '.$over[1];
            }
        }
        else{

            if($over[0] == '1/4'){
                $returnBet = '0.25';
            }
            else if($over[0] == '1/2'){
                $returnBet = '0.5';
            }
            else if($over[0] == '3/4'){
                $returnBet = '0.75';
            }
            else{
                $returnBet = $over[0];
            }
        }
        
        return $returnBet;
    }
    
    
    protected function compare($id, $team_h, $team_a) {
        if($id == 1){
            
            if($team_h == 'West Brom'){
                $return['team_h'] = 'West Bromwich Albion'; 
            }
            else if($team_h == 'Bournemouth'){
                $return['team_h'] = 'AFC Bournemouth'; 
            }
            else if($team_h == 'Stoke'){
                $return['team_h'] = 'Stoke City'; 
            }
            else if($team_h == 'Brighton Hove Albion'){
                $return['team_h'] = 'Brighton & Hove Albion'; 
            }
            else if($team_h == 'Leicester'){
                $return['team_h'] = 'Leicester City'; 
            }
            else if($team_h == 'Newcastle'){
                $return['team_h'] = 'Newcastle United'; 
            }
            else if($team_h == 'Swansea'){
                $return['team_h'] = 'Swansea City'; 
            }
            else if($team_h == 'West Ham'){
                $return['team_h'] = 'West Ham United'; 
            }
            else{
                $return['team_h'] = $team_h;
            }
            
            if($team_a == 'West Brom'){
                $return['team_a'] = 'West Bromwich Albion';
            }
            else if($team_a == 'Bournemouth'){
                $return['team_a'] = 'AFC Bournemouth';
            }
            else if($team_h == 'Stoke'){
                $return['team_h'] = 'Stoke City'; 
            }
            else if($team_h == 'Brighton Hove Albion'){
                $return['team_h'] = 'Brighton & Hove Albion'; 
            }
            else if($team_h == 'Leicester'){
                $return['team_h'] = 'Leicester City'; 
            }
            else if($team_h == 'Newcastle'){
                $return['team_h'] = 'Newcastle United'; 
            }
            else if($team_h == 'Swansea'){
                $return['team_h'] = 'Swansea City'; 
            }
            else if($team_h == 'West Ham'){
                $return['team_h'] = 'West Ham United'; 
            }
            else{
                $return['team_a'] = $team_a;
            }
        }
        if(!empty($return)){
            return $return;
        }
    }
    
    protected function getMatchAsiaBookie($url, $date){
        
        if($url){
            require_once Yii::$app->basePath . '/components/simple_html_dom.php';

            $html = file_get_html($url);
            $div = $html->find('div[id=masterdiv]', 0);
            //var_dump($url);exit();

            foreach($div->find('table tr') as $key => $row) {
                //var_dump(trim($row->find('td', 0)->plaintext));exit();
                if($key > 2 && $row->find('td', 0)->find('font[size=2]', 1)!=null){
                    $kickoff = str_replace("&nbsp;&nbsp;"," ",trim($row->find('td', 0)->find('font[size=2]', 1)->plaintext));
                    $check = substr(trim($kickoff),0,2);
                    $time = substr(trim($kickoff),7,2);
                    
                    if(!empty($date) && $date != ''){
                        $checkDate = explode('-', $date)[2];
                    }
                    else{
                        $checkDate = date("d");
                    }
                    //var_dump($time);exit();
                    //check kickoff today
                    if($check == $checkDate || ($check == ($checkDate+1) && (int)$time <= 6)){
                        
                        //$teams = trim($row->find('td', 1)->plaintext);
                        $teams = $row->find('td', 1);
                        $item['home'] = null;
                        $item['away'] = null;
                        foreach ($teams->find('span') as $tspan) {
                            //var_dump($tspan->plaintext);exit();
                            $spanid = $tspan->getAttribute('id');
                                                        
                            if(strpos($spanid,"home") !== FALSE && strpos($spanid,"redhome")===FALSE){
                                $item['home'] = strip_tags(trim($tspan->plaintext));
                            }
                            if(strpos($spanid,"away") !== FALSE && strpos($spanid,"redaway")===FALSE){
                                $item['away'] = strip_tags(trim($tspan->plaintext));
                            }
                        }
                        
                        /*$item['home'] = strip_tags(trim(str_replace("&nbsp;","",explode('vs', $teams)[0])));
                        $item['away'] = strip_tags(trim(str_replace("&nbsp;","",explode('vs', $teams)[1])));
                        
                        $home_clear_num = explode(' ', $item['home']);
                        if(count($home_clear_num)>1){
                            $item['home'] = trim(str_replace(explode(' ', $item['home'])[0],"",$item['home']));
                        }
                        $away_clear_num = explode(' ', $item['away']);
                        if(count($away_clear_num)>1){
                            $item['away'] = trim(str_replace(explode(' ', $item['away'])[count($away_clear_num)-1],"",$item['away']));
                        }*/

                        $item['play_time'] = getOdds::generateTime($kickoff, $date);
                        //$item['home'] = trim($row->find('td', 1)->plaintext);
                        $item['h_odds'] = trim($row->find('td', 2)->plaintext);
                        
                        $checkBet = explode(',', getOdds::filterBet(trim($row->find('td', 3)->find('font[face=Arial]', 0)->plaintext)));
                        
                        $item['bet'] = $checkBet[0];
                        $item['bet_team'] = $checkBet[1];
                        
                        $item['a_odds'] = trim($row->find('td', 4)->plaintext);
                        //$item['away'] = trim($row->find('td', 5)->plaintext);

                        $result[] = $item;
                        //var_dump($result);exit();
                    }
                }

            }
            //var_dump($result);exit();
            if(!empty($result)){
                return $result;
            }
        }
        
        return FALSE;
        
    }
    
}
