<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\MatchModel;
use app\models\LeagueModel;
use app\models\LogGameModel;

class MatchOdds extends Widget {
    
    public $date = null;
    public $id_league = 1;

    public function init() {

        if($this->date == null){
            $this->date = date("Y-m-d");
        
        }

    }

    public function run() {
        $match = MatchModel::find()->where(['id_league' => $this->id_league, 'active' => 0])/*->andFilterWhere(['or',['like', 'play_time', $this->date]])*/->orderBy(['play_time' => SORT_ASC])->all();
        $checkMatch = [];
        if($match){
            foreach ($match as $row) {
                $check = $this->checkTime($row);
                if($check){
                    $checkMatch[] = $check;
                }
            }
        }
        //var_dump($checkMatch);exit();
        $league = LeagueModel::findOne($this->id_league);
        
        return $this->render('MatchOdds',
                [
                    'match' => $checkMatch, //all match no active
                    'league' => $league,
                    //'match' => $match,  //all match no active to day
                ]);
    }
    
    protected function checkTime($match) {
        if($match->play_time > date('Y-m-d H:i:s', strtotime("+ 3 minutes"))){
            return $match;
        }
    }
}
