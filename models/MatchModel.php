<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_match".
 *
 * @property integer $id_match
 * @property integer $id_league
 * @property string $home
 * @property string $away
 * @property string $play_time
 * @property double $h_odds
 * @property double $a_odds
 * @property string $bet
 * @property string $bet_team
 * @property integer $h_score
 * @property integer $a_score
 * @property string $comment
 */
class MatchModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_match';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_league', 'home', 'away', 'play_time', 'h_odds', 'a_odds', 'bet', 'bet_team', 'h_score', 'a_score', 'comment', 'active'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_league', 'h_score', 'a_score', 'active'], 'integer'],
            [['h_odds', 'a_odds'], 'number'],
            [['comment'], 'string'],
            [['home', 'away', 'play_time'], 'string', 'max' => 255],
            [['bet'], 'string', 'max' => 128],
            [['bet_team'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_match' => 'Id Match',
            'id_league' => 'Id League',
            'home' => 'Home',
            'away' => 'Away',
            'play_time' => 'Play Time',
            'h_odds' => 'H Odds',
            'a_odds' => 'A Odds',
            'bet' => 'Bet',
            'bet_team' => 'Bet Team',
            'h_score' => 'H Score',
            'a_score' => 'A Score',
            'comment' => 'Comment',
            'active' => 'Active',
        ];
    }
}