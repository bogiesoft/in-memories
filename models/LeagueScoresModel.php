<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_league_scores".
 *
 * @property integer $id
 * @property integer $league_id
 * @property integer $no
 * @property string $team_name
 * @property integer $play
 * @property integer $h_win
 * @property integer $h_draw
 * @property integer $h_lost
 * @property integer $h_gfor
 * @property integer $h_against
 * @property integer $a_win
 * @property integer $a_draw
 * @property integer $a_lost
 * @property integer $a_gfor
 * @property integer $a_against
 * @property string $goal_dif
 * @property integer $point
 * @property string $form
 * @property integer $type
 * @property string $group_cup
 * @property string $season
 */
class LeagueScoresModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_league_scores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['league_id', 'no', 'team_name', 'season'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['league_id', 'no', 'play', 'h_win', 'h_draw', 'h_lost', 'h_gfor', 'h_against', 'a_win', 'a_draw', 'a_lost', 'a_gfor', 'a_against', 'point', 'type'], 'integer'],
            [['team_name', 'goal_dif', 'form', 'group_cup', 'season'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'league_id' => 'League ID',
            'no' => 'No',
            'team_name' => 'Team Name',
            'play' => 'Play',
            'h_win' => 'H Win',
            'h_draw' => 'H Draw',
            'h_lost' => 'H Lost',
            'h_gfor' => 'H Gfor',
            'h_against' => 'H Against',
            'a_win' => 'A Win',
            'a_draw' => 'A Draw',
            'a_lost' => 'A Lost',
            'a_gfor' => 'A Gfor',
            'a_against' => 'A Against',
            'goal_dif' => 'Goal Dif',
            'point' => 'Point',
            'form' => 'Form',
            'type' => 'Type',
            'group_cup' => 'Group Cup',
            'season' => 'Season',
        ];
    }
    public function updateScore($team) {
        //var_dump($param);
        $model = new LeagueScoresModel();
        
        /*echo        $score['pos'].
                $score['team'].
                $score['play'].
                $score['win'].
                $score['draw'].
                $score['lost'].
                $score['F'].
                $score['A'].
                $score['gd'].
                $score['pts'];*/
        
        foreach ($team as $key => $score) {
            //$model = new User;
            $model->id = $key+1;
            $model->season = '2015-2016';
            $model->team_name = $score['team'];
            $model->play = $score['play'];
            $model->h_win = $score['win'];
            $model->h_draw = $score['draw'];
            $model->h_lost = $score['lost'];
            $model->h_gfor = $score['F'];
            $model->h_against = $score['A'];
            $model->goal_dif = $score['gd'];
            $model->point = $score['pts'];
            
            if($model->save()){
                
            }  // equivalent to $model->insert();
            else{
                                echo 'WTF';}
//$model->s
            /*echo        $score['pos'].
                $score['team'].
                $score['play'].
                $score['win'].
                $score['draw'].
                $score['lost'].
                $score['F'].
                $score['A'].
                $score['gd'].
                $score['pts'].($key+1);*/
        }
     /*foreach ($param as $value) {
         //var_dump($value['team']);
         //echo $value['team'];
     }*/
    }
}