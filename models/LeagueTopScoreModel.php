<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_league_top_score".
 *
 * @property integer $id_top_score
 * @property integer $id_league
 * @property integer $rank
 * @property string $player
 * @property string $team
 * @property integer $goal
 * @property string $season
 */
class LeagueTopScoreModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_league_top_score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_league', 'player', 'team', 'goal', 'season'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_league', 'rank', 'goal'], 'integer'],
            [['player', 'team'], 'string', 'max' => 255],
            [['season'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_top_score' => 'Id Top Score',
            'id_league' => 'Id League',
            'rank' => 'Rank',
            'player' => 'Player',
            'team' => 'Team',
            'goal' => 'Goal',
            'season' => 'Season',
        ];
    }
}