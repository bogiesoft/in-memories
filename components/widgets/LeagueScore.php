<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\LeagueScoresModel;
use app\models\LeagueModel;
use app\models\LeagueTopScoreModel;

class LeagueScore extends Widget {
    
    public $league;
    public $season = '2015-2016';
    public $topscore;
    public $topassists;

    public function init() {
        $this->season = LeagueModel::season;
        $this->topscore = $this->getTopScore();
        $this->topassists = $this->getTopAssist();

    }

    public function run() {
        $score = LeagueScoresModel::find()->where(['league_id'=>$this->league,'season' => $this->season])->orderBy(['no' => SORT_ASC])->all();
        //$topScore = LeagueTopScoreModel::find()->where(['id_league'=>$this->league,'season' => $this->season])->orderBy(['goal' => SORT_DESC])->all();

        return $this->render('LeagueScore', 
                [
                    'model' => $score,
                    'league' => $this->league,
                    'topScore' => $this->topScore,
                    'topAssist' => $this->topassists,
                ]);

    }
    public function getTopScore() {
        $topScore = LeagueTopScoreModel::find()->where(['id_league'=>$this->league,'season' => $this->season])->limit(20)->orderBy(['rank' => SORT_ASC])->all();
        if($topScore){
            $template_head = '';
            $template_foot = '';

            $template_content = '';

            $template_head .= '<table class="table table-bordered league-score-table league-'.$this->league.'">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Player</th>
                    <th>Team</th>
                    <th>Goals</th>
                </tr>
            </thead>
            <tbody>';

            //$demode = end($topScore);

            foreach ($topScore as $score) {
                /*if($score->no == 1 || $score->no == 2 || $score->no == 3 || $score->no == 4){
                    $template_content .= '<tr class="league-top4 active">';
                }
                else if($score->no == 5 || $score->no == 6){
                    $template_content .= '<tr class="league-top56 info">';
                }
                else if($score->no >= ($demode->no -2)){
                    $template_content .= '<tr class="league-danger danger">';
                }
                else{
                    $template_content .= '<tr class="league-normal">';
                }*/
                $template_content .= '<tr class="">';
                $template_content .=       '<td>'.$score->rank.'</td>
                                            <td>'.$score->player.'</td>
                                            <td>'.$score->team.'</td>
                                            <td>'.$score->goal.'</td>
                                       </tr>';
            }
            $template_foot .= '</tbody></table>';
            //$template_foot .= '<div class="link-more">';
            //$template_foot .= Html::a(" -- More -- ", ["league/more", "league" => $league], ["class" => "label btn-warning pull-right"]);
            //$template_foot .= '</div>';
            //$template_foot .= '<div class="clear-float"></div>';

            $content = $template_head.$template_content.$template_foot;

            return $content;
        }
        return '<br /><div class="no-content">ยังไม่มีข้อมูล</div>';
    }
    
    public function getTopAssist() {
        //$topAssist = LeagueTopScoreModel::find()->where(['id_league'=>$this->league,'season' => $this->season])->limit(20)->orderBy(['goal' => SORT_DESC])->all();
        $topAssist = null;
        if($topAssist){
            $template_head = '';
            $template_foot = '';

            $template_content = '';

            $template_head .= '<table class="table table-bordered league-score-table league-'.$this->league.'">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Player</th>
                    <th>Team</th>
                    <th>Assists</th>
                </tr>
            </thead>
            <tbody>';

            $demode = end($topAssist);

            foreach ($topAssist as $score) {
                /*if($score->no == 1 || $score->no == 2 || $score->no == 3 || $score->no == 4){
                    $template_content .= '<tr class="league-top4 active">';
                }
                else if($score->no == 5 || $score->no == 6){
                    $template_content .= '<tr class="league-top56 info">';
                }
                else if($score->no >= ($demode->no -2)){
                    $template_content .= '<tr class="league-danger danger">';
                }
                else{
                    $template_content .= '<tr class="league-normal">';
                }*/
                $template_content .= '<tr class="">';
                $template_content .=       '<td>'.$score->rank.'</td>
                                            <td>'.$score->player.'</td>
                                            <td>'.$score->team.'</td>
                                            <td>'.$score->Assists.'</td>
                                       </tr>';
            }
            $template_foot .= '</tbody></table>';
            //$template_foot .= '<div class="link-more">';
            //$template_foot .= Html::a(" -- More -- ", ["league/more", "league" => $league], ["class" => "label btn-warning pull-right"]);
            //$template_foot .= '</div>';
            //$template_foot .= '<div class="clear-float"></div>';

            $content = $template_head.$template_content.$template_foot;

            return $content;
        }
        return '<br /><div class="no-content">ยังไม่มีข้อมูล</div>';
    }
    
}
